<?php
/**
 * S-Metrics — Traditional Awareness Reporting vs S-Metrics.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$comparison_rows = array(
	array(
		'traditional' => __( 'Separate reports across different awareness activities', 'akaza-adventure' ),
		'smetrics'    => __( 'Unified security-awareness reporting', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Primarily completion-focused', 'akaza-adventure' ),
		'smetrics'    => __( 'Learning, engagement and behavioural visibility', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Manual report consolidation', 'akaza-adventure' ),
		'smetrics'    => __( 'Centralised analytics', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Limited filtering', 'akaza-adventure' ),
		'smetrics'    => __( 'Flexible filters across users, groups and campaigns', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Campaign-specific information', 'akaza-adventure' ),
		'smetrics'    => __( 'Cross-programme awareness visibility', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Difficult to compare trends', 'akaza-adventure' ),
		'smetrics'    => __( 'Programme trends can be reviewed over time', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Static reporting', 'akaza-adventure' ),
		'smetrics'    => __( 'Data can inform future awareness activity', 'akaza-adventure' ),
	),
);
?>

<section class="sl-s-metrics-comparison" aria-labelledby="sl-s-metrics-comparison-title">
	<div class="container">

		<div class="sl-s-metrics-comparison__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Traditional Awareness Reporting vs S-Metrics', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-metrics-comparison-title">
				<?php esc_html_e( 'Traditional Awareness Reporting vs', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Security Analytics and Reporting Dashboard', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<div class="sl-s-metrics-comparison__table-wrap">
			<table class="sl-s-metrics-comparison__table">
				<thead>
					<tr>
						<th scope="col">
							<?php esc_html_e( 'Traditional Reporting', 'akaza-adventure' ); ?>
						</th>

						<th scope="col" class="sl-s-metrics-comparison__smetrics-head">
							<?php esc_html_e( 'S-Metrics', 'akaza-adventure' ); ?>
						</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ( $comparison_rows as $row ) : ?>
						<tr>
							<td>
								<?php echo esc_html( $row['traditional'] ); ?>
							</td>

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
