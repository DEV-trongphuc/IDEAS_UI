import urllib.request
import json

url = "https://ideas.edu.vn/wp-json/wp/v2/posts?_embed&per_page=6"
req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
try:
    with urllib.request.urlopen(req) as response:
        html = response.read()
        posts = json.loads(html)
        
        output = []
        post2 = posts[1]
        output.append(f"featured_media ID: {post2.get('featured_media')}")
        output.append(f"Keys of post: {list(post2.keys())}")
        output.append(f"Keys of _embedded: {list(post2.get('_embedded', {}).keys())}")
        
        fmedia = post2.get("_embedded", {}).get("wp:featuredmedia")
        if fmedia:
            output.append("wp:featuredmedia content:")
            output.append(json.dumps(fmedia, indent=2))
        else:
            output.append("wp:featuredmedia is missing in _embedded!")
            output.append("_embedded contents:")
            output.append(json.dumps(post2.get("_embedded", {}), indent=2))
            
        with open("scratch/api_details.txt", "w", encoding="utf-8") as f:
            f.write("\n".join(output))
            
        print("Success! Details written to scratch/api_details.txt")
except Exception as e:
    print("Error:", e)
