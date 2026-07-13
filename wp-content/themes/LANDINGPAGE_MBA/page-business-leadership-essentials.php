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

        /* ── Typography & Accents ──────────── */
        .ble-gradient-text {
            background: linear-gradient(135deg, #ab0e00 0%, #d92414 60%, #e11d48 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 850;
        }

        /* ── Sections Common (Light Backgrounds) ── */
        .ble-section {
            padding: 100px 20px;
            position: relative;
            background-color: #ffffff;
        }

        .ble-section.bg-white {
            background-color: #ffffff;
        }

        .ble-section.bg-light-gray {
            background-color: #f8fafc;
            border-top: 1px solid #f1f5f9;
            border-bottom: 1px solid #f1f5f9;
        }

        .ble-section.bg-soft-cream {
            background-color: #faf9f6;
            border-top: 1px solid #f4f2ee;
            border-bottom: 1px solid #f4f2ee;
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

        .ble-section-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(171, 14, 0, 0.07);
            color: #ab0e00;
            padding: 6px 18px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 18px;
            border: 1px solid rgba(171, 14, 0, 0.12);
        }

        .ble-section-title {
            font-size: clamp(2.2rem, 4.5vw, 2.8rem);
            font-weight: 900;
            color: #0f172a;
            margin: 0 0 16px 0;
            line-height: 1.25;
            letter-spacing: -0.02em;
        }

        .ble-section-subtitle {
            font-size: 1.05rem;
            color: #475569;
            line-height: 1.6;
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
            border-radius: 4px;
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

        /* ── Buttons ───────────────────────── */
        .ble-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: linear-gradient(135deg, #ab0e00 0%, #8c1000 100%);
            color: #ffffff !important;
            font-weight: 750;
            font-size: 0.95rem;
            padding: 16px 38px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 4px 15px rgba(171, 14, 0, 0.2);
            text-decoration: none !important;
            position: relative;
            overflow: hidden;
        }

        .ble-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(171, 14, 0, 0.35);
            background: linear-gradient(135deg, #b81405 0%, #9c1200 100%);
        }

        .ble-btn:active {
            transform: translateY(0);
        }

        .ble-btn-outline {
            background: transparent;
            color: #0f172a !important;
            border: 1.5px solid #0f172a;
            box-shadow: none;
        }

        .ble-btn-outline:hover {
            background: #f8fafc;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        }

        /* ── Hero Section ──────────────────── */
        .ble-hero {
            padding-top: 170px;
            padding-bottom: 120px;
            background: radial-gradient(120% 120% at 50% 0%, #ffffff 60%, rgba(171, 14, 0, 0.03) 100%);
            border-bottom: 1px solid #f1f5f9;
        }

        .ble-hero-grid {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 60px;
            align-items: center;
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
            padding: 6px 14px;
            border-radius: 4px;
            margin-bottom: 24px;
        }

        .ble-hero-tag span {
            display: inline-block;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #ab0e00;
            animation: pulse-dot 1.5s infinite;
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
            font-size: clamp(1.05rem, 2.5vw, 1.2rem);
            line-height: 1.6;
            color: #475569;
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
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.015);
            display: flex;
            flex-direction: column;
            gap: 6px;
            transition: all 0.3s ease;
        }

        .ble-hero-feature-item:hover {
            border-color: rgba(171, 14, 0, 0.2);
            transform: translateY(-2px);
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
            border: 1px dashed rgba(171, 14, 0, 0.25);
            padding: 18px 24px;
            border-radius: 8px;
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
            font-weight: 700;
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
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #cbd5e1;
            box-shadow: 0 20px 40px rgba(15,23,42,0.06);
            width: 100%;
            max-width: 440px;
            padding: 30px;
            position: relative;
            overflow: visible;
        }

        .ble-dashboard-badge {
            position: absolute;
            top: -14px;
            right: 20px;
            background: #10b981;
            color: #ffffff;
            padding: 4px 12px;
            border-radius: 4px;
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
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 20px;
        }

        .db-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f87171 0%, #ab0e00 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-weight: 800;
            font-size: 1.1rem;
        }

        .db-user-info h5 {
            margin: 0 0 4px 0;
            font-size: 0.95rem;
            font-weight: 800;
            color: #0f172a;
        }

        .db-user-info span {
            font-size: 0.75rem;
            color: #64748b;
            font-weight: 600;
        }

        .db-progress-card {
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .db-progress-lbl {
            display: flex;
            justify-content: space-between;
            font-size: 0.75rem;
            font-weight: 800;
            color: #475569;
            margin-bottom: 10px;
        }

        .db-progress-lbl span:last-child {
            color: #ab0e00;
        }

        .db-progress-bar {
            height: 8px;
            background: #e2e8f0;
            border-radius: 100px;
            overflow: hidden;
        }

        .db-progress-fill {
            height: 100%;
            background: #ab0e00;
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
            background: #ffffff;
            border: 1px solid #e2e8f0;
            padding: 12px 16px;
            border-radius: 8px;
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
            background: rgba(171, 14, 0, 0.08);
            color: #ab0e00;
        }

        .db-module-title {
            font-size: 0.82rem;
            font-weight: 750;
            color: #334155;
        }

        /* Floating Badge in Hero visual */
        .db-floating-badge {
            position: absolute;
            background: #ffffff;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            padding: 14px 18px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 10;
        }

        .db-floating-badge.badge-1 {
            bottom: 20px;
            left: -40px;
            animation: float-badge-1 4s ease-in-out infinite;
        }

        .db-floating-badge.badge-2 {
            top: 60px;
            right: -40px;
            animation: float-badge-2 4.5s ease-in-out infinite;
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

        /* ── COURSE DETAILS BANNER (Solid Red Cask.vn Layout) ── */
        .ble-details-banner {
            background: #ab0e00;
            padding: 70px 20px;
            color: #ffffff;
            border-top: 1px solid #8c1000;
            border-bottom: 1px solid #8c1000;
        }

        .ble-db-grid {
            display: grid;
            grid-template-columns: 1.25fr 0.75fr;
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
            gap: 20px;
            border-top: 1.5px solid rgba(255, 255, 255, 0.2);
            border-bottom: 1.5px solid rgba(255, 255, 255, 0.2);
            padding: 22px 0;
            margin-bottom: 35px;
        }

        .ble-db-info-col {
            display: flex;
            flex-direction: column;
            gap: 6px;
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

        .ble-btn-gold {
            background: #d99f38;
            color: #ffffff !important;
            font-weight: 800;
            font-size: 0.95rem;
            padding: 15px 32px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(217, 159, 56, 0.2);
            transition: all 0.2s ease;
            text-decoration: none !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .ble-btn-gold:hover {
            background: #c38c2d;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(217, 159, 56, 0.35);
        }

        .ble-btn-white-outline {
            background: transparent;
            color: #ffffff !important;
            border: 1.5px solid #ffffff;
            font-weight: 750;
            font-size: 0.95rem;
            padding: 13px 30px;
            border-radius: 4px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
            text-decoration: none !important;
        }

        .ble-btn-white-outline:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .ble-db-video-wrapper {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            aspect-ratio: 1.55;
            background: #1e293b;
            border: 4px solid #ffffff;
            cursor: pointer;
            transition: transform 0.3s ease;
            display: block;
        }

        .ble-db-video-wrapper:hover {
            transform: translateY(-4px);
        }

        .ble-db-video-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.85;
        }

        .ble-db-play-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 68px;
            height: 46px;
            background: #ff0000;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .ble-db-video-wrapper:hover .ble-db-play-btn {
            background: #cc0000;
            transform: translate(-50%, -50%) scale(1.1);
        }

        /* ── Pain Points Section ── */
        .pain-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }

        .pain-card {
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            padding: 40px;
            box-shadow: 0 4px 15px rgba(15,23,42,0.015);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            gap: 24px;
        }

        .pain-card:hover {
            transform: translateY(-4px);
            border-color: #ab0e00;
            box-shadow: 0 10px 25px rgba(171,14,0,0.05);
        }

        .pain-icon-box {
            font-size: 2.5rem;
            font-weight: 950;
            font-style: italic;
            color: #ab0e00;
            line-height: 1;
            font-family: 'Plus Jakarta Sans', sans-serif;
            flex-shrink: 0;
        }

        .pain-card-content h4 {
            font-size: 1.15rem;
            font-weight: 850;
            color: #0f172a;
            margin: 0 0 12px 0;
            line-height: 1.4;
        }

        .pain-card-content p {
            font-size: 0.95rem;
            line-height: 1.65;
            color: #475569;
            margin: 0;
        }

        /* ── 8 Core Competencies ── */
        .comp-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .comp-card {
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            padding: 32px;
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            position: relative;
            box-shadow: 0 4px 15px rgba(15,23,42,0.01);
        }

        .comp-card:hover {
            transform: translateY(-4px);
            border-color: #ab0e00;
            box-shadow: 0 12px 28px rgba(171,14,0,0.06);
        }

        .comp-num-large {
            font-size: 3rem;
            font-weight: 950;
            font-style: italic;
            color: #ab0e00;
            line-height: 1;
            margin-bottom: 20px;
            font-family: 'Plus Jakarta Sans', sans-serif;
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
            color: #475569;
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
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            padding: 36px 30px;
            box-shadow: 0 4px 15px rgba(15,23,42,0.01);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .audience-card:hover {
            transform: translateY(-4px);
            border-color: #ab0e00;
            box-shadow: 0 10px 25px rgba(171,14,0,0.05);
        }

        .audience-icon-box {
            width: 64px;
            height: 64px;
            border-radius: 8px;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            color: #ab0e00;
            transition: all 0.3s ease;
        }

        .audience-card:hover .audience-icon-box {
            background: rgba(171, 14, 0, 0.05);
            border-color: #ab0e00;
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
            color: #475569;
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
        }

        .curr-tab {
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 24px;
            cursor: pointer;
            text-align: left;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            border-left: 4px solid transparent;
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
            transform: translateX(4px);
        }

        .curr-tab.active {
            border-left-color: #ab0e00;
            background: #ffffff;
            box-shadow: 0 8px 24px rgba(0,0,0,0.04);
            border-color: #cbd5e1;
        }

        .curr-tab.active .curr-tab-title {
            color: #0f172a;
        }

        .curr-details {
            width: 68%;
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            padding: 45px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.015);
            display: flex;
            flex-direction: column;
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
            border-radius: 4px;
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
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .curr-acc-item.active {
            border-left: 4px solid #ab0e00;
            border-color: #cbd5e1;
            box-shadow: 0 4px 15px rgba(0,0,0,0.01);
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
            border-radius: 4px;
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
            transition: max-height 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .curr-acc-content-inner {
            padding: 0 24px 24px 62px;
            border-top: 1px solid #f1f5f9;
            padding-top: 20px;
            background-color: #faf9f6;
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
            background: #faf9f6;
            border-radius: 8px;
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
            grid-template-columns: 0.9fr 1.1fr;
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

        /* Chat UI Mockup */
        .ai-chat-mockup {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #cbd5e1;
            box-shadow: 0 15px 30px rgba(15,23,42,0.05);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            aspect-ratio: 1.35;
        }

        .chat-header {
            background: #f8fafc;
            padding: 16px 24px;
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
            font-size: 0.88rem;
            font-weight: 800;
            color: #0f172a;
        }

        .chat-header-subtitle {
            font-size: 0.72rem;
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
            border-radius: 12px;
            font-size: 0.85rem;
            line-height: 1.5;
        }

        .chat-bubble.student {
            background: #f1f5f9;
            color: #334155;
            align-self: flex-end;
            border-bottom-right-radius: 4px;
            border: 1px solid #e2e8f0;
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
            font-size: 0.7rem;
            color: #64748b;
            margin-top: 6px;
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
            font-size: 0.82rem;
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
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            padding: 36px 30px;
            box-shadow: 0 4px 15px rgba(15,23,42,0.005);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .fac-card:hover {
            transform: translateY(-4px);
            border-color: #ab0e00;
            box-shadow: 0 10px 25px rgba(171,14,0,0.05);
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
            border-radius: 12px;
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
            background: #faf9f6;
            border-radius: 8px;
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
            border-radius: 4px;
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

        /* ── Final CTA Section ─────────────── */
        .cta-banner {
            background: #ffffff;
            border-radius: 12px;
            padding: 80px 60px;
            color: #0f172a;
            text-align: center;
            position: relative;
            overflow: hidden;
            border: 1px solid #cbd5e1;
            box-shadow: 0 20px 50px rgba(0,0,0,0.02);
        }

        .cta-banner h2 {
            font-size: clamp(1.8rem, 4vw, 2.6rem);
            font-weight: 900;
            margin: 0 0 16px 0;
            line-height: 1.25;
            letter-spacing: -0.02em;
            color: #0f172a;
        }

        .cta-banner p {
            font-size: 1.05rem;
            color: #475569;
            max-width: 600px;
            margin: 0 auto 40px auto;
            line-height: 1.6;
        }

        .cta-benefits {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 24px;
            margin-bottom: 48px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-benefit-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.92rem;
            font-weight: 700;
            color: #0f172a;
            background: #f8fafc;
            padding: 8px 18px;
            border-radius: 4px;
            border: 1px solid #cbd5e1;
        }

        .cta-benefit-item svg {
            color: #10b981;
        }

        .cta-offer {
            font-size: 0.95rem;
            font-weight: 800;
            color: #ab0e00;
            margin-top: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .cta-offer-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ab0e00;
        }

        /* ── FAQ Section ───────────────────── */
        .faq-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            background: #ffffff;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item.active {
            border-color: #ab0e00;
            box-shadow: 0 4px 15px rgba(0,0,0,0.015);
        }

        .faq-header {
            padding: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            user-select: none;
            gap: 20px;
        }

        .faq-question {
            font-size: 1.02rem;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.4;
        }

        .faq-arrow {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-arrow {
            transform: rotate(180deg);
            color: #ab0e00;
        }

        .faq-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .faq-content-inner {
            padding: 0 24px 24px 24px;
            border-top: 1px solid #f1f5f9;
            padding-top: 18px;
            font-size: 0.95rem;
            line-height: 1.6;
            color: #475569;
        }

        /* ── Keyframe Animations ────────────── */
        @keyframes pulse-dot {
            0% {
                transform: scale(0.9);
                opacity: 0.6;
            }
            50% {
                transform: scale(1.3);
                opacity: 1;
            }
            100% {
                transform: scale(0.9);
                opacity: 0.6;
            }
        }

        @keyframes pulse-icon {
            0% { transform: scale(1); }
            50% { transform: scale(1.12); }
            100% { transform: scale(1); }
        }

        @keyframes float-badge-1 {
            0% { transform: translateY(0px) rotate(-1deg); }
            50% { transform: translateY(-10px) rotate(1deg); }
            100% { transform: translateY(0px) rotate(-1deg); }
        }

        @keyframes float-badge-2 {
            0% { transform: translateY(0px) rotate(1deg); }
            50% { transform: translateY(-8px) rotate(-1deg); }
            100% { transform: translateY(0px) rotate(1deg); }
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

            .ble-db-video-wrapper {
                max-width: 480px;
                margin: 0 auto;
            }

            .pain-grid {
                grid-template-columns: 1fr;
                gap: 20px;
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

            .cta-banner {
                padding: 50px 30px;
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
                        <p class="ble-hero-desc">Giải quyết triệt để bài toán năng lực lãnh đạo và quản trị con người trong doanh nghiệp. Xây dựng tư duy quản trị hiện đại, dẫn dắt đội ngũ bứt phá hiệu suất.</p>

                        <!-- Features Grid -->
                        <div class="ble-hero-features">
                            <div class="ble-hero-feature-item">
                                <span class="feat-lbl">Thời lượng</span>
                                <span class="feat-val">03 - 04 tháng</span>
                            </div>
                            <div class="ble-hero-feature-item">
                                <span class="feat-lbl">Hình thức học</span>
                                <span class="feat-val">Online trực tuyến kết hợp tự học</span>
                            </div>
                            <div class="ble-hero-feature-item">
                                <span class="feat-lbl">Chứng nhận</span>
                                <span class="feat-val">Business Leadership Essentials</span>
                            </div>
                        </div>

                        <!-- Special Promo Box -->
                        <div class="ble-hero-promo">
                            <div class="ble-hero-promo-icon">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M20 12v10H4V12M2 7h20v5H2zM12 22V7M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7zM12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg>
                            </div>
                            <div class="ble-hero-promo-text">Học bổng tháng 7: Đăng ký hôm nay để nhận <strong>Learning Grant 100% học phí</strong> toàn khóa!</div>
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
                            <button onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('ble-details-consult'); }" class="ble-btn-gold">Đăng Ký Tư Vấn</button>
                            <a href="tel:02822442244" class="ble-btn-white-outline">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                Hotline: 028 2244 2244
                            </a>
                        </div>
                    </div>

                    <!-- Right: Mock video player matching screenshot -->
                    <div class="ble-db-video">
                        <div class="ble-db-video-wrapper" onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('ble-details-video'); }">
                            <img src="/wp-content/uploads/external-migrated/Image-empty-state_d4ff3628.webp" alt="Video Course Preview">
                            <button class="ble-db-play-btn">
                                <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. PAIN POINTS SECTION (Light Background, High Contrast) -->
        <section class="ble-section bg-light-gray">
            <div class="ble-container">
                <div class="ble-title-wrap">
                    <span class="ble-section-tag">Thách thức thực tế</span>
                    <h2 class="ble-section-title">Đảm nhận vai trò quản lý,<br>năng lực chuyên môn thôi là chưa đủ!</h2>
                    <p class="ble-section-subtitle">Phần lớn các nhà quản lý hiện nay đều đang gặp khó khăn ở các khía cạnh cốt lõi này:</p>
                </div>

                <div class="pain-grid">
                    <!-- Card 1 -->
                    <div class="pain-card">
                        <div class="pain-icon-box">1</div>
                        <div class="pain-card-content">
                            <h4>Chưa từng được đào tạo quản lý</h4>
                            <p>Được bổ nhiệm lên làm quản lý do chuyên môn giỏi, nhưng chưa từng được học phương pháp dẫn dắt, giao việc và điều hành tổ chức.</p>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="pain-card">
                        <div class="pain-icon-box">2</div>
                        <div class="pain-card-content">
                            <h4>Gặp khó khăn khi tạo uy tín</h4>
                            <p>Chưa biết cách xây dựng sức ảnh hưởng cá nhân và sự tin cậy để đội ngũ cấp dưới tự nguyện cống hiến và đồng hành.</p>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="pain-card">
                        <div class="pain-icon-box">3</div>
                        <div class="pain-card-content">
                            <h4>Lúng túng trong Coaching &amp; Phản hồi</h4>
                            <p>Chưa nắm vững kỹ năng dẫn dắt (coaching) để phát huy tiềm năng của nhân viên, phản hồi chưa mang tính xây dựng làm giảm động lực.</p>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="pain-card">
                        <div class="pain-icon-box">4</div>
                        <div class="pain-card-content">
                            <h4>Đội ngũ rời rạc, hiệu suất thấp</h4>
                            <p>Thiếu sự gắn kết và phối hợp ăn ý giữa các thành viên, dẫn đến tình trạng chậm tiến độ và kết quả công việc chưa như kỳ vọng.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. CORE COMPETENCIES SECTION (Light Background - Matching screenshot takeways style) -->
        <section class="ble-section bg-white">
            <div class="ble-container">
                <div class="ble-title-wrap">
                    <div class="ble-title-badge-red">8 ĐIỀU "CẦM VỀ"</div>
                    <p class="ble-section-subtitle" style="margin-top: 10px;">Những giá trị cốt lõi bạn sẽ sở hữu trọn vẹn sau khóa học</p>
                </div>

                <div class="comp-grid">
                    <!-- Comp 1 -->
                    <div class="comp-card">
                        <div class="comp-num-large">1</div>
                        <h4 class="comp-card-caps-title">Leadership Mindset</h4>
                        <p class="comp-desc">Dịch chuyển tư duy từ quản lý hành chính sự vụ sang dẫn dắt, kiến tạo giá trị và gây ảnh hưởng lên đội ngũ.</p>
                    </div>
                    <!-- Comp 2 -->
                    <div class="comp-card">
                        <div class="comp-num-large">2</div>
                        <h4 class="comp-card-caps-title">Performance Opt.</h4>
                        <p class="comp-desc">Nắm vững phương pháp thiết lập mục tiêu khoa học, phân chia công việc hiệu quả để tối ưu hiệu suất làm việc.</p>
                    </div>
                    <!-- Comp 3 -->
                    <div class="comp-card">
                        <div class="comp-num-large">3</div>
                        <h4 class="comp-card-caps-title">Org. Behaviour</h4>
                        <p class="comp-desc">Thấu hiểu sâu sắc động cơ và hành vi của nhân viên để xây dựng văn hóa làm việc tích cực, gắn kết lâu dài.</p>
                    </div>
                    <!-- Comp 4 -->
                    <div class="comp-card">
                        <div class="comp-num-large">4</div>
                        <h4 class="comp-card-caps-title">Coaching &amp; Feedback</h4>
                        <p class="comp-desc">Làm chủ kỹ năng phản hồi mang tính định hướng và phương pháp coaching thúc đẩy năng lực nhân sự liên tục.</p>
                    </div>
                    <!-- Comp 5 -->
                    <div class="comp-card">
                        <div class="comp-num-large">5</div>
                        <h4 class="comp-card-caps-title">High-Perf Team</h4>
                        <p class="comp-desc">Thiết kế quy trình phối hợp nhịp nhàng, kích hoạt sự chủ động của từng thành viên hướng đến mục tiêu chung.</p>
                    </div>
                    <!-- Comp 6 -->
                    <div class="comp-card">
                        <div class="comp-num-large">6</div>
                        <h4 class="comp-card-caps-title">Talent Management</h4>
                        <p class="comp-desc">Biết cách phát hiện nhân sự tiềm năng, đào tạo bồi dưỡng và giữ chân nhân tài gắn bó cùng tổ chức.</p>
                    </div>
                    <!-- Comp 7 -->
                    <div class="comp-card">
                        <div class="comp-num-large">7</div>
                        <h4 class="comp-card-caps-title">Change Leadership</h4>
                        <p class="comp-desc">Nâng cao năng lực dẫn dắt đội ngũ thích ứng nhanh chóng trước các đổi mới chiến lược của doanh nghiệp.</p>
                    </div>
                    <!-- Comp 8 -->
                    <div class="comp-card">
                        <div class="comp-num-large">8</div>
                        <h4 class="comp-card-caps-title">Practical Frameworks</h4>
                        <p class="comp-desc">Ứng dụng ngay các framework quản lý chuẩn mực vào giải quyết bài toán vận hành nhân sự hàng ngày.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. TARGET AUDIENCE SECTION (Light gray background) -->
        <section class="ble-section bg-light-gray">
            <div class="ble-container">
                <div class="ble-title-wrap">
                    <span class="ble-section-tag">Đối tượng tham gia</span>
                    <h2 class="ble-section-title">Chương trình này thiết kế dành cho ai?</h2>
                    <p class="ble-section-subtitle">Phù hợp nhất với các anh/chị đang đảm nhận vị trí quản lý con người trong doanh nghiệp</p>
                </div>

                <div class="audience-grid">
                    <!-- Item 1 -->
                    <div class="audience-card">
                        <div class="audience-icon-box">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <h4>Trưởng nhóm / Team Lead</h4>
                        <p>Cần chuẩn bị tốt nền tảng kỹ năng ra quyết định, phân công công việc và xây dựng uy tín đội nhóm.</p>
                    </div>
                    <!-- Item 2 -->
                    <div class="audience-card">
                        <div class="audience-icon-box">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M4.5 16.5c-1.5 1.25-2.5 3.5-2.5 3.5s2.25-1 3.5-2.5M12 2C6.5 2 2 6.5 2 12c0 2.5 1 4.5 2.5 6l6-6L18 4.5c1.5-1.5 3.5-2.5 6-2.5-1.5 2.5-2.5 4.5-4 6l-6.5 6.5-6 6c1.5 1.5 3.5 2.5 6 2.5 5.5 0 10-4.5 10-10 0-1.5-1-3.5-2.5-5z"/></svg>
                        </div>
                        <h4>Nhân sự nguồn (Hi-Po)</h4>
                        <p>Được doanh nghiệp quy hoạch nâng đỡ, cần sẵn sàng năng lực lãnh đạo trước khi chính thức tiếp quản vai trò mới.</p>
                    </div>
                    <!-- Item 3 -->
                    <div class="audience-card">
                        <div class="audience-icon-box">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M9 15v6l2-2 2 2v-6"/></svg>
                        </div>
                        <h4>Quản lý cấp trung</h4>
                        <p>Đang trực tiếp quản lý bộ phận chức năng, cần hệ thống hóa lại phương pháp và cập nhật xu hướng lãnh đạo mới.</p>
                    </div>
                    <!-- Item 4 -->
                    <div class="audience-card">
                        <div class="audience-icon-box">
                            <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"/><path d="M9 22V18h6v4M8 6h2M14 6h2M8 10h2M14 10h2M8 14h2M14 14h2"/></svg>
                        </div>
                        <h4>Chủ doanh nghiệp SMEs</h4>
                        <p>Muốn xây dựng một hệ thống quản lý rõ ràng, kiến tạo môi trường và văn hóa làm việc chuyên nghiệp, hạnh phúc.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. INTERACTIVE CURRICULUM SECTION -->
        <section class="ble-section bg-white" id="curriculum">
            <div class="ble-container">
                <div class="ble-title-wrap">
                    <span class="ble-section-tag">Lộ trình học tập</span>
                    <h2 class="ble-section-title">Chương trình đào tạo chi tiết</h2>
                    <p class="ble-section-subtitle">Cấu trúc 3 môn học cốt lõi chuyển giao học thuật từ Swiss UMEF University</p>
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
                            <div class="curr-tab-title">Human Capital &amp; Talent Management</div>
                        </div>
                    </div>

                    <!-- Right panel: detailed content -->
                    <div class="curr-details">
                        <!-- PANEL 1: Leadership Development -->
                        <div class="curr-panel active" id="course-1">
                            <div class="curr-panel-header">
                                <div class="curr-panel-title-wrap">
                                    <h3 class="curr-panel-title">Leadership Development</h3>
                                    <p class="curr-panel-desc">Phát triển tư duy và năng lực lãnh đạo trong môi trường doanh nghiệp hiện đại. Môn học tập trung vào cách dẫn dắt đội ngũ, tạo ảnh hưởng, xây dựng văn hóa tổ chức và thích ứng linh hoạt trước sự thay đổi liên tục.</p>
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
                                        <span>Hiểu rõ cách thức nhà lãnh đạo tạo dựng sức ảnh hưởng và thiết lập văn hóa làm việc hiệu suất.</span>
                                    </li>
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span>Thiết lập được chiến lược bồi dưỡng năng lực tự quản và phát triển đội ngũ kế thừa.</span>
                                    </li>
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span>Chủ động dẫn dắt tổ chức vượt qua các thách thức thay đổi một cách bài bản, trơn tru.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- PANEL 2: Organizational Behaviour -->
                        <div class="curr-panel" id="course-2" style="display:none;">
                            <div class="curr-panel-header">
                                <div class="curr-panel-title-wrap">
                                    <h3 class="curr-panel-title">Organizational Behaviour</h3>
                                    <p class="curr-panel-desc">Giải mã cách thức con người suy nghĩ, tương tác và hành động trong môi trường làm việc tập thể. Giúp bạn nhận diện các rào cản tâm lý, quản trị tốt xung đột và xây dựng không gian làm việc đạt hiệu suất cao.</p>
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
                                            <span class="curr-acc-title">Cấu trúc, văn hóa và thay đổi tổ chức (Organization System)</span>
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
                                        <span>Nắm chắc các yếu tố cấu thành động lực thúc đẩy cá nhân và tập thể cống hiến tối đa.</span>
                                    </li>
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span>Phân tích được nguyên nhân gốc rễ của các mâu thuẫn, xung đột nội bộ để hóa giải nhanh chóng.</span>
                                    </li>
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span>Kiến tạo một bầu không khí làm việc gắn kết cao, giúp đẩy mạnh năng suất lao động chung.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- PANEL 3: Human Capital and Talent Management -->
                        <div class="curr-panel" id="course-3" style="display:none;">
                            <div class="curr-panel-header">
                                <div class="curr-panel-title-wrap">
                                    <h3 class="curr-panel-title">Human Capital &amp; Talent Management</h3>
                                    <p class="curr-panel-desc">Thiết kế chiến lược quản trị nguồn vốn con người như một lợi thế cạnh tranh lâu dài. Học cách tuyển dụng thông minh, giữ chân người tài, quản lý hiệu suất chuyên nghiệp và định hình tương lai của quản lý nhân sự.</p>
                                </div>
                                <button class="curr-toggle-all-btn" onclick="toggleAllAccordions('course-3')">Mở tất cả</button>
                            </div>

                            <div class="curr-accordion-list">
                                <!-- Part 1 -->
                                <div class="curr-acc-item active">
                                    <div class="curr-acc-header" onclick="toggleAccordion(this)">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">01</span>
                                            <span class="curr-acc-title">Quản trị nguồn nhân lực chiến lược (Strategic Human Capital)</span>
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
                                            <span class="curr-acc-title">Thu hút và phát triển nhân tài (Talent Acquisition)</span>
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
                                            <span class="curr-acc-title">Quản lý hiệu suất và phát triển đội ngũ (Performance &amp; People)</span>
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
                                            <span class="curr-acc-title">Tương lai của quản trị nhân sự (Future of HR)</span>
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
                                        <span>Xây dựng được chính sách quản trị nguồn vốn con người đồng bộ với tầm nhìn chung của doanh nghiệp.</span>
                                    </li>
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span>Thiết kế thành công phễu tuyển chọn chất lượng và hệ thống cơ chế giữ chân nhân tài lâu dài.</span>
                                    </li>
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span>Hình thành thói quen và kỹ năng đánh giá hiệu suất nhân viên một cách minh bạch, công bằng.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. IDEAS AI PLATFORM SECTION (Light-gray Background) -->
        <section class="ble-section bg-light-gray">
            <div class="ble-container">
                <div class="ai-grid">
                    <!-- Left: Details -->
                    <div class="ai-content">
                        <span class="ble-section-tag">Công nghệ dẫn đầu</span>
                        <h2 class="ble-section-title">Học tập thông minh cùng<br><span class="ble-gradient-text">IDEAS AI Platform</span></h2>
                        <p class="ble-section-subtitle" style="margin-bottom: 24px;">Học bám sát trọng tâm giáo trình Swiss UMEF. Giải quyết mọi câu hỏi lý thuyết lẫn tình huống quản trị thực tế của riêng doanh nghiệp bạn.</p>

                        <ul class="ai-features-list">
                            <li>
                                <span class="ai-feat-icon">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                </span>
                                <span class="ai-feat-text"><strong>Cá nhân hóa tối đa:</strong> AI được huấn luyện theo giáo trình chính thức của khóa học.</span>
                            </li>
                            <li>
                                <span class="ai-feat-icon">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                </span>
                                <span class="ai-feat-text"><strong>Trích dẫn khoa học:</strong> Cung cấp câu trả lời có nguồn dẫn chuẩn học thuật từ giáo trình.</span>
                            </li>
                            <li>
                                <span class="ai-feat-icon">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                </span>
                                <span class="ai-feat-text"><strong>Ví dụ thực tiễn:</strong> Minh họa kiến thức bằng các tình huống thực tế của doanh nghiệp Việt.</span>
                            </li>
                        </ul>

                        <button onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('ble-ai'); }" class="ble-btn">Đăng ký dùng thử AI &amp; LMS</button>
                    </div>

                    <!-- Right: Premium Chat UI Mockup (Light Theme) -->
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

        <!-- 7. INSTRUCTORS SECTION (White Background) -->
        <section class="ble-section bg-white">
            <div class="ble-container">
                <div class="ble-title-wrap">
                    <span class="ble-section-tag">Đội ngũ chuyên gia</span>
                    <h2 class="ble-section-title">Giảng viên khóa học</h2>
                    <p class="ble-section-subtitle">Học tập trực tiếp cùng các giáo sư, chuyên gia tư vấn giàu kinh nghiệm quốc tế</p>
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

        <!-- 8. CERTIFICATE SHOWCASE SECTION (Soft Cream Background) -->
        <section class="ble-section bg-soft-cream">
            <div class="ble-container">
                <div class="cert-wrap">
                    <!-- Left: Text Info -->
                    <div class="cert-info">
                        <span class="ble-section-tag">Chứng nhận tốt nghiệp</span>
                        <h2 class="ble-section-title">Đạt chứng chỉ chuẩn Thụy Sĩ</h2>
                        <p class="ble-section-subtitle" style="margin-bottom: 24px; color: #4b5563;">Sau khi hoàn thành đầy đủ các học phần và đáp ứng yêu cầu đánh giá chuyên môn, học viên sẽ được cấp <strong>Certificate of Completion</strong> do Viện IDEAS phát hành trên cơ sở chuyển giao học thuật chính thức từ Swiss UMEF.</p>
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

        <!-- 9. FINAL CTA BANNER SECTION -->
        <section class="ble-section bg-white">
            <div class="ble-container">
                <div class="cta-banner">
                    <h2>Nâng tầm năng lực quản lý của bạn ngay hôm nay!</h2>
                    <p>Đăng ký khóa học Business Leadership Essentials để làm chủ năng lực lãnh đạo đội nhóm, dẫn dắt con người và thúc đẩy hiệu suất doanh nghiệp.</p>

                    <div class="cta-benefits">
                        <div class="cta-benefit-item">
                            <svg viewBox="0 0 16 16" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg>
                            <span>Certificate of Completion chuẩn Swiss</span>
                        </div>
                        <div class="cta-benefit-item">
                            <svg viewBox="0 0 16 16" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg>
                            <span>Học online linh động 100%</span>
                        </div>
                        <div class="cta-benefit-item">
                            <svg viewBox="0 0 16 16" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg>
                            <span>Trợ lý học tập AI bám sát giáo trình</span>
                        </div>
                        <div class="cta-benefit-item">
                            <svg viewBox="0 0 16 16" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg>
                            <span>Cộng đồng IDEAS Alumni rộng mở</span>
                        </div>
                    </div>

                    <button onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('ble-footer-cta'); }" class="ble-btn">Đăng ký ngay hôm nay</button>

                    <div class="cta-offer">
                        <span class="cta-offer-icon">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M20 12v10H4V12M2 7h20v5H2zM12 22V7M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7zM12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></svg>
                        </span>
                        &nbsp;Đăng ký trong tháng 7 để nhận Learning Grant 100% học phí!
                    </div>
                </div>
            </div>
        </section>

        <!-- 10. FAQS SECTION (Light-gray Background) -->
        <section class="ble-section bg-light-gray" style="padding-bottom: 120px;">
            <div class="ble-container">
                <div class="ble-title-wrap">
                    <span class="ble-section-tag">Giải đáp thắc mắc</span>
                    <h2 class="ble-section-title">Câu hỏi thường gặp</h2>
                    <p class="ble-section-subtitle">Một số thắc mắc phổ biến của các học viên trước khi tham gia khóa học</p>
                </div>

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
                                Đây là ba học phần cốt lõi và nền tảng nhất được Viện IDEAS cùng đối tác lựa chọn trực tiếp từ khung đào tạo của Swiss UMEF, tập trung sát vào 3 mảnh ghép thiết yếu nhất của một nhà quản lý hiện đại: Năng lực lãnh đạo (Leadership Development), Thấu hiểu hành vi tổ chức (Organizational Behaviour) và Quản trị nguồn lực con người (Human Capital &amp; Talent Management). Việc tối giản giúp học viên học nhanh, đúng trọng tâm và ứng dụng được ngay.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="faq-item">
                        <div class="faq-header" onclick="toggleFaq(this)">
                            <span class="faq-question">2. Mình không làm trong lĩnh vực nhân sự (HR), khóa học có phù hợp không?</span>
                            <span class="faq-arrow">
                                <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="6 9 12 15 18 9"/></svg>
                            </span>
                        </div>
                        <div class="faq-content">
                            <div class="faq-content-inner">
                                Hoàn toàn phù hợp. Khóa học này không phải là khóa học nghiệp vụ chuyên sâu dành riêng cho bộ phận nhân sự. Đây là chương trình trang bị năng lực quản lý con người toàn diện dành cho Trưởng nhóm, Quản lý cấp trung thuộc mọi bộ phận chức năng (Sales, Marketing, Kỹ thuật, Vận hành...) và các Chủ doanh nghiệp vừa và nhỏ - những người trực tiếp làm việc và chịu trách nhiệm dẫn dắt hiệu suất của đội ngũ.
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
                                Học viên sẽ phát triển toàn diện 8 năng lực cốt lõi về lãnh đạo và quản lý con người theo chuẩn quốc tế, nhận Certificate of Completion do Viện IDEAS cấp trên cơ sở chuyển giao học thuật từ EGA, đồng thời sở hữu tài khoản trải nghiệm hệ thống quản lý học tập LMS cùng Trợ lý AI học thuật chuyên sâu và gia nhập cộng đồng cựu học viên IDEAS Alumni năng động.
                            </div>
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

    <!-- Interactive JS scripts for Curriculum Tab & Accordions -->
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
    </script>
</body>

</html>
