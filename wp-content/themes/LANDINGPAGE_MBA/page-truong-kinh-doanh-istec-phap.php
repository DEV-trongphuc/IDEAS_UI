<?php
/**
 * The template for displaying the ISTEC Paris partner page
 * Template Name: Premium ISTEC Paris Template
 */
global $wp;

// Override Yoast SEO and RankMath social preview images dynamically
add_filter('wpseo_opengraph_image', function($img) {
    return 'https://istec.fr/wp-content/uploads/2025/05/230912_05457_HD-scaled.jpg';
});
add_filter('rank_math/frontend/show_facebook_image', function($attachment_url) {
    return 'https://istec.fr/wp-content/uploads/2025/05/230912_05457_HD-scaled.jpg';
});
add_filter('rank_math/opengraph/facebook/image', function($img) {
    return 'https://istec.fr/wp-content/uploads/2025/05/230912_05457_HD-scaled.jpg';
});
add_filter('rank_math/opengraph/twitter/image', function($img) {
    return 'https://istec.fr/wp-content/uploads/2025/05/230912_05457_HD-scaled.jpg';
});


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
        href="https://istec.fr/wp-content/uploads/2025/05/230912_05457_HD-scaled.jpg" />

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title>
            <?php echo $is_en ? 'ISTEC Paris Business School France | Official Admissions Partner IDEAS' : 'Trường Kinh Doanh ISTEC Paris (Pháp) | Đối tác tuyển sinh chính thức IDEAS'; ?>
        </title>
        <meta name="description"
            content="<?php echo $is_en ? 'Explore ISTEC Paris Business School in France. Grande École member accredited by CGE, Grade de Master & Grade de Licence, recognized by the French Ministry of Higher Education.' : 'Khám phá Trường Kinh Doanh ISTEC Paris tại Pháp. Thành viên Grande École uy tín thuộc Hiệp hội CGE, kiểm định Grade de Master & Grade de Licence bởi Bộ Giáo dục Pháp.'; ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:title"
            content="<?php echo $is_en ? 'ISTEC Paris Business School France | Official Admissions Partner IDEAS' : 'Trường Kinh Doanh ISTEC Paris (Pháp) | Đối tác tuyển sinh chính thức IDEAS'; ?>" />
        <meta property="og:description"
            content="<?php echo $is_en ? 'Experience elite French Grande École business education with prestigious international degrees (DBA, MBA) accredited by CGE, CEFDG, Ministry of Higher Education.' : 'Trải nghiệm giáo dục kinh doanh Grande École tinh hoa nước Pháp với bằng cấp quốc tế danh giá (DBA, MBA) từ ISTEC Paris.'; ?>" />
        <meta property="og:image"
            content="https://istec.fr/wp-content/uploads/2025/05/230912_05457_HD-scaled.jpg" />
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
            --istec-green: #61A60E;
            --istec-green-dark: #467909;
            --istec-green-deep: #2f5404;
            --istec-green-light: #7ec420;
            --istec-green-soft: rgba(97, 166, 14, 0.08);
            --istec-green-glow: rgba(97, 166, 14, 0.28);
            --clr-primary: #61A60E;
            --clr-primary-d: #467909;
            --clr-primary-light: #7ec420;
            --umef-primary: #61A60E;
            --umef-primary-hover: #467909;
        }

        /* ══════════════════════════════════════
           ISTEC PARIS PAGE – PREMIUM MODERN DESIGN
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
                radial-gradient(circle at 5% 15%, rgba(97, 166, 14, 0.045) 0%, transparent 45%),
                radial-gradient(circle at 95% 75%, rgba(97, 166, 14, 0.035) 0%, transparent 40%),
                radial-gradient(rgba(15, 23, 42, 0.025) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 28px 28px;
            pointer-events: none;
            will-change: transform;
        }

        /* ── Modern Impressive Hero Section (Like mba.html with ISTEC Green) ── */
        .istec-hero {
            position: relative;
            min-height: 90vh;
            display: flex;
            align-items: center;
            background: linear-gradient(180deg, #ffffff 0%, #f7faf4 50%, #f0f7ea 100%);
            padding: 130px 0 80px;
            overflow: hidden;
            width: 100vw;
            margin-left: 50%;
            transform: translateX(-50%);
        }

        .istec-hero .hero-bg {
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 1;
        }

        .istec-hero .hero-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
        }

        .istec-hero .hero-orb-1 {
            width: 520px;
            height: 520px;
            background: radial-gradient(circle, rgba(97, 166, 14, 0.16) 0%, transparent 70%);
            top: -140px;
            right: -60px;
            animation: orb-drift 9s ease-in-out infinite alternate;
        }

        .istec-hero .hero-orb-2 {
            width: 420px;
            height: 420px;
            background: radial-gradient(circle, rgba(126, 196, 32, 0.14) 0%, transparent 70%);
            bottom: -60px;
            left: -80px;
            animation: orb-drift 11s ease-in-out infinite alternate-reverse;
        }

        .istec-hero .hero-orb-3 {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(97, 166, 14, 0.09) 0%, transparent 70%);
            top: 45%;
            left: 35%;
            animation: orb-drift 13s ease-in-out infinite alternate;
        }

        .istec-hero .hero-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(97, 166, 14, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(97, 166, 14, 0.05) 1px, transparent 1px);
            background-size: 48px 48px;
            mask-image: radial-gradient(ellipse 85% 65% at 50% 40%, black 0%, transparent 100%);
            -webkit-mask-image: radial-gradient(ellipse 85% 65% at 50% 40%, black 0%, transparent 100%);
        }

        @keyframes orb-drift {
            from { transform: translate(0, 0) scale(1); }
            to { transform: translate(24px, -24px) scale(1.06); }
        }

        .istec-hero .container {
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 24px;
            width: 100%;
        }

        .istec-hero .hero-layout {
            display: grid;
            grid-template-columns: 54% 46%;
            gap: 48px;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .istec-hero .hero-content {
            position: relative;
            z-index: 2;
            min-width: 0;
        }

        /* Badge */
        .istec-hero .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            border-radius: 99px;
            background: rgba(97, 166, 14, 0.09);
            border: 1px solid rgba(97, 166, 14, 0.28);
            color: #3e6d08;
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            margin-bottom: 18px;
            backdrop-filter: blur(8px);
        }

        .istec-hero .badge-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #61A60E;
            box-shadow: 0 0 10px rgba(97, 166, 14, 0.8);
            animation: pulse-dot 2s infinite ease-in-out;
        }

        @keyframes pulse-dot {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.35); opacity: 0.6; }
        }

        /* School Logo Tagline */
        .istec-hero .hero-school-tag {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 18px;
        }

        .istec-hero .hero-school-logo {
            height: 38px;
            width: auto;
            object-fit: contain;
            display: block;
        }

        .istec-hero .hero-school-divider {
            width: 1.5px;
            height: 24px;
            background: #cbd5e1;
        }

        .istec-hero .hero-school-name {
            font-size: 0.88rem;
            font-weight: 700;
            color: #475569;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* Headline */
        .istec-hero .hero-headline {
            font-size: clamp(2rem, 3.8vw, 3.2rem);
            font-weight: 900;
            line-height: 1.18;
            letter-spacing: -0.025em;
            color: #0f172a;
            margin-bottom: 20px;
        }

        .istec-hero .hero-hl-small {
            font-size: 0.9em;
            font-weight: 800;
            color: #1e293b;
        }

        .istec-hero .hero-hl-big {
            font-style: normal;
            font-weight: 900;
            color: #0f172a;
        }

        .istec-hero .gradient-text {
            background: linear-gradient(135deg, #61A60E 0%, #3e6d08 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: inline-block;
        }

        /* Subtitle */
        .istec-hero .hero-sub {
            font-size: 1.05rem;
            line-height: 1.7;
            color: #475569;
            margin-bottom: 24px;
            max-width: 600px;
        }

        .istec-hero .hero-sub strong {
            color: #0f172a;
            font-weight: 700;
        }

        /* Decor icons opacity */
        .istec-hero .bg-decor-icon {
            opacity: 0.08 !important;
            pointer-events: none;
            user-select: none;
            filter: blur(0.5px);
            transition: opacity 0.3s ease;
        }

        /* Fast info badges row (Không xuống hàng, không scrollbar) */
        .istec-hero .hero-badges-row {
            display: flex !important;
            flex-wrap: nowrap !important;
            gap: 6px !important;
            margin-bottom: 24px !important;
            overflow: visible !important;
            scrollbar-width: none !important;
        }

        .istec-hero .hero-badges-row::-webkit-scrollbar {
            display: none !important;
        }

        .istec-hero .info-badge {
            display: inline-flex !important;
            align-items: center !important;
            gap: 5px !important;
            padding: 5px 9px !important;
            background: #ffffff !important;
            border: 1px solid rgba(97, 166, 14, 0.22) !important;
            border-radius: 999px !important;
            font-size: 0.74rem !important;
            font-weight: 650 !important;
            color: #1e293b !important;
            box-shadow: 0 2px 6px rgba(15, 23, 42, 0.03) !important;
            white-space: nowrap !important;
            flex-shrink: 0 !important;
            transition: all 0.25s ease !important;
        }

        .istec-hero .info-badge:hover {
            border-color: #61A60E;
            transform: translateY(-2px);
            box-shadow: 0 4px 14px rgba(97, 166, 14, 0.12);
        }

        .istec-hero .info-badge .icon {
            color: #61A60E;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Accreditation strip */
        .istec-hero .hero-accred-strip {
            margin-bottom: 28px;
            padding-top: 14px;
            border-top: 1px dashed rgba(97, 166, 14, 0.2);
        }

        .istec-hero .hero-accred-label {
            display: block;
            font-size: 0.76rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #64748b;
            margin-bottom: 10px;
        }

        .istec-hero .hero-accred-logos {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .istec-hero .hero-accred-logos img {
            height: 32px;
            width: auto;
            object-fit: contain;
            filter: grayscale(10%) contrast(105%);
            transition: transform 0.25s ease, filter 0.25s ease;
            background: #ffffff;
            padding: 4px 8px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }

        .istec-hero .hero-accred-logos img:hover {
            transform: scale(1.08);
            filter: grayscale(0%);
            border-color: #61A60E;
        }

        /* CTA buttons */
        .istec-hero .hero-cta {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
            margin-bottom: 28px;
        }

        .istec-hero .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 28px;
            border-radius: 12px;
            font-size: 0.96rem;
            font-weight: 750;
            letter-spacing: 0.01em;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .istec-hero .btn-primary {
            background: linear-gradient(135deg, #61A60E 0%, #467909 100%);
            color: #ffffff;
            border: none;
            box-shadow: 0 8px 25px rgba(97, 166, 14, 0.35);
        }

        .istec-hero .btn-primary:hover {
            background: linear-gradient(135deg, #6cba10 0%, #4f890a 100%);
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(97, 166, 14, 0.45);
            color: #ffffff;
        }

        .istec-hero .btn-outline {
            background: #ffffff;
            color: #1e293b;
            border: 1.5px solid #cbd5e1;
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.04);
        }

        .istec-hero .btn-outline:hover {
            border-color: #61A60E;
            color: #61A60E;
            background: rgba(97, 166, 14, 0.04);
            transform: translateY(-2px);
        }

        /* Trust & Global Network proof (Bỏ ảnh học viên theo feedback) */
        .istec-hero .hero-social-proof {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .istec-hero .network-proof-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(97, 166, 14, 0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border: 1.5px solid rgba(97, 166, 14, 0.28);
            color: #61A60E;
        }

        .istec-hero .hero-social-proof p {
            font-size: 0.84rem;
            color: #64748b;
            line-height: 1.4;
            margin: 0;
        }

        .istec-hero .hero-social-proof p strong {
            color: #0f172a;
            font-weight: 800;
        }

        /* ── Full-width Infinite Accreditation Marquee ── */
        .istec-marquee-section {
            width: 100%;
            overflow: hidden;
            position: relative;
            padding: 22px 0;
            background: #ffffff;
            border-top: 1px solid rgba(97, 166, 14, 0.15);
            border-bottom: 1px solid rgba(97, 166, 14, 0.15);
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.03);
            margin: 0;
            z-index: 5;
        }

        .istec-marquee-wrapper {
            position: relative;
            max-width: 100%;
            overflow: hidden;
        }

        .istec-marquee-fade-left,
        .istec-marquee-fade-right {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 120px;
            z-index: 5;
            pointer-events: none;
        }

        .istec-marquee-fade-left {
            left: 0;
            background: linear-gradient(to right, rgba(255, 255, 255, 0.95), transparent);
        }

        .istec-marquee-fade-right {
            right: 0;
            background: linear-gradient(to left, rgba(255, 255, 255, 0.95), transparent);
        }

        .istec-marquee-track {
            display: flex;
            width: max-content;
            animation: istec-marquee-scroll 32s linear infinite;
        }

        .istec-marquee-track:hover {
            animation-play-state: paused;
        }

        .istec-marquee-group {
            display: flex;
            align-items: center;
            gap: 48px;
            padding-right: 48px;
            flex-shrink: 0;
        }

        .istec-marquee-group .logos__link {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: transform 0.25s ease;
        }

        .istec-marquee-group img {
            height: 38px;
            width: auto;
            max-width: 150px;
            object-fit: contain;
            filter: grayscale(20%) contrast(105%);
            transition: all 0.25s ease;
        }

        .istec-marquee-group img:hover {
            filter: grayscale(0%) contrast(110%);
            transform: scale(1.1);
        }

        @keyframes istec-marquee-scroll {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        /* ── Right Column: Hero Visual Panel ── */
        .istec-hero .hero-visual {
            position: relative;
        }

        .istec-hero .hero-photo-main {
            position: relative !important;
            border-radius: 28px !important;
            box-shadow: 0 24px 70px rgba(97, 166, 14, 0.22), 0 10px 30px rgba(0, 0, 0, 0.08) !important;
            border: 4px solid #ffffff !important;
            background: #f1f5f9 !important;
            overflow: visible !important;
        }

        .istec-hero .hero-photo-main > img {
            width: 100% !important;
            height: 560px !important;
            object-fit: cover !important;
            object-position: center center !important;
            display: block !important;
            border-radius: 24px !important;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        .istec-hero .hero-photo-main:hover > img {
            transform: scale(1.02);
        }

        /* Floating stat badges - Cố định kích thước chuẩn, không bao giờ bị kéo dãn */
        .istec-hero .hero-float-badge {
            position: absolute !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 12px !important;
            background: rgba(255, 255, 255, 0.96) !important;
            border: 1px solid rgba(97, 166, 14, 0.28) !important;
            border-radius: 16px !important;
            padding: 10px 16px !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12) !important;
            backdrop-filter: blur(14px) !important;
            width: max-content !important;
            max-width: 220px !important;
            height: auto !important;
            z-index: 10 !important;
            animation: float-gentle 4.5s ease-in-out infinite alternate !important;
        }

        .istec-hero .hero-float-1 {
            top: 24px !important;
            left: -18px !important;
            right: auto !important;
            bottom: auto !important;
            animation-delay: 0s !important;
        }

        .istec-hero .hero-float-2 {
            top: 45% !important;
            right: -20px !important;
            left: auto !important;
            bottom: auto !important;
            animation-delay: 1.2s !important;
        }

        .istec-hero .hero-float-3 {
            bottom: 24px !important;
            left: -16px !important;
            top: auto !important;
            right: auto !important;
            animation-delay: 2.2s !important;
        }

        .istec-hero .float-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: rgba(97, 166, 14, 0.12);
            color: #61A60E;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .istec-hero .float-value {
            font-size: 1.25rem;
            font-weight: 850;
            color: #2f5404;
            line-height: 1.1;
        }

        .istec-hero .float-label {
            font-size: 0.74rem;
            color: #64748b;
            font-weight: 650;
            line-height: 1.3;
        }

        /* Secondary video thumbnail */
        .istec-hero .hero-video-thumb {
            position: absolute;
            bottom: -18px;
            right: 18px;
            width: 200px;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 14px 40px rgba(0, 0, 0, 0.22);
            border: 3px solid #ffffff;
            background: #0f172a;
            z-index: 12;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .istec-hero .hero-video-thumb:hover {
            transform: translateY(-4px) scale(1.03);
            box-shadow: 0 18px 45px rgba(97, 166, 14, 0.3);
        }

        .istec-hero .hero-video-thumb img {
            width: 100%;
            height: 110px;
            object-fit: cover;
            display: block;
            opacity: 0.85;
            transition: opacity 0.3s ease;
        }

        .istec-hero .hero-video-thumb:hover img {
            opacity: 1;
        }

        .istec-hero .video-play-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: linear-gradient(180deg, transparent 20%, rgba(0, 0, 0, 0.75) 100%);
            gap: 6px;
        }

        .istec-hero .play-pulse-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #61A60E;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 0 0 rgba(97, 166, 14, 0.7);
            animation: pulse-play 1.8s infinite;
        }

        @keyframes pulse-play {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(97, 166, 14, 0.7); }
            70% { transform: scale(1); box-shadow: 0 0 0 12px rgba(97, 166, 14, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(97, 166, 14, 0); }
        }

        .istec-hero .video-play-title {
            color: #ffffff;
            font-size: 0.72rem;
            font-weight: 750;
            text-align: center;
            letter-spacing: 0.02em;
            padding: 0 6px;
        }

        @keyframes float-gentle {
            from { transform: translateY(0); }
            to { transform: translateY(-10px); }
        }

        /* Responsive Breakpoints */
        @media (max-width: 1024px) {
            .istec-hero .hero-layout {
                grid-template-columns: 1fr;
                gap: 48px;
            }
            .istec-hero .hero-visual {
                order: -1;
                max-width: 580px;
                margin: 0 auto;
            }
            .istec-hero .hero-photo-top img {
                height: 220px;
            }
            .istec-hero .hero-photo-bottom img {
                height: 200px;
            }
            .istec-hero .hero-float-1 {
                left: 12px;
                top: 12px;
            }
            .istec-hero .hero-float-2 {
                right: 12px;
                top: 46%;
            }
            .istec-hero .hero-float-3 {
                left: 12px;
                bottom: 12px;
            }
            .istec-hero .hero-video-thumb {
                right: 12px;
                bottom: 12px;
            }
        }

        @media (max-width: 768px) {
            .istec-hero {
                padding: 100px 0 60px;
            }
            .istec-hero .hero-headline {
                font-size: 1.85rem;
            }
            .istec-hero .hero-photo-top img {
                height: 180px;
            }
            .istec-hero .hero-photo-bottom img {
                height: 160px;
            }
            .istec-hero .hero-float-badge {
                min-width: 135px;
                padding: 8px 12px;
            }
            .istec-hero .float-icon {
                width: 34px;
                height: 34px;
            }
            .istec-hero .float-value {
                font-size: 1rem;
            }
            .istec-hero .hero-cta {
                flex-direction: column;
                width: 100%;
            }
            .istec-hero .btn {
                width: 100%;
            }
            .istec-hero .hero-video-thumb {
                width: 160px;
            }
            .istec-hero .hero-video-thumb img {
                height: 90px;
            }
        }

        /* ── Section General Layout ── */
        .umef-section {
            padding: 100px 20px;
            position: relative;
            overflow: hidden;
        }


        /* ── Dark Section Glow & Contrast Rules ── */
        .umef-section-dark {
            background: #040508 !important;
            position: relative;
            overflow: hidden;
        }
        .umef-section-dark::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse at 20% 30%, rgba(217, 38, 38, 0.12) 0%, transparent 55%),
                radial-gradient(ellipse at 80% 70%, rgba(217, 38, 38, 0.08) 0%, transparent 50%);
            pointer-events: none;
            z-index: 1;
        }
        .umef-section-dark .gallery-inner {
            position: relative;
            z-index: 2;
        }

        /* ── Premium Program Cards Style ── */
        .prog-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 32px;
            max-width: 960px;
            margin: 0 auto;
        }
        .prog-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-top: 5px solid #61A60E !important;
            border-radius: 16px !important;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }
        .prog-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 45px rgba(97, 166, 14, 0.16) !important;
            border-color: rgba(97, 166, 14, 0.35) !important;
        }
        .prog-card-thumb {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            overflow: hidden;
            background: #f1f5f9;
        }
        .prog-card-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .prog-card:hover .prog-card-thumb img {
            transform: scale(1.06);
        }
        .prog-card-badge {
            position: absolute;
            top: 14px;
            right: 14px;
            background: linear-gradient(135deg, #61A60E 0%, #467909 100%);
            color: #ffffff;
            font-size: 0.78rem;
            font-weight: 800;
            padding: 4px 12px;
            border-radius: 99px;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            box-shadow: 0 4px 12px rgba(97, 166, 14, 0.35);
            z-index: 2;
        }
        .prog-card-body {
            padding: 28px 26px 24px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        .prog-card-title {
            font-size: 1.45rem;
            font-weight: 850;
            color: #1e293b;
            margin-top: 0;
            margin-bottom: 4px;
            line-height: 1.3;
        }
        .prog-card-subtitle {
            color: var(--umef-primary);
            font-weight: 700;
            font-size: 0.88rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin-bottom: 14px;
            display: block;
        }
        .prog-card-desc {
            color: #64748b;
            font-size: 0.92rem;
            line-height: 1.6;
            margin-bottom: 20px;
            flex-grow: 1;
        }
        .prog-card-list {
            list-style: none;
            padding: 0;
            margin: 0 0 24px;
            color: #475569;
            font-size: 0.88rem;
            line-height: 1.8;
        }
        .prog-card-list li {
            position: relative;
            padding-left: 20px;
            margin-bottom: 8px;
        }
        .prog-card-list li:last-child {
            margin-bottom: 0;
        }
        .prog-card-list li::before {
            content: '•';
            position: absolute;
            left: 0;
            color: var(--umef-primary);
            font-weight: bold;
            font-size: 1.1rem;
            line-height: 1;
        }
        .prog-card-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: auto;
            padding-top: 18px;
            border-top: 1px solid #f1f5f9;
        }
        .prog-btn-reg {
            flex: 1;
            padding: 11px 16px;
            font-size: 0.9rem;
            font-weight: 700;
            color: #ffffff;
            background: linear-gradient(135deg, #61A60E 0%, #467909 100%);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 14px rgba(97, 166, 14, 0.25);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            text-decoration: none;
        }
        .prog-btn-reg:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(97, 166, 14, 0.38);
            background: linear-gradient(135deg, #6cba10 0%, #4f890a 100%);
            color: #ffffff;
        }
        .prog-btn-reg svg {
            transition: transform 0.3s ease;
        }
        .prog-btn-reg:hover svg {
            transform: translateX(2px) translateY(-2px);
        }
        .prog-btn-more {
            padding: 11px 16px;
            font-size: 0.88rem;
            font-weight: 700;
            color: #475569;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            transition: all 0.25s ease;
        }
        .prog-btn-more:hover {
            background: #f1f5f9;
            color: var(--umef-primary);
            border-color: #cbd5e1;
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
            color: #ff8a8a;
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

        /* ══════════════════════════════════════
           NEW SECTIONS STYLING (ISTEC ADDITIONS)
           ══════════════════════════════════════ */
        /* Why Choose Section */
        .reasons-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 40px;
        }
        .reason-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 30px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02), 0 2px 4px -1px rgba(0,0,0,0.01);
        }
        .reason-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0,0,0,0.05), 0 10px 10px -5px rgba(0,0,0,0.02);
            border-color: var(--umef-primary);
        }
        .reason-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: rgba(171, 14, 0, 0.06);
            color: var(--umef-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        
        /* Admissions Steps */
        .steps-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 30px;
            margin-top: 50px;
            position: relative;
        }
        .step-card {
            background: #ffffff;
            padding: 30px;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            position: relative;
            z-index: 2;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);
        }
        .step-num {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--umef-primary);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1rem;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(171, 14, 0, 0.3);
        }
        
        /* FAQ Accordion */
        .faq-container {
            max-width: 800px;
            margin: 40px auto 0;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .faq-item {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .faq-item[open] {
            border-color: var(--umef-primary);
            box-shadow: 0 10px 20px rgba(0,0,0,0.03);
        }
        .faq-item summary {
            padding: 20px 24px;
            font-weight: 700;
            color: #1e293b;
            cursor: pointer;
            list-style: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
            outline: none;
        }
        .faq-item summary::-webkit-details-marker {
            display: none;
        }
        .faq-item summary::after {
            content: '+';
            font-size: 1.4rem;
            color: var(--umef-primary);
            font-weight: 300;
            transition: transform 0.3s;
        }
        .faq-item[open] summary::after {
            content: '−';
        }
        .faq-content {
            padding: 0 24px 20px;
            color: #475569;
            line-height: 1.6;
            font-size: 0.95rem;
            border-top: 1px solid #f1f5f9;
            padding-top: 15px;
        }

        /* ISTEC Prestige & History Section */
        .istec-prestige-section {
            background: linear-gradient(180deg, #f8fafc 0%, #fdfdfd 100%);
            padding: 80px 20px;
            position: relative;
        }
        .istec-prestige-inner {
            max-width: 1200px;
            margin: 0 auto;
        }
        .istec-prestige-grid {
            display: grid;
            grid-template-columns: 1fr 1.15fr;
            gap: 48px;
            align-items: center;
        }
        .istec-prestige-image {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
            border: 1px solid rgba(15, 23, 42, 0.06);
            background: #f1f5f9;
        }
        .istec-prestige-image img {
            width: 100%;
            height: 100%;
            max-height: 480px;
            object-fit: cover;
            display: block;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .istec-prestige-image:hover img {
            transform: scale(1.03);
        }
        .istec-prestige-content h3 {
            font-size: clamp(1.4rem, 2.5vw, 1.85rem);
            font-weight: 800;
            color: #1e293b;
            margin-top: 0;
            margin-bottom: 18px;
            line-height: 1.35;
        }
        .istec-prestige-content p {
            color: #475569;
            font-size: 1.02rem;
            line-height: 1.7;
            margin-bottom: 24px;
        }
        .istec-prestige-checklist {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .istec-prestige-checklist li {
            display: flex;
            align-items: flex-start;
            gap: 14px;
        }
        .istec-prestige-checklist li svg {
            color: var(--umef-primary, #ab0e00);
            font-size: 1.25rem;
            flex-shrink: 0;
            margin-top: 2px;
        }
        .istec-prestige-checklist li span {
            color: #334155;
            font-weight: 600;
            font-size: 0.98rem;
            line-height: 1.55;
        }

        /* ISTEC Campus Dark Section & Card Contrast */
        .umef-section-dark .gallery-inner {
            position: relative;
            z-index: 2;
        }
        .istec-campus-card {
            background: rgba(15, 23, 42, 0.85);
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(12px);
            transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .istec-campus-card:hover {
            transform: translateY(-6px);
            border-color: rgba(239, 68, 68, 0.45);
            box-shadow: 0 20px 40px rgba(217, 38, 38, 0.15);
        }
        .istec-campus-card img {
            width: 100%;
            height: 240px;
            object-fit: cover;
            display: block;
        }
        .istec-campus-card-body {
            padding: 24px;
        }
        .istec-campus-card-body h4 {
            color: #ffffff !important;
            font-size: 1.2rem;
            font-weight: 750;
            margin-top: 0;
            margin-bottom: 10px;
            line-height: 1.35;
        }
        .istec-campus-card-body p {
            color: #e2e8f0 !important;
            font-size: 0.95rem;
            line-height: 1.65;
            margin: 0;
        }
        .campus-dark-badge {
            color: #ff9e9e !important;
            background: rgba(217, 38, 38, 0.16) !important;
            border: 1px solid rgba(217, 38, 38, 0.35) !important;
            padding: 6px 18px;
            border-radius: 99px;
            font-size: 0.82rem;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
        }
        .campus-dark-desc {
            color: #e2e8f0 !important;
            max-width: 700px;
            margin: 15px auto 0;
            line-height: 1.7;
            font-size: 1.02rem;
        }

        /* ISTEC Campus & Program Grids */
        .istec-campus-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }
        .prog-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 32px;
            max-width: 960px;
            margin: 0 auto;
        }
        .istec-testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        @media (max-width: 992px) {
            .istec-prestige-section {
                padding: 60px 16px;
            }
            .istec-prestige-grid {
                grid-template-columns: 1fr;
                gap: 32px;
            }
            .istec-prestige-image {
                max-height: 380px;
            }
            .istec-prestige-image img {
                max-height: 380px;
            }
        }
        @media (max-width: 768px) {
            .istec-prestige-section {
                padding: 48px 16px;
            }
            .istec-prestige-grid {
                gap: 24px;
            }
            .istec-prestige-content h3 {
                font-size: 1.35rem;
                margin-bottom: 14px;
            }
            .istec-prestige-content p {
                font-size: 0.92rem;
                line-height: 1.65;
                margin-bottom: 18px;
            }
            .istec-prestige-checklist {
                gap: 12px;
            }
            .istec-prestige-checklist li {
                gap: 10px;
            }
            .istec-prestige-checklist li svg {
                width: 16px;
                height: 16px;
                margin-top: 2px;
            }
            .istec-prestige-checklist li span {
                font-size: 0.9rem;
            }
            .istec-campus-grid,
            .istec-testimonials-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            .prog-grid {
                grid-template-columns: 1fr !important;
                gap: 24px !important;
                max-width: 480px !important;
            }
            .prog-card-body {
                padding: 22px 18px 18px !important;
            }
            .prog-card-actions {
                flex-direction: column !important;
                gap: 10px !important;
            }
            .prog-btn-reg,
            .prog-btn-more {
                width: 100% !important;
                justify-content: center !important;
            }
            .section-title {
                font-size: 1.6rem !important;
            }
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>

    <!-- Modern Impressive Hero Area (ISTEC Green & mba.html Style) -->
    <section class="istec-hero" id="trang-chu" aria-labelledby="hero-headline">
        <div class="hero-bg">
            <!-- Localized Background Decor Icons (Mờ nhẹ tinh tế) -->
            <div class="section-bg-decor">
                <svg class="svg-icon fa-graduation-cap fa-solid bg-decor-icon decor-lg" style="top: 10%; left: 4%; animation-duration: 28s; opacity: 0.08;" viewBox="0 0 640 512" width="18" height="18" fill="#61A60E"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
                <svg class="svg-icon fa-book fa-solid bg-decor-icon decor-sm" style="top: 60%; right: 3%; animation-duration: 32s; opacity: 0.08;" viewBox="0 0 448 512" width="16" height="16" fill="#61A60E"><path d="M96 0C43 0 0 43 0 96L0 416c0 53 43 96 96 96l288 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64c17.7 0 32-14.3 32-32l0-320c0-17.7-14.3-32-32-32L384 0 96 0zm0 384l256 0 0 64L96 448c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16zm16 48l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
            </div>
            <div class="hero-orb hero-orb-1"></div>
            <div class="hero-orb hero-orb-2"></div>
            <div class="hero-orb hero-orb-3"></div>
            <div class="hero-grid"></div>
        </div>

        <div class="container hero-layout">
            <!-- LEFT: Hero Content -->
            <div class="hero-content reveal-up">
                <div class="hero-badge">
                    <span class="badge-dot"></span>
                    <span><?php echo $is_en ? 'Original Knowledge – Localized Mentorship' : 'Tri thức Nguyên bản – Đồng hành Bản địa'; ?></span>
                </div>

                <div class="hero-school-tag">
                    <a href="https://istec.fr/en/" target="_blank" rel="noopener" title="ISTEC Paris" class="hero-school-link">
                        <img src="https://istec.fr/wp-content/themes/bubble//components/subcomponents_essentials/NavigationMain/assets/logo.svg" alt="ISTEC Paris Logo" class="hero-school-logo" width="112" height="40" fetchpriority="high" decoding="async" />
                    </a>
                    <span class="hero-school-divider"></span>
                    <span class="hero-school-name">
                        <svg class="svg-icon fa-graduation-cap fa-solid" viewBox="0 0 640 512" width="14" height="14" fill="#61A60E"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
                        <?php echo $is_en ? 'French Partner Business School' : 'Trường Đối Tác Pháp'; ?>
                    </span>
                </div>

                <h1 class="hero-headline" id="hero-headline">
                    <span class="hero-hl-small"><?php echo $is_en ? 'Elite Business School' : 'Trường kinh doanh'; ?></span> <em class="hero-hl-big"><?php echo $is_en ? 'in Paris' : 'tại Paris'; ?></em><br />
                    <span class="hero-hl-small"><?php echo $is_en ? 'nationally accredited' : 'đạt kiểm định quốc gia'; ?> <span class="gradient-text">Grade de Master &amp; Grade de Licence</span></span>
                </h1>

                <p class="hero-sub">
                    <?php echo $is_en ? 'ISTEC Paris – established in 1961, is a recognized business school (Grande École) member of CGE, officially accredited to award Grade de Licence (Bachelor) & Grade de Master (Master) by the French Ministry of Higher Education.' : 'ISTEC Paris – thành lập 1961, là trường <strong>kinh doanh</strong> (Grande École) thuộc Hiệp hội CGE, được cấp bằng Grade de Licence (Cử nhân) & Grade de Master (Thạc sĩ) bởi Bộ Giáo dục Pháp.'; ?>
                </p>

                <div class="hero-badges-row" aria-label="Thông tin nhanh về ISTEC Paris">
                    <div class="info-badge">
                        <span class="icon">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </span>
                        <span><?php echo $is_en ? 'Est. 1961 (60+ Yrs)' : '1961 (60+ năm)'; ?></span>
                    </div>
                    <div class="info-badge">
                        <span class="icon">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                        </span>
                        <span>Grande École</span>
                    </div>
                    <div class="info-badge">
                        <span class="icon">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg>
                        </span>
                        <span>Grade de Master</span>
                    </div>
                    <div class="info-badge">
                        <span class="icon">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                        </span>
                        <span>Bac 8+ (DBA)</span>
                    </div>
                </div>

                <div class="hero-cta">
                    <button type="button" class="btn btn-primary" id="hero-main-cta"
                        onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('hero-istec-tuvan'); } else if(typeof window.showform === 'function') { window.showform('hero-istec-tuvan'); }">
                        <span><?php echo $is_en ? 'Request ISTEC Consultation' : 'Nhận tư vấn chương trình ISTEC'; ?></span>
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </button>
                    <a href="#cac-chuong-trinh" class="btn btn-outline" id="hero-explore-cta">
                        <span><?php echo $is_en ? 'Explore Programs' : 'Khám phá chương trình'; ?></span>
                        <svg class="svg-icon fa-graduation-cap fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
                    </a>
                </div>

                <div class="hero-social-proof">
                    <div class="network-proof-icon" aria-hidden="true">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#61A60E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    </div>
                    <p><?php echo $is_en ? '<strong>15,000+</strong> Global Alumni in 40+ countries &bull; ISTEC Paris Business School' : '<strong>15,000+</strong> Cựu sinh viên toàn cầu tại 40+ quốc gia &bull; ISTEC Paris'; ?></p>
                </div>
            </div>

            <!-- RIGHT: Hero Visual Panel -->
            <div class="hero-visual reveal-up">
                <div class="hero-photo-main">
                    <img decoding="async" src="https://istec.fr/wp-content/uploads/2025/05/Homepage_5-1-scaled.jpg"
                        alt="Sinh viên Trường Kinh Doanh ISTEC Paris" width="620" height="560"
                        loading="eager" fetchpriority="high" />

                    <!-- Floating Stat 1: Bac 8+ -->
                    <div class="hero-float-badge hero-float-1">
                        <div class="float-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                        </div>
                        <div>
                            <div class="float-value">Bac 8+</div>
                            <div class="float-label"><?php echo $is_en ? 'Terminal Degree (DBA)' : 'Chương trình cao nhất'; ?></div>
                        </div>
                    </div>

                    <!-- Floating Stat 2: Top 8 -->
                    <div class="hero-float-badge hero-float-2">
                        <div class="float-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                        </div>
                        <div>
                            <div class="float-value">Top 8</div>
                            <div class="float-label">Post-Bac (Le Parisien)</div>
                        </div>
                    </div>

                    <!-- Floating Stat 3: CGE -->
                    <div class="hero-float-badge hero-float-3">
                        <div class="float-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg>
                        </div>
                        <div>
                            <div class="float-value">CGE</div>
                            <div class="float-label"><?php echo $is_en ? 'Grande École Member' : 'Hiệp hội Trường Lớn'; ?></div>
                        </div>
                    </div>
                </div>

                <!-- Video Ceremony Floating Thumbnail (Scrolls to video) -->
                <a href="#istec-videos" class="hero-video-thumb" title="<?php echo $is_en ? 'Watch ISTEC Paris Graduation Ceremony' : 'Xem Lễ Tốt Nghiệp ISTEC Paris'; ?>">
                    <img decoding="async" src="https://istec.fr/wp-content/uploads/2025/10/istec_bs25.jpg" alt="Lễ tốt nghiệp ISTEC Paris" width="200" height="110" loading="lazy" />
                    <div class="video-play-overlay">
                        <div class="play-pulse-btn">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                        </div>
                        <span class="video-play-title"><?php echo $is_en ? 'Graduation Ceremony' : 'Lễ Tốt Nghiệp ISTEC'; ?></span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Infinite Accreditation Marquee Strip (Hàng kiểm định chạy ngang vô tận ngay dưới Hero) -->
    <div class="istec-marquee-section" aria-label="Các kiểm định và công nhận quốc tế của ISTEC Paris">
        <div class="istec-marquee-wrapper">
            <div class="istec-marquee-fade-left"></div>
            <div class="istec-marquee-fade-right"></div>
            <div class="istec-marquee-track">
                <div class="istec-marquee-group">
                    <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="logos__link" title="France Compétences">
                        <img loading="lazy" src="https://istec.fr/wp-content/uploads/2025/02/logo-france-competences.30a014-1.png" alt="France Compétences RNCP" width="130" height="38" />
                    </a>
                    <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="logos__link" title="Campus France">
                        <img loading="lazy" src="https://istec.fr/wp-content/uploads/2026/02/campus-france-logo.png" alt="Campus France" width="124" height="38" />
                    </a>
                    <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="logos__link" title="CEFDG">
                        <img loading="lazy" src="https://istec.fr/wp-content/uploads/2026/02/CEFDG-1.webp" alt="CEFDG" width="80" height="38" />
                    </a>
                    <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="logos__link" title="Bienvenue en France">
                        <img loading="lazy" src="https://istec.fr/wp-content/uploads/2026/02/logo-bienvenue-en-france.png" alt="Bienvenue en France" width="48" height="38" />
                    </a>
                    <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="logos__link" title="Erasmus+">
                        <img loading="lazy" src="https://istec.fr/wp-content/uploads/2026/02/Erasmus_Logo.svg.png" alt="Erasmus+" width="130" height="38" />
                    </a>
                    <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="logos__link" title="CGE - Conférence des Grandes Écoles">
                        <img loading="lazy" src="https://istec.fr/wp-content/uploads/2025/07/CGE.webp" alt="CGE - Conférence des Grandes Écoles" width="85" height="38" />
                    </a>
                    <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="logos__link" title="Qualiopi">
                        <img loading="lazy" src="https://istec.fr/wp-content/uploads/2026/02/qualiopi-logo-png.png" alt="Qualiopi" width="75" height="38" />
                    </a>
                    <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="logos__link" title="AACSB Member">
                        <img loading="lazy" src="https://istec.fr/wp-content/uploads/2025/07/AACSB.webp" alt="AACSB Member" width="85" height="38" />
                    </a>
                    <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="logos__link" title="EFMD Member">
                        <img loading="lazy" src="https://istec.fr/wp-content/uploads/2026/01/EFMD-Logo-2-300x122-1.png" alt="EFMD Member" width="95" height="38" />
                    </a>
                </div>
                <!-- Duplicate group for infinite continuous loop -->
                <div class="istec-marquee-group" aria-hidden="true">
                    <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="logos__link" title="France Compétences">
                        <img loading="lazy" src="https://istec.fr/wp-content/uploads/2025/02/logo-france-competences.30a014-1.png" alt="France Compétences RNCP" width="130" height="38" />
                    </a>
                    <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="logos__link" title="Campus France">
                        <img loading="lazy" src="https://istec.fr/wp-content/uploads/2026/02/campus-france-logo.png" alt="Campus France" width="124" height="38" />
                    </a>
                    <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="logos__link" title="CEFDG">
                        <img loading="lazy" src="https://istec.fr/wp-content/uploads/2026/02/CEFDG-1.webp" alt="CEFDG" width="80" height="38" />
                    </a>
                    <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="logos__link" title="Bienvenue en France">
                        <img loading="lazy" src="https://istec.fr/wp-content/uploads/2026/02/logo-bienvenue-en-france.png" alt="Bienvenue en France" width="48" height="38" />
                    </a>
                    <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="logos__link" title="Erasmus+">
                        <img loading="lazy" src="https://istec.fr/wp-content/uploads/2026/02/Erasmus_Logo.svg.png" alt="Erasmus+" width="130" height="38" />
                    </a>
                    <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="logos__link" title="CGE - Conférence des Grandes Écoles">
                        <img loading="lazy" src="https://istec.fr/wp-content/uploads/2025/07/CGE.webp" alt="CGE - Conférence des Grandes Écoles" width="85" height="38" />
                    </a>
                    <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="logos__link" title="Qualiopi">
                        <img loading="lazy" src="https://istec.fr/wp-content/uploads/2026/02/qualiopi-logo-png.png" alt="Qualiopi" width="75" height="38" />
                    </a>
                    <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="logos__link" title="AACSB Member">
                        <img loading="lazy" src="https://istec.fr/wp-content/uploads/2025/07/AACSB.webp" alt="AACSB Member" width="85" height="38" />
                    </a>
                    <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="logos__link" title="EFMD Member">
                        <img loading="lazy" src="https://istec.fr/wp-content/uploads/2026/01/EFMD-Logo-2-300x122-1.png" alt="EFMD Member" width="95" height="38" />
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- Section: Why Choose ISTEC Paris -->
    <section class="umef-section" id="tai-sao-chon-istec" style="background: #f8fafc; padding: 80px 20px;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 50px;">
                <span style="color: var(--umef-primary); text-transform: uppercase; letter-spacing: 0.15em; font-weight: 700; font-size: 0.9rem;">Giá Trị Khác Biệt</span>
                <h2 style="font-size: 2.5rem; font-weight: 900; color: #1e293b; margin-top: 10px;">Vì Sao Chọn <span>ISTEC Paris</span>?</h2>
                <p style="color: #64748b; max-width: 700px; margin: 15px auto 0; line-height: 1.6;">
                    ISTEC Paris mang đến mô hình đào tạo Grande École xuất sắc của Pháp, kết hợp hoàn hảo giữa lý thuyết khoa học và kinh nghiệm thực tiễn toàn cầu.
                </p>
            </div>
            
            <div class="reasons-grid">
                <div class="reason-card">
                    <div class="reason-icon">
                        <svg class="svg-icon fa-award fa-solid" viewBox="0 0 384 512" width="20" height="20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192a80 80 0 1 0 -160 0 80 80 0 1 0 160 0z"/></svg>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 800; color: #1e293b; margin-bottom: 12px;">Đẳng cấp "Grande École"</h3>
                    <p style="color: #64748b; font-size: 0.92rem; line-height: 1.6;">ISTEC Paris tự hào là thành viên chính thức của Conférence des Grandes Écoles (CGE), tổ chức đại diện cho các trường tinh hoa nhất nước Pháp.</p>
                </div>
                
                <div class="reason-card">
                    <div class="reason-icon">
                        <svg class="svg-icon fa-stamp fa-solid" viewBox="0 0 512 512" width="20" height="20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M312 201.8c0-17.4 9.2-33.2 19.9-47C344.5 138.5 352 118.1 352 96c0-53-43-96-96-96s-96 43-96 96c0 22.1 7.5 42.5 20.1 58.8c10.7 13.8 19.9 29.6 19.9 47c0 29.9-24.3 54.2-54.2 54.2L112 256C50.1 256 0 306.1 0 368c0 20.9 13.4 38.7 32 45.3L32 464c0 26.5 21.5 48 48 48l352 0c26.5 0 48-21.5 48-48l0-50.7c18.6-6.6 32-24.4 32-45.3c0-61.9-50.1-112-112-112l-33.8 0c-29.9 0-54.2-24.3-54.2-54.2zM416 416l0 32L96 448l0-32 320 0z"/></svg>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 800; color: #1e293b; margin-bottom: 12px;">Kiểm Định Quốc Gia Cao Nhất</h3>
                    <p style="color: #64748b; font-size: 0.92rem; line-height: 1.6;">Đạt danh hiệu chất lượng học thuật Grade de Master & Grade de Licence do Bộ Giáo dục & Nghiên cứu Pháp trực tiếp phê duyệt.</p>
                </div>
                
                <div class="reason-card">
                    <div class="reason-icon">
                        <svg class="svg-icon fa-briefcase fa-solid" viewBox="0 0 512 512" width="20" height="20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c-17.7 0-32 14.3-32 32l0 32L32 64C14.3 64 0 78.3 0 96L0 448c0 17.7 14.3 32 32 32l448 0c17.7 0 32-14.3 32-32l0-352c0-17.7-14.3-32-32-32l-64 0 0-32c0-17.7-14.3-32-32-32L128 0zm192 64L192 64l0-32 128 0 0 32z"/></svg>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 800; color: #1e293b; margin-bottom: 12px;">Mạng Lưới 3,000+ Doanh Nghiệp</h3>
                    <p style="color: #64748b; font-size: 0.92rem; line-height: 1.6;">Sinh viên và học viên tiếp cận mạng lưới kết nối sâu rộng với hàng ngàn tập đoàn đa quốc gia và doanh nghiệp lớn toàn cầu.</p>
                </div>
                
                <div class="reason-card">
                    <div class="reason-icon">
                        <svg class="svg-icon fa-graduation-cap fa-solid" viewBox="0 0 640 512" width="20" height="20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 800; color: #1e293b; margin-bottom: 12px;">Đồng Hành Bản Địa (IDEAS)</h3>
                    <p style="color: #64748b; font-size: 0.92rem; line-height: 1.6;">Học viên Việt Nam được hỗ trợ học thuật, phản biện, hướng dẫn nghiên cứu bởi các Mentor giàu kinh nghiệm thuộc mạng lưới IDEAS.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Ported Accreditations & Quality Verification Section -->

    <section class="acc-section" id="kiem-dinh-quoc-te" aria-label="Kiểm định & Công nhận Quốc tế">
        <div class="acc-inner">
            <!-- Header -->
            <div class="acc-header">
                <div class="acc-label">
                    <svg class="svg-icon fa-stamp fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M312 201.8c0-17.4 9.2-33.2 19.9-47C344.5 138.5 352 118.1 352 96c0-53-43-96-96-96s-96 43-96 96c0 22.1 7.5 42.5 20.1 58.8c10.7 13.8 19.9 29.6 19.9 47c0 29.9-24.3 54.2-54.2 54.2L112 256C50.1 256 0 306.1 0 368c0 20.9 13.4 38.7 32 45.3L32 464c0 26.5 21.5 48 48 48l352 0c26.5 0 48-21.5 48-48l0-50.7c18.6-6.6 32-24.4 32-45.3c0-61.9-50.1-112-112-112l-33.8 0c-29.9 0-54.2-24.3-54.2-54.2zM416 416l0 32L96 448l0-32 320 0z"/></svg>
                    Công nhận & Kiểm định Giáo dục Pháp
                </div>
                <h2 class="acc-title">
                    Bằng Cấp & Kiểm Định <span>Nhà Nước Pháp</span>
                </h2>
                <p class="acc-desc">
                    Trường Kinh doanh ISTEC Paris được cấp chứng nhận cao nhất bởi Bộ Giáo dục & Nghiên cứu Pháp để đào tạo và cấp bằng danh giá thuộc Hệ thống Grande École.
                </p>
            </div>

            <!-- SAC Hero Card (MESRI / CEFDG) -->
            <div class="acc-sac-hero">
                <div class="acc-sac-left">
                    <div class="acc-sac-badge">
                        <span class="acc-sac-badge-dot"></span>
                        Công nhận chính thức từ Bộ Giáo dục Pháp
                    </div>
                    <h3 class="acc-sac-name">
                        Grade de Master & Grade de Licence
                    </h3>
                    <p class="acc-sac-tagline">
                        Được kiểm định bởi Ủy ban Đánh giá văn bằng quản lý <strong>CEFDG</strong> và được Bộ Giáo dục & Nghiên cứu Pháp công nhận chính thức ở cấp độ quốc gia cao nhất (Bac+3 cho Cử nhân và Bac+5 cho Thạc sĩ).
                    </p>
                    <div class="acc-sac-stats">
                        <div class="acc-sac-stat">
                            <span class="acc-sac-stat-val">MESRI</span>
                            <span class="acc-sac-stat-label">Bộ Giáo dục Pháp</span>
                        </div>
                        <div class="acc-sac-stat">
                            <span class="acc-sac-stat-val acc-sac-stat-svg-wrap">
                                <svg class="flag-icon" width="28" height="28" viewBox="0 0 18 18">
                                    <circle cx="9" cy="9" r="9" fill="#002395" stroke="#ffffff" stroke-width="1.2"></circle>
                                    <rect x="6" y="0" width="6" height="18" fill="#ffffff"></rect>
                                    <rect x="12" y="0" width="6" height="18" fill="#ed2939"></rect>
                                </svg>
                            </span>
                            <span class="acc-sac-stat-label">Grande École</span>
                        </div>
                        <div class="acc-sac-stat">
                            <span class="acc-sac-stat-val">RNCP 7/8</span>
                            <span class="acc-sac-stat-label">Đăng ký Nghề nghiệp QG</span>
                        </div>
                    </div>
                </div>
                <div class="acc-sac-right">
                    <div class="acc-sac-logo-wrap">
                        <img src="https://istec.fr/wp-content/uploads/2025/07/CGE.webp" class="acc-sac-logo-img" alt="Logo CGE - Conférence des Grandes Écoles" style="background:#fff; padding:6px; border-radius:6px;" />
                        <a href="https://istec.fr/wp-content/uploads/2025/04/FRANCE-COMPETENCES.png" target="_blank" rel="noopener noreferrer" class="acc-sac-cert-link">
                            <img src="https://istec.fr/wp-content/uploads/2025/04/FRANCE-COMPETENCES.png" class="acc-sac-cert-img" alt="France Compétences RNCP" style="background:#fff; padding:6px; border-radius:6px;" />
                        </a>
                        <div class="acc-sac-logo-text">
                            <div class="acc-sac-logo-title">Conférence des Grandes Écoles (CGE)</div>
                            <p>Hiệp hội các trường đại học tinh hoa và hàng đầu của Cộng hòa Pháp, quy tụ các trường lớn đào tạo xuất sắc.</p>
                        </div>
                    </div>
                    <ul class="acc-sac-points">
                        <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg><span>Bằng cấp được hợp pháp hóa lãnh sự, công nhận toàn châu Âu và Việt Nam</span></li>
                        <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg><span>Đạt danh hiệu "Grade de Master" và "Grade de Licence" chính phủ Pháp phê duyệt</span></li>
                        <li><svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg><span>ISTEC nằm trong danh sách các trường quản lý được kiểm định xuất sắc của Pháp</span></li>
                    </ul>
                    <div class="acc-sac-cert-strip">
                        <a href="https://istec.fr/wp-content/uploads/2025/07/CGE.webp" class="acc-cert-thumb" target="_blank" rel="noopener noreferrer">
                            Thành viên chính thức Conférence des Grandes Écoles (CGE)
                        </a>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="acc-others-title">Kiểm định & Hiệp hội Kinh doanh Quốc tế</div>

            <!-- Other accreditations grid -->
            <div class="acc-grid">
                <div class="acc-card">
                    <img class="acc-card-logo" src="https://istec.fr/wp-content/uploads/2025/07/AACSB.webp" alt="AACSB" style="background:#fff; padding:6px; border-radius:6px;" />
                    <h4>AACSB Member</h4>
                    <p>Thành viên của Hiệp hội phát triển giảng dạy kinh doanh trường đại học hàng đầu thế giới của Mỹ.</p>
                </div>
                <div class="acc-card">
                    <img class="acc-card-logo" src="https://istec.fr/wp-content/uploads/2025/04/EFMD-2.png" alt="EFMD" style="background:#fff; padding:6px; border-radius:6px;" />
                    <h4>EFMD Member</h4>
                    <p>Thành viên Quỹ phát triển quản lý châu Âu, chứng nhận cho chất lượng đào tạo quản lý xuất sắc.</p>
                </div>
                <div class="acc-card">
                    <img class="acc-card-logo" src="https://istec.fr/wp-content/uploads/2025/04/FRANCE-COMPETENCES.png" alt="France Compétences" style="background:#fff; padding:6px; border-radius:6px;" />
                    <h4>France Compétences RNCP</h4>
                    <p>Văn bằng được đăng ký và phân loại trong Danh mục quốc gia về chứng nhận nghề nghiệp Pháp ở cấp độ 7 (Master) và 8 (Tiến sĩ).</p>
                </div>
                <div class="acc-card">
                    <img class="acc-card-logo" src="https://istec.fr/wp-content/uploads/2025/04/CDEFM.png" alt="CDEFM" style="background:#fff; padding:6px; border-radius:6px;" />
                    <h4>CDEFM Member</h4>
                    <p>Hiệp hội các trường đại học quản lý và kinh doanh của Pháp được Bộ Giáo dục phê duyệt.</p>
                </div>
                <div class="acc-card">
                    <img class="acc-card-logo" src="https://ideas.edu.vn/wp-content/new_public/LANDINGPAGE_MBA/assets/DUAL-DEGREE-5.webp" alt="Erasmus+" style="background:#fff; padding:6px; border-radius:6px;" />
                    <h4>Erasmus+ Partner</h4>
                    <p>Chương trình trao đổi và hợp tác học tập toàn châu Âu của Liên minh châu Âu (EU).</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Geneva Campus Gallery Section (Dark themed for prestige, history, and experience) -->
    <section class="umef-section umef-section-dark">
        <div class="gallery-inner" style="max-width: 1200px; margin: 0 auto; padding: 60px 20px;">
            <div style="text-align: center; margin-bottom: 50px;">
                <span class="campus-dark-badge">Học Tập Tại Trái Tim Thủ Đô Paris</span>
                <h2 style="font-size: 2.5rem; font-weight: 900; color: #fff; margin-top: 10px;">Cơ Sở Campus <span>ISTEC Paris</span></h2>
                <p class="campus-dark-desc">
                    Campus Jemmapes của ISTEC tọa lạc dọc theo kênh đào nổi tiếng Canal Saint-Martin, ngay tại trung tâm sôi động quận 10 Paris. Một không gian học tập hiện đại, kết nối và mang đậm hơi thở văn hóa Pháp.
                </p>
            </div>
            
            <div class="istec-campus-grid">
                <div class="istec-campus-card">
                    <img src="https://istec.fr/wp-content/uploads/2025/07/campus-e1771781716554.png" alt="Campus Jemmapes Paris" loading="lazy" decoding="async" />
                    <div class="istec-campus-card-body">
                        <h4>Campus Jemmapes (Paris)</h4>
                        <p>Trang bị giảng đường hiện đại, phòng thảo luận nhóm, thư viện số và khu vực sinh hoạt chung năng động cho sinh viên quốc tế.</p>
                    </div>
                </div>
                <div class="istec-campus-card">
                    <img src="https://istec.fr/wp-content/uploads/2025/05/Homepage_5-1-scaled.jpg" alt="Môi trường học tập" loading="lazy" decoding="async" />
                    <div class="istec-campus-card-body">
                        <h4>Mô Hình Đào Tạo Trải Nghiệm</h4>
                        <p>Áp dụng triệt để phương pháp giảng dạy dựa trên thực hành thực tế, giải quyết các dự án doanh nghiệp và thảo luận tình huống thực tế toàn cầu.</p>
                    </div>
                </div>
                <div class="istec-campus-card">
                    <img src="https://istec.fr/wp-content/uploads/2025/05/JK-200929_0791__-1-scaled.jpg" alt="Work-Study Alternance" loading="lazy" decoding="async" />
                    <div class="istec-campus-card-body">
                        <h4>Liên Kết Doanh Nghiệp (Alternance)</h4>
                        <p>Mạng lưới hơn 3,000 đối tác doanh nghiệp lớn tại Pháp và quốc tế giúp sinh viên dễ dàng tiếp cận cơ hội thực tập và học tập kết hợp làm việc thực tế.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ISTEC Paris News & Prestige Section -->
    <section class="umef-section istec-prestige-section" id="tin-tuc-su-kien">
        <div class="istec-prestige-inner">
            <div class="section-header" style="text-align: center; margin-bottom: 48px;">
                <span class="section-badge"><?php echo $is_en ? 'Over 6 Decades of Leadership Education' : 'Hành Trình Hơn 6 Thập Kỷ Đào Tạo Lãnh Đạo'; ?></span>
                <h2 class="section-title"><?php echo $is_en ? 'History & Prestige <span>Of ISTEC Paris</span>' : 'Lịch Sử & Vị Thế <span>Uy Tín Của ISTEC</span>'; ?></h2>
            </div>
            
            <div class="istec-prestige-grid">
                <div class="istec-prestige-image">
                    <img src="https://istec.fr/wp-content/uploads/2025/10/istec_bs25.jpg" alt="Vị thế ISTEC" loading="lazy" decoding="async" />
                </div>
                <div class="istec-prestige-content">
                    <h3><?php echo $is_en ? 'Network of 15,000+ Global Alumni & 60+ Years of History' : 'Mạng lưới 15,000+ Cựu sinh viên toàn cầu và 60+ năm lịch sử'; ?></h3>
                    <p>
                        <?php echo $is_en ? 'Founded in 1961, ISTEC Paris has been one of the oldest Grande École business schools in France. The institution focuses on high-quality programs in Business Administration, Marketing, Finance, and Strategic Leadership.' : 'Thành lập từ năm 1961, ISTEC Paris đã và đang là một trong những trường kinh doanh (Grande École) lâu đời nhất của nước Pháp. Trường tập trung phát triển các chương trình giảng dạy chất lượng cao về Quản trị Kinh doanh, Marketing, Tài chính và Lãnh đạo Chiến lược.'; ?>
                    </p>
                    <ul class="istec-prestige-checklist">
                        <li>
                            <svg class="svg-icon fa-check-circle fa-solid" viewBox="0 0 512 512" width="18" height="18" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                            <span><?php echo $is_en ? 'Top 8 Post-Bac business schools with the best Grande École program in France according to Le Parisien 2026.' : 'Hạng 8 trường Post-Bac có chương trình Grande École tốt nhất nước Pháp theo Le Parisien năm 2026.'; ?></span>
                        </li>
                        <li>
                            <svg class="svg-icon fa-check-circle fa-solid" viewBox="0 0 512 512" width="18" height="18" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                            <span><?php echo $is_en ? 'Over 100 partner universities for student exchange and joint degree programs worldwide.' : 'Hơn 100 trường đại học đối tác trao đổi và cấp bằng liên kết trên khắp thế giới.'; ?></span>
                        </li>
                        <li>
                            <svg class="svg-icon fa-check-circle fa-solid" viewBox="0 0 512 512" width="18" height="18" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                            <span><?php echo $is_en ? 'Official partnership with IDEAS Education Organization delivering outstanding master & doctorate degrees in Vietnam.' : 'Hợp tác chính thức cùng Tổ chức Giáo dục IDEAS mang đến các chương trình thạc sĩ & tiến sĩ xuất sắc tại Việt Nam.'; ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ISTEC Paris Academic Programs Grid -->
    <section class="umef-section" id="cac-chuong-trinh">
        <div class="programs-inner" style="max-width: 1200px; margin: 0 auto; padding: 60px 20px;">
            <div style="text-align: center; margin-bottom: 50px;">
                <span style="color: var(--istec-green, #61A60E); text-transform: uppercase; letter-spacing: 0.15em; font-weight: 700; font-size: 0.9rem;">Hệ Thống Đào Tạo Đa Dạng Quốc Tế</span>
                <h2 style="font-size: 2.5rem; font-weight: 900; color: #1e293b; margin-top: 10px;">Các Chương Trình <span>Liên Kết Tuyển Sinh</span></h2>
                <p style="color: #64748b; max-width: 700px; margin: 15px auto 0; line-height: 1.6;">
                    Khám phá hệ thống đào tạo chất lượng cao của ISTEC Paris phối hợp cùng IDEAS triển khai cho học viên và các nhà quản trị Việt Nam.
                </p>
            </div>
            
            <div class="prog-grid">
                <!-- DBA Card (Chương trình DBA - 2.5 - 3 năm - Tiếng Anh) -->
                <div class="prog-card">
                    <div class="prog-card-thumb">
                        <img src="https://istec.fr/wp-content/uploads/2025/05/230912_05457_HD-scaled.jpg" alt="Chương trình DBA - ISTEC Paris" loading="lazy" decoding="async" />
                        <span class="prog-card-badge">Bac+8</span>
                    </div>
                    <div class="prog-card-body">
                        <h3 class="prog-card-title"><?php echo $is_en ? 'DBA Program' : 'Chương trình DBA'; ?></h3>
                        <span class="prog-card-subtitle"><?php echo $is_en ? 'Doctor of Business Administration' : 'Doctor of Business Administration'; ?></span>
                        <p class="prog-card-desc">
                            <?php echo $is_en ? 'Senior executive doctorate program designed for business leaders, CEOs, and exceptional experts seeking to advance academic depth and contribute impactful industry research.' : 'Chương trình Tiến sĩ Quản trị Kinh doanh cao cấp dành riêng cho nhà quản lý, CEO, và chuyên gia xuất sắc muốn nâng tầm học thuật và đóng góp tri thức cho ngành.'; ?>
                        </p>
                        <ul class="prog-card-list">
                            <li>
                                <?php echo $is_en ? 'Duration: 2.5 - 3 years' : 'Thời gian: 2.5 - 3 năm'; ?>
                            </li>
                            <li>
                                <?php echo $is_en ? 'Language: English' : 'Ngôn ngữ: Tiếng Anh'; ?>
                            </li>
                            <li>
                                <?php echo $is_en ? 'Official Degree directly awarded by ISTEC Paris' : 'Bằng cấp chính thức từ ISTEC Paris'; ?>
                            </li>
                        </ul>
                        <div class="prog-card-actions">
                            <button type="button" class="prog-btn-reg"
                                onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('istec-paris-dba'); } else if(typeof window.showform === 'function') { window.showform('istec-paris-dba'); }">
                                <svg class="svg-icon fa-paper-plane fa-solid" viewBox="0 0 512 512" width="14" height="14" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480l0-83.6c0-4 1.5-7.8 4.2-10.8L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z"/></svg>
                                <span><?php echo $is_en ? 'Register Consultation' : 'Đăng ký tư vấn'; ?></span>
                            </button>
                            <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="prog-btn-more">
                                <span><?php echo $is_en ? 'Details' : 'Tìm hiểu thêm'; ?></span> &rarr;
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- MBA Card (Chương trình MBA - 12 - 14 tháng) -->
                <div class="prog-card">
                    <div class="prog-card-thumb">
                        <img src="https://istec.fr/wp-content/uploads/2025/05/Homepage_5-1-scaled.jpg" alt="Chương trình MBA - ISTEC Paris" loading="lazy" decoding="async" />
                        <span class="prog-card-badge">Bac+5</span>
                    </div>
                    <div class="prog-card-body">
                        <h3 class="prog-card-title"><?php echo $is_en ? 'MBA Program' : 'Chương trình MBA'; ?></h3>
                        <span class="prog-card-subtitle"><?php echo $is_en ? 'Executive Master of Business Administration' : 'Executive Master of Business Administration'; ?></span>
                        <p class="prog-card-desc">
                            <?php echo $is_en ? 'Executive MBA program enhancing strategic planning capabilities, corporate financial mastery, and global operational leadership for management personnel.' : 'Chương trình Thạc sĩ Lãnh đạo & Quản trị Kinh doanh (Executive MBA) nâng cao năng lực hoạch định chiến lược, tài chính và điều hành toàn cầu cho nhân sự quản lý.'; ?>
                        </p>
                        <ul class="prog-card-list">
                            <li>
                                <?php echo $is_en ? 'Duration: 12 - 14 months' : 'Thời gian: 12 - 14 tháng'; ?>
                            </li>
                            <li>
                                <?php echo $is_en ? 'National Master Degree recognized by CEFDG' : 'Bằng Thạc sĩ Quốc gia công nhận bởi CEFDG'; ?>
                            </li>
                            <li>
                                <?php echo $is_en ? 'Flexible, modern hybrid learning model' : 'Hình thức học tập linh hoạt, ưu việt'; ?>
                            </li>
                        </ul>
                        <div class="prog-card-actions">
                            <button type="button" class="prog-btn-reg"
                                onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('istec-paris-mba'); } else if(typeof window.showform === 'function') { window.showform('istec-paris-mba'); }">
                                <svg class="svg-icon fa-paper-plane fa-solid" viewBox="0 0 512 512" width="14" height="14" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480l0-83.6c0-4 1.5-7.8 4.2-10.8L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z"/></svg>
                                <span><?php echo $is_en ? 'Register Consultation' : 'Đăng ký tư vấn'; ?></span>
                            </button>
                            <a href="https://istec.fr/en/" target="_blank" rel="noopener" class="prog-btn-more">
                                <span><?php echo $is_en ? 'Details' : 'Tìm hiểu thêm'; ?></span> &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ISTEC Paris Combined Videos Section -->
    <section class="umef-section umef-videos-section" id="istec-videos">
        <!-- Localized Background Decor -->
        <div class="section-bg-decor">
            <svg class="svg-icon fa-circle-play fa-solid bg-decor-icon decor-white decor-lg" style="top: 25%; left: 8%; animation-duration: 30s;" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9l0 176c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z"/></svg>
            <svg class="svg-icon fa-comments fa-solid bg-decor-icon decor-white decor-md" style="top: 60%; right: 9%; animation-duration: 26s;" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M208 352c114.9 0 208-78.8 208-176S322.9 0 208 0S0 78.8 0 176c0 38.6 14.7 74.3 39.6 103.4c-3.5 9.4-8.7 17.7-14.2 24.7c-4.8 6.2-9.7 11-13.3 14.3c-1.8 1.6-3.3 2.9-4.3 3.7c-.5 .4-.9 .7-1.1 .8l-.2 .2s0 0 0 0s0 0 0 0C1 327.2-1.4 334.4 .8 340.9S9.1 352 16 352c21.8 0 43.8-5.6 62.1-12.5c9.2-3.5 17.8-7.4 25.2-11.4C134.1 343.3 169.8 352 208 352zM448 176c0 112.3-99.1 196.9-216.5 207C255.8 457.4 336.4 512 432 512c38.2 0 73.9-8.7 104.7-23.9c7.5 4 16 7.9 25.2 11.4c18.3 6.9 40.3 12.5 62.1 12.5c6.9 0 13.1-4.5 15.2-11.1c2.1-6.6-.2-13.8-5.8-17.9c0 0 0 0 0 0s0 0 0 0l-.2-.2c-.2-.2-.6-.4-1.1-.8c-1-.8-2.5-2-4.3-3.7c-3.6-3.3-8.5-8.1-13.3-14.3c-5.5-7-10.7-15.4-14.2-24.7c24.9-29 39.6-64.7 39.6-103.4c0-92.8-84.9-168.9-192.6-175.5c.4 5.1 .6 10.3 .6 15.5z"/></svg>
        </div>
        <div class="section-header">
            <span class="section-badge" style="color:#7ec420;">HÌNH ẢNH THỰC TẾ</span>
            <h2 class="section-title" style="color:#ffffff;">Lễ Tốt Nghiệp <span>ISTEC Paris</span></h2>
            <p class="section-subtitle" style="color:#94a3b8;">Những khoảnh khắc vinh danh trang trọng và đầy cảm xúc của các tân học viên tại thủ đô Paris, Pháp.</p>
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
                            <iframe src="https://www.youtube.com/embed/99pGEp4Dkko"
                                title="Lễ Tốt Nghiệp ISTEC Paris - Khoảnh Khắc Vinh Danh"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                        <div class="umef-video-body">
                            <span class="umef-video-tag"><svg class="svg-icon fa-graduation-cap fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
                                Lễ Tốt Nghiệp</span>
                            <h3 class="umef-video-title">Khoảnh Khắc Vinh Danh Lễ Tốt Nghiệp ISTEC Paris</h3>
                            <p class="umef-video-desc">Lễ tốt nghiệp trang trọng tại Paris, ghi nhận hành trình học tập xuất sắc và vinh danh những nỗ lực học thuật vượt trội.</p>
                        </div>
                    </div>

                    <!-- Video 2 -->
                    <div class="umef-video-card umef-video-carousel-slide">
                        <div class="umef-video-wrapper">
                            <iframe src="https://www.youtube.com/embed/qEVDffZwOtM"
                                title="Lễ Tốt Nghiệp ISTEC Paris - Hành Trình Chinh Phục"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                        <div class="umef-video-body">
                            <span class="umef-video-tag"><svg class="svg-icon fa-graduation-cap fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
                                Lễ Tốt Nghiệp</span>
                            <h3 class="umef-video-title">Hành Trình Chinh Phục Cùng ISTEC Paris</h3>
                            <p class="umef-video-desc">Ghi nhận những cột mốc rực rỡ và những khoảnh khắc nhận bằng thạc sĩ, tiến sĩ tự hào của học viên tại Pháp.</p>
                        </div>
                    </div>

                    <!-- Video 3 -->
                    <div class="umef-video-card umef-video-carousel-slide">
                        <div class="umef-video-wrapper">
                            <iframe src="https://www.youtube.com/embed/-wvOmcpqdKk"
                                title="Lễ Tốt Nghiệp ISTEC Paris - Tự Hào & Vươn Xa"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                        <div class="umef-video-body">
                            <span class="umef-video-tag"><svg class="svg-icon fa-graduation-cap fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
                                Lễ Tốt Nghiệp</span>
                            <h3 class="umef-video-title">Tự Hào & Vươn Xa Lễ Tốt Nghiệp ISTEC Paris</h3>
                            <p class="umef-video-desc">Nơi hội tụ tri thức quốc tế và những chia sẻ đầy tự hào của các tân thạc sĩ, tiến sĩ trong ngày lễ tốt nghiệp tại Paris.</p>
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
    <section class="umef-section testimonials-section" style="background:#f8fafc; padding:80px 20px;">
        <div style="max-width:1200px; margin:0 auto;">
            <div style="text-align: center; margin-bottom: 50px;">
                <span style="color: #ab0e00; text-transform: uppercase; letter-spacing: 0.15em; font-weight: 700; font-size: 0.9rem;">Chia Sẻ Của Học Viên</span>
                <h2 style="font-size: 2.5rem; font-weight: 900; color: #1e293b; margin-top: 10px;">Cảm Nhận Thực Tế</h2>
            </div>
            
            <div class="istec-testimonials-grid">
                <div style="background:#fff; padding:30px; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.03); border:1px solid #f1f5f9;">
                    <p style="color:#475569; font-style:italic; line-height:1.7; margin-bottom:20px;">
                        "Học tập chương trình liên kết của ISTEC tại Việt Nam giúp tôi cân bằng giữa công việc bận rộn tại doanh nghiệp và ước mơ nghiên cứu Tiến sĩ. Chương trình đào tạo cực kỳ bài bản và bám sát thực tiễn doanh nghiệp."
                    </p>
                    <div style="display:flex; align-items:center; gap:15px;">
                        <div style="width:48px; height:48px; border-radius:50%; background:#ab0e00; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:bold;">HN</div>
                        <div>
                            <h4 style="color:#1e293b; font-weight:700; margin:0;">Hà Minh Nam</h4>
                            <span style="color:#64748b; font-size:0.85rem;">Học viên Tiến sĩ DBA khóa 1</span>
                        </div>
                    </div>
                </div>
                
                <div style="background:#fff; padding:30px; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,0.03); border:1px solid #f1f5f9;">
                    <p style="color:#475569; font-style:italic; line-height:1.7; margin-bottom:20px;">
                        "Bằng cấp của ISTEC Paris được công nhận quốc tế và là tấm vé vàng để tôi thăng tiến lên các vị trí quản trị cao cấp. Đội ngũ giáo sư cực kỳ tận tâm và có chuyên môn sâu sắc."
                    </p>
                    <div style="display:flex; align-items:center; gap:15px;">
                        <div style="width:48px; height:48px; border-radius:50%; background:#ab0e00; color:#fff; display:flex; align-items:center; justify-content:center; font-weight:bold;">TL</div>
                        <div>
                            <h4 style="color:#1e293b; font-weight:700; margin:0;">Trần Thu Liên</h4>
                            <span style="color:#64748b; font-size:0.85rem;">Học viên Executive MBA</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Section: FAQs -->
    <section class="umef-section" id="cau-hoi-thuong-gap" style="background: #ffffff; padding: 80px 20px; border-top: 1px solid #f1f5f9;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 30px;">
                <span style="color: var(--umef-primary); text-transform: uppercase; letter-spacing: 0.15em; font-weight: 700; font-size: 0.9rem;">Giải Đáp Thắc Mắc</span>
                <h2 style="font-size: 2.5rem; font-weight: 900; color: #1e293b; margin-top: 10px;">Câu Hỏi <span>Thường Gặp</span></h2>
            </div>
            
            <div class="faq-container">
                <details class="faq-item" open>
                    <summary>Bằng cấp của ISTEC Paris có được công nhận quốc tế và tại Việt Nam không?</summary>
                    <div class="faq-content">
                        Có. ISTEC Paris là trường lớn (Grande École) được công nhận chính thức bởi Nhà nước Pháp, thành viên CGE. Các văn bằng Cử nhân (BBA) và Thạc sĩ (PGE/MBA) đều đạt chuẩn châu Âu (ECTS) và được kiểm định bởi Bộ Giáo dục & Nghiên cứu Pháp. Tại Việt Nam, văn bằng có thể thực hiện thủ tục hợp pháp hóa lãnh sự tại Đại sứ quán Việt Nam tại Pháp theo đúng quy định pháp luật hiện hành.
                    </div>
                </details>
                
                <details class="faq-item">
                    <summary>Hình thức học tập của chương trình như thế nào? Có phải đi Pháp không?</summary>
                    <div class="faq-content">
                        Chương trình áp dụng mô hình học tập kết hợp (Hybrid/Blended Learning) tối ưu cho người đi làm. Học viên chủ yếu học tập và nghiên cứu tại Việt Nam với sự hỗ trợ của các cố vấn khoa học từ IDEAS và giáo sư Pháp giảng dạy. Vào cuối khóa học, học viên được khuyến khích sang Paris tham gia Lễ tốt nghiệp và trải nghiệm học tập ngắn hạn tại cơ sở của ISTEC Pháp.
                    </div>
                </details>
                
                <details class="faq-item">
                    <summary>Chương trình Tiến sĩ DBA yêu cầu điều kiện đầu vào như thế nào?</summary>
                    <div class="faq-content">
                        Ứng viên chương trình Tiến sĩ Quản trị Kinh doanh (DBA - Bac+8) cần có bằng Thạc sĩ chuyên ngành kinh tế, quản trị hoặc tương đương, đồng thời có tối thiểu 3-5 năm kinh nghiệm làm việc ở vị trí quản lý hoặc chuyên gia. Ứng viên cũng cần tham dự phỏng vấn khoa học thuyết minh về định hướng đề tài nghiên cứu của mình.
                    </div>
                </details>
                
                <details class="faq-item">
                    <summary>Chương trình hỗ trợ ngôn ngữ thế nào cho học viên chưa tự tin tiếng Anh?</summary>
                    <div class="faq-content">
                        Mạng lưới cố vấn học thuật (Mentors) của IDEAS tại Việt Nam sẽ hỗ trợ đồng hành trực tiếp, hướng dẫn phương pháp nghiên cứu khoa học, giải thích tài liệu chuyên môn và hỗ trợ học viên trong suốt quá trình chuẩn bị các báo cáo, luận văn để tự tin trình bày trước hội đồng khoa học quốc tế.
                    </div>
                </details>
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