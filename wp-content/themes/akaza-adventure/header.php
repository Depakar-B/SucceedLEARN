<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<meta name="theme-color" content="#16234d">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'slf-body' ); ?>>
<?php
wp_body_open();
?>
<a class="slf-skip-link" href="#main-content"><?php esc_html_e( 'Skip to content', 'akaza-adventure' ); ?></a>
<?php
/**
 * Prefer Akaza Header Footer plugin. Theme header is fallback only.
 * Opt-in landings use secondary global header + footer chrome.
 */
if ( function_exists( 'akaza_uses_secondary_header' ) && akaza_uses_secondary_header() ) {
	get_template_part( 'template-parts/global/secondary-header' );
} elseif ( has_action( 'ahf_render_site_header' ) ) {
	do_action( 'ahf_render_site_header' );
} else {
	get_template_part(
		'template-parts/site-header',
		null,
		array(
			'variant' => is_front_page() ? 'overlay' : 'solid',
		)
	);
}
