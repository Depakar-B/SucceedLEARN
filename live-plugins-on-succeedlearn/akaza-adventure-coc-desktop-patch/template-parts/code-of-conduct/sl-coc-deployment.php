<?php
/**
 * Code of Conduct — Deployment.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="sl-coc-deployment" aria-labelledby="sl-coc-deployment-title">
	<div class="container">

		<div class="sl-coc-deployment__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Deployment', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-coc-deployment-title">
				<?php
				echo wp_kses(
					__( 'Deploy Through Your LMS - or Let <span>SucceedLEARN Manage It</span>', 'akaza-adventure' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Codes of Conduct are evolving as technology changes the workplace.', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-coc-deployment__grid">

			<!-- LMS Deployment -->
			<article class="sl-coc-deployment__card">

				<span class="sl-coc-deployment__eyebrow">
					<?php esc_html_e( 'Already have an LMS?', 'akaza-adventure' ); ?>
				</span>

				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Host the course on your LMS using supported SCORM packages.', 'akaza-adventure' ); ?>
				</h3>

				<ul class="sl-coc-deployment__features">

					<li>
						<span class="sl-coc-deployment__icon" aria-hidden="true">✓</span>
						<span><?php esc_html_e( 'SCORM 1.2 / SCORM 2004', 'akaza-adventure' ); ?></span>
					</li>

					<li>
						<span class="sl-coc-deployment__icon" aria-hidden="true">✓</span>
						<span><?php esc_html_e( 'SSO integration', 'akaza-adventure' ); ?></span>
					</li>

					<li>
						<span class="sl-coc-deployment__icon" aria-hidden="true">✓</span>
						<span><?php esc_html_e( 'HRIS / user provisioning', 'akaza-adventure' ); ?></span>
					</li>

					<li>
						<span class="sl-coc-deployment__icon" aria-hidden="true">✓</span>
						<span><?php esc_html_e( 'Automated reminders', 'akaza-adventure' ); ?></span>
					</li>

				</ul>

			</article>

			<!-- Hosted Deployment -->
			<article class="sl-coc-deployment__card">

				<span class="sl-coc-deployment__eyebrow">
					<?php esc_html_e( "Don't have an LMS?", 'akaza-adventure' ); ?>
				</span>

				<h3 class="sl-panel-title">
					<?php esc_html_e( 'Deliver the programme through SucceedLEARN’s hosted learning environment.', 'akaza-adventure' ); ?>
				</h3>

				<ul class="sl-coc-deployment__features">

					<li>
						<span class="sl-coc-deployment__icon" aria-hidden="true">✓</span>
						<span><?php esc_html_e( 'Hosted SaaS delivery', 'akaza-adventure' ); ?></span>
					</li>

					<li>
						<span class="sl-coc-deployment__icon" aria-hidden="true">✓</span>
						<span><?php esc_html_e( 'Multilingual delivery', 'akaza-adventure' ); ?></span>
					</li>

					<li>
						<span class="sl-coc-deployment__icon" aria-hidden="true">✓</span>
						<span><?php esc_html_e( 'Learner management', 'akaza-adventure' ); ?></span>
					</li>

					<li>
						<span class="sl-coc-deployment__icon" aria-hidden="true">✓</span>
						<span><?php esc_html_e( 'Completion tracking & reporting', 'akaza-adventure' ); ?></span>
					</li>

				</ul>

			</article>

		</div>

	</div>
</section>