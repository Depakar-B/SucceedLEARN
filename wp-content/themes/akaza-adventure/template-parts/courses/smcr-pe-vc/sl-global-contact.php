<?php
/**
 * SMCR Training — Course Enquiry / Contact.
 *
 * Uses the global `.sl-contact` layout and adds
 * course-specific information cards on the left.
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
	class="sl-contact sl-contact--on-soft sl-smcr-contact"
	aria-labelledby="sl-smcr-contact-title"
>
	<div class="container">

		<div class="sl-contact__grid">

			<div class="sl-contact__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Course Enquiry', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-smcr-contact-title">
					<?php esc_html_e( 'Enquire About SucceedLEARN SMCR Training for Your', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Organisation', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-contact__copy">
					<p>
						<?php esc_html_e( 'Tell us which SMCR course you are interested in and share your organisation’s training requirements.', 'akaza-adventure' ); ?>
					</p>
				</div>

				<div class="sl-smcr-contact__courses">

					<article class="sl-smcr-contact__course-card">
						<span class="sl-smcr-contact__course-label">
							<?php esc_html_e( 'Employees Course', 'akaza-adventure' ); ?>
						</span>

						<h3 class="sl-panel-title">
							<?php esc_html_e( 'Employees Course', 'akaza-adventure' ); ?>
						</h3>

						<p>
							<?php esc_html_e( 'Conduct Rules, PE/VC scenarios, attestation and escalation.', 'akaza-adventure' ); ?>
						</p>
					</article>

					<article class="sl-smcr-contact__course-card">
						<span class="sl-smcr-contact__course-label">
							<?php esc_html_e( 'Senior Managers Course', 'akaza-adventure' ); ?>
						</span>

						<h3 class="sl-panel-title">
							<?php esc_html_e( 'Senior Managers Course', 'akaza-adventure' ); ?>
						</h3>

						<p>
							<?php esc_html_e( 'Reasonable steps, responsibility, delegation and oversight.', 'akaza-adventure' ); ?>
						</p>
					</article>

					<article class="sl-smcr-contact__course-card">
						<span class="sl-smcr-contact__course-label">
							<?php esc_html_e( 'Combined Learning', 'akaza-adventure' ); ?>
						</span>

						<h3 class="sl-panel-title">
							<?php esc_html_e( 'Both Courses', 'akaza-adventure' ); ?>
						</h3>

						<p>
							<?php esc_html_e( 'Build a connected learning pathway across different levels of responsibility.', 'akaza-adventure' ); ?>
						</p>
					</article>

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
							<!-- Existing global WhatsApp SVG -->
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