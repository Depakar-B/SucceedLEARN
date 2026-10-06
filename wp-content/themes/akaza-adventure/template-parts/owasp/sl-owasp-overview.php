<?php
/**
 * OWASP — Course overview.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="sl-owasp-overview" id="overview" aria-labelledby="sl-owasp-overview-title">
	<div class="container">
		<div class="sl-owasp-overview__grid">

			<div class="sl-owasp-overview__heading">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Course overview', 'akaza-adventure' ); ?>
				</span>
				<h2 id="sl-owasp-overview-title">
					<?php
					echo wp_kses(
						__( 'Application Security Starts <span>Before the Security Test</span>', 'akaza-adventure' ),
						array( 'span' => array() )
					);
					?>
				</h2>
			</div>

			<div class="sl-owasp-overview__copy">
				<p>
					<?php
					esc_html_e(
						'Modern applications depend on APIs, cloud services, open-source libraries, third-party components and automated development pipelines. That speed and connectivity create enormous opportunities — but they also introduce security risks at every stage of software development.',
						'akaza-adventure'
					);
					?>
				</p>
				<p>
					<?php
					esc_html_e(
						'A vulnerability may originate from a missing permission check, unsafe configuration, vulnerable third-party software, weak cryptographic implementation, improperly handled user input, insecure application design, weak authentication, unverified software or data, insufficient logging and alerting, or an application that responds unsafely when something goes wrong.',
						'akaza-adventure'
					);
					?>
				</p>
				<p>
					<?php
					echo wp_kses(
						__( 'The <strong>OWASP Top 10:2025</strong> provides a widely recognised framework for understanding these application-security risks. SucceedLEARN turns those concepts into practical eLearning that helps technical teams understand not only <strong>what can go wrong</strong>, but also <strong>why it happens and how development decisions can reduce the risk.</strong>', 'akaza-adventure' ),
						array( 'strong' => array() )
					);
					?>
				</p>
			</div>

		</div>
	</div>
</section>
