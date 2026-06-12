<?php
// Load WordPress bootstrap
require_once(__DIR__ . '/../../../wp-load.php');

// Purge LiteSpeed Cache via action hook
if (function_exists('do_action')) {
    do_action('litespeed_purge_all');
    echo "LiteSpeed Purged hook triggered successfully!\n";
} else {
    echo "WordPress do_action function not found.\n";
}

// Clear OPcache
if (function_exists('opcache_reset')) {
    opcache_reset();
    echo "OPcache Purged successfully!\n";
} else {
    echo "OPcache reset function not found.\n";
}
