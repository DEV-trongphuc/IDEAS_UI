import os

files_to_fix = [
    r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\search.php",
    r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\category.php",
    r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\archive.php"
]

target_str = 'aria-label="Tìm kiếm bài viết" aria-label="Tìm kiếm bài viết"'
replacement_str = 'aria-label="Tìm kiếm bài viết"'

for filepath in files_to_fix:
    if os.path.exists(filepath):
        try:
            with open(filepath, 'r', encoding='utf-8') as f:
                content = f.read()
                
            if target_str in content:
                content = content.replace(target_str, replacement_str)
                with open(filepath, 'w', encoding='utf-8') as f:
                    f.write(content)
                print(f"Successfully fixed duplicate aria-label in: {filepath}")
            else:
                print(f"Target string not found in: {filepath}")
        except Exception as e:
            print(f"Error processing {filepath}: {e}")
