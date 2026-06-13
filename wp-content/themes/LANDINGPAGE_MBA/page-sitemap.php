<?php
/**
 * The template for displaying the HTML Sitemap page
 * Template Name: Premium Sitemap Template
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

    <!-- Preconnect to external domains for faster resource loading --><?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php echo $is_en ? 'Sitemap – Website Sitemap | IDEAS' : 'Sơ đồ trang web – Sitemap | IDEAS'; ?></title>
    <?php endif; ?>
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta name="description"
            content="<?php echo $is_en ? 'Sitemap of the entire website, introductory info, Bachelor, Master, Doctor programs, and academic services at IDEAS.' : 'Sơ đồ toàn bộ trang web, thông tin giới thiệu, chương trình đào tạo Cử nhân, Thạc sĩ, Tiến sĩ và dịch vụ học tập tại Viện IDEAS.'; ?>" />
    <?php endif; ?><?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $is_en ? 'Sitemap – Website Sitemap | IDEAS' : 'Sơ đồ trang web – Sitemap | IDEAS'; ?>" />
        <meta property="og:description"
            content="<?php echo $is_en ? 'Quick and easy access to all articles, academic categories, and services of the IDEAS Institute.' : 'Truy cập nhanh chóng và dễ dàng đến tất cả các bài viết, chuyên mục đào tạo và dịch vụ của Viện IDEAS.'; ?>" />
        <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg-optimized.webp" />
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
           SITEMAP PAGE – PREMIUM DARK THEME
           ══════════════════════════════════════ */
        html,
        body {
            overflow-x: clip !important;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
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

        /* ── Hero ──────────────────────────── */
        .sitemap-hero {
            position: relative;
            padding: 180px 20px 70px;
            text-align: center;
            overflow: hidden;
            background: transparent;
        }

        .sitemap-hero-container {
            position: relative;
            z-index: 3;
            max-width: 900px;
            margin: 0 auto;
        }

        .sitemap-hero-badge {
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

        .sitemap-hero h1 {
            font-size: clamp(2.4rem, 5.5vw, 3.8rem);
            font-weight: 900;
            margin-bottom: 20px;
            letter-spacing: -0.02em;
            line-height: 1.15;
            color: #ffffff !important;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }

        .sitemap-hero h1 span {
            background: linear-gradient(135deg, #ff8e8e 0%, #ff4f4f 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }

        .sitemap-hero p {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.85) !important;
            max-width: 650px;
            margin: 0 auto;
            line-height: 1.6;
            font-weight: 500;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
        }

        /* ── Search Bar ────────────────────── */
        .sitemap-search-container {
            max-width: 500px;
            margin: 0 auto 50px;
            position: relative;
            z-index: 10;
            padding: 0 20px;
        }

        .sitemap-search-wrapper {
            position: relative;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 100px;
            padding: 4px 6px;
            backdrop-filter: blur(12px);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }

        .sitemap-search-wrapper:focus-within {
            border-color: rgba(255, 59, 48, 0.45);
            box-shadow: 0 0 25px rgba(171, 14, 0, 0.25);
            background: rgba(255, 255, 255, 0.05);
        }

        .sitemap-search-input {
            width: 100%;
            background: transparent;
            border: none;
            outline: none;
            color: #ffffff;
            font-size: 0.95rem;
            padding: 10px 18px;
            font-family: inherit;
        }

        .sitemap-search-input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .sitemap-search-icon {
            color: rgba(255, 255, 255, 0.4);
            margin-right: 18px;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .sitemap-search-wrapper:focus-within .sitemap-search-icon {
            color: #ff4f4f;
        }

        /* ── Sitemap Grid ──────────────────── */
        .sitemap-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px 100px;
        }

        @media (max-width: 992px) {
            .sitemap-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }

        @media (max-width: 768px) {
            .sitemap-hero {
                padding: 130px 16px 40px !important;
            }

            .sitemap-hero h1 {
                font-size: 2.2rem;
            }

            .sitemap-hero p {
                font-size: 0.95rem;
            }

            .sitemap-search-container {
                margin-bottom: 35px;
            }

            .sitemap-grid {
                grid-template-columns: 1fr;
                gap: 20px;
                padding-bottom: 60px;
            }
        }

        .sitemap-card {
            background: rgba(255, 255, 255, 0.01);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 24px;
            padding: 30px;
            backdrop-filter: blur(20px);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .sitemap-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #ff8e8e, #ff3b30);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sitemap-card:hover {
            transform: translateY(-6px);
            border-color: rgba(255, 59, 48, 0.25);
            box-shadow:
                0 20px 40px rgba(0, 0, 0, 0.4),
                0 0 25px rgba(171, 14, 0, 0.15);
        }

        .sitemap-card:hover::before {
            opacity: 1;
        }

        .sitemap-card-title {
            font-size: 1.2rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 22px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            padding-bottom: 14px;
        }

        .sitemap-card-title i {
            color: #ff3b30;
            font-size: 1.1rem;
        }

        .sitemap-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .sitemap-item {
            transition: all 0.3s ease;
        }

        .sitemap-item.filtered-out {
            display: none !important;
        }

        .sitemap-link {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            text-decoration: none;
            color: rgba(255, 255, 255, 0.75);
            transition: all 0.25s ease;
            padding: 4px 0;
        }

        .sitemap-link:hover {
            color: #ff8e8e;
            transform: translateX(5px);
        }

        .sitemap-link i {
            margin-top: 4px;
            color: rgba(255, 77, 77, 0.55);
            font-size: 0.9rem;
            transition: color 0.3s ease;
            flex-shrink: 0;
        }

        .sitemap-link:hover i {
            color: #ff4f4f;
        }

        .sitemap-item-content {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .sitemap-item-title {
            font-size: 0.95rem;
            font-weight: 700;
            line-height: 1.35;
        }

        .sitemap-item-desc {
            font-size: 0.78rem;
            color: rgba(255, 255, 255, 0.42);
            line-height: 1.4;
        }

        /* ── No Results State ──────────────── */
        .sitemap-no-results {
            grid-column: 1 / -1;
            text-align: center;
            padding: 50px 30px;
            background: rgba(255, 255, 255, 0.01);
            border: 1px dashed rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            color: rgba(255, 255, 255, 0.5);
            display: none;
            animation: fadeIn 0.3s ease;
        }

        .sitemap-no-results i {
            font-size: 2.2rem;
            color: #ff3b30;
            margin-bottom: 14px;
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>

    <main id="content">
        <!-- Hero Section -->
        <section class="sitemap-hero">
            <div class="sitemap-hero-container">
                <span class="sitemap-hero-badge">
                    <svg class="svg-icon fa-sitemap fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M208 80c0-26.5 21.5-48 48-48l64 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-8 0 0 40 152 0c30.9 0 56 25.1 56 56l0 32 8 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-64 0c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48l8 0 0-32c0-4.4-3.6-8-8-8l-152 0 0 40 8 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-64 0c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48l8 0 0-40-152 0c-4.4 0-8 3.6-8 8l0 32 8 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-64 0c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48l8 0 0-32c0-30.9 25.1-56 56-56l152 0 0-40-8 0c-26.5 0-48-21.5-48-48l0-64z"/></svg> <?php echo $is_en ? 'Sitemap / Navigation' : 'Sơ đồ trang web'; ?>
                </span>
                <h1><span><?php echo $is_en ? 'WEBSITE SITEMAP' : 'SƠ ĐỒ TRANG WEB'; ?></span> <br>Website Sitemap</h1>
                <p><?php echo $is_en ? 'Explore the entire website structure, easily navigate and quickly access academic programs, support policies &amp; activities of IDEAS.' : 'Khám phá toàn bộ cấu trúc website, dễ dàng định hướng và truy cập nhanh các chương trình đào tạo,\n                    chính sách hỗ trợ &amp; hoạt động của Viện IDEAS.'; ?></p>
            </div>
        </section>

        <!-- Search Bar Section -->
        <section class="sitemap-search-container">
            <div class="sitemap-search-wrapper">
                <input type="text" id="sitemap-search" class="sitemap-search-input"
                    placeholder="<?php echo $is_en ? 'Search academic pages, courses, policies...' : 'Tìm kiếm trang học vụ, khóa học, chính sách...'; ?>" autocomplete="off">
                <svg class="svg-icon fa-magnifying-glass fa-solid sitemap-search-icon" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
            </div>
        </section>

        <!-- Sitemap Grid Section -->
        <section class="sitemap-grid" id="sitemap-grid">

            <!-- Card 1: Giới thiệu & Định hướng -->
            <div class="sitemap-card">
                <h3 class="sitemap-card-title"><svg class="svg-icon fa-circle-info fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336l24 0 0-64-24 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l48 0c13.3 0 24 10.7 24 24l0 88 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-80 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg> <?php echo $is_en ? 'About &amp; News' : 'Giới thiệu &amp; Tin tức'; ?></h3>
                <ul class="sitemap-list">
                    <li class="sitemap-item">
                        <a href="<?php echo $is_en ? '/?lang=en' : '/'; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-house fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title"><?php echo $is_en ? 'Home' : 'Trang chủ'; ?></span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'Overview of IDEAS Institute and systems' : 'Tổng quan về Viện IDEAS và các hệ thống'; ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="<?php echo $is_en ? '/en/lms-ecosystem' : '/he-thong-ho-tro-hoc-tap-lms-ideas'; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-layer-group fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title"><?php echo $is_en ? 'LMS Ecosystem' : 'Hệ thống LMS'; ?></span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'Learning portal, Cengage library &amp; AI assistant' : 'Cổng học tập, thư viện Cengage &amp; trợ lý AI'; ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="<?php echo $is_en ? '/en/faculty' : '/doi-ngu-giang-vien'; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-user-graduate fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439.9 42.7 448 52.6 448 64s-8.1 21.3-19.3 23.5L352 102.9l0 57.1c0 70.7-57.3 128-128 128s-128-57.3-128-128l0-57.1L48 93.3l0 65.1 15.7 78.4c.9 4.7-.3 9.6-3.3 13.3s-7.6 5.9-12.4 5.9l-32 0c-4.8 0-9.3-2.1-12.4-5.9s-4.3-8.6-3.3-13.3L16 158.4l0-71.8C6.5 83.3 0 74.3 0 64C0 52.6 8.1 42.7 19.3 40.5l200-40zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7L30.7 512C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title"><?php echo $is_en ? 'Academic Advisory Board' : 'Hội đồng chuyên môn'; ?></span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'Team of professors, experts and scientific advisors' : 'Đội ngũ giáo sư, chuyên gia và cố vấn khoa học'; ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="<?php echo $is_en ? '/en/events' : '/dong-su-kien'; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-clock fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title"><?php echo $is_en ? 'Events Timeline' : 'Dòng sự kiện'; ?></span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'Events, seminars and extracurricular activities' : 'Các sự kiện, hội thảo và hoạt động ngoại khóa'; ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="<?php echo $is_en ? '/en/history' : '/lich-su-hinh-thanh-va-phat-trien-vien-ideas'; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-landmark fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M240.1 4.2c9.8-5.6 21.9-5.6 31.8 0l171.8 98.1L448 104l0 .9 47.9 27.4c12.6 7.2 18.8 22 15.1 36s-16.4 23.8-30.9 23.8L32 192c-14.5 0-27.2-9.8-30.9-23.8s2.5-28.8 15.1-36L64 104.9l0-.9 4.4-1.6L240.1 4.2zM64 224l64 0 0 192 40 0 0-192 64 0 0 192 48 0 0-192 64 0 0 192 40 0 0-192 64 0 0 196.3c.6 .3 1.2 .7 1.8 1.1l48 32c11.7 7.8 17 22.4 12.9 35.9S494.1 512 480 512L32 512c-14.1 0-26.5-9.2-30.6-22.7s1.1-28.1 12.9-35.9l48-32c.6-.4 1.2-.7 1.8-1.1L64 224z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title"><?php echo $is_en ? 'History &amp; Development' : 'Lịch sử phát triển'; ?></span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? '15-year journey of formation &amp; development' : 'Chặng đường 15 năm hình thành &amp; phát triển'; ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="<?php echo $is_en ? '/en/organizational-chart' : '/so-do-to-chuc'; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-sitemap fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M208 80c0-26.5 21.5-48 48-48l64 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-8 0 0 40 152 0c30.9 0 56 25.1 56 56l0 32 8 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-64 0c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48l8 0 0-32c0-4.4-3.6-8-8-8l-152 0 0 40 8 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-64 0c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48l8 0 0-40-152 0c-4.4 0-8 3.6-8 8l0 32 8 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-64 0c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48l8 0 0-32c0-30.9 25.1-56 56-56l152 0 0-40-8 0c-26.5 0-48-21.5-48-48l0-64z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title"><?php echo $is_en ? 'Organizational Chart' : 'Sơ đồ tổ chức'; ?></span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'Management structure &amp; academic board' : 'Cơ cấu tổ chức điều hành &amp; ban chuyên môn'; ?></span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Card 2: Chương trình Thạc sĩ -->
            <div class="sitemap-card">
                <h3 class="sitemap-card-title"><svg class="svg-icon fa-graduation-cap fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg> <?php echo $is_en ? 'Master Programs' : 'Chương trình Thạc sĩ'; ?></h3>
                <ul class="sitemap-list">
                    <li class="sitemap-item">
                        <a href="<?php echo $is_en ? '/en/online-mba-admission' : '/mba'; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-book fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 0C43 0 0 43 0 96L0 416c0 53 43 96 96 96l288 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64c17.7 0 32-14.3 32-32l0-320c0-17.7-14.3-32-32-32L384 0 96 0zm0 384l256 0 0 64L96 448c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16zm16 48l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Online MBA</span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'Swiss Online Master of Business Administration' : 'Thạc sĩ Quản trị Kinh doanh Trực tuyến Thụy Sĩ'; ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/emba<?php echo $is_en ? '?lang=en' : ''; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-user-tie fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7l131.7 0c0 0 0 0 .1 0l5.5 0 112 0 5.5 0c0 0 0 0 .1 0l131.7 0c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2L224 304l-19.7 0c-12.4 0-20.1 13.6-13.7 24.2z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Executive MBA</span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'High-quality Executive Master of Business Administration' : 'Thạc sĩ Điều hành Quản trị Kinh doanh chất lượng cao'; ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/mscai<?php echo $is_en ? '?lang=en' : ''; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-robot fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 0c17.7 0 32 14.3 32 32l0 64 120 0c39.8 0 72 32.2 72 72l0 272c0 39.8-32.2 72-72 72l-304 0c-39.8 0-72-32.2-72-72l0-272c0-39.8 32.2-72 72-72l120 0 0-64c0-17.7 14.3-32 32-32zM208 384c-8.8 0-16 7.2-16 16s7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-32 0zm96 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-32 0zm96 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-32 0zM264 256a40 40 0 1 0 -80 0 40 40 0 1 0 80 0zm152 40a40 40 0 1 0 0-80 40 40 0 1 0 0 80zM48 224l16 0 0 192-16 0c-26.5 0-48-21.5-48-48l0-96c0-26.5 21.5-48 48-48zm544 0c26.5 0 48 21.5 48 48l0 96c0 26.5-21.5 48-48 48l-16 0 0-192 16 0z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Master AI (MSc AI)</span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'Master of Science in Applied Artificial Intelligence' : 'Thạc sĩ Khoa học Trí tuệ Nhân tạo ứng dụng'; ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/mbainai<?php echo $is_en ? '?lang=en' : ''; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-brain fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M184 0c30.9 0 56 25.1 56 56l0 400c0 30.9-25.1 56-56 56c-28.9 0-52.7-21.9-55.7-50.1c-5.2 1.4-10.7 2.1-16.3 2.1c-35.3 0-64-28.7-64-64c0-7.4 1.3-14.6 3.6-21.2C21.4 367.4 0 338.2 0 304c0-31.9 18.7-59.5 45.8-72.3C37.1 220.8 32 207 32 192c0-30.7 21.6-56.3 50.4-62.6C80.8 123.9 80 118 80 112c0-29.9 20.6-55.1 48.3-62.1C131.3 21.9 155.1 0 184 0zM328 0c28.9 0 52.6 21.9 55.7 49.9c27.8 7 48.3 32.1 48.3 62.1c0 6-.8 11.9-2.4 17.4c28.8 6.2 50.4 31.9 50.4 62.6c0 15-5.1 28.8-13.8 39.7C493.3 244.5 512 272.1 512 304c0 34.2-21.4 63.4-51.6 74.8c2.3 6.6 3.6 13.8 3.6 21.2c0 35.3-28.7 64-64 64c-5.6 0-11.1-.7-16.3-2.1c-3 28.2-26.8 50.1-55.7 50.1c-30.9 0-56-25.1-56-56l0-400c0-30.9 25.1-56 56-56z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">MBA in AI</span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'MBA integrated with Artificial Intelligence Application' : 'Thạc sĩ QTKD tích hợp Ứng dụng Trí tuệ Nhân tạo'; ?></span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Card 3: Cử nhân & Tiến sĩ -->
            <div class="sitemap-card">
                <h3 class="sitemap-card-title"><svg class="svg-icon fa-award fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"/></svg> <?php echo $is_en ? 'Bachelor &amp; Doctoral' : 'Cử nhân &amp; Tiến sĩ'; ?></h3>
                <ul class="sitemap-list">
                    <li class="sitemap-item">
                        <a href="/bba<?php echo $is_en ? '?lang=en' : ''; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-school-flag fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M288 0L400 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-79.3 0 89.6 64L512 160c35.3 0 64 28.7 64 64l0 224c0 35.3-28.7 64-64 64l-176 0 0-112c0-26.5-21.5-48-48-48s-48 21.5-48 48l0 112L64 512c-35.3 0-64-28.7-64-64L0 224c0-35.3 28.7-64 64-64l101.7 0L256 95.5 256 32c0-17.7 14.3-32 32-32zm48 240a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM80 224c-8.8 0-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-32 0zm368 16l0 64c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zM80 352c-8.8 0-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-32 0zm384 0c-8.8 0-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-32 0z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Top-up BBA</span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? '12-month BBA Top-up for International Degree' : 'Liên thông Cử nhân QTKD 12 tháng lấy bằng Quốc tế'; ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/fullbba<?php echo $is_en ? '?lang=en' : ''; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-award fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Global Online BBA</span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'Swiss Full-time Online Bachelor of Business Administration' : 'Cử nhân Quản trị Kinh doanh chính quy Thụy Sĩ'; ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/dual-dba-estiam-rb<?php echo $is_en ? '?lang=en' : ''; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-user-doctor fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1l0 50.8c27.6 7.1 48 32.2 48 62l0 40c0 8.8-7.2 16-16 16l-16 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l0-24c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 24c8.8 0 16 7.2 16 16s-7.2 16-16 16l-16 0c-8.8 0-16-7.2-16-16l0-40c0-29.8 20.4-54.9 48-62l0-57.1c-6-.6-12.1-.9-18.3-.9l-91.4 0c-6.2 0-12.3 .3-18.3 .9l0 65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7l0-59.1zM144 448a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Dual DBA</span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'Dual Doctor of Business Administration from UK &amp; France' : 'Tiến sĩ Quản trị Kinh doanh song bằng Anh &amp; Pháp'; ?></span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Card 4: Chính sách & Học phí -->
            <div class="sitemap-card">
                <h3 class="sitemap-card-title"><svg class="svg-icon fa-hand-holding-dollar fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M312 24l0 10.5c6.4 1.2 12.6 2.7 18.2 4.2c12.8 3.4 20.4 16.6 17 29.4s-16.6 20.4-29.4 17c-10.9-2.9-21.1-4.9-30.2-5c-7.3-.1-14.7 1.7-19.4 4.4c-2.1 1.3-3.1 2.4-3.5 3c-.3 .5-.7 1.2-.7 2.8c0 .3 0 .5 0 .6c.2 .2 .9 1.2 3.3 2.6c5.8 3.5 14.4 6.2 27.4 10.1l.9 .3s0 0 0 0c11.1 3.3 25.9 7.8 37.9 15.3c13.7 8.6 26.1 22.9 26.4 44.9c.3 22.5-11.4 38.9-26.7 48.5c-6.7 4.1-13.9 7-21.3 8.8l0 10.6c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-11.4c-9.5-2.3-18.2-5.3-25.6-7.8c-2.1-.7-4.1-1.4-6-2c-12.6-4.2-19.4-17.8-15.2-30.4s17.8-19.4 30.4-15.2c2.6 .9 5 1.7 7.3 2.5c13.6 4.6 23.4 7.9 33.9 8.3c8 .3 15.1-1.6 19.2-4.1c1.9-1.2 2.8-2.2 3.2-2.9c.4-.6 .9-1.8 .8-4.1l0-.2c0-1 0-2.1-4-4.6c-5.7-3.6-14.3-6.4-27.1-10.3l-1.9-.6c-10.8-3.2-25-7.5-36.4-14.4c-13.5-8.1-26.5-22-26.6-44.1c-.1-22.9 12.9-38.6 27.7-47.4c6.4-3.8 13.3-6.4 20.2-8.2L264 24c0-13.3 10.7-24 24-24s24 10.7 24 24zM568.2 336.3c13.1 17.8 9.3 42.8-8.5 55.9L433.1 485.5c-23.4 17.2-51.6 26.5-80.7 26.5L192 512 32 512c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l36.8 0 44.9-36c22.7-18.2 50.9-28 80-28l78.3 0 16 0 64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0-16 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l120.6 0 119.7-88.2c17.8-13.1 42.8-9.3 55.9 8.5zM193.6 384c0 0 0 0 0 0l-.9 0c.3 0 .6 0 .9 0z"/></svg> <?php echo $is_en ? 'Policies &amp; Tuition Fees' : 'Chính sách &amp; Học phí'; ?></h3>
                <ul class="sitemap-list">
                    <li class="sitemap-item">
                        <a href="<?php echo $is_en ? '/en/sacombank-financing' : '/ho-tro-tai-chinh-sacombank'; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-circle-dollar-to-slot fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M326.7 403.7c-22.1 8-45.9 12.3-70.7 12.3s-48.7-4.4-70.7-12.3l-.8-.3c-30-11-56.8-28.7-78.6-51.4C70 314.6 48 263.9 48 208C48 93.1 141.1 0 256 0S464 93.1 464 208c0 55.9-22 106.6-57.9 144c-1 1-2 2.1-3 3.1c-21.4 21.4-47.4 38.1-76.3 48.6zM256 91.9c-11.1 0-20.1 9-20.1 20.1l0 6c-5.6 1.2-10.9 2.9-15.9 5.1c-15 6.8-27.9 19.4-31.1 37.7c-1.8 10.2-.8 20 3.4 29c4.2 8.8 10.7 15 17.3 19.5c11.6 7.9 26.9 12.5 38.6 16l2.2 .7c13.9 4.2 23.4 7.4 29.3 11.7c2.5 1.8 3.4 3.2 3.7 4c.3 .8 .9 2.6 .2 6.7c-.6 3.5-2.5 6.4-8 8.8c-6.1 2.6-16 3.9-28.8 1.9c-6-1-16.7-4.6-26.2-7.9c0 0 0 0 0 0s0 0 0 0s0 0 0 0c-2.2-.7-4.3-1.5-6.4-2.1c-10.5-3.5-21.8 2.2-25.3 12.7s2.2 21.8 12.7 25.3c1.2 .4 2.7 .9 4.4 1.5c7.9 2.7 20.3 6.9 29.8 9.1l0 6.4c0 11.1 9 20.1 20.1 20.1s20.1-9 20.1-20.1l0-5.5c5.3-1 10.5-2.5 15.4-4.6c15.7-6.7 28.4-19.7 31.6-38.7c1.8-10.4 1-20.3-3-29.4c-3.9-9-10.2-15.6-16.9-20.5c-12.2-8.8-28.3-13.7-40.4-17.4l-.8-.2c-14.2-4.3-23.8-7.3-29.9-11.4c-2.6-1.8-3.4-3-3.6-3.5c-.2-.3-.7-1.6-.1-5c.3-1.9 1.9-5.2 8.2-8.1c6.4-2.9 16.4-4.5 28.6-2.6c4.3 .7 17.9 3.3 21.7 4.3c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-4.4-1.2-14.4-3.2-21-4.4l0-6.3c0-11.1-9-20.1-20.1-20.1zM48 352l16 0c19.5 25.9 44 47.7 72.2 64L64 416l0 32 192 0 192 0 0-32-72.2 0c28.2-16.3 52.8-38.1 72.2-64l16 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title"><?php echo $is_en ? 'Tuition Installment' : 'Trả góp học phí'; ?></span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? '0% interest rate tuition installment support with Sacombank' : 'Hỗ trợ trả góp học phí 0% lãi suất với Sacombank'; ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="<?php echo $is_en ? '/en/tuition-fees' : '/cac-khoan-chi-phi'; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-file-invoice-dollar fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM64 80c0-8.8 7.2-16 16-16l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L80 96c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16zm128 72c8.8 0 16 7.2 16 16l0 17.3c8.5 1.2 16.7 3.1 24.1 5.1c8.5 2.3 13.6 11 11.3 19.6s-11 13.6-19.6 11.3c-11.1-3-22-5.2-32.1-5.3c-8.4-.1-17.4 1.8-23.6 5.5c-5.7 3.4-8.1 7.3-8.1 12.8c0 3.7 1.3 6.5 7.3 10.1c6.9 4.1 16.6 7.1 29.2 10.9l.5 .1s0 0 0 0s0 0 0 0c11.3 3.4 25.3 7.6 36.3 14.6c12.1 7.6 22.4 19.7 22.7 38.2c.3 19.3-9.6 33.3-22.9 41.6c-7.7 4.8-16.4 7.6-25.1 9.1l0 17.1c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-17.8c-11.2-2.1-21.7-5.7-30.9-8.9c0 0 0 0 0 0c-2.1-.7-4.2-1.4-6.2-2.1c-8.4-2.8-12.9-11.9-10.1-20.2s11.9-12.9 20.2-10.1c2.5 .8 4.8 1.6 7.1 2.4c0 0 0 0 0 0s0 0 0 0s0 0 0 0c13.6 4.6 24.6 8.4 36.3 8.7c9.1 .3 17.9-1.7 23.7-5.3c5.1-3.2 7.9-7.3 7.8-14c-.1-4.6-1.8-7.8-7.7-11.6c-6.8-4.3-16.5-7.4-29-11.2l-1.6-.5s0 0 0 0c-11-3.3-24.3-7.3-34.8-13.7c-12-7.2-22.6-18.9-22.7-37.3c-.1-19.4 10.8-32.8 23.8-40.5c7.5-4.4 15.8-7.2 24.1-8.7l0-17.3c0-8.8 7.2-16 16-16z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title"><?php echo $is_en ? 'Tuition Fees &amp; Expenses' : 'Các khoản chi phí'; ?></span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'Transparent schedule of fees &amp; financial regulations' : 'Minh bạch biểu phí học trình &amp; quy chế tài chính'; ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="<?php echo $is_en ? '/en/ambassador' : '/ideas-ambassador'; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-medal fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M4.1 38.2C1.4 34.2 0 29.4 0 24.6C0 11 11 0 24.6 0L133.9 0c11.2 0 21.7 5.9 27.4 15.5l68.5 114.1c-48.2 6.1-91.3 28.6-123.4 61.9L4.1 38.2zm503.7 0L405.6 191.5c-32.1-33.3-75.2-55.8-123.4-61.9L350.7 15.5C356.5 5.9 366.9 0 378.1 0L487.4 0C501 0 512 11 512 24.6c0 4.8-1.4 9.6-4.1 13.6zM80 336a176 176 0 1 1 352 0A176 176 0 1 1 80 336zm184.4-94.9c-3.4-7-13.3-7-16.8 0l-22.4 45.4c-1.4 2.8-4 4.7-7 5.1L168 298.9c-7.7 1.1-10.7 10.5-5.2 16l36.3 35.4c2.2 2.2 3.2 5.2 2.7 8.3l-8.6 49.9c-1.3 7.6 6.7 13.5 13.6 9.9l44.8-23.6c2.7-1.4 6-1.4 8.7 0l44.8 23.6c6.9 3.6 14.9-2.2 13.6-9.9l-8.6-49.9c-.5-3 .5-6.1 2.7-8.3l36.3-35.4c5.6-5.4 2.5-14.8-5.2-16l-50.1-7.3c-3-.4-5.7-2.4-7-5.1l-22.4-45.4z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">IDEAS - Ambassador</span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'Scholarship program &amp; student networking ambassador' : 'Chương trình học bổng &amp; đại sứ kết nối học viên'; ?></span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Card 5: Bản tin & Truyền thông -->
            <div class="sitemap-card">
                <h3 class="sitemap-card-title"><svg class="svg-icon fa-bullhorn fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M480 32c0-12.9-7.8-24.6-19.8-29.6s-25.7-2.2-34.9 6.9L381.7 53c-48 48-113.1 75-181 75l-8.7 0-32 0-96 0c-35.3 0-64 28.7-64 64l0 96c0 35.3 28.7 64 64 64l0 128c0 17.7 14.3 32 32 32l64 0c17.7 0 32-14.3 32-32l0-128 8.7 0c67.9 0 133 27 181 75l43.6 43.6c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6l0-147.6c18.6-8.8 32-32.5 32-60.4s-13.4-51.6-32-60.4L480 32zm-64 76.7L416 240l0 131.3C357.2 317.8 280.5 288 200.7 288l-8.7 0 0-96 8.7 0c79.8 0 156.5-29.8 215.3-83.3z"/></svg> <?php echo $is_en ? 'News &amp; Media' : 'Bản tin &amp; Truyền thông'; ?></h3>
                <ul class="sitemap-list">
                    <li class="sitemap-item">
                        <a href="/bai-viet<?php echo $is_en ? '?lang=en' : ''; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-newspaper fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 96c0-35.3 28.7-64 64-64l288 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L80 480c-44.2 0-80-35.8-80-80L0 128c0-17.7 14.3-32 32-32s32 14.3 32 32l0 272c0 8.8 7.2 16 16 16s16-7.2 16-16L96 96zm64 24l0 80c0 13.3 10.7 24 24 24l112 0c13.3 0 24-10.7 24-24l0-80c0-13.3-10.7-24-24-24L184 96c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title"><?php echo $is_en ? 'Articles &amp; News' : 'Bài viết'; ?></span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'Activity news, scientific updates &amp; useful knowledge' : 'Tin hoạt động, thông tin khoa học &amp; kiến thức hữu ích'; ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="<?php echo $is_en ? '/en/events#chuyen-di' : '/dong-su-kien#chuyen-di'; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-plane-departure fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M381 114.9L186.1 41.8c-16.7-6.2-35.2-5.3-51.1 2.7L89.1 67.4C78 73 77.2 88.5 87.6 95.2l146.9 94.5L136 240 77.8 214.1c-8.7-3.9-18.8-3.7-27.3 .6L18.3 230.8c-9.3 4.7-11.8 16.8-5 24.7l73.1 85.3c6.1 7.1 15 11.2 24.3 11.2l137.7 0c5 0 9.9-1.2 14.3-3.4L535.6 212.2c46.5-23.3 82.5-63.3 100.8-112C645.9 75 627.2 48 600.2 48l-57.4 0c-20.2 0-40.2 4.8-58.2 14L381 114.9zM0 480c0 17.7 14.3 32 32 32l576 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L32 448c-17.7 0-32 14.3-32 32z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title"><?php echo $is_en ? 'Study Tours' : 'Chuyến đi học tập'; ?></span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'Thesis defense journeys, international field trips' : 'Hành trình bảo vệ luận văn, tham quan thực tế nước ngoài'; ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="<?php echo $is_en ? '/en/ideas-talk' : '/ideas-talk'; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-microphone-lines fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 96l0 160c0 53 43 96 96 96s96-43 96-96l-80 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l80 0 0-32-80 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l80 0 0-32-80 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l80 0c0-53-43-96-96-96S96 43 96 96zM320 240l0 16c0 70.7-57.3 128-128 128s-128-57.3-128-128l0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40c0 89.1 66.2 162.7 152 174.4l0 33.6-48 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l72 0 72 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-48 0 0-33.6c85.8-11.7 152-85.3 152-174.4l0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 24z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title"><?php echo $is_en ? 'IDEAS Talk Webinars' : 'Webinar IDEAS Talk'; ?></span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'Periodic monthly AI workshops with leading experts' : 'Workshop Monthly AI thực chiến định kỳ cùng chuyên gia'; ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="<?php echo $is_en ? '/en/ideas-podcast' : '/ideas-podcast-series-01'; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-podcast fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M319.4 372c48.5-31.3 80.6-85.9 80.6-148c0-97.2-78.8-176-176-176S48 126.8 48 224c0 62.1 32.1 116.6 80.6 148c1.2 17.3 4 38 7.2 57.1l.2 1C56 395.8 0 316.5 0 224C0 100.3 100.3 0 224 0S448 100.3 448 224c0 92.5-56 171.9-136 206.1l.2-1.1c3.1-19.2 6-39.8 7.2-57zm-2.3-38.1c-1.6-5.7-3.9-11.1-7-16.2c-5.8-9.7-13.5-17-21.9-22.4c19.5-17.6 31.8-43 31.8-71.3c0-53-43-96-96-96s-96 43-96 96c0 28.3 12.3 53.8 31.8 71.3c-8.4 5.4-16.1 12.7-21.9 22.4c-3.1 5.1-5.4 10.5-7 16.2C99.8 307.5 80 268 80 224c0-79.5 64.5-144 144-144s144 64.5 144 144c0 44-19.8 83.5-50.9 109.9zM224 312c32.9 0 64 8.6 64 43.8c0 33-12.9 104.1-20.6 132.9c-5.1 19-24.5 23.4-43.4 23.4s-38.2-4.4-43.4-23.4c-7.8-28.5-20.6-99.7-20.6-132.8c0-35.1 31.1-43.8 64-43.8zm0-144a56 56 0 1 1 0 112 56 56 0 1 1 0-112z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">IDEAS Podcast</span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'Series sharing leadership &amp; management in digital era' : 'Chuỗi chia sẻ tư duy lãnh đạo, quản trị thời đại số'; ?></span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Card 6: Trường đối tác -->
            <div class="sitemap-card">
                <h3 class="sitemap-card-title"><svg class="svg-icon fa-building-columns fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160l0 8c0 13.3 10.7 24 24 24l400 0c13.3 0 24-10.7 24-24l0-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8-3.4-17.2-3.4-25.2 0zM128 224l-64 0 0 196.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512l448 0c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1L448 224l-64 0 0 192-40 0 0-192-64 0 0 192-48 0 0-192-64 0 0 192-40 0 0-192zM256 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg> <?php echo $is_en ? 'Partners &amp; Accreditations' : 'Đối tác &amp; Kiểm định'; ?></h3>
                <ul class="sitemap-list">
                    <li class="sitemap-item">
                        <a href="<?php echo $is_en ? '/en/swiss-umef' : '/swiss-umef'; ?>" class="sitemap-link">
                            <svg class="svg-icon fa-school fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M337.8 5.4C327-1.8 313-1.8 302.2 5.4L166.3 96 48 96C21.5 96 0 117.5 0 144L0 464c0 26.5 21.5 48 48 48l208 0 0-96c0-35.3 28.7-64 64-64s64 28.7 64 64l0 96 208 0c26.5 0 48-21.5 48-48l0-320c0-26.5-21.5-48-48-48L473.7 96 337.8 5.4zM96 192l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64zM96 320l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64zM232 176a88 88 0 1 1 176 0 88 88 0 1 1 -176 0zm88-48c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-16 0 0-16c0-8.8-7.2-16-16-16z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Swiss UMEF University</span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'Prestigious leading university in Geneva, Switzerland' : 'Trường Đại học uy tín hàng đầu tại Geneva, Thụy Sĩ'; ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="https://www.ascencia-business-school.com/en/" class="sitemap-link" target="_blank"
                            rel="noopener noreferrer">
                            <svg class="svg-icon fa-arrow-up-right-from-square fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Ascencia Business School</span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'Business School member of Collège de Paris' : 'Trường Quản trị Kinh doanh thành viên College de Paris'; ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="https://www.collegedeparis.fr/" class="sitemap-link" target="_blank"
                            rel="noopener noreferrer">
                            <svg class="svg-icon fa-arrow-up-right-from-square fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title"><?php echo $is_en ? 'Collège de Paris' : 'College de Paris'; ?></span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'Leading private educational group in France' : 'Tập đoàn giáo dục tư thục hàng đầu tại Pháp'; ?></span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="https://www.estiam.education/" class="sitemap-link" target="_blank"
                            rel="noopener noreferrer">
                            <svg class="svg-icon fa-arrow-up-right-from-square fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">ESTIAM</span>
                                <span class="sitemap-item-desc"><?php echo $is_en ? 'School specializing in advanced IT training in France' : 'Trường chuyên đào tạo Công nghệ thông tin cao cấp tại Pháp'; ?></span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- No results box -->
            <div class="sitemap-no-results" id="sitemap-no-results">
                <svg class="svg-icon fa-circle-question fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM169.8 165.3c7.9-22.3 29.1-37.3 52.8-37.3l58.3 0c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24l0-13.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1l-58.3 0c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
                <?php echo $is_en ? 'No pages found matching your search keywords.' : 'Không tìm thấy trang phù hợp với từ khóa tìm kiếm.'; ?>
            </div>

        </section>
    </main>

    <!-- Shared Footer -->
    <?php get_footer(); ?>

    <!-- Interactive Live Search Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('sitemap-search');
            const sitemapCards = document.querySelectorAll('.sitemap-card');
            const noResultsBox = document.getElementById('sitemap-no-results');

            if (searchInput) {
                searchInput.addEventListener('input', function () {
                    const query = this.value.toLowerCase().trim()
                        .normalize("NFD").replace(/[\u0300-\u036f]/g, ""); // Remove Vietnamese accents for loose matching

                    let overallMatchCount = 0;

                    sitemapCards.forEach(card => {
                        const items = card.querySelectorAll('.sitemap-item');
                        let cardMatchCount = 0;

                        items.forEach(item => {
                            const title = item.querySelector('.sitemap-item-title').textContent.toLowerCase()
                                .normalize("NFD").replace(/[\u0300-\u036f]/g, "");
                            const desc = item.querySelector('.sitemap-item-desc').textContent.toLowerCase()
                                .normalize("NFD").replace(/[\u0300-\u036f]/g, "");

                            if (title.includes(query) || desc.includes(query)) {
                                item.classList.remove('filtered-out');
                                cardMatchCount++;
                                overallMatchCount++;
                            } else {
                                item.classList.add('filtered-out');
                            }
                        });

                        // Show/Hide card based on whether it has matching items
                        if (cardMatchCount > 0) {
                            card.style.display = 'flex';
                        } else {
                            card.style.display = 'none';
                        }
                    });

                    // Show/Hide "No Results" message
                    if (overallMatchCount === 0 && query.length > 0) {
                        noResultsBox.style.display = 'block';
                    } else {
                        noResultsBox.style.display = 'none';
                    }
                });
            }
        });
    </script>

</body>

</html>