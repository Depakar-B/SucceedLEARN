<?php
/**
 * Financial Crime Prevention — Contact section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$form_title = __( 'Request a Demo', 'akaza-adventure' );
$form_shortcode = sprintf(
	'[contact_form form_variant="course" title="%s"]',
	esc_attr( $form_title )
);
?>

<section class="sl-fcp-contact" id="contact" aria-labelledby="sl-fcp-contact-title">

	<div class="container">

		<div class="sl-fcp-contact__grid">

			<div class="sl-fcp-contact__content">

				<div class="sl-fcp-contact__heading">

					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'Let’s talk', 'akaza-adventure' ); ?>
					</span>

					<h2 id="sl-fcp-contact-title">
						<?php esc_html_e( 'Talk to Us About Financial Crime Prevention Training', 'akaza-adventure' ); ?>
					</h2>

					<p class="sl-fcp-contact__lead">
						<?php esc_html_e( 'Help your employees recognise financial crime risks, understand their responsibilities and make better compliance decisions in everyday work.', 'akaza-adventure' ); ?>
					</p>

				</div>

				<div class="sl-fcp-contact__body">

					<p>
						<?php esc_html_e( 'Whether you are looking for organisation-wide awareness training, role-relevant learning or a flexible LMS delivery option, our team can help you identify the right approach.', 'akaza-adventure' ); ?>
					</p>

					<p>
						<?php esc_html_e( 'Tell us about your organisation, your training requirements and the areas you would like to cover. We will get back to you to discuss the next steps.', 'akaza-adventure' ); ?>
					</p>

				</div>

				<div class="sl-fcp-contact__details">

					<a
						class="sl-fcp-contact__detail"
						href="mailto:info@succeedtech.com"
					>
						<span class="sl-fcp-contact__detail-label">
							<?php esc_html_e( 'Email us', 'akaza-adventure' ); ?>
						</span>

						<span class="sl-fcp-contact__detail-value">
							info@succeedtech.com
						</span>
					</a>

					<a
						class="sl-fcp-contact__detail"
						href="tel:+916362021778"
					>
						<span class="sl-fcp-contact__detail-label">
							<?php esc_html_e( 'Speak to our team', 'akaza-adventure' ); ?>
						</span>

						<span class="sl-fcp-contact__detail-value">
							+91 63620 21778
						</span>
					</a>

				</div>

			</div>

			<div class="sl-fcp-contact__form-wrap">
				<div class="sl-home-form-wrapper sl-home-form-wrapper--slim">
					<?php
					if ( shortcode_exists( 'contact_form' ) ) {
						echo do_shortcode( $form_shortcode );
					} elseif ( shortcode_exists( 'succeedlearn_course_form' ) ) {
						echo do_shortcode( sprintf( '[succeedlearn_course_form title="%s"]', esc_attr( $form_title ) ) );
					}
					?>
				</div>
			</div>

		</div>

	</div>

</section>
