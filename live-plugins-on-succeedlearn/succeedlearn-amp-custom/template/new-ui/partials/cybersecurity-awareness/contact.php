<?php
/**
 * Cybersecurity Awareness AMP — Contact section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$form_title = __( 'Get the special offer', 'succeedlearn-amp' );
?>
<section class="sl-section sl-section--alt sl-csa-contact" id="contact" aria-labelledby="sl-csa-contact-title">
	<div class="sl-wrap sl-csa-two-col">
		<div>
			<span class="sl-home-sub-heading"><?php esc_html_e( 'Limited October 2026 Campaign', 'succeedlearn-amp' ); ?></span>
			<h2 id="sl-csa-contact-title" class="sl-h2">
				<?php echo wp_kses_post( __( 'Make Cybersecurity Awareness Month <span>measurable.</span>', 'succeedlearn-amp' ) ); ?>
			</h2>
			<p class="sl-lead">
				<?php esc_html_e( 'Help employees identify threats, resist manipulation and report suspicious emails. Give your security and learning teams clear evidence of participation, simulation response, reporting activity and improvement.', 'succeedlearn-amp' ); ?>
			</p>
			<a class="sl-csa-contact__email" href="mailto:connect@succeedtech.com">
				<span class="sl-csa-contact__email-label"><?php esc_html_e( 'Email', 'succeedlearn-amp' ); ?></span>
				<span class="sl-csa-contact__email-value">connect@succeedtech.com</span>
			</a>
		</div>
		<div class="sl-csa-contact__form" id="csa-contact-form">
			<?php
			if ( shortcode_exists( 'cybersecurity_form' ) ) {
				echo do_shortcode( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					sprintf(
						'[cybersecurity_form title="%s" subtitle=""]',
						esc_attr( $form_title )
					)
				);
			} elseif ( shortcode_exists( 'seo_form' ) ) {
				echo do_shortcode( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					sprintf(
						'[seo_form title="%s" subtitle=""]',
						esc_attr( $form_title )
					)
				);
			}
			?>
		</div>
	</div>
</section>
