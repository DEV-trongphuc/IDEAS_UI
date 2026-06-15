<?php
/**
 * The template for displaying the Sacombank installment support page
 * Template Name: Premium Sacombank Installment Template
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
        href="https://ideas.edu.vn/wp-content/uploads/2026/04/recap_growverth.webp" />
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php echo $is_en ? 'Sacombank Financial Support – 0% Tuition Installment | IDEAS' : 'Hỗ Trợ Tài Chính Sacombank – Trả Góp Học Phí 0% | IDEAS'; ?></title>
    <?php endif; ?>

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta name="description"
            content="<?php echo $is_en ? 'Sacombank Financial Support program linked with IDEAS. 0% interest rate tuition fee installment from 12 to 24 months for MBA program.' : 'Chương trình hỗ trợ tài chính liên kết giữa IDEAS và Sacombank. Trả góp học phí lãi suất 0% từ 12 - 24 tháng cho chương trình MBA.'; ?>" />
    <?php endif; ?><?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $is_en ? 'Sacombank Financial Support – 0% Tuition Installment' : 'Hỗ Trợ Tài Chính Sacombank – Trả Góp Học Phí 0%'; ?>" />
        <meta property="og:description"
            content="<?php echo $is_en ? 'Accompanying students on their academic path. Financial support for flexible and worry-free MBA tuition payment.' : 'Đồng hành cùng học viên vững bước học thuật. Hỗ trợ tài chính trước để thanh toán học phí MBA linh hoạt và an tâm.'; ?>" />
        <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2024/09/tra_gop_scb.webp" />
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
           SACOMBANK PAGE – PREMIUM THEME STYLES
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
        .scb-hero {
            position: relative;
            padding: 180px 20px 110px;
            overflow: hidden;
            background: #0d0405;
            min-height: 65vh;
            display: flex;
            align-items: center;
        }

        .scb-hero-bg {
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

        .scb-hero-overlay {
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

        .scb-hero-container {
            position: relative;
            z-index: 3;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            display: flex;
            justify-content: flex-start;
            text-align: left;
        }

        .scb-hero-content {
            color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            max-width: 700px;
            width: 100%;
        }

        .scb-hero-badge {
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

        .scb-hero h1 {
            font-size: clamp(2.6rem, 5.5vw, 4rem);
            font-weight: 900;
            margin-bottom: 20px;
            letter-spacing: -0.02em;
            line-height: 1.15;
            color: #ffffff !important;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.45);
        }

        .scb-hero h1 span {
            background: linear-gradient(135deg, #ff8e8e 0%, #ff4f4f 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }

        .scb-hero p.hero-subtitle {
            font-size: 1.15rem;
            color: rgba(255, 255, 255, 0.92) !important;
            max-width: 650px;
            margin-bottom: 32px;
            line-height: 1.6;
            font-weight: 500;
            letter-spacing: 0.02em;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        /* Hero Stats Grid */
        .scb-hero-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            width: 100%;
            max-width: 650px;
            margin-bottom: 36px;
        }

        .scb-stat-card {
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 6px;
            transition: all 0.3s ease;
        }

        .scb-stat-card:hover {
            background: rgba(255, 255, 255, 0.18);
            border-color: rgba(255, 77, 77, 0.35);
            transform: translateY(-2px);
        }

        .scb-stat-num {
            font-size: 1.25rem;
            font-weight: 800;
            color: #ff6b6b;
            letter-spacing: -0.01em;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .scb-stat-num i {
            font-size: 1.1rem;
        }

        .scb-stat-lbl {
            font-size: 0.82rem;
            color: rgba(255, 255, 255, 0.95);
            font-weight: 600;
            line-height: 1.3;
        }

        .scb-hero-btn {
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

        .scb-hero-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(171, 14, 0, 0.4);
            background: #ab0e00;
            color: #ffffff !important;
            border-color: #ab0e00;
        }

        .scb-hero-img-wrap {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5);
            aspect-ratio: 4 / 3;
            background: #1e1e1e;
            transform: rotate(1deg);
            transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .scb-hero-img-wrap:hover {
            transform: scale(1.03) rotate(0deg);
            box-shadow: 0 30px 70px rgba(171, 14, 0, 0.3);
        }

        .scb-hero-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.95);
        }

        @media (max-width: 1024px) {
            .scb-hero-container {
                justify-content: center;
                text-align: center;
            }

            .scb-hero-content {
                align-items: center;
                text-align: center;
                max-width: 100%;
            }

            .scb-hero-stats {
                margin: 0 auto 30px;
            }
        }

        @media (max-width: 768px) {
            .scb-hero {
                padding: 120px 20px 60px !important;
                min-height: auto;
            }

            .scb-section {
                padding: 50px 20px !important;
            }

            .scb-hero-stats {
                grid-template-columns: repeat(3, 1fr) !important;
                gap: 8px !important;
                margin: 0 auto 24px !important;
            }

            .scb-stat-card {
                padding: 10px 6px !important;
                border-radius: 12px !important;
                align-items: center !important;
                text-align: center !important;
            }

            .scb-stat-num {
                font-size: 0.95rem !important;
                gap: 4px !important;
                justify-content: center !important;
            }

            .scb-stat-num i {
                font-size: 0.85rem !important;
            }

            .scb-stat-lbl {
                font-size: 0.62rem !important;
                line-height: 1.25 !important;
            }
        }

        @media (max-width: 480px) {
            .scb-hero-stats {
                grid-template-columns: repeat(3, 1fr) !important;
                gap: 8px !important;
            }
        }

        /* ── Sections ──────────────────────── */
        .scb-section {
            padding: 90px 20px;
            width: 100%;
            box-sizing: border-box;
        }

        .scb-container-width {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            box-sizing: border-box;
        }

        .scb-section-title-wrap {
            text-align: center;
            margin-bottom: 60px;
        }

        .scb-section-tag {
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

        .scb-section-title {
            font-size: clamp(2rem, 4vw, 2.6rem);
            font-weight: 800;
            color: #111827;
            margin: 0 0 16px 0;
            letter-spacing: -0.02em;
        }

        .scb-section-title span {
            color: #ab0e00;
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .scb-section-subtitle {
            font-size: 1.05rem;
            color: #4b5563;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* ── Benefits Split ─────────────────── */
        .scb-benefits-split {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 50px;
            align-items: center;
        }

        .scb-benefits-visual {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.05);
            background: #ffffff;
            border: 1px solid #e2e8f0;
            padding: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .scb-benefits-visual img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            transition: transform 0.5s ease;
        }

        .scb-benefits-visual:hover img {
            transform: scale(1.03);
        }

        .scb-benefits-content h3 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #111827;
            margin-bottom: 24px;
            letter-spacing: -0.015em;
        }

        .scb-benefits-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-bottom: 30px;
        }

        .scb-benefit-item {
            display: flex;
            gap: 16px;
            align-items: flex-start;
        }

        .scb-benefit-item i {
            color: #ab0e00;
            font-size: 1.15rem;
            margin-top: 3px;
            background: rgba(171, 14, 0, 0.06);
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .scb-benefit-text h4 {
            font-size: 1.05rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0 0 4px 0;
        }

        .scb-benefit-text p {
            font-size: 0.92rem;
            color: #4b5563;
            margin: 0;
            line-height: 1.5;
        }

        @media (max-width: 991px) {
            .scb-benefits-split {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .scb-benefits-visual {
                max-width: 480px;
                margin: 0 auto;
            }
        }

        /* ── Fee Conversion Table ──────────────── */
        .scb-table-section {
            background: #ffffff;
            border-radius: 28px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.02);
            border: 1px solid #e2e8f0;
            padding: 50px;
        }

        .scb-table-split {
            display: grid;
            grid-template-columns: 0.85fr 1.15fr;
            gap: 50px;
            align-items: center;
        }

        .scb-table-visual img {
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.05);
        }

        .scb-table-responsive {
            width: 100%;
            overflow-x: auto;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
        }

        .scb-table-custom {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.95rem;
            text-align: left;
        }

        .scb-table-custom th {
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff;
            padding: 18px 24px;
            font-weight: 700;
            font-size: 0.92rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .scb-table-custom td {
            padding: 18px 24px;
            border-bottom: 1px solid #f1f5f9;
            color: #374151;
            font-weight: 600;
            font-size: 0.92rem;
        }

        .scb-table-custom tbody tr {
            background: #ffffff;
            transition: all 0.2s ease;
        }

        .scb-table-custom tbody tr:hover {
            background: #fff8f7;
        }

        .scb-table-custom tbody tr:nth-child(even) {
            background: #f8fafc;
        }

        .scb-table-custom tbody tr:nth-child(even):hover {
            background: #fff8f7;
        }

        .scb-fee-formula {
            color: #ab0e00;
            font-weight: 700;
            background: #ffedec;
            padding: 6px 14px;
            border-radius: 100px;
            font-size: 0.85rem;
            border: 1px solid rgba(171, 14, 0, 0.12);
            display: inline-block;
        }

        @media (max-width: 991px) {
            .scb-table-section {
                padding: 30px 20px;
            }

            .scb-table-split {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .scb-table-visual {
                max-width: 400px;
                margin: 0 auto;
            }
        }

        /* ── Card Comparison ─────────────────── */
        .scb-cards-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .scb-card-item {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .scb-card-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
            border-color: rgba(171, 14, 0, 0.2);
        }

        .scb-card-header {
            background: #fcfcfd;
            border-bottom: 1px solid #f1f5f9;
            padding: 30px;
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .scb-card-img-box {
            width: 130px;
            flex-shrink: 0;
            filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.15));
            transition: transform 0.4s ease;
        }

        .scb-card-item:hover .scb-card-img-box {
            transform: rotate(-3deg) scale(1.05);
        }

        .scb-card-img-box img {
            width: 100%;
            height: auto;
            display: block;
        }

        .scb-card-title-wrap {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .scb-card-badge {
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #ab0e00;
            background: rgba(171, 14, 0, 0.06);
            padding: 4px 10px;
            border-radius: 4px;
            width: fit-content;
        }

        .scb-card-name {
            font-size: 1.35rem;
            font-weight: 800;
            color: #1e293b;
            margin: 0;
        }

        .scb-card-limit {
            font-size: 0.92rem;
            color: #64748b;
            font-weight: 700;
        }

        .scb-card-body {
            padding: 30px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .scb-card-details {
            list-style: none;
            padding: 0;
            margin: 0 0 30px 0;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .scb-card-details li {
            font-size: 0.92rem;
            color: #475569;
            font-weight: 500;
            line-height: 1.5;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .scb-card-details li.detail-title {
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin-top: 10px;
            color: #ab0e00;
            border-bottom: 1px dashed rgba(171, 14, 0, 0.15);
            padding-bottom: 4px;
        }

        .scb-card-details li.detail-title i {
            color: #ab0e00;
            background: none;
            width: auto;
            height: auto;
        }

        .scb-card-details li i {
            font-size: 0.9rem;
            margin-top: 4px;
            flex-shrink: 0;
        }

        .scb-card-details li i.fa-shield-halved {
            color: #0284c7;
        }

        .scb-card-details li i.fa-gift {
            color: #ea580c;
        }

        .scb-card-details li strong {
            color: #1e293b;
            font-weight: 700;
        }

        .scb-card-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff !important;
            padding: 14px 28px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.92rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 6px 20px rgba(171, 14, 0, 0.25);
            border: none;
            width: 100%;
            text-align: center;
            text-decoration: none;
        }

        .scb-card-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(171, 14, 0, 0.35);
            filter: brightness(1.1);
        }

        @media (max-width: 991px) {
            .scb-cards-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .scb-card-header {
                padding: 24px;
            }

            .scb-card-body {
                padding: 24px;
            }
        }

        @media (max-width: 576px) {
            .scb-card-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 16px;
                padding: 20px;
            }

            .scb-card-title-wrap {
                align-items: center;
                text-align: center;
            }

            .scb-card-body {
                padding: 20px;
            }
        }

        /* ── Steps Timeline ───────────────────── */
        .scb-timeline-inner {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            position: relative;
        }

        /* Connecting line for timeline */
        .scb-timeline-inner::after {
            content: '';
            position: absolute;
            top: 50px;
            left: 12.5%;
            width: 75%;
            height: 3px;
            background: #e2e8f0;
            z-index: 1;
        }

        .scb-timeline-step {
            background: #ffffff;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.02);
            border: 1px solid #e2e8f0;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .scb-timeline-step:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(171, 14, 0, 0.08);
            border-color: rgba(171, 14, 0, 0.15);
        }

        .scb-step-icon-wrap {
            width: 72px;
            height: 72px;
            background: #ffffff;
            border: 4px solid #f8fafc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .scb-timeline-step:hover .scb-step-icon-wrap {
            transform: scale(1.05);
            box-shadow: 0 10px 24px rgba(171, 14, 0, 0.15);
            border-color: #ffedec;
        }

        .scb-step-icon-wrap img {
            width: 40px;
            height: auto;
        }

        .scb-timeline-step h4 {
            font-size: 1.05rem;
            font-weight: 800;
            color: #1e293b;
            margin: 0 0 10px 0;
            line-height: 1.4;
        }

        .scb-timeline-step p {
            font-size: 0.88rem;
            color: #64748b;
            margin: 0;
            line-height: 1.5;
            font-weight: 500;
        }

        @media (max-width: 991px) {
            .scb-timeline-inner {
                grid-template-columns: 1fr 1fr;
                gap: 24px;
            }

            .scb-timeline-inner::after {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .scb-cards-grid {
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

            .scb-cards-grid::-webkit-scrollbar {
                display: none;
                /* Chrome/Safari */
            }

            .scb-card-item {
                flex: 0 0 280px;
                max-width: 280px;
                scroll-snap-align: center;
            }

            .slider-dots {
                display: flex;
                justify-content: center;
                gap: 8px;
                margin-top: 24px;
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
        <section class="scb-hero" id="scb-hero-top">
            <div class="scb-hero-bg" id="scb-parallax-bg"
                style="background-image: url('https://ideas.edu.vn/wp-content/uploads/2026/04/recap_growverth.webp');">
            </div>
            <div class="scb-hero-overlay"></div>
            <div class="scb-hero-container">
                <div class="scb-hero-content">
                    <div class="scb-hero-badge"><svg class="svg-icon fa-circle-dollar-to-slot fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M326.7 403.7c-22.1 8-45.9 12.3-70.7 12.3s-48.7-4.4-70.7-12.3l-.8-.3c-30-11-56.8-28.7-78.6-51.4C70 314.6 48 263.9 48 208C48 93.1 141.1 0 256 0S464 93.1 464 208c0 55.9-22 106.6-57.9 144c-1 1-2 2.1-3 3.1c-21.4 21.4-47.4 38.1-76.3 48.6zM256 91.9c-11.1 0-20.1 9-20.1 20.1l0 6c-5.6 1.2-10.9 2.9-15.9 5.1c-15 6.8-27.9 19.4-31.1 37.7c-1.8 10.2-.8 20 3.4 29c4.2 8.8 10.7 15 17.3 19.5c11.6 7.9 26.9 12.5 38.6 16l2.2 .7c13.9 4.2 23.4 7.4 29.3 11.7c2.5 1.8 3.4 3.2 3.7 4c.3 .8 .9 2.6 .2 6.7c-.6 3.5-2.5 6.4-8 8.8c-6.1 2.6-16 3.9-28.8 1.9c-6-1-16.7-4.6-26.2-7.9c0 0 0 0 0 0s0 0 0 0s0 0 0 0c-2.2-.7-4.3-1.5-6.4-2.1c-10.5-3.5-21.8 2.2-25.3 12.7s2.2 21.8 12.7 25.3c1.2 .4 2.7 .9 4.4 1.5c7.9 2.7 20.3 6.9 29.8 9.1l0 6.4c0 11.1 9 20.1 20.1 20.1s20.1-9 20.1-20.1l0-5.5c5.3-1 10.5-2.5 15.4-4.6c15.7-6.7 28.4-19.7 31.6-38.7c1.8-10.4 1-20.3-3-29.4c-3.9-9-10.2-15.6-16.9-20.5c-12.2-8.8-28.3-13.7-40.4-17.4l-.8-.2c-14.2-4.3-23.8-7.3-29.9-11.4c-2.6-1.8-3.4-3-3.6-3.5c-.2-.3-.7-1.6-.1-5c.3-1.9 1.9-5.2 8.2-8.1c6.4-2.9 16.4-4.5 28.6-2.6c4.3 .7 17.9 3.3 21.7 4.3c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-4.4-1.2-14.4-3.2-21-4.4l0-6.3c0-11.1-9-20.1-20.1-20.1zM48 352l16 0c19.5 25.9 44 47.7 72.2 64L64 416l0 32 192 0 192 0 0-32-72.2 0c28.2-16.3 52.8-38.1 72.2-64l16 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48z"/></svg> <?php echo $is_en ? '0% TUITION INSTALLMENT SUPPORT' : 'HỖ TRỢ TRẢ GÓP HỌC PHÍ 0%'; ?></div>
                    <h1>IDEAS <br><span>SACOMBANK</span></h1>
            <div class="verify-slogan">
                <?php echo $is_en ? '"Original Knowledge - Local Companionship"' : '"Tri thức Nguyên bản - Đồng hành Bản địa"'; ?>
            </div>

                    <p class="hero-subtitle"><?php echo $is_en ? 'Financial peace of mind – Steady path to conquer the MBA program. Exclusive financial support program linked with strategic partner Sacombank.' : 'An tâm tài chính – Vững vàng chinh phục chương trình MBA. Chương trình liên kết hỗ trợ tài chính đặc quyền từ đối tác chiến lược Sacombank.'; ?></p>

                    <div class="scb-hero-stats">
                        <div class="scb-stat-card">
                            <span class="scb-stat-num"><svg class="svg-icon fa-coins fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2c0 0 0 0 0 0s0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4l0 3.4 0 5.7 0 26.3zm32 0l0-32 0-25.9c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 44.2-86 80-192 80S0 476.2 0 432l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z"/></svg> 250M</span>
                            <span class="scb-stat-lbl"><?php echo $is_en ? 'Integrated MBA Program Tuition' : 'Học phí chương trình MBA tích hợp'; ?></span>
                        </div>
                        <div class="scb-stat-card">
                            <span class="scb-stat-num"><svg class="svg-icon fa-calendar-check fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zM329 305c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-95 95-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L329 305z"/></svg> <?php echo $is_en ? '24 Mos' : '24 Th'; ?></span>
                            <span class="scb-stat-lbl"><?php echo $is_en ? 'Max Flexible Installment Period' : 'Thời gian trả góp linh hoạt tối đa'; ?></span>
                        </div>
                        <div class="scb-stat-card">
                            <span class="scb-stat-num"><svg class="svg-icon fa-hand-holding-dollar fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M312 24l0 10.5c6.4 1.2 12.6 2.7 18.2 4.2c12.8 3.4 20.4 16.6 17 29.4s-16.6 20.4-29.4 17c-10.9-2.9-21.1-4.9-30.2-5c-7.3-.1-14.7 1.7-19.4 4.4c-2.1 1.3-3.1 2.4-3.5 3c-.3 .5-.7 1.2-.7 2.8c0 .3 0 .5 0 .6c.2 .2 .9 1.2 3.3 2.6c5.8 3.5 14.4 6.2 27.4 10.1l.9 .3s0 0 0 0c11.1 3.3 25.9 7.8 37.9 15.3c13.7 8.6 26.1 22.9 26.4 44.9c.3 22.5-11.4 38.9-26.7 48.5c-6.7 4.1-13.9 7-21.3 8.8l0 10.6c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-11.4c-9.5-2.3-18.2-5.3-25.6-7.8c-2.1-.7-4.1-1.4-6-2c-12.6-4.2-19.4-17.8-15.2-30.4s17.8-19.4 30.4-15.2c2.6 .9 5 1.7 7.3 2.5c13.6 4.6 23.4 7.9 33.9 8.3c8 .3 15.1-1.6 19.2-4.1c1.9-1.2 2.8-2.2 3.2-2.9c.4-.6 .9-1.8 .8-4.1l0-.2c0-1 0-2.1-4-4.6c-5.7-3.6-14.3-6.4-27.1-10.3l-1.9-.6c-10.8-3.2-25-7.5-36.4-14.4c-13.5-8.1-26.5-22-26.6-44.1c-.1-22.9 12.9-38.6 27.7-47.4c6.4-3.8 13.3-6.4 20.2-8.2L264 24c0-13.3 10.7-24 24-24s24 10.7 24 24zM568.2 336.3c13.1 17.8 9.3 42.8-8.5 55.9L433.1 485.5c-23.4 17.2-51.6 26.5-80.7 26.5L192 512 32 512c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l36.8 0 44.9-36c22.7-18.2 50.9-28 80-28l78.3 0 16 0 64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0-16 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l120.6 0 119.7-88.2c17.8-13.1 42.8-9.3 55.9 8.5zM193.6 384c0 0 0 0 0 0l-.9 0c.3 0 .6 0 .9 0z"/></svg> 5.9M</span>
                            <span class="scb-stat-lbl"><?php echo $is_en ? 'Monthly Payment Starting From' : 'Trả góp hàng tháng chỉ từ (VND)'; ?></span>
                        </div>
                    </div>

                    <a class="scb-hero-btn" onclick="showform('Trả góp Sacombank - Hero CTA')"><svg class="svg-icon fa-headset fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 48C141.1 48 48 141.1 48 256l0 40c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-40C0 114.6 114.6 0 256 0S512 114.6 512 256l0 144.1c0 48.6-39.4 88-88.1 88L313.6 488c-8.3 14.3-23.8 24-41.6 24l-32 0c-26.5 0-48-21.5-48-48s21.5-48 48-48l32 0c17.8 0 33.3 9.7 41.6 24l110.4 .1c22.1 0 40-17.9 40-40L464 256c0-114.9-93.1-208-208-208zM144 208l16 0c17.7 0 32 14.3 32 32l0 112c0 17.7-14.3 32-32 32l-16 0c-35.3 0-64-28.7-64-64l0-48c0-35.3 28.7-64 64-64zm224 0c35.3 0 64 28.7 64 64l0 48c0 35.3-28.7 64-64 64l-16 0c-17.7 0-32-14.3-32-32l0-112c0-17.7 14.3-32 32-32l16 0z"/></svg> <?php echo $is_en ? 'Get Installment Advice' : 'Nhận tư vấn trả góp'; ?></a>
                </div>

            </div>
        </section>

        <!-- SECTION 1: BENEFITS OF THE PROGRAM -->
        <section class="scb-section" style="background-color: #ffffff;">
            <div class="scb-container-width">
                <div class="scb-benefits-split">
                    <div class="scb-benefits-visual">
                        <img src="/wp-content/uploads/external-migrated/Homepage_20DN_Sp_20noi_20bat_New_13_04_469353da.webp"
                            alt="<?php echo $is_en ? 'Sacombank personal and corporate credit cards' : 'Thẻ tín dụng doanh nghiệp cá nhân Sacombank'; ?>" />
                    </div>
                    <div class="scb-benefits-content">
                        <span class="scb-section-tag"><svg class="svg-icon fa-credit-card fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M64 32C28.7 32 0 60.7 0 96l0 32 576 0 0-32c0-35.3-28.7-64-64-64L64 32zM576 224L0 224 0 416c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-192zM112 352l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm112 16c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16z"/></svg> <?php echo $is_en ? 'Exclusive Privileges' : 'Đặc quyền'; ?></span>
                        <h3><?php echo $is_en ? 'Outstanding Benefits <span>of Opening Card</span>' : 'Lợi ích vượt trội <span>khi mở thẻ</span>'; ?></h3>
                        <div class="scb-benefits-list">
                            <div class="scb-benefit-item">
                                <svg class="svg-icon fa-hand-holding-hand fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M7.8 207.7c-13.1-17.8-9.3-42.8 8.5-55.9L142.9 58.5C166.2 41.3 194.5 32 223.5 32L384 32l160 0c17.7 0 32 14.3 32 32l0 64c0 17.7-14.3 32-32 32l-36.8 0-44.9 36c-22.7 18.2-50.9 28-80 28L304 224l-16 0-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0 16 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-120.6 0L63.7 216.2c-17.8 13.1-42.8 9.3-55.9-8.5zM382.4 160c0 0 0 0 0 0l.9 0c-.3 0-.6 0-.9 0zM568.2 304.3c13.1 17.8 9.3 42.8-8.5 55.9L433.1 453.5c-23.4 17.2-51.6 26.5-80.7 26.5L192 480 32 480c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l36.8 0 44.9-36c22.7-18.2 50.9-28 80-28l78.3 0 16 0 64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0-16 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l120.6 0 119.7-88.2c17.8-13.1 42.8-9.3 55.9 8.5zM193.6 352c0 0 0 0 0 0l-.9 0c.3 0 .6 0 .9 0z"/></svg>
                                <div class="scb-benefit-text">
                                    <h4><?php echo $is_en ? 'Bank-Advanced Prepayment' : 'Ngân hàng hỗ trợ thanh toán trước'; ?></h4>
                                    <p><?php echo $is_en ? 'Students have their tuition advanced by Sacombank at enrollment to activate their official LMS account immediately.' : 'Học viên được ngân hàng Sacombank ứng vốn hoàn tất học phí ngay tại thời điểm nhập học để được kích hoạt tài khoản LMS chính thức.'; ?></p>
                                </div>
                            </div>
                            <div class="scb-benefit-item">
                                <svg class="svg-icon fa-percent fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M374.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-320 320c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l320-320zM128 128A64 64 0 1 0 0 128a64 64 0 1 0 128 0zM384 384a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/></svg>
                                <div class="scb-benefit-text">
                                    <h4><?php echo $is_en ? '0% Interest Installment Tuition' : 'Học phí trả góp lãi suất 0%'; ?></h4>
                                    <p><?php echo $is_en ? 'Support splitting tuition into flexible installments (3, 6, 9, 12, 18, or 24 months) at 0% interest rate.' : 'Hỗ trợ chia nhỏ học phí trả góp theo nhiều kỳ hạn linh động mong muốn (3, 6, 9, 12, 18, hoặc 24 tháng) với lãi suất 0%.'; ?></p>
                                </div>
                            </div>
                            <div class="scb-benefit-item">
                                <svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                                <div class="scb-benefit-text">
                                    <h4><?php echo $is_en ? 'Double Offers from Both Sides' : 'Hưởng trọn ưu đãi từ hai phía'; ?></h4>
                                    <p><?php echo $is_en ? 'Card-opening students receive gift programs from Sacombank while keeping existing promotional discounts from IDEAS/TSSAC.' : 'Học viên mở thẻ vừa nhận chính sách quà tặng từ Sacombank vừa giữ nguyên các chương trình ưu đãi hiện hành của IDEAS/TSSAC.'; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 2: CONVERSION FEE TABLE -->
        <section class="scb-section" style="background-color: #ffffff;">
            <div class="scb-container-width">
                <div class="scb-section-title-wrap">
                    <span class="scb-section-tag"><svg class="svg-icon fa-table fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M64 256l0-96 160 0 0 96L64 256zm0 64l160 0 0 96L64 416l0-96zm224 96l0-96 160 0 0 96-160 0zM448 256l-160 0 0-96 160 0 0 96zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32z"/></svg> <?php echo $is_en ? 'Fee Schedule' : 'Biểu phí'; ?></span>
                    <h2 class="scb-section-title"><?php echo $is_en ? 'Sacombank <span>Installment</span> Conversion Fee' : 'Phí Chuyển Đổi <span>Trả Góp</span> Sacombank'; ?></h2>
                    <p class="scb-section-subtitle"><?php echo $is_en ? 'Details of the service fees for 0% installment conversion applied to Sacombank international credit cardholders.' : 'Chi tiết biểu phí dịch vụ chuyển đổi trả góp 0% áp dụng cho chủ thẻ tín dụng quốc tế Sacombank.'; ?></p>
                </div>

                <div class="scb-table-section">
                    <div class="scb-table-split">
                        <div class="scb-table-visual">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp"
                                alt="IDEAS Sacombank Finance Support" />
                        </div>
                        <div class="scb-table-responsive">
                            <table class="scb-table-custom">
                                <thead>
                                    <tr>
                                        <th style="width: 30%;"><?php echo $is_en ? 'Tenor (months)' : 'Kỳ hạn (tháng)'; ?></th>
                                        <th style="width: 70%;"><?php echo $is_en ? 'Applied Conversion Fee' : 'Phí chuyển đổi áp dụng'; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong><?php echo $is_en ? '3 months' : '3 tháng'; ?></strong></td>
                                        <td rowspan="2" style="vertical-align: middle;">
                                            <span class="scb-fee-formula"><?php echo $is_en ? '0.4%/month' : '0,4%/tháng'; ?></span> <?php echo $is_en ? 'x tenor x payment amount' : 'x kỳ hạn x số tiền thanh toán'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong><?php echo $is_en ? '6 months' : '6 tháng'; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?php echo $is_en ? '9 months' : '9 tháng'; ?></strong></td>
                                        <td rowspan="2" style="vertical-align: middle;">
                                            <span class="scb-fee-formula"><?php echo $is_en ? '0.45%/month' : '0,45%/tháng'; ?></span> <?php echo $is_en ? 'x tenor x payment amount' : 'x kỳ hạn x số tiền thanh toán'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong><?php echo $is_en ? '12 months' : '12 tháng'; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong><?php echo $is_en ? '18 months' : '18 tháng'; ?></strong></td>
                                        <td rowspan="2" style="vertical-align: middle;">
                                            <span class="scb-fee-formula"><?php echo $is_en ? '0.5%/month' : '0,5%/tháng'; ?></span> <?php echo $is_en ? 'x tenor x payment amount' : 'x kỳ hạn x số tiền thanh toán'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong><?php echo $is_en ? '24 months' : '24 tháng'; ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 3: CARD COMPARISON GRID -->
        <section class="scb-section">
            <div class="scb-container-width">
                <div class="scb-section-title-wrap">
                    <span class="scb-section-tag"><svg class="svg-icon fa-id-card fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 96l576 0c0-35.3-28.7-64-64-64L64 32C28.7 32 0 60.7 0 96zm0 32L0 416c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-288L0 128zM64 405.3c0-29.5 23.9-53.3 53.3-53.3l117.3 0c29.5 0 53.3 23.9 53.3 53.3c0 5.9-4.8 10.7-10.7 10.7L74.7 416c-5.9 0-10.7-4.8-10.7-10.7zM176 192a64 64 0 1 1 0 128 64 64 0 1 1 0-128zm176 16c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16z"/></svg> <?php echo $is_en ? 'Card Options' : 'Lựa chọn thẻ'; ?></span>
                    <h2 class="scb-section-title"><?php echo $is_en ? 'Comparison of Sacombank <span>Credit Cards</span>' : 'So Sánh Dòng Thẻ <span>Tín Dụng</span> Sacombank'; ?></h2>
                    <p class="scb-section-subtitle"><?php echo $is_en ? 'Two Visa international credit card lines commonly trusted by students to register for tuition support.' : 'Hai dòng thẻ tín dụng quốc tế Visa được học viên tin dùng phổ biến để đăng ký hỗ trợ trả học phí.'; ?></p>
                </div>

                <div class="scb-cards-grid">
                    <!-- Visa Platinum Card -->
                    <div class="scb-card-item">
                        <div class="scb-card-header">
                            <div class="scb-card-img-box">
                                <img src="/wp-content/uploads/external-migrated/Visa_20Credit_20Plantinum_20Cashback_contactless-01_8ced97f8.webp"
                                    alt="Sacombank Visa Platinum Cashback" />
                            </div>
                            <div class="scb-card-title-wrap">
                                <span class="scb-card-badge"><?php echo $is_en ? 'Popular' : 'Phổ biến'; ?></span>
                                <h4 class="scb-card-name">Visa Platinum</h4>
                                <span class="scb-card-limit"><?php echo $is_en ? 'Limit from 40M - 100M VND' : 'Hạn mức từ 40M - 100M VND'; ?></span>
                            </div>
                        </div>
                        <div class="scb-card-body">
                            <ul class="scb-card-details">
                                <li class="detail-title"><svg class="svg-icon fa-circle-info fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336l24 0 0-64-24 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l48 0c13.3 0 24 10.7 24 24l0 88 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-80 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg> <?php echo $is_en ? 'Annual Fee Information' : 'Thông tin phí thường niên'; ?></li>
                                <li>
                                    <svg class="svg-icon fa-shield-halved fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 0c4.6 0 9.2 1 13.4 2.9L457.7 82.8c22 9.3 38.4 31 38.3 57.2c-.5 99.2-41.3 280.7-213.6 363.2c-16.7 8-36.1 8-52.8 0C57.3 420.7 16.5 239.2 16 140c-.1-26.2 16.3-47.9 38.3-57.2L242.7 2.9C246.8 1 251.4 0 256 0zm0 66.8l0 378.1C394 378 431.1 230.1 432 141.4L256 66.8s0 0 0 0z"/></svg>
                                    <span><?php echo $is_en ? 'Year 1 Annual Fee: 100% charged <strong>(VND 599,000)</strong>' : 'Phí thường niên năm 1: thu 100% <strong>(599.000đ)</strong>'; ?></span>
                                </li>
                                <li>
                                    <svg class="svg-icon fa-shield-halved fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 0c4.6 0 9.2 1 13.4 2.9L457.7 82.8c22 9.3 38.4 31 38.3 57.2c-.5 99.2-41.3 280.7-213.6 363.2c-16.7 8-36.1 8-52.8 0C57.3 420.7 16.5 239.2 16 140c-.1-26.2 16.3-47.9 38.3-57.2L242.7 2.9C246.8 1 251.4 0 256 0zm0 66.8l0 378.1C394 378 431.1 230.1 432 141.4L256 66.8s0 0 0 0z"/></svg>
                                    <span><?php echo $is_en ? 'Year 2+ Annual Fee waiver/reduction:' : 'Miễn/giảm phí thường niên từ năm thứ 2 trở đi:'; ?></span>
                                </li>
                                <li style="padding-left: 20px;">
                                    <svg class="svg-icon fa-circle-chevron-right fa-solid" style="font-size: 0.75rem; color: #ab0e00;" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM241 377c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l87-87-87-87c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L345 239c9.4 9.4 9.4 24.6 0 33.9L241 377z"/></svg>
                                    <span><?php echo $is_en ? 'Payment volume of <strong>VND 400M/year</strong>: 100% Annual Fee waived' : 'Doanh số giao dịch thanh toán <strong>400trđ/năm</strong>: Miễn 100% PTN'; ?></span>
                                </li>
                                <li style="padding-left: 20px;">
                                    <svg class="svg-icon fa-circle-chevron-right fa-solid" style="font-size: 0.75rem; color: #ab0e00;" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM241 377c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l87-87-87-87c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L345 239c9.4 9.4 9.4 24.6 0 33.9L241 377z"/></svg>
                                    <span><?php echo $is_en ? 'Payment volume of <strong>VND 300M/year</strong>: 50% Annual Fee reduced' : 'Doanh số giao dịch thanh toán <strong>300trđ/năm</strong>: Giảm 50% PTN'; ?></span>
                                </li>

                                <li class="detail-title"><svg class="svg-icon fa-gift fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M190.5 68.8L225.3 128l-1.3 0-72 0c-22.1 0-40-17.9-40-40s17.9-40 40-40l2.2 0c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40L32 128c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l448 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-41.6 0c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88l-2.2 0c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0L152 0C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40l-72 0-1.3 0 34.8-59.2C329.1 55.9 342.9 48 357.8 48l2.2 0c22.1 0 40 17.9 40 40zM32 288l0 176c0 26.5 21.5 48 48 48l144 0 0-224L32 288zM288 512l144 0c26.5 0 48-21.5 48-48l0-176-192 0 0 224z"/></svg> <?php echo $is_en ? 'Benefits &amp; Co-branded Partners' : 'Quyền lợi &amp; Đối tác liên kết'; ?></li>
                                <li>
                                    <svg class="svg-icon fa-gift fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M190.5 68.8L225.3 128l-1.3 0-72 0c-22.1 0-40-17.9-40-40s17.9-40 40-40l2.2 0c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40L32 128c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l448 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-41.6 0c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88l-2.2 0c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0L152 0C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40l-72 0-1.3 0 34.8-59.2C329.1 55.9 342.9 48 357.8 48l2.2 0c22.1 0 40 17.9 40 40zM32 288l0 176c0 26.5 21.5 48 48 48l144 0 0-224L32 288zM288 512l144 0c26.5 0 48-21.5 48-48l0-176-192 0 0 224z"/></svg>
                                    <span><?php echo $is_en ? 'VND 600,000 cashback on new card opening &amp; spending from VND 2,000,000 in 30 days.' : 'Hoàn 600.000 VND khi lần đầu mở thẻ &amp; chi tiêu hóa đơn từ 2.000.000 VND trong 30 ngày.'; ?></span>
                                </li>
                                <li>
                                    <svg class="svg-icon fa-gift fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M190.5 68.8L225.3 128l-1.3 0-72 0c-22.1 0-40-17.9-40-40s17.9-40 40-40l2.2 0c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40L32 128c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l448 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-41.6 0c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88l-2.2 0c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0L152 0C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40l-72 0-1.3 0 34.8-59.2C329.1 55.9 342.9 48 357.8 48l2.2 0c22.1 0 40 17.9 40 40zM32 288l0 176c0 26.5 21.5 48 48 48l144 0 0-224L32 288zM288 512l144 0c26.5 0 48-21.5 48-48l0-176-192 0 0 224z"/></svg>
                                    <span><?php echo $is_en ? 'Exclusive discounts at CGV, Agoda, Zara, Klook, Xanh SM, Grab, Starbucks, Kichi Kichi, Gogi House...' : 'Ưu đãi giảm giá đặc quyền tại CGV, Agoda, Zara, Klook, Xanh SM, Grab, Starbucks, Kichi Kichi, Gogi House...'; ?></span>
                                </li>
                            </ul>
                            <button class="scb-card-btn" onclick="showform('Trả góp Sacombank - Visa Platinum')"><svg class="svg-icon fa-headset fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 48C141.1 48 48 141.1 48 256l0 40c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-40C0 114.6 114.6 0 256 0S512 114.6 512 256l0 144.1c0 48.6-39.4 88-88.1 88L313.6 488c-8.3 14.3-23.8 24-41.6 24l-32 0c-26.5 0-48-21.5-48-48s21.5-48 48-48l32 0c17.8 0 33.3 9.7 41.6 24l110.4 .1c22.1 0 40-17.9 40-40L464 256c0-114.9-93.1-208-208-208zM144 208l16 0c17.7 0 32 14.3 32 32l0 112c0 17.7-14.3 32-32 32l-16 0c-35.3 0-64-28.7-64-64l0-48c0-35.3 28.7-64 64-64zm224 0c35.3 0 64 28.7 64 64l0 48c0 35.3-28.7 64-64 64l-16 0c-17.7 0-32-14.3-32-32l0-112c0-17.7 14.3-32 32-32l16 0z"/></svg> <?php echo $is_en ? 'Register for Visa Platinum' : 'Đăng ký mở thẻ Visa Platinum'; ?></button>
                        </div>
                    </div>

                    <!-- Visa Signature Card -->
                    <div class="scb-card-item">
                        <div class="scb-card-header">
                            <div class="scb-card-img-box">
                                <img src="/wp-content/uploads/external-migrated/Visa_20Credit_20Signature_contactless-01_bf260dc0.webp"
                                    alt="Sacombank Visa Signature" />
                            </div>
                            <div class="scb-card-title-wrap">
                                <span class="scb-card-badge" style="background-color: #fef3c7; color: #d97706;"><?php echo $is_en ? 'Premium' : 'Cao cấp'; ?></span>
                                <h4 class="scb-card-name">Visa Signature</h4>
                                <span class="scb-card-limit"><?php echo $is_en ? 'Limit from 100M VND and above' : 'Hạn mức từ 100M VND trở lên'; ?></span>
                            </div>
                        </div>
                        <div class="scb-card-body">
                            <ul class="scb-card-details">
                                <li class="detail-title"><svg class="svg-icon fa-circle-info fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336l24 0 0-64-24 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l48 0c13.3 0 24 10.7 24 24l0 88 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-80 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg> <?php echo $is_en ? 'Annual Fee Information' : 'Thông tin phí thường niên'; ?></li>
                                <li>
                                    <svg class="svg-icon fa-shield-halved fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 0c4.6 0 9.2 1 13.4 2.9L457.7 82.8c22 9.3 38.4 31 38.3 57.2c-.5 99.2-41.3 280.7-213.6 363.2c-16.7 8-36.1 8-52.8 0C57.3 420.7 16.5 239.2 16 140c-.1-26.2 16.3-47.9 38.3-57.2L242.7 2.9C246.8 1 251.4 0 256 0zm0 66.8l0 378.1C394 378 431.1 230.1 432 141.4L256 66.8s0 0 0 0z"/></svg>
                                    <span><?php echo $is_en ? 'Year 1 Annual Fee: 100% charged <strong>(VND 1,499,000)</strong>' : 'Phí thường niên năm 1: thu 100% <strong>(1.499.000đ)</strong>'; ?></span>
                                </li>
                                <li>
                                    <svg class="svg-icon fa-shield-halved fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 0c4.6 0 9.2 1 13.4 2.9L457.7 82.8c22 9.3 38.4 31 38.3 57.2c-.5 99.2-41.3 280.7-213.6 363.2c-16.7 8-36.1 8-52.8 0C57.3 420.7 16.5 239.2 16 140c-.1-26.2 16.3-47.9 38.3-57.2L242.7 2.9C246.8 1 251.4 0 256 0zm0 66.8l0 378.1C394 378 431.1 230.1 432 141.4L256 66.8s0 0 0 0z"/></svg>
                                    <span><?php echo $is_en ? 'Year 2+ Annual Fee waiver/reduction:' : 'Miễn/giảm phí thường niên từ năm thứ 2 trở đi:'; ?></span>
                                </li>
                                <li style="padding-left: 20px;">
                                    <svg class="svg-icon fa-circle-chevron-right fa-solid" style="font-size: 0.75rem; color: #ab0e00;" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM241 377c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l87-87-87-87c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L345 239c9.4 9.4 9.4 24.6 0 33.9L241 377z"/></svg>
                                    <span><?php echo $is_en ? 'Payment volume of <strong>VND 400M/year</strong>: 100% Annual Fee waived' : 'Doanh số giao dịch thanh toán <strong>400trđ/năm</strong>: Miễn 100% PTN'; ?></span>
                                </li>
                                <li style="padding-left: 20px;">
                                    <svg class="svg-icon fa-circle-chevron-right fa-solid" style="font-size: 0.75rem; color: #ab0e00;" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM241 377c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l87-87-87-87c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L345 239c9.4 9.4 9.4 24.6 0 33.9L241 377z"/></svg>
                                    <span><?php echo $is_en ? 'Payment volume of <strong>VND 300M/year</strong>: 50% Annual Fee reduced' : 'Doanh số giao dịch thanh toán <strong>300trđ/năm</strong>: Giảm 50% PTN'; ?></span>
                                </li>

                                <li class="detail-title"><svg class="svg-icon fa-gift fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M190.5 68.8L225.3 128l-1.3 0-72 0c-22.1 0-40-17.9-40-40s17.9-40 40-40l2.2 0c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40L32 128c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l448 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-41.6 0c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88l-2.2 0c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0L152 0C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40l-72 0-1.3 0 34.8-59.2C329.1 55.9 342.9 48 357.8 48l2.2 0c22.1 0 40 17.9 40 40zM32 288l0 176c0 26.5 21.5 48 48 48l144 0 0-224L32 288zM288 512l144 0c26.5 0 48-21.5 48-48l0-176-192 0 0 224z"/></svg> <?php echo $is_en ? 'Benefits &amp; Co-branded Partners' : 'Quyền lợi &amp; Đối tác liên kết'; ?></li>
                                <li>
                                    <svg class="svg-icon fa-gift fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M190.5 68.8L225.3 128l-1.3 0-72 0c-22.1 0-40-17.9-40-40s17.9-40 40-40l2.2 0c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40L32 128c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l448 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-41.6 0c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88l-2.2 0c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0L152 0C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40l-72 0-1.3 0 34.8-59.2C329.1 55.9 342.9 48 357.8 48l2.2 0c22.1 0 40 17.9 40 40zM32 288l0 176c0 26.5 21.5 48 48 48l144 0 0-224L32 288zM288 512l144 0c26.5 0 48-21.5 48-48l0-176-192 0 0 224z"/></svg>
                                    <span><?php echo $is_en ? 'Accumulate Sacombank miles for flight ticket redemption, Vietnam Airlines miles exchange, annual fee swap...' : 'Tích lũy dặm Sacombank để quy đổi vé máy bay nhiều hãng hàng không, đổi ngang dặm Vietnam Airlines, đổi phí thường niên...'; ?></span>
                                </li>
                                <li>
                                    <svg class="svg-icon fa-gift fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M190.5 68.8L225.3 128l-1.3 0-72 0c-22.1 0-40-17.9-40-40s17.9-40 40-40l2.2 0c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40L32 128c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l448 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32l-41.6 0c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88l-2.2 0c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0L152 0C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40l-72 0-1.3 0 34.8-59.2C329.1 55.9 342.9 48 357.8 48l2.2 0c22.1 0 40 17.9 40 40zM32 288l0 176c0 26.5 21.5 48 48 48l144 0 0-224L32 288zM288 512l144 0c26.5 0 48-21.5 48-48l0-176-192 0 0 224z"/></svg>
                                    <span><?php echo $is_en ? 'Free 1 dish at Starbucks. 25% - 50% discount at high-end Asian/European restaurant chains: Nen Light, Bom, Jumbo, Coco, Tre, Stoker...' : 'Miễn phí 1 phần đồ ăn tại Starbucks. Giảm 25% - 50% tại chuỗi nhà hàng ẩm thực Á/Âu cao cấp: Nén Light, Bờm, Jumbo, Coco, Tre, Stoker...'; ?></span>
                                </li>
                            </ul>
                            <button class="scb-card-btn" onclick="showform('Trả góp Sacombank - Visa Signature')"><svg class="svg-icon fa-headset fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 48C141.1 48 48 141.1 48 256l0 40c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-40C0 114.6 114.6 0 256 0S512 114.6 512 256l0 144.1c0 48.6-39.4 88-88.1 88L313.6 488c-8.3 14.3-23.8 24-41.6 24l-32 0c-26.5 0-48-21.5-48-48s21.5-48 48-48l32 0c17.8 0 33.3 9.7 41.6 24l110.4 .1c22.1 0 40-17.9 40-40L464 256c0-114.9-93.1-208-208-208zM144 208l16 0c17.7 0 32 14.3 32 32l0 112c0 17.7-14.3 32-32 32l-16 0c-35.3 0-64-28.7-64-64l0-48c0-35.3 28.7-64 64-64zm224 0c35.3 0 64 28.7 64 64l0 48c0 35.3-28.7 64-64 64l-16 0c-17.7 0-32-14.3-32-32l0-112c0-17.7 14.3-32 32-32l16 0z"/></svg> <?php echo $is_en ? 'Register for Visa Signature' : 'Đăng ký mở thẻ Visa Signature'; ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 4: REGISTRATION TIMELINE -->
        <section class="scb-section" style="background-color: #ffffff;">
            <div class="scb-container-width">
                <div class="scb-section-title-wrap">
                    <span class="scb-section-tag"><svg class="svg-icon fa-route fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M512 96c0 50.2-59.1 125.1-84.6 155c-3.8 4.4-9.4 6.1-14.5 5L320 256c-17.7 0-32 14.3-32 32s14.3 32 32 32l96 0c53 0 96 43 96 96s-43 96-96 96l-276.4 0c8.7-9.9 19.3-22.6 30-36.8c6.3-8.4 12.8-17.6 19-27.2L416 448c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0c-53 0-96-43-96-96s43-96 96-96l39.8 0c-21-31.5-39.8-67.7-39.8-96c0-53 43-96 96-96s96 43 96 96zM117.1 489.1c-3.8 4.3-7.2 8.1-10.1 11.3l-1.8 2-.2-.2c-6 4.6-14.6 4-20-1.8C59.8 473 0 402.5 0 352c0-53 43-96 96-96s96 43 96 96c0 30-21.1 67-43.5 97.9c-10.7 14.7-21.7 28-30.8 38.5l-.6 .7zM128 352a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM416 128a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg> <?php echo $is_en ? 'Process' : 'Quy trình'; ?></span>
                    <h2 class="scb-section-title"><?php echo $is_en ? 'Registration <span>Process</span> &amp; Enrollment' : 'Quy Trình <span>Đăng Ký</span> &amp; Nhập Học'; ?></h2>
                    <p class="scb-section-subtitle"><?php echo $is_en ? 'In just 4 simple steps, students can complete their tuition installment registration and begin the MBA program.' : 'Chỉ với 4 bước đơn giản, học viên có thể hoàn tất đăng ký trả góp học phí và bắt đầu chương trình MBA.'; ?></p>
                </div>

                <div class="scb-timeline-inner">
                    <!-- Step 1 -->
                    <div class="scb-timeline-step">
                        <div class="scb-step-icon-wrap">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2022/02/icon4.webp"
                                alt="<?php echo $is_en ? 'Step 1 Application intake' : 'Bước 1 Tiếp nhận hồ sơ'; ?>" />
                        </div>
                        <h4><?php echo $is_en ? '1. Application Intake' : '1. Tiếp nhận hồ sơ'; ?></h4>
                        <p><?php echo $is_en ? 'Students provide National ID, phone number, and desired tuition amount for installment setup.' : 'Học viên cung cấp CCCD, Số điện thoại và số tiền học phí mong muốn làm thủ tục trả góp.'; ?></p>
                    </div>

                    <!-- Step 2 -->
                    <div class="scb-timeline-step">
                        <div class="scb-step-icon-wrap">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2022/02/icon3.webp"
                                alt="<?php echo $is_en ? 'Step 2 Bank verification' : 'Bước 2 Xác nhận ngân hàng'; ?>" />
                        </div>
                        <h4><?php echo $is_en ? '2. Bank Verification' : '2. Ngân hàng xác nhận'; ?></h4>
                        <p><?php echo $is_en ? 'Sacombank receives info and conducts a preliminary credit limit check for the student.' : 'Sacombank tiếp nhận thông tin và kiểm tra sơ bộ điều kiện cấp hạn mức tín dụng cho học viên.'; ?></p>
                    </div>

                    <!-- Step 3 -->
                    <div class="scb-timeline-step">
                        <div class="scb-step-icon-wrap">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2022/02/icon1.webp"
                                alt="<?php echo $is_en ? 'Step 3 Processing profile' : 'Bước 3 Xử lý hồ sơ'; ?>" />
                        </div>
                        <h4><?php echo $is_en ? '3. Processing &amp; Issuance' : '3. Xử lý &amp; Phát hành'; ?></h4>
                        <p><?php echo $is_en ? 'Credit specialist contacts and guides the student through rapid on-site card issuance signing.' : 'Chuyên viên tín dụng liên hệ, hướng dẫn học viên ký hồ sơ phát hành thẻ tận nơi nhanh chóng.'; ?></p>
                    </div>

                    <!-- Step 4 -->
                    <div class="scb-timeline-step">
                        <div class="scb-step-icon-wrap">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2022/02/icon2.webp"
                                alt="<?php echo $is_en ? 'Step 4 Tuition payment' : 'Bước 4 Thanh toán học phí'; ?>" />
                        </div>
                        <h4><?php echo $is_en ? '4. Tuition Payment' : '4. Thanh toán học phí'; ?></h4>
                        <p><?php echo $is_en ? 'Pay tuition package via card, and IDEAS activates the official LMS account to start learning immediately.' : 'Thực hiện thanh toán gói học qua thẻ, IDEAS kích hoạt tài khoản LMS chính thức bắt đầu học ngay.'; ?></p>
                    </div>
                </div>
            </div>
        </section>
    </main>



    <!-- Parallax Hero Background Scroll Handler -->
    <script>
        const heroBg = document.getElementById('scb-parallax-bg');
        if (heroBg) {
            let ticking = false;
            window.addEventListener('scroll', function () {
                if (!ticking) {
                    requestAnimationFrame(function () {
                        const scrollY = window.scrollY;
                        const heroH = document.getElementById('scb-hero-top').offsetHeight;
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