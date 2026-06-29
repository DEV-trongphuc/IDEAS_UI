<?php
/**
 * Shared Header Template Part (Vietnamese-only header extracted from index.html)
 */
$is_en = (isset($_GET['lang']) && $_GET['lang'] === 'en');

if (!function_exists('get_language_toggle_url')) {
    function get_language_toggle_url($to_lang) {
        $current_uri = $_SERVER['REQUEST_URI'];
        $url_parts = parse_url($current_uri);
        $path = isset($url_parts['path']) ? $url_parts['path'] : '/';
        $query = isset($url_parts['query']) ? $url_parts['query'] : '';
        
        parse_str($query, $query_params);
        
        if ($to_lang === 'en') {
            if (strpos($path, '/en/') === 0 || $path === '/en') {
                return $current_uri;
            }
            
            $slug_mappings = [
                '/he-thong-ho-tro-hoc-tap-lms-ideas' => '/lms-ecosystem',
                '/so-do-to-chuc' => '/organizational-chart',
                '/tu-van-vien' => '/advisors',
                '/doi-ngu-giang-vien' => '/faculty',
                '/dong-su-kien' => '/events',
                '/lich-su-hinh-thanh-va-phat-trien-vien-ideas' => '/history',
                '/ho-tro-tai-chinh-sacombank' => '/sacombank-financing',
                '/cac-khoan-chi-phi' => '/tuition-fees',
                '/ideas-ambassador' => '/ambassador',
                '/ideas-podcast-series-01' => '/ideas-podcast',
                '/lien-he' => '/contact',
                '/thac-si-quan-tri-kinh-doanh-mba' => '/online-mba-admission',
                '/chuong-trinh-online-mba' => '/online-mba-curriculum',
                '/bai-viet' => '/news',
                '/su-kien-aidc' => '/events-aidc',
                '/tri-tue-song-hanh' => '/tri-tue-song-hanh',
            ];
            
            $new_path = $path;
            $matched = false;
            foreach ($slug_mappings as $vi_slug => $en_slug) {
                if (rtrim($path, '/') === $vi_slug) {
                    $new_path = $en_slug;
                    $matched = true;
                    break;
                }
            }
            
            if ($new_path === '/') {
                $path = '/en';
            } else {
                $path = '/en' . $new_path;
            }
            
            if (!$matched) {
                $query_params['lang'] = 'en';
            } else {
                unset($query_params['lang']);
            }
        } else {
            if (strpos($path, '/en/') === 0) {
                $path = substr($path, 3);
            } elseif ($path === '/en') {
                $path = '/';
            }
            
            $reverse_mappings = [
                '/lms-ecosystem' => '/he-thong-ho-tro-hoc-tap-lms-ideas',
                '/organizational-chart' => '/so-do-to-chuc',
                '/advisors' => '/tu-van-vien',
                '/faculty' => '/doi-ngu-giang-vien',
                '/events' => '/dong-su-kien',
                '/history' => '/lich-su-hinh-thanh-va-phat-trien-vien-ideas',
                '/sacombank-financing' => '/ho-tro-tai-chinh-sacombank',
                '/tuition-fees' => '/cac-khoan-chi-phi',
                '/ambassador' => '/ideas-ambassador',
                '/ideas-podcast' => '/ideas-podcast-series-01',
                '/contact' => '/lien-he',
                '/online-mba-admission' => '/thac-si-quan-tri-kinh-doanh-mba',
                '/online-mba-curriculum' => '/chuong-trinh-online-mba',
                '/news' => '/bai-viet',
                '/events-aidc' => '/su-kien-aidc',
                '/tri-tue-song-hanh' => '/tri-tue-song-hanh',
            ];
            
            foreach ($reverse_mappings as $en_slug => $vi_slug) {
                if (rtrim($path, '/') === $en_slug) {
                    $path = $vi_slug;
                    break;
                }
            }
            
            unset($query_params['lang']);
        }
        
        $new_query = http_build_query($query_params);
        return $path . ($new_query ? '?' . $new_query : '');
    }
}

$home_url = $is_en ? '/en' : '/';
$lms_url = $is_en ? '/en/lms-ecosystem' : '/he-thong-ho-tro-hoc-tap-lms-ideas';
$faculty_url = $is_en ? '/en/faculty' : '/doi-ngu-giang-vien';
$events_url = $is_en ? '/en/events' : '/dong-su-kien';
$history_url = $is_en ? '/en/history' : '/lich-su-hinh-thanh-va-phat-trien-vien-ideas';
$advisors_url = $is_en ? '/en/advisors' : '/tu-van-vien';
$swiss_umef_url = $is_en ? '/en/swiss-umef' : '/swiss-umef';
$sacombank_url = $is_en ? '/en/sacombank-financing' : '/ho-tro-tai-chinh-sacombank';
$tuition_url = $is_en ? '/en/tuition-fees' : '/cac-khoan-chi-phi';
$ambassador_url = $is_en ? '/en/ambassador' : '/ideas-ambassador';
$news_url = $is_en ? '/en/news' : '/bai-viet';
$ideas_talk_url = $is_en ? '/en/ideas-talk' : '/ideas-talk';
$podcast_url = $is_en ? '/en/ideas-podcast' : '/ideas-podcast-series-01';
$sitemap_url = $is_en ? '/en/sitemap' : '/sitemap';
$contact_url = $is_en ? '/en/contact' : '/lien-he';
$reel_url = $is_en ? '/reel?lang=en' : '/reel';
$aidc_url = $is_en ? '/en/events-aidc' : '/su-kien-aidc';
$upcoming_aidc_count = function_exists('ideas_get_upcoming_aidc_events_count') ? ideas_get_upcoming_aidc_events_count() : 0;
$tri_tue_url = $is_en ? '/en/tri-tue-song-hanh' : '/tri-tue-song-hanh';

