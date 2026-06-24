<?php
header('Content-Type: text/plain; charset=utf-8');

$search_dir = '/home/vhvxoigh/public_html/wp-content/';
echo "=== Searching recursively under wp-content for '<Vlabel>' ===\n";

$found_count = 0;
$di = new RecursiveDirectoryIterator($search_dir, RecursiveDirectoryIterator::SKIP_DOTS);
$it = new RecursiveIteratorIterator($di);

foreach ($it as $file) {
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    // Only scan text-like files to avoid binary files causing issues
    if (in_array($ext, ['php', 'po', 'json', 'js', 'html', 'txt'])) {
        $content = @file_get_contents($file);
        if ($content !== false && strpos($content, '<Vlabel>') !== false) {
            echo "Found in: " . str_replace('/home/vhvxoigh/public_html/', '', $file) . "\n";
            $lines = explode("\n", $content);
            foreach ($lines as $i => $line) {
                if (strpos($line, '<Vlabel>') !== false) {
                    echo "  Line " . ($i + 1) . ": " . trim($line) . "\n";
                }
            }
            $found_count++;
            if ($found_count >= 15) {
                echo "Reached limit of 15 file matches. Stopping search.\n";
                break;
            }
        }
    }
}

if ($found_count === 0) {
    echo "No occurrences of '<Vlabel>' found in wp-content files.\n";
}
