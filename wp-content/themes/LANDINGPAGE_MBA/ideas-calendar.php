<?php
/**
 * Custom Editorial Calendar Page for WordPress Administration
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Helper function to get small post thumbnail/avatar HTML
if (!function_exists('ideas_get_post_avatar_html')) {
    function ideas_get_post_avatar_html($post_id, $post_title) {
        $thumbnail_url = get_the_post_thumbnail_url($post_id, array(32, 32));
        if ($thumbnail_url) {
            return '<img src="' . esc_url($thumbnail_url) . '" class="post-item-avatar" alt="Post Thumbnail">';
        }
        // Fallback: Elegant colored circle with initials
        $first_letter = mb_strtoupper(mb_substr($post_title, 0, 1));
        $colors = array('#4f46e5', '#0ea5e9', '#10b981', '#f59e0b', '#ec4899', '#8b5cf6', '#ef4444', '#14b8a6', '#f43f5e', '#a855f7');
        $hash = crc32($post_title);
        $color = $colors[abs($hash) % count($colors)];
        return '<div class="post-item-avatar-fallback" style="background-color: ' . esc_attr($color) . ';">' . esc_html($first_letter) . '</div>';
    }
}

// Register Admin Menu Page
add_action('admin_menu', 'ideas_register_editorial_calendar_page');
function ideas_editorial_calendar_menu_icon() {
    return 'dashicons-calendar-alt';
}

function ideas_register_editorial_calendar_page()
{
    // Register as top-level menu page
    add_menu_page(
        'Calender',
        'Calender',
        'edit_posts',
        'ideas-editorial-calendar',
        'ideas_render_editorial_calendar_page',
        'dashicons-calendar-alt',
        6 // Right below Posts menu (position 5)
    );
}

// Render Calendar Page
function ideas_render_editorial_calendar_page()
{
    $time = current_time('timestamp');
    $current_month = isset($_GET['c_month']) ? intval($_GET['c_month']) : (int) date('m', $time);
    $current_year  = isset($_GET['c_year']) ? intval($_GET['c_year']) : (int) date('Y', $time);

    // Validate Month & Year
    if ($current_month < 1 || $current_month > 12) {
        $current_month = (int) date('m', $time);
    }
    if ($current_year < 2000 || $current_year > 2100) {
        $current_year = (int) date('Y', $time);
    }

    // Next/Prev Month Calculations
    $prev_month = $current_month - 1;
    $prev_year  = $current_year;
    if ($prev_month === 0) {
        $prev_month = 12;
        $prev_year--;
    }

    $next_month = $current_month + 1;
    $next_year  = $current_year;
    if ($next_month === 13) {
        $next_month = 1;
        $next_year++;
    }

    // Days in Months
    $days_in_month = (int) date('t', mktime(0, 0, 0, $current_month, 1, $current_year));
    $days_in_prev_month = (int) date('t', mktime(0, 0, 0, $prev_month, 1, $prev_year));

    // Determine Day of Week for the 1st day of month
    $first_day_timestamp = mktime(0, 0, 0, $current_month, 1, $current_year);
    $first_day_of_week = (int) date('N', $first_day_timestamp); // 1 (Mon) to 7 (Sun)

    // Calculate Padding Days
    $prev_month_padding = $first_day_of_week - 1; // e.g. if Thurs (4), we need 3 padding days (Mon, Tue, Wed)
    
    // Grid sizing calculation
    $total_days_shown = $days_in_month + $prev_month_padding;
    $total_cells = ($total_days_shown > 35) ? 42 : 35;
    $next_month_padding = $total_cells - $total_days_shown;

    // Query WordPress posts in this month range
    $start_date_query = sprintf('%d-%02d-01 00:00:00', $current_year, $current_month);
    $end_date_query   = sprintf('%d-%02d-%02d 23:59:59', $current_year, $current_month, $days_in_month);

    $args = array(
        'post_type'      => 'post',
        'post_status'    => array('publish', 'future', 'draft'),
        'posts_per_page' => -1,
        'orderby'        => 'post_date',
        'order'          => 'ASC',
        'date_query'     => array(
            array(
                'after'     => $start_date_query,
                'before'    => $end_date_query,
                'inclusive' => true,
            ),
        ),
    );

    $posts = get_posts($args);

    // Group posts by day
    $posts_by_day = array();
    foreach ($posts as $p) {
        $day = (int) date('j', strtotime($p->post_date));
        $posts_by_day[$day][] = $p;
    }

    // Vietnamese Month Label
    $month_labels = array(
        1 => 'Tháng 1', 2 => 'Tháng 2', 3 => 'Tháng 3', 4 => 'Tháng 4',
        5 => 'Tháng 5', 6 => 'Tháng 6', 7 => 'Tháng 7', 8 => 'Tháng 8',
        9 => 'Tháng 9', 10 => 'Tháng 10', 11 => 'Tháng 11', 12 => 'Tháng 12'
    );
    $month_name_vi = $month_labels[$current_month];

    ?>
    <div class="wrap ideas-calendar-wrap">
        <h1 class="wp-heading-inline">Calender</h1>
        <hr class="wp-header-end">

        <!-- Subtab Navigation -->
        <nav class="nav-tab-wrapper ideas-calendar-tabs" style="margin-top: 15px; margin-bottom: 20px; border-bottom: 1px solid #cbd5e1; padding-bottom: 0;">
            <a href="#calendar-tab" class="nav-tab nav-tab-active" data-tab="calendar-tab">Lịch Biên Tập</a>
            <a href="#ideas-tab" class="nav-tab" data-tab="ideas-tab">Tìm Kiếm & Ý Tưởng AI</a>
        </nav>

        <!-- Tab 1: Editorial Calendar -->
        <div id="calendar-tab" class="ideas-tab-content active-tab">
            <!-- Calendar Main Container -->
            <div class="ideas-calendar-card">
            <!-- Calendar Navigation Header -->
            <div class="ideas-calendar-header">
                <div class="ideas-calendar-nav">
                    <a href="<?php echo esc_url(add_query_arg(array('c_month' => $prev_month, 'c_year' => $prev_year))); ?>" class="ideas-nav-btn prev-btn" title="Tháng trước">
                        <span class="dashicons dashicons-arrow-left-alt2"></span>
                    </a>
                    <span class="ideas-current-month"><?php echo esc_html($month_name_vi . ', ' . $current_year); ?></span>
                    <a href="<?php echo esc_url(add_query_arg(array('c_month' => $next_month, 'c_year' => $next_year))); ?>" class="ideas-nav-btn next-btn" title="Tháng sau">
                        <span class="dashicons dashicons-arrow-right-alt2"></span>
                    </a>
                    <a href="<?php echo esc_url(remove_query_arg(array('c_month', 'c_year'))); ?>" class="ideas-nav-today-btn">Hôm nay</a>
                </div>
                <div class="ideas-calendar-actions">
                    <button type="button" class="ideas-btn ideas-btn-primary ideas-quick-add-trigger">
                        <span class="dashicons dashicons-plus" style="vertical-align: middle; margin-right: 4px; font-size: 16px; width: 16px; height: 16px;"></span>
                        Viết bài mới
                    </button>
                </div>
            </div>

            <!-- Calendar Table Grid -->
            <div class="ideas-calendar-grid-container">
                <!-- Day-of-week headers -->
                <div class="ideas-calendar-week-headers">
                    <div>Thứ hai</div>
                    <div>Thứ ba</div>
                    <div>Thứ tư</div>
                    <div>Thứ năm</div>
                    <div>Thứ sáu</div>
                    <div>Thứ bảy</div>
                    <div>Chủ nhật</div>
                </div>

                <!-- Days cells -->
                <div class="ideas-calendar-days-grid">
                    <?php
                    // 1. Previous Month Padding Days
                    if ($prev_month_padding > 0) {
                        $start_pad_day = $days_in_prev_month - $prev_month_padding + 1;
                        for ($d = $start_pad_day; $d <= $days_in_prev_month; $d++) {
                            $pad_date = sprintf('%d-%02d-%02d', $prev_year, $prev_month, $d);
                            echo '<div class="ideas-calendar-day-cell padding-day" data-date="' . esc_attr($pad_date) . '">';
                            echo '  <span class="day-number">' . intval($d) . '</span>';
                            echo '</div>';
                        }
                    }

                    // 2. Current Month Days
                    $today_date = date('Y-m-d', $time);
                    for ($d = 1; $d <= $days_in_month; $d++) {
                        $cell_date = sprintf('%d-%02d-%02d', $current_year, $current_month, $d);
                        $is_today = ($cell_date === $today_date) ? 'today-day' : '';

                        echo '<div class="ideas-calendar-day-cell ' . esc_attr($is_today) . '" data-date="' . esc_attr($cell_date) . '">';
                        echo '  <div class="ideas-cell-header">';
                        echo '      <span class="day-number">' . intval($d) . '</span>';
                        echo '      <span class="cell-quick-add-btn" title="Thêm bài viết ngày này" data-date="' . esc_attr($cell_date) . '">+</span>';
                        echo '  </div>';

                        // Render posts if they exist for this day
                        if (isset($posts_by_day[$d])) {
                            echo '<div class="ideas-calendar-post-list">';
                            foreach ($posts_by_day[$d] as $post) {
                                $status = $post->post_status;
                                $status_cls = 'publish';
                                $status_lbl = 'Đã đăng';
                                if ($status === 'future') {
                                    $status_cls = 'future';
                                    $status_lbl = 'Lên lịch';
                                } elseif ($status === 'draft') {
                                    $status_cls = 'draft';
                                    $status_lbl = 'Nháp';
                                }

                                $edit_link = get_edit_post_link($post->ID);
                                $post_time = date('H:i', strtotime($post->post_date));

                                echo '<div class="ideas-calendar-post-item ' . esc_attr($status_cls) . '" title="' . esc_attr($post->post_title) . ' (' . esc_attr($status_lbl) . ' lúc ' . esc_attr($post_time) . ')">';
                                echo '  ' . ideas_get_post_avatar_html($post->ID, $post->post_title);
                                echo '  <a href="' . esc_url($edit_link) . '" class="post-item-title-link">' . esc_html(wp_trim_words($post->post_title, 4)) . '</a>';
                                echo '  <span class="post-time-indicator">' . esc_html($post_time) . '</span>';
                                echo '  <span class="status-dot ' . esc_attr($status_cls) . '" title="' . esc_attr($status_lbl) . '"></span>';
                                echo '</div>';
                            }
                            echo '</div>';
                        }

                        echo '</div>';
                    }

                    // 3. Next Month Padding Days
                    if ($next_month_padding > 0) {
                        for ($d = 1; $d <= $next_month_padding; $d++) {
                            $pad_date = sprintf('%d-%02d-%02d', $next_year, $next_month, $d);
                            echo '<div class="ideas-calendar-day-cell padding-day" data-date="' . esc_attr($pad_date) . '">';
                            echo '  <span class="day-number">' . intval($d) . '</span>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div><!-- ideas-calendar-card -->
    </div><!-- calendar-tab -->

    <!-- Tab 2: Search & AI Recommendations -->
    <div id="ideas-tab" class="ideas-tab-content" style="display: none;">
        <div class="ideas-planner-layout">
            <!-- Left Panel: Topic Search -->
            <div class="ideas-planner-card ideas-search-card">
                <div class="ideas-card-header-accent" style="display: flex; align-items: center; gap: 8px; margin-bottom: 10px; border-bottom: 1.5px solid #f1f5f9; padding-bottom: 12px;">
                    <span class="dashicons dashicons-search" style="font-size: 20px; width:20px; height:20px; color: #ab0e00; margin: 0;"></span>
                    <h3 style="margin: 0; font-size: 16px; font-weight: 800; color: #1e293b;">Kiểm tra chủ đề trùng lặp</h3>
                </div>
                <p class="ideas-card-subtitle" style="font-size: 12px; color: #64748b; margin-top: 0; margin-bottom: 20px; line-height: 1.5;">Tìm kiếm tiêu đề các bài viết đã tồn tại trên hệ thống để tránh trùng lặp nội dung khi lên bài mới.</p>
                
                <div class="ideas-search-input-wrapper" style="position: relative; margin-bottom: 20px;">
                    <input type="text" id="ideas-topic-search-input" class="ideas-form-input" placeholder="Nhập tiêu đề hoặc từ khóa chủ đề (ví dụ: MBA tuyển sinh)..." style="width: 100% !important; padding: 12px 14px !important; font-size: 13px !important; border-radius: 8px !important;">
                    <span class="ideas-search-clear-btn" id="ideas-search-clear" style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); font-size: 18px; color: #94a3b8; cursor: pointer; display: none;">&times;</span>
                </div>

                <div id="ideas-search-results-container" class="ideas-search-results-list" style="max-height: 400px; overflow-y: auto; display: flex; flex-direction: column; gap: 10px;">
                    <!-- Default state -->
                    <div class="ideas-search-placeholder" style="text-align: center; padding: 40px 20px; color: #94a3b8;">
                        <span class="dashicons dashicons-search" style="font-size: 40px; width:40px; height:40px; opacity:0.3; margin-bottom:12px; display: inline-block;"></span>
                        <p style="margin: 0; font-size: 13px;">Nhập từ khóa ở trên để tìm kiếm bài trùng lặp</p>
                    </div>
                </div>
            </div>

            <!-- Right Panel: AI Recommendation Assistant -->
            <div class="ideas-planner-card ideas-ai-card">
                <div class="ideas-card-header-accent" style="display: flex; align-items: center; gap: 8px; margin-bottom: 10px; border-bottom: 1.5px solid #f1f5f9; padding-bottom: 12px;">
                    <span class="dashicons dashicons-admin-customizer" style="font-size: 20px; width:20px; height:20px; color: #0284c7; margin: 0;"></span>
                    <h3 style="margin: 0; font-size: 16px; font-weight: 800; color: #1e293b;">Trợ lý AI Đề xuất Chủ đề</h3>
                </div>
                <p class="ideas-card-subtitle" style="font-size: 12px; color: #64748b; margin-top: 0; margin-bottom: 20px; line-height: 1.5;">Phân tích các bài viết hiện tại trên hệ thống để gợi ý các chủ đề tiếp theo liên quan nhưng không lo trùng lặp.</p>
                
                <div class="ideas-ai-filters" style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 20px;">
                    <div class="ideas-form-group" style="margin-bottom: 0;">
                        <label class="ideas-form-label" style="font-size: 11px; font-weight: 700; color: #475569; margin-bottom: 6px;">Chọn Danh mục</label>
                        <select id="ideas-ai-category" class="ideas-form-select" style="width: 100% !important; font-size: 13px !important; border-radius: 8px !important;">
                            <option value="all">Tất cả danh mục</option>
                            <option value="mba">Chương trình MBA</option>
                            <option value="swiss-umef">Đại học Swiss UMEF</option>
                            <option value="lms">Quản lý Học tập LMS</option>
                            <option value="experience">Kinh nghiệm & Kỹ năng</option>
                        </select>
                    </div>
                    <div class="ideas-form-group" style="margin-bottom: 0;">
                        <label class="ideas-form-label" style="font-size: 11px; font-weight: 700; color: #475569; margin-bottom: 6px;">Chủ đề định hướng</label>
                        <select id="ideas-ai-theme" class="ideas-form-select" style="width: 100% !important; font-size: 13px !important; border-radius: 8px !important;">
                            <option value="all">Tất cả chủ đề</option>
                            <option value="academic">Học thuật & Đào tạo</option>
                            <option value="career">Cơ hội & Thăng tiến Sự nghiệp</option>
                            <option value="admission">Tuyển sinh & Học bổng</option>
                            <option value="experience">Trải nghiệm của Học viên</option>
                        </select>
                    </div>
                </div>

                <button type="button" id="ideas-ai-generate-btn" class="ideas-btn ideas-btn-primary" style="width: 100%; justify-content: center; padding: 12px; font-size: 13px; margin-top: 10px; background: linear-gradient(135deg, #0284c7, #0369a1); box-shadow: 0 4px 12px rgba(3, 105, 161, 0.2); border: none; cursor: pointer; color:#fff; font-weight:700; display:flex; align-items:center; border-radius:8px;">
                    <span class="dashicons dashicons-update" style="margin-right: 6px; font-size: 18px; width:18px; height:18px;"></span>
                    Tạo chủ đề đề xuất bằng AI
                </button>

                <!-- AI Loading/Status Box -->
                <div id="ideas-ai-loading" class="ideas-ai-loading-box" style="display: none; border: 1px dashed #0284c7; background: #f0f9ff; border-radius: 12px; padding: 20px; margin-top: 20px; text-align: center;">
                    <div class="ideas-ai-spinner" style="border: 3px solid #e0f2fe; border-top: 3px solid #0284c7; border-radius: 50%; width: 24px; height: 24px; animation: spin 1s linear infinite; margin: 0 auto 12px auto;"></div>
                    <div class="ideas-ai-loading-steps" style="font-size: 12px; color: #0369a1; display: flex; flex-direction: column; gap: 6px;">
                        <div class="ai-step active" id="ai-step-1" style="font-weight:700;">Đang phân tích tiêu đề các bài viết hiện có...</div>
                        <div class="ai-step" id="ai-step-2" style="opacity: 0.5;">Trích xuất từ khóa cốt lõi & lọc trùng lặp...</div>
                        <div class="ai-step" id="ai-step-3" style="opacity: 0.5;">Đang thiết kế chủ đề đề xuất mới...</div>
                    </div>
                </div>

                <!-- AI Results List -->
                <div id="ideas-ai-results" class="ideas-ai-results-list" style="display: none; max-height: 400px; overflow-y: auto; margin-top: 20px; display: flex; flex-direction: column; gap: 12px;">
                    <!-- AI Cards injected dynamically -->
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Add New Post Modal -->
    <div id="ideas-calendar-modal" class="ideas-calendar-modal-overlay">
        <div class="ideas-calendar-modal-content">
            <span class="ideas-calendar-modal-close" title="Đóng modal">&times;</span>
            <h3 style="margin-top: 0; margin-bottom: 20px; font-weight: 800; color: #ab0e00; font-size: 18px; border-bottom: 1.5px solid #f1f5f9; padding-bottom: 12px; display: flex; align-items: center; gap: 8px;">
                <span class="dashicons dashicons-welcome-write-blog" style="font-size: 20px; width: 20px; height: 20px;"></span>
                Thêm bài viết mới / Ghi chú
            </h3>
            <form id="ideas-calendar-modal-form">
                <div class="ideas-form-group">
                    <label class="ideas-form-label">Tiêu đề bài viết</label>
                    <input type="text" name="ideas_post_title" class="ideas-form-input" placeholder="Nhập tiêu đề..." required />
                </div>
                <div class="ideas-form-row">
                    <div class="ideas-form-group">
                        <label class="ideas-form-label">Ngày lên lịch</label>
                        <input type="date" name="ideas_post_date" class="ideas-form-input" required />
                    </div>
                    <div class="ideas-form-group">
                        <label class="ideas-form-label">Giờ lên lịch</label>
                        <input type="time" name="ideas_post_time" class="ideas-form-input" value="09:00" required />
                    </div>
                </div>
                <div class="ideas-form-group">
                    <label class="ideas-form-label">Trạng thái bài đăng</label>
                    <select name="ideas_post_status" class="ideas-form-select">
                        <option value="draft">Bản nháp (Draft)</option>
                        <option value="future">Lên lịch (Schedule)</option>
                        <option value="publish">Đăng ngay (Publish)</option>
                    </select>
                </div>
                <div class="ideas-form-group">
                    <label class="ideas-form-label">Nội dung ghi chú</label>
                    <textarea name="ideas_post_content" class="ideas-form-textarea" rows="4" placeholder="Nhập nội dung nháp hoặc các thông tin ghi chú khác..."></textarea>
                </div>
                <div class="ideas-form-actions" style="margin-top: 24px; display: flex; justify-content: flex-end; gap: 12px;">
                    <button type="button" class="ideas-modal-btn btn-secondary ideas-cancel-btn">Hủy bỏ</button>
                    <button type="submit" class="ideas-modal-btn btn-primary ideas-save-btn">Lưu bài viết</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Embed CSS and JS -->
    <style>
        .ideas-calendar-wrap {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
            padding-right: 20px;
        }
        .ideas-calendar-card {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
            margin-top: 20px;
            overflow: hidden;
        }
        .ideas-calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid #f1f5f9;
            background: #ffffff;
        }
        .ideas-calendar-nav {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .ideas-nav-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            background: #ffffff;
            color: #475569;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .ideas-nav-btn:hover {
            border-color: #ab0e00;
            color: #ab0e00;
            background: #fdf2f2;
        }
        .ideas-nav-btn .dashicons {
            font-size: 16px;
            width: 16px;
            height: 16px;
            line-height: 1;
        }
        .ideas-current-month {
            font-size: 18px;
            font-weight: 800;
            color: #0f172a;
            min-width: 160px;
            text-align: center;
        }
        .ideas-nav-today-btn {
            padding: 6px 14px;
            background: #f1f5f9;
            border: 1px solid #cbd5e1;
            color: #475569;
            font-weight: 700;
            font-size: 12px;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s;
        }
        .ideas-nav-today-btn:hover {
            background: #e2e8f0;
            color: #0f172a;
        }
        
        .ideas-btn {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            font-weight: 700;
            font-size: 13px;
            border-radius: 8px;
            cursor: pointer;
            border: none;
            transition: all 0.2s;
            font-family: inherit;
        }
        .ideas-btn-primary {
            background: var(--grad-primary, linear-gradient(135deg, #8c1000, #ab0e00));
            color: #ffffff;
            box-shadow: 0 4px 10px rgba(171, 14, 0, 0.15);
        }
        .ideas-btn-primary:hover {
            opacity: 0.95;
            transform: translateY(-1px);
            box-shadow: 0 6px 14px rgba(171, 14, 0, 0.22);
        }

        /* Grid elements */
        .ideas-calendar-week-headers {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
        }
        .ideas-calendar-week-headers div {
            padding: 12px 10px;
            text-align: center;
            font-weight: 700;
            color: #475569;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .ideas-calendar-days-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            grid-auto-rows: minmax(115px, auto);
            background: #cbd5e1; /* border colors via grid-gap or manual borders */
            gap: 1px;
        }

        .ideas-calendar-day-cell {
            background: #ffffff;
            padding: 10px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            position: relative;
            transition: background 0.15s ease;
        }
        .ideas-calendar-day-cell:hover {
            background: #f8fafc;
        }
        .ideas-calendar-day-cell:hover .cell-quick-add-btn {
            opacity: 1;
        }

        .ideas-calendar-day-cell.padding-day {
            background: #f1f5f9;
        }
        .ideas-calendar-day-cell.padding-day .day-number {
            color: #94a3b8;
        }

        .ideas-calendar-day-cell.today-day {
            background: #fdf2f2;
        }
        .ideas-calendar-day-cell.today-day .day-number {
            color: #ab0e00;
            background: #fef2f2;
            border: 1px solid rgba(171, 14, 0, 0.15);
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
        }

        .ideas-cell-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .day-number {
            font-weight: 700;
            color: #1e293b;
            font-size: 13px;
        }
        .cell-quick-add-btn {
            width: 18px;
            height: 18px;
            border-radius: 4px;
            background: #ab0e00;
            color: #ffffff;
            font-size: 13px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.2s ease, background 0.15s;
        }
        .cell-quick-add-btn:hover {
            background: #8c1000;
        }

        /* Post Items */
        .ideas-calendar-post-list {
            display: flex;
            flex-direction: column;
            gap: 4px;
            overflow-y: auto;
            max-height: 120px;
        }
        .ideas-calendar-post-item {
            display: flex;
            align-items: center;
            padding: 3px 6px;
            border-radius: 6px;
            font-size: 11px;
            gap: 6px;
            transition: all 0.2s ease;
            text-decoration: none;
            box-sizing: border-box;
            border: 1px solid transparent;
            box-shadow: 0 1px 2px rgba(0,0,0,0.02);
        }
        .ideas-calendar-post-item:hover {
            transform: translateY(-1px);
            box-shadow: 0 3px 6px rgba(0,0,0,0.06);
        }

        .ideas-calendar-post-item.publish {
            background: #f0fdf4;
            color: #166534;
            border-color: #bbf7d0;
        }
        .ideas-calendar-post-item.publish:hover {
            border-color: #86efac;
        }
        .ideas-calendar-post-item.future {
            background: #fffbeb;
            color: #92400e;
            border-color: #fef08a;
        }
        .ideas-calendar-post-item.future:hover {
            border-color: #fde047;
        }
        .ideas-calendar-post-item.draft {
            background: #f8fafc;
            color: #334155;
            border-color: #e2e8f0;
        }
        .ideas-calendar-post-item.draft:hover {
            border-color: #cbd5e1;
        }

        /* Post Avatar & Fallback styles */
        .post-item-avatar {
            width: 18px;
            height: 18px;
            border-radius: 4px;
            object-fit: cover;
            flex-shrink: 0;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        .post-item-avatar-fallback {
            width: 18px;
            height: 18px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            font-weight: 800;
            color: #ffffff;
            flex-shrink: 0;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }

        .post-time-indicator {
            font-weight: 700;
            font-size: 9px;
            opacity: 0.7;
            flex-shrink: 0;
            background: rgba(0, 0, 0, 0.04);
            padding: 1px 4px;
            border-radius: 4px;
        }
        .ideas-calendar-post-item.publish .post-time-indicator {
            background: rgba(22, 101, 52, 0.08);
        }
        .ideas-calendar-post-item.future .post-time-indicator {
            background: rgba(146, 64, 14, 0.08);
        }
        .ideas-calendar-post-item.draft .post-time-indicator {
            background: rgba(51, 65, 85, 0.08);
        }

        .post-item-title-link {
            text-decoration: none;
            color: inherit !important;
            font-weight: 700;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            flex-grow: 1;
            font-size: 11px;
            text-shadow: none !important;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            flex-shrink: 0;
        }
        .status-dot.publish { background: #16a34a; }
        .status-dot.future { background: #ea580c; }
        .status-dot.draft { background: #475569; }

        /* Modal styling */
        .ideas-calendar-modal-overlay {
            display: none;
            position: fixed;
            z-index: 99999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(15, 23, 42, 0.60);
            backdrop-filter: blur(4px);
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
        }
        .ideas-calendar-modal-content {
            background-color: #ffffff;
            border-radius: 16px;
            width: 90%;
            max-width: 500px;
            padding: 24px;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.18);
            position: relative;
            font-family: inherit;
            animation: modalIn 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-sizing: border-box;
        }
        @keyframes modalIn {
            from { opacity: 0; transform: scale(0.95) translateY(10px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }

        .ideas-calendar-modal-close {
            position: absolute;
            top: 22px;
            right: 22px;
            font-size: 24px;
            font-weight: 700;
            color: #64748b;
            cursor: pointer;
            transition: color 0.15s;
            line-height: 1;
        }
        .ideas-calendar-modal-close:hover {
            color: #0f172a;
        }

        /* Form styling */
        .ideas-form-group {
            margin-bottom: 16px;
            display: flex;
            flex-direction: column;
            gap: 6px;
            box-sizing: border-box;
        }
        .ideas-form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }
        .ideas-form-label {
            font-size: 12px;
            font-weight: 700;
            color: #475569;
        }
        .ideas-form-input,
        .ideas-form-select,
        .ideas-form-textarea {
            width: 100% !important;
            box-sizing: border-box !important;
            padding: 10px 14px !important;
            border: 1px solid #cbd5e1 !important;
            border-radius: 8px !important;
            background: #ffffff !important;
            font-size: 13px !important;
            color: #1e293b !important;
            outline: none !important;
            box-shadow: none !important;
            transition: border 0.15s;
            font-family: inherit !important;
        }
        .ideas-form-input:focus,
        .ideas-form-select:focus,
        .ideas-form-textarea:focus {
            border-color: #ab0e00 !important;
            box-shadow: 0 0 0 3px rgba(171, 14, 0, 0.08) !important;
        }
        
        .ideas-modal-btn {
            border: none;
            padding: 10px 20px;
            font-weight: 700;
            font-size: 13px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
            font-family: inherit;
        }
        .ideas-modal-btn.btn-secondary {
            background: #f1f5f9;
            color: #475569;
        }
        .ideas-modal-btn.btn-secondary:hover {
            background: #e2e8f0;
            color: #0f172a;
        }
        .ideas-modal-btn.btn-primary {
            background: var(--grad-primary, linear-gradient(135deg, #8c1000, #ab0e00));
            color: #ffffff;
            box-shadow: 0 4px 10px rgba(171, 14, 0, 0.15);
        }
        .ideas-modal-btn.btn-primary:hover {
            opacity: 0.95;
        }
        /* Tabs & Planner Styles */
        .ideas-tab-content {
            display: none;
        }
        .ideas-tab-content.active-tab {
            display: block;
        }

        .ideas-planner-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-top: 20px;
        }
        @media (max-width: 900px) {
            .ideas-planner-layout {
                grid-template-columns: 1fr;
            }
        }
        .ideas-planner-card {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
            padding: 24px;
            box-sizing: border-box;
        }
        
        /* Search results styling */
        .ideas-search-results-list {
            border-top: 1px solid #f1f5f9;
            padding-top: 15px;
            margin-top: 15px;
        }
        .ideas-search-result-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 12px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            transition: all 0.2s;
            text-decoration: none;
            color: inherit;
        }
        .ideas-search-result-item:hover {
            border-color: #cbd5e1;
            background: #f1f5f9;
            transform: translateY(-1px);
        }
        .ideas-search-result-title {
            font-weight: 700;
            font-size: 13px;
            color: #1e293b;
            flex-grow: 1;
            margin-right: 12px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .ideas-search-result-meta {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-shrink: 0;
        }
        .ideas-search-result-date {
            font-size: 11px;
            color: #64748b;
        }

        /* AI Recommendations styling */
        .ideas-ai-card-item {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 16px;
            transition: all 0.2s;
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .ideas-ai-card-item:hover {
            border-color: #b3e0ff;
            background: #f0f9ff;
            box-shadow: 0 4px 12px rgba(2, 132, 199, 0.05);
        }
        .ideas-ai-card-title {
            font-size: 13px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.4;
            margin: 0;
        }
        .ideas-ai-card-tags {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }
        .ideas-ai-tag {
            font-size: 9px;
            font-weight: 700;
            padding: 2px 6px;
            border-radius: 4px;
            text-transform: uppercase;
        }
        .ideas-ai-tag.cat {
            background: #e0f2fe;
            color: #0369a1;
        }
        .ideas-ai-tag.theme {
            background: #faf5ff;
            color: #6b21a8;
        }
        .ideas-ai-card-desc {
            font-size: 11px;
            color: #64748b;
            line-height: 1.4;
            margin: 0;
            border-left: 2px solid #cbd5e1;
            padding-left: 8px;
            font-style: italic;
        }
        .ideas-ai-card-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 4px;
        }
        .ideas-ai-card-btn {
            background: #0284c7;
            color: #ffffff;
            border: none;
            padding: 6px 12px;
            font-size: 11px;
            font-weight: 700;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.15s;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .ideas-ai-card-btn:hover {
            background: #0369a1;
        }

        /* AI Loader Animations */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .ideas-ai-loading-steps .ai-step {
            transition: all 0.3s;
        }
        .ideas-ai-loading-steps .ai-step.active {
            color: #0284c7;
            font-weight: 700;
            opacity: 1 !important;
        }
        .ideas-ai-loading-steps .ai-step.done {
            color: #10b981;
            opacity: 0.8 !important;
        }
    </style>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var modal = $('#ideas-calendar-modal');
            var form = $('#ideas-calendar-modal-form');

            // Subtab switcher
            $('.ideas-calendar-tabs a').on('click', function(e) {
                e.preventDefault();
                $('.ideas-calendar-tabs a').removeClass('nav-tab-active');
                $(this).addClass('nav-tab-active');
                
                var targetTab = $(this).attr('data-tab');
                $('.ideas-tab-content').removeClass('active-tab').hide();
                $('#' + targetTab).addClass('active-tab').fadeIn(150);
            });

            // Topic Search keypress & input listeners
            var searchTimeout;
            $('#ideas-topic-search-input').on('input', function() {
                var query = $(this).val().trim();
                clearTimeout(searchTimeout);
                
                if (query.length === 0) {
                    $('#ideas-search-clear').hide();
                    renderSearchPlaceholder();
                    return;
                }
                
                $('#ideas-search-clear').show();
                
                searchTimeout = setTimeout(function() {
                    performTopicSearch(query);
                }, 300);
            });
            
            $('#ideas-search-clear').on('click', function() {
                $('#ideas-topic-search-input').val('');
                $(this).hide();
                renderSearchPlaceholder();
            });
            
            function renderSearchPlaceholder() {
                $('#ideas-search-results-container').html(
                    '<div class="ideas-search-placeholder" style="text-align: center; padding: 40px 20px; color: #94a3b8;">' +
                    '<span class="dashicons dashicons-search" style="font-size: 40px; width:40px; height:40px; opacity:0.3; margin-bottom:12px; display: inline-block;"></span>' +
                    '<p style="margin: 0; font-size: 13px;">Nhập từ khóa ở trên để tìm kiếm bài trùng lặp</p>' +
                    '</div>'
                );
            }
            
            function performTopicSearch(query) {
                $('#ideas-search-results-container').html(
                    '<div style="text-align: center; padding: 40px 20px; color: #64748b;">' +
                    '<div class="ideas-ai-spinner" style="border: 3px solid #f1f5f9; border-top: 3px solid #ab0e00; border-radius: 50%; width: 20px; height: 20px; animation: spin 1s linear infinite; margin: 0 auto 12px auto;"></div>' +
                    '<p style="font-size: 13px;">Đang tìm kiếm...</p>' +
                    '</div>'
                );
                
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'ideas_search_duplicate_topics',
                        query: query,
                        nonce: '<?php echo wp_create_nonce("ideas_calendar_nonce"); ?>'
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            renderSearchResults(response.data, query);
                        } else {
                            $('#ideas-search-results-container').html('<p style="color: #ab0e00; text-align: center; padding: 20px; font-size: 13px;">Lỗi: ' + response.data + '</p>');
                        }
                    },
                    error: function() {
                        $('#ideas-search-results-container').html('<p style="color: #ab0e00; text-align: center; padding: 20px; font-size: 13px;">Lỗi kết nối server, vui lòng thử lại.</p>');
                    }
                });
            }
            
            function renderSearchResults(results, query) {
                var container = $('#ideas-search-results-container');
                if (!results || results.length === 0) {
                    container.html(
                        '<div style="text-align: center; padding: 30px 20px; background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 12px; color: #166534;">' +
                        '<span class="dashicons dashicons-yes-alt" style="font-size: 36px; width:36px; height:36px; color: #16a34a; margin-bottom: 8px; display: inline-block;"></span>' +
                        '<h4 style="margin: 0 0 4px 0; font-size: 14px; font-weight: 800;">Chủ đề khả dụng!</h4>' +
                        '<p style="margin: 0; font-size: 12px;">Chưa có bài viết nào trùng lặp với từ khóa "<strong>' + escHtml(query) + '</strong>". Bạn có thể lên lịch bài viết này.</p>' +
                        '</div>'
                    );
                    return;
                }
                
                var html = '<div style="font-size: 12px; font-weight: 700; color: #475569; margin-bottom: 8px;">Đã tìm thấy ' + results.length + ' bài viết liên quan:</div>';
                results.forEach(function(post) {
                    var statusLbl = 'Đã đăng';
                    var statusCls = 'publish';
                    if (post.status === 'future') {
                        statusLbl = 'Lên lịch';
                        statusCls = 'future';
                    } else if (post.status === 'draft') {
                        statusLbl = 'Nháp';
                        statusCls = 'draft';
                    }
                    
                    html += '<a href="' + post.edit_link + '" class="ideas-search-result-item" target="_blank" title="Click để chỉnh sửa bài viết này">';
                    html += '  <div class="ideas-search-result-title">' + escHtml(post.title) + '</div>';
                    html += '  <div class="ideas-search-result-meta">';
                    html += '    <span class="ideas-search-result-date">' + post.date + '</span>';
                    html += '    <span class="ideas-calendar-post-item ' + statusCls + '" style="font-size: 10px; padding: 2px 6px; box-shadow: none; border-radius: 4px; pointer-events: none;">' + statusLbl + '</span>';
                    html += '  </div>';
                    html += '</a>';
                });
                
                container.html(html);
            }
            
            function escHtml(str) {
                return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
            }

            // AI recommendations filters & generate click events
            $('#ideas-ai-generate-btn').on('click', function(e) {
                e.preventDefault();
                var generateBtn = $(this);
                var category = $('#ideas-ai-category').val();
                var theme = $('#ideas-ai-theme').val();
                
                generateBtn.prop('disabled', true);
                $('#ideas-ai-results').hide().html('');
                $('#ideas-ai-loading').fadeIn(200);
                
                var step1 = $('#ai-step-1');
                var step2 = $('#ai-step-2');
                var step3 = $('#ai-step-3');
                
                // Animate loading simulation steps
                step1.addClass('active').css('opacity', '1').siblings().removeClass('active').css('opacity', '0.5');
                
                setTimeout(function() {
                    step1.removeClass('active').addClass('done').css('opacity', '0.8');
                    step2.addClass('active').css('opacity', '1');
                    
                    setTimeout(function() {
                        step2.removeClass('active').addClass('done').css('opacity', '0.8');
                        step3.addClass('active').css('opacity', '1');
                        
                        // Run the AJAX request to get AI recommendations
                        $.ajax({
                            url: ajaxurl,
                            type: 'POST',
                            data: {
                                action: 'ideas_get_ai_recommendations',
                                category: category,
                                theme: theme,
                                nonce: '<?php echo wp_create_nonce("ideas_calendar_nonce"); ?>'
                            },
                            dataType: 'json',
                            success: function(response) {
                                $('#ideas-ai-loading').hide();
                                generateBtn.prop('disabled', false);
                                
                                // reset step status styling
                                $('.ai-step').removeClass('active done').css('opacity', '0.5');
                                
                                if (response.success) {
                                    renderAiRecommendations(response.data);
                                } else {
                                    $('#ideas-ai-results').html('<p style="color: #ab0e00; text-align: center; padding: 20px; font-size: 13px;">Lỗi: ' + response.data + '</p>').show();
                                }
                            },
                            error: function() {
                                $('#ideas-ai-loading').hide();
                                generateBtn.prop('disabled', false);
                                $('.ai-step').removeClass('active done').css('opacity', '0.5');
                                $('#ideas-ai-results').html('<p style="color: #ab0e00; text-align: center; padding: 20px; font-size: 13px;">Lỗi kết nối server, vui lòng thử lại.</p>').show();
                            }
                        });
                    }, 800);
                }, 800);
            });
            
            function renderAiRecommendations(items) {
                var container = $('#ideas-ai-results');
                if (!items || items.length === 0) {
                    container.html('<p style="text-align: center; padding: 20px; color: #64748b; font-size: 13px;">Không tìm thấy đề xuất phù hợp.</p>').show();
                    return;
                }
                
                var html = '';
                items.forEach(function(item, index) {
                    html += '<div class="ideas-ai-card-item">';
                    html += '  <h4 class="ideas-ai-card-title">' + escHtml(item.title) + '</h4>';
                    html += '  <div class="ideas-ai-card-tags">';
                    html += '    <span class="ideas-ai-tag cat">' + escHtml(item.category_label) + '</span>';
                    html += '    <span class="ideas-ai-tag theme">' + escHtml(item.theme_label) + '</span>';
                    html += '  </div>';
                    if (item.explanation) {
                        html += '  <p class="ideas-ai-card-desc">' + escHtml(item.explanation) + '</p>';
                    }
                    html += '  <div class="ideas-ai-card-actions">';
                    html += '    <button type="button" class="ideas-ai-card-btn ideas-ai-schedule-btn" data-title="' + escHtml(item.title) + '">';
                    html += '      <span class="dashicons dashicons-calendar-alt" style="font-size: 14px; width:14px; height:14px;"></span> Lên lịch ngay';
                    html += '    </button>';
                    html += '  </div>';
                    html += '</div>';
                });
                
                container.html(html).fadeIn(200);
            }
            
            // Handle Schedule Button click on AI suggested card
            $(document).on('click', '.ideas-ai-schedule-btn', function(e) {
                e.preventDefault();
                var title = $(this).attr('data-title');
                resetForm();
                
                // Prepopulate title in modal
                modal.find('input[name="ideas_post_title"]').val(title);
                
                // Set default date to today
                var today = new Date().toISOString().split('T')[0];
                modal.find('input[name="ideas_post_date"]').val(today);
                
                // Open add post modal
                modal.css('display', 'flex');
            });
            
            // Open modal to add post (general button)
            $('.ideas-quick-add-trigger').on('click', function(e) {
                e.preventDefault();
                resetForm();
                
                // Set default date to today
                var today = new Date().toISOString().split('T')[0];
                modal.find('input[name="ideas_post_date"]').val(today);
                
                modal.css('display', 'flex');
            });

            // Open modal to add post (quick add cell button)
            $('.cell-quick-add-btn').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                resetForm();

                var cellDate = $(this).attr('data-date');
                modal.find('input[name="ideas_post_date"]').val(cellDate);
                
                modal.css('display', 'flex');
            });

            // Close modal actions
            $('.ideas-calendar-modal-close, .ideas-cancel-btn').on('click', function(e) {
                e.preventDefault();
                modal.css('display', 'none');
            });

            $(window).on('click', function(e) {
                if ($(e.target).is(modal)) {
                    modal.css('display', 'none');
                }
            });

            // Reset form function
            function resetForm() {
                form[0].reset();
                modal.find('button[type="submit"]').prop('disabled', false).text('Lưu bài viết');
            }

            // Form submission via AJAX
            form.on('submit', function(e) {
                e.preventDefault();
                
                var submitBtn = form.find('.ideas-save-btn');
                submitBtn.prop('disabled', true).text('Đang tạo...');

                var formData = {
                    action: 'ideas_create_calendar_post',
                    title: form.find('input[name="ideas_post_title"]').val(),
                    date: form.find('input[name="ideas_post_date"]').val(),
                    time: form.find('input[name="ideas_post_time"]').val(),
                    status: form.find('select[name="ideas_post_status"]').val(),
                    content: form.find('textarea[name="ideas_post_content"]').val(),
                    nonce: '<?php echo wp_create_nonce("ideas_calendar_nonce"); ?>'
                };

                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            // Close modal and reload page to show the new post
                            modal.css('display', 'none');
                            window.location.reload();
                        } else {
                            alert('Lỗi: ' + (response.data || 'Không thể tạo bài viết'));
                            submitBtn.prop('disabled', false).text('Lưu bài viết');
                        }
                    },
                    error: function() {
                        alert('Lỗi kết nối server, vui lòng thử lại.');
                        submitBtn.prop('disabled', false).text('Lưu bài viết');
                    }
                });
            });
        });
    </script>
    <?php
}

