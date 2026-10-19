<?php
/**
 * Template Name: AI for Managers Page
 * Description: Landing page for AI for Managers: Làm Chủ & Thực Thi AI Trên Nền Tảng IDEAS AI Platform (Styled identically to Business Leadership Essentials)
 */
$is_en = (isset($_GET['lang']) && $_GET['lang'] === 'en');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php get_template_part('shared-head'); ?>

    <!-- Plus Jakarta Sans Font for Modern UI -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=Playfair+Display:ital,wght@1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Scoped Styles for AI for Managers Landing Page (Exact Business Leadership Essentials Design System) -->
    <style>
        /* ── Global Reset & Typography ───────────────── */
        body,
        .ideas_main {
            background-color: #ffffff;
            color: #0f172a;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
        }

        /* ── Top Full-Width Standalone Banner ────────── */
        .ble-top-banner {
            width: 100%;
            padding-top: 80px;
            background: #0f172a;
            line-height: 0;
            overflow: hidden;
        }

        .ble-top-banner-img {
            width: 100%;
            height: auto;
            max-height: 480px;
            object-fit: cover;
            object-position: center;
            display: block;
        }

        /* ── Section Layout & Ambient Glows ──────────── */
        .ble-section {
            padding: 75px 20px;
            position: relative;
            overflow: hidden;
        }

        .ble-section.bg-soft-cream {
            background-color: #FDFBF7;
            border-top: 1px solid rgba(171, 14, 0, 0.05);
            border-bottom: 1px solid rgba(171, 14, 0, 0.05);
        }

        .ble-section.bg-white {
            background-color: #ffffff;
        }

        .ble-container {
            max-width: 1240px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        /* Ambient Glow Orbs */
        .ble-glow-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(110px);
            pointer-events: none;
            z-index: 1;
        }

        .ble-glow-orb-primary {
            width: 550px;
            height: 550px;
            background: radial-gradient(circle, rgba(171, 14, 0, 0.06) 0%, rgba(171, 14, 0, 0) 70%);
        }

        .ble-glow-orb-gold {
            width: 450px;
            height: 450px;
            background: radial-gradient(circle, rgba(255, 200, 55, 0.08) 0%, rgba(255, 200, 55, 0) 70%);
        }

        /* ── Section Titles & Badges ─────────────────── */
        .ble-title-wrap {
            text-align: center;
            max-width: 780px;
            margin: 0 auto 48px auto;
            position: relative;
            z-index: 2;
        }

        .ble-section-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            border-radius: 100px;
            background: #fff5f5;
            border: 1px solid rgba(171, 14, 0, 0.12);
            color: #ab0e00;
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 16px;
        }

        .ble-section-tag .dot {
            width: 6px;
            height: 6px;
            background-color: #ab0e00;
            border-radius: 50%;
            box-shadow: 0 0 8px #ab0e00;
        }

        .ble-section-title {
            font-size: clamp(1.85rem, 3.5vw, 2.5rem);
            font-weight: 800;
            line-height: 1.25;
            color: #0f172a;
            margin: 0 0 16px 0;
            letter-spacing: -0.02em;
        }

        .ble-section-subtitle {
            font-size: 1rem;
            line-height: 1.6;
            color: #475569;
            margin: 0;
            font-weight: 400;
        }

        .ble-gradient-text {
            background: linear-gradient(95deg, #ab0e00 0%, #e53935 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .ble-text-red {
            color: #ab0e00;
        }

        /* ── Primary & Outline Buttons ───────────────── */
        .ble-btn {
            background: linear-gradient(135deg, #ab0e00 0%, #c62828 100%);
            color: #ffffff !important;
            font-weight: 700;
            font-size: 0.95rem;
            padding: 15px 32px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none !important;
            box-shadow: 0 8px 25px rgba(171, 14, 0, 0.2);
            position: relative;
            overflow: hidden;
            z-index: 2;
        }

        .ble-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(171, 14, 0, 0.3);
            background: linear-gradient(135deg, #8f0b00 0%, #ab0e00 100%);
        }

        .ble-btn-outline {
            background: #ffffff;
            color: #0f172a !important;
            border: 1.5px solid #cbd5e1;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
        }

        .ble-btn-outline:hover {
            background: #fff5f5;
            border-color: #ab0e00;
            color: #ab0e00 !important;
            box-shadow: 0 8px 20px rgba(171, 14, 0, 0.08);
        }

        /* ── 1. HERO SECTION ─────────────────────────── */
        .ble-hero {
            padding-top: 120px;
            padding-bottom: 85px;
            background: radial-gradient(circle at 85% 20%, rgba(171, 14, 0, 0.04) 0%, transparent 55%),
                        radial-gradient(circle at 10% 80%, rgba(255, 200, 55, 0.05) 0%, transparent 50%),
                        #ffffff;
            border-bottom: 1px solid #f1f5f9;
        }

        .ble-hero-grid {
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 60px;
            align-items: center;
        }

        .ble-hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            background: #fff5f5;
            border: 1px solid rgba(171, 14, 0, 0.15);
            border-radius: 100px;
            color: #ab0e00;
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 18px;
        }

        .ble-hero-tag span {
            width: 7px;
            height: 7px;
            background: #ab0e00;
            border-radius: 50%;
            box-shadow: 0 0 8px #ab0e00;
        }

        .ble-hero-title {
            font-size: clamp(2.1rem, 4vw, 3.1rem);
            font-weight: 900;
            line-height: 1.18;
            color: #0f172a;
            margin: 0 0 16px 0;
            letter-spacing: -0.025em;
        }

        .ble-hero-tagline {
            font-size: 1.12rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 14px;
            line-height: 1.45;
        }

        .ble-hero-desc {
            font-size: 0.96rem;
            line-height: 1.65;
            color: #475569;
            margin: 0 0 28px 0;
        }

        /* Sleek 2x2 Meta Grid in Hero */
        .ble-hero-meta-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-bottom: 32px;
            background: #f8fafc;
            padding: 20px;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
        }

        .ble-hero-meta-item {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .ble-meta-icon-wrapper {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: linear-gradient(135deg, #ab0e00 0%, #d32f2f 100%);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 6px 15px rgba(171, 14, 0, 0.2);
        }

        .ble-meta-icon-wrapper svg {
            width: 20px;
            height: 20px;
        }

        .ble-hero-meta-item span {
            display: flex;
            flex-direction: column;
            font-size: 0.75rem;
            color: #64748b;
            font-weight: 600;
            line-height: 1.35;
        }

        .ble-hero-meta-item strong {
            font-size: 0.88rem;
            color: #0f172a;
            font-weight: 800;
            margin-top: 2px;
        }

        .ble-hero-actions {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        /* Hero Right Visual Portal Dashboard Mockup */
        .ble-hero-visual {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .ble-dashboard-preview {
            background: #ffffff;
            border-radius: 28px;
            border: 1.5px solid rgba(15, 23, 42, 0.08);
            box-shadow: 0 25px 60px rgba(15, 23, 42, 0.08);
            padding: 32px;
            width: 100%;
            max-width: 460px;
            position: relative;
            z-index: 2;
        }

        .db-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 24px;
            padding-bottom: 18px;
            border-bottom: 1px solid #f1f5f9;
        }

        .db-avatar {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: linear-gradient(135deg, #ab0e00, #ff5252);
            color: #ffffff;
            font-weight: 800;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 16px rgba(171, 14, 0, 0.25);
        }

        .db-user-info h5 {
            margin: 0 0 4px 0;
            font-size: 1rem;
            font-weight: 800;
            color: #0f172a;
        }

        .db-user-info span {
            font-size: 0.75rem;
            color: #ab0e00;
            font-weight: 700;
            background: #fff5f5;
            padding: 3px 10px;
            border-radius: 100px;
        }

        .db-progress-card {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            border-radius: 18px;
            padding: 20px;
            color: #ffffff;
            margin-bottom: 20px;
        }

        .db-progress-card h6 {
            margin: 0 0 12px 0;
            font-size: 0.82rem;
            font-weight: 700;
            color: #e2e8f0;
        }

        .db-bar-container {
            width: 100%;
            height: 8px;
            background: rgba(255, 255, 255, 0.12);
            border-radius: 100px;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .db-bar-fill {
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, #ff5252, #ffc837);
            border-radius: 100px;
        }

        .db-progress-meta {
            display: flex;
            justify-content: space-between;
            font-size: 0.74rem;
            color: #cbd5e1;
            font-weight: 600;
        }

        .db-module-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .db-module-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 12px;
            background: #f8fafc;
            border: 1px solid #f1f5f9;
            transition: all 0.2s ease;
        }

        .db-module-item.active {
            background: #fff5f5;
            border-color: rgba(171, 14, 0, 0.2);
        }

        .db-module-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: #10b981;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .db-module-icon.pending {
            background: #ab0e00;
        }

        .db-module-title {
            font-size: 0.8rem;
            font-weight: 700;
            color: #1e293b;
            flex-grow: 1;
        }

        .db-active-pulse {
            font-size: 0.65rem;
            font-weight: 800;
            color: #ab0e00;
            background: rgba(171, 14, 0, 0.1);
            padding: 3px 8px;
            border-radius: 100px;
            white-space: nowrap;
        }

        .db-floating-badge {
            position: absolute;
            background: #ffffff;
            border-radius: 16px;
            padding: 12px 18px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.1);
            border: 1px solid rgba(15, 23, 42, 0.06);
            z-index: 3;
            animation: float-gentle 3s ease-in-out infinite alternate;
        }

        .db-floating-badge.badge-1 {
            bottom: 20px;
            left: -30px;
            animation-delay: 0s;
        }

        .db-floating-badge.badge-2 {
            top: 40px;
            right: -30px;
            animation-delay: 1.5s;
        }

        @keyframes float-gentle {
            0% { transform: translateY(0); }
            100% { transform: translateY(-12px); }
        }

        .db-float-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ab0e00;
        }

        .db-float-text h6 {
            margin: 0 0 2px 0;
            font-size: 0.8rem;
            font-weight: 800;
            color: #0f172a;
        }

        .db-float-text span {
            font-size: 0.65rem;
            color: #64748b;
            font-weight: 600;
        }

        /* ── 2. PAIN POINTS SECTION (Split Layout) ── */
        .pain-split-layout {
            display: grid;
            grid-template-columns: 1fr 1.15fr;
            gap: 60px;
            align-items: center;
        }

        .pain-left-col {
            padding-right: 20px;
        }

        .pain-right-col {
            display: flex;
            flex-direction: column;
            gap: 20px;
            position: relative;
        }

        .pain-right-col::before {
            content: '';
            position: absolute;
            top: 40px;
            bottom: 40px;
            left: 52px;
            width: 2px;
            background: linear-gradient(to bottom, rgba(171, 14, 0, 0.2), rgba(171, 14, 0, 0.02));
            z-index: 1;
        }

        .pain-list-item {
            display: flex;
            gap: 24px;
            background: #ffffff;
            padding: 24px 30px;
            border-radius: 20px;
            border: 1.5px solid rgba(15, 23, 42, 0.04);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.01);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            align-items: flex-start;
            position: relative;
            z-index: 2;
        }

        .pain-list-item:hover {
            border-color: rgba(171, 14, 0, 0.12);
            transform: translateX(6px);
            box-shadow: 0 15px 35px rgba(171, 14, 0, 0.05);
        }

        .pain-number {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #fff5f5;
            border: 1.5px solid rgba(171, 14, 0, 0.1);
            color: #ab0e00;
            font-weight: 800;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .pain-list-item:hover .pain-number {
            background: #ab0e00;
            color: #ffffff;
            border-color: #ab0e00;
            box-shadow: 0 0 0 5px rgba(171, 14, 0, 0.15);
        }

        .pain-info h4 {
            font-size: 1.1rem;
            font-weight: 850;
            color: #0f172a;
            margin: 0 0 6px 0;
            line-height: 1.35;
        }

        .pain-info p {
            font-size: 0.9rem;
            line-height: 1.55;
            color: #475569 !important;
            margin: 0;
        }

        .pain-stat-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            border-radius: 24px;
            border: 1.5px solid rgba(171, 14, 0, 0.08);
            padding: 28px;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 15px 35px rgba(171, 14, 0, 0.03);
            margin-top: 28px;
            position: relative;
            overflow: hidden;
            text-align: left;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .pain-stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 45px rgba(171, 14, 0, 0.06);
            border-color: rgba(171, 14, 0, 0.15);
        }

        .pain-stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 6px;
            height: 100%;
            background: #ab0e00;
        }

        .pain-stat-number-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: rgba(171, 14, 0, 0.05);
            border-radius: 16px;
            width: 80px;
            height: 80px;
            flex-shrink: 0;
        }

        .pain-stat-number {
            font-size: 2rem;
            font-weight: 900;
            color: #ab0e00;
            line-height: 1;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .pain-stat-label {
            font-size: 0.6rem;
            font-weight: 800;
            color: #ab0e00;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-top: 4px;
        }

        .pain-stat-info h5 {
            font-size: 1rem;
            font-weight: 850;
            color: #0f172a;
            margin: 0 0 4px 0;
            line-height: 1.35;
        }

        .pain-stat-info p {
            font-size: 0.85rem;
            line-height: 1.45;
            color: #64748b !important;
            margin: 0;
        }

        /* ── 3. CORE COMPETENCIES GRID (Exact BLE .comp-grid) ── */
        .comp-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .comp-card {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid rgba(15, 23, 42, 0.08);
            padding: 32px 28px;
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            flex-direction: column;
            position: relative;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.02);
            z-index: 2;
            height: 100%;
            box-sizing: border-box;
        }

        .comp-card:hover {
            transform: translateY(-8px);
            border-color: rgba(171, 14, 0, 0.3);
            box-shadow: 0 20px 40px rgba(171, 14, 0, 0.08);
        }

        .comp-card-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 18px;
        }

        .comp-icon-box {
            color: #ab0e00;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(171, 14, 0, 0.06);
            width: 52px;
            height: 52px;
            border-radius: 14px;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            flex-shrink: 0;
        }

        .comp-card:hover .comp-icon-box {
            background: #ab0e00 !important;
            color: #ffffff !important;
            transform: scale(1.08) rotate(5deg);
        }

        .comp-card:hover .comp-icon-box svg {
            stroke: #ffffff !important;
        }

        .comp-card-caps-title {
            font-size: 1.02rem;
            font-weight: 800;
            color: #0f172a;
            text-transform: uppercase;
            letter-spacing: 0.02em;
            margin: 0;
            line-height: 1.35;
        }

        .comp-desc {
            font-size: 0.88rem;
            line-height: 1.65;
            color: #1e293b !important;
            margin: 0;
        }

        .comp-badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.72rem;
            font-weight: 800;
            color: #ab0e00;
            background: #fff5f5;
            border: 1px solid rgba(171, 14, 0, 0.14);
            padding: 4px 10px;
            border-radius: 100px;
            margin-top: auto;
            padding-top: 4px;
            align-self: flex-start;
        }

        /* ── 4. CURRICULUM SECTION (Exact BLE Dark Theme & Cask Layout) ── */
        #curriculum {
            background: #040508 !important;
            position: relative;
        }

        #curriculum::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse at 20% 30%, rgba(217, 38, 38, 0.14) 0%, transparent 60%),
                radial-gradient(ellipse at 80% 70%, rgba(217, 38, 38, 0.08) 0%, transparent 50%);
            pointer-events: none;
            z-index: 1;
        }

        #curriculum .ble-container {
            position: relative;
            z-index: 2;
        }

        #curriculum .ble-section-tag {
            color: #ff9e9e !important;
            background: rgba(217, 38, 38, 0.1) !important;
            border: 1px solid rgba(217, 38, 38, 0.25) !important;
        }

        #curriculum .ble-section-tag .dot {
            background-color: #ff9e9e !important;
        }

        #curriculum .ble-section-title {
            color: #ffffff !important;
        }

        #curriculum .ble-section-title .ble-text-red {
            color: #ff4d4d !important;
        }

        #curriculum .ble-section-subtitle {
            color: #cbd5e1 !important;
        }

        .curr-layout {
            display: flex;
            gap: 40px;
            margin-top: 40px;
        }

        .curr-sidebar {
            width: 34%;
            display: flex;
            flex-direction: column;
            gap: 16px;
            position: sticky;
            top: 120px;
            align-self: flex-start;
            z-index: 10;
        }

        .curr-tab {
            background: #ffffff;
            border: 1.5px solid #cbd5e1;
            border-radius: 16px;
            padding: 22px 24px;
            cursor: pointer;
            text-align: left;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .curr-tab-tag {
            font-size: 0.72rem;
            font-weight: 900;
            color: #ab0e00;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 6px;
            position: relative;
            z-index: 2;
        }

        .curr-tab-title {
            font-size: 1.02rem;
            font-weight: 800;
            color: #475569;
            line-height: 1.35;
            position: relative;
            z-index: 2;
        }

        .curr-tab:hover {
            border-color: #ab0e00;
            transform: translateY(-2px);
        }

        .curr-tab.active {
            background: #ab0e00;
            box-shadow: 0 10px 30px rgba(171, 14, 0, 0.25);
            border-color: #ab0e00;
        }

        .curr-tab.active .curr-tab-tag {
            color: rgba(255, 255, 255, 0.9) !important;
        }

        .curr-tab.active .curr-tab-title {
            color: #ffffff !important;
        }

        .curr-sidebar-visual {
            margin-top: 10px;
            border-radius: 18px !important;
            overflow: hidden;
            border: 4px solid #ffffff;
            box-shadow: 0 15px 30px rgba(15, 23, 42, 0.15);
            width: 100%;
            box-sizing: border-box;
        }

        .curr-sidebar-visual img {
            width: 100%;
            display: block;
            object-fit: cover;
            aspect-ratio: 1.35;
            border-radius: 14px !important;
        }

        .curr-details {
            width: 66%;
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #cbd5e1;
            padding: 42px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
            display: flex;
            flex-direction: column;
            position: relative;
            z-index: 2;
            box-sizing: border-box;
        }

        .curr-panel-header {
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 24px;
            margin-bottom: 24px;
        }

        .curr-panel-title {
            font-size: 1.4rem;
            font-weight: 850;
            color: #0f172a;
            margin: 0 0 10px 0;
            line-height: 1.3;
        }

        .curr-panel-desc {
            font-size: 0.92rem;
            line-height: 1.6;
            color: #475569;
            margin: 0;
        }

        .curr-accordion-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .curr-acc-item {
            background: #f8fafc;
            border: 1.5px solid rgba(15, 23, 42, 0.04);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .curr-acc-item.active {
            border-color: rgba(171, 14, 0, 0.2);
            background: #ffffff;
            box-shadow: 0 10px 25px rgba(171, 14, 0, 0.03);
        }

        .curr-acc-header {
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            user-select: none;
            gap: 16px;
        }

        .curr-acc-header-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .curr-acc-num {
            font-size: 1.35rem;
            font-weight: 900;
            font-style: italic;
            color: #ab0e00;
            font-family: 'Plus Jakarta Sans', sans-serif;
            flex-shrink: 0;
        }

        .curr-acc-title {
            font-size: 0.96rem;
            font-weight: 850;
            color: #0f172a;
            line-height: 1.4;
        }

        .curr-acc-badge {
            font-size: 0.72rem;
            font-weight: 800;
            color: #ab0e00;
            background: rgba(171, 14, 0, 0.08);
            padding: 5px 12px;
            border-radius: 8px;
            text-transform: uppercase;
            letter-spacing: 0.02em;
            white-space: nowrap;
        }

        .curr-acc-content-inner {
            padding: 20px 24px 24px 60px;
            border-top: 1px solid #f1f5f9;
            background-color: #ffffff;
        }

        .curr-topics-list {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .curr-topics-list li {
            font-size: 0.9rem;
            color: #334155;
            line-height: 1.6;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .curr-topics-list li::before {
            content: '•';
            color: #ab0e00;
            font-weight: 900;
            font-size: 1.1rem;
            line-height: 1.2;
        }

        .curr-outcomes {
            margin-top: 28px;
            background: linear-gradient(135deg, #ffffff 0%, #fff8f8 100%);
            border-radius: 16px;
            padding: 26px 28px;
            border: 1.5px solid rgba(171, 14, 0, 0.15);
            box-shadow: 0 10px 30px rgba(171, 14, 0, 0.03);
            position: relative;
            overflow: hidden;
        }

        .curr-outcomes::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 4px;
            background: #ab0e00;
        }

        .curr-outcomes-title {
            font-size: 0.92rem;
            font-weight: 900;
            color: #ab0e00;
            margin: 0 0 14px 0;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            display: flex;
            align-items: center;
            gap: 8px;
            padding-left: 8px;
        }

        .curr-outcomes-list {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .curr-outcomes-list li {
            font-size: 0.9rem;
            color: #334155;
            line-height: 1.55;
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .curr-outcomes-list li svg {
            color: #10b981;
            flex-shrink: 0;
            margin-top: 3px;
        }

        /* ── 5. IDEAS AI PLATFORM SECTION ────────────── */
        .ai-grid {
            display: grid;
            grid-template-columns: 4.5fr 5.5fr;
            gap: 70px;
            align-items: center;
        }

        .ai-features-list {
            margin: 0 0 32px 0;
            padding: 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .ai-features-list li {
            display: flex;
            gap: 14px;
            align-items: flex-start;
        }

        .ai-feat-icon {
            width: 26px;
            height: 26px;
            background: rgba(171, 14, 0, 0.08);
            color: #ab0e00;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .ai-feat-text {
            font-size: 0.92rem;
            line-height: 1.55;
            color: #475569;
        }

        .ai-feat-text strong {
            color: #0f172a;
        }

        .ai-screens-container {
            position: relative;
            width: 100%;
            max-width: 720px;
            height: 480px;
            margin: 0 auto;
        }

        .ai-screen-wrapper {
            position: absolute;
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .wrap-login {
            width: 48%;
            left: -5%;
            bottom: 6%;
            z-index: 2;
            animation: float-screen-1 8s ease-in-out infinite;
        }

        .wrap-main {
            width: 82%;
            left: 9%;
            top: 6%;
            z-index: 1;
            animation: float-screen-2 10s ease-in-out infinite;
        }

        .wrap-sub {
            width: 48%;
            right: -5%;
            bottom: 2%;
            z-index: 3;
            animation: float-screen-3 7s ease-in-out infinite;
        }

        .ai-screen-card {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            background: #ffffff;
            transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .ai-screen-card img {
            display: block;
            width: 100%;
            height: auto;
        }

        .card-login {
            transform: perspective(1200px) rotateX(6deg) rotateY(12deg) rotateZ(3deg);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.14);
        }

        .card-main {
            transform: perspective(1200px) rotateX(8deg) rotateY(-4deg) rotateZ(-1deg);
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.12);
        }

        .card-sub {
            transform: perspective(1200px) rotateX(10deg) rotateY(-15deg) rotateZ(-4deg);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        }

        @keyframes float-screen-1 {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }
        @keyframes float-screen-2 {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-18px); }
        }
        @keyframes float-screen-3 {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        /* ── 6. FACULTY / ADVISORS SLIDER SECTION ────── */
        .advisor-slider-container {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            z-index: 2;
        }

        .advisor-slider-track-wrapper {
            overflow: hidden;
            width: 100%;
            padding: 10px 0 30px 0;
        }

        .fac-grid-advisor {
            display: flex !important;
            flex-direction: row !important;
            gap: 30px !important;
            width: 100% !important;
            transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1) !important;
            will-change: transform;
            padding: 10px 4px !important;
        }

        .fac-grid-advisor .fac-card {
            flex: 0 0 calc((100% - 60px) / 3) !important;
            width: calc((100% - 60px) / 3) !important;
            max-width: calc((100% - 60px) / 3) !important;
            box-sizing: border-box !important;
        }

        .advisor-slider-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: #ffffff;
            border: 1px solid rgba(15, 23, 42, 0.08);
            width: 48px;
            height: 48px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.04);
            transition: all 0.3s ease;
            color: #0f172a;
            z-index: 10;
        }

        .advisor-slider-btn:hover {
            background: #ab0e00;
            color: #ffffff;
            border-color: #ab0e00;
            box-shadow: 0 8px 24px rgba(171, 14, 0, 0.25);
        }

        .advisor-slider-btn.prev { left: -24px; }
        .advisor-slider-btn.next { right: -24px; }

        .fac-dots-advisor {
            display: flex !important;
            justify-content: center !important;
            gap: 8px !important;
            margin-top: 20px !important;
        }

        .fac-dots-advisor .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(15, 23, 42, 0.15);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .fac-dots-advisor .dot.active {
            background: #ab0e00;
            width: 22px;
            border-radius: 4px;
        }

        .fac-card {
            background: #ffffff;
            border-radius: 24px;
            border: 1.5px solid rgba(15, 23, 42, 0.04);
            padding: 40px 32px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.01);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .fac-card:hover {
            transform: translateY(-8px);
            border-color: rgba(171, 14, 0, 0.15);
            box-shadow: 0 20px 45px rgba(171, 14, 0, 0.08);
        }

        .fac-avatar-wrap {
            position: relative;
            margin-bottom: 24px;
        }

        .fac-avatar-wrap::before {
            content: '';
            position: absolute;
            top: -6px;
            left: -6px;
            right: -6px;
            bottom: -6px;
            border: 2px solid rgba(171, 14, 0, 0.15);
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .fac-card:hover .fac-avatar-wrap::before {
            border-color: #ab0e00;
            transform: scale(1.05);
        }

        .fac-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #ffffff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
        }

        .fac-name {
            font-size: 1.15rem;
            font-weight: 850;
            color: #0f172a;
            margin: 0 0 6px 0;
        }

        .fac-role {
            font-size: 0.76rem;
            font-weight: 800;
            color: #ab0e00;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 16px;
            background: rgba(171, 14, 0, 0.05);
            padding: 4px 12px;
            border-radius: 100px;
        }

        .fac-bio {
            font-size: 0.88rem;
            line-height: 1.55;
            color: #475569;
            margin: 0;
            text-align: justify;
        }

        /* ── 7. CERTIFICATE & TARGET AUDIENCE ────────── */
        .cert-wrap {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #cbd5e1;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.015);
            padding: 50px;
            display: grid;
            grid-template-columns: 0.95fr 1.05fr;
            gap: 60px;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        .cert-wrap::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #ab0e00, #ff6b6b);
        }

        .cert-mockup {
            background: #faf8f5;
            border-radius: 20px;
            border: 10px solid #ffffff;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
            padding: 30px;
            aspect-ratio: 1.414;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            position: relative;
            background-image: radial-gradient(#cbd5e1 1px, transparent 1.5px);
            background-size: 16px 16px;
            transform: perspective(1000px) rotateY(-8deg) rotateX(4deg);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 2;
        }

        .cert-wrap:hover .cert-mockup {
            transform: perspective(1000px) rotateY(0deg) rotateX(0deg) scale(1.03);
            box-shadow: 0 25px 50px rgba(171, 14, 0, 0.1);
        }

        .cert-mockup-border {
            position: absolute;
            top: 8px;
            left: 8px;
            right: 8px;
            bottom: 8px;
            border: 2px solid #cbd5e1;
            border-radius: 12px;
            pointer-events: none;
        }

        .cert-logo {
            font-size: 0.95rem;
            font-weight: 850;
            color: #0f172a;
            letter-spacing: 0.05em;
        }

        .cert-main-text h5 {
            font-size: 0.65rem;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin: 0 0 10px 0;
        }

        .cert-main-text h4 {
            font-size: 1.08rem;
            font-weight: 900;
            color: #ab0e00;
            margin: 0 0 8px 0;
        }

        .cert-main-text p {
            font-size: 0.72rem;
            color: #475569;
            margin: 0 auto;
            max-width: 280px;
            line-height: 1.45;
        }

        .cert-signatures {
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
            box-sizing: border-box;
        }

        .cert-sig-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
        }

        .cert-sig-line {
            width: 80px;
            height: 1px;
            background: #94a3b8;
        }

        .cert-sig-lbl {
            font-size: 0.58rem;
            color: #94a3b8;
            font-weight: 600;
        }

        .ble-audience-split {
            display: grid;
            grid-template-columns: 1.1fr 1.3fr;
            gap: 50px;
            align-items: center;
            margin-top: 40px;
        }

        .ble-audience-list {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .ble-audience-list-item {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            padding: 20px 24px;
            display: flex;
            align-items: flex-start;
            gap: 18px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 10px rgba(15, 23, 42, 0.01);
        }

        .ble-audience-list-item:hover {
            transform: translateX(6px);
            border-color: #ab0e00;
            box-shadow: 0 10px 25px rgba(171, 14, 0, 0.05);
        }

        .ble-aud-icon-box {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #fff5f5;
            border: 1px solid rgba(171, 14, 0, 0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ab0e00;
            flex-shrink: 0;
            transition: all 0.3s;
        }

        .ble-audience-list-item:hover .ble-aud-icon-box {
            background: #ab0e00;
            color: #ffffff;
            border-color: #ab0e00;
            transform: scale(1.05);
        }

        .ble-aud-info h4 {
            font-size: 1.05rem;
            font-weight: 850;
            color: #0f172a;
            margin: 0 0 4px 0;
            line-height: 1.3;
        }

        .ble-aud-info p {
            font-size: 0.88rem;
            line-height: 1.5;
            color: #475569 !important;
            margin: 0;
        }

        /* ── 8. CTA & FAQ SECTION ────────────────────── */
        .ble-cta-fee-box {
            background: linear-gradient(135deg, #5c0600 0%, #ab0e00 60%, #400300 100%);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            padding: 26px 30px;
            margin: 28px 0;
            box-shadow: 0 20px 45px rgba(171, 14, 0, 0.18), inset 0 1px 1px rgba(255, 255, 255, 0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 25px;
            box-sizing: border-box;
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .ble-cta-fee-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
            flex-shrink: 0;
        }

        .ble-cta-fee-info .fee-label {
            font-size: 0.75rem;
            font-weight: 850;
            color: rgba(255, 255, 255, 0.8);
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .ble-cta-fee-info .fee-price {
            font-size: clamp(1.8rem, 3.5vw, 2.2rem);
            font-weight: 900;
            color: #ffffff;
            line-height: 1.1;
            white-space: nowrap;
        }

        .ble-cta-fee-info .fee-price span {
            font-size: 1.25rem;
            font-weight: 800;
            color: #ffc837;
            margin-left: 2px;
        }

        .ble-cta-fee-info .fee-note {
            font-size: 0.78rem;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.4;
        }

        .ble-cta-fee-divider {
            width: 1px;
            align-self: stretch;
            background: rgba(255, 255, 255, 0.18);
            flex-shrink: 0;
        }

        .ble-cta-fee-benefits {
            display: flex;
            flex-direction: column;
            gap: 10px;
            flex-grow: 1;
        }

        .ble-cta-fee-benefit-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 0.88rem;
            color: #ffffff;
            line-height: 1.4;
        }

        .ble-cta-fee-benefit-item .check-icon {
            color: #ffc837;
            font-weight: 900;
            font-size: 0.88rem;
            margin-top: 1px;
            flex-shrink: 0;
        }

        .faq-item {
            border: 1.5px solid rgba(15, 23, 42, 0.06) !important;
            background: #ffffff !important;
            border-radius: 16px;
            margin-bottom: 16px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-left: 4px solid transparent !important;
            color: #475569 !important;
        }

        .faq-item.active {
            border-color: rgba(171, 14, 0, 0.2) !important;
            border-left: 4px solid #ab0e00 !important;
            box-shadow: 0 12px 30px rgba(171, 14, 0, 0.06) !important;
        }

        .faq-trigger {
            padding: 20px 24px;
            font-size: 0.95rem;
            font-weight: 800;
            color: #0f172a !important;
            background: transparent;
            border: none;
            width: 100%;
            text-align: left;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            gap: 14px;
        }

        .faq-item.active .faq-trigger {
            color: #ab0e00 !important;
        }

        .faq-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s ease;
            color: #475569 !important;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .faq-content {
            padding: 0 24px 24px;
            border-top: 1px solid #f1f5f9 !important;
            padding-top: 16px;
        }

        .underline-highlight {
            position: relative;
            background: linear-gradient(180deg, transparent 62%, rgba(171, 14, 0, 0.16) 62%) !important;
            display: inline !important;
            text-decoration: none !important;
            padding-bottom: 2px;
        }
        .underline-highlight::after {
            display: none !important;
        }

        .cta-section .cta-inner {
            align-items: start !important;
        }
        .cta-form-wrapper {
            height: auto !important;
            min-height: auto !important;
            padding-bottom: 30px !important;
        }

        /* Zoom Lightbox Modal */
        .ble-lightbox {
            position: fixed;
            z-index: 99999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.96);
            backdrop-filter: blur(12px);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            padding: 20px;
            box-sizing: border-box;
        }
        .ble-lightbox.active {
            opacity: 1;
            pointer-events: auto;
        }
        .ble-lightbox-img {
            max-width: 95%;
            max-height: 85vh;
            border-radius: 12px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
        }
        .ble-lightbox-close {
            position: absolute;
            top: 20px;
            right: 25px;
            color: #ffffff;
            font-size: 38px;
            cursor: pointer;
            line-height: 1;
        }

        /* ── Responsive Rules (Exact BLE Breakpoints) ── */
        @media (max-width: 1100px) {
            .comp-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .fac-grid-advisor .fac-card {
                flex: 0 0 calc((100% - 20px) / 2) !important;
                width: calc((100% - 20px) / 2) !important;
                max-width: calc((100% - 20px) / 2) !important;
            }
        }

        @media (max-width: 991px) {
            .ble-section { padding: 65px 20px; }
            .ble-hero-grid,
            .pain-split-layout,
            .ai-grid,
            .cert-wrap,
            .ble-audience-split {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            .curr-layout {
                flex-direction: column;
                gap: 24px;
            }
            .curr-sidebar {
                width: 100% !important;
                flex-direction: row !important;
                overflow-x: auto !important;
                padding-bottom: 8px !important;
                position: relative !important;
                top: auto !important;
                display: flex !important;
                gap: 12px !important;
                scrollbar-width: none !important;
            }
            .curr-sidebar::-webkit-scrollbar { display: none !important; }
            .curr-sidebar-visual { display: none !important; }
            .curr-tab {
                min-width: 240px;
                flex-shrink: 0 !important;
            }
            .curr-details {
                width: 100%;
                padding: 28px 24px;
            }
            .advisor-slider-btn { display: none !important; }
        }

        @media (max-width: 768px) {
            .comp-grid {
                display: flex !important;
                flex-direction: row !important;
                overflow-x: auto !important;
                scroll-snap-type: x mandatory !important;
                gap: 16px !important;
                padding: 10px 4px 20px 4px !important;
                scrollbar-width: none !important;
            }
            .comp-grid::-webkit-scrollbar { display: none !important; }
            .comp-card {
                flex: 0 0 84% !important;
                width: 84% !important;
                max-width: 84% !important;
                scroll-snap-align: center !important;
            }
            .ble-hero-meta-row {
                grid-template-columns: 1fr;
            }
            .ai-screens-container { height: 320px; }
            .db-floating-badge { display: none !important; }
            .pain-right-col::before { display: none !important; }
            .curr-acc-content-inner { padding: 16px 18px 18px 20px; }
            .ble-cta-fee-box {
                flex-direction: column;
                align-items: stretch;
                padding: 22px 20px;
                gap: 18px;
            }
            .ble-cta-fee-divider {
                width: 100%;
                height: 1px;
            }
            .advisor-slider-track-wrapper {
                overflow-x: auto !important;
                scroll-snap-type: x mandatory !important;
                scrollbar-width: none !important;
            }
            .advisor-slider-track-wrapper::-webkit-scrollbar { display: none !important; }
            .fac-grid-advisor {
                transition: none !important;
                gap: 16px !important;
            }
            .fac-grid-advisor .fac-card {
                flex: 0 0 84% !important;
                width: 84% !important;
                max-width: 84% !important;
                scroll-snap-align: center !important;
            }
        }
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Site Header -->
    <?php get_template_part('shared-header'); ?>

    <!-- MAIN SECTION -->
    <main class="ideas_main" style="gap:0; background:none;">

        <!-- 1. HERO SECTION (Exact Business Leadership Essentials Layout) -->
        <section class="ble-section ble-hero">
            <div class="ble-container">
                <div class="ble-hero-grid">
                    <!-- Left: Title and Key Info -->
                    <div class="ble-hero-content">
                        <div class="ble-hero-tag">
                            <span></span> IDEAS AI Platform • Chương Trình Đào Tạo Thực Chiến
                        </div>
                        <h1 class="ble-hero-title">AI for Managers: <span class="ble-gradient-text">Làm Chủ &amp; Thực Thi AI</span></h1>
                        <div class="ble-hero-tagline">Trên nền tảng IDEAS AI Platform — Chuyển hóa AI từ "công cụ chat ngẫu hứng" thành "năng lực cạnh tranh cốt lõi" của doanh nghiệp.</div>
                        <p class="ble-hero-desc">Làm chủ bảo mật dữ liệu (Consistent Tokenization), kỹ thuật P.R.O.M.P.T &amp; Meta-Prompting, quản trị tri thức Enterprise RAG, lập kế hoạch AOP 2027 và đóng gói hệ thống AI Agents liên phòng ban.</p>

                        <!-- Sleek Inline Highlight Grid (2x2) -->
                        <div class="ble-hero-meta-row">
                            <div class="ble-hero-meta-item">
                                <div class="ble-meta-icon-wrapper">
                                    <svg class="ble-svg-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                </div>
                                <span>Thời lượng đào tạo<strong>04 Buổi (12 Giờ) • 3 Giờ/Buổi</strong></span>
                            </div>
                            <div class="ble-hero-meta-item">
                                <div class="ble-meta-icon-wrapper">
                                    <svg class="ble-svg-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                </div>
                                <span>Lịch học &amp; Tỷ lệ thực chiến<strong>30% Lý thuyết • 70% Thực hành</strong></span>
                            </div>
                            <div class="ble-hero-meta-item">
                                <div class="ble-meta-icon-wrapper">
                                    <svg class="ble-svg-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                                </div>
                                <span>Hệ sinh thái thực hành<strong>100% IDEAS AI Platform (6 Phân hệ)</strong></span>
                            </div>
                            <div class="ble-hero-meta-item">
                                <div class="ble-meta-icon-wrapper">
                                    <svg class="ble-svg-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c0 2 2 3 6 3s6-1 6-3v-5"/></svg>
                                </div>
                                <span>Nghiệm thu &amp; Đồng hành<strong>08 Sản phẩm • 30 Ngày Cố vấn</strong></span>
                            </div>
                        </div>

                        <!-- Action buttons -->
                        <div class="ble-hero-actions">
                            <button onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('ai-for-managers-hero'); } else { document.getElementById('dang-ky').scrollIntoView({behavior:'smooth'}); }" class="ble-btn">Đăng ký tư vấn ngay</button>
                            <a href="#curriculum" class="ble-btn ble-btn-outline">Xem khung chương trình</a>
                        </div>
                    </div>

                    <!-- Right: Visual Portal Dashboard Mockup -->
                    <div class="ble-hero-visual">
                        <!-- Floating Badges -->
                        <div class="db-floating-badge badge-1">
                            <span class="db-float-icon">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            </span>
                            <div class="db-float-text">
                                <h6>Enterprise Security</h6>
                                <span>Consistent Tokenization</span>
                            </div>
                        </div>

                        <div class="db-floating-badge badge-2">
                            <span class="db-float-icon">
                                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M9 9h6v6H9zM9 1v3M15 1v3M9 20v3M15 20v3M20 9h3M20 15h3M1 9h3M1 15h3"/></svg>
                            </span>
                            <div class="db-float-text">
                                <h6>IDEAS AI Platform</h6>
                                <span>7 C-Suite &amp; 101+ Agents</span>
                            </div>
                        </div>

                        <!-- Main Portal Box -->
                        <div class="ble-dashboard-preview">
                            <div class="db-header">
                                <div class="db-avatar">AI</div>
                                <div class="db-user-info">
                                    <h5>IDEAS AI Platform Workspace</h5>
                                    <span>Khóa: AI FOR MANAGERS • 04 BUỔI (12 GIỜ)</span>
                                </div>
                            </div>

                            <div class="db-progress-card">
                                <h6>Lộ trình 4 cấp độ trưởng thành AI (Beside → Agentic)</h6>
                                <div class="db-bar-container">
                                    <div class="db-bar-fill"></div>
                                </div>
                                <div class="db-progress-meta">
                                    <span>100% Thực chiến • Nghiệm thu 08 sản phẩm đầu ra</span>
                                </div>
                            </div>

                            <div class="db-module-list">
                                <div class="db-module-item">
                                    <div class="db-module-icon">
                                        <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                    </div>
                                    <span class="db-module-title">Buổi 01: Bảo mật Dữ liệu &amp; Meta-Prompting</span>
                                </div>
                                <div class="db-module-item">
                                    <div class="db-module-icon">
                                        <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                    </div>
                                    <span class="db-module-title">Buổi 02: Enterprise RAG &amp; Lập kế hoạch AOP 2027</span>
                                </div>
                                <div class="db-module-item">
                                    <div class="db-module-icon">
                                        <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                    </div>
                                    <span class="db-module-title">Buổi 03: Thiết kế AI Agents &amp; 108+ Trợ lý Chuyên biệt</span>
                                </div>
                                <div class="db-module-item active">
                                    <div class="db-module-icon pending">
                                        <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                                    </div>
                                    <span class="db-module-title">Buổi 04: Lộ trình 30-60-90, SOP 5 Bước &amp; Team Workspace</span>
                                    <span class="db-active-pulse">08 Sản phẩm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. PAIN POINTS & BỐI CẢNH SECTION (Warm Cream Background, Editorial Split Columns) -->
        <section class="ble-section bg-soft-cream" id="boi-canh">
            <div class="ble-glow-orb ble-glow-orb-primary" style="top: 10%; left: -10%;"></div>
            <div class="ble-glow-orb ble-glow-orb-gold" style="bottom: 10%; right: -15%;"></div>

            <div class="ble-container">
                <div class="pain-split-layout">
                    <!-- Left Column: Big Editorial Heading with Statistics Card -->
                    <div class="pain-left-col">
                        <span class="ble-section-tag">
                            <span class="dot"></span> Bối cảnh &amp; Thách thức thực tế
                        </span>
                        <h2 class="ble-section-title" style="text-align: left;">Ứng dụng AI tự phát tiềm ẩn<br><span class="ble-text-red">4 rủi ro lớn cho doanh nghiệp</span></h2>

                        <!-- Wow Stat Card -->
                        <div class="pain-stat-card" style="margin-bottom: 24px;">
                            <div class="pain-stat-number-box">
                                <span class="pain-stat-number">70%</span>
                                <span class="pain-stat-label">Thực hành</span>
                            </div>
                            <div class="pain-stat-info">
                                <h5>Chuyển hóa từ "Chat ngẫu hứng" sang "Năng lực cốt lõi"</h5>
                                <p>Phần lớn nhân sự đang dùng các công cụ AI công cộng rời rạc, thiếu kiểm soát bảo mật và không tạo ra quy trình chuẩn hóa cho tổ chức.</p>
                            </div>
                        </div>

                        <!-- Showcase Challenge Image -->
                        <div class="pain-visual-img-wrap" style="border-radius: 18px !important; overflow: hidden; border: 4px solid #ffffff; box-shadow: 0 15px 30px rgba(15, 23, 42, 0.06);">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/buoihuongdan-optimized.webp" alt="Thách thức ứng dụng AI trong doanh nghiệp" style="width: 100%; display: block; object-fit: cover; aspect-ratio: 1.58; border-radius: 14px !important;">
                        </div>
                    </div>

                    <!-- Right Column: Numbered List Items -->
                    <div class="pain-right-col">
                        <!-- Item 1 -->
                        <div class="pain-list-item">
                            <div class="pain-number">01</div>
                            <div class="pain-info">
                                <h4>Rò rỉ dữ liệu &amp; bí mật kinh doanh</h4>
                                <p>Nhân sự đưa trực tiếp báo cáo tài chính, danh sách khách hàng, hợp đồng mật lên AI công cộng mà không qua quy trình ẩn danh hóa (Anonymization / Consistent Tokenization).</p>
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div class="pain-list-item">
                            <div class="pain-number">02</div>
                            <div class="pain-info">
                                <h4>Ảo giác AI (Hallucination) &amp; sai lệch số liệu</h4>
                                <p>Sử dụng câu lệnh cảm tính dẫn đến kết quả chung chung, AI tự bịa đặt số liệu hoặc trích dẫn sai nguồn nhưng không có cơ chế kiểm chứng (Source Grounding) và đối chiếu chéo.</p>
                            </div>
                        </div>

                        <!-- Item 3 -->
                        <div class="pain-list-item">
                            <div class="pain-number">03</div>
                            <div class="pain-info">
                                <h4>Phân mảnh dữ liệu (Data Silos &amp; GIGO)</h4>
                                <p>Tài liệu nội bộ nằm rải rác, không được làm sạch ("Garbage In, Garbage Out") khiến AI không hiểu ngữ cảnh đặc thù của doanh nghiệp để tham mưu chính xác.</p>
                            </div>
                        </div>

                        <!-- Item 4 -->
                        <div class="pain-list-item">
                            <div class="pain-number">04</div>
                            <div class="pain-info">
                                <h4>Thiếu quy trình chuẩn (SOP) &amp; tính kế thừa</h4>
                                <p>Mỗi cá nhân tự mò mẫm câu lệnh riêng; khi nhân sự nghỉ việc hoặc chuyển vị trí, tri thức và quy trình làm việc với AI cũng biến mất, không thể nhân rộng toàn phòng ban.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. CORE COMPETENCIES & AI MATURITY SECTION (White Background, Exact BLE .comp-grid) -->
        <section class="ble-section bg-white" id="muc-tieu">
            <div class="ble-glow-orb ble-glow-orb-primary" style="top: 20%; right: -10%;"></div>
            <div class="ble-glow-orb ble-glow-orb-gold" style="bottom: 10%; left: -15%;"></div>

            <div class="ble-container">
                <div class="ble-title-wrap">
                    <span class="ble-section-tag">
                        <span class="dot"></span> Mục tiêu chương trình &amp; Lộ trình trưởng thành AI
                    </span>
                    <h2 class="ble-section-title">4 Trụ Cột Năng Lực &amp; <span class="ble-gradient-text">4 Cấp Độ Trưởng Thành AI</span></h2>
                    <p class="ble-section-subtitle" style="max-width: 760px; margin: 0 auto;">Chương trình trang bị toàn diện tư duy chiến lược, kỹ năng bảo mật, quản trị kho tri thức và đóng gói hệ thống AI Agents để nâng cấp doanh nghiệp từ <strong>AI Beside</strong> lên <strong>AI Agentic</strong>:</p>
                </div>

                <!-- 8 Cards in Exact BLE .comp-grid (4 Core Pillars + 4 AI Maturity Levels) -->
                <div class="comp-grid">
                    <!-- Pillar 1 -->
                    <div class="comp-card">
                        <div class="comp-card-header">
                            <div class="comp-icon-box">
                                <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .5 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5M9 18h6M10 22h4"/></svg>
                            </div>
                            <h4 class="comp-card-caps-title">1. Tư Duy &amp; Nhận Thức AI</h4>
                        </div>
                        <p class="comp-desc">Hiểu đúng bản chất Generative AI, cơ chế hoạt động và giới hạn của LLM (Context Window, Hallucination) để hoạch định chiến lược ứng dụng AI hiệu quả.</p>
                    </div>

                    <!-- Pillar 2 -->
                    <div class="comp-card">
                        <div class="comp-card-header">
                            <div class="comp-icon-box">
                                <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            </div>
                            <h4 class="comp-card-caps-title">2. An Toàn &amp; Bảo Mật</h4>
                        </div>
                        <p class="comp-desc">Nắm vững nguyên tắc phân loại dữ liệu nhạy cảm, thực hành thành thạo kỹ thuật ẩn danh hóa (Anonymization) và mã hóa nhất quán (Consistent Tokenization).</p>
                    </div>

                    <!-- Pillar 3 -->
                    <div class="comp-card">
                        <div class="comp-card-header">
                            <div class="comp-icon-box">
                                <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
                            </div>
                            <h4 class="comp-card-caps-title">3. Điều Khiển &amp; Tri Thức</h4>
                        </div>
                        <p class="comp-desc">Làm chủ công thức P.R.O.M.P.T, kỹ thuật Meta-Prompting và xây dựng "Bộ não thứ 2" với kho tri thức phòng ban chuẩn Enterprise RAG để lập kế hoạch AOP 2027.</p>
                    </div>

                    <!-- Pillar 4 -->
                    <div class="comp-card">
                        <div class="comp-card-header">
                            <div class="comp-icon-box">
                                <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M9 9h6v6H9zM9 1v3M15 1v3M9 20v3M15 20v3M20 9h3M20 15h3M1 9h3M1 15h3"/></svg>
                            </div>
                            <h4 class="comp-card-caps-title">4. Đóng Gói &amp; Vận Hành</h4>
                        </div>
                        <p class="comp-desc">Thiết kế Custom AI Agents, khai thác 7 C-Suite Advisors &amp; 101+ Business Skills, chuẩn hóa quy trình SOP 5 bước và quản trị IDEAS Team Workspace.</p>
                    </div>

                    <!-- Maturity Level 1 -->
                    <div class="comp-card">
                        <div class="comp-card-header">
                            <div class="comp-icon-box">
                                <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                            </div>
                            <h4 class="comp-card-caps-title">Cấp Độ 01: AI Beside</h4>
                        </div>
                        <p class="comp-desc">Trợ lý bên cạnh — sử dụng AI để hỏi đáp rời rạc, hỗ trợ tra cứu thông tin, tóm tắt văn bản và soạn thảo cá nhân nhanh chóng.</p>
                    </div>

                    <!-- Maturity Level 2 -->
                    <div class="comp-card">
                        <div class="comp-card-header">
                            <div class="comp-icon-box">
                                <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                            </div>
                            <h4 class="comp-card-caps-title">Cấp Độ 02: AI Inline</h4>
                        </div>
                        <p class="comp-desc">Tích hợp trực tiếp vào luồng công việc hàng ngày thông qua bộ khung câu lệnh P.R.O.M.P.T chuẩn hóa và thư viện IDEAS Prompt Hub.</p>
                    </div>

                    <!-- Maturity Level 3 -->
                    <div class="comp-card">
                        <div class="comp-card-header">
                            <div class="comp-icon-box">
                                <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
                            </div>
                            <h4 class="comp-card-caps-title">Cấp Độ 03: AI Inside</h4>
                        </div>
                        <p class="comp-desc">Nhúng sâu vào kho tri thức nội bộ (Enterprise RAG), kiểm chứng nguồn trích dẫn (Source Grounding), phân tích đa tài liệu và lập kế hoạch AOP 2027.</p>
                    </div>

                    <!-- Maturity Level 4 -->
                    <div class="comp-card">
                        <div class="comp-card-header">
                            <div class="comp-icon-box">
                                <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            </div>
                            <h4 class="comp-card-caps-title">Cấp Độ 04: AI Agentic</h4>
                        </div>
                        <p class="comp-desc">Hệ thống Đại lý AI tự hành phối hợp liên phòng ban (Multi-Agent Collaboration), vận hành đồng bộ theo quy trình SOP 5 bước trên IDEAS Team Workspace.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. INTERACTIVE CURRICULUM SECTION (Exact Dark #040508 BLE Curriculum Layout) -->
        <section class="ble-section bg-soft-cream" id="curriculum">
            <div class="ble-glow-orb ble-glow-orb-primary" style="bottom: 5%; right: -10%;"></div>

            <div class="ble-container">
                <div class="ble-title-wrap">
                    <span class="ble-section-tag">
                        <span class="dot"></span> Khung chương trình 04 buổi thực chiến (Tổng 12 giờ)
                    </span>
                    <h2 class="ble-section-title">Lộ Trình Đào Tạo <span class="ble-text-red">&amp; Nghiệm Thu Sản Phẩm</span></h2>
                    <p class="ble-section-subtitle">Mỗi buổi học kéo dài 3 giờ (180 phút) với 70% thời lượng thực hành trực tiếp trên IDEAS AI Platform, nghiệm thu 08 sản phẩm quản trị thực tế:</p>
                </div>

                <!-- Cask layout wrapper -->
                <div class="curr-layout">
                    <!-- Left Sidebar: vertical tabs -->
                    <div class="curr-sidebar">
                        <div class="curr-tab active" data-target="course-1">
                            <div class="curr-tab-tag">Buổi 01 • 3 Giờ (180 Phút)</div>
                            <div class="curr-tab-title">Tổng Quan Generative AI, Bảo Mật Dữ Liệu &amp; Meta-Prompting</div>
                        </div>
                        <div class="curr-tab" data-target="course-2">
                            <div class="curr-tab-tag">Buổi 02 • 3 Giờ (180 Phút)</div>
                            <div class="curr-tab-title">Bộ Não Thứ 2 Với Enterprise RAG, Kiểm Chứng Dữ Liệu &amp; Lập Kế Hoạch AOP 2027</div>
                        </div>
                        <div class="curr-tab" data-target="course-3">
                            <div class="curr-tab-tag">Buổi 03 • 3 Giờ (180 Phút)</div>
                            <div class="curr-tab-title">Thiết Kế &amp; Đóng Gói AI Agents, Khai Thác Thư Viện Đại Lý Chuyên Biệt</div>
                        </div>
                        <div class="curr-tab" data-target="course-4">
                            <div class="curr-tab-tag">Buổi 04 • 3 Giờ (180 Phút)</div>
                            <div class="curr-tab-title">Lộ Trình Ứng Dụng AI Doanh Nghiệp, Quy Trình SOP 5 Bước &amp; Team Workspace</div>
                        </div>

                        <!-- Sidebar Illustration on Desktop -->
                        <div class="curr-sidebar-visual">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/ble_curriculum_side.png" alt="Thực hành IDEAS AI Platform">
                        </div>
                    </div>

                    <!-- Right panel: detailed content -->
                    <div class="curr-details">
                        <!-- PANEL 1: BUỔI 01 -->
                        <div class="curr-panel active" id="course-1">
                            <div class="curr-panel-header">
                                <div class="curr-panel-title-wrap">
                                    <h3 class="curr-panel-title">Buổi 01: Tổng Quan Generative AI, Bảo Mật Dữ Liệu &amp; Meta-Prompting</h3>
                                    <p class="curr-panel-desc">Hiểu đúng bản chất Generative AI &amp; LLM, thiết lập hàng rào bảo mật dữ liệu doanh nghiệp bằng kỹ thuật <strong>Consistent Tokenization</strong> và làm chủ phương pháp điều khiển AI nâng cao (<strong>P.R.O.M.P.T &amp; Meta-Prompting</strong>) trên phân hệ <strong>IDEAS Security Guard</strong> và <strong>IDEAS Prompt Hub</strong>.</p>
                                </div>
                            </div>

                            <div class="curr-accordion-list">
                                <!-- Module 1.1 -->
                                <div class="curr-acc-item active">
                                    <div class="curr-acc-header">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">1.1</span>
                                            <span class="curr-acc-title">Tổng quan Generative AI, LLM &amp; Bức tranh Ứng dụng AI Doanh nghiệp</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">65 Phút</span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Bản chất cốt lõi của Generative AI và Mô hình Ngôn ngữ Lớn (LLM): Cơ chế dự đoán từ tiếp theo (Next-token prediction), giới hạn ngữ cảnh (Context Window) và nguyên nhân gốc rễ của hiện tượng Ảo giác AI (Hallucination).</li>
                                                <li>Sự dịch chuyển mô hình làm việc: Từ tìm kiếm thông tin truyền thống sang cộng tác tư duy và tự động hóa quy trình cùng AI.</li>
                                                <li>Mô hình 4 Cấp độ Trưởng thành AI trong Doanh nghiệp (AI Maturity): <strong>AI Beside</strong> (Hỏi đáp rời rạc) → <strong>AI Inline</strong> (Tích hợp luồng việc) → <strong>AI Inside</strong> (Kết nối tri thức nội bộ) → <strong>AI Agentic</strong> (Hệ thống Đại lý AI tự hành).</li>
                                                <li>Khảo sát và đánh giá nhanh hiện trạng ứng dụng AI tại các phòng ban của học viên.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Module 1.2 -->
                                <div class="curr-acc-item active">
                                    <div class="curr-acc-header">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">1.2</span>
                                            <span class="curr-acc-title">An toàn, Bảo mật Dữ liệu &amp; Kỹ thuật Consistent Tokenization</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">50 Phút</span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Nhận diện 4 nhóm rủi ro bảo mật trọng yếu khi nhân sự tự ý đưa dữ liệu tài chính, nhân sự, hợp đồng, chiến lược lên các nền tảng AI công cộng.</li>
                                                <li>Nguyên tắc phân loại dữ liệu doanh nghiệp (Public / Internal / Confidential / Restricted) trước khi tương tác với AI.</li>
                                                <li>Kỹ thuật Ẩn danh hóa (Anonymization) và <strong>Mã hóa Nhất quán (Consistent Tokenization)</strong>: Phương pháp thay thế tên công ty, đối tác, nhân sự, số liệu nhạy cảm bằng các mã định danh nhất quán (<code>[COMPANY_A]</code>, <code>[CLIENT_X]</code>, <code>[PROJECT_01]</code>, nhân hệ số số liệu) giúp AI vẫn phân tích chính xác logic mà không lộ bí mật kinh doanh.</li>
                                                <li>Quy trình khử nhiễu, làm sạch và chuẩn hóa cấu trúc dữ liệu thô trước khi nạp vào AI.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Module 1.3 -->
                                <div class="curr-acc-item active">
                                    <div class="curr-acc-header">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">1.3</span>
                                            <span class="curr-acc-title">Công thức P.R.O.M.P.T, Meta-Prompting &amp; Chuẩn hóa Thư viện Lệnh</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">65 Phút</span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Cấu trúc câu lệnh chuẩn quản trị theo công thức <strong>P.R.O.M.P.T</strong>: <strong>P</strong>urpose (Mục tiêu) – <strong>R</strong>ole (Vai trò chuyên gia) – <strong>O</strong>utput (Định dạng đầu ra) – <strong>M</strong>ain Info (Dữ liệu &amp; ngữ cảnh đầu vào) – <strong>P</strong>arameters (Ràng buộc &amp; tiêu chuẩn) – <strong>T</strong>one (Văn phong quản trị).</li>
                                                <li>Kỹ thuật nâng cao: <strong>Role Prompting</strong> (Thiết lập nhân vật chuyên sâu), <strong>Chain-of-Thought</strong> (Ép AI suy luận từng bước logic) và <strong>Few-Shot Prompting</strong> (Huấn luyện AI bằng ví dụ mẫu chuẩn của công ty).</li>
                                                <li>Kỹ thuật <strong>Meta-Prompting</strong> (Dùng AI để thiết kế, phản biện và tối ưu hóa câu lệnh phức tạp cho chính AI).</li>
                                                <li>Thực hành lưu trữ, phân loại và chia sẻ câu lệnh chuẩn trên <strong>IDEAS Prompt Hub</strong>: Ẩn danh hóa 01 báo cáo nhạy cảm bằng Consistent Tokenization và giải quyết 03 bài toán quản trị thực tế.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Deliverables block -->
                            <div class="curr-outcomes">
                                <div class="curr-outcomes-title">
                                    Sản phẩm nghiệm thu Buổi 01 (Deliverables):
                                </div>
                                <ul class="curr-outcomes-list">
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span><strong>01 Bộ Từ điển Mã hóa &amp; Dữ liệu Sạch (Tokenization Dictionary):</strong> Tài liệu nhạy cảm của phòng ban đã được ẩn danh hóa chuẩn xác, sẵn sàng đưa vào AI phân tích an toàn.</span>
                                    </li>
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span><strong>01 Thư viện Prompt Quản trị Chuẩn hóa (5–10 Master Prompts):</strong> Được thiết kế theo khung P.R.O.M.P.T &amp; Meta-Prompting, lưu trữ trực tiếp trên IDEAS Prompt Hub để sử dụng ngay.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- PANEL 2: BUỔI 02 -->
                        <div class="curr-panel" id="course-2" style="display:none;">
                            <div class="curr-panel-header">
                                <div class="curr-panel-title-wrap">
                                    <h3 class="curr-panel-title">Buổi 02: Bộ Não Thứ 2 Với Enterprise RAG, Kiểm Chứng Dữ Liệu &amp; Thực Chiến Lập Kế Hoạch AOP 2027</h3>
                                    <p class="curr-panel-desc">Xây dựng "Bộ não thứ 2" cho phòng ban bằng công nghệ <strong>Enterprise RAG</strong>, triệt tiêu ảo giác AI qua quy trình kiểm chứng nguồn trích dẫn (<strong>Source Grounding</strong>) và thực chiến đại phẫu dữ liệu để lập <strong>Kế hoạch Vận hành Thường niên (AOP 2027)</strong>.</p>
                                </div>
                            </div>

                            <div class="curr-accordion-list">
                                <!-- Module 2.1 -->
                                <div class="curr-acc-item active">
                                    <div class="curr-acc-header">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">2.1</span>
                                            <span class="curr-acc-title">Kiến trúc Enterprise RAG &amp; Xây dựng "Bộ não thứ 2" cho Phòng ban</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">30 Phút</span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Bản chất công nghệ <strong>RAG (Retrieval-Augmented Generation)</strong>: Sự khác biệt cốt lõi giữa việc hỏi AI thông thường và việc buộc AI tra cứu, trích xuất câu trả lời từ chính Kho tri thức nội bộ của doanh nghiệp.</li>
                                                <li>Quy trình kiến tạo "Bộ não thứ 2" (Second Brain) trên <strong>IDEAS Knowledge Center</strong>: Cách phân loại, đặt tên, cấu trúc hóa tài liệu (Quy chế, SOP, Báo cáo lịch sử, Hồ sơ sản phẩm) để AI truy xuất đạt độ chính xác cao nhất.</li>
                                                <li>Nguyên tắc phòng chống <strong>"Garbage In – Garbage Out" (GIGO)</strong>: Xử lý mâu thuẫn phiên bản tài liệu và làm sạch dữ liệu trước khi đưa vào kho RAG.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Module 2.2 -->
                                <div class="curr-acc-item active">
                                    <div class="curr-acc-header">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">2.2</span>
                                            <span class="curr-acc-title">Quản trị Ảo giác AI (Hallucination), Kiểm chứng Nguồn &amp; Tổng hợp Đa tài liệu</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">40 Phút</span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Kỹ thuật <strong>Source Grounding</strong> &amp; Ràng buộc Trích dẫn: Thiết lập cơ chế ép AI chỉ được trả lời dựa trên tài liệu đã tải lên và bắt buộc đính kèm trích dẫn nguồn (tên file, mục, trang) cho từng luận điểm.</li>
                                                <li>Phương pháp tổng hợp và đối chiếu chéo đa tài liệu (Multi-document Synthesis): Yêu cầu AI tìm điểm bất đồng giữa các báo cáo, rà soát rủi ro hợp đồng đối chiếu với quy chế nội bộ.</li>
                                                <li>Quy trình kiểm toán chéo (Cross-Verification) kết hợp đánh giá của con người (<strong>Human-in-the-loop</strong>) trước khi ban hành quyết định quản trị.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Module 2.3 -->
                                <div class="curr-acc-item active">
                                    <div class="curr-acc-header">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">2.3</span>
                                            <span class="curr-acc-title">Thực chiến Trọng tâm: Đại phẫu Dữ liệu &amp; Lập Kế hoạch Vận hành Thường niên (AOP 2027)</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">110 Phút</span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li><strong>Bước 1 – Chẩn đoán dữ liệu lịch sử (Historical Data Audit):</strong> Nạp báo cáo kết quả kinh doanh/vận hành của phòng ban vào RAG để AI bóc tách xu hướng, điểm nghẽn (Bottlenecks) và nguyên nhân gốc rễ.</li>
                                                <li><strong>Bước 2 – Thiết lập mục tiêu chiến lược &amp; Ma trận OGSM / OKRs 2027:</strong> Phối hợp cùng AI xây dựng các kịch bản mục tiêu (Cơ sở / Phấn đấu / Đột phá) bám sát định hướng ban lãnh đạo.</li>
                                                <li><strong>Bước 3 – Phân rã Kế hoạch Hành động &amp; Dự phóng Nguồn lực (Resource &amp; Budget Allocation):</strong> Chi tiết hóa danh mục sáng kiến trọng tâm theo từng Quý/Tháng, định biên nhân sự và dự toán ngân sách.</li>
                                                <li><strong>Bước 4 – Ma trận Quản trị Rủi ro &amp; Kế hoạch Dự phòng (Risk Mitigation):</strong> Dùng AI đóng vai trò "Người phản biện" (Devil's Advocate) để vạch ra các lỗ hổng trong bản AOP và đề xuất phương án ứng phó.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Deliverables block -->
                            <div class="curr-outcomes">
                                <div class="curr-outcomes-title">
                                    Sản phẩm nghiệm thu Buổi 02 (Deliverables):
                                </div>
                                <ul class="curr-outcomes-list">
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span><strong>01 Kho Tri thức Phòng ban (Department Knowledge Base):</strong> Được cấu trúc hóa chuẩn RAG trên IDEAS Knowledge Center với tài liệu thực tế đã làm sạch.</span>
                                    </li>
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span><strong>01 Bản Kế hoạch Vận hành Thường niên (AOP 2027) của Phòng ban:</strong> Bao gồm phân tích dữ liệu lịch sử, bảng mục tiêu OKRs/KPIs, lộ trình hành động theo quý, dự toán ngân sách và ma trận quản trị rủi ro.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- PANEL 3: BUỔI 03 -->
                        <div class="curr-panel" id="course-3" style="display:none;">
                            <div class="curr-panel-header">
                                <div class="curr-panel-title-wrap">
                                    <h3 class="curr-panel-title">Buổi 03: Thiết Kế &amp; Đóng Gói AI Agents, Khai Thác Thư Viện Đại Lý Chuyên Biệt</h3>
                                    <p class="curr-panel-desc">Chuyển dịch từ việc gõ lệnh thủ công lặp đi lặp lại sang tư duy kiến tạo hệ thống: Tự tay đóng gói các Trợ lý AI chuyên biệt (<strong>Custom AI Agents</strong>) cho phòng ban và khai thác sức mạnh của <strong>7 C-Suite AI Advisors</strong> cùng <strong>101+ Business Skills Agents</strong> trên IDEAS AI Platform.</p>
                                </div>
                            </div>

                            <div class="curr-accordion-list">
                                <!-- Module 3.1 -->
                                <div class="curr-acc-item active">
                                    <div class="curr-acc-header">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">3.1</span>
                                            <span class="curr-acc-title">Tư duy Hệ thống AI Agents &amp; Quy trình Đóng gói Custom Agent Chuyên biệt</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">65 Phút</span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Sự khác biệt bản chất giữa <strong>Prompt</strong> (Câu lệnh đơn lẻ, dùng một lần) và <strong>AI Agent</strong> (Trợ lý ảo được đóng gói sẵn Vai trò, Quy trình tư duy, Kho tri thức RAG, Ràng buộc bảo mật và Định dạng đầu ra chuẩn).</li>
                                                <li>Giải phẫu 5 thành phần cốt lõi của một Custom AI Agent chuẩn doanh nghiệp trên <strong>IDEAS Agent Builder</strong>: System Instructions (Chỉ dẫn hệ thống), Knowledge Base (Tri thức gắn kèm), Workflow Rules (Luồng xử lý), Guardrails (Rào chắn kiểm soát) và Output Template (Mẫu báo cáo đầu ra).</li>
                                                <li>Thực hành từng bước: Chuyển hóa một quy trình nghiệp vụ lặp lại của phòng ban (VD: Rà soát hợp đồng, Đánh giá CV &amp; tạo câu hỏi phỏng vấn, Phân tích báo cáo chi phí, Lập kế hoạch chiến dịch Marketing) thành một <strong>Custom AI Agent</strong> hoàn chỉnh.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Module 3.2 -->
                                <div class="curr-acc-item active">
                                    <div class="curr-acc-header">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">3.2</span>
                                            <span class="curr-acc-title">Khai thác Hệ thống 7 C-Suite AI Advisors &amp; 101+ Business Skills Agents</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">40 Phút</span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Trải nghiệm và làm chủ <strong>7 C-Suite AI Advisors</strong> (Cố vấn cấp cao ảo: CEO, CFO, COO, CMO, CHRO, CLO, CTO/CDO) để tham mưu chiến lược, thẩm định dự án và phản biện quyết định quản trị dưới nhiều góc nhìn lãnh đạo.</li>
                                                <li>Khai thác thư viện <strong>101+ Business Skills Agents</strong> được huấn luyện sẵn cho 6 khối phòng ban chức năng: Nhân sự &amp; Đào tạo (HR), Tài chính – Kế toán (Finance), Kinh doanh &amp; Tiếp thị (Sales &amp; Marketing), Vận hành &amp; Chuỗi cung ứng (Operations), Pháp chế &amp; Tuân thủ (Legal), Quản lý Dự án &amp; Công nghệ (PM &amp; IT).</li>
                                                <li>Phương pháp tùy biến nhanh (Fine-tuning ngữ cảnh) các Agent có sẵn trong thư viện để khớp 100% với đặc thù doanh nghiệp của học viên.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Module 3.3 -->
                                <div class="curr-acc-item active">
                                    <div class="curr-acc-header">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">3.3</span>
                                            <span class="curr-acc-title">Phối hợp Đa Tác tử (Multi-Agent Collaboration) Giải quyết Bài toán Liên Phòng ban</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">75 Phút</span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Phương pháp <strong>Agent Chaining</strong> (Nối chuỗi nhiều AI Agents): Kết hợp đầu ra của Agent phòng ban này làm đầu vào cho Agent phòng ban khác để giải quyết các dự án phức tạp liên phòng ban.</li>
                                                <li>Thực hành kịch bản <strong>Hội đồng Cố vấn Ảo (Virtual Boardroom)</strong>: Đưa một đề án kinh doanh hoặc bản kế hoạch AOP 2027 qua chuỗi thẩm định liên tiếp của CFO Agent (tối ưu dòng tiền &amp; ROI) → CHRO Agent (đánh giá năng lực nhân sự) → CLO Agent (rà soát rủi ro pháp lý) → CEO Agent (tổng hợp quyết định chiến lược).</li>
                                                <li>Kiểm thử chéo (Stress-testing), tinh chỉnh System Prompt của Agent và hoàn thiện quy trình bàn giao cho nhân sự cấp dưới sử dụng.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Deliverables block -->
                            <div class="curr-outcomes">
                                <div class="curr-outcomes-title">
                                    Sản phẩm nghiệm thu Buổi 03 (Deliverables):
                                </div>
                                <ul class="curr-outcomes-list">
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span><strong>01 Custom AI Agent Chuyên môn của Phòng ban:</strong> Đã được đóng gói hoàn chỉnh (System Prompt + RAG Knowledge + Output Template) và kiểm thử thực tế trên IDEAS AI Platform.</span>
                                    </li>
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span><strong>01 Báo cáo Giải pháp Kinh doanh Đa tầng (Multi-Agent Report):</strong> Kết quả phối hợp giữa C-Suite Advisors và Business Skills Agents giải quyết một bài toán thực tiễn của đơn vị.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- PANEL 4: BUỔI 04 -->
                        <div class="curr-panel" id="course-4" style="display:none;">
                            <div class="curr-panel-header">
                                <div class="curr-panel-title-wrap">
                                    <h3 class="curr-panel-title">Buổi 04: Lộ Trình Ứng Dụng AI Doanh Nghiệp, Quy Trình SOP 5 Bước &amp; Thiết Lập Team Workspace</h3>
                                    <p class="curr-panel-desc">Đưa AI từ năng lực cá nhân của người quản lý trở thành quy trình vận hành chuẩn (<strong>SOP</strong>) của cả tập thể: Thiết lập không gian làm việc chung <strong>IDEAS Team Workspace</strong>, chuẩn hóa SOP 5 bước và xây dựng lộ trình chuyển đổi <strong>30–60–90 ngày</strong> đo lường hiệu quả theo mô hình <strong>Kirkpatrick</strong>.</p>
                                </div>
                            </div>

                            <div class="curr-accordion-list">
                                <!-- Module 4.1 -->
                                <div class="curr-acc-item active">
                                    <div class="curr-acc-header">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">4.1</span>
                                            <span class="curr-acc-title">Chuẩn hóa Quy trình Vận hành AI (SOP 5 Bước) &amp; Chuyển giao Đội ngũ</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">65 Phút</span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Giải quyết bài toán "Nhân sự nghỉ việc, quy trình AI biến mất": Phương pháp đóng gói tri thức và câu lệnh thành <strong>Quy trình Vận hành Chuẩn (Standard Operating Procedure – SOP)</strong> để bất kỳ nhân sự nào cũng thực thi đạt chất lượng đồng nhất.</li>
                                                <li>Thực hành <strong>Khung SOP AI 5 Bước</strong>: (1) <strong>Audit &amp; Decomposition</strong> (Rà soát &amp; Bóc tách tác vụ) → (2) <strong>Prompt &amp; Custom Agent</strong> (Thiết lập công cụ chuẩn) → (3) <strong>Quality Acceptance</strong> (Tiêu chuẩn nghiệm thu &amp; Human-in-the-loop) → (4) <strong>SOP Packaging</strong> (Đóng gói tài liệu hướng dẫn) → (5) <strong>Monitoring &amp; ROI</strong> (Đo lường hiệu suất &amp; cải tiến).</li>
                                                <li>Phương pháp vượt qua rào cản tâm lý (Change Management): Cách huấn luyện, kèm cặp và thúc đẩy nhân sự trong phòng ban chủ động áp dụng AI đúng quy chuẩn bảo mật.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Module 4.2 -->
                                <div class="curr-acc-item active">
                                    <div class="curr-acc-header">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">4.2</span>
                                            <span class="curr-acc-title">Thiết lập Không gian Làm việc Chung (IDEAS Team Workspace) &amp; Lộ trình 30–60–90 Ngày</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">75 Phút</span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Thực hành khởi tạo và quản trị <strong>IDEAS Team Workspace</strong> cho phòng ban: Phân quyền truy cập theo vai trò (Role-based Access Control), chia sẻ Kho tri thức RAG dùng chung, đồng bộ Thư viện Prompt và phân phối các Custom AI Agents cho từng thành viên.</li>
                                                <li><strong>30 Ngày đầu (Quick Wins – Kirkpatrick Level 1 &amp; 2):</strong> Chuẩn hóa bảo mật, áp dụng Prompt Hub &amp; RAG cho các tác vụ tốn thời gian nhất, tiết kiệm 20–30% thời gian cá nhân.</li>
                                                <li><strong>60 Ngày tiếp theo (Scaling &amp; SOPs – Kirkpatrick Level 3):</strong> Vận hành đồng bộ trên Team Workspace, triển khai Custom Agents và ban hành tối thiểu 02 quy trình SOP AI cấp phòng ban.</li>
                                                <li><strong>90 Ngày (Agentic Transformation &amp; ROI – Kirkpatrick Level 4):</strong> Tự động hóa luồng việc liên phòng ban, đo lường KPI tiết kiệm chi phí/thời gian và báo cáo ROI cho Ban Giám đốc.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Module 4.3 -->
                                <div class="curr-acc-item active">
                                    <div class="curr-acc-header">
                                        <div class="curr-acc-header-left">
                                            <span class="curr-acc-num">4.3</span>
                                            <span class="curr-acc-title">Trình bày Dự án Cuối khóa (Capstone Pitch), Nghiệm thu &amp; Kích hoạt 30 Ngày Đồng hành</span>
                                        </div>
                                        <div class="curr-acc-header-right">
                                            <span class="curr-acc-badge">40 Phút</span>
                                        </div>
                                    </div>
                                    <div class="curr-acc-content">
                                        <div class="curr-acc-content-inner">
                                            <ul class="curr-topics-list">
                                                <li>Học viên trình bày (Pitching) bộ sản phẩm thực chiến đã hoàn thiện xuyên suốt 4 buổi học (Kho RAG, Bản AOP 2027, Custom AI Agent, Team Workspace &amp; Kế hoạch 30–60–90 ngày).</li>
                                                <li>Hội đồng chuyên gia Viện IDEAS nhận xét, phản biện trực tiếp và nghiệm thu chất lượng đầu ra theo tiêu chuẩn doanh nghiệp.</li>
                                                <li>Kích hoạt chương trình <strong>30 Ngày Đồng hành Sau Đào tạo (Post-Training Coaching)</strong>: Thiết lập lịch cố vấn chuyên môn &amp; hỗ trợ kỹ thuật cùng chuyên gia IDEAS để giải quyết các vướng mắc phát sinh khi triển khai thực tế tại doanh nghiệp.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Deliverables block -->
                            <div class="curr-outcomes">
                                <div class="curr-outcomes-title">
                                    Sản phẩm nghiệm thu Buổi 04 (Deliverables):
                                </div>
                                <ul class="curr-outcomes-list">
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span><strong>01 Không gian Làm việc Nhóm (IDEAS Team Workspace):</strong> Đã được cấu hình phân quyền, tích hợp sẵn Kho tri thức RAG, Prompt Hub và các Custom AI Agents của phòng ban.</span>
                                    </li>
                                    <li>
                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                        <span><strong>01 Bản Kế hoạch Triển khai AI 30–60–90 Ngày &amp; Bộ SOP 5 Bước Mẫu:</strong> Kèm bảng phân rã công việc (WBS) và bộ chỉ số đo lường hiệu quả ROI / Kirkpatrick sẵn sàng áp dụng ngay tại doanh nghiệp.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. IDEAS AI PLATFORM SECTION (White Background, Exact BLE .ai-grid) -->
        <section class="ble-section bg-white" id="nen-tang">
            <div class="ble-glow-orb ble-glow-orb-primary" style="top: 15%; left: -10%;"></div>

            <div class="ble-container">
                <div class="ai-grid">
                    <!-- Left: Details -->
                    <div class="ai-content">
                        <span class="ble-section-tag">
                            <span class="dot"></span> Nền tảng thực thi hợp nhất
                        </span>
                        <h2 class="ble-section-title">Thực Hành 100% Trên <span class="ble-text-red">IDEAS AI Platform</span></h2>
                        <p class="ble-section-subtitle" style="margin-bottom: 24px;">Không dừng lại ở lý thuyết hay các công cụ rời rạc, toàn bộ học viên được cấp tài khoản thực hành trực tiếp trên <strong>IDEAS AI Platform</strong> — hệ sinh thái AI quản trị hợp nhất 6 phân hệ cốt lõi dành riêng cho doanh nghiệp:</p>

                        <ul class="ai-features-list">
                            <li>
                                <span class="ai-feat-icon">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                </span>
                                <span class="ai-feat-text"><strong>IDEAS Security Guard:</strong> Công cụ ẩn danh hóa dữ liệu nhạy cảm và tạo Bộ từ điển mã hóa nhất quán (Consistent Tokenization) bảo vệ tuyệt đối bí mật kinh doanh.</span>
                            </li>
                            <li>
                                <span class="ai-feat-icon">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                </span>
                                <span class="ai-feat-text"><strong>IDEAS Prompt Hub:</strong> Kho lưu trữ, chuẩn hóa và chia sẻ các mẫu câu lệnh quản trị theo công thức <strong>P.R.O.M.P.T</strong> &amp; <strong>Meta-Prompting</strong>.</span>
                            </li>
                            <li>
                                <span class="ai-feat-icon">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                </span>
                                <span class="ai-feat-text"><strong>IDEAS Knowledge Center (Enterprise RAG):</strong> Kiến tạo "Bộ não thứ 2" cho từng phòng ban, truy xuất chính xác kèm trích dẫn nguồn (Source Grounding), chống ảo giác AI.</span>
                            </li>
                            <li>
                                <span class="ai-feat-icon">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                </span>
                                <span class="ai-feat-text"><strong>IDEAS Agent Builder &amp; Library:</strong> Không gian thiết kế Custom AI Agents không cần lập trình (No-code), tích hợp sẵn <strong>7 C-Suite AI Advisors</strong> và <strong>101+ Business Skills Agents</strong>.</span>
                            </li>
                            <li>
                                <span class="ai-feat-icon">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                </span>
                                <span class="ai-feat-text"><strong>IDEAS Team Workspace:</strong> Không gian cộng tác phòng ban, phân quyền truy cập theo vai trò (RBAC) và vận hành quy trình <strong>SOP 5 bước</strong> đồng bộ.</span>
                            </li>
                            <li>
                                <span class="ai-feat-icon">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                </span>
                                <span class="ai-feat-text"><strong>Deep Analysis Engine (Multi-LLM):</strong> Phân tích dữ liệu lớn, tổng hợp đa tài liệu và hỗ trợ lập Kế hoạch Vận hành Thường niên (<strong>AOP 2027</strong>).</span>
                            </li>
                        </ul>

                        <button onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('ai-for-managers-platform'); } else { document.getElementById('dang-ky').scrollIntoView({behavior:'smooth'}); }" class="ble-btn">Đăng ký trải nghiệm IDEAS AI Platform</button>
                    </div>

                    <!-- Right: Overlapping AI Platform Screenshots -->
                    <div class="ai-visual">
                        <div class="ai-screens-container">
                            <div class="ai-screen-wrapper wrap-login">
                                <div class="ai-screen-card card-login">
                                    <img src="https://ideas.edu.vn/wp-content/uploads/2026/07/ai_login.webp" alt="IDEAS AI Platform Login">
                                </div>
                            </div>
                            <div class="ai-screen-wrapper wrap-main">
                                <div class="ai-screen-card card-main" style="aspect-ratio: 16/9; position: relative; width: 100%;">
                                    <iframe src="https://www.youtube.com/embed/09mATwfEE8Q" title="IDEAS AI Platform Demo" style="position: absolute; top:0; left:0; width:100%; height:100%; border:none;" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="ai-screen-wrapper wrap-sub">
                                <div class="ai-screen-card card-sub">
                                    <img src="https://ideas.edu.vn/wp-content/uploads/2026/07/aiplatform-2.webp" alt="IDEAS AI Platform Mobile Assistant">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5B. THƯ VIỆN 108+ AI AGENTS & CÔNG THỨC P.R.O.M.P.T (Warm Cream Background, Exact BLE .comp-grid Style) -->
        <section class="ble-section bg-soft-cream" id="thu-vien-agents">
            <div class="ble-glow-orb ble-glow-orb-gold" style="top: 10%; right: -10%;"></div>

            <div class="ble-container">
                <div class="ble-title-wrap">
                    <span class="ble-section-tag">
                        <span class="dot"></span> Hệ điều hành AI Quản trị Doanh nghiệp
                    </span>
                    <h2 class="ble-section-title">Công Thức <span class="ble-text-red">P.R.O.M.P.T</span> &amp; Hệ Sinh Thái <span class="ble-gradient-text">108+ AI Agents</span></h2>
                    <p class="ble-section-subtitle">Chuẩn hóa giao thức điều khiển AI kết hợp Hội đồng 7 Cố vấn C-Suite ảo và 101+ Trợ lý nghiệp vụ chuyên sâu cho 6 phòng ban trọng yếu:</p>
                </div>

                <!-- Sub-block 1: 6 Thành phần Công thức P.R.O.M.P.T + 7 C-Suite AI Advisors (Exact BLE .comp-grid) -->
                <div style="margin-bottom: 48px;">
                    <h3 style="font-size: 1.35rem; font-weight: 850; color: #0f172a; margin: 0 0 24px 0; text-align: center;">Hội Đồng <span class="ble-text-red">07 C-Suite AI Advisors</span> &amp; Giao Thức <span class="ble-text-red">P.R.O.M.P.T</span></h3>
                    <div class="comp-grid">
                        <!-- Card 1: P.R.O.M.P.T Protocol -->
                        <div class="comp-card" style="background: linear-gradient(135deg, #fff5f5 0%, #ffffff 100%); border-color: rgba(171, 14, 0, 0.2);">
                            <div class="comp-card-header">
                                <div class="comp-icon-box" style="background: #ab0e00; color: #ffffff;">
                                    <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 17 10 11 4 5"/><line x1="12" y1="19" x2="20" y2="19"/></svg>
                                </div>
                                <h4 class="comp-card-caps-title" style="color: #ab0e00;">Khung P.R.O.M.P.T Chuẩn</h4>
                            </div>
                            <p class="comp-desc"><strong>P</strong>urpose (Mục tiêu) • <strong>R</strong>ole (Vai trò chuyên gia) • <strong>O</strong>utput (Định dạng đầu ra) • <strong>M</strong>ain Info (Ngữ cảnh &amp; RAG) • <strong>P</strong>arameters (Ràng buộc &amp; Chống ảo giác) • <strong>T</strong>one (Văn phong C-Level), tích hợp Role Prompting, Chain-of-Thought &amp; Meta-Prompting.</p>
                        </div>

                        <!-- Card 2: CEO Advisor -->
                        <div class="comp-card">
                            <div class="comp-card-header">
                                <div class="comp-icon-box">
                                    <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                </div>
                                <h4 class="comp-card-caps-title">CEO Advisor • Chiến Lược</h4>
                            </div>
                            <p class="comp-desc">Phản biện tầm nhìn, thiết lập bản đồ chiến lược và phân rã mục tiêu <strong>AOP 2027</strong> toàn công ty thông qua các mô hình <strong>OGSM, BSC, SWOT/PESTEL</strong>.</p>
                        </div>

                        <!-- Card 3: CFO Advisor -->
                        <div class="comp-card">
                            <div class="comp-card-header">
                                <div class="comp-icon-box">
                                    <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                                </div>
                                <h4 class="comp-card-caps-title">CFO Advisor • Tài Chính</h4>
                            </div>
                            <p class="comp-desc">Thẩm định hiệu quả đầu tư, tối ưu cấu trúc chi phí và mô phỏng kịch bản dòng tiền thông qua phân tích <strong>P&amp;L, Cashflow, DuPont &amp; Ngân sách</strong>.</p>
                        </div>

                        <!-- Card 4: COO Advisor -->
                        <div class="comp-card">
                            <div class="comp-card-header">
                                <div class="comp-icon-box">
                                    <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                                </div>
                                <h4 class="comp-card-caps-title">COO Advisor • Vận Hành</h4>
                            </div>
                            <p class="comp-desc">Chẩn đoán điểm nghẽn quy trình, tinh gọn chuỗi cung ứng và chuẩn hóa <strong>SOP liên phòng ban</strong> theo chuẩn <strong>Lean / Six Sigma &amp; SLA</strong>.</p>
                        </div>

                        <!-- Card 5: CMO Advisor -->
                        <div class="comp-card">
                            <div class="comp-card-header">
                                <div class="comp-icon-box">
                                    <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/></svg>
                                </div>
                                <h4 class="comp-card-caps-title">CMO Advisor • Tăng Trưởng</h4>
                            </div>
                            <p class="comp-desc">Hoạch định chiến lược Go-to-Market, định vị thương hiệu (Brand Positioning), thiết kế phễu chuyển đổi và tối ưu hiệu suất <strong>ROI Marketing</strong>.</p>
                        </div>

                        <!-- Card 6: CHRO Advisor -->
                        <div class="comp-card">
                            <div class="comp-card-header">
                                <div class="comp-icon-box">
                                    <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                </div>
                                <h4 class="comp-card-caps-title">CHRO Advisor • Nhân Sự</h4>
                            </div>
                            <p class="comp-desc">Kiến tạo khung năng lực (Competency Matrix), từ điển KPI/OKR, chính sách đãi ngộ <strong>Total Rewards (Hay Group)</strong> và lộ trình kế thừa.</p>
                        </div>

                        <!-- Card 7: CLO Advisor -->
                        <div class="comp-card">
                            <div class="comp-card-header">
                                <div class="comp-icon-box">
                                    <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                </div>
                                <h4 class="comp-card-caps-title">CLO Advisor • Pháp Chế</h4>
                            </div>
                            <p class="comp-desc">Thẩm định điều khoản hợp đồng thương mại, cảnh báo rủi ro pháp lý, kiểm soát tuân thủ quy chế nội bộ và quản trị tranh chấp doanh nghiệp.</p>
                        </div>

                        <!-- Card 8: CTO / CDO Advisor -->
                        <div class="comp-card">
                            <div class="comp-card-header">
                                <div class="comp-icon-box">
                                    <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"/><rect x="2" y="14" width="20" height="8" rx="2" ry="2"/><line x1="6" y1="6" x2="6.01" y2="6"/><line x1="6" y1="18" x2="6.01" y2="18"/></svg>
                                </div>
                                <h4 class="comp-card-caps-title">CTO / CDO Advisor • Công Nghệ</h4>
                            </div>
                            <p class="comp-desc">Tư vấn kiến trúc dữ liệu Enterprise RAG, lộ trình tích hợp hệ thống AI Agents, quản trị an toàn thông tin và chuyển đổi số toàn diện.</p>
                        </div>
                    </div>
                </div>

                <!-- Sub-block 2: 101+ Business Skills Agents across 6 Functional Departments -->
                <div>
                    <h3 style="font-size: 1.35rem; font-weight: 850; color: #0f172a; margin: 0 0 24px 0; text-align: center;">Thư Viện <span class="ble-text-red">101+ Trợ Lý Nghiệp Vụ</span> Cho 6 Khối Phòng Ban</h3>
                    <div class="comp-grid" style="grid-template-columns: repeat(3, 1fr);">
                        <!-- Dept 1: HR -->
                        <div class="comp-card">
                            <div class="comp-card-header">
                                <div class="comp-icon-box">
                                    <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                </div>
                                <div>
                                    <h4 class="comp-card-caps-title">Nhân Sự &amp; Đào Tạo (HR)</h4>
                                    <span style="font-size: 0.75rem; font-weight: 800; color: #ab0e00;">18+ Agents Chuyên Biệt</span>
                                </div>
                            </div>
                            <ul class="curr-topics-list">
                                <li>Thiết kế JD &amp; Khung năng lực chuẩn</li>
                                <li>Sàng lọc CV &amp; Bộ câu hỏi phỏng vấn STAR</li>
                                <li>Xây dựng Lộ trình Onboarding &amp; L&amp;D</li>
                                <li>Thiết kế KPI/OKR &amp; Đánh giá hiệu suất</li>
                                <li>Soạn thảo Quy chế lương thưởng &amp; Nội quy</li>
                            </ul>
                        </div>

                        <!-- Dept 2: Finance -->
                        <div class="comp-card">
                            <div class="comp-card-header">
                                <div class="comp-icon-box">
                                    <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                                </div>
                                <div>
                                    <h4 class="comp-card-caps-title">Tài Chính – Kế Toán</h4>
                                    <span style="font-size: 0.75rem; font-weight: 800; color: #ab0e00;">16+ Agents Chuyên Biệt</span>
                                </div>
                            </div>
                            <ul class="curr-topics-list">
                                <li>Phân tích biến động BCTC (Variance Analysis)</li>
                                <li>Lập dự toán ngân sách AOP 2027</li>
                                <li>Đánh giá thẩm định dự án (NPV, IRR, Payback)</li>
                                <li>Kiểm soát chi phí &amp; Tối ưu vốn lưu động</li>
                                <li>Cảnh báo rủi ro công nợ &amp; Dòng tiền</li>
                            </ul>
                        </div>

                        <!-- Dept 3: Sales & Marketing -->
                        <div class="comp-card">
                            <div class="comp-card-header">
                                <div class="comp-icon-box">
                                    <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                                </div>
                                <div>
                                    <h4 class="comp-card-caps-title">Kinh Doanh &amp; Tiếp Thị</h4>
                                    <span style="font-size: 0.75rem; font-weight: 800; color: #ab0e00;">22+ Agents Chuyên Biệt</span>
                                </div>
                            </div>
                            <ul class="curr-topics-list">
                                <li>Nghiên cứu Insight khách hàng &amp; Đối thủ</li>
                                <li>Lập kế hoạch IMC &amp; Chiến dịch đa kênh</li>
                                <li>Xây dựng Kịch bản B2B Sales &amp; Xử lý từ chối</li>
                                <li>Tối ưu tỷ lệ chuyển đổi (CRO) &amp; Customer Journey</li>
                                <li>Phân tích dữ liệu CRM &amp; Dự báo doanh số</li>
                            </ul>
                        </div>

                        <!-- Dept 4: Operations -->
                        <div class="comp-card">
                            <div class="comp-card-header">
                                <div class="comp-icon-box">
                                    <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                                </div>
                                <div>
                                    <h4 class="comp-card-caps-title">Vận Hành &amp; Chuỗi Cung Ứng</h4>
                                    <span style="font-size: 0.75rem; font-weight: 800; color: #ab0e00;">19+ Agents Chuyên Biệt</span>
                                </div>
                            </div>
                            <ul class="curr-topics-list">
                                <li>Chuẩn hóa lưu đồ quy trình SOP &amp; SLA</li>
                                <li>Phân tích điểm nghẽn (Bottleneck) &amp; Kaizen</li>
                                <li>Đánh giá &amp; Đàm phán nhà cung cấp (Procurement)</li>
                                <li>Tối ưu định mức tồn kho &amp; Logistics</li>
                                <li>Kiểm soát chất lượng (QA/QC) &amp; Báo cáo sự cố</li>
                            </ul>
                        </div>

                        <!-- Dept 5: Legal -->
                        <div class="comp-card">
                            <div class="comp-card-header">
                                <div class="comp-icon-box">
                                    <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                                </div>
                                <div>
                                    <h4 class="comp-card-caps-title">Pháp Chế &amp; Tuân Thủ</h4>
                                    <span style="font-size: 0.75rem; font-weight: 800; color: #ab0e00;">12+ Agents Chuyên Biệt</span>
                                </div>
                            </div>
                            <ul class="curr-topics-list">
                                <li>Rà soát rủi ro Hợp đồng thương mại &amp; Lao động</li>
                                <li>Đối chiếu tuân thủ Quy chế nội bộ trên RAG</li>
                                <li>Soạn thảo Công văn, Biên bản &amp; Phụ lục</li>
                                <li>Bảo vệ dữ liệu cá nhân &amp; Bảo mật thông tin</li>
                            </ul>
                        </div>

                        <!-- Dept 6: PM & IT -->
                        <div class="comp-card">
                            <div class="comp-card-header">
                                <div class="comp-icon-box">
                                    <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
                                </div>
                                <div>
                                    <h4 class="comp-card-caps-title">Quản Lý Dự Án &amp; Công Nghệ</h4>
                                    <span style="font-size: 0.75rem; font-weight: 800; color: #ab0e00;">14+ Agents Chuyên Biệt</span>
                                </div>
                            </div>
                            <ul class="curr-topics-list">
                                <li>Phân rã công việc WBS &amp; Lập tiến độ Gantt</li>
                                <li>Ma trận phân quyền RACI &amp; Quản trị rủi ro dự án</li>
                                <li>Viết tài liệu đặc tả yêu cầu nghiệp vụ (BRD/SRS)</li>
                                <li>Tổng hợp biên bản họp &amp; Theo dõi Action Items</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5C. QUY TRÌNH SOP 5 BƯỚC & LỘ TRÌNH 30-60-90 NGÀY (White Background, Exact BLE .pain-split-layout Style) -->
        <section class="ble-section bg-white" id="lo-trinh-sop">
            <div class="ble-glow-orb ble-glow-orb-primary" style="top: 15%; left: -10%;"></div>

            <div class="ble-container">
                <div class="ble-title-wrap">
                    <span class="ble-section-tag">
                        <span class="dot"></span> Phương pháp luận chuyển giao &amp; Đo lường ROI
                    </span>
                    <h2 class="ble-section-title">Quy Trình <span class="ble-text-red">SOP 5 Bước</span> &amp; Lộ Trình <span class="ble-gradient-text">30–60–90 Ngày</span></h2>
                    <p class="ble-section-subtitle">Đảm bảo tính kế thừa bền vững trong toàn tổ chức và đo lường hiệu quả thực tế sau đào tạo theo mô hình chuẩn quốc tế <strong>Kirkpatrick 4 Cấp Độ</strong>:</p>
                </div>

                <div class="pain-split-layout">
                    <!-- Left Column: 30-60-90 Day Transformation Roadmap Cards -->
                    <div class="pain-left-col" style="padding-right: 0;">
                        <h3 style="font-size: 1.3rem; font-weight: 850; color: #0f172a; margin: 0 0 20px 0;">Lộ Trình Chuyển Đổi <span class="ble-text-red">30–60–90 Ngày (Kirkpatrick)</span></h3>
                        <div style="display: flex; flex-direction: column; gap: 20px;">
                            <!-- Month 1 -->
                            <div class="comp-card" style="padding: 24px 26px;">
                                <div class="comp-card-header" style="margin-bottom: 12px;">
                                    <div class="comp-icon-box" style="width: 44px; height: 44px;">
                                        <span style="font-weight: 900; font-size: 0.9rem;">30D</span>
                                    </div>
                                    <div>
                                        <span style="font-size: 0.72rem; font-weight: 800; color: #ab0e00; text-transform: uppercase;">Tháng 01 (Ngày 01 – 30) • Quick Wins (Kirkpatrick L1 – L2)</span>
                                        <h4 class="comp-card-caps-title" style="margin-top: 2px;">Chuẩn Hóa Bảo Mật &amp; Làm Chủ Công Cụ Cá Nhân</h4>
                                    </div>
                                </div>
                                <p class="comp-desc">100% quản lý nắm vững quy tắc phân loại dữ liệu, hoàn tất <strong>Tokenization Dictionary</strong>, khởi tạo kho RAG cơ sở và áp dụng công thức P.R.O.M.P.T tiết kiệm <strong>20–30% thời gian</strong> xử lý văn bản, báo cáo tuần.</p>
                            </div>

                            <!-- Month 2 -->
                            <div class="comp-card" style="padding: 24px 26px;">
                                <div class="comp-card-header" style="margin-bottom: 12px;">
                                    <div class="comp-icon-box" style="width: 44px; height: 44px;">
                                        <span style="font-weight: 900; font-size: 0.9rem;">60D</span>
                                    </div>
                                    <div>
                                        <span style="font-size: 0.72rem; font-weight: 800; color: #ab0e00; text-transform: uppercase;">Tháng 02 (Ngày 31 – 60) • Scaling &amp; SOPs (Kirkpatrick L3)</span>
                                        <h4 class="comp-card-caps-title" style="margin-top: 2px;">Đóng Gói Custom Agents &amp; Vận Hành Team Workspace</h4>
                                    </div>
                                </div>
                                <p class="comp-desc">Triển khai Custom AI Agents cho các tác vụ lặp lại, ban hành tối thiểu <strong>02 quy trình SOP AI cấp phòng ban</strong> và đưa đội ngũ vào làm việc đồng bộ, phân quyền RBAC trên <strong>IDEAS Team Workspace</strong>.</p>
                            </div>

                            <!-- Month 3 -->
                            <div class="comp-card" style="padding: 24px 26px;">
                                <div class="comp-card-header" style="margin-bottom: 12px;">
                                    <div class="comp-icon-box" style="width: 44px; height: 44px;">
                                        <span style="font-weight: 900; font-size: 0.9rem;">90D</span>
                                    </div>
                                    <div>
                                        <span style="font-size: 0.72rem; font-weight: 800; color: #ab0e00; text-transform: uppercase;">Tháng 03 (Ngày 61 – 90) • Agentic ROI (Kirkpatrick L4)</span>
                                        <h4 class="comp-card-caps-title" style="margin-top: 2px;">Tự Động Hóa Liên Phòng Ban &amp; Nghiệm Thu ROI</h4>
                                    </div>
                                </div>
                                <p class="comp-desc">Vận hành chuỗi Multi-Agent giải quyết bài toán liên phòng ban, hoàn thiện kế hoạch chiến lược <strong>AOP 2027</strong> và đo lường KPI tiết kiệm <strong>30–50% chi phí/thời gian</strong> vận hành trình Ban Giám đốc.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: 5-Step SOP Pipeline (Exact BLE .pain-list-item) -->
                    <div class="pain-right-col">
                        <h3 style="font-size: 1.3rem; font-weight: 850; color: #0f172a; margin: 0 0 4px 0;">Khung Quy Trình <span class="ble-text-red">SOP AI 5 Bước Chuẩn Hóa</span></h3>

                        <div class="pain-list-item">
                            <div class="pain-number">01</div>
                            <div class="pain-info">
                                <h4>Audit &amp; Decomposition (Rà soát &amp; Bóc tách tác vụ)</h4>
                                <p>Rà soát luồng việc phòng ban, bóc tách các tác vụ tốn thời gian và phân loại mức độ nhạy cảm dữ liệu. <strong>Đầu ra: Ma trận WBS &amp; Tokenization Dictionary.</strong></p>
                            </div>
                        </div>

                        <div class="pain-list-item">
                            <div class="pain-number">02</div>
                            <div class="pain-info">
                                <h4>Prompt &amp; Custom Agent (Thiết lập công cụ chuẩn)</h4>
                                <p>Thiết kế câu lệnh chuẩn P.R.O.M.P.T, kết nối kho tri thức RAG và đóng gói thành Custom AI Agent. <strong>Đầu ra: Master Prompts &amp; Phòng ban AI Agent.</strong></p>
                            </div>
                        </div>

                        <div class="pain-list-item">
                            <div class="pain-number">03</div>
                            <div class="pain-info">
                                <h4>Quality Acceptance (Tiêu chuẩn nghiệm thu)</h4>
                                <p>Thiết lập tiêu chí kiểm chứng nguồn trích dẫn (Source Grounding) và chốt chặn duyệt bởi con người. <strong>Đầu ra: Checklist Nghiệm thu Human-in-the-Loop.</strong></p>
                            </div>
                        </div>

                        <div class="pain-list-item">
                            <div class="pain-number">04</div>
                            <div class="pain-info">
                                <h4>SOP Packaging (Đóng gói tài liệu hướng dẫn)</h4>
                                <p>Đóng gói toàn bộ hướng dẫn thao tác, câu lệnh mẫu và quy tắc bảo mật thành văn bản SOP chuẩn. <strong>Đầu ra: Văn bản SOP AI &amp; Phân quyền Workspace.</strong></p>
                            </div>
                        </div>

                        <div class="pain-list-item">
                            <div class="pain-number">05</div>
                            <div class="pain-info">
                                <h4>Monitoring &amp; ROI (Đo lường hiệu suất &amp; cải tiến)</h4>
                                <p>Theo dõi nhật ký vận hành (Audit Trail), đo lường thời gian tiết kiệm và đánh giá hiệu quả sau đào tạo. <strong>Đầu ra: Báo cáo ROI Kirkpatrick 4 Cấp độ.</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. LOCAL EXPERTS SECTION (Warm Cream Background, Exact BLE Advisor Slider) -->
        <section class="ble-section bg-soft-cream" style="position: relative; overflow: hidden;">
            <div class="ble-glow-orb ble-glow-orb-primary" style="bottom: 15%; left: -10%;"></div>

            <div class="ble-container">
                <div class="ble-title-wrap">
                    <span class="ble-section-tag">
                        <span class="dot"></span> Hội đồng Chuyên môn &amp; Huấn luyện Thực chiến
                    </span>
                    <h2 class="ble-section-title">Đội Ngũ <span class="ble-text-red">Chuyên Gia &amp; Tiến Sĩ</span> Viện IDEAS</h2>
                    <p class="ble-section-subtitle">Sự kết hợp giữa các Tiến sĩ Quản trị Kinh doanh quốc tế và các Chuyên gia Công nghệ AI trực tiếp giảng dạy, nghiệm thu sản phẩm và cố vấn 30 ngày sau khóa học.</p>
                </div>

                <div class="advisor-slider-container">
                    <button class="advisor-slider-btn prev" aria-label="Previous">
                        <svg viewBox="0 0 320 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
                    </button>
                    <div class="advisor-slider-track-wrapper">
                        <div class="fac-grid-advisor">
                            <!-- Expert 1 -->
                            <div class="fac-card">
                                <div class="fac-avatar-wrap">
                                    <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/vientruong_avt-optimized.webp" alt="TS. Phạm Quang Vinh" class="fac-avatar">
                                </div>
                                <h4 class="fac-name">TS. Phạm Quang Vinh</h4>
                                <div class="fac-role">Tiến sĩ Quản Trị Kinh Doanh (Hoa Kỳ)</div>
                                <p class="fac-bio">Viện trưởng Viện IDEAS. Hơn 25 năm kinh nghiệm giảng dạy, tư vấn chiến lược Marketing, Quản trị điều hành và Chuyển đổi số cho doanh nghiệp.</p>
                            </div>

                            <!-- Expert 2 -->
                            <div class="fac-card">
                                <div class="fac-avatar-wrap">
                                    <img src="https://ideas.edu.vn/wp-content/uploads/2024/04/Thay-thinh-optimized.webp" alt="TS. Dương Văn Thịnh" class="fac-avatar">
                                </div>
                                <h4 class="fac-name">TS. Dương Văn Thịnh</h4>
                                <div class="fac-role">Tiến sĩ Quản Trị Kinh Doanh (Pháp)</div>
                                <p class="fac-bio">Vice President, AI Technology tại VERON Group. Tiến sĩ chuyên ngành Nghiên cứu AI &amp; Trung tâm dữ liệu (Ascencia Business School, Pháp).</p>
                            </div>

                            <!-- Expert 3 -->
                            <div class="fac-card">
                                <div class="fac-avatar-wrap">
                                    <img src="https://ideas.edu.vn/wp-content/uploads/2025/02/casc1-optimized.webp" alt="TS. Nguyễn Thanh Bình" class="fac-avatar">
                                </div>
                                <h4 class="fac-name">TS. Nguyễn Thanh Bình</h4>
                                <div class="fac-role">Tiến sĩ Công Nghệ Thông Tin</div>
                                <p class="fac-bio">Giám đốc Viện Công Nghệ Thông Tin &amp; Môi Trường. Hơn 20 năm kinh nghiệm nghiên cứu, giảng dạy Khoa học máy tính và ứng dụng Trí tuệ nhân tạo.</p>
                            </div>

                            <!-- Expert 4 -->
                            <div class="fac-card">
                                <div class="fac-avatar-wrap">
                                    <img src="https://ideas.edu.vn/wp-content/uploads/2026/08/cnhat_aodai.webp" alt="TS. Mang Viên Hoàng Nhật" class="fac-avatar">
                                </div>
                                <h4 class="fac-name">TS. Mang Viên Hoàng Nhật</h4>
                                <div class="fac-role">Tiến sĩ Quản Trị Kinh Doanh</div>
                                <p class="fac-bio">Hơn 25 năm kinh nghiệm điều hành ngành Dược phẩm &amp; Thiết bị Y tế; 15 năm quản lý cấp cao tại GSK, Roche, Menarini, Takeda, Pierre Fabre Việt Nam.</p>
                            </div>

                            <!-- Expert 5 -->
                            <div class="fac-card">
                                <div class="fac-avatar-wrap">
                                    <img src="https://ideas.edu.vn/wp-content/uploads/2026/07/tsphivu.webp" alt="NCS. Phạm Phi Vũ" class="fac-avatar">
                                </div>
                                <h4 class="fac-name">NCS. Phạm Phi Vũ</h4>
                                <div class="fac-role">Nghiên cứu sinh Khoa Học Máy Tính &amp; AI</div>
                                <p class="fac-bio">Chuyên gia nghiên cứu chuyên sâu về Học máy (Machine Learning), kiến trúc RAG và các giải pháp tối ưu hóa quy trình vận hành doanh nghiệp bằng AI.</p>
                            </div>

                            <!-- Expert 6 -->
                            <div class="fac-card">
                                <div class="fac-avatar-wrap">
                                    <img src="https://ideas.edu.vn/wp-content/uploads/2026/07/avatar_mr_duong.webp" alt="NCS. Võ Trùng Dương" class="fac-avatar">
                                </div>
                                <h4 class="fac-name">NCS. Võ Trùng Dương</h4>
                                <div class="fac-role">Thạc sĩ AI &amp; Business Strategist</div>
                                <p class="fac-bio">Trưởng Khối Tăng Trưởng &amp; Công Nghệ Viện IDEAS. Hơn 20 năm kinh nghiệm triển khai giải pháp Marketing, Tăng trưởng và tích hợp hệ thống AI Agents.</p>
                            </div>
                        </div>
                    </div>
                    <button class="advisor-slider-btn next" aria-label="Next">
                        <svg viewBox="0 0 320 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                    </button>
                </div>

                <!-- Slide Dots indicators for local experts -->
                <div class="fac-dots-advisor">
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </section>

        <!-- 7. CERTIFICATE SHOWCASE SECTION (White Background, Exact BLE .cert-wrap) -->
        <section class="ble-section bg-white">
            <div class="ble-glow-orb ble-glow-orb-primary" style="bottom: 10%; left: -10%;"></div>

            <div class="ble-container">
                <div class="cert-wrap">
                    <!-- Left: Text Info -->
                    <div class="cert-info">
                        <span class="ble-section-tag">
                            <span class="dot"></span> Chứng nhận &amp; Đặc quyền học viên
                        </span>
                        <h2 class="ble-section-title" style="font-size: 1.95rem !important; line-height: 1.25 !important; text-align: left;">Chứng Nhận Hoàn Thành &amp; <span class="ble-text-red">Tài Nguyên Đồng Hành</span></h2>
                        <p class="ble-section-subtitle" style="margin-bottom: 24px; color: #4b5563;">Nghiệm thu 08 sản phẩm thực chiến và nhận <strong>Certificate of Completion</strong> từ Viện IDEAS cùng trọn bộ tài nguyên triển khai:</p>
                        <ul class="ai-features-list" style="margin-bottom: 30px;">
                            <li>
                                <span class="ai-feat-icon">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                </span>
                                <span class="ai-feat-text" style="color: #475569;"><strong>Tài khoản IDEAS AI Platform</strong> thực hành xuyên suốt trong và sau khóa học.</span>
                            </li>
                            <li>
                                <span class="ai-feat-icon">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                </span>
                                <span class="ai-feat-text" style="color: #475569;"><strong>Trọn bộ học liệu:</strong> Slide bài giảng, Sổ tay P.R.O.M.P.T Quản trị &amp; Bộ mẫu SOP 5 bước.</span>
                            </li>
                            <li>
                                <span class="ai-feat-icon">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                </span>
                                <span class="ai-feat-text" style="color: #475569;"><strong>Đặc quyền truy cập:</strong> Prompt Hub, 7 C-Suite Advisors &amp; 101 Business Skills Agents.</span>
                            </li>
                            <li>
                                <span class="ai-feat-icon">
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><polyline points="20 6 9 17 5 12"/></svg>
                                </span>
                                <span class="ai-feat-text" style="color: #475569;"><strong>Đồng hành 30 ngày sau đào tạo:</strong> Cố vấn chuyên môn &amp; kỹ thuật trực tiếp từ chuyên gia IDEAS.</span>
                            </li>
                        </ul>
                        <button onclick="if(typeof window.openRegModal === 'function') { window.openRegModal('ai-for-managers-cert'); } else { document.getElementById('dang-ky').scrollIntoView({behavior:'smooth'}); }" class="ble-btn">Nhận tư vấn lộ trình triển khai</button>
                    </div>

                    <!-- Right: Certificate Display Mockup -->
                    <div class="cert-visual">
                        <div class="cert-mockup">
                            <div class="cert-mockup-border"></div>
                            <div class="cert-logo">Viện IDEAS • Executive AI Training</div>
                            <div class="cert-main-text">
                                <h5>Certificate of Completion</h5>
                                <h4>AI FOR MANAGERS: LÀM CHỦ &amp; THỰC THI AI</h4>
                                <p>Cấp cho học viên hoàn tất xuất sắc chương trình đào tạo thực chiến và nghiệm thu bộ sản phẩm trên nền tảng IDEAS AI Platform.</p>
                            </div>
                            <div class="cert-signatures">
                                <div class="cert-sig-item">
                                    <div class="cert-sig-line"></div>
                                    <span class="cert-sig-lbl">IDEAS Institute Director</span>
                                </div>
                                <div class="cert-sig-item">
                                    <div class="cert-sig-line"></div>
                                    <span class="cert-sig-lbl">AI Academic Council</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 8. TARGET AUDIENCE SECTION (Warm Cream Background, Exact BLE .ble-audience-split) -->
        <section class="ble-section bg-soft-cream" id="doi-tuong">
            <div class="ble-container">
                <div class="ble-title-wrap">
                    <span class="ble-section-tag">
                        <span class="dot"></span> Đối tượng tham gia
                    </span>
                    <h2 class="ble-section-title">Thiết Kế Chuyên Biệt Cho <span class="ble-text-red">Đội Ngũ Quản Lý &amp; Nghiệp Vụ</span></h2>
                    <p class="ble-section-subtitle">Chương trình được chuẩn hóa cho các cấp quản lý và đội ngũ nhân sự nòng cốt trực tiếp triển khai AI tại doanh nghiệp:</p>
                </div>

                <div class="ble-audience-split">
                    <!-- Left: Showcase Image -->
                    <div class="ble-audience-visual">
                        <div class="ble-audience-img-wrapper" style="border-radius: 18px !important; overflow: hidden; border: 4px solid #ffffff; box-shadow: 0 15px 30px rgba(15, 23, 42, 0.06); width: 100%;">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/workshopAI.webp" alt="Đối tượng tham gia khóa học AI for Managers" style="width: 100%; display: block; object-fit: cover; aspect-ratio: 1.18; border-radius: 14px !important;">
                        </div>
                    </div>

                    <!-- Right: Vertical List of Audience Groups -->
                    <div class="ble-audience-list">
                        <div class="ble-audience-list-item">
                            <div class="ble-aud-icon-box">
                                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M9 15v6l2-2 2 2v-6"/></svg>
                            </div>
                            <div class="ble-aud-info">
                                <h4>Cán bộ quản lý (Middle / Senior Managers)</h4>
                                <p>Dẫn dắt lộ trình chuyển đổi AI từ AI Beside lên AI Agentic, hoạch định AOP 2027 và kiểm soát an toàn dữ liệu.</p>
                            </div>
                        </div>

                        <div class="ble-audience-list-item">
                            <div class="ble-aud-icon-box">
                                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            </div>
                            <div class="ble-aud-info">
                                <h4>Trưởng / Phó các phòng ban chức năng</h4>
                                <p>Xây dựng kho tri thức chuẩn RAG, đóng gói Custom AI Agents và ban hành quy trình SOP 5 bước cho đội ngũ.</p>
                            </div>
                        </div>

                        <div class="ble-audience-list-item">
                            <div class="ble-aud-icon-box">
                                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"/><path d="M9 22V18h6v4M8 6h2M14 6h2M8 10h2M14 10h2M8 14h2M14 14h2"/></svg>
                            </div>
                            <div class="ble-aud-info">
                                <h4>Chuyên viên Nhân sự, Tài chính, Kế toán, Kinh doanh &amp; Tiếp thị</h4>
                                <p>Ứng dụng P.R.O.M.P.T &amp; C-Suite Agents giảm 30–50% thời gian xử lý báo cáo, hợp đồng, tuyển dụng và chiến dịch.</p>
                            </div>
                        </div>

                        <div class="ble-audience-list-item">
                            <div class="ble-aud-icon-box">
                                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="ble-svg-icon"><path d="M4.5 16.5c-1.5 1.25-2.5 3.5-2.5 3.5s2.25-1 3.5-2.5M12 2C6.5 2 2 6.5 2 12c0 2.5 1 4.5 2.5 6l6-6L18 4.5c1.5-1.5 3.5-2.5 6-2.5-1.5 2.5-2.5 4.5-4 6l-6.5 6.5-6 6c1.5 1.5 3.5 2.5 6 2.5 5.5 0 10-4.5 10-10 0-1.5-1-3.5-2.5-5z"/></svg>
                            </div>
                            <div class="ble-aud-info">
                                <h4>Chuyên viên Vận hành, Công nghệ &amp; Quản lý Dự án</h4>
                                <p>Thiết lập WBS, chuẩn hóa luồng dữ liệu liên phòng ban và quản trị phân quyền IDEAS Team Workspace.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 9. FAQ SECTION & REGISTRATION FORM (Side-by-side, Exact BLE .cta-section#dang-ky) -->
        <section class="cta-section" id="dang-ky" aria-labelledby="cta-headline">
            <div class="cta-bg">
                <div class="cta-orb cta-orb-1"></div>
                <div class="cta-orb cta-orb-2"></div>
            </div>

            <div class="container cta-inner">
                <div class="cta-left reveal-up">
                    <h2 class="cta-headline" id="cta-headline" style="margin-top: 20px;">AI for Managers:<br /><span class="underline-highlight"><span class="cta-gradient">Làm Chủ &amp; Thực Thi AI</span></span></h2>

                    <!-- Premium Compact Program Summary Card -->
                    <div class="ble-cta-fee-box">
                        <!-- Left: Duration info -->
                        <div class="ble-cta-fee-info">
                            <span class="fee-label">THỜI LƯỢNG ĐÀO TẠO</span>
                            <div class="fee-price">04 Buổi<span> (12h)</span></div>
                            <span class="fee-note">(30% Lý thuyết • 70% Thực hành)</span>
                        </div>

                        <!-- Divider Line -->
                        <div class="ble-cta-fee-divider"></div>

                        <!-- Right: Merged Benefits -->
                        <div class="ble-cta-fee-benefits">
                            <div class="ble-cta-fee-benefit-item" style="color: #ffe082; font-weight: 700;">
                                <span class="check-icon">✓</span>
                                <span>Cấp tài khoản thực hành chuyên nghiệp trên <strong>IDEAS AI Platform</strong>.</span>
                            </div>
                            <div class="ble-cta-fee-benefit-item" style="color: #ffe082; font-weight: 700;">
                                <span class="check-icon">✓</span>
                                <span>Nghiệm thu <strong>08 Deliverables thực chiến</strong> (Từ điển mã hóa, Kho RAG, AOP 2027, Custom Agent, SOP...).</span>
                            </div>
                            <div class="ble-cta-fee-benefit-item">
                                <span class="check-icon">✓</span>
                                <span>Truy cập đặc quyền <strong>7 C-Suite Advisors &amp; 101 Business Skills Agents</strong>.</span>
                            </div>
                            <div class="ble-cta-fee-benefit-item">
                                <span class="check-icon">✓</span>
                                <span>Trọn bộ <strong>Slide bài giảng, Sổ tay P.R.O.M.P.T Quản trị &amp; Bộ mẫu SOP 5 bước</strong>.</span>
                            </div>
                            <div class="ble-cta-fee-benefit-item">
                                <span class="check-icon">✓</span>
                                <span>Đồng hành giải đáp chuyên môn &amp; kỹ thuật <strong>30 ngày sau đào tạo</strong>.</span>
                            </div>
                            <div class="ble-cta-fee-benefit-item">
                                <span class="check-icon">✓</span>
                                <span>Đánh giá hiệu quả theo khung <strong>ROI Kirkpatrick 4 cấp độ</strong>.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Nested FAQ Accordion -->
                    <div class="faq-accordion" style="margin-top: 32px;">
                        <div class="faq-item">
                            <button type="button" class="faq-trigger">
                                <span>1. Nhân sự không biết lập trình (Non-IT) có tự tạo AI Agent được không?</span>
                                <svg class="svg-icon fa-chevron-down fa-solid faq-arrow" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                            </button>
                            <div class="faq-body">
                                <div class="faq-content">
                                    Hoàn toàn được. Phân hệ <strong>IDEAS Agent Builder</strong> được thiết kế No-Code 100% bằng ngôn ngữ tự nhiên, giúp nhà quản lý đóng gói hoàn chỉnh Custom AI Agent gắn kho tri thức RAG ngay tại Buổi 3.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button type="button" class="faq-trigger">
                                <span>2. Dữ liệu tài chính, hợp đồng được bảo mật như thế nào khi thực hành?</span>
                                <svg class="svg-icon fa-chevron-down fa-solid faq-arrow" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                            </button>
                            <div class="faq-body">
                                <div class="faq-content">
                                    Học viên thực hành khử định danh (<strong>Anonymization</strong>) và mã hóa đối soát (<strong>Consistent Tokenization</strong>) trên <strong>IDEAS Security Guard</strong>, kết hợp phân quyền RBAC 4 cấp và Audit Trail trên Team Workspace.
                                </div>
                            </div>
                        </div>

                        <div class="faq-item">
                            <button type="button" class="faq-trigger">
                                <span>3. Lịch trình 4 buổi có thể tùy chỉnh In-house theo bài toán riêng của doanh nghiệp không?</span>
                                <svg class="svg-icon fa-chevron-down fa-solid faq-arrow" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                            </button>
                            <div class="faq-body">
                                <div class="faq-content">
                                    Có. Thời lượng 12 giờ (4 buổi × 3 giờ) có thể tổ chức Intensive 2 ngày liên tục hoặc phân bổ hàng tuần, đồng thời tùy biến bài tập thực hành theo đúng dữ liệu mẫu và bài toán thực tế của doanh nghiệp.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cta-right reveal-up">
                    <div class="cta-form-wrapper" id="form-wrapper">
                        <div class="form-header">
                            <div class="form-header-badge">NHẬN TƯ VẤN &amp; BROCHURE</div>
                            <h3>Khởi đầu lộ trình<br><span class="gradient-text">Làm chủ IDEAS AI Platform</span></h3>
                            <p>Chuyên viên học vụ Viện IDEAS sẽ liên hệ trong vòng 24h làm việc để tư vấn chương trình và cấp tài khoản trải nghiệm.</p>
                        </div>

                        <form class="cta-form" id="ble-bottom-reg-form" novalidate aria-label="Form đăng ký tư vấn AI for Managers">
                            <div class="form-group">
                                <label for="reg-name">Họ và tên *</label>
                                <input type="text" id="reg-name" name="fullname" placeholder="Họ và tên của bạn" required />
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="reg-phone">Số điện thoại *</label>
                                    <input type="tel" id="reg-phone" name="phone" placeholder="Số điện thoại" required />
                                </div>
                                <div class="form-group">
                                    <label for="reg-email">Email *</label>
                                    <input type="email" id="reg-email" name="email" placeholder="Địa chỉ email doanh nghiệp" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="reg-education">Trình độ học vấn *</label>
                                    <select id="reg-education" name="education" required>
                                        <option value="">-- Chọn trình độ --</option>
                                        <option value="bachelor">Cử nhân / Kỹ sư</option>
                                        <option value="master">Thạc sĩ (MBA / MSc)</option>
                                        <option value="college">Cao đẳng</option>
                                        <option value="other">Tiến sĩ / Khác</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="reg-english">Hình thức quan tâm *</label>
                                    <select id="reg-english" name="english" required>
                                        <option value="">-- Chọn hình thức --</option>
                                        <option value="in-house">Đào tạo In-house cho Doanh nghiệp</option>
                                        <option value="public">Đăng ký lớp Public cho Quản lý</option>
                                        <option value="platform-demo">Trải nghiệm IDEAS AI Platform</option>
                                        <option value="other">Cần tư vấn chi tiết</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="reg-chuc_danh">Chức danh *</label>
                                    <select id="reg-chuc_danh" name="chuc_danh" required>
                                        <option value="">-- Chọn chức danh --</option>
                                        <option value="Chủ DN">Chủ DN / Founder / Owner</option>
                                        <option value="Giám đốc">CEO / Giám đốc / C-level</option>
                                        <option value="Manager">Middle / Senior Manager / Trưởng phòng</option>
                                        <option value="Khác">Chuyên viên nghiệp vụ / Khác</option>
                                    </select>
                                </div>
                                <div class="form-group" id="reg-other-chuc_danh-group" style="display: none;">
                                    <label for="reg-other_chuc_danh">Chức danh khác *</label>
                                    <input type="text" id="reg-other_chuc_danh" name="other_chuc_danh" placeholder="Nhập chức danh của bạn" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="reg-message">Nhu cầu đào tạo / quy mô nhân sự phòng ban hoặc doanh nghiệp</label>
                                <textarea id="reg-message" name="message" rows="3" placeholder="Ví dụ: Doanh nghiệp cần đào tạo 30 quản lý cấp trung và thiết lập kho tri thức RAG + AOP 2027..."></textarea>
                            </div>
                            <button type="submit" class="btn-submit" style="background: #ab0e00; color: #fff; font-weight: 800; border-radius: 12px; border: none; padding: 16px; cursor: pointer; transition: all 0.3s; width: 100%; display: flex; align-items: center; justify-content: center; gap: 8px;">
                                Đăng ký nhận tư vấn &amp; Demo nền tảng <svg class="svg-icon fa-circle-arrow-right fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM297 385c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l71-71L120 280c-13.3 0-24-10.7-24-24s10.7-24 24-24l214.1 0-71-71c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L409 239c9.4 9.4 9.4 24.6 0 33.9L297 385z"/></svg>
                            </button>
                        </form>
                        <p class="form-disclaimer" style="text-align: center; color: #64748b; font-size: 0.8rem; margin-top: 15px;">Cam kết bảo mật thông tin tuyệt đối theo chuẩn IDEAS Security Guard</p>
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
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/script.min.js?v=<?php echo $js_version; ?>" defer></script>

    <!-- Booking Modal script import -->
    <?php
    define('BOOKING_MODAL_JS_LOADED', true);
    $bk_js_path = get_stylesheet_directory() . '/common-assets/js/booking-modal.min.js';
    $bk_js_version = file_exists($bk_js_path) ? filemtime($bk_js_path) : time();
    ?>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/booking-modal.min.js?v=<?php echo $bk_js_version; ?>" defer></script>

    <!-- Site Footer -->
    <?php get_footer(); ?>

    <!-- Interactive JS scripts for Curriculum Tab, FAQ Accordions, Advisor Slider & AJAX Bottom Form -->
    <script>
        // 1. Curriculum Tab Switcher
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.curr-tab');
            const panels = document.querySelectorAll('.curr-panel');

            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    tabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');

                    panels.forEach(p => {
                        p.classList.remove('active');
                        p.style.display = 'none';
                    });

                    const targetId = this.getAttribute('data-target');
                    const targetPanel = document.getElementById(targetId);
                    if (targetPanel) {
                        targetPanel.classList.add('active');
                        targetPanel.style.display = 'block';
                    }
                });
            });
        });

        // 2. FAQ Accordion Toggle
        document.addEventListener('DOMContentLoaded', () => {
            const faqTriggers = document.querySelectorAll('.faq-trigger');
            faqTriggers.forEach(trigger => {
                trigger.addEventListener('click', () => {
                    const item = trigger.closest('.faq-item');
                    const body = item.querySelector('.faq-body');
                    const content = item.querySelector('.faq-content');
                    const isActive = item.classList.contains('active');

                    document.querySelectorAll('.faq-item').forEach(otherItem => {
                        otherItem.classList.remove('active');
                        const otherBody = otherItem.querySelector('.faq-body');
                        if (otherBody) otherBody.style.maxHeight = '0px';
                    });

                    if (!isActive) {
                        item.classList.add('active');
                        if (body && content) {
                            body.style.maxHeight = content.scrollHeight + 'px';
                        }
                    }
                });
            });

            const firstFaqItem = document.querySelector('.faq-item');
            if (firstFaqItem) {
                firstFaqItem.classList.add('active');
                const firstFaqBody = firstFaqItem.querySelector('.faq-body');
                const firstFaqContent = firstFaqItem.querySelector('.faq-content');
                if (firstFaqBody && firstFaqContent) {
                    setTimeout(() => {
                        firstFaqBody.style.maxHeight = firstFaqContent.scrollHeight + 'px';
                    }, 100);
                }
            }
        });

        // 3. Desktop & Mobile Advisor Slider Controller
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.querySelector('.advisor-slider-container');
            if (!container) return;

            const track = container.querySelector('.fac-grid-advisor');
            const wrapper = container.querySelector('.advisor-slider-track-wrapper');
            const prevBtn = container.querySelector('.advisor-slider-btn.prev');
            const nextBtn = container.querySelector('.advisor-slider-btn.next');
            const dotsContainer = document.querySelector('.fac-dots-advisor');

            if (!track || !wrapper) return;

            const cards = Array.from(track.querySelectorAll('.fac-card'));
            const totalCards = cards.length;
            let currentIndex = 0;
            let autoSlideInterval = null;

            function updateDots() {
                if (!dotsContainer) return;
                const dots = dotsContainer.querySelectorAll('.dot');
                dots.forEach((dot, index) => {
                    if (index === currentIndex) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });
            }

            function getVisibleCount() {
                if (window.innerWidth <= 768) return 1;
                if (window.innerWidth <= 1100) return 2;
                return 3;
            }

            function getMaxIndex() {
                const visible = getVisibleCount();
                return Math.max(0, totalCards - visible);
            }

            function slideTo(index) {
                const maxIndex = getMaxIndex();
                currentIndex = Math.max(0, Math.min(index, maxIndex));

                if (window.innerWidth > 768) {
                    const card = cards[0];
                    const cardWidth = card.offsetWidth;
                    const gap = 30;
                    const offset = currentIndex * (cardWidth + gap);
                    track.style.transform = `translateX(-${offset}px)`;
                } else {
                    const card = cards[0];
                    const cardWidth = card.offsetWidth + 16;
                    wrapper.scrollTo({
                        left: currentIndex * cardWidth,
                        behavior: 'smooth'
                    });
                }
                updateDots();
            }

            function startAutoSlide() {
                stopAutoSlide();
                if (window.innerWidth <= 768) return;
                autoSlideInterval = setInterval(() => {
                    const maxIndex = getMaxIndex();
                    let nextIndex = currentIndex + 1;
                    if (nextIndex > maxIndex) nextIndex = 0;
                    slideTo(nextIndex);
                }, 4000);
            }

            function stopAutoSlide() {
                if (autoSlideInterval) {
                    clearInterval(autoSlideInterval);
                    autoSlideInterval = null;
                }
            }

            startAutoSlide();
            container.addEventListener('mouseenter', stopAutoSlide);
            container.addEventListener('mouseleave', startAutoSlide);

            if (prevBtn && nextBtn) {
                prevBtn.addEventListener('click', () => {
                    slideTo(currentIndex - 1);
                    startAutoSlide();
                });
                nextBtn.addEventListener('click', () => {
                    slideTo(currentIndex + 1);
                    startAutoSlide();
                });
            }

            if (dotsContainer) {
                const dots = dotsContainer.querySelectorAll('.dot');
                dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => {
                        slideTo(index);
                        startAutoSlide();
                    });
                });
            }

            wrapper.addEventListener('scroll', () => {
                if (window.innerWidth <= 768) {
                    const scrollLeft = wrapper.scrollLeft;
                    const firstCard = cards[0];
                    if (!firstCard) return;
                    const cardWidth = firstCard.clientWidth + 16;
                    const activeIndex = Math.round(scrollLeft / cardWidth);
                    if (activeIndex !== currentIndex) {
                        currentIndex = activeIndex;
                        updateDots();
                    }
                }
            });

            window.addEventListener('resize', () => {
                if (window.innerWidth > 768) {
                    slideTo(currentIndex);
                    startAutoSlide();
                } else {
                    track.style.transform = '';
                    stopAutoSlide();
                }
            });
        });

        // 4. Image Lightbox Zoom Modal Toggle
        document.addEventListener('DOMContentLoaded', () => {
            const lightbox = document.getElementById('ble-lightbox');
            if (!lightbox) return;
            const lightboxImg = lightbox.querySelector('.ble-lightbox-img');
            if (!lightboxImg) return;

            const zoomables = document.querySelectorAll('.ai-screen-card, .ai-screen-card img');
            zoomables.forEach(el => {
                el.style.cursor = 'zoom-in';
                el.addEventListener('click', (e) => {
                    e.stopPropagation();
                    let src = el.tagName === 'IMG' ? el.src : (el.querySelector('img') ? el.querySelector('img').src : '');
                    if (src) {
                        lightboxImg.src = src;
                        lightbox.classList.add('active');
                    }
                });
            });
        });

        // 5. AJAX Bottom Form Submit Handler
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('ble-bottom-reg-form');
            if (form) {
                const chucDanhSel = document.getElementById('reg-chuc_danh');
                if (chucDanhSel) {
                    chucDanhSel.addEventListener('change', function () {
                        const otherGroup = document.getElementById('reg-other-chuc_danh-group');
                        const otherInput = document.getElementById('reg-other_chuc_danh');
                        if (otherGroup && otherInput) {
                            if (this.value === 'Khác') {
                                otherGroup.style.display = 'block';
                                otherInput.required = true;
                            } else {
                                otherGroup.style.display = 'none';
                                otherInput.required = false;
                                otherInput.value = '';
                            }
                        }
                    });
                }

                form.addEventListener('submit', async (e) => {
                    e.preventDefault();

                    const nameInput = document.getElementById('reg-name');
                    const phoneInput = document.getElementById('reg-phone');
                    const emailInput = document.getElementById('reg-email');
                    const eduInput = document.getElementById('reg-education');
                    const engInput = document.getElementById('reg-english');
                    const chucDanhSelect = document.getElementById('reg-chuc_danh');
                    const otherChucDanhInput = document.getElementById('reg-other_chuc_danh');
                    const msgInput = document.getElementById('reg-message');

                    const name = nameInput ? nameInput.value.trim() : '';
                    const phone = phoneInput ? phoneInput.value.trim() : '';
                    const email = emailInput ? emailInput.value.trim() : '';
                    const education = eduInput ? eduInput.value : '';
                    const english = engInput ? engInput.value : '';
                    const chucDanhVal = chucDanhSelect ? chucDanhSelect.value : '';
                    const otherChucDanhVal = otherChucDanhInput ? otherChucDanhInput.value.trim() : '';
                    const message = msgInput ? msgInput.value.trim() : '';

                    if (!name || !phone || !email || !education || !english || !chucDanhVal) {
                        alert('Vui lòng điền đầy đủ các trường thông tin bắt buộc (*).');
                        return;
                    }

                    if (chucDanhVal === 'Khác' && !otherChucDanhVal) {
                        alert('Vui lòng nhập chức danh khác.');
                        return;
                    }

                    const eduLabel = eduInput.options[eduInput.selectedIndex].text;
                    const engLabel = engInput.options[engInput.selectedIndex].text;
                    const chucDanhLabel = chucDanhSelect.options[chucDanhSelect.selectedIndex].text;
                    const chucDanhText = chucDanhVal === 'Khác' ? otherChucDanhVal : chucDanhVal;
                    const chucDanhTextLabel = chucDanhVal === 'Khác' ? otherChucDanhVal : chucDanhLabel;

                    const noteText = `Chức danh: ${chucDanhTextLabel} | Học vấn: ${eduLabel} | Hình thức: ${engLabel}${message ? ' | Lời nhắn: ' + message : ''}`;

                    const payload = {
                        form_id: "4fe1eeb0570742a1fdde61af6fc0680c",
                        email: email,
                        firstName: name,
                        phoneNumber: phone,
                        time_dat_lich: "",
                        note_dat_lich: noteText,
                        chuong_trinh_dat_lich: 'AI for Managers: Làm Chủ & Thực Thi AI',
                        chuc_danh: chucDanhText
                    };

                    const webhookPayload = {
                        name: name,
                        phone: phone,
                        email: email,
                        source: "Landing_AI_for_Managers",
                        type: "ai_for_managers_registration",
                        tieng_anh: english,
                        hoc_van: education,
                        chuc_danh: chucDanhText,
                        time_dat_lich: "",
                        chuong_trinh: 'AI for Managers: Làm Chủ & Thực Thi AI',
                        nhu_cau: noteText
                    };

                    const urlParams = new URLSearchParams(window.location.search);
                    const utmParams = ['utm_campaign', 'utm_source', 'utm_medium', 'utm_content', 'utm_term'];
                    utmParams.forEach(param => {
                        const val = urlParams.get(param);
                        if (val) webhookPayload[param] = val;
                    });

                    const btn = form.querySelector('button[type="submit"]');
                    if (btn) {
                        btn.disabled = true;
                        btn.style.opacity = '0.7';
                    }

                    try {
                        const p1 = fetch("https://automation.ideas.edu.vn/mail_api/forms.php?route=submit", {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify(payload)
                        });

                        const p2 = fetch("https://myerp.ideas.edu.vn/backend/webhook.php?token=tok_kjhbs32a", {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify(webhookPayload)
                        });

                        await Promise.allSettled([p1, p2]);

                        if (typeof window.gtag === 'function') {
                            window.gtag('event', 'conversion', {
                                'send_to': 'AW-11205917800/mdXJCOTL-bccEOj4st8p',
                                'value': 1.0,
                                'currency': 'USD'
                            });
                        }

                        alert('Đăng ký thành công! Chuyên viên học vụ Viện IDEAS sẽ liên hệ hỗ trợ bạn trong vòng 24h làm việc.');
                        form.reset();
                    } catch (error) {
                        console.error('Submission error:', error);
                        alert('Có lỗi xảy ra trong quá trình gửi thông tin. Vui lòng thử lại sau.');
                    } finally {
                        if (btn) {
                            btn.disabled = false;
                            btn.style.opacity = '1';
                        }
                    }
                });
            }
        });
    </script>

    <!-- Lightbox Zoom Modal for screenshots -->
    <div id="ble-lightbox" class="ble-lightbox" onclick="this.classList.remove('active')">
        <span class="ble-lightbox-close">&times;</span>
        <img class="ble-lightbox-img" src="" alt="Zoomed view">
    </div>

</body>

</html>
