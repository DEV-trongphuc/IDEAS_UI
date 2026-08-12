<?php
/**
 * Standalone File Reader for wpbakery-page-builder.php
 */
header('Content-Type: text/plain; charset=utf-8');

$path = __DIR__ . '/wp-content/plugins/wpbakery-page-builder/wpbakery-page-builder.php';

if (file_exists($path)) {
    echo "File found. Printing first 50 lines:\n\n";
    $content = file_get_contents($path);
    $lines = explode("\n", $content);
    for ($i = 0; $i < 50 && $i < count($lines); $i++) {
        echo ($i + 1) . ": " . $lines[$i] . "\n";
    }
} else {
    echo "File wpbakery-page-builder.php not found at: $path\n";
}

// Self destruct
@unlink(__FILE__);
