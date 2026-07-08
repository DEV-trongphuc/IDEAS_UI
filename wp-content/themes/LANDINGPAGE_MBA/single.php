<?php
/**
 * The template for displaying all single posts
 * Template Name: Premium Single Post Layout
 * Template Post Type: post
 */

// Dequeue unwanted old CSS styles (via WordPress API - catches enqueued styles)
add_action('wp_enqueue_scripts', function () {
    global $wp_styles;
    if ($wp_styles && !empty($wp_styles->registered)) {
        foreach ($wp_styles->registered as $handle => $style) {
            if (isset($style->src) && strpos($style->src, 'LANDINGPAGE_MBA/main.css') !== false) {
                wp_dequeue_style($handle);
                wp_deregister_style($handle);
            }
        }
    }
}, 9999);

// Also block via output buffering — removes the <link> tag even if hardcoded by a plugin/theme
ob_start(function ($html) {
    // Remove any <link> tag loading LANDINGPAGE_MBA/main.css
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

    <!-- Preconnect to external domains for faster resource loading --><?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <?php endif; ?>

    <?php
    // Prepare SEO details dynamically
    $post_id = get_the_ID();
    $excerpt = get_the_excerpt();
    if (empty($excerpt)) {
        $excerpt = wp_strip_all_tags(wp_trim_words(get_the_content(), 30));
    }

    // Extract first image in content as fallback featured image
    $featured_image = get_the_post_thumbnail_url($post_id, 'full');
    if (!$featured_image) {
        $content = get_the_content();
        preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $content, $matches);
        $featured_image = isset($matches[1][0]) ? $matches[1][0] : 'https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg-optimized.webp';
    }
    ?>
    <?php if ($featured_image): ?>
            <link rel="preload" fetchpriority="high" as="image" href="<?php echo esc_url($featured_image); ?>" />
    <?php endif; ?>
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
            <meta name="description" content="<?php echo esc_attr($excerpt); ?>">
    <?php endif; ?><!-- Open Graph / Facebook -->
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
            <meta property="og:type" content="article" />
            <meta property="og:title" content="<?php echo esc_attr(get_the_title()); ?>" />
            <meta property="og:description" content="<?php echo esc_attr($excerpt); ?>" />
            <meta property="og:image" content="<?php echo esc_url($featured_image); ?>" />
            <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>" />
            <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
    <?php endif; ?>
    <meta property="article:published_time" content="<?php echo get_the_date('c'); ?>" />
    <meta property="article:modified_time" content="<?php echo get_the_modified_date('c'); ?>" />

    <!-- Twitter Card -->
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
            <meta name="twitter:card" content="summary_large_image" />
            <meta name="twitter:title" content="<?php echo esc_attr(get_the_title()); ?>" />
            <meta name="twitter:description" content="<?php echo esc_attr($excerpt); ?>" />
            <meta name="twitter:image" content="<?php echo esc_url($featured_image); ?>" />
    <?php endif; ?><style>
        /* Prevent overflow-x from breaking sticky elements */
        html,
        body {
            overflow-x: clip !important;
        }

        /* Modern Single Post UI/UX App-like Custom Styles */
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }

        .post-layout-wrapper {
            max-width: 1320px;
            margin: 120px auto 80px;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 40px;
        }

        .article-featured-image {
            width: 100%;
            border-radius: 16px;
            overflow: hidden;
            margin-top: 24px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
        }

        .article-featured-image img {
            width: 100%;
            height: auto;
            max-height: 480px;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

        .article-featured-image:hover img {
            transform: scale(1.015);
        }

        @media (max-width: 992px) {
            .post-layout-wrapper {
                grid-template-columns: 1fr;
                margin: 90px auto 40px;
                gap: 30px;
            }
        }

        /* Hero Article Header */
        .article-hero {
            background: #ffffff;
            border-radius: 24px;
            padding: 40px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
            margin-bottom: 30px;
        }

        @media (max-width: 576px) {
            .article-hero {
                padding: 24px 20px;
                border-radius: 16px;
            }
        }

        .article-breadcrumbs {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.88rem;
            color: #64748b;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .article-breadcrumbs a {
            color: #64748b;
            text-decoration: none;
            transition: color 0.2s;
        }

        .article-breadcrumbs a:hover {
            color: #ab0e00;
        }

        .article-category-badge {
            display: inline-block;
            background: #fef2f2;
            color: #ab0e00;
            padding: 6px 14px;
            border-radius: 100px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 16px;
        }

        .article-category-badge a {
            color: #ab0e00;
            text-decoration: none;
        }

        .article-main-title {
            font-size: 2.25rem;
            font-weight: 800;
            color: #ab0e00;
            line-height: 1.3;
            margin-bottom: 24px;
            letter-spacing: -0.02em;
        }

        @media (max-width: 768px) {
            .article-main-title {
                font-size: 1.75rem;
            }
        }

        .article-hero .verify-slogan {
            font-size: 0.95rem;
            font-weight: 600;
            color: #64748b;
            text-shadow: none;
            margin-top: -12px;
            margin-bottom: 20px;
            display: inline-block;
        }

        @media (max-width: 768px) {
            .article-hero .verify-slogan {
                font-size: 0.85rem;
                margin-top: -16px;
                margin-bottom: 16px;
            }
        }

        .article-meta-row {
            display: flex;
            align-items: center;
            gap: 24px;
            border-top: 1px solid #f1f5f9;
            padding-top: 24px;
            flex-wrap: wrap;
        }

        .meta-info-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.88rem;
            color: #64748b;
        }

        /* Post Body Content Card */
        .article-content-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 40px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
            margin-bottom: 30px;
        }

        @media (max-width: 576px) {
            .article-content-card {
                padding: 24px 20px;
                border-radius: 16px;
            }
        }

        .article-body-content {
            font-size: 1.05rem;
            line-height: 1.8;
            color: #334155;
        }

        .article-body-content a {
            color: #ab0e00;
            text-decoration: underline;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .article-body-content a:hover {
            color: #ab0e00;
            text-decoration: underline;
        }

        .article-body-content p {
            margin-bottom: 24px;
        }

        .article-body-content h2 {
            font-size: 1.6rem;
            font-weight: 700;
            color: #0f172a;
            margin: 40px 0 20px;
            line-height: 1.4;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .article-body-content h2::before {
            content: '';
            display: inline-block;
            width: 4px;
            height: 24px;
            background: #ab0e00;
            border-radius: 4px;
            flex-shrink: 0;
        }

        .article-body-content h3 {
            font-size: 1.35rem;
            font-weight: 700;
            color: #0f172a;
            margin: 30px 0 16px;
        }

        .article-body-content ul,
        .article-body-content ol {
            margin-bottom: 24px;
            padding-left: 24px;
        }

        /* Override WordPress block editor list-style: none */
        .article-body-content ul,
        .article-body-content ul.wp-block-list {
            list-style-type: disc !important;
        }

        .article-body-content ol,
        .article-body-content ol.wp-block-list {
            list-style-type: decimal !important;
        }

        .article-body-content li,
        .article-body-content .wp-block-list li {
            margin-bottom: 10px;
            display: list-item !important;
        }

        .article-body-content ul li::marker,
        .article-body-content ul.wp-block-list li::marker {
            color: #ab0e00;
        }

        /* Blockquote style */
        .ideas-blockquote {
            border-left: 4px solid #ab0e00;
            padding: 20px 24px;
            background: #fdf2f2;
            border-radius: 0 16px 16px 0;
            font-style: italic;
            font-size: 1.1rem;
            color: #475569;
            margin: 30px 0;
            line-height: 1.6;
        }

        /* Table styling — figure.wp-block-table from WordPress block editor */
        .article-body-content figure.wp-block-table,
        .article-body-content .table-responsive-wrapper {
            width: 100%;
            overflow: hidden;
            /* clips border-radius corners on table */
            overflow-x: auto;
            margin: 35px 0 !important;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
        }

        /* Reset default figure margin from WordPress */
        .article-body-content figure.wp-block-table {
            padding: 0;
        }

        .article-body-content table,
        .article-body-content figure.wp-block-table table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.95rem;
            margin: 0 !important;
            /* reset any wp margins */
        }

        /* Header row <th> — from thead */
        .article-body-content th,
        .article-body-content figure.wp-block-table th {
            background: #f8fafc;
            color: #0f172a;
            font-weight: 700;
            padding: 16px 20px;
            border: 1px solid #e2e8f0;
            border-bottom: 2px solid #e2e8f0;
        }

        /* Data cells <td> */
        .article-body-content td,
        .article-body-content figure.wp-block-table td {
            padding: 16px 20px;
            border: 1px solid #e2e8f0;
            color: #475569;
            vertical-align: top;
        }

        /* First row acting as header (when WP table has no thead) */
        .article-body-content figure.wp-block-table tbody tr:first-child td,
        .article-body-content tbody tr:first-child td {
            background: #f8fafc;
            color: #0f172a;
            font-weight: 700;
            border: 1px solid #e2e8f0;
            border-bottom: 2px solid #e2e8f0;
        }

        /* Row hover */
        .article-body-content tbody tr:hover td,
        .article-body-content figure.wp-block-table tbody tr:hover td {
            background: #f8fafc;
        }

        /* FAQs styling */
        .ideas-faq-section {
            margin-top: 50px;
            border-top: 1px solid #e2e8f0;
            padding-top: 40px;
        }

        .ideas-faq-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 24px;
        }

        .faq-accordion-item {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            margin-bottom: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-accordion-item:hover {
            border-color: #ab0e00;
            box-shadow: 0 4px 12px rgba(171, 14, 0, 0.03);
        }

        .faq-header {
            padding: 20px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 600;
            color: #0f172a;
            user-select: none;
            gap: 16px;
        }

        .faq-icon {
            font-size: 0.9rem;
            color: #64748b;
            transition: transform 0.3s ease;
        }

        .faq-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .faq-content {
            padding: 0 24px 20px 24px;
            color: #475569;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .faq-accordion-item.active {
            border-color: #ab0e00;
            background: #fdf2f2;
        }

        .faq-accordion-item.active .faq-icon {
            transform: rotate(180deg);
            color: #ab0e00;
        }

        /* Share bar */
        .article-share-bar {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-top: 40px;
            padding-top: 24px;
            border-top: 1px solid #f1f5f9;
        }

        .share-label {
            font-weight: 600;
            color: #475569;
            font-size: 0.95rem;
        }

        .share-buttons {
            display: flex;
            gap: 12px;
        }

        .share-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            text-decoration: none;
            transition: opacity 0.2s, transform 0.2s;
            font-size: 1.1rem;
        }

        .share-btn:hover {
            transform: scale(1.08);
            opacity: 0.9;
        }

        .share-btn.facebook {
            background: #1877f2;
        }

        .share-btn.linkedin {
            background: #0077b5;
        }

        .share-btn.twitter {
            background: #1da1f2;
        }

        /* Sidebar Sticky & Scrollable */
        aside {
            position: sticky;
            top: 90px;
            align-self: start;
            max-height: calc(100vh - 120px);
            overflow-y: auto;
            scrollbar-width: none !important;
            /* Firefox */
            -ms-overflow-style: none !important;
            /* IE and Edge */
            transition: top 0.3s ease, max-height 0.3s ease;
        }

        aside::-webkit-scrollbar {
            width: 0 !important;
            height: 0 !important;
            display: none !important;
        }

        .sidebar-wrapper {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .sidebar-widget {
            background: #ffffff;
            border-radius: 20px;
            padding: 30px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
        }

        .widget-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 12px;
            border-bottom: 2px solid #f1f5f9;
        }

        .widget-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 40px;
            height: 2px;
            background: #ab0e00;
        }

        /* Sidebar Inputs */
        .ideas-widget-form {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .ideas-widget-form input,
        .ideas-widget-form select,
        .ideas-widget-form textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.9rem;
            font-family: inherit;
            color: #1e293b;
            background: #f8fafc;
            outline: none;
            transition: all 0.2s ease;
        }

        .ideas-widget-form input:focus,
        .ideas-widget-form select:focus,
        .ideas-widget-form textarea:focus {
            border-color: #ab0e00;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(171, 14, 0, 0.08);
        }

        .ideas-widget-form button {
            background: var(--grad-primary, linear-gradient(135deg, #8c1000, #ab0e00));
            color: #ffffff;
            border: none;
            padding: 14px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: transform 0.2s, opacity 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 8px;
        }

        .ideas-widget-form button:hover {
            opacity: 0.95;
            transform: translateY(-1px);
        }

        /* Sidebar Courses Widget styling */
        .sidebar-course-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .sidebar-course-item {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            transition: all 0.2s;
            padding: 8px;
            border-radius: 10px;
        }

        .sidebar-course-item:hover {
            background: #f8fafc;
        }

        .sidebar-course-img {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
        }

        .sidebar-course-title {
            font-size: 0.92rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 2px;
        }

        .sidebar-course-desc {
            font-size: 0.78rem;
            color: #64748b;
        }

        /* Post navigation cards */
        .post-navigation {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 40px;
        }

        @media (max-width: 576px) {
            .post-navigation {
                grid-template-columns: 1fr;
            }
        }

        .nav-card {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .nav-card-prev {
            flex-direction: row;
            text-align: left;
        }

        .nav-card-next {
            flex-direction: row-reverse;
            text-align: right;
        }

        .nav-card-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
            flex: 1;
            min-width: 0;
        }

        .nav-card-avatar-wrap {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            overflow: hidden;
            flex-shrink: 0;
            border: 1px solid #f1f5f9;
        }

        .nav-card-avatar {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .nav-card:hover .nav-card-avatar {
            transform: scale(1.08);
        }

        .nav-card:hover {
            border-color: #ab0e00;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(171, 14, 0, 0.03);
        }

        .nav-card-label {
            font-size: 0.72rem;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .nav-card-next .nav-card-label {
            justify-content: flex-end;
        }

        .nav-card-title {
            font-size: 0.85rem;
            font-weight: 700;
            color: #0f172a;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        @media (max-width: 768px) {
            .post-layout-wrapper {
                padding: 0 16px !important;
                margin-top: 90px !important;
            }
        }

        /* Dynamic Table of Contents & Gemini Summary Box Premium Styles */
        .article-interactive-tools {
            display: flex;
            flex-direction: column;
            gap: 24px;
            margin-bottom: 35px;
            padding-bottom: 24px;
            border-bottom: 1px dashed #e2e8f0;
        }

        /* Gemini AI Summary Box */
        .gemini-summary-box {
            background: linear-gradient(135deg, #fff5f5, #fffcfc);
            border: 1px solid #fee2e2;
            border-radius: 16px;
            padding: 24px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(171, 14, 0, 0.03);
            transition: all 0.3s ease;
        }

        .gemini-summary-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--clr-primary, #ab0e00);
        }

        .gemini-summary-box:hover {
            box-shadow: 0 6px 20px rgba(171, 14, 0, 0.05);
            transform: translateY(-1px);
        }

        .summary-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 12px;
        }

        .summary-title-area {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .summary-title {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 1.1rem;
            font-weight: 700;
            color: #ab0e00;
        }

        .summary-subtitle {
            font-size: 0.85rem;
            color: #7f1d1d;
            opacity: 0.85;
            font-weight: 500;
        }

        .gemini-avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            object-fit: cover;
            border: 1.5px solid var(--clr-primary, #ab0e00);
            flex-shrink: 0;
        }

        .summary-btn {
            background: var(--grad-primary, linear-gradient(135deg, #8c1000, #ab0e00));
            color: #ffffff !important;
            border: none;
            padding: 10px 20px;
            border-radius: 99px;
            font-family: inherit;
            font-weight: 700;
            font-size: 0.88rem;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 10px rgba(171, 14, 0, 0.15);
            transition: all 0.2s ease;
            text-decoration: none !important;
        }

        .summary-btn:hover {
            opacity: 0.95;
            transform: translateY(-1px);
            box-shadow: 0 6px 14px rgba(171, 14, 0, 0.25);
        }

        .summary-btn:active {
            transform: translateY(0);
        }

        .summary-btn:disabled {
            cursor: not-allowed;
            opacity: 0.9;
            box-shadow: none;
            transform: none !important;
        }

        .summary-btn i {
            font-size: 0.85rem;
        }

        /* Result container styling */
        .summary-result-content {
            font-size: 0.95rem;
            line-height: 1.6;
            color: #334155;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid rgba(254, 226, 226, 0.8);
            animation: fadeInSummary 0.5s ease-out forwards;
        }

        @keyframes fadeInSummary {
            from {
                opacity: 0;
                transform: translateY(5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .summary-result-content ul {
            margin: 0;
            padding-left: 20px;
            list-style-type: disc !important;
        }

        .summary-result-content li {
            margin-bottom: 8px;
            display: list-item !important;
        }

        .summary-result-content li::marker {
            color: #ab0e00;
        }

        .summary-result-content strong {
            color: #0f172a;
        }

        .summary-result-content a {
            color: #ab0e00;
            text-decoration: none;
            font-weight: 700;
            border-bottom: 1.5px dashed rgba(171, 14, 0, 0.3);
            transition: all 0.2s ease;
        }

        .summary-result-content a:hover {
            color: var(--clr-primary, #ab0e00);
            border-bottom-color: var(--clr-primary, #ab0e00);
        }

        /* Loading Shimmer Animation */
        .summary-shimmer {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid rgba(254, 226, 226, 0.8);
        }

        .shimmer-line {
            height: 14px;
            background: linear-gradient(90deg, #f3f4f6 25%, #e5e7eb 50%, #f3f4f6 75%);
            background-size: 200% 100%;
            animation: loading-shimmer 1.5s infinite linear;
            border-radius: 4px;
        }

        .shimmer-line:nth-child(1) {
            width: 90%;
        }

        .shimmer-line:nth-child(2) {
            width: 75%;
        }

        .shimmer-line:nth-child(3) {
            width: 85%;
        }

        .shimmer-line:nth-child(4) {
            width: 60%;
        }

        @keyframes loading-shimmer {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        .summary-error-notice {
            background: #fef2f2;
            border: 1px solid #fee2e2;
            color: #991b1b;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 0.88rem;
            margin-top: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Dynamic Table of Contents Box */
        .toc-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-left: 4px solid #ab0e00;
            border-radius: 12px;
            padding: 20px 24px;
            transition: all 0.3s ease;
        }

        .toc-box:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
            border-color: #cbd5e1;
            border-left-color: #ab0e00;
        }

        .toc-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            user-select: none;
        }

        .toc-title-area {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            color: #0f172a;
            font-size: 1.05rem;
        }

        .toc-title-area i {
            color: #ab0e00;
        }

        .toc-toggle-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: #64748b;
            padding: 4px;
            font-size: 0.9rem;
            transition: transform 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .toc-box.collapsed .toc-toggle-btn {
            transform: rotate(-90deg);
        }

        .toc-body {
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid #e2e8f0;
            transition: max-height 0.3s ease-out, opacity 0.2s ease-out;
            max-height: 1000px;
            opacity: 1;
            overflow: hidden;
        }

        .toc-box.collapsed .toc-body {
            max-height: 0;
            opacity: 0;
            padding-top: 0;
            margin-top: 0;
            border-top: none;
        }

        #toc-list {
            margin: 0;
            padding: 0;
            list-style: none !important;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        #toc-list li {
            margin: 0;
            padding: 0;
            display: block !important;
        }

        #toc-list a {
            color: #475569;
            text-decoration: none;
            font-size: 0.92rem;
            font-weight: 500;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: flex-start;
            gap: 8px;
            line-height: 1.4;
        }

        #toc-list a:hover {
            color: #ab0e00;
            transform: translateX(4px);
        }

        /* Hierarchy indentation styling */
        #toc-list .toc-h2 {
            font-weight: 600;
        }

        #toc-list .toc-h3 {
            padding-left: 20px;
            font-size: 0.88rem;
        }

        #toc-list .toc-h3 a {
            font-size: 0.88rem;
            color: #64748b;
        }

        #toc-list .toc-h3 a:hover {
            color: #ab0e00;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>


    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>

                    <!-- Main Layout Container -->
                    <div class="post-layout-wrapper">

                        <!-- Main Content Area -->
                        <main>
                            <!-- Hero Header Card -->
                            <article class="article-hero">
                                <div class="article-breadcrumbs">
                                    <a href="<?php echo esc_url(home_url('/')); ?>"><svg class="svg-icon fa-house fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg> <?php echo $is_en ? 'Home' : 'Trang chủ'; ?></a>
                                    <svg class="svg-icon fa-chevron-right fa-solid" style="font-size: 0.65rem;" viewBox="0 0 320 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                                    <?php
                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        $cat = $categories[0];
                                        echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '">' . esc_html($cat->name) . '</a>';
                                        echo '<svg class="svg-icon fa-chevron-right fa-solid" style="font-size: 0.65rem;" viewBox="0 0 320 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>';
                                    }
                                    ?>
                                    <span><?php the_title(); ?></span>
                                </div>

                                <span class="article-category-badge">
                                    <?php the_category(', '); ?>
                                </span>

                                <h1 class="article-main-title"><?php the_title(); ?></h1>
            <div class="verify-slogan">
                <?php echo $is_en ? '"Original Knowledge - Localized Mentorship"' : '"Tri thức Nguyên bản - Đồng hành Bản địa"'; ?>
            </div>


                                <div class="article-meta-row">
                                    <div class="meta-info-item">
                                        <svg class="svg-icon fa-calendar-days fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/></svg>
                                        <span><?php echo get_the_date('d/m/Y'); ?></span>
                                    </div>

                                    <div class="meta-info-item">
                                        <svg class="svg-icon fa-clock fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                                        <?php
                                        $post_content = get_the_content();
                                        $word_count = str_word_count(strip_tags($post_content));
                                        $reading_time = ceil($word_count / 200);
                                        if ($reading_time < 1)
                                            $reading_time = 1;
                                        ?>
                                        <span><?php echo $reading_time; ?> <?php echo $is_en ? 'min read' : 'phút đọc'; ?></span>
                                    </div>

                                    <div class="meta-info-item">
                                        <svg class="svg-icon fa-eye fa-regular" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                                        <span><?php echo number_format(ideas_get_post_views(get_the_ID())); ?> <?php echo $is_en ? 'views' : 'lượt xem'; ?></span>
                                    </div>
                                </div>

                                <!-- Featured Cover Image / Ảnh bìa -->
                                <div class="article-featured-image skeleton">
                                    <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
                                        onload="this.parentElement.classList.remove('skeleton')" />
                                </div>
                            </article>

                            <!-- Main Content Card -->
                            <div class="article-content-card">
                                <!-- Gemini AI Summary & Table of Contents Area -->
                                <div class="article-interactive-tools">
                                    <!-- Dynamic Table of Contents -->
                                    <div class="toc-box" id="dynamic-toc-container" style="display: none;">
                                        <div class="toc-header" id="toc-header-toggle">
                                            <div class="toc-title-area">
                                                <svg class="svg-icon fa-list-ul fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M64 144a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L192 64zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zM64 464a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm48-208a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z"/></svg>
                                                <span><?php echo $is_en ? 'Table of Contents' : 'Mục lục bài viết'; ?></span>
                                            </div>
                                            <button class="toc-toggle-btn" aria-label="Toggle TOC">
                                                <svg class="svg-icon fa-chevron-down fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                                            </button>
                                        </div>
                                        <div class="toc-body">
                                            <ul id="toc-list"></ul>
                                        </div>
                                    </div>

                                    <!-- Gemini AI Summary Box -->
                                    <div class="gemini-summary-box">
                                        <div class="summary-header">
                                            <div class="summary-title-area">
                                                <div class="summary-title">
                                                    <img src="/wp-content/uploads/external-migrated/angry_icon_d339ae28.webp" alt="AI Avatar"
                                                        class="gemini-avatar" />
                                                    <span><?php echo $is_en ? 'AI Content Summary' : 'Tóm tắt nhanh nội dung'; ?></span>
                                                </div>
                                                <div class="summary-subtitle"><?php echo $is_en ? 'No time to read the full article? Try this!' : 'Bạn không có thời gian đọc hết? Hãy thử!'; ?></div>
                                            </div>
                                            <button id="btn-gemini-summarize" class="summary-btn" data-post-id="<?php the_ID(); ?>">
                                                <span><?php echo $is_en ? 'Summarize with AI' : 'Tóm tắt bằng AI'; ?></span>
                                                <svg class="svg-icon fa-bolt fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288l111.5 0L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7l-111.5 0L349.4 44.6z"/></svg>
                                            </button>
                                        </div>
                                        <div id="gemini-summary-result" class="summary-result-content" style="display: none;"></div>
                                    </div>
                                </div>

                                <div class="article-body-content">
                                    <?php
                                    // Render content, and automatically strip duplicate of the first image inline if it matches featured image
                                    $content_html = apply_filters('the_content', get_the_content());

                                    // Simple regex replacement to omit the first duplicate image from the body layout
                                    if ($featured_image) {
                                        $escaped_img = preg_quote($featured_image, '/');
                                        // Remove figure or image block containing this exact url
                                        $content_html = preg_replace('/<figure[^>]*>\s*<img[^>]+src="' . $escaped_img . '"[^>]*>\s*<\/figure>/i', '', $content_html, 1);
                                        $content_html = preg_replace('/<img[^>]+src="' . $escaped_img . '"[^>]*>/i', '', $content_html, 1);
                                    }

                                    // Strip leftover raw ultimate post kit (ultp) plugin icon strings
                                    $content_html = preg_replace('/_ultp_aci_ic_[a-zA-Z0-9_]+?_ultp_aci_ic_end_/i', '', $content_html);

                                    echo $content_html;
                                    ?>
                                </div>

                                <!-- Share Section -->
                                <div class="article-share-bar">
                                    <span class="share-label"><?php echo $is_en ? 'Share this article:' : 'Chia sẻ bài viết:'; ?></span>
                                    <div class="share-buttons">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_permalink()); ?>"
                                            target="_blank" class="share-btn facebook" aria-label="Chia sẻ bài viết lên Facebook"><svg class="svg-icon fa-facebook-f fa-brands" viewBox="0 0 320 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg></a>
                                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo esc_url(get_permalink()); ?>"
                                            target="_blank" class="share-btn linkedin" aria-label="Chia sẻ bài viết lên LinkedIn"><svg class="svg-icon fa-linkedin-in fa-brands" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/></svg></a>
                                        <a href="https://twitter.com/intent/tweet?url=<?php echo esc_url(get_permalink()); ?>"
                                            target="_blank" class="share-btn twitter" aria-label="Chia sẻ bài viết lên Twitter"><svg class="svg-icon fa-x-twitter fa-brands" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg></a>
                                    </div>
                                </div>

                                <!-- Post Navigation Links -->
                                <div class="post-navigation">
                                    <?php
                                    $prev_post = get_previous_post();
                                    if (!empty($prev_post)):
                                        $prev_img = get_the_post_thumbnail_url($prev_post->ID, 'thumbnail');
                                        if (!$prev_img) {
                                            $prev_content = get_post_field('post_content', $prev_post->ID);
                                            preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $prev_content, $matches_prev);
                                            $prev_img = isset($matches_prev[1][0]) ? $matches_prev[1][0] : 'https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg-optimized.webp';
                                        }
                                        ?>
                                            <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="nav-card nav-card-prev">
                                                <div class="nav-card-avatar-wrap skeleton">
                                                    <img src="<?php echo esc_url($prev_img); ?>" alt="" class="nav-card-avatar" onload="this.parentElement.classList.remove('skeleton')">
                                                </div>
                                                <div class="nav-card-info">
                                                    <span class="nav-card-label"><svg class="svg-icon fa-arrow-left fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg> <?php echo $is_en ? 'Previous Post' : 'Bài trước đó'; ?></span>
                                                    <span class="nav-card-title"><?php echo esc_html(get_the_title($prev_post->ID)); ?></span>
                                                </div>
                                            </a>
                                    <?php else: ?>
                                            <div></div>
                                    <?php endif; ?>

                                    <?php
                                    $next_post = get_next_post();
                                    if (!empty($next_post)):
                                        $next_img = get_the_post_thumbnail_url($next_post->ID, 'thumbnail');
                                        if (!$next_img) {
                                            $next_content = get_post_field('post_content', $next_post->ID);
                                            preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $next_content, $matches_next);
                                            $next_img = isset($matches_next[1][0]) ? $matches_next[1][0] : 'https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg-optimized.webp';
                                        }
                                        ?>
                                            <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="nav-card nav-card-next">
                                                <div class="nav-card-avatar-wrap skeleton">
                                                    <img src="<?php echo esc_url($next_img); ?>" alt="" class="nav-card-avatar" onload="this.parentElement.classList.remove('skeleton')">
                                                </div>
                                                <div class="nav-card-info">
                                                    <span class="nav-card-label"><?php echo $is_en ? 'Next Post' : 'Bài tiếp theo'; ?> <svg class="svg-icon fa-arrow-right fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg></span>
                                                    <span class="nav-card-title"><?php echo esc_html(get_the_title($next_post->ID)); ?></span>
                                                </div>
                                            </a>
                                    <?php else: ?>
                                            <div></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </main>

                        <!-- Sidebar Widgets Area -->
                        <aside data-lenis-prevent>
                            <div class="sidebar-wrapper">

                                <!-- Quick Register Consultation Widget -->
                                <div class="sidebar-widget">
                                    <h3 class="widget-title"><?php echo $is_en ? 'Register for Roadmap Counseling' : 'Đăng ký tư vấn lộ trình'; ?></h3>
                                    <form class="ideas-widget-form">
                                        <input type="text" placeholder="<?php echo $is_en ? 'Your full name' : 'Họ và tên của bạn'; ?>" aria-label="<?php echo $is_en ? 'Full Name' : 'Họ và tên'; ?>" required>
                                        <input type="email" placeholder="<?php echo $is_en ? 'Email Address' : 'Địa chỉ Email'; ?>" aria-label="<?php echo $is_en ? 'Email Address' : 'Địa chỉ Email'; ?>" required>
                                        <input type="tel" placeholder="<?php echo $is_en ? 'Phone Number' : 'Số điện thoại'; ?>" aria-label="<?php echo $is_en ? 'Phone Number' : 'Số điện thoại'; ?>" required>
                                        <select aria-label="<?php echo $is_en ? 'Program of Interest' : 'Chương trình quan tâm'; ?>" required>
                                            <option value="" disabled selected hidden><?php echo $is_en ? 'Program of Interest' : 'Chương trình quan tâm'; ?></option>
                                            <option value="Top-up BBA"><?php echo $is_en ? 'Top-up BBA (12-month Bachelor Top-up)' : 'Top-up BBA (Cử nhân liên thông 12 tháng)'; ?></option>
                                            <option value="Full BBA">Global Online BBA</option>
                                            <option value="Online MBA"><?php echo $is_en ? 'Online MBA (Master of Business Administration)' : 'Online MBA (Thạc sĩ QTKD)'; ?></option>
                                            <option value="Executive MBA"><?php echo $is_en ? 'Executive MBA' : 'Executive MBA (Thạc sĩ điều hành)'; ?></option>
                                            <option value="MBA in AI"><?php echo $is_en ? 'MBA in AI' : 'MBA in AI (Thạc sĩ QTKD Ứng dụng AI)'; ?></option>
                                            <option value="MSc AI"><?php echo $is_en ? 'MSc AI' : 'MSc AI (Thạc sĩ AI ứng dụng)'; ?></option>
                                            <option value="Dual DBA"><?php echo $is_en ? 'Dual DBA (UK &amp; France Doctor of Business Administration)' : 'Dual DBA (Tiến sĩ song bằng Pháp &amp; Anh)'; ?></option>
                                        </select>
                                        <textarea rows="3" placeholder="<?php echo $is_en ? 'Notes on your experience, requirements...' : 'Ghi chú về kinh nghiệm, nhu cầu của bạn...'; ?>" aria-label="<?php echo $is_en ? 'Additional notes' : 'Ghi chú thêm'; ?>"></textarea>
                                        <button type="submit"><svg class="svg-icon fa-paper-plane fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480l0-83.6c0-4 1.5-7.8 4.2-10.8L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z"/></svg> <?php echo $is_en ? 'Register Now' : 'Đăng ký ngay'; ?></button>
                                    </form>
                                </div>

                                <!-- Standalone IDEAS Reel Promo Card Widget -->
                                <div class="sidebar-widget reel-sidebar-promo-widget" style="padding: 0; background: transparent; border: none; box-shadow: none; margin-top: 0 !important; margin-bottom: 0 !important;">
                                    <a href="<?php echo home_url('/reel'); ?>" class="reel-promo-card" style="margin: 0 !important;">
                                        <div class="reel-promo-icon">
                                            <svg class="svg-icon fa-play fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80L0 432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"/></svg>
                                        </div>
                                        <div class="reel-promo-info">
                                            <div class="reel-promo-tag"><?php echo $is_en ? 'NEW DISCOVERY' : 'MỚI KHÁM PHÁ'; ?></div>
                                            <span class="reel-promo-link">
                                                <?php echo $is_en ? 'Explore IDEAS Reel Counseling' : 'Khám phá IDEAS Reel Tư vấn'; ?> <svg class="svg-icon fa-chevron-right fa-solid" viewBox="0 0 320 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                                            </span>
                                        </div>
                                    </a>
                                </div>

                                <!-- Recent Posts Widget -->
                                <div class="sidebar-widget">
                                    <h3 class="widget-title"><?php echo $is_en ? 'Recent Posts' : 'Bài viết gần đây'; ?></h3>
                                    <div class="sidebar-course-list">
                                        <?php
                                        $recent_posts = new WP_Query(array(
                                            'posts_per_page' => 3,
                                            'post__not_in' => array($post_id),
                                            'post_status' => 'publish'
                                        ));

                                        if ($recent_posts->have_posts()):
                                            while ($recent_posts->have_posts()):
                                                $recent_posts->the_post();
                                                $recent_img = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                                                if (!$recent_img) {
                                                    $recent_content = get_the_content();
                                                    preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $recent_content, $matches_r);
                                                    $recent_img = isset($matches_r[1][0]) ? $matches_r[1][0] : 'https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg-optimized.webp';
                                                }
                                                ?>
                                                        <a href="<?php the_permalink(); ?>" class="sidebar-course-item">
                                                            <div class="sidebar-course-img-wrap skeleton"
                                                                style="width: 60px; height: 60px; border-radius: 8px; overflow: hidden; flex-shrink: 0;">
                                                                <img src="<?php echo esc_url($recent_img); ?>" alt="<?php the_title_attribute(); ?>"
                                                                    class="sidebar-course-img" style="width: 100%; height: 100%;"
                                                                    onload="this.parentElement.classList.remove('skeleton')">
                                                            </div>
                                                            <div>
                                                                <h4 class="sidebar-course-title" style="font-size: 0.88rem; line-height: 1.3;">
                                                                    <?php the_title(); ?></h4>
                                                                <p class="sidebar-course-desc"
                                                                    style="font-size: 0.75rem; color: #64748b; margin-top: 2px;">
                                                                    <?php echo get_the_date('d/m/Y'); ?></p>
                                                            </div>
                                                        </a>
                                                        <?php
                                            endwhile;
                                            wp_reset_postdata();
                                        endif;
                                        ?>
                                    </div>
                                </div>

                                <!-- Suggested Programs Widget -->
                                <div class="sidebar-widget">
                                    <h3 class="widget-title"><?php echo $is_en ? 'Academic Programs' : 'Chương trình đào tạo'; ?></h3>
                                    <div class="sidebar-course-list">
                                        <a href="<?php echo $is_en ? '/en/bba' : '/bba'; ?>" class="sidebar-course-item">
                                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/02/TOPUP-optimized.webp" alt="Top-up BBA"
                                                class="sidebar-course-img">
                                            <div>
                                                <h4 class="sidebar-course-title">Top-up BBA</h4><p class="sidebar-course-desc"><?php echo $is_en ? '12-month Bachelor Top-up' : 'Liên thông Cử nhân 12 tháng'; ?></p>
                                            </div>
                                        </a>
                                        <a href="<?php echo $is_en ? '/en/fullbba' : '/fullbba'; ?>" class="sidebar-course-item">
                                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/online_bba-optimized.webp"
                                                alt="Global Online BBA" class="sidebar-course-img">
                                            <div>
                                                <h4 class="sidebar-course-title">Global Online BBA</h4><p class="sidebar-course-desc"><?php echo $is_en ? 'International BBA' : 'Cử nhân QTKD Quốc tế'; ?></p>
                                            </div>
                                        </a>
                                        <a href="<?php echo $is_en ? '/en/mba' : '/mba'; ?>" class="sidebar-course-item">
                                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/07/6.webp"
                                                alt="Online MBA" class="sidebar-course-img">
                                            <div>
                                                <h4 class="sidebar-course-title">Online MBA</h4><p class="sidebar-course-desc"><?php echo $is_en ? 'Online MBA' : 'Thạc sĩ QTKD Trực tuyến'; ?></p>
                                            </div>
                                        </a>
                                        <a href="<?php echo $is_en ? '/en/emba' : '/emba'; ?>" class="sidebar-course-item">
                                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/07/7.webp" alt="Executive MBA"
                                                class="sidebar-course-img">
                                            <div>
                                                <h4 class="sidebar-course-title">Executive MBA</h4><p class="sidebar-course-desc"><?php echo $is_en ? 'Executive MBA' : 'Thạc sĩ điều hành QTKD'; ?></p>
                                            </div>
                                        </a>
                                        <a href="<?php echo $is_en ? '/en/mbainai' : '/mbainai'; ?>" class="sidebar-course-item">
                                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/MBA-in-AI.png"
                                                alt="MBA in AI" class="sidebar-course-img">
                                            <div>
                                                <h4 class="sidebar-course-title">MBA in AI</h4><p class="sidebar-course-desc"><?php echo $is_en ? 'MBA in Applied AI' : 'Thạc sĩ QTKD Ứng dụng AI'; ?></p>
                                            </div>
                                        </a>
                                        <a href="<?php echo $is_en ? '/en/mscai' : '/mscai'; ?>" class="sidebar-course-item">
                                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/07/8.webp" alt="MSc AI"
                                                class="sidebar-course-img">
                                            <div>
                                                <h4 class="sidebar-course-title">Master AI (MSc AI)</h4><p class="sidebar-course-desc"><?php echo $is_en ? 'Applied MSc AI' : 'Thạc sĩ AI ứng dụng'; ?></p>
                                            </div>
                                        </a>
                                        <a href="<?php echo $is_en ? '/en/dual-dba' : '/dual-dba'; ?>" class="sidebar-course-item">
                                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/10/Dual-DBA-optimized.webp" alt="Dual DBA"
                                                class="sidebar-course-img">
                                            <div>
                                                <h4 class="sidebar-course-title">Dual DBA</h4><p class="sidebar-course-desc"><?php echo $is_en ? 'Dual DBA (France &amp; UK)' : 'Tiến sĩ song bằng Pháp &amp; Anh'; ?></p>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </aside>

                    </div>

            <?php endwhile; endif; ?>

    <!-- Site JS script (for mobile menu toggles and dropdown behaviors) -->
    <?php
    $js_path = get_stylesheet_directory() . '/common-assets/js/script.min.js';
    $js_version = file_exists($js_path) ? filemtime($js_path) : time();
    ?>
    <script
        src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/script.min.js?v=<?php echo $js_version; ?>"
        defer></script>

    <!-- FAQ Accordion Script -->
    <script>
        if (typeof isEnMode === 'undefined') { var isEnMode = <?php echo $is_en ? 'true' : 'false'; ?>; }
        document.addEventListener('DOMContentLoaded', () => {
            const faqItems = document.querySelectorAll('.faq-accordion-item');

            faqItems.forEach(item => {
                const header = item.querySelector('.faq-header');
                const body = item.querySelector('.faq-body');
                const content = item.querySelector('.faq-content');

                header.addEventListener('click', () => {
                    const isActive = item.classList.contains('active');

                    // Close all active items
                    faqItems.forEach(el => {
                        el.classList.remove('active');
                        el.querySelector('.faq-body').style.maxHeight = null;
                    });

                    if (!isActive) {
                        item.classList.add('active');
                        body.style.maxHeight = content.offsetHeight + 'px';
                    }
                });
            });
        });
    </script>

    <!-- Dynamic Table of Contents & Gemini AI Summary Script -->
    <script>
        if (typeof isEnMode === 'undefined') { var isEnMode = <?php echo $is_en ? 'true' : 'false'; ?>; }
        document.addEventListener('DOMContentLoaded', () => {
            // --- 1. Dynamic Table of Contents (TOC) ---
            const articleBody = document.querySelector('.article-body-content');
            const tocContainer = document.getElementById('dynamic-toc-container');
            const tocList = document.getElementById('toc-list');
            const tocHeaderToggle = document.getElementById('toc-header-toggle');

            if (articleBody && tocContainer && tocList) {
                // Find all H2 and H3 elements inside the article body content
                const headings = articleBody.querySelectorAll('h2, h3');

                if (headings.length > 0) {
                    let h2Count = 0;
                    let h3Count = 0;
                    headings.forEach((heading, index) => {
                        // Generate a clean ID for the heading if it doesn't have one
                        if (!heading.id) {
                            const cleanText = heading.textContent
                                .toLowerCase()
                                .trim()
                                .normalize('NFD') // Remove Vietnamese diacritics
                                .replace(/[\u0300-\u036f]/g, '')
                                .replace(/[đĐ]/g, 'd')
                                .replace(/[^a-z0-9\s-]/g, '') // remove special chars
                                .replace(/\s+/g, '-') // replace spaces with dashes
                                .replace(/-+/g, '-'); // remove double dashes

                            heading.id = `heading-${cleanText || index}`;
                        }

                        // Determine the prefix number (e.g. 1. or 1.1)
                        let prefix = '';
                        if (heading.tagName.toLowerCase() === 'h2') {
                            h2Count++;
                            h3Count = 0;
                            prefix = `${h2Count}. `;
                        } else if (heading.tagName.toLowerCase() === 'h3') {
                            h3Count++;
                            prefix = `${h2Count}.${h3Count}. `;
                        }

                        // Create list item and link
                        const li = document.createElement('li');
                        li.className = heading.tagName.toLowerCase() === 'h2' ? 'toc-h2' : 'toc-h3';

                        const a = document.createElement('a');
                        a.href = `#${heading.id}`;
                        a.textContent = prefix + heading.textContent;

                        // Add smooth scrolling behavior
                        a.addEventListener('click', (e) => {
                            e.preventDefault();
                            const targetElement = document.getElementById(heading.id);
                            if (targetElement) {
                                const headerOffset = 100; // Offset for sticky website header
                                const elementPosition = targetElement.getBoundingClientRect().top;
                                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                                if (window.lenis) {
                                    window.lenis.scrollTo(targetElement, {
                                        offset: -100,
                                        duration: 1.2,
                                        immediate: false
                                    });
                                } else {
                                    window.scrollTo({
                                        top: offsetPosition,
                                        behavior: 'smooth'
                                    });
                                }

                                // Push hash history quietly without jumps
                                history.pushState(null, null, `#${heading.id}`);
                            }
                        });

                        li.appendChild(a);
                        tocList.appendChild(li);
                    });

                    // Reveal TOC container since we have headings
                    tocContainer.style.display = 'block';

                    // Implement collapse/expand toggle
                    if (tocHeaderToggle) {
                        const tocBox = tocContainer;
                        tocHeaderToggle.addEventListener('click', () => {
                            tocBox.classList.toggle('collapsed');
                        });
                    }
                }
            }

            // --- 2. Gemini AI Summary Button Handler ---
            const btnSummarize = document.getElementById('btn-gemini-summarize');
            const summaryResult = document.getElementById('gemini-summary-result');

            if (btnSummarize && summaryResult) {
                const postId = btnSummarize.getAttribute('data-post-id');
                const storageKey = `ideas_post_summary_${postId}`;

                // Check if summary is cached in localStorage
                const cachedSummary = localStorage.getItem(storageKey);
                if (cachedSummary) {
                    summaryResult.innerHTML = cachedSummary;
                    summaryResult.style.display = 'block';
                    btnSummarize.innerHTML = `<span>${isEnMode ? 'AI Summarized' : 'Đã tóm tắt bằng AI'}</span><svg class="svg-icon fa-check fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>`;
                    btnSummarize.style.background = 'linear-gradient(135deg, #10b981, #059669)'; // Green success
                    btnSummarize.disabled = true;
                }

                btnSummarize.addEventListener('click', function (e) {
                    e.preventDefault();

                    if (!postId) return;

                    // Disable button and update UI state
                    btnSummarize.disabled = true;
                    const originalBtnContent = '<span><?php echo $is_en ? 'Summarize with AI' : 'Tóm tắt bằng AI'; ?></span><svg class="svg-icon fa-bolt fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M349.4 44.6c5.9-13.7 1.5-29.7-10.6-38.5s-28.6-8-39.9 1.8l-256 224c-10 8.8-13.6 22.9-8.9 35.3S50.7 288 64 288l111.5 0L98.6 467.4c-5.9 13.7-1.5 29.7 10.6 38.5s28.6 8 39.9-1.8l256-224c10-8.8 13.6-22.9 8.9-35.3s-16.6-20.7-30-20.7l-111.5 0L349.4 44.6z"/></svg>';
                    btnSummarize.innerHTML = `<span>${isEnMode ? 'Analyzing...' : 'Đang phân tích...'}</span><svg class="svg-icon fa-spinner fa-solid fa-spin" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/></svg>`;
                    btnSummarize.style.background = ''; // reset to default red gradient while loading

                    // Inject loading shimmer animation
                    summaryResult.innerHTML = `
                        <div class="summary-shimmer">
                            <div class="shimmer-line"></div>
                            <div class="shimmer-line"></div>
                            <div class="shimmer-line"></div>
                            <div class="shimmer-line"></div>
                        </div>
                    `;
                    summaryResult.style.display = 'block';

                    // Build form data
                    const formData = new FormData();
                    formData.append('action', 'ideas_summarize_post');
                    formData.append('post_id', postId);

                    // Fetch request to WordPress admin-ajax.php
                    fetch('/wp-admin/admin-ajax.php', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.json())
                        .then(res => {
                            if (res.success) {
                                // Cache the result in localStorage
                                localStorage.setItem(storageKey, res.data);

                                // Render AI summary list
                                summaryResult.innerHTML = res.data;
                                btnSummarize.innerHTML = `<span>${isEnMode ? 'Summary Complete!' : 'Tóm tắt thành công!'}</span><svg class="svg-icon fa-check fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>`;
                                btnSummarize.style.background = 'linear-gradient(135deg, #10b981, #059669)'; // Green success

                                // Change text to "Đã tóm tắt bằng AI" after 2 seconds but keep disabled
                                setTimeout(() => {
                                    btnSummarize.innerHTML = `<span>${isEnMode ? 'AI Summarized' : 'Đã tóm tắt bằng AI'}</span><svg class="svg-icon fa-check fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>`;
                                }, 2000);
                            } else {
                                // Render API error message
                                showError(res.data || (isEnMode ? 'An unknown error occurred.' : 'Đã xảy ra lỗi không xác định.'));
                                resetButton();
                            }
                        })
                        .catch(err => {
                            console.error('Gemini Summary Request Error:', err);
                            showError(isEnMode ? 'Could not connect to the server. Please check your connection.' : 'Không thể kết nối tới máy chủ. Vui lòng kiểm tra lại kết nối.');
                            resetButton();
                        });

                    function showError(message) {
                        summaryResult.innerHTML = `
                            <div class="summary-error-notice">
                                <svg class="svg-icon fa-circle-exclamation fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
                                <span>${message}</span>
                            </div>
                        `;
                    }

                    function resetButton() {
                        btnSummarize.disabled = false;
                        btnSummarize.innerHTML = originalBtnContent;
                        btnSummarize.style.background = ''; // Revert to stylesheet default
                    }
                });
            }
        });
    </script>

    <!-- Handle Sidebar Sticky Offset dynamically on scroll based on header visibility -->
    <script>
        let lastScrollTop = 0;
        window.addEventListener('scroll', () => {
            const asideEl = document.querySelector('aside');
            const header = document.getElementById('site-header');
            if (!asideEl) return;

            let st = window.pageYOffset || document.documentElement.scrollTop;
            let headerHidden = false;

            if (header) {
                if (header.classList.contains('nav-up') || header.classList.contains('hidden')) {
                    headerHidden = true;
                } else {
                    const rect = header.getBoundingClientRect();
                    if (rect.bottom <= 0) {
                        headerHidden = true;
                    }
                }
            } else {
                if (st > lastScrollTop && st > 150) {
                    headerHidden = true;
                } else if (st < lastScrollTop) {
                    headerHidden = false;
                }
            }

            if (headerHidden) {
                asideEl.style.top = '20px';
                asideEl.style.maxHeight = 'calc(100vh - 40px)';
            } else {
                asideEl.style.top = '90px';
                asideEl.style.maxHeight = 'calc(100vh - 120px)';
            }

            lastScrollTop = st <= 0 ? 0 : st;
        }, { passive: true });

        // Sidebar inline registration form submission handler
        if (typeof isEnMode === 'undefined') { var isEnMode = <?php echo $is_en ? 'true' : 'false'; ?>; }
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.querySelector('.ideas-widget-form');
            if (!form) return;

            form.addEventListener('submit', async (e) => {
                e.preventDefault();

                const name = form.querySelector('input[type="text"]').value.trim();
                const email = form.querySelector('input[type="email"]').value.trim();
                const phone = form.querySelector('input[type="tel"]').value.trim();
                const program = form.querySelector('select').value;
                const note = form.querySelector('textarea').value.trim();

                if (!name || !email || !phone || !program) {
                    alert(isEnMode ? 'Please fill in all required fields.' : 'Vui lòng điền đầy đủ các thông tin bắt buộc.');
                    return;
                }

                let sourceVal = "Landing_Blog_Single";
                let chuongTrinhVal = program;

                // Prefill source mapping based on selected program
                if (program.startsWith("Top-up BBA")) {
                    sourceVal = "Landing_BBA_Topup";
                    chuongTrinhVal = "Online Top-up BBA";
                } else if (program.startsWith("Full BBA")) {
                    sourceVal = "Landing_BBA_Full";
                    chuongTrinhVal = "Online Full BBA";
                } else if (program.startsWith("Online MBA")) {
                    sourceVal = "Landing_MBA";
                    chuongTrinhVal = "Online MBA";
                } else if (program.startsWith("Executive MBA")) {
                    sourceVal = "Landing_EMBA";
                    chuongTrinhVal = "Online EMBA";
                } else if (program.startsWith("MBA in AI")) {
                    sourceVal = "Landing_MBA_AI";
                    chuongTrinhVal = "Online MBA in AI";
                } else if (program.startsWith("MSc AI")) {
                    sourceVal = "Landing_MSc_AI";
                    chuongTrinhVal = "Online MSc AI";
                } else if (program.startsWith("Dual DBA")) {
                    sourceVal = "Landing_Dual_DBA";
                    chuongTrinhVal = "Online Dual DBA";
                }

                const postTitle = "<?php echo esc_js(get_the_title()); ?>";

                // Core API Submission (Payload 1)
                const payload = {
                    form_id: "4fe1eeb0570742a1fdde61af6fc0680c",
                    email: email,
                    firstName: name,
                    phoneNumber: phone,
                    time_dat_lich: "",
                    note_dat_lich: note ? `Đăng ký từ bài viết "${postTitle}" - ${chuongTrinhVal} | Ghi chú: ${note}` : `Đăng ký từ bài viết "${postTitle}" - ${chuongTrinhVal}`,
                    chuong_trinh_dat_lich: chuongTrinhVal
                };

                // Webhook Submission (Payload 2)
                const webhookPayload = {
                    name: name,
                    phone: phone,
                    email: email,
                    source: sourceVal,
                    type: "tu_van_inline",
                    tieng_anh: "",
                    hoc_van: "",
                    time_dat_lich: "",
                    chuong_trinh: chuongTrinhVal,
                    nhu_cau: note ? `Đăng ký từ bài viết "${postTitle}" - ${chuongTrinhVal} | Ghi chú: ${note}` : `Đăng ký từ bài viết "${postTitle}" - ${chuongTrinhVal}`
                };

                // Bind UTM parameters
                const urlParams = new URLSearchParams(window.location.search);
                const utmParams = ['utm_campaign', 'utm_source', 'utm_medium', 'utm_content', 'utm_term'];
                utmParams.forEach(param => {
                    const val = urlParams.get(param);
                    if (val) webhookPayload[param] = val;
                });

                const btn = form.querySelector('button[type="submit"]');
                const origText = btn.innerHTML;
                btn.disabled = true;
                btn.innerHTML = `<svg class="svg-icon fa-spinner fa-solid fa-spin" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/></svg> ${isEnMode ? 'Submitting...' : 'Đang gửi...'}`;

                const p1 = fetch("https://automation.ideas.edu.vn/mail_api/forms.php?route=submit", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(payload)
                });

                const p2 = fetch("https://open.domation.net/sale_data/webhook.php?token=tok_kjhbs32a", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(webhookPayload)
                });

                try {
                    await Promise.allSettled([p1, p2]);

                    // Trigger Google Ads Conversion event
                    if (typeof window.gtag === 'function') {
                        window.gtag('event', 'conversion', {
                            'send_to': 'AW-11205917800/mdXJCOTL-bccEOj4st8p',
                            'value': 1.0,
                            'currency': 'VND'
                        });
                        console.log('Google Ads Conversion Event measured.');
                    }

                    alert(isEnMode ? 'Registration successful! IDEAS will contact you soon.' : 'Đăng ký tư vấn thành công! IDEAS sẽ sớm liên hệ với bạn.');
                    form.reset();
                } catch (err) {
                    console.error('Submission failed:', err);
                    alert(isEnMode ? 'An error occurred during registration. Please contact the hotline.' : 'Đã xảy ra sự cố khi đăng ký. Vui lòng liên hệ hotline.');
                } finally {
                    btn.disabled = false;
                    btn.innerHTML = origText;
                }
            });
        });
    </script>
    <?php get_footer(); ?>