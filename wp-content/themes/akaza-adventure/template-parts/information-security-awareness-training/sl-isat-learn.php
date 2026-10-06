<?php
/**
 * Information Security Awareness Training - What Will Employees Learn?
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learn_items = array(
	array(
		'title' => __( 'Understand Their Role in Information Security', 'akaza-adventure' ),
		'text'  => __( 'Recognize how individual actions and everyday workplace decisions contribute to protecting organizational systems, information, and digital assets.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Recognise Common Cyber Threats', 'akaza-adventure' ),
		'text'  => __( 'Identify common security threats including phishing, social engineering, malware, suspicious online activity, and other techniques used to compromise information and systems.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Respond to Phishing & Social Engineering', 'akaza-adventure' ),
		'text'  => __( 'Understand different phishing techniques and learn how to assess suspicious communications before clicking, sharing information, or taking action.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Protect Accounts & Access', 'akaza-adventure' ),
		'text'  => __( 'Apply safer password practices and understand how authentication measures such as two-factor authentication and Multi-Factor Authentication (MFA) help protect organisational accounts.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Handle Information Securely', 'akaza-adventure' ),
		'text'  => __( 'Understand how information can be classified based on sensitivity and why different types of organisational information require appropriate handling and protection.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Protect Physical & Digital Assets', 'akaza-adventure' ),
		'text'  => __( 'Recognise the security considerations associated with laptops, mobile phones, removable storage devices, workspaces, and physical access.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Use AI More Safely', 'akaza-adventure' ),
		'text'  => __( 'Understand responsible use of AI tools and develop greater awareness of security risks associated with AI-enabled threats.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Identify & Report Security Incidents', 'akaza-adventure' ),
		'text'  => __( 'Recognize situations that may indicate a security incident and understand the importance of reporting potential threats promptly.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-isat-learn"
	id="what-will-employees-learn"
	aria-labelledby="sl-isat-learn-title"
>
	<div class="container">

		<div class="sl-isat-learn__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Learning Outcomes', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-isat-learn-title">
				<?php esc_html_e( 'What Will Employees', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Learn?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'By the end of the Information Security Awareness Training, employees will be able to:', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-isat-learn__grid">
			<?php foreach ( $learn_items as $item ) : ?>
				<article class="sl-isat-learn__card">
					<h3><?php echo esc_html( $item['title'] ); ?></h3>
					<p><?php echo esc_html( $item['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
