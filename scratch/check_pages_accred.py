import urllib.request
import re

urls = [
    'https://ideas.edu.vn/',
    'https://ideas.edu.vn/mba',
    'https://ideas.edu.vn/en/mba',
    'https://ideas.edu.vn/swiss-umef'
]

for url in urls:
    req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
    try:
        with urllib.request.urlopen(req) as response:
            html = response.read().decode('utf-8')
        print(f"=== {url} ===")
        matches = re.findall(r'<div class="acc-card"[^>]*>', html)
        print(f"Total acc-card found: {len(matches)}")
        for m in matches:
            print("  Tag:", m)
    except Exception as e:
        print(f"Error on {url}: {e}")
