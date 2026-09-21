<?php
/**
 * Cybersecurity Awareness — Contact / special offer CTA.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$form_title     = __( 'Get the special offer', 'akaza-adventure' );
$form_shortcode = sprintf(
	'[cybersecurity_form title="%s" subtitle=""]',
	esc_attr( $form_title )
);
?>
<section class="sl-cyber-awareness-contact" id="contact" aria-labelledby="sl-cyber-awareness-contact-title">
	<div class="container">
		<div class="sl-cyber-awareness-contact__grid">

			<div class="sl-cyber-awareness-contact__content">

				<div class="sl-cyber-awareness-contact__heading">
					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'Limited October 2026 Campaign', 'akaza-adventure' ); ?>
					</span>

					<h2 id="sl-cyber-awareness-contact-title">
						<?php
						echo wp_kses(
							__( 'Make Cyber Security Awareness Month <span>measurable.</span>', 'akaza-adventure' ),
							array( 'span' => array() )
						);
						?>
					</h2>

					<p class="sl-cyber-awareness-contact__lead">
						<?php
						esc_html_e(
							'Help employees identify threats, resist manipulation and report suspicious emails.',
							'akaza-adventure'
						);
						?>
					</p>

					<p class="sl-cyber-awareness-contact__lead">
						<?php
						esc_html_e(
							'Give your security and learning teams clear evidence of participation, simulation response, reporting activity and improvement.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

				<div class="sl-cyber-awareness-contact__details">

					<a class="sl-cyber-awareness-contact__email" href="mailto:connect@succeedtech.com">
						<span class="sl-cyber-awareness-contact__email-label">
							<?php esc_html_e( 'Email', 'akaza-adventure' ); ?>
						</span>
						<span class="sl-cyber-awareness-contact__email-value">
						connect@succeedtech.com
						</span>
					</a>

				</div>

			</div>

			<div class="sl-cyber-awareness-contact__form-wrap" id="csa-contact-form">
				<div class="sl-home-form-wrapper sl-home-form-wrapper--slim">
					<?php
					if ( shortcode_exists( 'cybersecurity_form' ) ) {
						echo do_shortcode( $form_shortcode ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					} elseif ( shortcode_exists( 'seo_form' ) ) {
						echo do_shortcode( sprintf( '[seo_form title="%s"]', esc_attr( $form_title ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
					?>
				</div>
			</div>

		</div>
	</div>
</section>
