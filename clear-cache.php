<?php
/**
 * Standalone Cache Cleaner for IDEAS website
 */
header('Content-Type: text/plain; charset=utf-8');

$deploy_path = __DIR__;
echo "Starting cache directory scan in: $deploy_path\n\n";

$cache_dir = $deploy_path . '/wp-content/cache';

function clean_dir($dir) {
    if (!file_exists($dir)) {
        return;
    }
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') continue;
        $path = $dir . '/' . $item;
        if (is_dir($path)) {
            clean_dir($path);
            echo "Deleting directory: $path\n";
            @rmdir($path);
        } else {
            echo "Deleting file: $path\n";
            @unlink($path);
        }
    }
}

if (is_dir($cache_dir)) {
    echo "Found cache directory. Cleaning up...\n";
    clean_dir($cache_dir);
    echo "Cache directory cleared.\n";
} else {
    echo "No wp-content/cache directory found.\n";
}

// Self destruct
@unlink(__FILE__);
echo "\nCache clean completed.\n";
