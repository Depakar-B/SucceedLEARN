<?php
/**
 * Performance Optimizer — CSS cache + AMP components.
 *
 * @package SucceedLEARN\AMP
 */

namespace SucceedLEARN\AMP;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Performance Optimizer
 */
class Performance_Optimizer {

	/**
	 * @var Performance_Optimizer|null
	 */
	private static $instance = null;

	/**
	 * @var string
	 */
	private $cache_dir = '';

	/**
	 * @return Performance_Optimizer
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		$upload = wp_upload_dir();
		$this->cache_dir = trailingslashit( $upload['basedir'] ) . 'succeedlearn-amp-cache/';
	}

	public function init() {
		add_action( 'amp_post_template_head', array( $this, 'add_preconnect' ), 1 );
		if ( ! is_dir( $this->cache_dir ) ) {
			wp_mkdir_p( $this->cache_dir );
		}
	}

	public function add_preconnect() {
		echo '<link rel="dns-prefetch" href="https://cdn.ampproject.org">' . "\n";
	}

	/**
	 * @param string $css CSS.
	 * @return string
	 */
	public function minify_css( $css ) {
		$css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
		$css = preg_replace( '/\s+/', ' ', $css );
		$css = str_replace( array( ' {', '{ ', ' }', '} ', ': ', ' :', '; ', ' ;' ), array( '{', '{', '}', '}', ':', ':', ';', ';' ), $css );
		$css = str_replace( ';}', '}', $css );
		return trim( (string) $css );
	}

	/**
	 * @param string   $page_type Page type key.
	 * @param string[] $style_files Style partial basenames.
	 * @return string
	 */
	public function get_optimized_css( $page_type, $style_files = array() ) {
		$style_files = array_values( array_unique( array_filter( (array) $style_files ) ) );
		$key         = $page_type . '_' . md5( implode( ',', $style_files ) ) . '_' . SUCCEEDLEARN_AMP_VERSION . '.css';
		$cache_file  = $this->cache_dir . $key;

		if ( is_readable( $cache_file ) && ( time() - filemtime( $cache_file ) ) < DAY_IN_SECONDS ) {
			return (string) file_get_contents( $cache_file ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		}

		$css = '';
		foreach ( $style_files as $file ) {
			$path = SUCCEEDLEARN_AMP_TEMPLATES_DIR . 'styles/' . sanitize_file_name( $file ) . '.php';
			if ( ! is_readable( $path ) ) {
				continue;
			}
			ob_start();
			include $path;
			$chunk = ob_get_clean();
			$chunk = preg_replace( '/<\?php.*?\?>/s', '', $chunk );
			$css  .= $chunk;
		}

		$css = $this->minify_css( $css );

		if ( ! is_dir( $this->cache_dir ) ) {
			wp_mkdir_p( $this->cache_dir );
		}
		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_file_put_contents
		file_put_contents( $cache_file, $css );

		return $css;
	}

	public function clear_cache() {
		if ( ! is_dir( $this->cache_dir ) ) {
			return;
		}
		$files = glob( $this->cache_dir . '*.css' );
		if ( ! $files ) {
			return;
		}
		foreach ( $files as $file ) {
			// phpcs:ignore WordPress.WP.AlternativeFunctions.unlink_unlink
			@unlink( $file );
		}
	}

	/**
	 * @param string   $page_type Page type.
	 * @param string[] $additional Extra components.
	 * @return string[]
	 */
	public function get_required_components( $page_type, $additional = array() ) {
		$base = array(
			'amp-sidebar',
			'amp-accordion',
			'amp-bind',
			'amp-form',
			'amp-mustache',
		);

		if ( 'home' === $page_type ) {
			$base[] = 'amp-carousel';
		}

		return array_values( array_unique( array_merge( $base, (array) $additional ) ) );
	}

	/**
	 * @param string   $page_type Page type.
	 * @param string[] $additional Extra components.
	 */
	public function output_amp_components( $page_type, $additional = array() ) {
		$components = $this->get_required_components( $page_type, $additional );
		$map        = array(
			'amp-sidebar'   => 'https://cdn.ampproject.org/v0/amp-sidebar-0.1.js',
			'amp-accordion' => 'https://cdn.ampproject.org/v0/amp-accordion-0.1.js',
			'amp-bind'      => 'https://cdn.ampproject.org/v0/amp-bind-0.1.js',
			'amp-form'      => 'https://cdn.ampproject.org/v0/amp-form-0.1.js',
			'amp-mustache'  => 'https://cdn.ampproject.org/v0/amp-mustache-0.2.js',
			'amp-carousel'  => 'https://cdn.ampproject.org/v0/amp-carousel-0.1.js',
		);

		foreach ( $components as $name ) {
			if ( empty( $map[ $name ] ) ) {
				continue;
			}
			$attr = ( 'amp-mustache' === $name ) ? 'custom-template' : 'custom-element';
			printf(
				'<script async %1$s="%2$s" src="%3$s"></script>' . "\n",
				esc_attr( $attr ),
				esc_attr( $name ),
				esc_url( $map[ $name ] )
			);
		}
	}
}
