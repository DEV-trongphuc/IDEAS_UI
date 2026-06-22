<?php
/**
 * The template for displaying the Events Timeline page
 * Template Name: Premium Events Timeline Template
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
    <link rel="preload" fetchpriority="high" as="image" href="https://ideas.edu.vn/wp-content/uploads/2025/11/z7168028016898_a6b3673704a0f8fead78c7cde0d0c719.webp" />
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php echo $is_en ? 'Events Timeline & Activities | IDEAS' : 'Dòng Sự Kiện &amp; Hoạt Động | IDEAS'; ?></title>
    <?php endif; ?>

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta name="description"
            content="<?php echo $is_en ? 'Follow outstanding activities, graduation ceremonies, scientific seminars, signings, and field trips of the IDEAS student community.' : 'Theo dõi các hoạt động nổi bật, lễ tốt nghiệp, buổi hội thảo khoa học, lễ ký kết và các chuyến đi thực tế của cộng đồng học viên IDEAS.'; ?>" />
    <?php endif; ?><?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $is_en ? 'Events Timeline & Activities – IDEAS' : 'Dòng Sự Kiện &amp; Hoạt Động – IDEAS'; ?>" />
        <meta property="og:description"
            content="<?php echo $is_en ? 'Review memorable events, academic milestones, and international practical activities of students and faculty at IDEAS.' : 'Xem lại các sự kiện đáng nhớ, cột mốc học thuật và các hoạt động thực tế quốc tế của học viên và giảng viên tại IDEAS.'; ?>" />
        <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2025/11/z7168028016898_a6b3673704a0f8fead78c7cde0d0c719.webp" />
        <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />
    <?php endif; ?><style>
        /* ══════════════════════════════════════
           EVENTS PAGE – PREMIUM LIGHT THEME
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
                radial-gradient(circle at 10% 20%, rgba(171, 14, 0, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 90% 70%, rgba(171, 14, 0, 0.04) 0%, transparent 45%),
                radial-gradient(rgba(15, 23, 42, 0.04) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 26px 26px;
            background-attachment: scroll, scroll, fixed;
        }

        /* ── Hero ──────────────────────────── */
        .events-hero {
            position: relative;
            padding: 165px 20px 105px;
            text-align: center;
            color: #ffffff;
            overflow: hidden;
            background: #0a0d14;
        }

        .events-hero-bg {
            position: absolute;
            top: -150px;
            left: -5%;
            width: 110%;
            height: calc(100% + 300px);
            background-size: cover;
            background-position: center 70%;
            will-change: transform;
            transform: translate3d(0, 0, 0) scale(1.15);
            z-index: 1;
            opacity: 0.35;
        }

        .events-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(180deg,
                    rgba(8, 10, 18, 0.82) 0%,
                    rgba(100, 8, 0, 0.45) 55%,
                    rgba(8, 10, 18, 0.90) 100%),
                radial-gradient(ellipse at 50% 70%, rgba(171, 14, 0, 0.35) 0%, transparent 65%);
        }

        .events-hero .container {
            position: relative;
            z-index: 3;
            max-width: 800px;
            margin: 0 auto;
        }

        .events-hero-badge {
            background: rgba(171, 14, 0, 0.15);
            border: 1px solid rgba(171, 14, 0, 0.4);
            padding: 8px 18px;
            border-radius: 100px;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.82rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 22px;
            backdrop-filter: blur(12px);
        }

        .events-hero h1 {
            font-size: clamp(2.6rem, 6vw, 4rem);
            font-weight: 800;
            margin-bottom: 20px;
            letter-spacing: -0.03em;
            line-height: 1.15;
            color: #ffffff;
            text-shadow: 0 2px 20px rgba(0, 0, 0, 0.4);
        }

        .events-hero h1 span {
            background: linear-gradient(135deg, #ff4444 0%, #ab0e00 60%, #ff3030 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .events-hero p {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.72);
            max-width: 640px;
            margin: 0 auto;
            line-height: 1.7;
        }

        /* ── Main content area ─────────────── */
        .events-section {
            max-width: 1280px;
            margin: 0 auto;
            padding: 60px 20px 100px;
        }

        /* ── Categories filter tabs bar ────── */
        .events-filter-bar {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 50px;
            position: relative;
            z-index: 10;
        }

        .filter-btn {
            background: #ffffff;
            color: #4b5563;
            border: 1px solid #e2e8f0;
            padding: 11px 26px;
            border-radius: 100px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
            font-family: inherit;
        }

        .filter-btn:hover {
            color: #ab0e00;
            border-color: rgba(171, 14, 0, 0.3);
            background: #fffafa;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
        }

        .filter-btn.active {
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff;
            border-color: #ab0e00;
            box-shadow: 0 5px 16px rgba(171, 14, 0, 0.32);
        }

        /* ── Event cards grid ──────────────── */
        .events-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        /* Centering grid elements & responsive width */
        .event-card {
            flex: 0 0 380px;
            max-width: 380px;
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
            display: flex;
            flex-direction: column;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            text-decoration: none;
            color: inherit;
        }

        @media (max-width: 768px) {
            .events-hero {
                padding: 120px 16px 45px !important;
            }

            .events-hero p {
                color: rgba(255, 255, 255, 0.9) !important;
                font-size: 0.95rem !important;
                line-height: 1.6 !important;
            }

            .events-section {
                padding: 40px 16px 60px !important;
            }

            .events-grid {
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
                margin-left: -16px;
                margin-right: -16px;
                padding-left: 16px;
                padding-right: 16px;
            }

            .events-grid::-webkit-scrollbar {
                display: none !important;
                /* Chrome/Safari */
            }

            .event-card {
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

        .event-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 50px rgba(15, 23, 42, 0.08), 0 0 0 1px rgba(171, 14, 0, 0.15);
            border-color: rgba(171, 14, 0, 0.35);
        }

        /* Red gradient top outline */
        .event-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #8c1000, #ab0e00, #ff4d4d, #ab0e00, #8c1000);
            z-index: 5;
        }

        /* Cover wrap */
        .event-card-img-wrap {
            position: relative;
            aspect-ratio: 16 / 9;
            overflow: hidden;
            background: #f1f5f9;
        }

        .event-card-img-wrap::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60px;
            background: linear-gradient(to top, rgba(171, 14, 0, 0.08), transparent);
            z-index: 2;
        }

        .event-card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .event-card:hover .event-card-img-wrap img {
            transform: scale(1.05);
        }

        /* Category badge inside cover */
        .event-card-tag {
            position: absolute;
            top: 16px;
            left: 16px;
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 100px;
            box-shadow: 0 4px 10px rgba(171, 14, 0, 0.3);
            z-index: 3;
            letter-spacing: 0.02em;
        }

        /* Card Content Body */
        .event-card-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .event-card-date {
            font-size: 0.82rem;
            font-weight: 700;
            color: #ab0e00;
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .event-card-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: #111827;
            line-height: 1.45;
            margin: 0 0 16px 0;
            transition: color 0.3s ease;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 2.9em;
        }

        .event-card:hover .event-card-title {
            color: #ab0e00;
        }

        /* Meta details */
        .event-meta-list {
            display: flex;
            flex-direction: column;
            gap: 9px;
            margin-bottom: 24px;
            border-top: 1px solid #f1f5f9;
            padding-top: 16px;
            flex-grow: 1;
        }

        .event-meta-item {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: 0.85rem;
            color: #4b5563;
            line-height: 1.45;
        }

        .event-meta-item i {
            color: #ab0e00;
            margin-top: 3px;
            width: 16px;
            flex-shrink: 0;
            text-align: center;
            font-size: 0.9rem;
        }

        .event-meta-item span {
            font-weight: 700;
            color: #6b7280;
            margin-right: 2px;
        }

        /* Card CTA */
        .event-card-cta {
            margin-top: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 700;
            color: #ab0e00;
            background: rgba(171, 14, 0, 0.05);
            border: 1px solid rgba(171, 14, 0, 0.15);
            transition: all 0.25s ease;
        }

        .event-card:hover .event-card-cta {
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff;
            border-color: #ab0e00;
            box-shadow: 0 4px 15px rgba(171, 14, 0, 0.2);
        }

        /* Empty message */
        .empty-grid-msg {
            text-align: center;
            padding: 60px 0;
            color: #6b7280;
            font-weight: 500;
            width: 100%;
        }

        /* Swiper / Swish animation elements */
        .event-card {
            animation: cardFadeIn 0.5s ease backwards;
        }

        @keyframes cardFadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ── Pagination ────────────────────── */
        .events-pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 50px;
        }

        .pagination-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 44px;
            height: 44px;
            padding: 0 14px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            background: #ffffff;
            color: #4b5563;
            font-weight: 700;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
            font-family: inherit;
        }

        .pagination-btn:hover {
            border-color: #ab0e00;
            color: #ab0e00;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .pagination-btn.active {
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            border-color: #ab0e00;
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(171, 14, 0, 0.25);
        }

        .pagination-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            pointer-events: none;
        }

        /* ── Mobile Custom Dropdown Filters ──────────────── */
        .events-mobile-filters {
            display: none;
        }

        @media (max-width: 768px) {
            .events-filter-bar {
                display: none !important;
            }

            .events-mobile-filters {
                display: flex;
                gap: 12px;
                margin-bottom: 32px;
                position: relative;
                z-index: 30;
            }

            .emf-dropdown {
                flex: 1;
                position: relative;
            }

            .emf-trigger {
                width: 100%;
                display: flex;
                align-items: center;
                gap: 8px;
                padding: 11px 13px;
                background: #ffffff;
                border: 1.5px solid #e2e8f0;
                border-radius: 14px;
                font-family: inherit;
                font-size: 0.82rem;
                font-weight: 600;
                color: #374151;
                cursor: pointer;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
                transition: all 0.25s ease;
                text-align: left;
                min-height: 46px;
            }

            .emf-trigger.open {
                border-color: rgba(171, 14, 0, 0.5);
                box-shadow: 0 0 0 3px rgba(171, 14, 0, 0.1), 0 4px 12px rgba(0, 0, 0, 0.06);
            }

            .emf-trigger-icon {
                color: #ab0e00;
                font-size: 0.8rem;
                flex-shrink: 0;
                width: 16px;
                text-align: center;
            }

            .emf-trigger-label {
                flex: 1;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                font-size: 0.82rem;
                line-height: 1.2;
            }

            .emf-trigger-label small {
                display: block;
                font-size: 0.68rem;
                font-weight: 500;
                color: #9ca3af;
                margin-bottom: 1px;
            }

            .emf-trigger-arrow {
                color: #9ca3af;
                font-size: 0.7rem;
                transition: transform 0.25s ease;
                flex-shrink: 0;
            }

            .emf-trigger.open .emf-trigger-arrow {
                transform: rotate(180deg);
                color: #ab0e00;
            }

            .emf-panel {
                position: absolute;
                top: calc(100% + 6px);
                left: 0;
                min-width: 100%;
                background: #ffffff;
                border: 1.5px solid #e9eef5;
                border-radius: 16px;
                box-shadow: 0 16px 48px rgba(15, 23, 42, 0.16), 0 4px 16px rgba(0, 0, 0, 0.06);
                overflow: hidden;
                opacity: 0;
                transform: translateY(-8px) scale(0.97);
                pointer-events: none;
                transition: opacity 0.22s ease, transform 0.22s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                z-index: 100;
            }

            .emf-panel.open {
                opacity: 1;
                transform: translateY(0) scale(1);
                pointer-events: auto;
            }

            .emf-option {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 13px 16px;
                font-size: 0.86rem;
                font-weight: 600;
                color: #374151;
                cursor: pointer;
                transition: all 0.18s ease;
                border-bottom: 1px solid #f8fafc;
                position: relative;
            }

            .emf-option:last-child {
                border-bottom: none;
            }

            .emf-option i {
                color: #9ca3af;
                font-size: 0.82rem;
                width: 16px;
                text-align: center;
                flex-shrink: 0;
                transition: color 0.18s ease;
            }

            .emf-option:hover {
                background: rgba(171, 14, 0, 0.04);
                color: #ab0e00;
            }

            .emf-option:hover i {
                color: #ab0e00;
            }

            .emf-option.active {
                background: linear-gradient(135deg, rgba(140, 16, 0, 0.07) 0%, rgba(171, 14, 0, 0.04) 100%);
                color: #ab0e00;
            }

            .emf-option.active i {
                color: #ab0e00;
            }

            .emf-option.active::after {
                content: '';
                position: absolute;
                right: 14px;
                width: 8px;
                height: 8px;
                background: #ab0e00;
                border-radius: 50%;
                box-shadow: 0 0 6px rgba(171, 14, 0, 0.4);
            }
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>


    <!-- Hero Area -->
    <section class="events-hero" id="events-hero-top">
        <div class="events-hero-bg" id="events-parallax-bg"
            style="background-image: url('https://ideas.edu.vn/wp-content/uploads/2025/11/z7168028016898_a6b3673704a0f8fead78c7cde0d0c719.webp');"></div>
        <div class="events-hero-overlay"></div>
        <div class="container">
            <div class="events-hero-badge">
                <svg class="svg-icon fa-calendar-days fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/></svg>
                IDEAS Events
            </div>
            <h1><?php echo $is_en ? 'Events <span>Timeline</span>' : 'Dòng <span>Sự Kiện</span>'; ?></h1>
            <div class="verify-slogan">
                <?php echo $is_en ? '"Original Knowledge - Local Companionship"' : '"Tri thức Nguyên bản - Đồng hành Bản địa"'; ?>
            </div>

            <p><?php echo $is_en ? 'Discover recent practical highlights, prestigious graduation ceremonies, academic seminars, and international study tours.' : 'Khám phá các hoạt động thực tế nổi bật gần đây, lễ tốt nghiệp danh giá, các buổi hội thảo khoa học và các chuyến đi kiến tập thực tế.'; ?></p>
        </div>
    </section>

    <!-- Main Section -->
    <main class="events-section">
        <!-- Filter Tabs Bar (desktop) -->
        <div class="events-filter-bar">
            <button class="filter-btn active" data-filter="TẤT CẢ"><?php echo $is_en ? 'ALL' : 'TẤT CẢ'; ?></button>
            <button class="filter-btn" data-filter="Workshop">Workshop</button>
            <button class="filter-btn" data-filter="Lễ tốt nghiệp"><?php echo $is_en ? 'Graduation' : 'Lễ tốt nghiệp'; ?></button>
            <button class="filter-btn" data-filter="Chuyến đi"><?php echo $is_en ? 'Study Tours' : 'Chuyến đi'; ?></button>
            <button class="filter-btn" data-filter="Khác"><?php echo $is_en ? 'Others' : 'Khác'; ?></button>
        </div>

        <!-- Mobile Dropdown Filters -->
        <div class="events-mobile-filters" id="events-mobile-filters">
            <!-- Category Dropdown -->
            <div class="emf-dropdown" id="emf-cat-wrap">
                <button class="emf-trigger" id="emf-cat-trigger" aria-haspopup="listbox" aria-expanded="false">
                    <span class="emf-trigger-icon"><svg class="svg-icon fa-tag fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 80L0 229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7L48 32C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg></span>
                    <span class="emf-trigger-label">
                        <small><?php echo $is_en ? 'Event Type' : 'Loại sự kiện'; ?></small>
                        <span id="emf-cat-label"><?php echo $is_en ? 'All' : 'Tất cả'; ?></span>
                    </span>
                    <span class="emf-trigger-arrow"><svg class="svg-icon fa-chevron-down fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg></span>
                </button>
                <div class="emf-panel" id="emf-cat-panel" role="listbox">
                    <div class="emf-option active" data-value="TẤT CẢ" role="option"><svg class="svg-icon fa-layer-group fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z"/></svg><?php echo $is_en ? 'All' : 'Tất cả'; ?></div>
                    <div class="emf-option" data-value="Workshop" role="option"><svg class="svg-icon fa-chalkboard-user fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M160 64c0-35.3 28.7-64 64-64L576 0c35.3 0 64 28.7 64 64l0 288c0 35.3-28.7 64-64 64l-239.2 0c-11.8-25.5-29.9-47.5-52.4-64l99.6 0 0-32c0-17.7 14.3-32 32-32l64 0c17.7 0 32 14.3 32 32l0 32 64 0 0-288L224 64l0 49.1C205.2 102.2 183.3 96 160 96l0-32zm0 64a96 96 0 1 1 0 192 96 96 0 1 1 0-192zM133.3 352l53.3 0C260.3 352 320 411.7 320 485.3c0 14.7-11.9 26.7-26.7 26.7L26.7 512C11.9 512 0 500.1 0 485.3C0 411.7 59.7 352 133.3 352z"/></svg>Workshop</div>
                    <div class="emf-option" data-value="Lễ tốt nghiệp" role="option"><svg class="svg-icon fa-graduation-cap fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg><?php echo $is_en ? 'Graduation' : 'Lễ tốt nghiệp'; ?></div>
                    <div class="emf-option" data-value="Chuyến đi" role="option"><svg class="svg-icon fa-plane fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M482.3 192c34.2 0 93.7 29 93.7 64c0 36-59.5 64-93.7 64l-116.6 0L265.2 495.9c-5.7 10-16.3 16.1-27.8 16.1l-56.2 0c-10.6 0-18.3-10.2-15.4-20.4l49-171.6L112 320 68.8 377.6c-3 4-7.8 6.4-12.8 6.4l-42 0c-7.8 0-14-6.3-14-14c0-1.3 .2-2.6 .5-3.9L32 256 .5 145.9c-.4-1.3-.5-2.6-.5-3.9c0-7.8 6.3-14 14-14l42 0c5 0 9.8 2.4 12.8 6.4L112 192l102.9 0-49-171.6C162.9 10.2 170.6 0 181.2 0l56.2 0c11.5 0 22.1 6.2 27.8 16.1L365.7 192l116.6 0z"/></svg><?php echo $is_en ? 'Study Tours' : 'Chuyến đi'; ?></div>
                    <div class="emf-option" data-value="Khác" role="option"><svg class="svg-icon fa-ellipsis fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z"/></svg><?php echo $is_en ? 'Others' : 'Khác'; ?></div>
                </div>
            </div>
            <!-- Year Dropdown -->
            <div class="emf-dropdown" id="emf-year-wrap">
                <button class="emf-trigger" id="emf-year-trigger" aria-haspopup="listbox" aria-expanded="false">
                    <span class="emf-trigger-icon"><svg class="svg-icon fa-calendar fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 32l0 32L48 64C21.5 64 0 85.5 0 112l0 48 448 0 0-48c0-26.5-21.5-48-48-48l-48 0 0-32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 32L160 64l0-32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192L0 192 0 464c0 26.5 21.5 48 48 48l352 0c26.5 0 48-21.5 48-48l0-272z"/></svg></span>
                    <span class="emf-trigger-label">
                        <small><?php echo $is_en ? 'Year' : 'Năm'; ?></small>
                        <span id="emf-year-label"><?php echo $is_en ? 'All' : 'Tất cả'; ?></span>
                    </span>
                    <span class="emf-trigger-arrow"><svg class="svg-icon fa-chevron-down fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg></span>
                </button>
                <div class="emf-panel" id="emf-year-panel" role="listbox">
                    <!-- Populated by JS -->
                </div>
            </div>
        </div>

        <!-- Cards Grid -->
        <div class="events-grid" id="events-grid-container">
            <!-- Rendered dynamically -->
        </div>

        <!-- Pagination -->
        <div class="events-pagination" id="events-pagination-container">
            <!-- Rendered dynamically -->
        </div>
    </main>

    <!-- EVENTS Data and Dynamic JS -->
    <script>
        if (typeof isEnMode === 'undefined') { var isEnMode = <?php echo $is_en ? 'true' : 'false'; ?>; }
        const EVENTS_EN = [
            {
                type: "IDEAS x GrowthVerse 2026",
                place: "SIHUB - Ho Chi Minh",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2026/04/recap_growverth.webp",
                for: "Swiss UMEF",
                name: "IDEAS",
                data: "21/04/2026",
                link: "https://www.facebook.com/share/p/18FBbmmySq/",
            },
            {
                type: "Webinar",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2026/06/webinar.png",
                for: "Swiss UMEF",
                name: "MSc AI",
                data: "18/04/2026",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid0LTM9ykp3UAi6J5M2fZJWaUYFoEYNprYNersCeBaf3mLuP3zVtDeSAMhMCtj954DZl",
            },
            {
                type: "Graduation Ceremony",
                place: "Ho Chi Minh City",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2026/01/ltn27122025.webp",
                for: "Swiss UMEF",
                name: "MBA/EMBA",
                data: "27/12/2025",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid034nzCDGcFVfz54M62b4Yod9iJ3mMx2eVNMXB33PpDeDSw6Xw1cZsH4oucpX2TogDcl?locale=vi_VN",
            },
            {
                type: "Graduation Ceremony",
                name: "MBA/EMBA/MSc AI",
                for: "Swiss UMEF",
                place: "Geneva - Switzerland",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/11/ltnumef10202501.webp",
                data: "29/10/2025",
                link: "http://ideas.edu.vn/chuyen-di-thang-10-2025",
            },
            {
                type: "Europe Tour",
                name: "Swiss UMEF",
                for: "Study tour combined with Graduation Ceremony",
                place: "France - Italy - Switzerland",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/11/z7168028016898_a6b3673704a0f8fead78c7cde0d0c719.webp",
                data: "25/10/2025",
                link: "http://ideas.edu.vn/chuyen-di-thang-10-2025",
            },
            {
                type: "VDCA Conference 2025",
                name: "MBA/EMBA/MSc/Top-up BBA",
                for: "Connecting Values & Spreading Knowledge",
                place: "VDCA Conference",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/10/en2810.webp",
                data: "28/10/2025",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid02SX1tkwi6jWnjGh8FD1AJE2fy6YQxj29sD4s7V4U5xuqv8VWeqfKE5H5bygm85jCPl",
            },
            {
                type: "Orientation",
                name: "MSc AI",
                for: "Swiss UMEF",
                place: "Online - ZOOM",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/image-1-1.webp",
                data: "02/10/2025",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid065RLK6SL5N2pYzL2WwwREMW24HSM9etC6BETHMJrYUvrgWLsWL6t5y4x8gXLBi4sl",
            },
            {
                type: "Workshop - Coffee Talk",
                name: " AI in Learning - From Local to Global",
                for: "Everyone",
                place: "LYNK.THE VIBES - HCMC",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/08/wsoff16_8.webp",
                data: "16/08/2025",
                link: "https://ideas.edu.vn/workshop-ai-in-learning-from-local-to-global",
            },
            {
                type: "Graduation Ceremony",
                name: "Global MBA - DBA",
                for: "Ascencia Business School",
                place: "Eden Star Hotel - HCMC",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/07/ltn72025.webp",
                data: "26/07/2025",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid02D6QV6Lwqbk6PWN3ToipRQJ3jV9AkFV9FcnAqQwsdf9wVBdNkHr5bHWaKPJtGojf2l?locale=vi_VN",
            },
            {
                type: "Graduation Ceremony",
                name: "Global MBA - DBA",
                for: "Ascencia Business School",
                place: "Paris - France",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp",
                data: "02/07/2025",
                link: "https://www.linkedin.com/posts/college-de-paris-internationall_graduationceremony-collegedeparis-internationalstudents-activity-7351534584573902848-Aohn?utm_source=social_share_send&utm_medium=member_desktop_web&rcm=ACoAAE2CO4QB8War1r8xRIr7DEuSqFi_aID5Gv8",
            },
            {
                type: "France - Switzerland Tour",
                name: "Ascencia Business School",
                for: "Study tour combined with Graduation Ceremony",
                place: "France - Switzerland",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/07/cdpts_2.webp",
                data: "30/06/2025",
                link: "https://ideas.edu.vn/chuyen-di-phap-thuy-si",
            },
            {
                type: "Workshop",
                name: "VIBE CODING - Build your own app with AI",
                for: "IDEAS Talk",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/06/WORSHOP-29-6-SIZE-16_9-870x570.webp",
                data: "29/06/2025",
                link: "https://www.youtube.com/watch?v=CXCDUKsU-0I",
            },
            {
                type: "Workshop",
                name: "Demystifying AI - Unveiling Untold Creative Methods",
                for: "IDEAS Talk",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/05/IDEAS-TALK-25-5-1.webp",
                data: "25/05/2025",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid04xb45shGBrNbYxHQwLdS6dmbpNmrQ7JGEabd7RoKghsJojm6UP7QegFETux1XsWol",
            },
            {
                type: "Graduation Ceremony",
                name: "Swiss UMEF",
                for: "UMEF awards degrees to Vietnamese students",
                place: "Geneva - Switzerland",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/05/ltnumef52025-1.webp",
                data: "06/05/2025",
                link: "https://ideas.edu.vn/chuyen-di-thuy-si",
            },
            {
                type: "Switzerland Tour",
                name: "Swiss UMEF",
                for: "Study tour combined with Graduation Ceremony",
                place: "Swiss UMEF - Geneva",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/05/umef-tour52025-8.webp",
                data: "04/05/2025",
                link: "https://ideas.edu.vn/chuyen-di-thuy-si",
            },
            {
                type: "Workshop",
                name: "Data Security in the AI Era: Challenges and Solutions",
                for: "IDEAS Talk",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/04/ws-16-9.webp",
                data: "20/04/2025",
                link: "https://ideas.edu.vn/bao-mat-du-lieu-trong-thoi-dai-ai-thach-thuc-va-giai-phap",
            },
            {
                type: "Workshop",
                name: "AI Applications in Omnichannel Customer Service",
                for: "IDEAS Talk",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/workshop233.webp",
                data: "23/03/2025",
                link: "https://www.youtube.com/watch?v=mB0mDrgjVNs",
            },
            {
                type: "Workshop",
                name: "The Convergence of AI & Semiconductor",
                for: "IDEAS Talk",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/sukethopai.webp",
                data: "09/03/2025",
                link: "https://www.youtube.com/watch?v=5cogIW22nFI",
            },
            {
                type: "Signing Ceremony",
                name: "Signing Ceremony between Estiam - IDEAS - TSSAC",
                for: "BBA & MBA",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/ShareImage-1.webp",
                data: "26/02/2025",
                link: "https://www.facebook.com/photo?fbid=1107390047854216&set=a.547436477182912",
            },
            {
                type: "Orientation",
                name: "Orientation",
                for: "MSc AI",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/image-1-1.webp",
                data: "16/02/2025",
                link: "https://www.facebook.com/ideas.edu.vn/videos/547173147650906",
            },
            {
                type: "Thesis Defense",
                name: "Thesis Defense Session",
                for: "DBA - Ascencia",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/IMG_8514.webp",
                data: "24/11/2024",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid035TAEqoZxxAPFMqeCf9FhwGb7a2Mt1pS38GHvsrFCNjMhLd5hGneXDavxSGBKHosil",
            },
            {
                type: "Graduation Ceremony",
                name: "Ascencia Business School",
                for: "Global MBA",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/11/8X1A9328-1-1.webp",
                data: "23/11/2024",
                link: "https://www.youtube.com/watch?si=gR-YOgFi2KQJftr9&v=hmVxOq5jkeM&feature=youtu.be",
            },
            {
                type: "Instruction",
                name: "UMEF Learning Platform Instruction Session",
                for: "IDEAS - Swiss UMEF",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/buoihuongdan-optimized.webp",
                data: "11/11/2024",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid02N7ZWkS7oXbCyta7gBob3mrtUUyftQWY9DiHxi7r3iXG9TuAQda8P41s1gx3ZbVx8l",
            },
            {
                type: "Graduation Ceremony",
                name: "Swiss UMEF",
                for: "MBA/EMBA",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/10/Totnghiepumef-optimized.webp",
                data: "26/10/2024",
                link: "https://www.youtube.com/watch?si=eJDfqKWc4HxT_TmS&v=fBf5YcaMxDY&feature=youtu.be",
            },
            {
                type: "Workshop - Offline",
                name: "Applying AI into Learning, Research and Career",
                for: "IDEAS Talk",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/workshopAI.webp",
                data: "26/10/2024",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid0v1oLG26bZKVR3551ikuTwrd2552LgxQqBv9YTtKRgakRe2nZf1WyKjfXi554s1gMl",
            },
            {
                type: "Orientation",
                name: "Ascencia Business School",
                for: "Global MBA",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/10/461779815_852230670439635_3180438795963466960_n.webp",
                data: "29/09/2024",
                link: "https://www.facebook.com/globalmba.collegedeparis/posts/pfbid0Wm4A4Jm42rgMAajQ31TSbp3jgyap1NrZEgJ8rWZh3yNciRePaUUr9Ay3dkGNbjrul",
            },
            {
                type: "Thesis Defense",
                name: "Ascencia Business School",
                for: "Global MBA",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/baoveluanvanglobalmba.webp",
                data: "08/09/2024",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid0PFdnFWGiTkKYKNgBEzVgv2M5RZqKRVyc9pZm1gKMoTbBgQGF7BJHQzsaMtD9df4kl",
            },
            {
                type: "Project Launch",
                name: "Applying AI to Business Operations",
                for: "IDEAS",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/08/Untitled-design.webp",
                data: "16/08/2024",
                link: "https://ideas.edu.vn/tin-tuc-moi/vien-ideas-khoi-dong-du-an-ung-dung-ai-vao-van-hanh.html",
            },
            {
                type: "Workshop - Seminar",
                name: "International MBA 5.0 Model",
                for: "IDEAS Talk",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/03/Hoi-thao-MBA-50-5.webp",
                data: "24/03/2024",
                link: "https://ideas.edu.vn/su-kien-moi/hoi-thao-mba-quoc-te-mo-thuc-5-0-do-vien-ideas-to-chuc-da-dien-ra-thanh-cong-va-khep-lai-day-cam-xuc.html",
            },
            {
                type: "Graduation Ceremony",
                name: "Ascencia Business School",
                for: "Global MBA/DBA",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/01/416256674_837845658141991_5379123310787471174_n.webp",
                data: "06/01/2024",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid02uRUWP7AE5ithsMRnvDcKhgLRUS5JTJzWofcoFQsnXPQPTtG9WogjihFvAPHLrNNKl",
            },
            {
                type: "Thesis Defense",
                name: "Doctoral Thesis Defense",
                for: "DBA - Ascencia",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/01/400944403_660729459589758_4740588263672831012_n.webp",
                data: "20/11/2024",
                link: "https://www.facebook.com/globalmba.collegedeparis/posts/pfbid02f2zzNXEJQts7XZ7kMMmAVw84Le2JgMKQGJg2NP7V2LvKG6QWpyBdFGYu2LSvq1tQl",
            },
            {
                type: "Workshop",
                name: "Networking Event with Swiss UMEF",
                for: "MBA/EMBA",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2023/07/umefws.webp",
                data: "18/06/2023",
                link: "https://www.facebook.com/embatructuyen/posts/pfbid0fzGmQrABPKxsS11VSwPqdL2jWkv9HvfSPsNo95foRDyPMHUDNt476R5UxdUzVdaxl",
            }
        ];
        const EVENTS_VI = [
            {
                type: "IDEAS x GrowthVerse 2026",
                place: "SIHUB - Hồ Chí Minh",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2026/04/recap_growverth.webp",
                for: "Swiss UMEF",
                name: "IDEAS",
                data: "21/04/2026",
                link: "https://www.facebook.com/share/p/18FBbmmySq/",
            },
            {
                type: "Webinar",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2026/06/webinar.png",
                for: "Swiss UMEF",
                name: "MSc AI",
                data: "18/04/2026",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid0LTM9ykp3UAi6J5M2fZJWaUYFoEYNprYNersCeBaf3mLuP3zVtDeSAMhMCtj954DZl",
            },
            {
                type: "Lễ tốt nghiệp",
                place: "Tp. Hồ Chí Minh",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2026/01/ltn27122025.webp",
                for: "Swiss UMEF",
                name: "MBA/EMBA",
                data: "27/12/2025",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid034nzCDGcFVfz54M62b4Yod9iJ3mMx2eVNMXB33PpDeDSw6Xw1cZsH4oucpX2TogDcl?locale=vi_VN",
            },
            {
                type: "Lễ tốt nghiệp",
                name: "MBA/EMBA/MSc AI",
                for: "Swiss UMEF",
                place: "Geneva - Thụy Sĩ",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/11/ltnumef10202501.webp",
                data: "29/10/2025",
                link: "http://ideas.edu.vn/chuyen-di-thang-10-2025",
            },
            {
                type: "Chuyến đi Châu Âu",
                name: "Swiss UMEF",
                for: "Chuyến đi kết hợp với Lễ tốt nghiệp",
                place: "Pháp - Ý - Thụy Sĩ",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/11/z7168028016898_a6b3673704a0f8fead78c7cde0d0c719.webp",
                data: "25/10/2025",
                link: "http://ideas.edu.vn/chuyen-di-thang-10-2025",
            },
            {
                type: "VDCA Conference 2025",
                name: "MBA/EMBA/MSc/Top-up BBA",
                for: "Kết nối giá trị & lan tỏa tri thức",
                place: "VDCA Conference",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/10/en2810.webp",
                data: "28/10/2025",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid02SX1tkwi6jWnjGh8FD1AJE2fy6YQxj29sD4s7V4U5xuqv8VWeqfKE5H5bygm85jCPl",
            },
            {
                type: "Orientation",
                name: "MSc AI",
                for: "Swiss UMEF",
                place: "Online - ZOOM",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/image-1-1.webp",
                data: "02/10/2025",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid065RLK6SL5N2pYzL2WwwREMW24HSM9etC6BETHMJrYUvrgWLsWL6t5y4x8gXLBi4sl",
            },
            {
                type: "Workshop - Coffee Talk",
                name: " AI in Learning - From Local to Global",
                for: "Everyone",
                place: "LYNK.THE VIBES - TP. HCM",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/08/wsoff16_8.webp",
                data: "16/08/2025",
                link: "https://ideas.edu.vn/workshop-ai-in-learning-from-local-to-global",
            },
            {
                type: "Lễ tốt nghiệp",
                name: "Global MBA - DBA",
                for: "Ascencia Business School",
                place: "Eden Star Hotel- Hồ Chí Minh",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/07/ltn72025.webp",
                data: "26/07/2025",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid02D6QV6Lwqbk6PWN3ToipRQJ3jV9AkFV9FcnAqQwsdf9wVBdNkHr5bHWaKPJtGojf2l?locale=vi_VN",
            },
            {
                type: "Lễ tốt nghiệp",
                name: "Global MBA - DBA",
                for: "Ascencia Business School",
                place: "Paris - Pháp",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp",
                data: "02/07/2025",
                link: "https://www.linkedin.com/posts/college-de-paris-internationall_graduationceremony-collegedeparis-internationalstudents-activity-7351534584573902848-Aohn?utm_source=social_share_send&utm_medium=member_desktop_web&rcm=ACoAAE2CO4QB8War1r8xRIr7DEuSqFi_aID5Gv8",
            },
            {
                type: "Chuyến đi Pháp - Thuỵ Sĩ",
                name: "Ascencia Business School",
                for: "Chuyến đi kết hợp với Lễ tốt nghiệp",
                place: "Pháp - Thuỵ Sĩ",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/07/cdpts_2.webp",
                data: "30/06/2025",
                link: "https://ideas.edu.vn/chuyen-di-phap-thuy-si",
            },
            {
                type: "Workshop",
                name: "VIBE CODING - Tự tạo ứng dụng bằng AI",
                for: "IDEAS Talk",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/06/WORSHOP-29-6-SIZE-16_9-870x570.webp",
                data: "29/06/2025",
                link: "https://www.youtube.com/watch?v=CXCDUKsU-0I",
            },
            {
                type: "Workshop",
                name: "Giải mã AI - Những phương thức sáng tạo chưa từng được tiết lộ",
                for: "IDEAS Talk",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/05/IDEAS-TALK-25-5-1.webp",
                data: "25/05/2025",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid04xb45shGBrNbYxHQwLdS6dmbpNmrQ7JGEabd7RoKghsJojm6UP7QegFETux1XsWol",
            },
            {
                type: "Lễ tốt nghiệp",
                name: "Swiss UMEF",
                for: "UMEF trao bằng cho học viên Việt Nam",
                place: "Geneva - Thuỵ Sĩ",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/05/ltnumef52025-1.webp",
                data: "06/05/2025",
                link: "https://ideas.edu.vn/chuyen-di-thuy-si",
            },
            {
                type: "Chuyến đi Thuỵ Sĩ",
                name: "Swiss UMEF",
                for: "Chuyến đi kết hợp với Lễ trao bằng",
                place: "Swiss UMEF - Geneva",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/05/umef-tour52025-8.webp",
                data: "04/05/2025",
                link: "https://ideas.edu.vn/chuyen-di-thuy-si",
            },
            {
                type: "Workshop",
                name: "Bảo mật dữ liệu trong thời đại AI: Thách thức và giải pháp",
                for: "IDEAS Talk",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/04/ws-16-9.webp",
                data: "20/04/2025",
                link: "https://ideas.edu.vn/bao-mat-du-lieu-trong-thoi-dai-ai-thach-thuc-va-giai-phap",
            },
            {
                type: "Workshop",
                name: "Ứng dụng AI chăm sóc khách hàng đa kênh",
                for: "IDEAS Talk",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/workshop233.webp",
                data: "23/03/2025",
                link: "https://www.youtube.com/watch?v=mB0mDrgjVNs",
            },
            {
                type: "Workshop",
                name: "Sự Kết Hợp AI & Semiconductor",
                for: "IDEAS Talk",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/sukethopai.webp",
                data: "09/03/2025",
                link: "https://www.youtube.com/watch?v=5cogIW22nFI",
            },
            {
                type: "Lễ ký kết",
                name: "Lễ ký kết giữa Estiam - IDEAS - TSSAC",
                for: "BBA & MBA",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/ShareImage-1.webp",
                data: "26/02/2025",
                link: "https://www.facebook.com/photo?fbid=1107390047854216&set=a.547436477182912",
            },
            {
                type: "Orientation",
                name: "Orientation",
                for: "MSc AI",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/image-1-1.webp",
                data: "16/02/2025",
                link: "https://www.facebook.com/ideas.edu.vn/videos/547173147650906",
            },
            {
                type: "Thesis Defense",
                name: "Buổi bảo vệ luận văn",
                for: "DBA - Ascencia",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/IMG_8514.webp",
                data: "24/11/2024",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid035TAEqoZxxAPFMqeCf9FhwGb7a2Mt1pS38GHvsrFCNjMhLd5hGneXDavxSGBKHosil",
            },
            {
                type: "Lễ tốt nghiệp",
                name: "Ascencia Business School",
                for: "Global MBA",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/11/8X1A9328-1-1.webp",
                data: "23/11/2024",
                link: "https://www.youtube.com/watch?si=gR-YOgFi2KQJftr9&v=hmVxOq5jkeM&feature=youtu.be",
            },
            {
                type: "Instruction",
                name: "Buổi hướng dẫn hệ thống học tập UMEF",
                for: "IDEAS - Swiss UMEF",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/buoihuongdan-optimized.webp",
                data: "11/11/2024",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid02N7ZWkS7oXbCyta7gBob3mrtUUyftQWY9DiHxi7r3iXG9TuAQda8P41s1gx3ZbVx8l",
            },
            {
                type: "Lễ tốt nghiệp",
                name: "Swiss UMEF",
                for: "MBA/EMBA",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/10/Totnghiepumef-optimized.webp",
                data: "26/10/2024",
                link: "https://www.youtube.com/watch?si=eJDfqKWc4HxT_TmS&v=fBf5YcaMxDY&feature=youtu.be",
            },
            {
                type: "Workshop - Offline",
                name: "Ứng dụng AI vào học tập, nghiên cứu và công việc",
                for: "IDEAS - Talk",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/workshopAI.webp",
                data: "26/10/2024",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid0v1oLG26bZKVR3551ikuTwrd2552LgxQqBv9YTtKRgakRe2nZf1WyKjfXi554s1gMl",
            },
            {
                type: "Orientation",
                name: "Ascencia Business School",
                for: "Global MBA",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/10/461779815_852230670439635_3180438795963466960_n.webp",
                data: "29/09/2024",
                link: "https://www.facebook.com/globalmba.collegedeparis/posts/pfbid0Wm4A4Jm42rgMAajQ31TSbp3jgyap1NrZEgJ8rWZh3yNciRePaUUr9Ay3dkGNbjrul",
            },
            {
                type: "Thesis Defense",
                name: "Ascencia Business School",
                for: "Global MBA",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/baoveluanvanglobalmba.webp",
                data: "08/09/2024",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid0PFdnFWGiTkKYKNgBEzVgv2M5RZqKRVyc9pZm1gKMoTbBgQGF7BJHQzsaMtD9df4kl",
            },
            {
                type: "Khởi động dự án",
                name: "Ứng dụng AI vào vận hành",
                for: "IDEAS",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/08/Untitled-design.webp",
                data: "16/08/2024",
                link: "https://ideas.edu.vn/tin-tuc-moi/vien-ideas-khoi-dong-du-an-ung-dung-ai-vao-van-hanh.html",
            },
            {
                type: "Workshop - Seminar",
                name: "MBA Quốc tế Mô thức 5.0",
                for: "IDEAS Talk",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/03/Hoi-thao-MBA-50-5.webp",
                data: "24/03/2024",
                link: "https://ideas.edu.vn/su-kien-moi/hoi-thao-mba-quoc-te-mo-thuc-5-0-do-vien-ideas-to-chuc-da-dien-ra-thanh-cong-va-khep-lai-day-cam-xuc.html",
            },
            {
                type: "Lễ tốt nghiệp",
                name: "Ascencia Business School",
                for: "Global MBA/DBA",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/01/416256674_837845658141991_5379123310787471174_n.webp",
                data: "06/01/2024",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid02uRUWP7AE5ithsMRnvDcKhgLRUS5JTJzWofcoFQsnXPQPTtG9WogjihFvAPHLrNNKl",
            },
            {
                type: "Thesis Defense",
                name: "Bảo vệ luận văn Tiến sĩ",
                for: "DBA - Ascencia",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/01/400944403_660729459589758_4740588263672831012_n.webp",
                data: "20/11/2024",
                link: "https://www.facebook.com/globalmba.collegedeparis/posts/pfbid02f2zzNXEJQts7XZ7kMMmAVw84Le2JgMKQGJg2NP7V2LvKG6QWpyBdFGYu2LSvq1tQl",
            },
            {
                type: "Workshop",
                name: "Buổi giao lưu với Swiss UMEF",
                for: "MBA/EMBA",
                place: "IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2023/07/umefws.webp",
                data: "18/06/2023",
                link: "https://www.facebook.com/embatructuyen/posts/pfbid0fzGmQrABPKxsS11VSwPqdL2jWkv9HvfSPsNo95foRDyPMHUDNt476R5UxdUzVdaxl",
            },
        ];

        const EVENTS = isEnMode ? EVENTS_EN : EVENTS_VI;

        const gridContainer = document.getElementById("events-grid-container");
        const paginationContainer = document.getElementById("events-pagination-container");
        const filterButtons = document.querySelectorAll(".events-filter-bar .filter-btn");

        const ITEMS_PER_PAGE = 15;
        let currentFilteredEvents = [...EVENTS];
        let currentPage = 1;
        let currentCategoryFilter = 'TẤT CẢ';
        let currentYearFilter = 'ALL';

        // Combined filter function
        const applyFilters = () => {
            let filtered = [...EVENTS];
            // Category
            if (currentCategoryFilter === 'Khác') {
                filtered = filtered.filter(e =>
                    !e.type.includes('Workshop') &&
                    !e.type.includes('Lễ tốt nghiệp') &&
                    !e.type.includes('Chuyến đi')
                );
            } else if (currentCategoryFilter !== 'TẤT CẢ') {
                filtered = filtered.filter(e => e.type.includes(currentCategoryFilter));
            }
            // Year
            if (currentYearFilter !== 'ALL') {
                filtered = filtered.filter(e => {
                    const parts = e.data.split('/');
                    return parts.length === 3 && parts[2] === currentYearFilter;
                });
            }
            currentFilteredEvents = filtered;
            currentPage = 1;
            displayEventsPage();
        };

        // Render page list & pagination buttons
        const displayEventsPage = () => {
            const list = currentFilteredEvents;
            if (list.length === 0) {
                gridContainer.innerHTML = `<p class="empty-grid-msg">${isEnMode ? 'No events found in this category.' : 'Không tìm thấy sự kiện nào trong danh mục này.'}</p>`;
                paginationContainer.innerHTML = "";
                return;
            }

            const totalPages = Math.ceil(list.length / ITEMS_PER_PAGE);
            if (currentPage > totalPages) currentPage = totalPages;
            if (currentPage < 1) currentPage = 1;

            const startIndex = (currentPage - 1) * ITEMS_PER_PAGE;
            const endIndex = startIndex + ITEMS_PER_PAGE;
            const pageItems = list.slice(startIndex, endIndex);

            // Render cards
            gridContainer.innerHTML = pageItems.map((event, idx) => {
                let categoryTag = isEnMode ? "Event" : "Sự kiện";
                if (event.type.includes("Workshop")) {
                    categoryTag = "Workshop";
                } else if (event.type.includes("Lễ tốt nghiệp") || event.type.includes("Graduation Ceremony")) {
                    categoryTag = isEnMode ? "Graduation" : "Tốt nghiệp";
                } else if (event.type.includes("Chuyến đi") || event.type.includes("Tour")) {
                    categoryTag = isEnMode ? "Study Tour" : "Chuyến đi";
                }

                const displayTitle = event.type.length > 70 ? event.type.substring(0, 67) + "..." : event.type;

                return `
                    <a href="${event.link}" target="_blank" class="event-card" style="animation-delay: ${idx * 40}ms">
                        <div class="event-card-img-wrap">
                            <span class="event-card-tag">${categoryTag}</span>
                            <img decoding="async" src="${event.avatar}" alt="${event.type}" loading="lazy" />
                        </div>
                        <div class="event-card-body">
                            <div class="event-card-date">
                                <svg class="svg-icon fa-calendar-days fa-regular" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/></svg>
                                <span>${event.data}</span>
                            </div>
                            <h3 class="event-card-title">${displayTitle}</h3>
                            <div class="event-meta-list">
                                <div class="event-meta-item">
                                    <svg class="svg-icon fa-graduation-cap fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
                                    <span>Chương trình:</span> ${event.name}
                                </div>
                                <div class="event-meta-item">
                                    <svg class="svg-icon fa-circle-nodes fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M418.4 157.9c35.3-8.3 61.6-40 61.6-77.9c0-44.2-35.8-80-80-80c-43.4 0-78.7 34.5-80 77.5L136.2 151.1C121.7 136.8 101.9 128 80 128c-44.2 0-80 35.8-80 80s35.8 80 80 80c12.2 0 23.8-2.7 34.1-7.6L259.7 407.8c-2.4 7.6-3.7 15.8-3.7 24.2c0 44.2 35.8 80 80 80s80-35.8 80-80c0-27.7-14-52.1-35.4-66.4l37.8-207.7zM156.3 232.2c2.2-6.9 3.5-14.2 3.7-21.7l183.8-73.5c3.6 3.5 7.4 6.7 11.6 9.5L317.6 354.1c-5.5 1.3-10.8 3.1-15.8 5.5L156.3 232.2z"/></svg>
                                    <span>Đối tác:</span> ${event.for}
                                </div>
                                <div class="event-meta-item">
                                    <svg class="svg-icon fa-location-dot fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                                    <span>Địa điểm:</span> ${event.place}
                                </div>
                            </div>
                            <div class="event-card-cta">
                                Xem chi tiết <svg class="svg-icon fa-arrow-up-right-from-square fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg>
                            </div>
                        </div>
                    </a>
                `;
            }).join("");

            // Render pagination buttons
            if (totalPages <= 1) {
                paginationContainer.innerHTML = "";
                return;
            }

            let paginationHTML = "";

            // Prev button
            paginationHTML += `
                <button class="pagination-btn" ${currentPage === 1 ? 'disabled' : ''} onclick="goToPage(${currentPage - 1})">
                    <svg class="svg-icon fa-chevron-left fa-solid" viewBox="0 0 320 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
                </button>
            `;

            // Number buttons
            for (let i = 1; i <= totalPages; i++) {
                paginationHTML += `
                    <button class="pagination-btn ${currentPage === i ? 'active' : ''}" onclick="goToPage(${i})">
                        ${i}
                    </button>
                `;
            }

            // Next button
            paginationHTML += `
                <button class="pagination-btn" ${currentPage === totalPages ? 'disabled' : ''} onclick="goToPage(${currentPage + 1})">
                    <svg class="svg-icon fa-chevron-right fa-solid" viewBox="0 0 320 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                </button>
            `;

            paginationContainer.innerHTML = paginationHTML;

            // Initialize mobile slider dots
            initMobileSliderDots();
        };

        function initMobileSliderDots() {
            let dotsContainer = document.getElementById('events-slider-dots');
            if (!dotsContainer) {
                dotsContainer = document.createElement('div');
                dotsContainer.id = 'events-slider-dots';
                dotsContainer.className = 'slider-dots';
                gridContainer.parentNode.insertBefore(dotsContainer, gridContainer.nextSibling);
            }
            dotsContainer.innerHTML = '';

            const cards = gridContainer.querySelectorAll('.event-card');
            if (cards.length === 0) return;

            cards.forEach((_, idx) => {
                const dot = document.createElement('span');
                dot.className = `slider-dot ${idx === 0 ? 'active' : ''}`;
                dotsContainer.appendChild(dot);
            });

            gridContainer.removeEventListener('scroll', handleGridScroll);
            gridContainer.addEventListener('scroll', handleGridScroll);

            // Reset scroll position on filter/page switch
            gridContainer.scrollLeft = 0;
        }

        function handleGridScroll() {
            const dotsContainer = document.getElementById('events-slider-dots');
            if (!dotsContainer) return;
            const scrollLeft = gridContainer.scrollLeft;
            const firstCard = gridContainer.querySelector('.event-card');
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

        // Go to page
        window.goToPage = (page) => {
            currentPage = page;
            displayEventsPage();

            // Scroll smoothly to start of filter bar
            const targetSection = document.querySelector('.events-filter-bar');
            if (targetSection) {
                if (window.lenis) {
                    window.lenis.scrollTo(targetSection, {
                        offset: -120,
                        duration: 1.2,
                        immediate: false
                    });
                } else {
                    window.scrollTo({
                        top: targetSection.offsetTop - 120,
                        behavior: 'smooth'
                    });
                }
            }
        };

        // Desktop button filter
        filterButtons.forEach(btn => {
            btn.addEventListener("click", function () {
                filterButtons.forEach(b => b.classList.remove("active"));
                this.classList.add("active");
                currentCategoryFilter = this.getAttribute("data-filter");
                applyFilters();
            });
        });

        // ── Mobile Dropdown Logic ─────────────────────────
        function setupEmfDropdown(triggerId, panelId, onSelect) {
            const trigger = document.getElementById(triggerId);
            const panel = document.getElementById(panelId);
            if (!trigger || !panel) return;

            trigger.addEventListener('click', (e) => {
                e.stopPropagation();
                const isOpen = panel.classList.contains('open');
                // Close all dropdowns
                document.querySelectorAll('.emf-panel').forEach(p => p.classList.remove('open'));
                document.querySelectorAll('.emf-trigger').forEach(t => {
                    t.classList.remove('open');
                    t.setAttribute('aria-expanded', 'false');
                });
                if (!isOpen) {
                    panel.classList.add('open');
                    trigger.classList.add('open');
                    trigger.setAttribute('aria-expanded', 'true');
                }
            });

            panel.querySelectorAll('.emf-option').forEach(opt => {
                opt.addEventListener('click', () => {
                    panel.querySelectorAll('.emf-option').forEach(o => o.classList.remove('active'));
                    opt.classList.add('active');
                    panel.classList.remove('open');
                    trigger.classList.remove('open');
                    trigger.setAttribute('aria-expanded', 'false');
                    onSelect(opt.dataset.value, opt.textContent.trim());
                });
            });
        }

        // Close dropdowns on outside click
        document.addEventListener('click', () => {
            document.querySelectorAll('.emf-panel').forEach(p => p.classList.remove('open'));
            document.querySelectorAll('.emf-trigger').forEach(t => {
                t.classList.remove('open');
                t.setAttribute('aria-expanded', 'false');
            });
        });

        // Initialize display
        document.addEventListener("DOMContentLoaded", () => {
            displayEventsPage();

            // Populate year dropdown from EVENTS data
            const years = [...new Set(EVENTS.map(e => {
                const parts = e.data.split('/');
                return parts.length === 3 ? parts[2] : null;
            }).filter(Boolean))].sort((a, b) => Number(b) - Number(a));

            const yearPanel = document.getElementById('emf-year-panel');
            if (yearPanel) {
                const allOpt = document.createElement('div');
                allOpt.className = 'emf-option active';
                allOpt.dataset.value = 'ALL';
                allOpt.setAttribute('role', 'option');
                allOpt.innerHTML = `<svg class="svg-icon fa-infinity fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 241.1C0 161 65 96 145.1 96c38.5 0 75.4 15.3 102.6 42.5L320 210.7l72.2-72.2C419.5 111.3 456.4 96 494.9 96C575 96 640 161 640 241.1l0 29.7C640 351 575 416 494.9 416c-38.5 0-75.4-15.3-102.6-42.5L320 301.3l-72.2 72.2C220.5 400.7 183.6 416 145.1 416C65 416 0 351 0 270.9l0-29.7zM274.7 256l-72.2-72.2c-15.2-15.2-35.9-23.8-57.4-23.8C100.3 160 64 196.3 64 241.1l0 29.7c0 44.8 36.3 81.1 81.1 81.1c21.5 0 42.2-8.5 57.4-23.8L274.7 256zm90.5 0l72.2 72.2c15.2 15.2 35.9 23.8 57.4 23.8c44.8 0 81.1-36.3 81.1-81.1l0-29.7c0-44.8-36.3-81.1-81.1-81.1c-21.5 0-42.2 8.5-57.4 23.8L365.3 256z"/></svg>${isEnMode ? 'All' : 'Tất cả'}`;
                yearPanel.appendChild(allOpt);
                years.forEach(yr => {
                    const opt = document.createElement('div');
                    opt.className = 'emf-option';
                    opt.dataset.value = yr;
                    opt.setAttribute('role', 'option');
                    opt.innerHTML = `<svg class="svg-icon fa-calendar-days fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/></svg>${yr}`;
                    yearPanel.appendChild(opt);
                });
            }

            // Wire up mobile dropdowns
            setupEmfDropdown('emf-cat-trigger', 'emf-cat-panel', (value, label) => {
                document.getElementById('emf-cat-label').textContent = label;
                currentCategoryFilter = value;
                // Sync desktop buttons
                filterButtons.forEach(b => {
                    b.classList.toggle('active', b.getAttribute('data-filter') === value);
                });
                applyFilters();
            });

            setupEmfDropdown('emf-year-trigger', 'emf-year-panel', (value, label) => {
                document.getElementById('emf-year-label').textContent = label;
                currentYearFilter = value;
                applyFilters();
            });

            // Check URL hash for direct category selection
            if (window.location.hash === "#chuyen-di") {
                const targetBtn = Array.from(filterButtons).find(btn => btn.getAttribute("data-filter") === "Chuyến đi");
                if (targetBtn) targetBtn.click();
            }
        });
    </script>

    <!-- Parallax Hero Background Scroll Handler -->
    <script>
        const heroBg = document.getElementById('events-parallax-bg');
        if (heroBg) {
            let ticking = false;
            window.addEventListener('scroll', function () {
                if (!ticking) {
                    requestAnimationFrame(function () {
                        const scrollY = window.scrollY;
                        const heroH = document.getElementById('events-hero-top').offsetHeight;
                        if (scrollY < heroH + 200) {
                            heroBg.style.transform = 'translate3d(0, ' + (scrollY * 0.35) + 'px, 0) scale(1.15)';
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

    <?php get_footer(); ?>
</body>

</html>