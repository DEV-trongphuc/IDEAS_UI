<?php
header('Content-Type: text/plain; charset=utf-8');

$plugins_path = '/home/vhvxoigh/public_html/wp-content/plugins';

if (!file_exists($plugins_path)) {
    echo "Plugins directory not found at $plugins_path\n";
    exit;
}

echo "=== PLUGINS IN PUBLIC_HTML ===\n";
$dirs = scandir($plugins_path);
foreach ($dirs as $dir) {
    if ($dir === '.' || $dir === '..') continue;
    $path = $plugins_path . '/' . $dir;
    if (is_dir($path)) {
        $mtime = date('Y-m-d H:i:s', filemtime($path));
        echo "  [DIR] $dir (Modified: $mtime)\n";
    } else {
        $size = filesize($path);
        $mtime = date('Y-m-d H:i:s', filemtime($path));
        echo "  [FILE] $dir - $size bytes (Modified: $mtime)\n";
    }
}

echo "\n=== WP_OPTIONS ACTIVE PLUGINS ===\n";
// Let's connect to the database to see which plugins are active
$config_file = '/home/vhvxoigh/public_html/wp-config.php';
if (file_exists($config_file)) {
    $config_content = file_get_contents($config_file);
    preg_match("/define\(\s*'DB_NAME'\s*,\s*'([^']+)'\s*\)/i", $config_content, $db_name);
    preg_match("/define\(\s*'DB_USER'\s*,\s*'([^']+)'\s*\)/i", $config_content, $db_user);
    preg_match("/define\(\s*'DB_PASSWORD'\s*,\s*'([^']+)'\s*\)/i", $config_content, $db_pass);
    preg_match("/define\(\s*'DB_HOST'\s*,\s*'([^']+)'\s*\)/i", $config_content, $db_host);
    
    // Prefix
    $table_prefix = 'wp_';
    if (preg_match('/\$table_prefix\s*=\s*\'([^\']+)\'/i', $config_content, $prefix_match)) {
        $table_prefix = $prefix_match[1];
    }
    
    if (isset($db_name[1]) && isset($db_user[1]) && isset($db_pass[1])) {
        $host = isset($db_host[1]) ? $db_host[1] : 'localhost';
        try {
            $pdo = new PDO("mysql:host=$host;dbname={$db_name[1]};charset=utf8", $db_user[1], $db_pass[1]);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $pdo->prepare("SELECT option_value FROM {$table_prefix}options WHERE option_name = 'active_plugins'");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $active_plugins = unserialize($row['option_value']);
                echo "Active plugins in DB:\n";
                foreach ($active_plugins as $plugin) {
                    echo "  - $plugin\n";
                }
            } else {
                echo "active_plugins option not found in DB.\n";
            }
        } catch (Exception $e) {
            echo "Database connection error: " . $e->getMessage() . "\n";
        }
    } else {
        echo "Could not parse DB credentials from wp-config.php.\n";
    }
} else {
    echo "wp-config.php not found.\n";
}
