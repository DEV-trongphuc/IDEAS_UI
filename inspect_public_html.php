<?php
header('Content-Type: text/plain; charset=utf-8');

$wp_config_pub = '/home/vhvxoigh/public_html/wp-config.php';
if (!file_exists($wp_config_pub)) {
    die("ERROR: public_html/wp-config.php not found.\n");
}

$conf = file_get_contents($wp_config_pub);

// Extract DB credentials
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
    
    echo "=== SEARCHING ALL PUBLISHED PAGES ===\n";
    $stmt = $pdo->query("SELECT ID, post_title, post_name, post_type FROM {$table_prefix}posts WHERE post_status = 'publish' AND post_type = 'page' ORDER BY post_title ASC");
    $pages = $stmt->fetchAll();
    foreach ($pages as $p) {
        echo "ID: {$p['ID']} | Slug: {$p['post_name']} | Title: {$p['post_title']}\n";
    }
    echo "\n";
    
    echo "=== SEARCHING FOR PAGES CONTAINING SPECIFIC KEYWORDS ===\n";
    $stmt = $pdo->query("SELECT ID, post_title, post_name, post_content FROM {$table_prefix}posts WHERE post_status = 'publish' AND (post_content LIKE '%AI News%' OR post_content LIKE '%MSc AI%' OR post_content LIKE '%Podcast%')");
    $matched = $stmt->fetchAll();
    foreach ($matched as $m) {
        echo "ID: {$m['ID']} | Slug: {$m['post_name']} | Title: {$m['post_title']} | Type: {$m['post_type']}\n";
        echo "Content Snippet: " . substr(strip_tags($m['post_content']), 0, 200) . "...\n\n";
    }
    
} catch (Exception $e) {
    echo "Database Error: " . $e->getMessage() . "\n";
}
