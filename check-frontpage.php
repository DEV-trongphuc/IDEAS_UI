<?php
define('WP_USE_THEMES', false);
require_once __DIR__ . '/wp-load.php';

$show_on_front = get_option('show_on_front');
$page_on_front = get_option('page_on_front');

echo "show_on_front: " . $show_on_front . "<br>\n";
echo "page_on_front: " . $page_on_front . "<br>\n";

if ($page_on_front) {
    $post = get_post($page_on_front);
    echo "Front Page ID: " . $post->ID . "<br>\n";
    echo "Front Page Title: " . $post->post_title . "<br>\n";
    echo "Front Page Slug: " . $post->post_name . "<br>\n";
    echo "Front Page Template: " . get_post_meta($post->ID, '_wp_page_template', true) . "<br>\n";
} else {
    echo "Front Page is latest posts or not set.<br>\n";
}
