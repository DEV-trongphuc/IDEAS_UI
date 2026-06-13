import urllib.request
import re

url = 'https://ideas.edu.vn/'
req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
try:
    with urllib.request.urlopen(req) as response:
        html = response.read().decode('utf-8')
    
    print("=== SEARCHING FOR ACC-CARD IN LIVE HTML ===")
    matches = re.findall(r'<div class="acc-card"[^>]*>', html)
    print(f"Total acc-card found: {len(matches)}")
    for m in matches:
        print("  Tag:", m)
        
    print("\n=== SEARCHING FOR ACC-GRID IN LIVE HTML ===")
    grid_start = html.find('<div class="acc-grid">')
    if grid_start != -1:
        print(html[grid_start:grid_start+2000])
    else:
        print("acc-grid block not found!")
except Exception as e:
    print("Error:", e)
