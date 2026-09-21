"""Audit AMP HTML against all Search Console critical issue patterns."""

from __future__ import annotations

import json
import re
import urllib.error
import urllib.request
from pathlib import Path

# Top URLs from GSC AMP issue export + key templates
URLS = [
    'https://elearnposh.com/amp/',
    'https://elearnposh.com/',
    'https://elearnposh.com/posh-act/amp/',
    'https://elearnposh.com/posh-act/',
    'https://elearnposh.com/about-us/amp/',
    'https://elearnposh.com/contact/amp/',
    'https://elearnposh.com/posh-compliance-updates-2026-india/amp/',
    'https://elearnposh.com/posh-compliance-updates-2026-india/',
    'https://elearnposh.com/sexual-harassment-updates-jan-2026-posh-law-india/amp/',
    'https://elearnposh.com/bns-section-75-sexual-harassment-law-india/amp/',
    'https://elearnposh.com/role-powers-of-internal-committee/amp/',
    'https://elearnposh.com/cross-examination-in-posh-inquiries-precision/amp/',
    'https://elearnposh.com/she-box-a-single-window-platform-for-posh-compliance/amp/',
    'https://elearnposh.com/solutions/posh-training-for-employees/amp/',
    'https://elearnposh.com/posh-courses/posh-for-employees/amp/',
    'https://elearnposh.com/our-webinars/amp/',
    'https://elearnposh.com/blog/amp/',
]

GSC_CHECKS = [
    'doctype_missing',
    'html_amp_missing',
    'v0_js_missing',
    'boilerplate_missing',
    'viewport_missing',
    'on_without_tabindex',
    'on_without_role',
    'duplicate_canonical',
    'raw_iframe',
    'raw_img',
    'inline_style_important',
    'disallowed_style_tag',
    'target_blank_no_noopener',
    'amp_bind_without_script',
]


def fetch(url: str) -> tuple[str | None, str | None]:
    req = urllib.request.Request(
        url,
        headers={
            'User-Agent': 'Mozilla/5.0 (compatible; elearnposh-amp-audit/1.0)',
            'Accept': 'text/html',
        },
    )
    try:
        with urllib.request.urlopen(req, timeout=45) as resp:
            return resp.read().decode('utf-8', 'ignore'), None
    except urllib.error.HTTPError as exc:
        return None, f'HTTP {exc.code}'
    except Exception as exc:  # noqa: BLE001
        return None, str(exc)


def split_head_body(html: str) -> tuple[str, str]:
    m = re.search(r'<body\b', html, re.I)
    if not m:
        return html, ''
    return html[: m.start()], html[m.start() :]


