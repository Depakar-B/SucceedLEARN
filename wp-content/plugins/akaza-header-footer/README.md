# Akaza Header Footer

Standalone WordPress plugin replacing the old child-theme `header/` module.

## Install

1. Copy the `akaza-header-footer` folder to:
   ```
   wp-content/plugins/akaza-header-footer/
   ```
2. **Plugins → Installed Plugins** → activate **Akaza Header Footer**.
3. **Settings → Site Header** — review contact, CTA, and feature toggles.
4. **Disable the old header module** (see Migration below).

## Features

| Feature | Setting key | Description |
|---------|-------------|-------------|
| Genesis nav layout | `genesis_layout` | Primary nav in header, secondary in footer |
| Desktop extras | `desktop_extras` | Email, phone shortcode, CTA on primary menu |
| Mega menu fix | `mega_menu_fix` | Arrow indicator CSS + responsive font sizes |
| Mobile header | `mobile_header` | Fixed bar + slide-out menu below breakpoint |

AMP pages are **not** handled by this plugin (use **elearnposh-amp**).

## Migration from old `header/` theme folder

### On the server

1. Activate this plugin.
2. **Turn OFF** the old module:
   - **Appearance → Header Module** → disable, **or**
   - Remove from child theme `functions.php`:
     ```php
     require_once get_stylesheet_directory() . '/header/init.php';
     ```
3. Remove duplicate header code from `functions.php` if still present (see old `header/README.md` checklist).
4. Optional: delete `wp-content/themes/your-child-theme/header/` after confirming the plugin works.
5. Clear all caches.

### Old option vs new

| Old | New |
|-----|-----|
| `ep_header_module_enabled` | `AHF_settings['enabled']` |
| `header/config.php` | Settings → Site Header |
| `ep_header_*` filters | `AHF_*` filters |

## Filters (child theme)

```php
add_filter( 'AHF_mobile_menu_items', function ( $items ) {
    $items[] = array( 'label' => 'New Page', 'url' => '/new-page/' );
    return $items;
} );

add_filter( 'AHF_config', function ( $config ) {
    $config['cta']['url'] = 'https://example.com/demo';
    return $config;
} );
```

## Requirements

- WordPress 5.8+
- Genesis child theme (for nav layout feature)
- Max Mega Menu (`#mega-menu-wrap-primary`) for mega menu CSS
- `[shuffle_one_number]` shortcode for rotating phone (optional)

## File structure

```
akaza-header-footer/
├── akaza-header-footer.php    # Bootstrap
├── includes/
│   ├── class-ahf-plugin.php
│   ├── class-ahf-config.php
│   ├── class-ahf-amp.php
│   ├── class-ahf-menu-items.php
│   ├── class-ahf-genesis-layout.php
│   ├── class-ahf-desktop-menu.php
│   ├── class-ahf-mega-menu.php
│   └── class-ahf-mobile-header.php
├── admin/class-ahf-settings.php
├── templates/mobile-header.php
└── assets/css|js/
```

## What was fixed vs old module

- Scoped CSS (no global `nav` / `header` hide)
- Valid CTA markup (`<a><span>` not `<a><button>`)
- Single CTA URL for desktop and mobile
- Mobile sidebar includes phone number
- Submenu toggles use `<button>` + `aria-expanded`
- Escape key closes mobile menu
- `body` padding-top for fixed mobile bar
- Proper plugin paths (no child-theme folder dependency)
- Unified AMP detection
- Per-feature toggles in admin
