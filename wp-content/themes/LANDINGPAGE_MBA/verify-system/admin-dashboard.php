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

// Search and Filter for Dashboard
$search = sanitize_text_field($_GET['s'] ?? '');
$status_filter = sanitize_text_field($_GET['status'] ?? '');

$where = " WHERE 1=1";
$params = array();
if (!empty($search)) {
    $where .= " AND (cer_no LIKE %s OR name LIKE %s OR student_id LIKE %s OR email LIKE %s)";
    $params[] = "%$search%";
    $params[] = "%$search%";
    $params[] = "%$search%";
    $params[] = "%$search%";
}
if (!empty($status_filter)) {
    $where .= " AND status = %s";
    $params[] = $status_filter;
}

$count_sql = "SELECT COUNT(*) FROM $table_certs" . $where;
$total_items = !empty($params) ? intval($wpdb->get_var($wpdb->prepare($count_sql, $params))) : intval($wpdb->get_var($count_sql));

// Pagination (20 per page)
$per_page = 20;
$paged = max(1, intval($_GET['paged'] ?? 1));
$offset = ($paged - 1) * $per_page;
$total_pages = max(1, ceil($total_items / $per_page));

// Fetch certificates for current page
$sql = "SELECT cer_no, name, email, date, status FROM $table_certs" . $where . " ORDER BY id DESC LIMIT $per_page OFFSET $offset";
if (!empty($params)) {
    $recent_certs = $wpdb->get_results($wpdb->prepare($sql, $params));
} else {
    $recent_certs = $wpdb->get_results($sql);
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
    .ideas-header p {
        font-size: 14px;
        color: var(--text-muted);
        margin: 0;
    }
    .btn-header {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--primary-gradient);
        color: white !important;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.2s ease;
        box-shadow: 0 4px 12px rgba(171, 14, 0, 0.2);
    }
    .btn-header:hover {
        background: var(--primary-hover);
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(171, 14, 0, 0.3);
    }
    .ideas-stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 28px;
    }
    .ideas-card {
        background: white;
        border-radius: 16px;
        border: 1px solid var(--border-slate);
        padding: 24px;
        display: flex;
        align-items: center;
        gap: 20px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.02), 0 4px 6px -4px rgba(0, 0, 0, 0.02);
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .ideas-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 20px -3px rgba(0, 0, 0, 0.05);
    }
    .ideas-card-icon {
        width: 56px;
        height: 56px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .ideas-card-info h3 {
        margin: 0 0 4px 0;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--text-muted);
        font-weight: 700;
    }
    .ideas-card-info p {
        margin: 0;
        font-size: 28px;
        font-weight: 800;
        color: #0f172a;
        line-height: 1;
    }
    .ideas-section {
        background: white;
        border-radius: 16px;
        border: 1px solid var(--border-slate);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.02), 0 4px 6px -4px rgba(0, 0, 0, 0.02);
        padding: 28px;
        margin-bottom: 28px;
    }
    .ideas-section h2 {
        font-size: 18px;
        font-weight: 700;
        color: #0f172a;
        margin: 0 0 20px 0;
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
    .table-scroll-container {
        width: 100%;
        max-height: 520px;
        overflow: auto;
        -webkit-overflow-scrolling: touch;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        background: #ffffff;
    }
    .table-scroll-container .ideas-table thead th {
        position: sticky;
        top: 0;
        z-index: 10;
        background: #f8fafc;
        box-shadow: 0 1px 2px rgba(0,0,0,0.06);
    }
</style>

<div class="ideas-wrap">
    <div class="ideas-header">
        <div>
            <h1>Chứng chỉ & Bảng điểm IDEAS</h1>
            <p>Trang tổng quan thống kê số liệu và hồ sơ cấp chứng chỉ số học viên.</p>
        </div>
        <div>
            <a href="?page=ideas-cert-requests" class="btn-header">
                <span class="dashicons dashicons-clipboard"></span> Xem Yêu cầu Chờ duyệt (<?php echo esc_html($pending_reqs); ?>)
            </a>
        </div>
    </div>

    <!-- Quick Stats Grid -->
    <div class="ideas-stats-grid">
        <div class="ideas-card">
            <div class="ideas-card-icon" style="background: #eff6ff; color: #2563eb;">
                <i class="ph ph-student" style="font-size: 28px;"></i>
            </div>
            <div class="ideas-card-info">
                <h3>Đã cấp</h3>
                <p><?php echo esc_html($total_certs); ?></p>
            </div>
        </div>
        <div class="ideas-card">
            <div class="ideas-card-icon" style="background: #ecfdf5; color: #059669;">
                <i class="ph ph-check-circle" style="font-size: 28px;"></i>
            </div>
            <div class="ideas-card-info">
                <h3>Hoạt động</h3>
                <p><?php echo esc_html($active_certs); ?></p>
            </div>
        </div>
        <div class="ideas-card">
            <div class="ideas-card-icon" style="background: #fffbeb; color: #d97706;">
                <i class="ph ph-hourglass-high" style="font-size: 28px;"></i>
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

    <!-- Recent Certs Table with 20 items pagination -->
    <div class="ideas-section">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 12px;">
            <h2 style="margin: 0;"><span class="dashicons dashicons-id-alt" style="margin-top: 4px;"></span> Danh sách chứng chỉ đã cấp</h2>
            <?php if ($total_items > 0): ?>
                <div style="font-size: 13.5px; color: var(--text-muted);">
                    Hiển thị <strong><?php echo min($total_items, $offset + 1); ?> - <?php echo min($total_items, $offset + count($recent_certs)); ?></strong> trong tổng số <strong><?php echo esc_html($total_items); ?></strong> chứng chỉ
                </div>
            <?php endif; ?>
        </div>

        <!-- Search and Filter Form -->
        <form method="GET" class="filter-row" style="display: flex; gap: 10px; align-items: center; margin-bottom: 20px; flex-wrap: wrap;">
            <input type="hidden" name="page" value="ideas-verify-hub" />
            <input type="text" name="s" value="<?php echo esc_attr($search); ?>" placeholder="Tìm mã số, tên học viên, email..." style="height: 38px; padding: 0 14px; width: 300px; border-radius: 8px; border: 1.5px solid #cbd5e1; font-family: inherit; font-size: 13.5px; outline: none;" />
            
            <select name="status" style="height: 38px; line-height: 36px; padding: 0 12px; border-radius: 8px; border: 1.5px solid #cbd5e1; font-family: inherit; font-size: 13.5px; background: #ffffff; cursor: pointer; outline: none;">
                <option value="">-- Tất cả trạng thái --</option>
                <option value="active" <?php selected($status_filter, 'active'); ?>>Hoạt động</option>
                <option value="paused" <?php selected($status_filter, 'paused'); ?>>Tạm dừng</option>
                <option value="locked" <?php selected($status_filter, 'locked'); ?>>Khóa</option>
            </select>

            <button type="submit" class="button button-primary" style="height: 38px; line-height: 36px; padding: 0 18px; border-radius: 8px; font-weight: 600; font-size: 13.5px;">Tìm kiếm</button>
            <?php if (!empty($search) || !empty($status_filter)): ?>
                <a href="?page=ideas-verify-hub" class="button button-secondary" style="height: 38px; line-height: 36px; padding: 0 16px; border-radius: 8px; font-weight: 600; font-size: 13.5px;">Đặt lại</a>
            <?php endif; ?>
        </form>

        <?php if (!empty($recent_certs)): ?>
            <div class="table-scroll-container">
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
                                <td>
                                    <strong style="text-transform: uppercase; color: #0f172a; font-size: 14.5px;"><?php echo esc_html($c->name); ?></strong><br>
                                    <span style="font-size: 12.5px; color: var(--text-muted);"><?php echo esc_html($c->email); ?></span>
                                </td>
                                <td style="color: var(--text-muted); font-size: 13.5px;"><?php echo esc_html(date('d/m/Y', strtotime($c->date))); ?></td>
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
                                    <a href="/verify?id=<?php echo urlencode($c->cer_no); ?>" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; padding: 6px 16px; background: #ffffff; color: #ab0e00 !important; border: 1.5px solid #ab0e00; border-radius: 6px; font-weight: 700; font-size: 13px; text-decoration: none !important; transition: all 0.2s ease; box-shadow: 0 1px 2px rgba(0,0,0,0.05);" onmouseover="this.style.background='#ab0e00'; this.style.color='#ffffff';" onmouseout="this.style.background='#ffffff'; this.style.color='#ab0e00';">
                                        Xem &rarr;
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <?php if ($total_pages > 1): ?>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; padding-top: 16px; border-top: 1px solid #f1f5f9; flex-wrap: wrap; gap: 12px;">
                    <div style="font-size: 13.5px; color: var(--text-muted);">
                        Trang <strong><?php echo $paged; ?></strong> / <strong><?php echo $total_pages; ?></strong>
                    </div>
                    <div style="display: flex; gap: 8px; align-items: center;">
                        <?php if ($paged > 1): ?>
                            <a href="?page=ideas-verify-hub&paged=<?php echo ($paged - 1); ?>&s=<?php echo urlencode($search); ?>&status=<?php echo urlencode($status_filter); ?>" class="button button-secondary" style="border-radius: 6px; font-weight: 600;">&laquo; Trang trước</a>
                        <?php endif; ?>
                        
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <a href="?page=ideas-verify-hub&paged=<?php echo $i; ?>&s=<?php echo urlencode($search); ?>&status=<?php echo urlencode($status_filter); ?>" class="button <?php echo ($i === $paged) ? 'button-primary' : 'button-secondary'; ?>" style="border-radius: 6px; min-width: 32px; text-align: center; <?php echo ($i === $paged) ? 'background: #ab0e00; border-color: #ab0e00;' : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>

                        <?php if ($paged < $total_pages): ?>
                            <a href="?page=ideas-verify-hub&paged=<?php echo ($paged + 1); ?>&s=<?php echo urlencode($search); ?>&status=<?php echo urlencode($status_filter); ?>" class="button button-secondary" style="border-radius: 6px; font-weight: 600;">Trang tiếp &raquo;</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <p style="color: #64748b; font-style: italic; padding: 10px 0;">Không tìm thấy chứng chỉ nào phù hợp với tìm kiếm.</p>
        <?php endif; ?>
    </div>
</div>
