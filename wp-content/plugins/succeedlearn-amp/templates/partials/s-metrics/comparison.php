<?php
/**
 * S-Metrics AMP — Traditional Awareness Reporting vs S-Metrics.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$comparison_rows = succeedlearn_amp_get_sm_comparison_rows();
?>
<section class="sl-s-metrics-comparison" aria-labelledby="sl-s-metrics-comparison-title">
	<div class="sl-wrap">
		<div class="sl-s-metrics-comparison__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Traditional Awareness Reporting vs S-Metrics', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-s-metrics-comparison-title" class="sl-h2">
				<?php esc_html_e( 'Traditional Awareness Reporting vs', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Security Analytics and Reporting Dashboard', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div
			class="sl-s-metrics-comparison__table-wrap"
			role="region"
			aria-label="<?php esc_attr_e( 'Comparison table', 'succeedlearn-amp' ); ?>"
			tabindex="0"
		>
			<table class="sl-s-metrics-comparison__table">
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Traditional Reporting', 'succeedlearn-amp' ); ?></th>
						<th scope="col" class="sl-s-metrics-comparison__smetrics-head">
							<?php esc_html_e( 'S-Metrics', 'succeedlearn-amp' ); ?>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $comparison_rows as $row ) : ?>
						<tr>
							<td><?php echo esc_html( $row['traditional'] ); ?></td>
							<td class="sl-s-metrics-comparison__smetrics-cell">
								<?php echo esc_html( $row['smetrics'] ); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
