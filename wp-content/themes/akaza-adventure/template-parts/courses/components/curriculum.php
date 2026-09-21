<?php
/**
 * Shared course curriculum section.
 *
 * Args:
 * - modifier (string)
 * - eyebrow (string)
 * - title_main (string)
 * - title_highlight (string)
 * - description (string)
 * - modules (array<int,array{number?:string,title:string,description?:string,link_text?:string,link_url?:string,link_modifier?:string}>)
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
$modules         = ( isset( $args['modules'] ) && is_array( $args['modules'] ) ) ? $args['modules'] : array();

$section_id    = isset( $args['id'] ) ? sanitize_html_class( (string) $args['id'] ) : 'course-curriculum';
$section_class = 'sl-course-curriculum';
if ( '' !== $modifier ) {
	$section_class .= ' sl-course-curriculum--' . $modifier;
}
?>
<section id="<?php echo esc_attr( $section_id ); ?>" class="<?php echo esc_attr( $section_class ); ?>">
	<div class="sl-course-curriculum__container">
		<div class="sl-course-curriculum__intro">
			<div class="sl-course-curriculum__heading">
				<?php if ( '' !== $eyebrow ) : ?>
					<span class="sl-course-curriculum__eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
				<?php endif; ?>

				<?php if ( '' !== $title_main || '' !== $title_highlight ) : ?>
					<h2 class="sl-course-curriculum__title">
						<?php if ( '' !== $title_main ) : ?>
							<span><?php echo esc_html( $title_main ); ?></span>
						<?php endif; ?>
						<?php if ( '' !== $title_highlight ) : ?>
							<span class="sl-course-curriculum__title-highlight"><?php echo esc_html( $title_highlight ); ?></span>
						<?php endif; ?>
					</h2>
				<?php endif; ?>

				<?php if ( '' !== $description ) : ?>
					<div class="sl-course-curriculum__description">
						<p><?php echo esc_html( $description ); ?></p>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<?php if ( ! empty( $modules ) ) : ?>
			<div class="sl-course-curriculum__grid">
				<?php foreach ( $modules as $index => $module ) : ?>
					<?php
					if ( ! is_array( $module ) ) {
						continue;
					}

					$title       = isset( $module['title'] ) ? (string) $module['title'] : '';
					$module_desc = isset( $module['description'] ) ? (string) $module['description'] : '';
					$number      = isset( $module['number'] ) ? (string) $module['number'] : sprintf( '%02d', $index + 1 );
					$link_text   = isset( $module['link_text'] ) ? (string) $module['link_text'] : '';
					$link_url    = isset( $module['link_url'] ) ? (string) $module['link_url'] : '';
					$link_mod    = isset( $module['link_modifier'] ) ? sanitize_html_class( (string) $module['link_modifier'] ) : '';

					if ( '' === $title && '' === $module_desc ) {
						continue;
					}

					$link_class = 'sl-course-module__link';
					if ( '' !== $link_mod ) {
						$link_class .= ' sl-course-module__link--' . $link_mod;
					}
					?>
					<article class="sl-course-module">
						<span class="sl-course-module__number"><?php echo esc_html( $number ); ?></span>
						<div class="sl-course-module__content">
							<?php if ( '' !== $title ) : ?>
								<h3 class="sl-course-module__title"><?php echo esc_html( $title ); ?></h3>
							<?php endif; ?>
							<?php if ( '' !== $module_desc ) : ?>
								<p class="sl-course-module__description"><?php echo esc_html( $module_desc ); ?></p>
							<?php endif; ?>
						</div>
						<?php if ( '' !== $link_text && '' !== $link_url ) : ?>
							<a href="<?php echo esc_url( $link_url ); ?>" class="<?php echo esc_attr( $link_class ); ?>">
								<?php echo esc_html( $link_text ); ?>
								<span aria-hidden="true">→</span>
							</a>
						<?php endif; ?>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
