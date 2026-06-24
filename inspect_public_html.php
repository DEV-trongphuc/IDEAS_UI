<?php
header('Content-Type: text/plain; charset=utf-8');

$public_path = '/home/vhvxoigh/public_html';

function check_file_injection($path) {
    if (file_exists($path)) {
        echo "=== FILE: " . basename($path) . " ===\n";
        echo "Path: $path\n";
        echo "Size: " . filesize($path) . " bytes\n";
        echo "Modified: " . date('Y-m-d H:i:s', filemtime($path)) . "\n";
        
        $content = file_get_contents($path);
        // Display first 20 lines
        $lines = explode("\n", $content);
        echo "First 20 lines:\n";
        echo "------------------------------------\n";
        for ($i = 0; $i < min(20, count($lines)); $i++) {
            echo ($i + 1) . ": " . $lines[$i] . "\n";
        }
        echo "------------------------------------\n";
        
        // Display last 20 lines
        echo "Last 20 lines:\n";
        echo "------------------------------------\n";
        $total_lines = count($lines);
        for ($i = max(0, $total_lines - 20); $i < $total_lines; $i++) {
            echo ($i + 1) . ": " . $lines[$i] . "\n";
        }
        echo "------------------------------------\n\n";
    } else {
        echo "=== FILE NOT FOUND: $path ===\n\n";
    }
}

check_file_injection($public_path . '/wp-load.php');
check_file_injection($public_path . '/wp-content/themes/buddyboss-theme/functions.php');
check_file_injection($public_path . '/wp-content/themes/LANDINGPAGE_MBA/functions.php');
