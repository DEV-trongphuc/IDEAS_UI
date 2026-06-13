import os
import re

base_dir = r"e:\IDEAS_WP_UI"
search_term = "cursor: default"

print("Searching for files containing 'cursor: default'...")
for root, dirs, files in os.walk(base_dir):
    # skip .git
    if '.git' in root or '.tmb' in root:
        continue
    for file in files:
        if file.endswith(('.php', '.css', '.js', '.html')):
            filepath = os.path.join(root, file)
            try:
                with open(filepath, 'r', encoding='utf-8', errors='ignore') as f:
                    content = f.read()
                if '.acc-card' in content and 'cursor' in content:
                    print(f"Match in: {os.path.relpath(filepath, base_dir)}")
                    # print snippet around it
                    matches = re.finditer(r'\.acc-card\s*\{[^}]*\}', content, re.DOTALL)
                    for m in matches:
                        print("  Found Block:\n", m.group(0))
            except Exception as e:
                pass
print("Done.")
