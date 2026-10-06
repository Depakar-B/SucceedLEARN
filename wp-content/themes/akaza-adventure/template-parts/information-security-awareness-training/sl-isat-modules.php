<?php
/**
 * Information Security Awareness Training - 10 module cards.
 *
 * CTA links use "#" until the individual module pages are published.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$modules = array(
	array(
		'title'   => __( 'Account Security', 'akaza-adventure' ),
		'tagline' => __( 'Protect Accounts and Credentials', 'akaza-adventure' ),
		'text'    => __( 'Help employees understand secure authentication, password practices, MFA and the importance of protecting organisational accounts from unauthorised access.', 'akaza-adventure' ),
		'topics'  => __( 'Password Security · MFA · Authentication · Credential Protection · Account Access', 'akaza-adventure' ),
		'cta'     => __( 'Explore Account Security Training', 'akaza-adventure' ),
		'url'     => '#',
	),
	array(
		'title'   => __( 'AI-Based Attacks', 'akaza-adventure' ),
		'tagline' => __( 'Recognise Emerging AI-Enabled Threats', 'akaza-adventure' ),
		'text'    => __( 'Build employee awareness of how artificial intelligence can be used to create increasingly convincing phishing, impersonation, deepfake and social-engineering attacks.', 'akaza-adventure' ),
		'topics'  => __( 'AI-Generated Phishing · Deepfakes · Voice Impersonation · AI Social Engineering · Verification', 'akaza-adventure' ),
		'cta'     => __( 'Explore AI-Based Attack Awareness Training', 'akaza-adventure' ),
		'url'     => '#',
	),
	array(
		'title'   => __( 'Data Classification', 'akaza-adventure' ),
		'tagline' => __( 'Know the Information. Handle It Appropriately.', 'akaza-adventure' ),
		'text'    => __( 'Help employees understand different classifications of organisational information and why appropriate storage, access, sharing and handling matter.', 'akaza-adventure' ),
		'topics'  => __( 'Data Classification · Sensitive Information · Secure Handling · Data Sharing · Information Protection', 'akaza-adventure' ),
		'cta'     => __( 'Explore Data Classification Training', 'akaza-adventure' ),
		'url'     => '#',
	),
	array(
		'title'   => __( 'Malware', 'akaza-adventure' ),
		'tagline' => __( 'Recognise Malicious Activity Before It Causes Harm', 'akaza-adventure' ),
		'text'    => __( 'Help employees recognise common malware risks and understand how malicious links, attachments, downloads and software can compromise organisational systems.', 'akaza-adventure' ),
		'topics'  => __( 'Malware · Ransomware · Malicious Attachments · Suspicious Links · Unsafe Downloads', 'akaza-adventure' ),
		'cta'     => __( 'Explore Malware Awareness Training', 'akaza-adventure' ),
		'url'     => '#',
	),
	array(
		'title'   => __( 'Physical Security', 'akaza-adventure' ),
		'tagline' => __( 'Protect Information Beyond the Screen', 'akaza-adventure' ),
		'text'    => __( 'Build awareness around physical access, unattended devices, confidential documents, visitors and other workplace security risks.', 'akaza-adventure' ),
		'topics'  => __( 'Physical Access · Tailgating · Device Security · Clean Desk Practices · Visitor Awareness', 'akaza-adventure' ),
		'cta'     => __( 'Explore Physical Security Training', 'akaza-adventure' ),
		'url'     => '#',
	),
	array(
		'title'   => __( 'Remote Work Security', 'akaza-adventure' ),
		'tagline' => __( 'Work Anywhere. Stay Security-Aware.', 'akaza-adventure' ),
		'text'    => __( 'Reinforce secure behaviors when employees access organizational information, systems and devices outside controlled office environments.', 'akaza-adventure' ),
		'topics'  => __( 'Remote Working · Wi-Fi Security · Device Protection · Secure Access · Working Outside the Office', 'akaza-adventure' ),
		'cta'     => __( 'Explore Remote Work Security Training', 'akaza-adventure' ),
		'url'     => '#',
	),
	array(
		'title'   => __( 'Social Engineering', 'akaza-adventure' ),
		'tagline' => __( 'Recognize When Attackers Target People', 'akaza-adventure' ),
		'text'    => __( 'Help employees recognize manipulation, urgency, authority and impersonation techniques used to persuade people to disclose information or take unsafe actions.', 'akaza-adventure' ),
		'topics'  => __( 'Phishing · Smishing · Vishing · Impersonation · Suspicious Requests · Verification', 'akaza-adventure' ),
		'cta'     => __( 'Explore Social Engineering Training', 'akaza-adventure' ),
		'url'     => '#',
	),
	array(
		'title'   => __( 'Vendor & Third-Party Risk Management', 'akaza-adventure' ),
		'tagline' => __( 'Understand Security Risks Beyond Your Organisation', 'akaza-adventure' ),
		'text'    => __( 'Help employees understand their security responsibilities when interacting with vendors, service providers and other external organisations.', 'akaza-adventure' ),
		'topics'  => __( 'Vendor Risk · Third-Party Security · Secure Data Sharing · Approved Vendors · Escalation', 'akaza-adventure' ),
		'cta'     => __( 'Explore Third-Party Risk Training', 'akaza-adventure' ),
		'url'     => '#',
	),
	array(
		'title'   => __( 'Incident Reporting', 'akaza-adventure' ),
		'tagline' => __( 'Recognize It. Report It. Respond Faster.', 'akaza-adventure' ),
		'text'    => __( 'Help employees identify potential security incidents and understand why prompt reporting through the appropriate organisational channels matters.', 'akaza-adventure' ),
		'topics'  => __( 'Security Incidents · Warning Signs · Reporting · Escalation · Employee Responsibilities', 'akaza-adventure' ),
		'cta'     => __( 'Explore Incident Reporting Training', 'akaza-adventure' ),
		'url'     => '#',
	),
	array(
		'title'   => __( 'Insider Threat', 'akaza-adventure' ),
		'tagline' => __( 'Recognise Risks From Within', 'akaza-adventure' ),
		'text'    => __( 'Help employees understand how malicious actions, negligence and compromised accounts can create insider risk and how suspicious activity should be reported.', 'akaza-adventure' ),
		'topics'  => __( 'Malicious Insiders · Negligent Behaviour · Compromised Accounts · Warning Signs · Reporting', 'akaza-adventure' ),
		'cta'     => __( 'Explore Insider Threat Training', 'akaza-adventure' ),
		'url'     => '#',
	),
);
?>

<section
	class="sl-isat-modules"
	id="information-security-awareness-modules"
	aria-labelledby="sl-isat-modules-title"
>
	<div class="container">

		<div class="sl-isat-modules__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'S-Aware Modules', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-isat-modules-title">
				<?php esc_html_e( '10 Information Security', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Awareness Training Modules', 'akaza-adventure' ); ?></span>
			</h2>

			<h3 class="sl-isat-modules__subtitle">
				<?php esc_html_e( 'Build Awareness Across the Cyber Risks Employees Encounter Every Day', 'akaza-adventure' ); ?>
			</h3>
		</div>

		<div class="sl-isat-modules__grid">
			<?php foreach ( $modules as $module ) : ?>
				<article class="sl-isat-modules__card">
					<div class="sl-isat-modules__content">
						<h3 class="sl-panel-title">
							<?php echo esc_html( $module['title'] ); ?>
						</h3>

						<p class="sl-isat-modules__tagline">
							<?php echo esc_html( $module['tagline'] ); ?>
						</p>

						<p>
							<?php echo esc_html( $module['text'] ); ?>
						</p>

						<p class="sl-isat-modules__topics">
							<strong><?php esc_html_e( 'Key Topics:', 'akaza-adventure' ); ?></strong>
							<?php echo esc_html( $module['topics'] ); ?>
						</p>

						<a class="sl-isat-modules__link sl-isat-modules__cta" href="<?php echo esc_url( $module['url'] ); ?>">
							<?php echo esc_html( $module['cta'] ); ?>
						</a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
