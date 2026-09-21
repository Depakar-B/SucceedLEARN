<?php
/**
 * Information Security — Cyber Readiness Challenge
 *
 * Section file:
 * sl-infosec-2026-cyber-challenge.php
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	id="challenge"
	class="sl-infosec-challenge"
	aria-labelledby="sl-infosec-challenge-heading"
>
	<div class="container">

		<div class="sl-infosec-challenge__intro">

			<span class="sl-home-sub-heading sl-infosec-challenge__eyebrow">
				<?php esc_html_e( 'The Cyber Readiness Challenge', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-infosec-challenge-heading" class="sl-infosec-challenge__heading">
				<?php esc_html_e( 'Whatever Your Result, Your Employees Get Stronger.', 'akaza-adventure' ); ?>
			</h2>

			<p class="sl-infosec-challenge__intro-text">
				<?php
				esc_html_e(
					'Run the Cyber Readiness Challenge across your workforce and measure your organization’s resilience against a controlled phishing simulation.',
					'akaza-adventure'
				);
				?>
			</p>

			<p class="sl-infosec-challenge__intro-highlight">
				<?php
				echo wp_kses(
					__( 'Your campaign results determine <strong>what happens next.</strong>', 'akaza-adventure' ),
					array( 'strong' => array() )
				);
				?>
			</p>

			<h3 class="sl-panel-title sl-infosec-challenge__intro-criteria-lead">
				<?php esc_html_e( 'Your organization achieves either of the following:', 'akaza-adventure' ); ?>
			</h3>

			<div class="sl-infosec-challenge__criteria">

				<div class="sl-infosec-challenge__criteria-item">
					<span class="sl-infosec-challenge__number" aria-hidden="true">01</span>
					<div>
						<strong><?php esc_html_e( 'ZERO (0) Employees', 'akaza-adventure' ); ?></strong>
						<span><?php esc_html_e( 'successfully phished', 'akaza-adventure' ); ?></span>
					</div>
				</div>

				<div class="sl-infosec-challenge__criteria-divider">
					<span><?php esc_html_e( 'OR', 'akaza-adventure' ); ?></span>
				</div>

				<div class="sl-infosec-challenge__criteria-item">
					<span class="sl-infosec-challenge__number" aria-hidden="true">02</span>
					<div>
						<strong><?php esc_html_e( '80+ Overall', 'akaza-adventure' ); ?></strong>
						<span><?php esc_html_e( 'Resiliency Score', 'akaza-adventure' ); ?></span>
					</div>
				</div>

			</div>

		</div>

		<div class="sl-infosec-challenge__paths">

			<article class="sl-infosec-challenge__card sl-infosec-challenge__card--achieved">

				<div class="sl-infosec-challenge__card-header">

					<div class="sl-infosec-challenge__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M12 3.2L19 6.2V11.4C19 16.1 15.8 20.1 12 21.2C8.2 20.1 5 16.1 5 11.4V6.2L12 3.2Z"
								stroke="currentColor"
								stroke-width="1.8"
								stroke-linejoin="round"
							/>
							<path
								d="M12 8.2V13.2"
								stroke="currentColor"
								stroke-width="1.8"
								stroke-linecap="round"
							/>
							<circle cx="12" cy="16.2" r="1.1" fill="currentColor" />
						</svg>
					</div>

					<div>
						<span class="sl-infosec-challenge__card-label">
							<?php esc_html_e( 'Challenge Achieved', 'akaza-adventure' ); ?>
						</span>
						<h3 class="sl-infosec-challenge__card-title">
							<?php esc_html_e( 'Your organization demonstrates strong resilience.', 'akaza-adventure' ); ?>
						</h3>
					</div>

				</div>

				<div class="sl-infosec-challenge__subheading">
					<span class="sl-infosec-challenge__mini-icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M7 10V7.5C7 4.74 9.24 2.5 12 2.5C14.76 2.5 17 4.74 17 7.5V10"
								stroke="currentColor"
								stroke-width="1.8"
								stroke-linecap="round"
							/>
							<rect x="4" y="10" width="16" height="11" rx="2" stroke="currentColor" stroke-width="1.8" />
							<circle cx="12" cy="15.5" r="1.3" fill="currentColor" />
						</svg>
					</span>
					<span><?php esc_html_e( 'You Unlock', 'akaza-adventure' ); ?></span>
				</div>

				<div class="sl-infosec-challenge__benefits">

					<div class="sl-infosec-challenge__benefit">
						<div class="sl-infosec-challenge__benefit-icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M4 12A8 8 0 1 0 7 5.2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
								<path d="M4 5V10H9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</div>
						<div>
							<h4><?php esc_html_e( 'Another Phishing Simulation', 'akaza-adventure' ); ?></h4>
							<span class="sl-infosec-challenge__complimentary">
								<?php esc_html_e( 'Complimentary', 'akaza-adventure' ); ?>
							</span>
							<p>
								<?php
								esc_html_e(
									'Run another round within the following six months to measure how employee behavior evolves.',
									'akaza-adventure'
								);
								?>
							</p>
						</div>
					</div>

					<div class="sl-infosec-challenge__benefit">
						<div class="sl-infosec-challenge__benefit-icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M4 5.5C4 4.67 4.67 4 5.5 4H18.5C19.33 4 20 4.67 20 5.5V18.5C20 19.33 19.33 20 18.5 20H5.5C4.67 20 4 19.33 4 18.5V5.5Z"
									stroke="currentColor"
									stroke-width="1.7"
								/>
								<path d="M8 8H16M8 12H16M8 16H13" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
							</svg>
						</div>
						<div>
							<h4>
								<?php esc_html_e( '6 Months of Standard Information Security Awareness Training', 'akaza-adventure' ); ?>
							</h4>
							<span class="sl-infosec-challenge__complimentary">
								<?php esc_html_e( 'Complimentary', 'akaza-adventure' ); ?>
							</span>
							<p>
								<?php
								esc_html_e(
									'Includes 3 Microlearning modules, with the option to choose from a pool of 42 microlearning modules.',
									'akaza-adventure'
								);
								?>
							</p>
						</div>
					</div>

				</div>

				<div class="sl-infosec-challenge__message">
					<p class="sl-infosec-challenge__message-lead">
						<?php esc_html_e( "You've demonstrated strong resilience. Now keep building on it.", 'akaza-adventure' ); ?>
					</p>
					<p>
						<?php
						esc_html_e(
							'Use the next six months to reinforce good behaviors, keep cybersecurity top of mind and test your workforce again to understand whether resilience continues.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

			</article>

			<article class="sl-infosec-challenge__card sl-infosec-challenge__card--awareness">

				<div class="sl-infosec-challenge__card-header">

					<div class="sl-infosec-challenge__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M12 3.5L14.3 8.2L19.5 8.95L15.75 12.6L16.65 17.75L12 15.3L7.35 17.75L8.25 12.6L4.5 8.95L9.7 8.2L12 3.5Z"
								stroke="currentColor"
								stroke-width="1.7"
								stroke-linejoin="round"
							/>
						</svg>
					</div>

					<div>
						<span class="sl-infosec-challenge__card-label">
							<?php esc_html_e( 'Awareness Path', 'akaza-adventure' ); ?>
						</span>
						<h3 class="sl-infosec-challenge__card-title">
							<?php esc_html_e( 'Didn’t meet the Challenge criteria?', 'akaza-adventure' ); ?>
						</h3>
					</div>

				</div>

				<div class="sl-infosec-challenge__awareness-intro">
					<p>
						<?php
						echo wp_kses(
							__( "That's not a failure. <strong>That's insight.</strong>", 'akaza-adventure' ),
							array( 'strong' => array() )
						);
						?>
					</p>
					<p>
						<?php
						esc_html_e(
							'Your simulation has done exactly what it was designed to do: identify where additional awareness and reinforcement can make a difference.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

				<div class="sl-infosec-challenge__subheading">
					<span class="sl-infosec-challenge__mini-icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M5 4H19V20H5V4Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round" />
							<path d="M8 8H16M8 12H16M8 16H13" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
						</svg>
					</span>
					<span><?php esc_html_e( 'You Receive 3 Months Of', 'akaza-adventure' ); ?></span>
				</div>

				<div class="sl-infosec-challenge__benefits">

					<div class="sl-infosec-challenge__benefit">
						<div class="sl-infosec-challenge__benefit-icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M6 4H18C19.1 4 20 4.9 20 6V18C20 19.1 19.1 20 18 20H6C4.9 20 4 19.1 4 18V6C4 4.9 4.9 4 6 4Z"
									stroke="currentColor"
									stroke-width="1.7"
								/>
								<path d="M8 8H16M8 12H16M8 16H12" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
							</svg>
						</div>
						<div>
							<h4><?php esc_html_e( 'Information Security Awareness Training', 'akaza-adventure' ); ?></h4>
							<span class="sl-infosec-challenge__complimentary">
								<?php esc_html_e( 'Complimentary', 'akaza-adventure' ); ?>
							</span>
						</div>
					</div>

					<div class="sl-infosec-challenge__benefit">
						<div class="sl-infosec-challenge__benefit-icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="12" cy="12" r="8.5" stroke="currentColor" stroke-width="1.7" />
								<path d="M12 7.5V12L15 14" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" />
							</svg>
						</div>
						<div>
							<h4><?php esc_html_e( '3 Microlearning Modules', 'akaza-adventure' ); ?></h4>
							<span class="sl-infosec-challenge__complimentary">
								<?php esc_html_e( 'Complimentary', 'akaza-adventure' ); ?>
							</span>
							<p>
								<?php esc_html_e( 'Choose from a pool of 42 microlearning modules.', 'akaza-adventure' ); ?>
							</p>
						</div>
					</div>

				</div>

				<div class="sl-infosec-challenge__message">
					<p>
						<?php
						esc_html_e(
							'Use the results from your phishing simulation to focus employee learning on the behaviors and risks that matter.',
							'akaza-adventure'
						);
						?>
					</p>
					<p class="sl-infosec-challenge__message-lead">
						<?php esc_html_e( 'Identify the gap. Build awareness. Come back stronger.', 'akaza-adventure' ); ?>
					</p>
				</div>

			</article>

		</div>

		<div class="sl-highlight">
			<p>
				<?php
				esc_html_e(
					"Eligibility criteria and Terms & Conditions apply. Resiliency Score is determined using SucceedLEARN's applicable campaign metrics.",
					'akaza-adventure'
				);
				?>
			</p>
		</div>

	</div>
</section>
