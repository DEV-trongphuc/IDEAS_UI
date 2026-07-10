<?php
// transcript-template.php - Protected Student Transcript Viewer Page
if (!defined('ABSPATH')) {
    exit;
}

$cer_id = sanitize_text_field($_GET['cer_id'] ?? '');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Điểm - IDEAS Academic Transcript</title>
    <link rel="icon" href="/wp-content/uploads/external-migrated/angry_icon_d339ae28.webp" sizes="32x32" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --red: #ab0e00;
            --red-dark: #8c0c00;
            --a4-width: 794px;
            --a4-height: 1122px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f8fafc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px 60px;
            width: 100%;
            overflow-x: hidden;
        }

        /* ═══ OTP GATE ═══════════════════════════════════════════════════════ */
        #otpGate {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.05);
            padding: 48px 40px;
            max-width: 440px;
            width: 100%;
            text-align: center;
            margin-top: 60px;
            border: 1px solid #f1f5f9;
        }

        #otpGate .gate-logo {
            height: 50px;
            margin-bottom: 24px;
        }

        #otpGate h2 {
            font-size: 20px;
            color: #0f172a;
            margin-bottom: 8px;
            font-weight: 800;
        }

        #otpGate p {
            font-size: 13.5px;
            color: #64748b;
            margin-bottom: 28px;
            line-height: 1.5;
        }

        .otp-input-row {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-bottom: 24px;
        }

        .otp-digit {
            width: 48px;
            height: 56px;
            border: 1.5px solid #cbd5e1;
            border-radius: 10px;
            font-size: 24px;
            font-weight: 800;
            text-align: center;
            color: var(--red);
            font-family: 'Courier New', monospace;
            outline: none;
            transition: all 0.2s;
        }

        .otp-digit:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 3px rgba(171, 14, 0, 0.1);
        }

        .btn-primary {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--red), #d42a1a);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            font-family: inherit;
            transition: all 0.2s;
            box-shadow: 0 4px 12px rgba(171, 14, 0, 0.2);
            margin-bottom: 12px;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(171, 14, 0, 0.25);
        }

        .btn-primary:disabled {
            background: #cbd5e1;
            box-shadow: none;
            cursor: not-allowed;
            transform: none;
        }

        .otp-status {
            margin-top: 14px;
            font-size: 13px;
            padding: 10px 14px;
            border-radius: 6px;
            display: none;
            font-weight: 500;
        }

        .otp-status.error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        .otp-status.success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #6ee7b7;
        }

        .resend-row {
            margin-top: 18px;
            font-size: 12px;
            color: #94a3b8;
        }

        .resend-row a {
            color: var(--red);
            cursor: pointer;
            text-decoration: underline;
            font-weight: 600;
        }

        /* ═══ TRANSCRIPT PANEL ═════════════════════════════════════════════════ */
        #transcriptWrap {
            display: none;
            width: 100%;
        }

        /* Top Bar */
        .top-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
            z-index: 100;
            padding: 12px 0;
        }

        .top-bar-inner {
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .top-bar img {
            height: 40px;
        }

        .top-bar .btn-print {
            padding: 8px 18px;
            background: var(--red);
            color: white;
            border: none;
            border-radius: 6px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(171, 14, 0, 0.15);
        }

        /* A4 Transcript Sheet */
        .a4-sheet-wrapper {
            width: 100%;
            max-width: 794px;
            position: relative;
            margin: 80px auto 0;
        }
        .a4-sheet-wrapper::before {
            content: "";
            display: block;
            padding-bottom: calc(1122 / 794 * 100%);
        }

        .a4-sheet {
            width: 794px;
            height: 1122px;
            background: white;
            position: absolute;
            top: 0;
            left: 0;
            transform: scale(var(--scale, 1));
            transform-origin: top left;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border-radius: 4px;
        }

        .sheet-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: 1;
        }

        .sheet-content {
            position: relative;
            z-index: 2;
            width: 100%;
            height: 100%;
        }

        /* Grid course rendering */
        .courses-table-container {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .courses-grid-table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Montserrat', sans-serif;
        }

        .courses-grid-table th {
            border: 1px solid #1a1a1a;
            padding: 8px;
            text-align: left;
            background: #f1f5f9;
            font-weight: 700;
            font-size: 12px;
        }

        .courses-grid-table td {
            border: 1px solid #1a1a1a;
            padding: 8px;
            font-size: 12px;
            font-weight: 500;
        }

        /* Print Override */
        @media print {
            body {
                background: white;
                padding: 0;
                margin: 0;
            }
            .top-bar, #otpGate {
                display: none !important;
            }
            .a4-sheet-wrapper {
                max-width: 100%;
                margin: 0;
            }
            .a4-sheet {
                position: relative;
                transform: none !important;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>

    <!-- ═══ OTP GATE ═══════════════════════════════════════════════════════ -->
    <div id="otpGate">
        <img src="/wp-content/uploads/external-migrated/angry_icon_d339ae28.webp" alt="IDEAS Logo" class="gate-logo">
        <h2>Xác thực Bảng Điểm</h2>
        <p>Để bảo mật, vui lòng nhập mã OTP 6 số đã được gửi đến email đăng ký học tập của bạn.</p>

        <div class="otp-input-row" id="otpInputRow">
            <input type="text" class="otp-digit" maxlength="1" pattern="[0-9]*" inputmode="numeric">
            <input type="text" class="otp-digit" maxlength="1" pattern="[0-9]*" inputmode="numeric">
            <input type="text" class="otp-digit" maxlength="1" pattern="[0-9]*" inputmode="numeric">
            <input type="text" class="otp-digit" maxlength="1" pattern="[0-9]*" inputmode="numeric">
            <input type="text" class="otp-digit" maxlength="1" pattern="[0-9]*" inputmode="numeric">
            <input type="text" class="otp-digit" maxlength="1" pattern="[0-9]*" inputmode="numeric">
        </div>

        <button class="btn-primary" id="btnVerifyOtp" disabled>Xác thực mã OTP</button>
        <button class="btn-secondary" id="btnRequestOtp" style="display: none;">Gửi lại OTP</button>

        <div id="otpStatus" class="otp-status"></div>

        <div class="resend-row" id="resendRow">
            Chưa nhận được mã? <a id="lnkResend" onclick="sendOtpCode()">Gửi yêu cầu nhận mã OTP</a>
        </div>
    </div>

    <!-- ═══ TRANSCRIPT PANEL ═════════════════════════════════════════════════ -->
    <div id="transcriptWrap">
        <div class="top-bar">
            <div class="top-bar-inner">
                <img src="/wp-content/uploads/external-migrated/angry_icon_d339ae28.webp" alt="IDEAS Logo">
                <button class="btn-print" onclick="window.print()">In Bảng Điểm (A4)</button>
            </div>
        </div>

        <div class="a4-sheet-wrapper" id="sheetWrapper">
            <div class="a4-sheet" id="transcriptSheet">
                <div class="sheet-background" id="bgLayer"></div>
                <div class="sheet-content" id="renderContainer">
                    <!-- Dinamically rendered boxes -->
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var ajaxurl = "<?php echo esc_url(admin_url('admin-ajax.php')); ?>";
        const cerId = "<?php echo esc_js($cer_id); ?>";
        let certData = null;

        // Auto trigger send OTP on page load
        document.addEventListener('DOMContentLoaded', () => {
            setupOtpInputs();
            sendOtpCode();
        });

        // 1. Setup OTP text boxes autofocus jumping
        function setupOtpInputs() {
            const inputs = document.querySelectorAll('.otp-digit');
            const verifyBtn = document.getElementById('btnVerifyOtp');

            inputs.forEach((input, index) => {
                input.addEventListener('input', (e) => {
                    // strip non-numeric
                    input.value = input.value.replace(/[^0-9]/g, '');

                    if (input.value && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                    checkDigits();
                });

                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && !input.value && index > 0) {
                        inputs[index - 1].focus();
                    }
                });
            });

            function checkDigits() {
                const filled = Array.from(inputs).every(i => i.value !== '');
                verifyBtn.disabled = !filled;
            }

            verifyBtn.addEventListener('click', verifyOtpCode);
        }

        // 2. Trigger WP AJAX to Send OTP
        async function sendOtpCode() {
            const statusEl = document.getElementById('otpStatus');
            const resendLnk = document.getElementById('lnkResend');
            
            if (resendLnk) resendLnk.style.pointerEvents = 'none';
            showStatus('Đang gửi mã OTP...', 'info');

            try {
                const res = await fetch(ajaxurl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        action: 'ideas_verify_send_otp',
                        cer_no: cerId
                    })
                });
                const data = await res.json();

                if (data.success && data.data) {
                    showStatus(data.data.message || 'Mã OTP đã gửi thành công!', 'success');
                } else {
                    showStatus(((data.data && data.data.error) || 'Lỗi gửi mã OTP.'), 'error');
                }
            } catch(e) {
                showStatus('Lỗi kết nối gửi OTP.', 'error');
            } finally {
                if (resendLnk) resendLnk.style.pointerEvents = 'auto';
            }
        }

        // 3. Trigger WP AJAX to Verify OTP
        async function verifyOtpCode() {
            const inputs = document.querySelectorAll('.otp-digit');
            const otpCode = Array.from(inputs).map(i => i.value).join('');
            const verifyBtn = document.getElementById('btnVerifyOtp');

            verifyBtn.disabled = true;
            verifyBtn.textContent = 'Đang xác thực...';

            try {
                const res = await fetch(ajaxurl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        action: 'ideas_verify_confirm_otp',
                        cer_no: cerId,
                        otp: otpCode
                    })
                });
                const data = await res.json();

                if (data.success) {
                    showStatus('Xác thực thành công! Đang tải bảng điểm...', 'success');
                    await loadTranscriptData();
                } else {
                    showStatus(((data.data && data.data.error) || 'Mã OTP không đúng.'), 'error');
                    verifyBtn.disabled = false;
                    verifyBtn.textContent = 'Xác thực mã OTP';
                }
            } catch(e) {
                showStatus('Lỗi xác thực OTP.', 'error');
                verifyBtn.disabled = false;
                verifyBtn.textContent = 'Xác thực mã OTP';
            }
        }

        // 4. Load full Transcript layout and data once OTP verified
        async function loadTranscriptData() {
            try {
                const res = await fetch(`${ajaxurl}?action=ideas_verify_get_cert&cer_id=${encodeURIComponent(cerId)}`);
                const result = await res.json();

                if (result.success && result.data) {
                    certData = result.data;
                    
                    // Show transcript block, hide OTP gate
                    document.getElementById('otpGate').style.display = 'none';
                    document.getElementById('transcriptWrap').style.display = 'block';

                    renderTranscript();
                } else {
                    alert('Lỗi tải dữ liệu bảng điểm.');
                }
            } catch(e) {
                alert('Lỗi kết nối tải bảng điểm.');
            }
        }

        // 5. Draw Dynamic Transcript using coordinate layout configs
        function renderTranscript() {
            const canvas = document.getElementById('renderContainer');
            const bgEl = document.getElementById('bgLayer');

            let config = {};
            if (certData.config_transcript) {
                try { config = typeof certData.config_transcript === 'string' ? JSON.parse(certData.config_transcript) : certData.config_transcript; } catch(e){}
            }
            if (certData.bg_transcript && bgEl) {
                bgEl.style.backgroundImage = `url('${resolveBgUrl(certData.bg_transcript)}')`;
            }

            canvas.innerHTML = '';
            
            Object.keys(config).forEach(k => {
                const box = config[k];
                const el = document.createElement('div');
                el.style.position = 'absolute';
                el.style.top = box.top + '%';
                el.style.left = box.left + '%';
                el.style.width = box.width + '%';
                el.style.height = box.height + '%';
                el.style.display = 'flex';
                el.style.alignItems = 'center';
                
                let alignMap = { left: 'flex-start', center: 'center', right: 'flex-end'};
                el.style.justifyContent = alignMap[box.align || 'left'];

                if (k === 'course_grid') {
                    // Render course rows table
                    const tableContainer = document.createElement('div');
                    tableContainer.className = 'courses-table-container';
                    tableContainer.style.cssText = "width:100%; height:100%; overflow:hidden;";

                    let tableHtml = `
                        <table class="courses-grid-table">
                            <thead>
                                <tr>
                                    <th style="width: 45%;">Tên môn học (Course Module)</th>
                                    <th style="width: 15%; text-align:center;">Tín chỉ</th>
                                    <th style="width: 20%; text-align:center;">Điểm (%)</th>
                                    <th style="width: 20%; text-align:center;">Điểm Chữ</th>
                                </tr>
                            </thead>
                            <tbody>
                    `;

                    if (certData.courses && certData.courses.length) {
                        certData.courses.forEach(c => {
                            tableHtml += `
                                <tr>
                                    <td>${c.course_title}</td>
                                    <td style="text-align:center;">${c.credits || 'N/A'}</td>
                                    <td style="text-align:center;">${c.percentage || 'N/A'}</td>
                                    <td style="text-align:center;"><strong>${c.grade}</strong></td>
                                </tr>
                            `;
                        });
                    } else {
                        tableHtml += `<tr><td colspan="4" style="text-align:center; color:#94a3b8; font-style:italic;">Không có dữ liệu môn học</td></tr>`;
                    }

                    tableHtml += `</tbody></table>`;
                    tableContainer.innerHTML = tableHtml;
                    el.appendChild(tableContainer);
                    canvas.appendChild(el);
                    return;
                }

                let val = '';
                let prefix = (box.showLabel !== false && box.label) ? box.label + " " : "";

                if (k === 'name') val = certData.name || "N/A";
                else if (k === 'student_id' || k === 'id_no') val = prefix + (certData.student_id || "N/A");
                else if (k === 'dob') val = prefix + (certData.dob || "N/A");
                else if (k === 'sex') val = prefix + (certData.sex || "N/A");
                else if (k === 'nationality') val = prefix + (certData.nationality || "N/A");
                else if (k === 'registration_date') val = prefix + (certData.registration_date || "N/A");
                else val = box.label || '';

                const escapeHTML = str => String(str).replace(/[&<>'"]/g, tag => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#39;', '"': '&quot;' }[tag] || tag));

                el.innerHTML = `<span style="font-family:${box.fontFamily || "'Plus Jakarta Sans', sans-serif"}; font-size:${box.fontSize}px; color:${box.color || '#1a1a1a'}; font-weight:${box.weight || '600'}; text-align:${box.align}; white-space:nowrap; transform-origin:center center;">${escapeHTML(val)}</span>`;
                
                canvas.appendChild(el);
                
                const span = el.querySelector('span');
                if (span) {
                    requestAnimationFrame(() => {
                        if (span.scrollWidth > el.clientWidth && el.clientWidth > 0) {
                            const scale = el.clientWidth / span.scrollWidth;
                            span.style.transform = `scale(${scale})`;
                            span.style.transformOrigin = alignMap[box.align || 'left'] + ' center';
                        }
                    });
                }
            });
        }

        function resizeSheet() {
            const wrappers = document.querySelectorAll('.a4-sheet-wrapper');
            const availableWidth = document.documentElement.clientWidth - 40;
            wrappers.forEach(wrapper => {
                let targetWidth = Math.min(availableWidth, 794);
                wrapper.style.setProperty('--scale', targetWidth / 794);
            });
        }
        window.addEventListener('resize', resizeSheet);
        setTimeout(resizeSheet, 50);
        resizeSheet();

        function resolveBgUrl(path) {
            if (!path) return '';
            if (path.includes('assets/')) {
                const parts = path.split('assets/');
                return `/wp-content/themes/LANDINGPAGE_MBA/verify-system/assets/${parts[1]}`;
            }
            if (path.startsWith('http://') || path.startsWith('https://')) {
                return path;
            }
            let clean = path.replace(/^\/+/, '');
            while (clean.startsWith('verify/')) {
                clean = clean.substring(7);
            }
            return clean;
        }

        function showStatus(msg, type) {
            const statusEl = document.getElementById('otpStatus');
            statusEl.textContent = msg;
            statusEl.className = 'otp-status ' + type;
            statusEl.style.display = 'block';
        }
    </script>
</body>
</html>
