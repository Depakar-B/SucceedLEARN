<?php
/**
 * Financial Crime Prevention — Flexible implementation section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$implementation_options = array(
	array(
		'title' => __( 'Hosted LMS or SCORM', 'akaza-adventure' ),
		'text'  => __( 'Deliver courses through the hosted platform or an existing compatible learning environment.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Assessments and Certificates', 'akaza-adventure' ),
		'text'  => __( 'Use knowledge checks, assessments and completion certificates to support learning records.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Tracking and Reporting', 'akaza-adventure' ),
		'text'  => __( 'Monitor assignments, completion activity and available learner records.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Policy Customisation', 'akaza-adventure' ),
		'text'  => __( 'Discuss relevant terminology, internal policies and escalation or reporting routes.', 'akaza-adventure' ),
	),
);

$demo_url = '#contact';
?>

<section
	id="flexible-implementation"
	class="sl-fcp-implementation"
	aria-labelledby="sl-fcp-implementation-title"
>
	<div class="container">

		<div class="sl-fcp-implementation__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Flexible implementation', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-fcp-implementation-title">
				<?php esc_html_e( 'Deliver Financial Crime Prevention Training Your Way', 'akaza-adventure' ); ?>
			</h2>

			<p>
				<?php esc_html_e(
					'SucceedLEARN’s training can be delivered through a hosted learning platform or supplied as SCORM-compatible eLearning for an organisation’s existing LMS.',
					'akaza-adventure'
				); ?>
			</p>

		</div>

		<div class="sl-fcp-implementation__grid">

			<?php foreach ( $implementation_options as $option ) : ?>

				<article class="sl-fcp-implementation__card">

					<h3>
						<?php echo esc_html( $option['title'] ); ?>
					</h3>

					<p>
						<?php echo esc_html( $option['text'] ); ?>
					</p>

				</article>

			<?php endforeach; ?>

		</div>

		<div class="sl-fcp-actions">
			<a href="<?php echo esc_url( $demo_url ); ?>" class="sl-content-btn sl-content-btn-primary">
				<?php esc_html_e( 'Request a demo', 'akaza-adventure' ); ?>
			</a>
		</div>

	</div>
</section>
