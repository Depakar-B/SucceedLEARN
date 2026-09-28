<?php
/**
 * S-Bytes — How S-Bytes Works (center timeline).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sbytes_works_steps = array(
	array(
		'title' => __( 'Select S-Bytes', 'akaza-adventure' ),
		'body'  => array(
			__(
				'Choose FunFoSec videos based on the cybersecurity topics and behaviours your organisation wants to reinforce.',
				'akaza-adventure'
			),
			__(
				'The growing library allows organisations to address both foundational security concepts and evolving cyber risks.',
				'akaza-adventure'
			),
		),
	),
	array(
		'title' => __( 'Select Users', 'akaza-adventure' ),
		'body'  => array(
			__(
				'Microlearning Campaigns can be deployed organisation-wide or customised for specific groups based on teams, location, custom user groups etc.',
				'akaza-adventure'
			),
		),
	),
	array(
		'title' => __( 'Schedule', 'akaza-adventure' ),
		'body'  => array(
			__(
				'S-Bytes provides flexible campaign scheduling options. Rather than delivering multiple microlearning\'s at once, organisations can distribute focused learning at regular intervals to create continuous awareness throughout the year.',
				'akaza-adventure'
			),
			__(
				'Determine how frequently employees should receive microlearning based on your security awareness strategy.',
				'akaza-adventure'
			),
		),
	),
	array(
		'title' => __( 'Review', 'akaza-adventure' ),
		'body'  => array(
			__(
				'Before launching, administrators can review every campaign setting. Once reviewed, campaigns can be launched with a single click, allowing organisations to track the campaign and user status.',
				'akaza-adventure'
			),
		),
	),
);
?>

<section
	id="how-s-bytes-works"
	class="sl-sbytes-works"
	aria-labelledby="sl-sbytes-works-title"
>
	<div class="container">

		<div class="sl-sbytes-works__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'How It Works', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-sbytes-works-title">
				<?php esc_html_e( 'How', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'S-Bytes Works', 'akaza-adventure' ); ?></span>
			</h2>

			<h3 class="sl-panel-title">
				<?php esc_html_e( 'Make Continuous Awareness Simple', 'akaza-adventure' ); ?>
			</h3>

			<p>
				<?php
				esc_html_e(
					'S-Bytes enables organisations to introduce microlearning into their security awareness programme through a simple cycle of selecting, scheduling and delivering.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

		<div class="sl-sbytes-works__timeline">

			<?php foreach ( $sbytes_works_steps as $index => $step ) : ?>
				<?php
				$step_num  = (int) ( $index + 1 );
				$placement = ( 0 === $index % 2 ) ? 'below' : 'above';
				?>
				<article
					class="sl-sbytes-works__step sl-sbytes-works__step--<?php echo esc_attr( $placement ); ?> sl-sbytes-works__step--col-<?php echo esc_attr( (string) $step_num ); ?>"
				>

					<div class="sl-sbytes-works__slot sl-sbytes-works__slot--top">
						<?php if ( 'above' === $placement ) : ?>
							<div class="sl-sbytes-works__copy">
								<?php foreach ( $step['body'] as $paragraph ) : ?>
									<p><?php echo esc_html( $paragraph ); ?></p>
								<?php endforeach; ?>
							</div>
							<span class="sl-sbytes-works__stem" aria-hidden="true"></span>
						<?php endif; ?>
					</div>

					<div class="sl-sbytes-works__label">
						<h3 class="sl-panel-title">
							<?php echo esc_html( $step['title'] ); ?>
						</h3>
					</div>

					<div class="sl-sbytes-works__slot sl-sbytes-works__slot--bottom">
						<?php if ( 'below' === $placement ) : ?>
							<span class="sl-sbytes-works__stem" aria-hidden="true"></span>
							<div class="sl-sbytes-works__copy">
								<?php foreach ( $step['body'] as $paragraph ) : ?>
									<p><?php echo esc_html( $paragraph ); ?></p>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>

				</article>
			<?php endforeach; ?>

			<span class="sl-sbytes-works__spine" aria-hidden="true"></span>

		</div>

	</div>
</section>
