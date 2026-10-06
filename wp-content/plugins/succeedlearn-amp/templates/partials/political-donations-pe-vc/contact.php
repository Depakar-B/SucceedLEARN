<?php
/**
 * Political Donations PE/VC AMP: Contact / Buy Course.
 *
 * Expected vars: $page_title, $canonical
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="contact" class="sl-section sl-section--alt sl-aml-pe-vc-contact" aria-labelledby="sl-political-donations-pe-vc-contact-title">
	<div class="sl-wrap sl-contact-layout">
		<div class="sl-contact-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Get started', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-political-donations-pe-vc-contact-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Buy Political Donations Compliance Training for <span>Your Team</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<div class="sl-aml-copy">
				<p>
					<?php esc_html_e( 'Give your investment professionals practical training on political contribution risk, anti-bribery considerations and cross-border compliance.', 'succeedlearn-amp' ); ?>
				</p>
				<p>
					<?php esc_html_e( 'Complete the form to discuss your organisation\'s course requirements.', 'succeedlearn-amp' ); ?>
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
						'title'         => __( 'Buy the Course', 'succeedlearn-amp' ),
						'echo'          => true,
					)
				);
			} else {
				echo do_shortcode( '[contact_form form_variant="course" title="Buy the Course"]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			?>
		</div>
	</div>
</section>
