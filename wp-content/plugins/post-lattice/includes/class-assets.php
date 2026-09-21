<?php
/**
 * Frontend and admin assets.
 *
 * @package Post_Lattice
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register and enqueue plugin assets.
 */
class Post_Lattice_Assets {

	/**
	 * Whether frontend assets were requested this request.
	 *
	 * @var bool
	 */
	private static $needed = false;

	/**
	 * Register handles.
	 */
	public static function register() {
		$css = PLT_DIR . 'public/css/grid.css';
		$js  = PLT_DIR . 'public/js/grid.js';

		wp_register_style(
			'post-lattice',
			PLT_URL . 'public/css/grid.css',
			array(),
			file_exists( $css ) ? (string) filemtime( $css ) : PLT_VERSION
		);

		wp_register_script(
			'post-lattice',
			PLT_URL . 'public/js/grid.js',
			array(),
			file_exists( $js ) ? (string) filemtime( $js ) : PLT_VERSION,
			true
		);
	}

	/**
	 * Enqueue early when the current post contains the shortcode or block.
	 */
	public static function maybe_enqueue() {
		self::register();

		if ( ! is_singular() ) {
			return;
		}

		$post = get_post();

		if ( ! $post ) {
			return;
		}

		$has_shortcode = has_shortcode( $post->post_content, 'post_lattice' );
		$has_block     = function_exists( 'has_block' ) && has_block( 'post-lattice/grid', $post );

		if ( $has_shortcode || $has_block ) {
			self::enqueue();
		}
	}

	/**
	 * Mark frontend assets as needed and enqueue.
	 */
	public static function enqueue() {
		self::$needed = true;
		self::register();
		wp_enqueue_style( 'post-lattice' );
		wp_enqueue_script( 'post-lattice' );
	}

	/**
	 * Load grid styles in the block editor preview.
	 */
	public static function enqueue_editor() {
		self::register();
		wp_enqueue_style( 'post-lattice' );
	}

	/**
	 * Enqueue admin settings assets.
	 *
	 * @param string $hook Current admin page.
	 */
	public static function enqueue_admin( $hook ) {
		if ( 'toplevel_page_post-lattice' !== $hook ) {
			return;
		}

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );

		$css = PLT_DIR . 'admin/css/admin.css';
		$js  = PLT_DIR . 'admin/js/admin.js';

		wp_enqueue_style(
			'post-lattice-admin',
			PLT_URL . 'admin/css/admin.css',
			array( 'wp-color-picker' ),
			file_exists( $css ) ? (string) filemtime( $css ) : PLT_VERSION
		);

		wp_enqueue_script(
			'post-lattice-admin',
			PLT_URL . 'admin/js/admin.js',
			array( 'jquery', 'wp-color-picker' ),
			file_exists( $js ) ? (string) filemtime( $js ) : PLT_VERSION,
			true
		);
	}
}
