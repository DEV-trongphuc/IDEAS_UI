import os
import re

files_to_update = [
    r"wp-content\new_public\LANDINGPAGE_MBA\bba.html",
    r"wp-content\new_public\LANDINGPAGE_MBA\emba.html",
    r"wp-content\new_public\LANDINGPAGE_MBA\fullbba.html",
    r"wp-content\new_public\LANDINGPAGE_MBA\mba.html",
    r"wp-content\new_public\LANDINGPAGE_MBA\mbainai.html",
    r"wp-content\new_public\LANDINGPAGE_MBA\mscai.html",
    r"wp-content\new_public\LANDINGPAGE_MBA\en\bba.html",
    r"wp-content\new_public\LANDINGPAGE_MBA\en\emba.html",
    r"wp-content\new_public\LANDINGPAGE_MBA\en\fullbba.html",
    r"wp-content\new_public\LANDINGPAGE_MBA\en\mba.html",
    r"wp-content\new_public\LANDINGPAGE_MBA\en\mbainai.html",
    r"wp-content\new_public\LANDINGPAGE_MBA\en\mscai.html"
]

base_dir = r"e:\IDEAS_WP_UI"

new_inner_html = """
                                    <div class="accred-stack-card pos-5">
                                        <img decoding="async"
                                            src="https://ideas.edu.vn/wp-content/uploads/2026/06/IACBE-Certificate-1.png"
                                            alt="IACBE Certificate" loading="lazy">
                                    </div>
                                    <div class="accred-stack-card pos-4">
                                        <img decoding="async"
                                            src="https://ideas.edu.vn/wp-content/uploads/2026/06/ACBSP.png"
                                            alt="ACBSP Certificate" loading="lazy">
                                    </div>
                                    <div class="accred-stack-card pos-3">
                                        <img decoding="async"
                                            src="https://ideas.edu.vn/wp-content/uploads/2026/02/5158dd02-aad4-411e-9917-2cf1e287dc1d.webp"
                                            alt="SAC Certificate" loading="lazy">
                                    </div>
                                    <div class="accred-stack-card pos-2">
                                        <img decoding="async"
                                            src="https://ideas.edu.vn/wp-content/uploads/2026/06/sgs.webp"
                                            alt="SGS Certificate" loading="lazy">
                                    </div>
                                    <div class="accred-stack-card pos-1">
                                        <img decoding="async"
                                            src="https://ideas.edu.vn/wp-content/uploads/2025/10/QSStarsCertificateSwissUMEF-1-1-1-1.webp"
                                            alt="QS Stars Certificate" loading="lazy">
                                    </div>
                                """

pattern = re.compile(
    r'(<div class="accred-stack"\s+id="accred-stack"[^>]*>)(.*?)(</div>\s*<div class="accred-stack-controls">)',
    re.DOTALL
)

updated_count = 0

for file_rel in files_to_update:
    filepath = os.path.join(base_dir, file_rel)
    if not os.path.exists(filepath):
        print(f"File not found: {file_rel}")
        continue
        
    try:
        with open(filepath, 'r', encoding='utf-8') as f:
            content = f.read()
            
        new_content, count = pattern.subn(rf'\g<1>{new_inner_html}\g<3>', content)
        if count > 0:
            with open(filepath, 'w', encoding='utf-8') as f:
                f.write(new_content)
            print(f"Successfully updated: {file_rel}")
            updated_count += 1
        else:
            print(f"Pattern not matched in: {file_rel}")
            
    except Exception as e:
        print(f"Error processing {file_rel}: {e}")

print(f"\nDone! Updated {updated_count} files.")
