<?php
/**
 * Legacy include path — renders fixed bottom widgets (webinar banner, WhatsApp, scroll-to-top).
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( function_exists( 'elearnposh_amp_render_fixed_widgets' ) ) {
	elearnposh_amp_render_fixed_widgets();
	return;
}

$cta_file = ELEARNPOSH_AMP_TEMPLATES_DIR . 'components/cta-notification.php';
if ( is_readable( $cta_file ) ) {
	include $cta_file;
}
