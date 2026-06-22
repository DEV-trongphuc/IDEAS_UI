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

    <!-- Preload hero image -->
    <link rel="preload" fetchpriority="high" as="image" href="https://ideas.edu.vn/wp-content/uploads/2026/06/AIDC.webp" />

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php echo $is_en ? 'AIDC & IDEAS Cooperation Events | IDEAS' : 'Sự kiện Hợp tác AIDC & IDEAS | IDEAS'; ?></title>
        <meta name="description" content="<?php echo $is_en ? 'Discover seminars, workshops and academic training programs in AI and Data Center, co-organized by AIDC Vietnam and IDEAS.' : 'Khám phá các buổi hội thảo, chuyên đề và chương trình đào tạo học thuật về AI và Trung tâm dữ liệu phối hợp tổ chức bởi AIDC Việt Nam và IDEAS.'; ?>" />
    <?php endif; ?>

    <style>
        /* ══════════════════════════════════════
           AIDC COOPERATION PAGE – PREMIUM DARK
           ══════════════════════════════════════ */
        html,
        body {
            overflow-x: clip !important;
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #080405;
            color: #f3f4f6;
            background-image:
                radial-gradient(circle at 10% 20%, rgba(185, 14, 0, 0.12) 0%, transparent 45%),
                radial-gradient(circle at 90% 70%, rgba(185, 14, 0, 0.08) 0%, transparent 45%),
                radial-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 28px 28px;
            background-attachment: scroll, scroll, fixed;
        }

        /* ── Hero Section ──────────────────── */
        .aidc-hero {
            position: relative;
            padding: 165px 20px 90px;
            overflow: hidden;
            background: transparent;
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
                    rgba(8, 4, 5, 0.90) 0%,
                    rgba(80, 6, 0, 0.25) 60%,
                    #080405 100%),
                radial-gradient(ellipse at 50% 50%, rgba(171, 14, 0, 0.15) 0%, transparent 70%);
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
            color: rgba(255, 255, 255, 0.8) !important;
            max-width: 600px;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        /* ── Hero Image Frame ──────────────── */
        .aidc-hero-img-wrap {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            border: 1.5px solid rgba(255, 255, 255, 0.08);
            box-shadow:
                0 30px 60px rgba(0, 0, 0, 0.7),
                0 0 30px rgba(171, 14, 0, 0.2);
            aspect-ratio: 16 / 10;
            background: #11080a;
            transition: all 0.4s ease;
        }

        .aidc-hero-img-wrap:hover {
            border-color: rgba(255, 59, 48, 0.4);
            transform: translateY(-5px);
            box-shadow:
                0 35px 70px rgba(0, 0, 0, 0.8),
                0 0 40px rgba(171, 14, 0, 0.3);
        }

        .aidc-hero-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* ── Main Layout Sections ──────────── */
        .aidc-main-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 20px 80px;
            position: relative;
            z-index: 5;
        }

        .section-header {
            margin-bottom: 40px;
            position: relative;
        }

        .section-header h2 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #ffffff;
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
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 24px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(12px);
        }

        .event-card.upcoming {
            border-color: rgba(255, 77, 77, 0.15);
        }

        .event-card.upcoming:hover {
            transform: translateY(-8px);
            border-color: rgba(255, 59, 48, 0.4);
            box-shadow:
                0 25px 50px rgba(0, 0, 0, 0.4),
                0 0 25px rgba(171, 14, 0, 0.25);
        }

        .event-card.past {
            opacity: 0.85;
        }

        .event-card.past:hover {
            transform: translateY(-4px);
            border-color: rgba(255, 255, 255, 0.15);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            opacity: 1;
        }

        /* Card Image Cover */
        .event-img-wrap {
            position: relative;
            aspect-ratio: 16 / 9;
            overflow: hidden;
            background: #150a0c;
        }

        .event-img-wrap::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(8, 4, 5, 0.6) 0%, transparent 60%);
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
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .event-badge.ongoing {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: #ffffff;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        .event-badge.upcoming-tag {
            background: linear-gradient(135deg, #ef4444 0%, #ab0e00 100%);
            color: #ffffff;
            border: 1px solid rgba(239, 68, 68, 0.3);
            box-shadow: 0 0 10px rgba(239, 68, 68, 0.3);
        }

        .event-badge.past-tag {
            background: rgba(255, 255, 255, 0.15);
            color: rgba(255, 255, 255, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.1);
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
            color: #ffffff;
            line-height: 1.4;
            margin: 0 0 12px 0;
            transition: color 0.3s ease;
        }

        .event-card:hover .event-title {
            color: #ff6b6b;
        }

        .event-desc {
            font-size: 0.88rem;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.65);
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
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            padding-top: 18px;
        }

        .event-meta-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 0.82rem;
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.4;
        }

        .event-meta-item svg {
            color: #ff4d4d;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .event-meta-item strong {
            color: #ffffff;
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
            box-shadow: 0 4px 15px rgba(171, 14, 0, 0.25);
            transition: all 0.25s ease;
            text-align: center;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #c01000 0%, #ff5247 100%);
            box-shadow: 0 6px 20px rgba(171, 14, 0, 0.4);
            transform: translateY(-1px);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.9) !important;
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
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.15);
            color: #ffffff !important;
        }

        .social-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
        }

        .btn-social {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            font-size: 0.78rem;
            font-weight: 700;
            padding: 9px 12px;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.25s ease;
        }

        .btn-social.zalo {
            background: rgba(0, 104, 255, 0.1);
            border: 1px solid rgba(0, 104, 255, 0.2);
            color: #7ab3ff !important;
        }

        .btn-social.zalo:hover {
            background: rgba(0, 104, 255, 0.2);
            border-color: rgba(0, 104, 255, 0.4);
            color: #ffffff !important;
        }

        .btn-social.whatsapp {
            background: rgba(37, 211, 102, 0.1);
            border: 1px solid rgba(37, 211, 102, 0.2);
            color: #79f29d !important;
        }

        .btn-social.whatsapp:hover {
            background: rgba(37, 211, 102, 0.2);
            border-color: rgba(37, 211, 102, 0.4);
            color: #ffffff !important;
        }

        /* ── Cooperation Banner Box ────────── */
        .coop-summary-box {
            background: linear-gradient(135deg, rgba(171, 14, 0, 0.08) 0%, rgba(255, 255, 255, 0.02) 100%);
            border: 1px solid rgba(171, 14, 0, 0.2);
            border-radius: 28px;
            padding: 40px;
            display: flex;
            align-items: center;
            gap: 40px;
            margin-bottom: 70px;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.3);
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
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
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
            color: #ffffff;
            margin: 0 0 12px 0;
        }

        .coop-summary-text p {
            font-size: 0.92rem;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.7);
            margin: 0;
        }

        /* ── Empty Message ─────────────────── */
        .empty-grid-msg {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 20px;
            background: rgba(255, 255, 255, 0.01);
            border: 1px dashed rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            color: rgba(255, 255, 255, 0.45);
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

    <!-- Hero Banner -->
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
            <div class="aidc-hero-img-wrap">
                <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/AIDC.webp" alt="AIDC &amp; IDEAS Cooperation banner" fetchpriority="high" />
            </div>
        </div>
    </section>

    <!-- Main Section -->
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
                    // Determine if ongoing or upcoming
                    $is_ongoing = ($event['start_date'] <= $today && $event['end_date'] >= $today);
                ?>
                    <article class="event-card upcoming" style="animation-delay: <?php echo $delay; ?>s;">
                        <div class="event-img-wrap">
                            <img src="<?php echo esc_url($event['image']); ?>" alt="<?php echo esc_attr($is_en ? $event['title'] : $event['title_vi']); ?>" loading="lazy" />
                            <span class="event-badge <?php echo $is_ongoing ? 'ongoing' : 'upcoming-tag'; ?>">
                                <?php echo $is_ongoing ? ($is_en ? 'Ongoing' : 'Đang diễn ra') : ($is_en ? 'Upcoming' : 'Sắp diễn ra'); ?>
                            </span>
                        </div>
                        <div class="event-body">
                            <h3 class="event-title"><?php echo esc_html($is_en ? $event['title'] : $event['title_vi']); ?></h3>
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
                                        <?php echo $is_en ? 'Register &amp; Agenda' : 'Đăng ký &amp; Nội dung'; ?>
                                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91v6.27h2V9L12 3z"/></svg>
                                    </a>
                                <?php endif; ?>

                                <?php if (!empty($event['zalo_url']) || !empty($event['whatsapp_url'])): ?>
                                    <div class="social-row">
                                        <?php if (!empty($event['zalo_url'])): ?>
                                            <a href="<?php echo esc_url($event['zalo_url']); ?>" class="btn-social zalo" target="_blank" rel="nofollow noopener noreferrer">
                                                <span>Zalo Group</span>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!empty($event['whatsapp_url'])): ?>
                                            <a href="<?php echo esc_url($event['whatsapp_url']); ?>" class="btn-social whatsapp" target="_blank" rel="nofollow noopener noreferrer">
                                                <span>WhatsApp</span>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (!empty($event['cert_url'])): ?>
                                    <a href="<?php echo esc_url($event['cert_url']); ?>" class="btn-secondary" style="font-size: 0.76rem; padding: 8px 12px; border-radius: 10px;" target="_blank" rel="noopener noreferrer">
                                        <?php echo $is_en ? 'View Certificate Info' : 'Thông tin Chứng nhận'; ?>
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
                ?>
                    <article class="event-card past" style="animation-delay: <?php echo $delay; ?>s;">
                        <div class="event-img-wrap">
                            <img src="<?php echo esc_url($event['image']); ?>" alt="<?php echo esc_attr($is_en ? $event['title'] : $event['title_vi']); ?>" loading="lazy" />
                            <span class="event-badge past-tag">
                                <?php echo $is_en ? 'Concluded' : 'Đã kết thúc'; ?>
                            </span>
                        </div>
                        <div class="event-body">
                            <h3 class="event-title" style="font-size: 1.15rem;"><?php echo esc_html($is_en ? $event['title'] : $event['title_vi']); ?></h3>
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

    <!-- Shared Footer & Modals -->
    <?php get_footer(); ?>
</body>

</html>
