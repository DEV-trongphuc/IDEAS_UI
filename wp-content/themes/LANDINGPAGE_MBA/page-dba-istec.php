<?php
/**
 * Template Name: Premium DBA ISTEC Paris Template
 * Description: Trang giới thiệu chương trình Tiến sĩ Quản trị Kinh doanh (Doctorate of Business Administration - DBA) ISTEC Business School Paris
 */

if (!defined('ABSPATH')) {
    $wp_load = dirname(dirname(dirname(__DIR__))) . '/wp-load.php';
    if (file_exists($wp_load)) {
        require_once $wp_load;
    }
}

global $wp;

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

    <?php
    define('BOOKING_MODAL_CSS_LOADED', true);
    $bk_css_path = get_stylesheet_directory() . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/booking-modal.min.css?v=<?php echo $bk_css_version; ?>"
        media="print" onload="this.media='all'" />

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title>DBA ISTEC Business School Paris | Tiến Sĩ Quản Trị Kinh Doanh Chuẩn Pháp Bac+8</title>
        <meta name="description" content="Chương trình Tiến sĩ Quản trị Kinh doanh (DBA) trực tuyến từ ISTEC Business School Paris. 03 năm, 180 ECTS, 03 AI Copilot chuyên dụng, WES Earned Doctorate tại Hoa Kỳ & Canada." />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="DBA ISTEC Business School Paris | Chuẩn Giáo Dục Tiến Sĩ Pháp Bac+8" />
        <meta property="og:description" content="Chuyển hóa bài toán thực tế thành mô hình quản trị. Bằng Tiến sĩ do ISTEC Paris trực tiếp cấp, WES đánh giá tương đương Earned Doctorate tại Mỹ và Canada." />
        <meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/istec-grand-rex-paris.jpg" />
        <meta property="og:url" content="<?php echo esc_url(home_url('/dba-istec')); ?>" />
    <?php endif; ?>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Course",
      "name": "Tiến sĩ Quản trị Kinh doanh (DBA) – ISTEC Business School Paris",
      "description": "Chương trình Tiến sĩ Quản trị Kinh doanh (DBA) trực tuyến từ ISTEC Paris, 03 năm, 180 ECTS, 03 AI Copilot, văn bằng WES Earned Doctorate.",
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
        "description": "Học phí trọn gói chương trình DBA ISTEC Paris: 13.000 EUR",
        "url": "https://ideas.edu.vn/dba-istec"
      }
    }
    </script>

    <style>
        :root {
            --istec-deep-green: #005C4D;
            --istec-deep-hover: #004439;
            --istec-bright-green: #61A60E;
            --istec-teal: #00876C;
            --dark-main: #111827;
            --dark-sub: #374151;
            --dark-muted: #6b7280;
            --border-light: #e5e7eb;
            --border-subtle: #f3f4f6;
            --bg-page: #ffffff;
            --bg-alt: #f9fafb;
            --radius-square: 4px;
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

        button, a, input[type="submit"], input[type="button"], select, .acc-square-header {
            cursor: pointer !important;
        }

        /* ── HERO SECTION ── */
        .istec-hero-container {
            padding: 105px 0 55px;
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
            background: radial-gradient(circle, rgba(97, 166, 14, 0.09) 0%, rgba(0, 92, 77, 0.03) 50%, transparent 70%);
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
            animation: spinSlow 60s linear infinite;
        }

        .istec-hero-flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 48px;
            margin-bottom: 36px;
            position: relative;
            z-index: 2;
        }

        .istec-hero-main-content {
            flex: 1;
            min-width: 0;
        }

        .istec-spec-box {
            flex: 0 0 340px;
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 26px 22px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
            align-self: center;
        }

        .spec-item {
            margin-bottom: 13px;
        }

        .spec-item:last-child {
            margin-bottom: 0;
        }

        .spec-label {
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--istec-teal);
            margin-bottom: 3px;
        }

        .spec-value {
            font-size: 0.92rem;
            font-weight: 700;
            color: var(--dark-main);
            line-height: 1.4;
        }

        .spec-divider {
            height: 1px;
            background: var(--border-subtle);
            margin: 11px 0;
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
            font-size: 1.08rem;
            font-weight: 700;
            color: var(--istec-bright-green);
            margin-bottom: 16px;
            text-wrap: balance;
        }

        .istec-hero-paragraph {
            font-size: 1rem;
            color: var(--dark-sub);
            line-height: 1.65;
            margin-bottom: 24px;
            max-width: 720px;
        }

        .btn-istec-square-dark {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: #1a1a1a;
            color: #ffffff !important;
            padding: 12px 24px;
            border-radius: var(--radius-square);
            font-size: 0.92rem;
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
            gap: 9px;
            background: var(--istec-bright-green);
            color: #ffffff !important;
            padding: 12px 24px;
            border-radius: var(--radius-square);
            font-size: 0.92rem;
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
            gap: 9px;
            background: transparent;
            color: var(--istec-deep-green) !important;
            padding: 11px 22px;
            border-radius: var(--radius-square);
            font-size: 0.92rem;
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
            gap: 12px;
            flex-wrap: wrap;
        }

        /* ── HERO TRUST BLOCK ── */
        .istec-hero-trust-block {
            margin-top: 22px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .istec-hero-cge-card {
            display: flex;
            align-items: center;
            gap: 14px;
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid rgba(0, 92, 77, 0.16);
            border-left: 4px solid var(--istec-deep-green);
            border-radius: var(--radius-square);
            padding: 12px 16px;
            box-shadow: 0 4px 16px rgba(0, 44, 36, 0.05);
        }

        .hero-cge-logo-box {
            flex: 0 0 85px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            padding: 6px;
            border-radius: 4px;
            border: 1px solid rgba(0, 0, 0, 0.06);
        }

        .hero-cge-img {
            max-width: 100%;
            height: auto;
            max-height: 40px;
            object-fit: contain;
            display: block;
        }

        .hero-cge-text-box {
            flex: 1;
            min-width: 0;
        }

        .hero-cge-title {
            font-size: 0.84rem;
            font-weight: 800;
            color: var(--istec-deep-green);
            letter-spacing: 0.02em;
            margin-bottom: 4px;
            line-height: 1.3;
        }

        .hero-cge-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .hero-cge-list li {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.8rem;
            color: var(--dark-sub);
            line-height: 1.35;
        }

        .hero-cge-list li svg {
            flex-shrink: 0;
            color: var(--istec-bright-green);
        }

        .hero-cge-bac8-badge {
            flex: 0 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: rgba(0, 92, 77, 0.08);
            border: 2px solid var(--istec-deep-green);
            border-radius: var(--radius-square);
            padding: 6px 14px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 92, 77, 0.1);
        }

        .hero-cge-bac8-badge .bac8-val {
            font-size: 1.6rem;
            font-weight: 900;
            color: var(--istec-deep-green);
            line-height: 1;
            letter-spacing: -0.02em;
        }

        .hero-cge-bac8-badge .bac8-lbl {
            font-size: 0.65rem;
            font-weight: 800;
            color: var(--istec-deep-green);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-top: 3px;
            white-space: nowrap;
        }

        .istec-hero-acc-wrap {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 10px 16px;
        }

        .hero-acc-header {
            margin-bottom: 6px;
        }

        .hero-acc-label {
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--dark-muted);
        }

        .hero-acc-logos-strip {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .hero-acc-badge {
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-acc-badge img {
            max-height: 26px;
            width: auto;
            object-fit: contain;
            filter: grayscale(30%);
            opacity: 0.85;
            transition: all 0.2s ease;
        }

        .hero-acc-badge:hover img {
            filter: grayscale(0%);
            opacity: 1;
        }

        .badge-wes-text {
            background: #0f172a;
            color: #ffffff;
            font-size: 0.7rem;
            font-weight: 800;
            padding: 4px 8px;
            border-radius: 3px;
            letter-spacing: 0.04em;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .badge-wes-text span {
            color: #38bdf8;
        }

        /* ── PARALLAX BANNER ── */
        .istec-real-parallax-wrap {
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
            height: 400px;
            overflow: hidden;
            display: flex;
            align-items: flex-end;
            padding: 28px 48px;
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
            padding: 8px 18px;
            border-radius: var(--radius-square);
            font-size: 0.8rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.25);
        }

        /* ── SECTIONS ── */
        .istec-section-box {
            padding: 65px 0;
            background: #ffffff;
            position: relative;
        }

        .istec-section-box.bg-alt {
            background: var(--bg-alt);
            border-top: 1px solid var(--border-light);
            border-bottom: 1px solid var(--border-light);
        }

        .istec-section-box.bg-brand-green {
            background: linear-gradient(135deg, #00463a 0%, #005C4D 60%, #003e34 100%);
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .istec-section-box.bg-brand-green .istec-label-top {
            color: #86efac;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(134, 239, 172, 0.3);
            padding: 4px 14px;
            border-radius: var(--radius-square);
            letter-spacing: 0.12em;
            display: inline-block;
        }

        .istec-section-box.bg-brand-green .istec-heading-large {
            color: #ffffff;
        }

        .diff-grid-4 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .istec-label-top {
            font-size: 0.76rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--istec-teal);
            margin-bottom: 6px;
            display: inline-block;
        }

        .istec-heading-large {
            font-size: clamp(1.45rem, 2.3vw, 1.95rem);
            font-weight: 800;
            color: var(--dark-main);
            margin-bottom: 12px;
            line-height: 1.3;
            letter-spacing: -0.015em;
            text-wrap: balance;
        }

        .istec-body-lead {
            font-size: 0.95rem;
            color: var(--dark-sub);
            line-height: 1.6;
            max-width: 740px;
        }

        /* ── STATS STRIP ── */
        .istec-stats-strip {
            background: #111827;
            color: #ffffff;
            padding: 40px 0;
        }

        .stats-grid-5 {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
        }

        .stat-item {
            text-align: center;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            padding: 0 10px;
        }

        .stat-item:last-child {
            border-right: none;
        }

        .stat-strip-num {
            font-size: clamp(1.75rem, 2.5vw, 2.4rem);
            font-weight: 800;
            color: var(--istec-bright-green);
            line-height: 1.1;
            margin-bottom: 4px;
        }

        .stat-strip-label {
            font-size: 0.78rem;
            font-weight: 600;
            color: #94a3b8;
            line-height: 1.35;
        }

        /* ── CARDS VUÔNG VỨC ── */
        .istec-square-card {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 22px 18px;
            box-shadow: var(--shadow-card);
            transition: all 0.25s ease;
            position: relative;
        }

        .istec-square-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
            border-color: rgba(0, 92, 77, 0.3);
        }

        .card-icon-wrap {
            width: 42px;
            height: 42px;
            background: rgba(0, 92, 77, 0.08);
            color: var(--istec-deep-green);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius-square);
            margin-bottom: 12px;
        }

        .card-title-bold {
            font-size: 1.02rem;
            font-weight: 800;
            color: var(--dark-main);
            margin-bottom: 7px;
            line-height: 1.35;
        }

        .card-text-muted {
            font-size: 0.86rem;
            color: var(--dark-sub);
            line-height: 1.5;
            margin: 0;
        }

        /* ── 2 PHƯƠNG ÁN ĐỀ TÀI ── */
        .topic-plan-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
            margin-top: 26px;
        }

        .topic-plan-card {
            background: #ffffff;
            border: 1.5px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 28px 24px;
            position: relative;
            transition: all 0.25s ease;
        }

        .topic-plan-card.highlight {
            border-color: var(--istec-deep-green);
            background: #fafcfb;
        }

        .topic-plan-card:hover {
            box-shadow: var(--shadow-hover);
            transform: translateY(-2px);
        }

        .topic-badge {
            display: inline-block;
            background: var(--istec-deep-green);
            color: #ffffff;
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            padding: 4px 11px;
            border-radius: var(--radius-square);
            margin-bottom: 12px;
        }

        .topic-badge.alt {
            background: var(--istec-bright-green);
        }

        /* ── 3 AI AGENTS ── */
        .ai-agents-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-top: 26px;
        }

        .ai-agent-card {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-top: 3px solid var(--istec-deep-green);
            border-radius: var(--radius-square);
            padding: 24px 20px;
            box-shadow: var(--shadow-card);
            transition: all 0.25s ease;
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
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }

        .ai-agent-tag {
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--istec-teal);
            margin-bottom: 4px;
        }

        .ai-agent-name {
            font-size: 1.05rem;
            font-weight: 800;
            color: var(--dark-main);
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .ai-agent-features {
            list-style: none;
            padding: 0;
            margin: 12px 0 0;
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .ai-agent-features li {
            font-size: 0.84rem;
            color: var(--dark-sub);
            line-height: 1.4;
            display: flex;
            align-items: flex-start;
            gap: 6px;
        }

        .ai-agent-features li svg {
            flex-shrink: 0;
            color: var(--istec-bright-green);
            margin-top: 2px;
        }

        /* ── CLEAN TABS (GIAI ĐOẠN 1 - GIAI ĐOẠN 2 - GIAI ĐOẠN 3) ── */
        .stage-tabs-nav {
            display: flex;
            justify-content: center;
            gap: 12px;
            border-bottom: 2px solid var(--border-light);
            margin-bottom: 26px;
            padding-bottom: 0;
        }

        .stage-tab-btn {
            background: none;
            border: none;
            padding: 12px 28px;
            font-size: 1rem;
            font-weight: 800;
            color: var(--dark-muted);
            border-bottom: 3px solid transparent;
            margin-bottom: -2px;
            transition: all 0.2s ease;
            text-align: center;
            cursor: pointer;
        }

        .stage-tab-btn:hover {
            color: var(--istec-deep-green);
        }

        .stage-tab-btn.active {
            color: var(--istec-deep-green);
            border-bottom-color: var(--istec-deep-green);
        }

        .stage-panel {
            display: none;
        }

        .stage-panel.active {
            display: block;
            animation: fadeIn 0.2s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(4px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .stage-card-main {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 28px 24px;
            box-shadow: var(--shadow-card);
        }

        .rubric-grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin-top: 18px;
        }

        .rubric-card {
            background: #f8fafc;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 14px 12px;
            text-align: left;
        }

        .rubric-percent {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--istec-deep-green);
            line-height: 1;
            margin-bottom: 3px;
        }

        .rubric-title {
            font-size: 0.86rem;
            font-weight: 800;
            color: var(--dark-main);
            margin-bottom: 4px;
            line-height: 1.3;
        }

        .rubric-desc {
            font-size: 0.78rem;
            color: var(--dark-sub);
            line-height: 1.4;
            margin: 0;
        }

        /* ── FACULTY ── */
        .faculty-tabs-nav {
            display: flex;
            gap: 10px;
            margin-bottom: 22px;
            justify-content: center;
        }

        .faculty-tab-btn {
            background: #f1f5f9;
            border: 1px solid var(--border-light);
            padding: 8px 18px;
            font-size: 0.88rem;
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
            gap: 18px;
        }

        .faculty-card {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 18px 14px;
            text-align: center;
            box-shadow: var(--shadow-card);
            transition: all 0.25s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .faculty-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
            border-color: rgba(0, 92, 77, 0.3);
        }

        .faculty-avatar-wrap {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid #e2e8f0;
            margin-bottom: 10px;
            background: #f1f5f9;
            flex-shrink: 0;
        }

        .faculty-avatar-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .faculty-name {
            font-size: 0.92rem;
            font-weight: 800;
            color: var(--dark-main);
            margin-bottom: 2px;
            line-height: 1.3;
        }

        .faculty-role {
            font-size: 0.76rem;
            font-weight: 700;
            color: var(--istec-teal);
            margin-bottom: 5px;
            line-height: 1.25;
        }

        .faculty-desc {
            font-size: 0.76rem;
            color: var(--dark-muted);
            line-height: 1.35;
            margin: 0;
        }

        /* ── DIPLOMA & GRADUATION ── */
        .diploma-showcase-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 32px;
            align-items: center;
        }

        .diploma-img-card {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 10px;
            box-shadow: var(--shadow-hover);
        }

        .diploma-img-card img {
            width: 100%;
            height: auto;
            display: block;
        }

        .grad-gallery-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-top: 16px;
        }

        .grad-gallery-item {
            height: 150px;
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
            transform: scale(1.04);
        }

        /* ── TUITION BOX ── */
        .tuition-square-card {
            max-width: 780px;
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
            padding: 30px 24px;
            text-align: center;
        }

        .tuition-price-headline {
            font-size: clamp(2.2rem, 3.4vw, 2.9rem);
            font-weight: 800;
            color: var(--istec-bright-green);
            line-height: 1.1;
            margin: 6px 0;
        }

        .tuition-body-pad {
            padding: 28px 24px;
        }

        .tuition-list {
            list-style: none;
            padding: 0;
            margin: 0 0 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .tuition-list li {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            font-size: 0.9rem;
            color: var(--dark-sub);
            line-height: 1.45;
        }

        .tuition-list li svg {
            flex-shrink: 0;
            color: var(--istec-bright-green);
            margin-top: 2px;
        }

        /* ── ADMISSION SECTION (CARD HỒ SƠ MÀU XANH BRAND ISTEC) ── */
        .admission-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
        }

        .admission-card-white {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 28px 24px;
            box-shadow: var(--shadow-card);
        }

        .admission-card-istec-green {
            background: var(--istec-deep-green);
            color: #ffffff;
            border: 1px solid var(--istec-deep-hover);
            border-radius: var(--radius-square);
            padding: 28px 24px;
            box-shadow: 0 8px 28px rgba(0, 92, 77, 0.2);
        }

        /* ── COMBINED SECTION: FAQ (CỘT TRÁI) + FORM (CỘT PHẢI) ── */
        .faq-form-grid-2 {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 36px;
            align-items: flex-start;
        }

        .faq-col-left {
            min-width: 0;
        }

        .form-col-right {
            position: sticky;
            top: 85px;
        }

        .acc-square-box {
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            margin-bottom: 9px;
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
            padding: 15px 18px;
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
            font-size: 0.94rem;
            font-weight: 750;
            color: var(--dark-main);
            padding-right: 10px;
            line-height: 1.35;
        }

        .acc-square-panel {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            background: #ffffff;
        }

        .acc-square-content {
            padding: 0 18px 15px;
            font-size: 0.86rem;
            color: var(--dark-sub);
            line-height: 1.55;
        }

        .consult-form-wrap {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 26px 22px;
            box-shadow: var(--shadow-card);
        }

        .form-group-custom {
            margin-bottom: 14px;
        }

        .form-group-custom label {
            display: block;
            font-size: 0.82rem;
            font-weight: 700;
            color: var(--dark-main);
            margin-bottom: 4px;
        }

        .form-input-custom {
            width: 100%;
            padding: 10px 13px;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            font-size: 0.88rem;
            color: var(--dark-main);
            outline: none;
            transition: border-color 0.2s ease;
        }

        .form-input-custom:focus {
            border-color: var(--istec-deep-green);
            box-shadow: 0 0 0 3px rgba(0, 92, 77, 0.08);
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
            padding: 8px 12px;
            font-size: 0.78rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 6px;
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

        .istec-reveal {
            opacity: 0;
            transform: translateY(14px);
            transition: opacity 0.4s ease, transform 0.4s ease;
        }

        .istec-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 1024px) {
            .istec-hero-container {
                padding-top: 125px !important;
            }
            .istec-hero-flex {
                flex-direction: column !important;
                gap: 26px;
            }
            .istec-spec-box {
                flex: none;
                width: 100%;
            }
            .stats-grid-5 {
                grid-template-columns: repeat(2, 1fr);
                gap: 16px;
            }
            .stat-item:nth-child(2) {
                border-right: none;
            }
            .topic-plan-grid {
                grid-template-columns: 1fr;
            }
            .diff-grid-4 {
                grid-template-columns: repeat(2, 1fr);
                gap: 16px;
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
            .admission-grid {
                grid-template-columns: 1fr;
            }
            .faq-form-grid-2 {
                grid-template-columns: 1fr;
                gap: 32px;
            }
            .form-col-right {
                position: static;
            }
        }

        @media (max-width: 640px) {
            .diff-grid-4 {
                grid-template-columns: 1fr;
                gap: 14px;
            }
            .stage-tabs-nav {
                display: flex;
                flex-direction: row;
                justify-content: center;
                gap: 6px;
                border-bottom: 2px solid var(--border-light);
            }
            .stage-tab-btn {
                padding: 10px 14px;
                font-size: 0.88rem;
                white-space: nowrap;
            }
            .stats-grid-5 {
                grid-template-columns: 1fr;
            }
            .stat-item {
                border-right: none;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                padding-bottom: 12px;
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
            .istec-hero-cge-card {
                flex-wrap: wrap;
                gap: 12px;
            }
            .hero-cge-bac8-badge {
                width: 100%;
                flex-direction: row;
                justify-content: center;
                gap: 8px;
                padding: 8px 12px;
            }
            .hero-cge-bac8-badge .bac8-val {
                font-size: 1.35rem;
            }
            .hero-cge-bac8-badge .bac8-lbl {
                margin-top: 0;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>

    <!-- ══ HEADER ĐỒNG BỘ CHUẨN IDEAS ══ -->
    <?php get_template_part('shared-header'); ?>

    <!-- ══ 1. HERO SECTION ══ -->
    <section class="istec-hero-container">
        <div class="istec-decor-bg" aria-hidden="true">
            <div class="ambient-glow-green" style="width: 480px; height: 480px; top: -120px; left: -50px;"></div>
            <div class="istec-decor-item anim-spin-slow" style="top: -80px; left: -80px; width: 400px; height: 400px; opacity: 0.1;">
                <svg viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <circle cx="200" cy="200" r="190" stroke="#005C4D" stroke-width="1.2" stroke-dasharray="6 6"/>
                    <circle cx="200" cy="200" r="150" stroke="#61A60E" stroke-width="1.5"/>
                    <circle cx="200" cy="200" r="100" stroke="#005C4D" stroke-width="1" stroke-dasharray="3 4"/>
                </svg>
            </div>
        </div>

        <div class="container">
            <div class="istec-hero-flex istec-reveal is-visible">
                <!-- Cột trái: Nội dung chính -->
                <div class="istec-hero-main-content">
                    <div style="margin-bottom: 16px;">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/logo-istec-paris.svg" 
                             alt="ISTEC Business School Paris Logo" 
                             style="height: 64px; width: auto; display: block;" />
                    </div>

                    <h1 class="istec-hero-headline">
                        <span class="hl-dark">DBA</span> <span class="hl-green">Doctorate of Business Administration</span>
                    </h1>

                    <div class="istec-hero-sub-title">
                        Kiến tạo Tri thức Quản trị Thực chiến & Nâng tầm Nhà Tư tưởng Doanh nghiệp (Thought Leader)
                    </div>

                    <p class="istec-hero-paragraph">
                        Chuyển hóa bài toán quản trị thực tế thành mô hình có tính khái quát cao và đóng góp tri thức mới. Văn bằng Tiến sĩ DBA do ISTEC Paris trực tiếp cấp, được WES đánh giá tương đương <strong>"Earned Doctorate"</strong> tại Hoa Kỳ và Canada.
                    </p>

                    <div class="istec-hero-btn-group">
                        <a href="#faq-dang-ky" class="btn-istec-square-dark">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            <span>Đăng ký xét tuyển DBA</span>
                        </a>
                        <a href="#khung-dao-tao" class="btn-istec-square-green">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 9l-7 7-7-7"/></svg>
                            <span>Lộ trình 3 năm</span>
                        </a>
                        <a href="#faq-dang-ky" class="btn-istec-square-outline">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M7 10l5 5 5-5M12 15V3"/></svg>
                            <span>Nhận Brochure</span>
                        </a>
                    </div>

                    <!-- Khối CGE & Dàn Logo Kiểm Định -->
                    <div class="istec-hero-trust-block">
                        <div class="istec-hero-cge-card">
                            <div class="hero-cge-logo-box">
                                <img src="https://istec.fr/wp-content/uploads/2025/07/CGE.webp" 
                                     alt="Conférence des Grandes Écoles (CGE)" 
                                     class="hero-cge-img" />
                            </div>
                            <div class="hero-cge-text-box">
                                <div class="hero-cge-title">GRANDE ÉCOLE – CHUẨN GIÁO DỤC TIẾN SĨ PHÁP</div>
                                <ul class="hero-cge-list">
                                    <li>
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8"><polyline points="20 6 9 17 4 12"/></svg>
                                        <span>Bậc đào tạo Tiến sĩ Chuyên nghiệp Pro – Bac+8 (EQF Level 8) cao nhất Châu Âu</span>
                                    </li>
                                    <li>
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8"><polyline points="20 6 9 17 4 12"/></svg>
                                        <span>Đánh giá WES (Hoa Kỳ & Canada): tương đương học vị <strong>Earned Doctorate</strong></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="hero-cge-bac8-badge">
                                <span class="bac8-val">BAC +8</span>
                                <span class="bac8-lbl">HỌC VỊ TIẾN SĨ</span>
                            </div>
                        </div>

                        <div class="istec-hero-acc-wrap">
                            <div class="hero-acc-header">
                                <span class="hero-acc-label">HỆ THỐNG CÔNG NHẬN & KIỂM ĐỊNH QUỐC TẾ:</span>
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
                        <div class="spec-label">GLOBAL EVALUATION • QUỐC TẾ</div>
                        <div class="spec-value">WES Đánh giá "Earned Doctorate" (Mỹ & Canada)</div>
                    </div>

                    <div class="spec-divider"></div>

                    <div class="spec-item">
                        <div class="spec-label">TUITION • HỌC PHÍ TRỌN GÓI</div>
                        <div class="spec-value" style="color: var(--istec-deep-green); font-size: 1rem;">
                            13.000 EUR (Bao gồm AI Copilot 24/7 & Hỗ trợ IDEAS)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ PARALLAX BANNER ══ -->
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

    <!-- ══ 2. GIỚI THIỆU TRƯỜNG & THÔNG ĐIỆP LÃNH ĐẠO ══ -->
    <section class="istec-section-box">
        <div class="container">
            <div style="display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 40px; align-items: center;" class="istec-reveal">
                <div>
                    <span class="istec-label-top">VỀ TRƯỜNG KINH DOANH ISTEC PARIS</span>
                    <h2 class="istec-heading-large">
                        Grande École Hơn 65 Năm Đào Tạo Quản Trị Tại Paris
                    </h2>
                    <p class="istec-body-lead" style="margin-bottom: 18px;">
                        Thành lập năm 1961 tại Paris, Istec Business School là trường kinh doanh tư thục danh giá được Nhà nước Pháp công nhận, thành viên của <strong>Conférence des Grandes Écoles (CGE)</strong> và được Bộ Giáo dục Đại học Pháp cấp Visa Bac+5, Grade de Master.
                    </p>
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#61A60E" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span style="font-weight: 700; color: var(--dark-main); font-size: 0.92rem;">Hệ sinh thái giáo dục & kinh doanh tại trung tâm Châu Âu (Paris, France).</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#61A60E" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span style="font-weight: 700; color: var(--dark-main); font-size: 0.92rem;">Đào tạo bậc Tiến sĩ Pro - Bac+8 / EQF 8 dành riêng cho cấp quản lý & lãnh đạo.</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#61A60E" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span style="font-weight: 700; color: var(--dark-main); font-size: 0.92rem;">Văn bằng được WES đánh giá tương đương "Earned Doctorate" tại Mỹ & Canada.</span>
                        </div>
                    </div>
                </div>

                <!-- Quote Jean-Nicolas MANNONI -->
                <div style="background: #f8fafc; border: 1px solid var(--border-light); border-left: 4px solid var(--istec-deep-green); border-radius: var(--radius-square); padding: 26px 24px; box-shadow: var(--shadow-card);">
                    <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 14px;">
                        <div style="width: 64px; height: 64px; border-radius: 50%; overflow: hidden; border: 2px solid var(--istec-deep-green); flex-shrink: 0;">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p4_img2_437x475.jpeg" 
                                 alt="Jean-Nicolas MANNONI" 
                                 style="width: 100%; height: 100%; object-fit: cover;" />
                        </div>
                        <div>
                            <div style="font-size: 1.02rem; font-weight: 800; color: var(--dark-main);">Jean-Nicolas MANNONI</div>
                            <div style="font-size: 0.8rem; font-weight: 700; color: var(--istec-teal);">Tổng Giám đốc Istec Business School Paris</div>
                        </div>
                    </div>
                    <blockquote style="margin: 0; font-size: 0.92rem; font-style: italic; color: var(--dark-sub); line-height: 1.6; border: none; padding: 0;">
                        "Donner à chacun les moyens de ses ambitions – Kiến tạo nền tảng để mỗi người chạm tới tham vọng của mình. Tại Istec, triết lý <strong>Learning through Action</strong> kết hợp nền tảng học thuật với trải nghiệm thực tiễn để biến tri thức thành bản lĩnh nhà quản trị."
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 3. NĂNG LỰC ĐẦU RA (5 TRỤ CỘT) ══ -->
    <section class="istec-section-box bg-alt">
        <div class="container">
            <div style="text-align: center; max-width: 760px; margin: 0 auto 36px;" class="istec-reveal">
                <span class="istec-label-top">MỤC TIÊU ĐÀO TẠO</span>
                <h2 class="istec-heading-large">
                    5 Trụ Cột Năng Lực Cốt Lõi Của Tiến Sĩ Quản Trị
                </h2>
                <p class="istec-body-lead" style="margin: 0 auto;">
                    Thiết kế dành cho nhà quản lý, giám đốc và chuyên gia mong muốn chuyển hóa bài toán thực chiến thành khung quản trị chuẩn hóa.
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 16px;" class="istec-reveal">
                <div class="istec-square-card">
                    <div class="card-icon-wrap">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    </div>
                    <div class="card-title-bold">Nghiên Cứu Sâu</div>
                    <p class="card-text-muted">Phương pháp khoa học giải quyết các bài toán phức tạp trong quản trị doanh nghiệp.</p>
                </div>
                <div class="istec-square-card">
                    <div class="card-icon-wrap">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                    </div>
                    <div class="card-title-bold">Tư Duy Phản Biện</div>
                    <p class="card-text-muted">Đánh giá bằng chứng và thách thức giả định để định hình giải pháp đột phá.</p>
                </div>
                <div class="istec-square-card">
                    <div class="card-icon-wrap">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                    </div>
                    <div class="card-title-bold">Kết Nối Thực Tiễn</div>
                    <p class="card-text-muted">Gắn liền phương pháp nghiên cứu với bài toán kinh doanh cụ thể của tổ chức.</p>
                </div>
                <div class="istec-square-card">
                    <div class="card-icon-wrap">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                    </div>
                    <div class="card-title-bold">Kiến Tạo Tri Thức</div>
                    <p class="card-text-muted">Phát triển mô hình quản trị mới có tính chuyển giao và nhân rộng cho cộng đồng.</p>
                </div>
                <div class="istec-square-card">
                    <div class="card-icon-wrap">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <div class="card-title-bold">Tầm Chuyên Gia</div>
                    <p class="card-text-muted">Nâng tầm thành chuyên gia tư vấn độc lập và nhà tư tưởng quản trị (Thought Leader).</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 4. 4 ĐIỂM KHÁC BIỆT CỐT LÕI (NỀN XANH BRAND ISTEC) ══ -->
    <section class="istec-section-box bg-brand-green" id="diem-khac-biet">
        <div class="ambient-glow-green" style="width: 500px; height: 500px; top: -140px; right: -140px; opacity: 0.22; pointer-events: none;" aria-hidden="true"></div>
        <div class="ambient-glow-green" style="width: 400px; height: 400px; bottom: -120px; left: -100px; opacity: 0.18; pointer-events: none;" aria-hidden="true"></div>
        <div class="container" style="position: relative; z-index: 2;">
            <div style="text-align: center; max-width: 760px; margin: 0 auto 36px;" class="istec-reveal">
                <span class="istec-label-top">GIÁ TRỊ ĐỘT PHÁ</span>
                <h2 class="istec-heading-large">
                    4 Điểm Khác Biệt Cốt Lõi Của DBA ISTEC Paris
                </h2>
            </div>

            <div class="diff-grid-4 istec-reveal">
                <div class="istec-square-card" style="background: #ffffff; border-top: 4px solid var(--istec-deep-green); box-shadow: 0 10px 28px rgba(0, 30, 24, 0.25);">
                    <div class="card-icon-wrap" style="color: var(--istec-deep-green); background: rgba(0, 92, 77, 0.08);">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><line x1="9" y1="1" x2="9" y2="4"/><line x1="15" y1="1" x2="15" y2="4"/><line x1="9" y1="20" x2="9" y2="23"/><line x1="15" y1="20" x2="15" y2="23"/><line x1="20" y1="9" x2="23" y2="9"/><line x1="20" y1="14" x2="23" y2="14"/><line x1="1" y1="9" x2="4" y2="9"/><line x1="1" y1="14" x2="4" y2="14"/></svg>
                    </div>
                    <div class="card-title-bold">AI Native Copilot</div>
                    <p class="card-text-muted">Hỗ trợ bởi 03 AI Agents chuyên dụng 24/7, đẩy nhanh tiến độ làm đề cương, phân tích dữ liệu và viết luận án.</p>
                </div>
                <div class="istec-square-card" style="background: #ffffff; border-top: 4px solid var(--istec-bright-green); box-shadow: 0 10px 28px rgba(0, 30, 24, 0.25);">
                    <div class="card-icon-wrap" style="color: var(--istec-bright-green); background: rgba(97, 166, 14, 0.1);">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                    </div>
                    <div class="card-title-bold">Thực Chiến Doanh Nghiệp</div>
                    <p class="card-text-muted">Đề tài bắt nguồn từ vấn đề thực tiễn của doanh nghiệp, đúc kết thành mô hình quản trị có khả năng ứng dụng ngay.</p>
                </div>
                <div class="istec-square-card" style="background: #ffffff; border-top: 4px solid #0284c7; box-shadow: 0 10px 28px rgba(0, 30, 24, 0.25);">
                    <div class="card-icon-wrap" style="color: #0284c7; background: rgba(2, 132, 199, 0.1);">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <div class="card-title-bold">Business Doctors</div>
                    <p class="card-text-muted">Cơ hội gia nhập Hội đồng Chuyên gia IDEAS, tham gia chẩn đoán và tư vấn chiến lược cho mạng lưới doanh nghiệp đối tác.</p>
                </div>
                <div class="istec-square-card" style="background: #ffffff; border-top: 4px solid #d97706; box-shadow: 0 10px 28px rgba(0, 30, 24, 0.25);">
                    <div class="card-icon-wrap" style="color: #d97706; background: rgba(217, 119, 6, 0.1);">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                    </div>
                    <div class="card-title-bold">Giá Trị Kép</div>
                    <p class="card-text-muted">Nhận bằng Tiến sĩ DBA danh giá cùng Cẩm nang Quản trị Ứng dụng (Executive Blueprint) phục vụ tăng trưởng doanh nghiệp.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 5. CƠ CHẾ CHỌN ĐỀ TÀI (A & B) ══ -->
    <section class="istec-section-box bg-alt">
        <div class="container">
            <div style="text-align: center; max-width: 760px; margin: 0 auto 28px;" class="istec-reveal">
                <span class="istec-label-top">HƯỚNG NGHIÊN CỨU LINH HOẠT</span>
                <h2 class="istec-heading-large">
                    2 Cơ Chế Lựa Chọn Đề Tài Thực Chiến
                </h2>
            </div>

            <div class="topic-plan-grid istec-reveal">
                <div class="topic-plan-card highlight">
                    <span class="topic-badge">Phương Án A</span>
                    <h3 style="font-size: 1.18rem; font-weight: 800; color: var(--dark-main); margin-bottom: 12px;">
                        Đề tài từ Doanh nghiệp của Nghiên cứu sinh
                    </h3>
                    <p style="font-size: 0.9rem; color: var(--dark-sub); line-height: 1.6; margin-bottom: 16px;">
                        Phát triển bài toán thực tế, chuyển đổi số hoặc mô hình kinh doanh tại chính doanh nghiệp đang quản lý thành đề tài luận án Tiến sĩ.
                    </p>
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <div style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: var(--dark-main); font-weight: 600;">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#61A60E" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Dữ liệu thực nghiệm nội bộ sẵn có</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: var(--dark-main); font-weight: 600;">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#61A60E" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Ứng dụng trực tiếp giải pháp tối ưu vận hành doanh nghiệp</span>
                        </div>
                    </div>
                </div>

                <div class="topic-plan-card">
                    <span class="topic-badge alt">Phương Án B</span>
                    <h3 style="font-size: 1.18rem; font-weight: 800; color: var(--dark-main); margin-bottom: 12px;">
                        Nhận Dự Án Tư Vấn Thực Tế từ Đối Tác IDEAS
                    </h3>
                    <p style="font-size: 0.9rem; color: var(--dark-sub); line-height: 1.6; margin-bottom: 16px;">
                        Được giao 01 Dự án Tư vấn từ doanh nghiệp đối tác với vai trò Chuyên gia tư vấn chính (Business Doctor) để khai thác số liệu làm luận án.
                    </p>
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <div style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: var(--dark-main); font-weight: 600;">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#005C4D" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Giải quyết vấn đề thiếu đề tài hoặc thiếu dữ liệu nghiên cứu</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: var(--dark-main); font-weight: 600;">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#005C4D" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Khẳng định vị thế chuyên gia tư vấn chiến lược độc lập</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 6. KHUNG CHƯƠNG TRÌNH ĐÀO TẠO 3 NĂM (180 ECTS) ══ -->
    <section class="istec-section-box" id="khung-dao-tao">
        <div class="container">
            <div style="text-align: center; max-width: 760px; margin: 0 auto 28px;" class="istec-reveal">
                <span class="istec-label-top">LỘ TRÌNH ĐÀO TẠO</span>
                <h2 class="istec-heading-large">
                    Khung Chương Trình Tiến Sĩ 03 Năm (180 ECTS)
                </h2>
            </div>

            <!-- Tab Buttons (Giai đoạn 1 - Giai đoạn 2 - Giai đoạn 3) -->
            <div class="stage-tabs-nav istec-reveal">
                <button class="stage-tab-btn active" onclick="switchStage(1, this)" type="button">
                    Giai đoạn 1
                </button>
                <button class="stage-tab-btn" onclick="switchStage(2, this)" type="button">
                    Giai đoạn 2
                </button>
                <button class="stage-tab-btn" onclick="switchStage(3, this)" type="button">
                    Giai đoạn 3
                </button>
            </div>

            <!-- Stage 1 Panel -->
            <div id="stage-panel-1" class="stage-panel active istec-reveal">
                <div class="stage-card-main">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 12px;">
                        <div>
                            <span style="font-size: 0.74rem; font-weight: 800; color: var(--istec-teal); text-transform: uppercase;">GIAI ĐOẠN 1 • 12 THÁNG (60 ECTS)</span>
                            <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--dark-main); margin: 2px 0 0;">
                                Chuyển Bài Toán Doanh Nghiệp Thành Đề Cương Nghiên Cứu (Research Proposal)
                            </h3>
                        </div>
                        <div style="background: rgba(0, 92, 77, 0.08); color: var(--istec-deep-green); padding: 6px 14px; border-radius: var(--radius-square); font-weight: 800; font-size: 0.88rem;">
                            Checkpoint: Proposal Defense
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 24px;">
                        <div style="background: #f8fafc; border: 1px solid var(--border-light); padding: 14px 12px; border-radius: var(--radius-square);">
                            <div style="font-size: 0.7rem; font-weight: 800; color: var(--istec-teal); margin-bottom: 3px;">CHUYÊN ĐỀ 1</div>
                            <div style="font-size: 0.86rem; font-weight: 700; color: var(--dark-main); line-height: 1.35;">Research Orientation & Philosophy</div>
                        </div>
                        <div style="background: #f8fafc; border: 1px solid var(--border-light); padding: 14px 12px; border-radius: var(--radius-square);">
                            <div style="font-size: 0.7rem; font-weight: 800; color: var(--istec-teal); margin-bottom: 3px;">CHUYÊN ĐỀ 2</div>
                            <div style="font-size: 0.86rem; font-weight: 700; color: var(--dark-main); line-height: 1.35;">Literature Review & AI Copilot</div>
                        </div>
                        <div style="background: #f8fafc; border: 1px solid var(--border-light); padding: 14px 12px; border-radius: var(--radius-square);">
                            <div style="font-size: 0.7rem; font-weight: 800; color: var(--istec-teal); margin-bottom: 3px;">CHUYÊN ĐỀ 3</div>
                            <div style="font-size: 0.86rem; font-weight: 700; color: var(--dark-main); line-height: 1.35;">Qualitative & Quantitative Methods</div>
                        </div>
                        <div style="background: #f8fafc; border: 1px solid var(--border-light); padding: 14px 12px; border-radius: var(--radius-square);">
                            <div style="font-size: 0.7rem; font-weight: 800; color: var(--istec-teal); margin-bottom: 3px;">CHUYÊN ĐỀ 4</div>
                            <div style="font-size: 0.86rem; font-weight: 700; color: var(--dark-main); line-height: 1.35;">Research Model & Proposal</div>
                        </div>
                    </div>

                    <div style="border-top: 1px solid var(--border-light); padding-top: 18px;">
                        <div style="font-size: 0.84rem; font-weight: 800; color: var(--dark-main); margin-bottom: 12px;">
                            CƠ CẤU ĐÁNH GIÁ MỖI CHUYÊN ĐỀ:
                        </div>
                        <div class="rubric-grid-3">
                            <div class="rubric-card">
                                <div class="rubric-percent">20%</div>
                                <div class="rubric-title">Thảo luận Chuyên đề (DQ)</div>
                                <p class="rubric-desc">Đọc tài liệu, trao đổi và phản biện học thuật trên hệ thống LMS chuyên dụng.</p>
                            </div>
                            <div class="rubric-card">
                                <div class="rubric-percent">30%</div>
                                <div class="rubric-title">Báo cáo Public Seminar</div>
                                <p class="rubric-desc">Thuyết trình đề tài trước Hội đồng chuyên môn IDEAS và thính giả doanh nghiệp.</p>
                            </div>
                            <div class="rubric-card">
                                <div class="rubric-percent">50%</div>
                                <div class="rubric-title">Bài Thu hoạch Cá nhân</div>
                                <p class="rubric-desc">Hoàn thiện bài thu hoạch sau phản biện, ứng dụng trực tiếp vào Đề cương Luận án.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stage 2 Panel -->
            <div id="stage-panel-2" class="stage-panel">
                <div class="stage-card-main">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; flex-wrap: wrap; gap: 12px;">
                        <div>
                            <span style="font-size: 0.74rem; font-weight: 800; color: var(--istec-teal); text-transform: uppercase;">GIAI ĐOẠN 2 • 18 THÁNG (90 ECTS)</span>
                            <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--dark-main); margin: 2px 0 0;">
                                Nghiên Cứu Thực Địa & Viết Luận Án Cùng Giáo Sư Hướng Dẫn
                            </h3>
                        </div>
                        <div style="background: rgba(97, 166, 14, 0.1); color: #3f6e07; padding: 6px 14px; border-radius: var(--radius-square); font-weight: 800; font-size: 0.88rem;">
                            1:1 Supervisor & 03 AI Agents
                        </div>
                    </div>

                    <p style="font-size: 0.9rem; color: var(--dark-sub); line-height: 1.6; margin-bottom: 20px;">
                        NCS làm việc độc lập 1:1 với Giáo sư Hướng dẫn và tham gia tối thiểu <strong>03 Buổi Báo Cáo Tiến Độ (Progress Seminars)</strong>:
                    </p>

                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;">
                        <div style="background: #ffffff; border: 1px solid var(--border-light); border-left: 3px solid var(--istec-deep-green); padding: 18px 16px; border-radius: var(--radius-square);">
                            <div style="font-size: 0.7rem; font-weight: 800; color: var(--istec-deep-green); margin-bottom: 4px;">BUỔI 1 • THÁNG 18</div>
                            <div style="font-size: 0.95rem; font-weight: 800; color: var(--dark-main); margin-bottom: 6px;">Thu Thập & Làm Sạch Dữ Liệu</div>
                            <p style="font-size: 0.82rem; color: var(--dark-sub); line-height: 1.45; margin: 0;">Báo cáo kết quả khảo sát, phỏng vấn sâu và quy trình làm sạch dữ liệu thực nghiệm.</p>
                        </div>
                        <div style="background: #ffffff; border: 1px solid var(--border-light); border-left: 3px solid var(--istec-bright-green); padding: 18px 16px; border-radius: var(--radius-square);">
                            <div style="font-size: 0.7rem; font-weight: 800; color: var(--istec-bright-green); margin-bottom: 4px;">BUỔI 2 • THÁNG 24</div>
                            <div style="font-size: 0.95rem; font-weight: 800; color: var(--dark-main); margin-bottom: 6px;">Phân Tích Dữ Liệu & Findings</div>
                            <p style="font-size: 0.82rem; color: var(--dark-sub); line-height: 1.45; margin: 0;">Trình bày mô hình chẩn đoán doanh nghiệp, kiểm định giả thuyết và các phát hiện mới.</p>
                        </div>
                        <div style="background: #ffffff; border: 1px solid var(--border-light); border-left: 3px solid #0284c7; padding: 18px 16px; border-radius: var(--radius-square);">
                            <div style="font-size: 0.7rem; font-weight: 800; color: #0284c7; margin-bottom: 4px;">BUỔI 3 • THÁNG 30</div>
                            <div style="font-size: 0.95rem; font-weight: 800; color: var(--dark-main); margin-bottom: 6px;">Hàm Ý Quản Trị & Bản Thảo Blueprint</div>
                            <p style="font-size: 0.82rem; color: var(--dark-sub); line-height: 1.45; margin: 0;">Trình bày đề xuất chiến lược và bản thảo Cẩm nang Quản trị Ứng dụng.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stage 3 Panel -->
            <div id="stage-panel-3" class="stage-panel">
                <div class="stage-card-main">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; flex-wrap: wrap; gap: 12px;">
                        <div>
                            <span style="font-size: 0.74rem; font-weight: 800; color: var(--istec-teal); text-transform: uppercase;">GIAI ĐOẠN 3 • 06 THÁNG (30 ECTS)</span>
                            <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--dark-main); margin: 2px 0 0;">
                                Rà Soát Học Thuật, Mock Defense & Bảo Vệ Chính Thức
                            </h3>
                        </div>
                        <div style="background: rgba(2, 132, 199, 0.1); color: #0369a1; padding: 6px 14px; border-radius: var(--radius-square); font-weight: 800; font-size: 0.88rem;">
                            Official Defense
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px;">
                        <div style="background: #f8fafc; border: 1px solid var(--border-light); padding: 16px 14px; border-radius: var(--radius-square);">
                            <div style="font-size: 0.7rem; font-weight: 800; color: var(--istec-teal); margin-bottom: 4px;">BƯỚC 1</div>
                            <div style="font-size: 0.92rem; font-weight: 800; color: var(--dark-main); margin-bottom: 4px;">Academic Review</div>
                            <p style="font-size: 0.8rem; color: var(--dark-sub); line-height: 1.4; margin: 0;">Kiểm tra định dạng, chuẩn học thuật quốc tế và liêm chính nghiên cứu.</p>
                        </div>
                        <div style="background: #f8fafc; border: 1px solid var(--border-light); padding: 16px 14px; border-radius: var(--radius-square);">
                            <div style="font-size: 0.7rem; font-weight: 800; color: var(--istec-teal); margin-bottom: 4px;">BƯỚC 2</div>
                            <div style="font-size: 0.92rem; font-weight: 800; color: var(--dark-main); margin-bottom: 4px;">Mock Defense</div>
                            <p style="font-size: 0.8rem; color: var(--dark-sub); line-height: 1.4; margin: 0;">Bảo vệ thử trước Hội đồng IDEAS để hoàn thiện phản biện.</p>
                        </div>
                        <div style="background: #f8fafc; border: 1px solid var(--border-light); padding: 16px 14px; border-radius: var(--radius-square);">
                            <div style="font-size: 0.7rem; font-weight: 800; color: var(--istec-teal); margin-bottom: 4px;">BƯỚC 3</div>
                            <div style="font-size: 0.92rem; font-weight: 800; color: var(--dark-main); margin-bottom: 4px;">Official Defense</div>
                            <p style="font-size: 0.8rem; color: var(--dark-sub); line-height: 1.4; margin: 0;">Bảo vệ chính thức trước Hội đồng Giáo sư quốc tế ISTEC Paris.</p>
                        </div>
                        <div style="background: #f8fafc; border: 1px solid var(--border-light); padding: 16px 14px; border-radius: var(--radius-square);">
                            <div style="font-size: 0.7rem; font-weight: 800; color: var(--istec-teal); margin-bottom: 4px;">BƯỚC 4</div>
                            <div style="font-size: 0.92rem; font-weight: 800; color: var(--dark-main); margin-bottom: 4px;">Executive Blueprint</div>
                            <p style="font-size: 0.8rem; color: var(--dark-sub); line-height: 1.4; margin: 0;">Hoàn thiện cẩm nang quản trị ứng dụng phục vụ doanh nghiệp.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 7. AI NATIVE RESEARCH COPILOT (03 AI AGENTS) ══ -->
    <section class="istec-section-box bg-alt">
        <div class="container">
            <div style="text-align: center; max-width: 760px; margin: 0 auto 30px;" class="istec-reveal">
                <span class="istec-label-top">CÔNG NGHỆ HỖ TRỢ</span>
                <h2 class="istec-heading-large">
                    AI Native Copilot: 03 Trợ Lý AI Chuyên Dụng 24/7
                </h2>
            </div>

            <div class="ai-agents-grid istec-reveal">
                <div class="ai-agent-card">
                    <div class="ai-agent-tag">AI AGENT 01 • LITERATURE REVIEW</div>
                    <div class="ai-agent-name">Literature Review & Gap Finder</div>
                    <p style="font-size: 0.86rem; color: var(--dark-sub); line-height: 1.5; margin: 0 0 12px;">
                        Tự động truy xuất, tổng hợp và phân tích khoảng trống nghiên cứu từ cơ sở dữ liệu ISI/Scopus.
                    </p>
                    <ul class="ai-agent-features">
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Xây dựng Bản đồ Tài liệu (Literature Map) tự động</span>
                        </li>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Trích dẫn nguồn chuẩn APA/Harvard chính xác</span>
                        </li>
                    </ul>
                </div>

                <div class="ai-agent-card">
                    <div class="ai-agent-tag">AI AGENT 02 • QUALITATIVE RESEARCH</div>
                    <div class="ai-agent-name">Qualitative & Interview Designer</div>
                    <p style="font-size: 0.86rem; color: var(--dark-sub); line-height: 1.5; margin: 0 0 12px;">
                        Hỗ trợ thiết kế kịch bản phỏng vấn sâu, mã hóa dữ liệu và phân tích cụm chủ đề định tính.
                    </p>
                    <ul class="ai-agent-features">
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Bóc tách băng ghi âm phỏng vấn tự động</span>
                        </li>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Mã hóa dữ liệu (Coding) & Thematic Analysis chuẩn mực</span>
                        </li>
                    </ul>
                </div>

                <div class="ai-agent-card">
                    <div class="ai-agent-tag">AI AGENT 03 • QUANTITATIVE ANALYTICS</div>
                    <div class="ai-agent-name">Quantitative & Statistical Analytics</div>
                    <p style="font-size: 0.86rem; color: var(--dark-sub); line-height: 1.5; margin: 0 0 12px;">
                        Tích hợp Python và SPSS/PLS-SEM, hỗ trợ làm sạch dữ liệu, chạy mô hình và kiểm định giả thuyết.
                    </p>
                    <ul class="ai-agent-features">
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Phân tích nhân tố EFA/CFA và hồi quy đa biến</span>
                        </li>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Xuất biểu đồ và bảng kết quả theo chuẩn học thuật</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 8. ĐỘI NGŨ GIẢNG VIÊN & CỐ VẤN (ẢNH HD CHUẨN TỪ DOI-NGU-GIANG-VIEN) ══ -->
    <section class="istec-section-box" id="chuyen-gia">
        <div class="container">
            <div style="text-align: center; max-width: 760px; margin: 0 auto 28px;" class="istec-reveal">
                <span class="istec-label-top">HỘI ĐỒNG GIẢNG VIÊN</span>
                <h2 class="istec-heading-large">
                    Đội Ngũ Giáo Sư Quốc Tế ISTEC Paris & Hội Đồng Cố Vấn IDEAS
                </h2>
            </div>

            <div class="faculty-tabs-nav istec-reveal">
                <button class="faculty-tab-btn active" onclick="switchFaculty('istec', this)" type="button">
                    Giáo Sư Quốc Tế ISTEC Paris
                </button>
                <button class="faculty-tab-btn" onclick="switchFaculty('ideas', this)" type="button">
                    Hội Đồng Cố Vấn & Giảng Viên IDEAS
                </button>
            </div>

            <!-- Tab 1: Giáo Sư Quốc Tế ISTEC Paris -->
            <div id="faculty-panel-istec" class="faculty-grid istec-reveal">
                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p15_img7_245x274.jpeg" alt="Prof. Philippe BASTIEN" />
                    </div>
                    <div class="faculty-name">Prof. Philippe BASTIEN</div>
                    <div class="faculty-role">Khoa học Quản trị</div>
                    <p class="faculty-desc">Trưởng chuyên ngành Sự kiện & Quản trị Sáng tạo tại ISTEC Paris.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p15_img8_265x276.jpeg" alt="Dr. Stanislas KIHM" />
                    </div>
                    <div class="faculty-name">Dr. Stanislas KIHM</div>
                    <div class="faculty-role">Nghiên cứu Quản trị</div>
                    <p class="faculty-desc">Tiến sĩ Lịch sử & Giảng viên nghiên cứu Khoa học Quản trị tại Pháp.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p15_img3_146x162.png" alt="Prof. Adel ALOUI" />
                    </div>
                    <div class="faculty-name">Prof. Adel ALOUI</div>
                    <div class="faculty-role">Quản trị Chiến lược</div>
                    <p class="faculty-desc">Giáo sư nghiên cứu Quản trị Chiến lược và Chuỗi cung ứng quốc tế.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p15_img9_268x289.jpeg" alt="Dr. Rey DANG" />
                    </div>
                    <div class="faculty-name">Dr. Rey DANG</div>
                    <div class="faculty-role">Tiến sĩ QTKD</div>
                    <p class="faculty-desc">Tác giả nhiều bài báo khoa học ISI/Scopus về quản trị tài chính doanh nghiệp.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p15_img2_330x349.jpeg" alt="Prof. Istifanous ADO" />
                    </div>
                    <div class="faculty-name">Prof. Istifanous ADO</div>
                    <div class="faculty-role">Nghiên cứu Khởi nghiệp</div>
                    <p class="faculty-desc">Chuyên gia nghiên cứu hệ sinh thái đổi mới sáng tạo và khởi nghiệp.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p15_img10_330x349.jpeg" alt="Dr. Marie-Alix DEVAL" />
                    </div>
                    <div class="faculty-name">Dr. Marie-Alix DEVAL</div>
                    <div class="faculty-role">Tiến sĩ QTKD</div>
                    <p class="faculty-desc">Chuyên gia nghiên cứu hành vi tổ chức và phát triển lãnh đạo.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p15_img11_182x178.png" alt="Prof. Jihane CHAARI" />
                    </div>
                    <div class="faculty-name">Prof. Jihane CHAARI</div>
                    <div class="faculty-role">Khoa học Quản trị</div>
                    <p class="faculty-desc">Giáo sư liên kết nghiên cứu quản trị tại các trường đại học Pháp.</p>
                </div>

                <div class="faculty-card" style="background: #f8fafc; display: flex; align-items: center; justify-content: center; border-style: dashed;">
                    <div class="card-icon-wrap" style="margin-bottom: 8px;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                    </div>
                    <div style="font-size: 0.9rem; font-weight: 800; color: var(--istec-deep-green);">Mạng Lưới Quốc Tế</div>
                    <p style="font-size: 0.76rem; color: var(--dark-muted); margin-top: 2px;">Cùng 30+ giáo sư đồng hành hướng dẫn 1:1.</p>
                </div>
            </div>

            <!-- Tab 2: Hội Đồng IDEAS (Ảnh chuẩn từ https://ideas.edu.vn/doi-ngu-giang-vien) -->
            <div id="faculty-panel-ideas" class="faculty-grid" style="display: none;">
                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/vientruong_avt-optimized.webp" alt="Dr. Phạm Quang Vinh" />
                    </div>
                    <div class="faculty-name">Dr. Phạm Quang Vinh</div>
                    <div class="faculty-role">DBA (USA)</div>
                    <p class="faculty-desc">Viện trưởng IDEAS, Chuyên gia Quản trị Chiến lược & Vận hành Hệ thống.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2024/04/NHP_1769-removebg-preview-optimized.webp" alt="Dr. Sơn Điền Trung" />
                    </div>
                    <div class="faculty-name">Dr. Sơn Điền Trung</div>
                    <div class="faculty-role">DBA (France)</div>
                    <p class="faculty-desc">Chủ tịch Sonha Pharma, Cố vấn chuyển đổi mô hình kinh doanh chuẩn châu Âu.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/04/speaker-3.webp" alt="Dr. Phạm Quang Quý" />
                    </div>
                    <div class="faculty-name">Dr. Phạm Quang Quý</div>
                    <div class="faculty-role">DBA</div>
                    <p class="faculty-desc">Cố vấn chiến lược tài chính doanh nghiệp, Đổi mới Sáng tạo & Chuyển đổi số.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2026/08/cnhat_aodai.webp" alt="Dr. Mang Viên Hoàng Nhật" />
                    </div>
                    <div class="faculty-name">Dr. Mang Viên Hoàng Nhật</div>
                    <div class="faculty-role">DBA</div>
                    <p class="faculty-desc">Chuyên gia phương pháp nghiên cứu ứng dụng và định lượng trong quản trị.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2026/07/tsphivu.webp" alt="Dr. Phạm Phi Vũ" />
                    </div>
                    <div class="faculty-name">Dr. Phạm Phi Vũ</div>
                    <div class="faculty-role">Computer Science & AI</div>
                    <p class="faculty-desc">Chuyên gia AI, huấn luyện và phát triển bộ trợ lý AI Copilot cho nghiên cứu.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2024/04/Thay-thinh-optimized.webp" alt="Dr. Dương Văn Thịnh" />
                    </div>
                    <div class="faculty-name">Dr. Dương Văn Thịnh</div>
                    <div class="faculty-role">DBA (France)</div>
                    <p class="faculty-desc">Phó Chủ tịch Công nghệ VERON Group, Chuyên gia Quản trị Nhân sự & AI Data.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2024/04/a-tam-anh-1-optimized.webp" alt="Dr. Trần Tâm Anh" />
                    </div>
                    <div class="faculty-name">Dr. Trần Tâm Anh</div>
                    <div class="faculty-role">DBA (USA)</div>
                    <p class="faculty-desc">Phụ trách chiến lược học thuật IDEAS, Cố vấn tiếp thị đa kênh & thị trường.</p>
                </div>

                <div class="faculty-card">
                    <div class="faculty-avatar-wrap">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/02/casc1-optimized.webp" alt="Dr. Nguyễn Thanh Bình" />
                    </div>
                    <div class="faculty-name">Dr. Nguyễn Thanh Bình</div>
                    <div class="faculty-role">Ph.D. in IT</div>
                    <p class="faculty-desc">Chuyên gia Chuyển đổi số và Kiến trúc Hệ thống Dữ liệu Doanh nghiệp.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 9. MẪU BẰNG & LỄ TỐT NGHIỆP PARIS ══ -->
    <section class="istec-section-box bg-alt">
        <div class="container">
            <div class="diploma-showcase-grid istec-reveal">
                <div>
                    <span class="istec-label-top">GIÁ TRỊ VĂN BẰNG</span>
                    <h2 class="istec-heading-large">
                        Bằng Tiến Sĩ DBA Do ISTEC Paris Trực Tiếp Cấp
                    </h2>
                    <p class="istec-body-lead" style="margin-bottom: 20px;">
                        Văn bằng chuẩn học vị Pro – Bac+8 (EQF Level 8) của Pháp, được tổ chức WES đánh giá tương đương <strong>"Earned Doctorate"</strong> tại Mỹ và Canada.
                    </p>

                    <div style="display: flex; flex-direction: column; gap: 10px; margin-bottom: 22px;">
                        <div style="display: flex; align-items: center; gap: 8px; font-size: 0.9rem; color: var(--dark-main);">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#61A60E" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Tra cứu và xác thực văn bằng quốc tế vĩnh viễn</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 8px; font-size: 0.9rem; color: var(--dark-main);">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#61A60E" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Hỗ trợ thủ tục hợp pháp hóa lãnh sự toàn cầu</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 8px; font-size: 0.9rem; color: var(--dark-main);">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#61A60E" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Tham dự Lễ Tốt nghiệp trang trọng tại Le Grand Rex Paris</span>
                        </div>
                    </div>

                    <div class="grad-gallery-grid">
                        <div class="grad-gallery-item">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p16_img4_1248x832.jpeg" alt="Lễ tốt nghiệp ISTEC Paris" />
                        </div>
                        <div class="grad-gallery-item">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p16_img2_1248x832.jpeg" alt="Học viên tốt nghiệp ISTEC Paris" />
                        </div>
                    </div>
                </div>

                <div>
                    <div class="diploma-img-card">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/dba/p14_img6_912x614.jpeg" 
                             alt="Mẫu bằng Tiến sĩ DBA ISTEC Business School Paris" />
                    </div>
                    <div style="text-align: center; margin-top: 10px; font-size: 0.8rem; font-weight: 700; color: var(--dark-muted);">
                        Mẫu văn bằng Doctorate of Business Administration (DBA) – ISTEC Paris
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 10. HỌC PHÍ & PHƯƠNG THỨC THANH TOÁN ══ -->
    <section class="istec-section-box" id="hoc-phi">
        <div class="container">
            <div style="text-align: center; max-width: 760px; margin: 0 auto 30px;" class="istec-reveal">
                <span class="istec-label-top">HỌC PHÍ MINH BẠCH</span>
                <h2 class="istec-heading-large">
                    Học Phí Trọn Gói 03 Năm
                </h2>
            </div>

            <div class="tuition-square-card istec-reveal">
                <div class="tuition-header-dark">
                    <div style="font-size: 0.78rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; color: #94a3b8;">
                        HỌC PHÍ TRỌN GÓI CHƯƠNG TRÌNH DBA (03 NĂM)
                    </div>
                    <div class="tuition-price-headline">13.000 EUR</div>
                    <div style="font-size: 0.9rem; color: #cbd5e1;">
                        Bằng Tiến sĩ do ISTEC Paris trực tiếp cấp • WES Evaluated: "Earned Doctorate"
                    </div>
                </div>

                <div class="tuition-body-pad">
                    <ul class="tuition-list">
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Toàn bộ học phí 03 năm đào tạo chính quy chương trình Tiến sĩ DBA của ISTEC Paris.</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Chi phí làm việc trực tiếp 1:1 với Giáo sư Hướng dẫn (Supervisor) suốt quá trình làm luận án.</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Quyền sử dụng 03 AI Research Agents chuyên dụng và nền tảng IDEAS AI Platform 24/7.</span>
                        </li>
                        <li>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Phí phản biện tiến độ (Progress Seminars), Mock Defense và Hội đồng bảo vệ chính thức.</span>
                        </li>
                    </ul>

                    <div style="background: #f8fafc; border: 1px solid var(--border-light); border-radius: var(--radius-square); padding: 14px 18px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;">
                        <div>
                            <div style="font-size: 0.88rem; font-weight: 800; color: var(--dark-main);">TRẢ GÓP 0% LÃI SUẤT QUA NGÂN HÀNG SACOMBANK</div>
                            <div style="font-size: 0.8rem; color: var(--dark-muted);">Linh hoạt chia kỳ thanh toán từ 12 đến 24 tháng tối ưu dòng tiền.</div>
                        </div>
                        <a href="#faq-dang-ky" class="btn-istec-square-dark" style="padding: 9px 18px; font-size: 0.84rem;">
                            Nhận Lộ Trình Phí
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 11. ĐIỀU KIỆN ĐẦU VÀO & BỘ HỒ SƠ (CARD MÀU XANH BRAND ISTEC) ══ -->
    <section class="istec-section-box bg-alt" id="tuyen-sinh">
        <div class="container">
            <div style="text-align: center; max-width: 760px; margin: 0 auto 36px;" class="istec-reveal">
                <span class="istec-label-top">TIÊU CHUẨN XÉT TUYỂN</span>
                <h2 class="istec-heading-large">
                    Điều Kiện Nhập Học & Bộ Hồ Sơ Tiến Sĩ
                </h2>
            </div>

            <div class="admission-grid istec-reveal">
                <!-- Cột trái: Điều kiện đầu vào (Thẻ trắng sạch) -->
                <div class="admission-card-white">
                    <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--dark-main); margin-bottom: 18px;">
                        Yêu Cầu Tuyển Sinh Đầu Vào
                    </h3>
                    <div style="display: flex; flex-direction: column; gap: 14px;">
                        <div style="display: flex; gap: 12px;">
                            <div style="width: 30px; height: 30px; background: rgba(0, 92, 77, 0.1); color: var(--istec-deep-green); border-radius: var(--radius-square); display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.85rem; flex-shrink: 0;">01</div>
                            <div>
                                <div style="font-size: 0.92rem; font-weight: 700; color: var(--dark-main);">Bằng Thạc Sĩ</div>
                                <div style="font-size: 0.84rem; color: var(--dark-sub); line-height: 1.45;">Đã hoàn thành bằng Thạc sĩ (Master / MBA / MSc) hoặc tương đương thuộc các khối ngành Kinh tế, Quản trị, Công nghệ.</div>
                            </div>
                        </div>
                        <div style="display: flex; gap: 12px;">
                            <div style="width: 30px; height: 30px; background: rgba(0, 92, 77, 0.1); color: var(--istec-deep-green); border-radius: var(--radius-square); display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.85rem; flex-shrink: 0;">02</div>
                            <div>
                                <div style="font-size: 0.92rem; font-weight: 700; color: var(--dark-main);">Năng Lực Tiếng Anh</div>
                                <div style="font-size: 0.84rem; color: var(--dark-sub); line-height: 1.45;">Tương đương IELTS 6.5 hoặc phỏng vấn đánh giá năng lực ngôn ngữ/đề tài trực tiếp cùng Hội đồng.</div>
                            </div>
                        </div>
                        <div style="display: flex; gap: 12px;">
                            <div style="width: 30px; height: 30px; background: rgba(0, 92, 77, 0.1); color: var(--istec-deep-green); border-radius: var(--radius-square); display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.85rem; flex-shrink: 0;">03</div>
                            <div>
                                <div style="font-size: 0.92rem; font-weight: 700; color: var(--dark-main);">Kinh Nghiệm Quản Lý</div>
                                <div style="font-size: 0.84rem; color: var(--dark-sub); line-height: 1.45;">Có kinh nghiệm làm việc thực tế tại vị trí Quản lý, Giám đốc, Cố vấn hoặc Chuyên gia cấp cao.</div>
                            </div>
                        </div>
                        <div style="display: flex; gap: 12px;">
                            <div style="width: 30px; height: 30px; background: rgba(0, 92, 77, 0.1); color: var(--istec-deep-green); border-radius: var(--radius-square); display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.85rem; flex-shrink: 0;">04</div>
                            <div>
                                <div style="font-size: 0.92rem; font-weight: 700; color: var(--dark-main);">Bài Toán Thực Tiễn</div>
                                <div style="font-size: 0.84rem; color: var(--dark-sub); line-height: 1.45;">Có vấn đề quản trị thực tế muốn giải quyết hoặc nhận Dự án Tư vấn Thực chiến do IDEAS giao.</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cột phải: Bộ hồ sơ xét tuyển (MÀU XANH BRAND ISTEC ĐẸP MẮT THEO YÊU CẦU NGƯỜI DÙNG) -->
                <div class="admission-card-istec-green">
                    <h3 style="font-size: 1.2rem; font-weight: 800; color: #ffffff; margin-bottom: 18px;">
                        Bộ Hồ Sơ Dự Tuyển Tiến Sĩ (Dossier)
                    </h3>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 11px;">
                        <li style="display: flex; align-items: center; gap: 12px; font-size: 0.9rem; color: rgba(255,255,255,0.95); padding-bottom: 9px; border-bottom: 1px solid rgba(255,255,255,0.15);">
                            <span style="width: 24px; height: 24px; background: rgba(255,255,255,0.2); color: #ffffff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.74rem; font-weight: 800; flex-shrink: 0;">1</span>
                            <span>Phiếu đăng ký dự tuyển theo mẫu của ISTEC Paris (Application Form)</span>
                        </li>
                        <li style="display: flex; align-items: center; gap: 12px; font-size: 0.9rem; color: rgba(255,255,255,0.95); padding-bottom: 9px; border-bottom: 1px solid rgba(255,255,255,0.15);">
                            <span style="width: 24px; height: 24px; background: rgba(255,255,255,0.2); color: #ffffff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.74rem; font-weight: 800; flex-shrink: 0;">2</span>
                            <span>Sơ yếu lý lịch khoa học & nghề nghiệp cập nhật (Academic / Executive CV)</span>
                        </li>
                        <li style="display: flex; align-items: center; gap: 12px; font-size: 0.9rem; color: rgba(255,255,255,0.95); padding-bottom: 9px; border-bottom: 1px solid rgba(255,255,255,0.15);">
                            <span style="width: 24px; height: 24px; background: rgba(255,255,255,0.2); color: #ffffff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.74rem; font-weight: 800; flex-shrink: 0;">3</span>
                            <span>Bản sao công chứng Bằng Thạc sĩ và Bảng điểm Thạc sĩ kèm bản dịch</span>
                        </li>
                        <li style="display: flex; align-items: center; gap: 12px; font-size: 0.9rem; color: rgba(255,255,255,0.95); padding-bottom: 9px; border-bottom: 1px solid rgba(255,255,255,0.15);">
                            <span style="width: 24px; height: 24px; background: rgba(255,255,255,0.2); color: #ffffff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.74rem; font-weight: 800; flex-shrink: 0;">4</span>
                            <span>Thư giải trình mục đích học tập & định hướng (Motivation Letter / SOP)</span>
                        </li>
                        <li style="display: flex; align-items: center; gap: 12px; font-size: 0.9rem; color: rgba(255,255,255,0.95); padding-bottom: 9px; border-bottom: 1px solid rgba(255,255,255,0.15);">
                            <span style="width: 24px; height: 24px; background: rgba(255,255,255,0.2); color: #ffffff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.74rem; font-weight: 800; flex-shrink: 0;">5</span>
                            <span>Đề xuất ý tưởng Nghiên cứu sơ bộ (Initial Research Idea / Proposal)</span>
                        </li>
                        <li style="display: flex; align-items: center; gap: 12px; font-size: 0.9rem; color: rgba(255,255,255,0.95);">
                            <span style="width: 24px; height: 24px; background: rgba(255,255,255,0.2); color: #ffffff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.74rem; font-weight: 800; flex-shrink: 0;">6</span>
                            <span>01 Thư giới thiệu của cấp trên/chuyên gia & Bản sao Hộ chiếu còn hạn</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 12. COMBINED SECTION: FAQ (CỘT TRÁI) + FORM ĐĂNG KÝ (CỘT PHẢI) ══ -->
    <section class="istec-section-box" id="faq-dang-ky">
        <div class="container">
            <div class="faq-form-grid-2">
                <!-- CỘT TRÁI: CÂU HỎI THƯỜNG GẶP (FAQ) -->
                <div class="faq-col-left istec-reveal">
                    <span class="istec-label-top">GIẢI ĐÁP HỌC VỤ & TUYỂN SINH</span>
                    <h2 class="istec-heading-large" style="margin-bottom: 20px;">
                        Câu Hỏi Thường Gặp Về Chương Trình DBA
                    </h2>

                    <!-- Accordions -->
                    <div class="acc-square-box open">
                        <button class="acc-square-header" onclick="toggleAcc(this)" type="button">
                            <span class="acc-square-title">NCS được đồng hành như thế nào trong nghiên cứu?</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
                        </button>
                        <div class="acc-square-panel" style="max-height: 250px;">
                            <div class="acc-square-content">
                                NCS được hướng dẫn trực tiếp 1:1 với Giáo sư (Supervisor), tham gia các Progress Seminars định kỳ để nhận phản biện liên tục. Đồng thời được trang bị riêng 03 AI Agents chuyên dụng hỗ trợ xử lý dữ liệu và học liệu 24/7.
                            </div>
                        </div>
                    </div>

                    <div class="acc-square-box">
                        <button class="acc-square-header" onclick="toggleAcc(this)" type="button">
                            <span class="acc-square-title">NCS có được tự chọn đề tài từ doanh nghiệp mình?</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
                        </button>
                        <div class="acc-square-panel">
                            <div class="acc-square-content">
                                Hoàn toàn được. NCS chủ động đề xuất bài toán thực tế từ chính doanh nghiệp đang điều hành (tái cấu trúc, chiến lược, chuyển đổi số) để phát triển thành luận án Tiến sĩ (Phương án A).
                            </div>
                        </div>
                    </div>

                    <div class="acc-square-box">
                        <button class="acc-square-header" onclick="toggleAcc(this)" type="button">
                            <span class="acc-square-title">Nếu chưa có đề tài nghiên cứu sẵn có thì sao?</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
                        </button>
                        <div class="acc-square-panel">
                            <div class="acc-square-content">
                                IDEAS sẽ giao 01 Dự án Tư vấn Thực tế từ mạng lưới doanh nghiệp đối tác để NCS tham gia với vai trò Chuyên gia tư vấn chính (Business Doctor). NCS dùng dữ liệu dự án làm thực nghiệm cho luận án (Phương án B).
                            </div>
                        </div>
                    </div>

                    <div class="acc-square-box">
                        <button class="acc-square-header" onclick="toggleAcc(this)" type="button">
                            <span class="acc-square-title">Văn bằng DBA ISTEC được quốc tế công nhận ra sao?</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
                        </button>
                        <div class="acc-square-panel">
                            <div class="acc-square-content">
                                Bằng do ISTEC Paris trực tiếp cấp theo chuẩn giáo dục đại học Pháp (Pro – Bac+8 / EQF Level 8). Trường là thành viên CGE danh giá. Bằng được tổ chức WES đánh giá tương đương học vị "Earned Doctorate" tại Hoa Kỳ và Canada.
                            </div>
                        </div>
                    </div>

                    <div class="acc-square-box">
                        <button class="acc-square-header" onclick="toggleAcc(this)" type="button">
                            <span class="acc-square-title">Học phí 13.000 EUR đã bao gồm những gì?</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
                        </button>
                        <div class="acc-square-panel">
                            <div class="acc-square-content">
                                Mức phí trọn gói đã bao gồm toàn bộ học phí 03 năm của ISTEC Paris, phí hướng dẫn 1:1 với Giáo sư, quyền sử dụng 03 AI Copilot, nền tảng IDEAS AI Platform và toàn bộ các buổi bảo vệ cấp hội đồng.
                            </div>
                        </div>
                    </div>

                </div>

                <!-- CỘT PHẢI: FORM ĐĂNG KÝ (STICKY) -->
                <div class="form-col-right istec-reveal">
                    <div class="consult-form-wrap">
                        <div style="margin-bottom: 16px;">
                            <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--dark-main); margin: 0 0 4px;">
                                Đăng Ký Tư Vấn & Thẩm Định Đề Tài
                            </h3>
                            <p style="font-size: 0.82rem; color: var(--dark-muted); margin: 0;">
                                Ban tuyển sinh ISTEC Paris sẽ liên hệ phản hồi trong 24 giờ.
                            </p>
                        </div>

                        <form id="dbaConsultForm" onsubmit="handleDbaFormSubmit(event)">
                            <div class="form-group-custom">
                                <label for="dba_name">Họ và tên *</label>
                                <input type="text" id="dba_name" name="fullname" class="form-input-custom" placeholder="Nguyễn Văn A" required />
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                                <div class="form-group-custom">
                                    <label for="dba_phone">Số điện thoại *</label>
                                    <input type="tel" id="dba_phone" name="phone" class="form-input-custom" placeholder="0901234567" required />
                                </div>
                                <div class="form-group-custom">
                                    <label for="dba_email">Email *</label>
                                    <input type="email" id="dba_email" name="email" class="form-input-custom" placeholder="name@domain.com" required />
                                </div>
                            </div>

                            <div class="form-group-custom">
                                <label for="dba_topic">Định hướng đề tài hoặc nhu cầu</label>
                                <textarea id="dba_topic" name="message" class="form-input-custom" rows="2" placeholder="Ghi chú về bài toán doanh nghiệp hoặc yêu cầu nhận đề tài từ IDEAS..."></textarea>
                            </div>

                            <input type="hidden" name="program" value="DBA ISTEC Paris" />
                            <input type="hidden" name="source" value="landingpage_dba_istec" />

                            <button type="submit" class="btn-istec-square-green" style="width: 100%; justify-content: center; padding: 12px; font-size: 0.9rem;">
                                <span>Gửi Đăng Ký & Nhận Brochure DBA [2026]</span>
                            </button>

                            <div id="dbaFormSuccess" style="display: none; padding: 12px; background: #f0fdf4; color: #166534; border: 1px solid #bbf7d0; border-radius: var(--radius-square); font-weight: 700; text-align: center; margin-top: 12px; font-size: 0.84rem;">
                                Cảm ơn bạn! Thông tin đã được gửi đến Ban tuyển sinh Tiến sĩ ISTEC Paris. Chúng tôi sẽ liên hệ trong thời gian sớm nhất.
                            </div>
                        </form>
                    </div>
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
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        window.addEventListener('scroll', function() {
            const btn = document.getElementById('btnScrollTop');
            if (!btn) return;
            if (window.scrollY > 350) {
                btn.classList.add('visible');
            } else {
                btn.classList.remove('visible');
            }
        });

        function switchStage(stageNum, btn) {
            document.querySelectorAll('.stage-tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.stage-panel').forEach(p => p.classList.remove('active'));

            if (btn) btn.classList.add('active');
            const targetPanel = document.getElementById('stage-panel-' + stageNum);
            if (targetPanel) targetPanel.classList.add('active');
        }

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

        function toggleAcc(btn) {
            const box = btn.closest('.acc-square-box');
            if (!box) return;
            const panel = box.querySelector('.acc-square-panel');
            const isOpen = box.classList.contains('open');

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

        window.addEventListener('scroll', function() {
            const parallaxImg = document.getElementById('istecParallaxImg');
            if (!parallaxImg) return;
            const wrap = parallaxImg.closest('.istec-real-parallax-wrap');
            if (!wrap) return;

            const rect = wrap.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                const scrolled = (window.innerHeight - rect.top) / (window.innerHeight + rect.height);
                const translateY = (scrolled - 0.5) * 50;
                parallaxImg.style.transform = `translate3d(0, ${translateY}px, 0)`;
            }
        }, { passive: true });

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
                rootMargin: '0px 0px -20px 0px'
            });

            reveals.forEach(el => observer.observe(el));
        }

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
            .catch(() => ({ success: true }))
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
