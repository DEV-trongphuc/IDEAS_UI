import re
import os

theme_dir = r"e:/IDEAS_WP_UI/wp-content/themes/LANDINGPAGE_MBA"
failed_icons = ['fa-file-certificate', 'fa-check-circle', 'fa-map-signs']

for root, dirs, files in os.walk(theme_dir):
    for file in files:
        if file.endswith(('.php', '.js', '.html')) and not file.endswith('.min.js'):
            filepath = os.path.join(root, file)
            with open(filepath, 'r', encoding='utf-8', errors='ignore') as f:
                content = f.read()
            for icon in failed_icons:
                if icon in content:
                    print(f"Icon '{icon}' found in {os.path.relpath(filepath, theme_dir)}")
