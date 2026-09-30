<?php
/**
 * S-Play AMP — Designed Around Active Participation.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$participation_items = function_exists( 'succeedlearn_amp_get_sp_benefits' )
	? succeedlearn_amp_get_sp_benefits()
	: array();

if ( empty( $participation_items ) ) {
	return;
}
?>
<section class="sl-s-play-benefits" aria-labelledby="sl-s-play-benefits-title">
	<div class="sl-wrap">
		<div class="sl-s-play-benefits__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Active Learning', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-s-play-benefits-title" class="sl-h2">
				<?php esc_html_e( 'Designed Around', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Active Participation', 'succeedlearn-amp' ); ?></span>
			</h2>
			<h3 class="sl-s-play-benefits__subtitle">
				<?php esc_html_e( "Employees Don't Just Consume the Learning. They Interact With It.", 'succeedlearn-amp' ); ?>
			</h3>
			<p><?php esc_html_e( 'S-Play uses different game mechanics to create active learning experiences around cybersecurity.', 'succeedlearn-amp' ); ?></p>
		</div>
		<div class="sl-s-play-benefits__cards sl-amp-card-grid">
			<?php foreach ( $participation_items as $index => $item ) : ?>
				<article class="sl-s-play-benefits__card">
					<span class="sl-s-play-benefits__number" aria-hidden="true">
						<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</span>
					<h3 class="sl-panel-title"><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
