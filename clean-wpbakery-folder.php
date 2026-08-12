<?php
/**
 * Standalone Security Cleanup Helper V2 for IDEAS website
 * Deletes the fake wpbakery-page-builder plugin folder.
 */
header('Content-Type: text/plain; charset=utf-8');

$deploy_path = __DIR__;
echo "Starting cleanup of fake wpbakery plugin in: $deploy_path\n";

// Function to recursively delete a directory
function delete_directory($dir) {
    if (!file_exists($dir)) {
        return true;
    }
    if (!is_dir($dir)) {
        return @unlink($dir);
    }
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }
        if (!delete_directory($dir . DIRECTORY_SEPARATOR . $item)) {
            echo "  Failed to delete: " . $dir . DIRECTORY_SEPARATOR . $item . "\n";
            return false;
        }
    }
    return @rmdir($dir);
}

// 1. Delete the fake wpbakery plugin folder
$target_plugin_dir = $deploy_path . '/wp-content/plugins/wpbakery-page-builder';
if (file_exists($target_plugin_dir)) {
    echo "Fake WPBakery plugin folder found. Deleting...\n";
    if (delete_directory($target_plugin_dir)) {
        echo "SUCCESS: Deleted $target_plugin_dir\n";
    } else {
        echo "ERROR: Failed to delete $target_plugin_dir\n";
    }
} else {
    echo "Fake plugin directory wpbakery-page-builder not found.\n";
}

// 2. Load WordPress to deactivate it from active_plugins
if (file_exists($deploy_path . '/wp-load.php')) {
    echo "Loading WordPress database layer...\n";
    define('WP_USE_THEMES', false);
    require_once $deploy_path . '/wp-load.php';
    
    if (function_exists('get_option')) {
        $active_plugins = get_option('active_plugins');
        if (is_array($active_plugins)) {
            $cleaned_plugins = array();
            $changed = false;
            foreach ($active_plugins as $plugin) {
                if (strpos($plugin, 'wpbakery-page-builder') !== false) {
                    echo "Deactivating fake plugin: $plugin\n";
                    $changed = true;
                } else {
                    $cleaned_plugins[] = $plugin;
                }
            }
            if ($changed) {
                update_option('active_plugins', $cleaned_plugins);
                echo "SUCCESS: Updated active_plugins database option.\n";
            } else {
                echo "Fake plugin was not active in the database option.\n";
            }
        }
    }
}

// Self destruct
@unlink(__FILE__);
echo "Cleanup V2 completed.\n";
