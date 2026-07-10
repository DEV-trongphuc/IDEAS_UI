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
    .ideas-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
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
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .ideas-card-icon {
        width: 48px;
        height: 48px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: bold;
    }
    .ideas-card-info h3 {
        margin: 0 0 4px 0;
        font-size: 13px;
        color: #64748b;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .ideas-card-info p {
        margin: 0;
        font-size: 24px;
        font-weight: 800;
        color: #0f172a;
        line-height: 1;
    }
    .ideas-section {
        background: white;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        padding: 24px;
        margin-bottom: 30px;
    }
    .ideas-section h2 {
        font-size: 18px;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 20px 0;
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 12px;
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
    .badge-paused {
        background: #fef3c7;
        color: #92400e;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 700;
    }
    .badge-locked {
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
</style>

<div class="ideas-wrap">
    <div class="ideas-header">
        <h1>Tổng quan Xác thực Chứng chỉ</h1>
        <a href="?page=ideas-cert-requests" class="btn-ideas">
            <span class="dashicons dashicons-welcome-write-blog" style="margin-top: -2px;"></span> Xem Yêu cầu Chờ duyệt (<?php echo esc_html($pending_reqs); ?>)
        </a>
    </div>

    <!-- Stats Grid -->
    <div class="ideas-grid">
        <div class="ideas-card">
            <div class="ideas-card-icon" style="background: #e0f2fe; color: #0369a1;">🎓</div>
            <div class="ideas-card-info">
                <h3>Đã cấp</h3>
                <p><?php echo esc_html($total_certs); ?></p>
            </div>
        </div>
        <div class="ideas-card">
            <div class="ideas-card-icon" style="background: #d1fae5; color: #047857;">✅</div>
            <div class="ideas-card-info">
                <h3>Hoạt động</h3>
                <p><?php echo esc_html($active_certs); ?></p>
            </div>
        </div>
        <div class="ideas-card">
            <div class="ideas-card-icon" style="background: #fef3c7; color: #b45309;">⏳</div>
            <div class="ideas-card-info">
                <h3>Yêu cầu chờ</h3>
                <p><?php echo esc_html($pending_reqs); ?></p>
            </div>
        </div>
        <div class="ideas-card">
            <div class="ideas-card-icon" style="background: #eff6ff; color: #1d4ed8;">🏢</div>
            <div class="ideas-card-info">
                <h3>Đơn vị liên kết</h3>
                <p><?php echo esc_html($active_contracts); ?></p>
            </div>
        </div>
    </div>

    <!-- Recent Certs Table -->
    <div class="ideas-section">
        <h2>Chứng chỉ vừa cấp gần đây</h2>
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
                            <td><strong><?php echo esc_html($c->cer_no); ?></strong></td>
                            <td><?php echo esc_html($c->name); ?></td>
                            <td><?php echo esc_html(date('d/m/Y', strtotime($c->date))); ?></td>
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
                                <a href="/verify/?cer_id=<?php echo urlencode($c->cer_no); ?>" target="_blank" style="text-decoration: none; color: #2563eb; font-weight: 600;">Xem chi tiết &rarr;</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p style="color: #64748b; font-style: italic;">Chưa có chứng chỉ nào được cấp gần đây.</p>
        <?php endif; ?>
    </div>
</div>
