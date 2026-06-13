import os
import re

dir_path = r"e:\IDEAS_WP_UI\wp-content\new_public\LANDINGPAGE_MBA"

def patch_file(file_path):
    print(f"Processing: {file_path}")
    is_en = "en" in file_path.replace("\\", "/").split("/")
    
    with open(file_path, "r", encoding="utf-8") as f:
        content = f.read()
    
    # Let's locate the accred-modal block
    modal_start_idx = content.find('<div class="accred-modal" id="accred-modal"')
    if modal_start_idx == -1:
        print("  Accred modal not found.")
        return
    
    # We find the accred-modal-container start inside the modal
    container_start_idx = content.find('<div class="accred-modal-container"', modal_start_idx)
    if container_start_idx == -1:
        print("  Accred modal container not found.")
        return
        
    # We find the end of the container. 
    # Let's find the closing tags. The accred-modal has 2 main top-level divs inside:
    # 1. accred-modal-overlay
    # 2. accred-modal-container
    # So the accred-modal itself closes at the very end of the accred-modal block.
    # The accred-modal closes with a </div>.
    # The accred-modal-container closes with a </div> right before the accred-modal closing </div>.
    # Let's verify by counting nesting or matching from the overlay.
    # Let's count div tags starting from container_start_idx.
    idx = container_start_idx
    open_divs = 0
    container_end_idx = -1
    
    while idx < len(content):
        # Find next <div or </div
        next_open = content.find("<div", idx)
        next_close = content.find("</div>", idx)
        
        # If no more divs, break
        if next_open == -1 and next_close == -1:
            break
            
        if next_open != -1 and (next_close == -1 or next_open < next_close):
            open_divs += 1
            idx = next_open + 4
        else:
            open_divs -= 1
            if open_divs == 0:
                container_end_idx = next_close + 6
                break
            idx = next_close + 6
            
    if container_end_idx == -1:
        print("  Failed to find container end.")
        return
        
    container_block = content[container_start_idx:container_end_idx]
    
    # Check if already updated (if slide-trigger is in the container block)
    if "accred-slide-trigger" in container_block:
        print("  Already patched.")
        return
        
    # Extract the info blocks
    label_match = re.search(r'(<div class="accred-modal-label">.*?</div>)', container_block)
    title_match = re.search(r'(<h3 class="accred-modal-title"[^>]*>.*?</h3>)', container_block)
    desc_match = re.search(r'(<div class="accred-modal-desc"[^>]*>.*?</div>)', container_block)
    
    if not (label_match and title_match and desc_match):
        print("  Could not extract label, title, or desc.")
        return
        
    label_element = label_match.group(1)
    title_element = title_match.group(1)
    desc_element = desc_match.group(1)
    
    btn_label = "Watch Video" if is_en else "Xem video"
    close_label = "Close modal" if is_en else "Đóng modal"
    
    new_container = f'''<div class="accred-modal-container" data-lenis-prevent>
            <button class="accred-modal-slide-trigger" id="accred-slide-trigger" aria-label="{btn_label}">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
            <button class="accred-modal-close" id="accred-modal-close" aria-label="{close_label}">✕</button>
            <div class="accred-modal-content">
                <div class="accred-modal-body">
                    <div class="accred-modal-info" style="padding: 50px;">
                        {label_element}
                        {title_element}
                        {desc_element}
                    </div>
                </div>
            </div>
            <div class="accred-modal-video-pane" id="accred-video-pane">
                <div class="accred-video-loading">
                    <i class="fa-solid fa-spinner fa-spin"></i>
                </div>
                <iframe id="accred-video-iframe" src="" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
            </div>
        </div>'''
        
    new_content = content[:container_start_idx] + new_container + content[container_end_idx:]
    
    with open(file_path, "w", encoding="utf-8") as f:
        f.write(new_content)
        
    print("  Successfully patched!")

# Walk directory and apply patch to all .html files
for root, dirs, files in os.walk(dir_path):
    for file in files:
        if file.endswith(".html"):
            file_path = os.path.join(root, file)
            try:
                patch_file(file_path)
            except Exception as e:
                print(f"  Error processing {file_path}: {e}")
