import os
import re

root_dir = r"e:\IDEAS_WP_UI"
keywords = ["watermark", "acc-sac", "swiss", "accreditation"]

for dirpath, _, filenames in os.walk(root_dir):
    # Skip standard folders we don't care about
    if ".git" in dirpath or "node_modules" in dirpath or "scratch" in dirpath:
        continue
    for filename in filenames:
        if not filename.endswith((".php", ".html", ".css", ".js")):
            continue
        file_path = os.path.join(dirpath, filename)
        try:
            with open(file_path, "r", encoding="utf-8") as f:
                content = f.read()
        except Exception:
            continue
            
        # Search for hover and scale/transform together in the style blocks or CSS files
        if "hover" in content.lower() and ("scale" in content.lower() or "transform" in content.lower()):
            # Find style blocks or check if it is a CSS file
            if filename.endswith(".css"):
                blocks = [content]
            else:
                blocks = re.findall(r'<style[^>]*>(.*?)</style>', content, re.DOTALL)
                
            for b in blocks:
                for line in b.splitlines():
                    if "hover" in line.lower() and ("scale" in line.lower() or "transform" in line.lower() or "translate" in line.lower()):
                        print(f"{filename}: {line.strip()}")
        
        # Let's search if any file contains watermark text in content
        if "content:" in content.lower() and "swiss" in content.lower():
            print(f"FOUND content and swiss in {filename}")
