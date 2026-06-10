<?php
/**
 * The template for displaying the MBA SEO landing page
 * Template Name: Premium MBA SEO Template
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
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: https://ogp.me/ns#">

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
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />

    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <!-- Link the main minified style.css -->
    <?php
    $css_path = get_stylesheet_directory() . '/common-assets/css/style.min.css';
    $css_version = file_exists($css_path) ? filemtime($css_path) : time();
    ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/style.min.css?v=<?php echo $css_version; ?>" />
    <link rel="preconnect" href="https://automation.ideas.edu.vn" />
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/webfonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin />
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/webfonts/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin />

    <!-- MailFlow Pro Tracker & AI Chat -->
    <script>
        window._mf_config = {
            property_id: "ce71ea2e-d841-4e0f-b3ad-332297cde330",
            ai_chat: true
        };
    </script>
    <script src="https://automation.ideas.edu.vn/tracker.js" defer></script>

    <!-- Event snippet for SUBMIT FORM conversion page -->
    <script>
        function gtag_report_conversion(url) {
            var callback = function () {
                if (typeof (url) != 'undefined') {
                    window.location = url;
                }
            };
            if (typeof gtag === 'function') {
                gtag('event', 'conversion', {
                    'send_to': 'AW-11205917800/mdXJCOTL-bccEOj4st8p',
                    'value': 1.0,
                    'currency': 'VND',
                    'event_callback': callback
                });
            } else {
                callback();
            }
            return false;
        }
    </script>

    <!-- Rank Math SEO Metadata Falls Back -->
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title>Học Thạc sĩ Quản trị Kinh doanh - MBA Online tại Việt Nam</title>
        <meta name="description" content="Chương trình MBA quốc tế hay học thạc sĩ Quản trị kinh doanh, học MBA online quốc tế tại Việt Nam giúp người học nâng cao kiến thức quản trị."/>
        <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
        <link rel="canonical" href="https://ideas.edu.vn/thac-si-quan-tri-kinh-doanh-mba" />
        <meta property="og:locale" content="vi_VN" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Học Thạc sĩ Quản trị Kinh doanh - MBA Online tại Việt Nam" />
        <meta property="og:description" content="Chương trình MBA quốc tế hay học thạc sĩ Quản trị kinh doanh, học MBA online quốc tế tại Việt Nam giúp người học nâng cao kiến thức quản trị." />
        <meta property="og:url" content="https://ideas.edu.vn/thac-si-quan-tri-kinh-doanh-mba" />
        <meta property="og:site_name" content="IDEAS" />
        <meta property="og:updated_time" content="2026-03-30T09:51:56+07:00" />
        <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp" />
        <meta property="og:image:secure_url" content="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp" />
        <meta property="og:image:width" content="1920" />
        <meta property="og:image:height" content="1080" />
        <meta property="og:image:alt" content="chương trình mba" />
        <meta property="og:image:type" content="image/png" />
        <meta property="article:published_time" content="2023-07-17T09:19:53+07:00" />
        <meta property="article:modified_time" content="2026-03-30T09:51:56+07:00" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="Học Thạc sĩ Quản trị Kinh doanh - MBA Online tại Việt Nam" />
        <meta name="twitter:description" content="Chương trình MBA quốc tế hay học thạc sĩ Quản trị kinh doanh, học MBA online quốc tế tại Việt Nam giúp người học nâng cao kiến thức quản trị." />
        <meta name="twitter:image" content="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp" />
        <meta name="twitter:label1" content="Thời gian để đọc" />
        <meta name="twitter:data1" content="14 phút" />
        <script type="application/ld+json" class="rank-math-schema-pro">{"@context":"https://schema.org","@graph":[{"@type":["EducationalOrganization","Organization"],"@id":"https://ideas.edu.vn/#organization","name":"IDEAS","url":"https://ideas.edu.vn","logo":{"@type":"ImageObject","@id":"https://ideas.edu.vn/#logo","url":"https://ideas.edu.vn/wp-content/uploads/2026/05/logor.webp","contentUrl":"https://ideas.edu.vn/wp-content/uploads/2026/05/logor.webp","caption":"IDEAS","inLanguage":"vi","width":"2000","height":"978"}},{"@type":"WebSite","@id":"https://ideas.edu.vn/#website","url":"https://ideas.edu.vn","name":"IDEAS","alternateName":"IDEAS","publisher":{"@id":"https://ideas.edu.vn/#organization"},"inLanguage":"vi"},{"@type":"ImageObject","@id":"https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp","url":"https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp","width":"1920","height":"1080","inLanguage":"vi"},{"@type":"BreadcrumbList","@id":"https://ideas.edu.vn/thac-si-quan-tri-kinh-doanh-mba#breadcrumb","itemListElement":[{"@type":"ListItem","position":"1","item":{"@id":"https://ideas.edu.vn","name":"Trang chủ"}},{"@type":"ListItem","position":"2","item":{"@id":"https://ideas.edu.vn/thac-si-quan-tri-kinh-doanh-mba","name":"Học Thạc sĩ Quản trị Kinh doanh &#8211; MBA Online tại Việt Nam"}}]},{"@type":"WebPage","@id":"https://ideas.edu.vn/thac-si-quan-tri-kinh-doanh-mba#webpage","url":"https://ideas.edu.vn/thac-si-quan-tri-kinh-doanh-mba","name":"Học Thạc sĩ Quản trị Kinh doanh - MBA Online tại Việt Nam","datePublished":"2023-07-17T09:19:53+07:00","dateModified":"2026-03-30T09:51:56+07:00","isPartOf":{"@id":"https://ideas.edu.vn/#website"},"primaryImageOfPage":{"@id":"https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp"},"inLanguage":"vi","breadcrumb":{"@id":"https://ideas.edu.vn/thac-si-quan-tri-kinh-doanh-mba#breadcrumb"}},{"@type":"Person","@id":"https://ideas.edu.vn/thac-si-quan-tri-kinh-doanh-mba#author","name":"Huỳnh Trọng Phúc","image":{"@type":"ImageObject","@id":"https://open.domation.net/sale_data/uploads/avatars/avatar_6a13f99900ad7.jpg","url":"https://open.domation.net/sale_data/uploads/avatars/avatar_6a13f99900ad7.jpg","caption":"Huỳnh Trọng Phúc","inLanguage":"vi"},"worksFor":{"@id":"https://ideas.edu.vn/#organization"}},{"@type":"Article","headline":"Học Thạc sĩ Quản trị Kinh doanh - MBA Online tại Việt Nam","keywords":"chương trình mba","datePublished":"2023-07-17T09:19:53+07:00","dateModified":"2026-03-30T09:51:56+07:00","author":{"@id":"https://ideas.edu.vn/thac-si-quan-tri-kinh-doanh-mba#author","name":"Huỳnh Trọng Phúc"},"publisher":{"@id":"https://ideas.edu.vn/#organization"},"description":"Chương trình MBA quốc tế hay học thạc sĩ Quản trị kinh doanh, học MBA online quốc tế tại Việt Nam giúp người học nâng cao kiến thức quản trị.","name":"Học Thạc sĩ Quản trị Kinh doanh - MBA Online tại Việt Nam","@id":"https://ideas.edu.vn/thac-si-quan-tri-kinh-doanh-mba#richSnippet","isPartOf":{"@id":"https://ideas.edu.vn/thac-si-quan-tri-kinh-doanh-mba#webpage"},"image":{"@id":"https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp"},"inLanguage":"vi","mainEntityOfPage":{"@id":"https://ideas.edu.vn/thac-si-quan-tri-kinh-doanh-mba#webpage"}}]}</script>
    <?php endif; ?>

    <style>
        /* ══════════════════════════════════════
           MBA SEO PAGE – PREMIUM DARK DESIGN
           ══════════════════════════════════════ */
        html,
        body {
            overflow-x: clip !important;
            background-color: #080405 !important;
            color: #f3f4f6 !important;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            z-index: -1;
            background-image:
                radial-gradient(circle at 10% 15%, rgba(171, 14, 0, 0.08) 0%, transparent 45%),
                radial-gradient(circle at 90% 80%, rgba(171, 14, 0, 0.05) 0%, transparent 40%),
                radial-gradient(rgba(255, 255, 255, 0.02) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 28px 28px;
            pointer-events: none;
            will-change: transform;
        }

        /* Dynamic curriculum list enhancements */
        .curri-subjects {
            padding: 0;
            margin: 0;
            list-style: none;
        }
        .curri-subjects li {
            position: relative;
            cursor: pointer;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 10px;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            list-style: none;
        }
        .curri-subjects li:hover {
            background: rgba(171, 14, 0, 0.08);
            border-color: rgba(171, 14, 0, 0.3);
            transform: translateX(4px);
        }
        .curri-subjects li.active {
            background: rgba(171, 14, 0, 0.12);
            border-color: rgba(171, 14, 0, 0.5);
        }
        .curri-subjects li .subject-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            font-size: 0.98rem;
            color: #f3f4f6;
        }
        .curri-subjects li .subject-arrow {
            font-size: 0.8rem;
            transition: transform 0.3s ease;
            color: rgba(255, 255, 255, 0.4);
        }
        .curri-subjects li.active .subject-arrow {
            transform: rotate(180deg);
            color: #ff4d4d;
        }
        .curri-subjects li .subject-details {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, margin-top 0.3s ease;
            font-size: 0.88rem;
            color: #9ca3af;
            line-height: 1.6;
        }
        .curri-subjects li.active .subject-details {
            max-height: 300px;
            margin-top: 12px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 12px;
        }
        .curri-subjects li .subject-credit {
            display: inline-block;
            background: rgba(171, 14, 0, 0.2);
            color: #ff4d4d;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 0.72rem;
            font-weight: 700;
            margin-top: 8px;
            text-transform: uppercase;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>

    <main id="content">


        <!-- ══════════════════════════════════════════
         SECTION 1: HOOK – HERO
    ══════════════════════════════════════════ -->
        <section class="hero" id="trang-chu" aria-labelledby="hero-headline">
            <div class="hero-bg">
                <!-- Localized Background Decor -->
                <div class="section-bg-decor">
                    <i class="fa-solid fa-graduation-cap bg-decor-icon decor-lg"
                        style="top: 15%; left: 5%; animation-duration: 28s;"></i>
                    <i class="fa-solid fa-book bg-decor-icon decor-white decor-sm"
                        style="top: 55%; right: 5%; animation-duration: 32s;"></i>
                </div>
                <div class="hero-orb hero-orb-1"></div>
                <div class="hero-orb hero-orb-2"></div>
                <div class="hero-orb hero-orb-3"></div>
                <div class="hero-grid"></div>
            </div>

            <div class="container hero-layout">
                <!-- LEFT: Text -->
                <div class="hero-content reveal-up">
                    <div class="hero-badge">
                        <span class="badge-dot"></span>
                        <span>Đào tạo bởi Swiss UMEF – Geneva, Thụy Sĩ</span>
                    </div>

                    <h1 class="hero-headline" id="hero-headline"><span class="hero-hl-small">Chấm dứt</span> <em
                            class="hero-hl-big">"sự nghiệp đang đứng yên"</em> <span class="hero-hl-small">của bạn với
                            bằng <span class="gradient-text">MBA Thụy Sĩ</span></span></h1>

                    <p class="hero-sub">
                        Chương trình <strong>Thạc Sĩ Quản Trị Kinh Doanh (MBA) trực tuyến</strong> dành cho người đi làm
                        - đã có chuyên môn nhưng muốn bứt phá lên vai trò quản lý cao cấp với nền tảng tư duy
                        quản trị bài bản.
                    </p>

                    <div class="hero-badges-row" aria-label="Thông tin nhanh về chương trình">
                        <div class="info-badge"><span class="icon"><svg width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 16 14" />
                                </svg></span><span>16–18 tháng</span></div>
                        <div class="info-badge"><span class="icon"><svg width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <rect x="2" y="3" width="20" height="14" rx="2" />
                                    <polyline points="8 21 12 17 16 21" />
                                </svg></span><span>100% Trực tuyến</span></div>
                        <div class="info-badge"><span class="icon"><svg width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
                                    <path d="M6 12v5c3 3 9 3 12 0v-5" />
                                </svg></span><span>Bằng cấp Thụy Sĩ</span></div>
                        <div class="info-badge"><span class="icon"><svg width="18" height="18" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <circle cx="12" cy="12" r="10" />
                                    <line x1="2" y1="12" x2="22" y2="12" />
                                    <path
                                        d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
                                </svg></span><span>Công nhận quốc tế</span></div>
                    </div>

                    <!-- Accreditation logos strip -->
                    <div class="hero-accred-strip" aria-label="Các tổ chức kiểm định">
                        <span class="hero-accred-label">Được kiểm định &amp; công nhận bởi</span>
                        <div class="hero-accred-logos">
                            <img width="120" loading="eager" decoding="async"
                                src="https://ideas.edu.vn/wp-content/new_public/data_imgs/kdumef1.png"
                                alt="Swiss Accreditation" class="accred-trigger" data-accred="sac" height="40" />
                            <img width="90" loading="eager" decoding="async"
                                src="https://ideas.edu.vn/wp-content/new_public/data_imgs/kdumef5.png" alt="CHEA"
                                class="accred-trigger" data-accred="chea" height="40" />
                            <img width="130" loading="eager" decoding="async"
                                src="https://ideas.edu.vn/wp-content/new_public/data_imgs/kdumef4.png" alt="IACBE"
                                class="accred-trigger" data-accred="iacbe" height="40" />
                            <img width="100" loading="eager" decoding="async"
                                src="https://ideas.edu.vn/wp-content/new_public/data_imgs/kdumef2.png" alt="ACBSP"
                                class="accred-trigger" data-accred="acbsp" height="40" />
                            <img width="80" loading="eager" decoding="async"
                                src="https://ideas.edu.vn/wp-content/new_public/data_imgs/kdumef3.png" alt="Eduqua"
                                class="accred-trigger" data-accred="eduqua" height="40" />
                            <img width="40" loading="eager" decoding="async"
                                src="https://ideas.edu.vn/wp-content/uploads/2025/10/qs-1.webp" alt="QS Stars"
                                class="accred-trigger" data-accred="qs" height="40" />

                        </div>
                    </div>

                    <div class="hero-cta" style="margin-top:20px;">
                        <button type="button" class="btn btn-primary" id="hero-main-cta"
                            onclick="if(typeof window.openRegModal === 'function') window.openRegModal('hero-main-cta')">
                            <span>Nhận Tư vấn lộ trình MBA</span>
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </button>
                        <button type="button" class="btn btn-outline" id="hero-quiz-cta" onclick="quizModal.open()">
                            <span>Đánh giá mức độ phù hợp</span>
                            <i class="fa-solid fa-graduation-cap" style="font-size: 1rem;"></i>
                        </button>
                    </div>

                    <div class="hero-social-proof">
                        <div class="avatars" aria-hidden="true">
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2025/02/casc1.jpg"
                                alt="Học viên MBA Swiss UMEF 1" class="avatar av1" loading="lazy" width="40"
                                height="40">
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2025/02/huynhphuong.jpg"
                                alt="Học viên MBA Swiss UMEF 2" class="avatar av2" loading="lazy" width="40"
                                height="40">
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2025/02/hamien.jpg"
                                alt="Học viên MBA Swiss UMEF 3" class="avatar av3" loading="lazy" width="40"
                                height="40">
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2025/02/cumef.jpg"
                                alt="Học viên MBA Swiss UMEF 4" class="avatar av4" loading="lazy" width="40"
                                height="40">
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2025/02/casc2.jpg"
                                alt="Học viên MBA Swiss UMEF 5" class="avatar av5" loading="lazy" width="40"
                                height="40">
                            <img decoding="async"
                                src="https://ideas.edu.vn/wp-content/uploads/2025/02/chu_hoang_thai.jpg"
                                alt="Học viên MBA Swiss UMEF 6" class="avatar av6" loading="lazy" width="40"
                                height="40">
                        </div>
                        <p><strong>2571+</strong> học viên Việt Nam Tốt nghiệp các chương trình Swiss UMEF cùng IDEAS
                        </p>
                    </div>

                </div>

                <!-- RIGHT: Real photo -->
                <div class="hero-visual reveal-up">
                    <div class="hero-photo-main">
                        <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2026/06/ltnumef10202501.webp"
                            alt="Lễ tốt nghiệp MBA Swiss UMEF – IDEAS Education" width="620" height="720"
                            loading="eager" fetchpriority="high" />
                        <!-- Floating stat badges -->
                        <div class="hero-float-badge hero-float-1">
                            <div class="float-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <circle cx="12" cy="8" r="6" />
                                    <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11" />
                                </svg>
                            </div>
                            <div>
                                <div class="float-value">2571+</div>
                                <div class="float-label">Học viên tốt nghiệp</div>
                            </div>
                        </div>
                        <div class="hero-float-badge hero-float-2">
                            <div class="float-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"
                                        fill="currentColor" stroke="none" />
                                </svg>
                            </div>
                            <div>
                                <div class="float-value">QS 5★</div>
                                <div class="float-label">Xếp hạng quốc tế</div>
                            </div>
                        </div>
                        <div class="hero-float-badge hero-float-3">
                            <div class="float-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />
                                    <polyline points="17 6 23 6 23 12" />
                                </svg>
                            </div>
                            <div>
                                <div class="float-value">+50%</div>
                                <div class="float-label">Tăng thu nhập</div>
                            </div>
                        </div>
                    </div>
                    <!-- Stacked secondary photo -->
                    <div class="hero-photo-secondary">
                        <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2025/11/DSCF6777.jpg"
                            alt="Học viên MBA Swiss UMEF nhận bằng" width="200" height="160" loading="lazy" />
                    </div>
                </div>
            </div>

            <div class="hero-scroll-indicator" aria-hidden="true">
                <div class="scroll-mouse">
                    <div class="scroll-wheel"></div>
                </div>
            </div>
        </section>

        <!-- ══════════════════════════════════════════
         SECTION 2: PAIN
     ══════════════════════════════════════════ -->
        <section class="pain-section" id="van-de" aria-labelledby="pain-headline">
            <div class="pain-bg-decoration" aria-hidden="true">
                <!-- Localized Background Decor -->
                <div class="section-bg-decor">
                    <i class="fa-solid fa-lightbulb bg-decor-icon decor-lg"
                        style="top: 35%; left: 4%; animation-duration: 24s;"></i>
                    <i class="fa-solid fa-triangle-exclamation bg-decor-icon decor-white decor-sm"
                        style="top: 75%; right: 6%; animation-duration: 30s;"></i>
                </div>
                <div class="pain-bg-orb pain-orb-1"></div>
                <div class="pain-bg-orb pain-orb-2"></div>
            </div>
            <div class="container">

                <div class="pain-header reveal-up">
                    <div class="pain-label-badge">
                        <span class="pain-label-dot"></span>
                        VẤN ĐỀ
                    </div>
                    <h2 class="pain-headline" id="pain-headline">
                        Sự nghiệp của bạn không tụt dốc,<br />
                        nhưng đang <span class="pain-headline-accent">đứng yên một cách nguy hiểm</span>
                    </h2>
                    <p class="pain-sub">Nhận ra vấn đề sớm là bước đầu để thay đổi.</p>
                </div>

                <!-- Pain cards - numbered -->
                <div class="pain-cards reveal-up">
                    <div class="pain-card-v2">
                        <div class="pain-card-num">01</div>
                        <div class="pain-card-header">
                            <div class="pain-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                                    aria-hidden="true">
                                    <line x1="18" y1="20" x2="18" y2="10" />
                                    <line x1="12" y1="20" x2="12" y2="4" />
                                    <line x1="6" y1="20" x2="6" y2="14" />
                                </svg>
                            </div>
                            <h3 class="pain-card-title">Mắc kẹt ở trần sự nghiệp</h3>
                        </div>
                        <p class="pain-card-desc">Bị mắc kẹt ở <strong>trần sự nghiệp</strong> (career ceiling), nỗ lực
                            nhiều năm nhưng khó chen chân vào ban giám đốc điều hành.</p>
                    </div>
                    <div class="pain-card-v2">
                        <div class="pain-card-num">02</div>
                        <div class="pain-card-header">
                            <div class="pain-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                                    aria-hidden="true">
                                    <circle cx="6" cy="6" r="3" />
                                    <circle cx="18" cy="6" r="3" />
                                    <circle cx="6" cy="18" r="3" />
                                    <circle cx="18" cy="18" r="3" />
                                </svg>
                            </div>
                            <h3 class="pain-card-title">Tư duy quản lý lối mòn</h3>
                        </div>
                        <p class="pain-card-desc">Tư duy quản lý lối mòn, <strong>thiếu tiếng nói chiến lược</strong> và
                            lúng túng khi giải quyết các xung đột vận hành.</p>
                    </div>
                    <div class="pain-card-v2">
                        <div class="pain-card-num">03</div>
                        <div class="pain-card-header">
                            <div class="pain-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                                    aria-hidden="true">
                                    <line x1="12" y1="1" x2="12" y2="23" />
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                                </svg>
                            </div>
                            <h3 class="pain-card-title">Thu nhập dậm chân tại chỗ</h3>
                        </div>
                        <p class="pain-card-desc">Thu nhập dậm chân tại chỗ, thiếu <strong>tấm bằng quốc tế có giá trị
                                pháp lý</strong> để nâng tầm hồ sơ cá nhân.</p>
                    </div>
                    <div class="pain-card-v2">
                        <div class="pain-card-num">04</div>
                        <div class="pain-card-header">
                            <div class="pain-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                                    aria-hidden="true">
                                    <rect x="3" y="11" width="18" height="11" rx="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                            </div>
                            <h3 class="pain-card-title">Lo sợ làn sóng đào thải</h3>
                        </div>
                        <p class="pain-card-desc">Lo sợ làn sóng <strong>tái cấu trúc toàn cầu</strong> và sức ép cạnh
                            tranh từ thế hệ trẻ thạo công nghệ.</p>
                    </div>
                </div>

                <!-- Stat + Trends -->
                <div class="pain-bottom-row reveal-up">
                    <div class="pain-stat-card" role="region" aria-label="Thống kê cảnh báo">
                        <div class="pain-stat-glow" aria-hidden="true"></div>
                        <div class="pain-stat-number">43<span>%</span> <span>bị thay thế</span></div>
                        <div class="pain-stat-text">
                            <p>Bạn có đang nằm trong <strong>43% người lao động</strong> lo lắng sẽ bị thay thế trong
                                vòng 2 năm tới?</p>
                            <p class="pain-stat-source">*theo báo cáo Global Talent Barometer 2026</p>
                        </div>
                    </div>
                    <div class="pain-trends">
                        <p class="pain-trends-title">Thị trường đang thay đổi nhanh chóng:</p>
                        <div class="pain-trend-item">
                            <span class="pain-trend-icon pain-trend-icon--blue">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"
                                    aria-hidden="true">
                                    <polyline points="17 1 21 5 17 9" />
                                    <path d="M3 11V9a4 4 0 0 1 4-4h14" />
                                    <polyline points="7 23 3 19 7 15" />
                                    <path d="M21 13v2a4 4 0 0 1-4 4H3" />
                                </svg>
                            </span>
                            <p><strong>AI thế hệ mới và tự động hóa</strong> đang tái định nghĩa công việc của nhân sự
                            </p>
                        </div>
                        <div class="pain-trend-item">
                            <span class="pain-trend-icon pain-trend-icon--amber">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"
                                    aria-hidden="true">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />
                                    <polyline points="17 6 23 6 23 12" />
                                </svg>
                            </span>
                            <p>Doanh nghiệp ưu tiên nhân sự có <strong>chuyên môn kết hợp tư duy quản trị và ra quyết
                                    định dựa trên dữ liệu</strong></p>
                        </div>
                        <div class="pain-trend-item">
                            <span class="pain-trend-icon pain-trend-icon--green">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"
                                    aria-hidden="true">
                                    <polyline points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
                                </svg>
                            </span>
                            <p>Người đi làm buộc phải <strong>liên tục cập nhật và phát triển năng lực</strong> để cạnh
                                tranh</p>
                        </div>
                    </div>
                </div>

                <!-- Warning bar -->
                <div class="pain-warning-v2 reveal-up">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                        style="color: #ef4444; opacity: 0.8;">
                        <path
                            d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017V14C19.017 11.7909 17.2261 10 15.017 10H14.017V7H15.017C18.883 7 22.017 10.134 22.017 14V21H14.017ZM3.01697 21L3.01697 18C3.01697 16.8954 3.9124 16 5.01697 16H8.01697V14C8.01697 11.7909 6.22611 10 4.01697 10H3.01697V7H4.01697C7.883 7 11.017 10.134 11.017 14V21H3.01697Z" />
                    </svg>
                    <strong style="font-style: italic;">"Không bước ra khỏi vùng an toàn chính là rủi ro dài hạn cho sự
                        nghiệp của bạn."</strong>
                </div>

                <div class="section-cta reveal-up">
                    <button type="button" class="btn btn-primary" id="pain-cta"
                        onclick="if(typeof window.openRegModal === 'function') window.openRegModal('pain-cta')">
                        Nhận lộ trình thăng tiến MIỄN PHÍ
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

            </div>
        </section>



        <!-- ══════════════════════════════════════════
         SECTION: WHO IS THIS FOR?
     ══════════════════════════════════════════ -->
        <!-- <section class="audience-section" id="danh-cho-ai" aria-labelledby="audience-headline">
            <div class="container">
                <div class="section-label reveal-up" style="text-align:center">CHƯƠNG TRÌNH DÀNH CHO AI?</div>
                <h2 class="section-title reveal-up" id="audience-headline" style="text-align:center">
                    Dựa trên số liệu thực tế<br />
                    <span class="gradient-text">học viên MBA IDEAS</span>
                </h2>

                <div class="audience-card reveal-up">
                    <div class="audience-col">
                        <div class="aud-col-label"><span class="aud-col-accent"></span>LĨNH VỰC</div>
                        <div class="aud-bars">
                            <div class="aud-bar-row">
                                <div class="aud-bar-info">
                                    <span class="aud-bar-name">Quản trị kinh doanh</span>
                                    <span class="aud-bar-pct">30%</span>
                                </div>
                                <div class="aud-bar-track">
                                    <div class="aud-bar-fill" style="--w:30%"></div>
                                </div>
                            </div>
                            <div class="aud-bar-row">
                                <div class="aud-bar-info">
                                    <span class="aud-bar-name">Tài chính – Ngân hàng</span>
                                    <span class="aud-bar-pct">22%</span>
                                </div>
                                <div class="aud-bar-track">
                                    <div class="aud-bar-fill" style="--w:22%"></div>
                                </div>
                            </div>
                            <div class="aud-bar-row">
                                <div class="aud-bar-info">
                                    <span class="aud-bar-name">Công nghệ thông tin</span>
                                    <span class="aud-bar-pct">20%</span>
                                </div>
                                <div class="aud-bar-track">
                                    <div class="aud-bar-fill" style="--w:20%"></div>
                                </div>
                            </div>
                            <div class="aud-bar-row">
                                <div class="aud-bar-info">
                                    <span class="aud-bar-name">Khởi nghiệp / Start-up</span>
                                    <span class="aud-bar-pct">16%</span>
                                </div>
                                <div class="aud-bar-track">
                                    <div class="aud-bar-fill" style="--w:16%"></div>
                                </div>
                            </div>
                            <div class="aud-bar-row">
                                <div class="aud-bar-info">
                                    <span class="aud-bar-name">Lĩnh vực khác</span>
                                    <span class="aud-bar-pct">12%</span>
                                </div>
                                <div class="aud-bar-track">
                                    <div class="aud-bar-fill" style="--w:12%;opacity:.55"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="aud-divider" aria-hidden="true"></div>

                    <div class="audience-col">
                        <div class="aud-col-label"><span class="aud-col-accent"></span>ĐỘ TUỔI</div>
                        <div class="aud-age-chart" aria-label="Biểu đồ độ tuổi học viên">
                            <div class="aud-age-peak">55%</div>
                            <div class="aud-vbars">
                                <div class="aud-vbar-col">
                                    <div class="aud-vbar-wrap">
                                        <div class="aud-vbar" style="--h:22%"></div>
                                    </div>
                                    <div class="aud-vbar-label">18–24</div>
                                </div>
                                <div class="aud-vbar-col">
                                    <div class="aud-vbar-wrap">
                                        <div class="aud-vbar" style="--h:45%"></div>
                                    </div>
                                    <div class="aud-vbar-label">25–30</div>
                                </div>
                                <div class="aud-vbar-col aud-vbar-active">
                                    <div class="aud-vbar-wrap">
                                        <div class="aud-vbar" style="--h:100%"></div>
                                    </div>
                                    <div class="aud-vbar-label">31–40</div>
                                </div>
                                <div class="aud-vbar-col">
                                    <div class="aud-vbar-wrap">
                                        <div class="aud-vbar" style="--h:30%"></div>
                                    </div>
                                    <div class="aud-vbar-label">41–50</div>
                                </div>
                                <div class="aud-vbar-col">
                                    <div class="aud-vbar-wrap">
                                        <div class="aud-vbar" style="--h:14%"></div>
                                    </div>
                                    <div class="aud-vbar-label">51+</div>
                                </div>
                            </div>
                            <p class="aud-note">Tập trung thu hút các chuyên gia và lãnh đạo có kinh nghiệm.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- ══════════════════════════════════════════
         SECTION 3: SOLUTION
    ══════════════════════════════════════════ -->
        <section class="solution-section" id="giai-phap" aria-labelledby="solution-headline">
            <!-- Localized Background Decor -->
            <div class="section-bg-decor">
                <i class="fa-solid fa-rocket bg-decor-icon decor-lg"
                    style="top: 15%; left: 3%; animation-duration: 25s; color: rgba(239, 68, 68, 0.04);"></i>
                <i class="fa-solid fa-chart-line bg-decor-icon decor-sm"
                    style="top: 65%; right: 4%; animation-duration: 31s; color: rgba(239, 68, 68, 0.04);"></i>
            </div>
            <div class="container sol-v2-wrap">

                <!-- LEFT: Text content -->
                <div class="sol-v2-left reveal-up">
                    <div class="section-label">GIẢI PHÁP</div>
                    <h2 class="section-title" id="solution-headline" style="margin-bottom:16px">
                        Lộ trình nâng cao năng lực bài bản,<br />
                        <span class="gradient-text">ứng dụng trực tiếp</span> vào công việc
                    </h2>

                    <p class="sol-v2-desc">
                        Chương trình <strong>Thạc sĩ Quản trị kinh doanh</strong> do <strong>Swiss UMEF (Thụy
                            Sĩ)</strong>
                        trực tiếp đào tạo - thiết kế cho người đi làm muốn xây dựng nền tảng quản trị và bứt phá lên vai
                        trò quản lý.
                    </p>

                    <!-- Compact stat pills -->
                    <div class="sol-v2-stats">
                        <div class="sol-v2-stat">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <rect x="2" y="3" width="20" height="14" rx="2" />
                                <polyline points="8 21 12 17 16 21" />
                            </svg>
                            <span class="sol-v2-stat-val">100%</span>
                            <span class="sol-v2-stat-lbl">Trực tuyến</span>
                        </div>
                        <div class="sol-v2-stat">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <rect x="3" y="4" width="18" height="18" rx="2" />
                                <line x1="16" y1="2" x2="16" y2="6" />
                                <line x1="8" y1="2" x2="8" y2="6" />
                                <line x1="3" y1="10" x2="21" y2="10" />
                            </svg>
                            <span class="sol-v2-stat-val">16–18</span>
                            <span class="sol-v2-stat-lbl">Tháng</span>
                        </div>
                        <div class="sol-v2-stat">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                            </svg>
                            <span class="sol-v2-stat-val">12 môn + 1</span>
                            <span class="sol-v2-stat-lbl">Luận văn</span>
                        </div>
                        <div class="sol-v2-stat">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="12" cy="8" r="6" />
                                <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11" />
                            </svg>
                            <span class="sol-v2-stat-val">90</span>
                            <span class="sol-v2-stat-lbl">ECTS Tín chỉ</span>
                        </div>
                    </div>

                    <!-- Tagline -->
                    <div class="sol-v2-tagline">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ab0e00" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                        </svg>
                        <p>Giúp bạn <strong>chuyển mình từ người thực thi giỏi thành nhà quản lý có tư duy hệ thống và
                                chiến lược.</strong></p>
                    </div>

                    <div class="hero-cta" style="margin-top:28px">
                        <button type="button" class="btn btn-primary" id="solution-cta"
                            onclick="if(typeof window.openRegModal === 'function') window.openRegModal('solution-cta')">
                            Xem chi tiết lộ trình đào tạo MBA
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- RIGHT: Photo collage -->
                <div class="sol-v2-right reveal-up">
                    <div class="sol-photo-grid">
                        <!-- Main large photo -->
                        <div class="sol-photo-main">
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2025/03/image-1-1.png"
                                alt="Học viên MBA Swiss UMEF học trực tuyến trên máy tính" loading="lazy" width="500"
                                height="350" />
                            <div class="sol-photo-badge sol-badge-tl">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2.5" aria-hidden="true">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                                Học trực tuyến mọi nơi
                            </div>
                        </div>
                        <!-- Bottom row: 2 smaller photos -->
                        <div class="sol-photo-row">
                            <div class="sol-photo-sm">
                                <img decoding="async"
                                    src="https://ideas.edu.vn/wp-content/uploads/2024/10/461779815_852230670439635_3180438795963466960_n.jpg"
                                    alt="Lớp học MBA trực tuyến qua Zoom" loading="lazy" width="240" height="180" />
                            </div>
                            <div class="sol-photo-sm sol-photo-sm-accent">
                                <img decoding="async"
                                    src="https://ideas.edu.vn/wp-content/uploads/2025/03/buoihuongdan.jpg"
                                    alt="Buổi lễ khai giảng và hướng dẫn học viên MBA Swiss UMEF" loading="lazy"
                                    width="240" height="180" />
                                <div class="sol-photo-badge sol-badge-br">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                    </svg>
                                    2571+ học viên
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container sol-v2-wrap -->

            <!-- Added 4 Core Competencies from Benefits - Now in its own container to fill width -->
            <div class="container">
                <div class="competency-relocated reveal-up" style="margin-top: 20px; margin-bottom: 0;">
                    <h2 class="section-title reveal-up" id="competency-headline"
                        style="text-align: center; margin-bottom: 48px;">
                        Đưa sự nghiệp lên một tầm cao mới bằng<br />
                        <span class="gradient-text">4 năng lực quản trị cốt lõi</span>
                    </h2>

                    <div class="competency-grid reveal-up" aria-label="4 năng lực quản trị cốt lõi">
                        <article class="competency-card">
                            <div class="comp-number">01</div>
                            <div class="comp-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                    <circle cx="12" cy="12" r="10" />
                                    <line x1="12" y1="17" x2="12.01" y2="17" />
                                </svg></div>
                            <h3 class="comp-title">Tư duy quản trị tổng thể</h3>
                            <p class="comp-desc">Hình thành tư duy quản trị bài bản, giúp bạn hiểu cách một doanh nghiệp
                                vận hành từ chiến lược đến thực thi và kết nối hiệu quả giữa các phòng ban.</p>
                        </article>
                        <article class="competency-card">
                            <div class="comp-number">02</div>
                            <div class="comp-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <line x1="18" y1="20" x2="18" y2="10" />
                                    <line x1="12" y1="20" x2="12" y2="4" />
                                    <line x1="6" y1="20" x2="6" y2="14" />
                                </svg></div>
                            <h3 class="comp-title">Quản trị thị trường</h3>
                            <p class="comp-desc">Phát triển năng lực phân tích thị trường, thấu hiểu hành vi khách hàng,
                                xây dựng chiến lược marketing và định giá sản phẩm phù hợp với mục tiêu kinh doanh.</p>
                        </article>
                        <article class="competency-card">
                            <div class="comp-number">03</div>
                            <div class="comp-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />
                                    <polyline points="17 6 23 6 23 12" />
                                </svg></div>
                            <h3 class="comp-title">Ra quyết định dựa trên dữ liệu</h3>
                            <p class="comp-desc">Nâng cao khả năng phân tích tài chính, đọc hiểu báo cáo tài chính, đánh
                                giá hiệu quả dự án, kiểm soát ngân sách và đưa ra quyết định dựa trên số liệu thực tế.
                            </p>
                        </article>
                        <article class="competency-card">
                            <div class="comp-number">04</div>
                            <div class="comp-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg></div>
                            <h3 class="comp-title">Quản trị con người trong tổ chức</h3>
                            <p class="comp-desc">Trang bị năng lực quản lý đội nhóm, ứng dụng công nghệ và tư duy đổi
                                mới để nâng cao hiệu suất và đóng góp tích cực vào quá trình đổi mới của doanh nghiệp.
                            </p>
                        </article>
                    </div>
                    <div class="scroll-dots" data-scroll-target=".competency-grid"></div>
                </div>
            </div>
        </section>

        <!-- ══════════════════════════════════════════
         SECTION: CURRICULUM
     ══════════════════════════════════════════ -->
        <section class="curriculum-section" id="chuong-trinh" aria-labelledby="curriculum-headline"
            style="position: relative; overflow: hidden; padding-top: 40px;">
            <!-- Localized Background Decor -->
            <div class="section-bg-decor">
                <i class="fa-solid fa-graduation-cap bg-decor-icon decor-lg"
                    style="top: 15%; left: 3%; animation-duration: 26s; color: rgba(239, 68, 68, 0.045);"></i>
                <i class="fa-solid fa-certificate bg-decor-icon decor-sm"
                    style="top: 65%; right: 4%; animation-duration: 33s; color: rgba(239, 68, 68, 0.045);"></i>
            </div>
            <div class="container">
                <div class="section-label reveal-up">CHƯƠNG TRÌNH HỌC</div>
                <h2 class="section-title reveal-up" id="curriculum-headline">
                    12 môn + Thesis<br />
                    <span class="gradient-text">Thiết kế theo chuẩn Châu Âu (90 ECTS)</span>
                </h2>
                <p class="solution-intro reveal-up">Chương trình được xây dựng theo tiêu chuẩn Bologna của Châu Âu, đảm
                    bảo tính hệ thống từ nền tảng quản trị đến chuyên sâu chiến lược, ứng dụng ngay vào công việc hiện
                    tại.</p>

                <div class="curriculum-grid reveal-up" id="dynamic-curriculum-grid"></div>
</div>
<div class="curri-thesis reveal-up">
                    <div class="curri-thesis-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                            <line x1="8" y1="10" x2="16" y2="10" />
                            <line x1="8" y1="14" x2="12" y2="14" />
                        </svg>
                    </div>
                    <div>
                        <strong>Luận văn tốt nghiệp (Thesis)</strong>
                        <p>Áp dụng toàn bộ kiến thức MBA vào một dự án nghiên cứu thực tiễn tại doanh nghiệp của bạn -
                            được hội đồng giảng viên Swiss UMEF đánh giá và bảo vệ online.</p>
                    </div>
                </div>

                <div class="curri-lms-note reveal-up">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="2" y="3" width="20" height="14" rx="2" />
                        <polyline points="8 21 12 17 16 21" />
                    </svg>
                    <span>Toàn bộ môn học được triển khai trên hệ thống <strong>LMS Powered by Moodle</strong> - hỗ trợ
                        video, tài liệu, bài tập &amp; thi trực tuyến.</span>
                </div>

                <div class="curri-cta reveal-up" style="margin-top: 40px; text-align: center;">
                    <a href="#dang-ky" class="btn btn-primary bk-open-btn">
                        Nhận chi tiết lộ trình 12 môn học
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
        <!-- ecosystem-section -->
        <section class="ecosystem-section reveal-up">
            <div class="eco-orb eco-orb-1" aria-hidden="true"></div>
            <div class="eco-orb eco-orb-2" aria-hidden="true"></div>
            <div class="eco-orb eco-orb-3" aria-hidden="true"></div>
            <div class="eco-inner">
                <div class="eco-header">
                    <div class="section-label eco-label-light">HỆ SINH THÁI HỌC TẬP</div>
                    <h3 class="ecosystem-title">Hệ sinh thái học tập toàn diện<br /><span class="eco-title-accent">luôn
                            đồng hành cùng bạn</span></h3>
                    <p class="ecosystem-sub">IDEAS là đối tác tuyển sinh chính thức của Swiss UMEF, xây dựng hệ
                        sinh thái học tập toàn diện cho người học Việt Nam.</p>
                </div>

                <div class="ecosystem-grid-v2">
                    <article class="eco-card-v2">
                        <div class="eco-card-v2-icon eco-card-v2-icon--logo"
                            style="--icon-clr:#ef4444;--icon-bg:rgba(255,255,255,0.95)">
                            <img decoding="async"
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c6/Moodle-logo.svg/1280px-Moodle-logo.svg.png"
                                alt="Moodle logo" style="width:68px;height:auto;object-fit:contain;" loading="lazy" />
                        </div>
                        <div class="eco-card-v2-body">
                            <div class="eco-card-v2-num">01</div>
                            <h4 class="eco-card-v2-title">LMS Powered by Moodle</h4>
                            <p class="eco-card-v2-desc">Nền tảng học tập hiện đại, hỗ trợ video bài giảng, tài
                                liệu và bài tập - truy cập 24/7 mọi lúc, mọi nơi.</p>
                        </div>
                    </article>

                    <article class="eco-card-v2">
                        <div class="eco-card-v2-icon eco-card-v2-icon--logo"
                            style="--icon-clr:#a78bfa;--icon-bg:rgba(255,255,255,0.95)">
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2026/02/Buffet-AI-R.webp"
                                alt="IDEAS AI Platform logo" style="width:68px;height:auto;object-fit:contain;"
                                loading="lazy" />
                        </div>
                        <div class="eco-card-v2-body">
                            <div class="eco-card-v2-num">02</div>
                            <h4 class="eco-card-v2-title">IDEAS AI Platform</h4>
                            <p class="eco-card-v2-desc">Trợ lý AI hỗ trợ giải thích kiến thức, nghiên cứu tài
                                liệu và tối ưu thời gian học tập hiệu quả.</p>
                        </div>
                    </article>

                    <article class="eco-card-v2">
                        <div class="eco-card-v2-icon eco-card-v2-icon--logo"
                            style="--icon-clr:#34d399;--icon-bg:rgba(255,255,255,0.95)">
                            <img decoding="async"
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Cengage-logo.svg/1280px-Cengage-logo.svg.png"
                                alt="Cengage logo" style="width:68px;height:auto;object-fit:contain;" loading="lazy" />
                        </div>
                        <div class="eco-card-v2-body">
                            <div class="eco-card-v2-num">03</div>
                            <h4 class="eco-card-v2-title">Cengage Library</h4>
                            <p class="eco-card-v2-desc">Miễn phí truy cập hơn 1.000 đầu sách học thuật chuyên
                                ngành kinh doanh và quản lý quốc tế.</p>
                        </div>
                    </article>

                    <article class="eco-card-v2">
                        <div class="eco-card-v2-icon eco-card-v2-icon--logo"
                            style="--icon-clr:#34d399;--icon-bg:rgba(255,255,255,0.95)">
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2025/06/log_ideas.png"
                                alt="Chuyên đề" style="width:68px;height:auto;object-fit:contain;" loading="lazy" />
                        </div>
                        <div class="eco-card-v2-body">
                            <div class="eco-card-v2-num">04</div>
                            <h4 class="eco-card-v2-title">Lớp chuyên đề bổ trợ</h4>
                            <p class="eco-card-v2-desc">Các buổi chuyên đề cuối tuần với giảng viên và chuyên
                                gia đầu ngành, kết nối kiến thức MBA với thực tiễn.</p>
                        </div>
                    </article>
                </div>

                <!-- Chuỗi Workshop & Chuyên đề bổ trợ -->
                <div class="eco-workshops"
                    style="margin-top: 56px; border-top: 1.5px dashed rgba(171, 14, 0, 0.15); padding-top: 48px;">
                    <div style="text-align: center; max-width: 720px; margin: 0 auto 36px;">
                        <h4 class="eco-workshop-title">
                            IDEAS - Việt Nam và các buổi<br />
                            <span class="gradient-text">Workshop &amp; Chuyên đề</span>
                        </h4>
                        <p style="color: var(--clr-text-muted); font-size: 0.9rem; line-height: 1.5;">
                            IDEAS đồng hành và hỗ trợ học viên tận tình suốt quá trình học tập thông qua các buổi học
                            Online chuyên sâu và Seminar Offline gặp gỡ trực tiếp.
                        </p>
                    </div>

                    <div style="text-align: center;">
                        <div class="workshop-tabs-nav" role="tablist">
                            <button type="button" class="workshop-tab-btn active" role="tab" aria-selected="true"
                                data-tab="tab-offline">Seminar Offline</button>
                            <button type="button" class="workshop-tab-btn" role="tab" aria-selected="false"
                                data-tab="tab-online">Workshop Online</button>
                        </div>
                    </div>

                    <!-- Tab 1: Offline Seminars -->
                    <div class="workshop-tab-content active" id="tab-offline" role="tabpanel">
                        <div class="workshop-grid">
                            <div class="workshop-card">
                                <img decoding="async" class="workshop-card-img"
                                    src="https://ideas.edu.vn/wp-content/uploads/2025/08/wsoff16_8.jpg"
                                    alt="Workshop Offline 1" loading="lazy" />
                                <div class="workshop-card-body">
                                    <span class="workshop-card-tag">Offline Seminar</span>
                                    <h4 class="workshop-card-title">Hội thảo trực tiếp</h4>
                                    <p class="workshop-card-desc">Các buổi chuyên đề trực tiếp tại trường Swiss UMEF
                                        nhằm thảo luận
                                        và chia sẻ kinh nghiệm thực tiễn.</p>
                                </div>
                            </div>
                            <div class="workshop-card">
                                <img decoding="async" class="workshop-card-img"
                                    src="https://ideas.edu.vn/wp-content/uploads/2025/03/workshopAI.jpg"
                                    alt="Workshop Offline 2" loading="lazy" />
                                <div class="workshop-card-body">
                                    <span class="workshop-card-tag">Offline Network</span>
                                    <h4 class="workshop-card-title">Giao lưu &amp; Kết nối</h4>
                                    <p class="workshop-card-desc">Cơ hội gặp gỡ, mở rộng mạng lưới quan hệ và kết nối
                                        cộng đồng học viên thực tế.</p>
                                </div>
                            </div>
                            <div class="workshop-card">
                                <img decoding="async" class="workshop-card-img"
                                    src="https://ideas.edu.vn/wp-content/uploads/2024/03/Hoi-thao-MBA-50-5.jpg"
                                    alt="Workshop Offline 3" loading="lazy" />
                                <div class="workshop-card-body">
                                    <span class="workshop-card-tag">Offline Workshop</span>
                                    <h4 class="workshop-card-title">Workshop thực chiến</h4>
                                    <p class="workshop-card-desc">Thực hành và giải quyết các bài toán quản trị doanh
                                        nghiệp cùng chuyên gia.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab 2: Online Workshops -->
                    <div class="workshop-tab-content" id="tab-online" role="tabpanel">
                        <div class="workshop-grid">
                            <div class="workshop-card">
                                <img decoding="async" class="workshop-card-img"
                                    src="https://ideas.edu.vn/wp-content/uploads/2025/06/WORSHOP-29-6-SIZE-16_9.png"
                                    alt="Workshop Online 1" loading="lazy" />
                                <div class="workshop-card-body">
                                    <span class="workshop-card-tag">Online Workshop</span>
                                    <h4 class="workshop-card-title">Chuyên đề Online bổ trợ</h4>
                                    <p class="workshop-card-desc">Các buổi chia sẻ kiến thức trực tuyến định kỳ giúp
                                        củng cố lý thuyết và ứng dụng thực tiễn.</p>
                                </div>
                            </div>
                            <div class="workshop-card">
                                <img decoding="async" class="workshop-card-img"
                                    src="https://ideas.edu.vn/wp-content/uploads/2025/05/IDEAS-TALK-25-5-1.png.webp"
                                    alt="Workshop Online 2" loading="lazy" />
                                <div class="workshop-card-body">
                                    <span class="workshop-card-tag">Online Seminar</span>
                                    <h4 class="workshop-card-title">Tọa đàm học thuật trực tuyến</h4>
                                    <p class="workshop-card-desc">Giao lưu và thảo luận chuyên sâu cùng các giảng viên
                                        và chuyên gia hàng đầu.</p>
                                </div>
                            </div>
                            <div class="workshop-card">
                                <img decoding="async" class="workshop-card-img"
                                    src="https://ideas.edu.vn/wp-content/uploads/2025/04/ws-16-9.png"
                                    alt="Workshop Online 3" loading="lazy" />
                                <div class="workshop-card-body">
                                    <span class="workshop-card-tag">Online Support</span>
                                    <h4 class="workshop-card-title">Hướng dẫn học tập trực tuyến</h4>
                                    <p class="workshop-card-desc">Hỗ trợ giải đáp thắc mắc, hướng dẫn phương pháp làm
                                        bài luận và đề án tốt nghiệp.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Expert/Advisor Avatars Block -->
                    <div class="eco-advisors-proof reveal-up">
                        <div class="avatars">
                            <img decoding="async"
                                src="https://ideas.edu.vn/wp-content/uploads/2025/03/vientruong_avt.jpg"
                                alt="Chuyên gia 1" class="avatar" loading="lazy" />
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2024/04/Thay-thinh.png"
                                alt="Chuyên gia 2" class="avatar" loading="lazy" />
                            <img decoding="async"
                                src="https://ideas.edu.vn/wp-content/uploads/2024/04/NHP_1769-removebg-preview.png"
                                alt="Chuyên gia 3" class="avatar" loading="lazy" />
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2024/04/a-tam-anh-1.png"
                                alt="Chuyên gia 4" class="avatar" loading="lazy" />
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2024/04/Doan.png"
                                alt="Chuyên gia 5" class="avatar" loading="lazy" />
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2024/04/cNhat.png"
                                alt="Chuyên gia 6" class="avatar" loading="lazy" />
                            <img decoding="async"
                                src="https://static.wixstatic.com/media/ad92c7_b5271804f0454b11a7c7a08850a42adc~mv2.jpg/v1/fill/w_277,h_277,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/Image-empty-state.jpg"
                                alt="Chuyên gia 7" class="avatar" loading="lazy" />
                        </div>
                        <p>
                            Đồng hành cùng hơn <strong>30+</strong> chuyên gia và giảng viên cố vấn cao cấp
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="enroll-section" id="tuyen-sinh" aria-labelledby="enroll-headline">
            <div class="container">
                <div class="enroll-inner">
                    <!-- LEFT: Timeline -->
                    <div class="enroll-left reveal-up">
                        <div class="section-label">THỜI GIAN TUYỂN SINH</div>
                        <h2 class="section-title" id="enroll-headline">
                            Khoá học mới<br />
                            <span class="gradient-text">đang mở đăng ký</span>
                        </h2>
                        <div class="enroll-timeline">
                            <div class="enroll-step enroll-step--done">
                                <div class="enroll-step-dot"></div>
                                <div class="enroll-step-content">
                                    <div class="enroll-step-date">Tuyển sinh liên tục</div>
                                    <div class="enroll-step-label">Mở đăng ký hàng tháng</div>
                                </div>
                            </div>
                            <div class="enroll-step enroll-step--active">
                                <div class="enroll-step-dot"></div>
                                <div class="enroll-step-content">
                                    <div class="enroll-step-date">Ngày 25 hàng tháng</div>
                                    <div class="enroll-step-label">Chốt khoá - <strong>Hạn cuối nộp hồ sơ</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="enroll-step">
                                <div class="enroll-step-dot"></div>
                                <div class="enroll-step-content">
                                    <div class="enroll-step-date">Ngày 01 hàng tháng</div>
                                    <div class="enroll-step-label">Khai giảng môn học mới</div>
                                </div>
                            </div>
                        </div>
                        <a href="#dang-ky" class="btn btn-primary" id="enroll-cta">
                            Đăng ký MBA Online ngay
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>

                    <!-- RIGHT: Application steps -->
                    <div class="enroll-right reveal-up">
                        <div class="section-label">THỦ TỤC ĐĂNG KÝ</div>
                        <h3 class="apply-title">Điều kiện &amp; quy trình<br />4 bước đơn giản</h3>
                        <div class="apply-req">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            <span>Tốt nghiệp <strong>Cử nhân</strong> &amp; có <strong>trình độ tiếng Anh tương đương
                                    IELTS 6.0</strong>
                                (hoặc có thể phỏng vấn đầu vào với đại diện của trường tại Việt Nam)</span>
                        </div>
                        <ol class="apply-steps">
                            <li class="apply-step">
                                <span class="apply-step-num">01</span>
                                <div>
                                    <strong>Tư vấn chương trình</strong>
                                    <p>Gặp chuyên viên tư vấn để xác định lộ trình học phù hợp với bạn.</p>
                                </div>
                            </li>
                            <li class="apply-step">
                                <span class="apply-step-num">02</span>
                                <div>
                                    <strong>Chuẩn bị hồ sơ</strong>
                                    <p>Bằng cử nhân & bảng điểm, Sơ yếu lí lịch (CV), Thư động lực (Motivation Letter),
                                        Ảnh hộ chiếu (4×6), Passport, Admission Form.</p>
                                </div>
                            </li>
                            <li class="apply-step">
                                <span class="apply-step-num">03</span>
                                <div>
                                    <strong>Xét duyệt hồ sơ</strong>
                                    <p>Hội đồng tuyển sinh Swiss UMEF xem xét hồ sơ trong vòng 3–5 ngày làm việc.
                                    </p>
                                </div>
                            </li>
                            <li class="apply-step">
                                <span class="apply-step-num">04</span>
                                <div>
                                    <strong>Thanh toán học phí &amp; nhập học</strong>
                                    <p>Hỗ trợ trả góp 12–24 tháng qua Sacombank. Nhận tài khoản LMS và bắt đầu học.
                                    </p>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- ══════════════════════════════════════════
         SECTION 4B: AI ADVISOR
        ══════════════════════════════════════════ -->
        <section class="ai-advisor-section" id="ai-tu-van"
            style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 40px 0; background-color: #070d19; background-image: radial-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px); background-size: 28px 28px; position: relative; overflow: hidden; border-top: 1px solid rgba(255,255,255,0.05); border-bottom: 1px solid rgba(255,255,255,0.05);">
            <!-- background light effects -->
            <div
                style="position: absolute; width: 400px; height: 400px; background: radial-gradient(circle, rgba(171,14,0,0.15) 0%, transparent 70%); top: -100px; left: -100px; pointer-events: none;">
            </div>
            <div
                style="position: absolute; width: 500px; height: 500px; background: radial-gradient(circle, rgba(59,130,246,0.1) 0%, transparent 70%); bottom: -200px; right: -100px; pointer-events: none;">
            </div>
            <!-- Localized Background Decor -->
            <div class="section-bg-decor">
                <i class="fa-solid fa-robot bg-decor-icon decor-white decor-lg"
                    style="top: 20%; left: 5%; animation-duration: 25s;"></i>
                <i class="fa-solid fa-microchip bg-decor-icon decor-white decor-sm"
                    style="top: 60%; right: 7%; animation-duration: 32s;"></i>
            </div>

            <div class="container"
                style="display: flex; flex-direction: column; align-items: center; justify-content: center; position: relative; z-index: 2;">
                <div style="text-align: center; margin-bottom: 16px;">
                    <span class="section-label"
                        style="margin: 0 auto; display: inline-flex; background: linear-gradient(90deg, #ab0e00, #ff4133); color: #fff;">AI
                        ADVISOR</span>
                </div>
                <h2 class="section-title" style="text-align: center; margin-bottom: 12px; color: #ffffff;">
                    IDEAS AI <span style="color: #ff4133;">- Tư vấn Thạc sĩ MBA</span>
                </h2>
                <p
                    style="text-align: center; color: #94a3b8; max-width: 600px; margin: 0 auto 30px auto; font-size: 0.95rem;">
                    Bấm vào quả cầu năng lượng dưới đây để kích hoạt trợ lý IDEAS AI tư vấn chi tiết về Thạc sĩ MBA cho
                    bạn.</p>

                <!-- AI Orb Button -->
                <div class="ai-orb-btn-wrapper" onclick="triggerAIChat('Thạc sĩ MBA')"
                    style="cursor: pointer; position: relative; width: 320px; height: 320px; display: flex; align-items: center; justify-content: center; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
                    <div class="ai-orb-glow"></div>

                    <!-- Concentric Orbit Rings -->
                    <div class="orb-ring ring-outer"></div>
                    <div class="orb-ring ring-middle"></div>
                    <div class="orb-ring ring-inner"></div>

                    <!-- Converging Light Particles -->
                    <div class="orb-particles">
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                        <div class="particle"></div>
                    </div>

                    <div class="ai-orb-core">
                        <div class="ai-orb-inner-content">
                            <i class="fa-solid fa-robot"></i>
                            <span class="ai-orb-text">IDEAS AI</span>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 24px; text-align: center;">
                    <span
                        style="font-size: 0.85rem; font-weight: 700; color: #ff4133; text-transform: uppercase; letter-spacing: 2px; display: block; margin-bottom: 6px; animation: textPulse 2s infinite;">KÍCH
                        HOẠT TRỢ LÝ AI</span>
                    <div
                        style="font-size: 0.78rem; color: #64748b; display: flex; align-items: center; justify-content: center;">
                        <span
                            style="display:inline-block; width: 8px; height: 8px; background: #10b981; border-radius: 50%; margin-right: 8px; animation: greenPulse 1.5s infinite;"></span>
                        Sẵn sàng kết nối
                    </div>
                </div>
            </div>

            <style>
                .ai-orb-btn-wrapper:hover {
                    transform: scale(1.05);
                }

                .ai-orb-btn-wrapper:hover .ai-orb-glow {
                    opacity: 0.95;
                    filter: blur(22px);
                    background: radial-gradient(circle, rgba(255, 75, 51, 0.95) 0%, rgba(171, 14, 0, 0.75) 50%, transparent 70%);
                }

                .ai-orb-glow {
                    position: absolute;
                    width: 200px;
                    height: 200px;
                    border-radius: 50%;
                    background: radial-gradient(circle, rgba(255, 65, 51, 0.85) 0%, rgba(171, 14, 0, 0.35) 55%, transparent 75%);
                    filter: blur(15px);
                    animation: orbRedGlow 6s infinite ease-in-out;
                    z-index: 1;
                    transition: all 0.4s ease;
                }

                .orb-ring {
                    position: absolute;
                    border-radius: 50%;
                    pointer-events: none;
                    z-index: 1;
                    box-sizing: border-box;
                    transition: all 0.4s ease;
                }

                .ring-outer {
                    width: 260px;
                    height: 260px;
                    border: 1px dashed rgba(255, 65, 51, 0.22);
                    animation: spin-clockwise 70s infinite linear;
                }

                .ring-middle {
                    width: 210px;
                    height: 210px;
                    border: 1.5px dotted rgba(255, 65, 51, 0.28);
                    animation: spin-counter-clockwise 50s infinite linear;
                }

                .ring-inner {
                    width: 175px;
                    height: 175px;
                    border: 1px solid rgba(255, 65, 51, 0.15);
                    box-shadow: 0 0 15px rgba(255, 65, 51, 0.08);
                }

                .ai-orb-btn-wrapper:hover .ring-outer {
                    border-color: rgba(255, 65, 51, 0.45);
                    width: 270px;
                    height: 270px;
                }

                .ai-orb-btn-wrapper:hover .ring-middle {
                    border-color: rgba(255, 65, 51, 0.55);
                    width: 220px;
                    height: 220px;
                }

                .ai-orb-core {
                    position: relative;
                    width: 130px;
                    height: 130px;
                    border-radius: 50%;
                    background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.25), transparent 60%), radial-gradient(circle at 70% 70%, rgba(0, 0, 0, 0.55), transparent 75%), linear-gradient(135deg, #ff4133, #ab0e00);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    box-shadow: 0 12px 35px rgba(255, 65, 51, 0.45), inset 0 -8px 20px rgba(0, 0, 0, 0.55), inset 0 8px 16px rgba(255, 123, 114, 0.35), 0 0 0 8px rgba(255, 65, 51, 0.08);
                    z-index: 2;
                    border: 1.5px solid rgba(255, 65, 51, 0.3);
                    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                }

                .ai-orb-btn-wrapper:hover .ai-orb-core {
                    box-shadow: 0 20px 45px rgba(255, 65, 51, 0.7), inset 0 -12px 24px rgba(0, 0, 0, 0.65), inset 0 12px 24px rgba(255, 123, 114, 0.5), 0 0 0 12px rgba(255, 65, 51, 0.12);
                    border-color: rgba(255, 65, 51, 0.5);
                    width: 135px;
                    height: 135px;
                }

                .ai-orb-inner-content {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    gap: 8px;
                    z-index: 5;
                }

                .ai-orb-inner-content i {
                    font-size: 2.2rem;
                    color: #fff;
                    filter: drop-shadow(0 0 10px rgba(255, 65, 51, 0.8));
                    animation: robotPulse 3s infinite ease-in-out;
                }

                .ai-orb-text {
                    font-family: 'Outfit', 'Inter', monospace;
                    font-size: 0.68rem;
                    font-weight: 800;
                    letter-spacing: 1.5px;
                    color: #ffffff;
                    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3), 0 0 8px rgba(255, 255, 255, 0.4);
                    text-transform: uppercase;
                }

                .orb-particles {
                    position: absolute;
                    width: 320px;
                    height: 320px;
                    pointer-events: none;
                    z-index: 0;
                    animation: particlesRotate 45s infinite linear;
                }

                @keyframes particlesRotate {
                    0% {
                        transform: rotate(0deg);
                    }

                    100% {
                        transform: rotate(360deg);
                    }
                }

                .particle {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    width: 4px;
                    height: 4px;
                    margin-top: -2px;
                    margin-left: -2px;
                    border-radius: 50%;
                    background: #fff5f5;
                    box-shadow: 0 0 6px #ff7b72, 0 0 12px #ff4133, 0 0 20px rgba(255, 65, 51, 0.8);
                    pointer-events: none;
                    opacity: 0;
                }

                .particle:nth-child(1) {
                    animation: spiral-in-1 9.0s infinite linear;
                    animation-delay: 0s;
                }

                .particle:nth-child(2) {
                    animation: spiral-in-2 10.0s infinite linear;
                    animation-delay: 1.0s;
                }

                .particle:nth-child(3) {
                    animation: spiral-in-3 8.4s infinite linear;
                    animation-delay: 2.0s;
                }

                .particle:nth-child(4) {
                    animation: spiral-in-4 9.6s infinite linear;
                    animation-delay: 3.0s;
                }

                .particle:nth-child(5) {
                    animation: spiral-in-1 7.8s infinite linear;
                    animation-delay: 4.0s;
                }

                .particle:nth-child(6) {
                    animation: spiral-in-2 9.2s infinite linear;
                    animation-delay: 5.0s;
                }

                .particle:nth-child(7) {
                    animation: spiral-in-3 10.4s infinite linear;
                    animation-delay: 6.0s;
                }

                .particle:nth-child(8) {
                    animation: spiral-in-4 8.8s infinite linear;
                    animation-delay: 7.0s;
                }

                .particle:nth-child(9) {
                    animation: spiral-in-1 10.8s infinite linear;
                    animation-delay: 0.5s;
                }

                .particle:nth-child(10) {
                    animation: spiral-in-2 8.6s infinite linear;
                    animation-delay: 1.5s;
                }

                .particle:nth-child(11) {
                    animation: spiral-in-3 10.0s infinite linear;
                    animation-delay: 2.5s;
                }

                .particle:nth-child(12) {
                    animation: spiral-in-4 9.0s infinite linear;
                    animation-delay: 3.5s;
                }

                .particle:nth-child(13) {
                    animation: spiral-in-1 9.6s infinite linear;
                    animation-delay: 4.5s;
                }

                .particle:nth-child(14) {
                    animation: spiral-in-2 8.0s infinite linear;
                    animation-delay: 5.5s;
                }

                .particle:nth-child(15) {
                    animation: spiral-in-3 9.2s infinite linear;
                    animation-delay: 6.5s;
                }

                .particle:nth-child(16) {
                    animation: spiral-in-4 10.4s infinite linear;
                    animation-delay: 7.5s;
                }

                @keyframes spiral-in-1 {
                    0% {
                        transform: rotate(0deg) translateY(-160px) scale(1.2);
                        opacity: 0;
                    }

                    12% {
                        opacity: 0.85;
                    }

                    88% {
                        opacity: 0.85;
                    }

                    100% {
                        transform: rotate(360deg) translateY(-30px) scale(0.25);
                        opacity: 0;
                    }
                }

                @keyframes spiral-in-2 {
                    0% {
                        transform: rotate(90deg) translateY(-180px) scale(1.4);
                        opacity: 0;
                    }

                    15% {
                        opacity: 0.95;
                    }

                    85% {
                        opacity: 0.95;
                    }

                    100% {
                        transform: rotate(450deg) translateY(-35px) scale(0.35);
                        opacity: 0;
                    }
                }

                @keyframes spiral-in-3 {
                    0% {
                        transform: rotate(180deg) translateY(-140px) scale(1.0);
                        opacity: 0;
                    }

                    10% {
                        opacity: 0.9;
                    }

                    90% {
                        opacity: 0.9;
                    }

                    100% {
                        transform: rotate(540deg) translateY(-25px) scale(0.2);
                        opacity: 0;
                    }
                }

                @keyframes spiral-in-4 {
                    0% {
                        transform: rotate(270deg) translateY(-170px) scale(1.3);
                        opacity: 0;
                    }

                    14% {
                        opacity: 0.8;
                    }

                    86% {
                        opacity: 0.8;
                    }

                    100% {
                        transform: rotate(630deg) translateY(-30px) scale(0.3);
                        opacity: 0;
                    }
                }

                @keyframes spin-clockwise {
                    0% {
                        transform: rotate(0deg);
                    }

                    100% {
                        transform: rotate(360deg);
                    }
                }

                @keyframes spin-counter-clockwise {
                    0% {
                        transform: rotate(360deg);
                    }

                    100% {
                        transform: rotate(0deg);
                    }
                }

                @keyframes orbRedGlow {

                    0%,
                    100% {
                        transform: scale(0.95);
                        opacity: 0.7;
                        filter: blur(12px);
                    }

                    50% {
                        transform: scale(1.15);
                        opacity: 0.95;
                        filter: blur(20px);
                    }
                }

                @keyframes robotPulse {

                    0%,
                    100% {
                        transform: scale(1);
                        filter: drop-shadow(0 0 8px rgba(255, 65, 51, 0.6));
                    }

                    50% {
                        transform: scale(1.08);
                        filter: drop-shadow(0 0 18px rgba(255, 123, 114, 0.95));
                    }
                }

                @keyframes textPulse {

                    0%,
                    100% {
                        opacity: 0.7;
                    }

                    50% {
                        opacity: 1;
                        text-shadow: 0 0 10px rgba(255, 65, 51, 0.5);
                    }
                }

                @keyframes greenPulse {

                    0%,
                    100% {
                        transform: scale(0.9);
                        opacity: 0.6;
                    }

                    50% {
                        transform: scale(1.25);
                        opacity: 1;
                    }
                }
            </style>
        </section>




        <!-- ══════════════════════════════════════════
         SECTION 4: PROOF
     ══════════════════════════════════════════ -->
        <section class="proof-section" id="chung-minh" aria-labelledby="proof-headline" style="padding-bottom: 60px;">
            <div class="container">
                <div class="section-label reveal-up">UY TÍN &amp; CHỨNG NHẬN</div>
                <h2 class="section-title reveal-up" id="proof-headline">
                    Swiss UMEF: Đại học tư thục đầu tiên tại Geneva<br />
                    <span class="gradient-text">đạt Kiểm định Liên bang cao nhất Thụy Sĩ (SAC)</span>
                </h2>

                <!-- PROOF CARD - Premium 2-col design -->
                <div class="proof-card reveal-up">
                    <!-- Top decorative gradient blob -->
                    <div class="proof-card-blob"></div>

                    <div class="proof-card-inner">
                        <!-- LEFT COLUMN -->
                        <div class="proof-card-left">

                            <!-- Green certification badge -->
                            <div class="proof-cert-badge">
                                <span class="proof-cert-pulse">
                                    <span class="proof-cert-pulse-ring"></span>
                                    <span class="proof-cert-pulse-dot"></span>
                                </span>
                                Công nhận chính thức bởi Hội đồng Giáo dục Thụy Sĩ
                            </div>

                            <!-- Headline -->
                            <h3 class="proof-card-headline">
                                <a href="https://www.swiss-umef.ch/en/partenaires" target="_blank"
                                    rel="noopener noreferrer" class="proof-qs-logo-link"
                                    title="Swiss UMEF Partnership Verification">
                                    <img width="120" loading="eager" decoding="async"
                                        src="https://ideas.edu.vn/wp-content/uploads/2026/06/swissumef_logo.png"
                                        alt="Swiss UMEF logo" class="proof-qs-logo" />
                                </a>
                                <span class="proof-card-headline-text">
                                    Đại học đầu tiên tại Geneva<br />
                                    <span class="proof-headline-accent">đạt Kiểm định Liên bang SAC</span>
                                </span>
                            </h3>

                            <!-- Quote -->
                            <p class="proof-card-quote">
                                Swiss UMEF là Đại học tư thục đầu tiên tại Geneva đạt Kiểm định Liên bang cao nhất Thụy
                                Sĩ (SAC) - công nhận chính thức vị thế đào tạo chuẩn quốc gia Thụy Sĩ.
                            </p>

                            <!-- Checklist -->
                            <ul class="proof-card-checklist">
                                <li class="proof-check-item">
                                    <span class="proof-check-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <path d="M5 13l4 4L19 7" />
                                        </svg>
                                    </span>
                                    <p>Bằng <strong>MBA </strong>, tương xứng với nhà quản lý và lãnh đạo cấp
                                        trung đến cao cấp.</p>
                                </li>
                                <li class="proof-check-item">
                                    <span class="proof-check-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <path d="M5 13l4 4L19 7" />
                                        </svg>
                                    </span>
                                    <p>Có giá trị <strong>học thuật và pháp lý quốc tế.</strong></p>
                                </li>
                                <li class="proof-check-item">
                                    <span class="proof-check-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <path d="M5 13l4 4L19 7" />
                                        </svg>
                                    </span>
                                    <p>Được công nhận tại các <strong>tổ chức và tập đoàn đa quốc gia.</strong></p>
                                </li>
                                <li class="proof-check-item">
                                    <span class="proof-check-icon">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <path d="M5 13l4 4L19 7" />
                                        </svg>
                                    </span>
                                    <p>Đã được chứng nhận <strong>hợp pháp hóa lãnh sự.</strong></p>
                                </li>
                            </ul>
                        </div>

                        <!-- RIGHT COLUMN - Degree image -->
                        <div class="proof-card-right">
                            <div class="proof-degree-wrap">
                                <div class="proof-degree-glow"></div>
                                <div class="proof-degree-frame">
                                    <img decoding="async"
                                        src="https://ideas.edu.vn/wp-content/uploads/2025/11/z7191978013846_36a81ec39301d05fedaf6d4cd0293f9c-1.webp"
                                        alt="Mẫu bằng MBA Swiss UMEF" loading="lazy" class="proof-degree-img" />
                                    <div class="proof-degree-shimmer"></div>
                                </div>
                                <div class="proof-degree-badge">Bản mẫu văn bằng chính thức</div>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom: Accreditation logos strip (Restored & Integrated) -->
                    <div class="proof-accred-strip">
                        <p class="proof-accred-label">Công nhận & kiểm định</p>
                        <div class="proof-accred-logos">
                            <img width="120" loading="eager" decoding="async"
                                src="https://ideas.edu.vn/wp-content/new_public/data_imgs/kdumef1.png"
                                alt="Swiss Accreditation" class="accred-trigger" data-accred="sac" height="40" />
                            <img width="90" loading="eager" decoding="async"
                                src="https://ideas.edu.vn/wp-content/new_public/data_imgs/kdumef5.png" alt="CHEA"
                                class="accred-trigger" data-accred="chea" height="40" />
                            <img width="130" loading="eager" decoding="async"
                                src="https://ideas.edu.vn/wp-content/new_public/data_imgs/kdumef4.png" alt="IACBE"
                                class="accred-trigger" data-accred="iacbe" height="40" />
                            <img width="100" loading="eager" decoding="async"
                                src="https://ideas.edu.vn/wp-content/new_public/data_imgs/kdumef2.png" alt="ACBSP"
                                class="accred-trigger" data-accred="acbsp" height="40" />
                            <img width="80" loading="eager" decoding="async"
                                src="https://ideas.edu.vn/wp-content/new_public/data_imgs/kdumef3.png" alt="Eduqua"
                                class="accred-trigger" data-accred="eduqua" height="40" />
                            <img width="40" loading="eager" decoding="async"
                                src="https://ideas.edu.vn/wp-content/uploads/2025/10/qs-1.webp" alt="QS Stars"
                                class="accred-trigger" data-accred="qs" height="40" />

                        </div>
                    </div>

                    <!-- Toggle Button for Accreditation -->
                    <div style="text-align: center; margin-top: 24px; margin-bottom: 24px;">
                        <button id="accred-toggle-btn" class="toggle-pill-btn" onclick="toggleAccredSection()">
                            <span id="accred-toggle-btn-text">Các kiểm định Quốc tế</span>
                            <span class="toggle-pill-icon-container">
                                <svg id="accred-toggle-btn-icon" width="12" height="12" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="3">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </span>
                        </button>
                    </div>

                    <div id="accred-expandable-content" class="accred-expandable">
                        <div class="proof-card-accred">
                            <div class="accred-feature-content">
                                <img decoding="async"
                                    src="https://ideas.edu.vn/wp-content/uploads/2026/06/swissumef_logo.png"
                                    alt="Swiss UMEF Logo" class="accred-school-logo" width="160"
                                    style="margin-bottom: 20px;" loading="lazy">
                                <h2 class="section-title" style="font-size: 1.8rem;">Hệ thống <em>Kiểm định &amp; Công
                                        nhận</em>
                                    quốc tế</h2>
                                <ul class="accred-feature-list">
                                    <li>
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        Swiss Accreditation Council
                                    </li>
                                    <li>
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        QS Stars 5 Stars Overall
                                    </li>

                                    <li>
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        SGS – EduQua
                                    </li>
                                    <li>
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        Accreditation Council for Business Schools &amp; Programs
                                    </li>
                                    <li>
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        International Accreditation Council for Business Education
                                    </li>
                                </ul>
                                <div class="accred-commitment">
                                    <strong>IDEAS cam kết:</strong>
                                    Tất cả trường và chương trình đối tác đều đã được kiểm định – chứng nhận đầy đủ. Học
                                    viên
                                    hoàn
                                    toàn yên tâm về tính hợp pháp, giá trị bằng cấp và uy tín quốc tế.
                                </div>
                            </div>
                            <div class="accred-fan-wrap">
                                <div class="accred-stack" id="accred-stack" title="Click để lật xem các chứng chỉ">

                                    <div class="accred-stack-card pos-3">
                                        <img decoding="async"
                                            src="https://ideas.edu.vn/wp-content/uploads/2026/06/sac.webp"
                                            alt="SAC Certificate" loading="lazy">
                                    </div>
                                    <div class="accred-stack-card pos-2">
                                        <img decoding="async"
                                            src="https://ideas.edu.vn/wp-content/uploads/2026/06/sgs.webp"
                                            alt="SGS Certificate" loading="lazy">
                                    </div>
                                    <div class="accred-stack-card pos-1">
                                        <img decoding="async"
                                            src="https://ideas.edu.vn/wp-content/uploads/2025/10/QSStarsCertificateSwissUMEF-1-1-1-1.webp"
                                            alt="QS Stars Certificate" loading="lazy">
                                    </div>
                                </div>
                                <div class="accred-stack-controls">
                                    <button class="accred-step-btn" id="accred-prev" aria-label="Previous">❮</button>
                                    <button class="accred-step-btn" id="accred-next" aria-label="Next">❯</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>

        <!-- Styling for Swiss UMEF News & Videos -->
        <style>
            :root {
                --umef-primary: var(--clr-primary, #ab0e00);
                --umef-primary-hover: var(--clr-primary-d, #8c1000);
            }

            .umef-section {
                padding: 130px 20px 100px !important;
                position: relative;
                overflow: hidden;
                font-family: 'Outfit', 'Inter', sans-serif;
            }

            .umef-section *,
            .umef-section *::before,
            .umef-section *::after {
                box-sizing: border-box;
            }

            .umef-section .section-header {
                text-align: center;
                max-width: 800px;
                margin: 0 auto 60px;
            }

            .umef-section .section-badge {
                font-size: 0.8rem;
                font-weight: 800;
                color: var(--umef-primary);
                letter-spacing: 2px;
                text-transform: uppercase;
                margin-bottom: 12px;
                display: inline-block;
            }

            .umef-section .section-title {
                font-size: clamp(2rem, 4.5vw, 2.8rem);
                font-weight: 850;
                line-height: 1.25;
                color: #0f172a;
                margin-bottom: 16px;
            }

            .umef-section .section-title span {
                background: linear-gradient(135deg, var(--umef-primary) 0%, var(--umef-primary-hover) 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                color: var(--umef-primary) !important;
                display: inline-block;
            }

            .umef-section .section-subtitle {
                font-size: 1.05rem;
                color: #475569;
                line-height: 1.6;
            }

            /* ── News & Prestige Section ── */
            .umef-news-section {
                background: linear-gradient(180deg, #f0f4f8 0%, #f8fafc 60%, #fdfdfd 100%);
                position: relative;
            }

            .umef_news_layout {
                display: grid;
                grid-template-columns: 1.15fr 1fr;
                grid-template-rows: auto auto;
                gap: 28px;
                max-width: 1200px;
                margin: 0 auto;
                align-items: stretch;
            }

            .umef_news_card_featured {
                background: #ffffff;
                border: 1px solid rgba(15, 23, 42, 0.07);
                border-radius: 28px;
                overflow: hidden;
                text-decoration: none;
                color: inherit;
                display: flex;
                flex-direction: column;
                transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
                box-shadow: 0 12px 36px rgba(15, 23, 42, 0.04);
                position: relative;
                grid-column: 1;
                grid-row: 1 / 3;
            }

            .umef_news_card_featured:hover {
                transform: translateY(-6px);
                border-color: rgba(171, 14, 0, 0.22);
                box-shadow: 0 24px 50px rgba(171, 14, 0, 0.08);
            }

            .umef_news_card_featured .umef_news_card_img {
                position: relative;
                aspect-ratio: 16 / 10;
                overflow: hidden;
                background: #f1f5f9;
                flex-shrink: 0;
            }

            .umef_news_card_featured .umef_news_card_img::after {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(180deg, transparent 45%, rgba(10, 15, 30, 0.55) 100%);
                pointer-events: none;
            }

            .umef_news_card_featured .umef_news_card_img img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.7s ease;
            }

            .umef_news_card_featured:hover .umef_news_card_img img {
                transform: scale(1.05);
            }

            .umef_news_featured_badge {
                position: absolute;
                top: 18px;
                left: 20px;
                z-index: 3;
                display: inline-flex;
                align-items: center;
                gap: 6px;
                background: var(--umef-primary);
                color: #fff;
                font-size: 0.7rem;
                font-weight: 800;
                padding: 5px 13px;
                border-radius: 100px;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                box-shadow: 0 4px 12px rgba(171, 14, 0, 0.3);
            }

            .umef_news_card_featured .umef_news_card_body {
                padding: 30px 32px;
                display: flex;
                flex-direction: column;
                gap: 12px;
                flex-grow: 1;
            }

            .umef_news_card_featured .umef_news_card_title {
                font-size: 1.4rem;
                font-weight: 800;
                color: #0f172a;
                line-height: 1.35;
                transition: color 0.3s ease;
                margin: 0;
            }

            .umef_news_card_featured:hover .umef_news_card_title {
                color: var(--umef-primary);
            }

            .umef_news_card {
                background: #ffffff;
                border: 1px solid rgba(15, 23, 42, 0.07);
                border-radius: 20px;
                overflow: hidden;
                text-decoration: none;
                color: inherit;
                display: flex;
                flex-direction: row;
                gap: 0;
                transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
                box-shadow: 0 6px 20px rgba(15, 23, 42, 0.03);
                position: relative;
                align-items: stretch;
            }

            .umef_news_card:hover {
                transform: translateY(-5px);
                border-color: rgba(171, 14, 0, 0.2);
                box-shadow: 0 16px 36px rgba(171, 14, 0, 0.07);
            }

            .umef_news_card.umef_news_card--vertical {
                flex-direction: column;
            }

            .umef_news_card .umef_news_card_img {
                width: 130px;
                min-width: 130px;
                flex-shrink: 0;
                overflow: hidden;
                background: #f1f5f9;
                position: relative;
            }

            .umef_news_card .umef_news_card_img.umef_news_card_img--sm {
                width: 100%;
                min-width: unset;
                height: 160px;
                flex-shrink: 0;
            }

            .umef_news_card .umef_news_card_img img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s ease;
            }

            .umef_news_card:hover .umef_news_card_img img {
                transform: scale(1.08);
            }

            .umef_news_card .umef_news_card_body {
                padding: 18px 22px;
                display: flex;
                flex-direction: column;
                gap: 8px;
                flex-grow: 1;
                justify-content: flex-start;
            }

            .umef_news_card_tag {
                align-self: flex-start;
                display: inline-flex;
                align-items: center;
                gap: 6px;
                background: rgba(171, 14, 0, 0.07);
                border: 1px solid rgba(171, 14, 0, 0.14);
                color: var(--umef-primary);
                font-size: 0.72rem;
                font-weight: 750;
                padding: 4px 11px;
                border-radius: 100px;
                text-transform: uppercase;
                letter-spacing: 0.05em;
            }

            .umef_news_card_body b,
            .umef_news_card_title {
                font-size: 0.98rem;
                font-weight: 750;
                color: #0f172a;
                line-height: 1.42;
                transition: color 0.3s ease;
                display: block;
            }

            .umef_news_card:hover b,
            .umef_news_card:hover .umef_news_card_title {
                color: var(--umef-primary);
            }

            .umef_news_card_body span {
                font-size: 0.85rem;
                color: #64748b;
                line-height: 1.55;
            }

            .umef_news_card_meta {
                display: flex;
                align-items: center;
                gap: 6px;
                font-size: 0.78rem;
                color: #94a3b8;
                margin-top: 4px;
            }

            .umef_news_card_meta i {
                font-size: 0.7rem;
            }

            .umef_news_card_read {
                margin-top: auto;
                color: var(--umef-primary);
                font-size: 0.85rem;
                font-weight: 700;
                display: inline-flex;
                align-items: center;
                gap: 6px;
                transition: gap 0.2s ease;
                padding-top: 6px;
            }

            .umef_news_card_featured:hover .umef_news_card_read,
            .umef_news_card:hover .umef_news_card_read {
                gap: 10px;
            }

            @media (max-width: 992px) {
                .umef_news_layout {
                    grid-template-columns: 1fr;
                    gap: 24px;
                }

                .umef_news_card_featured .umef_news_card_img {
                    aspect-ratio: 16 / 8;
                }
            }

            /* Slider Dots */
            .umef-slider-dots {
                display: none;
                justify-content: center;
                gap: 8px;
                margin-top: 24px;
                padding-bottom: 10px;
            }

            .umef-slider-dots .dot {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: rgba(15, 23, 42, 0.2);
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                cursor: pointer;
            }

            .umef-slider-dots .dot.active {
                background: var(--umef-primary);
                width: 24px;
                border-radius: 4px;
            }

            .umef-videos-section .umef-slider-dots {
                margin-top: 32px;
            }

            .umef-videos-section .umef-slider-dots .dot {
                background: rgba(255, 255, 255, 0.25);
            }

            .umef-videos-section .umef-slider-dots .dot.active {
                background: #ff8a8a;
            }

            @media (max-width: 768px) {
                .umef-slider-dots.news-dots {
                    display: flex;
                }

                .umef_news_layout {
                    display: flex !important;
                    flex-direction: row !important;
                    overflow-x: auto !important;
                    scroll-snap-type: x mandatory !important;
                    scroll-behavior: smooth !important;
                    -webkit-overflow-scrolling: touch !important;
                    gap: 16px !important;
                    padding: 10px 0 20px !important;
                }

                .umef_news_layout::-webkit-scrollbar {
                    display: none !important;
                }

                .umef_news_card_featured {
                    flex: 0 0 calc(100% - 20px) !important;
                    width: calc(100% - 20px) !important;
                    margin: 0 !important;
                    scroll-snap-align: start !important;
                }

                .umef_news_card {
                    flex: 0 0 calc(100% - 20px) !important;
                    width: calc(100% - 20px) !important;
                    margin: 0 !important;
                    scroll-snap-align: start !important;
                    flex-direction: column !important;
                }

                .umef_news_card .umef_news_card_img {
                    width: 100% !important;
                    min-width: unset !important;
                    height: 180px !important;
                }

                .umef-section {
                    padding: 90px 20px 60px !important;
                }
            }

            /* ── YouTube Videos Section (Dark) ── */
            .umef-videos-section {
                background: #040508;
                position: relative;
                overflow: hidden;
            }

            .umef-videos-section::before {
                content: '';
                position: absolute;
                inset: 0;
                background:
                    radial-gradient(ellipse at 20% 30%, rgba(217, 38, 38, 0.12) 0%, transparent 55%),
                    radial-gradient(ellipse at 80% 70%, rgba(217, 38, 38, 0.08) 0%, transparent 50%);
                pointer-events: none;
            }

            .umef-videos-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 24px;
                max-width: 1100px;
                margin: 0 auto;
                position: relative;
                z-index: 1;
            }

            .umef-video-card {
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid rgba(255, 255, 255, 0.07);
                border-radius: 20px;
                overflow: hidden;
                transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
                display: flex;
                flex-direction: column;
                backdrop-filter: blur(12px);
            }

            .umef-video-card:hover {
                transform: translateY(-6px);
                border-color: rgba(217, 38, 38, 0.35);
                background: rgba(255, 255, 255, 0.05);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(217, 38, 38, 0.2);
            }

            .umef-video-wrapper {
                position: relative;
                width: 100%;
                aspect-ratio: 16 / 9;
                overflow: hidden;
                background: #000;
                border-radius: 0;
            }

            .umef-video-wrapper iframe {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                border: 0;
            }

            .umef-video-body {
                padding: 20px 22px;
                display: flex;
                flex-direction: column;
                gap: 8px;
                flex-grow: 1;
            }

            .umef-video-tag {
                align-self: flex-start;
                display: inline-flex;
                align-items: center;
                gap: 6px;
                background: rgba(217, 38, 38, 0.15);
                border: 1px solid rgba(217, 38, 38, 0.3);
                color: #ff9e9e;
                font-size: 0.72rem;
                font-weight: 700;
                padding: 3px 11px;
                border-radius: 100px;
                text-transform: uppercase;
                letter-spacing: 0.06em;
            }

            .umef-video-title {
                font-size: 1rem;
                font-weight: 700;
                color: #f1f5f9;
                line-height: 1.4;
                margin: 0;
                transition: color 0.3s ease;
            }

            .umef-video-card:hover .umef-video-title {
                color: #ff8a8a;
            }

            .umef-video-desc {
                font-size: 0.85rem;
                color: #94a3b8;
                line-height: 1.55;
                margin: 0;
            }

            @media (max-width: 992px) {
                .umef-slider-dots.video-dots {
                    display: flex;
                }

                .umef-videos-grid {
                    display: flex !important;
                    flex-direction: row !important;
                    overflow-x: auto !important;
                    scroll-snap-type: x mandatory !important;
                    scroll-behavior: smooth !important;
                    -webkit-overflow-scrolling: touch !important;
                    gap: 16px !important;
                    padding: 10px 0 20px !important;
                    max-width: 100% !important;
                }

                .umef-videos-grid::-webkit-scrollbar {
                    display: none !important;
                }

                .umef-video-card {
                    scroll-snap-align: start !important;
                    flex: 0 0 calc(100% - 20px) !important;
                    width: calc(100% - 20px) !important;
                }
            }
        
            /* ── UMEF Videos Slider (3D Carousel Loop) ── */
            .umef-video-carousel-container {
                position: relative;
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 2;
            }

            .umef-video-carousel-track-wrapper {
                overflow: hidden;
                width: 100%;
                padding: 30px 0 50px 0;
                margin-bottom: -30px;
            }

            .umef-video-carousel-track {
                display: flex;
                transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
                gap: 30px;
                will-change: transform;
            }

            .umef-video-carousel-slide {
                flex: 0 0 calc(33.333% - 20px) !important;
                transition: all 0.6s cubic-bezier(0.25, 1, 0.5, 1) !important;
                opacity: 0.45 !important;
                transform: scale(0.9) !important;
                cursor: pointer !important;
                width: auto !important;
                scroll-snap-align: none !important;
            }

            .umef-video-carousel-slide.active {
                opacity: 1 !important;
                transform: scale(1.04) !important;
                z-index: 10 !important;
            }

            @media (max-width: 992px) {
                .umef-video-carousel-slide {
                    flex: 0 0 calc(50% - 15px) !important;
                }
            }

            @media (max-width: 600px) {
                .umef-video-carousel-slide {
                    flex: 0 0 100% !important;
                }
            }

            /* Video Carousel Buttons */
            .umef-video-carousel-btn {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                background: rgba(255, 255, 255, 0.08);
                border: 1px solid rgba(255, 255, 255, 0.15);
                width: 48px;
                height: 48px;
                border-radius: 50%;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
                transition: all 0.3s ease;
                color: #ffffff;
                z-index: 15;
            }

            .umef-video-carousel-btn:hover {
                background: var(--umef-primary, #ab0e00);
                color: #ffffff;
                border-color: var(--umef-primary, #ab0e00);
                box-shadow: 0 4px 16px rgba(171, 14, 0, 0.4);
            }

            .umef-video-carousel-btn.prev {
                left: -10px;
            }

            .umef-video-carousel-btn.next {
                right: -10px;
            }

            /* Video Carousel Dots */
            .umef-video-carousel-dots {
                display: flex;
                justify-content: center;
                gap: 8px;
                margin-top: 24px;
                position: relative;
                z-index: 3;
            }

            .umef-video-dot {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.25);
                border: none;
                cursor: pointer;
                padding: 0;
                transition: all 0.3s ease;
            }

            .umef-video-dot.active {
                background: var(--umef-primary, #ab0e00);
                width: 24px;
                border-radius: 5px;
            }
</style>
        <!-- Swiss UMEF News & Prestige Section -->
        <section class="umef-section umef-news-section" id="tin-tuc-su-kien">
        <!-- Localized Background Decor -->
        <div class="section-bg-decor">
            <i class="fa-solid fa-newspaper bg-decor-icon decor-lg" style="top: 25%; left: 6%; animation-duration: 32s;"></i>
            <i class="fa-solid fa-handshake bg-decor-icon decor-md" style="top: 65%; right: 7%; animation-duration: 24s;"></i>
        </div>
            <div class="section-header">
                <span class="section-badge">TIN TỨC &amp; SỰ KIỆN NỔI BẬT</span>
                <h2 class="section-title"><span>Khẳng định vị thế</span> và uy tín đối ngoại</h2>
                <p class="section-subtitle">Minh chứng cho mối quan hệ hợp tác chiến lược bền chặt và sự công nhận từ
                    các cơ
                    quan ban ngành cấp cao của Việt Nam và Thụy Sĩ.</p>
            </div>

            <div class="umef_news_layout">
                <!-- Featured card (left, large) — Phái đoàn Bộ Tài Chính -->
                <a class="umef_news_card_featured" href="https://www.facebook.com/share/p/1CHpxdmHUS/" target="_blank"
                    rel="noopener nofollow external noreferrer" data-wpel-link="external">
                    <div class="umef_news_card_img">
                        <span class="umef_news_featured_badge"><i class="fa-solid fa-star"></i> Nổi bật</span>
                        <img loading="lazy" decoding="async"
                            src="https://ideas.edu.vn/wp-content/uploads/2025/08/btc_umef.webp"
                            alt="Phái đoàn Bộ Tài Chính Việt Nam ghé thăm Swiss UMEF tại Geneva">
                    </div>
                    <div class="umef_news_card_body">
                        <div class="umef_news_card_tag"><i class="fa-solid fa-newspaper"></i> Tin tức đối ngoại</div>
                        <h3 class="umef_news_card_title">Phái đoàn Bộ Tài Chính Việt Nam chính thức ghé thăm &amp; làm
                            việc
                            tại Swiss UMEF, Geneva</h3>
                        <span>Ngày 30/07/2025, Swiss UMEF vinh dự đón tiếp phái đoàn từ Bộ Tài Chính Việt Nam đến thăm
                            và
                            làm việc tại trụ sở Geneva, khẳng định mối quan hệ hợp tác chiến lược giữa hai nước.</span>
                        <div class="umef_news_card_meta">
                            <i class="fa-regular fa-calendar"></i>
                            <span>30/07/2025</span>
                            <span style="margin: 0 4px;">·</span>
                            <i class="fa-brands fa-facebook"></i>
                            <span>Facebook</span>
                        </div>
                        <div class="umef_news_card_read">Đọc bài viết <i class="fa-solid fa-arrow-right"></i></div>
                    </div>
                </a>

                <!-- Card 1: Swiss UMEF cam kết -->
                <a class="umef_news_card umef_news_card--vertical"
                    href="https://ideas.edu.vn/tin-tuc-moi/swiss-umef-cam-ket-dong-hanh-cung-hoc-vien-viet-nam-trong-cong-cuoc-phat-trien-nguon-nhan-luc-chat-luong-cao.html"
                    target="_blank" data-wpel-link="internal">
                    <div class="umef_news_card_img umef_news_card_img--sm">
                        <img loading="lazy" decoding="async"
                            src="https://ideas.edu.vn/wp-content/uploads/2024/10/NHP_3982-1.jpg"
                            alt="Swiss UMEF cam kết đồng hành cùng học viên Việt Nam">
                    </div>
                    <div class="umef_news_card_body">
                        <div class="umef_news_card_tag"><i class="fa-solid fa-graduation-cap"></i> Cam kết giáo dục
                        </div>
                        <b>Swiss UMEF cam kết đồng hành cùng học viên Việt Nam phát triển nguồn nhân lực chất lượng
                            cao</b>
                        <div class="umef_news_card_meta">
                            <i class="fa-regular fa-calendar"></i>
                            <span>10/2024</span>
                            <span style="margin: 0 4px;">·</span>
                            <i class="fa-solid fa-link"></i>
                            <span>ideas.edu.vn</span>
                        </div>
                        <div class="umef_news_card_read">Xem thêm <i class="fa-solid fa-arrow-right"></i></div>
                    </div>
                </a>

                <!-- Card 2: Chủ tịch Quốc hội -->
                <a class="umef_news_card umef_news_card--vertical"
                    href="https://ideas.edu.vn/tin-tuc-moi/toa-dam-xay-dung-va-van-hanh-trung-tam-tai-chinh-quoc-te-mo-ra-co-hoi-nghe-nghiep-voi-bang-cap-chuan-thuy-si.html"
                    target="_blank" data-wpel-link="internal">
                    <div class="umef_news_card_img umef_news_card_img--sm">
                        <img loading="lazy" decoding="async"
                            src="https://ideas.edu.vn/wp-content/uploads/2026/06/ctqh.webp"
                            alt="Chủ tịch Quốc hội Trần Thanh Mẫn dự Tọa đàm">
                    </div>
                    <div class="umef_news_card_body">
                        <div class="umef_news_card_tag"><i class="fa-solid fa-calendar-check"></i> Sự kiện đặc biệt
                        </div>
                        <b>Chủ tịch Quốc hội Trần Thanh Mẫn dự Tọa đàm Xây dựng Trung tâm Tài chính Quốc tế</b>
                        <div class="umef_news_card_meta">
                            <i class="fa-regular fa-calendar"></i>
                            <span>28/07/2025</span>
                            <span style="margin: 0 4px;">·</span>
                            <i class="fa-solid fa-link"></i>
                            <span>ideas.edu.vn</span>
                        </div>
                        <div class="umef_news_card_read">Xem thêm <i class="fa-solid fa-arrow-right"></i></div>
                    </div>
                </a>
            </div>

            <!-- Slider Dots for Mobile -->
            <div class="umef-slider-dots news-dots">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </section>

        <!-- Swiss UMEF Combined Videos Section -->
        <section class="umef-section umef-videos-section">
        <!-- Localized Background Decor -->
        <div class="section-bg-decor">
            <i class="fa-solid fa-circle-play bg-decor-icon decor-white decor-lg" style="top: 25%; left: 8%; animation-duration: 30s;"></i>
            <i class="fa-solid fa-comments bg-decor-icon decor-white decor-md" style="top: 60%; right: 9%; animation-duration: 26s;"></i>
        </div>
            <div class="section-header">
                <span class="section-badge" style="color:#ff9e9e;">CHIA SẺ &amp; GÓC NHÌN</span>
                <h2 class="section-title" style="color:#ffffff;">Lắng nghe chia sẻ về <span>Swiss UMEF</span></h2>
                <p class="section-subtitle" style="color:#94a3b8;">Góc nhìn đa chiều từ các Giáo sư Thụy Sĩ và hành
                    trình học tập thực tế từ các
                    học viên của trường đồng hành cùng IDEAS.</p>
            </div>

            <div class="umef-video-carousel-container">
            <button class="umef-video-carousel-btn prev" aria-label="Previous slide">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <div class="umef-video-carousel-track-wrapper">
                <div class="umef-video-carousel-track">
                    <!-- Video 1 -->
                <div class="umef-video-card umef-video-carousel-slide">
                    <div class="umef-video-wrapper">
                        <iframe src="https://www.youtube.com/embed/sqp1OsXihSg"
                            title="IDEAS - UMEF: Switzerland and Vietnam partnership Potential benefits and future expectations"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                    <div class="umef-video-body">
                        <span class="umef-video-tag"><i class="fa-solid fa-handshake"></i> Hợp Tác Chiến Lược</span>
                        <h3 class="umef-video-title">IDEAS - UMEF: Switzerland and Vietnam partnership</h3>
                        <p class="umef-video-desc">Potential benefits and future expectations – Đánh giá từ Giáo sư về
                            tiềm
                            năng hợp tác giáo dục bền vững giữa Thụy Sĩ và Việt Nam cùng những kỳ vọng phát triển trong
                            tương lai.</p>
                    </div>
                </div>

                <!-- Video 2 -->
                <div class="umef-video-card umef-video-carousel-slide">
                    <div class="umef-video-wrapper">
                        <iframe src="https://www.youtube.com/embed/iacdK2Lx1X4"
                            title="IDEAS - UMEF: In cooperation with IDEAS, what value do you hope to bring to Vietnamese students?"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                    <div class="umef-video-body">
                        <span class="umef-video-tag"><i class="fa-solid fa-graduation-cap"></i> Giá Trị Học Viên</span>
                        <h3 class="umef-video-title">IDEAS - UMEF: Value for Vietnamese Students</h3>
                        <p class="umef-video-desc">In cooperation with IDEAS, what value do you hope to bring to
                            Vietnamese
                            students? – Giáo sư chia sẻ về các giá trị học thuật thực tiễn và cơ hội thăng tiến sự
                            nghiệp
                            cho học viên.</p>
                    </div>
                </div>

                <!-- Video 3: Student Chu Hoàng Thái -->
                <div class="umef-video-card umef-video-carousel-slide">
                    <div class="umef-video-wrapper">
                        <iframe src="https://www.youtube.com/embed/uahEcE84M2s"
                            title="Lắng nghe học viên chia sẻ | Chu Hoàng Thái - Executive MBA Swiss UMEF"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                    <div class="umef-video-body">
                        <span class="umef-video-tag"><i class="fa-solid fa-graduation-cap"></i> Học Viên Executive
                            MBA</span>
                        <h3 class="umef-video-title">Chu Hoàng Thái - Executive MBA Swiss UMEF</h3>
                        <p class="umef-video-desc">Lắng nghe những chia sẻ thực tế từ học viên Chu Hoàng Thái về hành
                            trình
                            học tập chương trình Thạc sĩ điều hành tại Swiss UMEF.</p>
                    </div>
                </div>

                <!-- Video 4: Student Lê Ngọc Thương -->
                <div class="umef-video-card umef-video-carousel-slide">
                    <div class="umef-video-wrapper">
                        <iframe src="https://www.youtube.com/embed/z8PpCgGmBs8"
                            title="Lắng nghe học viên chia sẻ | Lê Ngọc Thương - Executive MBA Swiss UMEF 2024"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                    <div class="umef-video-body">
                        <span class="umef-video-tag"><i class="fa-solid fa-graduation-cap"></i> Học Viên Executive
                            MBA</span>
                        <h3 class="umef-video-title">Lê Ngọc Thương - Executive MBA Swiss UMEF 2024</h3>
                        <p class="umef-video-desc">Chia sẻ của học viên Lê Ngọc Thương về giá trị thực tiễn, tính linh
                            hoạt
                            và sự đồng hành đắc lực từ đội ngũ học vụ IDEAS.</p>
                    </div>
                </div>
                </div>
            </div>
            <button class="umef-video-carousel-btn next" aria-label="Next slide">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
        <div class="umef-video-carousel-dots"></div>
        
        </section>
                    <!-- Slider Script -->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    function initSlider(sliderSelector, dotsSelector) {
                        const slider = document.querySelector(sliderSelector);
                        const dotsContainer = document.querySelector(dotsSelector);
                        if (!slider || !dotsContainer) return;
                        
                        const dots = dotsContainer.querySelectorAll('.dot');
                        const cards = slider.children;
                        if (cards.length === 0) return;
                        
                        let isScrolling;
                        slider.addEventListener('scroll', () => {
                            window.clearTimeout(isScrolling);
                            isScrolling = setTimeout(() => {
                                const scrollLeft = slider.scrollLeft;
                                let activeIndex = 0;
                                let minDiff = Infinity;
                                for (let i = 0; i < cards.length; i++) {
                                    const cardLeft = cards[i].offsetLeft - slider.offsetLeft;
                                    const diff = Math.abs(cardLeft - scrollLeft);
                                    if (diff < minDiff) {
                                        minDiff = diff;
                                        activeIndex = i;
                                    }
                                }
                                dots.forEach((dot, idx) => {
                                    dot.classList.toggle('active', idx === activeIndex);
                                });
                            }, 50);
                        });
                        
                        dots.forEach((dot, idx) => {
                            dot.addEventListener('click', () => {
                                const targetCard = cards[idx];
                                if (!targetCard) return;
                                const targetScrollLeft = targetCard.offsetLeft - slider.offsetLeft;
                                slider.scrollTo({
                                    left: targetScrollLeft,
                                    behavior: 'smooth'
                                });
                            });
                        });
                    }
                    
                    initSlider('.umef_news_layout', '.news-dots');
                    
                });
            </script>




        <!-- ══════════════════════════════════════════

         SECTION: GRADUATION GALLERY
     ══════════════════════════════════════════ -->
        <section class="gallery-section" id="hinh-anh" aria-labelledby="gallery-headline">
            <div class="container">
                <div class="gallery-header-wrap reveal-up">
                    <div class="gallery-header-left">
                        <div class="section-label">HÀNH TRÌNH HỌC TẬP</div>
                        <h2 class="section-title" style="margin-top: 10px; margin-bottom: 16px;" id="gallery-headline">
                            Hơn 2571 học viên đã tốt nghiệp<br />
                            <span class="gradient-text">MBA Swiss UMEF tại Việt Nam</span>
                        </h2>
                        <p class="gallery-subtitle" style="margin-bottom: 0;">Những <em>khoảnh khắc đáng nhớ</em> trong
                            hành trình chinh
                            phục
                            <br /> bằng <strong>MBA Thụy Sĩ</strong> của học viên <strong>IDEAS</strong>
                        </p>
                    </div>
                    <div class="gallery-header-right">
                        <button class="ceremony-card-btn swiss-btn" onclick="openTourModal()">
                            <svg class="flag-icon" width="18" height="18" viewBox="0 0 18 18">
                                <circle cx="9" cy="9" r="9" fill="#d52b1e" />
                                <rect x="7.5" y="4" width="3" height="10" fill="#ffffff" />
                                <rect x="4" y="7.5" width="10" height="3" fill="#ffffff" />
                            </svg>
                            <div class="btn-text">
                                <span class="label">Lễ Tốt Nghiệp</span>
                                <span class="title">Thụy Sĩ</span>
                            </div>
                        </button>
                        <button class="ceremony-card-btn vn-btn" onclick="openVNCeremonyModal()">
                            <svg class="flag-icon" width="18" height="18" viewBox="0 0 18 18">
                                <circle cx="9" cy="9" r="9" fill="#da251d" />
                                <polygon
                                    points="9,4.5 9.9,7.5 13,7.5 10.5,9.3 11.4,12.3 9,10.5 6.6,12.3 7.5,9.3 5,7.5 8.1,7.5"
                                    fill="#ffff00" />
                            </svg>
                            <div class="btn-text">
                                <span class="label">Lễ Tốt Nghiệp</span>
                                <span class="title">Tại Việt Nam</span>
                            </div>
                        </button>
                    </div>
                </div>

                <div class="gallery-mosaic reveal-up" aria-label="Hình ảnh học viên tốt nghiệp MBA">
                    <div class="gallery-item gallery-item--large">
                        <a href="https://ideas.edu.vn/wp-content/uploads/2026/06/ltnumef10202501.webp"
                            class="lightbox-trigger"
                            data-img="https://ideas.edu.vn/wp-content/uploads/2026/06/ltnumef10202501.webp"
                            aria-label="Xem ảnh lễ tốt nghiệp">
                            <img decoding="async"
                                src="https://ideas.edu.vn/wp-content/uploads/2026/06/ltnumef10202501.webp"
                                alt="Lễ tốt nghiệp MBA Swiss UMEF – IDEAS Education" loading="lazy" />
                            <div class="gallery-overlay">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <circle cx="11" cy="11" r="8" />
                                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                                    <line x1="11" y1="8" x2="11" y2="14" />
                                    <line x1="8" y1="11" x2="14" y2="11" />
                                </svg>
                                <span>Xem ảnh</span>
                            </div>
                        </a>
                    </div>
                    <div class="gallery-item">
                        <a href="https://ideas.edu.vn/wp-content/uploads/2025/11/DSC_9177.jpg" class="lightbox-trigger"
                            data-img="https://ideas.edu.vn/wp-content/uploads/2025/11/DSC_9177.jpg"
                            aria-label="Xem ảnh học viên">
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2025/11/DSC_9177.jpg"
                                alt="Học viên MBA Swiss UMEF tại lễ tốt nghiệp" loading="lazy" />
                            <div class="gallery-overlay">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <circle cx="11" cy="11" r="8" />
                                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                                    <line x1="11" y1="8" x2="11" y2="14" />
                                    <line x1="8" y1="11" x2="14" y2="11" />
                                </svg>
                            </div>
                        </a>
                    </div>
                    <div class="gallery-item">
                        <a href="https://ideas.edu.vn/wp-content/uploads/2025/11/DSCF6555.jpg" class="lightbox-trigger"
                            data-img="https://ideas.edu.vn/wp-content/uploads/2025/11/DSCF6555.jpg"
                            aria-label="Xem ảnh buổi lễ">
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2025/11/DSCF6555.jpg"
                                alt="Buổi lễ trao bằng MBA Swiss UMEF" loading="lazy" />
                            <div class="gallery-overlay">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <circle cx="11" cy="11" r="8" />
                                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                                    <line x1="11" y1="8" x2="11" y2="14" />
                                    <line x1="8" y1="11" x2="14" y2="11" />
                                </svg>
                            </div>
                        </a>
                    </div>
                    <div class="gallery-item">
                        <a href="https://ideas.edu.vn/wp-content/uploads/2025/11/DSCF6740.jpg" class="lightbox-trigger"
                            data-img="https://ideas.edu.vn/wp-content/uploads/2025/11/DSCF6740.jpg"
                            aria-label="Xem ảnh học viên nhận bằng">
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2025/11/DSCF6740.jpg"
                                alt="Học viên nhận bằng MBA Swiss UMEF" loading="lazy" />
                            <div class="gallery-overlay">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <circle cx="11" cy="11" r="8" />
                                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                                    <line x1="11" y1="8" x2="11" y2="14" />
                                    <line x1="8" y1="11" x2="14" y2="11" />
                                </svg>
                            </div>
                        </a>
                    </div>
                    <div class="gallery-item">
                        <a href="https://ideas.edu.vn/wp-content/uploads/2025/11/DSCF6777.jpg" class="lightbox-trigger"
                            data-img="https://ideas.edu.vn/wp-content/uploads/2025/11/DSCF6777.jpg"
                            aria-label="Xem ảnh kỷ niệm tốt nghiệp">
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2025/11/DSCF6777.jpg"
                                alt="Kỷ niệm tốt nghiệp MBA Swiss UMEF – IDEAS" loading="lazy" />
                            <div class="gallery-overlay">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <circle cx="11" cy="11" r="8" />
                                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                                    <line x1="11" y1="8" x2="11" y2="14" />
                                    <line x1="8" y1="11" x2="14" y2="11" />
                                </svg>
                            </div>
                        </a>
                    </div>
                    <!-- Graduate stats strip -->
                    <!-- <div class="grad-stats-strip reveal-up" aria-label="Thống kê học viên tốt nghiệp">
                        <div class="grad-stat-item">
                            <span class="grad-stat-val">2571+</span>
                            <span class="grad-stat-lbl">Học viên tốt nghiệp</span>
                        </div>
                        <div class="grad-stat-divider" aria-hidden="true"></div>
                        <div class="grad-stat-item">
                            <span class="grad-stat-val">15</span>
                            <span class="grad-stat-lbl">Năm đào tạo MBA</span>
                        </div>
                        <div class="grad-stat-divider" aria-hidden="true"></div>
                        <div class="grad-stat-item">
                            <span class="grad-stat-val">94%</span>
                            <span class="grad-stat-lbl">Hài lòng chương trình</span>
                        </div>
                        <div class="grad-stat-divider" aria-hidden="true"></div>
                        <div class="grad-stat-item">
                            <span class="grad-stat-val">3</span>
                            <span class="grad-stat-lbl">Khóa tốt nghiệp tại Thụy Sĩ</span>
                        </div>
                    </div> -->
                </div>
                <div class="scroll-dots" data-scroll-target=".gallery-mosaic"></div>
            </div>
        </section>

        <!-- Lightbox -->
        <div class="lightbox" id="lightbox" role="dialog" aria-modal="true" aria-label="Xem ảnh phóng to">
            <button class="lightbox-close" id="lightbox-close" aria-label="Đóng ảnh">✕</button>
            <img decoding="async" src="" alt="" id="lightbox-img" loading="lazy" />
        </div>

        <!-- ══════════════════════════════════════════
         SECTION 5: BENEFIT
    ══════════════════════════════════════════ -->
        <section class="benefit-section" id="loi-ich" aria-labelledby="testimonials-headline">
            <div class="container">
                <!-- Testimonials -->
                <div class="testimonials-section reveal-up" aria-label="Phản hồi từ học viên">
                    <h3 class="testimonials-title" id="testimonials-headline">Học viên nói gì về chương trình</h3>
                    <div class="testimonials-grid">
                        <!-- Card 1: Nguyễn Thanh Bình -->
                        <article class="testi-card-v4">
                            <div class="testi-v4-bg-star">
                                <svg viewBox="0 0 100 100" fill="currentColor">
                                    <path
                                        d="M50 0L61.2 38.8H100L68.8 61.2L80 100L50 77.6L20 100L31.2 61.2L0 38.8H38.8L50 0Z" />
                                </svg>
                            </div>
                            <div class="testi-v4-header">
                                <div class="testi-v4-avatar-wrap">
                                    <div class="testi-v4-avatar-glow"></div>
                                    <div class="testi-v4-avatar">
                                        <img decoding="async"
                                            src="https://ideas.edu.vn/wp-content/uploads/2025/02/casc1.jpg"
                                            alt="Nguyễn Thanh Bình" loading="lazy">
                                    </div>
                                </div>
                                <div class="testi-v4-meta">
                                    <h4 class="testi-v4-name">Nguyễn Thanh Bình</h4>
                                    <div class="testi-v4-role">Director</div>
                                    <div class="testi-v4-company">INF. & ENV. TECH INSTITUTE</div>
                                </div>
                            </div>
                            <div class="testi-v4-body">
                                <svg class="testi-v4-quote-icon" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V11C14.017 11.5523 13.5693 12 13.017 12H12.017V5H22.017V15C22.017 18.3137 19.3307 21 16.017 21H14.017Z">
                                    </path>
                                </svg>
                                <p class="testi-v4-text">Cảm ơn sự hỗ trợ nhiệt tình của IDEAS, đã đồng hành hỗ trợ
                                    không quản ngày đêm để chúng tôi hoàn thành mục tiêu nghiên cứu Tiến Sĩ – cấp bậc
                                    cao nhất của Học vị.</p>
                            </div>
                            <div class="testi-v4-footer">
                                <div class="testi-v4-stars">
                                    <svg class="testi-v4-star" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="testi-v4-star" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="testi-v4-star" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="testi-v4-star" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="testi-v4-star" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="testi-v4-verified">
                                    <span class="testi-v4-verified-lbl">Verified Profile</span>
                                    <div class="testi-v4-verified-dot"></div>
                                </div>
                            </div>
                            <div class="testi-v4-bottom-bar"></div>
                        </article>

                        <!-- Card 2: Nguyễn Huỳnh Phương -->
                        <article class="testi-card-v4">
                            <div class="testi-v4-bg-star">
                                <svg viewBox="0 0 100 100" fill="currentColor">
                                    <path
                                        d="M50 0L61.2 38.8H100L68.8 61.2L80 100L50 77.6L20 100L31.2 61.2L0 38.8H38.8L50 0Z" />
                                </svg>
                            </div>
                            <div class="testi-v4-header">
                                <div class="testi-v4-avatar-wrap">
                                    <div class="testi-v4-avatar-glow"></div>
                                    <div class="testi-v4-avatar">
                                        <img decoding="async"
                                            src="https://ideas.edu.vn/wp-content/uploads/2025/02/huynhphuong.jpg"
                                            alt="Nguyễn Huỳnh Phương" loading="lazy">
                                    </div>
                                </div>
                                <div class="testi-v4-meta">
                                    <h4 class="testi-v4-name">Nguyễn Huỳnh Phương</h4>
                                    <div class="testi-v4-role">Unit Manager</div>
                                    <div class="testi-v4-company">HANWHA LIFE VIETNAM</div>
                                </div>
                            </div>
                            <div class="testi-v4-body">
                                <svg class="testi-v4-quote-icon" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V11C14.017 11.5523 13.5693 12 13.017 12H12.017V5H22.017V15C22.017 18.3137 19.3307 21 16.017 21H14.017Z">
                                    </path>
                                </svg>
                                <p class="testi-v4-text">Đối với chương trình trực tuyến, tôi khuyên bạn nên chọn nơi
                                    đáng tin cậy như IDEAS. Giảng viên luôn đưa ra những gợi ý hữu ích giúp vượt qua khó
                                    khăn.</p>
                            </div>
                            <div class="testi-v4-footer">
                                <div class="testi-v4-stars">
                                    <svg class="testi-v4-star" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="testi-v4-star" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="testi-v4-star" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="testi-v4-star" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="testi-v4-star" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="testi-v4-verified">
                                    <span class="testi-v4-verified-lbl">Verified Profile</span>
                                    <div class="testi-v4-verified-dot"></div>
                                </div>
                            </div>
                            <div class="testi-v4-bottom-bar"></div>
                        </article>

                        <!-- Card 3: Nguyễn Thị Hà Miên -->
                        <article class="testi-card-v4">
                            <div class="testi-v4-bg-star">
                                <svg viewBox="0 0 100 100" fill="currentColor">
                                    <path
                                        d="M50 0L61.2 38.8H100L68.8 61.2L80 100L50 77.6L20 100L31.2 61.2L0 38.8H38.8L50 0Z" />
                                </svg>
                            </div>
                            <div class="testi-v4-header">
                                <div class="testi-v4-avatar-wrap">
                                    <div class="testi-v4-avatar-glow"></div>
                                    <div class="testi-v4-avatar">
                                        <img decoding="async"
                                            src="https://ideas.edu.vn/wp-content/uploads/2025/02/hamien.jpg"
                                            alt="Nguyễn Thị Hà Miên" loading="lazy">
                                    </div>
                                </div>
                                <div class="testi-v4-meta">
                                    <h4 class="testi-v4-name">Nguyễn Thị Hà Miên</h4>
                                    <div class="testi-v4-role">Deputy Project Manager</div>
                                    <div class="testi-v4-company">GLOBAL INFRASTRUCTURE</div>
                                </div>
                            </div>
                            <div class="testi-v4-body">
                                <svg class="testi-v4-quote-icon" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V11C14.017 11.5523 13.5693 12 13.017 12H12.017V5H22.017V15C22.017 18.3137 19.3307 21 16.017 21H14.017Z">
                                    </path>
                                </svg>
                                <p class="testi-v4-text">Tôi chọn chương trình vì sự linh hoạt. Sự hỗ trợ 24/7 của IDEAS
                                    giúp tôi hoàn thành tốt thời hạn nộp bài cũng như các lớp học trực tuyến.</p>
                            </div>
                            <div class="testi-v4-footer">
                                <div class="testi-v4-stars">
                                    <svg class="testi-v4-star" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="testi-v4-star" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="testi-v4-star" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="testi-v4-star" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="testi-v4-star" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="testi-v4-verified">
                                    <span class="testi-v4-verified-lbl">Verified Profile</span>
                                    <div class="testi-v4-verified-dot"></div>
                                </div>
                            </div>
                            <div class="testi-v4-bottom-bar"></div>
                        </article>

                    </div>
                    <div class="scroll-dots" data-scroll-target=".testimonials-grid"></div>
                </div>

                <!-- Ecosystem -->


                <!-- Pricing -->
                <div class="pricing-section reveal-up" id="bang-gia" style="text-align: center;">
                    <div class="section-label" style="margin: 0 auto 1.5rem; display: table;">HỌC PHÍ</div>
                    <h3 class="pricing-title"
                        style="text-align: center; font-size: clamp(1.8rem, 3.5vw, 2.5rem); font-weight: 900; color: #0f172a; margin-bottom: 12px; line-height: 1.2;">
                        MBA Swiss UMEF - Chọn hình thức học<br /><span style="color:#ab0e00">phù
                            hợp với lịch trình của bạn</span></h3>
                    <p class="pricing-subtitle">Cùng bằng MBA - cùng giá trị quốc tế. Khác nhau ở mức độ tương tác
                        với
                        giảng viên.</p>
                    <p style="color:#ab0e00; font-weight:700; margin-bottom: 24px; font-size: 0.95rem;">CHÍNH SÁCH HỌC
                        PHÍ THÁNG 6: Áp dụng đến hết ngày 01/07/2026 (Tỷ giá 33.000 VNĐ/CHF)</p>

                    <div class="pricing-grid-v2">
                        <!-- Standard - Featured -->
                        <article class="pricing-card-v2 pcv2-featured"
                            aria-label=" Standard - được lựa chọn nhiều nhất">
                            <div class="pcv2-badge">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                </svg>
                                Được lựa chọn nhiều nhất
                            </div>
                            <div class="pcv2-header">
                                <div class="pcv2-tier">Standard</div>
                                <div
                                    style="font-size:2.2rem;font-weight:900;color:#fff;line-height:1;margin:12px 0 4px;">
                                    4.220 <span style="font-size:1rem;font-weight:700;opacity:0.85;">CHF</span></div>
                                <p style="margin: 0 0 4px 0; font-size: 1.15rem; color: #fff; font-weight: 800;">
                                    ~139.260.000đ</p>
                                <p
                                    style="margin: 0; font-size: 0.8rem; color: rgba(255,255,255,0.7); text-decoration: line-through;">
                                    Học phí gốc: 5.570 CHF</p>
                                <p class="pcv2-desc" style="margin-top: 8px;">Ưu tiên tính linh hoạt cao - học theo lịch
                                    riêng</p>
                            </div>
                            <div class="pcv2-divider"></div>
                            <ul class="pcv2-features">
                                <li>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fbbf24"
                                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                    Học qua video bài giảng trên LMS
                                </li>
                                <li>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fbbf24"
                                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                    Buổi học trực tiếp với Giảng viên nước ngoài (tùy chọn)
                                </li>
                                <li>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fbbf24"
                                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                    Lớp chuyên đề Chủ nhật với Giảng viên Việt Nam
                                </li>
                                <li>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fbbf24"
                                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                    Truy cập IDEAS-LMS 24/7
                                </li>
                                <li>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fbbf24"
                                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                    IDEAS AI Platform + Cengage library
                                </li>
                            </ul>
                            <a href="#dang-ky" class="btn pcv2-btn-featured" id="standard-cta">Tư vấn Standard</a>
                        </article>

                        <!-- High Quality -->
                        <article class="pricing-card-v2" aria-label="High Quality">
                            <div class="pcv2-badge"
                                style="background:rgba(171,14,0,0.15);color:#ab0e00;border:1px solid rgba(171,14,0,0.3);">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                </svg>
                                Chất lượng tốt nhất
                            </div>
                            <div class="pcv2-header" style="padding-bottom: 0;">
                                <div class="pcv2-tier">High Quality</div>

                                <style>
                                    /* ── Toggle Switch ── */
                                    .hq-toggle-switch input:checked+.hq-toggle-slider {
                                        background-color: #ab0e00;
                                    }

                                    .hq-toggle-switch input:checked+.hq-toggle-slider:before {
                                        transform: translateX(18px);
                                    }

                                    .hq-toggle-slider {
                                        position: absolute;
                                        cursor: pointer;
                                        inset: 0;
                                        background-color: #cbd5e1;
                                        transition: .3s;
                                        border-radius: 20px;
                                    }

                                    .hq-toggle-slider:before {
                                        position: absolute;
                                        content: "";
                                        height: 14px;
                                        width: 14px;
                                        left: 3px;
                                        bottom: 3px;
                                        background-color: white;
                                        transition: .3s;
                                        border-radius: 50%;
                                        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
                                    }
                                </style>

                                <div
                                    style="font-size: 2.2rem; font-weight: 900; color: #ab0e00; line-height: 1; margin: 12px 0 4px; text-align: center;">
                                    <span id="hq-price-chf-mba">5.120</span> <span
                                        style="font-size: 1.05rem; font-weight: 700; color: #0f172a;">CHF</span>
                                </div>
                                <p id="hq-price-vnd-mba"
                                    style="margin: 0 0 4px 0; font-size: 1.15rem; color: #0f172a; font-weight: 800; text-align: center;">
                                    ~168.960.000đ</p>
                                <p id="hq-price-original-mba"
                                    style="margin: 0 0 12px 0; font-size: 0.8rem; color: #64748b; text-decoration: line-through; text-align: center;">
                                    Học phí gốc: 7.970 CHF</p>

                                <!-- Toggle Switch container -->
                                <div
                                    style="display: flex; align-items: center; justify-content: center; gap: 10px; margin: 16px auto; background: rgba(171, 14, 0, 0.04); border: 1px solid rgba(171, 14, 0, 0.08); padding: 8px 14px; border-radius: 12px; width: fit-content;">
                                    <span style="font-size: 0.82rem; font-weight: 700; color: #475569;">Chuyến đi Thụy
                                        Sĩ</span>
                                    <label class="hq-toggle-switch"
                                        style="position: relative; display: inline-block; width: 38px; height: 20px; margin: 0; flex-shrink: 0;">
                                        <input type="checkbox" id="hq-tour-toggle-mba"
                                            aria-label="Chọn chuyến đi Thụy Sĩ" style="opacity: 0; width: 0; height: 0;"
                                            onchange="toggleHqTourMba(this)">
                                        <span class="hq-toggle-slider"></span>
                                    </label>
                                </div>

                                <script>
                                    function toggleHqTourMba(cb) {
                                        const priceChf = document.getElementById("hq-price-chf-mba");
                                        const priceVnd = document.getElementById("hq-price-vnd-mba");
                                        const priceOrig = document.getElementById("hq-price-original-mba");
                                        if (cb.checked) {
                                            priceChf.innerText = "6.500";
                                            priceVnd.innerText = "~214.500.000đ";
                                            priceOrig.innerText = "Học phí gốc: 10.970 CHF";
                                        } else {
                                            priceChf.innerText = "5.120";
                                            priceVnd.innerText = "~168.960.000đ";
                                            priceOrig.innerText = "Học phí gốc: 7.970 CHF";
                                        }
                                    }
                                </script>

                                <p class="pcv2-desc" style="margin-top: 12px;">Tương tác trực tiếp - trao đổi học thuật
                                    chuyên sâu</p>
                            </div>
                            <div class="pcv2-divider"></div>
                            <ul class="pcv2-features">
                                <li>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ab0e00"
                                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                    Học trực tiếp qua Zoom với Giảng viên quốc tế
                                </li>
                                <li>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ab0e00"
                                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                    Tăng cường trao đổi học thuật trực tiếp
                                </li>
                                <li>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ab0e00"
                                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                    Kết hơp lớp chuyên đề IDEAS cuối tuần với Giảng viên Việt Nam
                                </li>
                                <li>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ab0e00"
                                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                    Truy cập IDEAS-LMS 24/7
                                </li>
                                <li>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ab0e00"
                                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                                        aria-hidden="true">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                    IDEAS AI Platform + Cengage library
                                </li>
                            </ul>
                            <a href="#dang-ky" class="btn btn-outline pcv2-btn" id="hq-cta">Tư vấn High Quality</a>
                        </article>
                    </div>

                    <!-- Sacombank installment banner -->
                    <div class="sacom-banner" aria-label="Hỗ trợ trả góp Sacombank">
                        <div class="sacom-left">
                            <div class="sacom-cards">
                                <img decoding="async"
                                    src="https://www.sacombank.com.vn/content/dam/sacombank/images/the-new/the-tin-dung/Visa%20Credit%20Plantinum%20Cashback_contactless-01.png"
                                    alt="Sacombank Visa Platinum Cashback" class="sacom-card-img sacom-card-back"
                                    loading="lazy" />
                                <img decoding="async"
                                    src="https://www.sacombank.com.vn/content/dam/sacombank/images/the-new/the-tin-dung/Visa%20Credit%20Signature_contactless-01.png"
                                    alt="Sacombank Visa Signature" class="sacom-card-img sacom-card-front"
                                    loading="lazy" />
                            </div>
                            <div class="sacom-logo-area">
                                <div class="sacom-logo-text">SACOMBANK</div>
                                <div class="sacom-tag">Đối tác tài chính</div>
                            </div>
                        </div>
                        <div class="sacom-right">
                            <div class="sacom-headline" style="color: #fff; text-align: left;">Hỗ trợ trả góp <span
                                    class="sacom-highlight">12 – 24
                                    tháng</span></div>
                            <p class="sacom-sub">Thanh toán học phí linh hoạt qua thẻ tín dụng Sacombank Visa - lãi
                                suất
                                ưu đãi, không cần thế chấp</p>
                            <div class="sacom-pills">
                                <span class="sacom-pill">✓ Duyệt nhanh</span>
                                <span class="sacom-pill">✓ Không thế chấp</span>
                                <span class="sacom-pill">✓ Lãi suất ưu đãi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ══════════════════════════════════════════
         SECTION 6: CTA / FORM
    ══════════════════════════════════════════ -->
        <section class="cta-section" id="dang-ky" aria-labelledby="cta-headline">
            <div class="cta-bg">
                <div class="cta-orb cta-orb-1"></div>
                <div class="cta-orb cta-orb-2"></div>
            </div>
            <div class="container cta-inner">

                <div class="cta-left reveal-up">
                    <div class="gmac-quote" role="blockquote" aria-label="Trích dẫn GMAC">
                        <div class="quote-header">
                            <span class="quote-label">BÁO CÁO GIÁ TRỊ BẰNG CẤP</span>
                            <div class="quote-icon" aria-hidden="true">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor"
                                    style="transform:scaleX(-1)">
                                    <path
                                        d="M14.017 21L14.017 18C14.017 14.6863 16.7033 12 20.017 12V21H14.017ZM14.017 12C14.017 8.68629 16.7033 6 20.017 6V12H14.017ZM3.0166 21L3.0166 18C3.0166 14.6863 5.70289 12 9.0166 12V21H3.0166ZM3.0166 12C3.0166 8.68629 5.70289 6 9.0166 6V12H3.0166Z" />
                                </svg>
                            </div>
                        </div>
                        <p class="quote-body">Theo báo cáo khảo sát từ <strong>GMAC</strong>, người đi làm sở hữu bằng
                            MBA thường ghi nhận mức <span class="quote-highlight">tăng thu nhập trung bình từ 50% trở
                                lên</span> và cơ hội thăng tiến rõ rệt trong sự nghiệp.</p>
                        <div class="quote-footer">
                            <span class="quote-source">- Global Graduate Management Admission Council</span>
                        </div>
                    </div>

                    <h2 class="cta-headline" id="cta-headline">
                        Đừng để sự nghiệp của bạn<br />
                        <span class="cta-gradient underline-highlight">tiếp tục đứng yên</span><br />
                        thêm 1–2 năm nữa
                    </h2>

                    <ul class="cta-checklist" aria-label="Điểm nổi bật chương trình" style="margin-top: 32px;">
                        <li>
                            <div class="cta-check-v2">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <p>Tấm bằng <strong>Thạc sĩ Quản trị kinh doanh</strong> Thụy Sĩ</p>
                        </li>
                        <li>
                            <div class="cta-check-v2">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <p>Lộ trình đào tạo <strong>tối ưu cho người bận rộn</strong> (100% Online)</p>
                        </li>
                        <li>
                            <div class="cta-check-v2">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                            <p>IDEAS đồng hành và hỗ trợ học thuật trong suốt quá trình học</p>
                        </li>
                    </ul>

                    <style>
                        .faq-accordion {
                            display: flex;
                            flex-direction: column;
                            gap: 12px;
                            margin-top: 36px;
                            margin-bottom: 24px;
                        }

                        .faq-item {
                            background: #ffffff;
                            border: 1px solid #e2e8f0;
                            border-radius: 12px;
                            overflow: hidden;
                            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
                        }

                        .faq-item:hover {
                            border-color: rgba(171, 14, 0, 0.25);
                            background: rgba(171, 14, 0, 0.01);
                        }

                        .faq-trigger {
                            width: 100%;
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                            padding: 16px 20px;
                            background: none;
                            border: none;
                            font-family: var(--font-body), sans-serif;
                            font-size: 0.92rem;
                            font-weight: 600;
                            color: #1e293b;
                            text-align: left;
                            cursor: pointer;
                            transition: all 0.2s ease;
                            outline: none;
                        }

                        .faq-trigger:hover {
                            color: #ab0e00;
                        }

                        .faq-content {
                            max-height: 0;
                            overflow: hidden;
                            transition: max-height 0.35s cubic-bezier(0.16, 1, 0.3, 1);
                            padding: 0 20px;
                            color: #475569;
                            font-size: 0.86rem;
                            line-height: 1.6;
                        }

                        .faq-content p {
                            margin: 0 0 16px 0;
                        }
                    </style>

                    <!-- FAQ Accordion -->
                    <div class="faq-accordion">
                        <div class="faq-item">
                            <button type="button" class="faq-trigger">
                                <span>Các gói học phí của chương trình MBA Thụy Sĩ trực tuyến?</span>
                                <i class="fa-solid fa-chevron-down"
                                    style="font-size: 0.75rem; transition: transform 0.3s ease; color: #64748b; margin-left: 10px;"></i>
                            </button>
                            <div class="faq-content">
                                <p>MBA Swiss UMEF cung cấp hai gói: Standard (4.220 CHF) học trực tuyến linh hoạt qua
                                    video LMS, và High Quality (từ 5.120 CHF đến 6.500 CHF tùy theo phương án chuyến đi
                                    Thụy Sĩ) bổ sung các buổi học trực tiếp qua Zoom với
                                    Giảng viên quốc tế.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <button type="button" class="faq-trigger">
                                <span>Bằng Thạc sĩ MBA Swiss UMEF có thể hợp pháp hóa lãnh sự không?</span>
                                <i class="fa-solid fa-chevron-down"
                                    style="font-size: 0.75rem; transition: transform 0.3s ease; color: #64748b; margin-left: 10px;"></i>
                            </button>
                            <div class="faq-content">
                                <p>Hoàn toàn được. Bằng cấp được hợp pháp hóa lãnh sự bởi Bộ Ngoại giao Thụy Sĩ/Đại sứ
                                    quán Việt Nam tại Thụy Sĩ, đảm bảo tính pháp lý quốc tế đầy đủ.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <button type="button" class="faq-trigger">
                                <span>Thời gian tối thiểu và tối đa để hoàn thành chương trình MBA?</span>
                                <i class="fa-solid fa-chevron-down"
                                    style="font-size: 0.75rem; transition: transform 0.3s ease; color: #64748b; margin-left: 10px;"></i>
                            </button>
                            <div class="faq-content">
                                <p>Thời gian học chuẩn là 16-18 tháng. Học viên bận rộn có thể đăng ký gia hạn hoặc bảo
                                    lưu lộ trình theo quy chế học vụ của nhà trường.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <button type="button" class="faq-trigger">
                                <span>Bằng tốt nghiệp MBA Thụy Sĩ trực tuyến có ghi chữ 'Online' không?</span>
                                <i class="fa-solid fa-chevron-down"
                                    style="font-size: 0.75rem; transition: transform 0.3s ease; color: #64748b; margin-left: 10px;"></i>
                            </button>
                            <div class="faq-content">
                                <p>Không. Bằng tốt nghiệp hoàn toàn đồng nhất về hình thức, nội dung và giá trị pháp lý
                                    với chương trình học tập trung trực tiếp tại trường Swiss UMEF Geneva, Thụy Sĩ.</p>
                            </div>
                        </div>
                        <div class="faq-item">
                            <button type="button" class="faq-trigger">
                                <span>Chương trình MBA có hỗ trợ trả góp học phí không?</span>
                                <i class="fa-solid fa-chevron-down"
                                    style="font-size: 0.75rem; transition: transform 0.3s ease; color: #64748b; margin-left: 10px;"></i>
                            </button>
                            <div class="faq-content">
                                <p>Có. Học viên có thể trả góp linh hoạt từ 12 - 24 tháng với lãi suất 0% qua thẻ tín
                                    dụng của ngân hàng đối tác Sacombank hoặc thanh toán theo từng kỳ hạn học.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cta-form-wrapper reveal-up" id="form-wrapper">
                    <div class="form-header">
                        <div class="form-header-badge">NHẬN TƯ VẤN 1:1</div>
                        <h3>Khởi đầu hành trình<br><span class="gradient-text">MBA Thụy Sĩ</span></h3>
                        <p>Chuyên viên sẽ liên hệ với bạn trong vòng 24h làm việc để tư vấn lộ trình phù hợp.</p>
                    </div>

                    <form class="cta-form" id="cta-form" novalidate aria-label="Form đăng ký tư vấn MBA">
                        <div class="form-group">
                            <label for="fullname">Họ và tên *</label>
                            <input type="text" id="fullname" name="fullname" placeholder="Họ và tên của bạn" required
                                autocomplete="name" aria-required="true" />
                            <span class="form-error" id="fullname-error" role="alert"></span>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">Số điện thoại *</label>
                                <input type="tel" id="phone" name="phone" placeholder="Số điện thoại" required
                                    autocomplete="tel" aria-required="true" />
                                <span class="form-error" id="phone-error" role="alert"></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" id="email" name="email" placeholder="Địa chỉ email" required
                                    autocomplete="email" aria-required="true" />
                                <span class="form-error" id="email-error" role="alert"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="education">Trình độ học vấn *</label>
                                <select id="education" name="education" required>
                                    <option value="">-- Chọn trình độ --</option>
                                    <option value="highschool">THPT</option>
                                    <option value="college">Cao đẳng</option>
                                    <option value="bachelor">Cử nhân</option>
                                    <option value="master">Thạc sĩ</option>
                                    <option value="other">Khác</option>
                                </select>
                                <span class="form-error" id="education-error" role="alert"></span>
                            </div>
                            <div class="form-group">
                                <label for="english">Trình độ Tiếng Anh *</label>
                                <select id="english" name="english" required>
                                    <option value="">-- Chọn trình độ --</option>
                                    <option value="below-5.0">Dưới IELTS 5.0</option>
                                    <option value="5.0-5.5">IELTS 5.0 - 5.5</option>
                                    <option value="6.0-plus">IELTS 6.0+</option>
                                    <option value="other">Khác</option>
                                </select>
                                <span class="form-error" id="english-error" role="alert"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Nội dung bạn muốn chia sẽ / thời gian có thể nghe tư vấn 1:1</label>
                            <textarea id="message" name="message"
                                placeholder="Ví dụ: Tôi muốn tìm hiểu về lộ trình học phí và thời gian khai giảng..."
                                rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-full" id="form-submit-btn"
                            aria-label="Gửi đăng ký tư vấn">
                            <span id="btn-text">Gửi thông tin đăng ký</span>
                            <svg class="btn-arrow" width="18" height="18" fill="none" viewBox="0 0 24 24"
                                aria-hidden="true">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </button>

                        <div class="modal-zalo-section">
                            <div class="modal-zalo-divider">
                                <span>Hoặc chọn cách liên hệ</span>
                            </div>
                            <div class="modal-zalo-row">
                                <a href="https://zalo.me/3857867121882640296" target="_blank" class="modal-zalo-btn"
                                    aria-label="Chat Zalo với IDEAS">
                                    <img decoding="async"
                                        src="https://cdn-1.webcatalog.io/catalog/zalo-oa/zalo-oa-icon-unplated.png?v=1780553812775"
                                        alt="Zalo Logo IDEAS" width="20" height="20" loading="lazy">
                                    <span>Chat Zalo với IDEAS</span>
                                </a>
                                <button type="button" class="modal-booking-btn" id="cta-open-booking"
                                    aria-label="Đặt lịch hẹn tư vấn">
                                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>Đặt lịch tư vấn</span>
                                </button>
                            </div>
                        </div>

                        <p class="form-privacy">Cam kết bảo mật thông tin</p>
                    </form>

                    <!-- Success State -->
                    <div class="form-success" id="form-success" role="status" aria-live="polite" style="display:none;">
                        <div class="success-icon"><svg width="48" height="48" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                aria-hidden="true">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                <polyline points="22 4 12 14.01 9 11.01" />
                            </svg></div>
                        <h3>Đăng ký thành công!</h3>
                        <p>Chuyên viên tư vấn IDEAS sẽ liên hệ với bạn trong vòng <strong>24 giờ làm việc</strong>.
                        </p>
                        <p>Trong thời gian chờ, hãy khám phá thêm thông tin về chương trình MBA Swiss UMEF.</p>
                    </div>
                </div>
            </div>
        </section>



    
</main>

<div class="accred-modal" id="accred-modal" role="dialog" aria-modal="true" aria-hidden="true">
        <div class="accred-modal-overlay" id="accred-modal-overlay"></div>
        <div class="accred-modal-container">
            <button class="accred-modal-close" id="accred-modal-close" aria-label="Close modal">✕</button>
            <div class="accred-modal-content">
                <div class="accred-modal-body">
                    <div class="accred-modal-info" style="padding: 50px;">
                        <div class="accred-modal-label">Thông tin kiểm định</div>
                        <h3 class="accred-modal-title" id="accred-title">---</h3>
                        <div class="accred-modal-desc" id="accred-desc">---</div>
                    </div>
                </div>
            </div>
<div class="vn-ceremony-modal" id="vn-ceremony-modal" role="dialog" aria-modal="true">
        <div class="vn-ceremony-overlay" id="vn-ceremony-overlay"></div>
        <div class="vn-ceremony-container" data-lenis-prevent>
            <div class="vn-ceremony-header">
                <h2 class="vn-ceremony-title"><svg width="22" height="22" fill="none" stroke="#ab0e00" stroke-width="2"
                        viewBox="0 0 24 24" style="display:inline-block;vertical-align:middle;margin-right:8px;">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>L&#7877; T&#7889;t Nghi&#7879;p t&#7841;i <span>Vi&#7879;t Nam</span></h2>
                <button class="vn-ceremony-close" onclick="closeVNCeremonyModal()"><svg width="18" height="18"
                        fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg></button>
            </div>
            <div class="vn-ceremony-content" data-lenis-prevent>
                <p style="color:#64748b;font-size:0.9rem;margin-bottom:28px;line-height:1.6;">Nh&#7919;ng bu&#7893;i
                    l&#7877; trao b&#7857;ng <strong>Swiss UMEF</strong> t&#7841;i Tp. H&#7891; Ch&#237; Minh &mdash;
                    n&#417;i h&#7885;c vi&ecirc;n nh&#7853;n b&#7857;ng th&#7841;c s&#297; qu&#7889;c t&#7871;.</p>
                <div class="vn-timeline">
                    <!-- Event 2: 27/12/2025 -->
                    <div class="vn-timeline-item">
                        <div class="vn-timeline-badge"></div>
                        <div class="vn-timeline-date">27/12/2025</div>
                        <div class="vn-card">
                            <div class="vn-card-img-wrap">
                                <img decoding="async"
                                    src="https://ideas.edu.vn/wp-content/uploads/2026/01/ltn27122025.webp"
                                    alt="Lễ tốt nghiệp 27/12/2025" loading="lazy">
                            </div>
                            <div class="vn-card-info">
                                <a href="https://www.facebook.com/ideas.edu.vn/posts/pfbid034nzCDGcFVfz54M62b4Yod9iJ3mMx2eVNMXB33PpDeDSw6Xw1cZsH4oucpX2TogDcl?locale=vi_VN"
                                    target="_blank" rel="noopener" class="vn-card-title">Lễ tốt nghiệp 27/12/2025</a>
                                <div class="vn-card-meta">
                                    <p><i class="fa-solid fa-graduation-cap"></i> MBA/EMBA &mdash; Swiss UMEF</p>
                                    <p><i class="fa-solid fa-location-dot"></i> Tp. Hồ Chí Minh</p>
                                </div>
                                <a href="https://www.facebook.com/ideas.edu.vn/posts/pfbid034nzCDGcFVfz54M62b4Yod9iJ3mMx2eVNMXB33PpDeDSw6Xw1cZsH4oucpX2TogDcl?locale=vi_VN"
                                    target="_blank" rel="noopener" class="vn-card-play" aria-label="Xem chi tiết">
                                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
<div class="qz-modal" id="qz-modal" data-lenis-prevent>
            <button class="qz-close" id="qz-close" aria-label="Đóng">&#x2715;</button>

            <!-- Header -->
            <div class="qz-header">
                <div class="qz-header-badge"><span></span> Định Hướng Sự Nghiệp</div>
                <h2 id="qz-modal-title">Bạn phù hợp với chương trình nào?</h2>
                <p>Trả lời 5 câu hỏi nhanh để tìm giải pháp học tập tối ưu từ Thụy Sĩ.</p>
            </div>

            <!-- Progress -->
            <div class="qz-progress-wrap">
                <div class="qz-progress-bar">
                    <div class="qz-progress-fill" id="qz-progress"></div>
                </div>
                <div class="qz-progress-label" id="qz-progress-label">1 / 5</div>
            </div>

            <!-- Quiz Questions Container -->
            <div class="qz-body" id="qz-body">
                <div id="qz-question-container"></div>
            </div>

            <!-- Result screen -->
            <div class="qz-result" id="qz-result">
                <div class="qz-result-icon" id="qz-result-icon">🎉</div>
                <div class="qz-result-group qz-result-group--strategic" id="qz-result-group"></div>
                <h3 id="qz-result-title"></h3>
                <p class="qz-result-msg" id="qz-result-msg"></p>
                <a href="#dang-ky" class="qz-result-cta" id="qz-result-cta">Xem chi tiết</a>
                <button class="qz-result-restart" id="qz-result-restart">↺ Làm lại từ đầu</button>
            </div>
        </div>
    </div>

<!-- Include core variables script -->
<?php
$var_js_path = get_stylesheet_directory() . '/common-assets/js/variables.min.js';
$var_js_version = file_exists($var_js_path) ? filemtime($var_js_path) : time();
?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/variables.min.js?v=<?php echo $var_js_version; ?>" defer></script>

<script>
    function toggleSubjectDetails(el) {
        // Toggle current
        const isOpen = el.classList.contains('active');
        // Close other subjects in the same list
        const list = el.closest('.curri-subjects');
        list.querySelectorAll('li').forEach(item => {
            item.classList.remove('active');
        });
        if (!isOpen) {
            el.classList.add('active');
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        // Render dynamic subjects from variables configuration
        const checkData = setInterval(() => {
            if (typeof IDEAS_DATA !== 'undefined' && IDEAS_DATA.programmes && IDEAS_DATA.programmes.IDEAS02) {
                clearInterval(checkData);
                renderDynamicCurriculum();
            }
        }, 100);

        function renderDynamicCurriculum() {
            const subjects = IDEAS_DATA.programmes.IDEAS02.this_subjects;
            const pillars = [
                {
                    num: "I",
                    title: "Nền tảng quản trị",
                    subjectIndices: [0, 8]
                },
                {
                    num: "II",
                    title: "Tài chính & Thị trường",
                    subjectIndices: [3, 4]
                },
                {
                    num: "III",
                    title: "Chiến lược & Vận hành",
                    subjectIndices: [6, 7, 5, 11]
                },
                {
                    num: "IV",
                    title: "Lãnh đạo & Đổi mới",
                    subjectIndices: [9, 1, 2]
                }
            ];

            const grid = document.getElementById('dynamic-curriculum-grid');
            if (!grid) return;

            let html = '';
            pillars.forEach(p => {
                html += `
                    <div class="curri-pillar">
                        <div class="curri-pillar-header">
                            <span class="curri-pillar-num">${p.num}</span>
                            <span class="curri-pillar-title">${p.title}</span>
                        </div>
                        <ul class="curri-subjects">
                `;
                p.subjectIndices.forEach(idx => {
                    const sub = subjects[idx];
                    if (sub) {
                        let displayName = sub.name;
                        html += `
                            <li onclick="toggleSubjectDetails(this)">
                                <div class="subject-header">
                                    <span><span class="curri-dot"></span>${displayName}</span>
                                    <span class="subject-arrow"><i class="fa-solid fa-chevron-down"></i></span>
                                </div>
                                <div class="subject-details">
                                    <p>${sub.description}</p>
                                    <span class="subject-credit">${sub.credit} ECTS</span>
                                </div>
                            </li>
                        `;
                    }
                });
                html += `
                        </ul>
                    </div>
                `;
            });
            grid.innerHTML = html;
        }
    });
</script>
<script>
        const CURRENT_PROGRAM = 'MBA';
        const PROGRAM_DETAILS = {
            'EMBA': {
                name: 'Executive MBA Thụy Sĩ',
                url: '/emba',
                desc: 'Chương trình Thạc sĩ Điều hành Cao cấp dành riêng cho Giám đốc, C-levels và Chủ doanh nghiệp.',
                highlight: 'định hướng chiến lược vĩ mô và mở rộng mạng lưới quan hệ lãnh đạo cấp cao'
            },
            'MBA': {
                name: 'MBA Thụy Sĩ ',
                url: '/mba',
                desc: 'Chương trình Thạc sĩ Quản trị Kinh doanh trực tuyến linh hoạt dành cho Quản lý cấp trung và người đi làm.',
                highlight: 'nâng cao năng lực quản trị toàn diện (Marketing, Tài chính, Nhân sự, Vận hành)'
            },
            'MBA_AI': {
                name: 'MBA in AI Thụy Sĩ',
                url: '/mbainai',
                desc: 'Chương trình Thạc sĩ Quản trị chuyên ngành AI dành cho nhà quản lý dẫn dắt ứng dụng AI và chuyển đổi số.',
                highlight: 'làm chủ tư duy quản trị kết hợp ứng dụng các công cụ AI hiện đại (no-code)'
            },
            'MSC_AI': {
                name: 'MSc AI Thụy Sĩ',
                url: '/mscai',
                desc: 'Chương trình Thạc sĩ Khoa học về Trí tuệ Nhân tạo Ứng dụng dành cho nhà quản lý và lãnh đạo doanh nghiệp.',
                highlight: 'hiểu, ứng dụng và quản trị AI ở cấp độ chiến lược'
            },
            'BBA': {
                name: 'Top-up BBA Thụy Sĩ (12 tháng)',
                url: '/bba',
                desc: 'Chương trình liên thông Cử nhân Quản trị Kinh doanh dành cho người tốt nghiệp Cao đẳng, Trung cấp.',
                highlight: 'tối ưu lộ trình nhận bằng Cử nhân Quốc tế  từ Thụy Sĩ chỉ trong 12 tháng'
            },
            'FULL_BBA': {
                name: 'Cử nhân BBA Thụy Sĩ (3 năm)',
                url: '/fullbba',
                desc: 'Chương trình Đại học Quản trị Kinh doanh  dành cho học sinh tốt nghiệp THPT và người đi làm.',
                highlight: 'tích lũy kiến thức kinh doanh quốc tế bài bản từ nền tảng và phát triển sự nghiệp vững chắc'
            },
            'DUAL_DBA': {
                name: 'Dual DBA Pháp & Anh',
                url: '/dual-dba-estiam-rb',
                desc: 'Chương trình Tiến sĩ song bằng danh giá cấp bởi ÉSTIAM Pháp và RB College Vương quốc Anh.',
                highlight: 'nghiên cứu học thuật chuyên sâu và sở hữu song bằng Tiến sĩ DBA danh giá cấp từ Pháp & Anh'
            }
        };

        const QUIZ_QUESTIONS = [
            {
                "question": "Trở ngại lớn nhất trong sự nghiệp hiện tại của bạn là gì?",
                "options": [
                    {
                        "text": "Chưa có bằng Đại học quốc tế để thăng chức, tăng lương.",
                        "scores": { "BBA": 5, "FULL_BBA": 5 }
                    },
                    {
                        "text": "Làm quản lý theo kinh nghiệm, thiếu khung tư duy chiến lược bài bản.",
                        "scores": { "MBA": 5, "MBA_AI": 3, "EMBA": 3 }
                    },
                    {
                        "text": "Bận điều hành, thiếu mạng lưới quan hệ C-level và tầm nhìn vĩ mô.",
                        "scores": { "EMBA": 5, "DUAL_DBA": 4 }
                    },
                    {
                        "text": "Lo lắng bị tụt hậu trước làn sóng công nghệ và Trí tuệ nhân tạo (AI).",
                        "scores": { "MBA_AI": 5, "MSC_AI": 5 }
                    }
                ]
            },
            {
                "question": "Trình độ học vấn cao nhất hiện tại của bạn?",
                "options": [
                    {
                        "text": "Tốt nghiệp THPT / Đang đi làm chưa có bằng Đại học.",
                        "scores": { "FULL_BBA": 12 }
                    },
                    {
                        "text": "Tốt nghiệp Cao đẳng / Trung cấp.",
                        "scores": { "BBA": 12 }
                    },
                    {
                        "text": "Tốt nghiệp Đại học.",
                        "scores": { "MBA": 6, "MBA_AI": 6, "EMBA": 5, "MSC_AI": 4 }
                    },
                    {
                        "text": "Tốt nghiệp Thạc sĩ / Đã có trên 10 năm kinh nghiệm quản lý.",
                        "scores": { "DUAL_DBA": 12, "EMBA": 6 }
                    }
                ]
            },
            {
                "question": "Mục tiêu quan trọng nhất của bạn trong 12–18 tháng tới?",
                "options": [
                    {
                        "text": "Sở hữu bằng Cử nhân quốc tế (BBA) uy tín trong thời gian ngắn nhất.",
                        "scores": { "BBA": 6, "FULL_BBA": 5 }
                    },
                    {
                        "text": "Hệ thống hóa năng lực quản trị để thăng tiến lên Giám đốc/CEO.",
                        "scores": { "MBA": 6, "EMBA": 4 }
                    },
                    {
                        "text": "Mở rộng network chất lượng cao và nâng tầm tư duy lãnh đạo vĩ mô.",
                        "scores": { "EMBA": 6, "DUAL_DBA": 5 }
                    },
                    {
                        "text": "Làm chủ công nghệ và AI để dẫn dắt chuyển đổi số doanh nghiệp.",
                        "scores": { "MBA_AI": 6, "MSC_AI": 6 }
                    }
                ]
            },
            {
                "question": "Định hướng phát triển chuyên môn sâu của bạn là gì?",
                "options": [
                    {
                        "text": "Quản trị kinh doanh toàn diện (Tài chính, Marketing, Nhân sự, Vận hành).",
                        "scores": { "MBA": 6, "EMBA": 5, "BBA": 4, "FULL_BBA": 4 }
                    },
                    {
                        "text": "Ứng dụng công cụ AI (No-code) tối ưu hiệu suất và quản lý doanh nghiệp.",
                        "scores": { "MBA_AI": 6 }
                    },
                    {
                        "text": "Nghiên cứu kỹ thuật và giải pháp công nghệ AI ứng dụng sâu rộng.",
                        "scores": { "MSC_AI": 6 }
                    },
                    {
                        "text": "Nghiên cứu học thuật độc lập và sở hữu học vị Tiến sĩ (DBA).",
                        "scores": { "DUAL_DBA": 6 }
                    }
                ]
            },
            {
                "question": "Phương thức học tập mong muốn để tối ưu hóa hiệu quả?",
                "options": [
                    {
                        "text": "Học trực tuyến linh hoạt 100% qua video bài giảng để chủ động thời gian.",
                        "scores": { "MBA": 5, "BBA": 5, "FULL_BBA": 5, "MBA_AI": 5 }
                    },
                    {
                        "text": "Học trực tuyến kết hợp giao lưu, thảo luận trực tiếp với cộng đồng lãnh đạo.",
                        "scores": { "EMBA": 5, "DUAL_DBA": 5 }
                    },
                    {
                        "text": "Học thực chiến sâu sát với các dự án kỹ thuật và giải pháp công nghệ.",
                        "scores": { "MSC_AI": 5 }
                    }
                ]
            }
        ];

        const quizModal = (() => {
            const overlay = document.getElementById('qz-overlay');
            const progress = document.getElementById('qz-progress') || document.getElementById('qz-progress-fill');
            const progLbl = document.getElementById('qz-progress-label');
            const qContainer = document.getElementById('qz-question-container');
            const body = document.getElementById('qz-body');
            const resultEl = document.getElementById('qz-result');
            const closeBtn = document.getElementById('qz-close');
            const restartBtn = document.getElementById('qz-result-restart');
            const ctaBtn = document.getElementById('qz-result-cta');

            const TOTAL = 5;
            let current = 1;
            const answers = {};

            function renderQuestion(n) {
                const qData = QUIZ_QUESTIONS[n - 1];
                if (!qData) return;

                let html = `
                    <div class="qz-question-wrap qz-active">
                        <div class="qz-q-number">Câu ${n} / ${TOTAL}</div>
                        <p class="qz-q-text">${qData.question}</p>
                        <div class="qz-answers">
                `;

                qData.options.forEach((opt, idx) => {
                    const isSelected = answers[n] === idx;
                    html += `
                        <button type="button" class="qz-answer-btn ${isSelected ? 'qz-selected' : ''}" data-idx="${idx}">
                            <span class="qz-answer-icon">${idx + 1}</span>
                            ${opt.text}
                        </button>
                    `;
                });

                html += `
                        </div>
                    </div>
                `;
                qContainer.innerHTML = html;

                if (progress) {
                    progress.style.width = (n / TOTAL * 100) + '%';
                }
                progLbl.textContent = n + ' / ' + TOTAL;
            }

            function classify() {
                const scores = {
                    'EMBA': 0,
                    'MBA': 0,
                    'MBA_AI': 0,
                    'MSC_AI': 0,
                    'BBA': 0,
                    'FULL_BBA': 0,
                    'DUAL_DBA': 0
                };

                for (let q = 1; q <= TOTAL; q++) {
                    const selectedIdx = answers[q];
                    const qData = QUIZ_QUESTIONS[q - 1];
                    if (qData && selectedIdx !== undefined) {
                        const optionScores = qData.options[selectedIdx].scores;
                        for (const profile in optionScores) {
                            scores[profile] += optionScores[profile];
                        }
                    }
                }

                let bestProfile = CURRENT_PROGRAM;
                let maxScore = -1;

                const profilesList = ['EMBA', 'MBA_AI', 'MBA', 'MSC_AI', 'BBA', 'FULL_BBA', 'DUAL_DBA'];
                const index = profilesList.indexOf(CURRENT_PROGRAM);
                if (index > -1) {
                    profilesList.splice(index, 1);
                    profilesList.unshift(CURRENT_PROGRAM);
                }

                profilesList.forEach(profile => {
                    if (scores[profile] > maxScore) {
                        maxScore = scores[profile];
                        bestProfile = profile;
                    }
                });

                return bestProfile;
            }

            function showResult() {
                const type = classify();
                const matchedProg = PROGRAM_DETAILS[type];

                body.style.display = 'none';
                const progressWrap = document.querySelector('.qz-progress-wrap');
                if (progressWrap) progressWrap.style.display = 'none';

                const iconEl = document.getElementById('qz-result-icon');
                const grpEl = document.getElementById('qz-result-group');
                const titleEl = document.getElementById('qz-result-title');
                const msgEl = document.getElementById('qz-result-msg');

                if (type === CURRENT_PROGRAM) {
                    iconEl.textContent = '🎉';
                    grpEl.textContent = 'Xác nhận: Đây chính là chương trình dành cho bạn!';
                    grpEl.className = 'qz-result-group qz-result-group--strategic';
                    titleEl.textContent = `Bạn cực kỳ phù hợp với ${matchedProg.name}!`;
                    msgEl.innerHTML = `Lựa chọn của bạn hoàn toàn trùng khớp với chương trình hiện tại. Chương trình giúp bạn <strong>${matchedProg.highlight}</strong>.`;
                    ctaBtn.textContent = 'Nhận lộ trình cá nhân hoá — Miễn phí';
                    ctaBtn.href = 'javascript:void(0)';
                    ctaBtn.onclick = function (e) {
                        e.preventDefault();
                        close();
                        if (typeof window.openRegModal === 'function') {
                            window.openRegModal('quiz_result');
                        }
                    };
                } else {
                    iconEl.textContent = '💡';
                    grpEl.textContent = CURRENT_PROGRAM ? 'Gợi ý chương trình phù hợp hơn' : 'Gợi ý chương trình phù hợp';
                    grpEl.className = 'qz-result-group';
                    titleEl.textContent = CURRENT_PROGRAM ? `Bạn phù hợp hơn với ${matchedProg.name}!` : `Bạn phù hợp nhất với ${matchedProg.name}!`;
                    msgEl.innerHTML = `Câu trả lời của bạn phản ánh nhu cầu tập trung vào <strong>${matchedProg.highlight}</strong>. Hãy tìm hiểu chương trình này để đạt hiệu quả cao nhất.`;
                    ctaBtn.textContent = CURRENT_PROGRAM ? `Khám phá chương trình ${type} →` : `Khám phá ngay →`;
                    ctaBtn.href = matchedProg.url;
                    ctaBtn.onclick = function (e) {
                        e.preventDefault();
                        close();
                        window.location.href = matchedProg.url;
                    };
                }

                resultEl.classList.add('qz-active');
            }

            qContainer.addEventListener('click', function (e) {
                const btn = e.target.closest('.qz-answer-btn');
                if (!btn) return;

                const idx = parseInt(btn.dataset.idx);
                answers[current] = idx;

                qContainer.querySelectorAll('.qz-answer-btn').forEach(b => b.classList.remove('qz-selected'));
                btn.classList.add('qz-selected');

                setTimeout(() => {
                    if (current < TOTAL) {
                        current++;
                        renderQuestion(current);
                    } else {
                        showResult();
                    }
                }, 250);
            });

            closeBtn.addEventListener('click', close);
            overlay.addEventListener('click', function (e) {
                if (e.target === overlay) close();
            });
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') close();
            });

            restartBtn.addEventListener('click', reset);

            function reset() {
                current = 1;
                for (let k in answers) delete answers[k];
                body.style.display = '';
                const progressWrap = document.querySelector('.qz-progress-wrap');
                if (progressWrap) progressWrap.style.display = '';
                resultEl.classList.remove('qz-active');
                renderQuestion(1);
            }

            function open() {
                reset();
                overlay.classList.add('qz-open');
                document.body.style.overflow = 'hidden';
            }

            function close() {
                overlay.classList.remove('qz-open');
                document.body.style.overflow = '';
            }

            return { open, close };
        })();
    </script>
