<?php
/**
 * The template for displaying the Cac Khoan Chi Phi page
 * Template Name: Premium Program Fees Template
 */
global $wp;

// Block unwanted old theme styles
ob_start(function ($html) {
    $html = preg_replace(
        '/<link[^>]+href=[\'"][^\'"]*LANDINGPAGE_MBA\/main\.css[^\'"]*[\'"][^>]*\/?>/',
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
            <title><?php echo $is_en ? 'Admissions & Academic Fees | IDEAS' : 'Các khoản chi phí & Lệ phí học vụ | IDEAS'; ?></title>
    <?php endif; ?>

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
            <meta name="description"
                content="<?php echo $is_en ? 'Detailed summary of academic service fees, recheck, retake, and redo fees for the Swiss UMEF program at IDEAS.' : 'Bảng tổng hợp chi tiết các khoản phí dịch vụ, lệ phí thi lại, học lại và quy định học vụ áp dụng cho chương trình đào tạo của Swiss UMEF.'; ?>" />
    <?php endif; ?><?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
            <meta property="og:type" content="article" />
            <meta property="og:title" content="<?php echo $is_en ? 'Admissions & Academic Fees - IDEAS' : 'Các khoản chi phí & Lệ phí học vụ - IDEAS'; ?>" />
            <meta property="og:description"
                content="<?php echo $is_en ? 'View detailed academic service fees (Recheck, Retake, Redo, Graduation...) for Swiss UMEF students at IDEAS.' : 'Xem bảng lệ phí chi tiết các hoạt động học vụ (Recheck, Retake, Redo, Lễ tốt nghiệp...) dành cho học viên chương trình Swiss UMEF.'; ?>" />
            <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2026/07/UMEFLOGO.webp" />
            <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />
    <?php endif; ?><!-- Booking Modal stylesheet -->
    <?php
    define('BOOKING_MODAL_CSS_LOADED', true);
    $bk_css_path = get_stylesheet_directory() . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/booking-modal.min.css?v=<?php echo $bk_css_version; ?>" media="print" onload="this.media='all'" />

    <style>
        /* ══════════════════════════════════════
           PROGRAM FEES – PREMIUM THEME STYLES
        ══════════════════════════════════════ */
        html,
        body {
            overflow-x: clip !important;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f4f6fb;
            color: #111827;
            background-image:
                radial-gradient(circle at 10% 20%, rgba(171, 14, 0, 0.04) 0%, transparent 50%),
                radial-gradient(circle at 90% 70%, rgba(171, 14, 0, 0.03) 0%, transparent 45%),
                radial-gradient(rgba(15, 23, 42, 0.03) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 26px 26px;
            background-attachment: scroll, scroll, fixed;
        }



        /* ── Sections ──────────────────────── */
        .fee-section {
            padding: 90px 20px;
        }

        .fee-section.first-section {
            padding-top: 130px;
        }

        .fee-container-width {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .fee-section-title-wrap {
            text-align: center;
            margin-bottom: 60px;
        }

        .fee-section-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(171, 14, 0, 0.06);
            color: #ab0e00;
            padding: 6px 16px;
            border-radius: 100px;
            font-size: 0.78rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 16px;
            border: 1px solid rgba(171, 14, 0, 0.1);
        }

        .fee-section-title {
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            font-weight: 850;
            color: #0f172a;
            margin: 0 0 16px 0;
            letter-spacing: -0.02em;
        }

        .fee-section-title span {
            color: #ab0e00;
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .fee-section-subtitle {
            font-size: 1.05rem;
            color: #4b5563;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* ── Modern Table Layout ────────────── */
        .fee-table-wrap {
            background: #ffffff;
            border-radius: 28px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.03);
            border: 1px solid #e2e8f0;
            padding: 50px;
            margin-top: 20px;
            position: relative;
            overflow: hidden;
        }

        .fee-table-wrap::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #8c1000 0%, #ab0e00 50%, #ff6b6b 100%);
        }

        .fee-table-split {
            display: grid;
            grid-template-columns: 0.95fr 1.05fr;
            gap: 60px;
            align-items: center;
        }

        .fee-table-visual {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            background: #f8fafc;
            border-radius: 20px;
            padding: 40px 30px;
            border: 1px dashed #e2e8f0;
            transition: all 0.3s ease;
        }

        .fee-table-visual:hover {
            border-color: rgba(171, 14, 0, 0.3);
            transform: translateY(-2px);
        }

        .fee-partner-logo {
            max-width: 160px;
            height: auto;
            margin-bottom: 24px;
        }

        .fee-partner-title {
            font-size: 1.4rem;
            font-weight: 800;
            color: #1e293b;
            margin: 0 0 10px 0;
        }

        .fee-partner-desc {
            font-size: 0.92rem;
            color: #64748b;
            line-height: 1.6;
            margin: 0 0 24px 0;
            max-width: 320px;
        }

        .fee-table-highlights {
            display: flex;
            flex-direction: column;
            gap: 12px;
            width: 100%;
        }

        .fee-hl-item {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #ffffff;
            padding: 12px 18px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.01);
            font-size: 0.9rem;
            font-weight: 600;
            color: #334155;
            border: 1px solid #f1f5f9;
        }

        .fee-hl-item i {
            color: #ab0e00;
            font-size: 1.05rem;
        }

        .fee-table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .fee-table-custom {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .fee-table-custom th {
            background: #f8fafc;
            padding: 18px 24px;
            font-size: 0.82rem;
            font-weight: 800;
            color: #475569;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 2px solid #e2e8f0;
        }

        .fee-table-custom td {
            padding: 18px 24px;
            font-size: 0.96rem;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }

        .fee-table-custom tr:last-child td {
            border-bottom: none;
        }

        .fee-table-custom tr:hover td {
            background-color: #fffbfb;
        }

        .fee-badge {
            background: rgba(171, 14, 0, 0.08);
            border: 1px solid rgba(171, 14, 0, 0.18);
            padding: 6px 16px;
            border-radius: 100px;
            color: #ab0e00;
            font-weight: 800;
            font-size: 0.88rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .fee-badge.highlight {
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff;
            border: none;
            box-shadow: 0 4px 10px rgba(171, 14, 0, 0.15);
        }

        .fee-badge.simple {
            background: #f1f5f9;
            border-color: #cbd5e1;
            color: #475569;
        }

        @media (max-width: 991px) {
            .fee-section {
                padding-top: 100px !important;
                padding-left: 20px !important;
                padding-right: 20px !important;
                padding-bottom: 50px !important;
            }

            .fee-section.first-section {
                padding-top: 100px !important;
            }

            .fee-table-wrap {
                padding: 24px 16px !important;
                border-radius: 20px !important;
            }

            .fee-table-split {
                grid-template-columns: 1fr;
                gap: 32px;
            }

            .fee-table-visual {
                max-width: 480px;
                margin: 0 auto;
                width: 100%;
                padding: 24px 16px !important;
            }

            .fee-hl-item {
                padding: 10px 12px !important;
                font-size: 0.82rem !important;
                gap: 8px !important;
                text-align: left;
            }

            .fee-table-custom th,
            .fee-table-custom td {
                padding: 12px 8px !important;
                font-size: 0.88rem !important;
            }

            .fee-badge {
                padding: 4px 10px !important;
                font-size: 0.8rem !important;
            }
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Site Header -->
    <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>


    <!-- MAIN SECTION (No Hero) -->
    <main class="ideas_main" style="gap:0; background:none;">
        <!-- SECTION: FEES TABLE -->
        <section class="fee-section" style="padding-top: 130px;">
            <div class="fee-container-width">
                <div class="fee-section-title-wrap">
                    <span class="fee-section-tag"><svg class="svg-icon fa-coins fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2c0 0 0 0 0 0s0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4l0 3.4 0 5.7 0 26.3zm32 0l0-32 0-25.9c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 44.2-86 80-192 80S0 476.2 0 432l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z"/></svg> <?php echo $is_en ? 'Academic Fees' : 'Lệ phí học vụ'; ?></span>
                    <h1 class="fee-section-title"><?php echo $is_en ? 'Swiss UMEF <span>Academic Fees</span>' : 'Chi Tiết <span>Các Khoản Phí</span> Swiss UMEF'; ?></h1>
                    <p class="fee-section-subtitle"><?php echo $is_en ? 'Applicable to students enrolled in Swiss-accredited Bachelor, Master, and Doctorate programs at IDEAS.' : 'Áp dụng cho học viên tham gia học tập các chương trình cử nhân, thạc sĩ và tiến sĩ liên kết Thụy Sĩ tại IDEAS.'; ?></p>
                </div>

                <div class="fee-table-wrap">
                    <div class="fee-table-split">
                        <!-- Left Column: Partner Info -->
                        <div class="fee-table-visual">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/07/UMEFLOGO.webp"
                                alt="Swiss UMEF Logo" class="fee-partner-logo" />
                            <h4 class="fee-partner-title">Swiss UMEF University</h4>
                            <p class="fee-partner-desc"><?php echo $is_en ? 'An internationally accredited university recognized by the Swiss Accreditation Council.' : 'Trường Đại học chuẩn quốc tế được công nhận bởi Hội đồng Kiểm định Thụy Sĩ (Swiss Accreditation Council).'; ?></p>

                            <div class="fee-table-highlights">
                                <div class="fee-hl-item">
                                    <svg class="svg-icon fa-circle-info fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336l24 0 0-64-24 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l48 0c13.3 0 24 10.7 24 24l0 88 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-80 0c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                                    <span><?php echo $is_en ? 'Currency calculated in Swiss Francs (CHF)' : 'Đơn vị tiền tệ tính bằng Franc Thụy Sĩ (CHF)'; ?></span>
                                </div>
                                <div class="fee-hl-item">
                                    <svg class="svg-icon fa-circle-check fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                                    <span><?php echo $is_en ? 'Public and transparent as per accreditation standards' : 'Công khai, minh bạch theo chuẩn kiểm định'; ?></span>
                                </div>
                                <div class="fee-hl-item">
                                    <svg class="svg-icon fa-shield-halved fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 0c4.6 0 9.2 1 13.4 2.9L457.7 82.8c22 9.3 38.4 31 38.3 57.2c-.5 99.2-41.3 280.7-213.6 363.2c-16.7 8-36.1 8-52.8 0C57.3 420.7 16.5 239.2 16 140c-.1-26.2 16.3-47.9 38.3-57.2L242.7 2.9C246.8 1 251.4 0 256 0zm0 66.8l0 378.1C394 378 431.1 230.1 432 141.4L256 66.8s0 0 0 0z"/></svg>
                                    <span><?php echo $is_en ? 'Applied consistently throughout the course' : 'Áp dụng thống nhất trong toàn bộ khóa học'; ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Table Content -->
                        <div class="fee-table-responsive">
                            <table class="fee-table-custom">
                                <thead>
                                    <tr>
                                        <th><?php echo $is_en ? 'Fee Category' : 'Loại phí học vụ'; ?></th>
                                        <th style="width:170px; text-align:center;"><?php echo $is_en ? 'Fee Amount' : 'Lệ phí'; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $is_en ? 'Exam Recheck Fee' : 'Phí phúc khảo bài thi (Recheck)'; ?></td>
                                        <td style="text-align:center;"><span class="fee-badge">200 CHF</span></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $is_en ? 'Module Retake Fee' : 'Phí thi lại môn học (Retake)'; ?></td>
                                        <td style="text-align:center;"><span class="fee-badge">200 CHF</span></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $is_en ? 'Module Redo Fee' : 'Phí học lại môn học (Redo)'; ?></td>
                                        <td style="text-align:center;"><span class="fee-badge">300 CHF</span></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $is_en ? 'Swiss Canton & Consulate Fees' : 'Lệ phí Canton &amp; Lãnh sự Thụy Sĩ'; ?></td>
                                        <td style="text-align:center;">
                                            <span class="fee-badge highlight">~400 CHF</span>
                                            <div
                                                style="font-size:0.75rem; color:#64748b; font-weight:600; margin-top:4px;">
                                                <?php echo $is_en ? '(estimated, varies by cohort)' : '(dự kiến, tùy đợt)'; ?></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $is_en ? 'Program Transfer Fee' : 'Lệ phí chuyển đổi chương trình học'; ?></td>
                                        <td style="text-align:center;"><span class="fee-badge">350 CHF</span></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $is_en ? 'Administrative Fee' : 'Phí quản lý hành chính (Administration fee)'; ?></td>
                                        <td style="text-align:center;"><span class="fee-badge">150 CHF</span></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $is_en ? 'Graduation Ceremony Fee' : 'Lệ phí tham dự Lễ Tốt Nghiệp'; ?></td>
                                        <td style="text-align:center;"><span class="fee-badge simple"><?php echo $is_en ? 'Varies by cohort' : 'Tùy từng đợt'; ?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>







    <!-- Script imports -->
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