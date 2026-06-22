<?php
/**
 * The template for displaying the Ideas Ambassador page
 * Template Name: Premium Ideas Ambassador Template
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
    <link rel="preload" fetchpriority="high" as="image" href="https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp" />
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php echo $is_en ? 'IDEAS Ambassador – Brand Ambassador Program | IDEAS' : 'IDEAS Ambassador – Chương trình Đại sứ Thương hiệu | IDEAS'; ?></title>
    <?php endif; ?>

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta name="description"
            content="<?php echo $is_en ? 'IDEAS Ambassador Program - Sharing knowledge, building an academic community, and receiving tuition sponsorships and flight tickets to Europe.' : 'Chương trình Đại sứ IDEAS - Lan tỏa tri thức, xây dựng cộng đồng học thuật và nhận những đặc quyền tài trợ học phí, vé máy bay sang Châu Âu.'; ?>" />
    <?php endif; ?><?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $is_en ? 'IDEAS Ambassador – Brand Ambassador Program' : 'IDEAS Ambassador – Chương trình Đại sứ Thương hiệu'; ?>" />
        <meta property="og:description"
            content="<?php echo $is_en ? 'Accompany IDEAS to spread international education. Accumulate academic credits to redeem gifts, scholarships, and Europe trips.' : 'Đồng hành lan tỏa giáo dục chuẩn quốc tế cùng IDEAS. Tích lũy tín chỉ học thuật quy đổi quà tặng, học bổng và các chuyến đi Châu Âu giá trị.'; ?>" />
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
           AMBASSADOR PAGE – PREMIUM THEME STYLES
        ══════════════════════════════════════ */
        html,
        body {
            overflow-x: clip !important;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f4f6fb;
            color: #111827;
            background-image:
                radial-gradient(circle at 10% 20%, rgba(171, 14, 0, 0.04) 0%, transparent 50%),
                radial-gradient(circle at 90% 70%, rgba(171, 14, 0, 0.03) 0%, transparent 45%),
                radial-gradient(rgba(15, 23, 42, 0.03) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 26px 26px;
            background-attachment: scroll, scroll, fixed;
        }

        /* ── Hero ──────────────────────────── */
        .amb-hero {
            position: relative;
            padding: 180px 20px 110px;
            overflow: hidden;
            background: #0d0405;
            min-height: 65vh;
            display: flex;
            align-items: center;
        }

        .amb-hero-bg {
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
            opacity: 0.35;
        }

        .amb-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(180deg,
                    rgba(13, 4, 5, 0.85) 0%,
                    rgba(80, 6, 0, 0.5) 60%,
                    rgba(13, 4, 5, 0.95) 100%),
                radial-gradient(ellipse at 30% 50%, rgba(171, 14, 0, 0.3) 0%, transparent 65%);
        }

        .amb-hero-container {
            position: relative;
            z-index: 3;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            display: flex;
            justify-content: flex-start;
            text-align: left;
        }

        .amb-hero-content {
            color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            max-width: 700px;
        }

        .amb-hero-badge {
            background: rgba(171, 14, 0, 0.25) !important;
            border: 1px solid rgba(255, 77, 77, 0.5) !important;
            padding: 8px 20px !important;
            border-radius: 100px !important;
            color: #ffffff !important;
            font-size: 0.82rem !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.12em !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 8px !important;
            margin-bottom: 24px !important;
            backdrop-filter: blur(12px) !important;
        }

        .amb-hero h1 {
            font-size: clamp(2.8rem, 6vw, 4.4rem) !important;
            font-weight: 900 !important;
            margin-bottom: 20px !important;
            letter-spacing: -0.02em !important;
            line-height: 1.1 !important;
            color: #ffffff !important;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3) !important;
        }

        .amb-hero h1 span {
            background: linear-gradient(135deg, #ff6b6b 0%, #ff3b30 50%, #ab0e00 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }

        .amb-hero p {
            font-size: 1.2rem !important;
            color: rgba(255, 255, 255, 0.95) !important;
            max-width: 650px !important;
            margin-bottom: 36px !important;
            line-height: 1.6 !important;
            font-weight: 500 !important;
            letter-spacing: 0.02em !important;
        }

        .amb-hero-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #ffffff;
            color: #ab0e00 !important;
            padding: 15px 36px;
            border-radius: 100px;
            font-weight: 800;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
            text-decoration: none;
            border: 1px solid #ffffff;
        }

        .amb-hero-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(171, 14, 0, 0.4);
            background: #ab0e00;
            color: #ffffff !important;
            border-color: #ab0e00;
        }

        @media (max-width: 1024px) {
            .amb-hero-container {
                justify-content: center;
                text-align: center;
            }

            .amb-hero-content {
                align-items: center;
                text-align: center;
                margin: 0 auto;
            }
        }

        /* ── Sections ──────────────────────── */
        .amb-section {
            padding: 90px 20px;
        }

        .amb-container-width {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .amb-section-title-wrap {
            text-align: center;
            margin-bottom: 60px;
        }

        .amb-section-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(171, 14, 0, 0.06);
            color: #ab0e00;
            border: 1px solid rgba(171, 14, 0, 0.15);
            padding: 6px 16px;
            border-radius: 100px;
            font-size: 0.82rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 16px;
        }

        .amb-section-title {
            font-size: clamp(2rem, 4vw, 2.6rem);
            font-weight: 800;
            color: #111827;
            margin: 0 0 16px 0;
            letter-spacing: -0.02em;
        }

        .amb-section-title span {
            color: #ab0e00;
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .amb-section-subtitle {
            font-size: 1.05rem;
            color: #4b5563;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* ── Intro ─────────────────────────── */
        .amb-intro-split {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 60px;
            align-items: center;
        }

        .amb-intro-desc {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #374151;
            margin-bottom: 30px;
        }

        .amb-intro-desc span {
            font-weight: 700;
            color: #ab0e00;
        }

        .amb-goals-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 30px;
        }

        .amb-goal-card {
            display: flex;
            gap: 20px;
            background: #ffffff;
            padding: 22px 24px;
            border-radius: 18px;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
            border-left: 4px solid #ab0e00;
            transition: all 0.3s ease;
            align-items: flex-start;
        }

        .amb-goal-card:hover {
            transform: translateX(6px);
            box-shadow: 0 10px 30px rgba(171, 14, 0, 0.08);
        }

        .amb-goal-icon-box {
            width: 46px;
            height: 46px;
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(171, 14, 0, 0.25);
        }

        .amb-goal-info h4 {
            font-size: 1.15rem;
            font-weight: 700;
            color: #111827;
            margin: 0 0 6px 0;
        }

        .amb-goal-info p {
            font-size: 0.92rem;
            color: #4b5563;
            margin: 0;
            line-height: 1.5;
        }

        .amb-intro-meta {
            background: #fff8f7;
            border: 1px dashed rgba(171, 14, 0, 0.3);
            border-radius: 12px;
            padding: 14px 20px;
            font-size: 0.9rem;
            color: #6b7280;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .amb-intro-meta i {
            color: #ab0e00;
        }

        .amb-intro-visual {
            position: relative;
        }

        .amb-intro-img {
            width: 100%;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
            object-fit: cover;
            aspect-ratio: 4 / 5;
        }

        .amb-intro-floating-badge {
            position: absolute;
            bottom: 24px;
            left: 24px;
            background: #ffffff;
            border-radius: 100px;
            padding: 10px 24px;
            font-size: 0.9rem;
            font-weight: 700;
            color: #ab0e00;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid #f3f4f6;
        }

        @media (max-width: 991px) {
            .amb-intro-split {
                grid-template-columns: 1fr;
                gap: 50px;
            }

            .amb-intro-visual {
                max-width: 480px;
                margin: 0 auto;
                width: 100%;
            }
        }

        /* ── Credit Table ───────────────────── */
        .amb-table-section {
            background: #ffffff;
            border-radius: 28px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.02);
            border: 1px solid #e2e8f0;
            padding: 50px;
        }

        .amb-table-split {
            display: grid;
            grid-template-columns: 0.85fr 1.15fr;
            gap: 50px;
            align-items: center;
        }

        .amb-table-visual img {
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.05);
        }

        .amb-table-responsive {
            width: 100%;
            overflow-x: auto;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
        }

        .amb-table-custom {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.95rem;
            text-align: left;
        }

        .amb-table-custom th {
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff;
            padding: 18px 24px;
            font-weight: 700;
            font-size: 0.92rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .amb-table-custom td {
            padding: 15px 24px;
            border-bottom: 1px solid #f1f5f9;
            color: #374151;
            font-weight: 500;
        }

        .amb-table-custom tbody tr {
            background: #ffffff;
            transition: all 0.2s ease;
        }

        .amb-table-custom tbody tr:hover {
            background: #fff8f7;
        }

        .amb-table-custom tbody tr:nth-child(even) {
            background: #f8fafc;
        }

        .amb-table-custom tbody tr:nth-child(even):hover {
            background: #fff8f7;
        }

        .amb-pts-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 4px 14px;
            border-radius: 100px;
            background: #ffedec;
            color: #ab0e00;
            font-weight: 800;
            font-size: 0.92rem;
            border: 1px solid rgba(171, 14, 0, 0.15);
        }

        .amb-pts-badge.high {
            background: #fff2e6;
            color: #ea580c;
            border-color: rgba(234, 88, 12, 0.15);
        }

        .amb-pts-badge.top {
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff;
            border: none;
            box-shadow: 0 4px 10px rgba(171, 14, 0, 0.2);
        }

        @media (max-width: 991px) {
            .amb-table-section {
                padding: 30px 20px;
            }

            .amb-table-split {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .amb-table-visual {
                max-width: 400px;
                margin: 0 auto;
            }
        }

        /* ── Rank Tiers ────────────────────── */
        .amb-tiers-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .amb-tier-row {
            background: #ffffff;
            border-radius: 20px;
            padding: 24px 30px;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
            border: 1px solid #e2e8f0;
            border-left: 6px solid #cbd5e1;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            display: grid;
            grid-template-columns: 240px 1fr;
            gap: 30px;
            align-items: center;
        }

        .amb-tier-row:hover {
            transform: translateX(8px);
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
            border-color: rgba(15, 23, 42, 0.08);
        }

        .amb-tier-row.tier-gan-ket {
            border-left-color: #94a3b8;
        }

        .amb-tier-row.tier-lan-toa {
            border-left-color: #10b981;
        }

        .amb-tier-row.tier-tien-phong {
            border-left-color: #f97316;
        }

        .amb-tier-row.tier-kim-cuong {
            border-left-color: #06b6d4;
        }

        .amb-tier-row.tier-master {
            border-left-color: #ab0e00;
            background: linear-gradient(90deg, #fff9f9 0%, #ffffff 100%);
            box-shadow: 0 4px 24px rgba(171, 14, 0, 0.04);
        }

        .amb-tier-row.tier-master:hover {
            box-shadow: 0 15px 35px rgba(171, 14, 0, 0.09);
        }

        .amb-tier-top-badge {
            position: absolute;
            top: -12px;
            right: 30px;
            background: linear-gradient(135deg, #ffd700 0%, #b8860b 100%);
            color: #000000;
            font-size: 0.72rem;
            font-weight: 800;
            padding: 3px 14px;
            border-radius: 100px;
            box-shadow: 0 4px 10px rgba(184, 134, 11, 0.25);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .amb-tier-profile {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .amb-tier-icon-wrap {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        .tier-gan-ket .amb-tier-icon-wrap {
            background: #f1f5f9;
            color: #64748b;
        }

        .tier-lan-toa .amb-tier-icon-wrap {
            background: #ecfdf5;
            color: #10b981;
        }

        .tier-tien-phong .amb-tier-icon-wrap {
            background: #fff7ed;
            color: #f97316;
        }

        .tier-kim-cuong .amb-tier-icon-wrap {
            background: #ecfeff;
            color: #06b6d4;
        }

        .tier-master .amb-tier-icon-wrap {
            background: #fff1f2;
            color: #ab0e00;
        }

        .amb-tier-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: #1e293b;
            margin: 0;
        }

        .amb-tier-points-range {
            font-size: 0.82rem;
            color: #64748b;
            font-weight: 700;
            margin-top: 4px;
            text-transform: uppercase;
            letter-spacing: 0.02em;
        }

        .amb-tier-benefits-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 24px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .amb-tier-benefits-list li {
            font-size: 0.92rem;
            color: #475569;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            line-height: 1.4;
        }

        .amb-tier-benefits-list li i {
            color: #ab0e00;
            font-size: 0.95rem;
        }

        @media (max-width: 768px) {
            .amb-tier-row {
                grid-template-columns: 1fr;
                gap: 16px;
                padding: 24px;
            }

            .amb-tier-benefits-list {
                flex-direction: column;
                gap: 8px;
            }
        }

        /* ── Split How & Commit ────────────── */
        .amb-split-layout {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 60px;
        }

        .amb-flow-box h3,
        .amb-commit-box h3 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #111827;
            margin-bottom: 24px;
        }

        .amb-steps-col {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .amb-step-card {
            display: flex;
            gap: 18px;
            background: #ffffff;
            padding: 22px;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.02);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .amb-step-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(171, 14, 0, 0.06);
            border-color: rgba(171, 14, 0, 0.12);
        }

        .amb-step-num-circle {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.1rem;
            flex-shrink: 0;
            box-shadow: 0 4px 10px rgba(171, 14, 0, 0.2);
        }

        .amb-step-info h5 {
            font-size: 1.05rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0 0 6px 0;
        }

        .amb-step-info p {
            font-size: 0.9rem;
            color: #4b5563;
            margin: 0;
            line-height: 1.6;
        }

        .amb-commit-checklist {
            display: flex;
            flex-direction: column;
            gap: 18px;
            margin-bottom: 36px;
        }

        .amb-commit-item {
            display: flex;
            gap: 12px;
            font-size: 0.96rem;
            line-height: 1.55;
            color: #374151;
            font-weight: 600;
        }

        .amb-commit-item i {
            color: #ab0e00;
            font-size: 1.1rem;
            margin-top: 2px;
        }

        .amb-commit-cta-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff !important;
            padding: 16px 36px;
            border-radius: 100px;
            font-weight: 800;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 8px 25px rgba(171, 14, 0, 0.3);
            border: none;
            width: 100%;
            max-width: 280px;
            text-align: center;
        }

        .amb-commit-cta-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(171, 14, 0, 0.4);
            filter: brightness(1.1);
        }

        @media (max-width: 991px) {
            .amb-split-layout {
                grid-template-columns: 1fr;
                gap: 50px;
            }

            .amb-commit-cta-btn {
                max-width: 100%;
            }
        }

        /* ── News Articles ─────────────────── */
        .amb-news-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .amb-news-card {
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
            border: 1px solid #e2e8f0;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: flex;
            flex-direction: column;
            text-decoration: none;
            color: inherit;
        }

        .amb-news-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
            border-color: rgba(171, 14, 0, 0.2);
        }

        .amb-news-img-box {
            width: 100%;
            aspect-ratio: 16 / 9;
            overflow: hidden;
            position: relative;
            background: #f1f5f9;
        }

        .amb-news-img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .amb-news-card:hover .amb-news-img-box img {
            transform: scale(1.04);
        }

        .amb-news-hover-overlay {
            position: absolute;
            inset: 0;
            background: rgba(171, 14, 0, 0.25);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 1.5rem;
        }

        .amb-news-card:hover .amb-news-hover-overlay {
            opacity: 1;
        }

        .amb-news-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .amb-news-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #ffedec;
            color: #ab0e00;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 100px;
            width: fit-content;
            margin-bottom: 12px;
            letter-spacing: 0.02em;
        }

        .amb-news-body h4 {
            font-size: 1.15rem;
            font-weight: 800;
            color: #1e293b;
            line-height: 1.45;
            margin: 0 0 12px 0;
            transition: color 0.3s ease;
        }

        .amb-news-card:hover .amb-news-body h4 {
            color: #ab0e00;
        }

        .amb-news-body p {
            font-size: 0.9rem;
            color: #4b5563;
            line-height: 1.6;
            margin: 0 0 20px 0;
            flex-grow: 1;
        }

        .amb-news-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #f1f5f9;
            padding-top: 16px;
            font-size: 0.82rem;
            color: #94a3b8;
            font-weight: 600;
        }

        .amb-news-readmore {
            color: #ab0e00;
            display: flex;
            align-items: center;
            gap: 4px;
            font-weight: 700;
            transition: all 0.2s ease;
        }

        .amb-news-card:hover .amb-news-readmore {
            gap: 8px;
        }

        @media (max-width: 768px) {
            .amb-hero {
                padding: 130px 16px 50px !important;
                min-height: auto !important;
            }

            .amb-section {
                padding: 50px 16px !important;
            }

            .amb-news-grid {
                display: flex;
                flex-wrap: nowrap;
                overflow-x: auto;
                justify-content: flex-start;
                scroll-snap-type: x mandatory;
                scroll-behavior: smooth;
                padding-bottom: 15px;
                gap: 16px;
                scrollbar-width: none;
                /* Firefox */
                margin-left: -16px;
                margin-right: -16px;
                padding-left: 16px;
                padding-right: 16px;
            }

            .amb-news-grid::-webkit-scrollbar {
                display: none;
                /* Chrome/Safari */
            }

            .amb-news-card {
                flex: 0 0 280px;
                max-width: 280px;
                scroll-snap-align: center;
            }

            .slider-dots {
                display: none;
                justify-content: center;
                gap: 8px;
                margin-top: 24px;
            }

            .slider-dots {
                display: flex;
            }

            .slider-dot {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: #cbd5e1;
                transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            }

            .slider-dot.active {
                background: #ab0e00;
                width: 24px;
                border-radius: 4px;
            }
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Site Header -->
    <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>


    <!-- MAIN HERO SECTION -->
    <main class="ideas_main" style="gap:0; background:none;">
        <section class="amb-hero" id="amb-hero-top">
            <div class="amb-hero-bg" id="amb-parallax-bg"
                style="background-image: url('https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp');">
            </div>
            <div class="amb-hero-overlay"></div>
            <div class="amb-hero-container">
                <div class="amb-hero-content">
                    <div class="amb-hero-badge"><svg class="svg-icon fa-star fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg> <?php echo $is_en ? 'Special Program' : 'Chương trình đặc biệt'; ?></div>
                    <h1>IDEAS <br><span>AMBASSADOR</span></h1>
            <div class="verify-slogan">
                <?php echo $is_en ? '"Original Knowledge - Local Companionship"' : '"Tri thức Nguyên bản - Đồng hành Bản địa"'; ?>
            </div>

                    <p><?php echo $is_en ? 'Spread knowledge · Build community · Honor dedication. Brand Ambassador Program connecting international knowledge and nurturing Vietnamese talents.' : 'Lan tỏa tri thức · Xây dựng cộng đồng · Tôn vinh cống hiến. Chương trình Đại sứ Thương hiệu kết nối tri thức chuẩn quốc tế và nâng cánh tài năng Việt.'; ?></p>
                    <a class="amb-hero-btn" onclick="showform('amb_hero_top')"><svg class="svg-icon fa-headset fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 48C141.1 48 48 141.1 48 256l0 40c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-40C0 114.6 114.6 0 256 0S512 114.6 512 256l0 144.1c0 48.6-39.4 88-88.1 88L313.6 488c-8.3 14.3-23.8 24-41.6 24l-32 0c-26.5 0-48-21.5-48-48s21.5-48 48-48l32 0c17.8 0 33.3 9.7 41.6 24l110.4 .1c22.1 0 40-17.9 40-40L464 256c0-114.9-93.1-208-208-208zM144 208l16 0c17.7 0 32 14.3 32 32l0 112c0 17.7-14.3 32-32 32l-16 0c-35.3 0-64-28.7-64-64l0-48c0-35.3 28.7-64 64-64zm224 0c35.3 0 64 28.7 64 64l0 48c0 35.3-28.7 64-64 64l-16 0c-17.7 0-32-14.3-32-32l0-112c0-17.7 14.3-32 32-32l16 0z"/></svg> <?php echo $is_en ? 'Learn More' : 'Tìm hiểu ngay'; ?></a>
                </div>
            </div>
        </section>

        <!-- SECTION 1: ABOUT PROGRAM -->
        <section class="amb-section">
            <div class="amb-container-width">
                <div class="amb-intro-split">
                    <div class="amb-intro-text">
                        <span class="amb-section-tag"><svg class="svg-icon fa-graduation-cap fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg> <?php echo $is_en ? 'About Program' : 'Về chương trình'; ?></span>
                        <h2 class="amb-section-title">IDEAS – <span>Ambassador</span></h2>
                        <p class="amb-intro-desc"><?php echo $is_en ? 'The IDEAS Ambassador program is built to <span>share values</span>, spread knowledge, and promote the development of postgraduate education. We aim for a positive academic and social environment where every individual in the IDEAS community has the opportunity to contribute and receive worthy benefits.' : 'Chương trình Đại sứ IDEAS được xây dựng nhằm <span>chia sẻ giá trị</span>, lan tỏa tri thức và thúc đẩy sự phát triển của giáo dục sau đại học. Chúng tôi hướng đến một môi trường học thuật và xã hội tích cực, nơi mỗi cá nhân thuộc cộng đồng IDEAS đều có cơ hội đóng góp và nhận lại những quyền lợi xứng đáng.'; ?></p>

                        <div class="amb-goals-list">
                            <div class="amb-goal-card">
                                <div class="amb-goal-icon-box"><svg class="svg-icon fa-network-wired fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 64l128 0 0 64-128 0 0-64zM240 0c-26.5 0-48 21.5-48 48l0 96c0 26.5 21.5 48 48 48l48 0 0 32L32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l96 0 0 32-48 0c-26.5 0-48 21.5-48 48l0 96c0 26.5 21.5 48 48 48l160 0c26.5 0 48-21.5 48-48l0-96c0-26.5-21.5-48-48-48l-48 0 0-32 256 0 0 32-48 0c-26.5 0-48 21.5-48 48l0 96c0 26.5 21.5 48 48 48l160 0c26.5 0 48-21.5 48-48l0-96c0-26.5-21.5-48-48-48l-48 0 0-32 96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-256 0 0-32 48 0c26.5 0 48-21.5 48-48l0-96c0-26.5-21.5-48-48-48L240 0zM96 448l0-64 128 0 0 64L96 448zm320-64l128 0 0 64-128 0 0-64z"/></svg></div>
                                <div class="amb-goal-info">
                                    <h4><?php echo $is_en ? 'Community Building' : 'Xây dựng cộng đồng'; ?></h4>
                                    <p><?php echo $is_en ? 'Create a strong networking connection, supporting each other in studying and career development.' : 'Tạo ra mạng lưới kết nối mạnh mẽ, hỗ trợ nhau trong học tập và phát triển sự nghiệp.'; ?></p>
                                </div>
                            </div>
                            <div class="amb-goal-card">
                                <div class="amb-goal-icon-box"><svg class="svg-icon fa-bullhorn fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M480 32c0-12.9-7.8-24.6-19.8-29.6s-25.7-2.2-34.9 6.9L381.7 53c-48 48-113.1 75-181 75l-8.7 0-32 0-96 0c-35.3 0-64 28.7-64 64l0 96c0 35.3 28.7 64 64 64l0 128c0 17.7 14.3 32 32 32l64 0c17.7 0 32-14.3 32-32l0-128 8.7 0c67.9 0 133 27 181 75l43.6 43.6c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6l0-147.6c18.6-8.8 32-32.5 32-60.4s-13.4-51.6-32-60.4L480 32zm-64 76.7L416 240l0 131.3C357.2 317.8 280.5 288 200.7 288l-8.7 0 0-96 8.7 0c79.8 0 156.5-29.8 215.3-83.3z"/></svg></div>
                                <div class="amb-goal-info">
                                    <h4><?php echo $is_en ? 'Spreading Education' : 'Lan tỏa giáo dục'; ?></h4>
                                    <p><?php echo $is_en ? 'Expanding access to European-standard high-quality international education to more people.' : 'Mở rộng cơ hội tiếp cận giáo dục chất lượng quốc tế chuẩn Châu Âu cho nhiều người hơn.'; ?></p>
                                </div>
                            </div>
                            <div class="amb-goal-card">
                                <div class="amb-goal-icon-box"><svg class="svg-icon fa-trophy fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M400 0L176 0c-26.5 0-48.1 21.8-47.1 48.2c.2 5.3 .4 10.6 .7 15.8L24 64C10.7 64 0 74.7 0 88c0 92.6 33.5 157 78.5 200.7c44.3 43.1 98.3 64.8 138.1 75.8c23.4 6.5 39.4 26 39.4 45.6c0 20.9-17 37.9-37.9 37.9L192 448c-17.7 0-32 14.3-32 32s14.3 32 32 32l192 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-26.1 0C337 448 320 431 320 410.1c0-19.6 15.9-39.2 39.4-45.6c39.9-11 93.9-32.7 138.2-75.8C542.5 245 576 180.6 576 88c0-13.3-10.7-24-24-24L446.4 64c.3-5.2 .5-10.4 .7-15.8C448.1 21.8 426.5 0 400 0zM48.9 112l84.4 0c9.1 90.1 29.2 150.3 51.9 190.6c-24.9-11-50.8-26.5-73.2-48.3c-32-31.1-58-76-63-142.3zM464.1 254.3c-22.4 21.8-48.3 37.3-73.2 48.3c22.7-40.3 42.8-100.5 51.9-190.6l84.4 0c-5.1 66.3-31.1 111.2-63 142.3z"/></svg></div>
                                <div class="amb-goal-info">
                                    <h4><?php echo $is_en ? 'Honoring Dedication' : 'Tôn vinh cống hiến'; ?></h4>
                                    <p><?php echo $is_en ? 'Recognizing and rewarding worthily for your positive contributions.' : 'Vinh danh và trao thưởng xứng đáng đối với những đóng góp tích cực của bạn.'; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="amb-intro-meta">
                            <svg class="svg-icon fa-clock fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                            <span><?php echo $is_en ? '<b>Effective Period:</b> From Nov 11, 2025 | Accumulated continuously for 03 years' : '<b>Thời gian áp dụng:</b> Từ 11/11/2025 | Tích lũy liên tục trong vòng 03 năm'; ?></span>
                        </div>
                    </div>

                    <div class="amb-intro-visual">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/11/Co-di-hoc-ko-nguoi-dep-1.webp"
                            alt="IDEAS Ambassador Program" class="amb-intro-img" />
                        <div class="amb-intro-floating-badge">
                            <svg class="svg-icon fa-medal fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M4.1 38.2C1.4 34.2 0 29.4 0 24.6C0 11 11 0 24.6 0L133.9 0c11.2 0 21.7 5.9 27.4 15.5l68.5 114.1c-48.2 6.1-91.3 28.6-123.4 61.9L4.1 38.2zm503.7 0L405.6 191.5c-32.1-33.3-75.2-55.8-123.4-61.9L350.7 15.5C356.5 5.9 366.9 0 378.1 0L487.4 0C501 0 512 11 512 24.6c0 4.8-1.4 9.6-4.1 13.6zM80 336a176 176 0 1 1 352 0A176 176 0 1 1 80 336zm184.4-94.9c-3.4-7-13.3-7-16.8 0l-22.4 45.4c-1.4 2.8-4 4.7-7 5.1L168 298.9c-7.7 1.1-10.7 10.5-5.2 16l36.3 35.4c2.2 2.2 3.2 5.2 2.7 8.3l-8.6 49.9c-1.3 7.6 6.7 13.5 13.6 9.9l44.8-23.6c2.7-1.4 6-1.4 8.7 0l44.8 23.6c6.9 3.6 14.9-2.2 13.6-9.9l-8.6-49.9c-.5-3 .5-6.1 2.7-8.3l36.3-35.4c5.6-5.4 2.5-14.8-5.2-16l-50.1-7.3c-3-.4-5.7-2.4-7-5.1l-22.4-45.4z"/></svg>
                            <span><?php echo $is_en ? 'IDEAS Prestigious Ambassador' : 'Đại sứ Uy tín IDEAS'; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 2: CREDIT SCORING TABLE -->
        <section class="amb-section" style="background-color: #ffffff;">
            <div class="amb-container-width">
                <div class="amb-section-title-wrap">
                    <span class="amb-section-tag"><svg class="svg-icon fa-coins fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2c0 0 0 0 0 0s0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4l0 3.4 0 5.7 0 26.3zm32 0l0-32 0-25.9c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 44.2-86 80-192 80S0 476.2 0 432l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z"/></svg> <?php echo $is_en ? 'Credit Scoring' : 'Cơ chế tích điểm'; ?></span>
                    <h2 class="amb-section-title"><?php echo $is_en ? 'IDEAS <span>Academic Credit</span> Accumulation Table' : 'Bảng Tích Tín Chỉ <span>Học Thuật</span> IDEAS'; ?></h2>
                    <p class="amb-section-subtitle"><?php echo $is_en ? 'Every activity you join is recorded and accumulated into IDEAS Academic Credits – the key to unlocking attractive privileges.' : 'Mỗi hoạt động bạn tham gia đều được ghi nhận và tích lũy thành Tín chỉ học thuật IDEAS – chìa khóa mở ra những đặc quyền hấp dẫn.'; ?></p>
                </div>

                <div class="amb-table-section">
                    <div class="amb-table-split">
                        <div class="amb-table-visual">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/11/IDEAS-AMBASSADOR-4.webp"
                                alt="IDEAS Ambassador Credit Table" />
                        </div>
                        <div class="amb-table-responsive">
                            <table class="amb-table-custom">
                                <thead>
                                    <tr>
                                        <th><?php echo $is_en ? 'Participating Activity' : 'Hoạt động tham gia'; ?></th>
                                        <th style="width:140px; text-align:center;"><?php echo $is_en ? 'Accumulated Credits' : 'Tín chỉ tích lũy'; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $is_en ? 'Join Online Events (Webinars)' : 'Tham gia sự kiện trực tuyến (Online Webinar)'; ?></td>
                                        <td style="text-align:center;"><span class="amb-pts-badge"><?php echo $is_en ? '2 pts' : '2 điểm'; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $is_en ? 'Refer potential leads for counseling' : 'Giới thiệu khách hàng tiềm năng liên hệ tư vấn'; ?></td>
                                        <td style="text-align:center;"><span class="amb-pts-badge"><?php echo $is_en ? '2 pts' : '2 điểm'; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $is_en ? 'Share #IDEAS promotional posts on personal page' : 'Chia sẻ bài viết truyền thông #IDEAS trên trang cá nhân'; ?></td>
                                        <td style="text-align:center;"><span class="amb-pts-badge"><?php echo $is_en ? '5 pts' : '5 điểm'; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $is_en ? 'Join On-site Events (Offline Workshops)' : 'Tham gia sự kiện trực tiếp (Offline Workshop)'; ?></td>
                                        <td style="text-align:center;"><span class="amb-pts-badge"><?php echo $is_en ? '5 pts' : '5 điểm'; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $is_en ? 'Record testimonial video sharing course experiences' : 'Quay video chia sẻ trải nghiệm & cảm nhận về khóa học'; ?></td>
                                        <td style="text-align:center;"><span class="amb-pts-badge high"><?php echo $is_en ? '10 pts' : '10 điểm'; ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $is_en ? 'Evaluate academic quality and write professional inputs' : 'Đánh giá chất lượng học thuật và đóng góp chuyên sâu'; ?></td>
                                        <td style="text-align:center;"><span class="amb-pts-badge high"><?php echo $is_en ? '15 pts' : '15 điểm'; ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $is_en ? 'Refer a student who successfully enrolls' : 'Giới thiệu một học viên đăng ký nhập học thành công'; ?></td>
                                        <td style="text-align:center;"><span class="amb-pts-badge high"><?php echo $is_en ? '20 pts' : '20 điểm'; ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $is_en ? 'Graduate from Top-up / Master / DBA program' : 'Hoàn thành chương trình học Topup / Master / DBA'; ?></td>
                                        <td style="text-align:center;"><span class="amb-pts-badge top"><?php echo $is_en ? '30 pts' : '30 điểm'; ?></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 3: RANK TIERS -->
        <section class="amb-section">
            <div class="amb-container-width">
                <div class="amb-section-title-wrap">
                    <span class="amb-section-tag"><svg class="svg-icon fa-ranking-star fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M353.8 54.1L330.2 6.3c-3.9-8.3-16.1-8.6-20.4 0L286.2 54.1l-52.3 7.5c-9.3 1.4-13.3 12.9-6.4 19.8l38 37-9 52.1c-1.4 9.3 8.2 16.5 16.8 12.2l46.9-24.8 46.6 24.4c8.6 4.3 18.3-2.9 16.8-12.2l-9-52.1 38-36.6c6.8-6.8 2.9-18.3-6.4-19.8l-52.3-7.5zM256 256c-17.7 0-32 14.3-32 32l0 192c0 17.7 14.3 32 32 32l128 0c17.7 0 32-14.3 32-32l0-192c0-17.7-14.3-32-32-32l-128 0zM32 320c-17.7 0-32 14.3-32 32L0 480c0 17.7 14.3 32 32 32l128 0c17.7 0 32-14.3 32-32l0-128c0-17.7-14.3-32-32-32L32 320zm416 96l0 64c0 17.7 14.3 32 32 32l128 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-128 0c-17.7 0-32 14.3-32 32z"/></svg> <?php echo $is_en ? 'Tier Levels / Policy' : 'Hạng mức'; ?></span>
                    <h2 class="amb-section-title"><?php echo $is_en ? 'Tier Levels &amp; <span>Special Privileges</span>' : 'Hạng Mức &amp; <span>Quyền Lợi Đặc Biệt</span>'; ?></h2>
                    <p class="amb-section-subtitle"><?php echo $is_en ? 'Accumulate credits to upgrade ambassador tier and unlock special sponsorship policies from IDEAS.' : 'Tích lũy tín chỉ để nâng hạng đại sứ và mở khóa các chính sách tài trợ đặc biệt từ IDEAS.'; ?></p>
                </div>

                <div class="amb-tiers-list">
                    <!-- Tier 1 -->
                    <div class="amb-tier-row tier-gan-ket">
                        <div class="amb-tier-profile">
                            <div class="amb-tier-icon-wrap"><svg class="svg-icon fa-link fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z"/></svg></div>
                            <div>
                                <h4 class="amb-tier-title"><?php echo $is_en ? 'Engagement' : 'Gắn kết'; ?></h4>
                                <div class="amb-tier-points-range"><?php echo $is_en ? '10 – 99 pts' : '10 – 99 điểm'; ?></div>
                            </div>
                        </div>
                        <ul class="amb-tier-benefits-list">
                            <li><svg class="svg-icon fa-gift fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M190.5 68.8L225.3 128l-1.3 0-72 0c-22.1 0-40-17.9-40-40s17.9-40 40-40l2.2 0c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40L32 128c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l448 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-41.6 0c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88l-2.2 0c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0L152 0C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40l-72 0-1.3 0 34.8-59.2C329.1 55.9 342.9 48 357.8 48l2.2 0c22.1 0 40 17.9 40 40zM32 288l0 176c0 26.5 21.5 48 48 48l144 0 0-224L32 288zM288 512l144 0c26.5 0 48-21.5 48-48l0-176-192 0 0 224z"/></svg> <?php echo $is_en ? 'Receive annual exclusive gift set' : 'Nhận quà tặng độc quyền hàng năm'; ?></li>
                            <li><svg class="svg-icon fa-coins fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2c0 0 0 0 0 0s0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4l0 3.4 0 5.7 0 26.3zm32 0l0-32 0-25.9c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 44.2-86 80-192 80S0 476.2 0 432l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z"/></svg> <?php echo $is_en ? 'Intellectual support fund: <b>100 CHF</b>/student' : 'Quỹ hỗ trợ tri thức: <b>100 CHF</b>/học viên'; ?></li>
                        </ul>
                    </div>

                    <!-- Tier 2 -->
                    <div class="amb-tier-row tier-lan-toa">
                        <div class="amb-tier-profile">
                            <div class="amb-tier-icon-wrap"><svg class="svg-icon fa-signal fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M576 0c17.7 0 32 14.3 32 32l0 448c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-448c0-17.7 14.3-32 32-32zM448 96c17.7 0 32 14.3 32 32l0 352c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-352c0-17.7 14.3-32 32-32zM352 224l0 256c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32s32 14.3 32 32zM192 288c17.7 0 32 14.3 32 32l0 160c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-160c0-17.7 14.3-32 32-32zM96 416l0 64c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32s32 14.3 32 32z"/></svg></div>
                            <div>
                                <h4 class="amb-tier-title"><?php echo $is_en ? 'Sharing' : 'Lan tỏa'; ?></h4>
                                <div class="amb-tier-points-range"><?php echo $is_en ? '100 – 299 pts' : '100 – 299 điểm'; ?></div>
                            </div>
                        </div>
                        <ul class="amb-tier-benefits-list">
                            <li><svg class="svg-icon fa-gift fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M190.5 68.8L225.3 128l-1.3 0-72 0c-22.1 0-40-17.9-40-40s17.9-40 40-40l2.2 0c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40L32 128c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l448 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-41.6 0c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88l-2.2 0c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0L152 0C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40l-72 0-1.3 0 34.8-59.2C329.1 55.9 342.9 48 357.8 48l2.2 0c22.1 0 40 17.9 40 40zM32 288l0 176c0 26.5 21.5 48 48 48l144 0 0-224L32 288zM288 512l144 0c26.5 0 48-21.5 48-48l0-176-192 0 0 224z"/></svg> <?php echo $is_en ? 'Receive annual exclusive gift set' : 'Nhận quà tặng độc quyền hàng năm'; ?></li>
                            <li><svg class="svg-icon fa-coins fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2c0 0 0 0 0 0s0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4l0 3.4 0 5.7 0 26.3zm32 0l0-32 0-25.9c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 44.2-86 80-192 80S0 476.2 0 432l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z"/></svg> <?php echo $is_en ? 'Intellectual support fund: <b>200 CHF</b>/student' : 'Quỹ hỗ trợ tri thức: <b>200 CHF</b>/học viên'; ?></li>
                            <li><svg class="svg-icon fa-percent fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M374.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-320 320c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l320-320zM128 128A64 64 0 1 0 0 128a64 64 0 1 0 128 0zM384 384a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/></svg> <?php echo $is_en ? 'Additional <b>200 CHF</b> discount for the referee' : 'Ưu đãi giảm thêm <b>200 CHF</b> cho người được giới giới thiệu'; ?></li>
                        </ul>
                    </div>

                    <!-- Tier 3 -->
                    <div class="amb-tier-row tier-tien-phong">
                        <div class="amb-tier-profile">
                            <div class="amb-tier-icon-wrap"><svg class="svg-icon fa-rocket fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M156.6 384.9L125.7 354c-8.5-8.5-11.5-20.8-7.7-32.2c3-8.9 7-20.5 11.8-33.8L24 288c-8.6 0-16.6-4.6-20.9-12.1s-4.2-16.7 .2-24.1l52.5-88.5c13-21.9 36.5-35.3 61.9-35.3l82.3 0c2.4-4 4.8-7.7 7.2-11.3C289.1-4.1 411.1-8.1 483.9 5.3c11.6 2.1 20.6 11.2 22.8 22.8c13.4 72.9 9.3 194.8-111.4 276.7c-3.5 2.4-7.3 4.8-11.3 7.2l0 82.3c0 25.4-13.4 49-35.3 61.9l-88.5 52.5c-7.4 4.4-16.6 4.5-24.1 .2s-12.1-12.2-12.1-20.9l0-107.2c-14.1 4.9-26.4 8.9-35.7 11.9c-11.2 3.6-23.4 .5-31.8-7.8zM384 168a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/></svg></div>
                            <div>
                                <h4 class="amb-tier-title"><?php echo $is_en ? 'Pioneering' : 'Tiên phong'; ?></h4>
                                <div class="amb-tier-points-range"><?php echo $is_en ? '300 – 599 pts' : '300 – 599 điểm'; ?></div>
                            </div>
                        </div>
                        <ul class="amb-tier-benefits-list">
                            <li><svg class="svg-icon fa-gift fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M190.5 68.8L225.3 128l-1.3 0-72 0c-22.1 0-40-17.9-40-40s17.9-40 40-40l2.2 0c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40L32 128c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l448 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-41.6 0c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88l-2.2 0c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0L152 0C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40l-72 0-1.3 0 34.8-59.2C329.1 55.9 342.9 48 357.8 48l2.2 0c22.1 0 40 17.9 40 40zM32 288l0 176c0 26.5 21.5 48 48 48l144 0 0-224L32 288zM288 512l144 0c26.5 0 48-21.5 48-48l0-176-192 0 0 224z"/></svg> <?php echo $is_en ? 'Receive annual exclusive gift set' : 'Nhận quà tặng độc quyền hàng năm'; ?></li>
                            <li><svg class="svg-icon fa-coins fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2c0 0 0 0 0 0s0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4l0 3.4 0 5.7 0 26.3zm32 0l0-32 0-25.9c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 44.2-86 80-192 80S0 476.2 0 432l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z"/></svg> <?php echo $is_en ? 'Intellectual support fund: <b>250 CHF</b>/student' : 'Quỹ hỗ trợ tri thức: <b>250 CHF</b>/học viên'; ?></li>
                            <li><svg class="svg-icon fa-percent fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M374.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-320 320c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l320-320zM128 128A64 64 0 1 0 0 128a64 64 0 1 0 128 0zM384 384a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/></svg> <?php echo $is_en ? 'Additional <b>200 CHF</b> discount for the referee' : 'Ưu đãi giảm thêm <b>200 CHF</b> cho người được giới giới thiệu'; ?></li>
                        </ul>
                    </div>

                    <!-- Tier 4 -->
                    <div class="amb-tier-row tier-kim-cuong">
                        <div class="amb-tier-profile">
                            <div class="amb-tier-icon-wrap"><svg class="svg-icon fa-gem fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M116.7 33.8c4.5-6.1 11.7-9.8 19.3-9.8l240 0c7.6 0 14.8 3.6 19.3 9.8l112 152c6.8 9.2 6.1 21.9-1.5 30.4l-232 256c-4.5 5-11 7.9-17.8 7.9s-13.2-2.9-17.8-7.9l-232-256c-7.7-8.5-8.3-21.2-1.5-30.4l112-152zm38.5 39.8c-3.3 2.5-4.2 7-2.1 10.5l57.4 95.6L63.3 192c-4.1 .3-7.3 3.8-7.3 8s3.2 7.6 7.3 8l192 16c.4 0 .9 0 1.3 0l192-16c4.1-.3 7.3-3.8 7.3-8s-3.2-7.6-7.3-8L301.5 179.8l57.4-95.6c2.1-3.5 1.2-8.1-2.1-10.5s-7.9-2-10.7 1L256 172.2 165.9 74.6c-2.8-3-7.4-3.4-10.7-1z"/></svg></div>
                            <div>
                                <h4 class="amb-tier-title"><?php echo $is_en ? 'Diamond' : 'Kim Cương'; ?></h4>
                                <div class="amb-tier-points-range"><?php echo $is_en ? '600 – 999 pts' : '600 – 999 điểm'; ?></div>
                            </div>
                        </div>
                        <ul class="amb-tier-benefits-list">
                            <li><svg class="svg-icon fa-gift fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M190.5 68.8L225.3 128l-1.3 0-72 0c-22.1 0-40-17.9-40-40s17.9-40 40-40l2.2 0c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40L32 128c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l448 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-41.6 0c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88l-2.2 0c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0L152 0C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40l-72 0-1.3 0 34.8-59.2C329.1 55.9 342.9 48 357.8 48l2.2 0c22.1 0 40 17.9 40 40zM32 288l0 176c0 26.5 21.5 48 48 48l144 0 0-224L32 288zM288 512l144 0c26.5 0 48-21.5 48-48l0-176-192 0 0 224z"/></svg> <?php echo $is_en ? 'Receive annual exclusive gift set' : 'Nhận quà tặng độc quyền hàng năm'; ?></li>
                            <li><svg class="svg-icon fa-ticket fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M64 64C28.7 64 0 92.7 0 128l0 64c0 8.8 7.4 15.7 15.7 18.6C34.5 217.1 48 235 48 256s-13.5 38.9-32.3 45.4C7.4 304.3 0 311.2 0 320l0 64c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-64c0-8.8-7.4-15.7-15.7-18.6C541.5 294.9 528 277 528 256s13.5-38.9 32.3-45.4c8.3-2.9 15.7-9.8 15.7-18.6l0-64c0-35.3-28.7-64-64-64L64 64zm64 112l0 160c0 8.8 7.2 16 16 16l288 0c8.8 0 16-7.2 16-16l0-160c0-8.8-7.2-16-16-16l-288 0c-8.8 0-16 7.2-16 16zM96 160c0-17.7 14.3-32 32-32l320 0c17.7 0 32 14.3 32 32l0 192c0 17.7-14.3 32-32 32l-320 0c-17.7 0-32-14.3-32-32l0-192z"/></svg> <?php echo $is_en ? 'DBA 5,000 EUR / MSc AI 2,500 CHF Voucher / 50% EMBA Support' : 'Voucher DBA 5.000 EUR / MSc AI 2.500 CHF / Hỗ trợ 50% EMBA'; ?></li>
                            <li><svg class="svg-icon fa-coins fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2c0 0 0 0 0 0s0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4l0 3.4 0 5.7 0 26.3zm32 0l0-32 0-25.9c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 44.2-86 80-192 80S0 476.2 0 432l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z"/></svg> <?php echo $is_en ? 'Intellectual support fund: <b>250 CHF</b>/student' : 'Quỹ hỗ trợ tri thức: <b>250 CHF</b>/học viên'; ?></li>
                            <li><svg class="svg-icon fa-percent fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M374.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-320 320c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l320-320zM128 128A64 64 0 1 0 0 128a64 64 0 1 0 128 0zM384 384a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/></svg> <?php echo $is_en ? 'Additional <b>15% tuition</b> discount for the referee' : 'Giảm thêm <b>15% học phí</b> cho người được giới thiệu'; ?></li>
                        </ul>
                    </div>

                    <!-- Tier 5 -->
                    <div class="amb-tier-row tier-master">
                        <div class="amb-tier-top-badge"><svg class="svg-icon fa-crown fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M309 106c11.4-7 19-19.7 19-34c0-22.1-17.9-40-40-40s-40 17.9-40 40c0 14.4 7.6 27 19 34L209.7 220.6c-9.1 18.2-32.7 23.4-48.6 10.7L72 160c5-6.7 8-15 8-24c0-22.1-17.9-40-40-40S0 113.9 0 136s17.9 40 40 40c.2 0 .5 0 .7 0L86.4 427.4c5.5 30.4 32 52.6 63 52.6l277.2 0c30.9 0 57.4-22.1 63-52.6L535.3 176c.2 0 .5 0 .7 0c22.1 0 40-17.9 40-40s-17.9-40-40-40s-40 17.9-40 40c0 9 3 17.3 8 24l-89.1 71.3c-15.9 12.7-39.5 7.5-48.6-10.7L309 106z"/></svg> <?php echo $is_en ? 'Highest Tier' : 'Hạng Cao Nhất'; ?></div>
                        <div class="amb-tier-profile">
                            <div class="amb-tier-icon-wrap"><svg class="svg-icon fa-crown fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M309 106c11.4-7 19-19.7 19-34c0-22.1-17.9-40-40-40s-40 17.9-40 40c0 14.4 7.6 27 19 34L209.7 220.6c-9.1 18.2-32.7 23.4-48.6 10.7L72 160c5-6.7 8-15 8-24c0-22.1-17.9-40-40-40S0 113.9 0 136s17.9 40 40 40c.2 0 .5 0 .7 0L86.4 427.4c5.5 30.4 32 52.6 63 52.6l277.2 0c30.9 0 57.4-22.1 63-52.6L535.3 176c.2 0 .5 0 .7 0c22.1 0 40-17.9 40-40s-17.9-40-40-40s-40 17.9-40 40c0 9 3 17.3 8 24l-89.1 71.3c-15.9 12.7-39.5 7.5-48.6-10.7L309 106z"/></svg></div>
                            <div>
                                <h4 class="amb-tier-title" style="color: #ab0e00;">Master</h4>
                                <div class="amb-tier-points-range"><?php echo $is_en ? '≥ 1,000 pts' : '≥ 1.000 điểm'; ?></div>
                            </div>
                        </div>
                        <ul class="amb-tier-benefits-list">
                            <li><svg class="svg-icon fa-gift fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M190.5 68.8L225.3 128l-1.3 0-72 0c-22.1 0-40-17.9-40-40s17.9-40 40-40l2.2 0c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40L32 128c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l448 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-41.6 0c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88l-2.2 0c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0L152 0C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40l-72 0-1.3 0 34.8-59.2C329.1 55.9 342.9 48 357.8 48l2.2 0c22.1 0 40 17.9 40 40zM32 288l0 176c0 26.5 21.5 48 48 48l144 0 0-224L32 288zM288 512l144 0c26.5 0 48-21.5 48-48l0-176-192 0 0 224z"/></svg> <?php echo $is_en ? 'Receive annual exclusive gift set' : 'Nhận quà tặng độc quyền hàng năm'; ?></li>
                            <li><svg class="svg-icon fa-ticket fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M64 64C28.7 64 0 92.7 0 128l0 64c0 8.8 7.4 15.7 15.7 18.6C34.5 217.1 48 235 48 256s-13.5 38.9-32.3 45.4C7.4 304.3 0 311.2 0 320l0 64c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-64c0-8.8-7.4-15.7-15.7-18.6C541.5 294.9 528 277 528 256s13.5-38.9 32.3-45.4c8.3-2.9 15.7-9.8 15.7-18.6l0-64c0-35.3-28.7-64-64-64L64 64zm64 112l0 160c0 8.8 7.2 16 16 16l288 0c8.8 0 16-7.2 16-16l0-160c0-8.8-7.2-16-16-16l-288 0c-8.8 0-16 7.2-16 16zM96 160c0-17.7 14.3-32 32-32l320 0c17.7 0 32 14.3 32 32l0 192c0 17.7-14.3 32-32 32l-320 0c-17.7 0-32-14.3-32-32l0-192z"/></svg> <?php echo $is_en ? 'DBA 5,000 EUR / MSc AI 2,500 CHF Voucher / 60% EMBA Support' : 'Voucher DBA 5.000 EUR / MSc AI 2.500 CHF / Hỗ trợ 60% EMBA'; ?></li>
                            <li><svg class="svg-icon fa-plane fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M482.3 192c34.2 0 93.7 29 93.7 64c0 36-59.5 64-93.7 64l-116.6 0L265.2 495.9c-5.7 10-16.3 16.1-27.8 16.1l-56.2 0c-10.6 0-18.3-10.2-15.4-20.4l49-171.6L112 320 68.8 377.6c-3 4-7.8 6.4-12.8 6.4l-42 0c-7.8 0-14-6.3-14-14c0-1.3 .2-2.6 .5-3.9L32 256 .5 145.9c-.4-1.3-.5-2.6-.5-3.9c0-7.8 6.3-14 14-14l42 0c5 0 9.8 2.4 12.8 6.4L112 192l102.9 0-49-171.6C162.9 10.2 170.6 0 181.2 0l56.2 0c11.5 0 22.1 6.2 27.8 16.1L365.7 192l116.6 0z"/></svg> <?php echo $is_en ? 'Gifted <b>01 pair of round-trip flight tickets</b> to Europe' : 'Tặng <b>01 cặp vé máy bay</b> khứ hồi sang Châu Âu'; ?></li>
                            <li><svg class="svg-icon fa-coins fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2c0 0 0 0 0 0s0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4l0 3.4 0 5.7 0 26.3zm32 0l0-32 0-25.9c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 44.2-86 80-192 80S0 476.2 0 432l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z"/></svg> <?php echo $is_en ? 'Intellectual support fund: <b>300 CHF</b>/student' : 'Quỹ hỗ trợ tri thức: <b>300 CHF</b>/học viên'; ?></li>
                            <li><svg class="svg-icon fa-percent fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M374.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-320 320c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l320-320zM128 128A64 64 0 1 0 0 128a64 64 0 1 0 128 0zM384 384a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/></svg> <?php echo $is_en ? 'Additional <b>25% tuition</b> discount for the referee' : 'Giảm thêm <b>25% học phí</b> cho người được giới thiệu'; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 4: HOW TO JOIN & COMMITMENTS -->
        <section class="amb-section" style="background-color: #ffffff;">
            <div class="amb-container-width">
                <div class="amb-split-layout">
                    <!-- Steps -->
                    <div class="amb-flow-box">
                        <span class="amb-section-tag"><svg class="svg-icon fa-map-signs fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M512 96c0 50.2-59.1 125.1-84.6 155c-3.8 4.4-9.4 6.1-14.5 5L320 256c-17.7 0-32 14.3-32 32s14.3 32 32 32l96 0c53 0 96 43 96 96s-43 96-96 96l-276.4 0c8.7-9.9 19.3-22.6 30-36.8c6.3-8.4 12.8-17.6 19-27.2L416 448c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0c-53 0-96-43-96-96s43-96 96-96l39.8 0c-21-31.5-39.8-67.7-39.8-96c0-53 43-96 96-96s96 43 96 96zM117.1 489.1c-3.8 4.3-7.2 8.1-10.1 11.3l-1.8 2-.2-.2c-6 4.6-14.6 4-20-1.8C59.8 473 0 402.5 0 352c0-53 43-96 96-96s96 43 96 96c0 30-21.1 67-43.5 97.9c-10.7 14.7-21.7 28-30.8 38.5l-.6 .7zM128 352a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM416 128a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg> <?php echo $is_en ? 'Join Us' : 'Tham gia'; ?></span>
                        <h3><?php echo $is_en ? 'Participation <span>Guide</span>' : 'Hướng Dẫn <span>Tham Gia</span>'; ?></h3>
                        <div class="amb-steps-col">
                            <div class="amb-step-card">
                                <div class="amb-step-num-circle">1</div>
                                <div class="amb-step-info">
                                    <h5><?php echo $is_en ? 'Share &amp; Connect' : 'Chia sẻ &amp; Kết nối'; ?></h5>
                                    <p><?php echo $is_en ? 'Ambassadors share practical study experiences and Ambassador Code (your phone number) to prospective students, or actively join events organized by IDEAS.' : 'Đại sứ chia sẻ trải nghiệm học tập thực tế và Mã Đại Sứ (SĐT của bạn) cho học viên tiềm năng, hoặc tham gia tích cực các sự kiện do IDEAS tổ chức.'; ?></p>
                                </div>
                            </div>
                            <div class="amb-step-card">
                                <div class="amb-step-num-circle">2</div>
                                <div class="amb-step-info">
                                    <h5><?php echo $is_en ? 'Record &amp; Accumulate' : 'Ghi nhận &amp; Tích lũy'; ?></h5>
                                    <p><?php echo $is_en ? 'The system automatically records ambassador contributions and updates accumulated credits directly on the Institute\'s academic management platform.' : 'Hệ thống tự động ghi nhận các đóng góp của đại sứ và cập nhật điểm tích lũy trực tiếp trên hệ thống học vụ của Viện.'; ?></p>
                                </div>
                            </div>
                            <div class="amb-step-card">
                                <div class="amb-step-num-circle">3</div>
                                <div class="amb-step-info">
                                    <h5><?php echo $is_en ? 'Redeem Benefits' : 'Quy đổi Quyền lợi'; ?></h5>
                                    <p><?php echo $is_en ? 'Use accumulated credits to redeem scholarships, valuable rewards, or gift academic support vouchers to relatives.' : 'Sử dụng điểm tín chỉ tích lũy được để quy đổi sang học bổng, phần thưởng giá trị hoặc trao tặng thẻ hỗ trợ tri thức cho người thân.'; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Commitments -->
                    <div class="amb-commit-box"
                        style="display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                            <span class="amb-section-tag"><svg class="svg-icon fa-certificate fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M211 7.3C205 1 196-1.4 187.6 .8s-14.9 8.9-17.1 17.3L154.7 80.6l-62-17.5c-8.4-2.4-17.4 0-23.5 6.1s-8.5 15.1-6.1 23.5l17.5 62L18.1 170.6c-8.4 2.1-15 8.7-17.3 17.1S1 205 7.3 211l46.2 45L7.3 301C1 307-1.4 316 .8 324.4s8.9 14.9 17.3 17.1l62.5 15.8-17.5 62c-2.4 8.4 0 17.4 6.1 23.5s15.1 8.5 23.5 6.1l62-17.5 15.8 62.5c2.1 8.4 8.7 15 17.1 17.3s17.3-.2 23.4-6.4l45-46.2 45 46.2c6.1 6.2 15 8.7 23.4 6.4s14.9-8.9 17.1-17.3l15.8-62.5 62 17.5c8.4 2.4 17.4 0 23.5-6.1s8.5-15.1 6.1-23.5l-17.5-62 62.5-15.8c8.4-2.1 15-8.7 17.3-17.1s-.2-17.4-6.4-23.4l-46.2-45 46.2-45c6.2-6.1 8.7-15 6.4-23.4s-8.9-14.9-17.3-17.1l-62.5-15.8 17.5-62c2.4-8.4 0-17.4-6.1-23.5s-15.1-8.5-23.5-6.1l-62 17.5L341.4 18.1c-2.1-8.4-8.7-15-17.1-17.3S307 1 301 7.3L256 53.5 211 7.3z"/></svg> <?php echo $is_en ? 'Commitments' : 'Cam kết'; ?></span>
                            <h3><?php echo $is_en ? 'Commitments from <span>IDEAS</span>' : 'Cam Kết Từ <span>IDEAS</span>'; ?></h3>
                            <div class="amb-commit-checklist">
                                <div class="amb-commit-item">
                                    <svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                                    <span><?php echo $is_en ? 'Ensure absolute transparency and accuracy in recording credits and ranking ambassadors.' : 'Đảm bảo tính minh bạch, chính xác tuyệt đối trong việc ghi nhận điểm và xếp hạng đại sứ.'; ?></span>
                                </div>
                                <div class="amb-commit-item">
                                    <svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                                    <span><?php echo $is_en ? 'Honor and recognize ambassador contributions through events, yearbook awards, and official announcements.' : 'Tôn vinh và vinh danh đóng góp của đại sứ qua các sự kiện, giải thưởng niên giám và danh sách công bố chính thức.'; ?></span>
                                </div>
                                <div class="amb-commit-item">
                                    <svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                                    <span><?php echo $is_en ? 'Create all favorable conditions to help members develop their personal capabilities and expand social networks.' : 'Tạo mọi điều kiện hỗ trợ tối đa để hội viên phát triển năng lực bản thân và mở rộng mạng lưới quan hệ xã hội.'; ?></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="amb-commit-cta-btn" onclick="showform('amb_commit_sec')"><svg class="svg-icon fa-headset fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 48C141.1 48 48 141.1 48 256l0 40c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-40C0 114.6 114.6 0 256 0S512 114.6 512 256l0 144.1c0 48.6-39.4 88-88.1 88L313.6 488c-8.3 14.3-23.8 24-41.6 24l-32 0c-26.5 0-48-21.5-48-48s21.5-48 48-48l32 0c17.8 0 33.3 9.7 41.6 24l110.4 .1c22.1 0 40-17.9 40-40L464 256c0-114.9-93.1-208-208-208zM144 208l16 0c17.7 0 32 14.3 32 32l0 112c0 17.7-14.3 32-32 32l-16 0c-35.3 0-64-28.7-64-64l0-48c0-35.3 28.7-64 64-64zm224 0c35.3 0 64 28.7 64 64l0 48c0 35.3-28.7 64-64 64l-16 0c-17.7 0-32-14.3-32-32l0-112c0-17.7 14.3-32 32-32l16 0z"/></svg> <?php echo $is_en ? 'Register for Counseling' : 'Đăng ký tư vấn'; ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 5: BLOG NEWS ARTICLES -->
        <section class="amb-section">
            <div class="amb-container-width">
                <div class="amb-section-title-wrap">
                    <span class="amb-section-tag"><svg class="svg-icon fa-newspaper fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 96c0-35.3 28.7-64 64-64l288 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L80 480c-44.2 0-80-35.8-80-80L0 128c0-17.7 14.3-32 32-32s32 14.3 32 32l0 272c0 8.8 7.2 16 16 16s16-7.2 16-16L96 96zm64 24l0 80c0 13.3 10.7 24 24 24l112 0c13.3 0 24-10.7 24-24l0-80c0-13.3-10.7-24-24-24L184 96c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16z"/></svg> <?php echo $is_en ? 'News &amp; Updates' : 'Tin tức'; ?></span>
                    <h2 class="amb-section-title"><?php echo $is_en ? 'Featured <span>Articles</span>' : 'Bài Viết <span>Nổi Bật</span>'; ?></h2>
                    <p class="amb-section-subtitle"><?php echo $is_en ? 'Learn details of in-depth analyses on the role and development of the ambassador community.' : 'Tìm hiểu chi tiết hơn các bài phân tích chuyên sâu về vai trò và sự phát triển của cộng đồng đại sứ.'; ?></p>
                </div>

                <div class="amb-news-grid">
                    <!-- Article 1 -->
                    <a href="https://ideas.edu.vn/tin-tuc-moi/dai-su-thuong-hieu-ideas-ambassador.html" target="_blank"
                        class="amb-news-card">
                        <div class="amb-news-img-box">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/03/Cover-Blog-4.webp"
                                alt="<?php echo $is_en ? 'IDEAS Brand Ambassador' : 'Đại sứ thương hiệu IDEAS Ambassador'; ?>" loading="lazy" />
                            <div class="amb-news-hover-overlay"><svg class="svg-icon fa-arrow-up-right-from-square fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg>
                            </div>
                        </div>
                        <div class="amb-news-body">
                            <span class="amb-news-tag"><svg class="svg-icon fa-tag fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 80L0 229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7L48 32C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg> Ambassador</span>
                            <h4><?php echo $is_en ? 'IDEAS Brand Ambassador Program' : 'Đại Sứ Thương Hiệu IDEAS Ambassador'; ?></h4>
                            <p><?php echo $is_en ? 'Explore the role of an IDEAS brand ambassador – an excellent opportunity to share knowledge, expand networks, and receive attractive exclusive benefits from the academic community.' : 'Tìm hiểu vai trò Đại sứ thương hiệu IDEAS – cơ hội tuyệt vời để chia sẻ tri thức, mở rộng mối quan hệ và nhận những quyền lợi đặc quyền hấp dẫn từ cộng đồng học thuật.'; ?></p>
                            <div class="amb-news-footer">
                                <span><svg class="svg-icon fa-calendar fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 32l0 32L48 64C21.5 64 0 85.5 0 112l0 48 448 0 0-48c0-26.5-21.5-48-48-48l-48 0 0-32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 32L160 64l0-32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192L0 192 0 464c0 26.5 21.5 48 48 48l352 0c26.5 0 48-21.5 48-48l0-272z"/></svg> <?php echo $is_en ? 'Year 2026' : 'Năm 2026'; ?></span>
                                <span class="amb-news-readmore"><?php echo $is_en ? 'Read Details' : 'Đọc chi tiết'; ?> <svg class="svg-icon fa-arrow-right fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg></span>
                            </div>
                        </div>
                    </a>

                    <!-- Article 2 -->
                    <a href="https://ideas.edu.vn/tin-tuc-moi/ideas-ambassador-2026-quy-dau-tu-nhan-tai.html"
                        target="_blank" class="amb-news-card">
                        <div class="amb-news-img-box">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/03/final-2.webp"
                                alt="<?php echo $is_en ? 'IDEAS Ambassador 2026 – Talent Investment Fund' : 'IDEAS Ambassador 2026 – Quỹ đầu tư nhân tài'; ?>" loading="lazy" />
                            <div class="amb-news-hover-overlay"><svg class="svg-icon fa-arrow-up-right-from-square fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg>
                            </div>
                        </div>
                        <div class="amb-news-body">
                            <span class="amb-news-tag"><svg class="svg-icon fa-tag fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 80L0 229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7L48 32C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg> <?php echo $is_en ? 'Talent Fund' : 'Quỹ Nhân Tài'; ?></span>
                            <h4><?php echo $is_en ? 'IDEAS Ambassador 2026 – Talent Investment Fund' : 'IDEAS Ambassador 2026 – Quỹ Đầu Tư Nhân Tài'; ?></h4>
                            <p><?php echo $is_en ? 'Discover detailed information about the IDEAS Ambassador 2026 Talent Investment Fund – honoring outstanding dedication and nurturing high-level workforce for the future.' : 'Khám phá thông tin chi tiết về Quỹ đầu tư nhân tài IDEAS Ambassador 2026 – nơi vinh danh các cống hiến vượt bậc và bồi đắp nguồn nhân lực cấp cao cho tương lai.'; ?></p>
                            <div class="amb-news-footer">
                                <span><svg class="svg-icon fa-calendar fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 32l0 32L48 64C21.5 64 0 85.5 0 112l0 48 448 0 0-48c0-26.5-21.5-48-48-48l-48 0 0-32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 32L160 64l0-32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192L0 192 0 464c0 26.5 21.5 48 48 48l352 0c26.5 0 48-21.5 48-48l0-272z"/></svg> <?php echo $is_en ? 'Year 2026' : 'Năm 2026'; ?></span>
                                <span class="amb-news-readmore"><?php echo $is_en ? 'Read Details' : 'Đọc chi tiết'; ?> <svg class="svg-icon fa-arrow-right fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </main>



    <!-- Parallax Hero Background Scroll Handler -->
    <script>
        const heroBg = document.getElementById('amb-parallax-bg');
        if (heroBg) {
            let ticking = false;
            window.addEventListener('scroll', function () {
                if (!ticking) {
                    requestAnimationFrame(function () {
                        const scrollY = window.scrollY;
                        const heroH = document.getElementById('amb-hero-top').offsetHeight;
                        if (scrollY < heroH + 200) {
                            heroBg.style.transform = 'translate3d(0, ' + (scrollY * 0.3) + 'px, 0) scale(1.1)';
                        }
                        ticking = false;
                    });
                    ticking = true;
                }
            }, { passive: true });
        }
    </script>



    <!-- Script imports -->
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