// Program pages
$mba_url = $is_en ? '/en/mba' : '/mba';
$emba_url = $is_en ? '/en/emba' : '/emba';
$mscai_url = $is_en ? '/en/mscai' : '/mscai';
$mbainai_url = $is_en ? '/en/mbainai' : '/mbainai';
$bba_url = $is_en ? '/en/bba' : '/bba';
$fullbba_url = $is_en ? '/en/fullbba' : '/fullbba';
$dual_dba_url = $is_en ? '/en/dual-dba' : '/dual-dba-estiam-rb';
?>
<!-- Site Header -->
<header class="ideas_header" id="site-header">
    <style>
        .menu-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #ef4444 0%, #ab0e00 100%);
            color: #ffffff !important;
            font-size: 10px;
            font-weight: 800;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            margin-left: 6px;
            vertical-align: middle;
            line-height: 1;
            box-shadow: 0 2px 5px rgba(239, 68, 68, 0.4);
        }
        .nav-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #ef4444 0%, #ab0e00 100%);
            color: #ffffff !important;
            font-size: 10px;
            font-weight: 800;
            min-width: 16px;
            height: 16px;
            padding: 0 4px;
            border-radius: 100px;
            margin-left: auto;
            line-height: 1;
            box-shadow: 0 2px 4px rgba(239, 68, 68, 0.3);
        }
        .dropdown-item-simple {
            display: flex !important;
            align-items: center;
            width: 100%;
        }
        .mobile-dropdown-item-simple {
            display: flex !important;
            align-items: center;
            width: 100%;
        }
    </style>
    <div class="container header-inner">
        <a href="<?php echo esc_url($home_url); ?>" class="logo" aria-label="<?php echo $is_en ? 'IDEAS Homepage' : 'Trang chủ IDEAS'; ?>">
            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg-optimized.webp"
                alt="Logo IDEAS Education - 15 năm thành lập" width="60" height="60" loading="eager"
                fetchpriority="high">
        </a>
        <nav class="header-nav">
            <!-- Dropdown 1: Giới thiệu / About -->
            <div class="nav-dropdown">
                <button type="button" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                    <?php echo $is_en ? 'About Us' : 'Giới thiệu'; ?>
                    <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="dropdown-menu-box simple-dropdown">
                    <a href="<?php echo esc_url($home_url); ?>" class="dropdown-item-simple">
                        <svg class="svg-icon fa-house fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg> <span><?php echo $is_en ? 'Home' : 'Trang chủ'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($lms_url); ?>" class="dropdown-item-simple">
                        <svg class="svg-icon fa-layer-group fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z"/></svg> <span><?php echo $is_en ? 'LMS Ecosystem' : 'Hệ thống LMS'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($faculty_url); ?>" class="dropdown-item-simple">
                        <svg class="svg-icon fa-user-graduate fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439.9 42.7 448 52.6 448 64s-8.1 21.3-19.3 23.5L352 102.9l0 57.1c0 70.7-57.3 128-128 128s-128-57.3-128-128l0-57.1L48 93.3l0 65.1 15.7 78.4c.9 4.7-.3 9.6-3.3 13.3s-7.6 5.9-12.4 5.9l-32 0c-4.8 0-9.3-2.1-12.4-5.9s-4.3-8.6-3.3-13.3L16 158.4l0-71.8C6.5 83.3 0 74.3 0 64C0 52.6 8.1 42.7 19.3 40.5l200-40zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7L30.7 512C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6z"/></svg> <span><?php echo $is_en ? 'Faculty Board' : 'Hội đồng chuyên môn'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($events_url); ?>" class="dropdown-item-simple">
                        <svg class="svg-icon fa-clock fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg> <span><?php echo $is_en ? 'Events' : 'Dòng sự kiện'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($history_url); ?>" class="dropdown-item-simple">
                        <svg class="svg-icon fa-landmark fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M240.1 4.2c9.8-5.6 21.9-5.6 31.8 0l171.8 98.1L448 104l0 .9 47.9 27.4c12.6 7.2 18.8 22 15.1 36s-16.4 23.8-30.9 23.8L32 192c-14.5 0-27.2-9.8-30.9-23.8s2.5-28.8 15.1-36L64 104.9l0-.9 4.4-1.6L240.1 4.2zM64 224l64 0 0 192 40 0 0-192 64 0 0 192 48 0 0-192 64 0 0 192 40 0 0-192 64 0 0 196.3c.6 .3 1.2 .7 1.8 1.1l48 32c11.7 7.8 17 22.4 12.9 35.9S494.1 512 480 512L32 512c-14.1 0-26.5-9.2-30.6-22.7s1.1-28.1 12.9-35.9l48-32c.6-.4 1.2-.7 1.8-1.1L64 224z"/></svg> <span><?php echo $is_en ? 'History' : 'Lịch sử phát triển'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($advisors_url); ?>" class="dropdown-item-simple">
                        <svg class="svg-icon fa-user-check fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM625 177L497 305c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L591 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> <span><?php echo $is_en ? 'Advisors' : 'Tư vấn viên'; ?></span>
                    </a>
                    <div class="dropdown-divider-simple"></div>
                    <div class="dropdown-item-submenu">
                        <span class="submenu-title">
                            <span><svg class="svg-icon fa-school fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M337.8 5.4C327-1.8 313-1.8 302.2 5.4L166.3 96 48 96C21.5 96 0 117.5 0 144L0 464c0 26.5 21.5 48 48 48l208 0 0-96c0-35.3 28.7-64 64-64s64 28.7 64 64l0 96 208 0c26.5 0 48-21.5 48-48l0-320c0-26.5-21.5-48-48-48L473.7 96 337.8 5.4zM96 192l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64zM96 320l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64zM232 176a88 88 0 1 1 176 0 88 88 0 1 1 -176 0zm88-48c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-16 0 0-16c0-8.8-7.2-16-16-16z"/></svg> <?php echo $is_en ? 'Partner University' : 'Trường đối tác'; ?></span>
                            <svg class="svg-icon fa-chevron-right fa-solid submenu-arrow" viewBox="0 0 320 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                        </span>
                        <div class="submenu-box">
                            <a href="<?php echo esc_url($swiss_umef_url); ?>" class="dropdown-item-simple">Swiss UMEF</a>
                            <a href="https://www.ascencia-business-school.com/en/" target="_blank" class="dropdown-item-simple">Ascencia Business School</a>
                            <a href="https://www.collegedeparis.fr/" target="_blank" class="dropdown-item-simple">College de Paris</a>
                            <a href="https://www.estiam.education/" target="_blank" class="dropdown-item-simple">Estiam</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dropdown 2: Chương trình / Programs -->
            <div class="nav-dropdown">
                <button type="button" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                    <?php echo $is_en ? 'Programs' : 'Chương trình'; ?>
                    <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="dropdown-menu-box">
                    <div class="dropdown-column">
                        <div class="dropdown-column-title"><?php echo $is_en ? 'Master' : 'Thạc sĩ'; ?></div>
                        <a href="<?php echo esc_url($mba_url); ?>" class="dropdown-item">
                            <img class="item-avatar" width="90" height="50"
                                src="https://ideas.edu.vn/wp-content/uploads/2025/09/online-mba-1-optimized.webp"
                                alt="Online MBA" decoding="async" loading="lazy" />
                            <div class="item-content">
                                <div class="item-title">Online MBA</div>
                                <div class="item-desc"><?php echo $is_en ? 'Online MBA Degree' : 'Thạc sĩ QTKD Trực tuyến'; ?></div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url($emba_url); ?>" class="dropdown-item">
                            <img class="item-avatar" width="90" height="50" src="https://ideas.edu.vn/wp-content/uploads/2025/09/emba-optimized.webp"
                                alt="Executive MBA" decoding="async" loading="lazy" />
                            <div class="item-content">
                                <div class="item-title">Executive MBA</div>
                                <div class="item-desc"><?php echo $is_en ? 'Online Executive MBA' : 'Thạc sĩ điều hành QTKD trực tuyến'; ?></div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url($mscai_url); ?>" class="dropdown-item">
                            <img class="item-avatar" width="90" height="50"
                                src="https://ideas.edu.vn/wp-content/uploads/2025/09/mscai-optimized.webp" alt="Master AI"
                                loading="lazy" decoding="async" />
                            <div class="item-content">
                                <div class="item-title">Master AI (MSc AI)</div>
                                <div class="item-desc"><?php echo $is_en ? 'Applied MSc in AI' : 'Thạc sĩ AI ứng dụng'; ?></div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url($mbainai_url); ?>" class="dropdown-item">
                            <img class="item-avatar" width="90" height="50"
                                src="https://ideas.edu.vn/wp-content/uploads/2026/06/mba_in_ai-optimized.webp"
                                alt="MBA in AI" loading="lazy" decoding="async" />
                            <div class="item-content">
                                <div class="item-title">MBA in AI</div>
                                <div class="item-desc"><?php echo $is_en ? 'MBA Applied AI' : 'Thạc sĩ QTKD Ứng dụng AI'; ?></div>
                            </div>
                        </a>
                    </div>
                    <div class="dropdown-column-divider"></div>
                    <div class="dropdown-column">
                        <div class="dropdown-column-title"><?php echo $is_en ? 'Bachelor' : 'Cử nhân'; ?></div>
                        <a href="<?php echo esc_url($bba_url); ?>" class="dropdown-item">
                            <img class="item-avatar" width="90" height="50" src="https://ideas.edu.vn/wp-content/uploads/2026/02/TOPUP-optimized.webp"
                                alt="Top-up BBA" loading="lazy" decoding="async" />
                            <div class="item-content">
                                <div class="item-title">Top-up BBA</div>
                                <div class="item-desc"><?php echo $is_en ? '12-Month Degree Completion' : 'Liên thông Cử nhân 12 tháng'; ?></div>
                            </div>
                        </a>
                        <a href="<?php echo esc_url($fullbba_url); ?>" class="dropdown-item">
                            <img class="item-avatar" width="90" height="50"
                                src="https://ideas.edu.vn/wp-content/uploads/2026/06/online_bba-optimized.webp"
                                alt="Global Online BBA" loading="lazy" decoding="async" />
                            <div class="item-content">
                                <div class="item-title">Global Online BBA</div>
                                <div class="item-desc"><?php echo $is_en ? 'International BBA' : 'Cử nhân QTKD Quốc tế'; ?></div>
                            </div>
                        </a>
                        <div class="dropdown-column-title" style="margin-top: 16px;"><?php echo $is_en ? 'Doctorate' : 'Tiến sĩ'; ?></div>
                        <a href="<?php echo esc_url($dual_dba_url); ?>" class="dropdown-item">
                            <img class="item-avatar" width="90" height="50" src="https://ideas.edu.vn/wp-content/uploads/2025/10/Dual-DBA-optimized.webp"
                                alt="Dual DBA" loading="lazy" decoding="async" />
                            <div class="item-content">
                                <div class="item-title">Dual DBA</div>
                                <div class="item-desc"><?php echo $is_en ? 'Dual French & UK DBA' : 'Tiến sĩ song bằng Pháp & Anh'; ?></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Dropdown 3: Chính sách / Policies -->
            <div class="nav-dropdown">
                <button type="button" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                    <?php echo $is_en ? 'Policies' : 'Chính sách'; ?>
                    <span class="menu-badge">N</span>
                    <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="dropdown-menu-box simple-dropdown">
                    <a href="<?php echo esc_url($tri_tue_url); ?>" class="dropdown-item-simple">
                        <svg class="svg-icon fa-brain fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M184 0c30.9 0 56 25.1 56 56l0 400c0 30.9-25.1 56-56 56c-28.9 0-52.7-21.9-55.7-50.1c-5.2 1.4-10.7 2.1-16.3 2.1c-35.3 0-64-28.7-64-64c0-7.4 1.3-14.6 3.6-21.2C21.4 367.4 0 338.2 0 304c0-31.9 18.7-59.5 45.8-72.3C37.1 220.8 32 207 32 192c0-30.7 21.6-56.3 50.4-62.6C80.8 123.9 80 118 80 112c0-29.9 20.6-55.1 48.3-62.1C131.3 21.9 155.1 0 184 0zM328 0c28.9 0 52.6 21.9 55.7 49.9c27.8 7 48.3 32.1 48.3 62.1c0 6-.8 11.9-2.4 17.4c28.8 6.2 50.4 31.9 50.4 62.6c0 15-5.1 28.8-13.8 39.7C493.3 244.5 512 272.1 512 304c0 34.2-21.4 63.4-51.6 74.8c2.3 6.6 3.6 13.8 3.6 21.2c0 35.3-28.7 64-64 64c-5.6 0-11.1-.7-16.3-2.1c-3 28.2-26.8 50.1-55.7 50.1c-30.9 0-56-25.1-56-56l0-400c0-30.9 25.1-56 56-56z"/></svg> <span><?php echo $is_en ? 'Shared Intelligence' : 'Trí tuệ song hành'; ?></span>
                        <span class="nav-badge">NEW</span>
                    </a>
                    <a href="<?php echo esc_url($sacombank_url); ?>" class="dropdown-item-simple">
                        <svg class="svg-icon fa-circle-dollar-to-slot fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M326.7 403.7c-22.1 8-45.9 12.3-70.7 12.3s-48.7-4.4-70.7-12.3l-.8-.3c-30-11-56.8-28.7-78.6-51.4C70 314.6 48 263.9 48 208C48 93.1 141.1 0 256 0S464 93.1 464 208c0 55.9-22 106.6-57.9 144c-1 1-2 2.1-3 3.1c-21.4 21.4-47.4 38.1-76.3 48.6zM256 91.9c-11.1 0-20.1 9-20.1 20.1l0 6c-5.6 1.2-10.9 2.9-15.9 5.1c-15 6.8-27.9 19.4-31.1 37.7c-1.8 10.2-.8 20 3.4 29c4.2 8.8 10.7 15 17.3 19.5c11.6 7.9 26.9 12.5 38.6 16l2.2 .7c13.9 4.2 23.4 7.4 29.3 11.7c2.5 1.8 3.4 3.2 3.7 4c.3 .8 .9 2.6 .2 6.7c-.6 3.5-2.5 6.4-8 8.8c-6.1 2.6-16 3.9-28.8 1.9c-6-1-16.7-4.6-26.2-7.9c0 0 0 0 0 0s0 0 0 0s0 0 0 0c-2.2-.7-4.3-1.5-6.4-2.1c-10.5-3.5-21.8 2.2-25.3 12.7s2.2 21.8 12.7 25.3c1.2 .4 2.7 .9 4.4 1.5c7.9 2.7 20.3 6.9 29.8 9.1l0 6.4c0 11.1 9 20.1 20.1 20.1s20.1-9 20.1-20.1l0-5.5c5.3-1 10.5-2.5 15.4-4.6c15.7-6.7 28.4-19.7 31.6-38.7c1.8-10.4 1-20.3-3-29.4c-3.9-9-10.2-15.6-16.9-20.5c-12.2-8.8-28.3-13.7-40.4-17.4l-.8-.2c-14.2-4.3-23.8-7.3-29.9-11.4c-2.6-1.8-3.4-3-3.6-3.5c-.2-.3-.7-1.6-.1-5c.3-1.9 1.9-5.2 8.2-8.1c6.4-2.9 16.4-4.5 28.6-2.6c4.3 .7 17.9 3.3 21.7 4.3c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-4.4-1.2-14.4-3.2-21-4.4l0-6.3c0-11.1-9-20.1-20.1-20.1zM48 352l16 0c19.5 25.9 44 47.7 72.2 64L64 416l0 32 192 0 192 0 0-32-72.2 0c28.2-16.3 52.8-38.1 72.2-64l16 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48z"/></svg> <span><?php echo $is_en ? 'Installment Plan' : 'Trả góp học phí'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($tuition_url); ?>" class="dropdown-item-simple">
                        <svg class="svg-icon fa-file-invoice-dollar fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM64 80c0-8.8 7.2-16 16-16l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L80 96c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16zm128 72c8.8 0 16 7.2 16 16l0 17.3c8.5 1.2 16.7 3.1 24.1 5.1c8.5 2.3 13.6 11 11.3 19.6s-11 13.6-19.6 11.3c-11.1-3-22-5.2-32.1-5.3c-8.4-.1-17.4 1.8-23.6 5.5c-5.7 3.4-8.1 7.3-8.1 12.8c0 3.7 1.3 6.5 7.3 10.1c6.9 4.1 16.6 7.1 29.2 10.9l.5 .1s0 0 0 0s0 0 0 0c11.3 3.4 25.3 7.6 36.3 14.6c12.1 7.6 22.4 19.7 22.7 38.2c.3 19.3-9.6 33.3-22.9 41.6c-7.7 4.8-16.4 7.6-25.1 9.1l0 17.1c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-17.8c-11.2-2.1-21.7-5.7-30.9-8.9c0 0 0 0 0 0c-2.1-.7-4.2-1.4-6.2-2.1c-8.4-2.8-12.9-11.9-10.1-20.2s11.9-12.9 20.2-10.1c2.5 .8 4.8 1.6 7.1 2.4c0 0 0 0 0 0s0 0 0 0s0 0 0 0c13.6 4.6 24.6 8.4 36.3 8.7c9.1 .3 17.9-1.7 23.7-5.3c5.1-3.2 7.9-7.3 7.8-14c-.1-4.6-1.8-7.8-7.7-11.6c-6.8-4.3-16.5-7.4-29-11.2l-1.6-.5s0 0 0 0c-11-3.3-24.3-7.3-34.8-13.7c-12-7.2-22.6-18.9-22.7-37.3c-.1-19.4 10.8-32.8 23.8-40.5c7.5-4.4 15.8-7.2 24.1-8.7l0-17.3c0-8.8 7.2-16 16-16z"/></svg> <span><?php echo $is_en ? 'Tuition & Fees' : 'Các khoản chi phí'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($ambassador_url); ?>" class="dropdown-item-simple">
                        <svg class="svg-icon fa-user-graduate fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439.9 42.7 448 52.6 448 64s-8.1 21.3-19.3 23.5L352 102.9l0 57.1c0 70.7-57.3 128-128 128s-128-57.3-128-128l0-57.1L48 93.3l0 65.1 15.7 78.4c.9 4.7-.3 9.6-3.3 13.3s-7.6 5.9-12.4 5.9l-32 0c-4.8 0-9.3-2.1-12.4-5.9s-4.3-8.6-3.3-13.3L16 158.4l0-71.8C6.5 83.3 0 74.3 0 64C0 52.6 8.1 42.7 19.3 40.5l200-40zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7L30.7 512C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6z"/></svg> <span>IDEAS - Ambassador</span>
                    </a>
                </div>
            </div>

            <!-- Dropdown 4: Bản tin / News -->
            <div class="nav-dropdown">
                <button type="button" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                    <?php echo $is_en ? 'News' : 'Bản tin'; ?>
                    <?php if ($upcoming_aidc_count > 0): ?>
                        <span class="menu-badge"><?php echo $upcoming_aidc_count; ?></span>
                    <?php endif; ?>
                    <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="dropdown-menu-box simple-dropdown">
                    <a href="<?php echo esc_url($news_url); ?>" class="dropdown-item-simple">
                        <svg class="svg-icon fa-newspaper fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 96c0-35.3 28.7-64 64-64l288 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L80 480c-44.2 0-80-35.8-80-80L0 128c0-17.7 14.3-32 32-32s32 14.3 32 32l0 272c0 8.8 7.2 16 16 16s16-7.2 16-16L96 96zm64 24l0 80c0 13.3 10.7 24 24 24l112 0c13.3 0 24-10.7 24-24l0-80c0-13.3-10.7-24-24-24L184 96c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16z"/></svg> <span><?php echo $is_en ? 'News' : 'Bài viết'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($reel_url); ?>" class="dropdown-item-simple">
                        <svg class="svg-icon fa-circle-play fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9l0 176c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z"/></svg> <span>Reel</span>
                    </a>
                    <a href="/kiem-dinh-2" class="dropdown-item-simple">
                        <svg class="svg-icon fa-certificate fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M211 7.3C205 1 196-1.4 187.6 .8s-14.9 8.9-17.1 17.3L154.7 80.6l-62-17.5c-8.4-2.4-17.4 0-23.5 6.1s-8.5 15.1-6.1 23.5l17.5 62L18.1 170.6c-8.4 2.1-15 8.7-17.3 17.1S1 205 7.3 211l46.2 45L7.3 301C1 307-1.4 316 .8 324.4s8.9 14.9 17.3 17.1l62.5 15.8-17.5 62c-2.4 8.4 0 17.4 6.1 23.5s15.1 8.5 23.5 6.1l62-17.5 15.8 62.5c2.1 8.4 8.7 15 17.1 17.3s17.3-.2 23.4-6.4l45-46.2 45 46.2c6.1 6.2 15 8.7 23.4 6.4s14.9-8.9 17.1-17.3l15.8-62.5 62 17.5c8.4 2.4 17.4 0 23.5-6.1s8.5-15.1 6.1-23.5l-17.5-62 62.5-15.8c8.4-2.1 15-8.7 17.3-17.1s-.2-17.4-6.4-23.4l-46.2-45 46.2-45c6.2-6.1 8.7-15 6.4-23.4s-8.9-14.9-17.3-17.1l-62.5-15.8 17.5-62c2.4-8.4 0-17.4-6.1-23.5s-15.1-8.5-23.5-6.1l-62 17.5L341.4 18.1c-2.1-8.4-8.7-15-17.1-17.3S307 1 301 7.3L256 53.5 211 7.3z"/></svg> <span><?php echo $is_en ? 'Accreditation' : 'Kiểm định'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($events_url); ?>#chuyen-di" class="dropdown-item-simple">
                        <svg class="svg-icon fa-plane-departure fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M381 114.9L186.1 41.8c-16.7-6.2-35.2-5.3-51.1 2.7L89.1 67.4C78 73 77.2 88.5 87.6 95.2l146.9 94.5L136 240 77.8 214.1c-8.7-3.9-18.8-3.7-27.3 .6L18.3 230.8c-9.3 4.7-11.8 16.8-5 24.7l73.1 85.3c6.1 7.1 15 11.2 24.3 11.2l137.7 0c5 0 9.9-1.2 14.3-3.4L535.6 212.2c46.5-23.3 82.5-63.3 100.8-112C645.9 75 627.2 48 600.2 48l-57.4 0c-20.2 0-40.2 4.8-58.2 14L381 114.9zM0 480c0 17.7 14.3 32 32 32l576 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L32 448c-17.7 0-32 14.3-32 32z"/></svg> <span><?php echo $is_en ? 'Study Trips' : 'Chuyến đi'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($aidc_url); ?>" class="dropdown-item-simple">
                        <svg class="svg-icon fa-calendar-days fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/></svg>
                        <span><?php echo $is_en ? 'AIDC Events' : 'Sự kiện AIDC'; ?></span>
                        <?php if ($upcoming_aidc_count > 0): ?>
                            <span class="nav-badge"><?php echo $upcoming_aidc_count; ?></span>
                        <?php endif; ?>
                    </a>
                    <a href="<?php echo esc_url($ideas_talk_url); ?>" class="dropdown-item-simple">
                        <svg class="svg-icon fa-globe fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M352 256c0 22.2-1.2 43.6-3.3 64l-185.3 0c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64l185.3 0c2.2 20.4 3.3 41.8 3.3 64zm28.8-64l123.1 0c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64l-123.1 0c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32l-116.7 0c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0l-176.6 0c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0L18.6 160C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192l123.1 0c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64L8.1 320C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6l176.6 0c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352l116.7 0zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6l116.7 0z"/></svg> <span>Webinar</span>
                    </a>
                    <a href="<?php echo esc_url($podcast_url); ?>" class="dropdown-item-simple">
                        <svg class="svg-icon fa-microphone-lines fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 96l0 160c0 53 43 96 96 96s96-43 96-96l-80 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l80 0 0-32-80 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l80 0 0-32-80 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l80 0c0-53-43-96-96-96S96 43 96 96zM320 240l0 16c0 70.7-57.3 128-128 128s-128-57.3-128-128l0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40c0 89.1 66.2 162.7 152 174.4l0 33.6-48 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l72 0 72 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-48 0 0-33.6c85.8-11.7 152-85.3 152-174.4l0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 24z"/></svg> <span>Podcast</span>
                    </a>
                </div>
            </div>

            <div style="display:flex;align-items:center;gap:8px;">
                <!-- Language Switcher Toggle -->
                <div class="lang-switcher-wrapper">
                    <button class="lang-toggle-btn" aria-label="<?php echo $is_en ? 'Select Language' : 'Chọn ngôn ngữ'; ?>" type="button">
                        <?php if ($is_en): ?>
                            <svg class="flag-icon" viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg">
                                <rect width="30" height="20" fill="#ffffff" />
                                <rect width="30" height="1.54" fill="#b22234" />
                                <rect y="3.08" width="30" height="1.54" fill="#b22234" />
                                <rect y="6.16" width="30" height="1.54" fill="#b22234" />
                                <rect y="9.24" width="30" height="1.54" fill="#b22234" />
                                <rect y="12.32" width="30" height="1.54" fill="#b22234" />
                                <rect y="15.4" width="30" height="1.54" fill="#b22234" />
                                <rect y="18.48" width="30" height="1.54" fill="#b22234" />
                                <rect width="12" height="10.78" fill="#3c3b6e" />
                                <circle cx="2" cy="1.8" r="0.45" fill="#ffffff" />
                                <circle cx="6" cy="1.8" r="0.45" fill="#ffffff" />
                                <circle cx="10" cy="1.8" r="0.45" fill="#ffffff" />
                                <circle cx="4" cy="3.6" r="0.45" fill="#ffffff" />
                                <circle cx="8" cy="3.6" r="0.45" fill="#ffffff" />
                                <circle cx="2" cy="5.4" r="0.45" fill="#ffffff" />
                                <circle cx="6" cy="5.4" r="0.45" fill="#ffffff" />
                                <circle cx="10" cy="5.4" r="0.45" fill="#ffffff" />
                                <circle cx="4" cy="7.2" r="0.45" fill="#ffffff" />
                                <circle cx="8" cy="7.2" r="0.45" fill="#ffffff" />
                                <circle cx="2" cy="9" r="0.45" fill="#ffffff" />
                                <circle cx="6" cy="9" r="0.45" fill="#ffffff" />
                                <circle cx="10" cy="9" r="0.45" fill="#ffffff" />
                            </svg>
                            <span>EN</span>
                        <?php else: ?>
                            <svg class="flag-icon" viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg">
                                <rect width="30" height="20" fill="#da251d" />
                                <polygon points="15,4 11.5,14.5 20.5,8 9.5,8 18.5,14.5" fill="#ffff00" />
                            </svg>
                            <span>VI</span>
                        <?php endif; ?>
                        <svg class="chevron-icon" width="10" height="6" viewBox="0 0 10 6" fill="none"
                            stroke="currentColor" stroke-width="2" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5 5L9 1" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <div class="lang-dropdown-menu">
                        <a class="lang-dropdown-item <?php echo !$is_en ? 'active' : ''; ?>" href="<?php echo esc_url(get_language_toggle_url('vi')); ?>">
                            <svg class="flag-icon" viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg">
                                <rect width="30" height="20" fill="#da251d" />
                                <polygon points="15,4 11.5,14.5 20.5,8 9.5,8 18.5,14.5" fill="#ffff00" />
                            </svg>
                            Tiếng Việt
                        </a>
                        <a class="lang-dropdown-item <?php echo $is_en ? 'active' : ''; ?>" href="<?php echo esc_url(get_language_toggle_url('en')); ?>">
                            <svg class="flag-icon" viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg">
                                <rect width="30" height="20" fill="#ffffff" />
                                <rect width="30" height="1.54" fill="#b22234" />
                                <rect y="3.08" width="30" height="1.54" fill="#b22234" />
                                <rect y="6.16" width="30" height="1.54" fill="#b22234" />
                                <rect y="9.24" width="30" height="1.54" fill="#b22234" />
                                <rect y="12.32" width="30" height="1.54" fill="#b22234" />
                                <rect y="15.4" width="30" height="1.54" fill="#b22234" />
                                <rect y="18.48" width="30" height="1.54" fill="#b22234" />
                                <rect width="12" height="10.78" fill="#3c3b6e" />
                                <circle cx="2" cy="1.8" r="0.45" fill="#ffffff" />
                                <circle cx="6" cy="1.8" r="0.45" fill="#ffffff" />
                                <circle cx="10" cy="1.8" r="0.45" fill="#ffffff" />
                                <circle cx="4" cy="3.6" r="0.45" fill="#ffffff" />
                                <circle cx="8" cy="3.6" r="0.45" fill="#ffffff" />
                                <circle cx="2" cy="5.4" r="0.45" fill="#ffffff" />
                                <circle cx="6" cy="5.4" r="0.45" fill="#ffffff" />
                                <circle cx="10" cy="5.4" r="0.45" fill="#ffffff" />
                                <circle cx="4" cy="7.2" r="0.45" fill="#ffffff" />
                                <circle cx="8" cy="7.2" r="0.45" fill="#ffffff" />
                                <circle cx="2" cy="9" r="0.45" fill="#ffffff" />
                                <circle cx="6" cy="9" r="0.45" fill="#ffffff" />
                                <circle cx="10" cy="9" r="0.45" fill="#ffffff" />
                            </svg>
                            English
                        </a>
                    </div>
                </div>
                <div class="lang-divider"></div>

                <button type="button" class="nav-cta" style="cursor: pointer; border: none; font-family: inherit;"
                    onclick="showform('header')"><?php echo $is_en ? 'Apply Now' : 'Nhận tư vấn'; ?></button>
                
                <button class="bk-open-btn" aria-label="<?php echo $is_en ? 'Book a counseling appointment' : 'Mở form đặt lịch tư vấn'; ?>"
                    style="display:inline-flex;align-items:center;gap:6px;padding:10px 20px;background:transparent;color:#ab0e00;border:1.5px solid rgba(171,14,0,0.45);border-radius:100px;font-weight:700;font-size:0.88rem;cursor:pointer;transition:all 0.3s ease;white-space:nowrap;"
                    onmouseover="this.style.background='#ab0e00';this.style.color='#fff';this.style.borderColor='#ab0e00';"
                    onmouseout="this.style.background='transparent';this.style.color='#ab0e00';this.style.borderColor='rgba(171,14,0,0.45)';"
                    type="button">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <?php echo $is_en ? 'Book Meeting' : 'Đặt lịch'; ?>
                </button>
            </div>
        </nav>
        <button class="hamburger" id="hamburger" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>

