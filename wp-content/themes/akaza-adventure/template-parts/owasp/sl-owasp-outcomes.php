<?php
/**
 * OWASP — Learning outcomes.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$outcomes = array(
	__( 'Recognise common application-security weaknesses.', 'akaza-adventure' ),
	__( 'Understand how normal application functionality can be misused or attacked.', 'akaza-adventure' ),
	__( 'Distinguish authentication from authorisation.', 'akaza-adventure' ),
	__( 'Identify differences between design, implementation and configuration weaknesses.', 'akaza-adventure' ),
	__( 'Understand common software supply-chain risks.', 'akaza-adventure' ),
	__( 'Apply secure input-handling and injection-prevention principles.', 'akaza-adventure' ),
	__( 'Understand appropriate protection of sensitive information.', 'akaza-adventure' ),
	__( 'Recognise insecure authentication and session-management practices.', 'akaza-adventure' ),
	__( 'Understand software and data integrity verification.', 'akaza-adventure' ),
	__( 'Improve security logging, alerting and exception handling.', 'akaza-adventure' ),
	__( 'Apply foundational secure coding principles.', 'akaza-adventure' ),
	__( 'Communicate application-security risks using recognised OWASP terminology.', 'akaza-adventure' ),
);
?>

<section class="sl-owasp-outcomes" id="outcomes" aria-labelledby="sl-owasp-outcomes-title">
	<div class="container">
		<div class="sl-owasp-outcomes__grid">

			<div class="sl-owasp-outcomes__heading">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Learning outcomes', 'akaza-adventure' ); ?>
				</span>
				<h2 id="sl-owasp-outcomes-title">
					<?php
					echo wp_kses(
						__( 'What Will Learners Be Able to <span>Do?</span>', 'akaza-adventure' ),
						array( 'span' => array() )
					);
					?>
				</h2>
				<p>
					<?php
					esc_html_e(
						'Build practical awareness that supports more secure decisions across design, development, testing and deployment.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

			<div class="sl-owasp-outcomes__list">
				<?php foreach ( $outcomes as $index => $outcome ) : ?>
					<div>
						<span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
						<p><?php echo esc_html( $outcome ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>

		</div>
	</div>
</section>
