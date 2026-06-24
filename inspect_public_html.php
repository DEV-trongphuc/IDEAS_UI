<?php
header('Content-Type: text/plain; charset=utf-8');

$search_dir = '/home/vhvxoigh/public_html/';
echo "=== Searching recursively under public_html for 'khiL_2' ===\n";

$found = false;
$di = new RecursiveDirectoryIterator($search_dir, RecursiveDirectoryIterator::SKIP_DOTS);
$it = new RecursiveIteratorIterator($di);

foreach ($it as $file) {
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    if (in_array($ext, ['php', 'po', 'json', 'js', 'html', 'txt'])) {
        $content = @file_get_contents($file);
        if ($content !== false && strpos($content, 'khiL_2') !== false) {
            echo "Found in file: " . str_replace($search_dir, '', $file) . "\n";
            $lines = explode("\n", $content);
            foreach ($lines as $i => $line) {
                if (strpos($line, 'khiL_2') !== false) {
                    echo "  Line " . ($i + 1) . ": " . substr(trim($line), 0, 150) . "...\n";
                }
            }
            $found = true;
        }
    }
}

if (!$found) {
    echo "No occurrences of 'khiL_2' found.\n";
}
