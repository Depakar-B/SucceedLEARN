<?php
/**
 * S-Bytes — Learning Fatigue.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sbytes_fatigue_points = array(
	__( 'Reinforcing concepts introduced during annual security awareness training', 'akaza-adventure' ),
	__( 'Recurring security awareness initiatives', 'akaza-adventure' ),
	__( 'Highlighting emerging cybersecurity risks', 'akaza-adventure' ),
	__( 'Refreshing previously learned security concepts', 'akaza-adventure' ),
	__( 'Maintaining awareness between formal training cycles', 'akaza-adventure' ),
);
?>

<section
	id="without-learning-fatigue"
	class="sl-sbytes-fatigue"
	aria-labelledby="sl-sbytes-fatigue-title"
>
	<div class="container">

		<div class="sl-sbytes-fatigue__layout">

			<div class="sl-sbytes-fatigue__visual">
				<div class="sl-sbytes-fatigue__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

			<div class="sl-sbytes-fatigue__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Complement Formal Training', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-sbytes-fatigue-title">
					<?php esc_html_e( 'Security Awareness Without the', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Learning Fatigue', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-sbytes-fatigue__body">
					<p>
						<?php
						esc_html_e(
							'Longer awareness programmes have an important role in building foundational knowledge. But every security message doesn\'t require another full course. S-Bytes complements formal security awareness training by giving organisations a lighter way to reinforce individual topics throughout the year. A short microlearning intervention can remind employees about a behaviour at exactly the point where reinforcement is useful - without requiring another lengthy learning session.',
							'akaza-adventure'
						);
						?>
					</p>
					<p>
						<?php esc_html_e( 'This makes S-Bytes particularly useful for:', 'akaza-adventure' ); ?>
					</p>
				</div>

				<ul class="sl-list sl-sbytes-fatigue__list">
					<?php foreach ( $sbytes_fatigue_points as $index => $point ) : ?>
						<li class="sl-list-item">
							<span class="sl-list-item__label" aria-hidden="true">
								<?php echo esc_html( sprintf( '%02d', (int) $index + 1 ) ); ?>
							</span>
							<span class="sl-list-item__text">
								<?php echo esc_html( $point ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>

				<p class="sl-sbytes-fatigue__closing">
					<?php esc_html_e( 'The objective isn\'t to replace foundational awareness training.', 'akaza-adventure' ); ?>
				</p>
				<p class="sl-sbytes-fatigue__tagline">
					<?php esc_html_e( 'It is to make sure employees don\'t forget it.', 'akaza-adventure' ); ?>
				</p>

			</div>

		</div>

	</div>
</section>
