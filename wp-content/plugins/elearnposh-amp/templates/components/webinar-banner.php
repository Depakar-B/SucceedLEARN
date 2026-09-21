<?php
/**
 * Webinar Notification Banner Component
 *
 * Fixed bottom banner for webinar promotions.
 * Controlled via Admin → eLearnPOSH AMP → Webinar Banner.
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'elearnposh_amp_is_webinar_banner_active' ) ) {
	return;
}

if ( ! elearnposh_amp_is_webinar_banner_active() ) {
	return;
}

$plugin = \ElearnPOSH\AMP\Plugin::get_instance();
$config = $plugin->get_config();

$banner_text        = trim( $config->get( 'webinar_banner_text', '' ) );
$primary_btn_text   = trim( $config->get( 'webinar_banner_primary_btn_text', '' ) );
$primary_btn_url    = trim( $config->get( 'webinar_banner_primary_btn_url', '' ) );
$secondary_btn_text = trim( $config->get( 'webinar_banner_secondary_btn_text', '' ) );
$secondary_btn_url  = trim( $config->get( 'webinar_banner_secondary_btn_url', '' ) );

$show_primary   = ( ! empty( $primary_btn_text ) && ! empty( $primary_btn_url ) );
$show_secondary = ( ! empty( $secondary_btn_text ) && ! empty( $secondary_btn_url ) );
?>
<div
	id="ep-webinar-banner"
	role="region"
	aria-label="<?php esc_attr_e( 'Webinar notification banner', 'elearnposh-amp' ); ?>"
>
	<p class="ep-webinar-banner__text">
		<?php echo wp_kses_post( $banner_text ); ?>
	</p>

	<?php if ( $show_primary || $show_secondary ) : ?>
	<div class="ep-webinar-banner__actions">
		<?php if ( $show_primary ) : ?>
		<a class="ep-webinar-banner__btn ep-webinar-banner__btn--primary" href="<?php echo esc_url( $primary_btn_url ); ?>">
			<?php echo esc_html( $primary_btn_text ); ?>
		</a>
		<?php endif; ?>

		<?php if ( $show_secondary ) : ?>
		<a class="ep-webinar-banner__btn ep-webinar-banner__btn--secondary" href="<?php echo esc_url( $secondary_btn_url ); ?>">
			<?php echo esc_html( $secondary_btn_text ); ?>
		</a>
		<?php endif; ?>
	</div>
	<?php endif; ?>
</div>
