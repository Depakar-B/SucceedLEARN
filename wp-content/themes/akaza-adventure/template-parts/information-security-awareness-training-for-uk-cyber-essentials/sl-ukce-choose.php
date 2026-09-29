<?php
/**
 * UK Cyber Essentials — Why Choose.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$choose_items = array(
	array(
		'title' => __( 'Reinforce Secure Account Behaviour', 'akaza-adventure' ),
		'text'  => __( 'Help employees understand password, authentication, MFA and credential-protection practices relevant to secure access.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Strengthen Malware Awareness', 'akaza-adventure' ),
		'text'  => __( 'Build employee awareness around malicious files, links, software and other malware-related risks.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Support Secure Remote Working', 'akaza-adventure' ),
		'text'  => __( 'Reinforce safer practices when employees access organisational systems from homes, public locations or distributed environments.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Help Employees Understand Technical Security Practices', 'akaza-adventure' ),
		'text'  => __( 'Give employees enough context to understand why approved configurations, updates, access restrictions and security software matter.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Build Wider Security Awareness', 'akaza-adventure' ),
		'text'  => __( 'Organisations can extend beyond the core mapped modules with additional S-Aware learning on phishing, incident reporting, data handling, insider threats and other human-layer risks.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-ukce-choose"
	id="why-choose-cyber-essentials-training"
	aria-labelledby="sl-ukce-choose-title"
>
	<div class="container">

		<div class="sl-ukce-choose__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Why SucceedLEARN', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-ukce-choose-title">
				<?php esc_html_e( 'Why Choose Security Awareness Training', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'for Cyber Essentials?', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<div class="sl-ukce-choose__grid">
			<?php foreach ( $choose_items as $item ) : ?>
				<article class="sl-ukce-choose__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
