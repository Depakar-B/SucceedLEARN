<?php
/**
 * S-Bytes — From Awareness to Continuous Reinforcement.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sbytes_suite_items = array(
	array(
		'name'   => __( 'S-Aware', 'akaza-adventure' ),
		'action' => __( 'Learn', 'akaza-adventure' ),
		'body'   => __( 'Build foundational cybersecurity and privacy knowledge.', 'akaza-adventure' ),
	),
	array(
		'name'   => __( 'S-Bytes', 'akaza-adventure' ),
		'action' => __( 'Reinforce', 'akaza-adventure' ),
		'body'   => __( 'Keep important security concepts fresh through short, continuous microlearning.', 'akaza-adventure' ),
	),
	array(
		'name'   => __( 'S-Phish', 'akaza-adventure' ),
		'action' => __( 'Test', 'akaza-adventure' ),
		'body'   => __( 'Give employees practical experience recognising realistic phishing threats.', 'akaza-adventure' ),
	),
	array(
		'name'   => __( 'S-Play', 'akaza-adventure' ),
		'action' => __( 'Engage', 'akaza-adventure' ),
		'body'   => __( 'Reinforce security concepts through interactive and gamified learning experiences.', 'akaza-adventure' ),
	),
	array(
		'name'   => __( 'S-Signs', 'akaza-adventure' ),
		'action' => __( 'Remind', 'akaza-adventure' ),
		'body'   => __( 'Keep security visible through ongoing visual awareness campaigns and nudges.', 'akaza-adventure' ),
	),
	array(
		'name'   => __( 'S-Metrics', 'akaza-adventure' ),
		'action' => __( 'Measure', 'akaza-adventure' ),
		'body'   => __( 'Bring awareness and behavioural data together to understand programme performance.', 'akaza-adventure' ),
	),
	array(
		'name'   => __( 'S-Sync', 'akaza-adventure' ),
		'action' => __( 'Connect', 'akaza-adventure' ),
		'body'   => __( 'Integrate security awareness with the organisation\'s wider learning and technology ecosystem.', 'akaza-adventure' ),
	),
);
?>

<section
	id="continuous-reinforcement-suite"
	class="sl-sbytes-suite"
	aria-labelledby="sl-sbytes-suite-title"
>
	<div class="container">

		<div class="sl-sbytes-suite__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Security Behaviour & Culture Suite', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-sbytes-suite-title">
				<?php esc_html_e( 'From Awareness to', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Continuous Reinforcement', 'akaza-adventure' ); ?></span>
			</h2>

			<p class="sl-sbytes-suite__lead">
				<?php esc_html_e( 'S-Bytes Keeps Learning Alive. It helps make sure that knowledge doesn\'t fade.', 'akaza-adventure' ); ?>
			</p>
			<p>
				<?php
				esc_html_e(
					'As the continuous reinforcement layer of the SucceedLEARN Security Behaviour & Culture Suite, S-Bytes works alongside learning, simulations, gamification, visual awareness and measurement to keep security present throughout the employee journey.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-sbytes-suite__grid">
			<?php foreach ( $sbytes_suite_items as $item ) : ?>
				<article class="sl-sbytes-suite__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $item['name'] ); ?></h3>
					<span class="sl-sbytes-suite__action"><?php echo esc_html( $item['action'] ); ?></span>
					<p><?php echo esc_html( $item['body'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<p class="sl-sbytes-suite__closing">
			<?php esc_html_e( 'Together, the solutions create a continuous cycle of learning, reinforcement, practice and measurement.', 'akaza-adventure' ); ?>
		</p>

	</div>
</section>
