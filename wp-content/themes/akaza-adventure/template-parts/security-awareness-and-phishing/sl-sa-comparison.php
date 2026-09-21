<?php
/**
 * Security Awareness — Traditional Awareness vs Continuous Behaviour Change.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$comparison_items = array(
	array(
		'traditional' => 'Annual awareness training',
		'succeedlearn' => 'Continuous learning and reinforcement',
	),
	array(
		'traditional' => 'Single learning format ',
		'succeedlearn' => 'Multi-format learning ecosystem ',
	),
	array(
		'traditional' => 'Theoretical knowledge ',
		'succeedlearn' => 'Learning combined with practical simulations',
	),
	array(
		'traditional' => 'Separate phishing tools ',
		'succeedlearn' => 'Integrated phishing simulations ',
	),
	array(
		'traditional' => 'Generic communication ',
		'succeedlearn' => 'Targeted awareness interventions ',
	),
	array(
		'traditional' => 'Completion-focused reporting',
		'succeedlearn' => 'Behavioural and engagement insights',
	),
	array(
		'traditional' => 'Passive employee participation ',
		'succeedlearn' => 'Interactive and gamified experiences ',
	),
);
?>

<section
	class="sl-sa-comparison"
	id="traditional-vs-continuous"
	aria-labelledby="sl-sa-comparison-title"
>

	<div class="container">

		<div class="sl-sa-comparison__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'A Different Approach to Security Awareness', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-sa-comparison-title">
				<?php esc_html_e( 'Traditional Awareness vs', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Continuous Behaviour Change', 'akaza-adventure' ); ?></span>
			</h2>

		</div>

		<div class="sl-sa-comparison__table-wrap">

			<table class="sl-sa-comparison__table">

				<thead>

					<tr>
						<th scope="col">
							<?php esc_html_e( 'Traditional Awareness', 'akaza-adventure' ); ?>
						</th>

						<th scope="col">
							<?php esc_html_e( 'SucceedLEARN SBCS Suite', 'akaza-adventure' ); ?>
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