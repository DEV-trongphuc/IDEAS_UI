<?php
// admin-dashboard.php - Admin Dashboard Main Overview Screen
if (!defined('ABSPATH')) {
    exit;
}

global $wpdb;

// Fetch stats
$table_certs = $wpdb->prefix . 'ideas_certificates';
$table_requests = $wpdb->prefix . 'ideas_certificate_requests';
$table_contracts = $wpdb->prefix . 'ideas_certificate_contracts';

$total_certs = $wpdb->get_var("SELECT COUNT(*) FROM $table_certs");
$active_certs = $wpdb->get_var("SELECT COUNT(*) FROM $table_certs WHERE status='active'");
$pending_reqs = $wpdb->get_var("SELECT COUNT(*) FROM $table_requests WHERE status='pending'");
$active_contracts = $wpdb->get_var("SELECT COUNT(*) FROM $table_contracts WHERE status='active'");

// Fetch recent certificates
$recent_certs = $wpdb->get_results("SELECT cer_no, name, date, status FROM $table_certs ORDER BY id DESC LIMIT 5");
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
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 28px;
    }
    .ideas-header h1 {
        font-size: 28px;
        font-weight: 800;
        color: #0f172a;
        margin: 0;
        line-height: 1.3;
        padding: 4px 0;
    }
    .ideas-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        margin-bottom: 30px;
    }
    @media screen and (max-width: 992px) {
        .ideas-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media screen and (max-width: 576px) {
        .ideas-grid {
            grid-template-columns: 1fr;
        }
    }
    .ideas-card {
        background: white;
        padding: 24px;
        border-radius: 16px;
        border: 1px solid var(--border-slate);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.02), 0 4px 6px -4px rgba(0, 0, 0, 0.02);
        display: flex;
        align-items: center;
        gap: 20px;
        position: relative;
        overflow: hidden;
        transition: all 0.25s ease;
    }
    .ideas-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
    }
    .ideas-card-icon {
        width: 54px;
        height: 54px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        flex-shrink: 0;
        transition: all 0.25s ease;
    }
    .ideas-card:hover .ideas-card-icon {
        transform: scale(1.05);
    }
    .ideas-card-info h3 {
        margin: 0 0 6px 0;
        font-size: 12px;
        color: var(--text-muted);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }
    .ideas-card-info p {
        margin: 0;
        font-size: 28px;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.1;
    }
    .ideas-section {
        background: white;
        border-radius: 16px;
        border: 1px solid var(--border-slate);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.02), 0 4px 6px -4px rgba(0, 0, 0, 0.02);
        padding: 28px;
        margin-bottom: 30px;
    }
    .ideas-section h2 {
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
</style>

<div class="ideas-wrap">
    <div class="ideas-header">
        <div>
            <h1>Chứng chỉ & Bảng điểm IDEAS</h1>
            <p style="color: var(--text-muted); margin: 6px 0 0 0; font-size: 14px;">Trang tổng quan thống kê số liệu và hồ sơ cấp chứng chỉ số học viện.</p>
        </div>
        <a href="?page=ideas-cert-requests" class="btn-ideas">
            <span class="dashicons dashicons-welcome-write-blog" style="margin-top: 1px;"></span> Xem Yêu cầu Chờ duyệt (<?php echo esc_html($pending_reqs); ?>)
        </a>
    </div>

    <!-- Stats Grid -->
    <div class="ideas-grid">
        <div class="ideas-card">
            <div class="ideas-card-icon" style="background: #f0f9ff; color: #0369a1;">
                <i class="ph ph-graduation-cap" style="font-size: 28px;"></i>
            </div>
            <div class="ideas-card-info">
                <h3>Đã cấp</h3>
                <p><?php echo esc_html($total_certs); ?></p>
            </div>
        </div>
        <div class="ideas-card">
            <div class="ideas-card-icon" style="background: #ecfdf5; color: #047857;">
                <i class="ph ph-check-circle" style="font-size: 28px;"></i>
            </div>
            <div class="ideas-card-info">
                <h3>Hoạt động</h3>
                <p><?php echo esc_html($active_certs); ?></p>
            </div>
        </div>
        <div class="ideas-card">
            <div class="ideas-card-icon" style="background: #fffbeb; color: #b45309;">
                <i class="ph ph-hourglass" style="font-size: 28px;"></i>
            </div>
            <div class="ideas-card-info">
                <h3>Yêu cầu chờ</h3>
                <p><?php echo esc_html($pending_reqs); ?></p>
            </div>
        </div>
        <div class="ideas-card">
            <div class="ideas-card-icon" style="background: #f5f3ff; color: #6d28d9;">
                <i class="ph ph-buildings" style="font-size: 28px;"></i>
            </div>
            <div class="ideas-card-info">
                <h3>Hợp đồng đối tác</h3>
                <p><?php echo esc_html($active_contracts); ?></p>
            </div>
        </div>
    </div>

    <!-- Recent Certs Table -->
    <div class="ideas-section">
        <h2><span class="dashicons dashicons-id-alt" style="margin-top: 4px;"></span> Chứng chỉ vừa cấp gần đây</h2>
        <?php if (!empty($recent_certs)): ?>
            <table class="ideas-table">
                <thead>
                    <tr>
                        <th>Mã số chứng chỉ</th>
                        <th>Họ và tên học viên</th>
                        <th>Ngày cấp</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recent_certs as $c): ?>
                        <tr>
                            <td><strong style="color: #ab0e00; font-size: 15px;"><?php echo esc_html($c->cer_no); ?></strong></td>
                            <td><strong style="text-transform: uppercase; color: #0f172a;"><?php echo esc_html($c->name); ?></strong></td>
                            <td style="color: var(--text-muted);"><?php echo esc_html(date('d/m/Y', strtotime($c->date))); ?></td>
                            <td>
                                <?php if ($c->status === 'active'): ?>
                                    <span class="badge-active">Hoạt động</span>
                                <?php elseif ($c->status === 'paused'): ?>
                                    <span class="badge-paused">Tạm dừng</span>
                                <?php else: ?>
                                    <span class="badge-locked">Đã khóa</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="/verify/?cer_id=<?php echo urlencode($c->cer_no); ?>" target="_blank" class="button button-secondary" style="font-weight: 700; border-radius: 6px;">Tra cứu trực tuyến &rarr;</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="color: #64748b; font-style: italic; padding: 10px 0;">Chưa có chứng chỉ nào được cấp gần đây.</p>
        <?php endif; ?>
    </div>
</div>
