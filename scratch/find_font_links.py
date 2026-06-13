import re

with open(r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html", "r", encoding="utf-8") as f:
    content = f.read()

# search for all script and link tags
matches = re.findall(r'(<(?:link|script)[^>]+(?:href|src)="[^"]*"[^>]*>)', content)
for m in matches:
    if "font" in m.lower() or "css" in m.lower() or "awesome" in m.lower():
        print(m)
