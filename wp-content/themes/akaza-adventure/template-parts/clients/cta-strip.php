<?php
/**
 * Clients page — contact CTA strip.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact_url = function_exists( 'akaza_page_url' ) ? akaza_page_url( 'contact-us' ) : home_url( '/contact-us/' );
?>
<section class="sl-clients-cta" aria-labelledby="sl-clients-cta-title">
	<div class="sl-clients-cta__container">
		<h2 id="sl-clients-cta-title" class="sl-clients-cta__title">
			<?php esc_html_e( 'Ready to join them?', 'akaza-adventure' ); ?>
		</h2>
		<p class="sl-clients-cta__lead">
			<?php esc_html_e( 'Talk to our team about compliance training that scales with your organisation.', 'akaza-adventure' ); ?>
		</p>
		<a href="<?php echo esc_url( $contact_url ); ?>" class="sl-content-btn sl-content-btn-primary" data-cta="clients-contact">
			<?php esc_html_e( 'Talk to Us', 'akaza-adventure' ); ?>
		</a>
	</div>
</section>
