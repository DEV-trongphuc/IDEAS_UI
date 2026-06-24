<?php
header('Content-Type: text/plain; charset=utf-8');

$mu_dir = '/home/vhvxoigh/public_html/wp-content/mu-plugins/';
$files = ['site-compat-layer.php', 'wp-compat-layer.php'];

foreach ($files as $file) {
    $path = $mu_dir . $file;
    if (file_exists($path)) {
        echo "=== File: $file (Size: " . filesize($path) . " bytes) ===\n";
        $content = file_get_contents($path);
        // Print first 100 lines
        $lines = explode("\n", $content);
        $first_lines = array_slice($lines, 0, 100);
        echo implode("\n", $first_lines) . "\n\n";
    } else {
        echo "File $file not found\n\n";
    }
}
