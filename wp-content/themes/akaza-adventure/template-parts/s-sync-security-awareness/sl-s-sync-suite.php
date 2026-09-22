<?php
/**
 * S-Sync — Integrating the Entire Security Behaviour & Culture Suite.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$suite_products = array(
	array(
		'name' => __( 'S-Aware', 'akaza-adventure' ),
		'text' => __( 'Deliver foundational security awareness training.', 'akaza-adventure' ),
	),
	array(
		'name' => __( 'S-Bytes', 'akaza-adventure' ),
		'text' => __( 'Reinforce learning through continuous microlearning.', 'akaza-adventure' ),
	),
	array(
		'name' => __( 'S-Play', 'akaza-adventure' ),
		'text' => __( 'Engage employees with gamified security awareness.', 'akaza-adventure' ),
	),
	array(
		'name' => __( 'S-Phish', 'akaza-adventure' ),
		'text' => __( 'Test real-world phishing resilience.', 'akaza-adventure' ),
	),
	array(
		'name' => __( 'S-Signs', 'akaza-adventure' ),
		'text' => __( 'Reinforce awareness with visual reminders and digital nudges.', 'akaza-adventure' ),
	),
	array(
		'name' => __( 'S-Metrics', 'akaza-adventure' ),
		'text' => __( 'Measure programme effectiveness through analytics and reporting.', 'akaza-adventure' ),
	),
	array(
		'name' => __( 'S-Sync', 'akaza-adventure' ),
		'text' => __( 'Connect and automate the entire ecosystem.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-sync-suite"
	aria-labelledby="sl-s-sync-suite-title"
>
	<div class="container">

		<div class="sl-s-sync-suite__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Security Behaviour & Culture Suite', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-sync-suite-title">
				<?php esc_html_e( 'Integrating the Entire', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Security Behaviour & Culture Suite', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'S-Sync connects every component of the SucceedLEARN Security Behaviour & Culture Suite, ensuring a consistent and streamlined user experience across learning, reinforcement, phishing simulations, gamification, visual awareness, and reporting.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-s-sync-suite__cards">

			<?php foreach ( $suite_products as $index => $product ) : ?>

				<article class="sl-s-sync-suite__card">
					<span class="sl-s-sync-suite__number" aria-hidden="true">
						<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</span>
					<h3 class="sl-panel-title">
						<?php echo esc_html( $product['name'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $product['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

		<div class="sl-s-sync-suite__closing">
			<p>
				<?php
				esc_html_e(
					'Together, these solutions provide organisations with a connected, scalable, and enterprise-ready security awareness platform.',
					'akaza-adventure'
				);
				?>
			</p>
		</div>

	</div>
</section>
