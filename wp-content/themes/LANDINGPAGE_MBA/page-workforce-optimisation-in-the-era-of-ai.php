<?php
/**
 * Template Name: Workforce Optimisation in the Era of AI Template
 * Description: Workshop Offline IDEAS × AIDC × Epitome Global (/workforce-optimisation-in-the-era-of-ai)
 */

if (!defined('ABSPATH')) {
    $wp_load = dirname(dirname(dirname(__DIR__))) . '/wp-load.php';
    if (file_exists($wp_load)) {
        require_once $wp_load;
    }
}

global $wp;

$is_en = (isset($_GET['lang']) && $_GET['lang'] === 'en')
    || (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/en/') === 0);

$page_canonical_url = $is_en
    ? 'https://ideas.edu.vn/en/workforce-optimisation-in-the-era-of-ai'
    : 'https://ideas.edu.vn/workforce-optimisation-in-the-era-of-ai';

$theme_uri = function_exists('get_stylesheet_directory_uri')
    ? get_stylesheet_directory_uri()
    : '/wp-content/themes/LANDINGPAGE_MBA';
$theme_dir = function_exists('get_stylesheet_directory')
    ? get_stylesheet_directory()
    : __DIR__;

$asset_base = $theme_uri . '/common-assets/images/workforce-ai';
$og_thumb_url = $asset_base . '/og-workforce-ai.jpg';

$seo_title = $is_en
    ? 'Workshop: Workforce Optimisation in the Era of AI | IDEAS × AIDC × Epitome Global'
    : 'Workshop: Workforce Optimisation in the Era of AI – Đội Ngũ Đã Sẵn Sàng Cho Chiến Lược AI? | IDEAS × AIDC × Epitome Global';

$seo_desc = $is_en
    ? 'Join the exclusive 120-minute offline executive workshop (limited to 30 leaders, HRD, CHRO & L&D Directors) on December 4, 2026 in HCMC. Assess AI workforce readiness and turn skills data into an actionable roadmap with IDEAS, AIDC & Epitome Global.'
    : 'Workshop offline chuyên sâu giới hạn 30 lãnh đạo doanh nghiệp, HR Director & L&D Director (15h00 – 17h00 | Thứ Sáu 04/12/2026 tại TP.HCM). Đánh giá mức độ sẵn sàng AI của đội ngũ, nhận diện khoảng trống kỹ năng và phác thảo lộ trình chuyển đổi nhân sự cùng IDEAS × AIDC × Epitome Global.';

// Override Yoast SEO / RankMath meta if active in WP mode
if (function_exists('add_filter')) {
    add_filter('wpseo_title', function () use ($seo_title) { return $seo_title; });
    add_filter('wpseo_metadesc', function () use ($seo_desc) { return $seo_desc; });
    add_filter('wpseo_opengraph_image', function () use ($og_thumb_url) { return $og_thumb_url; });
    add_filter('rank_math/frontend/title', function () use ($seo_title) { return $seo_title; });
    add_filter('rank_math/frontend/description', function () use ($seo_desc) { return $seo_desc; });
    add_filter('rank_math/opengraph/facebook/image', function () use ($og_thumb_url) { return $og_thumb_url; });
    add_filter('rank_math/opengraph/twitter/image', function () use ($og_thumb_url) { return $og_thumb_url; });
}

// Block legacy main.css
ob_start(function ($html) {
    return preg_replace(
        '/<link[^>]+href=[\'"][^\'"]*LANDINGPAGE_MBA\/main\.css[^\'"]*[\'"][^>]*\/?>/i',
        '<!-- [BLOCKED: LANDINGPAGE_MBA/main.css] -->',
        $html
    );
});
?>
<!DOCTYPE html>
<html lang="<?php echo $is_en ? 'en' : 'vi'; ?>" prefix="og: https://ogp.me/ns#">

<head>
    <?php get_template_part('shared-head'); ?>

    <title><?php echo esc_html($seo_title); ?></title>
    <meta name="title" content="<?php echo esc_attr($seo_title); ?>" />
    <meta name="description" content="<?php echo esc_attr($seo_desc); ?>" />
    <meta name="keywords" content="Workforce Optimisation in the Era of AI, Workshop AI Lãnh đạo, AIDC Vietnam, Epitome Global, Viện IDEAS, Workforce Intelligence, Skills Analytics, Chuyển đổi nhân sự AI, Kevin Chan, Connor Clark Lindh" />
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
    <meta name="author" content="Viện IDEAS × AIDC × Epitome Global" />
    <link rel="canonical" href="<?php echo esc_url($page_canonical_url); ?>" />

    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo esc_url($page_canonical_url); ?>" />
    <meta property="og:site_name" content="Viện IDEAS - Viện Nghiên cứu Đào tạo Kinh tế Hiện đại" />
    <meta property="og:locale" content="<?php echo $is_en ? 'en_US' : 'vi_VN'; ?>" />
    <meta property="og:title" content="<?php echo esc_attr($seo_title); ?>" />
    <meta property="og:description" content="<?php echo esc_attr($seo_desc); ?>" />
    <meta property="og:image" content="<?php echo esc_url($og_thumb_url); ?>" />
    <meta property="og:image:secure_url" content="<?php echo esc_url($og_thumb_url); ?>" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:alt" content="Workshop Workforce Optimisation in the Era of AI – IDEAS × AIDC × Epitome Global" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="<?php echo esc_url($page_canonical_url); ?>" />
    <meta name="twitter:title" content="<?php echo esc_attr($seo_title); ?>" />
    <meta name="twitter:description" content="<?php echo esc_attr($seo_desc); ?>" />
    <meta name="twitter:image" content="<?php echo esc_url($og_thumb_url); ?>" />

    <!-- Preconnect API endpoint -->
    <link rel="preconnect" href="https://myerp.ideas.edu.vn" />
    <link rel="dns-prefetch" href="https://myerp.ideas.edu.vn" />

    <?php
    if (!defined('BOOKING_MODAL_CSS_LOADED')) {
        define('BOOKING_MODAL_CSS_LOADED', true);
    }
    $bk_css_path = $theme_dir . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo esc_url($theme_uri . '/common-assets/css/booking-modal.min.css?v=' . $bk_css_version); ?>"
        media="print" onload="this.media='all'" />

    <!-- Event Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [
        {
          "@type": "BusinessEvent",
          "@id": "<?php echo esc_url($page_canonical_url); ?>#event",
          "name": "Workshop: Workforce Optimisation in the Era of AI",
          "description": <?php echo json_encode($seo_desc, JSON_UNESCAPED_UNICODE); ?>,
          "startDate": "2026-12-04T15:00:00+07:00",
          "endDate": "2026-12-04T17:00:00+07:00",
          "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
          "eventStatus": "https://schema.org/EventScheduled",
          "maximumAttendeeCapacity": 30,
          "image": ["<?php echo esc_url($og_thumb_url); ?>"],
          "location": {
            "@type": "Place",
            "name": "Lumiere Byblos Villa",
            "address": {
              "@type": "PostalAddress",
              "streetAddress": "6B Ngô Thời Nhiệm, Xuân Hòa",
              "addressLocality": "TP. Hồ Chí Minh",
              "addressCountry": "VN"
            }
          },
          "organizer": [
            {
              "@type": "Organization",
              "name": "Viện IDEAS",
              "url": "https://ideas.edu.vn"
            },
            {
              "@type": "Organization",
              "name": "AIDC"
            },
            {
              "@type": "Organization",
              "name": "Epitome Global"
            }
          ],
          "performer": [
            {
              "@type": "Person",
              "name": "Kevin Chan",
              "jobTitle": "CEO, Epitome Global"
            },
            {
              "@type": "Person",
              "name": "Connor Clark Lindh",
              "jobTitle": "Product and Solutions Lead, Epitome Global"
            }
          ],
          "offers": {
            "@type": "Offer",
            "price": "0",
            "priceCurrency": "VND",
            "availability": "https://schema.org/LimitedAvailability",
            "url": "<?php echo esc_url($page_canonical_url); ?>"
          }
        }
      ]
    }
    </script>

    <style>
        /* ════════════════════════════════════════════════════════════════
           WORKFORCE OPTIMISATION IN THE ERA OF AI (SCOPED wf-* DESIGN)
           Brand Palette: IDEAS Crimson (#ab0e00) + Crisp Executive Light
           ════════════════════════════════════════════════════════════════ */
        :root {
            --wf-crimson: #ab0e00;
            --wf-crimson-dark: #820b00;
            --wf-crimson-deep: #4e0700;
            --wf-crimson-soft: #fff5f5;
            --wf-crimson-border: #fecaca;
            --wf-ink: #0f172a;
            --wf-slate: #334155;
            --wf-muted: #64748b;
            --wf-bg: #ffffff;
            --wf-surface: #f8fafc;
            --wf-border: #e2e8f0;
            --wf-radius-lg: 20px;
            --wf-radius-md: 14px;
            --wf-shadow-sm: 0 4px 16px rgba(15, 23, 42, 0.05);
            --wf-shadow-lg: 0 24px 60px rgba(15, 23, 42, 0.12);
        }

        html, body {
            overflow-x: clip !important;
            scroll-behavior: smooth;
        }

        .wf-page {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: var(--wf-slate);
            background-color: var(--wf-bg);
            line-height: 1.65;
        }

        .wf-page h1, .wf-page h2, .wf-page h3, .wf-page h4 {
            -webkit-hyphens: manual;
            hyphens: manual;
        }

        .wf-page *, .wf-page *::before, .wf-page *::after {
            box-sizing: border-box;
        }

        .wf-container {
            max-width: 1220px;
            margin: 0 auto;
            padding: 0 24px;
            width: 100%;
        }

        /* ── Section Header Helper ────────────────────────────────────── */
        .wf-section {
            padding: 84px 0;
            position: relative;
        }

        .wf-section-tinted {
            background: linear-gradient(180deg, #fafbfc 0%, #fff8f8 50%, #ffffff 100%);
            border-top: 1px solid #f1f5f9;
            border-bottom: 1px solid #f1f5f9;
        }

        .wf-section-dark {
            background: radial-gradient(circle at 85% 15%, rgba(171, 14, 0, 0.28) 0%, transparent 50%),
                        linear-gradient(135deg, #120607 0%, #1e0a0b 55%, #0f172a 100%);
            color: #ffffff;
        }

        .wf-sec-head {
            max-width: 780px;
            margin: 0 auto 48px;
            text-align: center;
        }

        .wf-sec-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            border-radius: 999px;
            background: var(--wf-crimson-soft);
            border: 1px solid var(--wf-crimson-border);
            color: var(--wf-crimson);
            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .wf-section-dark .wf-sec-eyebrow {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 165, 165, 0.35);
            color: #fecaca;
        }

        .wf-sec-title {
            font-size: clamp(1.75rem, 3.2vw, 2.5rem);
            font-weight: 800;
            line-height: 1.2;
            color: var(--wf-ink);
            margin: 0 0 16px;
            letter-spacing: -0.02em;
        }

        .wf-section-dark .wf-sec-title {
            color: #ffffff;
        }

        .wf-sec-desc {
            font-size: 1.05rem;
            color: var(--wf-muted);
            margin: 0;
        }

        .wf-section-dark .wf-sec-desc {
            color: #cbd5e1;
        }

        /* ── Hero Section ─────────────────────────────────────────────── */
        .wf-hero {
            position: relative;
            padding: 122px 0 76px;
            background:
                radial-gradient(ellipse 75% 55% at 88% 14%, rgba(171, 14, 0, 0.11) 0%, transparent 65%),
                radial-gradient(ellipse 60% 50% at 8% 85%, rgba(171, 14, 0, 0.06) 0%, transparent 60%),
                linear-gradient(180deg, #fffafa 0%, #ffffff 100%);
            border-bottom: 1px solid #f1e6e6;
            overflow: hidden;
        }

        .wf-hero-grid-pattern {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(to right, rgba(171, 14, 0, 0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(171, 14, 0, 0.03) 1px, transparent 1px);
            background-size: 44px 44px;
            mask-image: radial-gradient(ellipse at 50% 35%, black 35%, transparent 80%);
            -webkit-mask-image: radial-gradient(ellipse at 50% 35%, black 35%, transparent 80%);
            pointer-events: none;
        }

        .wf-hero-grid {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: 1.12fr 0.88fr;
            gap: 44px;
            align-items: start;
        }

        /* Co-organizers bar */
        .wf-cohost-pill {
            display: inline-flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            padding: 10px 20px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(15, 23, 42, 0.05);
            margin-bottom: 20px;
        }

        .wf-cohost-label {
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--wf-muted);
            padding-right: 4px;
        }

        .wf-cohost-logos {
            display: inline-flex;
            align-items: center;
            gap: 14px;
        }

        .wf-cohost-sep {
            width: 1px;
            height: 24px;
            background: #e2e8f0;
        }

        .wf-cohost-logo-ideas {
            height: 30px;
            width: auto;
            object-fit: contain;
        }

        .wf-cohost-logo-aidc {
            height: 22px;
            width: auto;
            object-fit: contain;
        }

        .wf-cohost-logo-epitome {
            height: 32px;
            width: auto;
            object-fit: contain;
        }

        .wf-hero-status {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 7px 16px;
            border-radius: 999px;
            background: linear-gradient(90deg, rgba(171, 14, 0, 0.1) 0%, rgba(171, 14, 0, 0.04) 100%);
            border: 1px solid rgba(171, 14, 0, 0.25);
            color: var(--wf-crimson);
            font-size: 0.8rem;
            font-weight: 800;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .wf-pulse-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--wf-crimson);
            box-shadow: 0 0 0 0 rgba(171, 14, 0, 0.6);
            animation: wfPulse 2s infinite;
        }

        @keyframes wfPulse {
            0% { box-shadow: 0 0 0 0 rgba(171, 14, 0, 0.6); }
            70% { box-shadow: 0 0 0 10px rgba(171, 14, 0, 0); }
            100% { box-shadow: 0 0 0 0 rgba(171, 14, 0, 0); }
        }

        .wf-hero-program-tag {
            font-size: 0.98rem;
            font-weight: 700;
            color: var(--wf-crimson);
            margin-bottom: 10px;
            letter-spacing: 0.01em;
        }

        .wf-hero h1 {
            font-size: clamp(2.05rem, 3.8vw, 3.1rem);
            font-weight: 900;
            line-height: 1.14;
            color: var(--wf-ink);
            margin: 0 0 18px;
            letter-spacing: -0.025em;
        }

        .wf-hero h1 .wf-text-accent {
            color: var(--wf-crimson);
        }

        .wf-hero-lead {
            font-size: 1.12rem;
            font-weight: 600;
            color: #1e293b;
            margin: 0 0 12px;
            line-height: 1.55;
        }

        .wf-hero-sub {
            font-size: 0.98rem;
            color: #475569;
            margin: 0 0 24px;
            line-height: 1.65;
        }

        /* Hero Event Fact Tiles */
        .wf-facts-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 22px;
        }

        .wf-fact-tile {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 16px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.03);
        }

        .wf-fact-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: var(--wf-crimson-soft);
            color: var(--wf-crimson);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .wf-fact-label {
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--wf-muted);
            display: block;
            margin-bottom: 2px;
        }

        .wf-fact-val {
            font-size: 0.92rem;
            font-weight: 800;
            color: var(--wf-ink);
            line-height: 1.35;
        }

        /* Countdown Strip */
        .wf-countdown-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
            padding: 14px 18px;
            border-radius: 14px;
            background: linear-gradient(135deg, #1e0808 0%, #3b0a07 100%);
            color: #ffffff;
            margin-bottom: 10px;
        }

        .wf-countdown-label {
            font-size: 0.84rem;
            font-weight: 700;
            color: #fecaca;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .wf-countdown-units {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .wf-cd-unit {
            min-width: 54px;
            text-align: center;
            padding: 6px 8px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.16);
            border-radius: 10px;
        }

        .wf-cd-num {
            display: block;
            font-size: 1.15rem;
            font-weight: 800;
            line-height: 1.1;
            color: #ffffff;
            font-variant-numeric: tabular-nums;
        }

        .wf-cd-txt {
            display: block;
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: #fca5a5;
            margin-top: 2px;
        }

        /* Mobile quick CTA link inside Hero */
        .wf-mobile-jump {
            display: none;
            margin-top: 14px;
        }

        /* ── Hero Registration Card ───────────────────────────────────── */
        .wf-reg-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-top: 5px solid var(--wf-crimson);
            border-radius: 22px;
            padding: 30px 28px;
            box-shadow: var(--wf-shadow-lg);
            position: relative;
        }

        .wf-reg-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 8px;
            background: var(--wf-crimson-soft);
            color: var(--wf-crimson);
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .wf-reg-title {
            font-size: 1.45rem;
            font-weight: 800;
            color: var(--wf-ink);
            margin: 0 0 6px;
            line-height: 1.25;
        }

        .wf-reg-sub {
            font-size: 0.88rem;
            color: var(--wf-muted);
            margin: 0 0 20px;
            line-height: 1.5;
        }

        .wf-form {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .wf-form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .wf-field {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .wf-field label {
            font-size: 0.82rem;
            font-weight: 700;
            color: #1e293b;
        }

        .wf-field label .req {
            color: var(--wf-crimson);
        }

        .wf-field input,
        .wf-field select,
        .wf-field textarea {
            width: 100%;
            padding: 11px 14px;
            font-family: inherit;
            font-size: 0.92rem;
            color: var(--wf-ink);
            background: #f8fafc;
            border: 1.5px solid #cbd5e1;
            border-radius: 10px;
            transition: border-color 0.2s ease, background-color 0.2s ease, box-shadow 0.2s ease;
            outline: none;
        }

        .wf-field input:focus,
        .wf-field select:focus,
        .wf-field textarea:focus {
            background: #ffffff;
            border-color: var(--wf-crimson);
            box-shadow: 0 0 0 3px rgba(171, 14, 0, 0.12);
        }

        .wf-field input.is-invalid,
        .wf-field select.is-invalid {
            border-color: #dc2626;
            background: #fff5f5;
        }

        .wf-field-err {
            font-size: 0.76rem;
            font-weight: 600;
            color: #dc2626;
            display: none;
        }

        .wf-field-err.visible {
            display: block;
        }

        .wf-submit-btn {
            width: 100%;
            margin-top: 4px;
            padding: 15px 22px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #b91c1c 0%, #8b0000 100%);
            color: #ffffff;
            font-family: inherit;
            font-size: 0.98rem;
            font-weight: 800;
            letter-spacing: 0.02em;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 12px 26px rgba(171, 14, 0, 0.28);
            transition: transform 0.2s ease, box-shadow 0.2s ease, opacity 0.2s ease;
        }

        .wf-submit-btn:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 16px 32px rgba(171, 14, 0, 0.36);
        }

        .wf-submit-btn:disabled {
            opacity: 0.72;
            cursor: not-allowed;
        }

        .wf-form-alert {
            padding: 11px 14px;
            border-radius: 10px;
            background: #fef2f2;
            border: 1px solid #fca5a5;
            color: #991b1b;
            font-size: 0.84rem;
            font-weight: 600;
            display: none;
        }

        .wf-form-alert.visible {
            display: block;
        }

        .wf-trust-note {
            margin: 8px 0 0;
            font-size: 0.76rem;
            color: var(--wf-muted);
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        /* Success state */
        .wf-form-success {
            display: none;
            text-align: center;
            padding: 14px 6px;
        }

        .wf-form-success.visible {
            display: block;
        }

        .wf-success-icon {
            width: 62px;
            height: 62px;
            border-radius: 50%;
            background: #dcfce7;
            color: #15803d;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
        }

        .wf-success-title {
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--wf-ink);
            margin: 0 0 8px;
        }

        .wf-success-msg {
            font-size: 0.92rem;
            color: var(--wf-slate);
            margin: 0 0 18px;
            line-height: 1.6;
        }

        .wf-success-ticket {
            text-align: left;
            padding: 14px 16px;
            background: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 12px;
            font-size: 0.85rem;
            color: var(--wf-slate);
            margin-bottom: 16px;
        }

        .wf-success-ticket strong {
            color: var(--wf-ink);
        }

        .wf-cal-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 18px;
            border-radius: 10px;
            background: var(--wf-ink);
            color: #ffffff !important;
            text-decoration: none;
            font-size: 0.86rem;
            font-weight: 700;
            transition: background 0.2s ease;
        }

        .wf-cal-btn:hover {
            background: var(--wf-crimson);
        }

        /* ── Section 2: Challenges / Pain Points ──────────────────────── */
        .wf-quote-box {
            max-width: 880px;
            margin: 0 auto 38px;
            padding: 24px 28px;
            border-radius: var(--wf-radius-md);
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-left: 5px solid var(--wf-crimson);
            box-shadow: var(--wf-shadow-sm);
            text-align: center;
        }

        .wf-quote-box blockquote {
            margin: 0;
            font-size: clamp(1.1rem, 2vw, 1.35rem);
            font-weight: 800;
            color: var(--wf-ink);
            line-height: 1.45;
        }

        .wf-pain-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 36px;
        }

        .wf-pain-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: var(--wf-radius-lg);
            padding: 26px 26px;
            box-shadow: var(--wf-shadow-sm);
            display: flex;
            align-items: flex-start;
            gap: 18px;
            transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
        }

        .wf-pain-card:hover {
            transform: translateY(-4px);
            border-color: rgba(171, 14, 0, 0.35);
            box-shadow: 0 14px 32px rgba(15, 23, 42, 0.08);
        }

        .wf-pain-num {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: var(--wf-crimson-soft);
            border: 1px solid var(--wf-crimson-border);
            color: var(--wf-crimson);
            font-size: 1rem;
            font-weight: 900;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .wf-pain-card h3 {
            font-size: 1.08rem;
            font-weight: 800;
            color: var(--wf-ink);
            margin: 0 0 8px;
            line-height: 1.35;
        }

        .wf-pain-card p {
            margin: 0;
            font-size: 0.94rem;
            color: var(--wf-muted);
            line-height: 1.6;
        }

        .wf-truth-banner {
            padding: 28px 32px;
            border-radius: var(--wf-radius-lg);
            background: linear-gradient(135deg, #8b0a00 0%, #ab0e00 60%, #c81e1e 100%);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            flex-wrap: wrap;
            box-shadow: 0 16px 36px rgba(171, 14, 0, 0.22);
        }

        .wf-truth-text {
            flex: 1 1 560px;
        }

        .wf-truth-text h3 {
            margin: 0 0 6px;
            font-size: 1.25rem;
            font-weight: 800;
            color: #ffffff;
        }

        .wf-truth-text p {
            margin: 0;
            font-size: 0.96rem;
            color: #fee2e2;
        }

        .wf-btn-white {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 13px 24px;
            border-radius: 12px;
            background: #ffffff;
            color: var(--wf-crimson) !important;
            font-weight: 800;
            font-size: 0.94rem;
            text-decoration: none;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transition: transform 0.2s ease;
            white-space: nowrap;
        }

        .wf-btn-white:hover {
            transform: translateY(-2px);
        }

        /* ── Section 3: Target Audience & Chatham House ───────────────── */
        .wf-audience-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
            margin-bottom: 34px;
        }

        .wf-persona-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: var(--wf-radius-lg);
            padding: 28px 24px;
            box-shadow: var(--wf-shadow-sm);
            position: relative;
            overflow: hidden;
        }

        .wf-persona-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--wf-crimson) 0%, #ef4444 100%);
        }

        .wf-persona-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: var(--wf-crimson-soft);
            color: var(--wf-crimson);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }

        .wf-persona-card h3 {
            font-size: 1.12rem;
            font-weight: 800;
            color: var(--wf-ink);
            margin: 0 0 8px;
        }

        .wf-persona-card p {
            margin: 0;
            font-size: 0.93rem;
            color: var(--wf-muted);
            line-height: 1.6;
        }

        .wf-chatham-box {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 28px;
            padding: 32px;
            border-radius: var(--wf-radius-lg);
            background: #ffffff;
            border: 1px solid #e2e8f0;
            box-shadow: var(--wf-shadow-sm);
            align-items: center;
        }

        .wf-chatham-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 5px 12px;
            border-radius: 8px;
            background: #0f172a;
            color: #ffffff;
            font-size: 0.74rem;
            font-weight: 800;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .wf-chatham-box h3 {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--wf-ink);
            margin: 0 0 10px;
        }

        .wf-chatham-box p {
            margin: 0;
            font-size: 0.95rem;
            color: var(--wf-slate);
            line-height: 1.65;
        }

        .wf-pillars-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .wf-pillar-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 12px;
            background: var(--wf-crimson-soft);
            border: 1px solid var(--wf-crimson-border);
            font-size: 0.92rem;
            font-weight: 700;
            color: var(--wf-ink);
        }

        .wf-pillar-check {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--wf-crimson);
            color: #ffffff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 0.75rem;
        }

        /* ── Section 4: Speakers ──────────────────────────────────────── */
        .wf-speakers-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 28px;
            max-width: 980px;
            margin: 0 auto;
        }

        .wf-speaker-card {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: 22px;
            padding: 30px;
            display: flex;
            gap: 22px;
            align-items: flex-start;
            backdrop-filter: blur(8px);
            transition: transform 0.25s ease, border-color 0.25s ease;
        }

        .wf-speaker-card:hover {
            transform: translateY(-4px);
            border-color: rgba(254, 202, 202, 0.45);
        }

        .wf-speaker-photo-wrap {
            width: 112px;
            height: 112px;
            border-radius: 18px;
            overflow: hidden;
            border: 3px solid rgba(255, 255, 255, 0.85);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
            flex-shrink: 0;
            background: #1e293b;
        }

        .wf-speaker-photo-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center top;
            display: block;
        }

        .wf-speaker-tag {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 6px;
            background: var(--wf-crimson);
            color: #ffffff;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .wf-speaker-name {
            font-size: 1.3rem;
            font-weight: 800;
            color: #ffffff;
            margin: 0 0 4px;
        }

        .wf-speaker-role {
            font-size: 0.92rem;
            font-weight: 700;
            color: #fecaca;
            margin: 0 0 10px;
        }

        .wf-speaker-bio {
            margin: 0;
            font-size: 0.9rem;
            color: #e2e8f0;
            line-height: 1.6;
        }

        /* ── Section 5: 120-Minute Timeline ───────────────────────────── */
        .wf-timeline {
            max-width: 920px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .wf-tl-item {
            display: grid;
            grid-template-columns: 170px 1fr;
            gap: 22px;
            padding: 20px 24px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: var(--wf-shadow-sm);
            align-items: start;
            transition: border-color 0.2s ease, transform 0.2s ease;
        }

        .wf-tl-item:hover {
            border-color: rgba(171, 14, 0, 0.35);
            transform: translateX(4px);
        }

        .wf-tl-time {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 14px;
            border-radius: 10px;
            background: var(--wf-crimson-soft);
            border: 1px solid var(--wf-crimson-border);
            color: var(--wf-crimson);
            font-weight: 800;
            font-size: 0.92rem;
            font-variant-numeric: tabular-nums;
            text-align: center;
        }

        .wf-tl-body h3 {
            margin: 0 0 6px;
            font-size: 1.06rem;
            font-weight: 800;
            color: var(--wf-ink);
        }

        .wf-tl-body p {
            margin: 0;
            font-size: 0.93rem;
            color: var(--wf-muted);
            line-height: 1.6;
        }

        /* ── Section 6: Outcomes & Value ──────────────────────────────── */
        .wf-pillars-4 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 42px;
        }

        .wf-pillar4-card {
            padding: 22px 20px;
            border-radius: 16px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            box-shadow: var(--wf-shadow-sm);
        }

        .wf-pillar4-card h4 {
            margin: 0 0 8px;
            font-size: 1rem;
            font-weight: 800;
            color: var(--wf-crimson);
        }

        .wf-pillar4-card p {
            margin: 0;
            font-size: 0.9rem;
            color: var(--wf-slate);
            line-height: 1.55;
        }

        .wf-outcomes-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .wf-outcome-card {
            padding: 26px 24px;
            border-radius: var(--wf-radius-lg);
            background: #ffffff;
            border: 1px solid #e2e8f0;
            box-shadow: var(--wf-shadow-sm);
        }

        .wf-outcome-num {
            display: inline-block;
            font-size: 1.7rem;
            font-weight: 900;
            line-height: 1;
            color: var(--wf-crimson);
            margin-bottom: 12px;
            letter-spacing: -0.03em;
        }

        .wf-outcome-card p {
            margin: 0;
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--wf-ink);
            line-height: 1.6;
        }

        /* ── Section 7: Partners & Venue + Bottom CTA ─────────────────── */
        .wf-partners-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 38px;
        }

        .wf-partner-card {
            padding: 24px;
            border-radius: var(--wf-radius-md);
            background: #ffffff;
            border: 1px solid #e2e8f0;
            text-align: center;
            box-shadow: var(--wf-shadow-sm);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .wf-partner-card img {
            max-height: 44px;
            max-width: 170px;
            width: auto;
            object-fit: contain;
        }

        .wf-partner-card span {
            font-size: 0.86rem;
            color: var(--wf-muted);
            font-weight: 600;
        }

        .wf-venue-cta-box {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 32px;
            padding: 36px;
            border-radius: 24px;
            background: linear-gradient(135deg, #fff5f5 0%, #ffffff 55%, #f8fafc 100%);
            border: 1.5px solid #fecaca;
            box-shadow: var(--wf-shadow-lg);
            align-items: center;
        }

        .wf-venue-list {
            list-style: none;
            padding: 0;
            margin: 18px 0 22px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .wf-venue-list li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 0.95rem;
            color: var(--wf-slate);
        }

        .wf-venue-list li strong {
            color: var(--wf-ink);
        }

        .wf-venue-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .wf-btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 14px 24px;
            border-radius: 12px;
            background: linear-gradient(135deg, #b91c1c 0%, #8b0000 100%);
            color: #ffffff !important;
            font-weight: 800;
            font-size: 0.95rem;
            text-decoration: none;
            box-shadow: 0 10px 24px rgba(171, 14, 0, 0.25);
            transition: transform 0.2s ease;
        }

        .wf-btn-primary:hover {
            transform: translateY(-2px);
        }

        .wf-btn-outline {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 13px 20px;
            border-radius: 12px;
            background: #ffffff;
            border: 1.5px solid #cbd5e1;
            color: var(--wf-ink) !important;
            font-weight: 700;
            font-size: 0.92rem;
            text-decoration: none;
            transition: border-color 0.2s ease, color 0.2s ease;
        }

        .wf-btn-outline:hover {
            border-color: var(--wf-crimson);
            color: var(--wf-crimson) !important;
        }

        .wf-cta-summary-panel {
            padding: 28px;
            border-radius: 18px;
            background: linear-gradient(135deg, #120607 0%, #3d0904 100%);
            color: #ffffff;
        }

        .wf-cta-summary-panel h3 {
            margin: 0 0 10px;
            font-size: 1.35rem;
            font-weight: 800;
            color: #ffffff;
        }

        .wf-cta-summary-panel p {
            margin: 0 0 18px;
            font-size: 0.93rem;
            color: #e2e8f0;
            line-height: 1.6;
        }

        .wf-slot-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 12px;
            border-radius: 999px;
            background: rgba(254, 202, 202, 0.16);
            border: 1px solid rgba(254, 202, 202, 0.35);
            color: #fecaca;
            font-size: 0.78rem;
            font-weight: 800;
            margin-bottom: 12px;
        }

        /* ── Responsive Breakpoints ───────────────────────────────────── */
        @media (max-width: 1024px) {
            .wf-hero-grid {
                grid-template-columns: 1fr;
                gap: 32px;
            }
            .wf-mobile-jump {
                display: block;
            }
            .wf-pillars-4 {
                grid-template-columns: repeat(2, 1fr);
            }
            .wf-venue-cta-box,
            .wf-chatham-box {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .wf-hero {
                padding: 104px 0 56px;
            }
            .wf-section {
                padding: 60px 0;
            }
            .wf-facts-grid,
            .wf-pain-grid,
            .wf-audience-grid,
            .wf-speakers-grid,
            .wf-outcomes-grid,
            .wf-partners-grid,
            .wf-pillars-4,
            .wf-form-row {
                grid-template-columns: 1fr;
            }
            .wf-speaker-card {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            .wf-tl-item {
                grid-template-columns: 1fr;
                gap: 10px;
            }
            .wf-tl-time {
                justify-self: start;
            }
            .wf-reg-card {
                padding: 24px 18px;
            }
            .wf-venue-cta-box {
                padding: 24px 18px;
            }
        }
    </style>
</head>

<body <?php if (function_exists('body_class')) { body_class('wf-body'); } else { echo 'class="wf-body"'; } ?>>

<?php get_template_part('shared-header'); ?>

<div class="mobile-overlay" id="mobile-overlay"></div>

<main id="content" class="wf-page">

    <!-- ════════════════════════════════════════════════════════════════
         1. HERO SECTION + WORKSHOP REGISTRATION FORM
         ════════════════════════════════════════════════════════════════ -->
    <section class="wf-hero" id="workshop-hero">
        <div class="wf-hero-grid-pattern" aria-hidden="true"></div>
        <div class="wf-container">
            <div class="wf-hero-grid">

                <!-- Left Column: Value Proposition & Event Info -->
                <div class="wf-hero-info">
                    <!-- 3 Co-organizer Logos -->
                    <div class="wf-cohost-pill" aria-label="<?php echo $is_en ? 'Co-organized by IDEAS, AIDC and Epitome Global' : 'Đơn vị đồng tổ chức IDEAS, AIDC và Epitome Global'; ?>">
                        <span class="wf-cohost-label"><?php echo $is_en ? 'Co-hosted by' : 'Đồng tổ chức'; ?></span>
                        <div class="wf-cohost-logos">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg-optimized.webp"
                                 alt="IDEAS" class="wf-cohost-logo-ideas" width="90" height="50" decoding="async" />
                            <span class="wf-cohost-sep" aria-hidden="true"></span>
                            <img src="<?php echo esc_url($asset_base . '/logo-aidc.png'); ?>"
                                 alt="AIDC" class="wf-cohost-logo-aidc" width="100" height="31" decoding="async" />
                            <span class="wf-cohost-sep" aria-hidden="true"></span>
                            <img src="<?php echo esc_url($asset_base . '/logo-epitome.png'); ?>"
                                 alt="Epitome Global" class="wf-cohost-logo-epitome" width="38" height="39" decoding="async" />
                        </div>
                    </div>

                    <div class="wf-hero-status">
                        <span class="wf-pulse-dot" aria-hidden="true"></span>
                        <span><?php echo $is_en ? 'INVITATION-ONLY WORKSHOP • LIMITED TO 30 LEADERS' : 'WORKSHOP OFFLINE • GIỚI HẠN 30 KHÁCH MỜI'; ?></span>
                    </div>

                    <div class="wf-hero-program-tag">
                        <?php echo $is_en ? 'Executive Workshop: Workforce Optimisation in the Era of AI' : 'Workshop: Workforce Optimisation in the Era of AI'; ?>
                    </div>

                    <h1>
                        <?php if ($is_en): ?>
                            AI READY — <span class="wf-text-accent">IS YOUR WORKFORCE READY?</span>
                        <?php else: ?>
                            ĐỘI NGŨ CỦA BẠN ĐÃ SẴN SÀNG CHO <span class="wf-text-accent">CHIẾN LƯỢC AI</span> CHƯA?
                        <?php endif; ?>
                    </h1>

                    <p class="wf-hero-lead">
                        <?php echo $is_en
                            ? 'Organizations already have an AI strategy. Does your workforce have the real capability to turn that strategy into measurable results?'
                            : 'Doanh nghiệp đã có chiến lược AI. Nhưng đội ngũ của bạn có đủ năng lực để biến chiến lược thành kết quả thực tế?'; ?>
                    </p>

                    <p class="wf-hero-sub">
                        <?php echo $is_en
                            ? 'Understand your workforce capability before scaling AI deployment. Transform skills and talent data into a concrete, actionable transformation roadmap in 120 intensive minutes.'
                            : 'Thấu hiểu năng lực đội ngũ trước khi triển khai AI. Chuyển hóa dữ liệu kỹ năng và nhân tài thành lộ trình hành động cụ thể cho doanh nghiệp trong 120 phút thực hành và thảo luận chuyên sâu.'; ?>
                    </p>

                    <!-- Live Countdown -->
                    <div class="wf-countdown-bar" id="wf-countdown-bar">
                        <div class="wf-countdown-label">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2zm1 10.414 3.293 3.293-1.414 1.414L11 13.242V6h2z"/></svg>
                            <span id="wf-cd-heading"><?php echo $is_en ? 'Workshop begins in:' : 'Thời gian còn lại trước giờ khai mạc:'; ?></span>
                        </div>
                        <div class="wf-countdown-units" id="wf-cd-units">
                            <div class="wf-cd-unit"><span class="wf-cd-num" id="wf-cd-days">00</span><span class="wf-cd-txt"><?php echo $is_en ? 'Days' : 'Ngày'; ?></span></div>
                            <div class="wf-cd-unit"><span class="wf-cd-num" id="wf-cd-hours">00</span><span class="wf-cd-txt"><?php echo $is_en ? 'Hrs' : 'Giờ'; ?></span></div>
                            <div class="wf-cd-unit"><span class="wf-cd-num" id="wf-cd-mins">00</span><span class="wf-cd-txt"><?php echo $is_en ? 'Mins' : 'Phút'; ?></span></div>
                            <div class="wf-cd-unit"><span class="wf-cd-num" id="wf-cd-secs">00</span><span class="wf-cd-txt"><?php echo $is_en ? 'Secs' : 'Giây'; ?></span></div>
                        </div>
                    </div>

                    <!-- 4 Key Facts -->
                    <div class="wf-facts-grid">
                        <div class="wf-fact-tile">
                            <div class="wf-fact-icon" aria-hidden="true">
                                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M19 4h-1V2h-2v2H8V2H6v2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 16H5V10h14v10zM5 8V6h14v2H5z"/></svg>
                            </div>
                            <div>
                                <span class="wf-fact-label"><?php echo $is_en ? 'Date & Time' : 'Thời gian'; ?></span>
                                <span class="wf-fact-val"><?php echo $is_en ? '15:00 – 17:00 | Fri, Dec 04, 2026' : '15h00 – 17h00 | Thứ 6 – 04/12/2026'; ?></span>
                            </div>
                        </div>

                        <div class="wf-fact-tile">
                            <div class="wf-fact-icon" aria-hidden="true">
                                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5A2.5 2.5 0 1 1 14.5 9 2.5 2.5 0 0 1 12 11.5z"/></svg>
                            </div>
                            <div>
                                <span class="wf-fact-label"><?php echo $is_en ? 'Venue' : 'Địa điểm'; ?></span>
                                <span class="wf-fact-val">Lumiere Byblos Villa – 6B Ngô Thời Nhiệm, Xuân Hòa, TP.HCM</span>
                            </div>
                        </div>

                        <div class="wf-fact-tile">
                            <div class="wf-fact-icon" aria-hidden="true">
                                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                            </div>
                            <div>
                                <span class="wf-fact-label"><?php echo $is_en ? 'Capacity' : 'Số lượng'; ?></span>
                                <span class="wf-fact-val"><?php echo $is_en ? 'Strictly 30 Executive Seats' : 'Giới hạn 30 suất (Lãnh đạo, HRD, L&D)'; ?></span>
                            </div>
                        </div>

                        <div class="wf-fact-tile">
                            <div class="wf-fact-icon" aria-hidden="true">
                                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M20 6h-2.18c.11-.31.18-.65.18-1a2.996 2.996 0 0 0-5.5-1.65l-.5.67-.5-.68C10.96 2.54 10.05 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-5-2c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zM9 4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm11 15H4v-2h16v2zm0-5H4V8h5.08L7 10.83 8.62 12 11 8.76l1-1.36 1 1.36L15.38 12 17 10.83 14.92 8H20v6z"/></svg>
                            </div>
                            <div>
                                <span class="wf-fact-label"><?php echo $is_en ? 'Admission' : 'Chi phí tham dự'; ?></span>
                                <span class="wf-fact-val"><?php echo $is_en ? 'Complimentary (Free Ticket)' : 'Miễn phí 100% vé tham gia'; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="wf-mobile-jump">
                        <a href="#workshop-register" class="wf-btn-primary" style="width:100%;">
                            <?php echo $is_en ? 'Reserve Your Seat Now' : 'Đăng ký giữ suất ngay'; ?>
                        </a>
                    </div>
                </div>

                <!-- Right Column: Registration Form -->
                <div class="wf-reg-card" id="workshop-register">
                    <div id="wf-form-header">
                        <span class="wf-reg-badge"><?php echo $is_en ? 'FREE INVITATION • 30 SEATS ONLY' : 'MIỄN PHÍ THAM GIA • 30 SUẤT'; ?></span>
                        <h2 class="wf-reg-title"><?php echo $is_en ? 'Reserve Your Seat' : 'Đăng Ký Tham Dự Workshop'; ?></h2>
                        <p class="wf-reg-sub">
                            <?php echo $is_en
                                ? 'For C-Level Executives, HR Directors (CHRO) & Learning Directors (L&D).'
                                : 'Dành cho Lãnh đạo doanh nghiệp, Giám đốc Nhân sự (HRD/CHRO) & Giám đốc Đào tạo (L&D).'; ?>
                        </p>
                    </div>

                    <form class="wf-form" id="workshop-reg-form" novalidate aria-label="Form đăng ký Workshop Workforce Optimisation in the Era of AI">
                        <div class="wf-field">
                            <label for="wf-fullname"><?php echo $is_en ? 'Full Name' : 'Họ và tên'; ?> <span class="req">*</span></label>
                            <input type="text" id="wf-fullname" name="lastName" required
                                   placeholder="<?php echo $is_en ? 'Your full name' : 'Ví dụ: Nguyễn Văn A'; ?>" />
                            <span class="wf-field-err" id="wf-fullname-err"><?php echo $is_en ? 'Please enter your full name.' : 'Vui lòng nhập họ và tên.'; ?></span>
                        </div>

                        <div class="wf-form-row">
                            <div class="wf-field">
                                <label for="wf-email"><?php echo $is_en ? 'Work Email' : 'Địa chỉ Email'; ?> <span class="req">*</span></label>
                                <input type="email" id="wf-email" name="email" required
                                       placeholder="name@company.com" />
                                <span class="wf-field-err" id="wf-email-err"><?php echo $is_en ? 'Please enter a valid email.' : 'Vui lòng nhập email hợp lệ.'; ?></span>
                            </div>

                            <div class="wf-field">
                                <label for="wf-phone"><?php echo $is_en ? 'Phone Number' : 'Số điện thoại'; ?> <span class="req">*</span></label>
                                <input type="tel" id="wf-phone" name="phoneNumber" required
                                       placeholder="09xx xxx xxx" />
                                <span class="wf-field-err" id="wf-phone-err"><?php echo $is_en ? 'Please enter a valid phone number.' : 'Vui lòng nhập số điện thoại hợp lệ.'; ?></span>
                            </div>
                        </div>

                        <div class="wf-form-row">
                            <div class="wf-field">
                                <label for="wf-job-title"><?php echo $is_en ? 'Job Title / Position' : 'Chức danh'; ?> <span class="req">*</span></label>
                                <select id="wf-job-title" name="job_title" required>
                                    <option value=""><?php echo $is_en ? '-- Select title --' : '-- Chọn chức danh --'; ?></option>
                                    <option value="CEO / Founder / Chủ doanh nghiệp"><?php echo $is_en ? 'CEO / Founder / Business Owner' : 'CEO / Founder / Chủ doanh nghiệp'; ?></option>
                                    <option value="HR Director / CHRO"><?php echo $is_en ? 'HR Director / CHRO' : 'Giám đốc Nhân sự (HRD / CHRO)'; ?></option>
                                    <option value="L&D Director / Trưởng phòng Đào tạo"><?php echo $is_en ? 'L&D Director / Learning Head' : 'Giám đốc Đào tạo (L&D Director)'; ?></option>
                                    <option value="C-Level / Giám đốc chức năng"><?php echo $is_en ? 'C-Suite / Functional Director' : 'C-Level / Giám đốc chức năng'; ?></option>
                                    <option value="Senior Manager / Trưởng phòng"><?php echo $is_en ? 'Senior Manager / Department Head' : 'Quản lý cấp trung / Trưởng phòng'; ?></option>
                                    <option value="Khác"><?php echo $is_en ? 'Other' : 'Khác (tự nhập)'; ?></option>
                                </select>
                                <span class="wf-field-err" id="wf-job-err"><?php echo $is_en ? 'Please select your job title.' : 'Vui lòng chọn chức danh.'; ?></span>
                            </div>

                            <div class="wf-field">
                                <label for="wf-company"><?php echo $is_en ? 'Company / Organization' : 'Doanh nghiệp / Tổ chức'; ?></label>
                                <input type="text" id="wf-company" name="company"
                                       placeholder="<?php echo $is_en ? 'Company name' : 'Tên công ty của bạn'; ?>" />
                            </div>
                        </div>

                        <div class="wf-field" id="wf-other-job-wrap" style="display: none;">
                            <label for="wf-other-job-title"><?php echo $is_en ? 'Specify Job Title' : 'Nhập chức danh cụ thể'; ?> <span class="req">*</span></label>
                            <input type="text" id="wf-other-job-title" name="other_job_title"
                                   placeholder="<?php echo $is_en ? 'Enter your role' : 'Nhập chức danh của anh/chị'; ?>" />
                            <span class="wf-field-err" id="wf-other-job-err"><?php echo $is_en ? 'Please enter your job title.' : 'Vui lòng nhập chức danh.'; ?></span>
                        </div>

                        <div class="wf-form-row">
                            <div class="wf-field">
                                <label for="wf-team-size"><?php echo $is_en ? 'Workforce Size' : 'Quy mô nhân sự'; ?></label>
                                <select id="wf-team-size" name="team_size">
                                    <option value=""><?php echo $is_en ? '-- Select size --' : '-- Chọn quy mô --'; ?></option>
                                    <option value="Dưới 50 nhân sự"><?php echo $is_en ? 'Under 50 employees' : 'Dưới 50 nhân sự'; ?></option>
                                    <option value="50 - 200 nhân sự"><?php echo $is_en ? '50 – 200 employees' : '50 – 200 nhân sự'; ?></option>
                                    <option value="200 - 500 nhân sự"><?php echo $is_en ? '200 – 500 employees' : '200 – 500 nhân sự'; ?></option>
                                    <option value="Trên 500 nhân sự"><?php echo $is_en ? '500+ employees' : 'Trên 500 nhân sự'; ?></option>
                                </select>
                            </div>

                            <div class="wf-field">
                                <label for="wf-focus-area"><?php echo $is_en ? 'Key Priority Topic' : 'Chủ đề ưu tiên thảo luận'; ?></label>
                                <select id="wf-focus-area" name="focus_area">
                                    <option value="Sẵn sàng cho tăng trưởng & năng lực AI"><?php echo $is_en ? 'Readiness for Growth & AI Skills' : 'Sẵn sàng cho tăng trưởng & năng lực AI'; ?></option>
                                    <option value="Rủi ro kế thừa & phát triển nhân tài nội bộ"><?php echo $is_en ? 'Succession Risk & Internal Talent' : 'Rủi ro kế thừa & nhân tài nội bộ'; ?></option>
                                    <option value="Quản trị và ứng dụng AI có trách nhiệm"><?php echo $is_en ? 'Responsible AI Governance' : 'Quản trị & ứng dụng AI có trách nhiệm'; ?></option>
                                    <option value="Tổng thể lộ trình chuyển đổi nhân sự AI"><?php echo $is_en ? 'Full AI Workforce Transformation' : 'Tổng thể chuyển đổi nhân sự AI'; ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="wf-field">
                            <label for="wf-note"><?php echo $is_en ? 'Current Workforce Challenge (Optional)' : 'Thách thức đội ngũ anh/chị muốn trao đổi thêm (tùy chọn)'; ?></label>
                            <textarea id="wf-note" name="note" rows="2"
                                      placeholder="<?php echo $is_en ? 'Briefly share your organizational goal or question...' : 'Ví dụ: Đánh giá khoảng trống kỹ năng AI cho cấp quản lý và đội ngũ vận hành...'; ?>"></textarea>
                        </div>

                        <div class="wf-form-alert" id="wf-form-alert" role="alert"></div>

                        <button type="submit" class="wf-submit-btn" id="wf-submit-btn">
                            <span><?php echo $is_en ? 'CONFIRM REGISTRATION' : 'ĐĂNG KÝ THAM DỰ NGAY'; ?></span>
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
                        </button>

                        <p class="wf-trust-note">
                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 1 3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                            <span><?php echo $is_en ? 'Chatham House Rule • Strict Confidentiality Guaranteed' : 'Nguyên tắc thảo luận kín Chatham House • Bảo mật tuyệt đối thông tin'; ?></span>
                        </p>
                    </form>

                    <!-- Inline Success State -->
                    <div class="wf-form-success" id="wf-form-success" aria-live="polite">
                        <div class="wf-success-icon" aria-hidden="true">
                            <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24"><path d="M9 16.17 4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                        </div>
                        <h3 class="wf-success-title"><?php echo $is_en ? 'Registration Confirmed!' : 'Đăng Ký Thành Công!'; ?></h3>
                        <p class="wf-success-msg" id="wf-success-msg"></p>
                        <div class="wf-success-ticket">
                            <div><strong><?php echo $is_en ? 'Event:' : 'Sự kiện:'; ?></strong> Workshop Workforce Optimisation in the Era of AI</div>
                            <div><strong><?php echo $is_en ? 'Time:' : 'Thời gian:'; ?></strong> <?php echo $is_en ? '15:00 – 17:00 | Friday, Dec 04, 2026' : '15h00 – 17h00 | Thứ Sáu, 04/12/2026'; ?></div>
                            <div><strong><?php echo $is_en ? 'Venue:' : 'Địa điểm:'; ?></strong> Lumiere Byblos Villa – 6B Ngô Thời Nhiệm, Xuân Hòa, TP.HCM</div>
                        </div>
                        <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text=Workshop%3A+Workforce+Optimisation+in+the+Era+of+AI+(IDEAS+%C3%97+AIDC+%C3%97+Epitome+Global)&dates=20261204T080000Z/20261204T100000Z&location=Lumiere+Byblos+Villa+-+6B+Ng%C3%B4+Th%E1%BB%9Di+Nhi%E1%BB%87m%2C+Xu%C3%A2n+H%C3%B2a%2C+TP.+H%E1%BB%93+Ch%C3%AD+Minh&details=Workshop+chuy%C3%AAn+s%C3%A2u+v%E1%BB%81+n%C4%83ng+l%E1%BB%B1c+%C4%91%E1%BB%99i+ng%C5%A9+trong+k%E1%BB%B7+nguy%C3%AAn+AI+do+IDEAS%2C+AIDC+v%C3%A0+Epitome+Global+t%E1%BB%95+ch%E1%BB%A9c."
                           target="_blank" rel="noopener noreferrer" class="wf-cal-btn">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 4h-1V2h-2v2H8V2H6v2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 16H5V10h14v10z"/></svg>
                            <span><?php echo $is_en ? 'Add to Google Calendar' : 'Lưu lịch vào Google Calendar'; ?></span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════════════════════════════════
         2. CHALLENGES / PAIN POINTS
         ════════════════════════════════════════════════════════════════ -->
    <section class="wf-section" id="challenges">
        <div class="wf-container">
            <div class="wf-sec-head">
                <span class="wf-sec-eyebrow"><?php echo $is_en ? 'THE REAL TRANSFORMATION BOTTLENECK' : 'BÀI TOÁN THỰC TẾ TẠI DOANH NGHIỆP'; ?></span>
                <h2 class="wf-sec-title">
                    <?php echo $is_en ? 'Technology Alone Does Not Guarantee Execution' : 'Đã Đến Lúc Chuyển Từ Chiến Lược AI Sang Năng Lực Thực Thi'; ?>
                </h2>
                <p class="wf-sec-desc">
                    <?php echo $is_en
                        ? 'Investing in AI platforms is only step one. When rolling out AI across daily operations, leaders face four critical workforce obstacles.'
                        : 'Đầu tư công nghệ không đồng nghĩa với chuyển đổi thành công. Khi đưa AI vào vận hành thực tế, hàng loạt bài toán nhân sự mới bắt đầu lộ diện.'; ?>
                </p>
            </div>

            <div class="wf-quote-box">
                <blockquote>
                    <?php echo $is_en
                        ? '“Who across your organization truly has the capability to execute your AI strategy?”'
                        : '“Ai trong đội ngũ của bạn thực sự đủ năng lực để triển khai chiến lược AI đó?”'; ?>
                </blockquote>
            </div>

            <div class="wf-pain-grid">
                <article class="wf-pain-card">
                    <div class="wf-pain-num">01</div>
                    <div>
                        <h3><?php echo $is_en ? 'Dependence on Key Talent & Retention Risk' : 'Phụ thuộc cá nhân chủ chốt & Rủi ro thiếu hụt năng lực'; ?></h3>
                        <p><?php echo $is_en
                            ? 'Key personnel are at risk of leaving, creating critical capability gaps across strategic initiatives and succession planning.'
                            : 'Nhân sự chủ chốt có nguy cơ rời đi, kéo theo sự thiếu hụt năng lực quan trọng mà doanh nghiệp chưa kịp chuẩn bị đội ngũ kế thừa.'; ?></p>
                    </div>
                </article>

                <article class="wf-pain-card">
                    <div class="wf-pain-num">02</div>
                    <div>
                        <h3><?php echo $is_en ? 'Skill Gaps Between Teams & AI Roadmap' : 'Khoảng trống kỹ năng giữa đội ngũ hiện tại và mục tiêu AI'; ?></h3>
                        <p><?php echo $is_en
                            ? 'Employees may use AI for fragmented daily tasks, yet managers lack the skills to embed AI into operational decisions.'
                            : 'Đội ngũ hiện tại chưa đáp ứng được những kỹ năng mà chiến lược AI yêu cầu để biến công cụ thành năng lực vận hành thực sự.'; ?></p>
                    </div>
                </article>

                <article class="wf-pain-card">
                    <div class="wf-pain-num">03</div>
                    <div>
                        <h3><?php echo $is_en ? 'Costly Hiring While Internal Talent Goes Untapped' : 'Tuyển mới tốn kém trong khi tiềm năng nội bộ chưa được khai thác'; ?></h3>
                        <p><?php echo $is_en
                            ? 'Recruiting specialized AI talent drives up operating costs and lead time, while internal upskilling paths remain unclear.'
                            : 'Tuyển dụng nhân sự AI mới vừa tốn thời gian, vừa tạo áp lực lên chi phí vận hành trong khi tiềm năng của đội ngũ hiện tại chưa được nhận diện đúng.'; ?></p>
                    </div>
                </article>

                <article class="wf-pain-card">
                    <div class="wf-pain-num">04</div>
                    <div>
                        <h3><?php echo $is_en ? 'Lack of Skills Data for L&D Prioritization' : 'Thiếu dữ liệu đánh giá để định hướng đào tạo đúng trọng tâm'; ?></h3>
                        <p><?php echo $is_en
                            ? 'Companies invest in training without objective workforce data to pinpoint who needs upskilling and which competencies matter most.'
                            : 'Doanh nghiệp đầu tư đào tạo nhưng thiếu dữ liệu để xác định ai cần được đào tạo, ai có thể phát triển và đâu là khoảng trống cần ưu tiên.'; ?></p>
                    </div>
                </article>
            </div>

            <div class="wf-truth-banner">
                <div class="wf-truth-text">
                    <h3><?php echo $is_en ? '“AI transforms operations — human capability decides how far your business goes.”' : '“AI có thể thay đổi cách doanh nghiệp vận hành. Nhưng chính năng lực con người mới quyết định doanh nghiệp đi xa đến đâu.”'; ?></h3>
                    <p><?php echo $is_en
                        ? 'Don’t wait until implementation stalls to discover your organization lacks its most critical capabilities.'
                        : 'Đừng đợi đến khi triển khai mới phát hiện doanh nghiệp đang thiếu những năng lực quan trọng nhất.'; ?></p>
                </div>
                <a href="#workshop-register" class="wf-btn-white js-scroll-register">
                    <span><?php echo $is_en ? 'Join the 30-Seat Workshop' : 'Đăng ký giữ suất ngay'; ?></span>
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════════════════════════════════
         3. TARGET AUDIENCE & CHATHAM HOUSE DISCUSSION FORMAT
         ════════════════════════════════════════════════════════════════ -->
    <section class="wf-section wf-section-tinted" id="audience">
        <div class="wf-container">
            <div class="wf-sec-head">
                <span class="wf-sec-eyebrow"><?php echo $is_en ? 'EXCLUSIVE TO 30 DECISION MAKERS' : 'KHÔNG GIAN CHUYÊN SÂU GIỚI HẠN 30 KHÁCH MỜI'; ?></span>
                <h2 class="wf-sec-title">
                    <?php echo $is_en ? 'Designed Specifically for Business & People Leaders' : 'Dành Riêng Cho Lãnh Đạo Doanh Nghiệp & Nhân Sự Cấp Cao'; ?>
                </h2>
                <p class="wf-sec-desc">
                    <?php echo $is_en
                        ? 'Not a lengthy lecture — a focused executive roundtable to analyze sample workforce data and solve real challenges.'
                        : 'Không diễn thuyết dài dòng. Thay vào đó là không gian trao đổi thực chất, cùng phân tích dữ liệu mẫu và giải quyết trực diện bài toán năng lực nhân sự.'; ?>
                </p>
            </div>

            <div class="wf-audience-grid">
                <div class="wf-persona-card">
                    <div class="wf-persona-icon" aria-hidden="true">
                        <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z"/></svg>
                    </div>
                    <h3><?php echo $is_en ? 'Business Leaders & Senior Executives' : 'Lãnh đạo doanh nghiệp & Quản lý cấp cao'; ?></h3>
                    <p><?php echo $is_en
                        ? 'CEOs, Founders, Managing Directors looking to align AI transformation strategy with workforce execution readiness.'
                        : 'CEO, Founder và Ban Giám đốc cần kết nối chiến lược tăng trưởng, chuyển đổi AI với mức độ sẵn sàng thực thi của đội ngũ.'; ?></p>
                </div>

                <div class="wf-persona-card">
                    <div class="wf-persona-icon" aria-hidden="true">
                        <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    </div>
                    <h3><?php echo $is_en ? 'HR Directors / CHRO' : 'Giám đốc Nhân sự (HR Director / CHRO)'; ?></h3>
                    <p><?php echo $is_en
                        ? 'HR leaders seeking skills analytics to map internal capabilities, address succession risks, and optimize build-vs-buy talent decisions.'
                        : 'Nhà quản trị nhân sự muốn ứng dụng phân tích dữ liệu kỹ năng để quy hoạch nhân tài, giảm rủi ro kế thừa và tối ưu chi phí tuyển mới.'; ?></p>
                </div>

                <div class="wf-persona-card">
                    <div class="wf-persona-icon" aria-hidden="true">
                        <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3 1 9l11 6 9-4.91V17h2V9L12 3z"/></svg>
                    </div>
                    <h3><?php echo $is_en ? 'L&D Directors' : 'Giám đốc Đào tạo & Phát triển (L&D Director)'; ?></h3>
                    <p><?php echo $is_en
                        ? 'Learning leaders aiming to connect competency gaps directly with targeted AI upskilling roadmaps and measurable KPIs.'
                        : 'Lãnh đạo đào tạo cần xác định đúng kỹ năng ưu tiên cho từng vai trò, thiết kế lộ trình phát triển năng lực gắn với mục tiêu kinh doanh.'; ?></p>
                </div>
            </div>

            <div class="wf-chatham-box">
                <div>
                    <span class="wf-chatham-tag"><?php echo $is_en ? 'CHATHAM HOUSE RULE' : 'NGUYÊN TẮC CHATHAM HOUSE'; ?></span>
                    <h3><?php echo $is_en ? 'Open, Candid Peer Exchange Without Attribution' : 'Chia Sẻ Cởi Mở Bài Toán Thực Tế Trong Không Gian Bảo Mật'; ?></h3>
                    <p><?php echo $is_en
                        ? 'All roundtable discussions operate strictly under the Chatham House Rule. Participants are encouraged to share real organizational challenges, lessons learned, and talent bottlenecks openly without concern for personal or company attribution outside the room.'
                        : 'Toàn bộ các phiên thảo luận áp dụng nguyên tắc <strong>Chatham House</strong>: anh/chị có thể thoải mái chia sẻ góc nhìn, kinh nghiệm và những bài toán nhân sự thực tế của doanh nghiệp mà không phải lo lắng về việc phát ngôn cá nhân bị trích dẫn ra bên ngoài.'; ?></p>
                </div>

                <div class="wf-pillars-list">
                    <div class="wf-pillar-item">
                        <span class="wf-pillar-check" aria-hidden="true">✓</span>
                        <span><?php echo $is_en ? 'Workforce readiness for sustainable growth' : 'Sẵn sàng cho tăng trưởng & mở rộng quy mô'; ?></span>
                    </div>
                    <div class="wf-pillar-item">
                        <span class="wf-pillar-check" aria-hidden="true">✓</span>
                        <span><?php echo $is_en ? 'Succession risks & internal talent development' : 'Rủi ro kế thừa & phát triển nhân tài nội bộ'; ?></span>
                    </div>
                    <div class="wf-pillar-item">
                        <span class="wf-pillar-check" aria-hidden="true">✓</span>
                        <span><?php echo $is_en ? 'Responsible AI governance & enterprise adoption' : 'Quản trị và ứng dụng AI có trách nhiệm'; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════════════════════════════════
         4. SPEAKERS FROM EPITOME GLOBAL
         ════════════════════════════════════════════════════════════════ -->
    <section class="wf-section wf-section-dark" id="speakers">
        <div class="wf-container">
            <div class="wf-sec-head">
                <span class="wf-sec-eyebrow"><?php echo $is_en ? 'WORKSHOP FACILITATORS' : 'DIỄN GIẢ ĐỒNG HÀNH CÙNG WORKSHOP'; ?></span>
                <h2 class="wf-sec-title">
                    <?php echo $is_en ? 'Led by International Experts from Epitome Global' : 'Đội Ngũ Dẫn Dắt Workshop Từ Epitome Global'; ?>
                </h2>
                <p class="wf-sec-desc">
                    <?php echo $is_en
                        ? 'Two international leaders bring real-world workforce intelligence, skills analytics, and global operational transformation experience.'
                        : 'Hai diễn giả quốc tế trực tiếp đồng hành cùng các lãnh đạo phân tích dữ liệu năng lực nhân sự và xây dựng chiến lược chuyển đổi lực lượng lao động.'; ?>
                </p>
            </div>

            <div class="wf-speakers-grid">
                <!-- Speaker 1: Kevin Chan -->
                <article class="wf-speaker-card">
                    <div class="wf-speaker-photo-wrap">
                        <img src="<?php echo esc_url($asset_base . '/kevin-chan.jpg'); ?>"
                             alt="Mr. Kevin Chan - CEO, Epitome Global" width="112" height="112" loading="lazy" decoding="async" />
                    </div>
                    <div>
                        <span class="wf-speaker-tag"><?php echo $is_en ? 'Keynote Speaker' : 'Diễn giả chính'; ?></span>
                        <h3 class="wf-speaker-name">Mr. Kevin Chan</h3>
                        <p class="wf-speaker-role">CEO, Epitome Global</p>
                        <p class="wf-speaker-bio">
                            <?php echo $is_en
                                ? '20 years of experience in talent, technology, and enterprise transformation across Asia. Strategic leader specializing in workforce intelligence and skills analytics.'
                                : '20 năm kinh nghiệm về nhân tài, công nghệ và chuyển đổi doanh nghiệp tại châu Á. CEO định hướng chiến lược về workforce intelligence và skills analytics.'; ?>
                        </p>
                    </div>
                </article>

                <!-- Speaker 2: Connor Clark Lindh -->
                <article class="wf-speaker-card">
                    <div class="wf-speaker-photo-wrap">
                        <img src="<?php echo esc_url($asset_base . '/connor-clark-lindh.jpg'); ?>"
                             alt="Mr. Connor Clark Lindh - Product and Solutions Lead at Epitome Global" width="112" height="112" loading="lazy" decoding="async" />
                    </div>
                    <div>
                        <span class="wf-speaker-tag"><?php echo $is_en ? 'Guest Speaker' : 'Diễn giả khách mời'; ?></span>
                        <h3 class="wf-speaker-name">Mr. Connor Clark Lindh</h3>
                        <p class="wf-speaker-role">Product and Solutions Lead, Epitome Global</p>
                        <p class="wf-speaker-bio">
                            <?php echo $is_en
                                ? 'Former Vice President Hub Operations & Global Disciplines at Yara Digital Farming (7 years). Brings deep practical perspectives on talent development and organizational readiness.'
                                : '7 năm kinh nghiệm ở vị trí Vice President Hub Operations & Global Disciplines, Yara Digital Farming. Chuyên sâu về phát triển năng lực đội ngũ và mức độ sẵn sàng tổ chức.'; ?>
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════════════════════════════════
         5. 120-MINUTE AGENDA TIMELINE
         ════════════════════════════════════════════════════════════════ -->
    <section class="wf-section" id="agenda">
        <div class="wf-container">
            <div class="wf-sec-head">
                <span class="wf-sec-eyebrow"><?php echo $is_en ? '120-MINUTE WORKSHOP AGENDA' : 'CHƯƠNG TRÌNH 120 PHÚT CHUYÊN SÂU'; ?></span>
                <h2 class="wf-sec-title">
                    <?php echo $is_en ? 'From Business Challenge to Actionable Workforce Roadmap' : 'Lộ Trình Thực Hành & Thảo Luận Chi Tiết (15h00 – 17h00)'; ?>
                </h2>
                <p class="wf-sec-desc">
                    <?php echo $is_en
                        ? 'Friday, December 04, 2026 — A hands-on structure combining live AIDC × Epitome platform demo, sample role/skill datasets, and leadership planning.'
                        : 'Thứ Sáu, ngày 04/12/2026 — Kết hợp trình diễn nền tảng AIDC × Epitome, thực hành trên bộ dữ liệu năng lực mẫu và phác thảo kế hoạch hành động.'; ?>
                </p>
            </div>

            <div class="wf-timeline">
                <div class="wf-tl-item">
                    <div class="wf-tl-time">15h00 – 15h10</div>
                    <div class="wf-tl-body">
                        <h3><?php echo $is_en ? 'Frame the Business Challenge' : 'Xác định thách thức kinh doanh'; ?></h3>
                        <p><?php echo $is_en
                            ? 'Identify transformation priorities and core workforce capability requirements directly linked to business goals.'
                            : 'Nhận diện những ưu tiên chuyển đổi và yêu cầu về năng lực nhân sự gắn liền với mục tiêu phát triển của doanh nghiệp.'; ?></p>
                    </div>
                </div>

                <div class="wf-tl-item">
                    <div class="wf-tl-time">15h10 – 15h25</div>
                    <div class="wf-tl-body">
                        <h3><?php echo $is_en ? 'Epitome Overview & AIDC × Epitome Live Demo' : 'Giới thiệu Epitome và Demo AIDC × Epitome'; ?></h3>
                        <p><?php echo $is_en
                            ? 'Live platform walkthrough using sample skills and talent intelligence datasets to show visibility at organization and role level.'
                            : 'Trình diễn trực tiếp nền tảng cùng bộ dữ liệu kỹ năng và nhân tài mẫu giúp lãnh đạo quan sát bức tranh năng lực toàn diện.'; ?></p>
                    </div>
                </div>

                <div class="wf-tl-item">
                    <div class="wf-tl-time">15h25 – 15h50</div>
                    <div class="wf-tl-body">
                        <h3><?php echo $is_en ? 'Hands-on Workforce Assessment Exercise' : 'Thực hành đánh giá lực lượng lao động'; ?></h3>
                        <p><?php echo $is_en
                            ? 'Work directly with sample role profiles and employee records to determine what competencies to measure and how to interpret results.'
                            : 'Sử dụng hồ sơ vai trò và nhân viên mẫu để xác định những tiêu chí cần đánh giá và cách diễn giải kết quả một cách chính xác.'; ?></p>
                    </div>
                </div>

                <div class="wf-tl-item">
                    <div class="wf-tl-time">15h50 – 16h10</div>
                    <div class="wf-tl-body">
                        <h3><?php echo $is_en ? 'Turn Skills Data into Strategic Insight' : 'Biến dữ liệu thành Insight chiến lược'; ?></h3>
                        <p><?php echo $is_en
                            ? 'Pinpoint organizational strengths, critical skill gaps, succession exposures, and their direct impact on business execution.'
                            : 'Nhận diện điểm mạnh, khoảng trống kỹ năng, rủi ro kế thừa và ý nghĩa thực tiễn đối với bài toán kinh doanh của doanh nghiệp.'; ?></p>
                    </div>
                </div>

                <div class="wf-tl-item">
                    <div class="wf-tl-time">16h10 – 16h35</div>
                    <div class="wf-tl-body">
                        <h3><?php echo $is_en ? 'Build Workforce Transformation Strategy' : 'Xây dựng chiến lược chuyển đổi lực lượng lao động'; ?></h3>
                        <p><?php echo $is_en
                            ? 'Determine optimal paths: upskilling existing teams, internal mobility, or targeted hiring — plus clear direction and success metrics.'
                            : 'Xác định phương án phát triển nhân sự hiện hữu, điều chuyển nội bộ hoặc tuyển dụng mới; thiết lập định hướng và tiêu chí đo lường hiệu quả.'; ?></p>
                    </div>
                </div>

                <div class="wf-tl-item">
                    <div class="wf-tl-time">16h35 – 16h50</div>
                    <div class="wf-tl-body">
                        <h3><?php echo $is_en ? 'Design Capability Roadmap with AIDC' : 'Thiết kế lộ trình phát triển năng lực cùng AIDC'; ?></h3>
                        <p><?php echo $is_en
                            ? 'Translate priority skill gaps into structured training objectives, learning content, and tailored enterprise development roadmaps.'
                            : 'Chuyển hóa các ưu tiên thành mục tiêu đào tạo, nội dung học tập và lộ trình phát triển phù hợp với nhu cầu riêng của doanh nghiệp.'; ?></p>
                    </div>
                </div>

                <div class="wf-tl-item">
                    <div class="wf-tl-time">16h50 – 17h00</div>
                    <div class="wf-tl-body">
                        <h3><?php echo $is_en ? 'Open Sharing, Q&A & Clear Next Steps' : 'Chia sẻ, Q&A và Bước tiếp theo'; ?></h3>
                        <p><?php echo $is_en
                            ? 'Executive Q&A and discussion on well-scoped workforce assessments or pilot programs tailored for your organization.'
                            : 'Thảo luận trực tiếp cùng chuyên gia về hình thức đánh giá chẩn đoán hoặc triển khai thí điểm có phạm vi rõ ràng cho doanh nghiệp.'; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════════════════════════════════
         6. EXPECTED OUTCOMES (WHAT YOU WILL TAKE AWAY)
         ════════════════════════════════════════════════════════════════ -->
    <section class="wf-section wf-section-tinted" id="outcomes">
        <div class="wf-container">
            <div class="wf-sec-head">
                <span class="wf-sec-eyebrow"><?php echo $is_en ? 'KEY WORKSHOP OUTCOMES' : 'GIÁ TRỊ NHẬN ĐƯỢC SAU WORKSHOP'; ?></span>
                <h2 class="wf-sec-title">
                    <?php echo $is_en ? 'What You Will Gain in 120 Minutes' : 'Bạn Sẽ Nhận Được Gì Sau Workshop?'; ?>
                </h2>
                <p class="wf-sec-desc">
                    <?php echo $is_en
                        ? 'Leave with an initial workforce transformation blueprint, clear visibility into capability gaps, and concrete action steps aligned with business growth.'
                        : 'Sau workshop, doanh nghiệp có được định hướng ban đầu về chiến lược chuyển đổi lực lượng lao động, biết cách nhận diện khoảng trống năng lực và xác định những bước hành động phù hợp.'; ?>
                </p>
            </div>

            <!-- 4 Action Pillars -->
            <div class="wf-pillars-4">
                <div class="wf-pillar4-card">
                    <h4><?php echo $is_en ? 'See Team Capability Clearly' : '1. Nhìn rõ năng lực đội ngũ'; ?></h4>
                    <p><?php echo $is_en ? 'Pinpoint skill gaps impacting AI rollout through structured sample data.' : 'Xác định những khoảng trống kỹ năng có thể ảnh hưởng trực tiếp đến việc triển khai AI.'; ?></p>
                </div>
                <div class="wf-pillar4-card">
                    <h4><?php echo $is_en ? 'Optimize Existing Talent' : '2. Tối ưu nguồn lực nhân sự'; ?></h4>
                    <p><?php echo $is_en ? 'Discuss how to identify and upskill current talent before costly hiring.' : 'Thảo luận cách nhận diện và phát triển nhân sự hiện có trước khi mở rộng tuyển dụng mới.'; ?></p>
                </div>
                <div class="wf-pillar4-card">
                    <h4><?php echo $is_en ? 'Target L&D Investment' : '3. Định hướng đào tạo hiệu quả'; ?></h4>
                    <p><?php echo $is_en ? 'Align priority skills training directly with enterprise AI transformation KPIs.' : 'Kết nối nhu cầu phát triển kỹ năng với mục tiêu chuyển đổi và tăng trưởng của doanh nghiệp.'; ?></p>
                </div>
                <div class="wf-pillar4-card">
                    <h4><?php echo $is_en ? 'Solve Real Cases' : '4. Trao đổi bài toán thực tế'; ?></h4>
                    <p><?php echo $is_en ? 'Deep peer-to-peer discussion in a curated room of 30 senior leaders.' : 'Thảo luận chuyên sâu cùng các lãnh đạo và chuyên gia quốc tế trong nhóm 30 khách mời.'; ?></p>
                </div>
            </div>

            <!-- 5 Core Deliverables -->
            <div class="wf-outcomes-grid">
                <div class="wf-outcome-card">
                    <span class="wf-outcome-num">01</span>
                    <p><?php echo $is_en
                        ? 'Access in-depth advisory, organizational diagnostics, and customized training program design tailored to your enterprise needs.'
                        : 'Cơ hội tiếp cận chương trình tư vấn chuyên sâu, chẩn đoán và thiết kế giải pháp đào tạo riêng, phù hợp với nhu cầu từng doanh nghiệp.'; ?></p>
                </div>
                <div class="wf-outcome-card">
                    <span class="wf-outcome-num">02</span>
                    <p><?php echo $is_en
                        ? 'Identify existing workforce capability risks and emerging skill gaps that could impact mid- and long-term execution.'
                        : 'Nhận diện những rủi ro và khoảng trống về năng lực nhân sự đang tồn tại hoặc có thể phát sinh trong tương lai.'; ?></p>
                </div>
                <div class="wf-outcome-card">
                    <span class="wf-outcome-num">03</span>
                    <p><?php echo $is_en
                        ? 'Understand the direct connection between workforce competencies, business strategy, operational efficiency, and growth targets.'
                        : 'Hiểu rõ mối liên hệ giữa năng lực đội ngũ nhân sự với chiến lược kinh doanh, hiệu quả vận hành và mục tiêu tăng trưởng.'; ?></p>
                </div>
                <div class="wf-outcome-card">
                    <span class="wf-outcome-num">04</span>
                    <p><?php echo $is_en
                        ? 'Prioritize critical competency groups in AI and Data Center operations that require immediate enterprise investment.'
                        : 'Xác định các nhóm năng lực về AI và trung tâm dữ liệu cần ưu tiên phát triển trong doanh nghiệp.'; ?></p>
                </div>
                <div class="wf-outcome-card">
                    <span class="wf-outcome-num">05</span>
                    <p><?php echo $is_en
                        ? 'Establish structured solutions for skills assessment, training, and certification to elevate workforce quality and reduce risk.'
                        : 'Định hướng giải pháp đánh giá, đào tạo và chứng nhận năng lực nhằm nâng cao chất lượng nhân sự và giảm thiểu rủi ro.'; ?></p>
                </div>
                <div class="wf-outcome-card" style="background: linear-gradient(135deg, #ab0e00 0%, #820b00 100%); color: #fff; border-color: transparent; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <span class="wf-outcome-num" style="color: #fecaca;">30 SLOTS</span>
                        <p style="color: #ffffff;"><?php echo $is_en
                            ? 'Limited to 30 senior guests to guarantee high-quality discussion and hands-on practice.'
                            : 'Giới hạn duy nhất 30 lãnh đạo tham dự trực tiếp để đảm bảo chất lượng thảo luận và thực hành trên dữ liệu.'; ?></p>
                    </div>
                    <a href="#workshop-register" class="wf-btn-white js-scroll-register" style="margin-top: 16px; width: 100%;">
                        <?php echo $is_en ? 'Claim Free Invitation' : 'Giữ vé mời miễn phí ngay'; ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════════════════════════════════════════════════════════
         7. CO-ORGANIZERS & VENUE + FINAL CTA
         ════════════════════════════════════════════════════════════════ -->
    <section class="wf-section" id="partners-venue">
        <div class="wf-container">
            <div class="wf-sec-head">
                <span class="wf-sec-eyebrow"><?php echo $is_en ? 'ORGANIZERS & EVENT VENUE' : 'ĐƠN VỊ TỔ CHỨC & ĐỊA ĐIỂM'; ?></span>
                <h2 class="wf-sec-title">
                    <?php echo $is_en ? 'IDEAS × AIDC × Epitome Global' : 'Hợp Tác Tổ Chức Bởi IDEAS × AIDC × Epitome Global'; ?>
                </h2>
            </div>

            <div class="wf-partners-grid">
                <div class="wf-partner-card">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg-optimized.webp"
                         alt="Viện IDEAS" width="135" height="75" loading="lazy" decoding="async" />
                    <span><?php echo $is_en ? 'Enrollment & Academic Companion Partner in Vietnam' : 'Viện Nghiên cứu Đào tạo Kinh tế Hiện đại – Đối tác tuyển sinh & hỗ trợ học thuật tại Việt Nam'; ?></span>
                </div>

                <div class="wf-partner-card">
                    <img src="<?php echo esc_url($asset_base . '/logo-aidc.png'); ?>"
                         alt="AIDC" width="150" height="47" loading="lazy" decoding="async" />
                    <span><?php echo $is_en ? 'AI & Data Center Training & Capability Partner' : 'Đối tác phát triển năng lực chuyên môn AI & Trung tâm Dữ liệu'; ?></span>
                </div>

                <div class="wf-partner-card">
                    <img src="<?php echo esc_url($asset_base . '/logo-epitome.png'); ?>"
                         alt="Epitome Global" width="60" height="62" loading="lazy" decoding="async" />
                    <span><?php echo $is_en ? 'Workforce Intelligence & Skills Analytics Platform' : 'Nền tảng Workforce Intelligence & Phân tích dữ liệu kỹ năng nhân sự toàn cầu'; ?></span>
                </div>
            </div>

            <div class="wf-venue-cta-box">
                <div>
                    <span class="wf-sec-eyebrow" style="margin-bottom: 10px;"><?php echo $is_en ? 'OFFLINE VENUE IN HCMC' : 'THÔNG TIN ĐỊA ĐIỂM & LIÊN HỆ'; ?></span>
                    <h3 style="margin: 0; font-size: 1.55rem; font-weight: 800; color: var(--wf-ink);">
                        Lumiere Byblos Villa
                    </h3>
                    <ul class="wf-venue-list">
                        <li>
                            <svg width="18" height="18" fill="#ab0e00" viewBox="0 0 24 24" style="flex-shrink:0;margin-top:2px;" aria-hidden="true"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5A2.5 2.5 0 1 1 14.5 9 2.5 2.5 0 0 1 12 11.5z"/></svg>
                            <span><strong><?php echo $is_en ? 'Event Venue:' : 'Địa điểm sự kiện:'; ?></strong> 6B Ngô Thời Nhiệm, Xuân Hòa, TP. Hồ Chí Minh</span>
                        </li>
                        <li>
                            <svg width="18" height="18" fill="#ab0e00" viewBox="0 0 24 24" style="flex-shrink:0;margin-top:2px;" aria-hidden="true"><path d="M19 4h-1V2h-2v2H8V2H6v2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 16H5V10h14v10z"/></svg>
                            <span><strong><?php echo $is_en ? 'Schedule:' : 'Thời gian:'; ?></strong> <?php echo $is_en ? '15:00 – 17:00 | Friday, December 04, 2026' : '15h00 – 17h00 | Thứ Sáu, 04/12/2026'; ?></span>
                        </li>
                        <li>
                            <svg width="18" height="18" fill="#ab0e00" viewBox="0 0 24 24" style="flex-shrink:0;margin-top:2px;" aria-hidden="true"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.61 21 3 13.39 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.46.57 3.58a1 1 0 0 1-.25 1.01l-2.2 2.2z"/></svg>
                            <span><strong>Hotline:</strong> <a href="tel:02822442244" style="color:var(--wf-crimson);font-weight:700;text-decoration:none;">028 2244 2244</a></span>
                        </li>
                        <li>
                            <svg width="18" height="18" fill="#ab0e00" viewBox="0 0 24 24" style="flex-shrink:0;margin-top:2px;" aria-hidden="true"><path d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm14 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10z"/></svg>
                            <span><strong><?php echo $is_en ? 'Advisory Office:' : 'Văn phòng tư vấn IDEAS:'; ?></strong> Số B82 Bạch Đằng, Phường Tân Sơn Hòa, TP. Hồ Chí Minh</span>
                        </li>
                    </ul>
                    <div class="wf-venue-actions">
                        <a href="https://www.google.com/maps/search/?api=1&query=6B+Ng%C3%B4+Th%E1%BB%9Di+Nhi%E1%BB%87m%2C+TP+H%E1%BB%93+Ch%C3%AD+Minh"
                           target="_blank" rel="noopener noreferrer" class="wf-btn-outline">
                            <span><?php echo $is_en ? 'Open in Google Maps' : 'Xem chỉ đường Google Maps ↗'; ?></span>
                        </a>
                    </div>
                </div>

                <div class="wf-cta-summary-panel">
                    <span class="wf-slot-pill"><?php echo $is_en ? 'LIMITED TO 30 LEADERS • FREE TICKET' : 'GIỚI HẠN 30 KHÁCH MỜI • MIỄN PHÍ'; ?></span>
                    <h3><?php echo $is_en ? 'Ready to Benchmark Your Workforce AI Readiness?' : 'Đăng Ký Tham Dự Cùng 30 Nhà Lãnh Đạo Doanh Nghiệp'; ?></h3>
                    <p><?php echo $is_en
                        ? 'Reserve your seat now so the organizing team can confirm your invitation and prepare your executive workshop seat.'
                        : 'Hoàn tất đăng ký ngay hôm nay để Ban Tổ Chức xác nhận vé mời miễn phí và sắp xếp chỗ ngồi thảo luận chuyên sâu cho anh/chị.'; ?></p>
                    <a href="#workshop-register" class="wf-btn-white js-scroll-register" style="width:100%;">
                        <span><?php echo $is_en ? 'Register Now' : 'ĐĂNG KÝ NGAY'; ?></span>
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
$js_path = $theme_dir . '/common-assets/js/script.min.js';
$js_version = file_exists($js_path) ? filemtime($js_path) : time();
$bk_js_path = $theme_dir . '/common-assets/js/booking-modal.min.js';
$bk_js_version = file_exists($bk_js_path) ? filemtime($bk_js_path) : time();
?>
<script src="<?php echo esc_url($theme_uri . '/common-assets/js/script.min.js?v=' . $js_version); ?>" defer></script>
<script src="<?php echo esc_url($theme_uri . '/common-assets/js/booking-modal.min.js?v=' . $bk_js_version); ?>" defer></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const isEnMode = <?php echo $is_en ? 'true' : 'false'; ?>;

    // 1. Live Countdown to Dec 04, 2026 15:00 ICT (+07:00)
    (function initCountdown() {
        const targetTime = new Date('2026-12-04T15:00:00+07:00').getTime();
        const daysEl = document.getElementById('wf-cd-days');
        const hrsEl = document.getElementById('wf-cd-hours');
        const minsEl = document.getElementById('wf-cd-mins');
        const secsEl = document.getElementById('wf-cd-secs');
        const headingEl = document.getElementById('wf-cd-heading');
        const unitsEl = document.getElementById('wf-cd-units');

        function pad(n) { return String(Math.max(0, n)).padStart(2, '0'); }

        function tick() {
            const diff = targetTime - Date.now();
            if (diff <= 0) {
                if (headingEl) {
                    headingEl.textContent = isEnMode ? 'Workshop date: 04/12/2026 (15:00 – 17:00)' : 'Sự kiện ngày 04/12/2026 (15h00 – 17h00)';
                }
                if (unitsEl) unitsEl.style.display = 'none';
                return false;
            }
            const d = Math.floor(diff / 86400000);
            const h = Math.floor((diff % 86400000) / 3600000);
            const m = Math.floor((diff % 3600000) / 60000);
            const s = Math.floor((diff % 60000) / 1000);
            if (daysEl) daysEl.textContent = pad(d);
            if (hrsEl) hrsEl.textContent = pad(h);
            if (minsEl) minsEl.textContent = pad(m);
            if (secsEl) secsEl.textContent = pad(s);
            return true;
        }

        if (tick()) {
            setInterval(tick, 1000);
        }
    })();

    // 2. Smooth scroll to registration form on CTA click
    document.querySelectorAll('.js-scroll-register, a[href="#workshop-register"]').forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.getElementById('workshop-register');
            if (target) {
                const headerOffset = 92;
                const y = target.getBoundingClientRect().top + window.pageYOffset - headerOffset;
                window.scrollTo({ top: y, behavior: 'smooth' });
                setTimeout(function () {
                    const nameInput = document.getElementById('wf-fullname');
                    if (nameInput && nameInput.offsetParent !== null) {
                        nameInput.focus({ preventScroll: true });
                    }
                }, 450);
            }
        });
    });

    // 3. Toggle custom Job Title field when "Khác" is chosen
    const jobSelect = document.getElementById('wf-job-title');
    const otherJobWrap = document.getElementById('wf-other-job-wrap');
    const otherJobInput = document.getElementById('wf-other-job-title');

    if (jobSelect && otherJobWrap && otherJobInput) {
        jobSelect.addEventListener('change', function () {
            if (this.value === 'Khác') {
                otherJobWrap.style.display = 'flex';
                otherJobInput.required = true;
            } else {
                otherJobWrap.style.display = 'none';
                otherJobInput.required = false;
                otherJobInput.value = '';
                otherJobInput.classList.remove('is-invalid');
                const errEl = document.getElementById('wf-other-job-err');
                if (errEl) errEl.classList.remove('visible');
            }
        });
    }

    // 4. Form Submission -> MYERP Automation API + Google Ads Conversion (SUBMIT FORM)
    const form = document.getElementById('workshop-reg-form');
    if (!form) return;

    const fullNameInput = document.getElementById('wf-fullname');
    const emailInput = document.getElementById('wf-email');
    const phoneInput = document.getElementById('wf-phone');
    const companyInput = document.getElementById('wf-company');
    const teamSizeSelect = document.getElementById('wf-team-size');
    const focusAreaSelect = document.getElementById('wf-focus-area');
    const noteInput = document.getElementById('wf-note');

    const alertBox = document.getElementById('wf-form-alert');
    const submitBtn = document.getElementById('wf-submit-btn');

    function setFieldError(inputEl, errId, show) {
        const errEl = document.getElementById(errId);
        if (inputEl) inputEl.classList.toggle('is-invalid', show);
        if (errEl) errEl.classList.toggle('visible', show);
    }

    function showFormAlert(msg) {
        if (!alertBox) return;
        alertBox.textContent = msg;
        alertBox.classList.toggle('visible', !!msg);
    }

    form.addEventListener('submit', async function (e) {
        e.preventDefault();
        showFormAlert('');

        const lastName = fullNameInput ? fullNameInput.value.trim() : '';
        const email = emailInput ? emailInput.value.trim() : '';
        const phoneNumber = phoneInput ? phoneInput.value.trim() : '';
        const jobVal = jobSelect ? jobSelect.value : '';
        const otherJobVal = otherJobInput ? otherJobInput.value.trim() : '';
        const company = companyInput ? companyInput.value.trim() : '';
        const teamSize = teamSizeSelect ? teamSizeSelect.value : '';
        const focusArea = focusAreaSelect ? focusAreaSelect.value : '';
        const note = noteInput ? noteInput.value.trim() : '';

        const emailValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        const phoneDigits = phoneNumber.replace(/\D/g, '');
        const phoneValid = phoneDigits.length >= 8 && phoneDigits.length <= 15;

        let isValid = true;
        if (!lastName) {
            setFieldError(fullNameInput, 'wf-fullname-err', true);
            isValid = false;
        } else {
            setFieldError(fullNameInput, 'wf-fullname-err', false);
        }

        if (!emailValid) {
            setFieldError(emailInput, 'wf-email-err', true);
            isValid = false;
        } else {
            setFieldError(emailInput, 'wf-email-err', false);
        }

        if (!phoneValid) {
            setFieldError(phoneInput, 'wf-phone-err', true);
            isValid = false;
        } else {
            setFieldError(phoneInput, 'wf-phone-err', false);
        }

        if (!jobVal) {
            setFieldError(jobSelect, 'wf-job-err', true);
            isValid = false;
        } else {
            setFieldError(jobSelect, 'wf-job-err', false);
        }

        if (jobVal === 'Khác' && !otherJobVal) {
            setFieldError(otherJobInput, 'wf-other-job-err', true);
            isValid = false;
        } else {
            setFieldError(otherJobInput, 'wf-other-job-err', false);
        }

        if (!isValid) return;

        const job_title = jobVal === 'Khác' ? otherJobVal : jobVal;
        const urlParams = new URLSearchParams(window.location.search);

        // MYERP MailFlow API Payload + extra fields captured automatically
        const payload = {
            form_id: "0f0b274fecb6279c11aff79ff787a139",
            email: email,
            lastName: lastName,
            phoneNumber: phoneNumber,
            job_title: job_title,
            fullName: lastName,
            company: company,
            team_size: teamSize,
            focus_area: focusArea,
            note: note,
            event_name: "Workshop: Workforce Optimisation in the Era of AI",
            event_date: "04/12/2026 15:00 - 17:00",
            event_venue: "Lumiere Byblos Villa - 6B Ngô Thời Nhiệm, Xuân Hòa, TP.HCM",
            language: isEnMode ? "en" : "vi",
            page_url: window.location.href,
            referrer: document.referrer || "",
            sid: urlParams.get("sid") || "",
            utm_source: urlParams.get("utm_source") || "",
            utm_medium: urlParams.get("utm_medium") || "",
            utm_campaign: urlParams.get("utm_campaign") || "",
            utm_content: urlParams.get("utm_content") || "",
            utm_term: urlParams.get("utm_term") || ""
        };

        const originalBtnHtml = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span>' + (isEnMode ? 'Submitting...' : 'Đang gửi đăng ký...') + '</span>';

        try {
            const response = await fetch("https://myerp.ideas.edu.vn/backend/automation/forms.php?route=submit", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(payload)
            });

            const rawText = await response.text();
            let result = null;
            try {
                result = JSON.parse(rawText);
            } catch (jsonErr) {
                const jsonMatch = rawText.match(/\{[\s\S]*?"success"\s*:\s*(true|false)[\s\S]*?\}/);
                if (jsonMatch) {
                    try {
                        result = JSON.parse(jsonMatch[0]);
                    } catch (e2) {}
                }
            }

            if (!result || result.success !== true) {
                const errMsg = (result && result.message)
                    ? result.message
                    : (isEnMode ? 'Submission failed. Please try again shortly.' : 'Có lỗi xảy ra khi gửi đăng ký. Vui lòng thử lại sau hoặc gọi hotline 028 2244 2244.');
                console.error("Lỗi từ server:", errMsg, response.status);
                showFormAlert(errMsg);
                return;
            }

            // Google Ads Conversion Event: SUBMIT FORM (AW-11205917800/mdXJCOTL-bccEOj4st8p)
            try {
                if (typeof gtag_report_conversion === 'function') {
                    gtag_report_conversion();
                } else if (typeof window.gtag === 'function') {
                    window.gtag('event', 'conversion', {
                        'send_to': 'AW-11205917800/mdXJCOTL-bccEOj4st8p',
                        'value': 1.0,
                        'currency': 'VND'
                    });
                }
                if (typeof window.fbq === 'function') {
                    window.fbq('track', 'Lead', {
                        content_name: 'Workshop: Workforce Optimisation in the Era of AI'
                    });
                }
            } catch (trackErr) {
                console.warn('Conversion tracking error:', trackErr);
            }

            // Show inline confirmation
            const formHeader = document.getElementById('wf-form-header');
            const successBox = document.getElementById('wf-form-success');
            const successMsg = document.getElementById('wf-success-msg');

            if (successMsg) {
                successMsg.innerHTML = isEnMode
                    ? 'Thank you <strong>' + escapeHtml(lastName) + '</strong>. Your seat request has been recorded. Our organizing team will send your confirmation ticket and survey link to <strong>' + escapeHtml(email) + '</strong> shortly.'
                    : 'Cảm ơn <strong>' + escapeHtml(lastName) + '</strong> đã đăng ký tham dự Workshop. Ban Tổ Chức sẽ gửi thư xác nhận vé mời và đường dẫn khảo sát ngắn qua email <strong>' + escapeHtml(email) + '</strong> và liên hệ hỗ trợ anh/chị trong thời gian sớm nhất.';
            }

            if (formHeader) formHeader.style.display = 'none';
            form.style.display = 'none';
            if (successBox) {
                successBox.classList.add('visible');
                successBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        } catch (err) {
            console.error("Lỗi kết nối API:", err);
            showFormAlert(isEnMode
                ? 'Network connection error. Please check your connection and try again.'
                : 'Lỗi kết nối máy chủ. Vui lòng kiểm tra đường truyền hoặc gọi hotline 028 2244 2244.');
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnHtml;
        }
    });

    function escapeHtml(str) {
        return String(str).replace(/[&<>"']/g, function (m) {
            return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[m];
        });
    }
});
</script>

<?php get_footer(); ?>
