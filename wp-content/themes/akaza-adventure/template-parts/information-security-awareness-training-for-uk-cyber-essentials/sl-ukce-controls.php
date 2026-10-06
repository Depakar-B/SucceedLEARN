<?php
/**
 * UK Cyber Essentials — Certification clarity + how training relates to controls.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$rows = array(
	array(
		'control' => __( 'Firewalls', 'akaza-adventure' ),
		'topics'  => __( 'Remote Work Security', 'akaza-adventure' ),
		'support' => __( 'Reinforces awareness of secure networks, remote access and safer use of organisational devices outside controlled environments', 'akaza-adventure' ),
	),
	array(
		'control' => __( 'Secure Configuration', 'akaza-adventure' ),
		'topics'  => __( 'Remote Work Security / supporting awareness', 'akaza-adventure' ),
		'support' => __( 'Helps employees understand the importance of using approved devices, applications and security settings', 'akaza-adventure' ),
	),
	array(
		'control' => __( 'Security Update Management', 'akaza-adventure' ),
		'topics'  => __( 'Supporting awareness within device/security learning', 'akaza-adventure' ),
		'support' => __( 'Reinforces why employees should not ignore approved software and security updates', 'akaza-adventure' ),
	),
	array(
		'control' => __( 'User Access Control', 'akaza-adventure' ),
		'topics'  => __( 'Account Security', 'akaza-adventure' ),
		'support' => __( 'Builds awareness around authentication, passwords, MFA, credentials and responsible account access', 'akaza-adventure' ),
	),
	array(
		'control' => __( 'Malware Protection', 'akaza-adventure' ),
		'topics'  => __( 'Malware', 'akaza-adventure' ),
		'support' => __( 'Helps employees recognise suspicious links, downloads, attachments and malware-related risks', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-ukce-controls"
	id="what-cyber-essentials-requires"
	aria-labelledby="sl-ukce-requires-title"
>
	<div class="container">

		<div class="sl-ukce-controls__clarity">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Certification Clarity', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-ukce-requires-title">
				<?php esc_html_e( 'What Cyber Essentials Requires and', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'What Training Supports', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Cyber Essentials requires organisations to implement the technical requirements associated with all five controls within their certification scope. The current v3.3 requirements are effective from 27 April 2026.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'Employee awareness training can reinforce the human behaviours surrounding those technical controls, but training itself does not configure a firewall, apply software updates, remove unnecessary services or technically restrict system access.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'The distinction can be thought of simply:', 'akaza-adventure' ); ?>
			</p>

			<div class="sl-ukce-controls__compare" role="list">
				<div class="sl-ukce-controls__compare-item" role="listitem">
					<strong><?php esc_html_e( 'Cyber Essentials technical controls', 'akaza-adventure' ); ?></strong>
					<span><?php esc_html_e( 'Protect the organisation’s IT environment', 'akaza-adventure' ); ?></span>
				</div>
				<div class="sl-ukce-controls__compare-item" role="listitem">
					<strong><?php esc_html_e( 'Employee security awareness', 'akaza-adventure' ); ?></strong>
					<span><?php esc_html_e( 'Helps employees use that environment securely', 'akaza-adventure' ); ?></span>
				</div>
			</div>

			<p>
				<?php esc_html_e( 'Both contribute to stronger cybersecurity, but they serve different purposes.', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-ukce-controls__heading" id="how-training-relates-to-controls">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Control Mapping', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-ukce-controls-title">
				<?php esc_html_e( 'How the Training Relates to the', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Five Cyber Essentials Controls', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<div class="sl-ukce-controls__table-wrap">
			<table class="sl-ukce-controls__table">
				<caption class="screen-reader-text">
					<?php esc_html_e( 'How security awareness topics support the five Cyber Essentials technical controls', 'akaza-adventure' ); ?>
				</caption>
				<thead>
					<tr>
						<th scope="col"><?php esc_html_e( 'Cyber Essentials Technical Control', 'akaza-adventure' ); ?></th>
						<th scope="col"><?php esc_html_e( 'Relevant Training Topics', 'akaza-adventure' ); ?></th>
						<th scope="col"><?php esc_html_e( 'How Employee Awareness Can Support It', 'akaza-adventure' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $rows as $row ) : ?>
						<tr>
							<td>
								<span class="sl-ukce-controls__cell sl-ukce-controls__cell--strong">
									<?php echo esc_html( $row['control'] ); ?>
								</span>
							</td>
							<td>
								<span class="sl-ukce-controls__cell">
									<?php echo esc_html( $row['topics'] ); ?>
								</span>
							</td>
							<td>
								<span class="sl-ukce-controls__cell">
									<?php echo esc_html( $row['support'] ); ?>
								</span>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<div class="sl-ukce-controls__note">
			<strong><?php esc_html_e( 'Important Mapping Note', 'akaza-adventure' ); ?></strong>
			<p>
				<?php esc_html_e( 'Cyber Essentials is a technical certification scheme, not a prescribed employee-training curriculum.', 'akaza-adventure' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'The S-Aware modules above are mapped based on their relevance to secure employee behaviours around the five Cyber Essentials controls. Completing security awareness training alone does not satisfy Cyber Essentials certification requirements.', 'akaza-adventure' ); ?>
			</p>
		</div>

	</div>
</section>
