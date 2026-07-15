// CẤU HÌNH THÔNG TIN TÀI KHOẢN MẶC ĐỊNH
const DEFAULT_PASSWORD = "Ideas@ai2025";
const PLATFORM_URL = "https://ai.ideas.edu.vn/";

/**
 * 1. API nhận dữ liệu từ Form đăng ký trên website gửi sang
 */
function doPost(e) {
  try {
    const jsonString = e.postData.contents;
    const data = JSON.parse(jsonString);
    
    const sheet = SpreadsheetApp.getActiveSpreadsheet().getActiveSheet();
    
    // Thêm hàng dữ liệu mới
    sheet.appendRow([
      new Date(),                 // A: Timestamp
      data.name || "",            // B: Họ và tên
      data.email || "",           // C: Email
      data.phone || "",           // D: Số điện thoại
      data.program || "",         // E: Chương trình học
      data.purpose || "",         // F: Mục đích sử dụng
      data.message || "",         // G: Mong muốn hỗ trợ
      data.lang || "vi",          // H: Ngôn ngữ
      false,                      // I: Đã cấp tài khoản (Mặc định là unchecked/FALSE)
      ""                          // J: Ngày gửi email
    ]);
    
    // Tạo Checkbox tự động cho ô cột I ở dòng mới thêm
    const lastRow = sheet.getLastRow();
    sheet.getRange(lastRow, 9).insertCheckboxes();
    
    return ContentService.createTextOutput(JSON.stringify({ success: true }))
                         .setMimeType(ContentService.MimeType.JSON);
  } catch (error) {
    return ContentService.createTextOutput(JSON.stringify({ success: false, error: error.toString() }))
                         .setMimeType(ContentService.MimeType.JSON);
  }
}

/**
 * 2. Hàm tự động gửi Email khi kỹ thuật đánh dấu Checkbox
 * (Hàm này được chạy thông qua Installable Edit Trigger)
 */
