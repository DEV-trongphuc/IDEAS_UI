<?php
/**
 * The template for displaying the Faculty / Expert Council page
 * Template Name: Premium Faculty Template
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
    <link rel="preload" fetchpriority="high" as="image" href="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp" />
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php echo $is_en ? 'Academic Board' : 'Hội đồng Chuyên môn'; ?> | Đội ngũ Giảng viên IDEAS</title>
    <?php endif; ?>

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta name="description"
            content="Đội ngũ <?php echo $is_en ? 'Academic Board' : 'Hội đồng Chuyên môn'; ?> IDEAS – tập hợp những chuyên gia hàng đầu với nhiều năm kinh nghiệm thực tiễn trong các lĩnh vực quản trị kinh doanh, tài chính, công nghệ và giáo dục quốc tế." />
    <?php endif; ?><?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $is_en ? 'Academic Board' : 'Hội đồng Chuyên môn'; ?> – Đội ngũ Giảng viên IDEAS" />
        <meta property="og:description"
            content="<?php echo $is_en ? 'Meet the leading experts, professors, and lecturers of IDEAS – those who guide the international standard MBA, DBA, and MSc AI programs.' : 'Gặp gỡ các chuyên gia, giáo sư và giảng viên hàng đầu của IDEAS – những người dẫn dắt chương trình MBA, DBA và MSc AI đẳng cấp quốc tế.'; ?>" />
        <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp" />
        <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />
    <?php endif; ?><style>
        /* ══════════════════════════════════════
           FACULTY PAGE – PREMIUM LIGHT THEME
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
                radial-gradient(circle at 10% 20%, rgba(220, 38, 38, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 90% 70%, rgba(220, 38, 38, 0.04) 0%, transparent 45%),
                radial-gradient(rgba(15, 23, 42, 0.04) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 26px 26px;
            background-attachment: scroll, scroll, fixed;
        }

        /* ── Hero ──────────────────────────── */
        .faculty-hero {
            position: relative;
            padding: 160px 20px 90px;
            text-align: center;
            color: #ffffff;
            overflow: hidden;
            background: #0f172a;
            border-bottom: 3px solid #dc2626;
        }

        .faculty-hero-bg {
            position: absolute;
            inset: -150px -10% auto;
            width: 120%;
            height: calc(100% + 300px);
            background-size: cover;
            background-position: center top;
            will-change: transform;
            transform: translate3d(0, 0, 0) scale(1.15);
            z-index: 1;
            opacity: 0.75;
        }

        .faculty-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(160deg, rgba(120, 8, 0, 0.88) 0%, rgba(6, 9, 22, 0.96) 70%);
            z-index: 2;
        }

        .faculty-hero-content {
            position: relative;
            z-index: 3;
            max-width: 800px;
            margin: 0 auto;
        }

        .faculty-hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(12px);
            padding: 8px 20px;
            border-radius: 100px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: #fca5a5;
            margin-bottom: 24px;
        }

        .faculty-hero h1 {
            font-size: clamp(2.2rem, 5.5vw, 3.6rem);
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -0.025em;
            margin-bottom: 20px;
        }

        .faculty-hero h1 em {
            font-style: normal;
            background: linear-gradient(135deg, #ff6b6b, #ef4444);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .faculty-hero p {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.65);
            max-width: 620px;
            margin: 0 auto;
            line-height: 1.7;
        }

        /* Stats row */
        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 48px;
            margin-top: 48px;
            flex-wrap: wrap;
        }

        .hero-stat {
            text-align: center;
        }

        .hero-stat-number {
            font-size: 2.2rem;
            font-weight: 800;
            color: #ffffff;
            line-height: 1;
        }

        .hero-stat-number span {
            color: #f87171;
        }

        .hero-stat-label {
            font-size: 0.82rem;
            color: rgba(255, 255, 255, 0.45);
            margin-top: 4px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        /* ── Section ─────────────────────── */
        .faculty-section {
            max-width: 1380px;
            margin: 0 auto;
            padding: 72px 24px 100px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 48px;
        }

        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(171, 14, 0, 0.08);
            border: 1px solid rgba(171, 14, 0, 0.22);
            color: #ab0e00;
            padding: 6px 16px;
            border-radius: 100px;
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 16px;
        }

        .section-title {
            font-size: clamp(1.8rem, 3.5vw, 2.6rem);
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.02em;
            line-height: 1.2;
            margin-bottom: 12px;
        }

        .section-title em {
            font-style: normal;
            color: #ab0e00;
        }

        .section-subtitle {
            color: #4b5563;
            font-size: 1rem;
            max-width: 540px;
            margin: 0 auto;
            line-height: 1.65;
        }

        /* ── Tabs ────────────────────────── */
        .tab-nav {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 52px;
            flex-wrap: wrap;
        }

        .tab-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            border-radius: 100px;
            border: 2px solid #e2e8f0;
            background: #ffffff;
            color: #4b5563;
            font-size: 0.92rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
            font-family: inherit;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06);
        }

        .tab-btn:hover {
            border-color: #ab0e00;
            color: #ab0e00;
            box-shadow: 0 4px 14px rgba(171, 14, 0, 0.15);
        }

        .tab-btn.active {
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            border-color: #ab0e00;
            color: #ffffff;
            box-shadow: 0 6px 20px rgba(171, 14, 0, 0.35);
        }

        .tab-btn .tab-count {
            background: rgba(255, 255, 255, 0.25);
            color: inherit;
            font-size: 0.74rem;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 100px;
            min-width: 22px;
            text-align: center;
        }

        .tab-btn:not(.active) .tab-count {
            background: #f1f5f9;
            color: #374151;
        }

        /* ── Faculty Grid – flex → last row centred ── */
        .faculty-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 22px;
            justify-content: center;
        }

        /* ── Card ────────────────────────── */
        .faculty-card {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 24px;
            flex: 1 1 380px;
            max-width: 430px;
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
            transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
            cursor: pointer;
            position: relative;
        }

        .faculty-card:hover {
            transform: translateY(-5px);
            border-color: rgba(171, 14, 0, 0.25);
            box-shadow: 0 16px 36px rgba(171, 14, 0, 0.08);
        }



        /* Card image wrap */
        .faculty-card-img-wrap {
            flex-shrink: 0;
            width: 95px;
            height: 95px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .faculty-card img {
            width: 95px;
            height: 95px;
            border-radius: 50%;
            object-fit: cover;
            object-position: center top;
            border: 3px solid #f1f5f9;
            background-color: #ffffff; /* Preserves transparent PNG backgrounds */
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.05);
            transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1), border-color 0.4s ease, box-shadow 0.4s ease;
        }

        .faculty-card:hover img {
            transform: scale(1.05);
            border-color: #ab0e00;
            box-shadow: 0 6px 16px rgba(171, 14, 0, 0.16);
        }

        /* Placeholder */
        .faculty-avatar-placeholder {
            width: 95px;
            height: 95px;
            border-radius: 50%;
            border: 3px solid #f1f5f9;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.05);
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            font-size: 2.2rem;
            color: #94a3b8;
        }

        /* Tag badge in body */
        .faculty-card-tag {
            display: inline-block;
            background: rgba(171, 14, 0, 0.06);
            color: #ab0e00;
            border: 1px solid rgba(171, 14, 0, 0.12);
            font-size: 0.68rem;
            font-weight: 750;
            padding: 3px 10px;
            border-radius: 100px;
            margin-bottom: 6px;
            width: fit-content;
        }

        .faculty-card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
        }

        .faculty-card-name {
            font-size: 1.15rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 4px;
            line-height: 1.3;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        .faculty-card-linkedin {
            color: #0a66c2;
            font-size: 1.05rem;
            margin-left: 8px;
            display: inline-flex;
            align-items: center;
            vertical-align: middle;
            transition: color 0.2s ease, transform 0.2s ease;
        }
        .faculty-card-linkedin:hover {
            color: #004182;
            transform: scale(1.15);
        }

        .faculty-modal-linkedin {
            color: #ffffff;
            background: #0a66c2;
            width: 22px;
            height: 22px;
            border-radius: 4px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            margin-left: 8px;
            vertical-align: middle;
            transition: background 0.2s ease, transform 0.2s ease;
        }
        .faculty-modal-linkedin:hover {
            background: #004182;
            transform: scale(1.15);
            color: #ffffff;
        }

        .faculty-card-website {
            margin-left: 8px;
            display: inline-flex;
            align-items: center;
            vertical-align: middle;
            transition: transform 0.2s ease;
        }
        .faculty-card-website:hover {
            transform: scale(1.15);
        }
        .faculty-card-website-icon {
            width: 18px !important;
            height: 18px !important;
            border-radius: 50% !important;
            border: 1px solid #e2e8f0 !important;
            box-shadow: none !important;
            padding: 0 !important;
            margin: 0 !important;
            object-fit: cover !important;
        }

        .faculty-modal-website {
            margin-left: 8px;
            display: inline-flex;
            align-items: center;
            vertical-align: middle;
            transition: transform 0.2s ease;
        }
        .faculty-modal-website:hover {
            transform: scale(1.15);
        }
        .faculty-modal-website-icon {
            width: 22px !important;
            height: 22px !important;
            border-radius: 50% !important;
            border: 1px solid rgba(255, 255, 255, 0.4) !important;
            box-shadow: none !important;
            padding: 0 !important;
            margin: 0 !important;
            object-fit: cover !important;
            background: #ffffff;
        }

        .faculty-card-job {
            font-size: 0.82rem;
            color: #64748b;
            line-height: 1.45;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-align: left;
            margin: 0;
            max-width: 100%;
        }

        /* Fade-in animation */
        .faculty-card {
            opacity: 0;
            transform: translateY(24px);
            animation: cardIn 0.4s ease forwards;
        }

        @keyframes cardIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ── Modal ───────────────────────── */
        .faculty-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(4, 6, 14, 0.80);
            backdrop-filter: blur(10px);
            z-index: 9000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .faculty-modal-overlay.open {
            opacity: 1;
            pointer-events: all;
        }

        .faculty-modal {
            background: #ffffff;
            border: 1px solid #e8ecf0;
            border-radius: 24px;
            max-width: 600px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 32px 80px rgba(0, 0, 0, 0.2);
            transform: scale(0.95) translateY(20px);
            transition: transform 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            scrollbar-width: thin;
            scrollbar-color: rgba(220, 38, 38, 0.25) transparent;
        }

        .faculty-modal-overlay.open .faculty-modal {
            transform: scale(1) translateY(0);
        }

        .faculty-modal-header {
            position: relative;
            padding: 0;
            border-radius: 24px 24px 0 0;
            overflow: hidden;
        }

        .faculty-modal-cover {
            height: 220px;
            background: linear-gradient(135deg, #7f1d1d 0%, #b91c1c 50%, #450a0a 100%);
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .faculty-modal-cover-pattern {
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 55%),
                radial-gradient(circle at 80% 30%, rgba(255, 255, 255, 0.07) 0%, transparent 50%);
            pointer-events: none;
        }

        /* Avatar + name block centred inside red cover */
        .faculty-modal-avatar {
            position: relative;
            z-index: 5;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.35);
            object-fit: cover;
            object-position: center top;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.35);
            background: #f1f5f9;
            display: block;
        }

        .faculty-modal-avatar-placeholder {
            position: relative;
            z-index: 5;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.3);
            background: rgba(0, 0, 0, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.4rem;
            color: rgba(255, 255, 255, 0.6);
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.3);
        }

        /* Name shown inside cover below avatar */
        .faculty-modal-cover-name {
            position: relative;
            z-index: 5;
            font-size: 1.2rem;
            font-weight: 800;
            color: #ffffff;
            text-align: center;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
            letter-spacing: -0.015em;
            padding: 0 20px;
        }

        .faculty-modal-close {
            position: absolute;
            top: 14px;
            right: 14px;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #ffffff;
            font-size: 0.95rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s ease;
            z-index: 10;
        }

        .faculty-modal-close:hover {
            background: rgba(0, 0, 0, 0.55);
        }

        .faculty-modal-body {
            padding: 24px 32px 32px;
        }

        .faculty-modal-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(171, 14, 0, 0.08);
            border: 1px solid rgba(171, 14, 0, 0.22);
            color: #ab0e00;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 100px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 12px;
        }

        /* Name no longer shown in body (shown in cover) */
        .faculty-modal-name {
            display: none;
        }

        .faculty-modal-job {
            color: #374151;
            font-size: 0.92rem;
            line-height: 1.65;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f0f0f0;
            font-weight: 500;
        }

        .faculty-modal-des-title {
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #9ca3af;
            margin-bottom: 14px;
        }

        .faculty-modal-des {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .faculty-modal-des li {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            font-size: 0.91rem;
            color: #1f2937;
            line-height: 1.65;
        }

        .faculty-modal-des li i {
            color: #ab0e00;
            margin-top: 4px;
            flex-shrink: 0;
            font-size: 0.75rem;
        }

        /* Empty state (no des) */
        .faculty-modal-no-des {
            text-align: center;
            padding: 20px 0;
            color: #94a3b8;
            font-size: 0.9rem;
        }

        /* ── Empty tab state ───────────── */
        .faculty-empty {
            text-align: center;
            padding: 80px 20px;
            color: #94a3b8;
        }

        /* ── Contrast Overrides for Dark Backgrounds ── */
        body .faculty-hero h1 {
            color: #ffffff !important;
        }

        body .faculty-hero p {
            color: rgba(255, 255, 255, 0.85) !important;
        }

        body .faculty-hero-badge {
            color: #fca5a5 !important;
            background: rgba(255, 255, 255, 0.08) !important;
            border: 1px solid rgba(255, 255, 255, 0.18) !important;
        }

        /* ── Responsive ─────────────────── */
        /* ── Mobile horizontal carousel slider ── */
        .slider-dots {
            display: none;
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

        @media (max-width: 768px) {
            .faculty-hero {
                padding: 120px 20px 50px !important;
            }

            .hero-stats {
                flex-wrap: nowrap !important;
                gap: 12px !important;
                margin-top: 36px !important;
                width: 100% !important;
            }

            .hero-stat {
                flex: 1 1 33.33% !important;
            }

            .hero-stat-number {
                font-size: 1.6rem !important;
            }

            .hero-stat-label {
                font-size: 0.68rem !important;
                line-height: 1.3 !important;
            }

            .faculty-section {
                padding: 50px 20px 60px !important;
            }

            .faculty-grid {
                display: flex;
                flex-wrap: nowrap;
                overflow-x: auto;
                justify-content: flex-start;
                scroll-snap-type: x mandatory;
                scroll-behavior: smooth;
                padding-bottom: 15px;
                gap: 16px;
                scrollbar-width: none !important;
                /* Firefox */
                margin-left: -20px !important;
                margin-right: -20px !important;
                padding-left: 20px !important;
                padding-right: 20px !important;
            }

            .faculty-grid::-webkit-scrollbar {
                display: none !important;
                /* Chrome/Safari */
            }

            .faculty-card {
                flex: 0 0 280px;
                max-width: 280px;
                scroll-snap-align: center;
                gap: 12px;
                padding: 16px;
            }

            .faculty-card-img-wrap,
            .faculty-card img,
            .faculty-avatar-placeholder {
                width: 70px;
                height: 70px;
            }
            
            .faculty-avatar-placeholder {
                font-size: 1.6rem;
            }

            .faculty-card-name {
                font-size: 0.95rem;
            }

            .faculty-card-job {
                font-size: 0.76rem;
                margin: 0;
            }

            .faculty-card-tag {
                font-size: 0.58rem;
                padding: 2px 8px;
                margin-bottom: 4px;
            }

            .slider-dots {
                display: flex;
            }

            .faculty-modal-body {
                padding: 60px 22px 24px;
            }

            .tab-nav {
                gap: 6px;
            }

            .tab-btn {
                padding: 10px 18px;
                font-size: 0.85rem;
            }
        }

        /* Back to top integration */
        .back-to-top-btn.show {
            opacity: 1;
            pointer-events: all;
        }

        .verify-slogan {
            font-size: 1.15rem;
            font-weight: 700;
            font-style: italic;
            color: #ffcccc;
            margin-top: 10px;
            margin-bottom: 18px;
            letter-spacing: 0.08em;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
            display: inline-block;
        }

        @media (max-width: 768px) {
            .verify-slogan {
                font-size: 0.95rem !important;
                margin-top: 6px;
                margin-bottom: 12px;
                letter-spacing: 0.05em;
            }
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- ══ HEADER ══ -->
    <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>


    <!-- ══ HERO ══ -->
    <section class="faculty-hero" id="faculty-hero-top">
        <div class="faculty-hero-bg" id="faculty-parallax-bg"
            style="background-image: url('https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp');"></div>
        <div class="faculty-hero-overlay"></div>
        <div class="faculty-hero-content">
            <div class="faculty-hero-badge">
                <svg class="svg-icon fa-user-graduate fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439.9 42.7 448 52.6 448 64s-8.1 21.3-19.3 23.5L352 102.9l0 57.1c0 70.7-57.3 128-128 128s-128-57.3-128-128l0-57.1L48 93.3l0 65.1 15.7 78.4c.9 4.7-.3 9.6-3.3 13.3s-7.6 5.9-12.4 5.9l-32 0c-4.8 0-9.3-2.1-12.4-5.9s-4.3-8.6-3.3-13.3L16 158.4l0-71.8C6.5 83.3 0 74.3 0 64C0 52.6 8.1 42.7 19.3 40.5l200-40zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7L30.7 512C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6z"/></svg>
                <?php echo $is_en ? 'Academic Board' : 'Hội đồng Chuyên môn'; ?>
            </div>
            <h1><?php echo $is_en ? 'Leading <em>Experts &amp; Specialists</em><br>at IDEAS' : 'Đội Ngũ <em>Chuyên Gia</em><br>Hàng Đầu Của IDEAS'; ?></h1>
            <div class="verify-slogan">
                <?php echo $is_en ? '"Original Knowledge - Localized Mentorship"' : '"Tri thức Nguyên bản - Đồng hành Bản địa"'; ?>
            </div>
            <p><?php echo $is_en ? 'Gathering top professors, doctors, and specialists with extensive hands-on experience in business administration, finance, technology, and global education.' : 'Tập hợp những giáo sư, tiến sĩ và chuyên gia hàng đầu với nhiều năm kinh nghiệm thực tiễn trong quản trị kinh doanh, tài chính, công nghệ và giáo dục quốc tế.'; ?></p>
            <div class="hero-stats">
                <div class="hero-stat">
                    <div class="hero-stat-number">15<span>+</span></div>
                    <div class="hero-stat-label"><?php echo $is_en ? 'Core Faculty' : 'Giảng viên cơ hữu'; ?></div>
                </div>
                <div class="hero-stat">
                    <div class="hero-stat-number">10<span>+</span></div>
                    <div class="hero-stat-label"><?php echo $is_en ? 'International Advisors' : 'Cố vấn quốc tế'; ?></div>
                </div>
                <div class="hero-stat">
                    <div class="hero-stat-number">25<span>+</span></div>
                    <div class="hero-stat-label"><?php echo $is_en ? 'Avg. Yrs Experience' : 'Năm kinh nghiệm tb.'; ?></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ MAIN CONTENT ══ -->
    <main class="faculty-section" id="faculty-main">

        <div class="section-header">
            <div class="section-badge">
                <svg class="svg-icon fa-graduation-cap fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
                <?php echo $is_en ? 'Academic Board' : 'Hội đồng Chuyên môn'; ?>
            </div>
            <h2 class="section-title"><?php echo $is_en ? 'Meet Our <em>Faculty Board &amp; Team</em>' : 'Gặp gỡ <em>Đội Ngũ Giảng Viên</em> của Chúng Tôi'; ?></h2>
            <p class="section-subtitle"><?php echo $is_en ? 'Distinguished experts guiding world-class MBA, MSc AI, and DBA programs at IDEAS.' : 'Những chuyên gia dẫn dắt chương trình MBA, MSc AI và DBA đẳng cấp quốc tế tại IDEAS.'; ?></p>
        </div>

        <!-- Tab Navigation -->
        <div class="tab-nav" id="faculty-tabs" role="tablist">
            <button class="tab-btn active" id="tab-gv" data-tab="gv" role="tab" aria-selected="true">
                <svg class="svg-icon fa-chalkboard-user fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M160 64c0-35.3 28.7-64 64-64L576 0c35.3 0 64 28.7 64 64l0 288c0 35.3-28.7 64-64 64l-239.2 0c-11.8-25.5-29.9-47.5-52.4-64l99.6 0 0-32c0-17.7 14.3-32 32-32l64 0c17.7 0 32 14.3 32 32l0 32 64 0 0-288L224 64l0 49.1C205.2 102.2 183.3 96 160 96l0-32zm0 64a96 96 0 1 1 0 192 96 96 0 1 1 0-192zM133.3 352l53.3 0C260.3 352 320 411.7 320 485.3c0 14.7-11.9 26.7-26.7 26.7L26.7 512C11.9 512 0 500.1 0 485.3C0 411.7 59.7 352 133.3 352z"/></svg> <?php echo $is_en ? 'Lecturers' : 'Giảng viên'; ?>
                <span class="tab-count" id="count-gv">15</span>
            </button>
            <button class="tab-btn" id="tab-cv" data-tab="cv" role="tab" aria-selected="false">
                <svg class="svg-icon fa-globe fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M352 256c0 22.2-1.2 43.6-3.3 64l-185.3 0c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64l185.3 0c2.2 20.4 3.3 41.8 3.3 64zm28.8-64l123.1 0c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64l-123.1 0c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32l-116.7 0c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0l-176.6 0c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0L18.6 160C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192l123.1 0c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64L8.1 320C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6l176.6 0c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352l116.7 0zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6l116.7 0z"/></svg> <?php echo $is_en ? 'International Advisors' : 'Cố vấn Quốc tế'; ?>
                <span class="tab-count" id="count-cv">15</span>
            </button>
            <button class="tab-btn" id="tab-umef" data-tab="umef" role="tab" aria-selected="false">
                <svg class="svg-icon fa-building-columns fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160l0 8c0 13.3 10.7 24 24 24l400 0c13.3 0 24-10.7 24-24l0-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8-3.4-17.2-3.4-25.2 0zM128 224l-64 0 0 196.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512l448 0c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1L448 224l-64 0 0 192-40 0 0-192-64 0 0 192-48 0 0-192-64 0 0 192-40 0 0-192zM256 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg> <?php echo $is_en ? 'Swiss UMEF' : 'Swiss UMEF'; ?>
                <span class="tab-count" id="count-umef">51</span>
            </button>
        </div>

        <!-- Faculty Grid Container -->
        <div class="faculty-grid" id="faculty-grid" role="list"></div>

    </main>

    <!-- ══ MODAL ══ -->
    <div class="faculty-modal-overlay" id="faculty-modal-overlay" role="dialog" aria-modal="true"
        aria-labelledby="modal-name">
        <div class="faculty-modal" id="faculty-modal">
            <div class="faculty-modal-header">
                <div class="faculty-modal-cover">
                    <div class="faculty-modal-cover-pattern"></div>
                </div>
                <button class="faculty-modal-close" id="modal-close" aria-label="<?php echo $is_en ? 'Close' : 'Đóng'; ?>">
                    <svg class="svg-icon fa-xmark fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                </button>
            </div>
            <div class="faculty-modal-body">
                <div class="faculty-modal-tag" id="modal-tag"></div>
                <div class="faculty-modal-name" id="modal-name"></div>
                <div class="faculty-modal-job" id="modal-job"></div>
                <div class="faculty-modal-des-title" id="modal-des-title"><?php echo $is_en ? 'Experience &amp; Positions' : 'Kinh nghiệm & Chức vụ'; ?></div>
                <ul class="faculty-modal-des" id="modal-des"></ul>
            </div>
        </div>
    </div>

    <!-- ══ SCRIPTS ══ -->
    <script>
        // ── Faculty data ───────────────────────────────────────────────
        if (typeof isEnMode === 'undefined') { var isEnMode = <?php echo $is_en ? 'true' : 'false'; ?>; }
        const FACULTY_DATA = {
            gv: isEnMode ? [
                {
                    name: "Phạm Quang Vinh",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/vientruong_avt-optimized.webp",
                    tag: "PhD in Business Administration (USA)",
                    job: "Director of IDEAS",
                    des: [
                        "Over 25 years of experience in Marketing and Insurance",
                        "Founder - Director of IDEAS",
                        "CEO of TSSAC Study Abroad Consulting JSC",
                        "Governing Board Member of the HCMC Center for Research, Consulting, Support and Tech Innovation (R.i.C.H)",
                        "Vice President of the Vietnam Association for Human Resources and Talent Development HCMC",
                        "Head of External Affairs and International Cooperation, HCMC Vocational Education Association",
                    ]
                },
                {
                    name: "Dương Văn Thịnh",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/Thay-thinh-optimized.webp",
                    tag: "PhD in Business Administration (France)",
                    job: "VERON Group - Vice President, AI Technology",
                    des: [
                        "PhD in Business Administration - AI Research & Data Center (Ascencia, College de Paris - France)",
                        "Master in Electronic Management (Innotech France)",
                        "Post-Graduate in Economics (University of Economics HCMC)",
                        "Bachelor of French Studies",
                    ]
                },
                {
                    name: "Sơn Điền Trung",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/NHP_1769-removebg-preview-optimized.webp",
                    tag: "PhD in Business Administration (France)",
                    job: "Chairman of Sonha Pharma, Q Pharma. Co-founder & Member of IDEAS.",
                    des: [
                        "20 years of experience in the pharmaceutical business",
                        "5 years of experience in educational services",
                    ]
                },
                {
                    name: "Trần Tâm Anh",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/a-tam-anh-1-optimized.webp",
                    tag: "PhD in Business Administration (USA)",
                    job: "Responsible for international development strategy, marketing, and academic activities at IDEAS.",
                    des: [
                        "Many years of experience as senior manager for international programs – AEC Region",
                    ]
                },
                {
                    name: "Trần Hoàng Hiệp",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2022/05/tran-hoang-hiep.webp",
                    tag: "MBA from McFord University",
                    job: "Deputy General Director – Business Smart JSC",
                    des: [
                        "Over 31 years of business experience",
                        "Consultant and implementation expert for international capacity building projects in Singapore, Malaysia, and Myanmar",
                        "Participated in the $49M Banking Modernization Project funded by the World Bank (WB)",
                        "Certified trainer for John Kotter's [Leading Bold Change] program (Harvard University, USA)",
                    ]
                },
                {
                    name: "Nguyễn Thị Minh Đoan",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/Doan-optimized.webp",
                    tag: "PhD in Business Administration",
                    job: "Lecturer at IDEAS",
                    des: [
                        "18 years of experience as Sales Training Director at AIA, Prudential, and Aviva VN",
                        "2 years of experience as HR Manager at Nam A Bank and Hoa Sen University",
                    ]
                },
                {
                    name: "Mang Viên Hoàng Nhật",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/cNhat-optimized.webp",
                    tag: "PhD in Business Administration",
                    job: "Lecturer at IDEAS",
                    des: [
                        "25 years of experience in Pharmaceuticals, Vaccines, and Medical Devices business",
                        "11 years of senior management experience at GlaxoSmithKline (GSK), Roche, Menarini, and Takeda",
                        "3 years of experience in education, guest lecturer, and university speaker",
                    ]
                },
                {
                    name: "Dương Trần Minh Đoàn",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2022/05/duong-tran-minh-doan.webp",
                    tag: "MBA from University of Houston-Clear Lake",
                    job: "Principal of Saigon Information Technology College (SITC)",
                    des: [
                        "Over 27 years working in domestic and foreign enterprises",
                        "Over 12 years of hands-on experience in finance and accounting",
                        "Many years of teaching experience at VNU-HCMC, Hoa Sen University, and Broward College",
                    ]
                },
                {
                    name: "Trần Thị Mai Anh",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2022/05/tran-thi-mai-anh.webp",
                    tag: "Master of Human Resource Management (USA)",
                    job: "Managing Director – Anpha Solutions and Training",
                    des: [
                        "Over 19 years as Strategic HR Director at Teko/VNLife, AAA, Circle K Vietnam, and Central Group",
                        "Over 20 years as HR Management Lecturer and Consultant",
                    ]
                },
                {
                    name: "Lê Sơn Phong",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2025/04/lesonphong-1.webp",
                    tag: "MBA",
                    job: "Associate Counsel Le Nguyen Law Firm — HCMC",
                    des: [
                        "MBA Lecturer - UBIS and Apollos University (USA)",
                        "Vice President - Institute for Development and Applied Science Exchange (IDEAS)",
                        "Head of Risk Management, Process, Compliance & AML - Novaland Group",
                        "Senior Judge - People's Court of Ho Chi Minh City",
                    ]
                },
                {
                    name: "Đặng Quốc Phong",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "Master of Computer Science (VNU-HCMC)",
                    job: "Director of Software Engineering Program – Gia Dinh University",
                    des: [
                        "Technology and education expert, specializing in ML/AI and research methodology",
                        "Supervised many BA/MBA & DBA students in conducting research projects",
                        "Project Manager DEG at Nova Education Group (2021–2024)",
                    ]
                },
                {
                    name: "Nguyễn Anh Toàn",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "MBA",
                    job: "Investment Advisor - Maybank Investment Bank VN",
                    des: [
                        "Financial Advisor - VinaCapital Fund Management JSC",
                        "Relationship Manager - Citibank Vietnam",
                        "Management Consultant - JAVI Coffee Franchise Chain",
                    ]
                },
                {
                    name: "Nguyễn Hoài Trung",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "MBA & Master of Petroleum Engineering",
                    job: "Business Development Advisor - Wecare 247",
                    des: [
                        "Over 16 years of experience in Business Management, Operations, and Petroleum Engineering",
                        "Adjunct Faculty - FPT University & International Management Institute",
                        "Senior Engineer with over 10 years of experience at Schlumberger, Petronas, and Petrovietnam",
                    ]
                },
                {
                    name: "Nguyễn Thanh Tuấn",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "PhD in Business Administration",
                    job: "Lecturer",
                    des: [
                        "Over 20 years of teaching experience at domestic and international universities",
                        "Topics: Business Research Methods, International Management, Organizational Behavior, Marketing Strategy, HRM",
                    ]
                },
                {
                    name: "Nguyễn Thành Nhân",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2022/05/nguyen-thanh-nhan.webp",
                    tag: "Master of Business Analytics & Digital Transformation",
                    job: "Associate IT Director - MSD (Pharmaceuticals & Healthcare)",
                    des: [
                        "Associate IT Director - MSD (Pharmaceuticals & Healthcare)",
                        "IT Manager - Schneider Electric (Energy Management & Industrial Automation)",
                        "Industry 4.0 Project Portfolio Manager - Bosch (Automotive Manufacturing)",
                        "IT Systems Engineer at Intel (Semiconductor Manufacturing)",
                    ]
                }
            ] : [
{
                    name: "Phạm Quang Vinh",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/vientruong_avt-optimized.webp",
                    tag: "Tiến sĩ QTKD Hoa Kỳ",
                    job: "Viện trưởng IDEAS",
                    des: [
                        "Có hơn 25 năm kinh nghiệm trong lĩnh vực Marketing và Bảo Hiểm",
                        "Nhà sáng lập - Viện trưởng IDEAS",
                        "Giám đốc điều hành công ty cổ phần tư vấn du học TSSAC",
                        "Thành viên ban Quản trị Trung tâm Nghiên cứu, Tư vấn, Hỗ trợ, Sáng tạo Khoa học Kỹ thuật TP.HCM (R.i.C.H)",
                        "Phó chủ tịch Hội Khoa Học Phát triển nguồn nhân lực, nhân tài Việt Nam TP.HCM",
                        "Trưởng ban đối ngoại và hợp tác quốc tế Hội giáo dục nghề nghiệp TPHCM",
                    ]
                },
                {
                    name: "Dương Văn Thịnh",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/Thay-thinh-optimized.webp",
                    tag: "Tiến sĩ QTKD Pháp",
                    job: "VERON Group - Vice President, AI Technology",
                    des: [
                        "Tiến sĩ, QTKD – chuyên ngành Nghiên cứu AI & Trung tâm dữ liệu (Ascencia, College de Paris – Pháp)",
                        "Thạc sĩ Quản lý điện tử (Innotech Pháp)",
                        "Sau đại học chuyên ngành Kinh tế (Đại học Kinh tế TP.HCM)",
                        "Cử nhân Pháp học",
                    ]
                },
                {
                    name: "Sơn Điền Trung",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/NHP_1769-removebg-preview-optimized.webp",
                    tag: "Tiến sĩ QTKD Pháp",
                    job: "Chủ tịch cty Sonha pharma, Q pharma. Đồng sáng lập và thành viên IDEAS.",
                    des: [
                        "20 năm kinh nghiệm trong lĩnh vực kinh doanh dược phẩm",
                        "5 năm trong lĩnh vực cung cấp dịch vụ giáo dục",
                    ]
                },
                {
                    name: "Trần Tâm Anh",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/a-tam-anh-1-optimized.webp",
                    tag: "Tiến sĩ QTKD Hoa Kỳ",
                    job: "Chịu trách nhiệm về chiến lược phát triển quốc tế, marketing và các hoạt động học thuật tại IDEAS.",
                    des: [
                        "Nhiều năm kinh nghiệm làm quản lý cấp cao các chương trình quốc tế – Khu vực AEC",
                    ]
                },
                {
                    name: "Trần Hoàng Hiệp",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2022/05/tran-hoang-hiep.webp",
                    tag: "Thạc sĩ QTKD MCFORD University",
                    job: "Phó Tổng giám đốc – Business Smart JSC",
                    des: [
                        "Hơn 31 năm kinh nghiệm kinh doanh",
                        "Chuyên gia tư vấn và triển khai các dự án quốc tế về phát triển năng lực tại Singapore, Malaysia, Myanmar",
                        "Tham gia Dự án Hiện đại hóa Ngân hàng trị giá 49 triệu USD do Ngân hàng Thế giới (WB) tài trợ",
                        "Giảng viên được chứng nhận cho chương trình [Lãnh đạo Thay đổi Táo bạo] của John Kotter (Đại học Harvard, Hoa Kỳ)",
                    ]
                },
                {
                    name: "Nguyễn Thị Minh Đoan",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/Doan-optimized.webp",
                    tag: "Tiến sĩ QTKD",
                    job: "Giảng viên IDEAS",
                    des: [
                        "18 năm kinh nghiệm đảm nhiệm vị trí Giám đốc Đào tạo Bán hàng tại AIA, Prudential, Aviva VN",
                        "2 năm kinh nghiệm đảm nhiệm vị trí Trưởng phòng Nhân sự tại Ngân hàng Nam Á và Đại học Hoa Sen",
                    ]
                },
                {
                    name: "Mang Viên Hoàng Nhật",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/cNhat-optimized.webp",
                    tag: "Tiến sĩ QTKD",
                    job: "Giảng viên IDEAS",
                    des: [
                        "25 năm kinh nghiệm trong lĩnh vực kinh doanh Dược Phẩm, Vaccine, Thiết Bị Y Tế",
                        "11 năm kinh nghiệm quản lý cấp cao tại GlaxoSmithKline (GSK), Roche, Menarini, Takeda",
                        "3 năm kinh nghiệm trong lĩnh vực giáo dục, giảng viên thỉnh giảng, diễn giả của Trường Đại Học",
                    ]
                },
                {
                    name: "Dương Trần Minh Đoàn",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2022/05/duong-tran-minh-doan.webp",
                    tag: "Thạc sĩ QTKD Đại học Houston Clear Lake",
                    job: "Hiệu trưởng trường Trung cấp Công nghệ Thông tin Sài Gòn (SITC)",
                    des: [
                        "Hơn 27 năm làm việc tại các doanh nghiệp trong và ngoài nước",
                        "Hơn 12 năm kinh nghiệm thực chiến trong lĩnh vực tài chính – kế toán",
                        "Nhiều năm kinh nghiệm giảng dạy ở Đại học Quốc gia TPHCM, Đại học Hoa Sen, Đại học Broward",
                    ]
                },
                {
                    name: "Trần Thị Mai Anh",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2022/05/tran-thi-mai-anh.webp",
                    tag: "Thạc sĩ QTNNL, USA",
                    job: "Giám đốc Điều hành – Anpha Solutions and Training",
                    des: [
                        "Hơn 19 năm làm Giám đốc Nhân sự chiến lược tại Teko/VNLife, AAA, Circle K Việt Nam, Central Group",
                        "Hơn 20 năm là Giảng viên bộ môn Quản trị Nguồn Nhân lực và Chuyên gia Tư vấn",
                    ]
                },
                {
                    name: "Lê Sơn Phong",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2025/04/lesonphong-1.webp",
                    tag: "Thạc sĩ QTKD",
                    job: "Associate Counsel Le Nguyen Law Firm — HCMC",
                    des: [
                        "Giảng viên MBA - Đại học UBIS và Apollos (Hoa Kỳ)",
                        "Phó Chủ tịch - Viện Phát triển và Trao đổi Khoa học Ứng dụng (IDEAS)",
                        "Trưởng phòng Quản lý Rủi ro - Quy trình - Tuân thủ và AML - Tập đoàn Novaland",
                        "Thẩm phán Cao cấp - Tòa án Nhân dân TP. Hồ Chí Minh",
                    ]
                },
                {
                    name: "Đặng Quốc Phong",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "Thạc sĩ Khoa học máy tính – VNUHCM",
                    job: "Giám đốc chương trình Kỹ thuật phần mềm – ĐH Gia Định",
                    des: [
                        "Chuyên gia công nghệ và giáo dục, nghiên cứu ML/AI và phương pháp nghiên cứu",
                        "Hỗ trợ nhiều sinh viên BA/MBA & DBA thực hiện các dự án nghiên cứu",
                        "Trưởng Dự án DEG của Nova Education Group (2021–2024)",
                    ]
                },
                {
                    name: "Nguyễn Anh Toàn",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "Thạc sĩ QTKD",
                    job: "Chuyên gia tư vấn đầu tư - Maybank Investment Bank VN",
                    des: [
                        "Cố vấn Tài chính - VinaCapital Fund Management JSC",
                        "Nhân viên Ngân hàng Đa năng - Citibank Việt Nam",
                        "Tư vấn cho Ban Quản lý - Chuỗi nhượng quyền cà phê JAVI",
                    ]
                },
                {
                    name: "Nguyễn Hoài Trung",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "Thạc sĩ QTKD – Thạc sĩ Kỹ thuật Dầu khí",
                    job: "Cố vấn Phát triển Kinh doanh - Wecare 247",
                    des: [
                        "Hơn 16 năm kinh nghiệm trong Quản trị Kinh doanh, Vận hành, và Kỹ thuật Dầu khí",
                        "Giảng viên Hợp đồng - Đại học FPT & Viện Quản lý Kinh doanh Quốc tế",
                        "Kỹ sư chuyên môn cao với hơn 10 năm kinh nghiệm tại Schlumberger, Petronas, Petrovietnam",
                    ]
                },
                {
                    name: "Nguyễn Thanh Tuấn",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "Tiến sĩ QTKD",
                    job: "Giảng viên",
                    des: [
                        "Hơn 20 năm kinh nghiệm giảng dạy tại các trường đại học trong nước và quốc tế",
                        "Chủ đề: PPNCKD, quản lý quốc tế, hành vi tổ chức, marketing strategy, HRM",
                    ]
                },
                {
                    name: "Nguyễn Thành Nhân",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2022/05/nguyen-thanh-nhan.webp",
                    tag: "Thạc sĩ Phân tích KD & Chuyển đổi số",
                    job: "Phó Giám đốc CNTT - MSD (Pharmaceuticals & Healthcare)",
                    des: [
                        "Phó Giám đốc CNTT - MSD (Pharmaceuticals & Healthcare)",
                        "Trưởng bộ phận CNTT - Schneider Electric (Energy Management & Industrial Automation)",
                        "Quản lý danh mục dự án Industry 4.0 - Bosch (Automotive Manufacturing)",
                        "Kỹ sư hệ thống CNTT tại Intel (Semiconductor Manufacturing)",
                    ]
                },
            ],cv: [
                {
                    name: "Phạm Quang Vinh",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/vientruong_avt-optimized.webp",
                    tag: "DBA at Apollos University",
                    job: "Viện trưởng IDEAS",
                    des: [
                        "Có hơn 25 năm kinh nghiệm trong lĩnh vực Marketing và Bảo Hiểm",
                        "Nhà sáng lập - Viện trưởng IDEAS",
                        "Phó chủ tịch Hội Khoa Học Phát triển nguồn nhân lực, nhân tài Việt Nam TP.HCM",
                    ]
                },
                {
                    name: "Viola Krebs",
                    avatar: "/wp-content/uploads/external-migrated/Image-empty-state_671165e0.webp",
                    tag: "PhD in Sciences of Information and Communications – University of Strasbourg",
                    job: "Professor and lecturer in Technology",
                    linkedin: "https://www.linkedin.com/in/violakrebs/",
                    des: [
                        "Professor and lecturer in Technology (Web, AI), Communications, International Business",
                        "Scientific Collaborator for the Geneva University Center for Computer Sciences (CUI)",
                        "Member of the University of Strasbourg Chair of UNESCO",
                        "Certified auditor for educational norms (ProCert: ISO, QSC, eduQua, In-Qualis)",
                    ]
                },
                {
                    name: "Dr. Khang Ngoc TRAN",
                    avatar: "/wp-content/uploads/external-migrated/Khang_129ea841.webp",
                    tag: "DBA at Cambridge Corporate University",
                    job: "Business Development Director for Asia Pacific Region",
                    linkedin: "https://www.linkedin.com/in/dr-khang-tran-23b0a315/",
                    des: [
                        "Working in the educational field since 2009, contributing as a dedicated administrator and admission strategist.",
                        "He is committed to inspiring students to achieve academic and personal excellence by fostering a challenging and engaging learning environment.",
                        "In recent years, he has played a key role in fostering successful collaboration partnerships, enhancing international connections and advancing educational opportunities.",
                        "His efforts continue to contribute significantly to the development and success of our institution."
                    ]
                },
                {
                    name: "Alexander Pulte",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "MBA from Columbia University",
                    job: "Professor and International Dean at the University of Business and International Studies in Geneva.",
                    des: [
                        "Executive roles at Sullivan & Cromwell, Asia Green Development Bank, and Screen Digest",
                        "Senior Media Analyst and Strategy Consultant across Asia, Europe, and the United States",
                        "Mentoring research in business strategy, cross-cultural management, and organizational development",
                    ]
                },
                {
                    name: "Carsten Ley",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "Owner & Consultant",
                    job: "Asia PMO - Agile Project Management, OKR & CX Consulting South East Asia",
                    des: [
                        "VP Customer Experience & Customer Service | Lazada Group, Ho Chi Minh City",
                        "Head of Customer Experience | Home Credit Financial Institute, Vietnam",
                        "Business Lecturer for University of Greenwich",
                        "Marketing Lecturer for FPT School of Business & Technology (FSB)",
                    ]
                },
                {
                    name: "Marcel Enzler",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "EMBA in Brand & Marketing Management",
                    job: "AI specialist and Data Scientist",
                    des: [
                        "Hospitality: Campbell Grey Hotels (London), Hilton Group (Zurich), Poppys Group (India)",
                        "2014: Co-founded textile production management company",
                        "2016: Relocated to Switzerland; works as Marketing and Strategic Consultant",
                    ]
                },
                {
                    name: "Talha Saleem Ahmad",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "BSc/MSc/MSc",
                    job: "AI specialist and Data Scientist",
                    des: [
                        "Teaching Computing and Data Science at Gloucestershire College (UK) and WEIoT",
                        "Collaborating with GCHQ (UK Intelligence & Security Agency), driving innovation in AI and technology education",
                        "Leading AI and Data Science projects at InnovatiCS",
                    ]
                },
                {
                    name: "Vasyl Mostovyy",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "BSc/MSc/MSc",
                    job: "Military Institute of KNU T. Shevchenko",
                    des: [
                        "Over 20 years of teaching financial engineering, mathematical modeling for automated decision-making systems",
                        "Institute of Geophysics of the National Academy of Sciences of Ukraine",
                        "Institute of High Technologies of KNU T. Shevchenko",
                    ]
                },
                {
                    name: "Garilyn Vause",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "Master of Analytical Finance | Emory University",
                    job: "Social Media Strategy Analyst | KPMG LLP",
                    des: [
                        "2023 - Present: Social Media Strategy Analyst | KPMG LLP",
                        "2019 - 2023: Social Media Marketing Strategist | Dive N' Dash",
                        "2018 - 2020: Digital Marketing Specialist | Bronzelens Film Festival",
                    ]
                },
                {
                    name: "Frank Lee Harper Jr.",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "BSc/MSc/MSc",
                    job: "Founder, CEO & CLO – Intelligent Systems Services LLC",
                    des: [
                        "30+ years of real-world learning and development experience to corporates, universities worldwide",
                        "Vice-Chancellor, Associate Professor of Agile Leadership & Project Management at Cambridge Corporate University (CCU)",
                        "Certified Agile Coach, Lean Six-Sigma Black & Green Belt",
                    ]
                },
                {
                    name: "Nguyễn Chính Quang",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "Postdoctoral – Western Sydney University",
                    job: "Academic Advisor",
                    des: []
                },
                {
                    name: "De Lagarde, Olivier",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "DBA at Cambridge Corporate University",
                    job: "Academic Advisor",
                    des: []
                },
                {
                    name: "Cartwright, Phillip",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "PhD in Economics – University of Illinois, Urbana-Champaign, USA",
                    job: "Academic Advisor",
                    des: []
                },
                {
                    name: "Chapuis, Jean-Michel",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "PhD in Management Science – Université de Bourgogne",
                    job: "Academic Advisor",
                    des: []
                },
                {
                    name: "Ng, Kwan Keung Steven",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "DBA – University of South Australia",
                    job: "Academic Advisor",
                    des: []
                },
                {
                    name: "Fung, Kwok Hung Lobo",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "PhD in Business Administration – Bulacan State University",
                    job: "Academic Advisor",
                    des: []
                },
                {
                    name: "Fung Man Kam Leo",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp",
                    tag: "DBA – Southern Cross University, Australia",
                    job: "Academic Advisor",
                    des: []
                },
            ],
            umef: [
                {
                                "name": "Alex Jalalian",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_2bf24294.webp",
                                "tag": "Docteur en Sciences de Gestion",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/alex-jalalian",
                                "des": [
                                                "Docteur en Sciences de Gestion.",
                                                "Consultant senior, fournit des solutions en Gestion de Projet et en stratégie d’entreprise.",
                                                "Gestion de projet",
                                                "Innovation de marché",
                                                "Doctor of Business Administration.",
                                                "Senior Consultant, delivering solutions in Project Management and Corporate Strategy areas.",
                                                "Project Management",
                                                "Market Innovation"
                                ]
                },
                {
                                "name": "Alexandra B Schlesinger",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_7b903668.webp",
                                "tag": "Adjunct Faculty",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/alexandra-b-schlesinger",
                                "des": [
                                                "Docteur en Sciences Economiques et Sociales.",
                                                "Analyste de marché en comportement du consommateur.",
                                                "Méthodes et outils de recherche",
                                                "Marketing, comportement des consommateurs",
                                                "Stratégie et communication",
                                                "PhD in Economic and Social Science.",
                                                "Market analyst in consumer behaviour.",
                                                "Research methods and tools",
                                                "Marketing, consumer behaviour",
                                                "Strategy and communication."
                                ]
                },
                {
                                "name": "Alexandre Melnik",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_a52df80a.webp",
                                "tag": "Visiting Faculty",
                                "job": "Visiting Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/alexandre-melnik",
                                "des": [
                                                "Doctorat en Sciences Politiques et en Diplomatie",
                                                "Professeur de géopolitique, Conférencier, Auteur",
                                                "PhD in Political Science and Diplomacy",
                                                "Professor of Geopolitics, Lecturer, Author"
                                ]
                },
                {
                                "name": "Ann-Katrin Voit",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_a9bda193.webp",
                                "tag": "Adjunct Faculty",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/ann-katrin-voit",
                                "des": [
                                                "Ann-Katrin Voit est une économiste et une conférencière qui possède une vaste expérience de l'enseignement et de la recherche en Allemagne, en Chine et dans d'autres institutions internationales.",
                                                "Elle est titulaire d'un doctorat en économie de l'université Ruhr de Bochum, en Allemagne, où elle a également obtenu l'équivalent d'un master (Diplom-Ökonomin). Elle a enseigné dans plusieurs universités et instituts de sciences appliquées en Allemagne et en Chine, notamment à la Technische Akademie Wuppertal, à la Hochschule für Oekonomie und Management et à l'université de Shanxi.",
                                                "Ses recherches comprennent des séjours internationaux dans des institutions telles que la City University of New York, l'Université d'Utrecht et l'Université de Louvain. En 2018, elle a reçu le prix de la recherche de la Sparkasse Recklinghausen-Vest pour sa thèse de doctorat.",
                                                "Ann-Katrin Voit is an economist and lecturer with extensive experience in teaching and research across Germany, China, and other international institutions.",
                                                "She holds a Ph.D. in Economics from Ruhr-University Bochum, Germany, where she also completed her Master’s equivalent degree (Diplom-Ökonomin). She has taught at various universities and applied sciences institutions in Germany and China, including Technische Akademie Wuppertal, Hochschule für Oekonomie und Management, and Shanxi University.",
                                                "Her research includes international stays at institutions such as the City University of New York, University of Utrecht, and University of Leuven. In 2018, she was awarded the Research Prize of Sparkasse Recklinghausen-Vest for her Ph.D. thesis."
                                ]
                },
                {
                                "name": "Arnaud Vallin",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_3488555b.webp",
                                "tag": "Docteur en Sociologie",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/arnaud-vallin",
                                "des": [
                                                "Docteur en Sociologie.",
                                                "Directeur de Marketing Social.",
                                                "Enseigne : Stratégie",
                                                "Innovation",
                                                "Gestion de Projet",
                                                "Management",
                                                "Communication",
                                                "PhD in Sociology.",
                                                "Director of Social Marketing.",
                                                "Strategy",
                                                "Innovation",
                                                "Project Management",
                                                "Communication"
                                ]
                },
                {
                                "name": "Bruce Hearn",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_ee741a87.webp",
                                "tag": "Il a occupé des postes à responsabilité",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/bruce-hearn",
                                "des": [
                                                "Bruce a 12 ans d'expérience dans la finance mondiale chez BNP Paribas, Gulf International Bank, RBS, HSBC et Marshall Wace LLP, puis plus de 14 ans dans le monde universitaire.",
                                                "Il a occupé des postes à responsabilité, notamment celui de directeur des programmes de doctorat à la Southampton Business School et de directeur du DBA à la Bradford School of Management. Ses recherches sur la gouvernance d'entreprise dans les économies émergentes ont donné lieu à plus de 60 publications, dont plus de 20 dans les revues ABS3/4 et FT50*, avec un financement de l'ESRC du Royaume-Uni.",
                                                "Il est spécialisé dans l'enseignement et la supervision de la comptabilité, de la finance et de la gouvernance dans des institutions du monde entier.",
                                                "Bruce has 12 years of experience in global finance with BNP Paribas, Gulf International Bank, RBS, HSBC, and Marshall Wace LLP, followed by 14+ years in academia.",
                                                "He has held senior roles, including Director of PhD Programs at Southampton Business School and Director of DBA at Bradford School of Management. His research on corporate governance in Emerging Economies has led to 60+ publications, including 20+ in ABS3/4 and FT50 journals*, with funding from UK’s ESRC.",
                                                "He specialises in teaching and supervising Accounting, Finance, and Governance at institutions worldwide."
                                ]
                },
                {
                                "name": "Carole Abi Saad Haddad",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_21cb510c.webp",
                                "tag": "Adjunct Faculty",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/carole-abi-saad-haddad",
                                "des": [
                                                "Master en Sciences de Gestion et Master en Droit Privé.",
                                                "Co-fondatrice et partenaire de One million claps.",
                                                "Marketing digital",
                                                "Stratégie de communication",
                                                "Master of Business Administration and Master in Private Law.",
                                                "Co-Founder and Managing partner One million claps.",
                                                "Digital marketing",
                                                "Communication strategy"
                                ]
                },
                {
                                "name": "Catherine Maia",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_ba8debee.webp",
                                "tag": "Docteur en Sciences de gestion",
                                "job": "Visiting Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/catherine-maia",
                                "des": [
                                                "Docteur en Sciences de gestion.",
                                                "PhD"
                                ]
                },
                {
                                "name": "Charrez Eleonore",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_fc3fbd1d.webp",
                                "tag": "Master",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/charrez-eleonore",
                                "des": [
                                                "Master",
                                                "Master"
                                ]
                },
                {
                                "name": "Christophe Boya Musitelli",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_56a39a2f.webp",
                                "tag": "Adjunct Faculty",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/christophe-boya-musitelli",
                                "des": [
                                                "Christophe Boya Musitelli est titulaire d'un doctorat en sciences de gestion. Il est un professionnel expérimenté dans le domaine de la finance, intervenant dans des institutions académiques telles que l'ESM – École de Management et de Communication. Il occupe également des postes de direction, notamment en tant que directeur administratif et financier, et gérant de société dans le secteur immobilier.",
                                                "Fort d'une expertise approfondie en gestion financière et en enseignement, il apporte à ses étudiants une perspective à la fois pratique et académique, enrichissant ainsi leur compréhension des enjeux financiers contemporains.",
                                                "Christophe Boya Musitelli holds a doctorate in management science. He is an experienced professional in the field of finance, lecturing at academic institutions such as ESM - École de Management et de Communication. He has also held a number of management positions, including administrative and financial director and company manager in the real estate sector.",
                                                "With his in-depth expertise in financial management and teaching, he provides his students with both a practical and academic perspective, enriching their understanding of contemporary financial issues."
                                ]
                },
                {
                                "name": "Dalith Steiger-Gablinger",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_0a415a33.webp",
                                "tag": "Visiting Faculty",
                                "job": "Visiting Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/dalith-steiger-gablinger",
                                "des": [
                                                "Dalith Steiger-Gablinger est la co-fondatrice de la start-up primée en intelligence artificielle, SwissCognitive. Née en Israël, elle a grandi en Suisse et a étudié les mathématiques et l'informatique commerciale à l'Université de Zurich. Aujourd'hui, elle fait partie des voix de premier plan de l'écosystème mondial de l'IA, en tant qu'experte en IA, entrepreneure, conférencière mondiale en IA et animatrice de télévision.",
                                                "Avec son expérience internationale approfondie en conseil en stratégie d'IA dans divers secteurs et industries, Dalith peut contribuer à la compréhension des développements technologiques et des sujets spécifiques à l'environnement de l'IA. Elle aide à identifier les tendances technologiques à un stade précoce et à évaluer leur pertinence. Grâce à ses connaissances approfondies, Dalith renforce le leadership en matière d'innovation en soutenant les entreprises dans leur transformation numérique.",
                                                "Dalith siège à plusieurs conseils d'administration et conseille différentes entreprises et startups dans leur parcours en matière d'IA. Elle est également mentore auprès de jeunes filles dans le domaine de la technologie.",
                                                "En dehors de son engagement pour les technologies cognitives, elle est également une mère aimante de deux jeunes femmes, une passionnée de VTT en montagne et une grande fan de chaussures à talons hauts.",
                                                "Dalith Steiger-Gablinger is the co-founder of the award-winning AI start-up SwissCognitive. She was born in Israel, grew up in Switzerland, and studied mathematics and business informatics at the University of Zurich. Today she belongs to the top leading voices in the global AI ecosystem, is a serial entrepreneur, a global AI Thought-Leader and keynote speaker, with vast experience as an AI expert, TV and life stage moderator.",
                                                "With her extensive international experience in AI strategy consulting in various sectors and industries, Dalith can contribute her knowledge of technology developments and focus topics specifically in the AI environment. She helps to identify technology trends at an early stage and assess their relevance. With her in-depth knowledge, Dalith strengthens innovation leadership in supporting companies in their digital transformation.",
                                                "Dalith sits in several boards and advises various companies and startups in their AI journey and mentors young girls in Tech.",
                                                "Besides her drive for cognitive technologies, she is also a loving mother of two young women, a passionate mountain biker and a big fan of high-heel shoes."
                                ]
                },
                {
                                "name": "Daniel Herren",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_8fbfefbd.webp",
                                "tag": "Maîtrise fédérale en comptabilité",
                                "job": "Faculty member and accountant",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/daniel-herren",
                                "des": [
                                                "Maîtrise fédérale en comptabilité.",
                                                "Ancien Directeur Financier chez COGERIM Société Coopérative de Gérance Immobilière.",
                                                "Comptabilité financière",
                                                "Comptabilité de gestion",
                                                "Comptabilité analytique",
                                                "Senior professional qualification in accounting.",
                                                "Former financial director at COGERIM, Cooperative company in real estate management.",
                                                "Financial accounting",
                                                "Management accounting",
                                                "Analytical accounting"
                                ]
                },
                {
                                "name": "Dimitrios Koukourdinos",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_d6068063.webp",
                                "tag": "Head of Student Affairs",
                                "job": "Head of Student Affairs",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/dimitrios-koukourdinos",
                                "des": [
                                                "Dimitrios KOUKOURDINOS est le Directeur de la faculté des sciences politiques",
                                                "Spécialiste expérimenté des relations internationales, doté de solides compétences en matière de communication, de rédaction et d'analyse et d'un talent naturel pour présenter et enseigner des questions complexes de manière claire, simple et intéressante. Il enseigne la relation internationale et la sciences politiques.",
                                                "Master en théologie et Master en Politique Européenne.",
                                                "2005-2015 Conseiller expert au Ministère des Affaires Etrangères Grec.",
                                                "Politique étrangère",
                                                "Etudes européennes",
                                                "Méthodologie de recherche.",
                                                "Dimitrios KOUKOURDINOS is the Head of the Faculty of Political Science.",
                                                "Experienced International Relations specialist with solid communication, writing, and analytical skills and a natural talent for presenting and teaching complex issues in a clear, simple and interesting way. He teaches International Relations and Political Science.",
                                                "Master in theology and master in European policy.",
                                                "2005-2015: Expert counsellor at the Greek Ministry of Foreign Affairs.",
                                                "Foreign policy",
                                                "European studies",
                                                "Research methodology"
                                ]
                },
                {
                                "name": "Djawed Sangdel",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_f3d7955b.webp",
                                "tag": "Managing Director",
                                "job": "Managing Director",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/djawed-sangdel",
                                "des": [
                                                "Pr Dr Djawed SANGDEL est un professionnel accompli, reconnu pour son expertise dans les domaines du leadership et de l'entrepreneuriat. En tant que Directeur général de SWISS UMEF, il joue un rôle essentiel dans la gestion et le développement de l'institution.",
                                                "Sous sa direction, SWISS UMEF a obtenu plusieurs accréditations, y compris l'Accréditation Fédérale Suisse, faisant de lui la première et seule institution privée accréditée en tant qu'Institut de niveau HES (University of Appplied sciences Institute) du canton de Genève.",
                                                "Sangdel est également député au Grand Conseil Genevois, où il apporte sa contribution en tant que membre actif des commissions de l'éducation, de l'enseignement supérieur et du logement. Son engagement politique démontre son intérêt pour les questions liées à l'éducation et au développement de la société.",
                                                "Doté d'une vaste expérience internationale, Sangdel parle couramment sept langues et a parcouru un grand nombre de pays.",
                                                "Dr. Djawed SANGDEL is an accomplished professional renowned for his expertise in leadership and entrepreneurship. As the Managing Director of SWISS UMEF, he plays a pivotal role in the management and development of the institution.",
                                                "Under his leadership, SWISS UMEF has achieved several accreditations, including the Swiss Federal Accreditation, making it the first and only private institution accredited as a University of Applied Sciences in the canton of Geneva.",
                                                "Sangdel is also a member of the Geneva Cantonal Parliament, where he contributes as an active member of the education, higher education, and housing committees. His political involvement underscores his interest in matters related to education and societal development.",
                                                "With extensive international experience, Sangdel is fluent in seven languages and has traveled to numerous countries."
                                ]
                },
                {
                                "name": "Dmytro Kylymnyuk",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_f986e288.webp",
                                "tag": "Post-doctoral en Economie",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/dmytro-kylymnyuk",
                                "des": [
                                                "Post-doctoral en Economie.",
                                                "Docteur en Economie.",
                                                "Enseigne : Micro-économie, macro-économie, économie internationale, mathématiques financières, statistiques.",
                                                "Post-doctoral in Economics.",
                                                "Ph.D. in Economics.",
                                                "Lecturing: Micro-economics, macro-economics, international economics, financial mathematics, statistics."
                                ]
                },
                {
                                "name": "Edlira Martiri",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_78865726.webp",
                                "tag": "Visiting Faculty",
                                "job": "Visiting Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/edlira-martiri",
                                "des": [
                                                "Edlira Martiri détient une licence et une maîtrise en \"Informatique\" de l'Université de Tirana, Faculté des Sciences Naturelles. Depuis ses premières années dans le milieu universitaire, son intérêt de recherche s'est concentré sur la sécurité de l'information. Elle est Professeure Associée et possède un double doctorat de l'UT (2016) en \"Systèmes d'Information\" et de l'Université NTNU de Norvège (2022) en \"Sécurité de l'Information\".",
                                                "Depuis janvier 2014, elle occupe le poste de Point de Contact National auprès de l'Association Européenne de Biométrie (http://www.eab.org) pour l'Albanie. Toujours passionnée par les technologies sécurisées, son intérêt de recherche se concentre sur les systèmes sécurisés par conception. Elle a participé à divers projets dans différents contextes internationaux, tels que H2020, FP7, actions COST, etc., et offre des conseils au secteur privé et aux institutions internationales à Tirana en matière de TIC et de sécurité.",
                                                "Enfin, elle est un membre actif de la communauté informatique locale à Tirana, une bâtisseuse d'équipe, une conseillère, une mentore, et cherche toujours à combler le fossé entre le milieu universitaire et l'industrie informatique.",
                                                "Edlira Martiri holds a bachelor and Master Degree in “Computer Science” from University of Tirana, Faculty of Natural Sciences. Since her early years in academia her research interest was focused on Information Security. She is Associate Professor and holds a double Doctor degree from UT (2016) in \"Information Systems\", and NTNU Norway (2022) in \"Information Security\".",
                                                "From January 2014 she serves as a National Contact Point at the European Association of Biometrics (http://www.eab.org), for Albania. Being always enthusiastic about secure technologies, her research interest is focused in secure-by-design systems. She has participated in various projects in different international setups, such as H2020, FP7, COST actions, etc., and offers counselling to private sector, and international institutions in Tirana in ICT and Security.",
                                                "Finally, she is an active member of the local IT community in Tirana, team builder, consultant, mentor, and always trying to bridge the gap between academia and IT industry."
                                ]
                },
                {
                                "name": "Elangy Ituku Botoy",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_529e3959.webp",
                                "tag": "Docteur en droit",
                                "job": "Visiting Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/elangy-ituku-botoy",
                                "des": [
                                                "Docteur en droit.",
                                                "Administrateur de programmes OMPI.",
                                                "Droit des brevets",
                                                "Droit privé international",
                                                "Droit public international",
                                                "Droit des organisations internationales",
                                                "PhD in Law.",
                                                "WIPO Program Officer.",
                                                "Patent law",
                                                "International private law",
                                                "International public law",
                                                "International organiSations law"
                                ]
                },
                {
                                "name": "Eric Serra",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_fc11acea.webp",
                                "tag": "Master en Gestion Internationale",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/eric-serra",
                                "des": [
                                                "Master en Gestion Internationale.",
                                                "Associé de Bluecap S.A.",
                                                "Gestion de portefeuille",
                                                "Finances internationales.",
                                                "Mater in International Management.",
                                                "Partner at Bluecap S.A.",
                                                "Portfolio management",
                                                "International finance"
                                ]
                },
                {
                                "name": "Eskil Ullberg",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_663c6ccf.webp",
                                "tag": "Post-doctoral en économie expérimentale",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/eskil-ullberg",
                                "des": [
                                                "Post-doctoral en économie expérimentale.",
                                                "Docteur en Economie.",
                                                "Chercheur senior, Institute for Management of Innovation and Technology, Suède.",
                                                "Economie internationale",
                                                "Brevets",
                                                "Théorie de jeux",
                                                "Recherche qualitative",
                                                "Post-doctoral in experimental economics.",
                                                "Ph.D. in Economics.",
                                                "Senior researcher, Institute for Management of Innovation and Technology, Sweden.",
                                                "International economics",
                                                "Patents",
                                                "Game theory",
                                                "Qualitative research"
                                ]
                },
                {
                                "name": "Gervais Rufyikiri",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_1572bec9.webp",
                                "tag": "Docteur en Sciences de gestion",
                                "job": "Adjunct faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/gervais-rufyikiri",
                                "des": [
                                                "Docteur en Sciences de gestion.",
                                                "PhD"
                                ]
                },
                {
                                "name": "Gilles-Emmanuel Jacquet",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_d9213134.webp",
                                "tag": "Adjunct Faculty",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/gilles-emmanuel-jacquet",
                                "des": [
                                                "Master en Sciences Politiques et Master en Etudes Européennes.",
                                                "Trésorier au Geneva International Peace Research Institute.",
                                                "Histoire de la diplomatie",
                                                "Introduction aux relations internationales",
                                                "Méthodologie de recherche",
                                                "Géopolitique",
                                                "Analyse politique",
                                                "Master in Political Science and Master in European Studies.",
                                                "Treasurer at the Geneva International Peace Research Institute.",
                                                "History of diplomacy",
                                                "Introduction to international relations",
                                                "Research methodology",
                                                "Geopolitics",
                                                "Political analysis"
                                ]
                },
                {
                                "name": "Gregory Mugnier",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_9aeb9be7.webp",
                                "tag": "Visiting Faculty",
                                "job": "Visiting Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/gregory-mugnier",
                                "des": [
                                                "Doctorat en Marketing et Psychologie du consommateur.",
                                                "Consultant en Marketing Stratégique et Opérationnel, GM Consulting.",
                                                "Marketing stratégique",
                                                "Marketing opérationnel",
                                                "PhD in marketing and consumer psychology.",
                                                "Consultant in Strategic and Operational Marketing, GM Consulting.",
                                                "Strategic marketing",
                                                "Operational marketing"
                                ]
                },
                {
                                "name": "Guillaume Tusseau",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_54cbf050.webp",
                                "tag": "Doctorat en droit public",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/guillaume-tusseau",
                                "des": [
                                                "Doctorat en droit public.",
                                                "Professeur de Droit Public, Science Po, Paris.",
                                                "Droit public",
                                                "Droit constitutionnel",
                                                "Droit comparatif",
                                                "Théorie juridique",
                                                "PhD in Public Law.",
                                                "Professor of public law, Science Po, Paris.",
                                                "Public law",
                                                "Constitutional law",
                                                "Comparative Law",
                                                "Theoretical law"
                                ]
                },
                {
                                "name": "Herve Salkin",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_80a53ebf.webp",
                                "tag": "Adjunct Faculty",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/herve-salkin",
                                "des": [
                                                "Hervé Salkin est titulaire d'un doctorat en économie de l'Université de Bretagne Occidentale à Brest, en France. Il a également obtenu un diplôme d'ingénieur de l'École polytechnique et de l'École des mines de Paris.",
                                                "Fort d'une vaste expérience en matière de gestion, d'entrepreneuriat et d'innovation, Hervé a commencé sa carrière dans l'industrie pétrolière et gazière, occupant des postes techniques et de gestion dans des multinationales telles que Vallourec, Weatherford et FMC, en Europe et en Afrique.",
                                                "En 2000, il s'est orienté vers l'enseignement supérieur, puis a fondé son cabinet de conseil, Campus Globe, en 2012. Hervé partage aujourd'hui son temps entre le conseil et l'enseignement à travers l'Europe, l'Asie et l'Afrique. Ses cours s'appuient sur des expériences pratiques et des études de cas réels dans les domaines de l'entrepreneuriat et de la gestion.",
                                                "Hervé Salkin holds a PhD in Economics from Western Brittany University in Brest, France. He also earned a Master’s degree in Engineering from École Polytechnique and École des Mines in Paris.",
                                                "With extensive experience in management, entrepreneurship, and innovation, Hervé began his career in the oil and gas industry, holding technical and management positions with multinational companies such as Vallourec, Weatherford, and FMC across Europe and Africa.",
                                                "In 2000, he shifted to higher education, later founding his consultancy, Campus Globe, in 2012. Hervé now divides his time between consulting and teaching across Europe, Asia, and Africa, with his courses drawing on practical experiences and real-world case studies in entrepreneurship and management."
                                ]
                },
                {
                                "name": "Hicheme Lehmici",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_d55f8ab9.webp",
                                "tag": "Master",
                                "job": "Adjunct faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/hicheme-lehmici",
                                "des": [
                                                "Master",
                                                "Master"
                                ]
                },
                {
                                "name": "Jean Binyet",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_1da49807.webp",
                                "tag": "Adjunct Faculty",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/jean-binyet",
                                "des": [
                                                "Master en sciences économiques et sociales.",
                                                "Master en droit, organisation et conduite du changement.",
                                                "Economiste conseil chez Daremtec Sarl.",
                                                "Management",
                                                "Comptabilité",
                                                "Economie",
                                                "Système de gestion de la qualité",
                                                "Master in economics, Master in economics, organisation and change management.",
                                                "Economic advisor at Daremtec Sarl.",
                                                "Management",
                                                "Accounting",
                                                "Economy",
                                                "Quality management systems"
                                ]
                },
                {
                                "name": "Jean Daniel Ruch",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_703206f2.webp",
                                "tag": "Le professeur Jean Daniel Ruch",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/jean-daniel-ruch",
                                "des": [
                                                "Le professeur Jean Daniel Ruch, originaire de Suisse, est un expert en relations internationales avec plus de 30 ans d’expérience diplomatique. Titulaire d'un master en relations internationales de l'Institut universitaire de Hautes Etudes Internationales de Genève, il a eu une carrière remarquable au sein de la diplomatie suisse et dans diverses organisations internationales.",
                                                "M. Ruch a occupé des fonctions de haut niveau, notamment en tant qu’Ambassadeur de Suisse en Serbie, au Monténégro, en Israël et en Turquie. Son parcours inclut également des missions au sein de l’OSCE (Organisation pour la sécurité et la coopération en Europe) et du Tribunal pénal de l’ONU pour l'ex-Yougoslavie, lui offrant ainsi une perspective enrichie sur les enjeux géopolitiques mondiaux.",
                                                "Professor Jean Daniel Ruch, a native of Switzerland, is an expert in international relations with over 30 years of diplomatic experience. He holds a master's degree in international relations from the Graduate Institute of International Studies in Geneva, and has had a distinguished career in Swiss diplomacy and in various international organisations.",
                                                "Mr Ruch has held high-level positions, notably as Swiss Ambassador to Serbia, Montenegro, Israel and Turkey. His career also includes assignments with the OSCE (Organisation for Security and Cooperation in Europe) and the UN Criminal Tribunal for the former Yugoslavia, giving him an enriched perspective on global geopolitical issues."
                                ]
                },
                {
                                "name": "Jean Marc Bejjani",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_e8f4f067.webp",
                                "tag": "Visiting Faculty",
                                "job": "Visiting Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/jean-marc-bejjani",
                                "des": [
                                                "Master en microtechnique spécialisé en robotique : EPFL",
                                                "Bachelor en microtechnique : EPFL",
                                                "COMPÉTENCES TECHNIQUES",
                                                "Compétences informatiques",
                                                "- Langages de programmation : Python, C++.",
                                                "- Middlewares, Frameworks et Bibliothèques : ROS, Pytorch, Tensorflow, Scikit, OpenCV.",
                                                "- Autres : Git, Asana, Adobe Illustrator, Photoshop.",
                                                "Compétences en ingénierie",
                                                "- Informatique : Développement et conception de logiciels, intégration et déploiement continus, apprentissage profond, vision par ordinateur, apprentissage automatique, langage naturel.",
                                                "Apprentissage profond, vision par ordinateur, apprentissage automatique, traitement du langage naturel, analyse des données et statistiques,",
                                                "Systèmes multi-agents, Algorithmes génétiques.",
                                                "- Robotique : Communication en série, théorie du contrôle, SLAM, simulation, cinématique des robots, capteurs, électronique,",
                                                "CAO, prototypage.",
                                                "Compétences en gestion de produits",
                                                "- Stratégie et définition du produit : Road Mapping, évaluation des segments de clientèle, Wireframing, UX et définition des flux, Brainstorming.",
                                                "définition des flux, brainstorming.",
                                                "- Gestion et suivi des progrès : Définition des histoires des clients, évaluation de la vélocité, priorisation des histoires.",
                                                "Définition de l'acceptation des fonctionnalités, collecte et analyse des commentaires des clients et de l'équipe.",
                                                "Masters in Microengineering Specialised in Robotics: EPFL",
                                                "Bachelor in Microengineering : EPFL",
                                                "TECHNICAL SKILLS",
                                                "Computer Skills",
                                                "- Programming languages: Python, C++.",
                                                "- Middlewares, Frameworks and Libraries: ROS, Pytorch, Tensorflow, Scikit, OpenCV.",
                                                "- Others: Git, Asana, Adobe Illustrator, Photoshop.",
                                                "Engineering Skills",
                                                "- Computer Science: Software Development & Design, Continuous Integration and Deployment, Deep",
                                                "Learning, Computer Vision, Machine Learning, Natural Language Processing, Data Analysis and Statistics,",
                                                "Multi-Agent Systems, Genetic Algorithms.",
                                                "- Robotics: Serial communication, Control Theory, SLAM, Simulation, Robot Kinematics, Sensors, Electronics,",
                                                "CAD, Prototyping.",
                                                "Product Management Skills",
                                                "- Strategy and Product Definition: Road Mapping, Customer segment evaluation, Wireframing, UX and Flow",
                                                "definition, Brainstorming.",
                                                "- Management and Progress Tracking: Customer Stories Definition, Velocity assessment, Prioritizing stories.",
                                                "Feature Acceptance definition, Customer and Team feedback collection and Analysis."
                                ]
                },
                {
                                "name": "Jean-Philippe Mohamed Sangare",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_6ff64a1f.webp",
                                "tag": "Adjunct Faculty",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/jean-philippe-mohamed-sangare",
                                "des": [
                                                "Jean-Philippe Mohamed SANGARE est titulaire d'un Master en Informatique et est un expert en IT avec plus de 20 ans d'expérience en conseil, incluant la gestion de projets, les tests, le développement et le conseil en affaires. Il a également acquis de l'expérience en tant que formateur professionnel en informatique, enseignant dans des lycées et des universités.",
                                                "Génie logiciel",
                                                "Intelligence artificielle générative et ingénierie de requêtes",
                                                "Test de logiciel",
                                                "Son objectif est de partager ses connaissances et son expertise avec les étudiants pour les aider à acquérir les compétences nécessaires dans le domaine de l'informatique et du génie logiciel. Il aspire à les préparer à relever les défis technologiques actuels et futurs tout en favorisant leur croissance personnelle et professionnelle.",
                                                "Jean-Philippe Mohamed SANGARE holds a Master's degree in Computer Science, and he is an expert in IT with over 20 years of consulting experience, encompassing project management, testing, development, and business consulting. He also has experience as a professional IT trainer, teaching in high schools and universities.",
                                                "Software Engineering",
                                                "Generative AI and Query Engineering",
                                                "Software Testing",
                                                "His goal is to share his knowledge and expertise with students to help them acquire the necessary skills in the field of computer science and software engineering. He aspires to prepare them to meet current and future technological challenges while fostering their personal and professional growth."
                                ]
                },
                {
                                "name": "Jelena Lagger",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_3203a68c.webp",
                                "tag": "Jelena Lagger est une consultante",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/jelena-lagger",
                                "des": [
                                                "Experte de l'avenir du travail et de l'élaboration des politiques",
                                                "Jelena Lagger est une consultante, éducatrice et chercheuse suisse-américaine spécialisée dans l'avenir du travail, l'industrie 4.0 et l'élaboration de politiques. Elle est titulaire d'un doctorat en gestion et politique de l'Université de Bath, au Royaume-Uni, où elle est membre du Centre de recherche sur l'avenir du travail.",
                                                "Forte d'une expérience dans les domaines de l'université, du conseil et du leadership, elle a travaillé avec des institutions telles que le CAFRAD, l'AIEIA et l'Université de Muscat, où elle a prodigué des conseils sur la transformation de la main-d'œuvre et les politiques stratégiques. Elle fait également partie de conseils consultatifs et encadre des professionnels en matière de leadership et de développement des ressources humaines.",
                                                "Expert in Future of Work & Policy Development",
                                                "Dr. Jelena Lagger is a Swiss-American consultant, educator, and researcher specialising in Future of Work, Industry 4.0, and policy development. She holds a Ph.D. in Management & Policy from the University of Bath, UK, where she is a Fellow at the Future of Work Research Centre.",
                                                "With experience across academia, consultancy, and leadership, she has worked with institutions such as CAFRAD, IASIA, and Muscat University, advising on workforce transformation and strategic policies. She also serves on advisory boards and mentors professionals in leadership and HR development."
                                ]
                },
                {
                                "name": "Jerome Duberry",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_5d20d4ea.webp",
                                "tag": "Visiting Faculty",
                                "job": "Visiting Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/jerome-duberry",
                                "des": [
                                                "Docteur en droit et relations internationales",
                                                "Chargé de cours et chercheur Université de Genève, Université de Neuchâtel, Graduate Institute of International and Development Studies.",
                                                "Gouvernance environnementale mondiale",
                                                "Sécurité internationale",
                                                "Relations internationales et technologies numériques",
                                                "La cyber-sécurité",
                                                "Doctor in law and international relations.",
                                                "Adjunct professor and researcher at University of Geneva, University of Neuchâtel, Graduate Institute of International and Development Studies.",
                                                "Global Environmental Governance",
                                                "International Security",
                                                "International relations and Digital Technologies",
                                                "Cybersecurity"
                                ]
                },
                {
                                "name": "Konstantin Starchev",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_c13b0a0d.webp",
                                "tag": "Konstantin Startchev",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/konstantin-starchev",
                                "des": [
                                                "Konstantin Startchev, PhD, est un chercheur et ingénieur logiciel expérimenté spécialisé en Vision par Ordinateur et en Apprentissage Automatique. En tant que Vice-Président de la Société Suisse de Réalité Virtuelle et Augmentée (SSVAR) depuis 2017 et chef de projet chez SocialIN3, il a démontré une vaste expérience dans la gestion de projets de développement logiciel de bout en bout, tant dans l'industrie que dans le milieu universitaire.",
                                                "Son travail précédent inclut un poste d'ingénieur de recherche au Laboratoire de Vision par Ordinateur (CVLab) de l'EPFL. Là, il a joué un rôle clé dans le développement de logiciels pour la reconstruction 3D de voiles et la mise en œuvre d'algorithmes de vision électrique pour un robot poisson bio-inspiré.",
                                                "De plus, il a apporté des contributions significatives chez Manteia Predictive Medicine SA, une startup où il a participé au développement d'une méthode de séquençage d'ADN à haut débit en analysant des images de microscopie. Cette méthode, maintenant connue sous le nom de \"séquençage d'ADN Illumina\", est une technologie de pointe dans le domaine.",
                                                "En plus de sa riche expérience industrielle, le Dr Startchev est un éducateur respecté. Il a enseigné à des étudiants en licence, en master et en post-doctorat à l'Université de Genève et à l'EPFL. Il a supervisé et co-supervisé plus de 10 doctorants.",
                                                "Konstantin Startchev, PhD, is a seasoned researcher and software engineer specializing in Computer Vision and Machine Learning. As the Vice President of the Swiss Society of Virtual and Augmented Reality (SSVAR) since 2017 and a project manager at SocialIN3, he has demonstrated extensive experience in managing end-to-end software development projects in both industry and academia.",
                                                "His prior work includes a stint as a research engineer at the Computer Vision Lab (CVLab) of EPFL. Here, he was instrumental in developing software for the 3D reconstruction of sails and implementing electric vision algorithms for a bio-inspired fish robot.",
                                                "Furthermore, he made significant contributions at Manteia Predictive Medicine SA, a startup company where he helped develop a high-throughput DNA sequencing method by analyzing microscopy images. This method, now known as \"Illumina DNA sequencing,\" is a leading technology in the field.",
                                                "In addition to his rich industry experience, Dr. Startchev is a respected educator. He has taught Bachelor's, Master's, and postgraduate students at the University of Geneva and EPFL. His mentorship extends to having supervised and co-supervised more than 10 PhD students."
                                ]
                },
                {
                                "name": "Liza Castro-Christiansen",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_d4ff3628.webp",
                                "tag": "Adjunct Faculty",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/liza-castro-christiansen",
                                "des": [
                                                "Docteur en administration des affaires - Conférencier, chercheur et consultant international",
                                                "Dr Castro est une universitaire et une entrepreneuse avec 34 ans d'expérience internationale. Elle est titulaire d'un MBA et d'un DBA du Henley Management College et de l'université Brunel et enseigne à la Henley Business School et à la SWISS UMEF.",
                                                "Ses recherches portent sur le leadership, la diversité et la gestion des ressources humaines, avec un intérêt particulier pour les femmes dans le leadership et le changement organisationnel. Elle a été invitée à donner des conférences en Chine, aux États-Unis, en France et au Danemark.",
                                                "Elle est également consultante et fondatrice d'entreprise, spécialisée dans les bijoux en perles des mers du Sud et les accessoires de luxe, et siège à des conseils consultatifs pour le développement stratégique et organisationnel.",
                                                "Doctor of Business Administration - International lecturer, researcher and consultant",
                                                "Dr Castro is an academic and entrepreneur with 34 years of international experience. She holds an MBA and DBA from Henley Management College and Brunel University and teaches at Henley Business School and SWISS UMEF.",
                                                "Her research focuses on leadership, diversity, and human resource management, with a special interest in women in leadership and organisational change. She has been a guest lecturer in China, the U.S., France, and Denmark.",
                                                "She is also a consultant and business founder, specialising in South Sea pearl jewellery and luxury accessories, and serves on advisory boards for strategic and organisational development."
                                ]
                },
                {
                                "name": "Marc Bonnet",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_ad64e58e.webp",
                                "tag": "Docteur en Sciences de Gestion",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/marc-bonnet",
                                "des": [
                                                "Docteur en Sciences de Gestion.",
                                                "PhD"
                                ]
                },
                {
                                "name": "Marc Finaud",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_7cadf4b6.webp",
                                "tag": "Master",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/marc-finaud",
                                "des": [
                                                "Master",
                                                "Master"
                                ]
                },
                {
                                "name": "Maria Del Rosario Castro",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_f8802de6.webp",
                                "tag": "Doctorat en Economie et Finance",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/maria-del-rosario-castro",
                                "des": [
                                                "Doctorat en Economie et Finance.",
                                                "Mathématiques financières",
                                                "Finance internationale",
                                                "Théorie et politique monétaire",
                                                "Banques et institutions financières",
                                                "Finance d’entreprise",
                                                "PhD in Economics and Finance.",
                                                "Financial Mathematics",
                                                "International Finance",
                                                "Monetary Theory & Policy",
                                                "Banking and Financial Institutions",
                                                "Corporate Finance"
                                ]
                },
                {
                                "name": "Marina Papadopoulou",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_72434a3d.webp",
                                "tag": "Master en Business Managerial Economics",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/marina-papadopoulou",
                                "des": [
                                                "Master en Business Managerial Economics",
                                                "MBA en Economie et Finance.",
                                                "Enseigne : Finance et comptabilité.",
                                                "Master in Business Managerial Economics",
                                                "MBA in Economics and Finance",
                                                "Lecturing: Finance and accounting."
                                ]
                },
                {
                                "name": "Monique Morrow",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_cd9f4d5c.webp",
                                "tag": "Adjunct Faculty",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/monique-morrow",
                                "des": [
                                                "Monique Morrow est titulaire d'un Master en monnaie numérique de l'Université de Nicosie et d'un MBA de la City University de Seattle (programme de Zurich, Suisse). Elle détient également un Master en gestion des télécommunications de la Golden Gate University et une Licence en français de la San Jose State University. De plus, Monique a obtenu un certificat d'études supérieures en systèmes d'information de l'Université de Californie du Sud et un Diplôme d'études supérieures de l'Université de Paris Sorbonne. Actuellement, elle poursuit ses études en tant qu'étudiante doctorante en cyberpsychologie à la Capitol Technology University.",
                                                "Monique Morrow, leader technologique de renom avec plus de 25 ans d'expérience, a joué un rôle crucial dans la croissance des entreprises grâce aux technologies émergentes. Elle a occupé plusieurs postes de conseil, notamment Directrice au sein du conseil d'administration de Hedera Hashgraph et Partenaire de capital-risque chez Sparklabs. Précédemment, en tant qu'Architecte distinguée senior des technologies émergentes chez Syniverse, elle a dirigé la stratégie pour les technologies émergentes. Elle a également co-fondé l'Internet Humanisé, une organisation à but non lucratif se concentrant sur l'identité numérique. Le travail de Monique intersecte la technologie blockchain, la sécurité et la vie privée, et la juridiction légale. Elle est reconnue comme l'une des leaders technologiques les plus influentes et a été honorée par WomenTech Networks et Forbes. Défenseure des femmes dans la technologie et l'ingénierie, elle a publié \"Internet of Women, Accelerating Culture Change\" en 2016.",
                                                "Monique Morrow has a Master's degree in Digital Currency from the University of Nicosia and an MBA from the City University of Seattle (Zurich, Switzerland Program). She also holds a Master's degree in Telecommunications Management from Golden Gate University and a Bachelor's degree in French from San Jose State University. Additionally, Monique earned a Graduate Certificate in Information Systems from the University of Southern California and a Diploma of Higher Studies from the University of Paris Sorbonne. Currently, she is furthering her education as a Doctoral Student in Cyberpsychology at Capitol Technology University.",
                                                "Monique Morrow, a renowned technology leader with over 25 years of experience, has been pivotal in driving business growth through emerging technologies. She has held several advisory positions, including Director on the Hedera Hashgraph Board and Venture Partner at Sparklabs. Previously, as Senior Distinguished Architect of Emerging Technologies at Syniverse, she led strategic direction for emerging technologies. She also co-founded the Humanized Internet, a non-profit organization focusing on digital identity. Monique's work intersects blockchain technology, security-privacy, and legal jurisdiction. She is recognized as one of the most influential tech leaders and has been honored by WomenTech Networks and Forbes. An advocate for women in technology and engineering, she published \"Internet of Women, Accelerating Culture Change\" in 2016."
                                ]
                },
                {
                                "name": "Mourad Chabbi",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_e3bac4c2.webp",
                                "tag": "Docteur en Science Politique",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/mourad-chabbi",
                                "des": [
                                                "Docteur en Science Politique.",
                                                "Consultant expert et gestionnaire de laboratoire de recherche IEP Grenoble.",
                                                "Enseigne : veille stratégique, intelligence économique, prospective stratégique.",
                                                "PhD Political science.",
                                                "Expert consultant and manager of research laboratory, IEP Grenoble",
                                                "Lecturing: horizon scanning, economic intelligence, scenario planning."
                                ]
                },
                {
                                "name": "Nataly Raksha",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_c1dd630a.webp",
                                "tag": "Docteur en Sciences de gestion",
                                "job": "Adjunct faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/nataly-raksha",
                                "des": [
                                                "Docteur en Sciences de gestion.",
                                                "PhD"
                                ]
                },
                {
                                "name": "Océane Zubeldia",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_a304d1d7.webp",
                                "tag": "Docteur en Sciences de gestion",
                                "job": "Visiting Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/oc%C3%A9ane-zubeldia",
                                "des": [
                                                "Docteur en Sciences de gestion.",
                                                "PhD"
                                ]
                },
                {
                                "name": "Olivier Naray",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_dfc1d8a5.webp",
                                "tag": "Docteur en Sciences de gestion",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/olivier-naray",
                                "des": [
                                                "Docteur en Sciences de gestion.",
                                                "Manager, Hendricks & Schwartz.",
                                                "Communication d’entreprise",
                                                "Economie et diplomatie",
                                                "PhD Business Administration and Management.",
                                                "Manager, Hendricks & Schwartz.",
                                                "Corporate communication",
                                                "Economy and diplomacy"
                                ]
                },
                {
                                "name": "Petre Roman",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_288f2efc.webp",
                                "tag": "Pr",
                                "job": "President",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/petre-roman",
                                "des": [
                                                "S.E. Petre ROMAN est le Président",
                                                "Ancien Premier ministre de Roumanie.",
                                                "Pr. Roman est titulaire d'un diplôme de la Faculté de Génie de l'Environnement de l'Université Politehnica de Bucarest (1968), Diplôme d'Etudes Approfondies-DEA en Hydrodynamique de l'ENSEEIHT (Ecole Nationale d'Electrotechnique, D'electronique, Informatique et Hydraulique), Toulouse, France, 1971 et doctorat en dynamique des fluides à l'Université \"Paul Sabatier\", Toulouse, France, 1974.",
                                                "H.E. Petre ROMAN is the President",
                                                "Former Prime Minister of Romania",
                                                "Mr. Roman holds a degree from the Environmental Engineering Faculty at Politehnica University Bucharest (1968), Diplôme d'Etudes Approfondies-DEA on Hydrodynamics at ENSEEIHT (Ecole Nationale d'Electrotechnique, D'electronique, Informatique et Hydraulique), Toulouse, France, 1971 and PhD in Fluid Dynamics at “Paul Sabatier”University, Toulouse, France,1974."
                                ]
                },
                {
                                "name": "Philippe Lagrange",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_cbef2177.webp",
                                "tag": "Docteur en droit",
                                "job": "Visiting Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/philippe-lagrange",
                                "des": [
                                                "Docteur en droit.",
                                                "Doyen honoraire, Faculté de droit, Université de Poitiers.",
                                                "droit international public",
                                                "droit international humanitaire",
                                                "PhD in Law.",
                                                "Honorary dean, Law Faculty, Poitiers University.",
                                                "international public law",
                                                "international humanitarian law"
                                ]
                },
                {
                                "name": "Richard Mukundji",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_a4c68fa6.webp",
                                "tag": "Adjunct Faculty",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/richard-mukundji",
                                "des": [
                                                "Professeur Richard Mukundji est titulaire d'un doctorat en Sciences Économiques et Sociales de l'Université de Genève (UNIGE). Son expérience riche, comprend des missions d'assistance technique et de renforcement des capacités liées à des projets financés par le Fonds Européen de Développement (FED). Spécialiste du commerce international et de l'évaluation de programmes en Afrique, il possède une solide compréhension des enjeux économiques et de l'environnement des affaires du continent. En tant qu'enseignant, il couvre des domaines tels que la méthodologie de la recherche, l'économie internationale, le développement durable, les politiques publiques et les questions de migration et de réfugiés. Son expertise diversifiée enrichit les programmes académiques et institutionnels, faisant de lui une voix influente dans le domaine du développement en Afrique.",
                                                "Professor Richard Mukundji holds a PhD in Economics and Social Sciences from the University of Geneva (UNIGE). His extensive experience includes engagements in technical assistance and capacity-building missions related to projects funded by the European Development Fund (EDF). Specializing in international trade and program evaluation in Africa, he possesses a robust understanding of economic challenges and the business landscape on the continent.",
                                                "As an educator, he spans various disciplines including research methodology, international economics, sustainable development, public policy, and issues of migration and refugees. His diversified expertise enhances academic and institutional programs, positioning him as a prominent voice in the field of African development."
                                ]
                },
                {
                                "name": "Rui De Sousa Borges",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_b6a9919f.webp",
                                "tag": "Master",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/rui-de-sousa-borges",
                                "des": [
                                                "Master",
                                                "Master"
                                ]
                },
                {
                                "name": "Stanislas d'Eyrames",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_f820e793.webp",
                                "tag": "Academic and Research Director",
                                "job": "Academic and Research Director",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/stanislas-d'eyrames",
                                "des": [
                                                "Stanislas d’Eyrames holds a PhD in Business Administration and is currently the Academic Director and Head of Research at SWISS UMEF University of Applied Sciences Institute in Geneva.",
                                                "His academic expertise spans multiple continents, with a focus on management, leadership, and the practical application of business strategies in international contexts. He is also the founder and president of SAS Segace, a consultancy specialising in advisory and training services.",
                                                "Stanislas’ teaching approach incorporates real-world case studies, providing students with concrete insights into the challenges and opportunities in the business world.",
                                                "Stanislas d'Eyrames est titulaire d'un doctorat en gestion d'entreprise et est actuellement directeur académique et responsable de la recherche à l'Institut universitaire des sciences appliquées SWISS UMEF à Genève.",
                                                "Son expertise académique couvre plusieurs continents et se concentre sur la gestion, le leadership et l'application pratique des stratégies d'entreprise dans des contextes internationaux. Il est également le fondateur et le président de SAS Segace, une société de conseil spécialisée dans les services de consultation et de formation.",
                                                "L'approche pédagogique de Stanislas intègre des études de cas du monde réel, fournissant aux étudiants des aperçus concrets sur les défis et les opportunités du monde des affaires."
                                ]
                },
                {
                                "name": "Svetlana Serdyukov",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_092d37a2.webp",
                                "tag": "Docteur en Sciences de Gestion",
                                "job": "Visiting Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/svetlana-serdyukov",
                                "des": [
                                                "Docteur en Sciences de Gestion.",
                                                "PhD"
                                ]
                },
                {
                                "name": "Sylvaine Mercuri Chapuis",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_096126d5.webp",
                                "tag": "Adjunct Faculty",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/sylvaine-mercuri-chapuis",
                                "des": [
                                                "Dr Sylvaine Mercuri Chapuis est professeure en Sciences de Gestion et dirige plusieurs groupes de recherche sur les Pratiques d'Anticipation et la Responsabilité Sociale des Entreprises. Elle possède une expérience académique internationale et coordonne régulièrement des projets de recherche appliquée en Suisse et à l'étranger. Son objectif est de développer une conscience d'anticipation chez les managers et les employés dans divers contextes et cultures, en favorisant l'intelligence collective pour un avenir meilleur.",
                                                "Dr. Sylvaine Mercuri Chapuis is a Professor in Management Sciences, leading research groups in Anticipation Practices and Corporate Social Responsibility. With international academic experiences, she coordinates applied research projects in Switzerland and abroad. Her focus is on developing anticipation consciousness for managers and employees in diverse contexts and cultures, fostering collective intelligence for a better future."
                                ]
                },
                {
                                "name": "Vera Lalchevska",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_7c81c3f3.webp",
                                "tag": "Adjunct Faculty",
                                "job": "Adjunct Faculty",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/vera-lalchevska",
                                "des": [
                                                "Prof. LALCHEVSKA possède un parcours académique en sciences politiques, relations internationales et politiques de développement durable, ayant étudié dans des institutions prestigieuses telles que Gettysburg College et Duke University aux États-Unis, ainsi que des études juridiques et économiques sur l’Union européenne à Paris I Panthéon Sorbonne. Ses recherches se concentrent sur l'intersection des droits de l'homme, des relations internationales et du développement durable, avec un intérêt particulier pour la création de systèmes internationaux plus justes, la responsabilité sociétale des entreprises dans les relations internationales et les réformes de la gouvernance mondiale.",
                                                "Forte de plus de 20 ans d'expérience dans l'enseignement des relations internationales, de la politique étrangère, des droits de l'homme, du système des Nations Unies et du processus décisionnel de l'Union européenne, la Prof. LALCHEVSKA a formé de nombreux étudiants et professionnels dans ces domaines.",
                                                "Prof. LALCHEVSKA has an academic background in political science, international relations, and sustainable development policies, studying at prestigious institutions such as Gettysburg College and Duke University in the USA, as well as legal and economic studies on the European Union at Paris I Panthéon Sorbonne. Her research focuses on the intersection of human rights, international relations, and sustainable development, with particular interest in creating fairer international systems, corporate social responsibility in international relations, and global governance reforms.",
                                                "With over 20 years of experience in teaching international relations, foreign policy, human rights, the United Nations system, and EU decision-making processes, Prof. LALCHEVSKA has trained numerous students and professionals in these fields."
                                ]
                },
                {
                                "name": "Viola Krebs",
                                "avatar": "/wp-content/uploads/external-migrated/Image-empty-state_671165e0.webp",
                                "tag": "Head of Development",
                                "job": "Head of Development",
                                "website": "https://www.swiss-umef.ch/en/corps-professoral/viola-krebs",
                                "des": [
                                                "Viola KREBS est la responsable du développement de SWISS UMEF.",
                                                "Viola Krebs est une spécialiste senior des questions d'éducation et de formation. Elle enseigne l'intelligence artificielle au Centre Universitaire d'Informatique (CUI) de l'Université de Genève et participe à des groupes de recherche à l'Université de Strasbourg, se concentrant sur les sciences de la communication, l'éducation et l'intelligence artificielle.",
                                                "Elle est également auditrice pour les normes éducatives (ISO 21001, QSC, eduQua) et travaille depuis plusieurs années sur les procédures et les questions d'accréditation (IACBE, SAC/AAQ).",
                                                "Management",
                                                "Intercultural management",
                                                "Stratégies de communication",
                                                "Stratégies numériques",
                                                "Marketing",
                                                "Viola KREBS is the head of Development at SWISS UMEF.",
                                                "Viola Krebs is a Senior specialist in educational and training matters. She teaches artificial intelligence at the Centre Universitaire d'Informatique (CUI) of the University of Geneva and participates in research groups at the University of Strasbourg, focusing on sciences of communications, education and artificial intelligence.",
                                                "She is also an auditor for educational norms (ISO 21001, QSC, eduQua) and has worked with accreditation procedures and matters for a number of years (IACBE, SAC/AAQ).",
                                                "Management",
                                                "Cross-cultural Management",
                                                "Communication Strategy",
                                                "Digital Strategies",
                                                "Marketing"
                                ]
                }
]
        };

        // Default avatar
        const DEFAULT_AVATAR = 'https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp';

        function isDefaultAvatar(url) {
            return url === DEFAULT_AVATAR || url.includes('logofavicon');
        }

        // ── Render grid ─────────────────────────────────────────────────
        const grid = document.getElementById('faculty-grid');
        let currentTab = 'gv';

        function renderGrid(type) {
            currentTab = type;
            const list = FACULTY_DATA[type];

            // Update counts
            document.getElementById('count-gv').textContent = FACULTY_DATA.gv.length;
            document.getElementById('count-cv').textContent = FACULTY_DATA.cv.length;
            const countUmefEl = document.getElementById('count-umef');
            if (countUmefEl) countUmefEl.textContent = FACULTY_DATA.umef.length;

            // Clear grid
            grid.innerHTML = '';

            if (!list || list.length === 0) {
                grid.innerHTML = '<div class="faculty-empty"><svg class="svg-icon fa-users-slash fa-solid" style="font-size:3rem;margin-bottom:16px;display:block;" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L440.6 320l178.1 0c11.8 0 21.3-9.6 21.3-21.3C640 239.8 592.2 192 533.3 192l-42.7 0c-15.9 0-31 3.5-44.6 9.7c1.3 7.2 1.9 14.7 1.9 22.3c0 30.2-10.5 58-28 79.9l-25.2-19.7C408.1 267.7 416 246.8 416 224c0-53-43-96-96-96c-31.1 0-58.7 14.8-76.3 37.7l-40.6-31.8c13-14.2 20.9-33.1 20.9-53.9c0-44.2-35.8-80-80-80C116.3 0 91.9 14.1 77.5 35.5L38.8 5.1zM106.7 192C47.8 192 0 239.8 0 298.7C0 310.4 9.6 320 21.3 320l213.3 0c.2 0 .4 0 .7 0c-20.6-18.2-35.2-42.8-40.8-70.8L121.8 192l-15.2 0zM261.3 352C187.7 352 128 411.7 128 485.3c0 14.7 11.9 26.7 26.7 26.7l330.7 0c10.5 0 19.5-6 23.9-14.8L324.9 352l-63.6 0zM512 160A80 80 0 1 0 512 0a80 80 0 1 0 0 160z"/></svg>Chưa có dữ liệu</div>';
                return;
            }

            list.forEach((person, idx) => {
                const card = document.createElement('div');
                card.className = 'faculty-card';
                card.setAttribute('role', 'listitem');
                card.setAttribute('tabindex', '0');
                card.style.animationDelay = `${Math.min(idx * 60, 600)}ms`;

                const hasRealAvatar = !isDefaultAvatar(person.avatar);

                card.innerHTML = `
                <div class="faculty-card-img-wrap">
                    ${hasRealAvatar
                        ? `<img src="${person.avatar}" alt="${person.name}" loading="lazy" decoding="async">`
                        : `<div class="faculty-avatar-placeholder"><svg class="svg-icon fa-user-tie fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7l131.7 0c0 0 0 0 .1 0l5.5 0 112 0 5.5 0c0 0 0 0 .1 0l131.7 0c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2L224 304l-19.7 0c-12.4 0-20.1 13.6-13.7 24.2z"/></svg></div>`
                    }
                </div>
                <div class="faculty-card-body">
                    <span class="faculty-card-tag">${person.tag}</span>
                    <div class="faculty-card-name">
                        ${person.name}
                        ${person.linkedin
                            ? `<a href="${person.linkedin}" target="_blank" rel="noopener noreferrer" class="faculty-card-linkedin" onclick="event.stopPropagation();" aria-label="LinkedIn Profile"><svg class="svg-icon fa-linkedin fa-brands" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg></a>`
                            : ''
                        }
                        ${person.website
                            ? `<a href="${person.website}" target="_blank" rel="noopener noreferrer" class="faculty-card-website" onclick="event.stopPropagation();" aria-label="Swiss UMEF Profile"><img src="/wp-content/uploads/external-migrated/images_b4d597a4.webp" alt="Swiss UMEF" class="faculty-card-website-icon"></a>`
                            : ''
                        }
                    </div>
                    <div class="faculty-card-job">${person.job}</div>
                </div>
            `;

                card.addEventListener('click', () => openModal(person));
                card.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openModal(person); }
                });

                grid.appendChild(card);
            });

            // Initialize mobile slider dots
            initMobileSliderDots();
        }

        function initMobileSliderDots() {
            let dotsContainer = document.getElementById('faculty-slider-dots');
            if (!dotsContainer) {
                dotsContainer = document.createElement('div');
                dotsContainer.id = 'faculty-slider-dots';
                dotsContainer.className = 'slider-dots';
                grid.parentNode.insertBefore(dotsContainer, grid.nextSibling);
            }
            dotsContainer.innerHTML = '';

            const cards = grid.querySelectorAll('.faculty-card');
            if (cards.length === 0) return;

            cards.forEach((_, idx) => {
                const dot = document.createElement('span');
                dot.className = `slider-dot ${idx === 0 ? 'active' : ''}`;
                dotsContainer.appendChild(dot);
            });

            grid.removeEventListener('scroll', handleGridScroll);
            grid.addEventListener('scroll', handleGridScroll);

            // Reset scroll position on switch tab
            grid.scrollLeft = 0;
        }

        function handleGridScroll() {
            const dotsContainer = document.getElementById('faculty-slider-dots');
            if (!dotsContainer) return;
            const scrollLeft = grid.scrollLeft;
            const firstCard = grid.querySelector('.faculty-card');
            if (!firstCard) return;
            const cardWidth = firstCard.offsetWidth + 16; // width + gap
            const activeIndex = Math.round(scrollLeft / cardWidth);

            const dots = dotsContainer.querySelectorAll('.slider-dot');
            dots.forEach((dot, idx) => {
                if (idx === activeIndex) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        }

        // ── Modal ────────────────────────────────────────────────────────
        const overlay = document.getElementById('faculty-modal-overlay');
        const modalEl = document.getElementById('faculty-modal');
        const modalClose = document.getElementById('modal-close');

        function openModal(person) {
            const hasRealAvatar = !isDefaultAvatar(person.avatar);

            // Target: INSIDE .faculty-modal-cover so avatar is fully visible
            const cover = document.querySelector('.faculty-modal-cover');

            // Remove old avatar/placeholder/name elements from cover
            cover.querySelectorAll('.faculty-modal-avatar, .faculty-modal-avatar-placeholder, .faculty-modal-cover-name').forEach(el => el.remove());

            // Insert avatar inside cover
            if (hasRealAvatar) {
                const img = document.createElement('img');
                img.className = 'faculty-modal-avatar';
                img.id = 'modal-avatar';
                img.src = person.avatar;
                img.alt = person.name;
                cover.appendChild(img);
            } else {
                const ph = document.createElement('div');
                ph.className = 'faculty-modal-avatar-placeholder';
                ph.id = 'modal-avatar-placeholder';
                ph.innerHTML = '<svg class="svg-icon fa-user-tie fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7l131.7 0c0 0 0 0 .1 0l5.5 0 112 0 5.5 0c0 0 0 0 .1 0l131.7 0c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2L224 304l-19.7 0c-12.4 0-20.1 13.6-13.7 24.2z"/></svg>';
                cover.appendChild(ph);
            }

            // Name shown inside cover
            const coverName = document.createElement('div');
            coverName.className = 'faculty-modal-cover-name';
            coverName.innerHTML = `
                ${person.name}
                ${person.linkedin
                    ? `<a href="${person.linkedin}" target="_blank" rel="noopener noreferrer" class="faculty-modal-linkedin" aria-label="LinkedIn Profile"><svg class="svg-icon fa-linkedin fa-brands" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg></a>`
                    : ''
                }
                ${person.website
                    ? `<a href="${person.website}" target="_blank" rel="noopener noreferrer" class="faculty-modal-website" aria-label="Swiss UMEF Profile"><img src="/wp-content/uploads/external-migrated/images_b4d597a4.webp" alt="Swiss UMEF" class="faculty-modal-website-icon"></a>`
                    : ''
                }
            `;
            cover.appendChild(coverName);

            document.getElementById('modal-tag').innerHTML = `<svg class="svg-icon fa-certificate fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M211 7.3C205 1 196-1.4 187.6 .8s-14.9 8.9-17.1 17.3L154.7 80.6l-62-17.5c-8.4-2.4-17.4 0-23.5 6.1s-8.5 15.1-6.1 23.5l17.5 62L18.1 170.6c-8.4 2.1-15 8.7-17.3 17.1S1 205 7.3 211l46.2 45L7.3 301C1 307-1.4 316 .8 324.4s8.9 14.9 17.3 17.1l62.5 15.8-17.5 62c-2.4 8.4 0 17.4 6.1 23.5s15.1 8.5 23.5 6.1l62-17.5 15.8 62.5c2.1 8.4 8.7 15 17.1 17.3s17.3-.2 23.4-6.4l45-46.2 45 46.2c6.1 6.2 15 8.7 23.4 6.4s14.9-8.9 17.1-17.3l15.8-62.5 62 17.5c8.4 2.4 17.4 0 23.5-6.1s8.5-15.1 6.1-23.5l-17.5-62 62.5-15.8c8.4-2.1 15-8.7 17.3-17.1s-.2-17.4-6.4-23.4l-46.2-45 46.2-45c6.2-6.1 8.7-15 6.4-23.4s-8.9-14.9-17.3-17.1l-62.5-15.8 17.5-62c2.4-8.4 0-17.4-6.1-23.5s-15.1-8.5-23.5-6.1l-62 17.5L341.4 18.1c-2.1-8.4-8.7-15-17.1-17.3S307 1 301 7.3L256 53.5 211 7.3z"/></svg> ${person.tag}`;
            document.getElementById('modal-name').textContent = person.name; // hidden via CSS but kept for a11y
            document.getElementById('modal-job').textContent = person.job;

            const desList = document.getElementById('modal-des');
            const desTitle = document.getElementById('modal-des-title');
            desList.innerHTML = '';

            if (person.des && person.des.length > 0) {
                desTitle.style.display = '';
                desList.style.display = '';
                person.des.forEach(line => {
                    const li = document.createElement('li');
                    li.innerHTML = `<svg class="svg-icon fa-check-circle fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg><span>${line}</span>`;
                    desList.appendChild(li);
                });
            } else {
                desTitle.style.display = 'none';
                desList.style.display = 'none';
            }

            overlay.classList.add('open');
            document.body.style.overflow = 'hidden';
            modalEl.scrollTop = 0;
        }

        function closeModal() {
            overlay.classList.remove('open');
            document.body.style.overflow = '';
        }

        modalClose.addEventListener('click', closeModal);
        overlay.addEventListener('click', (e) => { if (e.target === overlay) closeModal(); });
        document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeModal(); });

        // ── Tabs ─────────────────────────────────────────────────────────
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.tab-btn').forEach(b => {
                    b.classList.remove('active');
                    b.setAttribute('aria-selected', 'false');
                });
                btn.classList.add('active');
                btn.setAttribute('aria-selected', 'true');
                renderGrid(btn.dataset.tab);
            });
        });

        // ── Initial render ───────────────────────────────────────────────
        renderGrid('gv');

        // ── Parallax hero ────────────────────────────────────────────────
        const heroBg = document.getElementById('faculty-parallax-bg');
        if (heroBg) {
            let ticking = false;
            window.addEventListener('scroll', () => {
                if (!ticking) {
                    requestAnimationFrame(() => {
                        const scrollY = window.scrollY;
                        const heroH = document.getElementById('faculty-hero-top').offsetHeight;
                        if (scrollY < heroH + 200) {
                            const pct = scrollY / heroH;
                            heroBg.style.transform = `translate3d(0, ${scrollY * 0.35}px, 0) scale(1.15)`;
                        }
                        ticking = false;
                    });
                    ticking = true;
                }
            }, { passive: true });
        }
    </script>

    <!-- Script.min.js for header scroll hide, mobile menu, lenis -->
    <?php
    $js_path = get_stylesheet_directory() . '/common-assets/js/script.min.js';
    $js_version = file_exists($js_path) ? filemtime($js_path) : time();
    ?>
    <script
        src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/script.min.js?v=<?php echo $js_version; ?>"
        defer></script>

    <?php get_footer(); ?>
</body>

</html>