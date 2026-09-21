<?php
/**
 * Main plugin bootstrap — wires all modules together.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class SL_ECTA_Plugin {

	/** @var SL_ECTA_Plugin|null */
	private static $instance = null;

	/** @var SL_ECTA_Database */
	public $database;

	/** @var SL_ECTA_Security */
	public $security;

	/** @var SL_ECTA_Email */
	public $email;

	/** @var SL_ECTA_Render */
	public $render;

	/** @var SL_ECTA_Handler */
	public $handler;

	/** @var SL_ECTA_Admin */
	public $admin;

	/** @var SL_ECTA_Assets */
	public $assets;

	/** @var bool */
	private $shortcode_used = false;

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		$this->database = new SL_ECTA_Database();
		$this->security = new SL_ECTA_Security();
		$this->email    = new SL_ECTA_Email();
		$this->render   = new SL_ECTA_Render( $this->security );
		$this->handler  = new SL_ECTA_Handler( $this->database, $this->security, $this->email );
		$this->admin    = new SL_ECTA_Admin( $this->database );
		$this->assets   = new SL_ECTA_Assets();

		register_activation_hook( SL_ECTA_PLUGIN_FILE, array( $this->database, 'create_table' ) );

		add_action( 'init', array( $this->render, 'register_shortcode' ) );
		add_action( 'wp_enqueue_scripts', array( $this->assets, 'enqueue' ) );
		add_action( 'wp_ajax_sl_ecta_submit', array( $this->handler, 'handle' ) );
		add_action( 'wp_ajax_nopriv_sl_ecta_submit', array( $this->handler, 'handle' ) );
		add_action( 'admin_menu', array( $this->admin, 'register_menu' ) );
		add_action( 'admin_init', array( $this->admin, 'maybe_export_csv' ) );
		add_filter( 'wp_mail_failed', array( $this->email, 'log_wp_mail_error' ) );

		// AMP: inject CSS into amp-custom and ensure amp-form + amp-mustache load.
		add_action( 'succeedlearn_amp_after_page_styles', array( $this, 'amp_output_styles' ), 10, 1 );
		add_filter( 'succeedlearn_amp_additional_components', array( $this, 'amp_additional_components' ), 10, 2 );
	}

	/**
	 * Mark that the shortcode rendered on this request (for AMP CSS/components).
	 */
	public function mark_shortcode_used() {
		$this->shortcode_used = true;
	}

	/**
	 * @return bool
	 */
	public function was_shortcode_used() {
		return $this->shortcode_used;
	}

	/**
	 * Echo CTA CSS into AMP amp-custom block.
	 *
	 * @param string $page_type Page type (unused).
	 */
	public function amp_output_styles( $page_type = '' ) {
		unset( $page_type );
		// Always print when AMP — shortcode may render after styles were already flushed
		// for pages that include the shortcode in templates. CSS is tiny (~2KB).
		$css_path = SL_ECTA_PLUGIN_DIR . 'assets/css/email-cta.css';
		if ( ! is_readable( $css_path ) ) {
			return;
		}
		$css = file_get_contents( $css_path ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
		if ( ! is_string( $css ) || '' === trim( $css ) ) {
			return;
		}
		echo $css; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Ensure amp-form and amp-mustache are available on AMP pages.
	 *
	 * @param string[] $additional Extra components.
	 * @param string   $page_type  Page type.
	 * @return string[]
	 */
	public function amp_additional_components( $additional, $page_type = '' ) {
		unset( $page_type );
		$additional = is_array( $additional ) ? $additional : array();
		$additional[] = 'amp-form';
		$additional[] = 'amp-mustache';
		return array_values( array_unique( $additional ) );
	}
}
