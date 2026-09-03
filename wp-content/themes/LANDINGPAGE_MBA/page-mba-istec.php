<?php
/**
 * The template for displaying the MBA ISTEC Paris landing page
 * Template Name: Premium MBA ISTEC Paris Template
 */

// If accessed within WordPress, serve the high-speed compiled static HTML landing page
$static_path = WP_CONTENT_DIR . '/new_public/LANDINGPAGE_MBA/mba-istec.html';

if (file_exists($static_path)) {
    header('Content-Type: text/html; charset=UTF-8');
    readfile($static_path);
    exit;
}

// Fallback if file path differs
$alt_path = dirname(dirname(__DIR__)) . '/new_public/LANDINGPAGE_MBA/mba-istec.html';
if (file_exists($alt_path)) {
    header('Content-Type: text/html; charset=UTF-8');
    readfile($alt_path);
    exit;
}

// If neither is found, redirect to clean URL
wp_redirect(home_url('/mba-istec'), 302);
exit;
