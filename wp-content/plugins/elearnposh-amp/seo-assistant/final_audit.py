import re
import urllib.error
import urllib.request

URLS = [
    'https://elearnposh.com/amp/',
    'https://elearnposh.com/posh-act/amp/',
    'https://elearnposh.com/posh-compliance-updates-2026-india/amp/',
    'https://elearnposh.com/solutions/posh-training-for-employees/amp/',
    'https://elearnposh.com/solutions/posh-training-for-ic-members/amp/',
    'https://elearnposh.com/posh-courses/pocso-prevention-of-child-sexual-abuse/amp/',
    'https://elearnposh.com/posh-courses/posh-for-employees/amp/',
    'https://elearnposh.com/posh-courses/posh-for-ic-members/amp/',
]


def audit(url: str) -> None:
    req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0 (compatible; final-audit/1.0)'})
    try:
        with urllib.request.urlopen(req, timeout=40) as resp:
            html = resp.read().decode('utf-8', 'ignore')
            code = resp.status
    except urllib.error.HTTPError as exc:
        print(f'{url} -> HTTP {exc.code}')
        return
    except Exception as exc:
        print(f'{url} -> ERROR {exc}')
        return

    issues = []
    if not re.search(r'^\s*<!DOCTYPE\s+html\b', html, re.I):
        issues.append('missing_doctype')
    if not re.search(r'<html\b[^>]*\b(?:amp|\u26a1)\b', html, re.I):
        issues.append('missing_html_amp')
    if 'cdn.ampproject.org/v0.js' not in html:
        issues.append('missing_v0_js')
    if re.search(r'style=["\'][^"\']*!important', html, re.I):
        issues.append('inline_important')
    for m in re.finditer(
        r'<([a-z][a-z0-9-]*)\b((?:[^>"\']|"[^"]*"|\'[^\']*\')*)\bon\s*=\s*(["\'])(.*?)\3((?:[^>"\']|"[^"]*"|\'[^\']*\')*)>',
        html,
        re.I | re.S,
    ):
        attrs = m.group(2) + m.group(5)
        if not re.search(r'\btabindex\s*=', attrs, re.I):
            issues.append('on_missing_tabindex')
            break

    status = 'PASS' if not issues else 'FAIL'
    print(f'{url} -> HTTP {code} {status} issues={issues or "none"}')


for u in URLS:
    audit(u)
