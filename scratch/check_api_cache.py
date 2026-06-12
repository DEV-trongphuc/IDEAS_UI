import urllib.request
import json
import time

url_cached = "https://ideas.edu.vn/wp-json/wp/v2/posts?_embed&per_page=6"
url_fresh = f"https://ideas.edu.vn/wp-json/wp/v2/posts?_embed&per_page=6&cb={int(time.time())}"

req_cached = urllib.request.Request(url_cached, headers={'User-Agent': 'Mozilla/5.0'})
req_fresh = urllib.request.Request(url_fresh, headers={'User-Agent': 'Mozilla/5.0'})

try:
    with urllib.request.urlopen(req_cached) as r1:
        data_cached = json.loads(r1.read())
    with urllib.request.urlopen(req_fresh) as r2:
        data_fresh = json.loads(r2.read())
        
    output = []
    output.append(f"Cached response posts count: {len(data_cached)}")
    output.append(f"Fresh response posts count: {len(data_fresh)}")
    
    post2_cached = data_cached[1]
    post2_fresh = data_fresh[1]
    
    output.append("\nCached Post 2:")
    output.append(f"  Title: {post2_cached['title']['rendered']}")
    output.append(f"  Content keys: {list(post2_cached.get('content', {}).keys())}")
    output.append(f"  Content length: {len(post2_cached.get('content', {}).get('rendered', ''))}")
    output.append(f"  Has featuredmedia key in _embedded: {'wp:featuredmedia' in post2_cached.get('_embedded', {})}")
    
    output.append("\nFresh Post 2:")
    output.append(f"  Title: {post2_fresh['title']['rendered']}")
    output.append(f"  Content keys: {list(post2_fresh.get('content', {}).keys())}")
    output.append(f"  Content length: {len(post2_fresh.get('content', {}).get('rendered', ''))}")
    output.append(f"  Has featuredmedia key in _embedded: {'wp:featuredmedia' in post2_fresh.get('_embedded', {})}")
    
    with open("scratch/api_cache_output.txt", "w", encoding="utf-8") as f:
        f.write("\n".join(output))
    print("Success!")
except Exception as e:
    print("Error:", e)
