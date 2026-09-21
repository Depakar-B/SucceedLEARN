<?php
/**
 * Front-end CSS and JS asset loading (desktop only).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SL_ECTA_Assets {

	/** @var bool */
	private static $needed = false;

	/** @var bool */
	private static $enqueued = false;

	public static function mark_needed() {
		self::$needed = true;
		// Late shortcode render: enqueue immediately if wp_enqueue_scripts already ran.
		if ( did_action( 'wp_enqueue_scripts' ) ) {
			self::do_enqueue();
		}
	}

	public function enqueue() {
		if ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && succeedlearn_amp_is_serving_amp() ) {
			return;
		}
		if ( class_exists( 'SL_ECTA_Security' ) ) {
			$security = SL_ECTA_Plugin::instance()->security;
			if ( $security->is_amp() ) {
				return;
			}
		}

		global $post;
		$post_content = ( $post && isset( $post->post_content ) ) ? (string) $post->post_content : '';
		$has_shortcode = self::$needed
			|| ( $post_content && has_shortcode( $post_content, 'sl_email_cta' ) )
			|| ( $post_content && false !== strpos( $post_content, 'sl_email_cta' ) );

		if ( ! $has_shortcode ) {
			return;
		}

		self::do_enqueue();
	}

	private static function do_enqueue() {
		if ( self::$enqueued ) {
			return;
		}
		self::$enqueued = true;

		wp_enqueue_style(
			'sl-ecta',
			SL_ECTA_PLUGIN_URL . 'assets/css/email-cta.css',
			array(),
			SL_ECTA_VERSION
		);

		wp_enqueue_script(
			'sl-ecta',
			SL_ECTA_PLUGIN_URL . 'assets/js/email-cta.js',
			array(),
			SL_ECTA_VERSION,
			true
		);

		wp_localize_script(
			'sl-ecta',
			'SL_ECTA',
			array(
				'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
				'messages' => array(
					'success'     => __( 'Thank you! Our team will contact you soon.', 'succeedlearn-email-cta' ),
					'error'       => __( 'Something went wrong. Please try again.', 'succeedlearn-email-cta' ),
					'invalid'     => __( 'Please enter a valid email address.', 'succeedlearn-email-cta' ),
					'submitting'  => __( 'Sending…', 'succeedlearn-email-cta' ),
				),
			)
		);
	}
}
