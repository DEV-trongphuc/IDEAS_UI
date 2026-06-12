<?php
// Tăng giới hạn bộ nhớ và thời gian chạy tối đa để xử lý ảnh lớn
@ini_set('memory_limit', '512M');
@set_time_limit(180);

/**
 * Standalone Utility: Batch WebP Converter & Media Database Cleaner
 * Path: /wp-convert-webp.php
 * 
 * Features:
 * 1. Batch WebP conversion (prevent timeouts with AJAX).
 * 2. .htaccess router configuration for zero-break WebP serving.
 * 3. Theme Assets Auditor: scan local files for unused design assets + Delete button.
 * 4. Media DB Auditor: scan WordPress attachments against post contents + Delete button.
 */

// 1. Boot WordPress and Authenticate
$is_wp = false;
if (file_exists('wp-load.php')) {
    require_once('wp-load.php');
    if (!current_user_can('manage_options')) {
        wp_die('<h3>Bạn không có quyền truy cập trang này. Vui lòng đăng nhập bằng tài khoản Administrator.</h3>');
    }
    $is_wp = true;
} else {
    // Standalone authentication if wp-load.php is not found
    session_start();
    define('SECURE_PASS', 'ideas_webp_2026');
    if (isset($_GET['logout'])) {
        unset($_SESSION['webp_logged_in']);
        header('Location: ' . strtok($_SERVER["REQUEST_URI"], '?'));
        exit;
    }
    if (isset($_POST['password'])) {
        if ($_POST['password'] === SECURE_PASS) {
            $_SESSION['webp_logged_in'] = true;
        } else {
            $error = "Mật khẩu bảo mật không chính xác!";
        }
    }
    if (empty($_SESSION['webp_logged_in'])) {
        ?>
        <!DOCTYPE html>
        <html lang="vi">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Media Optimizer Security Access</title>
            <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
            <style>
                body { font-family: 'Outfit', sans-serif; background: #0f172a; color: #e2e8f0; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0; }
                .auth-box { background: #1e293b; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); width: 100%; max-width: 400px; text-align: center; border: 1px solid rgba(255,255,255,0.05); }
                h2 { color: #f43f5e; margin-bottom: 24px; }
                input[type="password"] { width: 100%; padding: 12px; border: 1px solid #475569; background: #0f172a; color: #fff; border-radius: 10px; box-sizing: border-box; margin-bottom: 16px; outline: none; text-align: center; }
                button { background: linear-gradient(135deg, #f43f5e, #be123c); color: #fff; border: none; padding: 12px 24px; border-radius: 10px; font-weight: 600; cursor: pointer; width: 100%; }
                .error { color: #ef4444; margin-top: 12px; font-size: 0.9rem; }
            </style>
        </head>
        <body>
            <div class="auth-box">
                <h2>BẢO MẬT HỆ THỐNG</h2>
                <p style="font-size: 0.9rem; color: #94a3b8; margin-bottom: 24px;">Trang này nằm ngoài cấu trúc WordPress. Vui lòng nhập mật khẩu bảo mật được định nghĩa trong mã nguồn để tiếp tục.</p>
                <form method="POST">
                    <input type="password" name="password" placeholder="Nhập mật khẩu bảo mật..." required>
                    <button type="submit">Xác thực truy cập</button>
                </form>
                <?php if (!empty($error)) echo '<div class="error">'.$error.'</div>'; ?>
            </div>
        </body>
        </html>
        <?php
        exit;
    }
}

// 2. Paths
$upload_dir = 'wp-content/uploads';
if (!is_dir($upload_dir) && is_dir('../wp-content/uploads')) {
    $upload_dir = '../wp-content/uploads';
}

$asset_dirs = [
    'wp-content/new_public/LANDINGPAGE_MBA/assets',
    'wp-content/new_public/LANDINGPAGE_MBA/homepage-assets',
    'wp-content/themes/LANDINGPAGE_MBA/common-assets'
];

$code_dirs = [
    'wp-content/new_public/LANDINGPAGE_MBA',
    'wp-content/themes/LANDINGPAGE_MBA'
];

// Helper to check security paths
function is_path_safe($path, $allowed_dirs) {
    $real_path = realpath($path);
    if (!$real_path) return false;
    
    foreach ($allowed_dirs as $dir) {
        $real_dir = realpath($dir);
        if ($real_dir && strpos($real_path, $real_dir) === 0) {
            return true;
        }
    }
    return false;
}

// 3. AJAX Actions Handlers
if (isset($_GET['action'])) {
    header('Content-Type: application/json');
    
    // A. Scan uploads for WebP conversion
    if ($_GET['action'] === 'scan') {
        $images = [];
        if (is_dir($upload_dir)) {
            $it = new RecursiveDirectoryIterator($upload_dir);
            $display = new RecursiveIteratorIterator($it);
            foreach ($display as $file) {
                if ($file->isFile()) {
                    $ext = strtolower(pathinfo($file->getPathname(), PATHINFO_EXTENSION));
                    if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
                        $images[] = str_replace('\\', '/', $file->getPathname());
                    }
                }
            }
        }
        echo json_encode(['success' => true, 'total' => count($images), 'images' => $images]);
        exit;
    }
    
    // B. Convert image to WebP
    if ($_GET['action'] === 'convert') {
        $data = json_decode(file_get_contents('php://input'), true);
        $image = $data['image'];
        $quality = isset($data['quality']) ? intval($data['quality']) : 82;
        
        if (strpos($image, '..') !== false || strpos($image, 'wp-content/uploads') === false) {
            echo json_encode(['success' => false, 'message' => 'Invalid image path.']);
            exit;
        }
        
        $dir = pathinfo($image, PATHINFO_DIRNAME);
        $filename = pathinfo($image, PATHINFO_FILENAME);
        $destination = $dir . '/' . $filename . '.webp';
        
        if (file_exists($destination)) {
            $orig_size = @filesize($image);
            $saved_size = @filesize($destination);
            echo json_encode([
                'success' => true, 
                'status' => 'exists', 
                'destination' => $destination,
                'orig_size' => $orig_size ? $orig_size : 0,
                'saved_size' => $saved_size ? $saved_size : 0
            ]);
            exit;
        }
        
        // Kiểm tra kích thước ảnh trước khi nạp vào bộ nhớ để tránh quá tải/treo PHP
        $img_info = @getimagesize($image);
        if ($img_info) {
            $width = $img_info[0];
            $height = $img_info[1];
            if (($width * $height) > 25000000) { // Lớn hơn 25 Megapixels
                echo json_encode(['success' => false, 'message' => "Kích thước ảnh quá lớn ({$width}x{$height}). Vui lòng giảm kích thước thủ công."]);
                exit;
            }
        }
        
        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if ($ext === 'jpg' || $ext === 'jpeg') {
            $img = @imagecreatefromjpeg($image);
        } elseif ($ext === 'png') {
            $img = @imagecreatefrompng($image);
            if ($img) {
                imagepalettetotruecolor($img);
                imagealphablending($img, true);
                imagesavealpha($img, true);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Format unsupported.']);
            exit;
        }
        
        if (!$img) {
            echo json_encode(['success' => false, 'message' => 'Failed to read source image.']);
            exit;
        }
        
        $saved = @imagewebp($img, $destination, $quality);
        imagedestroy($img);
        
        if ($saved) {
            $orig_size = @filesize($image);
            $saved_size = @filesize($destination);
            echo json_encode([
                'success' => true, 
                'status' => 'success', 
                'destination' => $destination, 
                'orig_size' => $orig_size ? $orig_size : 0,
                'saved_size' => $saved_size ? $saved_size : 0
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to save WebP file.']);
        }
        exit;
    }
    
    // C. Write htaccess rules
    if ($_GET['action'] === 'htaccess') {
        $htaccess_path = file_exists('.htaccess') ? '.htaccess' : (file_exists('../.htaccess') ? '../.htaccess' : '');
        if (!$htaccess_path) {
            echo json_encode(['success' => false, 'message' => 'Không tìm thấy file .htaccess ở thư mục gốc.']);
            exit;
        }
        
        $rules = "\n# BEGIN WebP Redirection Rules\n" .
                 "<IfModule mod_rewrite.c>\n" .
                 "  RewriteEngine On\n" .
                 "  RewriteCond %{HTTP_ACCEPT} image/webp\n" .
                 "  RewriteCond %{DOCUMENT_ROOT}/$1.webp -f\n" .
                 "  RewriteRule ^(wp-content/uploads/.*)\.(jpe?g|png)$ $1.webp [T=image/webp,E=accept:1,L]\n" .
                 "</IfModule>\n" .
                 "Header append Vary Accept env=REDIRECT_accept\n" .
                 "# END WebP Redirection Rules\n\n";
                 
        $content = file_get_contents($htaccess_path);
        if (strpos($content, 'BEGIN WebP Redirection Rules') !== false) {
            echo json_encode(['success' => true, 'message' => 'Cấu hình WebP đã tồn tại trong .htaccess!']);
            exit;
        }
        
        if (@file_put_contents($htaccess_path, $rules . $content)) {
            echo json_encode(['success' => true, 'message' => 'Cập nhật .htaccess thành công!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Không có quyền ghi đè file .htaccess.']);
        }
        exit;
    }

    // D. Scan unused theme asset images
    if ($_GET['action'] === 'scan_theme_assets') {
        $images = [];
        $image_extensions = ['png', 'jpg', 'jpeg', 'webp', 'svg', 'gif'];
        
        foreach ($asset_dirs as $adir) {
            if (!is_dir($adir)) continue;
            
            $it = new RecursiveDirectoryIterator($adir);
            $display = new RecursiveIteratorIterator($it);
            foreach ($display as $file) {
                if ($file->isFile()) {
                    $ext = strtolower(pathinfo($file->getPathname(), PATHINFO_EXTENSION));
                    if (in_array($ext, $image_extensions)) {
                        $images[] = [
                            'filename' => $file->getFilename(),
                            'filepath' => str_replace('\\', '/', $file->getPathname())
                        ];
                    }
                }
            }
        }
        
        // Find code files to search
        $code_files = [];
        foreach ($code_dirs as $cdir) {
            if (!is_dir($cdir)) continue;
            $it = new RecursiveDirectoryIterator($cdir);
            $display = new RecursiveIteratorIterator($it);
            foreach ($display as $file) {
                if ($file->isFile()) {
                    $ext = strtolower(pathinfo($file->getPathname(), PATHINFO_EXTENSION));
                    if (in_array($ext, ['html', 'php', 'js', 'css'])) {
                        $code_files[] = $file->getPathname();
                    }
                }
            }
        }
        
        // Read code file contents
        $code_contents = '';
        foreach ($code_files as $cfile) {
            $code_contents .= @file_get_contents($cfile);
        }
        
        $unused = [];
        foreach ($images as $img) {
            if (strpos($code_contents, $img['filename']) === false) {
                $unused[] = $img;
            }
        }
        
        echo json_encode(['success' => true, 'unused' => $unused]);
        exit;
    }
    
    // E. Delete local theme asset file securely
    if ($_GET['action'] === 'delete_asset') {
        $data = json_decode(file_get_contents('php://input'), true);
        $filepath = $data['filepath'];
        
        $all_allowed_dirs = array_merge($asset_dirs, [$upload_dir]);
        if (is_path_safe($filepath, $all_allowed_dirs)) {
            $ext = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));
            if (in_array($ext, ['png', 'jpg', 'jpeg', 'webp', 'svg', 'gif'])) {
                // Delete the original file
                $deleted = @unlink($filepath);
                
                // If original was jpg/png, also delete its webp version if exists
                if (in_array($ext, ['png', 'jpg', 'jpeg'])) {
                    $webp_path = preg_replace('/\.(png|jpe?g)$/i', '.webp', $filepath);
                    if (file_exists($webp_path)) {
                        @unlink($webp_path);
                    }
                    $webp_path_alt = $filepath . '.webp';
                    if (file_exists($webp_path_alt)) {
                        @unlink($webp_path_alt);
                    }
                }
                
                if ($deleted) {
                    echo json_encode(['success' => true, 'message' => 'Đã xóa file và các bản WebP liên quan thành công!']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Không thể xóa tệp tin này.']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Định dạng tệp không được phép xóa.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Cảnh báo bảo mật: Đường dẫn tệp tin không được phép xóa!']);
        }
        exit;
    }
    
    // F. Scan unused media database attachments
    if ($_GET['action'] === 'scan_db_media') {
        if (!$is_wp) {
            echo json_encode(['success' => false, 'message' => 'WordPress không được khởi động ở thư mục này.']);
            exit;
        }
        
        global $wpdb;
        
        // 1. Get all media attachments
        $attachments = $wpdb->get_results(
            "SELECT ID, guid, post_title FROM {$wpdb->posts} WHERE post_type = 'attachment'", 
            ARRAY_A
        );
        
        // 2. Get all posts content (any status, any type - including drafts and custom post types)
        $posts_content = $wpdb->get_col(
            "SELECT post_content FROM {$wpdb->posts}"
        );
        
        // 3. Get all metadata containing uploads references or numbers (for custom fields, galleries, page builders)
        $meta_values = $wpdb->get_col(
            "SELECT meta_value FROM {$wpdb->postmeta} WHERE meta_value LIKE '%wp-content/uploads/%' OR meta_key = '_thumbnail_id' OR meta_value REGEXP '^[0-9]+$'"
        );
        
        // 4. Get all options containing uploads references (for theme options, widgets)
        $option_values = $wpdb->get_col(
            "SELECT option_value FROM {$wpdb->options} WHERE option_value LIKE '%wp-content/uploads/%' OR option_value LIKE '%ideas.edu.vn%'"
        );
        
        // Combine all references into one search text
        $all_references_text = implode(' ', $posts_content) . ' ' . implode(' ', $meta_values) . ' ' . implode(' ', $option_values);
        
        $unused = [];
        foreach ($attachments as $att) {
            $id = intval($att['ID']);
            $filename = basename($att['guid']);
            
            // Safeguard: Check if filename, URL, or raw attachment ID is referenced in posts, options or postmeta
            $is_used = (strpos($all_references_text, $filename) !== false) || 
                        (strpos($all_references_text, '"' . $id . '"') !== false) ||
                        (strpos($all_references_text, ':' . $id . ';') !== false) ||
                        (strpos($all_references_text, '>' . $id . '<') !== false);
            
            // Nếu kiểm tra tên gốc chưa ra, quét tiếp các kích thước thumbnail (medium, large, v.v...) của ảnh đó
            if (!$is_used) {
                $meta = wp_get_attachment_metadata($id);
                if (!empty($meta['sizes'])) {
                    foreach ($meta['sizes'] as $size => $size_info) {
                        if (!empty($size_info['file'])) {
                            if (strpos($all_references_text, $size_info['file']) !== false) {
                                $is_used = true;
                                break;
                            }
                        }
                    }
                }
            }
            
            if (!$is_used) {
                // Get local file path
                $attached_file = get_post_meta($id, '_wp_attached_file', true);
                $full_filepath = WP_CONTENT_DIR . '/uploads/' . $attached_file;
                
                $unused[] = [
                    'id' => $id,
                    'title' => $att['post_title'],
                    'filename' => $filename,
                    'filepath' => str_replace('\\', '/', $full_filepath)
                ];
            }
        }
        
        echo json_encode(['success' => true, 'unused' => $unused]);
        exit;
    }
    
    // G. Delete WordPress Database Attachment (safe WP delete)
    if ($_GET['action'] === 'delete_attachment') {
        if (!$is_wp) {
            echo json_encode(['success' => false, 'message' => 'WordPress is not booted.']);
            exit;
        }
        
        $data = json_decode(file_get_contents('php://input'), true);
        $attachment_id = intval($data['id']);
        
        if ($attachment_id > 0) {
            // Get the attached file path to find WebP version before deletion
            $attached_file = get_post_meta($attachment_id, '_wp_attached_file', true);
            $full_filepath = WP_CONTENT_DIR . '/uploads/' . $attached_file;
            
            // Delete main WebP if it exists
            $webp_main = preg_replace('/\.(png|jpe?g)$/i', '.webp', $full_filepath);
            if (file_exists($webp_main)) {
                @unlink($webp_main);
            }
            $webp_main_alt = $full_filepath . '.webp';
            if (file_exists($webp_main_alt)) {
                @unlink($webp_main_alt);
            }
            
            // Delete thumbnail WebPs if they exist
            $meta = wp_get_attachment_metadata($attachment_id);
            if (!empty($meta['sizes'])) {
                $dir = dirname($full_filepath);
                foreach ($meta['sizes'] as $size => $size_info) {
                    if (!empty($size_info['file'])) {
                        $thumb_path = $dir . '/' . $size_info['file'];
                        $webp_thumb = preg_replace('/\.(png|jpe?g)$/i', '.webp', $thumb_path);
                        if (file_exists($webp_thumb)) {
                            @unlink($webp_thumb);
                        }
                        $webp_thumb_alt = $thumb_path . '.webp';
                        if (file_exists($webp_thumb_alt)) {
                            @unlink($webp_thumb_alt);
                        }
                    }
                }
            }
            
            // wp_delete_attachment deletes physical files (including thumbnail sizes) and DB meta!
            $deleted = wp_delete_attachment($attachment_id, true);
            if ($deleted) {
                echo json_encode(['success' => true, 'message' => 'Đã xóa ảnh, các kích thước thu nhỏ và các bản WebP liên quan thành công!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Không thể xóa đính kèm media này.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'ID không hợp lệ.']);
        }
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Công cụ Tối ưu hóa & Dọn dẹp Media - IDEAS</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=JetBrains+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <style>
        :root {
            --bg-dark: #0f172a;
            --card-dark: #1e293b;
            --primary: #f43f5e;
            --primary-hover: #e11d48;
            --text-main: #f8fafc;
            --text-sub: #94a3b8;
            --success: #10b981;
            --border: rgba(255,255,255,0.06);
        }
        body { font-family: 'Outfit', sans-serif; background: var(--bg-dark); color: var(--text-main); margin: 0; padding: 40px 20px; display: flex; justify-content: center; }
        .container { width: 100%; max-width: 950px; }
        header { text-align: center; margin-bottom: 40px; }
        header h1 { font-weight: 800; font-size: 2.5rem; margin: 0 0 10px 0; background: linear-gradient(135deg, #f43f5e, #fb7185); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        header p { color: var(--text-sub); margin: 0; }
        
        .tabs { display: flex; gap: 10px; margin-bottom: 24px; border-bottom: 1px solid var(--border); padding-bottom: 12px; }
        .tab-btn { background: none; border: none; color: var(--text-sub); font-size: 1rem; font-weight: 600; padding: 10px 20px; cursor: pointer; border-radius: 8px; transition: all 0.2s; }
        .tab-btn:hover { background: rgba(255,255,255,0.05); color: #fff; }
        .tab-btn.active { background: var(--primary); color: #fff; }

        .tab-content { display: none; }
        .tab-content.active { display: block; }

        .card { background: var(--card-dark); border-radius: 20px; padding: 30px; border: 1px solid var(--border); box-shadow: 0 10px 30px rgba(0,0,0,0.15); margin-bottom: 24px; }
        .card-title { font-size: 1.25rem; font-weight: 600; margin-top: 0; margin-bottom: 20px; border-bottom: 1px solid var(--border); padding-bottom: 12px; color: #fb7185; display: flex; justify-content: space-between; align-items: center; }
        
        .btn { background: linear-gradient(135deg, var(--primary), #be123c); color: #fff; border: none; padding: 12px 24px; font-size: 0.95rem; font-weight: 600; border-radius: 10px; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(244, 63, 94, 0.2); }
        .btn:hover { transform: translateY(-1px); box-shadow: 0 6px 16px rgba(244, 63, 94, 0.3); }
        .btn:disabled { background: #475569; box-shadow: none; cursor: not-allowed; transform: none; }
        .btn-secondary { background: #334155; box-shadow: none; }
        .btn-secondary:hover { background: #475569; }
        .btn-danger { background: linear-gradient(135deg, #ef4444, #b91c1c); box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2); }
        .btn-danger:hover { box-shadow: 0 6px 16px rgba(239, 68, 68, 0.3); }

        .progress-container { margin: 24px 0; display: none; }
        .progress-bar-bg { height: 12px; background: #0f172a; border-radius: 6px; overflow: hidden; }
        .progress-bar-fill { height: 100%; background: linear-gradient(90deg, #f43f5e, #10b981); width: 0%; transition: width 0.1s ease; }
        .progress-text { display: flex; justify-content: space-between; font-size: 0.9rem; color: var(--text-sub); margin-top: 8px; font-weight: 600; }
        
        .console-logs { background: #020617; border-radius: 12px; padding: 20px; height: 250px; overflow-y: auto; font-family: 'JetBrains Mono', monospace; font-size: 0.85rem; border: 1px solid var(--border); color: #38bdf8; margin-top: 20px; }
        .console-logs div { margin-bottom: 6px; }
        .log-success { color: #34d399; }
        .log-error { color: #f87171; }
        .log-warn { color: #fbbf24; }
        
        .code-box { background: #020617; padding: 20px; border-radius: 12px; font-family: 'JetBrains Mono', monospace; font-size: 0.85rem; color: #a7f3d0; overflow-x: auto; border: 1px solid var(--border); margin: 15px 0; }
        
        .stat-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-bottom: 24px; }
        .stat-card { background: #0f172a; padding: 15px; border-radius: 12px; text-align: center; border: 1px solid var(--border); }
        .stat-num { font-size: 1.5rem; font-weight: 800; color: #fb7185; }
        .stat-label { font-size: 0.8rem; color: var(--text-sub); text-transform: uppercase; margin-top: 4px; }

        /* Table styles for Unused lists */
        .table-container { max-height: 450px; overflow-y: auto; border: 1px solid var(--border); border-radius: 12px; background: #0f172a; margin-top: 15px; }
        table { width: 100%; border-collapse: collapse; text-align: left; font-size: 0.9rem; }
        th { background: #1e293b; padding: 12px 16px; font-weight: 600; color: var(--text-main); border-bottom: 1px solid var(--border); }
        td { padding: 12px 16px; border-bottom: 1px solid var(--border); color: var(--text-sub); }
        tr:hover td { background: rgba(255,255,255,0.02); color: #fff; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Media Optimizer & Cleaner</h1>
            <p>Hệ thống nén WebP thông minh và dọn dẹp ảnh dư thừa trong Database & Giao diện</p>
        </header>

        <div class="tabs">
            <button class="tab-btn active" onclick="switchTab('tab-webp')">Tối ưu WebP</button>
            <button class="tab-btn" onclick="switchTab('tab-cleaner')">Dọn dẹp ảnh dư thừa</button>
        </div>

        <!-- TAB 1: WebP Optimizer -->
        <div id="tab-webp" class="tab-content active">
            <div class="card">
                <div class="card-title">
                    <span>Nén ảnh WebP hàng loạt</span>
                    <span style="font-size: 0.8rem; background: #334155; padding: 4px 10px; border-radius: 20px; color: #fff;">Chế độ AJAX</span>
                </div>
                <p style="color: var(--text-sub); font-size: 0.95rem; margin-top: 0;">Quét toàn bộ thư mục <code>wp-content/uploads/</code> và nén hàng loạt ảnh PNG/JPG sang định dạng WebP siêu nhẹ nằm song song với ảnh gốc.</p>
                
                <div class="stat-grid">
                    <div class="stat-card">
                        <div class="stat-num" id="stat-total">0</div>
                        <div class="stat-label">Tổng tệp ảnh</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-num" id="stat-processed" style="color: #34d399;">0</div>
                        <div class="stat-label">Đã xử lý</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-num" id="stat-saving" style="color: #38bdf8;">0 KB</div>
                        <div class="stat-label">Dung lượng giảm</div>
                    </div>
                </div>

                <div style="display: flex; gap: 12px;">
                    <button class="btn" id="btn-scan">Quét thư viện ảnh</button>
                    <button class="btn" id="btn-start" style="background: linear-gradient(135deg, #10b981, #047857); box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);" disabled>Bắt đầu tối ưu</button>
                    <button class="btn btn-secondary" id="btn-stop" style="display:none;">Dừng lại</button>
                </div>

                <div class="progress-container" id="progress-area">
                    <div class="progress-bar-bg">
                        <div class="progress-bar-fill" id="progress-fill"></div>
                    </div>
                    <div class="progress-text">
                        <span id="progress-label">Đang chuẩn bị...</span>
                        <span id="progress-percent">0%</span>
                    </div>
                </div>

                <div class="console-logs" id="logs">
                    <div>[Hệ thống] Nhấp "Quét thư viện ảnh" để bắt đầu...</div>
                </div>
            </div>

            <div class="card">
                <div class="card-title">Cấu hình định tuyến thông minh (.htaccess)</div>
                <p style="color: var(--text-sub); font-size: 0.95rem; margin-top: 0;">Tự động trả về ảnh WebP nếu trình duyệt hỗ trợ, không thay đổi đường dẫn vật lý trong database, loại bỏ 100% khả năng lỗi link ảnh.</p>
                
                <div class="code-box">
# BEGIN WebP Redirection Rules
&lt;IfModule mod_rewrite.c&gt;
  RewriteEngine On
  RewriteCond %{HTTP_ACCEPT} image/webp
  RewriteCond %{DOCUMENT_ROOT}/$1.webp -f
  RewriteRule ^(wp-content/uploads/.*)\.(jpe?g|png)$ $1.webp [T=image/webp,E=accept:1,L]
&lt;/IfModule&gt;
# END WebP Redirection Rules
                </div>
                <div style="display: flex; gap: 12px; align-items: center;">
                    <button class="btn btn-secondary" id="btn-htaccess">Tự động cấu hình .htaccess</button>
                    <span id="htaccess-status" style="font-size: 0.9rem; font-weight: 600;"></span>
                </div>
            </div>
        </div>

        <!-- TAB 2: Unused Media Cleaner -->
        <div id="tab-cleaner" class="tab-content">
            <div class="card">
                <div class="card-title">Dọn dẹp ảnh không sử dụng (Giao diện & Database)</div>
                <p style="color: var(--text-sub); font-size: 0.95rem; margin-top: 0;">Quét và phát hiện các ảnh dư thừa không được liên kết trong bất kỳ bài viết, trang tĩnh hay file code nào. Hỗ trợ xóa an toàn khỏi ổ đĩa và database.</p>
                
                <div style="display: flex; gap: 12px; margin-bottom: 24px;">
                    <button class="btn" id="btn-scan-assets">Quét ảnh giao diện (Assets)</button>
                    <button class="btn btn-secondary" id="btn-scan-db" <?php echo !$is_wp ? 'disabled' : ''; ?>>
                        Quét ảnh thư viện (Media DB)
                    </button>
                </div>

                <div id="cleaner-results" style="display: none;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; flex-wrap: wrap; gap: 10px;">
                        <h4 id="cleaner-results-title" style="margin: 0; color: #fb7185;">Danh sách ảnh không sử dụng</h4>
                        <button class="btn btn-danger" id="btn-delete-all" style="padding: 8px 16px; font-size: 0.85rem; display: inline-flex; align-items: center; gap: 6px;">
                            <i class="fa-solid fa-trash-can"></i> Xóa toàn bộ hàng loạt
                        </button>
                    </div>
                    <div class="table-container">
                        <table id="results-table">
                            <thead>
                                <tr>
                                    <th>Tên file</th>
                                    <th>Vị trí vật lý</th>
                                    <th style="width: 100px; text-align: center;">Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="results-body">
                                <!-- Dynamic results -->
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div id="cleaner-empty" style="padding: 30px; text-align: center; color: var(--text-sub); background: #0f172a; border-radius: 12px; border: 1px dashed var(--border); margin-top: 15px;">
                    Chưa chạy quét dữ liệu. Vui lòng bấm một trong các nút quét phía trên.
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tab switching
        function switchTab(tabId) {
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
            
            event.target.classList.add('active');
            document.getElementById(tabId).classList.add('active');
        }

        // --- WebP Conversion Logic ---
        let imageList = [];
        let currentIndex = 0;
        let isProcessing = false;
        let totalSavings = 0;
        let consecutiveErrors = 0; // Đếm số lỗi liên tiếp để dừng nếu hệ thống sập hoàn toàn

        const btnScan = document.getElementById('btn-scan');
        const btnStart = document.getElementById('btn-start');
        const btnStop = document.getElementById('btn-stop');
        const btnHtaccess = document.getElementById('btn-htaccess');
        const logsContainer = document.getElementById('logs');
        const progressArea = document.getElementById('progress-area');
        const progressFill = document.getElementById('progress-fill');
        const progressLabel = document.getElementById('progress-label');
        const progressPercent = document.getElementById('progress-percent');
        
        const statTotal = document.getElementById('stat-total');
        const statProcessed = document.getElementById('stat-processed');
        const statSaving = document.getElementById('stat-saving');

        function addLog(text, type = 'info') {
            const div = document.createElement('div');
            div.textContent = `[${new Date().toLocaleTimeString()}] ${text}`;
            if (type === 'success') div.className = 'log-success';
            if (type === 'error') div.className = 'log-error';
            if (type === 'warn') div.className = 'log-warn';
            logsContainer.appendChild(div);
            logsContainer.scrollTop = logsContainer.scrollHeight;
        }

        btnScan.addEventListener('click', async () => {
            btnScan.disabled = true;
            addLog("Bắt đầu quét thư mục uploads...");
            try {
                const res = await fetch('?action=scan');
                const data = await res.json();
                if (data.success) {
                    imageList = data.images;
                    statTotal.textContent = imageList.length;
                    addLog(`Quét hoàn tất. Tìm thấy ${imageList.length} ảnh cần tối ưu.`, 'success');
                    if (imageList.length > 0) btnStart.disabled = false;
                } else {
                    addLog("Quét thất bại: " + data.message, 'error');
                }
            } catch (err) {
                addLog("Lỗi kết nối máy chủ: " + err.message, 'error');
            } finally {
                btnScan.disabled = false;
            }
        });

        btnStart.addEventListener('click', () => {
            isProcessing = true;
            btnScan.disabled = true;
            btnStart.disabled = true;
            btnStart.style.display = 'none';
            btnStop.style.display = 'inline-flex';
            progressArea.style.display = 'block';
            addLog("Bắt đầu hàng đợi chuyển đổi WebP...");
            processNext();
        });

        btnStop.addEventListener('click', () => {
            isProcessing = false;
            btnStop.disabled = true;
            addLog("Hành động: Đang dừng, chờ tệp tin hiện tại...", 'warn');
        });

        function formatBytes(bytes) {
            if (bytes <= 0) return '0 KB';
            if (bytes < 1024 * 1024) {
                return Math.round(bytes / 1024) + ' KB';
            }
            return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
        }

        async function processNext() {
            if (!isProcessing) {
                btnScan.disabled = false;
                btnStart.disabled = false;
                btnStart.style.display = 'inline-flex';
                btnStop.style.display = 'none';
                btnStop.disabled = false;
                addLog("Đã tạm dừng hàng đợi.", 'warn');
                return;
            }

            if (currentIndex >= imageList.length) {
                isProcessing = false;
                btnScan.disabled = false;
                btnStart.style.display = 'inline-flex';
                btnStart.disabled = true;
                btnStop.style.display = 'none';
                progressLabel.textContent = "Hoàn tất tối ưu hóa toàn bộ!";
                addLog("=== HOÀN TẤT TẤT CẢ TỆP HÌNH ẢNH ===", 'success');
                return;
            }

            const img = imageList[currentIndex];
            const percent = Math.round((currentIndex / imageList.length) * 100);
            
            progressFill.style.width = `${percent}%`;
            progressPercent.textContent = `${percent}%`;
            progressLabel.textContent = `Đang xử lý (${currentIndex + 1}/${imageList.length}): ${img.split('/').pop()}`;

            // Thiết lập timeout 25 giây cho mỗi yêu cầu để tránh bị treo vô hạn
            const controller = new AbortController();
            const timeoutId = setTimeout(() => controller.abort(), 25000);

            try {
                const res = await fetch('?action=convert', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ image: img, quality: 82 }),
                    signal: controller.signal
                });
                
                clearTimeout(timeoutId);

                if (!res.ok) {
                    throw new Error(`HTTP ${res.status}`);
                }

                const data = await res.json();
                if (data.success) {
                    const origSize = data.orig_size || 0;
                    const savedSize = data.saved_size || 0;
                    const diff = origSize - savedSize;
                    if (diff > 0) {
                        totalSavings += diff;
                        statSaving.textContent = formatBytes(totalSavings);
                    }

                    if (data.status === 'exists') {
                        addLog(`Bỏ qua: ${img.split('/').pop()} (Đã có bản WebP)`, 'info');
                    } else {
                        const savedKB = data.saved_size ? Math.round(data.saved_size / 1024) : 0;
                        addLog(`Thành công: Chuyển đổi ${img.split('/').pop()} sang WebP (${savedKB} KB)`, 'success');
                    }
                    consecutiveErrors = 0; // Reset số lỗi liên tiếp khi thành công
                    currentIndex++;
                    statProcessed.textContent = currentIndex;
                } else {
                    addLog(`Lỗi xử lý ${img.split('/').pop()}: ${data.message}`, 'error');
                    consecutiveErrors = 0; // Server vẫn phản hồi JSON hợp lệ, không tính là lỗi sập
                    currentIndex++;
                    statProcessed.textContent = currentIndex;
                }
            } catch (err) {
                clearTimeout(timeoutId);
                const isTimeout = err.name === 'AbortError';
                const errMsg = isTimeout ? 'Yêu cầu bị quá thời gian (Timeout 25s)' : err.message;
                addLog(`Lỗi khi xử lý ${img.split('/').pop()}: ${errMsg}`, 'error');
                
                consecutiveErrors++;
                currentIndex++; // BỎ QUA ảnh bị lỗi để tiếp tục hàng đợi!
                statProcessed.textContent = currentIndex;

                if (consecutiveErrors >= 5) {
                    isProcessing = false;
                    addLog("Hàng đợi bị dừng do gặp 5 lỗi kết nối/server liên tiếp. Vui lòng tải lại trang hoặc kiểm tra log server.", 'error');
                }
            }

            // Tiếp tục xử lý ảnh tiếp theo
            setTimeout(processNext, 50);
        }

        btnHtaccess.addEventListener('click', async () => {
            btnHtaccess.disabled = true;
            document.getElementById('htaccess-status').textContent = "Đang cấu hình...";
            try {
                const res = await fetch('?action=htaccess');
                const data = await res.json();
                if (data.success) {
                    document.getElementById('htaccess-status').style.color = '#10b981';
                    document.getElementById('htaccess-status').textContent = "Cấu hình thành công!";
                    addLog("Đã cập nhật .htaccess thành công!", 'success');
                } else {
                    document.getElementById('htaccess-status').style.color = '#ef4444';
                    document.getElementById('htaccess-status').textContent = "Lỗi ghi file.";
                }
            } catch (err) {
                addLog("Lỗi .htaccess: " + err.message, 'error');
            } finally {
                btnHtaccess.disabled = false;
            }
        });

        // --- Unused Images Cleaner Logic ---
        const btnScanAssets = document.getElementById('btn-scan-assets');
        const btnScanDB = document.getElementById('btn-scan-db');
        const cleanerResults = document.getElementById('cleaner-results');
        const cleanerResultsTitle = document.getElementById('cleaner-results-title');
        const btnDeleteAll = document.getElementById('btn-delete-all');
        const cleanerEmpty = document.getElementById('cleaner-empty');
        const resultsBody = document.getElementById('results-body');

        let currentUnusedItems = [];
        let currentType = '';

        // Render scanner results
        function renderResults(items, type) {
            currentUnusedItems = items;
            currentType = type;
            resultsBody.innerHTML = '';
            
            if (items.length === 0) {
                cleanerResults.style.display = 'none';
                cleanerEmpty.style.display = 'block';
                cleanerEmpty.textContent = "Không tìm thấy ảnh dư thừa nào! Hệ thống của bạn rất sạch.";
                return;
            }
            
            cleanerEmpty.style.display = 'none';
            cleanerResults.style.display = 'block';
            cleanerResultsTitle.textContent = `Tìm thấy ${items.length} ảnh không sử dụng (${type === 'assets' ? 'Giao diện' : 'Media DB'})`;
            
            items.forEach(item => {
                const tr = document.createElement('tr');
                
                // Filename col
                const tdName = document.createElement('td');
                tdName.textContent = item.filename;
                tdName.style.fontWeight = '600';
                tdName.style.color = '#fb7185';
                
                // Path col
                const tdPath = document.createElement('td');
                tdPath.textContent = item.filepath;
                tdPath.style.fontSize = '0.85rem';
                tdPath.style.fontFamily = 'JetBrains Mono, monospace';
                
                // Action col
                const tdAction = document.createElement('td');
                tdAction.style.textAlign = 'center';
                
                const delBtn = document.createElement('button');
                delBtn.className = 'btn btn-danger';
                delBtn.style.padding = '6px 12px';
                delBtn.style.fontSize = '0.8rem';
                delBtn.textContent = 'Xóa';
                
                delBtn.addEventListener('click', async () => {
                    if (!confirm(`Bạn có chắc chắn muốn XÓA VĨNH VIỄN tệp này?\nHành động này không thể hoàn tác!`)) {
                        return;
                    }
                    
                    delBtn.disabled = true;
                    delBtn.textContent = 'Đang xóa...';
                    
                    try {
                        let res, data;
                        if (type === 'assets') {
                            res = await fetch('?action=delete_asset', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify({ filepath: item.filepath })
                            });
                        } else {
                            res = await fetch('?action=delete_attachment', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify({ id: item.id })
                            });
                        }
                        
                        data = await res.json();
                        if (data.success) {
                            tr.remove();
                            // Decrease count on title
                            const currentCount = parseInt(cleanerResultsTitle.textContent.match(/\d+/)[0]);
                            if (currentCount - 1 === 0) {
                                renderResults([], type);
                            } else {
                                cleanerResultsTitle.textContent = `Tìm thấy ${currentCount - 1} ảnh không sử dụng (${type === 'assets' ? 'Giao diện' : 'Media DB'})`;
                            }
                            alert(data.message);
                        } else {
                            alert("Lỗi: " + data.message);
                            delBtn.disabled = false;
                            delBtn.textContent = 'Xóa';
                        }
                    } catch (err) {
                        alert("Lỗi kết nối máy chủ: " + err.message);
                        delBtn.disabled = false;
                        delBtn.textContent = 'Xóa';
                    }
                });
                
                tdAction.appendChild(delBtn);
                tr.appendChild(tdName);
                tr.appendChild(tdPath);
                tr.appendChild(tdAction);
                resultsBody.appendChild(tr);
            });
        }

        // Bulk Delete Action
        btnDeleteAll.addEventListener('click', async () => {
            if (currentUnusedItems.length === 0) return;
            if (!confirm(`Bạn có chắc chắn muốn XÓA VĨNH VIỄN TOÀN BỘ ${currentUnusedItems.length} ảnh không sử dụng này?\nHành động này không thể hoàn tác!`)) {
                return;
            }
            
            btnDeleteAll.disabled = true;
            const originalText = btnDeleteAll.innerHTML;
            btnDeleteAll.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Đang xóa hàng loạt...';
            
            let successCount = 0;
            let failCount = 0;
            
            for (let item of currentUnusedItems) {
                try {
                    let res, data;
                    if (currentType === 'assets') {
                        res = await fetch('?action=delete_asset', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({ filepath: item.filepath })
                        });
                    } else {
                        res = await fetch('?action=delete_attachment', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({ id: item.id })
                        });
                    }
                    data = await res.json();
                    if (data.success) {
                        successCount++;
                    } else {
                        failCount++;
                    }
                } catch (err) {
                    failCount++;
                }
            }
            
            alert(`Hoàn thành xóa hàng loạt!\n- Thành công: ${successCount}\n- Thất bại: ${failCount}`);
            btnDeleteAll.disabled = false;
            btnDeleteAll.innerHTML = originalText;
            
            // Re-trigger scanning to refresh the list
            if (currentType === 'assets') {
                btnScanAssets.click();
            } else {
                btnScanDB.click();
            }
        });

        // Scan local theme assets
        btnScanAssets.addEventListener('click', async () => {
            btnScanAssets.disabled = true;
            btnScanAssets.textContent = 'Đang quét...';
            cleanerEmpty.style.display = 'block';
            cleanerEmpty.textContent = 'Hệ thống đang tìm kiếm các liên kết ảnh giao diện trong toàn bộ mã nguồn tĩnh. Vui lòng chờ...';
            cleanerResults.style.display = 'none';

            try {
                const res = await fetch('?action=scan_theme_assets');
                const data = await res.json();
                
                if (data.success) {
                    renderResults(data.unused, 'assets');
                } else {
                    alert("Quét thất bại: " + data.message);
                }
            } catch (err) {
                alert("Lỗi kết nối: " + err.message);
            } finally {
                btnScanAssets.disabled = false;
                btnScanAssets.textContent = 'Quét ảnh giao diện (Assets)';
            }
        });

        // Scan media library database
        btnScanDB.addEventListener('click', async () => {
            btnScanDB.disabled = true;
            btnScanDB.textContent = 'Đang quét...';
            cleanerEmpty.style.display = 'block';
            cleanerEmpty.textContent = 'Đang truy vấn cơ sở dữ liệu WordPress & đối chiếu với nội dung bài viết. Vui lòng chờ...';
            cleanerResults.style.display = 'none';

            try {
                const res = await fetch('?action=scan_db_media');
                const data = await res.json();
                
                if (data.success) {
                    renderResults(data.unused, 'database');
                } else {
                    alert("Quét thất bại: " + data.message);
                }
            } catch (err) {
                alert("Lỗi kết nối: " + err.message);
            } finally {
                btnScanDB.disabled = false;
                btnScanDB.textContent = 'Quét ảnh thư viện (Media DB)';
            }
        });
    </script>
</body>
</html>
