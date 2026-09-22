<?php
/**
 * OWASP — Secure coding mindset.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$principles = array(
	__( 'Secure Software Development Life Cycle', 'akaza-adventure' ),
	__( 'Shift-left security', 'akaza-adventure' ),
	__( 'CIA Triad', 'akaza-adventure' ),
	__( 'Minimising attack surface', 'akaza-adventure' ),
	__( 'Secure defaults', 'akaza-adventure' ),
	__( 'Principle of least privilege', 'akaza-adventure' ),
	__( 'Defence in depth', 'akaza-adventure' ),
	__( 'Failing securely', 'akaza-adventure' ),
	__( 'Separation of duties', 'akaza-adventure' ),
	__( 'Avoiding security through obscurity', 'akaza-adventure' ),
	__( 'Managing third-party dependencies', 'akaza-adventure' ),
	__( 'Fixing vulnerabilities at the root cause', 'akaza-adventure' ),
);

$terminal_lines = array(
	array( '01', 'secureDefaults(<strong>true</strong>);', false ),
	array( '02', 'enforceLeastPrivilege();', false ),
	array( '03', 'validateInput();', false ),
	array( '04', 'failSecurely();', false ),
	array( '05', 'verifyDependencies();', false ),
	array( '06', 'buildSecurityIn();', true ),
);
?>

<section class="sl-owasp-coding" aria-labelledby="sl-owasp-coding-title">
	<div class="container">
		<div class="sl-owasp-coding__grid">

			<div class="sl-owasp-coding__visual" aria-hidden="true">
				<div class="sl-owasp-coding__terminal">
					<div class="sl-owasp-coding__terminal-top">
						<span></span><span></span><span></span>
					</div>
					<?php foreach ( $terminal_lines as $line ) : ?>
						<div class="sl-owasp-coding__line<?php echo $line[2] ? ' is-highlight' : ''; ?>">
							<em><?php echo esc_html( $line[0] ); ?></em>
							<?php echo wp_kses( $line[1], array( 'strong' => array() ) ); ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="sl-owasp-coding__content">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'More than the Top 10', 'akaza-adventure' ); ?>
				</span>
				<h2 id="sl-owasp-coding-title">
					<?php
					echo wp_kses(
						__( 'Build the <span>Secure Coding Mindset</span>', 'akaza-adventure' ),
						array( 'span' => array() )
					);
					?>
				</h2>
				<p>
					<?php
					esc_html_e(
						'The program also introduces foundational secure-development concepts that connect the individual OWASP risks. Secure coding is not simply about memorising rules. It is about helping developers make small, deliberate and security-aware decisions during everyday development.',
						'akaza-adventure'
					);
					?>
				</p>
				<ul class="sl-owasp-coding__list">
					<?php foreach ( $principles as $principle ) : ?>
						<li><?php echo esc_html( $principle ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>

		</div>
	</div>
</section>
