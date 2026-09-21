<?php
/**
 * GWCT AMP — Contact / demo section.
 *
 * Expected vars: $page_title, $canonical
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$whatsapp_url = 'https://wa.me/916362021778';
$phone_label  = '+91 63620 21778';
?>
<section class="sl-section sl-section--alt" id="contact">
	<div class="sl-wrap sl-contact-layout">
		<div class="sl-contact-intro">
			<p class="sl-eyebrow"><?php esc_html_e( 'Talk to our team', 'succeedlearn-amp' ); ?></p>
			<h2 class="sl-h2">
				<?php
				echo wp_kses(
					__( 'See how workplace compliance training works for <span>your organisation</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
			<p class="sl-lead"><?php esc_html_e( 'Book a short, no-obligation demo and we will walk you through our inclusion, harassment prevention, and responsible AI programmes, including learner experience, admin reporting, and how training can be deployed across your global workforce.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-gwct-contact-direct">
				<p class="sl-gwct-contact-direct__label"><?php esc_html_e( 'Prefer to reach us directly?', 'succeedlearn-amp' ); ?></p>
				<div class="sl-gwct-contact-direct__grid">
					<a class="sl-gwct-contact-direct__item" href="mailto:info@succeedtech.com">
						<span class="sl-gwct-contact-direct__icon" aria-hidden="true">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="18" focusable="false">
								<path fill="currentColor" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
							</svg>
						</span>
						<span class="sl-gwct-contact-direct__body">
							<span class="sl-gwct-contact-direct__title"><?php esc_html_e( 'Email us', 'succeedlearn-amp' ); ?></span>
							<span class="sl-gwct-contact-direct__value">info@succeedtech.com</span>
						</span>
					</a>
					<a
						class="sl-gwct-contact__whatsapp"
						href="<?php echo esc_url( $whatsapp_url ); ?>"
						target="_blank"
						rel="noopener noreferrer"
						aria-label="<?php echo esc_attr( sprintf( /* translators: %s: phone number */ __( 'Chat on WhatsApp at %s', 'succeedlearn-amp' ), $phone_label ) ); ?>"
					>
						<span class="sl-gwct-contact__whatsapp-icon" aria-hidden="true">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22" focusable="false">
								<path fill="currentColor" d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.49-8.413z"/>
							</svg>
						</span>
						<span class="sl-gwct-contact__whatsapp-text">
							<span class="sl-gwct-contact__whatsapp-label"><?php esc_html_e( 'WhatsApp us', 'succeedlearn-amp' ); ?></span>
							<span class="sl-gwct-contact__whatsapp-number"><?php echo esc_html( $phone_label ); ?></span>
						</span>
					</a>
				</div>
			</div>
		</div>
		<div class="sl-contact-form-card">
			<?php
			// Landing / course pages use the slim course variant (no Interested In).
			if ( function_exists( 'succeedlearn_amp_render_contact_form' ) ) {
				succeedlearn_amp_render_contact_form(
					array(
						'form_page'     => $page_title,
						'form_page_url' => $canonical,
						'form_variant'  => 'course',
						'title'         => __( 'Request a Demo', 'succeedlearn-amp' ),
						'echo'          => true,
					)
				);
			} else {
				echo do_shortcode( '[contact_form form_variant="course" title="Request a Demo"]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			?>
		</div>
	</div>
</section>