// Handle AJAX Request to Create Post
add_action('wp_ajax_ideas_create_calendar_post', 'ideas_ajax_create_calendar_post_handler');
function ideas_ajax_create_calendar_post_handler()
{
    // Check permission
    if (!current_user_can('edit_posts')) {
        wp_send_json_error('Bạn không có quyền thực hiện hành động này.');
    }

    // Verify parameters
    $title   = isset($_POST['title']) ? sanitize_text_field($_POST['title']) : '';
    $date    = isset($_POST['date']) ? sanitize_text_field($_POST['date']) : '';
    $time    = isset($_POST['time']) ? sanitize_text_field($_POST['time']) : '09:00';
    $status  = isset($_POST['status']) ? sanitize_text_field($_POST['status']) : 'draft';
    $content = isset($_POST['content']) ? wp_kses_post($_POST['content']) : '';

    if (empty($title) || empty($date)) {
        wp_send_json_error('Tiêu đề và Ngày đăng là bắt buộc.');
    }

    // Format target publication datetime
    $datetime = $date . ' ' . $time . ':00';

    // Build post args
    $post_data = array(
        'post_title'   => $title,
        'post_content' => $content,
        'post_status'  => $status,
        'post_date'    => $datetime,
        'post_author'  => get_current_user_id(),
        'post_type'    => 'post'
    );

    // Insert post into WordPress
    $post_id = wp_insert_post($post_data);

    if (is_wp_error($post_id)) {
        wp_send_json_error($post_id->get_error_message());
    } else {
        wp_send_json_success(array('post_id' => $post_id));
    }
}

