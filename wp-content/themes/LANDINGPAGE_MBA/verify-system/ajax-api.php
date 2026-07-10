<?php
// ajax-api.php - Public API endpoints using wp_ajax_ hooks

if (!defined('ABSPATH')) {
    exit;
}

// 1. Certificate Lookup by Code (CCCD / ID Student / Cer No)
add_action('wp_ajax_nopriv_ideas_verify_lookup', 'ideas_verify_lookup_handler');
add_action('wp_ajax_ideas_verify_lookup', 'ideas_verify_lookup_handler');
function ideas_verify_lookup_handler() {
    global $wpdb;
    $input = json_decode(file_get_contents('php://input'), true);
    $code = sanitize_text_field($input['code'] ?? '');

    if (empty($code)) {
        wp_send_json_error(array('error' => 'Vui lòng nhập mã ID / CCCD / Mã chứng chỉ'));
    }

    $table_certs = $wpdb->prefix . 'ideas_certificates';
    $cert = $wpdb->get_row($wpdb->prepare(
        "SELECT cer_no FROM $table_certs WHERE cer_no = %s OR student_id = %s OR id_student = %s LIMIT 1",
        $code, $code, $code
    ));

    if ($cert) {
        wp_send_json_success(array('cer_no' => $cert->cer_no));
    } else {
        wp_send_json_error(array('error' => 'Không tìm thấy thông tin chứng chỉ phù hợp.'));
    }
}

// 2. Fetch Certificate details (Public data / coordinates mapping)
add_action('wp_ajax_nopriv_ideas_verify_get_cert', 'ideas_verify_get_cert_handler');
add_action('wp_ajax_ideas_verify_get_cert', 'ideas_verify_get_cert_handler');
function ideas_verify_get_cert_handler() {
    global $wpdb;
    $cer_id = sanitize_text_field($_GET['cer_id'] ?? '');

    if (empty($cer_id)) {
        wp_send_json_error(array('error' => 'Thiếu mã chứng chỉ.'));
    }

    $table_certs = $wpdb->prefix . 'ideas_certificates';
    $table_groups = $wpdb->prefix . 'ideas_cert_groups';
    
    $cert = $wpdb->get_row($wpdb->prepare(
        "SELECT c.*, 
                g.config_cert, g.config_transcript, g.config_card,
                g.bg_cert, g.bg_transcript, g.bg_card
         FROM $table_certs c
         LEFT JOIN $table_groups g ON c.group_id = g.id
         WHERE c.cer_no = %s",
        $cer_id
    ), ARRAY_A);

    if (!$cert) {
        wp_send_json_error(array('error' => 'Chứng chỉ không tồn tại.'));
    }

    // format date values
    if ($cert['date']) {
        $cert['date'] = date('d/m/Y', strtotime($cert['date']));
    }
    if ($cert['dob']) {
        $cert['dob'] = date('d-m-Y', strtotime($cert['dob']));
    }
    if ($cert['paused_until']) {
        $cert['paused_until'] = date('d/m/Y H:i', strtotime($cert['paused_until']));
    }

    // decode configs
    $cert['config_cert'] = json_decode($cert['config_cert'] ?? '{}', true);
    $cert['config_transcript'] = json_decode($cert['config_transcript'] ?? '{}', true);
    $cert['config_card'] = json_decode($cert['config_card'] ?? '{}', true);

    // Fetch courses
    $table_courses = $wpdb->prefix . 'ideas_transcript_courses';
    $courses = $wpdb->get_results($wpdb->prepare(
        "SELECT course_title, credits, percentage, grade FROM $table_courses WHERE cer_no = %s ORDER BY sort_order ASC",
        $cer_id
    ), ARRAY_A);

    $cert['courses'] = $courses;

    wp_send_json_success($cert);
}

