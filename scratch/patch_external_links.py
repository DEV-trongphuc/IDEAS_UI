import re

files_to_patch = [
    r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\page-thac-si-quan-tri-kinh-doanh-mba.php",
    r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\page-swiss-umef.php",
    r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html",
    r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\en\index.html"
]

def patch_file(file_path):
    with open(file_path, "r", encoding="utf-8") as f:
        content = f.read()
    
    original_len = len(content)
    
    # Replacement 1 & 2 & 4 (since they have the same structure for title/logo title in index.html, en/index.html, and php files)
    # Match the <a href="...kiem-dinh-sac...html" target="_blank" style="..." onmouseover="..." onmouseout="..." title="Xem bài viết về Kiểm định SAC">Swiss Accreditation Council <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>
    pattern_link = r'<a\s+href="https://ideas\.edu\.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si\.html"\s+target="_blank"\s+style="([^"]+)"\s+onmouseover="([^"]+)"\s+onmouseout="([^"]+)"\s+title="Xem bài viết về Kiểm định SAC">Swiss Accreditation Council\s+<i class="fa-solid fa-up-right-from-square"\s+style="font-size:\s*0\.75em;"></i></a>'
    replacement_link = r'<a href="javascript:void(0)" class="accred-trigger" data-accred="sac" style="\1" onmouseover="\2" onmouseout="\3" title="Xem chi tiết Kiểm định SAC">Swiss Accreditation Council <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>'
    
    content, count1 = re.subn(pattern_link, replacement_link, content)
    
    # Replacement 3 (in page-swiss-umef.php where only the icon link has href)
    pattern_icon_link = r'<a\s+href="https://ideas\.edu\.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si\.html"\s+target="_blank"\s+style="([^"]+)"\s+onmouseover="([^"]+)"\s+onmouseout="([^"]+)"\s+title="Xem bài viết về Kiểm định SAC"><i class="fa-solid fa-up-right-from-square"></i></a>'
    replacement_icon_link = r'<a href="javascript:void(0)" class="accred-trigger" data-accred="sac" style="\1" onmouseover="\2" onmouseout="\3" title="Xem chi tiết Kiểm định SAC"><i class="fa-solid fa-up-right-from-square"></i></a>'
    
    content, count2 = re.subn(pattern_icon_link, replacement_icon_link, content)
    
    # Alternate layout match for any other minor format differences (e.g. whitespace)
    # Let's do a generic match for the kiem-dinh-sac URL inside <a>
    # e.g. <a href="https://ideas.edu.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si.html" target="_blank"
    # we replace href="url" target="_blank" with href="javascript:void(0)" class="accred-trigger" data-accred="sac"
    # and update title to "Xem chi tiết Kiểm định SAC"
    pattern_generic = r'href="https://ideas\.edu\.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si\.html"\s+target="_blank"'
    replacement_generic = r'href="javascript:void(0)" class="accred-trigger" data-accred="sac"'
    
    content, count3 = re.subn(pattern_generic, replacement_generic, content)
    
    # Also update titles
    content, count4 = re.subn(r'title="Xem bài viết về Kiểm định SAC"', r'title="Xem chi tiết Kiểm định SAC"', content)
    
    if len(content) != original_len or count1 > 0 or count2 > 0 or count3 > 0:
        with open(file_path, "w", encoding="utf-8") as f:
            f.write(content)
        print(f"Patched {file_path}:")
        print(f"  - Pattern link matches: {count1}")
        print(f"  - Pattern icon link matches: {count2}")
        print(f"  - Generic URL matches: {count3}")
        print(f"  - Title updates: {count4}")
    else:
        print(f"No changes in {file_path}")

for f in files_to_patch:
    patch_file(f)
