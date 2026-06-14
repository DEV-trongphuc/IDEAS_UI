<?php
/**
 * The template for displaying the Organization Chart page
 * Template Name: Premium Organization Chart Template
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

    <!-- Preconnect to external domains for faster resource loading --><?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php echo $is_en ? 'Organizational Chart & Staff Structure | IDEAS' : 'Sơ đồ tổ chức & Cơ cấu nhân sự | IDEAS'; ?></title>
    <?php endif; ?>
    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta name="description"
            content="<?php echo $is_en ? 'Explore the IDEAS organizational chart featuring a professional executive team, scientific advisory board, and dedicated admissions advisors.' : 'Khám phá sơ đồ tổ chức của IDEAS với đội ngũ điều hành chuyên nghiệp, hội đồng khoa học chuyên môn và các tư vấn viên tận tâm.'; ?>" />
    <?php endif; ?><?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $is_en ? 'Organizational Chart & Staff Structure | IDEAS' : 'Sơ đồ tổ chức & Cơ cấu nhân sự | IDEAS'; ?>" />
        <meta property="og:description"
            content="<?php echo $is_en ? 'A journey of professional and sustainable academic support with a fully optimized staff structure.' : 'Hành trình hỗ trợ học vụ chuyên nghiệp và bền vững với bộ máy nhân sự được tối ưu hóa toàn diện.'; ?>" />
        <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp" />
        <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />
    <?php endif; ?><!-- Main stylesheet --><!-- Booking Modal stylesheet -->
    <?php
    define('BOOKING_MODAL_CSS_LOADED', true);
    $bk_css_path = get_stylesheet_directory() . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/booking-modal.min.css?v=<?php echo $bk_css_version; ?>" media="print" onload="this.media='all'" />

    <style>
        :root {
            --line-color: rgba(148, 163, 184, 0.35);
            /* Faint gray-blue connector lines */
        }

        /* ══════════════════════════════════════
           ORGANIZATION CHART – PREMIUM LIGHT THEME
        ══════════════════════════════════════ */
        html,
        body {
            overflow-x: clip !important;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            background-color: #f4f6fb;
            color: #1e293b;
            background-image:
                radial-gradient(circle at 10% 20%, rgba(171, 14, 0, 0.04) 0%, transparent 50%),
                radial-gradient(circle at 90% 70%, rgba(171, 14, 0, 0.03) 0%, transparent 45%),
                radial-gradient(rgba(171, 14, 0, 0.04) 1.5px, transparent 1.5px);
            background-size: 100% 100%, 100% 100%, 30px 30px;
            background-attachment: scroll, scroll, scroll;
            position: relative;
        }

        .bg-decorations {
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .bg-decor-icon {
            position: absolute;
            color: rgba(171, 14, 0, 0.035);
            pointer-events: none;
            user-select: none;
        }

        /* Hero Area */
        .org-hero {
            position: relative;
            padding: 130px 20px 70px;
            text-align: center;
        }

        .org-hero-badge {
            background: rgba(171, 14, 0, 0.07);
            border: 1px solid rgba(171, 14, 0, 0.22);
            padding: 8px 18px;
            border-radius: 100px;
            color: #ab0e00;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
        }

        .org-hero h1 {
            font-size: clamp(2.2rem, 5vw, 3rem);
            font-weight: 850;
            color: #0f172a;
            margin-bottom: 12px;
            letter-spacing: -0.02em;
        }

        .org-hero h1 span {
            background: linear-gradient(135deg, #ff4444 0%, #ab0e00 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .org-hero p {
            font-size: 1.05rem;
            color: #4b5563;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* ── Tree Layout ───────────────────── */
        .org-tree-section {
            padding: 40px 20px 100px;
        }

        .org-tree-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .canvas-viewport .org-tree-container {
            max-width: none !important;
            width: max-content !important;
        }

        /* Vertical Connector Line */
        .org-tree-line {
            width: 2px;
            height: 45px;
            margin-bottom: -10px;
            background: var(--line-color);
            position: relative;
            z-index: 1;
        }

        .org-tree-line.sub-line {
            height: 35px;
            margin-bottom: -10px;
        }

        /* Primary Executive Node */
        .org-node {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
            text-align: center;
            position: relative;
            z-index: 10;
            transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
            width: 320px;
            box-sizing: border-box;
        }

        .org-node:hover {
            transform: translateY(-5px);
            border-color: rgba(171, 14, 0, 0.25);
            box-shadow: 0 12px 30px rgba(171, 14, 0, 0.08);
        }

        /* Node Link Specifics */
        a.org-node-link {
            text-decoration: none;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            padding: 20px 24px;
            width: 320px;
            text-align: left;
            box-sizing: border-box;
        }

        a.org-node-link .org-node-arrow {
            font-size: 1.1rem;
            color: #94a3b8;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        a.org-node-link:hover .org-node-arrow {
            transform: translateX(4px);
            color: #ab0e00;
        }

        /* Node Details */
        .org-node-avatar {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #f1f5f9;
            margin: 0 auto 12px;
            display: block;
            background: #f1f5f9;
        }

        a.org-node-link .org-node-avatar {
            margin: 0 16px 0 0;
            width: 60px;
            height: 60px;
        }

        .org-node-body-horizontal {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .org-node-avatar-placeholder {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff8a8a 0%, #ab0e00 100%);
            color: #ffffff;
            font-size: 1.4rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 3px solid #f1f5f9;
            margin: 0 auto 12px;
            box-shadow: 0 4px 10px rgba(171, 14, 0, 0.12);
        }

        .org-node-role {
            font-size: 0.72rem;
            font-weight: 800;
            color: #ab0e00;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 5px;
        }

        .org-node-name {
            font-size: 1.05rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 5px;
            line-height: 1.3;
        }

        .org-node-info {
            font-size: 0.8rem;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 5px;
        }

        a.org-node-link .org-node-info {
            justify-content: flex-start;
        }

        .org-node-info a {
            color: inherit;
            text-decoration: none;
            transition: color 0.2s;
        }

        .org-node-info a:hover {
            color: #ab0e00;
        }

        /* ── Columns / Branches ────────────── */
        .org-branches {
            display: flex;
            justify-content: center;
            position: relative;
            width: 100%;
            gap: 32px;
        }

        .org-branch-col {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            flex: 0 0 auto;
            width: 320px;
            box-sizing: border-box;
        }

        .org-branch-col.has-consultants {
            width: 1140px;
            flex: 0 0 auto;
            box-sizing: border-box;
        }

        .org-branch-col.has-sub-branches {
            width: auto;
            flex: 0 0 auto;
            max-width: none;
        }

        /* Desktop vertical connector to branches */
        .org-branch-col::before {
            content: '';
            width: 2px;
            height: 20px;
            background: var(--line-color);
            z-index: 1;
        }

        /* Desktop horizontal connector bar spanning columns center-to-center */
        .org-branch-col::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--line-color);
            z-index: 1;
        }

        .org-branch-col:first-child::after {
            left: 50%;
        }

        .org-branch-col:last-child::after {
            right: 50%;
        }

        .consultant-avatar-placeholder {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff8a8a 0%, #ab0e00 100%);
            color: #ffffff;
            font-size: 1rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #f1f5f9;
            flex-shrink: 0;
            box-shadow: 0 2px 6px rgba(171, 14, 0, 0.12);
        }

        .consultants-warning {
            grid-column: span 4;
            background: #fffbeb;
            border: 1px solid #fef3c7;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 0.8rem;
            color: #b45309;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            text-align: left;
            line-height: 1.4;
            box-shadow: 0 2px 8px rgba(217, 119, 6, 0.04);
            width: 100%;
            box-sizing: border-box;
        }

        .consultants-warning i {
            color: #d97706;
            font-size: 1.1rem;
            margin-top: 1px;
            flex-shrink: 0;
        }

        /* ── Consultants (Tư vấn viên) ───────── */
        .consultants-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            width: 100%;
            margin-top: 10px;
        }

        .consultants-title {
            text-align: center;
            font-size: 0.74rem;
            font-weight: 800;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin: 8px 0 2px;
        }

        .consultant-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 12px 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.02);
            transition: all 0.3s ease;
            text-align: left;
        }

        .consultant-card:hover {
            transform: translateY(-3px);
            border-color: rgba(171, 14, 0, 0.2);
            box-shadow: 0 8px 20px rgba(171, 14, 0, 0.06);
        }

        .consultant-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #f1f5f9;
            flex-shrink: 0;
            background: #f1f5f9;
        }

        .consultant-body {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .consultant-name {
            font-size: 0.92rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 2px;
        }

        .consultant-role {
            font-size: 0.68rem;
            font-weight: 700;
            color: #ab0e00;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .consultant-info {
            font-size: 0.76rem;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 6px;
            margin-top: 3px;
        }

        .consultant-info a {
            color: inherit;
            text-decoration: none;
            transition: color 0.2s;
        }

        .consultant-info a:hover {
            color: #ab0e00;
        }

        /* ── Responsive Styling ───────────── */
        @media (max-width: 992px) {
            .org-tree-section {
                padding: 20px 16px 80px;
            }

            .org-tree-container {
                align-items: stretch;
                padding-left: 36px;
            }

            /* Draw the single vertical trunk line */
            .org-tree-container::before {
                content: '';
                position: absolute;
                top: 46px;
                /* Aligns exactly with vertical center of first card */
                bottom: 46px;
                /* Aligns exactly with vertical center of last card */
                left: 12px;
                width: 2px;
                background: var(--line-color);
                z-index: 1;
            }

            /* Hide default spacer lines between levels */
            .org-tree-line {
                display: none !important;
            }

            /* Reset fixed widths outside canvas for vertical responsive stack */
            .org-tree-container .org-node {
                width: 100% !important;
                max-width: 100% !important;
            }

            .org-tree-container a.org-node-link {
                width: 100% !important;
                max-width: 100% !important;
            }

            .org-tree-container .org-branch-col {
                width: 100% !important;
                max-width: 100% !important;
                flex: 1 1 auto !important;
            }

            /* Flex layout to align avatar left and details right on mobile */
            .org-node:not(.org-node-link) {
                display: flex;
                align-items: center;
                text-align: left;
                padding: 16px 20px;
                max-width: 100%;
                width: 100%;
                margin-bottom: 24px;
                gap: 16px;
            }

            .org-node:not(.org-node-link) .org-node-avatar,
            .org-node:not(.org-node-link) .org-node-avatar-placeholder {
                margin: 0;
                width: 60px;
                height: 60px;
                flex-shrink: 0;
            }

            .org-node:not(.org-node-link) .org-node-avatar-placeholder {
                font-size: 1.15rem;
            }

            .org-node-body {
                display: flex;
                flex-direction: column;
                flex-grow: 1;
                gap: 4px;
                text-align: left;
            }

            .org-node:not(.org-node-link) .org-node-role,
            .org-node:not(.org-node-link) .org-node-name,
            .org-node:not(.org-node-link) .org-node-info {
                margin: 0;
            }

            .org-node:not(.org-node-link) .org-node-info {
                justify-content: flex-start;
            }

            /* Connector line from standard card to vertical trunk line */
            .org-node::before {
                content: '';
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                left: -24px;
                /* Matches padding-left(36px) - trunk offset(12px) */
                width: 24px;
                height: 2px;
                background: var(--line-color);
                z-index: 2;
            }

            /* Flex layout and card sizing for links */
            a.org-node-link {
                max-width: 100%;
                width: 100%;
                padding: 16px 20px;
                margin-bottom: 24px;
            }

            a.org-node-link .org-node-avatar {
                margin: 0 16px 0 0;
                width: 60px;
                height: 60px;
            }

            /* Branches structure */
            .org-branches {
                flex-direction: column;
                align-items: stretch;
                gap: 0;
            }

            .org-branch-col {
                max-width: 100%;
                width: 100%;
                align-items: stretch;
            }

            .org-branch-col::before,
            .org-branch-col::after {
                display: none !important;
            }

            /* Nesting consultants sub-tree under Mai Nu card */
            .consultants-title {
                text-align: left;
                margin: 0 0 12px 24px;
                font-size: 0.72rem;
            }

            .consultants-grid {
                width: calc(100% - 24px);
                margin: 0 0 24px 24px;
                position: relative;
                padding-left: 20px;
                gap: 12px;
                display: flex !important;
                flex-direction: column !important;
            }

            /* Vertical sub-trunk inside consultants list */
            .consultants-grid::before {
                content: '';
                position: absolute;
                top: -10px;
                bottom: 40px;
                /* Aligns with vertical center of last consultant card */
                left: 0;
                width: 2px;
                background: var(--line-color);
                z-index: 1;
            }

            .consultant-card {
                position: relative;
                max-width: 100%;
            }

            /* Consultant card horizontal connector to sub-trunk */
            .consultant-card::before {
                content: '';
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                left: -20px;
                width: 20px;
                height: 2px;
                background: var(--line-color);
                z-index: 2;
            }

            .org-hero {
                padding: 110px 16px 40px !important;
            }
        }

        /* ── Canvas Viewport ───────────────── */
        .canvas-viewport {
            position: relative;
            width: 100%;
            height: 720px;
            border: 1px solid rgba(171, 14, 0, 0.08);
            border-radius: 28px;
            background-color: #f8fafc;
            overflow: hidden;
            cursor: grab;
            user-select: none;
            box-shadow: inset 0 2px 8px rgba(15, 23, 42, 0.04), 0 10px 30px rgba(0, 0, 0, 0.02);
            touch-action: none;
            margin: 0 auto;
            background-image: radial-gradient(rgba(171, 14, 0, 0.04) 1.5px, transparent 1.5px);
            background-size: 24px 24px;
        }

        .canvas-viewport:active {
            cursor: grabbing;
        }

        .canvas-content {
            position: absolute;
            top: 0;
            left: 0;
            transform-origin: 0 0;
            will-change: transform;
            padding: 80px 100px;
            box-sizing: border-box;
            display: inline-block;
        }

        body {
            background-attachment: fixed;
        }

        /* Floating canvas controls */
        .canvas-controls {
            position: absolute;
            bottom: 24px;
            right: 24px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            z-index: 100;
        }

        .canvas-controls button {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            border: 1px solid rgba(226, 232, 240, 0.9);
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.06);
            color: #475569;
            font-size: 1.05rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.165, 0.84, 0.44, 1);
            outline: none;
        }

        .canvas-controls button:hover {
            background: #ffffff;
            color: #ab0e00;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(171, 14, 0, 0.14);
            border-color: rgba(171, 14, 0, 0.2);
        }

        .canvas-controls button:active {
            transform: translateY(0);
        }

        .org-branch-col.has-sub-branches {
            max-width: none;
            width: auto;
        }

        /* Inside canvas, preserve desktop horizontal layout on mobile */
        @media (max-width: 992px) {
            .canvas-viewport .org-tree-container {
                align-items: center;
                padding-left: 0;
            }

            .canvas-viewport .org-tree-container::before {
                display: none !important;
            }

            .canvas-viewport .org-tree-line {
                display: block !important;
            }

            .canvas-viewport .org-node:not(.org-node-link) {
                display: block;
                text-align: center;
                padding: 24px;
                width: 320px !important;
                margin-bottom: 0;
                gap: 0;
            }

            .canvas-viewport .org-node-body {
                text-align: center;
            }

            .canvas-viewport .org-node:not(.org-node-link) .org-node-info {
                justify-content: center;
            }

            .canvas-viewport .org-node::before {
                display: none !important;
            }

            .canvas-viewport .org-branches {
                flex-direction: row;
                align-items: flex-start;
                gap: 32px;
            }

            .canvas-viewport .org-branch-col {
                width: 320px !important;
                flex: 0 0 auto !important;
                align-items: center;
            }

            .canvas-viewport .org-branch-col.has-consultants {
                width: 1140px !important;
                flex: 0 0 auto !important;
            }

            .canvas-viewport .org-branch-col.has-sub-branches {
                width: auto !important;
                flex: 0 0 auto !important;
            }

            .canvas-viewport .org-branch-col::before,
            .canvas-viewport .org-branch-col::after {
                display: block !important;
            }

            .canvas-viewport .consultants-grid::before {
                display: none !important;
            }

            .canvas-viewport .consultant-card::before {
                display: none !important;
            }

            .canvas-viewport .consultants-grid {
                width: 100%;
                margin: 10px 0 0 0;
                padding-left: 0;
                display: grid !important;
                grid-template-columns: repeat(4, 1fr) !important;
                gap: 14px;
            }

            /* main layout outside canvas */
            .org-tree-container .org-trunk-container {
                display: flex;
                flex-direction: column;
                height: auto;
                align-items: stretch;
                position: relative;
                width: 100%;
            }

            .org-tree-container .org-vertical-trunk {
                display: none !important;
            }

            .org-tree-container .org-side-branch-left {
                position: static !important;
                transform: none !important;
                display: block !important;
                width: 100% !important;
            }

            .org-tree-container .org-horizontal-connector {
                display: none !important;
            }

            /* Restore for canvas viewport on mobile */
            .canvas-viewport .org-trunk-container {
                display: flex !important;
                flex-direction: row !important;
                height: 190px !important;
                align-items: center !important;
                justify-content: center !important;
                position: relative !important;
                width: 100% !important;
            }

            .canvas-viewport .org-vertical-trunk {
                display: block !important;
                position: absolute !important;
                top: 0 !important;
                bottom: -20px !important;
                left: 50% !important;
                transform: translateX(-50%) !important;
                width: 2px !important;
                background: var(--line-color) !important;
                z-index: 1 !important;
            }

            .canvas-viewport .org-side-branch-left {
                position: absolute !important;
                right: calc(50% + 40px) !important;
                top: 50% !important;
                transform: translateY(-50%) !important;
                display: flex !important;
                align-items: center !important;
                z-index: 10 !important;
                width: auto !important;
            }

            .canvas-viewport .org-horizontal-connector {
                display: block !important;
                width: 40px !important;
                height: 2px !important;
                background: var(--line-color) !important;
            }
        }

        /* ── Advisory Council Custom Layout ── */
        .org-trunk-container {
            position: relative;
            width: 100%;
            height: 190px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .org-vertical-trunk {
            position: absolute;
            top: 0;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            background: var(--line-color);
            z-index: 1;
        }

        .org-side-branch-left {
            position: absolute;
            right: calc(50% + 40px);
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            z-index: 10;
        }

        .org-horizontal-connector {
            width: 40px;
            height: 2px;
            background: var(--line-color);
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Background Decorative Icons -->
    <div class="bg-decorations" aria-hidden="true">
        <svg class="svg-icon fa-sitemap fa-solid bg-decor-icon" style="top: 15%; left: 4%; transform: rotate(15deg); font-size: 8rem;" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M208 80c0-26.5 21.5-48 48-48l64 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-8 0 0 40 152 0c30.9 0 56 25.1 56 56l0 32 8 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-64 0c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48l8 0 0-32c0-4.4-3.6-8-8-8l-152 0 0 40 8 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-64 0c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48l8 0 0-40-152 0c-4.4 0-8 3.6-8 8l0 32 8 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-64 0c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48l8 0 0-32c0-30.9 25.1-56 56-56l152 0 0-40-8 0c-26.5 0-48-21.5-48-48l0-64z"/></svg>
        <svg class="svg-icon fa-users fa-solid bg-decor-icon" style="top: 35%; right: 4%; transform: rotate(-20deg); font-size: 7.5rem;" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
        <svg class="svg-icon fa-network-wired fa-solid bg-decor-icon" style="top: 55%; left: 3%; transform: rotate(-10deg); font-size: 7rem;" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 64l128 0 0 64-128 0 0-64zM240 0c-26.5 0-48 21.5-48 48l0 96c0 26.5 21.5 48 48 48l48 0 0 32L32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l96 0 0 32-48 0c-26.5 0-48 21.5-48 48l0 96c0 26.5 21.5 48 48 48l160 0c26.5 0 48-21.5 48-48l0-96c0-26.5-21.5-48-48-48l-48 0 0-32 256 0 0 32-48 0c-26.5 0-48 21.5-48 48l0 96c0 26.5 21.5 48 48 48l160 0c26.5 0 48-21.5 48-48l0-96c0-26.5-21.5-48-48-48l-48 0 0-32 96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-256 0 0-32 48 0c26.5 0 48-21.5 48-48l0-96c0-26.5-21.5-48-48-48L240 0zM96 448l0-64 128 0 0 64L96 448zm320-64l128 0 0 64-128 0 0-64z"/></svg>
        <svg class="svg-icon fa-graduation-cap fa-solid bg-decor-icon" style="top: 72%; right: 3%; transform: rotate(25deg); font-size: 8rem;" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/></svg>
        <svg class="svg-icon fa-award fa-solid bg-decor-icon" style="top: 88%; left: 5%; transform: rotate(-15deg); font-size: 7.5rem;" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"/></svg>
    </div>

    <!-- Site Header -->
    <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>


    <!-- Hero Section -->
    <section class="org-hero">
        <div class="org-hero-badge">
            <svg class="svg-icon fa-sitemap fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M208 80c0-26.5 21.5-48 48-48l64 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-8 0 0 40 152 0c30.9 0 56 25.1 56 56l0 32 8 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-64 0c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48l8 0 0-32c0-4.4-3.6-8-8-8l-152 0 0 40 8 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-64 0c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48l8 0 0-40-152 0c-4.4 0-8 3.6-8 8l0 32 8 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-64 0c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48l8 0 0-32c0-30.9 25.1-56 56-56l152 0 0-40-8 0c-26.5 0-48-21.5-48-48l0-64z"/></svg>
            <?php echo $is_en ? 'Staff Structure' : 'Bộ máy nhân sự'; ?>
        </div>
        <h1><?php echo $is_en ? 'Organizational Structure &amp; <span>Staff Chart</span>' : 'Cơ Cấu Tổ Chức &amp; <span>Sơ Đồ Nhân Sự</span>'; ?></h1>
        <p><?php echo $is_en ? 'Scientific operating regulations, a streamlined management structure, and a team of professional academic specialists accompanying IDEAS students.' : 'Quy chế hoạt động khoa học, bộ máy quản lý tinh gọn cùng đội ngũ chuyên viên học vụ chuyên nghiệp đồng hành\n            cùng học viên IDEAS.'; ?></p>
    </section>

    <!-- Tree Flow Section -->
    <section class="org-tree-section">
        <div class="canvas-viewport" id="org-canvas-viewport">
            <!-- Floating Canvas Controls -->
            <div class="canvas-controls">
                <button type="button" id="btn-zoom-in" title="<?php echo $is_en ? 'Zoom In' : 'Phóng to'; ?>" aria-label="<?php echo $is_en ? 'Zoom In' : 'Phóng to'; ?>"><svg class="svg-icon fa-plus fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg></button>
                <button type="button" id="btn-zoom-out" title="<?php echo $is_en ? 'Zoom Out' : 'Thu nhỏ'; ?>" aria-label="<?php echo $is_en ? 'Zoom Out' : 'Thu nhỏ'; ?>"><svg class="svg-icon fa-minus fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z"/></svg></button>
                <button type="button" id="btn-zoom-reset" title="<?php echo $is_en ? 'Reset View' : 'Đặt lại góc nhìn'; ?>" aria-label="<?php echo $is_en ? 'Reset View' : 'Đặt lại góc nhìn'; ?>"><svg class="svg-icon fa-arrows-to-eye fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M15 15C24.4 5.7 39.6 5.7 49 15l63 63L112 40c0-13.3 10.7-24 24-24s24 10.7 24 24l0 96c0 13.3-10.7 24-24 24l-96 0c-13.3 0-24-10.7-24-24s10.7-24 24-24l38.1 0L15 49C5.7 39.6 5.7 24.4 15 15zM133.5 243.9C158.6 193.6 222.7 112 320 112s161.4 81.6 186.5 131.9c3.8 7.6 3.8 16.5 0 24.2C481.4 318.4 417.3 400 320 400s-161.4-81.6-186.5-131.9c-3.8-7.6-3.8-16.5 0-24.2zM320 320a64 64 0 1 0 0-128 64 64 0 1 0 0 128zM591 15c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-63 63 38.1 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-96 0c-13.3 0-24-10.7-24-24l0-96c0-13.3 10.7-24 24-24s24 10.7 24 24l0 38.1 63-63zM15 497c-9.4-9.4-9.4-24.6 0-33.9l63-63L40 400c-13.3 0-24-10.7-24-24s10.7-24 24-24l96 0c13.3 0 24 10.7 24 24l0 96c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-38.1L49 497c-9.4 9.4-24.6 9.4-33.9 0zm576 0l-63-63 0 38.1c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-96c0-13.3 10.7-24 24-24l96 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-38.1 0 63 63c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0z"/></svg></button>
            </div>

            <div class="canvas-content" id="org-canvas-content">
                <div class="org-tree-container">

                    <!-- LEVEL 1: Viện Trưởng -->
                    <div class="org-node">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/vientruong_avt-optimized.webp"
                            class="org-node-avatar" alt="<?php echo $is_en ? 'Director of IDEAS - Dr. Pham Quang Vinh' : 'Viện trưởng IDEAS - TS. Phạm Quang Vinh'; ?>">
                        <div class="org-node-body">
                            <div class="org-node-role"><?php echo $is_en ? 'Dean / Director' : 'Viện Trưởng'; ?></div>
                            <h3 class="org-node-name">TS. Phạm Quang Vinh</h3>
                            <div class="org-node-info">
                                <svg class="svg-icon fa-envelope fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                                <a href="mailto:vinhpq@ideas.edu.vn">vinhpq@ideas.edu.vn</a>
                            </div>
                        </div>
                    </div>

                    <!-- Trunk with Side Branch (Advisory Council) -->
                    <div class="org-trunk-container">
                        <!-- Vertical Trunk Line -->
                        <div class="org-vertical-trunk"></div>

                        <!-- Side Branch: Hội đồng chuyên môn -->
                        <div class="org-side-branch-left">
                            <a href="/doi-ngu-giang-vien" title="<?php echo $is_en ? 'IDEAS Academic Board' : 'Hội đồng chuyên môn IDEAS'; ?>"
                                class="org-node org-node-link">
                                <img src="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp"
                                    class="org-node-avatar" alt="<?php echo $is_en ? 'Academic Board' : 'Hội đồng chuyên môn'; ?>">
                                <div class="org-node-body-horizontal">
                                    <div class="org-node-role" style="margin-bottom:2px;"><?php echo $is_en ? 'Academic Board' : 'Hội đồng chuyên môn'; ?></div>
                                    <div class="org-node-name" style="margin-bottom:0; font-size:0.95rem;"><svg class="svg-icon fa-user-group fa-solid" style="font-size:0.85rem; color:#ab0e00; margin-right:4px;" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM609.3 512l-137.8 0c5.4-9.4 8.6-20.3 8.6-32l0-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2l61.4 0C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z"/></svg> <?php echo $is_en ? 'Faculty &amp; Advisors' : 'Giảng viên – cố vấn'; ?></div>
                                </div>
                                <svg class="svg-icon fa-angle-right fa-solid org-node-arrow" viewBox="0 0 320 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/></svg>
                            </a>
                            <!-- Horizontal perpendicular connector line -->
                            <div class="org-horizontal-connector"></div>
                        </div>
                    </div>

                    <!-- LEVEL 3: Division Heads (3 Columns) -->
                    <div class="org-branches">

                        <!-- COLUMN 1: Mai Nữ & Departments -->
                        <div class="org-branch-col has-sub-branches">
                            <div class="org-node">
                                <img src="https://ideas.edu.vn/wp-content/uploads/2025/04/mainu_avt.webp"
                                    class="org-node-avatar" alt="<?php echo $is_en ? 'Head of Department - Mai Nu' : 'Trưởng phòng Kinh doanh - Mai Nữ'; ?>">
                                <div class="org-node-body">
                                    <div class="org-node-role"><?php echo $is_en ? 'Division Head' : 'Trưởng Khối'; ?></div>
                                    <h3 class="org-node-name">Mai Nữ</h3>
                                    <div class="org-node-role"
                                        style="font-size:0.64rem; color:#64748b; margin-top:2px; font-weight:700;"><?php echo $is_en ? 'Business &amp; Student Experience' : 'Kinh Doanh &amp; Trải Nghiệm Học Viên'; ?></div>
                                    <div class="org-node-info">
                                        <svg class="svg-icon fa-envelope fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                                        <a href="mailto:info@ideas.edu.vn">info@ideas.edu.vn</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Line down to departments -->
                            <div class="org-tree-line"></div>

                            <div class="org-branches">
                                <!-- Department 1.1: Phòng Sale -->
                                <div class="org-branch-col has-consultants">
                                    <div class="org-node">
                                        <div class="org-node-avatar-placeholder">KL</div>
                                        <div class="org-node-body">
                                            <div class="org-node-role">Sale Admin</div>
                                            <h3 class="org-node-name">Đặng Khánh Linh</h3>
                                        </div>
                                    </div>

                                    <!-- Line down to advisors -->
                                    <div class="org-tree-line sub-line"></div>
                                    <div class="consultants-title"><svg class="svg-icon fa-headset fa-solid" style="margin-right:4px; color:#ab0e00;" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 48C141.1 48 48 141.1 48 256l0 40c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-40C0 114.6 114.6 0 256 0S512 114.6 512 256l0 144.1c0 48.6-39.4 88-88.1 88L313.6 488c-8.3 14.3-23.8 24-41.6 24l-32 0c-26.5 0-48-21.5-48-48s21.5-48 48-48l32 0c17.8 0 33.3 9.7 41.6 24l110.4 .1c22.1 0 40-17.9 40-40L464 256c0-114.9-93.1-208-208-208zM144 208l16 0c17.7 0 32 14.3 32 32l0 112c0 17.7-14.3 32-32 32l-16 0c-35.3 0-64-28.7-64-64l0-48c0-35.3 28.7-64 64-64zm224 0c35.3 0 64 28.7 64 64l0 48c0 35.3-28.7 64-64 64l-16 0c-17.7 0-32-14.3-32-32l0-112c0-17.7 14.3-32 32-32l16 0z"/></svg> <?php echo $is_en ? 'Admissions Advisor' : 'Tư vấn viên tuyển sinh'; ?></div>

                                    <div class="consultants-grid">
                                        <div class="consultants-warning">
                                            <svg class="svg-icon fa-triangle-exclamation fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480L40 480c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24l0 112c0 13.3 10.7 24 24 24s24-10.7 24-24l0-112c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg>
                                            <div>
                                                 <strong><?php echo $is_en ? 'ALERT:' : 'CẢNH BÁO:'; ?></strong> <?php echo $is_en ? 'Be cautious of unknown phone numbers pretending to be IDEAS admissions advisors.' : 'Cảnh giác với các số điện thoại lạ mạo danh\n                                                 là tư vấn viên tuyển sinh của IDEAS.'; ?>
                                            </div>
                                        </div>

                                        <article class="consultant-card">
                                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/cphuc.webp"
                                                class="consultant-avatar" alt="Lưu Phan Hoàng Phúc" loading="lazy" decoding="async">
                                            <div class="consultant-body">
                                                <h4 class="consultant-name">Lưu Phan Hoàng Phúc</h4>
                                                <span class="consultant-role"><?php echo $is_en ? 'Advisor' : 'Tư vấn viên'; ?></span>
                                                <div class="consultant-info">
                                                    <svg class="svg-icon fa-phone fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                                                    <strong>*********017</strong>
                                                </div>
                                            </div>
                                        </article>

                                        <article class="consultant-card">
                                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/cdan.webp"
                                                class="consultant-avatar" alt="Nguyễn Thị Linh Đan" loading="lazy" decoding="async">
                                            <div class="consultant-body">
                                                <h4 class="consultant-name">Nguyễn Thị Linh Đan</h4>
                                                <span class="consultant-role"><?php echo $is_en ? 'Advisor' : 'Tư vấn viên'; ?></span>
                                                <div class="consultant-info">
                                                    <svg class="svg-icon fa-phone fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                                                    <strong>*********953</strong>
                                                </div>
                                            </div>
                                        </article>

                                        <article class="consultant-card">
                                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/nhi_avt.webp"
                                                class="consultant-avatar" alt="Lê Đinh Ý Nhi" loading="lazy" decoding="async">
                                            <div class="consultant-body">
                                                <h4 class="consultant-name">Lê Đinh Ý Nhi</h4>
                                                <span class="consultant-role"><?php echo $is_en ? 'Advisor' : 'Tư vấn viên'; ?></span>
                                                <div class="consultant-info">
                                                    <svg class="svg-icon fa-phone fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                                                    <strong>*********486</strong>
                                                </div>
                                            </div>
                                        </article>

                                        <article class="consultant-card">
                                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/uyen.webp"
                                                class="consultant-avatar" alt="Nguyễn Phương Uyên" loading="lazy" decoding="async">
                                            <div class="consultant-body">
                                                <h4 class="consultant-name">Nguyễn Phương Uyên</h4>
                                                <span class="consultant-role"><?php echo $is_en ? 'Advisor' : 'Tư vấn viên'; ?></span>
                                                <div class="consultant-info">
                                                    <svg class="svg-icon fa-phone fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                                                    <strong>*********935</strong>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>

                                <!-- Department 1.2: Phòng Học vụ -->
                                <div class="org-branch-col">
                                    <div class="org-node">
                                        <div class="org-node-avatar-placeholder">LHT</div>
                                        <div class="org-node-body">
                                            <div class="org-node-role"><?php echo $is_en ? 'Academics' : 'Học thuật'; ?></div>
                                            <h3 class="org-node-name">Lê Huyền Trâm</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- COLUMN 2: Phạm Thị Phương Lan -->
                        <div class="org-branch-col has-sub-branches">
                            <div class="org-node">
                                <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/phamthiphuonglan_avt.webp"
                                    class="org-node-avatar" alt="<?php echo $is_en ? 'Head of Department - Pham Thi Phuong Lan' : 'Trưởng phòng Kế hoạch - Phạm Thị Phương Lan'; ?>" loading="lazy" decoding="async">
                                <div class="org-node-body">
                                    <div class="org-node-role"><?php echo $is_en ? 'Division Head' : 'Trưởng Khối'; ?></div>
                                    <h3 class="org-node-name">Phạm Thị Phương Lan</h3>
                                    <div class="org-node-role"
                                        style="font-size:0.64rem; color:#64748b; margin-top:2px; font-weight:700;"><?php echo $is_en ? 'Administration &amp; Logistics' : 'Quản Trị &amp; Hậu Cần'; ?></div>
                                    <div class="org-node-info">
                                        <svg class="svg-icon fa-envelope fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                                        <a href="mailto:lanptp@ideas.edu.vn">lanptp@ideas.edu.vn</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Line down to sub-departments -->
                            <div class="org-tree-line"></div>

                            <div class="org-branches">
                                <!-- Department 2.1: Nhân sự -->
                                <div class="org-branch-col">
                                    <div class="org-node">
                                        <div class="org-node-avatar-placeholder">DP</div>
                                        <div class="org-node-body">
                                            <div class="org-node-role"><?php echo $is_en ? 'HR Manager' : 'Trưởng Phòng Nhân Sự'; ?></div>
                                            <h3 class="org-node-name">Nguyễn Thị Duy Phương</h3>
                                        </div>
                                    </div>
                                </div>

                                <!-- Department 2.2: Kế toán -->
                                <div class="org-branch-col">
                                    <div class="org-node">
                                        <div class="org-node-avatar-placeholder">NTT</div>
                                        <div class="org-node-body">
                                            <div class="org-node-role"><?php echo $is_en ? 'Chief Accountant' : 'Trưởng Phòng Kế Toán'; ?></div>
                                            <h3 class="org-node-name">Nguyễn Thu Thảo</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- COLUMN 3: Võ Trùng Dương -->
                        <div class="org-branch-col has-sub-branches">
                            <div class="org-node">
                                <div class="org-node-avatar-placeholder">VTD</div>
                                <div class="org-node-body">
                                    <div class="org-node-role"><?php echo $is_en ? 'Division Head' : 'Trưởng Khối'; ?></div>
                                    <h3 class="org-node-name">Võ Trùng Dương</h3>
                                    <div class="org-node-role"
                                        style="font-size:0.64rem; color:#64748b; margin-top:2px; font-weight:700;"><?php echo $is_en ? 'Growth &amp; Technology' : 'Tăng Trưởng &amp; Công Nghệ'; ?></div>
                                    <div class="org-node-info">
                                        <svg class="svg-icon fa-envelope fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                                        <a href="mailto:duongvt@ideas.edu.vn">duongvt@ideas.edu.vn</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Line down to sub-branches -->
                            <div class="org-tree-line"></div>

                            <div class="org-branches">
                                <!-- Sub-branch 3.1: Trịnh Đình Thanh -->
                                <div class="org-branch-col">
                                    <div class="org-node">
                                        <div class="org-node-avatar-placeholder">TDT</div>
                                        <div class="org-node-body">
                                            <div class="org-node-role">Teamlead Marketing</div>
                                            <h3 class="org-node-name">Trịnh Đình Thanh</h3>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sub-branch 3.2: Ngô Gia Thái -->
                                <div class="org-branch-col">
                                    <div class="org-node">
                                        <div class="org-node-avatar-placeholder">NGT</div>
                                        <div class="org-node-body">
                                            <div class="org-node-role">Tech Lead</div>
                                            <h3 class="org-node-name">Ngô Gia Thái</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>





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

    <!-- Canvas Pan & Zoom Control Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const viewport = document.getElementById('org-canvas-viewport');
            const content = document.getElementById('org-canvas-content');

            if (!viewport || !content) return;

            let scale = 1.0;
            let panX = 0;
            let panY = 0;
            let isDragging = false;
            let startX = 0;
            let startY = 0;

            // Touch pinch zoom state
            let isPinching = false;
            let startDist = 0;
            let startScale = 1.0;
            let touchCenterX = 0;
            let touchCenterY = 0;

            function applyTransform() {
                content.style.transform = `translate(${panX}px, ${panY}px) scale(${scale})`;
            }

            function centerCanvas() {
                const vr = viewport.getBoundingClientRect();
                const rootNode = content.querySelector('.org-node');
                if (!rootNode) return;

                scale = 0.55;
                const rootOffsetLeft = rootNode.offsetLeft;
                const rootWidth = rootNode.offsetWidth;

                panX = (vr.width / 2) - (rootOffsetLeft + rootWidth / 2) * scale;
                panY = 40; // Margin from top

                applyTransform();
            }

            // Mouse Events for Panning
            viewport.addEventListener('mousedown', (e) => {
                if (e.target.closest('.org-node-link') || e.target.closest('a') || e.target.closest('button') || e.target.closest('.consultant-card')) {
                    return; // Prevent panning when clicking interactive links/buttons
                }
                isDragging = true;
                startX = e.clientX - panX;
                startY = e.clientY - panY;
                viewport.style.cursor = 'grabbing';
            });

            window.addEventListener('mousemove', (e) => {
                if (!isDragging) return;
                panX = e.clientX - startX;
                panY = e.clientY - startY;
                applyTransform();
            });

            window.addEventListener('mouseup', () => {
                if (isDragging) {
                    isDragging = false;
                    viewport.style.cursor = 'grab';
                }
            });

            // Touch Events for Mobile Panning & Pinch Zooming
            viewport.addEventListener('touchstart', (e) => {
                if (e.target.closest('.org-node-link') || e.target.closest('a') || e.target.closest('button') || e.target.closest('.consultant-card')) {
                    return;
                }
                if (e.touches.length === 1) {
                    isDragging = true;
                    isPinching = false;
                    startX = e.touches[0].clientX - panX;
                    startY = e.touches[0].clientY - panY;
                } else if (e.touches.length === 2) {
                    isDragging = false;
                    isPinching = true;
                    startDist = Math.hypot(
                        e.touches[0].clientX - e.touches[1].clientX,
                        e.touches[0].clientY - e.touches[1].clientY
                    );
                    startScale = scale;
                    touchCenterX = (e.touches[0].clientX + e.touches[1].clientX) / 2;
                    touchCenterY = (e.touches[0].clientY + e.touches[1].clientY) / 2;
                }
            }, { passive: true });

            viewport.addEventListener('touchmove', (e) => {
                if (isDragging && e.touches.length === 1) {
                    panX = e.touches[0].clientX - startX;
                    panY = e.touches[0].clientY - startY;
                    applyTransform();
                } else if (isPinching && e.touches.length === 2) {
                    const dist = Math.hypot(
                        e.touches[0].clientX - e.touches[1].clientX,
                        e.touches[0].clientY - e.touches[1].clientY
                    );
                    const ratio = dist / startDist;
                    const newScale = Math.min(Math.max(0.3, startScale * ratio), 2.5);

                    if (newScale !== scale) {
                        const vr = viewport.getBoundingClientRect();
                        const mx = touchCenterX - vr.left;
                        const my = touchCenterY - vr.top;

                        const sRatio = newScale / scale;
                        panX = mx - (mx - panX) * sRatio;
                        panY = my - (my - panY) * sRatio;
                        scale = newScale;

                        applyTransform();
                    }
                }
            }, { passive: true });

            viewport.addEventListener('touchend', () => {
                isDragging = false;
                isPinching = false;
            });

            // Wheel Zoom Event (centered at cursor)
            viewport.addEventListener('wheel', (e) => {
                if (!e.ctrlKey) {
                    // Normal wheel scroll behaves as normal page scroll
                    return;
                }
                e.preventDefault();
                const vr = viewport.getBoundingClientRect();
                const mx = e.clientX - vr.left;
                const my = e.clientY - vr.top;

                const factor = e.deltaY > 0 ? -0.1 : 0.1;
                const newScale = Math.min(Math.max(0.3, scale + factor), 2.5);

                if (newScale !== scale) {
                    const ratio = newScale / scale;
                    panX = mx - (mx - panX) * ratio;
                    panY = my - (my - panY) * ratio;
                    scale = newScale;
                    applyTransform();
                }
            }, { passive: false });

            // Button Control Handlers
            document.getElementById('btn-zoom-in')?.addEventListener('click', () => {
                const vr = viewport.getBoundingClientRect();
                const cx = vr.width / 2;
                const cy = vr.height / 2;
                const newScale = Math.min(Math.max(0.3, scale + 0.15), 2.5);
                if (newScale !== scale) {
                    const ratio = newScale / scale;
                    panX = cx - (cx - panX) * ratio;
                    panY = cy - (cy - panY) * ratio;
                    scale = newScale;
                    applyTransform();
                }
            });

            document.getElementById('btn-zoom-out')?.addEventListener('click', () => {
                const vr = viewport.getBoundingClientRect();
                const cx = vr.width / 2;
                const cy = vr.height / 2;
                const newScale = Math.min(Math.max(0.3, scale - 0.15), 2.5);
                if (newScale !== scale) {
                    const ratio = newScale / scale;
                    panX = cx - (cx - panX) * ratio;
                    panY = cy - (cy - panY) * ratio;
                    scale = newScale;
                    applyTransform();
                }
            });

            document.getElementById('btn-zoom-reset')?.addEventListener('click', centerCanvas);

            // Initial alignment
            window.addEventListener('load', () => {
                setTimeout(centerCanvas, 150);
            });
            setTimeout(centerCanvas, 150);

            // Re-center on window resize
            let resizeTimeout;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(centerCanvas, 150);
            });
        });
    </script>

    <?php get_footer(); ?>
</body>

</html>