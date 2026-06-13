<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
global $wp;

// Dequeue unwanted old CSS styles (via WordPress API - catches enqueued styles)
add_action('wp_enqueue_scripts', function() {
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
ob_start(function($html) {
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

    <!-- Preconnect to external domains for faster resource loading --><?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')) : ?>
<title><?php echo $is_en ? '404 - Page Not Found | ' . get_bloginfo('name') : '404 - Không tìm thấy trang | ' . get_bloginfo('name'); ?></title>
<?php endif; ?><style>
        /* Prevent overflow-x from breaking sticky elements */
        html, body {
            overflow-x: clip !important;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }

        /* 404 Section styling */
        .error-page-wrapper {
            min-height: calc(100vh - 90px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 120px 20px 80px;
            position: relative;
            background: radial-gradient(circle at 80% 20%, rgba(171, 14, 0, 0.03) 0%, transparent 50%), 
                        radial-gradient(circle at 10% 80%, rgba(99, 58, 230, 0.03) 0%, transparent 50%),
                        #f8fafc;
            overflow: hidden;
        }

        .error-container {
            max-width: 650px;
            width: 100%;
            text-align: center;
            position: relative;
            z-index: 5;
            background: #ffffff;
            padding: 60px 40px;
            border-radius: 32px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.04);
        }

        @media (max-width: 768px) {
            .error-page-wrapper {
                padding: 110px 16px 60px !important;
            }
            .error-container {
                padding: 40px 20px;
                border-radius: 24px;
            }
        }

        /* Glowing Orbs */
        .error-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            -webkit-filter: blur(80px);
            pointer-events: none;
            z-index: 1;
        }
        
        .error-orb-1 {
            width: 300px;
            height: 300px;
            background: rgba(171, 14, 0, 0.12);
            top: 10%;
            left: 20%;
        }

        .error-orb-2 {
            width: 250px;
            height: 250px;
            background: rgba(99, 58, 230, 0.08);
            bottom: 10%;
            right: 15%;
        }

        .error-code {
            font-size: clamp(6rem, 15vw, 9rem);
            font-weight: 900;
            line-height: 0.95;
            background: linear-gradient(135deg, #ab0e00 0%, #ff3600 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 24px;
            letter-spacing: -0.04em;
            display: inline-block;
            animation: pulse-gentle 3s infinite alternate;
        }

        @keyframes pulse-gentle {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(1.03);
            }
        }

        .error-container h1 {
            font-size: clamp(1.5rem, 4vw, 2rem);
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 16px;
            letter-spacing: -0.01em;
        }

        .error-container p {
            font-size: 1.05rem;
            color: #475569;
            line-height: 1.6;
            margin-bottom: 35px;
        }

        /* Search Form Custom */
        .error-search-form {
            max-width: 500px;
            margin: 0 auto 35px;
        }

        .error-search-wrap {
            display: flex;
            align-items: center;
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 100px;
            padding: 5px 5px 5px 18px;
            transition: all 0.3s ease;
        }

        .error-search-wrap:focus-within {
            background: #ffffff;
            border-color: #ab0e00;
            box-shadow: 0 0 0 4px rgba(171, 14, 0, 0.08);
        }

        .error-search-icon {
            color: #64748b;
            font-size: 1rem;
            margin-right: 10px;
            flex-shrink: 0;
        }

        .error-search-input {
            background: transparent;
            border: none;
            outline: none;
            color: #1e293b;
            font-size: 0.95rem;
            width: 100%;
            padding: 8px 0;
        }

        .error-search-btn {
            background: var(--grad-primary, linear-gradient(135deg, #ab0e00, #ff3600));
            color: #ffffff;
            border: none;
            padding: 9px 20px;
            border-radius: 100px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .error-search-btn:hover {
            opacity: 0.95;
            box-shadow: 0 4px 12px rgba(171, 14, 0, 0.25);
        }

        /* CTA buttons */
        .error-actions {
            display: flex;
            gap: 16px;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn-404 {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-404-primary {
            background: var(--grad-primary, linear-gradient(135deg, #ab0e00, #ff3600));
            color: #ffffff;
            box-shadow: 0 10px 25px rgba(171, 14, 0, 0.2);
        }

        .btn-404-primary:hover {
            opacity: 0.95;
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(171, 14, 0, 0.3);
        }

        .btn-404-secondary {
            background: #ffffff;
            color: #1e293b;
            border: 1.5px solid #e2e8f0;
        }

        .btn-404-secondary:hover {
            border-color: #ab0e00;
            color: #ab0e00;
            transform: translateY(-2px);
            background: #fffdfd;
        }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <!-- Main Header -->
        <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>


    <!-- Main Content -->
    <div class="error-page-wrapper">
        <div class="error-orb error-orb-1"></div>
        <div class="error-orb error-orb-2"></div>
        
        <div class="error-container">
            <div class="error-code">404</div>
            <h1><?php echo $is_en ? 'Page Not Found' : 'Không Tìm Thấy Trang'; ?></h1>
            <p><?php echo $is_en ? 'The page you are looking for does not exist, has been removed, or has been moved to a different path. Try searching for articles below or return to the homepage.' : 'Trang bạn đang tìm kiếm không tồn tại, đã bị xóa hoặc đã được di chuyển sang một đường dẫn khác. Hãy thử tìm kiếm bài viết bên dưới hoặc quay lại trang chủ.'; ?></p>
            
            <!-- Search bar -->
            <form role="search" method="get" class="error-search-form" action="<?php echo esc_url( home_url( '/index.php' ) ); ?>">
                <div class="error-search-wrap">
                    <svg class="svg-icon fa-magnifying-glass fa-solid error-search-icon" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                    <input type="search" class="error-search-input" placeholder="<?php echo $is_en ? 'Search website content...' : 'Tìm kiếm thông tin trên website...'; ?>" value="" name="s" required />
                    <button type="submit" class="error-search-btn"><?php echo $is_en ? 'Search' : 'Tìm kiếm'; ?></button>
                </div>
            </form>

            <div class="error-actions">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-404 btn-404-primary">
                    <svg class="svg-icon fa-house fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg> <?php echo $is_en ? 'Go to Home' : 'Về trang chủ'; ?>
                </a>
                <a href="/bai-viet" class="btn-404 btn-404-secondary">
                    <svg class="svg-icon fa-newspaper fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 96c0-35.3 28.7-64 64-64l288 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L80 480c-44.2 0-80-35.8-80-80L0 128c0-17.7 14.3-32 32-32s32 14.3 32 32l0 272c0 8.8 7.2 16 16 16s16-7.2 16-16L96 96zm64 24l0 80c0 13.3 10.7 24 24 24l112 0c13.3 0 24-10.7 24-24l0-80c0-13.3-10.7-24-24-24L184 96c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16z"/></svg> <?php echo $is_en ? 'Read News' : 'Xem tin tức'; ?>
                </a>
            </div>
        </div>
    </div>

    <!-- Script imports -->
    <?php 
    $js_path = get_stylesheet_directory() . '/common-assets/js/script.min.js';
    $js_version = file_exists($js_path) ? filemtime($js_path) : time();
    ?>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/script.min.js?v=<?php echo $js_version; ?>" defer></script>
    
    <?php get_footer(); ?>
</body>
</html>
