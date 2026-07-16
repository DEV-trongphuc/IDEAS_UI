<?php
/**
 * Shared Modals Template Part
 * Contains Registration Modal and Booking Modal with dynamic content tailored to the current page.
 */
$is_en = (isset($_GET['lang']) && $_GET['lang'] === 'en');

// 1. Resolve page-specific content for Registration Modal (reg-modal)
$modal_badge = $is_en ? '1:1 COUNSELING' : 'NHẬN TƯ VẤN 1:1';

if ($is_en) {
    $modal_title = 'Register to learn about <br><span class="gradient-text" id="modal-program-title">Your Learning Journey</span>';
    $modal_subtitle = 'Our academic counselor will contact you within 24 business hours.';
    
    if (is_page('so-do-to-chuc')) {
        $modal_title = 'Register to learn about <br><span class="gradient-text" id="modal-program-title">Organizational Structure</span>';
    } elseif (is_page('he-thong-ho-tro-hoc-tap-lms-ideas')) {
        $modal_title = 'Register to experience <br><span class="gradient-text" id="modal-program-title">LMS Ecosystem</span>';
        $modal_subtitle = 'Enter your details to receive a trial account for LMS and our AI Assistant.';
    } elseif (is_page('ideas-talk')) {
        $modal_title = 'Register to join <br><span class="gradient-text" id="modal-program-title">IDEAS Talk & AI</span>';
        $modal_subtitle = 'Enter your details. A counselor will guide you through the schedule and Zoom link.';
    } elseif (is_page('ideas-podcast-series-01')) {
        $modal_title = 'Get materials for <br><span class="gradient-text" id="modal-program-title">Podcast Series 01</span>';
        $modal_subtitle = 'Register to receive slides, documents, and notifications of new podcast episodes.';
    } elseif (is_page('ideas-ambassador')) {
        $modal_title = 'Apply to become <br><span class="gradient-text" id="modal-program-title">IDEAS Ambassador</span>';
        $modal_subtitle = 'Partner with us to spread knowledge and enjoy exclusive ambassador benefits.';
    } elseif (is_page('ho-tro-tai-chinh-sacombank')) {
        $modal_title = 'Get consulting on <br><span class="gradient-text" id="modal-program-title">Tuition Installments</span>';
        $modal_subtitle = 'Support for 0% tuition installment program linked with Sacombank for 12-24 months.';
    } elseif (is_page('cac-khoan-chi-phi')) {
        $modal_title = 'Get details on <br><span class="gradient-text" id="modal-program-title">Tuition & Offers</span>';
        $modal_subtitle = 'An admissions counselor will contact you to send the detailed fee schedule.';
    } elseif (is_page('business-leadership-essentials')) {
        $modal_title = 'Register to receive <br><span class="gradient-text" id="modal-program-title">Learning Grant 100%</span>';
        $modal_subtitle = 'Fill in your details below to receive the 100% tuition grant for July.';
    }
} else {
    $modal_title = 'Đăng ký tìm hiểu <br><span class="gradient-text" id="modal-program-title">Hành Trình Học Tập</span>';
    $modal_subtitle = 'Chuyên viên hỗ trợ học vụ sẽ liên hệ với bạn trong vòng 24h làm việc để tư vấn chi tiết.';
    
    if (is_page('so-do-to-chuc')) {
        $modal_title = 'Đăng ký tìm hiểu <br><span class="gradient-text" id="modal-program-title">Cơ Cấu Tổ Chức</span>';
    } elseif (is_page('he-thong-ho-tro-hoc-tap-lms-ideas')) {
        $modal_title = 'Đăng ký trải nghiệm <br><span class="gradient-text" id="modal-program-title">Hệ Sinh Thái LMS</span>';
        $modal_subtitle = 'Điền thông tin để chuyên viên cấp tài khoản học thử LMS và trợ lý AI.';
    } elseif (is_page('ideas-talk')) {
        $modal_title = 'Đăng ký tham gia <br><span class="gradient-text" id="modal-program-title">IDEAS Talk & AI</span>';
        $modal_subtitle = 'Điền thông tin bên dưới, chuyên viên tư vấn sẽ liên hệ hướng dẫn lịch học và nhận link Zoom.';
    } elseif (is_page('ideas-podcast-series-01')) {
        $modal_title = 'Nhận tài liệu <br><span class="gradient-text" id="modal-program-title">Podcast Series 01</span>';
        $modal_subtitle = 'Đăng ký thông tin để nhận slide tài liệu và thông báo tập podcast mới nhất.';
    } elseif (is_page('ideas-ambassador')) {
        $modal_title = 'Đăng ký làm <br><span class="gradient-text" id="modal-program-title">Đại Sứ IDEAS</span>';
        $modal_subtitle = 'Đồng hành lan tỏa tri thức và nhận chính sách đãi ngộ đặc quyền.';
    } elseif (is_page('ho-tro-tai-chinh-sacombank')) {
        $modal_title = 'Đăng ký tư vấn <br><span class="gradient-text" id="modal-program-title">Trả Góp Học Phí</span>';
        $modal_subtitle = 'Hỗ trợ trả góp học phí 0% liên kết Sacombank từ 12 đến 24 tháng.';
    } elseif (is_page('cac-khoan-chi-phi')) {
        $modal_title = 'Nhận thông tin <br><span class="gradient-text" id="modal-program-title">Học Phí & Ưu Đãi</span>';
        $modal_subtitle = 'Chuyên viên tư vấn tuyển sinh sẽ liên hệ gửi biểu phí chi tiết.';
    } elseif (is_page('business-leadership-essentials')) {
        $modal_title = 'Đăng ký nhận <br><span class="gradient-text" id="modal-program-title">Learning Grant 100%</span>';
        $modal_subtitle = 'Điền thông tin bên dưới để nhận suất học bổng 100% học phí trong tháng 7.';
    }
}

// 2. Resolve page-specific program options for Booking Modal (bk-modal)
$program_options = [];

