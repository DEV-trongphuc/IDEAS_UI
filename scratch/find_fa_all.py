import sys
sys.stdout.reconfigure(encoding='utf-8')

import os
import re

folder = r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA"
for filename in os.listdir(folder):
    if filename.endswith(".html"):
        file_path = os.path.join(folder, filename)
        with open(file_path, "r", encoding="utf-8") as f:
            content = f.read()
        
        # Search for any reference to font-awesome or fontawesome or all.css or similar
        matches = re.findall(r'(<link[^>]+href="[^"]*(?:font-awesome|fontawesome)[^"]*"[^>]*>)', content)
        if matches:
            print(f"File: {filename}")
            for m in matches:
                print(f"  {m}")
