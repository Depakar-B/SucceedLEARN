<?php
/**
 * HIPAA Frequently Asked Questions Section.
 *
 * Uses native details and summary elements with a small script
 * so only one FAQ item stays open at a time.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faqs = array(
	array(
		'question' => __( 'Is HIPAA training required annually?', 'akaza-adventure' ),
		'answer'   => __( 'HIPAA requires training for all workforce members on privacy policies and procedures, and periodically thereafter, but it does not name a fixed interval. In practice, most covered entities and business associates run it annually plus at onboarding because that is the cadence auditors and clients expect to see documented.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How quickly can we roll this out?', 'akaza-adventure' ),
		'answer'   => __( 'If you have your own LMS, the SCORM package can be installed the same day you receive it. If we host it, we can typically have your branded portal live and learners invited within a few working days of receiving your staff list.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What records do we get for an audit?', 'akaza-adventure' ),
		'answer'   => __( 'You receive a dated completion certificate for every learner, plus exportable completion reports by department, manager or individual in Excel and PDF. That is the documentation you produce when a regulator, an auditor or a covered entity client asks whether your workforce was trained.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Will our staff actually finish it?', 'akaza-adventure' ),
		'answer'   => __( 'Across our compliance courses, we see a 95 percent completion rate. The course is scenario-led rather than narrated slides, and automated reminders follow up with incomplete learners so your team does not have to do it manually.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Who needs HIPAA training in an organization?', 'akaza-adventure' ),
		'answer'   => __( 'Every workforce member who could come into contact with protected health information. That includes clinical staff, front desk and scheduling teams, billing, IT, facilities staff with ward access and contractors. Business associates and their staff need it too, not only covered entities.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Do business associates need HIPAA training?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Business associates are directly liable under HIPAA for certain requirements, and covered entities routinely require evidence of workforce training in the business associate agreement. This course covers the distinction and what each party is responsible for.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'What happens if staff are not trained on HIPAA?', 'akaza-adventure' ),
		'answer'   => __( 'Civil monetary penalties are tiered by culpability, from unknowing violations through willful neglect, with substantially higher penalties where an organization knew or should have known. Absence of documented training is a common finding in enforcement actions because it can point towards willful neglect.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'How much does HIPAA training cost per employee?', 'akaza-adventure' ),
		'answer'   => __( 'This course is $20 per seat per year, dropping to $16 above 100 seats and $13 above 500 seats. Published industry benchmarks put ongoing annual HIPAA training at approximately $50 to $100 per employee.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Is this advanced training for privacy officers?', 'akaza-adventure' ),
		'answer'   => __( 'No. This is workforce awareness training for everyone who handles PHI. It gives your staff a defensible baseline and gives you the completion evidence. Privacy and security officers will typically need deeper role-specific training in addition, and we would rather explain that now than have you discover it during a review.', 'akaza-adventure' ),
	),
	array(
		'question' => __( 'Can we see the course before committing?', 'akaza-adventure' ),
		'answer'   => __( 'Yes. Request a demo and we will walk you through the full course, show you a sample certificate and completion report, and provide the SCORM details for your environment. There is no obligation and no pressure.', 'akaza-adventure' ),
	),
);

$faq_index = 0;
?>

<section
	class="sl-hipaa-faq"
	aria-labelledby="sl-hipaa-faq-title"
>
	<div class="container">

		<header class="sl-hipaa-faq__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Questions buyers ask', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-hipaa-faq-title">
				<?php esc_html_e( 'Frequently asked ', 'akaza-adventure' ); ?>
				<span>
					<?php esc_html_e( 'questions.', 'akaza-adventure' ); ?>
				</span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'Clear answers about requirements, rollout, audit records, course scope and pricing.',
					'akaza-adventure'
				);
				?>
			</p>

		</header>

		<div class="sl-hipaa-faq__grid">

			<?php foreach ( $faqs as $faq ) : ?>

				<?php $faq_index++; ?>

				<details
					class="sl-hipaa-faq__item"
					<?php echo ( 1 === $faq_index ) ? ' open' : ''; ?>
				>

					<summary class="sl-hipaa-faq__question">

						<span
							class="sl-hipaa-faq__index"
							aria-hidden="true"
						>
							<?php
								echo esc_html(
									str_pad(
										(string) $faq_index,
										2,
										'0',
										STR_PAD_LEFT
									)
								);
							?>
						</span>

						<span class="sl-hipaa-faq__question-text">
							<?php echo esc_html( $faq['question'] ); ?>
						</span>

						<span
							class="sl-hipaa-faq__toggle"
							aria-hidden="true"
						>
							<span class="sl-hipaa-faq__toggle-bar sl-hipaa-faq__toggle-bar--h"></span>
							<span class="sl-hipaa-faq__toggle-bar sl-hipaa-faq__toggle-bar--v"></span>
						</span>

					</summary>

					<div class="sl-hipaa-faq__panel">
						<div class="sl-hipaa-faq__answer">
							<p>
								<?php echo esc_html( $faq['answer'] ); ?>
							</p>
						</div>
					</div>

				</details>

			<?php endforeach; ?>

		</div>

		<div class="sl-hipaa-faq__footer">

			<div class="sl-hipaa-faq__footer-content">

				<span
					class="sl-hipaa-icon sl-hipaa-faq__footer-icon"
					aria-hidden="true"
				>
					<svg
						viewBox="0 0 24 24"
						fill="none"
						xmlns="http://www.w3.org/2000/svg"
						focusable="false"
					>
						<path
							d="M5 5.5H19V15.5H10L6 19V15.5H5V5.5Z"
							stroke="currentColor"
							stroke-width="1.7"
							stroke-linecap="round"
							stroke-linejoin="round"
						/>
						<path
							d="M9 9H15M9 12H13"
							stroke="currentColor"
							stroke-width="1.7"
							stroke-linecap="round"
						/>
					</svg>
				</span>

				<div>
					<h3>
						<?php esc_html_e( 'Still have a question?', 'akaza-adventure' ); ?>
					</h3>

					<p>
						<?php
							esc_html_e(
								'We can show you the course, reporting tools and deployment options for your organization.',
								'akaza-adventure'
							);
						?>
					</p>
				</div>

			</div>

			<a
				class="sl-content-btn sl-content-btn-primary"
				href="#contact"
			>
				<?php esc_html_e( 'Request a demo', 'akaza-adventure' ); ?>

				<svg
					viewBox="0 0 20 20"
					fill="none"
					xmlns="http://www.w3.org/2000/svg"
					aria-hidden="true"
					focusable="false"
				>
					<path
						d="M4 10H15"
						stroke="currentColor"
						stroke-width="1.7"
						stroke-linecap="round"
					/>
					<path
						d="M11 6L15 10L11 14"
						stroke="currentColor"
						stroke-width="1.7"
						stroke-linecap="round"
						stroke-linejoin="round"
					/>
				</svg>
			</a>

		</div>

	</div>
</section>