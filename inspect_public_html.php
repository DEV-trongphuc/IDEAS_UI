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
        echo "- Status: {$c['post_status']}, Count: {$c['count']}\n";
    }

    // Instantiate and debug TutorLms_Course_Grid widget query
    echo "\n=== Debugging TutorLms_Course_Grid Widget Query ===\n";
    $widget_file = '/home/vhvxoigh/public_html/wp-content/plugins/bdthemes-element-pack/modules/tutor-lms-course-grid/widgets/tutor-lms-course-grid.php';
    if (file_exists($widget_file)) {
        require_once $widget_file;
        $class_name = '\\ElementPack\\Modules\\TutorLmsCourseGrid\\Widgets\\TutorLms_Course_Grid';
        if (class_exists($class_name)) {
            echo "Class exists. Instantiating...\n";
            // Construct with dummy ID and data
            $widget = new $class_name([
                'id' => 'ac2f29f',
                'elType' => 'widget',
                'widgetType' => 'bdt-tutor-lms-course-grid',
                'settings' => [
                    'posts_per_page' => 100,
                ]
            ], null);
            
            // Set settings
            $widget->set_settings([
                'posts_per_page' => 100,
            ]);
            
            echo "Calling query_posts...\n";
            try {
                $widget->query_posts(100);
                $query = $widget->get_query();
                if ($query) {
                    echo "WP_Query args:\n";
                    echo var_export($query->query_vars, true) . "\n";
                    echo "SQL Query executed:\n";
                    echo $query->request . "\n";
                    echo "Found posts count: " . $query->found_posts . "\n";
                } else {
                    echo "Query is null\n";
                }
            } catch (\Exception $e) {
                echo "Exception during query: " . $e->getMessage() . "\n";
            }
        } else {
            echo "Class $class_name not found\n";
        }
    } else {
        echo "Widget file not found\n";
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
