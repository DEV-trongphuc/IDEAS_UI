import urllib.request
import json
import re

url = "https://ideas.edu.vn/wp-json/wp/v2/posts?_embed&per_page=6"
req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
try:
    with urllib.request.urlopen(req) as response:
        html = response.read()
        posts = json.loads(html)
        
        output = []
        for idx in [1, 3, 4, 5]: # Posts 2, 4, 5, 6
            post = posts[idx]
            title = post['title']['rendered']
            content = post['content']['rendered']
            
            # Find all img src in content
            img_srcs = re.findall(r'<img[^>]+src=["\']([^"\']+)["\']', content)
            
            output.append(f"Post {idx+1}: {title}")
            output.append(f"  Content length: {len(content)}")
            output.append(f"  Found Images: {img_srcs}")
            output.append("-" * 40)
            
        with open("scratch/post_contents.txt", "w", encoding="utf-8") as f:
            f.write("\n".join(output))
        print("Success! Details written to scratch/post_contents.txt")
except Exception as e:
    print("Error:", e)
