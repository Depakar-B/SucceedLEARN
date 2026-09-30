<?php
/**
 * S-Play AMP — Traditional vs S-Play comparison.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$comparison_items = function_exists( 'succeedlearn_amp_get_sp_comparison_items' )
	? succeedlearn_amp_get_sp_comparison_items()
	: array();

if ( empty( $comparison_items ) ) {
	return;
}
?>
<section class="sl-s-play-comparison" aria-labelledby="sl-s-play-comparison-title">
	<div class="sl-wrap">
		<div class="sl-s-play-comparison__heading">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'A Better Way to Engage', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-s-play-comparison-title" class="sl-h2">
				<?php esc_html_e( 'Traditional Security Awareness Vs', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'S-Play, CyberSecurity Gamified learning', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>
		<div class="sl-s-play-comparison__table-wrap">
			<table class="sl-s-play-comparison__table">
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Traditional Approach', 'succeedlearn-amp' ); ?></th>
						<th scope="col"><?php esc_html_e( 'S-Play Gamified Learning', 'succeedlearn-amp' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $comparison_items as $item ) : ?>
						<tr>
							<td>
								<span class="sl-s-play-comparison__cell"><?php echo esc_html( $item['traditional'] ); ?></span>
							</td>
							<td>
								<span class="sl-s-play-comparison__cell sl-s-play-comparison__cell--highlight"><?php echo esc_html( $item['s_play'] ); ?></span>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
