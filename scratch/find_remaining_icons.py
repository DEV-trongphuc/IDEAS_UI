import os
import re

theme_dir = r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA"
new_public_dir = r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA"

i_tag_pattern = re.compile(r'<i\s+[^>]*class=["\']([^"\']*)["\'][^>]*>\s*</i>', re.IGNORECASE)

remaining_icons = set()

def scan_file(filepath):
    with open(filepath, 'r', encoding='utf-8', errors='ignore') as f:
        content = f.read()
    
    matches = i_tag_pattern.findall(content)
    for match in matches:
        classes = match.split()
        for c in classes:
            if c.startswith('fa-') and c not in ('fa-solid', 'fa-regular', 'fa-brands', 'fa-spin', 'fa-pulse', 'fa-stack-1x', 'fa-stack-2x', 'fa-li', 'fa-fw', 'fa-border', 'fa-2x', 'fa-3x', 'fa-4x', 'fa-5x', 'fa-lg', 'fa-sm', 'fa-xs', 'fa-light', 'fa-thin', 'fa-duotone'):
                remaining_icons.add(c)

# Gather files
files_to_scan = []
for root, dirs, files in os.walk(theme_dir):
    if '.git' in root or '.tmb' in root:
        continue
    for file in files:
        if file.endswith(('.php', '.js', '.html')) and not file.endswith('.min.js') and not file.endswith('.min.css'):
            files_to_scan.append(os.path.join(root, file))

for root, dirs, files in os.walk(new_public_dir):
    if '.git' in root or '.tmb' in root or 'assets' in root or 'homepage-assets' in root:
        continue
    for file in files:
        if file.endswith(('.html', '.php', '.js')) and not file.endswith('.min.js') and not file.endswith('.min.css'):
            files_to_scan.append(os.path.join(root, file))

for f in files_to_scan:
    scan_file(f)

print("Remaining icon classes found in codebase:")
for icon in sorted(remaining_icons):
    print(f"- {icon}")
