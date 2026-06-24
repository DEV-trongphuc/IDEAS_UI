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
    
    echo "=== CATEGORIES & POST COUNTS IN CHIEFAIOFFICER.VN ===\n";
    $sql = "SELECT t.term_id, t.name, t.slug, tt.count 
            FROM {$table_prefix}terms t 
            INNER JOIN {$table_prefix}term_taxonomy tt ON t.term_id = tt.term_id 
            WHERE tt.taxonomy = 'category' 
            ORDER BY tt.count DESC";
    $stmt = $pdo->query($sql);
    $categories = $stmt->fetchAll();
    foreach ($categories as $cat) {
        echo "ID: {$cat['term_id']} | Name: {$cat['name']} | Slug: {$cat['slug']} | Count: {$cat['count']}\n";
    }
    echo "\n";

    echo "=== RECENT POSTS ===\n";
    $stmt = $pdo->query("SELECT ID, post_title, post_date, post_status FROM {$table_prefix}posts WHERE post_type = 'post' ORDER BY post_date DESC LIMIT 10");
    $posts = $stmt->fetchAll();
    foreach ($posts as $p) {
        echo "ID: {$p['ID']} | Title: {$p['post_title']} | Date: {$p['post_date']} | Status: {$p['post_status']}\n";
    }
    
} catch (Exception $e) {
    echo "Database Error: " . $e->getMessage() . "\n";
}
