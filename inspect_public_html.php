<?php
header('Content-Type: text/plain; charset=utf-8');

echo "=== Search Main Site Uploads ===\n";

$uploads = "/home/vhvxoigh/chiefaiofficer.vn/wp-content/uploads";
if (is_dir($uploads)) {
    $pattern = "$uploads/*/*/DUAL-DEGREE-1.webp";
    $found = glob($pattern);
    if (!empty($found)) {
        echo "Found DUAL-DEGREE-1.webp in: " . dirname($found[0]) . "\n";
        // List all files in that directory
        $dir = dirname($found[0]);
        $files = scandir($dir);
        foreach ($files as $f) {
            if ($f !== '.' && $f !== '..') {
                echo " - $f (" . filesize("$dir/$f") . " bytes)\n";
            }
        }
    } else {
        echo "DUAL-DEGREE-1.webp not found in $uploads.\n";
    }
} else {
    echo "Main site uploads directory not found.\n";
}



