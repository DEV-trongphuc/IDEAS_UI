import os
import re

dir_path = r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA"

pattern = r'<button class="accred-modal-slide-trigger" id="accred-slide-trigger" aria-label="[^"]+">\s*<i class="fa-solid fa-chevron-right"></i>\s*</button>\s*'

def patch_file(file_path):
    with open(file_path, "r", encoding="utf-8") as f:
        content = f.read()
    
    new_content, count = re.subn(pattern, "", content, flags=re.DOTALL)
    
    if count > 0:
        with open(file_path, "w", encoding="utf-8") as f:
            f.write(new_content)
        print(f"  Removed trigger button from {file_path} ({count} occurrence(s))")
    else:
        print(f"  No trigger button found in {file_path}")

for root, dirs, files in os.walk(dir_path):
    for file in files:
        if file.endswith(".html"):
            file_path = os.path.join(root, file)
            try:
                patch_file(file_path)
            except Exception as e:
                print(f"  Error processing {file_path}: {e}")
