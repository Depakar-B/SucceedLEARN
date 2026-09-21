<?php
/**
 * Inner page hero.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = isset( $args['eyebrow'] ) ? $args['eyebrow'] : '';
$title   = isset( $args['title'] ) ? $args['title'] : get_the_title();
$lead    = isset( $args['lead'] ) ? $args['lead'] : '';
?>
<header class="slf-page-hero">
	<?php
	if ( function_exists( 'akaza_render_hero_breadcrumbs' ) ) {
		akaza_render_hero_breadcrumbs();
	}
	?>
	<?php if ( $eyebrow ) : ?>
		<p class="slf-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
	<?php endif; ?>
	<h1><?php echo esc_html( $title ); ?></h1>
	<?php if ( $lead ) : ?>
		<p class="slf-lead"><?php echo esc_html( $lead ); ?></p>
	<?php endif; ?>
</header>
