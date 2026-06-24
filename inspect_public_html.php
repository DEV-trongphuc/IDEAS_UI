<?php
header('Content-Type: text/plain; charset=utf-8');

$theme_dir = '/home/vhvxoigh/public_html/wp-content/themes/buddyboss-theme-child/';
echo "=== Searching child theme files for 'khiL_2' ===\n";

$di = new RecursiveDirectoryIterator($theme_dir, RecursiveDirectoryIterator::SKIP_DOTS);
$it = new RecursiveIteratorIterator($di);
$found = false;

foreach ($it as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
        $content = file_get_contents($file);
        if (strpos($content, 'khiL_2') !== false) {
            echo "Found in file: " . str_replace($theme_dir, '', $file) . "\n";
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
    echo "No files containing 'khiL_2' found in child theme.\n";
}
