<?php
/**
 * Financial Crime Prevention — Flexible delivery section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$delivery_items = array(
	array(
		'title' => __( 'Hosted LMS or SCORM', 'akaza-adventure' ),
		'text'  => __( 'Deliver courses through the hosted platform or through an existing compatible learning environment.', 'akaza-adventure' ),
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
		'text'  => __( 'Discuss organisational terminology, internal policies, branding and reporting routes.', 'akaza-adventure' ),
	),
);
?>
<section
	id="delivery"
	class="sl-fcp-section sl-fcp-delivery"
	aria-labelledby="sl-fcp-delivery-title"
>
	<div class="container">

		<div class="sl-fcp-section-intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Flexible Implementation', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-fcp-delivery-title">
				<?php esc_html_e( 'Deliver Financial Crime Prevention Training Your Way', 'akaza-adventure' ); ?>
			</h2>

			<p class="sl-fcp-lead">
				<?php esc_html_e( 'SucceedLEARN’s training can be delivered through a hosted learning platform or supplied as SCORM-compatible eLearning for an organisation’s existing LMS.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-fcp-delivery__grid">
			<?php foreach ( $delivery_items as $index => $item ) : ?>
				<article class="sl-fcp-delivery__item">
					<span class="sl-fcp-number-circle"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
