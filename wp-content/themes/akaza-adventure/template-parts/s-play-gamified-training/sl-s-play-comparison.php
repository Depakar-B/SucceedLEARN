<?php
/**
 * S-Play — Traditional Security Awareness vs S-Play Gamified Learning.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$comparison_items = array(
	array(
		'traditional' => __( 'Primarily passive learning', 'akaza-adventure' ),
		's_play'      => __( 'Active participation', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Longer learning experiences', 'akaza-adventure' ),
		's_play'      => __( 'Short, focused game-based activities', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Limited learner interaction', 'akaza-adventure' ),
		's_play'      => __( 'Interactive challenges and decision-making', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Often centred around scheduled training', 'akaza-adventure' ),
		's_play'      => __( 'Can support ongoing reinforcement', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Knowledge consumption', 'akaza-adventure' ),
		's_play'      => __( 'Knowledge application and reinforcement', 'akaza-adventure' ),
	),
	array(
		'traditional' => __( 'Completion-focused', 'akaza-adventure' ),
		's_play'      => __( 'Engagement-focused', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-play-comparison"
	aria-labelledby="sl-s-play-comparison-title"
>
	<div class="container">

		<div class="sl-s-play-comparison__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'A Better Way to Engage', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-play-comparison-title">
				<?php esc_html_e( 'Traditional Security Awareness Vs', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'S-Play, CyberSecurity Gamified learning', 'akaza-adventure' ); ?></span>
			</h2>

		</div>

		<div class="sl-s-play-comparison__table-wrap">

			<table class="sl-s-play-comparison__table">

				<thead>
					<tr>
						<th scope="col">
							<?php esc_html_e( 'Traditional Approach', 'akaza-adventure' ); ?>
						</th>
						<th scope="col">
							<?php esc_html_e( 'S-Play Gamified Learning', 'akaza-adventure' ); ?>
						</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ( $comparison_items as $item ) : ?>
						<tr>
							<td>
								<span class="sl-s-play-comparison__cell">
									<?php echo esc_html( $item['traditional'] ); ?>
								</span>
							</td>
							<td>
								<span class="sl-s-play-comparison__cell sl-s-play-comparison__cell--highlight">
									<?php echo esc_html( $item['s_play'] ); ?>
								</span>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>

			</table>

		</div>

	</div>
</section>
