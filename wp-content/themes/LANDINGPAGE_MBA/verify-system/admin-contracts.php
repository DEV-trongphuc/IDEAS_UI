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
            echo "<div class='notice notice-success is-dismissible'><p>🎉 Đã liên kết hợp đồng đối tác mới thành công!</p></div>";
        } else {
            echo "<div class='notice notice-error is-dismissible'><p>❌ Lỗi: Mã hợp đồng này đã được sử dụng.</p></div>";
        }
    }
}

// Handle Delete/Status Actions
if (isset($_GET['action_type']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $action_type = sanitize_text_field($_GET['action_type']);

    if ($action_type === 'delete') {
        $wpdb->delete($table_contracts, array('id' => $id));
        echo "<div class='notice notice-success is-dismissible'><p>🗑️ Đã xóa hợp đồng thành công.</p></div>";
    } elseif ($action_type === 'toggle_status') {
        $current = $wpdb->get_var($wpdb->prepare("SELECT status FROM $table_contracts WHERE id = %d", $id));
        $new_status = $current === 'active' ? 'expired' : 'active';
        $wpdb->update($table_contracts, array('status' => $new_status), array('id' => $id));
        echo "<div class='notice notice-success is-dismissible'><p>🔄 Đã cập nhật trạng thái hợp đồng.</p></div>";
    }
}

// Fetch all contracts
$contracts = $wpdb->get_results("SELECT * FROM $table_contracts ORDER BY created_at DESC");
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
        font-family: 'Plus Jakarta Sans', sans-serif;
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
        border-radius: 16px;
        border: 1px solid var(--border-slate);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.02), 0 4px 6px -4px rgba(0, 0, 0, 0.02);
        padding: 28px;
    }
    .ideas-box h2 {
        font-size: 20px;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 20px 0;
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 700;
        color: #334155;
        font-size: 13.5px;
    }
    .form-group input {
        width: 100%;
        padding: 11px 14px;
        border: 1.5px solid #cbd5e1;
        border-radius: 8px;
        font-family: inherit;
        font-size: 14px;
        outline: none;
        background: #f8fafc;
        transition: all 0.2s ease;
    }
    .form-group input:focus {
        border-color: #e11d48;
        background: white;
        box-shadow: 0 0 0 4px rgba(225, 29, 72, 0.1);
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
    .badge-expired {
        background: #fef2f2;
        color: #991b1b;
        padding: 4px 10px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
        border: 1px solid #fca5a5;
        display: inline-block;
    }
    .btn-ideas {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: var(--primary-gradient);
        color: white !important;
        border: none;
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 14px;
        text-decoration: none;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(171, 14, 0, 0.15);
        transition: all 0.2s ease;
    }
    .btn-ideas:hover {
        background: var(--primary-hover);
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(171, 14, 0, 0.25);
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
    .btn-act-qr {
        background: #f0f9ff;
        color: #0369a1 !important;
        border-color: #bae6fd;
    }
    .btn-act-qr:hover {
        background: #0369a1;
        color: white !important;
    }
    .btn-act-toggle {
        background: #f8fafc;
        color: #475569 !important;
        border-color: #e2e8f0;
    }
    .btn-act-toggle:hover {
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

    /* ═══ QR CODE MODAL ═════════════════════════════════════════════════════ */
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
        padding: 36px;
        border-radius: 16px;
        max-width: 400px;
        width: 90%;
        text-align: center;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        border: 1px solid var(--border-slate);
    }
    .qr-box h3 {
        margin: 0 0 8px 0;
        font-size: 18px;
        color: #0f172a;
        font-weight: 800;
    }
    .qr-box p {
        font-size: 13px;
        color: var(--text-muted);
        margin-bottom: 24px;
        line-height: 1.5;
    }
    .qr-image-container {
        display: flex;
        justify-content: center;
        margin: 20px 0;
        background: #f8fafc;
        padding: 16px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
    }
    .qr-url-text {
        font-size: 12.5px;
        background: #f1f5f9;
        padding: 10px 14px;
        border-radius: 6px;
        word-break: break-all;
        color: #334155;
        font-family: monospace;
        margin-bottom: 20px;
        border: 1px solid #cbd5e1;
    }
</style>

<div class="ideas-wrap">
    <div class="ideas-header">
        <h1>Quản lý Hợp đồng Đối tác</h1>
        <p>Liên kết với các đối tác đào tạo bên thứ 3 và tạo mã QR để học viên quét đăng ký cấp chứng chỉ.</p>
    </div>

    <div class="ideas-row">
        <!-- Contracts List Table -->
        <div class="ideas-box">
            <h2><span class="dashicons dashicons-networking" style="margin-top: 4px;"></span> Danh sách hợp đồng liên kết</h2>
            <?php if (!empty($contracts)): ?>
                <table class="ideas-table">
                    <thead>
                        <tr>
                            <th>Mã liên kết</th>
                            <th>Đối tác (Bên thứ ba)</th>
                            <th>Tên khóa học</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contracts as $c): ?>
                            <?php $reg_url = home_url('/verify-request?contract_code=' . urlencode($c->contract_code)); ?>
                            <tr>
                                <td><strong style="color: #0f172a; font-size: 14.5px;"><?php echo esc_html($c->contract_code); ?></strong></td>
                                <td><strong><?php echo esc_html($c->partner_name); ?></strong></td>
                                <td style="color: var(--text-muted); font-size: 13.5px;"><?php echo esc_html($c->course_name); ?></td>
                                <td>
                                    <?php if ($c->status === 'active'): ?>
                                        <span class="badge-active">Hoạt động</span>
                                    <?php else: ?>
                                        <span class="badge-expired">Hết hạn</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-action-group">
                                        <button class="btn-act btn-act-qr" onclick="showQrModal('<?php echo esc_js($reg_url); ?>', '<?php echo esc_js($c->partner_name); ?>')">
                                            <span class="dashicons dashicons-qrcode" style="font-size: 16px; width: 16px; height: 16px; margin-top:-1px;"></span> Mã QR
                                        </button>
                                        <a href="?page=ideas-cert-contracts&action_type=toggle_status&id=<?php echo $c->id; ?>" class="btn-act btn-act-toggle">
                                            Đổi trạng thái
                                        </a>
                                        <a href="?page=ideas-cert-contracts&action_type=delete&id=<?php echo $c->id; ?>" class="btn-act btn-act-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa hợp đồng này không?')">
                                            Xóa
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p style="color: #64748b; font-style: italic; padding: 20px 0; text-align: center;">Chưa có hợp đồng đối tác nào được tạo.</p>
            <?php endif; ?>
        </div>

        <!-- Add New Contract Form -->
        <div class="ideas-box" style="height: fit-content;">
            <h2><span class="dashicons dashicons-welcome-add-page" style="margin-top: 4px;"></span> Thêm hợp đồng mới</h2>
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

                <button type="submit" class="btn-ideas" style="width: 100%; border-radius: 8px; margin-top: 10px;">
                    <span class="dashicons dashicons-plus-alt" style="margin-top: 1px;"></span> Tạo hợp đồng
                </button>
            </form>
        </div>
    </div>
</div>

<!-- QR Code Modal -->
<div id="qrModal" style="display: none;">
    <div class="qr-box">
        <h3 id="qrModalTitle">Mã QR đăng ký học viên</h3>
        <p>Học viên quét mã QR này để tự điền hồ sơ đăng ký cấp chứng chỉ và bảng điểm.</p>
        <div class="qr-image-container">
            <div id="qrcode"></div>
        </div>
        <div class="qr-url-text" id="qrModalLink"></div>
        
        <div style="display: flex; gap: 8px;">
            <button class="button button-secondary button-large" onclick="navigator.clipboard.writeText(document.getElementById('qrModalLink').innerText); alert('Đã sao chép liên kết!');" style="flex:1;">Sao chép link</button>
            <button class="button button-primary button-large" onclick="closeQrModal()" style="flex:1; background:#ef4444; border-color:#ef4444;">Đóng</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    function showQrModal(url, partner) {
        document.getElementById('qrModalTitle').innerText = 'QR Đăng ký: ' + partner;
        document.getElementById('qrModalLink').innerText = url;
        
        const qrContainer = document.getElementById('qrcode');
        qrContainer.innerHTML = '';
        
        new QRCode(qrContainer, {
            text: url,
            width: 200,
            height: 200,
            colorDark : "#0f172a",
            colorLight : "#f8fafc"
        });

        document.getElementById('qrModal').style.display = 'flex';
    }

    function closeQrModal() {
        document.getElementById('qrModal').style.display = 'none';
    }
</script>
