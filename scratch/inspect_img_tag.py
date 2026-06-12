import urllib.request
import json
import re
import sys

sys.stdout.reconfigure(encoding='utf-8')

url = "https://ideas.edu.vn/wp-json/wp/v2/posts?_embed&per_page=6"
req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
with urllib.request.urlopen(req) as response:
    data = json.loads(response.read().decode('utf-8'))

for idx, post in enumerate(data):
    content = post.get('content', {}).get('rendered', '')
    img_matches = re.findall(r'<img[^>]+>', content, re.IGNORECASE)
    print(f"\nPost {idx + 1}: {post.get('title', {}).get('rendered', '')}")
    print(f"  Total images found: {len(img_matches)}")
    for m in img_matches[:3]:
        print(f"    Match: {m}")
