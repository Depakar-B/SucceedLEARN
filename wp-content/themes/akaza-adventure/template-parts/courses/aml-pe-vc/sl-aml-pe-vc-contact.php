<?php
/**
 * AML PE/VC — Contact / Request a Demo.
 *
 * Uses global `.sl-contact` layout (sl-global-contact.css).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$form_title     = __( 'Request a Demo', 'akaza-adventure' );
$form_shortcode = sprintf(
	'[contact_form form_variant="course" title="%s"]',
	esc_attr( $form_title )
);
?>

<section
	id="contact"
	class="sl-contact sl-contact--on-white sl-aml-pe-vc-contact"
	aria-labelledby="sl-aml-pe-vc-contact-title"
>
	<div class="container">
		<div class="sl-contact__grid">

			<div class="sl-contact__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-aml-pe-vc-contact-title">
					<?php esc_html_e( 'Request an AML Training Demo for PE/VC Teams', 'akaza-adventure' ); ?>
				</h2>

				<div class="sl-contact__copy">
					<p>
						<?php
						esc_html_e(
							'Tell us about your organisation and training requirements to explore individual AML purchase, SCORM delivery or wider PE/VC and Financial Crime Prevention suites.',
							'akaza-adventure'
						);
						?>
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
								<?php esc_html_e( 'connect@succeedtech.com', 'akaza-adventure' ); ?>
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
