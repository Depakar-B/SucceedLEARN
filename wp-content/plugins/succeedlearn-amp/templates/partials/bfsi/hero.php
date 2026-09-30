<?php
/**
 * BFSI & PE/VC AMP — Hero section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_title = succeedlearn_amp_get_bfsi_page_title();
$hero_image = succeedlearn_amp_get_bfsi_hero_image();
?>
<section class="sl-bfsi-hero" aria-labelledby="sl-bfsi-hero-title">
	<div class="sl-wrap">
		<div class="sl-bfsi-hero__top">
			<?php
			if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
				succeedlearn_amp_render_hero_breadcrumbs( $hero_title );
			}
			?>
		</div>

		<div class="sl-bfsi-hero__grid">
			<div class="sl-bfsi-hero__content">
				<span class="sl-home-sub-heading sl-bfsi-hero__eyebrow">
					<?php esc_html_e( 'Financial Services Security Awareness', 'succeedlearn-amp' ); ?>
				</span>

				<h1 id="sl-bfsi-hero-title">
					<?php esc_html_e( 'Cybersecurity Awareness Training for', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'BFSI & PE/VC', 'succeedlearn-amp' ); ?></span>
				</h1>

				<h2 class="sl-hero-h2 sl-bfsi-hero__subheading">
					<?php esc_html_e( 'Build Cyber Awareness Around the Risks Financial Services Employees Face Every Day', 'succeedlearn-amp' ); ?>
				</h2>

				<p class="sl-bfsi-hero__description">
					<?php esc_html_e( 'Financial services organizations handle highly sensitive customer, financial, investor, employee and transaction data every day. At the same time, employees are increasingly exposed to sophisticated social engineering, impersonation, insider threats, third-party risks and AI-enabled attacks.', 'succeedlearn-amp' ); ?>
				</p>

				<p class="sl-bfsi-hero__description">
					<?php esc_html_e( 'SucceedLEARN\'s Cybersecurity Awareness Training for BFSI & PE/VC is purpose-built for employees across Banking, Financial Services and Insurance (BFSI), Private Equity (PE) and Venture Capital (VC) organizations.', 'succeedlearn-amp' ); ?>
				</p>

				<p class="sl-bfsi-hero__description">
					<?php esc_html_e( 'Through practical scenarios and interactive learning, the course helps employees recognize security threats, protect sensitive information, respond appropriately to suspicious activity, and understand their role in reducing human-related cyber risk.', 'succeedlearn-amp' ); ?>
				</p>

				<div class="sl-hero-actions sl-bfsi-hero__actions">
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-primary"
						data-cta="bfsi-hero-demo"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
						<span aria-hidden="true">→</span>
					</button>
				</div>
			</div>

			<div class="sl-bfsi-hero__media">
				<div class="sl-bfsi-hero__image">
					<amp-img
						src="<?php echo esc_url( $hero_image ); ?>"
						width="720"
						height="540"
						layout="responsive"
						alt="<?php esc_attr_e( 'Cybersecurity Awareness Training for BFSI and PE/VC', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
