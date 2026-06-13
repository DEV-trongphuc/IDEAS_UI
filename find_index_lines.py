import os

filepath = r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html"
if not os.path.exists(filepath):
    print("Not found")
    exit()

with open(filepath, 'r', encoding='utf-8') as f:
    lines = f.readlines()

print("=== Style Block lines ===")
for idx, line in enumerate(lines):
    if '.acc-card {' in line:
        print(f"Line {idx+1}: {line.strip()}")
        # print next 15 lines
        for j in range(1, 16):
            print(f"  Line {idx+1+j}: {lines[idx+j].strip()}")

print("\n=== HTML tag lines ===")
for idx, line in enumerate(lines):
    if '<div class="acc-card">' in line or 'class="acc-card"' in line:
        print(f"Line {idx+1}: {line.strip()}")
        # print next 3 lines
        for j in range(1, 4):
            print(f"  Line {idx+1+j}: {lines[idx+j].strip()}")
