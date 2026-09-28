<?php
/**
 * UK Cyber Essentials — Additional Supporting Security Awareness.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$supporting = array(
	array(
		'title' => __( 'Social Engineering', 'akaza-adventure' ),
		'text'  => __( 'Build awareness around phishing, impersonation and manipulation techniques that may lead to credential compromise or unsafe actions.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Physical Security', 'akaza-adventure' ),
		'text'  => __( 'Reinforce secure behaviours around devices, physical access, unattended information and workplace security.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Incident Reporting', 'akaza-adventure' ),
		'text'  => __( 'Help employees recognise suspicious activity and understand when security concerns should be escalated.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Data Classification', 'akaza-adventure' ),
		'text'  => __( 'Help employees understand how sensitive information should be identified and handled.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Insider Threat', 'akaza-adventure' ),
		'text'  => __( 'Build awareness around malicious, negligent and compromised insider behaviour.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Vendor & Third-Party Risk Management', 'akaza-adventure' ),
		'text'  => __( 'Reinforce secure behaviour when employees interact with vendors and external organisations.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'AI-Based Attacks', 'akaza-adventure' ),
		'text'  => __( 'Help employees recognise emerging AI-enabled phishing, deepfake and impersonation risks.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-ukce-supporting"
	id="additional-supporting-security-awareness"
	aria-labelledby="sl-ukce-supporting-title"
>
	<div class="container">

		<div class="sl-ukce-supporting__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Broader S-Aware Library', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-ukce-supporting-title">
				<?php esc_html_e( 'Additional Supporting', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Security Awareness', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<div class="sl-ukce-supporting__grid">
			<?php foreach ( $supporting as $item ) : ?>
				<article class="sl-ukce-supporting__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
