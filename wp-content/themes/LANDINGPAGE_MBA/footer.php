<?php
/**
 * The template for displaying the footer
 * Used by: get_footer()
 * Applies to: all pages (homepage, single posts, archives, etc.)
 */

// Prevent duplicate footer execution across wrapper page setups
if (defined('IDEAS_FOOTER_RENDERED')) {
    return;
}
define('IDEAS_FOOTER_RENDERED', true);

$is_en = (isset($_GET['lang']) && $_GET['lang'] === 'en');

$home_url = $is_en ? '/en' : '/';
$lms_url = $is_en ? '/en/lms-ecosystem' : '/he-thong-ho-tro-hoc-tap-lms-ideas';
$faculty_url = $is_en ? '/en/faculty' : '/doi-ngu-giang-vien';
$events_url = $is_en ? '/en/events' : '/dong-su-kien';
$history_url = $is_en ? '/en/history' : '/lich-su-hinh-thanh-va-phat-trien-vien-ideas';
$contact_url = $is_en ? '/en/contact' : '/lien-he';

// Program links
$bba_url = $is_en ? '/en/bba' : '/bba';
$fullbba_url = $is_en ? '/en/fullbba' : '/fullbba';
$mba_url = $is_en ? '/en/mba' : '/mba';
$emba_url = $is_en ? '/en/emba' : '/emba';
$mbainai_url = $is_en ? '/en/mbainai' : '/mbainai';
$mscai_url = $is_en ? '/en/mscai' : '/mscai';
$dual_dba_url = $is_en ? '/en/dual-dba' : '/dual-dba-estiam-rb';
?>

