import urllib.request

url = "https://ideas.edu.vn/read_log.php?nocache=1786345970"
try:
    print(f"Fetching: {url}")
    req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
    with urllib.request.urlopen(req) as response:
        html = response.read().decode('utf-8')
    
    with open("fetched_cpanel_log.txt", "w", encoding="utf-8") as f:
        f.write(html)
    print("SUCCESS: Log fetched and saved to fetched_cpanel_log.txt")
    print(f"Total characters fetched: {len(html)}")
except Exception as e:
    print(f"ERROR: {e}")
