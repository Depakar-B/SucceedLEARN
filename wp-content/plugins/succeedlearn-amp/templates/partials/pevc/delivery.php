<?php
/**
 * PE/VC Suite AMP — Delivery options.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $delivery_options ) || ! is_array( $delivery_options ) ) {
	$delivery_options = succeedlearn_amp_get_pevc_delivery_options();
}
?>
<section id="delivery" class="sl-pevc-delivery" aria-labelledby="sl-pevc-delivery-title">
	<div class="sl-wrap">
		<span class="sl-home-sub-heading">
			<?php esc_html_e( 'Flexible delivery', 'succeedlearn-amp' ); ?>
		</span>

		<h2 id="sl-pevc-delivery-title" class="sl-h2">
			<?php esc_html_e( 'Delivered your way', 'succeedlearn-amp' ); ?>
		</h2>

		<p class="sl-pevc-delivery__lead">
			<?php esc_html_e( 'Choose the approach that works for your firm.', 'succeedlearn-amp' ); ?>
		</p>

		<div class="sl-pevc-delivery__grid sl-amp-card-grid">
			<?php foreach ( $delivery_options as $option ) : ?>
				<article class="sl-pevc-delivery__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $option['title'] ); ?></h3>
					<p><?php echo esc_html( $option['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
