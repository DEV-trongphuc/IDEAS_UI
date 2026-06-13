import sys
sys.stdout.reconfigure(encoding='utf-8')

import os
import re

files = [
    r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\shared-head.php",
    r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html",
    r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\en\index.html"
]

for file_path in files:
    print(f"File: {file_path}")
    with open(file_path, "r", encoding="utf-8") as f:
        content = f.read()
    
    # Search for all.min.css
    matches = re.findall(r'(<link[^>]+href="[^"]+font-awesome[^"]+all\.min\.css"[^>]*>)', content)
    for m in matches:
        print(f"  Found: {m}")
