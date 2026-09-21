# CTA Journey Tracking (`custom_lead_path`)

Developer guide for SucceedLEARN global CTA journey tracking.

## Overview

When a visitor browses the site and/or clicks tracked CTAs (`data-cta`), then submits a SCF contact or course form, the journey is stored as:

```text
home>page-about>page-contact-us
```

Each **page view** (same browser tab) appends a segment like `home`, `page-about-us`, or `course-security-awareness`. **CTA clicks** append identifiers from `data-cta` (e.g. `hero-demo`).

This value is saved in the lead database and sent to ERPNext as **`custom_lead_path`**.

## How tracking works

1. **Automatic page views** — on every front-end page load, the tracker appends a segment derived from the current page slug (see `get_page_journey_segment()` in PHP).
2. **Explicit CTA clicks** — add `data-cta` to links/buttons for finer-grained actions (demo buttons, in-page CTAs).

## How to add CTA tracking

Add a `data-cta` attribute to any link or button you want tracked. No JavaScript changes are required.

```html
<a href="/contact-us/" data-cta="hero-demo">
    Book a Demo
</a>
```

Only elements with `data-cta` are tracked.

## Naming convention

Use lowercase `{section}-{action}` identifiers (e.g. `hero-demo`, `fcp-demo`, `coc-hero-demo`).

## Data flow

```text
Page load / CTA click
    → sessionStorage key: custom_lead_path
    → further page navigation (same browser tab)
    → SCF form hidden field: custom_lead_path
    → PHP sanitize + validate
    → wp_scf_*_submissions.custom_lead_path
    → ERP Lead custom_lead_path
```

## Database

Column: `custom_lead_path VARCHAR(500) DEFAULT '' AFTER source_tag`

Legacy `cta_path` column data is copied automatically on upgrade if present.

## ERP integration

Field: **`custom_lead_path`** on ERPNext Lead doctype.

```json
{
  "utm_source": "SucceedLEARN Homepage",
  "custom_page_url": "https://succeedlearn.com/contact-us/",
  "custom_lead_path": "hero-demo>s-aware>footer-demo"
}
```

## Admin and export

- **WP Admin / CSV / weekly report:** Lead Path column
- **Admin notification email:** User Journey (always shown; formatted with → arrows, or “Not recorded” when empty)

## Files

| File | Role |
|------|------|
| `assets/js/cta-path-tracker.js` | Non-AMP click tracker |
| `assets/js/cta-path-tracker.amp.js` | AMP amp-script tracker |
| `assets/js/form.js` | Populates hidden field before AJAX submit |
| `succeed-contact-form.php` | Hidden fields, PHP, DB, admin |
| `succeedlearn-form-erp/includes/class-sl-erp-mapper.php` | ERP payload |
