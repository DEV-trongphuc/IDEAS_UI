<?php
/**
 * The template for displaying the Online MBA Programs directory page
 * Template Name: Premium MBA Program Directory Template
 */
global $wp;

// Block unwanted old theme styles via output buffering
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

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php echo $is_en ? 'Online MBA Curriculum &amp; Programs | IDEAS' : 'Chương trình đào tạo Thạc sĩ Quản trị Kinh doanh Online (MBA) | IDEAS'; ?></title>
        <meta name="description" content="<?php echo $is_en ? 'Detailed information on high-quality online Master of Business Administration (Online MBA) programs at IDEAS Institute in partnership with Swiss universities.' : 'Thông tin chi tiết các chương trình đào tạo Thạc sĩ Quản trị Kinh doanh (Online MBA) chất lượng cao tại Viện IDEAS liên kết với các trường đại học Thụy Sĩ.'; ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?php echo $is_en ? 'Online MBA Curriculum &amp; Programs | IDEAS' : 'Chương trình đào tạo Thạc sĩ Quản trị Kinh doanh Online (MBA) | IDEAS'; ?>" />
        <meta property="og:description" content="<?php echo $is_en ? 'Detailed information on high-quality online Master of Business Administration (Online MBA) programs at IDEAS Institute in partnership with Swiss universities.' : 'Thông tin chi tiết các chương trình đào tạo Thạc sĩ Quản trị Kinh doanh (Online MBA) chất lượng cao tại Viện IDEAS liên kết với các trường đại học Thụy Sĩ.'; ?>" />
        <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2026/06/swissumef_logo.png" />
        <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />
    <?php endif; ?>

    <!-- Preconnect to external domains for faster resource loading --><!-- Link the main style assets --><!-- Booking Modal stylesheet -->
    <?php
    define('BOOKING_MODAL_CSS_LOADED', true);
    $bk_css_path = get_stylesheet_directory() . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/booking-modal.min.css?v=<?php echo $bk_css_version; ?>" media="print" onload="this.media='all'" /><link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/webfonts/fa-solid-900.woff2"
        as="font" type="font/woff2" crossorigin />
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/webfonts/fa-brands-400.woff2"
        as="font" type="font/woff2" crossorigin />

    <!-- MailFlow Pro Tracker & AI Chat -->
    <script>
        window._mf_config = {
            property_id: "ce71ea2e-d841-4e0f-b3ad-332297cde330",
            ai_chat: true
        };
    </script>
    <script src="https://automation.ideas.edu.vn/tracker.js" defer></script>

    <!-- Style overrides for directory page -->
    <style>
        :root {
            --umef-primary: var(--clr-primary, #ab0e00);
            --umef-primary-hover: var(--clr-primary-d, #8c1000);
            --text-dark: #0f172a;
            --text-muted: #475569;
            --bg-light: #f8fafc;
        }

        html, body {
            overflow-x: clip !important;
            scroll-behavior: smooth;
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            background-color: #fdfdfd;
            color: #1e293b;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            z-index: -1;
            background-image:
                radial-gradient(circle at 5% 15%, rgba(239, 68, 68, 0.03) 0%, transparent 45%),
                radial-gradient(circle at 95% 75%, rgba(239, 68, 68, 0.02) 0%, transparent 40%),
                radial-gradient(rgba(15, 23, 42, 0.02) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 28px 28px;
            pointer-events: none;
        }

        /* Hero Section */
        .dir-hero {
            position: relative;
            padding: 160px 20px 100px;
            text-align: center;
            overflow: hidden;
            background: #040508;
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100vw;
            margin-left: 50%;
            transform: translateX(-50%);
        }

        .dir-hero-bg {
            position: absolute;
            inset: 0;
            z-index: 1;
            background-image: url('/wp-content/uploads/external-migrated/fc7eeb_82548a7721e6472b9c5f4813e39e94b9_mv2_ea5d6ab4.webp');
            background-size: cover;
            background-position: center;
            opacity: 0.25;
        }

        .dir-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(180deg, rgba(4, 5, 8, 0.6) 0%, rgba(6, 9, 14, 0.95) 100%),
                radial-gradient(ellipse at 50% 50%, rgba(171, 14, 0, 0.15) 0%, transparent 70%);
        }

        .dir-hero-container {
            position: relative;
            z-index: 3;
            max-width: 900px;
            margin: 0 auto;
        }

        .dir-hero-badge {
            background: rgba(171, 14, 0, 0.15);
            border: 1px solid rgba(171, 14, 0, 0.35);
            padding: 8px 20px;
            border-radius: 100px;
            color: #ff9e9e;
            font-size: 0.82rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
            backdrop-filter: blur(8px);
        }

        .dir-hero h1 {
            font-size: clamp(2.2rem, 5vw, 3.5rem);
            font-weight: 900;
            margin-bottom: 20px;
            letter-spacing: -0.02em;
            line-height: 1.25;
            color: #ffffff;
        }

        .dir-hero h1 span {
            background: linear-gradient(135deg, #ff8a8a 0%, var(--umef-primary) 60%, var(--umef-primary-hover) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .dir-hero p {
            font-size: 1.12rem;
            color: rgba(241, 245, 249, 0.85);
            max-width: 760px;
            margin: 0 auto 35px;
            line-height: 1.7;
            font-weight: 500;
        }

        /* General Section Layout */
        .dir-section {
            padding: 90px 20px;
            position: relative;
        }

        .dir-section-header {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 60px;
        }

        .dir-section-badge {
            font-size: 0.78rem;
            font-weight: 800;
            color: var(--umef-primary);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 12px;
            display: inline-block;
        }

        .dir-section-title {
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            font-weight: 850;
            line-height: 1.3;
            color: var(--text-dark);
            margin-bottom: 16px;
        }

        .dir-section-title span {
            color: var(--umef-primary);
            background: linear-gradient(135deg, var(--umef-primary) 0%, var(--umef-primary-hover) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .dir-section-desc {
            font-size: 1.02rem;
            color: var(--text-muted);
            line-height: 1.65;
        }

        /* Comparison Cards */
        .programs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .program-card {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.08);
            border-radius: 24px;
            padding: 40px 32px;
            box-shadow: 0 15px 45px rgba(15, 23, 42, 0.03);
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }

        .program-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--umef-primary), var(--umef-primary-hover));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .program-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 60px rgba(15, 23, 42, 0.08);
            border-color: rgba(171, 14, 0, 0.2);
        }

        .program-card:hover::before {
            opacity: 1;
        }

        .card-badge {
            align-self: flex-start;
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--umef-primary);
            background: rgba(171, 14, 0, 0.06);
            padding: 6px 14px;
            border-radius: 50px;
            margin-bottom: 24px;
        }

        .program-card h3 {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-dark);
            margin: 0 0 12px;
            line-height: 1.25;
        }

        .card-tagline {
            font-size: 0.88rem;
            color: var(--text-muted);
            margin-bottom: 28px;
            line-height: 1.5;
            min-height: 45px;
        }

        .card-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            border-top: 1px solid #f1f5f9;
            border-bottom: 1px solid #f1f5f9;
            padding: 20px 0;
            margin-bottom: 28px;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
        }

        .stat-lbl {
            font-size: 0.72rem;
            color: #94a3b8;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .stat-val {
            font-size: 1.05rem;
            font-weight: 800;
            color: var(--text-dark);
        }

        .card-features {
            list-style: none;
            padding: 0;
            margin: 0 0 35px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            flex-grow: 1;
        }

        .card-features li {
            font-size: 0.88rem;
            color: #334155;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            line-height: 1.5;
        }

        .card-features li i {
            color: var(--umef-primary);
            font-size: 0.82rem;
            margin-top: 4px;
            flex-shrink: 0;
        }

        .card-actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .card-btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: linear-gradient(135deg, var(--umef-primary), var(--umef-primary-hover));
            color: #ffffff !important;
            font-weight: 700;
            font-size: 0.9rem;
            padding: 14px 24px;
            border-radius: 12px;
            text-decoration: none !important;
            transition: all 0.25s ease;
            box-shadow: 0 4px 12px rgba(171, 14, 0, 0.15);
            border: none;
            cursor: pointer;
        }

        .card-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(171, 14, 0, 0.25);
            background: linear-gradient(135deg, #c01000, #ff4c1a);
        }

        .card-btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: #f1f5f9;
            color: #334155 !important;
            font-weight: 700;
            font-size: 0.9rem;
            padding: 14px 24px;
            border-radius: 12px;
            text-decoration: none !important;
            transition: all 0.25s ease;
            border: 1px solid rgba(15, 23, 42, 0.04);
        }

        .card-btn-secondary:hover {
            background: #e2e8f0;
            color: var(--text-dark) !important;
        }

        /* Pros & Cons Section */
        .proscons-container {
            max-width: 1000px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .pros-wrap, .cons-wrap {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.06);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.02);
        }

        .pros-wrap {
            border-left: 5px solid #22c55e;
        }

        .cons-wrap {
            border-left: 5px solid #64748b;
        }

        .proscons-title {
            font-size: 1.3rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
        }

        .pros-wrap .proscons-title {
            color: #15803d;
        }

        .cons-wrap .proscons-title {
            color: #475569;
        }

        .proscons-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .proscons-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .proscons-item i {
            font-size: 1.05rem;
            margin-top: 3px;
            flex-shrink: 0;
        }

        .pros-wrap i {
            color: #22c55e;
        }

        .cons-wrap i {
            color: #64748b;
        }

        .proscons-item h4 {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0 0 4px;
        }

        .proscons-item p {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin: 0;
            line-height: 1.5;
        }

        /* VN-NARIC & Accreditation Section */
        .accred-banner {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.04) 0%, rgba(255, 255, 255, 0.95) 100%);
            border: 1px solid rgba(239, 68, 68, 0.12);
            border-radius: 32px;
            padding: 50px;
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 40px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.03);
            backdrop-filter: blur(12px);
        }

        .accred-badge-logo {
            flex-shrink: 0;
            width: 130px;
            height: 130px;
            background: #ffffff;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
            border: 1px solid rgba(15, 23, 42, 0.06);
        }

        .accred-badge-logo img {
            max-width: 100%;
            height: auto;
        }

        .accred-text {
            flex-grow: 1;
        }

        .accred-text h3 {
            font-size: 1.45rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 12px;
            line-height: 1.3;
        }

        .accred-text p {
            font-size: 0.95rem;
            color: #334155;
            line-height: 1.6;
            margin-bottom: 18px;
        }

        .accred-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(179, 20, 0, 0.07);
            color: var(--umef-primary);
            padding: 6px 16px;
            border-radius: 100px;
            font-size: 0.8rem;
            font-weight: 700;
            border: 1px solid rgba(179, 20, 0, 0.12);
        }

        /* FAQ Dropdowns */
        .faq-grid {
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .faq-item {
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.06);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.01);
            transition: all 0.3s ease;
        }

        .faq-item.active {
            border-color: rgba(171, 14, 0, 0.2);
            box-shadow: 0 10px 25px rgba(171, 14, 0, 0.04);
        }

        .faq-trigger {
            width: 100%;
            background: transparent;
            border: none;
            padding: 24px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            text-align: left;
            outline: none;
        }

        .faq-trigger h3 {
            font-size: 1.05rem;
            font-weight: 750;
            color: var(--text-dark);
            margin: 0;
            padding-right: 20px;
        }

        .faq-icon-wrap {
            color: var(--umef-primary);
            font-size: 0.95rem;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-icon-wrap {
            transform: rotate(180deg);
        }

        .faq-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .faq-content {
            padding: 0 28px 24px;
            font-size: 0.92rem;
            color: var(--text-muted);
            line-height: 1.6;
            border-top: 1px solid transparent;
        }

        .faq-item.active .faq-content {
            border-top-color: #f1f5f9;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .proscons-container {
                grid-template-columns: 1fr;
            }

            .accred-banner {
                flex-direction: column;
                padding: 30px;
                gap: 24px;
                text-align: center;
            }

            .accred-badge-logo {
                width: 110px;
                height: 110px;
            }

            .accred-tag {
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .dir-hero {
                padding-top: 130px;
                padding-bottom: 80px;
            }

            .dir-section {
                padding: 60px 16px;
            }

            .dir-section-header {
                margin-bottom: 40px;
            }

            .faq-trigger {
                padding: 20px;
            }

            .faq-content {
                padding: 0 20px 20px;
            }
        }
    </style>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>

    <main id="content">

        <!-- HERO SECTION -->
        <section class="dir-hero" id="trang-chu">
            <div class="dir-hero-bg"></div>
            <div class="dir-hero-overlay"></div>
            <div class="dir-hero-container">
                <div class="dir-hero-badge"><i class="fa-solid fa-graduation-cap"></i> <?php echo $is_en ? 'Online International MBA' : 'Thạc sĩ MBA Online Quốc tế'; ?></div>
                <h1><?php echo $is_en ? 'Online MBA<br /><span>Curriculum &amp; Programs</span>' : 'Chương Trình Đào Tạo<br /><span>Thạc Sĩ MBA Online</span>'; ?></h1>
                <p><?php echo $is_en ? 'Explore and choose international standard online MBA programs at IDEAS Institute. An elite learning solution accredited to European standards, offering maximum flexibility tailored for busy managers and leaders.' : 'Khám phá và chọn lựa các chương trình MBA trực tuyến chuẩn Quốc tế tại Viện IDEAS. Giải pháp học tập đỉnh cao được kiểm định chuẩn châu Âu, linh hoạt tối đa dành riêng cho nhà quản lý và lãnh đạo bận rộn.'; ?></p>
                <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap; width: 100%;">
                    <button type="button" class="card-btn-primary"
                        onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('dir-hero'); } else if(typeof window.showform === 'function') { window.showform('dir-hero'); }">
                        <span><?php echo $is_en ? 'Choose a Program' : 'Nhận tư vấn chọn chương trình'; ?></span>
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                    <a href="#danh-sach-chuong-trinh" class="card-btn-secondary" style="background: rgba(255,255,255,0.1); color: #fff !important; border-color: rgba(255,255,255,0.2);">
                        <span><?php echo $is_en ? 'Explore Programs' : 'Khám phá các chương trình'; ?></span>
                        <i class="fa-solid fa-arrow-down"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- EVALUATION PROS & CONS -->
        <section class="dir-section" id="danh-gia-khach-quan">
            <div class="dir-section-header">
                <span class="dir-section-badge"><?php echo $is_en ? 'Multidimensional View' : 'Góc nhìn đa chiều'; ?></span>
                <h2 class="dir-section-title"><?php echo $is_en ? 'Pros &amp; Cons of <span>Online MBA Study</span>' : 'Ưu &amp; Nhược điểm khi <span>Học MBA Online</span>'; ?></h2>
                <p class="dir-section-desc"><?php echo $is_en ? 'An objective view to help you prepare best before deciding to invest time and effort in advancing your management capabilities.' : 'Góc nhìn khách quan giúp bạn có sự chuẩn bị tốt nhất trước khi quyết định đầu tư thời gian và công sức cho việc học tập nâng cao năng lực quản lý.'; ?></p>
            </div>

            <div class="proscons-container">
                <!-- Pros -->
                <div class="pros-wrap">
                    <h3 class="proscons-title"><i class="fa-solid fa-circle-check"></i> <?php echo $is_en ? 'Key Advantages' : 'Ưu điểm nổi bật'; ?></h3>
                    <ul class="proscons-list">
                        <li class="proscons-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div>
                                <h4><?php echo $is_en ? 'Maximum Flexibility' : 'Linh hoạt tối đa'; ?></h4>
                                <p><?php echo $is_en ? 'Arrange study time actively at 100% personal pace, easily balancing studies, work, and family.' : 'Sắp xếp thời gian học chủ động 100% theo nhịp độ cá nhân, dễ dàng cân bằng giữa việc học, công tác và chăm sóc gia đình.'; ?></p>
                            </div>
                        </li>
                        <li class="proscons-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div>
                                <h4><?php echo $is_en ? 'Optimal Savings' : 'Tiết kiệm tối ưu'; ?></h4>
                                <p><?php echo $is_en ? 'Reduce costs of travel, accommodation, materials, and tuition fees which are usually significantly lower than full-time programs.' : 'Cắt giảm chi phí đi lại, ăn ở, tài liệu và học phí thường thấp hơn đáng kể so với các chương trình học tập trung trực tiếp.'; ?></p>
                            </div>
                        </li>
                        <li class="proscons-item">
                            <i class="fa-solid fa-circle-check"></i>
                            <div>
                                <h4><?php echo $is_en ? 'Practical Application' : 'Kiến thức ứng dụng thực tiễn'; ?></h4>
                                <p><?php echo $is_en ? 'Curriculum focuses on solving real-world management problems of students\' businesses during their studies.' : 'Nội dung học tập trung vào giải quyết các bài toán quản trị thực tế của doanh nghiệp học viên ngay trong quá trình học.'; ?></p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Cons -->
                <div class="cons-wrap">
                    <h3 class="proscons-title"><i class="fa-solid fa-circle-minus"></i> <?php echo $is_en ? 'Challenges to Consider' : 'Thử thách cần lưu ý'; ?></h3>
                    <ul class="proscons-list">
                        <li class="proscons-item">
                            <i class="fa-solid fa-circle-minus"></i>
                            <div>
                                <h4><?php echo $is_en ? 'Requires Self-Discipline' : 'Yêu cầu tính tự giác cao'; ?></h4>
                                <p><?php echo $is_en ? 'No direct classroom pressure, so it requires strong time-management skills and personal commitment.' : 'Không có sự thúc ép trực tiếp trên lớp nên đòi hỏi người học phải có kỹ năng quản lý thời gian và cam kết cá nhân lớn.'; ?></p>
                            </div>
                        </li>
                        <li class="proscons-item">
                            <i class="fa-solid fa-circle-minus"></i>
                            <div>
                                <h4><?php echo $is_en ? 'Limited Direct Interaction' : 'Hạn chế tương tác trực tiếp'; ?></h4>
                                <p><?php echo $is_en ? 'Interactions happen online via LMS or Zoom. However, IDEAS overcomes this with workshops and Swiss field trips.' : 'Tương tác diễn ra trực tuyến qua LMS, Zoom. Tuy nhiên, Viện IDEAS khắc phục bằng các workshop và chuyến đi thực tế Thụy Sĩ.'; ?></p>
                            </div>
                        </li>
                        <li class="proscons-item">
                            <i class="fa-solid fa-circle-minus"></i>
                            <div>
                                <h4><?php echo $is_en ? 'Work-study Balance Pressure' : 'Áp lực từ công việc hiện tại'; ?></h4>
                                <p><?php echo $is_en ? 'Can lead to overload if time is not allocated properly between daytime job schedule and evening self-study.' : 'Dễ rơi vào tình trạng quá tải nếu không phân bổ thời gian hợp lý giữa lịch làm việc tại cơ quan và lịch tự học buổi tối.'; ?></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- PROGRAMS DIRECTORY GRID -->
        <section class="dir-section" id="danh-sach-chuong-trinh" style="background-color: var(--bg-light);">
            <div class="dir-section-header">
                <span class="dir-section-badge"><?php echo $is_en ? 'Academic Programs' : 'Chương trình đào tạo'; ?></span>
                <h2 class="dir-section-title"><?php echo $is_en ? 'Choose Your <span>Online MBA Program</span>' : 'Lựa chọn <span>Chương trình MBA Online</span> của bạn'; ?></h2>
                <p class="dir-section-desc"><?php echo $is_en ? 'We offer 3 specialized online Master of Business Administration pathways, meeting the advancement and development needs of each management level.' : 'Chúng tôi cung cấp 3 định hướng đào tạo Thạc sĩ Quản trị Kinh doanh trực tuyến chuyên biệt, đáp ứng chính xác nhu cầu thăng tiến và phát triển ở từng cấp độ quản lý.'; ?></p>
            </div>

            <div class="programs-grid">
                <!-- Program 1: Global Online MBA -->
                <div class="program-card">
                    <span class="card-badge"><?php echo $is_en ? 'Popular Program' : 'Chương trình phổ biến'; ?></span>
                    <h3>Global Online MBA</h3>
                    <p class="card-tagline"><?php echo $is_en ? 'In-depth global business administration master program, providing an international-standard holistic corporate management foundation.' : 'Chương trình thạc sĩ quản trị kinh doanh toàn cầu chuyên sâu, cung cấp nền tảng quản trị doanh nghiệp toàn diện chuẩn quốc tế.'; ?></p>
                    
                    <div class="card-stats">
                        <div class="stat-item">
                            <span class="stat-lbl"><?php echo $is_en ? 'Duration' : 'Thời gian học'; ?></span>
                            <span class="stat-val"><?php echo $is_en ? '14 - 16 Months' : '14 - 16 Tháng'; ?></span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-lbl"><?php echo $is_en ? 'Tuition from' : 'Học phí chỉ từ'; ?></span>
                            <span class="stat-val"><?php echo $is_en ? '4,020 CHF' : '4.020 CHF'; ?></span>
                        </div>
                    </div>

                    <ul class="card-features">
                        <li><i class="fa-solid fa-circle-check"></i> <span><?php echo $is_en ? '100% Online study via European-standard LMS system.' : '100% Học trực tuyến qua hệ thống LMS chuẩn châu Âu.'; ?></span></li>
                        <li><i class="fa-solid fa-circle-check"></i> <span><?php echo $is_en ? 'Master\'s degree awarded by a prestigious Swiss university.' : 'Bằng Thạc sĩ MBA do trường Đại học danh tiếng Thụy Sĩ cấp.'; ?></span></li>
                        <li><i class="fa-solid fa-circle-check"></i> <span><?php echo $is_en ? 'Equips 12 core foundational subjects in financial management, HR, and marketing.' : 'Trang bị 12 môn học nền tảng cốt lõi về quản trị tài chính, nhân sự, marketing.'; ?></span></li>
                    </ul>

                    <div class="card-actions">
                        <button type="button" class="card-btn-primary"
                            onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('global-mba'); } else if(typeof window.showform === 'function') { window.showform('global-mba'); }">
                            <span><?php echo $is_en ? 'Get Counseling' : 'Đăng ký tư vấn'; ?></span>
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                        <a href="<?php echo $is_en ? '/en/mba' : '/mba'; ?>" class="card-btn-secondary"><span><?php echo $is_en ? 'Program Details' : 'Chi tiết chương trình'; ?></span><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Program 2: Executive MBA (EMBA) -->
                <div class="program-card">
                    <span class="card-badge"><?php echo $is_en ? 'Executive Leadership' : 'Lãnh đạo cao cấp'; ?></span>
                    <h3>Executive MBA</h3>
                    <p class="card-tagline"><?php echo $is_en ? 'Premium program designed for CEOs, Founders, strategic executive managers, and corporate restructuring.' : 'Chương trình đào tạo cao cấp dành riêng cho CEO, Founder, cấp quản lý điều hành chiến lược và tái cấu trúc doanh nghiệp.'; ?></p>
                    
                    <div class="card-stats">
                        <div class="stat-item">
                            <span class="stat-lbl"><?php echo $is_en ? 'Duration' : 'Thời gian học'; ?></span>
                            <span class="stat-val"><?php echo $is_en ? '14 Months' : '14 Tháng'; ?></span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-lbl"><?php echo $is_en ? 'Format' : 'Hình thức học'; ?></span>
                            <span class="stat-val"><?php echo $is_en ? 'Online + Zoom' : 'Online + Zoom'; ?></span>
                        </div>
                    </div>

                    <ul class="card-features">
                        <li><i class="fa-solid fa-circle-check"></i> <span><?php echo $is_en ? 'In-depth modules on strategic leadership, crisis management, and M&amp;A.' : 'Chuyên đề chuyên sâu về tư duy lãnh đạo, quản trị khủng hoảng và M&amp;A.'; ?></span></li>
                        <li><i class="fa-solid fa-circle-check"></i> <span><?php echo $is_en ? 'Expand a high-quality CEO networking community.' : 'Mở rộng mạng lưới kết nối (Networking) chất lượng cao cùng các CEO.'; ?></span></li>
                        <li><i class="fa-solid fa-circle-check"></i> <span><?php echo $is_en ? 'Participate in online discussions directly with international faculty.' : 'Tham gia các chuyên đề thảo luận trực tuyến trực tiếp với giảng viên quốc tế.'; ?></span></li>
                    </ul>

                    <div class="card-actions">
                        <button type="button" class="card-btn-primary"
                            onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('executive-emba'); } else if(typeof window.showform === 'function') { window.showform('executive-emba'); }">
                            <span><?php echo $is_en ? 'Get Counseling' : 'Đăng ký tư vấn'; ?></span>
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                        <a href="<?php echo $is_en ? '/en/emba' : '/emba'; ?>" class="card-btn-secondary"><span><?php echo $is_en ? 'Program Details' : 'Chi tiết chương trình'; ?></span><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Program 3: MBA in AI -->
                <div class="program-card">
                    <span class="card-badge"><?php echo $is_en ? 'Tech Trend' : 'Xu thế công nghệ'; ?></span>
                    <h3>MBA in AI</h3>
                    <p class="card-tagline"><?php echo $is_en ? 'Pioneering MBA program integrating artificial intelligence (AI) into corporate management, leading the global digital transformation wave.' : 'Chương trình MBA tiên phong tích hợp trí tuệ nhân tạo (AI) vào quản trị doanh nghiệp, dẫn đầu làn sóng chuyển đổi số toàn cầu.'; ?></p>
                    
                    <div class="card-stats">
                        <div class="stat-item">
                            <span class="stat-lbl"><?php echo $is_en ? 'Duration' : 'Thời gian học'; ?></span>
                            <span class="stat-val"><?php echo $is_en ? '16 Months' : '16 Tháng'; ?></span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-lbl"><?php echo $is_en ? 'Target Audience' : 'Đối tượng'; ?></span>
                            <span class="stat-val"><?php echo $is_en ? 'Digital Managers' : 'Quản lý số'; ?></span>
                        </div>
                    </div>

                    <ul class="card-features">
                        <li><i class="fa-solid fa-circle-check"></i> <span><?php echo $is_en ? 'Applied AI to optimize marketing processes, operations, and automation.' : 'Ứng dụng AI tối ưu hóa quy trình marketing, vận hành và tự động hóa.'; ?></span></li>
                        <li><i class="fa-solid fa-circle-check"></i> <span><?php echo $is_en ? 'Learn to build digital data strategies and manage practical AI projects.' : 'Học cách xây dựng chiến lược dữ liệu số và quản trị dự án AI thực chiến.'; ?></span></li>
                        <li><i class="fa-solid fa-circle-check"></i> <span><?php echo $is_en ? 'No technical/coding background required, focusing on digital management mindset.' : 'Không yêu cầu nền tảng kỹ thuật/code, tập trung vào tư duy quản trị số.'; ?></span></li>
                    </ul>

                    <div class="card-actions">
                        <button type="button" class="card-btn-primary"
                            onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('mba-ai'); } else if(typeof window.showform === 'function') { window.showform('mba-ai'); }">
                            <span><?php echo $is_en ? 'Get Counseling' : 'Đăng ký tư vấn'; ?></span>
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                        <a href="<?php echo $is_en ? '/en/mbainai' : '/mbainai'; ?>" class="card-btn-secondary"><span><?php echo $is_en ? 'Program Details' : 'Chi tiết chương trình'; ?></span><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- VN-NARIC & ACCREDITATION BANNER -->
        <section class="dir-section">
            <div class="accred-banner">
                <div class="accred-badge-logo">
                    <img src="/wp-content/uploads/external-migrated/vnnaric_official_logo.webp" alt="VN-NARIC Logo" width="110" height="19" loading="lazy" />
                </div>
                <div class="accred-text">
                    <div class="accred-tag"><i class="fa-solid fa-circle-check"></i> <?php echo $is_en ? 'Full International Legality' : 'Đầy đủ tính pháp lý quốc tế'; ?></div>
                    <h3><?php echo $is_en ? 'European Quality Accreditations &amp; VN-NARIC Verification' : 'Kiểm định chất lượng Châu Âu &amp; Xác thực VN-NARIC'; ?></h3>
                    <p><?php echo $is_en ? 'All associated online MBA programs are strictly accredited by reputable international organizations (IACBE, Swiss Accreditation Council - SAC) and are eligible for degree verification procedures at VN-NARIC - Ministry of Education and Training of Vietnam.' : 'Mọi chương trình đào tạo Thạc sĩ MBA Online liên kết đều được kiểm định khắt khe bởi các tổ chức uy tín quốc tế (Ủy ban Kiểm định các Trường Đại học và Chương trình Đào tạo Doanh nghiệp - IACBE, Hội đồng Kiểm định Thụy Sĩ - SAC) và đủ điều kiện làm thủ tục công nhận văn bằng tại Cục Quản lý chất lượng (VN-NARIC) - Bộ Giáo dục và Đào tạo Việt Nam.'; ?></p>
                    <a href="<?php echo $is_en ? '/en/swiss-umef' : '/swiss-umef'; ?>" class="card-btn-secondary" style="display: inline-flex; padding: 10px 20px; font-size: 0.82rem;"><?php echo $is_en ? 'Learn about partner Swiss UMEF' : 'Tìm hiểu về đối tác Swiss UMEF'; ?></a>
                </div>
            </div>
        </section>

        <!-- FAQ SECTION -->
        <section class="dir-section" id="faq-section" style="background-color: var(--bg-light); border-top: 1px solid rgba(15, 23, 42, 0.04);">
            <div class="dir-section-header">
                <span class="dir-section-badge"><?php echo $is_en ? 'FAQ' : 'Giải đáp thắc mắc'; ?></span>
                <h2 class="dir-section-title"><?php echo $is_en ? 'Frequently Asked Questions about <span>Online MBA</span>' : 'Câu hỏi thường gặp về <span>Học MBA Online</span>'; ?></h2>
                <p class="dir-section-desc"><?php echo $is_en ? 'Summary of the most common questions from students before starting their online MBA program.' : 'Tổng hợp những câu hỏi phổ biến nhất từ các học viên trước khi bắt đầu khóa học Thạc sĩ Quản trị Kinh doanh trực tuyến.'; ?></p>
            </div>

            <div class="faq-grid">
                <!-- FAQ 1 -->
                <div class="faq-item">
                    <button type="button" class="faq-trigger">
                        <h3><?php echo $is_en ? 'Does the online MBA graduation certificate specify "Online"?' : 'Bằng tốt nghiệp chương trình MBA Online có ghi chữ "Online" không?'; ?></h3>
                        <span class="faq-icon-wrap"><i class="fa-solid fa-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <div class="faq-content"><?php echo $is_en ? 'No. The degree awarded by the Swiss partner university is identical in format, legal content, and global value to the on-campus program at the main Swiss campus.' : 'Không. Bằng tốt nghiệp Thạc sĩ MBA do trường Đại học đối tác Thụy Sĩ cấp hoàn toàn đồng nhất về hình thức, nội dung pháp lý và giá trị sử dụng toàn cầu với chương trình đào tạo tập trung tại cơ sở chính ở Thụy Sĩ.'; ?></div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="faq-item">
                    <button type="button" class="faq-trigger">
                        <h3><?php echo $is_en ? 'What are the entry requirements for the Swiss online MBA?' : 'Điều kiện đầu vào của chương trình MBA Online Thụy Sĩ là gì?'; ?></h3>
                        <span class="faq-icon-wrap"><i class="fa-solid fa-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <div class="faq-content"><?php echo $is_en ? 'Students must hold a Bachelor\'s degree (any major). Non-business graduates will be supported with pre-requisite courses. Practical work experience in management or team lead roles is a major advantage.' : 'Học viên cần tốt nghiệp đại học (mọi ngành nghề). Với các học viên tốt nghiệp các ngành không thuộc khối kinh tế sẽ được hỗ trợ các môn chuyển đổi bổ sung. Ngoài ra, yêu cầu có kinh nghiệm làm việc thực tế ở vai trò quản lý hoặc trưởng nhóm là một lợi thế lớn.'; ?></div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="faq-item">
                    <button type="button" class="faq-trigger">
                        <h3><?php echo $is_en ? 'What are the payment options? Is installment available?' : 'Hình thức đóng học phí thế nào? Có trả góp không?'; ?></h3>
                        <span class="faq-icon-wrap"><i class="fa-solid fa-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <div class="faq-content"><?php echo $is_en ? 'Students can pay in flexible installments matching their study progress. In particular, IDEAS Institute partners with Sacombank to support 0% interest tuition installments up to 12 months, optimizing personal and corporate cash flows.' : 'Học viên có thể đóng học phí chia làm nhiều kỳ linh hoạt theo tiến độ học tập. Đặc biệt, Viện IDEAS liên kết cùng ngân hàng Sacombank hỗ trợ chương trình trả góp học phí lãi suất 0% kéo dài lên tới 12 tháng, giúp tối ưu dòng tiền cá nhân và doanh nghiệp của bạn.'; ?></div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="faq-item">
                    <button type="button" class="faq-trigger">
                        <h3><?php echo $is_en ? 'Do students have the opportunity to attend the graduation ceremony in Switzerland?' : 'Học viên có cơ hội sang Thụy Sĩ tham gia Lễ tốt nghiệp không?'; ?></h3>
                        <span class="faq-icon-wrap"><i class="fa-solid fa-chevron-down"></i></span>
                    </button>
                    <div class="faq-body">
                        <div class="faq-content"><?php echo $is_en ? 'Absolutely. Graduates of Swiss UMEF programs are eligible to attend the graduation ceremony at the historic Chateau de Grand-Saconnex (headquarters in Geneva, Switzerland) with international students.' : 'Hoàn toàn có. Học viên tốt nghiệp các chương trình liên kết của Swiss UMEF được quyền đăng ký tham dự lễ trao bằng tốt nghiệp trang trọng tại lâu đài lịch sử Chateau de Grand-Saconnex (trụ sở chính của trường tại Geneva, Thụy Sĩ) cùng với học viên quốc tế.'; ?></div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- FAQ Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach(item => {
                const trigger = item.querySelector('.faq-trigger');
                const body = item.querySelector('.faq-body');
                const content = item.querySelector('.faq-content');

                trigger.addEventListener('click', () => {
                    const isActive = item.classList.contains('active');
                    
                    // Close all other items
                    faqItems.forEach(otherItem => {
                        otherItem.classList.remove('active');
                        const otherBody = otherItem.querySelector('.faq-body');
                        if (otherBody) otherBody.style.maxHeight = '0px';
                    });

                    // Toggle current item
                    if (!isActive) {
                        item.classList.add('active');
                        if (body && content) {
                            body.style.maxHeight = (content.offsetHeight + 40) + 'px';
                        }
                    }
                });
            });
        });
    </script>

    <!-- Shared Footer & Modals -->
    <?php get_footer(); ?>
</body>

</html>
