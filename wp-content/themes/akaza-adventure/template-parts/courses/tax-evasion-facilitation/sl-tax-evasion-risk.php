<?php
/**
 * Preventing the Facilitation of Tax Evasion Training — Risk at Work.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$risk_steps = array(
	array(
		'number'      => '01',
		'label'       => __( 'REQUEST', 'akaza-adventure' ),
		'title'       => __( 'Something looks unusual', 'akaza-adventure' ),
		'description' => __( 'A payment, arrangement or instruction does not fit the expected pattern.', 'akaza-adventure' ),
	),
	array(
		'number'      => '02',
		'label'       => __( 'RECOGNISE', 'akaza-adventure' ),
		'title'       => __( 'The learner questions it', 'akaza-adventure' ),
		'description' => __( 'Awareness helps them recognise when further consideration may be needed.', 'akaza-adventure' ),
	),
	array(
		'number'      => '03',
		'label'       => __( 'RESPOND', 'akaza-adventure' ),
		'title'       => __( 'They know what happens next', 'akaza-adventure' ),
		'description' => __( 'Concerns are raised through the organisation’s appropriate reporting process.', 'akaza-adventure' ),
	),
);
?>

<section
	id="tax-evasion-risk"
	class="sl-tax-evasion-risk"
	aria-labelledby="sl-tax-evasion-risk-title"
>
	<div class="container">

		<div class="sl-tax-evasion-risk__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Preventing Tax Evasion Risk at Work', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-tax-evasion-risk-title">
				<?php esc_html_e( 'Would they know when to', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'stop?', 'akaza-adventure' ); ?></span>
			</h2>

			<p>
				<?php esc_html_e( 'Tax evasion facilitation risk does not always arrive clearly labelled as a compliance issue. It may begin with a client request, an unusual transaction, a complex arrangement or a third-party relationship that deserves closer scrutiny.', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-tax-evasion-risk__grid">

			<?php foreach ( $risk_steps as $step ) : ?>

				<article class="sl-tax-evasion-risk__card">

					<div class="sl-tax-evasion-risk__step">

						<span class="sl-tax-evasion-risk__number">
							<?php echo esc_html( $step['number'] ); ?>
						</span>

						<span class="sl-tax-evasion-risk__label">
							<?php echo esc_html( $step['label'] ); ?>
						</span>

					</div>

					<h3 class="sl-panel-title">
						<?php echo esc_html( $step['title'] ); ?>
					</h3>

					<p>
						<?php echo esc_html( $step['description'] ); ?>
					</p>

				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>