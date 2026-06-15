<?php
/**
 * The template for displaying the MBA SEO landing page
 * Template Name: Premium MBA Directory SEO Template
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

    <!-- Preconnect to external domains for faster resource loading --><!-- Preload LCP background image -->
    <link rel="preload" fetchpriority="high" as="image"
        href="https://ideas.edu.vn/wp-content/uploads/2025/11/ltnumef10202501.webp" /><!-- Booking Modal stylesheet -->
    <?php
    define('BOOKING_MODAL_CSS_LOADED', true);
    $bk_css_path = get_stylesheet_directory() . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/booking-modal.min.css?v=<?php echo $bk_css_version; ?>"
        media="print" onload="this.media='all'" />
    
    

    <!-- MailFlow Pro Tracker & AI Chat -->
    <script>
        window._mf_config = {
            property_id: "ce71ea2e-d841-4e0f-b3ad-332297cde330",
            ai_chat: true
        };
    </script>
    <script src="https://automation.ideas.edu.vn/tracker.js" defer></script>

    <!-- Event snippet for SUBMIT FORM conversion page -->
    <script>
        function gtag_report_conversion(url) {
            var callback = function () {
                if (typeof (url) != 'undefined') {
                    window.location = url;
                }
            };
            if (typeof gtag === 'function') {
                gtag('event', 'conversion', {
                    'send_to': 'AW-11205917800/mdXJCOTL-bccEOj4st8p',
                    'value': 1.0,
                    'currency': 'VND',
                    'event_callback': callback
                });
            } else {
                callback();
            }
            return false;
        }
    </script>

    <!-- Rank Math SEO Metadata Fallback (only outputs if Rank Math/Yoast is inactive) -->
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title>
            <?php echo $is_en ? 'Study Swiss Online BBA &amp; MBA | IDEAS Institute' : 'Học Cử nhân BBA &amp; Thạc sĩ MBA Online Thụy Sĩ | Viện IDEAS'; ?>
        </title>
        <meta name="description"
            content="<?php echo $is_en ? 'International standard Swiss Bachelor (BBA) &amp; Master (MBA, MSc) online programs from reputable Swiss universities. Maximum flexibility for busy professionals.' : 'Chương trình đào tạo Cử nhân (BBA) &amp; Thạc sĩ (MBA, MSc) trực tuyến chuẩn quốc tế từ các trường Đại học danh tiếng của Thụy Sĩ. Linh hoạt cho người bận rộn.'; ?>" />
        <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
        <link rel="canonical"
            href="<?php echo $is_en ? 'https://ideas.edu.vn/en/online-mba-admission' : 'https://ideas.edu.vn/thac-si-quan-tri-kinh-doanh-mba'; ?>" />
        <meta property="og:locale" content="<?php echo $is_en ? 'en_US' : 'vi_VN'; ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:title"
            content="<?php echo $is_en ? 'Study Swiss Online BBA &amp; MBA | IDEAS Institute' : 'Học Cử nhân BBA &amp; Thạc sĩ MBA Online Thụy Sĩ | Viện IDEAS'; ?>" />
        <meta property="og:description"
            content="<?php echo $is_en ? 'International standard Swiss Bachelor (BBA) &amp; Master (MBA, MSc) online programs from reputable Swiss universities. Maximum flexibility for busy professionals.' : 'Chương trình đào tạo Cử nhân (BBA) &amp; Thạc sĩ (MBA, MSc) trực tuyến chuẩn quốc tế từ các trường Đại học danh tiếng của Thụy Sĩ. Linh hoạt cho người bận rộn.'; ?>" />
        <meta property="og:url"
            content="<?php echo $is_en ? 'https://ideas.edu.vn/en/online-mba-admission' : 'https://ideas.edu.vn/thac-si-quan-tri-kinh-doanh-mba'; ?>" />
        <meta property="og:site_name" content="IDEAS Education" />
        <meta property="og:updated_time" content="2026-03-30T09:51:56+07:00" />
        <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp" />
        <meta property="og:image:secure_url" content="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp" />
        <meta property="og:image:width" content="1920" />
        <meta property="og:image:height" content="1080" />
        <meta property="og:image:alt"
            content="<?php echo $is_en ? 'swiss online bba mba programs' : 'chương trình bba mba online thụy sĩ'; ?>" />
        <meta property="og:image:type" content="image/png" />
    <?php endif; ?>

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


        /* ─── GLOBAL BUTTON STYLES ─── */
        .btn-ideas-primary {
            display: inline-flex !important;
            align-items: center !important;
            gap: 8px !important;
            background: var(--umef-primary) !important;
            color: #ffffff !important;
            padding: 14px 28px !important;
            border-radius: 100px !important;
            font-weight: 700 !important;
            font-size: 0.95rem !important;
            text-decoration: none !important;
            transition: all 0.3s ease !important;
            border: none !important;
            cursor: pointer !important;
            box-shadow: 0 4px 12px rgba(179, 20, 0, 0.15) !important;
            box-sizing: border-box !important;
        }

        .btn-ideas-primary:hover {
            background: var(--umef-primary-hover) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 16px rgba(179, 20, 0, 0.25) !important;
        }

        .btn-ideas-outline {
            display: inline-flex !important;
            align-items: center !important;
            gap: 8px !important;
            background: rgba(255, 255, 255, 0.02) !important;
            color: #ffffff !important;
            padding: 14px 28px !important;
            border-radius: 100px !important;
            font-weight: 700 !important;
            font-size: 0.95rem !important;
            text-decoration: none !important;
            transition: all 0.3s ease !important;
            border: 1.5px solid rgba(255, 255, 255, 0.2) !important;
            cursor: pointer !important;
            backdrop-filter: blur(8px) !important;
            box-sizing: border-box !important;
        }

        .btn-ideas-outline:hover {
            border-color: #ffffff !important;
            background: rgba(255, 255, 255, 0.08) !important;
            transform: translateY(-2px) !important;
        }

        /* ─── HERO (IDEAS TALK STYLE) ─── */
        .umef-hero {
            position: relative;
            padding: 180px 20px 100px;
            overflow: hidden;
            background: #080405 !important;
            min-height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100vw;
            margin-left: 50%;
            transform: translateX(-50%);
            border-bottom: none;
        }

        .umef-hero-bg {
            position: absolute;
            top: -150px;
            left: -5%;
            width: 110%;
            height: calc(100% + 300px);
            background-image: url('https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp') !important;
            background-size: cover;
            background-position: center;
            will-change: transform;
            transform: translate3d(0, 0, 0) scale(1.1);
            z-index: 1;
            opacity: 0.25 !important;
            pointer-events: none;
        }

        .umef-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(180deg,
                    rgba(8, 4, 5, 0.85) 0%,
                    rgba(80, 6, 0, 0.35) 60%,
                    transparent 100%),
                radial-gradient(ellipse at 50% 50%, rgba(171, 14, 0, 0.25) 0%, transparent 75%) !important;
            pointer-events: none;
        }

        .umef-hero-container {
            position: relative;
            z-index: 3;
            max-width: 900px;
            margin: 0 auto;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .umef-hero-badge {
            background: rgba(171, 14, 0, 0.2) !important;
            border: 1px solid rgba(255, 77, 77, 0.35) !important;
            padding: 8px 22px;
            border-radius: 100px;
            color: #ffcccc !important;
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

        .umef-hero h1 {
            font-size: clamp(2.4rem, 5.5vw, 3.8rem);
            font-weight: 900;
            margin-bottom: 24px;
            letter-spacing: -0.02em;
            line-height: 1.15;
            color: #ffffff !important;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.6);
        }

        .umef-hero h1 span {
            background: linear-gradient(135deg, #ff8e8e 0%, #ff4f4f 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }

        .umef-hero p {
            font-size: 1.15rem;
            color: rgba(255, 255, 255, 0.95) !important;
            max-width: 750px;
            margin: 0 auto 40px;
            line-height: 1.6;
            font-weight: 500;
            letter-spacing: 0.01em;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        /* ─── PROS & CONS ─── */
        .proscons-section {
            padding: 80px 0;
            background: #ffffff !important;
        }

        .proscons-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            .proscons-grid {
                grid-template-columns: 1fr;
            }
        }

        .proscons-col {
            border: 1px solid rgba(15, 23, 42, 0.06) !important;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.02) !important;
            transition: all 0.3s ease;
            background: #ffffff !important;
        }

        .proscons-col:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.04) !important;
        }

        .proscons-col.pros-col {
            border-top: 5px solid var(--umef-primary) !important;
        }

        .proscons-col.cons-col {
            border-top: 5px solid #64748b !important;
        }

        .proscons-col-title {
            font-size: 1.4rem;
            font-weight: 800;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #0f172a !important;
        }

        .pros-title {
            color: var(--umef-primary) !important;
        }

        .cons-title {
            color: #64748b !important;
        }

        .proscons-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .proscons-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 24px;
            line-height: 1.6;
        }

        .proscons-item i {
            margin-top: 4px;
            font-size: 1.1rem;
        }

        .pros-item i {
            color: var(--umef-primary) !important;
        }

        .cons-item i {
            color: #64748b !important;
        }

        .proscons-item h4 {
            font-size: 1rem;
            font-weight: 700;
            color: #0f172a !important;
            margin: 0 0 6px 0;
        }

        .proscons-item p {
            font-size: 0.92rem;
            color: #475569 !important;
            margin: 0;
        }

        /* ─── CORE COMPETENCIES ─── */
        .comp-section {
            padding: 80px 0;
            background: #f8fafc !important;
            border-top: 1px solid #e2e8f0 !important;
            border-bottom: 1px solid #e2e8f0 !important;
        }

        .comp-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            margin-top: 40px;
        }

        @media (max-width: 992px) {
            .comp-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .comp-grid {
                grid-template-columns: 1fr;
            }
        }

        .comp-card {
            background: #ffffff !important;
            border: 1px solid rgba(15, 23, 42, 0.06) !important;
            border-radius: 16px;
            padding: 30px;
            position: relative;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.01) !important;
        }

        .comp-card:hover {
            border-color: rgba(239, 68, 68, 0.25) !important;
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(239, 68, 68, 0.06) !important;
        }

        .comp-num {
            font-size: 3.2rem;
            font-weight: 900;
            color: rgba(15, 23, 42, 0.04) !important;
            position: absolute;
            top: 15px;
            right: 20px;
            line-height: 1;
            transition: all 0.4s ease;
            user-select: none;
        }

        .comp-card:hover .comp-num {
            color: rgba(171, 14, 0, 0.08) !important;
            transform: translateY(-5px) scale(1.05);
        }

        .comp-card-icon {
            font-size: 1.4rem;
            color: var(--umef-primary) !important;
            background: rgba(171, 14, 0, 0.05) !important;
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .comp-card:hover .comp-card-icon {
            background: var(--umef-primary) !important;
            color: #ffffff !important;
            transform: rotate(360deg);
        }

        .comp-card-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: #0f172a !important;
            margin-bottom: 12px;
        }

        .comp-card-desc {
            font-size: 0.9rem;
            color: #475569 !important;
            line-height: 1.5;
        }

        /* ─── FAQ / ACCORDION ─── */
        .faq-section {
            padding: 80px 0;
            background: #ffffff !important;
        }

        .faq-accordion {
            max-width: 800px;
            margin: 40px auto 0;
        }

        .faq-item {
            border: 1px solid rgba(15, 23, 42, 0.06) !important;
            background: #f8fafc !important;
            border-radius: 12px;
            margin-bottom: 16px;
            overflow: hidden;
            transition: all 0.3s ease, border-left 0.15s ease;
            border-left: 4px solid transparent !important;
            color: #475569 !important;
        }

        .faq-item:hover {
            border-color: rgba(171, 14, 0, 0.2) !important;
            background: #ffffff !important;
            box-shadow: 0 4px 12px -2px rgba(15, 23, 42, 0.04) !important;
        }

        .faq-item.active {
            border-left: 4px solid var(--umef-primary) !important;
            border-color: rgba(171, 14, 0, 0.2) !important;
            background: #ffffff !important;
            box-shadow: 0 6px 16px -4px rgba(171, 14, 0, 0.08) !important;
        }

        .faq-header {
            padding: 20px 24px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 700;
            color: #0f172a !important;
            font-size: 1.05rem;
        }

        .faq-arrow {
            font-size: 0.8rem;
            color: #64748b;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-arrow {
            transform: rotate(180deg);
            color: var(--umef-primary) !important;
        }

        .faq-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            font-size: 0.95rem;
            color: #475569 !important;
            line-height: 1.6;
        }

        .faq-item.active .faq-body {
            max-height: 500px;
        }

        .faq-content {
            padding: 0 24px 24px;
            border-top: 1px solid #e2e8f0 !important;
            padding-top: 16px;
        }

        /* ─── IDEAS SECTION ─── */
        .ideas-section {
            padding: 80px 0;
            background: #f8fafc !important;
            border-top: 1px solid #e2e8f0 !important;
            border-bottom: 1px solid #e2e8f0 !important;
        }

        .ideas-layout {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 60px;
            align-items: center;
        }

        @media (max-width: 992px) {
            .ideas-layout {
                grid-template-columns: 1fr;
                gap: 40px;
            }
        }

        .ideas-img-box {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.04) !important;
            border: 1px solid #e2e8f0 !important;
        }

        .ideas-img-box img {
            width: 100%;
            height: auto;
            display: block;
        }

        .ideas-points {
            list-style: none;
            padding: 0;
            margin: 30px 0 0 0;
        }

        .ideas-point-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 20px;
            font-size: 1rem;
            color: #334155 !important;
            line-height: 1.5;
        }

        .ideas-point-item i {
            color: var(--umef-primary) !important;
            margin-top: 4px;
            width: 16px;
        }

        .ideas-point-item strong {
            color: #0f172a !important;
        }

        /* ─── CTA BANNER ─── */
        .cta-banner {
            background: linear-gradient(135deg, var(--umef-primary) 0%, var(--umef-primary-hover) 100%) !important;
            border: none !important;
            border-radius: 32px;
            padding: 70px 40px;
            text-align: center;
            margin: 80px auto;
            position: relative;
            overflow: hidden;
            max-width: 1000px;
            box-shadow: 0 20px 40px rgba(171, 14, 0, 0.15) !important;
        }

        .cta-banner-glow {
            position: absolute;
            width: 400px;
            height: 400px;
            background: #ffffff;
            filter: blur(160px);
            opacity: 0.12;
            top: -150px;
            left: -150px;
            pointer-events: none;
        }

        .cta-banner h2 {
            font-size: clamp(1.8rem, 4vw, 2.3rem);
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .cta-banner p {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9) !important;
            margin-bottom: 35px;
            max-width: 650px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }

        .cta-banner .btn-ideas-primary {
            background: #ffffff !important;
            color: var(--umef-primary) !important;
            font-weight: 800;
            padding: 16px 36px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1) !important;
        }

        .cta-banner .btn-ideas-primary:hover {
            background: #f8fafc !important;
            color: var(--umef-primary-hover) !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(255, 255, 255, 0.25) !important;
        }

        @media (max-width: 768px) {
            .cta-banner {
                padding: 40px 20px !important;
                margin: 40px auto !important;
                border-radius: 24px !important;
            }

            .cta-banner h2 {
                font-size: 1.45rem !important;
                line-height: 1.3 !important;
                margin-bottom: 16px !important;
            }

            .cta-banner p {
                font-size: 0.95rem !important;
                line-height: 1.5 !important;
                margin-bottom: 24px !important;
            }

            .cta-banner .btn-ideas-primary {
                width: 100% !important;
                padding: 14px 20px !important;
                justify-content: center !important;
                font-size: 0.9rem !important;
            }
        }

        /* ── Header Width & Offsets ────────────────── */
        .ideas_header .container {
            max-width: 1360px !important;
            width: 100% !important;
            padding: 0 20px !important;
        }

        body.admin-bar .ideas_header {
            top: 32px !important;
        }

        @media (max-width: 782px) {
            body.admin-bar .ideas_header {
                top: 46px !important;
            }
        }

        .reveal-up {
            opacity: 1;
        }

        @media (max-width: 768px) {

            .btn-ideas-primary,
            .btn-ideas-outline {
                width: 100% !important;
                justify-content: center !important;
            }
        }
    </style><?php wp_head(); ?>
    <style>
        /* Force override any enqueued parent theme styles outputted in wp_head() */
        html,
        body {
            scroll-snap-type: none !important;
            scroll-behavior: auto !important;
        }

        .hero,
        .pain-section,
        .solution-section,
        .pathfinder-section,
        .ai-advisor-section,
        .registration-section,
        .faq-section {
            scroll-snap-align: none !important;
            scroll-snap-stop: normal !important;
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>
    <main id="content">
        <!-- HERO SECTION -->
        <section class="umef-hero" id="trang-chu">
            <div class="umef-hero-bg"></div>
            <div class="umef-hero-overlay"></div>
            <div class="umef-hero-container">
                <div class="umef-hero-badge"><svg class="svg-icon fa-graduation-cap fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
                    <?php echo $is_en ? 'Swiss Bachelor &amp; Master' : 'Cử nhân &amp; Thạc sĩ Thụy Sĩ'; ?></div>
                <h1><?php echo $is_en ? 'Study Swiss BBA &amp; <br /><span>Online MBA</span> in Vietnam' : 'Học Cử nhân BBA &amp; Thạc sĩ <br /><span>MBA Online Thụy Sĩ</span> tại Việt Nam'; ?>
                </h1>
                <p><?php echo $is_en ? 'Gateway to international standard online Bachelor (BBA) and Master (MBA, MSc) programs from prestigious Swiss universities. An elite, highly flexible learning solution dedicated to busy professionals.' : 'Cổng kết nối các chương trình đào tạo Cử nhân (BBA) và Thạc sĩ (MBA, MSc) trực tuyến chuẩn quốc tế từ các trường Đại học danh tiếng của Thụy Sĩ. Giải pháp học tập tinh hoa, linh hoạt tối đa dành riêng cho người bận rộn.'; ?>
                </p>
                <div class="umef-hero-stats">
                    <div class="umef-stat-card">
                        <span class="umef-stat-num">100%</span>
                        <span class="umef-stat-lbl"><?php echo $is_en ? 'Online Study' : 'Học Online'; ?></span>
                    </div>
                    <div class="umef-stat-card">
                        <span class="umef-stat-num"><?php echo $is_en ? 'Flexible' : 'Linh hoạt'; ?></span>
                        <span class="umef-stat-lbl"><?php echo $is_en ? '12 - 36 Months' : '12 - 36 Tháng'; ?></span>
                    </div>
                    <div class="umef-stat-card">
                        <span class="umef-stat-num"><?php echo $is_en ? 'Switzerland' : 'Thụy Sĩ'; ?></span>
                        <span
                            class="umef-stat-lbl"><?php echo $is_en ? 'International Degrees' : 'Bằng Cấp Quốc Tế'; ?></span>
                    </div>
                </div>

                <div
                    style="margin-top: 40px; display: flex; justify-content: center; gap: 16px; flex-wrap: wrap; width: 100%;">
                    <button type="button" class="btn-ideas-primary"
                        onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('hero-hub'); } else if(typeof window.showform === 'function') { window.showform('hero-hub'); }">
                        <span><?php echo $is_en ? 'Choose a Program' : 'Tư vấn chọn chương trình'; ?></span>
                        <svg class="svg-icon fa-paper-plane fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480l0-83.6c0-4 1.5-7.8 4.2-10.8L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z"/></svg>
                    </button>
                    <a href="#danh-sach" class="btn-ideas-outline">
                        <span><?php echo $is_en ? 'Explore Courses' : 'Khám phá các khóa học'; ?></span>
                        <svg class="svg-icon fa-arrow-down fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- EVALUATION PROS & CONS -->
        <section class="proscons-section">
            <div class="container text-center">
                <span
                    class="section-badge"><?php echo $is_en ? 'Objective Evaluation' : 'Đánh giá khách quan'; ?></span>
                <h2 class="section-title">
                    <?php echo $is_en ? 'Pros &amp; Cons of <span>Online International MBA</span>' : 'Ưu &amp; Nhược điểm khi <span>học MBA Online Quốc tế</span>'; ?>
                </h2>
                <p class="section-desc">
                    <?php echo $is_en ? 'Provides students with the most realistic and objective perspectives before deciding to invest time and budget in remote learning.' : 'Giúp học viên có góc nhìn chân thực, khách quan nhất trước khi quyết định đầu tư thời gian và ngân sách cho con đường học tập từ xa.'; ?>
                </p>

                <div class="proscons-grid text-left">

                    <!-- Pros Column -->
                    <div class="proscons-col pros-col">
                        <h3 class="proscons-col-title pros-title"><svg class="svg-icon fa-circle-plus fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344l0-64-64 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l64 0 0-64c0-13.3 10.7-24 24-24s24 10.7 24 24l0 64 64 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-64 0 0 64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                            <?php echo $is_en ? 'Key Advantages' : 'Ưu Điểm Nổi Bật'; ?></h3>
                        <ul class="proscons-list">
                            <li class="proscons-item pros-item">
                                <svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                                <div>
                                    <h4><?php echo $is_en ? 'Flexible Scheduling' : 'Tự do sắp xếp thời gian'; ?></h4>
                                    <p><?php echo $is_en ? 'No constraints of time and geography. Students can maintain full-time jobs while studying in the evening.' : 'Không bị gò bó bởi thời gian và khoảng cách địa lý. Học viên có thể vừa duy trì công việc toàn thời gian tại công sở vừa học vào buổi tối.'; ?>
                                    </p>
                                </div>
                            </li>
                            <li class="proscons-item pros-item">
                                <svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                                <div>
                                    <h4><?php echo $is_en ? 'Affordable Tuition (Save up to 90%)' : 'Tối ưu hóa học phí (tiết kiệm đến 90%)'; ?>
                                    </h4>
                                    <p><?php echo $is_en ? 'Earn "authentic" international degrees from Switzerland at a fraction of the cost in Vietnam, saving maximum compared to studying abroad.' : 'Học viên nhận bằng cấp quốc tế "chính hãng" từ Thụy Sĩ nhưng với mức chi phí học tập tại Việt Nam, tiết kiệm tối đa so với du học trực tiếp.'; ?>
                                    </p>
                                </div>
                            </li>
                            <li class="proscons-item pros-item">
                                <svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                                <div>
                                    <h4><?php echo $is_en ? 'Practical Curriculum' : 'Nội dung đào tạo thực tiễn'; ?>
                                    </h4>
                                    <p><?php echo $is_en ? 'European standard curriculum, taught through real-world case studies and business problem-solving projects.' : 'Chương trình được thiết kế theo tiêu chuẩn giáo dục Châu Âu, giảng dạy thông qua các case study thực tế và bài tập giải quyết vấn đề doanh nghiệp.'; ?>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Cons Column -->
                    <div class="proscons-col cons-col">
                        <h3 class="proscons-col-title cons-title"><svg class="svg-icon fa-circle-minus fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM184 232l144 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-144 0c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/></svg>
                            <?php echo $is_en ? 'Limitations to Consider' : 'Hạn Chế Cần Lưu Ý'; ?></h3>
                        <ul class="proscons-list">
                            <li class="proscons-item cons-item">
                                <svg class="svg-icon fa-triangle-exclamation fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480L40 480c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24l0 112c0 13.3 10.7 24 24 24s24-10.7 24-24l0-112c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg>
                                <div>
                                    <h4><?php echo $is_en ? 'Requires High Self-Discipline' : 'Đòi hỏi sự tự giác và kỷ luật rất cao'; ?>
                                    </h4>
                                    <p><?php echo $is_en ? 'Remote learning lacks direct classroom supervision. Students must establish a disciplined study plan to complete assignments on time.' : 'Học từ xa không có giảng viên đôn đốc trực tiếp trên lớp. Học viên cần thiết lập kế hoạch tự học nghiêm túc để hoàn thành các bài luận đúng hạn.'; ?>
                                    </p>
                                </div>
                            </li>
                            <li class="proscons-item cons-item">
                                <svg class="svg-icon fa-triangle-exclamation fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480L40 480c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24l0 112c0 13.3 10.7 24 24 24s24-10.7 24-24l0-112c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg>
                                <div>
                                    <h4><?php echo $is_en ? 'Limited Direct Physical Interaction' : 'Hạn chế về tương tác vật lý trực tiếp'; ?>
                                    </h4>
                                    <p><?php echo $is_en ? 'Lacks the atmosphere of classroom discussions. IDEAS addresses this by organizing online workshops and offline networking events.' : 'Thiếu đi không khí thảo luận trực tiếp tại giảng đường. IDEAS khắc phục điều này bằng cách tổ chức các buổi Workshop bổ trợ trực tuyến và Offline networking.'; ?>
                                    </p>
                                </div>
                            </li>
                            <li class="proscons-item cons-item">
                                <svg class="svg-icon fa-triangle-exclamation fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480L40 480c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24l0 112c0 13.3 10.7 24 24 24s24-10.7 24-24l0-112c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg>
                                <div>
                                    <h4><?php echo $is_en ? 'Risk of Choosing Unaccredited Schools' : 'Rủi ro chọn nhầm trường thiếu uy tín'; ?>
                                    </h4>
                                    <p><?php echo $is_en ? 'Many unaccredited schools exist. Candidates must verify federal accreditations or reputable international accrediting bodies before enrolling.' : 'Thị trường có nhiều trường không đạt kiểm định chính thức. Ứng viên cần kiểm tra kỹ thông tin kiểm định liên bang hoặc tổ chức kiểm định quốc tế uy tín trước khi đăng ký.'; ?>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>

        <!-- CORE COMPETENCIES -->
        <section class="comp-section">
            <div class="container text-center">
                <span class="section-badge"><?php echo $is_en ? 'Key Competencies' : 'Đầu ra năng lực'; ?></span>
                <h2 class="section-title">
                    <?php echo $is_en ? '4 Core Management Competencies <span>After Graduation</span>' : '4 Năng Lực Quản Trị Cốt Lõi <span>Sau Khi Tốt Nghiệp</span>'; ?>
                </h2>
                <p class="section-desc">
                    <?php echo $is_en ? 'An MBA program does not just provide a prestigious degree, it directly restructures your thinking and skills to help you transform into a real manager.' : 'Chương trình MBA không chỉ cung cấp tấm bằng danh giá, mà trực tiếp tái cấu trúc hệ thống tư duy và kỹ năng để giúp bạn chuyển mình thành nhà quản trị thực thụ.'; ?>
                </p>

                <div class="comp-grid text-left">
                    <div class="comp-card">
                        <span class="comp-num">01</span>
                        <div class="comp-card-icon"><svg class="svg-icon fa-globe fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M352 256c0 22.2-1.2 43.6-3.3 64l-185.3 0c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64l185.3 0c2.2 20.4 3.3 41.8 3.3 64zm28.8-64l123.1 0c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64l-123.1 0c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32l-116.7 0c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0l-176.6 0c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0L18.6 160C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192l123.1 0c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64L8.1 320C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6l176.6 0c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352l116.7 0zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6l116.7 0z"/></svg></div>
                        <h3 class="comp-card-title">
                            <?php echo $is_en ? 'Holistic Managerial Thinking' : 'Tư duy quản trị tổng thể'; ?></h3>
                        <p class="comp-card-desc">
                            <?php echo $is_en ? 'Form a big picture of business operations. Connect and optimize coordination across departments: Finance, HR, Operations, and Sales.' : 'Hình thành bức tranh toàn cảnh về vận hành doanh nghiệp. Kết nối và tối ưu hóa sự phối hợp giữa các phòng ban: Tài chính, Nhân sự, Vận hành và Kinh doanh.'; ?>
                        </p>
                    </div>

                    <div class="comp-card">
                        <span class="comp-num">02</span>
                        <div class="comp-card-icon"><svg class="svg-icon fa-chart-pie fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M304 240l0-223.4c0-9 7-16.6 16-16.6C443.7 0 544 100.3 544 224c0 9-7.6 16-16.6 16L304 240zM32 272C32 150.7 122.1 50.3 239 34.3c9.2-1.3 17 6.1 17 15.4L256 288 412.5 444.5c6.7 6.7 6.2 17.7-1.5 23.1C371.8 495.6 323.8 512 272 512C139.5 512 32 404.6 32 272zm526.4 16c9.3 0 16.6 7.8 15.4 17c-7.7 55.9-34.6 105.6-73.9 142.3c-6 5.6-15.4 5.2-21.2-.7L320 288l238.4 0z"/></svg></div>
                        <h3 class="comp-card-title">
                            <?php echo $is_en ? 'Data-Driven Decision Making' : 'Ra quyết định bằng dữ liệu'; ?></h3>
                        <p class="comp-card-desc">
                            <?php echo $is_en ? 'Enhance skills in reading financial statements, analyzing business metrics, and controlling budgets. Make strategic decisions based on practical figures.' : 'Nâng cao khả năng đọc hiểu báo cáo tài chính, phân tích chỉ số kinh doanh và kiểm soát ngân sách. Đưa ra các quyết định chiến lược dựa trên các con số thực tiễn.'; ?>
                        </p>
                    </div>

                    <div class="comp-card">
                        <span class="comp-num">03</span>
                        <div class="comp-card-icon"><svg class="svg-icon fa-users-gear fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M144 160A80 80 0 1 0 144 0a80 80 0 1 0 0 160zm368 0A80 80 0 1 0 512 0a80 80 0 1 0 0 160zM0 298.7C0 310.4 9.6 320 21.3 320l213.3 0c.2 0 .4 0 .7 0c-26.6-23.5-43.3-57.8-43.3-96c0-7.6 .7-15 1.9-22.3c-13.6-6.3-28.7-9.7-44.6-9.7l-42.7 0C47.8 192 0 239.8 0 298.7zM320 320c24 0 45.9-8.8 62.7-23.3c2.5-3.7 5.2-7.3 8-10.7c2.7-3.3 5.7-6.1 9-8.3C410 262.3 416 243.9 416 224c0-53-43-96-96-96s-96 43-96 96s43 96 96 96zm65.4 60.2c-10.3-5.9-18.1-16.2-20.8-28.2l-103.2 0C187.7 352 128 411.7 128 485.3c0 14.7 11.9 26.7 26.7 26.7l300.6 0c-2.1-5.2-3.2-10.9-3.2-16.4l0-3c-1.3-.7-2.7-1.5-4-2.3l-2.6 1.5c-16.8 9.7-40.5 8-54.7-9.7c-4.5-5.6-8.6-11.5-12.4-17.6l-.1-.2-.1-.2-2.4-4.1-.1-.2-.1-.2c-3.4-6.2-6.4-12.6-9-19.3c-8.2-21.2 2.2-42.6 19-52.3l2.7-1.5c0-.8 0-1.5 0-2.3s0-1.5 0-2.3l-2.7-1.5zM533.3 192l-42.7 0c-15.9 0-31 3.5-44.6 9.7c1.3 7.2 1.9 14.7 1.9 22.3c0 17.4-3.5 33.9-9.7 49c2.5 .9 4.9 2 7.1 3.3l2.6 1.5c1.3-.8 2.6-1.6 4-2.3l0-3c0-19.4 13.3-39.1 35.8-42.6c7.9-1.2 16-1.9 24.2-1.9s16.3 .6 24.2 1.9c22.5 3.5 35.8 23.2 35.8 42.6l0 3c1.3 .7 2.7 1.5 4 2.3l2.6-1.5c16.8-9.7 40.5-8 54.7 9.7c2.3 2.8 4.5 5.8 6.6 8.7c-2.1-57.1-49-102.7-106.6-102.7zm91.3 163.9c6.3-3.6 9.5-11.1 6.8-18c-2.1-5.5-4.6-10.8-7.4-15.9l-2.3-4c-3.1-5.1-6.5-9.9-10.2-14.5c-4.6-5.7-12.7-6.7-19-3l-2.9 1.7c-9.2 5.3-20.4 4-29.6-1.3s-16.1-14.5-16.1-25.1l0-3.4c0-7.3-4.9-13.8-12.1-14.9c-6.5-1-13.1-1.5-19.9-1.5s-13.4 .5-19.9 1.5c-7.2 1.1-12.1 7.6-12.1 14.9l0 3.4c0 10.6-6.9 19.8-16.1 25.1s-20.4 6.6-29.6 1.3l-2.9-1.7c-6.3-3.6-14.4-2.6-19 3c-3.7 4.6-7.1 9.5-10.2 14.6l-2.3 3.9c-2.8 5.1-5.3 10.4-7.4 15.9c-2.6 6.8 .5 14.3 6.8 17.9l2.9 1.7c9.2 5.3 13.7 15.8 13.7 26.4s-4.5 21.1-13.7 26.4l-3 1.7c-6.3 3.6-9.5 11.1-6.8 17.9c2.1 5.5 4.6 10.7 7.4 15.8l2.4 4.1c3 5.1 6.4 9.9 10.1 14.5c4.6 5.7 12.7 6.7 19 3l2.9-1.7c9.2-5.3 20.4-4 29.6 1.3s16.1 14.5 16.1 25.1l0 3.4c0 7.3 4.9 13.8 12.1 14.9c6.5 1 13.1 1.5 19.9 1.5s13.4-.5 19.9-1.5c7.2-1.1 12.1-7.6 12.1-14.9l0-3.4c0-10.6 6.9-19.8 16.1-25.1s20.4-6.6 29.6-1.3l2.9 1.7c6.3 3.6 14.4 2.6 19-3c3.7-4.6 7.1-9.4 10.1-14.5l2.4-4.2c2.8-5.1 5.3-10.3 7.4-15.8c2.6-6.8-.5-14.3-6.8-17.9l-3-1.7c-9.2-5.3-13.7-15.8-13.7-26.4s4.5-21.1 13.7-26.4l3-1.7zM472 384a40 40 0 1 1 80 0 40 40 0 1 1 -80 0z"/></svg></div>
                        <h3 class="comp-card-title">
                            <?php echo $is_en ? 'Leadership &amp; People Management' : 'Lãnh đạo và quản trị con người'; ?>
                        </h3>
                        <p class="comp-card-desc">
                            <?php echo $is_en ? 'Equip capacity to manage cross-functional teams, negotiate commercially, and lead organizations through complex structural transformations.' : 'Trang bị năng lực quản lý đội nhóm đa chức năng, đàm phán thương mại và dẫn dắt tổ chức qua các giai đoạn chuyển đổi cơ cấu phức tạp.'; ?>
                        </p>
                    </div>

                    <div class="comp-card">
                        <span class="comp-num">04</span>
                        <div class="comp-card-icon"><svg class="svg-icon fa-bolt fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288l111.5 0L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7l-111.5 0L349.4 44.6z"/></svg></div>
                        <h3 class="comp-card-title">
                            <?php echo $is_en ? 'Innovative &amp; Creative Thinking' : 'Tư duy đổi mới sáng tạo'; ?>
                        </h3>
                        <p class="comp-card-desc">
                            <?php echo $is_en ? 'Integrate digital technology and Artificial Intelligence (AI) into modern business administration to create a competitive edge.' : 'Lồng ghép tư duy công nghệ số và trí tuệ nhân tạo (AI) vào quản trị kinh doanh hiện đại để tạo ra lợi thế cạnh tranh vượt trội cho doanh nghiệp.'; ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ SECTION -->
        <section class="faq-section">
            <div class="container">
                <div class="text-center">
                    <span class="section-badge"><?php echo $is_en ? 'FAQ' : 'Giải đáp thắc mắc'; ?></span>
                    <h2 class="section-title">
                        <?php echo $is_en ? 'Frequently Asked Questions about <span>Online MBA</span>' : 'Câu hỏi thường gặp về <span>MBA Online</span>'; ?>
                    </h2>
                    <p class="section-desc">
                        <?php echo $is_en ? 'Answering the most common questions about legality, language, and admission procedures.' : 'Giải đáp các câu hỏi phổ biến nhất của học viên Việt Nam về tính pháp lý, ngôn ngữ và thủ tục nhập học.'; ?>
                    </p>
                </div>

                <div class="faq-accordion">
                    <div class="faq-item">
                        <div class="faq-header">
                            <span><?php echo $is_en ? '1. Is an online MBA degree equivalent to an on-campus degree?' : '1. Bằng MBA trực tuyến có giá trị tương đương bằng học trực tiếp tại trường không?'; ?></span>
                            <svg class="svg-icon fa-chevron-down fa-solid faq-arrow" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                        </div>
                        <div class="faq-body">
                            <div class="faq-content">
                                <?php echo $is_en ? 'Yes. The degree awarded by the Swiss university is exactly the same, with no mention of "Online" on the diploma, and has equivalent legal value to on-campus degrees in Europe.' : 'Có. Bằng cấp được cấp bởi trường Đại học Thụy Sĩ hoàn toàn giống nhau, trên văn bằng tốt nghiệp không ghi hình thức học trực tuyến (Online) và có giá trị pháp lý tương đương văn bằng học trực tiếp tại cơ sở chính ở Châu Âu.'; ?>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-header">
                            <span><?php echo $is_en ? '2. What are the admission requirements for the MBA program?' : '2. Yêu cầu đầu vào của chương trình MBA là gì?'; ?></span>
                            <svg class="svg-icon fa-chevron-down fa-solid faq-arrow" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                        </div>
                        <div class="faq-body">
                            <div class="faq-content">
                                <?php echo $is_en ? 'International MBA programs require candidates to hold a Bachelor\'s degree in any major, have at least 2-3 years of work experience, and achieve IELTS 6.0 or equivalent. Students without English certificates will be supported with prep classes and entry tests.' : 'Các chương trình MBA quốc tế yêu cầu ứng viên tối thiểu tốt nghiệp Đại học (Cử nhân) ở mọi chuyên ngành, có tối thiểu 2 - 3 năm kinh nghiệm làm việc thực tế và đạt trình độ tiếng Anh IELTS 6.0 hoặc tương đương. Trường hợp chưa đủ chứng chỉ tiếng Anh, học viên sẽ được hỗ trợ các lớp bổ túc và kiểm tra năng lực đầu vào.'; ?>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-header">
                            <span><?php echo $is_en ? '3. How much does an MBA program cost in Vietnam?' : '3. Chi phí học MBA tại Việt Nam dao động khoảng bao nhiêu?'; ?></span>
                            <svg class="svg-icon fa-chevron-down fa-solid faq-arrow" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                        </div>
                        <div class="faq-body">
                            <div class="faq-content">
                                <?php echo $is_en ? 'In Vietnam, MBA tuition varies widely: local programs range from 50 - 70 million VND, whereas high-quality international online MBA programs range from 120 - 250 million VND for the entire course. This is an optimal cost, saving up to 90% in living expenses compared to studying abroad.' : 'Tại Việt Nam, chi phí học MBA rất đa dạng: Các chương trình trong nước dao động từ 50 - 70 triệu đồng; trong khi đó các chương trình MBA quốc tế online chất lượng cao dao động từ 120 - 250 triệu đồng cho toàn khóa học. Đây là mức chi phí tối ưu, tiết kiệm đến 90% chi phí ăn ở sinh hoạt so với du học trực tiếp tại Châu Âu.'; ?>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-header">
                            <span><?php echo $is_en ? '4. What is the role of the IDEAS Institute during my studies?' : '4. Viện IDEAS đóng vai trò gì trong quá trình học của tôi?'; ?></span>
                            <svg class="svg-icon fa-chevron-down fa-solid faq-arrow" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                        </div>
                        <div class="faq-body">
                            <div class="faq-content">
                                <?php echo $is_en ? 'IDEAS Institute is the official and sole academic support partner in Vietnam. We accompany students from orientation counseling, admission application, document translation, organizing tutoring classes in Vietnamese, technical support on the LMS, to graduation.' : 'Viện IDEAS là đơn vị hỗ trợ học thuật chính thức và duy nhất tại Việt Nam. Chúng tôi đồng hành cùng học viên từ khâu tư vấn định hướng, nộp hồ sơ nhập học, hỗ trợ dịch thuật tài liệu, tổ chức các lớp chuyên đề bổ trợ kiến thức bằng tiếng Việt, hỗ trợ kỹ thuật trên hệ thống LMS, cho đến khi học viên hoàn thành luận văn tốt nghiệp và nhận bằng.'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ACCREDITATIONS & QUALITY VERIFICATION -->
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
                    <div class="acc-label"><svg class="svg-icon fa-stamp fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M312 201.8c0-17.4 9.2-33.2 19.9-47C344.5 138.5 352 118.1 352 96c0-53-43-96-96-96s-96 43-96 96c0 22.1 7.5 42.5 20.1 58.8c10.7 13.8 19.9 29.6 19.9 47c0 29.9-24.3 54.2-54.2 54.2L112 256C50.1 256 0 306.1 0 368c0 20.9 13.4 38.7 32 45.3L32 464c0 26.5 21.5 48 48 48l352 0c26.5 0 48-21.5 48-48l0-50.7c18.6-6.6 32-24.4 32-45.3c0-61.9-50.1-112-112-112l-33.8 0c-29.9 0-54.2-24.3-54.2-54.2zM416 416l0 32L96 448l0-32 320 0z"/></svg>
                        <?php echo $is_en ? 'Accreditations &amp; Recognition' : 'Kiểm định &amp; Công nhận Quốc tế'; ?>
                    </div>
                    <h2 class="acc-title">
                        <?php echo $is_en ? 'Prestigious <span>Accreditations</span>' : 'Kiểm định <span>Quốc tế</span> Uy tín'; ?>
                    </h2>
                    <p class="acc-desc">
                        <?php echo $is_en ? 'Swiss UMEF University is accredited and recognized by leading Swiss, US, and international authorities.' : 'Đại học Swiss UMEF được kiểm định và công nhận bởi các cơ quan và tổ chức uy tín hàng đầu Thụy Sĩ, Hoa Kỳ và Quốc tế.'; ?>
                    </p>
                </div>

                <!-- SAC Hero Card -->
                <div class="acc-sac-hero">
                    <div class="acc-sac-left">
                        <div class="acc-sac-badge"><span class="acc-sac-badge-dot"></span>
                            <?php echo $is_en ? 'Official Recognition from Education Council' : 'Công nhận chính thức từ Hội đồng Giáo dục'; ?>
                        </div>
                        <h3 class="acc-sac-name"><button type="button" class="accred-trigger" data-accred="sac"
                                style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s; background: none; border: none; padding: 0; font: inherit; cursor: pointer;"
                                onmouseover="this.style.color='#ab0e00'" onmouseout="this.style.color='inherit'"
                                title="<?php echo $is_en ? 'View SAC Accreditation Details' : 'Xem chi tiết Kiểm định SAC'; ?>">Swiss
                                Accreditation Council <svg class="svg-icon fa-up-right-from-square fa-solid" style="font-size: 0.75em;" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M352 0c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9L370.7 96 201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L416 141.3l41.4 41.4c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6l0-128c0-17.7-14.3-32-32-32L352 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg></button></h3>
                        <p class="acc-sac-tagline">
                            <?php echo $is_en ? 'Swiss Federal Accreditation Body. Swiss UMEF is the <strong>first private university in Geneva</strong> to be officially recognized in the Swiss higher education system.' : 'Cơ quan kiểm định liên bang Thụy Sĩ. Swiss UMEF là trường đại học tư thục <strong>đầu tiên tại Geneva</strong> được công nhận chính thức trong hệ thống giáo dục Thụy Sĩ.'; ?>
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
                                    class="acc-sac-stat-label"><?php echo $is_en ? 'European Standard' : 'Tiêu chuẩn Châu Âu'; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="acc-sac-right">
                        <div class="acc-sac-logo-wrap">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/SAC_LOGO.png"
                                class="acc-sac-logo-img" alt="Logo SAC - Swiss Accreditation Council" loading="lazy"
                                decoding="async" />
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
                                <p><?php echo $is_en ? 'Swiss Federal Accreditation Body<br>Official recognition from the Swiss Education Council' : 'Cơ quan kiểm định liên bang Thụy Sĩ<br>Công nhận chính thức từ Hội đồng Giáo dục Thụy Sĩ'; ?>
                                </p>
                            </div>
                        </div>
                        <ul class="acc-sac-points">
                            <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg><span><?php echo $is_en ? 'Degrees consularly legalized at the Vietnamese Embassy in Switzerland' : 'Bằng cấp được hợp pháp hóa lãnh sự tại Đại sứ quán Việt Nam tại Thụy Sĩ'; ?></span>
                            </li>
                            <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg><span><?php echo $is_en ? 'European-standard program — ECTS international credits' : 'Chương trình đạt chuẩn châu Âu — ECTS tín chỉ quốc tế'; ?></span>
                            </li>
                            <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg><span><?php echo $is_en ? 'Swiss UMEF is the <strong>first private university in Geneva</strong> to be officially recognized in the Swiss education system' : 'Swiss UMEF là trường đại học tư thục <strong>đầu tiên tại Geneva</strong> được công nhận chính thức trong hệ thống giáo dục Thụy Sĩ'; ?></span>
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
                        <p><?php echo $is_en ? 'Council for Higher Education Accreditation (USA), ensuring international recognition' : 'Hội đồng kiểm định giáo dục đại học hàng đầu Hoa Kỳ, đảm bảo tiêu chuẩn công nhận quốc tế'; ?>
                        </p>
                    </div>
                    <div class="acc-card" data-accred="iacbe">
                        <img class="acc-card-logo" src="https://ideas.edu.vn/wp-content/uploads/2026/06/kdumef4.webp"
                            alt="IACBE" loading="lazy" decoding="async" />
                        <h4>IACBE – Business Education</h4>
                        <p><?php echo $is_en ? 'Accreditation body specializing in international business education quality for BBA, MBA, and DBA' : 'Tổ chức kiểm định chuyên về chất lượng giáo dục kinh doanh quốc tế cho BBA, MBA và DBA'; ?>
                        </p>
                    </div>
                    <div class="acc-card" data-accred="acbsp">
                        <img class="acc-card-logo" src="https://ideas.edu.vn/wp-content/uploads/2026/06/kdumef2.webp"
                            alt="ACBSP" loading="lazy" decoding="async" />
                        <h4>ACBSP – Business Schools</h4>
                        <p><?php echo $is_en ? 'Accreditation for business schools, officially recognized by the US Department of Education' : 'Kiểm định chất lượng trường kinh doanh được Bộ Giáo dục Hoa Kỳ công nhận chính thức'; ?>
                        </p>
                    </div>
                    <div class="acc-card" data-accred="qs">
                        <img class="acc-card-logo" src="https://ideas.edu.vn/wp-content/uploads/2025/10/qs-1.webp"
                            alt="QS Stars" loading="lazy" decoding="async" />
                        <h4>QS Stars ⭐ 5 Stars Overall</h4>
                        <p><?php echo $is_en ? '5-Star Overall Rating by Quacquarelli Symonds — a global university rating system' : 'Xếp hạng 5 sao toàn diện bởi Quacquarelli Symonds — hệ thống đánh giá đại học uy tín thế giới'; ?>
                        </p>
                    </div>
                    <div class="acc-card" data-accred="eduqua">
                        <img class="acc-card-logo" src="https://ideas.edu.vn/wp-content/uploads/2026/06/kdumef3.webp"
                            alt="EduQua" loading="lazy" decoding="async" />
                        <h4>SGS – EduQua</h4>
                        <p><?php echo $is_en ? 'Swiss quality label recognized by the government, evaluated against 6 educational standards' : 'Nhãn chất lượng Thụy Sĩ được Chính phủ công nhận, đánh giá theo 6 tiêu chuẩn chất lượng giáo dục'; ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- MBA PROGRAM CATALOG -->
        <section class="umef-section" id="danh-sach">
            <div class="section-header">
                <span class="section-badge"><?php echo $is_en ? 'Program Catalog' : 'Danh mục đào tạo'; ?></span>
                <h2 class="section-title">
                    <?php echo $is_en ? 'Featured <span>Bachelor &amp; Master Programs</span>' : 'Các Chương trình <span>Cử nhân &amp; Thạc sĩ nổi bật</span>'; ?>
                </h2>
                <p class="section-subtitle">
                    <?php echo $is_en ? 'A selection of high-quality online Bachelor (BBA) and Master (MBA, MSc) programs from Switzerland, meeting all development orientations from business foundations to executive leadership and digital trends.' : 'Tuyển chọn các khóa học Cử nhân (BBA) và Thạc sĩ (MBA, MSc) trực tuyến chất lượng cao từ Thụy Sĩ, đáp ứng mọi định hướng phát triển từ nền tảng kinh doanh, lãnh đạo điều hành đến dẫn đầu xu hướng công nghệ số.'; ?>
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
                                <span><?php echo $is_en ? 'Swiss UMEF | Switzerland' : 'Swiss UMEF | Thụy Sĩ'; ?></span>
                            </div>
                        </div>
                        <div class="prog-avatar-container">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/online-mba-1-optimized.webp"
                                alt="Online MBA" loading="lazy" decoding="async" />
                        </div>
                        <div class="prog-card-title-group">
                            <h3 class="prog-card-title-new">Online MBA</h3>
                            <div class="prog-card-subtitle-new">
                                <?php echo $is_en ? 'Master of Business Administration' : 'Thạc sĩ Quản trị Kinh doanh'; ?>
                            </div>
                        </div>
                        <p class="prog-card-desc-new">
                            <?php echo $is_en ? 'European Bologna-standard online general MBA program, focusing on building comprehensive management mindset from strategy to execution.' : 'Chương trình Thạc sĩ Quản trị Kinh doanh trực tuyến tổng hợp chuẩn Bologna Châu Âu, tập trung xây dựng tư duy quản trị toàn diện từ chiến lược đến thực thi.'; ?>
                        </p>
                    </div>
                    <div>
                        <div class="prog-card-specs">
                            <div class="prog-spec-item">
                                <span class="prog-spec-label"><?php echo $is_en ? 'Duration:' : 'Thời gian:'; ?></span>
                                <strong
                                    class="prog-spec-value"><?php echo $is_en ? '18 months' : '18 tháng'; ?></strong>
                            </div>
                            <div class="prog-spec-item">
                                <span
                                    class="prog-spec-label"><?php echo $is_en ? 'Curriculum:' : 'Cấu trúc môn:'; ?></span>
                                <strong
                                    class="prog-spec-value"><?php echo $is_en ? '90 ECTS - 12 courses &amp; Thesis' : '90 ECTS - 12 môn học &amp; Luận văn'; ?></strong>
                            </div>
                        </div>
                        <div class="prog-card-actions">
                            <a href="<?php echo $is_en ? '/en/mba' : '/mba'; ?>"
                                class="prog-btn-detail"><?php echo $is_en ? 'Details' : 'Xem chi tiết'; ?></a>
                            <button type="button" class="prog-btn-inquire"
                                onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('swiss-umef-program-mba'); } else if(typeof window.showform === 'function') { window.showform('swiss-umef-program-mba'); }"><?php echo $is_en ? 'Inquire' : 'Nhận tư vấn'; ?></button>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Executive MBA (EMBA) -->
                <div class="prog-card-new">
                    <div>
                        <div class="prog-card-header">
                            <span class="prog-card-badge">MBA</span>
                            <div class="prog-card-school">
                                <svg class="svg-icon fa-building-columns fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160l0 8c0 13.3 10.7 24 24 24l400 0c13.3 0 24-10.7 24-24l0-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8-3.4-17.2-3.4-25.2 0zM128 224l-64 0 0 196.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512l448 0c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1L448 224l-64 0 0 192-40 0 0-192-64 0 0 192-48 0 0-192-64 0 0 192-40 0 0-192zM256 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                                <span><?php echo $is_en ? 'Swiss UMEF | Switzerland' : 'Swiss UMEF | Thụy Sĩ'; ?></span>
                            </div>
                        </div>
                        <div class="prog-avatar-container">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/emba-optimized.webp"
                                alt="Executive MBA" loading="lazy" decoding="async" />
                        </div>
                        <div class="prog-card-title-group">
                            <h3 class="prog-card-title-new">Executive MBA (EMBA)</h3>
                            <div class="prog-card-subtitle-new">
                                <?php echo $is_en ? 'Executive MBA' : 'Thạc sĩ Điều hành QTKD'; ?></div>
                        </div>
                        <p class="prog-card-desc-new">
                            <?php echo $is_en ? 'Tailored for executives, senior managers, and busy business owners. Focuses on global strategic leadership and resolving operational conflicts.' : 'Thiết kế riêng cho các nhà điều hành, quản lý cấp cao và chủ doanh nghiệp bận rộn. Tập trung vào năng lực lãnh đạo chiến lược toàn cầu và giải quyết xung đột vận hành.'; ?>
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
                                <span
                                    class="prog-spec-label"><?php echo $is_en ? 'Curriculum:' : 'Cấu trúc môn:'; ?></span>
                                <strong
                                    class="prog-spec-value"><?php echo $is_en ? '60 ECTS - 10 courses (No thesis)' : '60 ECTS - 10 môn học (Không luận văn)'; ?></strong>
                            </div>
                        </div>
                        <div class="prog-card-actions">
                            <a href="<?php echo $is_en ? '/en/emba' : '/emba'; ?>"
                                class="prog-btn-detail"><?php echo $is_en ? 'Details' : 'Xem chi tiết'; ?></a>
                            <button type="button" class="prog-btn-inquire"
                                onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('swiss-umef-program-emba'); } else if(typeof window.showform === 'function') { window.showform('swiss-umef-program-emba'); }"><?php echo $is_en ? 'Inquire' : 'Nhận tư vấn'; ?></button>
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
                                <span><?php echo $is_en ? 'Swiss UMEF | Switzerland' : 'Swiss UMEF | Thụy Sĩ'; ?></span>
                            </div>
                        </div>
                        <div class="prog-avatar-container">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/mscai-optimized.webp" alt="MSc AI"
                                loading="lazy" decoding="async" />
                        </div>
                        <div class="prog-card-title-group">
                            <h3 class="prog-card-title-new">MSc AI</h3>
                            <div class="prog-card-subtitle-new">
                                <?php echo $is_en ? 'Master of Science in Artificial Intelligence' : 'Thạc sĩ Khoa học Trí tuệ Nhân tạo'; ?>
                            </div>
                        </div>
                        <p class="prog-card-desc-new">
                            <?php echo $is_en ? 'Applied Artificial Intelligence Master\'s program. Pioneering integration of applied AI, Machine Learning, and Big Data-driven decision making in business.' : 'Thạc sĩ Trí tuệ Nhân tạo Ứng dụng. Chương trình tiên phong kết hợp giữa kỹ thuật AI ứng dụng, Machine Learning và khả năng ra quyết định dựa trên Big Data trong doanh nghiệp.'; ?>
                        </p>
                    </div>
                    <div>
                        <div class="prog-card-specs">
                            <div class="prog-spec-item">
                                <span class="prog-spec-label"><?php echo $is_en ? 'Duration:' : 'Thời gian:'; ?></span>
                                <strong
                                    class="prog-spec-value"><?php echo $is_en ? '15 - 18 months' : '15 - 18 tháng'; ?></strong>
                            </div>
                            <div class="prog-spec-item">
                                <span
                                    class="prog-spec-label"><?php echo $is_en ? 'Curriculum:' : 'Cấu trúc môn:'; ?></span>
                                <strong
                                    class="prog-spec-value"><?php echo $is_en ? '90 ECTS - 12 courses &amp; Capstone Project' : '90 ECTS - 12 môn &amp; Capstone Project'; ?></strong>
                            </div>
                        </div>
                        <div class="prog-card-actions">
                            <a href="<?php echo $is_en ? '/en/mscai' : '/mscai'; ?>"
                                class="prog-btn-detail"><?php echo $is_en ? 'Details' : 'Xem chi tiết'; ?></a>
                            <button type="button" class="prog-btn-inquire"
                                onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('swiss-umef-program-mscai'); } else if(typeof window.showform === 'function') { window.showform('swiss-umef-program-mscai'); }"><?php echo $is_en ? 'Inquire' : 'Nhận tư vấn'; ?></button>
                        </div>
                    </div>
                </div>

                <!-- Card 4: MBA in AI -->
                <div class="prog-card-new">
                    <div>
                        <div class="prog-card-header">
                            <span class="prog-card-badge">MBA</span>
                            <div class="prog-card-school">
                                <svg class="svg-icon fa-building-columns fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160l0 8c0 13.3 10.7 24 24 24l400 0c13.3 0 24-10.7 24-24l0-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8-3.4-17.2-3.4-25.2 0zM128 224l-64 0 0 196.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512l448 0c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1L448 224l-64 0 0 192-40 0 0-192-64 0 0 192-48 0 0-192-64 0 0 192-40 0 0-192zM256 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                                <span><?php echo $is_en ? 'Swiss UMEF | Switzerland' : 'Swiss UMEF | Thụy Sĩ'; ?></span>
                            </div>
                        </div>
                        <div class="prog-avatar-container">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/mba_in_ai-optimized.webp"
                                alt="MBA in AI" loading="lazy" decoding="async" />
                        </div>
                        <div class="prog-card-title-group">
                            <h3 class="prog-card-title-new">MBA in AI</h3>
                            <div class="prog-card-subtitle-new">
                                <?php echo $is_en ? 'MBA in Applied AI' : 'Thạc sĩ QTKD Ứng dụng AI'; ?></div>
                        </div>
                        <p class="prog-card-desc-new">
                            <?php echo $is_en ? 'MBA program in Applied AI. Equips digital business leadership mindset integrated with new-generation AI tools to automate and optimize operations.' : 'Chương trình Thạc sĩ Quản trị kinh doanh Ứng dụng AI. Trang bị tư duy lãnh đạo doanh nghiệp số kết hợp năng lực ứng dụng công cụ AI thế hệ mới để tự động hóa và tối ưu vận hành.'; ?>
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
                                <span
                                    class="prog-spec-label"><?php echo $is_en ? 'Curriculum:' : 'Cấu trúc môn:'; ?></span>
                                <strong
                                    class="prog-spec-value"><?php echo $is_en ? '90 ECTS - Integrated AI &amp; MBA program' : '90 ECTS - Chương trình tích hợp AI &amp; QTKD'; ?></strong>
                            </div>
                        </div>
                        <div class="prog-card-actions">
                            <a href="<?php echo $is_en ? '/en/mbainai' : '/mbainai'; ?>"
                                class="prog-btn-detail"><?php echo $is_en ? 'Details' : 'Xem chi tiết'; ?></a>
                            <button type="button" class="prog-btn-inquire"
                                onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('swiss-umef-program-mbainai'); } else if(typeof window.showform === 'function') { window.showform('swiss-umef-program-mbainai'); }"><?php echo $is_en ? 'Inquire' : 'Nhận tư vấn'; ?></button>
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
                                <span><?php echo $is_en ? 'Swiss UMEF | Switzerland' : 'Swiss UMEF | Thụy Sĩ'; ?></span>
                            </div>
                        </div>
                        <div class="prog-avatar-container">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/02/TOPUP-optimized.webp"
                                alt="Top-up BBA" loading="lazy" decoding="async" />
                        </div>
                        <div class="prog-card-title-group">
                            <h3 class="prog-card-title-new">Top-up BBA</h3>
                            <div class="prog-card-subtitle-new">
                                <?php echo $is_en ? 'Bachelor of Business Administration Top-up' : 'Liên thông Cử nhân QTKD'; ?>
                            </div>
                        </div>
                        <p class="prog-card-desc-new">
                            <?php echo $is_en ? '12-month Swiss BBA Top-up program for students holding an Associate degree, Diploma, or who have completed their 3rd year of university.' : 'Chương trình liên thông cử nhân QTKD Thụy Sĩ nhanh chóng trong 12 tháng dành cho học viên đã tốt nghiệp Cao đẳng, Trung cấp hoặc hoàn thành năm 3 Đại học.'; ?>
                        </p>
                    </div>
                    <div>
                        <div class="prog-card-specs">
                            <div class="prog-spec-item">
                                <span class="prog-spec-label"><?php echo $is_en ? 'Duration:' : 'Thời gian:'; ?></span>
                                <strong
                                    class="prog-spec-value"><?php echo $is_en ? '12 months' : '12 tháng'; ?></strong>
                            </div>
                            <div class="prog-spec-item">
                                <span
                                    class="prog-spec-label"><?php echo $is_en ? 'Curriculum:' : 'Cấu trúc môn:'; ?></span>
                                <strong class="prog-spec-value"><?php echo $is_en ? '60 ECTS - 10 courses &amp; Thesis' : '60 ECTS - 10 môn học &amp; Luận văn'; ?></strong>
                            </div>
                        </div>
                        <div class="prog-card-actions">
                            <a href="<?php echo $is_en ? '/en/bba' : '/bba'; ?>"
                                class="prog-btn-detail"><?php echo $is_en ? 'Details' : 'Xem chi tiết'; ?></a>
                            <button type="button" class="prog-btn-inquire"
                                onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('swiss-umef-program-bba'); } else if(typeof window.showform === 'function') { window.showform('swiss-umef-program-bba'); }"><?php echo $is_en ? 'Inquire' : 'Nhận tư vấn'; ?></button>
                        </div>
                    </div>
                </div>

                <!-- Card 6: Full BBA -->
                <div class="prog-card-new">
                    <div>
                        <div class="prog-card-header">
                            <span class="prog-card-badge">BBA</span>
                            <div class="prog-card-school">
                                <svg class="svg-icon fa-building-columns fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160l0 8c0 13.3 10.7 24 24 24l400 0c13.3 0 24-10.7 24-24l0-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8-3.4-17.2-3.4-25.2 0zM128 224l-64 0 0 196.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512l448 0c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1L448 224l-64 0 0 192-40 0 0-192-64 0 0 192-48 0 0-192-64 0 0 192-40 0 0-192zM256 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                                <span><?php echo $is_en ? 'Swiss UMEF | Switzerland' : 'Swiss UMEF | Thụy Sĩ'; ?></span>
                            </div>
                        </div>
                        <div class="prog-avatar-container">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/online_bba-optimized.webp"
                                alt="Global Online BBA" loading="lazy" decoding="async" />
                        </div>
                        <div class="prog-card-title-group">
                            <h3 class="prog-card-title-new">Global Online BBA</h3>
                            <div class="prog-card-subtitle-new">
                                <?php echo $is_en ? 'Bachelor of Business Administration' : 'Cử nhân Quản trị Kinh doanh'; ?>
                            </div>
                        </div>
                        <p class="prog-card-desc-new">
                            <?php echo $is_en ? 'European-standard 3-year BBA program, providing modern business management foundation and outstanding international integration capabilities.' : 'Chương trình Cử nhân Quản trị Kinh doanh chính quy 3 năm chuẩn Châu Âu, mang lại nền tảng kiến thức quản trị kinh doanh hiện đại và năng lực hội nhập quốc tế vượt trội.'; ?>
                        </p>
                    </div>
                    <div>
                        <div class="prog-card-specs">
                            <div class="prog-spec-item">
                                <span class="prog-spec-label"><?php echo $is_en ? 'Duration:' : 'Thời gian:'; ?></span>
                                <strong
                                    class="prog-spec-value"><?php echo $is_en ? '3 years (36 months)' : '3 năm (36 tháng)'; ?></strong>
                            </div>
                            <div class="prog-spec-item">
                                <span
                                    class="prog-spec-label"><?php echo $is_en ? 'Curriculum:' : 'Cấu trúc môn:'; ?></span>
                                <strong
                                    class="prog-spec-value"><?php echo $is_en ? '180 ECTS - 34 courses &amp; Thesis' : '180 ECTS - 34 môn học &amp; Luận văn'; ?></strong>
                            </div>
                        </div>
                        <div class="prog-card-actions">
                            <a href="<?php echo $is_en ? '/en/fullbba' : '/fullbba'; ?>"
                                class="prog-btn-detail"><?php echo $is_en ? 'Details' : 'Xem chi tiết'; ?></a>
                            <button type="button" class="prog-btn-inquire"
                                onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('swiss-umef-program-fullbba'); } else if(typeof window.showform === 'function') { window.showform('swiss-umef-program-fullbba'); }"><?php echo $is_en ? 'Inquire' : 'Nhận tư vấn'; ?></button>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- WHY CHOOSE IDEAS EDUCATION -->
        <section class="ideas-section">
            <div class="container">
                <div class="ideas-layout">
                    <div class="ideas-img-box reveal-up">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/11/DSCF6777.webp"
                            alt="<?php echo $is_en ? 'Graduation ceremony of MBA IDEAS students' : 'Lễ tốt nghiệp học viên MBA IDEAS'; ?>"
                            loading="lazy" />
                    </div>
                    <div class="reveal-up">
                        <span
                            class="section-badge"><?php echo $is_en ? 'Reputable Academic Support Partner' : 'Đơn vị hỗ trợ học vụ uy tín'; ?></span>
                        <h2 class="section-title">
                            <?php echo $is_en ? 'Why Choose <span>IDEAS Education</span>?' : 'Tại sao chọn <span>IDEAS Education</span>?'; ?>
                        </h2>
                        <p style="line-height: 1.6;">
                            <?php echo $is_en ? 'With over 15 years of establishment and development, the Institute for Applied Sciences Research and Development (IDEAS) is proud to be the leading partner for international MBA education support in Vietnam.' : 'Với hơn 15 năm hình thành và phát triển, Viện Nghiên cứu Phát triển và Trao đổi Khoa học Áp dụng (IDEAS) tự hào là đối tác hỗ trợ giáo dục và quản lý đào tạo MBA Quốc tế hàng đầu tại Việt Nam.'; ?>
                        </p>
                        <ul class="ideas-points">
                            <li class="ideas-point-item">
                                <svg class="svg-icon fa-square-poll-vertical fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm64 192c17.7 0 32 14.3 32 32l0 96c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-96c0-17.7 14.3-32 32-32zm64-64c0-17.7 14.3-32 32-32s32 14.3 32 32l0 192c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-192zM320 288c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-32c0-17.7 14.3-32 32-32z"/></svg>
                                <span><strong><?php echo $is_en ? '24/7 Bilingual Academic Support:' : 'Hỗ trợ học vụ song ngữ 24/7:'; ?></strong>
                                    <?php echo $is_en ? 'Minimize language barriers and adapt to European learning methodologies through Vietnamese tutoring classes.' : 'Giảm thiểu rào cản ngôn ngữ và phương pháp học Châu Âu thông qua các lớp chuyên đề bổ trợ kiến thức bằng tiếng Việt.'; ?></span>
                            </li>
                            <li class="ideas-point-item">
                                <svg class="svg-icon fa-credit-card fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M64 32C28.7 32 0 60.7 0 96l0 32 576 0 0-32c0-35.3-28.7-64-64-64L64 32zM576 224L0 224 0 416c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-192zM112 352l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm112 16c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16z"/></svg>
                                <span><strong><?php echo $is_en ? 'Sacombank Tuition Installment:' : 'Trả góp học phí Sacombank:'; ?></strong>
                                    <?php echo $is_en ? 'Maximum financial support with flexible installments or 0% interest installment plan via Sacombank.' : 'Hỗ trợ tài chính tối đa với chính sách chia nhỏ học phí đóng theo đợt hoặc trả góp lãi suất 0% qua ngân hàng Sacombank.'; ?></span>
                            </li>
                            <li class="ideas-point-item">
                                <svg class="svg-icon fa-users fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                                <span><strong><?php echo $is_en ? '2500+ Alumni Network:' : 'Mạng lưới Network 2500+:'; ?></strong>
                                    <?php echo $is_en ? 'Opportunities to participate in networking workshops and events with a community of over 2500 graduated managers and directors.' : 'Cơ hội tham gia các hội thảo, sự kiện kết nối cùng cộng đồng hơn 2500 học viên đã tốt nghiệp là quản lý, giám đốc doanh nghiệp.'; ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA BANNER -->
        <section class="container">
            <div class="cta-banner">
                <div class="cta-banner-glow"></div>
                <h2><?php echo $is_en ? 'Start your career advancement journey today' : 'Bắt đầu hành trình nâng tầm sự nghiệp ngay hôm nay'; ?>
                </h2>
                <p><?php echo $is_en ? 'Get detailed information on admission requirements, scholarships, and the latest intake schedule of international MBA programs.' : 'Nhận ngay tài liệu chi tiết về điều kiện tuyển sinh, học bổng và lịch khai giảng mới nhất của các chương trình MBA quốc tế.'; ?>
                </p>
                <button type="button" class="btn-ideas-primary"
                    onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('cta-banner-hub'); } else if(typeof window.showform === 'function') { window.showform('cta-banner-hub'); }">
                    <?php echo $is_en ? 'Register for MBA Roadmap Counseling' : 'Đăng ký tư vấn lộ trình MBA'; ?> <svg class="svg-icon fa-circle-arrow-right fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM297 385c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l71-71L120 280c-13.3 0-24-10.7-24-24s10.7-24 24-24l214.1 0-71-71c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L409 239c9.4 9.4 9.4 24.6 0 33.9L297 385z"/></svg>
                </button>
            </div>
        </section>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // FAQ Accordion toggling
            const faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach(item => {
                const header = item.querySelector('.faq-header');
                header.addEventListener('click', function () {
                    const isActive = item.classList.contains('active');

                    // Close all other items
                    faqItems.forEach(otherItem => {
                        otherItem.classList.remove('active');
                        const otherBody = otherItem.querySelector('.faq-body');
                        if (otherBody) otherBody.style.maxHeight = '0px';
                    });

                    if (!isActive) {
                        item.classList.add('active');
                        const body = item.querySelector('.faq-body');
                        const content = item.querySelector('.faq-content');
                        if (body && content) {
                            body.style.maxHeight = (content.offsetHeight + 40) + 'px';
                        }
                    }
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
            initMobileSlider('.programs-grid');
        });
    </script>

    <!-- Script imports -->
    <?php
    $js_path = get_stylesheet_directory() . '/common-assets/js/script.min.js';
    $js_version = file_exists($js_path) ? filemtime($js_path) : time();
    $bk_js_path = get_stylesheet_directory() . '/common-assets/js/booking-modal.min.js';
    $bk_js_version = file_exists($bk_js_path) ? filemtime($bk_js_path) : time();

    // Prevent booking-modal.min.js from loading twice in shared-modals.php
    if (!defined('BOOKING_MODAL_JS_LOADED')) {
        define('BOOKING_MODAL_JS_LOADED', true);
    }
    ?>
    <script
        src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/script.min.js?v=<?php echo $js_version; ?>"
        defer></script>
    <script
        src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/booking-modal.min.js?v=<?php echo $bk_js_version; ?>"
        defer></script>

    <!-- Shared Footer -->
    <?php get_footer(); ?>
</body>

</html>