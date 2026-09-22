<?php
/**
 * S-Metrics — Powerful Reporting Features.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$features = array(
	array(
		'title' => __( 'Unified Dashboard', 'akaza-adventure' ),
		'text'  => __( 'Access all security awareness reporting through one centralised dashboard instead of managing multiple reporting systems.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Advanced Filtering', 'akaza-adventure' ),
		'text'  => __( 'Quickly filter reports by business unit, department, location, user group, campaign, awareness product, course, or reporting period to identify trends and investigate specific areas of organisational risk.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'User-Level Reporting', 'akaza-adventure' ),
		'text'  => __( 'View detailed learner activity, including assigned learning, completions, phishing interactions, assessment performance, reminders, certificates, and behavioural improvements over time.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Campaign Performance Analytics', 'akaza-adventure' ),
		'text'  => __( 'Evaluate the effectiveness of phishing simulations, microlearning campaigns, gamified learning, and awareness initiatives through comprehensive campaign reporting.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Exportable Reports', 'akaza-adventure' ),
		'text'  => __( 'Generate downloadable reports that can be shared with senior management, auditors, compliance teams, or regulators, supporting governance, audit readiness, and executive reporting requirements.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Automated Reminders & Follow-ups', 'akaza-adventure' ),
		'text'  => __( 'Track reminders, overdue assignments, and pending completions to improve programme participation and ensure awareness campaigns continue progressing without manual administration.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-metrics-features"
	aria-labelledby="sl-s-metrics-features-title"
>
	<div class="container">

		<div class="sl-s-metrics-features__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Reporting Capabilities', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-metrics-features-title">
				<?php esc_html_e( 'Powerful Reporting', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Features', 'akaza-adventure' ); ?></span>
			</h2>

		</div>

		<div class="sl-s-metrics-features__grid">

			<?php foreach ( $features as $feature ) : ?>

				<article class="sl-s-metrics-features__card">
					<h3 class="sl-panel-title">
						<?php echo esc_html( $feature['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $feature['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
