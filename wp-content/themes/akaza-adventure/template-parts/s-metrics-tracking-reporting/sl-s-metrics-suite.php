<?php
/**
 * S-Metrics — From Learning to Measurable Behaviour Change.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$suite_products = array(
	array(
		'name' => __( 'S-Aware', 'akaza-adventure' ),
		'role' => __( 'Learn', 'akaza-adventure' ),
		'text' => __( 'Delivers foundational cybersecurity knowledge.', 'akaza-adventure' ),
	),
	array(
		'name' => __( 'S-Bytes', 'akaza-adventure' ),
		'role' => __( 'Reinforce', 'akaza-adventure' ),
		'text' => __( 'Reinforces learning through continuous microlearning.', 'akaza-adventure' ),
	),
	array(
		'name' => __( 'S-Play', 'akaza-adventure' ),
		'role' => __( 'Engage', 'akaza-adventure' ),
		'text' => __( 'Increases engagement through gamified learning.', 'akaza-adventure' ),
	),
	array(
		'name' => __( 'S-Phish', 'akaza-adventure' ),
		'role' => __( 'Test', 'akaza-adventure' ),
		'text' => __( 'Tests employees against realistic phishing attacks.', 'akaza-adventure' ),
	),
	array(
		'name' => __( 'S-Signs', 'akaza-adventure' ),
		'role' => __( 'Remind', 'akaza-adventure' ),
		'text' => __( 'Reinforces awareness through visual reminders.', 'akaza-adventure' ),
	),
	array(
		'name' => __( 'S-Metrics', 'akaza-adventure' ),
		'role' => __( 'Measure', 'akaza-adventure' ),
		'text' => __( 'Measures the effectiveness of every awareness initiative through powerful analytics and reporting.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-metrics-suite"
	aria-labelledby="sl-s-metrics-suite-title"
>
	<div class="container">

		<div class="sl-s-metrics-suite__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Security Behaviour & Culture Suite', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-metrics-suite-title">
				<?php esc_html_e( 'From Learning to', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Measurable Behaviour Change', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'S-Metrics brings together every component of the SucceedLEARN Security Behaviour & Culture Suite into one comprehensive reporting platform.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-s-metrics-suite__cards">

			<?php foreach ( $suite_products as $index => $product ) : ?>

				<article class="sl-s-metrics-suite__card">
					<span class="sl-s-metrics-suite__number" aria-hidden="true">
						<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</span>
					<div class="sl-s-metrics-suite__card-heading">
						<h3 class="sl-panel-title">
							<?php echo esc_html( $product['name'] ); ?>
						</h3>
						<span class="sl-s-metrics-suite__role">
							<?php echo esc_html( $product['role'] ); ?>
						</span>
					</div>
					<p>
						<?php echo esc_html( $product['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

		<div class="sl-s-metrics-suite__closing">
			<p>
				<?php
				esc_html_e(
					'Together, it enables organisations to move beyond training completion and towards measurable improvements in security behaviour and organisational resilience.',
					'akaza-adventure'
				);
				?>
			</p>
		</div>

	</div>
</section>
