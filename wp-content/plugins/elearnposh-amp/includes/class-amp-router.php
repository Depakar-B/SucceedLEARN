<?php
/**
 * AMP routing for all plugin custom AMP pages.
 *
 * Genesis child theme sets ampforwp_disable_mobile_amp_redirect => true globally.
 * This class re-enables mobile/tablet AMP redirect and adds server + JS fallbacks
 * on mobile and tablet only (desktop keeps the normal theme view).
 *
 * @package ElearnPOSH\AMP
 */

namespace ElearnPOSH\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Ensures custom AMP pages load on mobile/tablet; desktop uses the theme.
 */
class Amp_Router {
	/**
	 * @var Config
	 */
	private $config;

	/**
	 * @param Config $config Config instance.
	 */
	public function __construct( Config $config ) {
		$this->config = $config;
	}

	/**
	 * Register hooks.
	 */
	public function init() {
		add_action( 'plugins_loaded', array( $this, 'enable_amp_post_meta_for_new_pages' ), 25 );

		add_filter( 'ampforwp_disable_mobile_amp_redirect', array( $this, 'allow_mobile_amp_redirect_for_new_pages' ), 99999 );
		add_filter( 'ampforwp_cpt_support', array( $this, 'ensure_page_cpt_support' ) );
		add_filter( 'ampforwp_custom_post_supported', array( $this, 'force_amp_for_new_custom_pages' ), 10, 3 );
		add_filter( 'ampforwp_posts_to_remove_from_amp', array( $this, 'allow_new_custom_pages_in_amp' ), 10, 1 );
		add_filter( 'amp_is_enabled', array( $this, 'force_amp_is_enabled' ), 100, 2 );
		add_filter( 'ampforwp_is_non_amp', array( $this, 'force_amp_capable_on_custom_pages' ), 99999 );

		add_action( 'parse_request', array( $this, 'early_amp_page_setup' ), 1 );
		add_action( 'wp', array( $this, 'ensure_amp_post_meta_on_request' ), 5 );
		add_action( 'template_redirect', array( $this, 'early_amp_page_setup' ), 0 );
		add_action( 'wp', array( $this, 'maybe_redirect_custom_pages_to_amp' ), 1 );
		add_action( 'wp', array( $this, 'maybe_redirect_custom_pages_to_amp' ), 99 );
		add_action( 'template_redirect', array( $this, 'maybe_redirect_custom_pages_to_amp' ), 1 );
		add_action( 'wp_head', array( $this, 'print_amp_redirect_script' ), 0 );
		add_action( 'wp_footer', array( $this, 'print_amp_redirect_script' ), 99 );
	}

	/**
	 * Re-enable AMPforWP mobile redirect for plugin custom AMP pages.
	 *
	 * @param bool $disable Whether mobile AMP redirect is disabled.
	 * @return bool
	 */
	public function allow_mobile_amp_redirect_for_new_pages( $disable ) {
		if ( $this->is_plugin_amp_page_request() && $this->is_mobile_or_tablet_request() ) {
			return false;
		}
		return $disable;
	}

	/**
	 * Force AMP on when AMPforWP or theme would block it.
	 *
	 * @param bool $enabled  Whether AMP is enabled.
	 * @param int  $post_id  Post ID (optional).
	 * @return bool
	 */
	public function force_amp_is_enabled( $enabled, $post_id = 0 ) {
		$post_id = $post_id ? absint( $post_id ) : $this->resolve_request_page_id();
		if ( ! $post_id ) {
			return $enabled;
		}
		if ( $this->config->is_non_amp_page( $post_id ) ) {
			return false;
		}
		if ( $this->config->is_plugin_custom_amp_page( $post_id ) ) {
			return true;
		}
		return $enabled;
	}

	/**
	 * Tell AMPforWP the page is AMP-capable (not "non-AMP only").
	 *
	 * @param bool $is_non_amp Whether the page is non-AMP only.
	 * @return bool
	 */
	public function force_amp_capable_on_custom_pages( $is_non_amp ) {
		if ( $this->is_non_amp_page_request() ) {
			return true;
		}
		if ( $this->is_plugin_amp_page_request() ) {
			return false;
		}
		return $is_non_amp;
	}

