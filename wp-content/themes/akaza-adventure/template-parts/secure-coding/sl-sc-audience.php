<?php
/**
 * Secure Coding — Target audience.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audiences = array(
	array(
		'title' => __( 'Software developers', 'akaza-adventure' ),
		'text'  => __( 'Build stronger security habits into everyday implementation work.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'QA & test engineers', 'akaza-adventure' ),
		'text'  => __( 'Recognise security-sensitive behaviours and improve verification coverage.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'DevOps / DevSecOps teams', 'akaza-adventure' ),
		'text'  => __( 'Connect code, configuration, CI/CD and dependency risk.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Software architects', 'akaza-adventure' ),
		'text'  => __( 'Reinforce secure design principles and trust-boundary thinking.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Engineering managers', 'akaza-adventure' ),
		'text'  => __( 'Create a shared baseline for secure development expectations.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Graduates & new joiners', 'akaza-adventure' ),
		'text'  => __( 'Build the right coding habits before insecure shortcuts become routine.', 'akaza-adventure' ),
	),
);
?>

<section class="sl-sc-audience" id="audience" aria-labelledby="sl-sc-audience-title">
	<div class="container">

		<div class="sl-sc-audience__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Target audience', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-sc-audience-title">
				<?php
				echo wp_kses(
					__( 'Who should take secure coding <span>training?</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php
				esc_html_e(
					'The course is designed for people who build, test, deploy or make decisions about software — including learners who are new to application security.',
					'akaza-adventure'
				);
				?>
			</p>
		</div>

		<div class="sl-sc-audience__grid">
			<?php foreach ( $audiences as $audience ) : ?>
				<article class="sl-sc-audience__card">
					<h3 class="sl-panel-title"><?php echo esc_html( $audience['title'] ); ?></h3>
					<p><?php echo esc_html( $audience['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
