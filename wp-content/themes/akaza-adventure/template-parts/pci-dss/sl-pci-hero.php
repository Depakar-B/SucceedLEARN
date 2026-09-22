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
					<?php esc_html_e( 'PCI DSS Compliance Training for Cashiers & Payment Handlers', 'akaza-adventure' ); ?>
				</h1>

				<h2 class="sl-hero-h2">
					<?php esc_html_e( 'Build Secure Payment-Handling Practices. Protect Cardholder Data.', 'akaza-adventure' ); ?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Help employees who handle payment card information understand their responsibilities under the Payment Card Industry Data Security Standard (PCI DSS) and apply secure payment practices during everyday transactions.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						"SucceedLEARN's PCI DSS Cashier and Payments Handler Compliance eLearning Training provides practical, role-specific learning for employees who process, access, store, or handle cardholder information.",
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Through payment scenarios and interactive learning, employees develop awareness of PCI DSS requirements, secure cardholder-data handling, payment fraud, social engineering, Code-10 authorisation calls, and the practices required when handling card-present and card-not-present transactions.',
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