<!-- Footer -->
<footer class="ideas_footer">
    <div class="footer-columns-wrap">
        <!-- Column 1: Logo, description, social icons -->
        <div class="footer-col-about">
            <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg-optimized.webp" alt="IDEAS Logo" width="162" height="91" class="footer-logo-ideas" loading="lazy" decoding="async" />
            <p class="footer-desc-ideas">
                <?php if ($is_en): ?>
                    IDEAS – Your professional academic companion for international Bachelor, Master, and Doctorate programs, unlocking global career and integration opportunities.
                <?php else: ?>
                    IDEAS – Đồng hành hỗ trợ học vụ chuyên nghiệp cho các chương trình Cử nhân, Thạc sĩ, Tiến sĩ chuẩn Quốc tế, mở ra cơ hội thăng tiến và hội nhập toàn cầu.
                <?php endif; ?>
            </p>
            <div class="ideas_follow_new">
                <a target="_blank" href="https://zalo.me/3857867121882640296" class="social-icon zalo"
                    rel="nofollow noopener noreferrer" title="Zalo" aria-label="Zalo IDEAS">
                    <img loading="lazy" src="/wp-content/uploads/external-migrated/zalo-icon_3f4c0a22.webp" alt="Zalo" width="32" height="32" decoding="async" />
                </a>
                <a target="_blank" href="https://www.facebook.com/ideas.edu.vn/" class="social-icon facebook"
                    rel="nofollow noopener noreferrer" title="Facebook" aria-label="Facebook IDEAS">
                    <svg class="svg-icon fa-facebook-f fa-brands" viewBox="0 0 320 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg>
                </a>
                <a target="_blank" href="https://www.youtube.com/c/Vi%E1%BB%87nIDEAS" class="social-icon youtube"
                    rel="nofollow noopener noreferrer" title="YouTube" aria-label="YouTube IDEAS">
                    <svg class="svg-icon fa-youtube fa-brands" viewBox="0 0 576 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/></svg>
                </a>
                <a target="_blank" href="https://www.linkedin.com/company/ideasinstitute/" class="social-icon linkedin"
                    rel="nofollow noopener noreferrer" title="LinkedIn" aria-label="LinkedIn IDEAS">
                    <svg class="svg-icon fa-linkedin-in fa-brands" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/></svg>
                </a>
                <a target="_blank" href="https://www.tiktok.com/@ideas_institute" class="social-icon tiktok"
                    rel="nofollow noopener noreferrer" title="TikTok" aria-label="TikTok IDEAS">
                    <svg class="svg-icon fa-tiktok fa-brands" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"/></svg>
                </a>
            </div>
        </div>

        <!-- Column 2: Danh mục chính / Main Menu -->
        <div class="footer-col-links">
            <h3><?php echo $is_en ? 'Main Links' : 'Danh Mục Chính'; ?></h3>
            <a href="<?php echo esc_url($home_url); ?>"><?php echo $is_en ? 'Home' : 'Trang chủ'; ?></a>
            <a href="<?php echo esc_url($lms_url); ?>"><?php echo $is_en ? 'LMS Ecosystem' : 'Hệ thống LMS'; ?></a>
            <a href="<?php echo esc_url($faculty_url); ?>"><?php echo $is_en ? 'Faculty Board' : 'Hội đồng chuyên môn'; ?></a>
            <a href="<?php echo esc_url($events_url); ?>"><?php echo $is_en ? 'Events' : 'Dòng sự kiện'; ?></a>
            <a href="<?php echo esc_url($history_url); ?>"><?php echo $is_en ? 'History' : 'Lịch sử phát triển'; ?></a>
            <a href="<?php echo esc_url($contact_url); ?>"><?php echo $is_en ? 'Contact' : 'Liên hệ'; ?></a>
        </div>

        <!-- Column 3: Các chương trình / Programs -->
        <div class="footer-col-links">
            <h3><?php echo $is_en ? 'Programs' : 'Các Chương Trình'; ?></h3>
            <a href="<?php echo esc_url($bba_url); ?>"><?php echo $is_en ? 'Top-up BBA' : 'Cử nhân Top-up BBA'; ?></a>
            <a href="<?php echo esc_url($fullbba_url); ?>"><?php echo $is_en ? 'Global Online BBA' : 'Global Online BBA'; ?></a>
            <a href="<?php echo esc_url($mba_url); ?>"><?php echo $is_en ? 'Online MBA' : 'Thạc sĩ Online MBA'; ?></a>
            <a href="<?php echo esc_url($emba_url); ?>"><?php echo $is_en ? 'Executive MBA' : 'Thạc sĩ Executive MBA'; ?></a>
            <a href="<?php echo esc_url($mbainai_url); ?>"><?php echo $is_en ? 'MBA in AI' : 'Thạc sĩ MBA in AI'; ?></a>
            <a href="<?php echo esc_url($mscai_url); ?>"><?php echo $is_en ? 'Master AI (MSc AI)' : 'Thạc sĩ MSc AI'; ?></a>
            <a href="<?php echo esc_url($dual_dba_url); ?>"><?php echo $is_en ? 'Dual DBA' : 'Tiến sĩ Dual DBA'; ?></a>
        </div>

        <!-- Column 4: Liên hệ / Contact -->
        <div class="footer-col-contact">
            <h3><?php echo $is_en ? 'Contact' : 'Liên hệ'; ?></h3>
            <p class="contact-item">
                <svg class="svg-icon fa-phone fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                <span>028 2244 2244</span>
            </p>
            <p class="contact-item">
                <svg class="svg-icon fa-envelope fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                <span>info@ideas.edu.vn</span>
            </p>
            <p class="contact-item" style="display: block !important;">
                <span style="display: flex; align-items: center; gap: 10px; margin-bottom: 4px;">
                    <svg class="svg-icon fa-file-invoice fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM80 64l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L80 96c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm16 96l192 0c17.7 0 32 14.3 32 32l0 64c0 17.7-14.3 32-32 32L96 352c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32zm0 32l0 64 192 0 0-64L96 256zM240 416l64 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-64 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                    <span><?php echo $is_en ? 'Tax ID: 0318949449' : 'MST: 0318949449'; ?></span>
                </span>
                <span style="display: block; font-size: 0.8rem; opacity: 0.75; padding-left: 26px; line-height: 1.4; margin-bottom: 4px;">
                    <?php if ($is_en): ?>
                        Issued by the Department of Planning and Investment of Ho Chi Minh City on May 13, 2025. Amended on October 1, 2025.
                    <?php else: ?>
                        Do Phòng đăng ký kinh doanh - Sở tài chính Thành phố Hồ Chí Minh cấp lần đầu ngày 13/05/2025. Thay đổi lần 1 ngày 01/10/2025.
                    <?php endif; ?>
                </span>
                <span style="display: block; font-size: 0.8rem; opacity: 0.75; padding-left: 26px; line-height: 1.4;">
                    <?php echo $is_en ? 'Formerly IDEAS Institute: 0311353167' : 'Tiền thân là Viện IDEAS: 0311353167'; ?>
                </span>
            </p>
        </div>
    </div>

    <div class="footer-divider-line"></div>

    <!-- Middle Row: Address & Badges -->
    <div class="footer-middle-row">
        <div class="footer-addresses">
            <p class="address-item">
                <svg class="svg-icon fa-location-dot fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                <span>
                    <strong><?php echo $is_en ? 'Office:' : 'Văn phòng:'; ?></strong> 
                    <?php if ($is_en): ?>
                        4th Floor, Hai Au Building, 39B Truong Son, Tan Son Nhat Ward, Tan Binh District, HCMC
                    <?php else: ?>
                        Tầng 4, Tòa nhà Hải Âu, 39B Trường Sơn, Phường Tân Sơn Nhất, TP.HCM
                    <?php endif; ?>
                </span>
            </p>
        </div>
        <div class="footer-badges">
            <a href="https://www.dmca.com/Protection/Status.aspx?ID=dc41cd4b-8163-4a8c-aee1-e3b1b7ad5643&refurl=https://ideas.edu.vn/"
                title="DMCA.com Protection Status" class="dmca-badge-new" rel="nofollow noopener noreferrer">
                <img loading="lazy"
                    src="/wp-content/uploads/external-migrated/dmca_protected_sml_120n_681b96ce.webp"
                    alt="DMCA.com Protection Status" decoding="async" />
            </a>
        </div>
    </div>

    <!-- Bottom Row: Copyright -->
    <div class="footer-bottom-row">
        <p class="copyright-text">
            © <span class="copyright-year"><?php echo date('Y'); ?></span> 
            <?php echo $is_en ? 'IDEAS - Supporting global education.' : 'IDEAS - Đồng hành cùng tri thức toàn cầu.'; ?>
        </p>
        <div class="footer-bottom-right">
            <div class="footer-bottom-links">
                <a target="_blank" href="/dieu-khoan-su-dung">
                    <svg class="svg-icon fa-lock fa-solid" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z"/></svg>
                    <span><?php echo $is_en ? 'Terms & Privacy' : 'Điều khoản - bảo mật'; ?></span>
                </a>
                <span class="divider">|</span>
                <a target="_blank" href="/trach-nhiem-mien-tru">
                    <svg class="svg-icon fa-shield-halved fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M256 0c4.6 0 9.2 1 13.4 2.9L457.7 82.8c22 9.3 38.4 31 38.3 57.2c-.5 99.2-41.3 280.7-213.6 363.2c-16.7 8-36.1 8-52.8 0C57.3 420.7 16.5 239.2 16 140c-.1-26.2 16.3-47.9 38.3-57.2L242.7 2.9C246.8 1 251.4 0 256 0zm0 66.8l0 378.1C394 378 431.1 230.1 432 141.4L256 66.8s0 0 0 0z"/></svg>
                    <span><?php echo $is_en ? 'Disclaimer' : 'Trách nhiệm miễn trừ'; ?></span>
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- CSS transition overrides for scroll-hiding site header -->
<style>
    #site-header {
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), background-color 0.3s ease !important;
    }

    #site-header.hide {
        transform: translateY(-100%) !important;
    }
</style>

<!-- Studio Freight Lenis for ultra-smooth momentum scrolling (120Hz optimization) -->
<script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.36/dist/lenis.min.js"></script>
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

<?php get_template_part('shared-modals'); ?>

<?php wp_footer(); ?>
</body>

</html>