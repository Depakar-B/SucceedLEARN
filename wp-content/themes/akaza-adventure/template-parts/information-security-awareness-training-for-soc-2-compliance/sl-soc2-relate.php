<?php
/**
 * SOC 2 Security Awareness — How Modules Relate to SOC 2 + supports table.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$objective_rows = array(
	array(
		'area'    => __( 'Account & Access Security', 'akaza-adventure' ),
		'module'  => __( 'Account Security', 'akaza-adventure' ),
		'support' => __( 'Reinforces secure authentication, credential protection and access behaviours', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Information Protection', 'akaza-adventure' ),
		'module'  => __( 'Data Classification', 'akaza-adventure' ),
		'support' => __( 'Helps employees understand how sensitive information should be handled and protected', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Threat Awareness', 'akaza-adventure' ),
		'module'  => __( 'Malware', 'akaza-adventure' ),
		'support' => __( 'Builds awareness around malicious software, suspicious files and unsafe digital behaviour', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Physical Protection', 'akaza-adventure' ),
		'module'  => __( 'Physical Security', 'akaza-adventure' ),
		'support' => __( 'Reinforces secure behaviour around physical access, devices and workplace information', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Distributed Workforce Security', 'akaza-adventure' ),
		'module'  => __( 'Remote Work Security', 'akaza-adventure' ),
		'support' => __( 'Addresses security risks associated with accessing organisational systems outside controlled environments', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Human-Layer Threats', 'akaza-adventure' ),
		'module'  => __( 'Social Engineering', 'akaza-adventure' ),
		'support' => __( 'Helps employees recognise phishing, manipulation and impersonation attempts', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Third-Party Security', 'akaza-adventure' ),
		'module'  => __( 'Vendor & Third-Party Risk Management', 'akaza-adventure' ),
		'support' => __( 'Reinforces secure employee behaviour when interacting with vendors and external parties', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Security Event Awareness', 'akaza-adventure' ),
		'module'  => __( 'Incident Reporting', 'akaza-adventure' ),
		'support' => __( 'Helps employees recognise and escalate suspicious activity', 'akaza-adventure' ),
	),
	array(
		'area'    => __( 'Internal Security Risk', 'akaza-adventure' ),
		'module'  => __( 'Insider Threat', 'akaza-adventure' ),
		'support' => __( 'Builds awareness around malicious, negligent and compromised insider behaviour', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-soc2-relate"
	id="how-modules-relate-to-soc-2"
	aria-labelledby="sl-soc2-relate-title"
>
	<div class="container">

		<div class="sl-soc2-relate__panel">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Control Environment Context', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-soc2-relate-title">
				<?php esc_html_e( 'How These Modules Relate', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'to SOC 2', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'SOC 2 does not prescribe a universal list of mandatory employee security-awareness topics.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'The appropriate controls for a SOC 2 engagement depend on the organisation’s system, risks, policies and applicable Trust Services Criteria. The AICPA’s Trust Services Criteria are used to evaluate controls relevant to Security, Availability, Processing Integrity, Confidentiality and Privacy; they are not a predefined employee training syllabus.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'The modules on this page have therefore been selected based on their relevance to employee security behaviours and organisational control objectives.', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-soc2-relate__supports" id="how-training-supports-soc-2">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Security Programme Alignment', 'akaza-adventure' ); ?>
			</span>

			<h3 id="sl-soc2-objectives-title">
				<?php esc_html_e( 'How the Training Supports', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'SOC 2 Security Objectives', 'akaza-adventure' ); ?></span>
			</h3>

			<div class="sl-soc2-objectives__table-wrap">
				<table class="sl-soc2-objectives__table">
					<caption class="screen-reader-text">
						<?php esc_html_e( 'How security awareness modules support SOC 2 security programme objectives', 'akaza-adventure' ); ?>
					</caption>
					<thead>
						<tr>
							<th scope="col"><?php esc_html_e( 'Security Awareness Area', 'akaza-adventure' ); ?></th>
							<th scope="col"><?php esc_html_e( 'Relevant Module Topics', 'akaza-adventure' ); ?></th>
							<th scope="col"><?php esc_html_e( 'How It Supports the Security Programme', 'akaza-adventure' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $objective_rows as $row ) : ?>
							<tr>
								<td>
									<span class="sl-soc2-objectives__cell sl-soc2-objectives__cell--strong">
										<?php echo esc_html( $row['area'] ); ?>
									</span>
								</td>
								<td>
									<span class="sl-soc2-objectives__cell">
										<?php echo esc_html( $row['module'] ); ?>
									</span>
								</td>
								<td>
									<span class="sl-soc2-objectives__cell">
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
