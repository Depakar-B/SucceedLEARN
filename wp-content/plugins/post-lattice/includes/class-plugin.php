<?php
/**
 * Plugin bootstrap class.
 *
 * @package Post_Lattice
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main plugin controller.
 */
class Post_Lattice_Plugin {

	/**
	 * Singleton.
	 *
	 * @var Post_Lattice_Plugin|null
	 */
	private static $instance = null;

	/**
	 * Get instance.
	 *
	 * @return Post_Lattice_Plugin
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Hook everything.
	 */
	private function __construct() {
		add_action( 'init', array( $this, 'register' ) );
		add_action( 'init', array( 'Post_Lattice_Profiles', 'maybe_migrate' ), 5 );
		add_action( 'wp_enqueue_scripts', array( 'Post_Lattice_Assets', 'maybe_enqueue' ), 20 );
		add_action( 'enqueue_block_editor_assets', array( 'Post_Lattice_Assets', 'enqueue_editor' ) );
		add_action( 'admin_menu', array( 'Post_Lattice_Settings', 'add_menu' ) );
		add_action( 'admin_init', array( 'Post_Lattice_Settings', 'register' ) );
		add_action( 'admin_enqueue_scripts', array( 'Post_Lattice_Assets', 'enqueue_admin' ) );
		add_filter( 'plugin_action_links_' . PLT_BASENAME, array( $this, 'action_links' ) );
		Post_Lattice_Profiles::hooks();
	}

	/**
	 * Register runtime pieces.
	 */
	public function register() {
		add_image_size( 'plt-card', 640, 400, true );
		Post_Lattice_Assets::register();
		Post_Lattice_Shortcode::register();
		Post_Lattice_Block::register();
	}

	/**
	 * Settings link on Plugins screen.
	 *
	 * @param string[] $links Existing links.
	 * @return string[]
	 */
	public function action_links( $links ) {
		$url = admin_url( 'admin.php?page=post-lattice' );

		array_unshift(
			$links,
			'<a href="' . esc_url( $url ) . '">' . esc_html__( 'Settings', 'post-lattice' ) . '</a>'
		);

		return $links;
	}

	/**
	 * Activation: seed defaults if missing.
	 */
	public static function activate() {
		if ( false === get_option( Post_Lattice_Options::OPTION_KEY ) ) {
			add_option( Post_Lattice_Options::OPTION_KEY, Post_Lattice_Defaults::all() );
		}

		Post_Lattice_Profiles::maybe_migrate();
	}
}
