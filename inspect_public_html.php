<?php
header('Content-Type: text/plain; charset=utf-8');

echo "=== Global Account-Wide Search ===\n";

$pattern = "/home/vhvxoigh/*/wp-content/uploads/*/*/DUAL-DEGREE-1.webp";
$found = glob($pattern);

if (!empty($found)) {
    echo "Found DUAL-DEGREE-1.webp in " . count($found) . " locations:\n";
    foreach ($found as $f) {
        echo " - $f (" . filesize($f) . " bytes)\n";
        // List files in that directory
        $dir = dirname($f);
        echo "   Files in same folder:\n";
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                echo "    - $file\n";
            }
        }
    }
} else {
    echo "DUAL-DEGREE-1.webp NOT FOUND anywhere on the server uploads folders.\n";
}





