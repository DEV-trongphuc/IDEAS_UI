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
    <?php get_template_part('shared-head'); ?>

    <!-- Preconnect to external domains for faster resource loading --><!-- Preload LCP hero background image -->
    <link rel="preload" fetchpriority="high" as="image"
        href="https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp" />
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
        }

        /* ── Section Titles ────────────────── */
        .talk-section-header {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .talk-section-header h2 {
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 14px;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, #0f172a 40%, #ff3b30 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
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
            background: radial-gradient(circle, rgba(255, 59, 48, 0.2) 0%, transparent 80%);
            margin: 80px 0;
        }

        .section-divider::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 8px;
            height: 8px;
            background: #ff3b30;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(255, 59, 48, 0.5);
        }

        /* ── Hero: Dark/Black Theme ────────── */
        .talk-hero {
            position: relative;
            padding: 220px 20px 140px;
            overflow: hidden;
            background-color: #080405;
            min-height: 75vh;
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
            opacity: 0.2;
            filter: brightness(60%) contrast(110%);
        }

        .talk-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(180deg,
                    rgba(8, 4, 5, 0.9) 0%,
                    rgba(8, 4, 5, 0.5) 60%,
                    #080405 100%),
                radial-gradient(circle at 50% 50%, rgba(185, 14, 0, 0.18) 0%, transparent 70%);
        }

        .talk-hero-container {
            position: relative;
            z-index: 3;
            max-width: 950px;
            margin: 0 auto;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .talk-hero-badge {
            background: rgba(255, 59, 48, 0.12);
            border: 1px solid rgba(255, 59, 48, 0.25);
            padding: 8px 24px;
            border-radius: 100px;
            color: #ff6b6b;
            font-size: 0.8rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
            box-shadow: 0 4px 20px rgba(255, 59, 48, 0.1);
            backdrop-filter: blur(12px);
        }

        .talk-hero-badge svg {
            color: #ff6b6b;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 0.8; }
            50% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(1); opacity: 0.8; }
        }

        .talk-hero h1 {
            font-size: clamp(3rem, 7vw, 4.8rem);
            font-weight: 900;
            margin-bottom: 15px;
            letter-spacing: -0.03em;
            line-height: 1.1;
            color: #ffffff !important;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .talk-hero h1 span {
            background: linear-gradient(135deg, #ff8e8e 0%, #ff3b30 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }

        .verify-slogan {
            font-size: clamp(1.2rem, 3vw, 1.8rem);
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            background: linear-gradient(90deg, #ff6b6b 0%, #ffffff 50%, #ff6b6b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
            font-style: italic;
        }

        .talk-tagline {
            font-size: 1.25rem;
            font-weight: 800;
            color: #ff6b6b !important;
            letter-spacing: 0.1em;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .talk-hero p {
            font-size: 1.2rem;
            color: #e2e8f0 !important;
            max-width: 750px;
            margin-bottom: 40px;
            line-height: 1.65;
            font-weight: 500;
        }

        .talk-hero-ctas {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-talk-secondary-dark {
            background: rgba(255, 255, 255, 0.08);
            color: #ffffff !important;
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(12px);
        }

        .btn-talk-secondary-dark:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-3px);
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            color: #ffffff !important;
        }

        /* ── Section 1: Intro (High-Impact Design) ── */
        .section-intro {
            padding: 90px 0 50px;
            position: relative;
            background-color: #fcfcfd;
        }

        .intro-grid {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
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
            color: #ff3b30;
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
            background: #ff3b30;
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
            background: linear-gradient(135deg, #ff6b6b 0%, #ff3b30 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }

        .intro-line-decorator {
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #ff3b30, transparent);
            margin-bottom: 24px;
            border-radius: 2px;
        }

        .intro-left p {
            font-size: 1.08rem;
            line-height: 1.75;
            color: #475569;
            font-weight: 500;
            margin: 0;
        }

        .intro-cards-stack {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .intro-card {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.04);
            border-radius: 20px;
            padding: 24px 28px;
            display: flex;
            align-items: center;
            gap: 24px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.015);
            position: relative;
            overflow: hidden;
        }

        .intro-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 59, 48, 0.01), rgba(255, 59, 48, 0.03));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .intro-card:hover {
            transform: translateY(-4px) scale(1.01);
            border-color: rgba(255, 59, 48, 0.15);
            box-shadow: 0 15px 35px rgba(255, 59, 48, 0.04), 0 0 1px rgba(255, 59, 48, 0.1);
        }

        .intro-card:hover::before {
            opacity: 1;
        }

        .intro-card-icon {
            width: 62px;
            height: 62px;
            background: #fff5f5;
            border: 1px solid #ffe3e3;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ff3b30;
            flex-shrink: 0;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(255, 59, 48, 0.05);
        }

        .intro-card:hover .intro-card-icon {
            background: #ff3b30;
            color: #ffffff;
            border-color: #ff3b30;
            transform: rotate(-3deg) scale(1.05);
            box-shadow: 0 8px 20px rgba(255, 59, 48, 0.2);
        }

        .intro-card-icon svg {
            width: 26px;
            height: 26px;
            transition: transform 0.3s ease;
        }

        .intro-card-content h4 {
            margin: 0 0 6px;
            font-size: 1.15rem;
            font-weight: 800;
            color: #0f172a;
            transition: color 0.3s ease;
        }

        .intro-card:hover h4 {
            color: #ff3b30;
        }

        .intro-card-content p {
            margin: 0;
            font-size: 0.98rem;
            color: #475569;
            font-weight: 500;
            line-height: 1.4;
        }

        .intro-card-tag {
            position: absolute;
            top: 14px;
            right: 20px;
            background: linear-gradient(135deg, #ff8e8e 0%, #ff3b30 100%);
            color: #ffffff;
            font-size: 0.65rem;
            font-weight: 800;
            padding: 3px 8px;
            border-radius: 6px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            box-shadow: 0 2px 8px rgba(255, 59, 48, 0.15);
        }

        /* ── Section 2: Why Attend (Split List Layout - Professional & No Emojis) ── */
        .section-why {
            padding: 40px 0;
            background-color: #fcfcfd;
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
        }

        .why-left-sticky {
            position: sticky;
            top: 100px;
        }

        .why-left-sticky h2 {
            font-size: clamp(2rem, 4vw, 2.6rem);
            font-weight: 850;
            color: #0f172a;
            line-height: 1.2;
            margin-bottom: 20px;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, #0f172a 40%, #ff3b30 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .why-left-sticky p {
            font-size: 1.1rem;
            color: #64748b;
            line-height: 1.65;
            margin-bottom: 30px;
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
            border-color: rgba(255, 59, 48, 0.2);
            box-shadow: 0 15px 35px rgba(255, 59, 48, 0.05);
        }

        .why-item-number {
            font-size: 2.2rem;
            font-weight: 900;
            color: rgba(255, 59, 48, 0.15);
            line-height: 1;
            font-family: inherit;
            flex-shrink: 0;
            transition: color 0.3s ease;
        }

        .why-list-item:hover .why-item-number {
            color: rgba(255, 59, 48, 0.35);
        }

        .why-item-icon-wrapper {
            width: 50px;
            height: 50px;
            background: rgba(255, 59, 48, 0.05);
            border: 1px solid rgba(255, 59, 48, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ff3b30;
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

        /* ── Section 3: Topics (Clean Row List - No Emoji, ALIGNED) ── */
        .section-topics {
            padding: 40px 0;
        }

        .topics-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
            max-width: 900px;
            margin: 0 auto;
        }

        .topic-badge-row {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.05);
            border-radius: 18px;
            padding: 20px 30px;
            display: flex;
            align-items: center;
            gap: 30px; /* spacing between columns */
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.01);
        }

        .topic-badge-row:hover {
            border-color: rgba(255, 59, 48, 0.2);
            transform: translateX(8px);
            box-shadow: 0 12px 30px rgba(255, 59, 48, 0.04);
        }

        .topic-tag-col {
            width: 200px; /* Fixed width to prevent uneven layout / thò thụt */
            flex-shrink: 0;
            display: flex;
        }

        .topic-tag {
            width: 100%;
            background: rgba(255, 59, 48, 0.05);
            border: 1px solid rgba(255, 59, 48, 0.15);
            padding: 8px 18px;
            border-radius: 80px;
            font-size: 0.8rem;
            font-weight: 800;
            color: #ff3b30;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            text-align: center;
        }

        .topic-tag.hot {
            background: linear-gradient(135deg, rgba(255, 59, 48, 0.06) 0%, rgba(255, 149, 0, 0.06) 100%);
            border-color: rgba(255, 107, 107, 0.25);
            color: #d97706;
        }

        .topic-desc-col {
            flex-grow: 1;
        }

        .topic-desc {
            font-size: 1.05rem;
            color: #334155;
            line-height: 1.55;
            margin: 0;
            font-weight: 500;
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
        }

        /* ── Section 4: Horizontal Timeline (Full Width / Fluid Layout) ── */
        .section-featured {
            padding: 40px 0;
            width: 100%;
            overflow: hidden;
        }

        .timeline-container-fluid {
            position: relative;
            padding: 40px 0;
            width: 100%;
        }

        .timeline-track-wrapper {
            overflow-x: auto;
            padding: 20px 0;
            width: 100%;
            /* Auto aligns starting element with boxed container when screen is wider than 1200px */
            padding-left: calc(max(20px, (100vw - 1200px) / 2));
            padding-right: calc(max(20px, (100vw - 1200px) / 2));
            scrollbar-width: thin;
            scrollbar-color: #ff3b30 rgba(0, 0, 0, 0.05);
            -webkit-overflow-scrolling: touch;
            box-sizing: border-box;
        }

        .timeline-track-wrapper::-webkit-scrollbar {
            height: 6px;
        }

        .timeline-track-wrapper::-webkit-scrollbar-thumb {
            background: #ff3b30;
            border-radius: 10px;
        }

        .timeline-track-wrapper::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.04);
        }

        .timeline-track {
            display: flex;
            gap: 30px;
            position: relative;
            min-width: max-content;
        }

        .timeline-line {
            position: absolute;
            top: 12px;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #ff3b30 40%, rgba(15, 23, 42, 0.05) 80%);
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
            background: #ffffff;
            border: 4px solid #ff3b30;
            border-radius: 50%;
            box-shadow: 0 0 8px rgba(255, 59, 48, 0.25);
            z-index: 3;
            margin-bottom: 24px;
            position: relative;
            transition: all 0.3s ease;
        }

        .timeline-node.active .timeline-dot {
            background: #ff3b30;
            transform: scale(1.25);
            box-shadow: 0 0 15px rgba(255, 59, 48, 0.4);
        }

        .timeline-node.updating .timeline-dot {
            border-color: #cbd5e1;
            box-shadow: none;
        }

        .timeline-content-card {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.05);
            border-radius: 24px;
            padding: 26px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.015);
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
            border-color: rgba(255, 59, 48, 0.2);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.04), 0 0 15px rgba(255, 59, 48, 0.03);
        }

        .timeline-node.updating .timeline-content-card {
            background: rgba(241, 245, 249, 0.35);
            border-style: dashed;
            box-shadow: none;
        }

        .timeline-badge {
            background: rgba(255, 59, 48, 0.06);
            border: 1px solid rgba(255, 59, 48, 0.15);
            color: #ff3b30;
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
            background: rgba(100, 116, 139, 0.06);
            border-color: rgba(100, 116, 139, 0.15);
            color: #64748b;
        }

        .timeline-content-card h3 {
            font-size: 1.15rem;
            font-weight: 800;
            color: #0f172a;
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
            color: #64748b;
            margin-bottom: 12px;
        }

        .timeline-meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .timeline-meta-item svg {
            color: #ff3b30;
            flex-shrink: 0;
        }

        .timeline-desc {
            font-size: 0.88rem;
            line-height: 1.55;
            color: #475569;
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
                0 0 20px rgba(255, 59, 48, 0.03);
            border: 1px solid rgba(15, 23, 42, 0.06);
            transition: border-color 0.3s ease;
        }

        .video-player-box:hover {
            border-color: rgba(255, 59, 48, 0.25);
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
            background: rgba(255, 59, 48, 0.05);
            border: 1px solid rgba(255, 59, 48, 0.15);
            color: #ff3b30;
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
            color: #ff3b30;
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
            color: #ff3b30;
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
            background: rgba(255, 59, 48, 0.03);
            border-color: rgba(255, 59, 48, 0.1);
            transform: translateY(-2px);
        }

        .playlist-items li.active {
            background: rgba(255, 59, 48, 0.05);
            border-color: rgba(255, 59, 48, 0.18);
            box-shadow: 0 4px 12px rgba(255, 59, 48, 0.02);
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
            color: #ff3b30 !important;
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
            color: #ff3b30 !important;
        }

        /* ── Section 6: Form ──────────────── */
        .section-form {
            padding: 80px 0;
            position: relative;
        }

        .form-glow-box {
            max-width: 700px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.06);
            border-radius: 28px;
            padding: 50px 40px;
            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.02),
                0 0 30px rgba(255, 59, 48, 0.02);
            position: relative;
            overflow: hidden;
        }

        @media (max-width: 600px) {
            .form-glow-box {
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
            border-color: #ff3b30;
            background: #ffffff;
            box-shadow: 0 0 10px rgba(255, 59, 48, 0.06);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        /* Errors */
        .error-message {
            color: #ff3b30;
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
            box-shadow: 0 15px 35px rgba(255, 59, 48, 0.08);
            border-color: rgba(255, 59, 48, 0.25);
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

        /* Helper spacing */
        .ideas_header .container {
            max-width: 1360px !important;
            width: 100% !important;
            padding: 0 20px !important;
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
            <div class="talk-hero-bg"
                style="background-image: url('https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp');">
            </div>
            <div class="talk-hero-overlay"></div>
            <div class="talk-hero-container">
                <span class="talk-hero-badge">
                    <svg class="svg-icon fa-globe fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M352 256c0 22.2-1.2 43.6-3.3 64l-185.3 0c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64l185.3 0c2.2 20.4 3.3 41.8 3.3 64zm28.8-64l123.1 0c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64l-123.1 0c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32l-116.7 0c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0l-176.6 0c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0L18.6 160C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192l123.1 0c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64L8.1 320C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6l176.6 0c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2-40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352l116.7 0zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6l116.7 0z"/></svg> 
                    <?php echo $is_en ? 'Webinar Series' : 'Chuỗi Webinar'; ?>
                </span>
                <h1><span>IDEAS TALK</span></h1>
                <div class="talk-tagline"><?php echo $is_en ? 'Actionable Knowledge Transfer' : 'Tri Thức Thực Chiến Chuyển Đổi'; ?></div>
                <div class="verify-slogan">
                    <?php echo $is_en ? '"Original Knowledge - Localized Mentorship"' : '“Tri thức nguyên bản - Đồng hành Bản địa”'; ?>
                </div>

                <p><?php echo $is_en ? '#IDEAS Monthly Workshop - The place to update new knowledge, lean methods, and breakthrough solutions for individuals & businesses.' : '#IDEAS Monthly Workshop - Nơi cập nhật tri thức mới, phương pháp tinh gọn và giải pháp bứt phá cho cá nhân & doanh nghiệp.'; ?></p>
                
                <div class="talk-hero-ctas">
                    <a href="#register" class="btn-talk btn-talk-primary">
                        <?php echo $is_en ? 'Register Now' : 'Đăng ký tham gia ngay'; ?>
                    </a>
                    <a href="#recap" class="btn-talk btn-talk-secondary-dark">
                        <?php echo $is_en ? 'Watch Latest Recap' : 'Xem Recap buổi gần nhất'; ?>
                    </a>
                </div>
            </div>
        </section>

        <!-- Section 1: Intro (Sleek Redesigned Style) -->
        <section class="section-intro" id="about">
            <div class="talk-container">
                <div class="intro-grid">
                    <div class="intro-left">
                        <span class="intro-badge-accent"><?php echo $is_en ? 'IDEAS TALK VALUE' : 'GIÁ TRỊ TỪ IDEAS TALK'; ?></span>
                        <h3>
                            <span class="highlight-number">90</span> <?php echo $is_en ? 'Minutes Solving Pain Points' : 'Phút Tháo Gỡ Pain Point'; ?><br>
                            <span class="highlight-number">1</span> <?php echo $is_en ? 'Night Boosting Capability' : 'Đêm Bứt Phá Năng Lực'; ?>
                        </h3>
                        <div class="intro-line-decorator"></div>
                        <p><?php echo $is_en ? 'No academic theory, no generic scripts. Each Webinar is a "real battle" case solving thoroughly one big problem of the enterprise — directly with Experts (Enterprise Doctors from IDEAS) & experienced managers.' : 'Không lý thuyết hàn lâm, không kịch bản chung chung. Mỗi buổi Webinar là một ca "thực chiến" giải quyết triệt để 1 bài toán lớn của doanh nghiệp — trực tiếp cùng Chuyên gia (Bác sĩ Doanh nghiệp từ IDEAS) & Nhà quản trị dày dặn kinh nghiệm.'; ?></p>
                    </div>
                    <div class="intro-right">
                        <div class="intro-cards-stack">
                            <!-- Card 1 -->
                            <div class="intro-card">
                                <div class="intro-card-icon">
                                    <svg viewBox="0 0 448 512" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zm-28.8 96c17.7 0 32 14.3 32 32v272c0 17.7-14.3 32-32 32s-32-14.3-32-32V128c0-17.7 14.3-32 32-32zm358.1 0c17.7 0 32 14.3 32 32v272c0 17.7-14.3 32-32 32s-32-14.3-32-32V128c0-17.7 14.3-32 32-32zM128 448h192V192H128v256z"/></svg>
                                </div>
                                <div class="intro-card-content">
                                    <h4><?php echo $is_en ? 'Timeline' : 'Thời gian'; ?></h4>
                                    <p><?php echo $is_en ? 'Thursday at 19:30 - 21:00' : 'Thứ 5 lúc 19:30 - 21:00'; ?></p>
                                </div>
                            </div>
                            <!-- Card 2 -->
                            <div class="intro-card">
                                <div class="intro-card-icon">
                                    <svg viewBox="0 0 576 512" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 128C0 92.7 28.7 64 64 64H320c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128zM559.1 99.8c10.4 5.6 16.9 16.4 16.9 28.2V354c0 11.8-6.5 22.6-16.9 28.2l-112 60.2c-15.6 8.4-34.6-2.9-34.6-20.8V90.6c0-17.9 19-29.2 34.6-20.8l112 60.2z"/></svg>
                                </div>
                                <div class="intro-card-content">
                                    <h4><?php echo $is_en ? 'Format' : 'Hình thức'; ?></h4>
                                    <p><?php echo $is_en ? 'Live via Zoom' : 'Trực tiếp qua Zoom'; ?></p>
                                </div>
                            </div>
                            <!-- Card 3 -->
                            <div class="intro-card">
                                <span class="intro-card-tag"><?php echo $is_en ? 'Free' : 'Đặc quyền'; ?></span>
                                <div class="intro-card-icon">
                                    <svg viewBox="0 0 512 512" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M190.4 48.4c10-3.1 20.7 2.4 23.9 12.4l34.4 107.1L209 177.1c-22.3-10.3-48.4-1.2-59.5 21l-34.4-107.1c-3.1-10 2.4-20.7 12.4-23.9l62.9-19.8zm231 231c10 3.1 15.5 13.8 12.4 23.9l-34.4 107.1c-11.1 22.3-37.2 31.4-59.5 21l-39.7 9.2 34.4-107.1c3.1-10 13.8-15.5 23.9-12.4l62.9 18.3zm-63.5-84.7c22.3 10.3 31.4 36.4 21 58.7l-159.2 346c-10.3 22.3-36.4 31.4-58.7 21l-31.5-14.5c-22.3-10.3-31.4-36.4-21-58.7l159.2-346c10.3-22.3 36.4-31.4 58.7-21l31.5 14.5z"/></svg>
                                </div>
                                <div class="intro-card-content">
                                    <h4><?php echo $is_en ? 'Privilege' : 'Đặc quyền'; ?></h4>
                                    <p><?php echo $is_en ? 'Free applicable Templates/Documents' : 'Tặng bộ Template/Tài liệu áp dụng ngay'; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="section-divider"></div>

        <!-- Section 2: Why Attend (Split List Layout - Professional & No Emojis) -->
        <section class="section-why" id="why-attend">
            <div class="talk-container">
                <div class="why-split-container">
                    <div class="why-left-sticky">
                        <h2><?php echo $is_en ? 'Why You Shouldn\'t Miss IDEAS Talk Webinar Series?' : 'Tại Sao Bạn Không Nên Bỏ Lỡ Chuỗi Webinar của IDEAS?'; ?></h2>
                        <p><?php echo $is_en ? '90 minutes is not just about learning knowledge, but a hands-on experience solving problems directly with Experts.' : '90 phút không chỉ là học tri thức, mà là trải nghiệm tháo gỡ khó khăn trực tiếp cùng Chuyên gia.'; ?></p>
                        <a href="#register" class="btn-talk btn-talk-primary">
                            <?php echo $is_en ? 'Register Today' : 'Đăng ký ngay hôm nay'; ?>
                        </a>
                    </div>
                    
                    <div class="why-right-list">
                        <!-- Point 1 -->
                        <div class="why-list-item">
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
                        <div class="why-list-item">
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
                        <div class="why-list-item">
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
                        <div class="why-list-item">
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

        <div class="section-divider"></div>

        <!-- Section 3: Key Topics (Clean Row List - No Emoji, ALIGNED) -->
        <section class="section-topics" id="topics">
            <div class="talk-container">
                <div class="talk-section-header">
                    <h2><?php echo $is_en ? 'Core Themes at IDEAS Talk' : 'Các Chủ Đề Trọng Tâm Tại IDEAS TALK'; ?></h2>
                    <p><?php echo $is_en ? 'Our webinar topics cover key business pillars, designed to provide comprehensive tools and strategies.' : 'Các chủ đề được lựa chọn cẩn thận bao quanh các trụ cột cốt lõi của doanh nghiệp.'; ?></p>
                </div>
                
                <div class="topics-list">
                    <!-- Topic 1 -->
                    <div class="topic-badge-row">
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
                    <div class="topic-badge-row">
                        <div class="topic-tag-col">
                            <span class="topic-tag">Leadership</span>
                        </div>
                        <div class="topic-desc-col">
                            <p class="topic-desc"><?php echo $is_en ? 'Unblock management bottlenecks & build leading capacity.' : 'Tháo gỡ điểm nghẽn quản trị & năng lực dẫn dắt.'; ?></p>
                        </div>
                    </div>

                    <!-- Topic 3 -->
                    <div class="topic-badge-row">
                        <div class="topic-tag-col">
                            <span class="topic-tag">Marketing &amp; Sales</span>
                        </div>
                        <div class="topic-desc-col">
                            <p class="topic-desc"><?php echo $is_en ? 'Breakthrough revenue growth with practical sales & marketing solutions.' : 'Đột phá tăng trưởng doanh số với giải pháp tiếp thị thực chiến.'; ?></p>
                        </div>
                    </div>

                    <!-- Topic 4 -->
                    <div class="topic-badge-row">
                        <div class="topic-tag-col">
                            <span class="topic-tag">Finance</span>
                        </div>
                        <div class="topic-desc-col">
                            <p class="topic-desc"><?php echo $is_en ? 'Optimize cash flows & manage corporate financial health.' : 'Tối ưu dòng tiền & quản trị sức khỏe tài chính doanh nghiệp.'; ?></p>
                        </div>
                    </div>

                    <!-- Topic 5 -->
                    <div class="topic-badge-row">
                        <div class="topic-tag-col">
                            <span class="topic-tag">Soft Skills</span>
                        </div>
                        <div class="topic-desc-col">
                            <p class="topic-desc"><?php echo $is_en ? 'Elevate personal capacity & working mindsets in the new era.' : 'Nâng tầm năng lực cá nhân & tư duy làm việc thời đại mới.'; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="section-divider"></div>

        <!-- Section 4: Horizontal Timeline (Full Width Layout / Fluid / No container box) -->
        <section class="section-featured" id="featured-webinars">
            <div class="timeline-container-fluid">
                <div class="talk-section-header">
                    <h2><?php echo $is_en ? 'Webinar Schedule' : 'Lịch Trình Webinar'; ?></h2>
                    <p><?php echo $is_en ? 'Explore our upcoming topics and register for your slots.' : 'Xem danh sách và lộ trình các buổi chia sẻ hữu ích tiếp theo.'; ?></p>
                </div>
                
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
                                            <svg viewBox="0 0 448 512" fill="currentColor" width="12" height="12" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0z"/></svg>
                                            13/08/2026 (19:30 - 21:00)
                                        </div>
                                        <div class="timeline-meta-item">
                                            <svg viewBox="0 0 576 512" fill="currentColor" width="12" height="12" xmlns="http://www.w3.org/2000/svg"><path d="M0 128C0 92.7 28.7 64 64 64H320c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128zM559.1 99.8c10.4 5.6 16.9 16.4 16.9 28.2V354c0 11.8-6.5 22.6-16.9 28.2l-112 60.2c-15.6 8.4-34.6-2.9-34.6-20.8V90.6c0-17.9 19-29.2 34.6-20.8l112 60.2z"/></svg>
                                            Zoom Meeting
                                        </div>
                                    </div>
                                    <p class="timeline-desc"><?php echo $is_en ? 'Learn original AI framework: adaptation mindset, prompting technical tools, and core data structures.' : 'Giải mã bài toán ứng dụng AI qua 3 góc nhìn: Tư duy tiếp cận chủ động, Kỹ thuật prompting, và Nền tảng mô hình dữ liệu.'; ?></p>
                                </div>
                                <div class="timeline-btn-wrapper">
                                    <button onclick="registerForTopic('Ứng dụng AI trong học tập & nghiên cứu (13/08/2026)')" class="btn-talk btn-talk-primary">
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
                                            <svg viewBox="0 0 448 512" fill="currentColor" width="12" height="12" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0z"/></svg>
                                            <?php echo $is_en ? 'Expected: 27/08/2026' : 'Dự kiến: 27/08/2026'; ?>
                                        </div>
                                        <div class="timeline-meta-item">
                                            <svg viewBox="0 0 576 512" fill="currentColor" width="12" height="12" xmlns="http://www.w3.org/2000/svg"><path d="M0 128C0 92.7 28.7 64 64 64H320c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128zM559.1 99.8c10.4 5.6 16.9 16.4 16.9 28.2V354c0 11.8-6.5 22.6-16.9 28.2l-112 60.2c-15.6 8.4-34.6-2.9-34.6-20.8V90.6c0-17.9 19-29.2 34.6-20.8l112 60.2z"/></svg>
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
                                            <svg viewBox="0 0 448 512" fill="currentColor" width="12" height="12" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0z"/></svg>
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
                                            <svg viewBox="0 0 448 512" fill="currentColor" width="12" height="12" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0z"/></svg>
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
                                            <svg viewBox="0 0 448 512" fill="currentColor" width="12" height="12" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0z"/></svg>
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

        <!-- Section 5: Recap (Theater Section) -->
        <section class="theater-section" id="recap">
            <div class="talk-container">
                <div class="talk-section-header">
                    <h2><?php echo $is_en ? 'Recap &amp; Watch Previous Webinars' : 'Xem Lại Các Buổi Webinar Gần Nhất'; ?></h2>
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

        <!-- Section 6: Form -->
        <section class="section-form" id="register">
            <div class="talk-container">
                <div class="form-glow-box">
                    <div class="form-header" id="form-header">
                        <h2><?php echo $is_en ? 'Ready to Elevate Your Capacity with IDEAS?' : 'Sẵn Sàng Bứt Phá Năng Lực Cùng IDEAS'; ?></h2>
                        <p><?php echo $is_en ? 'Register today to receive Zoom credentials and exclusive templates before the webinar starts.' : 'Đăng ký ngay hôm nay để nhận thông tin phòng Zoom và bộ tài liệu độc quyền trước giờ G.'; ?></p>
                    </div>

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
                                <?php echo $is_en ? 'Please select a topic' : 'Vui lòng chọn một chủ đề'; ?>
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
                                <span><svg class="svg-icon fa-calendar-days fa-solid" viewBox="0 0 448 512" width="12" height="12" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zm64 80h192V192H192v256H192v-256zM128 192h32v256h-32V192zm288 0h32v256h-32V192zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/></svg> ${item.date}</span>
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
            const selectEl = document.getElementById('interest');
            const targetSec = document.getElementById('register');
            if (selectEl) {
                selectEl.value = topicName;
            }
            if (targetSec) {
                targetSec.scrollIntoView({ behavior: 'smooth' });
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
