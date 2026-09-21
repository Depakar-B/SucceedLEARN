import re
import urllib.request

ON_ATTR = re.compile(
    r'<([a-z][a-z0-9-]*)\b((?:[^>"\']|"[^"]*"|\'[^\']*\')*)\bon\s*=\s*(["\'])(.*?)\3((?:[^>"\']|"[^"]*"|\'[^\']*\')*)>',
    re.I | re.S,
)


def check(url: str) -> None:
    req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
    html = urllib.request.urlopen(req, timeout=45).read().decode('utf-8', 'ignore')
    is_amp = bool(re.search(r'<html\b[^>]*\b(?:amp|⚡)\b', html, re.I))
    print(f'\n{url}')
    print(f'  is_amp={is_amp} doctype={bool(re.search(r"<!DOCTYPE", html, re.I))} v0={("v0.js" in html)}')
    missing = []
    for m in ON_ATTR.finditer(html):
        attrs = m.group(2) + ' ' + m.group(5)
        if not re.search(r'\btabindex\s*=', attrs, re.I):
            missing.append(m.group(0)[:150].replace('\n', ' '))
    print(f'  on_without_tabindex={len(missing)}')
    for row in missing[:5]:
        print(f'    - {row}')


for u in [
    'https://elearnposh.com/amp/',
    'https://elearnposh.com/posh-compliance-updates-2026-india/amp/',
    'https://elearnposh.com/contact-us/amp/',
    'https://elearnposh.com/contact/amp/',
    'https://elearnposh.com/bns-section-75-sexual-harassment-law-india/amp/',
]:
    try:
        check(u)
    except Exception as exc:
        print(f'\n{u}\n  ERROR: {exc}')
