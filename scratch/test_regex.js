const html = `<img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2026/05/swiss-1.webp" alt="Cử nhân Quản Trị Kinh Doanh quốc tế 100% Online tại Việt Nam" class="wp-image-9319"/>`;
const regex = /<img[^>]+src=["']([^"']+)["']/i;
const match = html.match(regex);
console.log("Matched URL:", match ? match[1] : "None");
