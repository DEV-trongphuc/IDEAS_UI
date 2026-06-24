<?php
header('Content-Type: text/plain; charset=utf-8');

$plugins_dir = '/home/vhvxoigh/public_html/wp-content/plugins/';
$target_folders = ['tutor', 'tutor-pro', 'ultimate-post-kit', 'ultimate-post-kit-pro'];

foreach ($target_folders as $folder) {
    $path = $plugins_dir . $folder;
    if (file_exists($path) && is_dir($path)) {
        echo "=== Folder: $folder ===\n";
        $files = scandir($path);
        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                // Check if it has a plugin header
                $content = file_get_contents($path . '/' . $file);
                if (strpos($content, 'Plugin Name:') !== false) {
                    echo "  Plugin Entry: $folder/$file\n";
                }
            }
        }
    } else {
        echo "Folder $folder not found.\n";
    }
}
