<?php
/**
 * The template for displaying the Corporate Doctor (Bác sĩ Doanh nghiệp) Booking & Forum Page
 * Template Name: Corporate Doctor Template
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

    <!-- Google Identity Services Library for Google Login -->
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    
    <!-- Premium Font (Plus Jakarta Sans) matching Index Page -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --clr-primary: #ab0e00;
            --clr-primary-hover: #8e0b00;
            --clr-navy: #0f172a;
            --clr-navy-light: #1e293b;
            --clr-bg-dark: #080405;
            --clr-glass-bg: rgba(255, 255, 255, 0.03);
            --clr-glass-border: rgba(255, 255, 255, 0.08);
            --shadow-premium: 0 20px 40px -15px rgba(15, 23, 42, 0.08);
        }

        /* Enforce Plus Jakarta Sans for every single element */
        * {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif !important;
            box-sizing: border-box;
        }

        body {
            background-color: #f8fafc;
            color: #334155;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* ── BUTTON STYLES (Fixing Sunken UI Issues) ── */
        .btn-primary-premium {
            background: linear-gradient(135deg, #ab0e00 0%, #8e0b00 100%) !important;
            color: #ffffff !important;
            padding: 14px 30px !important;
            font-size: 0.92rem !important;
            font-weight: 700 !important;
            border-radius: 12px !important;
            border: none !important;
            cursor: pointer !important;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 8px !important;
            box-shadow: 0 10px 20px -5px rgba(171, 14, 0, 0.35) !important;
            text-decoration: none !important;
        }

        .btn-primary-premium:hover {
            background: linear-gradient(135deg, #be1000 0%, #9e0c00 100%) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 15px 25px -4px rgba(171, 14, 0, 0.45) !important;
        }

        .btn-secondary-premium {
            background: rgba(255, 255, 255, 0.08) !important;
            color: #ffffff !important;
            border: 1.5px solid rgba(255, 255, 255, 0.35) !important;
            padding: 13px 30px !important;
            font-size: 0.92rem !important;
            font-weight: 700 !important;
            border-radius: 12px !important;
            cursor: pointer !important;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 8px !important;
            text-decoration: none !important;
            backdrop-filter: blur(10px) !important;
            -webkit-backdrop-filter: blur(10px) !important;
        }

        .btn-secondary-premium:hover {
            background: rgba(255, 255, 255, 0.18) !important;
            border-color: rgba(255, 255, 255, 0.8) !important;
            transform: translateY(-2px) !important;
        }

        /* ── LMS-Style Hero Section ── */
        .lms-hero {
            position: relative;
            padding: 220px 20px 140px;
            text-align: center;
            overflow: hidden;
            background-color: var(--clr-bg-dark);
            min-height: 55vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lms-hero-bg {
            position: absolute;
            inset: 0;
            z-index: 1;
            background-image: url('https://ideas.edu.vn/wp-content/uploads/2025/08/wsoff16_8.webp');
            background-size: cover;
            background-position: center;
            opacity: 0.35;
            transform: scale(1.05);
            will-change: transform;
        }

        .lms-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(180deg,
                    rgba(8, 4, 5, 0.9) 0%,
                    rgba(80, 6, 0, 0.4) 60%,
                    rgba(8, 4, 5, 0.98) 100%),
                radial-gradient(ellipse at 50% 50%, rgba(171, 14, 0, 0.25) 0%, transparent 75%);
        }

        .lms-hero-container {
            position: relative;
            z-index: 3;
            max-width: 900px;
            margin: 0 auto;
        }

        .lms-hero-badge {
            background: rgba(171, 14, 0, 0.18);
            border: 1px solid rgba(255, 77, 77, 0.3);
            padding: 8px 20px;
            border-radius: 100px;
            color: #ffcccc;
            font-size: 0.82rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 28px;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .lms-hero h1 {
            font-size: clamp(2.4rem, 5.5vw, 3.8rem);
            font-weight: 800;
            margin-bottom: 20px;
            letter-spacing: -0.02em;
            line-height: 1.2;
            color: #ffffff;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
        }

        .lms-hero h1 span {
            background: linear-gradient(135deg, #ff6b6b 0%, #ff3b30 50%, #ab0e00 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .lms-hero p {
            font-size: 1.15rem;
            color: rgba(255, 255, 255, 0.85);
            max-width: 750px;
            margin: 0 auto 36px;
            line-height: 1.65;
            font-weight: 500;
        }

        .verify-slogan {
            font-size: 1.12rem;
            font-weight: 700;
            font-style: italic;
            color: #ffcccc;
            margin-bottom: 24px;
            letter-spacing: 0.08em;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
            display: inline-block;
        }

        .lms-hero-actions {
            display: flex;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        /* ── Section: Dashboard Thống kê Bệnh án ── */
        .clinic-stats-section {
            padding: 80px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
        }

        .stat-card-premium {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 36px;
            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.04);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 220px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .stat-card-premium:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.08);
            border-color: #cbd5e1;
        }

        .stat-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .stat-icon-wrapper {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: rgba(171, 14, 0, 0.08);
            color: var(--clr-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .stat-card-label {
            font-size: 0.8rem;
            font-weight: 800;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .stat-card-number {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--clr-navy);
            margin: 10px 0 6px;
            letter-spacing: -0.02em;
        }

        .stat-card-desc {
            font-size: 0.88rem;
            color: #64748b;
            line-height: 1.6;
            margin: 0;
            font-weight: 500;
        }

        /* Donut Chart visual styling improvements */
        .chart-container-donut {
            position: relative;
            width: 140px;
            height: 140px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .donut-segment {
            transition: stroke-width 0.2s ease, transform 0.2s ease;
            cursor: pointer;
        }

        .donut-segment:hover {
            stroke-width: 5.5;
        }

        .chart-legend {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-top: 10px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.8rem;
            color: #475569;
            font-weight: 600;
            cursor: pointer;
            padding: 4px 8px;
            border-radius: 6px;
            transition: background 0.2s ease;
        }

        .legend-item:hover {
            background: #f1f5f9;
        }

        .legend-color-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        /* ── Section: Expert Council Grid ── */
        .mentors-section {
            padding: 80px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-header-premium {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header-premium h2 {
            font-size: 2.4rem;
            font-weight: 800;
            color: var(--clr-navy);
            margin: 0 0 16px;
            letter-spacing: -0.02em;
        }

        .section-header-premium p {
            font-size: 1.05rem;
            color: #64748b;
            max-width: 680px;
            margin: 0 auto;
            line-height: 1.65;
            font-weight: 500;
        }

        .mentors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
            gap: 40px;
        }

        .mentor-card-premium {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.04);
            min-height: 480px;
        }

        .mentor-card-premium:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 35px -10px rgba(171, 14, 0, 0.12);
            border-color: rgba(171, 14, 0, 0.25);
        }

        .mentor-card-banner {
            height: 100px;
            background: linear-gradient(135deg, #0f172a 0%, #ab0e00 100%);
            position: relative;
        }

        .mentor-card-content {
            padding: 0 28px 28px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            flex-grow: 1;
        }

        .mentor-avatar-wrapper {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            border: 4px solid #ffffff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin-top: -50px;
            margin-bottom: 16px;
            background: #ffffff;
        }

        .mentor-avatar-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .mentor-degree-badge {
            display: inline-block;
            padding: 4px 10px;
            background: rgba(171, 14, 0, 0.06);
            color: var(--clr-primary);
            font-size: 0.72rem;
            font-weight: 700;
            border-radius: 100px;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .mentor-name {
            font-size: 1.3rem !important;
            font-weight: 800 !important;
            color: var(--clr-navy) !important;
            margin: 0 0 6px !important;
            letter-spacing: -0.01em;
        }

        .mentor-specialty {
            font-size: 0.8rem;
            font-weight: 700;
            color: #475569;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .mentor-specialty::before {
            content: '•';
            color: var(--clr-primary);
            font-weight: 900;
            font-size: 1.1rem;
        }

        .mentor-job {
            font-size: 0.85rem;
            color: #64748b;
            line-height: 1.6;
            margin: 8px 0 0;
            font-weight: 500;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .mentor-card-actions {
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 24px;
            border-top: 1px solid #f1f5f9;
            padding-top: 20px;
        }

        .btn-card-booking {
            background: var(--clr-primary) !important;
            color: #ffffff !important;
            border: none !important;
            padding: 12px 16px !important;
            font-size: 0.82rem !important;
            font-weight: 700 !important;
            border-radius: 12px !important;
            cursor: pointer !important;
            transition: all 0.2s ease !important;
            text-align: center !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 6px !important;
            box-shadow: 0 4px 12px rgba(171, 14, 0, 0.15) !important;
        }

        .btn-card-booking:hover {
            background: var(--clr-primary-hover) !important;
            transform: translateY(-1px) !important;
            box-shadow: 0 6px 16px rgba(171, 14, 0, 0.25) !important;
        }

        .btn-card-ask {
            background: #ffffff !important;
            color: var(--clr-navy) !important;
            border: 1.5px solid #cbd5e1 !important;
            padding: 11px 16px !important;
            font-size: 0.82rem !important;
            font-weight: 700 !important;
            border-radius: 12px !important;
            cursor: pointer !important;
            transition: all 0.2s ease !important;
            text-align: center !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 6px !important;
        }

        .btn-card-ask:hover {
            background: #f8fafc !important;
            border-color: var(--clr-navy) !important;
            transform: translateY(-1px) !important;
        }

        /* ── Clinic Forum Section (Full Width Layout) ── */
        .clinic-forum-section {
            background: #ffffff;
            border-top: 1px solid #e2e8f0;
            border-bottom: 1px solid #e2e8f0;
            padding: 80px 20px;
        }

        .forum-container {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .forum-header-bar {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-bottom: 30px;
        }

        @media (min-width: 768px) {
            .forum-header-bar {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }
        }

        .forum-search-wrapper {
            position: relative;
            flex: 1;
            max-width: 450px;
        }

        .forum-search-input {
            width: 100%;
            padding: 12px 16px 12px 42px;
            border: 1.5px solid #cbd5e1;
            border-radius: 14px;
            font-size: 0.88rem;
            transition: all 0.2s ease;
            box-sizing: border-box;
            font-weight: 500;
        }

        .forum-search-input:focus {
            border-color: var(--clr-primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(171, 14, 0, 0.1);
        }

        .forum-search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
        }

        .forum-filter-tags {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 24px;
        }

        .filter-tag-btn {
            background: #f1f5f9;
            color: #475569;
            border: none;
            padding: 8px 16px;
            font-size: 0.8rem;
            font-weight: 700;
            border-radius: 100px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .filter-tag-btn.active, .filter-tag-btn:hover {
            background: var(--clr-primary);
            color: #ffffff;
        }

        .forum-topic-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .topic-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 24px;
            transition: all 0.2s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
        }

        .topic-card:hover {
            border-color: #cbd5e1;
            box-shadow: 0 4px 12px -2px rgba(15, 23, 42, 0.04);
        }

        .topic-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .topic-meta-user {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.8rem;
            font-weight: 700;
            color: #64748b;
        }

        .topic-meta-user svg {
            color: var(--clr-primary);
        }

        .topic-date {
            font-size: 0.78rem;
            color: #94a3b8;
            font-weight: 500;
        }

        .topic-title {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--clr-navy);
            margin: 0 0 12px;
            line-height: 1.4;
        }

        .topic-body-content {
            font-size: 0.88rem;
            color: #475569;
            line-height: 1.6;
            margin: 0 0 16px;
        }

        .topic-tags-row {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 16px;
        }

        .topic-tag {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--clr-primary);
            background: rgba(171, 14, 0, 0.06);
            padding: 4px 10px;
            border-radius: 6px;
        }

        .topic-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid #f1f5f9;
            padding-top: 16px;
            margin-top: 16px;
        }

        .topic-actions {
            display: flex;
            gap: 16px;
        }

        .btn-action-upvote {
            background: #f1f5f9;
            border: none;
            color: #475569;
            padding: 8px 14px;
            font-size: 0.8rem;
            font-weight: 700;
            border-radius: 8px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
        }

        .btn-action-upvote:hover {
            background: rgba(171, 14, 0, 0.08);
            color: var(--clr-primary);
        }

        .btn-action-comment {
            background: #ffffff;
            border: 1px solid #cbd5e1;
            color: #475569;
            padding: 8px 14px;
            font-size: 0.8rem;
            font-weight: 700;
            border-radius: 8px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
        }

        .btn-action-comment:hover {
            border-color: var(--clr-navy);
            background: #f8fafc;
        }

        /* ── Premium Booking Form Section ── */
        .booking-section-premium {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 32px;
            padding: 80px 40px;
            margin: 80px auto;
            position: relative;
            overflow: hidden;
            box-shadow: inset 0 0 100px rgba(15, 23, 42, 0.02);
            border: 1px solid #e2e8f0;
        }

        .booking-section-premium::before {
            content: '';
            position: absolute;
            top: -200px;
            right: -200px;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(171, 14, 0, 0.04) 0%, transparent 70%);
            pointer-events: none;
        }

        .booking-card-premium {
            background: rgba(255, 255, 255, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 28px;
            padding: 50px 40px;
            box-shadow: 0 30px 60px -15px rgba(15, 23, 42, 0.08);
            box-sizing: border-box;
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .booking-form-title {
            font-size: 2.2rem !important;
            font-weight: 800 !important;
            color: var(--clr-navy) !important;
            text-align: center;
            margin-bottom: 12px;
            letter-spacing: -0.02em;
        }

        .booking-form-subtitle {
            font-size: 0.95rem;
            color: #64748b;
            text-align: center;
            margin-bottom: 40px;
            font-weight: 500;
            line-height: 1.6;
        }

        .clinic-form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 24px;
        }

        .clinic-form-label {
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--clr-navy);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-left: 2px;
        }

        .clinic-form-input, .clinic-form-select, .clinic-form-textarea {
            width: 100%;
            padding: 14px 16px;
            border: 1.5px solid #cbd5e1;
            background: #ffffff;
            border-radius: 12px;
            font-size: 0.92rem;
            box-sizing: border-box;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            color: var(--clr-navy);
            font-weight: 500;
        }

        .clinic-form-input:focus, .clinic-form-select:focus, .clinic-form-textarea:focus {
            border-color: var(--clr-primary);
            outline: none;
            box-shadow: 0 0 0 4px rgba(171, 14, 0, 0.08);
            transform: translateY(-1px);
        }

        .btn-booking-submit {
            background: linear-gradient(135deg, #ab0e00 0%, #8e0b00 100%) !important;
            color: #ffffff !important;
            padding: 16px 32px !important;
            font-size: 1rem !important;
            font-weight: 700 !important;
            border-radius: 14px !important;
            border: none !important;
            cursor: pointer !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 10px 25px -5px rgba(171, 14, 0, 0.3) !important;
            text-decoration: none !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 10px !important;
            width: 100% !important;
            margin-top: 10px !important;
        }

        .btn-booking-submit:hover {
            background: linear-gradient(135deg, #be1000 0%, #9e0c00 100%) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 15px 30px -4px rgba(171, 14, 0, 0.4) !important;
        }

        /* ── Premium Modal (Fixing UI Layout & Close/Submit Button issues) ── */
        .clinic-form-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            z-index: 99999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .clinic-form-modal {
            background: #ffffff;
            border-radius: 24px;
            width: 100%;
            max-width: 620px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 30px 60px -10px rgba(15, 23, 42, 0.25);
            position: relative;
            border: 1px solid #e2e8f0;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            animation: modalFadeIn 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .form-modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 24px 30px;
            border-bottom: 1px solid #f1f5f9;
            position: sticky;
            top: 0;
            background: #ffffff;
            z-index: 10;
        }

        .form-modal-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--clr-navy);
            margin: 0;
        }

        .form-modal-close {
            background: #f1f5f9;
            border: none;
            font-size: 1.2rem;
            color: #64748b;
            cursor: pointer;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            padding: 0;
        }

        .form-modal-close:hover {
            background: #e2e8f0;
            color: var(--clr-navy);
        }

        .form-modal-body {
            padding: 30px;
            overflow-y: auto;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Google Login Indicator */
        .google-login-box {
            background: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 12px;
            padding: 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
            text-align: center;
        }

        .google-login-status {
            font-size: 0.82rem;
            color: #475569;
            font-weight: 500;
        }

        /* ── Toast Notifications ── */
        .clinic-toast {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 10000;
            background: var(--clr-navy);
            color: #ffffff;
            padding: 16px 24px;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            display: none;
            align-items: center;
            gap: 12px;
            font-size: 0.88rem;
            font-weight: 600;
            animation: toastIn 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* ── Dynamic Comments Thread ── */
        .comments-drawer {
            margin-top: 16px;
            border-top: 1.5px solid #f1f5f9;
            padding-top: 16px;
            display: none;
        }

        .comments-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 16px;
        }

        .comment-item {
            background: #f8fafc;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 0.85rem;
            line-height: 1.5;
        }

        .comment-author-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 6px;
        }

        .comment-author-name {
            font-weight: 700;
            color: var(--clr-navy);
        }

        .comment-author-badge {
            background: rgba(171, 14, 0, 0.08);
            color: var(--clr-primary);
            font-size: 0.68rem;
            font-weight: 700;
            padding: 2px 6px;
            border-radius: 4px;
            text-transform: uppercase;
        }

        .comment-date {
            font-size: 0.72rem;
            color: #94a3b8;
        }

        .comment-input-row {
            display: flex;
            gap: 8px;
        }

        .comment-input-field {
            flex: 1;
            padding: 10px 12px;
            border: 1.5px solid #cbd5e1;
            border-radius: 8px;
            font-size: 0.82rem;
        }

        .btn-comment-submit {
            background: var(--clr-navy);
            color: #ffffff;
            border: none;
            padding: 0 16px;
            font-size: 0.8rem;
            font-weight: 700;
            border-radius: 8px;
            cursor: pointer;
        }

        .btn-comment-submit:hover {
            background: var(--clr-navy-light);
        }

        /* ── Responsive Styling ── */
        @media (max-width: 768px) {
            .lms-hero h1 {
                font-size: 2.2rem;
            }
            .lms-hero p {
                font-size: 1rem;
            }
            .stats-grid {
                grid-template-columns: 1fr;
            }
            .booking-section-premium {
                padding: 40px 16px;
            }
            .booking-card-premium {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Unified responsive header loaded from theme -->
    <?php get_template_part('shared-header'); ?>

    <!-- ── LMS-Style Hero Section ── -->
    <section class="lms-hero">
        <div class="lms-hero-bg"></div>
        <div class="lms-hero-overlay"></div>
        <div class="lms-hero-container">
            <div class="lms-hero-badge">
                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M19 10.5V20H5V10.5H3V20C3 21.1 3.9 22 5 22H19C20.1 22 21 21.1 21 20V10.5H19ZM12 18C9.79 18 8 16.21 8 14C8 11.79 9.79 10 12 10C14.21 10 16 11.79 16 14C16 16.21 14.21 18 12 18ZM10.5 14C10.5 14.83 11.17 15.5 12 15.5C12.83 15.5 13.5 14.83 13.5 14C13.5 13.17 12.83 12.5 12 12.5C11.17 12.5 10.5 13.17 10.5 14ZM12 2L2 6.5V10.5H4V7.4L12 3.8L20 7.4V10.5H22V6.5L12 2Z"/></svg>
                <?php echo $is_en ? 'Corporate Doctor Board' : 'Hội đồng Bác sĩ Doanh nghiệp'; ?>
            </div>
            
            <h1><?php echo $is_en ? 'Corporate <span>Clinic Board</span>' : 'Hội đồng <span>Bác sĩ Doanh nghiệp</span>'; ?></h1>
            <span class="verify-slogan">"Khơi thông Điểm nghẽn – Kiến tạo Tăng trưởng"</span>
            
            <p><?php echo $is_en ? 'Analyze administrative obstacles, schedule private consultations, and co-design tailored growth solutions with leading industry experts.' : 'Nơi chẩn đoán điểm nghẽn, tháo gỡ khó khăn vận hành và cùng các chuyên gia hàng đầu thiết kế giải pháp đột phá cho doanh nghiệp của bạn.'; ?></p>
            
            <div class="lms-hero-actions">
                <a href="#booking-form-anchor" class="btn-primary-premium">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M19 4H18V2H16V4H8V2H6V4H5C3.89 4 3.01 4.9 3.01 6L3 20C3 21.1 3.89 22 5 22H19C20.1 22 21 21.1 21 20V6C21 4.9 20.1 4 19 4ZM19 20H5V10H19V20ZM19 8H5V6H19V8ZM9 14H7V12H9V14ZM13 14H11V12H13V14ZM17 14H15V12H17V14ZM9 18H7V16H9V18ZM13 18H11V16H13V18ZM17 18H15V16H17V18Z"/></svg>
                    <?php echo $is_en ? 'Schedule 1:1 Consultation' : 'Đặt lịch Tư vấn 1:1'; ?>
                </a>
                <a href="#clinic-forum-anchor" class="btn-secondary-premium">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2ZM20 16H5.17L4 17.17V4H20V16ZM6 12H18V14H6V12ZM6 9H18V11H6V9ZM6 6H18V8H6V6Z"/></svg>
                    <?php echo $is_en ? 'Browse Case Studies' : 'Diễn đàn Thảo luận'; ?>
                </a>
            </div>
        </div>
    </section>

    <!-- ── Section: Dashboard Thống kê Bệnh án ── -->
    <section class="clinic-stats-section">
        <div class="stats-grid">
            <div class="stat-card-premium">
                <div class="stat-card-header">
                    <span class="stat-card-label"><?php echo $is_en ? 'Total Cases Analyzed' : 'Số ca chẩn đoán tích lũy'; ?></span>
                    <div class="stat-icon-wrapper">
                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                    </div>
                </div>
                <div>
                    <h2 class="stat-card-number" id="stat-total-cases">1,247</h2>
                    <p class="stat-card-desc"><?php echo $is_en ? 'Real-world business case files and private clinic requests successfully processed.' : 'Hồ sơ bệnh án và yêu cầu khám bệnh riêng biệt đã được Hội đồng xử lý thành công.'; ?></p>
                </div>
            </div>
            
            <div class="stat-card-premium">
                <div class="stat-card-header">
                    <span class="stat-card-label"><?php echo $is_en ? 'Eradication Rate' : 'Hiệu quả trị liệu'; ?></span>
                    <div class="stat-icon-wrapper">
                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                    </div>
                </div>
                <div>
                    <h2 class="stat-card-number" id="stat-resolved-rate">92%</h2>
                    <p class="stat-card-desc"><?php echo $is_en ? 'Mentored enterprises report measurable operational improvements and structure recovery.' : 'Tỷ lệ doanh nghiệp cải thiện hiệu suất vận hành vượt bậc sau khi áp dụng giải pháp.'; ?></p>
                </div>
            </div>

            <!-- Premium Donut Chart Panel -->
            <div class="stat-card-premium" style="flex-direction: row; align-items: center; gap: 24px; min-height: 220px;">
                <div class="chart-container-donut">
                    <!-- SVG Circular Donut Chart -->
                    <svg width="135" height="135" viewBox="0 0 42 42" class="donut">
                        <circle class="donut-hole" cx="21" cy="21" r="15.915" fill="#ffffff"></circle>
                        <circle class="donut-ring" cx="21" cy="21" r="15.915" fill="transparent" stroke="#f1f5f9" stroke-width="4.5"></circle>
                        
                        <!-- Segments: 35% Red, 25% Dark Navy, 20% Blue, 15% Green, 5% Amber -->
                        <circle class="donut-segment" cx="21" cy="21" r="15.915" fill="transparent" stroke="#ab0e00" stroke-width="5" stroke-dasharray="35 65" stroke-dashoffset="100"></circle>
                        <circle class="donut-segment" cx="21" cy="21" r="15.915" fill="transparent" stroke="#0f172a" stroke-width="5" stroke-dasharray="25 75" stroke-dashoffset="65"></circle>
                        <circle class="donut-segment" cx="21" cy="21" r="15.915" fill="transparent" stroke="#3b82f6" stroke-width="5" stroke-dasharray="20 80" stroke-dashoffset="40"></circle>
                        <circle class="donut-segment" cx="21" cy="21" r="15.915" fill="transparent" stroke="#10b981" stroke-width="5" stroke-dasharray="15 85" stroke-dashoffset="20"></circle>
                        <circle class="donut-segment" cx="21" cy="21" r="15.915" fill="transparent" stroke="#f59e0b" stroke-width="5" stroke-dasharray="5 95" stroke-dashoffset="5"></circle>
                    </svg>
                </div>
                <div style="flex: 1;">
                    <span class="stat-card-label" style="display:block; margin-bottom:12px; font-weight: 800;"><?php echo $is_en ? 'Disease Spectrum' : 'Bản đồ Bệnh lý'; ?></span>
                    <div class="chart-legend">
                        <div class="legend-item"><span class="legend-color-dot" style="background:#ab0e00;"></span> 35% Chiến lược</div>
                        <div class="legend-item"><span class="legend-color-dot" style="background:#0f172a;"></span> 25% Nhân sự</div>
                        <div class="legend-item"><span class="legend-color-dot" style="background:#3b82f6;"></span> 20% Số hóa & AI</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ── Section: Expert Council Grid ── -->
    <section class="mentors-section">
        <div class="section-header-premium">
            <h2><?php echo $is_en ? 'Corporate Doctor Board' : 'Hội đồng Bác sĩ Doanh nghiệp'; ?></h2>
            <p><?php echo $is_en ? 'Meet the academic and operational board of IDEAS, ready to co-design solutions for your administrative pain points.' : 'Đội ngũ chuyên gia giàu kinh nghiệm thực chiến, sẵn sàng bắt bệnh và kê đơn thuốc quản trị cho doanh nghiệp của bạn.'; ?></p>
        </div>

        <div class="mentors-grid" id="mentors-grid-container">
            <!-- Mentor cards will be populated dynamically -->
        </div>
    </section>

    <!-- ── Clinic Forum Section (Full Width Layout - No Sidebar) ── -->
    <section class="clinic-forum-section" id="clinic-forum-anchor">
        <div class="forum-container">
            <!-- Full Width Column: Topic Feed -->
            <div style="width: 100%;">
                <div class="forum-header-bar">
                    <h2 style="font-size: 1.8rem; font-weight: 800; color: var(--clr-navy); margin: 0;"><?php echo $is_en ? 'Pathology Diagnostics (Forum)' : 'Phòng Chẩn Bệnh Chung'; ?></h2>
                    <button type="button" class="btn-primary-premium" onclick="openNewTopicModal()">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M19 13H13V19H11V13H5V11H11V5H13V11H19V13Z"/></svg>
                        <?php echo $is_en ? 'Submit Pathological File' : 'Gửi yêu cầu tham vấn'; ?>
                    </button>
                </div>

                <div style="display:flex; gap:16px; margin-bottom:24px; flex-wrap:wrap; align-items:center;">
                    <div class="forum-search-wrapper">
                        <svg class="forum-search-icon" width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                        <input type="text" class="forum-search-input" id="forum-search" placeholder="<?php echo $is_en ? 'Search pathology pain points...' : 'Tìm kiếm bệnh án, điểm nghẽn quản trị...'; ?>" oninput="filterTopics()" />
                    </div>
                </div>

                <div class="forum-filter-tags" id="forum-filter-tags-container">
                    <!-- Filter buttons will be populated dynamically -->
                </div>

                <div class="forum-topic-list" id="forum-topics-container">
                    <!-- Forum topics feed will load dynamically -->
                </div>
            </div>
        </div>
    </section>

    <!-- ── Premium Booking Form Section (Đặt lịch Tham vấn 1:1) ── -->
    <section class="booking-section-premium" id="booking-form-anchor">
        <div class="booking-card-premium">
            <h2 class="booking-form-title"><?php echo $is_en ? 'Book a Private Clinic Session (1:1)' : 'Đăng ký phòng chẩn bệnh 1:1'; ?></h2>
            <p class="booking-form-subtitle"><?php echo $is_en ? 'Provide contact details and select your target doctor for a confidential clinic session.' : 'Để lại thông tin chẩn bệnh, chúng tôi sẽ sắp xếp buổi gặp mặt bảo mật 1:1 trực tiếp với Bác sĩ chuyên khoa.'; ?></p>

            <form id="clinic-booking-form" onsubmit="handleBookingSubmit(event)">
                <div class="clinic-form-group">
                    <label class="clinic-form-label"><?php echo $is_en ? 'Select Doctor' : 'Chọn Bác sĩ chuyên khoa'; ?></label>
                    <select class="clinic-form-select" id="booking-mentor" required>
                        <option value=""><?php echo $is_en ? '-- Select Doctor --' : '-- Chọn Bác sĩ mong muốn --'; ?></option>
                    </select>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                    <div class="clinic-form-group">
                        <label class="clinic-form-label"><?php echo $is_en ? 'Your Name' : 'Họ và tên của bạn'; ?></label>
                        <input type="text" class="clinic-form-input" id="booking-name" required />
                    </div>
                    <div class="clinic-form-group">
                        <label class="clinic-form-label"><?php echo $is_en ? 'Phone Number' : 'Số điện thoại liên hệ'; ?></label>
                        <input type="tel" class="clinic-form-input" id="booking-phone" required />
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                    <div class="clinic-form-group">
                        <label class="clinic-form-label"><?php echo $is_en ? 'Email Address' : 'Địa chỉ Email'; ?></label>
                        <input type="email" class="clinic-form-input" id="booking-email" required />
                    </div>
                    <div class="clinic-form-group">
                        <label class="clinic-form-label"><?php echo $is_en ? 'Company Name' : 'Tên doanh nghiệp'; ?></label>
                        <input type="text" class="clinic-form-input" id="booking-company" required />
                    </div>
                </div>

                <div class="clinic-form-group">
                    <label class="clinic-form-label"><?php echo $is_en ? 'Preferred Time' : 'Thời gian mong muốn'; ?></label>
                    <select class="clinic-form-select" id="booking-time" required>
                        <option value="Cuối tuần (Sáng Chủ nhật)"><?php echo $is_en ? 'Weekend (Sunday Morning)' : 'Cuối tuần (Sáng Chủ nhật)'; ?></option>
                        <option value="Buổi tối trong tuần (20h - 22h)"><?php echo $is_en ? 'Weekday Evening (20:00 - 22:00)' : 'Buổi tối trong tuần (20h - 22h)'; ?></option>
                        <option value="Hẹn riêng linh hoạt"><?php echo $is_en ? 'Flexible Private Schedule' : 'Hẹn riêng linh hoạt'; ?></option>
                    </select>
                </div>

                <div class="clinic-form-group">
                    <label class="clinic-form-label"><?php echo $is_en ? 'Describe Bottlenecks / Pain Points' : 'Mô tả chi tiết điểm nghẽn của doanh nghiệp'; ?></label>
                    <textarea class="clinic-form-textarea" id="booking-desc" rows="5" placeholder="<?php echo $is_en ? 'Briefly outline the operational pain point or strategic problem...' : 'Mô tả ngắn gọn về khó khăn vận hành, tài chính, nhân sự hoặc định hướng phát triển...'; ?>" required></textarea>
                </div>

                <button type="submit" class="btn-booking-submit">
                    <?php echo $is_en ? 'Send Request' : 'Gửi yêu cầu'; ?>
                </button>
            </form>
        </div>
    </section>

    <!-- ── Modal: Add New Topic ── -->
    <div class="clinic-form-overlay" id="topic-modal-overlay">
        <div class="clinic-form-modal">
            <div class="form-modal-header">
                <h3 class="form-modal-title"><?php echo $is_en ? 'Submit a Diagnostic Case' : 'Gửi hồ sơ tham vấn'; ?></h3>
                <button class="form-modal-close" onclick="closeNewTopicModal()">&times;</button>
            </div>
            <div class="form-modal-body">
                <!-- Google Login container -->
                <div class="google-login-box" id="google-login-box">
                    <span class="google-login-status" id="google-status-lbl"><?php echo $is_en ? 'Verify with Google to post (Public or Anonymously)' : 'Đăng nhập Google để thảo luận ẩn danh hoặc công khai'; ?></span>
                    <div id="google-signin-btn"></div>
                </div>

                <form id="clinic-topic-form" onsubmit="handleTopicSubmit(event)">
                    <div class="clinic-form-group">
                        <label class="clinic-form-label"><?php echo $is_en ? 'Topic / Obstacle Title' : 'Tiêu đề điểm nghẽn / Câu hỏi'; ?></label>
                        <input type="text" class="clinic-form-input" id="topic-title" placeholder="<?php echo $is_en ? 'e.g., Shareholder direction conflict' : 'Ví dụ: Mâu thuẫn chia tách cổ phần giữa các founder sáng lập...'; ?>" required />
                    </div>

                    <div class="clinic-form-group">
                        <label class="clinic-form-label"><?php echo $is_en ? 'Target Doctor' : 'Chỉ định Bác sĩ phản hồi'; ?></label>
                        <select class="clinic-form-select" id="topic-mentor">
                            <option value=""><?php echo $is_en ? '-- General Forum (All doctors) --' : '-- Gửi chung cho Ban chuyên môn (Tất cả) --'; ?></option>
                        </select>
                    </div>

                    <div class="clinic-form-group">
                        <label class="clinic-form-label"><?php echo $is_en ? 'Pain Category Tag' : 'Nhóm điểm nghẽn chính'; ?></label>
                        <div style="display:flex; gap:10px; flex-wrap:wrap; margin-top:6px;">
                            <label style="font-size:0.8rem; display:flex; align-items:center; gap:4px; cursor:pointer;"><input type="checkbox" name="topic-tags" value="SụtGiảmDoanhThu" /> Sụt giảm doanh số</label>
                            <label style="font-size:0.8rem; display:flex; align-items:center; gap:4px; cursor:pointer;"><input type="checkbox" name="topic-tags" value="NhânSựRờiBỏ" /> Cổ đông & Nhân sự</label>
                            <label style="font-size:0.8rem; display:flex; align-items:center; gap:4px; cursor:pointer;"><input type="checkbox" name="topic-tags" value="ChuyểnĐổiSố" /> Chuyển đổi số & AI</label>
                            <label style="font-size:0.8rem; display:flex; align-items:center; gap:4px; cursor:pointer;"><input type="checkbox" name="topic-tags" value="QuảnTrịChiếnLược" /> Chiến lược & Vận hành</label>
                            <label style="font-size:0.8rem; display:flex; align-items:center; gap:4px; cursor:pointer;"><input type="checkbox" name="topic-tags" value="TốiƯuChiPhí" /> Tài chính & Gọi vốn</label>
                        </div>
                    </div>

                    <div class="clinic-form-group">
                        <label class="clinic-form-label"><?php echo $is_en ? 'Detailed Description' : 'Mô tả chi tiết tình huống / Triệu chứng lỗi'; ?></label>
                        <textarea class="clinic-form-textarea" id="topic-content" rows="5" placeholder="<?php echo $is_en ? 'Outline the core issues, timeline, and current impact...' : 'Nêu rõ bối cảnh, quy mô doanh nghiệp và các tác động tiêu cực đang gặp phải...'; ?>" required></textarea>
                    </div>

                    <div style="display:flex; align-items:center; gap:8px; margin-bottom:20px;">
                        <input type="checkbox" id="topic-anonymous" checked style="width:16px; height:16px; accent-color:var(--clr-primary);" />
                        <label for="topic-anonymous" style="font-size:0.82rem; font-weight:700; color:var(--clr-navy); cursor:pointer;"><?php echo $is_en ? 'Post anonymously (Hide my identity)' : 'Đăng ẩn danh (Bảo mật thông tin doanh nghiệp)'; ?></label>
                    </div>

                    <button type="submit" class="btn-primary-premium" style="width:100%; justify-content:center;">
                        <?php echo $is_en ? 'Submit Case' : 'Gửi yêu cầu'; ?>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Toast Notification element -->
    <div class="clinic-toast" id="clinic-toast-element">
        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
        <span id="clinic-toast-msg">Gửi thành công!</span>
    </div>

    <!-- Unified responsive footer loaded from theme -->
    <?php get_footer(); ?>

    <!-- ── JAVASCRIPT LOGIC ── -->
    <script>
        const ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
        const isEnglish = <?php echo $is_en ? 'true' : 'false'; ?>;
        
        let currentUser = null; // Google Logged-in User Info
        let forumTopics = [];
        let activeFilterTag = '';

        // 15 Vietnamese Expert Council Mentors (Bác sĩ Doanh nghiệp)
        const CLINIC_DOCTORS = [
            { name: "Phạm Quang Vinh", title: "Tiến sĩ QTKD Hoa Kỳ", specialty: isEnglish ? "Corporate Strategy & Restructuring" : "Chiến lược Quản trị & Phát triển Tổ chức", job: "Viện trưởng IDEAS, hơn 25 năm kinh nghiệm điều hành và tư vấn trong lĩnh vực Marketing, Bảo hiểm & Giáo dục.", avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/vientruong_avt-optimized.webp" },
            { name: "Dương Văn Thịnh", title: "Tiến sĩ QTKD Pháp", specialty: isEnglish ? "AI Integration & Digital Tech" : "Ứng dụng AI & Công nghệ Số", job: "VERON Group - Vice President, AI Technology. Chuyên gia Nghiên cứu AI, phân tích dữ liệu lớn và tối ưu quy trình số.", avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/Thay-thinh-optimized.webp" },
            { name: "Sơn Điền Trung", title: "Tiến sĩ QTKD Pháp", specialty: isEnglish ? "Corporate Operations & Biotech" : "Quản trị Doanh nghiệp & Vận hành Y Dược", job: "Chủ tịch HĐQT Sonha Pharma, Q Pharma. Đồng sáng lập và cố vấn năng lực cốt lõi tại IDEAS.", avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/NHP_1769-removebg-preview-optimized.webp" },
            { name: "Trần Tâm Anh", title: "Tiến sĩ QTKD Hoa Kỳ", specialty: isEnglish ? "International Growth & Marketing" : "Chiến lược Marketing & Hợp tác Quốc tế", job: "Chịu trách nhiệm về chiến lược phát triển quốc tế, chuyển giao học thuật và thương hiệu tại IDEAS.", avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/a-tam-anh-1-optimized.webp" },
            { name: "Trần Hoàng Hiệp", title: "Thạc sĩ QTKD", specialty: isEnglish ? "Change Management & Modernization" : "Hiện đại hóa Hệ thống & Quản trị Thay đổi", job: "Phó Tổng giám đốc Business Smart. Chuyên gia triển khai hiện đại hoá hệ thống tài chính tín dụng ngân hàng WB.", avatar: "https://ideas.edu.vn/wp-content/uploads/2022/05/tran-hoang-hiep.webp" },
            { name: "Nguyễn Thị Minh Đoan", title: "Tiến sĩ QTKD", specialty: isEnglish ? "Sales Leadership & Talent Development" : "Đào tạo Bán hàng & Phát triển Nhân sự", job: "18 năm kinh nghiệm Giám đốc Đào tạo AIA, Prudential, Aviva Việt Nam. Cựu Trưởng phòng Nhân sự Nam Á Bank.", avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/Doan-optimized.webp" },
            { name: "Mang Viên Hoàng Nhật", title: "Tiến sĩ QTKD", specialty: isEnglish ? "Supply Chain & Healthcare Devices" : "Quản lý Chuỗi cung ứng & Thiết bị Y tế", job: "25 năm kinh nghiệm Dược phẩm. 11 năm quản lý GSK, Roche, Menarini, Takeda tại Đông Nam Á.", avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/cNhat-optimized.webp" },
            { name: "Dương Trần Minh Đoàn", title: "Thạc sĩ QTKD", specialty: isEnglish ? "Corporate Finance & Education Management" : "Tài chính Kế toán & Quản trị Giáo dục", job: "Hiệu trưởng SITC. Hơn 27 năm kinh nghiệm thực tế. Giảng viên Broward College và ĐHQG TP.HCM.", avatar: "https://ideas.edu.vn/wp-content/uploads/2022/05/duong-tran-minh-doan.webp" },
            { name: "Trần Thị Mai Anh", title: "Thạc sĩ QTNNL", specialty: isEnglish ? "HR Operations & Culture Building" : "Quản trị Nhân sự & Xây dựng Văn hóa", job: "Cựu Giám đốc Nhân sự Teko/VNLife, AAA, Circle K Việt Nam. Giảng viên thỉnh giảng bộ môn Quản trị Nhân sự chiến lược.", avatar: "https://ideas.edu.vn/wp-content/uploads/2022/05/tran-thi-mai-anh.webp" },
            { name: "Lê Sơn Phong", title: "Thạc sĩ QTKD", specialty: isEnglish ? "Corporate Law & Dispute Resolution" : "Pháp lý Doanh nghiệp & Xử lý Tranh chấp", job: "Associate Counsel Le Nguyen Law Firm. Chuyên gia tư vấn pháp chế, hợp đồng thương mại và mua bán sáp nhập.", avatar: "https://ideas.edu.vn/wp-content/uploads/2025/04/lesonphong-1.webp" },
            { name: "Đặng Quốc Phong", title: "Tiến sĩ QTKD", specialty: isEnglish ? "Operations Management" : "Quản trị Vận hành & Hệ thống sản xuất", job: "Chuyên gia tư vấn quản trị vận hành cao cấp cho các tập đoàn sản xuất tiêu dùng lớn.", avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp" },
            { name: "Nguyễn Anh Toàn", title: "Tiến sĩ QTKD", specialty: isEnglish ? "Entrepreneurship & Startup Scaleup" : "Chiến lược Khởi nghiệp & Tăng trưởng", job: "Cố vấn khởi nghiệp đổi mới sáng tạo, hỗ trợ định hình năng lực cạnh tranh và gọi vốn hạt giống.", avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp" },
            { name: "Nguyễn Hoài Trung", title: "Tiến sĩ QTKD", specialty: isEnglish ? "Digital Transformation Strategy" : "Chuyển đổi số & Tối ưu Quy trình", job: "Cố vấn tích hợp hệ thống công nghệ thông tin và thiết lập quy trình quản lý tinh gọn (Lean).", avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp" },
            { name: "Nguyễn Thanh Tuấn", title: "Tiến sĩ QTKD", specialty: isEnglish ? "Risk Assessment & Internal Audits" : "Quản trị Rủi ro & Kiểm soát Nội bộ", job: "Hơn 15 năm đánh giá rủi ro hệ thống kiểm soát nội bộ và kiểm toán độc lập doanh nghiệp.", avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp" },
            { name: "Nguyễn Thành Nhân", title: "Tiến sĩ QTKD", specialty: isEnglish ? "Information Systems Management" : "Hệ thống Thông tin quản lý", job: "Nghiên cứu ứng dụng cơ sở dữ liệu lớn phục vụ báo cáo quản trị thông minh (Business Intelligence).", avatar: "https://ideas.edu.vn/wp-content/uploads/2022/05/nguyen-thanh-nhan.webp" }
        ];

        document.addEventListener('DOMContentLoaded', () => {
            initDoctorGrid();
            initFormSelects();
            loadForumData();
            initGoogleLogin();
        });

        // Populate Lecturers Grid with NEW Premium Card Design
        function initDoctorGrid() {
            const container = document.getElementById('mentors-grid-container');
            container.innerHTML = CLINIC_DOCTORS.map(doc => `
                <div class="mentor-card-premium">
                    <div class="mentor-card-banner"></div>
                    <div class="mentor-card-content">
                        <div class="mentor-avatar-wrapper">
                            <img src="${doc.avatar}" alt="${doc.name}" loading="lazy" />
                        </div>
                        <span class="mentor-degree-badge">${doc.title}</span>
                        <h3 class="mentor-name">${doc.name}</h3>
                        <span class="mentor-specialty">${doc.specialty}</span>
                        <p class="mentor-job">${doc.job}</p>
                    </div>
                    <div style="padding: 0 28px 28px;">
                        <div class="mentor-card-actions">
                            <button type="button" class="btn-card-booking" onclick="scrollToBooking('${doc.name}')">
                                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M19 4H18V2H16V4H8V2H6V4H5C3.89 4 3.01 4.9 3.01 6L3 20C3 21.1 3.89 22 5 22H19C20.1 22 21 21.1 21 20V6C21 4.9 20.1 4 19 4ZM19 20H5V10H19V20ZM19 8H5V6H19V8Z"/></svg>
                                ${isEnglish ? 'Book 1:1' : 'Tư vấn 1:1'}
                            </button>
                            <button type="button" class="btn-card-ask" onclick="openAskDoctor('${doc.name}')">
                                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2ZM20 16H5.17L4 17.17V4H20V16Z"/></svg>
                                ${isEnglish ? 'Ask' : 'Gửi Câu hỏi'}
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        function initFormSelects() {
            const bookingSelect = document.getElementById('booking-mentor');
            const topicSelect = document.getElementById('topic-mentor');

            CLINIC_DOCTORS.forEach(doc => {
                const opt1 = new Option(`${doc.name} - ${doc.specialty}`, doc.name);
                const opt2 = new Option(`${doc.name} - ${doc.specialty}`, doc.name);
                bookingSelect.add(opt1);
                topicSelect.add(opt2);
            });
        }

        // Scroll and select mentor
        function scrollToBooking(doctorName) {
            const select = document.getElementById('booking-mentor');
            select.value = doctorName;
            document.getElementById('booking-form-anchor').scrollIntoView({ behavior: 'smooth' });
        }

        function openAskDoctor(doctorName) {
            openNewTopicModal();
            const select = document.getElementById('topic-mentor');
            select.value = doctorName;
        }

        // ── Google Login Integration ──
        function initGoogleLogin() {
            window.onload = function () {
                google.accounts.id.initialize({
                    client_id: "1098495574577-qjkm5e1i2l8ac29e.apps.googleusercontent.com",
                    callback: handleGoogleLoginResponse
                });
                google.accounts.id.renderButton(
                    document.getElementById("google-signin-btn"),
                    { theme: "outline", size: "large", width: "100%" }
                );
            }
        }

        function handleGoogleLoginResponse(response) {
            const payload = JSON.parse(atob(response.credential.split('.')[1]));
            currentUser = {
                name: payload.name,
                email: payload.email,
                avatar: payload.picture,
                id: payload.sub
            };

            document.getElementById('google-status-lbl').innerHTML = isEnglish 
                ? `Logged in as <b>${currentUser.name}</b>` 
                : `Đã đăng nhập: <b>${currentUser.name}</b>`;
            document.getElementById('google-signin-btn').style.display = 'none';
        }

        // ── Forum AJAX Handlers ──
        function loadForumData() {
            fetch(`${ajaxUrl}?action=ideas_get_clinic_data`)
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        forumTopics = res.data.topics;
                        
                        document.getElementById('stat-total-cases').innerText = res.data.stats.total_cases.toLocaleString();
                        document.getElementById('stat-resolved-rate').innerText = res.data.stats.resolved_rate + '%';

                        renderFilterTags(res.data.stats.pain_points_distribution);
                        renderTopicsList(forumTopics);
                    }
                })
                .catch(err => console.error("Error loading clinic topics:", err));
        }

        function renderFilterTags(distribution) {
            const container = document.getElementById('forum-filter-tags-container');
            let tagsHtml = `<button class="filter-tag-btn active" onclick="setTopicFilter('', this)">${isEnglish ? 'All' : 'Tất cả'}</button>`;
            
            const tagMapping = {
                'Chiến lược & Quản trị': 'QuảnTrịChiếnLược',
                'Mâu thuẫn Nhân sự': 'NhânSựRờiBỏ',
                'Chuyển đổi số & AI': 'ChuyểnĐổiSố',
                'Marketing & Doanh thu': 'SụtGiảmDoanhThu',
                'Pháp lý & Gọi vốn': 'TốiƯuChiPhí'
            };

            distribution.forEach(item => {
                const slug = tagMapping[item.label] || '';
                tagsHtml += `<button class="filter-tag-btn" onclick="setTopicFilter('${slug}', this)">#${item.label}</button>`;
            });

            container.innerHTML = tagsHtml;
        }

        function setTopicFilter(tag, btn) {
            document.querySelectorAll('.filter-tag-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            activeFilterTag = tag;
            filterTopics();
        }

        function filterTopics() {
            const query = document.getElementById('forum-search').value.toLowerCase();
            const filtered = forumTopics.filter(t => {
                const matchesQuery = t.title.toLowerCase().includes(query) || t.content.toLowerCase().includes(query);
                const matchesTag = activeFilterTag === '' || t.tags.includes(activeFilterTag);
                return matchesQuery && matchesTag;
            });
            renderTopicsList(filtered);
        }

        function renderTopicsList(list) {
            const container = document.getElementById('forum-topics-container');
            if (list.length === 0) {
                container.innerHTML = `<div class="faculty-empty">${isEnglish ? 'No cases reported matching these filters.' : 'Chưa có chủ đề nào trong phân khoa này.'}</div>`;
                return;
            }

            container.innerHTML = list.map(t => {
                const commentsListHtml = t.comments.map(c => `
                    <div class="comment-item">
                        <div class="comment-author-row">
                            <span class="comment-author-name">${c.author}</span>
                            ${c.is_mentor ? `<span class="comment-author-badge">Chuyên gia</span>` : ''}
                            <span class="comment-date">${c.date}</span>
                        </div>
                        <div style="margin:0;">${c.content}</div>
                    </div>
                `).join('');

                return `
                    <div class="topic-card" id="topic-card-${t.id}">
                        <div class="topic-card-header">
                            <span class="topic-meta-user">
                                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm0-4h-2V7h2v4z"/></svg>
                                ${t.is_anonymous ? (isEnglish ? 'Anonymous Business' : 'Doanh nghiệp ẩn danh') : t.author_name}
                                ${t.target_mentor ? ` -> ${isEnglish ? 'Consultant: ' : 'Người tư vấn: '} Bác sĩ ${t.target_mentor}` : ''}
                            </span>
                            <span class="topic-date">${t.date}</span>
                        </div>
                        <h3 class="topic-title">${t.title}</h3>
                        <div class="topic-body-content">${t.content}</div>
                        <div class="topic-tags-row">
                            ${t.tags.map(tag => `<span class="topic-tag">#${tag}</span>`).join('')}
                        </div>
                        <div class="topic-footer">
                            <div class="topic-actions">
                                <button type="button" class="btn-action-upvote" onclick="handleUpvote('${t.id}')">
                                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"/></svg>
                                    Đồng ý kiến (<span id="upvotes-count-${t.id}">${t.upvotes}</span>)
                                </button>
                                <button type="button" class="btn-action-comment" onclick="toggleCommentsDrawer('${t.id}')">
                                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18zM18 14H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/></svg>
                                    ${isEnglish ? 'Responses' : 'Thảo luận'} (${t.comments.length})
                                </button>
                            </div>
                        </div>

                        <!-- Comments section -->
                        <div class="comments-drawer" id="comments-drawer-${t.id}">
                            <div class="comments-list">
                                ${commentsListHtml}
                            </div>
                            <div class="comment-input-row">
                                <input type="text" class="comment-input-field" id="comment-input-${t.id}" placeholder="${isEnglish ? 'Add a response...' : 'Nhập câu trả lời/phản hồi...'}" />
                                <button class="btn-comment-submit" onclick="submitComment('${t.id}')">${isEnglish ? 'Send' : 'Gửi'}</button>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');
        }

        function toggleCommentsDrawer(topicId) {
            const drawer = document.getElementById(`comments-drawer-${topicId}`);
            drawer.style.display = drawer.style.display === 'block' ? 'none' : 'block';
        }

        function handleUpvote(topicId) {
            if (topicId.startsWith('mock_')) {
                const countSpan = document.getElementById(`upvotes-count-${topicId}`);
                countSpan.innerText = parseInt(countSpan.innerText) + 1;
                showToast(isEnglish ? 'Thank you for your upvote!' : 'Đã ghi nhận ý kiến đồng cảm!');
                return;
            }

            const formData = new FormData();
            formData.append('action', 'ideas_upvote_topic');
            formData.append('post_id', topicId);

            fetch(ajaxUrl, { method: 'POST', body: formData })
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        document.getElementById(`upvotes-count-${topicId}`).innerText = res.data.upvotes;
                        showToast(isEnglish ? 'Upvoted successfully!' : 'Bình chọn thành công!');
                    }
                });
        }

        function submitComment(topicId) {
            const input = document.getElementById(`comment-input-${topicId}`);
            const text = input.value.trim();
            if (!text) return;

            if (topicId.startsWith('mock_')) {
                showToast(isEnglish ? 'Mock comments cannot be submitted.' : 'Không thể bình luận lên câu hỏi mẫu.');
                input.value = '';
                return;
            }

            const formData = new FormData();
            formData.append('action', 'ideas_submit_clinic_comment');
            formData.append('post_id', topicId);
            formData.append('content', text);
            formData.append('author', currentUser ? currentUser.name : 'Doanh nghiệp');
            formData.append('email', currentUser ? currentUser.email : 'guest@ideas.edu.vn');
            formData.append('is_mentor', 'false');

            fetch(ajaxUrl, { method: 'POST', body: formData })
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        showToast(res.data);
                        input.value = '';
                        toggleCommentsDrawer(topicId);
                    } else {
                        showToast(res.data);
                    }
                });
        }

        // ── Booking Form Submission ──
        function handleBookingSubmit(e) {
            e.preventDefault();

            const mentor = document.getElementById('booking-mentor').value;
            const name = document.getElementById('booking-name').value;
            const phone = document.getElementById('booking-phone').value;
            const email = document.getElementById('booking-email').value;
            const company = document.getElementById('booking-company').value;
            const time = document.getElementById('booking-time').value;
            const desc = document.getElementById('booking-desc').value;

            const formData = new FormData();
            formData.append('action', 'ideas_submit_booking');
            formData.append('mentor', mentor);
            formData.append('name', name);
            formData.append('phone', phone);
            formData.append('email', email);
            formData.append('company', company);
            formData.append('time', time);
            formData.append('desc', desc);

            fetch(ajaxUrl, { method: 'POST', body: formData })
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        showToast(res.data);
                        document.getElementById('clinic-booking-form').reset();
                    } else {
                        showToast(res.data);
                    }
                })
                .catch(err => {
                    showToast(isEnglish ? 'An error occurred, please try again.' : 'Đã có lỗi xảy ra, vui lòng thử lại.');
                });
        }

        // ── Forum New Case/Topic Submission ──
        function handleTopicSubmit(e) {
            e.preventDefault();

            const title = document.getElementById('topic-title').value;
            const mentor = document.getElementById('topic-mentor').value;
            const content = document.getElementById('topic-content').value;
            const anonymous = document.getElementById('topic-anonymous').checked;

            const checkedTags = [];
            document.querySelectorAll('input[name="topic-tags"]:checked').forEach(c => {
                checkedTags.push(c.value);
            });

            const formData = new FormData();
            formData.append('action', 'ideas_submit_clinic_topic');
            formData.append('title', title);
            formData.append('content', content);
            formData.append('target_mentor', mentor);
            formData.append('is_anonymous', anonymous ? 'true' : 'false');
            
            if (currentUser) {
                formData.append('author_name', currentUser.name);
                formData.append('author_email', currentUser.email);
            } else if (!anonymous) {
                showToast(isEnglish ? 'Please log in with Google to post publicly!' : 'Vui lòng đăng nhập Google để thảo luận công khai!');
                return;
            }

            checkedTags.forEach(tag => {
                formData.append('tags[]', tag);
            });

            fetch(ajaxUrl, { method: 'POST', body: formData })
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        showToast(res.data);
                        closeNewTopicModal();
                        document.getElementById('clinic-topic-form').reset();
                    } else {
                        showToast(res.data);
                    }
                })
                .catch(err => {
                    showToast(isEnglish ? 'An error occurred, please try again.' : 'Đã có lỗi xảy ra, vui lòng thử lại.');
                });
        }

        // ── Modals Utilities ──
        function openNewTopicModal() {
            document.getElementById('topic-modal-overlay').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeNewTopicModal() {
            document.getElementById('topic-modal-overlay').style.display = 'none';
            document.body.style.overflow = '';
        }

        // Show Toast Notification
        function showToast(msg) {
            const toast = document.getElementById('clinic-toast-element');
            document.getElementById('clinic-toast-msg').innerText = msg;
            toast.style.display = 'flex';

            setTimeout(() => {
                toast.style.display = 'none';
            }, 4000);
        }
    </script>
</body>
</html>
