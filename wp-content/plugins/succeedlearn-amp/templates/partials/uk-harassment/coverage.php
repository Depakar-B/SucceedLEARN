<?php
/**
 * AMP partial — UK Sexual Harassment Prevention Training — course coverage.
 *
 * Expected vars: $course_topics
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $course_topics ) || ! is_array( $course_topics ) ) {
	$course_topics = function_exists( 'succeedlearn_amp_get_uk_harassment_course_topics' )
		? succeedlearn_amp_get_uk_harassment_course_topics()
		: array();
}

$images         = function_exists( 'succeedlearn_amp_get_uk_harassment_images' )
	? succeedlearn_amp_get_uk_harassment_images()
	: array();
$coverage_image = isset( $images['coverage'] ) ? $images['coverage'] : '';
?>
<section
	id="course-coverage"
	class="sl-section sl-uk-harassment-coverage"
	aria-labelledby="sl-uk-harassment-coverage-title"
>
	<div class="sl-wrap">
		<div class="sl-uk-harassment-coverage__grid">

			<div class="sl-uk-harassment-coverage__content">
				<span class="sl-uk-harassment-coverage__intro">
					<?php esc_html_e( 'Course Coverage', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-uk-harassment-coverage-title" class="sl-h2">
					<?php esc_html_e( 'What the UK Preventing Sexual Harassment Module', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Covers', 'succeedlearn-amp' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( 'The course gives workers a clear, practical introduction to preventing sexual harassment at work. It covers:', 'succeedlearn-amp' ); ?>
				</p>

				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Key Course Topics', 'succeedlearn-amp' ); ?>
				</h3>

				<ul class="sl-uk-harassment-bullets">
					<?php foreach ( $course_topics as $topic ) : ?>
						<li><?php echo esc_html( $topic ); ?></li>
					<?php endforeach; ?>
				</ul>

				<p class="sl-uk-harassment-coverage__closing">
					<?php esc_html_e( 'Each subject is presented through concise learning and workplace context. The website provides an overview; the full learning experience remains within the course.', 'succeedlearn-amp' ); ?>
				</p>

				<div class="sl-hero-actions">
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-primary"
						data-cta="uk-harassment-coverage-outline"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Request the Full Course Outline', 'succeedlearn-amp' ); ?>
						<span aria-hidden="true">→</span>
					</button>
				</div>
			</div>

			<div class="sl-uk-harassment-coverage__media">
				<?php if ( $coverage_image ) : ?>
					<div class="sl-uk-harassment-coverage__image">
						<amp-img
							src="<?php echo esc_url( $coverage_image ); ?>"
							width="560"
							height="420"
							layout="responsive"
							alt="<?php esc_attr_e( 'UK Preventing Sexual Harassment course screens covering objectives, topics, workplace relationships and reporting.', 'succeedlearn-amp' ); ?>"
						></amp-img>
					</div>
				<?php endif; ?>
			</div>

		</div>
	</div>
</section>
