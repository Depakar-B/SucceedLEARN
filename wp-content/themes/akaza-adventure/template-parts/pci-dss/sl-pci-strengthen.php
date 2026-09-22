<?php
/**
 * PCI DSS — Strengthen Payment Security Through Employee Awareness.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-pci-strengthen"
	aria-labelledby="sl-pci-strengthen-title"
>
	<div class="container">

		<div class="sl-pci-strengthen__inner">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Build Payment Resilience', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-pci-strengthen-title">
				<?php esc_html_e( 'Strengthen Payment Security Through', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Employee Awareness', 'akaza-adventure' ); ?></span>
			</h2>

			<div class="sl-pci-strengthen__copy">
				<p>
					<?php
					esc_html_e(
						'Secure payment processing depends on both technology and the people handling cardholder information.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Employees need to understand the information they are responsible for protecting, recognise suspicious payment activity, follow secure card-handling practices, and know how to respond when something doesn\'t look right.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						"SucceedLEARN's PCI DSS Cashier and Payments Handler Compliance eLearning Training gives frontline employees practical awareness of the security responsibilities associated with payment card transactions.",
						'akaza-adventure'
					);
					?>
				</p>

				<p class="sl-pci-strengthen__tagline">
					<?php esc_html_e( 'Protect cardholder data. Strengthen payment-handling practices. Support PCI DSS compliance.', 'akaza-adventure' ); ?>
				</p>
			</div>

			<a class="sl-content-btn sl-content-btn-primary" href="#request-demo">
				<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
			</a>

		</div>

	</div>
</section>
