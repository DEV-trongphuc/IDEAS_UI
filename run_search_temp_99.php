<?php
header('Content-Type: text/plain; charset=utf-8');

$wp_load = '/home/vhvxoigh/ideas.edu.vn/wp-load.php';
if (!file_exists($wp_load)) {
    $wp_load = '/home/vhvxoigh/public_html/wp-load.php';
}

require_once $wp_load;
global $wpdb;

$content = $wpdb->get_var("SELECT post_content FROM {$wpdb->posts} WHERE ID = 8289");
echo chunk_split(base64_encode($content), 76, "\n");
