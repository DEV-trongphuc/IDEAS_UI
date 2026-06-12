<?php
/**
 * The template for displaying search results pages
 */
global $wp;
global $wp_query;

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

// Block unwanted styles via output buffering
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
        href="https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp" />
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
            <title><?php echo $is_en ? 'Search Results for: ' . esc_attr(get_search_query()) . ' | ' . get_bloginfo('name') : 'Kết quả tìm kiếm cho: ' . esc_attr(get_search_query()) . ' | ' . get_bloginfo('name'); ?></title>
    <?php endif; ?>

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
            <meta name="description"
                content="<?php echo $is_en ? 'Search results for keyword ' . esc_attr(get_search_query()) . ' at IDEAS website.' : 'Kết quả tìm kiếm cho từ khóa ' . esc_attr(get_search_query()) . ' tại website IDEAS.'; ?>">
    <?php endif; ?><!-- Open Graph / Facebook -->
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
            <meta property="og:type" content="website" />
            <meta property="og:title" content="<?php echo $is_en ? 'Search Results: ' . esc_attr(get_search_query()) . ' | IDEAS' : 'Kết quả tìm kiếm: ' . esc_attr(get_search_query()) . ' | IDEAS'; ?>" />
            <meta property="og:description"
                content="<?php echo $is_en ? 'Search results for keyword ' . esc_attr(get_search_query()) . ' at IDEAS website.' : 'Kết quả tìm kiếm cho từ khóa ' . esc_attr(get_search_query()) . ' tại website IDEAS.'; ?>" />
            <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg-optimized.webp" />
            <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />
    <?php endif; ?>
    <!-- Twitter Card -->
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
            <meta name="twitter:card" content="summary_large_image" />
            <meta name="twitter:title" content="<?php echo $is_en ? 'Search Results: ' . esc_attr(get_search_query()) . ' | IDEAS' : 'Kết quả tìm kiếm: ' . esc_attr(get_search_query()) . ' | IDEAS'; ?>" />
            <meta name="twitter:description"
                content="<?php echo $is_en ? 'Search results for keyword ' . esc_attr(get_search_query()) . ' at IDEAS website.' : 'Kết quả tìm kiếm cho từ khóa ' . esc_attr(get_search_query()) . ' tại website IDEAS.'; ?>" />
            <meta name="twitter:image" content="https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg-optimized.webp" />
    <?php endif; ?><style>
        /* Prevent overflow-x from breaking sticky elements */
        html,
        body {
            overflow-x: clip !important;
        }

        /* Modern Archive UI/UX Styles */
        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }

        /* Hero Header */
        .blog-archive-hero {
            background: #0f172a;
            padding: 140px 20px 90px;
            text-align: center;
            position: relative;
            color: #ffffff;
            overflow: visible;
            border-bottom: 4px solid #ab0e00;
        }

        .hero-bg-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
            pointer-events: none;
        }

        .counters-bg {
            position: absolute;
            top: -150px;
            left: -10%;
            width: 120%;
            height: calc(100% + 300px);
            background-size: cover;
            background-position: center;
            will-change: transform;
            transform: translate3d(0, 0, 0) scale(1.15);
            z-index: 1;
            opacity: 0.85;
        }

        /* Search bar styles */
        .archive-search-form {
            max-width: 600px;
            margin: 30px auto 0;
            position: relative;
            z-index: 5;
        }

        .search-input-wrap {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 100px;
            padding: 6px 6px 6px 20px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .search-input-wrap:focus-within {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.45);
            box-shadow: 0 10px 35px rgba(171, 14, 0, 0.25);
        }

        .search-icon {
            color: rgba(255, 255, 255, 0.65);
            font-size: 1.1rem;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .search-input {
            background: transparent;
            border: none;
            outline: none;
            color: #ffffff;
            font-size: 1rem;
            width: 100%;
            padding: 8px 0;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .search-btn {
            background: var(--grad-primary, linear-gradient(135deg, #ab0e00, #ff3600));
            color: #ffffff;
            border: none;
            padding: 10px 24px;
            border-radius: 100px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .search-btn:hover {
            opacity: 0.95;
            transform: scale(1.02);
            box-shadow: 0 4px 15px rgba(171, 14, 0, 0.4);
        }

        .blog-archive-hero h1 {
            font-size: clamp(2.2rem, 5vw, 3rem);
            font-weight: 800;
            margin-bottom: 16px;
            letter-spacing: -0.02em;
            position: relative;
            z-index: 3;
            color: #ffffff;
        }

        .blog-archive-hero p {
            font-size: 1.05rem;
            color: rgba(255, 255, 255, 0.85);
            max-width: 650px;
            margin: 0 auto;
            position: relative;
            z-index: 3;
            line-height: 1.5;
        }

        /* Main layout wrapper */
        .post-layout-wrapper {
            max-width: 1320px;
            margin: 50px auto 80px;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 40px;
        }

        @media (max-width: 992px) {
            .post-layout-wrapper {
                grid-template-columns: 1fr;
                margin: 40px auto;
                gap: 30px;
            }
        }

        /* Featured Post Card Style */
        .blog-featured-card {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.03);
            display: grid;
            grid-template-columns: 1.25fr 1fr;
            overflow: hidden;
            margin-bottom: 40px;
            transition: all 0.4s ease;
            text-decoration: none;
            color: inherit;
        }

        .blog-featured-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(171, 14, 0, 0.08);
            border-color: rgba(171, 14, 0, 0.15);
        }

        .blog-featured-card .featured-img-wrap {
            position: relative;
            overflow: hidden;
            aspect-ratio: 16 / 10;
        }

        .blog-featured-card .featured-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .blog-featured-card:hover .featured-img-wrap img {
            transform: scale(1.025);
        }

        .blog-featured-card .featured-body {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        .featured-tag {
            background: #fef2f2;
            color: #ab0e00;
            padding: 6px 14px;
            border-radius: 100px;
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 16px;
        }

        .blog-featured-card h2 {
            font-size: 1.75rem;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.35;
            margin-bottom: 16px;
            transition: color 0.3s ease;
        }

        .blog-featured-card:hover h2 {
            color: #ab0e00;
        }

        .blog-featured-card p {
            color: #475569;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 24px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .blog-featured-card .meta-row {
            display: flex;
            gap: 16px;
            color: #64748b;
            font-size: 0.85rem;
        }

        /* Post Grid */
        .blog-grid-inner {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }

        .blog-card {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.02);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: all 0.4s ease;
            text-decoration: none;
            color: inherit;
        }

        .blog-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(171, 14, 0, 0.06);
            border-color: rgba(171, 14, 0, 0.15);
        }

        .blog-card .card-img-wrap {
            position: relative;
            overflow: hidden;
            aspect-ratio: 16 / 9;
            background: #f1f5f9;
        }

        .blog-card .card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .blog-card:hover .card-img-wrap img {
            transform: scale(1.03);
        }

        .blog-card .card-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .blog-card .card-tag {
            color: #ab0e00;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 12px;
        }

        .blog-card h3 {
            font-size: 1.15rem;
            font-weight: 700;
            line-height: 1.4;
            color: #0f172a;
            margin-bottom: 12px;
            transition: color 0.3s ease;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .blog-card:hover h3 {
            color: #ab0e00;
        }

        .blog-card p {
            color: #475569;
            font-size: 0.88rem;
            line-height: 1.6;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .blog-card .card-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.8rem;
            color: #64748b;
            margin-top: auto;
            border-top: 1px solid #f1f5f9;
            padding-top: 16px;
        }

        .blog-card .read-more {
            color: #ab0e00;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            transition: gap 0.2s;
        }

        .blog-card:hover .read-more {
            gap: 10px;
        }

        /* Modern Pagination */
        .blog-pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 50px;
        }

        .blog-pagination a,
        .blog-pagination span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            height: 40px;
            padding: 0 12px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            background: #ffffff;
            color: #475569;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .blog-pagination a:hover {
            border-color: #ab0e00;
            color: #ab0e00;
            transform: translateY(-1px);
        }

        .blog-pagination span.current {
            background: #ab0e00;
            border-color: #ab0e00;
            color: #ffffff;
        }

        @media (max-width: 992px) {
            .blog-featured-card {
                grid-template-columns: 1fr;
            }

            .blog-featured-card .featured-body {
                padding: 30px;
            }

            .blog-grid-inner {
                grid-template-columns: 1fr;
            }
        }

        /* Sidebar Styling */
        aside {
            position: sticky;
            top: 90px;
            align-self: start;
            max-height: calc(100vh - 120px);
            overflow-y: auto;
            scrollbar-width: none !important;
            -ms-overflow-style: none !important;
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

        /* Sidebar Form inputs */
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
            background: var(--grad-primary, linear-gradient(135deg, #ab0e00, #ff3600));
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

        @media (max-width: 768px) {
            .blog-archive-hero {
                padding: 120px 16px 50px !important;
            }

            .post-layout-wrapper {
                padding: 0 16px !important;
                margin-top: 24px !important;
            }
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php get_template_part('header-new'); // Or whatever custom header call blankslate uses ?>

    <!-- If blankslate doesn't use header-new, fallback to default header markup -->
    <?php
    // In blankslate, the header markup is typically in header.php which is loaded by default
    // Our template already contains the full premium responsive header so we do not call get_header()
    // to avoid duplicating menus and tags.
    ?>
    <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>


    <!-- Banner Hero Area -->
    <section class="blog-archive-hero">
        <div class="hero-bg-wrapper">
            <div class="counters-bg"
                style="background-image: linear-gradient(135deg, rgba(185, 14, 0, 0.92) 0%, rgba(15, 23, 42, 0.9) 100%), url('https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp');">
            </div>
        </div>
        <div class="container" style="position: relative; z-index: 3;">
            <h1><?php echo $is_en ? 'Search Results' : 'Kết quả tìm kiếm'; ?></h1>
            <p><?php echo $is_en ? 'Found ' . $wp_query->found_posts . ' articles matching keyword: "<strong>' . esc_html(get_search_query()) . '</strong>"' : 'Tìm thấy ' . $wp_query->found_posts . ' bài viết khớp với từ khóa: "<strong>' . esc_html(get_search_query()) . '</strong>"'; ?></p>

            <!-- Search bar -->
            <form role="search" method="get" class="archive-search-form"
                action="<?php echo esc_url(home_url('/index.php')); ?>">
                <div class="search-input-wrap">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>
                    <input type="search" class="search-input" placeholder="<?php echo $is_en ? 'Search articles...' : 'Tìm kiếm bài viết...'; ?>" aria-label="<?php echo $is_en ? 'Search articles' : 'Tìm kiếm bài viết'; ?>"
                        value="<?php echo get_search_query(); ?>" name="s" required />
                    <button type="submit" class="search-btn"><?php echo $is_en ? 'Search' : 'Tìm kiếm'; ?></button>
                </div>
            </form>
        </div>
    </section>

    <!-- Main Content Layout -->
    <div class="post-layout-wrapper">
        <main>
            <?php
            if (have_posts()) {
                echo '<div class="blog-grid-inner">';
                while (have_posts()):
                    the_post();
                    $post_img = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                    if (!$post_img) {
                        $content = get_the_content();
                        preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $content, $matches);
                        $post_img = isset($matches[1][0]) ? $matches[1][0] : 'https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg-optimized.webp';
                    }

                    $excerpt = get_the_excerpt();
                    if (empty($excerpt)) {
                        $excerpt = wp_strip_all_tags(wp_trim_words(get_the_content(), 22));
                    }
                    ?>
                            <a href="<?php the_permalink(); ?>" class="blog-card">
                                <div class="card-img-wrap skeleton">
                                    <img src="<?php echo esc_url($post_img); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy"
                                        onload="this.parentElement.classList.remove('skeleton')">
                                </div>
                                <div class="card-body">
                                    <?php
                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        echo '<span class="card-tag">' . esc_html($categories[0]->name) . '</span>';
                                    }
                                    ?>
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php echo esc_html($excerpt); ?></p>
                                    <div class="card-meta">
                                        <div style="display: flex; gap: 12px; align-items: center;">
                                            <span><i class="fa-regular fa-calendar-days" style="color:#ab0e00; margin-right:4px;"></i>
                                                <?php echo get_the_date('d/m/Y'); ?></span>
                                            <span><i class="fa-regular fa-eye" style="color:#ab0e00; margin-right:4px;"></i>
                                                <?php echo number_format(ideas_get_post_views(get_the_ID())); ?> <?php echo $is_en ? 'views' : 'lượt xem'; ?></span>
                                        </div>
                                        <span class="read-more"><?php echo $is_en ? 'Read More' : 'Đọc tiếp'; ?> <i class="fa-solid fa-arrow-right"></i></span>
                                    </div>
                                </div>
                            </a>
                            <?php
                endwhile;
                echo '</div>'; // End Grid
            
                // Render Modern Pagination
                $pagination_links = paginate_links(array(
                    'type' => 'array',
                    'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
                    'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
                ));

                if (!empty($pagination_links)) {
                    echo '<div class="blog-pagination">';
                    foreach ($pagination_links as $link) {
                        echo $link;
                    }
                    echo '</div>';
                }
            } else {
                ?>
                    <p style="text-align: center; padding: 60px 0; color: #64748b; font-weight: 500;"><?php echo $is_en ? 'No articles matching your keyword were found.' : 'Không tìm thấy bài viết phù hợp với từ khóa của bạn.'; ?></p>
                    <?php
            }
            ?>
        </main>

        <!-- Sidebar Section -->
        <aside data-lenis-prevent>
            <div class="sidebar-wrapper">

                <!-- Quick Register Consultation Widget (Parity with single.php) -->
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
                        <button type="submit"><i class="fa-solid fa-paper-plane"></i> <?php echo $is_en ? 'Register Now' : 'Đăng ký ngay'; ?></button>
                    </form>
                </div>

                <!-- Standalone IDEAS Reel Promo Card Widget -->
                <div class="sidebar-widget reel-sidebar-promo-widget" style="padding: 0; background: transparent; border: none; box-shadow: none; margin-top: 0 !important; margin-bottom: 0 !important;">
                    <div class="reel-promo-card" style="margin: 0 !important;">
                        <div class="reel-promo-icon">
                            <i class="fa-solid fa-play"></i>
                        </div>
                        <div class="reel-promo-info">
                            <div class="reel-promo-tag"><?php echo $is_en ? 'NEW DISCOVERY' : 'MỚI KHÁM PHÁ'; ?></div>
                            <a href="<?php echo home_url('/reel'); ?>" class="reel-promo-link">
                                <?php echo $is_en ? 'Explore IDEAS Reel Counseling' : 'Khám phá IDEAS Reel Tư vấn'; ?> <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </div>
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
                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/online-mba-1-optimized.webp"
                                alt="Online MBA" class="sidebar-course-img">
                            <div>
                                <h4 class="sidebar-course-title">Online MBA</h4><p class="sidebar-course-desc"><?php echo $is_en ? 'Online MBA' : 'Thạc sĩ QTKD Trực tuyến'; ?></p>
                            </div>
                        </a>
                        <a href="<?php echo $is_en ? '/en/emba' : '/emba'; ?>" class="sidebar-course-item">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/emba-optimized.webp" alt="Executive MBA"
                                class="sidebar-course-img">
                            <div>
                                <h4 class="sidebar-course-title">Executive MBA</h4><p class="sidebar-course-desc"><?php echo $is_en ? 'Executive MBA' : 'Thạc sĩ điều hành QTKD'; ?></p>
                            </div>
                        </a>
                        <a href="<?php echo $is_en ? '/en/mbainai' : '/mbainai'; ?>" class="sidebar-course-item">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/mba_in_ai-optimized.webp"
                                alt="MBA in AI" class="sidebar-course-img">
                            <div>
                                <h4 class="sidebar-course-title">MBA in AI</h4><p class="sidebar-course-desc"><?php echo $is_en ? 'MBA in Applied AI' : 'Thạc sĩ QTKD Ứng dụng AI'; ?></p>
                            </div>
                        </a>
                        <a href="<?php echo $is_en ? '/en/mscai' : '/mscai'; ?>" class="sidebar-course-item">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/mscai-optimized.webp" alt="MSc AI"
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

    <!-- Script imports -->
    <?php
    $js_path = get_stylesheet_directory() . '/common-assets/js/script.min.js';
    $js_version = file_exists($js_path) ? filemtime($js_path) : time();
    ?>
    <script
        src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/script.min.js?v=<?php echo $js_version; ?>"
        defer></script>

    <!-- Sidebar Sticky Alignment Script on Scroll -->
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

        // Sidebar inline form submission logic (parity with single.php)
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

                let sourceVal = "Landing_Blog_Search";
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
                const searchQuery = "<?php echo esc_js(get_search_query()); ?>";

                // Core API Submission (Payload 1)
                const payload = {
                    form_id: "4fe1eeb0570742a1fdde61af6fc0680c",
                    email: email,
                    firstName: name,
                    phoneNumber: phone,
                    time_dat_lich: "",
                    note_dat_lich: note ? `Đăng ký từ tìm kiếm "${searchQuery}" - ${chuongTrinhVal} | Ghi chú: ${note}` : `Đăng ký từ tìm kiếm "${searchQuery}" - ${chuongTrinhVal}`,
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
                    nhu_cau: note ? `Đăng ký từ tìm kiếm "${searchQuery}" - ${chuongTrinhVal} | Ghi chú: ${note}` : `Đăng ký từ tìm kiếm "${searchQuery}" - ${chuongTrinhVal}`
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
                btn.innerHTML = `<i class="fa-solid fa-spinner fa-spin"></i> ${isEnMode ? 'Submitting...' : 'Đang gửi...'}`;

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
</body>

</html>