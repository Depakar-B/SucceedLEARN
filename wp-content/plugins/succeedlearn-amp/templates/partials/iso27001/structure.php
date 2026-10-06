<?php
/**
 * ISO 27001 AMP — Course structure.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learning_elements = succeedlearn_amp_get_iso27001_learning_elements();
?>
<section
	class="sl-iso27-structure"
	id="course-structure"
	aria-labelledby="sl-iso27-structure-title"
>
	<div class="sl-wrap">
		<div class="sl-iso27-structure__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'How the Course is Built', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-iso27-structure-title" class="sl-h2">
				<?php esc_html_e( 'Course', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Structure', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<p class="sl-iso27-structure__subhead">
			<?php esc_html_e( 'Learning Elements', 'succeedlearn-amp' ); ?>
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
				<h3><?php esc_html_e( 'Format & Accessibility', 'succeedlearn-amp' ); ?></h3>
				<p>
					<?php esc_html_e( 'The course is designed for flexible online learning across desktop, tablet and mobile devices and can be deployed through SucceedLEARN or integrated with an organization\'s existing learning environment.', 'succeedlearn-amp' ); ?>
				</p>
			</div>

			<div class="sl-iso27-structure__detail">
				<h3><?php esc_html_e( 'Certificate', 'succeedlearn-amp' ); ?></h3>
				<p>
					<?php esc_html_e( 'Learners receive a course completion certificate upon successful completion of the course.', 'succeedlearn-amp' ); ?>
				</p>
			</div>
		</div>
	</div>
</section>
