<?php
/**
 * Whistleblowing Training — Inside the Course.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course_images = array(
	array(
		'image'   => get_template_directory_uri() . '/images/course-whistleblowing-concerns.png',
		'alt'     => __( 'SucceedLEARN whistleblowing training comparing whistleblowing concerns with personal grievances', 'akaza-adventure' ),
		'caption' => __( 'Learners see the difference between potential whistleblowing concerns and personal grievances.', 'akaza-adventure' ),
	),
	array(
		'image'   => get_template_directory_uri() . '/images/course-whistleblowing-examples.png',
		'alt'     => __( 'SucceedLEARN whistleblowing training showing examples of reportable concerns', 'akaza-adventure' ),
		'caption' => __( 'Learners explore examples of concerns that may need to be reported through appropriate channels.', 'akaza-adventure' ),
	),
	array(
		'image'   => get_template_directory_uri() . '/images/course-raise-concern.png',
		'alt'     => __( 'SucceedLEARN whistleblowing course explaining how to raise a concern', 'akaza-adventure' ),
		'caption' => __( 'Learners understand how to raise a concern and follow the appropriate reporting process.', 'akaza-adventure' ),
	),
);
?>

<section
	id="inside-the-course"
	class="sl-whistleblowing-course"
	aria-labelledby="sl-whistleblowing-course-title"
>
	<div class="container">

		<div class="sl-whistleblowing-course__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Inside the Course', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-whistleblowing-course-title">
				<?php esc_html_e( 'What Does the Whistleblowing Course Look Like in', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Practice?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Learners work through clear explanations, visual examples and practical workplace scenarios.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-whistleblowing-course__images">
			<?php foreach ( $course_images as $course_image ) : ?>
				<figure class="sl-whistleblowing-course__image-item">
					<div class="sl-whistleblowing-course__image">
						<img
							src="<?php echo esc_url( $course_image['image'] ); ?>"
							alt="<?php echo esc_attr( $course_image['alt'] ); ?>"
							loading="lazy"
							decoding="async"
						>
					</div>

					<figcaption>
						<?php echo esc_html( $course_image['caption'] ); ?>
					</figcaption>
				</figure>
			<?php endforeach; ?>
		</div>

	</div>
</section>