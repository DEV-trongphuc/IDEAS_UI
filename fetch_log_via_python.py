import urllib.request

url = "https://ideas.edu.vn/check_git.php?nocache=1786346000"
try:
    print(f"Fetching: {url}")
    req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
    with urllib.request.urlopen(req) as response:
        html = response.read().decode('utf-8')
    
    with open("check_git_output.txt", "w", encoding="utf-8") as f:
        f.write(html)
    print("SUCCESS: Git state fetched and saved to check_git_output.txt")
    print(f"Total characters fetched: {len(html)}")
except Exception as e:
    print(f"ERROR: {e}")
