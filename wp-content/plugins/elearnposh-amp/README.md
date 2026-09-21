# eLearnPOSH AMP - Modern WordPress AMP Plugin

**Version:** 2.0.2  
**Requires at least:** WordPress 5.8  
**Requires PHP:** 7.4  
**License:** GPL-2.0+

## Description

A modern, fully AMP-compliant WordPress plugin for eLearnPOSH, built with clean architecture and following the latest AMP HTML standards. This is a complete rewrite of the legacy `ep-custom-amp` plugin with improved code structure, maintainability, and full AMP validation.

## Features

### ✅ Modern Architecture
- **Object-Oriented Design**: Clean, maintainable PHP code following WordPress coding standards
- **Namespaced Classes**: Proper PSR-4 autoloading
- **Configuration Management**: Centralized settings instead of hardcoded values
- **Template Manager**: Smart routing system for different page types

### ✅ Full AMP Compliance
- **Valid AMP HTML**: All templates pass AMP validation
- **No JavaScript Violations**: Uses only AMP-approved components
- **Optimized CSS**: Inline CSS under 75KB limit
- **Proper Boilerplate**: Correct AMP document structure

### ✅ Features
- Newsletter list page with search and year filtering
- Blog list page with category navigation
- Single blog post template with social sharing
- Single newsletter template with social sharing
- Course page templates
- Contact and Terms & Conditions pages
- Responsive design
- SEO-friendly
- Accessibility features (ARIA labels, semantic HTML)

### ✅ Admin Panel
- Easy configuration through WordPress admin
- Configurable page IDs
- Custom CSS support
- Visual settings interface

## Installation

### Step 1: Upload Plugin

1. Download the plugin folder `elearnposh-amp`
2. Upload to `/wp-content/plugins/` directory
3. Or install via WordPress admin → Plugins → Add New → Upload

### Step 2: Activate

1. Go to WordPress Admin → Plugins
2. Find "eLearnPOSH AMP - Modern"
3. Click "Activate"

### Step 3: Configure

1. Go to WordPress Admin → eLearnPOSH AMP
2. Configure page IDs (Newsletter, Blog, Contact, etc.)
3. Optionally add custom CSS
4. Save settings

## File Structure

```
elearnposh-amp/
├── elearnposh-amp.php          # Main plugin file (bootstrap)
├── README.md                   # This file
├── MIGRATION.md                # Migration guide from old plugin
├── COMPARISON.md               # Detailed comparison with old plugin
│
├── includes/                   # PHP Classes
│   ├── class-plugin.php        # Main plugin class
│   ├── class-config.php        # Configuration management
│   ├── class-template-manager.php  # Template routing
│   └── class-admin.php         # Admin panel
│
├── templates/                  # AMP Templates
│   ├── components/             # Reusable components
│   │   ├── header-bar.php
│   │   ├── menu.php           # Header + Sidebar navigation
│   │   └── footer.php
│   │
│   ├── pages/                  # Page templates
│   │   ├── newsletter-list.php
│   │   ├── blog-list.php
│   │   ├── single-blog.php
│   │   ├── single-newsletter.php
│   │   ├── archive.php
│   │   ├── home.php
│   │   ├── contact.php
│   │   ├── terms-conditions.php
│   │   ├── single-course.php
│   │   └── global-course.php
│   │
│   └── styles/                 # CSS partials
│       ├── menu.php
│       └── footer.php
│
├── assets/                     # (Reserved for future assets)
│   └── css/
│
└── languages/                  # Translation files
```

## Configuration

### Page IDs Configuration

The plugin uses page IDs to determine which template to use. Configure these in the admin panel:

- **Newsletter List Page ID**: Page that displays all newsletters (default: 18121)
- **Blog List Page ID**: Page that displays all blog posts (default: 17993)
- **Contact Page ID**: Contact form page (default: 49)
- **Terms Page ID**: Terms & Conditions page (default: 16356)

### Post Category Detection

- Posts in the "newsletter" category automatically use newsletter templates
- All other posts use blog templates

### Course Pages

Course page IDs are configured in the settings array. By default:
- Standard courses: 66, 42, 5390, 8100, 8244, 15159, 15820
- Global courses: 93, 91

## Usage

### Template Routing

The plugin automatically detects page types and routes to appropriate templates:

1. **Newsletter List** → Uses `newsletter-list.php`
2. **Blog List** → Uses `blog-list.php`
3. **Single Newsletter** → Uses `single-newsletter.php`
4. **Single Blog** → Uses `single-blog.php`
5. **Archive Pages** → Uses `archive.php`
6. **Course Pages** → Uses `single-course.php`
7. **Contact** → Uses `contact.php`
8. **Terms** → Uses `terms-conditions.php`

### Customization

#### Adding Custom CSS

1. Go to WordPress Admin → eLearnPOSH AMP
2. Enable "Enable Custom CSS"
3. Add your CSS in the "Custom CSS" textarea
4. Save

**Note:** AMP has a 75KB inline CSS limit. Keep your custom CSS concise.

#### Modifying Templates

All templates are in `/templates/` directory. You can modify them directly or use WordPress filters to override.

#### Changing Configuration

Use the Config class methods in your custom code:

```php
$plugin = \ElearnPOSH\AMP\Plugin::get_instance();
$config = $plugin->get_config();

// Get a setting
$newsletter_id = $config->get('newsletter_page_id');

// Check if current page is newsletter
if ($config->is_newsletter_page()) {
    // Do something
}
```

## AMP coding standards

When authoring or editing templates in this plugin, follow **[AMP-STANDARDS.md](AMP-STANDARDS.md)** (Google AMP HTML rules for this codebase). Validate pages with the AMP Validator or append `#development=1` to the AMP URL.

## AMP Components Used

The plugin includes these AMP components:

- `amp-sidebar` - Navigation sidebar
- `amp-accordion` - Collapsible menu sections
- `amp-social-share` - Social sharing buttons
- `amp-img` - Responsive images
- `amp-form` - (For contact forms)

All components are loaded automatically when needed.

## WordPress Standards

This plugin follows:

- WordPress Coding Standards (WPCS)
- PHP Standards Recommendations (PSR-4 autoloading)
- WordPress Plugin API best practices
- Security best practices (sanitization, escaping, nonces)
- Internationalization (i18n) ready

## Translation

The plugin is translation-ready:

```php
// Text domain: elearnposh-amp
__('Text to translate', 'elearnposh-amp');
```

Translation files go in `/languages/` directory.

## Compatibility

- **WordPress:** 5.8+
- **PHP:** 7.4+
- **Required Plugin:** AMPforWP or similar AMP plugin
- **Browsers:** All modern browsers
- **AMP Validation:** Passes all AMP validation tests

## Support

For issues or questions:

1. Check the `MIGRATION.md` guide
2. Review the `COMPARISON.md` for differences with old plugin
3. Contact eLearnPOSH development team

## Changelog

### Version 2.0.0 (Current)
- Complete rewrite with OOP architecture
- Full AMP HTML compliance
- Admin configuration panel
- Improved template structure
- Better code organization
- Security improvements
- Performance optimizations
- Documentation and migration guide

### Version 1.1 (Legacy)
- Old procedural plugin (deprecated)

## Credits

Developed by eLearnPOSH Development Team  
Original plugin by Mohammed Kaludi, Ahmed Kaludi  
Modernized and rebuilt for AMP compliance

## License

GPL-2.0+ - GNU General Public License v2 or later  
http://www.gnu.org/licenses/gpl-2.0.txt


