<!DOCTYPE html>
<html lang="<?php
$is_en = (isset($_GET['lang']) && $_GET['lang'] === 'en'); echo $is_en ? 'en' : 'vi'; ?>" prefix="og: https://ogp.me/ns#">
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
    <!-- Preload LCP hero background image -->
    <link rel="preload" fetchpriority="high" as="image" href="https://ideas.edu.vn/wp-content/uploads/2025/11/ltnumef10202501.webp" />
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php single_post_title(); ?> | <?php bloginfo('name'); ?></title>
    <?php endif; ?>
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />
    
    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" / media="print" onload="this.media='all'">
    
    <!-- Link the main minified style.css -->
    <?php 
    $css_path = get_stylesheet_directory() . '/common-assets/css/style.min.css';
    $css_version = file_exists($css_path) ? filemtime($css_path) : time();
    ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/style.min.css?v=<?php echo $css_version; ?>" />
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Shared Header & Mobile Menu -->
<?php get_template_part('shared-header'); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- Premium Hero Header -->
<section class="premium-page-hero">
    <div class="premium-page-hero-overlay"></div>
    <div class="premium-page-hero-container">
        <nav class="premium-page-breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo $is_en ? 'Home' : 'Trang chủ'; ?></a> / <span><?php the_title(); ?></span>
        </nav>
        <h1 class="premium-page-title"><?php the_title(); ?></h1>
    </div>
</section>

<!-- Content Container -->
<div class="premium-page-content-wrapper">
    <article id="post-<?php the_ID(); ?>" <?php post_class('premium-page-card'); ?>>
        <div class="entry-content" itemprop="mainContentOfPage">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="premium-page-featured-img">
                    <?php the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); ?>
                </div>
            <?php endif; ?>
            
            <div class="premium-page-body">
                <?php the_content(); ?>
            </div>
            
            <div class="entry-links"><?php wp_link_pages(); ?></div>
        </div>
    </article>
</div>

<?php endwhile; endif; ?>

<style>
    /* ─── PREMIUM PAGE STYLING ─── */
    .premium-page-hero {
        position: relative;
        background-image: url('https://ideas.edu.vn/wp-content/uploads/2025/11/ltnumef10202501.webp');
        background-size: cover;
        background-position: center;
        padding: 180px 20px 100px;
        text-align: center;
        overflow: hidden;
    }
    
    .premium-page-hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(8, 12, 20, 0.75) 0%, #080c14 100%);
        z-index: 1;
    }

    .premium-page-hero-container {
        position: relative;
        z-index: 2;
        max-width: 900px;
        margin: 0 auto;
    }

    .premium-page-breadcrumbs {
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 16px;
        font-weight: 500;
        letter-spacing: 0.03em;
        text-transform: uppercase;
    }

    .premium-page-breadcrumbs a {
        color: rgba(255, 255, 255, 0.6);
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .premium-page-breadcrumbs a:hover {
        color: #ff3b30;
    }

    .premium-page-breadcrumbs span {
        color: #ff3b30;
    }

    .premium-page-title {
        font-size: clamp(2rem, 4.5vw, 2.6rem);
        font-weight: 800;
        color: #ffffff !important;
        line-height: 1.25;
        margin: 0;
        text-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
    }

    /* ─── CONTENT CARD ─── */
    .premium-page-content-wrapper {
        position: relative;
        z-index: 5;
        max-width: 960px;
        margin: -40px auto 80px;
        padding: 0 20px;
    }

    .premium-page-card {
        background: #ffffff;
        border-radius: 24px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 15px 35px rgba(15, 23, 42, 0.05);
        overflow: hidden;
    }

    .premium-page-featured-img img {
        width: 100%;
        height: auto;
        max-height: 400px;
        object-fit: cover;
        display: block;
    }

    .premium-page-body {
        padding: 50px 60px;
    }

    @media (max-width: 768px) {
        .premium-page-hero {
            padding: 150px 16px 70px;
        }
        .premium-page-content-wrapper {
            margin-top: -30px;
            margin-bottom: 50px;
        }
        .premium-page-body {
            padding: 30px 24px;
        }
    }

    /* ─── TYPOGRAPHY INSIDE CONTENT ─── */
    .premium-page-body p {
        font-size: 1.05rem;
        line-height: 1.75;
        color: #334155;
        margin-bottom: 24px;
        text-align: left;
    }

    .premium-page-body p:last-child {
        margin-bottom: 0;
    }

    .premium-page-body h2 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #0f172a !important;
        margin: 45px 0 20px;
        padding-left: 14px;
        border-left: 4px solid #ab0e00;
        line-height: 1.35;
        text-align: left;
    }

    .premium-page-body h3 {
        font-size: 1.25rem;
        font-weight: 600;
        color: #0f172a !important;
        margin: 35px 0 16px;
        line-height: 1.4;
        text-align: left;
    }

    .premium-page-body ul, 
    .premium-page-body ol {
        padding-left: 24px;
        margin-bottom: 24px;
        color: #334155;
        text-align: left;
    }

    .premium-page-body li {
        font-size: 1.02rem;
        line-height: 1.7;
        margin-bottom: 10px;
        text-align: left;
    }

    .premium-page-body a {
        color: #ab0e00;
        text-decoration: underline;
        font-weight: 600;
        transition: color 0.2s ease;
    }

    .premium-page-body a:hover {
        color: #ff3b30;
    }

    .premium-page-body strong {
        color: #0f172a;
    }

    .premium-page-body blockquote {
        margin: 30px 0;
        padding: 20px 30px;
        border-left: 4px solid #ab0e00;
        background: #f8fafc;
        border-radius: 0 16px 16px 0;
        text-align: left;
    }

    .premium-page-body blockquote p {
        font-style: italic;
        font-size: 1.1rem;
        margin-bottom: 0;
    }

    /* ─── SKYLINE IMAGE OVERRIDES ─── */
    .premium-page-body .ideas_main,
    .premium-page-body .ideas_box {
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
        max-width: none !important;
    }

    .premium-page-body .ideas_fade_bottom {
        display: block !important;
        width: calc(100% + 120px) !important;
        max-width: none !important;
        height: auto !important;
        margin-left: -60px !important;
        margin-right: -60px !important;
        margin-bottom: -50px !important;
        margin-top: 40px !important;
        opacity: 0.12 !important;
        mix-blend-mode: multiply;
        transition: opacity 0.3s ease;
    }

    @media (max-width: 768px) {
        .premium-page-body .ideas_fade_bottom {
            width: calc(100% + 48px) !important;
            margin-left: -24px !important;
            margin-right: -24px !important;
            margin-bottom: -30px !important;
            margin-top: 30px !important;
        }
    }
</style>

<?php get_footer(); ?>