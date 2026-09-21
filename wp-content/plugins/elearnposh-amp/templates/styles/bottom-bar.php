<?php
/**
 * Unified bottom bar styles (scroll-to-top, webinar, WhatsApp).
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

$compact_bg = '#01465d';
?>
.ep-scroll-marker {
	display: none;
}

.ep-scroll-to-top-wrap {
	position: fixed;
	right: 22px;
	bottom: 20px;
	z-index: 10060;
	opacity: 1;
	visibility: visible;
	pointer-events: auto;
	transition: opacity 0.25s ease, visibility 0.25s ease, background 0.2s ease;
}

.ep-scroll-to-top {
	display: flex;
	align-items: center;
	justify-content: center;
	width: 44px;
	height: 44px;
	padding: 0;
	margin: 0;
	background: #1472ba;
	color: #ffffff;
	cursor: pointer;
	box-shadow: 0 6px 18px rgba(20, 114, 186, 0.38);
	border-radius: 6px;
	border: 0;
	box-sizing: border-box;
	-webkit-appearance: none;
	appearance: none;
	text-decoration: none;
}

.ep-scroll-to-top:hover {
	background: #0f5a95;
}

.ep-scroll-to-top:focus {
	outline: none;
}

.ep-scroll-to-top:focus-visible {
	outline: 3px solid rgba(20, 114, 186, 0.45);
	outline-offset: 3px;
}

.ep-scroll-to-top__icon {
	display: block;
	width: 14px;
	height: 14px;
	border-left: 3px solid #ffffff;
	border-top: 3px solid #ffffff;
	transform: rotate(45deg) translate(1px, 3px);
	pointer-events: none;
}

body:has(#ep-bottom-bar) .ep-scroll-to-top-wrap {
	bottom: 76px;
}

body:has(#ep-bottom-bar.ep-bottom-bar--webinar) .ep-scroll-to-top-wrap {
	bottom: 84px;
}

#ep-bottom-bar {
	position: fixed;
	bottom: 0;
	left: 0;
	right: 0;
	z-index: 10050;
	background: <?php echo esc_attr( $bg_color ); ?>;
	color: #ffffff;
	box-shadow: 0 -4px 16px rgba(0, 0, 0, 0.35);
	box-sizing: border-box;
	width: 100%;
}

#ep-bottom-bar.ep-bottom-bar--compact {
	background: <?php echo esc_attr( $compact_bg ); ?>;
}

#ep-bottom-bar.ep-bottom-bar--whatsapp-only {
	position: static;
	width: auto;
	height: 0;
	overflow: visible;
	background: transparent;
	box-shadow: none;
	pointer-events: none;
}

#ep-bottom-bar.ep-bottom-bar--whatsapp-only .ep-bottom-bar__whatsapp--solo {
	position: fixed;
	right: 14px;
	bottom: 14px;
	z-index: 10050;
	pointer-events: auto;
	display: flex;
	align-items: center;
	justify-content: center;
	width: 42px;
	height: 42px;
	background: #25d366;
	border: 1px solid rgba(255, 255, 255, 0.35);
	border-radius: 8px;
	text-decoration: none;
	box-sizing: border-box;
	box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

body:has(#ep-bottom-bar.ep-bottom-bar--whatsapp-only) {
	padding-bottom: 0;
}

body:has(#ep-bottom-bar.ep-bottom-bar--whatsapp-only) .ep-scroll-to-top-wrap {
	bottom: 68px;
}

@media (max-width: 640px) {
	body:has(#ep-bottom-bar.ep-bottom-bar--whatsapp-only) .ep-scroll-to-top-wrap {
		bottom: 64px;
	}

	#ep-bottom-bar.ep-bottom-bar--whatsapp-only .ep-bottom-bar__whatsapp--solo {
		width: 40px;
		height: 40px;
		right: 12px;
		bottom: 12px;
	}
}

#ep-bottom-bar .ep-bottom-bar__inner {
	display: grid;
	grid-template-columns: minmax(0, 1fr) 52px;
	align-items: center;
	gap: 8px 12px;
	padding: 10px 12px;
	max-width: 100%;
	box-sizing: border-box;
}

#ep-bottom-bar:not(.ep-bottom-bar--whatsapp) .ep-bottom-bar__inner {
	grid-template-columns: minmax(0, 1fr);
}

#ep-bottom-bar .ep-bottom-bar__side--right {
	display: flex;
	align-items: center;
	justify-content: flex-end;
	flex-shrink: 0;
}

#ep-bottom-bar .ep-bottom-bar__center {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-wrap: wrap;
	gap: 8px 14px;
	min-width: 0;
	text-align: center;
}

#ep-bottom-bar .ep-bottom-bar__text {
	margin: 0;
	padding: 0;
	font-size: 14px;
	line-height: 1.45;
	color: #ffffff;
	flex: 1 1 220px;
	max-width: 640px;
	min-width: 0;
}

#ep-bottom-bar .ep-bottom-bar__actions {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-wrap: wrap;
	gap: 8px;
	flex-shrink: 0;
}

#ep-bottom-bar .ep-bottom-bar__btn {
	display: inline-block;
	color: #ffffff;
	font-size: 12px;
	font-weight: 700;
	line-height: 1;
	padding: 9px 16px;
	border-radius: 5px;
	text-decoration: none;
	white-space: nowrap;
	box-sizing: border-box;
}

#ep-bottom-bar .ep-bottom-bar__btn--primary {
	background: <?php echo esc_attr( $p_color ); ?>;
	border: 2px solid <?php echo esc_attr( $p_color ); ?>;
}

#ep-bottom-bar .ep-bottom-bar__btn--secondary {
	background: <?php echo esc_attr( $s_color ); ?>;
	border: 2px solid <?php echo esc_attr( $s_color ); ?>;
}

#ep-bottom-bar .ep-bottom-bar__whatsapp {
	display: flex;
	align-items: center;
	justify-content: center;
	width: 42px;
	height: 42px;
	background: #25d366;
	border: 1px solid rgba(255, 255, 255, 0.35);
	border-radius: 8px;
	text-decoration: none;
	box-sizing: border-box;
	box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

#ep-bottom-bar .ep-bottom-bar__whatsapp-icon {
	display: block;
	width: 24px;
	height: 24px;
}

body:has(#ep-bottom-bar) {
	padding-bottom: 64px;
}

body:has(#ep-bottom-bar.ep-bottom-bar--webinar) {
	padding-bottom: 72px;
}

@media (max-width: 640px) {
	body:has(#ep-bottom-bar) .ep-scroll-to-top-wrap {
		bottom: 100px;
	}

	body:has(#ep-bottom-bar.ep-bottom-bar--webinar) .ep-scroll-to-top-wrap {
		bottom: 108px;
	}

	.ep-scroll-to-top-wrap {
		right: 14px;
	}

	.ep-scroll-to-top {
		width: 40px;
		height: 40px;
	}

	.ep-scroll-to-top__icon {
		width: 12px;
		height: 12px;
	}

	body:has(#ep-bottom-bar) {
		padding-bottom: 88px;
	}

	body:has(#ep-bottom-bar.ep-bottom-bar--webinar) {
		padding-bottom: 96px;
	}
}

@media (max-width: 640px) {
	#ep-bottom-bar .ep-bottom-bar__inner {
		grid-template-columns: minmax(0, 1fr) 44px;
		padding: 8px 10px;
		gap: 6px 8px;
	}

	#ep-bottom-bar:not(.ep-bottom-bar--whatsapp) .ep-bottom-bar__inner {
		grid-template-columns: minmax(0, 1fr);
	}

	#ep-bottom-bar .ep-bottom-bar__text {
		font-size: 12px;
		flex-basis: 100%;
	}

	#ep-bottom-bar .ep-bottom-bar__center {
		flex-direction: column;
		gap: 6px;
	}

	#ep-bottom-bar .ep-bottom-bar__btn {
		font-size: 11px;
		padding: 8px 12px;
	}

	#ep-bottom-bar .ep-bottom-bar__whatsapp {
		width: 40px;
		height: 40px;
	}
}

/* Legacy standalone widgets — hide when unified bar is present */
body:has(#ep-bottom-bar) #ep-webinar-banner,
body:has(#ep-bottom-bar) #ep-cta-notification,
body:has(#ep-bottom-bar) .ep-webinar-banner-spacer {
	display: none !important;
}