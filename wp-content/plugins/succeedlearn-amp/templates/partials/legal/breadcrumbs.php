<?php
/**
 * Legal AMP — Breadcrumbs.
 *
 * Expected vars: $home_amp, $breadcrumb_label
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<nav class="sl-legal-amp__crumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'succeedlearn-amp' ); ?>">
	<a href="<?php echo esc_url( $home_amp ); ?>"><?php esc_html_e( 'Home', 'succeedlearn-amp' ); ?></a>
	<span aria-hidden="true"> / </span>
	<span><?php echo esc_html( $breadcrumb_label ); ?></span>
</nav>
