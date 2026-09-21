<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
/**
 * Prefer Akaza Header Footer plugin. Minimal theme header is fallback only.
 */
if ( has_action( 'ahf_render_site_header' ) ) {
	do_action( 'ahf_render_site_header' );
} else {
	?>
	<header class="site-header" role="banner">
		<div class="site-header__inner">
			<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => 'nav',
					'container_class'=> 'site-nav',
					'fallback_cb'    => false,
				)
			);
			?>
		</div>
	</header>
	<?php
}
?>

<main id="main-content" class="site-main">
