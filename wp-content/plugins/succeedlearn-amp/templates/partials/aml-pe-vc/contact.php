<?php
/**
 * AML PE/VC AMP: Contact / Request a Demo.
 *
 * Expected vars: $page_title, $canonical
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="contact" class="sl-section sl-aml-pe-vc-contact" aria-labelledby="sl-aml-pe-vc-contact-title">
	<div class="sl-wrap sl-contact-layout">
		<div class="sl-contact-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-aml-pe-vc-contact-title" class="sl-h2">
				<?php esc_html_e( 'Request an AML Training Demo for PE/VC Teams', 'succeedlearn-amp' ); ?>
			</h2>

			<div class="sl-aml-copy">
				<p>
					<?php esc_html_e( 'Tell us about your organisation and training requirements to explore individual AML purchase, SCORM delivery or wider PE/VC and Financial Crime Prevention suites.', 'succeedlearn-amp' ); ?>
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
						'form_variant'  => 'fcp',
						'title'         => __( 'Request a Demo', 'succeedlearn-amp' ),
						'echo'          => true,
					)
				);
			} else {
				echo do_shortcode( '[contact_form form_variant="fcp" title="Request a Demo"]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			?>
		</div>
	</div>
</section>
