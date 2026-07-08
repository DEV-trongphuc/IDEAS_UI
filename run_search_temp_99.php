<?php
header('Content-Type: text/plain; charset=utf-8');

echo "=== Copying DUAL-DEGREE-5.webp ===\n";
$src = '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2026/07/DUAL-DEGREE-5.webp';
$dest = '/home/vhvxoigh/ideas.edu.vn/wp-content/new_public/LANDINGPAGE_MBA/assets/DUAL-DEGREE-5.webp';

if (file_exists($src)) {
    if (copy($src, $dest)) {
        echo "SUCCESS: Copied DUAL-DEGREE-5.webp to assets (" . filesize($dest) . " bytes)\n";
    } else {
        echo "FAILED: Copy DUAL-DEGREE-5.webp\n";
    }
} else {
    echo "NOT FOUND: Source " . $src . "\n";
}
