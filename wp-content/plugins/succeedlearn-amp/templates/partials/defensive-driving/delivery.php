<?php
/**
 * Defensive Driving AMP — Delivery section.
 *
 * Expected vars: $delivery_cards
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section sl-section--alt">
	<div class="sl-wrap">
		<div class="sl-dd-section-head">
			<span class="sl-dd-section-head__eyebrow"><?php esc_html_e( 'Deliver with SucceedLEARN', 'succeedlearn-amp' ); ?></span>
			<h2>
				<?php esc_html_e( 'Simple to deploy. Easy to track. Built to', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'scale.', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p><?php esc_html_e( 'Deliver through SucceedLEARN or your compatible LMS.', 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-dd-delivery-grid">
			<?php foreach ( $delivery_cards as $card ) : ?>
				<article class="sl-dd-delivery-card">
					<div class="sl-dd-delivery-card__icon" aria-hidden="true"><?php echo esc_html( $card['icon'] ); ?></div>
					<h3><?php echo esc_html( $card['title'] ); ?></h3>
					<p><?php echo esc_html( $card['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
