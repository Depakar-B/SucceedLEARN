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
		'title'   => __( 'S-Aware Reporting', 'akaza-adventure' ),
		'lead'    => __( 'Track foundational learning activity across security awareness courses.', 'akaza-adventure' ),
		'intro'   => __( 'Administrators can monitor areas such as:', 'akaza-adventure' ),
		'items'   => array(
			__( 'Employee enrolments', 'akaza-adventure' ),
			__( 'Course completion', 'akaza-adventure' ),
			__( 'Learning progress', 'akaza-adventure' ),
			__( 'Assessment performance', 'akaza-adventure' ),
			__( 'Certificates', 'akaza-adventure' ),
			__( 'Reminders', 'akaza-adventure' ),
			__( 'Learners requiring follow-up', 'akaza-adventure' ),
		),
		'closing' => __( 'This helps organisations maintain visibility into formal security-awareness learning across the workforce.', 'akaza-adventure' ),
	),
	array(
		'title'   => __( 'S-Phish Reporting', 'akaza-adventure' ),
		'lead'    => __( 'Gain visibility into employee behaviour during phishing simulation campaigns.', 'akaza-adventure' ),
		'intro'   => __( 'Depending on campaign configuration, reporting can include:', 'akaza-adventure' ),
		'items'   => array(
			__( 'Email delivery', 'akaza-adventure' ),
			__( 'Email opens', 'akaza-adventure' ),
			__( 'Reporting behaviour', 'akaza-adventure' ),
			__( 'Resiliency scores', 'akaza-adventure' ),
			__( 'Remedial training completion', 'akaza-adventure' ),
			__( 'User and group-level performance', 'akaza-adventure' ),
		),
		'closing' => __( 'These insights help organisations identify patterns in phishing behaviour and determine where additional reinforcement may be needed.', 'akaza-adventure' ),
	),
	array(
		'title'   => __( 'S-Bytes Reporting', 'akaza-adventure' ),
		'lead'    => __( 'Monitor participation in continuous security-awareness microlearning.', 'akaza-adventure' ),
		'intro'   => __( 'Reporting can help administrators understand:', 'akaza-adventure' ),
		'items'   => array(
			__( 'Campaign participation', 'akaza-adventure' ),
			__( 'Completion', 'akaza-adventure' ),
			__( 'Employee engagement', 'akaza-adventure' ),
			__( 'Ongoing reinforcement progress', 'akaza-adventure' ),
		),
		'closing' => __( 'This helps organisations understand whether continuous awareness activity is reaching the intended workforce.', 'akaza-adventure' ),
	),
	array(
		'title'   => __( 'S-Play Reporting', 'akaza-adventure' ),
		'lead'    => __( 'Track engagement with gamified security-awareness campaigns.', 'akaza-adventure' ),
		'intro'   => __( 'Administrators can monitor:', 'akaza-adventure' ),
		'items'   => array(
			__( 'Assigned games', 'akaza-adventure' ),
			__( 'Participation', 'akaza-adventure' ),
			__( 'Completion', 'akaza-adventure' ),
			__( 'Campaign activity', 'akaza-adventure' ),
			__( 'Employee interaction', 'akaza-adventure' ),
		),
		'closing' => __( 'This helps organisations understand how gamified learning contributes to wider awareness engagement.', 'akaza-adventure' ),
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

			<h3 class="sl-s-metrics-suite-reporting__subtitle">
				<?php esc_html_e( 'One Reporting Layer Across Multiple Awareness Activities', 'akaza-adventure' ); ?>
			</h3>

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
						<?php echo esc_html( $report['lead'] ); ?>
					</p>
					<p>
						<?php echo esc_html( $report['intro'] ); ?>
					</p>
					<ul class="sl-s-metrics-suite-reporting__list">
						<?php foreach ( $report['items'] as $item ) : ?>
							<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
					<p>
						<?php echo esc_html( $report['closing'] ); ?>
					</p>
				</article>

			<?php endforeach; ?>

		</div>

		<div class="sl-s-metrics-suite-reporting__media">
			<div class="sl-s-metrics-suite-reporting__image-placeholder">
				<span><?php esc_html_e( 'Image Placeholder — Dashboard of all the S-Series Reporting', 'akaza-adventure' ); ?></span>
			</div>
		</div>

	</div>
</section>
