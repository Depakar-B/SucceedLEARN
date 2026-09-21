<?php
/**
 * Shared course delivery / LMS section.
 *
 * Args:
 * - modifier (string)
 * - eyebrow (string)
 * - title_lines (array<int,string>)
 * - title_highlight (string)
 * - description (string)
 * - cards (array<int,array{icon?:string,title:string,text?:string}>)
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$modifier        = isset( $args['modifier'] ) ? sanitize_html_class( (string) $args['modifier'] ) : '';
$eyebrow         = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$title_lines     = ( isset( $args['title_lines'] ) && is_array( $args['title_lines'] ) ) ? $args['title_lines'] : array();
$title_highlight = isset( $args['title_highlight'] ) ? (string) $args['title_highlight'] : '';
$description     = isset( $args['description'] ) ? (string) $args['description'] : '';
$cards           = ( isset( $args['cards'] ) && is_array( $args['cards'] ) ) ? $args['cards'] : array();

$section_class = 'sl-course-delivery';
if ( '' !== $modifier ) {
	$section_class .= ' sl-course-delivery--' . $modifier;
}
?>
<section class="<?php echo esc_attr( $section_class ); ?>">
	<div class="sl-course-delivery__container">
		<div class="sl-course-delivery__intro">
			<?php if ( '' !== $eyebrow ) : ?>
				<span class="sl-course-delivery__eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
			<?php endif; ?>

			<?php if ( ! empty( $title_lines ) || '' !== $title_highlight ) : ?>
				<h2 class="sl-course-delivery__title">
					<?php foreach ( $title_lines as $line ) : ?>
						<?php
						$line = (string) $line;
						if ( '' === $line ) {
							continue;
						}
						?>
						<span><?php echo esc_html( $line ); ?></span>
					<?php endforeach; ?>
					<?php if ( '' !== $title_highlight ) : ?>
						<span class="sl-course-delivery__title-highlight"><?php echo esc_html( $title_highlight ); ?></span>
					<?php endif; ?>
				</h2>
			<?php endif; ?>

			<?php if ( '' !== $description ) : ?>
				<p class="sl-course-delivery__description"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $cards ) ) : ?>
			<div class="sl-course-delivery__grid">
				<?php foreach ( $cards as $card ) : ?>
					<?php
					if ( ! is_array( $card ) ) {
						continue;
					}

					$icon  = isset( $card['icon'] ) ? (string) $card['icon'] : '';
					$title = isset( $card['title'] ) ? (string) $card['title'] : '';
					$text  = isset( $card['text'] ) ? (string) $card['text'] : '';

					if ( '' === $title && '' === $text ) {
						continue;
					}
					?>
					<article class="sl-course-delivery__card">
						<?php if ( '' !== $icon ) : ?>
							<div class="sl-course-delivery__card-icon" aria-hidden="true"><?php echo esc_html( $icon ); ?></div>
						<?php endif; ?>
						<?php if ( '' !== $title ) : ?>
							<h3 class="sl-course-delivery__card-title"><?php echo esc_html( $title ); ?></h3>
						<?php endif; ?>
						<?php if ( '' !== $text ) : ?>
							<p class="sl-course-delivery__card-text"><?php echo esc_html( $text ); ?></p>
						<?php endif; ?>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
