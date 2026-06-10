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
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: https://ogp.me/ns#">

<head>
    <!-- Google Tag Manager / Global Site Tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QKV7LKNLLH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
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
    
    <!-- Preload LCP background image -->
    <link rel="preload" fetchpriority="high" as="image" href="https://ideas.edu.vn/wp-content/uploads/2025/11/ltnumef10202501.webp" />
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />

    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <!-- Link the main minified style.css -->
    <?php
    $css_path = get_stylesheet_directory() . '/common-assets/css/style.min.css';
    $css_version = file_exists($css_path) ? filemtime($css_path) : time();
    ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/style.min.css?v=<?php echo $css_version; ?>" />
    
    <!-- Booking Modal stylesheet -->
    <?php
    define('BOOKING_MODAL_CSS_LOADED', true);
    $bk_css_path = get_stylesheet_directory() . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/booking-modal.min.css?v=<?php echo $bk_css_version; ?>" />

    <link rel="preconnect" href="https://automation.ideas.edu.vn" />
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/webfonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin />
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/webfonts/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin />

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
        <title>Học Cử nhân BBA &amp; Thạc sĩ MBA Online Thụy Sĩ | Viện IDEAS</title>
        <meta name="description" content="Chương trình đào tạo Cử nhân (BBA) &amp; Thạc sĩ (MBA, MSc) trực tuyến chuẩn quốc tế từ các trường Đại học danh tiếng của Thụy Sĩ. Linh hoạt cho người bận rộn."/>
        <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
        <link rel="canonical" href="https://ideas.edu.vn/thac-si-quan-tri-kinh-doanh-mba" />
        <meta property="og:locale" content="vi_VN" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Học Cử nhân BBA &amp; Thạc sĩ MBA Online Thụy Sĩ | Viện IDEAS" />
        <meta property="og:description" content="Chương trình đào tạo Cử nhân (BBA) &amp; Thạc sĩ (MBA, MSc) trực tuyến chuẩn quốc tế từ các trường Đại học danh tiếng của Thụy Sĩ. Linh hoạt cho người bận rộn." />
        <meta property="og:url" content="https://ideas.edu.vn/thac-si-quan-tri-kinh-doanh-mba" />
        <meta property="og:site_name" content="IDEAS" />
        <meta property="og:updated_time" content="2026-03-30T09:51:56+07:00" />
        <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp" />
        <meta property="og:image:secure_url" content="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp" />
        <meta property="og:image:width" content="1920" />
        <meta property="og:image:height" content="1080" />
        <meta property="og:image:alt" content="chương trình bba mba online thụy sĩ" />
        <meta property="og:image:type" content="image/png" />
    <?php endif; ?>

    <style>
        /* ══════════════════════════════════════
           MBA SEO PAGE – PREMIUM DARK THEME DESIGN
           ══════════════════════════════════════ */
        html {
            scroll-snap-type: none !important;
            scroll-behavior: auto !important;
        }
        html,
        body {
            overflow-x: hidden !important;
            background-color: #080405 !important;
            color: #cbd5e1 !important;
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
            max-width: 100% !important;
        }
        body {
            background-image:
                radial-gradient(circle at 15% 20%, rgba(185, 14, 0, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 85% 65%, rgba(185, 14, 0, 0.1) 0%, transparent 50%),
                radial-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 1px) !important;
            background-size: 100% 100%, 100% 100%, 28px 28px !important;
            background-attachment: scroll, scroll, fixed !important;
        }
        body,
        #content,
        main {
            float: none !important;
            width: 100% !important;
            max-width: 100% !important;
            margin: 0 auto !important;
            padding: 0 !important;
            overflow-x: hidden !important;
        }

        /* ─── GENERAL STYLES ─── */
        .container {
            width: 100% !important;
            max-width: 1200px !important;
            margin: 0 auto !important;
            padding: 0 20px !important;
        }
        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(171, 14, 0, 0.2) !important;
            border: 1px solid rgba(255, 77, 77, 0.3) !important;
            color: #ffcccc !important;
            padding: 6px 16px;
            border-radius: 100px;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            margin-bottom: 20px;
        }
        .section-title {
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            font-weight: 800;
            line-height: 1.25;
            color: #ffffff !important;
            margin-bottom: 20px;
        }
        .section-desc {
            font-size: 1.05rem;
            color: #94a3b8 !important;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto 50px;
        }
        .gradient-text {
            background: linear-gradient(135deg, #ff8e8e 0%, #ff4f4f 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }
        
        /* ─── HERO (DARK THEME) ─── */
        .mba-hero {
            padding: 180px 0 100px;
            position: relative;
            background-color: transparent !important;
            color: #ffffff !important;
            text-align: center;
            overflow: hidden;
            min-height: 45vh;
            display: flex;
            align-items: center;
        }
        .mba-hero-bg {
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
            opacity: 0.25 !important;
            pointer-events: none;
        }
        .mba-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(180deg,
                    rgba(8, 4, 5, 0.85) 0%,
                    rgba(80, 6, 0, 0.35) 60%,
                    #080405 100%),
                radial-gradient(ellipse at 50% 50%, rgba(171, 14, 0, 0.2) 0%, transparent 75%) !important;
            pointer-events: none;
        }
        .mba-hero-container {
            position: relative;
            z-index: 3;
            max-width: 900px !important;
            margin: 0 auto !important;
        }
        .mba-hero-content {
            position: relative;
            z-index: 5;
        }
        .mba-hero-title {
            font-size: clamp(2.2rem, 5.5vw, 3.6rem);
            font-weight: 900;
            color: #ffffff !important;
            line-height: 1.15;
            margin-bottom: 24px;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.6);
        }
        .mba-hero-title span {
            background: linear-gradient(135deg, #ff8e8e 0%, #ff4f4f 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }
        .mba-hero-sub {
            font-size: 1.15rem;
            color: rgba(255, 255, 255, 0.95) !important;
            line-height: 1.6;
            margin-bottom: 35px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }
        .mba-hero-badges {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 40px;
        }
        .mba-hero-badge-item {
            background: rgba(255, 255, 255, 0.03) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            padding: 10px 20px;
            border-radius: 100px;
            font-size: 0.9rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9) !important;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            backdrop-filter: blur(8px);
        }
        .mba-hero-badge-item:hover {
            border-color: rgba(255, 77, 77, 0.3) !important;
            background: rgba(171, 14, 0, 0.15) !important;
            transform: translateY(-2px);
        }
        .mba-hero-badge-item i {
            color: #ff4f4f !important;
        }
        .mba-hero-ctas {
            display: flex;
            justify-content: center;
            gap: 16px;
            margin-bottom: 50px;
            flex-wrap: wrap;
        }
        .btn-ideas-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #ab0e00, #ff3600) !important;
            color: #fff !important;
            padding: 14px 28px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 8px 24px rgba(171, 14, 0, 0.35) !important;
        }
        .btn-ideas-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(171, 14, 0, 0.5) !important;
            filter: brightness(1.08);
        }
        .btn-ideas-outline {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.03) !important;
            color: #ffffff !important;
            padding: 14px 28px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1.5px solid rgba(255, 255, 255, 0.2) !important;
            cursor: pointer;
            backdrop-filter: blur(8px);
        }
        .btn-ideas-outline:hover {
            border-color: #ffffff !important;
            background: rgba(255, 255, 255, 0.08) !important;
            transform: translateY(-2px);
        }

        /* ─── PROGRAM CATALOG (DARK GLASSMORPHISM) ─── */
        .catalog-section {
            padding: 80px 0;
            position: relative;
            background: transparent !important;
        }
        .catalog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        .catalog-card {
            background: rgba(255, 255, 255, 0.02) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            border-radius: 24px;
            padding: 35px;
            display: flex;
            flex-direction: column;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            z-index: 1;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4) !important;
            color: #cbd5e1 !important;
        }
        .catalog-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top right, rgba(171, 14, 0, 0.15) 0%, transparent 60%);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        .catalog-card:hover {
            transform: translateY(-8px);
            border-color: rgba(255, 59, 48, 0.35) !important;
            background: rgba(255, 255, 255, 0.03) !important;
            box-shadow: 0 20px 45px rgba(171, 14, 0, 0.25) !important;
        }
        .catalog-card:hover::before {
            opacity: 1;
        }
        .catalog-card-icon {
            font-size: 1.5rem;
            color: #ff4d4d !important;
            background: rgba(171, 14, 0, 0.2) !important;
            width: 54px;
            height: 54px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 77, 77, 0.2) !important;
        }
        .catalog-card:hover .catalog-card-icon {
            background: #ab0e00 !important;
            color: #ffffff !important;
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(171, 14, 0, 0.2);
        }
        .catalog-card-title {
            font-size: 1.45rem;
            font-weight: 800;
            color: #ffffff !important;
            margin-bottom: 8px;
            line-height: 1.3;
        }
        .catalog-card-school {
            font-size: 0.85rem;
            font-weight: 700;
            color: #ff4d4d !important;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            margin-bottom: 20px;
        }
        .catalog-card-desc {
            font-size: 0.95rem;
            color: #cbd5e1 !important;
            line-height: 1.6;
            margin-bottom: 24px;
            flex-grow: 1;
        }
        .catalog-card-badges {
            display: flex;
            gap: 8px;
            margin-bottom: 16px;
            flex-wrap: wrap;
        }
        .catalog-card-badge {
            background: rgba(171, 14, 0, 0.2) !important;
            border: 1px solid rgba(255, 77, 77, 0.2) !important;
            color: #ffcccc !important;
            padding: 5px 12px;
            border-radius: 8px;
            font-size: 0.82rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .catalog-card-highlights {
            list-style: none;
            padding: 18px 0;
            margin: 0 0 24px 0;
            border-top: 1px dashed rgba(255, 255, 255, 0.08) !important;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .catalog-card-highlight-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 0.9rem;
            color: #cbd5e1 !important;
            line-height: 1.5;
        }
        .catalog-card-highlight-item i {
            color: #ff4d4d !important;
            font-size: 0.95rem;
            margin-top: 3px;
            width: 16px;
            text-align: center;
        }
        .catalog-card-highlight-item strong {
            color: #ffffff !important;
            font-weight: 600;
        }
        .catalog-card-btn {
            width: 100%;
            padding: 12px 24px;
            background: rgba(255, 255, 255, 0.04) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            color: #ffffff !important;
            font-weight: 700;
            border-radius: 12px;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            box-sizing: border-box;
        }
        .catalog-card-btn i {
            transition: transform 0.2s ease;
        }
        .catalog-card:hover .catalog-card-btn {
            background: #ab0e00 !important;
            border-color: #ab0e00 !important;
            color: #ffffff !important;
        }
        .catalog-card:hover .catalog-card-btn i {
            transform: translateX(4px);
        }
        
        /* ─── PARTNERS (DARK THEME OVERRIDES) ─── */
        .partners-section {
            padding: 80px 0;
            background: transparent !important;
            border-top: 1px solid rgba(255, 255, 255, 0.05) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
        }
        .partners-grid {
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }
        .partner-card {
            background: rgba(255, 255, 255, 0.02) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            border-radius: 24px;
            padding: 40px;
            transition: all 0.3s ease;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4) !important;
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            color: #cbd5e1 !important;
        }
        .partner-card:hover {
            border-color: rgba(255, 59, 48, 0.35) !important;
            background: rgba(255, 255, 255, 0.03) !important;
            transform: translateY(-4px);
            box-shadow: 0 20px 45px rgba(171, 14, 0, 0.25) !important;
        }
        .partner-card.split-layout {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 40px;
            align-items: center;
        }
        @media (max-width: 768px) {
            .partner-card.split-layout {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 30px;
            }
        }
        .partner-card-left {
            text-align: center;
            border-right: 1px solid rgba(255, 255, 255, 0.08) !important;
            padding-right: 40px;
        }
        @media (max-width: 768px) {
            .partner-card-left {
                border-right: none !important;
                padding-right: 0;
                border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
                padding-bottom: 20px;
            }
        }
        .partner-logo-box {
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            background: transparent !important;
        }
        .partner-logo-box img {
            max-height: 100%;
            max-width: 90%;
            object-fit: contain;
            filter: brightness(1.05) contrast(1.05);
        }
        .partner-title {
            font-size: 1.4rem;
            font-weight: 800;
            color: #ffffff !important;
            margin-bottom: 8px;
        }
        .partner-loc {
            font-size: 0.9rem;
            color: #94a3b8 !important;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
        .partner-loc i {
            color: #ff4d4d !important;
        }
        .partner-card-right {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .partner-features {
            text-align: left;
        }
        .partner-feature-item {
            font-size: 0.95rem;
            color: #cbd5e1 !important;
            margin-bottom: 16px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            line-height: 1.5;
        }
        .partner-feature-item:last-child {
            margin-bottom: 0;
        }
        .partner-feature-item i {
            color: #ff4d4d !important;
            font-size: 1.1rem;
            margin-top: 3px;
        }

        /* ─── PROS & CONS (DARK THEME OVERRIDES) ─── */
        .proscons-section {
            padding: 80px 0;
            background: transparent !important;
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
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4) !important;
            transition: all 0.3s ease;
            color: #cbd5e1 !important;
        }
        .proscons-col:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.5) !important;
        }
        .proscons-col.pros-col {
            background: linear-gradient(180deg, rgba(16, 185, 129, 0.05) 0%, rgba(255, 255, 255, 0.01) 100%) !important;
            border-top: 5px solid #10b981 !important;
        }
        .proscons-col.cons-col {
            background: linear-gradient(180deg, rgba(239, 68, 68, 0.05) 0%, rgba(255, 255, 255, 0.01) 100%) !important;
            border-top: 5px solid #ef4444 !important;
        }
        .proscons-col-title {
            font-size: 1.4rem;
            font-weight: 800;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .pros-title { color: #10b981 !important; }
        .cons-title { color: #ef4444 !important; }
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
        .pros-item i { color: #10b981 !important; }
        .cons-item i { color: #ef4444 !important; }
        .proscons-item h5 {
            font-size: 1rem;
            font-weight: 700;
            color: #ffffff !important;
            margin: 0 0 6px 0;
        }
        .proscons-item p {
            font-size: 0.92rem;
            color: #94a3b8 !important;
            margin: 0;
        }

        /* ─── CORE COMPETENCIES (DARK THEME OVERRIDES) ─── */
        .comp-section {
            padding: 80px 0;
            background: transparent !important;
        }
        .comp-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            margin-top: 40px;
        }
        .comp-card {
            background: rgba(255, 255, 255, 0.02) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            border-radius: 16px;
            padding: 30px;
            position: relative;
            transition: all 0.3s ease;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4) !important;
            color: #cbd5e1 !important;
        }
        .comp-card:hover {
            background: rgba(255, 255, 255, 0.03) !important;
            border-color: rgba(255, 59, 48, 0.3) !important;
            transform: translateY(-4px);
            box-shadow: 0 20px 45px rgba(171, 14, 0, 0.2) !important;
        }
        .comp-num {
            font-size: 3.2rem;
            font-weight: 900;
            color: rgba(255, 255, 255, 0.02) !important;
            position: absolute;
            top: 15px; right: 20px;
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
            color: #ff4d4d !important;
            background: rgba(171, 14, 0, 0.2) !important;
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 77, 77, 0.2) !important;
        }
        .comp-card:hover .comp-card-icon {
            background: #ab0e00 !important;
            color: #ffffff !important;
            transform: rotate(360deg);
        }
        .comp-card-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: #ffffff !important;
            margin-bottom: 12px;
        }
        .comp-card-desc {
            font-size: 0.9rem;
            color: #94a3b8 !important;
            line-height: 1.5;
        }

        /* ─── FAQ / ACCORDION (DARK THEME OVERRIDES) ─── */
        .faq-section {
            padding: 80px 0;
            background: transparent !important;
        }
        .faq-accordion {
            max-width: 800px;
            margin: 40px auto 0;
        }
        .faq-item {
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            background: rgba(255, 255, 255, 0.02) !important;
            border-radius: 12px;
            margin-bottom: 16px;
            overflow: hidden;
            transition: all 0.3s ease, border-left 0.15s ease;
            border-left: 4px solid transparent;
            color: #cbd5e1 !important;
        }
        .faq-item:hover {
            border-color: rgba(255, 77, 77, 0.2) !important;
            background: rgba(255, 255, 255, 0.03) !important;
            box-shadow: 0 4px 12px -2px rgba(0, 0, 0, 0.5) !important;
        }
        .faq-item.active {
            border-left: 4px solid #ab0e00 !important;
            border-color: rgba(255, 77, 77, 0.3) !important;
            background: rgba(255, 255, 255, 0.04) !important;
            box-shadow: 0 6px 16px -4px rgba(171, 14, 0, 0.2) !important;
        }
        .faq-header {
            padding: 20px 24px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 700;
            color: #ffffff !important;
            font-size: 1.05rem;
        }
        .faq-arrow {
            font-size: 0.8rem;
            color: #94a3b8 !important;
            transition: transform 0.3s ease;
        }
        .faq-item.active .faq-arrow {
            transform: rotate(180deg);
            color: #ff4d4d !important;
        }
        .faq-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            font-size: 0.95rem;
            color: #cbd5e1 !important;
            line-height: 1.6;
        }
        .faq-item.active .faq-body {
            max-height: 500px;
        }
        .faq-content {
            padding: 0 24px 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.08) !important;
            padding-top: 16px;
        }

        /* ─── IDEAS SECTION (DARK THEME OVERRIDES) ─── */
        .ideas-section {
            padding: 80px 0;
            background: transparent !important;
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
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.6) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
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
            color: #cbd5e1 !important;
            line-height: 1.5;
        }
        .ideas-point-item i {
            color: #ff4d4d !important;
            margin-top: 4px;
            width: 16px;
        }
        .ideas-point-item strong {
            color: #ffffff !important;
        }

        /* ─── CTA BANNER (DARK & MOBILE OPTIMIZED) ─── */
        .cta-banner {
            background: linear-gradient(135deg, #ab0e00 0%, #5c0700 100%) !important;
            border: 1px solid rgba(255, 255, 255, 0.08) !important;
            border-radius: 32px;
            padding: 70px 40px;
            text-align: center;
            margin: 80px auto;
            position: relative;
            overflow: hidden;
            max-width: 1000px;
            box-shadow: 0 20px 40px -15px rgba(171, 14, 0, 0.3) !important;
        }
        .cta-banner-glow {
            position: absolute;
            width: 400px; height: 400px;
            background: #ffffff;
            filter: blur(160px);
            opacity: 0.12;
            top: -150px; left: -150px;
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
            color: #ab0e00 !important;
            font-weight: 800;
            padding: 16px 36px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1) !important;
        }
        .cta-banner .btn-ideas-primary:hover {
            background: #f8fafc !important;
            color: #8c0b00 !important;
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

        /* ── Header Width Fix ────────────────── */
        .ideas_header .container {
            max-width: 1360px !important;
            width: 100% !important;
            padding: 0 20px !important;
        }

        .reveal-up {
            opacity: 1;
        }
    </style>
    <?php wp_head(); ?>
    <style>
        /* Force override any enqueued parent theme styles outputted in wp_head() */
        html, body {
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
        <section class="mba-hero" id="trang-chu">
            <div class="mba-hero-bg" style="background-image: url('https://ideas.edu.vn/wp-content/uploads/2025/11/ltnumef10202501.webp');"></div>
            <div class="mba-hero-overlay"></div>
            <div class="container mba-hero-container">
                <div class="mba-hero-content reveal-up">
                    <span class="section-label">
                        <i class="fa-solid fa-graduation-cap"></i> Cử nhân &amp; Thạc sĩ Thụy Sĩ
                    </span>
                    <h1 class="mba-hero-title">
                        Học Cử nhân BBA &amp; Thạc sĩ <span class="gradient-text">MBA Online Thụy Sĩ</span> tại Việt Nam
                    </h1>
                    <p class="mba-hero-sub">
                        Cổng kết nối các chương trình đào tạo Cử nhân (BBA) và Thạc sĩ (MBA, MSc) trực tuyến chuẩn quốc tế từ các trường Đại học danh tiếng của Thụy Sĩ. Giải pháp học tập tinh hoa, linh hoạt tối đa dành riêng cho người bận rộn.
                    </p>

                    <div class="mba-hero-badges">
                        <div class="mba-hero-badge-item">
                            <i class="fa-solid fa-laptop"></i> <span>Học Online 100%</span>
                        </div>
                        <div class="mba-hero-badge-item">
                            <i class="fa-solid fa-clock"></i> <span>Linh hoạt 12-36 Tháng</span>
                        </div>
                        <div class="mba-hero-badge-item">
                            <i class="fa-solid fa-medal"></i> <span>Bằng cấp Thụy Sĩ</span>
                        </div>
                        <div class="mba-hero-badge-item">
                            <i class="fa-solid fa-shield-halved"></i> <span>Kiểm định Quốc tế</span>
                        </div>
                    </div>

                    <div class="mba-hero-ctas">
                        <button type="button" class="btn-ideas-primary" onclick="if(typeof window.openRegModal === 'function') window.openRegModal('hero-hub')">
                            <span>Tư vấn chọn chương trình</span>
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                        <a href="#danh-sach" class="btn-ideas-outline">
                            <span>Khám phá các khóa học</span>
                            <i class="fa-solid fa-arrow-down"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- MBA PROGRAM CATALOG -->
        <section class="catalog-section" id="danh-sach">
            <div class="container text-center">
                <span class="section-label">Danh mục đào tạo</span>
                <h2 class="section-title">Các Chương trình <span class="gradient-text">Cử nhân &amp; Thạc sĩ nổi bật</span></h2>
                <p class="section-desc">
                    Tuyển chọn các khóa học Cử nhân (BBA) và Thạc sĩ (MBA, MSc) trực tuyến chất lượng cao từ Thụy Sĩ, đáp ứng mọi định hướng phát triển từ nền tảng kinh doanh, lãnh đạo điều hành đến dẫn đầu xu hướng công nghệ số.
                </p>

                <div class="catalog-grid text-left">
                    
                    <!-- Card 1: Online MBA -->
                    <article class="catalog-card">
                        <div class="catalog-card-icon">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <h3 class="catalog-card-title">Online MBA</h3>
                        <div class="catalog-card-school" style="margin-bottom: 12px;">Swiss UMEF (Thụy Sĩ)</div>
                        
                        <div class="catalog-card-badges">
                            <span class="catalog-card-badge"><i class="fa-solid fa-hourglass-half"></i> 18 tháng</span>
                            <span class="catalog-card-badge"><i class="fa-solid fa-graduation-cap"></i> 90 ECTS</span>
                        </div>

                        <p class="catalog-card-desc">
                            Chương trình Thạc sĩ Quản trị Kinh doanh trực tuyến tổng hợp chuẩn Bologna Châu Âu, tập trung xây dựng tư duy quản trị toàn diện từ chiến lược đến thực thi.
                        </p>

                        <ul class="catalog-card-highlights">
                            <li class="catalog-card-highlight-item">
                                <i class="fa-solid fa-book-open"></i>
                                <span><strong>Cấu trúc:</strong> 12 môn học + Luận văn</span>
                            </li>
                            <li class="catalog-card-highlight-item">
                                <i class="fa-solid fa-bullseye"></i>
                                <span><strong>Mục tiêu:</strong> Nâng tầm quản lý tổng thể</span>
                            </li>
                        </ul>
                        <a href="<?php echo esc_url(home_url('/mba')); ?>" class="catalog-card-btn">Xem chi tiết chương trình <i class="fa-solid fa-arrow-right-long" style="margin-left: 6px; font-size: 0.85rem;"></i></a>
                    </article>

                    <!-- Card 2: Executive MBA -->
                    <article class="catalog-card">
                        <div class="catalog-card-icon">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <h3 class="catalog-card-title">Executive MBA (EMBA)</h3>
                        <div class="catalog-card-school" style="margin-bottom: 12px;">Swiss UMEF (Thụy Sĩ)</div>
                        
                        <div class="catalog-card-badges">
                            <span class="catalog-card-badge"><i class="fa-solid fa-hourglass-half"></i> 14 - 16 tháng</span>
                            <span class="catalog-card-badge"><i class="fa-solid fa-graduation-cap"></i> 60 ECTS</span>
                        </div>

                        <p class="catalog-card-desc">
                            Thiết kế riêng cho các nhà điều hành, quản lý cấp cao và chủ doanh nghiệp bận rộn. Tập trung vào năng lực lãnh đạo chiến lược toàn cầu và giải quyết xung đột vận hành.
                        </p>

                        <ul class="catalog-card-highlights">
                            <li class="catalog-card-highlight-item">
                                <i class="fa-solid fa-book-open"></i>
                                <span><strong>Cấu trúc:</strong> 10 môn học (Không luận văn)</span>
                            </li>
                            <li class="catalog-card-highlight-item">
                                <i class="fa-solid fa-bullseye"></i>
                                <span><strong>Mục tiêu:</strong> Đột phá năng lực lãnh đạo</span>
                            </li>
                        </ul>
                        <a href="<?php echo esc_url(home_url('/emba')); ?>" class="catalog-card-btn">Xem chi tiết chương trình <i class="fa-solid fa-arrow-right-long" style="margin-left: 6px; font-size: 0.85rem;"></i></a>
                    </article>

                    <!-- Card 3: MSc AI -->
                    <article class="catalog-card">
                        <div class="catalog-card-icon">
                            <i class="fa-solid fa-brain"></i>
                        </div>
                        <h3 class="catalog-card-title">Master AI (MSc AI)</h3>
                        <div class="catalog-card-school" style="margin-bottom: 12px;">Swiss UMEF (Thụy Sĩ)</div>
                        
                        <div class="catalog-card-badges">
                            <span class="catalog-card-badge"><i class="fa-solid fa-hourglass-half"></i> 15 - 18 tháng</span>
                            <span class="catalog-card-badge"><i class="fa-solid fa-graduation-cap"></i> 90 ECTS</span>
                        </div>

                        <p class="catalog-card-desc">
                            Thạc sĩ Trí tuệ Nhân tạo Ứng dụng. Chương trình tiên phong kết hợp giữa kỹ thuật AI ứng dụng, Machine Learning và khả năng ra quyết định dựa trên Big Data trong doanh nghiệp.
                        </p>

                        <ul class="catalog-card-highlights">
                            <li class="catalog-card-highlight-item">
                                <i class="fa-solid fa-book-open"></i>
                                <span><strong>Cấu trúc:</strong> 12 môn + Capstone Project</span>
                            </li>
                            <li class="catalog-card-highlight-item">
                                <i class="fa-solid fa-bullseye"></i>
                                <span><strong>Mục tiêu:</strong> Làm chủ công nghệ và dữ liệu</span>
                            </li>
                        </ul>
                        <a href="<?php echo esc_url(home_url('/mscai')); ?>" class="catalog-card-btn">Xem chi tiết chương trình <i class="fa-solid fa-arrow-right-long" style="margin-left: 6px; font-size: 0.85rem;"></i></a>
                    </article>

                    <!-- Card 4: MBA in AI -->
                    <article class="catalog-card">
                        <div class="catalog-card-icon">
                            <i class="fa-solid fa-robot"></i>
                        </div>
                        <h3 class="catalog-card-title">MBA in AI</h3>
                        <div class="catalog-card-school" style="margin-bottom: 12px;">Swiss UMEF (Thụy Sĩ)</div>
                        
                        <div class="catalog-card-badges">
                            <span class="catalog-card-badge"><i class="fa-solid fa-hourglass-half"></i> 16 - 18 tháng</span>
                            <span class="catalog-card-badge"><i class="fa-solid fa-graduation-cap"></i> 90 ECTS</span>
                        </div>

                        <p class="catalog-card-desc">
                            Chương trình Thạc sĩ Quản trị kinh doanh Ứng dụng AI. Trang bị tư duy lãnh đạo doanh nghiệp số kết hợp năng lực ứng dụng công cụ AI thế hệ mới để tự động hóa và tối ưu vận hành.
                        </p>

                        <ul class="catalog-card-highlights">
                            <li class="catalog-card-highlight-item">
                                <i class="fa-solid fa-book-open"></i>
                                <span><strong>Cấu trúc:</strong> Chương trình tích hợp AI &amp; QTKD</span>
                            </li>
                            <li class="catalog-card-highlight-item">
                                <i class="fa-solid fa-bullseye"></i>
                                <span><strong>Mục tiêu:</strong> Lãnh đạo kỷ nguyên AI toàn cầu</span>
                            </li>
                        </ul>
                        <a href="<?php echo esc_url(home_url('/mbainai')); ?>" class="catalog-card-btn">Xem chi tiết chương trình <i class="fa-solid fa-arrow-right-long" style="margin-left: 6px; font-size: 0.85rem;"></i></a>
                    </article>

                    <!-- Card 5: Top-up BBA -->
                    <article class="catalog-card">
                        <div class="catalog-card-icon">
                            <i class="fa-solid fa-user-graduate"></i>
                        </div>
                        <h3 class="catalog-card-title">Top-up BBA</h3>
                        <div class="catalog-card-school" style="margin-bottom: 12px;">Swiss UMEF (Thụy Sĩ)</div>
                        
                        <div class="catalog-card-badges">
                            <span class="catalog-card-badge"><i class="fa-solid fa-hourglass-half"></i> 12 tháng</span>
                            <span class="catalog-card-badge"><i class="fa-solid fa-graduation-cap"></i> 60 ECTS</span>
                        </div>

                        <p class="catalog-card-desc">
                            Chương trình liên thông cử nhân QTKD Thụy Sĩ nhanh chóng trong 12 tháng dành cho học viên đã tốt nghiệp Cao đẳng, Trung cấp hoặc hoàn thành năm 3 Đại học.
                        </p>

                        <ul class="catalog-card-highlights">
                            <li class="catalog-card-highlight-item">
                                <i class="fa-solid fa-book-open"></i>
                                <span><strong>Cấu trúc:</strong> 10 môn học &amp; Luận văn tốt nghiệp</span>
                            </li>
                            <li class="catalog-card-highlight-item">
                                <i class="fa-solid fa-bullseye"></i>
                                <span><strong>Mục tiêu:</strong> Liên thông Cử nhân QTKD quốc tế</span>
                            </li>
                        </ul>
                        <a href="<?php echo esc_url(home_url('/bba')); ?>" class="catalog-card-btn">Xem chi tiết chương trình <i class="fa-solid fa-arrow-right-long" style="margin-left: 6px; font-size: 0.85rem;"></i></a>
                    </article>

                    <!-- Card 6: Full BBA -->
                    <article class="catalog-card">
                        <div class="catalog-card-icon">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <h3 class="catalog-card-title">Full BBA</h3>
                        <div class="catalog-card-school" style="margin-bottom: 12px;">Swiss UMEF (Thụy Sĩ)</div>
                        
                        <div class="catalog-card-badges">
                            <span class="catalog-card-badge"><i class="fa-solid fa-hourglass-half"></i> 3 năm (36 tháng)</span>
                            <span class="catalog-card-badge"><i class="fa-solid fa-graduation-cap"></i> 180 ECTS</span>
                        </div>

                        <p class="catalog-card-desc">
                            Chương trình Cử nhân Quản trị Kinh doanh chính quy 3 năm chuẩn Châu Âu, mang lại nền tảng kiến thức quản trị kinh doanh hiện đại và năng lực hội nhập quốc tế vượt trội.
                        </p>

                        <ul class="catalog-card-highlights">
                            <li class="catalog-card-highlight-item">
                                <i class="fa-solid fa-book-open"></i>
                                <span><strong>Cấu trúc:</strong> 34 môn học &amp; Luận văn tốt nghiệp</span>
                            </li>
                            <li class="catalog-card-highlight-item">
                                <i class="fa-solid fa-bullseye"></i>
                                <span><strong>Mục tiêu:</strong> Kiến tạo sự nghiệp toàn cầu</span>
                            </li>
                        </ul>
                        <a href="<?php echo esc_url(home_url('/fullbba')); ?>" class="catalog-card-btn">Xem chi tiết chương trình <i class="fa-solid fa-arrow-right-long" style="margin-left: 6px; font-size: 0.85rem;"></i></a>
                    </article>

                </div>
            </div>
        </section>

        <!-- PARTNER UNIVERSITIES -->
        <section class="partners-section section-dark">
            <div class="container text-center">
                <span class="section-label">Đại học đối tác</span>
                <h2 class="section-title">Trường Đại học <span class="gradient-text">đạt chuẩn kiểm định quốc tế</span></h2>
                <p class="section-desc">
                    IDEAS hợp tác tuyển sinh và hỗ trợ học thuật chính thức tại Việt Nam cho trường Đại học Swiss UMEF đạt chứng nhận chất lượng giáo dục cao nhất tại quốc gia chủ quản và quốc tế.
                </p>

                <div class="partners-grid text-left">
                    
                    <!-- Partner 1: Swiss UMEF -->
                    <div class="partner-card split-layout">
                        <div class="partner-card-left">
                            <div class="partner-logo-box">
                                <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/swissumef_logo.png" alt="Swiss UMEF University" loading="lazy" />
                            </div>
                            <h3 class="partner-title">Swiss UMEF University</h3>
                            <div class="partner-loc"><i class="fa-solid fa-location-dot"></i> <span>Geneva, Thụy Sĩ</span></div>
                        </div>
                        <div class="partner-card-right">
                            <div class="partner-features">
                                <div class="partner-feature-item">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span>Được kiểm định ở cấp độ cao nhất bởi Hội đồng Kiểm định Thụy Sĩ (SAC) - Swiss Accreditation Council</span>
                                </div>
                                <div class="partner-feature-item">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span>Đạt chuẩn kiểm định quốc tế danh giá IACBE (Mỹ) &amp; EduQua (Thụy Sĩ)</span>
                                </div>
                                <div class="partner-feature-item">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span>Được xếp hạng 5 sao QS Stars danh giá toàn cầu về đào tạo trực tuyến</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- PROS & CONS SECTION -->
        <section class="proscons-section">
            <div class="container text-center">
                <span class="section-label">Đánh giá khách quan</span>
                <h2 class="section-title">Ưu &amp; Nhược điểm khi <span class="gradient-text">học MBA Online Quốc tế</span></h2>
                <p class="section-desc">
                    Giúp học viên có góc nhìn chân thực, khách quan nhất trước khi quyết định đầu tư thời gian và ngân sách cho con đường học tập từ xa.
                </p>

                <div class="proscons-grid text-left">
                    
                    <!-- Pros Column -->
                    <div class="proscons-col pros-col">
                        <h3 class="proscons-col-title pros-title">
                            <i class="fa-solid fa-circle-plus"></i> Ưu Điểm Nổi Bật
                        </h3>
                        <ul class="proscons-list">
                            <li class="proscons-item pros-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <div>
                                    <h5>Tự do sắp xếp thời gian</h5>
                                    <p>Không bị gò bó bởi thời gian và khoảng cách địa lý. Học viên có thể vừa duy trì công việc toàn thời gian tại công sở vừa học vào buổi tối.</p>
                                </div>
                            </li>
                            <li class="proscons-item pros-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <div>
                                    <h5>Tối ưu hóa học phí (tiết kiệm đến 90%)</h5>
                                    <p>Học viên nhận bằng cấp quốc tế "chính hãng" từ Thụy Sĩ nhưng với mức chi phí học tập tại Việt Nam, tiết kiệm tối đa so với du học trực tiếp.</p>
                                </div>
                            </li>
                            <li class="proscons-item pros-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <div>
                                    <h5>Nội dung đào tạo thực tiễn</h5>
                                    <p>Chương trình được thiết kế theo tiêu chuẩn giáo dục Châu Âu, giảng dạy thông qua các case study thực tế và bài tập giải quyết vấn đề doanh nghiệp.</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Cons Column -->
                    <div class="proscons-col cons-col">
                        <h3 class="proscons-col-title cons-title">
                            <i class="fa-solid fa-circle-minus"></i> Hạn Chế Cần Lưu Ý
                        </h3>
                        <ul class="proscons-list">
                            <li class="proscons-item cons-item">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div>
                                    <h5>Đòi hỏi sự tự giác và kỷ luật rất cao</h5>
                                    <p>Học từ xa không có giảng viên đôn đốc trực tiếp trên lớp. Học viên cần thiết lập kế hoạch tự học nghiêm túc để hoàn thành các bài luận đúng hạn.</p>
                                </div>
                            </li>
                            <li class="proscons-item cons-item">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div>
                                    <h5>Hạn chế về tương tác vật lý trực tiếp</h5>
                                    <p>Thiếu đi không khí thảo luận trực tiếp tại giảng đường. IDEAS khắc phục điều này bằng cách tổ chức các buổi Workshop bổ trợ trực tuyến và Offline networking.</p>
                                </div>
                            </li>
                            <li class="proscons-item cons-item">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <div>
                                    <h5>Rủi ro chọn nhầm trường thiếu uy tín</h5>
                                    <p>Thị trường có nhiều trường không đạt kiểm định chính thức. Ứng viên cần kiểm tra kỹ thông tin kiểm định liên bang hoặc tổ chức kiểm định quốc tế uy tín trước khi đăng ký.</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>

        <!-- CORE COMPETENCIES -->
        <section class="comp-section section-dark">
            <div class="container text-center">
                <span class="section-label">Đầu ra năng lực</span>
                <h2 class="section-title">4 Năng Lực Quản Trị Cốt Lõi <span class="gradient-text">Sau Khi Tốt Nghiệp</span></h2>
                <p class="section-desc">
                    Chương trình MBA không chỉ cung cấp tấm bằng danh giá, mà trực tiếp tái cấu trúc hệ thống tư duy và kỹ năng để giúp bạn chuyển mình thành nhà quản trị thực thụ.
                </p>

                <div class="comp-grid text-left">
                    <div class="comp-card">
                        <span class="comp-num">01</span>
                        <div class="comp-card-icon"><i class="fa-solid fa-globe"></i></div>
                        <h4 class="comp-card-title">Tư duy quản trị tổng thể</h4>
                        <p class="comp-card-desc">Hình thành bức tranh toàn cảnh về vận hành doanh nghiệp. Kết nối và tối ưu hóa sự phối hợp giữa các phòng ban: Tài chính, Nhân sự, Vận hành và Kinh doanh.</p>
                    </div>

                    <div class="comp-card">
                        <span class="comp-num">02</span>
                        <div class="comp-card-icon"><i class="fa-solid fa-chart-pie"></i></div>
                        <h4 class="comp-card-title">Ra quyết định bằng dữ liệu</h4>
                        <p class="comp-card-desc">Nâng cao khả năng đọc hiểu báo cáo tài chính, phân tích chỉ số kinh doanh và kiểm soát ngân sách. Đưa ra các quyết định chiến lược dựa trên các con số thực tiễn.</p>
                    </div>

                    <div class="comp-card">
                        <span class="comp-num">03</span>
                        <div class="comp-card-icon"><i class="fa-solid fa-users-gear"></i></div>
                        <h4 class="comp-card-title">Lãnh đạo và quản trị con người</h4>
                        <p class="comp-card-desc">Trang bị năng lực quản lý đội nhóm đa chức năng, đàm phán thương mại và dẫn dắt tổ chức qua các giai đoạn chuyển đổi cơ cấu phức tạp.</p>
                    </div>

                    <div class="comp-card">
                        <span class="comp-num">04</span>
                        <div class="comp-card-icon"><i class="fa-solid fa-bolt"></i></div>
                        <h4 class="comp-card-title">Tư duy đổi mới sáng tạo</h4>
                        <p class="comp-card-desc">Lồng ghép tư duy công nghệ số và trí tuệ nhân tạo (AI) vào quản trị kinh doanh hiện đại để tạo ra lợi thế cạnh tranh vượt trội cho doanh nghiệp.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ SECTION -->
        <section class="faq-section">
            <div class="container">
                <div class="text-center">
                    <span class="section-label">Giải đáp thắc mắc</span>
                    <h2 class="section-title">Câu hỏi thường gặp về <span class="gradient-text">MBA Online</span></h2>
                    <p class="section-desc">Giải đáp các câu hỏi phổ biến nhất của học viên Việt Nam về tính pháp lý, ngôn ngữ và thủ tục nhập học.</p>
                </div>

                <div class="faq-accordion">
                    <div class="faq-item">
                        <div class="faq-header">
                            <span>1. Bằng MBA trực tuyến có giá trị tương đương bằng học trực tiếp tại trường không?</span>
                            <i class="fa-solid fa-chevron-down faq-arrow"></i>
                        </div>
                        <div class="faq-body">
                            <div class="faq-content">
                                Có. Bằng cấp được cấp bởi trường Đại học Thụy Sĩ hoàn toàn giống nhau, trên văn bằng tốt nghiệp không ghi hình thức học trực tuyến (Online) và có giá trị pháp lý tương đương văn bằng học trực tiếp tại cơ sở chính ở Châu Âu.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-header">
                            <span>2. Yêu cầu đầu vào của chương trình MBA là gì?</span>
                            <i class="fa-solid fa-chevron-down faq-arrow"></i>
                        </div>
                        <div class="faq-body">
                            <div class="faq-content">
                                Các chương trình MBA quốc tế yêu cầu ứng viên tối thiểu tốt nghiệp Đại học (Cử nhân) ở mọi chuyên ngành, có tối thiểu 2 - 3 năm kinh nghiệm làm việc thực tế và đạt trình độ tiếng Anh IELTS 6.0 hoặc tương đương. Trường hợp chưa đủ chứng chỉ tiếng Anh, học viên sẽ được hỗ trợ các lớp bổ túc và kiểm tra năng lực đầu vào.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-header">
                            <span>3. Chi phí học MBA tại Việt Nam dao động khoảng bao nhiêu?</span>
                            <i class="fa-solid fa-chevron-down faq-arrow"></i>
                        </div>
                        <div class="faq-body">
                            <div class="faq-content">
                                Tại Việt Nam, chi phí học MBA rất đa dạng: Các chương trình trong nước dao động từ 50 - 70 triệu đồng; trong khi đó các chương trình MBA quốc tế online chất lượng cao dao động từ 120 - 250 triệu đồng cho toàn khóa học. Đây là mức chi phí tối ưu, tiết kiệm đến 90% chi phí ăn ở sinh hoạt so với du học trực tiếp tại Châu Âu.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-header">
                            <span>4. Viện IDEAS đóng vai trò gì trong quá trình học của tôi?</span>
                            <i class="fa-solid fa-chevron-down faq-arrow"></i>
                        </div>
                        <div class="faq-body">
                            <div class="faq-content">
                                Viện IDEAS là đơn vị hỗ trợ học thuật chính thức và duy nhất tại Việt Nam. Chúng tôi đồng hành cùng học viên từ khâu tư vấn định hướng, nộp hồ sơ nhập học, hỗ trợ dịch thuật tài liệu, tổ chức các lớp chuyên đề bổ trợ kiến thức bằng tiếng Việt, hỗ trợ kỹ thuật trên hệ thống LMS, cho đến khi học viên hoàn thành luận văn tốt nghiệp và nhận bằng.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- WHY CHOOSE IDEAS EDUCATION -->
        <section class="ideas-section section-dark">
            <div class="container">
                <div class="ideas-layout">
                    <div class="ideas-img-box reveal-up">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/11/DSCF6777.jpg" alt="Lễ tốt nghiệp học viên MBA IDEAS" loading="lazy" />
                    </div>
                    <div class="reveal-up">
                        <span class="section-label">Đơn vị hỗ trợ học vụ uy tín</span>
                        <h2 class="section-title">Tại sao chọn <span class="gradient-text">IDEAS Education</span>?</h2>
                        <p style="line-height: 1.6;">
                            Với hơn 15 năm hình thành và phát triển, Viện Nghiên cứu Phát triển và Trao đổi Khoa học Áp dụng (IDEAS) tự hào là đối tác hỗ trợ giáo dục và quản lý đào tạo MBA Quốc tế hàng đầu tại Việt Nam.
                        </p>
                        <ul class="ideas-points">
                            <li class="ideas-point-item">
                                <i class="fa-solid fa-square-poll-vertical"></i>
                                <span><strong>Hỗ trợ học vụ song ngữ 24/7:</strong> Giảm thiểu rào cản ngôn ngữ và phương pháp học Châu Âu thông qua các lớp chuyên đề bổ trợ kiến thức bằng tiếng Việt.</span>
                            </li>
                            <li class="ideas-point-item">
                                <i class="fa-solid fa-credit-card"></i>
                                <span><strong>Trả góp học phí Sacombank:</strong> Hỗ trợ tài chính tối đa với chính sách chia nhỏ học phí đóng theo đợt hoặc trả góp lãi suất 0% qua ngân hàng Sacombank.</span>
                            </li>
                            <li class="ideas-point-item">
                                <i class="fa-solid fa-users"></i>
                                <span><strong>Mạng lưới Network 2500+:</strong> Cơ hội tham gia các hội thảo, sự kiện kết nối cùng cộng đồng hơn 2500 học viên đã tốt nghiệp là quản lý, giám đốc doanh nghiệp.</span>
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
                <h2>Bắt đầu hành trình nâng tầm sự nghiệp ngay hôm nay</h2>
                <p>Nhận ngay tài liệu chi tiết về điều kiện tuyển sinh, học bổng và lịch khai giảng mới nhất của các chương trình MBA quốc tế.</p>
                <button type="button" class="btn-ideas-primary" onclick="if(typeof window.openRegModal === 'function') window.openRegModal('cta-banner-hub')">
                    Đăng ký tư vấn lộ trình MBA
                    <i class="fa-solid fa-circle-arrow-right"></i>
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
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/script.min.js?v=<?php echo $js_version; ?>" defer></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/booking-modal.min.js?v=<?php echo $bk_js_version; ?>" defer></script>

    <!-- Shared Footer -->
    <?php get_footer(); ?>
