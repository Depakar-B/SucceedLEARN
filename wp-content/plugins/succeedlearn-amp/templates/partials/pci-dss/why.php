<?php
/**
 * PCI DSS AMP — Why PCI DSS security awareness matters.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$why_image = succeedlearn_amp_get_pci_dss_why_image();
?>
<section class="sl-pci-why" aria-labelledby="sl-pci-why-title">
	<div class="sl-wrap">
		<div class="sl-pci-why__grid">
			<div class="sl-pci-why__content">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Payment Security Awareness', 'succeedlearn-amp' ); ?>
				</span>

				<h2 id="sl-pci-why-title" class="sl-h2">
					<?php esc_html_e( 'Why PCI DSS Security Awareness', 'succeedlearn-amp' ); ?>
					<span><?php esc_html_e( 'Matters', 'succeedlearn-amp' ); ?></span>
				</h2>

				<div class="sl-pci-why__copy">
					<p><?php esc_html_e( 'PCI DSS is designed to help organizations protect payment account data through technical, operational and organizational security requirements.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'Technology and security controls are important, but employees also need to understand their responsibilities.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'PCI DSS Requirement 12.6 establishes security-awareness education as an ongoing activity and requires a formal awareness programme to make personnel aware of relevant information-security policies, procedures and their role in protecting cardholder data. Current requirements also specifically include awareness of phishing, related attacks and social engineering.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'Different employees, however, interact with payment data differently.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'A general employee may need to understand what PCI DSS is, what cardholder data is and how it should be protected.', 'succeedlearn-amp' ); ?></p>
					<p><?php esc_html_e( 'A cashier or payment handler needs more practical awareness of card-present and card-not-present transactions, payment fraud, social engineering and suspicious payment activity.', 'succeedlearn-amp' ); ?></p>
				</div>
			</div>

			<div class="sl-pci-why__media">
				<div class="sl-pci-why__image">
					<amp-img
						src="<?php echo esc_url( $why_image ); ?>"
						width="720"
						height="720"
						layout="responsive"
						alt="<?php esc_attr_e( 'Why PCI DSS security awareness matters', 'succeedlearn-amp' ); ?>"
					></amp-img>
				</div>
			</div>
		</div>
	</div>
</section>
