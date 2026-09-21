<?php
/**
 * Security Awareness AMP — Contact / demo section.
 *
 * Reloads page meta here because sa_partial() includes run in function scope.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $page_title ) ) {
	$page_title = succeedlearn_amp_get_sa_page_title();
}

if ( empty( $canonical ) ) {
	$canonical = succeedlearn_amp_get_sa_canonical_url();
}

$whatsapp_url = 'https://wa.me/918660448654';
$phone_label  = '+91 86604 48654';
?>
<section class="sl-section" id="contact">
	<div class="sl-wrap sl-contact-layout">
		<div class="sl-contact-intro">
			<p class="sl-eyebrow"><?php esc_html_e( 'Talk to our team', 'succeedlearn-amp' ); ?></p>
			<h2 class="sl-h2">
				<?php esc_html_e( 'See the Security Behaviour & Culture Suite', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'in action', 'succeedlearn-amp' ); ?></span>
			</h2>
			<p class="sl-lead"><?php esc_html_e( 'Book a short, no-obligation demo and we will walk you through awareness training, phishing simulations, microlearning, analytics, and how the suite can fit your organisation.', 'succeedlearn-amp' ); ?></p>
			<p><?php esc_html_e( 'Tell us about your workforce, compliance priorities, and current awareness programme. We will get back to you with the next steps for a tailored walkthrough.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-sa-contact-direct">
				<a class="sl-sa-contact__email" href="mailto:info@succeedtech.com">
					<span class="sl-sa-contact__email-label"><?php esc_html_e( 'Email us', 'succeedlearn-amp' ); ?></span>
					<span class="sl-sa-contact__email-value">info@succeedtech.com</span>
				</a>
				<a
					class="sl-sa-contact__whatsapp"
					href="<?php echo esc_url( $whatsapp_url ); ?>"
					target="_blank"
					rel="noopener noreferrer"
					aria-label="<?php echo esc_attr( sprintf( /* translators: %s: phone number */ __( 'Chat on WhatsApp at %s', 'succeedlearn-amp' ), $phone_label ) ); ?>"
				>
					<span class="sl-sa-contact__whatsapp-icon" aria-hidden="true">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22" focusable="false">
							<path fill="currentColor" d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.49-8.413z"/>
						</svg>
					</span>
					<span class="sl-sa-contact__whatsapp-text">
						<span class="sl-sa-contact__whatsapp-label"><?php esc_html_e( 'WhatsApp us', 'succeedlearn-amp' ); ?></span>
					</span>
				</a>
			</div>
		</div>
		<div class="sl-contact-form-card">
			<?php
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
