<?php
header('Content-Type: text/plain; charset=utf-8');

$theme_dir = '/home/vhvxoigh/public_html/wp-content/themes/buddyboss-theme-child/';

if (file_exists($theme_dir)) {
    echo "=== buddyboss-theme-child Files ===\n";
    $di = new RecursiveDirectoryIterator($theme_dir, RecursiveDirectoryIterator::SKIP_DOTS);
    $it = new RecursiveIteratorIterator($di);
    foreach ($it as $file) {
        echo str_replace($theme_dir, '', $file) . "\n";
    }
} else {
    echo "Child theme directory not found\n";
}
