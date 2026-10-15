<?php
/**
 * Template hiển thị chi tiết Tin Tuyển Dụng
 * Template for Single Recruitment Job (CPT: recruitment_job)
 */

if (!defined('ABSPATH')) {
    exit;
}

$is_en = (isset($_GET['lang']) && $_GET['lang'] === 'en');
?>
<!DOCTYPE html>
<html lang="<?php echo $is_en ? 'en' : 'vi'; ?>" prefix="og: https://ogp.me/ns#">

<head>
    <?php get_template_part('shared-head'); ?>

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php the_title(); ?> | <?php echo $is_en ? 'Careers at IDEAS Institute' : 'Tuyển dụng Viện IDEAS'; ?></title>
    <?php endif; ?>

    <style>
        /* ─── SINGLE JOB THEME OVERRIDES ─── */
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
            margin: 0;
            padding: 0;
        }

        .recruitment-single-page-wrapper {
            padding-top: 85px;
            min-height: calc(100vh - 400px);
        }

        .recruitment-job-hero {
            background: #0b1120;
            color: #ffffff;
            padding: 55px 20px 50px;
            position: relative;
            border-bottom: 4px solid #ab0e00;
        }

        .recruitment-job-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 80% 20%, rgba(171, 14, 0, 0.25) 0%, rgba(11, 17, 32, 0.95) 70%);
            pointer-events: none;
        }

        .recruitment-job-hero .recruitment-container {
            position: relative;
            z-index: 2;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .recruitment-breadcrumbs {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
            font-size: 13px;
            color: #94a3b8;
            margin-bottom: 20px;
        }

        .recruitment-breadcrumbs a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .recruitment-breadcrumbs a:hover {
            color: #f87171;
        }

        .recruitment-breadcrumbs span.current {
            color: #ffffff;
            font-weight: 600;
        }

        .hero-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 14px;
        }

        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 12px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.1);
            color: #f1f5f9;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .hero-tag.tag-featured {
            background: #ef4444;
            color: #ffffff;
            border-color: #ef4444;
        }

        .hero-title {
            font-size: clamp(26px, 3.5vw, 40px);
            font-weight: 800;
            line-height: 1.25;
            margin: 0 0 18px;
            color: #ffffff;
        }

        .hero-quick-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 20px;
            font-size: 14px;
            color: #cbd5e1;
        }

        .hero-quick-meta .meta-item {
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .hero-quick-meta strong {
            color: #f87171;
            font-size: 16px;
        }

        .recruitment-layout-container {
            max-width: 1200px;
            margin: 40px auto 70px;
            padding: 0 20px;
        }

        .recruitment-layout-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 360px;
            gap: 36px;
            align-items: start;
        }

        @media (max-width: 991px) {
            .recruitment-layout-grid {
                grid-template-columns: 1fr;
            }
        }

        .recruitment-content-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 32px 36px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            margin-bottom: 30px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
            margin: 0 0 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid #f1f5f9;
        }

        .section-subtitle {
            color: #64748b;
            font-size: 14px;
            margin: -10px 0 24px;
        }

        .job-rich-description {
            font-size: 15px;
            line-height: 1.75;
            color: #334155;
        }

        .job-rich-description h2, 
        .job-rich-description h3, 
        .job-rich-description h4 {
            color: #0f172a;
            margin-top: 24px;
            margin-bottom: 12px;
        }

        .job-rich-description ul, 
        .job-rich-description ol {
            padding-left: 22px;
            margin-bottom: 18px;
        }

        .job-rich-description li {
            margin-bottom: 8px;
        }

        .job-benefits-box {
            margin-top: 28px;
            padding: 24px;
            background: #f0fdf4;
            border-radius: 12px;
            border: 1px solid #bbf7d0;
        }

        .benefits-title {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 17px;
            font-weight: 700;
            color: #166534;
            margin: 0 0 12px;
        }

        .benefits-content {
            font-size: 14px;
            line-height: 1.7;
            color: #15803d;
        }

        .recruitment-sidebar-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            margin-bottom: 24px;
        }

        .sidebar-title {
            font-size: 18px;
            font-weight: 700;
            color: #0f172a;
            margin: 0 0 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid #f1f5f9;
        }

        .overview-list {
            list-style: none;
            padding: 0;
            margin: 0 0 24px;
        }

        .overview-list li {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 12px 0;
            border-bottom: 1px dashed #e2e8f0;
        }

        .overview-list li:last-child {
            border-bottom: none;
        }

        .overview-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: #fef2f2;
            color: #ab0e00;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .overview-info .label {
            display: block;
            font-size: 12px;
            color: #64748b;
            margin-bottom: 2px;
        }

        .overview-info .value {
            font-size: 14px;
            font-weight: 600;
            color: #0f172a;
        }

        .overview-info .value.salary-highlight {
            color: #ab0e00;
            font-size: 16px;
            font-weight: 700;
        }

        .btn-scroll-apply {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            background: linear-gradient(135deg, #ab0e00 0%, #c81e1e 100%);
            color: #ffffff !important;
            padding: 14px 20px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 15px;
            text-decoration: none;
            text-align: center;
            box-shadow: 0 4px 14px rgba(171, 14, 0, 0.3);
            transition: all 0.25s ease;
        }

        .btn-scroll-apply:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(171, 14, 0, 0.4);
            color: #ffffff;
        }

        .share-card .share-title {
            font-size: 15px;
            font-weight: 700;
            color: #0f172a;
            margin: 0 0 14px;
        }

        .share-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .share-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            border: 1px solid #cbd5e1;
            background: #ffffff;
            color: #334155;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .share-btn:hover {
            background: #f1f5f9;
            border-color: #94a3b8;
        }

        .share-btn.share-fb:hover {
            background: #1877f2;
            border-color: #1877f2;
            color: #ffffff;
        }

        .share-btn.share-linkedin:hover {
            background: #0a66c2;
            border-color: #0a66c2;
            color: #ffffff;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Shared Header & Navigation -->
    <?php get_template_part('shared-header'); ?>

    <?php
    while (have_posts()) : the_post();
        $job_id      = get_the_ID();
        $salary      = get_post_meta($job_id, '_job_salary', true) ?: __('Thỏa thuận', 'wp-recruitment');
        $vacancies   = get_post_meta($job_id, '_job_vacancies', true) ?: '1';
        $experience  = get_post_meta($job_id, '_job_experience', true);
        $deadline    = get_post_meta($job_id, '_job_deadline', true);
        $job_status  = get_post_meta($job_id, '_job_status', true) ?: 'active';
        $workplace   = get_post_meta($job_id, '_job_workplace_type', true) ?: 'office';
        $benefits    = get_post_meta($job_id, '_job_benefits', true);
        $is_featured = get_post_meta($job_id, '_job_featured', true);

        $departments = get_the_terms($job_id, 'job_department');
        $locations   = get_the_terms($job_id, 'job_location');
        $types       = get_the_terms($job_id, 'job_type');

        $exp_labels = [
            'none'    => 'Không yêu cầu kinh nghiệm',
            'under_1' => 'Dưới 1 năm kinh nghiệm',
            '1_2'     => '1 - 2 năm kinh nghiệm',
            '3_5'     => '3 - 5 năm kinh nghiệm',
            'over_5'  => 'Trên 5 năm kinh nghiệm',
        ];
        $exp_text = isset($exp_labels[$experience]) ? $exp_labels[$experience] : 'Theo mô tả';

        $workplace_labels = [
            'office' => 'Tại văn phòng',
            'hybrid' => 'Kết hợp Hybrid',
            'remote' => '100% Từ xa (Remote)',
        ];
        $workplace_text = isset($workplace_labels[$workplace]) ? $workplace_labels[$workplace] : 'Tại văn phòng';

        $is_expired = false;
        if ($deadline && strtotime($deadline) < time()) {
            $is_expired = true;
        }
    ?>

    <div class="recruitment-single-page-wrapper">
        <!-- Header Banner -->
        <div class="recruitment-job-hero">
            <div class="recruitment-container">
                <div class="recruitment-breadcrumbs">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo $is_en ? 'Home' : 'Trang chủ'; ?></a>
                    <span>/</span>
                    <a href="<?php echo esc_url(home_url('/tuyen-dung')); ?>"><?php echo $is_en ? 'Careers' : 'Tuyển dụng'; ?></a>
                    <span>/</span>
                    <span class="current"><?php the_title(); ?></span>
                </div>

                <div class="hero-content">
                    <div class="hero-tags">
                        <?php if ($is_featured): ?>
                            <span class="hero-tag tag-featured">
                                <?php echo class_exists('WP_Recruitment_Icons') ? WP_Recruitment_Icons::get('star', '', 12) : '★'; ?>
                                <span><?php echo $is_en ? 'Featured' : 'Nổi bật'; ?></span>
                            </span>
                        <?php endif; ?>
                        <?php if (!empty($departments) && !is_wp_error($departments)): ?>
                            <span class="hero-tag tag-dept"><?php echo esc_html($departments[0]->name); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($types) && !is_wp_error($types)): ?>
                            <span class="hero-tag tag-type"><?php echo esc_html($types[0]->name); ?></span>
                        <?php endif; ?>
                    </div>

                    <h1 class="hero-title"><?php the_title(); ?></h1>

                    <div class="hero-quick-meta">
                        <?php if (!empty($locations) && !is_wp_error($locations)): ?>
                            <div class="meta-item">
                                <?php echo class_exists('WP_Recruitment_Icons') ? WP_Recruitment_Icons::get('map-pin', 'hero-icon', 15) : '📍'; ?>
                                <span><?php echo esc_html($locations[0]->name); ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="meta-item">
                            <?php echo class_exists('WP_Recruitment_Icons') ? WP_Recruitment_Icons::get('banknote', 'hero-icon', 15) : '💵'; ?>
                            <strong><?php echo esc_html($salary); ?></strong>
                        </div>
                        <div class="meta-item">
                            <?php echo class_exists('WP_Recruitment_Icons') ? WP_Recruitment_Icons::get('calendar', 'hero-icon', 15) : '📅'; ?>
                            <span><?php echo $is_en ? 'Deadline:' : 'Hạn nộp:'; ?> <?php echo $deadline ? esc_html(date('d/m/Y', strtotime($deadline))) : ($is_en ? 'Open until filled' : 'Tuyển liên tục'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content & Sidebar -->
        <div class="recruitment-layout-container">
            <div class="recruitment-layout-grid">
                <!-- Cột Trái: Nội dung mô tả và Form ứng tuyển -->
                <div class="recruitment-main-col">
                    <div class="recruitment-content-card">
                        <h2 class="section-title">
                            <?php echo class_exists('WP_Recruitment_Icons') ? WP_Recruitment_Icons::get('file-text', 'section-icon', 18) : '📄'; ?>
                            <span><?php echo $is_en ? 'Job Description & Requirements' : 'Mô tả & Yêu cầu công việc'; ?></span>
                        </h2>
                        <div class="job-rich-description">
                            <?php the_content(); ?>
                        </div>

                        <?php if (!empty($benefits)): ?>
                            <div class="job-benefits-box">
                                <h3 class="benefits-title">
                                    <?php echo class_exists('WP_Recruitment_Icons') ? WP_Recruitment_Icons::get('gift', 'benefits-icon', 17) : '🎁'; ?>
                                    <span><?php echo $is_en ? 'Benefits & Compensation' : 'Quyền lợi & Đãi ngộ'; ?></span>
                                </h3>
                                <div class="benefits-content">
                                    <?php echo nl2br(esc_html($benefits)); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Khối Nộp Hồ Sơ Trực Tiếp -->
                    <div id="job-apply-section" class="recruitment-content-card apply-section-box">
                        <h2 class="section-title">
                            <?php echo class_exists('WP_Recruitment_Icons') ? WP_Recruitment_Icons::get('arrow-right', 'section-icon', 18) : '➡️'; ?>
                            <span><?php echo $is_en ? 'Apply for this position' : 'Nộp hồ sơ ứng tuyển'; ?></span>
                        </h2>
                        <p class="section-subtitle"><?php echo $is_en ? 'Fill in your details and submit your CV directly to our hiring team.' : 'Điền thông tin và gửi CV trực tiếp đến bộ phận tuyển dụng.'; ?></p>

                        <?php if ($job_status === 'closed' || $is_expired): ?>
                            <div class="recruitment-notice notice-expired" style="background:#fef2f2; border:1px solid #fecaca; padding:18px; border-radius:10px; color:#991b1b;">
                                <strong><?php echo $is_en ? 'This position is currently closed.' : 'Vị trí tuyển dụng này hiện đã đóng nhận hồ sơ.'; ?></strong>
                                <p style="margin:5px 0 0;"><?php echo $is_en ? 'Thank you for your interest. Please check our other open positions.' : 'Cảm ơn bạn đã quan tâm. Vui lòng tham khảo các cơ hội việc làm khác tại Viện IDEAS.'; ?></p>
                            </div>
                        <?php else: ?>
                            <?php 
                            if (class_exists('WP_Recruitment_Shortcodes')) {
                                echo WP_Recruitment_Shortcodes::get_application_form_html($job_id); 
                            }
                            ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Cột Phải: Widget Thông Tin Tóm Tắt & CTA -->
                <div class="recruitment-sidebar-col">
                    <div class="recruitment-sidebar-card">
                        <h3 class="sidebar-title"><?php echo $is_en ? 'Job Overview' : 'Tổng quan việc làm'; ?></h3>
                        <ul class="overview-list">
                            <li>
                                <div class="overview-icon"><?php echo class_exists('WP_Recruitment_Icons') ? WP_Recruitment_Icons::get('banknote', '', 16) : '💵'; ?></div>
                                <div class="overview-info">
                                    <span class="label"><?php echo $is_en ? 'Salary' : 'Mức lương'; ?></span>
                                    <span class="value salary-highlight"><?php echo esc_html($salary); ?></span>
                                </div>
                            </li>
                            <li>
                                <div class="overview-icon"><?php echo class_exists('WP_Recruitment_Icons') ? WP_Recruitment_Icons::get('map-pin', '', 16) : '📍'; ?></div>
                                <div class="overview-info">
                                    <span class="label"><?php echo $is_en ? 'Work Location' : 'Địa điểm làm việc'; ?></span>
                                    <span class="value"><?php echo (!empty($locations) && !is_wp_error($locations)) ? esc_html($locations[0]->name) : 'Viện IDEAS, TP. Hồ Chí Minh'; ?></span>
                                </div>
                            </li>
                            <li>
                                <div class="overview-icon"><?php echo class_exists('WP_Recruitment_Icons') ? WP_Recruitment_Icons::get('building', '', 16) : '🏢'; ?></div>
                                <div class="overview-info">
                                    <span class="label"><?php echo $is_en ? 'Workplace Type' : 'Hình thức làm việc'; ?></span>
                                    <span class="value"><?php echo esc_html($workplace_text); ?></span>
                                </div>
                            </li>
                            <li>
                                <div class="overview-icon"><?php echo class_exists('WP_Recruitment_Icons') ? WP_Recruitment_Icons::get('briefcase', '', 16) : '💼'; ?></div>
                                <div class="overview-info">
                                    <span class="label"><?php echo $is_en ? 'Experience' : 'Kinh nghiệm'; ?></span>
                                    <span class="value"><?php echo esc_html($exp_text); ?></span>
                                </div>
                            </li>
                            <li>
                                <div class="overview-icon"><?php echo class_exists('WP_Recruitment_Icons') ? WP_Recruitment_Icons::get('users', '', 16) : '👥'; ?></div>
                                <div class="overview-info">
                                    <span class="label"><?php echo $is_en ? 'Openings' : 'Số lượng tuyển'; ?></span>
                                    <span class="value"><?php echo esc_html($vacancies); ?> <?php echo $is_en ? 'positions' : 'người'; ?></span>
                                </div>
                            </li>
                            <li>
                                <div class="overview-icon"><?php echo class_exists('WP_Recruitment_Icons') ? WP_Recruitment_Icons::get('calendar', '', 16) : '📅'; ?></div>
                                <div class="overview-info">
                                    <span class="label"><?php echo $is_en ? 'Application Deadline' : 'Hạn nộp hồ sơ'; ?></span>
                                    <span class="value"><?php echo $deadline ? esc_html(date('d/m/Y', strtotime($deadline))) : ($is_en ? 'Continuous' : 'Tuyển liên tục'); ?></span>
                                </div>
                            </li>
                        </ul>

                        <?php if (!$is_expired && $job_status !== 'closed'): ?>
                            <a href="#job-apply-section" class="btn-scroll-apply">
                                <span><?php echo $is_en ? 'Apply Now' : 'Ứng tuyển vị trí này'; ?></span>
                                <?php echo class_exists('WP_Recruitment_Icons') ? WP_Recruitment_Icons::get('arrow-right', '', 15) : '→'; ?>
                            </a>
                        <?php endif; ?>
                    </div>

                    <!-- Card Chia Sẻ -->
                    <div class="recruitment-sidebar-card share-card">
                        <h4 class="share-title"><?php echo $is_en ? 'Share this job' : 'Chia sẻ tin tuyển dụng'; ?></h4>
                        <div class="share-buttons">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="share-btn share-fb" rel="noopener">
                                <span>Facebook</span>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="share-btn share-linkedin" rel="noopener">
                                <span>LinkedIn</span>
                            </a>
                            <button type="button" class="share-btn share-copy" onclick="navigator.clipboard.writeText('<?php echo esc_js(get_permalink()); ?>'); alert('<?php echo esc_js($is_en ? 'Job link copied to clipboard!' : 'Đã sao chép liên kết tuyển dụng!'); ?>');">
                                <span>Sao chép</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    endwhile;

    get_footer();
    ?>
