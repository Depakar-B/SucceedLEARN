"""Pull AMP issues from Search Console for elearnposh.com."""

from __future__ import annotations

import json
from collections import defaultdict
from datetime import date, timedelta
from pathlib import Path

from googleapiclient.discovery import build

from search_console import get_credentials

SITE_URL = 'sc-domain:elearnposh.com'
OUTPUT_FILE = 'amp_issues_report.json'
MAX_INSPECTIONS = 25


def amp_url(page_url: str) -> str:
    """Best-effort AMP URL for elearnposh (AMPforWP trailing /amp/)."""
    page_url = page_url.rstrip('/')
    if page_url.endswith('/amp'):
        return page_url + '/'
    return page_url + '/amp/'


def top_pages(service, limit: int = 30) -> list[str]:
    end = date.today() - timedelta(days=3)
    start = end - timedelta(days=28)
    body = {
        'startDate': start.isoformat(),
        'endDate': end.isoformat(),
        'dimensions': ['page'],
        'rowLimit': limit,
        'type': 'web',
    }
    resp = service.searchanalytics().query(siteUrl=SITE_URL, body=body).execute()
    rows = resp.get('rows', [])
    return [row['keys'][0] for row in rows]


def inspect_url(service, url: str) -> dict:
    body = {
        'inspectionUrl': url,
        'siteUrl': SITE_URL,
        'languageCode': 'en-US',
    }
    return service.urlInspection().index().inspect(body=body).execute()


def main() -> None:
    creds = get_credentials()
    service = build('searchconsole', 'v1', credentials=creds)

    pages = top_pages(service, limit=MAX_INSPECTIONS)
    report = {
        'site': SITE_URL,
        'inspected': [],
        'issue_summary': defaultdict(list),
    }

    seen_issues: set[str] = set()

    for page in pages:
        for candidate in (amp_url(page), page):
            try:
                result = inspect_url(service, candidate)
            except Exception as exc:  # noqa: BLE001
                report['inspected'].append({
                    'url': candidate,
                    'error': str(exc),
                })
                continue

            inspection = result.get('inspectionResult', {})
            amp = inspection.get('ampResult') or {}
            issues = amp.get('issues', [])

            entry = {
                'url': candidate,
                'ampUrl': amp.get('ampUrl'),
                'verdict': amp.get('verdict'),
                'ampIndexStatusVerdict': amp.get('ampIndexStatusVerdict'),
                'pageFetchState': amp.get('pageFetchState'),
                'lastCrawlTime': amp.get('lastCrawlTime'),
                'issues': issues,
                'inspectionLink': inspection.get('inspectionResultLink'),
            }
            report['inspected'].append(entry)

            for issue in issues:
                msg = issue.get('issueMessage', '')
                key = f"{issue.get('severity', 'UNKNOWN')}: {msg}"
                if key not in seen_issues:
                    seen_issues.add(key)
                    report['issue_summary'][key].append(candidate)

            if issues or amp.get('verdict') not in (None, 'PASS', 'NEUTRAL'):
                break

    serializable = {
        'site': report['site'],
        'inspected': report['inspected'],
        'issue_summary': dict(report['issue_summary']),
    }

    Path(OUTPUT_FILE).write_text(
        json.dumps(serializable, indent=2),
        encoding='utf-8',
    )

    print(f'Report saved to {OUTPUT_FILE}\n')
    if serializable['issue_summary']:
        print('=== Unique AMP issues ===')
        for issue, urls in serializable['issue_summary'].items():
            print(f'\n{issue}')
            for u in urls[:5]:
                print(f'  - {u}')
    else:
        print('No AMP issues returned from URL Inspection API for inspected pages.')
        print('Showing AMP verdicts:')
        for entry in serializable['inspected']:
            if entry.get('ampUrl') or entry.get('issues'):
                print(
                    f"  {entry.get('url')}: verdict={entry.get('verdict')} "
                    f"issues={len(entry.get('issues') or [])}"
                )


if __name__ == '__main__':
    main()
