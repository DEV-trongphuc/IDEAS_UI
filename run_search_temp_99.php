<?php
header('Content-Type: text/plain; charset=utf-8');

$wp_load = '/home/vhvxoigh/ideas.edu.vn/wp-load.php';
if (!file_exists($wp_load)) {
    $wp_load = '/home/vhvxoigh/public_html/wp-load.php';
}

require_once $wp_load;
global $wpdb;

echo "=== Copying New Assets ===\n";
$dest_dir = '/home/vhvxoigh/ideas.edu.vn/wp-content/new_public/LANDINGPAGE_MBA/assets';
if (!is_dir($dest_dir)) {
    mkdir($dest_dir, 0755, true);
}

$copies = [
    '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2026/07/bang_dba_estiam.webp' => "$dest_dir/bang_dba_estiam.webp",
    '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2026/07/kiemdinhdba-1.webp' => "$dest_dir/kiemdinhdba-1.webp",
    '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2026/07/kiemdinhdba-2.webp' => "$dest_dir/kiemdinhdba-2.webp",
    '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2026/07/kiemdinhdba-3.webp' => "$dest_dir/kiemdinhdba-3.webp",
    '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2026/07/kiemdinhdba-4.webp' => "$dest_dir/kiemdinhdba-4.webp"
];

foreach ($copies as $src => $dest) {
    if (file_exists($src)) {
        if (copy($src, $dest)) {
            echo "SUCCESS: Copied " . basename($src) . " to assets (" . filesize($dest) . " bytes)\n";
        } else {
            echo "FAILED: Copy " . basename($src) . "\n";
        }
    } else {
        echo "NOT FOUND: Source " . $src . "\n";
    }
}

echo "\n=== Updating Database Page Content ===\n";

// Fetch current post content to print or update
$content = $wpdb->get_var("SELECT post_content FROM {$wpdb->posts} WHERE ID = 8289");

$old_url_1 = 'https://ideas.edu.vn/wp-content/uploads/2025/03/UMEF-EMBA-Degree-2025.webp';
$old_url_2 = 'http://ideas.edu.vn/wp-content/uploads/2025/03/UMEF-EMBA-Degree-2025.webp';
$old_url_3 = '/wp-content/uploads/2025/03/UMEF-EMBA-Degree-2025.webp';
$new_url = '/wp-content/new_public/LANDINGPAGE_MBA/assets/bang_dba_estiam.webp';

$updated_content = str_replace([$old_url_1, $old_url_2, $old_url_3], $new_url, $content);

if ($updated_content !== $content) {
    $rows_affected = $wpdb->query(
        $wpdb->prepare(
            "UPDATE {$wpdb->posts} SET post_content = %s WHERE ID = 8289",
            $updated_content
        )
    );
    echo "Updated French degree sample in DB | Rows affected: $rows_affected\n";
} else {
    echo "French degree sample URL was already updated or not found in current post content.\n";
}
