<?php
// admin-requests.php - Manage Student Requests and Issue Certificates
if (!defined('ABSPATH')) {
    exit;
}

global $wpdb;
$table_requests = $wpdb->prefix . 'ideas_certificate_requests';
$table_contracts = $wpdb->prefix . 'ideas_certificate_contracts';
$table_certs = $wpdb->prefix . 'ideas_certificates';
$table_groups = $wpdb->prefix . 'ideas_cert_groups';
$table_courses = $wpdb->prefix . 'ideas_transcript_courses';

// Handle Approval POST Submit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ideas_approve_request'])) {
    check_admin_referer('ideas_approve_request_nonce');

    $request_id = intval($_POST['request_id']);
    $cer_no = sanitize_text_field($_POST['cer_no']);
    $student_id = sanitize_text_field($_POST['student_id']);
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $dob = sanitize_text_field($_POST['dob']);
    $sex = sanitize_text_field($_POST['sex']);
    $nationality = sanitize_text_field($_POST['nationality'] ?? 'Viet Nam');
    $registration_date = sanitize_text_field($_POST['registration_date']);
    $cert_number = sanitize_text_field($_POST['cert_number']);
    $group_id = intval($_POST['group_id']);
    $avatar_url = sanitize_text_field($_POST['avatar_url']);

    // Courses grid
    $course_titles = $_POST['course_title'] ?? array();
    $credits_list = $_POST['credits'] ?? array();
    $percentages = $_POST['percentage'] ?? array();
    $grades = $_POST['grade'] ?? array();

    if ($request_id && !empty($cer_no) && !empty($student_id) && !empty($name)) {
        $wpdb->query("START TRANSACTION");

        // 1. Insert or update certificate
        $cert_data = array(
            'cer_no' => $cer_no,
            'student_id' => $student_id,
            'name' => $name,
            'date' => date('Y-m-d'),
            'email' => $email ?: null,
            'dob' => $dob ?: null,
            'sex' => $sex ?: null,
            'nationality' => $nationality,
            'registration_date' => $registration_date ?: null,
            'id_student' => $student_id ?: null,
            'cert_number' => $cert_number ?: null,
            'avatar_url' => $avatar_url ?: null,
            'group_id' => $group_id ?: null,
            'status' => 'active'
        );

        $wpdb->replace($table_certs, $cert_data);

        // 2. Clear and Insert Courses
        $wpdb->delete($table_courses, array('cer_no' => $cer_no));
        if (!empty($course_titles)) {
            foreach ($course_titles as $i => $title) {
                $title = sanitize_text_field($title);
                $grade = sanitize_text_field($grades[$i] ?? '');
                if ($title && $grade !== '') {
                    $wpdb->insert($table_courses, array(
                        'cer_no' => $cer_no,
                        'course_title' => $title,
                        'credits' => sanitize_text_field($credits_list[$i] ?? ''),
                        'percentage' => sanitize_text_field($percentages[$i] ?? ''),
                        'grade' => $grade,
                        'sort_order' => $i
                    ));
                }
            }
        }

        // 3. Update Request status to approved
        $wpdb->update($table_requests, array('status' => 'approved', 'cer_no' => $cer_no), array('id' => $request_id));

        $wpdb->query("COMMIT");

        // 4. Send Premium Email Confirmation with wp_mail()
        $verify_url = home_url('/verify?cer_id=' . urlencode($cer_no));
        $subject = "[IDEAS] Chứng chỉ và Bảng điểm chính thức của bạn đã được phê duyệt";
        
        $body = "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='utf-8'>
            <title>Cấp chứng chỉ thành công</title>
        </head>
        <body style='background-color: #f6f9fc; font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif; padding: 40px 20px;'>
            <table align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.055); border: 1px solid #eef2f6;'>
                <!-- Header -->
                <tr>
                    <td style='background: linear-gradient(135deg, #ab0e00 0%, #e11d48 100%); padding: 40px 30px; text-align: center; color: #ffffff;'>
                        <h1 style='margin: 0; font-size: 24px; font-weight: 800; letter-spacing: 0.5px;'>HỌC VIỆN IDEAS</h1>
                        <p style='margin: 8px 0 0 0; font-size: 14px; opacity: 0.85; font-weight: 500;'>Hệ thống cấp và xác thực chứng chỉ trực tuyến</p>
                    </td>
                </tr>
                <!-- Content -->
                <tr>
                    <td style='padding: 40px 30px; color: #1e293b;'>
                        <h2 style='font-size: 20px; font-weight: 800; margin-top: 0; color: #0f172a;'>Xin chúc mừng $name,</h2>
                        <p style='font-size: 15px; line-height: 1.6; color: #475569;'>Yêu cầu cấp chứng chỉ của bạn đã được ban quản lý học viện phê duyệt thành công. Hồ sơ học tập và chứng chỉ số của bạn đã chính thức có hiệu lực trên hệ thống.</p>
                        
                        <div style='background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin: 28px 0;'>
                            <h3 style='margin-top:0; font-size: 14px; font-weight: 800; color: #0f172a; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #e2e8f0; padding-bottom: 8px;'>Thông tin cấp chứng chỉ</h3>
                            <table width='100%' style='font-size: 14px; color: #475569;'>
                                <tr>
                                    <td width='40%' style='padding: 8px 0; font-weight: 600;'>Mã số chứng chỉ:</td>
                                    <td width='60%' style='padding: 8px 0; font-weight: 800; color: #ab0e00;'>$cer_no</td>
                                </tr>
                                <tr>
                                    <td style='padding: 8px 0; font-weight: 600;'>Học viên:</td>
                                    <td style='padding: 8px 0; font-weight: 700; color: #0f172a; text-transform: uppercase;'>$name</td>
                                </tr>
                                <tr>
                                    <td style='padding: 8px 0; font-weight: 600;'>Số ID / CCCD:</td>
                                    <td style='padding: 8px 0;'>$student_id</td>
                                </tr>
                            </table>
                        </div>

                        <p style='font-size: 14px; line-height: 1.6; color: #64748b; text-align: center; margin-bottom: 24px;'>Nhấp vào nút bên dưới để truy cập trang xác thực trực tuyến và xem bảng điểm chi tiết của bạn:</p>
                        
                        <div style='text-align: center; margin: 30px 0;'>
                            <a href='$verify_url' target='_blank' style='display: inline-block; background: linear-gradient(135deg, #ab0e00 0%, #e11d48 100%); color: #ffffff; padding: 14px 32px; font-size: 15px; font-weight: 700; text-decoration: none; border-radius: 50px; box-shadow: 0 8px 24px rgba(171, 14, 0, 0.2);'>Xác thực chứng chỉ trực tuyến</a>
                        </div>
                    </td>
                </tr>
                <!-- Footer -->
                <tr>
                    <td style='background-color: #f8fafc; border-top: 1px solid #e2e8f0; padding: 24px 30px; text-align: center; font-size: 12px; color: #94a3b8; line-height: 1.5;'>
                        <p style='margin: 0 0 6px 0;'>Đây là email tự động từ hệ thống tra cứu chứng chỉ IDEAS.</p>
                        <p style='margin: 0;'>&copy; " . date('Y') . " Học viện IDEAS. All rights reserved.</p>
                    </td>
                </tr>
            </table>
        </body>
        </html>";

        $headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail($email, $subject, $body, $headers);

        echo "<div class='notice notice-success is-dismissible'><p>Đã duyệt yêu cầu cấp chứng chỉ và gửi email thông báo học tập thành công!</p></div>";
    }
}

