import re

with open(r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\page-thac-si-quan-tri-kinh-doanh-mba.php", "r", encoding="utf-8") as f:
    content = f.read()

style_blocks = re.findall(r'<style[^>]*>(.*?)</style>', content, re.DOTALL)
for block in style_blocks:
    contents = re.findall(r'content:\s*([^;]+);', block)
    for c in contents:
        print(f"Content rule: {c.strip()}")
