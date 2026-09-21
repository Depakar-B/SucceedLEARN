<?php
/**
 * Mega Menu dropdown arrow fix (desktop, non-AMP).
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Mega menu stylesheet and responsive tweaks.
 */
class AHF_Mega_Menu {

	/**
	 * Register hooks.
	 */
	public static function init() {
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue' ), 25 );
		add_action( 'wp_head', array( __CLASS__, 'responsive_css' ), 20 );
	}

	/**
	 * Enqueue mega menu CSS.
	 */
	public static function enqueue() {
		if ( AHF_AMP::is_amp() || is_admin() ) {
			return;
		}

		wp_enqueue_style(
			'epsh-mega-menu',
			AHF_PLUGIN_URL . 'assets/css/mega-menu.css',
			array(),
			AHF_VERSION
		);
	}

	/**
	 * Inline responsive font sizes for mega menu links.
	 */
	public static function responsive_css() {
		if ( AHF_AMP::is_amp() ) {
			return;
		}

		$bp = (int) AHF_Config::get()['breakpoint'];
		$min_desktop = $bp + 1;
		?>
		<style id="epsh-mega-menu-responsive">
			@media (min-width: <?php echo (int) $min_desktop; ?>px) and (max-width: 1399px) {
				#mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > a.mega-menu-link {
					font-size: 13px !important;
					padding-top: .3rem;
					padding-bottom: .3rem;
				}
			}
			@media (min-width: 1400px) {
				#mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item > a.mega-menu-link {
					font-size: 14px !important;
					line-height: 1.1;
					padding-top: .35rem;
					padding-bottom: .35rem;
				}
			}
		</style>
		<?php
	}
}
