<?php
// admin-contracts.php - Third-party Contracts List and Generation
if (!defined('ABSPATH')) {
    exit;
}

global $wpdb;
$table_contracts = $wpdb->prefix . 'ideas_certificate_contracts';

// Handle Add Contract Form Submit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ideas_add_contract'])) {
    check_admin_referer('ideas_add_contract_nonce');
    
    $code = sanitize_text_field($_POST['contract_code'] ?? '');
    $partner = sanitize_text_field($_POST['partner_name'] ?? '');
    $course = sanitize_text_field($_POST['course_name'] ?? '');

    if (!empty($code) && !empty($partner) && !empty($course)) {
        // Check if contract code exists
        $exists = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_contracts WHERE contract_code = %s", $code));
        if ($exists == 0) {
            $wpdb->insert($table_contracts, array(
                'contract_code' => $code,
                'partner_name' => $partner,
                'course_name' => $course,
                'status' => 'active'
            ));
            echo "<div class='notice notice-success is-dismissible'><p>Đã tạo hợp đồng liên kết thành công!</p></div>";
        } else {
            echo "<div class='notice notice-error is-dismissible'><p>Lỗi: Mã hợp đồng / lớp học này đã tồn tại.</p></div>";
        }
    }
}

// Handle Delete/Status Actions
if (isset($_GET['action_type']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $action_type = sanitize_text_field($_GET['action_type']);

    if ($action_type === 'delete') {
        $wpdb->delete($table_contracts, array('id' => $id));
        echo "<div class='notice notice-success is-dismissible'><p>Đã xóa hợp đồng liên kết thành công.</p></div>";
    } elseif ($action_type === 'toggle_status') {
        $current = $wpdb->get_var($wpdb->prepare("SELECT status FROM $table_contracts WHERE id = %d", $id));
        $new_status = $current === 'active' ? 'expired' : 'active';
        $wpdb->update($table_contracts, array('status' => $new_status), array('id' => $id));
        echo "<div class='notice notice-success is-dismissible'><p>Đã cập nhật trạng thái hợp đồng.</p></div>";
    }
}

// Fetch all contracts
$contracts = $wpdb->get_results("SELECT * FROM $table_contracts ORDER BY created_at DESC");
?>

<style>
    .ideas-wrap {
        font-family: 'Plus Jakarta Sans', sans-serif;
        margin: 20px 20px 0 0;
    }
    .ideas-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }
    .ideas-header h1 {
        font-size: 26px;
        font-weight: 800;
        color: #0f172a;
        margin: 0;
    }
    .ideas-row {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 24px;
    }
    @media screen and (max-width: 992px) {
        .ideas-row {
            grid-template-columns: 1fr;
        }
    }
    .ideas-box {
        background: white;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        padding: 24px;
    }
    .ideas-box h2 {
        font-size: 18px;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 20px 0;
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 12px;
    }
    .form-group {
        margin-bottom: 18px;
    }
    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: 700;
        color: #334155;
        font-size: 13px;
    }
    .form-group input {
        width: 100%;
        padding: 10px 14px;
        border: 1.5px solid #cbd5e1;
        border-radius: 6px;
        font-family: inherit;
        font-size: 14px;
        outline: none;
    }
    .form-group input:focus {
        border-color: #ab0e00;
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
    .badge-active {
        background: #d1fae5;
        color: #065f46;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 700;
    }
    .badge-expired {
        background: #fee2e2;
        color: #991b1b;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 700;
    }
    .btn-ideas {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: linear-gradient(135deg, #ab0e00, #d42a1a);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 13px;
        text-decoration: none;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(171, 14, 0, 0.15);
        transition: all 0.2s;
    }
    .btn-ideas:hover {
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(171, 14, 0, 0.2);
    }
    /* QR Code Modal Container */
    #qrModal {
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
    .qr-box {
        background: white;
        padding: 30px;
        border-radius: 12px;
        max-width: 360px;
        width: 90%;
        text-align: center;
        box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1);
    }
</style>

<div class="ideas-wrap">
    <div class="ideas-header">
        <h1>Quản lý Hợp đồng Bên thứ ba</h1>
    </div>

    <div class="ideas-row">
        <!-- Contracts List Table -->
        <div class="ideas-box">
            <h2>Danh sách hợp đồng</h2>
            <?php if (!empty($contracts)): ?>
                <table class="ideas-table">
                    <thead>
                        <tr>
                            <th>Mã liên kết</th>
                            <th>Bên thứ ba (Đối tác)</th>
                            <th>Tên khóa học</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contracts as $c): ?>
                            <?php $reg_url = home_url('/verify-request?contract_code=' . urlencode($c->contract_code)); ?>
                            <tr>
                                <td><strong><?php echo esc_html($c->contract_code); ?></strong></td>
                                <td><?php echo esc_html($c->partner_name); ?></td>
                                <td><?php echo esc_html($c->course_name); ?></td>
                                <td>
                                    <?php if ($c->status === 'active'): ?>
                                        <span class="badge-active">Hoạt động</span>
                                    <?php else: ?>
                                        <span class="badge-expired">Hết hạn</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="button button-secondary" onclick="showQrModal('<?php echo esc_js($reg_url); ?>', '<?php echo esc_js($c->partner_name); ?>')">Lấy mã QR</button>
                                    <a href="?page=ideas-cert-contracts&action_type=toggle_status&id=<?php echo $c->id; ?>" class="button button-link">Đổi trạng thái</a>
                                    <a href="?page=ideas-cert-contracts&action_type=delete&id=<?php echo $c->id; ?>" class="button button-link" style="color: #b91c1c;" onclick="return confirm('Bạn có chắc chắn muốn xóa hợp đồng này không?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p style="color: #64748b; font-style: italic;">Chưa có hợp đồng bên thứ ba nào được tạo.</p>
            <?php endif; ?>
        </div>

        <!-- Add New Contract Form -->
        <div class="ideas-box" style="height: fit-content;">
            <h2>Thêm hợp đồng mới</h2>
            <form method="POST">
                <?php wp_nonce_field('ideas_add_contract_nonce'); ?>
                <input type="hidden" name="ideas_add_contract" value="1" />

                <div class="form-group">
                    <label for="contract_code">Mã hợp đồng / Mã lớp học</label>
                    <input type="text" id="contract_code" name="contract_code" required placeholder="Ví dụ: MBA_K26_CLASS_A" />
                </div>
                <div class="form-group">
                    <label for="partner_name">Bên thứ ba (Tên đối tác)</label>
                    <input type="text" id="partner_name" name="partner_name" required placeholder="Ví dụ: Đại học MBA liên kết" />
                </div>
                <div class="form-group">
                    <label for="course_name">Tên khóa học chính thức</label>
                    <input type="text" id="course_name" name="course_name" required placeholder="Ví dụ: Pre-Top up MBA Course" />
                </div>

                <button type="submit" class="btn-ideas" style="width: 100%; justify-content: center;">
                    <span class="dashicons dashicons-plus-alt"></span> Tạo hợp đồng cấp chứng chỉ
                </button>
            </form>
        </div>
    </div>
