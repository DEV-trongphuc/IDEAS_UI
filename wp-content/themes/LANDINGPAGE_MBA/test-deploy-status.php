<?php
/**
 * Script to test deployment status of the theme files
 */
$file = __DIR__ . '/page-bac-si-doanh-nghiep.php';
if (file_exists($file)) {
    echo "File exists!\n";
    echo "Modified: " . date("Y-m-d H:i:s", filemtime($file)) . "\n";
    echo "Size: " . filesize($file) . " bytes\n";
    echo "Content sample:\n";
    $content = file_get_contents($file);
    echo substr($content, 0, 500) . "\n";
} else {
    echo "File does not exist!";
}
