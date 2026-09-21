<?php
/**
 * S-Aware — Traditional Awareness vs S-Aware
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$comparison_rows = array(
	array(
		'traditional' => __( 'Annual compliance exercise', 'akaza-adventure' ),
		'saware'      => __( 'Foundation for continuous knowledge building', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Passive content consumption', 'akaza-adventure' ),
		'saware'      => __( 'Interactive scenario-based learning', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Generic awareness', 'akaza-adventure' ),
		'saware'      => __( 'Relevant security and privacy learning', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Limited Learner Interaction', 'akaza-adventure' ),
		'saware'      => __( 'Knowledge checks and assessments', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Difficult to measure understanding', 'akaza-adventure' ),
		'saware'      => __( 'Progress tracking and assessments insights', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Standalone Training Activity', 'akaza-adventure' ),
		'saware'      => __( 'Part of a wider Security Behaviour and Culture ecosystem', 'akaza-adventure' ),
	),
);
?>

<section class="sl-saware-comparison" aria-labelledby="sl-saware-comparison-title">
	<div class="container">

		<div class="sl-saware-comparison__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'A Different Approach to Security Awareness', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-saware-comparison-title">
				<?php esc_html_e( 'Traditional Awareness vs', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'S-Aware', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<div class="sl-saware-comparison__table-wrap">
			<table class="sl-saware-comparison__table">
				<thead>
					<tr>
						<th scope="col">
							<?php esc_html_e( 'Traditional Awareness', 'akaza-adventure' ); ?>
						</th>

						<th scope="col" class="sl-saware-comparison__saware-head">
							<?php esc_html_e( 'S-Aware', 'akaza-adventure' ); ?>
						</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ( $comparison_rows as $row ) : ?>
						<tr>
							<td>
								<?php echo esc_html( $row['traditional'] ); ?>
							</td>

							<td class="sl-saware-comparison__saware-cell">
								<?php echo esc_html( $row['saware'] ); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>
</section>