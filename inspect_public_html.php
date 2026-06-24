<?php
header('Content-Type: text/plain; charset=utf-8');

$theme_child_path = '/home/vhvxoigh/public_html/wp-content/themes/buddyboss-theme-child';

if (file_exists($theme_child_path)) {
    echo "=== FILES IN buddyboss-theme-child ===\n";
    $files = scandir($theme_child_path);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        $full = $theme_child_path . '/' . $file;
        echo "  " . (is_dir($full) ? "[DIR] " : "[FILE] ") . $file . "\n";
    }
} else {
    echo "buddyboss-theme-child not found\n";
}