<div class="mobile-overlay" id="mobile-overlay"></div>
<div class="mobile-menu" id="mobile-menu" aria-hidden="true" data-lenis-prevent>
    <div class="mobile-menu-header">
        <a href="<?php echo esc_url($home_url); ?>" class="mobile-menu-logo" aria-label="<?php echo $is_en ? 'IDEAS Homepage' : 'Trang chủ IDEAS'; ?>">
            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg-optimized.webp"
                alt="Logo IDEAS Education - 15 năm thành lập" width="45" height="45" loading="lazy">
        </a>
        
        <button id="mobile-menu-close" class="mobile-menu-close" aria-label="Đóng menu">
            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                xmlns="http://www.w3.org/2000/svg">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>
    
    <div class="mobile-dropdown">
        <button type="button" class="mobile-dropdown-toggle" aria-expanded="false">
            <?php echo $is_en ? 'About Us' : 'Giới thiệu'; ?>
            <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
        <div class="mobile-dropdown-content">
            <a href="<?php echo esc_url($home_url); ?>" class="mobile-dropdown-item-simple">
                <svg class="svg-icon fa-house fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg> <span><?php echo $is_en ? 'Home' : 'Trang chủ'; ?></span>
            </a>
            <a href="<?php echo esc_url($lms_url); ?>" class="mobile-dropdown-item-simple">
                <svg class="svg-icon fa-layer-group fa-solid" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M264.5 5.2c14.9-6.9 32.1-6.9 47 0l218.6 101c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 149.8C37.4 145.8 32 137.3 32 128s5.4-17.9 13.9-21.8L264.5 5.2zM476.9 209.6l53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 277.8C37.4 273.8 32 265.3 32 256s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0l152-70.2zm-152 198.2l152-70.2 53.2 24.6c8.5 3.9 13.9 12.4 13.9 21.8s-5.4 17.9-13.9 21.8l-218.6 101c-14.9 6.9-32.1 6.9-47 0L45.9 405.8C37.4 401.8 32 393.3 32 384s5.4-17.9 13.9-21.8l53.2-24.6 152 70.2c23.4 10.8 50.4 10.8 73.8 0z"/></svg> <span><?php echo $is_en ? 'LMS Ecosystem' : 'Hệ thống LMS'; ?></span>
            </a>
            <a href="<?php echo esc_url($faculty_url); ?>" class="mobile-dropdown-item-simple">
                <svg class="svg-icon fa-user-graduate fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439.9 42.7 448 52.6 448 64s-8.1 21.3-19.3 23.5L352 102.9l0 57.1c0 70.7-57.3 128-128 128s-128-57.3-128-128l0-57.1L48 93.3l0 65.1 15.7 78.4c.9 4.7-.3 9.6-3.3 13.3s-7.6 5.9-12.4 5.9l-32 0c-4.8 0-9.3-2.1-12.4-5.9s-4.3-8.6-3.3-13.3L16 158.4l0-71.8C6.5 83.3 0 74.3 0 64C0 52.6 8.1 42.7 19.3 40.5l200-40zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7L30.7 512C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6z"/></svg> <span><?php echo $is_en ? 'Faculty Board' : 'Hội đồng chuyên môn'; ?></span>
            </a>
            <a href="<?php echo esc_url($events_url); ?>" class="mobile-dropdown-item-simple">
                <svg class="svg-icon fa-clock fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg> <span><?php echo $is_en ? 'Events' : 'Dòng sự kiện'; ?></span>
            </a>
            <a href="<?php echo esc_url($history_url); ?>" class="mobile-dropdown-item-simple">
                <svg class="svg-icon fa-landmark fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M240.1 4.2c9.8-5.6 21.9-5.6 31.8 0l171.8 98.1L448 104l0 .9 47.9 27.4c12.6 7.2 18.8 22 15.1 36s-16.4 23.8-30.9 23.8L32 192c-14.5 0-27.2-9.8-30.9-23.8s2.5-28.8 15.1-36L64 104.9l0-.9 4.4-1.6L240.1 4.2zM64 224l64 0 0 192 40 0 0-192 64 0 0 192 48 0 0-192 64 0 0 192 40 0 0-192 64 0 0 196.3c.6 .3 1.2 .7 1.8 1.1l48 32c11.7 7.8 17 22.4 12.9 35.9S494.1 512 480 512L32 512c-14.1 0-26.5-9.2-30.6-22.7s1.1-28.1 12.9-35.9l48-32c.6-.4 1.2-.7 1.8-1.1L64 224z"/></svg> <span><?php echo $is_en ? 'History' : 'Lịch sử phát triển'; ?></span>
            </a>
            <a href="<?php echo esc_url($advisors_url); ?>" class="mobile-dropdown-item-simple">
                <svg class="svg-icon fa-user-check fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM625 177L497 305c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L591 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg> <span><?php echo $is_en ? 'Advisors' : 'Tư vấn viên'; ?></span>
            </a>
            <div class="mobile-dropdown-section-title"><?php echo $is_en ? 'Partner University' : 'Trường đối tác'; ?></div>
            <a href="<?php echo esc_url($swiss_umef_url); ?>" class="mobile-dropdown-item-simple">Swiss UMEF</a>
            <a href="https://www.ascencia-business-school.com/en/" target="_blank" class="mobile-dropdown-item-simple">Ascencia Business School</a>
            <a href="https://www.collegedeparis.fr/" target="_blank" class="mobile-dropdown-item-simple">College de Paris</a>
            <a href="https://www.estiam.education/" target="_blank" class="mobile-dropdown-item-simple">Estiam</a>
        </div>
    </div>
    
    <div class="mobile-dropdown expanded expanded-default">
        <button type="button" class="mobile-dropdown-toggle" aria-expanded="true">
            <?php echo $is_en ? 'Programs' : 'Chương trình'; ?>
            <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
        <div class="mobile-dropdown-content active">
            <div class="mobile-dropdown-section">
                <div class="mobile-section-title"><?php echo $is_en ? 'Master' : 'Thạc sĩ'; ?></div>
                <a href="<?php echo esc_url($mba_url); ?>" class="mobile-dropdown-item">
                    <img class="item-avatar" width="90" height="50" src="https://ideas.edu.vn/wp-content/uploads/2025/09/online-mba-1-optimized.webp"
                        alt="Online MBA" loading="lazy" decoding="async" />
                    <div class="item-content">
                        <div class="item-title">Online MBA</div>
                        <div class="item-desc"><?php echo $is_en ? 'Online MBA Degree' : 'Thạc sĩ QTKD Trực tuyến'; ?></div>
                    </div>
                </a>
                <a href="<?php echo esc_url($emba_url); ?>" class="mobile-dropdown-item">
                    <img class="item-avatar" width="90" height="50" src="https://ideas.edu.vn/wp-content/uploads/2025/09/emba-optimized.webp"
                        alt="Executive MBA" loading="lazy" decoding="async" />
                    <div class="item-content">
                        <div class="item-title">Executive MBA</div>
                        <div class="item-desc"><?php echo $is_en ? 'Online Executive MBA' : 'Thạc sĩ điều hành QTKD trực tuyến'; ?></div>
                    </div>
                </a>
                <a href="<?php echo esc_url($mscai_url); ?>" class="mobile-dropdown-item">
                    <img class="item-avatar" width="90" height="50" src="https://ideas.edu.vn/wp-content/uploads/2025/09/mscai-optimized.webp"
                        alt="Master AI" loading="lazy" decoding="async" />
                    <div class="item-content">
                        <div class="item-title">Master AI (MSc AI)</div>
                        <div class="item-desc"><?php echo $is_en ? 'Applied MSc in AI' : 'Thạc sĩ AI ứng dụng'; ?></div>
                    </div>
                </a>
                <a href="<?php echo esc_url($mbainai_url); ?>" class="mobile-dropdown-item">
                    <img class="item-avatar" width="90" height="50" src="https://ideas.edu.vn/wp-content/uploads/2026/06/mba_in_ai-optimized.webp"
                        alt="MBA in AI" loading="lazy" decoding="async" />
                    <div class="item-content">
                        <div class="item-title">MBA in AI</div>
                        <div class="item-desc"><?php echo $is_en ? 'MBA Applied AI' : 'Thạc sĩ QTKD Ứng dụng AI'; ?></div>
                    </div>
                </a>
            </div>
            <div class="mobile-dropdown-section">
                <div class="mobile-section-title"><?php echo $is_en ? 'Bachelor & Doctorate' : 'Cử nhân &amp; Tiến sĩ'; ?></div>
                <a href="<?php echo esc_url($bba_url); ?>" class="mobile-dropdown-item">
                    <img class="item-avatar" width="90" height="50" src="https://ideas.edu.vn/wp-content/uploads/2026/02/TOPUP-optimized.webp"
                        alt="Top-up BBA" loading="lazy" decoding="async" />
                    <div class="item-content">
                        <div class="item-title">Top-up BBA</div>
                        <div class="item-desc"><?php echo $is_en ? '12-Month Completion' : 'Liên thông Cử nhân 12 tháng'; ?></div>
                    </div>
                </a>
                <a href="<?php echo esc_url($fullbba_url); ?>" class="mobile-dropdown-item">
                    <img class="item-avatar" width="90" height="50" src="https://ideas.edu.vn/wp-content/uploads/2026/06/online_bba-optimized.webp"
                        alt="Global Online BBA" loading="lazy" decoding="async" />
                    <div class="item-content">
                        <div class="item-title">Global Online BBA</div>
                        <div class="item-desc"><?php echo $is_en ? 'International BBA' : 'Cử nhân QTKD Quốc tế'; ?></div>
                    </div>
                </a>
                <a href="<?php echo esc_url($dual_dba_url); ?>" class="mobile-dropdown-item">
                    <img class="item-avatar" width="90" height="50" src="https://ideas.edu.vn/wp-content/uploads/2025/10/Dual-DBA-optimized.webp"
                        alt="Dual DBA" loading="lazy" decoding="async" />
                    <div class="item-content">
                        <div class="item-title">Dual DBA</div>
                        <div class="item-desc"><?php echo $is_en ? 'Dual French & UK DBA' : 'Tiến sĩ song bằng Pháp & Anh'; ?></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    
    <div class="mobile-dropdown">
        <button type="button" class="mobile-dropdown-toggle" aria-expanded="false">
            <?php echo $is_en ? 'Policies' : 'Chính sách'; ?>
            <span class="menu-badge">N</span>
            <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
        <div class="mobile-dropdown-content">
            <a href="<?php echo esc_url($tri_tue_url); ?>" class="mobile-dropdown-item-simple">
                <svg class="svg-icon fa-brain fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M184 0c30.9 0 56 25.1 56 56l0 400c0 30.9-25.1 56-56 56c-28.9 0-52.7-21.9-55.7-50.1c-5.2 1.4-10.7 2.1-16.3 2.1c-35.3 0-64-28.7-64-64c0-7.4 1.3-14.6 3.6-21.2C21.4 367.4 0 338.2 0 304c0-31.9 18.7-59.5 45.8-72.3C37.1 220.8 32 207 32 192c0-30.7 21.6-56.3 50.4-62.6C80.8 123.9 80 118 80 112c0-29.9 20.6-55.1 48.3-62.1C131.3 21.9 155.1 0 184 0zM328 0c28.9 0 52.6 21.9 55.7 49.9c27.8 7 48.3 32.1 48.3 62.1c0 6-.8 11.9-2.4 17.4c28.8 6.2 50.4 31.9 50.4 62.6c0 15-5.1 28.8-13.8 39.7C493.3 244.5 512 272.1 512 304c0 34.2-21.4 63.4-51.6 74.8c2.3 6.6 3.6 13.8 3.6 21.2c0 35.3-28.7 64-64 64c-5.6 0-11.1-.7-16.3-2.1c-3 28.2-26.8 50.1-55.7 50.1c-30.9 0-56-25.1-56-56l0-400c0-30.9 25.1-56 56-56z"/></svg> <span><?php echo $is_en ? 'Shared Intelligence' : 'Trí tuệ song hành'; ?></span>
                <span class="nav-badge">NEW</span>
            </a>
            <a href="<?php echo esc_url($sacombank_url); ?>" class="mobile-dropdown-item-simple">
                <svg class="svg-icon fa-circle-dollar-to-slot fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M326.7 403.7c-22.1 8-45.9 12.3-70.7 12.3s-48.7-4.4-70.7-12.3l-.8-.3c-30-11-56.8-28.7-78.6-51.4C70 314.6 48 263.9 48 208C48 93.1 141.1 0 256 0S464 93.1 464 208c0 55.9-22 106.6-57.9 144c-1 1-2 2.1-3 3.1c-21.4 21.4-47.4 38.1-76.3 48.6zM256 91.9c-11.1 0-20.1 9-20.1 20.1l0 6c-5.6 1.2-10.9 2.9-15.9 5.1c-15 6.8-27.9 19.4-31.1 37.7c-1.8 10.2-.8 20 3.4 29c4.2 8.8 10.7 15 17.3 19.5c11.6 7.9 26.9 12.5 38.6 16l2.2 .7c13.9 4.2 23.4 7.4 29.3 11.7c2.5 1.8 3.4 3.2 3.7 4c.3 .8 .9 2.6 .2 6.7c-.6 3.5-2.5 6.4-8 8.8c-6.1 2.6-16 3.9-28.8 1.9c-6-1-16.7-4.6-26.2-7.9c0 0 0 0 0 0s0 0 0 0s0 0 0 0c-2.2-.7-4.3-1.5-6.4-2.1c-10.5-3.5-21.8 2.2-25.3 12.7s2.2 21.8 12.7 25.3c1.2 .4 2.7 .9 4.4 1.5c7.9 2.7 20.3 6.9 29.8 9.1l0 6.4c0 11.1 9 20.1 20.1 20.1s20.1-9 20.1-20.1l0-5.5c5.3-1 10.5-2.5 15.4-4.6c15.7-6.7 28.4-19.7 31.6-38.7c1.8-10.4 1-20.3-3-29.4c-3.9-9-10.2-15.6-16.9-20.5c-12.2-8.8-28.3-13.7-40.4-17.4l-.8-.2c-14.2-4.3-23.8-7.3-29.9-11.4c-2.6-1.8-3.4-3-3.6-3.5c-.2-.3-.7-1.6-.1-5c.3-1.9 1.9-5.2 8.2-8.1c6.4-2.9 16.4-4.5 28.6-2.6c4.3 .7 17.9 3.3 21.7 4.3c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-4.4-1.2-14.4-3.2-21-4.4l0-6.3c0-11.1-9-20.1-20.1-20.1zM48 352l16 0c19.5 25.9 44 47.7 72.2 64L64 416l0 32 192 0 192 0 0-32-72.2 0c28.2-16.3 52.8-38.1 72.2-64l16 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48l0-64c0-26.5 21.5-48 48-48z"/></svg> <span><?php echo $is_en ? 'Installment Plan' : 'Trả góp học phí'; ?></span>
            </a>
            <a href="<?php echo esc_url($tuition_url); ?>" class="mobile-dropdown-item-simple">
                <svg class="svg-icon fa-file-invoice-dollar fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM64 80c0-8.8 7.2-16 16-16l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L80 96c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16zm128 72c8.8 0 16 7.2 16 16l0 17.3c8.5 1.2 16.7 3.1 24.1 5.1c8.5 2.3 13.6 11 11.3 19.6s-11 13.6-19.6 11.3c-11.1-3-22-5.2-32.1-5.3c-8.4-.1-17.4 1.8-23.6 5.5c-5.7 3.4-8.1 7.3-8.1 12.8c0 3.7 1.3 6.5 7.3 10.1c6.9 4.1 16.6 7.1 29.2 10.9l.5 .1s0 0 0 0s0 0 0 0c11.3 3.4 25.3 7.6 36.3 14.6c12.1 7.6 22.4 19.7 22.7 38.2c.3 19.3-9.6 33.3-22.9 41.6c-7.7 4.8-16.4 7.6-25.1 9.1l0 17.1c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-17.8c-11.2-2.1-21.7-5.7-30.9-8.9c0 0 0 0 0 0c-2.1-.7-4.2-1.4-6.2-2.1c-8.4-2.8-12.9-11.9-10.1-20.2s11.9-12.9 20.2-10.1c2.5 .8 4.8 1.6 7.1 2.4c0 0 0 0 0 0s0 0 0 0s0 0 0 0c13.6 4.6 24.6 8.4 36.3 8.7c9.1 .3 17.9-1.7 23.7-5.3c5.1-3.2 7.9-7.3 7.8-14c-.1-4.6-1.8-7.8-7.7-11.6c-6.8-4.3-16.5-7.4-29-11.2l-1.6-.5s0 0 0 0c-11-3.3-24.3-7.3-34.8-13.7c-12-7.2-22.6-18.9-22.7-37.3c-.1-19.4 10.8-32.8 23.8-40.5c7.5-4.4 15.8-7.2 24.1-8.7l0-17.3c0-8.8 7.2-16 16-16z"/></svg> <span><?php echo $is_en ? 'Tuition & Fees' : 'Các khoản chi phí'; ?></span>
            </a>
            <a href="<?php echo esc_url($ambassador_url); ?>" class="mobile-dropdown-item-simple">
                <svg class="svg-icon fa-user-graduate fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439.9 42.7 448 52.6 448 64s-8.1 21.3-19.3 23.5L352 102.9l0 57.1c0 70.7-57.3 128-128 128s-128-57.3-128-128l0-57.1L48 93.3l0 65.1 15.7 78.4c.9 4.7-.3 9.6-3.3 13.3s-7.6 5.9-12.4 5.9l-32 0c-4.8 0-9.3-2.1-12.4-5.9s-4.3-8.6-3.3-13.3L16 158.4l0-71.8C6.5 83.3 0 74.3 0 64C0 52.6 8.1 42.7 19.3 40.5l200-40zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7L30.7 512C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6z"/></svg> <span>IDEAS - Ambassador</span>
            </a>
        </div>
    </div>
    
    <div class="mobile-dropdown">
        <button type="button" class="mobile-dropdown-toggle" aria-expanded="false">
            <?php echo $is_en ? 'News' : 'Bản tin'; ?>
            <?php if ($upcoming_aidc_count > 0): ?>
                <span class="menu-badge"><?php echo $upcoming_aidc_count; ?></span>
            <?php endif; ?>
            <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
        <div class="mobile-dropdown-content">
            <a href="<?php echo esc_url($news_url); ?>" class="mobile-dropdown-item-simple">
                <svg class="svg-icon fa-newspaper fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 96c0-35.3 28.7-64 64-64l288 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L80 480c-44.2 0-80-35.8-80-80L0 128c0-17.7 14.3-32 32-32s32 14.3 32 32l0 272c0 8.8 7.2 16 16 16s16-7.2 16-16L96 96zm64 24l0 80c0 13.3 10.7 24 24 24l112 0c13.3 0 24-10.7 24-24l0-80c0-13.3-10.7-24-24-24L184 96c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16z"/></svg> <span><?php echo $is_en ? 'News' : 'Bài viết'; ?></span>
            </a>
            <a href="<?php echo esc_url($reel_url); ?>" class="mobile-dropdown-item-simple">
                <svg class="svg-icon fa-circle-play fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9l0 176c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z"/></svg> <span>Reel</span>
            </a>
            <a href="/kiem-dinh-2" class="mobile-dropdown-item-simple">
                <svg class="svg-icon fa-certificate fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M211 7.3C205 1 196-1.4 187.6 .8s-14.9 8.9-17.1 17.3L154.7 80.6l-62-17.5c-8.4-2.4-17.4 0-23.5 6.1s-8.5 15.1-6.1 23.5l17.5 62L18.1 170.6c-8.4 2.1-15 8.7-17.3 17.1S1 205 7.3 211l46.2 45L7.3 301C1 307-1.4 316 .8 324.4s8.9 14.9 17.3 17.1l62.5 15.8-17.5 62c-2.4 8.4 0 17.4 6.1 23.5s15.1 8.5 23.5 6.1l62-17.5 15.8 62.5c2.1 8.4 8.7 15 17.1 17.3s17.3-.2 23.4-6.4l45-46.2 45 46.2c6.1 6.2 15 8.7 23.4 6.4s14.9-8.9 17.1-17.3l15.8-62.5 62 17.5c8.4 2.4 17.4 0 23.5-6.1s8.5-15.1 6.1-23.5l-17.5-62 62.5-15.8c8.4-2.1 15-8.7 17.3-17.1s-.2-17.4-6.4-23.4l-46.2-45 46.2-45c6.2-6.1 8.7-15 6.4-23.4s-8.9-14.9-17.3-17.1l-62.5-15.8 17.5-62c2.4-8.4 0-17.4-6.1-23.5s-15.1-8.5-23.5-6.1l-62 17.5L341.4 18.1c-2.1-8.4-8.7-15-17.1-17.3S307 1 301 7.3L256 53.5 211 7.3z"/></svg> <span><?php echo $is_en ? 'Accreditation' : 'Kiểm định'; ?></span>
            </a>
            <a href="<?php echo esc_url($events_url); ?>#chuyen-di" class="mobile-dropdown-item-simple">
                <svg class="svg-icon fa-plane-departure fa-solid" viewBox="0 0 640 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M381 114.9L186.1 41.8c-16.7-6.2-35.2-5.3-51.1 2.7L89.1 67.4C78 73 77.2 88.5 87.6 95.2l146.9 94.5L136 240 77.8 214.1c-8.7-3.9-18.8-3.7-27.3 .6L18.3 230.8c-9.3 4.7-11.8 16.8-5 24.7l73.1 85.3c6.1 7.1 15 11.2 24.3 11.2l137.7 0c5 0 9.9-1.2 14.3-3.4L535.6 212.2c46.5-23.3 82.5-63.3 100.8-112C645.9 75 627.2 48 600.2 48l-57.4 0c-20.2 0-40.2 4.8-58.2 14L381 114.9zM0 480c0 17.7 14.3 32 32 32l576 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L32 448c-17.7 0-32 14.3-32 32z"/></svg> <span><?php echo $is_en ? 'Study Trips' : 'Chuyến đi'; ?></span>
            </a>
            <a href="<?php echo esc_url($aidc_url); ?>" class="mobile-dropdown-item-simple">
                <svg class="svg-icon fa-calendar-days fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/></svg>
                <span><?php echo $is_en ? 'AIDC Events' : 'Sự kiện AIDC'; ?></span>
                <?php if ($upcoming_aidc_count > 0): ?>
                    <span class="nav-badge"><?php echo $upcoming_aidc_count; ?></span>
                <?php endif; ?>
            </a>
            <a href="<?php echo esc_url($ideas_talk_url); ?>" class="mobile-dropdown-item-simple">
                <svg class="svg-icon fa-globe fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M352 256c0 22.2-1.2 43.6-3.3 64l-185.3 0c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64l185.3 0c2.2 20.4 3.3 41.8 3.3 64zm28.8-64l123.1 0c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64l-123.1 0c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32l-116.7 0c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0l-176.6 0c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0L18.6 160C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192l123.1 0c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64L8.1 320C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6l176.6 0c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352l116.7 0zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6l116.7 0z"/></svg> <span>Webinar</span>
            </a>
            <a href="<?php echo esc_url($podcast_url); ?>" class="mobile-dropdown-item-simple">
                <svg class="svg-icon fa-microphone-lines fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M96 96l0 160c0 53 43 96 96 96s96-43 96-96l-80 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l80 0 0-32-80 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l80 0 0-32-80 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l80 0c0-53-43-96-96-96S96 43 96 96zM320 240l0 16c0 70.7-57.3 128-128 128s-128-57.3-128-128l0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40c0 89.1 66.2 162.7 152 174.4l0 33.6-48 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l72 0 72 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-48 0 0-33.6c85.8-11.7 152-85.3 152-174.4l0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 24z"/></svg> <span>Podcast</span>
            </a>
        </div>
    </div>
    
    <div style="padding:20px; margin-top:20px; width: 100%; box-sizing: border-box;">
        <button type="button" class="nav-cta"
            style="display:block; text-align:center; width:100%; cursor: pointer; border: none; font-family: inherit;"
            onclick="showform('header_mb')"><?php echo $is_en ? 'Apply Now' : 'Nhận tư vấn'; ?></button>
    </div>
    
    <div class="mobile-lang-selector">
        <div class="mobile-lang-title">Ngôn ngữ / Language</div>
        <div class="mobile-lang-options">
            <a class="mobile-lang-btn <?php echo !$is_en ? 'active' : ''; ?>" href="<?php echo esc_url(get_language_toggle_url('vi')); ?>">
                <svg class="flag-icon" viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg">
                    <rect width="30" height="20" fill="#da251d" />
                    <polygon points="15,4 11.5,14.5 20.5,8 9.5,8 18.5,14.5" fill="#ffff00" />
                </svg>
                Tiếng Việt
            </a>
            <a class="mobile-lang-btn <?php echo $is_en ? 'active' : ''; ?>" href="<?php echo esc_url(get_language_toggle_url('en')); ?>">
                <svg class="flag-icon" viewBox="0 0 30 20" xmlns="http://www.w3.org/2000/svg">
                    <rect width="30" height="20" fill="#ffffff" />
                    <rect width="30" height="1.54" fill="#b22234" />
                    <rect y="3.08" width="30" height="1.54" fill="#b22234" />
                    <rect y="6.16" width="30" height="1.54" fill="#b22234" />
                    <rect y="9.24" width="30" height="1.54" fill="#b22234" />
                    <rect y="12.32" width="30" height="1.54" fill="#b22234" />
                    <rect y="15.4" width="30" height="1.54" fill="#b22234" />
                    <rect y="18.48" width="30" height="1.54" fill="#b22234" />
                    <rect width="12" height="10.78" fill="#3c3b6e" />
                    <circle cx="2" cy="1.8" r="0.45" fill="#ffffff" />
                    <circle cx="6" cy="1.8" r="0.45" fill="#ffffff" />
                    <circle cx="10" cy="1.8" r="0.45" fill="#ffffff" />
                    <circle cx="4" cy="3.6" r="0.45" fill="#ffffff" />
                    <circle cx="8" cy="3.6" r="0.45" fill="#ffffff" />
                    <circle cx="2" cy="5.4" r="0.45" fill="#ffffff" />
                    <circle cx="6" cy="5.4" r="0.45" fill="#ffffff" />
                    <circle cx="10" cy="5.4" r="0.45" fill="#ffffff" />
                    <circle cx="4" cy="7.2" r="0.45" fill="#ffffff" />
                    <circle cx="8" cy="7.2" r="0.45" fill="#ffffff" />
                    <circle cx="2" cy="9" r="0.45" fill="#ffffff" />
                    <circle cx="6" cy="9" r="0.45" fill="#ffffff" />
                    <circle cx="10" cy="9" r="0.45" fill="#ffffff" />
                </svg>
                English
            </a>
        </div>
    </div>
