import os

html_dir = r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA"
old_css_v = "style.min.css?v=1781289867"
new_css_v = "style.min.css?v=1781293300"

def update_file(file_path):
    with open(file_path, "r", encoding="utf-8") as f:
        content = f.read()

    if old_css_v in content:
        content = content.replace(old_css_v, new_css_v)
        with open(file_path, "w", encoding="utf-8") as f:
            f.write(content)
        print(f"Updated: {file_path}")
    else:
        print(f"Already updated or skip: {file_path}")

for root, dirs, files in os.walk(html_dir):
    for file in files:
        if file.endswith(".html"):
            file_path = os.path.join(root, file)
            try:
                update_file(file_path)
            except Exception as e:
                print(f"Error {file_path}: {e}")