// Handle AJAX Request for Title-only Topic Search
add_action('wp_ajax_ideas_search_duplicate_topics', 'ideas_ajax_search_duplicate_topics_handler');
function ideas_ajax_search_duplicate_topics_handler()
{
    if (!current_user_can('edit_posts')) {
        wp_send_json_error('Bạn không có quyền thực hiện hành động này.');
    }

    $query = isset($_POST['query']) ? sanitize_text_field($_POST['query']) : '';
    if (empty($query)) {
        wp_send_json_success(array());
    }

    global $wpdb;
    $search_term = '%' . $wpdb->esc_like($query) . '%';
    $sql = $wpdb->prepare(
        "SELECT ID, post_title, post_date, post_status 
         FROM {$wpdb->posts} 
         WHERE post_type = 'post' 
         AND post_status IN ('publish', 'future', 'draft') 
         AND post_title LIKE %s 
         ORDER BY post_date DESC 
         LIMIT 20",
        $search_term
    );

    $posts = $wpdb->get_results($sql);

    $data = array();
    foreach ($posts as $p) {
        $data[] = array(
            'id'        => $p->ID,
            'title'     => $p->post_title,
            'status'    => $p->post_status,
            'date'      => date('d/m/Y H:i', strtotime($p->post_date)),
            'edit_link' => get_edit_post_link($p->ID)
        );
    }

    wp_send_json_success($data);
}

