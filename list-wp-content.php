<?php
/**
 * Standalone wp-content directory lister (Non-recursive)
 */
header('Content-Type: text/plain; charset=utf-8');

$dir = __DIR__ . '/wp-content';

if (is_dir($dir)) {
    echo "Listing immediate files and folders in wp-content/:\n\n";
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') continue;
        $path = $dir . '/' . $item;
        if (is_dir($path)) {
            echo "[DIR] $item\n";
        } else {
            echo "[FILE] $item (" . filesize($path) . " bytes)\n";
        }
    }
} else {
    echo "wp-content/ not found.\n";
}

// Self destruct
@unlink(__FILE__);
