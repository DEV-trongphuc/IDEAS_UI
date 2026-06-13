import sys
sys.stdout.reconfigure(encoding='utf-8')

with open(r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\common-assets\css\style.css", "r", encoding="utf-8") as f:
    for i, line in enumerate(f):
        if "swiss" in line.lower():
            print(f"Line {i+1}: {line.strip()[:100]}")
