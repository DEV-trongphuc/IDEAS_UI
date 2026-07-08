<?php
header('Content-Type: text/plain; charset=utf-8');

// Load WordPress bootstrap to get DB connection details
$wp_load = '/home/vhvxoigh/ideas.edu.vn/wp-load.php';
if (!file_exists($wp_load)) {
    $wp_load = '/home/vhvxoigh/public_html/wp-load.php';
}

if (!file_exists($wp_load)) {
    die("Error: wp-load.php not found.");
}

require_once $wp_load;
global $wpdb;

echo "=== Database Search for Page Content ===\n";

$query = "SELECT ID, post_title, post_name, post_content FROM {$wpdb->posts} WHERE post_content LIKE '%ideas_program_benefit%' OR post_content LIKE '%Estiam & RB College%' LIMIT 10";
$rows = $wpdb->get_results($query);

$results = [];
foreach ($rows as $row) {
    $results[] = [
        'id' => $row->ID,
        'title' => $row->post_title,
        'slug' => $row->post_name,
        'content_length' => strlen($row->post_content)
    ];
}

echo json_encode($results, JSON_PRETTY_PRINT);
