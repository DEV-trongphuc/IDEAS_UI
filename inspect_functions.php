<?php
header('Content-Type: text/plain; charset=utf-8');

$public_path = '/home/vhvxoigh/public_html';

function check_file($path) {
    echo "=== FILE: " . basename(dirname($path)) . '/' . basename($path) . " ===\n";
    if (!file_exists($path)) {
        echo "Status: NOT FOUND\n\n";
        return;
    }
    
    $size = filesize($path);
    $mtime = date('Y-m-d H:i:s', filemtime($path));
    echo "Size: $size bytes\n";
    echo "Modified: $mtime\n";
    
    $fp = fopen($path, 'r');
    if ($fp) {
        $first_line = fgets($fp);
        $second_line = fgets($fp);
        fclose($fp);
        echo "Line 1: " . trim($first_line) . "\n";
        echo "Line 2: " . trim($second_line) . "\n";
        
        // Simple search for malware signatures
        $content = file_get_contents($path);
        if (strpos($content, 'eval(') !== false || strpos($content, 'base64_decode(') !== false || strpos($content, '$_POST') !== false || strpos($content, '@ini_set') !== false) {
            echo "Status: SUSPICIOUS PATTERNS FOUND\n";
        } else {
            echo "Status: Looks clean\n";
        }
    } else {
        echo "Status: COULD NOT OPEN FILE\n";
    }
    echo "\n";
}

check_file($public_path . '/wp-content/themes/buddyboss-theme/functions.php');
check_file($public_path . '/wp-content/themes/LANDINGPAGE_MBA/functions.php');
check_file($public_path . '/wp-content/themes/twentytwentyfour/functions.php');
check_file($public_path . '/wp-content/themes/twentytwentyfive/functions.php');
check_file($public_path . '/wp-content/themes/buddyboss-theme-child/functions.php');
check_file($public_path . '/wp-content/themes/archives-1782225791/functions.php');
check_file($public_path . '/wp-content/themes/custom_file_1_1782225500/functions.php');
