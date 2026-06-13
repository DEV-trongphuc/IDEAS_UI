import os
import re

style_path = r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\common-assets\css\style.css"
style_min_path = r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\common-assets\css\style.min.css"

new_rules = """

/* ==========================================================================
   MOBILE POPUP & ACCREDITATION VIDEO POLISH (WIDER MODALS & LESS PADDING)
   ========================================================================== */
@media (max-width: 768px) {
  /* Make accreditation modal wider with less white padding */
  .accred-modal {
    padding: 8px !important;
  }
  .accred-modal-container {
    width: 96% !important;
    max-width: 580px !important;
    border-radius: 20px !important;
    margin: 8px auto !important;
  }
  .accred-modal-info {
    padding: 24px 16px !important; /* Overrides inline style="padding: 50px;" */
  }
  .accred-modal-title {
    font-size: 1.5rem !important;
    margin-bottom: 16px !important;
    line-height: 1.3 !important;
  }
  .accred-modal-desc {
    font-size: 0.95rem !important;
    line-height: 1.65 !important;
  }

  /* Make accreditation video pane always show below text if video is present */
  .accred-modal-video-pane {
    width: 100% !important;
    height: 0;
    opacity: 0;
    border-radius: 0 0 20px 20px !important;
    background: #0f172a !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    transition: height 0.4s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.3s ease;
  }
  .accred-modal-container.video-expanded .accred-modal-video-pane {
    height: 500px !important;
    opacity: 1 !important;
    padding: 10px 0 !important;
  }
  .accred-modal-video-pane iframe {
    width: 267px !important;
    height: 476px !important;
    max-width: 95% !important;
    max-height: 95% !important;
    border-radius: 12px !important;
  }
  .accred-modal-close {
    top: 12px !important;
    right: 12px !important;
    width: 36px !important;
    height: 36px !important;
    font-size: 1rem !important;
  }
  .accred-modal-slide-trigger {
    display: none !important;
  }
}

@media (max-width: 640px) {
  /* Make registration modal wider with less white padding */
  .reg-modal {
    padding: 8px !important;
  }
  .reg-modal-container {
    width: 96% !important;
    max-width: 580px !important;
    border-radius: 20px !important;
    margin: 8px auto !important;
  }
  .modal-form-header {
    padding: 20px 16px 12px !important;
  }
  .modal-form {
    padding: 16px 16px 20px !important;
  }
  .reg-modal-close {
    top: 12px !important;
    right: 12px !important;
    width: 36px !important;
    height: 36px !important;
    font-size: 14px !important;
  }

  /* Make graduation ceremony modal wider */
  .vn-ceremony-modal {
    padding: 8px !important;
  }
  .vn-ceremony-container {
    width: 96% !important;
    max-width: 820px !important;
    border-radius: 20px !important;
    margin: 8px auto !important;
  }
}
"""

def minify_css(css):
    css = re.sub(r'/\*.*?\*/', '', css, flags=re.DOTALL)
    css = re.sub(r'\s*([\{\};:,])\s*', r'\1', css)
    css = re.sub(r'\s+', ' ', css)
    css = re.sub(r';\}', '}', css)
    return css.strip()

def main():
    if not os.path.exists(style_path):
        print(f"Error: {style_path} does not exist.")
        return

    # 1. Read style.css
    with open(style_path, "r", encoding="utf-8") as f:
        content = f.read()

    # Avoid duplicate append
    if "MOBILE POPUP & ACCREDITATION VIDEO POLISH" in content:
        print("Styles already applied to style.css. Re-minifying style.css into style.min.css...")
    else:
        # 2. Append rules to style.css
        content += new_rules
        with open(style_path, "w", encoding="utf-8") as f:
            f.write(content)
        print("Successfully appended mobile overrides to style.css.")

    # 3. Minify and write style.min.css
    minified = minify_css(content)
    with open(style_min_path, "w", encoding="utf-8") as f:
        f.write(minified)
    print("Successfully minified style.css to style.min.css.")
    print(f"Original size: {len(content)} bytes")
    print(f"Minified size: {len(minified)} bytes")

if __name__ == "__main__":
    main()
