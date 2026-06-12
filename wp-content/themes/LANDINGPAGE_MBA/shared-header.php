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
                        <i class="fa-solid fa-house"></i> <span><?php echo $is_en ? 'Home' : 'Trang chủ'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($lms_url); ?>" class="dropdown-item-simple">
                        <i class="fa-solid fa-layer-group"></i> <span><?php echo $is_en ? 'LMS Ecosystem' : 'Hệ thống LMS'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($faculty_url); ?>" class="dropdown-item-simple">
                        <i class="fa-solid fa-user-graduate"></i> <span><?php echo $is_en ? 'Faculty Board' : 'Hội đồng chuyên môn'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($events_url); ?>" class="dropdown-item-simple">
                        <i class="fa-solid fa-clock"></i> <span><?php echo $is_en ? 'Events' : 'Dòng sự kiện'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($history_url); ?>" class="dropdown-item-simple">
                        <i class="fa-solid fa-landmark"></i> <span><?php echo $is_en ? 'History' : 'Lịch sử phát triển'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($advisors_url); ?>" class="dropdown-item-simple">
                        <i class="fa-solid fa-user-check"></i> <span><?php echo $is_en ? 'Advisors' : 'Tư vấn viên'; ?></span>
                    </a>
                    <div class="dropdown-divider-simple"></div>
                    <a href="<?php echo esc_url($swiss_umef_url); ?>" class="dropdown-item-simple">
                        <i class="fa-solid fa-school"></i> <span>Swiss UMEF</span>
                    </a>
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
                    <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="dropdown-menu-box simple-dropdown">
                    <a href="<?php echo esc_url($sacombank_url); ?>" class="dropdown-item-simple">
                        <i class="fa-solid fa-circle-dollar-to-slot"></i> <span><?php echo $is_en ? 'Installment Plan' : 'Trả góp học phí'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($tuition_url); ?>" class="dropdown-item-simple">
                        <i class="fa-solid fa-file-invoice-dollar"></i> <span><?php echo $is_en ? 'Tuition & Fees' : 'Các khoản chi phí'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($ambassador_url); ?>" class="dropdown-item-simple">
                        <i class="fa-solid fa-user-graduate"></i> <span>IDEAS - Ambassador</span>
                    </a>
                </div>
            </div>

            <!-- Dropdown 4: Bản tin / News -->
            <div class="nav-dropdown">
                <button type="button" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                    <?php echo $is_en ? 'News' : 'Bản tin'; ?>
                    <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="dropdown-menu-box simple-dropdown">
                    <a href="<?php echo esc_url($news_url); ?>" class="dropdown-item-simple">
                        <i class="fa-solid fa-newspaper"></i> <span><?php echo $is_en ? 'News' : 'Bài viết'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($reel_url); ?>" class="dropdown-item-simple">
                        <i class="fa-solid fa-circle-play"></i> <span>IDEAS Reel</span>
                    </a>
                    <a href="/kiem-dinh-2" class="dropdown-item-simple">
                        <i class="fa-solid fa-certificate"></i> <span><?php echo $is_en ? 'Accreditation' : 'Kiểm định'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($events_url); ?>#chuyen-di" class="dropdown-item-simple">
                        <i class="fa-solid fa-plane-departure"></i> <span><?php echo $is_en ? 'Study Trips' : 'Chuyến đi'; ?></span>
                    </a>
                    <a href="<?php echo esc_url($ideas_talk_url); ?>" class="dropdown-item-simple">
                        <i class="fa-solid fa-globe"></i> <span>Webinar</span>
                    </a>
                    <a href="<?php echo esc_url($podcast_url); ?>" class="dropdown-item-simple">
                        <i class="fa-solid fa-microphone-lines"></i> <span>Podcast</span>
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
                <i class="fa-solid fa-house"></i> <span><?php echo $is_en ? 'Home' : 'Trang chủ'; ?></span>
            </a>
            <a href="<?php echo esc_url($lms_url); ?>" class="mobile-dropdown-item-simple">
                <i class="fa-solid fa-layer-group"></i> <span><?php echo $is_en ? 'LMS Ecosystem' : 'Hệ thống LMS'; ?></span>
            </a>
            <a href="<?php echo esc_url($faculty_url); ?>" class="mobile-dropdown-item-simple">
                <i class="fa-solid fa-user-graduate"></i> <span><?php echo $is_en ? 'Faculty Board' : 'Hội đồng chuyên môn'; ?></span>
            </a>
            <a href="<?php echo esc_url($events_url); ?>" class="mobile-dropdown-item-simple">
                <i class="fa-solid fa-clock"></i> <span><?php echo $is_en ? 'Events' : 'Dòng sự kiện'; ?></span>
            </a>
            <a href="<?php echo esc_url($history_url); ?>" class="mobile-dropdown-item-simple">
                <i class="fa-solid fa-landmark"></i> <span><?php echo $is_en ? 'History' : 'Lịch sử phát triển'; ?></span>
            </a>
            <a href="<?php echo esc_url($advisors_url); ?>" class="mobile-dropdown-item-simple">
                <i class="fa-solid fa-user-check"></i> <span><?php echo $is_en ? 'Advisors' : 'Tư vấn viên'; ?></span>
            </a>
            <div class="mobile-dropdown-section-title"><?php echo $is_en ? 'Partner University' : 'Trường đối tác'; ?></div>
            <a href="<?php echo esc_url($swiss_umef_url); ?>" class="mobile-dropdown-item-simple">Swiss UMEF</a>
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
            <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
        <div class="mobile-dropdown-content">
            <a href="<?php echo esc_url($sacombank_url); ?>" class="mobile-dropdown-item-simple">
                <i class="fa-solid fa-circle-dollar-to-slot"></i> <span><?php echo $is_en ? 'Installment Plan' : 'Trả góp học phí'; ?></span>
            </a>
            <a href="<?php echo esc_url($tuition_url); ?>" class="mobile-dropdown-item-simple">
                <i class="fa-solid fa-file-invoice-dollar"></i> <span><?php echo $is_en ? 'Tuition & Fees' : 'Các khoản chi phí'; ?></span>
            </a>
            <a href="<?php echo esc_url($ambassador_url); ?>" class="mobile-dropdown-item-simple">
                <i class="fa-solid fa-user-graduate"></i> <span>IDEAS - Ambassador</span>
            </a>
        </div>
    </div>
    
    <div class="mobile-dropdown">
        <button type="button" class="mobile-dropdown-toggle" aria-expanded="false">
            <?php echo $is_en ? 'News' : 'Bản tin'; ?>
            <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
        <div class="mobile-dropdown-content">
            <a href="<?php echo esc_url($news_url); ?>" class="mobile-dropdown-item-simple">
                <i class="fa-solid fa-newspaper"></i> <span><?php echo $is_en ? 'News' : 'Bài viết'; ?></span>
            </a>
            <a href="<?php echo esc_url($reel_url); ?>" class="mobile-dropdown-item-simple">
                <i class="fa-solid fa-circle-play"></i> <span>IDEAS Reel</span>
            </a>
            <a href="/kiem-dinh-2" class="mobile-dropdown-item-simple">
                <i class="fa-solid fa-certificate"></i> <span><?php echo $is_en ? 'Accreditation' : 'Kiểm định'; ?></span>
            </a>
            <a href="<?php echo esc_url($events_url); ?>#chuyen-di" class="mobile-dropdown-item-simple">
                <i class="fa-solid fa-plane-departure"></i> <span><?php echo $is_en ? 'Study Trips' : 'Chuyến đi'; ?></span>
            </a>
            <a href="<?php echo esc_url($ideas_talk_url); ?>" class="mobile-dropdown-item-simple">
                <i class="fa-solid fa-globe"></i> <span>Webinar</span>
            </a>
            <a href="<?php echo esc_url($podcast_url); ?>" class="mobile-dropdown-item-simple">
                <i class="fa-solid fa-microphone-lines"></i> <span>Podcast</span>
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