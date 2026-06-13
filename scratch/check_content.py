with open('wp-content/new_public/LANDINGPAGE_MBA/mscai.html', 'r', encoding='utf-8') as f:
    content = f.read()

import re
scripts = re.findall(r'<script>.*?</script>', content, re.DOTALL)
for s in scripts:
    if 'accred' in s or 'openAccred' in s:
        print(s[:200] + "...")
