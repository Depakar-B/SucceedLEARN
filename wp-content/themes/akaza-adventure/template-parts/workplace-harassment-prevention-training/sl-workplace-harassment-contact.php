<?php
/**
 * SucceedLEARN — Workplace Harassment Prevention
 *
 * Section: Contact / Request a Demo
 * UI aligned with Global Workplace Compliance contact section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$form_title     = __( 'Request a Demo', 'akaza-adventure' );
$form_shortcode = sprintf(
	'[contact_form form_variant="course" title="%s"]',
	esc_attr( $form_title )
);
$whatsapp_url = 'https://wa.me/916362021778';
$phone_label  = '+91 63620 21778';
?>

<section
	class="sl-workplace-harassment-contact"
	id="contact"
	aria-labelledby="sl-workplace-harassment-contact-title"
>

	<div class="container">

		<div class="sl-workplace-harassment-contact__grid">

			<div class="sl-workplace-harassment-contact__content">

				<span class="sl-home-sub-heading">
					<?php
					esc_html_e(
						'Workplace Harassment Prevention Training',
						'akaza-adventure'
					);
					?>
				</span>

				<h2 id="sl-workplace-harassment-contact-title">
					<?php
					esc_html_e(
						'Give every employee the right answer to',
						'akaza-adventure'
					);
					?>
					<span>
						<?php
						esc_html_e(
							'“What happens next?”',
							'akaza-adventure'
						);
						?>
					</span>
				</h2>

				<ul class="sl-workplace-harassment-contact__moments">

					<li>
						<span class="sl-workplace-harassment-contact__moment-icon" aria-hidden="true">✓</span>
						<span>
							<?php
							esc_html_e(
								'An employee experiences unwelcome conduct.',
								'akaza-adventure'
							);
							?>
						</span>
					</li>

					<li>
						<span class="sl-workplace-harassment-contact__moment-icon" aria-hidden="true">✓</span>
						<span>
							<?php
							esc_html_e(
								'A witness is uncertain whether to intervene.',
								'akaza-adventure'
							);
							?>
						</span>
					</li>

					<li>
						<span class="sl-workplace-harassment-contact__moment-icon" aria-hidden="true">✓</span>
						<span>
							<?php
							esc_html_e(
								'A supervisor receives a disclosure.',
								'akaza-adventure'
							);
							?>
						</span>
					</li>

					<li>
						<span class="sl-workplace-harassment-contact__moment-icon" aria-hidden="true">✓</span>
						<span>
							<?php
							esc_html_e(
								'An Internal Committee receives a complaint.',
								'akaza-adventure'
							);
							?>
						</span>
					</li>

				</ul>

				<p class="sl-workplace-harassment-contact__lead">
					<?php
					esc_html_e(
						'Each moment requires different knowledge, and the response can shape what happens next.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Give your workforce training designed for their region, role and responsibilities.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-workplace-harassment-contact__direct">

					<p class="sl-workplace-harassment-contact__direct-label">
						<?php esc_html_e( 'Prefer to reach us directly?', 'akaza-adventure' ); ?>
					</p>

					<div class="sl-workplace-harassment-contact__direct-grid">

						<a
							href="mailto:info@succeedtech.com"
							class="sl-workplace-harassment-contact__direct-item"
						>
							<span class="sl-workplace-harassment-contact__direct-icon" aria-hidden="true">
								<svg viewBox="0 0 24 24" width="20" height="20" fill="none" focusable="false">
									<path
										d="M3.5 6.75h17v10.5h-17V6.75Z"
										stroke="currentColor"
										stroke-width="1.7"
										stroke-linejoin="round"
									/>
									<path
										d="m4.25 7.5 7.75 6.25L19.75 7.5"
										stroke="currentColor"
										stroke-width="1.7"
										stroke-linecap="round"
										stroke-linejoin="round"
									/>
								</svg>
							</span>
							<span class="sl-workplace-harassment-contact__direct-body">
								<span class="sl-workplace-harassment-contact__direct-title">
									<?php esc_html_e( 'Email us', 'akaza-adventure' ); ?>
								</span>
								<span class="sl-workplace-harassment-contact__direct-value">
									info@succeedtech.com
								</span>
							</span>
						</a>

						<a
							class="sl-workplace-harassment-contact__whatsapp"
							href="<?php echo esc_url( $whatsapp_url ); ?>"
							target="_blank"
							rel="noopener noreferrer"
							aria-label="<?php echo esc_attr( sprintf( /* translators: %s: phone number */ __( 'Chat on WhatsApp at %s', 'akaza-adventure' ), $phone_label ) ); ?>"
						>
							<span class="sl-workplace-harassment-contact__whatsapp-icon" aria-hidden="true">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22" focusable="false">
									<path fill="currentColor" d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.49-8.413z"/>
								</svg>
							</span>
							<span class="sl-workplace-harassment-contact__whatsapp-text">
								<span class="sl-workplace-harassment-contact__whatsapp-label">
									<?php esc_html_e( 'WhatsApp us', 'akaza-adventure' ); ?>
								</span>
								<span class="sl-workplace-harassment-contact__whatsapp-number">
									<?php echo esc_html( $phone_label ); ?>
								</span>
							</span>
						</a>

					</div>

				</div>

			</div>

			<div class="sl-workplace-harassment-contact__form-wrap">

				<div class="sl-home-form-wrapper sl-home-form-wrapper--slim">

					<?php
					if ( shortcode_exists( 'contact_form' ) ) {
						echo do_shortcode( $form_shortcode ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					} elseif ( shortcode_exists( 'succeedlearn_course_form' ) ) {
						echo do_shortcode(
							sprintf(
								'[succeedlearn_course_form title="%s"]',
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
