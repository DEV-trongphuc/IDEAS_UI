import os

def patch_file(file_path, replacements):
    if not os.path.exists(file_path):
        print(f"Error: {file_path} does not exist!")
        return
        
    with open(file_path, "r", encoding="utf-8") as f:
        content = f.read()
        
    modified = False
    for target, replacement in replacements:
        count = content.count(target)
        if count > 0:
            content = content.replace(target, replacement)
            print(f"  Replaced '{target[:40]}...' -> {count} times.")
            modified = True
        else:
            print(f"  WARNING: target string not found: '{target[:60]}...'")
            
    if modified:
        with open(file_path, "w", encoding="utf-8") as f:
            f.write(content)
        print(f"Successfully saved {file_path}")
    else:
        print(f"No changes made in {file_path}")

# Define the exact target strings and their replacements for each file

# 1. page-thac-si-quan-tri-kinh-doanh-mba.php
target_mba = """<a href="https://ideas.edu.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si.html" target="_blank" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this.style.color='#ab0e00'" onmouseout="this.style.color='inherit'" title="Xem bài viết về Kiểm định SAC">Swiss Accreditation Council <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>"""
replacement_mba = """<a href="javascript:void(0)" class="accred-trigger" data-accred="sac" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this.style.color='#ab0e00'" onmouseout="this.style.color='inherit'" title="<?php echo $is_en ? 'View SAC Accreditation Details' : 'Xem chi tiết Kiểm định SAC'; ?>">Swiss Accreditation Council <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>"""

replacements_mba_file = [
    (target_mba, replacement_mba)
]

# 2. page-swiss-umef.php
# Target 1 (with newlines/indents)
target_umef_1 = """Swiss Accreditation Council <a
                            href="https://ideas.edu.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si.html"
                            target="_blank"
                            style="color: inherit; font-size: 0.75em; margin-left: 8px; display: inline-flex; align-items: center; transition: color 0.3s;"
                            onmouseover="this.style.color='#ab0e00'" onmouseout="this.style.color='inherit'"
                            title="Xem bài viết về Kiểm định SAC"><i class="fa-solid fa-up-right-from-square"></i></a>"""

replacement_umef_1 = """<a href="javascript:void(0)" class="accred-trigger" data-accred="sac" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this.style.color='#ab0e00'" onmouseout="this.style.color='inherit'" title="<?php echo $is_en ? 'View SAC Accreditation Details' : 'Xem chi tiết Kiểm định SAC'; ?>">Swiss Accreditation Council <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>"""

# Target 2 (right title link)
target_umef_2 = """<a href="https://ideas.edu.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si.html" target="_blank" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this.style.color='#ab0e00'" onmouseout="this.style.color='inherit'" title="Xem bài viết về Kiểm định SAC">Swiss Accreditation Council <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>"""
replacement_umef_2 = """<a href="javascript:void(0)" class="accred-trigger" data-accred="sac" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this.style.color='#ab0e00'" onmouseout="this.style.color='inherit'" title="<?php echo $is_en ? 'View SAC Accreditation Details' : 'Xem chi tiết Kiểm định SAC'; ?>">Swiss Accreditation Council <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>"""

replacements_umef_file = [
    (target_umef_1, replacement_umef_1),
    (target_umef_2, replacement_umef_2)
]

# 3. index.html
target_index_1 = """<a
                                href="https://ideas.edu.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si.html"
                                target="_blank"
                                style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;"
                                onmouseover="this.style.color='#ab0e00'" onmouseout="this.style.color='inherit'"
                                title="Xem bài viết về Kiểm định SAC">Swiss Accreditation Council <i
                                    class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>"""
replacement_index_1 = """<a
                                href="javascript:void(0)"
                                class="accred-trigger"
                                data-accred="sac"
                                style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;"
                                onmouseover="this.style.color='#ab0e00'" onmouseout="this.style.color='inherit'"
                                title="Xem chi tiết Kiểm định SAC">Swiss Accreditation Council <i
                                    class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>"""

target_index_2 = """<a href="https://ideas.edu.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si.html"
                                        target="_blank"
                                        style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;"
                                        onmouseover="this.style.color='#ab0e00'" onmouseout="this.style.color='inherit'"
                                        title="Xem bài viết về Kiểm định SAC">Swiss Accreditation Council <i
                                            class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>"""
replacement_index_2 = """<a href="javascript:void(0)"
                                        class="accred-trigger"
                                        data-accred="sac"
                                        style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;"
                                        onmouseover="this.style.color='#ab0e00'" onmouseout="this.style.color='inherit'"
                                        title="Xem chi tiết Kiểm định SAC">Swiss Accreditation Council <i
                                            class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>"""

replacements_index_file = [
    (target_index_1, replacement_index_1),
    (target_index_2, replacement_index_2)
]

# 4. en/index.html
target_en_index_1 = """<a
                                href="https://ideas.edu.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si.html"
                                target="_blank"
                                style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;"
                                onmouseover="this.style.color='#ab0e00'" onmouseout="this.style.color='inherit'"
                                title="View SAC Accreditation article">Swiss Accreditation Council <i
                                    class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>"""
replacement_en_index_1 = """<a
                                href="javascript:void(0)"
                                class="accred-trigger"
                                data-accred="sac"
                                style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;"
                                onmouseover="this.style.color='#ab0e00'" onmouseout="this.style.color='inherit'"
                                title="View SAC Accreditation Details">Swiss Accreditation Council <i
                                    class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>"""

target_en_index_2 = """<a href="https://ideas.edu.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si.html"
                                        target="_blank"
                                        style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;"
                                        onmouseover="this.style.color='#ab0e00'" onmouseout="this.style.color='inherit'"
                                        title="View SAC Accreditation article">Swiss Accreditation Council <i
                                            class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>"""
replacement_en_index_2 = """<a href="javascript:void(0)"
                                        class="accred-trigger"
                                        data-accred="sac"
                                        style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;"
                                        onmouseover="this.style.color='#ab0e00'" onmouseout="this.style.color='inherit'"
                                        title="View SAC Accreditation Details">Swiss Accreditation Council <i
                                            class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>"""

replacements_en_index_file = [
    (target_en_index_1, replacement_en_index_1),
    (target_en_index_2, replacement_en_index_2)
]

print("=== Patches ===")
patch_file(r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\page-thac-si-quan-tri-kinh-doanh-mba.php", replacements_mba_file)
patch_file(r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\page-swiss-umef.php", replacements_umef_file)
patch_file(r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html", replacements_index_file)
patch_file(r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\en\index.html", replacements_en_index_file)
