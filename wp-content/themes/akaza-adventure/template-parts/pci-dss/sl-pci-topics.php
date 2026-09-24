<?php
/**
 * PCI DSS — Course Outline (table form).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$employee_outline = array(
	array(
		__( 'Introduction & Objectives', 'akaza-adventure' ),
		'',
	),
	array(
		__( 'Understanding PCI DSS', 'akaza-adventure' ),
		__( 'What is PCI DSS? · Who does it apply to? · History of PCI DSS', 'akaza-adventure' ),
	),
	array(
		__( 'Understanding Payment Data', 'akaza-adventure' ),
		__( 'Cardholder Data · Sensitive Authentication Data', 'akaza-adventure' ),
	),
	array(
		__( 'Your Organisation & PCI DSS', 'akaza-adventure' ),
		__( 'Approach to PCI DSS Compliance · Security Check: Violation or No Violation?', 'akaza-adventure' ),
	),
	array(
		__( 'PCI DSS Goals & Requirements', 'akaza-adventure' ),
		__( 'PCI DSS Goals · Requirements and How They\'re Implemented', 'akaza-adventure' ),
	),
	array(
		__( 'PCI Data Storage Guidelines', 'akaza-adventure' ),
		__( 'Do\'s · Examples · Don\'ts · Examples', 'akaza-adventure' ),
	),
);

$cashier_outline = array(
	array(
		__( 'PCI DSS Foundations', 'akaza-adventure' ),
		__( 'PCI Council · PCI DSS Goals · Why PCI DSS Guidelines Matter', 'akaza-adventure' ),
	),
	array(
		__( 'Customer Payment Handlers', 'akaza-adventure' ),
		__( 'Responsibilities · PCI DSS Definitions', 'akaza-adventure' ),
	),
	array(
		__( 'Handling Card Transactions', 'akaza-adventure' ),
		__( 'Card-Present · Card-Not-Present', 'akaza-adventure' ),
	),
	array(
		__( 'PCI DSS Requirements', 'akaza-adventure' ),
		'',
	),
	array(
		__( 'Social Engineering & Payment Security Threats', 'akaza-adventure' ),
		__( 'Phishing · Pretexting · Baiting · Tailgating', 'akaza-adventure' ),
	),
	array(
		__( 'Responding to Suspicious Activity', 'akaza-adventure' ),
		__( 'Code-10 Calls', 'akaza-adventure' ),
	),
	array(
		__( 'Secure Payment Practices', 'akaza-adventure' ),
		__( 'Do\'s & Don\'ts', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-pci-topics"
	aria-labelledby="sl-pci-topics-title"
>
	<div class="container">

		<div class="sl-pci-topics__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Curriculum', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-pci-topics-title">
				<?php esc_html_e( 'Course', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Outline', 'akaza-adventure' ); ?></span>
			</h2>

		</div>

		<div class="sl-pci-topics__blocks">

			<div class="sl-pci-topics__block">
				<h3 class="sl-panel-title">
					<?php esc_html_e( 'PCI DSS Employee Awareness Training', 'akaza-adventure' ); ?>
				</h3>
				<div class="sl-pci-topics__table-wrap">
					<table class="sl-pci-topics__table">
						<thead>
							<tr>
								<th scope="col"><?php esc_html_e( 'Topic', 'akaza-adventure' ); ?></th>
								<th scope="col"><?php esc_html_e( 'Coverage', 'akaza-adventure' ); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ( $employee_outline as $row ) : ?>
								<tr>
									<td>
										<span class="sl-pci-topics__cell sl-pci-topics__cell--title">
											<?php echo esc_html( $row[0] ); ?>
										</span>
									</td>
									<td>
										<span class="sl-pci-topics__cell">
											<?php echo esc_html( $row[1] ); ?>
										</span>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="sl-pci-topics__block">
				<h3 class="sl-panel-title">
					<?php esc_html_e( 'PCI DSS Cashier & Payment Handler Training', 'akaza-adventure' ); ?>
				</h3>
				<div class="sl-pci-topics__table-wrap">
					<table class="sl-pci-topics__table">
						<thead>
							<tr>
								<th scope="col"><?php esc_html_e( 'Topic', 'akaza-adventure' ); ?></th>
								<th scope="col"><?php esc_html_e( 'Coverage', 'akaza-adventure' ); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ( $cashier_outline as $row ) : ?>
								<tr>
									<td>
										<span class="sl-pci-topics__cell sl-pci-topics__cell--title">
											<?php echo esc_html( $row[0] ); ?>
										</span>
									</td>
									<td>
										<span class="sl-pci-topics__cell">
											<?php echo esc_html( $row[1] ); ?>
										</span>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>

		</div>

	</div>
</section>
