import os
from PIL import Image

images = [
    r"wp-content\uploads\2026\05\Kien-tao.webp",
    r"wp-content\uploads\2026\05\Kien-tao-600x600.webp",
    r"wp-content\uploads\external-migrated\maxresdefault_8f603157.webp",
    r"wp-content\uploads\external-migrated\maxresdefault_4021a523.webp",
    r"wp-content\uploads\external-migrated\maxresdefault_3dd8bfa2.webp",
    r"wp-content\uploads\2024\10\Totnghiepumef-optimized.webp"
]

for img_path in images:
    full_path = os.path.join(r"e:\IDEAS_WP_UI", img_path)
    if os.path.exists(full_path):
        with Image.open(full_path) as img:
            size_kb = os.path.getsize(full_path) / 1024
            print(f"{img_path}: {img.width}x{img.height}, {size_kb:.1f} KB")
    else:
        print(f"{img_path} DOES NOT EXIST")
