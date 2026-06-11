import sys

with open("e:/IDEAS_WP_UI/wp-content/themes/LANDINGPAGE_MBA/page-swiss-umef.php", "r", encoding="utf-8") as f:
    lines = f.readlines()

output = []
for i, line in enumerate(lines):
    if any(keyword in line.lower() for keyword in ["bba", "mba", "dba", "msc", "executive"]):
        if "href" in line or "h3" in line or "h4" in line or "title" in line or "card" in line:
            output.append(f"Line {i+1}: {line.strip()}")

with open("e:/IDEAS_WP_UI/scratch_programs.txt", "w", encoding="utf-8") as f_out:
    f_out.write("\n".join(output))

print("Done")
