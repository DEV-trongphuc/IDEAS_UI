<?php
/**
 * Custom Editorial Calendar Page for WordPress Administration
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Register Admin Menu Page
add_action('admin_menu', 'ideas_register_editorial_calendar_page');
function ideas_editorial_calendar_menu_icon() {
    return 'dashicons-calendar-alt';
}

function ideas_register_editorial_calendar_page()
{
    add_menu_page(
        'Lịch bài viết',
        'Lịch bài viết',
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
        <h1 class="wp-heading-inline">Lịch biên tập & bài viết</h1>
        <hr class="wp-header-end">

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
                                echo '  <span class="post-time-indicator">' . esc_html($post_time) . '</span>';
                                echo '  <a href="' . esc_url($edit_link) . '" class="post-item-title-link">' . esc_html(wp_trim_words($post->post_title, 4)) . '</a>';
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
            padding: 4px 6px;
            border-radius: 6px;
            font-size: 11px;
            gap: 5px;
            transition: transform 0.1s ease;
            text-decoration: none;
            box-sizing: border-box;
            border: 1px solid transparent;
        }
        .ideas-calendar-post-item:hover {
            transform: translateX(1px);
        }

        .ideas-calendar-post-item.publish {
            background: #ecfdf5;
            color: #065f46;
            border-color: #a7f3d0;
        }
        .ideas-calendar-post-item.future {
            background: #fffbeb;
            color: #92400e;
            border-color: #fde68a;
        }
        .ideas-calendar-post-item.draft {
            background: #f1f5f9;
            color: #475569;
            border-color: #cbd5e1;
        }

        .post-time-indicator {
            font-weight: 700;
            font-size: 9px;
            opacity: 0.8;
            flex-shrink: 0;
        }
        .post-item-title-link {
            text-decoration: none;
            color: inherit !important;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            flex-grow: 1;
        }

        .status-dot {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            flex-shrink: 0;
        }
        .status-dot.publish { background: #059669; }
        .status-dot.future { background: #d97706; }
        .status-dot.draft { background: #64748b; }

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
    </style>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var modal = $('#ideas-calendar-modal');
            var form = $('#ideas-calendar-modal-form');
            
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
