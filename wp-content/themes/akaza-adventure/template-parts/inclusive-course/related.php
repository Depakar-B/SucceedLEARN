<?php
/**
 * Inclusive course page — related courses strip.
 *
 * Expects $args['course_id'] current course id.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$current_id = isset( $args['course_id'] ) ? (string) $args['course_id'] : '';
if ( ! function_exists( 'akaza_get_inclusive_courses' ) ) {
	return;
}

$all = akaza_get_inclusive_courses();
$related = array();
foreach ( $all as $id => $course ) {
	if ( $id === $current_id ) {
		continue;
	}
	$related[ $id ] = $course;
}

if ( empty( $related ) ) {
	return;
}
?>
<section class="sl-iwc-related" aria-labelledby="sl-iwc-related-title">
	<div class="container">
		<div class="sl-iwc-section-heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Related courses', 'akaza-adventure' ); ?>
			</span>
			<h2 id="sl-iwc-related-title">
				<?php esc_html_e( 'Explore other', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Inclusive Workplace', 'akaza-adventure' ); ?></span>
				<?php esc_html_e( 'courses', 'akaza-adventure' ); ?>
			</h2>
		</div>

		<div class="sl-iwc-related__grid">
			<?php foreach ( $related as $id => $course ) : ?>
				<article class="sl-iwc-related__card">
					<div class="sl-iwc-related__head">
						<?php if ( ! empty( $course['icon'] ) ) : ?>
							<span class="sl-iwc-related__icon" aria-hidden="true">
								<i class="bi <?php echo esc_attr( $course['icon'] ); ?>"></i>
							</span>
						<?php endif; ?>
						<span class="sl-iwc-related__tag"><?php echo esc_html( $course['tag'] ); ?></span>
						<h3><?php echo esc_html( $course['title'] ); ?></h3>
					</div>
					<?php if ( ! empty( $course['subtitle'] ) ) : ?>
						<p><?php echo esc_html( $course['subtitle'] ); ?></p>
					<?php endif; ?>
					<a class="sl-iwc-related__link" href="<?php echo esc_url( akaza_inclusive_course_url( $id ) ); ?>">
						<?php esc_html_e( 'View course', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</article>
			<?php endforeach; ?>

			<article class="sl-iwc-related__card sl-iwc-related__card--hub">
				<div class="sl-iwc-related__head">
					<span class="sl-iwc-related__tag"><?php esc_html_e( 'Category hub', 'akaza-adventure' ); ?></span>
					<h3><?php esc_html_e( 'Inclusive Workplace Training', 'akaza-adventure' ); ?></h3>
				</div>
				<p><?php esc_html_e( 'See how these courses sit within the Inclusive Workplace category and choose the module that matches your priority.', 'akaza-adventure' ); ?></p>
				<a class="sl-iwc-related__link" href="<?php echo esc_url( home_url( '/inclusive-workplace-training/' ) ); ?>">
					<?php esc_html_e( 'Back to Inclusive Workplace', 'akaza-adventure' ); ?>
					<span aria-hidden="true">→</span>
				</a>
			</article>
		</div>
	</div>
</section>
