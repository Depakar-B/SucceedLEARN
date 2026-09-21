<?php
/**
 * Main plugin bootstrap — wires all modules together.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class SSF_Plugin {

	/** @var SSF_Plugin|null */
	private static $instance = null;

	/** @var SSF_Database */
	public $database;

	/** @var SSF_Security */
	public $security;

	/** @var SSF_Email */
	public $email;

	/** @var SSF_Form_Render */
	public $form_render;

	/** @var SSF_Form_Handler */
	public $form_handler;

	/** @var SSF_Admin */
	public $admin;

	/** @var SSF_Assets */
	public $assets;

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		$this->database     = new SSF_Database();
		$this->security     = new SSF_Security();
		$this->email        = new SSF_Email();
		$this->form_render  = new SSF_Form_Render( $this->security );
		$this->form_handler = new SSF_Form_Handler( $this->database, $this->security, $this->email, $this->form_render );
		$this->admin        = new SSF_Admin( $this->database );
		$this->assets       = new SSF_Assets();

		register_activation_hook( SSF_PLUGIN_FILE, array( $this->database, 'create_table' ) );

		add_action( 'plugins_loaded', array( $this->database, 'ensure_table_exists' ) );
		add_action( 'init', array( $this->form_render, 'register_shortcode' ) );
		add_action( 'wp_enqueue_scripts', array( $this->assets, 'enqueue' ) );
		add_action( 'wp_ajax_ssf_submit_form', array( $this->form_handler, 'handle' ) );
		add_action( 'wp_ajax_nopriv_ssf_submit_form', array( $this->form_handler, 'handle' ) );
		add_action( 'admin_menu', array( $this->admin, 'register_menu' ) );
		add_action( 'admin_init', array( $this->admin, 'maybe_export_csv' ) );
		add_action( 'ssf_send_emails_async', array( $this->email, 'send_emails_async' ) );
		add_filter( 'wp_mail_failed', array( $this->email, 'log_wp_mail_error' ) );
	}
}
