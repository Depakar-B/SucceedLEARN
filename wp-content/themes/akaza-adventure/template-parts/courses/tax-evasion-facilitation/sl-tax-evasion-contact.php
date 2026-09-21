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

$whatsapp_url = 'https://wa.me/916362021778';
$phone_label  = '+91 63620 21778';

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
								viewBox="0 0 24 24"
								width="22"
								height="22"
								xmlns="http://www.w3.org/2000/svg"
								focusable="false"
							>
								<path
									fill="currentColor"
									d="M20.52 3.48A11.86 11.86 0 0 0 12.07 0C5.52 0 .19 5.33.19 11.88c0 2.09.55 4.13 1.59 5.92L.12 24l6.34-1.63a11.85 11.85 0 0 0 5.61 1.42h.01c6.55 0 11.88-5.33 11.88-11.88 0-3.17-1.23-6.15-3.44-8.43ZM12.08 21.8h-.01a9.87 9.87 0 0 1-5.03-1.38l-.36-.21-3.76.97 1-3.66-.23-.38a9.88 9.88 0 0 1-1.52-5.26C2.17 6.43 6.61 2 12.08 2a9.82 9.82 0 0 1 7 2.91 9.86 9.86 0 0 1 2.9 7c0 5.47-4.44 9.89-9.9 9.89Zm5.42-7.4c-.3-.15-1.77-.87-2.04-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.95 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.47-.89-.79-1.49-1.77-1.66-2.07-.17-.3-.02-.46.13-.61.14-.14.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.61-.92-2.2-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.49s1.07 2.89 1.22 3.09c.15.2 2.1 3.21 5.08 4.5.71.31 1.27.49 1.7.63.71.23 1.35.2 1.86.12.57-.08 1.77-.72 2.02-1.42.25-.7.25-1.3.17-1.42-.07-.12-.27-.2-.57-.35Z"
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