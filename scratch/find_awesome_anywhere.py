with open(r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html", "r", encoding="utf-8") as f:
    content = f.read()

import re
matches = re.findall(r'(\S*awesome\S*|\S*font-awesome\S*)', content, re.IGNORECASE)
for m in matches:
    print(m)
