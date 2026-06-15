import os

def bump_versions():
    base_dir = r"E:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA"
    old_version = "v=1781338800"
    new_version = "v=1781341629"
    
    count = 0
    for root, dirs, files in os.walk(base_dir):
        for file in files:
            if file.endswith(".html"):
                path = os.path.join(root, file)
                with open(path, "r", encoding="utf-8") as f:
                    content = f.read()
                
                if old_version in content:
                    new_content = content.replace(old_version, new_version)
                    with open(path, "w", encoding="utf-8") as f:
                        f.write(new_content)
                    print(f"Updated: {os.path.relpath(path, base_dir)}")
                    count += 1
                    
    print(f"Finished updating {count} files.")

if __name__ == '__main__':
    bump_versions()
