<?php
/**
 * Inclusive Workplace Training — Courses overview cards.
 *
 * Links each course to its dedicated page template.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'akaza_get_inclusive_courses' ) ) {
	return;
}

$courses = akaza_get_inclusive_courses();
?>
<section class="sl-inclusive-courses" id="inclusive-courses">
	<div class="container-xl">
		<div class="sl-inclusive-courses__inner">

			<div class="sl-inclusive-courses__header">
				<h2><?php esc_html_e( 'Explore our online Inclusive Workplace courses', 'akaza-adventure' ); ?></h2>
				<p class="sl-inclusive-courses__subheading"><?php esc_html_e( 'Three subjects. Three distinct courses.', 'akaza-adventure' ); ?></p>
				<p><?php esc_html_e( 'The courses below sit independently within the Inclusive Workplace category. They are not presented as a combined programme and do not need to be completed in a particular sequence.', 'akaza-adventure' ); ?></p>
				<p><?php esc_html_e( 'Your organisation can select the course that addresses its specific learning requirement.', 'akaza-adventure' ); ?></p>
			</div>

			<div class="sl-inclusive-courses__overviews">
				<?php foreach ( $courses as $course_id => $course ) : ?>
					<?php
					$view_href = function_exists( 'akaza_inclusive_course_url' )
						? akaza_inclusive_course_url( $course_id )
						: '#contact';
					?>
					<div class="sl-inclusive-courses__overview">
						<div class="sl-inclusive-courses__overview-left">
							<div class="sl-inclusive-courses__overview-top">
								<div class="sl-inclusive-courses__overview-icon" aria-hidden="true">
									<i class="bi <?php echo esc_attr( $course['icon'] ); ?>"></i>
								</div>
								<span class="sl-inclusive-courses__overview-tag"><?php echo esc_html( $course['tag'] ); ?></span>
							</div>
							<h3><?php echo esc_html( $course['title'] ); ?></h3>
							<?php if ( ! empty( $course['subtitle'] ) ) : ?>
								<p class="sl-inclusive-courses__overview-subtitle"><?php echo esc_html( $course['subtitle'] ); ?></p>
							<?php endif; ?>
							<a href="<?php echo esc_url( $view_href ); ?>" class="sl-content-btn sl-content-btn-secondary sl-inclusive-courses__overview-btn">
								<?php esc_html_e( 'Explore this course', 'akaza-adventure' ); ?>
							</a>
						</div>
						<div class="sl-inclusive-courses__overview-body">
							<?php foreach ( (array) $course['overview'] as $para ) : ?>
								<p><?php echo esc_html( $para ); ?></p>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

		</div>
	</div>
</section>
