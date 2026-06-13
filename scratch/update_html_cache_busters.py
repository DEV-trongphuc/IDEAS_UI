import os
import re

html_dir = r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA"

updates = {
    r"style\.min\.css\?v=\d+": "style.min.css?v=1781334600",
    r"script\.min\.js\?v=\d+": "script.min.js?v=1781334600",
    r"booking-modal\.min\.css\?v=\d+": "booking-modal.min.css?v=1781334600",
    r"booking-modal\.min\.js\?v=\d+": "booking-modal.min.js?v=1781334600"
}

def update_file(file_path):
    with open(file_path, "r", encoding="utf-8") as f:
        content = f.read()

    new_content = content
    modified = False

    for pattern, replacement in updates.items():
        # Match using regex and replace
        updated_content, count = re.subn(pattern, replacement, new_content)
        if count > 0:
            new_content = updated_content
            modified = True
            print(f"  Updated pattern '{pattern}' {count} times")

    if modified:
        with open(file_path, "w", encoding="utf-8") as f:
            f.write(new_content)
        print(f"Saved: {file_path}")
    else:
        print(f"No changes: {file_path}")

for root, dirs, files in os.walk(html_dir):
    for file in files:
        if file.endswith(".html"):
            file_path = os.path.join(root, file)
            print(f"Scanning: {file_path}")
            try:
                update_file(file_path)
            except Exception as e:
                print(f"Error updating {file_path}: {e}")
