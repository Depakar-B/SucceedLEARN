<?php
/**
 * SOC 2 Security Awareness — What Will Employees Learn?
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learn_items = array(
	__( 'Protect organisational accounts and authentication credentials.', 'akaza-adventure' ),
	__( 'Recognise phishing, impersonation and social-engineering attempts.', 'akaza-adventure' ),
	__( 'Handle sensitive information according to its classification.', 'akaza-adventure' ),
	__( 'Recognise malware and potentially unsafe digital activity.', 'akaza-adventure' ),
	__( 'Apply appropriate physical-security practices.', 'akaza-adventure' ),
	__( 'Work more securely in remote and hybrid environments.', 'akaza-adventure' ),
	__( 'Understand security risks associated with vendors and third parties.', 'akaza-adventure' ),
	__( 'Recognise insider threats and suspicious internal behaviour.', 'akaza-adventure' ),
	__( 'Identify and report potential information security incidents.', 'akaza-adventure' ),
	__( 'Understand how everyday employee actions can affect the organisation’s wider security control environment.', 'akaza-adventure' ),
);
?>

<section
	class="sl-soc2-learn"
	id="what-will-employees-learn"
	aria-labelledby="sl-soc2-learn-title"
>
	<div class="container">

		<div class="sl-soc2-learn__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Learning Outcomes', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-soc2-learn-title">
				<?php esc_html_e( 'What Will Employees', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Learn?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'By completing the training, employees will be better equipped to:', 'akaza-adventure' ); ?>
			</p>
		</div>

		<ul class="sl-soc2-learn__list">
			<?php foreach ( $learn_items as $item ) : ?>
				<li><?php echo esc_html( $item ); ?></li>
			<?php endforeach; ?>
		</ul>

		<p class="sl-soc2-learn__note">
			<?php esc_html_e( 'The objective is not to make employees SOC 2 specialists. It is to help them understand the security behaviours that can support the organisation’s information security controls and SOC 2 readiness.', 'akaza-adventure' ); ?>
		</p>

	</div>
</section>