if ($is_en) {
    if (is_page('so-do-to-chuc')) {
        $program_options = [
            ['value' => 'Cơ cấu tổ chức Viện', 'label' => 'IDEAS Organization', 'desc' => 'Structure & board inquiry', 'icon' => '👔'],
            ['value' => 'Chương trình Thạc sĩ', 'label' => 'Master Programs', 'desc' => 'MBA / EMBA / MBA in AI / MSc AI', 'icon' => '🎓'],
            ['value' => 'Chưa quyết định', 'label' => 'Undecided', 'desc' => 'Need counseling to choose', 'icon' => '💡']
        ];
    } elseif (is_page('he-thong-ho-tro-hoc-tap-lms-ideas')) {
        $program_options = [
            ['value' => 'Hệ sinh thái LMS', 'label' => 'LMS Ecosystem', 'desc' => 'Usage & features', 'icon' => '💻'],
            ['value' => 'Chương trình Thạc sĩ', 'label' => 'Master Programs', 'desc' => 'MBA / EMBA / MBA in AI / MSc AI', 'icon' => '🎓'],
            ['value' => 'Chưa quyết định', 'label' => 'Undecided', 'desc' => 'Need counseling to choose', 'icon' => '💡']
        ];
    } elseif (is_page('ideas-talk')) {
        $program_options = [
            ['value' => 'Chuyên đề IDEAS Talk', 'label' => 'IDEAS Talk', 'desc' => 'Register for events', 'icon' => '🎤'],
            ['value' => 'MBA High Quality', 'label' => 'Premium MBA', 'desc' => 'MBA / EMBA / MBA in AI', 'icon' => '🎓'],
            ['value' => 'Chưa quyết định', 'label' => 'Undecided', 'desc' => 'Need counseling to choose', 'icon' => '💡']
        ];
    } elseif (is_page('ideas-podcast-series-01')) {
        $program_options = [
            ['value' => 'Podcast Series 01', 'label' => 'Podcast Series 01', 'desc' => 'Get podcast slides & docs', 'icon' => '🎙️'],
            ['value' => 'MBA High Quality', 'label' => 'Premium MBA', 'desc' => 'MBA / EMBA / MBA in AI', 'icon' => '🎓'],
            ['value' => 'Chưa quyết định', 'label' => 'Undecided', 'desc' => 'Need counseling to choose', 'icon' => '💡']
        ];
    } elseif (is_page('ideas-ambassador')) {
        $program_options = [
            ['value' => 'Chính sách Ambassador', 'label' => 'IDEAS Ambassador', 'desc' => 'Benefits & policies', 'icon' => '🤝'],
            ['value' => 'MBA High Quality', 'label' => 'Premium MBA', 'desc' => 'MBA / EMBA / MBA in AI', 'icon' => '🎓'],
            ['value' => 'Chưa quyết định', 'label' => 'Undecided', 'desc' => 'Need counseling to choose', 'icon' => '💡']
        ];
    } elseif (is_page('ho-tro-tai-chinh-sacombank')) {
        $program_options = [
            ['value' => 'Trả góp Sacombank', 'label' => 'Sacombank Installment', 'desc' => '0% tuition installment program', 'icon' => '💳'],
            ['value' => 'MBA High Quality', 'label' => 'Premium MBA', 'desc' => 'MBA / EMBA / MBA in AI', 'icon' => '🎓'],
            ['value' => 'Chưa quyết định', 'label' => 'Undecided', 'desc' => 'Need counseling to choose', 'icon' => '💡']
        ];
    } elseif (is_page('cac-khoan-chi-phi')) {
        $program_options = [
            ['value' => 'Các khoản chi phí', 'label' => 'Tuition & Fees', 'desc' => 'Detailed breakdown of fees', 'icon' => '💵'],
            ['value' => 'MBA High Quality', 'label' => 'Premium MBA', 'desc' => 'MBA / EMBA / MBA in AI', 'icon' => '🎓'],
            ['value' => 'Chưa quyết định', 'label' => 'Undecided', 'desc' => 'Need counseling to choose', 'icon' => '💡']
        ];
    } elseif (is_page('business-leadership-essentials')) {
        $program_options = [
            ['value' => 'Business Leadership Essentials', 'label' => 'Leadership Essentials', 'desc' => 'Swiss UMEF short course', 'icon' => '💼'],
            ['value' => 'MBA High Quality', 'label' => 'Premium MBA', 'desc' => 'MBA / EMBA / MBA in AI', 'icon' => '🎓'],
            ['value' => 'Chưa quyết định', 'label' => 'Undecided', 'desc' => 'Need counseling to choose', 'icon' => '💡']
        ];
    } else {
        $program_options = [
            ['value' => 'MBA High Quality', 'label' => 'Premium MBA', 'desc' => 'MBA / EMBA / MBA in AI / MSc AI', 'icon' => '🎓'],
            ['value' => 'Cần tư vấn chung', 'label' => 'General Inquiry', 'desc' => 'Scholarships & Admissions', 'icon' => '📞'],
            ['value' => 'Chưa quyết định', 'label' => 'Undecided', 'desc' => 'Need counseling to choose', 'icon' => '💡']
        ];
    }
} else {
    if (is_page('so-do-to-chuc')) {
        $program_options = [
            ['value' => 'Cơ cấu tổ chức Viện', 'label' => 'Tổ chức IDEAS', 'desc' => 'Tìm hiểu thông tin hoạt động', 'icon' => '👔'],
            ['value' => 'Chương trình Thạc sĩ', 'label' => 'Chương trình Thạc sĩ', 'desc' => 'MBA / EMBA / MBA in AI / MSc AI', 'icon' => '🎓'],
            ['value' => 'Chưa quyết định', 'label' => 'Chưa quyết định', 'desc' => 'Cần tư vấn để lựa chọn', 'icon' => '💡']
        ];
    } elseif (is_page('he-thong-ho-tro-hoc-tap-lms-ideas')) {
        $program_options = [
            ['value' => 'Hệ sinh thái LMS', 'label' => 'Hệ sinh thái LMS', 'desc' => 'Cách sử dụng & tính năng', 'icon' => '💻'],
            ['value' => 'Chương trình Thạc sĩ', 'label' => 'Chương trình Thạc sĩ', 'desc' => 'MBA / EMBA / MBA in AI / MSc AI', 'icon' => '🎓'],
            ['value' => 'Chưa quyết định', 'label' => 'Chưa quyết định', 'desc' => 'Cần tư vấn để lựa chọn', 'icon' => '💡']
        ];
    } elseif (is_page('ideas-talk')) {
        $program_options = [
            ['value' => 'Chuyên đề IDEAS Talk', 'label' => 'IDEAS Talk', 'desc' => 'Đăng ký tham gia sự kiện', 'icon' => '🎤'],
            ['value' => 'MBA High Quality', 'label' => 'MBA Chất Lượng Cao', 'desc' => 'MBA / EMBA / MBA in AI', 'icon' => '🎓'],
            ['value' => 'Chưa quyết định', 'label' => 'Chưa quyết định', 'desc' => 'Cần tư vấn để lựa chọn', 'icon' => '💡']
        ];
    } elseif (is_page('ideas-podcast-series-01')) {
        $program_options = [
            ['value' => 'Podcast Series 01', 'label' => 'Podcast Series 01', 'desc' => 'Xem và nhận tài liệu podcast', 'icon' => '🎙️'],
            ['value' => 'MBA High Quality', 'label' => 'MBA Chất Lượng Cao', 'desc' => 'MBA / EMBA / MBA in AI', 'icon' => '🎓'],
            ['value' => 'Chưa quyết định', 'label' => 'Chưa quyết định', 'desc' => 'Cần tư vấn để lựa chọn', 'icon' => '💡']
        ];
    } elseif (is_page('ideas-ambassador')) {
        $program_options = [
            ['value' => 'Chính sách Ambassador', 'label' => 'Đại sứ IDEAS', 'desc' => 'Chính sách & quyền lợi', 'icon' => '🤝'],
            ['value' => 'MBA High Quality', 'label' => 'MBA Chất Lượng Cao', 'desc' => 'MBA / EMBA / MBA in AI', 'icon' => '🎓'],
            ['value' => 'Chưa quyết định', 'label' => 'Chưa quyết định', 'desc' => 'Cần tư vấn để lựa chọn', 'icon' => '💡']
        ];
    } elseif (is_page('ho-tro-tai-chinh-sacombank')) {
        $program_options = [
            ['value' => 'Trả góp Sacombank', 'label' => 'Trả góp Sacombank', 'desc' => 'Hỗ trợ trả góp học phí 0%', 'icon' => '💳'],
            ['value' => 'MBA High Quality', 'label' => 'MBA Chất Lượng Cao', 'desc' => 'MBA / EMBA / MBA in AI', 'icon' => '🎓'],
            ['value' => 'Chưa quyết định', 'label' => 'Chưa quyết định', 'desc' => 'Cần tư vấn để lựa chọn', 'icon' => '💡']
        ];
    } elseif (is_page('cac-khoan-chi-phi')) {
        $program_options = [
            ['value' => 'Các khoản chi phí', 'label' => 'Học phí & Lệ phí', 'desc' => 'Chi tiết các khoản phí', 'icon' => '💵'],
            ['value' => 'MBA High Quality', 'label' => 'MBA Chất Lượng Cao', 'desc' => 'MBA / EMBA / MBA in AI', 'icon' => '🎓'],
            ['value' => 'Chưa quyết định', 'label' => 'Chưa quyết định', 'desc' => 'Cần tư vấn để lựa chọn', 'icon' => '💡']
        ];
    } elseif (is_page('business-leadership-essentials')) {
        $program_options = [
            ['value' => 'Business Leadership Essentials', 'label' => 'Leadership Essentials', 'desc' => 'Khóa ngắn hạn Swiss UMEF', 'icon' => '💼'],
            ['value' => 'MBA High Quality', 'label' => 'MBA Chất Lượng Cao', 'desc' => 'MBA / EMBA / MBA in AI', 'icon' => '🎓'],
            ['value' => 'Chưa quyết định', 'label' => 'Chưa quyết định', 'desc' => 'Cần tư vấn để lựa chọn', 'icon' => '💡']
        ];
    } else {
        $program_options = [
            ['value' => 'MBA High Quality', 'label' => 'MBA Chất Lượng Cao', 'desc' => 'MBA / EMBA / MBA in AI / MSc AI', 'icon' => '🎓'],
            ['value' => 'Cần tư vấn chung', 'label' => 'Tư vấn chung', 'desc' => 'Học bổng & Tuyển sinh', 'icon' => '📞'],
            ['value' => 'Chưa quyết định', 'label' => 'Chưa quyết định', 'desc' => 'Cần tư vấn để lựa chọn', 'icon' => '💡']
        ];
    }
}
?>

