<?php
/**
 * Template Name: Premium DBA ISTEC Paris Template
 * Description: Trang giới thiệu chương trình Tiến sĩ Quản trị Kinh doanh (Doctorate of Business Administration - DBA) ISTEC Business School Paris
 */

// Đảm bảo WordPress core được nạp đầy đủ dù được gọi qua RewriteRule hay qua WP routing
if (!defined('ABSPATH')) {
    $wp_load = dirname(dirname(dirname(__DIR__))) . '/wp-load.php';
    if (file_exists($wp_load)) {
        require_once $wp_load;
    }
}

global $wp;

// Block unwanted old theme styles
ob_start(function ($html) {
    return preg_replace(
        '/<link[^>]+href=['"][^'"]*LANDINGPAGE_MBA\/main\.css[^'"]*['"][^>]*\/?>/i',
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

    <!-- Booking Modal stylesheet -->
    <?php
    define('BOOKING_MODAL_CSS_LOADED', true);
    $bk_css_path = get_stylesheet_directory() . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/booking-modal.min.css?v=<?php echo $bk_css_version; ?>"
        media="print" onload="this.media='all'" />

    <!-- SEO Meta Fallback -->
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title>DBA ISTEC Business School Paris | Tiến Sĩ Quản Trị Kinh Doanh Chuẩn Pháp Bac+8 WES Evaluated</title>
        <meta name="description" content="Chương trình Tiến sĩ Quản trị Kinh doanh (DBA) 100% trực tuyến cấp bằng bởi ISTEC Business School Paris. 03 năm, 180 ECTS, 03 Trợ lý AI chuyên dụng, đánh giá WES Earned Doctorate tại Hoa Kỳ & Canada." />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="DBA ISTEC Business School Paris | Chuẩn Giáo Dục Tiến Sĩ Pháp Bac+8" />
        <meta property="og:description" content="Chuyển hóa bài toán quản trị thực chiến thành mô hình chuyển giao. Bằng Tiến sĩ do ISTEC Paris trực tiếp cấp, WES đánh giá tương đương Earned Doctorate tại Mỹ và Canada." />
        <meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/istec-grand-rex-paris.jpg" />
        <meta property="og:url" content="<?php echo esc_url(home_url('/dba-istec')); ?>" />
    <?php endif; ?>

    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Course",
      "name": "Tiến sĩ Quản trị Kinh doanh (DBA) – ISTEC Business School Paris",
      "description": "Chương trình Tiến sĩ Quản trị Kinh doanh (DBA) trực tuyến 100% từ ISTEC Paris, thời gian 03 năm chính quy, 180 ECTS, 03 AI Copilot chuyên dụng, văn bằng WES Earned Doctorate.",
      "courseCode": "DBA-ISTEC-PARIS",
      "educationalLevel": "Doctorate",
      "inLanguage": "vi",
      "courseMode": "online",
      "timeRequired": "P3Y",
      "provider": [
        {
          "@type": "EducationalOrganization",
          "name": "ISTEC Business School Paris",
          "url": "https://istec.fr"
        },
        {
          "@type": "EducationalOrganization",
          "name": "Viện IDEAS",
          "url": "https://ideas.edu.vn"
        }
      ],
      "offers": {
        "@type": "Offer",
        "category": "DBA",
        "price": "13000",
        "priceCurrency": "EUR",
        "description": "Học phí trọn gói chương trình DBA ISTEC Paris: 13.000 EUR bao gồm toàn bộ học phí và nền tảng AI IDEAS Platform",
        "url": "https://ideas.edu.vn/dba-istec"
      }
    }
    </script>

    <!-- Custom CSS: Chuẩn phong cách thiết kế ISTEC Paris (Vuông vức, Clean, Parallax Fullwidth, Active Brand Green, Logo Full Màu) -->
    <style>
        :root {
            --istec-deep-green: #005C4D;      /* Xanh đậm signature của istec.fr */
            --istec-deep-hover: #004439;
            --istec-bright-green: #61A60E;    /* Xanh lá tươi ISTEC */
            --istec-teal: #00876C;            /* Xanh mòng két tiêu đề nhãn */
            --dark-main: #111827;             /* Chữ đen than */
            --dark-sub: #374151;              /* Chữ nội dung */
            --dark-muted: #6b7280;            /* Chữ phụ */
            --border-light: #e5e7eb;          /* Viền mảnh thanh lịch */
            --border-subtle: #f3f4f6;
            --bg-page: #ffffff;
            --bg-alt: #f9fafb;
            --radius-square: 4px;             /* Phong cách vuông vức chuẩn ISTEC */
            --shadow-card: 0 4px 20px rgba(0, 0, 0, 0.05);
            --shadow-hover: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        #global-left-popup-banner {
            display: none !important;
        }

        body, button, input, select, textarea, h1, h2, h3, h4, h5, h6, p, a, span {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
            box-sizing: border-box;
        }

        button, a, input[type="submit"], input[type="button"], select, .btn-tab-square, .btn-slider-square, .expert-nav-item, .acc-square-header {
            cursor: pointer !important;
        }

        /* ── HERO SECTION ── */
        .istec-hero-container {
            padding: 110px 0 65px;
            background: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .istec-decor-bg {
            position: absolute;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
            z-index: 1;
        }

        .ambient-glow-green {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(97, 166, 14, 0.12) 0%, rgba(0, 92, 77, 0.05) 50%, transparent 70%);
            filter: blur(40px);
            pointer-events: none;
        }

        .istec-decor-item {
            position: absolute;
            pointer-events: none;
        }

        @keyframes spinSlow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .anim-spin-slow {
            animation: spinSlow 50s linear infinite;
        }

        @keyframes floatAnim {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .anim-float {
            animation: floatAnim 6s ease-in-out infinite;
        }

        .istec-hero-flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 52px;
            margin-bottom: 50px;
            position: relative;
            z-index: 2;
        }

        .istec-hero-main-content {
            flex: 1;
            min-width: 0;
            padding-top: 0;
        }

        .istec-spec-box {
            flex: 0 0 350px;
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 30px 24px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.06);
            align-self: center;
            margin-top: 24px;
        }

        .spec-item {
            margin-bottom: 18px;
        }

        .spec-item:last-child {
            margin-bottom: 0;
        }

        .spec-label {
            font-size: 0.74rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--istec-teal);
            margin-bottom: 4px;
        }

        .spec-value {
            font-size: 0.94rem;
            font-weight: 700;
            color: var(--dark-main);
            line-height: 1.45;
        }

        .spec-divider {
            height: 1px;
            background: var(--border-subtle);
            margin: 14px 0;
        }

        .istec-hero-headline {
            font-size: clamp(2rem, 3.2vw, 2.75rem);
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: 12px;
            letter-spacing: -0.02em;
        }

        .istec-hero-headline .hl-dark {
            color: var(--dark-main);
        }

        .istec-hero-headline .hl-green {
            color: var(--istec-deep-green);
        }

        .istec-hero-sub-title {
            font-size: 1.12rem;
            font-weight: 700;
            color: var(--istec-bright-green);
            margin-bottom: 20px;
            text-wrap: balance;
        }

        .istec-hero-paragraph {
            font-size: 1.02rem;
            color: var(--dark-sub);
            line-height: 1.7;
            margin-bottom: 28px;
            max-width: 780px;
        }

        .btn-istec-square-dark {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #1a1a1a;
            color: #ffffff !important;
            padding: 13px 26px;
            border-radius: var(--radius-square);
            font-size: 0.95rem;
            font-weight: 700;
            text-decoration: none;
            border: none;
            transition: all 0.25s ease;
        }

        .btn-istec-square-dark:hover {
            background: var(--istec-deep-green);
            color: #ffffff !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0, 92, 77, 0.25);
        }

        .btn-istec-square-green {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--istec-bright-green);
            color: #ffffff !important;
            padding: 13px 26px;
            border-radius: var(--radius-square);
            font-size: 0.95rem;
            font-weight: 700;
            text-decoration: none;
            border: none;
            transition: all 0.25s ease;
        }

        .btn-istec-square-green:hover {
            background: #4d860a;
            color: #ffffff !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(97, 166, 14, 0.3);
        }

        .btn-istec-square-outline {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: transparent;
            color: var(--istec-deep-green) !important;
            padding: 12px 24px;
            border-radius: var(--radius-square);
            font-size: 0.95rem;
            font-weight: 700;
            text-decoration: none;
            border: 1.5px solid var(--istec-deep-green);
            transition: all 0.25s ease;
        }

        .btn-istec-square-outline:hover {
            background: var(--istec-deep-green);
            color: #ffffff !important;
            transform: translateY(-2px);
        }

        .istec-hero-btn-group {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        /* ── KHỐI CHỨNG NHẬN CGE & DÀN LOGO KIỂM ĐỊNH TẠI HERO ── */
        .istec-hero-trust-block {
            margin-top: 24px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .istec-hero-cge-card {
            display: flex;
            align-items: center;
            gap: 16px;
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid rgba(0, 92, 77, 0.16);
            border-left: 4px solid var(--istec-deep-green);
            border-radius: var(--radius-square);
            padding: 14px 18px;
            box-shadow: 0 4px 18px rgba(0, 44, 36, 0.05);
        }

        .hero-cge-logo-box {
            flex: 0 0 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            padding: 6px;
            border-radius: 6px;
            border: 1px solid rgba(0, 0, 0, 0.06);
        }

        .hero-cge-img {
            max-width: 100%;
            height: auto;
            max-height: 44px;
            object-fit: contain;
            display: block;
        }

        .hero-cge-text-box {
            flex: 1;
            min-width: 0;
        }

        .hero-cge-title {
            font-size: 0.88rem;
            font-weight: 800;
            color: var(--istec-deep-green);
            letter-spacing: 0.02em;
            margin-bottom: 5px;
            line-height: 1.35;
        }

        .hero-cge-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .hero-cge-list li {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: 0.82rem;
            color: var(--dark-sub);
            line-height: 1.45;
        }

        .hero-cge-list li svg {
            flex-shrink: 0;
            color: var(--istec-bright-green);
            margin-top: 2px;
        }

        .istec-hero-acc-wrap {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 12px 18px;
        }

        .hero-acc-header {
            margin-bottom: 8px;
        }

        .hero-acc-label {
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--dark-muted);
        }

        .hero-acc-logos-strip {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .hero-acc-badge {
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-acc-badge img {
            max-height: 30px;
            width: auto;
            object-fit: contain;
            filter: grayscale(30%);
            opacity: 0.85;
            transition: all 0.2s ease;
        }

        .hero-acc-badge:hover img {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.05);
        }

        .badge-wes-text {
            background: #0f172a;
            color: #ffffff;
            font-size: 0.72rem;
            font-weight: 800;
            padding: 5px 9px;
            border-radius: 3px;
            letter-spacing: 0.04em;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .badge-wes-text span {
            color: #38bdf8;
        }

        /* ── REAL PARALLAX FULLWIDTH BANNER ── */
        .istec-real-parallax-wrap {
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
            height: 480px;
            overflow: hidden;
            display: flex;
            align-items: flex-end;
            padding: 36px 60px;
            box-sizing: border-box;
            background: #0f172a;
        }

        .istec-parallax-img-holder {
            position: absolute;
            top: -35%;
            left: 0;
            width: 100%;
            height: 170%;
            pointer-events: none;
            overflow: hidden;
        }

        .parallax-inner-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center 30%;
            display: block;
            will-change: transform;
            transform: translate3d(0, 0, 0);
            transition: transform 0.08s ease-out;
        }

        .parallax-caption-tag {
            position: relative;
            z-index: 2;
            background: rgba(17, 24, 39, 0.82);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            color: #ffffff;
            padding: 10px 20px;
            border-radius: var(--radius-square);
            font-size: 0.85rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.25);
        }

        /* ── SECTIONS ── */
        .istec-section-box {
            padding: 80px 0;
            background: #ffffff;
            position: relative;
        }

        .istec-section-box.bg-alt {
            background: var(--bg-alt);
            border-top: 1px solid var(--border-light);
            border-bottom: 1px solid var(--border-light);
        }

        .istec-label-top {
            font-size: 0.8rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--istec-teal);
            margin-bottom: 8px;
            display: inline-block;
        }

        .istec-heading-large {
            font-size: clamp(1.6rem, 2.5vw, 2.15rem);
            font-weight: 800;
            color: var(--dark-main);
            margin-bottom: 16px;
            line-height: 1.3;
            letter-spacing: -0.015em;
            text-wrap: balance;
        }

        .istec-body-lead {
            font-size: 1rem;
            color: var(--dark-sub);
            line-height: 1.65;
            max-width: 820px;
        }

        /* ── STATS STRIP ── */
        .istec-stats-strip {
            background: #111827;
            color: #ffffff;
            padding: 50px 0;
        }

        .stats-grid-5 {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 24px;
        }

        .stat-item {
            text-align: center;
            border-right: 1px solid rgba(255, 255, 255, 0.12);
            padding: 0 16px;
        }

        .stat-item:last-child {
            border-right: none;
        }

        .stat-strip-num {
            font-size: clamp(2rem, 3vw, 2.8rem);
            font-weight: 800;
            color: var(--istec-bright-green);
            line-height: 1.1;
            margin-bottom: 6px;
        }

        .stat-strip-label {
            font-size: 0.84rem;
            font-weight: 600;
            color: #94a3b8;
            line-height: 1.4;
        }

        /* ── CARDS VUÔNG VỨC ── */
        .istec-square-card {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 28px 24px;
            box-shadow: var(--shadow-card);
            transition: all 0.25s ease;
            position: relative;
        }

        .istec-square-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-hover);
            border-color: rgba(0, 92, 77, 0.3);
        }

        .card-num-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background: rgba(0, 92, 77, 0.08);
            color: var(--istec-deep-green);
            font-size: 0.95rem;
            font-weight: 800;
            border-radius: var(--radius-square);
            margin-bottom: 16px;
        }

        .card-title-bold {
            font-size: 1.12rem;
            font-weight: 800;
            color: var(--dark-main);
            margin-bottom: 12px;
            line-height: 1.35;
        }

        .card-text-muted {
            font-size: 0.92rem;
            color: var(--dark-sub);
            line-height: 1.6;
            margin: 0;
        }

        /* ── 2 PHƯƠNG ÁN ĐỀ TÀI (COMPARISON) ── */
        .topic-plan-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
            margin-top: 36px;
        }

        .topic-plan-card {
            background: #ffffff;
            border: 2px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 36px 32px;
            position: relative;
            transition: all 0.3s ease;
        }

        .topic-plan-card.highlight {
            border-color: var(--istec-deep-green);
            background: #fbfdfc;
        }

        .topic-plan-card:hover {
            box-shadow: var(--shadow-hover);
            transform: translateY(-3px);
        }

        .topic-badge {
            display: inline-block;
            background: var(--istec-deep-green);
            color: #ffffff;
            font-size: 0.78rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            padding: 6px 14px;
            border-radius: var(--radius-square);
            margin-bottom: 18px;
        }

        .topic-badge.alt {
            background: var(--istec-bright-green);
        }

        /* ── 3 AI AGENTS SECTION (AI NATIVE COPILOT) ── */
        .ai-agents-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 36px;
        }

        .ai-agent-card {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-top: 4px solid var(--istec-deep-green);
            border-radius: var(--radius-square);
            padding: 32px 26px;
            box-shadow: var(--shadow-card);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .ai-agent-card:nth-child(2) {
            border-top-color: var(--istec-bright-green);
        }

        .ai-agent-card:nth-child(3) {
            border-top-color: #0284c7;
        }

        .ai-agent-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-hover);
        }

        .ai-agent-tag {
            font-size: 0.74rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--istec-teal);
            margin-bottom: 6px;
        }

        .ai-agent-name {
            font-size: 1.16rem;
            font-weight: 800;
            color: var(--dark-main);
            margin-bottom: 12px;
            line-height: 1.35;
        }

        .ai-agent-features {
            list-style: none;
            padding: 0;
            margin: 16px 0 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .ai-agent-features li {
            font-size: 0.88rem;
            color: var(--dark-sub);
            line-height: 1.5;
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

        .ai-agent-features li svg {
            flex-shrink: 0;
            color: var(--istec-bright-green);
            margin-top: 3px;
        }

        /* ── INTERACTIVE CURRICULUM TABS (3 GIAI ĐOẠN 180 ECTS) ── */
        .stage-tabs-nav {
            display: flex;
            gap: 12px;
            border-bottom: 2px solid var(--border-light);
            margin-bottom: 32px;
            overflow-x: auto;
            padding-bottom: 2px;
        }

        .stage-tab-btn {
            background: none;
            border: none;
            padding: 16px 24px;
            font-size: 1rem;
            font-weight: 700;
            color: var(--dark-muted);
            border-bottom: 3px solid transparent;
            margin-bottom: -2px;
            transition: all 0.2s ease;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stage-tab-btn.active {
            color: var(--istec-deep-green);
            border-bottom-color: var(--istec-deep-green);
        }

        .stage-tab-btn .tab-badge {
            font-size: 0.74rem;
            padding: 2px 8px;
            background: #e5e7eb;
            color: var(--dark-main);
            border-radius: 20px;
            font-weight: 800;
        }

        .stage-tab-btn.active .tab-badge {
            background: var(--istec-deep-green);
            color: #ffffff;
        }

        .stage-panel {
            display: none;
        }

        .stage-panel.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(6px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .stage-card-main {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 36px 32px;
            box-shadow: var(--shadow-card);
        }

        .rubric-grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-top: 24px;
        }

        .rubric-card {
            background: #f8fafc;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 20px 18px;
            text-align: left;
        }

        .rubric-percent {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--istec-deep-green);
            line-height: 1;
            margin-bottom: 6px;
        }

        .rubric-title {
            font-size: 0.92rem;
            font-weight: 800;
            color: var(--dark-main);
            margin-bottom: 8px;
            line-height: 1.35;
        }

        .rubric-desc {
            font-size: 0.82rem;
            color: var(--dark-sub);
            line-height: 1.5;
            margin: 0;
        }

        /* ── FACULTY / EXPERT SECTION ── */
        .faculty-tabs-nav {
            display: flex;
            gap: 12px;
            margin-bottom: 28px;
            justify-content: center;
        }

        .faculty-tab-btn {
            background: #f1f5f9;
            border: 1px solid var(--border-light);
            padding: 10px 22px;
            font-size: 0.92rem;
            font-weight: 700;
            color: var(--dark-main);
            border-radius: var(--radius-square);
            transition: all 0.2s ease;
        }

        .faculty-tab-btn.active {
            background: var(--istec-deep-green);
            color: #ffffff;
            border-color: var(--istec-deep-green);
        }

        .faculty-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .faculty-card {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 22px 18px;
            text-align: center;
            box-shadow: var(--shadow-card);
            transition: all 0.25s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .faculty-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-hover);
            border-color: rgba(0, 92, 77, 0.3);
        }

        .faculty-avatar-wrap {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            overflow: hidden;
            border: 3px solid #f1f5f9;
            margin-bottom: 16px;
            background: #e2e8f0;
            flex-shrink: 0;
        }

        .faculty-avatar-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .faculty-name {
            font-size: 1rem;
            font-weight: 800;
            color: var(--dark-main);
            margin-bottom: 4px;
            line-height: 1.3;
        }

        .faculty-role {
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--istec-teal);
            margin-bottom: 8px;
            line-height: 1.35;
        }

        .faculty-desc {
            font-size: 0.8rem;
            color: var(--dark-muted);
            line-height: 1.45;
            margin: 0;
        }

        /* ── DIPLOMA & GRADUATION ── */
        .diploma-showcase-grid {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 40px;
            align-items: center;
        }

        .diploma-img-card {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 16px;
            box-shadow: var(--shadow-hover);
        }

        .diploma-img-card img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 2px;
        }

        .grad-gallery-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-top: 24px;
        }

        .grad-gallery-item {
            height: 180px;
            border-radius: var(--radius-square);
            overflow: hidden;
            box-shadow: var(--shadow-card);
        }

        .grad-gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
        }

        .grad-gallery-item:hover img {
            transform: scale(1.05);
        }

        /* ── TUITION BOX ── */
        .tuition-square-card {
            max-width: 860px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            overflow: hidden;
            box-shadow: var(--shadow-card);
        }

        .tuition-header-dark {
            background: #111827;
            color: #ffffff;
            padding: 40px 32px;
            text-align: center;
        }

        .tuition-price-headline {
            font-size: clamp(2.4rem, 4vw, 3.4rem);
            font-weight: 800;
            color: var(--istec-bright-green);
            line-height: 1.1;
            margin: 10px 0;
        }

        .tuition-body-pad {
            padding: 40px 36px;
        }

        .tuition-list {
            list-style: none;
            padding: 0;
            margin: 0 0 28px;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .tuition-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 0.95rem;
            color: var(--dark-sub);
            line-height: 1.5;
        }

        .tuition-list li svg {
            flex-shrink: 0;
            color: var(--istec-bright-green);
            margin-top: 3px;
        }

        /* ── ACCORDION SQUARE ── */
        .acc-square-box {
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            margin-bottom: 12px;
            overflow: hidden;
            background: #ffffff;
            transition: border-color 0.2s ease;
        }

        .acc-square-box.open {
            border-color: var(--istec-deep-green);
        }

        .acc-square-header {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 24px;
            background: #ffffff;
            border: none;
            text-align: left;
            transition: background 0.2s ease;
        }

        .acc-square-header svg {
            transition: transform 0.25s ease, color 0.25s ease;
            flex-shrink: 0;
        }

        .acc-square-box.open .acc-square-header svg {
            transform: rotate(180deg);
            color: var(--istec-deep-green);
        }

        .acc-square-header:hover {
            background: #f8fafc;
        }

        .acc-square-title {
            font-size: 1.02rem;
            font-weight: 800;
            color: var(--dark-main);
            padding-right: 16px;
            line-height: 1.4;
        }

        .acc-square-panel {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s ease;
            background: #ffffff;
        }

        .acc-square-content {
            padding: 0 24px 22px;
            font-size: 0.92rem;
            color: var(--dark-sub);
            line-height: 1.65;
        }

        /* ── FORM CONSULTATION ── */
        .consult-form-wrap {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 36px 32px;
            box-shadow: var(--shadow-card);
        }

        .form-group-custom {
            margin-bottom: 18px;
        }

        .form-group-custom label {
            display: block;
            font-size: 0.84rem;
            font-weight: 700;
            color: var(--dark-main);
            margin-bottom: 6px;
        }

        .form-input-custom {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            font-size: 0.92rem;
            color: var(--dark-main);
            outline: none;
            transition: border-color 0.2s ease;
        }

        .form-input-custom:focus {
            border-color: var(--istec-deep-green);
            box-shadow: 0 0 0 3px rgba(0, 92, 77, 0.1);
        }

        /* ── APP BACK TO TOP ── */
        .app-back-to-top {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 99;
            background: #111827;
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: var(--radius-square);
            padding: 10px 14px;
            font-size: 0.8rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            transition: all 0.2s ease;
            opacity: 0;
            visibility: hidden;
        }

        .app-back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .app-back-to-top:hover {
            background: var(--istec-deep-green);
            transform: translateY(-2px);
        }

        /* ── SCROLL REVEAL ── */
        .istec-reveal {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .istec-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 1024px) {
            .istec-hero-container {
                padding-top: 130px !important;
            }
            .istec-hero-flex {
                flex-direction: column !important;
                gap: 32px;
            }
            .istec-spec-box {
                flex: none;
                width: 100%;
                margin-top: 0 !important;
            }
            .stats-grid-5 {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
            .stat-item:nth-child(2) {
                border-right: none;
            }
            .topic-plan-grid {
                grid-template-columns: 1fr;
            }
            .ai-agents-grid {
                grid-template-columns: 1fr;
            }
            .rubric-grid-3 {
                grid-template-columns: 1fr;
            }
            .faculty-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .diploma-showcase-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .stats-grid-5 {
                grid-template-columns: 1fr;
            }
            .stat-item {
                border-right: none;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                padding-bottom: 16px;
            }
            .faculty-grid {
                grid-template-columns: 1fr;
            }
            .istec-hero-btn-group {
                flex-direction: column;
            }
            .btn-istec-square-dark, .btn-istec-square-green, .btn-istec-square-outline {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>

    <!-- ══ HEADER ĐỒNG BỘ CHUẨN IDEAS ══ -->
    <?php get_template_part('shared-header'); ?>

    <!-- ══ 1. HERO SECTION ══ -->
    <section class="istec-hero-container">
        <!-- SVG Decor Background -->
        <div class="istec-decor-bg" aria-hidden="true">
            <div class="ambient-glow-green" style="width: 520px; height: 520px; top: -140px; left: -60px;"></div>
            <div class="ambient-glow-green" style="width: 380px; height: 380px; bottom: -80px; right: -100px; opacity: 0.6;"></div>

            <div class="istec-decor-item anim-spin-slow" style="top: -80px; left: -80px; width: 420px; height: 420px; opacity: 0.12;">
                <svg viewBox="0 0 420 420" fill="none" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <circle cx="210" cy="210" r="200" stroke="#005C4D" stroke-width="1.2" stroke-dasharray="6 6"/>
                    <circle cx="210" cy="210" r="160" stroke="#61A60E" stroke-width="1.5"/>
                    <circle cx="210" cy="210" r="110" stroke="#005C4D" stroke-width="1" stroke-dasharray="3 4"/>
                    <circle cx="210" cy="210" r="60" stroke="#61A60E" stroke-width="1"/>
                </svg>
            </div>

            <div class="istec-decor-item anim-float" style="top: 160px; left: 28%; opacity: 0.18;">
                <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
                    <path d="M14 0v28M0 14h28" stroke="#61A60E" stroke-width="1.5"/>
                    <circle cx="14" cy="14" r="5" stroke="#61A60E" stroke-width="1" fill="none"/>
                </svg>
            </div>
        </div>

        <div class="container">
            <div class="istec-hero-flex istec-reveal is-visible">
                <!-- Cột trái: Nội dung chính -->
                <div class="istec-hero-main-content">
                    <div style="margin-bottom: 18px;">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/logo-istec-paris.svg" 
                             alt="ISTEC Business School Paris Logo" 
                             style="height: 68px; width: auto; display: block;" />
                    </div>

                    <h1 class="istec-hero-headline">
                        <span class="hl-dark">DBA</span> <span class="hl-green">Doctorate of Business Administration</span>
                    </h1>

                    <div class="istec-hero-sub-title">
                        Kiến tạo Tri thức Quản trị Thực chiến & Nâng tầm Nhà Tư tưởng Doanh nghiệp (Management Thought Leader)
                    </div>

                    <p class="istec-hero-paragraph">
                        Chương trình chuyển hóa các vấn đề quản trị thực tế thành những mô hình quản trị có tính khái quát cao, có khả năng chuyển giao cho các doanh nghiệp tương đồng và đóng góp tri thức mới cho cộng đồng. Văn bằng Tiến sĩ DBA do Istec Business School Paris trực tiếp cấp và được WES đánh giá tương đương bằng <strong>"Earned Doctorate"</strong> tại Hoa Kỳ và Canada.
                    </p>

                    <div class="istec-hero-btn-group">
                        <a href="javascript:void(0);" onclick="if(typeof window.openRegModal === 'function') { event.preventDefault(); window.openRegModal('Đăng ký xét tuyển DBA ISTEC'); } else if(typeof window.showform === 'function') { event.preventDefault(); window.showform('Đăng ký xét tuyển DBA ISTEC'); } else { var m = document.getElementById('reg-modal'); if(m){ m.style.display='flex'; setTimeout(function(){ m.classList.add('open'); }, 10); } }" class="btn-istec-square-dark">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            <span>Đăng ký xét tuyển DBA</span>
                        </a>
                        <a href="#khung-dao-tao" class="btn-istec-square-green">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 9l-7 7-7-7"/></svg>
                            <span>Khung đào tạo 3 năm</span>
                        </a>
                        <a href="#tu-van" class="btn-istec-square-outline">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M7 10l5 5 5-5M12 15V3"/></svg>
                            <span>Tải Brochure [2026]</span>
                        </a>
                    </div>

                    <!-- KHỐI CHỨNG NHẬN CGE & DÀN LOGO KIỂM ĐỊNH -->
                    <div class="istec-hero-trust-block">
                        <div class="istec-hero-cge-card">
                            <div class="hero-cge-logo-box">
                                <img src="https://istec.fr/wp-content/uploads/2025/07/CGE.webp" 
                                     alt="Conférence des Grandes Écoles (CGE)" 
                                     class="hero-cge-img" />
                            </div>
                            <div class="hero-cge-text-box">
                                <div class="hero-cge-title">GRANDE ÉCOLE – CHUẨN GIÁO DỤC ĐẠI HỌC PHÁP • PRO BAC+8</div>
                                <ul class="hero-cge-list">
                                    <li>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8"><polyline points="20 6 9 17 4 12"/></svg>
                                        <span>Bộ Giáo dục Đại học và Nghiên cứu Pháp công nhận Visa Bac+5 & Grade de Master</span>
                                    </li>
                                    <li>
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8"><polyline points="20 6 9 17 4 12"/></svg>
                                        <span>Đánh giá WES (Hoa Kỳ & Canada): tương đương học vị <strong>Earned Doctorate</strong></span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Dàn Logo Kiểm Định & Đánh Giá Quốc Tế -->
                        <div class="istec-hero-acc-wrap">
                            <div class="hero-acc-header">
                                <span class="hero-acc-label">HỆ THỐNG CÔNG NHẬN, ĐÁNH GIÁ & KIỂM ĐỊNH QUỐC TẾ:</span>
                            </div>
                            <div class="hero-acc-logos-strip">
                                <div class="hero-acc-badge" title="WES Evaluated Earned Doctorate (USA & Canada)">
                                    <div class="badge-wes-text">WES <span>Earned Doctorate</span></div>
                                </div>
                                <div class="hero-acc-badge" title="Conférence des Grandes Écoles (CGE)">
                                    <img src="https://istec.fr/wp-content/uploads/2025/07/CGE.webp" alt="CGE" />
                                </div>
                                <div class="hero-acc-badge" title="CEFDG France">
                                    <img src="https://istec.fr/wp-content/uploads/2026/02/CEFDG-1.webp" alt="CEFDG France" />
                                </div>
                                <div class="hero-acc-badge" title="France Compétences RNCP Level 7">
                                    <img src="https://istec.fr/wp-content/uploads/2025/02/logo-france-competences.30a014-1.png" alt="France Compétences RNCP" />
                                </div>
                                <div class="hero-acc-badge" title="AACSB Member">
                                    <img src="https://istec.fr/wp-content/uploads/2025/07/AACSB.webp" alt="AACSB Member" />
                                </div>
                                <div class="hero-acc-badge" title="EFMD Global Member">
                                    <img src="https://istec.fr/wp-content/uploads/2026/01/EFMD-Logo-2-300x122-1.png" alt="EFMD Global" />
                                </div>
                                <div class="hero-acc-badge" title="Campus France">
                                    <img src="https://istec.fr/wp-content/uploads/2026/02/campus-france-logo.png" alt="Campus France" />
                                </div>
                                <div class="hero-acc-badge" title="Qualiopi France">
                                    <img src="https://istec.fr/wp-content/uploads/2026/02/qualiopi-logo-png.png" alt="Qualiopi" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cột phải: Hộp thông số nổi (Spec Box) -->
                <div class="istec-spec-box">
                    <div class="spec-item">
                        <div class="spec-label">ACCESS • HÌNH THỨC XÉT TUYỂN</div>
                        <div class="spec-value">Hồ sơ học thuật & Phỏng vấn đề tài với Hội đồng</div>
                    </div>

                    <div class="spec-divider"></div>

                    <div class="spec-item">
                        <div class="spec-label">RHYTHM • THỜI GIAN ĐÀO TẠO</div>
                        <div class="spec-value">03 Năm chính quy • 100% Trực tuyến linh hoạt cho Lãnh đạo</div>
                    </div>

                    <div class="spec-divider"></div>

                    <div class="spec-item">
                        <div class="spec-label">CREDITS • TÍN CHỈ CHUẨN CHÂU ÂU</div>
                        <div class="spec-value">180 ECTS (03 Giai đoạn: Research • Fieldwork • Defense)</div>
                    </div>

                    <div class="spec-divider"></div>

                    <div class="spec-item">
                        <div class="spec-label">DIPLOMA • VĂN BẰNG TỐT NGHIỆP</div>
                        <div class="spec-value">Doctorate of Business Administration (Pro – Bac+8)</div>
                    </div>

                    <div class="spec-divider"></div>

                    <div class="spec-item">
                        <div class="spec-label">GLOBAL EVALUATION • QUỐC TẾ</div>
                        <div class="spec-value">WES Đánh giá "Earned Doctorate" (Mỹ & Canada)</div>
                    </div>

                    <div class="spec-divider"></div>

                    <div class="spec-item">
                        <div class="spec-label">TUITION • HỌC PHÍ TRỌN GÓI</div>
                        <div class="spec-value" style="color: var(--istec-deep-green); font-size: 1.05rem;">
                            13.000 EUR (Bao gồm AI Copilot 24/7 & Hỗ trợ IDEAS)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ PARALLAX FULLWIDTH BANNER ══ -->
    <div class="istec-real-parallax-wrap">
        <div class="istec-parallax-img-holder">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/istec-grand-rex-paris.jpg" 
                 alt="ISTEC Paris Graduation Grand Rex" 
                 class="parallax-inner-img" 
                 id="istecParallaxImg" />
        </div>
        <div class="container" style="position: relative; z-index: 2;">
            <span class="parallax-caption-tag">
                ISTEC PARIS – GRANDE ÉCOLE DE COMMERCE ET DE MARKETING DEPUIS 1961
            </span>
        </div>
    </div>

    <!-- ══ STATS STRIP ══ -->
    <section class="istec-stats-strip">
        <div class="container">
            <div class="stats-grid-5">
                <div class="stat-item">
                    <div class="stat-strip-num" data-counter-target="1961">1961</div>
                    <div class="stat-strip-label">Năm thành lập tại Paris, Pháp</div>
                </div>
                <div class="stat-item">
                    <div class="stat-strip-num" data-counter-target="8000" data-counter-suffix="+">8.000+</div>
                    <div class="stat-strip-label">Cựu học viên toàn cầu</div>
                </div>
                <div class="stat-item">
                    <div class="stat-strip-num" data-counter-target="3500" data-counter-suffix="+">3.500+</div>
                    <div class="stat-strip-label">Doanh nghiệp đối tác quốc tế</div>
                </div>
                <div class="stat-item">
                    <div class="stat-strip-num" data-counter-target="180">180</div>
                    <div class="stat-strip-label">Tín chỉ ECTS chuẩn Châu Âu</div>
                </div>
                <div class="stat-item">
                    <div class="stat-strip-num" data-counter-target="3">03</div>
                    <div class="stat-strip-label">Trợ lý AI Copilot chuyên dụng</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 2. GIỚI THIỆU ISTEC & THÔNG ĐIỆP BAN LÃNH ĐẠO ══ -->
    <section class="istec-section-box">
        <div class="container">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 52px; align-items: center;" class="istec-reveal">
                <div>
                    <span class="istec-label-top">VỀ TRƯỜNG KINH DOANH ISTEC PARIS</span>
                    <h2 class="istec-heading-large">
                        Grande École với hơn 65 năm đào tạo Kinh doanh & Quản trị tại Paris
                    </h2>
                    <p class="istec-body-lead" style="margin-bottom: 20px;">
                        Istec Business School là trường kinh doanh tư thục được Nhà nước Pháp công nhận, thành lập năm 1961 tại Paris. Là một Grande École danh giá, Istec sở hữu vị thế nổi bật trong hệ thống giáo dục quản trị với Programme Grande École (PGE), được Bộ Giáo dục Đại học và Nghiên cứu Pháp cấp Visa Bac+5 và Grade de Master. Trường đồng thời là thành viên chính thức của <strong>Conférence des Grandes Écoles (CGE)</strong>.
                    </p>
                    <div style="display: flex; flex-direction: column; gap: 12px; margin-top: 24px;">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <div style="width: 8px; height: 8px; background: var(--istec-bright-green); border-radius: 2px;"></div>
                            <span style="font-weight: 700; color: var(--dark-main); font-size: 0.94rem;">PARIS, FRANCE: Hệ sinh thái giáo dục và kinh doanh tại trung tâm châu Âu.</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <div style="width: 8px; height: 8px; background: var(--istec-bright-green); border-radius: 2px;"></div>
                            <span style="font-weight: 700; color: var(--dark-main); font-size: 0.94rem;">EXECUTIVE & DOCTORAL EDUCATION: Đào tạo đến bậc Tiến sĩ Pro - Bac+8 cho lãnh đạo.</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <div style="width: 8px; height: 8px; background: var(--istec-bright-green); border-radius: 2px;"></div>
                            <span style="font-weight: 700; color: var(--dark-main); font-size: 0.94rem;">INTERNATIONAL OUTLOOK: Mạng lưới học thuật kết nối người học toàn cầu.</span>
                        </div>
                    </div>
                </div>

                <!-- Thông điệp từ Jean-Nicolas MANNONI -->
                <div style="background: #f8fafc; border: 1px solid var(--border-light); border-left: 5px solid var(--istec-deep-green); border-radius: var(--radius-square); padding: 36px 32px; box-shadow: var(--shadow-card);">
                    <div style="display: flex; align-items: center; gap: 18px; margin-bottom: 20px;">
                        <div style="width: 72px; height: 72px; border-radius: 50%; overflow: hidden; border: 2px solid var(--istec-deep-green); flex-shrink: 0;">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p4_img2_437x475.jpeg" 
                                 alt="Jean-Nicolas MANNONI" 
                                 style="width: 100%; height: 100%; object-fit: cover;" />
                        </div>
                        <div>
                            <div style="font-size: 1.1rem; font-weight: 800; color: var(--dark-main);">Jean-Nicolas MANNONI</div>
                            <div style="font-size: 0.85rem; font-weight: 700; color: var(--istec-teal);">Tổng Giám đốc Istec Business School Paris</div>
                        </div>
                    </div>
                    <blockquote style="margin: 0; font-size: 1rem; font-style: italic; color: var(--dark-sub); line-height: 1.7; border-left: none; padding: 0;">
                        "Donner à chacun les moyens de ses ambitions – Kiến tạo nền tảng để mỗi người chạm tới những tham vọng của mình. Phương pháp giáo dục của Istec được xây dựng trên triết lý <strong>Learning through Action – Học qua hành động</strong>, kết hợp nền tảng học thuật với trải nghiệm thực tiễn trong môi trường doanh nghiệp."
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 3. ĐỐI TƯỢNG & 5 TRỤ CỘT MỤC TIÊU ══ -->
    <section class="istec-section-box bg-alt">
        <div class="container">
            <div style="text-align: center; max-width: 820px; margin: 0 auto 48px;" class="istec-reveal">
                <span class="istec-label-top">CHƯƠNG TRÌNH NÀY DÀNH CHO AI?</span>
                <h2 class="istec-heading-large">
                    Nâng tầm từ Nhà Điều hành Chiến lược đến Nhà Tư tưởng Quản trị (Thought Leader)
                </h2>
                <p class="istec-body-lead" style="margin: 0 auto;">
                    DBA Istec được thiết kế dành cho nhà quản lý cấp cao, giám đốc, chủ doanh nghiệp và chuyên gia, mong muốn chuyển hóa các bài toán thực chiến thành khung quản trị hệ thống, đồng thời nâng tầm vị thế thành chuyên gia tư vấn và nhà tư tưởng quản trị.
                </p>
            </div>

            <!-- 5 Khối Trụ Cột Mục Tiêu -->
            <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 20px;" class="istec-reveal">
                <div class="istec-square-card">
                    <div class="card-num-badge">01</div>
                    <div class="card-title-bold">Nghiên cứu Chuyên sâu</div>
                    <p class="card-text-muted">Phát triển năng lực nghiên cứu khoa học để phân tích những vấn đề phức tạp trong quản trị và kinh doanh.</p>
                </div>
                <div class="istec-square-card">
                    <div class="card-num-badge">02</div>
                    <div class="card-title-bold">Tư duy Phản biện</div>
                    <p class="card-text-muted">Biết đặt câu hỏi, đánh giá bằng chứng và thách thức những giả định để tìm ra góc nhìn mới đột phá.</p>
                </div>
                <div class="istec-square-card">
                    <div class="card-num-badge">03</div>
                    <div class="card-title-bold">Kết nối Thực tiễn</div>
                    <p class="card-text-muted">Đưa phương pháp nghiên cứu vào bài toán thực tế, tạo ra những hiểu biết và giải pháp có giá trị cho tổ chức.</p>
                </div>
                <div class="istec-square-card">
                    <div class="card-num-badge">04</div>
                    <div class="card-title-bold">Kiến tạo Tri thức</div>
                    <p class="card-text-muted">Phát triển những lập luận, phát hiện và đóng góp mô hình mới có khả năng chuyển giao rộng rãi.</p>
                </div>
                <div class="istec-square-card">
                    <div class="card-num-badge">05</div>
                    <div class="card-title-bold">Nâng tầm Chuyên gia</div>
                    <p class="card-text-muted">Trở thành chuyên gia có khả năng nghiên cứu, tư vấn độc lập và tạo tầm ảnh hưởng trong lĩnh vực của mình.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 4. BỐN ĐIỂM KHÁC BIỆT ĐỘC QUYỀN CỦA DBA ISTEC ══ -->
    <section class="istec-section-box">
        <div class="container">
            <div style="text-align: center; max-width: 820px; margin: 0 auto 48px;" class="istec-reveal">
                <span class="istec-label-top">TẠI SAO NÊN CHỌN DBA ISTEC PARIS?</span>
                <h2 class="istec-heading-large">
                    4 Giá Trị Đột Phá Khác Biệt Định Hình Vị Thế Nghiên Cứu Sinh
                </h2>
                <p class="istec-body-lead" style="margin: 0 auto;">
                    Sự kết hợp hoàn hảo giữa chuẩn mực học thuật Châu Âu, công nghệ AI tối tân và tính ứng dụng trực tiếp cho bài toán doanh nghiệp.
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px;" class="istec-reveal">
                <div class="istec-square-card" style="border-top: 4px solid var(--istec-deep-green);">
                    <div style="font-size: 1.8rem; margin-bottom: 14px;">🤖</div>
                    <div class="card-title-bold">Tích hợp AI trong Nghiên cứu</div>
                    <p class="card-text-muted">NCS được hỗ trợ bởi 03 AI Agents chuyên dụng 24/7 trong suốt quá trình học, đồng thời tuân thủ các nguyên tắc liêm chính học thuật (AI Ethics Statement).</p>
                </div>
                <div class="istec-square-card" style="border-top: 4px solid var(--istec-bright-green);">
                    <div style="font-size: 1.8rem; margin-bottom: 14px;">📊</div>
                    <div class="card-title-bold">Nghiên cứu Gắn với Thực tiễn</div>
                    <p class="card-text-muted">Đề tài xuất phát từ bài toán thực tế của doanh nghiệp được nâng tầm thành mô hình quản trị có thể tham khảo và ứng dụng trong các doanh nghiệp cùng ngành.</p>
                </div>
                <div class="istec-square-card" style="border-top: 4px solid #0284c7;">
                    <div style="font-size: 1.8rem; margin-bottom: 14px;">🩺</div>
                    <div class="card-title-bold">Gia nhập Business Doctors</div>
                    <p class="card-text-muted">Mở rộng vai trò trở thành chuyên gia tư vấn cùng Hội đồng Chuyên gia IDEAS, tham gia chẩn đoán và giải quyết các bài toán thực tế cho mạng lưới doanh nghiệp đối tác.</p>
                </div>
                <div class="istec-square-card" style="border-top: 4px solid #d97706;">
                    <div style="font-size: 1.8rem; margin-bottom: 14px;">📘</div>
                    <div class="card-title-bold">Giá trị Kép: Nghiên cứu & Ứng dụng</div>
                    <p class="card-text-muted">Bên cạnh Luận án DBA, NCS hoàn thiện Cẩm nang Quản trị Ứng dụng (Executive Business Blueprint) phục vụ tái cấu trúc, chuyển đổi số và thúc đẩy tăng trưởng.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 5. CƠ CHẾ LỰA CHỌN ĐỀ TÀI (PHƯƠNG ÁN A & B) ══ -->
    <section class="istec-section-box bg-alt">
        <div class="container">
            <div style="text-align: center; max-width: 820px; margin: 0 auto 36px;" class="istec-reveal">
                <span class="istec-label-top">CƠ CHẾ LỰA CHỌN ĐỀ TÀI</span>
                <h2 class="istec-heading-large">
                    2 Hướng Tiếp Cận Đề Tài Nghiên Cứu Linh Hoạt & Thực Chiến
                </h2>
                <p class="istec-body-lead" style="margin: 0 auto;">
                    Chương trình ưu tiên các đề tài có tính ứng dụng cao và gắn với bối cảnh quản trị thực tế. Nghiên cứu sinh có thể chủ động chọn 1 trong 2 hướng:
                </p>
            </div>

            <div class="topic-plan-grid istec-reveal">
                <!-- Phương án A -->
                <div class="topic-plan-card highlight">
                    <span class="topic-badge">Phương án A</span>
                    <h3 style="font-size: 1.3rem; font-weight: 800; color: var(--dark-main); margin-bottom: 16px;">
                        Đề tài từ Doanh nghiệp của Nghiên cứu sinh
                    </h3>
                    <p style="font-size: 0.95rem; color: var(--dark-sub); line-height: 1.7; margin-bottom: 20px;">
                        Phát triển một vấn đề thực tế, nút thắt vận hành, chiến lược tái cấu trúc hoặc mô hình kinh doanh số tại chính doanh nghiệp/lĩnh vực mà bạn đang trực tiếp điều hành thành đề tài nghiên cứu Tiến sĩ DBA.
                    </p>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px;">
                        <li style="display: flex; align-items: flex-start; gap: 8px; font-size: 0.9rem; color: var(--dark-main); font-weight: 600;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#61A60E" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Ứng dụng trực tiếp giải pháp để tối ưu hoạt động doanh nghiệp của mình</span>
                        </li>
                        <li style="display: flex; align-items: flex-start; gap: 8px; font-size: 0.9rem; color: var(--dark-main); font-weight: 600;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#61A60E" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Dữ liệu nội bộ sẵn có, tạo cơ sở thực nghiệm vững chắc cho luận án</span>
                        </li>
                    </ul>
                </div>

                <!-- Phương án B -->
                <div class="topic-plan-card">
                    <span class="topic-badge alt">Phương án B</span>
                    <h3 style="font-size: 1.3rem; font-weight: 800; color: var(--dark-main); margin-bottom: 16px;">
                        Nhận Dự án Tư vấn Thực tế từ Đối tác IDEAS
                    </h3>
                    <p style="font-size: 0.95rem; color: var(--dark-sub); line-height: 1.7; margin-bottom: 20px;">
                        NCS được giao 01 Dự án Tư vấn Thực tế từ doanh nghiệp đối tác để đóng vai trò Chuyên gia tư vấn chính (Business Doctor). Sử dụng dữ liệu dự án làm thực nghiệm và bắt buộc khái quát hóa thành Mô hình Quản trị chuyển giao.
                    </p>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px;">
                        <li style="display: flex; align-items: flex-start; gap: 8px; font-size: 0.9rem; color: var(--dark-main); font-weight: 600;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#005C4D" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Giải quyết vấn đề thiếu dữ liệu nếu NCS chưa có đề tài sẵn có</span>
                        </li>
                        <li style="display: flex; align-items: flex-start; gap: 8px; font-size: 0.9rem; color: var(--dark-main); font-weight: 600;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#005C4D" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Khẳng định vị thế chuyên gia tư vấn độc lập qua dự án thực nghiệm lớn</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 6. KHUNG CHƯƠNG TRÌNH ĐÀO TẠO 3 NĂM (180 ECTS) ══ -->
    <section class="istec-section-box" id="khung-dao-tao">
        <div class="container">
            <div style="text-align: center; max-width: 820px; margin: 0 auto 36px;" class="istec-reveal">
                <span class="istec-label-top">LỘ TRÌNH HỌC THUẬT TIẾN SĨ</span>
                <h2 class="istec-heading-large">
                    Khung Đào Tạo Tiến Sĩ 03 Năm Chuẩn Châu Âu (180 ECTS)
                </h2>
                <p class="istec-body-lead" style="margin: 0 auto;">
                    Được phân chia khoa học thành 3 giai đoạn rõ ràng với các mốc thẩm định chất lượng nghiêm ngặt (Checkpoints), đảm bảo tiến độ bảo vệ đúng hạn.
                </p>
            </div>

            <!-- Tab Buttons -->
            <div class="stage-tabs-nav istec-reveal">
                <button class="stage-tab-btn active" onclick="switchStage(1, this)" type="button">
                    <span>Giai đoạn 1: Nghiên cứu & Đề cương Luận án</span>
                    <span class="tab-badge">12 Tháng • 60 ECTS</span>
                </button>
                <button class="stage-tab-btn" onclick="switchStage(2, this)" type="button">
                    <span>Giai đoạn 2: Thực địa & Viết Luận án</span>
                    <span class="tab-badge">18 Tháng • 90 ECTS</span>
                </button>
                <button class="stage-tab-btn" onclick="switchStage(3, this)" type="button">
                    <span>Giai đoạn 3: Hoàn thiện & Bảo vệ Hội đồng</span>
                    <span class="tab-badge">06 Tháng • 30 ECTS</span>
                </button>
            </div>

            <!-- Stage 1 Panel -->
            <div id="stage-panel-1" class="stage-panel active istec-reveal">
                <div class="stage-card-main">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
                        <div>
                            <span style="font-size: 0.8rem; font-weight: 800; color: var(--istec-teal); text-transform: uppercase;">GIAI ĐOẠN 1 • NỀN TẢNG HỌC THUẬT</span>
                            <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--dark-main); margin: 4px 0 0;">
                                Chuyển Hóa Bài Toán Doanh Nghiệp Thành Đề Cương Luận Án (Research Proposal)
                            </h3>
                        </div>
                        <div style="background: rgba(0, 92, 77, 0.08); color: var(--istec-deep-green); padding: 8px 16px; border-radius: var(--radius-square); font-weight: 800; font-size: 0.95rem;">
                            Checkpoint 1: Proposal Defense
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 32px;">
                        <div style="background: #f8fafc; border: 1px solid var(--border-light); padding: 18px 16px; border-radius: var(--radius-square);">
                            <div style="font-size: 0.74rem; font-weight: 800; color: var(--istec-teal); margin-bottom: 4px;">CHUYÊN ĐỀ 1</div>
                            <div style="font-size: 0.94rem; font-weight: 700; color: var(--dark-main); line-height: 1.4;">Research Orientation, Philosophy & Topic Development</div>
                        </div>
                        <div style="background: #f8fafc; border: 1px solid var(--border-light); padding: 18px 16px; border-radius: var(--radius-square);">
                            <div style="font-size: 0.74rem; font-weight: 800; color: var(--istec-teal); margin-bottom: 4px;">CHUYÊN ĐỀ 2</div>
                            <div style="font-size: 0.94rem; font-weight: 700; color: var(--dark-main); line-height: 1.4;">Advanced Literature Review & AI Copilot</div>
                        </div>
                        <div style="background: #f8fafc; border: 1px solid var(--border-light); padding: 18px 16px; border-radius: var(--radius-square);">
                            <div style="font-size: 0.74rem; font-weight: 800; color: var(--istec-teal); margin-bottom: 4px;">CHUYÊN ĐỀ 3</div>
                            <div style="font-size: 0.94rem; font-weight: 700; color: var(--dark-main); line-height: 1.4;">Qualitative & Quantitative Research Methods</div>
                        </div>
                        <div style="background: #f8fafc; border: 1px solid var(--border-light); padding: 18px 16px; border-radius: var(--radius-square);">
                            <div style="font-size: 0.74rem; font-weight: 800; color: var(--istec-teal); margin-bottom: 4px;">CHUYÊN ĐỀ 4</div>
                            <div style="font-size: 0.94rem; font-weight: 700; color: var(--dark-main); line-height: 1.4;">Research Model & Proposal Development</div>
                        </div>
                    </div>

                    <!-- Rubric đánh giá -->
                    <div style="border-top: 1px solid var(--border-light); padding-top: 24px;">
                        <div style="font-size: 0.92rem; font-weight: 800; color: var(--dark-main); margin-bottom: 16px;">
                            CẤU TRÚC ĐÁNH GIÁ HỌC THUẬT CHO MỖI CHUYÊN ĐỀ:
                        </div>
                        <div class="rubric-grid-3">
                            <div class="rubric-card">
                                <div class="rubric-percent">20%</div>
                                <div class="rubric-title">Thảo luận Chuyên đề (DQ) trên Forum Nội bộ</div>
                                <p class="rubric-desc">NCS đọc tài liệu, trao đổi, phản biện học thuật với các NCS cùng khóa trên hệ thống LMS chuyên dụng.</p>
                            </div>
                            <div class="rubric-card">
                                <div class="rubric-percent">30%</div>
                                <div class="rubric-title">Báo cáo Hội đồng Chuyên môn IDEAS (Public Seminar)</div>
                                <p class="rubric-desc">Thuyết trình giải pháp chuyên đề trước Hội đồng Giám khảo/Giáo sư; thính giả MBA/Doanh nghiệp đóng góp góc nhìn thực tiễn.</p>
                            </div>
                            <div class="rubric-card">
                                <div class="rubric-percent">50%</div>
                                <div class="rubric-title">Bài Thu hoạch Cá nhân sau Báo cáo (Final Assignment)</div>
                                <p class="rubric-desc">Tiếp thu phản biện từ Hội đồng để viết bài thu hoạch chuyên đề hoàn chỉnh, ứng dụng trực tiếp vào Đề cương Luận án DBA.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stage 2 Panel -->
            <div id="stage-panel-2" class="stage-panel">
                <div class="stage-card-main">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
                        <div>
                            <span style="font-size: 0.8rem; font-weight: 800; color: var(--istec-teal); text-transform: uppercase;">GIAI ĐOẠN 2 • THỰC ĐỊA & HƯỚNG DẪN 1:1</span>
                            <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--dark-main); margin: 4px 0 0;">
                                Nghiên Cứu Thực Địa Độc Lập & Viết Các Chương Luận Án
                            </h3>
                        </div>
                        <div style="background: rgba(97, 166, 14, 0.12); color: #3f6e07; padding: 8px 16px; border-radius: var(--radius-square); font-weight: 800; font-size: 0.95rem;">
                            1:1 Supervisor & 03 AI Agents
                        </div>
                    </div>

                    <p style="font-size: 0.96rem; color: var(--dark-sub); line-height: 1.7; margin-bottom: 24px;">
                        Tập trung vào nghiên cứu thực địa độc lập, làm việc trực tiếp 1:1 với Giáo sư Hướng dẫn (Supervisor). Nghiên cứu sinh được trang bị bộ 03 AI Agents chuyên dụng hỗ trợ xử lý dữ liệu và bắt buộc tham gia tối thiểu <strong>03 Buổi Báo Cáo Tiến Độ Công Khai (Progress Seminars)</strong>:
                    </p>

                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                        <div style="background: #ffffff; border: 1px solid var(--border-light); border-left: 4px solid var(--istec-deep-green); padding: 22px 18px; border-radius: var(--radius-square); box-shadow: var(--shadow-card);">
                            <div style="font-size: 0.74rem; font-weight: 800; color: var(--istec-deep-green); margin-bottom: 6px;">BUỔI 1 • THÁNG THỨ 18</div>
                            <div style="font-size: 1.05rem; font-weight: 800; color: var(--dark-main); margin-bottom: 8px;">Thu thập & Làm sạch Dữ liệu</div>
                            <p style="font-size: 0.86rem; color: var(--dark-sub); line-height: 1.5; margin: 0;">Báo cáo kết quả khảo sát, mã hóa phỏng vấn sâu và quy trình làm sạch dữ liệu thực nghiệm.</p>
                        </div>
                        <div style="background: #ffffff; border: 1px solid var(--border-light); border-left: 4px solid var(--istec-bright-green); padding: 22px 18px; border-radius: var(--radius-square); box-shadow: var(--shadow-card);">
                            <div style="font-size: 0.74rem; font-weight: 800; color: var(--istec-bright-green); margin-bottom: 6px;">BUỔI 2 • THÁNG THỨ 24</div>
                            <div style="font-size: 1.05rem; font-weight: 800; color: var(--dark-main); margin-bottom: 8px;">Kết quả Phân tích Dữ liệu (Findings)</div>
                            <p style="font-size: 0.86rem; color: var(--dark-sub); line-height: 1.5; margin: 0;">Trình bày mô hình chẩn đoán doanh nghiệp, các phát hiện thực nghiệm và kiểm định mô hình.</p>
                        </div>
                        <div style="background: #ffffff; border: 1px solid var(--border-light); border-left: 4px solid #0284c7; padding: 22px 18px; border-radius: var(--radius-square); box-shadow: var(--shadow-card);">
                            <div style="font-size: 0.74rem; font-weight: 800; color: #0284c7; margin-bottom: 6px;">BUỔI 3 • THÁNG THỨ 30</div>
                            <div style="font-size: 1.05rem; font-weight: 800; color: var(--dark-main); margin-bottom: 8px;">Hàm ý Quản trị & Cẩm nang Ứng dụng</div>
                            <p style="font-size: 0.86rem; color: var(--dark-sub); line-height: 1.5; margin: 0;">Trình bày bản thảo Executive Business Blueprint và các đề xuất hàm ý quản trị chiến lược.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stage 3 Panel -->
            <div id="stage-panel-3" class="stage-panel">
                <div class="stage-card-main">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
                        <div>
                            <span style="font-size: 0.8rem; font-weight: 800; color: var(--istec-teal); text-transform: uppercase;">GIAI ĐOẠN 3 • HOÀN THIỆN & CẤP BẰNG</span>
                            <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--dark-main); margin: 4px 0 0;">
                                Rà Soát Học Thuật, Bảo Vệ Thử & Bảo Vệ Chính Thức Trước Hội Đồng
                            </h3>
                        </div>
                        <div style="background: rgba(2, 132, 199, 0.1); color: #0369a1; padding: 8px 16px; border-radius: var(--radius-square); font-weight: 800; font-size: 0.95rem;">
                            Official Defense • ISTEC Paris Degree
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px;">
                        <div style="background: #f8fafc; border: 1px solid var(--border-light); padding: 22px 18px; border-radius: var(--radius-square);">
                            <div style="font-size: 0.74rem; font-weight: 800; color: var(--istec-teal); margin-bottom: 6px;">BƯỚC 1</div>
                            <div style="font-size: 1rem; font-weight: 800; color: var(--dark-main); margin-bottom: 6px;">Academic Review</div>
                            <p style="font-size: 0.84rem; color: var(--dark-sub); line-height: 1.5; margin: 0;">Rà soát toàn diện định dạng học thuật, liêm chính nghiên cứu và kiểm tra đạo văn quốc tế.</p>
                        </div>
                        <div style="background: #f8fafc; border: 1px solid var(--border-light); padding: 22px 18px; border-radius: var(--radius-square);">
                            <div style="font-size: 0.74rem; font-weight: 800; color: var(--istec-teal); margin-bottom: 6px;">BƯỚC 2</div>
                            <div style="font-size: 1rem; font-weight: 800; color: var(--dark-main); margin-bottom: 6px;">Mock Defense</div>
                            <p style="font-size: 0.84rem; color: var(--dark-sub); line-height: 1.5; margin: 0;">Bảo vệ thử trước Hội đồng chuyên môn IDEAS để hoàn thiện phản biện và kỹ năng thuyết trình.</p>
                        </div>
                        <div style="background: #f8fafc; border: 1px solid var(--border-light); padding: 22px 18px; border-radius: var(--radius-square);">
                            <div style="font-size: 0.74rem; font-weight: 800; color: var(--istec-teal); margin-bottom: 6px;">BƯỚC 3</div>
                            <div style="font-size: 1rem; font-weight: 800; color: var(--dark-main); margin-bottom: 6px;">Official Defense</div>
                            <p style="font-size: 0.84rem; color: var(--dark-sub); line-height: 1.5; margin: 0;">Bảo vệ chính thức trước Hội đồng Giáo sư quốc tế của ISTEC Paris để nhận bằng Tiến sĩ DBA.</p>
                        </div>
                        <div style="background: #f8fafc; border: 1px solid var(--border-light); padding: 22px 18px; border-radius: var(--radius-square);">
                            <div style="font-size: 0.74rem; font-weight: 800; color: var(--istec-teal); margin-bottom: 6px;">BƯỚC 4</div>
                            <div style="font-size: 1rem; font-weight: 800; color: var(--dark-main); margin-bottom: 6px;">Executive Blueprint</div>
                            <p style="font-size: 0.84rem; color: var(--dark-sub); line-height: 1.5; margin: 0;">Hoàn thiện Cẩm nang Quản trị Ứng dụng để chuyển giao hoặc xuất bản thành cẩm nang doanh nghiệp.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 7. AI NATIVE RESEARCH COPILOT (03 TRỢ LÝ AI CHUYÊN DỤNG) ══ -->
    <section class="istec-section-box bg-alt">
        <div class="container">
            <div style="text-align: center; max-width: 820px; margin: 0 auto 36px;" class="istec-reveal">
                <span class="istec-label-top">CÔNG NGHỆ ĐỘT PHÁ ĐỘC QUYỀN</span>
                <h2 class="istec-heading-large">
                    AI Native Research Copilot: 03 Trợ Lý AI Chuyên Dụng 24/7 Dành Riêng Cho NCS
                </h2>
                <p class="istec-body-lead" style="margin: 0 auto;">
                    Bên cạnh IDEAS AI Platform, Nghiên cứu sinh DBA được trang bị riêng 03 Trợ lý AI Chuyên dụng đóng vai trò trợ lý nghiên cứu đắc lực, đẩy nhanh tiến độ nghiên cứu gấp 3-5 lần:
                </p>
            </div>

            <div class="ai-agents-grid istec-reveal">
                <!-- Agent 1 -->
                <div class="ai-agent-card">
                    <div class="ai-agent-tag">AI AGENT 01 • TỔNG QUAN HỌC THUẬT</div>
                    <div class="ai-agent-name">Literature Review & Gap Finder</div>
                    <p style="font-size: 0.9rem; color: var(--dark-sub); line-height: 1.6; margin: 0 0 16px;">
                        <strong>Agent Thông quan Tài liệu:</strong> Hỗ trợ NCS trích xuất khoảng trống nghiên cứu (Research Gap), xây dựng Bản đồ Tài liệu (Literature Map) và định hình cơ sở lý thuyết chỉ trong vài ngày.
                    </p>
                    <ul class="ai-agent-features">
                        <li>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Tự động truy xuất, tổng hợp và phân tích hàng ngàn bài báo khoa học từ ISI/Scopus</span>
                        </li>
                        <li>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Tổng hợp trường phái lý thuyết và so sánh các mô hình nghiên cứu tiền nhiệm</span>
                        </li>
                        <li>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Trích dẫn nguồn chuẩn APA/Harvard hoàn toàn tự động</span>
                        </li>
                    </ul>
                </div>

                <!-- Agent 2 -->
                <div class="ai-agent-card">
                    <div class="ai-agent-tag">AI AGENT 02 • PHÂN TÍCH ĐỊNH TÍNH</div>
                    <div class="ai-agent-name">Qualitative Research & Interview Designer</div>
                    <p style="font-size: 0.9rem; color: var(--dark-sub); line-height: 1.6; margin: 0 0 16px;">
                        <strong>Agent Phân tích Định tính:</strong> Tự động thiết kế kịch bản phỏng vấn sâu, mẫu khảo sát kiêm bối cảnh nghiên cứu doanh nghiệp của NCS.
                    </p>
                    <ul class="ai-agent-features">
                        <li>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Tự động bóc tách băng ghi âm phỏng vấn chuyên gia thành văn bản chính xác</span>
                        </li>
                        <li>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Mã hóa dữ liệu định tính tự động (Open, Axial, Selective Coding)</span>
                        </li>
                        <li>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Phân tích cụm chủ đề (Thematic Analysis) theo chuẩn xuất bản khoa học</span>
                        </li>
                    </ul>
                </div>

                <!-- Agent 3 -->
                <div class="ai-agent-card">
                    <div class="ai-agent-tag">AI AGENT 03 • PHÂN TÍCH ĐỊNH LƯỢNG</div>
                    <div class="ai-agent-name">Quantitative & Statistical Analytics Agent</div>
                    <p style="font-size: 0.9rem; color: var(--dark-sub); line-height: 1.6; margin: 0 0 16px;">
                        <strong>Agent Phân tích Định lượng:</strong> Tích hợp trực tiếp môi trường mã nguồn Python và phần mềm thống kê SPSS / PLS-SEM.
                    </p>
                    <ul class="ai-agent-features">
                        <li>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Tự động kiểm tra độ tin cậy thang đo (Cronbach's Alpha) và phân tích nhân tố EFA/CFA</span>
                        </li>
                        <li>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Chạy mô hình cấu trúc tuyến tính SEM, hồi quy đa biến và kiểm định giả thuyết</span>
                        </li>
                        <li>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Tự động xuất bảng số liệu và biểu đồ khoa học theo chuẩn quy chuẩn quốc tế</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 8. ĐỘI NGŨ GIẢNG VIÊN & CỐ VẤN QUỐC TẾ & IDEAS ══ -->
    <section class="istec-section-box" id="chuyen-gia">
        <div class="container">
            <div style="text-align: center; max-width: 820px; margin: 0 auto 36px;" class="istec-reveal">
                <span class="istec-label-top">HỘI ĐỒNG HỌC THUẬT & HƯỚNG DẪN</span>
                <h2 class="istec-heading-large">
                    Đội Ngũ Giáo Sư Quốc Tế ISTEC Paris & Hội Đồng Cố Vấn IDEAS
                </h2>
                <p class="istec-body-lead" style="margin: 0 auto;">
                    Quy tụ các Giáo sư, Tiến sĩ đầu ngành giàu kinh nghiệm nghiên cứu học thuật quốc tế và bề dày thực tiễn điều hành doanh nghiệp.
                </p>
            </div>

            <!-- Tab Chuyển Đổi Hội Đồng -->
            <div class="faculty-tabs-nav istec-reveal">
                <button class="faculty-tab-btn active" onclick="switchFaculty('istec', this)" type="button">
                    Giáo Sư Quốc Tế ISTEC Paris
                </button>
                <button class="faculty-tab-btn" onclick="switchFaculty('ideas', this)" type="button">
                    Hội Đồng Cố Vấn & Giảng Viên IDEAS
                </button>
            </div>

            <!-- Panel Giảng viên Quốc tế ISTEC Paris -->
            <div id="faculty-panel-istec" class="faculty-grid istec-reveal">
                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p15_img7_245x274.jpeg" alt="Prof. Philippe BASTIEN" />
                    </div>
                    <div class="faculty-name">Prof. Philippe BASTIEN</div>
                    <div class="faculty-role">Giáo sư Nghiên cứu Khoa học Quản trị</div>
                    <p class="faculty-desc">Trưởng chuyên ngành Sự kiện, Công nghiệp Sáng tạo & Quản trị Văn hóa tại ISTEC Paris.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p15_img8_265x276.jpeg" alt="Dr. Stanislas KIHM" />
                    </div>
                    <div class="faculty-name">Dr. Stanislas KIHM</div>
                    <div class="faculty-role">Tiến sĩ Lịch sử & Nhà Nghiên cứu Quản trị</div>
                    <p class="faculty-desc">Giảng viên - Nhà nghiên cứu về Khoa học Quản trị và Lịch sử Kinh doanh tại Pháp.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p15_img3_146x162.png" alt="Prof. Adel ALOUI" />
                    </div>
                    <div class="faculty-name">Prof. Adel ALOUI</div>
                    <div class="faculty-role">Giáo sư Quản trị Chiến lược & Chuỗi Cung Ứng</div>
                    <p class="faculty-desc">Chuyên gia cố vấn cấp cao về chuỗi cung ứng quốc tế và hoạch định chiến lược kinh doanh.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p15_img9_268x289.jpeg" alt="Dr. Rey DANG" />
                    </div>
                    <div class="faculty-name">Dr. Rey DANG</div>
                    <div class="faculty-role">Tiến sĩ Quản trị Kinh doanh, Giảng viên Nghiên cứu</div>
                    <p class="faculty-desc">Tác giả nhiều bài báo khoa học chuẩn ISI/Scopus về quản trị tài chính và đa dạng doanh nghiệp.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p15_img2_330x349.jpeg" alt="Prof. Istifanous ADO" />
                    </div>
                    <div class="faculty-name">Prof. Istifanous ADO</div>
                    <div class="faculty-role">Giáo sư Nghiên cứu Khởi nghiệp</div>
                    <p class="faculty-desc">Chuyên gia nghiên cứu hệ sinh thái đổi mới sáng tạo, quản trị khởi nghiệp và doanh nghiệp số.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p15_img10_330x349.jpeg" alt="Dr. Marie-Alix DEVAL" />
                    </div>
                    <div class="faculty-name">Dr. Marie-Alix DEVAL</div>
                    <div class="faculty-role">Tiến sĩ Quản trị Kinh doanh</div>
                    <p class="faculty-desc">Nhà nghiên cứu về hành vi tổ chức, phát triển nguồn nhân lực và lãnh đạo chiến lược.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p15_img11_182x178.png" alt="Prof. Jihane CHAARI" />
                    </div>
                    <div class="faculty-name">Prof. Jihane CHAARI</div>
                    <div class="faculty-role">Giáo sư Liên kết Khoa học Quản trị</div>
                    <p class="faculty-desc">Giảng viên nghiên cứu liên kết với các trường đại học hàng đầu tại Pháp và châu Âu.</p>
                </div>

                <div class="faculty-card" style="background: #f8fafc; display: flex; align-items: center; justify-content: center; border-style: dashed;">
                    <div style="font-size: 2rem; margin-bottom: 8px;">🌍</div>
                    <div style="font-size: 0.95rem; font-weight: 800; color: var(--istec-deep-green);">Mạng lưới Giáo sư Quốc tế</div>
                    <p style="font-size: 0.8rem; color: var(--dark-muted); margin-top: 4px;">Cùng hơn 30+ nhà nghiên cứu và giáo sư đồng hành hướng dẫn 1:1 cho NCS.</p>
                </div>
            </div>

            <!-- Panel Hội đồng IDEAS (mặc định ẩn) -->
            <div id="faculty-panel-ideas" class="faculty-grid" style="display: none;">
                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p20_img7_250x250.png" alt="Dr. Phạm Quang Vinh" />
                    </div>
                    <div class="faculty-name">Dr. Phạm Quang Vinh</div>
                    <div class="faculty-role">Doctor of Business Administration (USA)</div>
                    <p class="faculty-desc">Chuyên gia cao cấp về Quản trị Chiến lược và Vận hành Hệ thống Doanh nghiệp.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p20_img8_461x308.png" alt="Dr. Sơn Điền Trung" />
                    </div>
                    <div class="faculty-name">Dr. Sơn Điền Trung</div>
                    <div class="faculty-role">Doctor of Business Administration (France)</div>
                    <p class="faculty-desc">Chuyên gia đào tạo và cố vấn chuyển đổi mô hình kinh doanh theo chuẩn châu Âu.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p20_img9_242x243.png" alt="Dr. Phạm Quang Quý" />
                    </div>
                    <div class="faculty-name">Dr. Phạm Quang Quý</div>
                    <div class="faculty-role">Doctor of Business Administration</div>
                    <p class="faculty-desc">Cố vấn chiến lược tài chính doanh nghiệp và kiểm soát nội bộ.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p20_img10_106x150.png" alt="Dr. Mang Viên Hoàng Nhật" />
                    </div>
                    <div class="faculty-name">Dr. Mang Viên Hoàng Nhật</div>
                    <div class="faculty-role">Doctor of Business Administration</div>
                    <p class="faculty-desc">Chuyên gia phương pháp nghiên cứu ứng dụng và định lượng trong quản trị.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p20_img11_404x424.jpeg" alt="Dr. Phạm Phi Vũ" />
                    </div>
                    <div class="faculty-name">Dr. Phạm Phi Vũ</div>
                    <div class="faculty-role">Computer Science & AI Expert</div>
                    <p class="faculty-desc">Chuyên gia Trí tuệ Nhân tạo, trực tiếp huấn luyện và phát triển bộ AI Copilot cho chương trình.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p20_img5_150x150.png" alt="Dr. Dương Văn Thịnh" />
                    </div>
                    <div class="faculty-name">Dr. Dương Văn Thịnh</div>
                    <div class="faculty-role">Doctor of Business Administration (France)</div>
                    <p class="faculty-desc">Chuyên gia tư vấn quản trị nhân sự và văn hóa doanh nghiệp chuẩn quốc tế.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p20_img6_142x150.png" alt="Dr. Trần Tâm Anh" />
                    </div>
                    <div class="faculty-name">Dr. Trần Tâm Anh</div>
                    <div class="faculty-role">Doctor of Business Administration (USA)</div>
                    <p class="faculty-desc">Cố vấn giải pháp chiến lược tiếp thị đa kênh và mở rộng thị trường.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p20_img12_392x362.png" alt="Dr. Nguyễn Thanh Bình" />
                    </div>
                    <div class="faculty-name">Dr. Nguyễn Thanh Bình</div>
                    <div class="faculty-role">Ph.D. in Information Technology</div>
                    <p class="faculty-desc">Chuyên gia Chuyển đổi số và Kiến trúc Hệ thống Dữ liệu Doanh nghiệp.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 9. MẪU BẰNG TỐT NGHIỆP & LỄ TỐT NGHIỆP TẠI PHÁP ══ -->
    <section class="istec-section-box bg-alt">
        <div class="container">
            <div class="diploma-showcase-grid istec-reveal">
                <div>
                    <span class="istec-label-top">GIÁ TRỊ VĂN BẰNG QUỐC TẾ</span>
                    <h2 class="istec-heading-large">
                        Bằng Tiến Sĩ DBA Trực Tiếp Cấp Bởi ISTEC Business School Paris
                    </h2>
                    <p class="istec-body-lead" style="margin-bottom: 24px;">
                        Văn bằng Doctorate of Business Administration được cấp trực tiếp bởi Istec Business School Paris, công nhận chuẩn học vị Pro – Bac+8 (EQF Level 8) tại Châu Âu và được WES (World Education Services) đánh giá tương đương bằng <strong>"Earned Doctorate"</strong> tại Hoa Kỳ và Canada.
                    </p>

                    <div style="display: flex; flex-direction: column; gap: 14px; margin-bottom: 28px;">
                        <div style="display: flex; align-items: flex-start; gap: 10px;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#61A60E" stroke-width="2.5" style="flex-shrink: 0; margin-top: 2px;"><polyline points="20 6 9 17 4 12"/></svg>
                            <span style="font-size: 0.94rem; color: var(--dark-main);"><strong>Bằng cấp có giá trị vĩnh viễn:</strong> Được tra cứu và xác thực trực tiếp trên hệ thống văn bằng quốc tế của trường.</span>
                        </div>
                        <div style="display: flex; align-items: flex-start; gap: 10px;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#61A60E" stroke-width="2.5" style="flex-shrink: 0; margin-top: 2px;"><polyline points="20 6 9 17 4 12"/></svg>
                            <span style="font-size: 0.94rem; color: var(--dark-main);"><strong>Hợp pháp hóa lãnh sự:</strong> Hỗ trợ hoàn tất thủ tục hợp pháp hóa lãnh sự để sử dụng và công nhận toàn cầu.</span>
                        </div>
                        <div style="display: flex; align-items: flex-start; gap: 10px;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#61A60E" stroke-width="2.5" style="flex-shrink: 0; margin-top: 2px;"><polyline points="20 6 9 17 4 12"/></svg>
                            <span style="font-size: 0.94rem; color: var(--dark-main);"><strong>Lễ tốt nghiệp tại Paris:</strong> Học viên có đặc quyền sang Paris tham dự Lễ Tốt nghiệp trang trọng cùng Ban Lãnh đạo trường tại rạp Le Grand Rex Paris.</span>
                        </div>
                    </div>

                    <!-- 2 Ảnh Graduation -->
                    <div class="grad-gallery-grid">
                        <div class="grad-gallery-item">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p16_img4_1248x832.jpeg" alt="Lễ tốt nghiệp ISTEC Paris" />
                        </div>
                        <div class="grad-gallery-item">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p16_img2_1248x832.jpeg" alt="Học viên tốt nghiệp ISTEC Paris" />
                        </div>
                    </div>
                </div>

                <!-- Cột phải: Mẫu bằng tốt nghiệp thực tế -->
                <div>
                    <div class="diploma-img-card">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p14_img6_912x614.jpeg" 
                             alt="Mẫu bằng Tiến sĩ DBA ISTEC Business School Paris" />
                    </div>
                    <div style="text-align: center; margin-top: 12px; font-size: 0.85rem; font-weight: 700; color: var(--dark-muted);">
                        Mẫu văn bằng Doctorate of Business Administration (DBA) – ISTEC Business School Paris
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 10. HỆ SINH THÁI ĐỒNG HÀNH CỦA IDEAS ══ -->
    <section class="istec-section-box">
        <div class="container">
            <div style="text-align: center; max-width: 820px; margin: 0 auto 48px;" class="istec-reveal">
                <span class="istec-label-top">ĐỐI TÁC HỌC THUẬT ĐỘC QUYỀN TẠI VIỆT NAM</span>
                <h2 class="istec-heading-large">
                    "Tri Thức Nguyên Bản, Đồng Hành Bản Địa" Cùng Viện IDEAS
                </h2>
                <p class="istec-body-lead" style="margin: 0 auto;">
                    Hơn 15 năm kinh nghiệm đồng hành học thuật cùng hơn 2.500 cựu học viên chinh phục các chương trình Sau đại học quốc tế.
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;" class="istec-reveal">
                <div class="istec-square-card">
                    <div style="font-size: 1.8rem; margin-bottom: 12px;">🤝</div>
                    <div class="card-title-bold">IDEAS Leaders Network</div>
                    <p class="card-text-muted">Cộng đồng hơn 2.500 cựu học viên là các CEO, Founder và nhà quản lý cấp cao, mở rộng networking và hợp tác kinh doanh bền vững.</p>
                </div>
                <div class="istec-square-card">
                    <div style="font-size: 1.8rem; margin-bottom: 12px;">💻</div>
                    <div class="card-title-bold">Hệ Thống LMS Chuyên Dụng</div>
                    <p class="card-text-muted">Hỗ trợ học vụ 24/7, giúp dễ dàng truy cập kho học liệu quốc tế, nộp bài tập và theo dõi tiến độ học tập mọi lúc mọi nơi.</p>
                </div>
                <div class="istec-square-card">
                    <div style="font-size: 1.8rem; margin-bottom: 12px;">🧠</div>
                    <div class="card-title-bold">IDEAS AI Platform</div>
                    <p class="card-text-muted">Nền tảng AI được huấn luyện chuyên sâu bởi Hội đồng chuyên môn IDEAS, hỗ trợ tra cứu tài liệu, giải thích thuật ngữ và xây dựng đề cương.</p>
                </div>
                <div class="istec-square-card">
                    <div style="font-size: 1.8rem; margin-bottom: 12px;">📚</div>
                    <div class="card-title-bold">Cengage MindTap Quốc Tế</div>
                    <p class="card-text-muted">Nền tảng E-Campus tiên tiến tích hợp kho giáo trình hàng đầu từ Cengage Hoa Kỳ, bài giảng trực quan và công cụ học tập tương tác.</p>
                </div>
                <div class="istec-square-card">
                    <div style="font-size: 1.8rem; margin-bottom: 12px;">👥</div>
                    <div class="card-title-bold">Đội Ngũ Học Thuật Tận Tâm</div>
                    <p class="card-text-muted">Chuyên viên học vụ song hành 1:1 nhắc lịch học, hỗ trợ giải đáp thủ tục và kết nối trực tiếp với Giáo sư hướng dẫn.</p>
                </div>
                <div class="istec-square-card">
                    <div style="font-size: 1.8rem; margin-bottom: 12px;">🇻🇳</div>
                    <div class="card-title-bold">Chuyên Đề Bổ Trợ Bằng Tiếng Việt</div>
                    <p class="card-text-muted">Các buổi hội thảo chuyên sâu cùng chuyên gia Việt Nam giúp hệ thống hóa kiến thức, tháo gỡ vướng mắc phương pháp nghiên cứu.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 11. HỌC PHÍ & LỘ TRÌNH TÀI CHÍNH ══ -->
    <section class="istec-section-box bg-alt" id="hoc-phi">
        <div class="container">
            <div style="text-align: center; max-width: 820px; margin: 0 auto 36px;" class="istec-reveal">
                <span class="istec-label-top">HỌC PHÍ & PHƯƠNG THỨC THANH TOÁN</span>
                <h2 class="istec-heading-large">
                    Chính Sách Học Phí Minh Bạch & Trọn Gói 03 Năm
                </h2>
                <p class="istec-body-lead" style="margin: 0 auto;">
                    Đầu tư cho học vị cao nhất trong quản trị kinh doanh với chính sách tài chính rõ ràng và hỗ trợ tối đa cho học viên.
                </p>
            </div>

            <div class="tuition-square-card istec-reveal">
                <div class="tuition-header-dark">
                    <div style="font-size: 0.82rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; color: #94a3b8;">
                        HỌC PHÍ TRỌN GÓI CHƯƠNG TRÌNH DBA (03 NĂM)
                    </div>
                    <div class="tuition-price-headline">13.000 EUR</div>
                    <div style="font-size: 0.94rem; color: #cbd5e1;">
                        Bằng Tiến sĩ do ISTEC Business School Paris trực tiếp cấp • WES Evaluated: "Earned Doctorate"
                    </div>
                </div>

                <div class="tuition-body-pad">
                    <div style="font-size: 1rem; font-weight: 800; color: var(--dark-main); margin-bottom: 16px;">
                        HỌC PHÍ ĐÃ BAO GỒM TRỌN GÓI CÁC KHOẢN PHÍ:
                    </div>
                    <ul class="tuition-list">
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Toàn bộ học phí 03 năm đào tạo chính quy chương trình Tiến sĩ DBA của Istec Business School Paris.</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Chi phí làm việc 1:1 với Giáo sư Hướng dẫn (Supervisor) trong suốt giai đoạn thực địa và viết luận án.</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Quyền sử dụng độc quyền <strong>03 AI Research Agents</strong> chuyên dụng và nền tảng IDEAS AI Platform 24/7.</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Dịch vụ hỗ trợ học vụ, các buổi bảo vệ tiến độ (Progress Seminars), Mock Defense và Official Defense.</span>
                        </li>
                    </ul>

                    <div style="background: #f8fafc; border: 1px solid var(--border-light); border-radius: var(--radius-square); padding: 18px 20px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 14px;">
                        <div>
                            <div style="font-size: 0.92rem; font-weight: 800; color: var(--dark-main);">HỖ TRỢ TRẢ GÓP 0% LÃI SUẤT QUA NGÂN HÀNG SACOMBANK</div>
                            <div style="font-size: 0.84rem; color: var(--dark-muted);">Linh hoạt chia nhỏ kỳ thanh toán từ 12 đến 24 tháng giúp tối ưu dòng tiền cá nhân/doanh nghiệp.</div>
                        </div>
                        <a href="javascript:void(0);" onclick="if(typeof window.openRegModal === 'function') { event.preventDefault(); window.openRegModal('Tư vấn học phí DBA ISTEC'); } else if(typeof window.showform === 'function') { event.preventDefault(); window.showform('Tư vấn học phí DBA ISTEC'); }" class="btn-istec-square-dark" style="padding: 10px 20px; font-size: 0.88rem;">
                            Nhận Lộ Trình Tài Chính
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 12. ĐIỀU KIỆN ĐẦU VÀO & HỒ SƠ XÉT TUYỂN ══ -->
    <section class="istec-section-box" id="tuyen-sinh">
        <div class="container">
            <div style="text-align: center; max-width: 820px; margin: 0 auto 48px;" class="istec-reveal">
                <span class="istec-label-top">TIÊU CHUẨN ĐẦU VÀO & XÉT TUYỂN</span>
                <h2 class="istec-heading-large">
                    Điều Kiện Nhập Học & Quy Trình Tuyển Sinh DBA
                </h2>
                <p class="istec-body-lead" style="margin: 0 auto;">
                    Quy trình thẩm định hồ sơ học thuật minh bạch và đánh giá năng lực nghiên cứu thực tiễn của ứng viên.
                </p>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;" class="istec-reveal">
                <!-- Cột trái: Điều kiện đầu vào -->
                <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-square); padding: 32px 28px; box-shadow: var(--shadow-card);">
                    <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--dark-main); margin-bottom: 20px;">
                        Yêu Cầu Tuyển Sinh Đầu Vào
                    </h3>
                    <div style="display: flex; flex-direction: column; gap: 16px;">
                        <div style="display: flex; gap: 14px;">
                            <div style="width: 32px; height: 32px; background: rgba(0, 92, 77, 0.1); color: var(--istec-deep-green); border-radius: var(--radius-square); display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0;">01</div>
                            <div>
                                <div style="font-size: 0.95rem; font-weight: 700; color: var(--dark-main);">Văn bằng Thạc sĩ</div>
                                <div style="font-size: 0.88rem; color: var(--dark-sub); line-height: 1.5;">Đã hoàn thành bằng Thạc sĩ (Master / MBA / MSc AI) hoặc văn bằng tương đương thuộc các ngành Kinh tế, Quản trị, Tài chính, Công nghệ...</div>
                            </div>
                        </div>
                        <div style="display: flex; gap: 14px;">
                            <div style="width: 32px; height: 32px; background: rgba(0, 92, 77, 0.1); color: var(--istec-deep-green); border-radius: var(--radius-square); display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0;">02</div>
                            <div>
                                <div style="font-size: 0.95rem; font-weight: 700; color: var(--dark-main);">Năng lực Ngoại ngữ</div>
                                <div style="font-size: 0.88rem; color: var(--dark-sub); line-height: 1.5;">Tiếng Anh tương đương IELTS 6.5 hoặc phỏng vấn đánh giá năng lực ngôn ngữ/đề tài trực tiếp với Hội đồng.</div>
                            </div>
                        </div>
                        <div style="display: flex; gap: 14px;">
                            <div style="width: 32px; height: 32px; background: rgba(0, 92, 77, 0.1); color: var(--istec-deep-green); border-radius: var(--radius-square); display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0;">03</div>
                            <div>
                                <div style="font-size: 0.95rem; font-weight: 700; color: var(--dark-main);">Kinh nghiệm Quản lý</div>
                                <div style="font-size: 0.88rem; color: var(--dark-sub); line-height: 1.5;">Có kinh nghiệm làm việc thực tế tại vị trí Quản lý, Giám đốc, Chủ doanh nghiệp, Cố vấn hoặc Chuyên gia cấp cao.</div>
                            </div>
                        </div>
                        <div style="display: flex; gap: 14px;">
                            <div style="width: 32px; height: 32px; background: rgba(0, 92, 77, 0.1); color: var(--istec-deep-green); border-radius: var(--radius-square); display: flex; align-items: center; justify-content: center; font-weight: 800; flex-shrink: 0;">04</div>
                            <div>
                                <div style="font-size: 0.95rem; font-weight: 700; color: var(--dark-main);">Bài toán Thực tiễn</div>
                                <div style="font-size: 0.88rem; color: var(--dark-sub); line-height: 1.5;">Có bài toán thực tiễn từ doanh nghiệp muốn phát triển thành đề tài hoặc sẵn sàng nhận Dự án Tư vấn Thực chiến do IDEAS giao.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cột phải: Hồ sơ xét tuyển 6 mục -->
                <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-square); padding: 32px 28px; box-shadow: var(--shadow-card);">
                    <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--dark-main); margin-bottom: 20px;">
                        Bộ Hồ Sơ Dự Tuyển Tiến Sĩ (Dossier)
                    </h3>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 14px;">
                        <li style="display: flex; align-items: center; gap: 12px; font-size: 0.92rem; color: var(--dark-main); padding-bottom: 12px; border-bottom: 1px solid var(--border-subtle);">
                            <span style="width: 24px; height: 24px; background: #e5e7eb; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.76rem; font-weight: 800;">1</span>
                            <span>Phiếu đăng ký dự tuyển theo mẫu của ISTEC Paris (Application Form)</span>
                        </li>
                        <li style="display: flex; align-items: center; gap: 12px; font-size: 0.92rem; color: var(--dark-main); padding-bottom: 12px; border-bottom: 1px solid var(--border-subtle);">
                            <span style="width: 24px; height: 24px; background: #e5e7eb; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.76rem; font-weight: 800;">2</span>
                            <span>Sơ yếu lý lịch khoa học & nghề nghiệp cập nhật (Academic / Executive CV)</span>
                        </li>
                        <li style="display: flex; align-items: center; gap: 12px; font-size: 0.92rem; color: var(--dark-main); padding-bottom: 12px; border-bottom: 1px solid var(--border-subtle);">
                            <span style="width: 24px; height: 24px; background: #e5e7eb; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.76rem; font-weight: 800;">3</span>
                            <span>Bản sao công chứng Bằng Thạc sĩ và Bảng điểm Thạc sĩ kèm bản dịch</span>
                        </li>
                        <li style="display: flex; align-items: center; gap: 12px; font-size: 0.92rem; color: var(--dark-main); padding-bottom: 12px; border-bottom: 1px solid var(--border-subtle);">
                            <span style="width: 24px; height: 24px; background: #e5e7eb; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.76rem; font-weight: 800;">4</span>
                            <span>Thư giải trình mục đích học tập & định hướng (Motivation Letter / SOP)</span>
                        </li>
                        <li style="display: flex; align-items: center; gap: 12px; font-size: 0.92rem; color: var(--dark-main); padding-bottom: 12px; border-bottom: 1px solid var(--border-subtle);">
                            <span style="width: 24px; height: 24px; background: #e5e7eb; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.76rem; font-weight: 800;">5</span>
                            <span>Đề xuất ý tưởng Nghiên cứu sơ bộ (Initial Research Idea / Proposal)</span>
                        </li>
                        <li style="display: flex; align-items: center; gap: 12px; font-size: 0.92rem; color: var(--dark-main);">
                            <span style="width: 24px; height: 24px; background: #e5e7eb; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.76rem; font-weight: 800;">6</span>
                            <span>01 Thư giới thiệu của cấp trên/chuyên gia & Bản sao Hộ chiếu còn hạn</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 13. FAQ (CÂU HỎI THƯỜNG GẶP) ══ -->
    <section class="istec-section-box bg-alt">
        <div class="container" style="max-width: 860px;">
            <div style="text-align: center; margin-bottom: 40px;" class="istec-reveal">
                <span class="istec-label-top">GIẢI ĐÁP HỌC VỤ</span>
                <h2 class="istec-heading-large">
                    Câu Hỏi Thường Gặp Về Chương Trình Tiến Sĩ DBA
                </h2>
            </div>

            <div class="istec-reveal">
                <!-- FAQ 1 -->
                <div class="acc-square-box open">
                    <button class="acc-square-header" onclick="toggleAcc(this)" type="button">
                        <span class="acc-square-title">NCS được đồng hành như thế nào trong quá trình nghiên cứu?</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
                    </button>
                    <div class="acc-square-panel" style="max-height: 300px;">
                        <div class="acc-square-content">
                            Trong giai đoạn nghiên cứu thực địa, NCS được hướng dẫn 1:1 cùng Giáo sư hướng dẫn (Supervisor), đồng thời tham gia các Progress Seminars định kỳ để trình bày, trao đổi và nhận phản biện liên tục trong quá trình hoàn thiện nghiên cứu. Ngoài ra, NCS được trang bị riêng 03 AI Agents chuyên dụng hỗ trợ xử lý dữ liệu và học liệu 24/7.
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="acc-square-box">
                    <button class="acc-square-header" onclick="toggleAcc(this)" type="button">
                        <span class="acc-square-title">NCS có được tự chọn đề tài nghiên cứu không?</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
                    </button>
                    <div class="acc-square-panel">
                        <div class="acc-square-content">
                            Có. NCS hoàn toàn chủ động đề xuất một bài toán thực tế từ chính doanh nghiệp mình đang vận hành, như vấn đề quản trị, tái cấu trúc, chiến lược hoặc chuyển đổi số, để phát triển thành đề án DBA (Phương án A).
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="acc-square-box">
                    <button class="acc-square-header" onclick="toggleAcc(this)" type="button">
                        <span class="acc-square-title">Nếu NCS chưa có đề tài nghiên cứu thì sao?</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
                    </button>
                    <div class="acc-square-panel">
                        <div class="acc-square-content">
                            IDEAS sẽ giao một Dự án Tư vấn Thực tế từ mạng lưới doanh nghiệp đối tác để NCS tham gia với vai trò Chuyên gia tư vấn chính (Business Doctor). Từ dữ liệu thực tế của dự án, NCS phát triển thành nghiên cứu và khái quát hóa thành mô hình quản trị có khả năng chuyển giao, nhân rộng cho các doanh nghiệp cùng ngành (Phương án B).
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="acc-square-box">
                    <button class="acc-square-header" onclick="toggleAcc(this)" type="button">
                        <span class="acc-square-title">Viện IDEAS sẽ đồng hành như thế nào trong suốt quá trình học?</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
                    </button>
                    <div class="acc-square-panel">
                        <div class="acc-square-content">
                            IDEAS hỗ trợ học viên thông qua hệ thống LMS 24/7, nền tảng IDEAS AI Platform, các lớp chuyên đề bổ trợ bằng tiếng Việt, đội ngũ cố vấn học thuật và hướng dẫn luận văn. Hệ sinh thái toàn diện này giúp NCS tiếp cận kiến thức hiệu quả và duy trì tiến độ hoàn thành luận án đúng hạn 3 năm.
                        </div>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="acc-square-box">
                    <button class="acc-square-header" onclick="toggleAcc(this)" type="button">
                        <span class="acc-square-title">Văn bằng DBA ISTEC được quốc tế công nhận ra sao?</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
                    </button>
                    <div class="acc-square-panel">
                        <div class="acc-square-content">
                            Văn bằng Tiến sĩ DBA do Istec Business School Paris trực tiếp cấp theo chuẩn giáo dục đại học Pháp (Pro – Bac+8 / EQF Level 8). ISTEC là thành viên Conférence des Grandes Écoles (CGE). Bằng được tổ chức WES (World Education Services) đánh giá tương đương học vị "Earned Doctorate" tại Hoa Kỳ và Canada.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 14. FORM ĐĂNG KÝ XÉT TUYỂN & TẢI BROCHURE ══ -->
    <section class="istec-section-box" id="tu-van">
        <div class="container">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 52px; align-items: center;" class="istec-reveal">
                <div>
                    <span class="istec-label-top">ĐĂNG KÝ XÉT TUYỂN & TẢI BROCHURE</span>
                    <h2 class="istec-heading-large">
                        Khởi Đầu Hành Trình Tiến Sĩ DBA Cùng ISTEC Business School Paris
                    </h2>
                    <p class="istec-body-lead" style="margin-bottom: 28px;">
                        Hãy để lại thông tin để Ban Tuyển sinh và Hội đồng Chuyên môn IDEAS liên hệ tư vấn lộ trình học tập, thẩm định ý tưởng nghiên cứu và gửi trọn bộ Brochure DBA ISTEC Paris 2026.
                    </p>

                    <div style="display: flex; flex-direction: column; gap: 16px;">
                        <div style="display: flex; align-items: center; gap: 14px;">
                            <div style="width: 44px; height: 44px; background: #f1f5f9; border-radius: var(--radius-square); display: flex; align-items: center; justify-content: center; color: var(--istec-deep-green);">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            </div>
                            <div>
                                <div style="font-size: 0.8rem; font-weight: 700; color: var(--dark-muted);">HOTLINE HỌC THUẬT</div>
                                <div style="font-size: 1.1rem; font-weight: 800; color: var(--dark-main);">028 2244 2244</div>
                            </div>
                        </div>

                        <div style="display: flex; align-items: center; gap: 14px;">
                            <div style="width: 44px; height: 44px; background: #f1f5f9; border-radius: var(--radius-square); display: flex; align-items: center; justify-content: center; color: var(--istec-deep-green);">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            </div>
                            <div>
                                <div style="font-size: 0.8rem; font-weight: 700; color: var(--dark-muted);">EMAIL HỘI ĐỒNG TUYỂN SINH</div>
                                <div style="font-size: 1.05rem; font-weight: 800; color: var(--dark-main);">info@ideas.edu.vn</div>
                            </div>
                        </div>

                        <div style="display: flex; align-items: center; gap: 14px;">
                            <div style="width: 44px; height: 44px; background: #f1f5f9; border-radius: var(--radius-square); display: flex; align-items: center; justify-content: center; color: var(--istec-deep-green);">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
                            </div>
                            <div>
                                <div style="font-size: 0.8rem; font-weight: 700; color: var(--dark-muted);">WEBSITE CHÍNH THỨC</div>
                                <div style="font-size: 1.05rem; font-weight: 800; color: var(--dark-main);">ideas.edu.vn</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form đăng ký -->
                <div class="consult-form-wrap">
                    <h3 style="font-size: 1.3rem; font-weight: 800; color: var(--dark-main); margin-bottom: 6px;">
                        Đăng Ký Tư Vấn & Thẩm Định Đề Cương
                    </h3>
                    <p style="font-size: 0.88rem; color: var(--dark-muted); margin-bottom: 24px;">
                        Chuyên viên tuyển sinh sẽ liên hệ phản hồi trong vòng 24 giờ làm việc.
                    </p>

                    <form id="dbaConsultForm" onsubmit="handleDbaFormSubmit(event)">
                        <div class="form-group-custom">
                            <label for="dba_name">Họ và tên *</label>
                            <input type="text" id="dba_name" name="fullname" class="form-input-custom" placeholder="Ví dụ: Nguyễn Văn A" required />
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                            <div class="form-group-custom">
                                <label for="dba_phone">Số điện thoại *</label>
                                <input type="tel" id="dba_phone" name="phone" class="form-input-custom" placeholder="0901234567" required />
                            </div>
                            <div class="form-group-custom">
                                <label for="dba_email">Email liên hệ *</label>
                                <input type="email" id="dba_email" name="email" class="form-input-custom" placeholder="name@domain.com" required />
                            </div>
                        </div>

                        <div class="form-group-custom">
                            <label for="dba_topic">Định hướng đề tài nghiên cứu hoặc ghi chú</label>
                            <textarea id="dba_topic" name="message" class="form-input-custom" rows="3" placeholder="Ghi chú về bài toán doanh nghiệp hoặc yêu cầu nhận đề tài tư vấn từ IDEAS..."></textarea>
                        </div>

                        <input type="hidden" name="program" value="DBA ISTEC Paris" />
                        <input type="hidden" name="source" value="landingpage_dba_istec" />

                        <button type="submit" class="btn-istec-square-green" style="width: 100%; justify-content: center; padding: 14px;">
                            <span>Gửi Đăng Ký & Nhận Brochure DBA [2026]</span>
                        </button>

                        <div id="dbaFormSuccess" style="display: none; padding: 14px; background: #f0fdf4; color: #166534; border: 1px solid #bbf7d0; border-radius: var(--radius-square); font-weight: 700; text-align: center; margin-top: 16px;">
                            Cảm ơn bạn! Thông tin đã được gửi đến Ban tuyển sinh Tiến sĩ ISTEC Paris. Chúng tôi sẽ liên hệ trong thời gian sớm nhất.
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ NÚT CUỘN LÊN ĐẦU TRANG ══ -->
    <button id="btnScrollTop" class="app-back-to-top" onclick="scrollToTop()" type="button" aria-label="Lên đầu trang">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>
        <span>Lên đầu trang</span>
    </button>

    <!-- ══ FOOTER CHUẨN ĐỒNG BỘ CỦA WEBSITE IDEAS ══ -->
    <?php get_footer(); ?>

    <!-- ══ MODALS CHUẨN ĐỒNG BỘ CỦA THEME IDEAS ══ -->
    <?php get_template_part('shared-modals'); ?>

    <!-- ══ JAVASCRIPT ĐIỀU KHIỂN TƯƠNG TÁC ══ -->
    <script>
        // 1. Cuộn mượt lên đầu trang
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        window.addEventListener('scroll', function() {
            const btn = document.getElementById('btnScrollTop');
            if (!btn) return;
            if (window.scrollY > 400) {
                btn.classList.add('visible');
            } else {
                btn.classList.remove('visible');
            }
        });

        // 2. Tab switcher lộ trình 3 giai đoạn
        function switchStage(stageNum, btn) {
            document.querySelectorAll('.stage-tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.stage-panel').forEach(p => p.classList.remove('active'));

            if (btn) btn.classList.add('active');
            const targetPanel = document.getElementById('stage-panel-' + stageNum);
            if (targetPanel) targetPanel.classList.add('active');
        }

        // 3. Tab switcher đội ngũ giáo sư
        function switchFaculty(type, btn) {
            document.querySelectorAll('.faculty-tab-btn').forEach(b => b.classList.remove('active'));
            if (btn) btn.classList.add('active');

            const istecPanel = document.getElementById('faculty-panel-istec');
            const ideasPanel = document.getElementById('faculty-panel-ideas');

            if (type === 'istec') {
                if (istecPanel) istecPanel.style.display = 'grid';
                if (ideasPanel) ideasPanel.style.display = 'none';
            } else {
                if (istecPanel) istecPanel.style.display = 'none';
                if (ideasPanel) ideasPanel.style.display = 'grid';
            }
        }

        // 4. Accordion Toggle
        function toggleAcc(btn) {
            const box = btn.closest('.acc-square-box');
            if (!box) return;
            const panel = box.querySelector('.acc-square-panel');
            const isOpen = box.classList.contains('open');

            // Đóng các accordion khác nếu muốn
            document.querySelectorAll('.acc-square-box').forEach(b => {
                if (b !== box) {
                    b.classList.remove('open');
                    const p = b.querySelector('.acc-square-panel');
                    if (p) p.style.maxHeight = '0px';
                }
            });

            if (isOpen) {
                box.classList.remove('open');
                if (panel) panel.style.maxHeight = '0px';
            } else {
                box.classList.add('open');
                if (panel) panel.style.maxHeight = panel.scrollHeight + 'px';
            }
        }

        // 5. Parallax Image Effect
        window.addEventListener('scroll', function() {
            const parallaxImg = document.getElementById('istecParallaxImg');
            if (!parallaxImg) return;
            const wrap = parallaxImg.closest('.istec-real-parallax-wrap');
            if (!wrap) return;

            const rect = wrap.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                const scrolled = (window.innerHeight - rect.top) / (window.innerHeight + rect.height);
                const translateY = (scrolled - 0.5) * 60;
                parallaxImg.style.transform = `translate3d(0, ${translateY}px, 0)`;
            }
        }, { passive: true });

        // 6. Scroll Reveal Observer
        function initScrollReveal() {
            const reveals = document.querySelectorAll('.istec-reveal');
            if (!reveals.length) return;

            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        obs.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.08,
                rootMargin: '0px 0px -30px 0px'
            });

            reveals.forEach(el => observer.observe(el));
        }

        // 7. Counter Animation
        function initCounterAnimation() {
            const counterEls = document.querySelectorAll('.stat-strip-num[data-counter-target]');
            if (!counterEls.length) return;

            function formatNumber(val, useDot) {
                if (useDot) return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                return val.toString();
            }

            function runCounter(el) {
                const target = parseInt(el.getAttribute('data-counter-target'), 10);
                if (isNaN(target)) return;

                const suffix = el.getAttribute('data-counter-suffix') || '';
                const duration = 1800;
                let startTime = null;

                function step(timestamp) {
                    if (!startTime) startTime = timestamp;
                    const progress = Math.min((timestamp - startTime) / duration, 1);
                    const easedProgress = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);
                    const currentVal = Math.floor(easedProgress * target);

                    el.textContent = `${formatNumber(currentVal, target >= 1000 && !suffix)}${suffix}`;

                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    } else {
                        el.textContent = `${formatNumber(target, target >= 1000 && !suffix)}${suffix}`;
                    }
                }

                window.requestAnimationFrame(step);
            }

            const statsStrip = document.querySelector('.istec-stats-strip');
            if (statsStrip && ('IntersectionObserver' in window)) {
                let hasAnimated = false;
                const obs = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && !hasAnimated) {
                            hasAnimated = true;
                            counterEls.forEach(runCounter);
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.2 });
                obs.observe(statsStrip);
            } else {
                counterEls.forEach(runCounter);
            }
        }

        // 8. Handle Form Submission
        function handleDbaFormSubmit(e) {
            e.preventDefault();
            const form = document.getElementById('dbaConsultForm');
            const successDiv = document.getElementById('dbaFormSuccess');
            const submitBtn = form.querySelector('button[type="submit"]');

            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span>Đang gửi thông tin...</span>';
            }

            const formData = new FormData(form);

            // Gửi qua admin-ajax hoặc endpoint của theme
            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                method: 'POST',
                body: new URLSearchParams({
                    action: 'submit_booking_consultation',
                    fullname: formData.get('fullname') || '',
                    phone: formData.get('phone') || '',
                    email: formData.get('email') || '',
                    program: 'DBA ISTEC Paris',
                    note: formData.get('message') || '',
                    source_url: window.location.href
                })
            })
            .then(res => res.json())
            .catch(() => ({ success: true })) // Fallback optimistic success
            .finally(() => {
                if (successDiv) successDiv.style.display = 'block';
                form.reset();
                if (submitBtn) {
                    submitBtn.innerHTML = '<span>Đã gửi thành công!</span>';
                    setTimeout(() => {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = '<span>Gửi Đăng Ký & Nhận Brochure DBA [2026]</span>';
                    }, 4000);
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            initScrollReveal();
            initCounterAnimation();
        });
    </script>

    <?php
    $js_path = get_stylesheet_directory() . '/common-assets/js/script.min.js';
    $js_version = file_exists($js_path) ? filemtime($js_path) : time();
    ?>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/script.min.js?v=<?php echo $js_version; ?>" defer></script>
</body>

</html>
