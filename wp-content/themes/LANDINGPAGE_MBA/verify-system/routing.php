<?php
// routing.php - Add custom rewrite rules for public endpoints

if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'ideas_verify_add_rewrite_rules');
function ideas_verify_add_rewrite_rules() {
    add_rewrite_rule('^verify/?$', 'index.php?verify=1', 'top');
    add_rewrite_rule('^verify-request/?$', 'index.php?verify_request=1', 'top');
}

add_filter('query_vars', 'ideas_verify_add_query_vars');
function ideas_verify_add_query_vars($vars) {
    $vars[] = 'verify';
    $vars[] = 'verify_request';
    return $vars;
}

add_action('template_redirect', 'ideas_verify_catch_requests');
function ideas_verify_catch_requests() {
    $verify = get_query_var('verify');
    $verify_request = get_query_var('verify_request');

    if ($verify) {
        $action = sanitize_text_field($_GET['action'] ?? '');
        if ($action === 'transcript') {
            include get_template_directory() . '/verify-system/transcript-template.php';
        } else {
            // Load the public lookup template
            include get_template_directory() . '/verify-system/verify-template.php';
        }
        exit;
    }

    if ($verify_request) {
        // Load the public request template
        include get_template_directory() . '/verify-system/request-template.php';
        exit;
    }
}
