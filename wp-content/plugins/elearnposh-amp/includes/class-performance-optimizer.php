<?php
/**
 * Performance Optimizer Class
 *
 * Optimizes CSS, scripts, and assets for better AMP performance
 *
 * @package ElearnPOSH\AMP
 */

namespace ElearnPOSH\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Performance Optimizer Class
 */
class Performance_Optimizer {

	/**
	 * Singleton instance
	 *
	 * @var Performance_Optimizer
	 */
	private static $instance = null;

	/**
	 * CSS cache directory
	 *
	 * @var string
	 */
	private $cache_dir;

	/**
	 * Get singleton instance
	 *
	 * @return Performance_Optimizer
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor
	 */
	private function __construct() {
		$upload_dir = wp_upload_dir();
		$this->cache_dir = $upload_dir['basedir'] . '/elearnposh-amp-cache/';
		
		// Create cache directory if it doesn't exist
		if ( ! file_exists( $this->cache_dir ) ) {
			wp_mkdir_p( $this->cache_dir );
		}
	}

	/**
	 * Initialize optimizer
	 */
	public function init() {
		// Add preconnect for Google Fonts
		add_action( 'amp_post_template_head', array( $this, 'add_preconnect' ), 1 );
		
		// Optimize Google Fonts loading
		add_filter( 'amp_post_template_font_urls', array( $this, 'optimize_google_fonts' ), 10, 1 );
	}

	/**
	 * Add preconnect for external resources
	 *
	 * @param object $amp_template AMP template object.
	 */
	public function add_preconnect( $amp_template ) {
		unset( $amp_template );
		?>
		<link rel="dns-prefetch" href="https://cdn.ampproject.org">
		<?php
	}

	/**
	 * Optimize Google Fonts URL
	 *
	 * @param array $font_urls Font URLs.
	 * @return array Optimized font URLs.
	 */
	public function optimize_google_fonts( $font_urls ) {
		// Add font-display=swap to Google Fonts URL
		if ( isset( $font_urls['source_serif_pro'] ) ) {
			$url = $font_urls['source_serif_pro'];
			if ( strpos( $url, 'display=' ) === false ) {
				$font_urls['source_serif_pro'] = add_query_arg( 'display', 'swap', $url );
			}
		}
		return $font_urls;
	}

	/**
	 * Minify CSS
	 *
	 * @param string $css CSS content.
	 * @return string Minified CSS.
	 */
	public function minify_css( $css ) {
		// Remove comments
		$css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
		
		// Remove whitespace
		$css = preg_replace( '/\s+/', ' ', $css );
		
		// Remove spaces around specific characters
		$css = preg_replace( '/\s*([{}:;,])\s*/', '$1', $css );

		// Restore descendant combinator before pseudo-class functions (minify must not turn "#id :where(" into "#id:where(").
		$css = preg_replace( '/([\w\])#])(:where|:not|:is|:has)\(/', '$1 $2(', $css );
		
		// Remove trailing semicolons
		$css = preg_replace( '/;}/', '}', $css );
		
		// Remove leading zeros
		$css = preg_replace( '/\b0+\./', '.', $css );
		
		// Trim
		$css = trim( $css );
		
		return $css;
	}

	/**
	 * Get optimized CSS for page type
	 *
	 * @param string $page_type Page type (home, course, blog, etc.).
	 * @param array  $style_files Array of style file names to include.
	 * @return string Optimized CSS.
	 */
	public function get_optimized_css( $page_type, $style_files = array() ) {
		$style_files = array_values(
			array_unique(
				array_merge(
					array( 'bottom-bar', 'demo-btn', 'breadcrumbs' ),
					(array) $style_files
				)
			)
		);
		$cache_key  = $page_type . '_' . md5( implode( ',', $style_files ) ) . '_' . ELEARNPOSH_AMP_VERSION . '_' . $this->get_style_files_mtime_hash( $style_files );
		$cache_file = $this->cache_dir . $cache_key . '.css';
		
		// Check cache
		if ( file_exists( $cache_file ) && ! $this->is_cache_expired( $cache_file ) ) {
			return file_get_contents( $cache_file );
		}
		
		// Build CSS
		$css = '';
		foreach ( $style_files as $file ) {
			$file_path = ELEARNPOSH_AMP_TEMPLATES_DIR . 'styles/' . $file . '.php';
			if ( file_exists( $file_path ) ) {
				ob_start();
				include $file_path;
				$file_css = ob_get_clean();
				
				// Remove PHP tags and comments if any
				$file_css = preg_replace( '/<\?php.*?\?>/s', '', $file_css );
				$file_css = preg_replace( '/\/\*.*?\*\//s', '', $file_css );
				
				$css .= $file_css . "\n";
			}
		}
		
		// Minify CSS
		$css = $this->minify_css( $css );

		if ( '' === trim( $css ) ) {
			return '';
		}

		// Cache the result (skip if uploads dir is not writable).
		if ( is_writable( $this->cache_dir ) ) {
			// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_file_put_contents
			file_put_contents( $cache_file, $css );
		}

		return $css;
	}

