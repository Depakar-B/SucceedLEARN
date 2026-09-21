<?php
/**
 * Inclusive course page — contact / request a demo.
 *
 * Expects $args['course'].
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course = isset( $args['course'] ) && is_array( $args['course'] ) ? $args['course'] : array();
$title  = isset( $course['title'] ) ? (string) $course['title'] : __( 'this course', 'akaza-adventure' );
$lead   = isset( $course['contact_lead'] ) ? (string) $course['contact_lead'] : '';

$form_title     = __( 'Request a Demo', 'akaza-adventure' );
$form_shortcode = sprintf(
	'[contact_form form_variant="course" title="%s"]',
	esc_attr( $form_title )
);
?>
<section class="sl-iwc-contact" id="contact" aria-labelledby="sl-iwc-contact-title">
	<div class="container">
		<div class="sl-iwc-contact__grid">
			<div class="sl-iwc-contact__content">
				<div class="sl-iwc-contact__heading">
					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'Request a demo', 'akaza-adventure' ); ?>
					</span>
					<h2 id="sl-iwc-contact-title">
						<?php esc_html_e( 'See the course', 'akaza-adventure' ); ?>
						<span><?php esc_html_e( 'before you decide.', 'akaza-adventure' ); ?></span>
					</h2>
					<?php if ( $lead ) : ?>
						<p class="sl-iwc-contact__lead"><?php echo esc_html( $lead ); ?></p>
					<?php endif; ?>
				</div>

				<ul class="sl-iwc-contact__bullets">
					<li><?php echo esc_html( sprintf( __( 'A walkthrough of %s', 'akaza-adventure' ), $title ) ); ?></li>
					<li><?php esc_html_e( 'How it fits your policies and workforce', 'akaza-adventure' ); ?></li>
					<li><?php esc_html_e( 'Delivery options: hosted LMS, SCORM or LTI', 'akaza-adventure' ); ?></li>
					<li><?php esc_html_e( 'An exact quote for your headcount', 'akaza-adventure' ); ?></li>
				</ul>

				<div class="sl-iwc-contact__details">
					<a class="sl-iwc-contact__detail" href="mailto:info@succeedtech.com">
						<span class="sl-iwc-contact__detail-label"><?php esc_html_e( 'Email us', 'akaza-adventure' ); ?></span>
						<span class="sl-iwc-contact__detail-value">info@succeedtech.com</span>
					</a>
					<a class="sl-iwc-contact__detail" href="tel:+916362021778">
						<span class="sl-iwc-contact__detail-label"><?php esc_html_e( 'Speak to our team', 'akaza-adventure' ); ?></span>
						<span class="sl-iwc-contact__detail-value">+91 63620 21778</span>
					</a>
				</div>
			</div>

			<div class="sl-iwc-contact__form-wrap">
				<div class="sl-home-form-wrapper sl-home-form-wrapper--slim">
					<?php
					if ( shortcode_exists( 'contact_form' ) ) {
						echo do_shortcode( $form_shortcode ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
