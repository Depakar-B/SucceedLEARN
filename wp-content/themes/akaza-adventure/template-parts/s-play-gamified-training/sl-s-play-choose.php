<?php
/**
 * S-Play — Why Choose Gamified Security Awareness Training?
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$reasons = array(
	array(
		'title' => __( 'Interactive Learning Experience', 'akaza-adventure' ),
		'text'  => __( 'Move beyond passive awareness programmes by engaging employees through interactive games that encourage participation, critical thinking, and practical application of cybersecurity concepts.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Multiple Game Experiences', 'akaza-adventure' ),
		'text'  => __( 'Use different formats - including decision-based games, scenario challenges and knowledge puzzles, to reinforce cybersecurity concepts in different ways.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Improved Knowledge Retention', 'akaza-adventure' ),
		'text'  => __( 'Gamified learning reinforces key security topics through repeated interaction and active participation, helping employees remember and apply secure behaviours more effectively.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Flexible Campaign Management', 'akaza-adventure' ),
		'text'  => __( 'Select games, target relevant users, schedule campaigns and manage gamified awareness activities through a structured campaign workflow.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Continuous Employee Engagement', 'akaza-adventure' ),
		'text'  => __( 'Introduce interactive learning at different points throughout the year rather than relying exclusively on one-time awareness events.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Supports a Strong Security Culture', 'akaza-adventure' ),
		'text'  => __( 'By making cybersecurity learning enjoyable and accessible, S-Play encourages regular participation and helps organisations build long-term security-conscious behaviours across the workforce.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-play-choose"
	aria-labelledby="sl-s-play-choose-title"
>
	<div class="container">

		<div class="sl-s-play-choose__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Why organizations choose S-Play?', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-play-choose-title">
				<?php esc_html_e( 'Why Choose', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Gamified Security Awareness Training?', 'akaza-adventure' ); ?></span>
			</h2>

		</div>

		<div class="sl-s-play-choose__grid">

			<?php foreach ( $reasons as $reason ) : ?>

				<article class="sl-s-play-choose__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $reason['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $reason['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
