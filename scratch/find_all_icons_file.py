import os
import re

theme_dir = r"e:/IDEAS_WP_UI/wp-content/themes/LANDINGPAGE_MBA"
icon_pattern = re.compile(r'\bfa-[a-zA-Z0-9\-]+\b')

icon_counts = {}
icon_files = {}

for root, dirs, files in os.walk(theme_dir):
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
                    if match in ('fa-spin', 'fa-pulse', 'fa-stack-1x', 'fa-stack-2x', 'fa-li', 'fa-fw', 'fa-border', 'fa-2x', 'fa-3x', 'fa-4x', 'fa-5x', 'fa-lg', 'fa-sm', 'fa-xs', 'fa-solid', 'fa-regular', 'fa-brands', 'fa-light', 'fa-thin', 'fa-duotone'):
                        continue
                    icon_counts[match] = icon_counts.get(match, 0) + 1
                    if match not in icon_files:
                        icon_files[match] = set()
                    icon_files[match].add(os.path.relpath(filepath, theme_dir))
            except Exception as e:
                print(f"Error: {e}")

sorted_icons = sorted(icon_counts.items(), key=lambda x: x[1], reverse=True)

output_path = r"C:\Users\AD\.gemini\antigravity-ide\brain\e7679c9c-2bbf-4196-924b-b974878d08a9\all_icons_audit.md"
with open(output_path, "w", encoding="utf-8") as f:
    f.write("# FontAwesome Icons Audit Report\n\n")
    f.write(f"Total unique icons found: {len(sorted_icons)}\n\n")
    f.write("| Icon Name | Occurrences | Used In Files |\n")
    f.write("| :--- | :--- | :--- |\n")
    for icon, count in sorted_icons:
        files = list(icon_files[icon])
        files_str = ", ".join([f"`{name}`" for name in files])
        f.write(f"| {icon} | {count} | {files_str} |\n")

print(f"Audit saved to {output_path}")
