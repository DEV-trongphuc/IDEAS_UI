import re
import sys

sys.stdout.reconfigure(encoding='utf-8')

filepath = r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\bba.html"
with open(filepath, 'r', encoding='utf-8') as f:
    content = f.read()

pattern = re.compile(
    r'(<div class="accred-stack"\s+id="accred-stack"[^>]*>)(.*?)(</div>\s*<div class="accred-stack-controls">)',
    re.DOTALL
)

match = pattern.search(content)
if match:
    print("MATCHED SUCCESSFULLY!")
    print("Start tag:", match.group(1))
    print("End tag/controls:", match.group(3))
    print("Inner Content Preview:")
    print(match.group(2)[:200] + "...")
else:
    print("FAILED TO MATCH")
