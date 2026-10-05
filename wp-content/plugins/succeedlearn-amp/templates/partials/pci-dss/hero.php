<?php
/**
 * PCI DSS AMP — Hero section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_title = succeedlearn_amp_get_pci_dss_page_title();
$hero_image = succeedlearn_amp_get_pci_dss_hero_image();
?>
<section class="sl-pci-hero" aria-labelledby="sl-pci-hero-title">
	<div class="sl-wrap">
		<div class="sl-pci-hero__top">
			<?php
			if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
				succeedlearn_amp_render_hero_breadcrumbs( $hero_title );
			}
			?>
		</div>

		<div class="sl-pci-hero__grid">
			<div class="sl-pci-hero__content">
				<span class="sl-home-sub-heading sl-pci-hero__eyebrow">
					<?php esc_html_e( 'PCI DSS Awareness', 'succeedlearn-amp' ); ?>
				</span>

				<h1 id="sl-pci-hero-title">
					<?php esc_html_e( 'PCI DSS Awareness Training for Employees & Payment Handlers', 'succeedlearn-amp' ); ?>
				</h1>

				<h2 class="sl-hero-h2 sl-pci-hero__subheading">
					<?php esc_html_e( 'Build Employee Awareness. Strengthen Payment Card Data Security.', 'succeedlearn-amp' ); ?>
				</h2>

				<p class="sl-pci-hero__description">
					<?php esc_html_e( "SucceedLEARN's PCI DSS Awareness Training provides role-relevant learning through two dedicated training modules:", 'succeedlearn-amp' ); ?>
				</p>

				<p class="sl-pci-hero__description">
					<strong><?php esc_html_e( 'PCI DSS Employee Awareness Training', 'succeedlearn-amp' ); ?></strong>
					<?php esc_html_e( ' — foundational awareness for employees who need to understand PCI DSS, cardholder data and their responsibilities.', 'succeedlearn-amp' ); ?>
				</p>

				<p class="sl-pci-hero__description">
					<strong><?php esc_html_e( 'PCI DSS Training for Cashiers & Payment Handlers', 'succeedlearn-amp' ); ?></strong>
					<?php esc_html_e( ' — practical, role-focused training for employees directly involved in processing or handling card payments.', 'succeedlearn-amp' ); ?>
				</p>

				<p class="sl-pci-hero__description">
					<?php esc_html_e( 'Together, the modules help organisations deliver PCI DSS security awareness training appropriate to different employee responsibilities.', 'succeedlearn-amp' ); ?>
				</p>

				<div class="sl-pci-hero__meta" aria-label="<?php esc_attr_e( 'Course details', 'succeedlearn-amp' ); ?>">
					<span class="sl-pci-hero__meta-item">
						<strong><?php esc_html_e( 'Course Category:', 'succeedlearn-amp' ); ?></strong>
						<?php esc_html_e( 'Security Awareness', 'succeedlearn-amp' ); ?>
					</span>
				</div>

				<div class="sl-hero-actions sl-pci-hero__actions">
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-primary"
						data-cta="pci-dss-hero-demo"
						<?php echo succeedlearn_amp_scroll_tap_attr( 'request-demo' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					>
						<?php esc_html_e( 'Request a Demo', 'succeedlearn-amp' ); ?>
						<span aria-hidden="true">→</span>
					</button>
				</div>
			</div>

			<div class="sl-pci-hero__media">
				<div class="sl-pci-hero__image">
					<amp-img
						src="<?php echo esc_url( $hero_image ); ?>"
						width="720"
						height="540"
						layout="responsive"
						alt="<?php esc_attr_e( 'PCI DSS Awareness Training for Employees and Payment Handlers', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
