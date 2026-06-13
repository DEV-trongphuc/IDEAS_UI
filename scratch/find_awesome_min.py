with open(r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\common-assets\css\style.min.css", "r", encoding="utf-8") as f:
    content = f.read()

import re
matches = re.findall(r'(\S*awesome\S*|\S*font-awesome\S*)', content, re.IGNORECASE)
for m in matches:
    print(m)
