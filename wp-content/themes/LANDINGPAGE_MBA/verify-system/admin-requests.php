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
        // Start transaction manually via $wpdb
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

        $cert_inserted = $wpdb->replace($table_certs, $cert_data);

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

        // 4. Send email confirmation with wp_mail()
        $verify_url = home_url('/verify?cer_id=' . urlencode($cer_no));
        $subject = "[IDEAS] Chứng chỉ và Bảng điểm chính thức của bạn đã được cấp";
        $body = "
        <html>
        <head>
            <title>Cấp chứng chỉ học viên thành công</title>
        </head>
        <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
            <h2>Xin chúc mừng $name,</h2>
            <p>Học viện IDEAS đã phê duyệt hồ sơ và chính thức cấp chứng chỉ cho bạn!</p>
            <p>Dưới đây là thông tin chứng chỉ của bạn:</p>
            <ul>
                <li><strong>Mã số chứng chỉ:</strong> $cer_no</li>
                <li><strong>Họ và tên học viên:</strong> $name</li>
                <li><strong>Số ID/CCCD:</strong> $student_id</li>
            </ul>
            <p>Bạn có thể xác thực chứng chỉ trực tuyến và xem bảng điểm chính thức thông qua liên kết sau:</p>
            <div style='margin: 25px 0;'>
                <a href='$verify_url' target='_blank' style='background: #ab0e00; color: white; padding: 12px 28px; text-decoration: none; border-radius: 6px; font-weight: bold; font-size: 15px; box-shadow: 0 4px 12px rgba(171,14,0,0.2);'>Xác thực chứng chỉ trực tuyến</a>
            </div>
            <p>Nhấp vào liên kết trên hoặc quét mã QR in trên chứng chỉ để tra cứu thông tin học tập của bạn bất kỳ lúc nào.</p>
            <p>Trân trọng,<br>Học viện IDEAS</p>
        </body>
        </html>";

        $headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail($email, $subject, $body, $headers);

        echo "<div class='notice notice-success is-dismissible'><p>Đã duyệt yêu cầu cấp chứng chỉ và gửi email thông báo thành công!</p></div>";
    }
}

// Handle Reject/Delete Request Action
if (isset($_GET['action_type']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $action_type = sanitize_text_field($_GET['action_type']);

    if ($action_type === 'reject') {
        $wpdb->update($table_requests, array('status' => 'rejected'), array('id' => $id));
        echo "<div class='notice notice-success is-dismissible'><p>Đã từ chối yêu cầu cấp chứng chỉ.</p></div>";
    } elseif ($action_type === 'delete') {
        $wpdb->delete($table_requests, array('id' => $id));
        echo "<div class='notice notice-success is-dismissible'><p>Đã xóa yêu cầu thành công.</p></div>";
    }
}

// Fetch requests
$requests = $wpdb->get_results("SELECT * FROM $table_requests ORDER BY created_at DESC");

// Fetch cert groups for dropdown selection
$cert_groups = $wpdb->get_results("SELECT id, name FROM $table_groups ORDER BY id ASC");
?>

<style>
    .ideas-wrap {
        font-family: 'Plus Jakarta Sans', sans-serif;
        margin: 20px 20px 0 0;
    }
    .ideas-header h1 {
        font-size: 26px;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 24px 0;
    }
    .ideas-box {
        background: white;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        padding: 24px;
    }
    .ideas-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }
    .ideas-table th {
        padding: 12px;
        border-bottom: 2px solid #e2e8f0;
        color: #475569;
        font-weight: 700;
        font-size: 13px;
    }
    .ideas-table td {
        padding: 14px 12px;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
        font-size: 14px;
        vertical-align: middle;
    }
    .ideas-table tr:hover {
        background: #f8fafc;
    }
    .avatar-mini {
        width: 45px;
        height: 60px;
        object-fit: cover;
        border-radius: 4px;
        border: 1px solid #cbd5e1;
    }
    .badge-pending {
        background: #fef3c7;
        color: #b45309;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 700;
    }
    .badge-approved {
        background: #d1fae5;
        color: #065f46;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 700;
    }
    .badge-rejected {
        background: #fee2e2;
        color: #991b1b;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 700;
    }
    /* Approval Modal Overlay */
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
        padding: 30px;
        border-radius: 12px;
        max-width: 700px;
        width: 90%;
        max-height: 85vh;
        overflow-y: auto;
        box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1);
    }
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        margin-bottom: 14px;
    }
    .form-group {
        margin-bottom: 14px;
    }
    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: 700;
        color: #334155;
        font-size: 13px;
    }
    .form-group input, .form-group select {
        width: 100%;
        padding: 8px 12px;
        border: 1.5px solid #cbd5e1;
        border-radius: 6px;
        font-family: inherit;
        font-size: 14px;
        outline: none;
    }
    .form-group input:focus, .form-group select:focus {
        border-color: #ab0e00;
    }
</style>

