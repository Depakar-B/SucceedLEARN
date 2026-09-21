<?php
/**
 * DPDPA Compliance Training - Contact and request a demo.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $page_title ) ) {
	$page_title = get_the_title();

	if ( empty( $page_title ) ) {
		$page_title = __( 'DPDPA Compliance Training', 'succeedlearn-amp' );
	}
}

if ( empty( $canonical ) ) {
	$canonical = get_permalink();

	if ( empty( $canonical ) ) {
		$canonical = home_url( '/dpdpa-compliance-training/' );
	}
}
?>

<section
	class="sl-section sl-dpdpa-contact"
	id="contact"
	aria-labelledby="sl-dpdpa-contact-title"
>
	<div class="sl-wrap">
		<div class="sl-dpdpa-contact__grid">
			<div class="sl-dpdpa-contact__content">
				<header class="sl-dpdpa-contact__heading">
					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'Request a demo', 'succeedlearn-amp' ); ?>
					</span>

					<h2
						class="sl-h2"
						id="sl-dpdpa-contact-title"
					>
						<?php
						echo wp_kses(
							__(
								'See the course <span>before you decide.</span>',
								'succeedlearn-amp'
							),
							array(
								'span' => array(),
							)
						);
						?>
					</h2>

					<p class="sl-dpdpa-contact__lead">
						<?php
						esc_html_e(
							'A guided walkthrough, the admin dashboard, a sample completion report, and an exact quote for your headcount. No obligation.',
							'succeedlearn-amp'
						);
						?>
					</p>
				</header>

				<ul class="sl-list sl-dpdpa-contact__bullets">
					<li class="sl-list-item">
						<span aria-hidden="true">✓</span>
						<span>
							<?php esc_html_e( 'A full walkthrough of the course', 'succeedlearn-amp' ); ?>
						</span>
					</li>

					<li class="sl-list-item">
						<span aria-hidden="true">✓</span>
						<span>
							<?php esc_html_e( 'The admin dashboard and reporting', 'succeedlearn-amp' ); ?>
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
							<?php esc_html_e( 'An exact quote for your headcount', 'succeedlearn-amp' ); ?>
						</span>
					</li>
				</ul>

				<div class="sl-dpdpa-contact__details">
					<a
						class="sl-dpdpa-contact__detail"
						href="mailto:info@succeedtech.com"
					>
						<span class="sl-dpdpa-contact__detail-label">
							<?php esc_html_e( 'Email us', 'succeedlearn-amp' ); ?>
						</span>

						<span class="sl-dpdpa-contact__detail-value">
							info@succeedtech.com
						</span>
					</a>

					<a
						class="sl-dpdpa-contact__detail"
						href="tel:+916362021778"
					>
						<span class="sl-dpdpa-contact__detail-label">
							<?php esc_html_e( 'Speak to our team', 'succeedlearn-amp' ); ?>
						</span>

						<span class="sl-dpdpa-contact__detail-value">
							+91 63620 21778
						</span>
					</a>
				</div>
			</div>

			<div class="sl-contact-form-card sl-dpdpa-contact__form-wrap">
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
					echo do_shortcode(
						'[contact_form form_variant="course" title="Request a Demo"]'
					); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
				?>
			</div>
		</div>
	</div>
</section>