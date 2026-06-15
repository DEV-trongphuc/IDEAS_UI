import re

sql_path = r"e:\IDEAS_WP_UI\scratch\db.sql"

with open(sql_path, "r", encoding="utf-8-sig") as f:
    content = f.read()

# Find all ALTER TABLE `wpwo_...` ADD ... statements
alter_pat = re.compile(r"ALTER TABLE\s+`wpwo_[^`]+`[^;]+;", re.IGNORECASE)
alters = alter_pat.findall(content)

print(f"Found {len(alters)} ALTER TABLE statements for wpwo_ tables:")
for a in alters:
    print(a.strip())
    print("-" * 40)
