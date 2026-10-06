<?php
/**
 * AMP partial — UK Sexual Harassment Prevention Training — customisation.
 *
 * Expected vars: $customisation_items
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $customisation_items ) || ! is_array( $customisation_items ) ) {
	$customisation_items = function_exists( 'succeedlearn_amp_get_uk_harassment_customisation_items' )
		? succeedlearn_amp_get_uk_harassment_customisation_items()
		: array();
}

$images               = function_exists( 'succeedlearn_amp_get_uk_harassment_images' )
	? succeedlearn_amp_get_uk_harassment_images()
	: array();
$customisation_image = isset( $images['customisation'] ) ? $images['customisation'] : '';
?>
<section
	id="customisation"
	class="sl-section sl-uk-harassment-customisation"
	aria-labelledby="sl-uk-harassment-customisation-title"
>
	<div class="sl-wrap">
		<div class="sl-uk-harassment-customisation__grid">

			<div class="sl-uk-harassment-customisation__content">
				<span class="sl-uk-harassment-customisation__intro">
					<?php esc_html_e( "Help employees recognise not only the standard, but your organisation's process.", 'succeedlearn-amp' ); ?>
				</span>

				<span class="sl-eyebrow sl-home-sub-heading">
					<?php esc_html_e( 'Course Customisation', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-uk-harassment-customisation-title" class="sl-h2">
					<?php esc_html_e( 'Make the Course Part of Your', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Organisation', 'succeedlearn-amp' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( 'Training is more useful when employees can connect it with their own workplace.', 'succeedlearn-amp' ); ?>
				</p>
				<p>
					<?php esc_html_e( 'Depending on the selected package and project scope, SucceedLEARN can discuss incorporating:', 'succeedlearn-amp' ); ?>
				</p>

				<ul class="sl-list sl-list--2up">
					<?php foreach ( $customisation_items as $item ) : ?>
						<li class="sl-list-item">
							<span class="sl-list-item__text">
								<?php echo esc_html( $item ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>

				<div class="sl-content-actions">
					<button
						type="button"
						class="sl-content-btn sl-content-btn-primary"
						data-cta="uk-harassment-customisation-discuss"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Discuss Customisation', 'succeedlearn-amp' ); ?>
						<span aria-hidden="true">→</span>
					</button>
				</div>
			</div>

			<div class="sl-uk-harassment-customisation__media">
				<?php if ( $customisation_image ) : ?>
					<div class="sl-uk-harassment-customisation__image">
						<amp-img
							src="<?php echo esc_url( $customisation_image ); ?>"
							width="560"
							height="420"
							layout="responsive"
							alt="<?php esc_attr_e( 'Course customisation options for UK sexual harassment prevention training.', 'succeedlearn-amp' ); ?>"
						></amp-img>
					</div>
				<?php endif; ?>
			</div>

		</div>
	</div>
</section>