// Handle AJAX Request for AI Topic Recommendations
add_action('wp_ajax_ideas_get_ai_recommendations', 'ideas_ajax_get_ai_recommendations_handler');
function ideas_ajax_get_ai_recommendations_handler()
{
    if (!current_user_can('edit_posts')) {
        wp_send_json_error('Bạn không có quyền thực hiện hành động này.');
    }

    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : 'all';
    $theme    = isset($_POST['theme']) ? sanitize_text_field($_POST['theme']) : 'all';

    // 1. Fetch recent post titles to identify and avoid duplicates
    global $wpdb;
    $existing_posts = $wpdb->get_results(
        "SELECT post_title FROM {$wpdb->posts} WHERE post_type = 'post' AND post_status IN ('publish', 'future', 'draft')",
        ARRAY_A
    );
    $existing_titles = array_map(function($p) {
        return mb_strtolower($p['post_title']);
    }, $existing_posts);

    // 2. Define our blueprint bank of content ideas (in Vietnamese, highly professional and realistic)
    $blueprints = array(
        // Category: MBA
        array(
            'category' => 'mba',
            'category_label' => 'Thạc sĩ MBA',
            'theme' => 'academic',
            'theme_label' => 'Học thuật & Đào tạo',
            'title' => 'Chương trình Thạc sĩ MBA tại IDEAS: Chuẩn mực đào tạo nhà lãnh đạo hiện đại',
            'explanation' => 'Đề xuất dựa trên mong muốn tìm hiểu cấu trúc môn học thực tế của học viên. Nội dung tập trung giới thiệu các học phần nổi bật và phương pháp giảng dạy case study.'
        ),
        array(
            'category' => 'mba',
            'category_label' => 'Thạc sĩ MBA',
            'theme' => 'academic',
            'theme_label' => 'Học thuật & Đào tạo',
            'title' => 'Phương pháp Case Study trong chương trình MBA: Học từ thực tiễn để giải quyết thực tế',
            'explanation' => 'Đề xuất nhằm làm nổi bật tính thực tiễn của chương trình đào tạo, giúp học viên hiểu cách áp dụng lý thuyết trực tiếp vào bài toán kinh doanh thực tế.'
        ),
        array(
            'category' => 'mba',
            'category_label' => 'Thạc sĩ MBA',
            'theme' => 'career',
            'theme_label' => 'Cơ hội Sự nghiệp',
            'title' => 'Học MBA có thực sự giúp bạn thăng tiến nhanh hơn trong các tập đoàn đa quốc gia?',
            'explanation' => 'Đề xuất phân tích lộ trình phát triển sự nghiệp của cựu học viên MBA, giải đáp thắc mắc về giá trị bằng cấp đối với nhà tuyển dụng.'
        ),
        array(
            'category' => 'mba',
            'category_label' => 'Thạc sĩ MBA',
            'theme' => 'career',
            'theme_label' => 'Cơ hội Sự nghiệp',
            'title' => 'Xây dựng mạng lưới quan hệ (Networking) chất lượng cao khi theo học MBA tại IDEAS',
            'explanation' => 'Gợi ý chủ đề thảo luận về giá trị vô hình của khóa học: cơ hội kết nối với các bạn học là quản lý và chuyên gia trong nhiều lĩnh vực.'
        ),
        array(
            'category' => 'mba',
            'category_label' => 'Thạc sĩ MBA',
            'theme' => 'admission',
            'theme_label' => 'Tuyển sinh & Học bổng',
            'title' => 'Bí quyết chuẩn bị hồ sơ ứng tuyển Thạc sĩ MBA để đạt cơ hội trúng tuyển cao nhất',
            'explanation' => 'Chủ đề thu hút khách hàng tiềm năng trong giai đoạn mở đơn đăng ký học, cung cấp chỉ dẫn chuẩn bị thư giới thiệu và bài luận cá nhân.'
        ),
        array(
            'category' => 'mba',
            'category_label' => 'Thạc sĩ MBA',
            'theme' => 'experience',
            'theme_label' => 'Trải nghiệm Học viên',
            'title' => 'Cân bằng công việc bận rộn và việc học Thạc sĩ MBA: Chia sẻ từ những người đi trước',
            'explanation' => 'Đề xuất nội dung dưới dạng phỏng vấn thực tế một học viên đang đi làm quản lý, chia sẻ cách họ quản lý quỹ thời gian biểu.'
        ),
        
        // Category: Swiss UMEF
        array(
            'category' => 'swiss-umef',
            'category_label' => 'Đại học Swiss UMEF',
            'theme' => 'academic',
            'theme_label' => 'Học thuật & Đào tạo',
            'title' => 'Tại sao bằng Thạc sĩ từ Thụy Sĩ (Swiss UMEF) luôn giữ vị thế hàng đầu toàn cầu?',
            'explanation' => 'Nêu bật thế mạnh của giáo dục Thụy Sĩ trong lĩnh vực tài chính, quản trị và chất lượng kiểm định giáo dục quốc tế uy tín.'
        ),
        array(
            'category' => 'swiss-umef',
            'category_label' => 'Đại học Swiss UMEF',
            'theme' => 'academic',
            'theme_label' => 'Học thuật & Đào tạo',
            'title' => 'Tìm hiểu các chuyên ngành sâu của chương trình liên kết đào tạo Swiss UMEF & IDEAS',
            'explanation' => 'Đề xuất phân tích sâu các chuyên ngành hot: Quản trị tài chính toàn cầu, Quản trị chiến lược kinh doanh.'
        ),
        array(
            'category' => 'swiss-umef',
            'category_label' => 'Đại học Swiss UMEF',
            'theme' => 'career',
            'theme_label' => 'Cơ hội Sự nghiệp',
            'title' => 'Mở rộng cơ hội việc làm quốc tế sau tốt nghiệp chương trình Thạc sĩ Swiss UMEF',
            'explanation' => 'Phân tích khả năng cạnh tranh trên thị trường lao động nước ngoài hoặc các vị trí quản lý cao cấp nhờ bằng cấp chuẩn Châu Âu.'
        ),
        array(
            'category' => 'swiss-umef',
            'category_label' => 'Đại học Swiss UMEF',
            'theme' => 'admission',
            'theme_label' => 'Tuyển sinh & Học bổng',
            'title' => 'Thông tin chi tiết về điều kiện xét tuyển chương trình Thạc sĩ liên kết Thụy Sĩ Swiss UMEF',
            'explanation' => 'Cung cấp các yêu cầu về bằng đại học, năng lực tiếng Anh và kinh nghiệm làm việc đối với học viên ứng tuyển chương trình liên kết.'
        ),
        array(
            'category' => 'swiss-umef',
            'category_label' => 'Đại học Swiss UMEF',
            'theme' => 'experience',
            'theme_label' => 'Trải nghiệm Học viên',
            'title' => 'Học Thạc sĩ chuẩn Thụy Sĩ ngay tại Việt Nam: Trải nghiệm chuẩn quốc tế không cần du học',
            'explanation' => 'Khai thác khía cạnh tiết kiệm chi phí nhưng vẫn được học với giảng viên nước ngoài và thụ hưởng giáo trình quốc tế.'
        ),
        
        // Category: LMS
        array(
            'category' => 'lms',
            'category_label' => 'Quản lý Học tập LMS',
            'theme' => 'academic',
            'theme_label' => 'Học thuật & Đào tạo',
            'title' => 'Cách công nghệ LMS tối ưu hóa trải nghiệm học tập hỗn hợp (Hybrid Learning)',
            'explanation' => 'Đề xuất nhằm làm nổi bật ưu thế hạ tầng công nghệ học tập của hệ thống IDEAS giúp lưu giữ bài giảng và làm bài trực tuyến dễ dàng.'
        ),
        array(
            'category' => 'lms',
            'category_label' => 'Quản lý Học tập LMS',
            'theme' => 'experience',
            'theme_label' => 'Trải nghiệm Học viên',
            'title' => 'Hướng dẫn sử dụng hệ thống LMS của IDEAS cho học viên mới nhập học',
            'explanation' => 'Chủ đề hỗ trợ thiết thực, hướng dẫn chi tiết các tính năng như tải tài liệu, thảo luận nhóm, xem lại bài giảng cũ.'
        ),

        // Category: Experience / Skills
        array(
            'category' => 'experience',
            'category_label' => 'Kinh nghiệm & Kỹ năng',
            'theme' => 'career',
            'theme_label' => 'Cơ hội Sự nghiệp',
            'title' => 'Kỹ năng lãnh đạo đội nhóm hiệu quả học được từ các khóa học tại IDEAS',
            'explanation' => 'Chia sẻ phương pháp rèn luyện kỹ năng mềm, kỹ năng giải quyết xung đột nhóm và nghệ thuật giao tiếp cho quản lý.'
        ),
        array(
            'category' => 'experience',
            'category_label' => 'Kinh nghiệm & Kỹ năng',
            'theme' => 'academic',
            'theme_label' => 'Học thuật & Đào tạo',
            'title' => 'Phương pháp nghiên cứu khoa học và viết luận văn tốt nghiệp hiệu quả cho học viên cao học',
            'explanation' => 'Cung cấp cẩm nang tóm tắt giúp học viên chuẩn bị đề cương nghiên cứu, thu thập số liệu và triển khai viết bài khóa luận.'
        ),
        array(
            'category' => 'experience',
            'category_label' => 'Kinh nghiệm & Kỹ năng',
            'theme' => 'experience',
            'theme_label' => 'Trải nghiệm Học viên',
            'title' => '5 Thói quen giúp bạn tự học và nghiên cứu thành công khi học chương trình cao học',
            'explanation' => 'Bài viết truyền động lực và chia sẻ các mẹo quản lý quỹ thời gian cá nhân cực hữu ích cho người vừa đi làm vừa đi học.'
        )
    );

    // 3. Filter recommendations based on inputs and similarity
    $filtered = array();
    foreach ($blueprints as $bp) {
        if ($category !== 'all' && $bp['category'] !== $category) {
            continue;
        }
        if ($theme !== 'all' && $bp['theme'] !== $theme) {
            continue;
        }

        // Check similarity against existing posts to prevent duplicates
        $title_lower = mb_strtolower($bp['title']);
        $is_duplicate = false;

        foreach ($existing_titles as $ext) {
            if (strpos($ext, $title_lower) !== false || strpos($title_lower, $ext) !== false) {
                $is_duplicate = true;
                break;
            }
            similar_text($ext, $title_lower, $percent);
            if ($percent > 65) {
                $is_duplicate = true;
                break;
            }
        }

        if (!$is_duplicate) {
            $filtered[] = $bp;
        }
    }

    // Shuffle and slice to get max 5 items
    shuffle($filtered);
    $results = array_slice($filtered, 0, 5);

    // Dynamic fallback if too empty
    if (empty($results)) {
        $random_id = rand(100, 999);
        $cat_lbl = $category !== 'all' ? ($category === 'mba' ? 'Thạc sĩ MBA' : ($category === 'swiss-umef' ? 'Đại học Swiss UMEF' : 'Cao học IDEAS')) : 'Cao học IDEAS';
        $theme_lbl = $theme !== 'all' ? ($theme === 'academic' ? 'Học thuật' : 'Sự nghiệp') : 'Chủ đề Mới';
        
        $results[] = array(
            'category' => $category !== 'all' ? $category : 'mba',
            'category_label' => $cat_lbl,
            'theme' => $theme !== 'all' ? $theme : 'academic',
            'theme_label' => $theme_lbl,
            'title' => 'Chủ đề nghiên cứu mới trong lĩnh vực kinh tế số và chuyển đổi mô hình kinh doanh #' . $random_id,
            'explanation' => 'Đề xuất động từ trợ lý AI dựa trên nhu cầu nghiên cứu xu hướng thị trường kinh tế số hiện nay.'
        );
    }

    wp_send_json_success($results);
}

