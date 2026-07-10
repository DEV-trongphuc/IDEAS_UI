<?php
// db-setup.php - Create/migrate the required database tables

if (!defined('ABSPATH')) {
    exit;
}

function ideas_verify_init_db() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    // 1. Group table
    $table_groups = $wpdb->prefix . 'ideas_cert_groups';
    $sql_groups = "CREATE TABLE IF NOT EXISTS $table_groups (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        bg_cert varchar(255) DEFAULT NULL,
        bg_transcript varchar(255) DEFAULT NULL,
        bg_card varchar(255) DEFAULT NULL,
        config_cert longtext DEFAULT NULL,
        config_transcript longtext DEFAULT NULL,
        config_card longtext DEFAULT NULL,
        created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
    ) $charset_collate;";
    dbDelta($sql_groups);

    // 2. Certificates table
    $table_certs = $wpdb->prefix . 'ideas_certificates';
    $sql_certs = "CREATE TABLE IF NOT EXISTS $table_certs (
        id int(11) NOT NULL AUTO_INCREMENT,
        cer_no varchar(100) NOT NULL,
        student_id varchar(100) NOT NULL,
        name varchar(255) NOT NULL,
        date date NOT NULL,
        email varchar(255) DEFAULT NULL,
        dob date DEFAULT NULL,
        sex varchar(20) DEFAULT NULL,
        nationality varchar(100) DEFAULT 'Viet Nam',
        registration_date varchar(50) DEFAULT NULL,
        id_student varchar(100) DEFAULT NULL,
        cert_number varchar(100) DEFAULT NULL,
        avatar_url varchar(255) DEFAULT NULL,
        status varchar(20) DEFAULT 'active',
        paused_reason text DEFAULT NULL,
        paused_until datetime DEFAULT NULL,
        group_id int(11) DEFAULT NULL,
        created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id),
        UNIQUE KEY cer_no (cer_no)
    ) $charset_collate;";
    dbDelta($sql_certs);

    // 3. Transcript Courses table
    $table_courses = $wpdb->prefix . 'ideas_transcript_courses';
    $sql_courses = "CREATE TABLE IF NOT EXISTS $table_courses (
        id int(11) NOT NULL AUTO_INCREMENT,
        cer_no varchar(100) NOT NULL,
        course_title varchar(255) NOT NULL,
        grade varchar(50) NOT NULL,
        credits varchar(20) DEFAULT NULL,
        percentage varchar(20) DEFAULT NULL,
        sort_order int(11) DEFAULT 0,
        PRIMARY KEY  (id)
    ) $charset_collate;";
    dbDelta($sql_courses);

    // 4. OTP table
    $table_otp = $wpdb->prefix . 'ideas_transcript_otp';
    $sql_otp = "CREATE TABLE IF NOT EXISTS $table_otp (
        id int(11) NOT NULL AUTO_INCREMENT,
        cer_no varchar(100) NOT NULL,
        email varchar(255) NOT NULL,
        otp_code varchar(10) NOT NULL,
        expires_at datetime NOT NULL,
        used tinyint(1) DEFAULT 0,
        created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
    ) $charset_collate;";
    dbDelta($sql_otp);

    // 5. Contracts table
    $table_contracts = $wpdb->prefix . 'ideas_certificate_contracts';
    $sql_contracts = "CREATE TABLE IF NOT EXISTS $table_contracts (
        id int(11) NOT NULL AUTO_INCREMENT,
        contract_code varchar(100) NOT NULL,
        partner_name varchar(255) NOT NULL,
        course_name varchar(255) NOT NULL,
        status varchar(20) DEFAULT 'active',
        created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id),
        UNIQUE KEY contract_code (contract_code)
    ) $charset_collate;";
    dbDelta($sql_contracts);

    // 6. Requests table
    $table_requests = $wpdb->prefix . 'ideas_certificate_requests';
    $sql_requests = "CREATE TABLE IF NOT EXISTS $table_requests (
        id int(11) NOT NULL AUTO_INCREMENT,
        contract_code varchar(100) NOT NULL,
        name varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        dob date DEFAULT NULL,
        sex varchar(20) DEFAULT NULL,
        nationality varchar(100) DEFAULT 'Viet Nam',
        student_id varchar(100) DEFAULT NULL,
        avatar_url varchar(255) DEFAULT NULL,
        status varchar(20) DEFAULT 'pending',
        cer_no varchar(100) DEFAULT NULL,
        created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY  (id)
    ) $charset_collate;";
    dbDelta($sql_requests);

    // Seed default cert group if none exists
    $count_groups = $wpdb->get_var("SELECT COUNT(*) FROM $table_groups");
    if ($count_groups == 0) {
        $json_cert = '{"name":{"id":"name","label":"Họ và tên","top":42,"left":20,"width":60,"height":8,"fontSize":48,"color":"#a81515","align":"center","weight":700,"fontFamily":"\'Great Vibes\', cursive","borderWidth":0,"borderRadius":0,"borderColor":"#000000"},"qr_code":{"id":"qr_code","label":"Mã QR Code","top":76,"left":78,"width":12,"height":12,"fontSize":24,"color":"#000000","align":"left","weight":600,"fontFamily":"Inter, sans-serif","borderWidth":1,"borderRadius":4,"borderColor":"#4a4a4a"}}';
        $json_transcript = '{"name":{"id":"name","label":"Họ và tên","top":24,"left":25,"width":30,"height":8,"fontSize":24,"color":"#000000","align":"left","weight":700,"fontFamily":"Inter, sans-serif","borderWidth":0,"borderRadius":0,"borderColor":"#000000"},"course_grid":{"id":"course_grid","label":"Bảng Điểm (Grid)","top":40,"left":15,"width":70,"height":30,"fontSize":16,"color":"#000000","align":"left","weight":600,"fontFamily":"Inter, sans-serif","borderWidth":0,"borderRadius":0,"borderColor":"#000000"}}';
        $json_card = '{"avatar":{"id":"avatar","label":"Ảnh thẻ 3x4","top":20,"left":15,"width":20,"height":30,"fontSize":16,"color":"#000000","align":"center","weight":400,"fontFamily":"Inter, sans-serif","borderWidth":1,"borderRadius":5,"borderColor":"#aaaaaa"},"name":{"id":"name","label":"Họ và tên","top":55,"left":15,"width":70,"height":8,"fontSize":20,"color":"#a81515","align":"center","weight":700,"fontFamily":"Inter, sans-serif","borderWidth":0,"borderRadius":0,"borderColor":"#000000"},"qr_code":{"id":"qr_code","label":"Mã QR Code","top":65,"left":40,"width":20,"height":20,"fontSize":24,"color":"#000000","align":"left","weight":600,"fontFamily":"Inter, sans-serif","borderWidth":1,"borderRadius":4,"borderColor":"#4a4a4a"}}';

        $wpdb->insert($table_groups, array(
            'name' => 'Pre-Top up',
            'bg_cert' => '/wp-content/themes/LANDINGPAGE_MBA/verify-system/assets/bg.png',
            'bg_transcript' => '/wp-content/themes/LANDINGPAGE_MBA/verify-system/assets/bg-transcript.png',
            'bg_card' => '',
            'config_cert' => $json_cert,
            'config_transcript' => $json_transcript,
            'config_card' => $json_card
        ));
    }
}
