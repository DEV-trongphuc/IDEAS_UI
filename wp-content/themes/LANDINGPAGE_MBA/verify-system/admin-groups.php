<?php
// admin-groups.php - Certificate Groups & Dynamic Layout Studio Editor
if (!defined('ABSPATH')) {
    exit;
}

global $wpdb;
$table_groups = $wpdb->prefix . 'ideas_cert_groups';

// Handle Add/Edit Group POST Submit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ideas_save_group'])) {
    check_admin_referer('ideas_save_group_nonce');

    $id = intval($_POST['group_id'] ?? 0);
    $name = sanitize_text_field($_POST['group_name'] ?? '');
    $bg_cert = sanitize_text_field($_POST['bg_cert_url'] ?? '');
    $bg_transcript = sanitize_text_field($_POST['bg_transcript_url'] ?? '');
    $bg_card = sanitize_text_field($_POST['bg_card_url'] ?? '');

    if (!empty($name)) {
        if ($id > 0) {
            $wpdb->update($table_groups, array(
                'name' => $name,
                'bg_cert' => $bg_cert,
                'bg_transcript' => $bg_transcript,
                'bg_card' => $bg_card
            ), array('id' => $id));
            echo "<div class='notice notice-success is-dismissible'><p>🎉 Đã cập nhật nhóm thiết kế thành công!</p></div>";
        } else {
            $wpdb->insert($table_groups, array(
                'name' => $name,
                'bg_cert' => $bg_cert,
                'bg_transcript' => $bg_transcript,
                'bg_card' => $bg_card
            ));
            echo "<div class='notice notice-success is-dismissible'><p>🎉 Đã tạo nhóm thiết kế mới thành công!</p></div>";
        }
    }
}

