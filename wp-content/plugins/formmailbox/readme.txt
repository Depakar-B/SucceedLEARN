=== FormMailbox ===
Contributors: depakar418
Tags: contact form, form builder, form entries, enquiry form, spam protection
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 7.4
Stable tag: 0.1.0
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Create contact forms, securely store entries, and monitor email notification attempts.

== Description ==

FormMailbox provides an easy form builder, secure local entry storage, email attempt monitoring, and built-in spam protection.

Choose a Contact Form, Request a Quote, Course Enquiry, Feedback Form, or Blank Form template. Edit and reorder fields, configure notifications, publish the form, and embed it with its unique shortcode.

The plugin does not claim that an email accepted by WordPress was delivered to the recipient. Provider-confirmed delivery will be shown only when supported by an explicitly configured integration.

== Installation ==

1. Upload the `formmailbox` directory to `/wp-content/plugins/` or install the plugin ZIP.
2. Activate FormMailbox from the Plugins screen.
3. Open FormMailbox in WordPress Admin.

== Frequently Asked Questions ==

= Does every form create a database table? =

No. All forms use a shared, structured set of FormMailbox tables and are connected by form and entry IDs.

= Does FormMailbox delete entries when deactivated? =

No. Deactivation does not delete forms or entries. Uninstall data removal will require an explicit administrator setting.

== Changelog ==

= 0.1.0 =
* Added form templates and a working field builder.
* Added create, edit, publish, duplicate, and protected delete actions.
* Added frontend shortcode rendering, validation, entry storage, and email notifications.
* Added submission details, email logs, dashboard counts, settings, and setup guidance.
* Added shared database tables for forms, entries, values, and email logs.
