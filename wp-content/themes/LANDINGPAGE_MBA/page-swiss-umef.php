<?php
/**
 * The template for displaying the Swiss UMEF partner page
 * Template Name: Premium Swiss UMEF Template
 */
global $wp;

// Block unwanted old theme styles
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

    <!-- Preconnect to external domains for faster resource loading --><!-- Preload LCP hero background image -->
    <link rel="preload" fetchpriority="high" as="image"
        href="/wp-content/uploads/external-migrated/fc7eeb_82548a7721e6472b9c5f4813e39e94b9_mv2_ea5d6ab4.webp" />

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title>
            <?php echo $is_en ? 'Swiss UMEF University Switzerland | Official Admissions Partner IDEAS' : 'Đại học Swiss UMEF Thụy Sĩ | Đối tác tuyển sinh chính thức IDEAS'; ?>
        </title>
        <meta name="description"
            content="<?php echo $is_en ? 'Explore Swiss UMEF University in Geneva, Switzerland. Officially accredited by the Swiss Accreditation Council, QS 5-Star rated, and recognized by the Ministry of Education and Training of Vietnam.' : 'Khám phá Đại học Swiss UMEF tại Geneva, Thụy Sĩ. Được công nhận chính thức bởi Hội đồng Giáo dục Thụy Sĩ, xếp hạng 5 sao QS Stars và được công nhận bởi Bộ GD&ĐT Việt Nam.'; ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:title"
            content="<?php echo $is_en ? 'Swiss UMEF University Switzerland | Official Admissions Partner IDEAS' : 'Đại học Swiss UMEF Thụy Sĩ | Đối tác tuyển sinh chính thức IDEAS'; ?>" />
        <meta property="og:description"
            content="<?php echo $is_en ? 'Experience the elite Swiss education with a prestigious international degree, accredited by SAC, ACBSP, EduQua.' : 'Trải nghiệm giáo dục tinh hoa Thụy Sĩ với bằng cấp quốc tế danh giá, được kiểm định bởi SAC, ACBSP, EduQua.'; ?>" />
        <meta property="og:image"
            content="/wp-content/uploads/external-migrated/fc7eeb_82548a7721e6472b9c5f4813e39e94b9_mv2_ea5d6ab4.webp" />
        <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />
    <?php endif; ?><!-- Main stylesheet --><!-- Booking Modal stylesheet -->
    <?php
    define('BOOKING_MODAL_CSS_LOADED', true);
    $bk_css_path = get_stylesheet_directory() . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/booking-modal.min.css?v=<?php echo $bk_css_version; ?>"
        media="print" onload="this.media='all'" />

    <style>
        :root {
            --umef-primary: var(--clr-primary, #ab0e00);
            --umef-primary-hover: var(--clr-primary-d, #8c1000);
        }

        /* ══════════════════════════════════════
           SWISS UMEF PAGE – PREMIUM LIGHT DESIGN
           ══════════════════════════════════════ */
        html,
        body {
            overflow-x: clip !important;
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #fdfdfd;
            color: #1e293b;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            z-index: -1;
            background-image:
                radial-gradient(circle at 5% 15%, rgba(239, 68, 68, 0.04) 0%, transparent 45%),
                radial-gradient(circle at 95% 75%, rgba(239, 68, 68, 0.03) 0%, transparent 40%),
                radial-gradient(rgba(15, 23, 42, 0.025) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 28px 28px;
            pointer-events: none;
            will-change: transform;
        }

        /* ── Hero Section ── */
        .umef-hero {
            position: relative;
            padding: 180px 20px 140px;
            text-align: center;
            overflow: hidden;
            background: #040508;
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100vw;
            margin-left: 50%;
            transform: translateX(-50%);
        }

        .umef-hero-bg {
            position: absolute;
            inset: 0;
            z-index: 1;
            background-image: url('/wp-content/uploads/external-migrated/fc7eeb_82548a7721e6472b9c5f4813e39e94b9_mv2_ea5d6ab4.webp');
            background-size: cover;
            background-position: center 60%;
            opacity: 0.38;
            will-change: transform;
            transform: scale(1.02);
        }

        .umef-hero-logo-link {
            display: inline-block;
            margin-top: -30px;
            margin-bottom: 20px;
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            z-index: 3;
        }

        .umef-hero-logo-link:hover {
            transform: scale(1.12);
        }

        .umef-hero-circle-logo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 2.5px solid rgba(255, 255, 255, 0.45);
            background: #ffffff;
            padding: 4px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.45);
            object-fit: contain;
        }

        .umef-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(180deg, rgba(4, 5, 8, 0.55) 0%, rgba(6, 9, 14, 0.92) 100%),
                radial-gradient(ellipse at 50% 50%, rgba(217, 38, 38, 0.18) 0%, transparent 65%);
        }

        .umef-hero-container {
            position: relative;
            z-index: 3;
            max-width: 1000px;
            margin: 0 auto;
        }

        .umef-hero-badge {
            background: rgba(217, 38, 38, 0.14);
            border: 1px solid rgba(217, 38, 38, 0.4);
            padding: 8px 22px;
            border-radius: 100px;
            color: #ff9e9e;
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

        .umef-hero h1 {
            font-size: clamp(2.4rem, 5.5vw, 3.8rem);
            font-weight: 900;
            margin-bottom: 24px;
            letter-spacing: -0.025em;
            line-height: 1.2;
            color: #ffffff;
        }

        .umef-hero h1 span {
            background: linear-gradient(135deg, #ff8a8a 0%, var(--umef-primary) 60%, var(--umef-primary-hover) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .umef-hero p {
            font-size: 1.15rem;
            color: rgba(241, 245, 249, 0.9);
            max-width: 800px;
            margin: 0 auto 40px;
            line-height: 1.7;
            font-weight: 500;
        }

        .umef-hero-stats {
            display: flex;
            justify-content: center;
            gap: 24px;
            flex-wrap: wrap;
            margin-top: 40px;
        }

        .umef-stat-card {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.06);
            padding: 18px 28px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            min-width: 180px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.02);
        }

        .umef-hero .umef-stat-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.06);
            box-shadow: none;
        }

        .umef-stat-card:hover {
            transform: translateY(-5px);
            border-color: rgba(239, 68, 68, 0.25);
            background: rgba(239, 68, 68, 0.02);
            box-shadow: 0 10px 25px rgba(239, 68, 68, 0.06);
        }

        .umef-hero .umef-stat-card:hover {
            border-color: rgba(217, 38, 38, 0.3);
            background: rgba(217, 38, 38, 0.03);
            box-shadow: 0 10px 25px rgba(217, 38, 38, 0.08);
        }

        .umef-stat-num {
            font-size: 2rem;
            font-weight: 800;
            display: block;
            margin-bottom: 5px;
            background: linear-gradient(135deg, var(--umef-primary), var(--umef-primary-hover));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .umef-hero .umef-stat-num {
            background: linear-gradient(135deg, #ff8a8a, var(--umef-primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .umef-stat-lbl {
            font-size: 0.8rem;
            color: #64748b;
            font-weight: 650;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .umef-hero .umef-stat-lbl {
            color: #94a3b8;
        }

        /* ── Section General Layout ── */
        .umef-section {
            padding: 100px 20px;
            position: relative;
            overflow: hidden;
        }

        /* ── Dark Section Contrast Rules ── */
        .umef-section-dark .section-title {
            color: #ffffff !important;
        }

        .umef-section-dark .section-title span {
            background: linear-gradient(135deg, #ff8a8a 0%, var(--umef-primary) 60%, var(--umef-primary-hover) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: var(--umef-primary) !important;
            display: inline-block;
        }

        .umef-section-dark .section-subtitle {
            color: #cbd5e1 !important;
        }

        .umef-section-dark .campus-card {
            background: rgba(255, 255, 255, 0.02) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            box-shadow: none !important;
        }

        .umef-section-dark .campus-card:hover {
            transform: translateY(-8px);
            border-color: rgba(239, 68, 68, 0.35) !important;
            background: rgba(255, 255, 255, 0.04) !important;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.45) !important;
        }

        .umef-section-dark .campus-card-title {
            color: #ffffff !important;
        }

        .umef-section-dark .campus-card-desc {
            color: #94a3b8 !important;
        }

        .umef-section-dark .campus-body {
            background: transparent !important;
        }

        .section-header {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 60px;
        }

        .section-badge {
            font-size: 0.8rem;
            font-weight: 800;
            color: var(--umef-primary);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 12px;
            display: inline-block;
        }

        .section-title {
            font-size: clamp(2rem, 4.5vw, 2.8rem);
            font-weight: 850;
            line-height: 1.25;
            color: #0f172a;
            margin-bottom: 16px;
        }

        .section-title span {
            background: linear-gradient(135deg, var(--umef-primary) 0%, var(--umef-primary-hover) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: var(--umef-primary) !important;
            display: inline-block;
        }

        .section-subtitle {
            font-size: 1.05rem;
            color: #475569;
            line-height: 1.6;
        }

        /* ── VN-NARIC Banner Section ── */
        .naric-banner {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.06) 0%, rgba(255, 255, 255, 0.95) 100%);
            border: 1px solid rgba(239, 68, 68, 0.15);
            border-radius: 32px;
            padding: 50px;
            max-width: 1100px;
            margin: 0 auto 80px;
            display: flex;
            align-items: center;
            gap: 40px;
            backdrop-filter: blur(12px);
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.04);
        }

        .naric-img-container {
            flex-shrink: 0;
            width: 140px;
            height: 140px;
            background: #ffffff;
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
        }

        .naric-img-container img {
            max-width: 100%;
            height: auto;
            object-fit: contain;
        }

        .naric-text {
            flex-grow: 1;
        }

        .naric-text h3 {
            font-size: 1.6rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 12px;
        }

        .naric-text p {
            font-size: 1rem;
            color: #334155;
            line-height: 1.65;
            margin-bottom: 16px;
        }

        .naric-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(179, 20, 0, 0.08);
            color: var(--umef-primary);
            padding: 6px 14px;
            border-radius: 100px;
            font-size: 0.85rem;
            font-weight: 700;
            border: 1px solid rgba(179, 20, 0, 0.15);
        }

        /* ── PORTED ACCREDITATION SECTION STYLES ── */
        .acc-section {
            background: linear-gradient(180deg, #fdfdfd 0%, #f8fafc 100%);
            position: relative;
            overflow: hidden;
            padding: 100px 0;
        }

        .acc-orb {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            filter: blur(100px);
            z-index: 0;
        }

        .acc-orb-1 {
            width: 600px;
            height: 600px;
            top: -150px;
            left: -150px;
            background: radial-gradient(circle, rgba(239, 68, 68, 0.05) 0%, transparent 65%);
        }

        .acc-orb-2 {
            width: 500px;
            height: 500px;
            bottom: -100px;
            right: -100px;
            background: radial-gradient(circle, rgba(15, 23, 42, 0.03) 0%, transparent 65%);
        }

        .acc-orb-3 {
            width: 350px;
            height: 350px;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: radial-gradient(circle, rgba(239, 68, 68, 0.02) 0%, transparent 70%);
        }

        .acc-inner {
            max-width: 1220px;
            margin: 0 auto;
            padding: 0 32px;
            position: relative;
            z-index: 1;
        }

        .acc-header {
            text-align: center;
            margin-bottom: 64px;
        }

        .acc-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(179, 20, 0, 0.08);
            color: var(--umef-primary);
            border: 1px solid rgba(179, 20, 0, 0.2);
            padding: 6px 20px;
            border-radius: 999px;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .acc-title {
            font-size: clamp(2rem, 4.5vw, 3.2rem);
            font-weight: 900;
            color: #0f172a;
            line-height: 1.15;
            margin: 0 0 16px;
        }

        .acc-title span {
            background: linear-gradient(90deg, var(--umef-primary), var(--umef-primary-hover));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .acc-section .acc-desc {
            font-size: 1rem;
            color: #475569 !important;
            max-width: 640px;
            margin: 0 auto;
            line-height: 1.75;
        }

        .acc-sac-hero {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            border-radius: 24px;
            overflow: hidden;
            margin-bottom: 40px;
            border: 1px solid rgba(15, 23, 42, 0.08);
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.03), 0 5px 15px rgba(15, 23, 42, 0.01);
            position: relative;
        }

        .acc-sac-hero,
        .acc-sac-hero *:hover {
            transform: none !important;
        }

        .acc-sac-left {
            background: linear-gradient(135deg, var(--umef-primary) 0%, var(--umef-primary-hover) 100%);
            padding: 56px 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .acc-sac-left::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            top: -80px;
            right: -80px;
        }

        .acc-sac-left::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.04);
            bottom: -60px;
            left: -40px;
        }

        .acc-sac-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: #fff;
            padding: 6px 16px;
            border-radius: 999px;
            font-size: 0.7rem;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 24px;
            width: fit-content;
            position: relative;
            z-index: 1;
        }

        .acc-sac-badge-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #fff;
            box-shadow: 0 0 8px #fff;
            animation: accPulse 1.8s infinite;
            flex-shrink: 0;
        }

        @keyframes accPulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.5;
                transform: scale(1.4);
            }
        }

        .acc-sac-name {
            font-size: clamp(1.4rem, 2.5vw, 2.1rem);
            font-weight: 900;
            color: #fff;
            line-height: 1.2;
            margin: 0 0 12px;
            position: relative;
            z-index: 1;
        }

        .acc-section .acc-sac-tagline {
            font-size: 0.88rem;
            color: rgba(255, 255, 255, 0.9) !important;
            line-height: 1.7;
            margin: 0 0 28px;
            position: relative;
            z-index: 1;
        }

        .acc-sac-stats {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
            position: relative;
            z-index: 1;
        }

        .acc-sac-stat {
            text-align: center;
        }

        .acc-sac-stat-svg-wrap {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 28px;
        }

        .acc-section .acc-sac-stat-val {
            font-size: 1.6rem;
            font-weight: 900;
            color: #ffffff !important;
            display: block;
            line-height: 1;
            margin-bottom: 4px;
        }

        .acc-section .acc-sac-stat-label {
            font-size: 0.7rem;
            color: rgba(255, 255, 255, 0.8) !important;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .acc-sac-right {
            background: #ffffff;
            padding: 56px 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 28px;
            border-left: 1px solid rgba(15, 23, 42, 0.08);
        }

        .acc-sac-logo-wrap {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .acc-sac-cert-link {
            display: none;
        }

        .acc-sac-logo-wrap img {
            height: 80px;
            width: auto;
            object-fit: contain;
            background: #ffffff;
            border-radius: 12px;
            padding: 10px 14px;
            border: 1px solid rgba(15, 23, 42, 0.08);
        }

        .acc-section .acc-sac-logo-text .acc-sac-logo-title {
            font-size: 1rem;
            font-weight: 800;
            color: #0f172a !important;
            margin: 0 0 4px;
        }

        .acc-section .acc-sac-logo-text p {
            font-size: 0.8rem;
            color: #475569 !important;
            margin: 0;
            line-height: 1.5;
        }

        .acc-sac-points {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .acc-section .acc-sac-points li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 0.85rem;
            color: #334155 !important;
            line-height: 1.55;
        }

        .acc-sac-points li i {
            color: var(--umef-primary);
            font-size: 0.78rem;
            margin-top: 4px;
            flex-shrink: 0;
        }

        .acc-sac-cert-strip {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .acc-cert-thumb {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid rgba(15, 23, 42, 0.08);
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s, color 0.3s;
            background: #f8fafc;
            padding: 10px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #334155;
            font-size: 0.78rem;
            font-weight: 700;
            text-decoration: none;
        }

        .acc-cert-thumb:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(179, 20, 0, 0.12);
            border-color: var(--umef-primary);
            background: var(--umef-primary);
            color: #ffffff;
        }

        .acc-cert-thumb:hover i {
            color: #ffffff;
        }

        .acc-cert-thumb i {
            color: var(--umef-primary);
        }

        .acc-others-title {
            text-align: center;
            font-size: 0.8rem;
            font-weight: 800;
            color: #64748b;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            margin: 48px 0 32px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .acc-others-title::before,
        .acc-others-title::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(15, 23, 42, 0.08);
        }

        .acc-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 16px;
        }

        .acc-card,
        .acc-card * {
            cursor: pointer;
        }

        .acc-card {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.06);
            border-radius: 16px;
            padding: 28px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 14px;
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.01);
        }

        .acc-card:hover {
            background: rgba(179, 20, 0, 0.02);
            border-color: rgba(179, 20, 0, 0.2);
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(179, 20, 0, 0.05);
        }

        .acc-card-logo {
            height: 52px;
            width: auto;
            max-width: 110px;
            object-fit: contain;
            opacity: 0.9;
            transition: opacity 0.3s;
        }

        .acc-card:hover .acc-card-logo {
            opacity: 1;
        }

        .acc-section .acc-card h4 {
            font-size: 0.78rem;
            font-weight: 800;
            color: #0f172a !important;
            margin: 0;
            line-height: 1.4;
        }

        .acc-section .acc-card p {
            font-size: 0.72rem;
            color: #475569 !important;
            margin: 0;
            line-height: 1.55;
        }

        /* ── Geneva Campus Section ── */
        .campus-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .campus-card {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.06);
            border-radius: 24px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.02);
        }

        .campus-card:hover {
            transform: translateY(-8px);
            border-color: rgba(239, 68, 68, 0.25);
            background: #ffffff;
            box-shadow: 0 20px 40px rgba(239, 68, 68, 0.06);
        }

        .campus-img {
            position: relative;
            aspect-ratio: 16 / 11;
            overflow: hidden;
        }

        .campus-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .campus-card:hover .campus-img img {
            transform: scale(1.08);
        }

        .campus-body {
            padding: 24px;
        }

        .campus-card-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .campus-card-desc {
            font-size: 0.9rem;
            color: #475569;
            line-height: 1.5;
        }

        /* ── Programs Section Redesign (Matches index.html Catalog style) ── */
        .programs-grid {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 24px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .programs-grid .prog-card-new {
            flex: 0 1 calc(33.333% - 16px);
            min-width: 300px;
            max-width: 350px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.04), 0 1px 3px rgba(0, 0, 0, 0.01);
            overflow: hidden;
            box-sizing: border-box;
            text-align: left;
        }

        .programs-grid .prog-card-new:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(171, 14, 0, 0.12), 0 1px 5px rgba(171, 14, 0, 0.03);
            border-color: rgba(171, 14, 0, 0.35);
        }

        .programs-grid .prog-avatar-container {
            width: calc(100% + 40px);
            aspect-ratio: 16 / 10;
            height: auto;
            margin: -20px -20px 16px -20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid #f1f5f9;
        }

        .programs-grid .prog-avatar-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .programs-grid .prog-card-new:hover .prog-avatar-container img {
            transform: scale(1.06) rotate(0.5deg);
        }

        .programs-grid .prog-card-header {
            position: absolute;
            top: 14px;
            left: 14px;
            right: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 3;
            pointer-events: none;
        }

        .programs-grid .prog-card-badge {
            font-size: 0.7rem;
            font-weight: 800;
            color: #ffffff;
            text-transform: uppercase;
            background: rgba(171, 14, 0, 0.88);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            padding: 3px 10px;
            border-radius: 99px;
            letter-spacing: 0.05em;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .programs-grid .prog-card-school {
            font-size: 0.72rem;
            color: #ffffff;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 5px;
            background: rgba(15, 23, 42, 0.65);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            padding: 4px 10px;
            border-radius: 99px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .programs-grid .prog-card-title-group {
            margin-bottom: 10px;
            text-align: left;
        }

        .programs-grid .prog-card-title-new {
            font-size: 1.25rem;
            font-weight: 800;
            color: #0f172a !important;
            margin: 0;
            line-height: 1.3;
        }

        .programs-grid .prog-card-subtitle-new {
            font-size: 0.82rem;
            color: var(--umef-primary) !important;
            font-weight: 700;
            margin-top: 4px;
        }

        .programs-grid .prog-card-desc-new {
            font-size: 0.85rem;
            color: #475569 !important;
            line-height: 1.55;
            margin: 0 0 16px 0;
            min-height: 60px;
            text-align: left;
        }

        .programs-grid .prog-card-specs {
            display: flex;
            flex-direction: column;
            gap: 8px;
            background: #f8fafc;
            padding: 10px 14px;
            border-radius: 12px;
            border: 1px solid #f1f5f9;
            margin-bottom: 16px;
            font-size: 0.78rem;
        }

        .programs-grid .prog-spec-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .programs-grid .prog-spec-label {
            color: #64748b;
            font-weight: 500;
        }

        .programs-grid .prog-spec-value {
            color: #0f172a;
            font-weight: 700;
            text-align: right;
        }

        .programs-grid .prog-card-actions {
            display: flex;
            gap: 10px;
            width: 100%;
        }

        .programs-grid .prog-btn-detail {
            flex: 1;
            padding: 10px 12px;
            font-size: 0.82rem;
            font-weight: 700;
            text-align: center;
            border-radius: 10px;
            border: 1.5px solid #e2e8f0;
            color: #0f172a;
            background: #fff;
            transition: all 0.3s ease;
            text-decoration: none;
            display: block;
        }

        .programs-grid .prog-btn-detail:hover {
            border-color: var(--umef-primary);
            background: var(--umef-primary);
            color: #ffffff;
        }

        .programs-grid .prog-btn-inquire {
            flex: 1;
            padding: 10px 12px;
            font-size: 0.82rem;
            font-weight: 700;
            text-align: center;
            border-radius: 10px;
            background: var(--umef-primary);
            color: #fff;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(179, 20, 0, 0.15);
            display: block;
        }

        .programs-grid .prog-btn-inquire:hover {
            background: var(--umef-primary-hover);
            box-shadow: 0 6px 16px rgba(179, 20, 0, 0.25);
        }

        @media (max-width: 992px) {
            .programs-grid .prog-card-new {
                flex: 0 1 calc(50% - 12px);
            }
        }

        @media (max-width: 768px) {
            .programs-grid .prog-card-new {
                flex: 0 1 100%;
                max-width: 450px;
            }
        }

        /* ── Testimonials Grid ── */
        .testimonials-section {
            background: linear-gradient(180deg, #fdfdfd 0%, #f8fafc 100%);
        }

        .testi-grid {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 60px;
            max-width: 1100px;
            margin: 0 auto;
            align-items: center;
        }

        .testi-left h3 {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 20px;
            color: #0f172a;
        }

        .testi-left p {
            color: #475569;
            font-size: 1.05rem;
            line-height: 1.65;
            margin-bottom: 24px;
        }

        .testi-quote-card {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.06);
            border-radius: 28px;
            padding: 40px;
            position: relative;
            backdrop-filter: blur(10px);
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.03);
        }

        .testi-quote-icon {
            position: absolute;
            top: 25px;
            right: 40px;
            font-size: 4rem;
            color: rgba(239, 68, 68, 0.04);
        }

        .testi-text {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #1e293b;
            font-style: italic;
            margin-bottom: 24px;
            position: relative;
            z-index: 2;
        }

        .testi-author {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .testi-author-img {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--umef-primary);
        }

        .testi-author-info h4 {
            font-size: 1rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 2px;
        }

        .testi-author-info p {
            font-size: 0.8rem;
            color: #64748b;
        }

        /* ── Lead Form ── */
        .booking-form-section {
            background: linear-gradient(180deg, #f8fafc 0%, #fdfdfd 100%);
            border-top: 1px solid rgba(15, 23, 42, 0.05);
        }

        .booking-wrapper {
            max-width: 650px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.08);
            border-radius: 32px;
            padding: 40px 50px;
            box-shadow: 0 25px 50px rgba(15, 23, 42, 0.04);
            text-align: center;
            backdrop-filter: blur(12px);
        }

        .booking-wrapper h3 {
            font-size: 2rem;
            font-weight: 850;
            color: #0f172a;
            margin-bottom: 12px;
        }

        .booking-wrapper p {
            color: #475569;
            margin-bottom: 35px;
            font-size: 1rem;
            line-height: 1.6;
        }

        /* ── Responsive Styling ── */
        @media (max-width: 992px) {
            .naric-banner {
                flex-direction: column;
                padding: 30px;
                text-align: center;
                gap: 24px;
            }

            .prog-card {
                flex: 0 1 calc(50% - 12px);
            }

            .campus-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .testi-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .acc-sac-hero {
                grid-template-columns: 1fr;
            }

            .acc-sac-right {
                border-left: none;
                border-top: 1px solid rgba(15, 23, 42, 0.08);
            }

            .acc-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .umef_news_grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 24px;
            }
        }

        @media (max-width: 768px) {
            .umef-hero {
                padding: 120px 16px 70px !important;
            }

            .umef-hero-stats {
                flex-wrap: nowrap !important;
                gap: 8px !important;
                width: 100% !important;
                max-width: 480px !important;
                margin: 30px auto 0 !important;
            }

            .umef-stat-card {
                min-width: 0 !important;
                flex: 1 1 0% !important;
                padding: 12px 8px !important;
            }

            .umef-stat-num {
                font-size: 1.25rem !important;
            }

            .umef-stat-lbl {
                font-size: 0.62rem !important;
                line-height: 1.2 !important;
            }

            .umef-section {
                padding: 60px 16px !important;
            }

            .acc-sac-left {
                padding: 36px 24px !important;
            }

            .acc-sac-right {
                padding: 36px 24px !important;
            }

            .prog-card {
                flex: 0 1 100%;
                grid-template-columns: 1fr;
            }

            /* Enable Mobile Scroll-snap Carousel for accreditation, campus, programs, and videos grids */
            .acc-grid,
            .campus-grid,
            .programs-grid,
            .umef-videos-grid {
                display: flex !important;
                flex-direction: row !important;
                flex-wrap: nowrap !important;
                justify-content: flex-start !important;
                overflow-x: auto !important;
                scroll-snap-type: x mandatory !important;
                scroll-behavior: smooth !important;
                -webkit-overflow-scrolling: touch !important;
                gap: 16px !important;
                padding: 16px 20px 24px !important;
                margin: 0 -20px !important;
                scrollbar-width: none !important;
                max-width: none !important;
            }

            .acc-grid::-webkit-scrollbar,
            .campus-grid::-webkit-scrollbar,
            .programs-grid::-webkit-scrollbar,
            .umef-videos-grid::-webkit-scrollbar {
                display: none !important;
            }

            .acc-card,
            .campus-card,
            .programs-grid .prog-card-new,
            .umef-video-card {
                flex: 0 0 85% !important;
                scroll-snap-align: center !important;
                margin: 0 !important;
                max-width: unset !important;
            }

            .booking-wrapper {
                padding: 30px 20px;
            }

            .booking-wrapper h3 {
                font-size: 1.6rem;
            }
        }

        @media (max-width: 576px) {
            .acc-sac-logo-wrap {
                flex-direction: column !important;
                align-items: center !important;
                text-align: center !important;
                gap: 16px !important;
                margin-bottom: 24px !important;
            }

            .acc-sac-logo-img {
                display: none !important;
            }

            .acc-sac-cert-link {
                display: block !important;
                width: 100% !important;
                max-width: 240px !important;
                margin: 0 auto !important;
            }

            .acc-sac-cert-img {
                width: 100% !important;
                height: auto !important;
                border-radius: 8px !important;
                border: 1px solid rgba(171, 14, 0, 0.2) !important;
                display: block !important;
                padding: 0 !important;
                background: transparent !important;
            }

            .acc-sac-logo-text {
                text-align: center !important;
                width: 100% !important;
            }

            .acc-sac-stats {
                display: grid !important;
                grid-template-columns: repeat(3, 1fr) !important;
                gap: 12px !important;
                width: 100% !important;
            }

            .acc-sac-stat {
                display: flex !important;
                flex-direction: column !important;
                align-items: center !important;
                text-align: center !important;
            }

            .acc-section .acc-sac-stat-val {
                font-size: 1.3rem !important;
            }

            .acc-section .acc-sac-stat-label {
                font-size: 0.65rem !important;
            }
        }

        @media (max-width: 480px) {
            .acc-sac-left {
                padding: 28px 16px !important;
            }

            .acc-sac-right {
                padding: 28px 16px !important;
            }
        }

        /* Slider dots system for mobile carousels */
        .slider-dots {
            display: none;
            justify-content: center;
            gap: 8px;
            margin-top: 16px;
            margin-bottom: 24px;
        }

        .slider-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #cbd5e1;
            border: none;
            padding: 0;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .slider-dot.active {
            background: var(--umef-primary);
            width: 20px;
            border-radius: 4px;
        }

        .umef-section-dark .slider-dot {
            background: rgba(255, 255, 255, 0.25);
        }

        .umef-section-dark .slider-dot.active {
            background: #ffffff;
        }

        @media (max-width: 768px) {
            .slider-dots {
                display: flex;
            }
        }

        /* ── News & Prestige Section – Premium Redesign ── */
        .umef-news-section {
            background: linear-gradient(180deg, #f0f4f8 0%, #f8fafc 60%, #fdfdfd 100%);
            position: relative;
        }

        /* Featured + Stack layout */
        .umef_news_layout {
            display: grid;
            grid-template-columns: 1.15fr 1fr;
            grid-template-rows: auto auto;
            gap: 28px;
            max-width: 1200px;
            margin: 0 auto;
            align-items: stretch;
        }

        /* Featured card — large left */
        .umef_news_card_featured {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.07);
            border-radius: 28px;
            overflow: hidden;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 12px 36px rgba(15, 23, 42, 0.04);
            position: relative;
            grid-column: 1;
            grid-row: 1 / 3;
        }

        .umef_news_card_featured:hover {
            transform: translateY(-6px);
            border-color: rgba(171, 14, 0, 0.22);
            box-shadow: 0 24px 50px rgba(171, 14, 0, 0.08);
        }

        .umef_news_card_featured .umef_news_card_img {
            position: relative;
            aspect-ratio: 16 / 10;
            overflow: hidden;
            background: #f1f5f9;
            flex-shrink: 0;
        }

        /* Overlay gradient on featured image */
        .umef_news_card_featured .umef_news_card_img::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 45%, rgba(10, 15, 30, 0.55) 100%);
            pointer-events: none;
        }

        .umef_news_card_featured .umef_news_card_img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
        }

        .umef_news_card_featured:hover .umef_news_card_img img {
            transform: scale(1.05);
        }

        /* Featured badge on image */
        .umef_news_featured_badge {
            position: absolute;
            top: 18px;
            left: 20px;
            z-index: 3;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--umef-primary);
            color: #fff;
            font-size: 0.7rem;
            font-weight: 800;
            padding: 5px 13px;
            border-radius: 100px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            box-shadow: 0 4px 12px rgba(171, 14, 0, 0.3);
        }

        .umef_news_card_featured .umef_news_card_body {
            padding: 30px 32px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            flex-grow: 1;
        }

        .umef_news_card_featured .umef_news_card_title {
            font-size: 1.4rem;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.35;
            transition: color 0.3s ease;
            margin: 0;
        }

        .umef_news_card_featured:hover .umef_news_card_title {
            color: var(--umef-primary);
        }



        /* Small card in stack — horizontal (default) */
        .umef_news_card {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.07);
            border-radius: 20px;
            overflow: hidden;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: row;
            gap: 0;
            transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 6px 20px rgba(15, 23, 42, 0.03);
            position: relative;
            align-items: stretch;
            flex: 1;
        }

        .umef_news_card:hover {
            transform: translateY(-5px);
            border-color: rgba(171, 14, 0, 0.2);
            box-shadow: 0 16px 36px rgba(171, 14, 0, 0.07);
        }

        /* Vertical variant — used in right stack */
        .umef_news_card.umef_news_card--vertical {
            flex-direction: column;
        }

        /* Image: horizontal (default) */
        .umef_news_card .umef_news_card_img {
            width: 130px;
            min-width: 130px;
            flex-shrink: 0;
            overflow: hidden;
            background: #f1f5f9;
            position: relative;
        }

        /* Image: small fixed height for vertical cards */
        .umef_news_card .umef_news_card_img.umef_news_card_img--sm {
            width: 100%;
            min-width: unset;
            height: 160px;
            flex-shrink: 0;
        }

        .umef_news_card .umef_news_card_img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .umef_news_card:hover .umef_news_card_img img {
            transform: scale(1.08);
        }

        .umef_news_card .umef_news_card_body {
            padding: 18px 22px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex-grow: 1;
            justify-content: flex-start;
        }

        /* Shared tag styles */
        .umef_news_card_tag {
            align-self: flex-start;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(171, 14, 0, 0.07);
            border: 1px solid rgba(171, 14, 0, 0.14);
            color: var(--umef-primary);
            font-size: 0.72rem;
            font-weight: 750;
            padding: 4px 11px;
            border-radius: 100px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .umef_news_card_body b,
        .umef_news_card_title {
            font-size: 0.98rem;
            font-weight: 750;
            color: #0f172a;
            line-height: 1.42;
            transition: color 0.3s ease;
            display: block;
        }

        .umef_news_card:hover b,
        .umef_news_card:hover .umef_news_card_title {
            color: var(--umef-primary);
        }

        .umef_news_card_body span {
            font-size: 0.85rem;
            color: #64748b;
            line-height: 1.55;
        }

        .umef_news_card_meta {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.78rem;
            color: #94a3b8;
            margin-top: 4px;
        }

        .umef_news_card_meta i {
            font-size: 0.7rem;
        }

        .umef_news_card_read {
            margin-top: auto;
            color: var(--umef-primary);
            font-size: 0.85rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: gap 0.2s ease;
            padding-top: 6px;
        }

        .umef_news_card_featured:hover .umef_news_card_read,
        .umef_news_card:hover .umef_news_card_read {
            gap: 10px;
        }

        @media (max-width: 992px) {
            .umef_news_layout {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .umef_news_card_featured .umef_news_card_img {
                aspect-ratio: 16 / 8;
            }
        }

        @media (max-width: 768px) {
            .umef_news_layout {
                display: flex !important;
                flex-direction: row !important;
                overflow-x: auto !important;
                scroll-snap-type: x mandatory !important;
                scroll-behavior: smooth !important;
                -webkit-overflow-scrolling: touch !important;
                gap: 16px !important;
                padding: 10px 0 20px !important;
            }

            .umef_news_layout::-webkit-scrollbar {
                display: none !important;
            }

            .umef_news_card_featured,
            .umef_news_card {
                flex: 0 0 calc(100% - 20px) !important;
                width: calc(100% - 20px) !important;
                margin: 0 !important;
                scroll-snap-align: start !important;
            }

            .umef_news_card {
                flex-direction: column !important;
            }

            .umef_news_card .umef_news_card_img {
                width: 100% !important;
                min-width: unset !important;
                height: 180px !important;
            }
        }

        /* ── YouTube Videos Section (Dark) ── */
        .umef-videos-section {
            background: #040508;
            position: relative;
            overflow: hidden;
        }

        .umef-videos-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse at 20% 30%, rgba(217, 38, 38, 0.12) 0%, transparent 55%),
                radial-gradient(ellipse at 80% 70%, rgba(217, 38, 38, 0.08) 0%, transparent 50%);
            pointer-events: none;
        }

        .umef-videos-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
            max-width: 1100px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .umef-video-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: flex;
            flex-direction: column;
            backdrop-filter: blur(12px);
        }

        .umef-video-card:hover {
            transform: translateY(-6px);
            border-color: rgba(217, 38, 38, 0.35);
            background: rgba(255, 255, 255, 0.05);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(217, 38, 38, 0.2);
        }

        .umef-video-wrapper {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            overflow: hidden;
            background: #000;
            border-radius: 0;
        }

        .umef-video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }

        .umef-video-body {
            padding: 20px 22px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex-grow: 1;
        }

        .umef-video-tag {
            align-self: flex-start;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(217, 38, 38, 0.15);
            border: 1px solid rgba(217, 38, 38, 0.3);
            color: #ff9e9e;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 3px 11px;
            border-radius: 100px;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        .umef-video-title {
            font-size: 1rem;
            font-weight: 700;
            color: #f1f5f9;
            line-height: 1.4;
            margin: 0;
            transition: color 0.3s ease;
        }

        .umef-video-card:hover .umef-video-title {
            color: #ff8a8a;
        }

        .umef-video-desc {
            font-size: 0.85rem;
            color: #94a3b8;
            line-height: 1.55;
            margin: 0;
        }

        @media (max-width: 992px) {
            .umef-videos-grid {
                display: flex !important;
                flex-direction: row !important;
                overflow-x: auto !important;
                scroll-snap-type: x mandatory !important;
                scroll-behavior: smooth !important;
                -webkit-overflow-scrolling: touch !important;
                gap: 16px !important;
                padding: 10px 20px 20px !important;
                max-width: 100% !important;
            }

            .umef-videos-grid::-webkit-scrollbar {
                display: none !important;
            }

            .umef-video-card {
                scroll-snap-align: start !important;
                flex: 0 0 calc(100% - 40px) !important;
                width: calc(100% - 40px) !important;
            }
        }

        /* ── UMEF Videos Slider (3D Carousel Loop) ── */
        .umef-video-carousel-container {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }

        .umef-video-carousel-track-wrapper {
            overflow: hidden;
            width: 100%;
            padding: 30px 0 50px 0;
            margin-bottom: -30px;
        }

        .umef-video-carousel-track {
            display: flex;
            transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
            gap: 30px;
            will-change: transform;
        }

        .umef-video-carousel-slide {
            flex: 0 0 calc(33.333% - 20px) !important;
            transition: all 0.6s cubic-bezier(0.25, 1, 0.5, 1) !important;
            opacity: 0.45 !important;
            transform: scale(0.9) !important;
            cursor: pointer !important;
            width: auto !important;
            scroll-snap-align: none !important;
        }

        .umef-video-carousel-slide.active {
            opacity: 1 !important;
            transform: scale(1.04) !important;
            z-index: 10 !important;
        }

        @media (max-width: 992px) {
            .umef-video-carousel-slide {
                flex: 0 0 calc(50% - 15px) !important;
            }
        }

        @media (max-width: 600px) {
            .umef-video-carousel-slide {
                flex: 0 0 100% !important;
            }
        }

        /* Video Carousel Buttons */
        .umef-video-carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            width: 48px;
            height: 48px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            color: #ffffff;
            z-index: 15;
        }

        .umef-video-carousel-btn:hover {
            background: var(--umef-primary, #ab0e00);
            color: #ffffff;
            border-color: var(--umef-primary, #ab0e00);
            box-shadow: 0 4px 16px rgba(171, 14, 0, 0.4);
        }

        .umef-video-carousel-btn.prev {
            left: -10px;
        }

        .umef-video-carousel-btn.next {
            right: -10px;
        }

        /* Video Carousel Dots */
        .umef-video-carousel-dots {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 24px;
            position: relative;
            z-index: 3;
        }

        .umef-video-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.25);
            border: none;
            cursor: pointer;
            padding: 0;
            transition: all 0.3s ease;
        }

        .umef-video-dot.active {
            background: var(--umef-primary, #ab0e00);
            width: 24px;
            border-radius: 5px;
        }


        /* Custom Mobile Overrides */
        @media (max-width: 768px) {
            .hero-social-proof {
                display: flex !important;
                flex-direction: column !important;
                align-items: center !important;
                justify-content: center !important;
                text-align: center !important;
                gap: 8px !important;
            }

            .hero-social-proof p {
                display: flex !important;
                flex-direction: column !important;
                justify-content: center !important;
                align-items: center !important;
                text-align: center !important;
                gap: 4px !important;
                margin: 0 !important;
                padding-left: 0 !important;
                padding-right: 0 !important;
            }

            .hero-social-proof p strong {
                color: #ab0e00 !important;
                font-size: 1.4rem !important;
                display: inline-flex !important;
                justify-content: center !important;
                align-items: center !important;
                text-align: center !important;
            }

            .hero-social-proof p strong span {
                display: inline-block !important;
                min-width: auto !important;
                text-align: center !important;
            }

            .hero-social-proof>div:not(.avatars) {
                display: flex !important;
                flex-direction: column !important;
                align-items: center !important;
                gap: 4px !important;
            }

            .hero-social-proof>div:not(.avatars) strong {
                color: #ab0e00 !important;
                font-size: 1.4rem !important;
                display: inline-flex !important;
                justify-content: center !important;
                align-items: center !important;
                text-align: center !important;
            }

            .hero-social-proof>div:not(.avatars) strong span {
                display: inline-block !important;
                min-width: auto !important;
                text-align: center !important;
            }

            .umef-video-carousel-container {
                padding: 0 16px !important;
            }

            .umef-video-carousel-btn {
                display: none !important;
            }

            .hero-scroll-indicator,
            .scroll-down-indicator {
                display: none !important;
            }
        }

        /* Mobile checklist alignment fix */
        @media (max-width: 768px) {
            body .proof-card-checklist {
                align-items: flex-start !important;
                max-width: 100% !important;
                margin: 24px auto 0 !important;
                width: fit-content !important;
                text-align: left !important;
            }

            body .proof-check-item p {
                text-align: left !important;
            }
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>

    <!-- Hero Area -->
    <section class="umef-hero">
        <div class="umef-hero-bg"></div>
        <div class="umef-hero-overlay"></div>
        <div class="umef-hero-container">
            <div class="umef-hero-logo-wrap">
                <a href="https://www.swiss-umef.ch/" target="_blank" rel="noopener" class="umef-hero-logo-link">
                    <img src="/wp-content/uploads/external-migrated/images_b4d597a4.webp" alt="Swiss UMEF Logo"
                        class="umef-hero-circle-logo" fetchpriority="high" decoding="async" />
                </a>
            </div>
            <div class="umef-hero-badge">
                <svg class="svg-icon fa-graduation-cap fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
                <?php echo $is_en ? 'Swiss Partner University' : 'Trường Đối Tác Thụy Sĩ'; ?>
            </div>
            <h1><?php echo $is_en ? 'First private university <span>in Geneva</span> <br />officially accredited in the <span>Swiss higher education system</span>' : 'Đại học tư thục <span>đầu tiên tại Geneva</span> <br />được công nhận chính thức trong <span>hệ thống giáo dục Thụy Sĩ</span>'; ?>
            </h1>
            <div class="verify-slogan">
                <?php echo $is_en ? '"Original Knowledge - Localized Mentorship"' : '"Tri thức Nguyên bản - Đồng hành Bản địa"'; ?>
            </div>

            <p><?php echo $is_en ? 'Swiss UMEF – established in 1984, is accredited by the Swiss Accreditation Council (SAC) and is listed among the official Swiss higher education institutions under Swissuniversities.' : 'Swiss UMEF – thành lập 1984, được công nhận bởi Hội đồng Kiểm định Thụy Sĩ SAC (Swiss Accreditation Council) và nằm trong danh sách các cơ sở giáo dục đại học chính thức thuộc Swissuniversities.'; ?>
            </p>
            <div class="umef-hero-stats">
                <div class="umef-stat-card">
                    <span class="umef-stat-num">1984</span>
                    <span class="umef-stat-lbl"><?php echo $is_en ? 'Founded Year' : 'Năm Thành Lập'; ?></span>
                </div>
                <div class="umef-stat-card">
                    <span class="umef-stat-num">SAC</span>
                    <span
                        class="umef-stat-lbl"><?php echo $is_en ? 'Swiss Accreditation' : 'Kiểm Định Thụy Sĩ'; ?></span>
                </div>
                <div class="umef-stat-card">
                    <span class="umef-stat-num">5 Stars</span>
                    <span class="umef-stat-lbl"><?php echo $is_en ? 'QS Stars Rating' : 'Xếp Hạng QS Stars'; ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Ported Accreditations & Quality Verification Section -->
    <section class="acc-section" id="kiem-dinh-quoc-te" aria-label="<?php echo $is_en ? 'Accreditation &amp; International Recognition' : 'Kiểm định &amp; Công nhận Quốc tế'; ?>">
        <div class="acc-orb acc-orb-1"></div>
        <div class="acc-orb acc-orb-2"></div>
        <div class="acc-orb acc-orb-3"></div>
        <!-- Localized Background Decor -->
        <div class="section-bg-decor">
            <svg class="svg-icon fa-award fa-solid bg-decor-icon decor-lg" style="top: 20%; left: 6%; animation-duration: 26s;" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"/></svg>
            <svg class="svg-icon fa-globe fa-solid bg-decor-icon decor-white decor-sm" style="top: 60%; right: 8%; animation-duration: 34s;" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M352 256c0 22.2-1.2 43.6-3.3 64l-185.3 0c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64l185.3 0c2.2 20.4 3.3 41.8 3.3 64zm28.8-64l123.1 0c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64l-123.1 0c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32l-116.7 0c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0l-176.6 0c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0L18.6 160C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192l123.1 0c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64L8.1 320C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6l176.6 0c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352l116.7 0zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6l116.7 0z"/></svg>
        </div>

        <div class="acc-inner">
            <!-- Header -->
            <div class="acc-header">
                <div class="acc-label">
                    <svg class="svg-icon fa-stamp fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M312 201.8c0-17.4 9.2-33.2 19.9-47C344.5 138.5 352 118.1 352 96c0-53-43-96-96-96s-96 43-96 96c0 22.1 7.5 42.5 20.1 58.8c10.7 13.8 19.9 29.6 19.9 47c0 29.9-24.3 54.2-54.2 54.2L112 256C50.1 256 0 306.1 0 368c0 20.9 13.4 38.7 32 45.3L32 464c0 26.5 21.5 48 48 48l352 0c26.5 0 48-21.5 48-48l0-50.7c18.6-6.6 32-24.4 32-45.3c0-61.9-50.1-112-112-112l-33.8 0c-29.9 0-54.2-24.3-54.2-54.2zM416 416l0 32L96 448l0-32 320 0z"/></svg>
                    <?php echo $is_en ? 'International Accreditation & Recognition' : 'Kiểm định &amp; Công nhận Quốc tế'; ?>
                </div>
                <h2 class="acc-title">
                    <?php echo $is_en ? 'Prestigious <span>International</span> Accreditation' : 'Kiểm định <span>Quốc tế</span> Uy tín'; ?>
                </h2>
                <p class="acc-desc">
                    <?php echo $is_en ? 'Swiss UMEF University is accredited and recognized by leading prestigious authorities and organizations in Switzerland, the United States, and internationally.' : 'Đại học Swiss UMEF được kiểm định và công nhận bởi các cơ quan và tổ chức uy tín hàng đầu Thụy Sĩ, Hoa Kỳ và Quốc tế.'; ?>
                </p>
            </div>

            <!-- SAC Hero Card -->
            <div class="acc-sac-hero">
                <div class="acc-sac-left">
                    <div class="acc-sac-badge">
                        <span class="acc-sac-badge-dot"></span>
                        <?php echo $is_en ? 'Official Recognition from Swiss Government' : 'Công nhận chính thức từ Hội đồng Giáo dục'; ?>
                    </div>
                    <h3 class="acc-sac-name"><button type="button" class="accred-trigger" data-accred="sac"
                            style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s; background: none; border: none; padding: 0; font: inherit; cursor: pointer;"
                            onmouseover="this.style.color='#ab0e00'" onmouseout="this.style.color='inherit'"
                            title="<?php echo $is_en ? 'View SAC Accreditation Details' : 'Xem chi tiết Kiểm định SAC'; ?>">Swiss
                            Accreditation Council <svg class="svg-icon fa-up-right-from-square fa-solid" style="font-size: 0.75em;" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M352 0c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9L370.7 96 201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L416 141.3l41.4 41.4c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6l0-128c0-17.7-14.3-32-32-32L352 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg></button>
                    </h3>
                    <p class="acc-sac-tagline">
                        <?php echo $is_en ? 'Swiss Federal Accreditation Authority. Swiss UMEF is the first private university <strong>in Geneva</strong> to be officially accredited in the Swiss higher education system.' : 'Cơ quan kiểm định liên bang Thụy Sĩ. Swiss UMEF là trường đại học tư thục <strong>đầu tiên tại Geneva</strong> được công nhận chính thức trong hệ thống giáo dục Thụy Sĩ.'; ?>
                    </p>
                    <div class="acc-sac-stats">
                        <div class="acc-sac-stat">
                            <span class="acc-sac-stat-val">Gov</span>
                            <span
                                class="acc-sac-stat-label"><?php echo $is_en ? 'Federal Authority' : 'Thẩm quyền Liên bang'; ?></span>
                        </div>
                        <div class="acc-sac-stat">
                            <span class="acc-sac-stat-val acc-sac-stat-svg-wrap">
                                <svg class="flag-icon" width="28" height="28" viewBox="0 0 18 18">
                                    <circle cx="9" cy="9" r="9" fill="#d52b1e" stroke="#ffffff" stroke-width="1.2">
                                    </circle>
                                    <rect x="7.5" y="4" width="3" height="10" fill="#ffffff"></rect>
                                    <rect x="4" y="7.5" width="10" height="3" fill="#ffffff"></rect>
                                </svg>
                            </span>
                            <span
                                class="acc-sac-stat-label"><?php echo $is_en ? 'Education Council' : 'Hội đồng Giáo dục'; ?></span>
                        </div>
                        <div class="acc-sac-stat">
                            <span class="acc-sac-stat-val">ECTS</span>
                            <span
                                class="acc-sac-stat-label"><?php echo $is_en ? 'European Standards' : 'Tiêu chuẩn Châu Âu'; ?></span>
                        </div>
                    </div>
                </div>
                <div class="acc-sac-right">
                    <div class="acc-sac-logo-wrap">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/SAC_LOGO.png" class="acc-sac-logo-img"
                            alt="Logo SAC - Swiss Accreditation Council" loading="lazy" decoding="async" />
                        <a href="https://ideas.edu.vn/wp-content/uploads/2026/02/5158dd02-aad4-411e-9917-2cf1e287dc1d.webp"
                            target="_blank" rel="noopener noreferrer" class="acc-sac-cert-link">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/02/5158dd02-aad4-411e-9917-2cf1e287dc1d.webp"
                                class="acc-sac-cert-img" alt="<?php echo $is_en ? 'SAC Certificate - Swiss Accreditation Council' : 'Chứng nhận SAC - Swiss Accreditation Council'; ?>"
                                loading="lazy" decoding="async" />
                        </a>
                        <div class="acc-sac-logo-text">
                            <div class="acc-sac-logo-title"><button type="button" class="accred-trigger"
                                    data-accred="sac"
                                    style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s; background: none; border: none; padding: 0; font: inherit; cursor: pointer;"
                                    onmouseover="this.style.color='#ab0e00'" onmouseout="this.style.color='inherit'"
                                    title="<?php echo $is_en ? 'View SAC Accreditation Details' : 'Xem chi tiết Kiểm định SAC'; ?>">Swiss
                                    Accreditation Council <svg class="svg-icon fa-up-right-from-square fa-solid" style="font-size: 0.75em;" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M352 0c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9L370.7 96 201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L416 141.3l41.4 41.4c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6l0-128c0-17.7-14.3-32-32-32L352 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg></button></div>
                            <p><?php echo $is_en ? 'Swiss Federal Accreditation Council<br>Official Recognition from the Swiss Government' : 'Cơ quan kiểm định liên bang Thụy Sĩ<br>Công nhận chính thức từ Hội đồng Giáo dục Thụy Sĩ'; ?></p>
                        </div>
                    </div>
                    <ul class="acc-sac-points">
                        <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg><span><?php echo $is_en ? 'Degrees are legally authenticated by the Embassy of Vietnam in Switzerland' : 'Bằng cấp được hợp pháp hóa lãnh sự tại Đại sứ quán Việt Nam tại Thụy Sĩ'; ?></span>
                        </li>
                        <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg><span><?php echo $is_en ? 'Curriculum meets European standards — ECTS international credits' : 'Chương trình đạt chuẩn châu Âu — ECTS tín chỉ quốc tế'; ?></span>
                        </li>
                        <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg><span><?php echo $is_en ? 'Swiss UMEF is the first private university <strong>in Geneva</strong> to be officially accredited in the Swiss higher education system' : 'Swiss UMEF là trường đại học tư thục <strong>đầu tiên tại Geneva</strong> được công nhận chính thức trong hệ thống giáo dục Thụy Sĩ'; ?></span>
                        </li>
                    </ul>
                    <div class="acc-sac-cert-strip">
                        <a href="https://ideas.edu.vn/wp-content/uploads/2026/02/5158dd02-aad4-411e-9917-2cf1e287dc1d.webp"
                            class="acc-cert-thumb lightbox-trigger" target="_blank" rel="noopener noreferrer">
                            <svg class="svg-icon fa-file-certificate fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM80 64l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L80 96c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm54.2 253.8c-6.1 20.3-24.8 34.2-46 34.2L80 416c-8.8 0-16-7.2-16-16s7.2-16 16-16l8.2 0c7.1 0 13.3-4.6 15.3-11.4l14.9-49.5c3.4-11.3 13.8-19.1 25.6-19.1s22.2 7.7 25.6 19.1l11.6 38.6c7.4-6.2 16.8-9.7 26.8-9.7c15.9 0 30.4 9 37.5 23.2l4.4 8.8 54.1 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-6.1 0-11.6-3.4-14.3-8.8l-8.8-17.7c-1.7-3.4-5.1-5.5-8.8-5.5s-7.2 2.1-8.8 5.5l-8.8 17.7c-2.9 5.9-9.2 9.4-15.7 8.8s-12.1-5.1-13.9-11.3L144 349l-9.8 32.8z"/></svg>
                            <?php echo $is_en ? 'SAC Accreditation Certificate' : 'Chứng nhận kiểm định SAC'; ?>
                        </a>
                        <a href="https://www.swiss-umef.ch/en/partenaires" class="acc-cert-thumb" target="_blank"
                            rel="noopener noreferrer">
                            <svg class="svg-icon fa-globe fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M352 256c0 22.2-1.2 43.6-3.3 64l-185.3 0c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64l185.3 0c2.2 20.4 3.3 41.8 3.3 64zm28.8-64l123.1 0c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64l-123.1 0c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32l-116.7 0c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0l-176.6 0c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0L18.6 160C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192l123.1 0c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64L8.1 320C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6l176.6 0c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352l116.7 0zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6l116.7 0z"/></svg>
                            <?php echo $is_en ? 'Partner Verification from Swiss UMEF' : 'Xác thực đối tác từ Swiss UMEF'; ?>
                        </a>

                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="acc-others-title">
                <?php echo $is_en ? 'Other International Accreditations' : 'Các kiểm định quốc tế khác'; ?></div>

            <!-- Other accreditations grid -->
            <div class="acc-grid">
                <div class="acc-card" data-accred="chea">
                    <img class="acc-card-logo" src="https://ideas.edu.vn/wp-content/uploads/2026/06/kdumef5.webp"
                        alt="CHEA" loading="lazy" decoding="async" />
                    <h4><?php echo $is_en ? 'CHEA – USA' : 'CHEA – Hoa Kỳ'; ?></h4>
                    <p><?php echo $is_en ? 'The leading higher education accreditation council in the United States, ensuring international recognition standards.' : 'Hội đồng kiểm định giáo dục đại học hàng đầu Hoa Kỳ, đảm bảo tiêu chuẩn công nhận quốc tế'; ?>
                    </p>
                </div>
                <div class="acc-card" data-accred="iacbe">
                    <img class="acc-card-logo" src="https://ideas.edu.vn/wp-content/uploads/2026/06/kdumef4.webp"
                        alt="IACBE" loading="lazy" decoding="async" />
                    <h4>IACBE – Business Education</h4>
                    <p><?php echo $is_en ? 'An accreditation organization specializing in international business education quality for BBA, MBA, and DBA.' : 'Tổ chức kiểm định chuyên về chất lượng giáo dục kinh doanh quốc tế cho BBA, MBA và DBA'; ?>
                    </p>
                </div>
                <div class="acc-card" data-accred="acbsp">
                    <img class="acc-card-logo" src="https://ideas.edu.vn/wp-content/uploads/2026/06/kdumef2.webp"
                        alt="ACBSP" loading="lazy" decoding="async" />
                    <h4>ACBSP – Business Schools</h4>
                    <p><?php echo $is_en ? 'Business school quality accreditation officially recognized by the United States Department of Education.' : 'Kiểm định chất lượng trường kinh doanh được Bộ Giáo dục Hoa Kỳ công nhận chính thức'; ?>
                    </p>
                </div>
                <div class="acc-card" data-accred="qs">
                    <img class="acc-card-logo" src="https://ideas.edu.vn/wp-content/uploads/2025/10/qs-1.webp"
                        alt="QS Stars" loading="lazy" decoding="async" />
                    <h4>QS Stars ⭐ 5 Stars Overall</h4>
                    <p><?php echo $is_en ? 'Rated 5 stars overall by Quacquarelli Symonds — the world\'s prestigious university evaluation system.' : 'Xếp hạng 5 sao toàn diện bởi Quacquarelli Symonds — hệ thống đánh giá đại học uy tín thế giới'; ?>
                    </p>
                </div>
                <div class="acc-card" data-accred="eduqua">
                    <img class="acc-card-logo" src="https://ideas.edu.vn/wp-content/uploads/2026/06/kdumef3.webp"
                        alt="EduQua" loading="lazy" decoding="async" />
                    <h4>SGS – EduQua</h4>
                    <p><?php echo $is_en ? 'Swiss quality label recognized by the government, evaluated according to 6 education quality standards.' : 'Nhãn chất lượng Thụy Sĩ được Chính phủ công nhận, đánh giá theo 6 tiêu chuẩn chất lượng giáo dục'; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Geneva Campus Gallery Section (Dark themed for prestige, history, and experience) -->
    <section class="umef-section umef-section-dark" style="background: #040508;">
        <div class="section-header">
            <span class="section-badge"><?php echo $is_en ? 'HERITAGE & PRESTIGE' : 'DI SẢN &amp; UY TÍN'; ?></span>
            <h2 class="section-title">
                <?php echo $is_en ? 'Over 4 Decades of <span>Swiss Elite Education</span>' : 'Hơn 4 thập kỷ <span>đào tạo tinh hoa Thụy Sĩ</span>'; ?>
            </h2>
            <p class="section-subtitle">
                <?php echo $is_en ? 'Inheriting a deep educational heritage since 1984 in Geneva, Swiss UMEF combines the highest federal accreditation prestige with global training experience, building a solid online future for managers.' : 'Kế thừa chiều sâu di sản giáo dục từ năm 1984 tại Geneva, Swiss UMEF kết hợp uy tín kiểm định liên bang cao nhất với kinh nghiệm đào tạo toàn cầu, kiến tạo tương lai trực tuyến vững chắc cho các nhà quản lý.'; ?>
            </p>
        </div>

        <div class="campus-grid">
            <div class="campus-card">
                <div class="campus-img">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/PIX_7701-Olivier-Gay-Perret-Pixipop.webp"
                        alt="Château d'Aï Campus" loading="lazy" />
                </div>
                <div class="campus-body">
                    <h3 class="campus-card-title">
                        <?php echo $is_en ? 'Longevous Academic Heritage' : 'Di sản học thuật lâu đời'; ?></h3>
                    <p class="campus-card-desc">
                        <?php echo $is_en ? 'Guaranteed by a long history with its headquarters located in the ancient castle Château d\'Aï (Geneva, Switzerland), upholding standard intellectual values across generations.' : 'Bảo chứng bởi lịch sử lâu đời và trụ sở chính đặt tại lâu đài cổ kính Château d\'Aï (Geneva, Thụy Sĩ), giữ vững các giá trị tri thức chuẩn mực qua nhiều thế hệ.'; ?>
                    </p>
                </div>
            </div>

            <div class="campus-card">
                <div class="campus-img">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/PIX_7485-Olivier-Gay-Perret-Pixipop-1.webp"
                        alt="UMEF Lecture Hall" loading="lazy" />
                </div>
                <div class="campus-body">
                    <h3 class="campus-card-title">
                        <?php echo $is_en ? 'International Training Experience' : 'Kinh nghiệm đào tạo quốc tế'; ?></h3>
                    <p class="campus-card-desc">
                        <?php echo $is_en ? 'Over 40 years accompanying the learning journey of students from more than 100 countries, delivering experience-rich teaching and global practice.' : 'Hơn 40 năm đồng hành cùng sự nghiệp học tập của học viên từ hơn 100 quốc gia, mang lại phương pháp giảng dạy giàu trải nghiệm và thực tiễn toàn cầu.'; ?>
                    </p>
                </div>
            </div>

            <div class="campus-card">
                <div class="campus-img">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/2023-12-15.webp"
                        alt="UMEF Graduation Event" loading="lazy" />
                </div>
                <div class="campus-body">
                    <h3 class="campus-card-title">
                        <?php echo $is_en ? 'Affirmed International Prestige' : 'Uy tín quốc tế khẳng định'; ?></h3>
                    <p class="campus-card-desc">
                        <?php echo $is_en ? 'Officially accredited by the Swiss Accreditation Council, rated 5 stars by QS Stars, and recognized by the Ministry of Education & Training of Vietnam, ensuring the global value of the prestigious degree.' : 'Được công nhận chính thức bởi Hội đồng Giáo dục Thụy Sĩ, xếp hạng 5 sao QS Stars và được công nhận bởi Bộ GD&amp;ĐT Việt Nam, bảo đảm giá trị tấm bằng danh giá toàn cầu.'; ?>
                    </p>
                </div>
            </div>
    </section>

    <!-- Swiss UMEF News & Prestige Section -->
    <section class="umef-section umef-news-section" id="tin-tuc-su-kien">
        <!-- Localized Background Decor -->
        <div class="section-bg-decor">
            <svg class="svg-icon fa-newspaper fa-solid bg-decor-icon decor-lg" style="top: 25%; left: 6%; animation-duration: 32s;" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 96c0-35.3 28.7-64 64-64l288 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L80 480c-44.2 0-80-35.8-80-80L0 128c0-17.7 14.3-32 32-32s32 14.3 32 32l0 272c0 8.8 7.2 16 16 16s16-7.2 16-16L96 96zm64 24l0 80c0 13.3 10.7 24 24 24l112 0c13.3 0 24-10.7 24-24l0-80c0-13.3-10.7-24-24-24L184 96c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16z"/></svg>
            <svg class="svg-icon fa-handshake fa-solid bg-decor-icon decor-md" style="top: 65%; right: 7%; animation-duration: 24s;" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M323.4 85.2l-96.8 78.4c-16.1 13-19.2 36.4-7 53.1c12.9 17.8 38 21.3 55.3 7.8l99.3-77.2c7-5.4 17-4.2 22.5 2.8s4.2 17-2.8 22.5l-20.9 16.2L512 316.8 512 128l-.7 0-3.9-2.5L434.8 79c-15.3-9.8-33.2-15-51.4-15c-21.8 0-43 7.5-60 21.2zm22.8 124.4l-51.7 40.2C263 274.4 217.3 268 193.7 235.6c-22.2-30.5-16.6-73.1 12.7-96.8l83.2-67.3c-11.6-4.9-24.1-7.4-36.8-7.4C234 64 215.7 69.6 200 80l-72 48 0 224 28.2 0 91.4 83.4c19.6 17.9 49.9 16.5 67.8-3.1c5.5-6.1 9.2-13.2 11.1-20.6l17 15.6c19.5 17.9 49.9 16.6 67.8-2.9c4.5-4.9 7.8-10.6 9.9-16.5c19.4 13 45.8 10.3 62.1-7.5c17.9-19.5 16.6-49.9-2.9-67.8l-134.2-123zM16 128c-8.8 0-16 7.2-16 16L0 352c0 17.7 14.3 32 32 32l32 0c17.7 0 32-14.3 32-32l0-224-80 0zM48 320a16 16 0 1 1 0 32 16 16 0 1 1 0-32zM544 128l0 224c0 17.7 14.3 32 32 32l32 0c17.7 0 32-14.3 32-32l0-208c0-8.8-7.2-16-16-16l-80 0zm32 208a16 16 0 1 1 32 0 16 16 0 1 1 -32 0z"/></svg>
        </div>
        <div class="section-header">
            <span
                class="section-badge"><?php echo $is_en ? 'NEWS & FEATURED EVENTS' : 'TIN TỨC &amp; SỰ KIỆN NỔI BẬT'; ?></span>
            <h2 class="section-title">
                <?php echo $is_en ? '<span>Affirming Position</span> and External Prestige' : '<span>Khẳng định vị thế</span> và uy tín đối ngoại'; ?>
            </h2>
            <p class="section-subtitle">
                <?php echo $is_en ? 'Evidence of a strong strategic partnership and recognition from high-level agencies of Vietnam and Switzerland.' : 'Minh chứng cho mối quan hệ hợp tác chiến lược bền chặt và sự công nhận từ các cơ quan ban ngành cấp cao của Việt Nam và Thụy Sĩ.'; ?>
            </p>
        </div>

        <div class="umef_news_layout">
            <!-- Featured card (left, large) — Phái đoàn Bộ Tài Chính -->
            <a class="umef_news_card_featured" href="https://www.facebook.com/share/p/1CHpxdmHUS/" target="_blank"
                rel="noopener nofollow external noreferrer" data-wpel-link="external">
                <div class="umef_news_card_img">
                    <span class="umef_news_featured_badge"><svg class="svg-icon fa-star fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        <?php echo $is_en ? 'Featured' : 'Nổi bật'; ?></span>
                    <img loading="lazy" decoding="async"
                        src="https://ideas.edu.vn/wp-content/uploads/2025/08/btc_umef.webp"
                        alt="<?php echo $is_en ? 'Vietnam Ministry of Finance delegation visiting Swiss UMEF in Geneva' : 'Phái đoàn Bộ Tài Chính Việt Nam ghé thăm Swiss UMEF tại Geneva'; ?>">
                </div>
                <div class="umef_news_card_body">
                    <div class="umef_news_card_tag"><svg class="svg-icon fa-newspaper fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 96c0-35.3 28.7-64 64-64l288 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L80 480c-44.2 0-80-35.8-80-80L0 128c0-17.7 14.3-32 32-32s32 14.3 32 32l0 272c0 8.8 7.2 16 16 16s16-7.2 16-16L96 96zm64 24l0 80c0 13.3 10.7 24 24 24l112 0c13.3 0 24-10.7 24-24l0-80c0-13.3-10.7-24-24-24L184 96c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16z"/></svg>
                        <?php echo $is_en ? 'External Affairs News' : 'Tin tức đối ngoại'; ?></div>
                    <h3 class="umef_news_card_title">
                        <?php echo $is_en ? 'Vietnam Ministry of Finance Delegation Officially Visits & Works at Swiss UMEF, Geneva' : 'Phái đoàn Bộ Tài Chính Việt Nam chính thức ghé thăm &amp; làm việc tại Swiss UMEF, Geneva'; ?>
                    </h3>
                    <span><?php echo $is_en ? 'On July 30, 2025, Swiss UMEF was honored to welcome the delegation from the Ministry of Finance of Vietnam to visit and work at the Geneva headquarters, affirming the strategic cooperative relationship between the two countries.' : 'Ngày 30/07/2025, Swiss UMEF vinh dự đón tiếp phái đoàn từ Bộ Tài Chính Việt Nam đến thăm và làm việc tại trụ sở Geneva, khẳng định mối quan hệ hợp tác chiến lược giữa hai nước.'; ?></span>
                    <div class="umef_news_card_meta">
                        <svg class="svg-icon fa-calendar fa-regular" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 32l0 32L48 64C21.5 64 0 85.5 0 112l0 48 448 0 0-48c0-26.5-21.5-48-48-48l-48 0 0-32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 32L160 64l0-32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192L0 192 0 464c0 26.5 21.5 48 48 48l352 0c26.5 0 48-21.5 48-48l0-272z"/></svg>
                        <span>30/07/2025</span>
                        <span style="margin: 0 4px;">·</span>
                        <svg class="svg-icon fa-facebook fa-brands" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg>
                        <span>Facebook</span>
                    </div>
                    <div class="umef_news_card_read"><?php echo $is_en ? 'Read Article' : 'Đọc bài viết'; ?> <svg class="svg-icon fa-arrow-right fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg></div>
                </div>
            </a>

            <!-- Card 1: Swiss UMEF cam kết -->
            <a class="umef_news_card umef_news_card--vertical"
                href="https://ideas.edu.vn/tin-tuc-moi/swiss-umef-cam-ket-dong-hanh-cung-hoc-vien-viet-nam-trong-cong-cuoc-phat-trien-nguon-nhan-luc-chat-luong-cao.html"
                target="_blank" data-wpel-link="internal">
                <div class="umef_news_card_img umef_news_card_img--sm">
                    <img loading="lazy" decoding="async"
                        src="https://ideas.edu.vn/wp-content/uploads/2024/10/NHP_3982-1.webp"
                        alt="<?php echo $is_en ? 'Swiss UMEF commits to accompanying Vietnamese students' : 'Swiss UMEF cam kết đồng hành cùng học viên Việt Nam'; ?>">
                </div>
                <div class="umef_news_card_body">
                    <div class="umef_news_card_tag"><svg class="svg-icon fa-graduation-cap fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
                        <?php echo $is_en ? 'Educational Commitment' : 'Cam kết giáo dục'; ?>
                    </div>
                    <b><?php echo $is_en ? 'Swiss UMEF commits to accompanying Vietnamese students in developing high-quality human resources' : 'Swiss UMEF cam kết đồng hành cùng học viên Việt Nam phát triển nguồn nhân lực chất lượng cao'; ?></b>
                    <div class="umef_news_card_meta">
                        <svg class="svg-icon fa-calendar fa-regular" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 32l0 32L48 64C21.5 64 0 85.5 0 112l0 48 448 0 0-48c0-26.5-21.5-48-48-48l-48 0 0-32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 32L160 64l0-32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192L0 192 0 464c0 26.5 21.5 48 48 48l352 0c26.5 0 48-21.5 48-48l0-272z"/></svg>
                        <span>10/2024</span>
                        <span style="margin: 0 4px;">·</span>
                        <svg class="svg-icon fa-link fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z"/></svg>
                        <span>ideas.edu.vn</span>
                    </div>
                    <div class="umef_news_card_read"><?php echo $is_en ? 'See More' : 'Xem thêm'; ?> <svg class="svg-icon fa-arrow-right fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg></div>
                </div>
            </a>
            <!-- Card 2: Chủ tịch Quốc hội -->
            <a class="umef_news_card umef_news_card--vertical"
                href="https://ideas.edu.vn/tin-tuc-moi/toa-dam-xay-dung-va-van-hanh-trung-tam-tai-chinh-quoc-te-mo-ra-co-hoi-nghe-nghiep-voi-bang-cap-chuan-thuy-si.html"
                target="_blank" data-wpel-link="internal">
                <div class="umef_news_card_img umef_news_card_img--sm">
                    <img loading="lazy" decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2026/06/ctqh.webp"
                        alt="<?php echo $is_en ? 'National Assembly Chairman Tran Thanh Man attending the seminar' : 'Chủ tịch Quốc hội Trần Thanh Mẫn dự Tọa đàm'; ?>">
                </div>
                <div class="umef_news_card_body">
                    <div class="umef_news_card_tag"><svg class="svg-icon fa-calendar-check fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zM329 305c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-95 95-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L329 305z"/></svg>
                        <?php echo $is_en ? 'Special Event' : 'Sự kiện đặc biệt'; ?>
                    </div>
                    <b><?php echo $is_en ? 'National Assembly Chairman Tran Thanh Man Attends Seminar on Building International Financial Center' : 'Chủ tịch Quốc hội Trần Thanh Mẫn dự Tọa đàm Xây dựng Trung tâm Tài chính Quốc tế'; ?></b>
                    <div class="umef_news_card_meta">
                        <svg class="svg-icon fa-calendar fa-regular" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 32l0 32L48 64C21.5 64 0 85.5 0 112l0 48 448 0 0-48c0-26.5-21.5-48-48-48l-48 0 0-32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 32L160 64l0-32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192L0 192 0 464c0 26.5 21.5 48 48 48l352 0c26.5 0 48-21.5 48-48l0-272z"/></svg>
                        <span>28/07/2025</span>
                        <span style="margin: 0 4px;">·</span>
                        <svg class="svg-icon fa-link fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z"/></svg>
                        <span>ideas.edu.vn</span>
                    </div>
                    <div class="umef_news_card_read"><?php echo $is_en ? 'See More' : 'Xem thêm'; ?> <svg class="svg-icon fa-arrow-right fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg></div>
                </div>
            </a>
        </div>
    </section>

    <!-- Swiss UMEF Academic Programs Grid -->
    <section class="umef-section">
        <div class="section-header">
            <span class="section-badge"><?php echo $is_en ? 'ACADEMIC PROGRAMS' : 'CHƯƠNG TRÌNH ĐÀO TẠO'; ?></span>
            <h2 class="section-title">
                <?php echo $is_en ? 'International <span>Standard Programs</span>' : 'Chương trình <span>chuẩn quốc tế</span>'; ?>
            </h2>
            <p class="section-subtitle">
                <?php echo $is_en ? 'IDEAS provides lifetime professional academic support for international standard undergraduate and graduate programs from Swiss UMEF.' : 'IDEAS đồng hành hỗ trợ học vụ chuyên nghiệp trọn đời cho các chương trình đại học và sau đại học chuẩn quốc tế từ Swiss UMEF.'; ?>
            </p>
        </div>

        <div class="programs-grid">
            <!-- Card 1: Online MBA -->
            <div class="prog-card-new">
                <div>
                    <div class="prog-card-header">
                        <span class="prog-card-badge">MBA</span>
                        <div class="prog-card-school">
                            <svg class="svg-icon fa-building-columns fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160l0 8c0 13.3 10.7 24 24 24l400 0c13.3 0 24-10.7 24-24l0-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8-3.4-17.2-3.4-25.2 0zM128 224l-64 0 0 196.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512l448 0c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1L448 224l-64 0 0 192-40 0 0-192-64 0 0 192-48 0 0-192-64 0 0 192-40 0 0-192zM256 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                            <span>Swiss UMEF | <?php echo $is_en ? 'Switzerland' : 'Thụy Sĩ'; ?></span>
                        </div>
                    </div>
                    <div class="prog-avatar-container">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/online-mba-1-optimized.webp"
                            alt="Online MBA Avatar" loading="lazy" decoding="async" />
                    </div>
                    <div class="prog-card-title-group">
                        <h3 class="prog-card-title-new">Online MBA</h3>
                        <div class="prog-card-subtitle-new">
                            <?php echo $is_en ? 'Master of Business Administration' : 'Thạc sĩ Quản trị Kinh doanh'; ?>
                        </div>
                    </div>
                    <p class="prog-card-desc-new">
                        <?php echo $is_en ? 'Swiss-standard Online Master of Business Administration program, optimized for busy managers with support from Vietnamese advisors.' : 'Thạc sĩ Quản trị Kinh doanh trực tuyến chuẩn Thụy Sĩ, tối ưu hóa cho nhà quản lý bận rộn với học vụ bổ trợ 100% tiếng Việt.'; ?></p>
                </div>
                <div>
                    <div class="prog-card-specs">
                        <div class="prog-spec-item">
                            <span class="prog-spec-label"><?php echo $is_en ? 'Duration:' : 'Thời gian:'; ?></span>
                            <strong class="prog-spec-value"><?php echo $is_en ? '18 months' : '18 tháng'; ?></strong>
                        </div>
                        <div class="prog-spec-item">
                            <span class="prog-spec-label"><?php echo $is_en ? 'Structure:' : 'Cấu trúc môn:'; ?></span>
                            <strong
                                class="prog-spec-value"><?php echo $is_en ? '90 ECTS - 14 courses & Thesis' : '90 ECTS - 14 môn học &amp; Luận văn'; ?></strong>
                        </div>
                    </div>
                    <div class="prog-card-actions">
                        <a href="/mba"
                            class="prog-btn-detail"><?php echo $is_en ? 'View Details' : 'Xem chi tiết'; ?></a>
                        <button type="button" class="prog-btn-inquire"
                            onclick="showform('swiss-umef-program-mba')"><?php echo $is_en ? 'Get Consultation' : 'Nhận tư vấn'; ?></button>
                    </div>
                </div>
            </div>

            <!-- Card 2: MBA in AI -->
            <div class="prog-card-new">
                <div>
                    <div class="prog-card-header">
                        <span class="prog-card-badge">MBA</span>
                        <div class="prog-card-school">
                            <svg class="svg-icon fa-building-columns fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160l0 8c0 13.3 10.7 24 24 24l400 0c13.3 0 24-10.7 24-24l0-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8-3.4-17.2-3.4-25.2 0zM128 224l-64 0 0 196.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512l448 0c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1L448 224l-64 0 0 192-40 0 0-192-64 0 0 192-48 0 0-192-64 0 0 192-40 0 0-192zM256 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                            <span>Swiss UMEF | <?php echo $is_en ? 'Switzerland' : 'Thụy Sĩ'; ?></span>
                        </div>
                    </div>
                    <div class="prog-avatar-container">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/mba_in_ai-optimized.webp"
                            alt="MBA in AI Avatar" loading="lazy" decoding="async" />
                    </div>
                    <div class="prog-card-title-group">
                        <h3 class="prog-card-title-new">MBA in AI</h3>
                        <div class="prog-card-subtitle-new">
                            <?php echo $is_en ? 'MBA in AI Application' : 'Thạc sĩ QTKD Ứng dụng AI'; ?></div>
                    </div>
                    <p class="prog-card-desc-new">
                        <?php echo $is_en ? 'Breakthrough in management combining traditional business knowledge with modern Artificial Intelligence tools, optimizing digital business performance.' : 'Đột phá trong quản lý khi kết hợp kiến thức kinh doanh truyền thống với các công cụ Trí tuệ Nhân tạo hiện đại, giúp tối ưu hóa hiệu suất doanh nghiệp số.'; ?>
                    </p>
                </div>
                <div>
                    <div class="prog-card-specs">
                        <div class="prog-spec-item">
                            <span class="prog-spec-label"><?php echo $is_en ? 'Duration:' : 'Thời gian:'; ?></span>
                            <strong
                                class="prog-spec-value"><?php echo $is_en ? '16 - 18 months' : '16 - 18 tháng'; ?></strong>
                        </div>
                        <div class="prog-spec-item">
                            <span class="prog-spec-label"><?php echo $is_en ? 'Structure:' : 'Cấu trúc môn:'; ?></span>
                            <strong
                                class="prog-spec-value"><?php echo $is_en ? '90 ECTS - 15 courses & Thesis' : '90 ECTS - 15 môn học &amp; Luận văn'; ?></strong>
                        </div>
                    </div>
                    <div class="prog-card-actions">
                        <a href="/mbainai"
                            class="prog-btn-detail"><?php echo $is_en ? 'View Details' : 'Xem chi tiết'; ?></a>
                        <button type="button" class="prog-btn-inquire"
                            onclick="showform('swiss-umef-program-mbainai')"><?php echo $is_en ? 'Get Consultation' : 'Nhận tư vấn'; ?></button>
                    </div>
                </div>
            </div>

            <!-- Card 3: MSc AI -->
            <div class="prog-card-new">
                <div>
                    <div class="prog-card-header">
                        <span class="prog-card-badge">MSc</span>
                        <div class="prog-card-school">
                            <svg class="svg-icon fa-building-columns fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160l0 8c0 13.3 10.7 24 24 24l400 0c13.3 0 24-10.7 24-24l0-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8-3.4-17.2-3.4-25.2 0zM128 224l-64 0 0 196.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512l448 0c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1L448 224l-64 0 0 192-40 0 0-192-64 0 0 192-48 0 0-192-64 0 0 192-40 0 0-192zM256 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                            <span>Swiss UMEF | <?php echo $is_en ? 'Switzerland' : 'Thụy Sĩ'; ?></span>
                        </div>
                    </div>
                    <div class="prog-avatar-container">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/mscai-optimized.webp"
                            alt="MSc AI Avatar" loading="lazy" decoding="async" />
                    </div>
                    <div class="prog-card-title-group">
                        <h3 class="prog-card-title-new">MSc AI</h3>
                        <div class="prog-card-subtitle-new">
                            <?php echo $is_en ? 'Master of Science in Artificial Intelligence' : 'Thạc sĩ Khoa học Trí tuệ Nhân tạo'; ?>
                        </div>
                    </div>
                    <p class="prog-card-desc-new">
                        <?php echo $is_en ? 'Equips with deep technical and technology management capabilities. Focuses on developing AI solutions and big data processing for real-world problems.' : 'Trang bị năng lực kỹ thuật và quản lý công nghệ chuyên sâu. Tập trung phát triển các giải pháp AI, xử lý dữ liệu lớn phục vụ bài toán thực tế.'; ?>
                    </p>
                </div>
                <div>
                    <div class="prog-card-specs">
                        <div class="prog-spec-item">
                            <span class="prog-spec-label"><?php echo $is_en ? 'Duration:' : 'Thời gian:'; ?></span>
                            <strong class="prog-spec-value"><?php echo $is_en ? '18 months' : '18 tháng'; ?></strong>
                        </div>
                        <div class="prog-spec-item">
                            <span class="prog-spec-label"><?php echo $is_en ? 'Structure:' : 'Cấu trúc môn:'; ?></span>
                            <strong
                                class="prog-spec-value"><?php echo $is_en ? '90 ECTS - 15 courses & Thesis' : '90 ECTS - 15 môn học &amp; Luận văn'; ?></strong>
                        </div>
                    </div>
                    <div class="prog-card-actions">
                        <a href="/mscai"
                            class="prog-btn-detail"><?php echo $is_en ? 'View Details' : 'Xem chi tiết'; ?></a>
                        <button type="button" class="prog-btn-inquire"
                            onclick="showform('swiss-umef-program-mscai')"><?php echo $is_en ? 'Get Consultation' : 'Nhận tư vấn'; ?></button>
                    </div>
                </div>
            </div>

            <!-- Card 4: Executive MBA -->
            <div class="prog-card-new">
                <div>
                    <div class="prog-card-header">
                        <span class="prog-card-badge">MBA</span>
                        <div class="prog-card-school">
                            <svg class="svg-icon fa-building-columns fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160l0 8c0 13.3 10.7 24 24 24l400 0c13.3 0 24-10.7 24-24l0-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8-3.4-17.2-3.4-25.2 0zM128 224l-64 0 0 196.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512l448 0c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1L448 224l-64 0 0 192-40 0 0-192-64 0 0 192-48 0 0-192-64 0 0 192-40 0 0-192zM256 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                            <span>Swiss UMEF | <?php echo $is_en ? 'Switzerland' : 'Thụy Sĩ'; ?></span>
                        </div>
                    </div>
                    <div class="prog-avatar-container">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/emba-optimized.webp"
                            alt="Executive MBA Avatar" loading="lazy" decoding="async" />
                    </div>
                    <div class="prog-card-title-group">
                        <h3 class="prog-card-title-new">Executive MBA</h3>
                        <div class="prog-card-subtitle-new">
                            <?php echo $is_en ? 'Executive Master of Business Administration' : 'Thạc sĩ Điều hành QTKD'; ?>
                        </div>
                    </div>
                    <p class="prog-card-desc-new">
                        <?php echo $is_en ? 'Specially designed for Directors, C-levels, and large business owners. Focuses on enhancing macro strategic planning skills and network expansion.' : 'Thiết kế chuyên biệt cho Giám đốc, C-level và các Chủ doanh nghiệp lớn. Tập trung nâng cao kỹ năng hoạch định chiến lược vĩ mô và mở rộng mạng lưới.'; ?>
                    </p>
                </div>
                <div>
                    <div class="prog-card-specs">
                        <div class="prog-spec-item">
                            <span class="prog-spec-label"><?php echo $is_en ? 'Duration:' : 'Thời gian:'; ?></span>
                            <strong
                                class="prog-spec-value"><?php echo $is_en ? '14 - 16 months' : '14 - 16 tháng'; ?></strong>
                        </div>
                        <div class="prog-spec-item">
                            <span class="prog-spec-label"><?php echo $is_en ? 'Structure:' : 'Cấu trúc môn:'; ?></span>
                            <strong
                                class="prog-spec-value"><?php echo $is_en ? '90 ECTS - 14 courses & Thesis' : '90 ECTS - 14 môn học &amp; Luận văn'; ?></strong>
                        </div>
                    </div>
                    <div class="prog-card-actions">
                        <a href="/emba"
                            class="prog-btn-detail"><?php echo $is_en ? 'View Details' : 'Xem chi tiết'; ?></a>
                        <button type="button" class="prog-btn-inquire"
                            onclick="showform('swiss-umef-program-emba')"><?php echo $is_en ? 'Get Consultation' : 'Nhận tư vấn'; ?></button>
                    </div>
                </div>
            </div>

            <!-- Card 5: Top-up BBA -->
            <div class="prog-card-new">
                <div>
                    <div class="prog-card-header">
                        <span class="prog-card-badge">BBA</span>
                        <div class="prog-card-school">
                            <svg class="svg-icon fa-building-columns fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160l0 8c0 13.3 10.7 24 24 24l400 0c13.3 0 24-10.7 24-24l0-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8-3.4-17.2-3.4-25.2 0zM128 224l-64 0 0 196.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512l448 0c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1L448 224l-64 0 0 192-40 0 0-192-64 0 0 192-48 0 0-192-64 0 0 192-40 0 0-192zM256 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                            <span>Swiss UMEF | <?php echo $is_en ? 'Switzerland' : 'Thụy Sĩ'; ?></span>
                        </div>
                    </div>
                    <div class="prog-avatar-container">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2026/02/TOPUP-optimized.webp"
                            alt="Top-up BBA Avatar" loading="lazy" decoding="async" />
                    </div>
                    <div class="prog-card-title-group">
                        <h3 class="prog-card-title-new">Top-up BBA</h3>
                        <div class="prog-card-subtitle-new">
                            <?php echo $is_en ? 'Top-up Bachelor of Business Administration' : 'Liên thông Cử nhân QTKD'; ?>
                        </div>
                    </div>
                    <p class="prog-card-desc-new">
                        <?php echo $is_en ? 'Swiss BBA Top-up in 12 months for students graduated from college, vocational school or completed 3rd year of university.' : 'Liên thông cử nhân QTKD Thụy Sĩ nhanh chóng trong 12 tháng dành cho học viên đã tốt nghiệp Cao đẳng, Trung cấp hoặc hoàn thành năm 3 Đại học.'; ?>
                    </p>
                </div>
                <div>
                    <div class="prog-card-specs">
                        <div class="prog-spec-item">
                            <span class="prog-spec-label"><?php echo $is_en ? 'Duration:' : 'Thời gian:'; ?></span>
                            <strong class="prog-spec-value"><?php echo $is_en ? '12 months' : '12 tháng'; ?></strong>
                        </div>
                        <div class="prog-spec-item">
                            <span class="prog-spec-label"><?php echo $is_en ? 'Structure:' : 'Cấu trúc môn:'; ?></span>
                            <strong
                                class="prog-spec-value"><?php echo $is_en ? '60 ECTS - 10 courses & Thesis' : '60 ECTS - 10 môn học &amp; Luận văn'; ?></strong>
                        </div>
                    </div>
                    <div class="prog-card-actions">
                        <a href="/bba"
                            class="prog-btn-detail"><?php echo $is_en ? 'View Details' : 'Xem chi tiết'; ?></a>
                        <button type="button" class="prog-btn-inquire"
                            onclick="showform('swiss-umef-program-bba')"><?php echo $is_en ? 'Get Consultation' : 'Nhận tư vấn'; ?></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Swiss UMEF Combined Videos Section -->
    <section class="umef-section umef-videos-section">
        <!-- Localized Background Decor -->
        <div class="section-bg-decor">
            <svg class="svg-icon fa-circle-play fa-solid bg-decor-icon decor-white decor-lg" style="top: 25%; left: 8%; animation-duration: 30s;" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9l0 176c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z"/></svg>
            <svg class="svg-icon fa-comments fa-solid bg-decor-icon decor-white decor-md" style="top: 60%; right: 9%; animation-duration: 26s;" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M208 352c114.9 0 208-78.8 208-176S322.9 0 208 0S0 78.8 0 176c0 38.6 14.7 74.3 39.6 103.4c-3.5 9.4-8.7 17.7-14.2 24.7c-4.8 6.2-9.7 11-13.3 14.3c-1.8 1.6-3.3 2.9-4.3 3.7c-.5 .4-.9 .7-1.1 .8l-.2 .2s0 0 0 0s0 0 0 0C1 327.2-1.4 334.4 .8 340.9S9.1 352 16 352c21.8 0 43.8-5.6 62.1-12.5c9.2-3.5 17.8-7.4 25.2-11.4C134.1 343.3 169.8 352 208 352zM448 176c0 112.3-99.1 196.9-216.5 207C255.8 457.4 336.4 512 432 512c38.2 0 73.9-8.7 104.7-23.9c7.5 4 16 7.9 25.2 11.4c18.3 6.9 40.3 12.5 62.1 12.5c6.9 0 13.1-4.5 15.2-11.1c2.1-6.6-.2-13.8-5.8-17.9c0 0 0 0 0 0s0 0 0 0l-.2-.2c-.2-.2-.6-.4-1.1-.8c-1-.8-2.5-2-4.3-3.7c-3.6-3.3-8.5-8.1-13.3-14.3c-5.5-7-10.7-15.4-14.2-24.7c24.9-29 39.6-64.7 39.6-103.4c0-92.8-84.9-168.9-192.6-175.5c.4 5.1 .6 10.3 .6 15.5z"/></svg>
        </div>
        <div class="section-header">
            <span class="section-badge"
                style="color:#ff9e9e;"><?php echo $is_en ? 'PERSPECTIVES & SHARE' : 'CHIA SẺ &amp; GÓC NHÌN'; ?></span>
            <h2 class="section-title" style="color:#ffffff;">
                <?php echo $is_en ? 'Hear what they say about <span>Swiss UMEF</span>' : 'Lắng nghe chia sẻ về <span>Swiss UMEF</span>'; ?>
            </h2>
            <p class="section-subtitle" style="color:#94a3b8;">
                <?php echo $is_en ? 'Multidimensional perspectives from Swiss Professors and actual learning journeys from students accompanying IDEAS.' : 'Góc nhìn đa chiều từ các Giáo sư Thụy Sĩ và hành trình học tập thực tế từ các học viên của trường đồng hành cùng IDEAS.'; ?>
            </p>
        </div>

        <div class="umef-video-carousel-container">
            <button class="umef-video-carousel-btn prev" aria-label="Previous slide">
                <svg class="svg-icon fa-chevron-left fa-solid" viewBox="0 0 320 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
            </button>
            <div class="umef-video-carousel-track-wrapper">
                <div class="umef-video-carousel-track">
                    <!-- Video 1 -->
                    <div class="umef-video-card umef-video-carousel-slide">
                        <div class="umef-video-wrapper">
                            <iframe src="https://www.youtube.com/embed/sqp1OsXihSg"
                                title="IDEAS - UMEF: Switzerland and Vietnam partnership Potential benefits and future expectations"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                        <div class="umef-video-body">
                            <span class="umef-video-tag"><svg class="svg-icon fa-handshake fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M323.4 85.2l-96.8 78.4c-16.1 13-19.2 36.4-7 53.1c12.9 17.8 38 21.3 55.3 7.8l99.3-77.2c7-5.4 17-4.2 22.5 2.8s4.2 17-2.8 22.5l-20.9 16.2L512 316.8 512 128l-.7 0-3.9-2.5L434.8 79c-15.3-9.8-33.2-15-51.4-15c-21.8 0-43 7.5-60 21.2zm22.8 124.4l-51.7 40.2C263 274.4 217.3 268 193.7 235.6c-22.2-30.5-16.6-73.1 12.7-96.8l83.2-67.3c-11.6-4.9-24.1-7.4-36.8-7.4C234 64 215.7 69.6 200 80l-72 48 0 224 28.2 0 91.4 83.4c19.6 17.9 49.9 16.5 67.8-3.1c5.5-6.1 9.2-13.2 11.1-20.6l17 15.6c19.5 17.9 49.9 16.6 67.8-2.9c4.5-4.9 7.8-10.6 9.9-16.5c19.4 13 45.8 10.3 62.1-7.5c17.9-19.5 16.6-49.9-2.9-67.8l-134.2-123zM16 128c-8.8 0-16 7.2-16 16L0 352c0 17.7 14.3 32 32 32l32 0c17.7 0 32-14.3 32-32l0-224-80 0zM48 320a16 16 0 1 1 0 32 16 16 0 1 1 0-32zM544 128l0 224c0 17.7 14.3 32 32 32l32 0c17.7 0 32-14.3 32-32l0-208c0-8.8-7.2-16-16-16l-80 0zm32 208a16 16 0 1 1 32 0 16 16 0 1 1 -32 0z"/></svg>
                                <?php echo $is_en ? 'Strategic Partnership' : 'Hợp Tác Chiến Lược'; ?></span>
                            <h3 class="umef-video-title">IDEAS - UMEF: Switzerland and Vietnam partnership</h3>
                            <p class="umef-video-desc">
                                <?php echo $is_en ? 'Potential benefits and future expectations – Evaluation from the Professor on sustainable educational cooperation between Switzerland and Vietnam with future expectations.' : 'Potential benefits and future expectations – Đánh giá từ Giáo sư về tiềm năng hợp tác giáo dục bền vững giữa Thụy Sĩ và Việt Nam cùng những kỳ vọng phát triển trong tương lai.'; ?>
                            </p>
                        </div>
                    </div>

                    <!-- Video 2 -->
                    <div class="umef-video-card umef-video-carousel-slide">
                        <div class="umef-video-wrapper">
                            <iframe src="https://www.youtube.com/embed/iacdK2Lx1X4"
                                title="IDEAS - UMEF: In cooperation with IDEAS, what value do you hope to bring to Vietnamese students?"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                        <div class="umef-video-body">
                            <span class="umef-video-tag"><svg class="svg-icon fa-graduation-cap fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
                                <?php echo $is_en ? 'Student Value' : 'Giá Trị Học Viên'; ?></span>
                            <h3 class="umef-video-title">IDEAS - UMEF: Value for Vietnamese Students</h3>
                            <p class="umef-video-desc">In cooperation with IDEAS, what value do you hope to bring to
                                Vietnamese
                                <?php echo $is_en ? 'students? – The Professor shares the practical academic value and career advancement opportunities for students.' : 'students? – Giáo sư chia sẻ về các giá trị học thuật thực tiễn và cơ hội thăng tiến sự nghiệp cho học viên.'; ?>
                            </p>
                        </div>
                    </div>

                    <!-- Video 3: Student Chu Hoàng Thái -->
                    <div class="umef-video-card umef-video-carousel-slide">
                        <div class="umef-video-wrapper">
                            <iframe src="https://www.youtube.com/embed/uahEcE84M2s"
                                title="<?php echo $is_en ? 'Student Testimonial | Chu Hoang Thai - Executive MBA Swiss UMEF' : 'Lắng nghe học viên chia sẻ | Chu Hoàng Thái - Executive MBA Swiss UMEF'; ?>"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                        <div class="umef-video-body">
                            <span class="umef-video-tag"><svg class="svg-icon fa-graduation-cap fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
                                <?php echo $is_en ? 'Executive MBA Student' : 'Học Viên Executive MBA'; ?></span>
                            <h3 class="umef-video-title">Chu Hoàng Thái - Executive MBA Swiss UMEF</h3>
                            <p class="umef-video-desc">
                                <?php echo $is_en ? 'Listen to practical sharing from student Chu Hoang Thai about his learning journey of the executive master program at Swiss UMEF.' : 'Lắng nghe những chia sẻ thực tế từ học viên Chu Hoàng Thái về hành trình học tập chương trình Thạc sĩ điều hành tại Swiss UMEF.'; ?>
                            </p>
                        </div>
                    </div>

                    <!-- Video 4: Student Lê Ngọc Thương -->
                    <div class="umef-video-card umef-video-carousel-slide">
                        <div class="umef-video-wrapper">
                            <iframe src="https://www.youtube.com/embed/z8PpCgGmBs8"
                                title="<?php echo $is_en ? 'Student Testimonial | Le Ngoc Thuong - Executive MBA Swiss UMEF 2024' : 'Lắng nghe học viên chia sẻ | Lê Ngọc Thương - Executive MBA Swiss UMEF 2024'; ?>"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                        <div class="umef-video-body">
                            <span class="umef-video-tag"><svg class="svg-icon fa-graduation-cap fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
                                <?php echo $is_en ? 'Executive MBA Student' : 'Học Viên Executive MBA'; ?></span>
                            <h3 class="umef-video-title">Lê Ngọc Thương - Executive MBA Swiss UMEF 2024</h3>
                            <p class="umef-video-desc">
                                <?php echo $is_en ? 'Sharing from student Le Ngoc Thuong about the practical value, flexibility, and strong support from the IDEAS academic team.' : 'Sharing from student Le Ngoc Thuong about the practical value, flexibility, and strong support from the IDEAS academic team.'; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="umef-video-carousel-btn next" aria-label="Next slide">
                <svg class="svg-icon fa-chevron-right fa-solid" viewBox="0 0 320 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
            </button>
        </div>
        <div class="umef-video-carousel-dots"></div>
    </section>

    <!-- Student Testimonials Section -->
    <section class="umef-section testimonials-section">
        <div class="testi-grid">
            <div class="testi-left">
                <span class="section-badge"><?php echo $is_en ? 'STUDENT TESTIMONIALS' : 'HỌC VIÊN CHIA SẺ'; ?></span>
                <h3><?php echo $is_en ? 'Real Student Experiences' : 'Chia sẻ thực tế từ học viên'; ?></h3>
                <p><?php echo $is_en ? 'Authentic learning experiences, outstanding practical value, and dedicated academic support from IDEAS drive students to successfully conquer graduate programs from Switzerland.' : 'Những trải nghiệm học tập chân thực, giá trị thực tiễn vượt trội và sự hỗ trợ học vụ đồng hành từ IDEAS là động lực giúp các học viên chinh phục thành công chương trình đào tạo sau đại học từ Thụy Sĩ.'; ?>
                </p>
                <button type="button" class="btn btn-primary" onclick="showform('swiss-umef-testimonials')">
                    <?php echo $is_en ? 'Get Free Consultation Route' : 'Nhận lộ trình tư vấn miễn phí'; ?>
                </button>
            </div>
            <div class="testi-quote-card">
                <svg class="svg-icon fa-quote-right fa-solid testi-quote-icon" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M448 296c0 66.3-53.7 120-120 120l-8 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l8 0c30.9 0 56-25.1 56-56l0-8-64 0c-35.3 0-64-28.7-64-64l0-64c0-35.3 28.7-64 64-64l64 0c35.3 0 64 28.7 64 64l0 32 0 32 0 72zm-256 0c0 66.3-53.7 120-120 120l-8 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l8 0c30.9 0 56-25.1 56-56l0-8-64 0c-35.3 0-64-28.7-64-64l0-64c0-35.3 28.7-64 64-64l64 0c35.3 0 64 28.7 64 64l0 32 0 32 0 72z"/></svg>
                <p class="testi-text">
                    <?php echo $is_en ? '"The curriculum of Swiss UMEF is very practical and highly applicable. Thanks to the IDEAS academic support team always by my side explaining terminology, offering 24/7 help, and providing a rich academic library, I could perfectly balance a busy management job and complete my master thesis on time."' : '"Chương trình học của Swiss UMEF thực sự rất thực tế và mang tính ứng dụng cao. Nhờ có đội ngũ hỗ trợ học vụ của IDEAS luôn sát cánh giải thích các thuật ngữ bằng tiếng Việt, hỗ trợ 24/7 và cung cấp thư viện học thuật dồi dào, tôi đã có thể cân bằng hoàn hảo giữa công việc quản lý bận rộn và việc hoàn thành luận văn thạc sĩ đúng hạn."'; ?>
                </p>
                <div class="testi-author">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/swissumef_logo.png"
                        class="testi-author-img" alt="<?php echo $is_en ? 'UMEF Student' : 'Học viên UMEF'; ?>" />
                    <div class="testi-author-info">
                        <h4>Nguyễn Hoàng Minh</h4>
                        <p><?php echo $is_en ? 'Student of Executive MBA Class of 2024' : 'Học viên lớp Executive MBA khóa 2024'; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Tab Script & Form Submission handlers -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Accreditations Tab Switching
            const tabButtons = document.querySelectorAll('.acc-tab-btn');
            const tabPanels = document.querySelectorAll('.acc-panel');

            tabButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const tabId = btn.getAttribute('data-tab');

                    // Active button state
                    tabButtons.forEach(b => {
                        b.classList.toggle('active', b === btn);
                        b.setAttribute('aria-selected', b === btn ? 'true' : 'false');
                    });

                    // Active panel state
                    tabPanels.forEach(panel => {
                        if (panel.id === `panel-${tabId}`) {
                            panel.classList.add('active');
                        } else {
                            panel.classList.remove('active');
                        }
                    });
                });
            });

            // Mobile carousels slide dots logic
            const initMobileSlider = (selector) => {
                const grid = document.querySelector(selector);
                if (!grid) return;

                // Create dots container
                const dotsContainer = document.createElement('div');
                dotsContainer.className = 'slider-dots';

                // Add dots based on children count
                const children = Array.from(grid.children);
                if (children.length <= 1) return;

                children.forEach((child, index) => {
                    const dot = document.createElement('button');
                    dot.type = 'button';
                    dot.className = 'slider-dot' + (index === 0 ? ' active' : '');
                    dot.setAttribute('aria-label', `Go to slide ${index + 1}`);
                    dot.addEventListener('click', () => {
                        const targetScrollLeft = child.offsetLeft - grid.offsetLeft;
                        grid.scrollTo({
                            left: targetScrollLeft,
                            behavior: 'smooth'
                        });
                    });
                    dotsContainer.appendChild(dot);
                });

                grid.parentNode.insertBefore(dotsContainer, grid.nextSibling);

                // Update active dot on scroll
                let isScrolling;
                grid.addEventListener('scroll', () => {
                    window.clearTimeout(isScrolling);
                    isScrolling = setTimeout(() => {
                        const scrollLeft = grid.scrollLeft;
                        let activeIndex = 0;
                        let minDiff = Infinity;
                        children.forEach((child, idx) => {
                            const childLeft = child.offsetLeft - grid.offsetLeft;
                            const diff = Math.abs(childLeft - scrollLeft);
                            if (diff < minDiff) {
                                minDiff = diff;
                                activeIndex = idx;
                            }
                        });

                        const dots = dotsContainer.querySelectorAll('.slider-dot');
                        dots.forEach((dot, idx) => {
                            dot.classList.toggle('active', idx === activeIndex);
                        });
                    }, 50);
                });
            };

            initMobileSlider('.acc-grid');
            initMobileSlider('.campus-grid');
            initMobileSlider('.programs-grid');
            initMobileSlider('.umef_news_layout');

        });
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

    <!-- 3D Videos Loop Carousel Controller -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const track = document.querySelector(".umef-video-carousel-track");
            if (!track) return;
            const originalSlides = Array.from(track.querySelectorAll(".umef-video-carousel-slide"));
            if (originalSlides.length === 0) return;

            const nextBtn = document.querySelector(".umef-video-carousel-btn.next");
            const prevBtn = document.querySelector(".umef-video-carousel-btn.prev");
            const dotsContainer = document.querySelector(".umef-video-carousel-dots");

            const cloneCount = 3;

            const firstClones = originalSlides.slice(0, cloneCount).map(el => el.cloneNode(true));
            const lastClones = originalSlides.slice(-cloneCount).map(el => el.cloneNode(true));

            firstClones.forEach(clone => clone.classList.add("cloned"));
            lastClones.forEach(clone => clone.classList.add("cloned"));

            firstClones.forEach(clone => track.appendChild(clone));
            lastClones.reverse().forEach(clone => track.insertBefore(clone, track.firstChild));

            const allSlides = Array.from(track.querySelectorAll(".umef-video-carousel-slide"));

            let currentIndex = 1;

            dotsContainer.innerHTML = "";
            originalSlides.forEach((_, idx) => {
                const dot = document.createElement("button");
                dot.classList.add("umef-video-dot");
                dot.setAttribute("aria-label", "Xem video " + (idx + 1));
                if (idx === currentIndex) dot.classList.add("active");
                dotsContainer.appendChild(dot);
                dot.addEventListener("click", (e) => {
                    e.stopPropagation();
                    goToSlide(idx);
                });
            });
            const dots = Array.from(dotsContainer.querySelectorAll(".umef-video-dot"));

            allSlides.forEach((slide, idx) => {
                slide.addEventListener("click", () => {
                    let targetOriginalIdx = (idx - cloneCount + originalSlides.length) % originalSlides.length;
                    goToSlide(targetOriginalIdx);
                });
            });

            let isTransitioning = false;

            function updateSlidePosition(useTransition = true) {
                const slideWidth = originalSlides[0].offsetWidth;
                const gap = 30;
                const parentWidth = track.parentElement.offsetWidth;
                const domIndex = currentIndex + cloneCount;

                const offset = - (domIndex * (slideWidth + gap)) + (parentWidth / 2) - (slideWidth / 2);

                if (useTransition) {
                    track.style.transition = "transform 0.5s cubic-bezier(0.25, 1, 0.5, 1)";
                } else {
                    track.style.transition = "none";
                }

                track.style.transform = `translateX(${offset}px)`;

                allSlides.forEach((slide, idx) => {
                    if (idx === domIndex) {
                        slide.classList.add("active");
                    } else {
                        slide.classList.remove("active");
                    }
                });

                dots.forEach((dot, idx) => {
                    if (idx === currentIndex) {
                        dot.classList.add("active");
                    } else {
                        dot.classList.remove("active");
                    }
                });
            }

            function goToSlide(index) {
                if (isTransitioning) return;
                currentIndex = index;
                updateSlidePosition(true);
            }

            function handleNext() {
                if (isTransitioning) return;
                isTransitioning = true;
                currentIndex++;
                updateSlidePosition(true);
            }

            function handlePrev() {
                if (isTransitioning) return;
                isTransitioning = true;
                currentIndex--;
                updateSlidePosition(true);
            }

            if (nextBtn) nextBtn.addEventListener("click", handleNext);
            if (prevBtn) prevBtn.addEventListener("click", handlePrev);

            track.addEventListener("transitionend", () => {
                isTransitioning = false;

                if (currentIndex >= originalSlides.length) {
                    track.style.transition = "none";
                    currentIndex = 0;
                    updateSlidePosition(false);
                }
                else if (currentIndex < 0) {
                    track.style.transition = "none";
                    currentIndex = originalSlides.length - 1;
                    updateSlidePosition(false);
                }
            });

            window.addEventListener("resize", () => {
                updateSlidePosition(false);
            });

            updateSlidePosition(false);

            // Drag support
            let isDragging = false;
            let startPos = 0;
            let currentTranslate = 0;
            let prevTranslate = 0;
            let startX = 0;

            track.addEventListener("touchstart", dragStart);
            track.addEventListener("touchend", dragEnd);
            track.addEventListener("touchmove", dragAction);
            track.addEventListener("mousedown", dragStart);
            track.addEventListener("mouseup", dragEnd);
            track.addEventListener("mouseleave", dragEnd);
            track.addEventListener("mousemove", dragAction);

            function dragStart(event) {
                if (isTransitioning) return;
                isDragging = true;
                startX = getPositionX(event);
                startPos = startX;
                const matrix = new WebKitCSSMatrix(window.getComputedStyle(track).transform);
                prevTranslate = matrix.m41;
                track.style.transition = "none";
            }

            function dragAction(event) {
                if (!isDragging) return;
                const currentPosition = getPositionX(event);
                const diff = currentPosition - startPos;
                currentTranslate = prevTranslate + diff;
                track.style.transform = `translateX(${currentTranslate}px)`;
            }

            function dragEnd(event) {
                if (!isDragging) return;
                isDragging = false;
                const endX = getPositionX(event);
                const diffX = endX - startX;

                const slideWidth = originalSlides[0].offsetWidth;
                const threshold = slideWidth / 4;

                if (Math.abs(diffX) > threshold) {
                    if (diffX > 0) {
                        handlePrev();
                    } else {
                        handleNext();
                    }
                } else {
                    updateSlidePosition(true);
                }
            }

            function getPositionX(event) {
                return event.type.includes('mouse') ? event.pageX : (event.touches && event.touches.length > 0 ? event.touches[0].clientX : (event.changedTouches && event.changedTouches.length > 0 ? event.changedTouches[0].clientX : 0));
            }
        });
    </script>

</body>

</html>