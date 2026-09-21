<?php
/**
 * Desktop primary menu: contact block + CTA.
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Appends contact info and demo CTA to the primary menu.
 */
class AHF_Desktop_Menu {

	/**
	 * Register hooks.
	 */
	public static function init() {
		// Run late so legacy/theme filters execute first and can be cleaned up.
		add_filter( 'wp_nav_menu_items', array( __CLASS__, 'append_extras' ), 999, 2 );
		add_action( 'after_setup_theme', array( __CLASS__, 'disable_legacy_filter' ), 100 );
	}

	/**
	 * @param string   $menu Menu HTML.
	 * @param stdClass $args Menu args.
	 * @return string
	 */
	public static function append_extras( $menu, $args ) {
		if ( AHF_AMP::is_amp() ) {
			return $menu;
		}

		$menu = self::sanitize_existing_extras( $menu );

		$config   = AHF_Config::get();
		$location = $config['primary_menu_location'];

		if ( empty( $args->theme_location ) || $location !== $args->theme_location ) {
			return $menu;
		}

		$contact = $config['contact'];
		$icons   = $config['icons'];
		$cta     = $config['cta'];

		$email = esc_html( $contact['email'] );

		$contact_block = sprintf(
			'<div class="epsh-header-contact" style="display:inline-block;text-align:left;margin-right:5px;line-height:1.3;font-family:\'Space Grotesk\',system-ui,sans-serif;">
				<div class="epsh-header-email" style="color:black;font-size:13px;display:flex;align-items:center;gap:6px;">
					<img src="%1$s" alt="" width="16" height="16" loading="lazy">
					<a href="mailto:%2$s" style="color:black;text-decoration:none;">%2$s</a>
				</div>
			</div>',
			esc_url( $icons['email'] ),
			$email
		);

		$button = sprintf(
			'<a class="epsh-btn-posh-a btn-posh-a" href="%1$s"><span class="epsh-btn-posh btn-posh">%2$s</span></a>',
			esc_url( AHF_Config::menu_url( $cta['url'] ) ),
			esc_html( $cta['label'] )
		);

		return $menu . $contact_block . $button;
	}

	/**
	 * Remove legacy/duplicate extras from menu markup before appending plugin extras.
	 *
	 * @param string $menu Menu HTML.
	 * @return string
	 */
	private static function sanitize_existing_extras( $menu ) {
		// Remove legacy theme contact block.
		$menu = preg_replace(
			'~<div class="header-contact-block".*?</div>\s*</div>~is',
			'',
			$menu
		);

		// Remove legacy theme CTA markup (<a class="btn-posh-a"><button class="btn-posh">...).
		$menu = preg_replace(
			'~<a class="btn-posh-a"[^>]*>\s*<button class="btn-posh"[^>]*>.*?</button>\s*</a>~is',
			'',
			$menu
		);

		// Remove already-injected plugin extras so repeated filter runs still output only one block.
		$menu = preg_replace(
			'~<div class="epsh-header-contact".*?</div>\s*</div>~is',
			'',
			$menu
		);
		$menu = preg_replace(
			'~<a class="epsh-btn-posh-a btn-posh-a"[^>]*>.*?</a>~is',
			'',
			$menu
		);

		return $menu;
	}

	/**
	 * Disable old child-theme desktop extra injector when present.
	 */
	public static function disable_legacy_filter() {
		if ( function_exists( 'ep_header_desktop_menu_extras' ) ) {
			remove_filter( 'wp_nav_menu_items', 'ep_header_desktop_menu_extras', 10 );
		}
	}
}
