import urllib.request
import json
import sys

url = "https://ideas.edu.vn/wp-json/wp/v2/posts?_embed&per_page=6"
req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
try:
    with urllib.request.urlopen(req) as response:
        html = response.read()
        posts = json.loads(html)
        print("Fetched", len(posts), "posts:")
        for idx, post in enumerate(posts):
            title = post['title']['rendered']
            media = post.get('_embedded', {}).get('wp:featuredmedia')
            media_url = media[0]['source_url'] if media else 'NO MEDIA'
            # Safe print
            safe_title = title.encode('ascii', 'ignore').decode('ascii')
            print(f"Post {idx+1}: {safe_title}")
            print(f"  Media URL: {media_url}")
except Exception as e:
    print("Error:", e)
