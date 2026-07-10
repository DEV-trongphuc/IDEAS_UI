<?php
// admin-menu.php - Manage WordPress Admin Sidebar Navigation and Assets Enqueueing

if (!defined('ABSPATH')) {
    exit;
}

// Register admin styles and scripts
add_action('admin_enqueue_scripts', 'ideas_verify_admin_assets');
function ideas_verify_admin_assets($hook) {
    // Only load on our certificate system pages
    if (strpos($hook, 'ideas-cert') === false && strpos($hook, 'ideas-certificates') === false) {
        return;
    }

    // Google Fonts
    wp_enqueue_style('ideas-verify-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Montserrat:wght@500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&family=Great+Vibes&family=Pinyon+Script&display=swap', array(), null);
    
    // Phosphor Icons
    wp_enqueue_script('ideas-verify-icons', 'https://unpkg.com/@phosphor-icons/web', array(), null);

    // QRCode JS
    wp_enqueue_script('ideas-verify-qrcode', 'https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js', array(), null);

    // Media Uploader helper
    wp_enqueue_media();
}

// Add menus to Admin Sidebar
add_action('admin_menu', 'ideas_verify_add_admin_menus');
function ideas_verify_add_admin_menus() {
    // Parent Menu
    add_menu_page(
        'IDEAS Certificates', 
        'Chứng chỉ', 
        'manage_options', 
        'ideas-certificates', 
        'ideas_cert_dashboard_page', 
        'dashicons-welcome-learn-more', 
        26
    );

    // Submenu 1: Requests
    add_submenu_page(
        'ideas-certificates',
        'Yêu cầu cấp chứng chỉ',
        'Yêu cầu cấp',
        'manage_options',
        'ideas-cert-requests',
        'ideas_cert_requests_page'
    );

    // Submenu 2: Contracts
    add_submenu_page(
        'ideas-certificates',
        'Quản lý hợp đồng bên thứ 3',
        'Bên thứ ba (Hợp đồng)',
        'manage_options',
        'ideas-cert-contracts',
        'ideas_cert_contracts_page'
    );

    // Submenu 3: Certificates List
    add_submenu_page(
        'ideas-certificates',
        'Danh sách chứng chỉ đã cấp',
        'Danh sách cấp',
        'manage_options',
        'ideas-cert-list',
        'ideas_cert_list_page'
    );

    // Submenu 4: Certificate Groups
    add_submenu_page(
        'ideas-certificates',
        'Nhóm chứng chỉ & Thiết kế',
        'Nhóm thiết kế',
        'manage_options',
        'ideas-cert-groups',
        'ideas_cert_groups_page'
    );
}

// Subpage callbacks loading the individual admin pages
function ideas_cert_dashboard_page() {
    include get_template_directory() . '/verify-system/admin-dashboard.php';
}

function ideas_cert_requests_page() {
    include get_template_directory() . '/verify-system/admin-requests.php';
}

function ideas_cert_contracts_page() {
    include get_template_directory() . '/verify-system/admin-contracts.php';
}

function ideas_cert_list_page() {
    include get_template_directory() . '/verify-system/admin-certificates.php';
}

function ideas_cert_groups_page() {
    include get_template_directory() . '/verify-system/admin-groups.php';
}
