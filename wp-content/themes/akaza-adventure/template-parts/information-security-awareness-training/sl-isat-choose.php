<?php
/**
 * Information Security Awareness Training - Why Choose.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$choose_items = array(
	array(
		'title' => __( 'Build Foundational Cybersecurity Knowledge', 'akaza-adventure' ),
		'text'  => __( 'Give employees a practical understanding of the security risks they may encounter during everyday work.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Address the Human Element of Cyber Risk', 'akaza-adventure' ),
		'text'  => __( 'Help employees recognize when attackers are targeting human behavior rather than attempting to defeat technology directly.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Cover Multiple Areas of Employee Risk', 'akaza-adventure' ),
		'text'  => __( 'Bring account security, data protection, malware, social engineering, remote work, physical security, third-party risk and emerging threats into one structured programme.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Reinforce Security Responsibilities', 'akaza-adventure' ),
		'text'  => __( 'Help employees understand that protecting organisational information and systems is a shared responsibility.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Encourage Earlier Incident Reporting', 'akaza-adventure' ),
		'text'  => __( 'Give employees the awareness needed to recognize suspicious activity and understand when it should be escalated.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Support Wider Security & Compliance Objectives', 'akaza-adventure' ),
		'text'  => __( 'Information security awareness can form part of an organisation\'s wider cybersecurity, risk-management and compliance programme.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-isat-choose"
	id="why-choose-information-security-awareness-training"
	aria-labelledby="sl-isat-choose-title"
>
	<div class="container">

		<div class="sl-isat-choose__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Why SucceedLEARN', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-isat-choose-title">
				<?php esc_html_e( 'Why Choose Information Security', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Awareness Training', 'akaza-adventure' ); ?></span>
			</h2>
		</div>

		<div class="sl-isat-choose__grid">
			<?php foreach ( $choose_items as $item ) : ?>
				<article class="sl-isat-choose__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
