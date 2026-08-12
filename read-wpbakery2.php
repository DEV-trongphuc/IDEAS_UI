<?php
/**
 * Standalone File Reader V2 for wpbakery-page-builder.php
 */
header('Content-Type: text/plain; charset=utf-8');

$path = __DIR__ . '/wp-content/plugins/wpbakery-page-builder/wpbakery-page-builder.php';

if (file_exists($path)) {
    echo "File found. Printing lines 20 to 100:\n\n";
    $content = file_get_contents($path);
    $lines = explode("\n", $content);
    for ($i = 19; $i < 100 && $i < count($lines); $i++) {
        echo ($i + 1) . ": " . $lines[$i] . "\n";
    }
} else {
    echo "File wpbakery-page-builder.php not found.\n";
}

// Self destruct
@unlink(__FILE__);
