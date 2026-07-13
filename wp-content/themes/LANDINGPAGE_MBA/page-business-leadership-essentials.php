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
            gap: 60px;
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
            line-height: 1.6;
            color: #334155;
            margin-bottom: 40px;
            max-width: 600px;
        }

        .ble-hero-features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 40px;
        }

        .ble-hero-feature-item {
            background: #ffffff;
            padding: 20px;
            border-radius: 16px;
            border: 1.5px solid #cbd5e1; /* no top border */
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.03);
            display: flex;
            flex-direction: column;
            gap: 6px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .ble-hero-feature-item:hover {
            border-color: #ab0e00;
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(171, 14, 0, 0.08);
        }

        .ble-hero-feature-item .feat-lbl {
            font-size: 0.7rem;
            font-weight: 800;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .ble-hero-feature-item .feat-val {
            font-size: 0.88rem;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.35;
        }

        .ble-hero-promo {
            display: flex;
            align-items: center;
            gap: 16px;
            background: rgba(171, 14, 0, 0.04);
            border: 1.5px dashed rgba(171, 14, 0, 0.25);
            padding: 18px 24px;
            border-radius: 16px;
            margin-bottom: 36px;
        }

        .ble-hero-promo-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ab0e00;
        }

        .ble-hero-promo-text {
            font-size: 0.95rem;
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
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .ble-dashboard-preview:hover {
            transform: translateY(-4px);
            box-shadow: 0 25px 60px rgba(171, 14, 0, 0.4);
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
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .db-progress-lbl {
            display: flex;
            justify-content: space-between;
            font-size: 0.75rem;
            font-weight: 800;
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 10px;
        }

        .db-progress-lbl span:last-child {
            color: #ffffff;
        }

        .db-progress-bar {
            height: 8px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 100px;
            overflow: hidden;
        }

        .db-progress-fill {
            height: 100%;
            background: #ffffff;
            width: 75%;
            border-radius: 100px;
        }

        .db-module-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .db-module-item {
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 12px 16px;
            border-radius: 12px;
        }

        .db-module-icon {
            width: 24px;
            height: 24px;
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
        }

        .db-module-icon.pending {
            background: rgba(255, 255, 255, 0.12);
            color: #ffffff;
        }

        .db-module-title {
            font-size: 0.82rem;
            font-weight: 750;
            color: rgba(255, 255, 255, 0.95);
        }

        /* Floating Badge in Hero visual */
        .db-floating-badge {
            position: absolute;
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #cbd5e1;
            padding: 14px 18px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 10;
            animation: float-gentle 4s ease-in-out infinite alternate;
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
            background: linear-gradient(135deg, #ab0e00 0%, #7a0900 60%, #4d0000 100%);
            padding: 70px 20px;
            color: #ffffff;
            border-top: 1px solid #4d0000;
            border-bottom: 1px solid #4d0000;
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
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
        }

        .ble-db-info-row {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
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
            border-right: 1.5px solid rgba(255, 255, 255, 0.2);
            padding-right: 15px;
        }

        .ble-db-info-col:last-child {
            border-right: none;
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
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.1);
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
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            border: 6px solid #ffffff;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: block;
            width: 100%;
        }

        .ble-db-image-container:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 25px 60px rgba(0,0,0,0.25);
        }

        .ble-db-image-container img {
            width: 100%;
            height: auto;
            object-fit: cover;
            display: block;
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
        }

        .pain-list-item {
            display: flex;
            gap: 24px;
            background: #ffffff;
            padding: 24px 30px;
            border-radius: 20px;
            border: 1.5px solid rgba(171, 14, 0, 0.12);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.015);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            align-items: flex-start;
        }

        .pain-list-item:hover {
            border-color: #ab0e00;
            transform: translateX(6px);
            box-shadow: 0 15px 35px rgba(171, 14, 0, 0.05);
        }

        .pain-number {
            font-size: 2.2rem;
            font-weight: 900;
            color: rgba(171, 14, 0, 0.15);
            line-height: 1;
            font-style: italic;
            transition: color 0.3s ease;
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin-top: 2px;
        }

        .pain-list-item:hover .pain-number {
            color: #ab0e00;
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
            color: #334155 !important;
            margin: 0;
        }

        /* ── Wow Stat Card on Left Column of Pain Points ── */
        .pain-stat-card {
            background: #ffffff;
            border-radius: 24px;
            border: 1.5px solid rgba(171, 14, 0, 0.12);
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 10px 30px rgba(171, 14, 0, 0.02);
            margin-top: 36px;
            position: relative;
            overflow: hidden;
            text-align: left;
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
            border-radius: 20px;
            border: 1.5px solid rgba(171, 14, 0, 0.15); /* red border for competencies as well */
            border-top: 4.5px solid #ab0e00;
            padding: 32px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            position: relative;
            box-shadow: 0 10px 30px rgba(171, 14, 0, 0.02);
            z-index: 2;
        }

        .comp-card:hover {
            transform: translateY(-6px);
            border-color: #ab0e00;
            box-shadow: 0 20px 50px rgba(171, 14, 0, 0.1);
        }

        .comp-icon-box {
            color: #ab0e00;
            margin-bottom: 24px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(171, 14, 0, 0.05);
            width: 56px;
            height: 56px;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            align-self: flex-start;
        }

        .comp-card:hover .comp-icon-box {
            background: #ab0e00 !important;
            color: #ffffff !important;
            transform: scale(1.08);
        }

        .comp-card:hover .comp-icon-box svg {
            stroke: #ffffff !important;
        }

        .comp-card:hover .comp-icon-box svg polygon {
            stroke: #ffffff !important;
        }

        .comp-card-caps-title {
            font-size: 0.92rem;
            font-weight: 900;
            color: #0f172a;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .comp-desc {
            font-size: 0.88rem;
            line-height: 1.6;
            color: #334155 !important; /* High contrast readable dark slate color */
            margin: 0;
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
            gap: 40px;
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
        }

        .curr-tab-title {
            font-size: 1.05rem;
            font-weight: 800;
            color: #475569;
            line-height: 1.35;
        }

        .curr-tab:hover {
            border-color: #ab0e00;
            transform: translateY(-2px);
        }

        .curr-tab.active {
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(171, 14, 0, 0.04);
            border-color: #ab0e00; /* Red active border on all sides */
        }

        .curr-tab.active .curr-tab-title {
            color: #0f172a;
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
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .curr-acc-item.active {
            border-color: #ab0e00; /* Red active border on all sides */
            box-shadow: 0 10px 25px rgba(171, 14, 0, 0.02);
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
            background: #faf8f5;
            border-radius: 16px;
            padding: 28px;
            border: 1px dashed #cbd5e1;
        }

        .curr-outcomes-title {
            font-size: 0.95rem;
            font-weight: 900;
            color: #0f172a;
            margin: 0 0 16px 0;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            display: flex;
            align-items: center;
            gap: 8px;
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
            grid-template-columns: 0.8fr 1.2fr;
            gap: 60px;
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

        /* Chat UI Mockup (Expanded & Wider) */
        .ai-chat-mockup {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #cbd5e1;
            box-shadow: 0 15px 30px rgba(15,23,42,0.05);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 620px;
            min-height: 480px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .ai-chat-mockup:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 50px rgba(171, 14, 0, 0.08);
            border-color: rgba(171, 14, 0, 0.25);
        }

        .chat-header {
            background: #f8fafc;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e2e8f0;
        }

        .chat-header-user {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .chat-header-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #10b981;
            box-shadow: 0 0 10px rgba(16,185,129,0.3);
        }

        .chat-header-title {
            font-size: 0.95rem;
            font-weight: 800;
            color: #0f172a;
        }

        .chat-header-subtitle {
            font-size: 0.75rem;
            color: #64748b;
        }

        .chat-body {
            flex-grow: 1;
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            overflow-y: auto;
            background: #ffffff;
        }

        .chat-bubble {
            max-width: 80%;
            padding: 14px 18px;
            border-radius: 16px;
            font-size: 0.88rem;
            line-height: 1.55;
        }

        .chat-bubble.student {
            background: #ab0e00;
            color: #ffffff;
            align-self: flex-end;
            border-bottom-right-radius: 4px;
            border: 1px solid #ab0e00;
        }

        .chat-bubble.ai {
            background: rgba(171, 14, 0, 0.03);
            color: #334155;
            align-self: flex-start;
            border-bottom-left-radius: 4px;
            border: 1px solid rgba(171, 14, 0, 0.15);
        }

        .chat-bubble.ai strong {
            color: #ab0e00;
        }

        .chat-bubble-source {
            font-size: 0.72rem;
            color: #64748b;
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
        }

        .chat-bubble-source svg {
            color: #ab0e00;
        }

        .chat-input-bar {
            background: #f8fafc;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-top: 1px solid #e2e8f0;
        }

        .chat-input {
            flex-grow: 1;
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 100px;
            padding: 10px 18px;
            color: #94a3b8;
            font-size: 0.85rem;
            pointer-events: none;
        }

        .chat-send-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #ab0e00;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
        }

        /* ── Faculty Section ────────────────── */
        .fac-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .fac-card {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid #cbd5e1;
            padding: 36px 30px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.02);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .fac-card:hover {
            transform: translateY(-4px);
            border-color: #ab0e00;
            box-shadow: 0 20px 50px rgba(171, 14, 0, 0.08);
        }

        .fac-avatar-wrap {
            position: relative;
            margin-bottom: 24px;
        }

        .fac-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #f8fafc;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
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

        /* ── FAQ & Registration Combined Layout (Cask-style Bottom Section) ── */
        .faq-form-grid {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 50px;
            align-items: flex-start;
        }

        .ble-reg-card {
            background: #ffffff;
            border-radius: 28px;
            border: 1.5px solid #cbd5e1;
            padding: 40px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.03);
            text-align: left;
            position: relative;
        }

        .ble-reg-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #ab0e00, #ff5252);
            border-top-left-radius: 28px;
            border-top-right-radius: 28px;
        }

        .ble-reg-card-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .reg-tag-11 {
            display: inline-block;
            background: #ab0e00;
            color: #ffffff;
            font-size: 0.72rem;
            font-weight: 800;
            padding: 4px 14px;
            border-radius: 100px;
            letter-spacing: 0.05em;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        .ble-reg-card h3 {
            font-size: 1.45rem;
            font-weight: 900;
            color: #0f172a;
            margin: 0 0 10px 0;
            line-height: 1.3;
            text-align: center;
        }

        .ble-reg-card p {
            font-size: 0.85rem;
            color: #64748b;
            line-height: 1.5;
            margin: 0 0 24px 0;
            text-align: center;
        }

        .ble-reg-form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .ble-reg-form .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            text-align: left;
        }

        .ble-reg-form .form-group label {
            font-size: 0.78rem;
            font-weight: 800;
            color: #475569;
        }

        .ble-reg-form .form-group input,
        .ble-reg-form .form-group select,
        .ble-reg-form .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border-radius: 10px;
            background: #ffffff;
            border: 1px solid #cbd5e1;
            color: #0f172a;
            font-size: 0.9rem;
            outline: none;
            transition: all 0.2s ease;
            box-sizing: border-box;
            font-family: inherit;
        }

        .ble-reg-form .form-group input:focus,
        .ble-reg-form .form-group select:focus,
        .ble-reg-form .form-group textarea:focus {
            border-color: #ab0e00;
            box-shadow: 0 0 0 3px rgba(171,14,0,0.1);
        }

        .ble-reg-form .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .ble-btn-submit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            background: #ab0e00;
            color: #ffffff !important;
            font-weight: 800;
            font-size: 0.95rem;
            padding: 14px 20px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(171, 14, 0, 0.15);
            text-decoration: none !important;
            z-index: 5;
            margin-top: 10px;
            gap: 8px;
        }

        .ble-btn-submit:hover {
            background: #8c1000;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(171, 14, 0, 0.25);
        }

        /* ── FAQ Section (Inside combined section) ── */
        .faq-col .faq-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
            max-width: 100%;
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
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .ble-hero-actions {
                justify-content: center;
            }

            .ble-hero-visual {
                order: -1;
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
                width: 100%;
                flex-direction: row;
                overflow-x: auto;
                padding-bottom: 8px;
                scroll-snap-type: x mandatory;
            }

            .curr-tab {
                min-width: 250px;
                scroll-snap-align: start;
                border-left: 1px solid #cbd5e1;
                border-bottom: 4px solid transparent;
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

            .faq-form-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }
        }

        @media (max-width: 640px) {
            .ble-db-info-row {
                grid-template-columns: repeat(2, 1fr);
            }

            .ble-db-actions {
                flex-direction: column;
                width: 100%;
            }

            .ble-db-actions button,
            .ble-db-actions a {
                width: 100%;
            }

            .comp-grid,
            .audience-grid,
            .fac-grid {
                grid-template-columns: 1fr;
                gap: 20px;
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

            .ble-hero-actions {
                flex-direction: column;
                width: 100%;
            }

            .ble-hero-actions .ble-btn {
                width: 100%;
            }

            .db-floating-badge {
                display: none;
            }
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

                        <!-- Features Grid -->
                        <div class="ble-hero-features">
                            <div class="ble-hero-feature-item">
                                <span class="feat-lbl">Thời lượng</span>
                                <span class="feat-val">03 - 04 tháng</span>
                            </div>
                            <div class="ble-hero-feature-item">
                                <span class="feat-lbl">Hình thức học</span>
                                <span class="feat-val">Online, trực tuyến kết hợp tự học</span>
                            </div>
                            <div class="ble-hero-feature-item">
                                <span class="feat-lbl">Tên chứng nhận</span>
                                <span class="feat-val">Certificate in Business Leadership Essentials</span>
                            </div>
                        </div>

                        <!-- Special Promo Box -->
                        <div class="ble-hero-promo">
                            <div class="ble-hero-promo-icon">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M20 12v10H4V12M2 7h20v5H2zM12 22V7M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7zM12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg>
                            </div>
                            <div class="ble-hero-promo-text">Học miễn phí toàn khóa khi đăng ký trong tháng 7</div>
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
                            <div class="ble-dashboard-badge">Online LMS Portal</div>
                            <div class="db-header">
                                <div class="db-avatar">LM</div>
                                <div class="db-user-info">
                                    <h5>Lê Minh (Học viên)</h5>
                                    <span>Lớp: BLE-K2026</span>
                                </div>
                            </div>

                            <div class="db-progress-card">
                                <div class="db-progress-lbl">
                                    <span>Tiến độ học tập</span>
                                    <span>75% Hoàn thành</span>
                                </div>
                                <div class="db-progress-bar">
                                    <div class="db-progress-fill"></div>
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
                                <div class="db-module-item">
                                    <div class="db-module-icon pending">
                                        <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                                    </div>
                                    <span class="db-module-title">Human Capital Management (Đang học)</span>
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
                            <div class="ble-db-info-col">
                                <span class="ble-db-info-label">Hình thức</span>
                                <span class="ble-db-info-value">Hybrid (Online + Mentor)</span>
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
            </div>
        </section>

        <!-- 4. INTERACTIVE CURRICULUM SECTION (Warm Cream Background, Ambient Glow) -->
        <section class="ble-section bg-soft-cream" id="curriculum">
            <!-- Background Glow Orbs -->
            <div class="ble-glow-orb ble-glow-orb-primary" style="bottom: 5%; right: -10%;"></div>

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

                    <!-- Right: Premium Chat UI Mockup (Expanded & Wider) -->
                    <div class="ai-visual">
                        <div class="ai-chat-mockup">
                            <div class="chat-header">
                                <div class="chat-header-user">
                                    <div class="chat-header-dot"></div>
                                    <div>
                                        <div class="chat-header-title">IDEAS Academic Assistant</div>
                                        <div class="chat-header-subtitle">Trợ lý AI Học thuật • Đang hoạt động</div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-body">
                                <div class="chat-bubble student">
                                    Làm cách nào để tạo động lực cho nhân sự Gen Z trong nhóm của mình?
                                </div>
                                <div class="chat-bubble ai">
                                    Dựa trên môn học <strong>Organizational Behaviour (Học phần 2)</strong>, để tạo động lực cho Gen Z, bạn nên áp dụng 3 nguyên tắc cốt lõi:
                                    <br><br>
                                    1. <strong>Autonomy (Tính tự chủ)</strong>: Trao quyền chủ động giải quyết công việc thay vì kiểm soát quá chi tiết (Micromanagement).
                                    <br>
                                    2. <strong>Purpose (Ý nghĩa công việc)</strong>: Giúp họ nhìn thấy đóng góp của mình vào mục tiêu chung.
                                    <br>
                                    3. <strong>Immediate Feedback</strong>: Đưa ra phản hồi nhanh, công nhận kịp thời.
                                    <div class="chat-bubble-source">
                                        <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M4 4.5A2.5 2.5 0 0 1 6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5z"/></svg>
                                        &nbsp;Nguồn tham khảo: Giáo trình OB - Chương 3: Motivation Models (Trang 114)
                                    </div>
                                </div>
                            </div>
                            <div class="chat-input-bar">
                                <div class="chat-input">Đặt câu hỏi học thuật tại đây...</div>
                                <button class="chat-send-btn">
                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                                </button>
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
            </div>
        </section>

        <!-- 7. CERTIFICATE SHOWCASE SECTION (White Background, Ambient Glow) -->
        <section class="ble-section bg-white">
            <!-- Background Glow Orbs -->
            <div class="ble-glow-orb ble-glow-orb-primary" style="bottom: 10%; left: -10%;"></div>

            <div class="ble-container">
                <div class="cert-wrap">
                    <!-- Left: Text Info -->
                    <div class="cert-info">
                        <span class="ble-section-tag">
                            <span class="dot"></span> Chứng nhận tốt nghiệp
                        </span>
                        <h2 class="ble-section-title">Đạt chứng chỉ chuẩn Thụy Sĩ</h2>
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
            </div>
        </section>

        <!-- 9. COMBINED FAQ & REGISTRATION SECTION (Soft Cream Background, Red Accent Form) -->
        <section class="ble-section bg-soft-cream" style="padding-bottom: 120px;">
            <div class="ble-container">
                <div class="faq-form-grid">
                    <!-- Left: FAQ accordions list -->
                    <div class="faq-col">
                        <span class="ble-section-tag">
                            <span class="dot"></span> FAQ
                        </span>
                        <h2 class="ble-section-title" style="text-align: left; margin-bottom: 16px;">Câu hỏi thường gặp</h2>
                        <p class="ble-section-subtitle" style="margin-bottom: 40px; text-align: left;">Giải đáp một số thắc mắc phổ biến của các học viên:</p>

                        <div class="faq-list">
                            <!-- FAQ 1 -->
                            <div class="faq-item">
                                <div class="faq-header" onclick="toggleFaq(this)">
                                    <span class="faq-question">1. Vì sao chương trình chỉ gồm 3 môn học?</span>
                                    <span class="faq-arrow">
                                        <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="6 9 12 15 18 9"/></svg>
                                    </span>
                                </div>
                                <div class="faq-content">
                                    <div class="faq-content-inner">
                                        Đây là ba môn học nền tảng quan trọng được lựa chọn từ hệ thống học phần của Swiss UMEF, tập trung vào năng lực cốt lõi của một nhà quản lý hiện đại: lãnh đạo đội ngũ, thấu hiểu con người và phát triển nhân tài.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ 2 -->
                            <div class="faq-item">
                                <div class="faq-header" onclick="toggleFaq(this)">
                                    <span class="faq-question">2. Mình không làm trong lĩnh vực nhân sự, chương trình có phù hợp không?</span>
                                    <span class="faq-arrow">
                                        <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="6 9 12 15 18 9"/></svg>
                                    </span>
                                </div>
                                <div class="faq-content">
                                    <div class="faq-content-inner">
                                        Có. Chương trình được thiết kế dành cho quản lý cấp trung, trưởng nhóm, chủ doanh nghiệp và nhân sự nguồn. Nội dung tập trung vào lãnh đạo, quản lý đội ngũ và phát triển con người, không yêu cầu học viên có chuyên môn về nhân sự.
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ 3 -->
                            <div class="faq-item">
                                <div class="faq-header" onclick="toggleFaq(this)">
                                    <span class="faq-question">3. Sau khi hoàn thành chương trình mình sẽ nhận được gì?</span>
                                    <span class="faq-arrow">
                                        <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="6 9 12 15 18 9"/></svg>
                                    </span>
                                </div>
                                <div class="faq-content">
                                    <div class="faq-content-inner">
                                        Học viên sẽ phát triển 8 năng lực cốt lõi về lãnh đạo và quản trị đội ngũ, đồng thời nắm vững các nguyên tắc và framework quản trị con người được ứng dụng trong doanh nghiệp hiện đại. Đây sẽ là nền tảng để bạn tự tin dẫn dắt đội ngũ, nâng cao hiệu suất tổ chức và phát triển sự nghiệp ở các vị trí quản lý.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Registration Form Card aligned with mba.html style -->
                    <div class="form-col">
                        <div class="ble-reg-card">
                            <div class="ble-reg-card-header">
                                <span class="reg-tag-11">NHẬN TƯ VẤN 1:1</span>
                                <h3>Khởi đầu hành trình<br><span class="ble-gradient-text">Lãnh đạo thực chiến</span></h3>
                                <p>Chuyên viên sẽ liên hệ với bạn trong vòng 24h làm việc để tư vấn lộ trình phù hợp.</p>
                            </div>
                            
                            <form id="ble-bottom-reg-form" class="ble-reg-form" novalidate>
                                <div class="form-group">
                                    <label for="reg-name">Họ và tên *</label>
                                    <input type="text" id="reg-name" name="fullname" placeholder="Họ và tên của bạn" required>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="reg-phone">Số điện thoại *</label>
                                        <input type="tel" id="reg-phone" name="phone" placeholder="Số điện thoại" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="reg-email">Email *</label>
                                        <input type="email" id="reg-email" name="email" placeholder="Địa chỉ email" required>
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
                                    <textarea id="reg-message" name="message" placeholder="Ví dụ: Tôi muốn tìm hiểu về lộ trình học tập, thời gian khai giảng..." rows="3"></textarea>
                                </div>

                                <button type="submit" class="ble-btn-submit">
                                    <span>Gửi thông tin đăng ký</span>
                                    <svg class="btn-arrow" width="18" height="18" fill="none" viewBox="0 0 24 24" aria-hidden="true" style="color: #ffffff;">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                                    </svg>
                                </button>
                                
                                <p class="form-privacy">Cam kết bảo mật thông tin</p>
                            </form>
                        </div>
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
        function toggleFaq(headerElement) {
            const item = headerElement.parentElement;
            const content = item.querySelector('.faq-content');
            const isActive = item.classList.contains('active');

            if (isActive) {
                content.style.maxHeight = '0';
                item.classList.remove('active');
            } else {
                content.style.maxHeight = content.scrollHeight + 'px';
                item.classList.add('active');
            }
        }

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
    </script>
</body>

</html>
