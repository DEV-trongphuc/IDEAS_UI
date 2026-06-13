import os

filepath = r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html"
if not os.path.exists(filepath):
    print("Not found")
    exit()

with open(filepath, 'r', encoding='utf-8') as f:
    content = f.read()

idx = content.find('id="lightbox"')
if idx != -1:
    start_search = max(0, idx - 200)
    end_search = min(len(content), idx + 600)
    block = content[start_search:end_search]
    print(block.encode('ascii', 'ignore').decode('ascii'))
else:
    print("lightbox not found")
