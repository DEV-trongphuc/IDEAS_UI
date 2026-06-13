import re

with open(r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html", "r", encoding="utf-8") as f:
    content = f.read()

# search for link stylesheet tags
matches = re.findall(r'(<link[^>]+rel="stylesheet"[^>]*>)', content)
for m in matches:
    print(m)
