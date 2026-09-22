<?php
/**
 * S-Play — Seamless Delivery.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$delivery_items = array(
	__( 'Available via SucceedLEARN LMS or as SCORM packages', 'akaza-adventure' ),
	__( 'Can be integrated into campaigns or used as standalone reinforcement', 'akaza-adventure' ),
	__( 'Trackable through S-Metrics dashboard', 'akaza-adventure' ),
);
?>

<section
	class="sl-s-play-delivery"
	aria-labelledby="sl-s-play-delivery-title"
>
	<div class="container">

		<div class="sl-s-play-delivery__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Flexible Deployment', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-play-delivery-title">
				<?php esc_html_e( 'Seamless', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Delivery', 'akaza-adventure' ); ?></span>
			</h2>

		</div>

		<ul class="sl-list sl-s-play-delivery__list">

			<?php foreach ( $delivery_items as $index => $item ) : ?>

				<li class="sl-list-item">
					<span class="sl-list-item__label" aria-hidden="true">
						<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</span>
					<span class="sl-list-item__text">
						<?php echo esc_html( $item ); ?>
					</span>
				</li>

			<?php endforeach; ?>

		</ul>

	</div>
</section>
