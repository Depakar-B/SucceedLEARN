<?php
/**
 * PCI DSS — Why PCI DSS Security Awareness Matters.
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
					<?php esc_html_e( 'Why PCI DSS Security Awareness', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Matters', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-pci-why__copy">
					<p>
						<?php
						esc_html_e(
							'PCI DSS is designed to help organizations protect payment account data through technical, operational and organizational security requirements.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Technology and security controls are important, but employees also need to understand their responsibilities.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'PCI DSS Requirement 12.6 establishes security-awareness education as an ongoing activity and requires a formal awareness programme to make personnel aware of relevant information-security policies, procedures and their role in protecting cardholder data. Current requirements also specifically include awareness of phishing, related attacks and social engineering.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Different employees, however, interact with payment data differently.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'A general employee may need to understand what PCI DSS is, what cardholder data is and how it should be protected.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'A cashier or payment handler needs more practical awareness of card-present and card-not-present transactions, payment fraud, social engineering and suspicious payment activity.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

			</div>

		</div>

	</div>
</section>
