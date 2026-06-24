<?php
header('Content-Type: text/plain; charset=utf-8');

$wp_config_pub = '/home/vhvxoigh/public_html/wp-config.php';
if (!file_exists($wp_config_pub)) {
    die("ERROR: public_html/wp-config.php not found.\n");
}

$conf = file_get_contents($wp_config_pub);

$db_name = '';
$db_user = '';
$db_pass = '';
$db_host = 'localhost';
$table_prefix = 'wp_';

if (preg_match('/define\(\s*\'DB_NAME\'\s*,\s*\'([^\']+)\'\s*\)/', $conf, $m)) {
    $db_name = $m[1];
}
if (preg_match('/define\(\s*\'DB_USER\'\s*,\s*\'([^\']+)\'\s*\)/', $conf, $m)) {
    $db_user = $m[1];
}
if (preg_match('/define\(\s*\'DB_PASSWORD\'\s*,\s*\'([^\']+)\'\s*\)/', $conf, $m)) {
    $db_pass = $m[1];
}
if (preg_match('/define\(\s*\'DB_HOST\'\s*,\s*\'([^\']+)\'\s*\)/', $conf, $m)) {
    $db_host = $m[1];
}
if (preg_match('/\$table_prefix\s*=\s*\'([^\']+)\'/', $conf, $m)) {
    $table_prefix = $m[1];
}

try {
    $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8";
    $pdo = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    
    // Check active theme
    echo "=== ACTIVE THEME ===\n";
    $stmt = $pdo->query("SELECT option_value FROM {$table_prefix}options WHERE option_name IN ('template', 'stylesheet')");
    $themes = $stmt->fetchAll();
    foreach ($themes as $t) {
        echo "Theme option: {$t['option_value']}\n";
    }
    echo "\n";

    // Query _wp_page_template for page 4468
    echo "=== PAGE 4468 TEMPLATE ===\n";
    $stmt = $pdo->prepare("SELECT meta_value FROM {$table_prefix}postmeta WHERE post_id = 4468 AND meta_key = '_wp_page_template'");
    $stmt->execute();
    $meta = $stmt->fetch();
    if ($meta) {
        echo "Template: " . $meta['meta_value'] . "\n";
    } else {
        echo "No custom template metadata found.\n";
    }
    
} catch (Exception $e) {
    echo "Database Error: " . $e->getMessage() . "\n";
}
