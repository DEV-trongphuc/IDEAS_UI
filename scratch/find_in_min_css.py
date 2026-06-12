filepath = r"e:\IDEAS_WP_UI\wp-content\themes\LANDINGPAGE_MBA\common-assets\css\style.min.css"
with open(filepath, 'r', encoding='utf-8') as f:
    content = f.read()

terms = [".accred-stack", ".accred-stack-card", "pos-1", "pos-2", "pos-3", "pos-4", "pos-5"]
for term in terms:
    print(f"Term '{term}': {'FOUND' if term in content else 'NOT FOUND'}")
