<?php
/**
 * Shared course audience section.
 *
 * Args:
 * - modifier (string)
 * - eyebrow (string)
 * - title_main (string)
 * - title_highlight (string)
 * - description (string)
 * - points (array<int,string|array{text:string,icon?:string}>)
 * - badge_value (string)
 * - badge_text (string)
 * - image (string)
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
$badge_value     = isset( $args['badge_value'] ) ? (string) $args['badge_value'] : '';
$badge_text      = isset( $args['badge_text'] ) ? (string) $args['badge_text'] : '';
$image           = isset( $args['image'] ) ? (string) $args['image'] : '';
$image_alt       = isset( $args['image_alt'] ) ? (string) $args['image_alt'] : '';
$placeholder     = isset( $args['placeholder'] ) ? (string) $args['placeholder'] : __( 'DRIVE SAFE', 'akaza-adventure' );

$section_class = 'sl-course-audience';
if ( '' !== $modifier ) {
	$section_class .= ' sl-course-audience--' . $modifier;
}
?>
<section class="<?php echo esc_attr( $section_class ); ?>">
	<div class="sl-course-audience__container">
		<div class="sl-course-audience__visual">
			<div class="sl-course-audience__media">
				<?php if ( '' !== $image ) : ?>
					<img
						class="sl-course-audience__image"
						src="<?php echo esc_url( $image ); ?>"
						alt="<?php echo esc_attr( $image_alt ); ?>"
					/>
				<?php else : ?>
					<div class="sl-course-audience__placeholder" aria-hidden="true">
						<span class="sl-course-audience__road"><?php echo esc_html( $placeholder ); ?></span>
					</div>
				<?php endif; ?>

				<?php if ( '' !== $badge_value || '' !== $badge_text ) : ?>
					<div class="sl-course-audience__badge">
						<?php if ( '' !== $badge_value ) : ?>
							<strong><?php echo esc_html( $badge_value ); ?></strong>
						<?php endif; ?>
						<?php if ( '' !== $badge_text ) : ?>
							<span><?php echo esc_html( $badge_text ); ?></span>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="sl-course-audience__content">
			<?php if ( '' !== $eyebrow ) : ?>
				<span class="sl-course-audience__eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
			<?php endif; ?>

			<?php if ( '' !== $title_main || '' !== $title_highlight ) : ?>
				<h2 class="sl-course-audience__title">
					<?php echo esc_html( $title_main ); ?>
					<?php if ( '' !== $title_highlight ) : ?>
						<span class="sl-course-audience__title-highlight"><?php echo esc_html( $title_highlight ); ?></span>
					<?php endif; ?>
				</h2>
			<?php endif; ?>

			<?php if ( '' !== $description ) : ?>
				<div class="sl-course-audience__description">
					<p><?php echo esc_html( $description ); ?></p>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $points ) ) : ?>
				<ul class="sl-course-audience__points">
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
	</div>
</section>
