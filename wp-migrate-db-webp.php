<?php
/**
 * Standalone Utility: Migrate WordPress DB attachments, post content, options, & custom fields to WebP.
 * Path: /wp-migrate-db-webp.php
 * 
 * Supports:
 * - CLI execution: `php wp-migrate-db-webp.php`
 * - Web execution (Requires Administrator login): `https://yourdomain.com/wp-migrate-db-webp.php`
 */

@ini_set('memory_limit', '512M');
@set_time_limit(600); // 10 minutes maximum

$is_cli = (php_sapi_name() === 'cli');

// 1. Boot WordPress
if (file_exists('wp-load.php')) {
    require_once('wp-load.php');
} else {
    if ($is_cli) {
        die("Error: wp-load.php not found. Run this from the WordPress root folder.\n");
    } else {
        die("<h3>Error: wp-load.php not found. Placed in WordPress root folder?</h3>");
    }
}

// 2. Security check
if (!$is_cli) {
    if (!current_user_can('manage_options')) {
        wp_die('<h3>Bạn không có quyền truy cập trang này. Vui lòng đăng nhập với tài khoản Administrator.</h3>');
    }
}

// Helper function to echo content and flush buffer to browser
function output_log($msg) {
    global $is_cli;
    if ($is_cli) {
        echo $msg . "\n";
    } else {
        echo esc_html($msg) . "<br>";
        echo str_repeat(' ', 1024); // fill browser buffer
        @ob_flush();
        flush();
    }
}

