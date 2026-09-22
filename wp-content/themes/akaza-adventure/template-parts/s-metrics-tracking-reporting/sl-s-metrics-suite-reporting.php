<?php
/**
 * S-Metrics — Reporting Across the Security Behaviour & Culture Suite.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$suite_reports = array(
	array(
		'title' => __( 'S-Aware Reporting', 'akaza-adventure' ),
		'text'  => __( 'Track employee enrolments, course completions, assessment scores, learning progress, certificates, reminders, and compliance status. Monitor adoption rates across departments and identify learners requiring follow-up to support organisational compliance objectives.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'S-Phish Reporting', 'akaza-adventure' ),
		'text'  => __( 'Gain detailed visibility into phishing simulation campaigns, including email delivery, opens, clicks, credential submissions, reporting behaviour, resiliency scores, and remedial training completion. Monitor organisational phishing trends while identifying repeat offenders and high-risk user groups.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'S-Bytes Reporting', 'akaza-adventure' ),
		'text'  => __( 'Measure microlearning campaign performance through completion rates, employee engagement, participation trends, and learning activity across ongoing reinforcement campaigns.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'S-Play Reporting', 'akaza-adventure' ),
		'text'  => __( 'Monitor employee participation across gamified learning campaigns, including assigned games, completion status, engagement levels, and learner interaction to understand how gamification contributes to continuous awareness.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-s-metrics-suite-reporting"
	aria-labelledby="sl-s-metrics-suite-reporting-title"
>
	<div class="container">

		<div class="sl-s-metrics-suite-reporting__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Suite-Wide Reporting', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-s-metrics-suite-reporting-title">
				<?php esc_html_e( 'Reporting Across the Entire', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'Security Behaviour & Culture Suite', 'akaza-adventure' ); ?></span>
			</h2>

		</div>

		<div class="sl-s-metrics-suite-reporting__grid">

			<?php foreach ( $suite_reports as $index => $report ) : ?>

				<article class="sl-s-metrics-suite-reporting__card">
					<span class="sl-s-metrics-suite-reporting__number" aria-hidden="true">
						<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
					</span>
					<h3 class="sl-panel-title">
						<?php echo esc_html( $report['title'] ); ?>
					</h3>
					<p>
						<?php echo esc_html( $report['text'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

	</div>
</section>
