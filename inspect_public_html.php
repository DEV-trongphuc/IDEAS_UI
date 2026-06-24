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
    
    // Get _elementor_data
    $stmt = $pdo->prepare("SELECT meta_value FROM {$table_prefix}postmeta WHERE post_id = 4468 AND meta_key = '_elementor_data'");
    $stmt->execute();
    $meta = $stmt->fetch();
    
    if ($meta && !empty($meta['meta_value'])) {
        $json_data = $meta['meta_value'];
        echo "Elementor data size: " . strlen($json_data) . " bytes\n";
        
        // Let's decode the JSON and search for widget settings
        $data = json_decode($json_data, true);
        if ($data === null) {
            echo "JSON decoding failed: " . json_last_error_msg() . "\n";
        } else {
            // Recursive function to search widgets
            function find_widgets($elements, &$results) {
                foreach ($elements as $el) {
                    if (isset($el['elType']) && $el['elType'] === 'widget') {
                        $results[] = $el;
                    }
                    if (isset($el['elements']) && is_array($el['elements'])) {
                        find_widgets($el['elements'], $results);
                    }
                }
            }
            
            $widgets = [];
            find_widgets($data, $widgets);
            echo "Found " . count($widgets) . " Elementor widgets on the page.\n\n";
            
            foreach ($widgets as $idx => $w) {
                $widgetType = isset($w['widgetType']) ? $w['widgetType'] : 'unknown';
                $settings = isset($w['settings']) ? $w['settings'] : [];
                
                // Let's check if this widget has settings related to query or title
                $has_heading = false;
                $heading_text = '';
                foreach ($settings as $k => $v) {
                    if (is_string($v) && (strpos($v, 'News') !== false || strpos($v, 'MSc') !== false || strpos($v, 'Podcast') !== false || strpos($v, 'Tin tức') !== false)) {
                        $has_heading = true;
                        $heading_text = $v;
                    }
                }
                
                if ($has_heading || $widgetType === 'posts' || $widgetType === 'loop-grid' || $widgetType === 'archive-posts' || strpos($widgetType, 'post') !== false) {
                    echo "Widget #$idx | Type: $widgetType\n";
                    if ($has_heading) {
                        echo "  Heading Text/Content: " . strip_tags($heading_text) . "\n";
                    }
                    // Print query settings if they exist
                    $query_keys = ['posts_post_type', 'posts_category', 'posts_posts_per_page', 'query_args', 'posts_query_id', 'select_post_type', 'posts_include', 'posts_exclude', 'post_type', 'posts_order_by', 'posts_order'];
                    foreach ($query_keys as $qk) {
                        if (isset($settings[$qk])) {
                            echo "  $qk: " . (is_array($settings[$qk]) ? json_encode($settings[$qk]) : $settings[$qk]) . "\n";
                        }
                    }
                    // Look for any keys containing 'query' or 'categories'
                    foreach ($settings as $sk => $sv) {
                        if (strpos($sk, 'query') !== false || strpos($sk, 'categories') !== false || strpos($sk, 'taxonomy') !== false || strpos($sk, 'term') !== false) {
                            echo "  $sk: " . (is_array($sv) ? json_encode($sv) : $sv) . "\n";
                        }
                    }
                    echo "\n";
                }
            }
        }
    } else {
        echo "No Elementor data metadata found for page 4468.\n";
    }
    
} catch (Exception $e) {
    echo "Database Error: " . $e->getMessage() . "\n";
}
