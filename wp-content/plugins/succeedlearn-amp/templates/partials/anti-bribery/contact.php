<?php
/**
 * Anti-Bribery AMP: Contact / Buy ABAC Training.
 *
 * Expected vars: $canonical, $page_title, $contact_steps
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$whatsapp_url = 'https://wa.me/916362021778';
?>
<section id="contact" class="sl-section sl-section--alt sl-aml-pe-vc-contact" aria-labelledby="sl-anti-bribery-contact-title">
	<div class="sl-wrap sl-contact-layout">
		<div class="sl-contact-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Your Next Step', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-anti-bribery-contact-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Buy ABAC training for your <span>organisation</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p class="sl-lead">
				<?php esc_html_e( 'Tell us about your UK Bribery Act, US FCPA or India ABAC training needs. We can discuss the appropriate course, delivery option and any customisation required for your organisation.', 'succeedlearn-amp' ); ?>
			</p>

			<ul class="sl-aml-feature-list" role="list">
				<?php foreach ( $contact_steps as $step ) : ?>
					<li class="sl-aml-feature-list__item">
						<span class="sl-aml-number" aria-hidden="true"><?php echo esc_html( $step['num'] ); ?></span>
						<div>
							<strong><?php echo esc_html( $step['title'] ); ?></strong>
							<span><?php echo esc_html( $step['text'] ); ?></span>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>

			<div class="sl-contact-actions">
				<a class="sl-contact-btn sl-contact-btn--email" href="mailto:connect@succeedtech.com">
					<span class="sl-contact-btn__stack">
						<span class="sl-contact-btn__label"><?php esc_html_e( 'Email us', 'succeedlearn-amp' ); ?></span>
						<span class="sl-contact-btn__value">connect@succeedtech.com</span>
					</span>
				</a>
				<a
					class="sl-contact-btn sl-contact-btn--whatsapp"
					href="<?php echo esc_url( $whatsapp_url ); ?>"
					target="_blank"
					rel="noopener noreferrer"
					aria-label="<?php esc_attr_e( 'Chat on WhatsApp', 'succeedlearn-amp' ); ?>"
				>
					<span class="sl-contact-btn__icon" aria-hidden="true">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22" focusable="false">
							<path fill="currentColor" d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.49-8.413z"/>
						</svg>
					</span>
					<span class="sl-contact-btn__stack">
						<span class="sl-contact-btn__label"><?php esc_html_e( 'WhatsApp us', 'succeedlearn-amp' ); ?></span>
					</span>
				</a>
			</div>
		</div>
		<div class="sl-contact-form-card">
			<?php
			if ( function_exists( 'succeedlearn_amp_render_contact_form' ) ) {
				succeedlearn_amp_render_contact_form(
					array(
						'form_page'     => isset( $page_title ) ? $page_title : __( 'Anti-Bribery and Anti-Corruption', 'succeedlearn-amp' ),
						'form_page_url' => isset( $canonical ) ? $canonical : home_url( '/anti-bribery-anti-corruption/' ),
						'form_variant'  => 'course',
						'title'         => __( 'ABAC Course Enquiry', 'succeedlearn-amp' ),
						'echo'          => true,
					)
				);
			} else {
				echo do_shortcode( '[contact_form form_variant="course" title="ABAC Course Enquiry"]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			?>
		</div>
	</div>
</section>
