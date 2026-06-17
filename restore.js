const fs = require('fs');
const path = require('path');
const { execSync } = require('child_process');

// 1. Parse arguments
const args = process.argv.slice(2).join(' ');
if (!args.trim()) {
    console.error('Lỗi: Vui lòng cung cấp URL hoặc đường dẫn ảnh cần khôi phục.');
    console.error('Ví dụ: node restore https://ideas.edu.vn/wp-content/uploads/2026/02/en2810-edited.webp');
    console.error('Hoặc: node restore [https://url1.webp, https://url2.webp]');
    process.exit(1);
}

// 2. Extract wp-content/uploads/... paths
const pathRegex = /wp-content\/uploads\/[0-9]{4}\/[0-9]{2}\/[^,\s\]\?#]+/g;
const matches = args.match(pathRegex);

if (!matches || matches.length === 0) {
    console.error('Lỗi: Không tìm thấy đường dẫn hợp lệ dạng "wp-content/uploads/YYYY/MM/filename".');
    process.exit(1);
}

// Remove duplicates
const uniqueMatches = Array.from(new Set(matches));
console.log(`Đã tìm thấy ${uniqueMatches.length} đường dẫn cần xử lý:`);
uniqueMatches.forEach(p => console.log(`  - ${p}`));

const filesToStage = [];

function escapeRegExp(string) {
    return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
}

// 3. For each matched path, find the file and its responsive variants
uniqueMatches.forEach(relPath => {
    const fullPath = path.resolve(__dirname, relPath);
    const dir = path.dirname(fullPath);
    
    if (!fs.existsSync(dir)) {
        console.warn(`[Cảnh báo] Thư mục chứa không tồn tại: ${dir}`);
        return;
    }

    const ext = path.extname(relPath);
    const baseName = path.basename(relPath, ext);
    // Strip responsive dimensions (e.g. -600x600, -1200x800)
    const originalBaseName = baseName.replace(/-\d+x\d+$/, '');

    // Pattern to match original or its variants: originalBaseName(-WxH)?ext
    const filePattern = new RegExp('^' + escapeRegExp(originalBaseName) + '(-\\d+x\\d+)?' + escapeRegExp(ext) + '$', 'i');

    try {
        const files = fs.readdirSync(dir);
        let foundAny = false;
        files.forEach(file => {
            if (filePattern.test(file)) {
                const matchedRelPath = path.relative(__dirname, path.join(dir, file)).replace(/\\/g, '/');
                filesToStage.push(matchedRelPath);
                foundAny = true;
            }
        });
        if (!foundAny) {
            console.warn(`[Cảnh báo] Không tìm thấy file gốc hoặc biến thể nào cho: ${relPath}`);
        }
    } catch (err) {
        console.error(`Lỗi khi đọc thư mục ${dir}:`, err.message);
    }
});

// Remove duplicate resolved paths
const uniqueFilesToStage = Array.from(new Set(filesToStage));

if (uniqueFilesToStage.length === 0) {
    console.error('\nLỗi: Không tìm thấy file cục bộ nào khớp để khôi phục.');
    process.exit(1);
}

console.log(`\nTìm thấy các file cục bộ sau để khôi phục:`);
uniqueFilesToStage.forEach(f => console.log(`  + ${f}`));

// 4. Run git add -f
try {
    console.log('\nĐang thêm các file vào Git (force add)...');
    const cmd = `git add -f ${uniqueFilesToStage.map(f => `"${f}"`).join(' ')}`;
    execSync(cmd, { stdio: 'inherit' });
    console.log('Đã thêm các file thành công.');
} catch (error) {
    console.error('Lỗi khi chạy git add -f:', error.message);
    process.exit(1);
}

// 5. Run deploy.js
try {
    console.log('\nĐang chạy kịch bản deploy.js để cập nhật cache và đẩy lên server...');
    execSync('node deploy.js', { stdio: 'inherit' });
} catch (error) {
    console.error('Lỗi khi chạy deploy.js:', error.message);
    process.exit(1);
}
