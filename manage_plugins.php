<?php
header('Content-Type: text/plain; charset=utf-8');

$plugins_path = '/home/vhvxoigh/public_html/wp-content/plugins';

if (!file_exists($plugins_path)) {
    echo "Plugins directory not found.\n";
    exit;
}

echo "=== ALL INSTALLED PLUGINS ===\n";
$dirs = scandir($plugins_path);
$plugins_to_check = [];

foreach ($dirs as $dir) {
    if ($dir === '.' || $dir === '..') continue;
    $path = $plugins_path . '/' . $dir;
    if (is_dir($path)) {
        // Find the main php file
        $inner_files = scandir($path);
        $main_file = null;
        foreach ($inner_files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                // Read first few lines to see if it's a plugin header
                $content = file_get_contents($path . '/' . $file);
                if (strpos($content, 'Plugin Name:') !== false) {
                    $main_file = $file;
                    break;
                }
            }
        }
        
        $mtime = date('Y-m-d H:i:s', filemtime($path));
        if ($main_file) {
            $plugin_rel_path = "$dir/$main_file";
            echo "  - $plugin_rel_path (Modified: $mtime)\n";
            $plugins_to_check[] = $plugin_rel_path;
        } else {
            echo "  - [DIR NO PLUGIN PHP] $dir (Modified: $mtime)\n";
        }
    } else {
        echo "  - [FILE] $dir\n";
    }
}
