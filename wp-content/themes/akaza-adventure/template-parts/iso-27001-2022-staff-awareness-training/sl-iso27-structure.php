<?php
/**
 * ISO 27001:2022 Staff Awareness Training - Course Structure.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learning_elements = array(
	array(
		'title' => __( 'Visually Engaging Animated Explainers', 'akaza-adventure' ),
		'text'  => __( 'Visually engaging animated explainers that simplify ISO 27001 concepts, ISMS principles and information security responsibilities', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Short, Structured Learning Modules', 'akaza-adventure' ),
		'text'  => __( 'Short, structured learning modules', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Interactive Decision-Making Scenarios', 'akaza-adventure' ),
		'text'  => __( 'Interactive decision-making scenarios', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Workplace-Relevant Information Security Examples', 'akaza-adventure' ),
		'text'  => __( 'Workplace-relevant information security examples', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Embedded Knowledge Checks and Security Quizzes', 'akaza-adventure' ),
		'text'  => __( 'Embedded knowledge checks and security quizzes', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Final Assessment', 'akaza-adventure' ),
		'text'  => __( 'Final assessment', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-iso27-structure"
	id="course-structure"
	aria-labelledby="sl-iso27-structure-title"
>
	<div class="container">

		<div class="sl-iso27-structure__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'How the Course is Built', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-iso27-structure-title">
				<?php esc_html_e( 'Course', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Structure', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<p class="sl-iso27-structure__subhead">
			<?php esc_html_e( 'Learning Elements', 'akaza-adventure' ); ?>
		</p>

		<div class="sl-iso27-structure__grid">
			<?php foreach ( $learning_elements as $element ) : ?>
				<article class="sl-iso27-structure__card">
					<h3><?php echo esc_html( $element['title'] ); ?></h3>
					<p><?php echo esc_html( $element['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-iso27-structure__details">

			<div class="sl-iso27-structure__detail">
				<h3><?php esc_html_e( 'Format & Accessibility', 'akaza-adventure' ); ?></h3>
				<p>
					<?php
					esc_html_e(
						'The course is designed for flexible online learning across desktop, tablet and mobile devices and can be deployed through SucceedLEARN or integrated with an organization\'s existing learning environment.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

			<div class="sl-iso27-structure__detail">
				<h3><?php esc_html_e( 'Certificate', 'akaza-adventure' ); ?></h3>
				<p>
					<?php
					esc_html_e(
						'Learners receive a course completion certificate upon successful completion of the course.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

		</div>

	</div>
</section>
