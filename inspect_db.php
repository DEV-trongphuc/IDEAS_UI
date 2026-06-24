<?php
header('Content-Type: text/plain; charset=utf-8');

$config_file = '/home/vhvxoigh/public_html/wp-config.php';
if (!file_exists($config_file)) {
    echo "wp-config.php not found.\n";
    exit;
}

$config_content = file_get_contents($config_file);
preg_match("/define\(\s*'DB_NAME'\s*,\s*'([^']+)'\s*\)/i", $config_content, $db_name);
preg_match("/define\(\s*'DB_USER'\s*,\s*'([^']+)'\s*\)/i", $config_content, $db_user);
preg_match("/define\(\s*'DB_PASSWORD'\s*,\s*'([^']+)'\s*\)/i", $config_content, $db_pass);
preg_match("/define\(\s*'DB_HOST'\s*,\s*'([^']+)'\s*\)/i", $config_content, $db_host);

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
