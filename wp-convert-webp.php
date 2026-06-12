<?php
/**
 * Standalone Utility: Batch WebP Converter & Link Optimizer
 * Path: /wp-convert-webp.php
 * 
 * Instructions:
 * 1. Upload this file to the root directory of your WordPress website.
 * 2. Log in as a WordPress Administrator.
 * 3. Access https://yourdomain.com/wp-convert-webp.php in your browser.
 * 4. Run the batch conversion process.
 * 5. Click "Cấu hình .htaccess" to enable dynamic WebP delivery without breaking any database links.
 */

// 1. Boot WordPress and Authenticate
if (file_exists('wp-load.php')) {
    require_once('wp-load.php');
    if (!current_user_can('manage_options')) {
        wp_die('<h3>Bạn không có quyền truy cập trang này. Vui lòng đăng nhập bằng tài khoản Administrator.</h3>');
    }
} else {
    // Standalone fallback if wp-load.php is not found (e.g. non-WP)
    session_start();
    define('SECURE_PASS', 'ideas_webp_2026'); // Security key
    
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
            <title>WebP Converter Authentication</title>
            <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
            <style>
                body {
                    font-family: 'Outfit', sans-serif;
                    background: #0f172a;
                    color: #e2e8f0;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    min-height: 100vh;
                    margin: 0;
                }
                .auth-box {
                    background: #1e293b;
                    padding: 40px;
                    border-radius: 20px;
                    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
                    width: 100%;
                    max-width: 400px;
                    text-align: center;
                    border: 1px solid rgba(255,255,255,0.05);
                }
                h2 { color: #f43f5e; margin-bottom: 24px; }
                input[type="password"] {
                    width: 100%;
                    padding: 12px;
                    border: 1px solid #475569;
                    background: #0f172a;
                    color: #fff;
                    border-radius: 10px;
                    box-sizing: border-box;
                    margin-bottom: 16px;
                    outline: none;
                    text-align: center;
                }
                button {
                    background: linear-gradient(135deg, #f43f5e, #be123c);
                    color: #fff;
                    border: none;
                    padding: 12px 24px;
                    border-radius: 10px;
                    font-weight: 600;
                    cursor: pointer;
                    width: 100%;
                }
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

// 2. Define Upload Directory Path
$upload_dir = 'wp-content/uploads';
if (!is_dir($upload_dir) && is_dir('../wp-content/uploads')) {
    $upload_dir = '../wp-content/uploads';
}

// 3. Helper Functions
function get_all_images($dir) {
    $images = [];
    if (!is_dir($dir)) return $images;
    
    $it = new RecursiveDirectoryIterator($dir);
    $display = new RecursiveIteratorIterator($it);
    foreach ($display as $file) {
        if ($file->isFile()) {
            $ext = strtolower(pathinfo($file->getPathname(), PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
                // Ensure we don't count existing .webp files
                $images[] = str_replace('\\', '/', $file->getPathname());
            }
        }
    }
    return $images;
}

function convert_to_webp($source_file, $quality = 82) {
    $dir = pathinfo($source_file, PATHINFO_DIRNAME);
    $filename = pathinfo($source_file, PATHINFO_FILENAME);
    $destination = $dir . '/' . $filename . '.webp';
    
    // Check if webp file already exists
    if (file_exists($destination)) {
        return ['status' => 'exists', 'destination' => $destination];
    }
    
    $ext = strtolower(pathinfo($source_file, PATHINFO_EXTENSION));
    
    // Check GD support
    if (!function_exists('imagecreatefromjpeg') && $ext === 'jpeg' || $ext === 'jpg') {
        return ['status' => 'error', 'message' => 'PHP GD library is missing JPEG support.'];
    }
    if (!function_exists('imagecreatefrompng') && $ext === 'png') {
        return ['status' => 'error', 'message' => 'PHP GD library is missing PNG support.'];
    }
    
    // Create image resource
    if ($ext === 'jpg' || $ext === 'jpeg') {
        $img = @imagecreatefromjpeg($source_file);
    } elseif ($ext === 'png') {
        $img = @imagecreatefrompng($source_file);
        if ($img) {
            imagepalettetotruecolor($img);
            imagealphablending($img, true);
            imagesavealpha($img, true);
        }
    } else {
        return ['status' => 'error', 'message' => 'Unsupported format.'];
    }
    
    if (!$img) {
        return ['status' => 'error', 'message' => 'Failed to read image source file.'];
    }
    
    // Save as webp
    $saved = @imagewebp($img, $destination, $quality);
    imagedestroy($img);
    
    if ($saved) {
        return ['status' => 'success', 'destination' => $destination, 'saved_size' => filesize($destination)];
    } else {
        return ['status' => 'error', 'message' => 'Failed to save WebP file.'];
    }
}

// 4. AJAX Handlers
if (isset($_GET['action'])) {
    header('Content-Type: application/json');
    
    if ($_GET['action'] === 'scan') {
        $images = get_all_images($upload_dir);
        echo json_encode([
            'success' => true,
            'total' => count($images),
            'images' => $images
        ]);
        exit;
    }
    
    if ($_GET['action'] === 'convert') {
        $data = json_decode(file_get_contents('php://input'), true);
        if (empty($data['image'])) {
            echo json_encode(['success' => false, 'message' => 'No image specified.']);
            exit;
        }
        
        $image = $data['image'];
        $quality = isset($data['quality']) ? intval($data['quality']) : 82;
        
        // Prevent path traversal
        if (strpos($image, '..') !== false || strpos($image, 'wp-content/uploads') === false) {
            echo json_encode(['success' => false, 'message' => 'Invalid image path.']);
            exit;
        }
        
        $res = convert_to_webp($image, $quality);
        echo json_encode(array_merge(['success' => $res['status'] !== 'error'], $res));
        exit;
    }
    
    if ($_GET['action'] === 'htaccess') {
        $htaccess_path = '.htaccess';
        if (!file_exists($htaccess_path) && file_exists('../.htaccess')) {
            $htaccess_path = '../.htaccess';
        }
        
        $rules = "\n# BEGIN WebP Redirection Rules (Safe & Non-Breaking)\n" .
                 "<IfModule mod_rewrite.c>\n" .
                 "  RewriteEngine On\n" .
                 "  # 1. Check if browser accepts WebP images\n" .
                 "  RewriteCond %{HTTP_ACCEPT} image/webp\n" .
                 "  # 2. Check if a corresponding WebP file exists next to original file\n" .
                 "  RewriteCond %{DOCUMENT_ROOT}/$1.webp -f\n" .
                 "  # 3. Silently serve the WebP file with correct content type\n" .
                 "  RewriteRule ^(wp-content/uploads/.*)\.(jpe?g|png)$ $1.webp [T=image/webp,E=accept:1,L]\n" .
                 "</IfModule>\n" .
                 "Header append Vary Accept env=REDIRECT_accept\n" .
                 "# END WebP Redirection Rules\n\n";
                 
        if (file_exists($htaccess_path)) {
            $content = file_get_contents($htaccess_path);
            if (strpos($content, 'BEGIN WebP Redirection Rules') !== false) {
                echo json_encode(['success' => true, 'message' => 'Cấu hình định tuyến WebP đã tồn tại trong .htaccess!']);
                exit;
            }
            
            // Insert rules at the very top of .htaccess
            $new_content = $rules . $content;
            if (@file_put_contents($htaccess_path, $new_content)) {
                echo json_encode(['success' => true, 'message' => 'Đã tự động cập nhật .htaccess thành công!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Không thể ghi đè .htaccess. Vui lòng copy thủ công mã cấu hình.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Không tìm thấy file .htaccess ở thư mục gốc.']);
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
    <title>Công cụ Tối ưu hóa Ảnh WebP - IDEAS Education</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=JetBrains+Mono&display=swap" rel="stylesheet">
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
        body {
            font-family: 'Outfit', sans-serif;
            background: var(--bg-dark);
            color: var(--text-main);
            margin: 0;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        }
        .container {
            width: 100%;
            max-width: 900px;
        }
        header {
            text-align: center;
            margin-bottom: 40px;
        }
        header h1 {
            font-weight: 800;
            font-size: 2.5rem;
            margin: 0 0 10px 0;
            background: linear-gradient(135deg, #f43f5e, #fb7185);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        header p { color: var(--text-sub); margin: 0; }
        .card {
            background: var(--card-dark);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid var(--border);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            margin-bottom: 24px;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--border);
            padding-bottom: 12px;
            color: #fb7185;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn {
            background: linear-gradient(135deg, var(--primary), #be123c);
            color: #fff;
            border: none;
            padding: 14px 28px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(244, 63, 94, 0.3);
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(244, 63, 94, 0.4);
        }
        .btn:disabled {
            background: #475569;
            box-shadow: none;
            cursor: not-allowed;
            transform: none;
        }
        .btn-secondary {
            background: #334155;
            box-shadow: none;
        }
        .btn-secondary:hover {
            background: #475569;
            box-shadow: none;
        }
        .progress-container {
            margin: 24px 0;
            display: none;
        }
        .progress-bar-bg {
            height: 12px;
            background: #0f172a;
            border-radius: 6px;
            overflow: hidden;
            position: relative;
        }
        .progress-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, #f43f5e, #10b981);
            width: 0%;
            transition: width 0.1s ease;
        }
        .progress-text {
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
            color: var(--text-sub);
            margin-top: 8px;
            font-weight: 600;
        }
        .console-logs {
            background: #020617;
            border-radius: 12px;
            padding: 20px;
            height: 300px;
            overflow-y: auto;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.85rem;
            border: 1px solid var(--border);
            color: #38bdf8;
            margin-top: 20px;
        }
        .console-logs div { margin-bottom: 6px; line-height: 1.4; }
        .log-success { color: #34d399; }
        .log-error { color: #f87171; }
        .log-warn { color: #fbbf24; }
        
        .code-box {
            background: #020617;
            padding: 20px;
            border-radius: 12px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.85rem;
            color: #a7f3d0;
            overflow-x: auto;
            border: 1px solid var(--border);
            margin: 15px 0;
        }
        
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 24px;
        }
        .stat-card {
            background: #0f172a;
            padding: 15px;
            border-radius: 12px;
            text-align: center;
            border: 1px solid var(--border);
        }
        .stat-num { font-size: 1.5rem; font-weight: 800; color: #fb7185; }
        .stat-label { font-size: 0.8rem; color: var(--text-sub); text-transform: uppercase; margin-top: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>WebP Media Optimizer</h1>
            <p>Giải pháp tối ưu hóa hình ảnh hàng loạt, tự động chuyển đổi sang WebP & giữ nguyên liên kết gốc</p>
        </header>

        <!-- Step 1: Scan & Convert -->
        <div class="card">
            <div class="card-title">
                <span>Trình chuyển đổi tệp hàng loạt</span>
                <span style="font-size: 0.8rem; background: #334155; padding: 4px 10px; border-radius: 20px; color: #fff;">GD / Imagick</span>
            </div>
            
            <p style="color: var(--text-sub); font-size: 0.95rem; margin-top: 0;">Quét thư mục uploads và chuyển đổi tất cả hình ảnh (.jpg, .jpeg, .png) sang phiên bản WebP tương ứng. Ảnh WebP mới sẽ được lưu cạnh tệp ảnh cũ (ví dụ: <code>photo.jpg</code> và <code>photo.webp</code>).</p>
            
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
                <div>[Hệ thống] Nhấp "Quét thư viện ảnh" để bắt đầu tìm kiếm tệp...</div>
            </div>
        </div>

        <!-- Step 2: Htaccess Routing -->
        <div class="card">
            <div class="card-title">Cấu hình định tuyến ảnh thông minh (.htaccess)</div>
            <p style="color: var(--text-sub); font-size: 0.95rem; margin-top: 0;">Phương pháp này sử dụng máy chủ Apache để tự động trả về tệp WebP đã tối ưu nếu trình duyệt của người dùng có hỗ trợ WebP. <strong>Liên kết ảnh trên trang và cơ sở dữ liệu không cần thay đổi, loại bỏ hoàn toàn khả năng lỗi link ảnh!</strong></p>
            
            <div class="code-box">
# Cấu hình tự động chuyển hướng sang WebP khi có tệp tương ứng
&lt;IfModule mod_rewrite.c&gt;
  RewriteEngine On
  RewriteCond %{HTTP_ACCEPT} image/webp
  RewriteCond %{DOCUMENT_ROOT}/$1.webp -f
  RewriteRule ^(wp-content/uploads/.*)\.(jpe?g|png)$ $1.webp [T=image/webp,E=accept:1,L]
&lt;/IfModule&gt;
            </div>

            <div style="display: flex; gap: 12px; align-items: center;">
                <button class="btn btn-secondary" id="btn-htaccess">Tự động cấu hình .htaccess</button>
                <span id="htaccess-status" style="font-size: 0.9rem; font-weight: 600;"></span>
            </div>
        </div>
    </div>

    <script>
        let imageList = [];
        let currentIndex = 0;
        let isProcessing = false;
        let totalSavings = 0;

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

        // Scan images
        btnScan.addEventListener('click', async () => {
            btnScan.disabled = true;
            addLog("Bắt đầu quét thư mục uploads...");
            
            try {
                const res = await fetch('?action=scan');
                const data = await res.json();
                
                if (data.success) {
                    imageList = data.images;
                    statTotal.textContent = imageList.length;
                    addLog(`Đã quét xong. Tìm thấy ${imageList.length} tệp hình ảnh (.jpg, .jpeg, .png).`, 'success');
                    
                    if (imageList.length > 0) {
                        btnStart.disabled = false;
                    }
                } else {
                    addLog("Quét thất bại: " + data.message, 'error');
                }
            } catch (err) {
                addLog("Lỗi kết nối máy chủ: " + err.message, 'error');
            } finally {
                btnScan.disabled = false;
            }
        });

        // Start conversion
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

        // Stop process
        btnStop.addEventListener('click', () => {
            isProcessing = false;
            btnStop.disabled = true;
            addLog("Hành động: Đã nhấn tạm dừng. Chờ hoàn thành tệp hiện tại...", 'warn');
        });

        async function processNext() {
            if (!isProcessing) {
                btnScan.disabled = false;
                btnStart.disabled = false;
                btnStart.style.display = 'inline-flex';
                btnStop.style.display = 'none';
                btnStop.disabled = false;
                addLog("Hàng đợi chuyển đổi đã tạm dừng.", 'warn');
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

            try {
                const res = await fetch('?action=convert', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ image: img, quality: 82 })
                });
                
                const data = await res.json();
                
                if (data.success) {
                    if (data.status === 'exists') {
                        addLog(`Bỏ qua: ${img.split('/').pop()} (Đã có bản WebP)`, 'info');
                    } else {
                        // Success conversion
                        const savedKB = data.saved_size ? Math.round(data.saved_size / 1024) : 0;
                        addLog(`Thành công: Chuyển đổi ${img.split('/').pop()} sang WebP (${savedKB} KB)`, 'success');
                    }
                    currentIndex++;
                    statProcessed.textContent = currentIndex;
                } else {
                    addLog(`Lỗi xử lý ${img.split('/').pop()}: ${data.message}`, 'error');
                    // Continue to next despite error
                    currentIndex++;
                }
            } catch (err) {
                addLog(`Lỗi kết nối khi xử lý tệp: ${err.message}`, 'error');
                isProcessing = false;
            }

            // Small delay to prevent CPU choking
            setTimeout(processNext, 50);
        }

        // Configure htaccess
        btnHtaccess.addEventListener('click', async () => {
            btnHtaccess.disabled = true;
            document.getElementById('htaccess-status').textContent = "Đang xử lý...";
            
            try {
                const res = await fetch('?action=htaccess');
                const data = await res.json();
                
                if (data.success) {
                    document.getElementById('htaccess-status').style.color = '#10b981';
                    document.getElementById('htaccess-status').textContent = "Cấu hình thành công!";
                    addLog("Cập nhật định tuyến .htaccess thành công!", 'success');
                } else {
                    document.getElementById('htaccess-status').style.color = '#ef4444';
                    document.getElementById('htaccess-status').textContent = "Không thành công.";
                    addLog("Cấu hình .htaccess thất bại: " + data.message, 'error');
                }
            } catch (err) {
                addLog("Lỗi kết nối .htaccess: " + err.message, 'error');
            } finally {
                btnHtaccess.disabled = false;
            }
        });
    </script>
</body>
</html>
