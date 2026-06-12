import urllib.request
import urllib.error
import sys

sys.stdout.reconfigure(encoding='utf-8')

test_cases = [
    # 1. Non-existent English sub-page -> Should redirect to VI
    {
        "url": "https://ideas.edu.vn/en/tu-van-vien",
        "expected_redirect": "https://ideas.edu.vn/tu-van-vien"
    },
    # 2. Non-existent English blog post -> Should redirect to VI
    {
        "url": "https://ideas.edu.vn/en/tin-tuc-moi/cu-nhan-quan-tri-kinh-doanh-online.html",
        "expected_redirect": "https://ideas.edu.vn/tin-tuc-moi/cu-nhan-quan-tri-kinh-doanh-online.html"
    },
    # 3. Valid English landing page -> Should NOT redirect
    {
        "url": "https://ideas.edu.vn/en/mba",
        "expected_redirect": None
    }
]

class NoRedirectHandler(urllib.request.HTTPRedirectHandler):
    def redirect_request(self, req, fp, code, msg, headers, newurl):
        # Store redirect URL in request
        req.redirect_url = newurl
        return None  # Stop automatic redirection

opener = urllib.request.build_opener(NoRedirectHandler)

print("--- RUNNING FALLBACK REDIRECT TESTS ---")
success = True

for tc in test_cases:
    url = tc["url"]
    expected = tc["expected_redirect"]
    print(f"\nTesting: {url}")
    
    try:
        req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
        req.redirect_url = None
        
        with opener.open(req, timeout=8) as res:
            redirected_to = getattr(req, 'redirect_url', None)
            
            if expected:
                if redirected_to == expected:
                    print(f"  [PASS] Correctly redirected to: {redirected_to}")
                else:
                    print(f"  [FAIL] Expected redirect to '{expected}', but got '{redirected_to}'")
                    success = False
            else:
                if redirected_to:
                    print(f"  [FAIL] Expected NO redirect, but got redirected to: {redirected_to}")
                    success = False
                else:
                    print(f"  [PASS] Page loaded normally with status {res.status} (No redirect)")
                    
    except urllib.error.HTTPError as e:
        if e.code in [301, 302] and expected:
            redirected_to = e.headers.get('Location')
            if redirected_to == expected:
                print(f"  [PASS] Correctly redirected with status {e.code} to: {redirected_to}")
            else:
                print(f"  [FAIL] Redirected with status {e.code} to '{redirected_to}', but expected '{expected}'")
                success = False
        else:
            print(f"  [FAIL] HTTP Error: {e.code}")
            success = False
    except Exception as e:
        print(f"  [FAIL] Connection Error: {e}")
        success = False

print("\n--- TEST SUMMARY ---")
if success:
    print("ALL TESTS PASSED! Redirection rules are behaving correctly.")
else:
    print("SOME TESTS FAILED! Please check the redirect configuration.")
