<?php
/**
 * S-Play — Interactive Learning Experiences.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$games = array(
	array(
		'title' => __( 'Grab or Duck', 'akaza-adventure' ),
		'text'  => __( 'An interactive decision-making game where employees quickly identify secure and insecure actions across different workplace scenarios. Immediate feedback helps reinforce correct behaviours and encourages faster recognition of cybersecurity risks.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Out of the Well', 'akaza-adventure' ),
		'text'  => __( 'A scenario-based challenge that places learners in everyday workplace situations requiring security-focused decision-making. Employees progress by making informed choices while strengthening their understanding of common cyber threats and safe practices.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Cyber Crossword', 'akaza-adventure' ),
		'text'  => __( 'A knowledge-based puzzle that reinforces cybersecurity terminology, concepts, and best practices through an engaging crossword format. Designed to improve recall and reinforce learning, it provides employees with an enjoyable way to revisit key security concepts.', 'akaza-adventure' ),
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
				<?php esc_html_e( 'Game Library', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-play-games-title">
				<?php esc_html_e( 'Interactive Learning', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Experiences', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'S-Play includes a growing collection of gamified learning experiences designed to make cybersecurity awareness engaging, memorable, and practical.',
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
					<p>
						<?php echo esc_html( $game['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
