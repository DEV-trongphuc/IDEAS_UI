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
    : 'Workshop: Workforce Optimisation in the Era of AI | IDEAS × AIDC × Epitome Global';

$seo_desc = $is_en
    ? 'Executive roundtable (15:00 – 17:00, Dec 04, 2026 in HCMC, limited to 30 leaders). Assess workforce AI readiness and turn skills data into an actionable roadmap with IDEAS, AIDC & Epitome Global.'
    : 'Workshop chuyên sâu giới hạn 30 lãnh đạo, HRD & L&D (15h00 – 17h00 | Thứ Sáu 04/12/2026 tại TP.HCM). Đánh giá năng lực đội ngũ và xây dựng lộ trình chuyển đổi nhân sự AI cùng IDEAS × AIDC × Epitome Global.';

if (function_exists('add_filter')) {
    add_filter('wpseo_title', function () use ($seo_title) { return $seo_title; });
    add_filter('wpseo_metadesc', function () use ($seo_desc) { return $seo_desc; });
    add_filter('wpseo_opengraph_image', function () use ($og_thumb_url) { return $og_thumb_url; });
    add_filter('rank_math/frontend/title', function () use ($seo_title) { return $seo_title; });
    add_filter('rank_math/frontend/description', function () use ($seo_desc) { return $seo_desc; });
    add_filter('rank_math/opengraph/facebook/image', function () use ($og_thumb_url) { return $og_thumb_url; });
    add_filter('rank_math/opengraph/twitter/image', function () use ($og_thumb_url) { return $og_thumb_url; });
}

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
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
    <link rel="canonical" href="<?php echo esc_url($page_canonical_url); ?>" />

    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo esc_url($page_canonical_url); ?>" />
    <meta property="og:site_name" content="Viện IDEAS" />
    <meta property="og:locale" content="<?php echo $is_en ? 'en_US' : 'vi_VN'; ?>" />
    <meta property="og:title" content="<?php echo esc_attr($seo_title); ?>" />
    <meta property="og:description" content="<?php echo esc_attr($seo_desc); ?>" />
    <meta property="og:image" content="<?php echo esc_url($og_thumb_url); ?>" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo esc_attr($seo_title); ?>" />
    <meta name="twitter:description" content="<?php echo esc_attr($seo_desc); ?>" />
    <meta name="twitter:image" content="<?php echo esc_url($og_thumb_url); ?>" />

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

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BusinessEvent",
      "name": "Workshop: Workforce Optimisation in the Era of AI",
      "description": <?php echo json_encode($seo_desc, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>,
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
        { "@type": "Organization", "name": "Viện IDEAS", "url": "https://ideas.edu.vn" },
        { "@type": "Organization", "name": "AIDC" },
        { "@type": "Organization", "name": "Epitome Global" }
      ],
      "performer": [
        { "@type": "Person", "name": "Kevin Chan", "jobTitle": "CEO, Epitome Global" },
        { "@type": "Person", "name": "Connor Clark Lindh", "jobTitle": "Product and Solutions Lead, Epitome Global" }
      ],
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "VND",
        "url": "<?php echo esc_url($page_canonical_url); ?>"
      }
    }
    </script>

    <style>
        /* Clean editorial layout scoped to .wf-page */
        html, body {
            overflow-x: clip !important;
            scroll-behavior: smooth;
        }

        .wf-page {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: #334155;
            background-color: #ffffff;
            line-height: 1.6;
        }

        .wf-page *, .wf-page *::before, .wf-page *::after {
            box-sizing: border-box;
        }

        .wf-page h1, .wf-page h2, .wf-page h3 {
            color: #0f172a;
            letter-spacing: -0.02em;
            -webkit-hyphens: manual;
            hyphens: manual;
        }

        .wf-wrap {
            max-width: 1160px;
            margin: 0 auto;
            padding: 0 24px;
            width: 100%;
        }

        /* ── 1. Hero + Form ─────────────────────────────────────────── */
        .wf-hero {
            position: relative;
            padding: 104px 0 60px;
            background:
                radial-gradient(circle at 82% 22%, rgba(171, 14, 0, 0.09) 0%, transparent 46%),
                radial-gradient(circle at 10% 18%, rgba(15, 23, 42, 0.04) 0%, transparent 42%),
                linear-gradient(180deg, #fafafa 0%, #ffffff 100%);
            border-bottom: 1px solid #f1f5f9;
            overflow: hidden;
        }

        .wf-hero-dots {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(15, 23, 42, 0.09) 1px, transparent 1px);
            background-size: 24px 24px;
            mask-image: radial-gradient(ellipse 85% 80% at 50% 45%, #000 30%, transparent 82%);
            -webkit-mask-image: radial-gradient(ellipse 85% 80% at 50% 45%, #000 30%, transparent 82%);
            pointer-events: none;
        }

        .wf-hero-rings {
            position: absolute;
            top: -70px;
            right: -60px;
            width: 560px;
            height: 560px;
            opacity: 0.09;
            pointer-events: none;
        }

        .wf-hero-grid {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: 1.08fr 0.92fr;
            gap: 48px;
            align-items: center;
        }

        .wf-logos {
            display: inline-flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 22px;
        }

        .wf-logos img {
            display: block;
            object-fit: contain;
        }

        .wf-logo-ideas { height: 28px; width: auto; }
        .wf-logo-aidc { height: 20px; width: auto; }
        .wf-logo-epitome { height: 28px; width: auto; }

        .wf-logo-sep {
            width: 1px;
            height: 20px;
            background: #cbd5e1;
        }

        .wf-kicker {
            font-size: 0.85rem;
            font-weight: 700;
            color: #ab0e00;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin: 0 0 10px;
        }

        .wf-page .wf-hero h1 {
            display: inline-block;
            font-size: clamp(1.95rem, 3.1vw, 2.55rem);
            font-weight: 800;
            line-height: 1.18;
            margin: 0 0 14px;
            background: linear-gradient(110deg, #0f172a 0%, #881337 48%, #dc2626 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            color: #0f172a;
        }

        .wf-hero-lead {
            font-size: 1.02rem;
            color: #475569;
            margin: 0 0 22px;
            max-width: 540px;
        }

        .wf-meta-list {
            border-top: 1px solid #e2e8f0;
            padding-top: 20px;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px 24px;
        }

        .wf-meta-item {
            font-size: 0.92rem;
            color: #1e293b;
        }

        .wf-meta-item small {
            display: block;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #64748b;
            margin-bottom: 2px;
        }

        .wf-meta-item strong {
            font-weight: 700;
            color: #0f172a;
        }

        /* Registration Card */
        .wf-form-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 16px 40px rgba(15, 23, 42, 0.07);
        }

        .wf-form-head {
            margin-bottom: 18px;
        }

        .wf-form-head h2 {
            font-size: 1.35rem;
            font-weight: 800;
            margin: 0 0 4px;
        }

        .wf-form-head p {
            margin: 0;
            font-size: 0.88rem;
            color: #64748b;
        }

        .wf-form {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .wf-row-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .wf-field {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .wf-field label {
            font-size: 0.8rem;
            font-weight: 700;
            color: #334155;
        }

        .wf-field label span {
            color: #ab0e00;
        }

        .wf-field input,
        .wf-field select {
            width: 100%;
            height: 42px;
            padding: 0 12px;
            font-family: inherit;
            font-size: 0.92rem;
            color: #0f172a;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.15s ease, background-color 0.15s ease;
        }

        .wf-field input:focus,
        .wf-field select:focus {
            background: #ffffff;
            border-color: #475569;
        }

        .wf-field input.is-invalid,
        .wf-field select.is-invalid {
            border-color: #dc2626;
            background: #fff5f5;
        }

        .wf-err {
            display: none;
            font-size: 0.75rem;
            font-weight: 600;
            color: #dc2626;
        }

        .wf-err.visible {
            display: block;
        }

        .wf-btn-submit {
            width: 100%;
            height: 46px;
            margin-top: 4px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #b91c1c 0%, #8b0a00 100%);
            color: #ffffff;
            font-family: inherit;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 10px 24px rgba(171, 14, 0, 0.22);
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .wf-btn-submit:hover:not(:disabled) {
            transform: translateY(-1px);
            box-shadow: 0 14px 28px rgba(171, 14, 0, 0.28);
        }

        .wf-btn-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .wf-form-note {
            margin: 4px 0 0;
            font-size: 0.76rem;
            color: #64748b;
            text-align: center;
        }

        .wf-alert {
            display: none;
            padding: 10px 12px;
            border-radius: 8px;
            background: #fef2f2;
            border: 1px solid #fca5a5;
            color: #991b1b;
            font-size: 0.84rem;
            font-weight: 600;
        }

        .wf-alert.visible {
            display: block;
        }

        .wf-success {
            display: none;
            text-align: center;
            padding: 12px 4px;
        }

        .wf-success.visible {
            display: block;
        }

        .wf-success h3 {
            font-size: 1.28rem;
            font-weight: 800;
            margin: 0 0 8px;
            color: #15803d;
        }

        .wf-success p {
            font-size: 0.92rem;
            color: #334155;
            margin: 0 0 16px;
        }

        .wf-ticket-meta {
            text-align: left;
            padding: 12px 14px;
            border-radius: 10px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            font-size: 0.85rem;
            margin-bottom: 14px;
        }

        .wf-cal-link {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 8px;
            background: #0f172a;
            color: #ffffff !important;
            text-decoration: none;
            font-size: 0.86rem;
            font-weight: 700;
        }

        /* ── 2. Shared Section Styling ──────────────────────────────── */
        .wf-band {
            padding: 64px 0;
        }

        .wf-band-alt {
            background: radial-gradient(circle at 15% 20%, rgba(171, 14, 0, 0.03) 0%, transparent 45%), #f8fafc;
            border-top: 1px solid #f1f5f9;
            border-bottom: 1px solid #f1f5f9;
        }

        .wf-h2 {
            font-size: clamp(1.45rem, 2.5vw, 1.9rem);
            font-weight: 800;
            margin: 0 0 10px;
        }

        .wf-h2::before {
            content: '';
            display: block;
            width: 28px;
            height: 3px;
            border-radius: 2px;
            background: linear-gradient(90deg, #ab0e00 0%, #ef4444 100%);
            margin-bottom: 12px;
        }

        .wf-sub {
            margin: 0;
            font-size: 0.98rem;
            color: #64748b;
        }

        /* ── 3. Value Split (Why Attend) ────────────────────────────── */
        .wf-split {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 44px;
            align-items: start;
        }

        .wf-check-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .wf-check-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 0.96rem;
            color: #1e293b;
        }

        .wf-check-mark {
            color: #ab0e00;
            font-weight: 800;
            flex-shrink: 0;
            margin-top: 1px;
        }

        /* ── 4. Speakers & Audience ─────────────────────────────────── */
        .wf-speakers-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
            margin-top: 28px;
        }

        .wf-speaker {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 22px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            box-shadow: 0 6px 20px rgba(15, 23, 42, 0.04);
        }

        .wf-speaker img {
            width: 88px;
            height: 88px;
            border-radius: 50%;
            object-fit: cover;
            object-position: center top;
            flex-shrink: 0;
        }

        .wf-speaker h3 {
            margin: 0 0 2px;
            font-size: 1.12rem;
            font-weight: 800;
        }

        .wf-speaker-role {
            font-size: 0.86rem;
            font-weight: 700;
            color: #ab0e00;
            margin: 0 0 6px;
        }

        .wf-speaker-bio {
            margin: 0;
            font-size: 0.88rem;
            color: #475569;
            line-height: 1.5;
        }

        .wf-audience-bar {
            margin-top: 20px;
            padding: 16px 20px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            font-size: 0.9rem;
            color: #334155;
        }

        /* ── 5. Timeline Agenda ─────────────────────────────────────── */
        .wf-timeline {
            position: relative;
            margin-top: 36px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .wf-timeline::before {
            content: '';
            position: absolute;
            top: 18px;
            bottom: 18px;
            left: 50%;
            width: 2px;
            transform: translateX(-50%);
            background: linear-gradient(180deg, rgba(171, 14, 0, 0.45) 0%, #cbd5e1 100%);
        }

        .wf-tl-item {
            position: relative;
            display: grid;
            grid-template-columns: 1fr 48px 1fr;
            align-items: center;
        }

        .wf-tl-axis {
            grid-column: 2;
            grid-row: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .wf-tl-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #ab0e00;
            border: 3px solid #ffffff;
            box-shadow: 0 0 0 4px rgba(171, 14, 0, 0.12);
        }

        .wf-tl-time-side {
            grid-row: 1;
            font-size: 0.92rem;
            font-weight: 800;
            color: #ab0e00;
            font-variant-numeric: tabular-nums;
            padding: 0 18px;
        }

        .wf-tl-card {
            grid-row: 1;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 18px 22px;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.04);
            transition: transform 0.18s ease, box-shadow 0.18s ease;
        }

        .wf-tl-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.07);
        }

        .wf-tl-item:nth-child(odd) .wf-tl-card {
            grid-column: 1;
        }

        .wf-tl-item:nth-child(odd) .wf-tl-time-side {
            grid-column: 3;
            text-align: left;
        }

        .wf-tl-item:nth-child(even) .wf-tl-card {
            grid-column: 3;
        }

        .wf-tl-item:nth-child(even) .wf-tl-time-side {
            grid-column: 1;
            text-align: right;
        }

        .wf-tl-mobile-time {
            display: none;
            font-size: 0.8rem;
            font-weight: 800;
            color: #ab0e00;
            font-variant-numeric: tabular-nums;
            margin-bottom: 4px;
        }

        .wf-tl-card h3 {
            margin: 0 0 4px;
            font-size: 1rem;
            font-weight: 800;
            color: #0f172a;
        }

        .wf-tl-card p {
            margin: 0;
            font-size: 0.9rem;
            color: #64748b;
            line-height: 1.5;
        }

        /* ── 6. Venue & Bottom CTA ──────────────────────────────────── */
        .wf-footer-cta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 24px;
            padding: 32px;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            background: #ffffff;
        }

        .wf-footer-cta-info h2 {
            font-size: 1.35rem;
            font-weight: 800;
            margin: 0 0 6px;
        }

        .wf-footer-cta-info p {
            margin: 0;
            font-size: 0.93rem;
            color: #475569;
        }

        .wf-footer-cta-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .wf-btn-cta {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 44px;
            padding: 0 22px;
            border-radius: 10px;
            background: linear-gradient(135deg, #b91c1c 0%, #8b0a00 100%);
            box-shadow: 0 8px 20px rgba(171, 14, 0, 0.2);
            color: #ffffff !important;
            text-decoration: none;
            font-size: 0.92rem;
            font-weight: 700;
        }

        .wf-btn-map {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 44px;
            padding: 0 18px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            color: #0f172a !important;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            background: #ffffff;
        }

        /* ── Responsive ─────────────────────────────────────────────── */
        @media (max-width: 960px) {
            .wf-hero-grid,
            .wf-split,
            .wf-speakers-row {
                grid-template-columns: 1fr;
                gap: 28px;
            }
        }

        @media (max-width: 768px) {
            .wf-timeline::before {
                left: 13px;
                transform: none;
            }
            .wf-tl-item {
                grid-template-columns: 28px 1fr;
                gap: 12px;
                align-items: start;
            }
            .wf-tl-axis {
                grid-column: 1;
                padding-top: 20px;
            }
            .wf-tl-time-side {
                display: none;
            }
            .wf-tl-item:nth-child(odd) .wf-tl-card,
            .wf-tl-item:nth-child(even) .wf-tl-card {
                grid-column: 2;
            }
            .wf-tl-mobile-time {
                display: block;
            }
        }

        @media (max-width: 640px) {
            .wf-hero { padding: 92px 0 44px; }
            .wf-band { padding: 48px 0; }
            .wf-meta-list,
            .wf-row-2 {
                grid-template-columns: 1fr;
                gap: 10px;
            }
            .wf-speaker {
                flex-direction: column;
                align-items: flex-start;
            }
            .wf-form-card,
            .wf-footer-cta {
                padding: 20px;
            }
        }
    </style>
</head>

<body <?php if (function_exists('body_class')) { body_class('wf-body'); } else { echo 'class="wf-body"'; } ?>>

<?php get_template_part('shared-header'); ?>

<div class="mobile-overlay" id="mobile-overlay"></div>

<main id="content" class="wf-page">

    <!-- 1. HERO + REGISTRATION FORM -->
    <section class="wf-hero" id="workshop-hero">
        <div class="wf-hero-dots" aria-hidden="true"></div>
        <svg class="wf-hero-rings" viewBox="0 0 500 500" fill="none" aria-hidden="true">
            <circle cx="250" cy="250" r="220" stroke="#ab0e00" stroke-width="1" stroke-dasharray="6 6"/>
            <circle cx="250" cy="250" r="165" stroke="#0f172a" stroke-width="1"/>
            <circle cx="250" cy="250" r="110" stroke="#ab0e00" stroke-width="1" stroke-dasharray="3 5"/>
        </svg>
        <div class="wf-wrap">
            <div class="wf-hero-grid">
                <div>
                    <div class="wf-logos" aria-label="IDEAS × AIDC × Epitome Global">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg-optimized.webp"
                             alt="IDEAS" class="wf-logo-ideas" width="84" height="47" decoding="async" />
                        <span class="wf-logo-sep" aria-hidden="true"></span>
                        <img src="<?php echo esc_url($asset_base . '/logo-aidc.png'); ?>"
                             alt="AIDC" class="wf-logo-aidc" width="90" height="28" decoding="async" />
                        <span class="wf-logo-sep" aria-hidden="true"></span>
                        <img src="<?php echo esc_url($asset_base . '/logo-epitome.png'); ?>"
                             alt="Epitome Global" class="wf-logo-epitome" width="32" height="33" decoding="async" />
                    </div>

                    <p class="wf-kicker"><?php echo $is_en ? 'Offline Executive Workshop' : 'Workshop Offline'; ?></p>

                    <h1>Workforce Optimisation<br>in the Era of AI</h1>

                    <p class="wf-hero-lead">
                        <?php echo $is_en
                            ? 'Understand workforce capability before deploying AI. Turn skills data into an actionable enterprise roadmap.'
                            : 'Thấu hiểu năng lực đội ngũ trước khi triển khai AI. Chuyển hóa dữ liệu kỹ năng thành lộ trình hành động cụ thể.'; ?>
                    </p>

                    <div class="wf-meta-list">
                        <div class="wf-meta-item">
                            <small><?php echo $is_en ? 'Time' : 'Thời gian'; ?></small>
                            <strong><?php echo $is_en ? '15:00 – 17:00 | Fri, Dec 04, 2026' : '15h00 – 17h00 · Thứ 6, 04/12/2026'; ?></strong>
                        </div>
                        <div class="wf-meta-item">
                            <small><?php echo $is_en ? 'Location' : 'Địa điểm'; ?></small>
                            <strong>Lumiere Byblos Villa · 6B Ngô Thời Nhiệm, TP.HCM</strong>
                        </div>
                        <div class="wf-meta-item">
                            <small><?php echo $is_en ? 'Audience' : 'Đối tượng'; ?></small>
                            <strong><?php echo $is_en ? 'CEO, HR Director / CHRO, L&D Director' : 'Lãnh đạo DN, HRD / CHRO, L&D Director'; ?></strong>
                        </div>
                        <div class="wf-meta-item">
                            <small><?php echo $is_en ? 'Format' : 'Hình thức'; ?></small>
                            <strong><?php echo $is_en ? '30 seats · Free · Chatham House Rule' : '30 suất miễn phí · Thảo luận kín Chatham House'; ?></strong>
                        </div>
                    </div>
                </div>

                <!-- Registration Form -->
                <div class="wf-form-card" id="workshop-register">
                    <div class="wf-form-head" id="wf-form-header">
                        <h2><?php echo $is_en ? 'Reserve Your Seat' : 'Đăng ký tham dự'; ?></h2>
                        <p><?php echo $is_en ? 'Limited to 30 executives & HR/L&D leaders.' : 'Giới hạn 30 suất dành cho Lãnh đạo & Quản lý nhân sự.'; ?></p>
                    </div>

                    <form class="wf-form" id="workshop-reg-form" novalidate aria-label="Form đăng ký Workshop">
                        <div class="wf-field">
                            <label for="wf-fullname"><?php echo $is_en ? 'Full Name' : 'Họ và tên'; ?> <span>*</span></label>
                            <input type="text" id="wf-fullname" name="lastName" required
                                   placeholder="<?php echo $is_en ? 'Your full name' : 'Nguyễn Văn A'; ?>" />
                            <span class="wf-err" id="wf-fullname-err"><?php echo $is_en ? 'Please enter your name.' : 'Vui lòng nhập họ tên.'; ?></span>
                        </div>

                        <div class="wf-row-2">
                            <div class="wf-field">
                                <label for="wf-email">Email <span>*</span></label>
                                <input type="email" id="wf-email" name="email" required placeholder="name@company.com" />
                                <span class="wf-err" id="wf-email-err"><?php echo $is_en ? 'Valid email required.' : 'Vui lòng nhập email hợp lệ.'; ?></span>
                            </div>

                            <div class="wf-field">
                                <label for="wf-phone"><?php echo $is_en ? 'Phone Number' : 'Số điện thoại'; ?> <span>*</span></label>
                                <input type="tel" id="wf-phone" name="phoneNumber" required placeholder="09xx xxx xxx" />
                                <span class="wf-err" id="wf-phone-err"><?php echo $is_en ? 'Valid phone required.' : 'Vui lòng nhập SĐT hợp lệ.'; ?></span>
                            </div>
                        </div>

                        <div class="wf-row-2">
                            <div class="wf-field">
                                <label for="wf-job-title"><?php echo $is_en ? 'Job Title' : 'Chức danh'; ?> <span>*</span></label>
                                <select id="wf-job-title" name="job_title" required>
                                    <option value=""><?php echo $is_en ? 'Select role' : 'Chọn chức danh'; ?></option>
                                    <option value="CEO / Founder / Chủ doanh nghiệp">CEO / Founder</option>
                                    <option value="HR Director / CHRO"><?php echo $is_en ? 'HR Director / CHRO' : 'Giám đốc Nhân sự (HRD)'; ?></option>
                                    <option value="L&D Director / Trưởng phòng Đào tạo"><?php echo $is_en ? 'L&D Director' : 'Giám đốc Đào tạo (L&D)'; ?></option>
                                    <option value="C-Level / Giám đốc chức năng">C-Level / Giám đốc</option>
                                    <option value="Senior Manager / Trưởng phòng"><?php echo $is_en ? 'Manager / Dept Head' : 'Trưởng phòng / Quản lý'; ?></option>
                                    <option value="Khác"><?php echo $is_en ? 'Other' : 'Khác'; ?></option>
                                </select>
                                <span class="wf-err" id="wf-job-err"><?php echo $is_en ? 'Please select your title.' : 'Vui lòng chọn chức danh.'; ?></span>
                            </div>

                            <div class="wf-field">
                                <label for="wf-company"><?php echo $is_en ? 'Company' : 'Doanh nghiệp'; ?></label>
                                <input type="text" id="wf-company" name="company"
                                       placeholder="<?php echo $is_en ? 'Company name' : 'Tên công ty'; ?>" />
                            </div>
                        </div>

                        <div class="wf-field" id="wf-other-job-wrap" style="display: none;">
                            <label for="wf-other-job-title"><?php echo $is_en ? 'Specify Job Title' : 'Chức danh cụ thể'; ?> <span>*</span></label>
                            <input type="text" id="wf-other-job-title" name="other_job_title"
                                   placeholder="<?php echo $is_en ? 'Enter your role' : 'Nhập chức danh'; ?>" />
                            <span class="wf-err" id="wf-other-job-err"><?php echo $is_en ? 'Please enter your job title.' : 'Vui lòng nhập chức danh.'; ?></span>
                        </div>

                        <div class="wf-alert" id="wf-form-alert" role="alert"></div>

                        <button type="submit" class="wf-btn-submit" id="wf-submit-btn">
                            <?php echo $is_en ? 'Confirm Registration' : 'Đăng ký giữ suất'; ?>
                        </button>

                        <p class="wf-form-note">
                            <?php echo $is_en
                                ? 'Chatham House Rule · No spam, strict confidentiality.'
                                : 'Thông tin được bảo mật · Ban Tổ Chức xác nhận qua Email/SĐT.'; ?>
                        </p>
                    </form>

                    <div class="wf-success" id="wf-form-success" aria-live="polite">
                        <h3><?php echo $is_en ? 'Registration Confirmed' : 'Đăng ký thành công'; ?></h3>
                        <p id="wf-success-msg"></p>
                        <div class="wf-ticket-meta">
                            <div><strong><?php echo $is_en ? 'Time:' : 'Thời gian:'; ?></strong> 15h00 – 17h00 | Thứ 6, 04/12/2026</div>
                            <div><strong><?php echo $is_en ? 'Venue:' : 'Địa điểm:'; ?></strong> Lumiere Byblos Villa · 6B Ngô Thời Nhiệm, TP.HCM</div>
                        </div>
                        <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&text=Workshop%3A+Workforce+Optimisation+in+the+Era+of+AI&dates=20261204T080000Z/20261204T100000Z&location=Lumiere+Byblos+Villa+-+6B+Ng%C3%B4+Th%E1%BB%9Di+Nhi%E1%BB%87m%2C+Xu%C3%A2n+H%C3%B2a%2C+TP.HCM"
                           target="_blank" rel="noopener noreferrer" class="wf-cal-link">
                            <?php echo $is_en ? 'Add to Google Calendar' : 'Lưu vào Google Calendar'; ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. WHY ATTEND (CORE PROBLEM & TAKEAWAYS) -->
    <section class="wf-band">
        <div class="wf-wrap">
            <div class="wf-split">
                <div>
                    <h2 class="wf-h2">
                        <?php echo $is_en
                            ? 'From AI strategy<br>to workforce execution'
                            : 'Không chỉ ở công nghệ AI,<br>mà ở năng lực con người'; ?>
                    </h2>
                    <p class="wf-sub">
                        <?php echo $is_en
                            ? '120 minutes working on sample skills data across 4 priorities:'
                            : 'Workshop tập trung thực hành dữ liệu mẫu, giải quyết 4 bài toán cốt lõi:'; ?>
                    </p>
                </div>

                <ul class="wf-check-list">
                    <li>
                        <span class="wf-check-mark">✓</span>
                        <span><strong><?php echo $is_en ? 'Assess AI readiness:' : 'Nhìn rõ năng lực đội ngũ:'; ?></strong> <?php echo $is_en ? 'Locate skill gaps affecting AI execution.' : 'Xác định khoảng trống kỹ năng đang cản trở triển khai AI.'; ?></span>
                    </li>
                    <li>
                        <span class="wf-check-mark">✓</span>
                        <span><strong><?php echo $is_en ? 'Reduce key-person risk:' : 'Giảm rủi ro kế thừa:'; ?></strong> <?php echo $is_en ? 'Spot internal talent before costly hiring.' : 'Phát triển nhân sự hiện có trước khi tuyển mới tốn kém.'; ?></span>
                    </li>
                    <li>
                        <span class="wf-check-mark">✓</span>
                        <span><strong><?php echo $is_en ? 'Prioritize L&D:' : 'Định hướng đào tạo sát KPI:'; ?></strong> <?php echo $is_en ? 'Align AI skills directly with business goals.' : 'Chọn đúng năng lực AI cần nâng cấp cho từng vị trí.'; ?></span>
                    </li>
                    <li>
                        <span class="wf-check-mark">✓</span>
                        <span><strong><?php echo $is_en ? 'Chatham House roundtable:' : 'Thảo luận kín Chatham House:'; ?></strong> <?php echo $is_en ? 'Share real cases openly among 30 leaders.' : 'Chia sẻ bài toán thực tế cùng 30 lãnh đạo, không trích dẫn ra ngoài.'; ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- 3. SPEAKERS -->
    <section class="wf-band wf-band-alt">
        <div class="wf-wrap">
            <h2 class="wf-h2"><?php echo $is_en ? 'Workshop Facilitators' : 'Diễn giả từ Epitome Global'; ?></h2>
            <p class="wf-sub"><?php echo $is_en ? 'International experts in workforce intelligence and enterprise transformation.' : 'Chuyên gia quốc tế trực tiếp điều phối phần thực hành dữ liệu và thảo luận chiến lược.'; ?></p>

            <div class="wf-speakers-row">
                <article class="wf-speaker">
                    <img src="<?php echo esc_url($asset_base . '/kevin-chan.jpg'); ?>"
                         alt="Mr. Kevin Chan" width="88" height="88" loading="lazy" decoding="async" />
                    <div>
                        <h3>Mr. Kevin Chan</h3>
                        <p class="wf-speaker-role">CEO, Epitome Global</p>
                        <p class="wf-speaker-bio">
                            <?php echo $is_en
                                ? '20 years in Asian talent & enterprise transformation.'
                                : '20 năm kinh nghiệm nhân tài và chuyển đổi doanh nghiệp tại châu Á.'; ?>
                        </p>
                    </div>
                </article>

                <article class="wf-speaker">
                    <img src="<?php echo esc_url($asset_base . '/connor-clark-lindh.jpg'); ?>"
                         alt="Mr. Connor Clark Lindh" width="88" height="88" loading="lazy" decoding="async" />
                    <div>
                        <h3>Mr. Connor Clark Lindh</h3>
                        <p class="wf-speaker-role">Product &amp; Solutions Lead, Epitome Global</p>
                        <p class="wf-speaker-bio">
                            <?php echo $is_en
                                ? '7 years as VP Hub Operations at Yara Digital Farming.'
                                : '7 năm giữ vị trí VP Hub Operations tại Yara Digital Farming.'; ?>
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- 4. AGENDA TIMELINE -->
    <section class="wf-band">
        <div class="wf-wrap">
            <h2 class="wf-h2"><?php echo $is_en ? 'Timeline (15:00 – 17:00)' : 'Timeline chương trình (15h00 – 17h00 · 04/12/2026)'; ?></h2>
            <p class="wf-sub"><?php echo $is_en ? 'From business challenge and live demo to your workforce roadmap.' : '120 phút từ bài toán kinh doanh, thực hành dữ liệu mẫu đến lộ trình hành động.'; ?></p>

            <div class="wf-timeline">
                <div class="wf-tl-item">
                    <div class="wf-tl-card">
                        <div class="wf-tl-mobile-time">15h00 – 15h10</div>
                        <h3><?php echo $is_en ? 'Frame the business challenge' : 'Xác định thách thức kinh doanh'; ?></h3>
                        <p><?php echo $is_en ? 'Link transformation priorities and skills needs to business goals.' : 'Nhận diện ưu tiên chuyển đổi và yêu cầu năng lực nhân sự gắn với mục tiêu doanh nghiệp.'; ?></p>
                    </div>
                    <div class="wf-tl-axis"><span class="wf-tl-dot"></span></div>
                    <div class="wf-tl-time-side">15h00 – 15h10</div>
                </div>

                <div class="wf-tl-item">
                    <div class="wf-tl-time-side">15h10 – 15h25</div>
                    <div class="wf-tl-axis"><span class="wf-tl-dot"></span></div>
                    <div class="wf-tl-card">
                        <div class="wf-tl-mobile-time">15h10 – 15h25</div>
                        <h3><?php echo $is_en ? 'AIDC × Epitome platform demo' : 'Giới thiệu Epitome & Demo AIDC × Epitome'; ?></h3>
                        <p><?php echo $is_en ? 'Live platform showcase with sample skills and talent datasets.' : 'Trình diễn nền tảng cùng dữ liệu kỹ năng và nhân tài mẫu.'; ?></p>
                    </div>
                </div>

                <div class="wf-tl-item">
                    <div class="wf-tl-card">
                        <div class="wf-tl-mobile-time">15h25 – 15h50</div>
                        <h3><?php echo $is_en ? 'Hands-on workforce assessment' : 'Thực hành đánh giá lực lượng lao động'; ?></h3>
                        <p><?php echo $is_en ? 'Work with sample role profiles to decide what to assess and interpret.' : 'Dùng hồ sơ vai trò và nhân viên mẫu để xác định cần đánh giá gì và diễn giải kết quả.'; ?></p>
                    </div>
                    <div class="wf-tl-axis"><span class="wf-tl-dot"></span></div>
                    <div class="wf-tl-time-side">15h25 – 15h50</div>
                </div>

                <div class="wf-tl-item">
                    <div class="wf-tl-time-side">15h50 – 16h10</div>
                    <div class="wf-tl-axis"><span class="wf-tl-dot"></span></div>
                    <div class="wf-tl-card">
                        <div class="wf-tl-mobile-time">15h50 – 16h10</div>
                        <h3><?php echo $is_en ? 'Turn data into insight' : 'Biến dữ liệu thành Insight'; ?></h3>
                        <p><?php echo $is_en ? 'Identify capability strengths, gaps, and business implications.' : 'Nhận diện điểm mạnh, khoảng trống và ý nghĩa với bài toán kinh doanh.'; ?></p>
                    </div>
                </div>

                <div class="wf-tl-item">
                    <div class="wf-tl-card">
                        <div class="wf-tl-mobile-time">16h10 – 16h35</div>
                        <h3><?php echo $is_en ? 'Workforce transformation strategy' : 'Xây dựng chiến lược chuyển đổi nhân sự'; ?></h3>
                        <p><?php echo $is_en ? 'Plan upskilling, internal mobility, or hiring paths with clear metrics.' : 'Xác định phương án phát triển nội bộ, điều chuyển hoặc tuyển mới và tiêu chí đo lường.'; ?></p>
                    </div>
                    <div class="wf-tl-axis"><span class="wf-tl-dot"></span></div>
                    <div class="wf-tl-time-side">16h10 – 16h35</div>
                </div>

                <div class="wf-tl-item">
                    <div class="wf-tl-time-side">16h35 – 16h50</div>
                    <div class="wf-tl-axis"><span class="wf-tl-dot"></span></div>
                    <div class="wf-tl-card">
                        <div class="wf-tl-mobile-time">16h35 – 16h50</div>
                        <h3><?php echo $is_en ? 'Capability roadmap with AIDC' : 'Thiết kế lộ trình năng lực cùng AIDC'; ?></h3>
                        <p><?php echo $is_en ? 'Translate priorities into targeted training objectives and learning plans.' : 'Chuyển hóa ưu tiên thành mục tiêu đào tạo và lộ trình phát triển phù hợp doanh nghiệp.'; ?></p>
                    </div>
                </div>

                <div class="wf-tl-item">
                    <div class="wf-tl-card">
                        <div class="wf-tl-mobile-time">16h50 – 17h00</div>
                        <h3><?php echo $is_en ? 'Open sharing, Q&A & Next Steps' : 'Chia sẻ, Q&A & Bước tiếp theo'; ?></h3>
                        <p><?php echo $is_en ? 'Discuss well-scoped enterprise diagnostics or pilot options.' : 'Thảo luận hình thức đánh giá hoặc triển khai thí điểm có phạm vi rõ ràng.'; ?></p>
                    </div>
                    <div class="wf-tl-axis"><span class="wf-tl-dot"></span></div>
                    <div class="wf-tl-time-side">16h50 – 17h00</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. VENUE & BOTTOM CTA -->
    <section class="wf-band wf-band-alt">
        <div class="wf-wrap">
            <div class="wf-footer-cta">
                <div class="wf-footer-cta-info">
                    <h2>Lumiere Byblos Villa – 6B Ngô Thời Nhiệm, Xuân Hòa, TP.HCM</h2>
                    <p>
                        <?php echo $is_en
                            ? '15:00 – 17:00 | Fri, Dec 04, 2026 · Hotline: 028 2244 2244 · IDEAS Office: B82 Bach Dang, HCMC'
                            : '15h00 – 17h00 | Thứ Sáu 04/12/2026 · Hotline: 028 2244 2244 · Văn phòng IDEAS: B82 Bạch Đằng, P. Tân Sơn Hòa, TP.HCM'; ?>
                    </p>
                </div>
                <div class="wf-footer-cta-actions">
                    <a href="https://www.google.com/maps/search/?api=1&query=6B+Ng%C3%B4+Th%E1%BB%9Di+Nhi%E1%BB%87m%2C+TP+H%E1%BB%93+Ch%C3%AD+Minh"
                       target="_blank" rel="noopener noreferrer" class="wf-btn-map">
                        Google Maps ↗
                    </a>
                    <a href="#workshop-register" class="wf-btn-cta js-scroll-register">
                        <?php echo $is_en ? 'Register Now' : 'Đăng ký giữ suất'; ?>
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

    document.querySelectorAll('.js-scroll-register, a[href="#workshop-register"]').forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.getElementById('workshop-register');
            if (target) {
                const y = target.getBoundingClientRect().top + window.pageYOffset - 92;
                window.scrollTo({ top: y, behavior: 'smooth' });
                setTimeout(function () {
                    const nameInput = document.getElementById('wf-fullname');
                    if (nameInput && nameInput.offsetParent !== null) {
                        nameInput.focus({ preventScroll: true });
                    }
                }, 400);
            }
        });
    });

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

    const form = document.getElementById('workshop-reg-form');
    if (!form) return;

    const fullNameInput = document.getElementById('wf-fullname');
    const emailInput = document.getElementById('wf-email');
    const phoneInput = document.getElementById('wf-phone');
    const companyInput = document.getElementById('wf-company');
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

    function escapeHtml(str) {
        return String(str).replace(/[&<>"']/g, function (m) {
            return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[m];
        });
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

        const emailValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        const phoneDigits = phoneNumber.replace(/\D/g, '');
        const phoneValid = phoneDigits.length >= 8 && phoneDigits.length <= 15;

        let isValid = true;
        setFieldError(fullNameInput, 'wf-fullname-err', !lastName);
        if (!lastName) isValid = false;

        setFieldError(emailInput, 'wf-email-err', !emailValid);
        if (!emailValid) isValid = false;

        setFieldError(phoneInput, 'wf-phone-err', !phoneValid);
        if (!phoneValid) isValid = false;

        setFieldError(jobSelect, 'wf-job-err', !jobVal);
        if (!jobVal) isValid = false;

        const needOther = (jobVal === 'Khác' && !otherJobVal);
        setFieldError(otherJobInput, 'wf-other-job-err', needOther);
        if (needOther) isValid = false;

        if (!isValid) return;

        const job_title = jobVal === 'Khác' ? otherJobVal : jobVal;
        const urlParams = new URLSearchParams(window.location.search);

        const payload = {
            form_id: "0f0b274fecb6279c11aff79ff787a139",
            email: email,
            lastName: lastName,
            phoneNumber: phoneNumber,
            job_title: job_title,
            company: company,
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

        const originalText = submitBtn.textContent;
        submitBtn.disabled = true;
        submitBtn.textContent = isEnMode ? 'Submitting...' : 'Đang gửi...';

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
                    try { result = JSON.parse(jsonMatch[0]); } catch (e2) {}
                }
            }

            if (!result || result.success !== true) {
                const errMsg = (result && result.message)
                    ? result.message
                    : (isEnMode ? 'Submission failed. Please try again.' : 'Có lỗi xảy ra, vui lòng thử lại hoặc gọi 028 2244 2244.');
                console.error("Lỗi từ server:", errMsg, response.status);
                showFormAlert(errMsg);
                return;
            }

            // Google Ads Conversion Tracking (SUBMIT FORM)
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
                console.warn('Tracking error:', trackErr);
            }

            const formHeader = document.getElementById('wf-form-header');
            const successBox = document.getElementById('wf-form-success');
            const successMsg = document.getElementById('wf-success-msg');

            if (successMsg) {
                successMsg.innerHTML = isEnMode
                    ? 'Thank you <strong>' + escapeHtml(lastName) + '</strong>. Confirmation will be sent to <strong>' + escapeHtml(email) + '</strong>.'
                    : 'Cảm ơn <strong>' + escapeHtml(lastName) + '</strong>. Ban Tổ Chức sẽ gửi xác nhận vé mời qua email <strong>' + escapeHtml(email) + '</strong>.';
            }

            if (formHeader) formHeader.style.display = 'none';
            form.style.display = 'none';
            if (successBox) successBox.classList.add('visible');
        } catch (err) {
            console.error("Lỗi kết nối API:", err);
            showFormAlert(isEnMode ? 'Network error. Please try again.' : 'Lỗi kết nối máy chủ, vui lòng thử lại sau.');
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        }
    });
});
</script>

<?php get_footer(); ?>
