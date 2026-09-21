<?php
/**
 * Shared legal page hero.
 *
 * Args:
 * - eyebrow (string)
 * - title   (string)
 * - lead    (string)
 * - id      (string) optional heading id suffix
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : __( 'Legal', 'akaza-adventure' );
$title   = isset( $args['title'] ) ? (string) $args['title'] : '';
$lead    = isset( $args['lead'] ) ? (string) $args['lead'] : '';
$id      = isset( $args['id'] ) ? sanitize_html_class( (string) $args['id'] ) : 'legal';
$title_id = 'sl-' . $id . '-hero-title';
?>
<section class="sl-legal-hero" aria-labelledby="<?php echo esc_attr( $title_id ); ?>">
	<div class="sl-legal-hero__container">
		<?php
		if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
			akaza_render_hero_breadcrumbs();
		}
		?>

		<?php if ( '' !== $eyebrow ) : ?>
			<span class="sl-home-sub-heading"><?php echo esc_html( $eyebrow ); ?></span>
		<?php endif; ?>

		<?php if ( '' !== $title ) : ?>
			<h1 id="<?php echo esc_attr( $title_id ); ?>" class="sl-legal-hero__title">
				<?php echo esc_html( $title ); ?>
			</h1>
		<?php endif; ?>

		<?php if ( '' !== $lead ) : ?>
			<p class="sl-legal-hero__lead"><?php echo esc_html( $lead ); ?></p>
		<?php endif; ?>
	</div>
</section>
