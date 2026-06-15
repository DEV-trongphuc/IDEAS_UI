<?php
/**
 * export_references.php
 * Temporarily query the database for all posts, meta, and option values to find in-use images.
 */

$secret = 'vhvxoigh_ideas_restore_2026';
if (!isset($_GET['secret']) || $_GET['secret'] !== $secret) {
    header('HTTP/1.0 403 Forbidden');
    echo 'Forbidden';
    exit;
}

if (!file_exists('wp-load.php')) {
    header('HTTP/1.0 500 Internal Server Error');
    echo 'wp-load.php not found';
    exit;
}

require_once('wp-load.php');
global $wpdb;

// 1. Get all posts content
$posts_content = $wpdb->get_col("SELECT post_content FROM {$wpdb->posts}");

// 2. Get all metadata containing uploads references or numbers
$meta_values = $wpdb->get_col(
    "SELECT meta_value FROM {$wpdb->postmeta} WHERE meta_value LIKE '%wp-content/uploads/%' OR meta_key = '_thumbnail_id' OR meta_value REGEXP '^[0-9]+$'"
);

// 3. Get all options containing uploads references
$option_values = $wpdb->get_col(
    "SELECT option_value FROM {$wpdb->options} WHERE option_value LIKE '%wp-content/uploads/%' OR option_value LIKE '%ideas.edu.vn%'"
);

header('Content-Type: text/plain; charset=utf-8');
echo implode("\n", $posts_content) . "\n" . implode("\n", $meta_values) . "\n" . implode("\n", $option_values);
exit;
