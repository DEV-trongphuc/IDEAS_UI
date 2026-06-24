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
    
    // Get front page ID
    $stmt = $pdo->prepare("SELECT option_value FROM {$table_prefix}options WHERE option_name = 'page_on_front'");
    $stmt->execute();
    $front_page_id = $stmt->fetchColumn();
    
    echo "=== Front Page ID: $front_page_id ===\n";
    
    $pages_to_inspect = [];
    if ($front_page_id) {
        $pages_to_inspect[] = $front_page_id;
    }
    
    // Also inspect Page ID 4468 (khoa-hoc-online)
    $pages_to_inspect[] = 4468;
    
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
            
            // Print settings we might care about
            $settings = $el['settings'] ?? [];
            $relevant_settings = [];
            foreach ($settings as $key => $val) {
                if (strpos($key, 'query_') !== false || strpos($key, 'template_id') !== false || $key === 'posts_per_page' || $key === 'post_type' || strpos($key, 'taxonomy') !== false || strpos($key, 'posts_post_type') !== false) {
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
    
    foreach ($pages_to_inspect as $pid) {
        $stmt = $pdo->prepare("SELECT ID, post_title, post_name, post_status, post_type FROM {$table_prefix}posts WHERE ID = ?");
        $stmt->execute([$pid]);
        $post = $stmt->fetch();
        if ($post) {
            echo "\n==================================================\n";
            echo "PAGE ID: {$post['ID']}, Title: {$post['post_title']}, Slug: {$post['post_name']}\n";
            echo "==================================================\n";
            
            $meta_stmt = $pdo->prepare("SELECT meta_value FROM {$table_prefix}postmeta WHERE post_id = ? AND meta_key = '_elementor_data'");
            $meta_stmt->execute([$pid]);
            $elem_data_str = $meta_stmt->fetchColumn();
            
            if ($elem_data_str) {
                $elem_data = json_decode($elem_data_str, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    print_elements($elem_data);
                } else {
                    echo "JSON decode error: " . json_last_error_msg() . "\n";
                }
            } else {
                echo "No _elementor_data found.\n";
            }
        } else {
            echo "Post ID $pid not found.\n";
        }
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
