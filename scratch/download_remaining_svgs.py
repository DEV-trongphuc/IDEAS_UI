import json
import urllib.request
import re
import os

db_path = r"e:\IDEAS_WP_UI\scratch\fa_svgs_db.json"

if not os.path.exists(db_path):
    print("SVG Database not found!")
    exit(1)

with open(db_path, "r", encoding="utf-8") as f:
    svg_db = json.load(f)

remaining_icons = [
    'fa-angles-right',
    'fa-battery-half',
    'fa-briefcase',
    'fa-chart-line',
    'fa-code-compare',
    'fa-hourglass-half',
    'fa-language',
    'fa-lightbulb',
    'fa-microchip',
    'fa-quote-left',
    'fa-shield',
    'fa-square-instagram'
]

styles = ['solid', 'regular', 'brands']
downloaded_count = 0

for icon_class in remaining_icons:
    icon_name = icon_class.replace('fa-', '')
    success = False
    
    # Try different styles: solid, regular, brands
    for style in styles:
        url = f"https://raw.githubusercontent.com/FortAwesome/Font-Awesome/6.x/svgs/{style}/{icon_name}.svg"
        try:
            req = urllib.request.Request(
                url, 
                headers={'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)'}
            )
            with urllib.request.urlopen(req, timeout=5) as response:
                content = response.read().decode('utf-8')
            
            content = re.sub(r'<\?xml.*?\?>', '', content, flags=re.DOTALL)
            content = re.sub(r'<!--.*?-->', '', content, flags=re.DOTALL)
            content = content.strip()
            
            viewbox_match = re.search(r'viewBox="([^"]+)"', content)
            viewbox = viewbox_match.group(1) if viewbox_match else "0 0 512 512"
            
            inner_content_match = re.search(r'<svg[^>]*>(.*?)</svg>', content, re.DOTALL)
            inner_content = inner_content_match.group(1) if inner_content_match else ""
            inner_content = inner_content.strip()
            
            svg_db[icon_class] = {
                'viewBox': viewbox,
                'inner': inner_content,
                'style': style
            }
            print(f"Successfully downloaded and merged: {icon_class} ({style})")
            downloaded_count += 1
            success = True
            break
        except Exception:
            continue
            
    if not success:
        print(f"Could not download {icon_class} from any style folder.")

# Map check-circle if needed
if 'fa-circle-check' in svg_db:
    svg_db['fa-check-circle'] = svg_db['fa-circle-check']

with open(db_path, "w", encoding="utf-8") as f:
    json.dump(svg_db, f, indent=4)

print(f"\nDatabase updated successfully! Added {downloaded_count} new icons.")
