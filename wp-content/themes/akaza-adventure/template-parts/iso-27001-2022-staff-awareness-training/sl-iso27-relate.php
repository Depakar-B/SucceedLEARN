<?php
/**
 * ISO 27001:2022 Staff Awareness Training - ISO 27001 and Employee Security Awareness.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$objective_rows = array(
	array(
		'area'    => __( 'Information Security Awareness', 'akaza-adventure' ),
		'support' => __( 'Introduces employees to information security and why organisational information needs protection.', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Information Security Policy', 'akaza-adventure' ),
		'support' => __( 'Helps employees understand the importance of following organisational security policies and procedures.', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'ISMS Awareness', 'akaza-adventure' ),
		'support' => __( 'Explains what an Information Security Management System is and how employees contribute to its effectiveness.', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Confidentiality, Integrity & Availability', 'akaza-adventure' ),
		'support' => __( 'Makes the CIA principles understandable through practical workplace situations.', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Roles & Responsibilities', 'akaza-adventure' ),
		'support' => __( 'Reinforces that information security is a shared organisational responsibility rather than solely an IT function.', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Information Security Risks', 'akaza-adventure' ),
		'support' => __( 'Helps employees recognise behaviours and situations that can expose organisational information to risk.', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Secure Information Handling', 'akaza-adventure' ),
		'support' => __( 'Reinforces appropriate handling and protection of organisational information and assets.', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Security Incident Reporting', 'akaza-adventure' ),
		'support' => __( 'Helps employees recognise potential security incidents and understand the importance of prompt reporting.', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Awareness, Education & Training', 'akaza-adventure' ),
		'support' => __( 'Supports organisation-wide awareness objectives associated with ISO 27001:2022 Annex A Control 6.3.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-iso27-relate"
	id="iso-27001-and-employee-security-awareness"
	aria-labelledby="sl-iso27-relate-title"
>
	<div class="container">

		<div class="sl-iso27-relate__panel">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Standard Context', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-iso27-relate-title">
				<?php esc_html_e( 'ISO 27001:2022 and', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Employee Security Awareness', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'ISO 27001:2022 does not prescribe one universal employee training course or a fixed list of cybersecurity topics that every organisation must teach.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'Instead, organisations need to ensure that relevant personnel are appropriately aware of information security requirements and their responsibilities. Awareness and training should therefore reflect the organisation\'s policies, risks, roles and ISMS requirements. Annex A 6.3 specifically addresses information security awareness, education and training.', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-iso27-relate__supports">

			<h3 id="how-s-aware-supports-iso-27001-awareness">
				<?php esc_html_e( 'How S-Aware Supports', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'ISO 27001:2022 Awareness', 'akaza-adventure' ); ?></span>
			</h3>

			<div class="sl-iso27-objectives__table-wrap">
				<table class="sl-iso27-objectives__table">
					<caption class="screen-reader-text">
						<?php esc_html_e( 'How the training supports ISO 27001:2022 employee awareness areas', 'akaza-adventure' ); ?>
					</caption>
					<thead>
						<tr>
							<th scope="col"><?php esc_html_e( 'ISO 27001:2022 Awareness Area', 'akaza-adventure' ); ?></th>
							<th scope="col"><?php esc_html_e( 'How the Training Supports Employees', 'akaza-adventure' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $objective_rows as $row ) : ?>
							<tr>
								<td>
									<span class="sl-iso27-objectives__cell sl-iso27-objectives__cell--strong">
										<?php echo esc_html( $row['area'] ); ?>
									</span>
								</td>
								<td>
									<span class="sl-iso27-objectives__cell">
										<?php echo esc_html( $row['support'] ); ?>
									</span>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>

		</div>

	</div>
</section>
