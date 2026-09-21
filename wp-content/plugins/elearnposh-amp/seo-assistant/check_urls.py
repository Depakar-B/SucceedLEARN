import urllib.error
import urllib.request

URLS = [
    'https://elearnposh.com/amp/',
    'https://elearnposh.com/posh-courses/posh-for-employees/amp/',
    'https://elearnposh.com/solutions/posh-training-for-employees/amp/',
    'https://elearnposh.com/posh-courses/posh-for-ic-members/amp/',
    'https://elearnposh.com/posh-courses/pocso-prevention-of-child-sexual-abuse/amp/',
    'https://elearnposh.com/posh-act/amp/',
]

for url in URLS:
    req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0 (compatible; final-audit/1.0)'})
    try:
        with urllib.request.urlopen(req, timeout=40) as resp:
            html = resp.read(500).decode('utf-8', 'ignore')
            amp = 'amp' in html.lower() or '\u26a1' in html
            print(f'{url} -> HTTP {resp.status} amp_hint={amp}')
    except urllib.error.HTTPError as exc:
        print(f'{url} -> HTTP {exc.code}')
    except Exception as exc:
        print(f'{url} -> ERROR {exc}')
