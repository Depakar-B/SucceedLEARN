<?php
/**
 * Contact Us AMP — Contact form section.
 *
 * Expected vars: $page_title, $canonical
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section" id="contact">
	<div class="sl-wrap sl-contact-layout">
		<div class="sl-contact-intro">
			<p class="sl-eyebrow"><?php esc_html_e( 'Get Your Personalized Demo', 'succeedlearn-amp' ); ?></p>
			<h2 class="sl-h2"><?php esc_html_e( 'Need Help or Have a Query?', 'succeedlearn-amp' ); ?></h2>
			<p class="sl-lead"><?php esc_html_e( "Tell us a bit about your organisation and we'll show you exactly how SucceedLEARN reduces risk, simplifies compliance, and drives measurable behaviour change — for your team.", 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-contact-form-card">
			<?php
			// Contact Us keeps the default form (includes Interested In).
			if ( function_exists( 'succeedlearn_amp_render_contact_form' ) ) {
				succeedlearn_amp_render_contact_form(
					array(
						'form_page'     => $page_title,
						'form_page_url' => $canonical,
						'form_variant'  => 'default',
						'echo'          => true,
					)
				);
			} else {
				echo do_shortcode( '[contact_form]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			?>
		</div>
	</div>
</section>
