<?php
/**
 * Whistleblowing PE/VC AMP: Get Started CTA.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="buy" class="sl-section sl-aml-pe-vc-cta" aria-labelledby="sl-whistleblowing-pe-vc-cta-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'SucceedLEARN Whistleblowing Training', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whistleblowing-pe-vc-cta-title" class="sl-h2">
				<?php esc_html_e( 'Are You Ready to Strengthen Speak-Up Awareness?', 'succeedlearn-amp' ); ?>
			</h2>
		</div>

		<p class="sl-aml-lead">
			<?php esc_html_e( 'Give your teams practical whistleblowing awareness built around the situations and conduct risks they may encounter.', 'succeedlearn-amp' ); ?>
		</p>

		<div class="sl-content-actions">
			<button
				type="button"
				class="sl-content-btn sl-content-btn-primary"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Buy the Course', 'succeedlearn-amp' ); ?>
			</button>
		</div>
	</div>
</section>