</div>

<!-- QR Code Modal -->
<div id="qrModal" style="display: none;">
    <div class="qr-box">
        <h3 id="qrModalTitle" style="margin-bottom: 12px; font-size: 16px; color: #0f172a; font-weight: 800;">Mã QR đăng ký học viên</h3>
        <div id="qrcode" style="display: flex; justify-content: center; margin: 20px 0;"></div>
        <p style="font-size: 12px; color: #64748b; margin-bottom: 20px; word-break: break-all;" id="qrModalLink"></p>
        <button class="button button-primary" onclick="closeQrModal()" style="width: 100%;">Đóng</button>
    </div>
</div>

<script type="text/javascript">
    let qrGenerator = null;

    function showQrModal(url, partner) {
        document.getElementById('qrModalTitle').innerText = 'Mã QR đăng ký: ' + partner;
        document.getElementById('qrModalLink').innerText = url;
        
        const qrContainer = document.getElementById('qrcode');
        qrContainer.innerHTML = '';
        
        // Generate QR code pointing to student request form
        new QRCode(qrContainer, {
            text: url,
            width: 200,
            height: 200,
            colorDark : "#000000",
            colorLight : "#ffffff"
        });

        document.getElementById('qrModal').style.display = 'flex';
    }

    function closeQrModal() {
        document.getElementById('qrModal').style.display = 'none';
    }
</script>
