<?php
/**
 * BFSI & PE/VC — Why Cybersecurity Awareness Training for BFSI & PE/VC?
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$reasons = array(
	array(
		'title' => __( 'Protect Sensitive Financial and Investor Information', 'akaza-adventure' ),
		'text'  => __( 'Employees across BFSI and PE/VC may access confidential financial, customer, investor, employee and transaction information. Awareness training helps reinforce the behaviours needed to protect that information.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Strengthen the Human Layer of Cybersecurity', 'akaza-adventure' ),
		'text'  => __( 'Technical controls remain essential, but attackers also target employees through manipulation, impersonation and fraudulent requests. Training helps employees recognise when they are being targeted.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Reduce Social-Engineering and Fraud Risk', 'akaza-adventure' ),
		'text'  => __( 'Employees learn to slow down, verify suspicious requests and report potential threats before acting—particularly important when instructions involve payments, credentials, sensitive information or senior executives.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Address Emerging AI-Enabled Threats', 'akaza-adventure' ),
		'text'  => __( 'Deepfakes, voice cloning and AI-generated phishing make fraudulent communications increasingly convincing. Employees need practical verification habits, not simply awareness that AI threats exist.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Reinforce Third-Party Security Behaviour', 'akaza-adventure' ),
		'text'  => __( 'Training helps employees understand their responsibilities when working with vendors, service providers and external platforms.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Encourage Earlier Incident Reporting', 'akaza-adventure' ),
		'text'  => __( 'Employees who can recognise suspicious activity and know how to escalate it can help security teams investigate and respond earlier.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-bfsi-choose"
	aria-labelledby="sl-bfsi-choose-title"
>
	<div class="container">

		<div class="sl-bfsi-choose__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Business Value', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-bfsi-choose-title">
				<?php esc_html_e( 'Why Cybersecurity Awareness Training for', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'BFSI & PE/VC?', 'akaza-adventure' ); ?></span>
			</h2>

		</div>

		<div class="sl-bfsi-choose__grid">

			<?php foreach ( $reasons as $reason ) : ?>

				<article class="sl-bfsi-choose__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $reason['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $reason['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
