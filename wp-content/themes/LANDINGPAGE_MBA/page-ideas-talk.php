<?php
/**
 * The template for displaying the Ideas Talk page
 * Template Name: Premium Ideas Talk Webinar Template
 */
global $wp;

// Block unwanted old theme styles
ob_start(function ($html) {
    $html = preg_replace(
        '/<link[^>]+href=[\'"][^\'"]*LANDINGPAGE_MBA\/main\.css[^\'"]*[\'"][^>]*\/?>/',
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
    <link rel="preload" fetchpriority="high" as="image"
        href="https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp" />
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php echo $is_en ? 'IDEAS Talk – AI Webinars &amp; Seminars | IDEAS' : 'IDEAS Talk – Webinar &amp; Chuyên đề AI | IDEAS'; ?></title>
    <?php endif; ?>

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta name="description"
            content="<?php echo $is_en ? 'A series of discussion and practice seminars on AI application in study, research, and business management organized by IDEAS.' : 'Chuỗi chuyên đề thảo luận và thực hành ứng dụng AI trong học tập, nghiên cứu và quản trị doanh nghiệp tổ chức bởi IDEAS.'; ?>" />
    <?php endif; ?>
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $is_en ? 'IDEAS Talk – AI Webinars &amp; Seminars' : 'IDEAS Talk – Webinar &amp; Chuyên đề AI'; ?>" />
        <meta property="og:description"
            content="<?php echo $is_en ? 'Update monthly technology workshops and hands-on AI application guides from the IDEAS expert board.' : 'Cập nhật các buổi Monthly Workshop công nghệ, hướng dẫn ứng dụng AI thực chiến từ hội đồng chuyên gia IDEAS.'; ?>" />
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
           IDEAS TALK – PREMIUM DARK THEME
           ══════════════════════════════════════ */
        html,
        body {
            overflow-x: clip !important;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            background-color: #080405;
            color: #f3f4f6;
            background-image:
                radial-gradient(circle at 15% 20%, rgba(185, 14, 0, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 85% 65%, rgba(185, 14, 0, 0.1) 0%, transparent 50%),
                radial-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 28px 28px;
            background-attachment: scroll, scroll, fixed;
        }

        /* ── Hero ──────────────────────────── */
        .talk-hero {
            position: relative;
            padding: 180px 20px 90px;
            overflow: hidden;
            background: transparent;
            min-height: 45vh;
            display: flex;
            align-items: center;
            border-bottom: none;
        }

        .talk-hero-bg {
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
            opacity: 0.25;
        }

        .talk-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(180deg,
                    rgba(8, 4, 5, 0.85) 0%,
                    rgba(80, 6, 0, 0.35) 60%,
                    transparent 100%),
                radial-gradient(ellipse at 50% 50%, rgba(171, 14, 0, 0.2) 0%, transparent 75%);
        }

        .talk-hero-container {
            position: relative;
            z-index: 3;
            max-width: 900px;
            margin: 0 auto;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .talk-hero-badge {
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

        .talk-hero h1 {
            font-size: clamp(2.6rem, 5.5vw, 4rem);
            font-weight: 900;
            margin-bottom: 20px;
            letter-spacing: -0.02em;
            line-height: 1.15;
            color: #ffffff !important;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.6);
        }

        .talk-hero h1 span {
            background: linear-gradient(135deg, #ff8e8e 0%, #ff4f4f 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }

        .talk-hero p {
            font-size: 1.15rem;
            color: rgba(255, 255, 255, 0.95) !important;
            max-width: 650px;
            margin-bottom: 0;
            line-height: 1.6;
            font-weight: 500;
            letter-spacing: 0.01em;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        /* ── Theater Section ────────────────── */
        .theater-section {
            padding: 80px 20px;
            background: transparent;
            position: relative;
            z-index: 5;
        }

        .theater-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.8fr 1.2fr;
            gap: 30px;
        }

        @media (max-width: 992px) {
            .theater-container {
                grid-template-columns: 1fr;
                gap: 24px;
            }
        }

        @media (max-width: 768px) {
            .talk-hero {
                padding: 130px 20px 50px !important;
                min-height: auto;
            }

            .talk-hero h1 {
                font-size: 2.2rem;
                line-height: 1.2;
            }

            .talk-hero p {
                font-size: 1rem;
                margin-bottom: 24px;
                color: rgba(255, 255, 255, 0.9) !important;
            }

            .theater-section {
                padding: 40px 20px !important;
            }

            .player-column {
                gap: 16px;
            }

            .player-meta-card {
                padding: 20px 16px;
            }

            .playlist-column {
                max-height: 380px;
            }

            .playlist-header {
                padding: 18px 20px;
            }

            .playlist-scroll {
                padding: 10px;
            }

            .talk-coop {
                padding: 50px 20px !important;
            }

            .coop-sub {
                margin-bottom: 24px;
                font-size: 0.95rem;
            }

            .coop-grid {
                gap: 24px;
            }
        }

        .player-column {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .video-player-box {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            border-radius: 20px;
            overflow: hidden;
            background: #000000;
            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.85),
                0 0 40px rgba(171, 14, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: border-color 0.3s ease;
        }

        .video-player-box:hover {
            border-color: rgba(255, 59, 48, 0.3);
        }

        .video-player-box iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }

        .player-meta-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(16px);
            border-radius: 20px;
            padding: 30px;
            color: #ffffff;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }

        .player-meta-card h2 {
            font-size: 1.6rem;
            font-weight: 800;
            margin: 12px 0;
            line-height: 1.35;
            letter-spacing: -0.01em;
            color: #ffffff;
        }

        .meta-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            background: rgba(171, 14, 0, 0.2);
            border: 1px solid rgba(255, 77, 77, 0.3);
            color: #ffcccc;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            border-radius: 8px;
        }

        .meta-row {
            display: flex;
            gap: 24px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            font-weight: 500;
            margin-top: 8px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .meta-item i {
            color: #ff3b30;
        }

        /* Playlist Styling */
        .playlist-column {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            display: flex;
            flex-direction: column;
            height: 100%;
            max-height: 620px;
            overflow: hidden;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.4);
        }

        @media (max-width: 992px) {
            .playlist-column {
                max-height: 420px;
            }
        }

        .playlist-header {
            padding: 24px 28px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.01);
        }

        .playlist-header h3 {
            margin: 0;
            font-size: 1.15rem;
            font-weight: 800;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .playlist-header h3 i {
            color: #ff3b30;
        }

        .video-count-badge {
            font-size: 0.82rem;
            font-weight: 700;
            background: rgba(255, 255, 255, 0.08);
            padding: 5px 12px;
            border-radius: 100px;
            color: rgba(255, 255, 255, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .playlist-scroll {
            overflow-y: auto;
            flex-grow: 1;
            padding: 14px;
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* IE and Edge */
        }

        .playlist-scroll::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari and Opera */
        }

        .playlist-items {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .playlist-items li {
            padding: 12px 14px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.01);
            border: 1px solid rgba(255, 255, 255, 0.03);
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .playlist-items li:hover {
            background: rgba(171, 14, 0, 0.1);
            border-color: rgba(171, 14, 0, 0.25);
            transform: translateY(-2px);
        }

        .playlist-items li.active {
            background: rgba(171, 14, 0, 0.16);
            border-color: rgba(255, 59, 48, 0.35);
            box-shadow: 0 10px 20px rgba(171, 14, 0, 0.15);
        }

        .playlist-items li p.title {
            margin: 0;
            font-size: 0.88rem;
            font-weight: 700;
            color: #e5e7eb !important;
            line-height: 1.4;
            transition: color 0.2s ease;
        }

        .playlist-items li.active p.title {
            color: #ff6b6b !important;
        }

        .playlist-items li p.details {
            margin: 0;
            font-size: 0.78rem;
            color: rgba(255, 255, 255, 0.6) !important;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .playlist-items li p.details span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: rgba(255, 255, 255, 0.6) !important;
        }

        .playlist-items li p.details i {
            color: #ff3b30 !important;
        }

        /* ── Header Width Fix ────────────────── */
        .ideas_header .container {
            max-width: 1360px !important;
            width: 100% !important;
            padding: 0 20px !important;
        }

        /* ── Cooperation Section ────────────── */
        .talk-coop {
            padding: 85px 20px;
            background: transparent;
            position: relative;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }

        .coop-container {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }

        .coop-title {
            font-size: clamp(1.8rem, 4vw, 2.2rem);
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .coop-title i {
            color: #ff3b30;
        }

        .coop-title b {
            color: #ff3b30;
            background: linear-gradient(135deg, #ff6b6b 0%, #ff3b30 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .coop-sub {
            color: rgba(255, 255, 255, 0.6);
            font-size: 1.05rem;
            margin-bottom: 45px;
        }

        .coop-grid {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 36px;
            flex-wrap: wrap;
        }

        .coop-card {
            background: #ffffff;
            padding: 22px 48px;
            border-radius: 20px;
            box-shadow:
                0 15px 35px rgba(0, 0, 0, 0.6),
                0 0 25px rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 95px;
        }

        .coop-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 45px rgba(171, 14, 0, 0.35);
            border-color: rgba(255, 59, 48, 0.5);
        }

        .coop-card img {
            max-height: 52px;
            max-width: 190px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .coop-card:hover img {
            transform: scale(1.03);
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Site Header -->
    <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>

    <div class="mobile-overlay" id="mobile-overlay"></div>

    <main id="content">
        <!-- Hero Section -->
        <section class="talk-hero">
            <div class="talk-hero-bg"
                style="background-image: url('https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp');">
            </div>
            <div class="talk-hero-overlay"></div>
            <div class="talk-hero-container">
                <span class="talk-hero-badge">
                    <i class="fa-solid fa-globe"></i> <?php echo $is_en ? 'Webinar &amp; Seminar Series' : 'Webinar Series'; ?>
                </span>
                <h1><span>IDEAS TALK</span> <br><?php echo $is_en ? 'AI Application Workshop' : 'Workshop Ứng dụng AI'; ?></h1>
                <p><?php echo $is_en ? '#IDEAS Monthly AI Workshop – Sharing breakthrough learning &amp; working methods with Artificial Intelligence' : '#IDEAS Monthly AI Workshop – Chia sẻ phương pháp sáng tạo học tập &amp; làm việc đột phá cùng Trí Tuệ\n                    Nhân Tạo'; ?></p>
            </div>
        </section>

        <!-- Theater Player Section -->
        <section class="theater-section">
            <div class="theater-container">
                <!-- Left: Video Player -->
                <div class="player-column">
                    <div class="video-player-box">
                        <iframe src="" title="YouTube video player"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen id="main_iframe"></iframe>
                    </div>

                    <div class="player-meta-card">
                        <span class="meta-tag" id="current-video-type">IDEAS Talk - AI</span>
                        <h2 id="current-video-title"><?php echo $is_en ? 'Loading video...' : 'Đang tải video...'; ?></h2>
                        <div class="meta-row">
                            <div class="meta-item">
                                <i class="fa-regular fa-calendar-days"></i>
                                <span id="current-video-date">-</span>
                            </div>
                            <div class="meta-item">
                                <i class="fa-solid fa-play"></i>
                                <span><?php echo $is_en ? 'Live Broadcast' : 'Phát sóng trực tiếp'; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Playlist Sidebar -->
                <div class="playlist-column">
                    <div class="playlist-header">
                        <h3><i class="fa-solid fa-rectangle-list"></i> <?php echo $is_en ? 'Playlist' : 'Danh sách phát'; ?></h3>
                        <span class="video-count-badge" id="video-count"><?php echo $is_en ? '0 videos' : '0 video'; ?></span>
                    </div>
                    <div class="playlist-scroll" data-lenis-prevent>
                        <ul class="playlist-items" id="playlist-list">
                            <!-- Populated dynamically -->
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cooperation Block -->
        <section class="talk-coop">
            <div class="coop-container">
                <h2 class="coop-title"><i class="fa-solid fa-handshake-simple"></i> <?php echo $is_en ? 'Co-organizing <b>Partners</b>' : 'Đơn vị <b>Đồng hành</b>'; ?></h2>
                <p class="coop-sub"><?php echo $is_en ? 'Prestigious partners and academic organizations co-hosting the IDEAS Talk event series' : 'Các đối tác và tổ chức học thuật uy tín đồng tổ chức chuỗi sự kiện IDEAS Talk'; ?></p>

                <div class="coop-grid">
                    <a class="coop-card" href="https://chiefaiofficer.vn/" target="_blank"
                        rel="nofollow noopener noreferrer">
                        <img decoding="async" src="/wp-content/uploads/external-migrated/cao-logo-1_4e7ed2a0.webp"
                            alt="Chief AI Officer Logo" />
                    </a>
                    <a class="coop-card" href="https://ideas.edu.vn/" target="_blank"
                        rel="nofollow noopener noreferrer">
                        <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2025/05/ideas-02.png"
                            alt="IDEAS Logo" />
                    </a>
                </div>
            </div>
        </section>
    </main>







    <!-- Playlist and Player Controller Script -->
    <script>
        if (typeof isEnMode === 'undefined') { var isEnMode = <?php echo $is_en ? 'true' : 'false'; ?>; }
        const workshop_data = {
            series1: {
                name: isEnMode ? "Breaking English Barriers" : "Vượt rào cản tiếng Anh",
                name_sub: isEnMode ? "#by applying AI in learning" : "#bằng cách ứng dụng AI trong học tập",
                data: [
                    {
                        type: "IDEAS Talk - AI",
                        date: "29/06/2025",
                        title: isEnMode ? "VIBE CODING - Build your own app with AI" : "VIBE CODING - Tự tạo ứng dụng bằng AI",
                        video: "https://www.youtube.com/embed/CXCDUKsU-0I?si=EUDQfhO6gIZ517bY",
                    },
                    {
                        type: "IDEAS Talk - AI",
                        date: "25/05/2025",
                        title: isEnMode ? "Demystifying AI - Unveiling Untold Creative Methods" : "Giải mã AI - Những phương thức sáng tạo chưa từng được tiết lộ",
                        video: "https://www.youtube.com/embed/n0S6vGsilhs?si=qOu2_jTHYmvj5ppD",
                    },
                    {
                        type: "IDEAS Talk - AI",
                        date: "20/04/2025",
                        title: isEnMode ? "Data Security in the AI Era: Challenges and Solutions" : "Bảo mật dữ liệu trong thời đại AI: Thách thức và giải pháp",
                        video: "https://www.youtube.com/embed/1wyT6IVUCpg?si=Dl66rshN8IoTRKuG",
                    },
                    {
                        type: "IDEAS Talk - AI",
                        date: "23/03/2025",
                        title: isEnMode ? "AI Applications in Omnichannel Customer Service" : "Ứng dụng AI chăm sóc khách hàng đa kênh",
                        video: "https://www.youtube.com/embed/mB0mDrgjVNs?si=8OciF14MwQh1w1AF",
                    },
                    {
                        type: "IDEAS Talk - AI",
                        date: "09/03/2025",
                        title: isEnMode ? "The Convergence of AI & Semiconductor - Future Trends" : "Sự Kết Hợp AI & Semiconductor - Xu hướng tương lai",
                        video: "https://www.youtube.com/embed/5cogIW22nFI?si=0YF_3H5NX1UTPtr2",
                    },
                ],
            },
        };

        document.addEventListener("DOMContentLoaded", function () {
            const iframeElement = document.querySelector("#main_iframe");
            const listElement = document.querySelector("#playlist-list");
            const lenElement = document.querySelector("#video-count");

            // Meta items elements
            const metaTitle = document.querySelector("#current-video-title");
            const metaDate = document.querySelector("#current-video-date");
            const metaType = document.querySelector("#current-video-type");

            const videos = workshop_data.series1.data;

            // Update video count badge
            if (lenElement) lenElement.textContent = `${videos.length} ${isEnMode ? 'videos' : 'video'}`;

            // Populate the playlist DOM elements
            if (listElement) {
                listElement.innerHTML = videos
                    .map((item, index) => `
                        <li data-index="${index}" class="${index === 0 ? "active" : ""}">
                            <p class="title">${item.title}</p>
                            <p class="details">
                                <span><i class="fa-solid fa-calendar-days"></i> ${item.date}</span>
                                <span>${item.type}</span>
                            </p>
                        </li>
                    `).join("");
            }

            // Set initial video metadata
            function updateMeta(index) {
                const video = videos[index];
                if (metaTitle) metaTitle.textContent = video.title;
                if (metaDate) metaDate.textContent = video.date;
                if (metaType) metaType.textContent = video.type;
            }

            // Load initial first video
            if (iframeElement && videos[0]) {
                iframeElement.src = videos[0].video;
                updateMeta(0);
            }

            // Handle switching tracks on playlist click
            if (listElement) {
                listElement.addEventListener("click", function (e) {
                    const li = e.target.closest("li");
                    if (!li) return;

                    const index = parseInt(li.dataset.index, 10);

                    // Add autoplay behavior
                    let videoUrl = videos[index].video;
                    if (videoUrl.includes("?")) {
                        videoUrl += "&autoplay=1";
                    } else {
                        videoUrl += "?autoplay=1";
                    }

                    if (iframeElement) iframeElement.src = videoUrl;
                    updateMeta(index);

                    // Update active class
                    document.querySelectorAll("#playlist-list li").forEach((el) => {
                        el.classList.remove("active");
                    });
                    li.classList.add("active");
                });
            }
        });
    </script>

    <!-- Main scripts minified imports -->
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

    <?php get_footer(); ?>
</body>

</html>