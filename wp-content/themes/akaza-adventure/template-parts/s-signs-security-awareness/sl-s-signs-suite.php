<?php
/**
 * S-Signs — From Awareness to Continuous Reinforcement.
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
		'text' => __( 'Build foundational cybersecurity and privacy knowledge.', 'akaza-adventure' ),
	),
	array(
		'name' => __( 'S-Bytes', 'akaza-adventure' ),
		'role' => __( 'Reinforce', 'akaza-adventure' ),
		'text' => __( 'Keep important security concepts fresh through short, continuous microlearning.', 'akaza-adventure' ),
	),
	array(
		'name' => __( 'S-Phish', 'akaza-adventure' ),
		'role' => __( 'Test', 'akaza-adventure' ),
		'text' => __( 'Give employees practical experience recognising realistic phishing threats.', 'akaza-adventure' ),
	),
	array(
		'name' => __( 'S-Play', 'akaza-adventure' ),
		'role' => __( 'Engage', 'akaza-adventure' ),
		'text' => __( 'Reinforce security concepts through interactive and gamified learning.', 'akaza-adventure' ),
	),
	array(
		'name' => __( 'S-Signs', 'akaza-adventure' ),
		'role' => __( 'Remind', 'akaza-adventure' ),
		'text' => __( 'Keep cybersecurity visible through posters, digital awareness and behavioural nudges.', 'akaza-adventure' ),
	),
	array(
		'name' => __( 'S-Metrics', 'akaza-adventure' ),
		'role' => __( 'Measure', 'akaza-adventure' ),
		'text' => __( 'Bring awareness and behavioural data together to understand programme performance.', 'akaza-adventure' ),
	),
	array(
		'name' => __( 'S-Sync', 'akaza-adventure' ),
		'role' => __( 'Connect', 'akaza-adventure' ),
		'text' => __( "Integrate security awareness with the organisation's wider learning and technology ecosystem.", 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-signs-suite"
	aria-labelledby="sl-s-signs-suite-title"
>
	<div class="container">

		<div class="sl-s-signs-suite__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'S-Signs Keeps Security Visible', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-signs-suite-title">
				<?php esc_html_e( 'From Awareness to', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Continuous Reinforcement', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'S-Signs forms the Remind layer of the SucceedLEARN Security Behaviour & Culture Suite.',
					'akaza-adventure'
				);
				?>
			</p>

			<p>
				<?php
				esc_html_e(
					'It works alongside awareness training, microlearning, phishing simulations, gamified learning and measurement to keep security messages present throughout the employee journey.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-s-signs-suite__cards">

			<?php foreach ( $suite_products as $index => $product ) : ?>

				<article class="sl-s-signs-suite__card">
					<span class="sl-s-signs-suite__number" aria-hidden="true">
						<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</span>
					<div class="sl-s-signs-suite__card-heading">
						<h3 class="sl-panel-title">
							<?php echo esc_html( $product['name'] ); ?>
						</h3>
						<span class="sl-s-signs-suite__role">
							<?php echo esc_html( $product['role'] ); ?>
						</span>
					</div>
					<p>
						<?php echo esc_html( $product['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

		<div class="sl-s-signs-suite__closing">
			<p>
				<?php
				esc_html_e(
					'Together, these solutions create a continuous cycle of learning, reinforcement, testing, engagement, reminders and measurement.',
					'akaza-adventure'
				);
				?>
			</p>
		</div>

	</div>
</section>
