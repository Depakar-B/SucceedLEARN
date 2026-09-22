<?php
/**
 * S-Metrics — Why Organisations Choose S-Metrics.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$reasons = array(
	array(
		'title' => __( 'One Platform for Complete Visibility', 'akaza-adventure' ),
		'text'  => __( 'Consolidate reporting across learning, phishing simulations, gamification, microlearning, and awareness reinforcement.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Better Decision-Making', 'akaza-adventure' ),
		'text'  => __( 'Transform awareness data into meaningful insights that support security, compliance, and risk management initiatives.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Simplified Audit Readiness', 'akaza-adventure' ),
		'text'  => __( 'Maintain accurate training records, completion reports, assessment data, certificates, and campaign history to demonstrate due diligence during audits and regulatory reviews.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Advanced Reporting & Filtering', 'akaza-adventure' ),
		'text'  => __( 'Quickly generate meaningful reports using flexible filters that provide visibility across users, departments, campaigns, locations, and business units.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Executive-Level Reporting', 'akaza-adventure' ),
		'text'  => __( 'Provide leadership teams with clear, exportable reports that demonstrate programme performance, employee participation, organisational risk, and security awareness maturity.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Continuous Programme Improvement', 'akaza-adventure' ),
		'text'  => __( 'Measure awareness outcomes over time, identify improvement opportunities, and refine future awareness campaigns using real organisational data.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-metrics-choose"
	aria-labelledby="sl-s-metrics-choose-title"
>
	<div class="container">

		<div class="sl-s-metrics-choose__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Why Choose S-Metrics', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-metrics-choose-title">
				<?php esc_html_e( 'Why Organisations Choose', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'S-Metrics', 'akaza-adventure' ); ?></span>
			</h2>

		</div>

		<div class="sl-s-metrics-choose__grid">

			<?php foreach ( $reasons as $reason ) : ?>

				<article class="sl-s-metrics-choose__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $reason['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $reason['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
