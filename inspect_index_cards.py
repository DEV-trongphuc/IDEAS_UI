import os
import re

files = [
    r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html",
    r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\en\index.html"
]

for filepath in files:
    if not os.path.exists(filepath):
        print(f"Not found: {filepath}")
        continue
    print(f"\n=== {os.path.basename(filepath)} ===")
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Search for .acc-card styles
    matches = re.finditer(r'\.acc-card\s*\{[^}]*\}', content, re.DOTALL)
    for m in matches:
        print("Style Block found:\n", m.group(0))
        
    # Search for acc-card tags in HTML
    card_tags = re.findall(r'<div class="acc-card"[^>]*>', content)
    print("Found HTML tags:", card_tags)
