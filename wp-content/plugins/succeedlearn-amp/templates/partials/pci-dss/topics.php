<?php
/**
 * PCI DSS AMP — Course outline tables.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$employee_outline = succeedlearn_amp_get_pci_dss_employee_outline();
$cashier_outline  = succeedlearn_amp_get_pci_dss_cashier_outline();
?>
<section class="sl-pci-topics" aria-labelledby="sl-pci-topics-title">
	<div class="sl-wrap">
		<div class="sl-pci-topics__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Curriculum', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-pci-topics-title" class="sl-h2">
				<?php esc_html_e( 'Course', 'succeedlearn-amp' ); ?>
				<span><?php esc_html_e( 'Outline', 'succeedlearn-amp' ); ?></span>
			</h2>
		</div>

		<div class="sl-pci-topics__blocks">
			<div class="sl-pci-topics__block">
				<h3 class="sl-panel-title">
					<?php esc_html_e( 'PCI DSS Employee Awareness Training', 'succeedlearn-amp' ); ?>
				</h3>
				<div class="sl-pci-topics__table-wrap">
					<table class="sl-pci-topics__table">
						<thead>
							<tr>
								<th scope="col"><?php esc_html_e( 'Topic', 'succeedlearn-amp' ); ?></th>
								<th scope="col"><?php esc_html_e( 'Coverage', 'succeedlearn-amp' ); ?></th>
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
					<?php esc_html_e( 'PCI DSS Cashier & Payment Handler Training', 'succeedlearn-amp' ); ?>
				</h3>
				<div class="sl-pci-topics__table-wrap">
					<table class="sl-pci-topics__table">
						<thead>
							<tr>
								<th scope="col"><?php esc_html_e( 'Topic', 'succeedlearn-amp' ); ?></th>
								<th scope="col"><?php esc_html_e( 'Coverage', 'succeedlearn-amp' ); ?></th>
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
