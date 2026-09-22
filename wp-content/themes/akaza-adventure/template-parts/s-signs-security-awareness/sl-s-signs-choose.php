<?php
/**
 * S-Signs — Why Organisations Choose S-Signs.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$reasons = array(
	array(
		'title' => __( 'Continuous Awareness Reinforcement', 'akaza-adventure' ),
		'text'  => __( 'Keep important cybersecurity messages visible throughout the year rather than limiting awareness to formal training sessions.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Professionally Designed Visual Content', 'akaza-adventure' ),
		'text'  => __( 'Access high-quality awareness posters created to communicate security concepts clearly, consistently, and effectively.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Directive & Nudge-Based Communication', 'akaza-adventure' ),
		'text'  => __( 'Reinforce both organisational security requirements and everyday secure behaviours using a combination of instructional posters and behavioural nudges.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Easy Content Discovery', 'akaza-adventure' ),
		'text'  => __( 'Search and filter poster libraries by awareness topic, making it quick and simple to identify relevant content for specific campaigns.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Flexible Distribution', 'akaza-adventure' ),
		'text'  => __( 'Display posters physically within the workplace or distribute them digitally through email, collaboration tools, and internal communication channels.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Supports Security Culture', 'akaza-adventure' ),
		'text'  => __( 'Help create an environment where cybersecurity remains visible, relevant, and part of employees\' everyday decision-making.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-signs-choose"
	aria-labelledby="sl-s-signs-choose-title"
>
	<div class="container">

		<div class="sl-s-signs-choose__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Why Choose S-Signs', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-signs-choose-title">
				<?php esc_html_e( 'Why Organisations Choose', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'S-Signs', 'akaza-adventure' ); ?></span>
			</h2>

		</div>

		<div class="sl-s-signs-choose__grid">

			<?php foreach ( $reasons as $reason ) : ?>

				<article class="sl-s-signs-choose__card">
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
