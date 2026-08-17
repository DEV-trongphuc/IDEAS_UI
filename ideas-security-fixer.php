<?php
/**
 * IDEAS Security Cleaner & Malware Remover
 * Specially designed to detect and eradicate ClickFix / Fake Cloudflare / ServiceWorker Malware
 * Usage: https://ideas.edu.vn/ideas-security-fixer.php?key=ideas_clean_2026_sec_fix[&clean=1][&delete=1]
 */

@ini_set('memory_limit', '512M');
@set_time_limit(300);

$secret_key = 'ideas_clean_2026_sec_fix';
if (!isset($_GET['key']) || $_GET['key'] !== $secret_key) {
    header('HTTP/1.0 403 Forbidden');
    die('<h1>403 Forbidden - Unauthorized Access</h1>');
}

$do_clean = isset($_GET['clean']) && $_GET['clean'] === '1';
$do_delete = isset($_GET['delete']) && $_GET['delete'] === '1';

header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>IDEAS Security Cleaner Report</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #0f172a; color: #e2e8f0; padding: 30px; line-height: 1.6; }
        .box { max-width: 1000px; margin: 0 auto; background: #1e293b; padding: 30px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); }
        h1 { color: #38bdf8; margin-top: 0; }
        h2 { color: #f43f5e; border-bottom: 1px solid #334155; padding-bottom: 8px; margin-top: 30px; }
        .danger { color: #fb7185; font-weight: bold; }
        .success { color: #4ade80; font-weight: bold; }
        .warning { color: #fbbf24; }
        pre { background: #090d16; padding: 15px; border-radius: 8px; overflow-x: auto; font-size: 13px; border: 1px solid #334155; }
        .btn { display: inline-block; padding: 10px 20px; background: #e11d48; color: #fff; text-decoration: none; border-radius: 6px; font-weight: bold; margin-top: 15px; }
        .btn-green { background: #059669; }
    </style>
</head>
<body>
<div class="box">
    <h1>🛡️ IDEAS Security Scanner & Malware Remover</h1>
    <p>Chế độ: <strong><?php echo $do_clean ? '<span class="success">CLEAN & REPAIR ACTIVE</span>' : '<span class="warning">SCAN ONLY (Dry Run)</span>'; ?></strong></p>

<?php

$infected_files = [];
$infected_db_records = [];
$cleaned_files = [];
$cleaned_db = [];
$deleted_suspicious_files = [];

// 1. BOOT WORDPRESS
$wp_loaded = false;
if (file_exists(__DIR__ . '/wp-load.php')) {
    require_once __DIR__ . '/wp-load.php';
    $wp_loaded = true;
    echo "<p class='success'>✓ WordPress Core loaded successfully.</p>";
} else {
    echo "<p class='danger'>✗ wp-load.php not found. Proceeding with file-only scan.</p>";
}

// 2. SCAN WORDPRESS DATABASE
if ($wp_loaded) {
    echo "<h2>1. Quét Cơ sở dữ liệu WordPress (Database Scan)</h2>";
    global $wpdb;

    // Scan wp_options for malicious scripts
    $options = $wpdb->get_results("SELECT option_id, option_name, option_value FROM {$wpdb->options} WHERE option_value LIKE '%data-sc-%' OR option_value LIKE '%sc_%' OR option_value LIKE '%serviceWorker%' OR option_value LIKE '%fromCharCode%' OR option_value LIKE '%eval(%' OR option_value LIKE '%base64_decode%'");

    if (!empty($options)) {
        foreach ($options as $opt) {
            $is_bad = false;
            // Check if matches malicious malware pattern
            if (preg_match('/(data-sc-|sc_[a-z0-9]+|serviceWorker.*postMessage|atob\(v\.c\))/i', $opt->option_value)) {
                $is_bad = true;
                $infected_db_records[] = [
                    'table' => 'options',
                    'id' => $opt->option_id,
                    'name' => $opt->option_name,
                    'preview' => substr($opt->option_value, 0, 200)
                ];

                if ($do_clean) {
                    // Clean option
                    $cleaned_value = preg_replace('/<script[^>]*data-sc-[^>]*>.*?<\/script>/is', '', $opt->option_value);
                    $cleaned_value = preg_replace('/<script[^>]*>.*?serviceWorker.*?<\/script>/is', '', $cleaned_value);
                    $wpdb->update($wpdb->options, ['option_value' => $cleaned_value], ['option_id' => $opt->option_id]);
                    $cleaned_db[] = "Option '{$opt->option_name}' (ID: {$opt->option_id}) cleaned.";
                }
            }
        }
    }

    // Scan active plugins list
    $active_plugins = get_option('active_plugins');
    if (is_array($active_plugins)) {
        echo "<p>Active Plugins (" . count($active_plugins) . "): " . implode(', ', $active_plugins) . "</p>";
    }

    if (empty($infected_db_records)) {
        echo "<p class='success'>✓ Không tìm thấy mã độc trong bảng wp_options.</p>";
    } else {
        echo "<p class='danger'>Phát hiện " . count($infected_db_records) . " bản ghi Database bị nhiễm:</p><pre>";
        print_r($infected_db_records);
        echo "</pre>";
    }
}

// 3. SCAN FILESYSTEM
echo "<h2>2. Quét Tệp tin Hệ thống & WordPress Core (Filesystem Scan)</h2>";

$scan_dirs = [
    __DIR__ . '/wp-includes',
    __DIR__ . '/wp-admin',
    __DIR__ . '/wp-content',
    __DIR__
];

$malware_regexes = [
    '/data-sc-[a-f0-9]+/i',
    '/sc_[a-f0-9]{6,8}/i',
    '/navigator\[[^\]]*73657276696365576f726b6572/i', // serviceWorker hex
    '/atob\(v\.c\)/i',
    '/\$GLOBALS\[[\'"]\\x[a-f0-9]{2}/i',
    '/eval\s*\(\s*base64_decode/i',
    '/eval\s*\(\s*gzinflate/i',
    '/eval\s*\(\s*str_rot13/i'
];

$root_dir = realpath(__DIR__);
$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($root_dir, RecursiveDirectoryIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST
);

$scanned_count = 0;
foreach ($iterator as $item) {
    if ($item->isFile()) {
        $path = $item->getPathname();
        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        // Skip non-code files and large static assets
        if (!in_array($ext, ['php', 'js', 'html', 'phtml', 'ico', 'htaccess'])) {
            continue;
        }

        // Skip self
        if (basename($path) === basename(__FILE__)) {
            continue;
        }

        // Check 1: PHP files in uploads folder (High Risk / Backdoor)
        if (strpos($path, DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR) !== false && in_array($ext, ['php', 'phtml', 'php5', 'suspected'])) {
            $deleted_suspicious_files[] = $path;
            if ($do_clean) {
                @unlink($path);
            }
            continue;
        }

        $scanned_count++;
        $content = @file_get_contents($path);
        if ($content === false || empty($content)) continue;

        $matched_rule = null;
        foreach ($malware_regexes as $rgx) {
            if (preg_match($rgx, $content)) {
                $matched_rule = $rgx;
                break;
            }
        }

        if ($matched_rule) {
            $rel_path = str_replace($root_dir . DIRECTORY_SEPARATOR, '', $path);
            $infected_files[] = [
                'file' => $rel_path,
                'rule' => $matched_rule
            ];

            if ($do_clean) {
                // If it's pure malware file, delete it. If it's injected into a core WP file, sanitize it.
                if (strpos($path, 'wp-includes') !== false || strpos($path, 'wp-admin') !== false || basename($path) === 'index.php' || basename($path) === 'wp-login.php' || basename($path) === 'wp-settings.php') {
                    // Sanitize injected code
                    $sanitized = preg_replace('/<script[^>]*data-sc-[^>]*>.*?<\/script>/is', '', $content);
                    $sanitized = preg_replace('/<script[^>]*>.*?navigator\[.*?73657276696365576f726b6572.*?<\/script>/is', '', $sanitized);
                    $sanitized = preg_replace('/\/\*.*?\*\/@?eval\(.*?\);/is', '', $sanitized);
                    
                    if ($sanitized !== $content) {
                        file_put_contents($path, $sanitized);
                        $cleaned_files[] = "Đã bóc tách mã độc khỏi file core: " . $rel_path;
                    }
                } else if (strpos($path, 'wp-content/themes') === false && strpos($path, 'wp-content/new_public') === false) {
                    // Backdoor or rogue file
                    @unlink($path);
                    $cleaned_files[] = "Đã xóa file độc hại: " . $rel_path;
                }
            }
        }
    }
}

echo "<p>Đã quét <strong>{$scanned_count}</strong> tệp tin mã nguồn.</p>";

if (!empty($deleted_suspicious_files)) {
    echo "<h3>Tệp tin PHP khả nghi trong thư mục Uploads:</h3><pre>";
    print_r($deleted_suspicious_files);
    echo "</pre>";
}

if (empty($infected_files)) {
    echo "<p class='success'>✓ Không phát hiện file nào chứa chữ ký mã độc ClickFix trong danh sách quét.</p>";
} else {
    echo "<p class='danger'>Phát hiện " . count($infected_files) . " file bị nhiễm mã độc:</p><pre>";
    print_r($infected_files);
    echo "</pre>";
}

// 4. CLEANUP RESULTS
if ($do_clean) {
    echo "<h2>3. Kết quả Dọn dẹp & Khắc phục (Cleanup Actions)</h2>";
    if (!empty($cleaned_files) || !empty($cleaned_db)) {
        echo "<pre>";
        print_r(array_merge($cleaned_files, $cleaned_db));
        echo "</pre>";
    } else {
        echo "<p class='success'>Không có file hoặc database record nào cần dọn thêm.</p>";
    }

    // 5. PURGE ALL CACHE
    echo "<h2>4. Xóa Bộ nhớ Cache (Purge Cache)</h2>";
    if (function_exists('opcache_reset')) {
        opcache_reset();
        echo "<p class='success'>✓ OPCache reset thành công!</p>";
    }
    if (function_exists('litespeed_purge_all')) {
        litespeed_purge_all();
        echo "<p class='success'>✓ LiteSpeed Cache Purge All thành công!</p>";
    } else if (class_exists('LiteSpeed\Purge')) {
        \LiteSpeed\Purge::purge_all();
        echo "<p class='success'>✓ LiteSpeed Class Purge All thành công!</p>";
    }
}

// Action Buttons
echo "<div style='margin-top:30px; padding:20px; background:#0b1120; border-radius:8px;'>";
echo "<h3>Thao tác:</h3>";
if (!$do_clean) {
    echo "<a class='btn' href='?key={$secret_key}&clean=1'>🚀 TIẾN HÀNH DỌN SẠCH MÃ ĐỘC NGAY (CLEAN NOW)</a> ";
} else {
    echo "<a class='btn btn-green' href='?key={$secret_key}&clean=1'>🔄 QUÉT VÀ DỌN LẠI (RE-SCAN & CLEAN)</a> ";
}

if ($do_delete) {
    @unlink(__FILE__);
    echo "<p class='success' style='margin-top:15px;'>✓ Script 'ideas-security-fixer.php' đã tự hủy thành công khỏi server để bảo mật!</p>";
} else {
    echo " <a class='btn' style='background:#475569;' href='?key={$secret_key}&delete=1'>🗑️ TỰ HỦY SCRIPT NÀY KHỎI SERVER (SELF-DESTRUCT)</a>";
}
echo "</div>";

?>
</div>
</body>
</html>
