<?php
/**
 * Course archive card.
 *
 * @package Akaza_Adventure
 *
 * @var array $course Course card data from akaza_format_course_card().
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course = isset( $args['course'] ) ? $args['course'] : null;

if ( empty( $course ) || ! is_array( $course ) ) {
	return;
}

$title_lower = strtolower( $course['title'] );
?>
<article class="slf-courses-card"
	data-course-title="<?php echo esc_attr( $title_lower ); ?>"
	data-sort-title="<?php echo esc_attr( $title_lower ); ?>"
	data-sort-date="<?php echo esc_attr( (string) $course['sort_date'] ); ?>">
	<a class="slf-courses-card__thumb" href="<?php echo esc_url( $course['url'] ); ?>" tabindex="-1" aria-hidden="true">
		<?php if ( ! empty( $course['thumbnail'] ) ) : ?>
			<img src="<?php echo esc_url( $course['thumbnail'] ); ?>"
				alt=""
				width="640"
				height="400"
				loading="lazy"
				decoding="async">
		<?php else : ?>
			<span class="slf-courses-card__thumb-placeholder" aria-hidden="true"></span>
		<?php endif; ?>
	</a>
	<div class="slf-courses-card__body">
		<h3 class="slf-courses-card__title">
			<a href="<?php echo esc_url( $course['url'] ); ?>"><?php echo esc_html( $course['title'] ); ?></a>
		</h3>
		<?php if ( ! empty( $course['excerpt'] ) ) : ?>
			<p class="slf-courses-card__excerpt"><?php echo esc_html( $course['excerpt'] ); ?></p>
		<?php endif; ?>
		<div class="slf-courses-card__meta">
			<?php if ( ! empty( $course['duration'] ) ) : ?>
				<span class="slf-courses-card__duration">
					<strong><?php echo esc_html( $course['duration_label'] ); ?>:</strong>
					<?php echo esc_html( $course['duration'] ); ?>
				</span>
			<?php endif; ?>
			<?php if ( ! empty( $course['price'] ) ) : ?>
				<span class="slf-courses-card__price"><?php echo esc_html( $course['price'] ); ?></span>
			<?php endif; ?>
		</div>
		<a class="slf-btn slf-btn--primary slf-btn--sm slf-courses-card__cta" href="<?php echo esc_url( $course['url'] ); ?>">
			<?php echo esc_html( $course['button_text'] ); ?>
		</a>
	</div>
</article>
