<?php
/**
 * Whistleblowing Training — Designed for Investment Firms.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$features = array(
	array(
		'number' => '01',
		'title'  => __( 'Relevant scenarios', 'akaza-adventure' ),
		'text'   => __( 'Connect whistleblowing principles with financial, transaction and investment situations.', 'akaza-adventure' ),
	),
	array(
		'number' => '02',
		'title'  => __( 'Clear distinctions', 'akaza-adventure' ),
		'text'   => __( 'Help employees distinguish whistleblowing concerns from personal grievances.', 'akaza-adventure' ),
	),
	array(
		'number' => '03',
		'title'  => __( 'Reporting awareness', 'akaza-adventure' ),
		'text'   => __( "Reinforce the importance of following the organisation's reporting process.", 'akaza-adventure' ),
	),
	array(
		'number' => '04',
		'title'  => __( 'Speak-up awareness', 'akaza-adventure' ),
		'text'   => __( 'Give employees greater clarity about recognising and raising concerns.', 'akaza-adventure' ),
	),
);
?>

<section
	id="why-whistleblowing-training"
	class="sl-whistleblowing-designed"
	aria-labelledby="sl-whistleblowing-designed-title"
>
	<div class="container">

		<div class="sl-whistleblowing-designed__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Designed for Investment Firms', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-whistleblowing-designed-title">
				<?php esc_html_e( 'Why Choose Whistleblowing Training Designed for PE and VC', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Firms?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Generic training can feel disconnected from the decisions and risks professionals encounter in investment firms. This course places whistleblowing in situations learners can recognise.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-whistleblowing-designed__grid">
			<?php foreach ( $features as $feature ) : ?>
				<article class="sl-whistleblowing-designed__card">

					<span class="sl-whistleblowing-designed__number" aria-hidden="true">
						<?php echo esc_html( $feature['number'] ); ?>
					</span>

					<h3 class="sl-panel-title">
						<?php echo esc_html( $feature['title'] ); ?>
					</h3>

					<p>
						<?php echo esc_html( $feature['text'] ); ?>
					</p>

				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>