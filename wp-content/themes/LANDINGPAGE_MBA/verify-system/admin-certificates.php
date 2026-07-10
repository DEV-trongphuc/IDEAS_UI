<?php
// admin-certificates.php - CRUD management of issued certificates
if (!defined('ABSPATH')) {
    exit;
}

global $wpdb;
$table_certs = $wpdb->prefix . 'ideas_certificates';
$table_courses = $wpdb->prefix . 'ideas_transcript_courses';
$table_groups = $wpdb->prefix . 'ideas_cert_groups';

// Handle Edit Certificate POST Submit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ideas_edit_certificate'])) {
    check_admin_referer('ideas_edit_cert_nonce');

    $id = intval($_POST['cert_id']);
    $cer_no = sanitize_text_field($_POST['cer_no']);
    $student_id = sanitize_text_field($_POST['student_id']);
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $dob = sanitize_text_field($_POST['dob']);
    $sex = sanitize_text_field($_POST['sex']);
    $nationality = sanitize_text_field($_POST['nationality']);
    $registration_date = sanitize_text_field($_POST['registration_date']);
    $cert_number = sanitize_text_field($_POST['cert_number']);
    $group_id = intval($_POST['group_id']);
    $status = sanitize_text_field($_POST['status']);
    $paused_reason = sanitize_textarea_field($_POST['paused_reason']);
    
    // Courses grid
    $course_titles = $_POST['course_title'] ?? array();
    $credits_list = $_POST['credits'] ?? array();
    $percentages = $_POST['percentage'] ?? array();
    $grades = $_POST['grade'] ?? array();

    if ($id && !empty($cer_no) && !empty($name)) {
        $wpdb->query("START TRANSACTION");

        $wpdb->update($table_certs, array(
            'cer_no' => $cer_no,
            'student_id' => $student_id,
            'name' => $name,
            'email' => $email ?: null,
            'dob' => $dob ?: null,
            'sex' => $sex ?: null,
            'nationality' => $nationality,
            'registration_date' => $registration_date ?: null,
            'id_student' => $student_id ?: null,
            'cert_number' => $cert_number ?: null,
            'group_id' => $group_id ?: null,
            'status' => $status,
            'paused_reason' => $paused_reason ?: null
        ), array('id' => $id));

        // Re-insert courses
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

        $wpdb->query("COMMIT");
        echo "<div class='notice notice-success is-dismissible'><p>Đã cập nhật hồ sơ và bảng điểm học viên thành công!</p></div>";
    }
}

