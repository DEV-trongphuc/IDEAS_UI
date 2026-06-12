import urllib.request
import re

url = "https://ideas.edu.vn/bai-viet"
req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
try:
    with urllib.request.urlopen(req) as response:
        html = response.read().decode('utf-8', errors='ignore')
        
        output = []
        output.append(f"Fetched blog page: {len(html)} characters")
        
        idx = html.find("100% Online")
        if idx != -1:
            output.append("Found '100% Online' in HTML. Surrounding 1000 chars:")
            output.append(html[idx-500:idx+500])
        else:
            output.append("Did not find '100% Online'")
            
        idx2 = html.find("Lien-thong-1")
        if idx2 != -1:
            output.append("Found 'Lien-thong-1' in HTML. Surrounding 500 chars:")
            output.append(html[idx2-250:idx2+250])
            
        with open("scratch/live_blog_details.txt", "w", encoding="utf-8") as f:
            f.write("\n".join(output))
            
        print("Success! Details written to scratch/live_blog_details.txt")
except Exception as e:
    print("Error:", e)
