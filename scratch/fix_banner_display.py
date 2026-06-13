import os

target_files = [
    r'wp-content/themes/LANDINGPAGE_MBA/archive.php',
    r'wp-content/themes/LANDINGPAGE_MBA/category.php'
]

target_str = """                .reel-explorer-banner {
                    position: relative !important;"""

replacement_str = """                .reel-explorer-banner {
                    display: flex !important;
                    position: relative !important;"""

for file_path in target_files:
    if not os.path.exists(file_path):
        print(f"File {file_path} not found.")
        continue
    with open(file_path, "r", encoding="utf-8") as f:
        content = f.read()
    
    if target_str in content:
        content = content.replace(target_str, replacement_str)
        print(f"Added display: flex to {file_path}")
    else:
        print(f"Target pattern not found in {file_path}")
        
    with open(file_path, "w", encoding="utf-8") as f:
        f.write(content)
print("Finished display fix script.")
