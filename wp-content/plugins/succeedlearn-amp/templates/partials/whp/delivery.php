<?php
/**
 * WHP AMP: Flexible delivery for your workforce.
 *
 * Expected vars: $delivery_options
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="flexible-delivery" class="sl-section sl-section--alt sl-whp-delivery" aria-labelledby="sl-whp-delivery-title">
	<div class="sl-wrap">
		<div class="sl-whp-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Flexible Learning Delivery', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-whp-delivery-title" class="sl-h2">
				<?php esc_html_e( 'Flexible delivery for your', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'workforce', 'succeedlearn-amp' ); ?></span>
			</h2>

			<p><?php esc_html_e( 'Deliver training through the arrangement that best fits your learning environment.', 'succeedlearn-amp' ); ?></p>
		</div>

		<div class="sl-whp-cards sl-whp-cards--grid">
			<?php foreach ( $delivery_options as $option ) : ?>
				<article class="sl-whp-card">
					<h3 class="sl-panel-title"><?php echo esc_html( $option['title'] ); ?></h3>
					<p><?php echo esc_html( $option['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-content-actions">
			<button
				type="button"
				class="sl-content-btn sl-content-btn-primary"
				<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			>
				<?php esc_html_e( 'Request Delivery Details', 'succeedlearn-amp' ); ?>
				<span aria-hidden="true">→</span>
			</button>
		</div>
	</div>
</section>
