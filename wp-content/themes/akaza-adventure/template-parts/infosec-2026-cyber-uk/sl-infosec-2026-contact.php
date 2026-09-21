<?php
/**
 * SucceedLEARN
 * Cybersecurity Awareness Month 2026
 * Contact Section
 */

defined( 'ABSPATH' ) || exit;

$whatsapp_url = 'https://wa.me/918660448654';
$phone_label  = '+91 86604 48654';
?>

<section
	class="sl-infosec-2026-contact"
	id="contact"
	aria-labelledby="sl-infosec-2026-contact-title"
>
	<div class="container">

		<div class="sl-infosec-2026-contact__grid">

			<!-- LEFT: Contact Content -->
			<div class="sl-infosec-2026-contact__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Cyber Readiness Challenge', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-infosec-2026-contact-title">
					<?php
					echo wp_kses_post(
						__( 'Ready to See How <span>Cyber-Ready</span> Your Workforce Is?', 'akaza-adventure' )
					);
					?>
				</h2>

				<p class="sl-infosec-2026-contact__lead">
					<?php esc_html_e( 'Start the Cyber Readiness Challenge.', 'akaza-adventure' ); ?>
				</p>

				<div class="sl-infosec-2026-contact__price">
					<span class="sl-infosec-2026-contact__price-amount">
						£2
					</span>

					<span class="sl-infosec-2026-contact__price-label">
						<?php esc_html_e( '/User/month', 'akaza-adventure' ); ?>
					</span>
				</div>

				<p class="sl-infosec-2026-contact__description">
					<?php
					esc_html_e(
						'Whatever your score, we\'ll help you take the next step toward stronger employee cybersecurity awareness.',
						'akaza-adventure'
					);
					?>
				</p>

				<a
					class="sl-infosec-2026-contact__whatsapp"
					href="<?php echo esc_url( $whatsapp_url ); ?>"
					target="_blank"
					rel="noopener noreferrer"
					aria-label="<?php echo esc_attr( sprintf( /* translators: %s: phone number */ __( 'Chat on WhatsApp at %s', 'akaza-adventure' ), $phone_label ) ); ?>"
				>
					<span class="sl-infosec-2026-contact__whatsapp-icon" aria-hidden="true">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22" focusable="false">
							<path fill="currentColor" d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.49-8.413z"/>
						</svg>
					</span>
					<span class="sl-infosec-2026-contact__whatsapp-text">
						<span class="sl-infosec-2026-contact__whatsapp-label"><?php esc_html_e( 'WhatsApp us', 'akaza-adventure' ); ?></span>
					</span>
				</a>

			</div>


			<!-- RIGHT: Cybersecurity Campaign Registration Form -->
			<div class="sl-infosec-2026-contact__form-wrap">

				<div class="sl-home-form-wrapper sl-home-form-wrapper--slim">

					<?php
					add_filter(
						'ssf_variant_config',
						static function ( $config ) {
							if ( ! empty( $config['authorisation_label'] ) ) {
								$config['authorisation_label'] = str_replace(
									array(
										'authorized',
										'inquire',
										'organization',
									),
									array(
										'authorised',
										'enquire',
										'organisation',
									),
									(string) $config['authorisation_label']
								);
							}
							return $config;
						}
					);

					$form_title     = __( 'Campaign Registration', 'akaza-adventure' );
					$form_shortcode = sprintf(
						'[cybersecurity_form variant="infosec" title="%s" subtitle=""]',
						esc_attr( $form_title )
					);

					if ( shortcode_exists( 'cybersecurity_form' ) ) {

						echo do_shortcode( $form_shortcode ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

					} elseif ( shortcode_exists( 'seo_form' ) ) {

						echo do_shortcode(
							sprintf(
								'[seo_form variant="infosec" title="%s" subtitle=""]',
								esc_attr( $form_title )
							)
						); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

					}
					?>

				</div>

			</div>

		</div>

	</div>
</section>
