import os
from PIL import Image

full_path = r"e:\IDEAS_WP_UI\wp-content\uploads\2025\07\ideas_side2.webp"
if os.path.exists(full_path):
    orig_size = os.path.getsize(full_path)
    with Image.open(full_path) as img:
        img_resized = img.resize((500, 500), Image.Resampling.LANCZOS)
        img_resized.save(full_path, "WEBP", quality=70)
    new_size = os.path.getsize(full_path)
    print(f"Optimized: {orig_size/1024:.1f} KB -> {new_size/1024:.1f} KB")
else:
    print("Does not exist")
