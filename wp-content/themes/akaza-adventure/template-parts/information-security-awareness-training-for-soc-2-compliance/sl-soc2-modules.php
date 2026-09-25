<?php
/**
 * SOC 2 Security Awareness — Modules cards.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$modules = array(
	array(
		'number'  => '01',
		'title'   => __( 'Account Security', 'akaza-adventure' ),
		'tagline' => __( 'Protect Accounts and Strengthen Access Security', 'akaza-adventure' ),
		'text'    => __( 'Employees learn why account security matters and how secure authentication practices help reduce the risk of unauthorised access.', 'akaza-adventure' ),
<<<<<<< HEAD
		'topics'  => __( 'Strong Password Creation · Password Security · NIST Guidance · 2FA · MFA Fatigue Attacks', 'akaza-adventure' ),
=======
		'topics'  => __( 'Password Security · MFA · Authentication · Credential Protection · Account Access', 'akaza-adventure' ),
>>>>>>> origin/master
		'cta'     => __( 'Explore Account Security Training', 'akaza-adventure' ),
	),
	array(
		'number'  => '02',
		'title'   => __( 'Data Classification', 'akaza-adventure' ),
		'tagline' => __( 'Handle Sensitive Information Appropriately', 'akaza-adventure' ),
		'text'    => __( 'Help employees understand how information is classified and why different types of data require different levels of protection.', 'akaza-adventure' ),
		'topics'  => __( 'Data Classification · Sensitive Information · Secure Handling · Data Sharing · Information Protection', 'akaza-adventure' ),
		'cta'     => __( 'Explore Data Classification Training', 'akaza-adventure' ),
	),
	array(
		'number'  => '03',
		'title'   => __( 'Malware', 'akaza-adventure' ),
		'tagline' => __( 'Recognise Malicious Activity Before It Causes Harm', 'akaza-adventure' ),
		'text'    => __( 'Employees learn how malware can enter organisational environments and the behaviours that can reduce exposure.', 'akaza-adventure' ),
		'topics'  => __( 'Malware · Ransomware · Suspicious Links · Malicious Attachments · Unsafe Downloads', 'akaza-adventure' ),
		'cta'     => __( 'Explore Malware Awareness Training', 'akaza-adventure' ),
	),
	array(
		'number'  => '04',
		'title'   => __( 'Physical Security', 'akaza-adventure' ),
		'tagline' => __( 'Protect Information Beyond Digital Systems', 'akaza-adventure' ),
		'text'    => __( 'Information security also depends on controlling physical access to devices, documents, workspaces and facilities.', 'akaza-adventure' ),
		'topics'  => __( 'Physical Access · Tailgating · Device Security · Clean Desk Practices · Visitor Awareness', 'akaza-adventure' ),
		'cta'     => __( 'Explore Physical Security Training', 'akaza-adventure' ),
	),
	array(
		'number'  => '05',
		'title'   => __( 'Remote Work Security', 'akaza-adventure' ),
		'tagline' => __( 'Stay Security-Aware Outside the Office', 'akaza-adventure' ),
		'text'    => __( 'Employees learn safer behaviours for accessing organisational systems and information from remote and hybrid working environments.', 'akaza-adventure' ),
		'topics'  => __( 'Remote Working · Wi-Fi Security · Secure Access · Device Protection · Working Outside the Office', 'akaza-adventure' ),
		'cta'     => __( 'Explore Remote Work Security Training', 'akaza-adventure' ),
	),
	array(
		'number'  => '06',
		'title'   => __( 'Social Engineering', 'akaza-adventure' ),
		'tagline' => __( 'Recognise When Attackers Target People', 'akaza-adventure' ),
		'text'    => __( 'Help employees identify manipulation, urgency, impersonation and phishing techniques used to influence employee behaviour.', 'akaza-adventure' ),
		'topics'  => __( 'Phishing · Smishing · Vishing · Impersonation · Suspicious Requests · Verification', 'akaza-adventure' ),
		'cta'     => __( 'Explore Social Engineering Training', 'akaza-adventure' ),
	),
	array(
		'number'  => '07',
		'title'   => __( 'Vendor & Third-Party Risk Management', 'akaza-adventure' ),
		'tagline' => __( 'Understand Security Risks Beyond Your Organisation', 'akaza-adventure' ),
		'text'    => __( 'Employees learn why third-party relationships can introduce risk and how approved processes, secure information sharing and appropriate escalation help protect organisational information.', 'akaza-adventure' ),
		'topics'  => __( 'Vendor Risk · Third-Party Security · Secure Data Sharing · Approved Vendors · Escalation', 'akaza-adventure' ),
		'cta'     => __( 'Explore Third-Party Risk Training', 'akaza-adventure' ),
	),
	array(
		'number'  => '08',
		'title'   => __( 'Incident Reporting', 'akaza-adventure' ),
		'tagline' => __( 'Recognise It. Report It. Respond Faster.', 'akaza-adventure' ),
		'text'    => __( 'Employees learn how to identify suspicious activity and why timely reporting through approved organisational channels matters.', 'akaza-adventure' ),
		'topics'  => __( 'Security Incidents · Warning Signs · Reporting · Escalation · Employee Responsibilities', 'akaza-adventure' ),
		'cta'     => __( 'Explore Incident Reporting Training', 'akaza-adventure' ),
	),
	array(
		'number'  => '09',
		'title'   => __( 'Insider Threat', 'akaza-adventure' ),
		'tagline' => __( 'Recognise Security Risks From Within', 'akaza-adventure' ),
		'text'    => __( 'Help employees understand how malicious actions, negligence and compromised accounts can create insider risk.', 'akaza-adventure' ),
		'topics'  => __( 'Malicious Insiders · Negligent Behaviour · Compromised Accounts · Warning Signs · Reporting', 'akaza-adventure' ),
		'cta'     => __( 'Explore Insider Threat Training', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-soc2-modules"
	id="security-awareness-modules"
	aria-labelledby="sl-soc2-modules-title"
>
	<div class="container">

		<div class="sl-soc2-modules__heading">
			<span class="sl-home-sub-heading">
<<<<<<< HEAD
				<?php esc_html_e( 'S-Aware Modules', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-soc2-modules-title">
				<?php esc_html_e( 'Security Awareness Modules Relevant to', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'SOC 2', 'akaza-adventure' ); ?></span>
			</h2>

			<h3 class="sl-soc2-modules__subtitle">
				<?php esc_html_e( 'Practical Training Across Key Employee Security Risks', 'akaza-adventure' ); ?>
			</h3>
=======
				<?php esc_html_e( 'Security Awareness Modules Relevant to SOC 2', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-soc2-modules-title">
				<?php esc_html_e( 'Practical Training Across', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Key Employee Security Risks', 'akaza-adventure' ); ?></span>
			</h2>
>>>>>>> origin/master
		</div>

		<div class="sl-soc2-modules__grid">
			<?php foreach ( $modules as $module ) : ?>
				<article class="sl-soc2-modules__card">
					<div class="sl-soc2-modules__number">
						<?php echo esc_html( $module['number'] ); ?>
					</div>

					<div class="sl-soc2-modules__content">
						<h3 class="sl-panel-title">
							<?php echo esc_html( $module['title'] ); ?>
						</h3>

						<p class="sl-soc2-modules__tagline">
							<?php echo esc_html( $module['tagline'] ); ?>
						</p>

						<p>
							<?php echo esc_html( $module['text'] ); ?>
						</p>

						<p class="sl-soc2-modules__topics">
							<strong><?php esc_html_e( 'Key Topics:', 'akaza-adventure' ); ?></strong>
							<?php echo esc_html( $module['topics'] ); ?>
						</p>

						<a class="sl-soc2-modules__link" href="#contact">
							<?php echo esc_html( $module['cta'] ); ?>
						</a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