<script>
        function updateFAQHeights() {
            document.querySelectorAll('.faq-item.faq-open .faq-content').forEach(content => {
                content.style.maxHeight = content.scrollHeight + 40 + 'px';
            });
        }

        document.querySelectorAll('.faq-trigger').forEach(trigger => {
            trigger.addEventListener('click', () => {
                const item = trigger.parentElement;
                const content = item.querySelector('.faq-content');
                const icon = trigger.querySelector('.fa-chevron-down');
                const isOpen = item.classList.contains('faq-open');

                document.querySelectorAll('.faq-item').forEach(el => {
                    el.classList.remove('faq-open');
                    el.querySelector('.faq-content').style.maxHeight = '0px';
                    el.querySelector('.fa-chevron-down').style.transform = 'rotate(0deg)';
                    el.style.borderColor = '#e2e8f0';
                    el.style.boxShadow = 'none';
                });

                if (!isOpen) {
                    item.classList.add('faq-open');
                    content.style.maxHeight = content.scrollHeight + 40 + 'px';
                    icon.style.transform = 'rotate(180deg)';
                    item.style.borderColor = '#ab0e00';
                    item.style.boxShadow = '0 10px 25px rgba(171, 14, 0, 0.05)';
                }
            });
        });

        // Automatically open the first FAQ item on load
        window.addEventListener('DOMContentLoaded', () => {
            const firstTrigger = document.querySelector('.faq-trigger');
            if (firstTrigger) {
                firstTrigger.click();
            }
        });

        // Recalculate heights when fonts are loaded or window is resized
        if (document.fonts && document.fonts.ready) {
            document.fonts.ready.then(updateFAQHeights);
        }
        window.addEventListener('resize', updateFAQHeights);
    </script>
