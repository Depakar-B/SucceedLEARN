<?php
/**
 * Financial Crime Prevention — Training by role section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$training_roles = array(
	array(
		'group'    => __( 'All employees and new joiners', 'akaza-adventure' ),
		'risk'     => __( 'Suspicious conduct, gifts, conflicts, unusual requests and reporting concerns.', 'akaza-adventure' ),
		'training' => __( 'Core awareness, ABAC and fraud prevention.', 'akaza-adventure' ),
	),
	array(
		'group'    => __( 'Client-facing and onboarding teams', 'akaza-adventure' ),
		'risk'     => __( 'Customer identity, ownership, unusual activity and high-risk relationships.', 'akaza-adventure' ),
		'training' => __( 'AML, CFT and KYC compliance.', 'akaza-adventure' ),
	),
	array(
		'group'    => __( 'Finance and operations teams', 'akaza-adventure' ),
		'risk'     => __( 'Payments, records, suspicious instructions and transaction anomalies.', 'akaza-adventure' ),
		'training' => __( 'AML, sanctions, tax evasion and fraud prevention.', 'akaza-adventure' ),
	),
	array(
		'group'    => __( 'Sales and business development', 'akaza-adventure' ),
		'risk'     => __( 'Gifts, hospitality, intermediaries, third parties and high-risk markets.', 'akaza-adventure' ),
		'training' => __( 'ABAC, sanctions and fraud prevention.', 'akaza-adventure' ),
	),
	array(
		'group'    => __( 'Procurement and vendor teams', 'akaza-adventure' ),
		'risk'     => __( 'Third-party conduct, associated persons, invoices and unusual payment requests.', 'akaza-adventure' ),
		'training' => __( 'ABAC, tax evasion and fraud prevention.', 'akaza-adventure' ),
	),
	array(
		'group'    => __( 'Employees handling sensitive information', 'akaza-adventure' ),
		'risk'     => __( 'Inside information, disclosure, personal dealing and market conduct.', 'akaza-adventure' ),
		'training' => __( 'Insider trading and market abuse.', 'akaza-adventure' ),
	),
	array(
		'group'    => __( 'Managers and senior leaders', 'akaza-adventure' ),
		'risk'     => __( 'Oversight, escalation, approval and prevention responsibilities.', 'akaza-adventure' ),
		'training' => __( 'Role-relevant learning across the suite.', 'akaza-adventure' ),
	),
);
?>

<section
	id="training-by-role"
	class="sl-fcp-training-roles"
	aria-labelledby="sl-fcp-training-roles-title"
>
	<div class="container">

		<div class="sl-fcp-training-roles__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Role-relevant learning', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-fcp-training-roles-title">
				<?php esc_html_e( 'Who Should Take Financial Crime Prevention Training?', 'akaza-adventure' ); ?>
			</h2>

			<p>
				<?php esc_html_e(
					'Training may be relevant to employees who encounter financial crime risks through customers, payments, vendors, third parties, confidential information or business decisions.',
					'akaza-adventure'
				); ?>
			</p>

		</div>

		<div class="sl-fcp-training-roles__table-wrap">

			<table class="sl-fcp-training-roles__table">

				<thead>
					<tr>
						<th scope="col">
							<?php esc_html_e( 'Employee group', 'akaza-adventure' ); ?>
						</th>

						<th scope="col">
							<?php esc_html_e( 'Risks they may encounter', 'akaza-adventure' ); ?>
						</th>

						<th scope="col">
							<?php esc_html_e( 'Potentially relevant training', 'akaza-adventure' ); ?>
						</th>
					</tr>
				</thead>

				<tbody>

					<?php foreach ( $training_roles as $role ) : ?>

						<tr>

							<th scope="row">
								<?php echo esc_html( $role['group'] ); ?>
							</th>

							<td>
								<?php echo esc_html( $role['risk'] ); ?>
							</td>

							<td>
								<?php echo esc_html( $role['training'] ); ?>
							</td>

						</tr>

					<?php endforeach; ?>

				</tbody>

			</table>

		</div>

	</div>
</section>