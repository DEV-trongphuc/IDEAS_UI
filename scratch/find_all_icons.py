import os
import re

theme_dir = r"e:/IDEAS_WP_UI/wp-content/themes/LANDINGPAGE_MBA"
icon_pattern = re.compile(r'\bfa-[a-zA-Z0-9\-]+\b')

icon_counts = {}
icon_files = {}

for root, dirs, files in os.walk(theme_dir):
    # Skip assets directories or standard git folders if any
    if '.git' in root or '.tmb' in root:
        continue
        
    for file in files:
        if file.endswith(('.php', '.js', '.html')) and not file.endswith('.min.js'):
            filepath = os.path.join(root, file)
            try:
                with open(filepath, 'r', encoding='utf-8', errors='ignore') as f:
                    content = f.read()
                    
                matches = icon_pattern.findall(content)
                for match in matches:
                    # Filter out helper classes like fa-spin, fa-2x, fa-lg, fa-stack, etc.
                    if match in ('fa-spin', 'fa-pulse', 'fa-stack-1x', 'fa-stack-2x', 'fa-li', 'fa-fw', 'fa-border', 'fa-2x', 'fa-3x', 'fa-4x', 'fa-5x', 'fa-lg', 'fa-sm', 'fa-xs', 'fa-solid', 'fa-regular', 'fa-brands', 'fa-light', 'fa-thin', 'fa-duotone'):
                        continue
                        
                    icon_counts[match] = icon_counts.get(match, 0) + 1
                    if match not in icon_files:
                        icon_files[match] = set()
                    icon_files[match].add(os.path.relpath(filepath, theme_dir))
            except Exception as e:
                print(f"Error reading {filepath}: {e}")

print("Found unique icons:")
sorted_icons = sorted(icon_counts.items(), key=lambda x: x[1], reverse=True)
for icon, count in sorted_icons:
    files = list(icon_files[icon])
    print(f"- {icon} (used {count} times in {len(files)} files: {', '.join(files[:3])}{'...' if len(files)>3 else ''})")
