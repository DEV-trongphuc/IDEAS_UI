import re

files = [
    r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\page-thac-si-quan-tri-kinh-doanh-mba.php",
    r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\page-swiss-umef.php",
    r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html",
    r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\en\index.html"
]

for file_path in files:
    with open(file_path, "r", encoding="utf-8") as f:
        content = f.read()
    
    # Replace backslashed single quotes with normal single quotes
    # specifically inside onmouseover, onmouseout, and PHP tags
    new_content = content.replace(r"\'", "'")
    
    if new_content != content:
        with open(file_path, "w", encoding="utf-8") as f:
            f.write(new_content)
        print(f"Fixed backslashes in {file_path}")
    else:
        print(f"No backslashes found in {file_path}")
