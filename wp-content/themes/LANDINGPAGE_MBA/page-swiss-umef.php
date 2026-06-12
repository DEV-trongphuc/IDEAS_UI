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
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: https://ogp.me/ns#">

<head>
    <!-- Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QKV7LKNLLH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-QKV7LKNLLH');
        gtag('config', 'AW-11205917800');
    </script>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Preconnect to external domains for faster resource loading -->
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="dns-prefetch" href="https://www.googletagmanager.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="dns-prefetch" href="https://www.google-analytics.com">
    <!-- Preload LCP hero background image -->
    <link rel="preload" fetchpriority="high" as="image"
        href="/wp-content/uploads/external-migrated/fc7eeb_82548a7721e6472b9c5f4813e39e94b9_mv2_ea5d6ab4.webp" />

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title>Đại học Swiss UMEF Thụy Sĩ | Đối tác tuyển sinh chính thức IDEAS</title>
        <meta name="description"
            content="Khám phá Đại học Swiss UMEF tại Geneva, Thụy Sĩ. Được công nhận chính thức bởi Hội đồng Giáo dục Thụy Sĩ, xếp hạng 5 sao QS Stars và được công nhận bởi Bộ GD&ĐT Việt Nam." />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Đại học Swiss UMEF Thụy Sĩ | Đối tác tuyển sinh chính thức IDEAS" />
        <meta property="og:description"
            content="Trải nghiệm giáo dục tinh hoa Thụy Sĩ với bằng cấp quốc tế danh giá, được kiểm định bởi SAC, ACBSP, EduQua." />
        <meta property="og:image"
            content="/wp-content/uploads/external-migrated/fc7eeb_82548a7721e6472b9c5f4813e39e94b9_mv2_ea5d6ab4.webp" />
        <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />
    <?php endif; ?>

    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />

    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" / media="print" onload="this.media='all'">

    <!-- Main stylesheet -->
    <?php
    $css_path = get_stylesheet_directory() . '/common-assets/css/style.min.css';
    $css_version = file_exists($css_path) ? filemtime($css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/style.min.css?v=<?php echo $css_version; ?>" />

    <!-- Booking Modal stylesheet -->
    <?php
    define('BOOKING_MODAL_CSS_LOADED', true);
    $bk_css_path = get_stylesheet_directory() . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/booking-modal.min.css?v=<?php echo $bk_css_version; ?>" media="print" onload="this.media='all'" />

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
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
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
            cursor: default;
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
                    <img src="/wp-content/uploads/external-migrated/images_b4d597a4.webp"
                        alt="Swiss UMEF Logo" class="umef-hero-circle-logo" fetchpriority="high" decoding="async" />
                </a>
            </div>
            <div class="umef-hero-badge">
                <i class="fa-solid fa-graduation-cap"></i>
                Trường Đối Tác Thụy Sĩ
            </div>
            <h1>Đại học tư thục <span>đầu tiên tại Geneva</span> <br />được công nhận chính thức trong <span>hệ thống
                    giáo dục Thụy Sĩ</span></h1>
            <p>Swiss UMEF – thành lập 1984, được công nhận bởi Hội đồng Kiểm định Thụy Sĩ SAC (Swiss Accreditation
                Council) và nằm trong danh sách các cơ sở giáo dục đại học chính thức thuộc Swissuniversities.</p>
            <div class="umef-hero-stats">
                <div class="umef-stat-card">
                    <span class="umef-stat-num">1984</span>
                    <span class="umef-stat-lbl">Năm Thành Lập</span>
                </div>
                <div class="umef-stat-card">
                    <span class="umef-stat-num">SAC</span>
                    <span class="umef-stat-lbl">Kiểm Định Thụy Sĩ</span>
                </div>
                <div class="umef-stat-card">
                    <span class="umef-stat-num">5 Stars</span>
                    <span class="umef-stat-lbl">Xếp Hạng QS Stars</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Ported Accreditations & Quality Verification Section -->
    <section class="acc-section" id="kiem-dinh-quoc-te" aria-label="Kiểm định & Công nhận Quốc tế">
        <div class="acc-orb acc-orb-1"></div>
        <div class="acc-orb acc-orb-2"></div>
        <div class="acc-orb acc-orb-3"></div>
        <!-- Localized Background Decor -->
        <div class="section-bg-decor">
            <i class="fa-solid fa-award bg-decor-icon decor-lg"
                style="top: 20%; left: 6%; animation-duration: 26s;"></i>
            <i class="fa-solid fa-globe bg-decor-icon decor-white decor-sm"
                style="top: 60%; right: 8%; animation-duration: 34s;"></i>
        </div>

        <div class="acc-inner">
            <!-- Header -->
            <div class="acc-header">
                <div class="acc-label">
                    <i class="fa-solid fa-stamp"></i>
                    Kiểm định &amp; Công nhận Quốc tế
                </div>
                <h2 class="acc-title">
                    Kiểm định <span>Quốc tế</span> Uy tín
                </h2>
                <p class="acc-desc">Đại học Swiss UMEF được kiểm định và công nhận bởi các cơ quan và tổ chức uy tín
                    hàng đầu Thụy Sĩ, Hoa Kỳ và Quốc tế.</p>
            </div>

            <!-- SAC Hero Card -->
            <div class="acc-sac-hero">
                <div class="acc-sac-left">
                    <div class="acc-sac-badge">
                        <span class="acc-sac-badge-dot"></span>
                        Công nhận chính thức từ Hội đồng Giáo dục
                    </div>
                    <h3 class="acc-sac-name">Swiss Accreditation Council <a
                            href="https://ideas.edu.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si.html"
                            target="_blank"
                            style="color: inherit; font-size: 0.75em; margin-left: 8px; display: inline-flex; align-items: center; transition: color 0.3s;"
                            onmouseover="this.style.color='#ab0e00'" onmouseout="this.style.color='inherit'"
                            title="Xem bài viết về Kiểm định SAC"><i class="fa-solid fa-up-right-from-square"></i></a>
                    </h3>
                    <p class="acc-sac-tagline">Cơ quan kiểm định liên bang Thụy Sĩ. Swiss UMEF là trường đại học tư thục
                        <strong>đầu tiên tại Geneva</strong> được công nhận chính thức trong hệ thống giáo dục Thụy Sĩ.
                    </p>
                    <div class="acc-sac-stats">
                        <div class="acc-sac-stat">
                            <span class="acc-sac-stat-val">Gov</span>
                            <span class="acc-sac-stat-label">Thẩm quyền Liên bang</span>
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
                            <span class="acc-sac-stat-label">Hội đồng Giáo dục</span>
                        </div>
                        <div class="acc-sac-stat">
                            <span class="acc-sac-stat-val">ECTS</span>
                            <span class="acc-sac-stat-label">Tiêu chuẩn Châu Âu</span>
                        </div>
                    </div>
                </div>
                <div class="acc-sac-right">
                    <div class="acc-sac-logo-wrap">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/SAC_LOGO.png"
                            class="acc-sac-logo-img" alt="Logo SAC - Swiss Accreditation Council" loading="lazy"
                            decoding="async" />
                        <a href="https://ideas.edu.vn/wp-content/uploads/2026/06/sac.webp" target="_blank"
                            rel="noopener noreferrer" class="acc-sac-cert-link">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/sac.webp"
                                class="acc-sac-cert-img" alt="Chứng nhận SAC - Swiss Accreditation Council"
                                loading="lazy" decoding="async" />
                        </a>
                        <div class="acc-sac-logo-text">
                            <div class="acc-sac-logo-title"><a href="https://ideas.edu.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si.html" target="_blank" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this.style.color='#ab0e00'" onmouseout="this.style.color='inherit'" title="Xem bài viết về Kiểm định SAC">Swiss Accreditation Council <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a></div>
                            <p>Cơ quan kiểm định liên bang Thụy Sĩ<br>Công nhận chính thức từ Hội đồng Giáo dục Thụy Sĩ
                            </p>
                        </div>
                    </div>
                    <ul class="acc-sac-points">
                        <li><i class="fa-solid fa-circle-check"></i><span>Bằng cấp được hợp pháp hóa lãnh sự tại Đại sứ
                                quán Việt Nam tại Thụy Sĩ</span></li>
                        <li><i class="fa-solid fa-circle-check"></i><span>Chương trình đạt chuẩn châu Âu — ECTS tín chỉ
                                quốc tế</span></li>
                        <li><i class="fa-solid fa-circle-check"></i><span>Swiss UMEF là trường đại học tư thục
                                <strong>đầu tiên tại Geneva</strong> được công nhận chính thức trong hệ thống giáo dục
                                Thụy Sĩ</span></li>
                    </ul>
                    <div class="acc-sac-cert-strip">
                        <a href="https://ideas.edu.vn/wp-content/uploads/2026/06/sac.webp"
                            class="acc-cert-thumb lightbox-trigger" target="_blank" rel="noopener noreferrer">
                            <i class="fa-solid fa-file-certificate"></i>
                            Chứng nhận kiểm định SAC
                        </a>
                        <a href="https://www.swiss-umef.ch/en/partenaires" class="acc-cert-thumb" target="_blank"
                            rel="noopener noreferrer">
                            <i class="fa-solid fa-globe"></i>
                            Xác thực đối tác từ Swiss UMEF
                        </a>

                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="acc-others-title">Các kiểm định quốc tế khác</div>

            <!-- Other accreditations grid -->
            <div class="acc-grid">
                <div class="acc-card">
                    <img class="acc-card-logo" src="https://ideas.edu.vn/wp-content/uploads/2026/06/kdumef5.png"
                        alt="CHEA" loading="lazy" decoding="async" />
                    <h4>CHEA – Hoa Kỳ</h4>
                    <p>Hội đồng kiểm định giáo dục đại học hàng đầu Hoa Kỳ, đảm bảo tiêu chuẩn công nhận quốc tế</p>
                </div>
                <div class="acc-card">
                    <img class="acc-card-logo" src="https://ideas.edu.vn/wp-content/uploads/2026/06/kdumef4.png"
                        alt="IACBE" loading="lazy" decoding="async" />
                    <h4>IACBE – Business Education</h4>
                    <p>Tổ chức kiểm định chuyên về chất lượng giáo dục kinh doanh quốc tế cho BBA, MBA và DBA</p>
                </div>
                <div class="acc-card">
                    <img class="acc-card-logo" src="https://ideas.edu.vn/wp-content/uploads/2026/06/kdumef2.png"
                        alt="ACBSP" loading="lazy" decoding="async" />
                    <h4>ACBSP – Business Schools</h4>
                    <p>Kiểm định chất lượng trường kinh doanh được Bộ Giáo dục Hoa Kỳ công nhận chính thức</p>
                </div>
                <div class="acc-card">
                    <img class="acc-card-logo" src="https://ideas.edu.vn/wp-content/uploads/2025/10/qs-1.webp"
                        alt="QS Stars" loading="lazy" decoding="async" />
                    <h4>QS Stars ⭐ 5 Stars Overall</h4>
                    <p>Xếp hạng 5 sao toàn diện bởi Quacquarelli Symonds — hệ thống đánh giá đại học uy tín thế giới</p>
                </div>
                <div class="acc-card">
                    <img class="acc-card-logo" src="https://ideas.edu.vn/wp-content/uploads/2026/06/kdumef3.png"
                        alt="EduQua" loading="lazy" decoding="async" />
                    <h4>SGS – EduQua</h4>
                    <p>Nhãn chất lượng Thụy Sĩ được Chính phủ công nhận, đánh giá theo 6 tiêu chuẩn chất lượng giáo dục
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Geneva Campus Gallery Section (Dark themed for prestige, history, and experience) -->
    <section class="umef-section umef-section-dark" style="background: #040508;">
        <div class="section-header">
            <span class="section-badge">DI SẢN &amp; UY TÍN</span>
            <h2 class="section-title">Hơn 4 thập kỷ <span>đào tạo tinh hoa Thụy Sĩ</span></h2>
            <p class="section-subtitle">Kế thừa chiều sâu di sản giáo dục từ năm 1984 tại Geneva, Swiss UMEF kết hợp uy
                tín kiểm định liên bang cao nhất với kinh nghiệm đào tạo toàn cầu, kiến tạo tương lai trực tuyến vững
                chắc cho các nhà quản lý.</p>
        </div>

        <div class="campus-grid">
            <div class="campus-card">
                <div class="campus-img">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/PIX_7701-Olivier-Gay-Perret-Pixipop.jpg"
                        alt="Château d'Aï Campus" loading="lazy" />
                </div>
                <div class="campus-body">
                    <h3 class="campus-card-title">Di sản học thuật lâu đời</h3>
                    <p class="campus-card-desc">Bảo chứng bởi lịch sử lâu đời và trụ sở chính đặt tại lâu đài cổ kính
                        Château d'Aï (Geneva, Thụy Sĩ), giữ vững các giá trị tri thức chuẩn mực qua nhiều thế hệ.</p>
                </div>
            </div>

            <div class="campus-card">
                <div class="campus-img">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/PIX_7485-Olivier-Gay-Perret-Pixipop-1.jpg"
                        alt="UMEF Lecture Hall" loading="lazy" />
                </div>
                <div class="campus-body">
                    <h3 class="campus-card-title">Kinh nghiệm đào tạo quốc tế</h3>
                    <p class="campus-card-desc">Hơn 40 năm đồng hành cùng sự nghiệp học tập của học viên từ hơn 100 quốc
                        gia, mang lại phương pháp giảng dạy giàu trải nghiệm và thực tiễn toàn cầu.</p>
                </div>
            </div>

            <div class="campus-card">
                <div class="campus-img">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/2023-12-15.jpg"
                        alt="UMEF Graduation Event" loading="lazy" />
                </div>
                <div class="campus-body">
                    <h3 class="campus-card-title">Uy tín quốc tế khẳng định</h3>
                    <p class="campus-card-desc">Được công nhận chính thức bởi Hội đồng Giáo dục Thụy Sĩ, xếp hạng 5 sao
                        QS Stars và được
                        công nhận bởi Bộ GD&amp;ĐT Việt Nam, bảo đảm giá trị tấm bằng danh giá toàn cầu.</p>
                </div>
            </div>
    </section>

    <!-- Swiss UMEF News & Prestige Section -->
    <section class="umef-section umef-news-section" id="tin-tuc-su-kien">
        <!-- Localized Background Decor -->
        <div class="section-bg-decor">
            <i class="fa-solid fa-newspaper bg-decor-icon decor-lg"
                style="top: 25%; left: 6%; animation-duration: 32s;"></i>
            <i class="fa-solid fa-handshake bg-decor-icon decor-md"
                style="top: 65%; right: 7%; animation-duration: 24s;"></i>
        </div>
        <div class="section-header">
            <span class="section-badge">TIN TỨC &amp; SỰ KIỆN NỔI BẬT</span>
            <h2 class="section-title"><span>Khẳng định vị thế</span> và uy tín đối ngoại</h2>
            <p class="section-subtitle">Minh chứng cho mối quan hệ hợp tác chiến lược bền chặt và sự công nhận từ các cơ
                quan ban ngành cấp cao của Việt Nam và Thụy Sĩ.</p>
        </div>

        <div class="umef_news_layout">
            <!-- Featured card (left, large) — Phái đoàn Bộ Tài Chính -->
            <a class="umef_news_card_featured" href="https://www.facebook.com/share/p/1CHpxdmHUS/" target="_blank"
                rel="noopener nofollow external noreferrer" data-wpel-link="external">
                <div class="umef_news_card_img">
                    <span class="umef_news_featured_badge"><i class="fa-solid fa-star"></i> Nổi bật</span>
                    <img loading="lazy" decoding="async"
                        src="https://ideas.edu.vn/wp-content/uploads/2025/08/btc_umef.webp"
                        alt="Phái đoàn Bộ Tài Chính Việt Nam ghé thăm Swiss UMEF tại Geneva">
                </div>
                <div class="umef_news_card_body">
                    <div class="umef_news_card_tag"><i class="fa-solid fa-newspaper"></i> Tin tức đối ngoại</div>
                    <h3 class="umef_news_card_title">Phái đoàn Bộ Tài Chính Việt Nam chính thức ghé thăm &amp; làm việc
                        tại Swiss UMEF, Geneva</h3>
                    <span>Ngày 30/07/2025, Swiss UMEF vinh dự đón tiếp phái đoàn từ Bộ Tài Chính Việt Nam đến thăm và
                        làm việc tại trụ sở Geneva, khẳng định mối quan hệ hợp tác chiến lược giữa hai nước.</span>
                    <div class="umef_news_card_meta">
                        <i class="fa-regular fa-calendar"></i>
                        <span>30/07/2025</span>
                        <span style="margin: 0 4px;">·</span>
                        <i class="fa-brands fa-facebook"></i>
                        <span>Facebook</span>
                    </div>
                    <div class="umef_news_card_read">Đọc bài viết <i class="fa-solid fa-arrow-right"></i></div>
                </div>
            </a>

            <!-- Card 1: Swiss UMEF cam kết -->
            <a class="umef_news_card umef_news_card--vertical"
                href="https://ideas.edu.vn/tin-tuc-moi/swiss-umef-cam-ket-dong-hanh-cung-hoc-vien-viet-nam-trong-cong-cuoc-phat-trien-nguon-nhan-luc-chat-luong-cao.html"
                target="_blank" data-wpel-link="internal">
                <div class="umef_news_card_img umef_news_card_img--sm">
                    <img loading="lazy" decoding="async"
                        src="https://ideas.edu.vn/wp-content/uploads/2024/10/NHP_3982-1.jpg"
                        alt="Swiss UMEF cam kết đồng hành cùng học viên Việt Nam">
                </div>
                <div class="umef_news_card_body">
                    <div class="umef_news_card_tag"><i class="fa-solid fa-graduation-cap"></i> Cam kết giáo dục
                    </div>
                    <b>Swiss UMEF cam kết đồng hành cùng học viên Việt Nam phát triển nguồn nhân lực chất lượng
                        cao</b>
                    <div class="umef_news_card_meta">
                        <i class="fa-regular fa-calendar"></i>
                        <span>10/2024</span>
                        <span style="margin: 0 4px;">·</span>
                        <i class="fa-solid fa-link"></i>
                        <span>ideas.edu.vn</span>
                    </div>
                    <div class="umef_news_card_read">Xem thêm <i class="fa-solid fa-arrow-right"></i></div>
                </div>
            </a>
            <!-- Card 2: Chủ tịch Quốc hội -->
            <a class="umef_news_card umef_news_card--vertical"
                href="https://ideas.edu.vn/tin-tuc-moi/toa-dam-xay-dung-va-van-hanh-trung-tam-tai-chinh-quoc-te-mo-ra-co-hoi-nghe-nghiep-voi-bang-cap-chuan-thuy-si.html"
                target="_blank" data-wpel-link="internal">
                <div class="umef_news_card_img umef_news_card_img--sm">
                    <img loading="lazy" decoding="async"
                        src="https://ideas.edu.vn/wp-content/uploads/2026/06/ctqh.webp"
                        alt="Chủ tịch Quốc hội Trần Thanh Mẫn dự Tọa đàm">
                </div>
                <div class="umef_news_card_body">
                    <div class="umef_news_card_tag"><i class="fa-solid fa-calendar-check"></i> Sự kiện đặc biệt
                    </div>
                    <b>Chủ tịch Quốc hội Trần Thanh Mẫn dự Tọa đàm Xây dựng Trung tâm Tài chính Quốc tế</b>
                    <div class="umef_news_card_meta">
                        <i class="fa-regular fa-calendar"></i>
                        <span>28/07/2025</span>
                        <span style="margin: 0 4px;">·</span>
                        <i class="fa-solid fa-link"></i>
                        <span>ideas.edu.vn</span>
                    </div>
                    <div class="umef_news_card_read">Xem thêm <i class="fa-solid fa-arrow-right"></i></div>
                </div>
            </a>
        </div>
    </section>

    <!-- Swiss UMEF Academic Programs Grid -->
    <section class="umef-section">
        <div class="section-header">
            <span class="section-badge">CHƯƠNG TRÌNH ĐÀO TẠO</span>
            <h2 class="section-title">Chương trình <span>chuẩn quốc tế</span></h2>
            <p class="section-subtitle">IDEAS đồng hành hỗ trợ học vụ chuyên nghiệp trọn đời cho các chương trình
                đại học và sau đại học chuẩn quốc tế từ Swiss UMEF.</p>
        </div>

        <div class="programs-grid">
            <!-- Card 1: Online MBA -->
            <div class="prog-card-new">
                <div>
                    <div class="prog-card-header">
                        <span class="prog-card-badge">MBA</span>
                        <div class="prog-card-school">
                            <i class="fa-solid fa-building-columns"></i>
                            <span>Swiss UMEF | Thụy Sĩ</span>
                        </div>
                    </div>
                    <div class="prog-avatar-container">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/online-mba-1-optimized.webp"
                            alt="Online MBA Avatar" loading="lazy" decoding="async" />
                    </div>
                    <div class="prog-card-title-group">
                        <h3 class="prog-card-title-new">Online MBA</h3>
                        <div class="prog-card-subtitle-new">Thạc sĩ Quản trị Kinh doanh</div>
                    </div>
                    <p class="prog-card-desc-new">Thạc sĩ Quản trị Kinh doanh trực tuyến chuẩn Thụy Sĩ, tối ưu hóa cho
                        nhà quản lý bận rộn với học vụ bổ trợ 100% tiếng Việt.</p>
                </div>
                <div>
                    <div class="prog-card-specs">
                        <div class="prog-spec-item">
                            <span class="prog-spec-label">Thời gian:</span>
                            <strong class="prog-spec-value">18 tháng</strong>
                        </div>
                        <div class="prog-spec-item">
                            <span class="prog-spec-label">Cấu trúc môn:</span>
                            <strong class="prog-spec-value">90 ECTS - 14 môn học &amp; Luận văn</strong>
                        </div>
                    </div>
                    <div class="prog-card-actions">
                        <a href="/mba" class="prog-btn-detail">Xem chi tiết</a>
                        <button type="button" class="prog-btn-inquire" onclick="showform('swiss-umef-program-mba')">Nhận
                            tư vấn</button>
                    </div>
                </div>
            </div>

            <!-- Card 2: MBA in AI -->
            <div class="prog-card-new">
                <div>
                    <div class="prog-card-header">
                        <span class="prog-card-badge">MBA</span>
                        <div class="prog-card-school">
                            <i class="fa-solid fa-building-columns"></i>
                            <span>Swiss UMEF | Thụy Sĩ</span>
                        </div>
                    </div>
                    <div class="prog-avatar-container">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/mba_in_ai-optimized.webp"
                            alt="MBA in AI Avatar" loading="lazy" decoding="async" />
                    </div>
                    <div class="prog-card-title-group">
                        <h3 class="prog-card-title-new">MBA in AI</h3>
                        <div class="prog-card-subtitle-new">Thạc sĩ QTKD Ứng dụng AI</div>
                    </div>
                    <p class="prog-card-desc-new">Đột phá trong quản lý khi kết hợp kiến thức kinh doanh truyền thống
                        với các công cụ Trí tuệ Nhân tạo hiện đại, giúp tối ưu hóa hiệu suất doanh nghiệp số.</p>
                </div>
                <div>
                    <div class="prog-card-specs">
                        <div class="prog-spec-item">
                            <span class="prog-spec-label">Thời gian:</span>
                            <strong class="prog-spec-value">16 - 18 tháng</strong>
                        </div>
                        <div class="prog-spec-item">
                            <span class="prog-spec-label">Cấu trúc môn:</span>
                            <strong class="prog-spec-value">90 ECTS - 15 môn học &amp; Luận văn</strong>
                        </div>
                    </div>
                    <div class="prog-card-actions">
                        <a href="/mbainai" class="prog-btn-detail">Xem chi tiết</a>
                        <button type="button" class="prog-btn-inquire"
                            onclick="showform('swiss-umef-program-mbainai')">Nhận tư vấn</button>
                    </div>
                </div>
            </div>

            <!-- Card 3: MSc AI -->
            <div class="prog-card-new">
                <div>
                    <div class="prog-card-header">
                        <span class="prog-card-badge">MSc</span>
                        <div class="prog-card-school">
                            <i class="fa-solid fa-building-columns"></i>
                            <span>Swiss UMEF | Thụy Sĩ</span>
                        </div>
                    </div>
                    <div class="prog-avatar-container">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/mscai-optimized.webp" alt="MSc AI Avatar"
                            loading="lazy" decoding="async" />
                    </div>
                    <div class="prog-card-title-group">
                        <h3 class="prog-card-title-new">MSc AI</h3>
                        <div class="prog-card-subtitle-new">Thạc sĩ Khoa học Trí tuệ Nhân tạo</div>
                    </div>
                    <p class="prog-card-desc-new">Trang bị năng lực kỹ thuật và quản lý công nghệ chuyên sâu. Tập trung
                        phát triển các giải pháp AI, xử lý dữ liệu lớn phục vụ bài toán thực tế.</p>
                </div>
                <div>
                    <div class="prog-card-specs">
                        <div class="prog-spec-item">
                            <span class="prog-spec-label">Thời gian:</span>
                            <strong class="prog-spec-value">18 tháng</strong>
                        </div>
                        <div class="prog-spec-item">
                            <span class="prog-spec-label">Cấu trúc môn:</span>
                            <strong class="prog-spec-value">90 ECTS - 15 môn học &amp; Luận văn</strong>
                        </div>
                    </div>
                    <div class="prog-card-actions">
                        <a href="/mscai" class="prog-btn-detail">Xem chi tiết</a>
                        <button type="button" class="prog-btn-inquire"
                            onclick="showform('swiss-umef-program-mscai')">Nhận tư vấn</button>
                    </div>
                </div>
            </div>

            <!-- Card 4: Executive MBA -->
            <div class="prog-card-new">
                <div>
                    <div class="prog-card-header">
                        <span class="prog-card-badge">MBA</span>
                        <div class="prog-card-school">
                            <i class="fa-solid fa-building-columns"></i>
                            <span>Swiss UMEF | Thụy Sĩ</span>
                        </div>
                    </div>
                    <div class="prog-avatar-container">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/emba-optimized.webp"
                            alt="Executive MBA Avatar" loading="lazy" decoding="async" />
                    </div>
                    <div class="prog-card-title-group">
                        <h3 class="prog-card-title-new">Executive MBA</h3>
                        <div class="prog-card-subtitle-new">Thạc sĩ Điều hành QTKD</div>
                    </div>
                    <p class="prog-card-desc-new">Thiết kế chuyên biệt cho Giám đốc, C-level và các Chủ doanh nghiệp
                        lớn. Tập trung nâng cao kỹ năng hoạch định chiến lược vĩ mô và mở rộng mạng lưới.</p>
                </div>
                <div>
                    <div class="prog-card-specs">
                        <div class="prog-spec-item">
                            <span class="prog-spec-label">Thời gian:</span>
                            <strong class="prog-spec-value">14 - 16 tháng</strong>
                        </div>
                        <div class="prog-spec-item">
                            <span class="prog-spec-label">Cấu trúc môn:</span>
                            <strong class="prog-spec-value">90 ECTS - 14 môn học &amp; Luận văn</strong>
                        </div>
                    </div>
                    <div class="prog-card-actions">
                        <a href="/emba" class="prog-btn-detail">Xem chi tiết</a>
                        <button type="button" class="prog-btn-inquire"
                            onclick="showform('swiss-umef-program-emba')">Nhận tư vấn</button>
                    </div>
                </div>
            </div>

            <!-- Card 5: Top-up BBA -->
            <div class="prog-card-new">
                <div>
                    <div class="prog-card-header">
                        <span class="prog-card-badge">BBA</span>
                        <div class="prog-card-school">
                            <i class="fa-solid fa-building-columns"></i>
                            <span>Swiss UMEF | Thụy Sĩ</span>
                        </div>
                    </div>
                    <div class="prog-avatar-container">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2026/02/TOPUP-optimized.webp" alt="Top-up BBA Avatar"
                            loading="lazy" decoding="async" />
                    </div>
                    <div class="prog-card-title-group">
                        <h3 class="prog-card-title-new">Top-up BBA</h3>
                        <div class="prog-card-subtitle-new">Liên thông Cử nhân QTKD</div>
                    </div>
                    <p class="prog-card-desc-new">Liên thông cử nhân QTKD Thụy Sĩ nhanh chóng trong 12 tháng dành cho
                        học viên đã tốt nghiệp Cao đẳng, Trung cấp hoặc hoàn thành năm 3 Đại học.</p>
                </div>
                <div>
                    <div class="prog-card-specs">
                        <div class="prog-spec-item">
                            <span class="prog-spec-label">Thời gian:</span>
                            <strong class="prog-spec-value">12 tháng</strong>
                        </div>
                        <div class="prog-spec-item">
                            <span class="prog-spec-label">Cấu trúc môn:</span>
                            <strong class="prog-spec-value">60 ECTS - 10 môn học &amp; Luận văn</strong>
                        </div>
                    </div>
                    <div class="prog-card-actions">
                        <a href="/bba" class="prog-btn-detail">Xem chi tiết</a>
                        <button type="button" class="prog-btn-inquire" onclick="showform('swiss-umef-program-bba')">Nhận
                            tư vấn</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Swiss UMEF Combined Videos Section -->
    <section class="umef-section umef-videos-section">
        <!-- Localized Background Decor -->
        <div class="section-bg-decor">
            <i class="fa-solid fa-circle-play bg-decor-icon decor-white decor-lg"
                style="top: 25%; left: 8%; animation-duration: 30s;"></i>
            <i class="fa-solid fa-comments bg-decor-icon decor-white decor-md"
                style="top: 60%; right: 9%; animation-duration: 26s;"></i>
        </div>
        <div class="section-header">
            <span class="section-badge" style="color:#ff9e9e;">CHIA SẺ &amp; GÓC NHÌN</span>
            <h2 class="section-title" style="color:#ffffff;">Lắng nghe chia sẻ về <span>Swiss UMEF</span></h2>
            <p class="section-subtitle" style="color:#94a3b8;">Góc nhìn đa chiều từ các Giáo sư Thụy Sĩ và hành trình
                học tập thực tế từ các
                học viên của trường đồng hành cùng IDEAS.</p>
        </div>

        <div class="umef-video-carousel-container">
            <button class="umef-video-carousel-btn prev" aria-label="Previous slide">
                <i class="fa-solid fa-chevron-left"></i>
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
                            <span class="umef-video-tag"><i class="fa-solid fa-handshake"></i> Hợp Tác Chiến Lược</span>
                            <h3 class="umef-video-title">IDEAS - UMEF: Switzerland and Vietnam partnership</h3>
                            <p class="umef-video-desc">Potential benefits and future expectations – Đánh giá từ Giáo sư
                                về tiềm
                                năng hợp tác giáo dục bền vững giữa Thụy Sĩ và Việt Nam cùng những kỳ vọng phát triển
                                trong
                                tương lai.</p>
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
                            <span class="umef-video-tag"><i class="fa-solid fa-graduation-cap"></i> Giá Trị Học
                                Viên</span>
                            <h3 class="umef-video-title">IDEAS - UMEF: Value for Vietnamese Students</h3>
                            <p class="umef-video-desc">In cooperation with IDEAS, what value do you hope to bring to
                                Vietnamese
                                students? – Giáo sư chia sẻ về các giá trị học thuật thực tiễn và cơ hội thăng tiến sự
                                nghiệp
                                cho học viên.</p>
                        </div>
                    </div>

                    <!-- Video 3: Student Chu Hoàng Thái -->
                    <div class="umef-video-card umef-video-carousel-slide">
                        <div class="umef-video-wrapper">
                            <iframe src="https://www.youtube.com/embed/uahEcE84M2s"
                                title="Lắng nghe học viên chia sẻ | Chu Hoàng Thái - Executive MBA Swiss UMEF"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                        <div class="umef-video-body">
                            <span class="umef-video-tag"><i class="fa-solid fa-graduation-cap"></i> Học Viên Executive
                                MBA</span>
                            <h3 class="umef-video-title">Chu Hoàng Thái - Executive MBA Swiss UMEF</h3>
                            <p class="umef-video-desc">Lắng nghe những chia sẻ thực tế từ học viên Chu Hoàng Thái về
                                hành trình
                                học tập chương trình Thạc sĩ điều hành tại Swiss UMEF.</p>
                        </div>
                    </div>

                    <!-- Video 4: Student Lê Ngọc Thương -->
                    <div class="umef-video-card umef-video-carousel-slide">
                        <div class="umef-video-wrapper">
                            <iframe src="https://www.youtube.com/embed/z8PpCgGmBs8"
                                title="Lắng nghe học viên chia sẻ | Lê Ngọc Thương - Executive MBA Swiss UMEF 2024"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                        <div class="umef-video-body">
                            <span class="umef-video-tag"><i class="fa-solid fa-graduation-cap"></i> Học Viên Executive
                                MBA</span>
                            <h3 class="umef-video-title">Lê Ngọc Thương - Executive MBA Swiss UMEF 2024</h3>
                            <p class="umef-video-desc">Chia sẻ của học viên Lê Ngọc Thương về giá trị thực tiễn, tính
                                linh hoạt
                                và sự đồng hành đắc lực từ đội ngũ học vụ IDEAS.</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="umef-video-carousel-btn next" aria-label="Next slide">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
        <div class="umef-video-carousel-dots"></div>
    </section>

    <!-- Student Testimonials Section -->
    <section class="umef-section testimonials-section">
        <div class="testi-grid">
            <div class="testi-left">
                <span class="section-badge">HỌC VIÊN CHIA SẺ</span>
                <h3>Chia sẻ thực tế từ học viên</h3>
                <p>Những trải nghiệm học tập chân thực, giá trị thực tiễn vượt trội và sự hỗ trợ học vụ đồng hành từ
                    IDEAS là động lực giúp các học viên chinh phục thành công chương trình đào tạo sau đại học từ
                    Thụy Sĩ.</p>
                <button type="button" class="btn btn-primary" onclick="showform('swiss-umef-testimonials')">
                    Nhận lộ trình tư vấn miễn phí
                </button>
            </div>
            <div class="testi-quote-card">
                <i class="fa-solid fa-quote-right testi-quote-icon"></i>
                <p class="testi-text">"Chương trình học của Swiss UMEF thực sự rất thực tế và mang tính ứng dụng cao.
                    Nhờ có đội ngũ hỗ trợ học vụ của IDEAS luôn sát cánh giải thích các thuật ngữ bằng tiếng Việt,
                    hỗ trợ 24/7 và cung cấp thư viện học thuật dồi dào, tôi đã có thể cân bằng hoàn hảo giữa công việc
                    quản lý bận rộn và việc hoàn thành luận văn thạc sĩ đúng hạn."</p>
                <div class="testi-author">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/swissumef_logo.png"
                        class="testi-author-img" alt="Học viên UMEF" />
                    <div class="testi-author-info">
                        <h4>Nguyễn Hoàng Minh</h4>
                        <p>Học viên lớp Executive MBA khóa 2024</p>
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