<!-- 1. Generic Registration Popup Modal -->
<div class="reg-modal" id="reg-modal" role="dialog" aria-modal="true" aria-hidden="true" style="display:none;">
    <div class="reg-modal-overlay" id="reg-modal-overlay" onclick="closeRegModal()"></div>
    <div class="reg-modal-container" data-lenis-prevent>
        <button class="reg-modal-close" id="reg-modal-close" onclick="closeRegModal()" aria-label="<?php echo $is_en ? 'Close modal' : 'Đóng modal'; ?>">✕</button>
        <div class="reg-modal-content">

            <header class="modal-form-header">
                <div class="modal-badge"><?php echo esc_html($modal_badge); ?></div>
                <h3><?php echo $modal_title; ?></h3>
                <p><?php echo esc_html($modal_subtitle); ?></p>
            </header>

            <?php if (is_single()) : ?>
                <a href="<?php echo home_url('/reel'); ?>" class="reel-promo-card">
                    <div class="reel-promo-icon">
                        <svg class="svg-icon fa-play fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80L0 432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"/></svg>
                    </div>
                    <div class="reel-promo-info">
                        <div class="reel-promo-tag"><?php echo $is_en ? 'NEW DISCOVERY' : 'MỚI KHÁM PHÁ'; ?></div>
                        <span class="reel-promo-link">
                            <?php echo $is_en ? 'Explore IDEAS Reel Counseling' : 'Khám phá IDEAS Reel Tư vấn'; ?> <svg class="svg-icon fa-chevron-right fa-solid" viewBox="0 0 320 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                        </span>
                    </div>
                </a>
            <?php endif; ?>

            <form class="cta-form modal-form" id="modal-cta-form" data-submit-handler-registered="true" novalidate>
                <div class="form-group">
                    <label for="modal-fullname"><?php echo $is_en ? 'Full Name *' : 'Họ và tên *'; ?></label>
                    <input type="text" id="modal-fullname" name="fullname" placeholder="<?php echo $is_en ? 'Your full name' : 'Họ và tên của bạn'; ?>" required />
                    <span class="form-error" id="modal-fullname-error"></span>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="modal-phone"><?php echo $is_en ? 'Phone Number *' : 'Số điện thoại *'; ?></label>
                        <input type="tel" id="modal-phone" name="phone" placeholder="<?php echo $is_en ? 'Phone number' : 'Số điện thoại'; ?>" required />
                        <span class="form-error" id="modal-phone-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="modal-email"><?php echo $is_en ? 'Email Address *' : 'Email *'; ?></label>
                        <input type="email" id="modal-email" name="email" placeholder="<?php echo $is_en ? 'Email address' : 'Địa chỉ email'; ?>" required />
                        <span class="form-error" id="modal-email-error"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="modal-education"><?php echo $is_en ? 'Education Level *' : 'Trình độ học vấn *'; ?></label>
                        <select id="modal-education" name="education" required>
                            <option value=""><?php echo $is_en ? '-- Select Education --' : '-- Chọn trình độ --'; ?></option>
                            <option value="highschool"><?php echo $is_en ? 'High School' : 'THPT'; ?></option>
                            <option value="college"><?php echo $is_en ? 'College/Diploma' : 'Cao đẳng'; ?></option>
                            <option value="bachelor"><?php echo $is_en ? 'Bachelor' : 'Cử nhân'; ?></option>
                            <option value="master"><?php echo $is_en ? 'Master' : 'Thạc sĩ'; ?></option>
                            <option value="other"><?php echo $is_en ? 'Other' : 'Khác'; ?></option>
                        </select>
                        <span class="form-error" id="modal-education-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="modal-english"><?php echo $is_en ? 'English Proficiency *' : 'Trình độ Tiếng Anh *'; ?></label>
                        <select id="modal-english" name="english" required>
                            <option value=""><?php echo $is_en ? '-- Select Level --' : '-- Chọn trình độ --'; ?></option>
                            <option value="below-5.0"><?php echo $is_en ? 'Below IELTS 5.0' : 'Dưới IELTS 5.0'; ?></option>
                            <option value="5.0-5.5"><?php echo $is_en ? 'IELTS 5.0 - 5.5' : 'IELTS 5.0 - 5.5'; ?></option>
                            <option value="6.0-plus"><?php echo $is_en ? 'IELTS 6.0+' : 'IELTS 6.0+'; ?></option>
                            <option value="other"><?php echo $is_en ? 'Other / No Score' : 'Khác / Chưa thi'; ?></option>
                        </select>
                        <span class="form-error" id="modal-english-error"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="modal-message"><?php echo $is_en ? 'Any notes or preferred time for a 1:1 call' : 'Nội dung bạn muốn chia sẻ / thời gian có thể nghe tư vấn 1:1'; ?></label>
                    <textarea id="modal-message" name="message" placeholder="<?php echo $is_en ? 'e.g. I am interested in the MBA program...' : 'Ví dụ: Tôi quan tâm chương trình MBA...'; ?>"
                        rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-full" id="modal-form-submit-btn"
                    aria-label="<?php echo $is_en ? 'Submit Registration' : 'Gửi đăng ký tư vấn'; ?>">
                    <span><?php echo $is_en ? 'Submit Registration' : 'Gửi thông tin đăng ký'; ?></span>
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </button>

                <p class="form-privacy"><?php echo $is_en ? 'Your information is kept secure & private' : 'Cam kết bảo mật thông tin'; ?></p>
            </form>

            <div class="modal-form-success" id="modal-form-success">
                <div class="success-circle">
                    <svg viewBox="0 0 52 52" class="checkmark">
                        <circle cx="26" cy="26" r="25" fill="none" class="checkmark__circle" />
                        <path fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" class="checkmark__check" />
                    </svg>
                </div>
                <h3><?php echo $is_en ? 'Registration Successful!' : 'Gửi thông tin thành công!'; ?></h3>
                <p id="modal-success-msg"><?php echo $is_en ? 'Thank you for your interest. A counselor from IDEAS will contact you shortly.' : 'Cảm ơn bạn đã quan tâm. Chuyên viên của IDEAS sẽ liên hệ trong thời gian sớm nhất.'; ?></p>
                <button type="button" class="btn btn-primary btn-full" style="margin-top: 32px;"
                    onclick="closeRegModal()"><?php echo $is_en ? 'Back to page' : 'Quay lại trang'; ?></button>
            </div>
        </div>
    </div>
</div>

<?php
if (!defined('BOOKING_MODAL_CSS_LOADED')) {
    define('BOOKING_MODAL_CSS_LOADED', true);
    $bk_css_path = get_stylesheet_directory() . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/booking-modal.min.css?v=<?php echo $bk_css_version; ?>" media="print" onload="this.media='all'" />
    <?php
}
?>

