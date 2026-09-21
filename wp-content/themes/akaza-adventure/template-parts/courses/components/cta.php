<?php
/**
 * Shared course CTA / demo form section.
 *
 * Args:
 * - modifier (string)
 * - eyebrow (string)
 * - title_main (string)
 * - title_highlight (string)
 * - description (string)
 * - points (array<int,string>)
 * - form_title (string)
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
$form_title      = isset( $args['form_title'] ) ? (string) $args['form_title'] : __( 'Request a course demo', 'akaza-adventure' );

$section_class = 'sl-course-cta';
if ( '' !== $modifier ) {
	$section_class .= ' sl-course-cta--' . $modifier;
}

$form_shortcode = sprintf(
	'[contact_form form_variant="course" title="%s"]',
	esc_attr( $form_title )
);
?>
<section id="contact" class="<?php echo esc_attr( $section_class ); ?>">
	<div class="sl-course-cta__container">
		<div class="sl-course-cta__content">
			<?php if ( '' !== $eyebrow ) : ?>
				<span class="sl-course-cta__eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
			<?php endif; ?>

			<?php if ( '' !== $title_main || '' !== $title_highlight ) : ?>
				<h2 class="sl-course-cta__title">
					<?php echo esc_html( $title_main ); ?>
					<?php if ( '' !== $title_highlight ) : ?>
						<span class="sl-course-cta__title-highlight"><?php echo esc_html( $title_highlight ); ?></span>
					<?php endif; ?>
				</h2>
			<?php endif; ?>

			<?php if ( '' !== $description ) : ?>
				<p class="sl-course-cta__description"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>

			<?php if ( ! empty( $points ) ) : ?>
				<ul class="sl-course-cta__points">
					<?php foreach ( $points as $point ) : ?>
						<?php
						$point = (string) $point;
						if ( '' === $point ) {
							continue;
						}
						?>
						<li class="sl-course-cta__point">
							<span class="sl-course-cta__point-icon" aria-hidden="true">✓</span>
							<span><?php echo esc_html( $point ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>

		<div class="sl-course-cta__form">
			<?php
			if ( shortcode_exists( 'contact_form' ) ) {
				echo do_shortcode( $form_shortcode );
			} elseif ( shortcode_exists( 'succeedlearn_course_form' ) ) {
				echo do_shortcode( sprintf( '[succeedlearn_course_form title="%s"]', esc_attr( $form_title ) ) );
			}
			?>
		</div>
	</div>
</section>
