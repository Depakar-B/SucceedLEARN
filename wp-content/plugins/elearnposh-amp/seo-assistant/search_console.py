from pathlib import Path

from google.auth.transport.requests import Request
from google.oauth2.credentials import Credentials
from google_auth_oauthlib.flow import InstalledAppFlow
from googleapiclient.discovery import build

SCOPES = ['https://www.googleapis.com/auth/webmasters.readonly']
CREDENTIALS_FILE = 'credentials.json'
TOKEN_FILE = 'token.json'
OAUTH_PORT = 8080


def get_credentials():
    creds = None

    if Path(TOKEN_FILE).exists():
        creds = Credentials.from_authorized_user_file(TOKEN_FILE, SCOPES)

    if not creds or not creds.valid:
        if creds and creds.expired and creds.refresh_token:
            creds.refresh(Request())
        else:
            flow = InstalledAppFlow.from_client_secrets_file(
                CREDENTIALS_FILE,
                SCOPES,
            )
            print(
                f'Waiting for Google sign-in (redirect: http://localhost:{OAUTH_PORT}/)...\n'
                'Open the sign-in link below in any browser you prefer.\n'
                'Keep this terminal running until sign-in completes.\n',
                flush=True,
            )
            creds = flow.run_local_server(
                port=OAUTH_PORT,
                prompt='consent',
                access_type='offline',
                open_browser=False,
            )

        Path(TOKEN_FILE).write_text(creds.to_json(), encoding='utf-8')

    return creds


def print_setup_help():
    print(
        '\n--- If you got "400 malformed" or "redirect_uri_mismatch" ---\n'
        '1. Open: https://console.cloud.google.com/apis/credentials?project=seo-assistant-500209\n'
        '2. OAuth client must be type "Desktop app" (not "Web application").\n'
        '   - If it is Web app, add these Authorized redirect URIs:\n'
        f'     http://localhost:{OAUTH_PORT}/\n'
        f'     http://127.0.0.1:{OAUTH_PORT}/\n'
        '3. Enable API: Google Search Console API\n'
        '   https://console.cloud.google.com/apis/library/searchconsole.googleapis.com?project=seo-assistant-500209\n'
        '4. OAuth consent screen: set app name + support email.\n'
        '   If app is in "Testing", add your Google account under Test users.\n'
        '5. Re-download credentials.json from Credentials page and replace the local file.\n'
    )


if __name__ == '__main__':
    if not Path(CREDENTIALS_FILE).exists():
        print(f'Error: {CREDENTIALS_FILE} not found in this folder.')
        print_setup_help()
        raise SystemExit(1)

    try:
        creds = get_credentials()
        service = build('searchconsole', 'v1', credentials=creds)
        sites = service.sites().list().execute()

        print('Connected Successfully!')
        entries = sites.get('siteEntry', [])
        if entries:
            print('Sites linked to this account:')
            for site in entries:
                print(f"  - {site['siteUrl']} ({site['permissionLevel']})")
        else:
            print('Authenticated, but no Search Console properties found for this account.')
    except Exception as exc:
        print(f'Connection failed: {exc}')
        print_setup_help()
        raise SystemExit(1) from exc
