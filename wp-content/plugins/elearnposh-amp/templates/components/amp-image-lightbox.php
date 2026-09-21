<?php
/**
 * Shared AMP image lightbox shell.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<amp-image-lightbox
	id="<?php echo esc_attr( elearnposh_amp_image_lightbox_id() ); ?>"
	layout="nodisplay"
	data-close-button-aria-label="<?php esc_attr_e( 'Close fullscreen image', 'elearnposh-amp' ); ?>"
></amp-image-lightbox>
