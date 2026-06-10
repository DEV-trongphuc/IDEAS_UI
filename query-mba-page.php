<?php
define('WP_USE_THEMES', false);
$wp_load_path = __DIR__;
while (!file_exists($wp_load_path . '/wp-load.php')) {
    $parent = dirname($wp_load_path);
    if ($parent === $wp_load_path) {
        die("Could not find wp-load.php");
    }
    $wp_load_path = $parent;
}
require_once $wp_load_path . '/wp-load.php';

$posts = get_posts(array(
    'name'        => 'thac-si-quan-tri-kinh-doanh-mba',
    'post_type'   => 'page',
    'post_status' => 'any',
    'numberposts' => 1
));

if (empty($posts)) {
    echo "PAGE_NOT_FOUND\n";
    exit;
}

$post = $posts[0];
echo "TITLE: " . $post->post_title . "\n";
echo "SLUG: " . $post->post_name . "\n";
echo "ID: " . $post->ID . "\n";
echo "TEMPLATE: " . get_post_meta($post->ID, '_wp_page_template', true) . "\n";
echo "METADATA:\n";
$meta = get_post_meta($post->ID);
foreach ($meta as $key => $values) {
    echo "  $key: " . implode(', ', $values) . "\n";
}
echo "\nCONTENT:\n" . $post->post_content . "\n";
