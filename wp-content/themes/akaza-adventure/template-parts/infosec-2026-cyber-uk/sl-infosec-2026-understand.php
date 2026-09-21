<?php
/**
 * Cybersecurity Awareness Month 2026
 * What Can the Simulation Help You Understand?
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$infosec_understand_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/What-Can-the-Simulation.webp';
$infosec_understand_local = WP_CONTENT_DIR . '/uploads/2026/09/What-Can-the-Simulation.webp';

if ( function_exists( 'akaza_upload_url' ) && file_exists( $infosec_understand_local ) ) {
	$infosec_understand_image = akaza_upload_url( '2026/09/What-Can-the-Simulation.webp' );
}
?>

<section
	id="understand"
	class="sl-infosec-2026-understand"
	aria-labelledby="sl-infosec-2026-understand-title">
	<div class="container">

		<div class="sl-infosec-2026-understand__grid">

			<!-- LEFT: IMAGE -->
			<div class="sl-infosec-2026-understand__media">

				<div class="sl-infosec-2026-understand__image">
					<img
						src="<?php echo esc_url( $infosec_understand_image ); ?>"
						alt="<?php esc_attr_e( 'What the phishing simulation helps you understand', 'akaza-adventure' ); ?>"
						width="700"
						height="650"
						loading="lazy"
						decoding="async"
					/>
				</div>

			</div>


			<!-- RIGHT: CONTENT -->
			<div class="sl-infosec-2026-understand__content">

				<span class="sl-home-sub-heading">
					What You Can Measure
				</span>

				<h2 id="sl-infosec-2026-understand-title">
					What Can the Simulation
					<span>Help You Understand?</span>
				</h2>


				<ul class="sl-infosec-2026-understand__list">

					<li class="sl-infosec-2026-understand__item">

						<div class="sl-infosec-2026-understand__item-content">

							<h3 class="sl-panel-title">
								Employee Susceptibility
							</h3>

							<p>
								Understand how employees respond when confronted with a
								realistic simulated phishing attempt.
							</p>

						</div>

					</li>


					<li class="sl-infosec-2026-understand__item">

						<div class="sl-infosec-2026-understand__item-content">

							<h3 class="sl-panel-title">
								Phishing Resilience
							</h3>

							<p>
								Measure your workforce's ability to recognise and withstand
								simulated phishing threats.
							</p>

						</div>

					</li>


					<li class="sl-infosec-2026-understand__item">

						<div class="sl-infosec-2026-understand__item-content">

							<h3 class="sl-panel-title">
								Behavioural Risk
							</h3>

							<p>
								Identify employee actions that could create exposure during
								a real-world attack.
							</p>

						</div>

					</li>


					<li class="sl-infosec-2026-understand__item">

						<div class="sl-infosec-2026-understand__item-content">

							<h3 class="sl-panel-title">
								Awareness Gaps
							</h3>

							<p>
								Discover areas where employees may require further education
								or reinforcement.
							</p>

						</div>

					</li>


					<li class="sl-infosec-2026-understand__item">

						<div class="sl-infosec-2026-understand__item-content">

							<h3 class="sl-panel-title">
								Campaign Metrics
							</h3>

							<p>
								Use measurable campaign insights to guide future cybersecurity
								awareness initiatives.
							</p>

						</div>

					</li>

				</ul>

			</div>

		</div>

	</div>
</section>
