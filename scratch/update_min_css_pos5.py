filepath = r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\common-assets\css\style.min.css"
with open(filepath, 'r', encoding='utf-8') as f:
    content = f.read()

target = ".accred-stack-card.pos-4{z-index:0;transform:translateZ(-240px) translateY(105px) rotate(24deg) translateX(45px);opacity:0.5}"
replacement = target + ".accred-stack-card.pos-5{z-index:0;transform:translateZ(-320px) translateY(140px) rotate(32deg) translateX(60px);opacity:0.3}"

if target in content:
    content = content.replace(target, replacement)
    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)
    print("Successfully updated style.min.css")
else:
    print("Target string not found in style.min.css")
