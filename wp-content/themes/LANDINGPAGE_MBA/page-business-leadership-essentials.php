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
            background-color: #f8fafc;
            color: #334155;
        }

        body {
            background-image:
                radial-gradient(circle at 5% 15%, rgba(171, 14, 0, 0.03) 0%, transparent 40%),
                radial-gradient(circle at 95% 80%, rgba(171, 14, 0, 0.02) 0%, transparent 40%),
                radial-gradient(rgba(15, 23, 42, 0.015) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 24px 24px;
            background-attachment: scroll, scroll, fixed;
        }

        /* ── Typography & Accents ──────────── */
        .ble-gradient-text {
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 50%, #ff5252 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 850;
        }

        /* ── Sections Common ────────────────── */
        .ble-section {
            padding: 100px 20px;
            position: relative;
        }

        .ble-section.bg-light {
            background-color: #ffffff;
        }

        .ble-container {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
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
            background: rgba(171, 14, 0, 0.06);
            color: #ab0e00;
            padding: 6px 18px;
            border-radius: 100px;
            font-size: 0.78rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 18px;
            border: 1px solid rgba(171, 14, 0, 0.1);
        }

        .ble-section-title {
            font-size: clamp(2rem, 4vw, 2.6rem);
            font-weight: 850;
            color: #0f172a;
            margin: 0 0 16px 0;
            line-height: 1.25;
            letter-spacing: -0.02em;
        }

        .ble-section-subtitle {
            font-size: 1.05rem;
            color: #64748b;
            line-height: 1.6;
        }

        /* ── Buttons ───────────────────────── */
        .ble-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: linear-gradient(135deg, #ab0e00 0%, #8c1000 100%);
            color: #ffffff !important;
            font-weight: 700;
            font-size: 0.95rem;
            padding: 16px 36px;
            border-radius: 100px;
            border: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 4px 15px rgba(171, 14, 0, 0.2);
            text-decoration: none !important;
        }

        .ble-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(171, 14, 0, 0.35);
            background: linear-gradient(135deg, #b81405 0%, #9c1200 100%);
        }

        .ble-btn:active {
            transform: translateY(0);
        }

        .ble-btn-outline {
            background: transparent;
            color: #0f172a !important;
            border: 1.5px solid #e2e8f0;
            box-shadow: none;
        }

        .ble-btn-outline:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        }

        /* ── Hero Section ──────────────────── */
        .ble-hero {
            padding-top: 160px;
            padding-bottom: 120px;
            overflow: hidden;
        }

        .ble-hero-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 60px;
            align-items: center;
        }

        .ble-hero-content {
            z-index: 2;
        }

        .ble-hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #ffffff;
            color: #0f172a;
            padding: 8px 16px;
            border-radius: 100px;
            font-size: 0.8rem;
            font-weight: 750;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
            border: 1px solid #e2e8f0;
            margin-bottom: 24px;
        }

        .ble-hero-badge span {
            color: #ab0e00;
            font-weight: 800;
        }

        .ble-hero-title {
            font-size: clamp(2.5rem, 5vw, 3.8rem);
            font-weight: 900;
            color: #0f172a;
            line-height: 1.15;
            letter-spacing: -0.03em;
            margin: 0 0 20px 0;
        }

        .ble-hero-desc {
            font-size: clamp(1.05rem, 2.5vw, 1.15rem);
            line-height: 1.6;
            color: #4b5563;
            margin-bottom: 36px;
        }

        .ble-hero-features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 40px;
            background: #ffffff;
            padding: 24px;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
        }

        .ble-hero-feature-item {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .ble-hero-feature-item .feat-lbl {
            font-size: 0.72rem;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .ble-hero-feature-item .feat-val {
            font-size: 0.88rem;
            font-weight: 750;
            color: #0f172a;
            line-height: 1.4;
        }

        .ble-hero-promo {
            display: flex;
            align-items: center;
            gap: 16px;
            background: rgba(171, 14, 0, 0.04);
            border: 1px dashed rgba(171, 14, 0, 0.2);
            padding: 16px 24px;
            border-radius: 16px;
            margin-bottom: 30px;
        }

        .ble-hero-promo-icon {
            font-size: 1.6rem;
            animation: pulse 2s infinite;
        }

        .ble-hero-promo-text {
            font-size: 0.92rem;
            font-weight: 700;
            color: #ab0e00;
            line-height: 1.4;
        }

        .ble-hero-promo-text strong {
            font-weight: 850;
        }

        .ble-hero-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .ble-hero-visual {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .ble-hero-image-wrap {
            position: relative;
            width: 100%;
            max-width: 480px;
            aspect-ratio: 1;
            background: radial-gradient(circle, rgba(171,14,0,0.12) 0%, transparent 70%);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .ble-hero-card {
            background: #ffffff;
            border-radius: 32px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 20px 40px rgba(15,23,42,0.06);
            width: 85%;
            padding: 40px;
            position: relative;
            z-index: 2;
            overflow: hidden;
        }

        .ble-hero-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: #ab0e00;
        }

        .ble-hero-card-icon {
            width: 64px;
            height: 64px;
            background: rgba(171, 14, 0, 0.06);
            color: #ab0e00;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 24px;
        }

        .ble-hero-card-title {
            font-size: 1.4rem;
            font-weight: 850;
            color: #0f172a;
            margin-bottom: 12px;
        }

        .ble-hero-card-meta {
            font-size: 0.88rem;
            color: #64748b;
            line-height: 1.5;
        }

        /* ── Pain Points Section ───────────── */
        .pain-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }

        .pain-card {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            padding: 36px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.01);
            transition: all 0.3s ease;
            display: flex;
            gap: 20px;
        }

        .pain-card:hover {
            transform: translateY(-3px);
            border-color: rgba(171, 14, 0, 0.15);
            box-shadow: 0 10px 30px rgba(171,14,0,0.03);
        }

        .pain-icon-box {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            background: rgba(171, 14, 0, 0.05);
            color: #ab0e00;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        .pain-card-content h4 {
            font-size: 1.12rem;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 10px 0;
            line-height: 1.4;
        }

        .pain-card-content p {
            font-size: 0.95rem;
            line-height: 1.6;
            color: #64748b;
            margin: 0;
        }

        /* ── Core Competencies Section ──────── */
        .comp-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .comp-card {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            padding: 30px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }

        .comp-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: #ab0e00;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .comp-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.03);
            border-color: #cbd5e1;
        }

        .comp-card:hover::after {
            transform: scaleX(1);
        }

        .comp-num {
            font-size: 0.85rem;
            font-weight: 800;
            color: #ab0e00;
            background: rgba(171, 14, 0, 0.05);
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .comp-title {
            font-size: 1.05rem;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 10px 0;
        }

        .comp-desc {
            font-size: 0.88rem;
            line-height: 1.55;
            color: #64748b;
            margin: 0;
        }

        /* ── Target Audience Section ────────── */
        .audience-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .audience-card {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.005);
            transition: all 0.3s ease;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .audience-card:hover {
            transform: translateY(-3px);
            border-color: rgba(171, 14, 0, 0.1);
            box-shadow: 0 10px 25px rgba(0,0,0,0.02);
        }

        .audience-icon {
            font-size: 2.2rem;
            margin-bottom: 20px;
        }

        .audience-card h4 {
            font-size: 1.1rem;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 10px 0;
        }

        .audience-card p {
            font-size: 0.88rem;
            line-height: 1.6;
            color: #64748b;
            margin: 0;
        }

        /* ── Interactive Curriculum Section (Cask style) ── */
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
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 24px;
            cursor: pointer;
            text-align: left;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            border-left: 4px solid transparent;
            position: relative;
        }

        .curr-tab-tag {
            font-size: 0.72rem;
            font-weight: 800;
            color: #94a3b8;
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
            border-color: #cbd5e1;
            transform: translateX(4px);
        }

        .curr-tab.active {
            border-left-color: #ab0e00;
            background: rgba(171, 14, 0, 0.02);
            box-shadow: 0 8px 24px rgba(171, 14, 0, 0.05);
            border-color: #e2e8f0;
            border-top-right-radius: 18px;
            border-bottom-right-radius: 18px;
        }

        .curr-tab.active .curr-tab-tag {
            color: #ab0e00;
        }

        .curr-tab.active .curr-tab-title {
            color: #0f172a;
        }

        .curr-details {
            width: 68%;
            background: #ffffff;
            border-radius: 28px;
            border: 1px solid #e2e8f0;
            padding: 45px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.01);
            display: flex;
            flex-direction: column;
        }

        .curr-panel-header {
            border-bottom: 1px solid #f1f5f9;
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
            color: #64748b;
            margin: 0;
        }

        .curr-toggle-all-btn {
            background: #f8fafc;
            color: #475569;
            border: 1px solid #e2e8f0;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .curr-toggle-all-btn:hover {
            background: #f1f5f9;
            color: #0f172a;
        }

        .curr-accordion-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .curr-acc-item {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .curr-acc-item.active {
            border-color: rgba(171, 14, 0, 0.2);
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
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
            font-size: 1.25rem;
            font-weight: 850;
            color: #94a3b8;
            transition: color 0.3s ease;
        }

        .curr-acc-item.active .curr-acc-num {
            color: #ab0e00;
        }

        .curr-acc-title {
            font-size: 0.95rem;
            font-weight: 750;
            color: #334155;
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
            color: #64748b;
            background: #e2e8f0;
            padding: 4px 10px;
            border-radius: 100px;
            text-transform: uppercase;
            letter-spacing: 0.02em;
            white-space: nowrap;
        }

        .curr-acc-item.active .curr-acc-badge {
            background: rgba(171, 14, 0, 0.08);
            color: #ab0e00;
        }

        .curr-acc-arrow {
            font-size: 0.8rem;
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
            color: #475569;
            line-height: 1.5;
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
            background: #f8fafc;
            border-radius: 20px;
            padding: 28px;
            border: 1px dashed #e2e8f0;
        }

        .curr-outcomes-title {
            font-size: 0.95rem;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 16px 0;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .curr-outcomes-title svg {
            color: #ab0e00;
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

        /* ── IDEAS AI Platform Section ─────── */
        .ai-grid {
            display: grid;
            grid-template-columns: 0.95fr 1.05fr;
            gap: 60px;
            align-items: center;
        }

        .ai-features-list {
            margin: 0 0 30px 0;
            padding: 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .ai-features-list li {
            display: flex;
            gap: 16px;
        }

        .ai-feat-icon {
            width: 24px;
            height: 24px;
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
            line-height: 1.55;
            color: #4b5563;
        }

        .ai-mockup {
            background: #0f172a;
            border-radius: 28px;
            padding: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            border: 4px solid #1e293b;
        }

        .ai-mockup-inner {
            background: #1e293b;
            border-radius: 18px;
            aspect-ratio: 16/9;
            overflow: hidden;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .ai-video-player {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.6;
        }

        .ai-play-btn {
            position: absolute;
            width: 72px;
            height: 72px;
            background: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ab0e00;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
            z-index: 2;
            border: none;
        }

        .ai-play-btn:hover {
            transform: scale(1.1);
            background: #ab0e00;
            color: #ffffff;
        }

        .ai-mockup-title {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: #ffffff;
            font-size: 0.95rem;
            font-weight: 750;
            text-shadow: 0 2px 8px rgba(0,0,0,0.8);
            z-index: 2;
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
            border: 1px solid #e2e8f0;
            padding: 36px 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.005);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .fac-card:hover {
            transform: translateY(-4px);
            border-color: rgba(171, 14, 0, 0.15);
            box-shadow: 0 12px 30px rgba(0,0,0,0.02);
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
            color: #64748b;
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
            border-radius: 32px;
            border: 1px solid #e2e8f0;
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
            background: #f8fafc;
            border-radius: 20px;
            border: 10px solid #ffffff;
            box-shadow: 0 15px 35px rgba(0,0,0,0.07);
            padding: 30px;
            aspect-ratio: 1.414;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            position: relative;
            background-image: radial-gradient(#e2e8f0 1px, transparent 1.5px);
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

        /* ── Final CTA Section ─────────────── */
        .cta-banner {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            border-radius: 32px;
            padding: 80px 60px;
            color: #ffffff;
            text-align: center;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.05);
            box-shadow: 0 20px 50px rgba(15,23,42,0.12);
        }

        .cta-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(171,14,0,0.08) 0%, transparent 60%);
            pointer-events: none;
        }

        .cta-banner h2 {
            font-size: clamp(1.8rem, 4vw, 2.6rem);
            font-weight: 850;
            margin: 0 0 16px 0;
            line-height: 1.25;
            letter-spacing: -0.02em;
        }

        .cta-banner p {
            font-size: 1.05rem;
            color: #cbd5e1;
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
            font-weight: 600;
            color: #e2e8f0;
            background: rgba(255, 255, 255, 0.05);
            padding: 8px 18px;
            border-radius: 100px;
            border: 1px solid rgba(255,255,255,0.08);
        }

        .cta-benefit-item svg {
            color: #10b981;
        }

        .cta-offer {
            font-size: 0.95rem;
            font-weight: 700;
            color: #ff6b6b;
            margin-top: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
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
            border-radius: 18px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item.active {
            border-color: rgba(171, 14, 0, 0.15);
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
            font-size: 0.8rem;
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
            color: #4b5563;
        }

        /* ── Keyframe Animations ────────────── */
        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.08);
                opacity: 0.85;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* ── Responsive Rules ───────────────── */
        @media (max-width: 991px) {
            .ble-section {
                padding: 70px 20px;
            }

            .ble-hero-grid {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }

            .ble-hero-badge,
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
                border-left: 1px solid #e2e8f0;
                border-bottom: 4px solid transparent;
            }

            .curr-tab.active {
                border-bottom-color: #ab0e00;
                border-left-color: #e2e8f0;
                border-bottom-left-radius: 18px;
                border-bottom-right-radius: 18px;
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
                        <div class="ble-hero-badge">
                            <span>Swiss UMEF</span> &nbsp;• Short-term Certificate Program
                        </div>
                        <h1 class="ble-hero-title">Business Leadership Essentials</h1>
                        <p class="ble-hero-desc">Giải quyết triệt để bài toán năng lực lãnh đạo và quản trị con người trong doanh nghiệp của bạn. Xây dựng nền tảng vững chắc để dẫn dắt đội ngũ hiệu suất cao.</p>

                        <!-- Features Grid -->
                        <div class="ble-hero-features">
                            <div class="ble-hero-feature-item">
                                <span class="feat-lbl">Thời lượng</span>
                                <span class="feat-val">03 - 04 tháng</span>
                            </div>
                            <div class="ble-hero-feature-item">
                                <span class="feat-lbl">Hình thức học</span>
                                <span class="feat-val">Online trực tuyến &amp; Tự học</span>
                            </div>
                            <div class="ble-hero-feature-item">
                                <span class="feat-lbl">Chứng nhận</span>
                                <span class="feat-val">Business Leadership Essentials</span>
                            </div>
                        </div>

                        <!-- Special Promo Box -->
                        <div class="ble-hero-promo">
                            <div class="ble-hero-promo-icon">🎁</div>
                            <div class="ble-hero-promo-text">Đặc quyền tháng 7: <strong>Học miễn phí toàn khóa</strong> khi đăng ký nhận Learning Grant 100% học phí.</div>
                        </div>

                        <!-- Action buttons -->
                        <div class="ble-hero-actions">
                            <button onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('ble-hero'); }" class="ble-btn">Đăng ký ngay</button>
                            <a href="#curriculum" class="ble-btn ble-btn-outline">Xem môn học</a>
                        </div>
                    </div>

                    <!-- Right: Visual Card Mockup -->
                    <div class="ble-hero-visual">
                        <div class="ble-hero-image-wrap">
                            <div class="ble-hero-card">
                                <div class="ble-hero-card-icon">💼</div>
                                <h4 class="ble-hero-card-title">Swiss Executive Certificate</h4>
                                <p class="ble-hero-card-meta">Chương trình chuyển giao học thuật chính thức từ Swiss UMEF University (Thụy Sĩ). Nâng tầm năng lực quản trị theo tiêu chuẩn quốc tế.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. PAIN POINTS SECTION -->
        <section class="ble-section bg-light">
            <div class="ble-container">
                <div class="ble-title-wrap">
                    <span class="ble-section-tag">Thách thức quản lý</span>
                    <h2 class="ble-section-title">Đảm nhận vai trò quản lý,<br>năng lực chuyên môn thôi là chưa đủ!</h2>
                    <p class="ble-section-subtitle">Là một nhà quản lý hiện đại, bạn có đang đối mặt với những khó khăn cốt lõi này?</p>
                </div>

                <div class="pain-grid">
                    <!-- Card 1 -->
                    <div class="pain-card">
                        <div class="pain-icon-box">❌</div>
                        <div class="pain-card-content">
                            <h4>Chưa được đào tạo bài bản</h4>
                            <p>Được bổ nhiệm làm quản lý nhờ năng lực chuyên môn giỏi, nhưng chưa từng được trang bị bài bản về kỹ năng quản trị và tư duy lãnh đạo đội ngũ.</p>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="pain-card">
                        <div class="pain-icon-box">❌</div>
                        <div class="pain-card-content">
                            <h4>Thiếu uy tín và niềm tin</h4>
                            <p>Gặp khó khăn trong việc xây dựng sức ảnh hưởng, chưa tạo được sự tin tưởng và uy tín cần thiết để đội ngũ sẵn lòng đồng hành hướng về mục tiêu.</p>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="pain-card">
                        <div class="pain-icon-box">❌</div>
                        <div class="pain-card-content">
                            <h4>Yếu kỹ năng Coaching &amp; Phản hồi</h4>
                            <p>Chưa biết cách tạo động lực làm việc tích cực, lúng túng trong kỹ năng dẫn dắt (coaching) và đưa ra phản hồi giúp nhân viên cải thiện năng lực.</p>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="pain-card">
                        <div class="pain-icon-box">❌</div>
                        <div class="pain-card-content">
                            <h4>Đội ngũ rời rạc, hiệu suất thấp</h4>
                            <p>Các thành viên thiếu gắn kết, phối hợp thiếu ăn ý, dẫn đến tình trạng chậm tiến độ và kết quả công việc liên tục không đạt kỳ vọng đề ra.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. CORE COMPETENCIES SECTION -->
        <section class="ble-section">
            <div class="ble-container">
                <div class="ble-title-wrap">
                    <span class="ble-section-tag">Giá trị khóa học</span>
                    <h2 class="ble-section-title">Bạn sẽ phát triển những năng lực nào?</h2>
                    <p class="ble-section-subtitle">8 năng lực cốt lõi bạn sẽ sở hữu trọn vẹn sau khi hoàn thành chương trình đào tạo</p>
                </div>

                <div class="comp-grid">
                    <!-- Comp 1 -->
                    <div class="comp-card">
                        <div class="comp-num">01</div>
                        <h4 class="comp-title">Leadership Mindset</h4>
                        <p class="comp-desc">Phát triển tư duy lãnh đạo hiện đại, dịch chuyển từ quản lý công việc hành chính sang dẫn dắt và tạo sức ảnh hưởng.</p>
                    </div>
                    <!-- Comp 2 -->
                    <div class="comp-card">
                        <div class="comp-num">02</div>
                        <h4 class="comp-title">Performance Management</h4>
                        <p class="comp-desc">Nắm vững phương pháp phân công công việc, thiết lập mục tiêu khoa học và tối ưu hiệu suất thực thi của đội nhóm.</p>
                    </div>
                    <!-- Comp 3 -->
                    <div class="comp-card">
                        <div class="comp-num">03</div>
                        <h4 class="comp-title">Organizational Behaviour</h4>
                        <p class="comp-desc">Thấu hiểu sâu sắc hành vi và động lực của nhân sự để kiến tạo môi trường làm việc tích cực, tăng cường gắn kết.</p>
                    </div>
                    <!-- Comp 4 -->
                    <div class="comp-card">
                        <div class="comp-num">04</div>
                        <h4 class="comp-title">Coaching &amp; Feedback</h4>
                        <p class="comp-desc">Thực hành thành thạo kỹ năng coaching định hướng và phản hồi xây dựng giúp nhân sự liên tục phát triển năng lực.</p>
                    </div>
                    <!-- Comp 5 -->
                    <div class="comp-card">
                        <div class="comp-num">05</div>
                        <h4 class="comp-title">High-Performance Team</h4>
                        <p class="comp-desc">Thiết kế và xây dựng một đội ngũ chủ động, hợp tác chặt chẽ và luôn hướng về mục tiêu chung với hiệu suất vượt trội.</p>
                    </div>
                    <!-- Comp 6 -->
                    <div class="comp-card">
                        <div class="comp-num">06</div>
                        <h4 class="comp-title">Talent Management</h4>
                        <p class="comp-desc">Làm chủ phương pháp phát hiện tiềm năng, bồi dưỡng phát triển và giữ chân nhân tài bền vững cho tổ chức.</p>
                    </div>
                    <!-- Comp 7 -->
                    <div class="comp-card">
                        <div class="comp-num">07</div>
                        <h4 class="comp-title">Change Leadership</h4>
                        <p class="comp-desc">Nâng cao khả năng dẫn dắt tổ chức thích ứng linh hoạt trước các biến động và giai đoạn chuyển dịch của doanh nghiệp.</p>
                    </div>
                    <!-- Comp 8 -->
                    <div class="comp-card">
                        <div class="comp-num">08</div>
                        <h4 class="comp-title">Practical Management</h4>
                        <p class="comp-desc">Ứng dụng trực tiếp và ngay lập tức các nguyên lý quản trị hiện đại vào quản lý thực tế công việc hàng ngày.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. TARGET AUDIENCE SECTION -->
        <section class="ble-section bg-light">
            <div class="ble-container">
                <div class="ble-title-wrap">
                    <span class="ble-section-tag">Đối tượng phù hợp</span>
                    <h2 class="ble-section-title">Ai nên tham gia khóa học này?</h2>
                    <p class="ble-section-subtitle">Chương trình được thiết kế tối ưu cho các nhóm nhân sự then chốt trong doanh nghiệp</p>
                </div>

                <div class="audience-grid">
                    <!-- Item 1 -->
                    <div class="audience-card">
                        <div class="audience-icon">👥</div>
                        <h4>Trưởng nhóm / Team Lead</h4>
                        <p>Đang trực tiếp dẫn dắt đội nhóm thực thi, cần nền tảng tư duy rõ ràng để ra quyết định và tạo lập uy tín vững chắc.</p>
                    </div>
                    <!-- Item 2 -->
                    <div class="audience-card">
                        <div class="audience-icon">🚀</div>
                        <h4>Nhân sự nguồn (Hi-Po)</h4>
                        <p>Nhân sự tài năng được tổ chức quy hoạch lên vị trí quản lý, cần chuẩn bị sẵn sàng năng lực lãnh đạo trước khi tiếp quản.</p>
                    </div>
                    <!-- Item 3 -->
                    <div class="audience-card">
                        <div class="audience-icon">👔</div>
                        <h4>Quản lý cấp trung</h4>
                        <p>Các Line Manager, Head of Department cần hệ thống hóa kiến thức quản trị thực tế và cập nhật xu hướng lãnh đạo mới.</p>
                    </div>
                    <!-- Item 4 -->
                    <div class="audience-card">
                        <div class="audience-icon">🏢</div>
                        <h4>Chủ doanh nghiệp SMEs</h4>
                        <p>Trực tiếp quản lý đội ngũ điều hành doanh nghiệp vừa và nhỏ, cần một framework khoa học để xây dựng văn hóa tích cực.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. INTERACTIVE CURRICULUM SECTION (Reference to Cask.vn & Screenshot style) -->
        <section class="ble-section" id="curriculum">
            <div class="ble-container">
                <div class="ble-title-wrap">
                    <span class="ble-section-tag">Chương trình học</span>
                    <h2 class="ble-section-title">Nội dung đào tạo chi tiết</h2>
                    <p class="ble-section-subtitle">3 môn học chuyên sâu về năng lực lãnh đạo, hành vi tổ chức và quản trị nguồn nhân lực</p>
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
                                            <span class="curr-acc-arrow">▼</span>
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
                                            <span class="curr-acc-arrow">▼</span>
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
                                            <span class="curr-acc-arrow">▼</span>
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
                                            <span class="curr-acc-arrow">▼</span>
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
                                    🎯 Kết quả đạt được sau môn học:
                                </div>
                                <ul class="curr-outcomes-list">
                                    <li>
                                        <svg class="svg-icon fa-check fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                                        <span>Hiểu rõ cách thức nhà lãnh đạo tạo dựng sức ảnh hưởng và thiết lập văn hóa làm việc hiệu suất.</span>
                                    </li>
                                    <li>
                                        <svg class="svg-icon fa-check fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                                        <span>Thiết lập được chiến lược bồi dưỡng năng lực tự quản và phát triển đội ngũ kế thừa.</span>
                                    </li>
                                    <li>
                                        <svg class="svg-icon fa-check fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
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
                                            <span class="curr-acc-arrow">▼</span>
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
                                            <span class="curr-acc-arrow">▼</span>
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
                                            <span class="curr-acc-arrow">▼</span>
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
                                    🎯 Kết quả đạt được sau môn học:
                                </div>
                                <ul class="curr-outcomes-list">
                                    <li>
                                        <svg class="svg-icon fa-check fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                                        <span>Nắm chắc các yếu tố cấu thành động lực thúc đẩy cá nhân và tập thể cống hiến tối đa.</span>
                                    </li>
                                    <li>
                                        <svg class="svg-icon fa-check fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                                        <span>Phân tích được nguyên nhân gốc rễ của các mâu thuẫn, xung đột nội bộ để hóa giải nhanh chóng.</span>
                                    </li>
                                    <li>
                                        <svg class="svg-icon fa-check fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                                        <span>Kiên tạo một bầu không khí làm việc gắn kết cao, giúp đẩy mạnh năng suất lao động chung.</span>
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
                                            <span class="curr-acc-arrow">▼</span>
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
                                            <span class="curr-acc-arrow">▼</span>
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
                                            <span class="curr-acc-arrow">▼</span>
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
                                            <span class="curr-acc-arrow">▼</span>
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
                                    🎯 Kết quả đạt được sau môn học:
                                </div>
                                <ul class="curr-outcomes-list">
                                    <li>
                                        <svg class="svg-icon fa-check fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                                        <span>Xây dựng được chính sách quản trị nguồn vốn con người đồng bộ với tầm nhìn chung của doanh nghiệp.</span>
                                    </li>
                                    <li>
                                        <svg class="svg-icon fa-check fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                                        <span>Thiết kế thành công phễu tuyển chọn chất lượng và hệ thống cơ chế giữ chân nhân tài lâu dài.</span>
                                    </li>
                                    <li>
                                        <svg class="svg-icon fa-check fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                                        <span>Hình thành thói quen và kỹ năng đánh giá hiệu suất nhân viên một cách minh bạch, công bằng.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. IDEAS AI PLATFORM SECTION -->
        <section class="ble-section bg-light">
            <div class="ble-container">
                <div class="ai-grid">
                    <!-- Left: Details -->
                    <div class="ai-content">
                        <span class="ble-section-tag">Công nghệ học tập</span>
                        <h2 class="ble-section-title">IDEAS AI Platform</h2>
                        <p class="ble-section-subtitle" style="margin-bottom: 24px;">Hệ thống Trợ lý AI được huấn luyện riêng biệt theo nội dung giáo trình chính thức của khóa học. Đồng hành hỗ trợ học viên mọi lúc mọi nơi.</p>

                        <ul class="ai-features-list">
                            <li>
                                <span class="ai-feat-icon">✓</span>
                                <span class="ai-feat-text"><strong>Đúng trọng tâm:</strong> Phản hồi bám sát tuyệt đối nội dung các học phần đào tạo của Swiss UMEF.</span>
                            </li>
                            <li>
                                <span class="ai-feat-icon">✓</span>
                                <span class="ai-feat-text"><strong>Học thuật chính thống:</strong> Trích dẫn tài liệu tham khảo trực tiếp từ các chương sách giáo trình.</span>
                            </li>
                            <li>
                                <span class="ai-feat-icon">✓</span>
                                <span class="ai-feat-text"><strong>Rõ ràng &amp; Trực quan:</strong> Giải thích các khái niệm phức tạp kèm ví dụ thực tế doanh nghiệp.</span>
                            </li>
                        </ul>

                        <button onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('ble-ai'); }" class="ble-btn">Đăng ký trải nghiệm LMS &amp; AI</button>
                    </div>

                    <!-- Right: Mockup Screen -->
                    <div class="ai-visual">
                        <div class="ai-mockup">
                            <div class="ai-mockup-inner">
                                <img src="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp" alt="IDEAS AI Platform Mockup" class="ai-video-player">
                                <button class="ai-play-btn" onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('ble-ai-video'); }">▶</button>
                                <div class="ai-mockup-title">Giới thiệu Nền tảng Hỗ trợ Học tập IDEAS AI</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 7. INSTRUCTORS SECTION -->
        <section class="ble-section">
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

        <!-- 8. CERTIFICATE SHOWCASE SECTION -->
        <section class="ble-section bg-light">
            <div class="ble-container">
                <div class="cert-wrap">
                    <!-- Left: Text Info -->
                    <div class="cert-info">
                        <span class="ble-section-tag">Chứng nhận tốt nghiệp</span>
                        <h2 class="ble-section-title">Đạt chứng chỉ chuẩn Thụy Sĩ</h2>
                        <p class="ble-section-subtitle" style="margin-bottom: 24px; color: #4b5563;">Sau khi hoàn thành đầy đủ các học phần và đáp ứng yêu cầu đánh giá chuyên môn, học viên sẽ được cấp <strong>Certificate of Completion</strong> do Viện IDEAS phát hành trên cơ sở chuyển giao học thuật chính thức từ Swiss UMEF.</p>
                        <ul class="ai-features-list" style="margin-bottom: 30px;">
                            <li>
                                <span class="ai-feat-icon">✓</span>
                                <span class="ai-feat-text">Chứng chỉ có giá trị xác thực năng lực quản trị thực chiến.</span>
                            </li>
                            <li>
                                <span class="ai-feat-icon">✓</span>
                                <span class="ai-feat-text">Được công nhận bởi Hội đồng chuyên môn IDEAS.</span>
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
        <section class="ble-section">
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
                        🎁 Đăng ký trong tháng 7 để nhận Learning Grant 100% học phí!
                    </div>
                </div>
            </div>
        </section>

        <!-- 10. FAQS SECTION -->
        <section class="ble-section bg-light" style="padding-bottom: 120px;">
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
                            <span class="faq-arrow">▼</span>
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
                            <span class="faq-arrow">▼</span>
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
                            <span class="faq-arrow">▼</span>
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
