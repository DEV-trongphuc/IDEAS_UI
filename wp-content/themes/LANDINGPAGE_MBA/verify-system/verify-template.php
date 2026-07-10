<?php
// verify-template.php - Public Certificate Verification Page
if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác thực Chứng chỉ - IDEAS Verification</title>
    <link rel="icon" href="/wp-content/uploads/external-migrated/angry_icon_d339ae28.webp" sizes="32x32" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Pinyon+Script&display=swap" rel="stylesheet">
    
    <!-- QRCode JS Library -->
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
        }

        body {
            background-color: #f8fafc;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            font-family: 'Plus Jakarta Sans', sans-serif;
            padding: 100px 20px 40px;
            overflow-x: hidden;
            width: 100%;
        }

        /* ═══ TOP VERIFICATION BAR ═════════════════════════════════════════════ */
        .top-verification-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            z-index: 1000;
            padding: 12px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .top-bar-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .ideas-logo {
            height: 40px;
            object-fit: contain;
        }

        .verification-badge {
            display: flex;
            align-items: center;
            background: #f0fdf4;
            padding: 8px 16px;
            border-radius: 50px;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .verify-icon {
            width: 20px;
            height: 20px;
            margin-right: 8px;
            stroke: #166534;
        }

        .verification-text {
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        /* ═══ LOOKUP MODAL ═══════════════════════════════════════════════════════ */
        #lookupModal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(4px);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lookup-box {
            background: white;
            padding: 40px;
            border-radius: 16px;
            max-width: 440px;
            width: 90%;
            text-align: center;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            border: 1px solid #f1f5f9;
        }

        .lookup-logo-wrap {
            margin-bottom: 24px;
        }

        .lookup-logo-wrap img {
            height: 48px;
        }

        .lookup-box h3 {
            margin-bottom: 12px;
            font-size: 20px;
            color: #0f172a;
            font-weight: 800;
        }

        .lookup-box p {
            margin-bottom: 24px;
            font-size: 14px;
            color: #64748b;
            line-height: 1.5;
        }

        .input-control {
            width: 100%;
            padding: 14px 18px;
            border: 1.5px solid #cbd5e1;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 15px;
            font-family: inherit;
            outline: none;
            transition: all 0.2s;
        }

        .input-control:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 3px rgba(171, 14, 0, 0.1);
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

        .btn-transcript:disabled {
            background: #94a3b8;
            box-shadow: none;
            cursor: not-allowed;
            transform: none;
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
            width: 100%;
            max-width: var(--a4-width);
            position: relative;
            margin: 0 auto;
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
            <img src="/wp-content/uploads/external-migrated/angry_icon_d339ae28.webp" alt="IDEAS Logo" class="ideas-logo">
            <div class="verification-badge">
                <svg class="verify-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M9 12l2 2 4-4"></path>
                </svg>
                <span class="verification-text" id="verifyStatusText">VERIFIED</span>
            </div>
        </div>
    </div>

    <!-- ═══ LOOKUP MODAL ═══════════════════════════════════════════════════════ -->
    <div id="lookupModal" style="display: none;">
        <div class="lookup-box">
            <div class="lookup-logo-wrap">
                <img src="/wp-content/uploads/external-migrated/angry_icon_d339ae28.webp" alt="IDEAS Logo">
            </div>
            <h3>Tra cứu Chứng chỉ</h3>
            <p>Vui lòng nhập ID Student / CCCD của học viên hoặc mã số chứng chỉ để tiếp tục.</p>
            <input type="text" id="lookupCode" class="input-control" placeholder="Nhập ID Student / CCCD / Mã chứng chỉ" />
            <button id="btnLookup" class="btn-transcript" style="width: 100%;">Tra cứu</button>
            <p id="lookupStatus" style="font-size: 13px; color: var(--red); display: none; margin-top: 14px; font-weight: 600;"></p>
        </div>
    </div>

    <!-- ═══ CANVAS WRAPPER ════════════════════════════════════════════════════ -->
    <div class="a4-wrapper" id="certificateWrapper">
        <div class="a4-page" id="certificatePage">
            <!-- Background Image Placement -->
            <div class="page-background" id="bgLayer"></div>
            <div class="page-content" id="renderContainer">
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
            const cerId = urlParams.get('cer_id');

            // Wire up Transcript Page URL
            const transcriptLink = document.getElementById('transcriptLink');
            if (transcriptLink) {
                const transcriptUrl = cerId
                    ? `/verify/transcript.html?cer_id=${encodeURIComponent(cerId)}`
                    : '/verify/transcript.html';
                // Wait! Since we are implementing transcript page in WordPress routing, 
                // we can redirect it to /verify?action=transcript&cer_id=... or a direct custom route /verify/transcript
                // Let's redirect to: /verify?action=transcript&cer_id=cer_id
                transcriptLink.href = `/verify?action=transcript&cer_id=${encodeURIComponent(cerId || '')}`;
            }

            // Lookup Modal Logic
            const btnLookup = document.getElementById('btnLookup');
            if (btnLookup) {
                btnLookup.addEventListener('click', async () => {
                    const code = document.getElementById('lookupCode')?.value.trim();
                    const statusEl = document.getElementById('lookupStatus');

                    if (!code) {
                        if (statusEl) {
                            statusEl.textContent = 'Vui lòng nhập mã ID';
                            statusEl.style.display = 'block';
                        }
                        return;
                    }

                    btnLookup.disabled = true;
                    btnLookup.textContent = 'Đang tra cứu...';
                    if (statusEl) statusEl.style.display = 'none';

                    try {
                        const res = await fetch(ajaxurl, {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({
                                action: 'ideas_verify_lookup',
                                code: code
                            })
                        });
                        const data = await res.json();
                        
                        // Wait! WordPress wp_send_json responds with { success: true/false, data: { ... } }
                        if (data.success && data.data && data.data.cer_no) {
                            window.location.href = '?cer_id=' + encodeURIComponent(data.data.cer_no);
                        } else {
                            if (statusEl) {
                                statusEl.textContent = ((data.data && data.data.error) || 'Không tìm thấy dữ liệu.');
                                statusEl.style.display = 'block';
                            }
                            btnLookup.disabled = false;
                            btnLookup.textContent = 'Tra cứu';
                        }
                    } catch (err) {
                        if (statusEl) {
                            statusEl.textContent = 'Lỗi kết nối. Thử lại sau.';
                            statusEl.style.display = 'block';
                        }
                        btnLookup.disabled = false;
                        btnLookup.textContent = 'Tra cứu';
                    }
                });
            }

            const cerIdsParam = urlParams.get('cer_ids');
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
                    fetch(`${ajaxurl}?action=ideas_verify_get_cert&cer_id=${encodeURIComponent(id)}`)
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
                        const statusEl = document.getElementById('lookupStatus');
                        if (statusEl) {
                            statusEl.textContent = 'Không tìm thấy dữ liệu chứng chỉ. Bạn hãy thử nhập lại ID.';
                            statusEl.style.display = 'block';
                        }
                    } else {
                        alert("Không tìm thấy dữ liệu chứng chỉ!");
                    }
                    return;
                }

                const verifyEl = document.getElementById('verifyStatusText');
                if (verifyEl && validDataList.length === 1) {
                    verifyEl.textContent = `VERIFIED: ${validDataList[0].cer_no || validDataList[0].cert_number}`;
                }

                const parent = document.getElementById('certificateWrapper').parentElement;
                const template = document.getElementById('certificateWrapper');
                template.style.display = 'none';

                validDataList.forEach((data, index) => {
                    const clone = template.cloneNode(true);
                    clone.id = 'certificateWrapper_' + index;
                    clone.style.display = 'block';
                    clone.style.pageBreakAfter = 'always';

                    const layer = clone.querySelector('.page-content');
                    layer.id = 'renderContainer_' + index;
                    
                    const bgEl = clone.querySelector('.page-background');

                    parent.insertBefore(clone, document.querySelector('.transcript-btn-wrap'));

                    renderCertificateInstance(data, layer, bgEl);
                });

                // Display Transcript Button
                const transcriptWrap = document.querySelector('.transcript-btn-wrap');
                if (transcriptWrap && validDataList.length === 1) {
                    transcriptWrap.style.display = 'flex';
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
                            text: window.location.origin + "/verify/?cer_id=" + encodeURIComponent(data.cer_no || ''),
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
                let prefix = (box.showLabel !== false && box.label) ? box.label + " " : "";

                if (k === 'name') val = data.name || "N/A";
                else if (k === 'student_id' || k === 'id_no') val = prefix + (data.student_id || "N/A");
                else if (k === 'cer_no') val = prefix + (data.cer_no || data.cert_number || "N/A");
                else if (k === 'date') val = prefix + (data.date || "N/A");
                else val = box.label || '';

                const escapeHTML = str => String(str).replace(/[&<>'"]/g, tag => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#39;', '"': '&quot;' }[tag] || tag));

                el.innerHTML = `<span style="font-family:${box.fontFamily || "'Plus Jakarta Sans', sans-serif"}; font-size:${box.fontSize}px; color:${box.color || '#1a1a1a'}; font-weight:${box.weight}; text-align:${box.align}; white-space:nowrap; transform-origin:center center;">${escapeHTML(val)}</span>`;
                
                layer.appendChild(el);
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
            const availableWidth = document.documentElement.clientWidth - 40;
            wrappers.forEach(wrapper => {
                let targetWidth = Math.min(availableWidth, 794);
                wrapper.style.setProperty('--scale', targetWidth / 794);
            });
        }
        window.addEventListener('resize', resizeCertificate);
        setTimeout(resizeCertificate, 50);
        resizeCertificate();

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
    </script>
</body>
</html>