// Handle Delete Certificate Action
if (isset($_GET['action_type']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $action_type = sanitize_text_field($_GET['action_type']);

    if ($action_type === 'delete') {
        $cer_no = $wpdb->get_var($wpdb->prepare("SELECT cer_no FROM $table_certs WHERE id = %d", $id));
        if ($cer_no) {
            $wpdb->query("START TRANSACTION");
            $wpdb->delete($table_certs, array('id' => $id));
            $wpdb->delete($table_courses, array('cer_no' => $cer_no));
            $wpdb->query("COMMIT");
            echo "<div class='notice notice-success is-dismissible'><p>Đã xóa chứng chỉ và dữ liệu bảng điểm liên quan thành công.</p></div>";
        }
    }
}

// Search and pagination
$search = sanitize_text_field($_GET['s'] ?? '');
$status_filter = sanitize_text_field($_GET['status'] ?? '');

$sql = "SELECT * FROM $table_certs WHERE 1=1";
$params = array();
if (!empty($search)) {
    $sql .= " AND (cer_no LIKE %s OR name LIKE %s OR student_id LIKE %s)";
    $params[] = "%$search%";
    $params[] = "%$search%";
    $params[] = "%$search%";
}
if (!empty($status_filter)) {
    $sql .= " AND status = %s";
    $params[] = $status_filter;
}
$sql .= " ORDER BY created_at DESC";

if (!empty($params)) {
    $certs = $wpdb->get_results($wpdb->prepare($sql, $params));
} else {
    $certs = $wpdb->get_results($sql);
}

// Fetch groups and courses for modal JS
$cert_groups = $wpdb->get_results("SELECT id, name FROM $table_groups ORDER BY id ASC");
$all_courses_raw = $wpdb->get_results("SELECT * FROM $table_courses ORDER BY cer_no, sort_order ASC", ARRAY_A);

$courses_by_cert = array();
foreach ($all_courses_raw as $c) {
    $courses_by_cert[$c['cer_no']][] = $c;
}
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
        background: linear-gradient(135deg, #0f172a 0%, #334155 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin: 0 0 6px 0;
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
    .filter-row {
        display: flex;
        gap: 12px;
        margin-bottom: 24px;
        align-items: center;
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
    .badge-active {
        background: #ecfdf5;
        color: #065f46;
        padding: 4px 10px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
        border: 1px solid #a7f3d0;
        display: inline-block;
    }
    .badge-paused {
        background: #fffbeb;
        color: #b45309;
        padding: 4px 10px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
        border: 1px solid #fde68a;
        display: inline-block;
    }
    .badge-locked {
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
    .btn-act-edit {
        background: #f8fafc;
        color: #475569 !important;
        border-color: #e2e8f0;
    }
    .btn-act-edit:hover {
        background: #e2e8f0;
    }
    .btn-act-view {
        background: #f0fdf4;
        color: #15803d !important;
        border-color: #bbf7d0;
    }
    .btn-act-view:hover {
        background: #15803d;
        color: white !important;
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

    /* ═══ EDIT MODAL OVERLAY ═══════════════════════════════════════════════ */
    #editModal {
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
    .edit-box {
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
    .form-group input, .form-group select, .form-group textarea {
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
    .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
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
        <h1>Danh sách Chứng chỉ đã cấp</h1>
        <p>Quản lý toàn bộ thông tin chi tiết và dữ liệu kết quả học tập của các chứng chỉ đã được cấp.</p>
    </div>

    <div class="ideas-box">
        <!-- Search and Filter Form -->
        <form method="GET" class="filter-row">
            <input type="hidden" name="page" value="ideas-cert-list" />
            <input type="text" name="s" value="<?php echo esc_attr($search); ?>" placeholder="Tìm mã số, tên học viên, CCCD..." style="padding: 10px 14px; width: 320px; border-radius: 8px; border: 1.5px solid #cbd5e1; font-family: inherit; font-size:14px;" />
            
            <select name="status" style="padding: 10px 14px; border-radius: 8px; border: 1.5px solid #cbd5e1; font-family: inherit; font-size:14px; background:#f8fafc;">
                <option value="">-- Tất cả trạng thái --</option>
                <option value="active" <?php selected($status_filter, 'active'); ?>>Hoạt động</option>
                <option value="paused" <?php selected($status_filter, 'paused'); ?>>Tạm dừng</option>
                <option value="locked" <?php selected($status_filter, 'locked'); ?>>Khóa</option>
            </select>

            <button type="submit" class="button button-primary button-large" style="border-radius: 8px;">Tìm kiếm</button>
            <?php if (!empty($search) || !empty($status_filter)): ?>
                <a href="?page=ideas-cert-list" class="button button-secondary button-large" style="border-radius: 8px;">Đặt lại</a>
            <?php endif; ?>
        </form>

        <?php if (!empty($certs)): ?>
            <table class="ideas-table">
                <thead>
                    <tr>
                        <th>Ảnh hồ sơ</th>
                        <th>Mã chứng chỉ</th>
                        <th>Học viên</th>
                        <th>Số ID / CCCD</th>
                        <th>Ngày cấp</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($certs as $c): ?>
                        <tr>
                            <td>
                                <div class="avatar-mini-container">
                                    <?php if ($c->avatar_url): ?>
                                        <img src="<?php echo esc_url($c->avatar_url); ?>" class="avatar-mini" />
                                    <?php else: ?>
                                        <div style="width:44px; height:56px; display:flex; align-items:center; justify-content:center; background:#f1f5f9; font-size:20px; border-radius:4px;">👤</div>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td><strong style="color: #ab0e00; font-size: 15px;"><?php echo esc_html($c->cer_no); ?></strong></td>
                            <td>
                                <strong style="font-size: 15px; color: #0f172a; text-transform: uppercase;"><?php echo esc_html($c->name); ?></strong><br>
                                <span style="font-size: 12.5px; color: var(--text-muted);"><?php echo esc_html($c->email); ?></span>
                            </td>
                            <td><strong style="color: #334155;"><?php echo esc_html($c->student_id); ?></strong></td>
                            <td style="color: var(--text-muted); font-size: 13.5px;"><?php echo esc_html(date('d/m/Y', strtotime($c->date))); ?></td>
                            <td>
                                <?php if ($c->status === 'active'): ?>
                                    <span class="badge-active">Hoạt động</span>
                                <?php elseif ($c->status === 'paused'): ?>
                                    <span class="badge-paused">Tạm dừng</span>
                                <?php else: ?>
                                    <span class="badge-locked">Bị khóa</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-action-group">
                                    <button class="btn-act btn-act-edit" onclick='openEditModal(<?php echo json_encode($c); ?>)'>
                                        Sửa
                                    </button>
                                    <a href="/verify/?cer_id=<?php echo urlencode($c->cer_no); ?>" target="_blank" class="btn-act btn-act-view">
                                        <span class="dashicons dashicons-external" style="font-size:16px; width:16px; height:16px; margin-top:-1px;"></span> Tra cứu
                                    </a>
                                    <a href="?page=ideas-cert-list&action_type=delete&id=<?php echo $c->id; ?>" class="btn-act btn-act-delete" onclick="return confirm('Bạn có chắc muốn xóa vĩnh viễn chứng chỉ này cùng toàn bộ bảng điểm của học viên không?')">
                                        Xóa
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="color: #64748b; font-style: italic; padding: 20px 0; text-align: center;">Không tìm thấy chứng chỉ nào phù hợp.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Edit Certificate Modal -->
<div id="editModal" style="display: none;">
    <div class="edit-box">
        <h2 style="margin-top: 0; margin-bottom: 24px; font-weight: 800; border-bottom: 1px solid #f1f5f9; padding-bottom: 14px; display: flex; align-items: center; gap: 8px;">
            <span class="dashicons dashicons-edit" style="font-size: 24px; width:24px; height:24px; color:#e11d48; margin-top:2px;"></span> Chỉnh sửa Chứng chỉ & Bảng điểm
        </h2>
        <form method="POST">
            <?php wp_nonce_field('ideas_edit_cert_nonce'); ?>
            <input type="hidden" name="ideas_edit_certificate" value="1" />
            <input type="hidden" id="edit_cert_id" name="cert_id" />

            <div class="form-row">
                <div class="form-group">
                    <label for="edit_cer_no">Mã số chứng chỉ <span>*</span></label>
                    <input type="text" id="edit_cer_no" name="cer_no" required />
                </div>
                <div class="form-group">
                    <label for="edit_group_id">Nhóm mẫu thiết kế (Template) <span>*</span></label>
                    <select id="edit_group_id" name="group_id" required>
                        <option value="">-- Chọn nhóm mẫu --</option>
                        <?php foreach ($cert_groups as $g): ?>
                            <option value="<?php echo $g->id; ?>"><?php echo esc_html($g->name); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="edit_name">Họ và tên học viên <span>*</span></label>
                    <input type="text" id="edit_name" name="name" required style="text-transform: uppercase;" />
                </div>
                <div class="form-group">
                    <label for="edit_student_id">Số ID / CCCD học viên <span>*</span></label>
                    <input type="text" id="edit_student_id" name="student_id" required />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="edit_email">Email nhận OTP</label>
                    <input type="email" id="edit_email" name="email" />
                </div>
                <div class="form-group">
                    <label for="edit_dob">Ngày sinh</label>
                    <input type="date" id="edit_dob" name="dob" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="edit_sex">Giới tính</label>
                    <select id="edit_sex" name="sex">
                        <option value="">-- Chọn giới tính --</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Khác">Khác</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit_nationality">Quốc tịch</label>
                    <input type="text" id="edit_nationality" name="nationality" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="edit_registration_date">Thời gian đào tạo (Registration Date)</label>
                    <input type="text" id="edit_registration_date" name="registration_date" />
                </div>
                <div class="form-group">
                    <label for="edit_cert_number">Số hiệu quyết định cấp</label>
                    <input type="text" id="edit_cert_number" name="cert_number" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="edit_status">Trạng thái hồ sơ <span>*</span></label>
                    <select id="edit_status" name="status" required onchange="togglePausedReason(this.value)">
                        <option value="active">Hoạt động (Active)</option>
                        <option value="paused">Tạm dừng (Paused)</option>
                        <option value="locked">Bị khóa (Locked)</option>
                    </select>
                </div>
                <div class="form-group" id="paused_reason_group" style="display: none;">
                    <label for="edit_paused_reason">Lý do khóa / tạm ngưng hồ sơ</label>
                    <textarea id="edit_paused_reason" name="paused_reason" rows="2" placeholder="Nhập lý do hiển thị cho học viên..."></textarea>
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
                        <!-- Dynamic Course Rows will be loaded by JS -->
                    </tbody>
                </table>
            </div>

            <div style="display: flex; gap: 10px; justify-content: flex-end; margin-top: 24px; border-top: 1px solid #f1f5f9; padding-top: 20px;">
                <button type="button" class="button button-large" style="border-radius: 8px;" onclick="closeEditModal()">Hủy</button>
                <button type="submit" class="button button-primary button-large" style="border-radius: 8px; background:#ab0e00; border-color:#ab0e00; font-weight:700;">Lưu thay đổi</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    const coursesByCert = <?php echo json_encode($courses_by_cert); ?>;

    function openEditModal(c) {
        document.getElementById('edit_cert_id').value = c.id;
        document.getElementById('edit_cer_no').value = c.cer_no;
        document.getElementById('edit_group_id').value = c.group_id || '';
        document.getElementById('edit_name').value = c.name;
        document.getElementById('edit_student_id').value = c.student_id;
        document.getElementById('edit_email').value = c.email || '';
        document.getElementById('edit_dob').value = c.dob || '';
        document.getElementById('edit_sex').value = c.sex || '';
        document.getElementById('edit_nationality').value = c.nationality || 'Viet Nam';
        document.getElementById('edit_registration_date').value = c.registration_date || '';
        document.getElementById('edit_cert_number').value = c.cert_number || '';
        document.getElementById('edit_status').value = c.status || 'active';
        document.getElementById('edit_paused_reason').value = c.paused_reason || '';
        
        togglePausedReason(c.status);

        // Load Course rows
        const tableBody = document.getElementById('courseTableBody');
        tableBody.innerHTML = '';

        const certCourses = coursesByCert[c.cer_no] || [];
        if (certCourses.length > 0) {
            certCourses.forEach(course => {
                addCourseRow(course.course_title, course.credits, course.percentage, course.grade);
            });
        } else {
            addCourseRow('', '', '', '');
        }

        document.getElementById('editModal').style.display = 'flex';
    }

    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    function togglePausedReason(status) {
        const group = document.getElementById('paused_reason_group');
        if (status === 'paused' || status === 'locked') {
            group.style.display = 'block';
        } else {
            group.style.display = 'none';
        }
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
