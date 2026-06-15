-- =====================================================================
-- WORDPRESS DATABASE CLEANUP & OPTIMIZATION SCRIPT (CORRECT PREFIX)
-- Target Site: ideas.edu.vn
-- Active Prefix: wp_ideasvn
-- =====================================================================

-- ---------------------------------------------------------------------
-- PHẦN 1: XÓA BỎ TOÀN BỘ 13 BẢNG DƯ THỪA CÓ PREFIX `wpwo_`
-- (Leftovers từ cài đặt cũ, giải phóng dung lượng metadata)
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS 
  `wpwo_commentmeta`, 
  `wpwo_comments`, 
  `wpwo_links`, 
  `wpwo_options`, 
  `wpwo_postmeta`, 
  `wpwo_posts`, 
  `wpwo_termmeta`, 
  `wpwo_terms`, 
  `wpwo_term_relationships`, 
  `wpwo_term_taxonomy`, 
  `wpwo_usermeta`, 
  `wpwo_users`,
  `wpwo_wpfm_backup`;


-- ---------------------------------------------------------------------
-- PHẦN 2: DỌN DẸP DỮ LIỆU RÁC TRÊN CÁC BẢNG HOẠT ĐỘNG CHÍNH (`wp_ideasvn`)
-- ---------------------------------------------------------------------

-- 1. Xóa toàn bộ các bản sửa đổi bài viết (Revisions) dư thừa
-- (Giải phóng dung lượng rất lớn cho bảng posts và postmeta)
DELETE a, b, c
FROM wp_ideasvnposts a
LEFT JOIN wp_ideasvnpostmeta b ON a.ID = b.post_id
LEFT JOIN wp_ideasvnterm_relationships c ON a.ID = c.object_id
WHERE a.post_type = 'revision';

-- 2. Xóa các dữ liệu tạm thời (Transients) đã hết hạn
DELETE FROM wp_ideasvnoptions 
WHERE option_name LIKE '_transient_timeout_%' 
  AND option_value < UNIX_TIMESTAMP();

DELETE FROM wp_ideasvnoptions 
WHERE option_name LIKE '_transient_%' 
  AND option_name NOT LIKE '_transient_timeout_%' 
  AND REPLACE(option_name, '_transient_', '_transient_timeout_') NOT IN (
    SELECT option_name FROM (
      SELECT option_name FROM wp_ideasvnoptions WHERE option_name LIKE '_transient_timeout_%'
    ) as tmp
  );

-- 3. Xóa bình luận rác (Spam) và bình luận trong thùng rác (Trash)
DELETE FROM wp_ideasvncomments WHERE comment_approved IN ('spam', 'trash');

-- 4. Xóa các postmeta mồ côi (không thuộc bài viết nào đang tồn tại)
DELETE pm FROM wp_ideasvnpostmeta pm 
LEFT JOIN wp_ideasvnposts wp ON wp.ID = pm.post_id 
WHERE wp.ID IS NULL;

-- 5. Xóa các mối quan hệ term mồ côi
DELETE tr FROM wp_ideasvnterm_relationships tr 
LEFT JOIN wp_ideasvnposts wp ON wp.ID = tr.object_id 
WHERE wp.ID IS NULL;


-- ---------------------------------------------------------------------
-- PHẦN 3: TỐI ƯU HÓA CẤU TRÚC VÀ GIẢM DUNG LƯỢNG VẬT LÝ (DEFRAGMENT)
-- ---------------------------------------------------------------------

-- Sắp xếp lại dữ liệu trên đĩa và giải phóng không gian trống thực tế
OPTIMIZE TABLE 
  `wp_ideasvncommentmeta`, 
  `wp_ideasvncomments`, 
  `wp_ideasvnlinks`, 
  `wp_ideasvnoptions`, 
  `wp_ideasvnpostmeta`, 
  `wp_ideasvnposts`, 
  `wp_ideasvntermmeta`, 
  `wp_ideasvnterms`, 
  `wp_ideasvnterm_relationships`, 
  `wp_ideasvnterm_taxonomy`, 
  `wp_ideasvnusermeta`, 
  `wp_ideasvnusers`;


-- ---------------------------------------------------------------------
-- PHẦN 4: TRUY VẤN KIỂM TRA AUTOLOAD OPTIONS (Chỉ dùng để chẩn đoán)
-- ---------------------------------------------------------------------

-- Tính tổng dung lượng các option tự động tải (Khuyên dùng < 1MB để web load nhanh)
-- SELECT SUM(LENGTH(option_value)) / 1024 AS autoload_size_kb FROM wp_ideasvnoptions WHERE autoload = 'yes';

-- Xem danh sách 10 option nặng nhất để phát hiện plugin rác
-- SELECT option_name, LENGTH(option_value) AS option_size FROM wp_ideasvnoptions WHERE autoload = 'yes' ORDER BY option_size DESC LIMIT 10;
