<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

function succeedlearn_form_send_to_erp( array $submission, array $context = array() ) {
	return SL_ERP_Plugin::instance()->send_submission( $submission, $context );
}

function succeedlearn_form_erp_is_enabled() {
	return SL_ERP_Plugin::instance()->is_enabled();
}

/**
 * @return array<string, mixed>
 */
function succeedlearn_form_get_recaptcha_settings() {
	return SL_Form_Recaptcha::instance()->get_settings();
}

function succeedlearn_form_recaptcha_is_enabled() {
	return SL_Form_Recaptcha::instance()->is_enabled();
}

function succeedlearn_form_recaptcha_get_site_key() {
	return SL_Form_Recaptcha::instance()->get_site_key();
}

function succeedlearn_form_recaptcha_get_secret_key() {
	return SL_Form_Recaptcha::instance()->get_secret_key();
}

function succeedlearn_form_recaptcha_get_score_threshold() {
	return SL_Form_Recaptcha::instance()->get_score_threshold();
}

/**
 * @param string $token     Browser token.
 * @param string $action    Expected action name.
 * @param string $remote_ip Optional client IP.
 * @return bool
 */
function succeedlearn_form_recaptcha_verify( $token, $action = 'submit', $remote_ip = '' ) {
	return SL_Form_Recaptcha::instance()->verify_token( $token, $action, $remote_ip );
}
