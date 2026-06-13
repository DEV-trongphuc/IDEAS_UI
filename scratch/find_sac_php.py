import sys
sys.stdout.reconfigure(encoding='utf-8')

with open(r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\page-thac-si-quan-tri-kinh-doanh-mba.php", "r", encoding="utf-8") as f:
    for i, line in enumerate(f):
        if "accreditation" in line.lower() or "sac" in line.lower():
            if "class=" in line or "id=" in line or "<style>" in line or "style=" in line:
                print(f"Line {i+1}: {line.strip()[:100]}")
