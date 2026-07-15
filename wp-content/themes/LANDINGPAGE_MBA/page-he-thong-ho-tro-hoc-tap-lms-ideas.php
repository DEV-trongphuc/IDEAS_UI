<?php
/**
 * The template for displaying the LMS Learning Support page
 * Template Name: Premium LMS Template
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
$is_en = (isset($_GET['lang']) && $_GET['lang'] === 'en');
?>
<!DOCTYPE html>
<html lang="<?php echo $is_en ? 'en' : 'vi'; ?>" prefix="og: https://ogp.me/ns#">

<head>
    <?php get_template_part('shared-head'); ?>

    <!-- Preconnect to external domains for faster resource loading --><!-- Preload LCP hero background image -->
    <link rel="preload" fetchpriority="high" as="image"
        href="https://ideas.edu.vn/wp-content/uploads/2025/08/wsoff16_8.webp" />
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
            <title><?php echo $is_en ? 'LMS System & Comprehensive Learning Ecosystem | IDEAS' : 'Hệ thống LMS &amp; Hệ sinh thái học tập toàn diện | IDEAS'; ?></title>
    <?php endif; ?>
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
            <meta name="description"
                content="<?php echo $is_en ? 'LMS Moodle learning support system, IDEAS AI, and Cengage academic library. Full professional academic support for international program students.' : 'Hệ thống hỗ trợ học tập LMS Moodle, IDEAS AI, và thư viện học thuật Cengage. Hỗ trợ học vụ chuyên nghiệp trọn vẹn dành cho học viên của IDEAS.'; ?>" />
    <?php endif; ?><?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
            <meta property="og:type" content="article" />
            <meta property="og:title" content="<?php echo $is_en ? 'LMS System & Comprehensive Learning Ecosystem | IDEAS' : 'Hệ thống LMS &amp; Hệ sinh thái học tập toàn diện | IDEAS'; ?>" />
            <meta property="og:description"
                content="<?php echo $is_en ? 'Experience modern 4.0 learning with Moodle LMS, smart AI assistant, and a comprehensive 24/7 academic library.' : 'Trải nghiệm học tập hiện đại 4.0 với hệ thống Moodle LMS, trợ lý AI thông minh và thư viện học tập toàn diện 24/7.'; ?>" />
            <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2025/08/wsoff16_8.webp" />
            <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />
    <?php endif; ?><!-- Main stylesheet --><!-- Booking Modal stylesheet -->
    <?php
    define('BOOKING_MODAL_CSS_LOADED', true);
    $bk_css_path = get_stylesheet_directory() . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/booking-modal.min.css?v=<?php echo $bk_css_version; ?>" media="print" onload="this.media='all'" />

    <style>
        /* ══════════════════════════════════════
           LMS SYSTEM PAGE – PREMIUM THEME STYLES
        ══════════════════════════════════════ */
        html,
        body {
            overflow-x: clip !important;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #080405;
            color: #f3f4f6;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            z-index: -1;
            background-image:
                radial-gradient(circle at 15% 20%, rgba(185, 14, 0, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 85% 65%, rgba(185, 14, 0, 0.1) 0%, transparent 50%),
                radial-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 28px 28px;
            pointer-events: none;
            will-change: transform;
        }

        /* Hero Header */
        .lms-hero {
            position: relative;
            padding: 200px 20px 100px;
            text-align: center;
            overflow: hidden;
            background: transparent;
            min-height: 55vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lms-hero-bg {
            position: absolute;
            inset: 0;
            z-index: 1;
            background-image: url('https://ideas.edu.vn/wp-content/uploads/2025/08/wsoff16_8.webp');
            background-size: cover;
            background-position: center;
            opacity: 0.45;
            will-change: transform;
            transform: scale(1.1);
        }

        .lms-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(180deg,
                    rgba(8, 4, 5, 0.9) 0%,
                    rgba(80, 6, 0, 0.5) 60%,
                    rgba(8, 4, 5, 0.95) 100%),
                radial-gradient(ellipse at 50% 50%, rgba(171, 14, 0, 0.28) 0%, transparent 75%);
        }

        .lms-hero-container {
            position: relative;
            z-index: 3;
            max-width: 900px;
            margin: 0 auto;
        }

        .lms-hero-badge {
            background: rgba(171, 14, 0, 0.18);
            border: 1px solid rgba(255, 77, 77, 0.3);
            padding: 8px 20px;
            border-radius: 100px;
            color: #ffcccc;
            font-size: 0.82rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
            backdrop-filter: blur(12px);
        }

        .lms-hero h1 {
            font-size: clamp(2.6rem, 6vw, 4.2rem);
            font-weight: 900;
            margin-bottom: 20px;
            letter-spacing: -0.02em;
            line-height: 1.15;
            color: #ffffff;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
        }

        .lms-hero h1 span {
            background: linear-gradient(135deg, #ff6b6b 0%, #ff3b30 50%, #ab0e00 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .lms-hero p {
            font-size: 1.15rem;
            color: rgba(255, 255, 255, 0.85);
            max-width: 750px;
            margin: 0 auto 36px;
            line-height: 1.65;
            font-weight: 500;
        }

        .verify-slogan {
            font-size: 1.15rem;
            font-weight: 700;
            font-style: italic;
            color: #ffcccc;
            margin-top: 10px;
            margin-bottom: 18px;
            letter-spacing: 0.08em;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
            display: inline-block;
        }

        /* Stats indicators on Hero */
        .lms-hero-stats {
            display: flex;
            justify-content: center;
            gap: 24px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .lms-stat-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 15px 25px;
            border-radius: 16px;
            backdrop-filter: blur(10px);
            min-width: 160px;
            text-align: center;
        }

        .lms-stat-num {
            font-size: 1.8rem;
            font-weight: 800;
            color: #ff3b30;
            display: block;
            margin-bottom: 5px;
            background: linear-gradient(135deg, #ff6b6b, #ff3b30);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .lms-stat-lbl {
            font-size: 0.82rem;
            color: #94a3b8;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* Ecosystem Section Styling */
        .ecosystem-section {
            padding: 100px 20px;
            background: #080a0f;
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
        }

        .eco-orb {
            position: absolute;
            border-radius: 50%;
            z-index: 1;
            pointer-events: none;
            will-change: transform;
        }

        .eco-orb-1 {
            top: 10%;
            left: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(171, 14, 0, 0.22) 0%, rgba(171, 14, 0, 0) 70%);
        }

        .eco-orb-2 {
            bottom: 15%;
            right: -10%;
            width: 450px;
            height: 450px;
            background: radial-gradient(circle, rgba(171, 14, 0, 0.18) 0%, rgba(171, 14, 0, 0) 70%);
        }

        .eco-orb-3 {
            bottom: -5%;
            left: 20%;
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.12) 0%, rgba(79, 70, 229, 0) 70%);
        }

        .eco-inner {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            position: relative;
            z-index: 2;
        }

        .eco-header {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 60px;
        }

        .eco-label-light {
            font-size: 0.8rem;
            font-weight: 800;
            color: #ef4444;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 12px;
            display: inline-block;
        }

        .ecosystem-title {
            font-size: clamp(2.2rem, 5vw, 3.2rem);
            font-weight: 800;
            line-height: 1.25;
            color: #ffffff;
            margin-bottom: 20px;
        }

        .eco-title-accent {
            background: linear-gradient(135deg, #ff6b6b, #ff3b30);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .ecosystem-sub {
            font-size: 1.05rem;
            color: #94a3b8;
            line-height: 1.6;
        }

        .ecosystem-grid-v2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
            margin-top: 40px;
        }

        /* ── Mobile horizontal carousel slider ── */
        .slider-dots {
            display: none;
            justify-content: center;
            gap: 8px;
            margin-top: 24px;
        }

        .slider-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #475569;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .slider-dot.active {
            background: #ff4d4d;
            width: 24px;
            border-radius: 4px;
        }

        /* ── Contrast Overrides for Dark Backgrounds ── */
        body .platform-text h3 {
            color: #ffffff !important;
        }

        body .platform-text p {
            color: #e2e8f0 !important;
            /* light gray for high contrast */
        }

        body .platform-features-list li {
            color: #f1f5f9 !important;
            /* light gray for high contrast */
        }

        body .platform-features-list li i {
            color: #ef4444 !important;
        }

        body .eco-card-v2-desc {
            color: #94a3b8 !important;
        }

        body .eco-card-v2-title {
            color: #ffffff !important;
        }

        body .lms-hero p {
            color: rgba(255, 255, 255, 0.9) !important;
        }

        @media (max-width: 768px) {
            .lms-hero {
                padding: 120px 20px 50px !important;
            }

            .verify-slogan {
                font-size: 0.95rem !important;
                margin-top: 6px;
                margin-bottom: 12px;
                letter-spacing: 0.05em;
            }

            .ecosystem-section,
            .platform-details-section,
            .lms-form-section {
                padding: 60px 20px !important;
            }

            .platform-detail-row {
                margin-bottom: 60px !important;
                gap: 30px !important;
            }

            .platform-text h3 {
                font-size: 1.8rem !important;
            }

            .platform-visual {
                border-radius: 16px !important;
            }

            .ecosystem-grid-v2 {
                display: flex;
                flex-wrap: nowrap;
                overflow-x: auto;
                justify-content: flex-start;
                scroll-snap-type: x mandatory;
                scroll-behavior: smooth;
                padding-bottom: 15px;
                gap: 16px;
                scrollbar-width: none !important;
                /* Firefox */
                margin-left: -20px !important;
                margin-right: -20px !important;
                padding-left: 20px !important;
                padding-right: 20px !important;
            }

            .ecosystem-grid-v2::-webkit-scrollbar {
                display: none !important;
                /* Chrome/Safari */
            }

            .eco-card-v2 {
                flex: 0 0 325px;
                max-width: 325px;
                scroll-snap-align: center;
                padding: 20px 16px;
                flex-direction: row !important;
                gap: 16px !important;
                align-items: flex-start;
            }

            .eco-card-v2-icon--logo {
                width: 60px !important;
                height: 60px !important;
                border-radius: 16px !important;
                padding: 8px !important;
            }

            .slider-dots {
                display: flex;
            }

            /* Stats row in 1 single horizontal row on mobile */
            .lms-hero-stats {
                flex-wrap: nowrap !important;
                gap: 8px !important;
                margin-top: 24px !important;
                width: 100% !important;
                padding: 0 !important;
            }

            .lms-stat-card {
                min-width: 0 !important;
                flex: 1 1 33.33% !important;
                padding: 12px 6px !important;
                border-radius: 12px !important;
            }

            .lms-stat-num {
                font-size: 1.3rem !important;
            }

            .lms-stat-lbl {
                font-size: 0.65rem !important;
                line-height: 1.25 !important;
            }
        }

        .eco-card-v2 {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 24px;
            padding: 30px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            gap: 24px;
        }

        .eco-card-v2:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.04);
            border-color: rgba(171, 14, 0, 0.25);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .eco-card-v2-icon--logo {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.95);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .eco-card-v2-icon--logo img {
            width: 100% !important;
            height: 100% !important;
            object-fit: contain !important;
        }

        .eco-card-v2:hover .eco-card-v2-icon--logo {
            transform: scale(1.05) rotate(2deg);
        }

        .eco-card-v2-body {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .eco-card-v2-num {
            font-size: 0.9rem;
            font-weight: 800;
            color: #ab0e00;
            opacity: 0.8;
            letter-spacing: 0.05em;
        }

        .eco-card-v2-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.3;
        }

        .eco-card-v2-desc {
            font-size: 0.95rem;
            color: #94a3b8;
            line-height: 1.55;
        }

        /* Detail/Feature comparison layout for platforms */
        .platform-details-section {
            padding: 100px 20px;
            background: #0b0f19;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .platform-detail-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            margin-bottom: 100px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .platform-detail-row:last-child {
            margin-bottom: 0;
        }

        .platform-detail-row.reverse {
            direction: rtl;
        }

        .platform-detail-row.reverse .platform-text {
            direction: ltr;
        }

        .platform-text {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .platform-text-badge {
            color: #ef4444;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.82rem;
            letter-spacing: 1.5px;
            margin-bottom: 12px;
        }

        .platform-text h3 {
            font-size: 2.2rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .platform-text p {
            color: #94a3b8;
            line-height: 1.65;
            margin-bottom: 24px;
            font-size: 1rem;
        }

        .platform-features-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .platform-features-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            color: #cbd5e1;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .platform-features-list li i {
            color: #ef4444;
            margin-top: 3px;
        }

        .platform-visual {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.08);
            aspect-ratio: 16 / 10;
        }

        .platform-visual img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Lead Gen Form Section */
        .lms-form-section {
            padding: 80px 20px;
            background: linear-gradient(180deg, #0b0f19 0%, #07090e 100%);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .lms-form-wrapper {
            max-width: 600px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .lms-form-wrapper h3 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 12px;
        }

        .lms-form-wrapper p {
            color: #94a3b8;
            margin-bottom: 30px;
            font-size: 0.95rem;
        }

        @media (max-width: 992px) {

            .platform-detail-row,
            .platform-detail-row.reverse {
                grid-template-columns: 1fr;
                gap: 40px;
                direction: ltr;
            }

            .platform-detail-row.reverse .platform-text {
                direction: ltr;
            }
        }

        @media (max-width: 480px) {
            .lms-form-section {
                padding: 40px 16px;
            }

            .lms-form-wrapper {
                padding: 24px 16px;
                border-radius: 16px;
            }

            .lms-form-wrapper h3 {
                font-size: 1.35rem;
            }

            .lms-form-wrapper p {
                margin-bottom: 20px;
                font-size: 0.85rem;
            }
        }

        /* ── Hero Actions ── */
        .lms-hero-actions {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 16px;
            margin-bottom: 30px;
        }

        .btn-video-watch {
            background: rgba(255, 255, 255, 0.06);
            border: 2.5px solid rgba(255, 255, 255, 0.25);
            color: #ffffff;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13.5px 28px;
            border-radius: 100px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-video-watch i {
            color: #ef4444;
            font-size: 1.15rem;
            transition: transform 0.3s ease;
        }

        .btn-video-watch:hover {
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(255, 255, 255, 0.65);
            transform: translateY(-2px);
        }

        .btn-video-watch:hover i {
            transform: scale(1.15);
        }

        @media (max-width: 768px) {
            .lms-hero-actions {
                flex-direction: column;
                align-items: stretch;
                width: 100%;
                max-width: 320px;
                margin-left: auto;
                margin-right: auto;
                gap: 12px;
            }

            .btn-video-watch {
                justify-content: center;
            }
        }

        /* ── Cengage Blog Post Card ── */
        .cengage-post-card {
            display: flex;
            align-items: center;
            gap: 18px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 16px;
            margin-top: 28px;
            text-decoration: none;
            transition: all 0.35s cubic-bezier(0.25, 1, 0.5, 1);
            max-width: 480px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .cengage-post-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.03), transparent);
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }

        .cengage-post-card:hover::before {
            transform: translateX(100%);
        }

        .cengage-post-card:hover {
            transform: translateY(-4px);
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(239, 68, 68, 0.35);
            box-shadow: 0 12px 30px rgba(239, 68, 68, 0.1);
        }

        .cengage-post-card-img {
            width: 88px;
            height: 88px;
            border-radius: 10px;
            overflow: hidden;
            flex-shrink: 0;
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .cengage-post-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .cengage-post-card:hover .cengage-post-card-img img {
            transform: scale(1.08);
        }

        .cengage-post-card-content {
            display: flex;
            flex-direction: column;
            gap: 6px;
            flex: 1;
        }

        .cengage-post-card-tag {
            font-size: 0.72rem;
            color: #ef4444;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .cengage-post-card-title {
            font-size: 0.95rem;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.4;
            margin: 0;
            transition: color 0.3s ease;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .cengage-post-card:hover .cengage-post-card-title {
            color: #ef4444;
        }

        .cengage-post-card-link {
            font-size: 0.8rem;
            color: #94a3b8;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color 0.3s ease;
        }

        .cengage-post-card-link i {
            font-size: 0.75rem;
            transition: transform 0.3s ease;
        }

        .cengage-post-card:hover .cengage-post-card-link {
            color: #ffffff;
        }

        .cengage-post-card:hover .cengage-post-card-link i {
            transform: translateX(4px);
        }

        @media (max-width: 480px) {
            .cengage-post-card {
                padding: 12px;
                gap: 12px;
                margin-top: 20px;
                max-width: 100%;
            }
            .cengage-post-card-img {
                width: 80px;
                height: 80px;
            }
            .cengage-post-card-title {
                font-size: 0.88rem;
            }
        }
    
        /* ── Clickable Cengage Card Style ── */
        .eco-card-v2-link {
            cursor: pointer !important;
            position: relative;
        }
        .eco-card-v2-link:hover {
            border-color: rgba(239, 68, 68, 0.4) !important;
            background: rgba(255, 255, 255, 0.08) !important;
            box-shadow: 0 10px 25px rgba(239, 68, 68, 0.15) !important;
        }
        .eco-card-v2-link:hover .eco-card-external-icon {
            color: #ef4444 !important;
            transform: translate(2px, -2px) scale(1.1);
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Site Header -->
    <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>


    <!-- Hero Area -->
    <section class="lms-hero" id="lms-hero-top">
        <div class="lms-hero-bg" id="lms-parallax-bg"></div>
        <div class="lms-hero-overlay"></div>
        <div class="lms-hero-container">
            <div class="lms-hero-badge">
                <svg class="svg-icon fa-laptop-code fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M64 96c0-35.3 28.7-64 64-64l384 0c35.3 0 64 28.7 64 64l0 256-64 0 0-256L128 96l0 256-64 0L64 96zM0 403.2C0 392.6 8.6 384 19.2 384l601.6 0c10.6 0 19.2 8.6 19.2 19.2c0 42.4-34.4 76.8-76.8 76.8L76.8 480C34.4 480 0 445.6 0 403.2zM281 209l-31 31 31 31c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-48-48c-9.4-9.4-9.4-24.6 0-33.9l48-48c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9zM393 175l48 48c9.4 9.4 9.4 24.6 0 33.9l-48 48c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l31-31-31-31c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0z"/></svg>
                <?php echo $is_en ? 'Training Technology 4.0' : 'Công Nghệ Đào Tạo 4.0'; ?>
            </div>
            <h1><?php echo $is_en ? 'LMS System <br /> Along with a <span>Learning Ecosystem.</span>' : 'Hệ thống LMS <br /> Cùng <span>hệ sinh thái học tập.</span>'; ?></h1>
            <div class="verify-slogan">
                <?php echo $is_en ? '"Original Knowledge - Localized Mentorship"' : '"Tri thức Nguyên bản - Đồng hành Bản địa"'; ?>
            </div>
            <p><?php echo $is_en ? 'Accompanying professional academic support, a comprehensive digital learning solution optimizing time and enhancing knowledge absorption efficiency for students.' : 'Đồng hành hỗ trợ học vụ chuyên nghiệp, giải pháp học tập số toàn diện giúp tối ưu hóa thời gian và nâng cao hiệu quả tiếp thu kiến thức cho học viên.'; ?></p>
            <div class="lms-hero-actions">
                <button type="button" class="btn btn-primary" onclick="showform('lms-hero')">
                    <?php echo $is_en ? 'Experience the System Now' : 'Trải nghiệm hệ thống ngay'; ?>
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </button>
                <button type="button" class="btn-video-watch" id="btn-watch-video">
                    <svg class="svg-icon fa-circle-play fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9l0 176c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z"/></svg>
                    <?php echo $is_en ? 'Watch Guide Video' : 'Xem video hướng dẫn'; ?>
                </button>
            </div>
            <div class="lms-hero-stats">
                <div class="lms-stat-card">
                    <span class="lms-stat-num">24/7</span>
                    <span class="lms-stat-lbl"><?php echo $is_en ? 'Active Learning' : 'Học Tập Chủ Động'; ?></span>
                </div>
                <div class="lms-stat-card">
                    <span class="lms-stat-num">1.000+</span>
                    <span class="lms-stat-lbl"><?php echo $is_en ? 'Cengage Resources' : 'Tài Liệu Cengage'; ?></span>
                </div>
                <div class="lms-stat-card">
                    <span class="lms-stat-num">100%</span>
                    <span class="lms-stat-lbl"><?php echo $is_en ? 'Vietnamese Support' : 'Bổ Trợ Tiếng Việt'; ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Ecosystem Section (No Workshops/Advisors) -->
    <section class="ecosystem-section">
        <div class="eco-orb eco-orb-1" aria-hidden="true"></div>
        <div class="eco-orb eco-orb-2" aria-hidden="true"></div>
        <div class="eco-orb eco-orb-3" aria-hidden="true"></div>
        <div class="eco-inner">
            <div class="eco-header">
                <div class="eco-label-light"><?php echo $is_en ? 'LEARNING ECOSYSTEM' : 'HỆ SINH THÁI HỌC TẬP'; ?></div>
                <h3 class="ecosystem-title"><?php echo $is_en ? 'Comprehensive Learning Ecosystem<br /><span class="eco-title-accent">always accompanying you</span>' : 'Hệ sinh thái học tập toàn diện<br /><span class="eco-title-accent">luôn đồng hành cùng bạn</span>'; ?></h3>
                <p class="eco-slogan" style="font-style: italic; font-size: 1.1rem; font-weight: 600; color: #ff6b6b; margin-top: 12px; margin-bottom: 12px; text-align: center;">
                    <?php echo $is_en ? '"Original Knowledge - Localized Mentorship"' : '"Tri thức Nguyên bản - Đồng hành Bản địa"'; ?>
                </p>
                <p class="ecosystem-sub"><?php echo $is_en ? 'IDEAS is the official admissions partner of Swiss UMEF, building a comprehensive learning ecosystem for Vietnamese learners.' : 'IDEAS là đối tác tuyển sinh chính thức của Swiss UMEF, xây dựng hệ sinh thái học tập toàn diện cho người học Việt Nam.'; ?></p>
            </div>

            <div class="ecosystem-grid-v2">
                <article class="eco-card-v2">
                    <div class="eco-card-v2-icon eco-card-v2-icon--logo"
                        style="--icon-clr:#ef4444;--icon-bg:rgba(255,255,255,0.95)">
                        <img decoding="async"
                            src="/wp-content/uploads/external-migrated/1280px-Moodle-logo_svg_005cb3ce.webp"
                            alt="Moodle logo" style="width:68px;height:auto;object-fit:contain;" loading="lazy" />
                    </div>
                    <div class="eco-card-v2-body">
                        <h4 class="eco-card-v2-title">LMS Powered by Moodle</h4>
                        <p class="eco-card-v2-desc"><?php echo $is_en ? 'Modern learning platform supporting lecture videos, documents, and assignments - accessible 24/7 anytime, anywhere.' : 'Nền tảng học tập hiện đại, hỗ trợ video bài giảng, tài liệu và bài tập - truy cập 24/7 mọi lúc, mọi nơi.'; ?></p>
                    </div>
                </article>

                <article class="eco-card-v2">
                    <div class="eco-card-v2-icon eco-card-v2-icon--logo"
                        style="--icon-clr:#a78bfa;--icon-bg:rgba(255,255,255,0.95)">
                        <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2026/02/Buffet-AI-R.webp"
                            alt="IDEAS AI Platform logo" style="width:68px;height:auto;object-fit:contain;"
                            loading="lazy" />
                    </div>
                    <div class="eco-card-v2-body">
                        <h4 class="eco-card-v2-title">IDEAS AI Platform</h4>
                        <p class="eco-card-v2-desc"><?php echo $is_en ? 'AI assistant supporting knowledge explanation, literature research, and optimizing effective study time.' : 'Trợ lý AI hỗ trợ giải thích kiến thức, nghiên cứu tài liệu và tối ưu thời gian học tập hiệu quả.'; ?></p>
                    </div>
                </article>

                <a href="https://ideas.edu.vn/tin-tuc-moi/tai-lieu-cengage-tai-ideas.html" target="_blank" rel="noopener" class="eco-card-v2 eco-card-v2-link" style="text-decoration: none; position: relative;">
                        <svg class="svg-icon fa-arrow-up-right-from-square fa-solid eco-card-external-icon" style="position: absolute; top: 20px; right: 20px; color: rgba(255,255,255,0.4); font-size: 0.85rem; transition: all 0.3s;" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg>
                    <div class="eco-card-v2-icon eco-card-v2-icon--logo"
                        style="--icon-clr:#34d399;--icon-bg:rgba(255,255,255,0.95)">
                        <img decoding="async"
                            src="/wp-content/uploads/external-migrated/1280px-Cengage-logo_svg_8308995d.webp"
                            alt="Cengage logo" style="width:68px;height:auto;object-fit:contain;" loading="lazy" />
                    </div>
                    <div class="eco-card-v2-body">
                        <h4 class="eco-card-v2-title"><?php echo $is_en ? 'Cengage Library' : 'Thư viện Cengage'; ?></h4>
                        <p class="eco-card-v2-desc"><?php echo $is_en ? 'Free access to over 1,000 leading academic books in business and management worldwide.' : 'Miễn phí truy cập hơn 1.000 đầu sách học thuật chuyên ngành kinh doanh và quản trị hàng đầu thế giới.'; ?></p>
                    </div>
                </a>

                <article class="eco-card-v2">
                    <div class="eco-card-v2-icon eco-card-v2-icon--logo"
                        style="--icon-clr:#3b82f6;--icon-bg:rgba(255,255,255,0.95)">
                        <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2025/06/log_ideas-optimized.webp"
                            alt="<?php echo $is_en ? 'Topic' : 'Chuyên đề'; ?>" style="width:68px;height:auto;object-fit:contain;" loading="lazy" />
                    </div>
                    <div class="eco-card-v2-body">
                        <h4 class="eco-card-v2-title"><?php echo $is_en ? 'Supplemental Seminars' : 'Lớp chuyên đề bổ trợ'; ?></h4>
                        <p class="eco-card-v2-desc"><?php echo $is_en ? 'Weekend supplemental seminars with lecturers and leading experts, connecting MBA knowledge with reality.' : 'Các buổi chuyên đề cuối tuần cùng giảng viên và chuyên gia đầu ngành, kết nối kiến thức MBA với thực tiễn.'; ?></p>
                    </div>
                </article>
            </div>
                <!-- IDEAS AI PLATFORM VIDEO DEDICATED BLOCK -->
                <div class="ideas-ai-video-block" style="padding: 56px 0 20px 0; position: relative; overflow: hidden; border-top: 1.5px dashed rgba(171, 14, 0, 0.15); margin-top: 48px; z-index: 2;">
                    <!-- Glow background effect -->
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 600px; height: 600px; background: radial-gradient(circle, rgba(217, 38, 38, 0.08) 0%, transparent 70%); pointer-events: none; z-index: 1;"></div>
                    
                    <div class="ideas-ai-grid" style="display: grid; grid-template-columns: 1fr 1.1fr; gap: 48px; align-items: center; position: relative; z-index: 2;">
                        <!-- Left Column: Content -->
                        <div class="ideas-ai-content" style="text-align: left;">
                            <span style="background: rgba(217, 38, 38, 0.15); color: #ff9e9e; font-size: 0.72rem; padding: 6px 16px; border-radius: 100px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.05em; display: inline-flex; align-items: center; gap: 6px; border: 1px solid rgba(217, 38, 38, 0.25); margin-bottom: 20px;">
                                <span class="pulse-dot" style="display:inline-block; width:6px; height:6px; background:#ff4d4d; border-radius:50%; animation: pulse-dot-ai 1.5s infinite;"></span>
                                <?php echo $is_en ? 'IDEAS Exclusive' : 'Độc Quyền Tại IDEAS'; ?>
                            </span>
                            
                            <h3 style="font-size: clamp(1.8rem, 4vw, 2.5rem); font-weight: 900; color: #ffffff; line-height: 1.25; margin: 0 0 20px 0; letter-spacing: -0.02em;">
                                <?php echo $is_en ? '<span class="ideas-ai-title-span">Supercharge your learning journey with</span><br /><span class="gradient-text" style="background: linear-gradient(90deg, #ff4d4d, #ff8585); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-weight:900;">IDEAS AI Platform</span>' : '<span class="ideas-ai-title-span">Trải nghiệm học tập vượt trội với</span><br /><span class="gradient-text" style="background: linear-gradient(90deg, #ff4d4d, #ff8585); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-weight:900;">IDEAS AI Platform</span>'; ?>
                            </h3>
                            
                            <p style="color: #cbd5e1; font-size: 1.05rem; line-height: 1.6; margin-bottom: 28px; max-width: 600px;">
                                <?php echo $is_en ? 'A specialized artificial intelligence assistant platform developed under the academic supervision of IDEAS. Your AI companion supports academic explanations, literature research, and optimizes self-study time 24/7.' : 'Nền tảng trợ lý trí tuệ nhân tạo chuyên biệt được phát triển dưới sự kiểm duyệt chuyên môn của IDEAS. Trợ lý AI đồng hành hỗ trợ học viên giải thích học thuật, nghiên cứu tài liệu và tối ưu hóa thời gian tự học hiệu quả 24/7.'; ?>
                            </p>
                            
                            <!-- List of key values -->
                            <div style="display: flex; flex-direction: column; gap: 16px; margin-bottom: 30px;">
                                <div style="display: flex; align-items: start; gap: 12px;">
                                    <span style="display: flex; align-items: center; justify-content: center; width: 24px; height: 24px; border-radius: 50%; background: rgba(217, 38, 38, 0.2); color: #ff8585; font-weight: 800; font-size: 0.85rem; flex-shrink: 0; margin-top: 2px;">✓</span>
                                    <span style="color: #e2e8f0; font-size: 0.95rem; line-height: 1.4;"><?php echo $is_en ? '<strong>Instant Academic Help:</strong> Get complex management concepts clarified in seconds.' : '<strong>Giải đáp học thuật tức thì:</strong> Hỗ trợ làm rõ các khái niệm quản trị phức tạp chỉ trong vài giây.'; ?></span>
                                </div>
                                <div style="display: flex; align-items: start; gap: 12px;">
                                    <span style="display: flex; align-items: center; justify-content: center; width: 24px; height: 24px; border-radius: 50%; background: rgba(217, 38, 38, 0.2); color: #ff8585; font-weight: 800; font-size: 0.85rem; flex-shrink: 0; margin-top: 2px;">✓</span>
                                    <span style="color: #e2e8f0; font-size: 0.95rem; line-height: 1.4;"><?php echo $is_en ? '<strong>Personalized Guidance:</strong> Acting as your technology tutor accompanying you 24/7.' : '<strong>Cá nhân hóa lộ trình:</strong> Đóng vai trò như gia sử công nghệ đồng hành mọi lúc mọi nơi.'; ?></span>
                                </div>
                                <div style="display: flex; align-items: start; gap: 12px;">
                                    <span style="display: flex; align-items: center; justify-content: center; width: 24px; height: 24px; border-radius: 50%; background: rgba(217, 38, 38, 0.2); color: #ff8585; font-weight: 800; font-size: 0.85rem; flex-shrink: 0; margin-top: 2px;">✓</span>
                                    <span style="color: #e2e8f0; font-size: 0.95rem; line-height: 1.4;"><?php echo $is_en ? '<strong>Secure & Trusted:</strong> Fine-tuned dedicated AI system ensuring accurate study resources.' : '<strong>Bảo mật thông tin:</strong> Hệ thống AI được tinh chỉnh chuyên sâu, đảm bảo tài nguyên học tập chuẩn xác.'; ?></span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Column: Video player -->
                        <div class="ideas-ai-video-wrap" style="position: relative; z-index: 2; display: flex; flex-direction: column; gap: 20px;">
                            <div style="border-radius: 20px; padding: 8px; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); box-shadow: 0 30px 60px rgba(0,0,0,0.4);">
                                <div style="border-radius: 16px; overflow: hidden; position: relative; aspect-ratio: 16/9; background: #000; border: 2px solid rgba(217, 38, 38, 0.35); box-shadow: 0 10px 30px rgba(217, 38, 38, 0.25);">
                                    <iframe src="https://www.youtube.com/embed/09mATwfEE8Q" title="IDEAS AI Platform Demo" style="position: absolute; top:0; left:0; width:100%; height:100%; border:none;" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                            </div>
                            
                            <!-- Register Trial Button under the clip -->
                            <div style="display: flex; justify-content: center;">
                                <a href="<?php echo $is_en ? '/dang-ky-tai-khoan-ai?lang=en' : '/dang-ky-tai-khoan-ai'; ?>" class="ideas-ai-btn" style="display: inline-flex; align-items: center; justify-content: center; padding: 14px 32px; background: #ab0e00; color: #ffffff; font-weight: 700; font-size: 1rem; border-radius: 99px; text-decoration: none; box-shadow: 0 10px 20px rgba(171, 14, 0, 0.25); transition: all 0.3s ease;">
                                    <span><?php echo $is_en ? 'Register AI Account Now' : 'Đăng ký trải nghiệm ngay'; ?></span>
                                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 8px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <style>
                    @keyframes pulse-dot-ai {
                        0% { transform: scale(0.85); opacity: 0.5; }
                        50% { transform: scale(1.2); opacity: 1; }
                        100% { transform: scale(0.85); opacity: 0.5; }
                    }
                    .ideas-ai-btn:hover {
                        background: #8c1000 !important;
                        transform: translateY(-2px);
                        box-shadow: 0 15px 30px rgba(171, 14, 0, 0.4) !important;
                    }
                    @media (min-width: 992px) {
                        .ideas-ai-title-span {
                            white-space: nowrap;
                        }
                    }
                    @media (max-width: 991px) {
                        .ideas-ai-grid {
                            grid-template-columns: 1fr !important;
                            gap: 36px !important;
                        }
                        .ideas-ai-content {
                            text-align: center !important;
                        }
                        .ideas-ai-content div {
                            text-align: left !important;
                        }
                    }
                </style>

        </div>
    </section>

    <!-- Platform Details Section -->
    <section class="platform-details-section">
        <!-- Moodle LMS Detail -->
        <div class="platform-detail-row">
            <div class="platform-text">
                <span class="platform-text-badge"><?php echo $is_en ? 'Core Platform' : 'Nền tảng chính'; ?></span>
                <h3>LMS Powered by Moodle</h3>
                <p><?php echo $is_en ? 'Moodle is the world\'s leading popular learning management system (LMS) used by prestigious universities. At IDEAS, Moodle is smartly configured and maximized visually to accompany students throughout their learning journey:' : 'Moodle là hệ thống quản lý học tập (LMS) phổ biến hàng đầu thế giới được sử dụng bởi các trường đại học danh tiếng. Tại IDEAS, hệ thống Moodle được cấu hình thông minh và trực quan hóa tối đa để đồng hành cùng học viên trong suốt chặng đường học tập:'; ?></p>
                <ul class="platform-features-list">
                    <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> <?php echo $is_en ? 'Watch high-quality recorded lecture videos anytime, anywhere.' : 'Xem video bài giảng ghi hình chất lượng cao mọi lúc mọi nơi.'; ?></li>
                    <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> <?php echo $is_en ? 'Download study materials, curriculum, and lecture slides directly.' : 'Tải tài liệu học tập, giáo trình, slide bài giảng trực tiếp.'; ?></li>
                    <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> <?php echo $is_en ? 'Submit assignments, track grades, and receive feedback directly from lecturers.' : 'Nộp bài tập, theo dõi điểm số và nhận feedback trực tiếp từ giảng viên.'; ?></li>
                    <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> <?php echo $is_en ? 'Discussion forums among students in the classroom.' : 'Diễn đàn trao đổi thảo luận giữa các học viên trong lớp học.'; ?></li>
                </ul>
            </div>
            <div class="platform-visual">
                <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/image-1-1.webp" alt="LMS Moodle interface"
                    loading="lazy" />
            </div>
        </div>

        <!-- AI Platform Detail -->
        <div class="platform-detail-row reverse">
            <div class="platform-text">
                <span class="platform-text-badge"><?php echo $is_en ? 'Academic Assistant 4.0' : 'Trợ lý học thuật 4.0'; ?></span>
                <h3>IDEAS AI Platform</h3>
                <p><?php echo $is_en ? 'An academic support platform integrated with smart Large Language Models (LLM) trained specifically for graduate study environments, helping students resolve academic challenges quickly:' : 'Nền tảng hỗ trợ học vụ tích hợp mô hình ngôn ngữ lớn (LLM) thông minh được huấn luyện chuyên sâu cho môi trường học tập sau đại học, giúp học viên giải quyết nhanh chóng các khó khăn học thuật:'; ?></p>
                <ul class="platform-features-list">
                    <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> <?php echo $is_en ? 'Explain specialized economic and financial terminology in English/Vietnamese.' : 'Giải thích các thuật ngữ chuyên ngành kinh tế, tài chính bằng tiếng Việt.'; ?></li>
                    <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> <?php echo $is_en ? 'Summarize reference materials hundreds of pages long quickly.' : 'Tóm tắt nội dung tài liệu tham khảo dài hàng trăm trang nhanh chóng.'; ?></li>
                    <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> <?php echo $is_en ? 'Suggest research directions and structures for graduation theses.' : 'Gợi ý hướng nghiên cứu và cấu trúc đề án luận văn tốt nghiệp.'; ?></li>
                    <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> <?php echo $is_en ? 'Operating 24/7 with instant responses to relieve self-study pressure.' : 'Hoạt động 24/7 phản hồi tức thì giải tỏa áp lực tự học.'; ?></li>
                </ul>
            </div>
            <div class="platform-visual">
                <img src="https://ideas.edu.vn/wp-content/uploads/2026/03/imgi_18_WS-8-edited.webp"
                    alt="AI Platform interface" loading="lazy" />
            </div>
        </div>

        <!-- Cengage Detail -->
        <div class="platform-detail-row">
            <div class="platform-text">
                <span class="platform-text-badge"><?php echo $is_en ? 'Global Digital Library' : 'Thư viện số toàn cầu'; ?></span>
                <h3><?php echo $is_en ? 'Cengage Digital Library' : 'Thư viện số Cengage'; ?></h3>
                <p><?php echo $is_en ? 'Cengage Learning is one of the world\'s largest educational publishers. Students at IDEAS are granted free access to a massive digital library:' : 'Cengage Learning là một trong những nhà xuất bản giáo dục lớn nhất thế giới. Học viên tại IDEAS được cấp quyền truy cập miễn phí vào kho tàng tri thức số khổng lồ:'; ?></p>
                <ul class="platform-features-list">
                    <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> <?php echo $is_en ? 'Over 1,000+ original English academic books specialized in Economics.' : 'Hơn 1.000+ đầu sách học thuật nguyên bản tiếng Anh chuyên ngành Kinh tế.'; ?></li>
                    <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> <?php echo $is_en ? 'The latest updated textbooks serving MBA/DBA courses.' : 'Các giáo trình cập nhật mới nhất phục vụ cho các môn học MBA/DBA.'; ?></li>
                    <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> <?php echo $is_en ? 'Read books online easily on computers, tablets, and mobile phones.' : 'Đọc sách trực tuyến dễ dàng trên máy tính, máy tính bảng và điện thoại di động.'; ?></li>
                </ul>

                <!-- Blog Post Card Link -->
                <a href="https://ideas.edu.vn/tin-tuc-moi/tai-lieu-cengage-tai-ideas.html" class="cengage-post-card" target="_blank" rel="noopener">
                    <div class="cengage-post-card-img">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/cengage-blog-1.webp" alt="<?php echo $is_en ? 'Cengage materials at IDEAS' : 'Tài liệu Cengage tại IDEAS'; ?>" loading="lazy" />
                    </div>
                    <div class="cengage-post-card-content">
                        <span class="cengage-post-card-tag"><svg class="svg-icon fa-book-open fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M249.6 471.5c10.8 3.8 22.4-4.1 22.4-15.5l0-377.4c0-4.2-1.6-8.4-5-11C247.4 52 202.4 32 144 32C93.5 32 46.3 45.3 18.1 56.1C6.8 60.5 0 71.7 0 83.8L0 454.1c0 11.9 12.8 20.2 24.1 16.5C55.6 460.1 105.5 448 144 448c33.9 0 79 14 105.6 23.5zm76.8 0C353 462 398.1 448 432 448c38.5 0 88.4 12.1 119.9 22.6c11.3 3.8 24.1-4.6 24.1-16.5l0-370.3c0-12.1-6.8-23.3-18.1-27.6C529.7 45.3 482.5 32 432 32c-58.4 0-103.4 20-123 35.6c-3.3 2.6-5 6.8-5 11L304 456c0 11.4 11.7 19.3 22.4 15.5z"/></svg> <?php echo $is_en ? 'Featured Article' : 'Bài viết nổi bật'; ?></span>
                        <h4 class="cengage-post-card-title"><?php echo $is_en ? 'Cengage Materials at IDEAS: The Competitive Edge of Online Learning' : 'Tài liệu Cengage tại IDEAS: Lợi thế cạnh tranh học online'; ?></h4>
                        <span class="cengage-post-card-link"><?php echo $is_en ? 'Read Article' : 'Đọc bài viết'; ?> <svg class="svg-icon fa-arrow-right fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg></span>
                    </div>
                </a>
            </div>
            <div class="platform-visual">
                <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/maxresdefault.webp"
                    alt="Cengage library access" loading="lazy" />
            </div>
        </div>
    </section>

    <!-- Consultation Registration Form -->
    <section class="lms-form-section">
        <div class="lms-form-wrapper">
            <h3><?php echo $is_en ? 'Register to Learn & Experience the System' : 'Đăng ký tìm hiểu &amp; Trải nghiệm hệ thống'; ?></h3>
            <p><?php echo $is_en ? 'Get a trial account for LMS Moodle and receive a free academic path consultation from IDEAS specialists.' : 'Nhận tài khoản dùng thử hệ thống LMS Moodle và nhận tư vấn lộ trình học tập miễn phí từ chuyên viên học vụ IDEAS.'; ?></p>
            <form class="cta-form" id="lms-register-form">
                <div class="form-group" style="margin-bottom: 20px; text-align: left;">
                    <input type="text" placeholder="<?php echo $is_en ? 'Your full name' : 'Họ và tên của bạn'; ?>" required
                        style="width: 100%; padding: 14px 20px; border-radius: 12px; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); color: #fff; font-size: 0.95rem;" />
                </div>
                <div class="form-group" style="margin-bottom: 20px; text-align: left;">
                    <input type="tel" placeholder="<?php echo $is_en ? 'Phone number' : 'Số điện thoại'; ?>" required
                        style="width: 100%; padding: 14px 20px; border-radius: 12px; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); color: #fff; font-size: 0.95rem;" />
                </div>
                <div class="form-group" style="margin-bottom: 20px; text-align: left;">
                    <input type="email" placeholder="<?php echo $is_en ? 'Email address' : 'Địa chỉ email'; ?>" required
                        style="width: 100%; padding: 14px 20px; border-radius: 12px; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); color: #fff; font-size: 0.95rem;" />
                </div>
                <button type="submit" class="btn btn-primary btn-full"
                    style="width: 100%; display: flex; justify-content: center; align-items: center; gap: 8px;">
                    <?php echo $is_en ? 'Register for Consultation Now' : 'Đăng ký tư vấn ngay'; ?>
                    <svg class="svg-icon fa-paper-plane fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480l0-83.6c0-4 1.5-7.8 4.2-10.8L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z"/></svg>
                </button>
            </form>
        </div>
    </section>



    <!-- Parallax Hero Background Scroll Handler -->
    <script>
        const heroBg = document.getElementById('lms-parallax-bg');
        if (heroBg) {
            let ticking = false;
            window.addEventListener('scroll', function () {
                if (!ticking) {
                    requestAnimationFrame(function () {
                        const scrollY = window.scrollY;
                        const heroH = document.getElementById('lms-hero-top').offsetHeight;
                        if (scrollY < heroH + 200) {
                            heroBg.style.transform = 'translate3d(0, ' + (scrollY * 0.3) + 'px, 0) scale(1.1)';
                        }
                        ticking = false;
                    });
                    ticking = true;
                }
            }, { passive: true });
        }
    </script>



    <!-- Form Lead Submission Handlers -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('lms-register-form');
            if (form) {
                form.addEventListener('submit', async (e) => {
                    e.preventDefault();

                    const nameInput = form.querySelector('input[placeholder*="<?php echo $is_en ? 'Your full name' : 'Họ và tên'; ?>"]') || form.querySelector('input[type="text"]');
                    const phoneInput = form.querySelector('input[placeholder*="<?php echo $is_en ? 'Phone number' : 'Số điện thoại'; ?>"]') || form.querySelector('input[type="tel"]');
                    const emailInput = form.querySelector('input[placeholder*="email"]') || form.querySelector('input[type="email"]');

                    const name = nameInput ? nameInput.value.trim() : '';
                    const phone = phoneInput ? phoneInput.value.trim() : '';
                    const email = emailInput ? emailInput.value.trim() : '';

                    if (!name || !phone || !email) {
                        alert('<?php echo $is_en ? 'Please fill in all required fields.' : 'Vui lòng điền đầy đủ các thông tin bắt buộc.'; ?>');
                        return;
                    }

                    // Prepare submission payloads
                    const payload = {
                        form_id: "4fe1eeb0570742a1fdde61af6fc0680c",
                        email: email,
                        firstName: name,
                        phoneNumber: phone,
                        time_dat_lich: "",
                        note_dat_lich: $is_en ? 'Registered from LMS Page' : 'Đăng ký từ trang LMS',
                        chuong_trinh_dat_lich: $is_en ? 'LMS Moodle & Ecosystem' : 'LMS Moodle và Hệ sinh thái'
                    };

                    const webhookPayload = {
                        name: name,
                        phone: phone,
                        email: email,
                        source: "Landing_LMS_Ecosystem",
                        type: "lms_page_registration",
                        tieng_anh: "",
                        hoc_van: "",
                        time_dat_lich: "",
                        chuong_trinh: $is_en ? 'LMS Moodle & Ecosystem' : 'LMS Moodle và Hệ sinh thái',
                        nhu_cau: $is_en ? 'Request consultation and LMS Moodle / AI Assistant trial' : 'Đăng ký tư vấn và cấp tài khoản LMS Moodle / Trợ lý AI'
                    };

                    // Bind UTMs
                    const urlParams = new URLSearchParams(window.location.search);
                    const utmParams = ['utm_campaign', 'utm_source', 'utm_medium', 'utm_content', 'utm_term'];
                    utmParams.forEach(param => {
                        const val = urlParams.get(param);
                        if (val) webhookPayload[param] = val;
                    });

                    // Trigger request
                    const btn = form.querySelector('button[type="submit"]');
                    if (btn) {
                        btn.disabled = true;
                        btn.style.opacity = '0.7';
                    }

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

                        // Handle success
                        alert('<?php echo $is_en ? 'Registration successful! An academic specialist will contact you within 24 working hours.' : 'Đăng ký thành công! Chuyên viên học vụ sẽ liên hệ hỗ trợ bạn trong vòng 24h làm việc.'; ?>');
                        form.reset();
                    } catch (error) {
                        console.error('Submission error:', error);
                        alert('<?php echo $is_en ? 'An error occurred during submission. Please try again later.' : 'Có lỗi xảy ra trong quá trình gửi thông tin. Vui lòng thử lại sau.'; ?>');
                    } finally {
                        if (btn) {
                            btn.disabled = false;
                            btn.style.opacity = '1';
                        }
                    }
                });
            }

            // Ecosystem Card Slider Dots logic on Mobile
            const grid = document.querySelector('.ecosystem-grid-v2');
            if (grid) {
                const dotsContainer = document.createElement('div');
                dotsContainer.className = 'slider-dots';
                grid.parentNode.insertBefore(dotsContainer, grid.nextSibling);

                const cards = grid.querySelectorAll('.eco-card-v2');
                cards.forEach((_, idx) => {
                    const dot = document.createElement('span');
                    dot.className = `slider-dot ${idx === 0 ? 'active' : ''}`;
                    dotsContainer.appendChild(dot);
                });

                let lastActiveIndex = 0;
                grid.addEventListener('scroll', () => {
                    const scrollLeft = grid.scrollLeft;
                    const firstCard = grid.querySelector('.eco-card-v2');
                    if (!firstCard) return;
                    const cardWidth = firstCard.offsetWidth + 16;
                    const activeIndex = Math.round(scrollLeft / cardWidth);

                    if (activeIndex !== lastActiveIndex) {
                        lastActiveIndex = activeIndex;
                        const dots = dotsContainer.querySelectorAll('.slider-dot');
                        dots.forEach((dot, idx) => {
                            dot.classList.toggle('active', idx === activeIndex);
                        });
                    }
                }, { passive: true });
            }
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

    <!-- Video Modal -->
    <div id="video-modal" class="video-modal" role="dialog" aria-modal="true" aria-label="<?php echo $is_en ? 'Instructional Video' : 'Video hướng dẫn'; ?>"
        style="display: none;">
        <div class="video-modal-overlay"></div>
        <div class="video-modal-container">
            <button class="video-modal-close" aria-label="<?php echo $is_en ? 'Close video' : 'Đóng video'; ?>">✕</button>
            <div class="video-modal-content">
                <div class="iframe-container">
                    <iframe id="video-iframe" src="" title="<?php echo $is_en ? 'Guide Video' : 'Video hướng dẫn'; ?>" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function () {
            function initVideoModal() {
                const watchBtn = document.getElementById('btn-watch-video');
                const videoModal = document.getElementById('video-modal');
                const videoIframe = document.getElementById('video-iframe');
                const closeBtn = videoModal ? videoModal.querySelector('.video-modal-close') : null;
                const overlay = videoModal ? videoModal.querySelector('.video-modal-overlay') : null;

                if (watchBtn && videoModal && videoIframe) {
                    const videoSrc = "https://www.youtube.com/embed/utWSqda6Wlg?autoplay=1";

                    function openVideo() {
                        videoIframe.src = videoSrc;
                        videoModal.style.display = 'flex';
                        // Force reflow
                        videoModal.offsetHeight;
                        videoModal.classList.add('open');
                        document.body.style.overflow = 'hidden';
                    }

                    function closeVideo() {
                        videoModal.classList.remove('open');
                        document.body.style.overflow = '';
                        setTimeout(() => {
                            videoIframe.src = '';
                            videoModal.style.display = 'none';
                        }, 300);
                    }

                    watchBtn.addEventListener('click', openVideo);
                    closeBtn?.addEventListener('click', closeVideo);
                    overlay?.addEventListener('click', closeVideo);

                    document.addEventListener('keydown', function (e) {
                        if (e.key === 'Escape' && videoModal.classList.contains('open')) {
                            closeVideo();
                        }
                    });
                }
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initVideoModal);
            } else {
                initVideoModal();
            }
        })();
    </script>

    <?php get_footer(); ?>