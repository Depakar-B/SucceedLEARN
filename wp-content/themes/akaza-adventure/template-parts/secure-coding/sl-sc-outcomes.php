<?php
/**
 * Secure Coding — Learning outcomes.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$outcomes = array(
	array(
		'title' => __( 'Explain secure coding in context', 'akaza-adventure' ),
		'text'  => __( 'Describe why secure coding matters and how it fits within a secure software development lifecycle.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Recognise risky patterns', 'akaza-adventure' ),
		'text'  => __( 'Spot common weaknesses involving trust, validation, access, secrets, errors and insecure defaults.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Apply core principles', 'akaza-adventure' ),
		'text'  => __( 'Use least privilege, defence in depth, secure defaults, explicit trust boundaries and fail-safe behaviour.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Handle data more safely', 'akaza-adventure' ),
		'text'  => __( 'Make better choices around input, output, sensitive data, cryptography and secrets management.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Think beyond application code', 'akaza-adventure' ),
		'text'  => __( 'Consider dependencies, configurations, pipelines and software supply-chain choices as part of secure coding.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Verify security assumptions', 'akaza-adventure' ),
		'text'  => __( 'Use reviews, testing, logging and feedback to confirm that security controls behave as expected.', 'akaza-adventure' ),
	),
);
?>

<section class="sl-sc-outcomes" id="outcomes" aria-labelledby="sl-sc-outcomes-title">
	<div class="container">

		<div class="sl-sc-outcomes__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Learning outcomes', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-sc-outcomes-title">
				<?php esc_html_e( 'What learners should be able to do after the course', 'akaza-adventure' ); ?>
			</h2>

			<p>
				<?php
				esc_html_e(
					'The goal is not to turn every developer into a penetration tester. It is to improve the security quality of the decisions they already make every day.',
					'akaza-adventure'
				);
				?>
			</p>
		</div>

		<div class="sl-sc-outcomes__grid">
			<?php foreach ( $outcomes as $index => $outcome ) : ?>
				<article class="sl-sc-outcomes__card">
					<div class="sl-sc-outcomes__num">
						<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</div>
					<h3 class="sl-panel-title"><?php echo esc_html( $outcome['title'] ); ?></h3>
					<p><?php echo esc_html( $outcome['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
