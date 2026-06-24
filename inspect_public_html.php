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
    
    $pid = 93; // Front Page
    $meta_stmt = $pdo->prepare("SELECT meta_value FROM {$table_prefix}postmeta WHERE post_id = ? AND meta_key = '_elementor_data'");
    $meta_stmt->execute([$pid]);
    $elem_data_str = $meta_stmt->fetchColumn();
    
    if (!$elem_data_str) {
        die("No _elementor_data found for page $pid\n");
    }
    
    $elem_data = json_decode($elem_data_str, true);
    
    $target_ids = ['7060231', '2b601b7'];
    
    function find_and_dump_elements($elements, $target_ids) {
        foreach ($elements as $el) {
            $id = $el['id'] ?? '';
            if (in_array($id, $target_ids)) {
                echo "=== Widget ID: $id, Type: {$el['widgetType']} ===\n";
                print_r($el['settings']);
                echo "\n";
            }
            if (isset($el['elements']) && is_array($el['elements'])) {
                find_and_dump_elements($el['elements'], $target_ids);
            }
        }
    }
    
    find_and_dump_elements($elem_data, $target_ids);
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
