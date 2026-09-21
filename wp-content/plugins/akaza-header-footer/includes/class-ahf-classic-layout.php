<?php
/**
 * Classic (non-Genesis) header shell for themes like Akaza.
 *
 * @package Akaza_Header_Footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Renders a full .site-header when Genesis is not available.
 */
class AHF_Classic_Layout {

	/**
	 * Register hooks.
	 */
	public static function init() {
		add_action( 'ahf_render_site_header', array( __CLASS__, 'render_header' ) );
		add_action( 'epsh_render_site_header', array( __CLASS__, 'render_header' ) ); // BC.
		add_filter( 'body_class', array( __CLASS__, 'body_class' ) );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_shell' ), 35 );
		add_action( 'wp_enqueue_scripts', array( 'AHF_Genesis_Layout', 'enqueue_sticky_header_assets' ), 40 );
		add_action( 'wp_head', array( 'AHF_Genesis_Layout', 'critical_header_css' ), 2 );
		add_action( 'template_redirect', array( __CLASS__, 'disable_builder_header_footer' ), 99 );
	}

	/**
	 * Stop Thim Elementor Kit / similar builders from replacing theme header.php / footer.php.
	 */
	public static function disable_builder_header_footer() {
		if ( ! self::should_render() ) {
			return;
		}

		if ( class_exists( '\Thim_EL_Kit\Modules\HeaderFooter\FrontEnd' ) ) {
			$fe = \Thim_EL_Kit\Modules\HeaderFooter\FrontEnd::instance();
			remove_action( 'get_header', array( $fe, 'override_header' ) );
			remove_action( 'get_footer', array( $fe, 'override_footer' ) );
		}

		// Elementor Theme Builder locations (if registered).
		if ( class_exists( '\ElementorPro\Plugin' ) && function_exists( 'elementor_theme_do_location' ) ) {
			add_filter( 'elementor/theme/get_location_templates/header', '__return_empty_array', 99 );
			add_filter( 'elementor/theme/get_location_templates/footer', '__return_empty_array', 99 );
		}
	}

	/**
	 * Whether classic header should render.
	 */
	public static function should_render() {
		if ( AHF_AMP::is_amp() || is_admin() ) {
			return false;
		}

		if ( ! AHF_Config::is_enabled() ) {
			return false;
		}

		return (bool) apply_filters( 'ahf_classic_header_should_render', true );
	}

	/**
	 * @param string[] $classes Body classes.
	 * @return string[]
	 */
	public static function body_class( $classes ) {
		if ( ! self::should_render() ) {
			return $classes;
		}

		$classes[] = 'epsh-classic-header';
		$classes[] = 'epsh-has-fixed-header';

		if ( AHF_Config::feature_enabled( 'smart_header_scroll' ) ) {
			$classes[] = 'epsh-smart-header';
		}

		if ( AHF_Config::feature_enabled( 'custom_desktop_menu' ) ) {
			$classes[] = 'epsh-custom-desktop-nav';
		}

		return $classes;
	}

	/**
	 * Ensure shell CSS loads on classic themes.
	 */
	public static function enqueue_shell() {
		if ( ! self::should_render() ) {
			return;
		}

		wp_enqueue_style(
			'epsh-header-shell',
			AHF_PLUGIN_URL . 'assets/css/header-shell.css',
			array(),
			AHF_VERSION
		);

		$css = '
			body.epsh-classic-header .site-header.epsh-site-header {
				background: #ffffff;
				border-bottom: 1px solid rgba(74, 74, 74, 0.35);
				box-shadow: none;
				padding-top: 0 !important;
				padding-bottom: 0 !important;
			}
			body.epsh-classic-header .site-header.epsh-site-header.epsh-header-scrolled {
				background: #ffffff;
				border-bottom: 1px solid rgba(74, 74, 74, 0.35);
				box-shadow: none;
				padding-top: 0 !important;
				padding-bottom: 0 !important;
			}
			body.epsh-classic-header .site-header .wrap {
				display: flex;
				align-items: center;
				justify-content: space-between;
				gap: 1rem;
				width: 100%;
				max-width: var(--epsh-header-content-max, 1290px);
				margin: 0 auto;
				padding: 10px var(--epsh-header-pad-x, 16px);
				box-sizing: border-box;
			}
			body.epsh-classic-header .title-area {
				flex: 0 0 auto;
				margin: 0;
				padding: 0;
			}
			body.epsh-classic-header .epsh-site-logo img {
				max-height: 56px;
				width: auto;
				height: auto;
			}
			@media (max-width: 1200px) {
				body.epsh-classic-header .site-header .wrap .epsh-desktop-nav-wrap,
				body.epsh-classic-header .site-header .wrap .epsh-header-extras-wrap {
					display: none !important;
				}
			}
		';
		wp_add_inline_style( 'epsh-header-shell', $css );
	}

	/**
	 * Output desktop site header (logo + nav + extras).
	 */
	public static function render_header() {
		if ( ! self::should_render() ) {
			return;
		}

		$config    = AHF_Config::get();
		$logo      = $config['logo'];
		$logo_src  = ! empty( $logo['scrolled_url'] ) ? $logo['scrolled_url'] : $logo['url'];
		?>
		<header class="site-header epsh-site-header" role="banner">
			<div class="wrap">
				<div class="title-area">
					<a class="epsh-site-logo" href="<?php echo esc_url( $logo['home'] ); ?>">
						<img
							class="epsh-site-logo__img"
							src="<?php echo esc_url( $logo_src ); ?>"
							alt="<?php echo esc_attr( $logo['alt'] ); ?>"
							width="150"
							height="50"
							fetchpriority="high"
							decoding="async"
						/>
					</a>
				</div>
				<?php
				if ( AHF_Config::feature_enabled( 'custom_desktop_menu' ) && class_exists( 'AHF_Custom_Nav' ) ) {
					AHF_Custom_Nav::render();
				}
				?>
			</div>
		</header><?php
	}
}
