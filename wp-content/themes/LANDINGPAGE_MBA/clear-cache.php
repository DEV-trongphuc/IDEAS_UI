<?php
// Load WordPress bootstrap
require_once(__DIR__ . '/../../../wp-load.php');

// Purge LiteSpeed Cache
if (class_exists('LiteSpeed\Purge')) {
    LiteSpeed\Purge::purge_all();
    echo "LiteSpeed Purged successfully!\n";
} else {
    echo "LiteSpeed Purge class not found.\n";
}

// Clear OPcache
if (function_exists('opcache_reset')) {
    opcache_reset();
    echo "OPcache Purged successfully!\n";
} else {
    echo "OPcache reset function not found.\n";
}
