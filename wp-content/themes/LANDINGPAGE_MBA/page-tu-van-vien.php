<?php
/**
 * The template for displaying the Advisor Verification page
 * Template Name: Advisor Verification Template
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

    <!-- Preconnect to external domains --><?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php echo $is_en ? 'Advisor Identity Verification | IDEAS' : 'Xác thực tư vấn viên tuyển sinh | IDEAS'; ?></title>
        <meta name="description" content="<?php echo $is_en ? 'Official identity verification page for IDEAS admissions advisors. Check phone numbers quickly to prevent spoofing and fraud.' : 'Trang xác thực danh tính tư vấn viên tuyển sinh chính thức của IDEAS. Kiểm tra nhanh số điện thoại tránh mạo danh và lừa đảo học viên.'; ?>" />
    <?php endif; ?><?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $is_en ? 'Advisor Identity Verification | IDEAS' : 'Xác thực tư vấn viên tuyển sinh | IDEAS'; ?>" />
        <meta property="og:description" content="<?php echo $is_en ? 'Official identity verification page for IDEAS admissions advisors. Check phone numbers quickly to prevent spoofing and fraud.' : 'Hệ thống tra cứu số điện thoại và xác định danh tính tư vấn viên tuyển sinh chính thức của IDEAS.'; ?>" />
        <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />
        <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp" />
    <?php endif; ?>

    <!-- JSON-LD Structured Data Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "<?php echo $is_en ? 'Admissions Advisor Verification | IDEAS' : 'Xác thực tư vấn viên tuyển sinh | IDEAS'; ?>",
      "description": "<?php echo $is_en ? 'Official identity verification page for IDEAS admissions advisors. Check phone numbers quickly to prevent spoofing and fraud.' : 'Trang xác thực danh tính tư vấn viên tuyển sinh chính thức của IDEAS. Kiểm tra nhanh số điện thoại tránh mạo danh và lừa đảo học viên.'; ?>",
      "url": "<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>",
      "publisher": {
        "@type": "Organization",
        "name": "IDEAS",
        "url": "https://ideas.edu.vn",
        "logo": "https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg-optimized.webp"
      }
    }
    </script><!-- Main stylesheet --><!-- Booking Modal stylesheet -->
    <?php
    define('BOOKING_MODAL_CSS_LOADED', true);
    $bk_css_path = get_stylesheet_directory() . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/booking-modal.min.css?v=<?php echo $bk_css_version; ?>" media="print" onload="this.media='all'" />

    <style>
        html, body {
            overflow-x: hidden !important;
            width: 100%;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        *, *:before, *:after {
            box-sizing: inherit;
        }

        h1, h2, h3, h4, h5, h6, p, span, div, button, input {
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }

        /* ── Hero y hệt /ideas-talk ──────────────────────────── */
        .verify-hero {
            position: relative;
            padding: 180px 20px 90px;
            overflow: hidden;
            background: #080405;
            min-height: 45vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            border-bottom: none;
            width: 100%;
        }

        .verify-hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            will-change: transform;
            transform: scale(1.1);
            z-index: 1;
            opacity: 0.25;
            background-image: url('https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp');
        }

        .verify-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(180deg,
                    rgba(8, 4, 5, 0.85) 0%,
                    rgba(80, 6, 0, 0.35) 60%,
                    transparent 100%),
                radial-gradient(ellipse at 50% 50%, rgba(171, 14, 0, 0.25) 0%, transparent 75%);
        }

        .verify-hero-container {
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

        .verify-badge {
            background: rgba(171, 14, 0, 0.2);
            border: 1px solid rgba(255, 77, 77, 0.35);
            padding: 8px 22px;
            border-radius: 100px;
            color: #ffcccc;
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

        .verify-hero h1 {
            font-size: clamp(2rem, 4.5vw, 3.5rem);
            font-weight: 900;
            margin-bottom: 20px;
            letter-spacing: -0.02em;
            line-height: 1.15;
            color: #ffffff !important;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.6);
            white-space: normal;
        }

        .verify-hero h1 span {
            background: linear-gradient(135deg, #ff4d4d 0%, #ab0e00 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }

        .verify-hero p {
            font-size: 1.15rem;
            color: rgba(255, 255, 255, 0.95) !important;
            max-width: 700px;
            margin-bottom: 0;
            line-height: 1.6;
            font-weight: 500;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        /* Search Section */
        .search-section {
            margin-top: -50px;
            padding: 0 20px;
            position: relative;
            z-index: 10;
        }

        .search-container {
            max-width: 760px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 24px;
            padding: 36px 30px;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
            border: 1px solid rgba(148, 163, 184, 0.15);
            width: 100%;
        }

        .search-label {
            display: block;
            font-size: 1rem;
            font-weight: 700;
            color: #334155;
            margin-bottom: 14px;
            text-align: left;
        }

        .search-input-wrap {
            display: flex;
            gap: 12px;
            position: relative;
        }

        .search-input-box {
            position: relative;
            flex: 1;
            width: 100%;
            display: flex;
            align-items: center;
        }

        .search-input-field {
            width: 100%;
            padding: 16px 20px 16px 48px;
            font-size: 1.05rem;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            outline: none;
            transition: all 0.3s ease;
            font-family: inherit;
            color: #1e293b;
            box-sizing: border-box;
        }

        .search-input-field:focus {
            border-color: #ab0e00;
            box-shadow: 0 0 0 4px rgba(171, 14, 0, 0.1);
        }

        .search-icon-decor {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1.2rem;
            pointer-events: none;
        }

        .btn-search-verify {
            background: #ab0e00;
            color: #ffffff;
            border: none;
            padding: 16px 32px;
            font-size: 1rem;
            font-weight: 700;
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-search-verify:hover {
            background: #8b0c00;
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(171, 14, 0, 0.25);
        }

        /* Result Section */
        .results-container {
            max-width: 760px;
            margin: 24px auto 0;
            display: none; /* Controlled by JS */
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.4s ease;
        }

        .results-container.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .result-card {
            border-radius: 24px;
            padding: 24px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
            border: 2px solid transparent;
        }

        .result-card.success {
            background: #f0fdf4;
            border-color: #bbf7d0;
            color: #166534;
        }

        .result-card.error {
            background: #fef2f2;
            border-color: #fecaca;
            color: #991b1b;
        }

        .result-status-header {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 800;
            font-size: 1.15rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 16px;
        }

        .result-status-header i {
            font-size: 1.4rem;
        }

        .result-desc {
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        /* Searched Consultant Card Layout inside result */
        .matched-consultant-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
        }

        .matched-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ab0e00;
        }

        .matched-info {
            flex: 1;
            text-align: left;
        }

        .matched-name {
            font-size: 1.2rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .matched-role {
            font-size: 0.85rem;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: block;
            margin-bottom: 8px;
        }

        .matched-phone {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 1rem;
            color: #1e293b;
        }

        .matched-phone i {
            color: #ab0e00;
        }

        .matched-phone strong {
            color: #ab0e00;
            font-size: 1.1rem;
        }

        .verified-badge-pill {
            background: #dcfce7;
            color: #15803d;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 100px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            margin-top: 6px;
        }

        /* Warning section */
        .warning-notice-bar {
            max-width: 900px;
            margin: 60px auto 0;
            background: #fffbeb;
            border: 1px solid #fde68a;
            border-radius: 20px;
            padding: 24px;
            display: flex;
            gap: 16px;
            align-items: flex-start;
            color: #92400e;
            width: 100%;
        }

        .warning-notice-bar i {
            font-size: 1.6rem;
            color: #d97706;
            margin-top: 2px;
        }

        .warning-notice-bar h4 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .warning-notice-bar p {
            font-size: 0.95rem;
            line-height: 1.6;
            margin: 0;
        }

        /* List Section - 4 TVV 1 Hàng */
        .list-section {
            max-width: 1400px;
            margin: 80px auto;
            padding: 0 20px;
            width: 100%;
        }

        .list-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .list-header h2 {
            font-size: 2.2rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 12px;
            letter-spacing: -0.02em;
        }

        .list-header p {
            font-size: 1.05rem;
            color: #64748b;
        }

        .consultants-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            margin-top: 40px;
        }

        .consultant-card {
            background: #ffffff;
            border: 1px solid rgba(148, 163, 184, 0.15);
            border-radius: 24px;
            padding: 40px 30px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .consultant-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 40px rgba(15, 23, 42, 0.08);
            border-color: rgba(171, 14, 0, 0.25);
        }

        .consultant-avatar-wrap {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto 24px;
        }

        .consultant-avatar {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(171, 14, 0, 0.08);
            transition: all 0.3s ease;
        }

        .consultant-card:hover .consultant-avatar {
            border-color: #ab0e00;
            transform: scale(1.03);
        }

        .consultant-card-name {
            font-size: 1.35rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 6px;
        }

        .consultant-card-role {
            font-size: 0.85rem;
            color: #64748b;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            display: block;
            margin-bottom: 18px;
        }

        .consultant-card-phone {
            background: #f8fafc;
            border: 1.5px dashed #cbd5e1;
            padding: 8px 16px;
            border-radius: 12px;
            font-size: 0.9rem;
            color: #334155;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .consultant-card:hover .consultant-card-phone {
            background: rgba(171, 14, 0, 0.03);
            border-color: rgba(171, 14, 0, 0.3);
            color: #ab0e00;
        }

        .consultant-card-phone i {
            color: #94a3b8;
            transition: all 0.3s ease;
        }

        .consultant-card:hover .consultant-card-phone i {
            color: #ab0e00;
        }

        .consultant-card-phone strong {
            font-weight: 800;
            font-size: 0.95rem;
        }

        .consultant-card-email {
            font-size: 0.85rem;
            color: #64748b;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .consultant-card:hover .consultant-card-email {
            color: #1e293b;
        }

        .consultant-card-email i {
            color: #94a3b8;
            transition: all 0.3s ease;
        }

        .consultant-card:hover .consultant-card-email i {
            color: #ab0e00;
        }

        .btn-card-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 240px;
            padding: 12px;
            background: transparent;
            color: #ab0e00;
            border: 2px solid rgba(171, 14, 0, 0.35);
            border-radius: 14px;
            font-weight: 700;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
        }

        .btn-card-action:hover {
            background: #ab0e00;
            color: #ffffff;
            border-color: #ab0e00;
            box-shadow: 0 6px 15px rgba(171, 14, 0, 0.2);
        }

        /* Payment Guidelines Section */
        .payment-guidelines-section {
            background: #ffffff;
            border-top: 1px solid rgba(148, 163, 184, 0.15);
            padding: 80px 20px;
            width: 100%;
        }

        .guidelines-container {
            max-width: 1000px;
            margin: 0 auto;
            width: 100%;
        }

        .guidelines-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: center;
        }

        .guidelines-content h2 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 18px;
            letter-spacing: -0.02em;
        }

        .guidelines-content p {
            font-size: 1rem;
            line-height: 1.6;
            color: #475569;
            margin-bottom: 24px;
        }

        .guidelines-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .guidelines-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 0.95rem;
            line-height: 1.5;
            color: #334155;
            font-weight: 500;
        }

        .guidelines-list li i {
            color: #10b981;
            margin-top: 3px;
            font-size: 1.1rem;
        }

        .bank-details-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.01);
        }

        .bank-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 16px;
        }

        .bank-logo {
            font-size: 2rem;
            color: #ab0e00;
        }

        .bank-name {
            font-size: 1.15rem;
            font-weight: 800;
            color: #0f172a;
        }

        .bank-info-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.95rem;
        }

        .bank-info-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .bank-label {
            color: #64748b;
            font-weight: 500;
        }

        .bank-value {
            color: #0f172a;
            font-weight: 700;
            text-align: right;
        }

        .bank-value.highlight {
            color: #ab0e00;
        }

        /* Responsive Breakpoints */
        @media (max-width: 1200px) {
            .consultants-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 24px;
            }
            .list-section {
                max-width: 960px;
            }
        }

        @media (max-width: 992px) {
            .guidelines-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }
        }

        @media (max-width: 768px) {
            .verify-hero {
                padding: 130px 20px 50px !important;
                min-height: auto;
            }

            .verify-badge {
                padding: 6px 16px;
                font-size: 0.75rem;
                margin-bottom: 16px;
            }

            .verify-hero h1 {
                font-size: 1.8rem !important;
                line-height: 1.25;
                margin-bottom: 16px;
            }

            .verify-hero p {
                font-size: 0.95rem !important;
                color: rgba(255, 255, 255, 0.9) !important;
                line-height: 1.5;
            }

            .search-section {
                margin-top: -30px;
                padding: 0 24px !important;
            }

            .search-container {
                width: auto !important;
                padding: 24px 20px !important;
                border-radius: 20px;
                margin: 0 auto;
            }

            .search-label {
                font-size: 0.95rem;
                margin-bottom: 10px;
            }

            .search-input-wrap {
                flex-direction: column;
                gap: 12px;
                width: 100%;
            }

            .search-input-box {
                width: 100%;
            }

            .search-input-field {
                padding: 14px 16px 14px 44px;
                font-size: 0.95rem;
                border-radius: 12px;
                width: 100% !important;
                box-sizing: border-box;
            }

            .search-icon-decor {
                left: 16px;
                font-size: 1.1rem;
            }

            .btn-search-verify {
                width: 100% !important;
                justify-content: center;
                padding: 14px 24px;
                font-size: 0.95rem;
                border-radius: 12px;
                box-sizing: border-box;
            }

            .matched-consultant-card {
                flex-direction: column;
                text-align: center;
                padding: 20px;
                gap: 16px;
            }

            .matched-info {
                text-align: center;
                width: 100%;
            }

            .matched-email {
                display: flex !important;
                flex-direction: column !important;
                align-items: center !important;
                gap: 4px !important;
                text-align: center !important;
            }

            .warning-notice-bar {
                flex-direction: column;
                gap: 10px;
                padding: 20px 20px;
                margin: 30px auto 0;
                border-radius: 16px;
                width: auto !important;
            }

            .warning-notice-bar i {
                font-size: 1.4rem;
            }

            .warning-notice-bar h4 {
                font-size: 1rem;
                margin-bottom: 4px;
            }

            .warning-notice-bar p {
                font-size: 0.88rem;
                line-height: 1.5;
            }

            .list-section {
                margin: 50px auto;
                padding: 0 24px !important;
                width: 100%;
            }

            .list-header {
                margin-bottom: 30px;
            }

            .list-header h2 {
                font-size: 1.8rem;
                line-height: 1.3;
            }

            .list-header p {
                font-size: 0.95rem;
            }

            .consultants-grid {
                grid-template-columns: 1fr;
                max-width: 400px;
                margin-left: auto;
                margin-right: auto;
                width: 100%;
                gap: 20px;
            }

            .consultant-card {
                padding: 30px 20px;
                border-radius: 20px;
            }

            .consultant-avatar-wrap {
                width: 100px;
                height: 100px;
                margin-bottom: 16px;
            }

            .consultant-card-name {
                font-size: 1.2rem;
            }

            .consultant-card-role {
                margin-bottom: 12px;
            }

            .btn-card-action {
                max-width: 100%;
            }

            .payment-guidelines-section {
                padding: 50px 24px !important;
            }

            .guidelines-container {
                width: auto !important;
                max-width: 100% !important;
            }

            .guidelines-content h2 {
                font-size: 1.5rem;
                margin-bottom: 12px;
            }

            .guidelines-content p {
                font-size: 0.95rem;
                margin-bottom: 16px;
            }

            .guidelines-list li {
                font-size: 0.9rem;
            }

            .bank-details-card {
                padding: 24px 20px;
                border-radius: 20px;
            }

            .bank-info-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 4px;
                padding: 8px 0;
            }

            .bank-value {
                text-align: left !important;
                width: 100%;
            }

            .bank-value.highlight {
                font-size: 1.15rem !important;
            }
        }

        @media (max-width: 480px) {
            .verify-hero {
                padding: 110px 16px 40px !important;
            }

            .verify-hero h1 {
                font-size: 1.6rem !important;
            }

            .verify-hero p {
                font-size: 0.88rem !important;
            }

            .search-section {
                margin-top: -20px;
                padding: 0 20px !important;
            }

            .search-container {
                padding: 20px 16px !important;
                border-radius: 16px;
            }

            .search-input-field {
                padding: 12px 14px 12px 38px;
                font-size: 0.9rem;
            }

            .search-icon-decor {
                left: 14px;
                font-size: 1rem;
            }

            .btn-search-verify {
                padding: 12px 20px;
                font-size: 0.9rem;
            }

            .warning-notice-bar {
                padding: 16px 16px !important;
                border-radius: 14px;
                margin-top: 20px;
            }

            .list-section {
                padding: 0 20px !important;
                margin: 40px auto;
            }

            .list-header h2 {
                font-size: 1.5rem;
            }

            .list-header p {
                font-size: 0.88rem;
            }

            .consultants-grid {
                max-width: 100%;
                gap: 16px;
            }

            .consultant-card {
                padding: 24px 16px;
                border-radius: 16px;
            }

            .payment-guidelines-section {
                padding: 40px 20px !important;
            }

            .guidelines-content h2 {
                font-size: 1.35rem;
            }

            .guidelines-content p {
                font-size: 0.88rem;
            }

            .bank-details-card {
                padding: 16px;
                border-radius: 16px;
            }
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Site Header -->
    <?php get_template_part('shared-header'); ?>

    <!-- Hero Section y hệt /ideas-talk -->
    <section class="verify-hero">
        <div class="verify-hero-bg"></div>
        <div class="verify-hero-overlay"></div>
        <div class="verify-hero-container">
            <span class="verify-badge">
                <svg class="svg-icon fa-user-shield fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c1.8 0 3.5-.2 5.3-.5c-76.3-55.1-99.8-141-103.1-200.2c-16.1-4.8-33.1-7.3-50.7-7.3l-91.4 0zm308.8-78.3l-120 48C358 277.4 352 286.2 352 296c0 63.3 25.9 168.8 134.8 214.2c5.9 2.5 12.6 2.5 18.5 0C614.1 464.8 640 359.3 640 296c0-9.8-6-18.6-15.1-22.3l-120-48c-5.7-2.3-12.1-2.3-17.8 0zM591.4 312c-3.9 50.7-27.2 116.7-95.4 149.7l0-187.8L591.4 312z"/></svg>
                <?php echo $is_en ? 'Security & Transparency' : 'Bảo Mật &amp; Minh Bạch'; ?>
            </span>
            <h1><?php echo $is_en ? 'Verify <span>Admissions Advisors</span>' : 'Xác Thực <span>Tư Vấn Viên Tuyển Sinh</span>'; ?></h1>
            <p><?php echo $is_en ? 'Quickly verify the identity of official IDEAS admissions counselors to protect your academic interests and prevent spoofing or fraud.' : 'Kiểm tra nhanh danh tính chuyên viên tư vấn chính thức của IDEAS nhằm bảo vệ quyền lợi học tập và phòng ngừa các hình thức giả mạo hoặc lừa đảo.'; ?></p>
        </div>
    </section>

    <!-- Search Tool Section -->
    <section class="search-section">
        <div class="search-container">
            <label for="advisor-search" class="search-label"><?php echo $is_en ? 'Enter the full phone number of the advisor to verify:' : 'Nhập đầy đủ số điện thoại tư vấn viên cần kiểm tra:'; ?></label>
            <div class="search-input-wrap">
                <div class="search-input-box">
                    <svg class="svg-icon fa-phone fa-solid search-icon-decor" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                    <input type="text" id="advisor-search" class="search-input-field" placeholder="<?php echo $is_en ? 'e.g. 0901234017 or enter only the last 3 digits like 017' : 'Ví dụ: 0901234017 hoặc chỉ nhập 3 số đuôi như 017'; ?>">
                </div>
                <button type="button" id="btn-verify" class="btn-search-verify">
                    <svg class="svg-icon fa-user-check fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM625 177L497 305c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L591 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                    <?php echo $is_en ? 'Verify Now' : 'Kiểm tra ngay'; ?>
                </button>
            </div>

            <!-- Search Results Display Area -->
            <div id="search-results" class="results-container">
                <!-- Dynamically generated content will go here -->
            </div>
        </div>

        <!-- Warning Notice Bar -->
        <div class="warning-notice-bar">
            <svg class="svg-icon fa-triangle-exclamation fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480L40 480c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24l0 112c0 13.3 10.7 24 24 24s24-10.7 24-24l0-112c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg>
            <div>
                <h2><?php echo $is_en ? 'Fraud Prevention Alert' : 'Cảnh báo phòng tránh mạo danh'; ?></h2>
                <p><?php echo $is_en ? 'There are cases of fraudsters pretending to be IDEAS staff to contact students and provide misleading information. Please remain highly vigilant against calls, messages, or contacts from unrecognized numbers not listed below.' : 'Hiện nay có tình trạng mạo danh nhân viên IDEAS để tiếp cận và cung cấp thông tin sai lệch đến học viên. Quý học viên hãy hết sức cảnh giác trước các cuộc gọi, tin nhắn hoặc liên hệ từ các số điện thoại lạ không nằm trong danh sách tư vấn viên chính thức.'; ?></p>
            </div>
        </div>
    </section>

    <!-- Official Advisors Grid - 2 TVV 1 Hàng -->
    <section class="list-section">
        <div class="list-header">
            <h2><?php echo $is_en ? 'Official Admissions Advisors' : 'Đội Ngũ Tư Vấn Viên Chính Thức'; ?></h2>
            <p><?php echo $is_en ? 'Below are the official admissions and student experience specialists at IDEAS.' : 'Dưới đây là các chuyên viên tư vấn chính thức trực thuộc Khối Tuyển sinh và Trải nghiệm Học viên của IDEAS.'; ?></p>
        </div>

        <div class="consultants-grid">
            <!-- Advisor 1 -->
            <article class="consultant-card" data-suffix="017">
                <div class="consultant-avatar-wrap">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/cphuc.webp" class="consultant-avatar" alt="Lưu Phan Hoàng Phúc" width="120" height="120" loading="lazy">
                </div>
                <h3 class="consultant-card-name">Lưu Phan Hoàng Phúc</h3>
                <span class="consultant-card-role"><?php echo $is_en ? 'Admissions Advisor' : 'Tư vấn viên tuyển sinh'; ?></span>
                <div class="consultant-card-phone">
                    <svg class="svg-icon fa-phone fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                    <span>*********<strong>017</strong></span>
                </div>
                <div class="consultant-card-email">
                    <svg class="svg-icon fa-envelope fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                    <span>phuclph@ideas.edu.vn</span>
                </div>
                <button type="button" class="btn-card-action" onclick="showform('tu_van_phuc')"><?php echo $is_en ? 'Get Counseling' : 'Nhận tư vấn'; ?></button>
            </article>

            <!-- Advisor 2 -->
            <article class="consultant-card" data-suffix="953,427">
                <div class="consultant-avatar-wrap">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/z7928563815344_f88e1ecb4aba7b343936df712559c960-1.jpg" class="consultant-avatar" alt="Nguyễn Thị Linh Đan" width="120" height="120" loading="lazy">
                </div>
                <h3 class="consultant-card-name">Nguyễn Thị Linh Đan</h3>
                <span class="consultant-card-role"><?php echo $is_en ? 'Admissions Advisor' : 'Tư vấn viên tuyển sinh'; ?></span>
                <div class="consultant-card-phone" style="display: inline-flex; flex-direction: column; gap: 6px; align-items: flex-start; padding: 8px 16px;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <svg class="svg-icon fa-phone fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                        <span>*********<strong>953</strong></span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px; border-top: 1px dashed rgba(203, 213, 225, 0.6); padding-top: 4px; width: 100%;">
                        <svg class="svg-icon fa-phone fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                        <span>*********<strong>427</strong></span>
                    </div>
                </div>
                <div class="consultant-card-email">
                    <svg class="svg-icon fa-envelope fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                    <span>danntl@ideas.edu.vn</span>
                </div>
                <button type="button" class="btn-card-action" onclick="showform('tu_van_dan')"><?php echo $is_en ? 'Get Counseling' : 'Nhận tư vấn'; ?></button>
            </article>

            <!-- Advisor 3 -->
            <article class="consultant-card" data-suffix="486">
                <div class="consultant-avatar-wrap">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/nhi_avt.webp" class="consultant-avatar" alt="Lê Đinh Ý Nhi" width="120" height="120" loading="lazy">
                </div>
                <h3 class="consultant-card-name">Lê Đinh Ý Nhi</h3>
                <span class="consultant-card-role"><?php echo $is_en ? 'Admissions Advisor' : 'Tư vấn viên tuyển sinh'; ?></span>
                <div class="consultant-card-phone">
                    <svg class="svg-icon fa-phone fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                    <span>*********<strong>486</strong></span>
                </div>
                <div class="consultant-card-email">
                    <svg class="svg-icon fa-envelope fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                    <span>nhildy@ideas.edu.vn</span>
                </div>
                <button type="button" class="btn-card-action" onclick="showform('tu_van_nhi')"><?php echo $is_en ? 'Get Counseling' : 'Nhận tư vấn'; ?></button>
            </article>

            <!-- Advisor 4 -->
            <article class="consultant-card" data-suffix="935">
                <div class="consultant-avatar-wrap">
                    <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/uyen.webp" class="consultant-avatar" alt="Nguyễn Phương Uyên" width="120" height="120" loading="lazy">
                </div>
                <h3 class="consultant-card-name">Nguyễn Phương Uyên</h3>
                <span class="consultant-card-role"><?php echo $is_en ? 'Admissions Advisor' : 'Tư vấn viên tuyển sinh'; ?></span>
                <div class="consultant-card-phone">
                    <svg class="svg-icon fa-phone fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                    <span>*********<strong>935</strong></span>
                </div>
                <div class="consultant-card-email">
                    <svg class="svg-icon fa-envelope fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                    <span>uyennp@ideas.edu.vn</span>
                </div>
                <button type="button" class="btn-card-action" onclick="showform('tu_van_uyen')"><?php echo $is_en ? 'Get Counseling' : 'Nhận tư vấn'; ?></button>
            </article>
        </div>
    </section>

    <!-- Payment Guidelines & Safety Section -->
    <section class="payment-guidelines-section">
        <div class="guidelines-container">
            <div class="guidelines-grid">
                <div class="guidelines-content">
                    <h2><?php echo $is_en ? 'Safe Tuition Payment Guide' : 'Hướng Dẫn Đóng Phí An Toàn'; ?></h2>
                    <p><?php echo $is_en ? 'IDEAS implements transparent and strict financial controls to secure information and maximize the legal rights of students:' : 'IDEAS áp dụng quy trình kiểm soát tài chính minh bạch và chặt chẽ nhằm bảo mật thông tin và bảo vệ quyền lợi hợp pháp tối đa cho học viên:'; ?></p>
                    <ul class="guidelines-list">
                        <li>
                            <svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                            <span><?php echo $is_en ? 'All tuition collection accounts must belong to the corporate entity: <strong>IDEAS International Business Academy Joint Stock Company</strong>.' : 'Tất cả các tài khoản nhận đóng học phí đều phải trực thuộc pháp nhân của <strong>Công ty Cổ phần Học viện Kinh doanh Quốc Tế IDEAS</strong>.'; ?></span>
                        </li>
                        <li>
                            <svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                            <span><?php echo $is_en ? 'When paying tuition via Sacombank installments, procedures are officially detailed in writing or contract.' : 'Khi đóng phí qua trả góp liên kết Sacombank, các thủ tục được hướng dẫn cụ thể qua văn bản hoặc hợp đồng chính thức.'; ?></span>
                        </li>
                        <li>
                            <svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                            <span><?php echo $is_en ? 'All tuition receipts are sent directly from the official IDEAS email domain (ending with <strong>@ideas.edu.vn</strong>).' : 'Mọi biên nhận đóng học phí đều được gửi trực tiếp từ hệ thống email chính thức của IDEAS (có đuôi <strong>@ideas.edu.vn</strong>).'; ?></span>
                        </li>
                    </ul>
                </div>

                <div class="bank-details-card">
                    <div class="bank-header">
                        <svg class="svg-icon fa-building-columns fa-solid bank-logo" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M243.4 2.6l-224 96c-14 6-21.8 21-18.7 35.8S16.8 160 32 160l0 8c0 13.3 10.7 24 24 24l400 0c13.3 0 24-10.7 24-24l0-8c15.2 0 28.3-10.7 31.3-25.6s-4.8-29.9-18.7-35.8l-224-96c-8-3.4-17.2-3.4-25.2 0zM128 224l-64 0 0 196.3c-.6 .3-1.2 .7-1.8 1.1l-48 32c-11.7 7.8-17 22.4-12.9 35.9S17.9 512 32 512l448 0c14.1 0 26.5-9.2 30.6-22.7s-1.1-28.1-12.9-35.9l-48-32c-.6-.4-1.2-.7-1.8-1.1L448 224l-64 0 0 192-40 0 0-192-64 0 0 192-48 0 0-192-64 0 0 192-40 0 0-192zM256 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                        <div>
                            <div class="bank-name">HD Bank</div>
                            <div style="font-size:0.85rem; color:#64748b; font-weight:600;"><?php echo $is_en ? 'Nhon Trach Branch' : 'Chi nhánh Nhơn Trạch'; ?></div>
                        </div>
                    </div>
                    <div class="bank-info-item">
                        <span class="bank-label"><?php echo $is_en ? 'Account Holder:' : 'Chủ tài khoản:'; ?></span>
                        <span class="bank-value" style="font-size: 0.9rem; font-weight: 700; color: #0f172a; text-align: right;"><?php echo $is_en ? 'IDEAS International Business Academy Joint Stock Company' : 'Công ty Cổ phần Học viện Kinh doanh Quốc Tế IDEAS'; ?></span>
                    </div>
                    <div class="bank-info-item">
                        <span class="bank-label"><?php echo $is_en ? 'Account Number:' : 'Số tài khoản:'; ?></span>
                        <span class="bank-value highlight" style="font-size: 1.25rem; letter-spacing: 0.03em;">8979798686</span>
                    </div>
                    <div class="bank-info-item" style="flex-direction: column; align-items: flex-start; gap: 4px; border-bottom: none; padding: 10px 0 0;">
                        <span class="bank-label"><?php echo $is_en ? 'Transfer Content (Template):' : 'Nội dung chuyển khoản (Mẫu):'; ?></span>
                        <span class="bank-value highlight" style="text-align: left; font-size: 0.88rem; font-weight: 700; margin-top: 4px; text-transform: uppercase; line-height: 1.4; word-break: break-word;">
                            <?php echo $is_en ? '[YOUR FULL NAME] THANH TOAN HOC PHI DOT [INST NO] [PROGRAM NAME]' : '[HO VA TEN] THANH TOAN HOC PHI DOT [SO DOT] [TEN CHUONG TRINH]'; ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Verification Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('advisor-search');
            const btnVerify = document.getElementById('btn-verify');
            const resultsContainer = document.getElementById('search-results');
            if (typeof isEnMode === 'undefined') { var isEnMode = <?php echo $is_en ? 'true' : 'false'; ?>; }

            // Data of official advisors
            const advisors = [
                {
                    name: "Lưu Phan Hoàng Phúc",
                    phones: ["0945767017"],
                    suffixes: ["017"],
                    email: "phuclph@ideas.edu.vn",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2025/09/cphuc.webp",
                    role: "<?php echo $is_en ? 'Official Admissions Advisor' : 'Tư vấn viên tuyển sinh chính thức'; ?>"
                },
                {
                    name: "Nguyễn Thị Linh Đan",
                    phones: ["0916661953", "0393049427"],
                    suffixes: ["953", "427"],
                    email: "danntl@ideas.edu.vn",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2026/06/z7928563815344_f88e1ecb4aba7b343936df712559c960-1.jpg",
                    role: "<?php echo $is_en ? 'Official Admissions Advisor' : 'Tư vấn viên tuyển sinh chính thức'; ?>"
                },
                {
                    name: "Lê Đinh Ý Nhi",
                    phones: ["0916580486"],
                    suffixes: ["486"],
                    email: "nhildy@ideas.edu.vn",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/nhi_avt.webp",
                    role: "<?php echo $is_en ? 'Official Admissions Advisor' : 'Tư vấn viên tuyển sinh chính thức'; ?>"
                },
                {
                    name: "Nguyễn Phương Uyên",
                    phones: ["84911106935", "0911106935"],
                    suffixes: ["935"],
                    email: "uyennp@ideas.edu.vn",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2025/09/uyen.webp",
                    role: "<?php echo $is_en ? 'Official Admissions Advisor' : 'Tư vấn viên tuyển sinh chính thức'; ?>"
                }
            ];

            function runVerification() {
                // Get value and sanitize (remove non-alphanumeric chars)
                let query = searchInput.value.replace(/[^0-9]/g, '').trim();
                
                if (query.length < 3) {
                    alert(isEnMode ? 'Please enter the full phone number or at least the last 3 digits to check.' : 'Vui lòng nhập đầy đủ số điện thoại hoặc ít nhất 3 số đuôi để kiểm tra.');
                    return;
                }

                // Check if match any advisor
                let matchedAdvisor = null;
                let matchedPhone = "";
                let matchedSuffix = "";

                for (let advisor of advisors) {
                    // Match if query is one of the suffixes
                    if (advisor.suffixes.includes(query)) {
                        matchedAdvisor = advisor;
                        matchedSuffix = query;
                        break;
                    }
                    // Match if query is one of the full numbers
                    if (advisor.phones.includes(query)) {
                        matchedAdvisor = advisor;
                        matchedPhone = query;
                        break;
                    }
                    // Match if query ends with one of the suffixes
                    for (let suffix of advisor.suffixes) {
                        if (query.endsWith(suffix)) {
                            matchedAdvisor = advisor;
                            matchedSuffix = suffix;
                            break;
                        }
                    }
                    if (matchedAdvisor) break;
                }

                // Clean old result states
                resultsContainer.classList.remove('active');
                resultsContainer.innerHTML = '';

                setTimeout(() => {
                    if (matchedAdvisor) {
                        // Mask middle of the entered number if they input full number
                        let maskedNum = '';
                        if (query.length >= 7) {
                            maskedNum = query.substring(0, 3) + '****' + query.substring(query.length - 3);
                        } else {
                            let basePhone = matchedAdvisor.phones[0];
                            if (matchedSuffix) {
                                let idx = matchedAdvisor.suffixes.indexOf(matchedSuffix);
                                if (idx !== -1 && matchedAdvisor.phones[idx]) {
                                    basePhone = matchedAdvisor.phones[idx];
                                }
                            }
                            maskedNum = basePhone.substring(0, 3) + '****' + basePhone.substring(basePhone.length - 3);
                        }

                        // SUCCESS MATCH
                        resultsContainer.innerHTML = `
                            <div class="result-card success">
                                <div class="result-status-header">
                                    <svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                                    <span>${isEnMode ? 'Verification Successful' : 'Xác thực thành công'}</span>
                                </div>
                                <div class="result-desc">
                                    ${isEnMode ? 'The phone number matches an official IDEAS counselor. You can safely proceed with your consultation.' : 'Số điện thoại khớp với thông tin của chuyên viên tư vấn chính thức thuộc IDEAS. Quý học viên hoàn toàn có thể yên tâm trao đổi học tập.'}
                                </div>
                                <div class="matched-consultant-card">
                                    <img src="${matchedAdvisor.avatar}" class="matched-avatar" alt="${matchedAdvisor.name}" width="80" height="80">
                                    <div class="matched-info">
                                        <h4 class="matched-name">${matchedAdvisor.name}</h4>
                                        <span class="matched-role">${matchedAdvisor.role}</span>
                                        <div class="matched-phone">
                                            <svg class="svg-icon fa-phone fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                                            <span>${isEnMode ? 'Phone Number:' : 'Số điện thoại:'} <strong>${maskedNum}</strong></span>
                                        </div>
                                        <div class="matched-email" style="display: flex; align-items: center; gap: 6px; font-size: 0.9rem; color: #475569; margin-top: 6px;">
                                            <svg class="svg-icon fa-envelope fa-solid" style="color: #ab0e00;" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                                            <span>Email: <strong>${matchedAdvisor.email}</strong></span>
                                        </div>
                                        <div style="margin-top: 8px;">
                                            <span class="verified-badge-pill">
                                                <svg class="svg-icon fa-shield-halved fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 0c4.6 0 9.2 1 13.4 2.9L457.7 82.8c22 9.3 38.4 31 38.3 57.2c-.5 99.2-41.3 280.7-213.6 363.2c-16.7 8-36.1 8-52.8 0C57.3 420.7 16.5 239.2 16 140c-.1-26.2 16.3-47.9 38.3-57.2L242.7 2.9C246.8 1 251.4 0 256 0zm0 66.8l0 378.1C394 378 431.1 230.1 432 141.4L256 66.8s0 0 0 0z"/></svg>
                                                Official Staff Verified
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    } else {
                        // NO MATCH - WARNING STATE
                        resultsContainer.innerHTML = `
                            <div class="result-card error">
                                <div class="result-status-header">
                                    <svg class="svg-icon fa-triangle-exclamation fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480L40 480c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24l0 112c0 13.3 10.7 24 24 24s24-10.7 24-24l0-112c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg>
                                    <span>${isEnMode ? 'Impersonation Alert' : 'Cảnh báo mạo danh'}</span>
                                </div>
                                <div class="result-desc">
                                    ${isEnMode ? `The phone number or suffix <strong>"${searchInput.value}"</strong> you entered is <strong>NOT</strong> in the official list of IDEAS advisors.` : `Số điện thoại hoặc số đuôi <strong>"${searchInput.value}"</strong> mà Quý học viên vừa nhập <strong>KHÔNG</strong> nằm trong danh sách các tư vấn viên chính thức của IDEAS.`}
                                </div>
                                <p style="margin: 0; font-size: 0.9rem; line-height: 1.5;">
                                    ${isEnMode ? 'To prevent information misuse, please be extremely cautious and do not share personal details or work with this number. Contact our official Hotline: <strong>028 2244 2244</strong> immediately or email <strong>info@ideas.edu.vn</strong> for support.' : 'Nhằm tránh bị lợi dụng thông tin hoặc mạo danh tư vấn viên, Quý học viên vui lòng hết sức cảnh giác, không làm việc trực tiếp hoặc cung cấp thông tin cá nhân cho số điện thoại này. Hãy liên hệ ngay với chúng tôi qua số Hotline chính thức: <strong>028 2244 2244</strong> hoặc gửi phản hồi về địa chỉ email <strong>info@ideas.edu.vn</strong> để được xác minh và hỗ trợ kịp thời.'}
                                </p>
                            </div>
                        `;
                    }

                    resultsContainer.classList.add('active');

                    // Scroll view smoothly to result card
                    resultsContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 200);
            }

            btnVerify.addEventListener('click', runVerification);

            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    runVerification();
                }
            });
        });
    </script>

    <!-- Main scripts minified imports -->
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
</body>
</html>
