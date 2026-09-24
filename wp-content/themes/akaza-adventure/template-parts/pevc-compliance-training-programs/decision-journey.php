<?php
/**
 * PE/VC Homepage — Decision journey.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$steps = array(
	array(
		'num'   => '1',
		'title' => __( 'Recognise', 'akaza-adventure' ),
		'text'  => __( 'Spot the risk or warning sign.', 'akaza-adventure' ),
	),
	array(
		'num'   => '2',
		'title' => __( 'Consider', 'akaza-adventure' ),
		'text'  => __( 'Think about the situation in context.', 'akaza-adventure' ),
	),
	array(
		'num'   => '3',
		'title' => __( 'Decide', 'akaza-adventure' ),
		'text'  => __( 'Choose the appropriate next step.', 'akaza-adventure' ),
	),
	array(
		'num'   => '4',
		'title' => __( 'Escalate', 'akaza-adventure' ),
		'text'  => __( 'Seek approval or specialist guidance.', 'akaza-adventure' ),
	),
	array(
		'num'   => '5',
		'title' => __( 'Report', 'akaza-adventure' ),
		'text'  => __( 'Use the appropriate internal channel.', 'akaza-adventure' ),
	),
);
?>
<section
	class="sl-pevc-decision"
	aria-labelledby="sl-pevc-decision-title"
>
	<div class="container">
		<span class="sl-home-sub-heading">
			<?php esc_html_e( 'From awareness to action', 'akaza-adventure' ); ?>
		</span>

		<h2 id="sl-pevc-decision-title">
			<?php esc_html_e( 'Help people know', 'akaza-adventure' ); ?>
			<span><?php esc_html_e( 'what to do next', 'akaza-adventure' ); ?></span>
		</h2>

		<p class="sl-pevc-decision__lead">
			<?php
			esc_html_e(
				'Compliance learning becomes more useful when employees can translate knowledge into action in real situations.',
				'akaza-adventure'
			);
			?>
		</p>

		<div class="sl-pevc-decision__grid">
			<?php foreach ( $steps as $step ) : ?>
				<div class="sl-pevc-decision__step">
					<div class="sl-pevc-decision__icon" aria-hidden="true">
						<?php echo esc_html( $step['num'] ); ?>
					</div>
					<h3><?php echo esc_html( $step['title'] ); ?></h3>
					<p><?php echo esc_html( $step['text'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
