import os
from PIL import Image

full_path = r"e:\IDEAS_WP_UI\wp-content\uploads\2025\07\ideas_side2-600x600.webp"
if os.path.exists(full_path):
    with Image.open(full_path) as img:
        size_kb = os.path.getsize(full_path) / 1024
        print(f"ideas_side2-600x600.webp: {img.width}x{img.height}, {size_kb:.1f} KB")
else:
    print("ideas_side2-600x600.webp does not exist")
