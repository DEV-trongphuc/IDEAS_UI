filepath = "e:/IDEAS_WP_UI/wp-content/themes/LANDINGPAGE_MBA/functions.php"
with open(filepath, "r", encoding="utf-8", errors="ignore") as f:
    content = f.read()
    lines = content.splitlines()
    start = -1
    for idx, line in enumerate(lines):
        if "ideas_add_seo_schemas" in line:
            start = idx
        if start != -1 and "}" in line:
            print(f"Start line: {start + 1}")
            print(f"End line: {idx + 1}")
            break