	/**
	 * Enable AMP post meta early (before AMPforWP mobile redirect runs).
	 */
	public function early_amp_page_setup() {
		if ( is_admin() || wp_doing_ajax() || wp_doing_cron() || $this->is_serving_amp() ) {
			return;
		}
		if ( $this->is_non_amp_page_request() ) {
			$this->disable_amp_for_non_amp_page();
			return;
		}
		if ( ! $this->is_plugin_amp_page_request() ) {
			return;
		}
		$post_id = $this->resolve_request_page_id();
		if ( ! $post_id ) {
			$map_key = $this->resolve_map_key_from_request();
			if ( $map_key ) {
				$post_id = $this->config->resolve_page_id_by_map_key( $map_key );
			}
		}
		if ( $post_id ) {
			update_post_meta( $post_id, 'ampforwp-amp-on-off', 'enabled' );
			delete_post_meta( $post_id, 'ampforwp-amp-on-off', 'disable' );
		}
	}

	/**
	 * Ensure AMPforWP per-page meta is "enabled" on each visit.
	 */
	public function ensure_amp_post_meta_on_request() {
		$this->early_amp_page_setup();
	}

	/**
	 * Detect any plugin custom AMP page (any device; used for meta + AMP support).
	 *
	 * @return bool
	 */
	private function is_plugin_amp_page_request() {
		if ( $this->is_non_amp_page_request() ) {
			return false;
		}

		// Never treat blog/newsletter singles as plugin AMP redirect targets.
		if ( is_singular( 'post' ) ) {
			return false;
		}

		if ( function_exists( 'is_front_page' ) && is_front_page() ) {
			return true;
		}

		if ( $this->resolve_map_key_from_request() ) {
			return true;
		}

		$post_id = $this->resolve_request_page_id();
		if ( $post_id && $this->config->is_plugin_custom_amp_page( $post_id ) ) {
			return true;
		}

		return $this->request_matches_slugs( $this->config->get_plugin_amp_redirect_slugs() );
	}

	/**
	 * HTML sitemap and other theme-only pages (no plugin AMP template or redirect).
	 *
	 * @return bool
	 */
	private function is_non_amp_page_request() {
		$post_id = $this->resolve_request_page_id();
		if ( $post_id && $this->config->is_non_amp_page( $post_id ) ) {
			return true;
		}
		return $this->request_matches_slugs( Config::get_non_amp_page_slugs() );
	}

	/**
	 * Turn off AMPforWP for pages that must use the regular theme view.
	 */
	private function disable_amp_for_non_amp_page() {
		$post_id = $this->resolve_request_page_id();
		if ( ! $post_id ) {
			foreach ( Config::get_non_amp_page_slugs() as $slug ) {
				$page = get_page_by_path( $slug );
				if ( $page && ! is_wp_error( $page ) ) {
					$post_id = absint( $page->ID );
					break;
				}
			}
		}
		if ( $post_id ) {
			update_post_meta( $post_id, 'ampforwp-amp-on-off', 'disable' );
		}
	}

	/**
	 * Redirect canonical URL to AMP for plugin custom pages (mobile/tablet only).
	 */
	public function maybe_redirect_custom_pages_to_amp() {
		if ( ! $this->is_plugin_amp_page_request() || ! $this->is_mobile_or_tablet_request() ) {
			return;
		}
		$this->perform_amp_redirect();
	}

	/**
	 * Shared redirect logic (mobile + tablet only).
	 */
	private function perform_amp_redirect() {
		if ( is_admin() || wp_doing_ajax() || wp_doing_cron() || ! $this->is_mobile_or_tablet_request() ) {
			return;
		}

		if ( isset( $_GET['noamp'] ) ) {
			$noamp = sanitize_text_field( wp_unslash( $_GET['noamp'] ) );
			if ( in_array( $noamp, array( 'mobile', '1', 'true' ), true ) ) {
				return;
			}
		}

		if ( $this->is_serving_amp() ) {
			return;
		}

		$post_id = $this->resolve_request_page_id();
		if ( ! $post_id ) {
			$map_key = $this->resolve_map_key_from_request();
			if ( $map_key ) {
				$post_id = $this->config->resolve_page_id_by_map_key( $map_key );
			}
		}
		if ( ! $post_id ) {
			return;
		}

		$amp_url = $this->get_amp_permalink( $post_id );
		if ( empty( $amp_url ) ) {
			return;
		}

		$preserve = wp_unslash( $_GET );
		unset( $preserve['noamp'] );
		if ( ! empty( $preserve ) ) {
			$amp_url = add_query_arg( $preserve, $amp_url );
		}

		$current_url = $this->get_current_request_url();
		if ( $this->should_skip_amp_redirect( $current_url, $amp_url ) ) {
			return;
		}

		if ( ! headers_sent() ) {
			header( 'Cache-Control: private, no-store, no-cache, must-revalidate' );
			nocache_headers();
		}

		wp_safe_redirect( $amp_url, 302 );
		exit;
	}

