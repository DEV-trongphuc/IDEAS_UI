<?php
header('Content-Type: text/plain; charset=utf-8');

echo "=== Local Server Assets Copy ===\n";

$dest_dir = '/home/vhvxoigh/ideas.edu.vn/wp-content/new_public/LANDINGPAGE_MBA/assets';
if (!is_dir($dest_dir)) {
    mkdir($dest_dir, 0755, true);
}

$files_to_copy = [
    // Source => Destination
    '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2026/02/qualiopi_new1.webp' => "$dest_dir/qualiopi.webp",
    '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2023/11/cac-cap-do-giao-duc-rncp-1.webp' => "$dest_dir/rncp-1.webp",
    '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2023/11/cac-cap-do-giao-duc-rncp-2.webp' => "$dest_dir/rncp-2.webp",
    '/home/vhvxoigh/ideas.edu.vn/wp-content/uploads/2023/11/cac-cap-do-giao-duc-rncp-3.webp' => "$dest_dir/rncp-3.webp",
    '/home/vhvxoigh/workshop.chiefaiofficer.vn/wp-content/uploads/2025/05/erasmus-logo-site.png' => "$dest_dir/erasmus.png",
    '/home/vhvxoigh/workshop.chiefaiofficer.vn/wp-content/uploads/2025/05/dba-01.png' => "$dest_dir/estiam-dba-sample.png"
];

foreach ($files_to_copy as $src => $dest) {
    if (file_exists($src)) {
        if (copy($src, $dest)) {
            echo "Copied successfully:\n  Src: $src\n  Dest: $dest (" . filesize($dest) . " bytes)\n\n";
        } else {
            echo "Failed to copy:\n  Src: $src\n  Dest: $dest\n\n";
        }
    } else {
        echo "Source file does not exist:\n  Src: $src\n\n";
    }
}
