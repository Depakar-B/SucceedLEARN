<?php
/**
 * Secure Coding — Standards / frameworks callout.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$frameworks = array(
	array(
		'title' => __( 'OWASP Developer Guide', 'akaza-adventure' ),
		'text'  => __( 'Practical secure-coding checklists for access control, input handling, data protection, logging and error handling.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'OWASP Top 10:2025', 'akaza-adventure' ),
		'text'  => __( 'Current awareness categories include broken access control, security misconfiguration, software supply-chain failures, cryptographic failures, injection and more.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'NIST Secure Software Development Framework (SSDF)', 'akaza-adventure' ),
		'text'  => __( 'High-level secure software development practices designed to be integrated into existing SDLC approaches.', 'akaza-adventure' ),
	),
);
?>

<section class="sl-sc-frameworks" id="frameworks" aria-labelledby="sl-sc-frameworks-title">
	<div class="container">

		<div class="sl-sc-frameworks__panel">

			<div class="sl-sc-frameworks__intro">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Standards-informed approach', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-sc-frameworks-title">
					<?php esc_html_e( 'Grounded in recognised secure-development guidance', 'akaza-adventure' ); ?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'The course themes are informed by widely used application-security and secure-development guidance. This wording does not imply certification, endorsement or a formal standards audit.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

			<div class="sl-sc-frameworks__list">
				<?php foreach ( $frameworks as $framework ) : ?>
					<div class="sl-sc-frameworks__item">
						<strong><?php echo esc_html( $framework['title'] ); ?></strong>
						<span><?php echo esc_html( $framework['text'] ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>

		</div>

	</div>
</section>