	/**
	 * JS fallback when theme/cache blocks PHP redirect (mobile/tablet only).
	 */
	public function print_amp_redirect_script() {
		if ( $this->is_serving_amp() || ! $this->is_plugin_amp_page_request() ) {
			return;
		}

		$post_id = $this->resolve_request_page_id();
		if ( ! $post_id ) {
			$map_key = $this->resolve_map_key_from_request();
			if ( $map_key ) {
				$post_id = $this->config->resolve_page_id_by_map_key( $map_key );
			}
		}
		if ( ! $post_id ) {
			return;
		}
		$amp_url = $this->get_amp_permalink( $post_id );
		if ( empty( $amp_url ) ) {
			return;
		}
		$server_mobile = $this->is_mobile_or_tablet_request();
		?>
		<script>
		(function () {
			var doc = document.documentElement;
			if (doc && (doc.hasAttribute('amp') || doc.hasAttribute('\u26a1'))) {
				return;
			}
			var serverMobile = <?php echo wp_json_encode( $server_mobile ); ?>;
			var isTouchTablet = (navigator.maxTouchPoints || 0) > 1 && window.matchMedia('(max-width: 1024px)').matches;
			var isNarrowViewport = window.matchMedia('(max-width: 1024px)').matches;
			if (!serverMobile && !isTouchTablet && !isNarrowViewport) {
				return;
			}
			var target = <?php echo wp_json_encode( $amp_url ); ?>;
			try {
				var next = new URL(target, window.location.origin);
				var here = window.location.href.split('#')[0];
				var there = next.href.split('#')[0];
				if (here === there) {
					return;
				}
				window.location.replace(next.href);
			} catch (e) {
				var sep = window.location.search ? '&' : '?';
				window.location.replace(window.location.pathname + window.location.search + sep + 'amp=1');
			}
		})();
		</script>
		<?php
	}

	/**
	 * Resolve page ID from main query or URL slug.
	 *
	 * Only returns IDs for real plugin AMP pages. Must not fall back to posh-act
	 * (that incorrectly redirected blog/newsletter posts to /posh-act/amp/ on mobile).
	 *
	 * @return int
	 */
	private function resolve_request_page_id() {
		if ( is_singular( 'page' ) ) {
			$id = absint( get_queried_object_id() );
			if ( $id ) {
				return $id;
			}
		}

		// Blog/newsletter singles are not plugin AMP redirect pages.
		if ( is_singular( 'post' ) ) {
			return 0;
		}

		$segments = $this->get_request_path_segments();
		if ( empty( $segments ) ) {
			return 0;
		}

		$paths_to_try = array();
		for ( $i = 0, $count = count( $segments ); $i < $count; $i++ ) {
			$paths_to_try[] = implode( '/', array_slice( $segments, $i ) );
		}

		foreach ( $paths_to_try as $path ) {
			$page = get_page_by_path( $path );
			if ( $page && ! is_wp_error( $page ) ) {
				return absint( $page->ID );
			}
		}

		foreach ( $this->config->get_plugin_amp_redirect_slugs() as $slug ) {
			if ( in_array( $slug, $segments, true ) ) {
				$map_key = $this->map_slug_to_config_key( $slug );
				if ( $map_key ) {
					$resolved = $this->config->resolve_page_id_by_map_key( $map_key );
					if ( $resolved ) {
						return $resolved;
					}
				}
				$page = get_page_by_path( $slug );
				if ( $page && ! is_wp_error( $page ) ) {
					return absint( $page->ID );
				}
			}
		}

		return 0;
	}

	/**
	 * @param string $slug Post slug from URL.
	 * @return string Map key or empty string.
	 */
	private function map_slug_to_config_key( $slug ) {
		$aliases = array(
			'webinars'                   => 'our-webinars',
			'press'                      => 'press-media',
			'frequently-asked-questions' => 'faq',
			'poshact'                    => 'posh-act',
		);
		if ( isset( $aliases[ $slug ] ) ) {
			return $aliases[ $slug ];
		}
		foreach ( Config::get_amp_page_map() as $map_key => $definition ) {
			if ( empty( $definition['slugs'] ) ) {
				continue;
			}
			if ( in_array( $slug, (array) $definition['slugs'], true ) ) {
				return $map_key;
			}
		}
		return '';
	}

