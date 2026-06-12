import urllib.request
import json
import re

url = "https://ideas.edu.vn/wp-json/wp/v2/posts?_embed&per_page=6"
req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
try:
    with urllib.request.urlopen(req) as response:
        posts = json.loads(response.read())
        post2 = posts[1]
        content = post2['content']['rendered']
        
        output = []
        output.append(f"Content length: {len(content)}")
        output.append("First 500 chars of content:")
        output.append(content[:500])
        
        match = re.search(r'<img[^>]+src=["\']([^"\']+)["\']', content, re.IGNORECASE)
        if match:
            output.append(f"Regex Match: {match.group(0)}")
            output.append(f"Extracted Group 1: {match.group(1)}")
        else:
            output.append("NO REGEX MATCH!")
            
        with open("scratch/test_regex_output.txt", "w", encoding="utf-8") as f:
            f.write("\n".join(output))
        print("Success!")
except Exception as e:
    print("Error:", e)
