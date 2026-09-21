<?php
/**
 * Non-AMP mobile header markup.
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$config  = AHF_Config::get();
$logo    = $config['logo'];
$contact = $config['contact'];
$cta     = $config['cta'];
$logo_src = ! empty( $logo['scrolled_url'] ) ? $logo['scrolled_url'] : $logo['url'];
?>
<div class="epsh-mobile-only epsh-mobile-header-wrap" data-epsh-mobile-header>
	<div class="epsh-mobile-bar" id="epsh-mobile-bar">
		<a class="epsh-mobile-logo" href="<?php echo esc_url( $logo['home'] ); ?>">
			<img src="<?php echo esc_url( $logo_src ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" width="120" height="50" fetchpriority="high" loading="eager" decoding="async">
		</a>
		<button
			type="button"
			id="epsh-hamburger"
			class="epsh-hamburger"
			aria-label="<?php esc_attr_e( 'Open menu', 'akaza-header-footer' ); ?>"
			aria-expanded="false"
			aria-controls="epsh-mobile-menu"
		>
			<span class="epsh-hamburger-icon" aria-hidden="true">&#9776;</span>
		</button>
	</div>

	<div id="epsh-mobile-overlay" class="epsh-mobile-overlay" aria-hidden="true"></div>

	<nav
		id="epsh-mobile-menu"
		class="epsh-mobile-menu"
		aria-label="<?php esc_attr_e( 'Mobile navigation', 'akaza-header-footer' ); ?>"
		aria-hidden="true"
	>
		<button type="button" class="epsh-mobile-close" aria-label="<?php esc_attr_e( 'Close menu', 'akaza-header-footer' ); ?>">&times;</button>

		<?php AHF_Menu_Items::render_list( AHF_Menu_Items::get_mobile_items() ); ?>

		<div class="epsh-sidebar-contact">
			<a href="mailto:<?php echo esc_attr( $contact['email'] ); ?>" class="epsh-sidebar-email"><?php echo esc_html( $contact['email'] ); ?></a>
			<a href="<?php echo esc_url( AHF_Config::menu_url( $cta['url'] ) ); ?>" class="epsh-sidebar-cta"><?php echo esc_html( $cta['label'] ); ?></a>
		</div>
	</nav>
</div>