	/**
	 * Lowercase path segments from the request URI.
	 *
	 * @return array<string>
	 */
	private function get_request_path_segments() {
		$uri  = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
		$path = wp_parse_url( $uri, PHP_URL_PATH );
		if ( ! is_string( $path ) || '' === $path ) {
			return array();
		}
		$segments = explode( '/', trim( strtolower( $path ), '/' ) );
		return array_values( array_filter( $segments ) );
	}

	/**
	 * Whether the request path contains one of the given page slugs.
	 *
	 * @param array<string> $slugs Page slugs.
	 * @return bool
	 */
	private function request_matches_slugs( array $slugs ) {
		$segments = $this->get_request_path_segments();
		if ( empty( $segments ) ) {
			return false;
		}
		foreach ( $slugs as $slug ) {
			if ( in_array( sanitize_title( $slug ), $segments, true ) ) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Whether the request is from a phone or tablet (not desktop).
	 *
	 * @return bool
	 */
	private function is_mobile_or_tablet_request() {
		if ( function_exists( 'wp_is_mobile' ) && wp_is_mobile() ) {
			return true;
		}

		if ( isset( $_SERVER['HTTP_SEC_CH_UA_MOBILE'] ) ) {
			$hint = sanitize_text_field( wp_unslash( $_SERVER['HTTP_SEC_CH_UA_MOBILE'] ) );
			if ( '?1' === $hint ) {
				return true;
			}
		}

		if ( isset( $_SERVER['HTTP_SEC_CH_UA_PLATFORM'] ) ) {
			$platform = strtolower( sanitize_text_field( wp_unslash( $_SERVER['HTTP_SEC_CH_UA_PLATFORM'] ) ) );
			if ( false !== strpos( $platform, 'ios' ) || false !== strpos( $platform, 'ipad' ) || false !== strpos( $platform, 'android' ) ) {
				return true;
			}
		}

		$ua = isset( $_SERVER['HTTP_USER_AGENT'] ) ? strtolower( sanitize_text_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) ) ) : '';
		if ( '' === $ua ) {
			return false;
		}

		// Tablets (incl. iPad and Android tablets without "Mobile" in UA).
		if ( preg_match( '/ipad|tablet|playbook|silk|(android(?!.*mobile))/i', $ua ) ) {
			return true;
		}

		// iPadOS 13+ may report as Macintosh in the UA string.
		if ( preg_match( '/macintosh/i', $ua ) && preg_match( '/version\/[\d.]+.*safari/i', $ua ) && ! preg_match( '/chrome|crios|fxios|edgios/i', $ua ) ) {
			if ( isset( $_SERVER['HTTP_SEC_CH_UA_PLATFORM'] ) ) {
				$platform = strtolower( sanitize_text_field( wp_unslash( $_SERVER['HTTP_SEC_CH_UA_PLATFORM'] ) ) );
				if ( false !== strpos( $platform, 'ios' ) || false !== strpos( $platform, 'ipad' ) ) {
					return true;
				}
			}
		}

		return false;
	}

