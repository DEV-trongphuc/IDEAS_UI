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

    // Seed default Pre-Top up group if none exists
    $count_groups = $wpdb->get_var("SELECT COUNT(*) FROM $table_groups");
    if ($count_groups == 0) {
        $json_cert = '{"name":{"id":"name","label":"Họ và tên","top":42,"left":20,"width":60,"height":8,"fontSize":48,"color":"#a81515","align":"center","weight":700,"fontFamily":"Great Vibes, cursive","borderWidth":0,"borderRadius":0,"borderColor":"#000000"},"qr_code":{"id":"qr_code","label":"Mã QR Code","top":76,"left":78,"width":12,"height":12,"fontSize":24,"color":"#000000","align":"left","weight":600,"fontFamily":"Inter, sans-serif","borderWidth":1,"borderRadius":4,"borderColor":"#4a4a4a"}}';
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

    // Seed/Sync Group: Chứng chỉ chương trình (AI Awareness Training) & 31 Attendee Certificates
    ideas_verify_sync_koda_program();

    // Seed Partner Contract: KODA AI Awareness Training
    ideas_verify_sync_koda_contract();
}

function ideas_verify_sync_koda_contract() {
    global $wpdb;
    $table_contracts = $wpdb->prefix . 'ideas_certificate_contracts';
    $contract_code = 'KODA_AI_2026';
    $exists = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_contracts WHERE contract_code = %s", $contract_code));
    if ($exists == 0) {
        $wpdb->insert($table_contracts, array(
            'contract_code' => $contract_code,
            'partner_name' => 'KODA International',
            'course_name' => 'AI Awareness Training',
            'status' => 'active'
        ));
    }
}

