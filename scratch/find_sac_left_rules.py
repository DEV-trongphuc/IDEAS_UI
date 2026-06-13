import sys
sys.stdout.reconfigure(encoding='utf-8')

with open(r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html", "r", encoding="utf-8") as f:
    content = f.read()

import re
style_blocks = re.findall(r'<style[^>]*>(.*?)</style>', content, re.DOTALL)
for idx, block in enumerate(style_blocks):
    rules = re.findall(r'([^{}]*acc-sac-left[^{}]*\{[^{}]*\})', block, re.DOTALL)
    for r in rules:
        print(f"Rule: {r.strip()}")
