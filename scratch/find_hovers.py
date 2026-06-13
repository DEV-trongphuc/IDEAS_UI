import re

files = [
    r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\page-thac-si-quan-tri-kinh-doanh-mba.php",
    r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\page-swiss-umef.php",
    r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html",
    r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\en\index.html"
]

for file_path in files:
    print(f"File: {file_path}")
    with open(file_path, "r", encoding="utf-8") as f:
        content = f.read()
        
    # Find all style blocks
    style_blocks = re.findall(r'<style[^>]*>(.*?)</style>', content, re.DOTALL)
    for block in style_blocks:
        # Find selectors with :hover
        hovers = re.findall(r'([^{}\n]*:hover[^{}]*\{[^{}]*\})', block)
        for h in hovers:
            print(f"  {h.strip()}")
