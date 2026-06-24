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
        die("No post found with slug 'khoa-hoc-online'\n");
    }
    
    $post_id = $posts[0]['ID'];
    echo "=== Page ID: $post_id, Title: {$posts[0]['post_title']} ===\n";
    
    $meta_stmt = $pdo->prepare("SELECT meta_value FROM {$table_prefix}postmeta WHERE post_id = ? AND meta_key = '_elementor_data'");
    $meta_stmt->execute([$post_id]);
    $elem_data_str = $meta_stmt->fetchColumn();
    
    if (!$elem_data_str) {
        die("No _elementor_data found for page $post_id\n");
    }
    
    $elem_data = json_decode($elem_data_str, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        die("JSON decode error: " . json_last_error_msg() . "\n");
    }
    
    function print_elements($elements, $depth = 0) {
        $indent = str_repeat("  ", $depth);
        foreach ($elements as $el) {
            $id = $el['id'] ?? 'unknown';
            $elType = $el['elType'] ?? 'unknown';
            $widgetType = $el['widgetType'] ?? '';
            
            echo $indent . "- [$elType] id: $id";
            if ($widgetType) {
                echo ", widgetType: $widgetType";
            }
            echo "\n";
            
            // Print settings we might care about (e.g. query settings, post type, taxonomies, template_id)
            $settings = $el['settings'] ?? [];
            $relevant_settings = [];
            foreach ($settings as $key => $val) {
                if (strpos($key, 'query_') !== false || strpos($key, 'template_id') !== false || $key === 'posts_per_page' || $key === 'post_type' || strpos($key, 'taxonomy') !== false) {
                    if (is_array($val)) {
                        $relevant_settings[$key] = json_encode($val);
                    } else {
                        $relevant_settings[$key] = $val;
                    }
                }
            }
            if (!empty($relevant_settings)) {
                echo $indent . "  Settings:\n";
                foreach ($relevant_settings as $key => $val) {
                    echo $indent . "    * $key: $val\n";
                }
            }
            
            if (isset($el['elements']) && is_array($el['elements'])) {
                print_elements($el['elements'], $depth + 1);
            }
        }
    }
    
    print_elements($elem_data);
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
