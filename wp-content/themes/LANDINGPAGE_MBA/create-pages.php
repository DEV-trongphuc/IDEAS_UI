<?php
/**
 * Script to automatically create and configure custom pages for the IDEAS theme.
 */

// Find wp-load.php by walking up the directory tree
$wp_load_path = __DIR__;
while (!file_exists($wp_load_path . '/wp-load.php')) {
    $parent = dirname($wp_load_path);
    if ($parent === $wp_load_path) {
        // Reached filesystem root
        die("Could not find wp-load.php. Please make sure this file is inside a WordPress installation.");
    }
    $wp_load_path = $parent;
}

// Load WordPress
define('WP_USE_THEMES', false);
require_once $wp_load_path . '/wp-load.php';

// Check permissions
if (!isset($_GET['run'])) {
    echo "<div style='font-family:sans-serif;padding:30px;max-width:600px;margin:50px auto;border:1px solid #ccc;border-radius:5px;line-height:1.6;'>";
    echo "<h2 style='color:#ab0e00;'>Khởi tạo trang WordPress tự động</h2>";
    echo "<p>Để chạy script khởi tạo tất cả các trang Custom Page và gán đúng template cho theme <b>LANDINGPAGE_MBA</b>, vui lòng click vào nút bên dưới:</p>";
    echo "<p><a href='?run=1' style='display:inline-block;background:#ab0e00;color:#fff;padding:10px 20px;text-decoration:none;border-radius:4px;font-weight:bold;'>Khởi chạy ngay</a></p>";
    echo "<p style='color:#666;font-size:12px;'>Lưu ý: Script sẽ tự động tạo các trang nếu chưa có, và gán template chính xác. Sau khi hoàn thành, hãy xóa file <code>create-pages.php</code> này khỏi thư mục theme để bảo mật.</p>";
    echo "</div>";
    exit;
}

$pages = [
    [
        'slug' => 'swiss-umef',
        'title' => 'Swiss UMEF',
        'template' => 'page-swiss-umef.php'
    ],
    [
        'slug' => 'he-thong-ho-tro-hoc-tap-lms-ideas',
        'title' => 'Hệ thống LMS',
        'template' => 'page-he-thong-ho-tro-hoc-tap-lms-ideas.php'
    ],
    [
        'slug' => 'so-do-to-chuc',
        'title' => 'Cơ cấu tổ chức',
        'template' => 'page-so-do-to-chuc.php'
    ],
    [
        'slug' => 'doi-ngu-giang-vien',
        'title' => 'Hội đồng chuyên môn',
        'template' => 'page-faculty.php'
    ],
    [
        'slug' => 'dong-su-kien',
        'title' => 'Dòng sự kiện',
        'template' => 'page-dong-su-kien.php'
    ],
    [
        'slug' => 'lich-su-hinh-thanh-va-phat-trien-vien-ideas',
        'title' => 'Lịch sử phát triển',
        'template' => 'page-history.php'
    ],
    [
        'slug' => 'ho-tro-tai-chinh-sacombank',
        'title' => 'Trả góp học phí',
        'template' => 'page-ho-tro-tai-chinh-sacombank.php'
    ],
    [
        'slug' => 'cac-khoan-chi-phi',
        'title' => 'Các khoản chi phí',
        'template' => 'page-cac-khoan-chi-phi.php'
    ],
    [
        'slug' => 'ideas-ambassador',
        'title' => 'IDEAS - Ambassador',
        'template' => 'page-ideas-ambassador.php'
    ],
    [
        'slug' => 'ideas-talk',
        'title' => 'Webinar - Ideas Talk',
        'template' => 'page-ideas-talk.php'
    ],
    [
        'slug' => 'ideas-podcast-series-01',
        'title' => 'Podcast - Ideas Podcast',
        'template' => 'page-ideas-podcast-series-01.php'
    ],
    [
        'slug' => 'sitemap',
        'title' => 'Sơ đồ trang web',
        'template' => 'page-sitemap.php'
    ],
    [
        'slug' => 'lien-he',
        'title' => 'Liên hệ',
        'template' => 'page-lien-he.php'
    ],
    [
        'slug' => 'thac-si-quan-tri-kinh-doanh-mba',
        'title' => 'Học MBA Online',
        'template' => 'page-thac-si-quan-tri-kinh-doanh-mba.php'
    ],
];

echo "<div style='font-family:monospace;padding:20px;background:#f8f9fa;border:1px solid #dee2e6;border-radius:8px;max-width:800px;margin:20px auto;'>";
echo "<h2 style='margin-top:0;color:#333;'>Khởi tạo trang WordPress tự động</h2>";

foreach ($pages as $p) {
    $slug = $p['slug'];
    $title = $p['title'];
    $template = $p['template'];

    // Check if page already exists
    $existing_pages = get_posts(array(
        'name'        => $slug,
        'post_type'   => 'page',
        'post_status' => 'any',
        'numberposts' => 1
    ));
    $existing = !empty($existing_pages) ? $existing_pages[0] : null;

    if ($existing) {
        update_post_meta($existing->ID, '_wp_page_template', $template);
        if ($existing->post_status !== 'publish') {
            wp_update_post(array(
                'ID' => $existing->ID,
                'post_status' => 'publish'
            ));
        }
        echo "<div style='color:#0c5460;background:#d1ecf1;padding:8px;margin-bottom:8px;border-radius:4px;'>";
        echo "✓ Đã tồn tại: <b>" . esc_html($title) . "</b> (slug: <code>" . esc_html($slug) . "</code>) - Cập nhật template: <code>" . esc_html($template) . "</code>";
        echo "</div>";
    } else {
        $post_id = wp_insert_post(array(
            'post_title'    => $title,
            'post_content'  => '',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_name'     => $slug,
        ));

        if (!is_wp_error($post_id)) {
            update_post_meta($post_id, '_wp_page_template', $template);
            echo "<div style='color:#155724;background:#d4edda;padding:8px;margin-bottom:8px;border-radius:4px;'>";
            echo "✚ Đã tạo mới: <b>" . esc_html($title) . "</b> (slug: <code>" . esc_html($slug) . "</code>) - Template: <code>" . esc_html($template) . "</code>";
            echo "</div>";
        } else {
            echo "<div style='color:#721c24;background:#f8d7da;padding:8px;margin-bottom:8px;border-radius:4px;'>";
            echo "✗ Lỗi tạo trang: <b>" . esc_html($title) . "</b> - " . esc_html($post_id->get_error_message());
            echo "</div>";
        }
    }
}

echo "<br><span style='color:red;'>Lưu ý: Hãy XÓA file này (<code>create-pages.php</code>) sau khi chạy xong để bảo mật!</span>";
echo "</div>";
