<?php
/**
 * S-Play — Why Gamified Security Awareness Matters.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$why_items = array(
	__( 'Apply previously learned security concepts.', 'akaza-adventure' ),
	__( 'Practise decision-making in a low-risk environment.', 'akaza-adventure' ),
	__( 'Receive immediate feedback.', 'akaza-adventure' ),
	__( 'Revisit important cybersecurity topics.', 'akaza-adventure' ),
	__( 'Increase participation in awareness initiatives.', 'akaza-adventure' ),
	__( 'Reinforce knowledge through active learning.', 'akaza-adventure' ),
);
?>

<section
	class="sl-s-play-why"
	aria-labelledby="sl-s-play-why-title"
>
	<div class="container">

		<div class="sl-s-play-why__grid">

			<div class="sl-s-play-why__media">
				<div class="sl-s-play-why__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

			<div class="sl-s-play-why__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Engagement That Lasts', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-s-play-why-title">
					<?php esc_html_e( 'Why Gamified Security', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Awareness Matters', 'akaza-adventure' ); ?></span>
				</h2>

				<h3 class="sl-s-play-why__subtitle">
					<?php esc_html_e( 'Move Employees From Passive Learning to Active Participation', 'akaza-adventure' ); ?>
				</h3>

				<div class="sl-s-play-why__copy">
					<p>
						<?php
						esc_html_e(
							'Creating security awareness is only the beginning. Employees also need opportunities to apply what they know.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							"They are expected to recognise suspicious communications, protect information, make secure decisions and respond appropriately when something doesn't look right. When awareness relies entirely on passive learning, important concepts can become easier to forget.",
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Gamified cybersecurity training introduces a more active learning experience.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Instead of only reading or watching security content, employees interact with challenges, answer questions, solve problems and make decisions based on cybersecurity scenarios.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php esc_html_e( 'This creates opportunities to:', 'akaza-adventure' ); ?>
					</p>

					<ul class="sl-s-play-why__list">
						<?php foreach ( $why_items as $item ) : ?>
							<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>

					<p>
						<?php
						esc_html_e(
							"The objective isn't to turn cybersecurity into entertainment. It is to use game-based learning to make security awareness more participative, memorable and practical.",
							'akaza-adventure'
						);
						?>
					</p>
				</div>

			</div>

		</div>

	</div>
</section>
