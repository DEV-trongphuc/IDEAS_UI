import os

files_to_update = [
    r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA\index.html",
    r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\page-swiss-umef.php",
    r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\page-thac-si-quan-tri-kinh-doanh-mba.php"
]

for filepath in files_to_update:
    if not os.path.exists(filepath):
        print(f"File not found: {filepath}")
        continue
        
    try:
        with open(filepath, 'r', encoding='utf-8') as f:
            content = f.read()
            
        modified = False
        
        # 1. Replace CSS selectors
        if '.acc-sac-logo-text h4' in content:
            content = content.replace('.acc-sac-logo-text h4', '.acc-sac-logo-text .acc-sac-logo-title')
            modified = True
            
        if '.acc-section .acc-sac-logo-text h4' in content:
            content = content.replace('.acc-section .acc-sac-logo-text h4', '.acc-section .acc-sac-logo-text .acc-sac-logo-title')
            modified = True
            
        # 2. Replace HTML tag <h4>...</h4> with <div class="acc-sac-logo-title">...</div>
        # Find <h4>...Swiss Accreditation Council...</h4>
        # We can use a regex replacement to match it safely
        import re
        html_regex = re.compile(r'<h4>\s*(<a[^>]+title="Xem bài viết về Kiểm định SAC">Swiss Accreditation Council\s*<i[^>]+></i></a>)\s*</h4>', re.IGNORECASE)
        
        new_content, count = html_regex.subn(r'<div class="acc-sac-logo-title">\1</div>', content)
        if count > 0:
            content = new_content
            modified = True
            print(f"  Replaced {count} HTML heading matches in {os.path.basename(filepath)}")
            
        if modified:
            with open(filepath, 'w', encoding='utf-8') as f:
                f.write(content)
            print(f"Successfully updated duplicate heading in: {filepath}")
        else:
            print(f"No changes made in: {filepath}")
            
    except Exception as e:
        print(f"Error processing {filepath}: {e}")