def audit(html: str) -> list[str]:
    issues: list[str] = []
    head, body = split_head_body(html)

    if not re.search(r'^\s*<!DOCTYPE\s+html\b', html, re.I):
        issues.append('doctype_missing')
    if not re.search(r'<html\b[^>]*\b(?:amp|⚡)\b', html, re.I):
        issues.append('html_amp_missing')
    if not re.search(r'cdn\.ampproject\.org/v0\.js', html, re.I):
        issues.append('v0_js_missing')
    if not re.search(r'<style\b[^>]*\bamp-boilerplate\b', html, re.I):
        issues.append('boilerplate_missing')
    if not re.search(r'<meta\b[^>]*\bname\s*=\s*["\']viewport["\']', html, re.I):
        issues.append('viewport_missing')

    canonicals = re.findall(r'<link\b[^>]*\brel\s*=\s*["\']?\s*canonical', html, re.I)
    if len(canonicals) > 1:
        issues.append('duplicate_canonical')

    if re.search(r'<iframe\b', body, re.I):
        issues.append('raw_iframe')
    if re.search(r'<img\b', body, re.I):
        issues.append('raw_img')
    if re.search(r'style\s*=\s*["\'][^"\']*!important', html, re.I):
        issues.append('inline_style_important')

    bad_styles = re.findall(r'<style(?![^>]*\bamp-(?:boilerplate|custom)\b)[^>]*>', html, re.I)
    if bad_styles:
        issues.append('disallowed_style_tag')

    for m in re.finditer(
        r'<([a-z][a-z0-9-]*)\b((?:[^>"\']|"[^"]*"|\'[^\']*\')*)\bon\s*=\s*(["\'])(.*?)\3((?:[^>"\']|"[^"]*"|\'[^\']*\')*)>',
        html,
        re.I | re.S,
    ):
        attrs = m.group(2) + m.group(5)
        if not re.search(r'\btabindex\s*=', attrs, re.I):
            issues.append('on_without_tabindex')
            break
        if not re.search(r'\brole\s*=', attrs, re.I):
            issues.append('on_without_role')
            break

    for m in re.finditer(r'<a\b([^>]*)>', html, re.I):
        attrs = m.group(1)
        if re.search(r'\btarget\s*=\s*["\']_blank["\']', attrs, re.I):
            if not re.search(r'\brel\s*=\s*["\'][^"\']*noopener', attrs, re.I):
                issues.append('target_blank_no_noopener')
                break

    if re.search(r'\[[a-zA-Z][a-zA-Z0-9-]*\]', html) and not re.search(
        r'amp-bind-0\.1\.js', html, re.I
    ):
        issues.append('amp_bind_without_script')

    return issues


def validator_errors(html: str) -> list[str]:
    data = json.dumps({'html': html}).encode()
    req = urllib.request.Request(
        'https://validator.ampproject.org/v1/validator',
        data=data,
        headers={'Content-Type': 'application/json'},
    )
    try:
        with urllib.request.urlopen(req, timeout=90) as resp:
            payload = json.loads(resp.read().decode())
    except Exception as exc:  # noqa: BLE001
        return [f'validator_unavailable: {exc}']

    return [
        f"line {e.get('line')}: {e.get('message')}"
        for e in payload.get('errors', [])
        if e.get('severity') == 'ERROR'
    ]


def main() -> None:
    report = {
        'urls_checked': 0,
        'fetch_failures': {},
        'issue_counts': {k: 0 for k in GSC_CHECKS},
        'validator_error_counts': {},
        'per_url': {},
    }

    for url in URLS:
        html, err = fetch(url)
        entry = {'fetch_error': err, 'pattern_issues': [], 'validator_errors': []}
        report['urls_checked'] += 1

        if err or not html:
            report['fetch_failures'][url] = err
            report['per_url'][url] = entry
            continue

        patterns = audit(html)
        entry['pattern_issues'] = patterns
        for issue in patterns:
            report['issue_counts'][issue] = report['issue_counts'].get(issue, 0) + 1

        verrors = validator_errors(html)
        entry['validator_errors'] = verrors[:10]
        for msg in verrors:
            report['validator_error_counts'][msg] = report['validator_error_counts'].get(msg, 0) + 1

        report['per_url'][url] = entry

    out = Path('amp_live_audit_report.json')
    out.write_text(json.dumps(report, indent=2), encoding='utf-8')

    print(f'Audit saved to {out}\n')
    print('=== Pattern checks (maps to GSC critical issues) ===')
    any_pattern = False
    for key, count in sorted(report['issue_counts'].items(), key=lambda x: -x[1]):
        if count:
            any_pattern = True
            print(f'  {key}: {count} URL(s)')
    if not any_pattern:
        print('  None detected on fetched pages')

    print('\n=== AMP validator unique errors ===')
    if report['validator_error_counts']:
        for msg, count in sorted(report['validator_error_counts'].items(), key=lambda x: -x[1])[:15]:
            print(f'  [{count}x] {msg}')
    else:
        print('  None (or validator unavailable)')

    if report['fetch_failures']:
        print('\n=== Fetch failures ===')
        for url, err in report['fetch_failures'].items():
            print(f'  {url}: {err}')


if __name__ == '__main__':
    main()
