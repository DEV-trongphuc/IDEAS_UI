<?php
header('Content-Type: text/plain; charset=utf-8');

$cache_dir = '/home/vhvxoigh/public_html/wp-content/cache/';

function delete_directory($dir) {
    if (!file_exists($dir)) {
        return true;
    }
    if (!is_dir($dir)) {
        return unlink($dir);
    }
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }
        if (!delete_directory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }
    }
    return rmdir($dir);
}

if (file_exists($cache_dir)) {
    echo "=== Cache directory structure ===\n";
    foreach (scandir($cache_dir) as $item) {
        if ($item !== '.' && $item !== '..') {
            $path = $cache_dir . $item;
            echo "$item (" . (is_dir($path) ? 'DIR' : 'FILE') . ")\n";
        }
    }
    
    // Clear wp-rocket cache folder if it exists
    $rocket_cache = $cache_dir . 'wp-rocket';
    if (file_exists($rocket_cache)) {
        echo "\nClearing WP Rocket cache folder: $rocket_cache ...\n";
        // We delete the contents of the chiefaiofficer.vn domain subfolder specifically to be safe
        $domain_cache = $rocket_cache . '/chiefaiofficer.vn';
        if (file_exists($domain_cache)) {
            if (delete_directory($domain_cache)) {
                echo "Successfully cleared chiefaiofficer.vn cache folder!\n";
            } else {
                echo "Failed to clear chiefaiofficer.vn cache folder.\n";
            }
        } else {
            // Delete the whole wp-rocket folder
            if (delete_directory($rocket_cache)) {
                echo "Successfully cleared whole wp-rocket cache directory!\n";
            } else {
                echo "Failed to clear wp-rocket cache directory.\n";
            }
        }
    }
    
    // Also check if there's any other cache folder like "busting" or "minify" and clear it
    $minify_cache = $cache_dir . 'minify';
    if (file_exists($minify_cache)) {
        echo "Clearing minify cache folder...\n";
        delete_directory($minify_cache);
    }
} else {
    echo "Cache directory not found at $cache_dir\n";
}
