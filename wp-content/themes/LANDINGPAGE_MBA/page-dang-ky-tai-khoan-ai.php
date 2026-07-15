<?php
/**
 * The template for displaying the Register AI Account page
 * Template Name: Premium Register AI Account Template
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
    <?php get_template_part('shared-head'); ?>

    <!-- Preconnect to external domains for faster resource loading --><!-- Preload LCP hero background image -->
    <link rel="preload" fetchpriority="high" as="image" href="https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp" />

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php echo $is_en ? 'Free AI Platform Account Registration – IDEAS' : 'Đăng ký nhận tài khoản AI Platform miễn phí | IDEAS'; ?></title>
    <?php endif; ?>
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta name="description"
            content="<?php echo $is_en ? 'Register to experience the powerful IDEAS AI Platform academic assistant completely free.' : 'Đăng ký trải nghiệm trợ lý học thuật AI đắc lực IDEAS AI Platform hoàn toàn miễn phí.'; ?>" />
    <?php endif; ?><?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $is_en ? 'Free AI Platform Account Registration – IDEAS' : 'Đăng ký nhận tài khoản AI Platform miễn phí | IDEAS'; ?>" />
        <meta property="og:description"
            content="<?php echo $is_en ? 'Register to experience the powerful IDEAS AI Platform academic assistant completely free.' : 'Đăng ký trải nghiệm trợ lý học thuật AI đắc lực IDEAS AI Platform hoàn toàn miễn phí.'; ?>" />
        <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp" />
        <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />
    <?php endif; ?><!-- Booking Modal stylesheet -->
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
            font-family: 'Plus Jakarta Sans', sans-serif !important;
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
                <span class="contact-hero-badge"><svg class="svg-icon fa-robot fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 224c0 17.7 14.3 32 32 32s32-14.3 32-32c0-53 43-96 96-96s96 43 96 96c0 17.7 14.3 32 32 32s32-14.3 32-32c0-88.4-71.6-160-160-160S0 135.6 0 224zm512 0c0 17.7 14.3 32 32 32s32-14.3 32-32c0-88.4-71.6-160-160-160s-160 71.6-160 160c0 17.7 14.3 32 32 32s32-14.3 32-32c0-53 43-96 96-96s96 43 96 96zM160 272c0-8.8-7.2-16-16-16s-16 7.2-16 16v192c0 8.8 7.2 16 16 16s16-7.2 16-16V272zm320 0c0-8.8-7.2-16-16-16s-16 7.2-16 16v192c0 8.8 7.2 16 16 16s16-7.2 16-16V272zm-288 32c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16v-64zm192 0c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16v-64z"/></svg> <?php echo $is_en ? 'Free AI Account Registration' : 'Đăng ký tài khoản AI miễn phí'; ?></span>
                <h1><span><?php echo $is_en ? 'IDEAS AI PLATFORM' : 'TRẢI NGHIỆM AI PLATFORM'; ?></span> <br><?php echo $is_en ? 'Smart Academic Assistant' : 'Trợ lý học thuật thông minh'; ?></h1>
            <div class="verify-slogan">
                <?php echo $is_en ? '"Original Knowledge - Localized Mentorship"' : '"Tri thức Nguyên bản - Đồng hành Bản địa"'; ?>
            </div>

                <p><?php echo $is_en ? 'Register for a completely free trial of the IDEAS AI Platform, a specialized artificial intelligence assistant to optimize your learning journey.' : 'Đăng ký trải nghiệm hoàn toàn miễn phí nền tảng trợ lý trí tuệ nhân tạo IDEAS AI Platform để tối ưu hóa hành trình học tập của bạn.'; ?></p>
            </div>
        </section>

        <!-- Main Form Section -->
        <section class="contact-section">
            <div class="contact-container">
                
                <!-- Left: Video & Benefits -->
                <div class="contact-info-column">
                    <!-- Video player on top -->
                    <div style="border-radius: 24px; padding: 8px; background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3); transition: all 0.35s ease;">
                        <div style="border-radius: 18px; overflow: hidden; position: relative; aspect-ratio: 16/9; background: #000; border: 2px solid rgba(217, 38, 38, 0.25); box-shadow: 0 10px 25px rgba(217, 38, 38, 0.15);">
                            <iframe src="https://www.youtube.com/embed/09mATwfEE8Q" title="IDEAS AI Platform Demo" style="position: absolute; top:0; left:0; width:100%; height:100%; border:none;" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                    </div>
                    
                    <!-- Benefits below -->
                    <div class="contact-info-card" style="background: linear-gradient(135deg, #5c0600 0%, #ab0e00 60%, #400300 100%) !important; border: 1px solid rgba(255, 255, 255, 0.15) !important; box-shadow: 0 20px 45px rgba(171, 14, 0, 0.18), inset 0 1px 1px rgba(255, 255, 255, 0.2) !important; color: #ffffff !important;">
                        <h2 style="color: #ffffff !important; display: flex; align-items: center; gap: 10px; font-size: 1.35rem; margin-bottom: 24px;">
                            <svg class="svg-icon fa-robot fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="color: #ffffff;"><path d="M0 224c0 17.7 14.3 32 32 32s32-14.3 32-32c0-53 43-96 96-96s96 43 96 96c0 17.7 14.3 32 32 32s32-14.3 32-32c0-88.4-71.6-160-160-160S0 135.6 0 224zm512 0c0 17.7 14.3 32 32 32s32-14.3 32-32c0-88.4-71.6-160-160-160s-160 71.6-160 160c0 17.7 14.3 32 32 32s32-14.3 32-32c0-53 43-96 96-96s96 43 96 96zM160 272c0-8.8-7.2-16-16-16s-16 7.2-16 16v192c0 8.8 7.2 16 16 16s16-7.2 16-16V272zm320 0c0-8.8-7.2-16-16-16s-16 7.2-16 16v192c0 8.8 7.2 16 16 16s16-7.2 16-16V272zm-288 32c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16v-64zm192 0c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16v-64z"/></svg>
                            <span><?php echo $is_en ? 'AI Platform Benefits' : 'Đặc quyền từ IDEAS AI Platform'; ?></span>
                        </h2>
                        
                        <div style="display: flex; flex-direction: column; gap: 16px; margin-top: 15px;">
                            <div style="display: flex; align-items: start; gap: 12px;">
                                <span style="display: flex; align-items: center; justify-content: center; width: 24px; height: 24px; border-radius: 50%; background: rgba(255, 255, 255, 0.18) !important; color: #ffffff !important; font-weight: 800; font-size: 0.85rem; flex-shrink: 0; margin-top: 2px;">✓</span>
                                <span style="color: #ffffff !important; font-size: 0.95rem; line-height: 1.45;"><?php echo $is_en ? '<strong>Instant Academic Help:</strong> Get complex management concepts clarified in seconds.' : '<strong>Giải đáp học thuật tức thì:</strong> Hỗ trợ làm rõ các khái niệm quản trị phức tạp chỉ trong vài giây.'; ?></span>
                            </div>
                            <div style="display: flex; align-items: start; gap: 12px;">
                                <span style="display: flex; align-items: center; justify-content: center; width: 24px; height: 24px; border-radius: 50%; background: rgba(255, 255, 255, 0.18) !important; color: #ffffff !important; font-weight: 800; font-size: 0.85rem; flex-shrink: 0; margin-top: 2px;">✓</span>
                                <span style="color: #ffffff !important; font-size: 0.95rem; line-height: 1.45;"><?php echo $is_en ? '<strong>Assignment Guidance:</strong> Receive structural suggestions and verified academic citations.' : '<strong>Hướng dẫn làm Assignment:</strong> Gợi ý cấu trúc bài viết và cung cấp nguồn tham khảo chính xác.'; ?></span>
                            </div>
                            <div style="display: flex; align-items: start; gap: 12px;">
                                <span style="display: flex; align-items: center; justify-content: center; width: 24px; height: 24px; border-radius: 50%; background: rgba(255, 255, 255, 0.18) !important; color: #ffffff !important; font-weight: 800; font-size: 0.85rem; flex-shrink: 0; margin-top: 2px;">✓</span>
                                <span style="color: #ffffff !important; font-size: 0.95rem; line-height: 1.45;"><?php echo $is_en ? '<strong>Real-world Application:</strong> Leverage AI tools to analyze case studies and work challenges.' : '<strong>Ứng dụng trong công việc:</strong> Sử dụng các công cụ trí tuệ nhân tạo để giải quyết tình huống thực tế.'; ?></span>
                            </div>
                            <div style="display: flex; align-items: start; gap: 12px;">
                                <span style="display: flex; align-items: center; justify-content: center; width: 24px; height: 24px; border-radius: 50%; background: rgba(255, 255, 255, 0.18) !important; color: #ffffff !important; font-weight: 800; font-size: 0.85rem; flex-shrink: 0; margin-top: 2px;">✓</span>
                                <span style="color: #ffffff !important; font-size: 0.95rem; line-height: 1.45;"><?php echo $is_en ? '<strong>24/7 AI Companion:</strong> Your personalized smart academic tutor available anytime, anywhere.' : '<strong>Đồng hành 24/7:</strong> Trợ lý thông minh cá nhân hóa, đồng hành cùng bạn mọi lúc mọi nơi.'; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Consultation Form -->
                <div class="contact-form-column">
                    <div class="contact-form-card">
                        <header class="form-card-header" id="form-header">
                            <div class="form-card-badge">AI PLATFORM</div>
                            <h3><?php echo $is_en ? 'NHẬN TÀI KHOẢN <span>IDEAS AI PLATFORM</span>' : 'NHẬN TÀI KHOẢN <span>IDEAS AI PLATFORM</span>'; ?></h3>
                            <p><?php echo $is_en ? 'Smart Academic Assistant' : 'Trợ lý học tập thông minh'; ?></p>
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
                                    <label for="email">Email *</label>
                                    <input type="email" id="email" name="email" placeholder="<?php echo $is_en ? 'Email address' : 'Địa chỉ email'; ?>" required />
                                    <span class="form-error" id="email-error"><?php echo $is_en ? 'Invalid email' : 'Email không hợp lệ'; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="phone"><?php echo $is_en ? 'Phone Number (Optional)' : 'Số điện thoại (Không bắt buộc)'; ?></label>
                                    <input type="tel" id="phone" name="phone" placeholder="<?php echo $is_en ? 'Phone number' : 'Số điện thoại'; ?>" />
                                    <span class="form-error" id="phone-error"><?php echo $is_en ? 'Invalid phone number' : 'Số điện thoại không hợp lệ'; ?></span>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="interest"><?php echo $is_en ? 'Program of Study *' : 'Chương trình học *'; ?></label>
                                    <select id="interest" name="interest" required>
                                        <option value=""><?php echo $is_en ? '-- Select Program --' : '-- Chọn chương trình học --'; ?></option>
                                        <option value="Online MBA">Online MBA</option>
                                        <option value="Executive MBA">Executive MBA</option>
                                        <option value="Master AI">Master AI (MSc AI)</option>
                                        <option value="MBA in AI">MBA in AI</option>
                                        <option value="Top-up BBA">Top-up BBA</option>
                                        <option value="Global Online BBA">Global Online BBA</option>
                                        <option value="Dual DBA">Dual DBA</option>
                                        <option value="Khác"><?php echo $is_en ? 'Other' : 'Khác'; ?></option>
                                    </select>
                                    <span class="form-error" id="interest-error"><?php echo $is_en ? 'Please select program' : 'Vui lòng chọn chương trình học'; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="purpose"><?php echo $is_en ? 'Purpose of using IDEAS AI Platform *' : 'Mục đích sử dụng IDEAS AI Flatform *'; ?></label>
                                    <select id="purpose" name="purpose" required onchange="toggleOtherPurpose(this.value)">
                                        <option value=""><?php echo $is_en ? '-- Select Purpose --' : '-- Chọn mục đích sử dụng --'; ?></option>
                                        <option value="Học tập & nghiên cứu"><?php echo $is_en ? 'Study & Research' : 'Học tập & nghiên cứu'; ?></option>
                                        <option value="Hướng dẫn làm Assignment"><?php echo $is_en ? 'Assignment Guidance' : 'Hướng dẫn làm Assignment'; ?></option>
                                        <option value="Ứng dụng AI trong công việc"><?php echo $is_en ? 'Apply AI at work' : 'Ứng dụng AI trong công việc'; ?></option>
                                        <option value="Khác"><?php echo $is_en ? 'Other / Specify' : 'Khác'; ?></option>
                                    </select>
                                    <span class="form-error" id="purpose-error"><?php echo $is_en ? 'Please select purpose' : 'Vui lòng chọn mục đích sử dụng'; ?></span>
                                </div>
                            </div>
                            
                            <div class="form-group" id="other-purpose-group" style="display: none;">
                                <label for="other_purpose"><?php echo $is_en ? 'Specify other purpose *' : 'Mục đích khác *'; ?></label>
                                <input type="text" id="other_purpose" name="other_purpose" placeholder="<?php echo $is_en ? 'Please specify' : 'Nhập mục đích khác của bạn'; ?>" />
                                <span class="form-error" id="other-purpose-error"><?php echo $is_en ? 'Please specify your purpose' : 'Vui lòng nhập mục đích khác'; ?></span>
                            </div>

                            <div class="form-group">
                                <label for="message"><?php echo $is_en ? 'What do you expect IDEAS AI Platform to support you with?' : 'Bạn mong muốn IDEAS AI Flatform hỗ trợ điều gì?'; ?></label>
                                <textarea id="message" name="message" placeholder="<?php echo $is_en ? 'e.g., I want to write essays, find research papers...' : 'Ví dụ: Tôi muốn hỗ trợ viết luận văn, tìm kiếm tài liệu nghiên cứu...'; ?>" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-full" id="form-submit-btn" style="border: none; cursor: pointer; font-family: inherit;">
                                <span><?php echo $is_en ? 'GET ACCOUNT NOW' : 'NHẬN NGAY TÀI KHOẢN'; ?></span>
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

    <!-- Form Submit Handler & Toggle Script -->
    <script>
        function toggleOtherPurpose(val) {
            const otherGroup = document.getElementById('other-purpose-group');
            const otherInput = document.getElementById('other_purpose');
            if (val === 'Khác') {
                otherGroup.style.display = 'block';
                otherInput.required = true;
            } else {
                otherGroup.style.display = 'none';
                otherInput.required = false;
                otherInput.value = '';
            }
        }

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
                const interestSelect = document.getElementById('interest');
                const purposeSelect = document.getElementById('purpose');
                const otherPurposeInput = document.getElementById('other_purpose');
                const messageInput = document.getElementById('message');

                // Error Spans
                const nameErr = document.getElementById('fullname-error');
                const phoneErr = document.getElementById('phone-error');
                const emailErr = document.getElementById('email-error');
                const interestErr = document.getElementById('interest-error');
                const purposeErr = document.getElementById('purpose-error');
                const otherPurposeErr = document.getElementById('other-purpose-error');

                // Reset Errors
                nameErr.classList.remove('active');
                phoneErr.classList.remove('active');
                emailErr.classList.remove('active');
                interestErr.classList.remove('active');
                purposeErr.classList.remove('active');
                if (otherPurposeErr) otherPurposeErr.classList.remove('active');

                // Read Values
                const name = nameInput.value.trim();
                const phone = phoneInput.value.trim();
                const email = emailInput.value.trim();
                const interestVal = interestSelect.value;
                const purposeVal = purposeSelect.value;
                const otherPurposeVal = otherPurposeInput ? otherPurposeInput.value.trim() : '';
                const messageVal = messageInput.value.trim();

                // Simple Validation
                let isValid = true;

                if (!name) {
                    nameErr.classList.add('active');
                    isValid = false;
                }
                if (phone && phone.length < 8) {
                    phoneErr.classList.add('active');
                    isValid = false;
                }
                if (!email || !email.includes('@')) {
                    emailErr.classList.add('active');
                    isValid = false;
                }
                if (!interestVal) {
                    interestErr.classList.add('active');
                    isValid = false;
                }
                if (!purposeVal) {
                    purposeErr.classList.add('active');
                    isValid = false;
                }
                if (purposeVal === 'Khác' && !otherPurposeVal) {
                    if (otherPurposeErr) otherPurposeErr.classList.add('active');
                    isValid = false;
                }

                if (!isValid) return;

                // Setup Payload
                const interestText = interestSelect.selectedIndex >= 0 ? interestSelect.options[interestSelect.selectedIndex].text : '';
                const purposeText = purposeVal === 'Khác' ? `Khác: ${otherPurposeVal}` : purposeVal;

                const noteParts = [];
                if (interestText) noteParts.push('Chương trình học: ' + interestText);
                if (purposeText) noteParts.push('Mục đích sử dụng AI: ' + purposeText);
                if (messageVal) noteParts.push('Mong muốn hỗ trợ: ' + messageVal);
                noteParts.push('CTA Source: ai_platform_registration_page');
                const combinedNote = noteParts.join(' | ');

                // New CRM Payload
                const payload = {
                    form_id: "15bc1263ceaec6fc77fa8b475c8aaf4e",
                    email: email,
                    firstName: name,
                    phoneNumber: phone,
                    chuong_trinh: interestVal,
                    muc_dich: purposeVal,
                    note: combinedNote
                };

                // Google Sheets Web App URL (Paste your URL after deploying Google Apps Script)
                const GOOGLE_SHEET_WEB_APP_URL = 'YOUR_GOOGLE_APPS_SCRIPT_WEB_APP_URL';

                const promises = [];

                // 1. Submit to CRM
                promises.push(
                    fetch("https://automation.ideas.edu.vn/mail_api/forms.php?route=submit", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify(payload)
                    })
                );

                // 2. Submit to Google Sheets (if configured)
                if (GOOGLE_SHEET_WEB_APP_URL && GOOGLE_SHEET_WEB_APP_URL !== 'YOUR_GOOGLE_APPS_SCRIPT_WEB_APP_URL') {
                    const sheetPayload = {
                        name: name,
                        email: email,
                        phone: phone,
                        program: interestText,
                        purpose: purposeText,
                        message: messageVal,
                        lang: isEnMode ? 'en' : 'vi'
                    };
                    promises.push(
                        fetch(GOOGLE_SHEET_WEB_APP_URL, {
                            method: "POST",
                            mode: "no-cors",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify(sheetPayload)
                        })
                    );
                }

                // Disable submit button during request
                const btn = document.getElementById('form-submit-btn');
                const originalBtnHtml = btn.innerHTML;
                btn.disabled = true;
                btn.style.opacity = '0.7';
                btn.innerHTML = `<span><svg class="svg-icon fa-spinner fa-solid fa-spin" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/></svg> ${isEnMode ? 'Submitting...' : 'Đang gửi...'}</span>`;

                try {
                    await Promise.allSettled(promises);

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
                        successMsg.innerHTML = isEnMode ? 'Thank you <strong>' + name + '</strong>. Your request to receive a free <strong>IDEAS AI Platform</strong> account has been submitted and will be processed soon.' : 'Cảm ơn bạn <strong>' + name + '</strong>. Yêu cầu nhận tài khoản <strong>IDEAS AI Platform</strong> miễn phí đã được ghi nhận. Tài khoản trải nghiệm sẽ được gửi qua Email/Zalo của bạn trong thời gian sớm nhất.';
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

    <!-- Script imports -->
    <?php
    $js_path = get_stylesheet_directory() . '/common-assets/js/script.min.js';
    $js_version = file_exists($js_path) ? filemtime($js_path) : time();
    ?>
    <script
        src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/script.min.js?v=<?php echo $js_version; ?>"
        defer></script>

    <!-- Booking Modal script import -->
    <?php
    define('BOOKING_MODAL_JS_LOADED', true);
    $bk_js_path = get_stylesheet_directory() . '/common-assets/js/booking-modal.min.js';
    $bk_js_version = file_exists($bk_js_path) ? filemtime($bk_js_path) : time();
    ?>
    <script
        src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/booking-modal.min.js?v=<?php echo $bk_js_version; ?>"
        defer></script>

</body>
</html>