// Helper to render HTML Header
function render_web_header() {
    ?>
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Database WebP Migrator</title>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&family=JetBrains+Mono&display=swap" rel="stylesheet">
        <style>
            body { font-family: 'Outfit', sans-serif; background: #0f172a; color: #e2e8f0; margin: 0; padding: 40px 20px; }
            .container { max-width: 900px; margin: 0 auto; background: #1e293b; padding: 32px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.05); box-shadow: 0 20px 50px rgba(0,0,0,0.3); }
            h1 { color: #f43f5e; margin-top: 0; font-weight: 800; font-size: 2.2rem; }
            p.desc { color: #94a3b8; font-size: 1rem; margin-bottom: 24px; line-height: 1.6; }
            .console { background: #090d16; font-family: 'JetBrains Mono', monospace; font-size: 0.85rem; padding: 20px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.05); height: 400px; overflow-y: auto; color: #38bdf8; line-height: 1.6; margin-bottom: 24px; }
            .btn { display: inline-flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #f43f5e, #be123c); color: #fff; border: none; padding: 14px 28px; border-radius: 12px; font-weight: 700; font-size: 0.95rem; cursor: pointer; text-decoration: none; box-shadow: 0 4px 15px rgba(244, 63, 94, 0.3); transition: transform 0.2s, box-shadow 0.2s; }
            .btn:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(244, 63, 94, 0.45); }
            .btn:active { transform: translateY(0); }
            .status-bar { display: flex; justify-content: space-between; font-size: 0.9rem; color: #64748b; margin-top: 16px; border-top: 1px solid rgba(255,255,255,0.05); padding-top: 16px; }
            .tag { background: rgba(56, 189, 248, 0.1); color: #38bdf8; padding: 2px 8px; border-radius: 6px; font-weight: 600; font-size: 0.8rem; }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Database WebP Migrator <span class="tag">WordPress</span></h1>
            <p class="desc">Công cụ này quét toàn bộ Database WordPress (bao gồm file đính kèm, metadata, nội dung bài viết/trang, và theme options) để chuyển đổi các liên kết ảnh cũ sang định dạng <code>.webp</code>. Vui lòng đảm bảo các file ảnh <code>.webp</code> đã được tạo trên đĩa trước khi chạy lệnh này.</p>
            
            <div class="console" id="console">
                [Hệ thống sẵn sàng] Nhấn nút bắt đầu phía dưới để tiến hành chạy cập nhật database...<br>
    <?php
    @ob_flush();
    flush();
}

// Helper to render HTML Footer
function render_web_footer() {
    ?>
            </div>
            
            <form method="POST">
                <input type="hidden" name="run_migration" value="1">
                <button type="submit" class="btn">Bắt đầu di trú dữ liệu</button>
            </form>
            
            <div class="status-bar">
                <span>Database: <code><?php echo esc_html(DB_NAME); ?></code></span>
                <span>User: <code><?php $u = wp_get_current_user(); echo esc_html($u->user_login); ?></code></span>
            </div>
        </div>
        
        <script>
            // Auto scroll console to bottom
            const con = document.getElementById('console');
            const observer = new MutationObserver(() => {
                con.scrollTop = con.scrollHeight;
            });
            observer.observe(con, { childList: true, subtree: true });
        </script>
    </body>
    </html>
    <?php
}

// 3. Execution logic
if (!$is_cli && empty($_POST['run_migration'])) {
    render_web_header();
    render_web_footer();
    exit;
}

if (!$is_cli) {
    render_web_header();
    echo "<script>document.getElementById('console').innerHTML = '';</script>"; // Clear default ready message
}

output_log("==================================================");
output_log("KHỞI ĐỘNG TIẾN TRÌNH DI TRÚ DATABASE");
output_log("==================================================");

global $wpdb;
$pattern = '/\.(png|jpe?g)(?=["\'\?\)\s]|$)/i';

// A. Migrate WordPress Media Library Attachments
output_log("Bước 1: Quét danh mục Thư viện đính kèm (Attachments)...");
$args = array(
    'post_type'      => 'attachment',
    'post_mime_type' => array('image/jpeg', 'image/png'),
    'posts_per_page' => -1,
);
$attachments = get_posts($args);
output_log("Tìm thấy " . count($attachments) . " file đính kèm là ảnh PNG/JPG.");

$migrated_attachments = 0;
foreach ($attachments as $attachment) {
    $id = $attachment->ID;
    
    // Get attached file path
    $attached_file = get_post_meta($id, '_wp_attached_file', true);
    if (!$attached_file) continue;
    
    // Update attached file path
    $new_attached_file = preg_replace($pattern, '.webp', $attached_file);
    update_post_meta($id, '_wp_attached_file', $new_attached_file);
    
    // Update attachment metadata (sizes/thumbnails)
    $metadata = wp_get_attachment_metadata($id);
    if ($metadata) {
        if (!empty($metadata['file'])) {
            $metadata['file'] = preg_replace($pattern, '.webp', $metadata['file']);
        }
        if (!empty($metadata['sizes'])) {
            foreach ($metadata['sizes'] as $size => $size_info) {
                if (!empty($metadata['sizes'][$size]['file'])) {
                    $metadata['sizes'][$size]['file'] = preg_replace($pattern, '.webp', $metadata['sizes'][$size]['file']);
                }
                if (!empty($metadata['sizes'][$size]['mime-type'])) {
                    $metadata['sizes'][$size]['mime-type'] = 'image/webp';
                }
            }
        }
        wp_update_attachment_metadata($id, $metadata);
    }
    
    // Update GUID and mime type in wp_posts
    $new_guid = preg_replace($pattern, '.webp', $attachment->guid);
    $wpdb->update(
        $wpdb->posts,
        array(
            'post_mime_type' => 'image/webp',
            'guid'           => $new_guid
        ),
        array('ID' => $id)
    );
    
    $migrated_attachments++;
    if ($migrated_attachments % 50 === 0) {
        output_log("--> Đã di trú: $migrated_attachments file đính kèm...");
    }
}
output_log("Hoàn thành di trú $migrated_attachments file đính kèm sang WebP.\n");

// B. Migrate Post Contents & Excerpts
output_log("Bước 2: Quét nội dung bài viết và trang (Post Contents & Excerpts)...");
$posts_query = "SELECT ID, post_content, post_excerpt FROM {$wpdb->posts}";
$all_posts = $wpdb->get_results($posts_query);
output_log("Tìm thấy " . count($all_posts) . " bài viết/trang để quét.");

$updated_posts = 0;
foreach ($all_posts as $post) {
    $content_changed = false;
    $excerpt_changed = false;
    
    $new_content = preg_replace($pattern, '.webp', $post->post_content, -1, $count_c);
    if ($count_c > 0) {
        $content_changed = true;
    }
    
    $new_excerpt = preg_replace($pattern, '.webp', $post->post_excerpt, -1, $count_e);
    if ($count_e > 0) {
        $excerpt_changed = true;
    }
    
    if ($content_changed || $excerpt_changed) {
        $wpdb->update(
            $wpdb->posts,
            array(
                'post_content' => $new_content,
                'post_excerpt' => $new_excerpt
            ),
            array('ID' => $post->ID)
        );
        $updated_posts++;
        output_log("--> Cập nhật ID {$post->ID} (Thay thế " . ($count_c + $count_e) . " liên kết ảnh)");
    }
}
output_log("Hoàn thành cập nhật $updated_posts bài viết/trang trong database.\n");

// C. Migrate Theme Options & Custom Field Settings
output_log("Bước 3: Quét và cập nhật Theme Options & Custom Fields...");
$options_query = "SELECT option_name, option_value FROM {$wpdb->options} WHERE option_name LIKE 'theme_mods_%' OR option_name LIKE '%logo%' OR option_name LIKE '%banner%'";
$options = $wpdb->get_results($options_query);

$updated_options = 0;
foreach ($options as $opt) {
    $val = $opt->option_value;
    if (empty($val)) continue;
    
    // Check if serialized
    $is_serialized = is_serialized($val);
    if ($is_serialized) {
        $unserialized = @unserialize($val);
        if ($unserialized !== false) {
            $replace_array = function(&$item) use ($pattern, &$replace_array) {
                if (is_array($item)) {
                    foreach ($item as $k => $v) {
                        $replace_array($item[$k]);
                    }
                } elseif (is_string($item)) {
                    $item = preg_replace($pattern, '.webp', $item);
                }
            };
            $replace_array($unserialized);
            $new_val = serialize($unserialized);
        } else {
            $new_val = $val;
        }
    } else {
        $new_val = preg_replace($pattern, '.webp', $val);
    }
    
    if ($new_val !== $val) {
        $wpdb->update(
            $wpdb->options,
            array('option_value' => $new_val),
            array('option_name' => $opt->option_name)
        );
        $updated_options++;
        output_log("--> Cập nhật Option: {$opt->option_name}");
    }
}
output_log("Hoàn thành cập nhật $updated_options options/theme configurations.");

output_log("\n==================================================");
output_log("HOÀN THÀNH DI TRÚ DỮ LIỆU ĐĂNG KÝ!");
output_log("==================================================");

if (!$is_cli) {
    ?>
    <script>
        // Alert completion
        alert('Cập nhật database thành công!');
    </script>
    <?php
    render_web_footer();
}
