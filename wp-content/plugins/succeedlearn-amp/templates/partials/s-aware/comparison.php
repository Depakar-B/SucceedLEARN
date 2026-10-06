<?php
/**
 * S-Aware AMP — Comparison table (scrollable).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = succeedlearn_amp_get_sa_comparison_items();
?>
<section class="sl-saware-comparison" aria-labelledby="sl-saware-comparison-title">
	<div class="sl-wrap">
		<div class="sl-saware-comparison__heading">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'A Different Approach to Security Awareness', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-saware-comparison-title" class="sl-h2">
				<?php esc_html_e( 'Traditional Awareness vs', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( "SucceedLEARN's Security Awareness Training", 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>
		<div class="sl-saware-comparison__table-wrap">
			<table class="sl-saware-comparison__table">
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Traditional Awareness', 'succeedlearn-amp' ); ?></th>
						<th scope="col" class="sl-saware-comparison__saware-head"><?php esc_html_e( 'S-Aware', 'succeedlearn-amp' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $items as $row ) : ?>
						<tr>
							<td><?php echo esc_html( $row['traditional'] ); ?></td>
							<td class="sl-saware-comparison__saware-cell"><?php echo esc_html( $row['saware'] ); ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
