<?php
/**
 * Template Name: Premium MBA ISTEC Paris Template
 * Description: Trang giới thiệu chương trình Thạc sĩ Quản trị Kinh doanh (MBA) ISTEC Business School Paris
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
        <title>MBA ISTEC Business School Paris | Bằng Thạc Sĩ Chuẩn Quốc Gia Pháp Bac+5 RNCP Level 7</title>
        <meta name="description" content="Chương trình Thạc sĩ Quản trị Kinh doanh (MBA) trực tuyến 100% cấp bằng bởi ISTEC Business School Paris. 12 tháng, 15 môn học + luận văn, công nhận quốc tế RNCP Level 7 (Bac+5)." />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="MBA ISTEC Business School Paris | Chuẩn Giáo Dục Pháp" />
        <meta property="og:description" content="Từ người giỏi chuyên môn đến nhà quản trị toàn diện. Chương trình MBA 12 tháng trực tuyến từ trường kinh doanh ISTEC Paris với hơn 60 năm lịch sử." />
        <meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/istec-grand-rex-paris.jpg" />
        <meta property="og:url" content="<?php echo esc_url(home_url('/mba-istec')); ?>" />
    <?php endif; ?>

    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Course",
      "name": "Thạc sĩ Quản trị Kinh doanh (MBA) – ISTEC Business School Paris",
      "description": "Chương trình Thạc sĩ Quản trị Kinh doanh trực tuyến 100% từ ISTEC Paris, thời gian 12 tháng, 15 môn học và luận văn, công nhận RNCP Level 7 (Bac+5).",
      "courseCode": "MBA-ISTEC-PARIS",
      "educationalLevel": "Master",
      "inLanguage": "vi",
      "courseMode": "online",
      "timeRequired": "P12M",
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
        "category": "MBA",
        "price": "6500",
        "priceCurrency": "EUR",
        "description": "Học phí công bố 8.500 EUR, ưu đãi còn 6.500 EUR + 200 EUR lệ phí xét tuyển hồ sơ (LPHS)",
        "url": "https://ideas.edu.vn/mba-istec"
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

        /* Ẩn popup banner khuyến mãi Swiss UMEF trên landing page ISTEC Paris để tránh xung đột */
        #global-left-popup-banner {
            display: none !important;
        }

        /* Đồng bộ font chữ Plus Jakarta Sans toàn trang */
        body, button, input, select, textarea, h1, h2, h3, h4, h5, h6, p, a, span {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
            box-sizing: border-box;
        }

        /* Hover cursor đàng hoàng cho tất cả nút bấm và liên kết tương tác */
        button, a, input[type="submit"], input[type="button"], select, .btn-tab-square, .btn-slider-square, .expert-nav-item, .acc-square-header {
            cursor: pointer !important;
        }

        /* ── HERO SECTION: CÁCH TOP XUỐNG ĐẦY ĐỦ THOÁNG ĐÃNG ── */
        .istec-hero-container {
            padding: 110px 0 65px;
            background: #ffffff;
        }

        .istec-hero-flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 52px;
            margin-bottom: 50px;
        }

        /* Cột trái: Tiêu đề chương trình và mô tả phong cách ISTEC */
        .istec-hero-main-content {
            flex: 1;
            min-width: 0;
            padding-top: 0;
        }

        /* Cột phải: Hộp thông số nổi vuông vức của ISTEC */
        .istec-spec-box {
            flex: 0 0 340px;
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 32px 26px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.06);
            align-self: center;
            margin-top: 24px;
        }

        .spec-item {
            margin-bottom: 20px;
        }

        .spec-item:last-child {
            margin-bottom: 0;
        }

        .spec-label {
            font-size: 0.76rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--istec-teal);
            margin-bottom: 4px;
        }

        .spec-value {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--dark-main);
            line-height: 1.45;
        }

        .spec-divider {
            height: 1px;
            background: var(--border-subtle);
            margin: 16px 0;
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

        /* Nút vuông vức chuẩn ISTEC */
        .btn-istec-square-dark {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: #1a1a1a;
            color: #ffffff !important;
            padding: 13px 26px;
            border-radius: var(--radius-square);
            font-size: 0.95rem;
            font-weight: 700;
            text-decoration: none;
            border: none;
            transition: all 0.25s ease;
            cursor: pointer !important;
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
            gap: 12px;
            background: var(--istec-bright-green);
            color: #ffffff !important;
            padding: 13px 26px;
            border-radius: var(--radius-square);
            font-size: 0.95rem;
            font-weight: 700;
            text-decoration: none;
            border: none;
            transition: all 0.25s ease;
            cursor: pointer !important;
        }

        .btn-istec-square-green:hover {
            background: #4d860a;
            color: #ffffff !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(97, 166, 14, 0.3);
        }

        /* ── REAL PARALLAX FULLWIDTH BANNER (ẢNH CUỘN PARALLAX THỰC SỰ, KHÔNG PHẢI NỀN BỊ CẮT) ── */
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
            object-position: center 25%;
            display: block;
            will-change: transform;
            transform: translate3d(0, 0, 0);
            transition: transform 0.08s ease-out;
        }

        .parallax-caption-tag {
            position: relative;
            z-index: 2;
            background: rgba(17, 24, 39, 0.75);
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

        /* ── SECTION HEADER CHUẨN ── */
        .istec-section-box {
            padding: 80px 0;
            background: #ffffff;
        }

        .istec-section-box.bg-alt {
            background: var(--bg-alt);
            border-top: 1px solid var(--border-light);
            border-bottom: 1px solid var(--border-light);
        }

        /* ── SECTION IN THE HEART OF PARIS (CHUẨN THEO SCREENSHOT ISTEC PARIS) ── */
        .campus-paris-grid {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 56px;
            align-items: center;
        }

        .campus-paris-img {
            width: 100%;
            height: 480px;
            object-fit: cover;
            border-radius: var(--radius-square);
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.1);
            display: block;
        }

        .campus-features-list {
            border-top: 1px solid var(--border-light);
            margin-top: 20px;
        }

        .campus-feature-item {
            border-bottom: 1px solid var(--border-light);
        }

        .campus-feature-btn {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 0;
            background: none;
            border: none;
            text-align: left;
            font-size: 1.05rem;
            font-weight: 800;
            color: var(--dark-main);
            transition: color 0.2s ease;
            cursor: pointer !important;
        }

        .campus-feature-btn:hover {
            color: var(--istec-deep-green);
        }

        .campus-arrow-icon {
            color: var(--istec-bright-green);
            font-weight: 800;
            font-size: 1.2rem;
            transition: transform 0.2s ease;
        }

        .campus-feature-btn.active .campus-arrow-icon {
            transform: rotate(90deg);
        }

        .campus-feature-panel {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            font-size: 0.94rem;
            color: var(--dark-sub);
            line-height: 1.6;
        }

        .campus-feature-panel p {
            margin: 0 0 16px 26px;
        }

        @media (max-width: 1024px) {
            .campus-paris-grid {
                grid-template-columns: 1fr;
                gap: 36px;
            }
            .campus-paris-img {
                height: 320px;
            }
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

        /* ── THẺ VUÔNG VỨC & GỌN GÀNG (SQUARE CARDS) ── */
        .istec-square-card {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 28px 24px;
            box-shadow: var(--shadow-card);
            transition: all 0.25s ease;
        }

        .istec-square-card:hover {
            border-color: #cbd5e1;
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }

        /* ── SECTION MÀU XANH ĐẬM ISTEC (Screenshot 5: Lessons & Goals) ── */
        .istec-dark-green-section {
            background: var(--istec-deep-green);
            color: #ffffff;
            padding: 70px 0 80px;
        }

        .istec-green-block-title {
            font-size: 1.7rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 20px;
            letter-spacing: -0.01em;
        }

        .istec-white-bar-card {
            background: #ffffff;
            border-radius: var(--radius-square);
            padding: 24px 30px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 44px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }

        .bar-item-tick {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            border-left: 3px solid var(--istec-teal);
            padding-left: 14px;
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--dark-main);
            line-height: 1.4;
        }

        .istec-white-goals-card {
            background: #ffffff;
            border-radius: var(--radius-square);
            padding: 28px 32px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }

        .goal-item-tick {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            border-left: 3px solid var(--istec-teal);
            padding-left: 16px;
            font-size: 0.98rem;
            font-weight: 600;
            color: var(--dark-sub);
            line-height: 1.5;
        }

        /* ── 2 CHUYÊN GIA 1 HÀNG CÓ NÚT VÀ ANIMATION SLIDE ── */
        .expert-slider-outer {
            position: relative;
            overflow: hidden;
            width: 100%;
            padding: 6px 0;
        }

        .expert-slider-track {
            display: flex;
            gap: 24px;
            transition: transform 0.45s cubic-bezier(0.25, 1, 0.5, 1);
            width: 100%;
        }

        /* Mỗi card chiếm 50% hàng (2 chuyên gia 1 hàng) trên desktop */
        .expert-slide-card {
            flex: 0 0 calc(50% - 12px);
            min-width: calc(50% - 12px);
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-top: 3.5px solid var(--istec-deep-green);
            border-radius: var(--radius-square);
            box-shadow: 0 4px 20px rgba(0, 40, 30, 0.04);
            padding: 30px 28px 26px;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 290px;
            transition: transform 0.28s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.28s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.25s ease;
            box-sizing: border-box;
        }

        .expert-slide-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 36px rgba(0, 92, 77, 0.11), 0 4px 12px rgba(0, 0, 0, 0.03);
            border-color: rgba(97, 166, 14, 0.45);
            border-top-color: var(--istec-bright-green);
        }

        /* Top Bar trong Card: Badge danh mục & Icon Quote */
        .expert-card-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 16px;
            position: relative;
            z-index: 1;
        }

        .expert-topbar-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.74rem;
            font-weight: 700;
            color: var(--istec-deep-green);
            background: rgba(0, 92, 77, 0.06);
            border: 1px solid rgba(0, 92, 77, 0.12);
            padding: 4px 10px;
            border-radius: var(--radius-square);
            letter-spacing: 0.02em;
            text-transform: uppercase;
        }

        .expert-card-quote-icon {
            width: 28px;
            height: 22px;
            color: var(--istec-deep-green);
            opacity: 0.35;
            flex-shrink: 0;
            transition: all 0.25s ease;
        }

        .expert-slide-card:hover .expert-card-quote-icon {
            opacity: 0.85;
            color: var(--istec-bright-green);
            transform: scale(1.08);
        }

        /* Thân nội dung trích dẫn */
        .expert-card-body {
            position: relative;
            z-index: 1;
            flex: 1;
            margin-bottom: 20px;
        }

        .expert-card-quote {
            font-size: 0.96rem;
            color: #334155;
            line-height: 1.68;
            margin: 0;
            font-style: italic;
        }

        /* Chữ ký tác giả ở đáy card: Avatar tròn nhỏ + Tên + Chức vụ */
        .expert-card-author-block {
            display: flex;
            align-items: center;
            gap: 14px;
            padding-top: 16px;
            border-top: 1px solid var(--border-subtle);
            position: relative;
            z-index: 1;
        }

        .expert-avatar-frame {
            width: 58px;
            height: 58px;
            min-width: 58px;
            border-radius: 50%;
            padding: 2.5px;
            background: #ffffff;
            border: 2px solid var(--istec-bright-green);
            box-shadow: 0 0 0 3px rgba(97, 166, 14, 0.14), 0 3px 10px rgba(0, 92, 77, 0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-shrink: 0;
            transition: box-shadow 0.25s ease, transform 0.25s ease;
        }

        .expert-slide-card:hover .expert-avatar-frame {
            transform: scale(1.04);
            box-shadow: 0 0 0 4px rgba(97, 166, 14, 0.25), 0 6px 14px rgba(0, 92, 77, 0.18);
        }

        .expert-avatar-img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            display: block;
        }

        .expert-author-info {
            flex: 1;
            min-width: 0;
        }

        .expert-card-name {
            font-size: 1.05rem;
            font-weight: 800;
            color: var(--dark-main);
            margin: 0 0 3px 0;
            letter-spacing: -0.01em;
            text-transform: uppercase;
            line-height: 1.25;
        }

        .expert-card-role {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--istec-deep-green);
            margin: 0 0 3px 0;
            line-height: 1.35;
        }

        .expert-card-affil {
            font-size: 0.77rem;
            color: var(--dark-muted);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 5px;
            line-height: 1.3;
        }

        /* Nút điều hướng slide chuyên gia */
        .btn-slider-square {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-square);
            border: 1px solid var(--border-light);
            background: #ffffff;
            color: var(--dark-main);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer !important;
            transition: all 0.2s ease;
        }

        .btn-slider-square:hover {
            background: var(--istec-deep-green);
            color: #ffffff !important;
            border-color: var(--istec-deep-green);
            transform: scale(1.05);
        }

        /* Thanh phân trang điều khiển slide */
        .expert-nav-lines {
            display: flex;
            gap: 12px;
            align-items: center;
            justify-content: center;
            margin-top: 24px;
        }

        .expert-nav-item {
            width: 38px;
            height: 4px;
            background: #e2e8f0;
            border-radius: 2px;
            cursor: pointer !important;
            transition: all 0.3s ease;
            border: none;
            padding: 0;
        }

        .expert-nav-item.active {
            background: var(--istec-deep-green) !important;
            width: 54px;
        }

        .istec-mobile-only-dot {
            display: none;
        }

        @media (max-width: 1024px) {
            .istec-mobile-only-dot {
                display: block;
            }
        }

        /* ── LOGO FULL MÀU KO GRAY TRONG MARQUEE KIỂM ĐỊNH ── */
        .marquee-square-container {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 34px 0;
            overflow: hidden;
            margin-bottom: 36px;
            position: relative;
        }

        .marquee-track-infinite {
            display: flex;
            width: 100%;
            overflow: hidden;
            mask-image: linear-gradient(to right, transparent, black 4%, black 96%, transparent);
            -webkit-mask-image: linear-gradient(to right, transparent, black 4%, black 96%, transparent);
        }

        .marquee-slides-track {
            display: flex;
            gap: 60px;
            align-items: center;
            flex-shrink: 0;
            min-width: 100%;
            animation: istecScrollMarquee 24s linear infinite;
        }

        @keyframes istecScrollMarquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* LOGO FULL MÀU 100%, HOÀN TOÀN KHÔNG DÙNG GRAYSCALE */
        .logo-acc-istec {
            height: 52px;
            width: auto;
            max-width: 170px;
            object-fit: contain;
            filter: none !important;        /* FULL MÀU GỐC */
            opacity: 1 !important;
            transition: transform 0.25s ease;
        }

        .logo-acc-istec:hover {
            transform: scale(1.08);
        }

        /* ── ACTIVE MÀU XANH BRAND ISTEC ── */
        .timeline-tabs-clean {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 28px;
            flex-wrap: wrap;
        }

        .btn-tab-square {
            padding: 11px 22px;
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--dark-muted);
            cursor: pointer !important;
            transition: all 0.2s ease;
        }

        .btn-tab-square:hover:not(.active) {
            border-color: var(--istec-deep-green);
            color: var(--istec-deep-green);
        }

        /* Active màu xanh brand ISTEC chuẩn directive */
        .btn-tab-square.active {
            background: var(--istec-deep-green) !important;
            color: #ffffff !important;
            border-color: var(--istec-deep-green) !important;
            box-shadow: 0 4px 14px rgba(0, 92, 77, 0.25) !important;
        }

        /* ── SECTION LỘ TRÌNH 15 MÔN: NỀN XANH TỐI, CÁC ITEM VẪN TRẮNG ── */
        .section-syllabus-darkgreen {
            background: #002c24 !important; /* Xanh tối đặc trưng ISTEC */
            color: #ffffff;
            position: relative;
            padding: 85px 0 !important;
        }

        .section-syllabus-darkgreen .istec-label-top {
            color: #6ee7b7 !important; /* Xanh ngọc mint sáng */
        }

        .section-syllabus-darkgreen .istec-heading-large {
            color: #ffffff !important;
        }

        .section-syllabus-darkgreen .istec-body-lead {
            color: #cbd5e1 !important;
        }

        /* Tabs trên nền xanh tối */
        .section-syllabus-darkgreen .btn-tab-square {
            background: rgba(255, 255, 255, 0.08);
            color: #f1f5f9;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(4px);
        }

        .section-syllabus-darkgreen .btn-tab-square:hover:not(.active) {
            background: rgba(255, 255, 255, 0.18);
            color: #ffffff;
            border-color: #ffffff;
        }

        .section-syllabus-darkgreen .btn-tab-square.active {
            background: #ffffff !important;
            color: #002c24 !important;
            font-weight: 800 !important;
            border-color: #ffffff !important;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.35) !important;
        }

        /* CÁC ITEM ACCORDION VẪN TRẮNG NGUYÊN BẢN TRÊN NỀN XANH TỐI */
        .section-syllabus-darkgreen .acc-square-box {
            background: #ffffff !important;
            border: none !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25) !important;
            margin-bottom: 14px;
        }

        .section-syllabus-darkgreen .acc-square-header {
            background: #ffffff !important;
            color: var(--dark-main) !important;
        }

        .section-syllabus-darkgreen .acc-square-header:hover {
            background: #f8fafc !important;
        }

        .section-syllabus-darkgreen .acc-square-title {
            color: var(--dark-main) !important;
        }

        .section-syllabus-darkgreen .acc-square-panel {
            background: #ffffff !important;
        }

        .section-syllabus-darkgreen .course-row-square {
            background: #f8fafc !important;
            border: 1px solid #e2e8f0 !important;
            color: var(--dark-main) !important;
        }

        /* ── BỐ CỤC 2 CỘT: FAQ BÊN TRÁI, FORM BÊN PHẢI ── */
        .faq-form-grid-2 {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 40px;
            align-items: flex-start;
        }

        .faq-col-left {
            padding-right: 10px;
        }

        .form-col-right {
            position: sticky;
            top: 90px;
        }

        /* ── FORM FIELDS ĐẦY ĐỦ CÁC TRƯỜNG CHUẨN ẢNH NGƯỜI DÙNG ── */
        .form-full-fields-wrap {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .form-grid-2-fields {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .form-field-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .form-field-label {
            font-size: 0.84rem;
            font-weight: 750;
            color: var(--dark-main);
        }

        .form-field-input,
        .form-field-select,
        .form-field-textarea {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            font-size: 0.94rem;
            color: var(--dark-main);
            background: #ffffff;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            box-sizing: border-box;
        }

        .form-field-input:focus,
        .form-field-select:focus,
        .form-field-textarea:focus {
            border-color: var(--istec-deep-green);
            box-shadow: 0 0 0 3px rgba(0, 92, 77, 0.12);
        }

        .form-field-textarea {
            resize: vertical;
            min-height: 80px;
            line-height: 1.5;
        }

        /* ── 6 THÁCH THỨC SỰ NGHIỆP ── */
        .grid-3-cols {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .num-square-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: var(--radius-square);
            background: #f3f4f6;
            color: var(--istec-deep-green);
            font-size: 0.9rem;
            font-weight: 800;
            margin-bottom: 14px;
        }

        .card-inner-title {
            font-size: 1.1rem;
            font-weight: 750;
            color: var(--dark-main);
            margin-bottom: 10px;
            line-height: 1.4;
            text-wrap: balance;
        }

        .card-inner-desc {
            font-size: 0.93rem;
            color: var(--dark-sub);
            line-height: 1.6;
        }

        /* ── 5 GIÁ TRỊ CỐT LÕI ── */
        .grid-5-cols {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
            margin-top: 36px;
        }

        .value-card-square {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 24px 18px;
            transition: all 0.25s ease;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .value-card-square:hover {
            border-color: #cbd5e1;
            transform: translateY(-3px);
            box-shadow: var(--shadow-card);
        }

        .value-icon-box {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-square);
            background: #f0fdf4;
            color: var(--istec-bright-green);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px;
        }

        .value-card-name {
            font-size: 1.02rem;
            font-weight: 750;
            color: var(--dark-main);
            margin-bottom: 8px;
            line-height: 1.35;
        }

        .value-card-txt {
            font-size: 0.88rem;
            color: var(--dark-sub);
            line-height: 1.55;
        }

        /* ── 2 CỘT NĂNG LỰC & LỢI ÍCH ── */
        .grid-2-cols {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
        }

        .pillar-square-box {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 34px 30px;
            box-shadow: var(--shadow-card);
            transition: all 0.25s ease;
        }

        .pillar-square-box:hover {
            border-color: #cbd5e1;
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }

        /* Thẻ Lợi ích: Màu xanh ISTEC Signature */
        .pillar-square-box.is-istec-green {
            background: linear-gradient(150deg, #005C4D 0%, #004237 100%);
            border: 1px solid rgba(97, 166, 14, 0.45);
            box-shadow: 0 14px 36px rgba(0, 92, 77, 0.22);
            position: relative;
            overflow: hidden;
            transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease;
        }

        .pillar-square-box.is-istec-green::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(97, 166, 14, 0.22) 0%, transparent 70%);
            pointer-events: none;
        }

        .pillar-square-box.is-istec-green:hover {
            transform: translateY(-5px);
            border-color: rgba(97, 166, 14, 0.85);
            box-shadow: 0 20px 46px rgba(0, 92, 77, 0.35);
        }

        .pillar-square-box.is-istec-green .pillar-head-title {
            color: #ffffff !important;
        }

        .pillar-square-box.is-istec-green .square-dot {
            background: #a3e635 !important;
            box-shadow: 0 0 12px rgba(163, 230, 53, 0.7);
        }

        .pillar-square-box.is-istec-green .clean-tick-list li {
            color: #e2e8f0 !important;
        }

        .pillar-square-box.is-istec-green .clean-tick-list li strong {
            color: #ffffff !important;
            font-weight: 750;
        }

        .pillar-square-box.is-istec-green .clean-tick-list svg {
            color: #a3e635 !important;
            stroke: #a3e635 !important;
            filter: drop-shadow(0 2px 6px rgba(163, 230, 53, 0.45));
        }

        .pillar-head-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--dark-main);
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .square-dot {
            width: 10px;
            height: 10px;
            background: var(--istec-bright-green);
            border-radius: 2px;
        }

        .clean-tick-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .clean-tick-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 0.96rem;
            color: var(--dark-sub);
            line-height: 1.55;
        }

        .clean-tick-list svg {
            color: var(--istec-bright-green);
            flex-shrink: 0;
            margin-top: 3px;
        }

        /* ── ACCORDION ── */
        .accordion-square-wrap {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .acc-square-box {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            overflow: hidden;
            transition: all 0.25s ease;
        }

        .acc-square-box.open {
            border-color: var(--istec-deep-green) !important;
            box-shadow: 0 6px 20px rgba(0, 92, 77, 0.12) !important;
        }

        .acc-square-header {
            width: 100%;
            padding: 18px 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #ffffff;
            border: none;
            cursor: pointer !important;
            text-align: left;
            transition: background 0.2s ease;
        }

        .acc-square-header svg {
            transition: transform 0.25s ease, color 0.25s ease;
        }

        .acc-square-box.open .acc-square-header svg {
            transform: rotate(180deg);
            color: var(--istec-deep-green);
        }

        .acc-square-header:hover {
            background: #f8fafc;
        }

        .acc-square-title {
            font-size: 1.05rem;
            font-weight: 800;
            color: var(--dark-main);
        }

        .acc-square-panel {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s ease;
            background: #ffffff;
        }

        .acc-square-content {
            padding: 0 22px 20px;
        }

        .course-row-square {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 16px;
            background: #f9fafb;
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-square);
            margin-bottom: 8px;
            font-size: 0.92rem;
        }

        /* ── KHUNG HỌC PHÍ VUÔNG VỨC ── */
        .tuition-square-card {
            max-width: 820px;
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
            padding: 36px 28px;
            text-align: center;
        }

        .tuition-price-headline {
            font-size: clamp(2.4rem, 4vw, 3.2rem);
            font-weight: 800;
            color: var(--istec-bright-green);
            line-height: 1.1;
            margin: 8px 0;
        }

        .tuition-body-pad {
            padding: 36px 32px;
        }

        .istec-hero-logo {
            height: 68px;
            width: auto;
            display: block;
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
                max-width: none;
                margin-top: 0 !important;
            }
            .istec-white-bar-card {
                grid-template-columns: repeat(2, 1fr);
            }
            .expert-slide-card {
                flex: 0 0 100%;
                min-width: 100%;
                padding: 24px 22px;
            }
            .faq-form-grid-2 {
                grid-template-columns: 1fr;
                gap: 48px;
            }
            .form-col-right {
                position: static;
            }
            .grid-3-cols {
                grid-template-columns: repeat(2, 1fr);
            }
            .grid-5-cols {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .istec-hero-btn-group {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        /* Nút Scroll Top kiểu App trên Mobile (chỉ hiện trên mobile, cách xuống, không đè nút Reels) */
        .app-back-to-top {
            display: none !important;
        }

        @media (max-width: 768px) {
            .app-back-to-top {
                display: flex !important;
                align-items: center;
                justify-content: center;
                gap: 6px;
                position: fixed;
                bottom: 22px;
                left: 50%;
                transform: translateX(-50%) translateY(20px);
                background: rgba(0, 44, 36, 0.96);
                color: #ffffff;
                border: 1px solid rgba(255, 255, 255, 0.2);
                border-radius: 9999px;
                padding: 8px 18px;
                font-size: 0.82rem;
                font-weight: 700;
                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.35);
                z-index: 99999;
                opacity: 0;
                pointer-events: none;
                transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.3s ease;
                white-space: nowrap;
                cursor: pointer !important;
            }

            .app-back-to-top.visible {
                opacity: 1 !important;
                pointer-events: auto !important;
                transform: translateX(-50%) translateY(0) !important;
            }

            .app-back-to-top:hover,
            .app-back-to-top:active {
                background: #00221c;
                transform: translateX(-50%) translateY(-2px) !important;
            }

            .app-back-to-top svg {
                width: 13px;
                height: 13px;
            }
        }

        @media (max-width: 768px) {
            .istec-hero-container {
                padding-top: 130px !important;
                padding-bottom: 35px !important;
            }
            .istec-hero-logo {
                height: 40px !important;
                width: auto !important;
                margin-bottom: 14px !important;
            }
            .istec-hero-headline {
                font-size: 1.75rem !important;
                line-height: 1.25 !important;
            }

            /* 2 nút hero trên mobile nằm trên 1 hàng */
            .istec-hero-btn-group {
                display: grid !important;
                grid-template-columns: 1fr 1fr !important;
                gap: 10px !important;
                width: 100% !important;
            }
            .istec-hero-btn-group .btn-istec-square-dark,
            .istec-hero-btn-group .btn-istec-square-green {
                width: 100% !important;
                padding: 12px 6px !important;
                font-size: 0.84rem !important;
                justify-content: center !important;
                text-align: center !important;
                box-sizing: border-box !important;
                white-space: nowrap !important;
                gap: 6px !important;
            }
            .istec-hero-btn-group svg {
                width: 13px !important;
                height: 13px !important;
            }

            /* Bỏ 4 nút kỳ trên mobile (học viên tự dropdown toggle card) */
            .timeline-tabs-clean {
                display: none !important;
            }

            /* Thách thức trên mobile dạng slidedot */
            .challenges-slider-container {
                position: relative;
                width: 100%;
            }
            .challenges-slider-container .grid-3-cols {
                display: flex !important;
                overflow-x: auto !important;
                scroll-snap-type: x mandatory !important;
                scroll-behavior: smooth !important;
                gap: 14px !important;
                padding: 4px 4px 14px !important;
                -webkit-overflow-scrolling: touch !important;
                scrollbar-width: none !important;
            }
            .challenges-slider-container .grid-3-cols::-webkit-scrollbar {
                display: none !important;
            }
            .challenges-slider-container .grid-3-cols .istec-square-card {
                flex: 0 0 88% !important;
                min-width: 88% !important;
                max-width: 88% !important;
                scroll-snap-align: center !important;
                margin: 0 !important;
            }
            .challenge-dots-wrap {
                display: flex !important;
                justify-content: center !important;
                align-items: center !important;
                gap: 8px !important;
                margin-top: 14px !important;
            }
            .challenge-dot {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: #cbd5e1;
                transition: all 0.25s ease;
                border: none;
                padding: 0;
                cursor: pointer;
            }
            .challenge-dot.active {
                width: 22px;
                border-radius: 4px;
                background: var(--istec-deep-green);
            }

            .istec-real-parallax-wrap {
                height: 300px;
                padding: 20px 20px;
            }
            .istec-white-bar-card {
                grid-template-columns: 1fr;
            }
            .form-grid-2-fields {
                grid-template-columns: 1fr;
            }
            .grid-2-cols {
                grid-template-columns: 1fr;
            }
            .grid-5-cols {
                grid-template-columns: 1fr;
            }
            .expert-slide-card {
                padding: 22px 18px;
            }
            .expert-avatar-frame {
                width: 52px;
                height: 52px;
                min-width: 52px;
            }
            .expert-card-name {
                font-size: 1rem;
            }
            .expert-card-quote {
                font-size: 0.9rem;
                line-height: 1.55;
            }

            .istec-stats-strip {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 12px !important;
            }
            .stat-strip-num {
                font-size: 1.75rem !important;
            }
            .admission-grid-wrap {
                grid-template-columns: 1fr !important;
            }
            .steps-grid-inner {
                grid-template-columns: 1fr !important;
            }
        }

        /* ── 4 CON SỐ ẤN TƯỢNG (BRIEF) ── */
        .istec-stats-strip {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-top: 36px;
        }

        .stat-strip-card {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 24px 20px;
            text-align: center;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.04);
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .stat-strip-card:hover {
            transform: translateY(-3px);
            border-color: var(--istec-deep-green);
        }

        .stat-strip-num {
            font-size: 2.1rem;
            font-weight: 800;
            color: var(--istec-deep-green);
            line-height: 1.1;
            margin-bottom: 6px;
            font-variant-numeric: tabular-nums;
        }

        .stat-strip-label {
            font-size: 0.88rem;
            color: var(--dark-muted);
            line-height: 1.45;
        }

        /* ── QUY TRÌNH TUYỂN SINH (BRIEF) ── */
        .admission-grid-wrap {
            display: grid;
            grid-template-columns: 1fr 1.6fr;
            gap: 28px;
            align-items: stretch;
        }

        .steps-grid-inner {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        @media (min-width: 769px) {
            .challenge-dots-wrap {
                display: none !important;
            }
        }

        /* ── SECTION POSITIONING & CONTAINER Z-INDEX FOR DECOR SVGS ── */
        .istec-hero-container,
        .istec-section-box,
        .istec-dark-green-section,
        .section-syllabus-darkgreen {
            position: relative;
            overflow: hidden;
        }

        .istec-hero-container > .container,
        .istec-section-box > .container,
        .istec-dark-green-section > .container,
        .section-syllabus-darkgreen > .container {
            position: relative;
            z-index: 2;
        }

        /* ── DECORATIVE SVG CONTAINERS & AMBIENT ELEMENTS ── */
        .istec-decor-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            user-select: none;
            z-index: 1;
            overflow: hidden;
        }

        .istec-decor-item {
            position: absolute;
            pointer-events: none;
            user-select: none;
        }

        /* Ambient subtle glowing orbs */
        .ambient-glow-green {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(97, 166, 14, 0.08) 0%, rgba(0, 92, 77, 0.03) 45%, transparent 70%);
            filter: blur(40px);
            pointer-events: none;
        }

        .ambient-glow-mint {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(110, 231, 183, 0.12) 0%, rgba(97, 166, 14, 0.04) 50%, transparent 70%);
            filter: blur(45px);
            pointer-events: none;
        }

        /* Continuous Ambient Keyframe Animations */
        @keyframes istecFloatSlow {
            0% { transform: translate3d(0, 0, 0); }
            50% { transform: translate3d(0, -10px, 0); }
            100% { transform: translate3d(0, 0, 0); }
        }

        @keyframes istecFloatSlowRev {
            0% { transform: translate3d(0, 0, 0); }
            50% { transform: translate3d(0, 10px, 0); }
            100% { transform: translate3d(0, 0, 0); }
        }

        @keyframes istecSpinSlow {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes istecSpinRev {
            0% { transform: rotate(360deg); }
            100% { transform: rotate(0deg); }
        }

        @keyframes istecPulseGlow {
            0%, 100% { opacity: 0.5; transform: scale(1); }
            50% { opacity: 0.85; transform: scale(1.06); }
        }

        @keyframes istecDashFlow {
            0% { stroke-dashoffset: 200; }
            100% { stroke-dashoffset: 0; }
        }

        @keyframes istecBadgeShimmer {
            0% { background-position: -150% 0; }
            100% { background-position: 150% 0; }
        }

        .anim-float {
            animation: istecFloatSlow 8s ease-in-out infinite;
        }

        .anim-float-rev {
            animation: istecFloatSlowRev 9s ease-in-out infinite;
        }

        .anim-spin-slow {
            animation: istecSpinSlow 75s linear infinite;
            transform-origin: center center;
        }

        .anim-spin-rev {
            animation: istecSpinRev 85s linear infinite;
            transform-origin: center center;
        }

        .anim-pulse-glow {
            animation: istecPulseGlow 5s ease-in-out infinite;
            transform-origin: center center;
        }

        .anim-dash {
            stroke-dasharray: 8 6;
            animation: istecDashFlow 20s linear infinite;
        }

        /* ── SCROLL REVEAL (INTERSECTION OBSERVER) ── */
        .istec-reveal {
            opacity: 0;
            transform: translateY(26px);
            transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }

        .istec-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Staggered card reveals */
        .istec-stagger > * {
            opacity: 0;
            transform: translateY(22px);
            transition: opacity 0.65s cubic-bezier(0.16, 1, 0.3, 1), transform 0.65s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }

        .istec-stagger.is-visible > *:nth-child(1) { opacity: 1; transform: translateY(0); transition-delay: 0.04s; }
        .istec-stagger.is-visible > *:nth-child(2) { opacity: 1; transform: translateY(0); transition-delay: 0.10s; }
        .istec-stagger.is-visible > *:nth-child(3) { opacity: 1; transform: translateY(0); transition-delay: 0.16s; }
        .istec-stagger.is-visible > *:nth-child(4) { opacity: 1; transform: translateY(0); transition-delay: 0.22s; }
        .istec-stagger.is-visible > *:nth-child(5) { opacity: 1; transform: translateY(0); transition-delay: 0.28s; }
        .istec-stagger.is-visible > *:nth-child(6) { opacity: 1; transform: translateY(0); transition-delay: 0.34s; }

        /* ── ENHANCED CARD HOVER MICRO-INTERACTIONS ── */
        .istec-square-card {
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.25s ease;
        }

        .istec-square-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 92, 77, 0.08);
            border-color: rgba(97, 166, 14, 0.35);
        }

        .value-card-square {
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.25s ease;
        }

        .value-card-square:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(0, 92, 77, 0.09);
            border-color: var(--istec-deep-green);
        }

        .value-card-square:hover .value-icon-box {
            transform: scale(1.1) rotate(4deg);
            background: rgba(97, 166, 14, 0.18);
        }

        .value-icon-box {
            transition: transform 0.3s ease, background 0.3s ease;
        }

        .stat-strip-card {
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.25s ease;
        }

        .stat-strip-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 24px rgba(0, 92, 77, 0.08);
            border-color: var(--istec-deep-green);
        }

        .pillar-square-box {
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.25s ease;
        }

        .pillar-square-box:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
            border-color: rgba(97, 166, 14, 0.35);
        }

        /* Shimmer on discount pill */
        .tuition-header-dark span[style*="background: rgba(97, 166, 14"] {
            background: linear-gradient(90deg, rgba(97, 166, 14, 0.25) 0%, rgba(163, 230, 53, 0.45) 50%, rgba(97, 166, 14, 0.25) 100%) !important;
            background-size: 200% 100% !important;
            animation: istecBadgeShimmer 3.5s linear infinite;
        }

        /* Subtle glow pulse on hero spec box */
        .istec-spec-box {
            position: relative;
            transition: box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .istec-spec-box:hover {
            box-shadow: 0 14px 40px rgba(0, 92, 77, 0.1);
            border-color: rgba(97, 166, 14, 0.4);
        }

        @media (prefers-reduced-motion: reduce) {
            .istec-reveal,
            .istec-stagger > *,
            .anim-float,
            .anim-float-rev,
            .anim-spin-slow,
            .anim-spin-rev,
            .anim-pulse-glow,
            .anim-dash {
                animation: none !important;
                transition: none !important;
                opacity: 1 !important;
                transform: none !important;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>

    <!-- ══ HEADER ĐỒNG BỘ CHUẨN IDEAS ══ -->
    <?php get_template_part('shared-header'); ?>

    <!-- ══ 1. HERO SECTION (CÁCH TOP XUỐNG ĐẦY ĐỦ, CHUẨN STYLE ISTEC) ══ -->
    <section class="istec-hero-container">
        <!-- ── SVG DECOR HERO (SUBTLE EUROPEAN TECH ACCENTS) ── -->
        <div class="istec-decor-bg" aria-hidden="true">
            <!-- Ambient Radial Glows -->
            <div class="ambient-glow-green anim-pulse-glow" style="width: 520px; height: 520px; top: -140px; left: -60px;"></div>
            <div class="ambient-glow-green" style="width: 380px; height: 380px; bottom: -80px; right: -100px; opacity: 0.6;"></div>

            <!-- Top-Left Tech Orbit Concentric Rings -->
            <div class="istec-decor-item anim-spin-slow" style="top: -80px; left: -80px; width: 420px; height: 420px; opacity: 0.12;">
                <svg viewBox="0 0 420 420" fill="none" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <circle cx="210" cy="210" r="200" stroke="#005C4D" stroke-width="1.2" stroke-dasharray="6 6"/>
                    <circle cx="210" cy="210" r="160" stroke="#61A60E" stroke-width="1.5"/>
                    <circle cx="210" cy="210" r="110" stroke="#005C4D" stroke-width="1" stroke-dasharray="3 4"/>
                    <circle cx="210" cy="210" r="60" stroke="#61A60E" stroke-width="1"/>
                    <circle cx="370" cy="210" r="5" fill="#61A60E"/>
                    <circle cx="50" cy="210" r="4" fill="#005C4D"/>
                    <circle cx="210" cy="50" r="4" fill="#61A60E"/>
                    <circle cx="210" cy="370" r="5" fill="#005C4D"/>
                    <line x1="210" y1="0" x2="210" y2="420" stroke="#005C4D" stroke-width="0.8" stroke-dasharray="4 6"/>
                    <line x1="0" y1="210" x2="420" y2="210" stroke="#005C4D" stroke-width="0.8" stroke-dasharray="4 6"/>
                </svg>
            </div>

            <!-- Dot Matrix Grid in Background - Top-Right -->
            <div class="istec-decor-item" style="top: 40px; right: 2%; width: 220px; height: 260px; opacity: 0.08;">
                <svg width="220" height="260" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <pattern id="hero-dots" x="0" y="0" width="22" height="22" patternUnits="userSpaceOnUse">
                        <circle cx="2.5" cy="2.5" r="2.5" fill="#005C4D"/>
                    </pattern>
                    <rect width="220" height="260" fill="url(#hero-dots)"/>
                </svg>
            </div>

            <!-- Subtle Crosshairs / Corner Marks -->
            <div class="istec-decor-item anim-float" style="top: 160px; left: 28%; opacity: 0.18;">
                <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
                    <path d="M14 0v28M0 14h28" stroke="#61A60E" stroke-width="1.5"/>
                    <circle cx="14" cy="14" r="5" stroke="#61A60E" stroke-width="1" fill="none"/>
                </svg>
            </div>

            <div class="istec-decor-item anim-float-rev" style="bottom: 40px; left: 10%; opacity: 0.14;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M12 0v24M0 12h24" stroke="#005C4D" stroke-width="1.5"/>
                </svg>
            </div>

            <!-- Dynamic Flowing Accent Curve -->
            <div class="istec-decor-item" style="bottom: 0; left: 15%; width: 70%; height: 120px; opacity: 0.06;">
                <svg viewBox="0 0 800 120" fill="none" preserveAspectRatio="none" style="width: 100%; height: 100%;">
                    <path d="M0 100 C 250 140, 450 20, 800 60" stroke="#61A60E" stroke-width="2" fill="none"/>
                    <path d="M0 80 C 280 120, 520 10, 800 40" stroke="#005C4D" stroke-width="1.5" stroke-dasharray="6 4" fill="none"/>
                </svg>
            </div>
        </div>

        <div class="container">
            <div class="istec-hero-flex istec-reveal is-visible">
                <!-- NỘI DUNG CHÍNH (TIÊU ĐỀ 2-TONE & MÔ TẢ PHONG CÁCH CHÂU ÂU) - BÊN TRÁI -->
                <div class="istec-hero-main-content">
                    <!-- Logo ISTEC Paris chính thức to rõ hơn -->
                    <div style="margin-bottom: 18px;">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/logo-istec-paris.svg" 
                             alt="ISTEC Business School Paris Logo" 
                             class="istec-hero-logo" />
                    </div>

                    <h1 class="istec-hero-headline">
                        <span class="hl-dark">MBA</span> <span class="hl-green">Leadership & Business Transformation</span>
                    </h1>

                    <div class="istec-hero-sub-title">
                        Từ người giỏi chuyên môn đến nhà quản trị toàn diện
                    </div>

                    <p class="istec-hero-paragraph">
                        Trong một môi trường kinh doanh ngày càng phức tạp, năng lực chuyên môn giỏi là chưa đủ. Chương trình MBA tại ISTEC Business School Paris giúp người học mở rộng tư duy quản trị đa chiều từ Chiến lược, Lãnh đạo, Tài chính, Vận hành đến Đổi mới sáng tạo và AI, trang bị bản lĩnh sẵn sàng đảm nhận các cương vị quản lý và điều hành cấp cao.
                    </p>

                    <div class="istec-hero-btn-group">
                        <a href="#faq-dang-ky" class="btn-istec-square-dark">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            <span>Đăng ký xét tuyển</span>
                        </a>
                        <a href="#chuong-trinh" class="btn-istec-square-green">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 9l-7 7-7-7"/></svg>
                            <span>Khung chương trình</span>
                        </a>
                    </div>
                </div>

                <!-- HỘP THÔNG SỐ NỔI VUÔNG VỨC (ACCESS, RHYTHM, BACK TO SCHOOL, DIPLOMA, TUITION) - BÊN PHẢI -->
                <div class="istec-spec-box">
                    <div class="spec-item">
                        <div class="spec-label">ACCESS</div>
                        <div class="spec-value">Xét tuyển hồ sơ & Phỏng vấn trực tuyến</div>
                    </div>

                    <div class="spec-divider"></div>

                    <div class="spec-item">
                        <div class="spec-label">RHYTHM</div>
                        <div class="spec-value">12 Tháng • 100% Trực tuyến linh hoạt cho người đi làm</div>
                    </div>

                    <div class="spec-divider"></div>

                    <div class="spec-item">
                        <div class="spec-label">BACK TO SCHOOL</div>
                        <div class="spec-value">Tháng 03 & Tháng 10 hàng năm</div>
                    </div>

                    <div class="spec-divider"></div>

                    <div class="spec-item">
                        <div class="spec-label">DIPLOMA</div>
                        <div class="spec-value">Thạc sĩ Quản trị Kinh doanh (MBA) - RNCP Level 7 (Bac+5)</div>
                    </div>

                    <div class="spec-divider"></div>

                    <div class="spec-item">
                        <div class="spec-label">TUITION & FEES</div>
                        <div class="spec-value">
                            <span style="text-decoration: line-through; color: #9ca3af; font-size: 0.9rem;">8.500 EUR</span>
                            <span style="color: var(--istec-bright-green); font-weight: 800; margin-left: 6px;">6.500 EUR</span>
                            <div style="font-size: 0.85rem; color: #6b7280; margin-top: 2px;">Lệ phí hồ sơ: 200 EUR</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ FULL-WIDTH REAL PARALLAX BANNER (ẢNH CUỘN PARALLAX THỰC SỰ TRÊN ẢNH SINH VIÊN) ══ -->
    <div class="istec-real-parallax-wrap" id="parallaxWrap1">
        <div class="istec-parallax-img-holder" style="background: #002c24 url('<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/istec-campus-students.jpg') center 25% / cover no-repeat;">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/istec-campus-students.jpg" 
                 alt="Sinh viên trường Kinh doanh ISTEC Paris" 
                 class="parallax-inner-img" 
                 id="parallaxImg1" 
                 loading="eager" />
        </div>
        <div class="parallax-caption-tag">
            <span>ISTEC BUSINESS SCHOOL PARIS • CAMPUS LIFE</span>
        </div>
    </div>

    <!-- ══ 2. CURRICULUM & PROGRAM (CHUẨN THEO SCREENSHOT 4 CỦA ISTEC) ══ -->
    <section class="istec-section-box" id="chuong-trinh">
        <!-- ── SVG DECOR CURRICULUM ── -->
        <div class="istec-decor-bg" aria-hidden="true">
            <div class="ambient-glow-green" style="width: 400px; height: 400px; top: -50px; right: -80px; opacity: 0.5;"></div>

            <!-- Top Right Geometric Architectural Lines -->
            <div class="istec-decor-item anim-float" style="top: 20px; right: 4%; width: 200px; height: 180px; opacity: 0.09;">
                <svg viewBox="0 0 200 180" fill="none" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <rect x="20" y="20" width="160" height="140" stroke="#005C4D" stroke-width="1.2" stroke-dasharray="5 5"/>
                    <rect x="45" y="45" width="110" height="90" stroke="#61A60E" stroke-width="1"/>
                    <line x1="0" y1="20" x2="200" y2="20" stroke="#005C4D" stroke-width="0.8"/>
                    <line x1="20" y1="0" x2="20" y2="180" stroke="#005C4D" stroke-width="0.8"/>
                    <circle cx="20" cy="20" r="4" fill="#61A60E"/>
                    <circle cx="180" cy="160" r="4" fill="#005C4D"/>
                </svg>
            </div>

            <!-- Bottom Left Dot Matrix Cluster -->
            <div class="istec-decor-item" style="bottom: 20px; left: 3%; width: 180px; height: 140px; opacity: 0.07;">
                <svg width="180" height="140" fill="none">
                    <pattern id="curr-dots" x="0" y="0" width="18" height="18" patternUnits="userSpaceOnUse">
                        <circle cx="2" cy="2" r="2" fill="#61A60E"/>
                    </pattern>
                    <rect width="180" height="140" fill="url(#curr-dots)"/>
                </svg>
            </div>

            <!-- Subtle Crosshair Accent -->
            <div class="istec-decor-item anim-float-rev" style="top: 45%; left: 8%; opacity: 0.12;">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none">
                    <path d="M11 0v22M0 11h22" stroke="#00876C" stroke-width="1.5"/>
                </svg>
            </div>
        </div>

        <div class="container">
            <div style="margin-bottom: 36px;" class="istec-reveal">
                <span class="istec-label-top">CURRICULUM</span>
                <h2 class="istec-heading-large">Chương trình đào tạo MBA ISTEC</h2>
                <p class="istec-body-lead">
                    Chương trình Thạc sĩ Quản trị Kinh doanh tại ISTEC Paris cung cấp nền tảng học thuật vững chắc (60 tín chỉ ECTS Châu Âu) với 15 môn học thực tiễn và luận văn tốt nghiệp. Học phí công bố là 8.500 EUR, ưu đãi đăng ký qua Viện IDEAS còn 6.500 EUR cùng 200 EUR lệ phí hồ sơ. Bằng cấp được Bộ Giáo dục Đại học và Nghiên cứu Pháp cấp chuẩn Visa Bac+5 và đăng ký Khung nghề nghiệp quốc gia RNCP Level 7.
                </p>
            </div>

            <!-- Focus card vuông vức -->
            <div class="istec-square-card istec-reveal" style="margin-bottom: 48px; border-left: 4px solid var(--istec-teal); padding: 28px 32px;">
                <div style="font-size: 0.8rem; font-weight: 800; color: var(--istec-teal); text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 6px;">
                    SPECIALIZATION FOCUS
                </div>
                <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--dark-main); margin-bottom: 10px;">
                    Định hướng chuyên sâu: Quản trị chiến lược & Chuyển đổi số cùng AI
                </h3>
                <p style="font-size: 0.95rem; color: var(--dark-sub); margin: 0; line-height: 1.6;">
                    Học viên được trang bị tư duy quản trị tổng thể kết hợp phương pháp luận phân tích kinh doanh dữ liệu lớn và chiến lược tích hợp trí tuệ nhân tạo (AI) vào giải quyết các bài toán vận hành thực tiễn của doanh nghiệp.
                </p>
            </div>

            <!-- 4 Con số ấn tượng từ Brief ISTEC -->
            <div class="istec-stats-strip istec-stagger">
                <div class="stat-strip-card">
                    <div class="stat-strip-num" data-counter-target="60" data-counter-suffix="+">60+</div>
                    <div class="stat-strip-label">Năm đào tạo kinh doanh & quản trị tại Pháp</div>
                </div>
                <div class="stat-strip-card">
                    <div class="stat-strip-num" data-counter-target="3500" data-counter-format="dot" data-counter-suffix="+">3.500+</div>
                    <div class="stat-strip-label">Doanh nghiệp đối tác toàn cầu</div>
                </div>
                <div class="stat-strip-card">
                    <div class="stat-strip-num" data-counter-target="8000" data-counter-format="dot" data-counter-suffix="+">8.000+</div>
                    <div class="stat-strip-label">Cựu học viên trên 40 quốc gia</div>
                </div>
                <div class="stat-strip-card">
                    <div class="stat-strip-num" data-counter-target="8" data-counter-prefix="Top ">Top 8</div>
                    <div class="stat-strip-label">Trường Kinh doanh Post-Bac (Le Parisien)</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 3. MỤC XANH ĐẬM: LESSONS & GOALS (CHUẨN THEO SCREENSHOT 5 CỦA ISTEC) ══ -->
    <section class="istec-dark-green-section">
        <!-- ── SVG DECOR DARK GREEN SECTION ── -->
        <div class="istec-decor-bg" aria-hidden="true">
            <div class="ambient-glow-mint anim-pulse-glow" style="width: 500px; height: 500px; top: -100px; left: -80px;"></div>
            <div class="ambient-glow-green" style="width: 450px; height: 450px; bottom: -80px; right: -60px; opacity: 0.35;"></div>

            <!-- Top Right Blueprint Celestial Orbit in Mint/Gold -->
            <div class="istec-decor-item anim-spin-rev" style="top: -60px; right: -60px; width: 380px; height: 380px; opacity: 0.13;">
                <svg viewBox="0 0 380 380" fill="none" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <circle cx="190" cy="190" r="170" stroke="#6ee7b7" stroke-width="1" stroke-dasharray="8 6"/>
                    <circle cx="190" cy="190" r="130" stroke="#61A60E" stroke-width="1.2"/>
                    <circle cx="190" cy="190" r="85" stroke="#ffffff" stroke-width="0.8" stroke-dasharray="4 4"/>
                    <circle cx="320" cy="190" r="6" fill="#6ee7b7"/>
                    <circle cx="60" cy="190" r="4" fill="#61A60E"/>
                    <line x1="190" y1="10" x2="190" y2="370" stroke="#6ee7b7" stroke-width="0.8" stroke-dasharray="4 8"/>
                    <line x1="10" y1="190" x2="370" y2="190" stroke="#6ee7b7" stroke-width="0.8" stroke-dasharray="4 8"/>
                </svg>
            </div>

            <!-- Subtle European Academic Emblem Outline Watermark -->
            <div class="istec-decor-item anim-float" style="bottom: 20px; left: 4%; width: 190px; height: 190px; opacity: 0.08;">
                <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <circle cx="100" cy="100" r="90" stroke="#6ee7b7" stroke-width="1.5"/>
                    <circle cx="100" cy="100" r="75" stroke="#6ee7b7" stroke-width="1" stroke-dasharray="4 4"/>
                    <path d="M100 35 L120 75 L165 75 L130 102 L145 145 L100 120 L55 145 L70 102 L35 75 L80 75 Z" stroke="#61A60E" stroke-width="1.2" fill="none"/>
                </svg>
            </div>

            <!-- Light Grid Pattern -->
            <div class="istec-decor-item" style="top: 30%; right: 12%; width: 140px; height: 140px; opacity: 0.08;">
                <svg width="140" height="140" fill="none">
                    <pattern id="dark-green-dots" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <circle cx="2" cy="2" r="1.5" fill="#6ee7b7"/>
                    </pattern>
                    <rect width="140" height="140" fill="url(#dark-green-dots)"/>
                </svg>
            </div>
        </div>

        <div class="container">
            <!-- Khối 1: Lessons -->
            <div style="margin-bottom: 48px;" class="istec-reveal">
                <h3 class="istec-green-block-title">Lessons (Học phần trọng tâm)</h3>
                <div class="istec-white-bar-card istec-stagger">
                    <div class="bar-item-tick">
                        Strategic Management & Leadership
                    </div>
                    <div class="bar-item-tick">
                        Business Analytics & Decision Making
                    </div>
                    <div class="bar-item-tick">
                        Digital Transformation & AI Strategy
                    </div>
                    <div class="bar-item-tick">
                        International Negotiation & Global Business
                    </div>
                </div>
            </div>

            <!-- Khối 2: Goals -->
            <div style="margin-bottom: 48px;" class="istec-reveal">
                <h3 class="istec-green-block-title">Goals (Mục tiêu năng lực đầu ra)</h3>
                <div class="istec-white-goals-card istec-stagger">
                    <div class="goal-item-tick">
                        <span><strong>Tư duy quản trị tích hợp:</strong> Kết nối nhuần nhuyễn tài chính, marketing, vận hành và công nghệ vào bức tranh tổng thể của doanh nghiệp.</span>
                    </div>
                    <div class="goal-item-tick">
                        <span><strong>Bản lĩnh ra quyết định dữ liệu:</strong> Sử dụng công cụ phân tích kinh doanh và dự báo để đưa ra quyết định chính xác, giảm thiểu rủi ro.</span>
                    </div>
                    <div class="goal-item-tick">
                        <span><strong>Lãnh đạo đa văn hóa & thích ứng toàn cầu:</strong> Dẫn dắt đội ngũ đa quốc gia, mở rộng cơ hội thương mại và đối tác quốc tế.</span>
                    </div>
                    <div class="goal-item-tick">
                        <span><strong>Ứng dụng AI vào vận hành thực tế:</strong> Khai phóng tiềm năng tự động hóa và trí tuệ nhân tạo để gia tăng hiệu suất kinh doanh vượt bậc.</span>
                    </div>
                </div>
            </div>

            <!-- Khối 3: 4 Phương pháp đào tạo thực chiến chuẩn Brief -->
            <div class="istec-reveal">
                <h3 class="istec-green-block-title">Methodology (4 Phương pháp đào tạo thực chiến)</h3>
                <div class="istec-white-bar-card istec-stagger">
                    <div class="bar-item-tick">
                        <span><strong>CASE STUDY:</strong> Phân tích các tình huống kinh doanh thực tế toàn cầu</span>
                    </div>
                    <div class="bar-item-tick">
                        <span><strong>PROJECT:</strong> Ứng dụng kiến thức giải quyết vấn đề trực tiếp của tổ chức</span>
                    </div>
                    <div class="bar-item-tick">
                        <span><strong>DISCUSSION:</strong> Trao đổi và mở rộng góc nhìn cùng chuyên gia & học viên</span>
                    </div>
                    <div class="bar-item-tick">
                        <span><strong>APPLIED LEARNING:</strong> Kết nối nội dung học với công việc và doanh nghiệp</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 4. 6 THÁCH THỨC SỰ NGHIỆP ══ -->
    <section class="istec-section-box bg-alt" id="thach-thuc">
        <!-- ── SVG DECOR CHALLENGES ── -->
        <div class="istec-decor-bg" aria-hidden="true">
            <div class="ambient-glow-green" style="width: 360px; height: 360px; top: 10%; left: -60px; opacity: 0.45;"></div>

            <!-- Ascending Stepped Ladder / Path (Career Progression) -->
            <div class="istec-decor-item anim-float" style="top: 30px; right: 5%; width: 240px; height: 200px; opacity: 0.08;">
                <svg viewBox="0 0 240 200" fill="none" width="100%" height="100%">
                    <path d="M20 180 H70 V140 H120 V100 H170 V60 H220 V20" stroke="#005C4D" stroke-width="2" fill="none"/>
                    <path d="M20 180 H70 V140 H120 V100 H170 V60 H220 V20" stroke="#61A60E" stroke-width="1" stroke-dasharray="4 4" fill="none"/>
                    <circle cx="20" cy="180" r="4" fill="#005C4D"/>
                    <circle cx="70" cy="140" r="4" fill="#005C4D"/>
                    <circle cx="120" cy="100" r="4" fill="#005C4D"/>
                    <circle cx="170" cy="60" r="4" fill="#61A60E"/>
                    <circle cx="220" cy="20" r="5" fill="#61A60E"/>
                </svg>
            </div>

            <!-- Floating Subtle Coordinate Markers -->
            <div class="istec-decor-item anim-float-rev" style="bottom: 40px; left: 5%; opacity: 0.12;">
                <svg width="26" height="26" viewBox="0 0 26 26" fill="none">
                    <path d="M13 0v26M0 13h26" stroke="#61A60E" stroke-width="1.5"/>
                    <rect x="8" y="8" width="10" height="10" stroke="#005C4D" stroke-width="1"/>
                </svg>
            </div>

            <!-- Diagonal Hatched Vector Lines -->
            <div class="istec-decor-item" style="bottom: 10px; right: 15%; width: 160px; height: 80px; opacity: 0.06;">
                <svg width="160" height="80" fill="none">
                    <line x1="0" y1="80" x2="80" y2="0" stroke="#005C4D" stroke-width="1"/>
                    <line x1="30" y1="80" x2="110" y2="0" stroke="#005C4D" stroke-width="1"/>
                    <line x1="60" y1="80" x2="140" y2="0" stroke="#005C4D" stroke-width="1"/>
                    <line x1="90" y1="80" x2="170" y2="0" stroke="#005C4D" stroke-width="1"/>
                </svg>
            </div>
        </div>

        <div class="container">
            <div style="margin-bottom: 40px;" class="istec-reveal">
                <span class="istec-label-top">CAREER CHALLENGES</span>
                <h2 class="istec-heading-large">Thách thức của người đi làm khi bước lên vị trí quản lý</h2>
                <p class="istec-body-lead">
                    Khi chuyển dịch từ vị trí chuyên môn giỏi lên vai trò quản lý và lãnh đạo, người đi làm thường đối mặt với những bước chuyển biến cốt lõi:
                </p>
            </div>

            <div class="challenges-slider-container">
                <div class="grid-3-cols istec-stagger" id="challengeTrack">
                    <div class="istec-square-card">
                        <div class="num-square-badge">01</div>
                        <h3 class="card-inner-title">Ra quyết định trong bức tranh lớn</h3>
                        <p class="card-inner-desc">Không chỉ giải quyết công việc nội bộ mà phải đánh giá tác động toàn diện đến hiệu quả tài chính và chiến lược của doanh nghiệp.</p>
                    </div>

                    <div class="istec-square-card">
                        <div class="num-square-badge">02</div>
                        <h3 class="card-inner-title">Dẫn dắt con người & xây dựng đội ngũ</h3>
                        <p class="card-inner-desc">Từ người trực tiếp thực thi sang người tạo ảnh hưởng, truyền cảm hứng, giải quyết xung đột và thúc đẩy hiệu suất đội nhóm.</p>
                    </div>

                    <div class="istec-square-card">
                        <div class="num-square-badge">03</div>
                        <h3 class="card-inner-title">Kết nối các phòng ban chức năng</h3>
                        <p class="card-inner-desc">Hợp nhất hoạt động của tài chính, marketing, vận hành và nhân sự để đạt được mục tiêu chung của tổ chức.</p>
                    </div>

                    <div class="istec-square-card">
                        <div class="num-square-badge">04</div>
                        <h3 class="card-inner-title">Thích ứng công nghệ và AI</h3>
                        <p class="card-inner-desc">Hiểu và vận dụng công nghệ mới dưới góc nhìn chiến lược ứng dụng kinh doanh, nâng cao lợi thế cạnh tranh.</p>
                    </div>

                    <div class="istec-square-card">
                        <div class="num-square-badge">05</div>
                        <h3 class="card-inner-title">Tư duy kinh doanh quốc tế</h3>
                        <p class="card-inner-desc">Trang bị tư duy quản trị đa quốc gia, làm việc tự tin trong môi trường đa văn hóa và chuỗi cung ứng toàn cầu.</p>
                    </div>

                    <div class="istec-square-card">
                        <div class="num-square-badge">06</div>
                        <h3 class="card-inner-title">Mở rộng cơ hội nghề nghiệp đa ngành</h3>
                        <p class="card-inner-desc">Xây dựng kiến thức quản trị tổng quát vững chắc, sẵn sàng đón nhận cơ hội lãnh đạo cấp cao trong nhiều lĩnh vực.</p>
                    </div>
                </div>

                <!-- Dấu chấm phân trang slidedot trên mobile -->
                <div class="challenge-dots-wrap" id="challengeDots">
                    <button class="challenge-dot active" onclick="goChallengeSlide(0)" type="button" aria-label="Thách thức 1"></button>
                    <button class="challenge-dot" onclick="goChallengeSlide(1)" type="button" aria-label="Thách thức 2"></button>
                    <button class="challenge-dot" onclick="goChallengeSlide(2)" type="button" aria-label="Thách thức 3"></button>
                    <button class="challenge-dot" onclick="goChallengeSlide(3)" type="button" aria-label="Thách thức 4"></button>
                    <button class="challenge-dot" onclick="goChallengeSlide(4)" type="button" aria-label="Thách thức 5"></button>
                    <button class="challenge-dot" onclick="goChallengeSlide(5)" type="button" aria-label="Thách thức 6"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 5. 5 GIÁ TRỊ CỐT LÕI ══ -->
    <section class="istec-section-box" id="gia-tri">
        <!-- ── SVG DECOR CORE VALUES ── -->
        <div class="istec-decor-bg" aria-hidden="true">
            <div class="ambient-glow-green anim-pulse-glow" style="width: 440px; height: 440px; top: -50px; left: 40%; opacity: 0.4;"></div>

            <!-- Pentagonal 5-Axis Central Orbit Ring (5 Core Values) -->
            <div class="istec-decor-item anim-spin-slow" style="top: 50%; left: 50%; width: 500px; height: 500px; margin-top: -250px; margin-left: -250px; opacity: 0.07;">
                <svg viewBox="0 0 500 500" fill="none" width="100%" height="100%">
                    <circle cx="250" cy="250" r="230" stroke="#005C4D" stroke-width="1.2" stroke-dasharray="8 8"/>
                    <circle cx="250" cy="250" r="170" stroke="#61A60E" stroke-width="1"/>
                    <circle cx="250" cy="250" r="100" stroke="#00876C" stroke-width="1" stroke-dasharray="4 6"/>
                    <!-- 5 Equidistant Points -->
                    <circle cx="250" cy="20" r="5" fill="#61A60E"/>
                    <circle cx="469" cy="179" r="5" fill="#005C4D"/>
                    <circle cx="385" cy="436" r="5" fill="#61A60E"/>
                    <circle cx="115" cy="436" r="5" fill="#005C4D"/>
                    <circle cx="31" cy="179" r="5" fill="#61A60E"/>
                </svg>
            </div>

            <!-- Top Left Decorative Matrix -->
            <div class="istec-decor-item" style="top: 30px; left: 4%; width: 140px; height: 140px; opacity: 0.08;">
                <svg width="140" height="140" fill="none">
                    <pattern id="val-dots" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <circle cx="2" cy="2" r="2" fill="#005C4D"/>
                    </pattern>
                    <rect width="140" height="140" fill="url(#val-dots)"/>
                </svg>
            </div>
        </div>

        <div class="container">
            <div style="margin-bottom: 32px;" class="istec-reveal">
                <span class="istec-label-top">CORE VALUES</span>
                <h2 class="istec-heading-large">Từ chuyên môn đến năng lực quản trị toàn diện</h2>
                <p class="istec-body-lead">
                    MBA ISTEC Paris xây dựng tư duy hành động thực tiễn thông qua 5 giá trị cốt lõi:
                </p>
            </div>

            <div class="grid-5-cols istec-stagger">
                <div class="value-card-square">
                    <div class="value-icon-box">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
                    </div>
                    <h3 class="value-card-name">Quản Trị Toàn Diện</h3>
                    <p class="value-card-txt">Kết nối các chức năng cốt lõi của doanh nghiệp trong góc nhìn đồng bộ.</p>
                </div>

                <div class="value-card-square">
                    <div class="value-icon-box">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><path d="m4.93 4.93 4.24 4.24"/><path d="m14.83 9.17 4.24-4.24"/></svg>
                    </div>
                    <h3 class="value-card-name">Dẫn Dắt & Đổi Mới</h3>
                    <p class="value-card-txt">Chuyển dịch từ năng lực chuyên môn sang năng lực lãnh đạo và tạo ảnh hưởng.</p>
                </div>

                <div class="value-card-square">
                    <div class="value-icon-box">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </div>
                    <h3 class="value-card-name">Chuyển Đổi Cùng AI</h3>
                    <p class="value-card-txt">Ứng dụng AI và dữ liệu vào hoạch định chiến lược kinh doanh thực chiến.</p>
                </div>

                <div class="value-card-square">
                    <div class="value-icon-box">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/></svg>
                    </div>
                    <h3 class="value-card-name">Tầm Nhìn Toàn Cầu</h3>
                    <p class="value-card-txt">Năng lực làm việc và quản trị tự tin trong môi trường kinh doanh quốc tế.</p>
                </div>

                <div class="value-card-square">
                    <div class="value-icon-box">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="20 6 9 17 4 12"/></svg>
                    </div>
                    <h3 class="value-card-name">Ứng Dụng Thực Tiễn</h3>
                    <p class="value-card-txt">Giải quyết trực tiếp những thách thức thực tế của doanh nghiệp học viên.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 6. 2 CỘT NĂNG LỰC & LỢI ÍCH ══ -->
    <section class="istec-section-box bg-alt" id="loi-ich">
        <!-- ── SVG DECOR COMPETENCIES ── -->
        <div class="istec-decor-bg" aria-hidden="true">
            <div class="ambient-glow-green" style="width: 420px; height: 420px; bottom: -60px; right: -50px; opacity: 0.45;"></div>

            <!-- Geometric Crest / Shield Outline Watermark -->
            <div class="istec-decor-item anim-float" style="top: 15%; right: 6%; width: 220px; height: 260px; opacity: 0.06;">
                <svg viewBox="0 0 220 260" fill="none" width="100%" height="100%">
                    <path d="M110 10 L200 45 V130 C200 190, 110 245, 110 245 C110 245, 20 190, 20 130 V45 Z" stroke="#005C4D" stroke-width="2" fill="none"/>
                    <path d="M110 30 L180 58 V125 C180 172, 110 220, 110 220 C110 220, 40 172, 40 125 V58 Z" stroke="#61A60E" stroke-width="1.2" stroke-dasharray="6 4" fill="none"/>
                    <line x1="110" y1="30" x2="110" y2="220" stroke="#005C4D" stroke-width="1"/>
                    <line x1="40" y1="125" x2="180" y2="125" stroke="#005C4D" stroke-width="1"/>
                </svg>
            </div>

            <!-- Floating Tech Coordinate -->
            <div class="istec-decor-item anim-float-rev" style="bottom: 30px; left: 8%; opacity: 0.12;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="10" stroke="#61A60E" stroke-width="1.2"/>
                    <path d="M12 2v20M2 12h20" stroke="#61A60E" stroke-width="1"/>
                </svg>
            </div>
        </div>

        <div class="container">
            <div style="margin-bottom: 36px;" class="istec-reveal">
                <span class="istec-label-top">COMPETENCIES & ADVANTAGES</span>
                <h2 class="istec-heading-large">Vì sao chọn Thạc sĩ Quản trị Kinh doanh của ISTEC?</h2>
            </div>

            <div class="grid-2-cols istec-stagger">
                <!-- Năng lực đạt được -->
                <div class="pillar-square-box">
                    <div class="pillar-head-title">
                        <span class="square-dot"></span>
                        <span>Năng lực bạn sẽ đạt được</span>
                    </div>
                    <ul class="clean-tick-list">
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Tư duy quản trị tích hợp:</strong> Nắm vững và phối hợp nhịp nhàng các phòng ban chiến lược.</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Ra quyết định khoa học:</strong> Phân tích chỉ số kinh doanh bài bản để định hướng phát triển.</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Chủ động ứng dụng AI:</strong> Tích hợp trí tuệ nhân tạo vào tối ưu vận hành kinh doanh thực tiễn.</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Năng lực lãnh đạo đa văn hóa:</strong> Dẫn dắt đội ngũ hiệu quả trong môi trường kết nối toàn cầu.</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Bản lĩnh giải quyết vấn đề:</strong> Kiến tạo giá trị thặng dư bền vững và đo lường được cho tổ chức.</span>
                        </li>
                    </ul>
                </div>

                <!-- Lợi ích khi hoàn thành -->
                <div class="pillar-square-box is-istec-green">
                    <div class="pillar-head-title">
                        <span class="square-dot"></span>
                        <span>Lợi ích khi hoàn thành chương trình</span>
                    </div>
                    <ul class="clean-tick-list">
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Định vị lại sự nghiệp:</strong> Bằng Thạc sĩ quốc gia Pháp Bac+5 (RNCP Level 7) công nhận quốc tế.</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Áp dụng ngay vào công việc:</strong> Giải quyết trực tiếp các bài toán thực tế của doanh nghiệp bạn.</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Mạng lưới hơn 8.000 cựu học viên:</strong> Kết nối cộng đồng Alumni thành đạt của ISTEC trên toàn thế giới.</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Tiếp cận hơn 3.500 doanh nghiệp đối tác:</strong> Mở rộng quan hệ đối ngoại và cơ hội đầu tư chiến lược.</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Sẵn sàng cho vai trò lãnh đạo cấp cao:</strong> Tự tin đảm nhận các cương vị Giám đốc, C-Level, Quản trị.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 7. SECTION CHUYÊN GIA: 2 CHUYÊN GIA 1 HÀNG, AVATAR TRÒN GỌN GÀNG & TINH TẾ ══ -->
    <section class="istec-section-box" id="chuyen-gia">
        <!-- ── SVG DECOR FACULTY ── -->
        <div class="istec-decor-bg" aria-hidden="true">
            <div class="ambient-glow-green anim-pulse-glow" style="width: 460px; height: 460px; top: 10%; right: -50px; opacity: 0.4;"></div>

            <!-- Giant Elegant Quotation Watermark -->
            <div class="istec-decor-item" style="top: 40px; left: 5%; width: 220px; height: 180px; opacity: 0.04;">
                <svg viewBox="0 0 220 180" fill="#005C4D">
                    <path d="M90 0H40C17.9 0 0 17.9 0 40v50c0 22.1 17.9 40 40 40h20v50h-40v-20H0v40h90v-90H40V40h50V0zm130 0h-50c-22.1 0-40 17.9-40 40v50c0 22.1 17.9 40 40 40h20v50h-40v-20h-20v40h90v-90h-50V40h50V0z"/>
                </svg>
            </div>

            <!-- Academic Compass Starburst in Corner -->
            <div class="istec-decor-item anim-spin-slow" style="bottom: -40px; right: 4%; width: 200px; height: 200px; opacity: 0.08;">
                <svg viewBox="0 0 200 200" fill="none" width="100%" height="100%">
                    <circle cx="100" cy="100" r="90" stroke="#61A60E" stroke-width="1" stroke-dasharray="5 5"/>
                    <circle cx="100" cy="100" r="60" stroke="#005C4D" stroke-width="1"/>
                    <path d="M100 10 L108 85 L180 100 L108 115 L100 190 L92 115 L20 100 L92 85 Z" stroke="#61A60E" stroke-width="1.2" fill="none"/>
                </svg>
            </div>
        </div>

        <div class="container">
            <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 32px; flex-wrap: wrap; gap: 16px;" class="istec-reveal">
                <div>
                    <span class="istec-label-top">LEADERSHIP & FACULTY</span>
                    <h2 class="istec-heading-large" style="margin-bottom: 0;">Thông điệp từ Ban lãnh đạo & Hội đồng học thuật</h2>
                </div>
                <!-- Nút điều hướng Slide chuyên gia -->
                <div style="display: flex; gap: 10px; align-items: center;">
                    <button class="btn-slider-square" id="btnPrevExpert" onclick="slideExpertPrev()" type="button" aria-label="Slide trước">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 18l-6-6 6-6"/></svg>
                    </button>
                    <button class="btn-slider-square" id="btnNextExpert" onclick="slideExpertNext()" type="button" aria-label="Slide tiếp theo">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 18l6-6-6-6"/></svg>
                    </button>
                </div>
            </div>

            <!-- Khung trượt Slider -->
            <div class="expert-slider-outer istec-reveal">
                <div class="expert-slider-track" id="expertSlideTrack">
                    <!-- Card 1: Jean-Nicolas MANNONI -->
                    <div class="expert-slide-card">
                        <div class="expert-card-topbar">
                            <span class="expert-topbar-badge">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="#61A60E"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                                <span>Ban Lãnh Đạo ISTEC Paris</span>
                            </span>
                            <svg class="expert-card-quote-icon" viewBox="0 0 32 26" fill="currentColor">
                                <path d="M0 16.25C0 7.25 5.5 1.75 13.5 0l2 3.25C9.75 4.75 7.5 8 7 12h7v14H0V16.25zm18 0C18 7.25 23.5 1.75 31.5 0l2 3.25c-5.75 1.5-8 4.75-8.5 8.75H32v14H18V16.25z"/>
                            </svg>
                        </div>

                        <div class="expert-card-body">
                            <p class="expert-card-quote">
                                "Là cựu sinh viên ISTEC Paris, tôi tự hào về sự phát triển vững mạnh của trường: đề cao tính nhân văn, năng lực thực chiến và kết nối doanh nghiệp toàn cầu."
                            </p>
                        </div>

                        <div class="expert-card-author-block">
                            <div class="expert-avatar-frame">
                                <img src="https://istec.fr/wp-content/uploads/2026/02/JK260212_0603_LD-scaled.jpg" alt="Jean-Nicolas MANNONI" class="expert-avatar-img" style="object-position: center 12%;" loading="lazy" />
                            </div>
                            <div class="expert-author-info">
                                <h3 class="expert-card-name">JEAN-NICOLAS MANNONI</h3>
                                <div class="expert-card-role">Director General of Istec • Tổng Giám đốc</div>
                                <div class="expert-card-affil">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    <span>ISTEC Business School Paris • Pháp</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Prof. Adel ALOUI -->
                    <div class="expert-slide-card">
                        <div class="expert-card-topbar">
                            <span class="expert-topbar-badge">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="#61A60E"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                                <span>Hội Đồng Học Thuật</span>
                            </span>
                            <svg class="expert-card-quote-icon" viewBox="0 0 32 26" fill="currentColor">
                                <path d="M0 16.25C0 7.25 5.5 1.75 13.5 0l2 3.25C9.75 4.75 7.5 8 7 12h7v14H0V16.25zm18 0C18 7.25 23.5 1.75 31.5 0l2 3.25c-5.75 1.5-8 4.75-8.5 8.75H32v14H18V16.25z"/>
                            </svg>
                        </div>

                        <div class="expert-card-body">
                            <p class="expert-card-quote">
                                "Tại ISTEC Paris, học viên MBA được rèn luyện trực tiếp trên các tình huống chiến lược thực chiến, tối ưu hóa chuỗi cung ứng toàn cầu và quản trị số."
                            </p>
                        </div>

                        <div class="expert-card-author-block">
                            <div class="expert-avatar-frame">
                                <img src="https://istec.fr/wp-content/uploads/2025/02/Adel_aloui.png" alt="Prof. Adel ALOUI" class="expert-avatar-img" style="object-position: center 25%;" loading="lazy" />
                            </div>
                            <div class="expert-author-info">
                                <h3 class="expert-card-name">PROF. ADEL ALOUI</h3>
                                <div class="expert-card-role">Professeur-chercheur en Management</div>
                                <div class="expert-card-affil">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    <span>CERI ISTEC Paris • Strategy & Operations</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: TS. Phạm Quang Vinh -->
                    <div class="expert-slide-card">
                        <div class="expert-card-topbar">
                            <span class="expert-topbar-badge">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="#61A60E"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                                <span>Viện IDEAS Việt Nam</span>
                            </span>
                            <svg class="expert-card-quote-icon" viewBox="0 0 32 26" fill="currentColor">
                                <path d="M0 16.25C0 7.25 5.5 1.75 13.5 0l2 3.25C9.75 4.75 7.5 8 7 12h7v14H0V16.25zm18 0C18 7.25 23.5 1.75 31.5 0l2 3.25c-5.75 1.5-8 4.75-8.5 8.75H32v14H18V16.25z"/>
                            </svg>
                        </div>

                        <div class="expert-card-body">
                            <p class="expert-card-quote">
                                "Chương trình mang lại chuẩn mực Grande École Pháp danh giá cùng sự đồng hành học thuật bản địa sâu sát của IDEAS giúp mỗi học viên bứt phá sự nghiệp."
                            </p>
                        </div>

                        <div class="expert-card-author-block">
                            <div class="expert-avatar-frame">
                                <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/vientruong_avt-optimized.webp" alt="TS. Phạm Quang Vinh" class="expert-avatar-img" style="object-position: center center;" loading="lazy" />
                            </div>
                            <div class="expert-author-info">
                                <h3 class="expert-card-name">TS. PHẠM QUANG VINH</h3>
                                <div class="expert-card-role">Viện trưởng Viện IDEAS • Tiến sĩ QTKD Hoa Kỳ</div>
                                <div class="expert-card-affil">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    <span>Viện Nghiên Cứu & Đào Tạo IDEAS</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4: Prof. Rey DANG -->
                    <div class="expert-slide-card">
                        <div class="expert-card-topbar">
                            <span class="expert-topbar-badge">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="#61A60E"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                                <span>Ban Nghiên Cứu CERI</span>
                            </span>
                            <svg class="expert-card-quote-icon" viewBox="0 0 32 26" fill="currentColor">
                                <path d="M0 16.25C0 7.25 5.5 1.75 13.5 0l2 3.25C9.75 4.75 7.5 8 7 12h7v14H0V16.25zm18 0C18 7.25 23.5 1.75 31.5 0l2 3.25c-5.75 1.5-8 4.75-8.5 8.75H32v14H18V16.25z"/>
                            </svg>
                        </div>

                        <div class="expert-card-body">
                            <p class="expert-card-quote">
                                "Các nghiên cứu ứng dụng về Trí tuệ nhân tạo và Quản trị bền vững được tích hợp trực tiếp, mang lại cho học viên lợi thế cạnh tranh tiên phong."
                            </p>
                        </div>

                        <div class="expert-card-author-block">
                            <div class="expert-avatar-frame">
                                <img src="https://istec.fr/wp-content/uploads/2025/07/JK260212_0630_LD-scaled-e1771801981334.jpg" alt="Prof. Rey DANG" class="expert-avatar-img" style="object-position: center 12%;" loading="lazy" />
                            </div>
                            <div class="expert-author-info">
                                <h3 class="expert-card-name">PROF. REY DANG</h3>
                                <div class="expert-card-role">Directeur de la Recherche • CERI ISTEC Paris</div>
                                <div class="expert-card-affil">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    <span>CERI Research Center • AI & Strategy</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gạch điều khiển phân trang -->
            <div class="expert-nav-lines">
                <button class="expert-nav-item active" onclick="goExpertSlide(0)" aria-label="Slide 1"></button>
                <button class="expert-nav-item" onclick="goExpertSlide(1)" aria-label="Slide 2"></button>
                <button class="expert-nav-item istec-mobile-only-dot" onclick="goExpertSlide(2)" aria-label="Slide 3"></button>
                <button class="expert-nav-item istec-mobile-only-dot" onclick="goExpertSlide(3)" aria-label="Slide 4"></button>
            </div>
        </div>
    </section>

    <!-- ══ 8. TIMELINE 15 MÔN HỌC & LUẬN VĂN (NỀN XANH TỐI, ITEM TRẮNG) ══ -->
    <section class="istec-section-box section-syllabus-darkgreen" id="chuong-trinh">
        <div class="istec-decor-bg" aria-hidden="true">
            <div class="ambient-glow-mint anim-pulse-glow" style="width: 500px; height: 500px; top: -120px; left: -100px; opacity: 0.18;"></div>
            <div class="ambient-glow-green anim-pulse-glow" style="width: 440px; height: 440px; bottom: -80px; right: -80px; opacity: 0.22;"></div>

            <!-- Curriculum Flow Line Matrix SVG -->
            <div class="istec-decor-item anim-float-slow" style="top: 50px; right: 4%; width: 260px; height: 260px; opacity: 0.08;">
                <svg viewBox="0 0 260 260" fill="none">
                    <circle cx="130" cy="130" r="110" stroke="#61A60E" stroke-width="1.2" stroke-dasharray="6 6"/>
                    <circle cx="130" cy="130" r="75" stroke="#A7D489" stroke-width="1"/>
                    <line x1="20" y1="130" x2="240" y2="130" stroke="#61A60E" stroke-width="1" stroke-dasharray="3 3"/>
                    <line x1="130" y1="20" x2="130" y2="240" stroke="#61A60E" stroke-width="1" stroke-dasharray="3 3"/>
                    <circle cx="130" cy="20" r="4" fill="#61A60E"/>
                    <circle cx="240" cy="130" r="4" fill="#61A60E"/>
                    <circle cx="130" cy="240" r="4" fill="#61A60E"/>
                    <circle cx="20" cy="130" r="4" fill="#61A60E"/>
                </svg>
            </div>

            <!-- Academic Dot Matrix Bottom Left -->
            <div class="istec-decor-item" style="bottom: 30px; left: 3%; width: 160px; height: 160px; opacity: 0.12;">
                <svg viewBox="0 0 160 160" fill="#61A60E">
                    <circle cx="20" cy="20" r="1.5"/><circle cx="50" cy="20" r="1.5"/><circle cx="80" cy="20" r="1.5"/><circle cx="110" cy="20" r="1.5"/><circle cx="140" cy="20" r="1.5"/>
                    <circle cx="20" cy="50" r="1.5"/><circle cx="50" cy="50" r="1.5"/><circle cx="80" cy="50" r="1.5"/><circle cx="110" cy="50" r="1.5"/><circle cx="140" cy="50" r="1.5"/>
                    <circle cx="20" cy="80" r="1.5"/><circle cx="50" cy="80" r="1.5"/><circle cx="80" cy="80" r="1.5"/><circle cx="110" cy="80" r="1.5"/><circle cx="140" cy="80" r="1.5"/>
                    <circle cx="20" cy="110" r="1.5"/><circle cx="50" cy="110" r="1.5"/><circle cx="80" cy="110" r="1.5"/><circle cx="110" cy="110" r="1.5"/><circle cx="140" cy="110" r="1.5"/>
                    <circle cx="20" cy="140" r="1.5"/><circle cx="50" cy="140" r="1.5"/><circle cx="80" cy="140" r="1.5"/><circle cx="110" cy="140" r="1.5"/><circle cx="140" cy="140" r="1.5"/>
                </svg>
            </div>
        </div>

        <div class="container">
            <div style="text-align: center; max-width: 820px; margin: 0 auto 36px;" class="istec-reveal">
                <span class="istec-label-top">SYLLABUS DETAILS</span>
                <h2 class="istec-heading-large">Chi tiết lộ trình 15 môn học & Luận văn</h2>
                <p class="istec-body-lead" style="margin: 0 auto;">Cấu trúc khoa học gồm 3 học kỳ nền tảng và giai đoạn thực hiện luận văn tốt nghiệp (60 tín chỉ ECTS Châu Âu).</p>
            </div>

            <!-- Timeline Navigation Buttons: Active màu xanh brand ISTEC -->
            <div class="timeline-tabs-clean istec-reveal">
                <button class="btn-tab-square active" data-term="boxTerm1">Học Kỳ I (3 Tháng)</button>
                <button class="btn-tab-square" data-term="boxTerm2">Học Kỳ II (3 Tháng)</button>
                <button class="btn-tab-square" data-term="boxTerm3">Học Kỳ III (3 Tháng)</button>
                <button class="btn-tab-square" data-term="boxTerm4">Luận Văn Tốt Nghiệp (2 Tháng)</button>
            </div>

            <div class="accordion-square-wrap istec-reveal" style="max-width: 920px; margin: 0 auto;">
                <!-- Kỳ 1 -->
                <div class="acc-square-box" id="boxTerm1">
                    <button class="acc-square-header" type="button">
                        <span class="acc-square-title">I. Xây dựng nền tảng quản trị (Học kỳ I)</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                    </button>
                    <div class="acc-square-panel" style="max-height: 500px;">
                        <div class="acc-square-content">
                            <div class="course-row-square">
                                <span><strong>01.</strong> Strategic Management (Quản Trị Chiến Lược)</span>
                                <span style="color: var(--dark-muted);">Core</span>
                            </div>
                            <div class="course-row-square">
                                <span><strong>02.</strong> Leadership & Organizational Behavior (Lãnh Đạo & Hành Vi Tổ Chức)</span>
                                <span style="color: var(--dark-muted);">Leadership</span>
                            </div>
                            <div class="course-row-square">
                                <span><strong>03.</strong> Financial Management for Executives (Quản Trị Tài Chính)</span>
                                <span style="color: var(--dark-muted);">Finance</span>
                            </div>
                            <div class="course-row-square">
                                <span><strong>04.</strong> Business Ethics & Sustainable Development (Đạo Đức & Phát Triển Bền Vững)</span>
                                <span style="color: var(--dark-muted);">Ethics</span>
                            </div>
                            <div class="course-row-square">
                                <span><strong>05.</strong> Marketing Strategy & Brand Management (Chiến Lược Marketing & Thương Hiệu)</span>
                                <span style="color: var(--dark-muted);">Marketing</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kỳ 2 -->
                <div class="acc-square-box" id="boxTerm2">
                    <button class="acc-square-header" type="button">
                        <span class="acc-square-title">II. Kinh doanh & Phát triển toàn cầu (Học kỳ II)</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                    </button>
                    <div class="acc-square-panel">
                        <div class="acc-square-content">
                            <div class="course-row-square">
                                <span><strong>06.</strong> Business Analytics & Decision Making (Phân Tích Dữ Liệu Kinh Doanh)</span>
                                <span style="color: var(--dark-muted);">Analytics</span>
                            </div>
                            <div class="course-row-square">
                                <span><strong>07.</strong> International Business Management (Quản Trị Kinh Doanh Quốc Tế)</span>
                                <span style="color: var(--dark-muted);">Global</span>
                            </div>
                            <div class="course-row-square">
                                <span><strong>08.</strong> Cross-Cultural Management (Quản Trị Đa Văn Hóa)</span>
                                <span style="color: var(--dark-muted);">Culture</span>
                            </div>
                            <div class="course-row-square">
                                <span><strong>09.</strong> International Negotiation & Business Development (Đàm Phán Quốc Tế)</span>
                                <span style="color: var(--dark-muted);">Negotiation</span>
                            </div>
                            <div class="course-row-square">
                                <span><strong>10.</strong> Entrepreneurship & Innovation Management (Khởi Nghiệp & Đổi Mới)</span>
                                <span style="color: var(--dark-muted);">Innovation</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kỳ 3 -->
                <div class="acc-square-box" id="boxTerm3">
                    <button class="acc-square-header" type="button">
                        <span class="acc-square-title">III. Đổi mới & Chuyển đổi số cùng AI (Học kỳ III)</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                    </button>
                    <div class="acc-square-panel">
                        <div class="acc-square-content">
                            <div class="course-row-square">
                                <span><strong>11.</strong> Digital Transformation & AI Strategy (Chuyển Đổi Số & Chiến Lược AI)</span>
                                <span style="color: var(--istec-bright-green); font-weight: 700;">AI Strategy</span>
                            </div>
                            <div class="course-row-square">
                                <span><strong>12.</strong> Operations & Supply Chain Management (Quản Trị Vận Hành & Chuỗi Cung Ứng)</span>
                                <span style="color: var(--dark-muted);">Operations</span>
                            </div>
                            <div class="course-row-square">
                                <span><strong>13.</strong> Consulting Project Management (Quản Trị Dự Án Tư Vấn)</span>
                                <span style="color: var(--dark-muted);">Consulting</span>
                            </div>
                            <div class="course-row-square">
                                <span><strong>14.</strong> Luxury & Premium Brand Management (Quản Trị Thương Hiệu Cao Cấp)</span>
                                <span style="color: var(--dark-muted);">Brand</span>
                            </div>
                            <div class="course-row-square">
                                <span><strong>15.</strong> Strategic Marketing in Emerging Markets (Marketing Thị Trường Mới Nổi)</span>
                                <span style="color: var(--dark-muted);">Markets</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Luận văn -->
                <div class="acc-square-box" id="boxTerm4">
                    <button class="acc-square-header" type="button">
                        <span class="acc-square-title">IV. Luận văn tốt nghiệp / Dự án thực tiễn (2 Tháng)</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                    </button>
                    <div class="acc-square-panel">
                        <div class="acc-square-content">
                            <div class="course-row-square">
                                <span><strong>16.</strong> MBA Thesis / Applied Business Project (Luận Văn / Dự Án Quản Trị Thực Tiễn)</span>
                                <span style="color: #b91c1c; font-weight: 700;">Capstone</span>
                            </div>
                            <p style="font-size: 0.92rem; color: var(--dark-sub); margin-top: 10px; line-height: 1.6;">
                                Học viên trực tiếp bảo vệ luận văn hoặc dự án kinh doanh ứng dụng trước Hội đồng Giáo sư ISTEC Paris.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 9. VĂN BẰNG & MARQUEE KIỂM ĐỊNH (LOGO FULL MÀU 100%, KHÔNG GRAYSCALE) ══ -->
    <section class="istec-section-box" id="kiem-dinh">
        <div class="istec-decor-bg" aria-hidden="true">
            <div class="ambient-glow-green anim-pulse-glow" style="width: 460px; height: 460px; top: 0; right: -50px; opacity: 0.35;"></div>

            <!-- French Academic Laurel Crest Outline -->
            <div class="istec-decor-item" style="top: 40px; left: 3%; width: 220px; height: 220px; opacity: 0.05;">
                <svg viewBox="0 0 220 220" fill="none" stroke="#005C4D" stroke-width="1.5">
                    <path d="M110 20 C60 50 40 100 50 160 C70 190 100 205 110 210 C120 205 150 190 170 160 C180 100 160 50 110 20 Z"/>
                    <path d="M70 70 Q90 110 110 170 Q130 110 150 70" stroke-dasharray="4 4"/>
                    <circle cx="110" cy="110" r="40" stroke="#61A60E" stroke-width="1"/>
                </svg>
            </div>

            <!-- Global Latitude Longitude Wireframe Grid -->
            <div class="istec-decor-item anim-spin-slow" style="bottom: -50px; right: 3%; width: 240px; height: 240px; opacity: 0.07;">
                <svg viewBox="0 0 240 240" fill="none" stroke="#005C4D" stroke-width="1.2">
                    <circle cx="120" cy="120" r="100"/>
                    <ellipse cx="120" cy="120" rx="100" ry="40"/>
                    <ellipse cx="120" cy="120" rx="40" ry="100"/>
                    <line x1="20" y1="120" x2="220" y2="120" stroke-dasharray="4 4"/>
                    <line x1="120" y1="20" x2="120" y2="220" stroke-dasharray="4 4"/>
                </svg>
            </div>
        </div>

        <div class="container">
            <div style="text-align: center; max-width: 820px; margin: 0 auto 36px;" class="istec-reveal">
                <span class="istec-label-top">GLOBAL ACCREDITATIONS</span>
                <h2 class="istec-heading-large">Văn bằng giá trị quốc tế được công nhận toàn cầu</h2>
                <p class="istec-body-lead" style="margin: 0 auto;">
                    Được kiểm định và bảo chứng bởi hệ thống giáo dục đại học hàng đầu Cộng hòa Pháp và các tổ chức kiểm định quốc tế uy tín.
                </p>
            </div>

            <!-- Slide Marquee Bự Lên Chạy Liên Tục (Full Màu Gốc) -->
            <div class="marquee-square-container istec-reveal">
                <div class="marquee-track-infinite">
                    <div class="marquee-slides-track">
                        <img src="https://istec.fr/wp-content/uploads/2025/02/logo-france-competences.30a014-1.png" alt="France Compétences RNCP" class="logo-acc-istec" />
                        <img src="https://istec.fr/wp-content/uploads/2026/02/CEFDG-1.webp" alt="CEFDG France" class="logo-acc-istec" />
                        <img src="https://istec.fr/wp-content/uploads/2025/07/CGE.webp" alt="Conférence des Grandes Écoles (CGE)" class="logo-acc-istec" />
                        <img src="https://istec.fr/wp-content/uploads/2025/07/AACSB.webp" alt="AACSB Member" class="logo-acc-istec" />
                        <img src="https://istec.fr/wp-content/uploads/2026/01/EFMD-Logo-2-300x122-1.png" alt="EFMD Global Member" class="logo-acc-istec" />
                        <img src="https://istec.fr/wp-content/uploads/2026/02/campus-france-logo.png" alt="Campus France" class="logo-acc-istec" />
                        <img src="https://istec.fr/wp-content/uploads/2026/02/qualiopi-logo-png.png" alt="Qualiopi France" class="logo-acc-istec" />
                        <!-- Lặp lại để cuộn vô tận mượt mà -->
                        <img src="https://istec.fr/wp-content/uploads/2025/02/logo-france-competences.30a014-1.png" alt="France Compétences RNCP" class="logo-acc-istec" />
                        <img src="https://istec.fr/wp-content/uploads/2026/02/CEFDG-1.webp" alt="CEFDG France" class="logo-acc-istec" />
                        <img src="https://istec.fr/wp-content/uploads/2025/07/CGE.webp" alt="Conférence des Grandes Écoles (CGE)" class="logo-acc-istec" />
                        <img src="https://istec.fr/wp-content/uploads/2025/07/AACSB.webp" alt="AACSB Member" class="logo-acc-istec" />
                        <img src="https://istec.fr/wp-content/uploads/2026/01/EFMD-Logo-2-300x122-1.png" alt="EFMD Global Member" class="logo-acc-istec" />
                        <img src="https://istec.fr/wp-content/uploads/2026/02/campus-france-logo.png" alt="Campus France" class="logo-acc-istec" />
                        <img src="https://istec.fr/wp-content/uploads/2026/02/qualiopi-logo-png.png" alt="Qualiopi France" class="logo-acc-istec" />
                    </div>
                </div>
            </div>

            <!-- 5 Thẻ kiểm định chi tiết -->
            <div class="grid-5-cols istec-stagger" style="margin-top: 0;">
                <div class="istec-square-card istec-reveal">
                    <h3 style="font-size: 1.05rem; font-weight: 800; color: var(--dark-main); margin-bottom: 6px;">Visa Bac+5</h3>
                    <p style="font-size: 0.86rem; color: var(--dark-sub); margin: 0; line-height: 1.55;">Công nhận chính thức bởi Bộ Giáo dục Đại học và Nghiên cứu Pháp đối với chương trình MBA.</p>
                </div>
                <div class="istec-square-card istec-reveal">
                    <h3 style="font-size: 1.05rem; font-weight: 800; color: var(--dark-main); margin-bottom: 6px;">RNCP Level 7</h3>
                    <p style="font-size: 0.86rem; color: var(--dark-sub); margin: 0; line-height: 1.55;">Chứng nhận nghề nghiệp cấp độ cao nhất (Bac+5) trong Khung chứng nhận quốc gia Pháp.</p>
                </div>
                <div class="istec-square-card istec-reveal">
                    <h3 style="font-size: 1.05rem; font-weight: 800; color: var(--dark-main); margin-bottom: 6px;">CGE Member</h3>
                    <p style="font-size: 0.86rem; color: var(--dark-sub); margin: 0; line-height: 1.55;">Thành viên Conférence des Grandes Écoles – hiệp hội các trường đại học tinh hoa của Pháp.</p>
                </div>
                <div class="istec-square-card istec-reveal">
                    <h3 style="font-size: 1.05rem; font-weight: 800; color: var(--dark-main); margin-bottom: 6px;">AACSB Member</h3>
                    <p style="font-size: 0.86rem; color: var(--dark-sub); margin: 0; line-height: 1.55;">Thành viên Hiệp hội phát triển giảng dạy quản trị kinh doanh Hoa Kỳ danh giá toàn cầu.</p>
                </div>
                <div class="istec-square-card istec-reveal">
                    <h3 style="font-size: 1.05rem; font-weight: 800; color: var(--dark-main); margin-bottom: 6px;">EFMD Global</h3>
                    <p style="font-size: 0.86rem; color: var(--dark-sub); margin: 0; line-height: 1.55;">Thành viên tổ chức phát triển quản lý Châu Âu EFMD, đảm bảo chuẩn mực học thuật quốc tế.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ FULL-WIDTH REAL PARALLAX BANNER (PARIS GRADUATION & CAMPUS) ══ -->
    <div class="istec-real-parallax-wrap" id="parallaxWrap2">
        <div class="istec-parallax-img-holder" style="background: #002c24 url('<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/istec-grand-rex-paris.jpg') center 25% / cover no-repeat;">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/istec-grand-rex-paris.jpg" 
                 alt="Lễ tốt nghiệp ISTEC tại Nhà hát Grand Rex Paris" 
                 class="parallax-inner-img" 
                 id="parallaxImg2" 
                 loading="eager" />
        </div>
        <div class="parallax-caption-tag">
            <span>DIPLÔME DE L'ISTEC • GRADUATION AT LE GRAND REX PARIS</span>
        </div>
    </div>

    <!-- ══ 10. HỌC PHÍ VÀ LỘ TRÌNH TÀI CHÍNH ══ -->
    <section class="istec-section-box bg-alt" id="hoc-phi">
        <div class="istec-decor-bg" aria-hidden="true">
            <div class="ambient-glow-green anim-pulse-glow" style="width: 440px; height: 440px; top: -50px; left: 10%; opacity: 0.3;"></div>

            <!-- European Star Arc & Geometric Shield -->
            <div class="istec-decor-item anim-spin-slow" style="top: 40px; right: 4%; width: 220px; height: 220px; opacity: 0.06;">
                <svg viewBox="0 0 220 220" fill="none" stroke="#005C4D" stroke-width="1.2">
                    <circle cx="110" cy="110" r="95" stroke-dasharray="6 6"/>
                    <circle cx="110" cy="110" r="65"/>
                    <polygon points="110,35 116,52 134,52 120,63 125,80 110,70 95,80 100,63 86,52 104,52" fill="#61A60E" stroke="none" opacity="0.6"/>
                    <polygon points="185,110 168,116 168,134 157,120 140,125 150,110 140,95 157,100 168,86 168,104" fill="#61A60E" stroke="none" opacity="0.6"/>
                    <polygon points="110,185 104,168 86,168 100,157 95,140 110,150 125,140 120,157 134,168 116,168" fill="#61A60E" stroke="none" opacity="0.6"/>
                    <polygon points="35,110 52,104 52,86 63,100 80,95 70,110 80,125 63,120 52,134 52,116" fill="#61A60E" stroke="none" opacity="0.6"/>
                </svg>
            </div>

            <!-- Micro Dot Matrix -->
            <div class="istec-decor-item" style="bottom: 40px; left: 5%; width: 140px; height: 140px; opacity: 0.08;">
                <svg viewBox="0 0 140 140" fill="#005C4D">
                    <circle cx="20" cy="20" r="2"/><circle cx="50" cy="20" r="2"/><circle cx="80" cy="20" r="2"/><circle cx="110" cy="20" r="2"/>
                    <circle cx="20" cy="50" r="2"/><circle cx="50" cy="50" r="2"/><circle cx="80" cy="50" r="2"/><circle cx="110" cy="50" r="2"/>
                    <circle cx="20" cy="80" r="2"/><circle cx="50" cy="80" r="2"/><circle cx="80" cy="80" r="2"/><circle cx="110" cy="80" r="2"/>
                    <circle cx="20" cy="110" r="2"/><circle cx="50" cy="110" r="2"/><circle cx="80" cy="110" r="2"/><circle cx="110" cy="110" r="2"/>
                </svg>
            </div>
        </div>

        <div class="container">
            <div style="text-align: center; max-width: 820px; margin: 0 auto 36px;" class="istec-reveal">
                <span class="istec-label-top">TUITION & ADMISSIONS</span>
                <h2 class="istec-heading-large">Chính sách học phí & Lộ trình tài chính</h2>
                <p class="istec-body-lead" style="margin: 0 auto;">Chính sách hỗ trợ học phí tối ưu cho học viên Việt Nam từ đối tác tuyển sinh chính thức Viện IDEAS.</p>
            </div>

            <div class="tuition-square-card istec-reveal">
                <div class="tuition-header-dark">
                    <span style="font-size: 0.84rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; color: #9ca3af;">CHÍNH SÁCH HỌC PHÍ ƯU ĐÃI KHÓA MBA</span>
                    <div style="margin-top: 14px; display: flex; align-items: baseline; justify-content: center; gap: 14px; flex-wrap: wrap;">
                        <span style="font-size: 1.5rem; text-decoration: line-through; color: #9ca3af; font-weight: 600;">8.500 EUR</span>
                        <div class="tuition-price-headline" style="margin: 0;">6.500 EUR</div>
                        <span style="background: rgba(97, 166, 14, 0.25); color: #a3e635; font-size: 0.82rem; font-weight: 800; padding: 4px 10px; border-radius: var(--radius-square);">
                            TIẾT KIỆM 2.000 EUR
                        </span>
                    </div>
                    <div style="margin-top: 14px; padding-top: 14px; border-top: 1px solid rgba(255, 255, 255, 0.12); font-size: 0.95rem; color: #f3f4f6;">
                        Lệ phí xét tuyển hồ sơ (LPHS): <strong style="color: var(--istec-bright-green); font-size: 1.15rem; margin-left: 4px;">200 EUR</strong>
                    </div>
                    <p style="color: #9ca3af; font-size: 0.88rem; margin: 6px 0 0;">Học phí công bố (public): 8.500 EUR • Ưu đãi qua IDEAS: 6.500 EUR + 200 EUR LPHS</p>
                </div>

                <div class="tuition-body-pad">
                    <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--dark-main); margin-bottom: 16px;">Chi phí đã bao gồm trọn gói:</h3>
                    <ul class="clean-tick-list" style="margin-bottom: 24px;">
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span>Học phí trọn khóa MBA và phí dịch vụ đào tạo chuyên sâu từ Viện IDEAS trong suốt 12 tháng.</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span>Toàn quyền sử dụng hệ thống học tập IDEAS LMS & Trợ lý học thuật IDEAS AI Platform.</span>
                        </li>
                        <li>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span>Thư viện trực tuyến Cengage MindTap với hơn 1.000 đầu sách học thuật quốc tế bản quyền.</span>
                        </li>
                    </ul>

                    <div style="background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: var(--radius-square); padding: 16px 20px; font-size: 0.94rem; color: #166534; margin-bottom: 24px;">
                        <strong>Hỗ trợ trả góp 0% lãi suất:</strong> Trả góp linh hoạt qua thẻ tín dụng Sacombank từ 12 - 24 tháng, giúp học viên phân bổ chi phí dễ dàng và không phải chịu áp lực tài chính một lần.
                    </div>

                    <div style="text-align: center;">
                        <a href="#faq-dang-ky" class="btn-istec-square-dark">
                            <span>Nhận tư vấn lộ trình học phí chi tiết</span>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 11. KHÔNG GIAN HỌC XÁ TRUNG TÂM PARIS (LINH HOẠT NỘI DUNG CHUẨN MBA) ══ -->
    <section class="istec-section-box" id="campus-paris">
        <div class="istec-decor-bg" aria-hidden="true">
            <div class="ambient-glow-mint anim-pulse-glow" style="width: 450px; height: 450px; top: 10%; right: -50px; opacity: 0.28;"></div>

            <!-- Compass Rose / City Navigation Grid SVG -->
            <div class="istec-decor-item anim-spin-slow" style="top: 20px; right: 2%; width: 240px; height: 240px; opacity: 0.06;">
                <svg viewBox="0 0 240 240" fill="none" stroke="#005C4D" stroke-width="1.2">
                    <circle cx="120" cy="120" r="110"/>
                    <circle cx="120" cy="120" r="85" stroke-dasharray="4 4"/>
                    <polygon points="120,20 128,110 220,120 128,130 120,220 112,130 20,120 112,110" stroke="#61A60E" stroke-width="1.5" fill="none"/>
                </svg>
            </div>

            <!-- Canal Saint-Martin Water Wave Contour -->
            <div class="istec-decor-item" style="bottom: 0; left: 0; width: 340px; height: 100px; opacity: 0.05;">
                <svg viewBox="0 0 340 100" fill="none" stroke="#005C4D" stroke-width="1.5">
                    <path d="M0 30 Q85 10 170 30 T340 30"/>
                    <path d="M0 60 Q85 40 170 60 T340 60"/>
                    <path d="M0 90 Q85 70 170 90 T340 90"/>
                </svg>
            </div>
        </div>

        <div class="container">
            <div class="campus-paris-grid">
                <!-- Cột trái: Nội dung linh hoạt chuẩn học viên MBA -->
                <div class="campus-paris-info istec-reveal">
                    <span class="istec-label-top" style="color: var(--istec-bright-green); font-weight: 800; letter-spacing: 0.1em; font-size: 0.82rem;">TRẢI NGHIỆM HỌC THUẬT QUỐC TẾ</span>
                    <h2 style="font-size: clamp(1.85rem, 3vw, 2.5rem); font-weight: 800; color: var(--dark-main); line-height: 1.25; margin: 12px 0 20px; letter-spacing: -0.015em;">
                        Môi trường học tập đỉnh cao & kết nối doanh nghiệp toàn cầu
                    </h2>
                    <p style="font-size: 0.98rem; color: var(--dark-sub); line-height: 1.65; margin-bottom: 14px;">
                        Chương trình Thạc sĩ Quản trị Kinh doanh (MBA) tại ISTEC Business School Paris là sự kết hợp tối ưu giữa tính linh hoạt của nền tảng trực tuyến và cơ hội trải nghiệm học thuật thực tế ngay tại trung tâm thủ đô Paris hoa lệ.
                    </p>
                    <p style="font-size: 0.95rem; color: var(--dark-muted); line-height: 1.65; margin-bottom: 24px;">
                        Học xá ISTEC bên bờ kênh Saint-Martin thơ mộng là nơi giao thoa của tinh thần đổi mới sáng tạo, phương pháp đào tạo tình huống (Case-study) và cơ hội mở rộng mạng lưới quan hệ cùng các nhà quản trị đa quốc gia.
                    </p>

                    <!-- 3 Dòng Accordion tương tác linh hoạt cho học viên MBA -->
                    <div class="campus-features-list">
                        <div class="campus-feature-item">
                            <button class="campus-feature-btn" type="button" onclick="toggleCampusTab(this)">
                                <span class="campus-arrow-icon">→</span>
                                <span class="campus-feature-title">Trải nghiệm thực tế tại Paris & Lễ tốt nghiệp danh giá</span>
                            </button>
                            <div class="campus-feature-panel">
                                <p>Đặc quyền tham gia các chuyến Study Tour tại Paris, tham quan các tập đoàn Châu Âu hàng đầu và tham dự Lễ vinh danh tốt nghiệp trang trọng tại các khán phòng nghệ thuật biểu tượng của Pháp như Le Grand Rex.</p>
                            </div>
                        </div>

                        <div class="campus-feature-item">
                            <button class="campus-feature-btn" type="button" onclick="toggleCampusTab(this)">
                                <span class="campus-arrow-icon">→</span>
                                <span class="campus-feature-title">Hội đồng học thuật & Giảng viên đầu ngành Châu Âu</span>
                            </button>
                            <div class="campus-feature-panel">
                                <p>Hội tụ 100% Giáo sư, Tiến sĩ và Chuyên gia tư vấn chiến lược dày dạn kinh nghiệm quốc tế, trực tiếp đồng hành giải quyết các bài toán vận hành và quản trị thực tiễn cho doanh nghiệp của bạn.</p>
                            </div>
                        </div>

                        <div class="campus-feature-item">
                            <button class="campus-feature-btn" type="button" onclick="toggleCampusTab(this)">
                                <span class="campus-arrow-icon">→</span>
                                <span class="campus-feature-title">Bằng Thạc sĩ quốc gia Pháp & Mạng lưới Alumni 40+ quốc gia</span>
                            </button>
                            <div class="campus-feature-panel">
                                <p>Bằng Thạc sĩ MBA RNCP Level 7 (Bac+5) được Bộ Giáo dục Đại học & Nghiên cứu Pháp chứng nhận, mở ra cơ hội kết nối với hơn 8.000 cựu học viên và 3.500 doanh nghiệp đối tác trên khắp thế giới.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cột phải: Ảnh lớn kênh Saint-Martin Paris -->
                <div class="campus-paris-media istec-reveal">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/istec/istec-paris-campus-saint-martin.jpg" 
                         alt="ISTEC Campus in the heart of Paris" 
                         class="campus-paris-img" />
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 11B. THÔNG TIN TUYỂN SINH: ĐIỀU KIỆN & QUY TRÌNH 4 BƯỚC ĐƠN GIẢN (CHUẨN BRIEF) ══ -->
    <section class="istec-section-box" id="tuyen-sinh" style="border-top: 1px solid var(--border-light);">
        <div class="istec-decor-bg" aria-hidden="true">
            <div class="ambient-glow-green anim-pulse-glow" style="width: 420px; height: 420px; bottom: -50px; left: -50px; opacity: 0.28;"></div>

            <!-- Step Ladder Progression Wave SVG -->
            <div class="istec-decor-item" style="top: 40px; right: 5%; width: 220px; height: 200px; opacity: 0.06;">
                <svg viewBox="0 0 220 200" fill="none" stroke="#005C4D" stroke-width="1.3">
                    <path d="M10 180 L70 130 L130 80 L190 30" stroke-dasharray="5 5"/>
                    <circle cx="10" cy="180" r="5" fill="#005C4D"/>
                    <circle cx="70" cy="130" r="5" fill="#005C4D"/>
                    <circle cx="130" cy="80" r="5" fill="#61A60E"/>
                    <circle cx="190" cy="30" r="6" fill="#61A60E"/>
                    <line x1="70" y1="130" x2="70" y2="180" stroke="#61A60E" stroke-width="1"/>
                    <line x1="130" y1="80" x2="130" y2="180" stroke="#61A60E" stroke-width="1"/>
                    <line x1="190" y1="30" x2="190" y2="180" stroke="#61A60E" stroke-width="1"/>
                </svg>
            </div>
        </div>

        <div class="container">
            <div style="text-align: center; max-width: 820px; margin: 0 auto 36px;" class="istec-reveal">
                <span class="istec-label-top">ADMISSION PROCESS</span>
                <h2 class="istec-heading-large">Điều kiện & Quy trình tuyển sinh 4 bước đơn giản</h2>
                <p class="istec-body-lead" style="margin: 0 auto;">
                    Quy trình xét tuyển được thiết kế tinh gọn, đánh giá toàn diện năng lực học thuật và tiềm năng lãnh đạo của ứng viên.
                </p>
            </div>

            <!-- Điều kiện & 4 bước -->
            <div class="admission-grid-wrap istec-stagger">
                <!-- Cột trái: Điều kiện đầu vào -->
                <div class="istec-square-card istec-reveal" style="padding: 32px; border-left: 4px solid var(--istec-deep-green); background: #ffffff;">
                    <div style="font-size: 0.8rem; font-weight: 800; color: var(--istec-deep-green); text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 8px;">
                        YÊU CẦU ĐẦU VÀO
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--dark-main); margin-bottom: 16px;">
                        Hồ sơ ứng tuyển MBA
                    </h3>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 14px;">
                        <li style="display: flex; align-items: flex-start; gap: 10px; font-size: 0.95rem; color: var(--dark-sub); line-height: 1.55;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--istec-deep-green)" stroke-width="2.5" style="margin-top: 2px; flex-shrink: 0;"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Bằng tốt nghiệp <strong>Cử nhân (Đại học)</strong> và bảng điểm các chuyên ngành.</span>
                        </li>
                        <li style="display: flex; align-items: flex-start; gap: 10px; font-size: 0.95rem; color: var(--dark-sub); line-height: 1.55;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--istec-deep-green)" stroke-width="2.5" style="margin-top: 2px; flex-shrink: 0;"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Trình độ tiếng Anh tương đương <strong>IELTS 6.0</strong> (hoặc tham gia phỏng vấn đánh giá năng lực trực tuyến cùng đại diện trường).</span>
                        </li>
                        <li style="display: flex; align-items: flex-start; gap: 10px; font-size: 0.95rem; color: var(--dark-sub); line-height: 1.55;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--istec-deep-green)" stroke-width="2.5" style="margin-top: 2px; flex-shrink: 0;"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Ưu tiên ứng viên có từ <strong>1 - 2 năm kinh nghiệm</strong> làm việc tại các doanh nghiệp.</span>
                        </li>
                    </ul>
                </div>

                <!-- Cột phải: Quy trình 4 bước -->
                <div class="istec-square-card istec-reveal" style="padding: 32px; background: #ffffff;">
                    <div style="font-size: 0.8rem; font-weight: 800; color: var(--istec-bright-green); text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 8px;">
                        LỘ TRÌNH NHẬP HỌC
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 800; color: var(--dark-main); margin-bottom: 20px;">
                        Quy trình 4 bước đơn giản
                    </h3>
                    <div class="steps-grid-inner">
                        <div style="padding: 16px; background: #f8fafc; border: 1px solid var(--border-light); border-radius: var(--radius-square);">
                            <div style="font-size: 0.8rem; font-weight: 800; color: var(--istec-deep-green); margin-bottom: 4px;">BƯỚC 01</div>
                            <div style="font-size: 0.95rem; font-weight: 800; color: var(--dark-main); margin-bottom: 4px;">Nộp hồ sơ xét tuyển</div>
                            <div style="font-size: 0.85rem; color: var(--dark-muted); line-height: 1.45;">Điền form và gửi bản scan bằng ĐH, bảng điểm, CV.</div>
                        </div>
                        <div style="padding: 16px; background: #f8fafc; border: 1px solid var(--border-light); border-radius: var(--radius-square);">
                            <div style="font-size: 0.8rem; font-weight: 800; color: var(--istec-deep-green); margin-bottom: 4px;">BƯỚC 02</div>
                            <div style="font-size: 0.95rem; font-weight: 800; color: var(--dark-main); margin-bottom: 4px;">Thẩm định & Phỏng vấn</div>
                            <div style="font-size: 0.85rem; color: var(--dark-muted); line-height: 1.45;">Phỏng vấn trực tuyến 1:1 cùng Hội đồng học thuật.</div>
                        </div>
                        <div style="padding: 16px; background: #f8fafc; border: 1px solid var(--border-light); border-radius: var(--radius-square);">
                            <div style="font-size: 0.8rem; font-weight: 800; color: var(--istec-deep-green); margin-bottom: 4px;">BƯỚC 03</div>
                            <div style="font-size: 0.95rem; font-weight: 800; color: var(--dark-main); margin-bottom: 4px;">Thư trúng tuyển</div>
                            <div style="font-size: 0.85rem; color: var(--dark-muted); line-height: 1.45;">Nhận Letter of Acceptance chính thức từ ISTEC Paris.</div>
                        </div>
                        <div style="padding: 16px; background: #f8fafc; border: 1px solid var(--border-light); border-radius: var(--radius-square);">
                            <div style="font-size: 0.8rem; font-weight: 800; color: var(--istec-deep-green); margin-bottom: 4px;">BƯỚC 04</div>
                            <div style="font-size: 0.95rem; font-weight: 800; color: var(--dark-main); margin-bottom: 4px;">Nhập học & Khai giảng</div>
                            <div style="font-size: 0.85rem; color: var(--dark-muted); line-height: 1.45;">Kích hoạt tài khoản LMS/AI và bắt đầu học kỳ I.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 12. BỐ CỤC 2 CỘT: FAQ BÊN TRÁI & FORM ĐẦY ĐỦ CÁC TRƯỜNG BÊN PHẢI ══ -->
    <section class="istec-section-box bg-alt" id="faq-dang-ky">
        <div class="istec-decor-bg" aria-hidden="true">
            <div class="ambient-glow-green anim-pulse-glow" style="width: 520px; height: 520px; top: 5%; right: -80px; opacity: 0.35;"></div>
            <div class="ambient-glow-mint anim-pulse-glow" style="width: 440px; height: 440px; bottom: 5%; left: -60px; opacity: 0.22;"></div>

            <!-- Dialogue / Speech Bubble Watermark behind FAQ -->
            <div class="istec-decor-item" style="top: 80px; left: 4%; width: 220px; height: 180px; opacity: 0.05;">
                <svg viewBox="0 0 220 180" fill="none" stroke="#005C4D" stroke-width="1.5">
                    <rect x="10" y="10" width="160" height="110" rx="4"/>
                    <polygon points="40,120 40,150 70,120" fill="#005C4D"/>
                    <circle cx="55" cy="65" r="5" fill="#61A60E"/>
                    <circle cx="90" cy="65" r="5" fill="#61A60E"/>
                    <circle cx="125" cy="65" r="5" fill="#61A60E"/>
                </svg>
            </div>

            <!-- Trust Shield Watermark behind Form -->
            <div class="istec-decor-item" style="bottom: 60px; right: 4%; width: 240px; height: 260px; opacity: 0.04;">
                <svg viewBox="0 0 240 260" fill="none" stroke="#005C4D" stroke-width="1.8">
                    <path d="M120 15 L215 50 V130 C215 190 120 245 120 245 C120 245 25 190 25 130 V50 Z"/>
                    <polyline points="75 125 105 155 165 95" stroke="#61A60E" stroke-width="2.5" fill="none"/>
                </svg>
            </div>
        </div>

        <div class="container">
            <div class="faq-form-grid-2">
                <!-- CỘT TRÁI: CÂU HỎI THƯỜNG GẶP (FAQ) & KHỐI THÔNG ĐIỆP ĐẶC TRƯNG -->
                <div class="faq-col-left istec-reveal">
                    <!-- KHỐI THÔNG ĐIỆP ĐẶC TRƯNG CHUẨN BRAND ISTEC -->
                    <div style="margin-bottom: 28px;">
                        <h2 style="font-size: clamp(1.85rem, 2.8vw, 2.45rem); font-weight: 800; color: var(--dark-main); line-height: 1.25; margin-bottom: 20px; letter-spacing: -0.015em;">
                            Đừng để sự nghiệp của bạn<br>
                            <span style="color: var(--istec-deep-green); position: relative; display: inline-block;">
                                tiếp tục đứng yên
                                <span style="position: absolute; bottom: 3px; left: 0; width: 100%; height: 7px; background: rgba(0, 92, 77, 0.12); z-index: -1;"></span>
                            </span><br>
                            thêm 1–2 năm nữa
                        </h2>

                        <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 14px;">
                            <li style="display: flex; align-items: flex-start; gap: 12px; font-size: 1.02rem; color: var(--dark-sub); line-height: 1.55;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--istec-deep-green)" stroke-width="2.5" style="margin-top: 3px; flex-shrink: 0;"><polyline points="20 6 9 17 4 12"/></svg>
                                <span>Tấm bằng <strong>Thạc sĩ Quản trị kinh doanh Pháp (ISTEC Paris)</strong> – RNCP Level 7 (Bac+5)</span>
                            </li>
                            <li style="display: flex; align-items: flex-start; gap: 12px; font-size: 1.02rem; color: var(--dark-sub); line-height: 1.55;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--istec-deep-green)" stroke-width="2.5" style="margin-top: 3px; flex-shrink: 0;"><polyline points="20 6 9 17 4 12"/></svg>
                                <span>Lộ trình đào tạo <strong>tối ưu cho người bận rộn</strong> (100% Online)</span>
                            </li>
                            <li style="display: flex; align-items: flex-start; gap: 12px; font-size: 1.02rem; color: var(--dark-sub); line-height: 1.55;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--istec-deep-green)" stroke-width="2.5" style="margin-top: 3px; flex-shrink: 0;"><polyline points="20 6 9 17 4 12"/></svg>
                                <span>IDEAS <strong>đồng hành và hỗ trợ học thuật</strong> trong suốt quá trình học</span>
                            </li>
                        </ul>
                    </div>

                    <div class="accordion-square-wrap">
                        <!-- FAQ 1 -->
                        <div class="acc-square-box open">
                            <button class="acc-square-header faq-acc-btn" type="button">
                                <span class="acc-square-title">MBA ISTEC phù hợp với ai?</span>
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                            </button>
                            <div class="acc-square-panel" style="max-height: 400px;">
                                <div class="acc-square-content">
                                    <p style="margin: 0 0 10px; color: var(--dark-sub); line-height: 1.65;">MBA ISTEC phù hợp với những người đang muốn phát triển từ năng lực chuyên môn sang tư duy quản trị và lãnh đạo, bao gồm:</p>
                                    <ul style="margin: 0; padding-left: 20px; color: var(--dark-muted); line-height: 1.6; font-size: 0.92rem;">
                                        <li>Chuyên viên giàu kinh nghiệm đang hướng đến vai trò quản lý.</li>
                                        <li>Quản lý cấp trung muốn phát triển tư duy chiến lược và năng lực quản trị toàn diện.</li>
                                        <li>Trưởng nhóm hoặc trưởng bộ phận cần mở rộng góc nhìn về hoạt động tổng thể của doanh nghiệp.</li>
                                        <li>Người đang chuẩn bị cho bước tiến tiếp theo trong sự nghiệp và muốn bổ sung nền tảng quản trị quốc tế.</li>
                                        <li>Doanh nhân hoặc người đang vận hành doanh nghiệp muốn hệ thống hóa tư duy quản trị và nâng cao năng lực ra quyết định.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="acc-square-box">
                            <button class="acc-square-header faq-acc-btn" type="button">
                                <span class="acc-square-title">MBA ISTEC học trong bao lâu?</span>
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                            </button>
                            <div class="acc-square-panel">
                                <div class="acc-square-content">
                                    <p style="margin: 0; color: var(--dark-sub); line-height: 1.65;">Chương trình kéo dài 12 tháng, gồm 3 học kỳ nền tảng (mỗi kỳ 3 tháng) và giai đoạn thực hiện luận văn/dự án kinh doanh ứng dụng cuối khóa trong 2 tháng (tổng 60 tín chỉ ECTS Châu Âu).</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="acc-square-box">
                            <button class="acc-square-header faq-acc-btn" type="button">
                                <span class="acc-square-title">Tôi không bằng cấp chuyên ngành kinh doanh có theo học được không?</span>
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                            </button>
                            <div class="acc-square-panel">
                                <div class="acc-square-content">
                                    <p style="margin: 0; color: var(--dark-sub); line-height: 1.65;">Hoàn toàn được. MBA ISTEC phù hợp với người đã tốt nghiệp Đại học ở bất kỳ chuyên ngành nào (Kỹ thuật, Y tế, Xã hội, Ngôn ngữ...) và mong muốn phát triển năng lực quản lý. Điều kiện cụ thể sẽ được tư vấn dựa trên hồ sơ tuyển sinh.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 4 (AI trong chương trình chuẩn brief) -->
                        <div class="acc-square-box">
                            <button class="acc-square-header faq-acc-btn" type="button">
                                <span class="acc-square-title">MBA ISTEC có nội dung về AI không?</span>
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                            </button>
                            <div class="acc-square-panel">
                                <div class="acc-square-content">
                                    <p style="margin: 0; color: var(--dark-sub); line-height: 1.65;">Có. Học viên được tiếp cận học phần chuyên sâu <strong>Digital Transformation & AI Strategy</strong>, giúp hiểu sâu sắc vai trò của công nghệ và trí tuệ nhân tạo (AI) trong hoạch định chiến lược kinh doanh cũng như tối ưu hóa quy trình vận hành của doanh nghiệp.</p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 5 (Học phí chuẩn brief) -->
                        <div class="acc-square-box">
                            <button class="acc-square-header faq-acc-btn" type="button">
                                <span class="acc-square-title">Học phí chương trình MBA ISTEC là bao nhiêu?</span>
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                            </button>
                            <div class="acc-square-panel">
                                <div class="acc-square-content">
                                    <p style="margin: 0; color: var(--dark-sub); line-height: 1.65;">Chương trình có mức phí cạnh tranh cùng nhiều chính sách đóng học phí linh hoạt và hỗ trợ trả góp qua thẻ tín dụng Sacombank từ 12 - 24 tháng (lãi suất 0%). Học phí ưu đãi qua Viện IDEAS còn <strong>6.500 EUR</strong> (tiết kiệm 2.000 EUR so với giá công bố 8.500 EUR) cùng 200 EUR lệ phí xét tuyển hồ sơ. Vui lòng liên hệ hotline <strong>028 2244 2244</strong> để nhận lộ trình chi phí chi tiết.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CỘT PHẢI: FORM ĐẦY ĐỦ CÁC TRƯỜNG CHUẨN MỰC THEO YÊU CẦU -->
                <div class="form-col-right istec-reveal" id="dang-ky-ngay">
                    <div class="istec-square-card" style="padding: 34px 28px; background: #ffffff; border: 1px solid var(--border-light); box-shadow: 0 10px 35px rgba(0,0,0,0.06);">
                        <div style="margin-bottom: 20px;">
                            <span class="istec-label-top">NHẬN TƯ VẤN 1:1</span>
                            <h3 style="font-size: 1.35rem; font-weight: 800; color: var(--dark-main); margin-bottom: 6px;">
                                Khởi đầu hành trình <span style="color: var(--istec-deep-green);">MBA ISTEC Paris</span>
                            </h3>
                            <p style="color: var(--dark-muted); font-size: 0.9rem; margin: 0;">Chuyên viên sẽ liên hệ với bạn trong vòng 24h làm việc để tư vấn lộ trình phù hợp.</p>
                        </div>

                        <form id="istecLeadFormPhp" onsubmit="handleFormSubmitPhp(event)">
                            <div class="form-full-fields-wrap">
                                <!-- 1. Họ và tên -->
                                <div class="form-field-group">
                                    <label class="form-field-label" for="inpName">Họ và tên *</label>
                                    <input type="text" id="inpName" name="fullname" class="form-field-input" placeholder="Họ và tên của bạn" required />
                                </div>

                                <!-- 2 & 3. Số điện thoại + Email -->
                                <div class="form-grid-2-fields">
                                    <div class="form-field-group">
                                        <label class="form-field-label" for="inpPhone">Số điện thoại *</label>
                                        <input type="tel" id="inpPhone" name="phone" class="form-field-input" placeholder="Số điện thoại" required />
                                    </div>
                                    <div class="form-field-group">
                                        <label class="form-field-label" for="inpEmail">Email *</label>
                                        <input type="email" id="inpEmail" name="email" class="form-field-input" placeholder="Địa chỉ email" required />
                                    </div>
                                </div>

                                <!-- 4 & 5. Trình độ học vấn + Trình độ Tiếng Anh -->
                                <div class="form-grid-2-fields">
                                    <div class="form-field-group">
                                        <label class="form-field-label" for="inpEdu">Trình độ học vấn *</label>
                                        <select id="inpEdu" name="education" class="form-field-select" required>
                                            <option value="">-- Chọn trình độ --</option>
                                            <option value="Đại học">Đã tốt nghiệp Đại học</option>
                                            <option value="Cao đẳng">Đã tốt nghiệp Cao đẳng</option>
                                            <option value="Thạc sĩ">Đã có bằng Thạc sĩ</option>
                                            <option value="Khác">Trình độ khác</option>
                                        </select>
                                    </div>
                                    <div class="form-field-group">
                                        <label class="form-field-label" for="inpEnglish">Trình độ Tiếng Anh *</label>
                                        <select id="inpEnglish" name="english_level" class="form-field-select" required>
                                            <option value="">-- Chọn trình độ --</option>
                                            <option value="Cơ bản (A2-B1)">Cơ bản (A2 - B1)</option>
                                            <option value="Giao tiếp tốt (B2)">Giao tiếp tốt (B2)</option>
                                            <option value="Thành thạo (C1-C2)">Thành thạo (C1 - C2)</option>
                                            <option value="Có chứng chỉ IELTS/TOEIC">Có chứng chỉ IELTS / TOEIC</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- 6. Chức danh / Vị trí hiện tại -->
                                <div class="form-field-group">
                                    <label class="form-field-label" for="inpJob">Chức danh / Vị trí hiện tại *</label>
                                    <select id="inpJob" name="job_title" class="form-field-select" required>
                                        <option value="">-- Chọn chức danh --</option>
                                        <option value="Chuyên viên / Nhân viên">Chuyên viên / Nhân viên cấp cao</option>
                                        <option value="Trưởng nhóm / Team Leader">Trưởng nhóm / Team Leader</option>
                                        <option value="Trưởng phòng / Manager">Trưởng phòng / Quản lý cấp trung</option>
                                        <option value="Giám đốc / C-Level">Giám đốc / C-Level / Điều hành</option>
                                        <option value="Chủ doanh nghiệp / Founder">Chủ doanh nghiệp / Founder</option>
                                        <option value="Khác">Khác</option>
                                    </select>
                                </div>

                                <!-- 7. Nội dung chia sẻ / Thời gian nghe tư vấn -->
                                <div class="form-field-group">
                                    <label class="form-field-label" for="inpNote">Nội dung bạn muốn chia sẻ / thời gian có thể nghe tư vấn 1:1</label>
                                    <textarea id="inpNote" name="notes" class="form-field-textarea" placeholder="Ví dụ: Tôi muốn tìm hiểu về lộ trình học phí và thời gian khai giảng..."></textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn-istec-square-dark" style="width: 100%; justify-content: center; margin-top: 20px; padding: 14px; font-size: 1rem;">
                                <span>Gửi thông tin đăng ký</span>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </button>

                            <p style="text-align: center; font-size: 0.82rem; color: var(--dark-muted); margin: 12px 0 0;">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: -2px; margin-right: 4px;"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                Cam kết bảo mật thông tin
                            </p>

                            <div id="formSuccessPhp" style="display: none; padding: 14px; background: #f0fdf4; color: #166534; border: 1px solid #bbf7d0; border-radius: var(--radius-square); font-weight: 700; text-align: center; margin-top: 16px;">
                                Cảm ơn bạn! Thông tin đã được tiếp nhận. Ban tuyển sinh ISTEC Paris sẽ liên hệ sớm nhất.
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ NÚT CUỘN LÊN ĐẦU TRANG KIỂU APP NỔI TRÊN MOBILE (CÁCH XUỐNG DƯỚI, KHÔNG ĐÈ REELS) ══ -->
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
        // ── 1. ĐIỀU KHIỂN SLIDER 2 CHUYÊN GIA 1 HÀNG (CÓ ANIMATION SLIDE & NÚT) ──
        let currentExpertPage = 0;

        function updateExpertSlider() {
            const track = document.getElementById('expertSlideTrack');
            if (!track) return;
            const isMobile = window.innerWidth <= 1024;
            const maxPages = isMobile ? 4 : 2;
            if (currentExpertPage >= maxPages) {
                currentExpertPage = maxPages - 1;
            }

            if (isMobile) {
                track.style.transform = `translateX(calc(-${currentExpertPage * 100}% - ${currentExpertPage * 24}px))`;
            } else {
                if (currentExpertPage === 0) {
                    track.style.transform = 'translateX(0)';
                } else {
                    track.style.transform = 'translateX(calc(-100% - 24px))';
                }
            }

            const dots = document.querySelectorAll('.expert-nav-item');
            dots.forEach((dot, idx) => {
                dot.classList.toggle('active', idx === currentExpertPage);
            });
        }

        window.slideExpertNext = function () {
            const maxPages = (window.innerWidth <= 1024) ? 4 : 2;
            currentExpertPage = (currentExpertPage + 1) % maxPages;
            updateExpertSlider();
        };

        window.slideExpertPrev = function () {
            const maxPages = (window.innerWidth <= 1024) ? 4 : 2;
            currentExpertPage = (currentExpertPage - 1 + maxPages) % maxPages;
            updateExpertSlider();
        };

        window.goExpertSlide = function (page) {
            currentExpertPage = page;
            updateExpertSlider();
        };

        window.addEventListener('resize', updateExpertSlider);

        // ── 2. ĐIỀU KHIỂN TIMELINE & ACCORDION (ACTIVE MÀU XANH BRAND ISTEC) ──
        document.addEventListener("DOMContentLoaded", function () {
            const tBtns = document.querySelectorAll('.btn-tab-square');
            const accBlocks = document.querySelectorAll('.acc-square-box');

            tBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    tBtns.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');

                    const target = btn.getAttribute('data-term');
                    accBlocks.forEach(blk => {
                        const panel = blk.querySelector('.acc-square-panel');
                        if (panel) {
                            if (blk.id === target) {
                                panel.style.maxHeight = panel.scrollHeight + 'px';
                            } else {
                                panel.style.maxHeight = '0px';
                            }
                        }
                    });
                });
            });

            document.querySelectorAll('.acc-square-header').forEach(header => {
                header.addEventListener('click', () => {
                    const block = header.parentElement;
                    const panel = block.querySelector('.acc-square-panel');
                    if (!panel) return;

                    const isOpen = panel.style.maxHeight && panel.style.maxHeight !== '0px';
                    if (isOpen) {
                        panel.style.maxHeight = '0px';
                        block.classList.remove('open');
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + 'px';
                        block.classList.add('open');
                    }
                });
            });
        });

        // ── 3. FORM SUBMISSION ĐẦY ĐỦ CÁC TRƯỜNG VỚI DATA TRACKING ──
        function handleFormSubmitPhp(e) {
            e.preventDefault();
            const form = e.target;
            const submitBtn = form.querySelector('button[type="submit"]');
            const msg = document.getElementById('formSuccessPhp');

            submitBtn.disabled = true;
            submitBtn.style.opacity = '0.7';

            const payload = {
                fullname: form.fullname ? form.fullname.value : '',
                phone: form.phone ? form.phone.value : '',
                email: form.email ? form.email.value : '',
                education: form.education ? form.education.value : '',
                english_level: form.english_level ? form.english_level.value : '',
                job_title: form.job_title ? form.job_title.value : '',
                notes: form.notes ? form.notes.value : '',
                program: 'MBA ISTEC Paris'
            };

            if (window._mf && typeof window._mf.trackEvent === 'function') {
                window._mf.trackEvent('Lead_MBA_ISTEC_Full', payload);
            }

            setTimeout(() => {
                submitBtn.style.display = 'none';
                msg.style.display = 'block';
                form.reset();
            }, 600);
        }

        // ── 4. TOGGLE TABS TRẢI NGHIỆM HỌC XÁ PARIS (IN THE HEART OF PARIS) ──
        window.toggleCampusTab = function (btn) {
            const item = btn.closest('.campus-feature-item');
            const panel = item.querySelector('.campus-feature-panel');
            const isOpen = btn.classList.contains('active');

            document.querySelectorAll('.campus-feature-btn').forEach(b => {
                b.classList.remove('active');
                const p = b.closest('.campus-feature-item')?.querySelector('.campus-feature-panel');
                if (p) p.style.maxHeight = '0px';
            });

            if (!isOpen) {
                btn.classList.add('active');
                panel.style.maxHeight = panel.scrollHeight + 'px';
            }
        };

        // ── 5. REAL PARALLAX SCROLL CONTROLLER TRÊN ẢNH ──
        function initRealParallax() {
            const parallaxWraps = [
                { wrap: document.getElementById('parallaxWrap1'), img: document.getElementById('parallaxImg1') },
                { wrap: document.getElementById('parallaxWrap2'), img: document.getElementById('parallaxImg2') }
            ];

            let ticking = false;

            function updateParallaxPositions() {
                const winH = window.innerHeight;
                parallaxWraps.forEach(item => {
                    if (!item.wrap || !item.img) return;
                    const rect = item.wrap.getBoundingClientRect();
                    if (rect.top < winH && rect.bottom > 0) {
                        const totalScroll = winH + rect.height;
                        const scrolled = winH - rect.top;
                        const progress = scrolled / totalScroll; // 0 to 1
                        const translateY = (progress - 0.5) * 220; // 220px deep glide
                        item.img.style.transform = `translate3d(0, ${translateY}px, 0)`;
                    }
                });
                ticking = false;
            }

            window.addEventListener('scroll', () => {
                if (!ticking) {
                    window.requestAnimationFrame(updateParallaxPositions);
                    ticking = true;
                }
            }, { passive: true });

            updateParallaxPositions();
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initRealParallax);
        } else {
            initRealParallax();
        }

        // ── 6. SLIDEDOT CHO SECTION THÁCH THỨC TRÊN MOBILE ──
        const challengeTrack = document.getElementById('challengeTrack');
        const challengeDots = document.querySelectorAll('.challenge-dot');

        if (challengeTrack && challengeDots.length > 0) {
            challengeTrack.addEventListener('scroll', () => {
                const scrollLeft = challengeTrack.scrollLeft;
                const cardWidth = challengeTrack.querySelector('.istec-square-card')?.offsetWidth || 1;
                const activeIndex = Math.round(scrollLeft / (cardWidth + 14));
                challengeDots.forEach((dot, idx) => {
                    dot.classList.toggle('active', idx === activeIndex);
                });
            }, { passive: true });
        }

        window.goChallengeSlide = function (idx) {
            if (!challengeTrack) return;
            const cards = challengeTrack.querySelectorAll('.istec-square-card');
            if (cards[idx]) {
                cards[idx].scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
            }
        };

        // ── 7. NÚT SCROLL TO TOP ──
        window.addEventListener('scroll', () => {
            const btn = document.getElementById('btnScrollTop');
            if (btn) {
                if (window.scrollY > 350) {
                    btn.classList.add('visible');
                } else {
                    btn.classList.remove('visible');
                }
            }
        }, { passive: true });

        window.scrollToTop = function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        };

        // ── 8. TỰ ĐỘNG KÍCH HOẠT ANIMATION SCROLL REVEAL BẰNG INTERSECTION OBSERVER ──
        function initScrollReveal() {
            const reveals = document.querySelectorAll('.istec-reveal, .istec-stagger');
            if (!reveals.length) return;

            if (!('IntersectionObserver' in window)) {
                reveals.forEach(el => el.classList.add('is-visible'));
                return;
            }

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

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initScrollReveal);
        } else {
            initScrollReveal();
        }

        // ── 9. HIỆU ỨNG CHẠY SỐ (COUNT-UP RUNNING ANIMATION) ──
        function initCounterAnimation() {
            const counterEls = document.querySelectorAll('.stat-strip-num[data-counter-target]');
            if (!counterEls.length) return;

            function formatNumber(val, useDot) {
                if (useDot) {
                    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                }
                return val.toString();
            }

            function runCounter(el) {
                const target = parseInt(el.getAttribute('data-counter-target'), 10);
                if (isNaN(target)) return;

                const prefix = el.getAttribute('data-counter-prefix') || '';
                const suffix = el.getAttribute('data-counter-suffix') || '';
                const useDot = el.getAttribute('data-counter-format') === 'dot';
                const duration = 1800;
                let startTime = null;

                function easeOutExpo(t) {
                    return t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
                }

                function step(timestamp) {
                    if (!startTime) startTime = timestamp;
                    const elapsed = timestamp - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const easedProgress = easeOutExpo(progress);
                    const currentVal = Math.floor(easedProgress * target);

                    el.textContent = `${prefix}${formatNumber(currentVal, useDot)}${suffix}`;

                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    } else {
                        el.textContent = `${prefix}${formatNumber(target, useDot)}${suffix}`;
                    }
                }

                window.requestAnimationFrame(step);
            }

            if (!('IntersectionObserver' in window)) {
                counterEls.forEach(runCounter);
                return;
            }

            let hasAnimated = false;
            const statsStrip = document.querySelector('.istec-stats-strip');
            if (statsStrip) {
                const observer = new IntersectionObserver((entries, obs) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && !hasAnimated) {
                            hasAnimated = true;
                            counterEls.forEach(el => runCounter(el));
                            obs.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.2,
                    rootMargin: '0px 0px -30px 0px'
                });
                observer.observe(statsStrip);
            } else {
                counterEls.forEach(runCounter);
            }
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initCounterAnimation);
        } else {
            initCounterAnimation();
        }
    </script>
</body>

</html>
