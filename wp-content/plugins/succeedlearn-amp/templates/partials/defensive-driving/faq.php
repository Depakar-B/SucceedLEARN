<?php
/**
 * Defensive Driving AMP — FAQ section.
 *
 * Expected vars: $faq_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section">
	<div class="sl-wrap">
		<div class="sl-dd-section-head">
			<span class="sl-dd-section-head__eyebrow"><?php esc_html_e( 'Frequently asked questions', 'succeedlearn-amp' ); ?></span>
			<h2>
				<?php esc_html_e( 'What employers ask about', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'defensive driving training', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'Clear answers for HR, fleet, EHS and compliance teams.', 'succeedlearn-amp' ); ?></p>
		</div>
		<?php succeedlearn_amp_render_faq_accordion( $faq_items ); ?>
		<p style="margin-top:18px">
			<button type="button" class="sl-btn sl-btn--secondary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Still have a question? Talk to us', 'succeedlearn-amp' ); ?></button>
		</p>
	</div>
</section>
