<?php
/**
 * PCI DSS — Why PCI DSS Awareness Matters for Payment Handlers.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-pci-why"
	aria-labelledby="sl-pci-why-title"
>
	<div class="container">

		<div class="sl-pci-why__grid">

			<div class="sl-pci-why__media">
				<div class="sl-pci-why__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

			<div class="sl-pci-why__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Payment Security Awareness', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-pci-why-title">
					<?php esc_html_e( 'Why PCI DSS Awareness Matters for', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Payment Handlers', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-pci-why__copy">
					<p>
						<?php
						esc_html_e(
							'Employees handling payment cards operate at one of the most important points in the payment-security process.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Whether a transaction takes place at a physical PoS terminal, over the phone, or through another card-not-present process, employees may encounter cardholder information, suspicious transactions, fraudulent activity, and social-engineering attempts.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'PCI DSS establishes security requirements for organisations that store, process, or transmit cardholder data. However, effective payment security also depends on employees understanding how those requirements affect their everyday responsibilities.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'PCI DSS awareness training helps payment handlers recognise sensitive cardholder information, follow secure payment practices, identify potential fraud, and respond appropriately when suspicious activity occurs.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

			</div>

		</div>

	</div>
</section>
