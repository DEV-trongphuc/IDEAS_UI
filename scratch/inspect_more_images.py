import os
from PIL import Image

images = [
    r"wp-content\uploads\2025\06\WORSHOP-29-6-SIZE-16_9-870x489.webp",
    r"wp-content\uploads\2025\09\mscai-optimized.webp",
    r"wp-content\uploads\2025\09\cao-logo-1.png.webp",
    r"wp-content\uploads\2026\02\Buffet-AI-R.webp",
    r"wp-content\uploads\2025\03\buoihuongdan-optimized.webp",
    r"wp-content\uploads\2025\10\Dual-DBA-optimized.webp",
    r"wp-content\uploads\2025\09\online-mba-1-optimized.webp",
    r"wp-content\uploads\2025\09\emba-optimized.webp",
    r"wp-content\uploads\2026\02\TOPUP-optimized.webp"
]

for img_path in images:
    full_path = os.path.join(r"e:\IDEAS_WP_UI", img_path)
    if os.path.exists(full_path):
        with Image.open(full_path) as img:
            size_kb = os.path.getsize(full_path) / 1024
            print(f"{img_path}: {img.width}x{img.height}, {size_kb:.1f} KB")
    else:
        # Let's search if there are similar files
        print(f"{img_path} DOES NOT EXIST")
