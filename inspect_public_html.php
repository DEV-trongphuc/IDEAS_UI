<?php
header('Content-Type: text/plain; charset=utf-8');

$plugins_dir = '/home/vhvxoigh/public_html/wp-content/plugins/';
if (file_exists($plugins_dir)) {
    echo "=== Folders in wp-content/plugins/ ===\n";
    $files = scandir($plugins_dir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $path = $plugins_dir . $file;
            $type = is_dir($path) ? 'DIR' : 'FILE';
            echo "$file ($type)\n";
        }
    }
} else {
    echo "Plugins directory not found\n";
}
