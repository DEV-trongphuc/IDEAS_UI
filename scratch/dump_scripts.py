import re
import sys

sys.stdout.reconfigure(encoding='utf-8')

script_pattern = re.compile(r"<script[^>]*src=[\"']([^\"']+)[\"'][^>]*>", re.IGNORECASE)

def get_scripts(filepath):
    scripts = []
    with open(filepath, "r", encoding="utf-8") as f:
        content = f.read()
    
    for match in script_pattern.finditer(content):
        scripts.append(match.group(0))
    return scripts

print("=== Vietnamese index.html script tags ===")
for s in get_scripts(r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html"):
    print(s)

print("\n=== English en/index.html script tags ===")
for s in get_scripts(r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\en\index.html"):
    print(s)