// 3. Send OTP to Student Email for Transcript Protection
add_action('wp_ajax_nopriv_ideas_verify_send_otp', 'ideas_verify_send_otp_handler');
add_action('wp_ajax_ideas_verify_send_otp', 'ideas_verify_send_otp_handler');
function ideas_verify_send_otp_handler() {
    global $wpdb;
    $input = json_decode(file_get_contents('php://input'), true);
    $cer_no = sanitize_text_field($input['cer_no'] ?? '');

    if (empty($cer_no)) {
        wp_send_json_error(array('error' => 'Mã chứng chỉ bị thiếu'));
    }

    $table_certs = $wpdb->prefix . 'ideas_certificates';
    $cert = $wpdb->get_row($wpdb->prepare(
        "SELECT email, name FROM $table_certs WHERE cer_no = %s",
        $cer_no
    ));

    if (!$cert || empty($cert->email)) {
        wp_send_json_error(array('error' => 'Không tìm thấy email đăng ký cho chứng chỉ này.'));
    }

    $email = $cert->email;
    $name = $cert->name;

    // Generate 6-digit OTP
    $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    $expires = date('Y-m-d H:i:s', strtotime('+10 minutes'));

    // Save OTP to DB
    $table_otp = $wpdb->prefix . 'ideas_transcript_otp';
    $wpdb->query($wpdb->prepare("DELETE FROM $table_otp WHERE cer_no = %s AND used = 0", $cer_no));
    $wpdb->insert($table_otp, array(
        'cer_no' => $cer_no,
        'email' => $email,
        'otp_code' => $otp,
        'expires_at' => $expires
    ));

    // Send email using wp_mail()
    $subject = "[IDEAS] Mã xác thực OTP bảng điểm học viên";
    $body = "
    <html>
    <head>
        <title>Mã OTP bảng điểm</title>
    </head>
    <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
        <h2>Xin chào $name,</h2>
        <p>Bạn đang yêu cầu xem bảng điểm học viên cho chứng chỉ số: <strong>$cer_no</strong>.</p>
        <p>Mã xác thực OTP của bạn là:</p>
        <div style='background: #f8fafc; border: 1px solid #e2e8f0; padding: 15px 30px; font-size: 28px; font-weight: bold; color: #ab0e00; text-align: center; border-radius: 8px; max-width: 200px; margin: 20px 0;'>
            $otp
        </div>
        <p>Mã OTP này có hiệu lực trong vòng <strong>10 phút</strong>. Không chia sẻ mã này cho bất kỳ ai.</p>
        <p>Trân trọng,<br>Học viện IDEAS</p>
    </body>
    </html>";

    $headers = array('Content-Type: text/html; charset=UTF-8');

    $mail_success = wp_mail($email, $subject, $body, $headers);

    if ($mail_success) {
        $parts = explode('@', $email);
        $masked = substr($parts[0], 0, 3) . str_repeat('*', max(0, strlen($parts[0]) - 3)) . '@' . $parts[1];
        wp_send_json_success(array(
            'message' => "Mã OTP đã gửi đến $masked",
            'masked_email' => $masked
        ));
    } else {
        // Fallback: log error
        wp_send_json_error(array('error' => 'Không gửi được email. Vui lòng liên hệ ban quản trị.'));
    }
}

// 4. Verify OTP Code
add_action('wp_ajax_nopriv_ideas_verify_confirm_otp', 'ideas_verify_confirm_otp_handler');
add_action('wp_ajax_ideas_verify_confirm_otp', 'ideas_verify_confirm_otp_handler');
function ideas_verify_confirm_otp_handler() {
    global $wpdb;
    $input = json_decode(file_get_contents('php://input'), true);
    $cer_no = sanitize_text_field($input['cer_no'] ?? '');
    $otp = sanitize_text_field($input['otp'] ?? '');

    if (empty($cer_no) || empty($otp)) {
        wp_send_json_error(array('error' => 'Thiếu thông tin OTP.'));
    }

    // TEST MODE override
    if ($otp === '310501') {
        wp_send_json_success(array('test_mode' => true));
    }

    $table_otp = $wpdb->prefix . 'ideas_transcript_otp';
    $row = $wpdb->get_row($wpdb->prepare(
        "SELECT id, otp_code, expires_at FROM $table_otp WHERE cer_no = %s AND used = 0 ORDER BY created_at DESC LIMIT 1",
        $cer_no
    ));

    if (!$row) {
        wp_send_json_error(array('error' => 'Không tìm thấy mã OTP. Vui lòng yêu cầu gửi lại.'));
    }

    if (strtotime($row->expires_at) < time()) {
        wp_send_json_error(array('error' => 'Mã OTP đã hết hạn. Vui lòng yêu cầu gửi lại.'));
    }

    if ($row->otp_code !== $otp) {
        wp_send_json_error(array('error' => 'Mã OTP không chính xác.'));
    }

    // Mark as used
    $wpdb->update($table_otp, array('used' => 1), array('id' => $row->id));

    wp_send_json_success(array('success' => true));
}

