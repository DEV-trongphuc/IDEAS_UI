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
            // Update
            $wpdb->update($table_groups, array(
                'name' => $name,
                'bg_cert' => $bg_cert,
                'bg_transcript' => $bg_transcript,
                'bg_card' => $bg_card
            ), array('id' => $id));
            echo "<div class='notice notice-success is-dismissible'><p>Đã cập nhật nhóm chứng chỉ thành công!</p></div>";
        } else {
            // Insert
            $wpdb->insert($table_groups, array(
                'name' => $name,
                'bg_cert' => $bg_cert,
                'bg_transcript' => $bg_transcript,
                'bg_card' => $bg_card
            ));
            echo "<div class='notice notice-success is-dismissible'><p>Đã tạo nhóm chứng chỉ mới thành công!</p></div>";
        }
    }
}

// Handle Delete Group Action
if (isset($_GET['action_type']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $action_type = sanitize_text_field($_GET['action_type']);

    if ($action_type === 'delete') {
        $wpdb->delete($table_groups, array('id' => $id));
        echo "<div class='notice notice-success is-dismissible'><p>Đã xóa nhóm chứng chỉ.</p></div>";
    }
}

// Fetch all groups
$groups = $wpdb->get_results("SELECT * FROM $table_groups ORDER BY id ASC", ARRAY_A);
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
        margin-bottom: 16px;
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
    .image-preview-btn-wrap {
        display: flex;
        gap: 10px;
        margin-top: 6px;
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
    .thumbnail-img {
        max-width: 60px;
        max-height: 40px;
        object-fit: contain;
        border: 1px solid #cbd5e1;
        border-radius: 4px;
    }

    /* ═══ FULLSCREEN DYNAMIC STUDIO OVERLAY ═══════════════════════════════ */
    #studioOverlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #f1f5f9;
        z-index: 999999; /* Make sure it sits above WP admin sidebar */
        display: flex;
        flex-direction: column;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .studio-header {
        background: #0f172a;
        color: white;
        padding: 14px 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    .studio-header h2 {
        margin: 0;
        font-size: 18px;
        font-weight: 800;
    }
    .studio-body {
        display: grid;
        grid-template-columns: 280px 1fr 320px;
        flex: 1;
        overflow: hidden;
    }
    .studio-sidebar {
        background: white;
        border-right: 1px solid #e2e8f0;
        padding: 20px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    .studio-properties {
        background: white;
        border-left: 1px solid #e2e8f0;
        padding: 20px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    .studio-canvas-area {
        background: #e2e8f0;
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
        background: white;
        position: relative;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    .studio-box {
        position: absolute;
        border: 1px dashed #ab0e00;
        background: rgba(171, 14, 0, 0.05);
        cursor: move;
        display: flex;
        align-items: center;
        box-sizing: border-box;
        user-select: none;
    }
    .studio-box.active {
        border: 2px solid #ab0e00;
        background: rgba(171, 14, 0, 0.1);
    }
    .studio-tab-btn {
        padding: 8px 16px;
        background: #1e293b;
        color: #94a3b8;
        border: none;
        border-radius: 6px;
        font-weight: 700;
        font-size: 13px;
        cursor: pointer;
    }
    .studio-tab-btn.active {
        background: var(--red);
        color: white;
    }
    .btn-toolbox {
        width: 100%;
        padding: 10px 14px;
        background: #f1f5f9;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        text-align: left;
        font-family: inherit;
        font-size: 13px;
        font-weight: 700;
        color: #334155;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .btn-toolbox:hover {
        background: #e2e8f0;
    }
</style>

<div class="ideas-wrap">
    <div class="ideas-header">
        <h1>Nhóm chứng chỉ & Studio Thiết kế Layout</h1>
    </div>

    <div class="ideas-row">
        <!-- Groups List Table -->
        <div class="ideas-box">
            <h2>Nhóm chứng chỉ hiện có</h2>
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
                                <td><strong><?php echo esc_html($g['name']); ?></strong></td>
                                <td>
                                    <?php if ($g['bg_cert']): ?>
                                        <img src="<?php echo esc_url($g['bg_cert']); ?>" class="thumbnail-img" />
                                    <?php else: ?>
                                        <span style="color: #94a3b8; font-style: italic;">Chưa thiết lập</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($g['bg_transcript']): ?>
                                        <img src="<?php echo esc_url($g['bg_transcript']); ?>" class="thumbnail-img" />
                                    <?php else: ?>
                                        <span style="color: #94a3b8; font-style: italic;">Chưa thiết lập</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="button button-primary" onclick='startStudio(<?php echo json_encode($g); ?>)'>Thiết kế Layout (Studio)</button>
                                    <button class="button button-secondary" onclick='editGroup(<?php echo json_encode($g); ?>)'>Sửa</button>
                                    <a href="?page=ideas-cert-groups&action_type=delete&id=<?php echo $g['id']; ?>" class="button button-link" style="color: #b91c1c;" onclick="return confirm('Bạn có chắc muốn xóa nhóm này không?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p style="color: #64748b; font-style: italic;">Chưa có nhóm chứng chỉ nào được tạo.</p>
            <?php endif; ?>
        </div>

        <!-- Add/Edit Group Form -->
        <div class="ideas-box" style="height: fit-content;">
            <h2 id="formTitle">Tạo nhóm chứng chỉ mới</h2>
            <form method="POST">
                <?php wp_nonce_field('ideas_save_group_nonce'); ?>
                <input type="hidden" id="group_id" name="group_id" value="0" />
                <input type="hidden" name="ideas_save_group" value="1" />

                <div class="form-group">
                    <label for="group_name">Tên nhóm chứng chỉ</label>
                    <input type="text" id="group_name" name="group_name" required placeholder="Ví dụ: Pre-Top up MBA" />
                </div>

                <div class="form-group">
                    <label for="bg_cert">Ảnh nền chứng chỉ (A4)</label>
                    <input type="text" id="bg_cert" name="bg_cert_url" placeholder="Đường dẫn ảnh nền..." />
                    <div class="image-preview-btn-wrap">
                        <button type="button" class="button" onclick="openMediaUploader('bg_cert')">Chọn ảnh</button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="bg_transcript">Ảnh nền bảng điểm (A4)</label>
                    <input type="text" id="bg_transcript" name="bg_transcript_url" placeholder="Đường dẫn ảnh nền..." />
                    <div class="image-preview-btn-wrap">
                        <button type="button" class="button" onclick="openMediaUploader('bg_transcript')">Chọn ảnh</button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="bg_card">Ảnh nền thẻ học viên (Card)</label>
                    <input type="text" id="bg_card" name="bg_card_url" placeholder="Đường dẫn ảnh nền..." />
                    <div class="image-preview-btn-wrap">
                        <button type="button" class="button" onclick="openMediaUploader('bg_card')">Chọn ảnh</button>
                    </div>
                </div>

                <div style="display: flex; gap: 10px; margin-top: 20px;">
                    <button type="submit" class="btn-ideas" style="flex: 1; justify-content: center;">Lưu nhóm</button>
                    <button type="button" class="button" onclick="resetForm()" style="display: none;" id="btnCancelEdit">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ═══ FULLSCREEN DYNAMIC STUDIO OVERLAY ═══════════════════════════════ -->
<div id="studioOverlay" style="display: none;">
    <div class="studio-header">
        <div>
            <h2>Studio Thiết kế Layout: <span id="studioGroupName" style="color: #fca5a5;">Group Name</span></h2>
        </div>
        <div style="display: flex; gap: 12px;">
            <button class="studio-tab-btn active" id="tabCert" onclick="switchStudioTab('cert')">Chứng chỉ (Certificate)</button>
            <button class="studio-tab-btn" id="tabTranscript" onclick="switchStudioTab('transcript')">Bảng điểm (Transcript)</button>
            <button class="studio-tab-btn" id="tabCard" onclick="switchStudioTab('card')">Thẻ học viên (Card)</button>
        </div>
        <div style="display: flex; gap: 10px;">
            <button class="button button-primary" onclick="saveStudioConfig()" style="font-weight: 700;">Lưu cấu hình</button>
            <button class="button button-secondary" onclick="closeStudio()">Thoát Studio</button>
        </div>
    </div>
    
    <div class="studio-body">
        <!-- Sidebar - Toolbox fields -->
        <div class="studio-sidebar">
            <h3 style="font-size: 14px; font-weight: 800; color: #0f172a; margin-bottom: 12px; border-bottom: 1px solid #e2e8f0; padding-bottom: 8px;">Các trường hiển thị</h3>
            <div id="studioToolbox" style="display: flex; flex-direction: column; gap: 10px;">
                <!-- Buttons dynamically loaded here -->
            </div>
        </div>
        
        <!-- Canvas area -->
        <div class="studio-canvas-area">
            <div class="studio-a4-sheet" id="studioCanvas">
                <!-- Draggable elements dynamically loaded here -->
            </div>
        </div>
        
        <!-- Sidebar - Box Properties -->
        <div class="studio-properties" id="studioPropertiesPanel">
            <h3 style="font-size: 14px; font-weight: 800; color: #0f172a; margin-bottom: 12px; border-bottom: 1px solid #e2e8f0; padding-bottom: 8px;">Thuộc tính phần tử</h3>
            <div id="propertiesForm" style="display: none;">
                <input type="hidden" id="prop_box_id" />
                
                <div class="form-group">
                    <label>Nhãn (Hiển thị mẫu)</label>
                    <input type="text" id="prop_label" oninput="updateActiveBox()" />
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label>Font Size (px)</label>
                        <input type="number" id="prop_font_size" oninput="updateActiveBox()" />
                    </div>
                    <div class="form-group">
                        <label>Color</label>
                        <input type="color" id="prop_color" onchange="updateActiveBox()" />
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label>Font Weight</label>
                        <select id="prop_weight" onchange="updateActiveBox()">
                            <option value="400">Regular (400)</option>
                            <option value="500">Medium (500)</option>
                            <option value="600">Semi Bold (600)</option>
                            <option value="700">Bold (700)</option>
                            <option value="800">Extra Bold (800)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Align</label>
                        <select id="prop_align" onchange="updateActiveBox()">
                            <option value="left">Trái</option>
                            <option value="center">Giữa</option>
                            <option value="right">Phải</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Font Family</label>
                    <select id="prop_font_family" onchange="updateActiveBox()">
                        <option value="Plus Jakarta Sans, sans-serif">Plus Jakarta Sans</option>
                        <option value="Montserrat, sans-serif">Montserrat</option>
                        <option value="Playfair Display, serif">Playfair Display</option>
                        <option value="Great Vibes, cursive">Great Vibes (Chữ nghệ thuật)</option>
                        <option value="Pinyon Script, cursive">Pinyon Script (Chữ ký tay)</option>
                        <option value="Roboto, sans-serif">Roboto</option>
                    </select>
                </div>

                <div style="margin-top: 20px;">
                    <button type="button" class="button" style="width: 100%; color: #b91c1c;" onclick="removeActiveBox()">Xóa phần tử này</button>
                </div>
            </div>
            <div id="propertiesPlaceholder" style="color: #94a3b8; font-style: italic; text-align: center; margin-top: 40px;">
                Chọn một phần tử trên canvas để chỉnh sửa thuộc tính.
            </div>
        </div>
    </div>
</div>

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
        
        document.getElementById('formTitle').innerText = 'Chỉnh sửa nhóm chứng chỉ';
        document.getElementById('btnCancelEdit').style.display = 'inline-block';
    }

    function resetForm() {
        document.getElementById('group_id').value = '0';
        document.getElementById('group_name').value = '';
        document.getElementById('bg_cert').value = '';
        document.getElementById('bg_transcript').value = '';
        document.getElementById('bg_card').value = '';
        
        document.getElementById('formTitle').innerText = 'Tạo nhóm chứng chỉ mới';
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
        // Add class to html to block scrolling
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
        // Keep background image
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
            
            // Align
            let alignMap = { left: 'flex-start', center: 'center', right: 'flex-end'};
            div.style.justifyContent = alignMap[box.align || 'left'];

            // Content html
            if (key === 'qr_code') {
                div.innerHTML = `<div style="width:100%; height:100%; border:1px solid #ab0e00; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:10px; background:white;">[Mã QR Code]</div>`;
            } else if (key === 'avatar') {
                div.innerHTML = `<div style="width:100%; height:100%; border:1px solid #ab0e00; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:10px; background:#f1f5f9;">[Ảnh thẻ 3x4]</div>`;
            } else if (key === 'course_grid') {
                div.innerHTML = `<div style="width:100%; height:100%; border:1px solid #ab0e00; font-weight:700; font-size:10px; background:white; padding:8px;">[Bảng điểm môn học (Grid)]</div>`;
            } else {
                div.innerHTML = `<span style="font-family:${box.fontFamily || 'inherit'}; font-size:${box.fontSize}px; color:${box.color || '#000000'}; font-weight:${box.weight || '600'}; white-space:nowrap;">${box.label}</span>`;
            }

            // Click selector
            div.addEventListener('mousedown', (e) => startDrag(e, key));

            canvas.appendChild(div);
        });
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
        document.getElementById('prop_label').value = box.label;
        document.getElementById('prop_font_size').value = box.fontSize;
        document.getElementById('prop_color').value = box.color;
        document.getElementById('prop_weight').value = box.weight;
        document.getElementById('prop_align').value = box.align || 'left';
        document.getElementById('prop_font_family').value = box.fontFamily || "Plus Jakarta Sans, sans-serif";
    }

    function hidePropertiesPanel() {
        document.getElementById('propertiesPlaceholder').style.display = 'block';
        document.getElementById('propertiesForm').style.display = 'none';
    }

    function updateActiveBox() {
        if (!activeBoxId) return;
        const box = studioConfig[currentStudioTab][activeBoxId];
        
        box.label = document.getElementById('prop_label').value;
        box.fontSize = parseInt(document.getElementById('prop_font_size').value) || 14;
        box.color = document.getElementById('prop_color').value;
        box.weight = document.getElementById('prop_weight').value;
        box.align = document.getElementById('prop_align').value;
        box.fontFamily = document.getElementById('prop_font_family').value;

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

    // Drag-Drop Physics engine
    function startDrag(e, id) {
        selectBox(id);
        isDragging = true;
        
        const boxEl = document.getElementById('studio_box_' + id);
        const canvas = document.getElementById('studioCanvas');
        canvasRect = canvas.getBoundingClientRect();

        dragOffset.x = e.clientX - boxEl.getBoundingClientRect().left;
        dragOffset.y = e.clientY - boxEl.getBoundingClientRect().top;

        document.addEventListener('mousemove', dragMove);
        document.addEventListener('mouseup', stopDrag);
    }

    function dragMove(e) {
        if (!isDragging || !activeBoxId) return;

        const box = studioConfig[currentStudioTab][activeBoxId];
        const canvas = document.getElementById('studioCanvas');
        
        // Calculate new percentages relative to canvas coordinates
        const x = e.clientX - canvasRect.left - dragOffset.x;
        const y = e.clientY - canvasRect.top - dragOffset.y;

        let leftPercent = (x / canvasRect.width) * 100;
        let topPercent = (y / canvasRect.height) * 100;

        // Bounding checks
        leftPercent = Math.max(0, Math.min(100 - box.width, leftPercent));
        topPercent = Math.max(0, Math.min(100 - box.height, topPercent));

        box.left = Math.round(leftPercent * 10) / 10;
        box.top = Math.round(topPercent * 10) / 10;

        const boxEl = document.getElementById('studio_box_' + activeBoxId);
        boxEl.style.left = box.left + '%';
        boxEl.style.top = box.top + '%';
    }

    function stopDrag() {
        isDragging = false;
        document.removeEventListener('mousemove', dragMove);
        document.removeEventListener('mouseup', stopDrag);
    }

    // Save layouts configuration to WP Database via AJAX Action
    async function saveStudioConfig() {
        if (!activeGroup) return;

        // Perform custom WP AJAX API post
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
                // Update activeGroup cached data to reload page
                location.reload();
            } else {
                alert('❌ Lỗi: ' + (result.data.error || 'Không thể lưu cấu hình.'));
            }
        } catch(e) {
            alert('⚠️ Lỗi kết nối mạng khi lưu.');
        }
    }
</script>
