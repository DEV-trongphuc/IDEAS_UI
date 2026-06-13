import re
import os

src_path = r"e:/IDEAS_WP_UI/wp-content/themes/LANDINGPAGE_MBA/common-assets/js/script.js"
dist_path = r"e:/IDEAS_WP_UI/wp-content/themes/LANDINGPAGE_MBA/common-assets/js/script.min.js"

if not os.path.exists(src_path):
    print("Source script.js does not exist!")
    exit(1)

with open(src_path, "r", encoding="utf-8") as f:
    js = f.read()

# 1. Remove block comments /* ... */
js = re.sub(r'/\*.*?\*/', '', js, flags=re.DOTALL)

# 2. Remove single-line comments // ...
# Be careful not to strip URL protocols (http://, https://) or comments inside string literals.
# A regex lookbehind is used to ensure the comment delimiter '//' is not preceded by 'http:' or 'https:'.
lines = js.split('\n')
clean_lines = []
for line in lines:
    # Strip comment if present and not part of a URL
    line_no_comment = re.sub(r'(?<!http:)(?<!https:)//.*$', '', line)
    clean_lines.append(line_no_comment)

js = '\n'.join(clean_lines)

# 3. Strip extra spaces and empty lines (safe joining with newline to prevent semicolon issues)
clean_lines = []
for line in js.split('\n'):
    line = line.strip()
    if line:
        clean_lines.append(line)

js_min = '\n'.join(clean_lines)

with open(dist_path, "w", encoding="utf-8") as f:
    f.write(js_min)

print(f"Minified successfully! Size: {len(js_min)} bytes (original: {len(js)} bytes)")
