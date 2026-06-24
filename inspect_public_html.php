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

    // Debug Tutor LMS courses directly
    echo "\n=== Direct Tutor LMS Courses Debug ===\n";
    $query = new \WP_Query([
        'post_type' => 'courses',
        'posts_per_page' => 10,
        'post_status' => 'publish'
    ]);
    
    echo "Found published courses: " . $query->found_posts . "\n";
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $id = get_the_ID();
            echo "- Course ID: $id, Title: " . get_the_title() . "\n";
            
            // Get all taxonomies for this post
            $taxonomies = get_post_taxonomies($id);
            if (!empty($taxonomies)) {
                echo "  Taxonomies:\n";
                foreach ($taxonomies as $tax) {
                    $terms = wp_get_post_terms($id, $tax, ['fields' => 'all']);
                    if (!is_wp_error($terms) && !empty($terms)) {
                        $term_names = array_map(function($t) { return $t->name . ' (ID: ' . $t->term_id . ')'; }, $terms);
                        echo "    * $tax: " . implode(', ', $term_names) . "\n";
                    }
                }
            }
        }
        wp_reset_postdata();
    } else {
        echo "No courses found via direct WP_Query\n";
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
