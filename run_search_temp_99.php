<?php
header('Content-Type: text/plain; charset=utf-8');

$wp_load = '/home/vhvxoigh/ideas.edu.vn/wp-load.php';
if (!file_exists($wp_load)) {
    $wp_load = '/home/vhvxoigh/public_html/wp-load.php';
}

require_once $wp_load;
global $wpdb;

echo "=== Copying Files to Assets ===\n";
$dest_dir = '/home/vhvxoigh/ideas.edu.vn/wp-content/new_public/LANDINGPAGE_MBA/assets';
if (!is_dir($dest_dir)) {
    mkdir($dest_dir, 0755, true);
}

$copies = [
    '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2022/02/icon1.webp' => "$dest_dir/icon1.webp",
    '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2022/02/icon2.webp' => "$dest_dir/icon2.webp",
    '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2022/02/icon3.webp' => "$dest_dir/icon3.webp",
    '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2022/02/icon4.webp' => "$dest_dir/icon4.webp",
    '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2025/04/AI.webp' => "$dest_dir/AI.webp"
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
$replacements = [
    'https://ideas.edu.vn/wp-content/new_public/data_imgs/icon1.webp' => '/wp-content/new_public/LANDINGPAGE_MBA/assets/icon1.webp',
    'https://ideas.edu.vn/wp-content/new_public/data_imgs/icon2.webp' => '/wp-content/new_public/LANDINGPAGE_MBA/assets/icon2.webp',
    'https://ideas.edu.vn/wp-content/new_public/data_imgs/icon3.webp' => '/wp-content/new_public/LANDINGPAGE_MBA/assets/icon3.webp',
    'https://ideas.edu.vn/wp-content/new_public/data_imgs/icon4.webp' => '/wp-content/new_public/LANDINGPAGE_MBA/assets/icon4.webp',
    'https://ideas.edu.vn/wp-content/new_public/data_imgs/AI.webp' => '/wp-content/new_public/LANDINGPAGE_MBA/assets/AI.webp'
];

foreach ($replacements as $old => $new) {
    $rows_affected = $wpdb->query(
        $wpdb->prepare(
            "UPDATE {$wpdb->posts} SET post_content = REPLACE(post_content, %s, %s) WHERE ID = 8289",
            $old,
            $new
        )
    );
    echo "Replaced '$old' -> '$new' | Rows affected: $rows_affected\n";
}

echo "Database updates complete.\n";
