<?php
// request-template.php - Student Registration / Certificate Request Form
if (!defined('ABSPATH')) {
    exit;
}

global $wpdb;
$contract_code = sanitize_text_field($_GET['contract_code'] ?? $_GET['class'] ?? '');
$contract_name = '';
$course_name = '';

if ($contract_code) {
    $table_contracts = $wpdb->prefix . 'ideas_certificate_contracts';
    $contract = $wpdb->get_row($wpdb->prepare(
        "SELECT partner_name, course_name FROM $table_contracts WHERE contract_code = %s AND status = 'active'",
        $contract_code
    ));
    if ($contract) {
        $contract_name = $contract->partner_name;
        $course_name = $contract->course_name;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký cấp Chứng chỉ - IDEAS Certification</title>
    <link rel="icon" href="/wp-content/uploads/external-migrated/angry_icon_d339ae28.webp" sizes="32x32" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --red: #ab0e00;
            --red-dark: #8c0c00;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #f8fafc;
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 16px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.05);
            border: 1px solid #f1f5f9;
        }
        .logo-wrap {
            text-align: center;
            margin-bottom: 24px;
        }
        .logo-wrap img {
            height: 50px;
        }
        h2 {
            font-size: 24px;
            font-weight: 800;
            color: #0f172a;
            text-align: center;
            margin-bottom: 10px;
        }
        .subtitle {
            font-size: 14px;
            color: #64748b;
            text-align: center;
            margin-bottom: 30px;
            line-height: 1.5;
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }
        @media screen and (max-width: 576px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group.full-width {
            grid-column: span 2;
        }
        @media screen and (max-width: 576px) {
            .form-group.full-width {
                grid-column: span 1;
            }
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #334155;
            font-size: 14px;
        }
        label span {
            color: var(--red);
        }
        input[type="text"], input[type="email"], input[type="date"], select {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #cbd5e1;
            border-radius: 8px;
            font-family: inherit;
            font-size: 15px;
            outline: none;
            transition: all 0.2s;
            background: #f8fafc;
        }
        input:focus, select:focus {
            border-color: var(--red);
            background: white;
            box-shadow: 0 0 0 3px rgba(171, 14, 0, 0.1);
        }
        .avatar-upload-box {
            border: 2px dashed #cbd5e1;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            background: #f8fafc;
            cursor: pointer;
            transition: all 0.2s;
            position: relative;
        }
        .avatar-upload-box:hover {
            border-color: var(--red);
        }
        .avatar-upload-box input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
        .avatar-preview-img {
            max-width: 120px;
            max-height: 160px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
            display: none;
            margin: 10px auto 0;
        }
        .upload-icon {
            font-size: 28px;
            color: #64748b;
            margin-bottom: 8px;
            display: block;
        }
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--red), #d42a1a);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            font-family: inherit;
            box-shadow: 0 6px 20px rgba(171, 14, 0, 0.2);
            transition: all 0.25s;
        }
        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 24px rgba(171, 14, 0, 0.3);
        }
        .btn-submit:disabled {
            background: #94a3b8;
            box-shadow: none;
            cursor: not-allowed;
            transform: none;
        }
        .status-box {
            padding: 14px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            display: none;
            margin-bottom: 20px;
        }
        .status-box.error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }
        .status-box.success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #6ee7b7;
        }
        .class-badge {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1e40af;
            font-weight: 700;
            padding: 6px 12px;
            border-radius: 50px;
            display: inline-block;
            margin-bottom: 20px;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="logo-wrap">
        <img src="/wp-content/uploads/external-migrated/angry_icon_d339ae28.webp" alt="IDEAS Logo">
    </div>
    <h2>Đăng ký cấp Chứng chỉ</h2>
    
    <?php if ($contract_name): ?>
        <div style="text-align: center;">
            <div class="class-badge">
                Lớp học: <?php echo esc_html($contract_name); ?> (<?php echo esc_html($course_name); ?>)
            </div>
        </div>
    <?php endif; ?>
    
    <p class="subtitle">Vui lòng nhập chính xác thông tin cá nhân dưới đây. Thông tin này sẽ được in trực tiếp lên chứng chỉ và bảng điểm chính thức của bạn.</p>

    <div id="statusBox" class="status-box"></div>

    <form id="requestForm" enctype="multipart/form-data">
        <input type="hidden" name="action" value="ideas_verify_submit_request" />
        <input type="hidden" name="contract_code" value="<?php echo esc_attr($contract_code); ?>" />

        <?php if (empty($contract_code)): ?>
        <div class="form-group">
            <label for="contract_code_input">Mã lớp học / Mã liên kết <span>*</span></label>
            <input type="text" id="contract_code_input" name="contract_code" required placeholder="Nhập mã lớp học (được cung cấp)" />
        </div>
        <?php endif; ?>

        <div class="form-row">
            <div class="form-group">
                <label for="name">Họ và tên <span>*</span></label>
                <input type="text" id="name" name="name" required placeholder="Ví dụ: NGUYỄN VĂN A" style="text-transform: uppercase;" />
            </div>
            <div class="form-group">
                <label for="student_id">Số CCCD / ID Học viên <span>*</span></label>
                <input type="text" id="student_id" name="student_id" required placeholder="Nhập số CCCD hoặc ID học viên" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="email">Email nhận chứng chỉ <span>*</span></label>
                <input type="email" id="email" name="email" required placeholder="Nhập email của bạn" />
            </div>
            <div class="form-group">
                <label for="dob">Ngày sinh</label>
                <input type="date" id="dob" name="dob" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="sex">Giới tính</label>
                <select id="sex" name="sex">
                    <option value="">-- Chọn giới tính --</option>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nationality">Quốc tịch</label>
                <input type="text" id="nationality" name="nationality" value="Viet Nam" />
            </div>
        </div>

        <div class="form-group">
            <label>Ảnh thẻ 3x4 (Tải lên làm ảnh hồ sơ bảng điểm)</label>
            <div class="avatar-upload-box" id="uploadBox">
                <span class="upload-icon">📤</span>
                <span id="uploadText">Kéo thả ảnh vào đây hoặc click để chọn tệp tin (Tối đa 3MB)</span>
                <input type="file" id="avatarFile" name="avatar" accept="image/png, image/jpeg, image/jpg" />
                <img id="avatarPreview" class="avatar-preview-img" alt="Preview ảnh thẻ" />
            </div>
        </div>

        <button type="submit" id="btnSubmit" class="btn-submit">Gửi yêu cầu đăng ký</button>
    </form>
</div>

<script type="text/javascript">
    var ajaxurl = "<?php echo esc_url(admin_url('admin-ajax.php')); ?>";

    document.addEventListener('DOMContentLoaded', () => {
        const fileInput = document.getElementById('avatarFile');
        const uploadBox = document.getElementById('uploadBox');
        const preview = document.getElementById('avatarPreview');
        const uploadText = document.getElementById('uploadText');

        fileInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    uploadText.textContent = `Tệp tin: ${file.name}`;
                };
                reader.readAsDataURL(file);
            }
        });

        const form = document.getElementById('requestForm');
        const btnSubmit = document.getElementById('btnSubmit');
        const statusBox = document.getElementById('statusBox');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            btnSubmit.disabled = true;
            btnSubmit.textContent = 'Đang gửi đăng ký...';
            statusBox.style.display = 'none';

            const formData = new FormData(form);

            // Wait! If contract_code was empty in main hidden field, get from input
            const contractInput = document.getElementById('contract_code_input');
            if (contractInput) {
                formData.set('contract_code', contractInput.value.trim());
            }

            try {
                const res = await fetch(ajaxurl, {
                    method: 'POST',
                    body: formData
                });
                const data = await res.json();

                if (data.success) {
                    statusBox.className = 'status-box success';
                    statusBox.textContent = data.data.message;
                    statusBox.style.display = 'block';
                    form.reset();
                    preview.style.display = 'none';
                    uploadText.textContent = 'Kéo thả ảnh vào đây hoặc click để chọn tệp tin (Tối đa 3MB)';
                } else {
                    statusBox.className = 'status-box error';
                    statusBox.textContent = '❌ ' + (data.data.error || 'Có lỗi xảy ra. Vui lòng kiểm tra lại.');
                    statusBox.style.display = 'block';
                    btnSubmit.disabled = false;
                    btnSubmit.textContent = 'Gửi yêu cầu đăng ký';
                }
            } catch (err) {
                statusBox.className = 'status-box error';
                statusBox.textContent = '⚠️ Lỗi kết nối mạng. Không thể gửi yêu cầu.';
                statusBox.style.display = 'block';
                btnSubmit.disabled = false;
                btnSubmit.textContent = 'Gửi yêu cầu đăng ký';
            }
        });
    });
</script>

</body>
</html>
