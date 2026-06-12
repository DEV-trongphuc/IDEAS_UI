<?php
/**
 * Script to clear all WordPress, LiteSpeed and Opcode caches
 */
define('WP_USE_THEMES', false);

// Locate wp-load.php
$wp_load_path = __DIR__ . '/../../../wp-load.php';
if (file_exists($wp_load_path)) {
    require_once($wp_load_path);
} else {
    die("wp-load.php not found at: " . $wp_load_path);
}

header('Content-Type: text/plain; charset=utf-8');
echo "=== Cache Clearing Script ===\n";

// 1. Purge LiteSpeed Cache
if (class_exists('LiteSpeed\Purge')) {
    LiteSpeed\Purge::purge_all();
    echo "LiteSpeed Cache: Purged all cache successfully.\n";
} else {
    echo "LiteSpeed Cache: Plugin or Purge class not found.\n";
}

// 2. Clear standard WordPress Object Cache
if (function_exists('wp_cache_clear_cache')) {
    wp_cache_clear_cache();
    echo "WP Object Cache: Cleared.\n";
} else {
    echo "WP Object Cache: No clearing function found.\n";
}

// 3. Clear PHP Opcode Cache
if (function_exists('opcache_reset')) {
    if (opcache_reset()) {
        echo "PHP OPcache: Reset successfully.\n";
    } else {
        echo "PHP OPcache: Reset failed.\n";
    }
} else {
    echo "PHP OPcache: Not active or function disabled.\n";
}

echo "Done.\n";
