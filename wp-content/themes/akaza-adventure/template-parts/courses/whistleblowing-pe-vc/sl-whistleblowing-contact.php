<?php
/**
 * Whistleblowing Training — Course Enquiry.
 *
 * Uses the global `.sl-contact` layout and global contact CSS.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$whatsapp_url = 'https://wa.me/916362021778';
$phone_label  = '+91 63620 21778';

$form_title = __( 'Course Enquiry', 'akaza-adventure' );

$form_shortcode = sprintf(
	'[contact_form form_variant="course" title="%s"]',
	esc_attr( $form_title )
);
?>

<section
	id="contact"
	class="sl-contact sl-contact--on-soft sl-whistleblowing-contact"
	aria-labelledby="sl-whistleblowing-contact-title"
>
	<div class="container">
		<div class="sl-contact__grid">

			<!-- Left: Enquiry content -->
			<div class="sl-contact__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Course Enquiry', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-whistleblowing-contact-title">
					<?php esc_html_e( 'Would You Like to Enquire About This Whistleblowing', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Course?', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-contact__copy">
					<p>
						<?php esc_html_e( 'Tell us about your organisation and your training requirements.', 'akaza-adventure' ); ?>
					</p>
				</div>

				<!-- Global contact actions -->
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
								fill="currentColor"
								xmlns="http://www.w3.org/2000/svg"
							>
								<path d="M20.52 3.48A11.78 11.78 0 0 0 12.06 0C5.55 0 .25 5.3.25 11.81c0 2.08.54 4.11 1.56 5.9L.16 24l6.44-1.69a11.8 11.8 0 0 0 5.46 1.34h.01c6.51 0 11.81-5.3 11.81-11.81 0-3.16-1.23-6.13-3.36-8.36ZM12.07 21.65h-.01a9.8 9.8 0 0 1-5-1.37l-.36-.21-3.82 1 1.02-3.72-.23-.38a9.8 9.8 0 1 1 8.4 4.68Zm5.38-7.34c-.29-.15-1.7-.84-1.96-.94-.26-.1-.45-.15-.64.15-.19.29-.74.94-.91 1.13-.17.19-.34.22-.63.07-.29-.15-1.21-.45-2.3-1.43-.85-.76-1.43-1.7-1.6-1.99-.17-.29-.02-.45.13-.6.13-.13.29-.34.44-.51.15-.17.19-.29.29-.49.1-.19.05-.36-.02-.51-.07-.15-.64-1.55-.88-2.13-.23-.56-.47-.49-.64-.5h-.55c-.19 0-.51.07-.78.36-.27.29-1.02 1-1.02 2.44s1.05 2.83 1.2 3.02c.15.19 2.06 3.14 4.99 4.4.7.3 1.24.48 1.66.61.7.22 1.34.19 1.84.12.56-.08 1.7-.7 1.94-1.37.24-.67.24-1.24.17-1.37-.07-.12-.26-.19-.55-.34Z"/>
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

			<!-- Right: Global enquiry form -->
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