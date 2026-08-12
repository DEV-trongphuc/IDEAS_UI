<?php
/**
 * Standalone Security Cleanup Helper for IDEAS website
 * 
 * WARNING: This script performs automated deletion of malicious files and database entries.
 * It will self-delete upon execution.
 */
header('Content-Type: text/plain; charset=utf-8');

$deploy_path = __DIR__;
echo "Starting cleanup helper in: $deploy_path\n";

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

// 1. Delete the specific malicious plugin
$target_plugin_dir = $deploy_path . '/wp-content/plugins/site-helper-b323c450e00e';
if (file_exists($target_plugin_dir)) {
    echo "Malicious plugin directory found. Deleting...\n";
    if (delete_directory($target_plugin_dir)) {
        echo "SUCCESS: Deleted $target_plugin_dir\n";
    } else {
        echo "ERROR: Failed to delete $target_plugin_dir\n";
    }
} else {
    echo "Plugin directory site-helper-b323c450e00e not found. Checking all plugins for site-helper-...\n";
}

// 2. Scan and delete other plugins starting with site-helper- or wp-security-helper-
$plugins_dir = $deploy_path . '/wp-content/plugins';
if (is_dir($plugins_dir)) {
    foreach (scandir($plugins_dir) as $item) {
        if ($item == '.' || $item == '..') continue;
        $full_path = $plugins_dir . '/' . $item;
        if (is_dir($full_path) && (strpos($item, 'site-helper-') === 0 || strpos($item, 'wp-security-helper-') === 0)) {
            echo "Found matching malicious plugin directory: $item. Deleting...\n";
            if (delete_directory($full_path)) {
                echo "SUCCESS: Deleted $full_path\n";
            } else {
                echo "ERROR: Failed to delete $full_path\n";
            }
        }
    }
}

// 3. Scan and delete any .php files in wp-content/uploads/ (Backdoors)
$uploads_dir = $deploy_path . '/wp-content/uploads';
if (is_dir($uploads_dir)) {
    echo "Scanning uploads directory for malicious .php files...\n";
    $directory = new RecursiveDirectoryIterator($uploads_dir);
    $iterator = new RecursiveIteratorIterator($directory);
    $php_files = array();
    
    foreach ($iterator as $info) {
        if ($info->isFile() && strtolower($info->getExtension()) === 'php') {
            $php_files[] = $info->getPathname();
        }
    }
    
    if (empty($php_files)) {
        echo "No PHP files found in uploads. Clean!\n";
    } else {
        echo "Found " . count($php_files) . " PHP files in uploads. Deleting...\n";
        foreach ($php_files as $file) {
            if (@unlink($file)) {
                echo "SUCCESS: Deleted backdoor $file\n";
            } else {
                echo "ERROR: Failed to delete backdoor $file\n";
            }
        }
    }
}

// 4. Load WordPress to deactivate malicious plugins in active_plugins database option
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
                if (strpos($plugin, 'site-helper-') !== false || strpos($plugin, 'wp-security-helper-') !== false) {
                    echo "Deactivating malicious plugin: $plugin\n";
                    $changed = true;
                } else {
                    $cleaned_plugins[] = $plugin;
                }
            }
            if ($changed) {
                update_option('active_plugins', $cleaned_plugins);
                echo "SUCCESS: Updated active_plugins database option.\n";
            } else {
                echo "No malicious plugins found active in database option.\n";
            }
        }
    }
} else {
    echo "wp-load.php not found. Cannot clean database option.\n";
}

// 5. Self destruct
echo "Self-deleting cleanup-helper.php...\n";
@unlink(__FILE__);
echo "Cleanup completed successfully!\n";