<!-- 2. Booking Modal - Đặt lịch tư vấn -->
<div class="bk-modal" id="bk-modal" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="bk-title"
    style="display: none;">
    <div class="bk-overlay" id="bk-overlay"></div>
    <div class="bk-container" data-lenis-prevent role="document">
        <button class="bk-close" id="bk-close" aria-label="<?php echo $is_en ? 'Close modal' : 'Đóng modal'; ?>">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round">
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
        </button>

        <!-- Progress bar -->
        <div class="bk-progress">
            <div class="bk-progress-track">
                <div class="bk-progress-fill" id="bk-progress-fill"></div>
            </div>
            <div class="bk-steps-label">
                <span class="bk-step-lbl active" data-step="1"><?php echo $is_en ? 'Info' : 'Thông tin'; ?></span>
                <span class="bk-step-lbl" data-step="2"><?php echo $is_en ? 'Schedule' : 'Chọn lịch'; ?></span>
                <span class="bk-step-lbl" data-step="3"><?php echo $is_en ? 'Confirm' : 'Xác nhận'; ?></span>
            </div>
        </div>

        <!-- STEP 1: Personal Info -->
        <div class="bk-step" id="bk-step-1">
            <div class="bk-step-header">
                <div class="bk-header-icon">
                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <div class="bk-step-badge"><?php echo $is_en ? 'STEP 1 / 3' : 'BƯỚC 1 / 3'; ?></div>
                    <h2 class="bk-step-title" id="bk-title"><?php echo $is_en ? 'Your Information' : 'Thông tin của bạn'; ?></h2>
                    <p class="bk-step-sub"><?php echo $is_en ? 'Fill in the details to help our counselor prepare for your session' : 'Điền thông tin để chuyên viên chuẩn bị buổi tư vấn phù hợp nhất'; ?></p>
                </div>
            </div>

            <?php if (is_single()) : ?>
                <a href="<?php echo home_url('/reel'); ?>" class="reel-promo-card" style="margin-left: 20px; margin-right: 20px; width: calc(100% - 40px);">
                    <div class="reel-promo-icon">
                        <svg class="svg-icon fa-play fa-solid" viewBox="0 0 384 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80L0 432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"/></svg>
                    </div>
                    <div class="reel-promo-info">
                        <div class="reel-promo-tag"><?php echo $is_en ? 'NEW DISCOVERY' : 'MỚI KHÁM PHÁ'; ?></div>
                        <span class="reel-promo-link">
                            <?php echo $is_en ? 'Explore IDEAS Reel Counseling' : 'Khám phá IDEAS Reel Tư vấn'; ?> <svg class="svg-icon fa-chevron-right fa-solid" viewBox="0 0 320 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
                        </span>
                    </div>
                </a>
            <?php endif; ?>

            <form class="bk-form" id="bk-form-1" novalidate>
                <div class="bk-field">
                    <label for="bk-name"><?php echo $is_en ? 'Full Name' : 'Họ và tên'; ?> <span class="bk-required">*</span></label>
                    <div class="bk-input-wrap">
                        <svg class="bk-input-icon" width="16" height="16" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <input type="text" id="bk-name" name="bk-name" placeholder="<?php echo $is_en ? 'John Doe' : 'Nguyễn Văn A'; ?>" autocomplete="name"
                            required />
                    </div>
                    <span class="bk-err" id="bk-name-err"></span>
                </div>

                <div class="bk-row-2">
                    <div class="bk-field">
                        <label for="bk-phone"><?php echo $is_en ? 'Phone Number' : 'Số điện thoại'; ?> <span class="bk-required">*</span></label>
                        <div class="bk-input-wrap">
                            <svg class="bk-input-icon" width="16" height="16" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <input type="tel" id="bk-phone" name="bk-phone" placeholder="0912 345 678"
                                autocomplete="tel" required />
                        </div>
                        <span class="bk-err" id="bk-phone-err"></span>
                    </div>
                    <div class="bk-field">
                        <label for="bk-email">Email <span class="bk-required">*</span></label>
                        <div class="bk-input-wrap">
                            <svg class="bk-input-icon" width="16" height="16" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <input type="email" id="bk-email" name="bk-email" placeholder="email@company.com"
                                autocomplete="email" required />
                        </div>
                        <span class="bk-err" id="bk-email-err"></span>
                    </div>
                </div>

                <div class="bk-row-2">
                    <div class="bk-field">
                        <label for="bk-edu"><?php echo $is_en ? 'Education Level' : 'Trình độ học vấn'; ?> <span class="bk-required">*</span></label>
                        <div class="bk-select-wrap">
                            <select id="bk-edu" name="bk-edu" required>
                                <option value=""><?php echo $is_en ? '-- Select Education --' : '-- Chọn trình độ --'; ?></option>
                                <option value="highschool"><?php echo $is_en ? 'High School' : 'THPT'; ?></option>
                                <option value="college"><?php echo $is_en ? 'College/Diploma' : 'Cao đẳng'; ?></option>
                                <option value="bachelor"><?php echo $is_en ? 'Bachelor' : 'Cử nhân'; ?></option>
                                <option value="master"><?php echo $is_en ? 'Master' : 'Thạc sĩ'; ?></option>
                                <option value="other"><?php echo $is_en ? 'Other' : 'Khác'; ?></option>
                            </select>
                        </div>
                        <span class="bk-err" id="bk-edu-err"></span>
                    </div>
                    <div class="bk-field">
                        <label for="bk-eng"><?php echo $is_en ? 'English Proficiency' : 'Trình độ Tiếng Anh'; ?> <span class="bk-required">*</span></label>
                        <div class="bk-select-wrap">
                            <select id="bk-eng" name="bk-eng" required>
                                <option value=""><?php echo $is_en ? '-- Select Level --' : '-- Chọn trình độ --'; ?></option>
                                <option value="below-5.0"><?php echo $is_en ? 'Below IELTS 5.0' : 'Dưới IELTS 5.0'; ?></option>
                                <option value="5.0-5.5"><?php echo $is_en ? 'IELTS 5.0 – 5.5' : 'IELTS 5.0 – 5.5'; ?></option>
                                <option value="6.0-plus"><?php echo $is_en ? 'IELTS 6.0+' : 'IELTS 6.0+'; ?></option>
                                <option value="other"><?php echo $is_en ? 'Other / No Score' : 'Khác / Chưa thi'; ?></option>
                            </select>
                        </div>
                        <span class="bk-err" id="bk-eng-err"></span>
                    </div>
                </div>

                <div class="bk-field">
                    <label><?php echo $is_en ? 'Program of Interest' : 'Chương trình quan tâm'; ?> <span class="bk-required">*</span></label>
                    <div class="bk-program-grid" id="bk-program-grid">
                        <?php foreach ($program_options as $index => $opt): ?>
                            <label class="bk-program-card">
                                <input type="radio" name="bk-program" aria-label="<?php echo esc_attr($opt['label']); ?>" value="<?php echo esc_attr($opt['value']); ?>" <?php echo $index === 0 ? 'checked' : ''; ?> />
                                <div class="bk-program-inner">
                                    <div class="bk-program-icon"><?php echo esc_html($opt['icon']); ?></div>
                                    <div class="bk-program-name"><?php echo esc_html($opt['label']); ?></div>
                                    <div class="bk-program-desc"><?php echo esc_html($opt['desc']); ?></div>
                                </div>
                            </label>
                        <?php endforeach; ?>
                    </div>
                    <span class="bk-err" id="bk-program-err"></span>
                </div>

                <button type="button" class="bk-btn-next" id="bk-next-1" aria-label="<?php echo $is_en ? 'Next to scheduling' : 'Sang bước tiếp theo: chọn lịch'; ?>">
                    <?php echo $is_en ? 'Next - Select Date' : 'Tiếp theo - Chọn lịch'; ?>
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </button>
            </form>
        </div>

        <!-- STEP 2: Date & Time -->
        <div class="bk-step bk-hidden" id="bk-step-2">
            <div class="bk-step-header">
                <div class="bk-header-icon">
                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.8">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                </div>
                <div>
                    <div class="bk-step-badge"><?php echo $is_en ? 'STEP 2 / 3' : 'BƯỚC 2 / 3'; ?></div>
                    <h2 class="bk-step-title"><?php echo $is_en ? 'Select Date & Time' : 'Chọn ngày &amp; giờ'; ?></h2>
                    <p class="bk-step-sub"><?php echo $is_en ? 'Choose a suitable time slot for our counselor to call you' : 'Chọn thời gian phù hợp để chuyên viên gọi tư vấn cho bạn'; ?></p>
                </div>
            </div>

            <div class="bk-calendar-wrap">
                <div class="bk-cal-header">
                    <button type="button" class="bk-cal-nav" id="bk-cal-prev" aria-label="<?php echo $is_en ? 'Previous month' : 'Tháng trước'; ?>">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <span class="bk-cal-month-label" id="bk-cal-month-label"></span>
                    <button type="button" class="bk-cal-nav" id="bk-cal-next" aria-label="<?php echo $is_en ? 'Next month' : 'Tháng tiếp theo'; ?>">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
                <div class="bk-cal-weekdays">
                    <?php if ($is_en): ?>
                        <span>Mo</span><span>Tu</span><span>We</span><span>Th</span><span>Fr</span><span>Sa</span><span>Su</span>
                    <?php else: ?>
                        <span>T2</span><span>T3</span><span>T4</span><span>T5</span><span>T6</span><span>T7</span><span>CN</span>
                    <?php endif; ?>
                </div>
                <div class="bk-cal-grid" id="bk-cal-grid"></div>
            </div>

            <div class="bk-time-section" id="bk-time-section">
                <div class="bk-time-label">
                    <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                    <span id="bk-selected-date-label"><?php echo $is_en ? 'Please select a date first' : 'Vui lòng chọn ngày trước'; ?></span>
                </div>
                <div class="bk-time-grid" id="bk-time-grid"></div>
                <span class="bk-err" id="bk-time-err"></span>
            </div>

            <div class="bk-step-actions">
                <button type="button" class="bk-btn-back" id="bk-back-2" aria-label="<?php echo $is_en ? 'Go back' : 'Quay lại bước trước'; ?>">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5M12 19l-7-7 7-7" />
                    </svg>
                    <?php echo $is_en ? 'Back' : 'Quay lại'; ?>
                </button>
                <button type="button" class="bk-btn-next" id="bk-next-2" aria-label="<?php echo $is_en ? 'Review confirmation' : 'Sang bước tiếp theo: xem xác nhận'; ?>">
                    <?php echo $is_en ? 'Review Confirmation' : 'Xem xác nhận'; ?>
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- STEP 3: Confirm -->
        <div class="bk-step bk-hidden" id="bk-step-3">
            <div class="bk-step-header">
                <div class="bk-header-icon">
                    <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                </div>
                <div>
                    <div class="bk-step-badge"><?php echo $is_en ? 'STEP 3 / 3' : 'BƯỚC 3 / 3'; ?></div>
                    <h2 class="bk-step-title"><?php echo $is_en ? 'Confirm Appointment' : 'Xác nhận lịch hẹn'; ?></h2>
                    <p class="bk-step-sub"><?php echo $is_en ? 'Please double check your details before confirming' : 'Vui lòng kiểm tra kỹ các thông tin trước khi xác nhận đặt lịch'; ?></p>
                </div>
            </div>

            <div class="bk-confirm-summary">
                <div class="bk-confirm-item-data">
                    <span class="bk-confirm-lbl"><?php echo $is_en ? 'Appointment Time' : 'Lịch tư vấn'; ?></span>
                    <div class="bk-confirm-val">
                        <svg class="svg-icon fa-calendar-check fa-regular" viewBox="0 0 448 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zM329 305c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-95 95-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L329 305z"/></svg>
                        <span id="bk-confirm-date">-</span> &nbsp;<?php echo $is_en ? 'at' : 'lúc'; ?>&nbsp;
                        <span id="bk-confirm-time">-</span>
                    </div>
                </div>
                <div class="bk-confirm-grid">
                    <div class="bk-confirm-cell">
                        <span class="bk-confirm-lbl"><?php echo $is_en ? 'Full Name' : 'Họ và tên'; ?></span>
                        <span class="bk-confirm-val" id="bk-confirm-name">-</span>
                    </div>
                    <div class="bk-confirm-cell">
                        <span class="bk-confirm-lbl"><?php echo $is_en ? 'Phone Number' : 'Số điện thoại'; ?></span>
                        <span class="bk-confirm-val" id="bk-confirm-phone">-</span>
                    </div>
                    <div class="bk-confirm-cell">
                        <span class="bk-confirm-lbl">Email</span>
                        <span class="bk-confirm-val" id="bk-confirm-email" style="word-break: break-all;">-</span>
                    </div>
                    <div class="bk-confirm-cell">
                        <span class="bk-confirm-lbl"><?php echo $is_en ? 'Program' : 'Chương trình'; ?></span>
                        <span class="bk-confirm-val" id="bk-confirm-program">-</span>
                    </div>
                </div>
            </div>

            <div class="bk-step-actions">
                <button type="button" class="bk-btn-back" id="bk-back-3" aria-label="<?php echo $is_en ? 'Go back' : 'Quay lại bước trước'; ?>">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5M12 19l-7-7 7-7" />
                    </svg>
                    <?php echo $is_en ? 'Back' : 'Quay lại'; ?>
                </button>
                <button type="button" class="bk-btn-next" id="bk-confirm-btn" aria-label="<?php echo $is_en ? 'Confirm and book' : 'Xác nhận đặt lịch'; ?>">
                    <?php echo $is_en ? 'Confirm & Book' : 'Xác nhận đặt lịch'; ?>
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- SUCCESS STATE -->
        <div class="bk-step bk-hidden" id="bk-step-success">
            <div class="bk-success-icon-box">
                <svg viewBox="0 0 52 52" class="bk-checkmark">
                    <circle cx="26" cy="26" r="25" fill="none" class="bk-checkmark-circle" />
                    <path fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" class="bk-checkmark-check" />
                </svg>
            </div>
            <h2 class="bk-success-title"><?php echo $is_en ? 'Booking Successful!' : 'Đặt lịch thành công!'; ?></h2>
            <p class="bk-success-sub" id="bk-success-msg">
                <?php echo $is_en ? 'Your appointment has been booked. A counselor will call you at the registered time.' : 'Thông tin lịch hẹn của bạn đã được ghi nhận. Chuyên viên sẽ gọi cho bạn theo khung giờ đăng ký.'; ?>
            </p>

            <div class="bk-success-details">
                <div class="bk-success-details-row">
                    <span><?php echo $is_en ? 'Student:' : 'Học viên:'; ?></span>
                    <strong id="bk-success-name">-</strong>
                </div>
                <div class="bk-success-details-row">
                    <span><?php echo $is_en ? 'Date:' : 'Ngày hẹn:'; ?></span>
                    <strong id="bk-success-date">-</strong>
                </div>
                <div class="bk-success-details-row">
                    <span><?php echo $is_en ? 'Time:' : 'Khung giờ:'; ?></span>
                    <strong id="bk-success-time">-</strong>
                </div>
            </div>

            <button type="button" class="bk-btn-done" id="bk-done-btn"><?php echo $is_en ? 'Done' : 'Hoàn tất'; ?></button>
        </div>
    </div>
