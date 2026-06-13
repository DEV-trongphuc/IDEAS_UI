import re

files_to_patch = {
    r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\page-thac-si-quan-tri-kinh-doanh-mba.php": [
        (
            # Link 1 (left header link)
            r'<a href="https://ideas\.edu\.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si\.html" target="_blank" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this\.style\.color=\'#ab0e00\'" onmouseout="this\.style\.color=\'inherit\'" title="Xem bài viết về Kiểm định SAC">Swiss Accreditation Council <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>',
            r'<a href="javascript:void(0)" class="accred-trigger" data-accred="sac" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this.style.color=\'#ab0e00\'" onmouseout="this.style.color=\'inherit\'" title="<?php echo $is_en ? \'View SAC Accreditation Details\' : \'Xem chi tiết Kiểm định SAC\'; ?>">Swiss Accreditation Council <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>'
        ),
        (
            # Link 2 (right title link)
            r'<a href="https://ideas\.edu\.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si\.html" target="_blank" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this\.style\.color=\'#ab0e00\'" onmouseout="this\.style\.color=\'inherit\'" title="Xem bài viết về Kiểm định SAC">Swiss Accreditation Council <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>',
            r'<a href="javascript:void(0)" class="accred-trigger" data-accred="sac" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this.style.color=\'#ab0e00\'" onmouseout="this.style.color=\'inherit\'" title="<?php echo $is_en ? \'View SAC Accreditation Details\' : \'Xem chi tiết Kiểm định SAC\'; ?>">Swiss Accreditation Council <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>'
        )
    ],
    r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\page-swiss-umef.php": [
        (
            # Link 1 (left header link where link is only around icon - we want to wrap the whole text + icon)
            r'Swiss Accreditation Council <a\s+href="https://ideas\.edu\.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si\.html"\s+target="_blank"\s+style="color: inherit; font-size: 0.75em; margin-left: 8px; display: inline-flex; align-items: center; transition: color 0.3s;"\s+onmouseover="this\.style\.color=\'#ab0e00\'" onmouseout="this\.style\.color=\'inherit\'"\s+title="Xem bài viết về Kiểm định SAC"><i class="fa-solid fa-up-right-from-square"></i></a>',
            r'<a href="javascript:void(0)" class="accred-trigger" data-accred="sac" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this.style.color=\'#ab0e00\'" onmouseout="this.style.color=\'inherit\'" title="<?php echo $is_en ? \'View SAC Accreditation Details\' : \'Xem chi tiết Kiểm định SAC\'; ?>">Swiss Accreditation Council <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>'
        ),
        (
            # Link 2 (right title link)
            r'<a href="https://ideas\.edu\.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si\.html" target="_blank" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this\.style\.color=\'#ab0e00\'" onmouseout="this\.style\.color=\'inherit\'" title="Xem bài viết về Kiểm định SAC">Swiss Accreditation Council <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>',
            r'<a href="javascript:void(0)" class="accred-trigger" data-accred="sac" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this.style.color=\'#ab0e00\'" onmouseout="this.style.color=\'inherit\'" title="<?php echo $is_en ? \'View SAC Accreditation Details\' : \'Xem chi tiết Kiểm định SAC\'; ?>">Swiss Accreditation Council <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>'
        )
    ],
    r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html": [
        (
            # Link 1 (left header link)
            r'<a\s+href="https://ideas\.edu\.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si\.html"\s+target="_blank"\s+style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;"\s+onmouseover="this\.style\.color=\'#ab0e00\'" onmouseout="this\.style\.color=\'inherit\'"\s+title="Xem bài viết về Kiểm định SAC">Swiss Accreditation Council <i\s+class="fa-solid fa-up-right-from-square"\s+style="font-size: 0\.75em;"></i></a>',
            r'<a href="javascript:void(0)" class="accred-trigger" data-accred="sac" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this.style.color=\'#ab0e00\'" onmouseout="this.style.color=\'inherit\'" title="Xem chi tiết Kiểm định SAC">Swiss Accreditation Council <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>'
        ),
        (
            # Link 2 (right title link)
            r'<a href="https://ideas\.edu\.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si\.html"\s+target="_blank"\s+style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;"\s+onmouseover="this\.style\.color=\'#ab0e00\'" onmouseout="this\.style\.color=\'inherit\'"\s+title="Xem bài viết về Kiểm định SAC">Swiss Accreditation Council <i\s+class="fa-solid fa-up-right-from-square"\s+style="font-size: 0\.75em;"></i></a>',
            r'<a href="javascript:void(0)" class="accred-trigger" data-accred="sac" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this.style.color=\'#ab0e00\'" onmouseout="this.style.color=\'inherit\'" title="Xem chi tiết Kiểm định SAC">Swiss Accreditation Council <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>'
        )
    ],
    r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\en\index.html": [
        (
            # Link 1 (left header link)
            r'<a\s+href="https://ideas\.edu\.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si\.html"\s+target="_blank"\s+style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;"\s+onmouseover="this\.style\.color=\'#ab0e00\'" onmouseout="this\.style\.color=\'inherit\'"\s+title="View SAC Accreditation article">Swiss Accreditation Council <i\s+class="fa-solid fa-up-right-from-square"\s+style="font-size: 0\.75em;"></i></a>',
            r'<a href="javascript:void(0)" class="accred-trigger" data-accred="sac" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this.style.color=\'#ab0e00\'" onmouseout="this.style.color=\'inherit\'" title="View SAC Accreditation Details">Swiss Accreditation Council <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>'
        ),
        (
            # Link 2 (right title link)
            r'<a href="https://ideas\.edu\.vn/tin-tuc-moi/kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si\.html"\s+target="_blank"\s+style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;"\s+onmouseover="this\.style\.color=\'#ab0e00\'" onmouseout="this\.style\.color=\'inherit\'"\s+title="View SAC Accreditation article">Swiss Accreditation Council <i\s+class="fa-solid fa-up-right-from-square"\s+style="font-size: 0\.75em;"></i></a>',
            r'<a href="javascript:void(0)" class="accred-trigger" data-accred="sac" style="color: inherit; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: color 0.3s;" onmouseover="this.style.color=\'#ab0e00\'" onmouseout="this.style.color=\'inherit\'" title="View SAC Accreditation Details">Swiss Accreditation Council <i class="fa-solid fa-up-right-from-square" style="font-size: 0.75em;"></i></a>'
        )
    ]
}

for file_path, replacements in files_to_patch.items():
    print(f"Processing {file_path}...")
    with open(file_path, "r", encoding="utf-8") as f:
        content = f.read()
    
    modified = False
    for pattern, replacement in replacements:
        # Match using regex ignoring extra whitespace/newlines if needed
        # We can also do a direct string replace if it's exact, or a regex replacement
        # Let's do regex with re.DOTALL and optional whitespaces
        pattern_compiled = re.compile(pattern)
        content, count = pattern_compiled.subn(replacement, content)
        if count > 0:
            print(f"  Replaced pattern ({count} occurrences)")
            modified = True
            
    if modified:
        with open(file_path, "w", encoding="utf-8") as f:
            f.write(content)
        print(f"  Saved {file_path}.")
    else:
        print(f"  No replacements made in {file_path}. Checking fallback...")
        # Fallback: let's print if there are any references to the URL left
        if "kiem-dinh-sac-bao-chung-chat-luong-giao-duc-thuy-si.html" in content:
            print("  WARNING: URL still exists in the content!")
