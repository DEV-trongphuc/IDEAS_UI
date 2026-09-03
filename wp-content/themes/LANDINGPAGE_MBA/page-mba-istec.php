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
        <title>Thạc Sĩ Quản Trị Kinh Doanh MBA ISTEC Paris | Bằng Quốc Gia Pháp Bac+5 (RNCP Level 7)</title>
        <meta name="description" content="Chương trình Thạc sĩ Quản trị Kinh doanh (MBA) trực tuyến 100% cấp bằng bởi ISTEC Business School Paris. 12 tháng, 15 môn học + luận văn, đạt kiểm định quốc gia Pháp RNCP Level 7." />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Thạc Sĩ Quản Trị Kinh Doanh MBA ISTEC Paris | Chuẩn Giáo Dục Pháp" />
        <meta property="og:description" content="Từ người giỏi chuyên môn đến nhà quản trị toàn diện. Chương trình MBA 12 tháng 100% trực tuyến từ trường kinh doanh ISTEC Paris với hơn 60 năm lịch sử." />
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
        "url": "https://ideas.edu.vn/mba-istec"
      }
    }
    </script>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "MBA ISTEC phù hợp với ai?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "MBA ISTEC phù hợp với những người đang muốn phát triển từ năng lực chuyên môn sang tư duy quản trị và lãnh đạo, bao gồm: Chuyên viên giàu kinh nghiệm, Quản lý cấp trung, Trưởng nhóm/trưởng bộ phận, và Doanh nhân muốn hệ thống hóa tư duy quản trị."
          }
        },
        {
          "@type": "Question",
          "name": "MBA ISTEC học trong bao lâu?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Chương trình kéo dài 12 tháng, gồm 3 học kỳ (mỗi kỳ 3 tháng) và giai đoạn thực hiện luận văn/dự án cuối khóa trong 2 tháng."
          }
        },
        {
          "@type": "Question",
          "name": "Tôi không bằng cấp chuyên ngành kinh doanh có theo học được không?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Có. MBA ISTEC phù hợp với người đã tốt nghiệp Đại học ở các ngành khác nhau và mong muốn phát triển năng lực quản trị."
          }
        },
        {
          "@type": "Question",
          "name": "MBA ISTEC có nội dung về AI không?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Có. Học viên được tiếp cận học phần chuyên sâu Digital Transformation & AI Strategy, giúp hiểu vai trò của công nghệ và trí tuệ nhân tạo trong hoạch định chiến lược."
          }
        },
        {
          "@type": "Question",
          "name": "Học phí chương trình MBA ISTEC là bao nhiêu?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Học phí chương trình là 6.500 EUR trọn gói. Học viên có thể trả góp 0% qua thẻ tín dụng Sacombank từ 12 - 24 tháng."
          }
        }
      ]
    }
    </script>

    <!-- Custom CSS: Clean, Minimalist, Harmonious ISTEC Green Tone -->
    <style>
        :root {
            --istec-green: #61A60E;
            --istec-green-hover: #4d860a;
            --istec-green-dark: #3b6608;
            --istec-green-soft: rgba(97, 166, 14, 0.08);
            --istec-green-tint: rgba(97, 166, 14, 0.12);
            --dark-heading: #1e293b;
            --dark-body: #475569;
            --dark-muted: #64748b;
            --border-clean: #e2e8f0;
            --border-soft: #edf2f7;
            --bg-white: #ffffff;
            --bg-page: #f8fafc;
            --radius-card: 16px;
            --radius-btn: 8px;
            --shadow-subtle: 0 4px 20px rgba(0, 0, 0, 0.04);
            --shadow-hover: 0 12px 30px rgba(0, 0, 0, 0.07);
        }

        /* Đồng bộ tuyệt đối Font chữ toàn trang theo chuẩn Plus Jakarta Sans */
        body, button, input, select, textarea, h1, h2, h3, h4, h5, h6, p, a, span {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
        }

        /* ── Hero Section ────────────────────────────── */
        .istec-hero-sec {
            padding: 60px 0 70px;
            background: #ffffff;
            border-bottom: 1px solid var(--border-clean);
        }

        .istec-hero-grid {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 48px;
            align-items: center;
        }

        .istec-hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--istec-green-soft);
            color: var(--istec-green-dark);
            padding: 6px 14px;
            border-radius: 6px;
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            margin-bottom: 20px;
        }

        .istec-badge-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--istec-green);
        }

        /* Tiêu đề Hero: Gọn gàng, cân đối, không bị quá to */
        .istec-hero-title {
            font-size: clamp(1.85rem, 3.2vw, 2.6rem);
            font-weight: 800;
            line-height: 1.25;
            color: var(--dark-heading);
            margin-bottom: 14px;
            letter-spacing: -0.02em;
        }

        .istec-hero-title .highlight-green {
            color: var(--istec-green);
            display: block;
        }

        .istec-hero-school {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--dark-heading);
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .istec-hero-school::before {
            content: '';
            display: inline-block;
            width: 20px;
            height: 3px;
            background: var(--istec-green);
            border-radius: 2px;
        }

        /* Thanh thông số nhanh */
        .istec-quick-stats {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 16px;
            padding: 12px 18px;
            background: var(--bg-page);
            border: 1px solid var(--border-clean);
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 0.92rem;
            font-weight: 600;
            color: var(--dark-heading);
        }

        .istec-quick-stats span.stat-dot {
            color: #cbd5e1;
        }

        .istec-hero-desc {
            font-size: 1.02rem;
            color: var(--dark-body);
            line-height: 1.65;
            margin-bottom: 22px;
        }

        .istec-quote-pill {
            display: inline-block;
            font-size: 0.86rem;
            font-weight: 700;
            color: var(--istec-green-dark);
            background: var(--istec-green-soft);
            padding: 8px 16px;
            border-radius: 6px;
            margin-bottom: 28px;
            letter-spacing: 0.02em;
        }

        .istec-hero-cta-row {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        /* Nút phong cách ISTEC */
        .btn-istec-green {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--istec-green);
            color: #ffffff !important;
            padding: 12px 24px;
            border-radius: var(--radius-btn);
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.25s ease;
            box-shadow: 0 4px 12px rgba(97, 166, 14, 0.25);
        }

        .btn-istec-green:hover {
            background: var(--istec-green-hover);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(97, 166, 14, 0.35);
            color: #ffffff !important;
        }

        .btn-istec-dark {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--dark-heading);
            color: #ffffff !important;
            padding: 12px 24px;
            border-radius: var(--radius-btn);
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.25s ease;
        }

        .btn-istec-dark:hover {
            background: #0f172a;
            transform: translateY(-2px);
            color: #ffffff !important;
        }

        /* Hero Image Column */
        .istec-hero-visual {
            position: relative;
            border-radius: var(--radius-card);
            overflow: hidden;
            border: 1px solid var(--border-clean);
            box-shadow: var(--shadow-subtle);
        }

        .istec-hero-img {
            width: 100%;
            height: 440px;
            object-fit: cover;
            display: block;
        }

        .istec-hero-caption {
            position: absolute;
            bottom: 16px;
            left: 16px;
            right: 16px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            padding: 14px 18px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        /* ── Dải băng xanh Finder Strip ─────────────── */
        .istec-finder-banner {
            background: var(--istec-green);
            color: #ffffff;
            padding: 16px 0;
        }

        .istec-finder-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            font-size: 0.92rem;
            font-weight: 600;
        }

        .istec-finder-chips {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        .istec-finder-chips strong {
            font-weight: 800;
            font-size: 1.05rem;
        }

        /* ── Standard Section Layout & Typography ────── */
        .istec-section {
            padding: 80px 0;
        }

        .istec-section-bg {
            background: var(--bg-page);
            border-top: 1px solid var(--border-clean);
            border-bottom: 1px solid var(--border-clean);
        }

        .istec-sec-head {
            margin-bottom: 48px;
        }

        .istec-eyebrow {
            display: inline-block;
            font-size: 0.82rem;
            font-weight: 700;
            color: var(--istec-green);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 8px;
        }

        .istec-title {
            font-size: clamp(1.5rem, 2.5vw, 2rem);
            font-weight: 800;
            color: var(--dark-heading);
            margin-bottom: 12px;
            line-height: 1.3;
            letter-spacing: -0.015em;
        }

        .istec-desc {
            font-size: 1rem;
            color: var(--dark-muted);
            max-width: 720px;
            line-height: 1.65;
        }

        /* ── Clean Cards (LOẠI BỎ TOÀN BỘ VIỀN TRÊN, VIỀN TRÁI MÀU SẮC) ── */
        .istec-card {
            background: #ffffff;
            border: 1px solid var(--border-clean);
            border-radius: var(--radius-card);
            padding: 32px 28px;
            transition: all 0.25s ease;
            box-shadow: var(--shadow-subtle);
            position: relative;
        }

        .istec-card:hover {
            border-color: #cbd5e1;
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }

        /* ── 6 Thách Thức Grid ────────────────────────── */
        .challenges-6-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .challenge-num-tag {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 8px;
            background: var(--istec-green-soft);
            color: var(--istec-green);
            font-size: 1.05rem;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .challenge-card-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--dark-heading);
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .challenge-card-desc {
            font-size: 0.94rem;
            color: var(--dark-body);
            line-height: 1.6;
        }

        /* ── Vì sao chọn ISTEC (2 Cột Năng Lực & Lợi Ích) ─ */
        .pillars-2-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
            margin-bottom: 36px;
        }

        .pillar-card-title {
            font-size: 1.28rem;
            font-weight: 800;
            color: var(--dark-heading);
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .pillar-icon-dot {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--istec-green-soft);
            color: var(--istec-green);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .pillar-bullet-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 16px;
            padding: 0;
            margin: 0;
        }

        .pillar-bullet-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 0.98rem;
            color: var(--dark-body);
            line-height: 1.55;
        }

        .bullet-tick {
            color: var(--istec-green);
            flex-shrink: 0;
            margin-top: 3px;
        }

        .suitability-clean-box {
            background: #ffffff;
            border: 1px solid var(--border-clean);
            border-radius: var(--radius-card);
            padding: 24px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            box-shadow: var(--shadow-subtle);
        }

        /* ── 4 Overview Cards (Đồng nhất, không lỏm chỏm) ── */
        .overview-4-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .overview-box {
            background: #ffffff;
            border: 1px solid var(--border-clean);
            border-radius: 14px;
            padding: 28px 22px;
            transition: all 0.25s ease;
            box-shadow: var(--shadow-subtle);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .overview-box:hover {
            border-color: #cbd5e1;
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }

        .overview-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: var(--istec-green-soft);
            color: var(--istec-green);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
        }

        .overview-sub {
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--dark-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 6px;
        }

        .overview-value {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--dark-heading);
            margin-bottom: 10px;
            line-height: 1.2;
        }

        .overview-desc {
            font-size: 0.9rem;
            color: var(--dark-body);
            line-height: 1.5;
        }

        /* ── 5 Core Values ───────────────────────────── */
        .values-5-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
            margin-bottom: 36px;
        }

        .value-mini-card {
            background: #ffffff;
            border: 1px solid var(--border-clean);
            border-radius: 12px;
            padding: 24px 18px;
            text-align: center;
            transition: all 0.25s ease;
        }

        .value-mini-card:hover {
            border-color: #cbd5e1;
            transform: translateY(-3px);
            box-shadow: var(--shadow-subtle);
        }

        .value-mini-icon {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--istec-green-soft);
            color: var(--istec-green);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
        }

        .value-mini-title {
            font-size: 0.98rem;
            font-weight: 750;
            color: var(--dark-heading);
            margin-bottom: 8px;
            line-height: 1.35;
        }

        .value-mini-desc {
            font-size: 0.86rem;
            color: var(--dark-body);
            line-height: 1.5;
        }

        /* ── Faculty Slider ──────────────────────────── */
        .faculty-track-wrap {
            overflow: hidden;
            padding: 6px 2px 20px;
        }

        .faculty-track {
            display: flex;
            gap: 20px;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            user-select: none;
        }

        .faculty-item-card {
            flex: 0 0 calc((100% - 60px) / 4);
            min-width: 250px;
            background: #ffffff;
            border: 1px solid var(--border-clean);
            border-radius: 14px;
            overflow: hidden;
            box-shadow: var(--shadow-subtle);
            transition: all 0.25s ease;
        }

        .faculty-item-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-hover);
            border-color: #cbd5e1;
        }

        .faculty-photo {
            width: 100%;
            height: 260px;
            object-fit: cover;
            object-position: center top;
            background: #f1f5f9;
        }

        .faculty-meta {
            padding: 18px;
        }

        .faculty-name-txt {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--dark-heading);
            margin-bottom: 4px;
        }

        .faculty-role-txt {
            font-size: 0.84rem;
            font-weight: 700;
            color: var(--istec-green);
            margin-bottom: 8px;
            line-height: 1.35;
        }

        .faculty-desc-txt {
            font-size: 0.84rem;
            color: var(--dark-muted);
            line-height: 1.5;
        }

        /* ── Curriculum Timeline & Accordion ─────────── */
        .timeline-buttons-row {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .timeline-nav-btn {
            padding: 10px 20px;
            background: #ffffff;
            border: 1px solid var(--border-clean);
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--dark-muted);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .timeline-nav-btn.active {
            background: var(--dark-heading);
            color: #ffffff;
            border-color: var(--dark-heading);
        }

        .syllabus-acc-container {
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .acc-block {
            background: #ffffff;
            border: 1px solid var(--border-clean);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-subtle);
        }

        .acc-trigger {
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

        .acc-trigger:hover {
            background: #fafafa;
        }

        .acc-trigger-title {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--dark-heading);
        }

        .acc-toggle-icon {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #f1f5f9;
            color: var(--dark-heading);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
            flex-shrink: 0;
        }

        .acc-block.active .acc-toggle-icon {
            transform: rotate(180deg);
            background: var(--istec-green);
            color: #ffffff;
        }

        .acc-panel {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            background: #ffffff;
        }

        .acc-panel-inner {
            padding: 0 24px 24px;
        }

        .course-item-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 16px;
            background: #f8fafc;
            border-radius: 6px;
            margin-bottom: 8px;
            border: 1px solid var(--border-soft);
        }

        .course-item-row:last-child {
            margin-bottom: 0;
        }

        /* ── Accreditations Marquee & Cards ───────────── */
        .marquee-box-clean {
            background: #ffffff;
            border: 1px solid var(--border-clean);
            border-radius: var(--radius-card);
            padding: 32px 20px;
            overflow: hidden;
            margin-bottom: 40px;
            box-shadow: var(--shadow-subtle);
        }

        .marquee-title {
            text-align: center;
            font-size: 0.88rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--dark-muted);
            margin-bottom: 24px;
        }

        .marquee-wrapper {
            display: flex;
            overflow: hidden;
            mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent);
            -webkit-mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent);
        }

        .marquee-moving-track {
            display: flex;
            gap: 56px;
            align-items: center;
            animation: istec-scroll 24s linear infinite;
            white-space: nowrap;
        }

        .marquee-moving-track:hover {
            animation-play-state: paused;
        }

        @keyframes istec-scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .logo-acc-img {
            height: 44px;
            width: auto;
            max-width: 150px;
            object-fit: contain;
            filter: grayscale(100%);
            opacity: 0.85;
            transition: all 0.25s ease;
        }

        .logo-acc-img:hover {
            filter: grayscale(0%);
            opacity: 1;
        }

        .acc-5-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 16px;
        }

        .acc-clean-card {
            background: #ffffff;
            border: 1px solid var(--border-clean);
            border-radius: 12px;
            padding: 20px 16px;
            transition: all 0.2s ease;
        }

        .acc-clean-card:hover {
            border-color: #cbd5e1;
            transform: translateY(-3px);
            box-shadow: var(--shadow-subtle);
        }

        .acc-card-head {
            font-size: 1.05rem;
            font-weight: 800;
            color: var(--dark-heading);
            margin-bottom: 8px;
        }

        .acc-card-txt {
            font-size: 0.86rem;
            color: var(--dark-body);
            line-height: 1.55;
        }

        /* ── Tuition Card ────────────────────────────── */
        .tuition-box-clean {
            max-width: 780px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid var(--border-clean);
            border-radius: var(--radius-card);
            overflow: hidden;
            box-shadow: var(--shadow-subtle);
        }

        .tuition-top-banner {
            background: var(--dark-heading);
            color: #ffffff;
            padding: 36px 30px;
            text-align: center;
        }

        .tuition-main-price {
            font-size: clamp(2.6rem, 4.5vw, 3.6rem);
            font-weight: 800;
            color: var(--istec-green);
            line-height: 1.1;
            margin: 8px 0;
        }

        .tuition-body-clean {
            padding: 36px;
        }

        /* ── FAQ & Lead Form ─────────────────────────── */
        .faq-clean-wrap {
            max-width: 820px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .faq-row {
            background: #ffffff;
            border: 1px solid var(--border-clean);
            border-radius: 12px;
            overflow: hidden;
        }

        .faq-btn {
            width: 100%;
            padding: 20px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: left;
            font-size: 1.05rem;
            font-weight: 750;
            color: var(--dark-heading);
            cursor: pointer;
            background: #ffffff;
            border: none;
        }

        .faq-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            font-size: 0.95rem;
            color: var(--dark-body);
            line-height: 1.65;
        }

        .faq-body-inner {
            padding: 0 24px 20px;
        }

        .lead-form-clean {
            max-width: 700px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid var(--border-clean);
            border-radius: var(--radius-card);
            padding: 40px 36px;
            box-shadow: var(--shadow-subtle);
        }

        .form-grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            margin-top: 24px;
        }

        .form-span-2 {
            grid-column: 1 / -1;
        }

        .form-lbl {
            display: block;
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--dark-heading);
            margin-bottom: 6px;
        }

        .form-inp {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border-clean);
            border-radius: 8px;
            font-size: 0.95rem;
            color: var(--dark-heading);
            background: #ffffff;
            outline: none;
            transition: border-color 0.2s ease;
        }

        .form-inp:focus {
            border-color: var(--istec-green);
        }

        /* ── Responsive Rules ────────────────────────── */
        @media (max-width: 1024px) {
            .istec-hero-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            .istec-hero-img {
                height: 360px;
            }
            .challenges-6-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .overview-4-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .values-5-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            .faculty-item-card {
                flex: 0 0 calc((100% - 20px) / 2);
            }
            .acc-5-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .pillars-2-grid {
                grid-template-columns: 1fr;
            }
            .challenges-6-grid {
                grid-template-columns: 1fr;
            }
            .overview-4-grid {
                grid-template-columns: 1fr;
            }
            .values-5-grid {
                grid-template-columns: 1fr;
            }
            .faculty-item-card {
                flex: 0 0 100%;
            }
            .form-grid-2 {
                grid-template-columns: 1fr;
            }
            .lead-form-clean {
                padding: 28px 20px;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>

    <!-- ══ HEADER CHUẨN ĐỒNG BỘ CỦA WEBSITE IDEAS ══ -->
    <?php get_template_part('shared-header'); ?>

    <!-- ══ 1. HERO SECTION ══ -->
    <section class="istec-hero-sec" id="hero">
        <div class="container">
            <div class="istec-hero-grid">
                <div>
                    <div class="istec-hero-badge">
                        <span class="istec-badge-dot"></span>
                        <span>MBA BAC+5 • THẠC SĨ QUẢN TRỊ KINH DOANH ISTEC PARIS</span>
                    </div>

                    <h1 class="istec-hero-title">
                        <span class="highlight-green">Từ người giỏi chuyên môn</span>
                        <span>đến nhà quản trị toàn diện</span>
                    </h1>

                    <div class="istec-hero-school">
                        MBA ISTEC Business School Paris
                    </div>

                    <!-- Thanh thông số nhanh gọn gàng -->
                    <div class="istec-quick-stats">
                        <span>12 Tháng</span>
                        <span class="stat-dot">•</span>
                        <span>15 Môn học + Luận văn</span>
                        <span class="stat-dot">•</span>
                        <span>100% Trực tuyến</span>
                        <span class="stat-dot">•</span>
                        <span>RNCP Level 7 (Bac+5)</span>
                    </div>

                    <p class="istec-hero-desc">
                        Trong một môi trường kinh doanh ngày càng phức tạp, chuyên môn giỏi là chưa đủ.
                        MBA ISTEC giúp người học phát triển tư duy quản trị toàn diện từ Chiến lược, Lãnh đạo, Tài chính, Marketing, Vận hành đến Đổi mới và AI để sẵn sàng bước vào những vai trò quản lý và lãnh đạo lớn hơn.
                    </p>

                    <div class="istec-quote-pill">
                        NÂNG TẦM NĂNG LỰC QUẢN TRỊ VỚI CHUẨN GIÁO DỤC PHÁP
                    </div>

                    <div class="istec-hero-cta-row">
                        <a href="#chuong-trinh" class="btn-istec-green">
                            <span>Khám phá chương trình</span>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                        <a href="#dang-ky-ngay" class="btn-istec-dark">
                            <span>Đăng ký xét tuyển</span>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Right: Visual -->
                <div class="istec-hero-visual">
                    <img src="https://istec.fr/wp-content/uploads/2025/05/230912_05457_HD-scaled.jpg"
                         alt="Học viên ISTEC Business School Paris" class="istec-hero-img"
                         loading="eager" fetchpriority="high" width="580" height="440" />
                    <div class="istec-hero-caption">
                        <div>
                            <strong style="display: block; color: var(--dark-heading); font-size: 1.05rem;">Grande École de Commerce</strong>
                            <span style="font-size: 0.85rem; color: var(--dark-muted);">Thành lập năm 1961 tại Paris, Pháp</span>
                        </div>
                        <a href="#kiem-dinh" style="color: var(--istec-green); font-weight: 700; font-size: 0.88rem; display: flex; align-items: center; gap: 6px;">
                            <span>Chi tiết</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 2. FINDER BAR ══ -->
    <div class="istec-finder-banner">
        <div class="container istec-finder-inner">
            <div>
                <strong>CHƯƠNG TRÌNH THẠC SĨ QUẢN TRỊ KINH DOANH CHUẨN QUỐC GIA PHÁP</strong>
            </div>
            <div class="istec-finder-chips">
                <span><strong>60+ Năm</strong> Đào tạo</span>
                <span><strong>8.000+</strong> Cựu học viên</span>
                <span><strong>3.500+</strong> Doanh nghiệp đối tác</span>
                <span><strong>Top 8</strong> Le Parisien Ranking</span>
            </div>
        </div>
    </div>

    <!-- ══ 3. THÁCH THỨC CỦA NGƯỜI ĐI LÀM (6 Thẻ sạch sẽ) ══ -->
    <section class="istec-section" id="thach-thuc">
        <div class="container">
            <div class="istec-sec-head text-center" style="max-width: 800px; margin-left: auto; margin-right: auto;">
                <span class="istec-eyebrow">BƯỚC NGOẶT SỰ NGHIỆP</span>
                <h2 class="istec-title">Thách thức của người đi làm khi muốn bước lên vị trí quản lý</h2>
                <p class="istec-desc" style="margin: 0 auto;">
                    Bạn có thể rất giỏi chuyên môn. Nhưng khi bước vào một vị trí cao hơn, những yêu cầu cũng thay đổi. Không còn chỉ là làm tốt công việc của mình. Bạn cần biết cách:
                </p>
            </div>

            <div class="challenges-6-grid">
                <div class="istec-card">
                    <div class="challenge-num-tag">01</div>
                    <h3 class="challenge-card-title">Ra quyết định trong bức tranh lớn</h3>
                    <p class="challenge-card-desc">Không chỉ nhìn vấn đề từ một phòng ban, mà phải hiểu tác động sâu rộng đến toàn bộ tổ chức và hiệu quả vận hành doanh nghiệp.</p>
                </div>
                <div class="istec-card">
                    <div class="challenge-num-tag">02</div>
                    <h3 class="challenge-card-title">Dẫn dắt con người</h3>
                    <p class="challenge-card-desc">Từ quản lý công việc sang năng lực xây dựng đội ngũ, truyền cảm hứng, tạo ảnh hưởng tích cực và thúc đẩy hiệu suất làm việc vượt trội.</p>
                </div>
                <div class="istec-card">
                    <div class="challenge-num-tag">03</div>
                    <h3 class="challenge-card-title">Kết nối các phòng ban</h3>
                    <p class="challenge-card-desc">Kết nối chiến lược, tài chính, marketing, vận hành và công nghệ trong một góc nhìn quản trị tổng thể để đưa ra quyết định hiệu quả hơn.</p>
                </div>
                <div class="istec-card">
                    <div class="challenge-num-tag">04</div>
                    <h3 class="challenge-card-title">Thích ứng với công nghệ mới và AI</h3>
                    <p class="challenge-card-desc">Nhà quản lý cần hiểu công nghệ ở góc độ chiến lược ứng dụng kinh doanh, không nhất thiết phải trở thành chuyên gia kỹ thuật.</p>
                </div>
                <div class="istec-card">
                    <div class="challenge-num-tag">05</div>
                    <h3 class="challenge-card-title">Phát triển tư duy kinh doanh quốc tế</h3>
                    <p class="challenge-card-desc">Doanh nghiệp ngày càng hoạt động trong môi trường đa văn hóa, đa thị trường và kết nối toàn cầu, đòi hỏi tư duy quản trị đa quốc gia.</p>
                </div>
                <div class="istec-card">
                    <div class="challenge-num-tag">06</div>
                    <h3 class="challenge-card-title">Mở rộng cơ hội nghề nghiệp đa lĩnh vực</h3>
                    <p class="challenge-card-desc">Phát triển nền tảng kiến thức đa ngành, mở rộng tối đa cơ hội đảm nhận các vai trò quản lý cấp cao trong nhiều lĩnh vực khác nhau.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 4. VÌ SAO CHỌN THẠC SĨ MBA CỦA ISTEC? ══ -->
    <section class="istec-section istec-section-bg" id="loi-ich">
        <div class="container">
            <div class="istec-sec-head text-center" style="max-width: 820px; margin-left: auto; margin-right: auto;">
                <span class="istec-eyebrow">GIÁ TRỊ KHÁC BIỆT</span>
                <h2 class="istec-title">Vì sao chọn Thạc sĩ Quản trị Kinh doanh của ISTEC?</h2>
                <p class="istec-desc" style="margin: 0 auto;">
                    Chương trình Thạc sĩ Quản trị kinh doanh (MBA) tại ISTEC Business School Paris hướng đến đào tạo người học trở thành những nhà quản lý và chuyên gia có năng lực quản trị toàn diện, giúp học viên thích ứng linh hoạt với môi trường kinh doanh nhiều biến động.
                </p>
            </div>

            <!-- 2 Cột sạch sẽ, không có dải màu trên đỉnh -->
            <div class="pillars-2-grid">
                <div class="istec-card">
                    <div class="pillar-card-title">
                        <div class="pillar-icon-dot">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        </div>
                        <span>Năng lực bạn sẽ đạt được</span>
                    </div>
                    <ul class="pillar-bullet-list">
                        <li>
                            <svg class="bullet-tick" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Tư duy quản trị tích hợp:</strong> Hiểu và kết hợp nhuần nhuyễn các chức năng cốt lõi của doanh nghiệp.</span>
                        </li>
                        <li>
                            <svg class="bullet-tick" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Ra quyết định dựa trên dữ liệu:</strong> Khả năng phân tích chiến lược và định hướng kinh doanh khoa học.</span>
                        </li>
                        <li>
                            <svg class="bullet-tick" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Chủ động ứng dụng AI:</strong> Tích hợp trí tuệ nhân tạo vào chiến lược và tối ưu vận hành kinh doanh thực tế.</span>
                        </li>
                        <li>
                            <svg class="bullet-tick" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Năng lực lãnh đạo đa văn hóa:</strong> Dẫn dắt đội ngũ hiệu quả trong môi trường đa quốc gia và kết nối toàn cầu.</span>
                        </li>
                        <li>
                            <svg class="bullet-tick" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Bản lĩnh giải quyết vấn đề thực tế:</strong> Tạo ra giá trị thặng dư bền vững và đo lường được cho tổ chức.</span>
                        </li>
                    </ul>
                </div>

                <div class="istec-card">
                    <div class="pillar-card-title">
                        <div class="pillar-icon-dot">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        </div>
                        <span>Lợi ích khi hoàn thành chương trình</span>
                    </div>
                    <ul class="pillar-bullet-list">
                        <li>
                            <svg class="bullet-tick" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Định vị lại sự nghiệp:</strong> Bằng Thạc sĩ quốc gia Pháp Bac+5 (RNCP Level 7) được công nhận quốc tế.</span>
                        </li>
                        <li>
                            <svg class="bullet-tick" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Áp dụng ngay vào công việc:</strong> Giải quyết trực tiếp các bài toán thực tiễn của doanh nghiệp bạn.</span>
                        </li>
                        <li>
                            <svg class="bullet-tick" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Mạng lưới hơn 8.000 cựu học viên:</strong> Kết nối cùng cộng đồng Alumni thành đạt của ISTEC toàn cầu.</span>
                        </li>
                        <li>
                            <svg class="bullet-tick" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Tiếp cận hơn 3.500 doanh nghiệp đối tác:</strong> Mở rộng quan hệ hợp tác thương mại và cơ hội đầu tư chiến lược.</span>
                        </li>
                        <li>
                            <svg class="bullet-tick" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span><strong>Sẵn sàng cho vai trò lãnh đạo cấp cao:</strong> Tự tin đảm nhận các cương vị Giám đốc, C-Level, Ban Quản trị.</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Khung tương tác sạch sẽ (Không có viền màu xanh dày cộm ở bên trái) -->
            <div class="suitability-clean-box">
                <div>
                    <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--dark-heading); margin-bottom: 4px;">
                        Bạn có phù hợp với chương trình MBA ISTEC?
                    </h3>
                    <p style="color: var(--dark-muted); font-size: 0.92rem; margin: 0;">
                        Nhận đánh giá hồ sơ và tư vấn định hướng phát triển từ Hội đồng chuyên môn.
                    </p>
                </div>
                <a href="#dang-ky-ngay" class="btn-istec-green" style="padding: 10px 20px; font-size: 0.9rem;">
                    <span>Kiểm tra độ phù hợp</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ══ 5. TỔNG QUAN CHƯƠNG TRÌNH (4 Thẻ Đồng Nhất, Không Lỏm Chỏm) ══ -->
    <section class="istec-section" id="tong-quan">
        <div class="container">
            <div class="istec-sec-head text-center" style="max-width: 820px; margin-left: auto; margin-right: auto;">
                <span class="istec-eyebrow">TỔNG QUAN CHƯƠNG TRÌNH</span>
                <h2 class="istec-title">XÂY DỰNG TƯ DUY CỦA MỘT NHÀ QUẢN TRỊ TOÀN DIỆN</h2>
                <p class="istec-desc" style="margin: 0 auto;">
                    MBA tại ISTEC Business School Paris được thiết kế để giúp người học kết nối những chức năng quan trọng của doanh nghiệp trong một góc nhìn thống nhất. Người học không chỉ tiếp cận từng lĩnh vực riêng lẻ, mà học cách kết nối chúng để giải quyết những bài toán quản trị thực tế.
                </p>
            </div>

            <!-- 4 Khối đồng nhất, thanh lịch -->
            <div class="overview-4-grid">
                <div class="overview-box">
                    <div class="overview-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                    </div>
                    <div class="overview-sub">Hình thức đào tạo</div>
                    <div class="overview-value">100% Trực tuyến</div>
                    <p class="overview-desc">Linh hoạt phát triển năng lực song song cùng công việc và cuộc sống hàng ngày.</p>
                </div>

                <div class="overview-box">
                    <div class="overview-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <div class="overview-sub">Thời gian học tập</div>
                    <div class="overview-value">12 Tháng</div>
                    <p class="overview-desc">Lộ trình tập trung và tối ưu tuyệt đối cho người đi làm và nhà quản lý bận rộn.</p>
                </div>

                <div class="overview-box">
                    <div class="overview-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                    </div>
                    <div class="overview-sub">Cấu trúc đào tạo</div>
                    <div class="overview-value">15 Môn + Luận Văn</div>
                    <p class="overview-desc">60 tín chỉ ECTS Châu Âu, trang bị nền tảng quản trị kinh doanh đa lĩnh vực toàn diện.</p>
                </div>

                <div class="overview-box">
                    <div class="overview-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <div class="overview-sub">Giá trị văn bằng</div>
                    <div class="overview-value">RNCP Level 7</div>
                    <p class="overview-desc">Trình độ Bac+5 trong hệ thống chứng nhận nghề nghiệp quốc gia Cộng hòa Pháp.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 6. 5 GIÁ TRỊ CỐT LÕI ══ -->
    <section class="istec-section istec-section-bg">
        <div class="container">
            <div class="istec-sec-head text-center" style="max-width: 800px; margin-left: auto; margin-right: auto;">
                <span class="istec-eyebrow">TRIẾT LÝ ĐÀO TẠO</span>
                <h2 class="istec-title">TỪ CHUYÊN MÔN ĐẾN NĂNG LỰC QUẢN TRỊ TOÀN DIỆN</h2>
                <p class="istec-desc" style="margin: 0 auto;">
                    MBA ISTEC không được xây dựng chỉ để bổ sung thêm kiến thức. Chương trình hướng đến việc thay đổi tư duy và năng lực hành động với <strong>5 GIÁ TRỊ CỐT LÕI</strong>:
                </p>
            </div>

            <div class="values-5-grid">
                <div class="value-mini-card">
                    <div class="value-mini-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
                    </div>
                    <h3 class="value-mini-title">Quản Trị Toàn Diện</h3>
                    <p class="value-mini-desc">Kết nối các chức năng cốt lõi của doanh nghiệp trong một góc nhìn thống nhất.</p>
                </div>

                <div class="value-mini-card">
                    <div class="value-mini-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><path d="m4.93 4.93 4.24 4.24"/><path d="m14.83 9.17 4.24-4.24"/><path d="m14.83 14.83 4.24 4.24"/><path d="m9.17 14.83-4.24 4.24"/></svg>
                    </div>
                    <h3 class="value-mini-title">Dẫn Dắt & Đổi Mới</h3>
                    <p class="value-mini-desc">Phát triển từ năng lực chuyên môn đến tư duy lãnh đạo và tạo ảnh hưởng.</p>
                </div>

                <div class="value-mini-card">
                    <div class="value-mini-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </div>
                    <h3 class="value-mini-title">Chuyển Đổi Cùng AI</h3>
                    <p class="value-mini-desc">Tiếp cận AI và công nghệ trong tư duy chiến lược và hoạt động kinh doanh.</p>
                </div>

                <div class="value-mini-card">
                    <div class="value-mini-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1 4-10z"/></svg>
                    </div>
                    <h3 class="value-mini-title">Tầm Nhìn Toàn Cầu</h3>
                    <p class="value-mini-desc">Phát triển năng lực làm việc và quản trị trong môi trường quốc tế, đa văn hóa.</p>
                </div>

                <div class="value-mini-card">
                    <div class="value-mini-icon">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="20 6 9 17 4 12"/></svg>
                    </div>
                    <h3 class="value-mini-title">Ứng Dụng Thực Tiễn</h3>
                    <p class="value-mini-desc">Giải quyết vấn đề, phân tích tình huống và tạo giá trị từ bài toán thực tế.</p>
                </div>
            </div>

            <div class="text-center">
                <p style="font-size: 1.05rem; color: var(--dark-heading); font-weight: 600; margin-bottom: 20px;">
                    Phát triển năng lực quản trị toàn diện, mở rộng bước tiến sự nghiệp và sẵn sàng thích ứng với những thay đổi của môi trường kinh doanh hiện đại.
                </p>
                <a href="#dang-ky-ngay" class="btn-istec-green">
                    <span>Đăng ký xét tuyển ngay</span>
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ══ 7. HERITAGE & SLIDE GIẢNG VIÊN ══ -->
    <section class="istec-section" id="giang-vien">
        <div class="container">
            <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 40px; flex-wrap: wrap; gap: 16px;">
                <div>
                    <span class="istec-eyebrow">ĐỘI NGŨ GIẢNG VIÊN CHÂU ÂU</span>
                    <h2 class="istec-title" style="margin-bottom: 6px;">Học hỏi từ các chuyên gia & giáo sư hàng đầu</h2>
                    <p class="istec-desc">
                        Đội ngũ giảng viên giàu kinh nghiệm đến từ châu Âu, kết hợp từ kiến thức học thuật hàn lâm với thực tiễn quản trị doanh nghiệp.
                    </p>
                </div>
                <div style="display: flex; gap: 10px;">
                    <button class="timeline-nav-btn" id="facPrevBtn" aria-label="Giảng viên trước" style="padding: 10px 14px;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 18l-6-6 6-6"/></svg>
                    </button>
                    <button class="timeline-nav-btn" id="facNextBtn" aria-label="Giảng viên tiếp theo" style="padding: 10px 14px;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M9 18l6-6-6-6"/></svg>
                    </button>
                </div>
            </div>

            <div class="faculty-track-wrap">
                <div class="faculty-track" id="facTrack">
                    <!-- Faculty 1 -->
                    <div class="faculty-item-card">
                        <img src="https://istec.fr/wp-content/uploads/2025/02/Adel_aloui.png" alt="Prof. Adel ALOUI" class="faculty-photo" loading="lazy" />
                        <div class="faculty-meta">
                            <h3 class="faculty-name-txt">Prof. Adel ALOUI</h3>
                            <div class="faculty-role-txt">Professeur-chercheur en Management</div>
                            <p class="faculty-desc-txt">Chuyên gia Quản trị Chiến lược và Chuỗi cung ứng (Supply Chain) tại ISTEC Paris.</p>
                        </div>
                    </div>
                    <!-- Faculty 2 -->
                    <div class="faculty-item-card">
                        <img src="https://istec.fr/wp-content/uploads/2025/07/JK260212_0547_LD-scaled-e1771806022893.jpg" alt="Prof. Jérôme BÊCHE" class="faculty-photo" loading="lazy" />
                        <div class="faculty-meta">
                            <h3 class="faculty-name-txt">Prof. Jérôme BÊCHE</h3>
                            <div class="faculty-role-txt">Docteur en Sciences de Gestion</div>
                            <p class="faculty-desc-txt">Tiến sĩ Khoa học Quản lý, Giảng viên - Nhà nghiên cứu cao cấp tại ISTEC Paris.</p>
                        </div>
                    </div>
                    <!-- Faculty 3 -->
                    <div class="faculty-item-card">
                        <img src="https://istec.fr/wp-content/uploads/2025/07/Christophe_bezes-2.png" alt="Prof. Christophe BEZES" class="faculty-photo" loading="lazy" />
                        <div class="faculty-meta">
                            <h3 class="faculty-name-txt">Prof. Christophe BEZES</h3>
                            <div class="faculty-role-txt">Professeur Chercheur H.D.R</div>
                            <p class="faculty-desc-txt">Tiến sĩ Khoa học Quản lý H.D.R, Chuyên gia đầu ngành Marketing và Chiến lược Thương hiệu.</p>
                        </div>
                    </div>
                    <!-- Faculty 4 -->
                    <div class="faculty-item-card">
                        <img src="https://istec.fr/wp-content/uploads/2025/07/JK260212_0641_LD-scaled-e1771802103644.jpg" alt="Prof. Sophie CANEVET" class="faculty-photo" loading="lazy" />
                        <div class="faculty-meta">
                            <h3 class="faculty-name-txt">Prof. Sophie CANEVET</h3>
                            <div class="faculty-role-txt">PhD London School of Economics (LSE)</div>
                            <p class="faculty-desc-txt">Giáo sư - Nhà nghiên cứu, Tiến sĩ từ Đại học Kinh tế Luân Đôn (LSE).</p>
                        </div>
                    </div>
                    <!-- Faculty 5 -->
                    <div class="faculty-item-card">
                        <img src="https://istec.fr/wp-content/uploads/2025/07/JK260212_0630_LD-scaled-e1771801981334.jpg" alt="Prof. Rey DANG" class="faculty-photo" loading="lazy" />
                        <div class="faculty-meta">
                            <h3 class="faculty-name-txt">Prof. Rey DANG</h3>
                            <div class="faculty-role-txt">Directeur de la Recherche</div>
                            <p class="faculty-desc-txt">Giám đốc Viện Nghiên cứu CERI ISTEC Paris, Tiến sĩ Khoa học Quản trị Doanh nghiệp.</p>
                        </div>
                    </div>
                    <!-- Faculty 6 -->
                    <div class="faculty-item-card">
                        <img src="https://istec.fr/wp-content/uploads/2025/07/ADO_web-1.jpg" alt="Prof. Istifanous ADO" class="faculty-photo" loading="lazy" />
                        <div class="faculty-meta">
                            <h3 class="faculty-name-txt">Prof. Istifanous ADO</h3>
                            <div class="faculty-role-txt">Entrepreneuriat & Innovation</div>
                            <p class="faculty-desc-txt">Trưởng bộ môn Khởi nghiệp & Đổi mới sáng tạo, Cố vấn ươm tạo doanh nghiệp khởi nghiệp.</p>
                        </div>
                    </div>
                    <!-- Faculty 7 -->
                    <div class="faculty-item-card">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/vientruong_avt-optimized.webp" alt="TS. Phạm Quang Vinh" class="faculty-photo" loading="lazy" />
                        <div class="faculty-meta">
                            <h3 class="faculty-name-txt">TS. Phạm Quang Vinh</h3>
                            <div class="faculty-role-txt">Viện trưởng Viện IDEAS</div>
                            <p class="faculty-desc-txt">Tiến sĩ Quản trị Kinh doanh (Hoa Kỳ), hơn 25 năm kinh nghiệm quản trị và đối ngoại quốc tế.</p>
                        </div>
                    </div>
                    <!-- Faculty 8 -->
                    <div class="faculty-item-card">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2024/04/Thay-thinh-optimized.webp" alt="TS. Dương Văn Thịnh" class="faculty-photo" loading="lazy" />
                        <div class="faculty-meta">
                            <h3 class="faculty-name-txt">TS. Dương Văn Thịnh</h3>
                            <div class="faculty-role-txt">Phó Chủ tịch AI, VERON Group</div>
                            <p class="faculty-desc-txt">Tiến sĩ QTKD (Pháp), Chuyên gia cấp cao về Trí tuệ nhân tạo (AI) và Chuyển đổi số doanh nghiệp.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 8. KHUNG CHƯƠNG TRÌNH (Timeline & Dropdown) ══ -->
    <section class="istec-section istec-section-bg" id="chuong-trinh">
        <div class="container">
            <div class="istec-sec-head text-center" style="max-width: 820px; margin-left: auto; margin-right: auto;">
                <span class="istec-eyebrow">KHUNG ĐÀO TẠO CHI TIẾT</span>
                <h2 class="istec-title">NỘI DUNG CHƯƠNG TRÌNH MBA ISTEC</h2>
                <div class="istec-desc" style="margin: 0 auto;">
                    <strong>15 Môn + Luận Văn (60 ECTS) | XÂY DỰNG NỀN TẢNG QUẢN TRỊ TOÀN DIỆN</strong><br/>
                    Chương trình được thiết kế trong 3 học kỳ (mỗi kỳ 3 tháng); sau 15 học phần, học viên thực hiện luận văn trong 2 tháng. Mỗi giai đoạn tập trung vào những nhóm năng lực khác nhau.
                </div>
            </div>

            <!-- 4 Phương pháp học tập -->
            <div style="display: flex; justify-content: center; gap: 12px; margin-bottom: 32px; flex-wrap: wrap;">
                <div class="istec-quick-stats" style="margin-bottom: 0; background: #ffffff;">
                    <span><strong>CASE STUDY:</strong> Tình huống thực tế</span>
                    <span class="stat-dot">•</span>
                    <span><strong>PROJECT:</strong> Ứng dụng giải quyết bài toán</span>
                    <span class="stat-dot">•</span>
                    <span><strong>DISCUSSION:</strong> Trao đổi cùng chuyên gia</span>
                    <span class="stat-dot">•</span>
                    <span><strong>APPLIED LEARNING:</strong> Gắn kết doanh nghiệp</span>
                </div>
            </div>

            <!-- Timeline Navigation Buttons -->
            <div class="timeline-buttons-row">
                <button class="timeline-nav-btn active" data-acc="term1">Học Kỳ I (3 Tháng)</button>
                <button class="timeline-nav-btn" data-acc="term2">Học Kỳ II (3 Tháng)</button>
                <button class="timeline-nav-btn" data-acc="term3">Học Kỳ III (3 Tháng)</button>
                <button class="timeline-nav-btn" data-acc="term4">Luận Văn Tốt Nghiệp (2 Tháng)</button>
            </div>

            <!-- Accordion List -->
            <div class="syllabus-acc-container">
                <!-- Term 1 -->
                <div class="acc-block active" id="term1">
                    <button class="acc-trigger" type="button">
                        <span class="acc-trigger-title">I. Xây dựng nền tảng quản trị (Học kỳ I)</span>
                        <div class="acc-toggle-icon">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                        </div>
                    </button>
                    <div class="acc-panel" style="max-height: 600px;">
                        <div class="acc-panel-inner">
                            <div class="course-item-row">
                                <span style="color: var(--istec-green); font-weight: 800; width: 32px;">01</span>
                                <span style="font-weight: 700; color: var(--dark-heading); flex: 1;">Strategic Management (Quản Trị Chiến Lược)</span>
                                <span style="font-size: 0.8rem; color: var(--dark-muted);">Core</span>
                            </div>
                            <div class="course-item-row">
                                <span style="color: var(--istec-green); font-weight: 800; width: 32px;">02</span>
                                <span style="font-weight: 700; color: var(--dark-heading); flex: 1;">Leadership & Organizational Behavior (Lãnh Đạo & Hành Vi Tổ Chức)</span>
                                <span style="font-size: 0.8rem; color: var(--dark-muted);">Leadership</span>
                            </div>
                            <div class="course-item-row">
                                <span style="color: var(--istec-green); font-weight: 800; width: 32px;">03</span>
                                <span style="font-weight: 700; color: var(--dark-heading); flex: 1;">Financial Management for Executives (Quản Trị Tài Chính Doanh Nghiệp)</span>
                                <span style="font-size: 0.8rem; color: var(--dark-muted);">Finance</span>
                            </div>
                            <div class="course-item-row">
                                <span style="color: var(--istec-green); font-weight: 800; width: 32px;">04</span>
                                <span style="font-weight: 700; color: var(--dark-heading); flex: 1;">Business Ethics & Sustainable Development (Đạo Đức Kinh Doanh & Phát Triển Bền Vững)</span>
                                <span style="font-size: 0.8rem; color: var(--dark-muted);">Ethics</span>
                            </div>
                            <div class="course-item-row">
                                <span style="color: var(--istec-green); font-weight: 800; width: 32px;">05</span>
                                <span style="font-weight: 700; color: var(--dark-heading); flex: 1;">Marketing Strategy & Brand Management (Chiến Lược Marketing & Thương Hiệu)</span>
                                <span style="font-size: 0.8rem; color: var(--dark-muted);">Marketing</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Term 2 -->
                <div class="acc-block" id="term2">
                    <button class="acc-trigger" type="button">
                        <span class="acc-trigger-title">II. Kinh doanh & Phát triển toàn cầu (Học kỳ II)</span>
                        <div class="acc-toggle-icon">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                        </div>
                    </button>
                    <div class="acc-panel">
                        <div class="acc-panel-inner">
                            <div class="course-item-row">
                                <span style="color: var(--istec-green); font-weight: 800; width: 32px;">06</span>
                                <span style="font-weight: 700; color: var(--dark-heading); flex: 1;">Business Analytics & Decision Making (Phân Tích Dữ Liệu & Ra Quyết Định)</span>
                                <span style="font-size: 0.8rem; color: var(--dark-muted);">Analytics</span>
                            </div>
                            <div class="course-item-row">
                                <span style="color: var(--istec-green); font-weight: 800; width: 32px;">07</span>
                                <span style="font-weight: 700; color: var(--dark-heading); flex: 1;">International Business Management (Quản Trị Kinh Doanh Quốc Tế)</span>
                                <span style="font-size: 0.8rem; color: var(--dark-muted);">Global</span>
                            </div>
                            <div class="course-item-row">
                                <span style="color: var(--istec-green); font-weight: 800; width: 32px;">08</span>
                                <span style="font-weight: 700; color: var(--dark-heading); flex: 1;">Cross-Cultural Management (Quản Trị Đa Văn Hóa)</span>
                                <span style="font-size: 0.8rem; color: var(--dark-muted);">Culture</span>
                            </div>
                            <div class="course-item-row">
                                <span style="color: var(--istec-green); font-weight: 800; width: 32px;">09</span>
                                <span style="font-weight: 700; color: var(--dark-heading); flex: 1;">International Negotiation & Business Development (Đàm Phán Quốc Tế)</span>
                                <span style="font-size: 0.8rem; color: var(--dark-muted);">Negotiation</span>
                            </div>
                            <div class="course-item-row">
                                <span style="color: var(--istec-green); font-weight: 800; width: 32px;">10</span>
                                <span style="font-weight: 700; color: var(--dark-heading); flex: 1;">Entrepreneurship & Innovation Management (Khởi Nghiệp & Đổi Mới Sáng Tạo)</span>
                                <span style="font-size: 0.8rem; color: var(--dark-muted);">Innovation</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Term 3 -->
                <div class="acc-block" id="term3">
                    <button class="acc-trigger" type="button">
                        <span class="acc-trigger-title">III. Đổi mới & Chuyển đổi doanh nghiệp (Học kỳ III)</span>
                        <div class="acc-toggle-icon">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                        </div>
                    </button>
                    <div class="acc-panel">
                        <div class="acc-panel-inner">
                            <div class="course-item-row">
                                <span style="color: var(--istec-green); font-weight: 800; width: 32px;">11</span>
                                <span style="font-weight: 700; color: var(--dark-heading); flex: 1;">Digital Transformation & AI Strategy (Chuyển Đổi Số & Chiến Lược AI)</span>
                                <span style="font-size: 0.8rem; font-weight: 700; color: var(--istec-green);">AI Strategy</span>
                            </div>
                            <div class="course-item-row">
                                <span style="color: var(--istec-green); font-weight: 800; width: 32px;">12</span>
                                <span style="font-weight: 700; color: var(--dark-heading); flex: 1;">Operations & Supply Chain Management (Quản Trị Vận Hành & Chuỗi Cung Ứng)</span>
                                <span style="font-size: 0.8rem; color: var(--dark-muted);">Operations</span>
                            </div>
                            <div class="course-item-row">
                                <span style="color: var(--istec-green); font-weight: 800; width: 32px;">13</span>
                                <span style="font-weight: 700; color: var(--dark-heading); flex: 1;">Consulting Project Management (Quản Trị Dự Án Tư Vấn)</span>
                                <span style="font-size: 0.8rem; color: var(--dark-muted);">Consulting</span>
                            </div>
                            <div class="course-item-row">
                                <span style="color: var(--istec-green); font-weight: 800; width: 32px;">14</span>
                                <span style="font-weight: 700; color: var(--dark-heading); flex: 1;">Luxury & Premium Brand Management (Quản Trị Thương Hiệu Cao Cấp)</span>
                                <span style="font-size: 0.8rem; color: var(--dark-muted);">Brand</span>
                            </div>
                            <div class="course-item-row">
                                <span style="color: var(--istec-green); font-weight: 800; width: 32px;">15</span>
                                <span style="font-weight: 700; color: var(--dark-heading); flex: 1;">Strategic Marketing in Emerging Markets (Marketing Thị Trường Mới Nổi)</span>
                                <span style="font-size: 0.8rem; color: var(--dark-muted);">Markets</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Term 4 -->
                <div class="acc-block" id="term4">
                    <button class="acc-trigger" type="button">
                        <span class="acc-trigger-title">IV. Ứng dụng & Giải quyết bài toán thực tiễn (Luận văn)</span>
                        <div class="acc-toggle-icon">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                        </div>
                    </button>
                    <div class="acc-panel">
                        <div class="acc-panel-inner">
                            <div class="course-item-row">
                                <span style="color: var(--istec-green); font-weight: 800; width: 32px;">16</span>
                                <span style="font-weight: 700; color: var(--dark-heading); flex: 1;">MBA Thesis / Applied Business Project (Luận Văn / Dự Án Quản Trị Thực Tiễn)</span>
                                <span style="font-size: 0.8rem; font-weight: 700; color: #b91c1c;">Capstone</span>
                            </div>
                            <p style="font-size: 0.9rem; color: var(--dark-muted); margin-top: 12px; line-height: 1.55;">
                                Học viên trực tiếp bảo vệ luận văn hoặc dự án kinh doanh ứng dụng trước Hội đồng Giáo sư ISTEC Paris.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 9. VĂN BẰNG & SLIDE KIỂM ĐỊNH BỰ LÊN ══ -->
    <section class="istec-section" id="kiem-dinh">
        <div class="container">
            <div class="istec-sec-head text-center" style="max-width: 820px; margin-left: auto; margin-right: auto;">
                <span class="istec-eyebrow">KIỂM ĐỊNH & CÔNG NHẬN TOÀN CẦU</span>
                <h2 class="istec-title">Văn bằng giá trị quốc tế được công nhận toàn cầu</h2>
                <p class="istec-desc" style="margin: 0 auto;">
                    Sau khi hoàn thành chương trình, học viên sở hữu nền tảng kiến thức quản trị theo tiêu chuẩn quốc tế và trở thành một phần của cộng đồng học thuật, doanh nghiệp toàn cầu của ISTEC.
                </p>
            </div>

            <!-- Slide logo kiểm định BỰ LÊN (Marquee vô tận) -->
            <div class="marquee-box-clean">
                <div class="marquee-title">HỆ THỐNG KIỂM ĐỊNH & CÔNG NHẬN CHẤT LƯỢNG GIÁO DỤC PHÁP & QUỐC TẾ</div>
                <div class="marquee-wrapper">
                    <div class="marquee-moving-track">
                        <img src="https://istec.fr/wp-content/uploads/2025/02/logo-france-competences.30a014-1.png" alt="France Compétences RNCP" class="logo-acc-img" />
                        <img src="https://istec.fr/wp-content/uploads/2026/02/CEFDG-1.webp" alt="CEFDG France" class="logo-acc-img" />
                        <img src="https://istec.fr/wp-content/uploads/2025/07/CGE.webp" alt="Conférence des Grandes Écoles (CGE)" class="logo-acc-img" />
                        <img src="https://istec.fr/wp-content/uploads/2025/07/AACSB.webp" alt="AACSB Member" class="logo-acc-img" />
                        <img src="https://istec.fr/wp-content/uploads/2026/01/EFMD-Logo-2-300x122-1.png" alt="EFMD Global Member" class="logo-acc-img" />
                        <img src="https://istec.fr/wp-content/uploads/2026/02/campus-france-logo.png" alt="Campus France" class="logo-acc-img" />
                        <img src="https://istec.fr/wp-content/uploads/2026/02/qualiopi-logo-png.png" alt="Qualiopi France" class="logo-acc-img" />
                        <!-- Lặp lại để cuộn vô tận mượt mà -->
                        <img src="https://istec.fr/wp-content/uploads/2025/02/logo-france-competences.30a014-1.png" alt="France Compétences RNCP" class="logo-acc-img" />
                        <img src="https://istec.fr/wp-content/uploads/2026/02/CEFDG-1.webp" alt="CEFDG France" class="logo-acc-img" />
                        <img src="https://istec.fr/wp-content/uploads/2025/07/CGE.webp" alt="Conférence des Grandes Écoles (CGE)" class="logo-acc-img" />
                        <img src="https://istec.fr/wp-content/uploads/2025/07/AACSB.webp" alt="AACSB Member" class="logo-acc-img" />
                        <img src="https://istec.fr/wp-content/uploads/2026/01/EFMD-Logo-2-300x122-1.png" alt="EFMD Global Member" class="logo-acc-img" />
                        <img src="https://istec.fr/wp-content/uploads/2026/02/campus-france-logo.png" alt="Campus France" class="logo-acc-img" />
                        <img src="https://istec.fr/wp-content/uploads/2026/02/qualiopi-logo-png.png" alt="Qualiopi France" class="logo-acc-img" />
                    </div>
                </div>
            </div>

            <!-- 5 Thẻ kiểm định chi tiết -->
            <div class="acc-5-grid">
                <div class="acc-clean-card">
                    <div class="acc-card-head">Visa Bac+5</div>
                    <p class="acc-card-txt">Sự công nhận của Bộ Giáo dục Đại học và Nghiên cứu Pháp đối với chương trình đào tạo đạt tiêu chuẩn học thuật.</p>
                </div>
                <div class="acc-clean-card">
                    <div class="acc-card-head">RNCP Level 7</div>
                    <p class="acc-card-txt">Chương trình MBA được đăng ký chính thức vào Khung Chứng nhận Nghề nghiệp Quốc gia Pháp trình độ Bac+5.</p>
                </div>
                <div class="acc-clean-card">
                    <div class="acc-card-head">Grandes Écoles (CGE)</div>
                    <p class="acc-card-txt">ISTEC là thành viên chính thức của Conférence des Grandes Écoles – hiệp hội các trường tinh hoa của Pháp.</p>
                </div>
                <div class="acc-clean-card">
                    <div class="acc-card-head">AACSB Member</div>
                    <p class="acc-card-txt">ISTEC là thành viên AACSB (Hiệp hội phát triển giảng dạy kinh doanh Hoa Kỳ) và tham gia quá trình kiểm định.</p>
                </div>
                <div class="acc-clean-card">
                    <div class="acc-card-head">EFMD Global</div>
                    <p class="acc-card-txt">ISTEC là thành viên EFMD Global từ năm 2023, khẳng định chuẩn mực học thuật quốc tế.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 10. THÔNG TIN TUYỂN SINH (Quy trình 4 bước) ══ -->
    <section class="istec-section istec-section-bg" id="tuyen-sinh">
        <div class="container">
            <div class="istec-sec-head text-center" style="max-width: 800px; margin-left: auto; margin-right: auto;">
                <span class="istec-eyebrow">QUY TRÌNH XÉT TUYỂN</span>
                <h2 class="istec-title">Điều kiện & quy trình 4 bước đơn giản</h2>
                <p class="istec-desc" style="margin: 0 auto;">Quy trình xét tuyển minh bạch, tạo điều kiện thuận lợi nhất để học viên tiếp cận giáo dục chuẩn Pháp.</p>
            </div>

            <!-- Điều kiện tuyển sinh -->
            <div class="istec-card" style="margin-bottom: 32px; padding: 28px 32px;">
                <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--dark-heading); margin-bottom: 14px;">Điều kiện đầu vào:</h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div style="display: flex; gap: 10px; align-items: flex-start; font-size: 0.95rem; color: var(--dark-body);">
                        <svg class="bullet-tick" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        <span>Bằng Cử nhân và bảng điểm Đại học các chuyên ngành.</span>
                    </div>
                    <div style="display: flex; gap: 10px; align-items: flex-start; font-size: 0.95rem; color: var(--dark-body);">
                        <svg class="bullet-tick" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        <span>Tiếng Anh tương đương IELTS 6.0 (hoặc phỏng vấn đánh giá năng lực với đại diện của trường).</span>
                    </div>
                </div>
            </div>

            <!-- 4 Bước -->
            <div class="overview-4-grid">
                <div class="istec-card">
                    <div class="challenge-num-tag" style="width: auto; padding: 0 10px; font-size: 0.85rem;">Bước 01</div>
                    <h3 class="challenge-card-title">Nộp hồ sơ xét tuyển</h3>
                    <p class="challenge-card-desc">Gửi bản sao bằng tốt nghiệp và bảng điểm Đại học để Hội đồng tuyển sinh thẩm định.</p>
                </div>
                <div class="istec-card">
                    <div class="challenge-num-tag" style="width: auto; padding: 0 10px; font-size: 0.85rem;">Bước 02</div>
                    <h3 class="challenge-card-title">Thẩm định & Phỏng vấn</h3>
                    <p class="challenge-card-desc">Hội đồng tuyển sinh xem xét học thuật và phỏng vấn đánh giá mục tiêu phát triển.</p>
                </div>
                <div class="istec-card">
                    <div class="challenge-num-tag" style="width: auto; padding: 0 10px; font-size: 0.85rem;">Bước 03</div>
                    <h3 class="challenge-card-title">Thư trúng tuyển</h3>
                    <p class="challenge-card-desc">Nhận Offer Letter chính thức từ ISTEC Paris và hướng dẫn hoàn tất thủ tục nhập học.</p>
                </div>
                <div class="istec-card">
                    <div class="challenge-num-tag" style="width: auto; padding: 0 10px; font-size: 0.85rem;">Bước 04</div>
                    <h3 class="challenge-card-title">Bắt đầu khóa học</h3>
                    <p class="challenge-card-desc">Kích hoạt tài khoản IDEAS LMS & AI Platform, tham gia định hướng và bắt đầu học tập.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 11. HỌC PHÍ VÀ LỘ TRÌNH TÀI CHÍNH ══ -->
    <section class="istec-section" id="hoc-phi">
        <div class="container">
            <div class="istec-sec-head text-center" style="max-width: 800px; margin-left: auto; margin-right: auto;">
                <span class="istec-eyebrow">CHÍNH SÁCH HỌC PHÍ</span>
                <h2 class="istec-title">Học phí và lộ trình tài chính</h2>
                <p class="istec-desc" style="margin: 0 auto;">Đầu tư cho sự nghiệp quản trị tương lai của bạn.</p>
            </div>

            <div class="tuition-box-clean">
                <div class="tuition-top-banner">
                    <span style="font-size: 0.82rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: #94a3b8;">Học phí trọn khóa MBA</span>
                    <div class="tuition-main-price">6.500 EUR</div>
                    <p style="color: #cbd5e1; font-size: 0.92rem; margin: 0;">Chính sách thanh toán linh hoạt theo học kỳ hoặc trả góp 0%</p>
                </div>

                <div class="tuition-body-clean">
                    <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--dark-heading); margin-bottom: 16px;">Học phí đã bao gồm trọn gói:</h3>
                    <ul class="pillar-bullet-list" style="margin-bottom: 24px;">
                        <li>
                            <svg class="bullet-tick" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span>Học phí toàn khoá MBA và phí hỗ trợ dịch vụ đào tạo chuyên sâu từ Viện IDEAS trong suốt quá trình học.</span>
                        </li>
                        <li>
                            <svg class="bullet-tick" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span>Toàn quyền sử dụng hệ thống học tập IDEAS LMS & Nền tảng trợ lý học thuật IDEAS AI Platform.</span>
                        </li>
                        <li>
                            <svg class="bullet-tick" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span>Thư viện Cengage MindTap với hơn 1.000 đầu sách học thuật quốc tế bản quyền.</span>
                        </li>
                    </ul>

                    <div style="background: var(--istec-green-soft); border: 1px solid var(--border-clean); border-radius: 10px; padding: 18px 20px; font-size: 0.94rem; color: var(--dark-heading); margin-bottom: 24px;">
                        <strong>Hỗ trợ trả góp 0% lãi suất:</strong> Hỗ trợ trả góp linh hoạt qua thẻ tín dụng Sacombank từ 12 - 24 tháng, giúp tối ưu hóa ngân sách và giảm nhẹ áp lực tài chính cho học viên.
                    </div>

                    <div class="text-center">
                        <a href="#dang-ky-ngay" class="btn-istec-green">
                            <span>Nhận tư vấn học phí chi tiết</span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 12. LỄ TỐT NGHIỆP ISTEC TẠI PARIS ══ -->
    <section class="istec-section istec-section-bg">
        <div class="container">
            <div class="istec-sec-head text-center" style="max-width: 800px; margin-left: auto; margin-right: auto;">
                <span class="istec-eyebrow">KHOẢNH KHẮC VINH DANH</span>
                <h2 class="istec-title">Lễ Tốt Nghiệp ISTEC Trang Trọng Tại Paris</h2>
                <p class="istec-desc" style="margin: 0 auto;">
                    Học viên hoàn thành chương trình có quyền lựa chọn sang Paris tham dự Lễ tốt nghiệp chính thức được tổ chức tại các khán phòng nghệ thuật biểu tượng như Grand Rex và Folies Bergère.
                </p>
            </div>

            <div style="display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 24px; align-items: center; max-width: 960px; margin: 0 auto;">
                <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 12px; border: 1px solid var(--border-clean); background: #000;">
                    <iframe src="https://www.youtube.com/embed/99pGEp4Dkko" title="Lễ tốt nghiệp ISTEC Business School Paris" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"></iframe>
                </div>
                <div style="display: flex; flex-direction: column; gap: 16px;">
                    <img src="https://istec.fr/wp-content/uploads/2025/05/Homepage_5-1-scaled.jpg" alt="Lễ trao bằng tốt nghiệp ISTEC Paris" style="border-radius: 10px; width: 100%; height: 160px; object-fit: cover; border: 1px solid var(--border-clean);" loading="lazy" />
                    <img src="https://istec.fr/wp-content/uploads/2025/10/istec_bs25.jpg" alt="Sinh viên quốc tế ISTEC Paris" style="border-radius: 10px; width: 100%; height: 160px; object-fit: cover; border: 1px solid var(--border-clean);" loading="lazy" />
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 13. FAQ (CÂU HỎI THƯỜNG GẶP) ══ -->
    <section class="istec-section" id="faq">
        <div class="container">
            <div class="istec-sec-head text-center" style="max-width: 800px; margin-left: auto; margin-right: auto;">
                <span class="istec-eyebrow">GIẢI ĐÁP THẮC MẮC</span>
                <h2 class="istec-title">Câu hỏi thường gặp</h2>
            </div>

            <div class="faq-clean-wrap">
                <!-- FAQ 1 -->
                <div class="faq-row">
                    <button class="faq-btn" type="button">
                        <span>MBA ISTEC phù hợp với ai?</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                    </button>
                    <div class="faq-body" style="max-height: 400px;">
                        <div class="faq-body-inner">
                            <p>MBA ISTEC phù hợp với những người đang muốn phát triển từ năng lực chuyên môn sang tư duy quản trị và lãnh đạo, bao gồm:</p>
                            <ul style="margin-top: 8px; margin-left: 20px;">
                                <li>Chuyên viên giàu kinh nghiệm đang hướng đến vai trò quản lý.</li>
                                <li>Quản lý cấp trung muốn phát triển tư duy chiến lược và năng lực quản trị toàn diện.</li>
                                <li>Trưởng nhóm hoặc trưởng bộ phận cần mở rộng góc nhìn về hoạt động tổng thể của doanh nghiệp.</li>
                                <li>Người đang chuẩn bị cho bước tiến tiếp theo trong sự nghiệp và muốn bổ sung nền tảng quản trị quốc tế.</li>
                                <li>Doanh nhân hoặc người đang vận hành doanh nghiệp muốn hệ thống hóa tư duy quản trị.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="faq-row">
                    <button class="faq-btn" type="button">
                        <span>MBA ISTEC học trong bao lâu?</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                    </button>
                    <div class="faq-body">
                        <div class="faq-body-inner">
                            Chương trình kéo dài 12 tháng, gồm 3 học kỳ (mỗi kỳ 3 tháng) và giai đoạn thực hiện luận văn/dự án cuối khóa trong 2 tháng.
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="faq-row">
                    <button class="faq-btn" type="button">
                        <span>Tôi không có bằng cấp chuyên ngành kinh doanh có theo học được không?</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                    </button>
                    <div class="faq-body">
                        <div class="faq-body-inner">
                            MBA ISTEC phù hợp với người đã tốt nghiệp Đại học và mong muốn phát triển năng lực quản trị. Điều kiện cụ thể sẽ được tư vấn dựa trên hồ sơ tuyển sinh.
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="faq-row">
                    <button class="faq-btn" type="button">
                        <span>MBA ISTEC có nội dung về AI không?</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                    </button>
                    <div class="faq-body">
                        <div class="faq-body-inner">
                            Có. Học viên được tiếp cận nội dung <strong>Digital Transformation & AI Strategy</strong>, giúp hiểu vai trò của công nghệ và AI trong chiến lược cũng như hoạt động của doanh nghiệp.
                        </div>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="faq-row">
                    <button class="faq-btn" type="button">
                        <span>Học phí chương trình MBA ISTEC là bao nhiêu?</span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>
                    </button>
                    <div class="faq-body">
                        <div class="faq-body-inner">
                            Chương trình có mức phí 6.500 EUR cùng nhiều chính sách đóng học phí linh hoạt và hỗ trợ trả góp qua thẻ tín dụng Sacombank từ 12 - 24 tháng. Vui lòng liên hệ hotline 028 2244 2244 để nhận lộ trình chi phí chi tiết.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ 14. FORM ĐĂNG KÝ XÉT TUYỂN ══ -->
    <section class="istec-section istec-section-bg" id="dang-ky-ngay">
        <div class="container">
            <div class="lead-form-clean">
                <div class="text-center">
                    <span class="istec-eyebrow">ĐĂNG KÝ XÉT TUYỂN</span>
                    <h2 class="istec-title" style="margin-bottom: 8px;">Nhận tư vấn & đánh giá hồ sơ MBA</h2>
                    <p style="color: var(--dark-muted); font-size: 0.95rem; margin: 0;">Điền thông tin để Ban tuyển sinh liên hệ hỗ trợ bạn chu đáo nhất.</p>
                </div>

                <form id="istecLeadFormPhp" onsubmit="handleFormSubmitPhp(event)">
                    <div class="form-grid-2">
                        <div>
                            <label class="form-lbl" for="inpName">Họ và tên *</label>
                            <input type="text" id="inpName" name="fullname" class="form-inp" placeholder="Nguyễn Văn A" required />
                        </div>
                        <div>
                            <label class="form-lbl" for="inpPhone">Số điện thoại *</label>
                            <input type="tel" id="inpPhone" name="phone" class="form-inp" placeholder="0901 234 567" required />
                        </div>
                        <div class="form-span-2">
                            <label class="form-lbl" for="inpEmail">Địa chỉ Email *</label>
                            <input type="email" id="inpEmail" name="email" class="form-inp" placeholder="email@domain.com" required />
                        </div>
                        <div>
                            <label class="form-lbl" for="inpEdu">Trình độ học vấn</label>
                            <select id="inpEdu" name="education" class="form-inp">
                                <option value="Đại học">Đã tốt nghiệp Đại học</option>
                                <option value="Cao đẳng">Đã tốt nghiệp Cao đẳng</option>
                                <option value="Thạc sĩ">Đã có bằng Thạc sĩ</option>
                            </select>
                        </div>
                        <div>
                            <label class="form-lbl" for="inpExp">Kinh nghiệm làm việc</label>
                            <select id="inpExp" name="experience" class="form-inp">
                                <option value="Dưới 3 năm">Dưới 3 năm</option>
                                <option value="3 - 5 năm" selected>Từ 3 - 5 năm</option>
                                <option value="Trên 5 năm">Trên 5 năm</option>
                            </select>
                        </div>
                        <div class="form-span-2">
                            <label class="form-lbl" for="inpNote">Nhu cầu tư vấn thêm</label>
                            <textarea id="inpNote" name="note" class="form-inp" rows="3" placeholder="Ghi chú thêm về thời gian tư vấn thuận tiện..."></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn-istec-green" style="width: 100%; justify-content: center; margin-top: 20px; padding: 14px;">
                        <span>GỬI ĐĂNG KÝ XÉT TUYỂN</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>

                    <div id="formSuccessPhp" style="display: none; padding: 14px; background: var(--istec-green-soft); color: var(--istec-green-dark); border-radius: 8px; font-weight: 700; text-align: center; margin-top: 16px;">
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
            const facTrack = document.getElementById('facTrack');
            const facPrev = document.getElementById('facPrevBtn');
            const facNext = document.getElementById('facNextBtn');

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
            const tBtns = document.querySelectorAll('.timeline-nav-btn');
            const accBlocks = document.querySelectorAll('.acc-block');

            tBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    tBtns.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');

                    const target = btn.getAttribute('data-acc');
                    accBlocks.forEach(blk => {
                        const panel = blk.querySelector('.acc-panel');
                        if (blk.id === target) {
                            blk.classList.add('active');
                            panel.style.maxHeight = panel.scrollHeight + 'px';
                        } else {
                            blk.classList.remove('active');
                            panel.style.maxHeight = '0px';
                        }
                    });
                });
            });

            document.querySelectorAll('.acc-trigger').forEach(trigger => {
                trigger.addEventListener('click', () => {
                    const block = trigger.parentElement;
                    const panel = block.querySelector('.acc-panel');
                    const isActive = block.classList.contains('active');

                    if (isActive) {
                        block.classList.remove('active');
                        panel.style.maxHeight = '0px';
                    } else {
                        block.classList.add('active');
                        panel.style.maxHeight = panel.scrollHeight + 'px';

                        const targetBtn = document.querySelector(`.timeline-nav-btn[data-acc="${block.id}"]`);
                        if (targetBtn) {
                            tBtns.forEach(b => b.classList.remove('active'));
                            targetBtn.classList.add('active');
                        }
                    }
                });
            });

            // 3. FAQ Accordion
            document.querySelectorAll('.faq-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const row = btn.parentElement;
                    const body = row.querySelector('.faq-body');
                    const isActive = row.classList.contains('active');

                    document.querySelectorAll('.faq-row').forEach(r => {
                        r.classList.remove('active');
                        r.querySelector('.faq-body').style.maxHeight = '0px';
                    });

                    if (!isActive) {
                        row.classList.add('active');
                        body.style.maxHeight = body.scrollHeight + 'px';
                    }
                });
            });
        });

        // 4. Form Submission
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
