import urllib.request

url = "https://ideas.edu.vn/wp-content/themes/LANDINGPAGE_MBA/common-assets/css/style.min.css"
print(f"Fetching {url}...")
try:
    req = urllib.request.Request(
        url, 
        headers={'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'}
    )
    with urllib.request.urlopen(req, timeout=10) as response:
        status = response.status
        content = response.read(100)
        print(f"Status: {status}")
        print(f"Content (first 100 bytes): {content}")
except Exception as e:
    print(f"Error fetching URL: {e}")
