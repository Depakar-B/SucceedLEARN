<?php
/**
 * BFSI & PE/VC — Course Structure.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learning_elements = array(
	array(
		'title' => __( 'Animated Explainers', 'akaza-adventure' ),
		'text'  => __( 'Visually engaging animated explainers help employees understand cybersecurity concepts in a clear, accessible way.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Narrated Learning', 'akaza-adventure' ),
		'text'  => __( 'Concise narrated learning keeps attention on the behaviours that matter in financial-services work.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Real-World Cases', 'akaza-adventure' ),
		'text'  => __( 'Real-world case examples connect security awareness with situations employees may actually encounter.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Knowledge Checks', 'akaza-adventure' ),
		'text'  => __( 'Frequent knowledge checks and quizzes reinforce understanding throughout the learning journey.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Final Assessment', 'akaza-adventure' ),
		'text'  => __( 'A final assessment checks whether employees can apply the security behaviours covered in the course.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-bfsi-structure"
	id="course-structure"
	aria-labelledby="sl-bfsi-structure-title"
>
	<div class="container">

		<div class="sl-bfsi-structure__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'How the Course is Built', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-bfsi-structure-title">
				<?php esc_html_e( 'Course', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Structure', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<h3 class="sl-bfsi-structure__subhead">
			<?php esc_html_e( 'Learning Elements', 'akaza-adventure' ); ?>
		</h3>

		<div class="sl-bfsi-structure__grid">
			<?php foreach ( $learning_elements as $element ) : ?>
				<article class="sl-bfsi-structure__card">
					<h3><?php echo esc_html( $element['title'] ); ?></h3>
					<p><?php echo esc_html( $element['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-bfsi-structure__details">

			<div class="sl-bfsi-structure__detail">
				<h3><?php esc_html_e( 'Format & Accessibility', 'akaza-adventure' ); ?></h3>
				<p>
					<?php
					esc_html_e(
						'Responsive learning across desktop, tablet and mobile devices.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

			<div class="sl-bfsi-structure__detail">
				<h3><?php esc_html_e( 'Certificate', 'akaza-adventure' ); ?></h3>
				<p>
					<?php
					esc_html_e(
						'On successful completion and assessment, learners can generate a completion certificate, configurable according to organisational requirements.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

		</div>

	</div>
</section>
