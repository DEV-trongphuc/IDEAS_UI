import sys
sys.stdout.reconfigure(encoding='utf-8')

with open(r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html", "r", encoding="utf-8") as f:
    content = f.read()

import re
matches = [m.start() for m in re.finditer(re.escape("Swiss Accreditation Council"), content)]
for idx, m in enumerate(matches):
    start = max(0, m - 100)
    end = min(len(content), m + 200)
    print(f"Match {idx+1}: {content[start:end]}")
