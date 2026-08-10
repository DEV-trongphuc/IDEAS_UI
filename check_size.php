<?php
header('Content-Type: text/plain; charset=utf-8');

$file = __DIR__ . '/wp-content/themes/LANDINGPAGE_MBA/common-assets/js/script.min.js';

if (!file_exists($file)) {
    echo "ERROR: File does not exist locally at $file";
} else {
    echo "File size: " . filesize($file) . " bytes\n";
    echo "MD5 hash: " . md5_file($file) . "\n";
    
    $content = file_get_contents($file);
    echo "First 200 chars: " . substr($content, 0, 200) . "\n";
    echo "Last 200 chars: " . substr($content, -200) . "\n";
}
