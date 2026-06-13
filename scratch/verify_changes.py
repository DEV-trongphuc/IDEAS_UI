import os
import re

# Verification Config
root_dir = r'e:/IDEAS_WP_UI/wp-content/new_public/LANDINGPAGE_MBA'
theme_dir = r'e:/IDEAS_WP_UI/wp-content/themes/LANDINGPAGE_MBA'

# Find all HTML files
html_files = []
for root, dirs, files in os.walk(root_dir):
    for file in files:
        if file.endswith('.html'):
            html_files.append(os.path.join(root, file))

print(f'Checking {len(html_files)} HTML files for synchronous FontAwesome stylesheet loading...')
errors = 0

expected_fa = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />'

for filepath in html_files:
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
    
    if expected_fa not in content:
        print(f'  -> ERROR: Missing or incorrect FontAwesome stylesheet link in {filepath}')
        errors += 1
    
    # Check if the specific font-awesome tag contains media="print"
    fa_pattern = r'<link[^>]*cdnjs\.cloudflare\.com/ajax/libs/font-awesome[^>]*media=["\']print["\'][^>]*>'
    if re.search(fa_pattern, content):
        print(f'  -> ERROR: Async FontAwesome stylesheet link found in {filepath}')
        errors += 1

# Check shared-head.php
shared_head = os.path.join(theme_dir, 'shared-head.php')
print(f'Checking {shared_head}...')
with open(shared_head, 'r', encoding='utf-8') as f:
    sh_content = f.read()

if expected_fa not in sh_content:
    print(f'  -> ERROR: Missing or incorrect FontAwesome stylesheet link in shared-head.php')
    errors += 1

fa_pattern_sh = r'<link[^>]*cdnjs\.cloudflare\.com/ajax/libs/font-awesome[^>]*media=["\']print["\'][^>]*>'
if re.search(fa_pattern_sh, sh_content):
    print(f'  -> ERROR: Async FontAwesome stylesheet link found in shared-head.php')
    errors += 1

# Check CSS rule in the 4 modified files
css_files = [
    os.path.join(theme_dir, 'page-swiss-umef.php'),
    os.path.join(theme_dir, 'page-thac-si-quan-tri-kinh-doanh-mba.php'),
    os.path.join(root_dir, 'index.html'),
    os.path.join(root_dir, 'en/index.html')
]

print('\nChecking CSS hover-scale override rule in targeted files...')
for filepath in css_files:
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Check for rule
    normalized_content = ' '.join(content.split())
    if '.acc-sac-hero, .acc-sac-hero *:hover { transform: none !important;' not in normalized_content:
        print(f'  -> ERROR: Missing hover transform override rule in {filepath}')
        errors += 1
    else:
        print(f'  -> PASS: Override rule successfully found in {filepath}')

if errors == 0:
    print('\nAll checks PASSED successfully! Execution verification complete.')
else:
    print(f'\nVerification FAILED with {errors} errors.')
    exit(1)
