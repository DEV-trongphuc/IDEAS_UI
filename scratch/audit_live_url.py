import urllib.request
import re
import sys
from bs4 import BeautifulSoup

sys.stdout.reconfigure(encoding='utf-8')

url = "https://ideas.edu.vn/"
req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})

try:
    with urllib.request.urlopen(req) as response:
        html = response.read().decode('utf-8', errors='ignore')
        
    soup = BeautifulSoup(html, 'html.parser')
    
    # 1. Find empty strong, b, h1-6 tags
    print("--- EMPTY TAGS AUDIT ---")
    for tag_name in ['strong', 'b', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6']:
        tags = soup.find_all(tag_name)
        for t in tags:
            # check if text is empty or only whitespace
            if not t.get_text().strip():
                print(f"Empty {tag_name} tag found: {t}")
                
    # 2. Check duplicate headings
    print("\n--- DUPLICATE HEADINGS AUDIT ---")
    headings = {}
    for tag_name in ['h1', 'h2', 'h3', 'h4', 'h5', 'h6']:
        tags = soup.find_all(tag_name)
        for t in tags:
            text = t.get_text().strip()
            if text:
                headings[text] = headings.get(text, [])
                headings[text].append(t)
                
    duplicates = {text: instances for text, instances in headings.items() if len(instances) > 1}
    for text, instances in duplicates.items():
        print(f"Duplicate heading text: '{text}' ({len(instances)} occurrences)")
        for inst in instances:
            print(f"  Tag: <{inst.name}>")
            
except Exception as e:
    print("Error:", e)
