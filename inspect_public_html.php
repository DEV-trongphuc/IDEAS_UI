<?php
header('Content-Type: text/plain; charset=utf-8');

$search_dir = '/home/vhvxoigh/public_html/wp-content/';
echo "=== Searching recursively under wp-content for 'vlabel' (case-insensitive) in .mo files ===\n";

$found_count = 0;
$di = new RecursiveDirectoryIterator($search_dir, RecursiveDirectoryIterator::SKIP_DOTS);
$it = new RecursiveIteratorIterator($di);

foreach ($it as $file) {
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    if ($ext === 'mo') {
        $content = @file_get_contents($file);
        if ($content !== false && stripos($content, 'vlabel') !== false) {
            echo "Found in .mo file: " . str_replace('/home/vhvxoigh/public_html/', '', $file) . " (Size: " . strlen($content) . " bytes)\n";
            $found_count++;
        }
    }
}

if ($found_count === 0) {
    echo "No occurrences of 'vlabel' found in .mo files.\n";
}
