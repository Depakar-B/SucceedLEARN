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
		'image'   => 'https://succeedlearn.com/wp-content/uploads/2026/09/whistleblowing_course_look_in_practice_2.webp',
		'alt'     => __( 'Whistleblowing concern compared with personal grievances', 'akaza-adventure' ),
		'label'   => __( 'Concern vs grievance', 'akaza-adventure' ),
		'caption' => __( 'See the difference between whistleblowing concerns and personal grievances.', 'akaza-adventure' ),
	),
	array(
		'image'   => 'https://succeedlearn.com/wp-content/uploads/2026/09/whistleblowing_course_look_in_practice_3.webp',
		'alt'     => __( 'Confidentiality, fiduciary responsibility and investment ethics in whistleblowing training', 'akaza-adventure' ),
		'label'   => __( 'PE/VC principles', 'akaza-adventure' ),
		'caption' => __( 'Connect speaking up with confidentiality, fiduciary duty and investment ethics.', 'akaza-adventure' ),
	),
	array(
		'image'   => 'https://succeedlearn.com/wp-content/uploads/2026/09/whistleblowing_course_look_in_practice_4.webp',
		'alt'     => __( 'Interactive scenario asking which situations should be reported as a whistleblowing concern', 'akaza-adventure' ),
		'label'   => __( 'Practice scenario', 'akaza-adventure' ),
		'caption' => __( 'Work through scenarios to decide what should be reported.', 'akaza-adventure' ),
	),
);

$main_image  = $course_images[0];
$side_images = array_slice( $course_images, 1 );
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
				<?php
				echo wp_kses_post(
					__(
						'What Does the Whistleblowing Course Look Like in <span>Practice?</span>',
						'akaza-adventure'
					)
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Learners work through clear explanations, visual examples and practical workplace scenarios.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-whistleblowing-course__gallery">

			<figure class="sl-whistleblowing-course__card sl-whistleblowing-course__card--main">
				<span class="sl-whistleblowing-course__num" aria-hidden="true">01</span>
				<div class="sl-whistleblowing-course__frame">
					<img
						src="<?php echo esc_url( $main_image['image'] ); ?>"
						alt="<?php echo esc_attr( $main_image['alt'] ); ?>"
						loading="lazy"
						decoding="async"
					>
				</div>
				<figcaption class="sl-whistleblowing-course__caption">
					<strong><?php echo esc_html( $main_image['label'] ); ?></strong>
					<span><?php echo esc_html( $main_image['caption'] ); ?></span>
				</figcaption>
			</figure>

			<div class="sl-whistleblowing-course__stack">
				<?php foreach ( $side_images as $index => $course_image ) : ?>
					<figure class="sl-whistleblowing-course__card">
						<span class="sl-whistleblowing-course__num" aria-hidden="true">
							<?php echo esc_html( str_pad( (string) ( $index + 2 ), 2, '0', STR_PAD_LEFT ) ); ?>
						</span>
						<div class="sl-whistleblowing-course__frame">
							<img
								src="<?php echo esc_url( $course_image['image'] ); ?>"
								alt="<?php echo esc_attr( $course_image['alt'] ); ?>"
								loading="lazy"
								decoding="async"
							>
						</div>
						<figcaption class="sl-whistleblowing-course__caption">
							<strong><?php echo esc_html( $course_image['label'] ); ?></strong>
							<span><?php echo esc_html( $course_image['caption'] ); ?></span>
						</figcaption>
					</figure>
				<?php endforeach; ?>
			</div>

		</div>

	</div>
</section>
