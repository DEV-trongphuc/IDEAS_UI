<?php
header('Content-Type: text/plain; charset=utf-8');

echo "=== Load WordPress & Query Accreditation Attachments ===\n";
define('WP_USE_THEMES', false);
$wp_load_path = '/home/vhvxoigh/ideas.edu.vn/wp-load.php';
if (file_exists($wp_load_path)) {
    require_once $wp_load_path;
    echo "WordPress loaded.\n";
    global $wpdb;
    
    $keywords = ['qualiopi', 'rncp', 'asic', 'ukrlp', 'ukr', 'degree'];
    $results = [];
    foreach ($keywords as $kw) {
        $like = '%' . $wpdb->esc_like($kw) . '%';
        $query = $wpdb->prepare(
            "SELECT ID, post_title, guid FROM {$wpdb->posts} WHERE post_type = 'attachment' AND (post_title LIKE %s OR guid LIKE %s)",
            $like, $like
        );
        $rows = $wpdb->get_results($query, ARRAY_A);
        foreach ($rows as $row) {
            $results[$row['ID']] = $row;
        }
    }
    
    echo "Total attachments found: " . count($results) . "\n";
    foreach ($results as $id => $row) {
        $meta = get_post_meta($id, '_wp_attached_file', true);
        echo "ID: $id | Title: {$row['post_title']} | Meta File: $meta | GUID: {$row['guid']}\n";
    }
} else {
    echo "wp-load.php not found.\n";
}
