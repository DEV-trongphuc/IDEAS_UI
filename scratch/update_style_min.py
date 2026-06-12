import re

file_path = r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\common-assets\css\style.min.css"

with open(file_path, "r", encoding="utf-8") as f:
    content = f.read()

target = ".hero-avatar-reveal{opacity:0;transform:scale(0.3) translateY(10px);animation:reveal-avatar 0.6s cubic-bezier(0.34,1.56,0.64,1) forwards}"
replacement = ".hero-avatar-reveal{opacity:0;transform:scale(0.3) translateY(10px);animation:reveal-avatar 0.6s cubic-bezier(0.34,1.56,0.64,1) forwards;object-fit:cover !important}"

if target in content:
    content_new = content.replace(target, replacement)
    with open(file_path, "w", encoding="utf-8") as f:
        f.write(content_new)
    print("Success: style.min.css updated!")
else:
    print("Error: Target not found in style.min.css")
