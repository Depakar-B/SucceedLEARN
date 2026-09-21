<?php
/**
 * GWCT AMP — CTA band section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$whatsapp_url = 'https://wa.me/916362021778';
$phone_label  = '+91 63620 21778';
?>
<section class="sl-section sl-section--alt">
	<div class="sl-wrap sl-gwct-cta-panel">
		<span class="sl-eyebrow"><?php esc_html_e( 'Get started', 'succeedlearn-amp' ); ?></span>
		<h2 class="sl-h2">
			<?php
			echo wp_kses(
				__( 'Ready to Build a <span>Better Workplace?</span>', 'succeedlearn-amp' ),
				array( 'span' => array() )
			);
			?>
		</h2>
		<p class="sl-lead"><?php esc_html_e( 'Whether you’re strengthening workplace inclusion, delivering harassment prevention training, or preparing your workforce for responsible AI adoption, SucceedLEARN is ready to help.', 'succeedlearn-amp' ); ?></p>
		<div class="sl-cta-buttons">
			<button type="button" class="sl-btn sl-btn--primary" <?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?></button>
			<a
				class="sl-btn sl-btn--whatsapp"
				href="<?php echo esc_url( $whatsapp_url ); ?>"
				target="_blank"
				rel="noopener noreferrer"
				aria-label="<?php echo esc_attr( sprintf( /* translators: %s: phone number */ __( 'Chat on WhatsApp at %s', 'succeedlearn-amp' ), $phone_label ) ); ?>"
			>
				<?php
				printf(
					/* translators: %s: WhatsApp phone number */
					esc_html__( 'WhatsApp %s', 'succeedlearn-amp' ),
					esc_html( $phone_label )
				);
				?>
			</a>
		</div>
	</div>
</section>
