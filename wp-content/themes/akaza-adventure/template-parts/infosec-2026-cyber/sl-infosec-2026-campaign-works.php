<?php
/**
 * SucceedLEARN
 * Cybersecurity Awareness Month 2026
 * How the Campaign Works
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$infosec_campaign_works_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/How-the-Campaign-Works.webp';
$infosec_campaign_works_local = WP_CONTENT_DIR . '/uploads/2026/09/How-the-Campaign-Works.webp';

if ( function_exists( 'akaza_upload_url' ) && file_exists( $infosec_campaign_works_local ) ) {
	$infosec_campaign_works_image = akaza_upload_url( '2026/09/How-the-Campaign-Works.webp' );
}
?>

<section
	id="how-the-campaign-works"
	class="sl-infosec-2026-how-it-works"
	aria-labelledby="sl-infosec-2026-how-it-works-title"
>
	<div class="container">

		<div class="sl-infosec-2026-how-it-works__grid">

			<div class="sl-infosec-2026-how-it-works__intro">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'The Cyber Readiness Journey', 'akaza-adventure' ); ?>
				</span>
				<h2 id="sl-infosec-2026-how-it-works-title">
					<?php echo wp_kses( __( 'How the Campaign <span>Works</span>', 'akaza-adventure' ), array( 'span' => array() ) ); ?>
				</h2>

				<div class="sl-infosec-2026-how-it-works__media">
					<div class="sl-infosec-2026-how-it-works__image">
						<img
							src="<?php echo esc_url( $infosec_campaign_works_image ); ?>"
							alt="<?php esc_attr_e( 'How the Cyber Readiness Campaign works', 'akaza-adventure' ); ?>"
							width="720"
							height="720"
							loading="lazy"
							decoding="async"
						/>
					</div>
				</div>
			</div>

			<div
				class="sl-infosec-2026-how-it-works__cards"
				tabindex="0"
				aria-label="<?php esc_attr_e( 'How the campaign works steps', 'akaza-adventure' ); ?>"
			>
				<div class="sl-infosec-2026-how-it-works__steps">

					<article class="sl-infosec-2026-how-it-works__step">
						<div class="sl-infosec-2026-how-it-works__number" aria-hidden="true">01</div>
						<div class="sl-infosec-2026-how-it-works__content">
							<h3 class="sl-panel-title">
								<?php esc_html_e( 'Enroll Your Workforce', 'akaza-adventure' ); ?>
							</h3>
							<p>
								<?php esc_html_e( 'Choose the employees you want to include in your Cybersecurity Awareness Month campaign.', 'akaza-adventure' ); ?>
							</p>
							<p class="sl-infosec-2026-how-it-works__note">
								<strong>
									<?php esc_html_e( 'Campaign pricing starts at $2/user/month', 'akaza-adventure' ); ?>
								</strong>
							</p>
						</div>
					</article>

					<article class="sl-infosec-2026-how-it-works__step">
						<div class="sl-infosec-2026-how-it-works__number" aria-hidden="true">02</div>
						<div class="sl-infosec-2026-how-it-works__content">
							<h3 class="sl-panel-title">
								<?php esc_html_e( 'Launch the Simulation', 'akaza-adventure' ); ?>
							</h3>
							<p>
								<?php esc_html_e( 'A controlled phishing simulation is delivered to participating employees.', 'akaza-adventure' ); ?>
							</p>
							<p>
								<?php esc_html_e( 'The campaign recreates realistic phishing scenarios in a safe environment without exposing your organization to an actual malicious threat.', 'akaza-adventure' ); ?>
							</p>
						</div>
					</article>

					<article class="sl-infosec-2026-how-it-works__step">
						<div class="sl-infosec-2026-how-it-works__number" aria-hidden="true">03</div>
						<div class="sl-infosec-2026-how-it-works__content">
							<h3 class="sl-panel-title">
								<?php esc_html_e( 'Measure Your Cyber Resilience', 'akaza-adventure' ); ?>
							</h3>
							<p>
								<?php esc_html_e( "See how employees respond to the simulated attack and understand your organization's phishing resilience through campaign metrics and insights.", 'akaza-adventure' ); ?>
							</p>
						</div>
					</article>

					<article class="sl-infosec-2026-how-it-works__step">
						<div class="sl-infosec-2026-how-it-works__number" aria-hidden="true">04</div>
						<div class="sl-infosec-2026-how-it-works__content">
							<h3 class="sl-panel-title">
								<?php esc_html_e( 'Identify Awareness Gaps', 'akaza-adventure' ); ?>
							</h3>
							<p>
								<?php esc_html_e( 'Your results help identify:', 'akaza-adventure' ); ?>
							</p>
							<ul class="sl-list sl-list--2up sl-infosec-2026-how-it-works__list">
								<li class="sl-list-item">
									<span aria-hidden="true">✓</span>
									<?php esc_html_e( 'Employee susceptibility', 'akaza-adventure' ); ?>
								</li>
								<li class="sl-list-item">
									<span aria-hidden="true">✓</span>
									<?php esc_html_e( 'Phishing resilience', 'akaza-adventure' ); ?>
								</li>
								<li class="sl-list-item">
									<span aria-hidden="true">✓</span>
									<?php esc_html_e( 'Behavioral risk', 'akaza-adventure' ); ?>
								</li>
								<li class="sl-list-item">
									<span aria-hidden="true">✓</span>
									<?php esc_html_e( 'Awareness gaps', 'akaza-adventure' ); ?>
								</li>
								<li class="sl-list-item">
									<span aria-hidden="true">✓</span>
									<?php esc_html_e( 'Areas for reinforcement', 'akaza-adventure' ); ?>
								</li>
							</ul>
							<p class="sl-infosec-2026-how-it-works__closing">
								<?php esc_html_e( 'Instead of assuming where your vulnerabilities lie, you have measurable insight to work from.', 'akaza-adventure' ); ?>
							</p>
						</div>
					</article>

					<article class="sl-infosec-2026-how-it-works__step sl-infosec-2026-how-it-works__step--final">
						<div class="sl-infosec-2026-how-it-works__number" aria-hidden="true">05</div>
						<div class="sl-infosec-2026-how-it-works__content">
							<h3 class="sl-panel-title">
								<?php esc_html_e( 'Unlock Your Next Step', 'akaza-adventure' ); ?>
							</h3>

							<div class="sl-infosec-2026-how-it-works__outcomes">
								<div class="sl-infosec-2026-how-it-works__outcome">
									<h4><?php esc_html_e( 'Challenge Achieved?', 'akaza-adventure' ); ?></h4>
									<p>
										<?php
										esc_html_e(
											"Unlock 6 months of complimentary standard Information Security Awareness Training + 3 Microlearning modules (option to choose from a pool of 42 microlearning modules), plus another complimentary phishing simulation within six months.",
											'akaza-adventure'
										);
										?>
									</p>
								</div>
								<div class="sl-infosec-2026-how-it-works__outcome">
									<h4><?php esc_html_e( 'Awareness Path?', 'akaza-adventure' ); ?></h4>
									<p>
										<?php
										esc_html_e(
											'Receive 3 months of complimentary Information Security Awareness Training + 3 Microlearning modules (option to choose from a pool of 42 microlearning modules) to help address the awareness gaps identified.',
											'akaza-adventure'
										);
										?>
									</p>
								</div>
							</div>

							<p class="sl-infosec-2026-how-it-works__continue">
								<?php esc_html_e( 'Whatever the result, learning continues.', 'akaza-adventure' ); ?>
							</p>

							<div class="sl-content-actions">
								<a class="sl-content-btn sl-content-btn-primary" href="#contact">
									<?php esc_html_e( 'Take the Cyber Readiness Challenge', 'akaza-adventure' ); ?>
									<span aria-hidden="true">→</span>
								</a>
							</div>
						</div>
					</article>

				</div>
			</div>

		</div>

	</div>
</section>
