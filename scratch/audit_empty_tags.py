import os
import re

files_to_check = [
    r"wp-content\themes\LANDINGPAGE_MBA\archive.php",
    r"wp-content\themes\LANDINGPAGE_MBA\category.php",
    r"wp-content\themes\LANDINGPAGE_MBA\search.php",
    r"wp-content\themes\LANDINGPAGE_MBA\page-dong-su-kien.php",
    r"wp-content\themes\LANDINGPAGE_MBA\single.php",
    r"wp-content\themes\LANDINGPAGE_MBA\footer.php",
    r"wp-content\themes\LANDINGPAGE_MBA\shared-header.php"
]

base_dir = r"e:\IDEAS_WP_UI"

empty_tag_regex = re.compile(r'<(strong|b|h1|h2|h3|h4|h5|h6)[^>]*>\s*</\1>', re.IGNORECASE)

for file_rel in files_to_check:
    filepath = os.path.join(base_dir, file_rel)
    if not os.path.exists(filepath):
        print(f"File not found: {file_rel}")
        continue
        
    print(f"\nAuditing {file_rel}:")
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
        
    # Find empty tags
    matches = empty_tag_regex.finditer(content)
    empty_count = 0
    for match in matches:
        empty_count += 1
        # Find line number
        line_no = content[:match.start()].count('\n') + 1
        print(f"  Line {line_no}: Empty tag found: '{match.group(0)}'")
        
    if empty_count == 0:
        print("  No empty tags found.")
        
    # Check for duplicate headings in static text
    headings = re.findall(r'<(h1|h2|h3|h4|h5|h6)[^>]*>(.*?)</\1>', content, re.IGNORECASE | re.DOTALL)
    heading_texts = {}
    for tag, text in headings:
        clean_text = re.sub(r'<[^>]*>', '', text).strip()
        if not clean_text:
            continue
        # Skip dynamic php echo blocks
        if '<?php' in clean_text:
            continue
        heading_texts[clean_text] = heading_texts.get(clean_text, 0) + 1
        
    duplicates = {text: count for text, count in heading_texts.items() if count > 1}
    if duplicates:
        print("  Duplicate headings found:")
        for text, count in duplicates.items():
            print(f"    - '{text}' occurs {count} times")
    else:
        print("  No duplicate static headings found.")
