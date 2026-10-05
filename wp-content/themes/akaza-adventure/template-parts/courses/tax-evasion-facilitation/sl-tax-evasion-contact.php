<?php
/**
 * Preventing the Facilitation of Tax Evasion — Contact / Demo.
 *
 * Uses the global `.sl-contact` layout (sl-global-contact.css).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$form_title = __( 'Explore Preventing Facilitation of Tax Evasion Training', 'akaza-adventure' );

$form_shortcode = sprintf(
	'[contact_form form_variant="course" title="%s"]',
	esc_attr( $form_title )
);
?>

<section
	id="contact"
	class="sl-contact sl-contact--on-soft sl-tax-evasion-contact"
	aria-labelledby="sl-tax-evasion-contact-title"
>
	<div class="container">

		<div class="sl-contact__grid">

			<div class="sl-contact__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Preventing the Facilitation of Tax Evasion', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-tax-evasion-contact-title">
					<?php esc_html_e( 'Explore Preventing Facilitation of Tax Evasion Training for Your', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Organisation', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-contact__copy">

					<p>
						<?php esc_html_e( 'Tell us a little about your organisation and training needs. This form can be connected to your preferred CRM or enquiry workflow during implementation.', 'akaza-adventure' ); ?>
					</p>

				</div>

				<div class="sl-contact__actions">

					<a
						class="sl-contact-btn sl-contact-btn--email"
						href="mailto:connect@succeedtech.com"
					>
						<span class="sl-contact-btn__stack">
							<span class="sl-contact-btn__label">
								<?php esc_html_e( 'Email us', 'akaza-adventure' ); ?>
							</span>

							<span class="sl-contact-btn__value">
								connect@succeedtech.com
							</span>
						</span>
					</a>

				</div>

			</div>

			<div class="sl-contact__form-panel">

				<div class="sl-home-form-wrapper sl-home-form-wrapper--slim">

					<?php
					if ( shortcode_exists( 'contact_form' ) ) {
						echo do_shortcode( $form_shortcode ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					} elseif ( shortcode_exists( 'succeedlearn_course_form' ) ) {
						echo do_shortcode(
							sprintf(
								'[succeedlearn_course_form title="%s"]',
								esc_attr( $form_title )
							)
						); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
					?>

				</div>

			</div>

		</div>

	</div>
</section>
