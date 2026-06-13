import sys
sys.stdout.reconfigure(encoding='utf-8')

with open(r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\mscai.html", "r", encoding="utf-8") as f:
    for i, line in enumerate(f):
        if "acc-sac" in line:
            print(f"Line {i+1}: {line.strip()[:100]}")
