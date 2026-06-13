import os

public_dir = r"e:/IDEAS_WP_UI/wp-content/new_public/LANDINGPAGE_MBA"

def patch_file(filepath):
    print(f"Patching: {filepath}")
    is_english = "en" in filepath.replace("\\", "/").split("/")
    
    with open(filepath, "r", encoding="utf-8") as f:
        content = f.read()
        
    original_len = len(content)

    # 1. Update .reel-overlay background styles
    # Replace default background
    content = content.replace(
        "background: rgba(15, 23, 42, 0.25) !important;",
        "background: rgba(15, 23, 42, 0.45) !important;"
    )
    # Replace hover background
    content = content.replace(
        "background: rgba(15, 23, 42, 0.4) !important;",
        "background: rgba(15, 23, 42, 0.6) !important;"
    )

    # 2. Add Reel to dropdown menus if not present
    if "href=\"/reel\"" not in content and "href=\"/reel?lang=en\"" not in content:
        if is_english:
            # Desktop header News dropdown
            desktop_news_target = """                        <a href="/en/news" class="dropdown-item-simple">
                            <i class="fa-solid fa-newspaper"></i> <span>News</span>
                        </a>"""
            desktop_news_replacement = """                        <a href="/en/news" class="dropdown-item-simple">
                            <i class="fa-solid fa-newspaper"></i> <span>News</span>
                        </a>
                        <a href="/reel?lang=en" class="dropdown-item-simple">
                            <i class="fa-solid fa-circle-play"></i> <span>Reel</span>
                        </a>"""
            
            # Mobile menu News dropdown
            mobile_news_target = """                <a href="/en/news" class="mobile-dropdown-item-simple">
                    <i class="fa-solid fa-newspaper"></i> <span>News</span>
                </a>"""
            mobile_news_replacement = """                <a href="/en/news" class="mobile-dropdown-item-simple">
                    <i class="fa-solid fa-newspaper"></i> <span>News</span>
                </a>
                <a href="/reel?lang=en" class="mobile-dropdown-item-simple">
                    <i class="fa-solid fa-circle-play"></i> <span>Reel</span>
                </a>"""
        else:
            # Desktop header Bản tin dropdown
            desktop_news_target = """                        <a href="/bai-viet" class="dropdown-item-simple">
                            <i class="fa-solid fa-newspaper"></i> <span>Bài viết</span>
                        </a>"""
            desktop_news_replacement = """                        <a href="/bai-viet" class="dropdown-item-simple">
                            <i class="fa-solid fa-newspaper"></i> <span>Bài viết</span>
                        </a>
                        <a href="/reel" class="dropdown-item-simple">
                            <i class="fa-solid fa-circle-play"></i> <span>Reel</span>
                        </a>"""
            
            # Mobile menu Bản tin dropdown
            mobile_news_target = """                <a href="/bai-viet" class="mobile-dropdown-item-simple">
                    <i class="fa-solid fa-newspaper"></i> <span>Bài viết</span>
                </a>"""
            mobile_news_replacement = """                <a href="/bai-viet" class="mobile-dropdown-item-simple">
                    <i class="fa-solid fa-newspaper"></i> <span>Bài viết</span>
                </a>
                <a href="/reel" class="mobile-dropdown-item-simple">
                    <i class="fa-solid fa-circle-play"></i> <span>Reel</span>
                </a>"""

        content = content.replace(desktop_news_target, desktop_news_replacement)
        content = content.replace(mobile_news_target, mobile_news_replacement)

    # 3. Rename any "IDEAS Reel" or "IDEAS reel" in the header to "Reel" (just in case they have it)
    content = content.replace("IDEAS Reel", "Reel")
    content = content.replace("IDEAS reel", "Reel")

    if len(content) != original_len or "rgba(15, 23, 42, 0.45)" in content:
        with open(filepath, "w", encoding="utf-8") as f:
            f.write(content)
        print(f"Saved changes to {filepath}")
    else:
        print(f"No changes made to {filepath}")

def main():
    for root, dirs, files in os.walk(public_dir):
        for file in files:
            if file.endswith(".html"):
                patch_file(os.path.join(root, file))

if __name__ == "__main__":
    main()
