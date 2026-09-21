# SucceedLearn Landing Bridge (safe for live Eduma)

Keeps **Eduma** as the live site theme. Only allowlisted URLs load `akaza-adventure`.

**Maintained checklist:** see [`LINKED-PAGES.md`](./LINKED-PAGES.md) for desktop + AMP status of every linked page.

Current allowlisted URLs:

- `/us-cyber-aware-october/` (Cyber US)
- `/uk-cyber-aware-october/` (Cyber UK)
- `/infosec-cybersecurity-awareness-us/` (Infosec US SEO URL)
- `/infosec-cybersecurity-awareness-uk/` (Infosec UK SEO URL)
- Infosec aliases: nested `/infosec-cybersecurity-awareness/us|uk/` (301 → flat), `/infosec-cybersecurity-awareness/`, `/cybersecurity-awareness/`, `/infosec-cybersecurity-awareness-month-2026/` and related
- `/security-awareness/` (SAP / Security Behaviour & Culture Suite)
- SAP alias: `/security-awareness-and-phishing/`

**Child pages stay on Eduma:** URLs like `/security-awareness/s-phish-phishing-simulation/`, `/security-awareness/s-aware/`, `/security-awareness/s-bytes/` are **not** bridged. They keep the normal Eduma + Elementor header/footer and remain editable in Elementor. Only the exact landing slug (and `/slug/amp/`) switches to akaza.

## Safe live rollout (do in this order)

### 1. Backup
- Full backup (files + DB), or at least a restore point.

### 2. Upload akaza-adventure (do NOT activate)
- Copy the whole `akaza-adventure` folder to live:
  - `wp-content/themes/akaza-adventure/`
- In **Appearance → Themes**, leave **Eduma** active.
- Confirm `akaza-adventure` is listed but not activated.

### 3. Upload this plugin (do NOT activate yet)
- Copy:
  - `wp-content/plugins/succeedlearn-landing-bridge/`

### 4. Optional AMP
- Live uses `succeedlearn-amp-custom` (new-UI templates under `template/new-ui/`).
- Upload/replace that plugin so Infosec + SAP AMP include the latest images and layouts.
- Force-AMP slugs already include: US Cyber, UK Cyber, Infosec US/UK (`infosec-cybersecurity-awareness-us|uk`), SAP (`security-awareness`).
- Live AMP entry files (upload `succeedlearn-amp-custom`):
  - Infosec US → `template/infosec-cybersecurity-awareness-us.php`
  - Infosec UK → `template/infosec-cybersecurity-awareness-uk.php`
- Bridge `sl_landing_bridge_linked_pages()` documents desktop template + AMP file for each live SEO path.
- If AMP is not ready, skip this. Desktop pages still work.

### 5. Activate the bridge plugin
- Plugins → activate **SucceedLearn Landing Bridge (Cyber + Infosec + SAP)**
- Home page and all Eduma pages should still look normal.

### 6. Create / assign the landing pages
Create pages (or edit existing):

1. **Cybersecurity Awareness (US)**
   - Slug: `us-cyber-aware-october`
   - Template: **SucceedLearn: Cybersecurity Awareness**

2. **Cybersecurity Awareness (UK)**
   - Slug: `uk-cyber-aware-october`
   - Template: **SucceedLearn: Cybersecurity Awareness (UK)**

3. **Infosec 2026 Cyber (US)**
   - Slug: `infosec-cybersecurity-awareness-us` (live: `https://succeedlearn.com/infosec-cybersecurity-awareness-us/`)
   - Template: **SucceedLearn: Infosec 2026 Cyber**
   - AMP: `https://succeedlearn.com/infosec-cybersecurity-awareness-us/?amp=1`

4. **Infosec 2026 Cyber (UK)**
   - Slug: `infosec-cybersecurity-awareness-uk` (live: `https://succeedlearn.com/infosec-cybersecurity-awareness-uk/`)
   - Template: **SucceedLearn: Infosec 2026 Cyber (UK)**
   - AMP: `https://succeedlearn.com/infosec-cybersecurity-awareness-uk/?amp=1`

5. **Security Awareness (SAP)**
   - Slug: `security-awareness` (live: `https://succeedlearn.com/security-awareness/`)
   - Template: **SucceedLearn: Security Awareness and Phishing**

Publish as **Draft** first if you want a private check with preview.

### 7. Test before announcing
- Open homepage (must still be Eduma).
- Open one normal Eduma page (must still be Eduma).
- Open the allowlisted landings (must show SucceedLearn design).
- Test Infosec AMP: `/infosec-cybersecurity-awareness-us/?amp=1` and `/infosec-cybersecurity-awareness-uk/?amp=1`
- Test SAP desktop + `/security-awareness/?amp=1`
- Test mobile + form submit on those pages only.

### 8. Emergency rollback (instant)
1. Deactivate **SucceedLearn Landing Bridge**
2. Site immediately returns to Eduma-only behavior
3. Optional: leave pages as drafts

## Typography / Elementor (v1.0.6+)

On Cyber / Infosec allowlisted landings the bridge also:

- Dequeues Elementor kit / frontend CSS (so `.elementor-kit-* h1–h4` cannot override SucceedLearn type)
- Strips `elementor-*` body classes
- Blocks Elementor Theme Builder header/footer overrides (those pages use custom CSA/Infosec headers)

**Secondary global chrome pages** (starting with `/security-awareness/`): use the shared **secondary global header + footer** from akaza (`template-parts/global/secondary-header.php` and `secondary-footer.php`). Opt pages in via `akaza_secondary_header_slugs()` in `inc/secondary-header.php`.

## Why this is safe
- Does **not** replace Eduma globally
- Does **not** edit Eduma theme files
- Only allowlisted slugs switch theme for that request
- Missing `akaza-adventure` → falls back, no fatal from this plugin
- One-click deactivate = full rollback

## Do NOT
- Activate `akaza-adventure` as the site theme
- Copy random template PHP into Eduma
- Deploy other akaza pages until you extend the slug allowlist on purpose
