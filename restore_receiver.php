<?php
/**
 * restore_receiver.php
 * Standalone tool to extract restored_uploads.zip on the server.
 * Upload this script and restored_uploads.zip to the website root, then access it.
 */

// Passcode to prevent unauthorized execution
define('ACCESS_PASS', 'ideas_restore_2026');

if (isset($_GET['run']) && $_GET['run'] === ACCESS_PASS) {
    $zip_file = __DIR__ . '/restored_uploads.zip';
    if (!file_exists($zip_file)) {
        die("<h3>Lỗi: Không tìm thấy file 'restored_uploads.zip' ở thư mục gốc. Vui lòng upload file zip trước!</h3>");
    }
    
    echo "<h3>Bắt đầu giải nén restored_uploads.zip...</h3>";
    $zip = new ZipArchive;
    if ($zip->open($zip_file) === TRUE) {
        $zip->extractTo(__DIR__);
        $zip->close();
        
        // Delete zip file after extraction to free up space
        @unlink($zip_file);
        
        echo "<h3 style='color:green;'>Thành công! Toàn bộ ảnh đã được khôi phục về đúng thư mục.</h3>";
        echo "<p>Vui lòng xóa file <strong>restore_receiver.php</strong> này ngay lập tức để bảo mật!</p>";
    } else {
        echo "<h3 style='color:red;'>Lỗi: Không thể mở hoặc giải nén file ZIP.</h3>";
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Khôi phục Ảnh từ Backup - IDEAS</title>
    <style>
        body { font-family: Arial, sans-serif; background: #0f172a; color: #f8fafc; padding: 80px 20px; display: flex; justify-content: center; }
        .card { background: #1e293b; padding: 40px; border-radius: 20px; max-width: 500px; width: 100%; border: 1px solid rgba(255,255,255,0.06); box-shadow: 0 10px 30px rgba(0,0,0,0.15); text-align: center; }
        h2 { color: #fb7185; margin-top: 0; }
        p { color: #94a3b8; font-size: 15px; line-height: 1.6; }
        .btn { background: linear-gradient(135deg, #f43f5e, #be123c); color: white; padding: 14px 28px; border: none; border-radius: 10px; cursor: pointer; font-size: 16px; font-weight: bold; text-decoration: none; display: inline-block; margin-top: 24px; transition: all 0.3s; }
        .btn:hover { transform: translateY(-1px); box-shadow: 0 4px 15px rgba(244, 63, 94, 0.4); }
    </style>
</head>
<body>
    <div class="card">
        <h2>Khôi phục Ảnh từ Backup</h2>
        <p>1. Upload file <strong>restored_uploads.zip</strong> lên thư mục gốc website bằng cPanel File Manager.</p>
        <p>2. Upload file <strong>restore_receiver.php</strong> này lên cùng thư mục gốc.</p>
        <p>3. Nhấp vào nút phía dưới để giải nén tự động.</p>
        <a href="?run=<?php echo ACCESS_PASS; ?>" class="btn">Bắt đầu giải nén & Khôi phục</a>
    </div>
</body>
</html>
