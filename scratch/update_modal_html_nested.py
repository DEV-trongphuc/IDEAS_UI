import os
import re

dir_path = r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA"

def patch_file(file_path):
    print(f"Processing: {file_path}")
    
    with open(file_path, "r", encoding="utf-8") as f:
        content = f.read()
    
    # Define regex pattern to match the top part of the container with buttons
    pattern = r'<div class="accred-modal-container" data-lenis-prevent>\s*<button class="accred-modal-slide-trigger" id="accred-slide-trigger" aria-label="([^"]+)">\s*<i class="fa-solid fa-chevron-right"></i>\s*</button>\s*<button class="accred-modal-close" id="accred-modal-close" aria-label="([^"]+)">✕</button>\s*<div class="accred-modal-content">'
    
    # We replace it with the nested version
    def replacement(m):
        btn_label = m.group(1)
        close_label = m.group(2)
        return f'''<div class="accred-modal-container" data-lenis-prevent>
            <div class="accred-modal-content">
                <button class="accred-modal-slide-trigger" id="accred-slide-trigger" aria-label="{btn_label}">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
                <button class="accred-modal-close" id="accred-modal-close" aria-label="{close_label}">✕</button>'''

    new_content, count = re.subn(pattern, replacement, content, flags=re.DOTALL)
    
    if count > 0:
        with open(file_path, "w", encoding="utf-8") as f:
            f.write(new_content)
        print(f"  Successfully patched {count} occurrence(s)!")
    else:
        # Check if already patched
        if 'class="accred-modal-content">\n                <button class="accred-modal-slide-trigger"' in content or 'class="accred-modal-content">\n            <button class="accred-modal-slide-trigger"' in content:
            print("  Already patched.")
        else:
            print("  Pattern not matched / no changes made.")

# Walk directory and apply patch to all .html files
for root, dirs, files in os.walk(dir_path):
    for file in files:
        if file.endswith(".html"):
            file_path = os.path.join(root, file)
            try:
                patch_file(file_path)
            except Exception as e:
                print(f"  Error processing {file_path}: {e}")
