import os

filepath = r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html"
if not os.path.exists(filepath):
    print("Not found")
    exit()

with open(filepath, 'r', encoding='utf-8') as f:
    content = f.read()

start = content.find('<!-- Other accreditations grid -->')
if start == -1:
    start = content.find('<div class="acc-grid">')

if start != -1:
    # safe print (ascii only to avoid encoding errors)
    block = content[start:start+2500]
    print(block.encode('ascii', 'ignore').decode('ascii'))
else:
    print("Not found acc-grid")
