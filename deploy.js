const fs = require('fs');
const path = require('path');
const { execSync } = require('child_process');

// 1. Tạo mã version mới dựa trên timestamp hiện tại (giây)
const newVersion = Math.floor(Date.now() / 1000);
console.log(`==================================================`);
console.log(`Khởi tạo cache version mới: ${newVersion}`);
console.log(`==================================================\n`);

// 2. Định nghĩa thư mục chứa các trang tĩnh landing pages
const newPublicDir = path.join(__dirname, 'wp-content', 'new_public', 'LANDINGPAGE_MBA');

// Hàm duyệt thư mục đệ quy
function walkDir(dir, callback) {
    if (!fs.existsSync(dir)) return;
    fs.readdirSync(dir).forEach(f => {
        const dirPath = path.join(dir, f);
        const isDirectory = fs.statSync(dirPath).isDirectory();
        if (isDirectory) {
            walkDir(dirPath, callback);
        } else {
            callback(dirPath);
        }
    });
}

// Các mẫu regex cần tìm và cập nhật cache buster
const patterns = [
    { regex: /style\.min\.css\?v=[a-zA-Z0-9]+/g, replace: `style.min.css?v=${newVersion}` },
    { regex: /script\.min\.js\?v=[a-zA-Z0-9]+/g, replace: `script.min.js?v=${newVersion}` },
    { regex: /booking-modal\.min\.css\?v=[a-zA-Z0-9]+/g, replace: `booking-modal.min.css?v=${newVersion}` },
    { regex: /booking-modal\.min\.js\?v=[a-zA-Z0-9]+/g, replace: `booking-modal.min.js?v=${newVersion}` },
    { regex: /variable\.js\?v=[a-zA-Z0-9]+/g, replace: `variable.js?v=${newVersion}` }
];

let updatedHtmlCount = 0;

console.log('Đang quét và cập nhật các file HTML tĩnh...');
if (fs.existsSync(newPublicDir)) {
    walkDir(newPublicDir, (filePath) => {
        if (path.extname(filePath) === '.html') {
            let content = fs.readFileSync(filePath, 'utf8');
            let modified = false;
            
            patterns.forEach(p => {
                if (p.regex.test(content)) {
                    content = content.replace(p.regex, p.replace);
                    modified = true;
                }
            });
            
            if (modified) {
                fs.writeFileSync(filePath, content, 'utf8');
                console.log(`  - Đã cập nhật cache: ${path.relative(newPublicDir, filePath)}`);
                updatedHtmlCount++;
            }
        }
    });
} else {
    console.warn(`[Cảnh báo] Không tìm thấy thư mục: ${newPublicDir}`);
}

// 3. Cập nhật version của tệp variable.js trong header.php của theme WordPress
const headerPath = path.join(__dirname, 'wp-content', 'themes', 'LANDINGPAGE_MBA', 'header.php');
if (fs.existsSync(headerPath)) {
    let headerContent = fs.readFileSync(headerPath, 'utf8');
    const headerRegex = /variable\.js\?v=[a-zA-Z0-9]+/g;
    if (headerRegex.test(headerContent)) {
        headerContent = headerContent.replace(headerRegex, `variable.js?v=${newVersion}`);
        fs.writeFileSync(headerPath, headerContent, 'utf8');
        console.log(`\n  - Đã cập nhật cache trong theme: ${path.relative(__dirname, headerPath)}`);
    }
}

console.log(`\nHoàn tất cập nhật cache cho ${updatedHtmlCount} file tĩnh.\n`);

// 4. Thực thi các lệnh Git để đẩy lên main và deploy cPanel
try {
    console.log('1. Đang chạy: git add .');
    execSync('git add .', { stdio: 'inherit' });
    
    const commitMsg = `auto: update cache buster to v${newVersion} and deploy`;
    console.log(`\n2. Đang chạy: git commit -m "${commitMsg}"`);
    execSync(`git commit -m "${commitMsg}"`, { stdio: 'inherit' });
    
    console.log('\n3. Đang chạy: git push origin main');
    execSync('git push origin main', { stdio: 'inherit' });
    
    console.log('\n4. Đang chạy: git push cpanel main');
    execSync('git push cpanel main', { stdio: 'inherit' });
    
    console.log(`\n==================================================`);
    console.log(`Đã push thành công lên origin/main và cpanel/main!`);
    console.log(`cPanel sẽ tự động thực hiện deploy qua .cpanel.yml`);
    console.log(`==================================================`);
} catch (error) {
    console.error('\n[Lỗi] Có lỗi xảy ra trong quá trình chạy Git:', error.message);
}
