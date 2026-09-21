<?php
/**
 * Infosec 2026 Cyber AMP - Terms and Conditions.
 * Independent accordion toggles; first open by default; multiple may stay open.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-section sl-infosec-2026-terms"
	id="terms-and-conditions"
	aria-labelledby="sl-infosec-2026-terms-title"
>
	<div class="sl-wrap">

		<header class="sl-infosec-2026-terms__intro">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Campaign Information', 'succeedlearn-amp' ); ?>
			</span>

			<h2
				id="sl-infosec-2026-terms-title"
				class="sl-h2"
			>
				<?php esc_html_e( 'Terms & Conditions', 'succeedlearn-amp' ); ?>
			</h2>

			<p>
				<?php
				esc_html_e(
					'The Cybersecurity Awareness Month 2026 Cyber Readiness Challenge (“Campaign”) is a promotional offering provided by SucceedLEARN and is subject to the following terms and conditions.',
					'succeedlearn-amp'
				);
				?>
			</p>
		</header>

		<div class="sl-infosec-2026-terms__content">
			<amp-accordion
				class="sl-infosec-2026-terms__accordion"
				animate
				disable-session-states
			>

				<section
					class="sl-infosec-2026-terms__item"
					expanded
				>
					<h3
						id="sl-infosec-2026-terms-pricing"
						class="sl-panel-title sl-infosec-2026-terms__summary"
					>
						<?php esc_html_e( '1. Promotional Pricing', 'succeedlearn-amp' ); ?>
					</h3>

					<div class="sl-infosec-2026-terms__panel">
						<p>
							<?php
							esc_html_e(
								'The promotional Campaign price is GBP £2/user/month, subject to Campaign eligibility, applicable scope and any minimum subscription or participation requirements communicated by SucceedLEARN.',
								'succeedlearn-amp'
							);
							?>
						</p>

						<p>
							<?php
							esc_html_e(
								'Applicable taxes, duties or statutory charges, if any, will be additional.',
								'succeedlearn-amp'
							);
							?>
						</p>
					</div>
				</section>

				<section class="sl-infosec-2026-terms__item">
					<h3
						id="sl-infosec-2026-terms-availability"
						class="sl-panel-title sl-infosec-2026-terms__summary"
					>
						<?php esc_html_e( '2. Limited-Time Promotional Availability', 'succeedlearn-amp' ); ?>
					</h3>

					<div class="sl-infosec-2026-terms__panel">
						<p>
							<?php
							esc_html_e(
								'SucceedLEARN reserves the right, at its discretion, to modify, suspend, withdraw or discontinue the Campaign, promotional pricing, complimentary benefits or any part of the offer at any time.',
								'succeedlearn-amp'
							);
							?>
						</p>

						<p>
							<?php
							esc_html_e(
								'Any Campaign already confirmed in writing by SucceedLEARN prior to such modification or withdrawal will remain subject to the terms confirmed for that participating organisation.',
								'succeedlearn-amp'
							);
							?>
						</p>
					</div>
				</section>

				<section class="sl-infosec-2026-terms__item">
					<h3
						id="sl-infosec-2026-terms-scope"
						class="sl-panel-title sl-infosec-2026-terms__summary"
					>
						<?php esc_html_e( '3. Campaign Scope', 'succeedlearn-amp' ); ?>
					</h3>

					<div class="sl-infosec-2026-terms__panel">
						<p>
							<?php
							esc_html_e(
								'The Campaign includes managed services for phishing simulation for the participating users agreed at confirmation.',
								'succeedlearn-amp'
							);
							?>
						</p>

						<p>
							<?php
							esc_html_e(
								'Campaign configuration, phishing scenarios, timelines, technical requirements, user onboarding, reporting and other implementation requirements will be subject to the agreed Campaign scope and applicable platform capabilities.',
								'succeedlearn-amp'
							);
							?>
						</p>
					</div>
				</section>

				<section class="sl-infosec-2026-terms__item">
					<h3
						id="sl-infosec-2026-terms-criteria"
						class="sl-panel-title sl-infosec-2026-terms__summary"
					>
						<?php esc_html_e( '4. Cyber Readiness Challenge Criteria', 'succeedlearn-amp' ); ?>
					</h3>

					<div class="sl-infosec-2026-terms__panel">
						<p>
							<?php
							esc_html_e(
								'An organisation will be considered to have successfully achieved the Cyber Readiness Challenge where it meets at least one of the following criteria during the eligible phishing simulation:',
								'succeedlearn-amp'
							);
							?>
						</p>

						<div class="sl-infosec-2026-terms__criteria">
							<div class="sl-infosec-2026-terms__criterion">
								<span
									class="sl-infosec-2026-terms__number"
									aria-hidden="true"
								>
									01
								</span>

								<p>
									<?php
									esc_html_e(
										'Zero participating employees are successfully phished, as determined according to the applicable Campaign measurement criteria.',
										'succeedlearn-amp'
									);
									?>
								</p>
							</div>

							<div
								class="sl-infosec-2026-terms__or"
								aria-label="<?php esc_attr_e( 'or', 'succeedlearn-amp' ); ?>"
							>
								<span aria-hidden="true">
									<?php esc_html_e( 'OR', 'succeedlearn-amp' ); ?>
								</span>
							</div>

							<div class="sl-infosec-2026-terms__criterion">
								<span
									class="sl-infosec-2026-terms__number"
									aria-hidden="true"
								>
									02
								</span>

								<p>
									<?php
									esc_html_e(
										"The organisation achieves an overall Resiliency Score of 80 or above, calculated according to SucceedLEARN's applicable Campaign metrics.",
										'succeedlearn-amp'
									);
									?>
								</p>
							</div>
						</div>
					</div>
				</section>

				<section class="sl-infosec-2026-terms__item">
					<h3
						id="sl-infosec-2026-terms-achieved-benefits"
						class="sl-panel-title sl-infosec-2026-terms__summary"
					>
						<?php esc_html_e( '5. Challenge Achieved Benefits', 'succeedlearn-amp' ); ?>
					</h3>

					<div class="sl-infosec-2026-terms__panel">
						<p>
							<?php
							esc_html_e(
								'An organisation that successfully achieves either of the criteria set out above will be eligible to receive:',
								'succeedlearn-amp'
							);
							?>
						</p>

						<div class="sl-infosec-2026-terms__benefits">
							<div class="sl-infosec-2026-terms__benefit">
								<span
									class="sl-infosec-2026-terms__benefit-label"
									aria-hidden="true"
								>
									a)
								</span>

								<p>
									<?php
									esc_html_e(
										'One (1) additional phishing simulation at no additional charge, to be utilised within six (6) months of the qualifying Campaign and no later than the applicable validity date communicated by SucceedLEARN;',
										'succeedlearn-amp'
									);
									?>
								</p>
							</div>

							<div class="sl-infosec-2026-terms__benefit">
								<span
									class="sl-infosec-2026-terms__benefit-label"
									aria-hidden="true"
								>
									B)
								</span>

								<p>
									<?php
									esc_html_e(
										'Six (6) months of complimentary access to the applicable standard Information Security Awareness Training; and',
										'succeedlearn-amp'
									);
									?>
								</p>
							</div>

							<div class="sl-infosec-2026-terms__benefit">
								<span
									class="sl-infosec-2026-terms__benefit-label"
									aria-hidden="true"
								>
									C)
								</span>

								<p>
									<?php
									esc_html_e(
										"Six (6) months of complimentary access to 3 cybersecurity microlearning modules (Option to choose from a pool of 42 microlearning modules)",
										'succeedlearn-amp'
									);
									?>
								</p>
							</div>
						</div>

						<p>
							<?php
							esc_html_e(
								'The complimentary phishing simulation and learning benefits are subject to applicable scope, platform capabilities, technical requirements and the conditions communicated by SucceedLEARN.',
								'succeedlearn-amp'
							);
							?>
						</p>
					</div>
				</section>

				<section class="sl-infosec-2026-terms__item">
					<h3
						id="sl-infosec-2026-terms-awareness-benefits"
						class="sl-panel-title sl-infosec-2026-terms__summary"
					>
						<?php esc_html_e( '6. Awareness Path Benefits', 'succeedlearn-amp' ); ?>
					</h3>

					<div class="sl-infosec-2026-terms__panel">
						<p>
							<?php
							esc_html_e(
								'Organisations that do not meet either of the Cyber Readiness Challenge criteria will remain eligible to receive:',
								'succeedlearn-amp'
							);
							?>
						</p>

						<div class="sl-infosec-2026-terms__benefits">
							<div class="sl-infosec-2026-terms__benefit">
								<span
									class="sl-infosec-2026-terms__benefit-label"
									aria-hidden="true"
								>
									01
								</span>

								<p>
									<?php
									esc_html_e(
										'Three (3) months of complimentary access to the applicable standard Information Security Awareness Training; and',
										'succeedlearn-amp'
									);
									?>
								</p>
							</div>

							<div class="sl-infosec-2026-terms__benefit">
								<span
									class="sl-infosec-2026-terms__benefit-label"
									aria-hidden="true"
								>
									02
								</span>

								<p>
									<?php
									esc_html_e(
										"Three (3) months of complimentary access to the 3 microlearning modules (Option to choose from a pool of 42 microlearning modules).",
										'succeedlearn-amp'
									);
									?>
								</p>
							</div>
						</div>

						<p>
							<?php
							esc_html_e(
								'These benefits are intended to help participating organisations reinforce employee cybersecurity awareness based on insights identified through the phishing simulation.',
								'succeedlearn-amp'
							);
							?>
						</p>
					</div>
				</section>

				<section class="sl-infosec-2026-terms__item">
					<h3
						id="sl-infosec-2026-terms-measurement"
						class="sl-panel-title sl-infosec-2026-terms__summary"
					>
						<?php esc_html_e( '7. Definition and Measurement', 'succeedlearn-amp' ); ?>
					</h3>

					<div class="sl-infosec-2026-terms__panel">
						<p>
							<?php
							esc_html_e(
								"Employee phishing outcomes, Resiliency Scores and other Campaign metrics will be determined using SucceedLEARN's phishing simulation tool's metrics and reporting criteria.",
								'succeedlearn-amp'
							);
							?>
						</p>

						<p>
							<?php
							esc_html_e(
								'The Campaign report generated through the applicable SucceedLEARN platform will be used to determine whether the Cyber Readiness Challenge criteria have been achieved.',
								'succeedlearn-amp'
							);
							?>
						</p>
					</div>
				</section>

				<section class="sl-infosec-2026-terms__item">
					<h3
						id="sl-infosec-2026-terms-complimentary"
						class="sl-panel-title sl-infosec-2026-terms__summary"
					>
						<?php esc_html_e( '8. Complimentary Benefits', 'succeedlearn-amp' ); ?>
					</h3>

					<div class="sl-infosec-2026-terms__panel">
						<p>
							<?php
							esc_html_e(
								'All complimentary benefits offered under the Campaign:',
								'succeedlearn-amp'
							);
							?>
						</p>

						<ul class="sl-infosec-2026-terms__list">
							<li class="sl-infosec-2026-terms__list-item">
								<span
									class="sl-infosec-2026-terms__list-marker"
									aria-hidden="true"
								>
									01
								</span>

								<p>
									<?php esc_html_e( 'are non-transferable;', 'succeedlearn-amp' ); ?>
								</p>
							</li>

							<li class="sl-infosec-2026-terms__list-item">
								<span
									class="sl-infosec-2026-terms__list-marker"
									aria-hidden="true"
								>
									02
								</span>

								<p>
									<?php esc_html_e( 'have no cash value;', 'succeedlearn-amp' ); ?>
								</p>
							</li>

							<li class="sl-infosec-2026-terms__list-item">
								<span
									class="sl-infosec-2026-terms__list-marker"
									aria-hidden="true"
								>
									03
								</span>

								<p>
									<?php
									esc_html_e(
										'cannot be exchanged for cash, refunds, credits or alternative services;',
										'succeedlearn-amp'
									);
									?>
								</p>
							</li>

							<li class="sl-infosec-2026-terms__list-item">
								<span
									class="sl-infosec-2026-terms__list-marker"
									aria-hidden="true"
								>
									04
								</span>

								<p>
									<?php
									esc_html_e(
										'must be activated and utilised within the applicable validity period; and',
										'succeedlearn-amp'
									);
									?>
								</p>
							</li>

							<li class="sl-infosec-2026-terms__list-item">
								<span
									class="sl-infosec-2026-terms__list-marker"
									aria-hidden="true"
								>
									05
								</span>

								<p>
									<?php
									esc_html_e(
										'they are subject to the standard content, delivery methods and platform capabilities communicated by SucceedLEARN.',
										'succeedlearn-amp'
									);
									?>
								</p>
							</li>
						</ul>
					</div>
				</section>

				<section class="sl-infosec-2026-terms__item">
					<h3
						id="sl-infosec-2026-terms-authorization"
						class="sl-panel-title sl-infosec-2026-terms__summary"
					>
						<?php esc_html_e( '9. Organisational Authorisation', 'succeedlearn-amp' ); ?>
					</h3>

					<div class="sl-infosec-2026-terms__panel">
						<p>
							<?php
							esc_html_e(
								'By participating in the Campaign, the organisation confirms that it has obtained or will obtain all necessary internal approvals, permissions and authorisations required to conduct the phishing simulation for participating employees and provide the information necessary to administer the Campaign.',
								'succeedlearn-amp'
							);
							?>
						</p>
					</div>
				</section>

				<section class="sl-infosec-2026-terms__item">
					<h3
						id="sl-infosec-2026-terms-general"
						class="sl-panel-title sl-infosec-2026-terms__summary"
					>
						<?php esc_html_e( '10. General', 'succeedlearn-amp' ); ?>
					</h3>

					<div class="sl-infosec-2026-terms__panel">
						<p>
							<?php
							esc_html_e(
								'Participation in the Campaign does not guarantee the prevention of phishing attacks, cybersecurity incidents, data breaches or other security events.',
								'succeedlearn-amp'
							);
							?>
						</p>

						<p>
							<?php
							esc_html_e(
								'Phishing simulations, Information Security Awareness Training and microlearning form part of a broader organisational cybersecurity programme and are not substitutes for appropriate technical, administrative or security controls.',
								'succeedlearn-amp'
							);
							?>
						</p>
					</div>
				</section>

			</amp-accordion>
		</div>
	</div>
</section>
