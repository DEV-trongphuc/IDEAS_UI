<?php
/**
 * The template for displaying recruitment and career opportunities at IDEAS
 * Template Name: Premium Recruitment Template
 */

global $wp;

// Block unwanted legacy styles
ob_start(function ($html) {
    return preg_replace(
        '/<link[^>]+href=[\'"][^\'"]*LANDINGPAGE_MBA\/main\.css[^\'"]*[\'"][^>]*\/?>/i',
        '<!-- [BLOCKED: LANDINGPAGE_MBA/main.css] -->',
        $html
    );
});

$is_en = (isset($_GET['lang']) && $_GET['lang'] === 'en');
?>
<!DOCTYPE html>
<html lang="<?php echo $is_en ? 'en' : 'vi'; ?>" prefix="og: https://ogp.me/ns#">

<head>
    <?php get_template_part('shared-head'); ?>

    <!-- Preload LCP hero background image -->
    <link rel="preload" fetchpriority="high" as="image"
        href="https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp" />

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php echo $is_en ? 'Careers & Recruitment | IDEAS Institute' : 'Cơ Hội Nghề Nghiệp & Tuyển Dụng | Viện IDEAS'; ?></title>
        <meta name="description"
            content="<?php echo $is_en ? 'Explore career and recruitment opportunities at IDEAS Institute. Join an innovative, international educational environment.' : 'Khám phá cơ hội nghề nghiệp và tuyển dụng tại Viện IDEAS. Môi trường giáo dục quốc tế năng động, chuyên nghiệp và giàu đãi ngộ.'; ?>" />
    <?php endif; ?>

    <style>
        /* ══════════════════════════════════════════════════
           PREMIUM RECRUITMENT TEMPLATE STYLES
           ══════════════════════════════════════════════════ */
        html,
        body {
            overflow-x: clip !important;
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
            margin: 0;
            padding: 0;
        }

        /* ── Hero Banner ── */
        .rec-hero-section {
            background: #0b1120;
            padding: 150px 20px 80px;
            text-align: center;
            position: relative;
            color: #ffffff;
            overflow: hidden;
            border-bottom: 4px solid #ab0e00;
        }

        .rec-hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0.18;
            transform: scale(1.05);
            pointer-events: none;
            z-index: 1;
        }

        .rec-hero-overlay {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, rgba(171, 14, 0, 0.22) 0%, rgba(11, 17, 32, 0.95) 80%);
            z-index: 2;
            pointer-events: none;
        }

        .rec-hero-container {
            position: relative;
            z-index: 3;
            max-width: 900px;
            margin: 0 auto;
        }

        .rec-hero-breadcrumb {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #94a3b8;
            margin-bottom: 18px;
        }

        .rec-hero-breadcrumb a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .rec-hero-breadcrumb a:hover {
            color: #f87171;
        }

        .rec-hero-breadcrumb span {
            color: #64748b;
        }

        .rec-hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 6px 16px;
            border-radius: 9999px;
            background: rgba(171, 14, 0, 0.16);
            border: 1px solid rgba(239, 68, 68, 0.35);
            color: #fca5a5;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 18px;
        }

        .rec-hero-title {
            font-size: clamp(30px, 4.5vw, 48px);
            font-weight: 800;
            line-height: 1.2;
            margin: 0 0 16px;
            letter-spacing: -0.5px;
            color: #ffffff;
        }

        .rec-hero-title span {
            background: linear-gradient(135deg, #ff6b6b 0%, #ffffff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .rec-hero-desc {
            font-size: clamp(15px, 2vw, 17px);
            line-height: 1.65;
            color: #cbd5e1;
            max-width: 720px;
            margin: 0 auto 28px;
        }

        .rec-hero-stats {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 28px;
            flex-wrap: wrap;
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .rec-stat-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #e2e8f0;
            font-size: 14px;
            font-weight: 500;
        }

        .rec-stat-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #f87171;
        }

        /* ── Content Wrapper ── */
        .rec-main-wrapper {
            max-width: 1200px;
            margin: -30px auto 70px;
            padding: 0 20px;
            position: relative;
            z-index: 10;
        }

        .rec-content-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 30px -5px rgba(15, 23, 42, 0.07), 0 0 0 1px rgba(226, 232, 240, 0.8);
            padding: 32px;
            margin-bottom: 40px;
        }

        @media (max-width: 768px) {
            .rec-hero-section {
                padding: 125px 16px 55px;
            }
            .rec-main-wrapper {
                margin-top: -20px;
                padding: 0 14px;
            }
            .rec-content-card {
                padding: 20px 14px;
                border-radius: 12px;
            }
        }

        /* ── Override & Polish plugin styles ── */
        .recruitment-archive-hero {
            display: none !important; /* Hide redundant inner hero from plugin */
        }

        .recruitment-container {
            max-width: 100% !important;
            padding: 0 !important;
        }

        .recruitment-filter-wrapper {
            background: #f8fafc !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 12px !important;
            padding: 18px !important;
            margin-bottom: 30px !important;
        }

        .recruitment-btn-primary {
            background: #ab0e00 !important;
            border-color: #ab0e00 !important;
            color: #ffffff !important;
            font-weight: 600 !important;
            transition: all 0.25s ease !important;
        }

        .recruitment-btn-primary:hover {
            background: #8f0c00 !important;
            border-color: #8f0c00 !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(171, 14, 0, 0.25);
        }

        .recruitment-job-card {
            border: 1px solid #e2e8f0 !important;
            border-radius: 12px !important;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1) !important;
            background: #ffffff !important;
        }

        .recruitment-job-card:hover {
            border-color: #cbd5e1 !important;
            transform: translateY(-3px) !important;
            box-shadow: 0 14px 28px -8px rgba(15, 23, 42, 0.09) !important;
        }

        .recruitment-job-card .job-card-title a {
            color: #0f172a !important;
            font-weight: 700 !important;
            transition: color 0.2s ease !important;
        }

        .recruitment-job-card .job-card-title a:hover {
            color: #ab0e00 !important;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class('ideas-recruitment-page'); ?>>

    <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>

    <!-- Premium Hero Section -->
    <section class="rec-hero-section">
        <div class="rec-hero-bg"
            style="background-image: url('https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp');">
        </div>
        <div class="rec-hero-overlay"></div>
        <div class="rec-hero-container">
            <nav class="rec-hero-breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo $is_en ? 'Home' : 'Trang chủ'; ?></a>
                <span>/</span>
                <span style="color: #f1f5f9; font-weight: 600;"><?php echo $is_en ? 'Careers' : 'Tuyển dụng'; ?></span>
            </nav>

            <div class="rec-hero-badge">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/><rect width="20" height="14" x="2" y="6" rx="2"/></svg>
                <span><?php echo $is_en ? 'CAREER OPPORTUNITIES' : 'CƠ HỘI NGHỀ NGHIỆP'; ?></span>
            </div>

            <h1 class="rec-hero-title">
                <?php echo $is_en ? 'Join The <span>IDEAS Institute</span> Team' : 'Gia Nhập Đội Ngũ <span>Viện IDEAS</span>'; ?>
            </h1>

            <p class="rec-hero-desc">
                <?php echo $is_en 
                    ? 'Explore open positions and advance your career in an innovative, international academic and tech-driven environment.' 
                    : 'Khám phá các vị trí đang mở và phát triển sự nghiệp của bạn trong môi trường giáo dục & công nghệ quốc tế năng động, chuyên nghiệp và giàu đãi ngộ.'; ?>
            </p>

            <div class="rec-hero-stats">
                <div class="rec-stat-item">
                    <div class="rec-stat-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <span><?php echo $is_en ? 'Dynamic Team Culture' : 'Môi trường nhân văn & cởi mở'; ?></span>
                </div>
                <div class="rec-stat-item">
                    <div class="rec-stat-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m4.93 4.93 4.24 4.24"/><path d="m14.83 9.17 4.24-4.24"/><path d="m14.83 14.83 4.24 4.24"/><path d="m9.17 14.83-4.24 4.24"/></svg>
                    </div>
                    <span><?php echo $is_en ? 'Global Academic Network' : 'Đối tác học thuật quốc tế'; ?></span>
                </div>
                <div class="rec-stat-item">
                    <div class="rec-stat-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                    </div>
                    <span><?php echo $is_en ? 'Fast Career Growth' : 'Lộ trình thăng tiến rõ ràng'; ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Area -->
    <main class="rec-main-wrapper" id="recruitment-jobs-section">
        <div class="rec-content-card">
            <?php
            // Output page content if present in WordPress editor (excluding literal shortcode string)
            if (is_page() && have_posts()) {
                while (have_posts()) {
                    the_post();
                    $raw_content = get_the_content();
                    // Clean literal shortcode representation if wrapped in code tags
                    $clean_content = preg_replace('/<code>\s*\[recruitment_jobs[^\]]*\]\s*<\/code>/i', '', $raw_content);
                    $clean_content = trim($clean_content);
                    if (!empty($clean_content) && $clean_content !== '[recruitment_jobs]') {
                        echo '<div class="page-intro-description" style="margin-bottom: 28px; font-size: 15px; line-height: 1.7; color: #475569;">';
                        echo apply_filters('the_content', $clean_content);
                        echo '</div>';
                    }
                }
            }

            // Render Recruitment Jobs List with filter & modal
            echo do_shortcode('[recruitment_jobs show_filter="yes"]');
            ?>
        </div>
    </main>

    <!-- Shared Footer (automatically includes shared-modals and closes body/html) -->
    <?php get_footer(); ?>
