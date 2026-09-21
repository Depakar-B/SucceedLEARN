<?php
/**
 * DPDPA Readiness Assessment
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$questions = array(

	/*
	 * Category 1: Recognising Data
	 */
	array(
		'category'       => 1,
		'category_title' => 'Recognising data',
		'question'       => 'Do your employees know what counts as personal data, beyond obviously sensitive things like ID numbers?',
		'module'         => '04',
		'answers'        => array(
			array(
				'text'  => 'Yes, consistently',
				'score' => 2,
			),
			array(
				'text'  => 'Somewhat, for obvious cases only',
				'score' => 1,
			),
			array(
				'text'  => 'No, or not sure',
				'score' => 0,
			),
		),
	),

	array(
		'category'       => 1,
		'category_title' => 'Recognising data',
		'question'       => 'Are employees aware that data collected offline and later digitised can still count as personal data?',
		'module'         => '05',
		'answers'        => array(
			array(
				'text'  => 'Yes, this is covered in training',
				'score' => 2,
			),
			array(
				'text'  => 'Vaguely aware, not formally trained',
				'score' => 1,
			),
			array(
				'text'  => 'No, or not sure',
				'score' => 0,
			),
		),
	),

	array(
		'category'       => 1,
		'category_title' => 'Recognising data',
		'question'       => 'Do employees understand why mishandling personal data matters, beyond "it is company policy"?',
		'module'         => '02',
		'answers'        => array(
			array(
				'text'  => 'Yes, they understand the real impact',
				'score' => 2,
			),
			array(
				'text'  => 'They know the rule, not the reason',
				'score' => 1,
			),
			array(
				'text'  => 'No, or not sure',
				'score' => 0,
			),
		),
	),

	/*
	 * Category 2: Consent & Lawful Use
	 */
	array(
		'category'       => 2,
		'category_title' => 'Consent & lawful use',
		'question'       => 'Do employees know what makes consent valid, clear, informed, specific and unambiguous?',
		'module'         => '06',
		'answers'        => array(
			array(
				'text'  => 'Yes, consistently',
				'score' => 2,
			),
			array(
				'text'  => 'Partially, informally understood',
				'score' => 1,
			),
			array(
				'text'  => 'No, or not sure',
				'score' => 0,
			),
		),
	),

	array(
		'category'       => 2,
		'category_title' => 'Consent & lawful use',
		'question'       => 'Are employees aware of situations where personal data can be used without consent, such as payroll or legal compliance?',
		'module'         => '06',
		'answers'        => array(
			array(
				'text'  => 'Yes, this is trained',
				'score' => 2,
			),
			array(
				'text'  => 'Some employees know this',
				'score' => 1,
			),
			array(
				'text'  => 'No, or not sure',
				'score' => 0,
			),
		),
	),

	array(
		'category'       => 2,
		'category_title' => 'Consent & lawful use',
		'question'       => 'If someone withdraws consent, do employees know the related processing must stop?',
		'module'         => '06',
		'answers'        => array(
			array(
				'text'  => 'Yes, clearly understood',
				'score' => 2,
			),
			array(
				'text'  => 'Not consistently',
				'score' => 1,
			),
			array(
				'text'  => 'No, or not sure',
				'score' => 0,
			),
		),
	),

	/*
	 * Category 3: Everyday Handling
	 */
	array(
		'category'       => 3,
		'category_title' => 'Everyday handling',
		'question'       => 'Do employees generally use approved systems and channels when collecting or storing personal data?',
		'module'         => '07',
		'answers'        => array(
			array(
				'text'  => 'Yes, consistently',
				'score' => 2,
			),
			array(
				'text'  => 'Mostly, with some exceptions',
				'score' => 1,
			),
			array(
				'text'  => 'No, or not sure',
				'score' => 0,
			),
		),
	),

	array(
		'category'       => 3,
		'category_title' => 'Everyday handling',
		'question'       => 'Are employees clear on double-checking recipients, attachments and links before sharing personal data?',
		'module'         => '08',
		'answers'        => array(
			array(
				'text'  => 'Yes, this is trained and practised',
				'score' => 2,
			),
			array(
				'text'  => 'Assumed, not actually trained',
				'score' => 1,
			),
			array(
				'text'  => 'No, or not sure',
				'score' => 0,
			),
		),
	),

	array(
		'category'       => 3,
		'category_title' => 'Everyday handling',
		'question'       => 'Do employees know not to keep old exports, spreadsheets or reports "just in case"?',
		'module'         => '08',
		'answers'        => array(
			array(
				'text'  => 'Yes, clearly understood',
				'score' => 2,
			),
			array(
				'text'  => 'Not really enforced',
				'score' => 1,
			),
			array(
				'text'  => 'No, or not sure',
				'score' => 0,
			),
		),
	),

	/*
	 * Category 4: Rights & Requests
	 */
	array(
		'category'       => 4,
		'category_title' => 'Rights & requests',
		'question'       => 'If an employee receives a request to access, correct or delete someone\'s data, do they know to route it rather than respond informally?',
		'module'         => '09',
		'answers'        => array(
			array(
				'text'  => 'Yes, there is a clear process',
				'score' => 2,
			),
			array(
				'text'  => 'Unclear, would improvise',
				'score' => 1,
			),
			array(
				'text'  => 'No, or not sure',
				'score' => 0,
			),
		),
	),

	array(
		'category'       => 4,
		'category_title' => 'Rights & requests',
		'question'       => 'Do employees know where to escalate a privacy complaint or concern?',
		'module'         => '10',
		'answers'        => array(
			array(
				'text'  => 'Yes, clearly signposted',
				'score' => 2,
			),
			array(
				'text'  => 'Somewhat, informally',
				'score' => 1,
			),
			array(
				'text'  => 'No, or not sure',
				'score' => 0,
			),
		),
	),

	array(
		'category'       => 4,
		'category_title' => 'Rights & requests',
		'question'       => 'Are employees aware they should not try to resolve a data rights request on their own?',
		'module'         => '09',
		'answers'        => array(
			array(
				'text'  => 'Yes, clearly understood',
				'score' => 2,
			),
			array(
				'text'  => 'Not consistently',
				'score' => 1,
			),
			array(
				'text'  => 'No, or not sure',
				'score' => 0,
			),
		),
	),

	/*
	 * Category 5: Breach Reporting
	 */
	array(
		'category'       => 5,
		'category_title' => 'Breach reporting',
		'question'       => 'Do employees understand that a breach is not limited to a major hack, a wrong recipient or a lost device counts too?',
		'module'         => '11',
		'answers'        => array(
			array(
				'text'  => 'Yes, clearly understood',
				'score' => 2,
			),
			array(
				'text'  => 'Only major incidents come to mind',
				'score' => 1,
			),
			array(
				'text'  => 'No, or not sure',
				'score' => 0,
			),
		),
	),

	array(
		'category'       => 5,
		'category_title' => 'Breach reporting',
		'question'       => 'If something goes wrong, do employees know to report it immediately rather than wait or fix it quietly?',
		'module'         => '11',
		'answers'        => array(
			array(
				'text'  => 'Yes, there is a fast, known process',
				'score' => 2,
			),
			array(
				'text'  => 'Slow or inconsistent reporting',
				'score' => 1,
			),
			array(
				'text'  => 'No, or not sure',
				'score' => 0,
			),
		),
	),

	array(
		'category'       => 5,
		'category_title' => 'Breach reporting',
		'question'       => 'Do employees know not to delete evidence or contact affected individuals on their own after a suspected breach?',
		'module'         => '12',
		'answers'        => array(
			array(
				'text'  => 'Yes, clearly trained',
				'score' => 2,
			),
			array(
				'text'  => 'Not explicitly covered',
				'score' => 1,
			),
			array(
				'text'  => 'No, or not sure',
				'score' => 0,
			),
		),
	),
);

