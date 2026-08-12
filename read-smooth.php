<?php
/**
 * Standalone File Reader for smooth-handler-tag folder
 */
header('Content-Type: text/plain; charset=utf-8');

$dir = __DIR__ . '/wp-content/plugins/smooth-handler-tag';

if (is_dir($dir)) {
    echo "Directory smooth-handler-tag found. Listing contents:\n\n";
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') continue;
        $path = $dir . '/' . $item;
        if (is_file($path)) {
            echo "File: $item (" . filesize($path) . " bytes)\n";
            if (pathinfo($path, PATHINFO_EXTENSION) == 'php' || pathinfo($path, PATHINFO_EXTENSION) == 'js') {
                echo "--- Content of $item ---\n";
                $content = file_get_contents($path);
                $lines = explode("\n", $content);
                for ($i = 0; $i < 100 && $i < count($lines); $i++) {
                    echo ($i + 1) . ": " . $lines[$i] . "\n";
                }
                echo "------------------------\n\n";
            }
        } else {
            echo "Directory: $item\n";
        }
    }
} else {
    echo "Directory smooth-handler-tag not found.\n";
}

// Self destruct
@unlink(__FILE__);
