<?php
/**
 * SOC 2 Security Awareness — Why Security Awareness Matters.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$risk_points = array(
	__( 'A compromised account may weaken access controls.', 'akaza-adventure' ),
	__( 'A phishing message can expose credentials.', 'akaza-adventure' ),
	__( 'Incorrectly handled information may create confidentiality or privacy risks.', 'akaza-adventure' ),
	__( 'A third-party interaction can introduce additional security exposure.', 'akaza-adventure' ),
	__( 'Delayed incident reporting can affect the organisation’s ability to respond appropriately.', 'akaza-adventure' ),
);
?>

<section
	class="sl-soc2-why"
	id="why-security-awareness-matters"
	aria-labelledby="sl-soc2-why-title"
>
	<div class="container">

		<div class="sl-soc2-why__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Trust Services Criteria', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-soc2-why-title">
				<?php esc_html_e( 'Why Security Awareness Matters', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'for SOC 2', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'SOC 2 examinations assess controls at service organisations that are relevant to one or more of the AICPA Trust Services Criteria: Security, Availability, Processing Integrity, Confidentiality and Privacy.', 'akaza-adventure' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'Employees can influence many of the controls organizations rely on to protect information and systems.', 'akaza-adventure' ); ?>
			</p>
		</div>

		<div class="sl-soc2-why__grid">
			<?php foreach ( $risk_points as $point ) : ?>
				<article class="sl-soc2-why__card">
					<span class="sl-soc2-why__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" focusable="false" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 3l7 3v5c0 4.5-2.9 7.8-7 10-4.1-2.2-7-5.5-7-10V6l7-3z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>
							<path d="M12 8v5M12 15.5h.01" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
						</svg>
					</span>
					<p><?php echo esc_html( $point ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-soc2-why__conclusion">
			<p>
				<?php esc_html_e( 'This makes employee information security awareness an important part of a wider control environment.', 'akaza-adventure' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'SucceedLEARN’s SOC 2-focused security awareness training helps employees understand the risks they may encounter and the secure behaviours expected when accessing systems, handling information, communicating externally or responding to suspicious activity.', 'akaza-adventure' ); ?>
			</p>
		</div>

	</div>
</section>
