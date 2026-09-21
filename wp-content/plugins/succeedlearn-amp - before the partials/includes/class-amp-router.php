<?php
/**
 * AMP Router — mobile/tablet redirect to AMP for plugin pages.
 *
 * @package SucceedLEARN\AMP
 */

namespace SucceedLEARN\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Amp_Router — mobile/tablet AMP redirect for plugin pages.
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

	public function init() {
		add_filter( 'request', array( $this, 'force_front_page_on_homepage_amp' ), 1 );
		add_action( 'init', array( $this, 'add_homepage_amp_rewrite' ), 30 );
		add_action( 'plugins_loaded', array( $this, 'enable_amp_post_meta_for_plugin_pages' ), 30 );
		add_filter( 'ampforwp_disable_mobile_amp_redirect', array( $this, 'allow_mobile_amp_redirect' ), 99999 );
		add_filter( 'ampforwp_cpt_support', array( $this, 'ensure_page_cpt_support' ) );
		add_filter( 'amp_is_enabled', array( $this, 'force_amp_is_enabled' ), 100 );
		add_filter( 'ampforwp_is_non_amp', array( $this, 'force_amp_capable' ), 99999 );

		add_action( 'wp', array( $this, 'ensure_amp_post_meta_on_request' ), 1 );
		add_action( 'wp', array( $this, 'force_category_archive_amp_support' ), 0 );
		add_action( 'wp', array( $this, 'maybe_redirect' ), 1 );
		add_action( 'wp', array( $this, 'maybe_redirect' ), 99 );
		add_action( 'template_redirect', array( $this, 'maybe_redirect' ), 1 );
		add_action( 'template_redirect', array( $this, 'force_category_archive_amp_support' ), 0 );

		add_action( 'wp_head', array( $this, 'print_amp_redirect_script' ), 1 );
		add_action( 'wp_footer', array( $this, 'print_amp_redirect_script' ), 1 );
	}

	/**
	 * Ensure AMPforWP allows category archives so /category/{slug}/amp/ is not stripped.
	 */
	public function force_category_archive_amp_support() {
		$is_category = method_exists( $this->config, 'is_category_archive_request' ) && $this->config->is_category_archive_request();
		$is_courses  = method_exists( $this->config, 'is_courses_archive_request' ) && $this->config->is_courses_archive_request();

		if ( ! $is_category && ! $is_courses ) {
			return;
		}

		global $redux_builder_amp;
		if ( ! is_array( $redux_builder_amp ) ) {
			$redux_builder_amp = (array) get_option( 'redux_builder_amp', array() );
		}

		$redux_builder_amp['ampforwp-archive-support'] = 1;
		if ( $is_category ) {
			$redux_builder_amp['ampforwp-archive-support-cat'] = 1;
		}
	}

	/**
	 * Map AMPforWP homepage /amp/ rewrite to the static front page (not posts).
	 *
	 * @param array $query_vars Query vars.
	 * @return array
	 */
	public function force_front_page_on_homepage_amp( $query_vars ) {
		if ( ! is_array( $query_vars ) || ! array_key_exists( 'amp', $query_vars ) ) {
			return $query_vars;
		}

		if ( ! $this->config->request_is_site_home_path() ) {
			return $query_vars;
		}

		$front_id = absint( get_option( 'page_on_front' ) );
		if ( ! $front_id || 'page' !== get_option( 'show_on_front' ) ) {
			return $query_vars;
		}

		$reserved = array( 'amp' => true, 'paged' => true );
		foreach ( array_keys( $query_vars ) as $key ) {
			if ( isset( $reserved[ $key ] ) ) {
				continue;
			}
			if ( '' !== $query_vars[ $key ] && null !== $query_vars[ $key ] && false !== $query_vars[ $key ] ) {
				return $query_vars;
			}
		}

		$query_vars['page_id'] = $front_id;
		unset( $query_vars['pagename'], $query_vars['name'], $query_vars['error'] );

		return $query_vars;
	}

	/**
	 * Prefer a homepage AMP rewrite that includes the static front page ID.
	 */
	public function add_homepage_amp_rewrite() {
		$front_id = absint( get_option( 'page_on_front' ) );
		if ( ! $front_id || 'page' !== get_option( 'show_on_front' ) ) {
			return;
		}

		add_rewrite_rule(
			'amp/?$',
			'index.php?amp=1&page_id=' . $front_id,
			'top'
		);
	}

	/**
	 * Enable AMP meta on plugin-managed pages that have a custom template.
	 */
	public function enable_amp_post_meta_for_plugin_pages() {
		$ids = array();

		$front_id = absint( get_option( 'page_on_front' ) );
		if ( $front_id ) {
			$ids[] = $front_id;
		}

		foreach ( Config::get_amp_page_map() as $type => $map ) {
			$template = isset( $map['template'] ) ? SUCCEEDLEARN_AMP_TEMPLATES_DIR . $map['template'] . '.php' : '';
			if ( ! $template || ! is_readable( $template ) ) {
				continue;
			}

			if ( in_array( $type, array( 'home', 'single_post', 'category', 'courses' ), true ) ) {
				continue;
			}

			$settings_key = isset( $map['settings_key'] ) ? (string) $map['settings_key'] : '';
			if ( $settings_key ) {
				$configured = absint( $this->config->get( $settings_key, 0 ) );
				if ( $configured ) {
					$ids[] = $configured;
				}
			}

			$slugs = isset( $map['slugs'] ) ? (array) $map['slugs'] : array();
			foreach ( $slugs as $slug ) {
				$page = get_page_by_path( $slug );
				if ( $page ) {
					$ids[] = absint( $page->ID );
				}
			}
		}

		foreach ( array_unique( array_filter( $ids ) ) as $post_id ) {
			update_post_meta( $post_id, 'ampforwp-amp-on-off', 'enabled' );
		}
	}

	/**
	 * Re-enable mobile AMP redirect when theme/AMPforWP disabled it globally.
	 *
	 * @param bool $disabled Whether redirect is disabled.
	 * @return bool
	 */
	public function allow_mobile_amp_redirect( $disabled ) {
		if ( $this->is_plugin_amp_page_request() && $this->is_mobile_or_tablet_request() ) {
			return false;
		}
		return $disabled;
	}

	/**
	 * @param array $cpts Supported CPTs.
	 * @return array
	 */
	public function ensure_page_cpt_support( $cpts ) {
		if ( ! is_array( $cpts ) ) {
			$cpts = array();
		}
		if ( ! in_array( 'page', $cpts, true ) ) {
			$cpts[] = 'page';
		}
		if ( ! in_array( 'post', $cpts, true ) ) {
			$cpts[] = 'post';
		}
		foreach ( array( 'lp_course', 'course' ) as $course_pt ) {
			if ( post_type_exists( $course_pt ) && ! in_array( $course_pt, $cpts, true ) ) {
				$cpts[] = $course_pt;
			}
		}
		return $cpts;
	}

	/**
	 * @param bool $enabled Whether AMP is enabled.
	 * @return bool
	 */
	public function force_amp_is_enabled( $enabled ) {
		if ( $this->is_plugin_amp_page_request() ) {
			return true;
		}
		return $enabled;
	}

	/**
	 * @param bool $is_non_amp Whether treated as non-AMP.
	 * @return bool
	 */
	public function force_amp_capable( $is_non_amp ) {
		if ( $this->is_plugin_amp_page_request() ) {
			return false;
		}
		return $is_non_amp;
	}

	public function ensure_amp_post_meta_on_request() {
		if ( ! $this->is_plugin_amp_page_request() ) {
			return;
		}
		$post_id = $this->resolve_request_page_id();
		if ( $post_id ) {
			update_post_meta( $post_id, 'ampforwp-amp-on-off', 'enabled' );
		}
	}

	public function maybe_redirect() {
		if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
			return;
		}

		if ( $this->is_serving_amp() ) {
			return;
		}

		if ( isset( $_GET['noamp'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return;
		}

		if ( ! $this->is_plugin_amp_page_request() ) {
			return;
		}

		if ( ! $this->is_mobile_or_tablet_request() ) {
			return;
		}

		$this->perform_amp_redirect();
	}

	/**
	 * @return bool
	 */
	public function is_plugin_amp_page_request() {
		$page_type = $this->resolve_request_page_type();
		if ( ! $page_type ) {
			return false;
		}

		$map = Config::get_amp_page_map();
		if ( empty( $map[ $page_type ]['template'] ) ) {
			return false;
		}

		$template = SUCCEEDLEARN_AMP_TEMPLATES_DIR . $map[ $page_type ]['template'] . '.php';
		return is_readable( $template );
	}

	/**
	 * @return string
	 */
	private function resolve_request_page_type() {
		if ( method_exists( $this->config, 'is_category_archive_request' ) && $this->config->is_category_archive_request() ) {
			return 'category';
		}

		if ( method_exists( $this->config, 'is_courses_archive_request' ) && $this->config->is_courses_archive_request() ) {
			return 'courses';
		}

		if ( method_exists( $this->config, 'is_newsletter_page_request' ) && $this->config->is_newsletter_page_request() ) {
			return 'newsletter';
		}

		$req_id = $this->resolve_request_page_id();
		$slug   = '';

		if ( $req_id ) {
			$post = get_post( $req_id );
			if ( $post ) {
				$slug = (string) $post->post_name;
			}
		}

		return $this->config->resolve_amp_page_type( $req_id, $slug );
	}

	/**
	 * @return int
	 */
	private function resolve_request_page_id() {
		if ( is_singular() ) {
			return absint( get_queried_object_id() );
		}

		$front_id = absint( get_option( 'page_on_front' ) );
		if ( $front_id && function_exists( 'is_front_page' ) && is_front_page() ) {
			return $front_id;
		}

		$posts_page = absint( get_option( 'page_for_posts' ) );
		if ( $posts_page && function_exists( 'is_home' ) && is_home() && function_exists( 'is_front_page' ) && ! is_front_page() ) {
			return $posts_page;
		}

		return 0;
	}

	/**
	 * @return bool
	 */
	public function is_mobile_or_tablet_request() {
		if ( function_exists( 'wp_is_mobile' ) && wp_is_mobile() ) {
			return true;
		}

		$ch = isset( $_SERVER['HTTP_SEC_CH_UA_MOBILE'] ) ? (string) wp_unslash( $_SERVER['HTTP_SEC_CH_UA_MOBILE'] ) : '';
		if ( '?1' === $ch ) {
			return true;
		}

		$ua = isset( $_SERVER['HTTP_USER_AGENT'] ) ? strtolower( (string) wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) ) : '';
		if ( '' === $ua ) {
			return false;
		}

		$tablet_needles = array( 'ipad', 'tablet', 'kindle', 'silk', 'playbook', 'nexus 7', 'nexus 10', 'sm-t' );
		foreach ( $tablet_needles as $needle ) {
			if ( false !== strpos( $ua, $needle ) ) {
				return true;
			}
		}

		// iPadOS often reports as Macintosh + touch.
		if ( false !== strpos( $ua, 'macintosh' ) && false !== strpos( $ua, 'mobile' ) ) {
			return true;
		}

		return false;
	}

	/**
	 * @return bool
	 */
	public function is_serving_amp() {
		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
			return true;
		}
		if ( function_exists( 'ampforwp_is_amp_endpoint' ) && ampforwp_is_amp_endpoint() ) {
			return true;
		}
		if ( function_exists( 'amp_is_request' ) && amp_is_request() ) {
			return true;
		}
		if ( isset( $_GET['amp'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return true;
		}

		$uri = isset( $_SERVER['REQUEST_URI'] ) ? (string) wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
		if ( $uri && preg_match( '#/amp/?(\?|$)#', $uri ) ) {
			return true;
		}

		return false;
	}

	private function perform_amp_redirect() {
		$amp_url = $this->get_amp_permalink();
		if ( ! $amp_url ) {
			return;
		}

		$current = ( is_ssl() ? 'https://' : 'http://' ) . ( isset( $_SERVER['HTTP_HOST'] ) ? wp_unslash( $_SERVER['HTTP_HOST'] ) : '' ) . ( isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '' );
		if ( untrailingslashit( $current ) === untrailingslashit( $amp_url ) ) {
			return;
		}

		nocache_headers();
		header( 'Cache-Control: private, no-store, no-cache, must-revalidate, max-age=0' );
		wp_safe_redirect( $amp_url, 302 );
		exit;
	}

	/**
	 * @return string
	 */
	public function get_amp_permalink() {
		$page_type = $this->resolve_request_page_type();

		if ( 'blog' === $page_type && method_exists( $this->config, 'get_blog_url' ) ) {
			$permalink = $this->config->get_blog_url();
		} elseif ( 'newsletter' === $page_type && method_exists( $this->config, 'get_newsletter_url' ) ) {
			$permalink = $this->config->get_newsletter_url();
		} elseif ( 'category' === $page_type ) {
			$term      = get_queried_object();
			$permalink = ( $term instanceof \WP_Term ) ? get_category_link( $term ) : '';
			if ( ! $permalink ) {
				$permalink = home_url( '/' );
			}
		} elseif ( 'courses' === $page_type && method_exists( $this->config, 'get_courses_url' ) ) {
			$permalink = $this->config->get_courses_url();
		} elseif ( 'home' === $page_type ) {
			$permalink = home_url( '/' );
		} else {
			$permalink = get_permalink();
			if ( ! $permalink && function_exists( 'is_front_page' ) && is_front_page() ) {
				$permalink = home_url( '/' );
			}
			if ( ! $permalink && function_exists( 'is_home' ) && is_home() ) {
				$posts_page = absint( get_option( 'page_for_posts' ) );
				$permalink  = $posts_page ? get_permalink( $posts_page ) : home_url( '/blog/' );
			}
		}

		if ( ! $permalink ) {
			return '';
		}

		if ( function_exists( 'ampforwp_url_controller' ) ) {
			$converted = ampforwp_url_controller( $permalink );
			if ( is_string( $converted ) && $converted ) {
				return $converted;
			}
		}

		if ( function_exists( 'amp_add_paired_endpoint' ) ) {
			return amp_add_paired_endpoint( $permalink );
		}

		return add_query_arg( 'amp', '1', $permalink );
	}

	/**
	 * JS fallback redirect for viewports ≤1024px when server UA miss.
	 */
	public function print_amp_redirect_script() {
		if ( is_admin() || $this->is_serving_amp() ) {
			return;
		}
		if ( ! $this->is_plugin_amp_page_request() ) {
			return;
		}
		if ( isset( $_GET['noamp'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return;
		}

		$amp_url = $this->get_amp_permalink();
		if ( ! $amp_url ) {
			return;
		}

		static $printed = false;
		if ( $printed ) {
			return;
		}
		$printed = true;
		?>
		<script>
		(function(){
			try {
				if (window.location.search.indexOf('noamp') !== -1) return;
				if (window.location.search.indexOf('amp=') !== -1 || /\/amp\/?$/.test(window.location.pathname)) return;
				var w = window.innerWidth || document.documentElement.clientWidth || 0;
				var touch = ('ontouchstart' in window) || (navigator.maxTouchPoints > 0);
				if (w > 0 && w <= 1024 && (touch || /Mobi|Android|iPad|Tablet/i.test(navigator.userAgent||''))) {
					var next = new URL(window.location.href);
					next.searchParams.set('amp', '1');
					window.location.replace(next.toString());
				}
			} catch(e) {}
		})();
		</script>
		<?php
	}
}
