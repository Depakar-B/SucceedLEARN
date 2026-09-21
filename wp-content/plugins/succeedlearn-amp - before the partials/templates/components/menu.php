<?php
/**
 * AMP site header + sidebar menu.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$branding = succeedlearn_amp_get_header_branding();
?>
<div id="sl-page-top"></div>
<?php succeedlearn_amp_render_nav_sidebar(); ?>
<header class="amp-site-header">
	<div class="amp-site-header__inner">
		<a class="amp-site-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<amp-img
				src="<?php echo esc_url( $branding['logo_url'] ); ?>"
				width="140"
				height="48"
				layout="fixed"
				alt="<?php echo esc_attr( $branding['logo_alt'] ); ?>"
			></amp-img>
		</a>
		<button
			type="button"
			class="amp-site-header__toggle"
			on="tap:sidebar.toggle"
			aria-label="<?php esc_attr_e( 'Open menu', 'succeedlearn-amp' ); ?>"
		>
			<span></span><span></span><span></span>
		</button>
	</div>
</header>
