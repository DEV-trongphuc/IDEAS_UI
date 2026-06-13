import os

filepath = r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html"
if not os.path.exists(filepath):
    print("Not found")
    exit()

with open(filepath, 'r', encoding='utf-8') as f:
    content = f.read()

idx = content.find('id="accred-modal"')
if idx != -1:
    start = max(0, idx - 200)
    end = min(len(content), idx + 800)
    print(content[start:end].encode('ascii', 'ignore').decode('ascii'))
else:
    print("accred-modal not found")
