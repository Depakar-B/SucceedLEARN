<?php
/**
 * OWASP — Why it matters / impact.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$impacts = array(
	array(
		'title' => __( 'Unauthorised Access', 'akaza-adventure' ),
		'text'  => __( 'Attackers may gain access to restricted information, accounts or privileged functionality.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Data Exposure', 'akaza-adventure' ),
		'text'  => __( 'Weak access controls, cryptographic failures or injection vulnerabilities can expose sensitive information.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Application Compromise', 'akaza-adventure' ),
		'text'  => __( 'Injection, compromised dependencies or integrity failures can enable unauthorised commands or malicious software.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Operational Disruption', 'akaza-adventure' ),
		'text'  => __( 'Resource abuse, unsafe error handling or configuration failures can affect availability and business operations.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Compliance & Contractual Exposure', 'akaza-adventure' ),
		'text'  => __( 'Security incidents involving sensitive or regulated information can create legal, contractual and regulatory consequences.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Reputational Impact', 'akaza-adventure' ),
		'text'  => __( 'Security incidents can damage confidence in digital products and services.', 'akaza-adventure' ),
	),
);
?>

<section class="sl-owasp-impact" aria-labelledby="sl-owasp-impact-title">
	<div class="container">

		<div class="sl-owasp-impact__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Why it matters', 'akaza-adventure' ); ?>
			</span>
			<h2 id="sl-owasp-impact-title">
				<?php
				echo wp_kses(
					__( 'Why OWASP Top 10 Training <span>Matters</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>
			<p>
				<?php esc_html_e( 'Application-security weaknesses can affect much more than software functionality.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-owasp-impact__bands">
			<?php foreach ( $impacts as $impact ) : ?>
				<div>
					<strong><?php echo esc_html( $impact['title'] ); ?></strong>
					<p><?php echo esc_html( $impact['text'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="sl-owasp-impact__shift">
			<span><?php esc_html_e( 'Shift the focus from', 'akaza-adventure' ); ?></span>
			<strong><?php esc_html_e( 'Finding vulnerabilities after development', 'akaza-adventure' ); ?></strong>
			<b aria-hidden="true">→</b>
			<strong class="sl-owasp-impact__accent">
				<?php esc_html_e( 'Preventing more vulnerabilities during development', 'akaza-adventure' ); ?>
			</strong>
		</div>

	</div>
</section>
