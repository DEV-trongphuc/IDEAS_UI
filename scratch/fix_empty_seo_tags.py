import os

directory = r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA"
updated_files = []

for root, dirs, files in os.walk(directory):
    for file in files:
        if file.endswith('.html'):
            filepath = os.path.join(root, file)
            is_en = "en" in os.path.relpath(filepath, directory).split(os.sep)
            
            try:
                with open(filepath, 'r', encoding='utf-8') as f:
                    content = f.read()
                
                modified = False
                
                # 1. Fix empty strong
                if '<strong id="bk-success-name"></strong>' in content:
                    content = content.replace('<strong id="bk-success-name"></strong>', '<strong id="bk-success-name">-</strong>')
                    modified = True
                    
                # 2. Fix empty h3
                if '<h3 id="qz-result-title"></h3>' in content:
                    replacement = '<h3 id="qz-result-title">Quiz Result</h3>' if is_en else '<h3 id="qz-result-title">Kết quả</h3>'
                    content = content.replace('<h3 id="qz-result-title"></h3>', replacement)
                    modified = True
                    
                if modified:
                    with open(filepath, 'w', encoding='utf-8') as f:
                        f.write(content)
                    updated_files.append(os.path.relpath(filepath, directory))
                    
            except Exception as e:
                print(f"Error processing {file}: {e}")

print(f"Updated empty tags in {len(updated_files)} files:")
for f in updated_files:
    print(f"  - {f}")
