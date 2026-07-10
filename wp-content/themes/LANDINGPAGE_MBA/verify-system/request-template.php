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
            --red-light: #e11d48;
            --primary-gradient: linear-gradient(135deg, #ab0e00 0%, #e11d48 100%);
            --bg-slate: #f8fafc;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #f1f5f9;
            background-image: radial-gradient(at 0% 0%, rgba(225, 29, 72, 0.03) 0, transparent 50%), radial-gradient(at 50% 0%, rgba(171, 14, 0, 0.02) 0, transparent 50%);
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }
        .container {
            background: white;
            padding: 50px 40px;
            border-radius: 20px;
            max-width: 650px;
            width: 100%;
            box-shadow: 0 20px 25px -5px rgba(0,0,0,0.05), 0 10px 10px -5px rgba(0,0,0,0.01), inset 0 1px 0 0 rgba(255,255,255,0.6);
            border: 1px solid #e2e8f0;
            position: relative;
        }
        .container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: var(--primary-gradient);
            border-radius: 20px 20px 0 0;
        }
        .logo-wrap {
            text-align: center;
            margin-bottom: 28px;
        }
        .logo-wrap img {
            height: 52px;
            object-fit: contain;
        }
        h2 {
            font-size: 26px;
            font-weight: 800;
            color: #0f172a;
            text-align: center;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }
        .subtitle {
            font-size: 14px;
            color: #64748b;
            text-align: center;
            margin-bottom: 36px;
            line-height: 1.6;
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
            font-weight: 700;
            color: #334155;
            font-size: 13.5px;
        }
        label span {
            color: var(--red);
        }
        input[type="text"], input[type="email"], input[type="date"], select {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #cbd5e1;
            border-radius: 10px;
            font-family: inherit;
            font-size: 15px;
            outline: none;
            transition: all 0.2s ease;
            background: #f8fafc;
            color: #1e293b;
        }
        input:focus, select:focus {
            border-color: var(--red-light);
            background: white;
            box-shadow: 0 0 0 4px rgba(225, 29, 72, 0.1);
        }
        .avatar-upload-box {
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            padding: 24px;
            text-align: center;
            background: #f8fafc;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }
        .avatar-upload-box:hover {
            border-color: var(--red-light);
            background: #fffbeb;
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
            max-width: 110px;
            max-height: 146px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid white;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
            display: none;
            margin: 14px auto 0;
        }
        .upload-icon {
            font-size: 32px;
            margin-bottom: 8px;
            display: block;
        }
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            font-family: inherit;
            box-shadow: 0 8px 24px rgba(171, 14, 0, 0.2);
            transition: all 0.25s ease;
        }
        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 28px rgba(171, 14, 0, 0.3);
        }
        .btn-submit:disabled {
            background: #cbd5e1;
            box-shadow: none;
            cursor: not-allowed;
            transform: none;
        }
        .status-box {
            padding: 16px;
            border-radius: 10px;
            font-size: 14.5px;
            font-weight: 600;
            display: none;
            margin-bottom: 24px;
            line-height: 1.5;
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
            padding: 8px 16px;
            border-radius: 50px;
            display: inline-block;
            margin-bottom: 24px;
            font-size: 13.5px;
            box-shadow: 0 2px 4px rgba(30, 64, 175, 0.05);
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
    
    <p class="subtitle">Vui lòng kiểm tra và nhập chính xác thông tin cá nhân của bạn dưới đây. Các thông tin này sẽ hiển thị chính thức trên chứng chỉ và bảng điểm.</p>

    <div id="statusBox" class="status-box"></div>

    <form id="requestForm" enctype="multipart/form-data">
        <input type="hidden" name="action" value="ideas_verify_submit_request" />
        <input type="hidden" name="contract_code" value="<?php echo esc_attr($contract_code); ?>" />

        <?php if (empty($contract_code)): ?>
        <div class="form-group">
            <label for="contract_code_input">Mã lớp học / Mã liên kết đào tạo <span>*</span></label>
            <input type="text" id="contract_code_input" name="contract_code" required placeholder="Nhập mã lớp học được cung cấp..." />
        </div>
        <?php endif; ?>

        <div class="form-row">
            <div class="form-group">
                <label for="name">Họ và tên học viên <span>*</span></label>
                <input type="text" id="name" name="name" required placeholder="Ví dụ: NGUYỄN VĂN A" style="text-transform: uppercase;" />
            </div>
            <div class="form-group">
                <label for="student_id">Số CCCD / Mã ID Học viên <span>*</span></label>
                <input type="text" id="student_id" name="student_id" required placeholder="Nhập số CCCD hoặc ID học viên" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="email">Email liên hệ nhận chứng chỉ <span>*</span></label>
                <input type="email" id="email" name="email" required placeholder="Ví dụ: name@domain.com" />
            </div>
            <div class="form-group">
                <label for="dob">Ngày sinh</label>
                <input type="date" id="dob" name="dob" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="sex">Giới tính</label>
                <select id="sex" name="sex" style="cursor: pointer;">
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
            <label>Ảnh chân dung 3x4 (Tải lên làm ảnh thẻ bảng điểm)</label>
            <div class="avatar-upload-box" id="uploadBox">
                <span class="upload-icon">📤</span>
                <span id="uploadText" style="font-size:13.5px; color:#64748b; font-weight:600;">Kéo thả ảnh hoặc click để chọn tệp tin (Định dạng PNG/JPG/JPEG, Tối đa 3MB)</span>
                <input type="file" id="avatarFile" name="avatar" accept="image/png, image/jpeg, image/jpg" />
                <img id="avatarPreview" class="avatar-preview-img" alt="Preview ảnh thẻ" />
            </div>
        </div>

        <button type="submit" id="btnSubmit" class="btn-submit" style="margin-top: 10px;">Gửi yêu cầu đăng ký</button>
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
                    uploadText.textContent = `Đã chọn: ${file.name}`;
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
            btnSubmit.textContent = 'Đang gửi thông tin đăng ký...';
            statusBox.style.display = 'none';

            const formData = new FormData(form);

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
                    uploadText.textContent = 'Kéo thả ảnh hoặc click để chọn tệp tin (Định dạng PNG/JPG/JPEG, Tối đa 3MB)';
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
