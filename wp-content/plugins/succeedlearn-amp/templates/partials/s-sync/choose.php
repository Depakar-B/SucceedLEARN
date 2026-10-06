<?php
/**
 * S-Sync AMP — Benefits of S-Sync.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$reasons = function_exists( 'succeedlearn_amp_get_ssync_choose_items' )
	? succeedlearn_amp_get_ssync_choose_items()
	: array();

if ( empty( $reasons ) ) {
	return;
}
?>
<section class="sl-s-sync-choose" aria-labelledby="sl-s-sync-choose-title">
	<div class="sl-wrap">
		<div class="sl-s-sync-choose__intro">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Why Choose S-Sync', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-s-sync-choose-title" class="sl-h2">
				<?php esc_html_e( 'Benefits of', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'S-Sync', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>
		<div class="sl-s-sync-choose__grid sl-amp-card-grid">
			<?php foreach ( $reasons as $reason ) : ?>
				<article class="sl-s-sync-choose__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $reason['title'] ); ?></h3>
					<p><?php echo esc_html( $reason['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
