import json
import re
import os
import subprocess

db_path = r"e:\IDEAS_WP_UI\scratch\fa_svgs_db.json"
theme_dir = r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA"

if not os.path.exists(db_path):
    print("SVG Database not found!")
    exit(1)

with open(db_path, "r", encoding="utf-8") as f:
    svg_db = json.load(f)

# 1. Regex to match FontAwesome <i> tags
# Handles classes with double/single quotes, optional other attrs, optional spaces inside
i_tag_pattern = re.compile(r'<i\s+[^>]*class=["\']([^"\']*)["\'][^>]*>\s*</i>', re.IGNORECASE)

total_replaced = 0
files_modified = 0

def replacer(match):
    global total_replaced
    full_tag = match.group(0)
    classes_str = match.group(1)
    classes = classes_str.split()
    
    icon_class = None
    extra_classes = []
    for c in classes:
        # Identify the icon name class
        if c.startswith('fa-') and c not in ('fa-solid', 'fa-regular', 'fa-brands', 'fa-spin', 'fa-pulse', 'fa-stack-1x', 'fa-stack-2x', 'fa-li', 'fa-fw', 'fa-border', 'fa-2x', 'fa-3x', 'fa-4x', 'fa-5x', 'fa-lg', 'fa-sm', 'fa-xs', 'fa-light', 'fa-thin', 'fa-duotone'):
            icon_class = c
        else:
            extra_classes.append(c)
            
    if not icon_class or icon_class not in svg_db:
        return full_tag
        
    svg_data = svg_db[icon_class]
    
    # Extract style attribute if present
    style_match = re.search(r'style=["\']([^"\']+)["\']', full_tag)
    style_attr = f' style="{style_match.group(1)}"' if style_match else ''
    
    # Clean and extract other attributes (id, aria-hidden, data-*, etc.)
    attrs_clean = full_tag
    attrs_clean = re.sub(r'class=["\'][^"\']+["\']', '', attrs_clean)
    attrs_clean = re.sub(r'style=["\'][^"\']+["\']', '', attrs_clean)
    attrs_clean = re.sub(r'^<i\s*', '', attrs_clean)
    attrs_clean = re.sub(r'\s*/?>\s*</i>$', '', attrs_clean)
    attrs_clean = re.sub(r'\s*/?>$', '', attrs_clean)
    attrs_clean = attrs_clean.strip()
    other_attrs = f' {attrs_clean}' if attrs_clean else ''
    
    extra_classes_str = ' ' + ' '.join(extra_classes) if extra_classes else ''
    
    total_replaced += 1
    
    svg_replacement = (
        f'<svg class="svg-icon {icon_class}{extra_classes_str}"{style_attr}{other_attrs} '
        f'viewBox="{svg_data["viewBox"]}" width="16" height="16" fill="currentColor" '
        f'xmlns="http://www.w3.org/2000/svg">{svg_data["inner"]}</svg>'
    )
    return svg_replacement

# 2. Append CSS Helper Rules to style.css
style_css_path = os.path.join(theme_dir, "common-assets", "css", "style.css")
if os.path.exists(style_css_path):
    with open(style_css_path, "r", encoding="utf-8") as f:
        style_content = f.read()
        
    helper_css = """
/* ==========================================================================
   CUSTOM SVG ICONS HELPER STYLES (FontAwesome CDN Replacement)
   ========================================================================== */
.svg-icon {
    display: inline-block;
    width: 1em;
    height: 1em;
    vertical-align: -0.125em;
    overflow: visible;
}
.fa-spin {
    animation: fa-spin 2s infinite linear;
}
@keyframes fa-spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
"""
    if "CUSTOM SVG ICONS HELPER STYLES" not in style_content:
        with open(style_css_path, "a", encoding="utf-8") as f:
            f.write(helper_css)
        print("Successfully appended SVG helper rules to style.css")
    else:
        print("SVG helper rules already present in style.css")

# 3. Process All Files and Replace Icons
for root, dirs, files in os.walk(theme_dir):
    if '.git' in root or '.tmb' in root:
        continue
    for file in files:
        if file.endswith(('.php', '.js', '.html')) and not file.endswith('.min.js'):
            filepath = os.path.join(root, file)
            with open(filepath, 'r', encoding='utf-8', errors='ignore') as f:
                content = f.read()
                
            new_content, count = i_tag_pattern.subn(replacer, content)
            
            # Additional cleanups per file
            # A. Remove FontAwesome CDN Link from shared-head.php
            if file == "shared-head.php":
                head_pattern = r'<link\s+rel=["\']stylesheet["\']\s+href=["\']https://cdnjs\.cloudflare\.com/ajax/libs/font-awesome/.*?/all\.min\.css["\']\s*/?>'
                new_content, cdn_count = re.subn(head_pattern, '<!-- FontAwesome CDN Removed -->', new_content, flags=re.IGNORECASE)
                if cdn_count > 0:
                    print("Removed FontAwesome CDN link from shared-head.php")
                    count += cdn_count
            
            # B. Remove dynamic loading script from script.js
            if file == "script.js":
                dynamic_pattern = r'//\s*Load FontAwesome dynamically if not present.*?document\.head\.appendChild\(fontAwesomeLink\);\s*\}'
                new_content, dyn_count = re.subn(dynamic_pattern, '', new_content, flags=re.DOTALL | re.IGNORECASE)
                if dyn_count > 0:
                    print("Removed dynamic FontAwesome loading logic from script.js")
                    count += dyn_count
            
            if count > 0:
                with open(filepath, 'w', encoding='utf-8') as f:
                    f.write(new_content)
                print(f"Updated {os.path.relpath(filepath, theme_dir)}: replaced {count} occurrences.")
                files_modified += 1

print(f"\nMigration completed. Replaced {total_replaced} FontAwesome icon tags across {files_modified} files.")

# 4. Compile Minified Files
print("\nCompiling production JS & CSS assets...")
try:
    subprocess.run(["python", r"e:\IDEAS_WP_UI\scratch\build_js.py"], check=True)
    subprocess.run(["python", r"e:\IDEAS_WP_UI\scratch\apply_modal_mobile_styles.py"], check=True)
    print("Minification completed successfully!")
except Exception as e:
    print(f"Error compiling assets: {e}")
