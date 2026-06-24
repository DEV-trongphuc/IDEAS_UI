<?php
header('Content-Type: text/plain; charset=utf-8');

$search_dir = '/home/vhvxoigh/public_html/';
echo "=== Searching recursively under public_html for 'vlabel' (case-insensitive) ===\n";

$found_count = 0;
$di = new RecursiveDirectoryIterator($search_dir, RecursiveDirectoryIterator::SKIP_DOTS);
$it = new RecursiveIteratorIterator($di);

foreach ($it as $file) {
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    if (in_array($ext, ['php', 'po', 'json', 'js', 'html', 'txt'])) {
        $content = @file_get_contents($file);
        if ($content !== false && stripos($content, 'vlabel') !== false) {
            echo "Found in: " . str_replace('/home/vhvxoigh/public_html/', '', $file) . "\n";
            $lines = explode("\n", $content);
            $printed_lines = 0;
            foreach ($lines as $i => $line) {
                if (stripos($line, 'vlabel') !== false) {
                    echo "  Line " . ($i + 1) . ": " . trim($line) . "\n";
                    $printed_lines++;
                    if ($printed_lines >= 5) {
                        echo "  ... and more matches in this file\n";
                        break;
                    }
                }
            }
            $found_count++;
            if ($found_count >= 20) {
                echo "Reached limit of 20 file matches. Stopping search.\n";
                break;
            }
        }
    }
}

if ($found_count === 0) {
    echo "No occurrences of 'vlabel' found in public_html files.\n";
}