	/**
	 * Hash of latest modification time for style partials (auto-bust cache on file edits).
	 *
	 * @param array $style_files Style file names without extension.
	 * @return string
	 */
	private function get_style_files_mtime_hash( $style_files ) {
		$max_mtime = 0;
		foreach ( (array) $style_files as $file ) {
			$path = ELEARNPOSH_AMP_TEMPLATES_DIR . 'styles/' . $file . '.php';
			if ( is_readable( $path ) ) {
				$max_mtime = max( $max_mtime, (int) filemtime( $path ) );
			}
		}
		$footer_component = ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/footer.php';
		if ( is_readable( $footer_component ) ) {
			$max_mtime = max( $max_mtime, (int) filemtime( $footer_component ) );
		}
		$bottom_bar_component = ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/bottom-bar.php';
		if ( is_readable( $bottom_bar_component ) ) {
			$max_mtime = max( $max_mtime, (int) filemtime( $bottom_bar_component ) );
		}
		$bottom_bar_styles = ELEARNPOSH_AMP_TEMPLATES_DIR . 'styles/bottom-bar.php';
		if ( is_readable( $bottom_bar_styles ) ) {
			$max_mtime = max( $max_mtime, (int) filemtime( $bottom_bar_styles ) );
		}
		return (string) $max_mtime;
	}

	/**
	 * Check if cache is expired
	 *
	 * @param string $cache_file Cache file path.
	 * @return bool True if expired.
	 */
	private function is_cache_expired( $cache_file ) {
		// Cache expires after 24 hours
		$cache_time = 24 * HOUR_IN_SECONDS;
		return ( time() - filemtime( $cache_file ) ) > $cache_time;
	}

	/**
	 * Clear CSS cache
	 */
	public function clear_cache() {
		$files = glob( $this->cache_dir . '*.css' );
		if ( $files ) {
			foreach ( $files as $file ) {
				@unlink( $file );
			}
		}

		$upload_dir = wp_upload_dir();
		if ( empty( $upload_dir['basedir'] ) ) {
			return;
		}
		$tree_shaking_dir = trailingslashit( $upload_dir['basedir'] ) . 'ampforwp-tree-shaking/';
		$tree_files       = glob( $tree_shaking_dir . '*.css' );
		if ( $tree_files ) {
			foreach ( $tree_files as $file ) {
				@unlink( $file );
			}
		}
	}

