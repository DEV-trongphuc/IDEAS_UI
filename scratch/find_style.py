import os

css_path = r"e:/IDEAS_WP_UI/wp-content/themes/LANDINGPAGE_MBA/common-assets/css/style.css"

if not os.path.exists(css_path):
    print("CSS file does not exist!")
    exit(1)

with open(css_path, "r", encoding="utf-8") as f:
    lines = f.readlines()

keywords = ["ideas_header", "dropdown", "mobile-", "back-to-top"]

for i, line in enumerate(lines):
    for kw in keywords:
        if kw in line:
            print(f"Line {i+1} ({kw}): {line.strip()[:100]}")
