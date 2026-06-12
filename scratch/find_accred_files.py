import os

directory = r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA"
matches = []

for root, dirs, files in os.walk(directory):
    for file in files:
        if file.endswith('.html'):
            filepath = os.path.join(root, file)
            try:
                with open(filepath, 'r', encoding='utf-8') as f:
                    content = f.read()
                if 'id="accred-stack"' in content:
                    matches.append(os.path.relpath(filepath, directory))
            except Exception as e:
                print(f"Error reading {file}: {e}")

print("HTML files containing accred-stack:")
for m in matches:
    print(f"  - {m}")
