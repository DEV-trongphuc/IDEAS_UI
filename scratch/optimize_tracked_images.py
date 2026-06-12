import os
from PIL import Image

workspace = r"e:\IDEAS_WP_UI"

jobs = [
    # (path, target_width, target_height, quality)
    (r"wp-content\uploads\external-migrated\maxresdefault_8f603157.webp", 640, 360, 75),
    (r"wp-content\uploads\external-migrated\maxresdefault_4021a523.webp", 640, 360, 75),
    (r"wp-content\uploads\external-migrated\maxresdefault_3dd8bfa2.webp", 640, 360, 75),
    (r"wp-content\uploads\2025\09\cao-logo-1.png.webp", 200, 83, 80),
    (r"wp-content\uploads\2026\02\Buffet-AI-R.webp", 200, 105, 80),
    (r"wp-content\uploads\external-migrated\1280px-Moodle-logo_svg_005cb3ce.webp", 320, 82, 80),
    (r"wp-content\uploads\external-migrated\1280px-Cengage-logo_svg_8308995d.webp", 374, 84, 80),
    (r"wp-content\uploads\external-migrated\zalo-icon_3f4c0a22.webp", 64, 64, 85),
    (r"wp-content\uploads\2024\10\Totnghiepumef-optimized.webp", None, None, 70),
    (r"wp-content\uploads\2025\09\mscai-optimized.webp", None, None, 70),
    (r"wp-content\uploads\2025\03\buoihuongdan-optimized.webp", None, None, 70),
]

for rel_path, w, h, q in jobs:
    full_path = os.path.join(workspace, rel_path)
    if not os.path.exists(full_path):
        print(f"Skipping: {rel_path} does not exist.")
        continue

    orig_size = os.path.getsize(full_path)

    with Image.open(full_path) as img:
        # Check if we need to resize
        if w is not None and h is not None:
            # Resize
            img_resized = img.resize((w, h), Image.Resampling.LANCZOS)
            img_resized.save(full_path, "WEBP", quality=q)
        else:
            # Re-save with quality compression
            img.save(full_path, "WEBP", quality=q)

    new_size = os.path.getsize(full_path)
    saved = orig_size - new_size
    print(f"Optimized {rel_path}: {orig_size/1024:.1f} KB -> {new_size/1024:.1f} KB (saved {saved/1024:.1f} KB, -{saved/orig_size*100:.1f}%)")
