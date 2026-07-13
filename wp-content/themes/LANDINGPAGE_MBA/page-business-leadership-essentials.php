<?php
/**
 * The template for displaying the Business Leadership Essentials Landing Page
 * Template Name: Business Leadership Essentials Template
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

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
            <title><?php echo $is_en ? 'Business Leadership Essentials Certificate | IDEAS' : 'Chứng chỉ Business Leadership Essentials | IDEAS'; ?></title>
            <meta name="description"
                content="<?php echo $is_en ? 'Develop a modern leadership mindset, optimize performance, and understand organizational behaviour through three core modules of Swiss UMEF at IDEAS.' : 'Khóa học giúp nhà quản lý xây dựng tư duy lãnh đạo hiện đại, phát triển đội ngũ, tạo văn hóa làm việc tích cực và nâng cao hiệu suất tổ chức thông qua ba học phần Swiss UMEF.'; ?>" />
            <meta property="og:type" content="article" />
            <meta property="og:title" content="<?php echo $is_en ? 'Business Leadership Essentials - IDEAS' : 'Khóa học Business Leadership Essentials - IDEAS'; ?>" />
            <meta property="og:description"
                content="<?php echo $is_en ? 'Gain 8 core leadership competencies and Swiss UMEF certification. Register in July for 100% Learning Grant.' : 'Đạt được 8 năng lực lãnh đạo cốt lõi và chứng nhận từ Swiss UMEF. Đăng ký trong tháng 7 để nhận Learning Grant 100% học phí.'; ?>" />
            <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2026/06/swissumef_logo.png" />
            <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />
    <?php endif; ?>

    <!-- Booking Modal stylesheet -->
    <?php
    define('BOOKING_MODAL_CSS_LOADED', true);
    $bk_css_path = get_stylesheet_directory() . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/booking-modal.min.css?v=<?php echo $bk_css_version; ?>" media="print" onload="this.media='all'" />

    <!-- Premium Custom Styles for Business Leadership Essentials -->
    <style>
        /* ══════════════════════════════════════
           BUSINESS LEADERSHIP ESSENTIALS STYLES
        ══════════════════════════════════════ */
        html, body {
            overflow-x: clip !important;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #ffffff;
            color: #334155;
            -webkit-font-smoothing: antialiased;
        }

        body {
            background-image: radial-gradient(rgba(171, 14, 0, 0.015) 1.5px, transparent 1.5px);
            background-size: 30px 30px;
        }

        /* ─── Custom Webkit Scrollbar ─── */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #faf8f5;
        }

        ::-webkit-scrollbar-thumb {
            background: #ab0e00;
            border-radius: 100px;
            border: 2.5px solid #faf8f5;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #8c1000;
        }

        html {
            scrollbar-width: thin;
            scrollbar-color: #ab0e00 #faf8f5;
        }

        /* ── Typography & Accents ──────────── */
        .ble-gradient-text {
            background: linear-gradient(135deg, #ab0e00 0%, #d92414 60%, #e11d48 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 850;
        }

        /* ── Sections Common (Alternating White & Cream) ── */
        .ble-section {
            padding: 100px 20px;
            position: relative;
            background-color: #ffffff;
            overflow: hidden;
        }

        .ble-section.bg-white {
            background-color: #ffffff;
        }

        .ble-section.bg-soft-cream {
            background: linear-gradient(135deg, #ffffff 0%, #fff5f5 50%, #ffebeb 100%);
            border-top: 1px solid rgba(171, 14, 0, 0.08);
            border-bottom: 1px solid rgba(171, 14, 0, 0.08);
        }

        .ble-container {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            position: relative;
            z-index: 2;
        }

        .ble-title-wrap {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 60px auto;
        }

        /* ─── Ambient Glow Orbs ─── */
        .ble-glow-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(90px);
            pointer-events: none;
            z-index: 0;
            opacity: 0.55;
            will-change: transform;
            transform: translate3d(0, 0, 0);
        }

        .ble-glow-orb-primary {
            background: radial-gradient(circle, rgba(171, 14, 0, 0.07) 0%, transparent 70%);
            width: 450px;
            height: 450px;
        }

        .ble-glow-orb-gold {
            background: radial-gradient(circle, rgba(217, 159, 56, 0.08) 0%, transparent 70%);
            width: 500px;
            height: 500px;
        }

        /* ─── Pulsing Premium Badges ─── */
        .ble-section-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(171, 14, 0, 0.06);
            color: #ab0e00;
            padding: 8px 20px;
            border-radius: 100px;
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 18px;
            border: 1.5px solid rgba(171, 14, 0, 0.15);
        }

        .ble-section-tag .dot {
            width: 8px;
            height: 8px;
            background: #ab0e00;
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 0 2.5px rgba(171, 14, 0, 0.25);
            animation: pulse-dot-red-crisp 1.5s infinite;
        }

        @keyframes pulse-dot-red-crisp {
            0% {
                transform: scale(0.9);
                box-shadow: 0 0 0 2px rgba(171, 14, 0, 0.2);
            }
            50% {
                transform: scale(1.1);
                box-shadow: 0 0 0 4px rgba(171, 14, 0, 0.35);
            }
            100% {
                transform: scale(0.9);
                box-shadow: 0 0 0 2px rgba(171, 14, 0, 0.2);
            }
        }

        @keyframes pulse-dot-red {
            0% {
                transform: scale(0.85);
                opacity: 0.5;
            }
            50% {
                transform: scale(1.15);
                opacity: 1;
            }
            100% {
                transform: scale(0.85);
                opacity: 0.5;
            }
        }

        .ble-section-title {
            font-size: clamp(1.8rem, 3.5vw, 2.3rem);
            font-weight: 900;
            color: #0f172a;
            margin: 0 0 16px 0;
            line-height: 1.25;
            letter-spacing: -0.02em;
        }

        .ble-section-subtitle {
            font-size: 1rem;
            color: #475569;
            line-height: 1.6;
        }

        .ble-text-red {
            color: #ab0e00 !important;
        }

        .ble-gradient-text {
            background: linear-gradient(135deg, #ab0e00 0%, #ff4d4d 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
            display: inline-block;
        }

        #curriculum.ble-section {
            overflow: visible !important;
        }

        /* ── Red Box Title Accents ── */
        .ble-title-badge-red {
            display: inline-block;
            background: #ab0e00;
            color: #ffffff;
            font-weight: 900;
            font-size: 1.1rem;
            text-transform: uppercase;
            padding: 10px 24px;
            border-radius: 12px;
            letter-spacing: 0.05em;
            margin-bottom: 16px;
        }

        /* ── SVG Icons Styling ─────────────── */
        .ble-svg-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            vertical-align: middle;
            flex-shrink: 0;
        }

        /* ── Buttons ── */
        .ble-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: #ab0e00; /* Solid red matching header style */
            color: #ffffff !important;
            font-weight: 750;
            font-size: 0.95rem;
            padding: 14px 34px;
            border-radius: 100px;
            border: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(171, 14, 0, 0.15);
            text-decoration: none !important;
            position: relative;
            overflow: hidden;
            z-index: 5;
        }

        .ble-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -150%;
            width: 50%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            transform: skewX(-25deg);
            transition: 0.75s;
        }

        .ble-btn:hover::before {
            left: 150%;
        }

        .ble-btn:hover {
            background: #8c1000;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(171, 14, 0, 0.25);
        }

        .ble-btn:active {
            transform: translateY(0);
        }

        .ble-btn-outline {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: transparent;
            color: #ab0e00 !important; /* Red text to match header outline style */
            border: 1.5px solid #ab0e00; /* Red border to match header */
            font-weight: 750;
            font-size: 0.95rem;
            padding: 12.5px 32.5px;
            border-radius: 100px;
            z-index: 5;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none !important;
            box-shadow: none;
        }

        .ble-btn-outline:hover {
            background: rgba(171, 14, 0, 0.05);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(171, 14, 0, 0.1);
        }

        /* ── Hero Section (herobg.webp faded background) ── */
        .ble-hero {
            padding-top: 170px;
            padding-bottom: 120px;
            background: #ffffff;
            border-bottom: 1px solid #cbd5e1;
            position: relative;
        }

        .ble-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url('https://ideas.edu.vn/wp-content/new_public/LANDINGPAGE_MBA/assets/herobg.webp');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.35;
            z-index: 1;
            pointer-events: none;
        }

        .ble-hero-grid {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 90px;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .ble-hero-content {
            z-index: 5;
        }

        .ble-hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(171, 14, 0, 0.08);
            border: 1px solid rgba(171,14,0,0.15);
            color: #ab0e00;
            font-weight: 800;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            padding: 8px 18px;
            border-radius: 100px;
            margin-bottom: 24px;
        }

        .ble-hero-tag span {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #ab0e00;
            box-shadow: 0 0 0 2.5px rgba(171, 14, 0, 0.25);
            animation: pulse-dot-red-crisp 1.5s infinite;
        }

        .ble-hero-title {
            font-size: clamp(2.8rem, 5.5vw, 4.2rem);
            font-weight: 900;
            color: #0f172a;
            line-height: 1.1;
            letter-spacing: -0.03em;
            margin: 0 0 24px 0;
        }

        .ble-hero-desc {
            font-size: 0.95rem;
            line-height: 1.65;
            color: #475569;
            margin-bottom: 30px;
            max-width: 600px;
        }

        .ble-hero-meta-row {
            display: flex;
            align-items: center;
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.08);
            border-radius: 12px;
            padding: 12px 24px;
            gap: 0;
            margin-bottom: 35px;
            max-width: 760px;
            width: 100%;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.015);
        }

        .ble-hero-meta-item {
            display: flex;
            align-items: center;
            gap: 12px;
            flex: 1;
            justify-content: center;
            position: relative;
            padding: 0 15px;
        }

        .ble-hero-meta-item:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 1px;
            height: 24px;
            background: rgba(15, 23, 42, 0.1);
        }

        .ble-hero-meta-item svg {
            width: 16px !important;
            height: 16px !important;
            color: #ffffff !important;
            background: #ab0e00 !important;
            padding: 8px !important;
            border-radius: 50% !important;
            flex-shrink: 0 !important;
            display: block !important;
        }

        body main.ideas_main .ble-hero-meta-row .ble-hero-meta-item svg,
        body main.ideas_main .ble-hero-meta-row .ble-hero-meta-item svg *,
        body main.ideas_main .ble-hero-meta-row .ble-hero-meta-item svg path,
        body main.ideas_main .ble-hero-meta-row .ble-hero-meta-item svg polygon,
        body main.ideas_main .ble-hero-meta-row .ble-hero-meta-item svg circle,
        body main.ideas_main .ble-hero-meta-row .ble-hero-meta-item svg rect {
            stroke: #ffffff !important;
            stroke-width: 2.5 !important;
            fill: none !important;
        }

        .ble-hero-meta-item span {
            display: flex;
            flex-direction: column;
            text-align: left;
            font-size: 0.68rem;
            color: #64748b;
            line-height: 1.3;
        }

        .ble-hero-meta-item strong {
            font-size: 0.8rem;
            color: #0f172a;
            font-weight: 800;
            margin-top: 1px;
        }

        .ble-hero-promo {
            display: flex;
            align-items: center;
            gap: 16px;
            background: linear-gradient(90deg, rgba(171, 14, 0, 0.05) 0%, rgba(255, 82, 82, 0.05) 100%);
            border: 1.5px dashed rgba(171, 14, 0, 0.35);
            padding: 16px 24px;
            border-radius: 12px;
            margin-bottom: 36px;
            max-width: 760px;
            width: 100%;
            box-sizing: border-box;
            animation: pulse-promo-glow 2s infinite alternate;
        }

        @keyframes pulse-promo-glow {
            0% {
                border-color: rgba(171, 14, 0, 0.3);
                box-shadow: 0 0 0 rgba(171, 14, 0, 0);
            }
            100% {
                border-color: rgba(171, 14, 0, 0.7);
                box-shadow: 0 4px 15px rgba(171, 14, 0, 0.04);
            }
        }

        .ble-hero-promo-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ab0e00;
        }

        .ble-hero-promo-text {
            font-size: 0.92rem;
            font-weight: 750;
            color: #8c1000;
            line-height: 1.4;
        }

        .ble-hero-promo-text strong {
            font-weight: 900;
            color: #ab0e00;
        }

        .ble-hero-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        /* Hero Right Column: Dashboard Mockup Design */
        .ble-hero-visual {
            position: relative;
            z-index: 5;
            display: flex;
            justify-content: center;
            align-items: center;
            perspective: 1200px;
        }

        .ble-hero-visual::before {
            content: '';
            position: absolute;
            width: 450px;
            height: 450px;
            background: radial-gradient(circle, rgba(171, 14, 0, 0.12) 0%, transparent 70%);
            z-index: 1;
            pointer-events: none;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .ble-dashboard-preview {
            background: linear-gradient(135deg, #ab0e00 0%, #7a0900 100%);
            border-radius: 28px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 20px 50px rgba(171, 14, 0, 0.25);
            width: 100%;
            max-width: 440px;
            padding: 30px;
            position: relative;
            overflow: visible;
            z-index: 2;
            transform: rotateY(-8deg) rotateX(4deg) scale(0.98);
            transform-style: preserve-3d;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .ble-dashboard-preview:hover {
            transform: rotateY(0deg) rotateX(0deg) scale(1.02);
            box-shadow: 0 30px 70px rgba(171, 14, 0, 0.4);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .ble-dashboard-badge {
            position: absolute;
            top: -14px;
            right: 20px;
            background: #10b981;
            color: #ffffff;
            padding: 4px 12px;
            border-radius: 100px;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .db-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.12);
            padding-bottom: 20px;
        }

        .db-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ab0e00;
            font-weight: 900;
            font-size: 1.1rem;
        }

        .db-user-info h5 {
            margin: 0 0 4px 0;
            font-size: 0.95rem;
            font-weight: 800;
            color: #ffffff;
        }

        .db-user-info span {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.75);
            font-weight: 600;
        }

        .db-progress-card {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 18px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            margin-bottom: 24px;
        }

        .db-progress-card h6 {
            margin: 0 0 8px 0;
            font-size: 0.82rem;
            font-weight: 750;
            color: rgba(255, 255, 255, 0.95);
        }

        .db-bar-container {
            height: 8px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 100px;
            margin-bottom: 12px;
            overflow: hidden;
        }

        .db-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, #ff8a00, #ffc000);
            border-radius: 100px;
            width: 75%;
        }

        .db-progress-meta {
            display: flex;
            justify-content: space-between;
            font-size: 0.72rem;
            color: rgba(255, 255, 255, 0.75);
            font-weight: 600;
        }

        .db-modules-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .db-module-item {
            display: flex;
            align-items: center;
            gap: 14px;
            background: rgba(255, 255, 255, 0.04);
            border-radius: 16px;
            padding: 14px 18px;
            border: 1.5px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }

        .db-module-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 0.85rem;
            font-weight: 900;
        }

        .db-module-icon.pending {
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
        }

        .db-module-title {
            font-size: 0.82rem;
            font-weight: 750;
            color: rgba(255, 255, 255, 0.95);
        }

        .db-module-item.active {
            background: rgba(255, 255, 255, 0.12) !important;
            border-color: rgba(255, 255, 255, 0.25) !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .db-active-pulse {
            font-size: 0.65rem;
            font-weight: 800;
            background: #10b981;
            color: #ffffff !important;
            padding: 3px 9px;
            border-radius: 100px;
            margin-left: auto;
            text-transform: uppercase;
            letter-spacing: 0.02em;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 2px 6px rgba(16, 185, 129, 0.35);
        }

        .db-active-pulse::before {
            content: '';
            display: inline-block;
            width: 6px;
            height: 6px;
            background: #ffffff;
            border-radius: 50%;
            animation: blink-dot 1.5s infinite;
        }

        @keyframes blink-dot {
            0% { opacity: 0.4; }
            50% { opacity: 1; }
            100% { opacity: 0.4; }
        }

        /* Floating Badge in Hero visual */
        .db-floating-badge {
            position: absolute;
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid rgba(15, 23, 42, 0.08);
            padding: 14px 18px;
            box-shadow: 0 10px 30px rgba(171, 14, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 10;
            animation: float-gentle 4s ease-in-out infinite alternate;
            transition: all 0.3s ease;
        }

        .db-floating-badge:hover {
            transform: scale(1.05) translateY(-5px);
            box-shadow: 0 15px 35px rgba(171, 14, 0, 0.12);
        }

        .db-floating-badge.badge-1 {
            bottom: 20px;
            left: -40px;
            animation-delay: 0s;
        }

        .db-floating-badge.badge-2 {
            top: 60px;
            right: -40px;
            animation-delay: 1.5s;
        }

        @keyframes float-gentle {
            0% { transform: translateY(0); }
            100% { transform: translateY(-12px); }
        }

        .db-float-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ab0e00;
        }

        .db-floating-badge.badge-1 .db-float-icon {
            color: #ab0e00;
        }

        .db-float-text h6 {
            margin: 0 0 2px 0;
            font-size: 0.8rem;
            font-weight: 800;
            color: #0f172a;
        }

        .db-float-text span {
            font-size: 0.65rem;
            color: #64748b;
            font-weight: 600;
        }

        /* ── COURSE DETAILS BANNER (Solid Red Cask.vn Style Layout) ── */
        .ble-details-banner {
            background: linear-gradient(135deg, #7a0900 0%, #ab0e00 50%, #7a0900 100%);
            padding: 70px 20px;
            color: #ffffff;
            border-top: 1px solid #4d0000;
            border-bottom: 1px solid #4d0000;
            position: relative;
            overflow: hidden;
        }

        .ble-details-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.05) 0%, transparent 60%);
            pointer-events: none;
        }

        .ble-db-grid {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 40px;
            align-items: center;
        }

        .ble-db-title {
            font-size: clamp(1.8rem, 3.5vw, 2.3rem);
            font-weight: 900;
            color: #ffffff;
            margin: 0 0 16px 0;
            line-height: 1.2;
        }

        .ble-db-desc {
            font-size: 0.95rem;
            line-height: 1.6;
            color: #ffffff !important;
            opacity: 0.95 !important;
            margin-bottom: 30px;
        }

        .ble-db-info-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            border-top: 1.5px solid rgba(255, 255, 255, 0.2);
            border-bottom: 1.5px solid rgba(255, 255, 255, 0.2);
            padding: 22px 0;
            margin-bottom: 35px;
        }

        .ble-db-info-col {
            display: flex;
            flex-direction: column;
            gap: 6px;
            padding: 10px 15px;
            border-radius: 12px;
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .ble-db-info-col::after {
            content: '';
            position: absolute;
            right: 0;
            top: 15%;
            height: 70%;
            width: 1.5px;
            background: rgba(255, 255, 255, 0.2);
        }

        .ble-db-info-col:hover {
            background: rgba(255, 255, 255, 0.08);
            transform: translateY(-2px);
        }

        .ble-db-info-col:last-child::after {
            display: none;
        }

        .ble-db-info-col:last-child {
            padding-right: 0;
        }

        .ble-db-info-label {
            font-size: 0.72rem;
            font-weight: 800;
            color: rgba(255, 255, 255, 0.75);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .ble-db-info-value {
            font-size: 0.95rem;
            font-weight: 800;
            color: #ffffff;
            transition: color 0.3s ease;
        }

        .ble-db-info-col:hover .ble-db-info-value {
            color: #ffffff;
        }

        .ble-db-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .ble-btn-white-outline {
            background: transparent;
            color: #ffffff !important;
            border: 1.5px solid #ffffff;
            font-weight: 800;
            font-size: 0.95rem;
            padding: 13.5px 30px;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: none;
        }

        .ble-btn-white-outline:hover {
            background: #ffffff;
            color: #ab0e00 !important;
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.25);
        }

        /* Solid White Button with Red Text for high contrast */
        .ble-btn-white {
            background: #ffffff;
            color: #ab0e00 !important;
            font-weight: 850;
            font-size: 0.95rem;
            padding: 15px 32px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            z-index: 5;
        }

        .ble-btn-white:hover {
            background: #faf8f5;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.3);
        }

        .ble-db-image-container {
            width: 100%;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .ble-db-image-container:hover {
            transform: translateY(-4px) scale(1.01);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.25);
        }

        .ble-db-image-container img {
            width: 100%;
            height: auto;
            object-fit: cover;
            display: block;
            border-radius: 16px;
        }

        /* ── Pain Points Section (Split Layout with Vertical List to prevent repetitive layout) ── */
        .pain-split-layout {
            display: grid;
            grid-template-columns: 1fr 1.15fr;
            gap: 60px;
            align-items: center;
        }

        .pain-left-col {
            padding-right: 20px;
        }

        .pain-right-col {
            display: flex;
            flex-direction: column;
            gap: 20px;
            position: relative;
        }

        .pain-right-col::before {
            content: '';
            position: absolute;
            top: 40px;
            bottom: 40px;
            left: 52px;
            width: 2px;
            background: linear-gradient(to bottom, rgba(171, 14, 0, 0.2), rgba(171, 14, 0, 0.02));
            z-index: 1;
        }

        .pain-list-item {
            display: flex;
            gap: 24px;
            background: #ffffff;
            padding: 24px 30px;
            border-radius: 20px;
            border: 1.5px solid rgba(15, 23, 42, 0.04);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.01);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            align-items: flex-start;
            position: relative;
            z-index: 2;
        }

        .pain-list-item:hover {
            border-color: rgba(171, 14, 0, 0.12);
            transform: translateX(6px);
            box-shadow: 0 15px 35px rgba(171, 14, 0, 0.05);
        }

        .pain-number {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #fff5f5;
            border: 1.5px solid rgba(171, 14, 0, 0.1);
            color: #ab0e00;
            font-weight: 800;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .pain-list-item:hover .pain-number {
            background: #ab0e00;
            color: #ffffff;
            border-color: #ab0e00;
            box-shadow: 0 0 0 5px rgba(171, 14, 0, 0.15);
        }

        .pain-info h4 {
            font-size: 1.1rem;
            font-weight: 850;
            color: #0f172a;
            margin: 0 0 6px 0;
            line-height: 1.35;
        }

        .pain-info p {
            font-size: 0.9rem;
            line-height: 1.55;
            color: #475569 !important;
            margin: 0;
        }

        /* ── Wow Stat Card on Left Column of Pain Points ── */
        .pain-stat-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            border-radius: 24px;
            border: 1.5px solid rgba(171, 14, 0, 0.08);
            padding: 28px;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 15px 35px rgba(171, 14, 0, 0.03);
            margin-top: 36px;
            position: relative;
            overflow: hidden;
            text-align: left;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .pain-stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 45px rgba(171, 14, 0, 0.06);
            border-color: rgba(171, 14, 0, 0.15);
        }

        .pain-stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 6px;
            height: 100%;
            background: #ab0e00;
        }

        .pain-stat-number-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: rgba(171, 14, 0, 0.05);
            border-radius: 16px;
            width: 80px;
            height: 80px;
            flex-shrink: 0;
        }

        .pain-stat-number {
            font-size: 2rem;
            font-weight: 900;
            color: #ab0e00;
            line-height: 1;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .pain-stat-label {
            font-size: 0.6rem;
            font-weight: 800;
            color: #ab0e00;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-top: 4px;
        }

        .pain-stat-info h5 {
            font-size: 1rem;
            font-weight: 850;
            color: #0f172a;
            margin: 0 0 4px 0;
            line-height: 1.35;
        }

        .pain-stat-info p {
            font-size: 0.85rem;
            line-height: 1.45;
            color: #64748b !important;
            margin: 0;
        }

        /* ── 8 Core Competencies (Contrast Accent Border Top) ── */
        .comp-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .comp-card {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid rgba(15, 23, 42, 0.08);
            padding: 32px 28px;
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            position: relative;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.02);
            z-index: 2;
            height: 100%;
        }

        .comp-card:hover {
            transform: translateY(-8px);
            border-color: rgba(171, 14, 0, 0.3);
            box-shadow: 0 20px 40px rgba(171, 14, 0, 0.08);
        }

        .comp-icon-box {
            color: #ab0e00;
            margin-bottom: 24px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(171, 14, 0, 0.06);
            width: 52px;
            height: 52px;
            border-radius: 14px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            align-self: flex-start;
        }

        .comp-card:hover .comp-icon-box {
            background: #ab0e00 !important;
            color: #ffffff !important;
            transform: scale(1.08) rotate(5deg);
        }

        .comp-card:hover .comp-icon-box svg {
            stroke: #ffffff !important;
        }

        .comp-card:hover .comp-icon-box svg polygon {
            stroke: #ffffff !important;
        }

        .comp-card-caps-title {
            font-size: 1rem;
            font-weight: 800;
            color: #0f172a;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .comp-desc {
            font-size: 0.88rem;
            line-height: 1.65;
            color: #1e293b !important; /* Premium high contrast dark slate color */
            margin: 0;
        }

        /* ── About Us Competency Cards ── */
        .competency-grid {
            display: grid !important;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)) !important;
            gap: 24px !important;
            margin-top: 36px !important;
        }

        .competency-card {
            background: #ffffff !important;
            border: 1.5px solid #f1f5f9 !important;
            border-radius: 20px !important;
            padding: 32px 24px 28px 24px !important;
            display: flex !important;
            flex-direction: column !important;
            align-items: flex-start !important;
            position: relative !important;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.02) !important;
            height: 100% !important;
        }

        .competency-card:hover {
            transform: translateY(-5px) !important;
            box-shadow: 0 12px 30px rgba(171, 14, 0, 0.06) !important;
            border-color: rgba(171, 14, 0, 0.15) !important;
        }

        .competency-card .comp-icon-box {
            width: 48px;
            height: 48px;
            background: rgba(171, 14, 0, 0.05);
            color: #ab0e00;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .competency-card:hover .comp-icon-box {
            background: #ab0e00;
            color: #ffffff;
        }

        .competency-card .comp-number {
            position: absolute !important;
            top: 24px !important;
            right: 24px !important;
            font-size: 2.2rem !important;
            font-weight: 900 !important;
            color: rgba(171, 14, 0, 0.04) !important;
            line-height: 1 !important;
            font-family: system-ui, -apple-system, sans-serif !important;
        }

        .competency-card .comp-title {
            font-size: 1.15rem !important;
            font-weight: 800 !important;
            color: #0f172a !important;
            margin-bottom: 12px !important;
            line-height: 1.4 !important;
            margin-top: 0 !important;
        }

        .competency-card .comp-desc {
            font-size: 0.88rem !important;
            color: #64748b !important;
            line-height: 1.6 !important;
            margin: 0 !important;
        }

        /* ── Follow Social Proof Styles ── */
        .ideas_follow_inner {
            display: flex;
            gap: 14px;
            align-items: center;
            margin-top: 24px;
            margin-bottom: 8px;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        .ideas_follow {
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(0, 0, 0, 0.07);
            border-radius: 99px;
            padding: 8px 18px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.01);
            transition: all 0.3s ease;
            box-sizing: border-box;
            height: 42px;
        }

        .ideas_follow:hover {
            background: rgba(0, 0, 0, 0.03);
            border-color: rgba(171, 14, 0, 0.15);
            box-shadow: 0 4px 12px rgba(171, 14, 0, 0.04);
        }

        .ideas_follow p {
            font-size: 0.82rem !important;
            font-weight: 800 !important;
            color: #334155 !important;
            margin: 0 !important;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .ideas_follow a {
            color: #64748b;
            font-size: 1.15rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .ideas_follow a:hover {
            color: #ab0e00;
            transform: translateY(-1.5px);
        }

        .ideas_follow a i {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .ideas_follow a img {
            height: 18px;
            width: auto;
            object-fit: contain;
            filter: grayscale(1) opacity(0.65);
            transition: all 0.3s ease;
        }

        .ideas_follow a:hover img {
            filter: grayscale(0) opacity(1);
        }

        .ideas_follow.group a img {
            height: 22px;
            width: auto;
            object-fit: contain;
            filter: grayscale(1) opacity(0.7);
        }

        .ideas_follow.group a:hover img {
            filter: grayscale(0) opacity(1);
        }

        /* ── Target Audience Section ──────── */
        .audience-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .audience-card {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid #cbd5e1;
            padding: 36px 30px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.02);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .audience-card:hover {
            transform: translateY(-4px);
            border-color: #ab0e00;
            box-shadow: 0 20px 50px rgba(171, 14, 0, 0.08);
        }

        .audience-icon-box {
            width: 64px;
            height: 64px;
            border-radius: 12px;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            color: #ab0e00;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .audience-card:hover .audience-icon-box {
            background: rgba(171, 14, 0, 0.05);
            border-color: #ab0e00;
            transform: scale(1.08);
        }

        .audience-card h4 {
            font-size: 1.1rem;
            font-weight: 850;
            color: #0f172a;
            margin: 0 0 12px 0;
        }

        .audience-card p {
            font-size: 0.88rem;
            line-height: 1.6;
            color: #334155 !important; /* High contrast readable dark slate color */
            margin: 0;
        }

        /* ── Curriculum Section ── */
        .curr-layout {
            display: flex;
            gap: 65px;
            margin-top: 40px;
        }

        .curr-sidebar {
            width: 32%;
            display: flex;
            flex-direction: column;
            gap: 16px;
            position: sticky;
            top: 120px;
            align-self: flex-start;
            z-index: 10;
        }

        .curr-tab {
            background: #ffffff;
            border: 1.5px solid #cbd5e1;
            border-radius: 16px;
            padding: 24px;
            cursor: pointer;
            text-align: left;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .curr-tab-tag {
            font-size: 0.72rem;
            font-weight: 900;
            color: #ab0e00;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 8px;
            position: relative;
            z-index: 2;
        }

        .curr-tab-title {
            font-size: 1.05rem;
            font-weight: 800;
            color: #475569;
            line-height: 1.35;
            position: relative;
            z-index: 2;
        }

        .curr-tab:hover {
            border-color: #ab0e00;
            transform: translateY(-2px);
        }

        .curr-tab.active {
            background: #ab0e00;
            box-shadow: 0 10px 30px rgba(171, 14, 0, 0.2);
            border-color: #ab0e00;
        }

        .curr-tab.active .curr-tab-tag {
            color: rgba(255, 255, 255, 0.9) !important;
        }

        .curr-tab.active .curr-tab-title {
            color: #ffffff !important;
        }

        .curr-details {
            width: 68%;
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #cbd5e1;
            padding: 45px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.02);
            display: flex;
            flex-direction: column;
            position: relative;
            z-index: 2;
        }

        .curr-panel-header {
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 24px;
            margin-bottom: 24px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        .curr-panel-title-wrap {
            max-width: 75%;
        }

        .curr-panel-title {
            font-size: 1.45rem;
            font-weight: 850;
            color: #0f172a;
            margin: 0 0 8px 0;
        }

        .curr-panel-desc {
            font-size: 0.92rem;
            line-height: 1.6;
            color: #475569;
            margin: 0;
        }

        .curr-toggle-all-btn {
            background: #ffffff;
            color: #0f172a;
            border: 1px solid #cbd5e1;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .curr-toggle-all-btn:hover {
            border-color: #0f172a;
            background: #f8fafc;
        }

        .curr-accordion-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .curr-acc-item {
            background: #f8fafc;
            border: 1.5px solid rgba(15, 23, 42, 0.04);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .curr-acc-item.active {
            border-color: rgba(171, 14, 0, 0.2);
            background: #ffffff;
            box-shadow: 0 10px 25px rgba(171, 14, 0, 0.03);
        }

        .curr-acc-header {
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            user-select: none;
            gap: 20px;
        }

        .curr-acc-header-left {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .curr-acc-num {
            font-size: 1.4rem;
            font-weight: 900;
            font-style: italic;
            color: #cbd5e1;
            transition: color 0.3s ease;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .curr-acc-item.active .curr-acc-num {
            color: #ab0e00;
        }

        .curr-acc-title {
            font-size: 0.95rem;
            font-weight: 850;
            color: #475569;
            transition: color 0.3s ease;
            line-height: 1.4;
        }

        .curr-acc-item.active .curr-acc-title {
            color: #0f172a;
        }

        .curr-acc-header-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .curr-acc-badge {
            font-size: 0.72rem;
            font-weight: 800;
            color: #475569;
            background: #e2e8f0;
            padding: 4px 10px;
            border-radius: 8px;
            text-transform: uppercase;
            letter-spacing: 0.02em;
            white-space: nowrap;
        }

        .curr-acc-item.active .curr-acc-badge {
            background: rgba(171, 14, 0, 0.08);
            color: #ab0e00;
        }

        .curr-acc-arrow {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            transition: transform 0.3s ease;
        }

        .curr-acc-item.active .curr-acc-arrow {
            transform: rotate(180deg);
            color: #ab0e00;
        }

        .curr-acc-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .curr-acc-content-inner {
            padding: 0 24px 24px 62px;
            border-top: 1px solid #f1f5f9;
            padding-top: 20px;
            background-color: #ffffff;
            border-bottom-left-radius: 16px;
            border-bottom-right-radius: 16px;
        }

        .curr-topics-list {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .curr-topics-list li {
            font-size: 0.9rem;
            color: #334155;
            line-height: 1.6;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .curr-topics-list li::before {
            content: '•';
            color: #ab0e00;
            font-weight: 900;
            font-size: 1.1rem;
            line-height: 1.2;
        }

        .curr-outcomes {
            margin-top: 36px;
            background: linear-gradient(135deg, #ffffff 0%, #fff8f8 100%);
            border-radius: 16px;
            padding: 28px;
            border: 1.5px solid rgba(171, 14, 0, 0.15);
            box-shadow: 0 10px 30px rgba(171, 14, 0, 0.03);
            position: relative;
            overflow: hidden;
        }

        .curr-outcomes::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 4px;
            background: #ab0e00;
        }

        .curr-outcomes-title {
            font-size: 0.95rem;
            font-weight: 900;
            color: #ab0e00;
            margin: 0 0 16px 0;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            display: flex;
            align-items: center;
            gap: 8px;
            padding-left: 10px;
        }

        .curr-outcomes-list {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .curr-outcomes-list li {
            font-size: 0.9rem;
            color: #334155;
            line-height: 1.5;
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .curr-outcomes-list li svg {
            color: #10b981;
            flex-shrink: 0;
            margin-top: 3px;
        }

        /* ── IDEAS AI Platform Section ── */
        .ai-grid {
            display: grid;
            grid-template-columns: 4.2fr 5.8fr;
            gap: 100px;
            align-items: center;
        }

        .ai-features-list {
            margin: 0 0 36px 0;
            padding: 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .ai-features-list li {
            display: flex;
            gap: 16px;
        }

        .ai-feat-icon {
            width: 26px;
            height: 26px;
            background: rgba(171, 14, 0, 0.08);
            color: #ab0e00;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .ai-feat-text {
            font-size: 0.95rem;
            line-height: 1.6;
            color: #475569;
        }

        .ai-feat-text strong {
            color: #0f172a;
        }

        /* Overlapping AI Platform Screens */
        .ai-screens-container {
            position: relative;
            width: 100%;
            max-width: 720px;
            height: 480px;
            margin: 0 auto;
        }

        .ai-screen-wrapper {
            position: absolute;
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Floating animations on wrappers */
        .wrap-login {
            width: 48%;
            left: -5%;
            bottom: 6%;
            z-index: 2;
            animation: float-screen-1 8s ease-in-out infinite;
        }

        .wrap-main {
            width: 82%;
            left: 9%;
            top: 6%;
            z-index: 1;
            animation: float-screen-2 10s ease-in-out infinite;
        }

        .wrap-sub {
            width: 48%;
            right: -5%;
            bottom: 2%;
            z-index: 3;
            animation: float-screen-3 7s ease-in-out infinite;
        }

        .ai-screen-card {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            background: #ffffff;
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .ai-screen-card img {
            display: block;
            width: 100%;
            height: auto;
        }

        /* Initial static transforms for perspective */
        .card-login {
            transform: perspective(1200px) rotateX(6deg) rotateY(12deg) rotateZ(3deg);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.14);
        }

        .card-main {
            transform: perspective(1200px) rotateX(8deg) rotateY(-4deg) rotateZ(-1deg);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.12);
        }

        .card-sub {
            transform: perspective(1200px) rotateX(10deg) rotateY(-15deg) rotateZ(-4deg);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        }

        /* Hover interactions */
        .ai-screens-container:hover .wrap-login {
            transform: translate(-10px, 15px);
        }
        .ai-screens-container:hover .card-login {
            transform: perspective(1200px) rotateX(2deg) rotateY(4deg) rotateZ(1deg) scale(1.03);
            box-shadow: 0 30px 65px rgba(0, 0, 0, 0.2);
        }

        .ai-screens-container:hover .wrap-main {
            transform: translateY(-15px);
        }
        .ai-screens-container:hover .card-main {
            transform: perspective(1200px) rotateX(2deg) rotateY(-1deg) rotateZ(0deg) scale(1.02);
            box-shadow: 0 35px 70px rgba(0, 0, 0, 0.18);
        }

        .ai-screens-container:hover .wrap-sub {
            transform: translate(15px, -15px);
        }
        .ai-screens-container:hover .card-sub {
            transform: perspective(1200px) rotateX(2deg) rotateY(-4deg) rotateZ(-1deg) scale(1.05);
            box-shadow: 0 45px 85px rgba(0, 0, 0, 0.28);
        }

        @keyframes float-screen-1 {
            0% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
            100% { transform: translateY(0); }
        }
        @keyframes float-screen-2 {
            0% { transform: translateY(0); }
            50% { transform: translateY(-18px); }
            100% { transform: translateY(0); }
        }
        @keyframes float-screen-3 {
            0% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
            100% { transform: translateY(0); }
        }

        /* Responsive scale */
        @media (max-width: 991px) {
            .ai-screens-container {
                height: 420px;
            }
        }
        @media (max-width: 768px) {
            .ai-screens-container {
                height: 320px;
            }
        }
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.15);
        }

        .ai-screens-container:hover .card-sub {
            transform: perspective(1000px) rotateY(1deg) rotateX(-1deg) rotateZ(0deg) scale(1.05) translate(10px, -10px);
            box-shadow: 0 35px 75px rgba(0, 0, 0, 0.25);
        }

        /* Responsive scale */
        @media (max-width: 768px) {
            .ai-screens-container {
                height: 360px;
            }
        }

        /* ── Faculty Section ────────────────── */
        .fac-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .fac-card {
            background: #ffffff;
            border-radius: 24px;
            border: 1.5px solid rgba(15, 23, 42, 0.04);
            padding: 40px 32px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.01);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .fac-card:hover {
            transform: translateY(-8px);
            border-color: rgba(171, 14, 0, 0.15);
            box-shadow: 0 20px 45px rgba(171, 14, 0, 0.08);
        }

        .fac-avatar-wrap {
            position: relative;
            margin-bottom: 24px;
        }

        .fac-avatar-wrap::before {
            content: '';
            position: absolute;
            top: -6px;
            left: -6px;
            right: -6px;
            bottom: -6px;
            border: 2px solid rgba(171, 14, 0, 0.15);
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .fac-card:hover .fac-avatar-wrap::before {
            border-color: #ab0e00;
            transform: scale(1.05);
        }

        .fac-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #ffffff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
            transition: all 0.3s ease;
        }

        .fac-card:hover .fac-avatar {
            transform: scale(1.03);
        }

        .fac-name {
            font-size: 1.15rem;
            font-weight: 850;
            color: #0f172a;
            margin: 0 0 6px 0;
        }

        .fac-role {
            font-size: 0.78rem;
            font-weight: 800;
            color: #ab0e00;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 16px;
            background: rgba(171, 14, 0, 0.05);
            padding: 4px 12px;
            border-radius: 100px;
        }

        .fac-bio {
            font-size: 0.88rem;
            line-height: 1.55;
            color: #475569;
            margin: 0 0 20px 0;
            text-align: justify;
        }

        .fac-link {
            font-size: 0.82rem;
            font-weight: 700;
            color: #475569;
            text-decoration: none !important;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: auto;
            transition: color 0.2s ease;
        }

        .fac-link:hover {
            color: #ab0e00;
        }

        /* ── Certificate Section ────────────── */
        .cert-wrap {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #cbd5e1;
            box-shadow: 0 10px 40px rgba(0,0,0,0.015);
            padding: 50px;
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 60px;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        .cert-wrap::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #ab0e00, #ff6b6b);
        }

        .cert-mockup {
            background: #faf8f5;
            border-radius: 20px;
            border: 10px solid #ffffff;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            padding: 30px;
            aspect-ratio: 1.414;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            position: relative;
            background-image: radial-gradient(#cbd5e1 1px, transparent 1.5px);
            background-size: 16px 16px;
            transform: perspective(1000px) rotateY(-8deg) rotateX(4deg);
            transform-style: preserve-3d;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 2;
        }

        .cert-wrap:hover .cert-mockup {
            transform: perspective(1000px) rotateY(0deg) rotateX(0deg) scale(1.03);
            box-shadow: 0 25px 50px rgba(171, 14, 0, 0.1);
        }

        .cert-mockup-border {
            position: absolute;
            top: 8px;
            left: 8px;
            right: 8px;
            bottom: 8px;
            border: 2px solid #cbd5e1;
            border-radius: 12px;
            pointer-events: none;
        }

        .cert-logo {
            font-size: 0.95rem;
            font-weight: 850;
            color: #0f172a;
            letter-spacing: 0.05em;
        }

        .cert-main-text h5 {
            font-size: 0.65rem;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin: 0 0 10px 0;
        }

        .cert-main-text h4 {
            font-size: 1.1rem;
            font-weight: 900;
            color: #ab0e00;
            margin: 0 0 8px 0;
        }

        .cert-main-text p {
            font-size: 0.68rem;
            color: #475569;
            margin: 0 auto;
            max-width: 260px;
            line-height: 1.4;
        }

        .cert-signatures {
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
        }

        .cert-sig-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
        }

        .cert-sig-line {
            width: 80px;
            height: 1px;
            background: #94a3b8;
        }

        .cert-sig-lbl {
            font-size: 0.55rem;
            color: #94a3b8;
            font-weight: 600;
        }

        /* ── Standard FAQ & Form (Aesthetic Style Upgrades) ── */
        .ble-decor-shape {
            z-index: 1;
        }

        .faq-accordion {
            max-width: 800px;
            margin: 40px auto 0;
            position: relative;
            z-index: 2;
        }

        .faq-item {
            border: 1.5px solid rgba(15, 23, 42, 0.05) !important;
            background: #ffffff !important;
            border-radius: 16px;
            margin-bottom: 16px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-left: 4px solid transparent !important;
            color: #475569 !important;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.005) !important;
        }

        .faq-item:hover {
            border-color: rgba(171, 14, 0, 0.15) !important;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.03) !important;
        }

        .faq-item.active {
            border-left: 4px solid #ab0e00 !important;
            border-color: rgba(171, 14, 0, 0.15) !important;
            background: #ffffff !important;
            box-shadow: 0 12px 25px rgba(171, 14, 0, 0.05) !important;
        }

        .faq-trigger {
            width: 100%;
            text-align: left;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: none;
            border: none;
            padding: 22px 24px;
            cursor: pointer;
            font-weight: 750;
            color: #0f172a !important;
            font-size: 1.02rem;
            outline: none;
        }

        .faq-arrow {
            font-size: 0.8rem;
            color: #64748b;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-arrow {
            transform: rotate(180deg);
            color: #ab0e00 !important;
        }

        .faq-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 0.92rem;
            color: #475569 !important;
            line-height: 1.65;
        }

        .faq-content {
            padding: 0 24px 24px;
            border-top: 1px solid #f1f5f9 !important;
            padding-top: 16px;
        }

        @keyframes float-slow {
            0% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(5deg); }
            100% { transform: translateY(0) rotate(0deg); }
        }

        /* ── Responsive Rules ───────────────── */
        @media (max-width: 991px) {
            .ble-section {
                padding: 70px 20px;
            }

            .ble-hero-grid {
                grid-template-columns: 1fr;
                gap: 50px;
                text-align: center;
            }

            .ble-hero-tag,
            .ble-hero-promo {
                justify-content: center;
                margin-left: auto;
                margin-right: auto;
            }

            .ble-hero-features {
                display: none;
            }

            .ble-hero-meta-row {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 12px;
            }

            .ble-hero-actions {
                justify-content: center;
            }

            .ble-hero-visual {
                order: 1;
            }

            .ble-db-grid {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 30px;
            }

            .ble-db-info-row {
                grid-template-columns: repeat(3, 1fr);
                gap: 16px;
                justify-content: center;
            }

            .ble-db-actions {
                justify-content: center;
            }

            .ble-db-image-container {
                max-width: 480px;
                margin: 0 auto;
            }

            .pain-split-layout {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .pain-left-col {
                padding-right: 0;
                text-align: center;
            }

            .comp-grid,
            .audience-grid,
            .fac-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .curr-layout {
                flex-direction: column;
                gap: 24px;
            }

            .curr-sidebar {
                width: 100% !important;
                flex-direction: row !important;
                overflow-x: auto !important;
                padding-bottom: 8px !important;
                scroll-snap-type: x mandatory !important;
                position: relative !important;
                top: auto !important;
                z-index: 10 !important;
                display: flex !important;
                gap: 12px !important;
                scrollbar-width: none !important;
            }

            .curr-sidebar::-webkit-scrollbar {
                display: none !important;
            }

            .curr-tab {
                min-width: 250px;
                scroll-snap-align: start;
                border-left: 1px solid #cbd5e1;
                border-bottom: 4px solid transparent;
                flex-shrink: 0 !important;
            }

            .curr-tab.active {
                border-bottom-color: #ab0e00;
                border-left-color: #cbd5e1;
            }

            .curr-details {
                width: 100%;
                padding: 24px;
            }

            .ai-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .cert-wrap {
                grid-template-columns: 1fr;
                gap: 40px;
                padding: 30px;
            }
        }

        /* Slide Dots indicators on mobile */
        .mobile-dots-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin: 20px 0 10px 0;
            width: 100%;
        }

        .mobile-dots-container .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #cbd5e1;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            display: inline-block;
        }

        .mobile-dots-container .dot.active {
            background: #ab0e00;
            width: 22px;
            border-radius: 4px;
        }

        @media (max-width: 768px) {
            /* Enable native horizontal scroll snap for Core Competencies & Instructors */
            .comp-grid,
            .fac-grid {
                display: flex !important;
                flex-direction: row !important;
                overflow-x: auto !important;
                scroll-snap-type: x mandatory !important;
                gap: 16px !important;
                padding: 10px 4px 20px 4px !important;
                scrollbar-width: none !important;
                -ms-overflow-style: none !important;
            }
            .comp-grid::-webkit-scrollbar,
            .fac-grid::-webkit-scrollbar {
                display: none !important;
            }
            .comp-card,
            .fac-card {
                flex: 0 0 82% !important;
                width: 82% !important;
                max-width: 82% !important;
                scroll-snap-align: center !important;
                box-sizing: border-box !important;
            }

            /* Separator border lines in grid resets */
            .ble-db-info-col::after {
                display: none !important;
            }
            .ble-db-info-row {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 16px !important;
                padding: 16px 0 !important;
                width: 100% !important;
                box-sizing: border-box !important;
            }
            .ble-db-info-col {
                padding: 12px 10px !important;
                text-align: center !important;
            }
            .ble-db-info-col:nth-child(1),
            .ble-db-info-col:nth-child(2) {
                border-bottom: 1px dashed rgba(255, 255, 255, 0.25) !important;
            }
            .ble-db-info-col:nth-child(1),
            .ble-db-info-col:nth-child(3) {
                border-right: 1px dashed rgba(255, 255, 255, 0.25) !important;
            }
            .ble-db-info-col:last-child {
                padding-right: 10px !important;
            }

            /* Prevent overflow on mobile layouts */
            .ble-details-banner {
                padding: 45px 16px !important;
                box-sizing: border-box !important;
            }
            .ble-section {
                padding: 50px 16px !important;
                box-sizing: border-box !important;
            }
            .ble-hero {
                padding-top: 130px !important;
                padding-bottom: 60px !important;
                box-sizing: border-box !important;
            }
            .ble-container {
                padding: 0 !important;
                box-sizing: border-box !important;
            }

            /* Responsive typography scale */
            .ble-section-title {
                font-size: clamp(1.45rem, 6.5vw, 1.85rem) !important;
                line-height: 1.35 !important;
            }

            /* Floating button overlap fix */
            .db-floating-badge {
                bottom: 105px !important;
            }

            /* Hide Pain Points timeline vertical connector line */
            .pain-right-col::before {
                display: none !important;
            }

            /* Hero progress card - smaller & left-aligned text */
            .db-module-item {
                text-align: left !important;
                justify-content: flex-start !important;
                padding: 10px 14px !important;
                gap: 10px !important;
            }
            .db-module-title {
                text-align: left !important;
                font-size: 0.72rem !important;
                line-height: 1.3 !important;
            }
            .db-active-pulse {
                font-size: 0.58rem !important;
                padding: 2px 7px !important;
            }

            /* Curriculum accordion header scaling */
            .curr-acc-title {
                font-size: 0.82rem !important;
                line-height: 1.3 !important;
            }
            .curr-acc-num {
                font-size: 1.1rem !important;
            }
            .curr-acc-badge {
                font-size: 0.65rem !important;
                padding: 3px 8px !important;
            }

            /* FAQ full-height fix */
            .faq-item.active .faq-body {
                max-height: 800px !important;
            }

            /* Centering single button in AI Platform section */
            .ai-content {
                text-align: center !important;
                display: flex !important;
                flex-direction: column !important;
                align-items: center !important;
            }
            .ai-features-list {
                text-align: left !important;
                align-self: stretch !important;
            }

            /* FAQ body text left-aligned on mobile */
            .faq-body,
            .faq-content {
                text-align: left !important;
            }

            /* Curriculum accordion body full-height fix */
            .curr-acc-item.active .curr-acc-content {
                max-height: 800px !important;
            }

            /* Hero highlights grid positioning and alignment on mobile */
            .ble-hero-meta-row {
                display: flex !important;
                flex-direction: column !important;
                gap: 12px !important;
                margin-top: 24px !important;
                margin-bottom: 30px !important;
                width: 100% !important;
                max-width: 100% !important;
                box-sizing: border-box !important;
            }
            .ble-hero-meta-item {
                display: flex !important;
                flex-direction: row !important;
                align-items: center !important;
                text-align: left !important;
                gap: 14px !important;
                background: #ffffff !important;
                border: 1px solid rgba(15, 23, 42, 0.06) !important;
                border-radius: 12px !important;
                padding: 12px 16px !important;
                box-shadow: 0 4px 15px rgba(15, 23, 42, 0.015) !important;
                box-sizing: border-box !important;
                width: 100% !important;
            }
            .ble-hero-meta-item::after {
                display: none !important;
            }
            .ble-hero-meta-item svg {
                width: 16px !important;
                height: 16px !important;
                color: #ab0e00 !important;
                background: rgba(171, 14, 0, 0.06) !important;
                padding: 8px !important;
                border-radius: 50% !important;
                flex-shrink: 0 !important;
            }
            .ble-hero-meta-item span {
                display: flex !important;
                flex-direction: column !important;
                font-size: 0.68rem !important;
                color: #64748b !important;
                line-height: 1.3 !important;
                text-align: left !important;
            }
            .ble-hero-meta-item strong {
                font-size: 0.8rem !important;
                color: #0f172a !important;
                font-weight: 800 !important;
                margin-top: 1px !important;
            }

            /* AI platform 3 screens mockup mobile scale up overrides */
            .wrap-sub {
                width: 54% !important;
                right: -6% !important;
                bottom: 2% !important;
            }
            .wrap-login {
                width: 52% !important;
                left: -8% !important;
                bottom: 5% !important;
            }

            /* Target Audience scroll-snap slider on mobile */
            .audience-grid {
                display: flex !important;
                flex-direction: row !important;
                overflow-x: auto !important;
                scroll-snap-type: x mandatory !important;
                gap: 16px !important;
                padding: 10px 16px 20px 16px !important;
                scrollbar-width: none !important;
                -ms-overflow-style: none !important;
                box-sizing: border-box !important;
            }
            .audience-card {
                flex: 0 0 82% !important;
                width: 82% !important;
                max-width: 82% !important;
                scroll-snap-align: center !important;
                box-sizing: border-box !important;
                margin-bottom: 0 !important;
            }
            .aud-dots {
                display: flex !important;
            }
        }

        @media (max-width: 640px) {
            .ble-db-info-row {
                grid-template-columns: repeat(2, 1fr);
            }

            /* Details banner buttons side-by-side */
            .ble-db-actions {
                display: flex !important;
                flex-direction: row !important;
                justify-content: center !important;
                gap: 8px !important;
                width: 100% !important;
                box-sizing: border-box !important;
            }

            .ble-db-actions button,
            .ble-db-actions a {
                flex: 1 !important;
                width: auto !important;
                padding: 11px 4px !important;
                font-size: 0.8rem !important;
                white-space: nowrap !important;
                box-sizing: border-box !important;
            }

            .curr-tab {
                min-width: 200px;
                padding: 16px;
            }

            .curr-acc-header {
                padding: 16px;
            }

            .curr-acc-content-inner {
                padding: 0 16px 16px 40px;
            }

            .curr-panel-header {
                flex-direction: column;
                align-items: stretch;
                gap: 16px;
            }

            .curr-panel-title-wrap {
                max-width: 100%;
            }

            .curr-toggle-all-btn {
                align-self: flex-start;
            }

            /* Hero buttons side-by-side */
            .ble-hero-actions {
                display: flex !important;
                flex-direction: row !important;
                justify-content: center !important;
                gap: 8px !important;
                width: 100% !important;
                box-sizing: border-box !important;
            }

            .ble-hero-actions .ble-btn {
                flex: 1 !important;
                width: auto !important;
                padding: 11px 4px !important;
                font-size: 0.8rem !important;
                white-space: nowrap !important;
                box-sizing: border-box !important;
            }

            .db-floating-badge {
                display: none;
            }
        }

        /* Prevent form card stretching and style bottom disclaimer */
        .cta-section .cta-inner {
            align-items: start !important;
        }
        .cta-form-wrapper {
            height: auto !important;
            min-height: auto !important;
            padding-bottom: 30px !important;
        }

        /* Zoom Lightbox Modal */
        .ble-lightbox {
            position: fixed;
            z-index: 99999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.96);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 20px;
            box-sizing: border-box;
        }
        .ble-lightbox.active {
            opacity: 1;
            pointer-events: auto;
        }
        .ble-lightbox-img {
            max-width: 95%;
            max-height: 85vh;
            border-radius: 12px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            transform: scale(0.96);
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .ble-lightbox.active .ble-lightbox-img {
            transform: scale(1);
        }
        .ble-lightbox-close {
            position: absolute;
            top: 20px;
            right: 25px;
            color: #ffffff;
            font-size: 38px;
            font-weight: 300;
            cursor: pointer;
            transition: color 0.2s;
            line-height: 1;
        }
        .ble-lightbox-close:hover {
            color: #ab0e00;
        }

        /* ─── Premium July Promo Modal Styles ─── */
        .ble-pmodal {
            position: fixed;
            z-index: 99999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            padding: 16px;
        }
        .ble-pmodal-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }
        .ble-pmodal-container {
            position: relative;
            background: #ffffff;
            border-radius: 24px;
            width: 100%;
            max-width: 440px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            padding: 32px 24px;
            box-sizing: border-box;
            animation: pmodal-pop 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
            overflow: hidden;
            z-index: 2;
        }
        @keyframes pmodal-pop {
            from { opacity: 0; transform: scale(0.9) translateY(20px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }
        .ble-pmodal-close {
            position: absolute;
            top: 16px;
            right: 18px;
            background: none;
            border: none;
            font-size: 26px;
            color: #64748b;
            cursor: pointer;
            line-height: 1;
            transition: color 0.2s;
        }
        .ble-pmodal-close:hover {
            color: #ab0e00;
        }
        .ble-pmodal-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .ble-pmodal-logos {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 8px;
        }
        .pmodal-logo-ideas {
            height: 24px;
            width: auto;
        }
        .pmodal-logo-divider {
            width: 1px;
            height: 16px;
            background: #cbd5e1;
        }
        .pmodal-partner-text {
            font-size: 0.65rem;
            font-weight: 800;
            color: #64748b;
            letter-spacing: 0.05em;
        }
        .ble-pmodal-divider {
            width: 100%;
            border-top: 1px dashed rgba(15, 23, 42, 0.08);
            margin: 14px 0 20px 0;
        }
        .ble-pmodal-gold-badge {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #dfa375 0%, #a77045 50%, #dfa375 100%);
            border: 4px solid #ffffff;
            box-shadow: 0 8px 24px rgba(167, 112, 69, 0.25);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            margin-bottom: 22px;
        }
        .ble-pmodal-gold-badge .badge-label {
            font-size: 0.58rem;
            font-weight: 800;
            letter-spacing: 0.05em;
        }
        .ble-pmodal-gold-badge .badge-value {
            font-size: 1.65rem;
            font-weight: 900;
            line-height: 1.1;
        }
        .ble-pmodal-serif-title {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 1.55rem;
            font-style: italic;
            color: #a77045;
            margin: 0 0 10px 0;
            font-weight: 500;
        }
        .ble-pmodal-main-title {
            font-size: 1.1rem;
            font-weight: 850;
            color: #0f172a;
            line-height: 1.35;
            margin: 0 0 14px 0;
        }
        .ble-pmodal-desc {
            font-size: 0.8rem;
            line-height: 1.5;
            color: #475569;
            margin: 0 0 24px 0;
        }
        .ble-pmodal-desc strong {
            color: #ab0e00;
            font-weight: 800;
        }
        .ble-pmodal-action-wrapper {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .ble-pmodal-btn {
            width: 100%;
            background: #ab0e00;
            color: #ffffff !important;
            border: none;
            border-radius: 100px;
            padding: 14px;
            font-size: 0.92rem;
            font-weight: 800;
            cursor: pointer;
            box-shadow: 0 8px 25px rgba(171, 14, 0, 0.2) ;
            transition: all 0.3s ease;
            margin-bottom: 12px;
        }
        .ble-pmodal-btn:hover {
            transform: translateY(-2px);
            background: #900c00;
            box-shadow: 0 12px 30px rgba(171, 14, 0, 0.3);
        }
        .ble-pmodal-link {
            font-size: 0.8rem;
            color: #a77045 !important;
            text-decoration: underline !important;
            font-weight: 700;
            transition: color 0.2s;
        }
        .ble-pmodal-link:hover {
            color: #ab0e00 !important;
        }
        
        /* State 2: Form Styles */
        .pmodal-form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .pmodal-input {
            width: 100%;
            padding: 12px 18px;
            border: 1px solid #cbd5e1;
            border-radius: 100px;
            font-size: 0.85rem;
            box-sizing: border-box;
            outline: none;
            transition: border-color 0.2s;
            text-align: center;
        }
        .pmodal-input:focus {
            border-color: #ab0e00;
        }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Site Header -->
    <?php get_template_part('shared-header'); ?>

    <!-- MAIN SECTION -->
    <main class="ideas_main" style="gap:0; background:none;">

        <!-- 1. HERO SECTION -->
        <section class="ble-section ble-hero">
            <div class="ble-container">
                <div class="ble-hero-grid">
                    <!-- Left: Title and Key Info -->
                    <div class="ble-hero-content">
                        <div class="ble-hero-tag">
                            <span></span> Swiss UMEF Academic Partner
                        </div>
                        <h1 class="ble-hero-title">Business Leadership <span class="ble-gradient-text">Essentials</span></h1>
                        <p class="ble-hero-desc">Giải quyết vấn đề lãnh đạo và quản lý đội ngũ trong doanh nghiệp của bạn. Khóa học giúp nhà quản lý xây dựng tư duy lãnh đạo hiện đại, phát triển đội ngũ, tạo văn hóa làm việc tích cực và nâng cao hiệu suất tổ chức thông qua ba học phần cốt lõi của Swiss UMEF.</p>

                        <!-- Sleek Inline Highlight Grid (2x2) -->
                        <div class="ble-hero-meta-row">
                            <div class="ble-hero-meta-item">
                                <div class="ble-meta-icon-wrapper">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c0 2 2 3 6 3s6-1 6-3v-5"/></svg>
                                </div>
                                <span>Chứng nhận<strong>Swiss UMEF (Thụy Sĩ)</strong></span>
                            </div>
                            <div class="ble-hero-meta-item">
                                <div class="ble-meta-icon-wrapper">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
                                </div>
                                <span>Phương pháp<strong>Thực chiến &amp; Case-study</strong></span>
                            </div>
                            <div class="ble-hero-meta-item">
                                <div class="ble-meta-icon-wrapper">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 11l2 2 4-4"/></svg>
                                </div>
                                <span>Đầu ra<strong>8 năng lực quản lý cốt lõi</strong></span>
                            </div>
                        </div>

                        <!-- Special Promo Box -->
                        <div class="ble-hero-promo">
                            <div class="ble-hero-promo-icon">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M20 12v10H4V12M2 7h20v5H2zM12 22V7M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7zM12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg>
                            </div>
                            <div class="ble-hero-promo-text"><strong>Ưu đãi duy nhất tháng 7:</strong> Học miễn phí toàn khóa học (Nhận học bổng Learning Grant 100%).</div>
                        </div>

                        <!-- Action buttons -->
                        <div class="ble-hero-actions">
                            <button onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('ble-hero'); }" class="ble-btn">Đăng ký ngay</button>
                            <a href="#curriculum" class="ble-btn ble-btn-outline">Xem chương trình</a>
                        </div>
                    </div>

                    <!-- Right: Visual Portal Dashboard Mockup -->
                    <div class="ble-hero-visual">
                        <!-- Floating Badges -->
                        <div class="db-floating-badge badge-1">
                            <span class="db-float-icon">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6M18 9h1.5a2.5 2.5 0 0 0 0-5H18M4 22h16M10 14.66V17c0 .55-.45 1-1 1H4v2h16v-2h-5c-.55 0-1-.45-1-1v-2.34M12 2a7 7 0 0 0-7 7c0 2.5 1.3 4.7 3.3 6h7.4c2-1.3 3.3-3.5 3.3-6a7 7 0 0 0-7-7z"/></svg>
                            </span>
                            <div class="db-float-text">
                                <h6>Swiss Quality</h6>
                                <span>100% Standardized</span>
                            </div>
                        </div>

                        <div class="db-floating-badge badge-2">
                            <span class="db-float-icon">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M9 9h6v6H9zM9 1v3M15 1v3M9 20v3M15 20v3M20 9h3M20 15h3M1 9h3M1 15h3"/></svg>
                            </span>
                            <div class="db-float-text">
                                <h6>IDEAS AI Chat</h6>
                                <span>Academic Support</span>
                            </div>
                        </div>

                        <!-- Main Portal Box -->
                        <div class="ble-dashboard-preview">
                            <div class="db-header">
                                <div class="db-avatar">YN</div>
                                <div class="db-user-info">
                                    <h5>Your Name (Học viên)</h5>
                                    <span>Lớp: BLE-K2026</span>
                                </div>
                            </div>

                            <div class="db-progress-card">
                                <h6>Tiến độ học tập</h6>
                                <div class="db-bar-container">
                                    <div class="db-bar-fill"></div>
                                </div>
                                <div class="db-progress-meta">
                                    <span>75% Hoàn thành</span>
                                </div>
                            </div>

                            <div class="db-module-list">
                                <div class="db-module-item">
                                    <div class="db-module-icon">
                                        <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                    </div>
                                    <span class="db-module-title">Leadership Development (Đã xong)</span>
                                </div>
                                <div class="db-module-item">
                                    <div class="db-module-icon">
                                        <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                    </div>
                                    <span class="db-module-title">Organizational Behaviour (Đã xong)</span>
                                </div>
                                <div class="db-module-item active">
                                    <div class="db-module-icon pending">
                                        <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                                    </div>
                                    <span class="db-module-title">Human Capital Management</span>
                                    <span class="db-active-pulse">Đang học</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 1.5. COURSE DETAILS BANNER (Solid Red Cask.vn Style Layout) -->
        <section class="ble-details-banner">
            <div class="ble-container">
                <div class="ble-db-grid">
                    <!-- Left: Text content & details -->
                    <div class="ble-db-content">
                        <h2 class="ble-db-title">Chương trình Business Leadership Essentials</h2>
                        <p class="ble-db-desc">Với 3 học phần chuyên sâu chuyển giao học thuật Thụy Sĩ, chương trình trang bị toàn diện 8 năng lực lãnh đạo cốt lõi cho quản lý cấp trung và nhân sự tiềm năng. Hệ thống kiến thức chuẩn hóa kết hợp cùng trợ lý học tập AI hỗ trợ 24/7.</p>
                        
                        <div class="ble-db-info-row">
                            <div class="ble-db-info-col">
                                <span class="ble-db-info-label">Khai giảng</span>
                                <span class="ble-db-info-value">Thường xuyên</span>
                            </div>
                            <div class="ble-db-info-col">
                                <span class="ble-db-info-label">Thời lượng</span>
                                <span class="ble-db-info-value">3 - 4 tháng</span>
                            </div>
                            <div class="ble-db-info-col">
                                <span class="ble-db-info-label">Lịch học</span>
                                <span class="ble-db-info-value">Linh hoạt từ xa</span>
                            </div>
                            <div class="ble-db-info-col">
                                <span class="ble-db-info-label">Giờ học</span>
                                <span class="ble-db-info-value">Tự chọn 24/7</span>
                            </div>
                        </div>
                        
                        <div class="ble-db-actions">
                            <button onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('ble-details-consult'); }" class="ble-btn-white">Đăng Ký Tư Vấn</button>
                            <a href="tel:02822442244" class="ble-btn-white-outline">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                Hotline: 028 2244 2244
                            </a>
                        </div>
                    </div>

                    <!-- Right: Large image card instead of small video -->
                    <div class="ble-db-video">
                        <div class="ble-db-image-container" onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('ble-details-img'); }">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/07/7.webp" alt="Business Leadership Essentials program visual">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. PAIN POINTS SECTION (Warm Cream Background, Editorial Split Columns) -->
        <section class="ble-section bg-soft-cream">
            <!-- Background Glow Orbs -->
            <div class="ble-glow-orb ble-glow-orb-primary" style="top: 10%; left: -10%;"></div>
            <div class="ble-glow-orb ble-glow-orb-gold" style="bottom: 10%; right: -15%;"></div>
            
            <!-- Floating Decorative SVGs -->
            <div class="ble-decor-shape" style="position: absolute; top: 10%; right: 5%; opacity: 0.07; animation: float-slow 15s ease-in-out infinite; pointer-events: none;">
                <svg width="120" height="120" viewBox="0 0 120 120" fill="none" stroke="#ab0e00" stroke-width="1.5"><circle cx="60" cy="60" r="55" stroke-dasharray="6 6"/><circle cx="60" cy="60" r="35"/><circle cx="60" cy="60" r="15" fill="#ab0e00" opacity="0.1"/></svg>
            </div>
            <div class="ble-decor-shape" style="position: absolute; bottom: 15%; left: 3%; opacity: 0.08; animation: float-slow 12s ease-in-out infinite; pointer-events: none;">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" stroke="#ab0e00" stroke-width="2" stroke-linecap="round"><path d="M30 10v40M10 30h40"/><circle cx="10" cy="10" r="2" fill="#ab0e00"/><circle cx="50" cy="50" r="2" fill="#ab0e00"/></svg>
            </div>

            <div class="ble-container">
                <div class="pain-split-layout">
                    <!-- Left Column: Big Editorial Heading with Statistics Card -->
                    <div class="pain-left-col">
                        <span class="ble-section-tag">
                            <span class="dot"></span> Thách thức thực tế
                        </span>
                        <h2 class="ble-section-title" style="text-align: left;">Đảm nhận vai trò quản lý,<br><span class="ble-text-red">năng lực chuyên môn thôi là chưa đủ</span></h2>
                        
                        <!-- Wow Stat Card -->
                        <div class="pain-stat-card">
                            <div class="pain-stat-number-box">
                                <span class="pain-stat-number">85%</span>
                                <span class="pain-stat-label">Quản lý</span>
                            </div>
                            <div class="pain-stat-info">
                                <h5>Gặp khó khăn khi chuyển đổi vai trò</h5>
                                <p>Tỷ lệ quản lý mới được bổ nhiệm gặp rào cản lớn trong việc chuyển từ làm chuyên môn sang điều hành và quản trị nhân sự.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Numbered List Items -->
                    <div class="pain-right-col">
                        <!-- Item 1 -->
                        <div class="pain-list-item">
                            <div class="pain-number">01</div>
                            <div class="pain-info">
                                <h4>Chưa được đào tạo lãnh đạo</h4>
                                <p>Được bổ nhiệm làm quản lý nhưng chưa từng được đào tạo bài bản về năng lực quản lý và tư duy lãnh đạo.</p>
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div class="pain-list-item">
                            <div class="pain-number">02</div>
                            <div class="pain-info">
                                <h4>Chưa xây dựng được uy tín</h4>
                                <p>Chưa xây dựng được uy tín cá nhân và niềm tin để đội ngũ sẵn sàng đồng hành, hợp tác tối đa.</p>
                            </div>
                        </div>

                        <!-- Item 3 -->
                        <div class="pain-list-item">
                            <div class="pain-number">03</div>
                            <div class="pain-info">
                                <h4>Chưa biết cách coaching</h4>
                                <p>Gặp khó khăn trong việc tạo động lực, phản hồi xây dựng và kèm cặp (coaching) để phát triển nhân sự.</p>
                            </div>
                        </div>

                        <!-- Item 4 -->
                        <div class="pain-list-item">
                            <div class="pain-number">04</div>
                            <div class="pain-info">
                                <h4>Hiệu suất chưa đạt kỳ vọng</h4>
                                <p>Đội ngũ thiếu sự gắn kết chặt chẽ, phối hợp rời rạc dẫn đến kết quả và hiệu suất công việc không đạt mục tiêu đề ra.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. CORE COMPETENCIES SECTION (White Background, Accent Border Top) -->
        <section class="ble-section bg-white">
            <!-- Background Glow Orbs -->
            <div class="ble-glow-orb ble-glow-orb-primary" style="top: 20%; right: -10%;"></div>
            <div class="ble-glow-orb ble-glow-orb-gold" style="bottom: 10%; left: -15%;"></div>
            
            <!-- Floating Decorative SVGs -->
            <div class="ble-decor-shape" style="position: absolute; top: 15%; left: 4%; opacity: 0.08; animation: float-slow 14s ease-in-out infinite; pointer-events: none;">
                <svg width="80" height="24" viewBox="0 0 80 24" fill="none" stroke="#ab0e00" stroke-width="2" stroke-linecap="round"><path d="M0 12 Q 10 2, 20 12 T 40 12 T 60 12 T 80 12"/></svg>
            </div>
            <div class="ble-decor-shape" style="position: absolute; bottom: 12%; right: 4%; opacity: 0.07; animation: float-slow 20s ease-in-out infinite; pointer-events: none;">
                <svg width="100" height="100" viewBox="0 0 100 100" fill="none" stroke="#ab0e00" stroke-width="1.5"><circle cx="10" cy="10" r="2"/><circle cx="30" cy="10" r="2"/><circle cx="50" cy="10" r="2"/><circle cx="70" cy="10" r="2"/><circle cx="90" cy="10" r="2"/><circle cx="10" cy="30" r="2"/><circle cx="30" cy="30" r="2"/><circle cx="50" cy="30" r="2"/><circle cx="70" cy="30" r="2"/><circle cx="90" cy="30" r="2"/><circle cx="10" cy="50" r="2"/><circle cx="30" cy="50" r="2"/><circle cx="50" cy="50" r="2"/><circle cx="70" cy="50" r="2"/><circle cx="90" cy="50" r="2"/></svg>
            </div>

            <div class="ble-container">
                <div class="ble-title-wrap">
                    <span class="ble-section-tag">
                        <span class="dot"></span> Năng lực đầu ra
                    </span>
                    <h2 class="ble-section-title">8 Điều Học Viên <span class="ble-gradient-text">"Cầm Về"</span></h2>
                    <p class="ble-section-subtitle" style="max-width: 680px; margin: 0 auto;">Chương trình đào tạo thiết kế chuẩn quốc tế, giúp chuyển hóa toàn diện năng lực và tư duy của nhà quản lý thông qua 8 trụ cột cốt lõi:</p>
                </div>

                <div class="comp-grid">
                    <!-- Comp 1 -->
                    <div class="comp-card">
                        <div class="comp-icon-box">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .5 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5M9 18h6M10 22h4"/></svg>
                        </div>
                        <h4 class="comp-card-caps-title">Leadership Mindset</h4>
                        <p class="comp-desc">Phát triển tư duy lãnh đạo hiện đại, chuyển từ quản lý công việc sang dẫn dắt và tạo ảnh hưởng đến đội ngũ.</p>
                    </div>
                    <!-- Comp 2 -->
                    <div class="comp-card">
                        <div class="comp-icon-box">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                        </div>
                        <h4 class="comp-card-caps-title">Performance Management</h4>
                        <p class="comp-desc">Biết cách phân công công việc, thiết lập mục tiêu và tối ưu hiệu suất làm việc của đội ngũ.</p>
                    </div>
                    <!-- Comp 3 -->
                    <div class="comp-card">
                        <div class="comp-icon-box">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <h4 class="comp-card-caps-title">Organizational Behaviour</h4>
                        <p class="comp-desc">Hiểu hành vi và động lực của nhân sự để xây dựng môi trường làm việc tích cực và tăng sự gắn kết.</p>
                    </div>
                    <!-- Comp 4 -->
                    <div class="comp-card">
                        <div class="comp-icon-box">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                        </div>
                        <h4 class="comp-card-caps-title">Coaching &amp; Feedback</h4>
                        <p class="comp-desc">Phát triển kỹ năng coaching và phản hồi nhằm nâng cao năng lực và hiệu quả làm việc của nhân viên.</p>
                    </div>
                    <!-- Comp 5 -->
                    <div class="comp-card">
                        <div class="comp-icon-box">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
                        </div>
                        <h4 class="comp-card-caps-title">High-Performance Team</h4>
                        <p class="comp-desc">Xây dựng đội ngũ chủ động, hợp tác và hướng đến mục tiêu chung với hiệu suất cao.</p>
                    </div>
                    <!-- Comp 6 -->
                    <div class="comp-card">
                        <div class="comp-icon-box">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></polygon></svg>
                        </div>
                        <h4 class="comp-card-caps-title">Talent Management</h4>
                        <p class="comp-desc">Biết cách phát hiện, phát triển và giữ chân nhân tài để xây dựng nguồn lực bền vững cho tổ chức.</p>
                    </div>
                    <!-- Comp 7 -->
                    <div class="comp-card">
                        <div class="comp-icon-box">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg>
                        </div>
                        <h4 class="comp-card-caps-title">Change Leadership</h4>
                        <p class="comp-desc">Nâng cao năng lực dẫn dắt đội ngũ thích ứng với sự thay đổi và phát triển của doanh nghiệp.</p>
                    </div>
                    <!-- Comp 8 -->
                    <div class="comp-card">
                        <div class="comp-icon-box">
                            <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                        </div>
                        <h4 class="comp-card-caps-title">Practical Management Skills</h4>
                        <p class="comp-desc">Ứng dụng ngay các nguyên tắc lãnh đạo và quản trị nhân sự vào công việc quản lý hằng ngày.</p>
                    </div>
                </div>
                
                <!-- Competency slide dots on mobile -->
                <div class="mobile-dots-container comp-dots" style="display: none;">
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </section>

        <!-- 4. INTERACTIVE CURRICULUM SECTION (Warm Cream Background, Ambient Glow) -->
        <section class="ble-section bg-soft-cream" id="curriculum">
            <!-- Background Glow Orbs -->
            <div class="ble-glow-orb ble-glow-orb-primary" style="bottom: 5%; right: -10%;"></div>
            
            <!-- Floating Decorative SVGs -->
            <div class="ble-decor-shape" style="position: absolute; top: 15%; right: 6%; opacity: 0.06; animation: float-slow 18s ease-in-out infinite; pointer-events: none;">
                <svg width="100" height="120" viewBox="0 0 100 120" fill="none" stroke="#ab0e00" stroke-width="1.5" stroke-linejoin="round"><path d="M50 10 L85 25 L85 65 C85 90, 50 110, 50 110 C50 110, 15 90, 15 65 L15 25 Z"/></svg>
            </div>
            <div class="ble-decor-shape" style="position: absolute; bottom: 15%; left: 5%; opacity: 0.07; animation: float-slow 22s ease-in-out infinite; pointer-events: none;">
                <svg width="120" height="120" viewBox="0 0 120 120" fill="none" stroke="#ab0e00" stroke-width="1.5"><circle cx="60" cy="60" r="55" stroke-dasharray="6 6"/><circle cx="60" cy="60" r="35"/><circle cx="60" cy="60" r="15" fill="#ab0e00" opacity="0.1"/></svg>
            </div>

            <div class="ble-container">
                <div class="ble-title-wrap">
                    <span class="ble-section-tag">
                        <span class="dot"></span> Chương trình đào tạo
                    </span>
                    <h2 class="ble-section-title">Nội dung đào tạo <span class="ble-text-red">chi tiết</span></h2>
                    <p class="ble-section-subtitle">3 môn học chuyên sâu về năng lực lãnh đạo và quản trị con người</p>
                </div>

                <!-- Cask layout wrapper -->
                <div class="curr-layout">
                    <!-- Left Sidebar: vertical tabs -->
                    <div class="curr-sidebar">
                        <div class="curr-tab active" data-target="course-1">
                            <div class="curr-tab-tag">Môn học 01</div>
                            <div class="curr-tab-title">Leadership Development</div>
                        </div>
                        <div class="curr-tab" data-target="course-2">
                            <div class="curr-tab-tag">Môn học 02</div>
                            <div class="curr-tab-title">Organizational Behaviour</div>
                        </div>
                        <div class="curr-tab" data-target="course-3">
                            <div class="curr-tab-tag">Môn học 03</div>
                            <div class="curr-tab-title">Human Capital and Talent Management</div>
                        </div>
                    </div>

                    <!-- Right panel: detailed content -->
                    <div class="curr-details">
                        <!-- PANEL 1: Leadership Development -->
                        <div class="curr-panel active" id="course-1">
                            <div class="curr-panel-header">
                                <div class="curr-panel-title-wrap">
                                    <h3 class="curr-panel-title">Leadership Development</h3>
                                    <p class="curr-panel-desc">Leadership Development là môn học giúp học viên phát triển tư duy và năng lực lãnh đạo trong môi trường doanh nghiệp hiện đại. Môn học tập trung vào cách dẫn dắt đội ngũ, tạo ảnh hưởng, xây dựng văn hóa tổ chức và thích ứng với sự thay đổi. Thông qua các mô hình lãnh đạo từ nền tảng đến hiện đại, học viên sẽ biết cách lựa chọn phong cách lãnh đạo phù hợp với từng cá nhân, từng tình huống và từng giai đoạn phát triển của tổ chức.</p>
                                </div>
                                <button class="curr-toggle-all-btn" onclick="toggleAllAccordions('course-1')">Mở tất cả</button>
                            </div>

                            <div class="curr-accordion-list">
                                <!-- Part 1 -->
                                <div class="curr-acc-item active">
                                    <div class="curr-acc-header" onclick="toggleAccordion(this)">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">01</span>
                                            <span class="curr-acc-title">Nền tảng lý thuyết về lãnh đạo (Leadership Foundations)</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">Phần 1</span>
                                            <span class="curr-acc-arrow">
                                                <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="6 9 12 15 18 9"/></svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content" style="max-height: 500px;">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Vai trò, nhiệm vụ và sứ mệnh của nhà lãnh đạo trong tổ chức hiện đại.</li>
                                                <li>Phân biệt tường tận giữa quản trị công việc (Management) và dẫn dắt con người (Leadership).</li>
                                                <li>Hệ thống các học thuyết lãnh đạo kinh điển và cách thức ứng dụng linh hoạt vào thực tế.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Part 2 -->
                                <div class="curr-acc-item">
                                    <div class="curr-acc-header" onclick="toggleAccordion(this)">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">02</span>
                                            <span class="curr-acc-title">Các mô hình lãnh đạo hiện đại (Advanced Leadership Models)</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">Phần 2</span>
                                            <span class="curr-acc-arrow">
                                                <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="6 9 12 15 18 9"/></svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Mô hình lãnh đạo tình huống (Situational Leadership) thích ứng theo từng năng lực nhân sự.</li>
                                                <li>Lãnh đạo chuyển đổi (Transformational Leadership) truyền cảm hứng và thay đổi.</li>
                                                <li>Trí tuệ cảm xúc (EQ) - Kỹ năng nhận diện và làm chủ cảm xúc trong giao tiếp lãnh đạo.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Part 3 -->
                                <div class="curr-acc-item">
                                    <div class="curr-acc-header" onclick="toggleAccordion(this)">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">03</span>
                                            <span class="curr-acc-title">Lãnh đạo và văn hóa tổ chức (Culture &amp; Leadership)</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">Phần 3</span>
                                            <span class="curr-acc-arrow">
                                                <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="6 9 12 15 18 9"/></svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Phương pháp xây dựng và lan tỏa văn hóa doanh nghiệp từ góc độ quản lý cấp trung.</li>
                                                <li>Định hình các chuẩn mực làm việc cốt lõi và xây dựng giá trị chung cho đội nhóm.</li>
                                                <li>Đo lường tác động của phong cách lãnh đạo cá nhân đến hành vi và văn hóa chung.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Part 4 -->
                                <div class="curr-acc-item">
                                    <div class="curr-acc-header" onclick="toggleAccordion(this)">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">04</span>
                                            <span class="curr-acc-title">Lãnh đạo trong môi trường toàn cầu (Cross-Cultural Leadership)</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">Phần 4</span>
                                            <span class="curr-acc-arrow">
                                                <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="6 9 12 15 18 9"/></svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Tư duy lãnh đạo đa văn hóa và phương pháp quản trị hiệu quả sự đa dạng nhân sự.</li>
                                                <li>Xóa bỏ rào cản giao tiếp, thiết lập kênh đối thoại cởi mở và gắn kết.</li>
                                                <li>Xây dựng tầm nhìn toàn cầu hóa (Global Mindset) cho các nhà quản lý doanh nghiệp.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Outcomes block -->
                            <div class="curr-outcomes">
                                <div class="curr-outcomes-title">
                                    Kết quả đạt được sau môn học:
                                </div>
                                <ul class="curr-outcomes-list">
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span>Hiểu cách nhà lãnh đạo tạo ảnh hưởng và xây dựng văn hóa tổ chức hiệu quả.</span>
                                    </li>
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span>Xây dựng chiến lược phát triển đội ngũ và năng lực lãnh đạo trong tổ chức.</span>
                                    </li>
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span>Dẫn dắt đội ngũ và xây dựng văn hóa tổ chức thích ứng với sự thay đổi.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- PANEL 2: Organizational Behaviour -->
                        <div class="curr-panel" id="course-2" style="display:none;">
                            <div class="curr-panel-header">
                                <div class="curr-panel-title-wrap">
                                    <h3 class="curr-panel-title">Organizational Behaviour</h3>
                                    <p class="curr-panel-desc">Organizational Behaviour giúp học viên hiểu cách con người suy nghĩ, hành động và tương tác trong môi trường tổ chức. Môn học tập trung vào việc phân tích hành vi của cá nhân, đội nhóm và tổ chức nhằm nâng cao hiệu quả quản trị, xây dựng môi trường làm việc tích cực và cải thiện hiệu suất doanh nghiệp. Thông qua các mô hình và nghiên cứu thực tiễn, học viên sẽ biết cách nhận diện nguyên nhân của các vấn đề về con người và đưa ra giải pháp quản trị phù hợp.</p>
                                </div>
                                <button class="curr-toggle-all-btn" onclick="toggleAllAccordions('course-2')">Mở tất cả</button>
                            </div>

                            <div class="curr-accordion-list">
                                <!-- Part 1 -->
                                <div class="curr-acc-item active">
                                    <div class="curr-acc-header" onclick="toggleAccordion(this)">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">01</span>
                                            <span class="curr-acc-title">Hành vi cá nhân trong tổ chức (Individual Behaviour)</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">Phần 1</span>
                                            <span class="curr-acc-arrow">
                                                <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="6 9 12 15 18 9"/></svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content" style="max-height: 500px;">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Nhận diện tính cách, thái độ, giá trị sống và động lực tiềm ẩn của từng cá nhân.</li>
                                                <li>Ứng dụng các lý thuyết tâm lý học để tạo động lực và kích thích tiềm năng làm việc.</li>
                                                <li>Kiểm soát và giải tỏa stress công việc, đảm bảo sự phát triển hài hòa của nhân viên.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Part 2 -->
                                <div class="curr-acc-item">
                                    <div class="curr-acc-header" onclick="toggleAccordion(this)">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">02</span>
                                            <span class="curr-acc-title">Hành vi đội nhóm và làm việc nhóm (Group Behaviour)</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">Phần 2</span>
                                            <span class="curr-acc-arrow">
                                                <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="6 9 12 15 18 9"/></svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Quy luật phát triển đội nhóm qua 5 giai đoạn chính của mô hình Tuckman.</li>
                                                <li>Kỹ năng giao tiếp điều phối, quản trị xung đột và tìm kiếm giải pháp đồng thuận.</li>
                                                <li>Hệ thống hóa quy trình ra quyết định tập thể và phân bổ trách nhiệm cụ thể.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Part 3 -->
                                <div class="curr-acc-item">
                                    <div class="curr-acc-header" onclick="toggleAccordion(this)">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">03</span>
                                            <span class="curr-acc-title">Cấu trúc, văn hóa và thay đổi tổ chức (Organization System &amp; Change)</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">Phần 3</span>
                                            <span class="curr-acc-arrow">
                                                <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="6 9 12 15 18 9"/></svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Phân tích ảnh hưởng của cấu trúc sơ đồ tổ chức đến thói quen làm việc của nhân sự.</li>
                                                <li>Phương pháp hạn chế sự kháng cự của đội ngũ khi triển khai cải tiến.</li>
                                                <li>Xây dựng mô hình tổ chức học tập (Learning Organization) để đổi mới không ngừng.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Outcomes block -->
                            <div class="curr-outcomes">
                                <div class="curr-outcomes-title">
                                    Kết quả đạt được sau môn học:
                                </div>
                                <ul class="curr-outcomes-list">
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span>Hiểu cách hành vi của cá nhân, đội nhóm và tổ chức tác động đến hiệu quả làm việc.</span>
                                    </li>
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span>Phân tích nguyên nhân của các vấn đề về động lực, xung đột và sự gắn kết trong doanh nghiệp.</span>
                                    </li>
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span>Xây dựng môi trường làm việc và văn hóa tổ chức giúp nâng cao hiệu suất đội ngũ.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- PANEL 3: Human Capital and Talent Management -->
                        <div class="curr-panel" id="course-3" style="display:none;">
                            <div class="curr-panel-header">
                                <div class="curr-panel-title-wrap">
                                    <h3 class="curr-panel-title">Human Capital and Talent Management</h3>
                                    <p class="curr-panel-desc">Human Capital and Talent Management giúp học viên xây dựng tư duy quản trị nguồn nhân lực theo hướng chiến lược, xem con người là tài sản quan trọng tạo nên lợi thế cạnh tranh bền vững của doanh nghiệp. Môn học tập trung vào toàn bộ vòng đời của nhân tài, từ thu hút, phát triển, quản lý hiệu suất đến giữ chân nhân sự, giúp nhà quản lý xây dựng đội ngũ có năng lực, gắn kết và phát triển lâu dài.</p>
                                </div>
                                <button class="curr-toggle-all-btn" onclick="toggleAllAccordions('course-3')">Mở tất cả</button>
                            </div>

                            <div class="curr-accordion-list">
                                <!-- Part 1 -->
                                <div class="curr-acc-item active">
                                    <div class="curr-acc-header" onclick="toggleAccordion(this)">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">01</span>
                                            <span class="curr-acc-title">Nền tảng về quản trị nguồn nhân lực chiến lược (Strategic Human Capital)</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">Phần 1</span>
                                            <span class="curr-acc-arrow">
                                                <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="6 9 12 15 18 9"/></svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content" style="max-height: 500px;">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Định hướng và đồng bộ chiến lược nhân sự phù hợp chặt chẽ với mục tiêu kinh doanh.</li>
                                                <li>Quy hoạch và lập kế hoạch nhu cầu nguồn nhân lực dự kiến trong trung và dài hạn.</li>
                                                <li>Thiết lập hệ thống chỉ số đo lường giá trị gia tăng của vốn nhân lực tổ chức.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Part 2 -->
                                <div class="curr-acc-item">
                                    <div class="curr-acc-header" onclick="toggleAccordion(this)">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">02</span>
                                            <span class="curr-acc-title">Thu hút và phát triển nhân tài (Talent Acquisition &amp; Development)</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">Phần 2</span>
                                            <span class="curr-acc-arrow">
                                                <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="6 9 12 15 18 9"/></svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Kỹ thuật xây dựng thương hiệu nhà tuyển dụng (Employer Branding) hấp dẫn.</li>
                                                <li>Quy trình đánh giá phỏng vấn tuyển chọn nhân sự tiềm năng theo khung năng lực.</li>
                                                <li>Lập chiến lược nâng cao tay nghề (Up-skilling) và tái tạo năng lực (Re-skilling).</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Part 3 -->
                                <div class="curr-acc-item">
                                    <div class="curr-acc-header" onclick="toggleAccordion(this)">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">03</span>
                                            <span class="curr-acc-title">Quản lý hiệu suất và phát triển đội ngũ (Performance &amp; People Development)</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">Phần 3</span>
                                            <span class="curr-acc-arrow">
                                                <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="6 9 12 15 18 9"/></svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Thiết kế chỉ tiêu hiệu quả công việc khoa học qua hệ thống KPIs &amp; OKRs.</li>
                                                <li>Phương pháp đối thoại phản hồi xây dựng và thực hành coaching kèm cặp nhân viên.</li>
                                                <li>Xây dựng lộ trình phát triển sự nghiệp cá nhân và lập kế hoạch nhân sự kế cận.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Part 4 -->
                                <div class="curr-acc-item">
                                    <div class="curr-acc-header" onclick="toggleAccordion(this)">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">04</span>
                                            <span class="curr-acc-title">Văn hóa doanh nghiệp và tương lai của quản trị nhân sự (Culture &amp; Future of HR)</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">Phần 4</span>
                                            <span class="curr-acc-arrow">
                                                <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="6 9 12 15 18 9"/></svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Ứng dụng tự động hóa, chuyển đổi số và công nghệ AI vào quản trị con người.</li>
                                                <li>Xây dựng môi trường làm việc hạnh phúc, cân bằng và nâng tầm trải nghiệm nhân viên.</li>
                                                <li>Cập nhật các mô hình tổ chức và hình thức làm việc mới sau dịch bệnh.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Outcomes block -->
                            <div class="curr-outcomes">
                                <div class="curr-outcomes-title">
                                    Kết quả đạt được sau môn học:
                                </div>
                                <ul class="curr-outcomes-list">
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span>Hiểu cách xây dựng chiến lược quản trị nguồn nhân lực gắn với mục tiêu phát triển của doanh nghiệp.</span>
                                    </li>
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span>Thiết kế hệ thống thu hút, phát triển và giữ chân nhân tài nhằm nâng cao năng lực cạnh tranh của tổ chức.</span>
                                    </li>
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span>Xây dựng văn hóa hiệu suất cao và phát triển đội ngũ bền vững thông qua các chính sách quản trị nhân sự hiện đại.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. IDEAS AI PLATFORM SECTION (White Background, Ambient Glow) -->
        <section class="ble-section bg-white">
            <!-- Background Glow Orbs -->
            <div class="ble-glow-orb ble-glow-orb-primary" style="top: 15%; left: -10%;"></div>
            
            <!-- Floating Decorative SVGs -->
            <div class="ble-decor-shape" style="position: absolute; top: 12%; right: 4%; opacity: 0.08; animation: float-slow 14s ease-in-out infinite; pointer-events: none;">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" stroke="#ab0e00" stroke-width="2" stroke-linecap="round"><path d="M30 10v40M10 30h40"/><circle cx="10" cy="10" r="2" fill="#ab0e00"/><circle cx="50" cy="50" r="2" fill="#ab0e00"/></svg>
            </div>
            <div class="ble-decor-shape" style="position: absolute; bottom: 15%; left: 3%; opacity: 0.07; animation: float-slow 22s ease-in-out infinite; pointer-events: none;">
                <svg width="120" height="120" viewBox="0 0 120 120" fill="none" stroke="#ab0e00" stroke-width="1.5"><circle cx="60" cy="60" r="55" stroke-dasharray="6 6"/><circle cx="60" cy="60" r="35"/><circle cx="60" cy="60" r="15" fill="#ab0e00" opacity="0.1"/></svg>
            </div>

            <div class="ble-container">
                <div class="ai-grid">
                    <!-- Left: Details -->
                    <div class="ai-content">
                        <span class="ble-section-tag">
                            <span class="dot"></span> IDEAS AI Platform
                        </span>
                        <h2 class="ble-section-title">AI được <span class="ble-text-red">huấn luyện riêng</span> cho chương trình học</h2>
                        <p class="ble-section-subtitle" style="margin-bottom: 24px;">Học đúng trọng tâm. Hiểu sâu kiến thức. Nền tảng hỗ trợ học viên học tập mọi lúc, mọi nơi, giúp nâng cao hiệu quả tự học.</p>

                        <ul class="ai-features-list">
                            <li>
                                <span class="ai-feat-icon">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                </span>
                                <span class="ai-feat-text"><strong>Đúng trọng tâm:</strong> Trả lời bám sát nội dung môn học, đúng trọng tâm.</span>
                            </li>
                            <li>
                                <span class="ai-feat-icon">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                </span>
                                <span class="ai-feat-text"><strong>Trích dẫn học thuật:</strong> Trích dẫn trực tiếp từ nguồn học thuật trong giáo trình.</span>
                            </li>
                            <li>
                                <span class="ai-feat-icon">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                </span>
                                <span class="ai-feat-text"><strong>Ví dụ thực tiễn:</strong> Diễn giải kiến thức rõ ràng, dễ hiểu và minh họa bằng các ví dụ thực tế.</span>
                            </li>
                        </ul>

                        <button onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('ble-ai'); }" class="ble-btn">Đăng ký dùng thử AI &amp; LMS</button>
                    </div>

                    <!-- Right: Overlapping AI Platform Screenshots -->
                    <div class="ai-visual">
                        <div class="ai-screens-container">
                            <div class="ai-screen-wrapper wrap-login">
                                <div class="ai-screen-card card-login">
                                    <img src="https://ideas.edu.vn/wp-content/uploads/2026/07/ai_login.webp" alt="IDEAS AI Platform Login">
                                </div>
                            </div>
                            <div class="ai-screen-wrapper wrap-main">
                                <div class="ai-screen-card card-main">
                                    <img src="https://ideas.edu.vn/wp-content/uploads/2026/07/aiplatform-1.webp" alt="IDEAS AI Platform Web Dashboard">
                                </div>
                            </div>
                            <div class="ai-screen-wrapper wrap-sub">
                                <div class="ai-screen-card card-sub">
                                    <img src="https://ideas.edu.vn/wp-content/uploads/2026/07/aiplatform-2.webp" alt="IDEAS AI Platform Mobile Assistant">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. INSTRUCTORS SECTION (Warm Cream Background, Ambient Glow) -->
        <section class="ble-section bg-soft-cream">
            <!-- Background Glow Orbs -->
            <div class="ble-glow-orb ble-glow-orb-gold" style="top: 15%; right: -10%;"></div>
            
            <!-- Floating Decorative SVGs -->
            <div class="ble-decor-shape" style="position: absolute; top: 15%; left: 3%; opacity: 0.08; animation: float-slow 16s ease-in-out infinite; pointer-events: none;">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" stroke="#ab0e00" stroke-width="2" stroke-linecap="round"><path d="M30 10v40M10 30h40"/><circle cx="10" cy="10" r="2" fill="#ab0e00"/><circle cx="50" cy="50" r="2" fill="#ab0e00"/></svg>
            </div>
            <div class="ble-decor-shape" style="position: absolute; bottom: 10%; right: 4%; opacity: 0.08; animation: float-slow 15s ease-in-out infinite; pointer-events: none;">
                <svg width="80" height="24" viewBox="0 0 80 24" fill="none" stroke="#ab0e00" stroke-width="2" stroke-linecap="round"><path d="M0 12 Q 10 2, 20 12 T 40 12 T 60 12 T 80 12"/></svg>
            </div>

            <div class="ble-container">
                <div class="ble-title-wrap">
                    <span class="ble-section-tag">
                        <span class="dot"></span> Giảng viên khóa học
                    </span>
                    <h2 class="ble-section-title">Đội ngũ <span class="ble-text-red">chuyên gia &amp; giảng sư</span></h2>
                    <p class="ble-section-subtitle">Học tập cùng các giáo sư, chuyên gia tư vấn hàng đầu quốc tế</p>
                </div>

                <div class="fac-grid">
                    <!-- Instructor 1 -->
                    <div class="fac-card">
                        <div class="fac-avatar-wrap">
                            <img src="/wp-content/uploads/external-migrated/Image-empty-state_d4ff3628.webp" alt="Dr. Liza Castro Christiansen" class="fac-avatar">
                        </div>
                        <h4 class="fac-name">Dr. Liza Castro Christiansen</h4>
                        <div class="fac-role">Leadership Development</div>
                        <p class="fac-bio">Hơn 34 năm kinh nghiệm quốc tế giảng dạy và tư vấn. Bà sở hữu bằng MBA và DBA từ Henley Management College &amp; Đại học Brunel, giảng dạy tại Henley Business School và Swiss UMEF. Nghiên cứu sâu về lãnh đạo thay đổi.</p>
                        <a href="https://www.swiss-umef.ch/en/corps-professoral/liza-castro-christiansen" target="_blank" class="fac-link">Lý lịch khoa học ↗</a>
                    </div>

                    <!-- Instructor 2 -->
                    <div class="fac-card">
                        <div class="fac-avatar-wrap">
                            <img src="/wp-content/uploads/external-migrated/Image-empty-state_c13b0a0d.webp" alt="Dr. Bahaudin G. Mujtaba" class="fac-avatar">
                        </div>
                        <h4 class="fac-name">Dr. Bahaudin G. Mujtaba</h4>
                        <div class="fac-role">Organizational Behaviour</div>
                        <p class="fac-bio">Giáo sư Quản trị chiến lược và Quản trị Nguồn nhân lực tại Nova Southeastern University (NSU), Florida, Hoa Kỳ. Chuyên gia tư vấn cấp cao quốc tế với hàng trăm công trình nghiên cứu và sách về hành vi tổ chức.</p>
                        <a href="https://www.swiss-umef.ch/en/corps-professoral" target="_blank" class="fac-link">Lý lịch khoa học ↗</a>
                    </div>

                    <!-- Instructor 3 -->
                    <div class="fac-card">
                        <div class="fac-avatar-wrap">
                            <img src="/wp-content/uploads/external-migrated/Image-empty-state_3203a68c.webp" alt="Prof. Dr. Jelena Lagger" class="fac-avatar">
                        </div>
                        <h4 class="fac-name">Prof. Dr. Jelena Lagger</h4>
                        <div class="fac-role">Talent Management</div>
                        <p class="fac-bio">Chuyên gia Thụy Sĩ - Mỹ về Tương lai của việc làm và hoạch định chính sách. Tiến sĩ Đại học Bath (Anh Quốc), thành viên Future of Work Research Centre. Tư vấn chuyển đổi lực lượng lao động cho các tổ chức đa quốc gia.</p>
                        <a href="https://www.swiss-umef.ch/en/corps-professoral/jelena-lagger" target="_blank" class="fac-link">Lý lịch khoa học ↗</a>
                    </div>
                </div>
                
                <!-- Faculty slide dots on mobile -->
                <div class="mobile-dots-container fac-dots" style="display: none;">
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </section>

        <!-- 7. CERTIFICATE SHOWCASE SECTION (White Background, Ambient Glow) -->
        <section class="ble-section bg-white">
            <!-- Background Glow Orbs -->
            <div class="ble-glow-orb ble-glow-orb-primary" style="bottom: 10%; left: -10%;"></div>
            
            <!-- Floating Decorative SVGs -->
            <div class="ble-decor-shape" style="position: absolute; top: 12%; left: 4%; opacity: 0.06; animation: float-slow 18s ease-in-out infinite; pointer-events: none;">
                <svg width="100" height="120" viewBox="0 0 100 120" fill="none" stroke="#ab0e00" stroke-width="1.5" stroke-linejoin="round"><path d="M50 10 L85 25 L85 65 C85 90, 50 110, 50 110 C50 110, 15 90, 15 65 L15 25 Z"/></svg>
            </div>
            <div class="ble-decor-shape" style="position: absolute; bottom: 15%; right: 5%; opacity: 0.08; animation: float-slow 14s ease-in-out infinite; pointer-events: none;">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" stroke="#ab0e00" stroke-width="2" stroke-linecap="round"><path d="M30 10v40M10 30h40"/><circle cx="10" cy="10" r="2" fill="#ab0e00"/><circle cx="50" cy="50" r="2" fill="#ab0e00"/></svg>
            </div>

            <div class="ble-container">
                <div class="cert-wrap">
                    <!-- Left: Text Info -->
                    <div class="cert-info">
                        <span class="ble-section-tag">
                            <span class="dot"></span> Chứng nhận tốt nghiệp
                        </span>
                        <h2 class="ble-section-title">Đạt chứng chỉ<br>chuẩn <span class="ble-text-red">Thụy Sĩ</span></h2>
                        <p class="ble-section-subtitle" style="margin-bottom: 24px; color: #4b5563;">Sau khi hoàn thành khóa học và đáp ứng các yêu cầu đánh giá, học viên sẽ được cấp <strong>Certificate of Completion</strong> do IDEAS phát hành trên cơ sở chuyển giao học thuật từ EGA.</p>
                        <ul class="ai-features-list" style="margin-bottom: 30px;">
                            <li>
                                <span class="ai-feat-icon">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                </span>
                                <span class="ai-feat-text" style="color: #475569;">Chứng chỉ có giá trị xác thực năng lực quản trị thực chiến quốc tế.</span>
                            </li>
                            <li>
                                <span class="ai-feat-icon">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                </span>
                                <span class="ai-feat-text" style="color: #475569;">Được công nhận bởi Hội đồng chuyên môn Viện IDEAS.</span>
                            </li>
                        </ul>
                        <button onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('ble-cert'); }" class="ble-btn">Đăng ký tư vấn lộ trình</button>
                    </div>

                    <!-- Right: Certificate Display Mockup -->
                    <div class="cert-visual">
                        <div class="cert-mockup">
                            <div class="cert-mockup-border"></div>
                            <div class="cert-logo">Viện IDEAS &amp; EGA Academic Alliance</div>
                            <div class="cert-main-text">
                                <h5>Certificate of Completion</h5>
                                <h4>BUSINESS LEADERSHIP ESSENTIALS</h4>
                                <p>Cấp cho học viên đã hoàn tất xuất sắc chương trình đào tạo chuyển giao học thuật Swiss UMEF.</p>
                            </div>
                            <div class="cert-signatures">
                                <div class="cert-sig-item">
                                    <div class="cert-sig-line"></div>
                                    <span class="cert-sig-lbl">IDEAS Director</span>
                                </div>
                                <div class="cert-sig-item">
                                    <div class="cert-sig-line"></div>
                                    <span class="cert-sig-lbl">EGA Academic Board</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 8. TARGET AUDIENCE SECTION (Warm Cream Background) - Moved Down Near Bottom -->
        <section class="ble-section bg-soft-cream">
            <!-- Floating Decorative SVGs -->
            <div class="ble-decor-shape" style="position: absolute; top: 10%; right: 5%; opacity: 0.07; animation: float-slow 22s ease-in-out infinite; pointer-events: none;">
                <svg width="120" height="120" viewBox="0 0 120 120" fill="none" stroke="#ab0e00" stroke-width="1.5"><circle cx="60" cy="60" r="55" stroke-dasharray="6 6"/><circle cx="60" cy="60" r="35"/><circle cx="60" cy="60" r="15" fill="#ab0e00" opacity="0.1"/></svg>
            </div>
            <div class="ble-decor-shape" style="position: absolute; bottom: 12%; left: 4%; opacity: 0.08; animation: float-slow 15s ease-in-out infinite; pointer-events: none;">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" stroke="#ab0e00" stroke-width="2" stroke-linecap="round"><path d="M30 10v40M10 30h40"/><circle cx="10" cy="10" r="2" fill="#ab0e00"/><circle cx="50" cy="50" r="2" fill="#ab0e00"/></svg>
            </div>

            <div class="ble-container">
                <div class="ble-title-wrap">
                    <span class="ble-section-tag">
                        <span class="dot"></span> Ai nên học khóa học này?
                    </span>
                    <h2 class="ble-section-title">Đối tượng <span class="ble-text-red">đào tạo phù hợp</span></h2>
                    <p class="ble-section-subtitle">Chương trình được thiết kế chuẩn hóa cho từng nhóm đối tượng quản trị con người:</p>
                </div>

                <div class="audience-grid">
                    <!-- Item 1 -->
                    <div class="audience-card">
                        <div class="audience-icon-box">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <h4>Trưởng nhóm</h4>
                        <p>Dẫn dắt đội ngũ, cần nền tảng để ra quyết định và xây dựng uy tín trong đội.</p>
                    </div>
                    <!-- Item 2 -->
                    <div class="audience-card">
                        <div class="audience-icon-box">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M4.5 16.5c-1.5 1.25-2.5 3.5-2.5 3.5s2.25-1 3.5-2.5M12 2C6.5 2 2 6.5 2 12c0 2.5 1 4.5 2.5 6l6-6L18 4.5c1.5-1.5 3.5-2.5 6-2.5-1.5 2.5-2.5 4.5-4 6l-6.5 6.5-6 6c1.5 1.5 3.5 2.5 6 2.5 5.5 0 10-4.5 10-10 0-1.5-1-3.5-2.5-5z"/></svg>
                        </div>
                        <h4>Nhân sự nguồn (Hi-Po)</h4>
                        <p>Được doanh nghiệp định hướng lên vị trí quản lý, cần chuẩn bị năng lực trước khi chính thức đảm nhận vai trò.</p>
                    </div>
                    <!-- Item 3 -->
                    <div class="audience-card">
                        <div class="audience-icon-box">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M9 15v6l2-2 2 2v-6"/></svg>
                        </div>
                        <h4>Quản lý cấp trung</h4>
                        <p>Đang trực tiếp điều hành đội nhóm, cần hệ thống hóa tư duy lãnh đạo.</p>
                    </div>
                    <!-- Item 4 -->
                    <div class="audience-card">
                        <div class="audience-icon-box">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"/><path d="M9 22V18h6v4M8 6h2M14 6h2M8 10h2M14 10h2M8 14h2M14 14h2"/></svg>
                        </div>
                        <h4>Chủ doanh nghiệp SMEs</h4>
                        <p>Trực tiếp quản lý đội ngũ, cần một hệ thống tư duy rõ ràng để xây dựng văn hóa làm việc tích cực.</p>
                    </div>
                </div>
                
                <!-- Target Audience slide dots on mobile -->
                <div class="mobile-dots-container aud-dots" style="display: none;">
                    <div class="dot active" data-index="0"></div>
                    <div class="dot" data-index="1"></div>
                    <div class="dot" data-index="2"></div>
                    <div class="dot" data-index="3"></div>
                </div>
            </div>
        </section>

        <!-- 9. FAQ SECTION & REGISTRATION FORM (Side-by-side, Cloned from index.html) -->
        <section class="cta-section" id="dang-ky" aria-labelledby="cta-headline">
            <div class="cta-bg">
                <div class="cta-orb cta-orb-1"></div>
                <div class="cta-orb cta-orb-2"></div>
            </div>
            
            <!-- Floating Decorative SVGs -->
            <div class="ble-decor-shape" style="position: absolute; top: 15%; right: 5%; opacity: 0.15; animation: float-slow 8s ease-in-out infinite; pointer-events: none;">
                <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#ab0e00" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/><path d="M2 12h20"/></svg>
            </div>
            <div class="ble-decor-shape" style="position: absolute; bottom: 25%; left: 5%; opacity: 0.12; animation: float-slow 12s ease-in-out infinite; pointer-events: none;">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#ab0e00" stroke-width="1"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
            </div>

            <div class="container cta-inner">
                <div class="cta-left reveal-up">
                    <h2 class="cta-headline" id="cta-headline" style="margin-top: 20px;">
                        BẮT ĐẦU HÀNH TRÌNH<br />
                        <span class="cta-gradient underline-highlight">LÃNH ĐẠO THỰC CHIẾN</span>
                    </h2>

                    <ul class="cta-checklist" aria-label="Điểm nổi bật chương trình" style="margin-top: 32px;">
                        <li>
                            <div class="cta-check-v2">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            </div>
                            <p>Học bổng Khuyến học năm nhất lên đến <strong>90% học phí</strong></p>
                        </li>
                        <li>
                            <div class="cta-check-v2">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            </div>
                            <p>Học trực tuyến linh hoạt, <strong>hệ sinh thái bổ trợ cuối tuần từ IDEAS</strong></p>
                        </li>
                        <li>
                            <div class="cta-check-v2">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            </div>
                            <p>Cộng đồng học viên kết nối, <strong>nhận bằng tốt nghiệp quốc tế danh giá</strong></p>
                        </li>
                    </ul>

                    <!-- Nested FAQ Accordion -->
                    <div class="faq-accordion" style="margin-top: 40px;">
                        <!-- FAQ 1 -->
                        <div class="faq-item">
                            <button type="button" class="faq-trigger">
                                <span>1. Vì sao chương trình chỉ gồm 3 môn học?</span>
                                <svg class="svg-icon fa-chevron-down fa-solid faq-arrow" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                            </button>
                            <div class="faq-body">
                                <div class="faq-content">
                                    Đây là ba môn học nền tảng quan trọng được lựa chọn từ hệ thống học phần của Swiss UMEF, tập quan vào năng lực cốt lõi của một nhà quản lý hiện đại: lãnh đạo đội ngũ, thấu hiểu con người và phát triển nhân tài.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="faq-item">
                            <button type="button" class="faq-trigger">
                                <span>2. Mình không làm trong lĩnh vực nhân sự, chương trình có phù hợp không?</span>
                                <svg class="svg-icon fa-chevron-down fa-solid faq-arrow" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                            </button>
                            <div class="faq-body">
                                <div class="faq-content">
                                    Có. Chương trình được thiết kế dành cho quản lý cấp trung, trưởng nhóm, chủ doanh nghiệp và nhân sự nguồn. Nội dung tập trung vào lãnh đạo, quản lý đội ngũ và phát triển con người, không yêu cầu học viên có chuyên môn về nhân sự.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="faq-item">
                            <button type="button" class="faq-trigger">
                                <span>3. Sau khi hoàn thành chương trình mình sẽ nhận được gì?</span>
                                <svg class="svg-icon fa-chevron-down fa-solid faq-arrow" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                            </button>
                            <div class="faq-body">
                                <div class="faq-content">
                                    Học viên sẽ phát triển 8 năng lực cốt lõi về lãnh đạo và quản trị đội ngũ, đồng thời nắm vững các nguyên tắc và framework quản trị con người được ứng dụng trong doanh nghiệp hiện đại. Đây sẽ là nền tảng để bạn tự tin dẫn dắt đội ngũ, nâng cao hiệu suất tổ chức và phát triển sự nghiệp ở các vị trí quản lý.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cta-right reveal-up">
                    <div class="cta-form-wrapper" id="form-wrapper">
                        <div class="form-header">
                            <div class="form-header-badge">NHẬN TƯ VẤN 1:1</div>
                            <h3>Khởi đầu hành trình<br><span class="gradient-text">Lãnh đạo thực chiến</span></h3>
                            <p>Chuyên viên sẽ liên hệ với bạn trong vòng 24h làm việc để tư vấn lộ trình phù hợp.</p>
                        </div>

                        <form class="cta-form" id="ble-bottom-reg-form" novalidate aria-label="Form đăng ký tư vấn BLE">
                            <div class="form-group">
                                <label for="reg-name">Họ và tên *</label>
                                <input type="text" id="reg-name" name="fullname" placeholder="Họ và tên của bạn" required />
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="reg-phone">Số điện thoại *</label>
                                    <input type="tel" id="reg-phone" name="phone" placeholder="Số điện thoại" required />
                                </div>
                                <div class="form-group">
                                    <label for="reg-email">Email *</label>
                                    <input type="email" id="reg-email" name="email" placeholder="Địa chỉ email" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="reg-education">Trình độ học vấn *</label>
                                    <select id="reg-education" name="education" required>
                                        <option value="">-- Chọn trình độ --</option>
                                        <option value="highschool">THPT</option>
                                        <option value="college">Cao đẳng</option>
                                        <option value="bachelor">Cử nhân</option>
                                        <option value="master">Thạc sĩ</option>
                                        <option value="other">Khác</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="reg-english">Trình độ Tiếng Anh *</label>
                                    <select id="reg-english" name="english" required>
                                        <option value="">-- Chọn trình độ --</option>
                                        <option value="below-5.0">Dưới IELTS 5.0</option>
                                        <option value="5.0-5.5">IELTS 5.0 - 5.5</option>
                                        <option value="6.0-plus">IELTS 6.0+</option>
                                        <option value="other">Khác / Chưa thi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="reg-message">Nội dung bạn muốn chia sẻ / thời gian có thể nghe tư vấn 1:1</label>
                                <textarea id="reg-message" name="message" rows="3" placeholder="Ví dụ: Tôi muốn tìm hiểu lộ trình học tập, thời gian khai giảng..."></textarea>
                            </div>
                            <button type="submit" class="btn-submit" style="background: #ab0e00; color: #fff; font-weight: 800; border-radius: 12px; border: none; padding: 16px; cursor: pointer; transition: all 0.3s; width: 100%; display: flex; align-items: center; justify-content: center; gap: 8px;">
                                Gửi thông tin đăng ký <svg class="svg-icon fa-circle-arrow-right fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM297 385c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l71-71L120 280c-13.3 0-24-10.7-24-24s10.7-24 24-24l214.1 0-71-71c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L409 239c9.4 9.4 9.4 24.6 0 33.9L297 385z"/></svg>
                            </button>
                        </form>
                        <p class="form-disclaimer" style="text-align: center; color: #64748b; font-size: 0.8rem; margin-top: 15px;">Cam kết bảo mật thông tin</p>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Script imports -->
    <?php
    $js_path = get_stylesheet_directory() . '/common-assets/js/script.min.js';
    $js_version = file_exists($js_path) ? filemtime($js_path) : time();
    ?>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/script.min.js?v=<?php echo $js_version; ?>" defer></script>

    <!-- Booking Modal script import -->
    <?php
    define('BOOKING_MODAL_JS_LOADED', true);
    $bk_js_path = get_stylesheet_directory() . '/common-assets/js/booking-modal.min.js';
    $bk_js_version = file_exists($bk_js_path) ? filemtime($bk_js_path) : time();
    ?>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/booking-modal.min.js?v=<?php echo $bk_js_version; ?>" defer></script>

    <!-- Site Footer -->
    <?php get_footer(); ?>

    <!-- Interactive JS scripts for Curriculum Tab & Accordions & AJAX Bottom Form -->
    <script>
        // 1. Curriculum Tab Switcher
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.curr-tab');
            const panels = document.querySelectorAll('.curr-panel');

            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active from all tabs
                    tabs.forEach(t => t.classList.remove('active'));
                    // Add active to clicked tab
                    this.classList.add('active');

                    // Hide all panels
                    panels.forEach(p => {
                        p.classList.remove('active');
                        p.style.display = 'none';
                    });

                    // Show target panel
                    const targetId = this.getAttribute('data-target');
                    const targetPanel = document.getElementById(targetId);
                    if (targetPanel) {
                        targetPanel.classList.add('active');
                        targetPanel.style.display = 'block';
                    }
                });
            });
        });

        // 2. Right Accordion Toggle
        function toggleAccordion(headerElement) {
            const item = headerElement.parentElement;
            const content = item.querySelector('.curr-acc-content');
            const isActive = item.classList.contains('active');

            if (isActive) {
                // Close
                content.style.maxHeight = '0';
                item.classList.remove('active');
            } else {
                // Open
                content.style.maxHeight = content.scrollHeight + 'px';
                item.classList.add('active');
            }
        }

        // 3. Toggle All Accordions inside a Panel
        function toggleAllAccordions(panelId) {
            const panel = document.getElementById(panelId);
            if (!panel) return;

            const items = panel.querySelectorAll('.curr-acc-item');
            const btn = panel.querySelector('.curr-toggle-all-btn');
            
            // Check if any item is collapsed
            let hasCollapsed = false;
            items.forEach(item => {
                if (!item.classList.contains('active')) {
                    hasCollapsed = true;
                }
            });

            if (hasCollapsed) {
                // Expand All
                items.forEach(item => {
                    item.classList.add('active');
                    const content = item.querySelector('.curr-acc-content');
                    content.style.maxHeight = content.scrollHeight + 'px';
                });
                btn.textContent = 'Thu gọn';
            } else {
                // Collapse All
                items.forEach(item => {
                    item.classList.remove('active');
                    const content = item.querySelector('.curr-acc-content');
                    content.style.maxHeight = '0';
                });
                btn.textContent = 'Mở tất cả';
            }
        }

        // 4. FAQ Accordion Toggle
        document.addEventListener('DOMContentLoaded', () => {
            const faqTriggers = document.querySelectorAll('.faq-trigger');
            faqTriggers.forEach(trigger => {
                trigger.addEventListener('click', () => {
                    const item = trigger.closest('.faq-item');
                    const body = item.querySelector('.faq-body');
                    const content = item.querySelector('.faq-content');
                    const isActive = item.classList.contains('active');
                    
                    // Close all other items
                    document.querySelectorAll('.faq-item').forEach(otherItem => {
                        otherItem.classList.remove('active');
                        const otherBody = otherItem.querySelector('.faq-body');
                        if (otherBody) otherBody.style.maxHeight = '0px';
                    });
                    
                    if (!isActive) {
                        item.classList.add('active');
                        if (body && content) {
                            body.style.maxHeight = content.scrollHeight + 'px';
                        }
                    }
                });
            });

            // Auto-open the first FAQ item by default on page load
            const firstFaqItem = document.querySelector('.faq-item');
            if (firstFaqItem) {
                firstFaqItem.classList.add('active');
                const firstFaqBody = firstFaqItem.querySelector('.faq-body');
                const firstFaqContent = firstFaqItem.querySelector('.faq-content');
                if (firstFaqBody && firstFaqContent) {
                    setTimeout(() => {
                        firstFaqBody.style.maxHeight = firstFaqContent.scrollHeight + 'px';
                    }, 100);
                }
            }
        });

        // 4B. Mobile Horizontal Sliders Navigation Dots
        document.addEventListener('DOMContentLoaded', () => {
            const initMobileSlider = (gridSelector, dotsSelector) => {
                const grid = document.querySelector(gridSelector);
                const dotsContainer = document.querySelector(dotsSelector);
                if (!grid || !dotsContainer) return;
                
                const dots = dotsContainer.querySelectorAll('.dot');
                if (dots.length === 0) return;

                grid.addEventListener('scroll', () => {
                    const scrollLeft = grid.scrollLeft;
                    const firstCard = grid.querySelector('.comp-card, .fac-card, .audience-card');
                    if (!firstCard) return;
                    const cardWidth = firstCard.clientWidth + 16;
                    const activeIndex = Math.round(scrollLeft / cardWidth);
                    
                    dots.forEach((dot, index) => {
                        if (index === activeIndex) {
                            dot.classList.add('active');
                        } else {
                            dot.classList.remove('active');
                        }
                    });
                });
            };
            
            initMobileSlider('.comp-grid', '.comp-dots');
            initMobileSlider('.fac-grid', '.fac-dots');
            initMobileSlider('.audience-grid', '.aud-dots');
        });

        // 4C. Image Lightbox Zoom Modal Toggle
        document.addEventListener('DOMContentLoaded', () => {
            const lightbox = document.getElementById('ble-lightbox');
            const lightboxImg = lightbox.querySelector('.ble-lightbox-img');
            if (!lightbox || !lightboxImg) return;
            
            const zoomables = document.querySelectorAll('.ble-db-image-container, .ai-screen-card, .ble-db-image-container img, .ai-screen-card img');
            zoomables.forEach(el => {
                el.style.cursor = 'zoom-in';
                el.addEventListener('click', (e) => {
                    e.stopPropagation();
                    let src = "";
                    if (el.tagName === 'IMG') {
                        src = el.src;
                    } else {
                        const img = el.querySelector('img');
                        if (img) src = img.src;
                    }
                    if (src) {
                        lightboxImg.src = src;
                        lightbox.classList.add('active');
                    }
                });
            });
        });

        // 5. AJAX Bottom Form Submit Handler
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('ble-bottom-reg-form');
            if (form) {
                form.addEventListener('submit', async (e) => {
                    e.preventDefault();
 
                    const nameInput = document.getElementById('reg-name');
                    const phoneInput = document.getElementById('reg-phone');
                    const emailInput = document.getElementById('reg-email');
                    const eduInput = document.getElementById('reg-education');
                    const engInput = document.getElementById('reg-english');
                    const msgInput = document.getElementById('reg-message');
 
                    const name = nameInput ? nameInput.value.trim() : '';
                    const phone = phoneInput ? phoneInput.value.trim() : '';
                    const email = emailInput ? emailInput.value.trim() : '';
                    const education = eduInput ? eduInput.value : '';
                    const english = engInput ? engInput.value : '';
                    const message = msgInput ? msgInput.value.trim() : '';
 
                    if (!name || !phone || !email || !education || !english) {
                        alert('Vui lòng điền đầy đủ các trường thông tin bắt buộc (*).');
                        return;
                    }
 
                    // Map values for readable notes
                    const eduLabel = eduInput.options[eduInput.selectedIndex].text;
                    const engLabel = engInput.options[engInput.selectedIndex].text;
 
                    const noteText = `Học vấn: ${eduLabel} | Tiếng Anh: ${engLabel}${message ? ' | Lời nhắn: ' + message : ''}`;
 
                    const payload = {
                        form_id: "4fe1eeb0570742a1fdde61af6fc0680c",
                        email: email,
                        firstName: name,
                        phoneNumber: phone,
                        time_dat_lich: "",
                        note_dat_lich: noteText,
                        chuong_trinh_dat_lich: 'Business Leadership Essentials'
                    };
 
                    const webhookPayload = {
                        name: name,
                        phone: phone,
                        email: email,
                        source: "Landing_BLE",
                        type: "ble_page_registration",
                        tieng_anh: english,
                        hoc_van: education,
                        time_dat_lich: "",
                        chuong_trinh: 'Business Leadership Essentials',
                        nhu_cau: noteText
                    };

                    // Bind UTMs
                    const urlParams = new URLSearchParams(window.location.search);
                    const utmParams = ['utm_campaign', 'utm_source', 'utm_medium', 'utm_content', 'utm_term'];
                    utmParams.forEach(param => {
                        const val = urlParams.get(param);
                        if (val) webhookPayload[param] = val;
                    });

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

                        if (typeof window.gtag === 'function') {
                            window.gtag('event', 'conversion', {
                                'send_to': 'AW-11205917800/mdXJCOTL-bccEOj4st8p',
                                'value': 1.0,
                                'currency': 'USD'
                            });
                        }

                        alert('Đăng ký thành công! Chuyên viên học vụ sẽ liên hệ hỗ trợ bạn trong vòng 24h làm việc.');
                        form.reset();
                    } catch (error) {
                        console.error('Submission error:', error);
                        alert('Có lỗi xảy ra trong quá trình gửi thông tin. Vui lòng thử lại sau.');
                    } finally {
                        if (btn) {
                            btn.disabled = false;
                            btn.style.opacity = '1';
                        }
                    }
                });
            }
        });

        // Override openRegModal to trigger our custom promo popup instead
        window.openRegModal = function(source) {
            openBLEPromoModal(source);
        };

        function openBLEPromoModal(source) {
            const modal = document.getElementById('ble-promo-modal');
            const sourceInput = document.getElementById('pmodal-form-source');
            if (modal) {
                if (sourceInput) sourceInput.value = source || 'ble-promo';
                showPModalPromo();
                modal.style.display = 'flex';
            }
        }
        
        function closeBLEPromoModal() {
            const modal = document.getElementById('ble-promo-modal');
            if (modal) {
                modal.style.display = 'none';
            }
        }
        
        function showPModalForm() {
            document.getElementById('pmodal-state-promo').style.display = 'none';
            document.getElementById('ble-promo-form').style.display = 'flex';
        }
        
        function showPModalPromo() {
            document.getElementById('pmodal-state-promo').style.display = 'flex';
            document.getElementById('ble-promo-form').style.display = 'none';
        }

        // AJAX Promo Form Submit Handler
        document.addEventListener('DOMContentLoaded', () => {
            const promoForm = document.getElementById('ble-promo-form');
            if (promoForm) {
                promoForm.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    
                    const name = promoForm.querySelector('[name="name"]').value;
                    const phone = promoForm.querySelector('[name="phone"]').value;
                    const email = promoForm.querySelector('[name="email"]').value;
                    const source = promoForm.querySelector('[name="source"]').value;
                    const btn = promoForm.querySelector('.btn-submit');
                    
                    if (btn) {
                        btn.disabled = true;
                        btn.style.opacity = '0.7';
                    }
                    
                    const webhookPayload = {
                        name: name,
                        phone: phone,
                        email: email,
                        form_source: source,
                        campaign: "Business Leadership Essentials Promo"
                    };

                    const payload = {
                        sheetName: "Business Leadership Essentials Promo",
                        data: {
                            "Họ tên": name,
                            "Số điện thoại": phone,
                            "Email": email,
                            "Nguồn form": source,
                            "Thời gian": new Date().toLocaleString("vi-VN", { timeZone: "Asia/Ho_Chi_Minh" })
                        }
                    };

                    try {
                        const p1 = fetch("https://script.google.com/macros/s/AKfycbyK6H97_MeqCqYnQkFqgPzD4iE1XoH_Rk7VbLqV/exec", {
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
                        
                        if (typeof window.gtag === 'function') {
                            window.gtag('event', 'conversion', {
                                'send_to': 'AW-11205917800/mdXJCOTL-bccEOj4st8p',
                                'value': 1.0,
                                'currency': 'USD'
                            });
                        }
                        
                        alert('Đăng ký nhận học bổng thành công! Chuyên viên học vụ sẽ liên hệ hỗ trợ bạn nhận ưu đãi trong vòng 24h làm việc.');
                        promoForm.reset();
                        closeBLEPromoModal();
                    } catch (error) {
                        console.error('Submission error:', error);
                        alert('Có lỗi xảy ra trong quá trình đăng ký. Vui lòng thử lại sau.');
                    } finally {
                        if (btn) {
                            btn.disabled = false;
                            btn.style.opacity = '1';
                        }
                    }
                });
            }
        });
    </script>

    <!-- Lightbox Zoom Modal for screenshots -->
    <div id="ble-lightbox" class="ble-lightbox" onclick="this.classList.remove('active')">
        <span class="ble-lightbox-close">&times;</span>
        <img class="ble-lightbox-img" src="" alt="Zoomed view">
    </div>

    <!-- Premium July Free Promo Modal (Custom styled after reference) -->
    <div id="ble-promo-modal" class="ble-pmodal" role="dialog" aria-modal="true" style="display: none;">
        <div class="ble-pmodal-overlay" onclick="closeBLEPromoModal()"></div>
        <div class="ble-pmodal-container">
            <button class="ble-pmodal-close" onclick="closeBLEPromoModal()">&times;</button>
            <div class="ble-pmodal-content">
                <!-- Top Sponsor Logos -->
                <div class="ble-pmodal-logos">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg-optimized.webp" class="pmodal-logo-ideas" alt="IDEAS Logo">
                    <div class="pmodal-logo-divider"></div>
                    <span class="pmodal-partner-text">SWISS UMEF PARTNER</span>
                </div>
                
                <div class="ble-pmodal-divider"></div>
                
                <!-- Center Gold Badge -->
                <div class="ble-pmodal-badge-container">
                    <div class="ble-pmodal-gold-badge">
                        <span class="badge-label">HỌC BỔNG</span>
                        <span class="badge-value">100%</span>
                    </div>
                </div>
                
                <!-- Headers -->
                <h3 class="ble-pmodal-serif-title">Đặc Quyền Đồng Hành</h3>
                <h2 class="ble-pmodal-main-title">Tài Trợ 100% Học Phí Khóa học<br>Business Leadership Essentials</h2>
                
                <!-- Description -->
                <p class="ble-pmodal-desc">
                    Áp dụng khi đăng ký học vụ duy nhất trong tháng 07/2026. Nhận học bổng Learning Grant tài trợ 100% học phí toàn khóa học trị giá <strong>12.000.000 VNĐ</strong>.
                </p>
                
                <!-- Action / Form Container -->
                <div class="ble-pmodal-action-wrapper">
                    <!-- State 1: Action Button -->
                    <div id="pmodal-state-promo" class="pmodal-state-active" style="width: 100%; display: flex; flex-direction: column; align-items: center;">
                        <button class="ble-pmodal-btn" onclick="showPModalForm()">Nhận Học Bổng Ngay</button>
                        <a href="javascript:void(0)" class="ble-pmodal-link" onclick="closeBLEPromoModal()">Xem lộ trình học</a>
                    </div>
                    
                    <!-- State 2: Contact Form Inputs -->
                    <form id="ble-promo-form" class="pmodal-form" style="display: none;">
                        <input type="text" name="name" placeholder="Họ và tên *" required class="pmodal-input">
                        <input type="tel" name="phone" placeholder="Số điện thoại *" required class="pmodal-input">
                        <input type="email" name="email" placeholder="Địa chỉ Email *" required class="pmodal-input">
                        <input type="hidden" name="source" id="pmodal-form-source" value="ble-promo">
                        
                        <button type="submit" class="ble-pmodal-btn btn-submit" style="margin-top: 5px;">Gửi Đăng Ký Nhận Học Bổng</button>
                        <a href="javascript:void(0)" class="ble-pmodal-link" onclick="showPModalPromo()">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
