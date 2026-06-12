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
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a target="_blank" href="https://www.youtube.com/c/Vi%E1%BB%87nIDEAS" class="social-icon youtube"
                    rel="nofollow noopener noreferrer" title="YouTube" aria-label="YouTube IDEAS">
                    <i class="fa-brands fa-youtube"></i>
                </a>
                <a target="_blank" href="https://www.linkedin.com/company/ideasinstitute/" class="social-icon linkedin"
                    rel="nofollow noopener noreferrer" title="LinkedIn" aria-label="LinkedIn IDEAS">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>
                <a target="_blank" href="https://www.tiktok.com/@ideas_institute" class="social-icon tiktok"
                    rel="nofollow noopener noreferrer" title="TikTok" aria-label="TikTok IDEAS">
                    <i class="fa-brands fa-tiktok"></i>
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
                <i class="fa-solid fa-phone"></i>
                <span>028 2244 2244</span>
            </p>
            <p class="contact-item">
                <i class="fa-solid fa-envelope"></i>
                <span>info@ideas.edu.vn</span>
            </p>
            <p class="contact-item" style="display: block !important;">
                <span style="display: flex; align-items: center; gap: 10px; margin-bottom: 4px;">
                    <i class="fa-solid fa-file-invoice"></i>
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
                <i class="fa-solid fa-location-dot"></i>
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
                    <i class="fa-solid fa-lock"></i>
                    <span><?php echo $is_en ? 'Terms & Privacy' : 'Điều khoản - bảo mật'; ?></span>
                </a>
                <span class="divider">|</span>
                <a target="_blank" href="/trach-nhiem-mien-tru">
                    <i class="fa-solid fa-shield-halved"></i>
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