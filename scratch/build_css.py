import re
import os

src_path = r"wp-content/themes/LANDINGPAGE_MBA/common-assets/css/style.css"
dist_path = r"wp-content/themes/LANDINGPAGE_MBA/common-assets/css/style.min.css"

if not os.path.exists(src_path):
    print("Source style.css does not exist!")
    exit(1)

with open(src_path, "r", encoding="utf-8") as f:
    css = f.read()

# 1. Remove comments /* ... */
css = re.sub(r'/\*.*?\*/', '', css, flags=re.DOTALL)

# 2. Remove whitespace around punctuation
css = re.sub(r'\s*([\{\};:,])\s*', r'\1', css)

# 3. Remove extra whitespace/newlines
css = re.sub(r'\s+', ' ', css)

# 4. Strip leading/trailing spaces
css = css.strip()

with open(dist_path, "w", encoding="utf-8") as f:
    f.write(css)

print(f"Minified CSS successfully! Size: {len(css)} bytes")
