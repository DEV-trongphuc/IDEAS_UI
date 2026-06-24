<?php
header('Content-Type: text/plain; charset=utf-8');

$config_path = '/home/vhvxoigh/public_html/wp-config.php';
if (!file_exists($config_path)) {
    die("wp-config.php not found at $config_path");
}

$config_content = file_get_contents($config_path);

// Parse DB credentials using regex
preg_match("/define\(\s*['\"]DB_NAME['\"]\s*,\s*['\"](.*?)['\"]\s*\)/", $config_content, $db_name_matches);
preg_match("/define\(\s*['\"]DB_USER['\"]\s*,\s*['\"](.*?)['\"]\s*\)/", $config_content, $db_user_matches);
preg_match("/define\(\s*['\"]DB_PASSWORD['\"]\s*,\s*['\"](.*?)['\"]\s*\)/", $config_content, $db_password_matches);
preg_match("/define\(\s*['\"]DB_HOST['\"]\s*,\s*['\"](.*?)['\"]\s*\)/", $config_content, $db_host_matches);
preg_match("/\\\$table_prefix\s*=\s*['\"](.*?)['\"]/", $config_content, $prefix_matches);

$db_name = $db_name_matches[1] ?? '';
$db_user = $db_user_matches[1] ?? '';
$db_password = $db_password_matches[1] ?? '';
$db_host = $db_host_matches[1] ?? 'localhost';
$table_prefix = $prefix_matches[1] ?? 'wp_';

echo "DB Host: $db_host\n";
echo "DB Name: $db_name\n";
echo "DB User: $db_user\n";
echo "Table Prefix: $table_prefix\n\n";

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    
    // Find post with slug 'khoa-hoc-online'
    $stmt = $pdo->prepare("SELECT ID, post_title, post_name, post_status, post_type FROM {$table_prefix}posts WHERE post_name = 'khoa-hoc-online'");
    $stmt->execute();
    $posts = $stmt->fetchAll();
    
    echo "=== Posts with slug 'khoa-hoc-online' ===\n";
    print_r($posts);
    
    if (empty($posts)) {
        echo "No post found with slug 'khoa-hoc-online'\n";
    } else {
        foreach ($posts as $post) {
            $post_id = $post['ID'];
            echo "\n--- Meta for Post ID $post_id ---\n";
            $meta_stmt = $pdo->prepare("SELECT meta_key, SUBSTRING(meta_value, 1, 300) as meta_val_snippet, LENGTH(meta_value) as val_len FROM {$table_prefix}postmeta WHERE post_id = ?");
            $meta_stmt->execute([$post_id]);
            $metas = $meta_stmt->fetchAll();
            foreach ($metas as $meta) {
                echo "Key: {$meta['meta_key']} (Len: {$meta['val_len']}): {$meta['meta_val_snippet']}\n";
            }
        }
    }
    
} catch (Exception $e) {
    echo "DB Error: " . $e->getMessage() . "\n";
}
