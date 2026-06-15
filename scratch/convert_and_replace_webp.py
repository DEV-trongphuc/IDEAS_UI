import os
import re
from PIL import Image

workspace = r"e:\IDEAS_WP_UI"

IMAGE_DIRS = [
    r"wp-content/themes/LANDINGPAGE_MBA",
    r"wp-content/new_public/LANDINGPAGE_MBA",
    r"wp-content/uploads",
    r"assets",
    r"homepage-assets",
    r"program"
]

CODE_DIRS = [
    r"wp-content/themes/LANDINGPAGE_MBA",
    r"wp-content/new_public/LANDINGPAGE_MBA",
    r"assets",
    r"homepage-assets",
    r"program"
]

IMAGE_EXTENSIONS = ('.png', '.jpg', '.jpeg')
CODE_EXTENSIONS = ('.html', '.php', '.css', '.js', '.json', '.htaccess', '.txt')

def find_images():
    images = []
    for rel_dir in IMAGE_DIRS:
        full_dir = os.path.join(workspace, rel_dir)
        if not os.path.exists(full_dir):
            continue
        for root, dirs, files in os.walk(full_dir):
            for file in files:
                if file.lower().endswith(IMAGE_EXTENSIONS):
                    full_path = os.path.join(root, file)
                    images.append(full_path)
    return images

def convert_images(images):
    converted = []
    print(f"Found {len(images)} images to process...")
    for idx, img_path in enumerate(images):
        dir_name = os.path.dirname(img_path)
        base_name = os.path.basename(img_path)
        name_no_ext, ext = os.path.splitext(base_name)
        webp_path = os.path.join(dir_name, f"{name_no_ext}.webp")
        
        rel_path = os.path.relpath(img_path, workspace)
        
        # Check if webp already exists
        if os.path.exists(webp_path):
            # Already exists, count as converted/processed
            converted.append((img_path, webp_path))
            continue
            
        try:
            with Image.open(img_path) as img:
                # WebP doesn't support some modes, convert to RGBA/RGB
                if img.mode in ('RGBA', 'LA') or (img.mode == 'P' and 'transparency' in img.info):
                    img_conv = img.convert('RGBA')
                else:
                    img_conv = img.convert('RGB')
                img_conv.save(webp_path, "WEBP", quality=85)
            print(f"[{idx+1}/{len(images)}] Converted: {rel_path} -> {os.path.basename(webp_path)}")
            converted.append((img_path, webp_path))
        except Exception as e:
            print(f"[{idx+1}/{len(images)}] Failed to convert {rel_path}: {e}")
            
    return converted

def find_code_files():
    code_files = []
    # 1. Scan in directories
    for rel_dir in CODE_DIRS:
        full_dir = os.path.join(workspace, rel_dir)
        if not os.path.exists(full_dir):
            continue
        for root, dirs, files in os.walk(full_dir):
            for file in files:
                if file.lower().endswith(CODE_EXTENSIONS):
                    code_files.append(os.path.join(root, file))
                    
    # 2. Scan root level files
    for file in os.listdir(workspace):
        if os.path.isfile(os.path.join(workspace, file)) and file.lower().endswith(CODE_EXTENSIONS):
            # Exclude core/system files from root if needed, but standard files like functions.php are ok
            if file not in ['wp-config.php']:  # keep safe
                code_files.append(os.path.join(workspace, file))
                
    return list(set(code_files))

def replace_references_in_file(file_path, base_names):
    try:
        with open(file_path, "r", encoding="utf-8", errors="ignore") as f:
            content = f.read()
            
        new_content = content
        modified = False
        
        # We search for any path-like structures ending with .png, .jpg, .jpeg
        # Pattern matches: filename.ext
        # We will use regex to find all matches, then check if the filename is in our base_names set.
        pattern = re.compile(r'([\w\-\./]+)\.(png|jpg|jpeg)', re.IGNORECASE)
        
        def repl(match):
            nonlocal modified
            full_match = match.group(0)
            path_part = match.group(1)
            ext_part = match.group(2)
            
            # Get just the filename
            filename_with_ext = f"{os.path.basename(path_part)}.{ext_part}"
            
            if filename_with_ext.lower() in base_names:
                modified = True
                return f"{path_part}.webp"
            return full_match
            
        new_content = pattern.sub(repl, content)
        
        if modified:
            with open(file_path, "w", encoding="utf-8") as f:
                f.write(new_content)
            print(f"Updated references in: {os.path.relpath(file_path, workspace)}")
            return True
    except Exception as e:
        print(f"Error scanning/updating {os.path.relpath(file_path, workspace)}: {e}")
    return False

def replace_references(code_files, converted_images):
    # Get lowercase basenames of all converted files
    base_names = set(os.path.basename(orig).lower() for orig, webp in converted_images)
    print(f"Scanning {len(code_files)} code files to replace references...")
    updated_count = 0
    for file_path in code_files:
        if replace_references_in_file(file_path, base_names):
            updated_count += 1
    print(f"Finished. Updated {updated_count} files.")

def delete_originals(converted_images):
    print("Deleting original PNG/JPG files where WebP exists...")
    deleted_count = 0
    failed_count = 0
    for orig, webp in converted_images:
        if os.path.exists(webp) and os.path.getsize(webp) > 0:
            try:
                os.remove(orig)
                deleted_count += 1
            except Exception as e:
                print(f"Failed to delete {os.path.relpath(orig, workspace)}: {e}")
                failed_count += 1
        else:
            print(f"Skipping deletion: WebP does not exist or is empty for {os.path.relpath(orig, workspace)}")
            failed_count += 1
    print(f"Deleted {deleted_count} files. Failed/Skipped: {failed_count}")

def main():
    images = find_images()
    converted = convert_images(images)
    
    code_files = find_code_files()
    replace_references(code_files, converted)
    
    delete_originals(converted)

if __name__ == "__main__":
    main()
