<?php
/**
 * PCI DSS — Hero section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-pci-hero"
	aria-labelledby="sl-pci-hero-title"
>
	<div class="container">

		<div class="sl-pci-hero__grid">

			<div class="sl-pci-hero__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'PCI DSS Awareness', 'akaza-adventure' ); ?>
				</span>

				<h1 id="sl-pci-hero-title">
					<?php esc_html_e( 'PCI DSS Awareness Training for Employees & Payment Handlers', 'akaza-adventure' ); ?>
				</h1>

				<h2 class="sl-hero-h2">
					<?php esc_html_e( 'Build Employee Awareness. Strengthen Payment Card Data Security.', 'akaza-adventure' ); ?>
				</h2>

				<p>
					<?php
					esc_html_e(
						"SucceedLEARN's PCI DSS Awareness Training provides role-relevant learning through two dedicated training modules:",
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<strong><?php esc_html_e( 'PCI DSS Employee Awareness Training', 'akaza-adventure' ); ?></strong>
					<?php
					esc_html_e(
						' — foundational awareness for employees who need to understand PCI DSS, cardholder data and their responsibilities.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<strong><?php esc_html_e( 'PCI DSS Training for Cashiers & Payment Handlers', 'akaza-adventure' ); ?></strong>
					<?php
					esc_html_e(
						' — practical, role-focused training for employees directly involved in processing or handling card payments.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Together, the modules help organisations deliver PCI DSS security awareness training appropriate to different employee responsibilities.',
						'akaza-adventure'
					);
					?>
				</p>

				<div class="sl-pci-hero__meta" aria-label="<?php esc_attr_e( 'Course details', 'akaza-adventure' ); ?>">
					<span class="sl-pci-hero__meta-item">
						<strong><?php esc_html_e( 'Course Duration:', 'akaza-adventure' ); ?></strong>
						<?php esc_html_e( '45 Minutes', 'akaza-adventure' ); ?>
					</span>
					<span class="sl-pci-hero__meta-item">
						<strong><?php esc_html_e( 'Course Category:', 'akaza-adventure' ); ?></strong>
						<?php esc_html_e( 'Security Awareness', 'akaza-adventure' ); ?>
					</span>
				</div>

				<div class="sl-hero-actions sl-pci-hero__actions">
					<a class="sl-hero-btn sl-hero-btn-primary" href="#request-demo">
						<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
						<span aria-hidden="true">→</span>
					</a>
				</div>

			</div>

			<div class="sl-pci-hero__media">
				<div class="sl-pci-hero__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

		</div>

	</div>
</section>
