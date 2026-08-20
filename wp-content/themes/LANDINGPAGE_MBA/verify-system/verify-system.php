<?php
/**
 * Main bootstrap file for IDEAS Certificate & Verification System
 */

if (!defined('ABSPATH')) {
    exit;
}

// 1. Include Sub-components
require_once get_template_directory() . '/verify-system/db-setup.php';
require_once get_template_directory() . '/verify-system/routing.php';
require_once get_template_directory() . '/verify-system/ajax-api.php';
require_once get_template_directory() . '/verify-system/admin-menu.php';

// 2. Initialize database tables and sync program certificates automatically
add_action('init', 'ideas_verify_auto_init_public', 5);
function ideas_verify_auto_init_public() {
    $seeded = get_option('ideas_verify_koda_synced_v7', 0);
    if (!$seeded) {
        ideas_verify_init_db();
        update_option('ideas_verify_koda_synced_v7', 1);
    }
}

add_action('admin_init', 'ideas_verify_auto_init_admin');
function ideas_verify_auto_init_admin() {
    if (is_admin() && current_user_can('manage_options')) {
        ideas_verify_init_db();

        $flushed = get_option('ideas_verify_rewrite_flushed', 0);
        if (!$flushed) {
            ideas_verify_add_rewrite_rules();
            flush_rewrite_rules(false);
            update_option('ideas_verify_rewrite_flushed', 1);
        }
    }
}
