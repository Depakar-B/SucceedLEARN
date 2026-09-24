<?php
/**
 * SOC 2 Security Awareness — Why Choose.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$choose_items = array(
	array(
		'title' => __( 'Support Your SOC 2 Readiness Programme', 'akaza-adventure' ),
		'text'  => __( 'Build employee awareness around security risks and behaviors that may support controls within the organization\'s SOC 2 environment.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Strengthen Account and Access Behavior', 'akaza-adventure' ),
		'text'  => __( 'Reinforce password, authentication and credential-protection practices among employees.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Protect Sensitive Information', 'akaza-adventure' ),
		'text'  => __( 'Help employees understand information classification and secure handling matters are important.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Reduce Human-Layer Cyber Risk', 'akaza-adventure' ),
		'text'  => __( 'Build awareness around phishing, social engineering, malware and insider threats.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Strengthen Third-Party Security Awareness', 'akaza-adventure' ),
		'text'  => __( 'Help employees understand the security implications of working with vendors and external service providers.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Encourage Faster Incident Reporting', 'akaza-adventure' ),
		'text'  => __( 'Give employees greater confidence to recognise and report suspicious activity.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Maintain Evidence of Awareness Activity', 'akaza-adventure' ),
		'text'  => __( 'Training completion and assessment records can form part of an organisation’s evidence that employee awareness activities have taken place. The specific evidence needed for a SOC 2 examination depends on the organisation’s controls and the auditor’s procedures.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-soc2-choose"
	id="why-choose-soc2-training"
	aria-labelledby="sl-soc2-choose-title"
>
	<div class="container">

		<div class="sl-soc2-choose__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Why SucceedLEARN', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-soc2-choose-title">
				<?php esc_html_e( 'Why Choose Information Security Awareness Training', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'for SOC 2?', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<div class="sl-soc2-choose__grid">
			<?php foreach ( $choose_items as $item ) : ?>
				<article class="sl-soc2-choose__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
