import os

path = r"e:\IDEAS_WP_UI\wp-content\uploads\2025\07"
if os.path.exists(path):
    print("Files in", path, ":", os.listdir(path))
else:
    print("Directory", path, "does not exist")
