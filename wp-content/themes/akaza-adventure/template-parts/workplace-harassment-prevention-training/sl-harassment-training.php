<?php
/**
 * SucceedLEARN — Workplace Harassment Prevention
 *
 * Section: What is workplace harassment prevention training?
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$harassment_questions = array(
	'What conduct may constitute harassment?',
	'Can harassment occur virtually or away from the office?',
	'Can a client, customer, supplier or contractor be involved?',
	'What is the difference between intent and impact?',
	'How can an employee raise a concern?',
	'What should a witness do?',
	'What responsibilities does a supervisor have?',
	'What happens after a complaint is reported?',
);
?>

<section
	class="sl-harassment-training"
	id="what-is-harassment-training"
	aria-labelledby="sl-harassment-training-title"
>

	<div class="container">

		<div class="sl-harassment-training__grid">

			<!-- =====================================
			     LEFT VISUAL
			===================================== -->

			<div class="sl-harassment-training__visual">

				<div class="sl-harassment-training__visual-card">

					<div class="sl-harassment-training__image-placeholder">

						<div class="sl-harassment-training__image-icon">

							<svg
								viewBox="0 0 24 24"
								fill="none"
								focusable="false"
							>
								<rect
									x="4"
									y="4"
									width="16"
									height="16"
									rx="2"
									stroke="currentColor"
									stroke-width="1.6"
								/>

								<path
									d="M8 9h8M8 12h6M8 15h4"
									stroke="currentColor"
									stroke-width="1.5"
									stroke-linecap="round"
								/>

							</svg>

						</div>

						<span class="sl-harassment-training__image-title">
							<?php
							esc_html_e(
								'Workplace Harassment Prevention',
								'akaza-adventure'
							);
							?>
						</span>

						<span class="sl-harassment-training__image-size">
							<?php
							esc_html_e(
								'Image placeholder — 620 × 720 px',
								'akaza-adventure'
							);
							?>
						</span>

					</div>

				</div>

			</div>


			<!-- =====================================
			     RIGHT CONTENT
			===================================== -->

			<div class="sl-harassment-training__content">

				<div class="sl-harassment-training__heading">

					<span class="sl-home-sub-heading">
						<?php
						esc_html_e(
							'Practical Workplace Learning',
							'akaza-adventure'
						);
						?>
					</span>

					<h2 id="sl-harassment-training-title">
						<?php
						esc_html_e(
							'What is workplace harassment',
							'akaza-adventure'
						);
						?>
						<span>
							<?php
							esc_html_e(
								'prevention training?',
								'akaza-adventure'
							);
							?>
						</span>
					</h2>

				</div>


				<div class="sl-harassment-training__intro">

					<p>
						<?php
						esc_html_e(
							'Workplace harassment prevention training teaches employees how to recognise inappropriate or potentially unlawful conduct, understand workplace boundaries, raise concerns and respond appropriately when they experience or witness problematic behaviour.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Effective training should help learners answer practical questions:',
							'akaza-adventure'
						);
						?>
					</p>

				</div>


				<!-- =====================================
				     PRACTICAL QUESTIONS
				===================================== -->

				<ul class="sl-harassment-training__questions">

					<?php foreach ( $harassment_questions as $index => $question ) : ?>

						<li class="sl-harassment-training__question">

							<span class="sl-harassment-training__number">
								<?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?>
							</span>

							<p>
								<?php echo esc_html( $question ); ?>
							</p>

						</li>

					<?php endforeach; ?>

				</ul>


				<!-- =====================================
				     CONCLUSION
				===================================== -->

				<div class="sl-harassment-training__conclusion">

					<p>
						<?php
						esc_html_e(
							'SucceedLEARN turns these questions into practical learning through clear explanations, workplace examples, scenarios and knowledge checks appropriate to the selected course.',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

			</div>

		</div>

	</div>

</section>