import json
import re
import os
import subprocess

db_path = r"e:\IDEAS_WP_UI\scratch\fa_svgs_db.json"
theme_dir = r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA"
new_public_dir = r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA"
root_file = r"e:\IDEAS_WP_UI\wp-convert-webp.php"

if not os.path.exists(db_path):
    print("SVG Database not found!")
    exit(1)

with open(db_path, "r", encoding="utf-8") as f:
    svg_db = json.load(f)

# 1. Regex to match FontAwesome <i> tags
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

# 2. Cleanup Patterns for CDN and Preconnect
# Remove CDN links (stylesheets and preloads) for FontAwesome
cdn_link_pattern = re.compile(
    r'<link\s+[^>]*href=["\'][^"\']*cdnjs\.cloudflare\.com/ajax/libs/font-awesome/[^"\']*["\'][^>]*>', 
    re.IGNORECASE | re.DOTALL
)

# Remove dns-prefetch/preconnect tags for cdnjs.cloudflare.com
preconnect_pattern = re.compile(
    r'<link\s+[^>]*href=["\']https://cdnjs\.cloudflare\.com["\'][^>]*>', 
    re.IGNORECASE | re.DOTALL
)

# Remove HTML/PHP comment placeholders if we want to keep it extremely clean
comment_placeholder_pattern = re.compile(r'<!-- FontAwesome CDN Removed -->', re.IGNORECASE)

def process_file(filepath):
    global files_modified
    if not os.path.exists(filepath):
        return
        
    with open(filepath, 'r', encoding='utf-8', errors='ignore') as f:
        content = f.read()
        
    original = content
    
    # A. Replace icon tags
    content, count_replaced = i_tag_pattern.subn(replacer, content)
    
    # B. Remove CDN Link/Preloads
    content, count_cdn = cdn_link_pattern.subn('', content)
    
    # C. Remove preconnect/dns-prefetch for cdnjs.cloudflare.com
    content, count_preconnect = preconnect_pattern.subn('', content)
    
    # D. Remove any existing FontAwesome CDN comments
    content, count_comments = comment_placeholder_pattern.subn('', content)
    
    # E. Specific file manual cleanups
    file = os.path.basename(filepath)
    count_extra = 0
    
    # Remove dynamic FontAwesome loading logic from script.js if not already done
    if file == "script.js":
        dynamic_pattern = r'//\s*Load FontAwesome dynamically if not present.*?document\.head\.appendChild\(fontAwesomeLink\);\s*\}'
        content, dyn_count = re.subn(dynamic_pattern, '', content, flags=re.DOTALL | re.IGNORECASE)
        count_extra += dyn_count
        
    total_file_changes = count_replaced + count_cdn + count_preconnect + count_comments + count_extra
    
    if content != original:
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(content)
        
        rel_path = os.path.relpath(filepath, r"e:\IDEAS_WP_UI")
        print(f"Updated {rel_path}: replaced {count_replaced} icons, removed {count_cdn} CDN links, {count_preconnect} preconnects.")
        files_modified += 1

# Gather all target paths
targets = []

# Root webp utility page
if os.path.exists(root_file):
    targets.append(root_file)

# Theme files
for root, dirs, files in os.walk(theme_dir):
    if '.git' in root or '.tmb' in root:
        continue
    for file in files:
        if file.endswith(('.php', '.js', '.html')) and not file.endswith('.min.js') and not file.endswith('.min.css'):
            targets.append(os.path.join(root, file))

# Static/new_public files
for root, dirs, files in os.walk(new_public_dir):
    if '.git' in root or '.tmb' in root or 'assets' in root or 'homepage-assets' in root:
        continue
    for file in files:
        if file.endswith(('.html', '.php', '.js')) and not file.endswith('.min.js') and not file.endswith('.min.css'):
            targets.append(os.path.join(root, file))

print(f"Scanning and processing {len(targets)} files...")
for t in targets:
    process_file(t)

print(f"\nMigration and audit complete! Modified {files_modified} files and replaced {total_replaced} icon tags in this run.")

# Compile assets
print("\nCompiling production assets...")
try:
    subprocess.run(["python", r"e:\IDEAS_WP_UI\scratch\build_js.py"], check=True)
    subprocess.run(["python", r"e:\IDEAS_WP_UI\scratch\apply_modal_mobile_styles.py"], check=True)
    print("Compilation completed successfully!")
except Exception as e:
    print(f"Error compiling assets: {e}")
