<?php
/**
 * Standalone script to purge all LiteSpeed cache
 */
require_once __DIR__ . '/wp-load.php';

if (function_exists('litespeed_purge_all')) {
    litespeed_purge_all();
    echo "SUCCESS: LiteSpeed Cache Purged All!";
} else if (class_exists('LiteSpeed\Purge')) {
    LiteSpeed\Purge::purge_all();
    echo "SUCCESS: LiteSpeed Class Purged All!";
} else {
    echo "WARNING: LiteSpeed Cache purge functions not found. Loaded WordPress.";
}