function sendAccountEmailOnCheckbox(e) {
  const range = e.range;
  const sheet = range.getSheet();
  const row = range.getRow();
  const col = range.getColumn();
  
  // Chỉ xử lý khi sửa cột 9 (Cột I: Đã cấp tài khoản) từ hàng thứ 2 trở lên
  if (col === 9 && row > 1) {
    const isChecked = range.getValue();
    
    if (isChecked === true) {
      // Đọc các giá trị trong hàng hiện tại
      const email = sheet.getRange(row, 3).getValue().toString().trim();
      const name = sheet.getRange(row, 2).getValue().toString().trim();
      const lang = sheet.getRange(row, 8).getValue().toString().trim().toLowerCase();
      const emailSentCell = sheet.getRange(row, 10);
      
      // Kiểm tra nếu đã có ngày gửi email thì bỏ qua (tránh gửi lặp lại)
      if (emailSentCell.getValue() !== "") {
        return;
      }
      
      if (!email) {
        Logger.log("Dòng " + row + " không có địa chỉ email.");
        return;
      }
      
      // Soạn nội dung email dựa trên ngôn ngữ đăng ký
      let subject = "";
      let htmlBody = "";
      
      if (lang === "en") {
        subject = "[IDEAS AI Platform] Your Academic AI Assistant Account Details";
        htmlBody = `
          <div style="font-family: Arial, sans-serif; line-height: 1.6; color: #333333; max-width: 600px; margin: 0 auto; border: 1px solid #e2e8f0; padding: 20px; border-radius: 12px;">
            <h2 style="color: #ab0e00; margin-top: 0;">Welcome to IDEAS AI Platform!</h2>
            <p>Dear <strong>${name}</strong>,</p>
            <p>Your Academic AI Assistant account is ready. Below are your account credentials:</p>
            <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
              <tr>
                <td style="padding: 8px; border: 1px solid #e2e8f0; background: #f8fafc; font-weight: bold; width: 35%;">Access Link:</td>
                <td style="padding: 8px; border: 1px solid #e2e8f0;"><a href="${PLATFORM_URL}" target="_blank" style="color: #ab0e00; text-decoration: underline; font-weight: bold;">${PLATFORM_URL}</a></td>
              </tr>
              <tr>
                <td style="padding: 8px; border: 1px solid #e2e8f0; background: #f8fafc; font-weight: bold;">Username (Email):</td>
                <td style="padding: 8px; border: 1px solid #e2e8f0; font-family: monospace;">${email}</td>
              </tr>
              <tr>
                <td style="padding: 8px; border: 1px solid #e2e8f0; background: #f8fafc; font-weight: bold;">Default Password:</td>
                <td style="padding: 8px; border: 1px solid #e2e8f0; font-family: monospace;">${DEFAULT_PASSWORD}</td>
              </tr>
            </table>
            <p>We wish you an excellent study and research experience with the smart assistant IDEAS AI Platform!</p>
            <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 20px 0;" />
            <p style="font-size: 0.85rem; color: #64748b; margin-bottom: 0;">Best regards,<br/><strong>IDEAS Admissions & Student Support Board</strong></p>
          </div>
        `;
      } else {
        subject = "[IDEAS AI Platform] Thông tin tài khoản trải nghiệm trợ lý AI học thuật";
        htmlBody = `
          <div style="font-family: Arial, sans-serif; line-height: 1.6; color: #333333; max-width: 600px; margin: 0 auto; border: 1px solid #e2e8f0; padding: 20px; border-radius: 12px;">
            <h2 style="color: #ab0e00; margin-top: 0;">Kích hoạt tài khoản thành công!</h2>
            <p>Xin chào <strong>${name}</strong>,</p>
            <p>IDEAS AI Platform xin gửi tới bạn thông tin tài khoản trải nghiệm trợ lý AI học thuật đã được cấp dưới đây:</p>
            <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
              <tr>
                <td style="padding: 8px; border: 1px solid #e2e8f0; background: #f8fafc; font-weight: bold; width: 35%;">Link truy cập:</td>
                <td style="padding: 8px; border: 1px solid #e2e8f0;"><a href="${PLATFORM_URL}" target="_blank" style="color: #ab0e00; text-decoration: underline; font-weight: bold;">${PLATFORM_URL}</a></td>
              </tr>
              <tr>
                <td style="padding: 8px; border: 1px solid #e2e8f0; background: #f8fafc; font-weight: bold;">Tài khoản (Email):</td>
                <td style="padding: 8px; border: 1px solid #e2e8f0; font-family: monospace;">${email}</td>
              </tr>
              <tr>
                <td style="padding: 8px; border: 1px solid #e2e8f0; background: #f8fafc; font-weight: bold;">Mật khẩu mặc định:</td>
                <td style="padding: 8px; border: 1px solid #e2e8f0; font-family: monospace;">${DEFAULT_PASSWORD}</td>
              </tr>
            </table>
            <p>Chúc bạn có những trải nghiệm học tập và nghiên cứu tuyệt vời cùng trợ lý thông minh IDEAS AI Platform!</p>
            <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 20px 0;" />
            <p style="font-size: 0.85rem; color: #64748b; margin-bottom: 0;">Trân trọng,<br/><strong>Hội đồng Tuyển sinh & Hỗ trợ Đào tạo IDEAS</strong></p>
          </div>
        `;
      }
      
      // Gửi email
      MailApp.sendEmail({
        to: email,
        subject: subject,
        htmlBody: htmlBody
      });
      
      // Lưu lại thời gian gửi email vào cột J
      emailSentCell.setValue(Utilities.formatDate(new Date(), Session.getScriptTimeZone(), "dd/MM/yyyy HH:mm:ss"));
    }
  }
}

/**
 * 3. Hàm khởi tạo Header cho trang tính (Chạy 1 lần duy nhất từ Apps Script editor)
 * Hàm này sẽ chèn thêm hàng tiêu đề ở dòng 1 và tự động định dạng.
 */
function setupSpreadsheetHeaders() {
  const sheet = SpreadsheetApp.getActiveSpreadsheet().getActiveSheet();
  
  // Chèn một hàng trống ở đầu tiên (đẩy dữ liệu kiểm thử hiện tại xuống hàng 2)
  sheet.insertRowBefore(1);
  
  // Định nghĩa tiêu đề cột
  const headers = [
    "Timestamp",          // A
    "Họ và tên",          // B
    "Email",              // C
    "Số điện thoại",      // D
    "Chương trình học",   // E
    "Mục đích sử dụng",   // F
    "Mong muốn hỗ trợ",   // G
    "Ngôn ngữ",           // H
    "Đã cấp tài khoản",   // I
    "Ngày gửi email"      // J
  ];
  
  // Ghi tiêu đề vào hàng 1
  const headerRange = sheet.getRange(1, 1, 1, headers.length);
  headerRange.setValues([headers]);
  
  // Trang trí định dạng cho dòng tiêu đề
  headerRange.setBackground("#ab0e00") // Màu đỏ thương hiệu IDEAS
             .setFontColor("#ffffff")  // Chữ trắng
             .setFontWeight("bold")    // In đậm
             .setHorizontalAlignment("center")
             .setVerticalAlignment("middle");
             
  // Điều chỉnh độ cao hàng tiêu đề và cố định hàng 1
  sheet.setRowHeight(1, 35);
  sheet.setFrozenRows(1);
  
  Logger.log("Đã khởi tạo dòng tiêu đề thành công!");
}
