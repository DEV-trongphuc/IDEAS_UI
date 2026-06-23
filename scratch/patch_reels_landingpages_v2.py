import os
import re

root_dir = r'e:/IDEAS_WP_UI/wp-content/new_public/LANDINGPAGE_MBA'
html_files = []
for root, dirs, files in os.walk(root_dir):
    for file in files:
        if file.endswith('.html') and file != 'singlepost.html':
            html_files.append(os.path.join(root, file))

print(f'Found {len(html_files)} HTML landing page files to update.')

injection_block = """<!-- Facebook Reel Modal & Trigger Integration -->
<style>
.hero-visual {
    position: relative !important;
}
.hero-photo-secondary {
    position: absolute !important;
    display: block !important;
    cursor: pointer !important;
    z-index: 15 !important;
}
.reel-overlay {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    background: rgba(15, 23, 42, 0.25) !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    opacity: 0.95 !important;
    transition: all 0.3s ease !important;
    border-radius: inherit !important;
    z-index: 10 !important;
}
.hero-photo-secondary:hover .reel-overlay {
    background: rgba(15, 23, 42, 0.4) !important;
}
.play-btn-circle {
    width: 48px !important;
    height: 48px !important;
    background: #ab0e00 !important;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    box-shadow: 0 4px 15px rgba(171, 14, 0, 0.4) !important;
    color: #ffffff !important;
    font-size: 18px !important;
    position: relative !important;
    transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), background-color 0.3s, box-shadow 0.3s !important;
}
.play-btn-circle i {
    margin-left: 3px !important;
}
.play-btn-circle::before,
.play-btn-circle::after {
    content: '' !important;
    position: absolute !important;
    width: 100% !important;
    height: 100% !important;
    border: 3px solid rgba(171, 14, 0, 0.7) !important;
    border-radius: 50% !important;
    top: 0 !important;
    left: 0 !important;
    box-sizing: border-box !important;
    pointer-events: none !important;
}
.play-btn-circle::before {
    animation: playRipple 2s infinite ease-out !important;
}
.play-btn-circle::after {
    animation: playRipple 2s infinite ease-out !important;
    animation-delay: 1s !important;
}
@keyframes playRipple {
    0% {
        transform: scale(1);
        opacity: 0.9;
    }
    100% {
        transform: scale(1.8);
        opacity: 0;
    }
}
.hero-photo-secondary:hover .play-btn-circle {
    transform: scale(1.15) !important;
    background: #ff2a1a !important;
    box-shadow: 0 6px 25px rgba(255, 42, 26, 0.6) !important;
    color: #ffffff !important;
}

/* Modal styling */
.fb-reel-modal {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    width: 100vw !important;
    height: 100vh !important;
    z-index: 2147483647 !important;
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
    background: rgba(15, 23, 42, 0.92) !important;
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
    flex-direction: column !important;
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
    flex: 1 !important;
    height: auto !important;
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
.fb-reel-more-btn {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 8px !important;
    width: calc(100% - 32px) !important;
    margin: 16px auto !important;
    padding: 12px 24px !important;
    background: linear-gradient(135deg, #ab0e00, #ff3600) !important;
    color: #fff !important;
    text-decoration: none !important;
    font-weight: 700 !important;
    font-size: 0.9rem !important;
    border-radius: 12px !important;
    box-shadow: 0 4px 15px rgba(171, 14, 0, 0.3) !important;
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
    text-align: center !important;
    z-index: 5 !important;
}
.fb-reel-more-btn:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 6px 20px rgba(171, 14, 0, 0.5) !important;
    background: linear-gradient(135deg, #ff3600, #ab0e00) !important;
    color: #fff !important;
    text-decoration: none !important;
}
.fb-reel-more-btn i {
    font-size: 10px !important;
    transition: transform 0.2s !important;
}
.fb-reel-more-btn:hover i {
    transform: translateX(3px) !important;
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
            <iframe id="fb-reel-iframe" src="" style="border:none;overflow:hidden;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; encrypted-media; picture-in-picture"></iframe>
        </div>
        <a href="/reel" class="fb-reel-more-btn" id="fb-reel-more-btn">
            <span>Khám phá thêm Reels tư vấn</span> <i class="fa-solid fa-chevron-right"></i>
        </a>
    </div>
</div>

<script>
(function() {
    function openReelModal(reelId) {
        const modal = document.getElementById('fb-reel-modal');
        const iframe = document.getElementById('fb-reel-iframe');
        const loading = modal ? modal.querySelector('.fb-reel-video-loading') : null;
        if (!modal || !iframe) return;

        const embedUrl = 'https://www.youtube.com/embed/' + reelId + '?autoplay=1&mute=0&loop=1&playlist=' + reelId + '&controls=1&rel=0&playsinline=1';
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
        const currentPath = window.location.pathname.toLowerCase();
        const isReelPage = currentPath.indexOf('/reel') !== -1;
        
        let reelId = '';
        if (currentPath.indexOf('sacombank') !== -1) {
            reelId = 'tfSh3cVhvR8';
        } else if (currentPath.indexOf('bba') !== -1 && currentPath.indexOf('fullbba') === -1) {
            reelId = 'YgF77KEghOI';
        } else if (currentPath.indexOf('mba') !== -1 || currentPath.indexOf('emba') !== -1 || currentPath.indexOf('dba') !== -1 || currentPath.indexOf('mscai') !== -1 || currentPath.indexOf('mbainai') !== -1) {
            reelId = 'rXWWEC2LJJM';
        }

        const isEn = currentPath.indexOf('/en/') !== -1;
        const reelHref = isEn ? '/en/reel' : '/reel';
        
        const moreBtn = document.getElementById('fb-reel-more-btn');
        if (moreBtn) {
            moreBtn.href = reelHref;
            const span = moreBtn.querySelector('span');
            if (span) {
                span.textContent = isEn ? 'Explore More Reels' : 'Khám phá thêm Reels tư vấn';
            }
        }

        if (!isReelPage) {
            const label = isEn ? 'Watch Reels' : 'Xem Reels';
            const btn = document.createElement('a');
            btn.href = reelHref;
            btn.className = 'global-floating-reel-btn';
            btn.setAttribute('aria-label', label);
            btn.innerHTML = '<i class="fa-solid fa-circle-play"></i>';
            document.body.appendChild(btn);

            if (reelId) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    openReelModal(reelId);
                });
            }
        }

        const secondaryPhotos = document.querySelectorAll('.hero-photo-secondary');
        if (secondaryPhotos.length > 0) {
            const photoReelId = reelId || 'GPyTkgHtU-0';
            secondaryPhotos.forEach(function(item) {
                item.setAttribute('data-reel-id', photoReelId);
                
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
        }

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

    # If it is already patched, we remove the old patch first
    if '<!-- Facebook Reel Modal & Trigger Integration -->' in content:
        print(f'  -> Found existing patch. Stripping and re-patching...')
        parts = content.split('<!-- Facebook Reel Modal & Trigger Integration -->')
        # We keep parts[0]
        # But wait! The old patch might have been followed by </body>\n</html>. We need to make sure we don't drop anything else.
        # Since the old patch was always inserted right before </body>, parts[0] contains everything up to the patch.
        # Let's verify that </body> exists in the rest.
        clean_content = parts[0]
        
        # Append the new block
        new_content = clean_content + injection_block + '\n</body>\n</html>'
        
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(new_content)
        print(f'  -> Successfully updated patch.')
    else:
        # If not patched, insert before </body>
        if '</body>' in content:
            new_content = content.replace('</body>', f'\n{injection_block}\n</body>')
            with open(filepath, 'w', encoding='utf-8') as f:
                f.write(new_content)
            print(f'  -> Successfully patched (fresh).')
        else:
            print(f'  -> WARNING: Could not find </body> in {filepath}!')
