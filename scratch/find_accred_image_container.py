with open(r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html", "r", encoding="utf-8") as f:
    content = f.read()

# remove style tags to look at body only
import re
body_content = re.sub(r'<style[^>]*>.*?</style>', '', content, flags=re.DOTALL)

matches = [m.start() for m in re.finditer("accred-image-container", body_content)]
for m in matches:
    print(body_content[m-100:m+200])
