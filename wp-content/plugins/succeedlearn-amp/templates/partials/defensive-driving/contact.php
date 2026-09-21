<?php
/**
 * Defensive Driving AMP — Contact / demo section.
 *
 * Expected vars: $page_title, $canonical
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section" id="contact">
	<div class="sl-wrap sl-contact-layout">
		<div class="sl-contact-intro">
			<p class="sl-eyebrow"><?php esc_html_e( 'Talk to our team', 'succeedlearn-amp' ); ?></p>
			<h2 class="sl-h2"><?php esc_html_e( 'See how defensive driving training works for your workforce', 'succeedlearn-amp' ); ?></h2>
			<p class="sl-lead"><?php esc_html_e( 'Book a short demo and we will walk you through the course experience, deployment options, localisation, and how completion and assessment records can support your fleet or EHS programme.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-gwct-contact-direct">
				<p class="sl-gwct-contact-direct__label"><?php esc_html_e( 'Prefer to reach us directly?', 'succeedlearn-amp' ); ?></p>
				<a href="mailto:info@succeedtech.com">
					<span class="sl-gwct-contact-direct__body">
						<span class="sl-gwct-contact-direct__title"><?php esc_html_e( 'Email us', 'succeedlearn-amp' ); ?></span>
						<span class="sl-gwct-contact-direct__value">info@succeedtech.com</span>
					</span>
				</a>
				<a href="tel:+916362021778">
					<span class="sl-gwct-contact-direct__body">
						<span class="sl-gwct-contact-direct__title"><?php esc_html_e( 'Call us', 'succeedlearn-amp' ); ?></span>
						<span class="sl-gwct-contact-direct__value">+91 63620 21778</span>
					</span>
				</a>
			</div>
		</div>
		<div class="sl-contact-form-card">
			<?php
			// Landing / course pages use the slim course variant (no Interested In).
			if ( function_exists( 'succeedlearn_amp_render_contact_form' ) ) {
				succeedlearn_amp_render_contact_form(
					array(
						'form_page'     => $page_title,
						'form_page_url' => $canonical,
						'form_variant'  => 'course',
						'title'         => __( 'Request a Demo', 'succeedlearn-amp' ),
						'echo'          => true,
					)
				);
			} else {
				echo do_shortcode( '[contact_form form_variant="course" title="Request a Demo"]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			?>
		</div>
	</div>
</section>