</div>

<!-- Modal show/hide and Submit script wrappers -->
<script>
    var activeCtaSource = 'unknown';

    function showform(ctaSource = 'general_cta') {
        let resolvedSource = 'general_cta';
        if (ctaSource) {
            if (typeof ctaSource === 'object' && ctaSource.innerText) {
                resolvedSource = ctaSource.innerText.replace(/\s+/g, ' ').trim();
            } else if (typeof ctaSource === 'string') {
                let el = null;
                try {
                    el = document.getElementById(ctaSource);
                } catch (e) { }

                if (!el && /^[a-zA-Z_-][a-zA-Z0-9_-]*$/.test(ctaSource)) {
                    try {
                        el = document.querySelector('.' + ctaSource);
                    } catch (e) { }
                }

                if (!el) {
                    try {
                        el = document.querySelector(`[data-cta="${ctaSource.replace(/"/g, '\\"')}"]`);
                    } catch (e) { }
                }

                if (el && el.innerText) {
                    resolvedSource = el.innerText.replace(/\s+/g, ' ').trim();
                } else {
                    resolvedSource = ctaSource;
                }
            } else {
                resolvedSource = String(ctaSource);
            }
        }
        activeCtaSource = resolvedSource;

        if (typeof window.openRegModal === 'function') {
            window.openRegModal(resolvedSource);
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
    }

    function closeRegModal() {
        if (typeof window.closeRegModal === 'function') {
            window.closeRegModal();
        } else {
            const regModal = document.getElementById('reg-modal');
            if (regModal) {
                regModal.classList.remove('open');
                regModal.setAttribute('aria-hidden', 'true');
                setTimeout(function () {
                    regModal.style.display = 'none';
                }, 400);
            }
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('modal-cta-form');
        if (!form) return;

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const nameInput = document.getElementById('modal-fullname') || form.querySelector('input[placeholder*="Họ và tên"]') || form.querySelector('input[type="text"]');
            const phoneInput = document.getElementById('modal-phone') || form.querySelector('input[placeholder*="Số điện thoại"]') || form.querySelector('input[type="tel"]');
            const emailInput = document.getElementById('modal-email') || form.querySelector('input[placeholder*="email"]') || form.querySelector('input[type="email"]');
            const eduSelect = document.getElementById('modal-education') || form.querySelector('select[name="education"]');
            const engSelect = document.getElementById('modal-english') || form.querySelector('select[name="english"]');
            const msgTextarea = document.getElementById('modal-message') || form.querySelector('textarea[name="message"]');

            const name = nameInput ? nameInput.value.trim() : '';
            const phone = phoneInput ? phoneInput.value.trim() : '';
            const email = emailInput ? emailInput.value.trim() : '';
            const eduVal = eduSelect ? eduSelect.value : '';
            const engVal = engSelect ? engSelect.value : '';
            const msgVal = msgTextarea ? msgTextarea.value.trim() : '';

            if (typeof isEnMode === 'undefined') { var isEnMode = <?php echo $is_en ? 'true' : 'false'; ?>; }

            if (!name || !phone || !email) {
                alert(isEnMode ? 'Please fill in all required fields.' : 'Vui lòng điền đầy đủ các thông tin bắt buộc.');
                return;
            }

            // Dynamically determine page context from pathname
            const path = window.location.pathname.toLowerCase();
            let sourceVal = "Landing_General";
            let typeVal = "general_page_registration";
            let notePrefix = "Đăng ký tuyển sinh";
            let chuongTrinhVal = "General International Program";

            if (path.includes("so-do-to-chuc")) {
                sourceVal = "Landing_Org_Structure";
                typeVal = "org_page_registration";
                notePrefix = "Đăng ký từ trang Sơ đồ tổ chức";
                chuongTrinhVal = "Cơ cấu tổ chức IDEAS";
            } else if (path.includes("he-thong-ho-tro-hoc-tap-lms-ideas")) {
                sourceVal = "Landing_LMS_Ecosystem";
                typeVal = "lms_page_registration";
                notePrefix = "Đăng ký từ trang LMS";
                chuongTrinhVal = "LMS Moodle và Hệ sinh thái";
            } else if (path.includes("ideas-talk")) {
                sourceVal = "Landing_IDEAS_Talk";
                typeVal = "ideas_talk_registration";
                notePrefix = "Đăng ký từ trang chuyên đề IDEAS Talk";
                chuongTrinhVal = "Chuyên đề IDEAS Talk";
            } else if (path.includes("podcast")) {
                sourceVal = "Landing_Podcast";
                typeVal = "podcast_page_registration";
                notePrefix = "Đăng ký từ trang Podcast";
                chuongTrinhVal = "Podcast Series 01";
            } else if (path.includes("ambassador")) {
                sourceVal = "Landing_Ambassador";
                typeVal = "ambassador_page_registration";
                notePrefix = "Đăng ký từ trang Ambassador";
                chuongTrinhVal = "Chính sách Ambassador";
            } else if (path.includes("sacombank")) {
                sourceVal = "Landing_Sacombank";
                typeVal = "sacombank_page_registration";
                notePrefix = "Đăng ký từ trang Trả góp Sacombank";
                chuongTrinhVal = "Trả góp Sacombank";
            } else if (path.includes("chi-phi") || path.includes("hoc-phi")) {
                sourceVal = "Landing_Fees";
                typeVal = "fees_page_registration";
                notePrefix = "Đăng ký từ trang Học phí";
                chuongTrinhVal = "Các khoản chi phí";
            } else if (path.includes("tri-tue-song-hanh")) {
                sourceVal = "Landing_Tri_Tue_Song_Hanh";
                typeVal = "tri_tue_song_hanh_registration";
                notePrefix = "Đăng ký chương trình Trí tuệ song hành";
                chuongTrinhVal = "Trí tuệ song hành";
            }

            // Override notePrefix dynamically with the page title and program name
            const pageTitle = "<?php
                $page_title = '';
                if (is_search()) {
                    $page_title = 'Tìm kiếm: ' . get_search_query();
                } elseif (is_archive()) {
                    $page_title = single_term_title('', false);
                    if (empty($page_title)) {
                        $page_title = get_the_archive_title();
                    }
                } else {
                    $page_title = get_the_title();
                }
                echo esc_js($page_title);
            ?>";
            const isSingle = <?php echo is_single() ? 'true' : 'false'; ?>;
            notePrefix = isSingle ? `Đăng ký từ bài viết "${pageTitle}" - ${chuongTrinhVal}` : `Đăng ký từ trang "${pageTitle}" - ${chuongTrinhVal}`;

            const eduText = eduSelect && eduSelect.selectedIndex >= 0 ? eduSelect.options[eduSelect.selectedIndex].text : eduVal;
            const engText = engSelect && engSelect.selectedIndex >= 0 ? engSelect.options[engSelect.selectedIndex].text : engVal;

            const noteParts = [];
            if (eduText) noteParts.push('Học vấn: ' + eduText);
            if (engText) noteParts.push('Tiếng Anh: ' + engText);
            if (msgVal) noteParts.push(msgVal);

            const ctaSource = (typeof activeCtaSource !== 'undefined') ? activeCtaSource : 'modal_form';
            noteParts.push('CTA Source: ' + ctaSource);
            const combinedNote = noteParts.join(' | ');

            // Prepare submission payloads
            const payload = {
                form_id: "4fe1eeb0570742a1fdde61af6fc0680c",
                email: email,
                firstName: name,
                phoneNumber: phone,
                time_dat_lich: "",
                note_dat_lich: notePrefix ? `${notePrefix} | ${combinedNote}` : combinedNote,
                chuong_trinh_dat_lich: chuongTrinhVal
            };

            const webhookPayload = {
                name: name,
                phone: phone,
                email: email,
                source: sourceVal,
                type: typeVal,
                tieng_anh: engText,
                hoc_van: eduText,
                time_dat_lich: "",
                chuong_trinh: chuongTrinhVal,
                nhu_cau: `${notePrefix} | Note: ${combinedNote}`
            };

            // Bind UTMs
            const urlParams = new URLSearchParams(window.location.search);
            const utmParams = ['utm_campaign', 'utm_source', 'utm_medium', 'utm_content', 'utm_term'];
            utmParams.forEach(param => {
                const val = urlParams.get(param);
                if (val) webhookPayload[param] = val;
            });

            // Trigger request
            const btn = form.querySelector('button[type="submit"]');
            let originalBtnHtml = '';
            if (btn) {
                btn.disabled = true;
                btn.style.opacity = '0.7';
                originalBtnHtml = btn.innerHTML;
                btn.innerHTML = isEnMode ? '<span><svg class="svg-icon fa-spinner fa-solid fa-spin" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/></svg> Sending...</span>' : '<span><svg class="svg-icon fa-spinner fa-solid fa-spin" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/></svg> Đang gửi...</span>';
            }

            try {
                const p1 = fetch("https://automation.ideas.edu.vn/mail_api/forms.php?route=submit", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(payload)
                });

                const p2 = fetch("https://open.domation.net/sale_data/webhook.php?token=tok_kjhbs32a", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(webhookPayload)
                });

                await Promise.allSettled([p1, p2]);

                // Google Ads Conversion tracking
                if (typeof window.gtag === 'function') {
                    window.gtag('event', 'conversion', {
                        'send_to': 'AW-11205917800/mdXJCOTL-bccEOj4st8p',
                        'value': 1.0,
                        'currency': 'USD'
                    });
                }

                // Handle success
                const successContainer = document.getElementById('modal-form-success');
                if (successContainer) {
                    const successMsg = document.getElementById('modal-success-msg');
                    if (successMsg && name) {
                        successMsg.innerHTML = isEnMode 
                            ? 'Thank you <strong>' + name + '</strong> for your interest. A counselor from IDEAS will contact you shortly.'
                            : 'Cảm ơn bạn <strong>' + name + '</strong> đã quan tâm. Chuyên viên của IDEAS sẽ liên hệ trong thời gian sớm nhất.';
                    }
                    successContainer.classList.add('visible');
                    form.style.display = 'none';
                }
            } catch (error) {
                console.error('Submission error:', error);
                alert(isEnMode ? 'An error occurred. Please try again later.' : 'Có lỗi xảy ra trong quá trình gửi thông tin. Vui lòng thử lại sau.');
            } finally {
                if (btn) {
                    btn.disabled = false;
                    btn.style.opacity = '1';
                    btn.innerHTML = originalBtnHtml;
                }
            }
        });
    });