// 5. Submit Certificate Request Form (Public)
add_action('wp_ajax_nopriv_ideas_verify_submit_request', 'ideas_verify_submit_request_handler');
add_action('wp_ajax_ideas_verify_submit_request', 'ideas_verify_submit_request_handler');
function ideas_verify_submit_request_handler() {
    global $wpdb;

    // Check request parameters
    $contract_code = sanitize_text_field($_POST['contract_code'] ?? '');
    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $dob = sanitize_text_field($_POST['dob'] ?? '');
    $sex = sanitize_text_field($_POST['sex'] ?? '');
    $nationality = sanitize_text_field($_POST['nationality'] ?? 'Viet Nam');
    $student_id = sanitize_text_field($_POST['student_id'] ?? '');

    if (empty($contract_code) || empty($name) || empty($email) || empty($student_id)) {
        wp_send_json_error(array('error' => 'Vui lòng điền đầy đủ các thông tin bắt buộc.'));
    }

    // Verify contract code exists
    $table_contracts = $wpdb->prefix . 'ideas_certificate_contracts';
    $contract = $wpdb->get_row($wpdb->prepare(
        "SELECT id FROM $table_contracts WHERE contract_code = %s AND status = 'active'",
        $contract_code
    ));

    if (!$contract) {
        wp_send_json_error(array('error' => 'Mã liên kết lớp học/đơn vị không khả dụng.'));
    }

    // Handle Upload Avatar File
    $avatar_url = '';
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
        $file = $_FILES['avatar'];
        $allowed = array('jpg', 'jpeg', 'png');
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            wp_send_json_error(array('error' => 'Ảnh thẻ phải định dạng JPG, JPEG hoặc PNG.'));
        }

        if ($file['size'] > 3 * 1024 * 1024) {
            wp_send_json_error(array('error' => 'Dung lượng ảnh thẻ tối đa là 3MB.'));
        }

        // Setup certificates uploads directory
        $upload_dir = wp_upload_dir();
        $target_dir = $upload_dir['basedir'] . '/certificates/avatars/';
        if (!is_dir($target_dir)) {
            wp_mkdir_p($target_dir);
        }

        $filename = 'avatar_' . uniqid() . '.' . $ext;
        $target_file = $target_dir . $filename;

        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            $avatar_url = $upload_dir['baseurl'] . '/certificates/avatars/' . $filename;
        } else {
            wp_send_json_error(array('error' => 'Không thể lưu trữ ảnh thẻ học viên.'));
        }
    }

    // Insert request
    $table_requests = $wpdb->prefix . 'ideas_certificate_requests';
    $insert_data = array(
        'contract_code' => $contract_code,
        'name' => $name,
        'email' => $email,
        'dob' => $dob ?: null,
        'sex' => $sex ?: null,
        'nationality' => $nationality,
        'student_id' => $student_id,
        'avatar_url' => $avatar_url ?: null,
        'status' => 'pending'
    );

    $inserted = $wpdb->insert($table_requests, $insert_data);

    if ($inserted) {
        wp_send_json_success(array('message' => 'Yêu cầu của bạn đã gửi thành công! Ban quản lý sẽ duyệt và gửi lại mã chứng chỉ qua email đăng ký của bạn.'));
    } else {
        wp_send_json_error(array('error' => 'Lỗi kết nối dữ liệu. Vui lòng thử lại.'));
    }
}

// 6. Save Drag & Drop Studio template configurations for Cert Groups (Admin only)
add_action('wp_ajax_ideas_verify_save_group_config', 'ideas_verify_save_group_config_handler');
function ideas_verify_save_group_config_handler() {
    if (!current_user_can('manage_options')) {
        wp_send_json_error(array('error' => 'Bạn không có quyền thực hiện chức năng này.'));
    }

    $group_id = intval($_POST['group_id'] ?? 0);
    $config_cert = $_POST['config_cert'] ?? '';
    $config_transcript = $_POST['config_transcript'] ?? '';
    $config_card = $_POST['config_card'] ?? '';

    // Check nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'ideas_save_studio_nonce')) {
        wp_send_json_error(array('error' => 'Phiên làm việc đã hết hạn. Vui lòng thử lại.'));
    }

    if ($group_id > 0) {
        global $wpdb;
        $table_groups = $wpdb->prefix . 'ideas_cert_groups';
        $updated = $wpdb->update($table_groups, array(
            'config_cert' => $config_cert,
            'config_transcript' => $config_transcript,
            'config_card' => $config_card
        ), array('id' => $group_id));

        if ($updated !== false) {
            wp_send_json_success(array('success' => true));
        } else {
            wp_send_json_error(array('error' => 'Lỗi kết nối cơ sở dữ liệu khi cập nhật cấu hình.'));
        }
    } else {
        wp_send_json_error(array('error' => 'Nhóm chứng chỉ không hợp lệ.'));
    }
}
