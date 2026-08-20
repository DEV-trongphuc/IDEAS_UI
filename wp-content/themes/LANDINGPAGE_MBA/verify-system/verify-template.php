<?php
// verify-template.php - Public Verification & Interactive A4 Renderer
if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Thực Chứng Chỉ - IDEAS Certificate Verification</title>
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp" sizes="32x32" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Inter:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

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
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            max-width: 100%;
            overflow-x: hidden;
            -webkit-overflow-scrolling: touch;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
            color: #0f172a;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 0 0 60px 0;
        }

        /* ═══ TOP BAR ══════════════════════════════════════════════════════════ */
        .top-verification-bar {
            width: 100%;
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 14px 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
            position: sticky;
            top: 0;
            z-index: 100;
            margin-bottom: 32px;
        }

        .top-bar-content {
            width: 100%;
            max-width: 1200px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .ideas-logo {
            height: 38px;
            width: auto;
            max-width: 240px;
            object-fit: contain;
            flex-shrink: 1;
        }

        .verification-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
            padding: 5px 12px;
            border-radius: 9999px;
            font-size: 12.5px;
            font-weight: 700;
            letter-spacing: 0.3px;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .verify-icon {
            width: 15px;
            height: 15px;
            stroke: #059669;
            flex-shrink: 0;
        }

        @media (max-width: 640px) {
            .top-verification-bar {
                padding: 10px 12px;
                margin-bottom: 20px;
            }
            .ideas-logo {
                height: 26px !important;
                max-width: 130px !important;
            }
            .verification-badge {
                padding: 4px 8px;
                font-size: 10px;
                gap: 4px;
                letter-spacing: 0;
            }
            .verify-icon {
                width: 12px;
                height: 12px;
            }
        }

        @media (max-width: 380px) {
            .ideas-logo {
                height: 22px !important;
                max-width: 100px !important;
            }
            .verification-badge {
                padding: 3px 6px;
                font-size: 8.5px;
            }
            .verify-icon {
                width: 10px;
                height: 10px;
            }
        }

        @media (max-width: 820px) {
            body {
                padding: 0 0 40px 0;
            }
            .a4-wrapper {
                width: 94% !important;
                max-width: 94% !important;
                margin: 0 auto 30px auto !important;
                border-radius: 8px;
                box-shadow: 0 6px 24px rgba(15, 23, 42, 0.08);
            }
            .a4-page {
                border-radius: 8px;
            }
        }

        /* ═══ LOOKUP MODAL / HERO PORTAL ═══════════════════════════════════════ */
        #lookupModal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(8px);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .lookup-box {
            background: #ffffff;
            padding: 40px 36px;
            border-radius: 24px;
            max-width: 460px;
            width: 100%;
            text-align: center;
            box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25), 0 0 0 1px rgba(0,0,0,0.05);
            position: relative;
            animation: modalFadeIn 0.28s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes modalFadeIn {
            from { opacity: 0; transform: scale(0.96) translateY(8px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }

        .lookup-logo-wrap {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
        }

        .lookup-logo-wrap img {
            height: 52px;
            width: auto;
            object-fit: contain;
            border-radius: 8px;
        }

        .lookup-box h3 {
            margin-bottom: 8px;
            font-size: 22px;
            color: #0f172a;
            font-weight: 800;
            letter-spacing: -0.3px;
        }

        .lookup-box p.lookup-desc {
            margin-bottom: 24px;
            font-size: 13.5px;
            color: #64748b;
            line-height: 1.5;
        }

        /* Clean Segmented Tab Switcher (No Emojis) */
        .lookup-tabs {
            display: flex;
            background: #f1f5f9;
            padding: 4px;
            border-radius: 12px;
            margin-bottom: 22px;
            gap: 4px;
        }

        .lookup-tab-btn {
            flex: 1;
            padding: 10px 12px;
            border: none;
            border-radius: 8px;
            background: transparent;
            color: #64748b;
            font-size: 13.5px;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .lookup-tab-btn.active {
            background: #ffffff;
            color: var(--red);
            font-weight: 700;
            box-shadow: 0 2px 6px rgba(0,0,0,0.06);
        }

        .tab-panel {
            display: none;
            text-align: left;
        }

        .tab-panel.active {
            display: block;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #334155;
            margin-bottom: 8px;
        }

        .input-control {
            width: 100%;
            padding: 13px 16px;
            border: 1.5px solid #cbd5e1;
            border-radius: 10px;
            font-size: 14.5px;
            font-family: inherit;
            outline: none;
            transition: all 0.2s;
            background: #f8fafc;
        }

        .input-control:focus {
            background: #ffffff;
            border-color: var(--red);
            box-shadow: 0 0 0 3px rgba(171, 14, 0, 0.12);
        }

        .input-otp-main {
            text-align: center;
            font-size: 26px;
            font-weight: 800;
            letter-spacing: 8px;
            color: var(--red);
            padding: 12px;
        }

        .otp-info-banner {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13px;
            line-height: 1.5;
            margin-bottom: 18px;
        }

        .btn-action-main {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 14px 24px;
            background: linear-gradient(135deg, var(--red), #d42a1a);
            color: white;
            border: none;
            border-radius: 10px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 6px 18px rgba(171, 14, 0, 0.25);
            transition: all 0.2s ease-in-out;
            letter-spacing: 0.3px;
        }

        .btn-action-main:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 22px rgba(171, 14, 0, 0.35);
        }

        .btn-action-main:disabled {
            background: #94a3b8;
            box-shadow: none;
            cursor: not-allowed;
            transform: none;
        }

        .otp-actions-sub {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 14px;
            font-size: 13px;
        }

        .otp-actions-sub a {
            color: var(--red);
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
        }

        .otp-actions-sub a:hover {
            text-decoration: underline;
        }

        .status-msg {
            font-size: 13px;
            color: var(--red);
            display: none;
            margin-top: 12px;
            font-weight: 600;
            text-align: center;
        }

        /* ═══ BUTTONS ═══════════════════════════════════════════════════════════ */
        .btn-transcript {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 14px 32px;
            background: linear-gradient(135deg, var(--red), #d42a1a);
            color: white;
            border: none;
            border-radius: 50px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 6px 20px rgba(171, 14, 0, 0.2);
            transition: all 0.25s ease-in-out;
            letter-spacing: 0.5px;
            justify-content: center;
        }

        .btn-transcript:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(171, 14, 0, 0.3);
        }

        .btn-transcript-label {
            display: flex;
            flex-direction: column;
            gap: 2px;
            text-align: left;
        }

        .btn-transcript-sub {
            font-size: 11px;
            font-weight: 400;
            opacity: 0.85;
            line-height: 1;
        }

        .btn-transcript svg {
            width: 20px;
            height: 20px;
            stroke: white;
            flex-shrink: 0;
        }

        .transcript-btn-wrap {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            width: 100%;
        }

        /* ═══ A4 CERTIFICATE RENDERER ═════════════════════════════════════════ */
        .a4-wrapper {
            width: 95%;
            max-width: var(--a4-width);
            position: relative;
            margin: 0 auto;
            overflow: hidden;
            border-radius: 6px;
        }

        .a4-wrapper::before {
            content: "";
            display: block;
            padding-bottom: calc(1122 / 794 * 100%);
        }

        .a4-page {
            width: var(--a4-width);
            height: var(--a4-height);
            background: white;
            position: absolute;
            top: 0;
            left: 0;
            transform: scale(var(--scale, 1));
            transform-origin: top left;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
            overflow: hidden;
            border-radius: 4px;
        }

        .page-background {
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

        .page-content {
            position: relative;
            z-index: 2;
            width: 100%;
            height: 100%;
        }

        /* ═══ PRINT STYLES ═════════════════════════════════════════════════════ */
        @media print {
            body {
                background: white;
                padding: 0;
                margin: 0;
            }
            .top-verification-bar,
            .transcript-btn-wrap,
            #lookupModal {
                display: none !important;
            }
            .a4-wrapper {
                max-width: 100%;
                margin: 0;
            }
            .a4-page {
                position: relative;
                transform: none !important;
                box-shadow: none;
                page-break-after: always;
            }
        }
    </style>
</head>

<body>
    <!-- ═══ TOP VERIFICATION BAR ═════════════════════════════════════════════ -->
    <div class="top-verification-bar">
        <div class="top-bar-content">
            <a href="https://ideas.edu.vn" target="_blank" style="display: flex; align-items: center; text-decoration: none;">
                <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg-optimized.webp" alt="IDEAS Logo" class="ideas-logo" style="height: 44px; width: auto; object-fit: contain;">
            </a>
            <div class="verification-badge">
                <svg class="verify-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M9 12l2 2 4-4"></path>
                </svg>
                <span class="verification-text" id="verifyStatusText">VERIFIED</span>
            </div>
        </div>
    </div>

    <!-- ═══ LOOKUP MODAL / HERO PORTAL ═══════════════════════════════════════ -->
    <div id="lookupModal" style="display: none;">
        <div class="lookup-box">
            <div class="lookup-logo-wrap">
                <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg-optimized.webp" alt="IDEAS Logo" style="height: 48px; width: auto; object-fit: contain;">
            </div>
            <h3>Tra Cứu & Xác Thực Chứng Chỉ</h3>
            <p class="lookup-desc">Nhập Email hoặc Mã chứng chỉ để xem hồ sơ chứng nhận chính thức từ Học viện IDEAS.</p>

            <!-- Tab Buttons (Clean, No Emojis) -->
            <div class="lookup-tabs">
                <button type="button" class="lookup-tab-btn active" data-tab="tab-email">Xác thực qua Email (OTP)</button>
                <button type="button" class="lookup-tab-btn" data-tab="tab-code">Tra cứu theo Mã số</button>
            </div>

            <!-- Tab 1: Email OTP -->
            <div id="tab-email" class="tab-panel active">
                <!-- Step 1: Input Email -->
                <div id="emailStep1">
                    <div class="form-group">
                        <label class="form-label" for="lookupEmail">Email đăng ký tham gia đào tạo</label>
                        <input type="email" id="lookupEmail" class="input-control" placeholder="Ví dụ: name@kodainternational.com" />
                    </div>
                    <button type="button" id="btnSendEmailOtp" class="btn-action-main">
                        <span>Gửi mã xác thực OTP</span>
                    </button>
                    <p id="emailStatus1" class="status-msg"></p>
                </div>

                <!-- Step 2: Input OTP -->
                <div id="emailStep2" style="display: none;">
                    <div class="otp-info-banner">
                        Mã OTP đã được gửi đến: <strong id="sentMaskedEmail"></strong>.<br>Vui lòng kiểm tra hộp thư đến (hoặc Spam).
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="lookupEmailOtp">Nhập mã OTP 6 số</label>
                        <input type="text" id="lookupEmailOtp" maxlength="6" class="input-control input-otp-main" placeholder="••••••" />
                    </div>
                    <button type="button" id="btnVerifyEmailOtp" class="btn-action-main">
                        <span>Xác thực & Mở Chứng Chỉ</span>
                    </button>
                    <div class="otp-actions-sub">
                        <a id="btnResendOtp">Gửi lại mã OTP</a>
                        <a id="btnChangeEmail">Đổi email khác</a>
                    </div>
                    <p id="emailStatus2" class="status-msg"></p>
                </div>
            </div>

            <!-- Tab 2: Direct Code Lookup -->
            <div id="tab-code" class="tab-panel">
                <div class="form-group">
                    <label class="form-label" for="lookupCode">Mã chứng chỉ / CCCD / ID Học viên</label>
                    <input type="text" id="lookupCode" class="input-control" placeholder="Ví dụ: IDEAS-KODA-001 hoặc KODA-001" />
                </div>
                <button type="button" id="btnLookupCode" class="btn-action-main">
                    <span>Tra cứu ngay</span>
                </button>
                <p id="codeStatus" class="status-msg"></p>
            </div>
        </div>
    </div>

    <!-- ═══ CANVAS WRAPPER ════════════════════════════════════════════════════ -->
    <div class="a4-wrapper" id="certificateWrapper">
        <div class="a4-page" id="certificatePage">
            <!-- Background Image Placement -->
            <div class="page-background" id="bgLayer"></div>
            <div class="page-content dynamic-layer" id="renderContainer">
                <!-- JavaScript will dynamically render coordinates here -->
            </div>
        </div>
    </div>

    <!-- ═══ "Xem Bảng Điểm" button below certificate ═════════════════════ -->
    <div class="transcript-btn-wrap" style="display: none;">
        <a id="transcriptLink" href="#" class="btn-transcript">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
                <polyline points="10 9 9 9 8 9"></polyline>
            </svg>
            <div class="btn-transcript-label">
                <span>Xem Bảng Điểm</span>
                <span class="btn-transcript-sub">Xác thực qua email · OTP 6 số</span>
            </div>
        </a>
    </div>

    <script type="text/javascript">
        var ajaxurl = "<?php echo esc_url(admin_url('admin-ajax.php')); ?>";

        document.addEventListener('DOMContentLoaded', async () => {
            const urlParams = new URLSearchParams(window.location.search);
            const cerId = urlParams.get('id') || urlParams.get('cer_id');

            // Wire up Transcript Page URL
            const transcriptLink = document.getElementById('transcriptLink');
            if (transcriptLink) {
                transcriptLink.href = `/verify?action=transcript&id=${encodeURIComponent(cerId || '')}`;
            }

            // Setup Tab Switchers
            document.querySelectorAll('.lookup-tab-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelectorAll('.lookup-tab-btn').forEach(b => b.classList.remove('active'));
                    document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
                    btn.classList.add('active');
                    const tabId = btn.getAttribute('data-tab');
                    const panel = document.getElementById(tabId);
                    if (panel) panel.classList.add('active');
                });
            });

            // ═══ TAB 1: EMAIL OTP FLOW ══════════════════════════════════════
            const btnSendEmailOtp = document.getElementById('btnSendEmailOtp');
            const btnVerifyEmailOtp = document.getElementById('btnVerifyEmailOtp');
            const btnResendOtp = document.getElementById('btnResendOtp');
            const btnChangeEmail = document.getElementById('btnChangeEmail');
            const emailInput = document.getElementById('lookupEmail');
            const otpInput = document.getElementById('lookupEmailOtp');
            const emailStep1 = document.getElementById('emailStep1');
            const emailStep2 = document.getElementById('emailStep2');
            const emailStatus1 = document.getElementById('emailStatus1');
            const emailStatus2 = document.getElementById('emailStatus2');
            const sentMaskedEmail = document.getElementById('sentMaskedEmail');

            let currentEmail = '';

            async function handleSendOtp() {
                const email = emailInput.value.trim();
                if (!email || !email.includes('@')) {
                    emailStatus1.textContent = 'Vui lòng nhập địa chỉ email hợp lệ.';
                    emailStatus1.style.display = 'block';
                    return;
                }

                btnSendEmailOtp.disabled = true;
                btnSendEmailOtp.innerHTML = '<span>Đang gửi mã OTP...</span>';
                emailStatus1.style.display = 'none';

                try {
                    const res = await fetch(`${ajaxurl}?action=ideas_verify_send_email_otp`, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({
                            email: email
                        })
                    });
                    const data = await res.json();
                    if (data.success && data.data) {
                        currentEmail = email;
                        sentMaskedEmail.textContent = data.data.masked_email || email;
                        emailStep1.style.display = 'none';
                        emailStep2.style.display = 'block';
                        otpInput.value = '';
                        otpInput.focus();
                    } else {
                        emailStatus1.textContent = (data.data && data.data.error) || 'Không tìm thấy chứng chỉ liên kết với email này.';
                        emailStatus1.style.display = 'block';
                    }
                } catch (err) {
                    emailStatus1.textContent = 'Lỗi kết nối máy chủ. Vui lòng thử lại sau.';
                    emailStatus1.style.display = 'block';
                } finally {
                    btnSendEmailOtp.disabled = false;
                    btnSendEmailOtp.innerHTML = '<span>Gửi mã xác thực OTP</span>';
                }
            }

            if (btnSendEmailOtp) btnSendEmailOtp.addEventListener('click', handleSendOtp);
            if (emailInput) {
                emailInput.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter') handleSendOtp();
                });
            }

            if (btnResendOtp) {
                btnResendOtp.addEventListener('click', async () => {
                    if (!currentEmail) return;
                    btnResendOtp.textContent = 'Đang gửi lại...';
                    try {
                        const res = await fetch(`${ajaxurl}?action=ideas_verify_send_email_otp`, {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({
                                email: currentEmail
                            })
                        });
                        const data = await res.json();
                        if (data.success) {
                            emailStatus2.textContent = 'Đã gửi lại mã OTP thành công!';
                            emailStatus2.style.color = '#166534';
                            emailStatus2.style.display = 'block';
                            setTimeout(() => { emailStatus2.style.display = 'none'; emailStatus2.style.color = 'var(--red)'; }, 4000);
                        }
                    } catch (e) {}
                    btnResendOtp.textContent = 'Gửi lại mã OTP';
                });
            }

            if (btnChangeEmail) {
                btnChangeEmail.addEventListener('click', () => {
                    emailStep2.style.display = 'none';
                    emailStep1.style.display = 'block';
                    emailStatus1.style.display = 'none';
                });
            }

            async function handleVerifyOtp() {
                const otp = otpInput.value.trim();
                if (!otp || otp.length < 4) {
                    emailStatus2.textContent = 'Vui lòng nhập đầy đủ mã OTP 6 số.';
                    emailStatus2.style.display = 'block';
                    return;
                }

                btnVerifyEmailOtp.disabled = true;
                btnVerifyEmailOtp.innerHTML = '<span>Đang xác thực...</span>';
                emailStatus2.style.display = 'none';

                try {
                    const res = await fetch(`${ajaxurl}?action=ideas_verify_verify_email_otp`, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({
                            email: currentEmail,
                            otp: otp
                        })
                    });
                    const data = await res.json();
                    if (data.success && data.data && data.data.cer_no) {
                        // Redirect to the public certificate URL
                        window.location.href = '?id=' + encodeURIComponent(data.data.cer_no);
                    } else {
                        emailStatus2.textContent = (data.data && data.data.error) || 'Mã OTP không chính xác.';
                        emailStatus2.style.display = 'block';
                    }
                } catch (err) {
                    emailStatus2.textContent = 'Lỗi xác thực máy chủ. Thử lại sau.';
                    emailStatus2.style.display = 'block';
                } finally {
                    btnVerifyEmailOtp.disabled = false;
                    btnVerifyEmailOtp.innerHTML = '<span>Xác thực & Mở Chứng Chỉ</span>';
                }
            }

            if (btnVerifyEmailOtp) btnVerifyEmailOtp.addEventListener('click', handleVerifyOtp);
            if (otpInput) {
                otpInput.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter') handleVerifyOtp();
                });
            }

            // ═══ TAB 2: DIRECT CODE LOOKUP ══════════════════════════════════
            const btnLookupCode = document.getElementById('btnLookupCode');
            const codeInput = document.getElementById('lookupCode');
            const codeStatus = document.getElementById('codeStatus');

            async function handleDirectLookup() {
                const code = codeInput.value.trim();
                if (!code) {
                    codeStatus.textContent = 'Vui lòng nhập mã chứng chỉ / CCCD / ID Học viên.';
                    codeStatus.style.display = 'block';
                    return;
                }

                btnLookupCode.disabled = true;
                btnLookupCode.innerHTML = '<span>Đang tra cứu...</span>';
                codeStatus.style.display = 'none';

                try {
                    const res = await fetch(`${ajaxurl}?action=ideas_verify_lookup`, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({
                            code: code
                        })
                    });
                    const data = await res.json();
                    if (data.success && data.data && data.data.cer_no) {
                        window.location.href = '?id=' + encodeURIComponent(data.data.cer_no);
                    } else {
                        codeStatus.textContent = (data.data && data.data.error) || 'Không tìm thấy chứng chỉ phù hợp.';
                        codeStatus.style.display = 'block';
                    }
                } catch (err) {
                    codeStatus.textContent = 'Lỗi kết nối máy chủ.';
                    codeStatus.style.display = 'block';
                } finally {
                    btnLookupCode.disabled = false;
                    btnLookupCode.innerHTML = '<span>Tra cứu ngay</span>';
                }
            }

            if (btnLookupCode) btnLookupCode.addEventListener('click', handleDirectLookup);
            if (codeInput) {
                codeInput.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter') handleDirectLookup();
                });
            }

            // ═══ CERTIFICATE LOADING / DISPLAY ══════════════════════════════
            const cerIdsParam = urlParams.get('cer_ids') || urlParams.get('ids');
            if (!cerId && !cerIdsParam) {
                const certWrapper = document.getElementById('certificateWrapper');
                const transcriptWrap = document.querySelector('.transcript-btn-wrap');
                const lookupModal = document.getElementById('lookupModal');
                if (certWrapper) certWrapper.style.display = 'none';
                if (transcriptWrap) transcriptWrap.style.display = 'none';
                if (lookupModal) lookupModal.style.display = 'flex';
                return;
            }

            // Fetch Certificate Details from WP AJAX
            try {
                const idsParam = cerIdsParam || cerId;
                const cerIdsList = idsParam ? idsParam.split(',') : [''];

                if (urlParams.get('print') === '1') {
                    const topBar = document.querySelector('.top-verification-bar');
                    const transcriptBtnWrap = document.querySelector('.transcript-btn-wrap');
                    if (topBar) topBar.style.display = 'none';
                    if (transcriptBtnWrap) transcriptBtnWrap.style.display = 'none';
                }

                const fetches = cerIdsList.map(id => 
                    fetch(`${ajaxurl}?action=ideas_verify_get_cert&id=${encodeURIComponent(id)}`)
                    .then(r => r.json())
                );
                const results = await Promise.all(fetches);

                const validDataList = [];
                results.forEach((res) => {
                    if (res.success && res.data) validDataList.push(res.data);
                });

                if (validDataList.length === 0) {
                    console.error("Certificate lookup failed");
                    const certWrapper = document.getElementById('certificateWrapper');
                    const transcriptWrap = document.querySelector('.transcript-btn-wrap');
                    const lookupModal = document.getElementById('lookupModal');
                    if (certWrapper) certWrapper.style.display = 'none';
                    if (transcriptWrap) transcriptWrap.style.display = 'none';
                    if (lookupModal) {
                        lookupModal.style.display = 'flex';
                        codeStatus.textContent = 'Không tìm thấy chứng chỉ với mã yêu cầu.';
                        codeStatus.style.display = 'block';
                    }
                    return;
                }

                // Hide Lookup Modal
                const lookupModal = document.getElementById('lookupModal');
                if (lookupModal) lookupModal.style.display = 'none';

                // Display Verification Header Text
                const verifyEl = document.getElementById('verifyStatusText');
                if (verifyEl && validDataList.length > 0) {
                    verifyEl.textContent = `VERIFIED: ${validDataList[0].cer_no || validDataList[0].cert_number}`;
                }

                const parent = document.getElementById('certificateWrapper').parentElement;
                const template = document.getElementById('certificateWrapper');
                template.style.display = 'none'; 

                validDataList.forEach((data, index) => {
                    const clone = template.cloneNode(true);
                    clone.id = 'certificateWrapper_' + index;
                    clone.style.display = 'flex';

                    const layer = clone.querySelector('.dynamic-layer') || clone.querySelector('.page-content');
                    const bgEl = clone.querySelector('.page-background');

                    parent.insertBefore(clone, document.querySelector('.transcript-btn-wrap'));

                    renderCertificateInstance(data, layer, bgEl);
                });

                // Display Transcript Button ONLY if transcript background & courses exist
                const transcriptWrap = document.querySelector('.transcript-btn-wrap');
                if (transcriptWrap) {
                    if (validDataList.length === 1 && validDataList[0].bg_transcript && validDataList[0].courses && validDataList[0].courses.length > 0) {
                        transcriptWrap.style.display = 'flex';
                    } else {
                        transcriptWrap.style.display = 'none';
                    }
                }

                if (urlParams.get('print') === '1') {
                    setTimeout(() => {
                        window.print();
                        window.setTimeout(() => window.close(), 1000);
                    }, 1500);
                }
            } catch (error) {
                console.error("Error communicating with Server API:", error);
                alert("Lỗi kết nối tới máy chủ tải dữ liệu.");
            }
        });

        function renderCertificateInstance(data, layer, bgEl) {
            let config = {};
            if (data.config_cert) {
                try { config = typeof data.config_cert === 'string' ? JSON.parse(data.config_cert) : data.config_cert; } catch(e){}
            }
            if (data.bg_cert && bgEl) {
                bgEl.style.backgroundImage = `url('${resolveBgUrl(data.bg_cert)}')`;
            }

            if (!layer) return;
            if (Object.keys(config).length === 0) {
                layer.innerHTML = '<div style="padding:40px; text-align:center; color:red; margin-top:200px; font-weight:bold;">Chưa thiết lập Template Thiết Kế cho Chứng Chỉ này.</div>';
                return;
            }
            layer.innerHTML = ''; 
            
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
                
                if (k === 'qr_code') {
                    const qrWrap = document.createElement('div');
                    qrWrap.style.cssText = "width:100%; height:100%; display:flex; justify-content:inherit; align-items:center;";
                    el.appendChild(qrWrap);
                    layer.appendChild(el);

                    if(typeof QRCode !== 'undefined') {
                        new QRCode(qrWrap, {
                            text: window.location.origin + "/verify?id=" + encodeURIComponent(data.cer_no || ''),
                            width: 256,
                            height: 256,
                            colorDark : box.color || "#000000",
                            colorLight : "transparent",
                            correctLevel : QRCode.CorrectLevel.M
                        });

                        const canvas = qrWrap.querySelector('canvas');
                        const img = qrWrap.querySelector('img');
                        if (canvas) canvas.style.cssText = "max-width: 100%; max-height: 100%; object-fit: contain;";
                        if (img) img.style.cssText = "max-width: 100%; max-height: 100%; object-fit: contain;";
                    }
                    return;
                }
                
                let val = '';
                let prefix = (box.showLabel !== false && box.label && k !== 'course_name' && k !== 'course_title') ? box.label + " " : "";

                if (k === 'name') val = data.name || "N/A";
                else if (k === 'student_id' || k === 'id_no') val = prefix + (data.student_id || "N/A");
                else if (k === 'cer_no') val = prefix + (data.cer_no || data.cert_number || "N/A");
                else if (k === 'date') val = prefix + (data.date || "N/A");
                else if (k === 'course_name' || k === 'course_title') val = (data.course_name || box.label || "AI Awareness Training");
                else val = box.label || '';

                const escapeHTML = str => String(str).replace(/[&<>'"]/g, tag => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#39;', '"': '&quot;' }[tag] || tag));

                el.innerHTML = `<span style="font-family:${box.fontFamily || "'Plus Jakarta Sans', sans-serif"}; font-size:${box.fontSize}px; color:${box.color || '#1a1a1a'}; font-weight:${box.weight}; text-align:${box.align}; white-space:nowrap;">${escapeHTML(val)}</span>`;
                
                layer.appendChild(el);
                const span = el.querySelector('span');
                if (span && k !== 'name') {
                    requestAnimationFrame(() => {
                        if (span.scrollWidth > el.clientWidth && el.clientWidth > 0) {
                            const scale = el.clientWidth / span.scrollWidth;
                            span.style.transform = `scale(${scale})`;
                            span.style.transformOrigin = alignMap[box.align || 'left'] + ' center';
                        }
                    });
                }
            });

            // Status Overlay (Paused or Locked)
            if (data.status === 'paused' || data.status === 'locked') {
                const escapeHTML = str => String(str).replace(/[&<>'"]/g, tag => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#39;', '"': '&quot;' }[tag] || tag));
                
                const studentName = `<div style="font-size:20px; font-weight:600; color:#1f2937; margin-bottom:12px;">Học viên: ${escapeHTML(data.name || 'N/A')}</div>`;
                const reason = data.paused_reason ? `<div style="font-size:16px; font-weight:normal; margin-top:4px; color:#4b5563;">Lý do: ${escapeHTML(data.paused_reason)}</div>` : '';
                const until = (data.status === 'paused' && data.paused_until) ? `<div style="font-size:16px; font-weight:normal; margin-top:8px; color:#d97706;">Tạm dừng đến: ${escapeHTML(data.paused_until)}</div>` : '';
                
                const overlay = document.createElement('div');
                overlay.style.cssText = "position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(255,255,255,0.92); backdrop-filter:blur(4px); z-index:9999; display:flex; flex-direction:column; align-items:center; justify-content:center; text-align:center; padding:40px;";
                overlay.innerHTML = `
                    <div style="font-family:'Plus Jakarta Sans', sans-serif;">
                        ${studentName}
                        <div style="font-weight:bold; font-size:24px; color:${data.status==='paused'?'#b45309':'#b91c1c'}; margin-bottom:12px;">Hồ sơ này đang ở trạng thái ${data.status === 'paused' ? 'Tạm dừng (Pending)' : 'Khóa (Locked)'}</div>
                        ${until}
                        ${reason}
                    </div>
                `;
                layer.appendChild(overlay);
                
                const transcriptBtnWrap = document.querySelector('.transcript-btn-wrap');
                if (transcriptBtnWrap) transcriptBtnWrap.style.display = 'none';
            }
        }

        function resizeCertificate() {
            const wrappers = document.querySelectorAll('.a4-wrapper');
            wrappers.forEach(wrap => {
                const containerWidth = wrap.clientWidth;
                const scale = containerWidth / 794;
                wrap.style.setProperty('--scale', scale);
            });
        }

        window.addEventListener('resize', resizeCertificate);
        window.addEventListener('load', resizeCertificate);

        function resolveBgUrl(url) {
            if (!url) return '';
            if (url.startsWith('http://') || url.startsWith('https://')) return url;
            return url.startsWith('/') ? url : '/' + url;
        }
    </script>
</body>
</html>