// Handle Reject/Delete Request Action
if (isset($_GET['action_type']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $action_type = sanitize_text_field($_GET['action_type']);

    if ($action_type === 'reject') {
        $wpdb->update($table_requests, array('status' => 'rejected'), array('id' => $id));
        echo "<div class='notice notice-success is-dismissible'><p>Đã từ chối yêu cầu cấp chứng chỉ của học viên.</p></div>";
    } elseif ($action_type === 'delete') {
        $wpdb->delete($table_requests, array('id' => $id));
        echo "<div class='notice notice-success is-dismissible'><p>Đã xóa yêu cầu đăng ký.</p></div>";
    }
}

// Fetch requests
$requests = $wpdb->get_results("SELECT * FROM $table_requests ORDER BY created_at DESC");

// Fetch cert groups for dropdown selection
$cert_groups = $wpdb->get_results("SELECT id, name FROM $table_groups ORDER BY id ASC");
?>

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #ab0e00 0%, #e11d48 100%);
        --primary-hover: linear-gradient(135deg, #991b1b 0%, #be123c 100%);
        --border-slate: #e2e8f0;
        --text-slate: #1e293b;
        --text-muted: #64748b;
    }
    .ideas-wrap {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
        font-variant-ligatures: none;
        -webkit-font-variant-ligatures: none;
        margin: 20px 20px 20px 0;
        color: var(--text-slate);
    }
    .ideas-header {
        margin-bottom: 24px;
    }
    .ideas-header h1 {
        font-size: 28px;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 6px 0;
        line-height: 1.3;
        padding: 4px 0;
    }
    .ideas-header p {
        font-size: 14px;
        color: var(--text-muted);
        margin: 0;
    }
    .ideas-box {
        background: white;
        border-radius: 16px;
        border: 1px solid var(--border-slate);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.02), 0 4px 6px -4px rgba(0, 0, 0, 0.02);
        padding: 28px;
    }
    .ideas-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        text-align: left;
    }
    .ideas-table th {
        padding: 14px 16px;
        border-bottom: 2px solid #e2e8f0;
        color: #475569;
        font-weight: 700;
        font-size: 13px;
        background: #f8fafc;
    }
    .ideas-table td {
        padding: 16px;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
        font-size: 14px;
        vertical-align: middle;
    }
    .ideas-table tr:hover td {
        background: #fafafa;
    }
    .ideas-table tr:last-child td {
        border-bottom: none;
    }
    .avatar-mini-container {
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        padding: 2px;
        background: white;
        display: inline-block;
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    }
    .avatar-mini {
        width: 44px;
        height: 56px;
        object-fit: cover;
        border-radius: 4px;
        display: block;
    }
    .badge-pending {
        background: #fffbeb;
        color: #b45309;
        padding: 4px 10px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
        border: 1px solid #fde68a;
        display: inline-block;
    }
    .badge-approved {
        background: #ecfdf5;
        color: #065f46;
        padding: 4px 10px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
        border: 1px solid #a7f3d0;
        display: inline-block;
    }
    .badge-rejected {
        background: #fef2f2;
        color: #991b1b;
        padding: 4px 10px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
        border: 1px solid #fca5a5;
        display: inline-block;
    }
    .btn-action-group {
        display: flex;
        gap: 6px;
        align-items: center;
    }
    .btn-act {
        border-radius: 6px;
        padding: 6px 12px;
        font-weight: 700;
        font-size: 12.5px;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        transition: all 0.2s ease;
        border: 1px solid transparent;
        cursor: pointer;
    }
    .btn-act-approve {
        background: linear-gradient(135deg, #ab0e00 0%, #e11d48 100%);
        color: white !important;
        box-shadow: 0 2px 4px rgba(171, 14, 0, 0.15);
    }
    .btn-act-approve:hover {
        background: linear-gradient(135deg, #991b1b 0%, #be123c 100%);
        transform: translateY(-1px);
    }
    .btn-act-reject {
        background: #f8fafc;
        color: #475569 !important;
        border-color: #e2e8f0;
    }
    .btn-act-reject:hover {
        background: #e2e8f0;
    }
    .btn-act-delete {
        background: #fef2f2;
        color: #991b1b !important;
        border-color: #fee2e2;
    }
    .btn-act-delete:hover {
        background: #b91c1c;
        color: white !important;
    }

    /* ═══ APPROVAL MODAL OVERLAY ═══════════════════════════════════════════ */
    #approveModal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(4px);
        z-index: 99999;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .approve-box {
        background: white;
        padding: 36px;
        border-radius: 16px;
        max-width: 720px;
        width: 90%;
        max-height: 85vh;
        overflow-y: auto;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        border: 1px solid var(--border-slate);
    }
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 16px;
    }
    .form-group {
        margin-bottom: 16px;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 700;
        color: #334155;
        font-size: 13.5px;
    }
    .form-group input, .form-group select {
        width: 100%;
        padding: 10px 14px;
        border: 1.5px solid #cbd5e1;
        border-radius: 8px;
        font-family: inherit;
        font-size: 14px;
        outline: none;
        background: #f8fafc;
        transition: all 0.2s ease;
    }
    .form-group input:focus, .form-group select:focus {
        border-color: #e11d48;
        background: white;
        box-shadow: 0 0 0 4px rgba(225, 29, 72, 0.1);
    }
    .course-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    .course-table th {
        background: #f8fafc;
        border: 1px solid #cbd5e1;
        padding: 10px;
        font-weight: 700;
        font-size: 12px;
        color: #475569;
        text-align: left;
    }
    .course-table td {
        border: 1px solid #e2e8f0;
        padding: 10px;
    }
    .course-table input {
        width: 100%;
        padding: 6px 10px;
        border: 1px solid #cbd5e1;
        border-radius: 4px;
        outline: none;
        font-family: inherit;
        font-size: 13px;
    }
    .course-table input:focus {
        border-color: #e11d48;
    }
</style>

<div class="ideas-wrap">
    <div class="ideas-header">
        <h1>Phê duyệt Cấp Chứng chỉ</h1>
        <p>Xem xét hồ sơ học viên đăng ký qua mã QR, nhập bảng điểm chính thức, duyệt hồ sơ và gửi email thông báo tự động.</p>
    </div>

    <div class="ideas-box">
        <?php if (!empty($requests)): ?>
            <table class="ideas-table">
                <thead>
                    <tr>
                        <th>Ảnh hồ sơ</th>
                        <th>Học viên đăng ký</th>
                        <th>Số ID / CCCD</th>
                        <th>Mã lớp đăng ký</th>
                        <th>Ngày gửi yêu cầu</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($requests as $r): ?>
                        <tr>
                            <td>
                                <div class="avatar-mini-container">
                                    <?php if ($r->avatar_url): ?>
                                        <img src="<?php echo esc_url($r->avatar_url); ?>" class="avatar-mini" />
                                    <?php else: ?>
                                        <div style="width:44px; height:56px; display:flex; align-items:center; justify-content:center; background:#f1f5f9; font-size:20px; border-radius:4px;">👤</div>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td>
                                <strong style="font-size: 15px; color: #0f172a; text-transform: uppercase;"><?php echo esc_html($r->name); ?></strong><br>
                                <span style="font-size: 12.5px; color: var(--text-muted);"><?php echo esc_html($r->email); ?></span>
                            </td>
                            <td><strong style="color: #334155;"><?php echo esc_html($r->student_id); ?></strong></td>
                            <td><span style="font-size:13px; background:#eff6ff; color:#1e40af; border:1px solid #bfdbfe; padding:4px 8px; border-radius:4px; font-weight:700;"><?php echo esc_html($r->contract_code); ?></span></td>
                            <td style="color: var(--text-muted); font-size:13px;"><?php echo esc_html(date('d/m/Y H:i', strtotime($r->created_at))); ?></td>
                            <td>
                                <?php if ($r->status === 'pending'): ?>
                                    <span class="badge-pending">Chờ duyệt</span>
                                <?php elseif ($r->status === 'approved'): ?>
                                    <span class="badge-approved">Đã cấp (<?php echo esc_html($r->cer_no); ?>)</span>
                                <?php else: ?>
                                    <span class="badge-rejected">Từ chối</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-action-group">
                                    <?php if ($r->status === 'pending'): ?>
                                        <button class="btn-act btn-act-approve" onclick='openApproveModal(<?php echo json_encode($r); ?>)'>
                                            <span class="dashicons dashicons-yes" style="font-size:16px; width:16px; height:16px; margin-top:-1px;"></span> Duyệt & Cấp
                                        </button>
                                        <a href="?page=ideas-cert-requests&action_type=reject&id=<?php echo $r->id; ?>" class="btn-act btn-act-reject" onclick="return confirm('Bạn có chắc muốn từ chối yêu cầu này?')">Từ chối</a>
                                    <?php endif; ?>
                                    <a href="?page=ideas-cert-requests&action_type=delete&id=<?php echo $r->id; ?>" class="btn-act btn-act-delete" onclick="return confirm('Bạn có chắc muốn xóa bản ghi này?')">Xóa</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="color: #64748b; font-style: italic; padding: 20px 0; text-align: center;">Chưa có yêu cầu nào từ học viên gửi lên.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Approval Modal -->
<div id="approveModal" style="display: none;">
    <div class="approve-box">
        <h2 style="margin-top: 0; margin-bottom: 24px; font-weight: 800; border-bottom: 1px solid #f1f5f9; padding-bottom: 14px; display: flex; align-items: center; gap: 8px;">
            <span class="dashicons dashicons-awards" style="font-size: 24px; width:24px; height:24px; color:#e11d48; margin-top:2px;"></span> Phê duyệt & Cấp chứng chỉ số
        </h2>
        <form method="POST">
            <?php wp_nonce_field('ideas_approve_request_nonce'); ?>
            <input type="hidden" name="ideas_approve_request" value="1" />
            <input type="hidden" id="modal_request_id" name="request_id" />
            <input type="hidden" id="modal_avatar_url" name="avatar_url" />

            <div class="form-row">
                <div class="form-group">
                    <label for="modal_cer_no">Mã số chứng chỉ (Sẽ cấp chính thức) <span>*</span></label>
                    <input type="text" id="modal_cer_no" name="cer_no" required />
                </div>
                <div class="form-group">
                    <label for="modal_group_id">Nhóm phôi thiết kế (Template) <span>*</span></label>
                    <select id="modal_group_id" name="group_id" required>
                        <option value="">-- Chọn nhóm mẫu --</option>
                        <?php foreach ($cert_groups as $g): ?>
                            <option value="<?php echo $g->id; ?>"><?php echo esc_html($g->name); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="modal_name">Họ và tên học viên <span>*</span></label>
                    <input type="text" id="modal_name" name="name" required style="text-transform: uppercase;" />
                </div>
                <div class="form-group">
                    <label for="modal_student_id">Số ID / CCCD học viên <span>*</span></label>
                    <input type="text" id="modal_student_id" name="student_id" required />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="modal_email">Email nhận liên kết và mã OTP <span>*</span></label>
                    <input type="email" id="modal_email" name="email" required />
                </div>
                <div class="form-group">
                    <label for="modal_dob">Ngày sinh học viên</label>
                    <input type="date" id="modal_dob" name="dob" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="modal_sex">Giới tính</label>
                    <select id="modal_sex" name="sex">
                        <option value="">-- Chọn giới tính --</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Khác">Khác</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="modal_nationality">Quốc tịch</label>
                    <input type="text" id="modal_nationality" name="nationality" value="Viet Nam" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="modal_registration_date">Thời gian đào tạo (Registration Date)</label>
                    <input type="text" id="modal_registration_date" name="registration_date" placeholder="Ví dụ: 2025 - 2026" />
                </div>
                <div class="form-group">
                    <label for="modal_cert_number">Số hiệu quyết định cấp</label>
                    <input type="text" id="modal_cert_number" name="cert_number" placeholder="Ví dụ: QĐ-08/VTCI" />
                </div>
            </div>

            <!-- Course Grades Grid Editor -->
            <div style="margin-top: 28px; margin-bottom: 24px;">
                <h3 style="font-size: 15px; font-weight: 800; color: #0f172a; margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center;">
                    <span>Bảng điểm chi tiết môn học</span>
                    <button type="button" class="button" style="border-radius: 6px; font-weight: 700;" onclick="addCourseRow('', '', '', '')">
                        <span class="dashicons dashicons-plus" style="font-size:16px; margin-top:2px;"></span> Thêm môn
                    </button>
                </h3>
                
                <table class="course-table">
                    <thead>
                        <tr>
                            <th style="width: 48%;">Tên môn học (Course Module)</th>
                            <th style="width: 14%;">Số tín chỉ</th>
                            <th style="width: 14%;">Điểm (%)</th>
                            <th style="width: 14%;">Điểm Chữ</th>
                            <th style="width: 10%; text-align: center;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="courseTableBody">
                        <!-- Added dynamically -->
                    </tbody>
                </table>
            </div>

            <div style="display: flex; gap: 10px; justify-content: flex-end; margin-top: 24px; border-top: 1px solid #f1f5f9; padding-top: 20px;">
                <button type="button" class="button button-large" style="border-radius: 8px;" onclick="closeApproveModal()">Hủy</button>
                <button type="submit" class="button button-primary button-large" style="border-radius: 8px; background:#ab0e00; border-color:#ab0e00; font-weight:700;">Phê duyệt & Cấp số</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function openApproveModal(req) {
        document.getElementById('modal_request_id').value = req.id;
        document.getElementById('modal_avatar_url').value = req.avatar_url || '';
        document.getElementById('modal_name').value = req.name;
        document.getElementById('modal_student_id').value = req.student_id;
        document.getElementById('modal_email').value = req.email;
        document.getElementById('modal_dob').value = req.dob || '';
        document.getElementById('modal_sex').value = req.sex || '';
        document.getElementById('modal_nationality').value = req.nationality || 'Viet Nam';
        
        // Auto suggested cert id
        const randomCode = 'IDEAS-CER-' + Math.floor(100000 + Math.random() * 900000);
        document.getElementById('modal_cer_no').value = randomCode;

        // Clear courses
        const tableBody = document.getElementById('courseTableBody');
        tableBody.innerHTML = '';

        // Add default row
        addCourseRow('Pre-Top up MBA Course Module', '4.0', '85%', 'A');

        document.getElementById('approveModal').style.display = 'flex';
    }

    function closeApproveModal() {
        document.getElementById('approveModal').style.display = 'none';
    }

    function addCourseRow(title, credits, percentage, grade) {
        const tableBody = document.getElementById('courseTableBody');
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td><input type="text" name="course_title[]" value="${title}" required /></td>
            <td><input type="text" name="credits[]" value="${credits}" style="text-align: center;" /></td>
            <td><input type="text" name="percentage[]" value="${percentage}" style="text-align: center;" /></td>
            <td><input type="text" name="grade[]" value="${grade}" style="text-align: center; font-weight:700;" required /></td>
            <td style="text-align: center; vertical-align: middle;">
                <button type="button" class="button" onclick="this.parentElement.parentElement.remove()" style="color: #ef4444; border-color: #fee2e2; background:#fef2f2; font-weight:bold;">X</button>
            </td>
        `;
        tableBody.appendChild(tr);
    }
</script>
