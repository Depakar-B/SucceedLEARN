<?php
/**
 * PCI DSS — Why PCI DSS Compliance Training for Cashiers & Payment Handlers?
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$reasons = array(
	array(
		'title' => __( 'Directly mitigates financial loss from card fraud and chargebacks', 'akaza-adventure' ),
		'text'  => __( 'The training equips frontline staff to identify fraudulent card-present and card-not-present transactions, perform card authentication checks, and initiate Code-10 authorisations, significantly reducing fraud-related chargebacks that merchants are contractually liable to absorb.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Addresses the single biggest cause of payment data breaches: human error', 'akaza-adventure' ),
		'text'  => __( 'The course explicitly tackles social engineering risks (phishing, pretexting, baiting, tailgating) and unsafe handling behaviours, which industry evidence consistently links to the majority of data breaches, making training a critical preventive control rather than a theoretical requirement.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Protects customer trust and brand reputation at the point of payment', 'akaza-adventure' ),
		'text'  => __( 'Payment handlers are the final line of defence in safeguarding cardholder data. Training ensures cards remain visible, PINs are shielded, receipts are securely stored, and sensitive data is never verbally repeated or transmitted insecurely - directly reinforcing customer confidence.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Clarifies individual accountability through role-based controls', 'akaza-adventure' ),
		'text'  => __( 'The course reinforces PCI requirements such as unique user IDs, access control, secure logins, and transaction traceability, enabling employers to clearly map actions to individuals and demonstrate governance and oversight in the event of investigations.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Scales compliance consistently across distributed retail and payment environments', 'akaza-adventure' ),
		'text'  => __( 'With structured, scenario-based instruction for cashiers, payment handlers, and supervisors, the training ensures consistent PCI-aligned behaviour across locations, shifts, and teams, reducing variability and control gaps.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-pci-choose"
	aria-labelledby="sl-pci-choose-title"
>
	<div class="container">

		<div class="sl-pci-choose__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Business Value', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-pci-choose-title">
				<?php esc_html_e( 'Why PCI DSS Compliance Training for', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Cashiers & Payment Handlers?', 'akaza-adventure' ); ?></span>
			</h2>

		</div>

		<div class="sl-pci-choose__grid">

			<?php foreach ( $reasons as $reason ) : ?>

				<article class="sl-pci-choose__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $reason['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $reason['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
