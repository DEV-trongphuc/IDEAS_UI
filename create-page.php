<?php
/**
 * Standalone Page Creator for ISTEC Paris
 */
header('Content-Type: text/plain; charset=utf-8');

$_SERVER["HTTP_HOST"] = isset($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : "localhost";
$_SERVER["REQUEST_URI"] = "/";
define("ABSPATH", __DIR__ . "/");

if (file_exists(ABSPATH . "wp-load.php")) {
    require_once ABSPATH . "wp-load.php";
    echo "WordPress loaded successfully.\n";
    
    $slug = 'truong-kinh-doanh-istec-phap';
    
    // Check if page already exists
    $page = get_page_by_path($slug);
    
    if ($page) {
        echo "Page already exists! ID: " . $page->ID . "\n";
        // Ensure it is published
        if ($page->post_status !== 'publish') {
            wp_update_post([
                'ID' => $page->ID,
                'post_status' => 'publish'
            ]);
            echo "Updated page status to publish.\n";
        }
    } else {
        echo "Page does not exist. Creating page...\n";
        $page_id = wp_insert_post([
            'post_title'     => 'Trường Kinh doanh ISTEC Pháp',
            'post_name'      => $slug,
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'post_content'   => '', // Leave content empty so it renders the page template directly
            'post_author'    => 1
        ]);
        
        if (is_wp_error($page_id)) {
            echo "ERROR: Failed to create page. " . $page_id->get_error_message() . "\n";
        } else {
            echo "SUCCESS: Created page with ID: " . $page_id . "\n";
        }
    }
} else {
    echo "wp-load.php not found.\n";
}

// Self destruct
@unlink(__FILE__);
echo "\ncreate-page.php self-deleted.\n";
