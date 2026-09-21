<?php
/**
 * Shared course learning experience section.
 *
 * Args:
 * - modifier (string)
 * - eyebrow (string)
 * - title_main (string)
 * - title_highlight (string)
 * - description (string)
 * - points (array<int,string|array{text:string,icon?:string}>)
 * - image (string) optional image URL
 * - image_alt (string)
 * - placeholder (string)
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$modifier        = isset( $args['modifier'] ) ? sanitize_html_class( (string) $args['modifier'] ) : '';
$eyebrow         = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$title_main      = isset( $args['title_main'] ) ? (string) $args['title_main'] : '';
$title_highlight = isset( $args['title_highlight'] ) ? (string) $args['title_highlight'] : '';
$description     = isset( $args['description'] ) ? (string) $args['description'] : '';
$points          = ( isset( $args['points'] ) && is_array( $args['points'] ) ) ? $args['points'] : array();
$image           = isset( $args['image'] ) ? (string) $args['image'] : '';
$image_alt       = isset( $args['image_alt'] ) ? (string) $args['image_alt'] : '';
$placeholder     = isset( $args['placeholder'] ) ? (string) $args['placeholder'] : __( 'Course Scenario Image', 'akaza-adventure' );

$section_class = 'sl-course-learning';
if ( '' !== $modifier ) {
	$section_class .= ' sl-course-learning--' . $modifier;
}
?>
<section class="<?php echo esc_attr( $section_class ); ?>">
	<div class="sl-course-learning__container">
		<div class="sl-course-learning__content">
			<?php if ( '' !== $eyebrow ) : ?>
				<span class="sl-course-learning__eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
			<?php endif; ?>

			<?php if ( '' !== $title_main || '' !== $title_highlight ) : ?>
				<h2 class="sl-course-learning__title">
					<?php echo esc_html( $title_main ); ?>
					<?php if ( '' !== $title_highlight ) : ?>
						<span class="sl-course-learning__title-highlight"><?php echo esc_html( $title_highlight ); ?></span>
					<?php endif; ?>
				</h2>
			<?php endif; ?>

			<?php if ( '' !== $description ) : ?>
				<div class="sl-course-learning__description">
					<p><?php echo esc_html( $description ); ?></p>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $points ) ) : ?>
				<ul class="sl-course-learning__points">
					<?php foreach ( $points as $point ) : ?>
						<?php
						$text = '';
						$icon = 'check-lg';

						if ( is_array( $point ) ) {
							$text = isset( $point['text'] ) ? (string) $point['text'] : '';
							$icon = isset( $point['icon'] ) ? (string) $point['icon'] : $icon;
						} else {
							$text = (string) $point;
						}

						if ( '' === $text ) {
							continue;
						}

						$icon = preg_replace( '/^bi[- ]?/', '', strtolower( trim( $icon ) ) );
						$icon = preg_replace( '/[^a-z0-9-]/', '', (string) $icon );
						if ( '' === $icon ) {
							$icon = 'check-lg';
						}
						?>
						<li class="sl-course-learning__point">
							<span class="sl-course-learning__point-icon" aria-hidden="true">
								<i class="bi bi-<?php echo esc_attr( $icon ); ?>"></i>
							</span>
							<p class="sl-course-learning__point-text"><?php echo esc_html( $text ); ?></p>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>

		<div class="sl-course-learning__visual">
			<?php if ( '' !== $image ) : ?>
				<div class="sl-course-learning__image-placeholder">
					<img
						class="sl-course-learning__image"
						src="<?php echo esc_url( $image ); ?>"
						alt="<?php echo esc_attr( $image_alt ); ?>"
					/>
				</div>
			<?php else : ?>
				<div class="sl-course-learning__image-placeholder">
					<span class="sl-course-learning__placeholder-text"><?php echo esc_html( $placeholder ); ?></span>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
