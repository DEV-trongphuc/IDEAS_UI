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

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    
    // Find post with slug 'khoa-hoc-online'
    $stmt = $pdo->prepare("SELECT ID, post_title, post_name, post_status, post_type FROM {$table_prefix}posts WHERE post_name = 'khoa-hoc-online'");
    $stmt->execute();
    $posts = $stmt->fetchAll();
    
    if (empty($posts)) {
        echo "No post found with slug 'khoa-hoc-online'\n";
    } else {
        foreach ($posts as $post) {
            $post_id = $post['ID'];
            echo "=== Page: {$post['post_title']} (ID: $post_id) ===\n";
            $meta_stmt = $pdo->prepare("SELECT meta_value FROM {$table_prefix}postmeta WHERE post_id = ? AND meta_key = '_elementor_data'");
            $meta_stmt->execute([$post_id]);
            $elem_data = $meta_stmt->fetchColumn();
            echo "--- _elementor_data ---\n";
            echo $elem_data . "\n";
        }
    }
    
} catch (Exception $e) {
    echo "DB Error: " . $e->getMessage() . "\n";
}
