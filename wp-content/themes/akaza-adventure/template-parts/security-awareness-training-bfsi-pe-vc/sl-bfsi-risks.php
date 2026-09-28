<?php
/**
 * BFSI & PE/VC — Cybersecurity Risks Covered in the Course.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$risks = array(
	array(
		'title'  => __( 'Social Engineering', 'akaza-adventure' ),
		'copy'   => array(
			__( 'Social-engineering attacks exploit trust, urgency, authority and human behaviour to persuade employees to disclose information, transfer funds, provide credentials or take unsafe actions.', 'akaza-adventure' ),
			__( 'Employees learn to recognise different forms of phishing and impersonation across email, SMS, telephone and video, identify common warning signs and apply appropriate verification and reporting steps.', 'akaza-adventure' ),
		),
		'topics' => __( 'Phishing · Smishing · Vishing · Impersonation · Suspicious Requests · Verification · Reporting', 'akaza-adventure' ),
		'file'   => '2026/09/BFSI-PE-VC-Social-Engineering.webp',
		'alt'    => __( 'Social engineering awareness for financial-services employees', 'akaza-adventure' ),
	),
	array(
		'title'  => __( 'Insider Threats', 'akaza-adventure' ),
		'copy'   => array(
			__( 'Not every cybersecurity threat originates outside the organisation.', 'akaza-adventure' ),
			__( 'The course introduces malicious, negligent and compromised insider threats, helping employees understand how legitimate access can be misused intentionally, accidentally or after an account has been compromised.', 'akaza-adventure' ),
			__( 'Learners explore warning signs, preventative behaviours and appropriate reporting actions.', 'akaza-adventure' ),
		),
		'topics' => __( 'Malicious Insiders · Negligent Behaviour · Compromised Accounts · Data Misuse · Reporting', 'akaza-adventure' ),
		'file'   => '2026/09/BFSI-PE-VC-Insider-Threats.webp',
		'alt'    => __( 'Insider threat awareness training', 'akaza-adventure' ),
	),
	array(
		'title'  => __( 'Physical Security', 'akaza-adventure' ),
		'copy'   => array(
			__( 'Cybersecurity also depends on protecting physical access to people, devices, documents and facilities.', 'akaza-adventure' ),
			__( 'Employees learn to recognise risks such as tailgating, unsecured devices, forged or misused access credentials and unattended confidential information, while reinforcing appropriate workplace security practices.', 'akaza-adventure' ),
		),
		'topics' => __( 'Access Control · Tailgating · Device Security · Visitor Security · Confidential Information', 'akaza-adventure' ),
		'file'   => '2026/09/BFSI-PE-VC-Physical-Security.webp',
		'alt'    => __( 'Physical security awareness in the workplace', 'akaza-adventure' ),
	),
	array(
		'title'  => __( 'Data Privacy', 'akaza-adventure' ),
		'copy'   => array(
			__( 'Employees regularly interact with personal and sensitive information, making appropriate data handling an important part of security awareness.', 'akaza-adventure' ),
			__( 'The training helps learners distinguish different types of personal information and understand principles around lawful processing, data handling, retention, data-subject requests, incident reporting, third-party sharing and cross-border transfers.', 'akaza-adventure' ),
			__( 'It also introduces privacy considerations associated with AI.', 'akaza-adventure' ),
		),
		'topics' => __( 'Personal Data · Sensitive Data · Data Handling · DSARs · Data Incidents · Third-Party Sharing · Responsible AI', 'akaza-adventure' ),
		'file'   => '2026/09/BFSI-PE-VC-Data-Privacy.webp',
		'alt'    => __( 'Data privacy awareness for BFSI and PE/VC employees', 'akaza-adventure' ),
	),
	array(
		'title'  => __( 'Third-Party Risk', 'akaza-adventure' ),
		'copy'   => array(
			__( 'Vendors, service providers and external platforms can introduce cybersecurity and data-protection risks even when an organisation maintains strong internal controls.', 'akaza-adventure' ),
			__( 'Employees learn their role in following approved processes for vendor engagement, data sharing, onboarding and escalation, helping ensure established third-party controls are followed in day-to-day work.', 'akaza-adventure' ),
		),
		'topics' => __( 'Vendor Risk · Approved Third Parties · Secure Data Sharing · Due Diligence · Escalation', 'akaza-adventure' ),
		'file'   => '2026/09/BFSI-PE-VC-Third-Party-Risk.webp',
		'alt'    => __( 'Third-party risk awareness for financial services', 'akaza-adventure' ),
	),
	array(
		'title'  => __( 'AI-Based Attacks', 'akaza-adventure' ),
		'copy'   => array(
			__( 'Artificial intelligence is increasing the realism and scalability of social-engineering and impersonation attempts.', 'akaza-adventure' ),
			__( 'The course helps employees recognize AI-generated phishing, deepfake video, voice impersonation, and other AI-enabled deception techniques, while reinforcing verification and escalation before acting on suspicious instructions.', 'akaza-adventure' ),
		),
		'topics' => __( 'Deepfakes · Voice Cloning · AI Phishing · Impersonation · Verification · Escalation', 'akaza-adventure' ),
		'file'   => '2026/09/BFSI-PE-VC-AI-Based-Attacks.webp',
		'alt'    => __( 'AI-based cyberattack awareness', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-bfsi-risks"
	id="cybersecurity-risks-covered"
	aria-labelledby="sl-bfsi-risks-title"
>
	<div class="container">

		<div class="sl-bfsi-risks__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Course Coverage', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-bfsi-risks-title">
				<?php esc_html_e( 'Cybersecurity Risks Covered in the', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Course', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<div class="sl-bfsi-risks__grid">
			<?php foreach ( $risks as $risk ) : ?>
				<?php
				$risk_src   = '';
				$risk_local = WP_CONTENT_DIR . '/uploads/' . $risk['file'];
				if ( function_exists( 'akaza_upload_url' ) && file_exists( $risk_local ) ) {
					$risk_src = akaza_upload_url( $risk['file'] );
				}
				?>
				<article class="sl-bfsi-risks__card">
					<?php if ( $risk_src ) : ?>
						<div class="sl-bfsi-risks__media">
							<img
								src="<?php echo esc_url( $risk_src ); ?>"
								alt="<?php echo esc_attr( $risk['alt'] ); ?>"
								width="640"
								height="360"
								loading="lazy"
								decoding="async"
							/>
						</div>
					<?php else : ?>
						<div class="sl-bfsi-risks__media sl-bfsi-risks__media--placeholder" aria-hidden="true"></div>
					<?php endif; ?>

					<div class="sl-bfsi-risks__content">
						<h3 class="sl-panel-title">
							<?php echo esc_html( $risk['title'] ); ?>
						</h3>

						<?php foreach ( $risk['copy'] as $paragraph ) : ?>
							<p><?php echo esc_html( $paragraph ); ?></p>
						<?php endforeach; ?>

						<p class="sl-bfsi-risks__topics">
							<strong><?php esc_html_e( 'Key areas:', 'akaza-adventure' ); ?></strong>
							<?php echo esc_html( $risk['topics'] ); ?>
						</p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
