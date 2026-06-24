<?php
header('Content-Type: text/plain; charset=utf-8');

$file_path = '/home/vhvxoigh/public_html/wp-content/plugins/ultimate-post-kit/ultimate-post-kit.php';

if (file_exists($file_path)) {
    echo "=== ultimate-post-kit.php ===\n";
    $lines = file($file_path);
    $first_lines = array_slice($lines, 0, 200);
    echo implode("", $first_lines);
} else {
    echo "File not found\n";
}
