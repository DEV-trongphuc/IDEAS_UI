<?php
/**
 * Standalone wp-content directory lister
 */
header('Content-Type: text/plain; charset=utf-8');

$dir = __DIR__ . '/wp-content';

function list_dir_level($dir, $level = 0) {
    if ($level > 2) return;
    if (!is_dir($dir)) return;
    
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') continue;
        $path = $dir . '/' . $item;
        $indent = str_repeat('  ', $level);
        if (is_dir($path)) {
            echo "$indent[DIR] $item\n";
            list_dir_level($path, $level + 1);
        } else {
            echo "$indent[FILE] $item (" . filesize($path) . " bytes)\n";
        }
    }
}

if (is_dir($dir)) {
    echo "Listing wp-content/ up to 2 levels:\n\n";
    list_dir_level($dir, 0);
} else {
    echo "wp-content/ not found.\n";
}

// Self destruct
@unlink(__FILE__);
