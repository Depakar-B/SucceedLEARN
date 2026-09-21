<?php
/**
 * Security Awareness AMP — Traditional vs Continuous Behaviour Change.
 *
 * Reloads items here because sa_partial() includes run in function scope.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $comparison_items ) || ! is_array( $comparison_items ) ) {
	$comparison_items = succeedlearn_amp_get_sa_comparison_items();
}

if ( empty( $comparison_items ) || ! is_array( $comparison_items ) ) {
	return;
}
?>
<section
	class="sl-sa-comparison"
	id="traditional-vs-continuous"
	aria-labelledby="sl-sa-comparison-title"
>
	<div class="sl-wrap">
		<div class="sl-sa-comparison__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'A Different Approach to Security Awareness', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-sa-comparison-title">
				<?php esc_html_e( 'Traditional Awareness vs', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Continuous Behaviour Change', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-sa-comparison__table-wrap" role="region" aria-label="<?php esc_attr_e( 'Comparison table', 'succeedlearn-amp' ); ?>" tabindex="0">
			<table class="sl-sa-comparison__table">
				<thead>
					<tr>
						<th scope="col">
							<?php esc_html_e( 'Traditional Awareness', 'succeedlearn-amp' ); ?>
						</th>
						<th scope="col">
							<?php esc_html_e( 'SucceedLEARN SBCS Suite', 'succeedlearn-amp' ); ?>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $comparison_items as $item ) : ?>
						<tr>
							<td>
								<span class="sl-sa-comparison__cell">
									<?php echo esc_html( $item['traditional'] ); ?>
								</span>
							</td>
							<td>
								<span class="sl-sa-comparison__cell sl-sa-comparison__cell--highlight">
									<?php echo esc_html( $item['succeedlearn'] ); ?>
								</span>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
