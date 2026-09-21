<?php
/**
 * Infosec 2026 Cyber (UK) — document header shell (no default site header).
 *
 * @package Akaza_Adventure
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<meta name="theme-color" content="#1472ba">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'slf-body sl-infosec-landing sl-infosec-landing--uk' ); ?>>
<?php wp_body_open(); ?>
<a class="slf-skip-link" href="#main-content"><?php esc_html_e( 'Skip to content', 'akaza-adventure' ); ?></a>
<?php get_template_part( 'template-parts/infosec-2026-cyber-uk/sl-infosec-2026-header' ); ?>
