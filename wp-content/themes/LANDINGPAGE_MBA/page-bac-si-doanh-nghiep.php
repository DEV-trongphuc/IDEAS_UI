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
            background-image: url('https://ideas.edu.vn/wp-content/uploads/2025/03/buoihuongdan-optimized.webp');
            background-size: cover;
            background-position: center;
            opacity: 0.55;
            transform: scale(1.05);
            will-change: transform;
        }

        .lms-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(180deg,
                    rgba(8, 4, 5, 0.85) 0%,
                    rgba(80, 6, 0, 0.45) 60%,
                    rgba(8, 4, 5, 0.95) 100%),
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
            color: #ffffff;
            max-width: 750px;
            margin: 0 auto 36px;
            line-height: 1.65;
            font-weight: 600;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.85);
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
            grid-template-columns: 1fr;
            gap: 30px;
        }

        @media (min-width: 768px) {
            .stats-grid {
                grid-template-columns: repeat(3, 1fr);
            }
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
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .stat-card-premium:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(171, 14, 0, 0.08);
            border-color: rgba(171, 14, 0, 0.15);
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

        /* ── Section: Bottleneck & Pain Point Maps (NEW) ── */
        .bottleneck-section {
            padding: 80px 20px;
            background: #080405;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            position: relative;
            overflow: hidden;
        }

        .bottleneck-section .section-header-premium h2 {
            color: #ffffff !important;
            position: relative;
            z-index: 3;
        }

        .bottleneck-section .section-header-premium p {
            color: #94a3b8 !important;
            position: relative;
            z-index: 3;
        }

        .bottleneck-container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 3;
        }

        .bottleneck-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 40px;
            margin-top: 40px;
        }

        @media (min-width: 992px) {
            .bottleneck-grid {
                grid-template-columns: 1.2fr 0.8fr;
            }
        }

        .bottleneck-left-col {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .bottleneck-image-decor {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.3s ease;
        }

        .bottleneck-image-decor:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 40px rgba(171, 14, 0, 0.2);
        }

        .bottleneck-image-decor img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
        }

        .flow-container-vertical {
            display: flex;
            flex-direction: column;
            gap: 20px;
            position: relative;
        }

        /* Animated moving gradient flowline (WHITE THEME) */
        @keyframes flowLine {
            0% { background-position: 0% 0%; }
            100% { background-position: 0% 200%; }
        }

        .flow-container-vertical::before {
            content: '';
            position: absolute;
            left: 28px;
            top: 20px;
            bottom: 20px;
            width: 3px;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.25) 0%, #ffffff 50%, rgba(255, 255, 255, 0.25) 100%);
            background-size: 100% 200%;
            animation: flowLine 3s linear infinite;
            opacity: 0.9;
            z-index: 1;
        }

        .bottleneck-flow-node {
            display: flex;
            gap: 20px;
            align-items: flex-start;
            position: relative;
            z-index: 2;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .node-icon-wrapper {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            background: #ffffff;
            border: 2px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #0f172a;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Pulsing Glow active node animation */
        @keyframes pulseActive {
            0% { box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(255, 255, 255, 0); }
            100% { box-shadow: 0 0 0 0 rgba(255, 255, 255, 0); }
        }

        .bottleneck-flow-node.active .node-icon-wrapper {
            border-color: #ffffff;
            color: #ffffff;
            background: linear-gradient(135deg, #ab0e00 0%, #8e0b00 100%);
            animation: pulseActive 2s infinite;
        }

        .node-content-card {
            background: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            padding: 32px 24px;
            flex-grow: 1;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .bottleneck-flow-node:hover .node-content-card {
            transform: translateX(6px);
            background: #ffffff;
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.4);
        }

        .bottleneck-flow-node.active .node-content-card {
            background: linear-gradient(135deg, #ab0e00 0%, #8e0b00 100%);
            border-color: #ab0e00;
            box-shadow: 0 15px 35px rgba(171, 14, 0, 0.4);
        }

        .bottleneck-flow-node.active .node-title-label {
            color: #ffffff;
        }

        .bottleneck-flow-node.active .node-short-desc {
            color: rgba(255, 255, 255, 0.85);
        }

        .bottleneck-flow-node.active .node-badge-alert {
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
        }

        .node-badge-alert {
            font-size: 0.72rem;
            font-weight: 800;
            background: rgba(171, 14, 0, 0.08);
            color: var(--clr-primary);
            padding: 2px 8px;
            border-radius: 4px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 8px;
            display: inline-block;
        }

        .node-title-label {
            font-size: 1.15rem;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 8px;
        }

        .node-short-desc {
            font-size: 0.88rem;
            color: #475569;
            line-height: 1.6;
            margin: 0;
            font-weight: 500;
        }

        /* ── Decorator Elements (SVG & Glow) ── */
        .bottleneck-decor-element {
            position: absolute;
            border-radius: 50%;
            filter: blur(120px);
            z-index: 1;
            pointer-events: none;
            opacity: 0.15;
            transition: all 0.5s ease;
        }

        .decor-orb-1 {
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, rgba(171,14,0,0.8) 0%, rgba(171,14,0,0) 70%);
            top: -100px;
            right: -100px;
            animation: orbFloating 8s ease-in-out infinite alternate;
        }

        .decor-orb-2 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(59,130,246,0.5) 0%, rgba(59,130,246,0) 70%);
            bottom: -150px;
            left: -150px;
            animation: orbFloating 10s ease-in-out infinite alternate-reverse;
        }

        .bottleneck-decor-svg {
            position: absolute;
            z-index: 1;
            pointer-events: none;
        }

        .decor-grid-mesh {
            top: 10%;
            left: 5%;
            opacity: 0.3;
        }

        .decor-dots-pattern {
            top: 30%;
            right: 2%;
            opacity: 0.2;
        }

        .decor-abstract-rings {
            bottom: 10%;
            right: 15%;
            animation: spinSlow 30s linear infinite;
            opacity: 0.4;
        }

        @keyframes orbFloating {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(30px, 20px) scale(1.1); }
        }

        @keyframes spinSlow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Prescription Panel styling */
        .prescription-board {
            background: #ffffff;
            color: #334155;
            border-radius: 24px;
            padding: 36px;
            box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.08);
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 100px;
            min-height: 480px;
            border: 1.5px solid #e2e8f0;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .presc-header {
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 20px;
            margin-bottom: 24px;
        }

        .presc-header-tag {
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            color: var(--clr-primary);
            letter-spacing: 0.1em;
            display: block;
            margin-bottom: 8px;
        }

        .presc-title {
            font-size: 1.4rem;
            font-weight: 800;
            margin: 0;
            color: var(--clr-navy);
        }

        .presc-body {
            flex-grow: 1;
        }

        #prescription-content-wrapper {
            transition: all 0.3s ease;
        }

        .presc-section-title {
            font-size: 0.8rem;
            font-weight: 800;
            text-transform: uppercase;
            color: #64748b;
            letter-spacing: 0.05em;
            margin-bottom: 14px;
            display: block;
        }

        .presc-point-item {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            margin-bottom: 16px;
        }

        .presc-bullet-check {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: rgba(239, 68, 68, 0.12);
            color: #ef4444;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 0.7rem;
            margin-top: 2px;
            font-weight: bold;
        }

        .presc-bullet-check.success {
            background: rgba(16, 185, 129, 0.12);
            color: #10b981;
        }

        .presc-text {
            font-size: 0.88rem;
            line-height: 1.5;
            color: #475569;
            margin: 0;
            font-weight: 500;
            text-align: left;
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
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
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
            z-index: 1;
        }

        .mentor-card-content {
            padding: 0 28px 28px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            flex-grow: 1;
            position: relative;
            z-index: 2;
        }

        /* Enforced relative positioning and z-index to resolve cutoff avatar issue */
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
            position: relative;
            z-index: 10 !important;
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

        /* ── Clinic Forum Section (Full Width Layout - No Sidebar) ── */
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

        /* ── Premium Form Group Elements (Fixes Modal Layout Error) ── */
        .clinic-form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .clinic-form-label {
            font-size: 0.82rem;
            font-weight: 700;
            color: var(--clr-navy);
            text-transform: uppercase;
            letter-spacing: 0.03em;
            text-align: left;
        }

        .clinic-form-input,
        .clinic-form-select,
        .clinic-form-textarea {
            width: 100% !important;
            padding: 12px 16px !important;
            border: 1.5px solid #cbd5e1 !important;
            border-radius: 12px !important;
            font-size: 0.9rem !important;
            color: var(--clr-navy) !important;
            background-color: #ffffff !important;
            transition: all 0.2s ease !important;
            font-weight: 500 !important;
            outline: none !important;
            box-sizing: border-box !important;
        }

        .clinic-form-input:focus,
        .clinic-form-select:focus,
        .clinic-form-textarea:focus {
            border-color: var(--clr-primary) !important;
            box-shadow: 0 0 0 3px rgba(171, 14, 0, 0.1) !important;
        }

        .clinic-form-textarea {
            resize: vertical;
        }

        /* ── Split Layout for Booking Modal ── */
        .booking-modal-grid {
            display: grid;
            grid-template-columns: 1fr;
        }

        @media (min-width: 768px) {
            .booking-modal-grid {
                grid-template-columns: 350px 1fr;
            }
        }

        .booking-doctor-panel {
            background: #f8fafc;
            border-right: 1px solid #e2e8f0;
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        #booking-doctor-img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #ffffff;
            box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .booking-doctor-meta {
            width: 100%;
        }

        .booking-doctor-meta h4 {
            font-size: 1.3rem !important;
            font-weight: 800 !important;
            color: var(--clr-navy);
            margin: 10px 0 6px !important;
        }

        .booking-doctor-meta p {
            font-size: 0.82rem;
            color: #64748b;
            line-height: 1.6;
            margin-top: 12px;
            font-weight: 500;
            text-align: justify;
        }

        .booking-form-panel {
            padding: 30px;
        }

        /* ── Premium Modal Formatting ── */
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

        /* Make split booking modal wider */
        .clinic-form-modal[style*="max-width: 900px"] {
            max-width: 950px !important;
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
            gap: 16px;
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
            .lms-hero {
                padding: 160px 16px 80px !important;
            }
            .lms-hero h1 {
                font-size: 2.1rem !important;
                line-height: 1.3 !important;
            }
            .lms-hero p {
                font-size: 0.95rem !important;
                line-height: 1.6 !important;
                margin-bottom: 24px !important;
            }
            .lms-hero-badge {
                margin-bottom: 16px !important;
                padding: 6px 14px !important;
                font-size: 0.75rem !important;
            }
            .verify-slogan {
                font-size: 0.95rem !important;
                margin-bottom: 16px !important;
            }
            .lms-hero-actions {
                flex-direction: column !important;
                gap: 12px !important;
                width: 100% !important;
                padding: 0 10px !important;
            }
            .btn-primary-premium, .btn-secondary-premium {
                width: 100% !important;
                padding: 12px 20px !important;
                font-size: 0.88rem !important;
            }
            
            /* Stats responsive layout */
            .clinic-stats-section {
                padding: 40px 16px !important;
            }
            .stats-grid {
                grid-template-columns: 1fr !important;
                gap: 20px !important;
            }
            .stat-card-premium {
                padding: 24px !important;
                min-height: auto !important;
            }
            .stat-card-number {
                font-size: 2.2rem !important;
            }

            /* Expert section & slide dot */
            .mentors-section {
                padding: 45px 0 45px 16px !important;
                overflow-x: hidden !important;
            }
            .section-header-premium {
                margin-bottom: 30px !important;
                padding-right: 16px !important;
            }
            .section-header-premium h2 {
                font-size: 1.8rem !important;
            }
            .mentors-grid {
                display: flex !important;
                overflow-x: auto !important;
                scroll-snap-type: x mandatory !important;
                scroll-behavior: smooth !important;
                gap: 20px !important;
                padding-bottom: 20px !important;
                padding-right: 16px !important;
                -webkit-overflow-scrolling: touch !important;
            }
            .mentor-card-premium {
                min-width: 82vw !important;
                max-width: 82vw !important;
                scroll-snap-align: center !important;
                flex-shrink: 0 !important;
            }
            .mentors-grid::-webkit-scrollbar {
                display: none !important;
            }
            
            /* Slider dots style */
            .slider-dots {
                display: flex !important;
                justify-content: center;
                gap: 8px;
                margin-top: 16px;
                padding-right: 16px;
            }
            .slider-dot {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: #cbd5e1;
                cursor: pointer;
                transition: all 0.3s ease;
            }
            .slider-dot.active {
                width: 24px;
                border-radius: 4px;
                background: var(--clr-primary);
            }

            /* Forum mobile design */
            .clinic-forum-section {
                padding: 40px 16px !important;
            }
            .topic-card {
                padding: 16px !important;
            }
            .topic-title {
                font-size: 1rem !important;
            }
            .btn-action-upvote, .btn-action-comment {
                padding: 8px 10px !important;
                font-size: 0.75rem !important;
            }
            
            /* Booking split modal mobile fixes */
            .booking-doctor-panel {
                padding: 20px !important;
                border-right: none !important;
                border-bottom: 1px solid #e2e8f0 !important;
            }
            .booking-form-panel {
                padding: 20px !important;
            }
            #booking-doctor-img {
                width: 90px !important;
                height: 90px !important;
                margin-bottom: 12px !important;
            }
            .clinic-form-modal {
                max-height: 95vh !important;
            }

            /* Bottlenecks section mobile overrides */
            .bottleneck-section {
                padding: 40px 16px !important;
            }
            .bottleneck-grid {
                grid-template-columns: 1fr !important;
                gap: 30px !important;
            }
            .prescription-board {
                padding: 24px !important;
                min-height: auto !important;
                position: relative !important;
                top: 0 !important;
            }
            .presc-title {
                font-size: 1.2rem !important;
            }
        }

        .slider-dots {
            display: none;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
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
                <a href="javascript:void(0)" class="btn-primary-premium" onclick="openBookingModal()">
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
        <!-- Section Header to make it taller and fuller -->
        <div class="section-header-premium" style="text-align: center; margin-bottom: 50px;">
            <span style="font-size: 0.85rem; font-weight: 800; color: var(--clr-primary); text-transform: uppercase; letter-spacing: 0.15em; display: block; margin-bottom: 8px;">BÁO CÁO HOẠT ĐỘNG THỰC TẾ</span>
            <h2 style="font-size: 2.2rem; font-weight: 800; color: var(--clr-navy); margin: 0 0 12px; letter-spacing: -0.01em;">Chỉ số Hội chẩn & Tỷ lệ Phục hồi</h2>
            <p style="font-size: 0.98rem; color: #64748b; max-width: 650px; margin: 0 auto; line-height: 1.6; font-weight: 500;">Dữ liệu thống kê thực tế được tổng hợp từ các hoạt động hội chẩn lâm sàng và trị liệu điểm nghẽn doanh nghiệp từ Hội đồng.</p>
        </div>

        <div class="stats-grid">
            <!-- Card 1 -->
            <div class="stat-card-premium">
                <div class="stat-card-header">
                    <span class="stat-card-label"><?php echo $is_en ? 'Total Cases Analyzed' : 'Số ca chẩn đoán tích lũy'; ?></span>
                    <div class="stat-icon-wrapper">
                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                    </div>
                </div>
                <div>
                    <div style="display: flex; align-items: baseline; gap: 10px; margin: 10px 0 6px;">
                        <h2 class="stat-card-number" id="stat-total-cases" style="margin: 0;">124 ca</h2>
                        <span style="font-size: 0.85rem; font-weight: 700; color: #10b981; background: rgba(16, 185, 129, 0.08); padding: 2px 8px; border-radius: 6px; display: inline-flex; align-items: center; gap: 2px; transform: translateY(-3px);">
                            <svg width="10" height="10" fill="currentColor" viewBox="0 0 24 24"><path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"/></svg>
                            +12%
                        </span>
                    </div>
                    <p class="stat-card-desc"><?php echo $is_en ? 'Real-world business case files and private clinic requests successfully processed.' : 'Hồ sơ bệnh án và yêu cầu khám bệnh riêng biệt đã được Hội đồng xử lý thành công.'; ?></p>
                </div>
            </div>
            
            <!-- Card 2 -->
            <div class="stat-card-premium">
                <div class="stat-card-header">
                    <span class="stat-card-label"><?php echo $is_en ? 'Eradication Rate' : 'Hiệu quả trị liệu'; ?></span>
                    <div class="stat-icon-wrapper">
                        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                    </div>
                </div>
                <div>
                    <h2 class="stat-card-number" id="stat-resolved-rate">92%</h2>
                    <div style="height: 6px; background: #f1f5f9; border-radius: 3px; overflow: hidden; margin: 8px 0 12px; position: relative;">
                        <div style="position: absolute; left: 0; top: 0; bottom: 0; width: 92%; background: linear-gradient(90deg, #f43f5e 0%, #ab0e00 100%); border-radius: 3px;"></div>
                    </div>
                    <p class="stat-card-desc"><?php echo $is_en ? 'Mentored enterprises report measurable operational improvements and structure recovery.' : 'Tỷ lệ doanh nghiệp cải thiện hiệu suất vận hành vượt bậc sau khi áp dụng giải pháp.'; ?></p>
                </div>
            </div>

            <!-- Card 3 (Premium Donut Chart Panel) -->
            <div class="stat-card-premium" style="display: flex; flex-direction: column; align-items: center; text-align: center; gap: 20px; justify-content: center; min-height: 220px;">
                <div class="chart-container-donut">
                    <!-- SVG Circular Donut Chart -->
                    <svg width="120" height="120" viewBox="0 0 42 42" class="donut">
                        <circle class="donut-hole" cx="21" cy="21" r="15.915" fill="#ffffff"></circle>
                        <circle class="donut-ring" cx="21" cy="21" r="15.915" fill="transparent" stroke="#f1f5f9" stroke-width="4.5"></circle>
                        
                        <!-- Segments: 65% Blue (AI), 20% Red (Strategy), 15% Navy (HR) -->
                        <circle class="donut-segment" cx="21" cy="21" r="15.915" fill="transparent" stroke="#3b82f6" stroke-width="5" stroke-dasharray="65 35" stroke-dashoffset="100"></circle>
                        <circle class="donut-segment" cx="21" cy="21" r="15.915" fill="transparent" stroke="#ab0e00" stroke-width="5" stroke-dasharray="20 80" stroke-dashoffset="35"></circle>
                        <circle class="donut-segment" cx="21" cy="21" r="15.915" fill="transparent" stroke="#0f172a" stroke-width="5" stroke-dasharray="15 85" stroke-dashoffset="15"></circle>
                    </svg>
                </div>
                <div>
                    <span class="stat-card-label" style="display:block; margin-bottom:8px; font-weight: 800;"><?php echo $is_en ? 'Disease Spectrum' : 'Bản đồ Bệnh lý'; ?></span>
                    <div class="chart-legend" style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; gap: 6px 12px; margin-top: 4px;">
                        <div class="legend-item" style="padding: 2px 6px; font-size: 0.75rem;"><span class="legend-color-dot" style="background:#3b82f6;"></span> 65% AI & Số hóa</div>
                        <div class="legend-item" style="padding: 2px 6px; font-size: 0.75rem;"><span class="legend-color-dot" style="background:#ab0e00;"></span> 20% Chiến lược</div>
                        <div class="legend-item" style="padding: 2px 6px; font-size: 0.75rem;"><span class="legend-color-dot" style="background:#0f172a;"></span> 15% Nhân sự</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ── Section: Bản đồ Điểm nghẽn Cổ chai Doanh nghiệp (NEW) ── -->
    <section class="bottleneck-section">
        <!-- Premium SVG Decorators -->
        <div class="bottleneck-decor-element decor-orb-1"></div>
        <div class="bottleneck-decor-element decor-orb-2"></div>
        <div class="bottleneck-decor-svg decor-grid-mesh">
            <svg width="600" height="600" fill="none" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="rgba(255,255,255,0.03)" stroke-width="1"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>
        <div class="bottleneck-decor-svg decor-dots-pattern">
            <svg width="150" height="300" fill="none" viewBox="0 0 150 300" xmlns="http://www.w3.org/2000/svg">
                <pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse">
                    <circle cx="2" cy="2" r="2" fill="rgba(255,255,255,0.1)"/>
                </pattern>
                <rect width="100%" height="100%" fill="url(#dots)" />
            </svg>
        </div>
        <div class="bottleneck-decor-svg decor-abstract-rings">
            <svg width="400" height="400" fill="none" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
                <circle cx="200" cy="200" r="180" stroke="rgba(171,14,0,0.1)" stroke-width="1" stroke-dasharray="10 15"/>
                <circle cx="200" cy="200" r="140" stroke="rgba(255,255,255,0.05)" stroke-width="1.5"/>
                <circle cx="200" cy="200" r="100" stroke="rgba(59,130,246,0.08)" stroke-width="1" stroke-dasharray="5 5"/>
            </svg>
        </div>
        <div class="bottleneck-container">
            <div class="section-header-premium">
                <h2><?php echo $is_en ? '<span class="gradient-text-red">Corporate Bottlenecks</span>' : '<span class="gradient-text-red">Điểm nghẽn Cổ chai</span> Doanh nghiệp'; ?></h2>
                <p><?php echo $is_en ? 'Explore typical business bottlenecks and corresponding academic prescriptions designed by IDEAS.' : 'Phân tích các triệu chứng bệnh lý phổ biến gây đình trệ và lộ trình chẩn trị thực chiến từ Hội đồng Bác sĩ Doanh nghiệp.'; ?></p>
            </div>

            <div class="bottleneck-grid">
                <!-- Left: Flow Diagram Timeline & Process -->
                <div class="bottleneck-left-col">
                    <div class="flow-container-vertical">
                        <!-- Node 1 -->
                        <div class="bottleneck-flow-node active" onclick="selectBottleneck('strategy', this)">
                            <div class="node-icon-wrapper">
                                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                            </div>
                            <div class="node-content-card">
                                <span class="node-badge-alert"><?php echo $is_en ? 'Direction Pain Point' : 'Điểm nghẽn Chiến lược'; ?></span>
                                <h3 class="node-title-label"><?php echo $is_en ? 'Strategic Direction & Shareholders' : 'Chiến lược & Định hướng Cổ đông'; ?></h3>
                                <p class="node-short-desc"><?php echo $is_en ? 'Conflict in leadership viewpoints, missing target structures (KPIs/OKRs).' : 'Mâu thuẫn tư duy của nhà sáng lập, thiếu mục tiêu đo lường KPIs và OKRs cụ thể.'; ?></p>
                            </div>
                        </div>

                        <!-- Node 2 -->
                        <div class="bottleneck-flow-node" onclick="selectBottleneck('digital', this)">
                            <div class="node-icon-wrapper">
                                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                            </div>
                            <div class="node-content-card">
                                <span class="node-badge-alert"><?php echo $is_en ? 'Operational Bottleneck' : 'Điểm nghẽn Vận hành'; ?></span>
                                <h3 class="node-title-label"><?php echo $is_en ? 'Digital Transformation & Manual Process' : 'Chuyển đổi số & Vận hành Thủ công'; ?></h3>
                                <p class="node-short-desc"><?php echo $is_en ? 'Fragmented systems, missing AI integration, manual repetitive workflow.' : 'Hệ thống rời rạc, chưa ứng dụng AI và tự động hóa quy trình sản xuất kinh doanh.'; ?></p>
                            </div>
                        </div>

                        <!-- Node 3 -->
                        <div class="bottleneck-flow-node" onclick="selectBottleneck('hr', this)">
                            <div class="node-icon-wrapper">
                                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            </div>
                            <div class="node-content-card">
                                <span class="node-badge-alert"><?php echo $is_en ? 'Talent Drain' : 'Điểm nghẽn Nhân sự'; ?></span>
                                <h3 class="node-title-label"><?php echo $is_en ? 'HR Retention & Executive Level' : 'Chảy máu chất xám & Quản lý trung cấp'; ?></h3>
                                <p class="node-short-desc"><?php echo $is_en ? 'Lack of internal training, poor reward structure, high staff turnover.' : 'Nhân sự cấp trung rời bỏ, cơ chế đãi ngộ và lộ trình phát triển thiếu bền vững.'; ?></p>
                            </div>
                        </div>

                        <!-- Node 4 -->
                        <div class="bottleneck-flow-node" onclick="selectBottleneck('finance', this)">
                            <div class="node-icon-wrapper">
                                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div class="node-content-card">
                                <span class="node-badge-alert"><?php echo $is_en ? 'Capital & Cash flow' : 'Điểm nghẽn Tài chính'; ?></span>
                                <h3 class="node-title-label"><?php echo $is_en ? 'Cash Flow Shortage & Valuation' : 'Dòng tiền & Cấu trúc thương vụ gọi vốn'; ?></h3>
                                <p class="node-short-desc"><?php echo $is_en ? 'Short-term liquidity crisis, faulty valuation models for funding.' : 'Đứt gãy dòng tiền ngắn hạn, định giá chưa chuẩn xác khi gọi vốn đầu tư.'; ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Clinical Consultation Process Card -->
                    <div class="bottleneck-process-card" style="margin-top: 10px; padding: 32px 28px; background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 20px;">
                        <h4 style="font-size: 0.95rem; font-weight: 800; color: #ff8888; text-transform: uppercase; letter-spacing: 0.08em; margin: 0 0 20px; display: flex; align-items: center; gap: 8px;">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-2 10h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/></svg>
                            <?php echo $is_en ? 'Clinical Consultation Process' : 'Quy trình Chẩn trị Doanh nghiệp'; ?>
                        </h4>
                        <div class="process-steps-list" style="display: flex; flex-direction: column; gap: 20px;">
                            <!-- Step 1 -->
                            <div class="process-step-item" style="display: flex; gap: 16px; align-items: flex-start;">
                                <span class="step-number" style="font-size: 0.8rem; font-weight: 800; color: #ffffff; background: #ab0e00; width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 2px 8px rgba(171, 14, 0, 0.4);">1</span>
                                <div style="flex: 1;">
                                    <h5 style="font-size: 0.9rem; font-weight: 800; color: #ffffff; margin: 0 0 4px;"><?php echo $is_en ? '1. Dossier Submission & Booking' : 'Bước 1: Gửi Hồ sơ & Đăng ký Khám'; ?></h5>
                                    <p style="font-size: 0.82rem; color: #94a3b8; margin: 0; line-height: 1.5;"><?php echo $is_en ? 'Submit your operational data and schedule a private 1:1 briefing session.' : 'Doanh nghiệp cung cấp thông tin triệu chứng và đặt lịch hội chẩn ban đầu.'; ?></p>
                                </div>
                            </div>
                            <!-- Step 2 -->
                            <div class="process-step-item" style="display: flex; gap: 16px; align-items: flex-start;">
                                <span class="step-number" style="font-size: 0.8rem; font-weight: 800; color: #ffffff; background: #3b82f6; width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 2px 8px rgba(59, 130, 246, 0.4);">2</span>
                                <div style="flex: 1;">
                                    <h5 style="font-size: 0.9rem; font-weight: 800; color: #ffffff; margin: 0 0 4px;"><?php echo $is_en ? '2. Council Case Consultation' : 'Bước 2: Hội đồng Chẩn trị Lâm sàng'; ?></h5>
                                    <p style="font-size: 0.82rem; color: #94a3b8; margin: 0; line-height: 1.5;"><?php echo $is_en ? 'Business Doctors convene to analyze core bottlenecks and design customized roadmaps.' : 'Hội đồng chuyên gia trực tiếp hội chẩn, bóc tách nguyên nhân rễ tre của điểm nghẽn.'; ?></p>
                                </div>
                            </div>
                            <!-- Step 3 -->
                            <div class="process-step-item" style="display: flex; gap: 16px; align-items: flex-start;">
                                <span class="step-number" style="font-size: 0.8rem; font-weight: 800; color: #ffffff; background: #10b981; width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 2px 8px rgba(16, 185, 129, 0.4);">3</span>
                                <div style="flex: 1;">
                                    <h5 style="font-size: 0.9rem; font-weight: 800; color: #ffffff; margin: 0 0 4px;"><?php echo $is_en ? '3. Prescription & Execution' : 'Bước 3: Nhận Phác đồ & Trị liệu'; ?></h5>
                                    <p style="font-size: 0.82rem; color: #94a3b8; margin: 0; line-height: 1.5;"><?php echo $is_en ? 'Receive actionable solutions, KPIs structure, and direct execution guidance.' : 'Doanh nghiệp nhận phác đồ chi tiết và đồng hành triển khai giải quyết dứt điểm.'; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Prescription Panel -->
                <div class="prescription-board">
                    <div class="presc-header">
                        <span class="presc-header-tag" id="presc-slogan">Tháo gỡ xung đột & Thiết lập Hệ chỉ số OKRs</span>
                        <h3 class="presc-title" id="presc-title">Chiến lược & Định hướng</h3>
                    </div>
                    
                    <div class="presc-body" id="prescription-content-wrapper">
                        <span class="presc-section-title"><?php echo $is_en ? 'Identified Bottlenecks' : 'Triệu chứng điểm nghẽn'; ?></span>
                        <div id="presc-bottlenecks">
                            <div class="presc-point-item">
                                <div class="presc-bullet-check">✕</div>
                                <p class="presc-text">Thiếu định hướng tầm nhìn và chiến lược tăng trưởng dài hạn.</p>
                            </div>
                            <div class="presc-point-item">
                                <div class="presc-bullet-check">✕</div>
                                <p class="presc-text">Lợi ích nội bộ chồng chéo, xung đột quyền lợi giữa các cổ đông sáng lập.</p>
                            </div>
                            <div class="presc-point-item">
                                <div class="presc-bullet-check">✕</div>
                                <p class="presc-text">Hệ thống báo cáo hiệu suất (KPIs/OKRs) mơ hồ, thiếu thực thi.</p>
                            </div>
                        </div>

                        <span class="presc-section-title" style="margin-top:24px;"><?php echo $is_en ? 'Council Therapeutic Prescription' : 'Đơn thuốc điều trị từ Hội đồng'; ?></span>
                        <div id="presc-solutions">
                            <div class="presc-point-item">
                                <div class="presc-bullet-check success">✓</div>
                                <p class="presc-text">Quy hoạch và tái cơ cấu hội đồng quản trị chuyên nghiệp.</p>
                            </div>
                            <div class="presc-point-item">
                                <div class="presc-bullet-check success">✓</div>
                                <p class="presc-text">Thiết lập ma trận phân quyền (RACI) rõ ràng cho từng vị trí lãnh đạo.</p>
                            </div>
                            <div class="presc-point-item">
                                <div class="presc-bullet-check success">✓</div>
                                <p class="presc-text">Đào tạo và thiết lập hệ chỉ số OKRs thực chiến gắn với văn hóa IDEAS.</p>
                            </div>
                        </div>
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
        <div class="slider-dots" id="mentors-slider-dots"></div>
    </section>

    <!-- ── Clinic Forum Section (Full Width Layout - No Sidebar) ── -->
    <section class="clinic-forum-section" id="clinic-forum-anchor">
        <div class="forum-container">
            <!-- Full Width Column: Topic Feed -->
            <div style="width: 100%;">
                <div class="forum-header-bar">
                    <h2 style="font-size: 1.8rem; font-weight: 800; color: var(--clr-navy); margin: 0;"><?php echo $is_en ? 'Pathology Diagnostics (Forum)' : 'Phòng Pain Point doanh nghiệp'; ?></h2>
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

    <!-- ── Modal: Booking 1:1 (Split Layout With Doctor Details) ── -->
    <div class="clinic-form-overlay" id="booking-modal-overlay">
        <div class="clinic-form-modal" style="max-width: 900px;">
            <!-- Modal Header -->
            <div class="form-modal-header">
                <h3 class="form-modal-title"><?php echo $is_en ? 'Book Private 1:1 Consultation' : 'Đăng ký phòng chẩn bệnh 1:1'; ?></h3>
                <button class="form-modal-close" onclick="closeBookingModal()">&times;</button>
            </div>
            
            <!-- Modal Body (Two columns on desktop) -->
            <div class="booking-modal-grid">
                <!-- Left: Doctor Profile Panel -->
                <div class="booking-doctor-panel" id="booking-doctor-left-panel">
                    <img id="booking-doctor-img" src="" alt="Doctor Avatar" />
                    <div class="booking-doctor-meta">
                        <span id="booking-doctor-degree" class="mentor-degree-badge"></span>
                        <h4 id="booking-doctor-name"></h4>
                        <span id="booking-doctor-specialty" class="mentor-specialty"></span>
                        <p id="booking-doctor-job"></p>
                    </div>
                </div>
                
                <!-- Right: Form Panel -->
                <div class="booking-form-panel">
                    <form id="clinic-booking-form" onsubmit="handleBookingSubmit(event)">
                        <input type="hidden" id="booking-mentor-hidden" />
                        
                        <!-- Doctor select dropdown (Visible only in general booking) -->
                        <div class="clinic-form-group" id="booking-select-group" style="display:none;">
                            <label class="clinic-form-label"><?php echo $is_en ? 'Select Doctor' : 'Chọn Bác sĩ chuyên khoa'; ?></label>
                            <select class="clinic-form-select" id="booking-mentor-select">
                                <option value=""><?php echo $is_en ? '-- Select Doctor --' : '-- Chọn Bác sĩ mong muốn --'; ?></option>
                            </select>
                        </div>

                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                            <div class="clinic-form-group">
                                <label class="clinic-form-label"><?php echo $is_en ? 'Your Name' : 'Họ và tên'; ?></label>
                                <input type="text" class="clinic-form-input" id="booking-name" required />
                            </div>
                            <div class="clinic-form-group">
                                <label class="clinic-form-label"><?php echo $is_en ? 'Phone Number' : 'Số điện thoại'; ?></label>
                                <input type="tel" class="clinic-form-input" id="booking-phone" required />
                            </div>
                        </div>

                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                            <div class="clinic-form-group">
                                <label class="clinic-form-label"><?php echo $is_en ? 'Email' : 'Địa chỉ Email'; ?></label>
                                <input type="email" class="clinic-form-input" id="booking-email" required />
                            </div>
                            <div class="clinic-form-group">
                                <label class="clinic-form-label"><?php echo $is_en ? 'Company' : 'Tên doanh nghiệp'; ?></label>
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
                            <label class="clinic-form-label"><?php echo $is_en ? 'Describe Bottlenecks' : 'Mô tả chi tiết điểm nghẽn của doanh nghiệp'; ?></label>
                            <textarea class="clinic-form-textarea" id="booking-desc" rows="4" placeholder="<?php echo $is_en ? 'Outline the core issues or strategic problem...' : 'Mô tả ngắn gọn về khó khăn vận hành, tài chính, nhân sự...'; ?>" required></textarea>
                        </div>

                        <button type="submit" class="btn-primary-premium" style="width:100%; justify-content:center; margin-top:8px;">
                            <?php echo $is_en ? 'Confirm Booking' : 'Gửi yêu cầu'; ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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

        // 4 Key corporate pain points & therapeutic solutions
        const BOTTLENECK_DATA = {
            strategy: {
                title: isEnglish ? "Strategic Direction" : "Chiến lược & Định hướng",
                slogan: isEnglish ? "Resolve shareholder conflicts & build clear KPIs/OKRs" : "Tháo gỡ xung đột & Thiết lập Hệ chỉ số OKRs",
                bottlenecks: isEnglish ? [
                    "Lack of clear growth plans and vision for 3-5 years scale.",
                    "Overlapping management authority, conflict of interest among founding members.",
                    "Ambiguous performance metrics (KPIs/OKRs), poor execution."
                ] : [
                    "Thiếu định hướng tầm nhìn và chiến lược tăng trưởng dài hạn.",
                    "Lợi ích nội bộ chồng chéo, xung đột quyền lợi giữa các cổ đông sáng lập.",
                    "Hệ thống báo cáo hiệu suất (KPIs/OKRs) mơ hồ, thiếu thực thi."
                ],
                solutions: isEnglish ? [
                    "Formal restructuring of the academic advisory board.",
                    "Implement a clean RACI decision matrix for the executives.",
                    "Train and launch performance OKRs mapped directly to IDEAS culture."
                ] : [
                    "Quy hoạch và tái cơ cấu hội đồng quản trị chuyên nghiệp.",
                    "Thiết lập ma trận phân quyền (RACI) rõ ràng cho từng vị trí lãnh đạo.",
                    "Đào tạo và thiết lập hệ chỉ số OKRs thực chiến gắn với văn hóa IDEAS."
                ]
            },
            digital: {
                title: isEnglish ? "Digital Transformation" : "Chuyển đổi số & Vận hành",
                slogan: isEnglish ? "Digitize processes & leverage AI to scale productivity 200%" : "Số hóa Quy trình & Tích hợp AI gia tăng 200% năng suất",
                bottlenecks: isEnglish ? [
                    "Manual, repetitive workflows causing operational resource waste.",
                    "Fragmented SaaS software (CRM, ERP) lacking synchronized data channels.",
                    "Missing AI copilots to accelerate sales and content writing."
                ] : [
                    "Vận hành thủ công rườm rã, lặp đi lặp lại gây lãng phí nguồn lực.",
                    "Các hệ thống phần mềm (ERP, CRM) hoạt động rời rạc, thiếu đồng bộ dữ liệu.",
                    "Chưa khai thác được sức mạnh AI làm đòn bẩy trong các khâu kinh doanh."
                ],
                solutions: isEnglish ? [
                    "Audit and map workflows matching Lean Six Sigma guidelines.",
                    "Integrate software APIs into a unified corporate database.",
                    "Deploy custom private AI assistants built specifically by IDEAS."
                ] : [
                    "Chuẩn hóa và vẽ lại quy trình vận hành theo triết lý Lean Six Sigma.",
                    "Tích hợp hệ sinh thái phần mềm thống nhất (All-in-one).",
                    "Xây dựng và ứng dụng các trợ lý ảo AI chuyên biệt do IDEAS thiết lập."
                ]
            },
            hr: {
                title: isEnglish ? "HR & Performance" : "Nhân sự & Hiệu suất",
                slogan: isEnglish ? "Eradicate talent drain & design sustainable incentives" : "Chống chảy máu chất xám & Xây dựng văn hóa giữ chân tài năng",
                bottlenecks: isEnglish ? [
                    "Talent drain at middle management level to competitors.",
                    "Low staff motivation due to non-transparent reward rules.",
                    "Lack of standardized internal upskilling structures."
                ] : [
                    "Chảy máu chất xám ở cấp quản lý trung và cao cấp.",
                    "Hiệu suất lao động thấp do cơ chế đãi ngộ thiếu công bằng và không minh bạch.",
                    "Thiếu chương trình đào tạo nội bộ nâng cao năng lực định kỳ."
                ],
                solutions: isEnglish ? [
                    "Design clean ESOP rewards and transparent career roadmaps.",
                    "Implement a 3P compensation model and 360 performance reviews.",
                    "Provide corporate executive management courses licensed from Swiss UMEF."
                ] : [
                    "Thiết kế cơ chế ESOP (Cổ phần thưởng) và lộ trình phát triển rõ ràng.",
                    "Ứng dụng mô hình đánh giá 360 độ và lương 3P thực chất.",
                    "Chuyển giao giáo trình quản lý chuyên sâu chuẩn Thụy Sĩ từ Viện IDEAS."
                ]
            },
            finance: {
                title: isEnglish ? "Finance & Cash Flow" : "Tài chính & Dòng tiền",
                slogan: isEnglish ? "Strict cash controls & optimal fund structuring" : "Kiểm soát dòng tiền & Tối ưu hóa cấu trúc gọi vốn",
                bottlenecks: isEnglish ? [
                    "Short-term liquidity crisis due to loose credit policies.",
                    "Faulty business valuation methods during investment rounds.",
                    "Lack of financial dashboards showing real-time profit and loss metrics."
                ] : [
                    "Đứt gãy dòng tiền ngắn hạn do quản lý công nợ chưa chặt chẽ.",
                    "Định giá sai giá trị doanh nghiệp khi gọi vốn hoặc sáp nhập.",
                    "Thiếu công cụ quản lý tài chính quản trị hỗ trợ ra quyết định nhanh."
                ],
                solutions: isEnglish ? [
                    "Forecast short-term cash runway and optimize credit cycles.",
                    "Prepare correct valuation books and structure M&A deals.",
                    "Set up automated financial dashboards displaying real-time cash flow."
                ] : [
                    "Kiến tạo dòng tiền dự báo và tối ưu hóa chu kỳ tiền mặt.",
                    "Định giá chuẩn xác và tư vấn cấu trúc thương vụ (M&A) hợp lý.",
                    "Cài đặt hệ thống Dashboard báo cáo tài chính trực quan, cập nhật Real-time."
                ]
            }
        };

        document.addEventListener('DOMContentLoaded', () => {
            initDoctorGrid();
            initFormSelects();
            loadForumData();
            initGoogleLogin();
        });

        // Interactive function to switch active pain point node
        function selectBottleneck(key, element) {
            document.querySelectorAll('.bottleneck-flow-node').forEach(node => {
                node.classList.remove('active');
            });
            element.classList.add('active');

            const data = BOTTLENECK_DATA[key];
            const prescTitle = document.getElementById('presc-title');
            const prescSlogan = document.getElementById('presc-slogan');
            const prescBottlenecks = document.getElementById('presc-bottlenecks');
            const prescSolutions = document.getElementById('presc-solutions');

            const container = document.getElementById('prescription-content-wrapper');
            container.style.opacity = '0';
            container.style.transform = 'translateY(8px)';

            setTimeout(() => {
                prescTitle.innerText = data.title;
                prescSlogan.innerText = data.slogan;

                prescBottlenecks.innerHTML = data.bottlenecks.map(b => `
                    <div class="presc-point-item">
                        <div class="presc-bullet-check">✕</div>
                        <p class="presc-text">${b}</p>
                    </div>
                `).join('');

                prescSolutions.innerHTML = data.solutions.map(s => `
                    <div class="presc-point-item">
                        <div class="presc-bullet-check success">✓</div>
                        <p class="presc-text">${s}</p>
                    </div>
                `).join('');

                container.style.opacity = '1';
                container.style.transform = 'translateY(0)';
            }, 200);
        }

        // Populate Lecturers Grid with NEW Premium Card Design
        function initDoctorGrid() {
            const container = document.getElementById('mentors-grid-container');
            container.innerHTML = CLINIC_DOCTORS.map((doc, idx) => `
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
                            <button type="button" class="btn-card-booking" onclick="openBookingModal(${idx})">
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

            initSliderDots();
        }

        function initSliderDots() {
            const dotsContainer = document.getElementById('mentors-slider-dots');
            if (!dotsContainer) return;

            dotsContainer.innerHTML = CLINIC_DOCTORS.map((_, idx) => `
                <span class="slider-dot ${idx === 0 ? 'active' : ''}" onclick="scrollToCard(${idx})"></span>
            `).join('');

            const grid = document.getElementById('mentors-grid-container');
            grid.removeEventListener('scroll', updateActiveDot);
            grid.addEventListener('scroll', updateActiveDot);
        }

        function updateActiveDot() {
            const container = document.getElementById('mentors-grid-container');
            const dots = document.querySelectorAll('.slider-dot');
            if (!dots.length) return;

            const scrollLeft = container.scrollLeft;
            const firstCard = container.querySelector('.mentor-card-premium');
            if (!firstCard) return;
            const cardWidth = firstCard.offsetWidth + 20; // card width + gap
            const activeIndex = Math.round(scrollLeft / cardWidth);

            dots.forEach((dot, idx) => {
                if (idx === activeIndex) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        }

        function scrollToCard(idx) {
            const container = document.getElementById('mentors-grid-container');
            const firstCard = container.querySelector('.mentor-card-premium');
            if (!firstCard) return;
            const cardWidth = firstCard.offsetWidth + 20;
            container.scrollTo({
                left: idx * cardWidth,
                behavior: 'smooth'
            });
        }

        function initFormSelects() {
            const topicSelect = document.getElementById('topic-mentor');
            const mentorSelect = document.getElementById('booking-mentor-select');

            CLINIC_DOCTORS.forEach(doc => {
                const opt1 = new Option(`${doc.name} - ${doc.specialty}`, doc.name);
                const opt2 = new Option(`${doc.name} - ${doc.specialty}`, doc.name);
                topicSelect.add(opt1);
                mentorSelect.add(opt2);
            });
        }

        // Open Booking Modal (Either specific doctor or general consultation)
        function openBookingModal(doctorIndex = null) {
            const selectGroup = document.getElementById('booking-select-group');
            const selectElement = document.getElementById('booking-mentor-select');
            const hiddenMentorInput = document.getElementById('booking-mentor-hidden');

            const doctorImg = document.getElementById('booking-doctor-img');
            const doctorDegree = document.getElementById('booking-doctor-degree');
            const doctorName = document.getElementById('booking-doctor-name');
            const doctorSpecialty = document.getElementById('booking-doctor-specialty');
            const doctorJob = document.getElementById('booking-doctor-job');

            if (doctorIndex !== null) {
                // Booking a specific doctor
                const doc = CLINIC_DOCTORS[doctorIndex];
                doctorImg.src = doc.avatar;
                doctorImg.alt = doc.name;
                doctorImg.style.display = 'block';
                doctorDegree.innerText = doc.title;
                doctorName.innerText = doc.name;
                doctorSpecialty.innerText = doc.specialty;
                doctorJob.innerText = doc.job;

                hiddenMentorInput.value = doc.name;
                selectGroup.style.display = 'none';
                selectElement.removeAttribute('required');
            } else {
                // General booking
                doctorImg.src = "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp";
                doctorImg.alt = "IDEAS Clinic";
                doctorImg.style.display = 'block';
                doctorDegree.innerText = "IDEAS";
                doctorName.innerText = isEnglish ? "Corporate Doctor Board" : "Hội đồng Bác sĩ Doanh nghiệp";
                doctorSpecialty.innerText = isEnglish ? "Expert Consultation & Diagnostics" : "Chẩn đoán & Tư vấn Quản trị Thực chiến";
                doctorJob.innerText = isEnglish 
                    ? "Schedule a private consultation. We will match your business with the most suitable doctor."
                    : "Đăng ký đặt lịch tư vấn chung. Ban học vụ và hội đồng sẽ tiếp nhận hồ sơ bệnh án và cử bác sĩ chuyên khoa phù hợp nhất để tháo gỡ điểm nghẽn cùng bạn.";

                hiddenMentorInput.value = "";
                selectGroup.style.display = 'block';
                selectElement.setAttribute('required', 'required');
            }

            document.getElementById('booking-modal-overlay').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeBookingModal() {
            document.getElementById('booking-modal-overlay').style.display = 'none';
            document.body.style.overflow = '';
        }

        // Helper to find avatar for specific mentor or return fallback
        function getCommenterAvatar(name, isMentor) {
            if (isMentor) {
                const doc = CLINIC_DOCTORS.find(d => name.includes(d.name) || d.name.includes(name));
                if (doc) return doc.avatar;
            }
            return "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.webp";
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
                        
                        document.getElementById('stat-total-cases').innerText = res.data.stats.total_cases.toLocaleString() + ' ca';
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
                'Cổ đông & Nhân sự': 'NhânSựRờiBỏ',
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
                const commentsListHtml = t.comments.map(c => {
                    const avatarUrl = getCommenterAvatar(c.author, c.is_mentor);
                    return `
                        <div class="comment-item" style="display: flex; gap: 12px; align-items: flex-start; margin-bottom: 12px;">
                            <img src="${avatarUrl}" alt="${c.author}" style="width: 36px; height: 36px; border-radius: 50%; object-fit: cover; border: 1.5px solid #cbd5e1; flex-shrink: 0;" />
                            <div style="flex: 1; min-width: 0;">
                                <div class="comment-author-row" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 4px;">
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <span class="comment-author-name" style="font-weight: 700; color: var(--clr-navy); font-size: 0.85rem;">${c.author}</span>
                                        ${c.is_mentor ? `<span class="comment-author-badge" style="background: rgba(171, 14, 0, 0.08); color: var(--clr-primary); font-size: 0.68rem; font-weight: 700; padding: 2px 6px; border-radius: 4px; text-transform: uppercase;">Chuyên gia</span>` : ''}
                                    </div>
                                    <span class="comment-date" style="font-size: 0.72rem; color: #94a3b8;">${c.date}</span>
                                </div>
                                <div style="margin: 0; font-size: 0.85rem; color: #334155; line-height: 1.5;">${c.content}</div>
                            </div>
                        </div>
                    `;
                }).join('');

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

            let mentor = document.getElementById('booking-mentor-hidden').value;
            const selectElement = document.getElementById('booking-mentor-select');
            
            if (!mentor) {
                mentor = selectElement.value;
            }

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
                        closeBookingModal();
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
