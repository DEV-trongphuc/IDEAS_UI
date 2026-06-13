import re

files = [
    r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html",
    r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\en\index.html"
]

for file_path in files:
    print(f"File: {file_path}")
    with open(file_path, "r", encoding="utf-8") as f:
        content = f.read()
        
    style_blocks = re.findall(r'<style[^>]*>(.*?)</style>', content, re.DOTALL)
    for block in style_blocks:
        # Search for rules that have :hover and either scale or transform
        rules = re.findall(r'([^{}\n]*:hover[^{}]*\{[^{}]*(?:scale|transform)[^{}]*\})', block)
        for r in rules:
            print(f"  {r.strip()}")
