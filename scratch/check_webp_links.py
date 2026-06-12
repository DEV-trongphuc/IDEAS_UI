import urllib.request
import sys

# Ensure UTF-8 printing
sys.stdout.reconfigure(encoding='utf-8')

urls = [
    "https://ideas.edu.vn/wp-content/uploads/2026/06/School-3.png",
    "https://ideas.edu.vn/wp-content/uploads/2026/05/swiss-1.webp",
    "https://ideas.edu.vn/wp-content/uploads/2026/06/2026-06-09-Lien-thong-1.png",
    "https://ideas.edu.vn/wp-content/uploads/2026/05/MBA-va-EMA-3.webp",
    "https://ideas.edu.vn/wp-content/uploads/2026/05/AI-thac-si.webp",
    "https://ideas.edu.vn/wp-content/uploads/2026/05/banner-swiss.webp"
]

for url in urls:
    try:
        req = urllib.request.Request(url, method='HEAD', headers={'User-Agent': 'Mozilla/5.0'})
        with urllib.request.urlopen(req) as res:
            print(f"{url} -> SUCCESS ({res.status})")
    except Exception as e:
        print(f"{url} -> FAILED ({e})")
