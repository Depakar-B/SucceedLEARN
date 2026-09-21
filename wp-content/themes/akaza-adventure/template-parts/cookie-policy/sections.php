<?php
/**
 * Cookie Policy — body sections (shared desktop + AMP).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="what-are-cookies" class="sl-legal-section">
	<h2><?php esc_html_e( '1. What Are Cookies', 'akaza-adventure' ); ?></h2>
	<p><?php esc_html_e( 'Cookies are small text files stored on your device when you visit a website. They help websites remember preferences, keep sessions secure, and understand how pages are used.', 'akaza-adventure' ); ?></p>
</section>

<section id="how-we-use-cookies" class="sl-legal-section">
	<h2><?php esc_html_e( '2. How We Use Cookies', 'akaza-adventure' ); ?></h2>
	<p><?php esc_html_e( 'We use cookies to improve user experience, remember preferences, and analyze site performance.', 'akaza-adventure' ); ?></p>
	<ul>
		<li>
			<strong><?php esc_html_e( 'Essential Cookies:', 'akaza-adventure' ); ?></strong>
			<?php esc_html_e( 'Enable secure access, login sessions, cart, billing, and payments. Disabling them may affect core functions.', 'akaza-adventure' ); ?>
		</li>
		<li>
			<strong><?php esc_html_e( 'Performance Cookies:', 'akaza-adventure' ); ?></strong>
			<?php esc_html_e( 'Help analyze website traffic and usage to improve functionality.', 'akaza-adventure' ); ?>
		</li>
		<li>
			<strong><?php esc_html_e( 'Preference Cookies:', 'akaza-adventure' ); ?></strong>
			<?php esc_html_e( 'Store personalization settings like language and course display.', 'akaza-adventure' ); ?>
		</li>
		<li>
			<strong><?php esc_html_e( 'Third-Party Cookies:', 'akaza-adventure' ); ?></strong>
			<?php
			echo wp_kses(
				sprintf(
					/* translators: %s: Google privacy policy URL */
					__( "Tools such as Google Analytics may set cookies to track site usage. We do not control these cookies. See Google's policy: %s.", 'akaza-adventure' ),
					'<a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer">https://policies.google.com/privacy</a>'
				),
				array(
					'a' => array(
						'href'   => true,
						'target' => true,
						'rel'    => true,
					),
				)
			);
			?>
		</li>
	</ul>
</section>

<section id="managing-cookies" class="sl-legal-section">
	<h2><?php esc_html_e( '3. Managing Cookies', 'akaza-adventure' ); ?></h2>
	<p><?php esc_html_e( 'You can block cookies through your browser settings, though disabling essential cookies may limit website functionality.', 'akaza-adventure' ); ?></p>
	<p><?php esc_html_e( 'Most browsers allow you to view, delete, or block cookies for individual sites. Refer to your browser help documentation for instructions.', 'akaza-adventure' ); ?></p>
</section>

<section id="contact-us" class="sl-legal-section">
	<h2><?php esc_html_e( '4. Contact Us', 'akaza-adventure' ); ?></h2>
	<p><?php esc_html_e( 'If you have questions about this Cookie Policy, contact us at:', 'akaza-adventure' ); ?></p>
	<address class="sl-legal-address">
		<strong><?php esc_html_e( 'Succeed Technologies Pvt Ltd', 'akaza-adventure' ); ?></strong><br />
		<a href="mailto:info@succeedtech.com">info@succeedtech.com</a>
	</address>
</section>
