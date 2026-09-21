<?php
/**
 * DPDPA Compliance Training — Contact / request a demo.
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
?>
<section class="sl-dpdpa-contact" id="contact" aria-labelledby="sl-dpdpa-contact-title">
	<div class="container">
		<div class="sl-dpdpa-contact__grid">
			<div class="sl-dpdpa-contact__content">
				<div class="sl-dpdpa-contact__heading">
					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'Request a demo', 'akaza-adventure' ); ?>
					</span>
					<h2 id="sl-dpdpa-contact-title">
						<?php esc_html_e( 'See the course', 'akaza-adventure' ); ?>
						<span><?php esc_html_e( 'before you decide.', 'akaza-adventure' ); ?></span>
					</h2>
					<p class="sl-dpdpa-contact__lead">
						<?php esc_html_e( 'A guided walkthrough, the admin dashboard, a sample completion report, and an exact quote for your headcount. No obligation.', 'akaza-adventure' ); ?>
					</p>
				</div>

				<ul class="sl-dpdpa-contact__bullets">
					<li><?php esc_html_e( 'A full walkthrough of the course', 'akaza-adventure' ); ?></li>
					<li><?php esc_html_e( 'The admin dashboard and reporting', 'akaza-adventure' ); ?></li>
					<li><?php esc_html_e( 'A sample certificate and completion report', 'akaza-adventure' ); ?></li>
					<li><?php esc_html_e( 'An exact quote for your headcount', 'akaza-adventure' ); ?></li>
				</ul>

				<div class="sl-dpdpa-contact__details">
					<a class="sl-dpdpa-contact__detail" href="mailto:info@succeedtech.com">
						<span class="sl-dpdpa-contact__detail-label"><?php esc_html_e( 'Email us', 'akaza-adventure' ); ?></span>
						<span class="sl-dpdpa-contact__detail-value">info@succeedtech.com</span>
					</a>
					<a class="sl-dpdpa-contact__detail" href="tel:+916362021778">
						<span class="sl-dpdpa-contact__detail-label"><?php esc_html_e( 'Speak to our team', 'akaza-adventure' ); ?></span>
						<span class="sl-dpdpa-contact__detail-value">+91 63620 21778</span>
					</a>
				</div>
			</div>

			<div class="sl-dpdpa-contact__form-wrap">
				<div class="sl-home-form-wrapper sl-home-form-wrapper--slim">
					<?php
					if ( shortcode_exists( 'contact_form' ) ) {
						echo do_shortcode( $form_shortcode ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					} elseif ( shortcode_exists( 'succeedlearn_course_form' ) ) {
						echo do_shortcode( sprintf( '[succeedlearn_course_form title="%s"]', esc_attr( $form_title ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
