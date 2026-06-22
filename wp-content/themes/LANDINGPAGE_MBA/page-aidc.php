<?php
/**
 * The template for displaying AIDC & IDEAS Cooperation Events page
 * Template Name: Premium AIDC Events Template
 */
global $wp;

// Block unwanted old theme styles
ob_start(function ($html) {
    return preg_replace(
        '/<link[^>]+href=[\'"][^\'"]*LANDINGPAGE_MBA\/main\.css[^\'"]*[\'"][^>]*\/?>/',
        '<!-- [BLOCKED: LANDINGPAGE_MBA/main.css] -->',
        $html
    );
});
$is_en = (isset($_GET['lang']) && $_GET['lang'] === 'en');
$today = date('Y-m-d');

// Load events
$all_events = ideas_get_aidc_events();
$upcoming_events = [];
$past_events = [];

foreach ($all_events as $event) {
    if ($event['end_date'] >= $today) {
        $upcoming_events[] = $event;
    } else {
        $past_events[] = $event;
    }
}
?>
<!DOCTYPE html>
<html lang="<?php echo $is_en ? 'en' : 'vi'; ?>" prefix="og: https://ogp.me/ns#">

<head>
    <?php get_template_part('shared-head'); ?>

    <!-- Preload hero background or logos if needed -->
    <link rel="preload" fetchpriority="high" as="image" href="https://ideas.edu.vn/wp-content/uploads/2026/06/AIDC.webp" />

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php echo $is_en ? 'AIDC & IDEAS Cooperation Events | IDEAS' : 'Sự kiện Hợp tác AIDC & IDEAS | IDEAS'; ?></title>
        <meta name="description" content="<?php echo $is_en ? 'Discover seminars, workshops and academic training programs in AI and Data Center, co-organized by AIDC Vietnam and IDEAS.' : 'Khám phá các buổi hội thảo, chuyên đề và chương trình đào tạo học thuật về AI và Trung tâm dữ liệu phối hợp tổ chức bởi AIDC Việt Nam và IDEAS.'; ?>" />
    <?php endif; ?>

    <style>
        /* ══════════════════════════════════════
           AIDC COOPERATION PAGE – HYBRID DESIGN
           ══════════════════════════════════════ */
        html,
        body {
            overflow-x: clip !important;
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #080405; /* Default body dark, but content below hero is light */
        }

        /* ── Hero Section (Dark Theme like LMS) ──────────────────── */
        .aidc-hero {
            position: relative;
            padding: 165px 20px 90px;
            overflow: hidden;
            background: #080405;
            min-height: 480px;
            display: flex;
            align-items: center;
        }

        .aidc-hero-bg {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            will-change: transform;
            transform: scale(1.05);
            z-index: 1;
            opacity: 0.12;
            filter: blur(8px);
        }

        .aidc-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(180deg,
                    rgba(8, 4, 5, 0.92) 0%,
                    rgba(80, 6, 0, 0.28) 60%,
                    #080405 100%),
                radial-gradient(ellipse at 50% 50%, rgba(171, 14, 0, 0.2) 0%, transparent 70%);
        }

        .aidc-hero-container {
            position: relative;
            z-index: 3;
            max-width: 1100px;
            margin: 0 auto;
            width: 100%;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 40px;
            align-items: center;
        }

        @media (max-width: 992px) {
            .aidc-hero-container {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 30px;
            }
        }

        .aidc-hero-badge {
            background: rgba(171, 14, 0, 0.2);
            border: 1px solid rgba(255, 77, 77, 0.35);
            padding: 8px 22px;
            border-radius: 100px;
            color: #ffcccc;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
            backdrop-filter: blur(12px);
        }

        .aidc-hero h1 {
            font-size: clamp(2.4rem, 5vw, 3.6rem);
            font-weight: 800;
            margin-bottom: 20px;
            letter-spacing: -0.02em;
            line-height: 1.2;
            color: #ffffff !important;
        }

        .aidc-hero h1 span {
            background: linear-gradient(135deg, #ff8e8e 0%, #ff4f4f 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }

        .aidc-hero p {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.85) !important;
            max-width: 600px;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        /* ── Hero Cooperation Logos (AIDC x IDEAS Side-by-Side) ──────────────── */
        .aidc-hero-logos-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 30px;
            backdrop-filter: blur(12px);
            box-shadow:
                0 30px 60px rgba(0, 0, 0, 0.5),
                0 0 30px rgba(171, 14, 0, 0.15);
            transition: all 0.4s ease;
        }

        .aidc-hero-logos-container:hover {
            border-color: rgba(255, 59, 48, 0.35);
            transform: translateY(-4px);
            box-shadow:
                0 35px 70px rgba(0, 0, 0, 0.6),
                0 0 40px rgba(171, 14, 0, 0.25);
        }

        .logo-box {
            background: #11080a;
            border: 1.5px solid rgba(255, 255, 255, 0.08);
            padding: 16px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 150px;
            height: 95px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .logo-box img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .partnership-separator {
            font-size: 1.5rem;
            color: rgba(255, 255, 255, 0.4);
            font-weight: 300;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ── Light Theme Wrapper (Everything Below Hero) ──────────────────── */
        .aidc-light-wrap {
            background-color: #f8fafc;
            color: #1e293b;
            position: relative;
            z-index: 5;
            padding-top: 60px;
            padding-bottom: 20px;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        .aidc-main-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 20px 80px;
            position: relative;
        }

        .section-header {
            margin-bottom: 40px;
            position: relative;
        }

        .section-header h2 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.01em;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            position: relative;
        }

        .section-header h2::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 3px;
            background: #ab0e00;
            border-radius: 2px;
        }

        /* ── Events Grid & Cards ───────────── */
        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
            gap: 30px;
            margin-bottom: 70px;
        }

        @media (max-width: 480px) {
            .events-grid {
                grid-template-columns: 1fr;
            }
        }

        .event-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
        }

        .event-card.upcoming {
            border-color: #f1f5f9;
        }

        .event-card.upcoming:hover {
            transform: translateY(-8px);
            border-color: rgba(171, 14, 0, 0.25);
            box-shadow:
                0 20px 40px rgba(15, 23, 42, 0.08),
                0 0 20px rgba(171, 14, 0, 0.06);
        }

        .event-card.past {
            opacity: 0.9;
            border-color: #e2e8f0;
        }

        .event-card.past:hover {
            transform: translateY(-4px);
            border-color: #cbd5e1;
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.06);
            opacity: 1;
        }

        /* Premium fallback red gradient banner styling */
        .event-card-banner-fallback {
            position: relative;
            aspect-ratio: 16 / 9;
            background: linear-gradient(135deg, #800600 0%, #d32f2f 40%, #ff5252 70%, #ab0e00 100%);
            background-size: 300% 300%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            text-align: center;
            overflow: hidden;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            animation: fallbackGradientShift 8s ease infinite;
        }

        @keyframes fallbackGradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .event-card-banner-fallback::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, transparent 50%);
            z-index: 1;
            pointer-events: none;
            animation: fallbackLightSweep 8s infinite linear;
        }

        @keyframes fallbackLightSweep {
            0% { transform: translate(-20%, -20%); }
            50% { transform: translate(20%, 20%); }
            100% { transform: translate(-20%, -20%); }
        }

        .event-card-banner-fallback .grid-overlay {
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.08) 1px, transparent 1px);
            background-size: 24px 24px;
            pointer-events: none;
            z-index: 1;
            animation: fallbackGridPulse 4s infinite ease-in-out;
        }

        @keyframes fallbackGridPulse {
            0%, 100% { opacity: 0.45; }
            50% { opacity: 0.85; }
        }

        .event-card-banner-fallback .scan-line {
            position: absolute;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.6) 50%, rgba(255, 255, 255, 0) 100%);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.35);
            z-index: 2;
            opacity: 0.8;
            pointer-events: none;
            animation: fallbackScanMove 4s cubic-bezier(0.4, 0, 0.2, 1) infinite;
        }

        @keyframes fallbackScanMove {
            0% { top: 0%; }
            50% { top: 100%; }
            100% { top: 0%; }
        }

        .event-card-banner-fallback .banner-title-wrap {
            z-index: 3;
            background: rgba(15, 23, 42, 0.55);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 16px 20px;
            border-radius: 16px;
            width: 85%;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .event-card:hover .event-card-banner-fallback .banner-title-wrap {
            background: rgba(15, 23, 42, 0.65);
            border-color: rgba(255, 255, 255, 0.25);
            transform: scale(1.02);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35);
        }

        .event-card-banner-fallback .banner-title {
            font-size: 1.15rem;
            font-weight: 800;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: -0.01em;
            line-height: 1.35;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Card Image Cover */
        .event-img-wrap {
            position: relative;
            aspect-ratio: 16 / 9;
            overflow: hidden;
            background: #f1f5f9;
            border-bottom: 1px solid #f1f5f9;
        }

        .event-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .event-card:hover .event-img-wrap img {
            transform: scale(1.05);
        }

        .event-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            z-index: 3;
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            padding: 5px 12px;
            border-radius: 100px;
            letter-spacing: 0.05em;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }

        .event-badge.ongoing {
            background: #10b981;
            color: #ffffff;
            border: 1px solid rgba(16, 185, 129, 0.1);
        }

        .event-badge.upcoming-tag {
            background: #ef4444;
            color: #ffffff;
            border: 1px solid rgba(239, 68, 68, 0.1);
        }

        .event-badge.past-tag {
            background: #64748b;
            color: #ffffff;
            border: 1px solid rgba(100, 116, 139, 0.1);
        }

        /* Card Body */
        .event-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .event-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.4;
            margin: 0 0 12px 0;
            transition: color 0.3s ease;
        }

        .event-card:hover .event-title {
            color: #ab0e00;
        }

        .event-desc {
            font-size: 0.88rem;
            line-height: 1.6;
            color: #475569;
            margin-bottom: 20px;
            flex-grow: 1;
        }

        /* Card Meta List */
        .event-meta {
            list-style: none;
            padding: 0;
            margin: 0 0 24px 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
            border-top: 1px solid #f1f5f9;
            padding-top: 18px;
        }

        .event-meta-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 0.85rem;
            color: #475569;
            line-height: 1.4;
        }

        .event-meta-item svg {
            color: #ab0e00;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .event-meta-item strong {
            color: #1e293b;
            margin-right: 4px;
        }

        /* Card Action Buttons */
        .event-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: linear-gradient(135deg, #ab0e00 0%, #ff3b30 100%);
            color: #ffffff !important;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            padding: 12px 20px;
            border-radius: 12px;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(171, 14, 0, 0.2);
            transition: all 0.25s ease;
            text-align: center;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #c01000 0%, #ff5247 100%);
            box-shadow: 0 6px 20px rgba(171, 14, 0, 0.3);
            transform: translateY(-1px);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            color: #475569 !important;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            padding: 11px 20px;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.25s ease;
            text-align: center;
        }

        .btn-secondary:hover {
            background: #f1f5f9;
            border-color: #cbd5e1;
            color: #1e293b !important;
        }

        /* ── Cooperation Banner Box ────────── */
        .coop-summary-box {
            background: linear-gradient(135deg, rgba(171, 14, 0, 0.03) 0%, #ffffff 100%);
            border: 1px solid rgba(171, 14, 0, 0.15);
            border-radius: 28px;
            padding: 40px;
            display: flex;
            align-items: center;
            gap: 40px;
            margin-bottom: 70px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.03);
        }

        @media (max-width: 768px) {
            .coop-summary-box {
                flex-direction: column;
                text-align: center;
                padding: 30px 20px;
                gap: 24px;
            }
        }

        .coop-summary-logo {
            background: #ffffff;
            padding: 16px 28px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 160px;
            height: 80px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
            border: 1px solid #e2e8f0;
            flex-shrink: 0;
        }

        .coop-summary-logo img {
            max-height: 48px;
            max-width: 130px;
            object-fit: contain;
        }

        .coop-summary-text h3 {
            font-size: 1.35rem;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 12px 0;
        }

        .coop-summary-text p {
            font-size: 0.92rem;
            line-height: 1.6;
            color: #475569;
            margin: 0;
        }

        /* ── Empty Message ─────────────────── */
        .empty-grid-msg {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 20px;
            background: #ffffff;
            border: 1px dashed #cbd5e1;
            border-radius: 20px;
            color: #94a3b8;
            font-weight: 500;
            font-size: 0.95rem;
        }

        /* ── Swish Animation ───────────────── */
        .event-card {
            animation: cardFadeIn 0.6s cubic-bezier(0.165, 0.84, 0.44, 1) backwards;
        }

        @keyframes cardFadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>

    <!-- Hero Banner (Dark Theme) -->
    <section class="aidc-hero" id="aidc-hero-top">
        <div class="aidc-hero-bg" style="background-image: url('https://ideas.edu.vn/wp-content/uploads/2026/06/AIDC.webp');"></div>
        <div class="aidc-hero-overlay"></div>
        <div class="aidc-hero-container">
            <div class="aidc-hero-content">
                <span class="aidc-hero-badge">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="margin-top:-2px;"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7 h2v2z"/></svg>
                    <?php echo $is_en ? 'Strategic Partnership' : 'Hợp tác Chiến lược'; ?>
                </span>
                <h1>AIDC &amp; IDEAS <br><span><?php echo $is_en ? 'Cooperation Events' : 'Sự kiện Hợp tác'; ?></span></h1>
                <p>
                    <?php echo $is_en ? 'Promoting science, technology, AI, and advanced data center infrastructure research. We co-organize high-level workshops, seminars, and intensive academic programs for leaders and digital economy professionals in Vietnam.' : 'Thúc đẩy nghiên cứu khoa học, công nghệ, AI và hạ tầng trung tâm dữ liệu tiên tiến. Phối hợp tổ chức các buổi hội thảo chuyên đề cao cấp và chương trình đào tạo chuyên sâu dành cho nhà quản lý và chuyên gia kinh tế số tại Việt Nam.'; ?>
                </p>
                <a href="#events-main-section" class="btn-primary">
                    <?php echo $is_en ? 'View Events' : 'Khám phá sự kiện'; ?>
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" xmlns="http://www.w3.org/2000/svg"><path d="M19 14l-7 7m0 0l-7-7m7 7V3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>
            <!-- Dynamic Side-by-Side Logo block -->
            <div class="aidc-hero-logos-container">
                <div class="logo-box aidc-logo">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/AIDC.webp" alt="AIDC Logo" />
                </div>
                <div class="partnership-separator">
                    <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" xmlns="http://www.w3.org/2000/svg">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
                <div class="logo-box ideas-logo">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2025/05/ideas-02.webp" alt="IDEAS Logo" />
                </div>
            </div>
        </div>
    </section>

    <!-- Light Theme Wrapper -->
    <div class="aidc-light-wrap">
        <main class="aidc-main-section" id="events-main-section">

            <!-- Cooperation banner box -->
            <div class="coop-summary-box">
                <div class="coop-summary-logo">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2025/05/ideas-02.webp" alt="IDEAS Logo" />
                </div>
                <div class="coop-summary-text">
                    <h3><?php echo $is_en ? 'About AIDC &amp; IDEAS Cooperation' : 'Về chương trình hợp tác AIDC &amp; IDEAS'; ?></h3>
                    <p>
                        <?php echo $is_en ? 'The AI &amp; Data Center Club (AIDC Vietnam) collaborates with the Institute of Digital Economics &amp; Applied Sciences (IDEAS) to deliver a comprehensive learning ecosystem. Combining solid academic standards from international universities with practical domestic technological applications, we aim to shape the future of digital and agentic leaders.' : 'Tổ chức AI &amp; Data Center Club (AIDC Việt Nam) phối hợp cùng Viện Kinh tế số và Khoa học ứng dụng (IDEAS) mang lại hệ sinh thái học tập toàn diện. Kết hợp giữa tiêu chuẩn học thuật vững chắc từ các trường đại học quốc tế và thực tế ứng dụng công nghệ trong nước nhằm định hình thế hệ nhà lãnh đạo số tương lai.'; ?>
                    </p>
                </div>
            </div>

            <!-- Section: Active & Upcoming -->
            <div class="section-header">
                <h2>
                    <svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm-5-8h-4v4h4v-4z"/></svg>
                    <?php echo $is_en ? 'Upcoming &amp; Ongoing Programs' : 'Chương trình Đang &amp; Sắp diễn ra'; ?>
                </h2>
            </div>

            <div class="events-grid">
                <?php if (empty($upcoming_events)): ?>
                    <div class="empty-grid-msg">
                        <?php echo $is_en ? 'No upcoming events scheduled. Please check back later!' : 'Hiện tại chưa có sự kiện nào sắp diễn ra. Vui lòng quay lại sau!'; ?>
                    </div>
                <?php else: ?>
                    <?php foreach ($upcoming_events as $idx => $event): 
                        $delay = $idx * 0.1;
                        $is_ongoing = ($event['start_date'] <= $today && $event['end_date'] >= $today);
                        // Identify if the event is using the generic logo image
                        $is_default_image = (strpos($event['image'], 'AIDC.webp') !== false || empty($event['image']));
                    ?>
                        <article class="event-card upcoming" style="animation-delay: <?php echo $delay; ?>s;">
                            <?php if ($is_default_image): ?>
                                <!-- Premium red gradient banner fallback -->
                                <div class="event-card-banner-fallback">
                                    <div class="grid-overlay"></div>
                                    <div class="scan-line"></div>
                                    <span class="event-badge <?php echo $is_ongoing ? 'ongoing' : 'upcoming-tag'; ?>">
                                        <?php echo $is_ongoing ? ($is_en ? 'Ongoing' : 'Đang diễn ra') : ($is_en ? 'Upcoming' : 'Sắp diễn ra'); ?>
                                    </span>
                                    <div class="banner-title-wrap">
                                        <div class="banner-title"><?php echo esc_html($is_en ? $event['title'] : $event['title_vi']); ?></div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="event-img-wrap">
                                    <img src="<?php echo esc_url($event['image']); ?>" alt="<?php echo esc_attr($is_en ? $event['title'] : $event['title_vi']); ?>" loading="lazy" />
                                    <span class="event-badge <?php echo $is_ongoing ? 'ongoing' : 'upcoming-tag'; ?>">
                                        <?php echo $is_ongoing ? ($is_en ? 'Ongoing' : 'Đang diễn ra') : ($is_en ? 'Upcoming' : 'Sắp diễn ra'); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                            
                            <div class="event-body">
                                <!-- Render title only if not already shown inside fallback banner -->
                                <?php if (!$is_default_image): ?>
                                    <h3 class="event-title"><?php echo esc_html($is_en ? $event['title'] : $event['title_vi']); ?></h3>
                                <?php endif; ?>
                                
                                <p class="event-desc"><?php echo esc_html($is_en ? $event['desc'] : $event['desc_vi']); ?></p>
                                
                                <ul class="event-meta">
                                    <li class="event-meta-item">
                                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm3.3 14.3L11 13.5V7h1.5v5.8l3.7 2.2-.7 1.3z"/></svg>
                                        <strong><?php echo $is_en ? 'Date:' : 'Thời gian:'; ?></strong>
                                        <span><?php echo esc_html($is_en ? $event['date_str'] : $event['date_str_vi']); ?></span>
                                    </li>
                                    <li class="event-meta-item">
                                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                                        <strong><?php echo $is_en ? 'Location:' : 'Địa điểm:'; ?></strong>
                                        <span><?php echo esc_html($is_en ? $event['location'] : $event['location_vi']); ?></span>
                                    </li>
                                    <li class="event-meta-item">
                                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                        <strong><?php echo $is_en ? 'Open to:' : 'Đối tượng:'; ?></strong>
                                        <span><?php echo esc_html($is_en ? $event['open_to'] : $event['open_to_vi']); ?></span>
                                    </li>
                                </ul>

                                <div class="event-actions">
                                    <?php if (!empty($event['agenda_url'])): ?>
                                        <a href="<?php echo esc_url($event['agenda_url']); ?>" class="btn-primary" target="_blank" rel="noopener noreferrer">
                                            <?php echo $is_en ? 'Register Now' : 'Đăng ký ngay'; ?>
                                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91v6.27h2V9L12 3z"/></svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Section: Past Events -->
            <div class="section-header">
                <h2>
                    <svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/></svg>
                    <?php echo $is_en ? 'Past Events &amp; Workshops' : 'Sự kiện Đã diễn ra'; ?>
                </h2>
            </div>

            <div class="events-grid">
                <?php if (empty($past_events)): ?>
                    <div class="empty-grid-msg">
                        <?php echo $is_en ? 'No past events found.' : 'Không có sự kiện đã diễn ra nào.'; ?>
                    </div>
                <?php else: ?>
                    <?php foreach ($past_events as $idx => $event): 
                        $delay = $idx * 0.08;
                        $is_default_image = (strpos($event['image'], 'AIDC.webp') !== false || empty($event['image']));
                    ?>
                        <article class="event-card past" style="animation-delay: <?php echo $delay; ?>s;">
                            <?php if ($is_default_image): ?>
                                <!-- Premium red gradient banner fallback -->
                                <div class="event-card-banner-fallback">
                                    <div class="grid-overlay"></div>
                                    <div class="scan-line"></div>
                                    <span class="event-badge past-tag">
                                        <?php echo $is_en ? 'Concluded' : 'Đã kết thúc'; ?>
                                    </span>
                                    <div class="banner-title-wrap">
                                        <div class="banner-title"><?php echo esc_html($is_en ? $event['title'] : $event['title_vi']); ?></div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="event-img-wrap">
                                    <img src="<?php echo esc_url($event['image']); ?>" alt="<?php echo esc_attr($is_en ? $event['title'] : $event['title_vi']); ?>" loading="lazy" />
                                    <span class="event-badge past-tag">
                                        <?php echo $is_en ? 'Concluded' : 'Đã kết thúc'; ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                            
                            <div class="event-body">
                                <?php if (!$is_default_image): ?>
                                    <h3 class="event-title" style="font-size: 1.15rem;"><?php echo esc_html($is_en ? $event['title'] : $event['title_vi']); ?></h3>
                                <?php endif; ?>
                                
                                <p class="event-desc" style="font-size: 0.84rem;"><?php echo esc_html($is_en ? $event['desc'] : $event['desc_vi']); ?></p>
                                
                                <ul class="event-meta" style="margin-bottom: 18px; padding-top: 14px;">
                                    <li class="event-meta-item">
                                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm3.3 14.3L11 13.5V7h1.5v5.8l3.7 2.2-.7 1.3z"/></svg>
                                        <strong><?php echo $is_en ? 'Concluded date:' : 'Thời gian:'; ?></strong>
                                        <span><?php echo esc_html($is_en ? $event['date_str'] : $event['date_str_vi']); ?></span>
                                    </li>
                                    <li class="event-meta-item">
                                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                                        <strong><?php echo $is_en ? 'Location:' : 'Địa điểm:'; ?></strong>
                                        <span><?php echo esc_html($is_en ? $event['location'] : $event['location_vi']); ?></span>
                                    </li>
                                </ul>

                                <div class="event-actions" style="margin-top: auto;">
                                    <?php if (!empty($event['agenda_url'])): ?>
                                        <a href="<?php echo esc_url($event['agenda_url']); ?>" class="btn-secondary" target="_blank" rel="noopener noreferrer">
                                            <?php echo $is_en ? 'Review Details' : 'Xem lại thông tin'; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </main>
    </div>

    <!-- Shared Footer & Modals -->
    <?php get_footer(); ?>
</body>

</html>
