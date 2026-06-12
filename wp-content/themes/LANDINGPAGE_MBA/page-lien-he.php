<?php
/**
 * The template for displaying the Contact page
 * Template Name: Premium Contact Template
 */
global $wp;

// Block unwanted old theme styles via output buffering
ob_start(function ($html) {
    $html = preg_replace(
        '/<link[^>]+href=[\'"][^\'"]*LANDINGPAGE_MBA\/main\.css[^\'"]*[\'"][^>]*\/?>/i',
        '<!-- [BLOCKED: LANDINGPAGE_MBA/main.css] -->',
        $html
    );
    return $html;
});
$is_en = (isset($_GET['lang']) && $_GET['lang'] === 'en');
?>
<!DOCTYPE html>
<html lang="<?php echo $is_en ? 'en' : 'vi'; ?>" prefix="og: https://ogp.me/ns#">

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
    <!-- Preconnect to external domains for faster resource loading -->
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="dns-prefetch" href="https://www.googletagmanager.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="dns-prefetch" href="https://www.google-analytics.com">
    <!-- Preload LCP hero background image -->
    <link rel="preload" fetchpriority="high" as="image" href="https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp" />

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php echo $is_en ? 'Contact Admissions – IDEAS Institute | IDEAS' : 'Liên hệ ban tuyển sinh – Viện IDEAS | IDEAS'; ?></title>
    <?php endif; ?>
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta name="description"
            content="<?php echo $is_en ? 'Contact IDEAS directly for 1:1 academic counseling and register to explore international standard Bachelor, Master, and Doctoral programs.' : 'Liên hệ trực tiếp Viện IDEAS để được tư vấn học vụ 1:1, đăng ký tìm hiểu các chương trình Cử nhân, Thạc sĩ, Tiến sĩ chuẩn quốc tế.'; ?>" />
    <?php endif; ?>
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $is_en ? 'Contact Admissions – IDEAS Institute | IDEAS' : 'Liên hệ ban tuyển sinh – Viện IDEAS | IDEAS'; ?>" />
        <meta property="og:description"
            content="<?php echo $is_en ? 'Submit a request for 1:1 academic counseling and receive a detailed learning roadmap and scholarship info from admissions.' : 'Gửi yêu cầu tư vấn học vụ 1:1 và nhận lộ trình học tập, thông tin học bổng chi tiết từ ban tuyển sinh.'; ?>" />
        <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp" />
        <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />
    <?php endif; ?>
    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" / media="print" onload="this.media='all'">

    <!-- Main minified stylesheet -->
    <?php
    $css_path = get_stylesheet_directory() . '/common-assets/css/style.min.css';
    $css_version = file_exists($css_path) ? filemtime($css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/style.min.css?v=<?php echo $css_version; ?>" />

    <!-- Booking Modal stylesheet -->
    <?php
    define('BOOKING_MODAL_CSS_LOADED', true);
    $bk_css_path = get_stylesheet_directory() . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/booking-modal.min.css?v=<?php echo $bk_css_version; ?>" media="print" onload="this.media='all'" />

    <style>
        /* ══════════════════════════════════════
           CONTACT PAGE – PREMIUM LIGHT THEME
           ══════════════════════════════════════ */
        html,
        body {
            overflow-x: clip !important;
        }

        body,
        main#content,
        .contact-section {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif !important;
            background-color: #080405 !important;
            background: #080405 !important;
            color: #f3f4f6;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            z-index: -1;
            background-image:
                radial-gradient(circle at 10% 20%, rgba(171, 14, 0, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 90% 70%, rgba(171, 14, 0, 0.1) 0%, transparent 45%),
                radial-gradient(rgba(255, 255, 255, 0.05) 1.5px, transparent 1.5px) !important;
            background-size: 100% 100%, 100% 100%, 30px 30px;
            pointer-events: none;
            will-change: transform;
        }

        /* ── Hero (Same dark red style as ideas-talk) ──────────────────────────── */
        .contact-hero {
            position: relative;
            padding: 180px 20px 80px;
            overflow: hidden;
            background: transparent;
            min-height: 40vh;
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: none;
            text-align: center;
        }

        .contact-hero-bg {
            position: absolute;
            top: -150px;
            left: -5%;
            width: 110%;
            height: calc(100% + 300px);
            background-size: cover;
            background-position: center;
            will-change: transform;
            transform: translate3d(0, 0, 0) scale(1.1);
            z-index: 1;
            opacity: 0.3;
        }

        .contact-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(180deg,
                    rgba(8, 4, 5, 0.85) 0%,
                    rgba(100, 10, 5, 0.5) 60%,
                    #080405 100%),
                radial-gradient(ellipse at 50% 50%, rgba(171, 14, 0, 0.35) 0%, transparent 75%) !important;
        }

        .contact-hero-container {
            position: relative;
            z-index: 3;
            max-width: 900px;
            margin: 0 auto;
            width: 100%;
        }

        .contact-hero-badge {
            background: rgba(171, 14, 0, 0.2);
            border: 1px solid rgba(255, 77, 77, 0.35);
            padding: 8px 22px;
            border-radius: 100px;
            color: #ffcccc;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
            backdrop-filter: blur(12px);
        }

        .contact-hero h1 {
            font-size: clamp(2.4rem, 5.5vw, 3.8rem);
            font-weight: 900;
            margin-bottom: 20px;
            letter-spacing: -0.02em;
            line-height: 1.15;
            color: #ffffff !important;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }

        .contact-hero h1 span {
            background: linear-gradient(135deg, #ff8e8e 0%, #ff4f4f 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }

        .contact-hero p {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9) !important;
            max-width: 650px;
            margin: 0 auto;
            line-height: 1.6;
            font-weight: 500;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
        }

        /* ── Main Layout ───────────────────── */
        .contact-section {
            padding: 20px 20px 100px;
            position: relative;
            z-index: 5;
        }

        .contact-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1.25fr;
            gap: 45px;
            align-items: start;
        }

        @media (max-width: 992px) {
            .contact-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            .contact-section {
                padding-bottom: 60px;
            }
        }

        @media (max-width: 768px) {
            .contact-hero {
                padding: 130px 16px 40px !important;
            }
            .contact-hero h1 {
                font-size: 2.2rem;
            }
            .contact-hero p {
                font-size: 0.95rem;
            }
        }

        /* ── Info Column (Light Theme) ──────── */
        .contact-info-column {
            display: flex;
            flex-direction: column;
            gap: 28px;
        }

        .contact-info-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.02);
            transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
            color: #1e293b;
        }

        .contact-info-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.05);
            border-color: rgba(171, 14, 0, 0.15);
        }

        .contact-info-card h2 {
            font-size: 1.35rem;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .contact-info-card h2 i {
            color: #ab0e00;
        }

        .info-details {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }

        .info-icon {
            width: 44px;
            height: 44px;
            background: rgba(171, 14, 0, 0.05);
            border: 1px solid rgba(171, 14, 0, 0.12);
            border-radius: 12px;
            color: #ab0e00;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .info-content {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .info-label {
            font-size: 0.74rem;
            font-weight: 800;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .info-value {
            font-size: 0.95rem;
            color: #1e293b;
            font-weight: 700;
            line-height: 1.5;
        }

        .info-value a {
            color: inherit;
            text-decoration: none;
            transition: color 0.2s;
        }

        .info-value a:hover {
            color: #ff3b30;
        }

        .contact-action-row {
            display: flex;
            gap: 14px;
            margin-top: 10px;
        }

        @media (max-width: 480px) {
            .contact-action-row {
                flex-direction: column;
            }
        }

        .contact-zalo-btn,
        .contact-booking-btn {
            flex: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            height: 48px;
            padding: 0 20px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.88rem;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            cursor: pointer;
            box-sizing: border-box;
            margin: 0;
            line-height: 1;
            text-decoration: none;
            outline: none;
        }

        .contact-zalo-btn {
            background: #ffffff;
            border: 1.5px solid #cbd5e1;
            color: #0f172a;
        }

        .contact-zalo-btn:hover {
            background: #ab0e00;
            border-color: #ab0e00;
            color: #ffffff;
            box-shadow: 0 10px 20px rgba(171, 14, 0, 0.15);
            transform: translateY(-2px);
        }

        .contact-zalo-btn img {
            width: 20px;
            height: 20px;
            object-fit: contain;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .contact-booking-btn {
            background: transparent;
            border: 1.5px solid rgba(171, 14, 0, 0.45);
            color: #ab0e00;
        }

        .contact-booking-btn:hover {
            background: #ab0e00;
            color: #ffffff;
            border-color: #ab0e00;
            box-shadow: 0 10px 20px rgba(171, 14, 0, 0.15);
            transform: translateY(-2px);
        }

        /* ── Form Column (Light Theme Card) ───────── */
        .contact-form-column {
            position: relative;
        }

        .contact-form-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 28px;
            padding: 40px;
            box-shadow: 
                0 20px 45px rgba(15, 23, 42, 0.04),
                0 4px 12px rgba(15, 23, 42, 0.01);
            position: relative;
            overflow: hidden;
            transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
            color: #1e293b;
        }

        .contact-form-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 25px 55px rgba(15, 23, 42, 0.08);
            border-color: rgba(171, 14, 0, 0.15);
        }

        @media (max-width: 480px) {
            .contact-form-card {
                padding: 24px;
            }
        }

        .contact-form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #ff8e8e, #ff3b30);
        }

        .form-card-header {
            margin-bottom: 30px;
        }

        .form-card-badge {
            background: rgba(171, 14, 0, 0.06);
            border: 1px solid rgba(171, 14, 0, 0.2);
            padding: 6px 14px;
            border-radius: 100px;
            color: #ab0e00;
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            display: inline-flex;
            margin-bottom: 12px;
        }

        .form-card-header h3 {
            font-size: 1.55rem;
            font-weight: 850;
            color: #0f172a;
            margin: 0 0 10px;
            line-height: 1.3;
        }

        .form-card-header h3 span {
            background: linear-gradient(135deg, #ff4444 0%, #ab0e00 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }

        .form-card-header p {
            font-size: 0.88rem;
            color: #4b5563;
            margin: 0;
            line-height: 1.5;
        }

        /* Form Controls */
        .page-contact-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            text-align: left;
        }

        .form-group label {
            font-size: 0.82rem;
            font-weight: 700;
            color: #334155;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            color: #0f172a;
            padding: 12px 16px;
            font-size: 0.92rem;
            outline: none;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        .page-contact-form select {
            display: block !important;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #94a3b8;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            background: #ffffff;
            border-color: #ff3b30;
            box-shadow: 0 0 15px rgba(171, 14, 0, 0.08);
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        @media (max-width: 576px) {
            .form-row {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }

        .form-group select option {
            background: #ffffff;
            color: #0f172a;
        }

        .form-error {
            font-size: 0.72rem;
            color: #ff3b30;
            display: none;
            margin-top: 4px;
        }

        .form-error.active {
            display: block;
        }

        .form-privacy {
            font-size: 0.74rem;
            color: #64748b;
            text-align: center;
            margin: 10px 0 0;
        }

        /* Success State */
        .page-form-success {
            display: none;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px 0;
            animation: fadeIn 0.4s ease;
        }

        .page-form-success.visible {
            display: flex;
        }

        .success-circle {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(52, 199, 89, 0.1);
            border: 2px solid rgba(52, 199, 89, 0.3);
            margin-bottom: 24px;
        }

        .checkmark {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: block;
            stroke-width: 3;
            stroke: #34c759;
            stroke-miterlimit: 10;
            box-shadow: inset 0px 0px 0px #34c759;
            animation: fill .4s ease-in-out forwards, scale .3s ease-in-out .9s both;
        }

        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 3;
            stroke-miterlimit: 10;
            stroke: #34c759;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            stroke-linecap: round;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.6s forwards;
        }

        @keyframes stroke {
            100% { stroke-dashoffset: 0; }
        }

        .page-form-success h3 {
            font-size: 1.4rem;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 10px;
        }

        .page-form-success p {
            font-size: 0.95rem;
            color: #4b5563;
            line-height: 1.6;
            max-width: 360px;
            margin: 0 auto;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>

    <main id="content">
        <!-- Hero Section -->
        <section class="contact-hero">
            <div class="contact-hero-bg" style="background-image: url('https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp');"></div>
            <div class="contact-hero-overlay"></div>
            <div class="contact-hero-container">
                <span class="contact-hero-badge"><i class="fa-solid fa-envelope"></i> <?php echo $is_en ? 'Contact Admissions' : 'Liên hệ tuyển sinh'; ?></span>
                <h1><span><?php echo $is_en ? 'CONTACT FOR COUNSELING' : 'LIÊN HỆ TƯ VẤN'; ?></span> <br><?php echo $is_en ? '1:1 Academic Support' : 'Hỗ trợ học vụ 1:1'; ?></h1>
                <p><?php echo $is_en ? 'Connect directly with the Admissions Board &amp; Academic Specialists of IDEAS to receive scholarship details and optimal learning roadmaps.' : 'Kết nối trực tiếp với Ban tuyển sinh &amp; Chuyên viên học vụ của Viện IDEAS để nhận thông tin học bổng, lộ trình học tập tối ưu.'; ?></p>
            </div>
        </section>

        <!-- Main Form Section -->
        <section class="contact-section">
            <div class="contact-container">
                
                <!-- Left: Contact Details -->
                <div class="contact-info-column">
                    <div class="contact-info-card">
                        <h2><i class="fa-solid fa-circle-nodes"></i> <?php echo $is_en ? 'IDEAS Office' : 'Văn phòng IDEAS'; ?></h2>
                        <div class="info-details">
                            <div class="info-item">
                                <div class="info-icon"><i class="fa-solid fa-location-dot"></i></div>
                                <div class="info-content">
                                    <span class="info-label"><?php echo $is_en ? 'Headquarters' : 'Trụ sở chính'; ?></span>
                                    <span class="info-value"><?php echo $is_en ? '4th Floor, Hai Au Building, 39B Truong Son, Tan Son Nhat Ward, Tan Binh District, HCMC' : 'Tầng 4, Tòa nhà Hải Âu, 39B Trường Sơn, Phường Tân Sơn Nhất, Quận Tân Bình, TP.HCM'; ?></span>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon"><i class="fa-solid fa-phone"></i></div>
                                <div class="info-content">
                                    <span class="info-label"><?php echo $is_en ? 'Admissions Hotline' : 'Hotline Tuyển sinh'; ?></span>
                                    <span class="info-value"><a href="tel:02822442244">028 2244 2244</a></span>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon"><i class="fa-solid fa-envelope"></i></div>
                                <div class="info-content">
                                    <span class="info-label"><?php echo $is_en ? 'Support Email' : 'Email hỗ trợ'; ?></span>
                                    <span class="info-value"><a href="mailto:info@ideas.edu.vn">info@ideas.edu.vn</a></span>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 25px; padding-top: 20px; border-top: 1px solid #e2e8f0;">
                            <h3 style="font-size:1.05rem; font-weight:800; color:#0f172a; margin: 0 0 10px; display:flex; align-items:center; gap:8px;">
                                <i class="fa-solid fa-comments" style="color:#ab0e00;"></i> <?php echo $is_en ? 'Quick Contact' : 'Liên hệ nhanh'; ?>
                            </h3>
                            <p style="font-size:0.82rem; color:#4b5563; margin: 0 0 16px; line-height: 1.5;"><?php echo $is_en ? 'If you need to discuss immediately, you can chat via Zalo or schedule a video counseling session.' : 'Nếu cần trao đổi ngay, bạn có thể chọn chat Zalo hoặc đặt lịch hẹn tư vấn video.'; ?></p>
                            <div class="contact-action-row">
                                <a href="https://zalo.me/3857867121882640296" target="_blank" class="contact-zalo-btn" rel="nofollow noopener noreferrer">
                                    <img src="/wp-content/uploads/external-migrated/zalo-oa-icon-unplated_82aad094.webp" alt="Zalo Logo" loading="lazy">
                                    <span>Chat Zalo</span>
                                </a>
                                <button type="button" class="contact-booking-btn bk-open-btn">
                                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" style="flex-shrink: 0;" aria-hidden="true">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span><?php echo $is_en ? 'Book Appointment' : 'Đặt lịch hẹn'; ?></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Consultation Form -->
                <div class="contact-form-column">
                    <div class="contact-form-card">
                        <header class="form-card-header" id="form-header">
                            <div class="form-card-badge"><?php echo $is_en ? '1:1 REGISTRATION' : 'ĐĂNG KÝ 1:1'; ?></div>
                            <h3><?php echo $is_en ? 'Explore <span>Programs</span>' : 'Tìm hiểu <span>Chương trình</span>'; ?></h3>
                            <p><?php echo $is_en ? 'Fill in the details below, our academic support specialist will contact you within 24 working hours.' : 'Điền thông tin bên dưới, chuyên viên hỗ trợ học vụ sẽ liên hệ lại với bạn trong vòng 24h làm việc.'; ?></p>
                        </header>

                        <!-- Form -->
                        <form class="page-contact-form" id="page-contact-form" novalidate>
                            <div class="form-group">
                                <label for="fullname"><?php echo $is_en ? 'Full Name *' : 'Họ và tên *'; ?></label>
                                <input type="text" id="fullname" name="fullname" placeholder="<?php echo $is_en ? 'Your full name' : 'Họ và tên của bạn'; ?>" required />
                                <span class="form-error" id="fullname-error"><?php echo $is_en ? 'Please enter your full name' : 'Vui lòng nhập họ tên'; ?></span>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="phone"><?php echo $is_en ? 'Phone Number *' : 'Số điện thoại *'; ?></label>
                                    <input type="tel" id="phone" name="phone" placeholder="<?php echo $is_en ? 'Phone number' : 'Số điện thoại'; ?>" required />
                                    <span class="form-error" id="phone-error"><?php echo $is_en ? 'Invalid phone number' : 'Số điện thoại không hợp lệ'; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" id="email" name="email" placeholder="<?php echo $is_en ? 'Email address' : 'Địa chỉ email'; ?>" required />
                                    <span class="form-error" id="email-error"><?php echo $is_en ? 'Invalid email' : 'Email không hợp lệ'; ?></span>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="education"><?php echo $is_en ? 'Highest Education *' : 'Trình độ học vấn *'; ?></label>
                                    <select id="education" name="education" required>
                                        <option value=""><?php echo $is_en ? '-- Select Education Level --' : '-- Chọn trình độ --'; ?></option>
                                        <option value="highschool"><?php echo $is_en ? 'High School' : 'THPT'; ?></option>
                                        <option value="college"><?php echo $is_en ? 'Associate Degree' : 'Cao đẳng'; ?></option>
                                        <option value="bachelor"><?php echo $is_en ? 'Bachelor\'s Degree' : 'Cử nhân'; ?></option>
                                        <option value="master"><?php echo $is_en ? 'Master\'s Degree' : 'Thạc sĩ'; ?></option>
                                        <option value="other"><?php echo $is_en ? 'Other' : 'Khác'; ?></option>
                                    </select>
                                    <span class="form-error" id="education-error"><?php echo $is_en ? 'Please select education level' : 'Vui lòng chọn học vấn'; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="english"><?php echo $is_en ? 'English Level *' : 'Trình độ Tiếng Anh *'; ?></label>
                                    <select id="english" name="english" required>
                                        <option value=""><?php echo $is_en ? '-- Select Education Level --' : '-- Chọn trình độ --'; ?></option>
                                        <option value="below-5.0"><?php echo $is_en ? 'Below IELTS 5.0' : 'Dưới IELTS 5.0'; ?></option>
                                        <option value="5.0-5.5">IELTS 5.0 - 5.5</option>
                                        <option value="6.0-plus">IELTS 6.0+</option>
                                        <option value="other"><?php echo $is_en ? 'Other / Not tested' : 'Khác / Chưa thi'; ?></option>
                                    </select>
                                    <span class="form-error" id="english-error"><?php echo $is_en ? 'Please select English level' : 'Vui lòng chọn trình độ Tiếng Anh'; ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="interest"><?php echo $is_en ? 'Program of Interest *' : 'Chương trình quan tâm *'; ?></label>
                                <select id="interest" name="interest" required>
                                    <option value=""><?php echo $is_en ? '-- Select Program --' : '-- Chọn chương trình học --'; ?></option>
                                    <option value="Online MBA"><?php echo $is_en ? 'Online MBA (Master of Business Administration)' : 'Online MBA (Thạc sĩ QTKD)'; ?></option>
                                    <option value="Executive MBA"><?php echo $is_en ? 'Executive MBA' : 'Executive MBA (Thạc sĩ Điều hành)'; ?></option>
                                    <option value="Master AI"><?php echo $is_en ? 'Master AI (MSc AI)' : 'Master AI (Thạc sĩ Khoa học AI)'; ?></option>
                                    <option value="MBA in AI"><?php echo $is_en ? 'MBA in AI' : 'MBA in AI (Thạc sĩ QTKD Ứng dụng AI)'; ?></option>
                                    <option value="Top-up BBA"><?php echo $is_en ? 'Top-up BBA (12-month Bachelor Top-up)' : 'Top-up BBA (Cử nhân liên thông 12 tháng)'; ?></option>
                                    <option value="Full BBA">Global Online BBA</option>
                                    <option value="Dual DBA"><?php echo $is_en ? 'Dual DBA (UK &amp; France Doctor of Business Administration)' : 'Dual DBA (Tiến sĩ song bằng Pháp &amp; Anh)'; ?></option>
                                    <option value="Cần tư vấn chung"><?php echo $is_en ? 'General Inquiry (Scholarships &amp; Admissions)' : 'Cần tư vấn chung (Học bổng &amp; Tuyển sinh)'; ?></option>
                                </select>
                                <span class="form-error" id="interest-error"><?php echo $is_en ? 'Please select program' : 'Vui lòng chọn chương trình'; ?></span>
                            </div>

                            <div class="form-group">
                                <label for="message"><?php echo $is_en ? 'Message / preferred counseling time' : 'Nội dung bạn muốn chia sẻ / thời gian nghe tư vấn'; ?></label>
                                <textarea id="message" name="message" placeholder="<?php echo $is_en ? 'e.g., I want to inquire about tuition fees, installment plans...' : 'Ví dụ: Tôi muốn hỏi về học phí, chính sách trả góp...'; ?>" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-full" id="form-submit-btn" style="border: none; cursor: pointer; font-family: inherit;">
                                <span><?php echo $is_en ? 'Submit Registration' : 'Gửi thông tin đăng ký'; ?></span>
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" aria-hidden="true" style="margin-left: 8px; vertical-align: middle;">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                                </svg>
                            </button>

                            <p class="form-privacy"><?php echo $is_en ? 'Information privacy committed' : 'Cam kết bảo mật thông tin'; ?></p>
                        </form>

                        <!-- Success Box -->
                        <div class="page-form-success" id="page-form-success">
                            <div class="success-circle">
                                <svg viewBox="0 0 52 52" class="checkmark">
                                    <circle cx="26" cy="26" r="25" fill="none" class="checkmark__circle" />
                                    <path fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" class="checkmark__check" />
                                </svg>
                            </div>
                            <h3><?php echo $is_en ? 'Registration Successful!' : 'Đăng ký thành công!'; ?></h3>
                            <p id="success-msg"><?php echo $is_en ? 'Thank you for your interest. An IDEAS admissions specialist will contact you as soon as possible.' : 'Cảm ơn bạn đã quan tâm. Chuyên viên tuyển sinh của IDEAS sẽ liên hệ trong thời gian sớm nhất.'; ?></p>
                        </div>

                    </div>
                </div>

            </div>
        </section>
    </main>

    <!-- Shared Footer -->
    <?php get_footer(); ?>

    <!-- Form Submit Handler -->
    <script>
        if (typeof isEnMode === 'undefined') { var isEnMode = <?php echo $is_en ? 'true' : 'false'; ?>; }
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('page-contact-form');
            if (!form) return;

            form.addEventListener('submit', async function (e) {
                e.preventDefault();

                // Inputs
                const nameInput = document.getElementById('fullname');
                const phoneInput = document.getElementById('phone');
                const emailInput = document.getElementById('email');
                const eduSelect = document.getElementById('education');
                const engSelect = document.getElementById('english');
                const interestSelect = document.getElementById('interest');
                const messageInput = document.getElementById('message');

                // Error Spans
                const nameErr = document.getElementById('fullname-error');
                const phoneErr = document.getElementById('phone-error');
                const emailErr = document.getElementById('email-error');
                const eduErr = document.getElementById('education-error');
                const engErr = document.getElementById('english-error');
                const interestErr = document.getElementById('interest-error');

                // Reset Errors
                nameErr.classList.remove('active');
                phoneErr.classList.remove('active');
                emailErr.classList.remove('active');
                eduErr.classList.remove('active');
                engErr.classList.remove('active');
                interestErr.classList.remove('active');

                // Read Values
                const name = nameInput.value.trim();
                const phone = phoneInput.value.trim();
                const email = emailInput.value.trim();
                const eduVal = eduSelect.value;
                const engVal = engSelect.value;
                const interestVal = interestSelect.value;
                const messageVal = messageInput.value.trim();

                // Simple Validation
                let isValid = true;

                if (!name) {
                    nameErr.classList.add('active');
                    isValid = false;
                }
                if (!phone || phone.length < 8) {
                    phoneErr.classList.add('active');
                    isValid = false;
                }
                if (!email || !email.includes('@')) {
                    emailErr.classList.add('active');
                    isValid = false;
                }
                if (!eduVal) {
                    eduErr.classList.add('active');
                    isValid = false;
                }
                if (!engVal) {
                    engErr.classList.add('active');
                    isValid = false;
                }
                if (!interestVal) {
                    interestErr.classList.add('active');
                    isValid = false;
                }

                if (!isValid) return;

                // Setup Payload
                const eduText = eduSelect.selectedIndex >= 0 ? eduSelect.options[eduSelect.selectedIndex].text : '';
                const engText = engSelect.selectedIndex >= 0 ? engSelect.options[engSelect.selectedIndex].text : '';
                const interestText = interestSelect.selectedIndex >= 0 ? interestSelect.options[interestSelect.selectedIndex].text : '';

                const noteParts = [];
                if (eduText) noteParts.push('Học vấn: ' + eduText);
                if (engText) noteParts.push('Tiếng Anh: ' + engText);
                if (messageVal) noteParts.push(messageVal);
                noteParts.push('CTA Source: contact_page_form');
                const combinedNote = noteParts.join(' | ');

                const payload = {
                    form_id: "4fe1eeb0570742a1fdde61af6fc0680c",
                    email: email,
                    firstName: name,
                    phoneNumber: phone,
                    time_dat_lich: "",
                    note_dat_lich: `Đăng ký tuyển sinh từ trang Liên hệ | ${combinedNote}`,
                    chuong_trinh_dat_lich: interestVal
                };

                const webhookPayload = {
                    name: name,
                    phone: phone,
                    email: email,
                    source: "Landing_Contact_Page",
                    type: "contact_page_registration",
                    tieng_anh: engText,
                    hoc_van: eduText,
                    time_dat_lich: "",
                    chuong_trinh: interestVal,
                    nhu_cau: `Đăng ký tuyển sinh từ trang Liên hệ | Note: ${combinedNote}`
                };

                // Append UTMs
                const urlParams = new URLSearchParams(window.location.search);
                const utmParams = ['utm_campaign', 'utm_source', 'utm_medium', 'utm_content', 'utm_term'];
                utmParams.forEach(param => {
                    const val = urlParams.get(param);
                    if (val) webhookPayload[param] = val;
                });

                // Disable submit button during request
                const btn = document.getElementById('form-submit-btn');
                const originalBtnHtml = btn.innerHTML;
                btn.disabled = true;
                btn.style.opacity = '0.7';
                btn.innerHTML = `<span><i class="fa-solid fa-spinner fa-spin"></i> ${isEnMode ? 'Submitting...' : 'Đang gửi...'}</span>`;

                try {
                    const p1 = fetch("https://automation.ideas.edu.vn/mail_api/forms.php?route=submit", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify(payload)
                    });

                    const p2 = fetch("https://open.domation.net/sale_data/webhook.php?token=tok_kjhbs32a", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify(webhookPayload)
                    });

                    await Promise.allSettled([p1, p2]);

                    // Google Ads Conversion tracking
                    if (typeof window.gtag === 'function') {
                        window.gtag('event', 'conversion', {
                            'send_to': 'AW-11205917800/mdXJCOTL-bccEOj4st8p',
                            'value': 1.0,
                            'currency': 'USD'
                        });
                    }

                    // Success State
                    const successBox = document.getElementById('page-form-success');
                    const successMsg = document.getElementById('success-msg');
                    if (successMsg && name) {
                        successMsg.innerHTML = isEnMode ? 'Thank you <strong>' + name + '</strong> for your interest. The admissions specialist for the <strong>' + interestText + '</strong> program at IDEAS will contact you as soon as possible.' : 'Cảm ơn bạn <strong>' + name + '</strong> đã quan tâm. Chuyên viên tuyển sinh chương trình <strong>' + interestText + '</strong> của IDEAS sẽ liên hệ trong thời gian sớm nhất.';
                    }
                    
                    form.style.display = 'none';
                    document.getElementById('form-header').style.display = 'none';
                    successBox.classList.add('visible');

                } catch (error) {
                    console.error('Submission error:', error);
                    alert(isEnMode ? 'An error occurred during submission. Please try again later.' : 'Có lỗi xảy ra trong quá trình gửi thông tin. Vui lòng thử lại sau.');
                } finally {
                    btn.disabled = false;
                    btn.style.opacity = '1';
                    btn.innerHTML = originalBtnHtml;
                }

            });
        });
    </script>

</body>
</html>
