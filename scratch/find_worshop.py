import os

for root, dirs, files in os.walk(r"e:\IDEAS_WP_UI\wp-content\uploads"):
    for file in files:
        if "worshop" in file.lower():
            print(os.path.join(root, file))
