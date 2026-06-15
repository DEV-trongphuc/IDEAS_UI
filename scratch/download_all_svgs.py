import json
import os
import re
import urllib.request
import time

audit_path = r"C:\Users\AD\.gemini\antigravity-ide\brain\e7679c9c-2bbf-4196-924b-b974878d08a9\all_icons_audit.md"
db_path = r"e:\IDEAS_WP_UI\scratch\fa_svgs_db.json"

if not os.path.exists(audit_path):
    print("Audit report not found!")
    exit(1)

# Extract icon names from the markdown table
icon_names = []
with open(audit_path, "r", encoding="utf-8") as f:
    for line in f:
        match = re.search(r'\|\s*(fa-[a-zA-Z0-9\-]+)\s*\|', line)
        if match:
            icon_class = match.group(1)
            # Filter out generic CSS class names or helper styles
            if icon_class not in ('fa-solid-900', 'fa-brands-400', 'fa-spin', 'fa-pulse'):
                icon_names.append(icon_class)

print(f"Audited {len(icon_names)} icons to download.")

svg_db = {}
# Try to load existing db to resume or save time
if os.path.exists(db_path):
    try:
        with open(db_path, "r", encoding="utf-8") as f:
            svg_db = json.load(f)
        print(f"Loaded {len(svg_db)} already cached SVGs.")
    except Exception as e:
        print(f"Error reading DB: {e}")

styles = ['solid', 'regular', 'brands']

for i, icon_class in enumerate(icon_names):
    if icon_class in svg_db:
        continue
        
    icon_name = icon_class.replace('fa-', '')
    success = False
    
    # Try different folders on GitHub
    for style in styles:
        url = f"https://raw.githubusercontent.com/FortAwesome/Font-Awesome/6.x/svgs/{style}/{icon_name}.svg"
        try:
            req = urllib.request.Request(
                url, 
                headers={'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)'}
            )
            with urllib.request.urlopen(req, timeout=5) as response:
                content = response.read().decode('utf-8')
            
            # Clean up the XML structure
            # Remove XML declaration and comments
            content = re.sub(r'<\?xml.*?\?>', '', content, flags=re.DOTALL)
            content = re.sub(r'<!--.*?-->', '', content, flags=re.DOTALL)
            content = content.strip()
            
            # Extract viewBox
            viewbox_match = re.search(r'viewBox="([^"]+)"', content)
            viewbox = viewbox_match.group(1) if viewbox_match else "0 0 512 512"
            
            # Extract path data
            # SVGs might have multiple paths or circles, so we get the entire inner content
            inner_content_match = re.search(r'<svg[^>]*>(.*?)</svg>', content, re.DOTALL)
            inner_content = inner_content_match.group(1) if inner_content_match else ""
            inner_content = inner_content.strip()
            
            svg_db[icon_class] = {
                'viewBox': viewbox,
                'inner': inner_content,
                'style': style
            }
            
            print(f"[{i+1}/{len(icon_names)}] Downloaded {icon_class} ({style})")
            success = True
            break
        except urllib.error.HTTPError as e:
            if e.code == 404:
                continue
            else:
                print(f"HTTP Error for {icon_class} ({style}): {e.code}")
        except Exception as e:
            print(f"Error for {icon_class} ({style}): {e}")
            
    if not success:
        print(f"FAILED to download {icon_class} from any folder.")
    
    # Throttle slightly
    time.sleep(0.1)

# Save DB
with open(db_path, "w", encoding="utf-8") as f:
    json.dump(svg_db, f, indent=4)

print(f"Database saved. Total cached SVGs: {len(svg_db)}")
