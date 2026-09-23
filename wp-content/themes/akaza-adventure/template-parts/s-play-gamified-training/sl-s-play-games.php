<?php
/**
 * S-Play — Interactive Security Awareness Games.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$games = array(
	array(
		'title'          => __( 'Grab or Duck', 'akaza-adventure' ),
		'tagline'        => __( 'Make the Security Decision', 'akaza-adventure' ),
		'paragraphs'     => array(
			__( 'A fast-paced decision-making game where employees identify secure and insecure actions across different situations.', 'akaza-adventure' ),
			__( 'Learners must decide how to respond, with immediate feedback reinforcing the appropriate security behaviour.', 'akaza-adventure' ),
		),
		'learning_style' => __( 'Rapid Decision-Making', 'akaza-adventure' ),
		'focus'          => __( 'Recognition · Judgement · Secure Behaviour', 'akaza-adventure' ),
	),
	array(
		'title'          => __( 'Out of the Well', 'akaza-adventure' ),
		'tagline'        => __( 'Make the Right Choice to Progress', 'akaza-adventure' ),
		'paragraphs'     => array(
			__( 'A scenario-driven security challenge where employees encounter situations requiring them to apply their cybersecurity knowledge and make informed decisions.', 'akaza-adventure' ),
			__( 'Progress depends on the choices learners make, encouraging them to think about how security principles apply in practice.', 'akaza-adventure' ),
		),
		'learning_style' => __( 'Scenario-Based Challenge', 'akaza-adventure' ),
		'focus'          => __( 'Application · Problem-Solving · Decision-Making', 'akaza-adventure' ),
	),
	array(
		'title'          => __( 'Cyber Crossword', 'akaza-adventure' ),
		'tagline'        => __( 'Test What Employees Remember', 'akaza-adventure' ),
		'paragraphs'     => array(
			__( 'A cybersecurity-themed crossword designed to reinforce terminology, concepts and security knowledge through recall.', 'akaza-adventure' ),
			__( 'The puzzle format gives employees a lighter way to revisit previously learned security concepts while testing what they remember.', 'akaza-adventure' ),
		),
		'learning_style' => __( 'Knowledge Challenge', 'akaza-adventure' ),
		'focus'          => __( 'Recall · Terminology · Knowledge Reinforcement', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-play-games"
	aria-labelledby="sl-s-play-games-title"
>
	<div class="container">

		<div class="sl-s-play-games__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'S-Play games', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-play-games-title">
				<?php esc_html_e( 'Interactive Security', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Awareness Games', 'akaza-adventure' ); ?></span>
			</h2>

			<h3 class="sl-s-play-games__subtitle">
				<?php esc_html_e( 'Different Ways to Play. One Goal: Reinforce Security Awareness.', 'akaza-adventure' ); ?>
			</h3>

			<p>
				<?php
				esc_html_e(
					'S-Play includes a growing collection of cybersecurity awareness games designed to reinforce security knowledge through different forms of interaction.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-s-play-games__grid">

			<?php foreach ( $games as $index => $game ) : ?>

				<article class="sl-s-play-games__card">
					<span class="sl-s-play-games__number" aria-hidden="true">
						<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</span>
					<h3 class="sl-panel-title">
						<?php echo esc_html( $game['title'] ); ?>
					</h3>
					<p class="sl-s-play-games__tagline">
						<?php echo esc_html( $game['tagline'] ); ?>
					</p>
					<?php foreach ( $game['paragraphs'] as $paragraph ) : ?>
						<p><?php echo esc_html( $paragraph ); ?></p>
					<?php endforeach; ?>
					<p class="sl-s-play-games__meta">
						<strong><?php esc_html_e( 'Learning Style:', 'akaza-adventure' ); ?></strong>
						<?php echo esc_html( $game['learning_style'] ); ?>
					</p>
					<p class="sl-s-play-games__meta">
						<strong><?php esc_html_e( 'Focus:', 'akaza-adventure' ); ?></strong>
						<?php echo esc_html( $game['focus'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
