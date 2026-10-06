<?php
/**
 * AMP partial — UK Sexual Harassment Prevention Training — workplace settings.
 *
 * Expected vars: $workplace_settings
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $workplace_settings ) || ! is_array( $workplace_settings ) ) {
	$workplace_settings = function_exists( 'succeedlearn_amp_get_uk_harassment_workplace_settings' )
		? succeedlearn_amp_get_uk_harassment_workplace_settings()
		: array();
}

$images         = function_exists( 'succeedlearn_amp_get_uk_harassment_images' )
	? succeedlearn_amp_get_uk_harassment_images()
	: array();
$settings_image = isset( $images['settings'] ) ? $images['settings'] : '';
?>
<section
	id="workplace-settings"
	class="sl-section sl-section--alt sl-uk-harassment-settings"
	aria-labelledby="sl-uk-harassment-settings-title"
>
	<div class="sl-wrap">
		<div class="sl-uk-harassment-settings__grid">

			<div class="sl-uk-harassment-settings__content">
				<span class="sl-eyebrow sl-home-sub-heading">
					<?php esc_html_e( 'Workplace Context', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-uk-harassment-settings-title" class="sl-h2">
					<?php esc_html_e( 'Suitable Wherever', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Work Happens', 'succeedlearn-amp' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( 'Workplace interactions are no longer limited to a shared office. The learning is relevant across:', 'succeedlearn-amp' ); ?>
				</p>

				<ul class="sl-uk-harassment-bullets">
					<?php foreach ( $workplace_settings as $setting ) : ?>
						<li><?php echo esc_html( $setting ); ?></li>
					<?php endforeach; ?>
				</ul>

				<p class="sl-uk-harassment-settings__closing">
					<?php esc_html_e( 'This makes the course suitable for organisations with employees working across different roles, locations and working arrangements.', 'succeedlearn-amp' ); ?>
				</p>
			</div>

			<div class="sl-uk-harassment-settings__media">
				<?php if ( $settings_image ) : ?>
					<div class="sl-uk-harassment-settings__image">
						<amp-img
							src="<?php echo esc_url( $settings_image ); ?>"
							width="560"
							height="420"
							layout="responsive"
							alt="<?php esc_attr_e( 'UK workplace contexts where sexual harassment prevention training applies.', 'succeedlearn-amp' ); ?>"
						></amp-img>
					</div>
				<?php endif; ?>
			</div>

		</div>
	</div>
</section>
