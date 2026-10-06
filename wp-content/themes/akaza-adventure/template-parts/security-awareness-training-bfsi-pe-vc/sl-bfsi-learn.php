<?php
/**
 * BFSI & PE/VC — What Will Employees Learn?
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$learn_items = array(
	__( 'Recognize phishing, vishing, smishing, and other social-engineering techniques.', 'akaza-adventure' ),
	__( 'Identify warning signs associated with malicious, negligent, and compromised insider threats.', 'akaza-adventure' ),
	__( 'Apply appropriate physical security practices in the workplace.', 'akaza-adventure' ),
	__( 'Understand how personal and sensitive information should be handled and protected.', 'akaza-adventure' ),
	__( 'Recognize risks associated with third parties, vendors, and external data sharing.', 'akaza-adventure' ),
	__( 'Identify AI-enabled phishing, deepfakes, and impersonation attempts.', 'akaza-adventure' ),
	__( 'Verify suspicious requests before taking action.', 'akaza-adventure' ),
	__( 'Recognize when a security or privacy incident may have occurred.', 'akaza-adventure' ),
	__( 'Follow appropriate reporting and escalation procedures.', 'akaza-adventure' ),
	__( 'Understand how everyday employee decisions can affect organizational cybersecurity.', 'akaza-adventure' ),
);
?>

<section
	class="sl-bfsi-learn"
	id="what-will-employees-learn"
	aria-labelledby="sl-bfsi-learn-title"
>
	<div class="container">

		<div class="sl-bfsi-learn__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Learning Outcomes', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-bfsi-learn-title">
				<?php esc_html_e( 'What Will Employees', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Learn?', 'akaza-adventure' ); ?></span>
			</h2>

			<p class="sl-bfsi-learn__lead">
				<?php esc_html_e( 'By the end of the BFSI & PE/VC Cybersecurity Awareness Training, learners will be better equipped to:', 'akaza-adventure' ); ?>
			</p>
		</div>

		<ul class="sl-bfsi-learn__list">
			<?php foreach ( $learn_items as $item ) : ?>
				<li><?php echo esc_html( $item ); ?></li>
			<?php endforeach; ?>
		</ul>

	</div>
</section>
