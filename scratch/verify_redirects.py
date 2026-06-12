import urllib.request
import sys

sys.stdout.reconfigure(encoding='utf-8')

urls = [
    "http://ideas.edu.vn/",
    "http://www.ideas.edu.vn/",
    "https://www.ideas.edu.vn/"
]

for url in urls:
    print(f"\nChecking: {url}")
    try:
        # We handle redirects manually to see where it goes
        class NoRedirectHandler(urllib.request.HTTPRedirectHandler):
            def redirect_request(self, req, fp, code, msg, headers, newurl):
                print(f"  -> Redirects with code {code} to: {newurl}")
                return None
                
        opener = urllib.request.build_opener(NoRedirectHandler)
        req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
        opener.open(req)
    except urllib.error.HTTPError as e:
        if e.code in [301, 302]:
            pass
        else:
            print(f"  HTTP Error: {e.code}")
    except Exception as e:
        print(f"  Error: {e}")
