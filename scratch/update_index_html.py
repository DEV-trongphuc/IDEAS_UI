import os

filepath = r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html"
if not os.path.exists(filepath):
    print("Not found index.html")
    exit()

with open(filepath, 'r', encoding='utf-8') as f:
    content = f.read()

# Replace button closing character
old_btn = 'id="accred-modal-close" aria-label="Close modal"></button>'
new_btn = 'id="accred-modal-close" aria-label="Close modal">✕</button>'

if old_btn in content:
    content = content.replace(old_btn, new_btn)
    print("Button close replaced!")
else:
    print("Button close NOT replaced or already updated.")

with open(filepath, 'w', encoding='utf-8') as f:
    f.write(content)
print("Done index.html patch!")
