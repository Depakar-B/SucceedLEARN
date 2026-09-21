<?php
/**
 * Template Manager — AMP template routing.
 *
 * @package SucceedLEARN\AMP
 */

namespace SucceedLEARN\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Template Manager — custom AMP page templates.
 */
class Template_Manager {

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
		add_action( 'plugins_loaded', array( $this, 'register_template_overrides' ), 20 );
		add_action( 'amp_post_template_css', array( $this, 'add_custom_styles' ), 11 );
	}

	public function register_template_overrides() {
		add_filter( 'amp_post_template_file', array( $this, 'override_header' ), 99, 2 );
		add_filter( 'amp_post_template_file', array( $this, 'override_footer' ), 99, 2 );
		add_filter( 'amp_post_template_file', array( $this, 'override_template' ), 99, 3 );
	}

	/**
	 * @param string $file Template file.
	 * @param string $type Template type.
	 * @return string
	 */
	public function override_header( $file, $type ) {
		if ( 'header-bar' === $type ) {
			$custom = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/header-bar.php';
			if ( file_exists( $custom ) ) {
				return $custom;
			}
		}
		return $file;
	}

	/**
	 * @param string $file Template file.
	 * @param string $type Template type.
	 * @return string
	 */
	public function override_footer( $file, $type ) {
		if ( 'footer' === $type ) {
			$custom = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'components/footer.php';
			if ( file_exists( $custom ) ) {
				return $custom;
			}
		}
		return $file;
	}

	/**
	 * @param string        $file Template file.
	 * @param string        $type Template type.
	 * @param \WP_Post|null $post Post object.
	 * @return string
	 */
	public function override_template( $file, $type, $post ) {
		if ( ! in_array( $type, array( 'single', 'page', 'index', 'home', 'archive', 'loop' ), true ) ) {
			return $file;
		}

		$page_type = $this->resolve_request_page_type( $post );
		if ( ! $page_type ) {
			return $file;
		}

		$map = Config::get_amp_page_map();
		if ( empty( $map[ $page_type ]['template'] ) ) {
			return $file;
		}

		if ( Config::page_type_skips_amp( $page_type ) ) {
			return $file;
		}

		$path = $this->get_template_path( $map[ $page_type ]['template'] );
		if ( $path && is_readable( $path ) ) {
			return $path;
		}

		return $file;
	}

	/**
	 * @param \WP_Post|null $post Post object.
	 * @return string
	 */
	private function resolve_request_page_type( $post ) {
		if ( $this->config->is_front_page_request() ) {
			return 'home';
		}

		if ( $this->config->is_category_archive_request() ) {
			return 'category';
		}

		if ( method_exists( $this->config, 'is_courses_archive_request' ) && $this->config->is_courses_archive_request() ) {
			return 'courses';
		}

		if ( method_exists( $this->config, 'is_newsletter_page_request' ) && $this->config->is_newsletter_page_request() ) {
			return 'newsletter';
		}

		if ( $this->config->is_blog_page_request() ) {
			return 'blog';
		}

		$post_id = ( $post && isset( $post->ID ) ) ? absint( $post->ID ) : 0;
		$slug    = ( $post && isset( $post->post_name ) ) ? (string) $post->post_name : '';

		if ( ! $post_id && function_exists( 'get_queried_object_id' ) ) {
			$post_id = absint( get_queried_object_id() );
		}

		if ( ! $slug && $post_id ) {
			$obj = get_post( $post_id );
			if ( $obj ) {
				$slug = (string) $obj->post_name;
			}
		}

		return $this->config->resolve_amp_page_type( $post_id, $slug );
	}

	/**
	 * Backup styles when page template does not call output_page_styles.
	 */
	public function add_custom_styles() {
		$base = SUCCEEDLEARN_AMP_ASSETS_DIR . 'css/amp-base.css';
		if ( is_readable( $base ) ) {
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo file_get_contents( $base ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		}

		$shared = array(
			'menu',
			'global-foundation',
			'global-ui',
			'global-ui-buttons',
			'global-panel-title',
			'global-highlight',
			'footer',
			'scroll-to-top',
			'breadcrumbs',
		);
		foreach ( $shared as $style ) {
			$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'styles/' . $style . '.php';
			if ( is_readable( $path ) ) {
				include $path;
			}
		}

		if ( $this->config->get( 'enable_custom_css' ) && $this->config->get( 'custom_css' ) ) {
			echo wp_strip_all_tags( (string) $this->config->get( 'custom_css' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}

	/**
	 * @param string $name Relative template name without .php.
	 * @return string
	 */
	public function get_template_path( $name ) {
		$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . $name . '.php';
		return file_exists( $path ) ? $path : '';
	}
}
