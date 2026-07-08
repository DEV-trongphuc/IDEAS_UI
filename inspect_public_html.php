<?php
header('Content-Type: text/plain; charset=utf-8');

echo "=== FILE LISTING: wp-content/uploads/2025/10/ ===\n";
$dir10 = '/home/vhvxoigh/public_html/wp-content/uploads/2025/10';
if (is_dir($dir10)) {
    $files = scandir($dir10);
    foreach ($files as $f) {
        if ($f !== '.' && $f !== '..') {
            echo " - $f\n";
        }
    }
} else {
    echo "Directory not found.\n";
}

echo "\n=== FILE LISTING: wp-content/uploads/2025/11/ ===\n";
$dir11 = '/home/vhvxoigh/public_html/wp-content/uploads/2025/11';
if (is_dir($dir11)) {
    $files = scandir($dir11);
    foreach ($files as $f) {
        if ($f !== '.' && $f !== '..') {
            echo " - $f\n";
        }
    }
} else {
    echo "Directory not found.\n";
}

echo "\n=== FILE LISTING: wp-content/uploads/2025/02/ ===\n";
$dir02 = '/home/vhvxoigh/public_html/wp-content/uploads/2025/02';
if (is_dir($dir02)) {
    $files = scandir($dir02);
    foreach ($files as $f) {
        if ($f !== '.' && $f !== '..') {
            echo " - $f\n";
        }
    }
} else {
    echo "Directory not found.\n";
}

echo "\n=== Load WordPress & Query DB Attachments ===\n";
define('WP_USE_THEMES', false);
$wp_load_path = '/home/vhvxoigh/public_html/wp-load.php';
if (file_exists($wp_load_path)) {
    require_once $wp_load_path;
    echo "WordPress loaded.\n";
    global $wpdb;
    
    $keywords = ['degree', 'estiam', 'rb-dba', 'erasmus', 'accred'];
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
    
    echo "Total attachments found in DB: " . count($results) . "\n";
    foreach ($results as $id => $row) {
        $meta = get_post_meta($id, '_wp_attached_file', true);
        echo "ID: $id | Title: {$row['post_title']} | Meta File: $meta | GUID: {$row['guid']}\n";
    }
} else {
    echo "wp-load.php not found.\n";
}