	/**
	 * Get required AMP components for page
	 *
	 * @param string $page_type Page type.
	 * @param array  $additional_components Additional components needed.
	 * @return array Array of required AMP component scripts.
	 */
	public function get_required_components( $page_type, $additional_components = array() ) {
		$components = array();

		if ( function_exists( 'elearnposh_amp_load_contact_mail_helpers' ) ) {
			elearnposh_amp_load_contact_mail_helpers();
		}
		
		// Base components needed on all pages
		$base_components = array(
			'amp-sidebar' => 'https://cdn.ampproject.org/v0/amp-sidebar-0.1.js',
			'amp-accordion' => 'https://cdn.ampproject.org/v0/amp-accordion-0.1.js',
			'amp-bind' => 'https://cdn.ampproject.org/v0/amp-bind-0.1.js',
			'amp-form' => 'https://cdn.ampproject.org/v0/amp-form-0.1.js',
			'amp-mustache' => 'https://cdn.ampproject.org/v0/amp-mustache-0.2.js',
			'amp-position-observer' => 'https://cdn.ampproject.org/v0/amp-position-observer-0.1.js',
			'amp-animation' => 'https://cdn.ampproject.org/v0/amp-animation-0.1.js',
		);
		
		// Page-specific components
		$page_components = array(
			'home' => array(
				'amp-video' => 'https://cdn.ampproject.org/v0/amp-video-0.1.js',
				'amp-youtube' => 'https://cdn.ampproject.org/v0/amp-youtube-0.1.js',
			),
			'course' => array(
				'amp-carousel' => 'https://cdn.ampproject.org/v0/amp-carousel-0.1.js',
				'amp-youtube' => 'https://cdn.ampproject.org/v0/amp-youtube-0.1.js',
				'amp-iframe' => 'https://cdn.ampproject.org/v0/amp-iframe-0.1.js',
				'amp-image-lightbox' => 'https://cdn.ampproject.org/v0/amp-image-lightbox-0.1.js',
			),
			'blog' => array(
				'amp-social-share' => 'https://cdn.ampproject.org/v0/amp-social-share-0.1.js',
				'amp-form'         => 'https://cdn.ampproject.org/v0/amp-form-0.1.js',
				'amp-mustache'     => 'https://cdn.ampproject.org/v0/amp-mustache-0.2.js',
				'amp-lightbox'     => 'https://cdn.ampproject.org/v0/amp-lightbox-0.1.js',
			),
			'newsletter' => array(
				'amp-social-share' => 'https://cdn.ampproject.org/v0/amp-social-share-0.1.js',
				'amp-form'         => 'https://cdn.ampproject.org/v0/amp-form-0.1.js',
				'amp-mustache'     => 'https://cdn.ampproject.org/v0/amp-mustache-0.2.js',
			),
			'posh-compliance-audit' => array(
				'amp-form'      => 'https://cdn.ampproject.org/v0/amp-form-0.1.js',
				'amp-lightbox'  => 'https://cdn.ampproject.org/v0/amp-lightbox-0.1.js',
				'amp-mustache'  => 'https://cdn.ampproject.org/v0/amp-mustache-0.2.js',
				'amp-bind'      => 'https://cdn.ampproject.org/v0/amp-bind-0.1.js',
				'amp-accordion' => 'https://cdn.ampproject.org/v0/amp-accordion-0.1.js',
			),
			'our-webinars' => array(
				'amp-form'     => 'https://cdn.ampproject.org/v0/amp-form-0.1.js',
				'amp-lightbox' => 'https://cdn.ampproject.org/v0/amp-lightbox-0.1.js',
				'amp-mustache' => 'https://cdn.ampproject.org/v0/amp-mustache-0.2.js',
				'amp-bind'     => 'https://cdn.ampproject.org/v0/amp-bind-0.1.js',
			),
			'press-media' => array(),
			'enterprise-features' => array(),
			'posh-act' => array(
				'amp-youtube' => 'https://cdn.ampproject.org/v0/amp-youtube-0.1.js',
				'amp-accordion' => 'https://cdn.ampproject.org/v0/amp-accordion-0.1.js',
			),
			'contact' => array(
				'amp-form' => 'https://cdn.ampproject.org/v0/amp-form-0.1.js',
				'amp-mustache' => 'https://cdn.ampproject.org/v0/amp-mustache-0.2.js',
			),
		);
		
		// Merge components
		$components = array_merge( $base_components, $page_components[ $page_type ] ?? array() );

		if (
			function_exists( 'elearnposh_recaptcha_amp_required' )
			&& elearnposh_recaptcha_amp_required()
			&& (
				isset( $components['amp-form'] )
				|| in_array( 'amp-form', $additional_components, true )
			)
		) {
			$components['amp-recaptcha-input'] = 'https://cdn.ampproject.org/v0/amp-recaptcha-input-0.1.js';
		}
		
		// Add additional components
		if ( ! empty( $additional_components ) ) {
			$additional = array();
			foreach ( $additional_components as $component ) {
				// Handle special cases for version numbers
				$version = '0.1';
				if ( $component === 'amp-mustache' ) {
					$version = '0.2';
				}
				$script_url = 'https://cdn.ampproject.org/v0/' . $component . '-' . $version . '.js';
				$additional[ $component ] = $script_url;
			}
			$components = array_merge( $components, $additional );
		}
		
		return $components;
	}

	/**
	 * Output AMP component scripts
	 *
	 * @param string $page_type Page type.
	 * @param array  $additional_components Additional components.
	 */
	public function output_amp_components( $page_type, $additional_components = array() ) {
		$components = $this->get_required_components( $page_type, $additional_components );
		
		foreach ( $components as $component => $script_url ) {
			// Determine if it's a custom-element or custom-template
			$type = ( $component === 'amp-mustache' ) ? 'custom-template' : 'custom-element';
			?>
			<script async <?php echo esc_attr( $type ); ?>="<?php echo esc_attr( $component ); ?>" src="<?php echo esc_url( $script_url ); ?>"></script>
			<?php
		}
	}
}

