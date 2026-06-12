filepath = r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\common-assets\css\style.min.css"
with open(filepath, 'r', encoding='utf-8') as f:
    content = f.read()

idx = content.find("accred-stack-card.pos-4")
if idx != -1:
    print("Found:")
    print(content[idx-50:idx+250])
else:
    print("NOT FOUND")
