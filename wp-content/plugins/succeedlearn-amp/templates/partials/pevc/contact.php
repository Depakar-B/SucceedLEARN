<?php
/**
 * PE/VC Suite AMP — Contact / Request a Demo.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $page_title ) ) {
	$page_title = succeedlearn_amp_get_pevc_page_title();
}
if ( empty( $canonical ) ) {
	$canonical = succeedlearn_amp_get_pevc_canonical_url();
}
if ( empty( $contact_benefits ) || ! is_array( $contact_benefits ) ) {
	$contact_benefits = succeedlearn_amp_get_pevc_contact_benefits();
}
?>
<section id="contact" class="sl-pevc-contact" aria-labelledby="sl-pevc-contact-title">
	<div class="sl-wrap sl-contact-layout">
		<div class="sl-contact-intro sl-pevc-contact__copy">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Get started', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-pevc-contact-title" class="sl-h2">
				<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
			</h2>

			<p class="sl-pevc-contact__lead">
				<?php
				esc_html_e(
					'Tell us about your organisation and your PE/VC compliance training requirements.',
					'succeedlearn-amp'
				);
				?>
			</p>

			<ul class="sl-pevc-contact__benefits sl-list">
				<?php foreach ( $contact_benefits as $benefit ) : ?>
					<li class="sl-list-item">
						<span aria-hidden="true">✓</span>
						<?php echo esc_html( $benefit ); ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div class="sl-contact-form-card sl-pevc-contact__form">
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
				echo do_shortcode( '[contact_form form_variant="course" title="Request a Demo"]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			?>
		</div>
	</div>
</section>
