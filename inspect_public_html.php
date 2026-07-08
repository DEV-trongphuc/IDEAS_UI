<?php
header('Content-Type: text/plain; charset=utf-8');

echo "=== Search All Uploads Subfolders ===\n";

$uploads = "/home/vhvxoigh/workshop.chiefaiofficer.vn/wp-content/uploads";
if (is_dir($uploads)) {
    // Search recursively for DUAL-DEGREE files in any year/month subfolder
    $patterns = [
        "$uploads/*/*/DUAL-DEGREE*",
        "$uploads/*/*/dual-degree*",
        "$uploads/*/*/Erasmus*",
        "$uploads/*/*/erasmus*"
    ];
    
    foreach ($patterns as $pattern) {
        $found = glob($pattern);
        if (!empty($found)) {
            echo "\nPattern: $pattern (Found " . count($found) . " files):\n";
            foreach ($found as $f) {
                echo " - " . str_replace('/home/vhvxoigh/workshop.chiefaiofficer.vn/', '', $f) . " (" . filesize($f) . " bytes)\n";
            }
        } else {
            echo "Pattern: $pattern (0 files found)\n";
        }
    }
} else {
    echo "Uploads directory not found.\n";
}


