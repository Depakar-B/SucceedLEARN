<?php
/**
 * Defensive Driving AMP — CTA section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section sl-section--alt">
	<div class="sl-wrap sl-dd-cta-panel">
		<p class="sl-eyebrow"><?php esc_html_e( 'Ready to reduce road risk?', 'succeedlearn-amp' ); ?></p>
		<h2 class="sl-h2">
			<?php esc_html_e( 'Build safer drivers -', 'succeedlearn-amp' ); ?>
			<span style="color:var(--sl-page-primary)"><?php esc_html_e( 'one decision at a time.', 'succeedlearn-amp' ); ?></span>
		</h2>
		<p class="sl-lead"><?php esc_html_e( 'Preview the course and see how SucceedLEARN can customise, deploy and track it for your workforce.', 'succeedlearn-amp' ); ?></p>
		<ul class="sl-dd-cta-points">
			<li><?php esc_html_e( 'Course preview', 'succeedlearn-amp' ); ?></li>
			<li><?php esc_html_e( 'Deployment guidance', 'succeedlearn-amp' ); ?></li>
			<li><?php esc_html_e( 'Customisation options', 'succeedlearn-amp' ); ?></li>
		</ul>
		<div class="sl-cta-buttons" style="margin-top:20px">
			<button type="button" class="sl-btn sl-btn--primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Request a course demo', 'succeedlearn-amp' ); ?></button>
		</div>
	</div>
</section>
