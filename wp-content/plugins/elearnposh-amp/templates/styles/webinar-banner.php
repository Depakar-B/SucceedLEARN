<?php
/**
 * Webinar banner styles (included in amp-custom).
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$plugin = \ElearnPOSH\AMP\Plugin::get_instance();
$config = $plugin->get_config();

$bg_color = $config->get( 'webinar_banner_bg_color', '#002a38' );
$bg_color = ( $bg_color && preg_match( '/^#[0-9a-fA-F]{6}$/', $bg_color ) ) ? $bg_color : '#002a38';

$p_color = $config->get( 'webinar_banner_primary_btn_color', '#fa8b05' );
$p_color = ( $p_color && preg_match( '/^#[0-9a-fA-F]{6}$/', $p_color ) ) ? $p_color : '#fa8b05';

$s_color = $config->get( 'webinar_banner_secondary_btn_color', '#1a6b8a' );
$s_color = ( $s_color && preg_match( '/^#[0-9a-fA-F]{6}$/', $s_color ) ) ? $s_color : '#1a6b8a';
?>
#ep-webinar-banner {
	position: fixed;
	bottom: 0;
	left: 0;
	right: 0;
	z-index: 9999;
	background: <?php echo esc_attr( $bg_color ); ?>;
	color: #ffffff;
	box-shadow: 0 -4px 16px rgba(0, 0, 0, 0.35);
	padding: 12px 20px;
	box-sizing: border-box;
	width: 100%;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-wrap: wrap;
	gap: 12px 20px;
}

#ep-webinar-banner .ep-webinar-banner__text {
	margin: 0;
	padding: 0;
	font-size: 14px;
	line-height: 1.5;
	color: #ffffff;
	text-align: center;
	flex: 0 1 auto;
	max-width: 620px;
	min-width: 0;
}

#ep-webinar-banner .ep-webinar-banner__actions {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-wrap: wrap;
	gap: 8px;
	flex-shrink: 0;
}

#ep-webinar-banner .ep-webinar-banner__btn {
	display: inline-block;
	color: #ffffff;
	font-size: 13px;
	font-weight: 700;
	line-height: 1;
	padding: 10px 20px;
	border-radius: 5px;
	text-decoration: none;
	white-space: nowrap;
	box-sizing: border-box;
}

#ep-webinar-banner .ep-webinar-banner__btn--primary {
	background: <?php echo esc_attr( $p_color ); ?>;
	border: 2px solid <?php echo esc_attr( $p_color ); ?>;
}

#ep-webinar-banner .ep-webinar-banner__btn--secondary {
	background: <?php echo esc_attr( $s_color ); ?>;
	border: 2px solid <?php echo esc_attr( $s_color ); ?>;
}

.ep-webinar-banner-spacer {
	height: 72px;
	width: 100%;
}

@media (max-width: 640px) {
	#ep-webinar-banner {
		padding: 10px 14px;
		gap: 10px;
	}

	#ep-webinar-banner .ep-webinar-banner__text {
		font-size: 13px;
	}
}