$question_count = count( $questions );
?>

<section
	id="scorecard"
	class="sl-dpdpa-assessment"
	aria-labelledby="sl-dpdpa-assessment-title"
	data-question-count="<?php echo esc_attr( $question_count ); ?>"
>

	<div class="container">

		<div class="sl-dpdpa-assessment__wrapper">

			<!-- =====================================================
			     Assessment Interface
			====================================================== -->

			<div class="sl-dpdpa-assessment__question-interface">

				<div class="sl-dpdpa-assessment__header">

					<div class="sl-dpdpa-assessment__meta">

						<span class="sl-dpdpa-assessment__question-number">
							Question <strong>1</strong> of <?php echo esc_html( $question_count ); ?>
						</span>

						<span class="sl-dpdpa-assessment__category">
							Recognising data
						</span>

					</div>

					<div
						class="sl-dpdpa-assessment__progress"
						role="progressbar"
						aria-valuemin="1"
						aria-valuemax="<?php echo esc_attr( $question_count ); ?>"
						aria-valuenow="1"
						aria-label="Assessment progress"
					>
						<span></span>
					</div>

				</div>

				<div class="sl-dpdpa-assessment__body">

					<div class="sl-dpdpa-assessment__category-label">
						Category 1 of 5: Recognising data
					</div>

					<div class="sl-dpdpa-assessment__module">
						Question 1 · Module 04
					</div>

					<h2
						id="sl-dpdpa-assessment-title"
						class="sl-dpdpa-assessment__question"
					>
						Do your employees know what counts as personal data, beyond obviously sensitive things like ID numbers?
					</h2>

					<div class="sl-dpdpa-assessment__answers"></div>

				</div>

				<div class="sl-dpdpa-assessment__footer">

					<button
						type="button"
						class="sl-dpdpa-assessment__back"
						disabled
					>
						Back
					</button>

					<span class="sl-dpdpa-assessment__status">
						Select an answer to continue
					</span>

					<button
						type="button"
						class="sl-dpdpa-assessment__next"
						disabled
					>
						Next
					</button>

				</div>

			</div>

			<!-- =====================================================
			     Result Interface
			====================================================== -->

			<div
				class="sl-dpdpa-assessment__result-interface"
				hidden
			>

				<div class="sl-dpdpa-assessment__result-panel">

					<div class="sl-dpdpa-assessment__result-summary">

						<div
							class="sl-dpdpa-assessment__result-ring"
							style="--sl-dpdpa-score: 0;"
							aria-hidden="true"
						>
							<span class="sl-dpdpa-assessment__result-percentage">
								0%
							</span>
						</div>

						<span class="sl-dpdpa-assessment__result-band">
							Strong foundation
						</span>

						<p class="sl-dpdpa-assessment__result-label sl-dpdpa-result-copy-white">
							Overall DPDPA training readiness
						</p>

						<p class="sl-dpdpa-assessment__result-description sl-dpdpa-result-copy-white">
							Your workforce has a solid baseline. The remaining gaps are worth closing before an auditor or regulator finds them for you.
						</p>

					</div>

					<div class="sl-dpdpa-assessment__category-results">

						<?php
						$category_labels = array(
							1 => 'Recognising data',
							2 => 'Consent & lawful use',
							3 => 'Everyday handling',
							4 => 'Rights & requests',
							5 => 'Breach reporting',
						);

						$category_tips = array(
							1 => 'Map the personal data your teams touch every day.',
							2 => 'Tighten consent and purpose checks before processing.',
							3 => 'Reinforce secure sharing, storage, and disposal habits.',
							4 => 'Set a clear process for access, correction, and erasure.',
							5 => 'Practice early escalation so incidents are not delayed.',
						);

						foreach ( $category_labels as $category_id => $category_label ) :
							?>

							<div
								class="sl-dpdpa-assessment__category-result"
								data-category="<?php echo esc_attr( $category_id ); ?>"
							>

								<span class="sl-dpdpa-assessment__category-result-name sl-dpdpa-result-copy-white">
									<?php echo esc_html( $category_label ); ?>
								</span>

								<span class="sl-dpdpa-assessment__category-result-score sl-dpdpa-result-copy-white">
									<span class="sl-dpdpa-assessment__lock-icon" aria-hidden="true">
										<svg
											viewBox="0 0 24 24"
											width="18"
											height="18"
											fill="none"
											xmlns="http://www.w3.org/2000/svg"
										>
											<rect
												x="5"
												y="10"
												width="14"
												height="10"
												rx="2"
												stroke="currentColor"
												stroke-width="1.5"
											/>
											<path
												d="M8 10V7.5C8 5.57 9.57 4 11.5 4h1C14.43 4 16 5.57 16 7.5V10"
												stroke="currentColor"
												stroke-width="1.5"
												stroke-linecap="round"
											/>
										</svg>
									</span>
									<span class="sl-dpdpa-assessment__category-result-value sl-dpdpa-result-copy-white">
										0%
									</span>
								</span>

								<p class="sl-dpdpa-assessment__category-result-tip sl-dpdpa-result-copy-white">
									<?php echo esc_html( $category_tips[ $category_id ] ); ?>
								</p>

							</div>

						<?php endforeach; ?>

					</div>

				</div>

				<div class="sl-dpdpa-assessment__unlock">

					<div class="sl-dpdpa-assessment__unlock-content">

						<h2>
							See exactly where the gaps are
						</h2>

						<p>
							Enter your work email to unlock the category breakdown and get a copy of this report in your inbox.
						</p>

					</div>

					<form
						class="sl-dpdpa-assessment__unlock-form"
						action=""
						method="post"
						novalidate
					>

						<label
							class="screen-reader-text"
							for="sl-dpdpa-assessment-email"
						>
							Email address
						</label>

						<input
							type="email"
							id="sl-dpdpa-assessment-email"
							name="email"
							placeholder="you@company.com"
							autocomplete="email"
							required
						>

						<button
							type="submit"
							class="sl-dpdpa-assessment__unlock-button"
						>
							Email my report
						</button>

					</form>

					<p class="sl-dpdpa-assessment__privacy-note">
						No spam. Just this report, and nothing else unless you ask.
					</p>

					<div
						class="sl-dpdpa-assessment__form-message"
						role="status"
						aria-live="polite"
					></div>

				</div>

			</div>

		</div>

	</div>

	<script
		type="application/json"
		id="sl-dpdpa-assessment-data"
	><?php echo wp_json_encode( $questions ); ?></script>

</section>