// Handle Delete Group Action
if (isset($_GET['action_type']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $action_type = sanitize_text_field($_GET['action_type']);

    if ($action_type === 'delete') {
        $wpdb->delete($table_groups, array('id' => $id));
        echo "<div class='notice notice-success is-dismissible'><p>🗑️ Đã xóa nhóm thiết kế thành công.</p></div>";
    }
}

// Fetch all groups
$groups = $wpdb->get_results("SELECT * FROM $table_groups ORDER BY id ASC", ARRAY_A);
?>

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #ab0e00 0%, #e11d48 100%);
        --primary-hover: linear-gradient(135deg, #991b1b 0%, #be123c 100%);
        --bg-slate: #f8fafc;
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
        grid-template-columns: 1.8fr 1.2fr;
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
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.02), 0 4px 6px -4px rgba(0, 0, 0, 0.02), inset 0 1px 0 0 rgba(255, 255, 255, 0.6);
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
    .image-preview-btn-wrap {
        display: flex;
        gap: 10px;
        margin-top: 8px;
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
    .thumbnail-container {
        position: relative;
        display: inline-block;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 4px;
        background: white;
        transition: all 0.2s ease;
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    }
    .thumbnail-container:hover {
        border-color: #cbd5e1;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }
    .thumbnail-img {
        max-width: 64px;
        max-height: 48px;
        object-fit: contain;
        display: block;
        border-radius: 6px;
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
    .btn-act-studio {
        background: #f0fdf4;
        color: #15803d !important;
        border-color: #bbf7d0;
    }
    .btn-act-studio:hover {
        background: #15803d;
        color: white !important;
    }
    .btn-act-edit {
        background: #f8fafc;
        color: #475569 !important;
        border-color: #e2e8f0;
    }
    .btn-act-edit:hover {
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

    /* ═══ FULLSCREEN DYNAMIC STUDIO OVERLAY ═══════════════════════════════ */
    #studioOverlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #0f172a;
        z-index: 999999;
        display: flex;
        flex-direction: column;
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: #f8fafc;
    }
    .studio-header {
        background: #1e293b;
        color: white;
        padding: 16px 28px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        border-bottom: 1px solid #334155;
    }
    .studio-header h2 {
        margin: 0;
        font-size: 19px;
        font-weight: 800;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .studio-body {
        display: grid;
        grid-template-columns: 300px 1fr 340px;
        flex: 1;
        overflow: hidden;
        background: #0f172a;
    }
    .studio-sidebar {
        background: #1e293b;
        border-right: 1px solid #334155;
        padding: 24px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    .studio-properties {
        background: #1e293b;
        border-left: 1px solid #334155;
        padding: 24px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    .studio-canvas-area {
        background: #0f172a;
        padding: 40px;
        overflow: auto;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        position: relative;
    }
    .studio-a4-sheet {
        width: 794px;
        height: 1122px;
        background: #1e293b;
        position: relative;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    .studio-box {
        position: absolute;
        border: 2px dashed #f43f5e;
        background: rgba(244, 63, 94, 0.08);
        cursor: move;
        display: flex;
        align-items: center;
        box-sizing: border-box;
        user-select: none;
        border-radius: 4px;
        padding: 0 4px;
    }
    .studio-box.active {
        border: 2px solid #ef4444;
        background: rgba(239, 68, 68, 0.15);
        box-shadow: 0 0 15px rgba(239, 68, 68, 0.4);
    }
    .studio-tab-btn {
        padding: 10px 18px;
        background: #334155;
        color: #94a3b8;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        font-size: 13.5px;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .studio-tab-btn:hover {
        background: #475569;
        color: #cbd5e1;
    }
    .studio-tab-btn.active {
        background: #ef4444;
        color: white;
    }
    .btn-toolbox {
        width: 100%;
        padding: 12px 16px;
        background: #334155;
        border: 1px solid #475569;
        border-radius: 8px;
        text-align: left;
        font-family: inherit;
        font-size: 13.5px;
        font-weight: 700;
        color: #e2e8f0;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.2s ease;
    }
    .btn-toolbox:hover {
        background: #475569;
        border-color: #64748b;
        transform: translateX(2px);
    }
    .studio-group-input {
        margin-bottom: 16px;
    }
    .studio-group-input label {
        display: block;
        margin-bottom: 6px;
        font-weight: 700;
        color: #94a3b8;
        font-size: 12.5px;
    }
    .studio-group-input input, .studio-group-input select {
        width: 100%;
        padding: 9px 12px;
        background: #0f172a;
        border: 1px solid #334155;
        border-radius: 6px;
        color: white;
        font-family: inherit;
        font-size: 13.5px;
        outline: none;
        transition: all 0.2s ease;
    }
    .studio-group-input input:focus, .studio-group-input select:focus {
        border-color: #f43f5e;
        box-shadow: 0 0 0 3px rgba(244, 63, 94, 0.2);
    }
    .studio-group-input input[type="color"] {
        padding: 3px;
        height: 38px;
        cursor: pointer;
    }
</style>

<div class="ideas-wrap">
    <div class="ideas-header">
        <h1>Nhóm thiết kế & Layout Studio</h1>
        <p>Tạo các nhóm thiết kế chứng chỉ riêng biệt và tùy chỉnh vị trí thông tin kéo thả bằng Canvas Studio.</p>
    </div>

    <div class="ideas-row">
        <!-- Groups List Table -->
        <div class="ideas-box">
            <h2><span class="dashicons dashicons-layout" style="margin-top: 4px;"></span> Nhóm thiết kế hiện có</h2>
            <?php if (!empty($groups)): ?>
                <table class="ideas-table">
                    <thead>
                        <tr>
                            <th>Tên nhóm</th>
                            <th>Mẫu chứng chỉ</th>
                            <th>Mẫu bảng điểm</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($groups as $g): ?>
                            <tr>
                                <td><strong style="font-size: 15px; color: #0f172a;"><?php echo esc_html($g['name']); ?></strong></td>
                                <td>
                                    <?php if ($g['bg_cert']): ?>
                                        <div class="thumbnail-container">
                                            <img src="<?php echo esc_url($g['bg_cert']); ?>" class="thumbnail-img" />
                                        </div>
                                    <?php else: ?>
                                        <span style="color: #94a3b8; font-style: italic; font-size: 13px;">Chưa cài đặt</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($g['bg_transcript']): ?>
                                        <div class="thumbnail-container">
                                            <img src="<?php echo esc_url($g['bg_transcript']); ?>" class="thumbnail-img" />
                                        </div>
                                    <?php else: ?>
                                        <span style="color: #94a3b8; font-style: italic; font-size: 13px;">Chưa cài đặt</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-action-group">
                                        <button class="btn-act btn-act-studio" onclick='startStudio(<?php echo json_encode($g); ?>)'>
                                            <span class="dashicons dashicons-art"></span> Thiết kế
                                        </button>
                                        <button class="btn-act" style="background:#f5f3ff; color:#6d28d9 !important; border-color:#ddd6fe;" onclick="downloadCSVTemplate(<?php echo $g['id']; ?>, '<?php echo esc_js($g['name']); ?>')">
                                            Tải mẫu CSV
                                        </button>
                                        <button class="btn-act" style="background:#fff7ed; color:#c2410c !important; border-color:#ffedd5;" onclick="triggerCSVUpload(<?php echo $g['id']; ?>)">
                                            Nhập CSV
                                        </button>
                                        <button class="btn-act btn-act-edit" onclick='editGroup(<?php echo json_encode($g); ?>)'>
                                            Sửa
                                        </button>
                                        <a href="?page=ideas-cert-groups&action_type=delete&id=<?php echo $g['id']; ?>" class="btn-act btn-act-delete" onclick="return confirm('Bạn có chắc muốn xóa nhóm này không?')">
                                            Xóa
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p style="color: #64748b; font-style: italic; padding: 20px 0; text-align: center;">Chưa có nhóm thiết kế chứng chỉ nào được tạo.</p>
            <?php endif; ?>
        </div>

        <!-- Add/Edit Group Form -->
        <div class="ideas-box" style="height: fit-content;">
            <h2 id="formTitle"><span class="dashicons dashicons-welcome-add-page" style="margin-top: 4px;"></span> Tạo nhóm chứng chỉ mới</h2>
            <form method="POST">
                <?php wp_nonce_field('ideas_save_group_nonce'); ?>
                <input type="hidden" id="group_id" name="group_id" value="0" />
                <input type="hidden" name="ideas_save_group" value="1" />

                <div class="form-group">
                    <label for="group_name">Tên nhóm thiết kế</label>
                    <input type="text" id="group_name" name="group_name" required placeholder="Ví dụ: Pre-Top up MBA" />
                </div>

                <div class="form-group">
                    <label for="bg_cert">Ảnh nền chứng chỉ (Khổ A4)</label>
                    <input type="text" id="bg_cert" name="bg_cert_url" placeholder="https://..." />
                    <div class="image-preview-btn-wrap">
                        <button type="button" class="button button-secondary" style="width: 100%; border-radius: 6px;" onclick="openMediaUploader('bg_cert')">
                            <span class="dashicons dashicons-admin-media" style="margin-top: 3px; font-size: 18px;"></span> Chọn ảnh từ Media
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="bg_transcript">Ảnh nền bảng điểm (Khổ A4)</label>
                    <input type="text" id="bg_transcript" name="bg_transcript_url" placeholder="https://..." />
                    <div class="image-preview-btn-wrap">
                        <button type="button" class="button button-secondary" style="width: 100%; border-radius: 6px;" onclick="openMediaUploader('bg_transcript')">
                            <span class="dashicons dashicons-admin-media" style="margin-top: 3px; font-size: 18px;"></span> Chọn ảnh từ Media
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="bg_card">Ảnh nền thẻ học viên (Card)</label>
                    <input type="text" id="bg_card" name="bg_card_url" placeholder="https://..." />
                    <div class="image-preview-btn-wrap">
                        <button type="button" class="button button-secondary" style="width: 100%; border-radius: 6px;" onclick="openMediaUploader('bg_card')">
                            <span class="dashicons dashicons-admin-media" style="margin-top: 3px; font-size: 18px;"></span> Chọn ảnh từ Media
                        </button>
                    </div>
                </div>

                <div style="display: flex; gap: 10px; margin-top: 24px;">
                    <button type="submit" class="btn-ideas" style="flex: 1; border-radius: 8px;">Lưu nhóm thiết kế</button>
                    <button type="button" class="button button-large" onclick="resetForm()" style="display: none; border-radius: 8px;" id="btnCancelEdit">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ═══ FULLSCREEN DYNAMIC STUDIO OVERLAY ═══════════════════════════════ -->
<div id="studioOverlay" style="display: none;">
    <div class="studio-header">
        <div>
            <h2><span class="dashicons dashicons-welcome-learn-more" style="font-size: 24px; width: 24px; height: 24px; color: #f43f5e; margin-top: 4px;"></span> Studio Thiết kế Layout: <span id="studioGroupName" style="color: #f43f5e; margin-left: 5px;">Group Name</span></h2>
        </div>
        <div style="display: flex; gap: 8px;">
            <button class="studio-tab-btn active" id="tabCert" onclick="switchStudioTab('cert')">Chứng chỉ (Certificate)</button>
            <button class="studio-tab-btn" id="tabTranscript" onclick="switchStudioTab('transcript')">Bảng điểm (Transcript)</button>
            <button class="studio-tab-btn" id="tabCard" onclick="switchStudioTab('card')">Thẻ học viên (Card)</button>
        </div>
        <div style="display: flex; gap: 10px;">
            <button class="button button-primary button-large" onclick="saveStudioConfig()" style="font-weight: 700; background:#f43f5e; border-color:#f43f5e;">Lưu cấu hình</button>
            <button class="button button-secondary button-large" onclick="closeStudio()">Thoát Studio</button>
        </div>
    </div>
    
    <div class="studio-body">
        <!-- Sidebar - Toolbox fields -->
        <div class="studio-sidebar">
            <h3 style="font-size: 14px; font-weight: 800; color: #cbd5e1; margin: 0 0 10px 0; border-bottom: 1px solid #334155; padding-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px;">Các trường hiển thị</h3>
            <div id="studioToolbox" style="display: flex; flex-direction: column; gap: 10px;">
                <!-- Buttons dynamically loaded here -->
            </div>
        </div>
        
        <!-- Canvas area -->
        <div class="studio-canvas-area">
            <div class="studio-a4-sheet" id="studioCanvas">
                <div id="studioLayer" style="position: absolute; top:0; left:0; width:100%; height:100%; z-index: 5;"></div>
                
                <!-- Alignment Guides -->
                <div id="hGuideWrap" style="position: absolute; left: 0; width: 100%; height: 1px; border-top: 1px dashed #ef4444; z-index: 999; top: 50%; cursor: row-resize; pointer-events: none;">
                    <div id="hGuideHitbox" style="position: absolute; top: -8px; height: 16px; width: 100%; pointer-events: auto;"></div>
                </div>
                
                <div id="vGuideWrap" style="position: absolute; top: 0; height: 100%; width: 1px; border-left: 1px dashed #ef4444; z-index: 999; left: 50%; cursor: col-resize; pointer-events: none;">
                    <div id="vGuideHitbox" style="position: absolute; left: -8px; width: 16px; height: 100%; pointer-events: auto;"></div>
                </div>
            </div>
        </div>
        
        <!-- Sidebar - Box Properties -->
        <div class="studio-properties" id="studioPropertiesPanel">
            <h3 style="font-size: 14px; font-weight: 800; color: #cbd5e1; margin: 0 0 10px 0; border-bottom: 1px solid #334155; padding-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px;">Thuộc tính phần tử</h3>
            <div id="propertiesForm" style="display: none;">
                <input type="hidden" id="prop_box_id" />
                
                <div class="studio-group-input">
                    <label>Nhãn (Hiển thị mẫu)</label>
                    <input type="text" id="prop_label" oninput="updateActiveBox()" />
                </div>
                
                <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 14px;">
                    <div class="studio-group-input" style="margin:0;">
                        <label>Chiều rộng (%)</label>
                        <input type="number" id="prop_width" min="1" max="100" step="0.1" oninput="updateActiveBox()" />
                    </div>
                    <div class="studio-group-input" style="margin:0;">
                        <label>Chiều cao (%)</label>
                        <input type="number" id="prop_height" min="1" max="100" step="0.1" oninput="updateActiveBox()" />
                    </div>
                </div>

                <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 14px;">
                    <div class="studio-group-input" style="margin:0;">
                        <label>Cỡ chữ (px)</label>
                        <input type="number" id="prop_font_size" oninput="updateActiveBox()" />
                    </div>
                    <div class="studio-group-input" style="margin:0;">
                        <label>Màu sắc</label>
                        <input type="color" id="prop_color" onchange="updateActiveBox()" />
                    </div>
                </div>
                
                <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 14px;">
                    <div class="studio-group-input" style="margin:0;">
                        <label>Độ dày chữ</label>
                        <select id="prop_weight" onchange="updateActiveBox()">
                            <option value="400">Regular (400)</option>
                            <option value="500">Medium (500)</option>
                            <option value="600">Semi Bold (600)</option>
                            <option value="700">Bold (700)</option>
                            <option value="800">Extra Bold (800)</option>
                        </select>
                    </div>
                    <div class="studio-group-input" style="margin:0;">
                        <label>Căn lề</label>
                        <select id="prop_align" onchange="updateActiveBox()">
                            <option value="left">Trái</option>
                            <option value="center">Giữa</option>
                            <option value="right">Phải</option>
                        </select>
                    </div>
                </div>

                <div class="studio-group-input" id="prop_border_group" style="display:none;">
                    <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 14px;">
                        <div class="studio-group-input" style="margin:0;">
                            <label>Bo góc (%)</label>
                            <input type="number" id="prop_border_radius" min="0" max="50" oninput="updateActiveBox()" />
                        </div>
                        <div class="studio-group-input" style="margin:0;">
                            <label>Độ dày viền (px)</label>
                            <input type="number" id="prop_border_width" min="0" oninput="updateActiveBox()" />
                        </div>
                    </div>
                    <div class="studio-group-input">
                        <label>Màu viền</label>
                        <input type="color" id="prop_border_color" onchange="updateActiveBox()" />
                    </div>
                </div>
                
                <div class="studio-group-input">
                    <label>Kiểu Font chữ (Font Family)</label>
                    <select id="prop_font_family" onchange="updateActiveBox()">
                        <option value="Plus Jakarta Sans, sans-serif">Plus Jakarta Sans</option>
                        <option value="Montserrat, sans-serif">Montserrat</option>
                        <option value="Playfair Display, serif">Playfair Display</option>
                        <option value="Great Vibes, cursive">Great Vibes (Chữ nghệ thuật)</option>
                        <option value="Pinyon Script, cursive">Pinyon Script (Chữ ký tay)</option>
                        <option value="Roboto, sans-serif">Roboto</option>
                    </select>
                </div>

                <div style="margin-top: 14px; display:flex; gap: 8px;">
                    <button type="button" class="button" style="flex:1; border-radius:6px; font-weight:700;" onclick="alignGroup('left')">Căn trái</button>
                    <button type="button" class="button" style="flex:1; border-radius:6px; font-weight:700;" onclick="alignGroup('center')">Căn giữa</button>
                    <button type="button" class="button" style="flex:1; border-radius:6px; font-weight:700;" onclick="alignGroup('right')">Căn phải</button>
                </div>

                <div style="margin-top: 24px;">
                    <button type="button" class="button" style="width: 100%; color: #ef4444; border-color: #ef4444; background: rgba(239, 68, 68, 0.05); font-weight: 700; padding: 6px 0;" onclick="removeActiveBox()">Xóa phần tử</button>
                </div>
            </div>
            <div id="propertiesPlaceholder" style="color: #64748b; font-style: italic; text-align: center; margin-top: 40px; font-size: 13.5px;">
                Chọn một phần tử trên canvas để chỉnh sửa thuộc tính.
            </div>
        </div>
    </div>
</div>

<input type="file" id="csv_file_input" style="display:none;" accept=".csv" onchange="handleCSVUpload(event)" />

<script type="text/javascript">
    // --- WordPress Media Uploader integration ---
    function openMediaUploader(fieldId) {
        var frame = wp.media({
            title: 'Chọn ảnh làm ảnh nền mẫu',
            button: { text: 'Sử dụng ảnh này' },
            multiple: false
        });
        frame.on('select', function() {
            var attachment = frame.state().get('selection').first().toJSON();
            document.getElementById(fieldId).value = attachment.url;
        });
        frame.open();
    }

    function editGroup(g) {
        document.getElementById('group_id').value = g.id;
        document.getElementById('group_name').value = g.name;
        document.getElementById('bg_cert').value = g.bg_cert || '';
        document.getElementById('bg_transcript').value = g.bg_transcript || '';
        document.getElementById('bg_card').value = g.bg_card || '';
        
        document.getElementById('formTitle').innerHTML = '<span class="dashicons dashicons-edit" style="margin-top: 4px;"></span> Chỉnh sửa nhóm thiết kế';
        document.getElementById('btnCancelEdit').style.display = 'inline-block';
    }

    function resetForm() {
        document.getElementById('group_id').value = '0';
        document.getElementById('group_name').value = '';
        document.getElementById('bg_cert').value = '';
        document.getElementById('bg_transcript').value = '';
        document.getElementById('bg_card').value = '';
        
        document.getElementById('formTitle').innerHTML = '<span class="dashicons dashicons-welcome-add-page" style="margin-top: 4px;"></span> Tạo nhóm chứng chỉ mới';
        document.getElementById('btnCancelEdit').style.display = 'none';
    }

    // ═══ STUDIO DESIGNER JS ════════════════════════════════════════════════
    let activeGroup = null;
    let currentStudioTab = 'cert'; // cert, transcript, card
    let studioConfig = { cert: {}, transcript: {}, card: {} };
    let activeBoxId = null;
    let isDragging = false;
    let dragOffset = { x: 0, y: 0 };
    let canvasRect = null;

    const defaultFields = {
        cert: {
            name: 'Họ và tên học viên',
            student_id: 'ID Student / CCCD',
            cer_no: 'Mã số chứng chỉ',
            date: 'Ngày cấp chứng chỉ',
            qr_code: 'Mã QR Code'
        },
        transcript: {
            name: 'Họ và tên học viên',
            student_id: 'ID Student / CCCD',
            dob: 'Ngày sinh',
            sex: 'Giới tính',
            nationality: 'Quốc tịch',
            registration_date: 'Khóa học / Niên khóa',
            course_grid: 'Bảng điểm môn học (Grid)'
        },
        card: {
            avatar: 'Ảnh chân dung 3x4',
            name: 'Họ và tên học viên',
            student_id: 'Mã ID học viên',
            qr_code: 'Mã QR Code'
        }
    };

    function startStudio(g) {
        activeGroup = g;
        document.getElementById('studioGroupName').innerText = g.name;

        // Parse configurations
        try {
            studioConfig.cert = g.config_cert ? (typeof g.config_cert === 'string' ? JSON.parse(g.config_cert) : g.config_cert) : {};
            studioConfig.transcript = g.config_transcript ? (typeof g.config_transcript === 'string' ? JSON.parse(g.config_transcript) : g.config_transcript) : {};
            studioConfig.card = g.config_card ? (typeof g.config_card === 'string' ? JSON.parse(g.config_card) : g.config_card) : {};
        } catch(e) {
            studioConfig = { cert: {}, transcript: {}, card: {} };
        }

        switchStudioTab('cert');
        document.getElementById('studioOverlay').style.display = 'flex';
        document.documentElement.style.overflow = 'hidden';
    }

    function closeStudio() {
        document.getElementById('studioOverlay').style.display = 'none';
        document.documentElement.style.overflow = '';
    }

    function switchStudioTab(tab) {
        currentStudioTab = tab;
        document.querySelectorAll('.studio-tab-btn').forEach(btn => btn.classList.remove('active'));
        
        if (tab === 'cert') document.getElementById('tabCert').classList.add('active');
        else if (tab === 'transcript') document.getElementById('tabTranscript').classList.add('active');
        else if (tab === 'card') document.getElementById('tabCard').classList.add('active');

        // Set background image on canvas
        const canvas = document.getElementById('studioCanvas');
        if (tab === 'cert') {
            canvas.style.backgroundImage = activeGroup.bg_cert ? `url('${activeGroup.bg_cert}')` : '';
        } else if (tab === 'transcript') {
            canvas.style.backgroundImage = activeGroup.bg_transcript ? `url('${activeGroup.bg_transcript}')` : '';
        } else {
            canvas.style.backgroundImage = activeGroup.bg_card ? `url('${activeGroup.bg_card}')` : '';
        }

        activeBoxId = null;
        guideHPos = 50;
        guideVPos = 50;
        const hG = document.getElementById('hGuideWrap');
        const vG = document.getElementById('vGuideWrap');
        if (hG) hG.style.top = '50%';
        if (vG) vG.style.left = '50%';
        
        hidePropertiesPanel();
        renderToolbox();
        renderCanvas();
    }

    function renderToolbox() {
        const toolbox = document.getElementById('studioToolbox');
        toolbox.innerHTML = '';

        const fields = defaultFields[currentStudioTab];
        Object.keys(fields).forEach(key => {
            const added = !!(studioConfig[currentStudioTab] && studioConfig[currentStudioTab][key]);
            
            const btn = document.createElement('button');
            btn.className = 'btn-toolbox';
            btn.innerHTML = `
                <span>${fields[key]}</span>
                <span>${added ? '✅' : '➕'}</span>
            `;
            if (!added) {
                btn.onclick = () => addBoxToCanvas(key, fields[key]);
            } else {
                btn.style.opacity = '0.7';
                btn.onclick = () => selectBox(key);
            }
            toolbox.appendChild(btn);
        });
    }

    function addBoxToCanvas(id, label) {
        if (!studioConfig[currentStudioTab]) {
            studioConfig[currentStudioTab] = {};
        }

        studioConfig[currentStudioTab][id] = {
            id: id,
            label: label,
            top: 40,
            left: 20,
            width: 60,
            height: 6,
            fontSize: id === 'name' ? 32 : 16,
            color: '#ab0e00',
            align: 'center',
            weight: '700',
            fontFamily: id === 'name' ? "'Great Vibes', cursive" : "'Plus Jakarta Sans', sans-serif"
        };

        if (id === 'qr_code') {
            studioConfig[currentStudioTab][id].width = 12;
            studioConfig[currentStudioTab][id].height = 12;
        } else if (id === 'avatar') {
            studioConfig[currentStudioTab][id].width = 15;
            studioConfig[currentStudioTab][id].height = 20;
        } else if (id === 'course_grid') {
            studioConfig[currentStudioTab][id].width = 70;
            studioConfig[currentStudioTab][id].height = 35;
        }

        renderToolbox();
        renderCanvas();
        selectBox(id);
    }

    function renderCanvas() {
        const canvas = document.getElementById('studioCanvas');
        const bg = canvas.style.backgroundImage;
        canvas.innerHTML = '';
        canvas.style.backgroundImage = bg;

        const config = studioConfig[currentStudioTab] || {};
        Object.keys(config).forEach(key => {
            const box = config[key];
            const div = document.createElement('div');
            div.className = 'studio-box' + (activeBoxId === key ? ' active' : '');
            div.id = 'studio_box_' + key;
            
            div.style.left = box.left + '%';
            div.style.top = box.top + '%';
            div.style.width = box.width + '%';
            div.style.height = box.height + '%';
            
            let alignMap = { left: 'flex-start', center: 'center', right: 'flex-end'};
            div.style.justifyContent = alignMap[box.align || 'left'];

            if (key === 'qr_code') {
                div.innerHTML = `<div style="width:100%; height:100%; border:1px solid #ef4444; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:10px; background:white; color:#ef4444;">[Mã QR Code]</div>`;
            } else if (key === 'avatar') {
                div.innerHTML = `<div style="width:100%; height:100%; border:1px solid #ef4444; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:10px; background:#f8fafc; color:#ef4444;">[Ảnh thẻ 3x4]</div>`;
            } else if (key === 'course_grid') {
                div.innerHTML = `<div style="width:100%; height:100%; border:1px solid #ef4444; font-weight:700; font-size:10px; background:white; padding:8px; color:#ef4444;">[Bảng điểm môn học (Grid)]</div>`;
            } else {
                div.innerHTML = `<span style="font-family:${box.fontFamily || 'inherit'}; font-size:${box.fontSize}px; color:${box.color || '#000000'}; font-weight:${box.weight || '600'}; white-space:nowrap;">${box.label}</span>`;
            }

            // Apply custom styles if border properties exist
            if (key === 'avatar' || key === 'qr_code' || key === 'course_grid') {
                div.style.borderRadius = (box.borderRadius || 0) + '%';
                if (box.borderWidth > 0) {
                    div.style.border = `${box.borderWidth}px solid ${box.borderColor || '#000000'}`;
                }
            }

            div.addEventListener('mousedown', (e) => startDrag(e, key));

            if (activeBoxId === key) {
                // Create Resize handle dot at bottom-right corner of selected element
                const resizer = document.createElement('div');
                resizer.className = 'studio-resizer';
                resizer.style.cssText = "position:absolute; bottom:-4px; right:-4px; width:8px; height:8px; background:#ef4444; border-radius:50%; cursor:se-resize; z-index:100;";
                resizer.addEventListener('mousedown', (e) => {
                    e.stopPropagation();
                    const canvas = document.getElementById('studioCanvas');
                    canvasRect = canvas.getBoundingClientRect();
                    dragState = {
                        type: 'resize',
                        id: key,
                        startX: e.clientX,
                        startY: e.clientY,
                        origWidth: box.width,
                        origHeight: box.height
                    };
                });
                div.appendChild(resizer);
            }

            canvas.appendChild(div);
        });
    }

    function startDrag(e, id) {
        e.stopPropagation();
        selectBox(id);
        const box = studioConfig[currentStudioTab][id];
        const canvas = document.getElementById('studioCanvas');
        canvasRect = canvas.getBoundingClientRect();
        
        dragState = {
            type: 'move',
            id: id,
            startX: e.clientX,
            startY: e.clientY,
            origLeft: box.left,
            origTop: box.top
        };
    }

    function selectBox(id) {
        activeBoxId = id;
        renderCanvas();
        showPropertiesPanel(id);
    }

    function showPropertiesPanel(id) {
        const box = studioConfig[currentStudioTab][id];
        if (!box) return;

        document.getElementById('propertiesPlaceholder').style.display = 'none';
        document.getElementById('propertiesForm').style.display = 'block';

        document.getElementById('prop_box_id').value = id;
        document.getElementById('prop_label').value = box.label || '';
        document.getElementById('prop_width').value = box.width || '';
        document.getElementById('prop_height').value = box.height || '';
        document.getElementById('prop_font_size').value = box.fontSize || 14;
        document.getElementById('prop_color').value = box.color || '#000000';
        document.getElementById('prop_weight').value = box.weight || '400';
        document.getElementById('prop_align').value = box.align || 'left';
        document.getElementById('prop_font_family').value = box.fontFamily || "Plus Jakarta Sans, sans-serif";

        const borderGroup = document.getElementById('prop_border_group');
        if (id === 'avatar' || id === 'qr_code' || id === 'course_grid') {
            borderGroup.style.display = 'block';
            document.getElementById('prop_border_radius').value = box.borderRadius !== undefined ? box.borderRadius : 0;
            document.getElementById('prop_border_width').value = box.borderWidth !== undefined ? box.borderWidth : 0;
            document.getElementById('prop_border_color').value = box.borderColor || '#000000';
        } else {
            borderGroup.style.display = 'none';
        }
    }

    function hidePropertiesPanel() {
        document.getElementById('propertiesPlaceholder').style.display = 'block';
        document.getElementById('propertiesForm').style.display = 'none';
    }

    function updateActiveBox() {
        if (!activeBoxId) return;
        const box = studioConfig[currentStudioTab][activeBoxId];
        
        box.label = document.getElementById('prop_label').value;
        box.width = parseFloat(document.getElementById('prop_width').value) || box.width;
        box.height = parseFloat(document.getElementById('prop_height').value) || box.height;
        box.fontSize = parseInt(document.getElementById('prop_font_size').value) || 14;
        box.color = document.getElementById('prop_color').value;
        box.weight = document.getElementById('prop_weight').value;
        box.align = document.getElementById('prop_align').value;
        box.fontFamily = document.getElementById('prop_font_family').value;

        if (activeBoxId === 'avatar' || activeBoxId === 'qr_code' || activeBoxId === 'course_grid') {
            box.borderRadius = parseInt(document.getElementById('prop_border_radius').value) || 0;
            box.borderWidth = parseInt(document.getElementById('prop_border_width').value) || 0;
            box.borderColor = document.getElementById('prop_border_color').value;
        }

        renderCanvas();
    }

    function removeActiveBox() {
        if (!activeBoxId) return;
        if (confirm('Bạn có muốn xóa phần tử này khỏi template thiết kế không?')) {
            delete studioConfig[currentStudioTab][activeBoxId];
            activeBoxId = null;
            hidePropertiesPanel();
            renderToolbox();
            renderCanvas();
        }
    }

    function alignGroup(alignType) {
        if (!activeBoxId) return;
        const box = studioConfig[currentStudioTab][activeBoxId];
        if (alignType === 'left') {
            box.left = 5;
        } else if (alignType === 'center') {
            box.left = Math.round(((100 - box.width) / 2) * 10) / 10;
        } else if (alignType === 'right') {
            box.left = Math.round((100 - box.width - 5) * 10) / 10;
        }
        renderCanvas();
        showPropertiesPanel(activeBoxId);
    }

    // --- Guides alignment helpers ---
    let guideHPos = 50;
    let guideVPos = 50;
    let dragState = null;

    document.getElementById('hGuideHitbox').addEventListener('mousedown', (e) => {
        e.stopPropagation();
        const canvas = document.getElementById('studioCanvas');
        canvasRect = canvas.getBoundingClientRect();
        dragState = { type: 'guideH', startY: e.clientY, origPos: guideHPos };
    });

    document.getElementById('vGuideHitbox').addEventListener('mousedown', (e) => {
        e.stopPropagation();
        const canvas = document.getElementById('studioCanvas');
        canvasRect = canvas.getBoundingClientRect();
        dragState = { type: 'guideV', startX: e.clientX, origPos: guideVPos };
    });

    // Custom Drag repisitioning & Resizing Mouse Events on Document
    document.addEventListener('mousemove', (e) => {
        if (!dragState) return;

        const canvas = document.getElementById('studioCanvas');
        const rect = canvas.getBoundingClientRect();
        const dx = ((e.clientX - dragState.startX) / rect.width) * 100;
        const dy = ((e.clientY - dragState.startY) / rect.height) * 100;

        if (dragState.type === 'guideH') {
            guideHPos = Math.max(0, Math.min(100, dragState.origPos + dy));
            document.getElementById('hGuideWrap').style.top = guideHPos + '%';
            return;
        }

        if (dragState.type === 'guideV') {
            guideVPos = Math.max(0, Math.min(100, dragState.origPos + dx));
            document.getElementById('vGuideWrap').style.left = guideVPos + '%';
            return;
        }

        const box = studioConfig[currentStudioTab][dragState.id];

        if (dragState.type === 'move') {
            box.left = Math.round(Math.max(0, Math.min(100 - box.width, dragState.origLeft + dx)) * 10) / 10;
            box.top = Math.round(Math.max(0, Math.min(100 - box.height, dragState.origTop + dy)) * 10) / 10;
            const el = document.getElementById('studio_box_' + dragState.id);
            if (el) {
                el.style.left = box.left + '%';
                el.style.top = box.top + '%';
            }
        } else if (dragState.type === 'resize') {
            box.width = Math.round(Math.max(2, Math.min(100 - box.left, dragState.origWidth + dx)) * 10) / 10;
            box.height = Math.round(Math.max(1, Math.min(100 - box.top, dragState.origHeight + dy)) * 10) / 10;
            const el = document.getElementById('studio_box_' + dragState.id);
            if (el) {
                el.style.width = box.width + '%';
                el.style.height = box.height + '%';
            }
        }
    });

    document.addEventListener('mouseup', () => {
        if (dragState) {
            dragState = null;
            renderCanvas();
            showPropertiesPanel(activeBoxId);
        }
    });

    document.addEventListener('mousedown', (e) => {
        const canvas = document.getElementById('studioCanvas');
        const layer = document.getElementById('studioLayer');
        if (e.target === canvas || e.target === layer) {
            activeBoxId = null;
            hidePropertiesPanel();
            renderCanvas();
        }
    });

    async function saveStudioConfig() {
        if (!activeGroup) return;

        const data = {
            action: 'ideas_verify_save_group_config',
            group_id: activeGroup.id,
            config_cert: JSON.stringify(studioConfig.cert),
            config_transcript: JSON.stringify(studioConfig.transcript),
            config_card: JSON.stringify(studioConfig.card),
            nonce: '<?php echo wp_create_nonce("ideas_save_studio_nonce"); ?>'
        };

        const formData = new FormData();
        Object.keys(data).forEach(k => formData.append(k, data[k]));

        try {
            const res = await fetch(ajaxurl, {
                method: 'POST',
                body: formData
            });
            const result = await res.json();
            if (result.success) {
                alert('🎉 Đã lưu cấu hình kéo thả thành công!');
                location.reload();
            } else {
                alert('❌ Lỗi: ' + (result.data.error || 'Không thể lưu cấu hình.'));
            }
        } catch(e) {
            alert('⚠️ Lỗi kết nối mạng khi lưu.');
        }
    }

    // --- CSV BULK WORKFLOWS ---
    let csvTargetGroupId = null;

    function downloadCSVTemplate(groupId, groupName) {
        const headers = [
            'cer_no', 'name', 'student_id', 'dob', 'sex', 'nationality', 'email',
            'course1_title', 'course1_credits', 'course1_percentage', 'course1_grade',
            'course2_title', 'course2_credits', 'course2_percentage', 'course2_grade',
            'course3_title', 'course3_credits', 'course3_percentage', 'course3_grade'
        ];
        
        const row = [
            'IDEAS-MBA-' + Math.floor(100000 + Math.random()*900000),
            'NGUYỄN VĂN A',
            '079201009999',
            '1995-10-24',
            'Nam',
            'Viet Nam',
            'student@ideas.edu.vn',
            'Pre-Top up MBA Course Module 1', '4.0', '85%', 'A',
            'Pre-Top up MBA Course Module 2', '4.0', '90%', 'A+',
            '', '', '', ''
        ];

        const csvContent = "\ufeff" + [headers.join(','), row.join(',')].join('\n');
        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement("a");
        const url = URL.createObjectURL(blob);
        link.setAttribute("href", url);
        link.setAttribute("download", `Template_Import_ChungChi_${groupName.replace(/\s+/g, '_')}.csv`);
        link.style.visibility = 'hidden';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    function triggerCSVUpload(groupId) {
        csvTargetGroupId = groupId;
        document.getElementById('csv_file_input').click();
    }

    async function handleCSVUpload(event) {
        const file = event.target.files[0];
        if (!file || !csvTargetGroupId) return;

        if (!confirm(`Bạn có chắc chắn muốn nhập dữ liệu chứng chỉ từ file "${file.name}" vào nhóm này? Dữ liệu trùng mã số sẽ bị ghi đè.`)) {
            event.target.value = '';
            return;
        }

        const formData = new FormData();
        formData.append('action', 'ideas_verify_upload_csv');
        formData.append('group_id', csvTargetGroupId);
        formData.append('csv_file', file);

        try {
            const res = await fetch(ajaxurl, {
                method: 'POST',
                body: formData
            });
            const result = await res.json();
            if (result.success) {
                alert(`🎉 Nhập CSV thành công! Đã nhập/cập nhật ${result.data.count} chứng chỉ.`);
                location.reload();
            } else {
                alert('❌ Lỗi: ' + (result.data.error || 'Nhập file CSV không thành công.'));
            }
        } catch(e) {
            alert('⚠️ Lỗi kết nối mạng khi tải lên CSV.');
        } finally {
            event.target.value = '';
            csvTargetGroupId = null;
        }
    }
</script>