</script>

<?php
if (!defined('BOOKING_MODAL_JS_LOADED')) {
    define('BOOKING_MODAL_JS_LOADED', true);
    $bk_js_path = get_stylesheet_directory() . '/common-assets/js/booking-modal.min.js';
    $bk_js_version = file_exists($bk_js_path) ? filemtime($bk_js_path) : time();
    ?>
    <script
        src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/booking-modal.min.js?v=<?php echo $bk_js_version; ?>"
        defer></script>
    <?php
}
?>

<!-- Accreditation Detail Modal -->
<div class="accred-modal" id="accred-modal" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="accred-modal-overlay" id="accred-modal-overlay"></div>
    <div class="accred-modal-container" data-lenis-prevent>
        <div class="accred-modal-content">
            <button class="accred-modal-close" id="accred-modal-close" aria-label="<?php echo $is_en ? 'Close modal' : 'Đóng modal'; ?>">✕</button>
            <div class="accred-modal-body">
                <div class="accred-modal-info">
                    <div class="accred-modal-label"><?php echo $is_en ? 'Accreditation Detail' : 'Chi tiết kiểm định'; ?></div>
                    <h3 class="accred-modal-title" id="accred-title"></h3>
                    <div class="accred-modal-desc" id="accred-desc"></div>
                </div>
            </div>
        </div>
        <div class="accred-modal-video-pane" id="accred-video-pane">
            <div class="accred-video-loading">
                <svg class="svg-icon fa-spinner fa-solid fa-spin" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/></svg>
            </div>
            <iframe id="accred-video-iframe" src="" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
        </div>
    </div>
