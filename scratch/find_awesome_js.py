import sys
sys.stdout.reconfigure(encoding='utf-8')

with open(r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\common-assets\js\script.js", "r", encoding="utf-8") as f:
    content = f.read()

import re
matches = re.findall(r'([^\n]*css[^\n]*|[^\n]*link[^\n]*|[^\n]*awesome[^\n]*)', content, re.IGNORECASE)
for m in matches:
    print(m.strip()[:120])
