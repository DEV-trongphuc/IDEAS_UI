<?php
/**
 * Standalone Security Cleanup V3 (Final) for IDEAS website
 * Removes the db.php drop-in, mu-plugins, and backdoor scripts.
 */
header('Content-Type: text/plain; charset=utf-8');

$deploy_path = __DIR__;
echo "Starting final security cleanup in: $deploy_path\n\n";

$files_to_delete = [
    $deploy_path . '/wp-content/db.php',
    $deploy_path . '/wp-content/.18179860.php',
    $deploy_path . '/wp-content/18179860.php',
    $deploy_path . '/wp-content/61d9ab65.zip',
    $deploy_path . '/wp-content/mu-plugins/datum-patcher-tag.php',
    $deploy_path . '/wp-content/mu-plugins/nc-dropin.php',
    $deploy_path . '/wp-content/mu-plugins/ridge-handler-lite.php',
    $deploy_path . '/wp-content/mu-plugins/trace-shield-box.php'
];

$dirs_to_delete = [
    $deploy_path . '/wp-content/plugins/smooth-handler-tag'
];

// Helper to recursively delete directory
function delete_directory($dir) {
    if (!file_exists($dir)) return true;
    if (!is_dir($dir)) return @unlink($dir);
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') continue;
        if (!delete_directory($dir . DIRECTORY_SEPARATOR . $item)) return false;
    }
    return @rmdir($dir);
}

// 1. Delete files
foreach ($files_to_delete as $file) {
    if (file_exists($file)) {
        if (@unlink($file)) {
            echo "SUCCESS: Deleted file $file\n";
        } else {
            echo "ERROR: Failed to delete file $file\n";
        }
    } else {
        echo "File not found: $file\n";
    }
}

// 2. Delete directories
foreach ($dirs_to_delete as $dir) {
    if (file_exists($dir)) {
        if (delete_directory($dir)) {
            echo "SUCCESS: Deleted directory $dir\n";
        } else {
            echo "ERROR: Failed to delete directory $dir\n";
        }
    } else {
        echo "Directory not found: $dir\n";
    }
}

// 3. Clear OPcache
if (function_exists('opcache_reset')) {
    opcache_reset();
    echo "SUCCESS: Cleared PHP OPcache.\n";
}

// Self destruct
@unlink(__FILE__);
echo "\nFinal cleanup completed. Script self-deleted.\n";