</div>

<!-- 3. Lightbox Modal for accreditation/certificate viewing -->
<div class="lightbox" id="lightbox" role="dialog" aria-modal="true" aria-label="<?php echo $is_en ? 'View zoomed image' : 'Xem ảnh phóng to'; ?>">
    <button class="lightbox-close" id="lightbox-close" aria-label="<?php echo $is_en ? 'Close image' : 'Đóng ảnh'; ?>">✕</button>
    <div class="lightbox-content">
        <img id="lightbox-img" src="" alt="">
    </div>
</div>

<!-- Reels Video Modal for Program Pages -->
<div class="fb-reel-modal" id="fb-reel-modal" style="display: none;">
    <div class="fb-reel-modal-overlay"></div>
    <div class="fb-reel-modal-container">
        <button class="fb-reel-modal-close" aria-label="<?php echo $is_en ? 'Close' : 'Đóng'; ?>">&times;</button>
        <div class="fb-reel-video-wrapper">
            <div class="fb-reel-video-loading">
                <svg class="svg-icon fa-spinner fa-solid fa-spin" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/></svg>
            </div>
            <iframe id="fb-reel-iframe" src="" style="border:none;overflow:hidden;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; encrypted-media; picture-in-picture"></iframe>
        </div>
        <a href="<?php echo $is_en ? home_url('/en/reel') : home_url('/reel'); ?>" class="fb-reel-more-btn" id="fb-reel-more-btn">
            <span><?php echo $is_en ? 'Explore More Reels' : 'Khám phá thêm Reels tư vấn'; ?></span> <svg class="svg-icon fa-chevron-right fa-solid" viewBox="0 0 320 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>
        </a>
    </div>
</div>

<!-- Global Floating Play Button for Reels -->
<?php
$current_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
$is_reel_page = (strpos($current_uri, '/reel') !== false);
if (!$is_reel_page):
?>
<a href="<?php echo $is_en ? home_url('/en/reel') : home_url('/reel'); ?>" class="global-floating-reel-btn" aria-label="<?php echo $is_en ? 'Watch Reels' : 'Xem Reels'; ?>">
    <svg class="svg-icon fa-circle-play fa-solid" viewBox="0 0 512 512" width="16" height="16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9l0 176c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z"/></svg>
</a>
<?php endif; ?>

<!-- Book Flip Profile Modal -->
<style>
html.profile-modal-open,
body.profile-modal-open {
    overflow: hidden !important;
    height: 100% !important;
}
.profile-modal {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 99999;
    background: rgba(15, 23, 42, 0.95);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    justify-content: center;
    align-items: center;
    overflow: hidden;
    opacity: 0;
    transition: opacity 0.4s ease;
}
.profile-modal.open {
    display: flex;
    opacity: 1;
}
.profile-modal-content {
    position: relative;
    width: 95vw;
    height: 90vh;
    max-width: 1100px;
    max-height: 850px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    transform: scale(0.9);
    transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}
