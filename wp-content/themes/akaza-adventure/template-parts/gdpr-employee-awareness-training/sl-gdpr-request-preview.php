<?php
/**
 * GDPR Employee Awareness — Request a Preview / Contact.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$form_title     = __( 'Request a Preview', 'akaza-adventure' );
$form_shortcode = sprintf(
	'[contact_form form_variant="course" title="%s"]',
	esc_attr( $form_title )
);
?>

<section
	class="sl-gdpr-request-preview"
	id="contact"
	aria-labelledby="sl-gdpr-request-preview-title"
>
	<div class="container">

		<div class="sl-gdpr-request-preview__grid">

			<!-- Left: Preview information -->
			<div class="sl-gdpr-request-preview__content">

				<div class="sl-gdpr-request-preview__heading">

					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'Request a Preview', 'akaza-adventure' ); ?>
					</span>

					<h2 id="sl-gdpr-request-preview-title">
						<?php esc_html_e( 'See the course before', 'akaza-adventure' ); ?>
						<span><?php esc_html_e( 'you decide.', 'akaza-adventure' ); ?></span>
					</h2>

					<p>
						<?php esc_html_e( 'A guided walkthrough, a sample completion report, and the SCORM and LTI details for your LMS. No obligation.', 'akaza-adventure' ); ?>
					</p>

				</div>

				<ul class="sl-gdpr-request-preview__list">

					<li class="sl-gdpr-request-preview__item">

						<span class="sl-gdpr-request-preview__icon" aria-hidden="true">
							<svg
								viewBox="0 0 24 24"
								width="20"
								height="20"
								fill="none"
								xmlns="http://www.w3.org/2000/svg"
							>
								<circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/>
								<path d="M8.5 12.2L10.8 14.5L15.7 9.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</span>

						<span>
							<?php esc_html_e( 'A full preview of the course', 'akaza-adventure' ); ?>
						</span>

					</li>

					<li class="sl-gdpr-request-preview__item">

						<span class="sl-gdpr-request-preview__icon" aria-hidden="true">
							<svg
								viewBox="0 0 24 24"
								width="20"
								height="20"
								fill="none"
								xmlns="http://www.w3.org/2000/svg"
							>
								<circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/>
								<path d="M8.5 12.2L10.8 14.5L15.7 9.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</span>

						<span>
							<?php esc_html_e( 'The sales & marketing outreach module', 'akaza-adventure' ); ?>
						</span>

					</li>

					<li class="sl-gdpr-request-preview__item">

						<span class="sl-gdpr-request-preview__icon" aria-hidden="true">
							<svg
								viewBox="0 0 24 24"
								width="20"
								height="20"
								fill="none"
								xmlns="http://www.w3.org/2000/svg"
							>
								<circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/>
								<path d="M8.5 12.2L10.8 14.5L15.7 9.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</span>

						<span>
							<?php esc_html_e( 'A sample certificate and completion report', 'akaza-adventure' ); ?>
						</span>

					</li>

					<li class="sl-gdpr-request-preview__item">

						<span class="sl-gdpr-request-preview__icon" aria-hidden="true">
							<svg
								viewBox="0 0 24 24"
								width="20"
								height="20"
								fill="none"
								xmlns="http://www.w3.org/2000/svg"
							>
								<circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/>
								<path d="M8.5 12.2L10.8 14.5L15.7 9.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</span>

						<span>
							<?php esc_html_e( 'SCORM / LTI integration details', 'akaza-adventure' ); ?>
						</span>

					</li>

				</ul>

			</div>


			<!-- Right: Common contact form (course variant) -->
			<div class="sl-gdpr-request-preview__form">

				<div class="sl-gdpr-request-preview__form-inner">
					<div class="sl-home-form-wrapper sl-home-form-wrapper--slim">
						<?php
						if ( shortcode_exists( 'contact_form' ) ) {
							echo do_shortcode( $form_shortcode ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						} elseif ( shortcode_exists( 'succeedlearn_course_form' ) ) {
							echo do_shortcode( sprintf( '[succeedlearn_course_form title="%s"]', esc_attr( $form_title ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						}
						?>
					</div>
				</div>

			</div>

		</div>

	</div>
</section>
