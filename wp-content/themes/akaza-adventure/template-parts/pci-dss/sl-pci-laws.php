<?php
/**
 * PCI DSS — Which Training Should Employees Take? (comparison table).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$comparison_rows = array(
	array( __( 'Understand what PCI DSS is', 'akaza-adventure' ), true, true ),
	array( __( 'Understand PCI DSS goals', 'akaza-adventure' ), true, true ),
	array( __( 'General PCI DSS awareness', 'akaza-adventure' ), true, true ),
	array( __( 'Understand Cardholder & Sensitive Authentication Data', 'akaza-adventure' ), true, false ),
	array( __( 'PCI data-storage awareness', 'akaza-adventure' ), true, false ),
	array( __( 'Interactive PCI compliance scenarios', 'akaza-adventure' ), true, false ),
	array( __( 'Card-present transactions', 'akaza-adventure' ), false, true ),
	array( __( 'Card-not-present transactions', 'akaza-adventure' ), false, true ),
	array( __( 'Social engineering', 'akaza-adventure' ), false, true ),
	array( __( 'Phishing', 'akaza-adventure' ), false, true ),
	array( __( 'Pretexting & baiting', 'akaza-adventure' ), false, true ),
	array( __( 'Tailgating', 'akaza-adventure' ), false, true ),
	array( __( 'Code-10 calls', 'akaza-adventure' ), false, true ),
	array( __( 'Payment-handling do\'s & don\'ts', 'akaza-adventure' ), false, true ),
);
?>

<section
	class="sl-pci-laws"
	aria-labelledby="sl-pci-laws-title"
>
	<div class="container">

		<div class="sl-pci-laws__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Choose the Right Module', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-pci-laws-title">
				<?php esc_html_e( 'Which PCI DSS Training Should', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Employees Take?', 'akaza-adventure' ); ?></span>
			</h2>

		</div>

		<div class="sl-pci-laws__table-wrap">
			<table class="sl-pci-laws__table">
				<thead>
					<tr>
						<th scope="col">
							<?php esc_html_e( 'Employee Requirement', 'akaza-adventure' ); ?>
						</th>
						<th scope="col">
							<?php esc_html_e( 'PCI DSS Employee Awareness', 'akaza-adventure' ); ?>
						</th>
						<th scope="col">
							<?php esc_html_e( 'Cashier & Payment Handler Training', 'akaza-adventure' ); ?>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $comparison_rows as $row ) : ?>
						<tr>
							<td>
								<span class="sl-pci-laws__cell sl-pci-laws__cell--highlight">
									<?php echo esc_html( $row[0] ); ?>
								</span>
							</td>
							<td>
								<span class="sl-pci-laws__cell sl-pci-laws__mark<?php echo $row[1] ? ' is-yes' : ''; ?>">
									<?php echo $row[1] ? '✓' : '—'; ?>
								</span>
							</td>
							<td>
								<span class="sl-pci-laws__cell sl-pci-laws__mark<?php echo $row[2] ? ' is-yes' : ''; ?>">
									<?php echo $row[2] ? '✓' : '—'; ?>
								</span>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>
</section>
