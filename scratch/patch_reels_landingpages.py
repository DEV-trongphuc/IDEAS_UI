import os
import re

root_dir = r'e:/IDEAS_WP_UI/wp-content/new_public/LANDINGPAGE_MBA'
html_files = []
for root, dirs, files in os.walk(root_dir):
    for file in files:
        if file.endswith('.html') and file != 'singlepost.html':
            html_files.append(os.path.join(root, file))

print(f'Found {len(html_files)} HTML landing page files to patch.')

injection_block = """<!-- Facebook Reel Modal & Trigger Integration -->
<style>
.hero-photo-secondary {
    position: relative !important;
    cursor: pointer !important;
}
.reel-overlay {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    background: rgba(171, 14, 0, 0.35) !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    opacity: 0.95 !important;
    transition: all 0.3s ease !important;
    border-radius: inherit !important;
    z-index: 10 !important;
}
.hero-photo-secondary:hover .reel-overlay {
    background: rgba(171, 14, 0, 0.55) !important;
}
.play-btn-circle {
    width: 48px !important;
    height: 48px !important;
    background: #ffffff !important;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4) !important;
    color: #ab0e00 !important;
    font-size: 18px !important;
    position: relative !important;
    transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), background-color 0.3s, color 0.3s !important;
}
.play-btn-circle i {
    margin-left: 3px !important;
}
.play-btn-circle::after {
    content: '' !important;
    position: absolute !important;
    width: 100% !important;
    height: 100% !important;
    border: 2px solid #ffffff !important;
    border-radius: 50% !important;
    animation: playRipple 1.6s infinite ease-out !important;
    opacity: 0 !important;
    top: 0 !important;
    left: 0 !important;
    box-sizing: border-box !important;
}
@keyframes playRipple {
    0% {
        transform: scale(1);
        opacity: 0.8;
    }
    100% {
        transform: scale(1.6);
        opacity: 0;
    }
}
.hero-photo-secondary:hover .play-btn-circle {
    transform: scale(1.15) !important;
    background: #ab0e00 !important;
    color: #ffffff !important;
}

/* Modal styling */
.fb-reel-modal {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    width: 100vw !important;
    height: 100vh !important;
    z-index: 999999 !important;
    display: none;
    align-items: center !important;
    justify-content: center !important;
    opacity: 0 !important;
    pointer-events: none !important;
    transition: opacity 0.4s ease !important;
}
.fb-reel-modal.open {
    opacity: 1 !important;
    pointer-events: all !important;
}
.fb-reel-modal-overlay {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    background: rgba(20, 2, 0, 0.85) !important;
}
.fb-reel-modal-container {
    position: relative !important;
    z-index: 2 !important;
    width: 90% !important;
    max-width: 420px !important;
    height: 80vh !important;
    max-height: 740px !important;
    background: #000 !important;
    border-radius: 24px !important;
    overflow: hidden !important;
    box-shadow: 0 24px 60px rgba(0, 0, 0, 0.6) !important;
    transform: scale(0.9) !important;
    transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.15) !important;
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
}
.fb-reel-modal.open .fb-reel-modal-container {
    transform: scale(1) !important;
}
.fb-reel-modal-close {
    position: absolute !important;
    top: 15px !important;
    right: 15px !important;
    width: 36px !important;
    height: 36px !important;
    border-radius: 50% !important;
    background: rgba(255, 255, 255, 0.2) !important;
    border: none !important;
    color: #fff !important;
    font-size: 20px !important;
    cursor: pointer !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    z-index: 10 !important;
    transition: background 0.3s, transform 0.3s !important;
}
.fb-reel-modal-close:hover {
    background: rgba(171, 14, 0, 0.8) !important;
    transform: rotate(90deg) !important;
}
.fb-reel-video-wrapper {
    position: relative !important;
    width: 100% !important;
    height: 100% !important;
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
}
.fb-reel-video-loading {
    position: absolute !important;
    color: #fff !important;
    font-size: 32px !important;
    z-index: 1 !important;
}
#fb-reel-iframe {
    width: 100% !important;
    height: 100% !important;
    position: relative !important;
    z-index: 2 !important;
    opacity: 0;
    transition: opacity 0.3s !important;
    border: none !important;
}
</style>

<div class="fb-reel-modal" id="fb-reel-modal" style="display: none;">
    <div class="fb-reel-modal-overlay"></div>
    <div class="fb-reel-modal-container">
        <button class="fb-reel-modal-close" aria-label="Close">&times;</button>
        <div class="fb-reel-video-wrapper">
            <div class="fb-reel-video-loading">
                <i class="fa-solid fa-spinner fa-spin"></i>
            </div>
            <iframe id="fb-reel-iframe" src="" style="border:none;overflow:hidden;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        </div>
    </div>
</div>

<script>
(function() {
    function openReelModal(reelId) {
        const modal = document.getElementById('fb-reel-modal');
        const iframe = document.getElementById('fb-reel-iframe');
        const loading = modal ? modal.querySelector('.fb-reel-video-loading') : null;
        if (!modal || !iframe) return;

        const embedUrl = 'https://www.facebook.com/plugins/video.php?href=' + encodeURIComponent('https://www.facebook.com/reel/' + reelId) + '&show_text=0&width=500';
        iframe.src = embedUrl;
        modal.style.display = 'flex';
        setTimeout(function() {
            modal.classList.add('open');
        }, 10);

        iframe.onload = function() {
            if (loading) loading.style.display = 'none';
            iframe.style.opacity = '1';
        };
        
        document.body.style.overflow = 'hidden';
    }

    function closeReelModal() {
        const modal = document.getElementById('fb-reel-modal');
        const iframe = document.getElementById('fb-reel-iframe');
        const loading = modal ? modal.querySelector('.fb-reel-video-loading') : null;
        if (!modal) return;

        modal.classList.remove('open');
        setTimeout(function() {
            modal.style.display = 'none';
            if (iframe) {
                iframe.src = '';
                iframe.style.opacity = '0';
            }
            if (loading) {
                loading.style.display = 'block';
            }
        }, 400);

        document.body.style.overflow = '';
    }

    document.addEventListener('DOMContentLoaded', function() {
        const secondaryPhotos = document.querySelectorAll('.hero-photo-secondary');
        if (secondaryPhotos.length === 0) return;

        let reelId = '';
        const path = window.location.pathname.toLowerCase();
        
        if (path.indexOf('bba') !== -1 && path.indexOf('fullbba') === -1) {
            reelId = '1885125805685011';
        } else if (path.indexOf('msc-ai') !== -1 || path.indexOf('mscai') !== -1 || path.indexOf('fullbba') !== -1) {
            reelId = '1015362661016811';
        } else if (path.indexOf('mba') !== -1 || path.indexOf('emba') !== -1 || path.indexOf('dba') !== -1) {
            reelId = '970904218875704';
        } else {
            reelId = '970904218875704';
        }

        secondaryPhotos.forEach(function(item) {
            item.setAttribute('data-reel-id', reelId);
            
            if (!item.querySelector('.reel-overlay')) {
                const overlay = document.createElement('div');
                overlay.className = 'reel-overlay';
                overlay.innerHTML = '<div class="play-btn-circle"><i class="fa-solid fa-play"></i></div>';
                item.appendChild(overlay);
            }

            item.addEventListener('click', function(e) {
                e.preventDefault();
                const id = item.getAttribute('data-reel-id');
                openReelModal(id);
            });
        });

        const modal = document.getElementById('fb-reel-modal');
        if (modal) {
            modal.querySelector('.fb-reel-modal-close')?.addEventListener('click', closeReelModal);
            modal.querySelector('.fb-reel-modal-overlay')?.addEventListener('click', closeReelModal);
        }
    });
})();
</script>
"""

for filepath in html_files:
    print(f'Processing {filepath}...')
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    if 'fb-reel-modal' in content:
        print(f'  -> Already patched. Skipping.')
        continue

    # Insert before </body>
    if '</body>' in content:
        new_content = content.replace('</body>', f'\n{injection_block}\n</body>')
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(new_content)
        print(f'  -> Successfully patched.')
    else:
        print(f'  -> WARNING: Could not find </body> in {filepath}!')
