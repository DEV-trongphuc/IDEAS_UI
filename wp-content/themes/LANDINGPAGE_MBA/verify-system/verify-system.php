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

// 2. Initialize database tables automatically
add_action('admin_init', 'ideas_verify_auto_init');
function ideas_verify_auto_init() {
    // Only run database setup if the tables do not exist or during admin area loading
    if (is_admin() && current_user_can('manage_options')) {
        // Run database initialization
        ideas_verify_init_db();

        // Flush rewrite rules dynamically when setting up
        $flushed = get_option('ideas_verify_rewrite_flushed', 0);
        if (!$flushed) {
            ideas_verify_add_rewrite_rules();
            flush_rewrite_rules(false);
            update_option('ideas_verify_rewrite_flushed', 1);
        }
    }
}
