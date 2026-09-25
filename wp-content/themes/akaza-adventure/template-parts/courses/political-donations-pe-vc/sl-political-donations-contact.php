<?php
/**
 * Political Donations Training — Contact / Buy Course.
 *
 * Uses global `.sl-contact` layout (sl-global-contact.css).
 * Left: content + contact actions | Right: form
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$form_title     = __( 'Buy the Course', 'akaza-adventure' );
$form_shortcode = sprintf(
	'[contact_form form_variant="course" title="%s"]',
	esc_attr( $form_title )
);
?>

<section
	id="contact"
	class="sl-contact sl-contact--on-white sl-political-donations-contact"
	aria-labelledby="sl-political-donations-contact-title"
>
	<div class="container">

		<div class="sl-contact__grid">

			<div class="sl-contact__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Get started', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-political-donations-contact-title">
					<?php esc_html_e( 'Buy Political Donations Compliance Training for', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Your Team', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-contact__copy">

					<p>
						<?php esc_html_e( 'Give your investment professionals practical training on political contribution risk, anti-bribery considerations and cross-border compliance.', 'akaza-adventure' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'Complete the form to discuss your organisation\'s course requirements.', 'akaza-adventure' ); ?>
					</p>

				</div>

				<div class="sl-contact__actions">

					<a
						class="sl-contact-btn sl-contact-btn--email"
						href="mailto:info@succeedtech.com"
					>
						<span class="sl-contact-btn__stack">
							<span class="sl-contact-btn__label">
								<?php esc_html_e( 'Email us', 'akaza-adventure' ); ?>
							</span>

							<span class="sl-contact-btn__value">
								info@succeedtech.com
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