</div>

<!-- Toggle & Fallback scripts -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileOverlay = document.getElementById('mobile-overlay');
        const closeBtn = document.getElementById('mobile-menu-close');

        if (hamburger && mobileMenu && mobileOverlay) {
            function openMenu() {
                mobileMenu.classList.add('active');
                mobileOverlay.classList.add('active');
                mobileMenu.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';
            }

            function closeMenu() {
                mobileMenu.classList.remove('active');
                mobileOverlay.classList.remove('active');
                mobileMenu.setAttribute('aria-hidden', 'true');
                document.body.style.overflow = '';
            }

            hamburger.addEventListener('click', openMenu);
            closeBtn?.addEventListener('click', closeMenu);
            mobileOverlay.addEventListener('click', closeMenu);
        }

        // Mobile dropdown toggle
        const toggles = document.querySelectorAll('.mobile-dropdown-toggle');
        toggles.forEach(toggle => {
            toggle.addEventListener('click', function () {
                const menu = this.nextElementSibling;
                const isOpen = this.getAttribute('aria-expanded') === 'true';

                this.setAttribute('aria-expanded', !isOpen);
                if (menu) {
                    menu.classList.toggle('active');
                }
            });
        });
    });

    if (typeof window.showform !== 'function') {
        window.showform = function (ctaSource = 'header') {
            if (typeof window.openRegModal === 'function') {
                window.openRegModal(ctaSource);
            } else {
                const regModal = document.getElementById('reg-modal');
                if (regModal) {
                    regModal.style.display = 'flex';
                    setTimeout(function () {
                        regModal.classList.add('open');
                        regModal.setAttribute('aria-hidden', 'false');
                    }, 10);
                }
            }
        };
    }
</script>