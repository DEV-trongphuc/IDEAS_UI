<?php
/**
 * The template for displaying the Ideas Podcast Series 01 page
 * Template Name: Premium Ideas Podcast Template
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
    <?php get_template_part('shared-head'); ?>

    <!-- Preconnect to external domains for faster resource loading --><!-- Preload LCP hero background image -->
    <link rel="preload" fetchpriority="high" as="image"
        href="https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp" />
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php echo $is_en ? 'Ideas Podcast Series 01 – Overcoming English Barriers | IDEAS' : 'Ideas Podcast Series 01 – Vượt rào cản tiếng Anh | IDEAS'; ?></title>
    <?php endif; ?>

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta name="description"
            content="<?php echo $is_en ? 'A Podcast series sharing methods to overcome language barriers by applying AI in academic learning and research.' : 'Chuỗi Podcast chia sẻ phương pháp vượt qua rào cản tiếng Anh bằng cách ứng dụng AI trong học tập và nghiên cứu học thuật.'; ?>" />
    <?php endif; ?><?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $is_en ? 'Ideas Podcast Series 01 – Overcoming English Barriers' : 'Ideas Podcast Series 01 – Vượt rào cản tiếng Anh'; ?>" />
        <meta property="og:description"
            content="<?php echo $is_en ? 'Listen to practical solutions and advice from experts on combining independent thinking and Artificial Intelligence.' : 'Lắng nghe các giải pháp, lời khuyên thực tế từ đội ngũ chuyên gia về cách kết hợp tư duy độc lập và Trí Tuệ Nhân Tạo.'; ?>" />
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
           IDEAS PODCAST – PREMIUM DARK THEME
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
        .podcast-hero {
            position: relative;
            padding: 180px 20px 90px;
            overflow: hidden;
            background: transparent;
            min-height: 45vh;
            display: flex;
            align-items: center;
            border-bottom: none;
        }

        .podcast-hero-bg {
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

        .podcast-hero-overlay {
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

        .podcast-hero-container {
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

        .podcast-hero-badge {
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

        .podcast-hero h1 {
            font-size: clamp(2.6rem, 5.5vw, 4rem);
            font-weight: 900;
            margin-bottom: 20px;
            letter-spacing: -0.02em;
            line-height: 1.15;
            color: #ffffff !important;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.6);
        }

        .podcast-hero h1 span {
            background: linear-gradient(135deg, #ff8e8e 0%, #ff4f4f 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }

        .podcast-hero p {
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
            .podcast-hero {
                padding: 130px 20px 50px !important;
                min-height: auto;
            }

            .podcast-hero h1 {
                font-size: 2.2rem;
                line-height: 1.2;
            }

            .podcast-hero p {
                font-size: 1rem;
                margin-bottom: 24px;
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

            .podcast-coop {
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

        .video-player-box video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
            object-fit: contain;
            background: #000000;
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

        /* ── Cooperation Section ────────────── */
        .podcast-coop {
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
        <section class="podcast-hero">
            <div class="podcast-hero-bg"
                style="background-image: url('https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp');">
            </div>
            <div class="podcast-hero-overlay"></div>
            <div class="podcast-hero-container">
                <span class="podcast-hero-badge">
                    <svg class="svg-icon fa-microphone-lines fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 96l0 160c0 53 43 96 96 96s96-43 96-96l-80 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l80 0 0-32-80 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l80 0 0-32-80 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l80 0c0-53-43-96-96-96S96 43 96 96zM320 240l0 16c0 70.7-57.3 128-128 128s-128-57.3-128-128l0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40c0 89.1 66.2 162.7 152 174.4l0 33.6-48 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l72 0 72 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-48 0 0-33.6c85.8-11.7 152-85.3 152-174.4l0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 24z"/></svg> Podcast Series 01
                </span>
                <h1><?php echo $is_en ? 'Overcoming English Barriers <br><span>by Applying AI</span>' : 'Vượt rào cản tiếng Anh <br><span>bằng cách ứng dụng AI</span>'; ?></h1>
                <p><?php echo $is_en ? 'Discover how to use Artificial Intelligence to overcome language barriers and improve international standard learning performance with IDEAS' : 'Khám phá cách thức sử dụng Trí Tuệ Nhân Tạo để khắc phục rào cản ngoại ngữ, nâng cao hiệu suất học\n                    tập chuẩn quốc tế cùng IDEAS'; ?></p>
            </div>
        </section>

        <!-- Theater Player Section -->
        <section class="theater-section">
            <div class="theater-container">
                <!-- Left: Video Player -->
                <div class="player-column">
                    <div class="video-player-box">
                        <video controls id="main_video" preload="metadata" playsinline></video>
                    </div>

                    <div class="player-meta-card">
                        <span class="meta-tag" id="current-video-type">Podcast Video</span>
                        <h2 id="current-video-title"><?php echo $is_en ? 'Loading video...' : 'Đang tải video...'; ?></h2>
                        <div class="meta-row">
                            <div class="meta-item">
                                <svg class="svg-icon fa-clock fa-regular" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                                <span id="current-video-duration">-</span>
                            </div>
                            <div class="meta-item">
                                <svg class="svg-icon fa-headphones fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 80C149.9 80 62.4 159.4 49.6 262c9.4-3.8 19.6-6 30.4-6c26.5 0 48 21.5 48 48l0 128c0 26.5-21.5 48-48 48c-44.2 0-80-35.8-80-80l0-16 0-48 0-48C0 146.6 114.6 32 256 32s256 114.6 256 256l0 48 0 48 0 16c0 44.2-35.8 80-80 80c-26.5 0-48-21.5-48-48l0-128c0-26.5 21.5-48 48-48c10.8 0 21 2.1 30.4 6C449.6 159.4 362.1 80 256 80z"/></svg>
                                <span><?php echo $is_en ? 'High-quality Audio' : 'Âm thanh chất lượng cao'; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Playlist Sidebar -->
                <div class="playlist-column">
                    <div class="playlist-header">
                        <h3><svg class="svg-icon fa-headphones fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 80C149.9 80 62.4 159.4 49.6 262c9.4-3.8 19.6-6 30.4-6c26.5 0 48 21.5 48 48l0 128c0 26.5-21.5 48-48 48c-44.2 0-80-35.8-80-80l0-16 0-48 0-48C0 146.6 114.6 32 256 32s256 114.6 256 256l0 48 0 48 0 16c0 44.2-35.8 80-80 80c-26.5 0-48-21.5-48-48l0-128c0-26.5 21.5-48 48-48c10.8 0 21 2.1 30.4 6C449.6 159.4 362.1 80 256 80z"/></svg> <?php echo $is_en ? 'Playlist' : 'Danh sách phát'; ?></h3>
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
        <section class="podcast-coop">
            <div class="coop-container">
                <h2 class="coop-title"><svg class="svg-icon fa-handshake-simple fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M323.4 85.2l-96.8 78.4c-16.1 13-19.2 36.4-7 53.1c12.9 17.8 38 21.3 55.3 7.8l99.3-77.2c7-5.4 17-4.2 22.5 2.8s4.2 17-2.8 22.5l-20.9 16.2L550.2 352l41.8 0c26.5 0 48-21.5 48-48l0-128c0-26.5-21.5-48-48-48l-76 0-4 0-.7 0-3.9-2.5L434.8 79c-15.3-9.8-33.2-15-51.4-15c-21.8 0-43 7.5-60 21.2zm22.8 124.4l-51.7 40.2C263 274.4 217.3 268 193.7 235.6c-22.2-30.5-16.6-73.1 12.7-96.8l83.2-67.3c-11.6-4.9-24.1-7.4-36.8-7.4C234 64 215.7 69.6 200 80l-72 48-80 0c-26.5 0-48 21.5-48 48L0 304c0 26.5 21.5 48 48 48l108.2 0 91.4 83.4c19.6 17.9 49.9 16.5 67.8-3.1c5.5-6.1 9.2-13.2 11.1-20.6l17 15.6c19.5 17.9 49.9 16.6 67.8-2.9c4.5-4.9 7.8-10.6 9.9-16.5c19.4 13 45.8 10.3 62.1-7.5c17.9-19.5 16.6-49.9-2.9-67.8l-134.2-123z"/></svg> <?php echo $is_en ? 'Co-producing <b>Partners</b>' : 'Đơn vị <b>Đồng hành</b>'; ?></h2>
                <p class="coop-sub"><?php echo $is_en ? 'Academic sponsors and co-producers of the Podcast program' : 'Các đơn vị tài trợ học thuật và đồng sản xuất chương trình Podcast'; ?></p>

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







    <!-- Podcast Playlist and Player Controller Script -->
    <script>
        if (typeof isEnMode === 'undefined') { var isEnMode = <?php echo $is_en ? 'true' : 'false'; ?>; }
        const podcast_data = {
            series1: {
                name: isEnMode ? "Breaking English Barriers" : "Vượt rào cản tiếng Anh",
                name_sub: isEnMode ? "#by applying AI in learning" : "#bằng cách ứng dụng AI trong học tập",
                data: [
                    {
                        type: "Podcast Video",
                        duration: "2:03",
                        title: isEnMode ? "Not Good at English - You are Not Alone" : "Không giỏi tiếng Anh - Bạn không đơn độc",
                        video: "https://ideas.edu.vn/wp-content/uploads/2025/07/podcast_1.mp4",
                    },
                    {
                        type: "Podcast Video",
                        duration: "2:40",
                        title: isEnMode ? "You don't need to understand everything, just understand correctly with AI assistance" : "Bạn không cần hiểu hết, chỉ cần hiểu đúng với sự trợ giúp của AI",
                        video: "https://ideas.edu.vn/wp-content/uploads/2025/08/FSave.com_Facebook_Media_003_3593813510926577v.mp4",
                    },
                    {
                        type: "Podcast Video",
                        duration: "3:07",
                        title: isEnMode ? "AI only assists, it does not replace thinking" : "AI chỉ hỗ trợ, không thay thế việc tư duy",
                        video: "https://ideas.edu.vn/wp-content/uploads/2025/08/video-podcast-3.mp4",
                    },
                    {
                        type: "Podcast Video",
                        duration: "2:01",
                        title: isEnMode ? "Are you using AI unconsciously?" : "Bạn có đang sử dụng AI vô thức",
                        video: "https://ideas.edu.vn/wp-content/uploads/2025/08/FSave.com_Facebook_Media_002_1076359851223438v.mp4",
                    },
                ],
            },
        };

        document.addEventListener("DOMContentLoaded", function () {
            const videoElement = document.querySelector("#main_video");
            const listElement = document.querySelector("#playlist-list");
            const lenElement = document.querySelector("#video-count");

            // Meta items elements
            const metaTitle = document.querySelector("#current-video-title");
            const metaDuration = document.querySelector("#current-video-duration");
            const metaType = document.querySelector("#current-video-type");

            const videos = podcast_data.series1.data;

            // Update video count badge
            if (lenElement) lenElement.textContent = `${videos.length} ${isEnMode ? 'videos' : 'video'}`;

            // Populate playlist
            if (listElement) {
                listElement.innerHTML = videos
                    .map((item, index) => `
                        <li data-index="${index}" class="${index === 0 ? "active" : ""}">
                            <p class="title">${index + 1}. ${item.title}</p>
                            <p class="details">
                                <span><svg class="svg-icon fa-play fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80L0 432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"/></svg> ${item.duration}</span>
                                <span>${item.type}</span>
                            </p>
                        </li>
                    `).join("");
            }

            // Update metadata display function
            function updateMeta(index) {
                const video = videos[index];
                if (metaTitle) metaTitle.textContent = video.title;
                if (metaDuration) metaDuration.textContent = video.duration;
                if (metaType) metaType.textContent = video.type;
            }

            // Load first video initially
            if (videoElement && videos[0]) {
                videoElement.src = videos[0].video;
                updateMeta(0);

                // Autoplay with caution (browser behavior handling)
                setTimeout(() => {
                    videoElement.play().catch(() => {
                        console.warn("Browser blocked autoplay. User interaction required.");
                    });
                }, 500);
            }

            // Handle switching tracks on playlist click
            if (listElement) {
                listElement.addEventListener("click", function (e) {
                    const li = e.target.closest("li");
                    if (!li) return;

                    const index = parseInt(li.dataset.index, 10);

                    if (videoElement) {
                        videoElement.src = videos[index].video;
                        videoElement.play();
                    }
                    updateMeta(index);

                    // Update active class state
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