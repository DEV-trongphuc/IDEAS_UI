import os

target_files = [
    r'wp-content/themes/LANDINGPAGE_MBA/archive.php',
    r'wp-content/themes/LANDINGPAGE_MBA/category.php'
]

target_1 = """                    <!-- Mobile-only Reel Banner under first content post (Featured Post on Page 1) -->
                    <div class="reel-explorer-banner mobile-only-banner" style="margin-top: 24px !important; margin-bottom: 24px !important;">"""

replacement_1 = """                    <!-- Reel Banner under first content post (Featured Post on Page 1) -->
                    <div class="reel-explorer-banner" style="margin-top: 24px !important; margin-bottom: 24px !important;">"""

target_2 = """                        <!-- Mobile-only Reel Banner under first content post of page 2+ -->
                        <div class="reel-explorer-banner mobile-only-banner" style="grid-column: 1 / -1; margin-top: 12px !important; margin-bottom: 24px !important;">"""

replacement_2 = """                        <!-- Reel Banner under first content post of page 2+ -->
                        <div class="reel-explorer-banner" style="grid-column: 1 / -1; margin-top: 12px !important; margin-bottom: 24px !important;">"""

target_3 = """                <div class="reel-explorer-banner desktop-only-banner">
                    <div class="reel-banner-backdrop"></div>
                    <div class="reel-banner-content">
                        <span class="reel-banner-tag"><i class="fa-solid fa-circle-play"></i> <?php echo $is_en ? 'NEW DISCOVERY' : 'MỚI KHÁM PHÁ'; ?></span>
                        <h3><?php echo $is_en ? 'Explore IDEAS Short Video Reels' : 'Khám phá video chia sẻ ngắn từ IDEAS'; ?></h3>
                        <p><?php echo $is_en ? 'Watch highlight videos about students, alumni, and academic experiences at IDEAS.' : 'Xem ngay các thước phim ngắn chia sẻ thực tế của học viên, cựu học viên và chuyên gia học thuật tại IDEAS.'; ?></p>
                        <a href="<?php echo home_url('/reel'); ?>" class="reel-banner-btn">
                            <span><?php echo $is_en ? 'Watch Reels Now' : 'Xem Reels ngay'; ?></span>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </div>
                </div>"""

replacement_3 = ''

for file_path in target_files:
    if not os.path.exists(file_path):
        print(f"File {file_path} not found.")
        continue
    with open(file_path, "r", encoding="utf-8") as f:
        content = f.read()
    
    if target_1 in content:
        content = content.replace(target_1, replacement_1)
        print(f"Replaced target_1 in {file_path}")
    else:
        print(f"target_1 not found in {file_path}")
        
    if target_2 in content:
        content = content.replace(target_2, replacement_2)
        print(f"Replaced target_2 in {file_path}")
    else:
        print(f"target_2 not found in {file_path}")
        
    if target_3 in content:
        content = content.replace(target_3, replacement_3)
        print(f"Replaced target_3 in {file_path}")
    else:
        print(f"target_3 not found in {file_path}")
        
    with open(file_path, "w", encoding="utf-8") as f:
        f.write(content)
print("Finished update_banners.py execution.")
