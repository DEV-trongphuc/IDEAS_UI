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
        <meta property="og:image" content="https://istec.fr/wp-content/uploads/2025/05/230912_05457_HD-scaled.jpg" />
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

    <!-- Custom CSS: Chuẩn phong cách thiết kế ISTEC Paris (Vuông vức, Clean, Sang trọng, Không lỗi ngắt dòng) -->
    <style>
        :root {
            --istec-deep-green: #005C4D;      /* Xanh đậm signature của website istec.fr */
            --istec-deep-hover: #004439;
            --istec-bright-green: #61A60E;    /* Xanh lá tươi nhận diện ISTEC */
            --istec-teal: #00876C;            /* Xanh mòng két tiêu đề nhãn */
            --dark-main: #111827;             /* Chữ đen than chuẩn */
            --dark-sub: #374151;              /* Chữ nội dung */
            --dark-muted: #6b7280;            /* Chữ phụ */
            --border-light: #e5e7eb;          /* Viền mảnh thanh lịch */
            --border-subtle: #f3f4f6;
            --bg-page: #ffffff;
            --bg-alt: #f9fafb;
            --radius-square: 4px;             /* Phong cách vuông vức của ISTEC */
            --shadow-card: 0 4px 20px rgba(0, 0, 0, 0.05);
            --shadow-hover: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        /* Đồng bộ font chữ Plus Jakarta Sans toàn trang */
        body, button, input, select, textarea, h1, h2, h3, h4, h5, h6, p, a, span {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
            box-sizing: border-box;
        }

        /* ── HERO SECTION THEO PHONG CÁCH CHUẨN ISTEC (Screenshot 3) ── */
        .istec-hero-container {
            padding: 50px 0 30px;
            background: #ffffff;
        }

        .istec-hero-flex {
            display: flex;
            align-items: flex-start;
            gap: 48px;
            margin-bottom: 40px;
        }

        /* Cột trái: Hộp thông số nổi vuông vức của ISTEC */
        .istec-spec-box {
            flex: 0 0 340px;
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 32px 26px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.06);
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

        /* Cột phải: Tiêu đề chương trình và mô tả phong cách ISTEC */
        .istec-hero-main-content {
            flex: 1;
            padding-top: 8px;
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

        /* Nút vuông vức chuẩn ISTEC (Ảnh 3: [ -> Apply ]) */
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
            transition: all 0.25s ease;
        }

        .btn-istec-square-dark:hover {
            background: var(--istec-deep-green);
            color: #ffffff !important;
            transform: translateY(-2px);
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
            transition: all 0.25s ease;
        }

        .btn-istec-square-green:hover {
            background: #4d860a;
            color: #ffffff !important;
            transform: translateY(-2px);
        }

        /* Banner hình ảnh sinh viên chân thực rộng toàn khung (Ảnh 3) */
        .istec-hero-banner-img {
            width: 100%;
            height: 380px;
            border-radius: var(--radius-square);
            overflow: hidden;
            border: 1px solid var(--border-light);
        }

        .istec-hero-banner-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center 25%;
            display: block;
        }

        /* ── SECTION HEADER CHUẨN (Ảnh 4: CURRICULUM / Program) ── */
        .istec-section-box {
            padding: 80px 0;
            background: #ffffff;
        }

        .istec-section-box.bg-alt {
            background: var(--bg-alt);
            border-top: 1px solid var(--border-light);
            border-bottom: 1px solid var(--border-light);
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

        /* Khung ngang màu trắng chứa các bài học trọng tâm (Ảnh 5) */
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

        /* Khung dọc màu trắng chứa các mục tiêu đầu ra (Ảnh 5) */
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

        /* ── 6 THÁCH THỨC SỰ NGHIỆP (3 Cột vuông vức) ── */
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

        /* ── 5 GIÁ TRỊ CỐT LÕI (Không ngắt dòng xấu) ── */
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

        /* ── FACULTY SLIDER ── */
        .faculty-track-wrap {
            overflow: hidden;
            padding: 4px 2px 20px;
        }

        .faculty-track {
            display: flex;
            gap: 20px;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .faculty-card-square {
            flex: 0 0 calc((100% - 60px) / 4);
            min-width: 250px;
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            overflow: hidden;
            box-shadow: var(--shadow-card);
        }

        .faculty-img-square {
            width: 100%;
            height: 250px;
            object-fit: cover;
            object-position: center top;
            background: #f1f5f9;
        }

        .faculty-content-pad {
            padding: 18px;
        }

        .faculty-name-bold {
            font-size: 1.05rem;
            font-weight: 800;
            color: var(--dark-main);
            margin-bottom: 4px;
        }

        .faculty-sub-role {
            font-size: 0.82rem;
            font-weight: 700;
            color: var(--istec-bright-green);
            margin-bottom: 8px;
            line-height: 1.35;
        }

        .faculty-short-bio {
            font-size: 0.84rem;
            color: var(--dark-muted);
            line-height: 1.5;
        }

        /* ── TIMELINE 15 MÔN HỌC & ACCORDION ── */
        .timeline-tabs-clean {
            display: flex;
            justify-content: center;
            gap: 8px;
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
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-tab-square.active {
            background: var(--dark-main);
            color: #ffffff;
            border-color: var(--dark-main);
        }

        .accordion-square-wrap {
            max-width: 920px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .acc-square-box {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            overflow: hidden;
        }

        .acc-square-header {
            width: 100%;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #ffffff;
            border: none;
            cursor: pointer;
            text-align: left;
        }

        .acc-square-header:hover {
            background: #fbfbfb;
        }

        .acc-square-title {
            font-size: 1.1rem;
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
            padding: 0 24px 22px;
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

        /* ── MARQUEE LOGO KIỂM ĐỊNH ── */
        .marquee-square-container {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: var(--radius-square);
            padding: 30px 20px;
            overflow: hidden;
            margin-bottom: 36px;
        }

        .marquee-track-infinite {
            display: flex;
            overflow: hidden;
            mask-image: linear-gradient(to right, transparent, black 6%, black 94%, transparent);
            -webkit-mask-image: linear-gradient(to right, transparent, black 6%, black 94%, transparent);
        }

        .marquee-slides-track {
            display: flex;
            gap: 54px;
            align-items: center;
            animation: istec-scroll 24s linear infinite;
            white-space: nowrap;
        }

        .marquee-slides-track:hover {
            animation-play-state: paused;
        }

        .logo-acc-istec {
            height: 46px;
            width: auto;
            max-width: 150px;
            object-fit: contain;
            filter: grayscale(100%);
            opacity: 0.85;
            transition: all 0.25s ease;
        }

        .logo-acc-istec:hover {
            filter: grayscale(0%);
            opacity: 1;
        }

        /* ── KHUNG HỌC PHÍ VUÔNG VỨC & RÕ RÀNG ── */
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

        /* ── RESPONSIVE ── */
        @media (max-width: 1024px) {
            .istec-hero-flex {
                flex-direction: column;
                gap: 32px;
            }
            .istec-spec-box {
                flex: none;
                width: 100%;
                max-width: none;
            }
            .istec-white-bar-card {
                grid-template-columns: repeat(2, 1fr);
            }
            .grid-3-cols {
                grid-template-columns: repeat(2, 1fr);
            }
            .grid-5-cols {
                grid-template-columns: repeat(2, 1fr);
            }
            .faculty-card-square {
                flex: 0 0 calc((100% - 20px) / 2);
            }
        }

        @media (max-width: 768px) {
            .istec-hero-banner-img {
                height: 240px;
            }
            .istec-white-bar-card {
                grid-template-columns: 1fr;
            }
            .grid-3-cols {
                grid-template-columns: 1fr;
            }
            .grid-2-cols {
                grid-template-columns: 1fr;
            }
            .grid-5-cols {
                grid-template-columns: 1fr;
            }
            .faculty-card-square {
                flex: 0 0 100%;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>

    <!-- ══ HEADER ĐỒNG BỘ CHUẨN IDEAS ══ -->
    <?php get_template_part('shared-header'); ?>

    <!-- ══ 1. HERO SECTION (CHUẨN STYLE ISTEC TỪ SCREENSHOT 3) ══ -->
    <section class="istec-hero-container">
        <div class="container">
            <div class="istec-hero-flex">
                <!-- HỘP THÔNG SỐ NỔI VUÔNG VỨC (ACCESS, RHYTHM, BACK TO SCHOOL, DIPLOMA) -->
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

                <!-- NỘI DUNG CHÍNH (TIÊU ĐỀ 2-TONE & MÔ TẢ PHONG CÁCH CHÂU ÂU) -->
                <div class="istec-hero-main-content">
                    <h1 class="istec-hero-headline">
                        <span class="hl-dark">MBA</span> <span class="hl-green">Leadership & Business Transformation</span>
                    </h1>

                    <div class="istec-hero-sub-title">
                        Từ người giỏi chuyên môn đến nhà quản trị toàn diện
                    </div>

                    <p class="istec-hero-paragraph">
                        Trong một môi trường kinh doanh ngày càng phức tạp, năng lực chuyên môn giỏi là chưa đủ. Chương trình MBA tại ISTEC Business School Paris giúp người học mở rộng tư duy quản trị đa chiều từ Chiến lược, Lãnh đạo, Tài chính, Vận hành đến Đổi mới sáng tạo và AI, trang bị bản lĩnh sẵn sàng đảm nhận các cương vị quản lý và điều hành cấp cao.
                    </p>

                    <div style="display: flex; gap: 14px; flex-wrap: wrap;">
                        <a href="#dang-ky-ngay" class="btn-istec-square-dark">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            <span>Đăng ký xét tuyển</span>
                        </a>
                        <a href="#chuong-trinh" class="btn-istec-square-green">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 9l-7 7-7-7"/></svg>
                            <span>Khung chương trình</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- BĂNG ẢNH SINH VIÊN RỘNG TOÀN KHUNG THEO CHUẨN ISTEC (ẢNH 3) -->
            <div class="istec-hero-banner-img">
                <img src="https://istec.fr/wp-content/uploads/2025/05/Homepage_5-1-scaled.jpg" alt="Sinh viên trường Kinh doanh ISTEC Paris" loading="eager" fetchpriority="high" />
            </div>
        </div>
    </section>

    <!-- ══ 2. CURRICULUM & PROGRAM (CHUẨN THEO SCREENSHOT 4 CỦA ISTEC) ══ -->
    <section class="istec-section-box" id="chuong-trinh">
        <div class="container">
            <div style="margin-bottom: 36px;">
                <span class="istec-label-top">CURRICULUM</span>
                <h2 class="istec-heading-large">Chương trình đào tạo MBA ISTEC</h2>
                <p class="istec-body-lead">
                    Chương trình Thạc sĩ Quản trị Kinh doanh tại ISTEC Paris cung cấp nền tảng học thuật vững chắc (60 tín chỉ ECTS Châu Âu) với 15 môn học thực tiễn và luận văn tốt nghiệp. Học phí công bố là 8.500 EUR, ưu đãi đăng ký qua Viện IDEAS còn 6.500 EUR cùng 200 EUR lệ phí hồ sơ. Bằng cấp được Bộ Giáo dục Đại học và Nghiên cứu Pháp cấp chuẩn Visa Bac+5 và đăng ký Khung nghề nghiệp quốc gia RNCP Level 7.
                </p>
            </div>

            <!-- Focus card vuông vức -->
            <div class="istec-square-card" style="margin-bottom: 48px; border-left: 4px solid var(--istec-teal); padding: 28px 32px;">
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
        </div>
    </section>

    <!-- ══ 3. MỤC XANH ĐẬM: LESSONS & GOALS (CHUẨN THEO SCREENSHOT 5 CỦA ISTEC) ══ -->
    <section class="istec-dark-green-section">
        <div class="container">
            <!-- Khối 1: Lessons -->
            <div style="margin-bottom: 48px;">
                <h3 class="istec-green-block-title">Lessons (Học phần trọng tâm)</h3>
                <div class="istec-white-bar-card">
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
            <div>
                <h3 class="istec-green-block-title">Goals (Mục tiêu năng lực đầu ra)</h3>
                <div class="istec-white-goals-card">
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
        </div>
    </section>

    <!-- ══ 4. 6 THÁCH THỨC SỰ NGHIỆP (VUÔNG VỨC, KHÔNG LỖI NGẮT DÒNG) ══ -->
    <section class="istec-section-box bg-alt" id="thach-thuc">
        <div class="container">
            <div style="margin-bottom: 40px;">
                <span class="istec-label-top">CAREER CHALLENGES</span>
                <h2 class="istec-heading-large">Thách thức của người đi làm khi bước lên vị trí quản lý</h2>
                <p class="istec-body-lead">
                    Khi chuyển dịch từ vị trí chuyên môn giỏi lên vai trò quản lý và lãnh đạo, người đi làm thường đối mặt với những bước chuyển biến cốt lõi:
                </p>
            </div>

            <div class="grid-3-cols">
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
        </div>
    </section>

    <!-- ══ 5. 5 GIÁ TRỊ CỐT LÕI (FIX HOÀN TOÀN LỖI NGẮT DÒNG) ══ -->
    <section class="istec-section-box" id="gia-tri">
        <div class="container">
            <div style="margin-bottom: 32px;">
                <span class="istec-label-top">CORE VALUES</span>
                <h2 class="istec-heading-large">Từ chuyên môn đến năng lực quản trị toàn diện</h2>
                <p class="istec-body-lead">
                    MBA ISTEC Paris xây dựng tư duy hành động thực tiễn thông qua 5 giá trị cốt lõi:
                </p>
            </div>

            <div class="grid-5-cols">
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
        <div class="container">
            <div style="margin-bottom: 36px;">
                <span class="istec-label-top">COMPETENCIES & ADVANTAGES</span>
                <h2 class="istec-heading-large">Vì sao chọn Thạc sĩ Quản trị Kinh doanh của ISTEC?</h2>
            </div>

            <div class="grid-2-cols">
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
                <div class="pillar-square-box">
                    <div class="pillar-head-title">
                        <span class="square-dot" style="background: var(--dark-main);"></span>
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

    <!-- ══ 7. ĐỘI NGŨ GIẢNG VIÊN (CAROUSEL VUÔNG VỨC) ══ -->
    <section class="istec-section-box" id="giang-vien">
        <div class="container">
            <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 36px; flex-wrap: wrap; gap: 16px;">
                <div>
                    <span class="istec-label-top">FACULTY MEMBERS</span>
                    <h2 class="istec-heading-large" style="margin-bottom: 6px;">Học hỏi từ đội ngũ giáo sư & chuyên gia</h2>
                    <p class="istec-body-lead">Đội ngũ giảng viên quốc tế giàu kinh nghiệm học thuật và điều hành doanh nghiệp thực tiễn.</p>
                </div>
                <div style="display: flex; gap: 8px;">
                    <button class="btn-tab-square" id="btnPrevFac" aria-label="Trước" style="padding: 10px 16px;">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 18l-6-6 6-6"/></svg>
                    </button>
                    <button class="btn-tab-square" id="btnNextFac" aria-label="Sau" style="padding: 10px 16px;">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 18l6-6-6-6"/></svg>
                    </button>
                </div>
            </div>

            <div class="faculty-track-wrap">
                <div class="faculty-track" id="facSliderTrack">
                    <!-- Giáo sư 1 -->
                    <div class="faculty-card-square">
                        <img src="https://istec.fr/wp-content/uploads/2025/02/Adel_aloui.png" alt="Prof. Adel ALOUI" class="faculty-img-square" loading="lazy" />
                        <div class="faculty-content-pad">
                            <h3 class="faculty-name-bold">Prof. Adel ALOUI</h3>
                            <div class="faculty-sub-role">Professeur-chercheur en Management</div>
                            <p class="faculty-short-bio">Chuyên gia Quản trị Chiến lược và Chuỗi cung ứng (Supply Chain) tại ISTEC Paris.</p>
                        </div>
                    </div>
                    <!-- Giáo sư 2 -->
                    <div class="faculty-card-square">
                        <img src="https://istec.fr/wp-content/uploads/2025/07/JK260212_0547_LD-scaled-e1771806022893.jpg" alt="Prof. Jérôme BÊCHE" class="faculty-img-square" loading="lazy" />
                        <div class="faculty-content-pad">
                            <h3 class="faculty-name-bold">Prof. Jérôme BÊCHE</h3>
                            <div class="faculty-sub-role">Docteur en Sciences de Gestion</div>
                            <p class="faculty-short-bio">Tiến sĩ Khoa học Quản lý, Giảng viên - Nhà nghiên cứu cao cấp tại ISTEC Paris.</p>
                        </div>
                    </div>
                    <!-- Giáo sư 3 -->
                    <div class="faculty-card-square">
                        <img src="https://istec.fr/wp-content/uploads/2025/07/Christophe_bezes-2.png" alt="Prof. Christophe BEZES" class="faculty-img-square" loading="lazy" />
                        <div class="faculty-content-pad">
                            <h3 class="faculty-name-bold">Prof. Christophe BEZES</h3>
                            <div class="faculty-sub-role">Professeur Chercheur H.D.R</div>
                            <p class="faculty-short-bio">Tiến sĩ Khoa học Quản lý H.D.R, Chuyên gia đầu ngành Marketing và Chiến lược Thương hiệu.</p>
                        </div>
                    </div>
                    <!-- Giáo sư 4 -->
                    <div class="faculty-card-square">
                        <img src="https://istec.fr/wp-content/uploads/2025/07/JK260212_0641_LD-scaled-e1771802103644.jpg" alt="Prof. Sophie CANEVET" class="faculty-img-square" loading="lazy" />
                        <div class="faculty-content-pad">
                            <h3 class="faculty-name-bold">Prof. Sophie CANEVET</h3>
                            <div class="faculty-sub-role">PhD London School of Economics (LSE)</div>
                            <p class="faculty-short-bio">Giáo sư - Nhà nghiên cứu, Tiến sĩ từ Đại học Kinh tế Luân Đôn (LSE).</p>
                        </div>
                    </div>
                    <!-- Giáo sư 5 -->
                    <div class="faculty-card-square">
                        <img src="https://istec.fr/wp-content/uploads/2025/07/JK260212_0630_LD-scaled-e1771801981334.jpg" alt="Prof. Rey DANG" class="faculty-img-square" loading="lazy" />
                        <div class="faculty-content-pad">
                            <h3 class="faculty-name-bold">Prof. Rey DANG</h3>
                            <div class="faculty-sub-role">Directeur de la Recherche</div>
                            <p class="faculty-short-bio">Giám đốc Viện Nghiên cứu CERI ISTEC Paris, Tiến sĩ Khoa học Quản trị Doanh nghiệp.</p>
                        </div>
                    </div>
                    <!-- Giáo sư 6 -->
                    <div class="faculty-card-square">
                        <img src="https://istec.fr/wp-content/uploads/2025/07/ADO_web-1.jpg" alt="Prof. Istifanous ADO" class="faculty-img-square" loading="lazy" />
                        <div class="faculty-content-pad">
                            <h3 class="faculty-name-bold">Prof. Istifanous ADO</h3>
                            <div class="faculty-sub-role">Entrepreneuriat & Innovation</div>
                            <p class="faculty-short-bio">Trưởng bộ môn Khởi nghiệp & Đổi mới sáng tạo, Cố vấn ươm tạo doanh nghiệp khởi nghiệp.</p>
                        </div>
                    </div>
                    <!-- Giáo sư 7 -->
                    <div class="faculty-card-square">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/vientruong_avt-optimized.webp" alt="TS. Phạm Quang Vinh" class="faculty-img-square" loading="lazy" />
                        <div class="faculty-content-pad">
                            <h3 class="faculty-name-bold">TS. Phạm Quang Vinh</h3>
                            <div class="faculty-sub-role">Viện trưởng Viện IDEAS</div>
                            <p class="faculty-short-bio">Tiến sĩ Quản trị Kinh doanh (Hoa Kỳ), hơn 25 năm kinh nghiệm quản trị và đối ngoại quốc tế.</p>
                        </div>
                    </div>
                    <!-- Giáo sư 8 -->
                    <div class="faculty-card-square">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2024/04/Thay-thinh-optimized.webp" alt="TS. Dương Văn Thịnh" class="faculty-img-square" loading="lazy" />
                        <div class="faculty-content-pad">
                            <h3 class="faculty-name-bold">TS. Dương Văn Thịnh</h3>
                            <div class="faculty-sub-role">Phó Chủ tịch AI, VERON Group</div>
                            <p class="faculty-short-bio">Tiến sĩ QTKD (Pháp), Chuyên gia cấp cao về Trí tuệ nhân tạo (AI) và Chuyển đổi số.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 8. TIMELINE 15 MÔN HỌC & LUẬN VĂN (ACCORDION VUÔNG VỨC) ══ -->
    <section class="istec-section-box bg-alt">
        <div class="container">
            <div style="text-align: center; max-width: 820px; margin: 0 auto 36px;">
                <span class="istec-label-top">SYLLABUS DETAILS</span>
                <h2 class="istec-heading-large">Chi tiết lộ trình 15 môn học & Luận văn</h2>
                <p class="istec-body-lead" style="margin: 0 auto;">Cấu trúc khoa học gồm 3 học kỳ nền tảng và giai đoạn thực hiện luận văn tốt nghiệp.</p>
            </div>

            <!-- Timeline Navigation Buttons -->
            <div class="timeline-tabs-clean">
                <button class="btn-tab-square active" data-term="boxTerm1">Học Kỳ I (3 Tháng)</button>
                <button class="btn-tab-square" data-term="boxTerm2">Học Kỳ II (3 Tháng)</button>
                <button class="btn-tab-square" data-term="boxTerm3">Học Kỳ III (3 Tháng)</button>
                <button class="btn-tab-square" data-term="boxTerm4">Luận Văn Tốt Nghiệp (2 Tháng)</button>
            </div>

            <div class="accordion-square-wrap">
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

    <!-- ══ 9. VĂN BẰNG & MARQUEE KIỂM ĐỊNH BỰ LÊN ══ -->
    <section class="istec-section-box" id="kiem-dinh">
        <div class="container">
            <div style="text-align: center; max-width: 820px; margin: 0 auto 36px;">
                <span class="istec-label-top">GLOBAL ACCREDITATIONS</span>
                <h2 class="istec-heading-large">Văn bằng giá trị quốc tế được công nhận toàn cầu</h2>
                <p class="istec-body-lead" style="margin: 0 auto;">
                    Được kiểm định và bảo chứng bởi hệ thống giáo dục đại học hàng đầu Cộng hòa Pháp và các tổ chức kiểm định quốc tế uy tín.
                </p>
            </div>

            <!-- Slide Marquee Bự Lên -->
            <div class="marquee-square-container">
                <div class="marquee-track-infinite">
                    <div class="marquee-slides-track">
                        <img src="https://istec.fr/wp-content/uploads/2025/02/logo-france-competences.30a014-1.png" alt="France Compétences RNCP" class="logo-acc-istec" />
                        <img src="https://istec.fr/wp-content/uploads/2026/02/CEFDG-1.webp" alt="CEFDG France" class="logo-acc-istec" />
                        <img src="https://istec.fr/wp-content/uploads/2025/07/CGE.webp" alt="Conférence des Grandes Écoles (CGE)" class="logo-acc-istec" />
                        <img src="https://istec.fr/wp-content/uploads/2025/07/AACSB.webp" alt="AACSB Member" class="logo-acc-istec" />
                        <img src="https://istec.fr/wp-content/uploads/2026/01/EFMD-Logo-2-300x122-1.png" alt="EFMD Global Member" class="logo-acc-istec" />
                        <img src="https://istec.fr/wp-content/uploads/2026/02/campus-france-logo.png" alt="Campus France" class="logo-acc-istec" />
                        <img src="https://istec.fr/wp-content/uploads/2026/02/qualiopi-logo-png.png" alt="Qualiopi France" class="logo-acc-istec" />
                        <!-- Lặp lại -->
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
            <div class="grid-5-cols" style="margin-top: 0;">
                <div class="istec-square-card">
                    <h3 style="font-size: 1.05rem; font-weight: 800; color: var(--dark-main); margin-bottom: 6px;">Visa Bac+5</h3>
                    <p style="font-size: 0.86rem; color: var(--dark-sub); margin: 0; line-height: 1.55;">Công nhận chính thức bởi Bộ Giáo dục Đại học và Nghiên cứu Pháp đối với chương trình MBA.</p>
                </div>
                <div class="istec-square-card">
                    <h3 style="font-size: 1.05rem; font-weight: 800; color: var(--dark-main); margin-bottom: 6px;">RNCP Level 7</h3>
                    <p style="font-size: 0.86rem; color: var(--dark-sub); margin: 0; line-height: 1.55;">Chứng nhận nghề nghiệp cấp độ cao nhất (Bac+5) trong Khung chứng nhận quốc gia Pháp.</p>
                </div>
                <div class="istec-square-card">
                    <h3 style="font-size: 1.05rem; font-weight: 800; color: var(--dark-main); margin-bottom: 6px;">CGE Member</h3>
                    <p style="font-size: 0.86rem; color: var(--dark-sub); margin: 0; line-height: 1.55;">Thành viên Conférence des Grandes Écoles – hiệp hội các trường đại học tinh hoa của Pháp.</p>
                </div>
                <div class="istec-square-card">
                    <h3 style="font-size: 1.05rem; font-weight: 800; color: var(--dark-main); margin-bottom: 6px;">AACSB Member</h3>
                    <p style="font-size: 0.86rem; color: var(--dark-sub); margin: 0; line-height: 1.55;">Thành viên Hiệp hội phát triển giảng dạy quản trị kinh doanh Hoa Kỳ danh giá toàn cầu.</p>
                </div>
                <div class="istec-square-card">
                    <h3 style="font-size: 1.05rem; font-weight: 800; color: var(--dark-main); margin-bottom: 6px;">EFMD Global</h3>
                    <p style="font-size: 0.86rem; color: var(--dark-sub); margin: 0; line-height: 1.55;">Thành viên tổ chức phát triển quản lý Châu Âu EFMD, đảm bảo chuẩn mực học thuật quốc tế.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 10. HỌC PHÍ VÀ LỘ TRÌNH TÀI CHÍNH (8500 PUBLIC / 6500 + 200 LPHS) ══ -->
    <section class="istec-section-box bg-alt" id="hoc-phi">
        <div class="container">
            <div style="text-align: center; max-width: 820px; margin: 0 auto 36px;">
                <span class="istec-label-top">TUITION & ADMISSIONS</span>
                <h2 class="istec-heading-large">Chính sách học phí & Lộ trình tài chính</h2>
                <p class="istec-body-lead" style="margin: 0 auto;">Chính sách hỗ trợ học phí tối ưu cho học viên Việt Nam từ đối tác tuyển sinh chính thức Viện IDEAS.</p>
            </div>

            <div class="tuition-square-card">
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
                        <a href="#dang-ky-ngay" class="btn-istec-square-dark">
                            <span>Nhận tư vấn lộ trình học phí chi tiết</span>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 11. LỄ TỐT NGHIỆP TẠI PARIS ══ -->
    <section class="istec-section-box">
        <div class="container">
            <div style="text-align: center; max-width: 820px; margin: 0 auto 36px;">
                <span class="istec-label-top">GRADUATION IN PARIS</span>
                <h2 class="istec-heading-large">Lễ tốt nghiệp ISTEC trang trọng tại Paris</h2>
                <p class="istec-body-lead" style="margin: 0 auto;">
                    Khoảnh khắc vinh danh đáng nhớ được tổ chức tại các khán phòng nghệ thuật biểu tượng của thủ đô Paris như Grand Rex hay Folies Bergère.
                </p>
            </div>

            <div style="display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 24px; align-items: center; max-width: 960px; margin: 0 auto;">
                <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: var(--radius-square); border: 1px solid var(--border-light); background: #000;">
                    <iframe src="https://www.youtube.com/embed/99pGEp4Dkko" title="Lễ tốt nghiệp ISTEC Business School Paris" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"></iframe>
                </div>
                <div style="display: flex; flex-direction: column; gap: 16px;">
                    <img src="https://istec.fr/wp-content/uploads/2025/05/Homepage_5-1-scaled.jpg" alt="Lễ tốt nghiệp ISTEC Paris" style="border-radius: var(--radius-square); width: 100%; height: 160px; object-fit: cover; border: 1px solid var(--border-light);" loading="lazy" />
                    <img src="https://istec.fr/wp-content/uploads/2025/10/istec_bs25.jpg" alt="Sinh viên quốc tế ISTEC Paris" style="border-radius: var(--radius-square); width: 100%; height: 160px; object-fit: cover; border: 1px solid var(--border-light);" loading="lazy" />
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 12. FAQ (CÂU HỎI THƯỜNG GẶP) ══ -->
    <section class="istec-section-box bg-alt" id="faq">
        <div class="container">
            <div style="text-align: center; max-width: 820px; margin: 0 auto 36px;">
                <span class="istec-label-top">FREQUENTLY ASKED QUESTIONS</span>
                <h2 class="istec-heading-large">Câu hỏi thường gặp</h2>
            </div>

            <div class="accordion-square-wrap">
                <!-- FAQ 1 -->
                <div class="acc-square-box">
                    <button class="acc-square-header faq-acc-btn" type="button">
                        <span class="acc-square-title">MBA ISTEC phù hợp với ai?</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                    </button>
                    <div class="acc-square-panel" style="max-height: 400px;">
                        <div class="acc-square-content">
                            <p style="margin: 0; color: var(--dark-sub); line-height: 1.65;">MBA ISTEC phù hợp với những ai muốn nâng tầm từ năng lực chuyên môn lên tư duy quản trị chiến lược: Chuyên viên giàu kinh nghiệm, Quản lý cấp trung, Trưởng bộ phận, và Doanh nhân muốn hệ thống hóa quy trình quản trị doanh nghiệp.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="acc-square-box">
                    <button class="acc-square-header faq-acc-btn" type="button">
                        <span class="acc-square-title">Thời gian đào tạo chương trình là bao lâu?</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                    </button>
                    <div class="acc-square-panel">
                        <div class="acc-square-content">
                            <p style="margin: 0; color: var(--dark-sub); line-height: 1.65;">Chương trình kéo dài 12 tháng, gồm 3 học kỳ (mỗi kỳ 3 tháng) và giai đoạn thực hiện luận văn/dự án cuối khóa trong 2 tháng.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="acc-square-box">
                    <button class="acc-square-header faq-acc-btn" type="button">
                        <span class="acc-square-title">Không có bằng cử nhân kinh tế có học được không?</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                    </button>
                    <div class="acc-square-panel">
                        <div class="acc-square-content">
                            <p style="margin: 0; color: var(--dark-sub); line-height: 1.65;">Hoàn toàn được. Chương trình chào đón người tốt nghiệp Đại học các ngành Kỹ thuật, Y tế, Xã hội, Ngôn ngữ... muốn phát triển năng lực quản lý điều hành.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="acc-square-box">
                    <button class="acc-square-header faq-acc-btn" type="button">
                        <span class="acc-square-title">Học phí chương trình MBA ISTEC là bao nhiêu?</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                    </button>
                    <div class="acc-square-panel">
                        <div class="acc-square-content">
                            <p style="margin: 0; color: var(--dark-sub); line-height: 1.65;">Học phí công bố (public) là 8.500 EUR. Học viên đăng ký qua Viện IDEAS được hưởng ưu đãi còn <strong>6.500 EUR</strong> cùng <strong>200 EUR</strong> lệ phí xét tuyển hồ sơ (LPHS). Có hỗ trợ trả góp 0% qua Sacombank.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 13. FORM ĐĂNG KÝ XÉT TUYỂN (VUÔNG VỨC, GỌN GÀNG) ══ -->
    <section class="istec-section-box" id="dang-ky-ngay">
        <div class="container">
            <div class="istec-square-card" style="max-width: 680px; margin: 0 auto; padding: 40px 36px;">
                <div style="text-align: center; margin-bottom: 28px;">
                    <span class="istec-label-top">APPLICATION FORM</span>
                    <h2 class="istec-heading-large" style="margin-bottom: 8px;">Đăng ký tư vấn & xét tuyển MBA ISTEC</h2>
                    <p style="color: var(--dark-muted); font-size: 0.94rem; margin: 0;">Điền thông tin để Ban tuyển sinh Viện IDEAS & ISTEC Paris liên hệ hỗ trợ bạn.</p>
                </div>

                <form id="istecLeadFormPhp" onsubmit="handleFormSubmitPhp(event)">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div>
                            <label style="display: block; font-size: 0.85rem; font-weight: 750; color: var(--dark-main); margin-bottom: 6px;" for="inpName">Họ và tên *</label>
                            <input type="text" id="inpName" name="fullname" style="width: 100%; padding: 11px 14px; border: 1px solid var(--border-light); border-radius: var(--radius-square); font-size: 0.95rem;" placeholder="Nguyễn Văn A" required />
                        </div>
                        <div>
                            <label style="display: block; font-size: 0.85rem; font-weight: 750; color: var(--dark-main); margin-bottom: 6px;" for="inpPhone">Số điện thoại *</label>
                            <input type="tel" id="inpPhone" name="phone" style="width: 100%; padding: 11px 14px; border: 1px solid var(--border-light); border-radius: var(--radius-square); font-size: 0.95rem;" placeholder="0901 234 567" required />
                        </div>
                        <div style="grid-column: 1 / -1;">
                            <label style="display: block; font-size: 0.85rem; font-weight: 750; color: var(--dark-main); margin-bottom: 6px;" for="inpEmail">Địa chỉ Email *</label>
                            <input type="email" id="inpEmail" name="email" style="width: 100%; padding: 11px 14px; border: 1px solid var(--border-light); border-radius: var(--radius-square); font-size: 0.95rem;" placeholder="email@domain.com" required />
                        </div>
                        <div>
                            <label style="display: block; font-size: 0.85rem; font-weight: 750; color: var(--dark-main); margin-bottom: 6px;" for="inpEdu">Trình độ học vấn</label>
                            <select id="inpEdu" name="education" style="width: 100%; padding: 11px 14px; border: 1px solid var(--border-light); border-radius: var(--radius-square); font-size: 0.95rem;">
                                <option value="Đại học">Đã tốt nghiệp Đại học</option>
                                <option value="Cao đẳng">Đã tốt nghiệp Cao đẳng</option>
                                <option value="Thạc sĩ">Đã có bằng Thạc sĩ</option>
                            </select>
                        </div>
                        <div>
                            <label style="display: block; font-size: 0.85rem; font-weight: 750; color: var(--dark-main); margin-bottom: 6px;" for="inpExp">Kinh nghiệm làm việc</label>
                            <select id="inpExp" name="experience" style="width: 100%; padding: 11px 14px; border: 1px solid var(--border-light); border-radius: var(--radius-square); font-size: 0.95rem;">
                                <option value="Dưới 3 năm">Dưới 3 năm</option>
                                <option value="3 - 5 năm" selected>Từ 3 - 5 năm</option>
                                <option value="Trên 5 năm">Trên 5 năm</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn-istec-square-dark" style="width: 100%; justify-content: center; margin-top: 20px; padding: 14px;">
                        <span>GỬI ĐĂNG KÝ XÉT TUYỂN</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>

                    <div id="formSuccessPhp" style="display: none; padding: 14px; background: #f0fdf4; color: #166534; border: 1px solid #bbf7d0; border-radius: var(--radius-square); font-weight: 700; text-align: center; margin-top: 16px;">
                        Cảm ơn bạn! Thông tin đã được tiếp nhận. Ban tuyển sinh ISTEC Paris sẽ liên hệ sớm nhất.
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- ══ FOOTER CHUẨN ĐỒNG BỘ CỦA WEBSITE IDEAS ══ -->
    <?php get_footer(); ?>

    <!-- ══ MODALS CHUẨN ĐỒNG BỘ CỦA THEME IDEAS ══ -->
    <?php get_template_part('shared-modals'); ?>

    <!-- ══ JAVASCRIPT ĐIỀU KHIỂN TƯƠNG TÁC ══ -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // 1. Faculty Slider
            const facTrack = document.getElementById('facSliderTrack');
            const facPrev = document.getElementById('btnPrevFac');
            const facNext = document.getElementById('btnNextFac');

            if (facTrack && facPrev && facNext) {
                let currentIdx = 0;
                function getVisible() {
                    if (window.innerWidth <= 768) return 1;
                    if (window.innerWidth <= 1024) return 2;
                    return 4;
                }

                function updateFacSlider() {
                    const total = facTrack.children.length;
                    const visible = getVisible();
                    const max = total - visible;
                    if (currentIdx > max) currentIdx = max;
                    if (currentIdx < 0) currentIdx = 0;

                    const width = facTrack.children[0].offsetWidth;
                    const gap = 20;
                    facTrack.style.transform = `translateX(-${currentIdx * (width + gap)}px)`;
                }

                facNext.addEventListener('click', () => {
                    const max = facTrack.children.length - getVisible();
                    currentIdx = (currentIdx < max) ? currentIdx + 1 : 0;
                    updateFacSlider();
                });

                facPrev.addEventListener('click', () => {
                    const max = facTrack.children.length - getVisible();
                    currentIdx = (currentIdx > 0) ? currentIdx - 1 : max;
                    updateFacSlider();
                });

                window.addEventListener('resize', updateFacSlider);
            }

            // 2. Timeline Tabs & Accordion
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
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + 'px';
                    }
                });
            });
        });

        // 3. Form Submission
        function handleFormSubmitPhp(e) {
            e.preventDefault();
            const form = e.target;
            const submitBtn = form.querySelector('button[type="submit"]');
            const msg = document.getElementById('formSuccessPhp');

            submitBtn.disabled = true;
            submitBtn.style.opacity = '0.7';

            if (window._mf && typeof window._mf.trackEvent === 'function') {
                window._mf.trackEvent('Lead_MBA_ISTEC_PHP', {
                    fullname: form.fullname.value,
                    phone: form.phone.value,
                    email: form.email.value,
                    education: form.education.value
                });
            }

            setTimeout(() => {
                submitBtn.style.display = 'none';
                msg.style.display = 'block';
                form.reset();
            }, 600);
        }
    </script>
</body>

</html>
