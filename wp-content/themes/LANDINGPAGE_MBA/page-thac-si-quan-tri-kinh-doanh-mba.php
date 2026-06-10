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
        <title>Học Thạc sĩ Quản trị Kinh doanh - MBA Online tại Việt Nam</title>
        <meta name="description" content="Chương trình MBA quốc tế hay học thạc sĩ Quản trị kinh doanh, học MBA online quốc tế tại Việt Nam giúp người học nâng cao kiến thức quản trị."/>
        <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
        <link rel="canonical" href="https://ideas.edu.vn/thac-si-quan-tri-kinh-doanh-mba" />
        <meta property="og:locale" content="vi_VN" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Học Thạc sĩ Quản trị Kinh doanh - MBA Online tại Việt Nam" />
        <meta property="og:description" content="Chương trình MBA quốc tế hay học thạc sĩ Quản trị kinh doanh, học MBA online quốc tế tại Việt Nam giúp người học nâng cao kiến thức quản trị." />
        <meta property="og:url" content="https://ideas.edu.vn/thac-si-quan-tri-kinh-doanh-mba" />
        <meta property="og:site_name" content="IDEAS" />
        <meta property="og:updated_time" content="2026-03-30T09:51:56+07:00" />
        <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp" />
        <meta property="og:image:secure_url" content="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp" />
        <meta property="og:image:width" content="1920" />
        <meta property="og:image:height" content="1080" />
        <meta property="og:image:alt" content="chương trình mba" />
        <meta property="og:image:type" content="image/png" />
    <?php endif; ?>

    <style>
        /* ══════════════════════════════════════
           MBA SEO PAGE – PREMIUM WHITE DIRECTORY DESIGN
           ══════════════════════════════════════ */
        html,
        body {
            overflow-x: clip !important;
            background-color: #ffffff !important;
            color: #334155 !important; /* slate-700 */
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            z-index: -1;
            background-image:
                radial-gradient(circle at 10% 15%, rgba(171, 14, 0, 0.03) 0%, transparent 45%),
                radial-gradient(circle at 90% 80%, rgba(171, 14, 0, 0.02) 0%, transparent 40%),
                radial-gradient(rgba(15, 23, 42, 0.015) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 28px 28px;
            pointer-events: none;
            will-change: transform;
        }

        /* ─── GENERAL STYLES ─── */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(171, 14, 0, 0.06);
            color: #ab0e00;
            padding: 6px 16px;
            border-radius: 100px;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            margin-bottom: 20px;
            border: 1px solid rgba(171, 14, 0, 0.12);
        }
        .section-title {
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            font-weight: 800;
            line-height: 1.25;
            color: #0f172a; /* slate-900 */
            margin-bottom: 20px;
        }
        .section-desc {
            font-size: 1.05rem;
            color: #475569; /* slate-600 */
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto 50px;
        }
        .gradient-text {
            background: linear-gradient(135deg, #ab0e00 0%, #ff3030 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* ─── HERO ─── */
        .mba-hero {
            padding: 160px 0 80px;
            position: relative;
            text-align: center;
            overflow: hidden;
            background: #ffffff;
        }
        .mba-hero::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; width: 100%; height: 150px;
            background: linear-gradient(180deg, transparent, #ffffff);
            pointer-events: none;
        }
        .mba-hero-content {
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }
        .mba-hero-title {
            font-size: clamp(2.2rem, 5vw, 3rem);
            font-weight: 800;
            color: #0f172a; /* slate-900 */
            line-height: 1.2;
            margin-bottom: 24px;
        }
        .mba-hero-sub {
            font-size: 1.15rem;
            color: #334155; /* slate-700 */
            line-height: 1.6;
            margin-bottom: 35px;
        }
        .mba-hero-badges {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 40px;
        }
        .mba-hero-badge-item {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 10px 20px;
            border-radius: 100px;
            font-size: 0.9rem;
            font-weight: 600;
            color: #334155;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        .mba-hero-badge-item:hover {
            border-color: rgba(171, 14, 0, 0.3);
            background: rgba(171, 14, 0, 0.03);
            transform: translateY(-2px);
        }
        .mba-hero-badge-item i {
            color: #ab0e00;
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
            background: #ab0e00;
            color: #fff;
            padding: 14px 28px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        .btn-ideas-primary:hover {
            background: #cf1500;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(171, 14, 0, 0.25);
        }
        .btn-ideas-outline {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: transparent;
            color: #0f172a; /* slate-900 */
            padding: 14px 28px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1.5px solid #cbd5e1; /* slate-300 */
            cursor: pointer;
        }
        .btn-ideas-outline:hover {
            border-color: #0f172a;
            background: rgba(15, 23, 42, 0.03);
            transform: translateY(-2px);
        }
        
        /* ─── PROGRAM CATALOG ─── */
        .catalog-section {
            padding: 80px 0;
            position: relative;
        }
        .catalog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        .catalog-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 35px;
            display: flex;
            flex-direction: column;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            z-index: 1;
            overflow: hidden;
            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.04), 0 1px 3px rgba(15, 23, 42, 0.02);
        }
        .catalog-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top right, rgba(171, 14, 0, 0.04) 0%, transparent 60%);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        .catalog-card:hover {
            transform: translateY(-8px);
            border-color: rgba(171, 14, 0, 0.2);
            background: #ffffff;
            box-shadow: 0 20px 40px -10px rgba(171, 14, 0, 0.1);
        }
        .catalog-card:hover::before {
            opacity: 1;
        }
        .catalog-card-icon {
            font-size: 2.2rem;
            color: #ab0e00;
            margin-bottom: 20px;
        }
        .catalog-card-title {
            font-size: 1.45rem;
            font-weight: 800;
            color: #0f172a; /* slate-900 */
            margin-bottom: 8px;
            line-height: 1.3;
        }
        .catalog-card-school {
            font-size: 0.85rem;
            font-weight: 700;
            color: #ab0e00;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            margin-bottom: 20px;
        }
        .catalog-card-desc {
            font-size: 0.95rem;
            color: #475569; /* slate-600 */
            line-height: 1.6;
            margin-bottom: 24px;
            flex-grow: 1;
        }
        .catalog-card-meta {
            border-top: 1px solid #e2e8f0;
            border-bottom: 1px solid #e2e8f0;
            padding: 20px 0;
            margin-bottom: 24px;
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
        }
        .catalog-meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.88rem;
            color: #334155; /* slate-700 */
        }
        .catalog-meta-item i {
            color: #ab0e00;
            font-size: 0.9rem;
            width: 16px;
        }
        .catalog-card-btn {
            width: 100%;
            padding: 12px 24px;
            background: #f1f5f9; /* slate-100 */
            border: 1px solid #e2e8f0;
            color: #0f172a;
            font-weight: 700;
            border-radius: 12px;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            box-sizing: border-box;
        }
        .catalog-card:hover .catalog-card-btn {
            background: #ab0e00;
            border-color: #ab0e00;
            color: #ffffff;
        }
        
        /* ─── PARTNERS ─── */
        .partners-section {
            padding: 80px 0;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            border-bottom: 1px solid #e2e8f0;
        }
        .partners-grid {
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }
        .partner-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02), 0 2px 4px -1px rgba(0, 0, 0, 0.01);
        }
        .partner-card:hover {
            border-color: rgba(171, 14, 0, 0.2);
            background: #ffffff;
            transform: translateY(-4px);
            box-shadow: 0 15px 30px -10px rgba(171, 14, 0, 0.12);
        }
        .partner-logo-box {
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
        }
        .partner-logo-box img {
            max-height: 100%;
            max-width: 80%;
            object-fit: contain;
        }
        .partner-title {
            font-size: 1.3rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 8px;
        }
        .partner-loc {
            font-size: 0.88rem;
            color: #475569;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
        .partner-loc i {
            color: #ab0e00;
        }
        .partner-features {
            text-align: left;
            border-top: 1px solid #e2e8f0;
            padding-top: 20px;
            flex-grow: 1;
        }
        .partner-feature-item {
            font-size: 0.88rem;
            color: #334155;
            margin-bottom: 10px;
            display: flex;
            align-items: flex-start;
            gap: 8px;
            line-height: 1.4;
        }
        .partner-feature-item i {
            color: #ab0e00;
            margin-top: 3px;
            width: 14px;
        }

        /* ─── PROS & CONS ─── */
        .proscons-section {
            padding: 80px 0;
            background: #ffffff;
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
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.01);
        }
        .proscons-col-title {
            font-size: 1.4rem;
            font-weight: 800;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .pros-title { color: #059669; }
        .cons-title { color: #dc2626; }
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
        .pros-item i { color: #059669; }
        .cons-item i { color: #dc2626; }
        .proscons-item h5 {
            font-size: 1rem;
            font-weight: 700;
            color: #0f172a;
            margin: 0 0 6px 0;
        }
        .proscons-item p {
            font-size: 0.92rem;
            color: #475569;
            margin: 0;
        }

        /* ─── CORE COMPETENCIES ─── */
        .comp-section {
            padding: 80px 0;
            background: radial-gradient(circle at center, rgba(171, 14, 0, 0.02) 0%, transparent 70%);
        }
        .comp-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            margin-top: 40px;
        }
        .comp-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 30px;
            position: relative;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.01);
        }
        .comp-card:hover {
            background: #ffffff;
            border-color: rgba(171, 14, 0, 0.2);
            transform: translateY(-4px);
            box-shadow: 0 15px 30px -10px rgba(171, 14, 0, 0.08);
        }
        .comp-num {
            font-size: 3rem;
            font-weight: 900;
            color: rgba(15, 23, 42, 0.03);
            position: absolute;
            top: 15px; right: 20px;
            line-height: 1;
            transition: color 0.3s ease;
        }
        .comp-card:hover .comp-num {
            color: rgba(171, 14, 0, 0.06);
        }
        .comp-card-icon {
            font-size: 1.8rem;
            color: #ab0e00;
            margin-bottom: 20px;
        }
        .comp-card-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 12px;
        }
        .comp-card-desc {
            font-size: 0.9rem;
            color: #475569;
            line-height: 1.5;
        }

        /* ─── FAQ / ACCORDION ─── */
        .faq-section {
            padding: 80px 0;
            background: #ffffff;
        }
        .faq-accordion {
            max-width: 800px;
            margin: 40px auto 0;
        }
        .faq-item {
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            border-radius: 12px;
            margin-bottom: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .faq-item:hover {
            border-color: rgba(171, 14, 0, 0.2);
            background: #ffffff;
            box-shadow: 0 4px 12px -2px rgba(15, 23, 42, 0.04);
        }
        .faq-header {
            padding: 20px 24px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 700;
            color: #0f172a;
            font-size: 1.05rem;
        }
        .faq-arrow {
            font-size: 0.8rem;
            color: #64748b;
            transition: transform 0.3s ease;
        }
        .faq-item.active .faq-arrow {
            transform: rotate(180deg);
            color: #ab0e00;
        }
        .faq-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            font-size: 0.95rem;
            color: #475569;
            line-height: 1.6;
        }
        .faq-item.active .faq-body {
            max-height: 500px;
        }
        .faq-content {
            padding: 0 24px 24px;
            border-top: 1px solid #e2e8f0;
            padding-top: 16px;
        }

        /* ─── IDEAS SECTION ─── */
        .ideas-section {
            padding: 80px 0;
            position: relative;
            background: linear-gradient(180deg, transparent, rgba(171, 14, 0, 0.02) 50%, transparent 100%);
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
            box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.1);
            border: 1px solid #e2e8f0;
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
            color: #334155;
            line-height: 1.5;
        }
        .ideas-point-item i {
            color: #ab0e00;
            margin-top: 4px;
            width: 16px;
        }

        /* ─── CTA BANNER ─── */
        .cta-banner {
            background: linear-gradient(135deg, #fff5f5 0%, #ffebeb 100%);
            border: 1px solid rgba(171, 14, 0, 0.12);
            border-radius: 30px;
            padding: 60px 40px;
            text-align: center;
            margin: 80px auto;
            position: relative;
            overflow: hidden;
            max-width: 1000px;
            box-shadow: 0 10px 30px -10px rgba(171, 14, 0, 0.08);
        }
        .cta-banner-glow {
            position: absolute;
            width: 300px; height: 300px;
            background: #ab0e00;
            filter: blur(150px);
            opacity: 0.05;
            top: -100px; left: -100px;
            pointer-events: none;
        }
        .cta-banner h2 {
            font-size: 2rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 15px;
            line-height: 1.3;
        }
        .cta-banner p {
            font-size: 1.05rem;
            color: #475569;
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .reveal-up {
            opacity: 1;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>

    <main id="content">

        <!-- HERO SECTION -->
        <section class="mba-hero" id="trang-chu">
            <div class="container">
                <div class="mba-hero-content reveal-up">
                    <span class="section-label">
                        <i class="fa-solid fa-graduation-cap"></i> Thạc sĩ &amp; MBA Quốc tế
                    </span>
                    <h1 class="mba-hero-title">
                        Học Thạc sĩ Quản trị Kinh doanh - <span class="gradient-text">MBA Online</span> tại Việt Nam
                    </h1>
                    <p class="mba-hero-sub">
                        Cổng kết nối các chương trình đào tạo Thạc sĩ, MBA trực tuyến chuẩn quốc tế hợp tác cùng các trường Đại học danh tiếng từ Thụy Sĩ và Pháp. Giải pháp học tập tinh hoa, linh hoạt tối đa dành riêng cho người đi làm bận rộn.
                    </p>

                    <div class="mba-hero-badges">
                        <div class="mba-hero-badge-item">
                            <i class="fa-solid fa-laptop"></i> <span>Học Online 100%</span>
                        </div>
                        <div class="mba-hero-badge-item">
                            <i class="fa-solid fa-clock"></i> <span>Linh hoạt 14-18 Tháng</span>
                        </div>
                        <div class="mba-hero-badge-item">
                            <i class="fa-solid fa-medal"></i> <span>Bằng cấp Thụy Sĩ &amp; Pháp</span>
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
                <h2 class="section-title">Các Chương trình <span class="gradient-text">Thạc sĩ &amp; MBA nổi bật</span></h2>
                <p class="section-desc">
                    Tuyển chọn các khóa học Thạc sĩ Quản trị Kinh doanh trực tuyến và AI ứng dụng, đáp ứng mọi định hướng phát triển từ chuyên môn, lãnh đạo điều hành đến dẫn đầu xu hướng công nghệ số.
                </p>

                <div class="catalog-grid text-left">
                    
                    <!-- Card 1: Online MBA -->
                    <article class="catalog-card">
                        <div class="catalog-card-icon">
                            <i class="fa-solid fa-briefcase"></i>
                        </div>
                        <h3 class="catalog-card-title">Online MBA</h3>
                        <div class="catalog-card-school">Swiss UMEF (Thụy Sĩ)</div>
                        <p class="catalog-card-desc">
                            Chương trình Thạc sĩ Quản trị Kinh doanh trực tuyến tổng hợp chuẩn Bologna Châu Âu, tập trung xây dựng tư duy quản trị toàn diện từ chiến lược đến thực thi.
                        </p>
                        <div class="catalog-card-meta">
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-hourglass-half"></i> <span>Thời gian: 18 tháng</span>
                            </div>
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-book-open"></i> <span>Cấu trúc: 12 môn học + Luận văn</span>
                            </div>
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-graduation-cap"></i> <span>Tín chỉ: 90 ECTS</span>
                            </div>
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-bullseye"></i> <span>Mục tiêu: Nâng tầm quản lý tổng thể</span>
                            </div>
                        </div>
                        <a href="<?php echo esc_url(home_url('/mba')); ?>" class="catalog-card-btn">Xem chi tiết chương trình</a>
                    </article>

                    <!-- Card 2: Executive MBA -->
                    <article class="catalog-card">
                        <div class="catalog-card-icon">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <h3 class="catalog-card-title">Executive MBA (EMBA)</h3>
                        <div class="catalog-card-school">Swiss UMEF (Thụy Sĩ)</div>
                        <p class="catalog-card-desc">
                            Thiết kế riêng cho các nhà điều hành, quản lý cấp cao và chủ doanh nghiệp bận rộn. Tập trung vào năng lực lãnh đạo chiến lược toàn cầu và giải quyết xung đột vận hành.
                        </p>
                        <div class="catalog-card-meta">
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-hourglass-half"></i> <span>Thời gian: 14 - 16 tháng</span>
                            </div>
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-book-open"></i> <span>Cấu trúc: 10 môn học (Không luận văn)</span>
                            </div>
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-graduation-cap"></i> <span>Tín chỉ: 60 ECTS</span>
                            </div>
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-bullseye"></i> <span>Mục tiêu: Đột phá năng lực lãnh đạo</span>
                            </div>
                        </div>
                        <a href="<?php echo esc_url(home_url('/emba')); ?>" class="catalog-card-btn">Xem chi tiết chương trình</a>
                    </article>

                    <!-- Card 3: MSc AI -->
                    <article class="catalog-card">
                        <div class="catalog-card-icon">
                            <i class="fa-solid fa-brain"></i>
                        </div>
                        <h3 class="catalog-card-title">Master AI (MSc AI)</h3>
                        <div class="catalog-card-school">Swiss UMEF (Thụy Sĩ)</div>
                        <p class="catalog-card-desc">
                            Thạc sĩ Trí tuệ Nhân tạo Ứng dụng. Chương trình tiên phong kết hợp giữa kỹ thuật AI ứng dụng, Machine Learning và khả năng ra quyết định dựa trên Big Data trong doanh nghiệp.
                        </p>
                        <div class="catalog-card-meta">
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-hourglass-half"></i> <span>Thời gian: 15 - 18 tháng</span>
                            </div>
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-book-open"></i> <span>Cấu trúc: 12 môn + Capstone Project</span>
                            </div>
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-graduation-cap"></i> <span>Tín chỉ: 90 ECTS</span>
                            </div>
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-bullseye"></i> <span>Mục tiêu: Làm chủ công nghệ và dữ liệu</span>
                            </div>
                        </div>
                        <a href="<?php echo esc_url(home_url('/mscai')); ?>" class="catalog-card-btn">Xem chi tiết chương trình</a>
                    </article>

                    <!-- Card 4: MBA in AI -->
                    <article class="catalog-card">
                        <div class="catalog-card-icon">
                            <i class="fa-solid fa-robot"></i>
                        </div>
                        <h3 class="catalog-card-title">MBA in AI</h3>
                        <div class="catalog-card-school">Swiss UMEF (Thụy Sĩ)</div>
                        <p class="catalog-card-desc">
                            Chương trình Thạc sĩ Quản trị kinh doanh Ứng dụng AI. Trang bị tư duy lãnh đạo doanh nghiệp số kết hợp năng lực ứng dụng công cụ AI thế hệ mới để tự động hóa và tối ưu vận hành.
                        </p>
                        <div class="catalog-card-meta">
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-hourglass-half"></i> <span>Thời gian: 16 - 18 tháng</span>
                            </div>
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-book-open"></i> <span>Cấu trúc: Chương trình tích hợp AI &amp; QTKD</span>
                            </div>
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-graduation-cap"></i> <span>Tín chỉ: 90 ECTS</span>
                            </div>
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-bullseye"></i> <span>Mục tiêu: Lãnh đạo kỷ nguyên AI toàn cầu</span>
                            </div>
                        </div>
                        <a href="<?php echo esc_url(home_url('/mbainai')); ?>" class="catalog-card-btn">Xem chi tiết chương trình</a>
                    </article>

                    <!-- Card 5: Top-up BBA -->
                    <article class="catalog-card">
                        <div class="catalog-card-icon">
                            <i class="fa-solid fa-user-graduate"></i>
                        </div>
                        <h3 class="catalog-card-title">Top-up BBA</h3>
                        <div class="catalog-card-school">Swiss UMEF (Thụy Sĩ)</div>
                        <p class="catalog-card-desc">
                            Chương trình liên thông cử nhân QTKD Thụy Sĩ nhanh chóng trong 12 tháng dành cho học viên đã tốt nghiệp Cao đẳng, Trung cấp hoặc hoàn thành năm 3 Đại học.
                        </p>
                        <div class="catalog-card-meta">
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-hourglass-half"></i> <span>Thời gian: 12 tháng</span>
                            </div>
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-book-open"></i> <span>Cấu trúc: 10 môn học &amp; Luận văn tốt nghiệp</span>
                            </div>
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-graduation-cap"></i> <span>Tín chỉ: 60 ECTS</span>
                            </div>
                            <div class="catalog-meta-item">
                                <i class="fa-solid fa-bullseye"></i> <span>Mục tiêu: Liên thông Cử nhân QTKD quốc tế</span>
                            </div>
                        </div>
                        <a href="<?php echo esc_url(home_url('/bba')); ?>" class="catalog-card-btn">Xem chi tiết chương trình</a>
                    </article>

                </div>
            </div>
        </section>

        <!-- PARTNER UNIVERSITIES -->
        <section class="partners-section">
            <div class="container text-center">
                <span class="section-label">Đại học đối tác</span>
                <h2 class="section-title">Trường Đại học <span class="gradient-text">đạt chuẩn kiểm định quốc tế</span></h2>
                <p class="section-desc">
                    IDEAS hợp tác tuyển sinh và hỗ trợ học thuật chính thức tại Việt Nam cho trường Đại học Swiss UMEF đạt chứng nhận chất lượng giáo dục cao nhất tại quốc gia chủ quản và quốc tế.
                </p>

                <div class="partners-grid text-left">
                    
                    <!-- Partner 1: Swiss UMEF -->
                    <div class="partner-card">
                        <div class="partner-logo-box">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/10/Logo-Swiss-UMEF.png" alt="Swiss UMEF University" loading="lazy" />
                        </div>
                        <h3 class="partner-title">Swiss UMEF University</h3>
                        <div class="partner-loc"><i class="fa-solid fa-location-dot"></i> <span>Geneva, Thụy Sĩ</span></div>
                        <div class="partner-features">
                            <div class="partner-feature-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <span>Được kiểm định ở cấp độ cao nhất bởi Hội đồng Kiểm định Thụy Sĩ (SAC)</span>
                            </div>
                            <div class="partner-feature-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <span>Kiểm định quốc tế IACBE (Mỹ) &amp; EduQua (Thụy Sĩ)</span>
                            </div>
                            <div class="partner-feature-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <span>Xếp hạng 5 sao QS Stars danh giá toàn cầu</span>
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
                    <div class="proscons-col">
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
                                    <p>Học viên nhận bằng MBA quốc tế "chính hãng" từ Thụy Sĩ/Pháp nhưng với mức chi phí học tập tại Việt Nam, tiết kiệm tối đa so với du học trực tiếp.</p>
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
                    <div class="proscons-col">
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
        <section class="comp-section">
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
                        <p class="comp-desc">Hình thành bức tranh toàn cảnh về vận hành doanh nghiệp. Kết nối và tối ưu hóa sự phối hợp giữa các phòng ban: Tài chính, Nhân sự, Vận hành và Kinh doanh.</p>
                    </div>

                    <div class="comp-card">
                        <span class="comp-num">02</span>
                        <div class="comp-card-icon"><i class="fa-solid fa-chart-pie"></i></div>
                        <h4 class="comp-card-title">Ra quyết định bằng dữ liệu</h4>
                        <p class="comp-desc">Nâng cao khả năng đọc hiểu báo cáo tài chính, phân tích chỉ số kinh doanh và kiểm soát ngân sách. Đưa ra các quyết định chiến lược dựa trên các con số thực tiễn.</p>
                    </div>

                    <div class="comp-card">
                        <span class="comp-num">03</span>
                        <div class="comp-card-icon"><i class="fa-solid fa-users-gear"></i></div>
                        <h4 class="comp-card-title">Lãnh đạo và quản trị con người</h4>
                        <p class="comp-desc">Trang bị năng lực quản lý đội nhóm đa chức năng, đàm phán thương mại và dẫn dắt tổ chức qua các giai đoạn chuyển đổi cơ cấu phức tạp.</p>
                    </div>

                    <div class="comp-card">
                        <span class="comp-num">04</span>
                        <div class="comp-card-icon"><i class="fa-solid fa-bolt"></i></div>
                        <h4 class="comp-card-title">Tư duy đổi mới sáng tạo</h4>
                        <p class="comp-desc">Lồng ghép tư duy công nghệ số và trí tuệ nhân tạo (AI) vào quản trị kinh doanh hiện đại để tạo ra lợi thế cạnh tranh vượt trội cho doanh nghiệp.</p>
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
                                Có. Bằng cấp được cấp bởi các trường Đại học Thụy Sĩ/Pháp hoàn toàn giống nhau, trên văn bằng tốt nghiệp không ghi hình thức học trực tuyến (Online) và có giá trị pháp lý tương đương văn bằng học trực tiếp tại cơ sở chính ở Châu Âu.
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
        <section class="ideas-section">
            <div class="container">
                <div class="ideas-layout">
                    <div class="ideas-img-box reveal-up">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/11/DSCF6777.jpg" alt="Lễ tốt nghiệp học viên MBA IDEAS" loading="lazy" />
                    </div>
                    <div class="reveal-up">
                        <span class="section-label">Đơn vị hỗ trợ học vụ uy tín</span>
                        <h2 class="section-title">Tại sao chọn <span class="gradient-text">IDEAS Education</span>?</h2>
                        <p style="color: #475569; line-height: 1.6;">
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
    ?>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/script.min.js?v=<?php echo $js_version; ?>" defer></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/booking-modal.min.js?v=<?php echo $bk_js_version; ?>" defer></script>

    <!-- Shared Footer -->
    <?php get_footer(); ?>
