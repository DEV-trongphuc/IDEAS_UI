import re
import sys

sys.stdout.reconfigure(encoding='utf-8')

vn_pattern = re.compile(r"[àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]", re.IGNORECASE)

with open(r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\page-so-do-to-chuc.php", "r", encoding="utf-8") as f:
    for i, line in enumerate(f, 1):
        if vn_pattern.search(line):
            print(f"Line {i}: {line.strip()}")
