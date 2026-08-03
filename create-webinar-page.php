<?php
// Load WordPress bootstrap
require_once(__DIR__ . '/wp-load.php');

// Define page slug and template name
$slug = 'webinar-ideas-talk';
$template = 'page-webinar-ideas-talk.php';

// Check if page already exists
$page = get_page_by_path($slug);

if ($page) {
    // Update existing page template
    update_post_meta($page->ID, '_wp_page_template', $template);
    echo "SUCCESS: Existing page updated to use template: $template";
} else {
    // Create new page
    $page_id = wp_insert_post(array(
        'post_title'    => 'Webinar Ideas Talk',
        'post_name'     => $slug,
        'post_status'   => 'publish',
        'post_type'     => 'page',
        'meta_input'    => array(
            '_wp_page_template' => $template
        )
    ));
    
    if (is_wp_error($page_id)) {
        echo "ERROR: Failed to create page: " . $page_id->get_error_message();
    } else {
        echo "SUCCESS: Page created with ID $page_id using template: $template";
    }
}
