import re
import os

def minify(css_content):
    # Remove comments
    css = re.sub(r'/\*.*?\*/', '', css_content, flags=re.DOTALL)
    # Remove whitespaces around separators and operators
    css = re.sub(r'\s*([:;{},])\s*', r'\1', css)
    # Replace multiple spaces/newlines with a single space
    css = re.sub(r'\s+', ' ', css)
    return css.strip()

if __name__ == '__main__':
    base_dir = r"E:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\common-assets\css"
    src_file = os.path.join(base_dir, "style.css")
    dest_file = os.path.join(base_dir, "style.min.css")
    
    print(f"Reading source: {src_file}")
    with open(src_file, "r", encoding="utf-8") as f:
        content = f.read()
        
    print("Minifying...")
    minified = minify(content)
    
    print(f"Writing to: {dest_file}")
    with open(dest_file, "w", encoding="utf-8") as f:
        f.write(minified)
        
    print("Done! Minification successful.")
