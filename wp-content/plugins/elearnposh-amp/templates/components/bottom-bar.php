<?php
/**
 * Unified fixed bottom bar: webinar (center), WhatsApp (right).
 *
 * @package ElearnPOSH\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$plugin = \ElearnPOSH\AMP\Plugin::get_instance();
$config = $plugin->get_config();

$webinar_active = function_exists( 'elearnposh_amp_is_webinar_banner_active' )
	? elearnposh_amp_is_webinar_banner_active()
	: false;

$whatsapp_enabled = (
	$config->get( 'whatsapp_cta_enabled', false ) &&
	! empty( trim( (string) $config->get( 'whatsapp_cta_phone', '' ) ) )
);

if ( ! $webinar_active && ! $whatsapp_enabled ) {
	return;
}

$whatsapp_url = '';
if ( $whatsapp_enabled ) {
	$whatsapp_phone   = preg_replace( '/[^0-9]/', '', (string) $config->get( 'whatsapp_cta_phone', '' ) );
	$whatsapp_message = (string) $config->get( 'whatsapp_cta_message', 'Hi, I am interested in eLearnPOSH courses' );
	$whatsapp_url     = 'https://wa.me/' . $whatsapp_phone;
	if ( ! empty( $whatsapp_message ) ) {
		$whatsapp_url .= '?text=' . rawurlencode( $whatsapp_message );
	}
}

// Webinar hidden on this page — floating WhatsApp only, no bar background.
if ( ! $webinar_active && $whatsapp_enabled ) {
	?>
	<div
		id="ep-bottom-bar"
		class="ep-bottom-bar ep-bottom-bar--whatsapp-only"
		role="region"
		aria-label="<?php esc_attr_e( 'WhatsApp contact', 'elearnposh-amp' ); ?>"
	>
		<a
			class="ep-bottom-bar__whatsapp ep-bottom-bar__whatsapp--solo"
			href="<?php echo esc_url( $whatsapp_url ); ?>"
			target="_blank"
			rel="noopener noreferrer"
			aria-label="<?php esc_attr_e( 'Contact us on WhatsApp', 'elearnposh-amp' ); ?>"
			title="<?php esc_attr_e( 'Chat on WhatsApp', 'elearnposh-amp' ); ?>"
		>
			<svg class="ep-bottom-bar__whatsapp-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
				<path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" fill="#ffffff"/>
			</svg>
		</a>
	</div>
	<?php
	return;
}

$bar_classes = array( 'ep-bottom-bar' );
if ( $webinar_active ) {
	$bar_classes[] = 'ep-bottom-bar--webinar';
}
if ( $whatsapp_enabled ) {
	$bar_classes[] = 'ep-bottom-bar--whatsapp';
}

$banner_text        = trim( (string) $config->get( 'webinar_banner_text', '' ) );
$primary_btn_text   = trim( (string) $config->get( 'webinar_banner_primary_btn_text', '' ) );
$primary_btn_url    = trim( (string) $config->get( 'webinar_banner_primary_btn_url', '' ) );
$secondary_btn_text = trim( (string) $config->get( 'webinar_banner_secondary_btn_text', '' ) );
$secondary_btn_url  = trim( (string) $config->get( 'webinar_banner_secondary_btn_url', '' ) );
$show_primary       = ( ! empty( $primary_btn_text ) && ! empty( $primary_btn_url ) );
$show_secondary     = ( ! empty( $secondary_btn_text ) && ! empty( $secondary_btn_url ) );
?>
<div
	id="ep-bottom-bar"
	class="<?php echo esc_attr( implode( ' ', $bar_classes ) ); ?>"
	role="region"
	aria-label="<?php esc_attr_e( 'Page tools and notifications', 'elearnposh-amp' ); ?>"
>
	<div class="ep-bottom-bar__inner">
		<div class="ep-bottom-bar__center">
			<?php if ( $webinar_active ) : ?>
			<p class="ep-bottom-bar__text">
				<?php echo wp_kses_post( $banner_text ); ?>
			</p>
			<?php if ( $show_primary || $show_secondary ) : ?>
			<div class="ep-bottom-bar__actions">
				<?php if ( $show_primary ) : ?>
				<a class="ep-bottom-bar__btn ep-bottom-bar__btn--primary" href="<?php echo esc_url( $primary_btn_url ); ?>">
					<?php echo esc_html( $primary_btn_text ); ?>
				</a>
				<?php endif; ?>
				<?php if ( $show_secondary ) : ?>
				<a class="ep-bottom-bar__btn ep-bottom-bar__btn--secondary" href="<?php echo esc_url( $secondary_btn_url ); ?>">
					<?php echo esc_html( $secondary_btn_text ); ?>
				</a>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<?php endif; ?>
		</div>

		<?php if ( $whatsapp_enabled ) : ?>
		<div class="ep-bottom-bar__side ep-bottom-bar__side--right">
			<a
				class="ep-bottom-bar__whatsapp"
				href="<?php echo esc_url( $whatsapp_url ); ?>"
				target="_blank"
				rel="noopener noreferrer"
				aria-label="<?php esc_attr_e( 'Contact us on WhatsApp', 'elearnposh-amp' ); ?>"
				title="<?php esc_attr_e( 'Chat on WhatsApp', 'elearnposh-amp' ); ?>"
			>
				<svg class="ep-bottom-bar__whatsapp-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
					<path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" fill="#ffffff"/>
				</svg>
			</a>
		</div>
		<?php endif; ?>
	</div>
</div>
