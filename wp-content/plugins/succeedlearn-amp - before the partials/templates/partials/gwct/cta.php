<?php
/**
 * GWCT AMP — CTA band section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section sl-section--alt">
	<div class="sl-wrap sl-gwct-cta-panel">
		<h2 class="sl-h2"><?php esc_html_e( 'Ready to Build a Better Workplace?', 'succeedlearn-amp' ); ?></h2>
		<p class="sl-lead"><?php esc_html_e( 'Whether you’re strengthening workplace inclusion, delivering harassment prevention training, or preparing your workforce for responsible AI adoption, SucceedLEARN is ready to help.', 'succeedlearn-amp' ); ?></p>
		<div class="sl-cta-buttons">
			<button type="button" class="sl-btn sl-btn--primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?></button>
			<button type="button" class="sl-btn sl-btn--secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Talk to Our Team', 'succeedlearn-amp' ); ?></button>
		</div>
	</div>
</section>
