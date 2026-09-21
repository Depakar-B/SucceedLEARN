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
		'number' => '01',
		'title'  => __( 'Understand everyday risk situations', 'akaza-adventure' ),
		'text'   => __( 'Connect financial crime concepts with practical situations involving customers, payments, suppliers, intermediaries and sensitive information.', 'akaza-adventure' ),
	),
	array(
		'number' => '02',
		'title'  => __( 'Recognise red flags and warning signs', 'akaza-adventure' ),
		'text'   => __( 'Help employees notice unusual instructions, inconsistent information, suspicious behaviour and circumstances requiring additional care.', 'akaza-adventure' ),
	),
	array(
		'number' => '03',
		'title'  => __( 'Escalate and report concerns correctly', 'akaza-adventure' ),
		'text'   => __( 'Reinforce internal procedures and help employees understand when to pause, seek advice or use an approved reporting route.', 'akaza-adventure' ),
	),
);

$training_image = function_exists( 'akaza_upload_url' )
	? akaza_upload_url( '2026/02/Financial-Crime-Prevention-Trainings.svg' )
	: 'https://succeedlearn.com/wp-content/uploads/2026/02/Financial-Crime-Prevention-Trainings.svg';

$demo_url = '#contact';
?>
<section
	id="online-employee-training"
	class="sl-fcp-training"
	aria-labelledby="sl-fcp-training-title"
>
	<div class="container">

		<div class="sl-fcp-training__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Practical employee awareness', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-fcp-training-title">
				<?php esc_html_e( 'Online Financial Crime Prevention Training for Employees', 'akaza-adventure' ); ?>
			</h2>

			<div class="sl-fcp-training__intro-content">
				<p>
					<?php esc_html_e( 'Financial crime risks can arise during customer onboarding, payments, third-party dealings, gifts, confidential-information handling, cross-border transactions and routine business approvals.', 'akaza-adventure' ); ?>
				</p>
				<p>
					<?php esc_html_e( 'SucceedLEARN’s online training uses scenarios, knowledge checks and assessments to help employees connect compliance expectations with decisions they may face in their work.', 'akaza-adventure' ); ?>
				</p>
			</div>
		</div>

		<div class="sl-fcp-training__content">
			<div class="sl-fcp-training__points">
				<?php foreach ( $training_points as $point ) : ?>
					<div class="sl-fcp-training__card">
						<span class="sl-fcp-training__card-number">
							<?php echo esc_html( $point['number'] ); ?>
						</span>
						<div class="sl-fcp-training__card-content">
							<h3><?php echo esc_html( $point['title'] ); ?></h3>
							<p><?php echo esc_html( $point['text'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="sl-fcp-training__media">
				<img
					src="<?php echo esc_url( $training_image ); ?>"
					alt="<?php esc_attr_e( 'Financial crime prevention employee training', 'akaza-adventure' ); ?>"
					width="592"
					height="392"
					loading="lazy"
					decoding="async"
				>
			</div>
		</div>

		<div class="sl-fcp-actions">
			<a href="<?php echo esc_url( $demo_url ); ?>" class="sl-content-btn sl-content-btn-primary">
				<?php esc_html_e( 'Request a demo', 'akaza-adventure' ); ?>
			</a>
		</div>

	</div>
</section>
