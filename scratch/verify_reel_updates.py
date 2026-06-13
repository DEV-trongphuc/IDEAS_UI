import os

theme_dir = r'e:/IDEAS_WP_UI/wp-content/themes/LANDINGPAGE_MBA'
public_dir = r'e:/IDEAS_WP_UI/wp-content/new_public/LANDINGPAGE_MBA'

errors = []

# 1. Check page-reel.php exists and contains key elements
page_reel_path = os.path.join(theme_dir, 'page-reel.php')
if not os.path.exists(page_reel_path):
    errors.append("page-reel.php does not exist!")
else:
    with open(page_reel_path, 'r', encoding='utf-8') as f:
        content = f.read()
    if 'Template Name: Immersive Reels Template' not in content:
        errors.append("page-reel.php is missing template headers.")
    if 'reel-app-frame' not in content:
        errors.append("page-reel.php is missing reel-app-frame container.")
    if 'IntersectionObserver' not in content:
        errors.append("page-reel.php is missing IntersectionObserver logic.")
    print("OK - page-reel.php verified successfully.")

# 2. Check create-pages.php config
create_pages_path = os.path.join(theme_dir, 'create-pages.php')
if not os.path.exists(create_pages_path):
    errors.append("create-pages.php does not exist!")
else:
    with open(create_pages_path, 'r', encoding='utf-8') as f:
        content = f.read()
    if "'slug' => 'reel'" not in content or "'template' => 'page-reel.php'" not in content:
        errors.append("create-pages.php does not register the reel template.")
    print("OK - create-pages.php config verified successfully.")

# 3. Check shared-modals.php contains reel promo cards
shared_modals_path = os.path.join(theme_dir, 'shared-modals.php')
if not os.path.exists(shared_modals_path):
    errors.append("shared-modals.php does not exist!")
else:
    with open(shared_modals_path, 'r', encoding='utf-8') as f:
        content = f.read()
    if 'reel-promo-card' not in content:
        errors.append("shared-modals.php is missing the reel-promo-card element.")
    if 'is_single()' not in content:
        errors.append("shared-modals.php does not check if the page is single().")
    print("OK - shared-modals.php verified successfully.")

# 4. Check category.php and archive.php
for filename in ['category.php', 'archive.php']:
    filepath = os.path.join(theme_dir, filename)
    if not os.path.exists(filepath):
        errors.append(f"{filename} does not exist!")
    else:
        with open(filepath, 'r', encoding='utf-8') as f:
            content = f.read()
        if 'reel-explorer-banner' not in content:
            errors.append(f"{filename} is missing the reel-explorer-banner element.")
        print(f"OK - {filename} verified successfully.")

# 5. Check static html landing pages (index.html, bba.html, etc.)
html_files = []
for root, dirs, files in os.walk(public_dir):
    for file in files:
        if file.endswith('.html') and file != 'singlepost.html':
            html_files.append(os.path.join(root, file))

for filepath in html_files:
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
    if 'fb-reel-modal' not in content:
        errors.append(f"Landing page {os.path.basename(filepath)} is missing the fb-reel-modal markup.")

if not errors:
    print(f"OK - All {len(html_files)} static landing pages verified successfully.")
    print("ALL TESTS PASSED SUCCESSFULLY!")
else:
    print("\n--- ERRORS FOUND ---")
    for err in errors:
        print("ERROR -", err)
    exit(1)
