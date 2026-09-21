<?php
/**
 * Desktop site search: icon, Solutions-sized panel, AJAX suggestions.
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Site search UI + AJAX for the desktop header.
 */
class AHF_Site_Search {

	/**
	 * Register hooks.
	 */
	public static function init() {
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_styles' ), 30 );
		add_action( 'wp_ajax_ahf_site_search', array( __CLASS__, 'ajax_search' ) );
		add_action( 'wp_ajax_nopriv_ahf_site_search', array( __CLASS__, 'ajax_search' ) );
		// BC for older localized configs.
		add_action( 'wp_ajax_epsh_site_search', array( __CLASS__, 'ajax_search' ) );
		add_action( 'wp_ajax_nopriv_epsh_site_search', array( __CLASS__, 'ajax_search' ) );
		add_action( 'wp_footer', array( __CLASS__, 'render_panel' ), 20 );
		add_action( 'wp_footer', array( __CLASS__, 'print_boot_script' ), 25 );
	}

	/**
	 * Whether desktop search should load.
	 */
	public static function should_load() {
		if ( AHF_AMP::is_amp() || is_admin() ) {
			return false;
		}

		if ( ! AHF_Config::feature_enabled( 'custom_desktop_menu' ) ) {
			return false;
		}

		return (bool) apply_filters( 'ahf_site_search_enabled', true );
	}

	/**
	 * Always load search CSS on desktop so the icon is not styled as a Genesis button.
	 */
	public static function enqueue_styles() {
		if ( ! self::should_load() ) {
			return;
		}

		wp_enqueue_style(
			'epsh-site-search',
			AHF_PLUGIN_URL . 'assets/css/site-search.css',
			array( 'epsh-desktop-nav' ),
			AHF_VERSION
		);

		// Critical overrides so Autoptimize / delayed CSS cannot leave a Genesis dark button.
		wp_add_inline_style(
			'epsh-site-search',
			'.epsh-header-extras-wrap button.epsh-search-toggle,button.epsh-search-toggle{display:inline-flex!important;align-items:center!important;justify-content:center!important;width:38px!important;height:38px!important;min-width:38px!important;padding:0!important;margin:0!important;border:1px solid transparent!important;border-radius:10px!important;background:transparent!important;background-color:transparent!important;box-shadow:none!important;color:#16234e!important;font-size:0!important;line-height:0!important}@media (min-width:1201px){body.epsh-classic-header .site-header button.epsh-search-toggle,body.epsh-smart-header .site-header button.epsh-search-toggle,body.epsh-smart-header .genesis-header button.epsh-search-toggle{color:#16234e!important}}.epsh-header-extras-wrap button.epsh-search-toggle:hover,.epsh-header-extras-wrap button.epsh-search-toggle[aria-expanded=true],button.epsh-search-toggle:hover,button.epsh-search-toggle[aria-expanded=true]{background:rgba(22,35,78,.08)!important;color:#16234e!important}.epsh-search-panel[hidden],.epsh-search-backdrop[hidden],.epsh-search-panel:not(.is-visible){display:none!important}'
		);
	}

	/**
	 * Search icon markup for desktop extras wrap.
	 *
	 * @return string
	 */
	public static function render_toggle_button() {
		if ( ! self::should_load() ) {
			return '';
		}

		ob_start();
		?>
		<div class="epsh-search-wrap">
			<button
				type="button"
				id="epsh-search-toggle"
				class="epsh-search-toggle"
				aria-expanded="false"
				aria-controls="epsh-search-panel"
				aria-label="<?php esc_attr_e( 'Open search', 'akaza-header-footer' ); ?>"
			>
				<svg class="epsh-search-toggle__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
					<circle cx="11" cy="11" r="6.5" stroke="currentColor" stroke-width="1.75"></circle>
					<path d="M16.5 16.5L21 21" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"></path>
				</svg>
			</button>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Panel markup in footer (desktop only).
	 */
	public static function render_panel() {
		if ( ! self::should_load() ) {
			return;
		}

		$template = AHF_PLUGIN_DIR . 'templates/search-panel.php';
		if ( is_readable( $template ) ) {
			include $template;
		}
	}

	/**
	 * Tiny bootloader: lazy-loads JS on first icon click (CSS already enqueued).
	 */
	public static function print_boot_script() {
		if ( ! self::should_load() ) {
			return;
		}

		$config = array(
			'ajaxUrl'    => admin_url( 'admin-ajax.php' ),
			'action'     => 'ahf_site_search',
			'minChars'   => 2,
			'debounce'   => 400,
			'jsUrl'      => AHF_PLUGIN_URL . 'assets/js/site-search.js?ver=' . rawurlencode( AHF_VERSION ),
			'searchPage' => home_url( '/' ),
			'i18n'       => array(
				'open'      => __( 'Open search', 'akaza-header-footer' ),
				'close'     => __( 'Close search', 'akaza-header-footer' ),
				'searching' => __( 'Searching...', 'akaza-header-footer' ),
				'noResults' => __( 'No results for "%s"', 'akaza-header-footer' ),
				'viewAll'   => __( 'View all results', 'akaza-header-footer' ),
				'hint'      => __( 'Type at least 2 characters to search', 'akaza-header-footer' ),
				'unavailable' => __( 'Search is temporarily unavailable', 'akaza-header-footer' ),
			),
		);
		?>
		<script id="epsh-site-search-boot">
		window.ahfSiteSearch = <?php echo wp_json_encode( $config ); ?>;
		(function () {
			var loaded = false;
			var toggle = document.getElementById('epsh-search-toggle');
			if (!toggle) return;

			function loadAssets(cb) {
				if (loaded) { cb(); return; }
				if (window.ahfSiteSearchApp) {
					loaded = true;
					cb();
					return;
				}
				var cfg = window.ahfSiteSearch || {};
				var script = document.createElement('script');
				script.src = cfg.jsUrl;
				script.id = 'epsh-site-search-js';
				script.onload = function () {
					loaded = true;
					cb();
				};
				script.onerror = function () { cb(); };
				document.head.appendChild(script);
			}

			toggle.addEventListener('click', function (e) {
				e.preventDefault();
				loadAssets(function () {
					if (window.ahfSiteSearchApp && typeof window.ahfSiteSearchApp.toggle === 'function') {
						window.ahfSiteSearchApp.toggle();
					}
				});
			});
		})();
		</script>
		<?php
	}

	/**
	 * AJAX: return suggest-mode JSON results.
	 */
	public static function ajax_search() {
		$query = isset( $_REQUEST['q'] ) ? sanitize_text_field( wp_unslash( (string) $_REQUEST['q'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		if ( ! function_exists( 'ep_site_search' ) ) {
			$candidates = array(
				get_stylesheet_directory() . '/lib/ep-site-search.php',
				get_template_directory() . '/lib/ep-site-search.php',
			);
			foreach ( $candidates as $helper ) {
				if ( is_readable( $helper ) ) {
					require_once $helper;
					break;
				}
			}
		}

		if ( ! function_exists( 'ep_site_search' ) ) {
			wp_send_json_error( array( 'message' => __( 'Search unavailable', 'akaza-header-footer' ) ), 500 );
		}

		$payload = ep_site_search(
			$query,
			array(
				'mode'     => 'suggest',
				'per_page' => 8,
			)
		);

		wp_send_json_success( $payload );
	}
}