.profile-modal.open .profile-modal-content {
    transform: scale(1);
}
.profile-modal-close {
    position: absolute;
    top: 30px;
    right: 30px;
    background: rgba(255, 255, 255, 0.1);
    border: none;
    color: #fff;
    font-size: 2.2rem;
    cursor: pointer;
    line-height: 1;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    z-index: 100000;
}
.profile-modal-close:hover {
    color: #ffffff;
    background: #ab0e00;
    transform: rotate(90deg);
}
.profile-book-container-single {
    position: relative;
    width: 100%;
    height: calc(100% - 60px);
    perspective: 1500px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.profile-book-single {
    position: relative;
    width: 990px;
    height: 700px;
    transform-style: preserve-3d;
    box-shadow: 0 30px 70px rgba(0,0,0,0.5);
    border-radius: 12px;
}
.profile-page-single {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-size: 100% 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-color: #fff;
    border-radius: 12px;
    border: 1px solid rgba(0, 0, 0, 0.08);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    overflow: hidden;
}
.profile-page-loading {
    position: absolute;
    inset: 0;
    background: #f8fafc;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 2;
    transition: opacity 0.3s;
    border-radius: 12px;
}
.profile-page-loading.loaded {
    opacity: 0;
    pointer-events: none;
}
.profile-flipbook-controls {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 16px;
    margin-top: 28px;
    color: #fff;
    font-weight: 600;
    z-index: 10;
    width: 100%;
}
.profile-flipbook-btn {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #fff;
    padding: 10px 24px;
    border-radius: 30px;
    font-weight: 700;
    cursor: pointer;
    font-size: 0.9rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    display: flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
}
.profile-flipbook-btn:hover:not(:disabled) {
    background: #ab0e00;
    border-color: #ab0e00;
    transform: translateY(-1px);
}
.profile-flipbook-btn:disabled {
    opacity: 0.3;
    cursor: not-allowed;
    transform: none;
}
#profile-page-num {
    font-size: 0.95rem;
    letter-spacing: 0.05em;
    background: rgba(15, 23, 42, 0.6);
    border: 1px solid rgba(255, 255, 255, 0.1);
    padding: 8px 20px;
    border-radius: 16px;
    min-width: 130px;
    text-align: center;
    white-space: nowrap;
}

@media (max-width: 1100px) {
    .profile-book-single {
        width: 85vw !important;
        height: calc(85vw / 1.414) !important;
    }
    .profile-modal-content {
        width: 95vw;
        height: 75vh;
    }
}
</style>

<div class="profile-modal" id="profile-book-modal">
    <button class="profile-modal-close" onclick="closeProfileBook()">&times;</button>
    <div class="profile-modal-content">
        <div class="profile-book-container-single">
            <div class="profile-book-single" id="profile-pages-container">
                <!-- Javascript will generate 32 pages here -->
            </div>
        </div>
        <div class="profile-flipbook-controls">
            <button class="profile-flipbook-btn" id="profile-prev-btn" onclick="prevProfilePage()">
                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                <span><?php echo $is_en ? 'Previous' : 'Trang trước'; ?></span>
            </button>
            <span id="profile-page-num"><?php echo $is_en ? 'Page 1 / 32' : 'Trang 1 / 32'; ?></span>
            <button class="profile-flipbook-btn" id="profile-next-btn" onclick="nextProfilePage()">
                <span><?php echo $is_en ? 'Next' : 'Trang sau'; ?></span>
                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </button>
            <a href="https://ideas.edu.vn/wp-content/uploads/2026/07/IDEAS-Profile.pdf" target="_blank" class="profile-flipbook-btn" id="profile-download-btn" style="text-decoration: none;">
                <svg width="14" height="14" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                </svg>
                <span><?php echo $is_en ? 'Download' : 'Tải PDF'; ?></span>
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/page-flip/dist/js/page-flip.browser.min.js"></script>
<script>
let currentPage = 0;
const totalPages = 32;
let profileBookInitialized = false;

function initProfileBook() {
    if (profileBookInitialized) return;
    const container = document.getElementById('profile-pages-container');
    container.innerHTML = '';
    
    // Generate 32 individual pages
    for (let i = 0; i < totalPages; i++) {
        const page = document.createElement('div');
        page.className = 'profile-page-single';
        
        const pageNum = i + 1;
        const imgUrl = `<?php echo get_stylesheet_directory_uri(); ?>/common-assets/images/profile/page-${pageNum}.png`;
        
        page.style.backgroundImage = `url('${imgUrl}')`;
        page.style.backgroundSize = '100% 100%';
        page.style.backgroundPosition = 'center';
        page.style.backgroundRepeat = 'no-repeat';
        page.style.width = '100%';
        page.style.height = '100%';
        
        page.innerHTML = `
            <div class="profile-page-loading">
                <svg class="svg-icon fa-spinner fa-solid fa-spin" viewBox="0 0 512 512" width="24" height="24" fill="#ab0e00" xmlns="http://www.w3.org/2000/svg"><path d="M304 48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zm0 416a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM48 304a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm464-48a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM142.9 437A48 48 0 1 0 75 369.1 48 48 0 1 0 142.9 437zm0-294.2A48 48 0 1 0 75 75a48 48 0 1 0 67.9 67.9zM369.1 437A48 48 0 1 0 437 369.1 48 48 0 1 0 369.1 437z"/></svg>
            </div>
        `;
        
        container.appendChild(page);
        
        // Hide loader when background image loads
        const preloadImg = new Image();
        preloadImg.src = imgUrl;
        preloadImg.onload = () => {
            page.querySelector('.profile-page-loading')?.classList.add('loaded');
        };
    }
    
    // Initialize StPageFlip
    const isMobile = window.innerWidth <= 1100;
    window.profilePageFlip = new St.PageFlip(container, {
        width: 990,
        height: 700,
        size: "stretch",
        minWidth: isMobile ? 320 : 990,
        minHeight: isMobile ? 226 : 700,
        maxWidth: 2000,
        maxHeight: 1414,
        showCover: false,
        usePortrait: true,
        drawShadow: true,
        flippingTime: 1000,
        showPageCorners: true,
        disableMobile: false
    });
    
    window.profilePageFlip.loadFromHTML(container.querySelectorAll('.profile-page-single'));
    
    // Sync the current page number
    window.profilePageFlip.on('flip', (e) => {
        currentPage = e.data;
        updatePageStates();
    });
    
    profileBookInitialized = true;
    updatePageStates();
}

function openProfileBook() {
    const modal = document.getElementById('profile-book-modal');
    modal.style.display = 'flex';
    setTimeout(() => {
        modal.classList.add('open');
        initProfileBook();
        if (window.profilePageFlip) {
            window.profilePageFlip.update();
        }
        document.documentElement.classList.add('profile-modal-open');
        document.body.classList.add('profile-modal-open');
    }, 10);
}

function closeProfileBook() {
    const modal = document.getElementById('profile-book-modal');
    modal.classList.remove('open');
    setTimeout(() => {
        modal.style.display = 'none';
        document.documentElement.classList.remove('profile-modal-open');
        document.body.classList.remove('profile-modal-open');
    }, 400);
}

function updatePageStates() {
    const pageNumSpan = document.getElementById('profile-page-num');
    const isEn = <?php echo $is_en ? 'true' : 'false'; ?>;
    
    if (currentPage === 0) {
        pageNumSpan.textContent = isEn ? "Cover (Page 1 / 32)" : "Bìa trước (Trang 1 / 32)";
    } else if (currentPage === totalPages - 1) {
        pageNumSpan.textContent = isEn ? "Back Cover (Page 32 / 32)" : "Bìa sau (Trang 32 / 32)";
    } else {
        pageNumSpan.textContent = isEn ? `Page ${currentPage + 1} / 32` : `Trang ${currentPage + 1} / 32`;
    }
    
    // Enable/disable controls
    document.getElementById('profile-prev-btn').disabled = (currentPage === 0);
    document.getElementById('profile-next-btn').disabled = (currentPage === totalPages - 1);
}

function nextProfilePage() {
    if (window.profilePageFlip) {
        window.profilePageFlip.flipNext();
    }
}

function prevProfilePage() {
    if (window.profilePageFlip) {
        window.profilePageFlip.flipPrev();
    }
}

// Keyboard navigation
document.addEventListener('keydown', (e) => {
    const modal = document.getElementById('profile-book-modal');
    if (modal && modal.classList.contains('open')) {
        if (e.key === 'ArrowRight' || e.key === 'Enter' || e.key === ' ') {
            nextProfilePage();
        } else if (e.key === 'ArrowLeft' || e.key === 'Backspace') {
            prevProfilePage();
        } else if (e.key === 'Escape') {
            closeProfileBook();
        }
    }
});
</script>