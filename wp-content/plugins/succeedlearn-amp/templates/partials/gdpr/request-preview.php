<?php
/**
 * GDPR Employee Awareness Training AMP — Request preview / contact.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $page_title ) ) {
	$page_title = succeedlearn_amp_get_gdpr_page_title();
}

if ( empty( $canonical ) ) {
	$canonical = succeedlearn_amp_get_gdpr_canonical_url();
}
?>
<section
	class="sl-section sl-gdpr-request-preview"
	id="contact"
	aria-labelledby="sl-gdpr-request-preview-title"
>
	<div class="sl-wrap">
		<div class="sl-gdpr-request-preview__grid">
			<div class="sl-gdpr-request-preview__content">
				<header class="sl-gdpr-request-preview__heading">
					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'Request a Preview', 'succeedlearn-amp' ); ?>
					</span>

					<h2
						class="sl-h2"
						id="sl-gdpr-request-preview-title"
					>
						<?php
						echo wp_kses(
							__(
								'See the course before <span>you decide.</span>',
								'succeedlearn-amp'
							),
							array(
								'span' => array(),
							)
						);
						?>
					</h2>

					<p class="sl-gdpr-request-preview__lead">
						<?php
						esc_html_e(
							'A guided walkthrough, a sample completion report, and the SCORM and LTI details for your LMS. No obligation.',
							'succeedlearn-amp'
						);
						?>
					</p>
				</header>

				<ul class="sl-list sl-gdpr-request-preview__bullets">
					<li class="sl-list-item">
						<span aria-hidden="true">✓</span>
						<span>
							<?php esc_html_e( 'A full preview of the course', 'succeedlearn-amp' ); ?>
						</span>
					</li>

					<li class="sl-list-item">
						<span aria-hidden="true">✓</span>
						<span>
							<?php esc_html_e( 'The sales & marketing outreach module', 'succeedlearn-amp' ); ?>
						</span>
					</li>

					<li class="sl-list-item">
						<span aria-hidden="true">✓</span>
						<span>
							<?php esc_html_e( 'A sample certificate and completion report', 'succeedlearn-amp' ); ?>
						</span>
					</li>

					<li class="sl-list-item">
						<span aria-hidden="true">✓</span>
						<span>
							<?php esc_html_e( 'SCORM / LTI integration details', 'succeedlearn-amp' ); ?>
						</span>
					</li>
				</ul>

				<div class="sl-gdpr-request-preview__details">
					<a
						class="sl-gdpr-request-preview__detail"
						href="mailto:info@succeedtech.com"
					>
						<span class="sl-gdpr-request-preview__detail-label">
							<?php esc_html_e( 'Email us', 'succeedlearn-amp' ); ?>
						</span>
						<span class="sl-gdpr-request-preview__detail-value">
							info@succeedtech.com
						</span>
					</a>

					<a
						class="sl-gdpr-request-preview__detail"
						href="tel:+916362021778"
					>
						<span class="sl-gdpr-request-preview__detail-label">
							<?php esc_html_e( 'Speak to our team', 'succeedlearn-amp' ); ?>
						</span>
						<span class="sl-gdpr-request-preview__detail-value">
							+91 63620 21778
						</span>
					</a>
				</div>
			</div>

			<div class="sl-contact-form-card sl-gdpr-request-preview__form-wrap">
				<?php
				if ( function_exists( 'succeedlearn_amp_render_contact_form' ) ) {
					succeedlearn_amp_render_contact_form(
						array(
							'form_page'     => $page_title,
							'form_page_url' => $canonical,
							'form_variant'  => 'course',
							'title'         => __( 'Request a Preview', 'succeedlearn-amp' ),
							'echo'          => true,
						)
					);
				} else {
					echo do_shortcode(
						'[contact_form form_variant="course" title="Request a Preview"]'
					); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
				?>
			</div>
		</div>
	</div>
</section>
