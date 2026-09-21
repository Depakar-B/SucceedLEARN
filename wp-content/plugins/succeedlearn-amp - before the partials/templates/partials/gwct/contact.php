<?php
/**
 * GWCT AMP — Contact / demo section.
 *
 * Expected vars: $page_title, $canonical
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="sl-section" id="contact">
	<div class="sl-wrap sl-contact-layout">
		<div class="sl-contact-intro">
			<p class="sl-eyebrow"><?php esc_html_e( 'Talk to our team', 'succeedlearn-amp' ); ?></p>
			<h2 class="sl-h2"><?php esc_html_e( 'See how workplace compliance training works for your organisation', 'succeedlearn-amp' ); ?></h2>
			<p class="sl-lead"><?php esc_html_e( 'Book a short, no-obligation demo and we will walk you through our inclusion, harassment prevention, and responsible AI programmes — including learner experience, admin reporting, and how training can be deployed across your global workforce.', 'succeedlearn-amp' ); ?></p>
			<div class="sl-gwct-contact-note">
				<strong><?php esc_html_e( 'Need more than one programme?', 'succeedlearn-amp' ); ?></strong>
				<?php esc_html_e( 'Many organisations combine inclusive workplace training, harassment prevention, and generative AI readiness into one learning plan. Mention your priorities on the form and we will tailor the conversation.', 'succeedlearn-amp' ); ?>
			</div>
			<div class="sl-gwct-contact-direct">
				<p class="sl-gwct-contact-direct__label"><?php esc_html_e( 'Prefer to reach us directly?', 'succeedlearn-amp' ); ?></p>
				<a href="mailto:sales@succeedtech.com">
					<span class="sl-gwct-contact-direct__body">
						<span class="sl-gwct-contact-direct__title"><?php esc_html_e( 'Email us', 'succeedlearn-amp' ); ?></span>
						<span class="sl-gwct-contact-direct__value">sales@succeedtech.com</span>
					</span>
				</a>
				<a href="tel:+916362021778">
					<span class="sl-gwct-contact-direct__body">
						<span class="sl-gwct-contact-direct__title"><?php esc_html_e( 'Call us', 'succeedlearn-amp' ); ?></span>
						<span class="sl-gwct-contact-direct__value">+91 63620 21778</span>
					</span>
				</a>
			</div>
		</div>
		<div class="sl-contact-form-card">
			<?php
			if ( function_exists( 'succeedlearn_amp_render_contact_form' ) ) {
				succeedlearn_amp_render_contact_form(
					array(
						'form_page'     => $page_title,
						'form_page_url' => $canonical,
						'echo'          => true,
					)
				);
			} else {
				echo do_shortcode( '[contact_form]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			?>
		</div>
	</div>
</section>
