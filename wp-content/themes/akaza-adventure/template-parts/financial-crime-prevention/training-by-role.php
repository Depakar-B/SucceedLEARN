<?php
/**
 * Financial Crime Prevention — Who should take the training section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audience_rows = array(
	array(
		'group'    => __( 'All employees and new joiners', 'akaza-adventure' ),
		'risks'    => __( 'General compliance risks, misconduct, unusual requests and responsible workplace use.', 'akaza-adventure' ),
		'training' => __( 'ABAC, fraud prevention, modern slavery and responsible AI.', 'akaza-adventure' ),
	),
	array(
		'group'    => __( 'Client-facing and onboarding teams', 'akaza-adventure' ),
		'risks'    => __( 'Customer identity, unusual activity and high-risk relationships.', 'akaza-adventure' ),
		'training' => __( 'Anti-Money Laundering.', 'akaza-adventure' ),
	),
	array(
		'group'    => __( 'Finance and operations teams', 'akaza-adventure' ),
		'risks'    => __( 'Payments, suspicious instructions, records and transaction anomalies.', 'akaza-adventure' ),
		'training' => __( 'AML, sanctions, tax evasion and fraud prevention.', 'akaza-adventure' ),
	),
	array(
		'group'    => __( 'Sales and business development', 'akaza-adventure' ),
		'risks'    => __( 'Gifts, hospitality, third parties, intermediaries and high-risk markets.', 'akaza-adventure' ),
		'training' => __( 'ABAC, sanctions and fraud prevention.', 'akaza-adventure' ),
	),
	array(
		'group'    => __( 'Procurement and vendor teams', 'akaza-adventure' ),
		'risks'    => __( 'Suppliers, associated persons, supply chains and unusual payment activity.', 'akaza-adventure' ),
		'training' => __( 'ABAC, tax evasion, fraud and modern slavery awareness.', 'akaza-adventure' ),
	),
	array(
		'group'    => __( 'Employees handling sensitive information', 'akaza-adventure' ),
		'risks'    => __( 'Inside information, confidential information and disclosure risks.', 'akaza-adventure' ),
		'training' => __( 'Insider Trading.', 'akaza-adventure' ),
	),
	array(
		'group'    => __( 'Employees using AI tools', 'akaza-adventure' ),
		'risks'    => __( 'Workplace AI use and application of organisational controls.', 'akaza-adventure' ),
		'training' => __( 'Responsible Use of AI.', 'akaza-adventure' ),
	),
);
?>
<section
	id="audience"
	class="sl-fcp-section sl-fcp-section--grey sl-fcp-audience"
	aria-labelledby="sl-fcp-audience-title"
>
	<div class="container">

		<div class="sl-fcp-section-intro">
			<p class="sl-fcp-eyebrow">
				<?php esc_html_e( 'Role-Relevant Learning', 'akaza-adventure' ); ?>
			</p>

			<h2 id="sl-fcp-audience-title">
				<?php esc_html_e( 'Who Should Take Financial Crime Prevention Training?', 'akaza-adventure' ); ?>
			</h2>

			<p class="sl-fcp-lead">
				<?php esc_html_e( 'Training may be relevant to employees who encounter compliance risks through customers, payments, vendors, third parties, confidential information, technology or business decisions.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-fcp-table-wrap">
			<table class="sl-fcp-table sl-fcp-table--audience">
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Employee Group', 'akaza-adventure' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Risks They May Encounter', 'akaza-adventure' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Potentially Relevant Training', 'akaza-adventure' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $audience_rows as $row ) : ?>
						<tr>
							<td><?php echo esc_html( $row['group'] ); ?></td>
							<td><?php echo esc_html( $row['risks'] ); ?></td>
							<td><?php echo esc_html( $row['training'] ); ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>
</section>
