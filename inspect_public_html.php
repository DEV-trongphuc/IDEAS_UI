<?php
header('Content-Type: text/plain; charset=utf-8');

// Load WordPress
echo "=== Loading WordPress ===\n";
define('WP_USE_THEMES', false);
$wp_load_path = '/home/vhvxoigh/public_html/wp-load.php';
if (file_exists($wp_load_path)) {
    require_once $wp_load_path;
    echo "WordPress loaded successfully.\n";
    
    // Active plugins
    echo "\n=== Active Plugins ===\n";
    $active_plugins = get_option('active_plugins');
    if (is_array($active_plugins)) {
        foreach ($active_plugins as $plugin) {
            echo "- $plugin\n";
        }
    } else {
        echo "No active plugins found or not array: " . var_export($active_plugins, true) . "\n";
    }
    
    // Check post ID 4468 elementor data
    echo "\n=== Elementor Data for Post ID 4468 ===\n";
    global $wpdb;
    $meta_val = $wpdb->get_var($wpdb->prepare(
        "SELECT meta_value FROM {$wpdb->postmeta} WHERE post_id = %d AND meta_key = '_elementor_data'",
        4468
    ));
    if ($meta_val) {
        echo "Found elementor data (" . strlen($meta_val) . " bytes)\n";
        $data = json_decode($meta_val, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            // Let's traverse the layout to find all widgets
            function find_widgets($elements, &$widgets = []) {
                foreach ($elements as $el) {
                    if (isset($el['elType']) && $el['elType'] === 'widget') {
                        $widgets[] = [
                            'id' => $el['id'] ?? '',
                            'widgetType' => $el['widgetType'] ?? '',
                            'settings' => $el['settings'] ?? []
                        ];
                    }
                    if (isset($el['elements']) && is_array($el['elements'])) {
                        find_widgets($el['elements'], $widgets);
                    }
                }
                return $widgets;
            }
            $widgets = find_widgets($data);
            echo "List of widgets in the page layout:\n";
            foreach ($widgets as $w) {
                echo "  - Widget ID: {$w['id']}, Type: {$w['widgetType']}\n";
            }
        } else {
            echo "Failed to decode JSON: " . json_last_error_msg() . "\n";
        }
    } else {
        echo "No _elementor_data found for Post ID 4468\n";
    }

    // Count Tutor LMS courses
    echo "\n=== Tutor LMS Courses ===\n";
    $courses_count = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = 'courses' AND post_status = 'publish'");
    echo "Published courses count: $courses_count\n";
    
    // Check if there are other statuses
    $all_courses_count = $wpdb->get_results("SELECT post_status, COUNT(*) as count FROM {$wpdb->posts} WHERE post_type = 'courses' GROUP BY post_status", ARRAY_A);
    foreach ($all_courses_count as $c) {
    // Check if element_pack_is_widget_enabled returns true or false
    echo "\n=== Element Pack Widget Check ===\n";
    if (function_exists('element_pack_is_widget_enabled')) {
        $enabled = element_pack_is_widget_enabled('tutor-lms-course-grid');
        echo "element_pack_is_widget_enabled('tutor-lms-course-grid'): " . ($enabled ? 'true' : 'false') . "\n";
        
        $carousel_enabled = element_pack_is_widget_enabled('tutor-lms-course-carousel');
        echo "element_pack_is_widget_enabled('tutor-lms-course-carousel'): " . ($carousel_enabled ? 'true' : 'false') . "\n";
    } else {
        echo "element_pack_is_widget_enabled function not found\n";
    }

    // Let's print out what element_pack_third_party_widget option holds
    $third_party = get_option('element_pack_third_party_widget');
    echo "\n=== element_pack_third_party_widget option value ===\n";
    var_dump($third_party);
    
    // Let's check ModuleService class if we can
    if (class_exists('ElementPack\ModuleService')) {
        echo "\n=== ModuleService is active ===\n";
        $options = get_option('element_pack_third_party_widget', []);
        $is_active = \ElementPack\ModuleService::is_module_active('tutor-lms-course-grid', $options);
        echo "ModuleService::is_module_active('tutor-lms-course-grid'): " . ($is_active ? 'true' : 'false') . "\n";
    } else {
        echo "\nModuleService class not found\n";
    }





} else {
    echo "Failed to find wp-load.php at $wp_load_path\n";
}


// Print last 40 lines of error log to capture any errors
$log_path = '/home/vhvxoigh/public_html/error_log';
if (file_exists($log_path)) {
    echo "\n=== Last 40 lines of error_log ===\n";
    $lines = file($log_path);
    $last_lines = array_slice($lines, -40);
    echo implode("", $last_lines);
} else {
    echo "error_log not found\n";
}
