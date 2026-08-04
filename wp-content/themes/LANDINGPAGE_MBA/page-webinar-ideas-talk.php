<?php
/**
 * The template for displaying the New Webinar Ideas Talk page
 * Template Name: Premium Webinar Ideas Talk Template
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <?php get_template_part('shared-head'); ?>

    <!-- Preconnect to external domains for faster resource loading --><!-- Preload LCP hero background image -->
    <link rel="preload" fetchpriority="high" as="image"
        href="https://ideas.edu.vn/wp-content/uploads/2024/03/Hoi-thao-MBA-50-5.webp" />
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php echo $is_en ? 'IDEAS Talk – AI Webinars &amp; Seminars | IDEAS' : 'IDEAS Talk – Webinar &amp; Chuyên đề AI | IDEAS'; ?></title>
    <?php endif; ?>

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta name="description"
            content="<?php echo $is_en ? 'A series of discussion and practice seminars on AI application in study, research, and business management organized by IDEAS.' : 'Chuỗi chuyên đề thảo luận và thực hành ứng dụng AI trong học tập, nghiên cứu và quản trị doanh nghiệp tổ chức bởi IDEAS.'; ?>" />
    <?php endif; ?><?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $is_en ? 'IDEAS Talk – AI Webinars &amp; Seminars' : 'IDEAS Talk – Webinar &amp; Chuyên đề AI'; ?>" />
        <meta property="og:description"
            content="<?php echo $is_en ? 'Update monthly technology workshops and hands-on AI application guides from the IDEAS expert board.' : 'Cập nhật các buổi Monthly Workshop công nghệ, hướng dẫn ứng dụng AI thực chiến từ hội đồng chuyên gia IDEAS.'; ?>" />
        <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2024/03/Hoi-thao-MBA-50-5.webp" />
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
           IDEAS TALK – HYBRID PREMIUM THEME
           Hero: Stunning Dark | Body: Elegant Light
           ══════════════════════════════════════ */
        html,
        body {
            overflow-x: clip !important;
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #fcfcfd;
            color: #334155;
        }

        /* Container helper */
        .talk-container {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            padding: 0 20px;
            box-sizing: border-box;
        }

        /* ── Button Styles ────────────────── */
        .btn-talk {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 16px 36px;
            font-size: 1rem;
            font-weight: 700;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            cursor: pointer;
            text-decoration: none;
            border: none;
            outline: none;
        }

        .btn-talk-primary {
            background: linear-gradient(135deg, #ab0e00 0%, #850a00 100%);
            color: #ffffff !important;
            box-shadow: 0 10px 25px rgba(171, 14, 0, 0.25);
        }

        .btn-talk-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(185, 28, 28, 0.4);
            color: #ffffff !important;
        }

        .btn-talk-secondary {
            background: rgba(15, 23, 42, 0.05);
            color: #0f172a !important;
            border: 1px solid rgba(15, 23, 42, 0.08);
        }

        .btn-talk-secondary:hover {
            background: rgba(15, 23, 42, 0.1);
            transform: translateY(-3px);
            color: #0f172a !important;
        }

        /* ── Section Titles ────────────────── */
        .talk-section-header {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .talk-section-header h2,
        .talk-section-header .talk-section-title {
            font-size: clamp(1.8rem, 4vw, 2.5rem) !important;
            font-weight: 800 !important;
            color: #0f172a !important;
            -webkit-text-fill-color: #0f172a !important;
            background: none !important;
            background-clip: border-box !important;
            margin-bottom: 14px !important;
            letter-spacing: -0.02em !important;
            display: block !important;
        }

        .talk-section-header h2 span,
        .talk-section-header .talk-section-title span {
            color: #b91c1c !important;
            background: none !important;
            -webkit-text-fill-color: #b91c1c !important;
            background-clip: border-box !important;
            display: inline-block !important;
        }

        .talk-section-header p {
            font-size: 1.05rem;
            color: #64748b;
            max-width: 750px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Divider */
        .section-divider {
            position: relative;
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, rgba(185, 28, 28, 0.3) 15%, rgba(185, 28, 28, 0.3) 85%, transparent 100%);
            margin: 30px auto;
            width: 85%;
            max-width: 1100px;
        }

        .section-divider::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 8px;
            height: 8px;
            background: #b91c1c;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(185, 28, 28, 0.5);
        }

        /* ── Hero: Redesigned Premium Aesthetic ────────── */
        .talk-hero {
            position: relative;
            padding: 160px 0 110px;
            overflow: hidden;
            background-color: #050203;
            min-height: 80vh;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Subtle grid background mesh */
        .talk-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.015) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.015) 1px, transparent 1px);
            background-size: 40px 40px;
            background-position: center top;
            mask-image: radial-gradient(ellipse at 50% 50%, black 20%, transparent 80%);
            -webkit-mask-image: radial-gradient(ellipse at 50% 50%, black 20%, transparent 80%);
            z-index: 2;
            pointer-events: none;
        }

        /* Drifting glowing orbs */
        .talk-hero-glow-1,
        .talk-hero-glow-2 {
            position: absolute;
            border-radius: 50%;
            filter: blur(130px);
            opacity: 0.16;
            pointer-events: none;
            z-index: 1;
            mix-blend-mode: screen;
            will-change: transform;
            animation: float-glow 12s infinite alternate ease-in-out;
        }

        .talk-hero-glow-1 {
            width: 400px;
            height: 400px;
            background: #ab0e00; /* Brand Red */
            top: 5%;
            left: 10%;
        }

        .talk-hero-glow-2 {
            width: 450px;
            height: 450px;
            background: #4f46e5; /* Indigo */
            bottom: 5%;
            right: 10%;
            animation-delay: -6s;
        }

        @keyframes float-glow {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(40px, 30px) scale(1.15); }
        }

        .talk-hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0.22;
            filter: brightness(60%) contrast(110%);
            z-index: 1;
            pointer-events: none;
        }

        .talk-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background: linear-gradient(180deg, rgba(5, 2, 3, 0.4) 0%, rgba(5, 2, 3, 0.8) 70%, #050203 100%);
            pointer-events: none;
        }

        .talk-hero-container {
            position: relative;
            z-index: 3;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            padding: 0 24px;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 60px;
            align-items: center;
            text-align: left;
            box-sizing: border-box;
        }

        .talk-hero-content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .talk-hero-visual {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .talk-hero-badge {
            background: rgba(225, 29, 72, 0.08);
            border: 1px solid rgba(225, 29, 72, 0.25);
            padding: 6px 18px;
            border-radius: 100px;
            color: #fecdd3;
            font-size: 0.78rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
            box-shadow: 0 0 20px rgba(225, 29, 72, 0.1);
            backdrop-filter: blur(12px);
            width: fit-content;
        }

        .talk-hero-badge svg {
            color: #ff8c8c;
        }

        .talk-hero-badge .live-dot {
            width: 7px;
            height: 7px;
            background-color: #22c55e;
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 8px #22c55e;
            animation: pulse-green 1.6s infinite;
        }

        @keyframes pulse-green {
            0%, 100% { opacity: 0.4; transform: scale(0.9); }
            50% { opacity: 1; transform: scale(1.2); }
        }

        .talk-hero h1 {
            font-size: clamp(3.2rem, 6vw, 4.6rem);
            font-weight: 900;
            margin-bottom: 12px;
            letter-spacing: -0.03em;
            line-height: 1.05;
            color: #ffffff !important;
            text-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            text-align: left;
        }

        .talk-hero h1 span.ideas-title {
            background: linear-gradient(to right, #ffffff, #cbd5e1);
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text;
        }

        .talk-hero h1 span.talk-title {
            background: linear-gradient(135deg, #ff4c4c 0%, #ab0e00 50%, #850a00 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
            position: relative;
        }

        .talk-hero h1 span.talk-title::after {
            content: '.';
            color: #ab0e00;
            -webkit-text-fill-color: #ab0e00 !important;
            animation: pulse-red 2s infinite alternate;
        }

        @keyframes pulse-red {
            0% { opacity: 0.5; }
            100% { opacity: 1; }
        }

        .talk-tagline {
            font-size: clamp(1rem, 2vw, 1.2rem);
            font-weight: 800;
            color: #ff9c9c !important;
            letter-spacing: 0.14em;
            margin-bottom: 24px;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
        }

        .talk-tagline::after {
            content: '';
            flex-grow: 1;
            height: 1px;
            background: linear-gradient(90deg, rgba(252, 165, 165, 0.35), transparent);
        }

        .talk-hero p {
            font-size: 1.12rem;
            color: #cbd5e1 !important;
            max-width: 650px;
            margin-bottom: 40px;
            line-height: 1.7;
            font-weight: 400;
            text-align: left;
        }

        .talk-hero-ctas {
            display: flex;
            gap: 16px;
            justify-content: flex-start;
            flex-wrap: wrap;
            width: 100%;
        }

        .btn-talk-primary {
            position: relative;
            background: linear-gradient(135deg, #ab0e00 0%, #850a00 100%);
            color: #ffffff !important;
            box-shadow: 0 10px 25px rgba(171, 14, 0, 0.3);
            overflow: hidden;
        }

        .btn-talk-primary::after {
            content: '';
            position: absolute;
            top: 0;
            left: -150%;
            width: 150%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            transform: skewX(-20deg);
            animation: btn-shine 4s infinite ease-in-out;
        }

        @keyframes btn-shine {
            0% { left: -150%; }
            45% { left: 150%; }
            100% { left: 150%; }
        }

        .btn-talk-secondary-dark {
            background: rgba(255, 255, 255, 0.04);
            color: #ffffff !important;
            border: 1px solid rgba(255, 255, 255, 0.12);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(12px);
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .btn-talk-secondary-dark:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.25);
            box-shadow: 0 10px 25px rgba(225, 29, 72, 0.15);
            transform: translateY(-3px);
            color: #ffffff !important;
        }

        /* ── Hero Interactive Glass Ticket Card ── */
        .hero-ticket-card {
            background: rgba(15, 12, 13, 0.7);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 30px;
            position: relative;
            box-shadow: 
                0 30px 60px rgba(0, 0, 0, 0.5),
                0 0 100px rgba(225, 29, 72, 0.06) inset;
            transform: perspective(1000px) rotateY(-6deg) rotateX(3deg) scale(0.98);
            transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1), border-color 0.3s, box-shadow 0.3s;
            z-index: 5;
            width: 100%;
            max-width: 440px;
            box-sizing: border-box;
        }

        .hero-ticket-card::before {
            content: '';
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            border-radius: 24px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.12), transparent 45%, rgba(171, 14, 0, 0.15) 100%);
            pointer-events: none;
            z-index: -1;
        }

        .hero-ticket-card:hover {
            transform: perspective(1000px) rotateY(0deg) rotateX(0deg) translateY(-8px) scale(1.02);
            border-color: rgba(171, 14, 0, 0.35);
            box-shadow: 
                0 35px 70px rgba(0, 0, 0, 0.6),
                0 0 40px rgba(171, 14, 0, 0.15);
        }

        .ticket-badge {
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: #ff9e9e;
            background: rgba(171, 14, 0, 0.12);
            border: 1px solid rgba(171, 14, 0, 0.2);
            padding: 5px 14px;
            border-radius: 100px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 20px;
        }

        .ticket-badge .pulse-red {
            width: 6px;
            height: 6px;
            background-color: #ef4444;
            border-radius: 50%;
            box-shadow: 0 0 8px #ef4444;
            animation: pulse-red-dot 1.2s infinite;
        }

        @keyframes pulse-red-dot {
            0%, 100% { opacity: 0.5; transform: scale(0.9); }
            50% { opacity: 1; transform: scale(1.3); }
        }

        .ticket-title {
            font-size: 1.22rem !important;
            font-weight: 800 !important;
            color: #ffffff !important;
            line-height: 1.45 !important;
            margin: 0 0 20px 0 !important;
            display: block !important;
            text-align: left !important;
            -webkit-text-fill-color: initial !important;
            background: none !important;
        }

        .ticket-countdown-container {
            margin-bottom: 22px;
            padding-bottom: 22px;
            border-bottom: 1px dashed rgba(255, 255, 255, 0.12);
        }

        .countdown-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        .countdown-box {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 10px 5px;
            text-align: center;
        }

        .countdown-box .num {
            font-size: 1.45rem;
            font-weight: 850;
            color: #ffffff;
            font-family: 'Courier New', Courier, monospace;
            display: block;
            line-height: 1.1;
        }

        .countdown-box .lbl {
            font-size: 0.6rem;
            text-transform: uppercase;
            color: #94a3b8;
            font-weight: 800;
            letter-spacing: 0.05em;
            margin-top: 4px;
            display: block;
        }

        .ticket-speakers-section {
            margin-bottom: 22px;
            text-align: left;
        }

        .speakers-title {
            font-size: 0.72rem;
            text-transform: uppercase;
            color: #94a3b8;
            font-weight: 800;
            letter-spacing: 0.1em;
            margin-bottom: 12px;
            display: block;
        }

        .speakers-avatars-row {
            display: flex;
            align-items: center;
        }

        .speaker-avatar-wrap {
            position: relative;
            margin-right: -10px;
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            z-index: 1;
        }

        .speaker-avatar-wrap:hover {
            transform: translateY(-5px) scale(1.15);
            z-index: 10;
        }

        .speaker-avatar-img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 2px solid #0f0c0d;
            object-fit: cover;
            background-color: #334155;
            display: block;
        }

        .speakers-count-badge {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 0.75rem;
            font-weight: 700;
            margin-left: 5px;
            cursor: pointer;
        }

        .ticket-slots-section {
            margin-bottom: 5px;
            text-align: left;
        }

        .slots-header {
            display: flex;
            justify-content: space-between;
            font-size: 0.75rem;
            font-weight: 700;
            color: #cbd5e1;
            margin-bottom: 8px;
        }

        .slots-header span.highlight {
            color: #ff4c4c;
            animation: text-pulse 1.5s infinite alternate;
        }

        @keyframes text-pulse {
            0% { text-shadow: 0 0 0px transparent; }
            100% { text-shadow: 0 0 8px rgba(171, 14, 0, 0.4); }
        }

        .slots-progress-track {
            height: 6px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            width: 100%;
        }

        .slots-progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #ab0e00, #ff4c4c);
            border-radius: 10px;
            width: 89%;
            box-shadow: 0 0 10px rgba(171, 14, 0, 0.5);
        }

        /* ── Section: Webinar Brief (Premium Light Sidebar Tabs) ── */
        .talk-brief {
            background-color: #f8fafc; /* Clean light slate background */
            padding: 90px 0;
            position: relative;
            z-index: 3;
            border-top: 1px solid #e2e8f0;
            border-bottom: 1px solid #e2e8f0;
        }

        .talk-brief .talk-container {
            max-width: 1360px !important;
        }

        /* Brief Section Header (Light Theme) */
        .talk-brief .talk-section-header .intro-badge-accent {
            color: #b91c1c;
            background: rgba(185, 28, 28, 0.08);
            border: 1px solid rgba(185, 28, 28, 0.15);
            font-weight: 700;
            padding: 6px 14px !important;
            padding-left: 14px !important;
            border-radius: 100px;
            text-transform: uppercase;
            font-size: 0.72rem;
            letter-spacing: 0.05em;
            display: inline-block;
            margin-bottom: 12px;
        }

        .talk-brief .talk-section-header .intro-badge-accent::before {
            display: none !important;
        }

        .talk-brief .talk-section-header .talk-section-title {
            color: #0f172a !important;
            -webkit-text-fill-color: #0f172a !important;
            font-size: 2.2rem;
            font-weight: 900;
            margin-bottom: 14px;
            line-height: 1.2;
        }

        .talk-brief .talk-section-header .talk-section-title span {
            color: #b91c1c !important;
            -webkit-text-fill-color: #b91c1c !important;
            background: none !important;
        }

        /* Dashboard Container */
        .brief-dashboard {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 40px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 32px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
            box-sizing: border-box;
        }

        @media (max-width: 991px) {
            .brief-dashboard {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 24px 16px;
            }
        }

        /* Vertical Sidebar Tabs Navigation */
        .brief-tabs-nav {
            display: flex;
            flex-direction: column;
            gap: 8px;
            border-right: 1px solid #e2e8f0;
            padding-right: 24px;
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
            overflow-x: visible;
        }

        @media (max-width: 991px) {
            .brief-tabs-nav {
                flex-direction: row;
                border-right: none;
                border-bottom: 1px solid #e2e8f0;
                padding-right: 0;
                padding-bottom: 12px;
                overflow-x: auto;
                scrollbar-width: none;
            }
            .brief-tabs-nav::-webkit-scrollbar {
                display: none;
            }
        }

        .brief-tab-btn {
            background: transparent !important;
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
            color: #64748b;
            font-size: 0.98rem;
            font-weight: 700;
            padding: 14px 20px;
            cursor: pointer;
            border-radius: 12px;
            text-align: left;
            transition: all 0.25s ease;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 12px;
            box-sizing: border-box;
        }

        @media (max-width: 991px) {
            .brief-tab-btn {
                padding: 10px 16px;
                border-radius: 8px;
            }
        }

        .brief-tab-btn:hover {
            color: #0f172a !important;
            background: #f1f5f9 !important;
            border: none !important;
            outline: none !important;
        }

        .brief-tab-btn.active {
            color: #b91c1c !important;
            background: rgba(185, 28, 28, 0.05) !important;
            border: none !important;
            outline: none !important;
        }

        @media (min-width: 992px) {
            .brief-tab-btn.active {
                border-left: 4px solid #b91c1c !important;
                border-radius: 0 12px 12px 0 !important;
            }
        }

        @media (max-width: 991px) {
            .brief-tab-btn.active {
                border: 1px solid rgba(185, 28, 28, 0.2) !important;
                box-shadow: 0 4px 10px rgba(185, 28, 28, 0.05) !important;
            }
        }

        /* Content Panel */
        .brief-tab-panel {
            display: none;
            animation: briefFadeIn 0.4s ease-out forwards;
        }

        .brief-tab-panel.active {
            display: block;
        }

        @keyframes briefFadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Context Cards (Light Theme) */
        .brief-context-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        @media (max-width: 768px) {
            .brief-context-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }

        .context-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
            height: 100%;
            box-sizing: border-box;
        }

        .context-card h4 {
            color: #0f172a;
            font-size: 1.15rem;
            font-weight: 800;
            margin: 0 0 14px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            -webkit-text-fill-color: initial !important;
            background: none !important;
        }

        .context-card h4 .icon {
            color: #b91c1c;
        }

        .context-card p {
            color: #475569 !important;
            font-size: 0.98rem;
            line-height: 1.65;
            margin: 0;
        }

        /* Speakers Grid */
        .brief-speakers-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        @media (max-width: 991px) {
            .brief-speakers-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }

        /* Speaker Cards (Light Theme) */
        .brief-speaker-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 24px;
            text-align: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-sizing: border-box;
        }

        .brief-speaker-card:hover {
            transform: translateY(-4px);
            border-color: rgba(185, 28, 28, 0.25);
            box-shadow: 0 12px 24px rgba(15, 23, 42, 0.06);
        }

        .brief-speaker-avatar {
            width: 84px;
            height: 84px;
            border-radius: 50%;
            border: 3px solid rgba(185, 28, 28, 0.15);
            margin: 0 auto 16px;
            object-fit: cover;
            display: block;
        }

        .brief-speaker-name {
            color: #0f172a;
            font-size: 1.15rem;
            font-weight: 800;
            margin-bottom: 4px;
            display: block;
        }

        .brief-speaker-role {
            color: #b91c1c;
            background: rgba(185, 28, 28, 0.06);
            border: 1px solid rgba(185, 28, 28, 0.1);
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 4px 12px;
            border-radius: 100px;
            display: inline-block;
            margin-bottom: 16px;
        }

        .brief-speaker-perspective {
            color: #475569 !important;
            font-size: 0.92rem;
            line-height: 1.55;
            margin: 0;
            text-align: left;
        }

        /* Target Stats & Privilege (Light Theme) */
        .brief-targets-vertical-stack {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
        }

        .privilege-banner-card {
            width: 100% !important;
            box-sizing: border-box !important;
        }

        .targets-stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        @media (max-width: 500px) {
            .targets-stats-grid {
                grid-template-columns: 1fr;
            }
        }

        .target-stat-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.01);
            padding: 24px;
            text-align: center;
        }

        .target-stat-num {
            font-size: 2.3rem;
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 4px;
            display: block;
        }

        .target-stat-lbl {
            color: #64748b;
            font-size: 0.85rem;
            font-weight: 700;
            line-height: 1.35;
            display: block;
        }

        .privilege-banner-card {
            background: linear-gradient(135deg, rgba(185, 28, 28, 0.08) 0%, rgba(79, 70, 229, 0.05) 100%);
            border: 1px solid rgba(185, 28, 28, 0.15);
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.02);
            border-radius: 20px;
            padding: 24px;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-sizing: border-box;
        }

        .privilege-banner-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -30%;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: rgba(185, 28, 28, 0.08);
            filter: blur(40px);
            z-index: 1;
        }

        .privilege-badge {
            font-size: 0.65rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #ffffff;
            background: #b91c1c;
            padding: 4px 10px;
            border-radius: 100px;
            width: fit-content;
            margin-bottom: 12px;
            position: relative;
            z-index: 2;
        }

        .privilege-title {
            color: #0f172a;
            font-size: 1.15rem;
            font-weight: 800;
            margin: 0 0 8px 0;
            position: relative;
            z-index: 2;
        }

        .privilege-desc {
            color: #475569 !important;
            font-size: 0.88rem;
            line-height: 1.5;
            margin: 0;
            position: relative;
            z-index: 2;
        }

        /* ── Section 1: Intro (Image Left-Right Contrast) ── */
        .section-intro {
            padding: 95px 0;
            position: relative;
            background-color: #ffffff; /* Clean light background */
        }


        .intro-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 60px;
            align-items: center;
        }

        @media (max-width: 992px) {
            .intro-grid {
                grid-template-columns: 1fr;
                gap: 45px;
            }
        }

        .intro-badge-accent {
            font-size: 0.75rem;
            font-weight: 800;
            color: #b91c1c;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            margin-bottom: 16px;
            display: inline-block;
            position: relative;
            padding-left: 24px;
        }

        .intro-badge-accent::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 14px;
            height: 2px;
            background: #b91c1c;
        }

        .intro-left h3 {
            font-size: clamp(2rem, 3.8vw, 2.6rem);
            font-weight: 850;
            line-height: 1.2;
            color: #0f172a;
            margin-bottom: 24px;
            letter-spacing: -0.02em;
        }

        .intro-left .highlight-number {
            font-size: 1.15em;
            font-weight: 900;
            background: linear-gradient(135deg, #ab0e00 0%, #850a00 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }

        .intro-line-decorator {
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #b91c1c, transparent);
            margin-bottom: 24px;
            border-radius: 2px;
        }

        .intro-left p {
            font-size: 1.08rem;
            line-height: 1.75;
            color: #475569;
            font-weight: 500;
            margin: 0 0 30px;
        }

        /* 3 horizontal info cards */
        .intro-horizontal-cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        @media (max-width: 580px) {
            .intro-horizontal-cards {
                grid-template-columns: 1fr;
                gap: 12px;
            }
        }

        .intro-mini-card {
            background: #fcfcfd;
            border: 1px solid rgba(15, 23, 42, 0.04);
            border-radius: 16px;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.008);
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
        }

        .intro-mini-card:hover {
            transform: translateY(-3px);
            border-color: rgba(185, 28, 28, 0.15);
            box-shadow: 0 10px 25px rgba(185, 28, 28, 0.03);
            background: #ffffff;
        }

        .mini-card-icon {
            width: 42px;
            height: 42px;
            background: rgba(185, 28, 28, 0.05);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #b91c1c;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .intro-mini-card:hover .mini-card-icon {
            background: #b91c1c;
            color: #ffffff;
            transform: scale(1.05);
        }

        .mini-card-icon svg {
            width: 20px !important;
            height: 20px !important;
            display: block !important;
            flex-shrink: 0 !important;
        }

        .mini-card-text strong {
            display: block;
            font-size: 0.85rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 2px;
        }

        .mini-card-text span {
            font-size: 0.76rem;
            color: #64748b;
            font-weight: 500;
            line-height: 1.25;
            display: block;
        }

        /* Image Column */
        .intro-image-wrapper {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(15, 23, 42, 0.06);
            aspect-ratio: 4 / 3;
            background: #f1f5f9;
        }

        .intro-img-main {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .intro-image-wrapper:hover .intro-img-main {
            transform: scale(1.03);
        }

        .img-floating-badge {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            color: #ffffff;
            padding: 8px 18px;
            border-radius: 100px;
            font-size: 0.78rem;
            font-weight: 800;
            border: 1px solid rgba(255, 255, 255, 0.1);
            letter-spacing: 0.05em;
            text-transform: uppercase;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        /* ── Section 2: Why Attend (Split List - Alternate Contrast Background) ── */
        .section-why {
            padding: 95px 0;
            background-color: #f1f5f9; /* Soft cool contrast grey background */
        }

        .why-split-container {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 60px;
            align-items: flex-start;
        }

        @media (max-width: 992px) {
            .why-split-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            .why-left-sticky {
                position: relative !important;
                top: 0 !important;
                margin-bottom: 30px !important;
            }
        }

        .why-left-sticky {
            position: sticky;
            top: 100px;
        }

        .why-left-sticky h2,
        .why-left-sticky .talk-section-title {
            font-size: clamp(2rem, 4vw, 2.6rem) !important;
            font-weight: 850 !important;
            color: #0f172a !important;
            -webkit-text-fill-color: #0f172a !important;
            background: none !important;
            background-clip: border-box !important;
            line-height: 1.2 !important;
            margin-bottom: 20px !important;
            letter-spacing: -0.02em !important;
            display: block !important;
        }

        .why-left-sticky h2 span,
        .why-left-sticky .talk-section-title span {
            color: #b91c1c !important;
            background: none !important;
            -webkit-text-fill-color: #b91c1c !important;
            background-clip: border-box !important;
            display: inline-block !important;
        }

        .why-left-sticky p {
            font-size: 1.1rem;
            color: #64748b;
            line-height: 1.65;
            margin-bottom: 30px;
        }

        .why-sticky-image-wrapper {
            margin-bottom: 30px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(15, 23, 42, 0.05);
            aspect-ratio: 16 / 10;
            background: #e2e8f0;
        }

        .why-sticky-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .why-sticky-image-wrapper:hover .why-sticky-img {
            transform: scale(1.03);
        }

        .why-right-list {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .why-list-item {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.05);
            border-radius: 20px;
            padding: 28px 30px;
            display: flex;
            gap: 24px;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.01);
            position: relative;
        }

        .why-list-item:hover {
            transform: translateY(-4px);
            border-color: rgba(185, 28, 28, 0.2);
            box-shadow: 0 15px 35px rgba(185, 28, 28, 0.05);
        }

        .why-item-number {
            position: absolute;
            top: 24px;
            right: 30px;
            font-size: 2.2rem;
            font-weight: 900;
            color: rgba(185, 28, 28, 0.15);
            line-height: 1;
            font-family: inherit;
            transition: color 0.3s ease;
        }

        .why-list-item:hover .why-item-number {
            color: rgba(185, 28, 28, 0.35);
        }

        .why-item-icon-wrapper {
            width: 50px;
            height: 50px;
            background: rgba(185, 28, 28, 0.05);
            border: 1px solid rgba(185, 28, 28, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #b91c1c;
            flex-shrink: 0;
        }

        .why-item-icon-wrapper svg {
            width: 22px;
            height: 22px;
        }

        .why-item-content h3 {
            font-size: 1.15rem;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 8px;
        }

        .why-item-content p {
            font-size: 0.95rem;
            line-height: 1.6;
            color: #475569;
            margin: 0;
        }

        /* ── Section 3: Topics (Clean Split Grid - Alternate White Background) ── */
        .section-topics {
            padding: 95px 0;
            background-color: #ffffff; /* Clean contrast background */
        }

        .topics-split-grid {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 60px;
            align-items: center;
        }

        @media (max-width: 992px) {
            .topics-split-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }
        }

        .topics-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .topic-badge-row {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.05);
            border-radius: 18px;
            padding: 24px 30px;
            display: flex;
            align-items: center;
            gap: 24px;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.008);
            position: relative;
            overflow: hidden;
        }

        .topic-badge-row::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(180deg, #ab0e00, #850a00);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .topic-badge-row:hover::before {
            transform: scaleY(1);
        }

        .topic-badge-row:hover {
            border-color: rgba(185, 28, 28, 0.15);
            transform: translateX(8px);
            box-shadow: 0 12px 30px rgba(185, 28, 28, 0.04);
            background: #fffdfd;
        }

        .topic-badge-row.hot-card {
            border-color: rgba(185, 28, 28, 0.18);
            background: linear-gradient(135deg, #ffffff 0%, #fffefe 60%, rgba(185, 28, 28, 0.015) 100%);
            box-shadow: 0 4px 25px rgba(185, 28, 28, 0.02);
        }

        .topic-badge-row.hot-card::before {
            transform: scaleY(1);
        }

        .topic-badge-row.hot-card .topic-tag.hot {
            background: linear-gradient(135deg, #ab0e00 0%, #850a00 100%);
            color: #ffffff;
            border-color: transparent;
            box-shadow: 0 4px 15px rgba(185, 28, 28, 0.2);
        }

        .topic-tag-col {
            width: 200px;
            flex-shrink: 0;
            display: flex;
        }

        .topic-tag {
            width: 100%;
            background: rgba(15, 23, 42, 0.03);
            border: 1px solid rgba(15, 23, 42, 0.08);
            padding: 10px 20px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: 0.02em;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .topic-badge-row:hover .topic-tag {
            background: linear-gradient(135deg, #ab0e00 0%, #850a00 100%);
            color: #ffffff;
            border-color: transparent;
            box-shadow: 0 4px 15px rgba(185, 28, 28, 0.25);
        }

        .topic-tag.hot {
            background: rgba(217, 119, 6, 0.05);
            border-color: rgba(217, 119, 6, 0.15);
            color: #d97706;
        }

        .topic-badge-row:hover .topic-tag.hot {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: #ffffff;
            border-color: transparent;
            box-shadow: 0 4px 15px rgba(217, 119, 6, 0.25);
        }

        .topic-desc-col {
            flex-grow: 1;
        }

        .topic-desc {
            font-size: 1.05rem;
            color: #334155;
            line-height: 1.6;
            margin: 0;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .topic-badge-row:hover .topic-desc {
            color: #0f172a;
        }

        /* Image card right in Topics */
        .topics-featured-card {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(15, 23, 42, 0.05);
            aspect-ratio: 4 / 3;
            background: #e2e8f0;
        }

        .topics-card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .topics-featured-card:hover .topics-card-img {
            transform: scale(1.03);
        }

        .topics-card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(360deg, rgba(9, 5, 6, 0.8) 0%, rgba(9, 5, 6, 0.25) 60%, transparent 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 30px;
            color: #ffffff;
        }

        .topics-card-overlay h4 {
            margin: 0 0 8px;
            font-size: 1.25rem;
            font-weight: 800;
            color: #ffffff;
        }

        .topics-card-overlay p {
            margin: 0;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
            line-height: 1.4;
        }

        @media (max-width: 768px) {
            .topic-badge-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
                padding: 20px;
            }
            .topic-tag-col {
                width: auto;
                flex-shrink: 1;
            }
            .timeline-nav-btn {
                display: none;
            }
            .timeline-track-wrapper {
                padding-left: 20px;
                padding-right: 20px;
            }
        }

        .section-featured {
            padding: 80px 0;
            width: 100%;
            overflow: hidden;
            background-image: linear-gradient(180deg, rgba(9, 5, 6, 0.93) 0%, rgba(9, 5, 6, 0.97) 100%), url('https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }

        .section-featured::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(185, 28, 28, 0.2) 1.5px, transparent 1.5px);
            background-size: 32px 32px;
            opacity: 0.25;
            pointer-events: none;
            z-index: 1;
        }

        .section-featured .talk-section-header h2,
        .section-featured .talk-section-header .talk-section-title {
            color: #ffffff !important;
            -webkit-text-fill-color: #ffffff !important;
            background: none !important;
            background-clip: border-box !important;
        }

        .section-featured .talk-section-header h2 span,
        .section-featured .talk-section-header .talk-section-title span {
            color: #b91c1c !important;
            -webkit-text-fill-color: #b91c1c !important;
            background: none !important;
            background-clip: border-box !important;
            display: inline-block !important;
        }

        .section-featured .talk-section-header p {
            color: rgba(255, 255, 255, 0.75) !important;
        }

        .timeline-container-fluid {
            position: relative;
            padding: 40px 0;
            width: 100%;
        }

        html, body {
            overflow-x: clip !important;
        }

        #content, .site, #page {
            overflow: visible !important;
        }

        .timeline-track-wrapper {
            overflow-x: auto;
            padding: 20px 0;
            width: 100%;
            padding-left: 50px;
            padding-right: 50px;
            scrollbar-width: none !important; /* Hide for Firefox */
            -ms-overflow-style: none !important;  /* Hide for IE/Edge */
            -webkit-overflow-scrolling: touch;
            box-sizing: border-box;
        }

        .timeline-track-wrapper::-webkit-scrollbar {
            display: none !important; /* Hide for Chrome, Safari, Opera */
            width: 0 !important;
            height: 0 !important;
            background: transparent !important;
        }

        /* Timeline Navigation Buttons */
        .timeline-nav-btn {
            position: absolute;
            top: 55%;
            transform: translateY(-50%);
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #b91c1c;
            border: 1px solid #b91c1c;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 4px 15px rgba(185, 28, 28, 0.3);
        }

        .timeline-nav-btn:hover {
            background: #ab0e00;
            border-color: #ab0e00;
            color: #ffffff;
            box-shadow: 0 0 20px rgba(171, 14, 0, 0.5);
            transform: translateY(-50%) scale(1.08);
        }

        .timeline-nav-btn.disabled {
            background: rgba(255, 255, 255, 0.05) !important;
            border-color: rgba(255, 255, 255, 0.1) !important;
            color: rgba(255, 255, 255, 0.2) !important;
            cursor: not-allowed !important;
            pointer-events: none !important;
            box-shadow: none !important;
        }

        .timeline-nav-btn.prev-btn {
            left: 20px;
        }

        .timeline-nav-btn.next-btn {
            right: 20px;
        }

        .timeline-nav-btn svg {
            width: 14px;
            height: 14px;
            display: block;
        }

        .timeline-track {
            display: flex;
            gap: 30px;
            position: relative;
            min-width: max-content;
        }

        @keyframes timeline-flow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .timeline-line {
            position: absolute;
            top: 12px;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #ab0e00, #ff4c4c, #ab0e00, rgba(255, 255, 255, 0.05));
            background-size: 300% 100%;
            animation: timeline-flow 6s ease infinite;
            z-index: 1;
        }

        .timeline-node {
            position: relative;
            width: 320px;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .timeline-dot {
            width: 24px;
            height: 24px;
            background: #090506;
            border: 4px solid #b91c1c;
            border-radius: 50%;
            box-shadow: 0 0 8px rgba(185, 28, 28, 0.35);
            z-index: 3;
            margin-bottom: 24px;
            position: relative;
            transition: all 0.3s ease;
        }

        .timeline-node.active .timeline-dot {
            background: #b91c1c;
            transform: scale(1.25);
            box-shadow: 0 0 15px rgba(185, 28, 28, 0.6);
        }

        .timeline-node.active .timeline-dot::after {
            content: '';
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            border: 2px solid #b91c1c;
            border-radius: 50%;
            animation: ping 1.8s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        @keyframes ping {
            75%, 100% {
                transform: scale(2.2);
                opacity: 0;
            }
        }

        .timeline-node.updating .timeline-dot {
            border-color: #475569;
            box-shadow: none;
        }

        .timeline-content-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 26px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            width: 100%;
            box-sizing: border-box;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: flex;
            flex-direction: column;
            height: 380px;
            justify-content: space-between;
        }

        .timeline-node:hover .timeline-content-card {
            transform: translateY(-8px);
            border-color: rgba(185, 28, 28, 0.4);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.5), 0 0 15px rgba(185, 28, 28, 0.1);
        }

        .timeline-node.updating .timeline-content-card {
            background: rgba(255, 255, 255, 0.01);
            border-style: dashed;
            box-shadow: none;
        }

        .timeline-badge {
            background: rgba(171, 14, 0, 0.12);
            border: 1px solid rgba(171, 14, 0, 0.3);
            color: #ff8c8c;
            padding: 4px 12px;
            border-radius: 6px;
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            display: inline-block;
            margin-bottom: 12px;
            align-self: flex-start;
        }

        .timeline-badge.updating {
            background: rgba(255, 255, 255, 0.03);
            border-color: rgba(255, 255, 255, 0.1);
            color: #94a3b8;
        }

        .timeline-content-card h3 {
            font-size: 1.15rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 10px;
            line-height: 1.45;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 4.35em;
        }

        .timeline-meta {
            display: flex;
            flex-direction: column;
            gap: 6px;
            font-size: 0.82rem;
            color: #94a3b8;
            margin-bottom: 12px;
        }

        .timeline-meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .timeline-meta-item svg {
            color: #b91c1c;
            flex-shrink: 0;
        }

        .timeline-desc {
            font-size: 0.88rem;
            line-height: 1.55;
            color: #cbd5e1;
            margin: 0;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 4.65em;
        }

        .timeline-btn-wrapper {
            margin-top: 14px;
        }

        .timeline-btn-wrapper button {
            width: 100%;
            padding: 11px 15px;
            font-size: 0.88rem;
            border-radius: 10px;
        }

        /* ── Section 5: Theater Section ────────────────── */
        .theater-section {
            padding: 60px 0;
            position: relative;
            background: #f1f5f9;
            border-radius: 32px;
            margin: 40px 0;
            box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.015);
        }

        .theater-container {
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
            .theater-section {
                padding: 30px 10px !important;
                border-radius: 18px;
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
                0 15px 40px rgba(0, 0, 0, 0.05),
                0 0 20px rgba(185, 28, 28, 0.03);
            border: 1px solid rgba(15, 23, 42, 0.06);
            transition: border-color 0.3s ease;
        }

        .video-player-box:hover {
            border-color: rgba(185, 28, 28, 0.25);
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
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.05);
            border-radius: 20px;
            padding: 30px;
            color: #0f172a;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.015);
        }

        .player-meta-card h2 {
            font-size: 1.6rem;
            font-weight: 800;
            margin: 12px 0;
            line-height: 1.35;
            letter-spacing: -0.01em;
            color: #0f172a;
        }

        .meta-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            background: rgba(185, 28, 28, 0.05);
            border: 1px solid rgba(185, 28, 28, 0.15);
            color: #b91c1c;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            border-radius: 8px;
        }

        .meta-row {
            display: flex;
            gap: 24px;
            color: #64748b;
            font-size: 0.9rem;
            font-weight: 500;
            margin-top: 8px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .meta-item svg {
            color: #b91c1c;
        }

        /* Playlist Styling */
        .playlist-column {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.05);
            border-radius: 24px;
            display: flex;
            flex-direction: column;
            height: 100%;
            max-height: 620px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.015);
        }

        @media (max-width: 992px) {
            .playlist-column {
                max-height: 420px;
            }
        }

        .playlist-header {
            padding: 24px 28px;
            border-bottom: 1px solid rgba(15, 23, 42, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(0, 0, 0, 0.003);
        }

        .playlist-header h3 {
            margin: 0;
            font-size: 1.15rem;
            font-weight: 800;
            color: #0f172a;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .playlist-header h3 svg {
            color: #b91c1c;
        }

        .video-count-badge {
            font-size: 0.82rem;
            font-weight: 700;
            background: rgba(15, 23, 42, 0.04);
            padding: 5px 12px;
            border-radius: 100px;
            color: #475569;
            border: 1px solid rgba(15, 23, 42, 0.03);
        }

        .playlist-scroll {
            overflow-y: auto;
            flex-grow: 1;
            padding: 14px;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .playlist-scroll::-webkit-scrollbar {
            display: none;
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
            padding: 14px 16px;
            border-radius: 12px;
            background: rgba(15, 23, 42, 0.005);
            border: 1px solid rgba(15, 23, 42, 0.015);
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .playlist-items li:hover {
            background: rgba(185, 28, 28, 0.03);
            border-color: rgba(185, 28, 28, 0.1);
            transform: translateY(-2px);
        }

        .playlist-items li.active {
            background: rgba(185, 28, 28, 0.05);
            border-color: rgba(185, 28, 28, 0.18);
            box-shadow: 0 4px 12px rgba(185, 28, 28, 0.02);
        }

        .playlist-items li p.title {
            margin: 0;
            font-size: 0.88rem;
            font-weight: 700;
            color: #334155 !important;
            line-height: 1.4;
            transition: color 0.2s ease;
        }

        .playlist-items li.active p.title {
            color: #b91c1c !important;
        }

        .playlist-items li p.details {
            margin: 0;
            font-size: 0.78rem;
            color: #64748b !important;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .playlist-items li p.details span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #64748b !important;
        }

        .playlist-items li p.details svg {
            color: #b91c1c !important;
        }

        /* ── Section 6: Form (Split Grid Box with Image Left) ── */
        .section-form {
            padding: 20px 0 85px 0;
            position: relative;
        }

        .form-grid-box {
            max-width: 1200px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.06);
            border-radius: 32px;
            display: grid;
            grid-template-columns: 1.35fr 1fr;
            overflow: hidden;
            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.02),
                0 0 35px rgba(185, 28, 28, 0.015);
        }

        @media (max-width: 992px) {
            .form-grid-box {
                grid-template-columns: 1fr;
            }
            .form-image-col {
                display: none;
            }
        }

        .form-image-col {
            position: relative;
            background: #f1f5f9;
            height: 100%;
            min-height: 580px;
        }

        .form-side-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .form-image-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(360deg, rgba(9, 5, 6, 0.9) 0%, rgba(9, 5, 6, 0.35) 60%, transparent 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 40px;
            color: #ffffff;
        }

        /* ── Scroll Reveal Animations ────────────────── */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }

        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        .stagger-item {
            transition-delay: 0.1s;
        }

        .form-image-overlay h3 {
            margin: 0 0 10px;
            font-size: 1.4rem;
            font-weight: 800;
            color: #ffffff;
        }

        .form-image-overlay p {
            margin: 0;
            font-size: 0.92rem;
            color: rgba(255, 255, 255, 0.85);
            line-height: 1.5;
            font-weight: 500;
        }

        .form-content-col {
            padding: 50px 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        @media (max-width: 576px) {
            .form-content-col {
                padding: 35px 20px;
            }
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-header h2 {
            font-size: clamp(1.8rem, 3.5vw, 2.2rem);
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 12px;
        }

        .form-header p {
            font-size: 1rem;
            color: #64748b;
            margin: 0;
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            color: #334155;
            letter-spacing: 0.02em;
        }

        .form-control {
            width: 100%;
            background: #f8f9fa;
            border: 1px solid rgba(15, 23, 42, 0.08);
            border-radius: 10px;
            padding: 14px 16px;
            color: #0f172a;
            font-family: inherit;
            font-size: 0.95rem;
            transition: all 0.25s ease;
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            border-color: #b91c1c;
            background: #ffffff;
            box-shadow: 0 0 10px rgba(185, 28, 28, 0.06);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        /* Errors */
        .error-message {
            color: #b91c1c;
            font-size: 0.8rem;
            margin-top: 6px;
            display: none;
            align-items: center;
            gap: 6px;
        }

        .error-message.active {
            display: flex;
        }

        /* Success box */
        .success-box {
            display: none;
            text-align: center;
            padding: 40px 20px;
        }

        .success-box.visible {
            display: block;
        }

        .success-icon-wrap {
            width: 72px;
            height: 72px;
            background: rgba(52, 211, 153, 0.08);
            border: 1px solid rgba(52, 211, 153, 0.2);
            color: #059669;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
        }

        .success-icon-wrap svg {
            width: 32px;
            height: 32px;
        }

        .success-box h3 {
            font-size: 1.6rem;
            font-weight: 800;
            margin: 0 0 16px;
            color: #0f172a;
        }

        .success-box p {
            font-size: 1rem;
            line-height: 1.6;
            color: #4b5563;
            margin: 0 0 30px;
        }

        /* ── Partners ────────────────────── */
        .talk-coop {
            padding: 85px 20px;
            background: transparent;
            position: relative;
            border-top: 1px solid rgba(15, 23, 42, 0.05);
        }

        .coop-container {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }

        .coop-title {
            font-size: clamp(1.8rem, 4vw, 2.2rem);
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .coop-title svg {
            color: #b91c1c;
        }

        .coop-title b {
            color: #b91c1c !important;
            background: none !important;
            -webkit-background-clip: border-box !important;
            -webkit-text-fill-color: #b91c1c !important;
            background-clip: border-box !important;
        }

        .coop-sub {
            color: #64748b;
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
                0 10px 25px rgba(0, 0, 0, 0.015),
                0 0 15px rgba(0, 0, 0, 0.005);
            border: 1px solid rgba(15, 23, 42, 0.05);
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 95px;
        }

        .coop-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(185, 28, 28, 0.08);
            border-color: rgba(185, 28, 28, 0.25);
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

        @media (max-width: 768px) {
            .section-intro,
            .section-why,
            .section-topics,
            .section-featured,
            .section-form,
            .talk-coop {
                padding: 55px 0 !important;
            }
            .talk-hero {
                padding: 120px 15px 70px !important;
                min-height: auto !important;
            }
            .talk-hero-container {
                grid-template-columns: 1fr !important;
                text-align: center !important;
                gap: 40px !important;
            }
            .talk-hero-content {
                align-items: center !important;
            }
            .talk-hero-visual {
                width: 100% !important;
            }
            .talk-hero h1 {
                font-size: 2.4rem !important;
                margin-bottom: 12px;
                text-align: center !important;
            }
            .talk-tagline {
                justify-content: center !important;
            }
            .talk-tagline::after {
                display: none !important;
            }
            .talk-hero p {
                text-align: center !important;
                margin-left: auto !important;
                margin-right: auto !important;
                margin-bottom: 30px !important;
            }
            .talk-hero-ctas {
                flex-direction: column;
                gap: 12px;
                width: 100%;
                max-width: 320px;
                margin-left: auto;
                margin-right: auto;
                justify-content: center !important;
            }
            .talk-hero-ctas .btn-talk {
                width: 100%;
                text-align: center;
                margin: 0;
            }
            .hero-ticket-card {
                transform: none !important;
                margin: 15px auto 0 !important;
                max-width: 400px !important;
                padding: 24px 20px !important;
            }
            .countdown-box .num {
                font-size: 1.25rem !important;
            }
            
            /* Section 1: Intro Center Alignment on Mobile */
            .intro-left {
                text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            .intro-badge-accent {
                padding-left: 0;
                margin-left: auto;
                margin-right: auto;
            }
            .intro-badge-accent::before {
                display: none;
            }
            .intro-line-decorator {
                margin-left: auto;
                margin-right: auto;
                background: linear-gradient(90deg, transparent, #b91c1c, transparent);
            }
            
            /* Section 2: Why Attend - Clean Non-Squished Mobile Layout */
            .why-list-item {
                position: relative !important;
                padding: 38px 20px 24px !important; /* Top padding to accommodate float number */
                flex-direction: row !important;
                gap: 16px !important;
                align-items: flex-start !important;
            }
            .why-item-number {
                position: absolute !important;
                top: 15px !important;
                right: 20px !important;
                font-size: 1.6rem !important;
                font-weight: 900 !important;
                color: rgba(185, 28, 28, 0.18) !important;
            }
            
            /* Section 4: Timeline Mobile Enhancements & High Contrast Text */
            .timeline-nav-btn {
                display: none !important; /* Hide next/prev buttons on mobile */
            }
            .timeline-node.updating {
                display: none !important; /* Hide empty/updating placeholder nodes */
            }
            .timeline-track-wrapper {
                padding-left: 20px !important;
                padding-right: 20px !important;
                padding-top: 10px;
                padding-bottom: 20px;
            }
            .timeline-node {
                width: 290px !important; /* Compact mobile width */
            }
            .timeline-content-card {
                padding: 20px !important;
                height: auto !important; /* Auto height to fit text neatly */
                min-height: 310px !important;
                background: #110d0e !important; /* Lighter background for higher contrast */
                border: 1.5px solid rgba(255, 255, 255, 0.25) !important; /* Brighter border */
            }
            .timeline-node.active .timeline-content-card {
                border-color: rgba(185, 28, 28, 0.6) !important;
                box-shadow: 0 10px 25px rgba(185, 28, 28, 0.25) !important;
            }
            .timeline-content-card h3 {
                font-size: 1.05rem !important;
                height: auto !important;
                color: #ffffff !important; /* High contrast white heading */
                -webkit-line-clamp: 2 !important;
                margin-bottom: 8px !important;
            }
            .timeline-meta-item {
                color: #e2e8f0 !important; /* Light slate color for sub-text */
                font-size: 0.8rem !important;
            }
            .timeline-desc {
                font-size: 0.84rem !important;
                color: #f1f5f9 !important; /* Bright white-grey description text */
                height: auto !important;
                line-height: 1.6 !important;
                -webkit-line-clamp: 3 !important;
                margin-bottom: 15px !important;
            }
            .timeline-dot {
                width: 18px !important;
                height: 18px !important;
                border-width: 3px !important;
                margin-bottom: 16px !important;
            }
            .timeline-line {
                top: 9px !important;
            }

            .why-sticky-image-wrapper {
                aspect-ratio: 16 / 9;
            }
            .form-content-col {
                padding: 30px 20px !important;
            }
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Site Header -->
    <?php get_template_part('shared-header'); ?>

    <div class="mobile-overlay" id="mobile-overlay"></div>

    <main id="content">
        <!-- Hero Section: Keep Dark/Black -->
        <section class="talk-hero" id="hero">
            <!-- Glowing background elements -->
            <div class="talk-hero-glow-1"></div>
            <div class="talk-hero-glow-2"></div>
            
            <div class="talk-hero-bg"
                style="background-image: url('https://ideas.edu.vn/wp-content/uploads/2024/03/Hoi-thao-MBA-50-5.webp');">
            </div>
            <div class="talk-hero-overlay"></div>
            
            <div class="talk-hero-container">
                <!-- Column 1: Content -->
                <div class="talk-hero-content">
                    <span class="talk-hero-badge">
                        <span class="live-dot"></span>
                        <?php echo $is_en ? 'Webinar Series' : 'Chuỗi Webinar'; ?>
                    </span>
                    <h1>
                        <span class="ideas-title">IDEAS</span> <span class="talk-title">TALK</span>
                    </h1>
                    <div class="talk-tagline"><?php echo $is_en ? 'Actionable Knowledge Transfer' : 'Tri Thức Thực Chiến Chuyển Đổi'; ?></div>

                    <p><?php echo $is_en ? '#IDEAS Monthly Workshop - The place to update new knowledge, lean methods, and breakthrough solutions for individuals & businesses.' : '#IDEAS Monthly Workshop - Nơi cập nhật tri thức mới, phương pháp tinh gọn và giải pháp bứt phá cho cá nhân & doanh nghiệp.'; ?></p>
                    
                    <div class="talk-hero-ctas">
                        <a href="javascript:void(0)" onclick="openWebinarRegisterModal('Ứng dụng AI trong học tập & nghiên cứu (13/08/2026)')" class="btn-talk btn-talk-primary">
                            <?php echo $is_en ? 'Register Now' : 'Đăng ký tham gia ngay'; ?>
                        </a>
                        <a href="#recap" class="btn-talk btn-talk-secondary-dark">
                            <?php echo $is_en ? 'Watch Latest Recap' : 'Xem Recap buổi gần nhất'; ?>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Visual Card (Ticket) -->
                <div class="talk-hero-visual">
                    <div class="hero-ticket-card" id="hero-ticket">
                        <span class="ticket-badge">
                            <span class="pulse-red"></span>
                            <?php echo $is_en ? 'Upcoming Session' : 'Sự Kiện Tiếp Theo'; ?>
                        </span>
                        
                        <h3 class="ticket-title">
                            <?php echo $is_en ? 'Applying AI in Learning & Research: Multidimensional Perspectives' : 'Ứng dụng AI trong học tập & nghiên cứu: Góc Nhìn Đa Chiều'; ?>
                        </h3>
                        
                        <div class="ticket-countdown-container">
                            <div class="countdown-grid" id="countdown-timer">
                                <div class="countdown-box">
                                    <span class="num" id="days">00</span>
                                    <span class="lbl"><?php echo $is_en ? 'Days' : 'Ngày'; ?></span>
                                </div>
                                <div class="countdown-box">
                                    <span class="num" id="hours">00</span>
                                    <span class="lbl"><?php echo $is_en ? 'Hrs' : 'Giờ'; ?></span>
                                </div>
                                <div class="countdown-box">
                                    <span class="num" id="minutes">00</span>
                                    <span class="lbl"><?php echo $is_en ? 'Mins' : 'Phút'; ?></span>
                                </div>
                                <div class="countdown-box">
                                    <span class="num" id="seconds">00</span>
                                    <span class="lbl"><?php echo $is_en ? 'Secs' : 'Giây'; ?></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="ticket-speakers-section">
                            <span class="speakers-title"><?php echo $is_en ? 'Expert Speaker Panel' : 'Hội đồng chuyên gia'; ?></span>
                            <div class="speakers-avatars-row">
                                <div class="speaker-avatar-wrap" title="TS. Phạm Quang Vinh">
                                    <img class="speaker-avatar-img" src="https://ideas.edu.vn/wp-content/uploads/2025/03/vientruong_avt-optimized.webp" alt="TS. Phạm Quang Vinh" onerror="this.src='https://secure.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=96&d=mm&r=g'">
                                </div>
                                <div class="speaker-avatar-wrap" title="Mr. Võ Trùng Dương">
                                    <img class="speaker-avatar-img" src="https://ideas.edu.vn/wp-content/uploads/2026/07/avatar_mr_duong.webp" alt="Mr. Võ Trùng Dương" onerror="this.src='https://secure.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=96&d=mm&r=g'">
                                </div>
                                <div class="speaker-avatar-wrap" title="NCS. Phạm Phi Vũ">
                                    <img class="speaker-avatar-img" src="https://ideas.edu.vn/wp-content/uploads/2026/07/tsphivu.webp" alt="NCS. Phạm Phi Vũ" onerror="this.src='https://secure.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=96&d=mm&r=g'">
                                </div>
                            </div>
                        </div>
                        
                        <div class="ticket-slots-section">
                            <div class="slots-header">
                                <span><?php echo $is_en ? 'Registered' : 'Đã đăng ký'; ?>: <strong style="color:#ffffff;">89%</strong></span>
                                <span class="highlight"><?php echo $is_en ? 'Only 15 seats left!' : 'Chỉ còn 15 chỗ!'; ?></span>
                            </div>
                            <div class="slots-progress-track">
                                <div class="slots-progress-bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Section 1: Intro (Image Left-Right Contrast) -->
        <section class="section-intro scroll-reveal" id="about">
            <div class="talk-container">
                <div class="intro-grid">
                    <div class="intro-left scroll-reveal">
                        <span class="intro-badge-accent"><?php echo $is_en ? 'IDEAS TALK VALUE' : 'GIÁ TRỊ TỪ IDEAS TALK'; ?></span>
                        <h3>
                            <span class="highlight-number">90</span> <?php echo $is_en ? 'Minutes Solving Pain Points' : 'Phút Tháo Gỡ Pain Point'; ?><br>
                            <span class="highlight-number"><span style="visibility: hidden; user-select: none;">0</span>1</span> <?php echo $is_en ? 'Night Boosting Capability' : 'Đêm Bứt Phá Năng Lực'; ?>
                        </h3>
                        <div class="intro-line-decorator"></div>
                        <p><?php echo $is_en ? 'No academic theory, no generic scripts. Each Webinar is a "real battle" case solving thoroughly one big problem of the enterprise — directly with Experts (Enterprise Doctors from IDEAS) & experienced managers.' : 'Không lý thuyết hàn lâm, không kịch bản chung chung. Mỗi buổi Webinar là một ca "thực chiến" giải quyết triệt để 1 bài toán lớn của doanh nghiệp — trực tiếp cùng Chuyên gia (Bác sĩ Doanh nghiệp từ IDEAS) & Nhà quản trị dày dặn kinh nghiệm.'; ?></p>
                        
                        <div class="intro-horizontal-cards">
                            <!-- Info Card 1 -->
                            <div class="intro-mini-card scroll-reveal stagger-item">
                                <div class="mini-card-icon">
                                    <svg viewBox="0 0 448 512" fill="currentColor" width="20" height="20" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/></svg>
                                </div>
                                <div class="mini-card-text">
                                    <strong><?php echo $is_en ? 'Timeline' : 'Thời gian'; ?></strong>
                                    <span><?php echo $is_en ? 'Thursday at 19:30 - 21:00' : 'Thứ 5 lúc 19:30 - 21:00'; ?></span>
                                </div>
                            </div>
                            <!-- Info Card 2 -->
                            <div class="intro-mini-card scroll-reveal stagger-item">
                                <div class="mini-card-icon" style="background: transparent; border: none; width: 42px; height: 42px; display: flex; align-items: center; justify-content: center; padding: 0;">
                                    <img src="https://assets-global.website-files.com/637501ee593ea3846f81d45e/63ea7af9128d3e56379023e6_zoom-logo-in-blue-colors-meetings-app-logotype-illustration-free-png.png" alt="Zoom" style="width: 100%; height: 100%; object-fit: contain;">
                                </div>
                                <div class="mini-card-text">
                                    <strong><?php echo $is_en ? 'Format' : 'Hình thức'; ?></strong>
                                    <span><?php echo $is_en ? 'Live via Zoom' : 'Trực tiếp qua Zoom'; ?></span>
                                </div>
                            </div>
                            <!-- Info Card 3 -->
                            <div class="intro-mini-card scroll-reveal stagger-item">
                                <div class="mini-card-icon">
                                    <svg viewBox="0 0 16 16" fill="currentColor" width="20" height="20"><path d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A3 3 0 0 1 3 2.506zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43zM9 3h2.932l.023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0zM1 4v2h6V4zm8 0v2h6V4zm5 3H9v8h4.5a.5.5 0 0 0 .5-.5zm-7 8V7H2v7.5a.5.5 0 0 0 .5.5z"/></svg>
                                </div>
                                <div class="mini-card-text">
                                    <strong><?php echo $is_en ? 'Privilege' : 'Đặc quyền'; ?></strong>
                                    <span><?php echo $is_en ? 'Free Templates' : 'Tặng bộ tài liệu áp dụng ngay'; ?></span>
                                </div>
                            </div>
                            <!-- Info Card 4 -->
                            <div class="intro-mini-card scroll-reveal stagger-item">
                                <div class="mini-card-icon">
                                    <svg viewBox="0 0 640 512" fill="currentColor" width="20" height="20" xmlns="http://www.w3.org/2000/svg"><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h74.7c58.9 0 106.7 47.8 106.7 106.7v3.2c0 28-22.8 50.7-50.7 50.7H50.7C22.8 353.3 0 330.5 0 302.5l0-3.8zm352 54.6c0-28 22.8-50.7 50.7-50.7h130.7c28 0 50.7 22.8 50.7 50.7l0 3.8c0 58.9-47.8 106.7-106.7 106.7H458.7C399.8 464 352 416.2 352 357.3l0-4z"/></svg>
                                </div>
                                <div class="mini-card-text">
                                    <strong><?php echo $is_en ? 'Experts' : 'Chuyên gia'; ?></strong>
                                    <span><?php echo $is_en ? 'Meet 3 practical speakers' : 'Gặp gỡ 3 diễn giả thực chiến'; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="intro-right scroll-reveal">
                        <div class="intro-image-wrapper">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/workshopAI.webp" alt="IDEAS AI Workshop" class="intro-img-main">
                            <div class="img-floating-badge">
                                <span>AI Workshop</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-why scroll-reveal" id="why-attend">
            <div class="talk-container">
                <div class="why-split-container">
                    <div class="why-left-sticky scroll-reveal">
                        <div class="talk-section-title" style="display: flex; flex-direction: column; gap: 6px; line-height: 1.15; text-align: left !important; margin-bottom: 18px !important;">
                            <span style="font-size: 0.52em; font-weight: 800; color: #475569; text-transform: uppercase; letter-spacing: 0.08em; display: block; background: none !important; -webkit-text-fill-color: #475569 !important;">
                                <?php echo $is_en ? "Why you shouldn't miss" : "Tại sao bạn không nên bỏ lỡ"; ?>
                            </span>
                            <span style="color: #ab0e00 !important; display: block; -webkit-text-fill-color: #ab0e00 !important; font-size: 1.02em; font-weight: 900; letter-spacing: -0.02em; background: none !important; background-clip: border-box !important;">
                                <?php echo $is_en ? "IDEAS Talk Webinar Series?" : "Chuỗi Webinar của IDEAS?"; ?>
                            </span>
                        </div>
                        <p><?php echo $is_en ? '90 minutes is not just about learning knowledge, but a hands-on experience solving problems directly with Experts.' : '90 phút không chỉ là học tri thức, mà là trải nghiệm tháo gỡ khó khăn trực tiếp cùng Chuyên gia.'; ?></p>
                        
                        <div class="why-sticky-image-wrapper">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2023/07/umefws.webp" alt="IDEAS Live Workshop Session" class="why-sticky-img">
                        </div>

                        <a href="#register" class="btn-talk btn-talk-primary">
                            <?php echo $is_en ? 'Register Today' : 'Đăng ký ngay hôm nay'; ?>
                        </a>
                    </div>
                    
                    <div class="why-right-list">
                        <!-- Point 1 -->
                        <div class="why-list-item scroll-reveal stagger-item">
                            <span class="why-item-number">01</span>
                            <div class="why-item-icon-wrapper">
                                <svg viewBox="0 0 448 512" fill="currentColor"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C40.2 288 0 328.2 0 377.6V448c0 35.3 28.7 64 64 64h320c35.3 0 64-28.7 64-64v-70.4c0-49.4-40.2-89.6-94.4-89.6z"/></svg>
                            </div>
                            <div class="why-item-content">
                                <h3><?php echo $is_en ? 'Accompanied by the IDEAS "Enterprise Doctor" team' : 'Đồng hành cùng đội ngũ "Bác sĩ Doanh nghiệp" IDEAS'; ?></h3>
                                <p><?php echo $is_en ? 'No bookish theories. You get to listen, ask questions and participate in 1:1 discussions with experts and managers rich in practical experience - who have directly diagnosed and unblocked bottlenecks for hundreds of businesses.' : 'Không lý thuyết suông từ sách vở. Bạn được lắng nghe, đặt câu hỏi và trực tiếp tham gia thảo luận 1:1 với những chuyên gia, nhà quản trị giàu kinh nghiệm thực chiến — những người đã trực tiếp "bắt bệnh" và tháo gỡ điểm nghẽn cho hàng trăm doanh nghiệp.'; ?></p>
                            </div>
                        </div>

                        <!-- Point 2 -->
                        <div class="why-list-item scroll-reveal stagger-item">
                            <span class="why-item-number">02</span>
                            <div class="why-item-icon-wrapper">
                                <svg viewBox="0 0 512 512" fill="currentColor"><path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zm0 448c-105.9 0-192-86.1-192-192S150.1 64 256 64s192 86.1 192 192s-86.1 192-192 192zm0-320c-70.6 0-128 57.4-128 128s57.4 128 128 128s128-57.4 128-128s-57.4-128-128-128zm0 192c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"/></svg>
                            </div>
                            <div class="why-item-content">
                                <h3><?php echo $is_en ? 'Thoroughly solve 01 practical problem' : 'Giải quyết dứt điểm 01 bài toán thực tế'; ?></h3>
                                <p><?php echo $is_en ? 'Each Webinar is designed concisely around a single core topic. Say NO to overwhelming information, helping you possess the thinking & frameworks to apply to work the very next day.' : 'Mỗi Webinar được thiết kế cô đọng xung quanh một chủ đề cốt lõi duy nhất. Nói "KHÔNG" với thông tin tràn lan, giúp bạn sở hữu ngay tư duy & khung hành động (Framework) để áp dụng vào công việc hôm sau.'; ?></p>
                            </div>
                        </div>

                        <!-- Point 3 -->
                        <div class="why-list-item scroll-reveal stagger-item">
                            <span class="why-item-number">03</span>
                            <div class="why-item-icon-wrapper">
                                <svg viewBox="0 0 512 512" fill="currentColor"><path d="M256 0c141.4 0 256 114.6 256 256S397.4 512 256 512S0 397.4 0 256S114.6 0 256 0zM128 224v64h256v-64H128z"/></svg>
                            </div>
                            <div class="why-item-content">
                                <h3><?php echo $is_en ? 'Receive Full Practical Gift Package' : 'Đóng gói & Nhận trọn bộ Quà tặng Thực chiến'; ?></h3>
                                <p><?php echo $is_en ? 'Exclusive privilege for direct attendees: Get the Template, Checklist & Guidelines set standardized and ready for deployment without building from scratch.' : 'Đặc quyền dành riêng cho người tham dự trực tiếp: Nhận ngay Bộ Template, Checklist & Tài liệu hướng dẫn đã được đóng gói chuẩn hóa, giúp bạn hoặc đội ngũ triển khai được ngay mà không cần làm lại từ đầu.'; ?></p>
                            </div>
                        </div>

                        <!-- Point 4 -->
                        <div class="why-list-item scroll-reveal stagger-item">
                            <span class="why-item-number">04</span>
                            <div class="why-item-icon-wrapper">
                                <svg viewBox="0 0 640 512" fill="currentColor"><path d="M192 256c61.9 0 112-50.1 112-112S253.9 32 192 32 80 82.1 80 144s50.1 112 112 112zm368 0c61.9 0 112-50.1 112-112s-50.1-112-112-112-112 50.1-112 112 50.1 112 112 112zm-368 32c-65.9 0-192 32.9-192 98v50c0 17.7 14.3 32 32 32h320c17.7 0 32-14.3 32-32v-50c0-65.1-126.1-98-192-98zm368 0c-17.9 0-45 4.3-73.1 12.8 29.3 20.5 49.1 52.6 49.1 89.2v50c0 4.4-.9 8.6-2.5 12.5L608 448c17.7 0 32-14.3 32-32v-50c0-65.1-126.1-98-192-98z"/></svg>
                            </div>
                            <div class="why-item-content">
                                <h3><?php echo $is_en ? 'Connect with Practical Knowledge Community' : 'Kết nối Cộng đồng Tri thức Thực chiến'; ?></h3>
                                <p><?php echo $is_en ? 'Expand your networking with managers, business owners, and employees who share the same direction of boosting capabilities & elevating management mindset.' : 'Mở rộng mạng lưới giao lưu cùng các Nhà quản lý, Chủ doanh nghiệp và Nhân sự có chung định hướng bứt phá năng lực & nâng tầm tư duy.'; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 3: Key Topics (Clean Split Grid - Alternate White Background) -->
        <section class="section-topics" id="topics">
            <div class="talk-container">
                <div class="talk-section-header">
                    <div class="talk-section-title"><?php echo $is_en ? 'Core Themes at <span>IDEAS Talk</span>' : 'Các Chủ Đề Trọng Tâm Tại <span>IDEAS TALK</span>'; ?></div>
                    <p><?php echo $is_en ? 'Our webinar topics cover key business pillars, designed to provide comprehensive tools and strategies.' : 'Các chủ đề được lựa chọn cẩn thận bao quanh các trụ cột cốt lõi của doanh nghiệp.'; ?></p>
                </div>
                
                <div class="topics-split-grid">
                    <div class="topics-list-col">
                        <div class="topics-list">
                            <!-- Topic 1 -->
                            <div class="topic-badge-row hot-card scroll-reveal stagger-item">
                                <div class="topic-tag-col">
                                    <span class="topic-tag hot">
                                        <svg viewBox="0 0 512 512" fill="currentColor" width="14" height="14" xmlns="http://www.w3.org/2000/svg"><path d="M256 0c17.7 0 32 14.3 32 32V64.3c52.5 11.7 94 53.2 105.7 105.7H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H453.7C442 320.5 400.5 362 348 373.7V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V447.7c-52.5-11.7-94-53.2-105.7-105.7H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h57.7c11.7-52.5 53.2-94 105.7-105.7V32c0-17.7 14.3-32 32-32zm80 256c0-44.2-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80s80-35.8 80-80z"/></svg>
                                        AI &amp; Tech [Hot]
                                    </span>
                                </div>
                                <div class="topic-desc-col">
                                    <p class="topic-desc"><?php echo $is_en ? 'Break through 10x performance with the latest AI tools & technology.' : 'Bứt phá 10x hiệu suất cùng công nghệ & công cụ AI mới nhất. [Hot topic Tháng 8]'; ?></p>
                                </div>
                            </div>

                            <!-- Topic 2 -->
                            <div class="topic-badge-row scroll-reveal stagger-item">
                                <div class="topic-tag-col">
                                    <span class="topic-tag">Leadership</span>
                                </div>
                                <div class="topic-desc-col">
                                    <p class="topic-desc"><?php echo $is_en ? 'Unblock management bottlenecks & build leading capacity.' : 'Tháo gỡ điểm nghẽn quản trị & năng lực dẫn dắt.'; ?></p>
                                </div>
                            </div>

                            <!-- Topic 3 -->
                            <div class="topic-badge-row scroll-reveal stagger-item">
                                <div class="topic-tag-col">
                                    <span class="topic-tag">Marketing &amp; Sales</span>
                                </div>
                                <div class="topic-desc-col">
                                    <p class="topic-desc"><?php echo $is_en ? 'Breakthrough revenue growth with practical sales & marketing solutions.' : 'Đột phá tăng trưởng doanh số với giải pháp tiếp thị thực chiến.'; ?></p>
                                </div>
                            </div>

                            <!-- Topic 4 -->
                            <div class="topic-badge-row scroll-reveal stagger-item">
                                <div class="topic-tag-col">
                                    <span class="topic-tag">Finance</span>
                                </div>
                                <div class="topic-desc-col">
                                    <p class="topic-desc"><?php echo $is_en ? 'Optimize cash flows & manage corporate financial health.' : 'Tối ưu dòng tiền & quản trị sức khỏe tài chính doanh nghiệp.'; ?></p>
                                </div>
                            </div>

                            <!-- Topic 5 -->
                            <div class="topic-badge-row scroll-reveal stagger-item">
                                <div class="topic-tag-col">
                                    <span class="topic-tag">Soft Skills</span>
                                </div>
                                <div class="topic-desc-col">
                                    <p class="topic-desc"><?php echo $is_en ? 'Elevate personal capacity & working mindsets in the new era.' : 'Nâng tầm năng lực cá nhân & tư duy làm việc thời đại mới.'; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="topics-image-col scroll-reveal">
                        <div class="topics-featured-card">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/webinar.png" alt="IDEAS Academic Conference" class="topics-card-img">
                            <div class="topics-card-overlay">
                                <h4>IDEAS Conference</h4>
                                <p><?php echo $is_en ? 'Connecting original business frameworks and local practices.' : 'Nơi kết nối các hệ thống tri thức nguyên bản và thực tế quản trị.'; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 4: Horizontal Timeline (DARK UI) -->
        <section class="section-featured" id="featured-webinars">
            <div class="timeline-container-fluid">
                <div class="talk-section-header">
                    <div class="talk-section-title"><?php echo $is_en ? 'Webinar <span>Schedule</span>' : 'Lịch Trình <span>Webinar</span>'; ?></div>
                    <p><?php echo $is_en ? 'Explore our upcoming topics and register for your slots.' : 'Xem danh sách và lộ trình các buổi chia sẻ hữu ích tiếp theo.'; ?></p>
                </div>
                
                <!-- Navigation buttons for timeline scroll simulation -->
                <button class="timeline-nav-btn prev-btn" aria-label="Previous">
                    <svg viewBox="0 0 320 512" fill="currentColor"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
                </button>
                <button class="timeline-nav-btn next-btn" aria-label="Next">
                    <svg viewBox="0 0 320 512" fill="currentColor"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                </button>

                <div class="timeline-track-wrapper">
                    <div class="timeline-track">
                        <div class="timeline-line"></div>
                        
                        <!-- Topic 1 -->
                        <div class="timeline-node active">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content-card">
                                <div>
                                    <span class="timeline-badge"><?php echo $is_en ? 'Webinar 01' : 'Chủ đề 01'; ?></span>
                                    <h3><?php echo $is_en ? 'Applying AI in Learning & Research: Multidimensional Perspectives from 3 Experts' : 'Ứng dụng AI trong học tập & nghiên cứu: Góc Nhìn Đa Chiều'; ?></h3>
                                    <div class="timeline-meta">
                                        <div class="timeline-meta-item">
                                            <svg viewBox="0 0 448 512" fill="currentColor" width="12" height="12" style="margin-right: 6px; vertical-align: -1px; display: inline-block;" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/></svg>
                                            13/08/2026 (19:30 - 21:00)
                                        </div>
                                        <div class="timeline-meta-item" style="display: flex; align-items: center; gap: 6px;">
                                            <img src="https://assets-global.website-files.com/637501ee593ea3846f81d45e/63ea7af9128d3e56379023e6_zoom-logo-in-blue-colors-meetings-app-logotype-illustration-free-png.png" alt="Zoom" style="height: 12px; width: auto; object-fit: contain;">
                                            Zoom Meeting
                                        </div>
                                    </div>
                                    <p class="timeline-desc"><?php echo $is_en ? 'Learn original AI framework: adaptation mindset, prompting technical tools, and core data structures.' : 'Giải mã bài toán ứng dụng AI qua 3 góc nhìn: Tư duy tiếp cận chủ động, Kỹ thuật prompting, và Nền tảng mô hình dữ liệu.'; ?></p>
                                </div>
                                <div class="timeline-btn-wrapper">
                                    <button onclick="openWebinarRegisterModal('Ứng dụng AI trong học tập & nghiên cứu (13/08/2026)')" class="btn-talk btn-talk-primary">
                                        <?php echo $is_en ? 'Register' : 'Đăng ký'; ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Topic 2 -->
                        <div class="timeline-node active">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content-card">
                                <div>
                                    <span class="timeline-badge"><?php echo $is_en ? 'Webinar 02' : 'Chủ đề 02'; ?></span>
                                    <h3><?php echo $is_en ? 'Improving Management Capabilities in the AI Era' : 'Nâng cao năng lực quản trị trong thời đại AI'; ?></h3>
                                    <div class="timeline-meta">
                                        <div class="timeline-meta-item">
                                            <svg viewBox="0 0 448 512" fill="currentColor" width="12" height="12" style="margin-right: 6px; vertical-align: -1px; display: inline-block;" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/></svg>
                                            <?php echo $is_en ? 'Expected: 27/08/2026' : 'Dự kiến: 27/08/2026'; ?>
                                        </div>
                                        <div class="timeline-meta-item" style="display: flex; align-items: center; gap: 6px;">
                                            <img src="https://assets-global.website-files.com/637501ee593ea3846f81d45e/63ea7af9128d3e56379023e6_zoom-logo-in-blue-colors-meetings-app-logotype-illustration-free-png.png" alt="Zoom" style="height: 12px; width: auto; object-fit: contain;">
                                            Zoom Meeting
                                        </div>
                                    </div>
                                    <p class="timeline-desc"><?php echo $is_en ? 'Elevate team management, workflows, and strategy using automation.' : 'Ứng dụng AI giúp tối ưu hiệu suất quản lý dự án, tối ưu quy trình và xây dựng kế hoạch bứt phá.'; ?></p>
                                </div>
                                <div class="timeline-btn-wrapper">
                                    <button onclick="registerForTopic('Nâng cao năng lực quản trị trong thời đại AI (27/08/2026)')" class="btn-talk btn-talk-primary">
                                        <?php echo $is_en ? 'Register' : 'Đăng ký'; ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Topic 3 -->
                        <div class="timeline-node updating">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content-card">
                                <div>
                                    <span class="timeline-badge updating"><?php echo $is_en ? 'Webinar 03' : 'Chủ đề 03'; ?></span>
                                    <h3><?php echo $is_en ? 'Synergizing AI with Talent Management in the New Era' : 'Khi AI đồng hành cùng Quản trị Nhân tài thời đại mới'; ?></h3>
                                    <div class="timeline-meta">
                                        <div class="timeline-meta-item">
                                            <svg viewBox="0 0 448 512" fill="currentColor" width="12" height="12" style="margin-right: 6px; vertical-align: -1px; display: inline-block;" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/></svg>
                                            Updating...
                                        </div>
                                    </div>
                                    <p class="timeline-desc"><?php echo $is_en ? 'Details updating soon...' : 'Đang cập nhật nội dung...'; ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Topic 4 -->
                        <div class="timeline-node updating">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content-card">
                                <div>
                                    <span class="timeline-badge updating"><?php echo $is_en ? 'Webinar 04' : 'Chủ đề 04'; ?></span>
                                    <h3><?php echo $is_en ? 'From Manager to Leader: 5 Essential Skills for the Next 5 Years' : 'Từ Quản lý đến Nhà lãnh đạo: 5 Kỹ năng Thiết yếu cho 5 năm tới'; ?></h3>
                                    <div class="timeline-meta">
                                        <div class="timeline-meta-item">
                                            <svg viewBox="0 0 448 512" fill="currentColor" width="12" height="12" style="margin-right: 6px; vertical-align: -1px; display: inline-block;" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/></svg>
                                            Updating...
                                        </div>
                                    </div>
                                    <p class="timeline-desc"><?php echo $is_en ? 'Details updating soon...' : 'Đang cập nhật nội dung...'; ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Topic 5 -->
                        <div class="timeline-node updating">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content-card">
                                <div>
                                    <span class="timeline-badge updating"><?php echo $is_en ? 'Webinar 05' : 'Chủ đề 05'; ?></span>
                                    <h3><?php echo $is_en ? 'Building a High-Performance Team in the AI Era' : 'Xây dựng Đội ngũ Hiệu suất Cao trong Kỷ nguyên AI'; ?></h3>
                                    <div class="timeline-meta">
                                        <div class="timeline-meta-item">
                                            <svg viewBox="0 0 448 512" fill="currentColor" width="12" height="12" style="margin-right: 6px; vertical-align: -1px; display: inline-block;" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/></svg>
                                            Updating...
                                        </div>
                                    </div>
                                    <p class="timeline-desc"><?php echo $is_en ? 'Details updating soon...' : 'Đang cập nhật nội dung...'; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Webinar Brief (Premium Public Details Dashboard) -->
        <section class="talk-brief scroll-reveal" id="brief">
            <div class="talk-container">
                <div class="talk-section-header">
                    <span class="intro-badge-accent"><?php echo $is_en ? 'Webinar Highlights' : 'NỘI DUNG CHƯƠNG TRÌNH'; ?></span>
                    <div class="talk-section-title" style="margin-bottom: 14px !important; display: block !important;">
                        <?php echo $is_en ? 'August 13 Session <span>Highlights & Privileges</span>' : 'Giá Trị & Đặc Quyền <span>Chuyên Đề 13/08</span>'; ?>
                    </div>
                    <p style="color:#475569; max-width:800px; margin: 0 auto;"><?php echo $is_en ? 'Explore the values, expert speaker panel, target audience, and exclusive privileges of the workshop.' : 'Khám phá giá trị cốt lõi, hội đồng chuyên gia,<br>đối tượng phù hợp và đặc quyền độc quyền của buổi chia sẻ.'; ?></p>
                </div>

                <div class="brief-dashboard">
                    <!-- Tab Switcher Nav -->
                    <div class="brief-tabs-nav">
                        <button class="brief-tab-btn active" onclick="switchBriefTab(event, 'brief-tab-values')">
                            <?php echo $is_en ? 'What You Will Learn' : '1. Giá Trị Nhận Được'; ?>
                        </button>
                        <button class="brief-tab-btn" onclick="switchBriefTab(event, 'brief-tab-speakers')">
                            <?php echo $is_en ? 'Expert Panel' : '2. Hội Đồng Diễn Giả'; ?>
                        </button>
                        <button class="brief-tab-btn" onclick="switchBriefTab(event, 'brief-tab-audience')">
                            <?php echo $is_en ? 'Who Should Attend' : '3. Đối Tượng Phù Hợp'; ?>
                        </button>
                        <button class="brief-tab-btn" onclick="switchBriefTab(event, 'brief-tab-privileges')">
                            <?php echo $is_en ? 'Exclusive Offers' : '4. Đặc Quyền & Quà Tặng'; ?>
                        </button>
                    </div>

                    <!-- Panel 1: What You Will Learn -->
                    <div class="brief-tab-panel active" id="brief-tab-values">
                        <div class="brief-context-grid">
                            <div class="context-card">
                                <h4>
                                    <?php echo $is_en ? 'Shift Learning Mindset' : 'Đột Phá Tư Duy Tự Học & Nghiên Cứu'; ?>
                                </h4>
                                <p><?php echo $is_en ? 'Escape traditional learning boundaries. Learn how to strategically integrate AI models as intellectual partners to accelerate text reading, literature review, and academic research.' : 'Vượt qua giới hạn của phương pháp học truyền thống. Thấu hiểu cách tích hợp AI như một người cộng sự học thuật để rút ngắn 80% thời gian đọc hiểu tài liệu, nghiên cứu và lập luận.'; ?></p>
                            </div>
                            <div class="context-card">
                                <h4>
                                    <?php echo $is_en ? 'Master Practical Prompting' : 'Làm Chủ Kỹ Thuật Prompting Thực Chiến'; ?>
                                </h4>
                                <p><?php echo $is_en ? 'Get hands-on frameworks to write high-precision prompts. Automate report structuring, document summarizing, and translate complex concepts with absolute reliability.' : 'Sở hữu các cấu trúc prompt thực tiễn và chuẩn xác để tự động hóa việc tóm tắt bài viết khoa học, lập cấu trúc báo cáo phức tạp và kiểm chứng thông tin nhằm tránh lỗi sai lệch dữ liệu của AI.'; ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Panel 2: Speakers -->
                    <div class="brief-tab-panel" id="brief-tab-speakers">
                        <div class="brief-speakers-grid">
                            <!-- Speaker 1 -->
                            <div class="brief-speaker-card">
                                <img class="brief-speaker-avatar" src="https://ideas.edu.vn/wp-content/uploads/2025/03/vientruong_avt-optimized.webp" alt="TS. Phạm Quang Vinh" onerror="this.src='https://secure.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=96&d=mm&r=g'">
                                <span class="brief-speaker-name">TS. Phạm Quang Vinh</span>
                                <span class="brief-speaker-role"><?php echo $is_en ? 'Mindset & Leadership' : 'Tư Duy & Lãnh Đạo'; ?></span>
                                <p class="brief-speaker-perspective"><?php echo $is_en ? 'Focuses on shift of learning habits: Adopting active AI integration mindsets to escape traditional bookish learning models.' : 'Chia sẻ góc nhìn về <strong>Tư duy thay đổi thói quen học tập truyền thống</strong>: Cách tiếp cận chủ động với AI, thiết lập phương pháp luận tự học và giải phóng thời gian nghiên cứu học thuật.'; ?></p>
                            </div>
                            <!-- Speaker 2 -->
                            <div class="brief-speaker-card">
                                <img class="brief-speaker-avatar" src="https://ideas.edu.vn/wp-content/uploads/2026/07/avatar_mr_duong.webp" alt="Mr. Võ Trùng Dương" onerror="this.src='https://secure.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=96&d=mm&r=g'">
                                <span class="brief-speaker-name">Mr. Võ Trùng Dương</span>
                                <span class="brief-speaker-role"><?php echo $is_en ? 'Practical Tools & Prompting' : 'Công Cụ & Prompt Thực Chiến'; ?></span>
                                <p class="brief-speaker-perspective"><?php echo $is_en ? 'Guides direct prompting methods and highlights essential AI tools for reading, summarizing, and structural planning.' : 'Hướng dẫn <strong>Kỹ thuật viết Prompt thực chiến</strong> và công cụ AI bổ trợ đắc lực: Tóm tắt bài viết khoa học, tra cứu tài liệu nhanh và lập cấu trúc báo cáo tự động.'; ?></p>
                            </div>
                            <!-- Speaker 3 -->
                            <div class="brief-speaker-card">
                                <img class="brief-speaker-avatar" src="https://ideas.edu.vn/wp-content/uploads/2026/07/tsphivu.webp" alt="NCS. Phạm Phi Vũ" onerror="this.src='https://secure.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=96&d=mm&r=g'">
                                <span class="brief-speaker-name">NCS. Phạm Phi Vũ</span>
                                <span class="brief-speaker-role"><?php echo $is_en ? 'Technology & AI Architecture' : 'Công Nghệ & Kỹ Thuật'; ?></span>
                                <p class="brief-speaker-perspective"><?php echo $is_en ? 'Explains fundamental LLM concepts, data structures, and accuracy verification to ensure sustainable research applications.' : 'Giải mã <strong>Nguyên lý kỹ thuật cốt lõi của mô hình AI</strong>: Cách dữ liệu được xử lý, hiểu rõ giới hạn và cơ chế xác thực để loại bỏ thông tin AI sai lệch (Hallucination).'; ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Panel 3: Target Audience -->
                    <div class="brief-tab-panel" id="brief-tab-audience">
                        <div class="brief-context-grid">
                            <div class="context-card">
                                <h4>
                                    <?php echo $is_en ? 'Students & Researchers' : 'Học Viên Cao Học & Nhà Nghiên Cứu'; ?>
                                </h4>
                                <p><?php echo $is_en ? 'Ideal for MBA/DBA students and academics who need to digest massive research papers, write thesis outlines, and summarize literature with academic rigor.' : 'Phù hợp cho các học viên MBA, DBA, và nhà nghiên cứu cần đọc lượng lớn tài liệu, tổng hợp dữ liệu chuyên ngành, và xây dựng đề cương luận văn chuẩn mực.'; ?></p>
                            </div>
                            <div class="context-card">
                                <h4>
                                    <?php echo $is_en ? 'Professionals & Managers' : 'Nhà Quản Trị & Chuyên Viên Trẻ'; ?>
                                </h4>
                                <p><?php echo $is_en ? 'For managers and knowledge workers aiming to automate reporting, perform fast industry audits, and upgrade their workflow with structured AI capabilities.' : 'Dành cho các quản lý, trưởng bộ phận muốn ứng dụng AI để tự động hóa báo cáo, lập kế hoạch kinh doanh và nghiên cứu thị trường tinh gọn.'; ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Panel 4: Privileges & Offers -->
                    <div class="brief-tab-panel" id="brief-tab-privileges">
                        <div class="brief-targets-vertical-stack">
                            <div class="targets-stats-grid">
                                <div class="target-stat-card" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <span class="target-stat-num" style="color: #b91c1c;">7 <?php echo $is_en ? 'Days' : 'Ngày'; ?></span>
                                    <span class="target-stat-lbl"><?php echo $is_en ? 'AI IDEAS Platform Access' : 'Trải nghiệm AI Platform miễn phí'; ?></span>
                                </div>
                                <div class="target-stat-card" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <span class="target-stat-num" style="color: #10b981;">0đ</span>
                                    <span class="target-stat-lbl"><?php echo $is_en ? 'Completely Free Admission' : 'Hoàn toàn miễn phí tham dự'; ?></span>
                                </div>
                            </div>
                            <div class="privilege-banner-card">
                                <span class="privilege-badge"><?php echo $is_en ? 'Special Privilege' : 'Đặc Quyền Tham Gia'; ?></span>
                                <h4 class="privilege-title"><?php echo $is_en ? 'Free 7-Day Trial of AI IDEAS Platform & AI Book' : 'Trải nghiệm AI IDEAS Platform 7 ngày miễn phí & Nhận AI Book'; ?></h4>
                                <p class="privilege-desc"><?php echo $is_en ? 'Every participant receives instant credentials to explore the advanced LMS & AI assistant suite, alongside practical materials and templates.' : 'Tất cả các học viên đăng ký tham gia trực tiếp sẽ nhận được tài khoản kích hoạt dùng thử 7 ngày hệ sinh thái trợ lý AI độc quyền của IDEAS, tặng kèm tài liệu phân tích viết prompt chuyên sâu và sách hướng dẫn thực chiến.'; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 5: Recap (Theater Section) -->
        <section class="theater-section" id="recap">
            <div class="talk-container">
                <div class="talk-section-header">
                    <div class="talk-section-title"><?php echo $is_en ? 'Recap &amp; Watch Previous <span>Webinars</span>' : 'Xem Lại Các Buổi <span>Webinar Gần Nhất</span>'; ?></div>
                    <p><?php echo $is_en ? 'Explore our repository of past workshops and learn original knowledge on your own time.' : 'Tham khảo thư viện các buổi workshop đã phát sóng và thực hành trực tiếp bất cứ lúc nào.'; ?></p>
                </div>
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
                                    <svg viewBox="0 0 448 512" fill="currentColor" width="16" height="16" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zm-28.8 96c17.7 0 32 14.3 32 32v272c0 17.7-14.3 32-32 32s-32-14.3-32-32V128c0-17.7 14.3-32 32-32zm358.1 0c17.7 0 32 14.3 32 32v272c0 17.7-14.3 32-32 32s-32-14.3-32-32V128c0-17.7 14.3-32 32-32zM128 448h192V192H128v256z"/></svg>
                                    <span id="current-video-date">-</span>
                                </div>
                                <div class="meta-item">
                                    <svg viewBox="0 0 384 512" fill="currentColor" width="16" height="16" xmlns="http://www.w3.org/2000/svg"><path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80L0 432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"/></svg>
                                    <span><?php echo $is_en ? 'Live Broadcast' : 'Phát sóng trực tiếp'; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Playlist Sidebar -->
                    <div class="playlist-column">
                        <div class="playlist-header">
                            <h3>
                                <svg viewBox="0 0 576 512" fill="currentColor" width="16" height="16" xmlns="http://www.w3.org/2000/svg"><path d="M0 96C0 60.7 28.7 32 64 32l448 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zM128 288a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm32-128a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM128 384a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm96-248c-13.3 0-24 10.7-24 24s10.7 24 24 24l224 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-224 0zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24l224 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-224 0zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24l224 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-224 0z"/></svg> 
                                <?php echo $is_en ? 'Playlist' : 'Danh sách phát'; ?>
                            </h3>
                            <span class="video-count-badge" id="video-count"><?php echo $is_en ? '0 videos' : '0 video'; ?></span>
                        </div>
                        <div class="playlist-scroll" data-lenis-prevent>
                            <ul class="playlist-items" id="playlist-list">
                                <!-- Populated dynamically -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="section-divider"></div>

        <!-- Section 6: Form (Split Grid Box with Image Left) -->
        <section class="section-form scroll-reveal" id="register">
            <div class="talk-container">
                <div class="talk-section-header scroll-reveal" id="form-header">
                    <div class="talk-section-title"><?php echo $is_en ? 'Ready to <span>Elevate Your Capacity</span> with IDEAS?' : 'Sẵn Sàng <span>Bứt Phá Năng Lực</span> Cùng IDEAS'; ?></div>
                    <p><?php echo $is_en ? 'Register today to receive Zoom credentials and exclusive templates before the webinar starts.' : 'Đăng ký ngay hôm nay để nhận thông tin phòng Zoom và bộ tài liệu độc quyền trước giờ G.'; ?></p>
                </div>

                <div class="form-grid-box">
                    <div class="form-image-col">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/08/wsoff16_8.webp" alt="IDEAS UMEF Workshop" class="form-side-img">
                        <div class="form-image-overlay">
                            <h3><?php echo $is_en ? 'Join the Elite AI Community' : 'Gia Nhập Cộng Đồng Tri Thức AI'; ?></h3>
                            <p><?php echo $is_en ? 'Interact with doctors, experts and managers from top-tier academic institutes.' : 'Học tập cùng hội đồng chuyên gia, bác sĩ doanh nghiệp và các quản trị viên xuất sắc.'; ?></p>
                        </div>
                    </div>
                    
                    <div class="form-content-col">
                        <div class="success-box" id="page-form-success">
                            <div class="success-icon-wrap">
                                <svg viewBox="0 0 512 512" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                            </div>
                            <h3><?php echo $is_en ? 'Registration Successful!' : 'Đăng Ký Thành Công!'; ?></h3>
                            <p id="success-msg"></p>
                        </div>

                        <form id="page-contact-form" novalidate>
                            <div class="form-group">
                                <label class="form-label" for="fullname"><?php echo $is_en ? 'Full Name *' : 'Họ và tên *'; ?></label>
                                <input class="form-control" type="text" id="fullname" placeholder="<?php echo $is_en ? 'Enter your full name' : 'Nhập họ và tên của bạn'; ?>" required>
                                <span class="error-message" id="fullname-error">
                                    <?php echo $is_en ? 'Please enter your name' : 'Vui lòng nhập họ và tên'; ?>
                                </span>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="phone"><?php echo $is_en ? 'Phone Number *' : 'Số điện thoại *'; ?></label>
                                <input class="form-control" type="tel" id="phone" placeholder="<?php echo $is_en ? 'Enter your phone number' : 'Nhập số điện thoại'; ?>" required>
                                <span class="error-message" id="phone-error">
                                    <?php echo $is_en ? 'Please enter a valid phone number (at least 8 digits)' : 'Vui lòng nhập số điện thoại hợp lệ (tối thiểu 8 chữ số)'; ?>
                                </span>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="email"><?php echo $is_en ? 'Email Address *' : 'Địa chỉ Email *'; ?></label>
                                <input class="form-control" type="email" id="email" placeholder="<?php echo $is_en ? 'Enter your email' : 'Nhập địa chỉ email'; ?>" required>
                                <span class="error-message" id="email-error">
                                    <?php echo $is_en ? 'Please enter a valid email address' : 'Vui lòng nhập địa chỉ email hợp lệ'; ?>
                                </span>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="interest"><?php echo $is_en ? 'Your Favorite Topic *' : 'Chủ đề bạn quan tâm *'; ?></label>
                                <select class="form-control" id="interest" required>
                                    <option value="" disabled selected><?php echo $is_en ? '-- Select a topic --' : '-- Chọn chủ đề bạn muốn tham gia --'; ?></option>
                                    <option value="Ứng dụng AI trong học tập & nghiên cứu (13/08/2026)"><?php echo $is_en ? 'Webinar 01: AI in Learning & Research (13/08)' : 'Webinar 01: Ứng dụng AI trong học tập & nghiên cứu (13/08)'; ?></option>
                                    <option value="Nâng cao năng lực quản trị trong thời đại AI (27/08/2026)"><?php echo $is_en ? 'Webinar 02: Management in the AI Era (27/08)' : 'Webinar 02: Nâng cao năng lực quản trị trong thời đại AI (27/08)'; ?></option>
                                    <option value="AI & Technology"><?php echo $is_en ? 'Category: AI & Technology' : 'Chuyên đề: AI & Technology'; ?></option>
                                    <option value="Leadership & Management"><?php echo $is_en ? 'Category: Leadership & Management' : 'Chuyên đề: Leadership & Management'; ?></option>
                                    <option value="Marketing & Sales"><?php echo $is_en ? 'Category: Marketing & Sales' : 'Chuyên đề: Marketing & Sales'; ?></option>
                                    <option value="Finance & Business"><?php echo $is_en ? 'Category: Finance & Business' : 'Chuyên đề: Finance & Business'; ?></option>
                                    <option value="Soft & Human Skills"><?php echo $is_en ? 'Category: Soft & Human Skills' : 'Chuyên đề: Soft & Human Skills'; ?></option>
                                </select>
                                <span class="error-message" id="interest-error">
                                    <?php echo $is_en ? 'Please select a topic' : 'Vui lòng chọn một chủ đề';
                                    ?>
                                </span>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="question"><?php echo $is_en ? 'Your Questions for Experts' : 'Câu hỏi dành cho Chuyên gia'; ?></label>
                                <textarea class="form-control" id="question" placeholder="<?php echo $is_en ? 'Ask your questions here...' : 'Nhập câu hỏi hoặc vấn đề doanh nghiệp cần tháo gỡ...'; ?>"></textarea>
                            </div>

                            <div style="margin-top: 36px; text-align: center;">
                                <button type="submit" id="form-submit-btn" class="btn-talk btn-talk-primary" style="width: 100%;">
                                    <?php echo $is_en ? 'Confirm Free Registration' : 'Xác nhận đăng ký miễn phí'; ?>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cooperation Block -->
        <section class="talk-coop">
            <div class="coop-container">
                <h2 class="coop-title">
                    <svg viewBox="0 0 640 512" width="24" height="24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M323.4 85.2l-96.8 78.4c-16.1 13-19.2 36.4-7 53.1c12.9 17.8 38 21.3 55.3 7.8l99.3-77.2c7-5.4 17-4.2 22.5 2.8s4.2 17-2.8 22.5l-20.9 16.2L550.2 352l41.8 0c26.5 0 48-21.5 48-48l0-128c0-26.5-21.5-48-48-48l-76 0-4 0-.7 0-3.9-2.5L434.8 79c-15.3-9.8-33.2-15-51.4-15c-21.8 0-43 7.5-60 21.2zm22.8 124.4l-51.7 40.2C263 274.4 217.3 268 193.7 235.6c-22.2-30.5-16.6-73.1 12.7-96.8l83.2-67.3c-11.6-4.9-24.1-7.4-36.8-7.4C234 64 215.7 69.6 200 80l-72 48-80 0c-26.5 0-48 21.5-48 48L0 304c0 26.5 21.5 48 48 48l108.2 0 91.4 83.4c19.6 17.9 49.9 16.5 67.8-3.1c5.5-6.1 9.2-13.2 11.1-20.6l17 15.6c19.5 17.9 49.9 16.6 67.8-2.9c4.5-4.9 7.8-10.6 9.9-16.5c19.4 13 45.8 10.3 62.1-7.5c17.9-19.5 16.6-49.9-2.9-67.8l-134.2-123z"/></svg>
                    <?php echo $is_en ? 'Co-organizing <b>Partners</b>' : 'Đơn vị <b>Đồng hành</b>'; ?>
                </h2>
                <p class="coop-sub"><?php echo $is_en ? 'Prestigious partners and academic organizations co-hosting the IDEAS Talk event series' : 'Các đối tác và tổ chức học thuật uy tín đồng tổ chức chuỗi sự kiện IDEAS Talk'; ?></p>

                <div class="coop-grid">
                    <a class="coop-card" href="https://chiefaiofficer.vn/" target="_blank"
                        rel="nofollow noopener noreferrer">
                        <img decoding="async" src="/wp-content/uploads/external-migrated/cao-logo-1_4e7ed2a0.webp"
                            alt="Chief AI Officer Logo" />
                    </a>
                    <a class="coop-card" href="https://ideas.edu.vn/" target="_blank"
                        rel="nofollow noopener noreferrer">
                        <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2025/05/ideas-02.webp"
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
                                <span><svg class="svg-icon fa-calendar-days fa-solid" viewBox="0 0 448 512" width="12" height="12" fill="currentColor" style="margin-right: 6px; vertical-align: -1px; display: inline-block;" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/></svg>${item.date}</span>
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

        // Function to select topic and scroll to register form
        function registerForTopic(topicName) {
            console.log('[registerForTopic] Target topicName requested:', topicName);
            const selectEl = document.querySelector('#page-contact-form #interest') || document.getElementById('interest');
            const targetSec = document.getElementById('register');
            console.log('[registerForTopic] Select element resolved:', selectEl);
            
            if (selectEl) {
                const lowerInput = topicName.toLowerCase();
                let matchedValue = "";
                
                // 1. Direct case-insensitive match
                for (let i = 0; i < selectEl.options.length; i++) {
                    const optVal = selectEl.options[i].value;
                    console.log(`[registerForTopic] Option index ${i} value: "${optVal}"`);
                    if (optVal && optVal.toLowerCase() === lowerInput) {
                        matchedValue = optVal;
                        console.log('[registerForTopic] Match type: Direct match ->', matchedValue);
                        break;
                    }
                }
                
                // 2. Specific keyword-based logic (robust to slight string format changes)
                if (!matchedValue) {
                    if (lowerInput.includes('học tập') || lowerInput.includes('learning') || lowerInput.includes('hoc tap')) {
                        console.log('[registerForTopic] Using keyword check: học tập / learning');
                        for (let i = 0; i < selectEl.options.length; i++) {
                            const optVal = selectEl.options[i].value;
                            if (optVal && (optVal.toLowerCase().includes('học tập') || optVal.toLowerCase().includes('learning'))) {
                                matchedValue = optVal;
                                console.log('[registerForTopic] Match type: Keyword (học tập/learning) ->', matchedValue);
                                break;
                            }
                        }
                    } else if (lowerInput.includes('quản trị') || lowerInput.includes('management') || lowerInput.includes('quan tri')) {
                        console.log('[registerForTopic] Using keyword check: quản trị / management');
                        for (let i = 0; i < selectEl.options.length; i++) {
                            const optVal = selectEl.options[i].value;
                            if (optVal && (optVal.toLowerCase().includes('quản trị') || optVal.toLowerCase().includes('management'))) {
                                matchedValue = optVal;
                                console.log('[registerForTopic] Match type: Keyword (quản trị/management) ->', matchedValue);
                                break;
                            }
                        }
                    }
                }
                
                // 3. Fallback: normalize Vietnamese accents and match alphanumerics
                if (!matchedValue) {
                    console.log('[registerForTopic] Attempting alphanumeric normalization match');
                    const cleanStr = (s) => {
                        if (!s) return "";
                        return s.normalize("NFD")
                                .replace(/[\u0300-\u036f]/g, "")
                                .replace(/[đĐ]/g, "d")
                                .toLowerCase()
                                .replace(/[^a-z0-9]/g, "");
                    };
                    const cleanInput = cleanStr(topicName);
                    console.log('[registerForTopic] Cleaned input string:', cleanInput);
                    
                    for (let i = 0; i < selectEl.options.length; i++) {
                        const optVal = selectEl.options[i].value;
                        const cleanOpt = cleanStr(optVal);
                        console.log(`[registerForTopic] Cleaned option ${i}: "${cleanOpt}"`);
                        if (cleanOpt && (cleanOpt.indexOf(cleanInput) !== -1 || cleanInput.indexOf(cleanOpt) !== -1)) {
                            matchedValue = optVal;
                            console.log('[registerForTopic] Match type: Normalized fallback ->', matchedValue);
                            break;
                        }
                    }
                }
                if (matchedValue) {
                    selectEl.value = matchedValue;
                    console.log('[registerForTopic] Set native select value to:', matchedValue);
                } else {
                    selectEl.value = topicName;
                    console.log('[registerForTopic] No match, fallback setting native select value to topicName:', topicName);
                }
                
                // Dispatch native change event
                selectEl.dispatchEvent(new Event('change'));
                console.log('[registerForTopic] Dispatched native change event');

                // 4. Update jQuery select plugins (NiceSelect, Select2, etc.)
                if (typeof jQuery !== 'undefined') {
                    console.log('[registerForTopic] jQuery detected in global namespace');
                    const $sel = jQuery(selectEl);
                    $sel.val(selectEl.value).trigger('change');
                    if (jQuery.fn.niceSelect) {
                        console.log('[registerForTopic] niceSelect jQuery plugin found, updating UI');
                        $sel.niceSelect('update');
                    }
                    if (jQuery.fn.select2) {
                        console.log('[registerForTopic] select2 jQuery plugin found, triggering change.select2');
                        $sel.trigger('change.select2');
                    }
                } else {
                    console.log('[registerForTopic] jQuery NOT detected in global namespace');
                }

                // 5. Click matching custom dropdown list items (NiceSelect options, selectivity divs, custom select lis)
                const cleanStrHelper = (s) => {
                    if (!s) return "";
                    return s.normalize("NFD")
                            .replace(/[\u0300-\u036f]/g, "")
                            .replace(/[đĐ]/g, "d")
                            .toLowerCase()
                            .replace(/[^a-z0-9]/g, "");
                };
                const cleanTarget = cleanStrHelper(selectEl.value);

                setTimeout(() => {
                    console.log('[registerForTopic] Custom select list sync search target:', cleanTarget);
                    const customOpts = document.querySelectorAll('.nice-select .option, .custom-select-option, [class*="select"] li, .select-items div, [role="option"]');
                    console.log(`[registerForTopic] Found ${customOpts.length} custom option items in DOM`);
                    let clicked = false;
                    customOpts.forEach((opt, idx) => {
                        const val = opt.getAttribute('data-value') || opt.textContent;
                        if (val && cleanStrHelper(val) === cleanTarget) {
                            console.log(`[registerForTopic] Match found at index ${idx}: Clicking custom element`, opt);
                            opt.click();
                            clicked = true;
                        }
                    });
                    if (!clicked) {
                        console.log('[registerForTopic] No custom option matched & clicked in setTimeout block');
                    }
                }, 100);
            }
            
            if (targetSec) {
                targetSec.scrollIntoView({ behavior: 'smooth' });
                console.log('[registerForTopic] Scrolled to form section');
            } else {
                console.warn('[registerForTopic] targetSec form element not found in DOM');
            }
        }

        // Form submission AJAX
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
                const questionInput = document.getElementById('question');

                // Error Spans
                const nameErr = document.getElementById('fullname-error');
                const phoneErr = document.getElementById('phone-error');
                const emailErr = document.getElementById('email-error');
                const interestErr = document.getElementById('interest-error');

                // Reset Errors
                nameErr.classList.remove('active');
                phoneErr.classList.remove('active');
                emailErr.classList.remove('active');
                interestErr.classList.remove('active');

                // Values
                const name = nameInput.value.trim();
                const phone = phoneInput.value.trim();
                const email = emailInput.value.trim();
                const interestVal = interestSelect.value;
                const questionVal = questionInput.value.trim();

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
                if (!interestVal) {
                    interestErr.classList.add('active');
                    isValid = false;
                }

                if (!isValid) return;

                const noteParts = [];
                noteParts.push('Chủ đề webinar: ' + interestVal);
                if (questionVal) noteParts.push('Câu hỏi: ' + questionVal);
                noteParts.push('CTA Source: ideas_talk_webinar_page');
                const combinedNote = noteParts.join(' | ');

                // API Playload for automation.ideas.edu.vn
                const payload = {
                    form_id: "4fe1eeb0570742a1fdde61af6fc0680c",
                    email: email,
                    firstName: name,
                    phoneNumber: phone,
                    time_dat_lich: "",
                    note_dat_lich: `Đăng ký Webinar IDEAS Talk | ${combinedNote}`,
                    chuong_trinh_dat_lich: interestVal
                };

                // Webhook Payload for open.domation.net
                const webhookPayload = {
                    name: name,
                    phone: phone,
                    email: email,
                    source: "Ideas_Talk_Webinar_Landing_Page",
                    type: "webinar_registration",
                    chuong_trinh: "IDEAS Talk Webinar",
                    nhu_cau: `Đăng ký Webinar IDEAS Talk | Chủ đề quan tâm: ${interestVal} | Câu hỏi: ${questionVal}`
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
                btn.innerHTML = `<span><svg viewBox="0 0 512 512" width="16" height="16" fill="currentColor" class="fa-spin" style="display:inline-block;animation:spin 1s linear infinite;" xmlns="http://www.w3.org/2000/svg"><path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/></svg> ${isEnMode ? 'Submitting...' : 'Đang gửi...'}</span>`;

                const style = document.createElement('style');
                style.innerHTML = `@keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }`;
                document.head.appendChild(style);

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
                        successMsg.innerHTML = isEnMode 
                            ? 'Thank you <strong>' + name + '</strong>. Your registration for <strong>' + interestVal + '</strong> has been submitted. We will send the Zoom details to your email/phone soon.' 
                            : 'Cảm ơn bạn <strong>' + name + '</strong> đã đăng ký tham gia <strong>' + interestVal + '</strong>. Thông tin phòng Zoom và tài liệu đi kèm sẽ được gửi qua Email/Zalo của bạn trước giờ diễn ra.';
                    }
                    
                    form.style.display = 'none';
                    document.getElementById('form-header').style.display = 'none';
                    successBox.classList.add('visible');

                } catch (error) {
                    console.error('Submission error:', error);
                    alert(isEnMode ? 'An error occurred. Please try again.' : 'Có lỗi xảy ra trong quá trình gửi thông tin. Vui lòng thử lại sau.');
                } finally {
                    btn.disabled = false;
                    btn.style.opacity = '1';
                    btn.innerHTML = originalBtnHtml;
                }
            });
        });

        // Horizontal Timeline Navigation
        document.addEventListener("DOMContentLoaded", function () {
            const wrapper = document.querySelector(".timeline-track-wrapper");
            const prevBtn = document.querySelector(".prev-btn");
            const nextBtn = document.querySelector(".next-btn");

            if (wrapper && prevBtn && nextBtn) {
                const scrollAmount = 350;
                
                prevBtn.addEventListener("click", function () {
                    wrapper.scrollBy({ left: -scrollAmount, behavior: "smooth" });
                });
                
                nextBtn.addEventListener("click", function () {
                    wrapper.scrollBy({ left: scrollAmount, behavior: "smooth" });
                });

                function toggleNavButtons() {
                    const scrollLeft = wrapper.scrollLeft;
                    const maxScroll = wrapper.scrollWidth - wrapper.clientWidth;
                    
                    if (scrollLeft <= 10) {
                        prevBtn.classList.add("disabled");
                    } else {
                        prevBtn.classList.remove("disabled");
                    }

                    if (scrollLeft >= maxScroll - 10) {
                        nextBtn.classList.add("disabled");
                    } else {
                        nextBtn.classList.remove("disabled");
                    }
                }

                wrapper.addEventListener("scroll", toggleNavButtons);
                window.addEventListener("resize", toggleNavButtons);
                setTimeout(toggleNavButtons, 300);
            }
        });

        // Intersection Observer for scroll reveal animations
        document.addEventListener("DOMContentLoaded", function() {
            const reveals = document.querySelectorAll(".scroll-reveal");
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("revealed");
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.05,
                rootMargin: "0px 0px -40px 0px"
            });
            
            reveals.forEach((el, index) => {
                if (el.classList.contains("stagger-item")) {
                    const delay = (index % 4) * 0.12;
                    el.style.transitionDelay = `${delay}s`;
                }
                observer.observe(el);
            });
        });

        // Overwrite window.showform to scroll directly to the inline registration form
        window.showform = function (ctaSource = 'header') {
            console.log('[showform] Overridden showform called from:', ctaSource);
            const target = document.getElementById('register');
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        };

        // Scroll to register section on load if URL has #register hash
        window.addEventListener('load', function () {
            if (window.location.hash === '#register') {
                console.log('[HashScroll] #register hash detected on load');
                const target = document.getElementById('register');
                if (target) {
                    setTimeout(() => {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }, 400);
                }
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

    <!-- Custom Premium Hero Script (Countdown, Tilt, Modal & Tabs) -->
    <script>
        // Global function to open registration modal for webinar with specific topic name
        function openWebinarRegisterModal(topicName) {
            console.log('[openWebinarRegisterModal] Opening modal for topic:', topicName);
            
            // Set CTA source tracking globally
            if (typeof activeCtaSource !== 'undefined') {
                activeCtaSource = topicName;
            }
            
            const regModal = document.getElementById('reg-modal');
            if (regModal) {
                // Dynamically update modal headers to align with the chosen topic
                const modalTitleEl = regModal.querySelector('.modal-form-header h3');
                const modalSubtitleEl = regModal.querySelector('.modal-form-header p');
                if (modalTitleEl) {
                    modalTitleEl.innerHTML = `Đăng ký tham gia <br><span class="gradient-text">${topicName}</span>`;
                }
                if (modalSubtitleEl) {
                    modalSubtitleEl.textContent = 'Điền thông tin bên dưới để đăng ký phòng Zoom và nhận gói quà tặng trải nghiệm AI Platform 7 ngày.';
                }
                
                regModal.style.display = 'flex';
                setTimeout(function () {
                    regModal.classList.add('open');
                    regModal.setAttribute('aria-hidden', 'false');
                }, 10);
            } else {
                console.warn('[openWebinarRegisterModal] Registration modal #reg-modal not found');
            }
        }

        // Global function to switch tabs in the Webinar Brief section
        function switchBriefTab(event, tabId) {
            event.preventDefault();
            const btn = event.currentTarget;
            const nav = btn.closest('.brief-tabs-nav');
            const container = btn.closest('.brief-dashboard');
            
            if (nav && container) {
                nav.querySelectorAll('.brief-tab-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                
                container.querySelectorAll('.brief-tab-panel').forEach(p => p.classList.remove('active'));
                const activePanel = container.querySelector('#' + tabId);
                if (activePanel) {
                    activePanel.classList.add('active');
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Live countdown timer to 13/08/2026 19:30
            var countDownDate = new Date("2026-08-13T19:30:00+07:00").getTime();
            
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("days").innerText = "00";
                    document.getElementById("hours").innerText = "00";
                    document.getElementById("minutes").innerText = "00";
                    document.getElementById("seconds").innerText = "00";
                    return;
                }
                
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                document.getElementById("days").innerText = days.toString().padStart(2, '0');
                document.getElementById("hours").innerText = hours.toString().padStart(2, '0');
                document.getElementById("minutes").innerText = minutes.toString().padStart(2, '0');
                document.getElementById("seconds").innerText = seconds.toString().padStart(2, '0');
            }, 1000);

            // 3D Tilt Effect on Ticket Card (Desktop Only)
            const ticketCard = document.getElementById('hero-ticket');
            if (ticketCard && window.innerWidth > 991) {
                const cardEl = ticketCard;
                
                document.addEventListener('mousemove', function(e) {
                    const rect = cardEl.getBoundingClientRect();
                    const x = e.clientX - rect.left - rect.width / 2;
                    const y = e.clientY - rect.top - rect.height / 2;
                    
                    const distance = Math.sqrt(x*x + y*y);
                    if (distance < rect.width * 2) {
                        const tiltX = (y / (rect.height / 2)) * -6; // max 6 deg
                        const tiltY = (x / (rect.width / 2)) * 6; // max 6 deg
                        cardEl.style.transform = `perspective(1000px) rotateX(${tiltX}deg) rotateY(${tiltY}deg) translateY(-8px) scale(1.02)`;
                    } else {
                        cardEl.style.transform = 'perspective(1000px) rotateY(-6deg) rotateX(3deg) scale(0.98)';
                    }
                });

                cardEl.addEventListener('mouseleave', function() {
                    cardEl.style.transform = 'perspective(1000px) rotateY(-6deg) rotateX(3deg) scale(0.98)';
                });
            }
        });
    </script>

    <?php get_footer(); ?>
</body>

</html>
