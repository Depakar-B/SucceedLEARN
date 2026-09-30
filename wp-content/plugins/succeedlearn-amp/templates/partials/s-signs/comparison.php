<?php
/**
 * S-Signs AMP — Traditional Security Awareness vs Visual Security Awareness.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$comparison_rows = function_exists( 'succeedlearn_amp_get_ss_comparison_items' )
	? succeedlearn_amp_get_ss_comparison_items()
	: array();

if ( empty( $comparison_rows ) ) {
	return;
}
?>
<section class="sl-s-signs-comparison" aria-labelledby="sl-s-signs-comparison-title">
	<div class="sl-wrap">
		<div class="sl-s-signs-comparison__heading">
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Traditional security awareness vs S-Signs', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-s-signs-comparison-title" class="sl-h2">
				<?php esc_html_e( 'Traditional Security awareness vs', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Visual Security Awareness', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>
		<div class="sl-s-signs-comparison__table-wrap">
			<table class="sl-s-signs-comparison__table">
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Traditional Security Communication', 'succeedlearn-amp' ); ?></th>
						<th scope="col" class="sl-s-signs-comparison__ssigns-head"><?php esc_html_e( 'S-Signs', 'succeedlearn-amp' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $comparison_rows as $row ) : ?>
						<tr>
							<td><?php echo esc_html( $row['traditional'] ); ?></td>
							<td class="sl-s-signs-comparison__ssigns-cell"><?php echo esc_html( $row['ssigns'] ); ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
