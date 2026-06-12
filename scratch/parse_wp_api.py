import urllib.request
import json
import re
import sys

# Ensure UTF-8 printing on Windows console
sys.stdout.reconfigure(encoding='utf-8')

url = "https://ideas.edu.vn/wp-json/wp/v2/posts?_embed&per_page=6"
try:
    req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
    with urllib.request.urlopen(req) as response:
        data = json.loads(response.read().decode('utf-8'))
        
    print(f"Fetched {len(data)} posts:")
    for idx, post in enumerate(data):
        title = post.get('title', {}).get('rendered', '')
        featured_media = post.get('featured_media', 0)
        
        # Check featured media in _embedded
        featured_url = None
        embedded = post.get('_embedded', {})
        if 'wp:featuredmedia' in embedded and len(embedded['wp:featuredmedia']) > 0:
            featured_url = embedded['wp:featuredmedia'][0].get('source_url')
            
        content = post.get('content', {}).get('rendered', '')
        img_match = re.search(r'<img[^>]+src=["\']([^"\']+)["\']', content, re.IGNORECASE)
        img_in_content = img_match.group(1) if img_match else None
        
        print(f"\nPost {idx + 1}: {title}")
        print(f"  featured_media ID: {featured_media}")
        print(f"  featured_media URL: {featured_url}")
        print(f"  first img in content: {img_in_content}")
except Exception as e:
    print("Error:", e)
