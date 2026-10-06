<?php
/**
 * ISO 27001:2022 Staff Awareness Training - Why Choose SucceedLEARN.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$choose_items = array(
	array(
		'title' => __( 'Built for Employees, Not Just Security Specialists', 'akaza-adventure' ),
		'text'  => __( 'Complex information security concepts are translated into practical, understandable learning for employees across functions.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Focused on Workplace Behavior', 'akaza-adventure' ),
		'text'  => __( 'The training connects ISO 27001 principles with the actions employees take when working with information, systems, and organizational assets.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Interactive Learning', 'akaza-adventure' ),
		'text'  => __( 'Scenarios, knowledge checks, and assessments help employees engage with the subject rather than passively consuming information.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Supports Awareness and Audit Readiness', 'akaza-adventure' ),
		'text'  => __( 'Course completion and assessment records can support an organization in demonstrating that awareness activities have taken place. They should be considered part of the organization\'s wider ISO 27001 programme rather than proof of ISO 27001 compliance by themselves.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Flexible Deployment', 'akaza-adventure' ),
		'text'  => __( 'Deliver training through SucceedLEARN or deploy it through your existing LMS using SCORM.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Customizable to Your Organization', 'akaza-adventure' ),
		'text'  => __( 'Where required, learning can be adapted to better reflect organizational policies, terminology, and reporting processes.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-iso27-choose"
	id="why-choose-iso-27001-training"
	aria-labelledby="sl-iso27-choose-title"
>
	<div class="container">

		<div class="sl-iso27-choose__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Why SucceedLEARN', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-iso27-choose-title">
				<?php esc_html_e( 'Why Choose SucceedLEARN for', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'ISO 27001:2022 Awareness Training?', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<div class="sl-iso27-choose__grid">
			<?php foreach ( $choose_items as $item ) : ?>
				<article class="sl-iso27-choose__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
