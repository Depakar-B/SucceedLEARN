<?php
/**
 * Whistleblowing PE/VC AMP: Course Enquiry.
 *
 * Expected vars: $page_title, $canonical
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="contact" class="sl-section sl-aml-pe-vc-contact" aria-labelledby="sl-whistleblowing-pe-vc-contact-title">
	<div class="sl-wrap sl-contact-layout">
		<div class="sl-contact-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Course Enquiry', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whistleblowing-pe-vc-contact-title" class="sl-h2">
				<?php esc_html_e( 'Would You Like to Enquire About This Whistleblowing Course?', 'succeedlearn-amp' ); ?>
			</h2>

			<div class="sl-aml-copy">
				<p>
					<?php esc_html_e( 'Tell us about your organisation and your training requirements.', 'succeedlearn-amp' ); ?>
				</p>
			</div>

			<div class="sl-contact-actions">
				<a class="sl-contact-btn sl-contact-btn--email" href="mailto:connect@succeedtech.com">
					<span class="sl-contact-btn__stack">
						<span class="sl-contact-btn__label"><?php esc_html_e( 'Email us', 'succeedlearn-amp' ); ?></span>
						<span class="sl-contact-btn__value">connect@succeedtech.com</span>
					</span>
				</a>
			</div>
		</div>

		<div class="sl-contact-form-card">
			<?php
			if ( function_exists( 'succeedlearn_amp_render_contact_form' ) ) {
				succeedlearn_amp_render_contact_form(
					array(
						'form_page'     => $page_title,
						'form_page_url' => $canonical,
						'form_variant'  => 'course',
						'title'         => __( 'Course Enquiry', 'succeedlearn-amp' ),
						'echo'          => true,
					)
				);
			} else {
				echo do_shortcode( '[contact_form form_variant="course" title="Course Enquiry"]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			?>
		</div>
	</div>
</section>
