<?php
/**
 * S-Signs — Traditional Security Awareness vs Visual Security Awareness.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$comparison_rows = array(
	array(
		'traditional' => __( 'Awareness concentrated around training events', 'akaza-adventure' ),
		'ssigns'      => __( 'Continuous visual reinforcement', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Lengthy security communications', 'akaza-adventure' ),
		'ssigns'      => __( 'Short, focused visual messages', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Employees need to actively access content', 'akaza-adventure' ),
		'ssigns'      => __( 'Awareness can appear within the workplace', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Single communication style', 'akaza-adventure' ),
		'ssigns'      => __( 'Directive posters and behavioural nudges', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Limited campaign flexibility', 'akaza-adventure' ),
		'ssigns'      => __( 'Topic-based visual awareness campaigns', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Primarily digital or email-based', 'akaza-adventure' ),
		'ssigns'      => __( 'Physical and digital distribution', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Security messages may fade over time', 'akaza-adventure' ),
		'ssigns'      => __( 'Regular visual reminders keep topics visible', 'akaza-adventure' ),
	),
);
?>

<section class="sl-s-signs-comparison" aria-labelledby="sl-s-signs-comparison-title">
	<div class="container">

		<div class="sl-s-signs-comparison__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Traditional security awareness vs S-Signs', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-signs-comparison-title">
				<?php esc_html_e( 'Traditional Security awareness vs', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Visual Security Awareness', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<div class="sl-s-signs-comparison__table-wrap">
			<table class="sl-s-signs-comparison__table">
				<thead>
					<tr>
						<th scope="col">
							<?php esc_html_e( 'Traditional Security Communication', 'akaza-adventure' ); ?>
						</th>

						<th scope="col" class="sl-s-signs-comparison__ssigns-head">
							<?php esc_html_e( 'S-Signs', 'akaza-adventure' ); ?>
						</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ( $comparison_rows as $row ) : ?>
						<tr>
							<td>
								<?php echo esc_html( $row['traditional'] ); ?>
							</td>

							<td class="sl-s-signs-comparison__ssigns-cell">
								<?php echo esc_html( $row['ssigns'] ); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>
</section>
