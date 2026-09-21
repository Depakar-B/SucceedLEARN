<?php
/**
 * UK Sexual Harassment Prevention Training — Course Coverage.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course_topics = array(
	__( 'Harassment and sexual harassment', 'akaza-adventure' ),
	__( 'Who may be affected or involved', 'akaza-adventure' ),
	__( 'Where workplace sexual harassment may occur', 'akaza-adventure' ),
	__( 'Purpose, effect and reasonable workplace behaviour', 'akaza-adventure' ),
	__( 'Personal relationships and professional boundaries', 'akaza-adventure' ),
	__( 'Bystander intervention', 'akaza-adventure' ),
	__( 'Reporting concerns', 'akaza-adventure' ),
	__( 'Conduct that is not sexual harassment', 'akaza-adventure' ),
	__( 'Victimisation', 'akaza-adventure' ),
	__( 'Summative and formative assessment', 'akaza-adventure' ),
);
?>

<section
	id="course-coverage"
	class="sl-uk-sexual-harassment-coverage"
	aria-labelledby="sl-uk-sexual-harassment-coverage-title"
>
	<div class="container">

		<div class="sl-uk-sexual-harassment-coverage__grid">

			<!-- Left: Content -->
			<div class="sl-uk-sexual-harassment-coverage__content">

				<span class="sl-uk-sexual-harassment-coverage__intro">
					<?php esc_html_e( 'Course Coverage', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-uk-sexual-harassment-coverage-title">
					<?php esc_html_e( 'What the UK Preventing Sexual Harassment Module', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Covers', 'akaza-adventure' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( 'The course gives workers a clear, practical introduction to preventing sexual harassment at work. It covers:', 'akaza-adventure' ); ?>
				</p>

				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Key Course Topics', 'akaza-adventure' ); ?>
				</h3>

				<ul class="sl-uk-sexual-harassment-coverage__list">
					<?php foreach ( $course_topics as $index => $topic ) : ?>
						<li class="sl-uk-sexual-harassment-coverage__item">
							<span
								class="sl-uk-sexual-harassment-coverage__number"
								aria-hidden="true"
							>
								<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
							</span>

							<span class="sl-uk-sexual-harassment-coverage__text">
								<?php echo esc_html( $topic ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>

				<p class="sl-uk-sexual-harassment-coverage__closing">
					<?php esc_html_e( 'Each subject is presented through concise learning and workplace context. The website provides an overview; the full learning experience remains within the course.', 'akaza-adventure' ); ?>
				</p>

				<div class="sl-hero-actions">
					<a
						class="sl-hero-btn sl-hero-btn-primary"
						href="#contact"
					>
						<?php esc_html_e( 'Request the Full Course Outline', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</div>

			</div>

			<!-- Right: Image -->
			<div class="sl-uk-sexual-harassment-coverage__media">
				<div class="sl-uk-sexual-harassment-coverage__image">
					<div
						class="sl-uk-sexual-harassment-coverage__image-placeholder"
						role="img"
						aria-label="<?php esc_attr_e( 'Image Placeholder', 'akaza-adventure' ); ?>"
					>
						<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
					</div>
				</div>
			</div>

		</div>

	</div>
</section>