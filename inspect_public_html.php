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
    
    $term_ids = [166, 167];
    foreach ($term_ids as $term_id) {
        echo "=== Term ID: $term_id ===\n";
        // Get term taxonomy details
        $term_stmt = $pdo->prepare("SELECT t.name, tt.taxonomy FROM {$table_prefix}terms t JOIN {$table_prefix}term_taxonomy tt ON t.term_id = tt.term_id WHERE t.term_id = ?");
        $term_stmt->execute([$term_id]);
        $term_info = $term_stmt->fetch();
        print_r($term_info);
        
        // Find posts linked to this term
        $posts_stmt = $pdo->prepare("
            SELECT p.ID, p.post_title, p.post_status, p.post_type, p.post_date 
            FROM {$table_prefix}posts p
            JOIN {$table_prefix}term_relationships tr ON p.ID = tr.object_id
            WHERE tr.term_taxonomy_id = (SELECT term_taxonomy_id FROM {$table_prefix}term_taxonomy WHERE term_id = ? LIMIT 1)
        ");
        $posts_stmt->execute([$term_id]);
        $posts = $posts_stmt->fetchAll();
        echo "Found " . count($posts) . " posts:\n";
        print_r($posts);
        echo "\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
