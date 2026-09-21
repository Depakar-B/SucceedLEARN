<?php
/**
 * Front-end CSS and JS asset loading.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class SSF_Assets {

	public function enqueue() {
		if ( $this->is_amp() || ! $this->should_enqueue() ) {
			return;
		}

		wp_enqueue_style(
			'ssf-form',
			plugins_url( 'assets/css/seo-form.css', SSF_PLUGIN_FILE ),
			array(),
			SSF_VERSION
		);

		wp_enqueue_script(
			'ssf-form',
			plugins_url( 'assets/js/seo-form.js', SSF_PLUGIN_FILE ),
			array(),
			SSF_VERSION,
			true
		);

		wp_localize_script(
			'ssf-form',
			'SSF_FORM',
			array(
				'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
				'nonce'    => wp_create_nonce( 'ssf_submit' ),
				'messages' => array(
					'success' => __( 'Thank you! We will get back to you soon.', 'seo-form' ),
					'error'   => __( 'Something went wrong. Please try again.', 'seo-form' ),
					'privacy' => __( 'Please accept the privacy policy to continue.', 'seo-form' ),
				),
			)
		);
	}

	/**
	 * Load assets when shortcode is in post content or on the CSA page template.
	 *
	 * @return bool
	 */
	private function should_enqueue() {
		if ( is_singular() ) {
			global $post;
			$post_content = $post ? $post->post_content : '';
			if ( has_shortcode( $post_content, 'cybersecurity_form' ) || has_shortcode( $post_content, 'seo_form' ) ) {
				return true;
			}
		}

		// CSA / InfoSec embed the form via template part, not post content.
		if ( function_exists( 'is_page_template' ) ) {
			if ( is_page_template( 'page-templates/cybersecurity-awareness.php' )
				|| is_page_template( 'page-templates/cybersecurity-awareness-uk.php' )
				|| is_page_template( 'page-templates/infosec-2026-cyber.php' )
				|| is_page_template( 'page-templates/infosec-2026-cyber-uk.php' ) ) {
				return true;
			}
		}
		if ( function_exists( 'is_page' )
			&& is_page(
				array(
					'us-cyber-aware-october',
					'uk-cyber-aware-october',
					'cybersecurity-awareness',
					'infosec-2026-cyber',
					'infosec-cybersecurity-awareness-month-2026',
					'infosec-cybersecurity-awareness',
					'infosec-cybersecurity-awareness/us',
					'infosec-cybersecurity-awareness/uk',
				)
			) ) {
			return true;
		}

		return (bool) apply_filters( 'ssf_should_enqueue_assets', false );
	}

	/**
	 * @return bool
	 */
	private function is_amp() {
		if ( function_exists( 'succeedlearn_amp_is_serving_amp' ) && succeedlearn_amp_is_serving_amp() ) {
			return true;
		}
		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
			return true;
		}
		if ( function_exists( 'ampforwp_is_amp_endpoint' ) && ampforwp_is_amp_endpoint() ) {
			return true;
		}
		return false;
	}
}
