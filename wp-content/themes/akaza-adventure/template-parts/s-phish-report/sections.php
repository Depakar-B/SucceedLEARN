<?php
/**
 * S-PhishReport — Article sections (shared by desktop + AMP).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<article class="sl-legal-content">

	<section id="introduction" class="sl-legal-section">
		<h2><?php esc_html_e( '1. Introduction', 'akaza-adventure' ); ?></h2>
		<p><?php esc_html_e( 'This Privacy Policy and Terms of Use govern your use of the S-PhishReport Google Add-On, provided by Succeed Technologies Pvt Ltd. ("we", "our", "us"). By installing and using the Add-On, you agree to be bound by the terms outlined in this Policy. The Add-On is designed to assist users in reporting phishing emails within Gmail in a streamlined and efficient manner, enhancing organizational security efforts while also facilitating phishing awareness training. All operations of the Add-On are executed within Google\'s secure infrastructure (Gmail and Drive).', 'akaza-adventure' ); ?></p>
	</section>

	<section id="overview" class="sl-legal-section">
		<h2><?php esc_html_e( '2. Overview', 'akaza-adventure' ); ?></h2>
		<p><?php esc_html_e( 'S-PhishReport is a Google add-on designed to simplify the process of reporting phishing attempts directly from Gmail. When a user clicks the S-PhishReport Gmail Add-on button, the add-on checks the headers of the email that is currently open. If the header indicates that the message is part of a phishing simulation (identified by the X-ST-PST: SucceedTech marker), the email is automatically forwarded to the training mailbox for simulation tracking. If the header is not present, the email is treated as a real phishing report and is forwarded to the security mailbox. This process ensures that simulated and real phishing reports are accurately separated and handled correctly.', 'akaza-adventure' ); ?></p>
	</section>

	<section id="key-features" class="sl-legal-section">
		<h2><?php esc_html_e( '3. Key Features', 'akaza-adventure' ); ?></h2>
		<ul>
			<li>
				<strong><?php esc_html_e( 'One-click phishing reporting:', 'akaza-adventure' ); ?></strong>
				<?php esc_html_e( 'Users can report the currently opened email with a single click. The add-on simply initiates the report action without requiring any additional user steps.', 'akaza-adventure' ); ?>
			</li>
			<li>
				<strong><?php esc_html_e( 'Simulation awareness:', 'akaza-adventure' ); ?></strong>
				<?php esc_html_e( 'The add-on identifies simulated phishing emails using the simulation header configured by the administrator, ensuring that training emails are kept separate from real phishing reports.', 'akaza-adventure' ); ?>
			</li>
			<li>
				<strong><?php esc_html_e( 'Preserves evidence:', 'akaza-adventure' ); ?></strong>
				<?php esc_html_e( 'All reported emails are forwarded in their original format as .eml files, to preserve evidence for investigation and compliance purposes.', 'akaza-adventure' ); ?>
			</li>
			<li>
				<strong><?php esc_html_e( 'Admin-configurable actions:', 'akaza-adventure' ); ?></strong>
				<?php esc_html_e( 'Once the S-PhishReport add-on is installed, administrators must configure three items: the destination mailbox for training reports, the destination mailbox for security reports, and, if required, the simulation-header key and value that will be used to identify simulated phishing emails. These settings enable the add-on to correctly distinguish and route reported messages.', 'akaza-adventure' ); ?>
			</li>
			<li>
				<strong><?php esc_html_e( 'Domain-wide deployment:', 'akaza-adventure' ); ?></strong>
				<?php esc_html_e( 'The Add-On can be deployed across an entire Workspace domain, ensuring that individual consent prompts are bypassed, simplifying deployment for administrators.', 'akaza-adventure' ); ?>
			</li>
		</ul>
	</section>

	<section id="permissions-and-scopes" class="sl-legal-section">
		<h2><?php esc_html_e( '4. Permissions and Scopes', 'akaza-adventure' ); ?></h2>
		<p><?php esc_html_e( 'S-PhishReport requests a few permissions, and here\'s why each one is needed:', 'akaza-adventure' ); ?></p>
		<ul>
			<li>
				<strong><?php esc_html_e( 'See, edit, create, and delete only the specific Google Drive files you use with this app:', 'akaza-adventure' ); ?></strong>
				<?php esc_html_e( 'This lets the add-on create a temporary copy of the reported email in a secure format, stored only in its own private Drive space.', 'akaza-adventure' ); ?>
			</li>
			<li>
				<strong><?php esc_html_e( 'View your email messages when the add-on is running:', 'akaza-adventure' ); ?></strong>
				<?php esc_html_e( 'This allows the add-on to read only the email you are reporting so it can capture the full message, attachments, and headers.', 'akaza-adventure' ); ?>
			</li>
			<li>
				<strong><?php esc_html_e( 'Run as a Gmail add-on:', 'akaza-adventure' ); ?></strong>
				<?php esc_html_e( 'This permission enables S-PhishReport to appear inside Gmail and operate directly from your inbox.', 'akaza-adventure' ); ?>
			</li>
			<li>
				<strong><?php esc_html_e( 'Send email on your behalf:', 'akaza-adventure' ); ?></strong>
				<?php esc_html_e( 'This allows the add-on to forward the reported message to the security or training mailbox from your account, ensuring authenticity.', 'akaza-adventure' ); ?>
			</li>
			<li>
				<strong><?php esc_html_e( 'Read, compose, and send emails from your Gmail account:', 'akaza-adventure' ); ?></strong>
				<?php esc_html_e( 'This lets the add-on prepare the outgoing report email, attach the suspicious message, and send it securely.', 'akaza-adventure' ); ?>
			</li>
			<li>
				<strong><?php esc_html_e( 'Allow this application to run when you are not present:', 'akaza-adventure' ); ?></strong>
				<?php esc_html_e( 'This lets the add-on finish the report in the background. If the email is over 25 MB or Google times out, it will still create the Drive file and send the report even after you close Gmail.', 'akaza-adventure' ); ?>
			</li>
		</ul>
	</section>

	<section id="data-privacy-and-security" class="sl-legal-section">
		<h2><?php esc_html_e( '5. Data Privacy and Security', 'akaza-adventure' ); ?></h2>
		<p><?php esc_html_e( 'We are committed to protecting the privacy and security of your data. The Add-On is designed to minimize the amount of personal and sensitive information it accesses. Here is an overview of our data privacy practices:', 'akaza-adventure' ); ?></p>
		<ul>
			<li>
				<strong><?php esc_html_e( 'Minimal Data Access:', 'akaza-adventure' ); ?></strong>
				<?php esc_html_e( 'The Add-On accesses only the currently open email message to extract headers and relevant information. No other emails or data within your Gmail account are accessed.', 'akaza-adventure' ); ?>
			</li>
			<li>
				<strong><?php esc_html_e( 'Forwarding Emails:', 'akaza-adventure' ); ?></strong>
				<?php esc_html_e( 'Reported emails are forwarded as .eml attachments, preserving the full message content, including headers, for investigation purposes.', 'akaza-adventure' ); ?>
			</li>
			<li>
				<strong><?php esc_html_e( 'Data Storage:', 'akaza-adventure' ); ?></strong>
				<?php esc_html_e( 'If a reported message exceeds Gmail\'s attachment size limit, the Add-On securely stores the .eml file in the reporter\'s Google Drive and shares a link with the configured mailbox as per admin policy. All processing occurs within Google\'s environment and follows organization-defined security configurations.', 'akaza-adventure' ); ?>
			</li>
			<li>
				<strong><?php esc_html_e( 'Data Processing Transparency:', 'akaza-adventure' ); ?></strong>
				<?php esc_html_e( 'The Add-On accesses subject lines, headers (including simulation identifiers), message IDs, and raw message content only to generate the .eml file. Reporter identity (verified Google email) and admin-defined configurations are processed securely within Google Apps Script properties. No message content is stored externally.', 'akaza-adventure' ); ?>
			</li>
		</ul>
	</section>

	<section id="admin-configuration" class="sl-legal-section">
		<h2><?php esc_html_e( '6. Admin Configuration and Deployment', 'akaza-adventure' ); ?></h2>
		<p><?php esc_html_e( 'S-PhishReport can be privately deployed across your organization\'s Google Workspace domain, providing users with a seamless experience without individual consent prompts. The Add-On integrates smoothly with existing phishing simulation tools, allowing administrators to configure Gmail compliance rules to safelist simulation emails and prevent them from being misclassified as real phishing threats. Administrators can also customize reporting mailboxes for phishing and simulated reports and specify post-report actions. Administrators retain complete control over configuration, including reporting destinations and retention settings. The Add-On\'s configuration data, such as mailbox destinations and post-report policies, is securely stored in Google Apps Script properties under the organization\'s domain and can be modified or deleted at any time by the administrator.', 'akaza-adventure' ); ?></p>
	</section>

	<section id="use-of-data" class="sl-legal-section">
		<h2><?php esc_html_e( '7. Use of Data', 'akaza-adventure' ); ?></h2>
		<p><?php esc_html_e( 'We do not sell, share, or transfer any personal data to third parties. All data processed through the Add-On remains under your organization\'s control and is used solely for phishing detection, reporting, and phishing simulation tracking. Our organization is ISO 27001 and SOC 2 Type II certified, reflecting our commitment to maintaining the highest standards of data security, privacy, and operational integrity. All Add-On operations occur entirely within Google\'s infrastructure, ensuring that data remains encrypted in transit and protected by Google\'s security controls.', 'akaza-adventure' ); ?></p>
	</section>

	<section id="changes-to-policy" class="sl-legal-section">
		<h2><?php esc_html_e( '8. Changes to This Policy', 'akaza-adventure' ); ?></h2>
		<p><?php esc_html_e( 'We may update this Privacy Policy from time to time. Any changes will be reflected in the updated version of the Policy, and users are encouraged to review it periodically to stay informed about how we manage data and maintain the Add-On\'s features.', 'akaza-adventure' ); ?></p>
	</section>

	<section id="disclaimer" class="sl-legal-section">
		<h2><?php esc_html_e( '9. Disclaimer', 'akaza-adventure' ); ?></h2>
		<p><?php esc_html_e( 'S-PhishReport is an independent software product and is not endorsed by Google LLC. The Add-On is provided "as is." It supports phishing awareness and reporting within Gmail and operates with industry best practices to ensure reliability and security. Its effectiveness also depends on user vigilance and adherence to organizational security training. In the event of any security incident affecting Add-On processing, Succeed Technologies will notify affected administrators promptly and cooperate as required by applicable data protection regulations.', 'akaza-adventure' ); ?></p>
		<p>
			<?php
			echo wp_kses(
				__( '<strong>SucceedLEARN</strong> is a product of <strong>Succeed Technologies&reg;</strong>, a dynamic organization that aims to revolutionize how people learn online and simplify Compliance eLearning for organizations across the globe.', 'akaza-adventure' ),
				array( 'strong' => array() )
			);
			?>
		</p>
	</section>

</article>
