import os
import re

root_dir = r'e:/IDEAS_WP_UI/wp-content/new_public/LANDINGPAGE_MBA'
html_files = []
for root, dirs, files in os.walk(root_dir):
    for file in files:
        if file.endswith('.html'):
            html_files.append(os.path.join(root, file))

print(f'Found {len(html_files)} HTML files.')

target_link = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />'

for filepath in html_files:
    print(f'Processing {filepath}...')
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    # Check if font-awesome is already loaded
    has_fa = 'cdnjs.cloudflare.com/ajax/libs/font-awesome' in content
    
    if not has_fa:
        # We need to inject it before fonts preconnect
        font_preconnect = '<link rel="preconnect" href="https://fonts.googleapis.com"'
        if font_preconnect in content:
            new_content = content.replace(
                font_preconnect,
                f'{target_link}\n    {font_preconnect}'
            )
            with open(filepath, 'w', encoding='utf-8') as f:
                f.write(new_content)
            print(f'  -> Injected FontAwesome stylesheet.')
        else:
            # Fallback, inject before </head>
            if '</head>' in content:
                new_content = content.replace(
                    '</head>',
                    f'    {target_link}\n</head>'
                )
                with open(filepath, 'w', encoding='utf-8') as f:
                    f.write(new_content)
                print(f'  -> Injected FontAwesome stylesheet (fallback before </head>).')
            else:
                print(f'  -> WARNING: Could not find fonts preconnect or </head> in {filepath}!')
    else:
        # Check if it is loaded with media="print" or similar and clean it
        # E.g. in singlepost.html it has:
        # <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
        # Let's ensure it is synchronous and doesn't have media="print"
        fa_pattern = r'<link[^>]*cdnjs\.cloudflare\.com/ajax/libs/font-awesome[^>]*>'
        match = re.search(fa_pattern, content)
        if match:
            tag = match.group(0)
            if 'media=' in tag or 'onload=' in tag:
                print(f'  -> Found async FontAwesome tag: {tag}. Making it sync.')
                new_tag = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />'
                new_content = content.replace(tag, new_tag)
                with open(filepath, 'w', encoding='utf-8') as f:
                    f.write(new_content)
            else:
                print(f'  -> FontAwesome already present and synchronous.')
        else:
            print(f'  -> FontAwesome already present.')
