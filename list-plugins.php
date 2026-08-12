<?php
/**
 * Standalone Plugin Lister for IDEAS website
 */
header('Content-Type: text/plain; charset=utf-8');

$deploy_path = __DIR__;
echo "Listing plugins in: $deploy_path\n\n";

if (file_exists($deploy_path . '/wp-load.php')) {
    define('WP_USE_THEMES', false);
    require_once $deploy_path . '/wp-load.php';
    
    global $wpdb;
    
    // 1. Get active plugins from database
    $active_plugins = get_option('active_plugins');
    echo "=== ACTIVE PLUGINS IN DB ===\n";
    if (is_array($active_plugins)) {
        foreach ($active_plugins as $plugin) {
            echo "  - $plugin\n";
        }
    } else {
        echo "No active plugins array found.\n";
    }
    
    // 2. Get all plugins on filesystem
    $plugins_dir = $deploy_path . '/wp-content/plugins';
    echo "\n=== ALL PLUGINS ON FILESYSTEM ===\n";
    if (is_dir($plugins_dir)) {
        foreach (scandir($plugins_dir) as $item) {
            if ($item == '.' || $item == '..') continue;
            $full_path = $plugins_dir . '/' . $item;
            if (is_dir($full_path)) {
                $main_file = '';
                // Search for main php file
                foreach (scandir($full_path) as $sub) {
                    if (pathinfo($sub, PATHINFO_EXTENSION) == 'php') {
                        $main_file = $sub;
                        break;
                    }
                }
                echo "  - $item" . ($main_file ? " ($main_file)" : "") . "\n";
            } else {
                echo "  - [FILE] $item\n";
            }
        }
    } else {
        echo "Plugins directory not found.\n";
    }
    
} else {
    echo "wp-load.php not found.\n";
}

// Self destruct
@unlink(__FILE__);
