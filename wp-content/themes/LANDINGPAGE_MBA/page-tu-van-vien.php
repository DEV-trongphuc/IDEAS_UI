<?php
/**
 * The template for displaying the Advisor Verification page
 * Template Name: Advisor Verification Template
 */
global $wp;

// Block unwanted old theme styles
ob_start(function ($html) {
    $html = preg_replace(
        '/<link[^>]+href=[\'"][^\'"]*LANDINGPAGE_MBA\/main\.css[^\'"]*[\'"][^>]*\/?>/i',
        '<!-- [BLOCKED: LANDINGPAGE_MBA/main.css] -->',
        $html
    );
    return $html;
});
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: https://ogp.me/ns#">

<head>
    <!-- Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QKV7LKNLLH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-QKV7LKNLLH');
        gtag('config', 'AW-11205917800');
    </script>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="dns-prefetch" href="https://www.googletagmanager.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title>Xác thực tư vấn viên tuyển sinh | IDEAS</title>
        <meta name="description" content="Trang xác thực danh tính tư vấn viên tuyển sinh chính thức của IDEAS. Kiểm tra nhanh số điện thoại tránh mạo danh và lừa đảo học viên." />
    <?php endif; ?>
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Xác thực tư vấn viên tuyển sinh | IDEAS" />
        <meta property="og:description" content="Hệ thống tra cứu số điện thoại và xác định danh tính tư vấn viên tuyển sinh chính thức của Viện IDEAS." />
        <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />
    <?php endif; ?>

    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <!-- Main stylesheet -->
    <?php
    $css_path = get_stylesheet_directory() . '/common-assets/css/style.min.css';
    $css_version = file_exists($css_path) ? filemtime($css_path) : time();
    ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/style.min.css?v=<?php echo $css_version; ?>" />

    <!-- Booking Modal stylesheet -->
    <?php
    define('BOOKING_MODAL_CSS_LOADED', true);
    $bk_css_path = get_stylesheet_directory() . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/booking-modal.min.css?v=<?php echo $bk_css_version; ?>" />

    <style>
        html, body {
            overflow-x: clip !important;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }

        /* Hero Banner Section */
        .verify-hero {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: #ffffff;
            padding: 160px 20px 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .verify-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle at 80% 20%, rgba(171, 14, 0, 0.15) 0%, transparent 50%);
            pointer-events: none;
        }

        .verify-hero-container {
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .verify-badge {
            background: rgba(171, 14, 0, 0.15);
            border: 1px solid rgba(255, 77, 77, 0.3);
            padding: 8px 18px;
            border-radius: 100px;
            color: #ffcccc;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
        }

        .verify-hero h1 {
            font-size: clamp(2.2rem, 5vw, 3.5rem);
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 16px;
            letter-spacing: -0.02em;
        }

        .verify-hero h1 span {
            color: #ff3b30;
            background: linear-gradient(135deg, #ff8a80 0%, #ff3b30 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .verify-hero p {
            font-size: 1.05rem;
            line-height: 1.6;
            color: #cbd5e1;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Search Section */
        .search-section {
            margin-top: -40px;
            padding: 0 20px;
            position: relative;
            z-index: 10;
        }

        .search-container {
            max-width: 720px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
            border: 1px solid rgba(148, 163, 184, 0.15);
        }

        .search-label {
            display: block;
            font-size: 0.95rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 12px;
            text-align: left;
        }

        .search-input-wrap {
            display: flex;
            gap: 12px;
            position: relative;
        }

        .search-input-field {
            flex: 1;
            padding: 16px 20px 16px 48px;
            font-size: 1.05rem;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            outline: none;
            transition: all 0.3s ease;
            font-family: inherit;
            color: #1e293b;
        }

        .search-input-field:focus {
            border-color: #ab0e00;
            box-shadow: 0 0 0 4px rgba(171, 14, 0, 0.1);
        }

        .search-icon-decor {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1.2rem;
            pointer-events: none;
        }

        .btn-search-verify {
            background: #ab0e00;
            color: #ffffff;
            border: none;
            padding: 16px 28px;
            font-size: 0.95rem;
            font-weight: 700;
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-search-verify:hover {
            background: #8b0c00;
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(171, 14, 0, 0.25);
        }

        /* Result Section */
        .results-container {
            max-width: 720px;
            margin: 24px auto 0;
            display: none; /* Controlled by JS */
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.4s ease;
        }

        .results-container.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .result-card {
            border-radius: 24px;
            padding: 24px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
            border: 2px solid transparent;
        }

        .result-card.success {
            background: #f0fdf4;
            border-color: #bbf7d0;
            color: #166534;
        }

        .result-card.error {
            background: #fef2f2;
            border-color: #fecaca;
            color: #991b1b;
        }

        .result-status-header {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 800;
            font-size: 1.15rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 16px;
        }

        .result-status-header i {
            font-size: 1.4rem;
        }

        .result-desc {
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        /* Searched Consultant Card Layout inside result */
        .matched-consultant-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
        }

        .matched-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ab0e00;
        }

        .matched-info {
            flex: 1;
            text-align: left;
        }

        .matched-name {
            font-size: 1.2rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .matched-role {
            font-size: 0.85rem;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: block;
            margin-bottom: 8px;
        }

        .matched-phone {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 1rem;
            color: #1e293b;
        }

        .matched-phone i {
            color: #ab0e00;
        }

        .matched-phone strong {
            color: #ab0e00;
            font-size: 1.1rem;
        }

        .verified-badge-pill {
            background: #dcfce7;
            color: #15803d;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 100px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            margin-top: 6px;
        }

        /* Warning section */
        .warning-notice-bar {
            max-width: 1000px;
            margin: 60px auto 0;
            background: #fffbeb;
            border: 1px solid #fde68a;
            border-radius: 20px;
            padding: 20px;
            display: flex;
            gap: 16px;
            align-items: flex-start;
            color: #92400e;
        }

        .warning-notice-bar i {
            font-size: 1.5rem;
            color: #d97706;
            margin-top: 2px;
        }

        .warning-notice-bar h4 {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .warning-notice-bar p {
            font-size: 0.9rem;
            line-height: 1.5;
            margin: 0;
        }

        /* List Section */
        .list-section {
            max-width: 1000px;
            margin: 80px auto;
            padding: 0 20px;
        }

        .list-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .list-header h2 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 12px;
            letter-spacing: -0.02em;
        }

        .list-header p {
            font-size: 1rem;
            color: #64748b;
        }

        .consultants-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .consultant-card {
            background: #ffffff;
            border: 1px solid rgba(148, 163, 184, 0.15);
            border-radius: 24px;
            padding: 24px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
            position: relative;
        }

        .consultant-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
            border-color: rgba(171, 14, 0, 0.2);
        }

        .consultant-avatar-wrap {
            position: relative;
            width: 100px;
            height: 100px;
            margin: 0 auto 18px;
        }

        .consultant-avatar {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid rgba(171, 14, 0, 0.08);
            transition: all 0.3s ease;
        }

        .consultant-card:hover .consultant-avatar {
            border-color: #ab0e00;
        }

        .consultant-card-name {
            font-size: 1.1rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .consultant-card-role {
            font-size: 0.8rem;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: block;
            margin-bottom: 12px;
        }

        .consultant-card-phone {
            background: #f8fafc;
            border: 1px dashed #cbd5e1;
            padding: 10px 14px;
            border-radius: 12px;
            font-size: 0.95rem;
            color: #334155;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 16px;
            transition: all 0.3s ease;
        }

        .consultant-card:hover .consultant-card-phone {
            background: rgba(171, 14, 0, 0.03);
            border-color: rgba(171, 14, 0, 0.3);
            color: #ab0e00;
        }

        .consultant-card-phone i {
            color: #94a3b8;
            transition: all 0.3s ease;
        }

        .consultant-card:hover .consultant-card-phone i {
            color: #ab0e00;
        }

        .consultant-card-phone strong {
            font-weight: 800;
        }

        .btn-card-action {
            display: block;
            width: 100%;
            padding: 10px;
            background: transparent;
            color: #ab0e00;
            border: 1.5px solid rgba(171, 14, 0, 0.3);
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
        }

        .btn-card-action:hover {
            background: #ab0e00;
            color: #ffffff;
            border-color: #ab0e00;
        }

        /* Payment Guidelines Section */
        .payment-guidelines-section {
            background: #ffffff;
            border-top: 1px solid rgba(148, 163, 184, 0.15);
            padding: 80px 20px;
        }

        .guidelines-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .guidelines-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
        }

        .guidelines-content h3 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 18px;
            letter-spacing: -0.02em;
        }

        .guidelines-content p {
            font-size: 1rem;
            line-height: 1.6;
            color: #475569;
            margin-bottom: 24px;
        }

        .guidelines-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .guidelines-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 0.95rem;
            line-height: 1.5;
            color: #334155;
            font-weight: 500;
        }

        .guidelines-list li i {
            color: #10b981;
            margin-top: 3px;
            font-size: 1.1rem;
        }

        .bank-details-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.01);
        }

        .bank-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 16px;
        }

        .bank-logo {
            font-size: 2rem;
            color: #ab0e00;
        }

        .bank-name {
            font-size: 1.15rem;
            font-weight: 800;
            color: #0f172a;
        }

        .bank-info-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.95rem;
        }

        .bank-info-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .bank-label {
            color: #64748b;
            font-weight: 500;
        }

        .bank-value {
            color: #0f172a;
            font-weight: 700;
            text-align: right;
        }

        .bank-value.highlight {
            color: #ab0e00;
        }

        /* Responsive Breakpoints */
        @media (max-width: 992px) {
            .consultants-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 16px;
            }

            .guidelines-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }
        }

        @media (max-width: 768px) {
            .verify-hero {
                padding: 120px 20px 60px;
            }

            .search-container {
                padding: 20px;
                border-radius: 20px;
            }

            .search-input-wrap {
                flex-direction: column;
                gap: 12px;
            }

            .btn-search-verify {
                width: 100%;
                justify-content: center;
            }

            .matched-consultant-card {
                flex-direction: column;
                text-align: center;
                padding: 24px;
            }

            .matched-info {
                text-align: center;
            }

            .warning-notice-bar {
                flex-direction: column;
                gap: 10px;
            }

            .list-section {
                margin: 50px auto;
            }

            .list-header {
                margin-bottom: 30px;
            }

            .payment-guidelines-section {
                padding: 50px 20px;
            }
        }

        @media (max-width: 480px) {
            .consultants-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Site Header -->
    <?php get_template_part('shared-header'); ?>

    <!-- Hero Section -->
    <section class="verify-hero">
        <div class="verify-hero-container">
            <div class="verify-badge">
                <i class="fa-solid fa-user-shield"></i>
                Bảo Mật &amp; Minh Bạch
            </div>
            <h1>Xác Thực <span>Tư Vấn Viên</span> Tuyển Sinh</h1>
            <p>Kiểm tra nhanh danh tính chuyên viên tư vấn chính thức của Viện IDEAS nhằm bảo vệ quyền lợi học tập và phòng ngừa các hình thức giả mạo hoặc lừa đảo.</p>
        </div>
    </section>

    <!-- Search Tool Section -->
    <section class="search-section">
        <div class="search-container">
            <label for="advisor-search" class="search-label">Nhập số điện thoại hoặc 3 số đuôi cần kiểm tra:</label>
            <div class="search-input-wrap">
                <i class="fa-solid fa-phone search-icon-decor"></i>
                <input type="text" id="advisor-search" class="search-input-field" placeholder="Ví dụ: 017, 953, 090...017">
                <button type="button" id="btn-verify" class="btn-search-verify">
                    <i class="fa-solid fa-user-check"></i>
                    Kiểm tra ngay
                </button>
            </div>

            <!-- Search Results Display Area -->
            <div id="search-results" class="results-container">
                <!-- Dynamically generated content will go here -->
            </div>
        </div>

        <!-- Warning Notice Bar -->
        <div class="warning-notice-bar">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <div>
                <h4>Cảnh báo phòng tránh mạo danh</h4>
                <p>Mọi yêu cầu chuyển khoản đóng học phí hoặc các khoản lệ phí tại Viện IDEAS chỉ được thực hiện thông qua tài khoản ngân hàng chính thức đứng tên <strong>VIỆN IDEAS</strong>. Chúng tôi tuyệt đối <strong>KHÔNG</strong> yêu cầu học viên chuyển khoản vào bất kỳ tài khoản cá nhân nào. Hãy cảnh giác với các cuộc gọi hoặc tin nhắn từ các số lạ mạo danh nhân viên IDEAS.</p>
            </div>
        </div>
    </section>

    <!-- Official Advisors Grid -->
    <section class="list-section">
        <div class="list-header">
            <h2>Đội Ngũ Tư Vấn Viên Chính Thức</h2>
            <p>Dưới đây là các chuyên viên tư vấn chính thức trực thuộc Khối Tuyển sinh và Trải nghiệm Học viên của IDEAS.</p>
        </div>

        <div class="consultants-grid">
            <!-- Advisor 1 -->
            <article class="consultant-card" data-suffix="017">
                <div class="consultant-avatar-wrap">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/cphuc.webp" class="consultant-avatar" alt="Lưu Phan Hoàng Phúc" loading="lazy">
                </div>
                <h3 class="consultant-card-name">Lưu Phan Hoàng Phúc</h3>
                <span class="consultant-card-role">Tư vấn viên tuyển sinh</span>
                <div class="consultant-card-phone">
                    <i class="fa-solid fa-phone"></i>
                    <span>*********<strong>017</strong></span>
                </div>
                <button type="button" class="btn-card-action" onclick="showform('tu_van_phuc')">Nhận tư vấn</button>
            </article>

            <!-- Advisor 2 -->
            <article class="consultant-card" data-suffix="953">
                <div class="consultant-avatar-wrap">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/cdan.webp" class="consultant-avatar" alt="Nguyễn Thị Linh Đan" loading="lazy">
                </div>
                <h3 class="consultant-card-name">Nguyễn Thị Linh Đan</h3>
                <span class="consultant-card-role">Tư vấn viên tuyển sinh</span>
                <div class="consultant-card-phone">
                    <i class="fa-solid fa-phone"></i>
                    <span>*********<strong>953</strong></span>
                </div>
                <button type="button" class="btn-card-action" onclick="showform('tu_van_dan')">Nhận tư vấn</button>
            </article>

            <!-- Advisor 3 -->
            <article class="consultant-card" data-suffix="486">
                <div class="consultant-avatar-wrap">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/nhi_avt.jpg" class="consultant-avatar" alt="Lê Đinh Ý Nhi" loading="lazy">
                </div>
                <h3 class="consultant-card-name">Lê Đinh Ý Nhi</h3>
                <span class="consultant-card-role">Tư vấn viên tuyển sinh</span>
                <div class="consultant-card-phone">
                    <i class="fa-solid fa-phone"></i>
                    <span>*********<strong>486</strong></span>
                </div>
                <button type="button" class="btn-card-action" onclick="showform('tu_van_nhi')">Nhận tư vấn</button>
            </article>

            <!-- Advisor 4 -->
            <article class="consultant-card" data-suffix="935">
                <div class="consultant-avatar-wrap">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/uyen.webp" class="consultant-avatar" alt="Nguyễn Phương Uyên" loading="lazy">
                </div>
                <h3 class="consultant-card-name">Nguyễn Phương Uyên</h3>
                <span class="consultant-card-role">Tư vấn viên tuyển sinh</span>
                <div class="consultant-card-phone">
                    <i class="fa-solid fa-phone"></i>
                    <span>*********<strong>935</strong></span>
                </div>
                <button type="button" class="btn-card-action" onclick="showform('tu_van_uyen')">Nhận tư vấn</button>
            </article>
        </div>
    </section>

    <!-- Payment Guidelines & Safety Section -->
    <section class="payment-guidelines-section">
        <div class="guidelines-container">
            <div class="guidelines-grid">
                <div class="guidelines-content">
                    <h3>Hướng Dẫn Đóng Phí An Toàn</h3>
                    <p>Viện IDEAS áp dụng quy trình kiểm soát tài chính minh bạch và chặt chẽ nhằm bảo mật thông tin và bảo vệ quyền lợi hợp pháp tối đa cho học viên:</p>
                    <ul class="guidelines-list">
                        <li>
                            <i class="fa-solid fa-circle-check"></i>
                            <span>Tất cả các tài khoản nhận đóng học phí đều phải trực thuộc pháp nhân của <strong>VIỆN IDEAS</strong>.</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check"></i>
                            <span>Khi đóng phí qua trả góp liên kết Sacombank, các thủ tục được hướng dẫn cụ thể qua văn bản hoặc hợp đồng chính thức.</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check"></i>
                            <span>Mọi biên nhận đóng học phí đều được gửi trực tiếp từ hệ thống email chính thức của Viện (có đuôi <strong>@ideas.edu.vn</strong>).</span>
                        </li>
                    </ul>
                </div>

                <div class="bank-details-card">
                    <div class="bank-header">
                        <i class="fa-solid fa-building-columns bank-logo"></i>
                        <div>
                            <div class="bank-name">Sacombank &amp; Cổng Payoo</div>
                            <div style="font-size:0.85rem; color:#64748b; font-weight:600;">Kênh giao dịch chính thức của IDEAS</div>
                        </div>
                    </div>
                    <div class="bank-info-item">
                        <span class="bank-label">Tên tài khoản thụ hưởng:</span>
                        <span class="bank-value highlight">VIỆN IDEAS</span>
                    </div>
                    <div class="bank-info-item" style="flex-direction: column; align-items: flex-start; gap: 4px; border-bottom: 1px solid #f1f5f9; padding: 10px 0;">
                        <span class="bank-label">Số tài khoản &amp; Cổng thanh toán:</span>
                        <span class="bank-value" style="text-align: left; font-size: 0.88rem; color: #475569; font-weight: 500; margin-top: 4px; line-height: 1.4;">
                            Thông tin số tài khoản chính thức được ghi chi tiết trong <strong>Hợp đồng tư vấn học tập</strong> hoặc qua đường link thanh toán bảo mật <strong>Payoo</strong> được cung cấp trực tiếp từ email của Viện (<code>@ideas.edu.vn</code>).
                        </span>
                    </div>
                    <div class="bank-info-item">
                        <span class="bank-label">Nội dung chuyển khoản:</span>
                        <span class="bank-value highlight">[Họ tên] - [Chương trình học] - [Số điện thoại]</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Verification Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('advisor-search');
            const btnVerify = document.getElementById('btn-verify');
            const resultsContainer = document.getElementById('search-results');

            // Data of official advisors
            const advisors = [
                {
                    name: "Lưu Phan Hoàng Phúc",
                    suffix: "017",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2025/09/cphuc.webp",
                    role: "Tư vấn viên tuyển sinh chính thức"
                },
                {
                    name: "Nguyễn Thị Linh Đan",
                    suffix: "953",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2025/09/cdan.webp",
                    role: "Tư vấn viên tuyển sinh chính thức"
                },
                {
                    name: "Lê Đinh Ý Nhi",
                    suffix: "486",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/nhi_avt.jpg",
                    role: "Tư vấn viên tuyển sinh chính thức"
                },
                {
                    name: "Nguyễn Phương Uyên",
                    suffix: "935",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2025/09/uyen.webp",
                    role: "Tư vấn viên tuyển sinh chính thức"
                }
            ];

            function runVerification() {
                // Get value and sanitize (remove non-alphanumeric chars)
                let query = searchInput.value.replace(/[^0-9]/g, '').trim();
                
                if (query.length === 0) {
                    alert('Vui lòng nhập số điện thoại hoặc 3 số đuôi để kiểm tra.');
                    return;
                }

                // Check if match any advisor suffix
                let matchedAdvisor = null;
                for (let advisor of advisors) {
                    // Match if query is the 3-digit suffix, or if the full number ends with the suffix
                    if (query === advisor.suffix || query.endsWith(advisor.suffix)) {
                        matchedAdvisor = advisor;
                        break;
                    }
                }

                // Clean old result states
                resultsContainer.classList.remove('active');
                resultsContainer.innerHTML = '';

                setTimeout(() => {
                    if (matchedAdvisor) {
                        // SUCCESS MATCH
                        resultsContainer.innerHTML = `
                            <div class="result-card success">
                                <div class="result-status-header">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span>Xác thực thành công</span>
                                </div>
                                <div class="result-desc">
                                    Số điện thoại này thuộc về tư vấn viên chính thức của Viện IDEAS. Quý học viên hoàn toàn có thể yên tâm liên hệ trao đổi học tập.
                                </div>
                                <div class="matched-consultant-card">
                                    <img src="${matchedAdvisor.avatar}" class="matched-avatar" alt="${matchedAdvisor.name}">
                                    <div class="matched-info">
                                        <h4 class="matched-name">${matchedAdvisor.name}</h4>
                                        <span class="matched-role">${matchedAdvisor.role}</span>
                                        <div class="matched-phone">
                                            <i class="fa-solid fa-phone"></i>
                                            <span>Số điện thoại đuôi: <strong>*********${matchedAdvisor.suffix}</strong></span>
                                        </div>
                                        <div>
                                            <span class="verified-badge-pill">
                                                <i class="fa-solid fa-shield-halved"></i>
                                                Official Staff Verified
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    } else {
                        // NO MATCH - WARNING STATE
                        resultsContainer.innerHTML = `
                            <div class="result-card error">
                                <div class="result-status-header">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    <span>Cảnh báo mạo danh</span>
                                </div>
                                <div class="result-desc">
                                    Số điện thoại hoặc số đuôi <strong>"${searchInput.value}"</strong> mà Quý học viên vừa nhập <strong>KHÔNG</strong> nằm trong danh sách các tư vấn viên chính thức của Viện IDEAS.
                                </div>
                                <p style="margin: 0; font-size: 0.9rem; line-height: 1.5;">
                                    Nhằm tránh bị lừa đảo hoặc lợi dụng thông tin, Quý học viên vui lòng tuyệt đối <strong>KHÔNG</strong> thực hiện bất kỳ giao dịch chuyển khoản hay cung cấp thông tin cá nhân cho số điện thoại này. Hãy liên hệ ngay với chúng tôi qua số Hotline chính thức: <strong>028 2244 2244</strong> hoặc gửi phản hồi về địa chỉ email <strong>info@ideas.edu.vn</strong> để được xác minh hỗ trợ kịp thời.
                                </p>
                            </div>
                        `;
                    }

                    resultsContainer.classList.add('active');

                    // Scroll view smoothly to result card
                    resultsContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 200);
            }

            btnVerify.addEventListener('click', runVerification);

            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    runVerification();
                }
            });
        });
    </script>

    <?php get_footer(); ?>
