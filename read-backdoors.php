<?php
/**
 * Standalone Backdoor Inspector for IDEAS website
 */
header('Content-Type: text/plain; charset=utf-8');

$wp_content = __DIR__ . '/wp-content';

echo "=== INSPECTING WP-CONTENT FILES ===\n\n";

// 1. Read wp-content/18179860.php
$file1 = $wp_content . '/18179860.php';
if (file_exists($file1)) {
    echo "--- Content of 18179860.php ---\n";
    echo file_get_contents($file1) . "\n------------------------------\n\n";
}

// 2. Read first 100 lines of wp-content/db.php
$db_file = $wp_content . '/db.php';
if (file_exists($db_file)) {
    echo "--- First 100 lines of db.php ---\n";
    $lines = explode("\n", file_get_contents($db_file));
    for ($i = 0; $i < 100 && $i < count($lines); $i++) {
        echo ($i + 1) . ": " . $lines[$i] . "\n";
    }
    echo "---------------------------------\n\n";
}

// 3. List mu-plugins/
$mu_dir = $wp_content . '/mu-plugins';
if (is_dir($mu_dir)) {
    echo "=== Listing mu-plugins/ ===\n";
    foreach (scandir($mu_dir) as $item) {
        if ($item == '.' || $item == '..') continue;
        $path = $mu_dir . '/' . $item;
        if (is_file($path)) {
            echo "File: $item (" . filesize($path) . " bytes)\n";
            // Print contents if small php
            if (pathinfo($path, PATHINFO_EXTENSION) == 'php' && filesize($path) < 15000) {
                echo "--- Content of $item ---\n";
                echo file_get_contents($path) . "\n------------------------\n\n";
            }
        } else {
            echo "Directory: $item\n";
        }
    }
} else {
    echo "mu-plugins/ directory not found.\n";
}

// Self destruct
@unlink(__FILE__);
