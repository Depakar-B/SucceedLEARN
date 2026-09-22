<?php
/**
 * S-Play — Why Organisations Choose S-Play.
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
		'title' => __( 'Improved Knowledge Retention', 'akaza-adventure' ),
		'text'  => __( 'Gamified learning reinforces key security topics through repeated interaction and active participation, helping employees remember and apply secure behaviours more effectively.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Simple Campaign Management', 'akaza-adventure' ),
		'text'  => __( 'Create, schedule, and launch gamified awareness campaigns across the organisation or for specific employee groups through an intuitive administrative interface.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Continuous Employee Engagement', 'akaza-adventure' ),
		'text'  => __( 'Keep cybersecurity awareness active throughout the year by regularly delivering interactive learning experiences that encourage employees to participate rather than simply complete mandatory training.', 'akaza-adventure' ),
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
				<?php esc_html_e( 'Why Choose S-Play', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-play-choose-title">
				<?php esc_html_e( 'Why Organisations Choose', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'S-Play', 'akaza-adventure' ); ?></span>
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
