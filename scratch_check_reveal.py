with open("e:/IDEAS_WP_UI/wp-content/themes/LANDINGPAGE_MBA/page-swiss-umef.php", "r", encoding="utf-8") as f:
    content = f.read()

import re
matches = [m.start() for m in re.finditer(r'footer', content, re.IGNORECASE)]
for m in matches[:10]:
    print(content[max(0, m-50):min(len(content), m+50)])
