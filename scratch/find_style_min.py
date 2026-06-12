import re

with open(r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\common-assets\css\style.min.css", "r", encoding="utf-8") as f:
    content = f.read()

pattern = r"\.hero-avatar-reveal\{[^}]*\}"
match = re.search(pattern, content)
if match:
    print("Found match:", match.group(0))
else:
    print("No match found for pattern:", pattern)
    # Let's find index of hero-avatar-reveal
    idx = content.find("hero-avatar-reveal")
    if idx != -1:
        print("Sub-string found at index:", idx)
        print("Surrounding content:", content[idx-50:idx+150])
    else:
        print("Sub-string not found at all")
