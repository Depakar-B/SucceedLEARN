<?php
/**
 * AMP Menu Component with Sidebar
 *
 * @package ElearnPOSH\AMP
 *
 * Header menu and sidebar navigation for AMP pages.
 * Menu items + URLs mirror elearnposh-site-header mobile nav (EPSH_Menu_Items).
 * Styles live in templates/styles/menu.php (amp-custom).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$branding = elearnposh_amp_get_header_branding();
?>

<span id="ep-page-top" class="ep-page-top" tabindex="-1" aria-hidden="true"></span>

<?php
$ep_amp_edit_post_id = absint( get_queried_object_id() );
if ( is_user_logged_in() && $ep_amp_edit_post_id && current_user_can( 'edit_post', $ep_amp_edit_post_id ) ) {
	$ep_amp_edit_url = get_edit_post_link( $ep_amp_edit_post_id, 'raw' );
	if ( $ep_amp_edit_url ) :
		?>
		<div class="elearnposh-amp-admin-toolbar" role="navigation" aria-label="<?php esc_attr_e( 'Admin shortcuts', 'elearnposh-amp' ); ?>">
			<a class="elearnposh-amp-admin-toolbar__link" href="<?php echo esc_url( $ep_amp_edit_url ); ?>"><?php esc_html_e( 'Edit Page', 'elearnposh-amp' ); ?></a>
			<a class="elearnposh-amp-admin-toolbar__link" href="<?php echo esc_url( admin_url() ); ?>"><?php esc_html_e( 'Dashboard', 'elearnposh-amp' ); ?></a>
		</div>
		<?php
	endif;
}
?>

<amp-sidebar id="sidebar" layout="nodisplay" side="right">
	<button
		type="button"
		class="close-btn"
		on="tap:sidebar.close"
		role="button"
		tabindex="0"
		aria-label="<?php esc_attr_e( 'Close menu', 'elearnposh-amp' ); ?>"
	>&times;</button>

	<nav class="amp-mobile-menu" aria-label="<?php esc_attr_e( 'Mobile navigation', 'elearnposh-amp' ); ?>">
		<?php elearnposh_amp_render_nav_sidebar(); ?>
	</nav>

	<?php elearnposh_amp_render_nav_contact(); ?>
</amp-sidebar>

<header class="amp-site-header">
	<div class="menu-bar" aria-label="<?php esc_attr_e( 'Main navigation', 'elearnposh-amp' ); ?>">
		<div class="logo">
			<a href="<?php echo esc_url( $branding['home'] ); ?>" target="_top" aria-label="<?php esc_attr_e( 'Go to homepage', 'elearnposh-amp' ); ?>">
				<amp-img
					src="<?php echo esc_url( $branding['logo_url'] ); ?>"
					layout="fixed"
					width="120"
					height="50"
					class="amp-logo"
					alt="<?php echo esc_attr( $branding['logo_alt'] ); ?>"
				></amp-img>
			</a>
		</div>
		<button
			type="button"
			id="sidebar-menu-btn"
			on="tap:sidebar.toggle"
			role="button"
			tabindex="0"
			aria-label="<?php esc_attr_e( 'Open navigation menu', 'elearnposh-amp' ); ?>"
			aria-expanded="false"
		>&#9776;</button>
	</div>
</header>
<?php
if ( function_exists( 'elearnposh_amp_render_fixed_widgets' ) ) {
	elearnposh_amp_render_fixed_widgets();
}
