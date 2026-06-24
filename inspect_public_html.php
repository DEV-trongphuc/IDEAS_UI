<?php
header('Content-Type: text/plain; charset=utf-8');

$plugins_dir = '/home/vhvxoigh/public_html/wp-content/plugins/';
$plugins_to_check = [
    'tutor/tutor.php',
    'tutor-pro/tutor-pro.php',
    'ultimate-post-kit/ultimate-post-kit.php',
    'ultimate-post-kit-pro/ultimate-post-kit-pro.php'
];

echo "=== Checking plugin file access ===\n";
foreach ($plugins_to_check as $p) {
    $full_path = $plugins_dir . $p;
    echo "Plugin: $p\n";
    if (file_exists($full_path)) {
        echo "  Exists: YES\n";
        echo "  Readable: " . (is_readable($full_path) ? 'YES' : 'NO') . "\n";
        echo "  Size: " . filesize($full_path) . " bytes\n";
        echo "  Permissions: " . substr(sprintf('%o', fileperms($full_path)), -4) . "\n";
        echo "  Owner ID: " . fileowner($full_path) . "\n";
    } else {
        echo "  Exists: NO\n";
    }
    echo "\n";
}
