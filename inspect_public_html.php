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
    
    // Find in postmeta
    echo "=== SEARCHING FOR KEYWORDS IN POSTMETA (_elementor_data) ===\n";
    $stmt = $pdo->query("SELECT pm.post_id, p.post_title, p.post_name, p.post_type, pm.meta_key 
                         FROM {$table_prefix}postmeta pm 
                         INNER JOIN {$table_prefix}posts p ON pm.post_id = p.ID 
                         WHERE pm.meta_key = '_elementor_data' 
                         AND (pm.meta_value LIKE '%AI News%' OR pm.meta_value LIKE '%MSc AI%' OR pm.meta_value LIKE '%Podcast%')");
    $results = $stmt->fetchAll();
    foreach ($results as $r) {
        echo "Post ID: {$r['post_id']} | Slug: {$r['post_name']} | Title: {$r['post_title']} | Type: {$r['post_type']}\n";
    }
    
} catch (Exception $e) {
    echo "Database Error: " . $e->getMessage() . "\n";
}
