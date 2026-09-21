=== Post Lattice ===
Contributors: depakar
Tags: post grid, blog grid, newsletter, filter, load more
Requires at least: 6.0
Tested up to: 7.1
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Filterable card grids for blog posts, newsletters, and other post types. Search, sort, category or year filters, and load more.

== Description ==

Post Lattice turns any page into a clean article grid. Visitors can search, sort, filter by category or year, and load more cards without a page reload.

It is built as a standalone plugin (not a page template), so you can sell it, drop it on any theme, and control every label from wp-admin.

= Place a grid =

`[post_lattice]`

Or insert the **Post Lattice Grid** block.

= Typical setups =

* Blog listing: `[post_lattice exclude_categories="newsletter"]`
* Newsletters by year: `[post_lattice include_categories="newsletter" filter="year" card_badge="year"]`
* Compact related grid: `[post_lattice show_hero="0" show_cta="0"]`

= Admin control =

Settings → Post Lattice

* Layout: post type, categories, columns, cards per load
* Text & labels: heading, search, sort, filters, empty states, CTA
* Colors: accent, headings, cards, buttons, CTA bar

== Installation ==

1. Upload the `post-lattice` folder to `/wp-content/plugins/`.
2. Activate **Post Lattice**.
3. Go to Settings → Post Lattice and set your text and colors.
4. Add `[post_lattice]` to a page.

== Frequently Asked Questions ==

= Can I show blogs and newsletters separately? =

Yes. Use include/exclude categories, or two shortcodes with different attributes.

= Does it work with custom post types? =

Yes. Choose the post type under Layout. Hierarchical taxonomies are used for category pills.

= Can I sell this plugin? =

The code is GPL-2.0-or-later, which is required for WordPress. You may sell copies, support, and custom branding.

== Screenshots ==

1. Post Lattice product thumbnail: filterable post grid on desktop and mobile.

== Changelog ==

= 1.0.0 =
* First release: shortcode, Gutenberg block, admin settings for layout, text, and colors.
