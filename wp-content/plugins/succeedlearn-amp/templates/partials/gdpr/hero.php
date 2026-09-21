<?php
/**
 * GDPR Employee Awareness Training - AMP hero.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-section sl-gdpr-hero"
	id="gdpr-employee-awareness-training"
	aria-labelledby="sl-gdpr-hero-title"
>
	<div class="sl-wrap">
		<div class="sl-gdpr-hero__grid">
			<div class="sl-gdpr-hero__content">
				<header class="sl-gdpr-hero__heading">
					<span class="sl-home-sub-heading">
						<?php
						esc_html_e(
							'EU GDPR · All-Employee Training',
							'succeedlearn-amp'
						);
						?>
					</span>

					<h1 id="sl-gdpr-hero-title">
						<?php esc_html_e( 'GDPR Employee', 'succeedlearn-amp' ); ?>
						<br>
						<span>
							<?php
							esc_html_e(
								'Awareness Training',
								'succeedlearn-amp'
							);
							?>
						</span>
					</h1>
				</header>

				<h2 class="sl-gdpr-hero__lead">
					<?php
					esc_html_e(
						'The breach will start with one ordinary email. Train the people who send them.',
						'succeedlearn-amp'
					);
					?>
				</h2>

				<p class="sl-gdpr-hero__description">
					<?php
					esc_html_e(
						'Not a hacker. An employee, on a normal day, attaching the wrong file or emailing a list that never opted in. Policy will not stop it and a firewall cannot see it. This thirty-minute course reaches the one place the risk actually lives, and gives you the record to prove you trained them.',
						'succeedlearn-amp'
					);
					?>
				</p>

				<div class="sl-hero-actions sl-gdpr-hero__actions">
					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-primary"
						data-cta="gdpr-hero-preview"
						<?php
						echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					>
						<span>
							<?php
							esc_html_e(
								'Request Course Preview',
								'succeedlearn-amp'
							);
							?>
						</span>

						<svg
							viewBox="0 0 24 24"
							aria-hidden="true"
							focusable="false"
						>
							<path d="M5 12h13M13 6l6 6-6 6"></path>
						</svg>
					</button>

					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-secondary"
						data-cta="gdpr-hero-modules"
						<?php
						echo succeedlearn_amp_scroll_tap_attr( 'course-modules' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					>
						<?php
						esc_html_e(
							"See What's Covered",
							'succeedlearn-amp'
						);
						?>
					</button>
				</div>

				<div class="sl-highlight sl-gdpr-hero__info-box">
					<span
						class="sl-gdpr-hero__info-icon"
						aria-hidden="true"
					>
						<svg
							viewBox="0 0 24 24"
							focusable="false"
						>
							<path d="M12 3 19 6v5.5c0 4.7-2.9 8.9-7 9.5-4.1-.6-7-4.8-7-9.5V6l7-3Z"></path>
							<path d="m9 12 2 2 4-4"></path>
						</svg>
					</span>

					<div class="sl-gdpr-hero__info-content">
						<strong>
							<?php
							esc_html_e(
								'Built into the learning experience',
								'succeedlearn-amp'
							);
							?>
						</strong>

						<p>
							<?php
							esc_html_e(
								'Assessments and questions are built into the course, not just added as a quiz at the end. SCORM and LTI ready.',
								'succeedlearn-amp'
							);
							?>
						</p>
					</div>
				</div>
			</div>

			<div class="sl-gdpr-hero__visual">
				<div class="sl-gdpr-course-preview">
					<div class="sl-gdpr-course-preview__header">
						<div class="sl-gdpr-course-preview__course">
							<span class="sl-gdpr-course-preview__course-label">
								<?php
								esc_html_e(
									'GDPR awareness',
									'succeedlearn-amp'
								);
								?>
							</span>

							<strong>
								<?php
								esc_html_e(
									'Employee Training',
									'succeedlearn-amp'
								);
								?>
							</strong>
						</div>

						<div class="sl-gdpr-course-preview__progress">
							<span>06 / 08</span>

							<div
								class="sl-gdpr-course-preview__progress-track"
								aria-hidden="true"
							>
								<span></span>
							</div>
						</div>
					</div>

					<div class="sl-gdpr-course-preview__body">
						<span class="sl-gdpr-course-preview__eyebrow">
							<?php
							esc_html_e(
								'In-course question',
								'succeedlearn-amp'
							);
							?>
						</span>

						<h3 class="sl-panel-title">
							<?php
							esc_html_e(
								'Your rep wants to email a purchased contact list in Germany.',
								'succeedlearn-amp'
							);
							?>
						</h3>

						<div class="sl-gdpr-course-preview__scenario">
							<span>
								<?php
								esc_html_e(
									'Sales operations asks',
									'succeedlearn-amp'
								);
								?>
							</span>

							<p>
								<?php
								esc_html_e(
									'The list came from a data vendor. Can we send the first email today?',
									'succeedlearn-amp'
								);
								?>
							</p>
						</div>

						<div class="sl-gdpr-course-preview__answers">
							<div class="sl-gdpr-course-preview__answer">
								<span
									class="sl-gdpr-course-preview__radio"
									aria-hidden="true"
								></span>

								<span>
									<?php
									esc_html_e(
										"Yes, they're business contacts.",
										'succeedlearn-amp'
									);
									?>
								</span>
							</div>

							<div class="sl-gdpr-course-preview__answer sl-gdpr-course-preview__answer--correct">
								<span
									class="sl-gdpr-course-preview__radio"
									aria-hidden="true"
								>
									<span></span>
								</span>

								<span>
									<?php
									esc_html_e(
										'No, Germany needs documented consent first.',
										'succeedlearn-amp'
									);
									?>
								</span>
							</div>

							<div class="sl-gdpr-course-preview__answer">
								<span
									class="sl-gdpr-course-preview__radio"
									aria-hidden="true"
								></span>

								<span>
									<?php
									esc_html_e(
										'Only if we add an unsubscribe link.',
										'succeedlearn-amp'
									);
									?>
								</span>
							</div>
						</div>
					</div>

					<div class="sl-gdpr-course-preview__footer">
						<div class="sl-gdpr-course-preview__completion">
							<div
								class="sl-gdpr-course-preview__completion-track"
								aria-hidden="true"
							>
								<span></span>
							</div>

							<span>
								<?php
								esc_html_e(
									'Course progress',
									'succeedlearn-amp'
								);
								?>
							</span>
						</div>

						<span class="sl-gdpr-course-preview__status">
							<?php
							esc_html_e(
								'In progress',
								'succeedlearn-amp'
							);
							?>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>