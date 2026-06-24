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
    
    // Query posts in AI News (term_id = 166)
    echo "=== POSTS IN CATEGORY: AI News (ID 166) ===\n";
    $sql = "SELECT p.ID, p.post_title, p.post_status, p.post_date 
            FROM {$table_prefix}posts p 
            INNER JOIN {$table_prefix}term_relationships tr ON p.ID = tr.object_id 
            INNER JOIN {$table_prefix}term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id 
            WHERE tt.term_id = 166 AND p.post_type = 'post' 
            ORDER BY p.post_date DESC";
    $stmt = $pdo->query($sql);
    $posts = $stmt->fetchAll();
    foreach ($posts as $p) {
        echo "ID: {$p['ID']} | Title: {$p['post_title']} | Status: {$p['post_status']} | Date: {$p['post_date']}\n";
    }
    echo "\n";
    
    // Query posts in MSc AI (term_id = 167)
    echo "=== POSTS IN CATEGORY: MSc AI (ID 167) ===\n";
    $sql = "SELECT p.ID, p.post_title, p.post_status, p.post_date 
            FROM {$table_prefix}posts p 
            INNER JOIN {$table_prefix}term_relationships tr ON p.ID = tr.object_id 
            INNER JOIN {$table_prefix}term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id 
            WHERE tt.term_id = 167 AND p.post_type = 'post' 
            ORDER BY p.post_date DESC";
    $stmt = $pdo->query($sql);
    $posts = $stmt->fetchAll();
    foreach ($posts as $p) {
        echo "ID: {$p['ID']} | Title: {$p['post_title']} | Status: {$p['post_status']} | Date: {$p['post_date']}\n";
    }
    
} catch (Exception $e) {
    echo "Database Error: " . $e->getMessage() . "\n";
}
