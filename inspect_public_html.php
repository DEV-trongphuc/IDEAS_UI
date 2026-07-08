<?php
header('Content-Type: text/plain; charset=utf-8');

echo "=== Targeted Folder Scan ===\n";

$targets = [
    'workshop' => '/home/vhvxoigh/workshop.chiefaiofficer.vn',
    'main' => '/home/vhvxoigh/chiefaiofficer.vn',
    'public_html' => '/home/vhvxoigh/public_html'
];

foreach ($targets as $key => $path) {
    if (is_dir($path)) {
        echo "\nDirectory EXISTS: $path\n";
        // Check wp-content/uploads folder
        $uploads = "$path/wp-content/uploads";
        if (is_dir($uploads)) {
            echo " - Uploads folder exists: $uploads\n";
            // Find all webp files in uploads recursively (using a shallow glob search instead of deep recursive iterator to prevent timeouts)
            // We search under uploads/2025/*/*.webp or uploads/2026/*/*.webp
            $glob_patterns = [
                "$uploads/2025/10/*.webp",
                "$uploads/2025/10/*.png",
                "$uploads/2025/05/*.webp",
                "$uploads/2025/05/*.png"
            ];
            
            foreach ($glob_patterns as $pattern) {
                $found = glob($pattern);
                if (!empty($found)) {
                    echo "   Pattern: $pattern (Found " . count($found) . " files):\n";
                    foreach (array_slice($found, 0, 10) as $f) {
                        echo "     - " . basename($f) . " (" . filesize($f) . " bytes)\n";
                    }
                }
            }
        } else {
            echo " - Uploads folder NOT found.\n";
        }
    } else {
        echo "\nDirectory NOT FOUND: $path\n";
    }
}

