<?php
/**
 * Financial Crime Prevention — Online employee training section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$training_points = array(
	array(
		'title' => __( 'Understand Everyday Risk Situations', 'akaza-adventure' ),
		'text'  => __( 'Connect compliance concepts with situations involving customers, payments, suppliers, intermediaries and sensitive information.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Recognise Red Flags and Warning Signs', 'akaza-adventure' ),
		'text'  => __( 'Help employees identify unusual instructions, inconsistent information, suspicious behaviour and situations requiring additional care.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Escalate and Report Concerns Correctly', 'akaza-adventure' ),
		'text'  => __( 'Reinforce internal procedures and help employees understand when to pause, seek advice or use an approved reporting route.', 'akaza-adventure' ),
	),
);

$training_image = function_exists( 'akaza_upload_url' )
	? akaza_upload_url( '2026/02/Financial-Crime-Prevention-Trainings.svg' )
	: 'https://succeedlearn.com/wp-content/uploads/2026/02/Financial-Crime-Prevention-Trainings.svg';
?>
<section
	id="training"
	class="sl-fcp-section sl-fcp-section--grey sl-fcp-training"
	aria-labelledby="sl-fcp-training-title"
>
	<div class="container sl-fcp-training__grid">

		<div>
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Practical Employee Awareness', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-fcp-training-title">
				<?php esc_html_e( 'Online Financial Crime Prevention Training for Employees', 'akaza-adventure' ); ?>
			</h2>

			<p class="sl-fcp-lead">
				<?php esc_html_e( 'Financial crime risks can arise during customer onboarding, payments, third-party dealings, gifts, confidential information handling, cross-border transactions and routine business approvals.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'SucceedLEARN’s online training uses practical scenarios, knowledge checks and assessments to help employees connect compliance expectations with decisions they may face in their work.', 'akaza-adventure' ); ?>
			</p>

			<div class="sl-fcp-training__list">
				<?php foreach ( $training_points as $index => $point ) : ?>
					<article class="sl-fcp-training__item">
						<span class="sl-fcp-number-circle"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
						<div>
							<h3><?php echo esc_html( $point['title'] ); ?></h3>
							<p><?php echo esc_html( $point['text'] ); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="sl-fcp-training__media">
			<img
				src="<?php echo esc_url( $training_image ); ?>"
				alt="<?php esc_attr_e( 'Employees reviewing financial crime risks and compliance information', 'akaza-adventure' ); ?>"
				width="592"
				height="392"
				loading="lazy"
				decoding="async"
			>
		</div>

	</div>
</section>
