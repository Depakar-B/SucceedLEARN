<?php
/**
 * SOC 2 Security Awareness — How Training Supports Security Objectives.
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
	class="sl-soc2-objectives"
	id="how-training-supports-soc-2"
	aria-labelledby="sl-soc2-objectives-title"
>
	<div class="container">

		<div class="sl-soc2-objectives__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Security Programme Alignment', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-soc2-objectives-title">
				<?php esc_html_e( 'How the Training Supports', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'SOC 2 Security Objectives', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

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
</section>
