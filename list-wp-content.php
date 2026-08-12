<?php
/**
 * Standalone wp-content directory lister (Skips uploads)
 */
header('Content-Type: text/plain; charset=utf-8');

$dir = __DIR__ . '/wp-content';

function list_dir_level($dir, $level = 0) {
    if ($level > 3) return;
    if (!is_dir($dir)) return;
    
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') continue;
        $path = $dir . '/' . $item;
        
        // Skip large directories
        if (strpos($path, 'wp-content/uploads') !== false) {
            echo str_repeat('  ', $level) . "[DIR] uploads (SKIPPED SCAN)\n";
            continue;
        }
        
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
    echo "Listing wp-content/ (skipping uploads):\n\n";
    list_dir_level($dir, 0);
} else {
    echo "wp-content/ not found.\n";
}

// Self destruct
@unlink(__FILE__);
