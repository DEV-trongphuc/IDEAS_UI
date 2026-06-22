import re

files = ['wp-content/new_public/LANDINGPAGE_MBA/emba.html', 'wp-content/new_public/LANDINGPAGE_MBA/en/emba.html']
for f in files:
    with open(f, 'rb') as file:
        content = file.read().decode('utf-8')
    content = re.sub(r'<span class="sol-v2-stat-val">12</span>\s*<span class="sol-v2-stat-lbl">Tháng</span>', '<span class="sol-v2-stat-val">14</span>\n                            <span class="sol-v2-stat-lbl">Tháng</span>', content)
    content = re.sub(r'<span class="sol-v2-stat-val">12</span>\s*<span class="sol-v2-stat-lbl">Months</span>', '<span class="sol-v2-stat-val">14</span>\n                            <span class="sol-v2-stat-lbl">Months</span>', content)
    with open(f, 'wb') as file:
        file.write(content.encode('utf-8'))
