<?php
/**
 * Shared course localisation section.
 *
 * Args:
 * - modifier (string)
 * - eyebrow (string)
 * - title_main (string)
 * - title_highlight (string)
 * - description (string)
 * - callout_title (string)
 * - callout_text (string)
 * - callout_icon (string)
 * - regions (array<int,array{code:string,title:string,text:string}>)
 * - note (string)
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
$callout_title   = isset( $args['callout_title'] ) ? (string) $args['callout_title'] : '';
$callout_text    = isset( $args['callout_text'] ) ? (string) $args['callout_text'] : '';
$callout_icon    = isset( $args['callout_icon'] ) ? (string) $args['callout_icon'] : '◆';
$regions         = ( isset( $args['regions'] ) && is_array( $args['regions'] ) ) ? $args['regions'] : array();
$note            = isset( $args['note'] ) ? (string) $args['note'] : '';

$section_class = 'sl-course-localisation';
if ( '' !== $modifier ) {
	$section_class .= ' sl-course-localisation--' . $modifier;
}
?>
<section class="<?php echo esc_attr( $section_class ); ?>">
	<div class="sl-course-localisation__container">
		<div class="sl-course-localisation__intro">
			<?php if ( '' !== $eyebrow ) : ?>
				<span class="sl-course-localisation__eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
			<?php endif; ?>

			<?php if ( '' !== $title_main || '' !== $title_highlight ) : ?>
				<h2 class="sl-course-localisation__title">
					<?php if ( '' !== $title_main ) : ?>
						<span><?php echo esc_html( $title_main ); ?></span>
					<?php endif; ?>
					<?php if ( '' !== $title_highlight ) : ?>
						<span class="sl-course-localisation__title-highlight"><?php echo esc_html( $title_highlight ); ?></span>
					<?php endif; ?>
				</h2>
			<?php endif; ?>

			<?php if ( '' !== $description ) : ?>
				<div class="sl-course-localisation__description">
					<p><?php echo esc_html( $description ); ?></p>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( '' !== $callout_title || '' !== $callout_text ) : ?>
			<div class="sl-course-localisation__callout">
				<div class="sl-course-localisation__callout-icon" aria-hidden="true">
					<?php echo esc_html( $callout_icon ); ?>
				</div>
				<div class="sl-course-localisation__callout-content">
					<?php if ( '' !== $callout_title ) : ?>
						<h3 class="sl-course-localisation__callout-title"><?php echo esc_html( $callout_title ); ?></h3>
					<?php endif; ?>
					<?php if ( '' !== $callout_text ) : ?>
						<p class="sl-course-localisation__callout-text"><?php echo esc_html( $callout_text ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $regions ) ) : ?>
			<div class="sl-course-risk__grid sl-course-localisation__grid">
				<?php foreach ( $regions as $region ) : ?>
					<?php
					if ( ! is_array( $region ) ) {
						continue;
					}

					$code  = isset( $region['code'] ) ? (string) $region['code'] : '';
					$title = isset( $region['title'] ) ? (string) $region['title'] : '';
					$text  = isset( $region['text'] ) ? (string) $region['text'] : '';

					if ( '' === $title && '' === $text ) {
						continue;
					}
					?>
					<article class="sl-course-risk-card">
						<?php if ( '' !== $code ) : ?>
							<div class="sl-course-risk-card__icon"><?php echo esc_html( $code ); ?></div>
						<?php endif; ?>
						<?php if ( '' !== $title ) : ?>
							<h3 class="sl-course-risk-card__title"><?php echo esc_html( $title ); ?></h3>
						<?php endif; ?>
						<?php if ( '' !== $text ) : ?>
							<p class="sl-course-risk-card__text"><?php echo esc_html( $text ); ?></p>
						<?php endif; ?>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if ( '' !== $note ) : ?>
			<div class="sl-course-localisation__note">
				<p><?php echo esc_html( $note ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</section>