	/**
	 * Whether WordPress is rendering an AMP response.
	 *
	 * @return bool
	 */
	private function is_serving_amp() {
		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
			return true;
		}
		if ( function_exists( 'ampforwp_is_amp_endpoint' ) && ampforwp_is_amp_endpoint() ) {
			return true;
		}
		if ( function_exists( 'amp_is_request' ) && amp_is_request() ) {
			return true;
		}
		if ( isset( $_GET['amp'] ) ) {
			return true;
		}
		$uri = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
		return (bool) preg_match( '#(/amp/?$|/amp/|[?&]amp=)#i', $uri );
	}

	/**
	 * Map key from the current URL, if any.
	 *
	 * @return string
	 */
	private function resolve_map_key_from_request() {
		foreach ( $this->get_request_path_segments() as $segment ) {
			$map_key = $this->map_slug_to_config_key( $segment );
			if ( $map_key ) {
				return $map_key;
			}
		}
		return '';
	}

	/**
	 * @param int $post_id Post ID.
	 * @return string
	 */
	private function get_amp_permalink( $post_id ) {
		$url = get_permalink( $post_id );
		if ( ! $url ) {
			return '';
		}

		$candidates = array();
		if ( function_exists( 'ampforwp_amp_nonamp_convert' ) ) {
			$candidates[] = ampforwp_amp_nonamp_convert( $url, 'amp' );
		}
		if ( function_exists( 'amp_add_paired_endpoint' ) ) {
			$candidates[] = amp_add_paired_endpoint( $url );
		}

		$canonical = untrailingslashit( $url );
		foreach ( $candidates as $candidate ) {
			if ( ! empty( $candidate ) && untrailingslashit( $candidate ) !== $canonical ) {
				return $candidate;
			}
		}

		$trail = trailingslashit( $url );
		if ( false === strpos( $trail, '/amp/' ) ) {
			return $trail . 'amp/';
		}

		return add_query_arg( 'amp', '1', $url );
	}

	/**
	 * @return string
	 */
	private function get_current_request_url() {
		$host = isset( $_SERVER['HTTP_HOST'] ) ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_HOST'] ) ) : '';
		$uri  = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
		if ( empty( $host ) || empty( $uri ) ) {
			return '';
		}
		$scheme = is_ssl() ? 'https' : 'http';
		return $scheme . '://' . $host . $uri;
	}

	/**
	 * Whether redirect should be skipped (already on AMP or same full URL).
	 *
	 * @param string $current_url Current URL.
	 * @param string $amp_url     Target AMP URL.
	 * @return bool
	 */
	private function should_skip_amp_redirect( $current_url, $amp_url ) {
		if ( $this->is_serving_amp() ) {
			return true;
		}
		if ( empty( $current_url ) || empty( $amp_url ) ) {
			return false;
		}
		$current_norm = strtolower( untrailingslashit( $current_url ) );
		$amp_norm     = strtolower( untrailingslashit( $amp_url ) );
		return $current_norm === $amp_norm;
	}

	/**
	 * One-time: AMPforWP per-page meta "enabled" for all plugin AMP pages.
	 */
	public function enable_amp_post_meta_for_new_pages() {
		$flag = 'elearnposh_amp_all_plugin_pages_meta_v3';
		if ( get_option( $flag ) ) {
			return;
		}

		foreach ( $this->config->get_plugin_amp_page_ids() as $page_id ) {
			if ( get_post_status( $page_id ) ) {
				update_post_meta( $page_id, 'ampforwp-amp-on-off', 'enabled' );
				delete_post_meta( $page_id, 'ampforwp-amp-on-off', 'disable' );
			}
		}

		foreach ( array_keys( Config::get_amp_page_map() ) as $map_key ) {
			$page_id = $this->config->resolve_page_id_by_map_key( $map_key );
			if ( ! $page_id || ! get_post_status( $page_id ) ) {
				continue;
			}
			if ( $this->config->is_non_amp_page( $page_id ) ) {
				update_post_meta( $page_id, 'ampforwp-amp-on-off', 'disable' );
				continue;
			}
			update_post_meta( $page_id, 'ampforwp-amp-on-off', 'enabled' );
			delete_post_meta( $page_id, 'ampforwp-amp-on-off', 'disable' );
 		}

		update_option( $flag, 1 );
	}

	/**
	 * @param array $post_types Supported post types.
	 * @return array
	 */
	public function ensure_page_cpt_support( $post_types ) {
		if ( ! is_array( $post_types ) ) {
			$post_types = array();
		}
		if ( ! in_array( 'page', $post_types, true ) ) {
			$post_types[] = 'page';
		}
		return array_unique( $post_types );
	}

	/**
	 * @param bool        $supported Whether AMP is supported.
	 * @param int|string  $arg2      Post ID or post type.
	 * @param string|null $arg3      Post type when $arg2 is post ID.
	 * @return bool
	 */
	public function force_amp_for_new_custom_pages( $supported, $arg2 = 0, $arg3 = null ) {
		$post_id = $this->resolve_post_id_from_ampforwp_args( $arg2, $arg3 );
		if ( ! $post_id ) {
			$post_id = $this->resolve_request_page_id();
		}
		if ( $post_id && $this->config->is_plugin_custom_amp_page( $post_id ) ) {
			return true;
		}
		return $supported;
	}

	/**
	 * @param int|string  $arg2 Post ID or post type.
	 * @param string|null $arg3 Post type.
	 * @return int
	 */
	private function resolve_post_id_from_ampforwp_args( $arg2, $arg3 ) {
		if ( is_numeric( $arg2 ) && absint( $arg2 ) > 0 ) {
			return absint( $arg2 );
		}
		if ( is_page() ) {
			return absint( get_queried_object_id() );
		}
		return 0;
	}

	/**
	 * @param array $exclude_ids Post IDs excluded from AMP.
	 * @return array
	 */
	public function allow_new_custom_pages_in_amp( $exclude_ids ) {
		if ( ! is_array( $exclude_ids ) ) {
			return $exclude_ids;
		}
		$allow_ids = $this->config->get_plugin_amp_page_ids();
		if ( empty( $allow_ids ) ) {
			return $exclude_ids;
		}
		return array_values( array_diff( array_map( 'absint', $exclude_ids ), $allow_ids ) );
	}
}
