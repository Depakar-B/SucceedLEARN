<?php
/**
 * Information Security Awareness Training - Designed for everyday situations.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learning_elements = array(
	array(
		'title' => __( 'Animated Micro-Modules', 'akaza-adventure' ),
		'text'  => __( 'Visually engaging, animated explainers help simplify information security concepts and make learning easier to consume.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Real-World Cyberattack Scenarios', 'akaza-adventure' ),
		'text'  => __( 'Employees encounter practical scenarios that demonstrate how cyber threats and security risks can appear during everyday work.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Continuous Knowledge Checks', 'akaza-adventure' ),
		'text'  => __( 'Knowledge checks are incorporated throughout the course, allowing employees to apply what they have learned as they progress.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Practical Decision-Making', 'akaza-adventure' ),
		'text'  => __( 'Scenario-based activities encourage employees to think about how they would respond when faced with suspicious or potentially risky situations.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Final Assessment', 'akaza-adventure' ),
		'text'  => __( 'A structured final assessment helps evaluate employees\' understanding of the key security concepts covered throughout the course.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-isat-designed"
	id="practical-everyday-security-awareness"
	aria-labelledby="sl-isat-designed-title"
>
	<div class="container">

		<div class="sl-isat-designed__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Learning Experience', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-isat-designed-title">
				<?php esc_html_e( 'Designed Based on Practical, Everyday', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Security Awareness Situations', 'akaza-adventure' ); ?></span>
			</h2>

			<p class="sl-isat-designed__lead">
				<?php esc_html_e( 'Information security can be complex. Employee training shouldn\'t be.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<p class="sl-isat-designed__subhead">
			<?php esc_html_e( 'Learning Elements', 'akaza-adventure' ); ?>
		</p>

		<p class="sl-isat-designed__intro">
			<?php esc_html_e( 'The course breaks important security concepts into short, focused learning experiences that connect cybersecurity principles with situations employees may recognize from their everyday working lives.', 'akaza-adventure' ); ?>
		</p>

		<div class="sl-isat-designed__grid">
			<?php foreach ( $learning_elements as $element ) : ?>
				<article class="sl-isat-designed__card">
					<h3><?php echo esc_html( $element['title'] ); ?></h3>
					<p><?php echo esc_html( $element['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-isat-designed__details">

			<div class="sl-isat-designed__detail">
				<h3><?php esc_html_e( 'Format & accessibility', 'akaza-adventure' ); ?></h3>
				<p>
					<?php esc_html_e( 'Fully responsive interface across desktop, tablet, and mobile - complete with a learner dashboard, progress tracking, automated reminder prompts, and seamless integration with your existing LMS or HR systems.', 'akaza-adventure' ); ?>
				</p>
			</div>

			<div class="sl-isat-designed__detail">
				<h3><?php esc_html_e( 'Certificate', 'akaza-adventure' ); ?></h3>
				<p>
					<?php esc_html_e( 'Upon successful completion, you receive a CPD certificate valid as proof of training.', 'akaza-adventure' ); ?>
				</p>
			</div>

		</div>

	</div>
</section>
