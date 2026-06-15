import re

path = r'e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html'
with open(path, 'r', encoding='utf-8') as f:
    html = f.read()

# Let's search for "gentle-float" keyframe definitions
matches = re.finditer(r'@keyframes gentle-float', html)
print("Keyframe matches:")
for m in matches:
    start = max(0, m.start() - 100)
    end = min(len(html), m.end() + 600)
    safe_str = html[start:end].encode('ascii', 'backslashreplace').decode('ascii')
    print(repr(safe_str))
    print("="*80)
