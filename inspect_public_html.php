<?php
header('Content-Type: text/plain; charset=utf-8');

echo "=== Load WordPress & Query All Attachments ===\n";
define('WP_USE_THEMES', false);
$wp_load_path = '/home/vhvxoigh/ideas.edu.vn/wp-load.php';
if (file_exists($wp_load_path)) {
    require_once $wp_load_path;
    echo "WordPress loaded.\n";
    global $wpdb;
    
    $rows = $wpdb->get_results(
        "SELECT ID, post_title, guid FROM {$wpdb->posts} WHERE post_type = 'attachment' ORDER BY ID DESC LIMIT 200",
        ARRAY_A
    );
    
    echo "Total attachments found (up to 200): " . count($rows) . "\n";
    foreach ($rows as $row) {
        $meta = get_post_meta($row['ID'], '_wp_attached_file', true);
        echo "ID: {$row['ID']} | Title: {$row['post_title']} | Meta: $meta | GUID: {$row['guid']}\n";
    }
} else {
    echo "wp-load.php not found.\n";
}
