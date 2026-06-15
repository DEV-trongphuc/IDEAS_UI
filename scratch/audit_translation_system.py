import os
import re
import sys

# Reconfigure output to utf-8 for Windows consoles
sys.stdout.reconfigure(encoding='utf-8')

# Directory paths
static_en_dir = r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\en"
theme_dir = r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA"

# Vietnamese diacritics regex pattern (case-insensitive)
vn_pattern = re.compile(r"[àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]", re.IGNORECASE)

def scan_static_html():
    print("=== Scanning Static English HTML Files ===")
    results = {}
    if not os.path.exists(static_en_dir):
        print(f"Error: Static EN directory not found at {static_en_dir}")
        return results

    for root, dirs, files in os.walk(static_en_dir):
        for file in files:
            if file.endswith(".html"):
                path = os.path.join(root, file)
                try:
                    with open(path, "r", encoding="utf-8") as f:
                        lines = f.readlines()
                    
                    file_matches = []
                    for i, line in enumerate(lines, 1):
                        matches = vn_pattern.findall(line)
                        if matches:
                            clean_line = line.strip()
                            # Ignore common false positives or minified scripts if they don't contain real Vietnamese text
                            if len(clean_line) < 300: # avoid listing huge minified lines
                                file_matches.append((i, clean_line))
                    if file_matches:
                        results[file] = file_matches
                except Exception as e:
                    print(f"Error reading {file}: {e}")
    
    for file, matches in results.items():
        print(f"\n[File] {file} - Found {len(matches)} lines with Vietnamese characters:")
        for line_num, text in matches[:15]: # Show first 15 matches
            print(f"  Line {line_num}: {text[:120]}...")
        if len(matches) > 15:
            print(f"  ... and {len(matches) - 15} more lines.")
    
    if not results:
        print("✓ No Vietnamese characters found in static English HTML files!")
    return results

def scan_theme_php():
    print("\n=== Scanning Dynamic Theme PHP Templates ===")
    results = []
    if not os.path.exists(theme_dir):
        print(f"Error: Theme directory not found at {theme_dir}")
        return results

    for root, dirs, files in os.walk(theme_dir):
        for file in files:
            if file.startswith("page-") and file.endswith(".php"):
                path = os.path.join(root, file)
                try:
                    with open(path, "r", encoding="utf-8") as f:
                        content = f.read()
                    
                    # Check if template has language check
                    has_lang_check = "$is_en" in content or "lang" in content
                    
                    lines = content.splitlines()
                    unprotected_vn_lines = []
                    for i, line in enumerate(lines, 1):
                        if vn_pattern.search(line):
                            # Heuristic: if a line contains VN characters but doesn't mention '$is_en' or 'lang',
                            # it might be hardcoded VN text that does not translate.
                            if "$is_en" not in line and "lang" not in line:
                                unprotected_vn_lines.append((i, line.strip()))
                    
                    results.append({
                        "file": file,
                        "has_lang_check": has_lang_check,
                        "unprotected_lines": unprotected_vn_lines
                    })
                except Exception as e:
                    print(f"Error reading {file}: {e}")
                    
    for res in results:
        print(f"\n[Template] {res['file']}")
        print(f"  Has $is_en check: {'Yes' if res['has_lang_check'] else 'No'}")
        unprotected = res['unprotected_lines']
        if unprotected:
            print(f"  Found {len(unprotected)} lines with Vietnamese text that don't have $is_en check on that line:")
            for line_num, text in unprotected[:10]:
                print(f"    Line {line_num}: {text[:100]}")
            if len(unprotected) > 10:
                print(f"    ... and {len(unprotected) - 10} more lines.")
        else:
            print("  ✓ No hardcoded Vietnamese text without translation checks found!")

if __name__ == "__main__":
    scan_static_html()
    scan_theme_php()
