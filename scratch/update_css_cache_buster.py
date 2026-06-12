import os
import re

directory = r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA"
new_version = "1781275800"  # Fresh cache buster version for CSS
regex = re.compile(r'style\.min\.css\?v=\d+')

updated_files = []

for root, dirs, files in os.walk(directory):
    for file in files:
        if file.endswith('.html'):
            filepath = os.path.join(root, file)
            try:
                with open(filepath, 'r', encoding='utf-8') as f:
                    content = f.read()
                
                if regex.search(content):
                    new_content = regex.sub(f'style.min.css?v={new_version}', content)
                    if new_content != content:
                        with open(filepath, 'w', encoding='utf-8') as f:
                            f.write(new_content)
                        updated_files.append(os.path.relpath(filepath, directory))
            except Exception as e:
                print(f"Error processing {filepath}: {e}")

print(f"Updated CSS cache buster in {len(updated_files)} files:")
for f in updated_files:
    print(f"  - {f}")
