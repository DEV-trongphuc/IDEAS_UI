import urllib.request
import urllib.error
import sys

sys.stdout.reconfigure(encoding='utf-8')

urls = [
    "http://ideas.edu.vn/?nocache=1",
    "http://www.ideas.edu.vn/?nocache=1",
    "https://www.ideas.edu.vn/?nocache=1"
]

for url in urls:
    print(f"\nUrl: {url}")
    try:
        req = urllib.request.Request(url, method='HEAD', headers={'User-Agent': 'Mozilla/5.0'})
        with urllib.request.urlopen(req, timeout=5) as res:
            print(f"  Status: {res.status}")
            print(f"  URL: {res.geturl()}")
            print("  Headers:")
            for k, v in res.headers.items():
                if k.lower() in ['location', 'server', 'x-redirect-by', 'alt-svc']:
                    print(f"    {k}: {v}")
    except urllib.error.HTTPError as e:
        print(f"  HTTPError: {e.code}")
        print(f"  Headers: {e.headers}")
    except Exception as e:
        print(f"  Error: {e}")