<div class="ideas-wrap">
    <div class="ideas-header">
        <h1>Yêu cầu Cấp chứng chỉ (Sinh viên đăng ký)</h1>
    </div>

    <div class="ideas-box">
        <?php if (!empty($requests)): ?>
            <table class="ideas-table">
                <thead>
                    <tr>
                        <th>Ảnh thẻ</th>
                        <th>Học viên</th>
                        <th>Số ID / CCCD</th>
                        <th>Mã lớp đăng ký</th>
                        <th>Ngày yêu cầu</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($requests as $r): ?>
                        <tr>
                            <td>
                                <?php if ($r->avatar_url): ?>
                                    <img src="<?php echo esc_url($r->avatar_url); ?>" class="avatar-mini" />
                                <?php else: ?>
                                    <span style="font-size: 24px;">👤</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <strong><?php echo esc_html($r->name); ?></strong><br>
                                <span style="font-size: 12px; color: #64748b;"><?php echo esc_html($r->email); ?></span>
                            </td>
                            <td><?php echo esc_html($r->student_id); ?></td>
                            <td><strong><?php echo esc_html($r->contract_code); ?></strong></td>
                            <td><?php echo esc_html(date('d/m/Y H:i', strtotime($r->created_at))); ?></td>
                            <td>
                                <?php if ($r->status === 'pending'): ?>
                                    <span class="badge-pending">Chờ duyệt</span>
                                <?php elseif ($r->status === 'approved'): ?>
                                    <span class="badge-approved">Đã duyệt (<?php echo esc_html($r->cer_no); ?>)</span>
                                <?php else: ?>
                                    <span class="badge-rejected">Đã từ chối</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($r->status === 'pending'): ?>
                                    <button class="button button-primary" onclick='openApproveModal(<?php echo json_encode($r); ?>)'>Duyệt & Cấp</button>
                                    <a href="?page=ideas-cert-requests&action_type=reject&id=<?php echo $r->id; ?>" class="button button-secondary" onclick="return confirm('Bạn có chắc muốn từ chối yêu cầu này?')">Từ chối</a>
                                <?php endif; ?>
                                <a href="?page=ideas-cert-requests&action_type=delete&id=<?php echo $r->id; ?>" class="button button-link" style="color: #b91c1c;" onclick="return confirm('Bạn có chắc muốn xóa bản ghi này?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="color: #64748b; font-style: italic;">Chưa có yêu cầu nào từ học viên.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Approval Modal -->
<div id="approveModal" style="display: none;">
    <div class="approve-box">
        <h2 style="margin-top: 0; margin-bottom: 20px; font-weight: 800; border-bottom: 1px solid #f1f5f9; padding-bottom: 10px;">Phê duyệt & Cấp chứng chỉ</h2>
        <form method="POST">
            <?php wp_nonce_field('ideas_approve_request_nonce'); ?>
            <input type="hidden" name="ideas_approve_request" value="1" />
            <input type="hidden" id="modal_request_id" name="request_id" />
            <input type="hidden" id="modal_avatar_url" name="avatar_url" />

            <div class="form-row">
                <div class="form-group">
                    <label for="modal_cer_no">Mã số chứng chỉ (Sẽ tạo mới/ghi đè) <span>*</span></label>
                    <input type="text" id="modal_cer_no" name="cer_no" required placeholder="Ví dụ: IDEAS-MBA-2026001" />
                </div>
                <div class="form-group">
                    <label for="modal_group_id">Nhóm mẫu thiết kế (Cert Group) <span>*</span></label>
                    <select id="modal_group_id" name="group_id" required>
                        <option value="">-- Chọn nhóm chứng chỉ --</option>
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
                    <label for="modal_student_id">Số ID / CCCD <span>*</span></label>
                    <input type="text" id="modal_student_id" name="student_id" required />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="modal_email">Email nhận <span>*</span></label>
                    <input type="email" id="modal_email" name="email" required />
                </div>
                <div class="form-group">
                    <label for="modal_dob">Ngày sinh</label>
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
                    <label for="modal_cert_number">Số quyết định cấp (Số hiệu quyết định)</label>
                    <input type="text" id="modal_cert_number" name="cert_number" placeholder="Ví dụ: QĐ-08/VTCI" />
                </div>
            </div>

            <!-- Course Grades Grid Editor -->
            <div style="margin-top: 24px; margin-bottom: 20px;">
                <h3 style="font-size: 15px; font-weight: 800; color: #0f172a; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center;">
                    <span>Bảng điểm chi tiết (Transcript Courses)</span>
                    <button type="button" class="button" onclick="addCourseRow('', '', '', '')">Thêm môn học</button>
                </h3>
                
                <table class="wp-list-table widefat fixed striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th style="width: 45%;">Tên môn học (Course Title)</th>
                            <th style="width: 15%;">Số tín chỉ</th>
                            <th style="width: 15%;">Điểm (%)</th>
                            <th style="width: 15%;">Điểm Chữ</th>
                            <th style="width: 10%;">Xóa</th>
                        </tr>
                    </thead>
                    <tbody id="courseTableBody">
                        <!-- Javascript will dynamically add rows here -->
                    </tbody>
                </table>
            </div>

            <div style="display: flex; gap: 10px; justify-content: flex-end; margin-top: 20px;">
                <button type="button" class="button" onclick="closeApproveModal()">Hủy</button>
                <button type="submit" class="button button-primary">Phê duyệt & Gửi Email Cấp</button>
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
        
        // Auto-generate a suggested certificate ID if empty
        const randomCode = 'IDEAS-' + Math.floor(1000 + Math.random() * 9000);
        document.getElementById('modal_cer_no').value = randomCode;

        // Clear previous course rows
        const tableBody = document.getElementById('courseTableBody');
        tableBody.innerHTML = '';

        // Add 1 default row to start with
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
            <td><input type="text" name="course_title[]" value="${title}" style="width: 100%;" required /></td>
            <td><input type="text" name="credits[]" value="${credits}" style="width: 100%;" /></td>
            <td><input type="text" name="percentage[]" value="${percentage}" style="width: 100%;" /></td>
            <td><input type="text" name="grade[]" value="${grade}" style="width: 100%;" required /></td>
            <td style="text-align: center; vertical-align: middle;"><button type="button" class="button" onclick="this.parentElement.parentElement.remove()" style="color: #b91c1c;">X</button></td>
        `;
        tableBody.appendChild(tr);
    }
</script>
