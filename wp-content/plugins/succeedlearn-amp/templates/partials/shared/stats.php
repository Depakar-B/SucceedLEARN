<?php
/**
 * Shared AMP — Homepage-style stats band.
 *
 * Expected vars: $stats (optional)
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $stats ) ) {
	require_once SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'data/clients.php';
	$stats = succeedlearn_amp_get_home_stats();
}
?>
<section class="sl-section sl-section--alt">
	<div class="sl-wrap sl-grid-4 sl-stats">
		<?php foreach ( $stats as $stat ) : ?>
			<div class="sl-stat">
				<p class="sl-stat__value"><?php echo esc_html( $stat[0] ); ?></p>
				<p class="sl-stat__label"><?php echo esc_html( $stat[1] ); ?></p>
			</div>
		<?php endforeach; ?>
	</div>
</section>
