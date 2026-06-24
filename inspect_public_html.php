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

echo "DB Host: $db_host\n";
echo "DB Name: $db_name\n";
echo "DB User: $db_user\n";
echo "Table Prefix: $table_prefix\n";

try {
    $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8";
    $pdo = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    echo "Connected successfully to chiefaiofficer.vn database!\n\n";
    
    // Find the post/page with slug 'khoa-hoc-online'
    $stmt = $pdo->prepare("SELECT ID, post_title, post_content, post_status, post_type FROM {$table_prefix}posts WHERE post_name = ? AND post_status = 'publish'");
    $stmt->execute(['khoa-hoc-online']);
    $post = $stmt->fetch();
    
    if ($post) {
        echo "=== Page Found ===\n";
        echo "ID: " . $post['ID'] . "\n";
        echo "Title: " . $post['post_title'] . "\n";
        echo "Type: " . $post['post_type'] . "\n";
        echo "Status: " . $post['post_status'] . "\n";
        echo "=== Content ===\n";
        echo $post['post_content'] . "\n";
        echo "===============\n";
    } else {
        echo "Page with slug 'khoa-hoc-online' not found in posts table.\n";
    }
} catch (Exception $e) {
    echo "Database Error: " . $e->getMessage() . "\n";
}
