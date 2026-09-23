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

$whatsapp_url = 'https://wa.me/916362021778';

$form_title     = __( 'Request a Demo', 'akaza-adventure' );
$form_shortcode = sprintf(
	'[contact_form form_variant="course" title="%s"]',
	esc_attr( $form_title )
);
?>

<section
	id="contact"
	class="sl-contact sl-contact--on-soft sl-aml-pe-vc-contact"
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

					<a
						class="sl-contact-btn sl-contact-btn--whatsapp"
						href="<?php echo esc_url( $whatsapp_url ); ?>"
						target="_blank"
						rel="noopener noreferrer"
						aria-label="<?php esc_attr_e( 'Chat on WhatsApp', 'akaza-adventure' ); ?>"
					>
						<span class="sl-contact-btn__icon" aria-hidden="true">
							<svg
								width="22"
								height="22"
								viewBox="0 0 24 24"
								fill="currentColor"
								xmlns="http://www.w3.org/2000/svg"
							>
								<path d="M20.52 3.48A11.83 11.83 0 0 0 12.08 0C5.55 0 .24 5.31.24 11.84c0 2.09.55 4.13 1.59 5.93L.14 24l6.38-1.67a11.82 11.82 0 0 0 5.56 1.42h.01c6.53 0 11.84-5.31 11.84-11.84 0-3.17-1.23-6.15-3.41-8.43ZM12.09 21.72h-.01a9.84 9.84 0 0 1-5.02-1.37l-.36-.21-3.79.99 1.01-3.69-.23-.38a9.84 9.84 0 0 1-1.51-5.22C2.18 6.4 6.62 1.96 12.09 1.96c2.65 0 5.14 1.03 7.01 2.9a9.84 9.84 0 0 1 2.9 7.01c0 5.47-4.45 9.85-9.91 9.85Zm5.41-7.38c-.3-.15-1.77-.87-2.04-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.27-.47-2.42-1.5-.9-.8-1.51-1.79-1.69-2.09-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.49s1.07 2.89 1.22 3.09c.15.2 2.1 3.2 5.09 4.49.71.31 1.27.49 1.71.63.72.23 1.38.2 1.9.12.58-.09 1.77-.72 2.02-1.42.25-.7.25-1.3.17-1.42-.07-.12-.27-.2-.57-.35Z"/>
							</svg>
						</span>

						<span class="sl-contact-btn__label">
							<?php esc_html_e( 'WhatsApp us', 'akaza-adventure' ); ?>
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
