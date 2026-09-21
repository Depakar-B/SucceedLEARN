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

$whatsapp_url = 'https://wa.me/916362021778';
$phone_label  = '+91 63620 21778';

$form_title    = __( 'Buy the Course', 'akaza-adventure' );
$form_shortcode = sprintf(
	'[contact_form form_variant="course" title="%s"]',
	esc_attr( $form_title )
);
?>

<section
	id="contact"
	class="sl-contact sl-contact--on-soft sl-political-donations-contact"
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

					<a
						class="sl-contact-btn sl-contact-btn--whatsapp"
						href="<?php echo esc_url( $whatsapp_url ); ?>"
						target="_blank"
						rel="noopener noreferrer"
						aria-label="<?php echo esc_attr( sprintf( __( 'Chat on WhatsApp at %s', 'akaza-adventure' ), $phone_label ) ); ?>"
					>
						<span class="sl-contact-btn__icon" aria-hidden="true">
							<svg
								width="24"
								height="24"
								viewBox="0 0 24 24"
								fill="none"
								xmlns="http://www.w3.org/2000/svg"
							>
								<path
									d="M20.52 3.48A11.87 11.87 0 0 0 12.06 0C5.5 0 .16 5.34.16 11.91c0 2.1.55 4.15 1.59 5.96L0 24l6.27-1.64a11.88 11.88 0 0 0 5.79 1.48h.01c6.56 0 11.9-5.34 11.9-11.91 0-3.18-1.24-6.17-3.45-8.45ZM12.07 21.8h-.01a9.86 9.86 0 0 1-5.03-1.38l-.36-.21-3.72.97.99-3.63-.23-.37a9.87 9.87 0 1 1 8.36 4.62Zm5.42-7.39c-.3-.15-1.77-.87-2.05-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.95 1.17-.17.2-.35.22-.65.07-.3-.15-1.25-.46-2.38-1.47-.88-.78-1.48-1.74-1.65-2.04-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.8.37-.27.3-1.04 1.02-1.04 2.49 0 1.47 1.07 2.89 1.22 3.09.15.2 2.1 3.21 5.09 4.5.71.31 1.27.49 1.7.63.72.23 1.37.2 1.89.12.58-.09 1.77-.72 2.02-1.42.25-.7.25-1.3.17-1.42-.07-.12-.27-.2-.57-.35Z"
									fill="currentColor"
								/>
							</svg>
						</span>

						<span class="sl-contact-btn__stack">
							<span class="sl-contact-btn__label">
								<?php esc_html_e( 'WhatsApp us', 'akaza-adventure' ); ?>
							</span>

							<span class="sl-contact-btn__value">
								<?php echo esc_html( $phone_label ); ?>
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