<?php
/**
 * SucceedLEARN — GDPR Employee Awareness Training
 * Hero Section
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-gdpr-hero"
	id="gdpr-employee-awareness-training"
	aria-labelledby="sl-gdpr-hero-title"
>

	<div class="container">

		<div class="sl-gdpr-hero__grid">

			<!-- =========================
			     Left Content
			========================= -->
			<div class="sl-gdpr-hero__content">

				<div class="sl-gdpr-hero__heading">

					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'EU GDPR · All-Employee Training', 'akaza-adventure' ); ?>
					</span>

					<h1 id="sl-gdpr-hero-title">
						<?php esc_html_e( 'GDPR Employee', 'akaza-adventure' ); ?>
						<span>
							<?php esc_html_e( 'Awareness Training', 'akaza-adventure' ); ?>
						</span>
					</h1>

				</div>


				<h2 class="sl-gdpr-hero__lead">
					<?php
					esc_html_e(
						'The breach will start with one ordinary email. Train the people who send them.',
						'akaza-adventure'
					);
					?>
				</h2>


				<p class="sl-gdpr-hero__description">
					<?php
					esc_html_e(
						'Not a hacker. An employee, on a normal day, attaching the wrong file or emailing a list that never opted in. Policy will not stop it and a firewall cannot see it. This thirty-minute course reaches the one place the risk actually lives, and gives you the record to prove you trained them.',
						'akaza-adventure'
					);
					?>
				</p>


				<!-- CTA Buttons -->
				<div class="sl-gdpr-hero__actions sl-hero-actions">

					<a
						class="sl-hero-btn sl-hero-btn-primary"
						href="#contact"
					>
						<span>
							<?php esc_html_e( 'Request Course Preview', 'akaza-adventure' ); ?>
						</span>

						<svg
							width="18"
							height="18"
							viewBox="0 0 24 24"
							fill="none"
							xmlns="http://www.w3.org/2000/svg"
							aria-hidden="true"
						>
							<path
								d="M5 12H19"
								stroke="currentColor"
								stroke-width="1.8"
								stroke-linecap="round"
							/>

							<path
								d="M13 6L19 12L13 18"
								stroke="currentColor"
								stroke-width="1.8"
								stroke-linecap="round"
								stroke-linejoin="round"
							/>
						</svg>

					</a>


					<a
						class="sl-hero-btn sl-hero-btn-secondary"
						href="#course-modules"
					>
						<?php esc_html_e( "See What's Covered", 'akaza-adventure' ); ?>
					</a>

				</div>


				<!-- Course Information Box -->
				<div class="sl-gdpr-hero__info-box">

					<div class="sl-gdpr-hero__info-icon" aria-hidden="true">

						<svg
							width="20"
							height="20"
							viewBox="0 0 24 24"
							fill="none"
							xmlns="http://www.w3.org/2000/svg"
						>
							<path
								d="M12 3L19 6V11.5C19 16.2 16.1 20.4 12 21C7.9 20.4 5 16.2 5 11.5V6L12 3Z"
								stroke="currentColor"
								stroke-width="1.7"
								stroke-linejoin="round"
							/>

							<path
								d="M9 12L11 14L15 10"
								stroke="currentColor"
								stroke-width="1.7"
								stroke-linecap="round"
								stroke-linejoin="round"
							/>

						</svg>

					</div>


					<div class="sl-gdpr-hero__info-content">

						<strong>
							<?php esc_html_e( 'Built into the learning experience', 'akaza-adventure' ); ?>
						</strong>

						<p>
							<?php
							esc_html_e(
								'Assessments and questions are built into the course, not just added as a quiz at the end. SCORM and LTI ready.',
								'akaza-adventure'
							);
							?>
						</p>

					</div>

				</div>

			</div>


			<!-- =========================
			     Right Course Preview
			========================= -->
			<div class="sl-gdpr-hero__visual">

				<div class="sl-gdpr-course-preview">

					<!-- Preview Header -->
					<div class="sl-gdpr-course-preview__header">

						<div class="sl-gdpr-course-preview__course">

							<span class="sl-gdpr-course-preview__course-label">
								<?php esc_html_e( 'GDPR AWARENESS', 'akaza-adventure' ); ?>
							</span>

							<strong>
								<?php esc_html_e( 'Employee Training', 'akaza-adventure' ); ?>
							</strong>

						</div>


						<div class="sl-gdpr-course-preview__progress">

							<span>
								06 / 08
							</span>

							<div
								class="sl-gdpr-course-preview__progress-track"
								aria-hidden="true"
							>
								<span></span>
							</div>

						</div>

					</div>


					<!-- Question -->
					<div class="sl-gdpr-course-preview__body">

						<span class="sl-gdpr-course-preview__eyebrow">
							<?php esc_html_e( 'IN-COURSE QUESTION', 'akaza-adventure' ); ?>
						</span>


						<h2>
							<?php
							esc_html_e(
								'Your rep wants to email a purchased contact list in Germany.',
								'akaza-adventure'
							);
							?>
						</h2>


						<div class="sl-gdpr-course-preview__scenario">

							<span>
								<?php esc_html_e( 'SALES OPS ASKS', 'akaza-adventure' ); ?>
							</span>

							<p>
								<?php
								esc_html_e(
									'The list came from a data vendor. Can we send the first email today?',
									'akaza-adventure'
								);
								?>
							</p>

						</div>


						<div class="sl-gdpr-course-preview__answers">

							<div class="sl-gdpr-course-preview__answer">

								<span class="sl-gdpr-course-preview__radio"></span>

								<span>
									<?php
									esc_html_e(
										"Yes, they're business contacts.",
										'akaza-adventure'
									);
									?>
								</span>

							</div>


							<div class="sl-gdpr-course-preview__answer sl-gdpr-course-preview__answer--correct">

								<span class="sl-gdpr-course-preview__radio">
									<span></span>
								</span>

								<span>
									<?php
									esc_html_e(
										'No, Germany needs documented consent first.',
										'akaza-adventure'
									);
									?>
								</span>

							</div>


							<div class="sl-gdpr-course-preview__answer">

								<span class="sl-gdpr-course-preview__radio"></span>

								<span>
									<?php
									esc_html_e(
										'Only if we add an unsubscribe link.',
										'akaza-adventure'
									);
									?>
								</span>

							</div>

						</div>

					</div>


					<!-- Preview Footer -->
					<div class="sl-gdpr-course-preview__footer">

						<div class="sl-gdpr-course-preview__completion">

							<div class="sl-gdpr-course-preview__completion-track">
								<span></span>
							</div>

							<span>
								<?php esc_html_e( 'Course progress', 'akaza-adventure' ); ?>
							</span>

						</div>


						<span class="sl-gdpr-course-preview__status">
							<?php esc_html_e( 'In progress', 'akaza-adventure' ); ?>
						</span>

					</div>

				</div>

			</div>

		</div>

	</div>

</section>