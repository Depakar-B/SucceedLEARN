<?php
/**
 * PCI DSS AMP — Which training should employees take? (comparison table).
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$comparison_rows = succeedlearn_amp_get_pci_dss_comparison_rows();
?>
<section class="sl-pci-laws" aria-labelledby="sl-pci-laws-title">
	<div class="sl-wrap">
		<div class="sl-pci-laws__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Choose the Right Module', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-pci-laws-title" class="sl-h2">
				<?php esc_html_e( 'Which PCI DSS Training Should', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Employees Take?', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-pci-laws__table-wrap">
			<table class="sl-pci-laws__table">
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Employee Requirement', 'succeedlearn-amp' ); ?></th>
						<th scope="col"><?php esc_html_e( 'PCI DSS Employee Awareness', 'succeedlearn-amp' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Cashier & Payment Handler Training', 'succeedlearn-amp' ); ?></th>
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
