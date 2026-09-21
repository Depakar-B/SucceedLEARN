<?php
/**
 * Course loop card.
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$course = learn_press_get_course();
if ( ! $course ) {
	return;
}

$students = method_exists( $course, 'get_total_users_enrolled' ) ? (int) $course->get_total_users_enrolled() : 0;
$duration = method_exists( $course, 'get_duration' ) ? $course->get_duration() : '';
$price    = method_exists( $course, 'get_price_html' ) ? $course->get_price_html() : '';
?>
<li id="post-<?php the_ID(); ?>" <?php post_class( 'akaza-course-card' ); ?>>
	<article class="akaza-course-card__inner">
		<a class="akaza-course-card__thumb" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail(
					'akaza-course-card',
					array(
						'loading'  => 'lazy',
						'decoding' => 'async',
						'alt'      => the_title_attribute( array( 'echo' => false ) ),
					)
				);
			} else {
				echo wp_kses_post( $course->get_image( 'akaza-course-card' ) );
			}
			?>
		</a>
		<div class="akaza-course-card__body">
			<h2 class="akaza-course-card__title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>
			<?php if ( has_excerpt() ) : ?>
				<p class="akaza-course-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
			<?php endif; ?>
			<ul class="akaza-course-card__meta">
				<?php if ( $students > 0 ) : ?>
					<li><?php echo esc_html( sprintf( _n( '%d learner', '%d learners', $students, 'akaza-adventure' ), $students ) ); ?></li>
				<?php endif; ?>
				<?php if ( $duration ) : ?>
					<li><?php echo esc_html( $duration ); ?></li>
				<?php endif; ?>
			</ul>
			<div class="akaza-course-card__footer">
				<?php if ( $price ) : ?>
					<div class="akaza-course-card__price"><?php echo wp_kses_post( $price ); ?></div>
				<?php endif; ?>
				<a class="slf-btn slf-btn--primary slf-btn--sm" href="<?php the_permalink(); ?>"><?php esc_html_e( 'View Course', 'akaza-adventure' ); ?></a>
			</div>
		</div>
	</article>
</li>
