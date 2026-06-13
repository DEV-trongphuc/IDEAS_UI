<?php
/**
 * The template for displaying the Reels page
 * Template Name: Immersive Reels Template
 */
$is_en = (isset($_GET['lang']) && $_GET['lang'] === 'en');

$reels = [
    [
        'id' => 'FMJ-j-bzn4A',
        'title' => $is_en ? 'Top-up BBA (12 months)' : 'Cử nhân Liên thông 12 tháng (BBA Top-up)',
        'desc' => $is_en ? 'International standard Bachelor degree from Swiss UMEF Switzerland.' : 'Chương trình Cử nhân Liên thông Quản trị Kinh doanh cấp bằng từ Swiss UMEF Thụy Sĩ. Nhận bằng chính quy chuẩn quốc tế.',
        'cover' => 'https://ideas.edu.vn/wp-content/uploads/2026/06/ltnumef10202501.webp'
    ],
    [
        'id' => 'rXWWEC2LJJM',
        'title' => $is_en ? 'Master of Business Administration (MBA / EMBA)' : 'Thạc sĩ Quản trị Kinh doanh (MBA/EMBA/MBA in AI)',
        'desc' => $is_en ? 'Transform leadership mindset & expand network with Swiss standard MBA at IDEAS.' : 'Bứt phá tư duy quản trị & mở rộng mạng lưới quan hệ với chương trình MBA chuẩn Thụy Sĩ tại IDEAS.',
        'cover' => 'https://ideas.edu.vn/wp-content/uploads/2025/11/DSCF6777.webp'
    ],
    [
        'id' => 'tfSh3cVhvR8',
        'title' => $is_en ? 'Sacombank Financial Support' : 'Hỗ trợ tài chính Sacombank',
        'desc' => $is_en ? 'Scholarships & 0% interest tuition installment support via Sacombank.' : 'Học bổng & Hỗ trợ học phí trả góp 0% lãi suất thông qua ngân hàng Sacombank.',
        'cover' => 'https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp'
    ],
    [
        'id' => 'GPyTkgHtU-0',
        'title' => $is_en ? 'About IDEAS Institute' : 'Giới thiệu Viện IDEAS',
        'desc' => $is_en ? 'Discover the learning environment and global career development opportunities with IDEAS Institute.' : 'Khám phá môi trường học tập và cơ hội phát triển sự nghiệp toàn cầu cùng Viện IDEAS.',
        'cover' => 'https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp'
    ],
    [
        'id' => 'iIrS_71MFk4',
        'title' => $is_en ? 'Learning Experience at IDEAS' : 'Trải nghiệm học tập tại IDEAS',
        'desc' => $is_en ? 'Student feedback on the training quality and modern learning methods.' : 'Cảm nhận thực tế của học viên về chất lượng đào tạo và phương pháp học tập hiện đại.',
        'cover' => 'https://ideas.edu.vn/wp-content/uploads/2025/03/workshopAI.webp'
    ],
    [
        'id' => 'K6yEPI_t2Xk',
        'title' => $is_en ? 'Because a career doesn\'t stop at "fine"' : 'Vì sự nghiệp không dừng lại ở “ổn”',
        'desc' => $is_en ? 'Break your limits, elevate your knowledge, and expand your career opportunities with IDEAS.' : 'Bứt phá giới hạn bản thân, nâng tầm tri thức và mở rộng cơ hội thăng tiến cùng Viện IDEAS.',
        'cover' => 'https://i.ytimg.com/vi/K6yEPI_t2Xk/hqdefault.jpg'
    ]
];
?>
<!DOCTYPE html>
<html lang="<?php echo $is_en ? 'en' : 'vi'; ?>" prefix="og: https://ogp.me/ns#">
<head>
    <?php get_template_part('shared-head'); ?>

    <?php if (!defined('WPSEO_VERSION') && !class_exists('RankMath') && !class_exists('AIOSEO_Base')): ?>
        <title><?php echo $is_en ? 'Explore IDEAS Reel Counseling | IDEAS' : 'Khám phá IDEAS Reel Tư vấn | IDEAS'; ?></title>
        <meta name="description" content="<?php echo $is_en ? 'Watch short highlight videos about programs, student activities and counselor roadmaps at IDEAS.' : 'Xem ngay các thước phim ngắn chia sẻ thực tế của học viên, cựu học viên và chuyên gia học thuật tại IDEAS.'; ?>" />
    <?php endif; ?>

    <style>
        /* ══════════════════════════════════════
           IMMERSIVE REEL PAGE – APP VIEW
           ══════════════════════════════════════ */
        html, body {
            margin: 0 !important;
            padding: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            overflow: hidden !important;
            background-color: #080203 !important;
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif !important;
        }

        /* Hide global scrollbar for this page */
        *::-webkit-scrollbar,
        html::-webkit-scrollbar,
        body::-webkit-scrollbar,
        .reel-container::-webkit-scrollbar {
            display: none !important;
            width: 0 !important;
            height: 0 !important;
        }
        
        * {
            scrollbar-width: none !important;
            -ms-overflow-style: none !important;
        }



        /* Hide standard theme wrapper components */
        header, footer, .site-header, .site-footer, #site-header, #site-footer, .header_menu_area, .footer_area {
            display: none !important;
        }

        /* Cinematic blurred background */
        .reel-page-bg {
            position: fixed;
            inset: 0;
            z-index: 1;
            background-image: url('https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp-optimized.webp');
            background-size: cover;
            background-position: center;
            filter: blur(30px) brightness(0.2) contrast(1.1);
            transform: scale(1.15); /* Prevent white border from blur */
            pointer-events: none;
        }

        .reel-page-overlay {
            position: fixed;
            inset: 0;
            z-index: 2;
            background: radial-gradient(circle at 50% 50%, rgba(171, 14, 0, 0.45) 0%, rgba(8, 2, 3, 0.95) 85%);
            pointer-events: none;
        }

        /* Minimal floating back button */
        .reel-back-btn {
            position: fixed;
            top: 24px;
            left: 24px;
            z-index: 100;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .reel-back-btn:hover {
            background: rgba(171, 14, 0, 0.85);
            border-color: rgba(171, 14, 0, 0.95);
            transform: scale(1.08) translateX(-2px);
            box-shadow: 0 8px 30px rgba(171, 14, 0, 0.4);
        }

        .reel-back-btn i {
            font-size: 18px;
            transition: transform 0.2s;
        }

        /* Centralized Phone Frame */
        .reel-app-frame {
            position: relative;
            z-index: 10;
            width: 100%;
            height: 100vh;
            max-width: 420px;
            max-height: 800px;
            margin: 0 auto;
            background: #000;
            box-shadow: 0 30px 70px rgba(0, 0, 0, 0.8), 0 0 0 12px rgba(255, 255, 255, 0.03);
            border-radius: 36px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            top: 50%;
            transform: translateY(-50%);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* Scroll Snapping Container */
        .reel-container {
            width: 100%;
            height: 100%;
            overflow-y: scroll;
            scroll-snap-type: y mandatory;
            scroll-behavior: smooth;
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none;  /* IE and Edge */
        }

        .reel-container::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera */
        }

        .reel-slide {
            width: 100%;
            height: 100%;
            scroll-snap-align: start;
            scroll-snap-stop: always;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #000;
        }

        .fb-reel-wrapper {
            width: 100%;
            height: calc(100% - 130px) !important;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2;
            transform: translateY(-40px);
        }

        .reel-video-loading {
            position: absolute;
            z-index: 1;
            color: #ab0e00;
            font-size: 32px;
        }

        /* Bottom Details Overlay */
        .reel-info-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 20px 24px calc(env(safe-area-inset-bottom) + 24px);
            background: linear-gradient(0deg, rgba(0,0,0,0.4) 0%, transparent 100%);
            z-index: 15;
            color: #fff;
            box-sizing: border-box;
            pointer-events: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
            text-align: left !important;
        }

        .reel-info-cta {
            pointer-events: all !important;
        }

        .reel-info-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            background: rgba(171, 14, 0, 0.25);
            border: 1px solid rgba(171, 14, 0, 0.4);
            border-radius: 100px;
            font-size: 0.7rem;
            font-weight: 800;
            color: #ff9e9e;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            width: fit-content;
        }

        .reel-info-tag i {
            animation: pulsePlay 1.5s infinite;
        }

        .reel-info-overlay h3 {
            font-size: 1.15rem;
            font-weight: 800;
            margin: 0;
            line-height: 1.35;
            color: #fff !important;
        }

        .reel-info-overlay p {
            font-size: 0.85rem;
            color: #d1d5db !important;
            margin: 0;
            line-height: 1.45;
        }

        .reel-info-cta {
            background: linear-gradient(135deg, #ab0e00, #ff3600) !important;
            color: #fff !important;
            border: none !important;
            border-radius: 12px !important;
            padding: 12px 24px !important;
            font-weight: 700 !important;
            font-size: 0.85rem !important;
            width: 100% !important;
            cursor: pointer !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 8px !important;
            transition: all 0.3s !important;
            box-shadow: 0 8px 24px rgba(171, 14, 0, 0.4) !important;
            text-decoration: none !important;
        }

        .reel-info-cta:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 12px 30px rgba(171, 14, 0, 0.6) !important;
        }

        .reel-info-cta i {
            font-size: 10px;
            transition: transform 0.2s;
        }

        .reel-info-cta:hover i {
            transform: translateX(3px);
        }

        /* Floating Nav Arrows */
        .reel-nav-arrow {
            position: absolute;
            right: -60px;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            cursor: pointer;
            z-index: 20;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .reel-nav-arrow:hover {
            background: #ab0e00;
            border-color: #ab0e00;
            transform: scale(1.1);
        }

        .reel-nav-arrow:disabled {
            opacity: 0.3;
            cursor: not-allowed;
            background: rgba(255, 255, 255, 0.03);
            border-color: rgba(255, 255, 255, 0.08);
        }

        .reel-nav-arrow.prev {
            top: calc(50% - 30px);
        }

        .reel-nav-arrow.next {
            top: calc(50% + 30px);
        }

        /* Responsive Overrides */
        @media (max-width: 992px) {
            .reel-nav-arrow {
                right: 16px !important;
                width: 38px !important;
                height: 38px !important;
                font-size: 14px !important;
            }
            .reel-nav-arrow.prev {
                top: calc(50% - 28px) !important;
                bottom: auto !important;
            }
            .reel-nav-arrow.next {
                top: calc(50% + 28px) !important;
                bottom: auto !important;
            }
        }

        @media (max-width: 560px) {
            .reel-app-frame {
                max-width: 100% !important;
                max-height: 100% !important;
                height: 100dvh !important;
                border-radius: 0 !important;
                border: none !important;
                top: 0 !important;
                transform: none !important;
            }
            .reel-info-overlay {
                padding: 20px 20px calc(env(safe-area-inset-bottom) + 24px) !important;
            }
            .reel-nav-arrow {
                right: 12px !important;
            }
            .reel-back-btn {
                top: 16px !important;
                left: 16px !important;
                width: 38px !important;
                height: 38px !important;
            }
            .reel-back-btn i {
                font-size: 16px !important;
            }
        }


    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <div class="reel-page-bg"></div>
    <div class="reel-page-overlay"></div>

    <!-- Back Button -->
    <a href="<?php echo home_url('/'); ?>" class="reel-back-btn" aria-label="<?php echo $is_en ? 'Home' : 'Trang chủ'; ?>">
        <svg class="svg-icon fa-arrow-left fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
    </a>

    <!-- central viewport frame -->
    <div class="reel-app-frame">
        <div class="reel-container">
            <?php foreach ($reels as $index => $r): ?>
                <div class="reel-slide" data-index="<?php echo $index; ?>" data-reel-id="<?php echo esc_attr($r['id']); ?>">
                    <div class="reel-video-loading">
                        <svg class="svg-icon fa-spinner fa-solid fa-spin" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/></svg>
                    </div>
                    <div class="fb-reel-wrapper">
                        <!-- Dynamically loaded iframe goes here -->
                    </div>
                    <div class="reel-info-overlay">
                        <button class="reel-info-cta" onclick="showform('Reel Page - <?php echo esc_js($r['title']); ?>')">
                            <span><?php echo $is_en ? 'Free Counseling' : 'Nhận tư vấn ngay'; ?></span>
                            <svg class="svg-icon fa-chevron-right fa-solid" viewBox="0 0 320 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- chevrons -->
        <button id="reel-btn-prev" class="reel-nav-arrow prev" aria-label="Previous Video">
            <svg class="svg-icon fa-chevron-up fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/></svg>
        </button>
        <button id="reel-btn-next" class="reel-nav-arrow next" aria-label="Next Video">
            <svg class="svg-icon fa-chevron-down fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
        </button>
    </div>

    <!-- Swiper & Snap Controller Logic -->
    <script>
        var currentActiveIndex = -1;
        var reels = <?php echo json_encode($reels); ?>;

        function sendPlayerCommand(iframe, func, args) {
            if (iframe && iframe.contentWindow) {
                try {
                    iframe.contentWindow.postMessage(JSON.stringify({
                        event: 'command',
                        func: func,
                        args: args || []
                    }), '*');
                } catch (e) {
                    console.error('Error sending command to player:', e);
                }
            }
        }

        function scrollToSlide(index) {
            var slides = document.querySelectorAll('.reel-slide');
            if (index >= 0 && index < slides.length) {
                slides[index].scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        function activateSlide(index) {
            if (index === currentActiveIndex) return;
            
            var oldActiveIndex = currentActiveIndex;
            currentActiveIndex = index;

            var slides = document.querySelectorAll('.reel-slide');
            var minKeep = index - 1;
            var maxKeep = index + 1;

            slides.forEach(function(slide) {
                var slideIndex = parseInt(slide.getAttribute('data-index'));
                var wrapper = slide.querySelector('.fb-reel-wrapper');
                var loading = slide.querySelector('.reel-video-loading');
                var reelId = slide.getAttribute('data-reel-id');
                
                if (slideIndex < minKeep || slideIndex > maxKeep) {
                    if (wrapper) {
                        wrapper.innerHTML = '';
                    }
                    if (loading) {
                        loading.style.display = 'block';
                    }
                } else {
                    if (wrapper && reelId) {
                        var iframe = wrapper.querySelector('iframe');
                        
                        if (!iframe) {
                            iframe = document.createElement('iframe');
                            
                            // If active: load playing but muted to load visual frames silently.
                            // If adjacent: load paused.
                            var autoplay = (slideIndex === index) ? 1 : 0;
                            var mute = (slideIndex === index) ? 1 : 0;
                            
                            iframe.src = 'https://www.youtube.com/embed/' + reelId + 
                                '?autoplay=' + autoplay + 
                                '&mute=' + mute + 
                                '&enablejsapi=1' + 
                                '&loop=1' + 
                                '&playlist=' + reelId + 
                                '&controls=1' + 
                                '&rel=0' + 
                                '&playsinline=1';
                                
                            iframe.style.width = '100%';
                            iframe.style.height = '100%';
                            iframe.style.border = 'none';
                            iframe.style.opacity = '0';
                            iframe.style.transition = 'opacity 0.3s';
                            iframe.scrolling = 'no';
                            iframe.allow = 'autoplay; encrypted-media; picture-in-picture';
                            iframe.allowFullscreen = true;
                            
                            iframe.onload = function() {
                                if (loading) loading.style.display = 'none';
                                iframe.style.opacity = '1';
                                
                                var currentIdx = parseInt(slide.getAttribute('data-index'));
                                if (currentIdx === currentActiveIndex) {
                                    sendPlayerCommand(iframe, 'unMute');
                                    sendPlayerCommand(iframe, 'playVideo');
                                }
                            };
                            
                            wrapper.innerHTML = '';
                            wrapper.appendChild(iframe);
                        } else {
                            if (slideIndex === index) {
                                if (loading) loading.style.display = 'none';
                                iframe.style.opacity = '1';
                                sendPlayerCommand(iframe, 'unMute');
                                sendPlayerCommand(iframe, 'playVideo');
                            } else {
                                sendPlayerCommand(iframe, 'pauseVideo');
                            }
                        }
                    }
                }
            });

            // Update arrow button disable states
            var prevBtn = document.getElementById('reel-btn-prev');
            var nextBtn = document.getElementById('reel-btn-next');
            if (prevBtn) prevBtn.disabled = (index === 0);
            if (nextBtn) nextBtn.disabled = (index === reels.length - 1);
        }

        document.addEventListener('DOMContentLoaded', function() {
            var container = document.querySelector('.reel-container');
            if (!container) return;

            // Use IntersectionObserver to find active slide
            var observerOptions = {
                root: container,
                threshold: 0.6
            };

            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var index = parseInt(entry.target.getAttribute('data-index'));
                        activateSlide(index);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.reel-slide').forEach(function(slide) {
                observer.observe(slide);
            });

            // Fallback: Bind arrow keys for accessibility
            document.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowUp' && currentActiveIndex > 0) {
                    e.preventDefault();
                    scrollToSlide(currentActiveIndex - 1);
                } else if (e.key === 'ArrowDown' && currentActiveIndex < reels.length - 1) {
                    e.preventDefault();
                    scrollToSlide(currentActiveIndex + 1);
                }
            });

            // Bind click handlers to arrows
            document.getElementById('reel-btn-prev').addEventListener('click', function() {
                if (currentActiveIndex > 0) scrollToSlide(currentActiveIndex - 1);
            });

            document.getElementById('reel-btn-next').addEventListener('click', function() {
                if (currentActiveIndex < reels.length - 1) scrollToSlide(currentActiveIndex + 1);
            });
        });
    </script>

    <?php get_template_part('shared-modals'); ?>
    <?php
    $js_path = get_stylesheet_directory() . '/common-assets/js/script.min.js';
    $js_version = file_exists($js_path) ? filemtime($js_path) : time();
    ?>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/script.min.js?v=<?php echo $js_version; ?>" defer></script>
    <?php wp_footer(); ?>
</body>
</html>