<script>
        // Only initialize Lenis on desktop/tablet to avoid weird native scroll friction on mobile touch
        if (window.innerWidth > 768) {
            window.lenis = new Lenis({
                duration: 1.2,
                easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
                direction: 'vertical',
                gestureDirection: 'vertical',
                smooth: true,
                mouseMultiplier: 1,
                smoothTouch: false,
                infinite: false,
            });

            function raf(time) {
                lenis.raf(time);
                requestAnimationFrame(raf);
            }

            requestAnimationFrame(raf);

            // Integrate Lenis with custom anchor link scrolling
            document.querySelectorAll('a[href^="#"]:not([href="#dang-ky"])').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetAttr = this.getAttribute('href');
                    if (targetAttr === '#') return;
                    const target = document.querySelector(targetAttr);
                    if (target) {
                        lenis.scrollTo(target, {
                            offset: -80,
                            duration: 1.2,
                            immediate: false
                        });
                    }
                });
            });
        }
    </script>
<script>
        function openVNCeremonyModal() {
            var m = document.getElementById('vn-ceremony-modal');
            if (m) {
                m.classList.add('open');
                if (typeof window.lockScroll === 'function') {
                    window.lockScroll();
                } else {
                    document.body.style.overflow = 'hidden';
                }
            }
        }
        function closeVNCeremonyModal() {
            var m = document.getElementById('vn-ceremony-modal');
            if (m) {
                m.classList.remove('open');
                if (typeof window.unlockScroll === 'function') {
                    window.unlockScroll();
                } else {
                    document.body.style.overflow = '';
                }
            }
        }
        document.getElementById('vn-ceremony-overlay')?.addEventListener('click', closeVNCeremonyModal);
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && document.getElementById('vn-ceremony-modal')?.classList.contains('open')) closeVNCeremonyModal(); });


        // AI Advisor Trigger
        let isChatTriggering = false;
        function triggerAIChat(programName) {
            if (isChatTriggering) return;
            isChatTriggering = true;
            setTimeout(() => { isChatTriggering = false; }, 3000);

            if (window.__mf_app && typeof window.__mf_app.toggle === 'function') {
                window.__mf_app.toggle(true);
            }
            const chatWidget = document.querySelector('.mf-ignore-tracking');
            if (chatWidget) {
                chatWidget.classList.add('open', 'full-screen');
            }
            const chatWindow = document.querySelector('.mf-window');
            if (chatWindow) {
                chatWindow.classList.add('open');
            }
            if (!chatWidget && !chatWindow && !window.__mf_app) {
                console.warn('Could not find chat widgets');
                if (typeof openBookingModal === 'function') {
                    openBookingModal();
                }
                return;
            }

            const textToSend = "Tôi muốn tư vấn lộ trình " + programName;
            setTimeout(() => {
                const inputEl = document.getElementById("mf-input");
                if (inputEl) {
                    inputEl.value = textToSend;
                    inputEl.dispatchEvent(new Event('input', { bubbles: true }));
                    setTimeout(() => {
                        const sendBtn = document.getElementById("mf-send");
                        if (sendBtn && !sendBtn.disabled) {
                            sendBtn.click();
                        }
                    }, 100);
                }
            }, 400);
        }
    </script>

    <!-- Shared Modals Template Part -->
    <?php get_template_part('shared-modals'); ?>

    <!-- WordPress Footer -->
    <?php get_footer(); ?>
</body>
</html>