function ideas_verify_sync_koda_program() {
    global $wpdb;
    $table_groups = $wpdb->prefix . 'ideas_cert_groups';
    $table_certs = $wpdb->prefix . 'ideas_certificates';

    $group_name = 'Chứng chỉ chương trình';
    $bg_cert_url = 'https://ideas.edu.vn/wp-content/uploads/2026/08/20260714-certificate-02.webp';
    $config_cert_json = '{"name": {"id": "name", "label": "Họ và tên", "top": 42.0, "left": 10.2, "width": 52.0, "height": 4.8, "fontSize": 36, "color": "#0f172a", "align": "left", "weight": 800, "fontFamily": "Montserrat, sans-serif", "borderWidth": 0, "borderRadius": 0, "borderColor": "#000000"}, "course_name": {"id": "course_name", "label": "AI Awareness Training", "showLabel": true, "top": 53.5, "left": 10.2, "width": 75.0, "height": 5.0, "fontSize": 32, "color": "#ab0e00", "align": "left", "weight": 800, "fontFamily": "Montserrat, sans-serif", "borderWidth": 0, "borderRadius": 0, "borderColor": "#000000"}, "qr_code": {"id": "qr_code", "label": "Mã QR Code", "top": 87.3, "left": 10.2, "width": 6.5, "height": 4.6, "fontSize": 20, "color": "#000000", "align": "left", "weight": 600, "fontFamily": "Inter, sans-serif", "borderWidth": 0, "borderRadius": 0, "borderColor": "#000000"}, "cer_no": {"id": "cer_no", "label": "No.:", "showLabel": true, "top": 86.8, "left": 17.8, "width": 35.0, "height": 2.8, "fontSize": 13.5, "color": "#475569", "align": "left", "weight": 600, "fontFamily": "Plus Jakarta Sans, sans-serif", "borderWidth": 0, "borderRadius": 0, "borderColor": "#000000"}, "date": {"id": "date", "label": "Date:", "showLabel": true, "top": 89.5, "left": 17.8, "width": 35.0, "height": 2.8, "fontSize": 13.5, "color": "#475569", "align": "left", "weight": 500, "fontFamily": "Plus Jakarta Sans, sans-serif", "borderWidth": 0, "borderRadius": 0, "borderColor": "#000000"}}';

    // Check if group exists
    $group = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_groups WHERE name = %s LIMIT 1", $group_name));
    if (!$group) {
        $wpdb->insert($table_groups, array(
            'name' => $group_name,
            'bg_cert' => $bg_cert_url,
            'bg_transcript' => '',
            'bg_card' => '',
            'config_cert' => $config_cert_json,
            'config_transcript' => '{}',
            'config_card' => '{}'
        ));
        $group_id = $wpdb->insert_id;
    } else {
        $group_id = $group->id;
        $wpdb->update($table_groups, array(
            'bg_cert' => $bg_cert_url,
            'config_cert' => $config_cert_json
        ), array('id' => $group_id));
    }

    // 31 Attendee Certificates for KODA AI Awareness Training (UNACCENTED UPPERCASE)
    $attendees = array(
        array('cer_no' => 'IDEAS-KODA-001', 'student_id' => 'KODA-001', 'name' => 'LE THI KIM HUONG', 'email' => 'huong.le@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-002', 'student_id' => 'KODA-002', 'name' => 'NGO HUU THANG', 'email' => 'victor.ngo@kodaltd.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-003', 'student_id' => 'KODA-003', 'name' => 'NGUYEN THI KIM HUE', 'email' => 'lucy.nguyen@kodaltd.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-004', 'student_id' => 'KODA-004', 'name' => 'DOAN NGOC DIEU', 'email' => 'darcy.doan@kodaltd.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-005', 'student_id' => 'KODA-005', 'name' => 'NGO THI HONG LIEN', 'email' => 'selina.ngo@kodaltd.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-006', 'student_id' => 'KODA-006', 'name' => 'NGUYEN THI AN HOA', 'email' => 'helen.nguyen@kodaltd.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-007', 'student_id' => 'KODA-007', 'name' => 'TRAN THI THUY AN', 'email' => 'sandy.tran@kodaltd.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-008', 'student_id' => 'KODA-008', 'name' => 'LUONG THI HUYEN', 'email' => 'teresa.luong@kodaltd.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-009', 'student_id' => 'KODA-009', 'name' => 'TRAN THI KIM YEN', 'email' => 'yenny.tran@kodaltd.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-010', 'student_id' => 'KODA-010', 'name' => 'NGUYEN THI PHUNG', 'email' => 'ntphung@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-011', 'student_id' => 'KODA-011', 'name' => 'PHAM THI KIM LINH', 'email' => 'ptklinh@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-012', 'student_id' => 'KODA-012', 'name' => 'NGUYEN HOANG THANH THAO', 'email' => 'SarahThao@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-013', 'student_id' => 'KODA-013', 'name' => 'NGUYEN NGOC PHUONG THAO', 'email' => 'thao.truong@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-014', 'student_id' => 'KODA-014', 'name' => 'VO THI KIM THANH', 'email' => 'vtkthanh@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-015', 'student_id' => 'KODA-015', 'name' => 'NGUYEN THI DIEM PHUONG', 'email' => 'ntdphuong@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-016', 'student_id' => 'KODA-016', 'name' => 'NGUYEN THI HONG PHUC', 'email' => 'nthphuc@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-017', 'student_id' => 'KODA-017', 'name' => 'BUI THI KIM XUAN', 'email' => 'xuan.bui@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-018', 'student_id' => 'KODA-018', 'name' => 'AU THUY LINH', 'email' => 'atlinh@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-019', 'student_id' => 'KODA-019', 'name' => 'TRAN NGUYEN NGOC TRAM', 'email' => 'tram.tran@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-020', 'student_id' => 'KODA-020', 'name' => 'TRINH THI PHUC SINH', 'email' => 'ttpsinh@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-021', 'student_id' => 'KODA-021', 'name' => 'MAI BA TRAC', 'email' => 'mbtrac@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-022', 'student_id' => 'KODA-022', 'name' => 'VO THI BICH LY', 'email' => 'vtbly@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-023', 'student_id' => 'KODA-023', 'name' => 'NGUYEN THI MONG THUONG', 'email' => 'ntmthuong@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-024', 'student_id' => 'KODA-024', 'name' => 'LE QUANG THINH', 'email' => 'thinh.le@kodaltd.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-025', 'student_id' => 'KODA-025', 'name' => 'TRAN MINH CUONG', 'email' => 'cuong.tran@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-026', 'student_id' => 'KODA-026', 'name' => 'NGUYEN THI HONG PHUONG', 'email' => 'r&dmaterial@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-027', 'student_id' => 'KODA-027', 'name' => 'TRAN QUOC DAT', 'email' => 'r&dprocess@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-028', 'student_id' => 'KODA-028', 'name' => 'HUYNH VAN UT', 'email' => 'ut.huynh@kodaltd.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-029', 'student_id' => 'KODA-029', 'name' => 'HUYNH QUOC NGHIEM', 'email' => 'nghiem.huynh@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-030', 'student_id' => 'KODA-030', 'name' => 'HO THI KIM THONG', 'email' => 'thong.ho@kodainternational.com', 'date' => '2026-08-20'),
        array('cer_no' => 'IDEAS-KODA-031', 'student_id' => 'KODA-031', 'name' => 'PHAM THANH KHA', 'email' => 'ptkha@kodainternational.com', 'date' => '2026-08-20'),
    );

    foreach ($attendees as $a) {
        $exists = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_certs WHERE cer_no = %s", $a['cer_no']));
        if ($exists == 0) {
            $wpdb->insert($table_certs, array(
                'cer_no' => $a['cer_no'],
                'student_id' => $a['student_id'],
                'name' => $a['name'],
                'email' => $a['email'],
                'date' => $a['date'],
                'group_id' => $group_id,
                'status' => 'active'
            ));
        } else {
            $wpdb->update($table_certs, array(
                'student_id' => $a['student_id'],
                'name' => $a['name'],
                'email' => $a['email'],
                'date' => $a['date'],
                'group_id' => $group_id,
                'status' => 'active'
            ), array('cer_no' => $a['cer_no']));
        }
    }
}
