<?php
/**
 * Financial Crime Prevention — Contact section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$form_title = __( 'Request a Demo', 'akaza-adventure' );
$form_shortcode = sprintf(
	'[contact_form form_variant="course" title="%s"]',
	esc_attr( $form_title )
);
?>
<section class="sl-fcp-contact" id="contact" aria-labelledby="sl-fcp-contact-title">
	<div class="container sl-fcp-contact__layout">

		<div class="sl-fcp-contact__copy">
			<p class="sl-fcp-eyebrow">
				<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
			</p>

			<h2 id="sl-fcp-contact-title">
				<?php esc_html_e( 'Explore the Complete Financial Crime Prevention Suite', 'akaza-adventure' ); ?>
			</h2>

			<p class="sl-fcp-lead">
				<?php esc_html_e( 'Tell us about your organisation and training requirements. Our team can discuss the relevant courses, delivery options and customisation requirements.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php
				printf(
					/* translators: 1: monthly price, 2: annual price. */
					esc_html__( 'You can also explore the complete suite at %1$s or %2$s.', 'akaza-adventure' ),
					'<strong>' . esc_html__( '$1.5 per user per month', 'akaza-adventure' ) . '</strong>',
					'<strong>' . esc_html__( '$18 per user per year', 'akaza-adventure' ) . '</strong>'
				);
				?>
			</p>
		</div>

		<div class="sl-fcp-contact__form">
			<div class="sl-home-form-wrapper sl-home-form-wrapper--slim">
				<?php
				if ( shortcode_exists( 'contact_form' ) ) {
					echo do_shortcode( $form_shortcode );
				} elseif ( shortcode_exists( 'succeedlearn_course_form' ) ) {
					echo do_shortcode( sprintf( '[succeedlearn_course_form title="%s"]', esc_attr( $form_title ) ) );
				}
				?>
			</div>
		</div>

	</div>
</section>
