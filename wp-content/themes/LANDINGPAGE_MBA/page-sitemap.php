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
    <!-- Preconnect to external domains for faster resource loading -->
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="dns-prefetch" href="https://www.googletagmanager.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="dns-prefetch" href="https://www.google-analytics.com">

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title>Sơ đồ trang web – Sitemap | IDEAS</title>
    <?php endif; ?>
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta name="description"
            content="Sơ đồ toàn bộ trang web, thông tin giới thiệu, chương trình đào tạo Cử nhân, Thạc sĩ, Tiến sĩ và dịch vụ học tập tại Viện IDEAS." />
    <?php endif; ?>
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Sơ đồ trang web – Sitemap | IDEAS" />
        <meta property="og:description"
            content="Truy cập nhanh chóng và dễ dàng đến tất cả các bài viết, chuyên mục đào tạo và dịch vụ của Viện IDEAS." />
        <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg-optimized.webp" />
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
                    <i class="fa-solid fa-sitemap"></i> Sơ đồ trang web
                </span>
                <h1><span>SƠ ĐỒ TRANG WEB</span> <br>Website Sitemap</h1>
                <p>Khám phá toàn bộ cấu trúc website, dễ dàng định hướng và truy cập nhanh các chương trình đào tạo,
                    chính sách hỗ trợ & hoạt động của Viện IDEAS.</p>
            </div>
        </section>

        <!-- Search Bar Section -->
        <section class="sitemap-search-container">
            <div class="sitemap-search-wrapper">
                <input type="text" id="sitemap-search" class="sitemap-search-input"
                    placeholder="Tìm kiếm trang học vụ, khóa học, chính sách..." autocomplete="off">
                <i class="fa-solid fa-magnifying-glass sitemap-search-icon"></i>
            </div>
        </section>

        <!-- Sitemap Grid Section -->
        <section class="sitemap-grid" id="sitemap-grid">

            <!-- Card 1: Giới thiệu & Định hướng -->
            <div class="sitemap-card">
                <h3 class="sitemap-card-title"><i class="fa-solid fa-circle-info"></i> Giới thiệu &amp; Tin tức</h3>
                <ul class="sitemap-list">
                    <li class="sitemap-item">
                        <a href="/" class="sitemap-link">
                            <i class="fa-solid fa-house"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Trang chủ</span>
                                <span class="sitemap-item-desc">Tổng quan về Viện IDEAS và các hệ thống</span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/he-thong-ho-tro-hoc-tap-lms-ideas" class="sitemap-link">
                            <i class="fa-solid fa-layer-group"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Hệ thống LMS</span>
                                <span class="sitemap-item-desc">Cổng học tập, thư viện Cengage & trợ lý AI</span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/doi-ngu-giang-vien" class="sitemap-link">
                            <i class="fa-solid fa-user-graduate"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Hội đồng chuyên môn</span>
                                <span class="sitemap-item-desc">Đội ngũ giáo sư, chuyên gia và cố vấn khoa học</span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/dong-su-kien" class="sitemap-link">
                            <i class="fa-solid fa-clock"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Dòng sự kiện</span>
                                <span class="sitemap-item-desc">Các sự kiện, hội thảo và hoạt động ngoại khóa</span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/lich-su-hinh-thanh-va-phat-trien-vien-ideas" class="sitemap-link">
                            <i class="fa-solid fa-landmark"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Lịch sử phát triển</span>
                                <span class="sitemap-item-desc">Chặng đường 15 năm hình thành & phát triển</span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/so-do-to-chuc" class="sitemap-link">
                            <i class="fa-solid fa-sitemap"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Sơ đồ tổ chức</span>
                                <span class="sitemap-item-desc">Cơ cấu tổ chức điều hành & ban chuyên môn</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Card 2: Chương trình Thạc sĩ -->
            <div class="sitemap-card">
                <h3 class="sitemap-card-title"><i class="fa-solid fa-graduation-cap"></i> Chương trình Thạc sĩ</h3>
                <ul class="sitemap-list">
                    <li class="sitemap-item">
                        <a href="/mba" class="sitemap-link">
                            <i class="fa-solid fa-book"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Online MBA</span>
                                <span class="sitemap-item-desc">Thạc sĩ Quản trị Kinh doanh Trực tuyến Thụy Sĩ</span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/emba" class="sitemap-link">
                            <i class="fa-solid fa-user-tie"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Executive MBA</span>
                                <span class="sitemap-item-desc">Thạc sĩ Điều hành Quản trị Kinh doanh chất lượng
                                    cao</span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/mscai" class="sitemap-link">
                            <i class="fa-solid fa-robot"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Master AI (MSc AI)</span>
                                <span class="sitemap-item-desc">Thạc sĩ Khoa học Trí tuệ Nhân tạo ứng dụng</span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/mbainai" class="sitemap-link">
                            <i class="fa-solid fa-brain"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">MBA in AI</span>
                                <span class="sitemap-item-desc">Thạc sĩ QTKD tích hợp Ứng dụng Trí tuệ Nhân tạo</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Card 3: Cử nhân & Tiến sĩ -->
            <div class="sitemap-card">
                <h3 class="sitemap-card-title"><i class="fa-solid fa-award"></i> Cử nhân &amp; Tiến sĩ</h3>
                <ul class="sitemap-list">
                    <li class="sitemap-item">
                        <a href="/bba" class="sitemap-link">
                            <i class="fa-solid fa-school-flag"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Top-up BBA</span>
                                <span class="sitemap-item-desc">Liên thông Cử nhân QTKD 12 tháng lấy bằng Quốc tế</span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/fullbba" class="sitemap-link">
                            <i class="fa-solid fa-award"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Global Online BBA</span>
                                <span class="sitemap-item-desc">Cử nhân Quản trị Kinh doanh chính quy Thụy Sĩ</span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/dual-dba-estiam-rb" class="sitemap-link">
                            <i class="fa-solid fa-user-doctor"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Dual DBA</span>
                                <span class="sitemap-item-desc">Tiến sĩ Quản trị Kinh doanh song bằng Anh & Pháp</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Card 4: Chính sách & Học phí -->
            <div class="sitemap-card">
                <h3 class="sitemap-card-title"><i class="fa-solid fa-hand-holding-dollar"></i> Chính sách &amp; Học phí
                </h3>
                <ul class="sitemap-list">
                    <li class="sitemap-item">
                        <a href="/ho-tro-tai-chinh-sacombank" class="sitemap-link">
                            <i class="fa-solid fa-circle-dollar-to-slot"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Trả góp học phí</span>
                                <span class="sitemap-item-desc">Hỗ trợ trả góp học phí 0% lãi suất với Sacombank</span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/cac-khoan-chi-phi" class="sitemap-link">
                            <i class="fa-solid fa-file-invoice-dollar"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Các khoản chi phí</span>
                                <span class="sitemap-item-desc">Minh bạch biểu phí học trình & quy chế tài chính</span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/ideas-ambassador" class="sitemap-link">
                            <i class="fa-solid fa-medal"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">IDEAS - Ambassador</span>
                                <span class="sitemap-item-desc">Chương trình học bổng & đại sứ kết nối học viên</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Card 5: Bản tin & Truyền thông -->
            <div class="sitemap-card">
                <h3 class="sitemap-card-title"><i class="fa-solid fa-bullhorn"></i> Bản tin &amp; Truyền thông</h3>
                <ul class="sitemap-list">
                    <li class="sitemap-item">
                        <a href="/bai-viet" class="sitemap-link">
                            <i class="fa-solid fa-newspaper"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Bài viết</span>
                                <span class="sitemap-item-desc">Tin hoạt động, thông tin khoa học & kiến thức hữu
                                    ích</span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/dong-su-kien#chuyen-di" class="sitemap-link">
                            <i class="fa-solid fa-plane-departure"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Chuyến đi học tập</span>
                                <span class="sitemap-item-desc">Hành trình bảo vệ luận văn, tham quan thực tế nước
                                    ngoài</span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/ideas-talk" class="sitemap-link">
                            <i class="fa-solid fa-microphone-lines"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Webinar IDEAS Talk</span>
                                <span class="sitemap-item-desc">Workshop Monthly AI thực chiến định kỳ cùng chuyên
                                    gia</span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="/ideas-podcast-series-01" class="sitemap-link">
                            <i class="fa-solid fa-podcast"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">IDEAS Podcast</span>
                                <span class="sitemap-item-desc">Chuỗi chia sẻ tư duy lãnh đạo, quản trị thời đại
                                    số</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Card 6: Trường đối tác -->
            <div class="sitemap-card">
                <h3 class="sitemap-card-title"><i class="fa-solid fa-building-columns"></i> Đối tác &amp; Kiểm định</h3>
                <ul class="sitemap-list">
                    <li class="sitemap-item">
                        <a href="/swiss-umef" class="sitemap-link">
                            <i class="fa-solid fa-school"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Swiss UMEF University</span>
                                <span class="sitemap-item-desc">Trường Đại học uy tín hàng đầu tại Geneva, Thụy
                                    Sĩ</span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="https://www.ascencia-business-school.com/en/" class="sitemap-link" target="_blank"
                            rel="noopener noreferrer">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Ascencia Business School</span>
                                <span class="sitemap-item-desc">Trường Quản trị Kinh doanh thành viên College de
                                    Paris</span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="https://www.collegedeparis.fr/" class="sitemap-link" target="_blank"
                            rel="noopener noreferrer">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">College de Paris</span>
                                <span class="sitemap-item-desc">Tập đoàn giáo dục tư thục hàng đầu tại Pháp</span>
                            </div>
                        </a>
                    </li>
                    <li class="sitemap-item">
                        <a href="https://www.estiam.education/" class="sitemap-link" target="_blank"
                            rel="noopener noreferrer">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            <div class="sitemap-item-content">
                                <span class="sitemap-item-title">Estiam</span>
                                <span class="sitemap-item-desc">Trường chuyên đào tạo Công nghệ thông tin cao cấp tại
                                    Pháp</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- No results box -->
            <div class="sitemap-no-results" id="sitemap-no-results">
                <i class="fa-solid fa-circle-question"></i>
                Không tìm thấy trang phù hợp với từ khóa tìm kiếm.
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