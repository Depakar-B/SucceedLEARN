<?php
/**
 * SucceedLEARN — DPDPA Course Coverage
 *
 * Section: What the DPDPA course covers
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coverage_items = array(
	array(
		'title' => __( 'Recognise personal data', 'akaza-adventure' ),
		'text'  => __( 'What counts, directly or indirectly, before it gets mishandled.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Consent and lawful grounds', 'akaza-adventure' ),
		'text'  => __( 'What makes consent valid, and the legitimate uses that do not need it.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'The full data lifecycle', 'akaza-adventure' ),
		'text'  => __( 'Collect, classify, store, share, retain and delete, the way the Act expects.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Data Principal rights', 'akaza-adventure' ),
		'text'  => __( 'Recognise a request and route it, rather than answering it informally.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Breach recognition and reporting', 'akaza-adventure' ),
		'text'  => __( 'Act in the first minutes, not after checking with five people.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'A real assessment', 'akaza-adventure' ),
		'text'  => __( '5 questions, 4 correct required, certificate issued automatically.', 'akaza-adventure' ),
	),
);

$curriculum_items = array(
	array(
		'title' => __( 'Introduction and objectives', 'akaza-adventure' ),
		'text'  => __( 'Why this training matters in everyday work.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Why data protection matters', 'akaza-adventure' ),
		'text'  => __( 'The real world impact of poor data handling.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'What is the DPDPA', 'akaza-adventure' ),
		'text'  => __( 'Overview of the Act and consequences of non-compliance.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Key DPDPA terms', 'akaza-adventure' ),
		'text'  => __( 'Personal Data, Data Principal, Data Fiduciary, Data Processor.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Scope of the DPDPA', 'akaza-adventure' ),
		'text'  => __( 'What data and which organisations are covered.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Lawful grounds for processing', 'akaza-adventure' ),
		'text'  => __( 'Valid consent and the legitimate uses that do not require it.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Privacy by design', 'akaza-adventure' ),
		'text'  => __( 'Building privacy into everyday decisions and processes.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Handling data across its lifecycle', 'akaza-adventure' ),
		'text'  => __( 'Collection, classification, storage, sharing, retention, deletion.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Data Principal rights and requests', 'akaza-adventure' ),
		'text'  => __( 'Consent withdrawal, access, correction, erasure, grievance redressal. Knowledge check included.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Grievances and escalation', 'akaza-adventure' ),
		'text'  => __( 'Recognising and routing privacy concerns correctly.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Breach awareness and reporting', 'akaza-adventure' ),
		'text'  => __( 'What counts as a breach and how to report it without delay. Knowledge check included.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Your responsibilities', 'akaza-adventure' ),
		'text'  => __( "Practical dos and don'ts for everyday data handling.", 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Final assessment and certificate', 'akaza-adventure' ),
		'text'  => __( '5 randomised questions, minimum 4 correct to pass.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-dpdpa-course-coverage"
	aria-labelledby="sl-dpdpa-course-coverage-title"
>
	<div class="container">

		<div class="sl-dpdpa-course-coverage__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'What the DPDPA course covers', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-dpdpa-course-coverage-title">
				<?php esc_html_e( 'Built for every employee who', 'akaza-adventure' ); ?>
				<span>
					<?php esc_html_e( 'handles personal data.', 'akaza-adventure' ); ?>
				</span>
			</h2>

			<p>
				<?php esc_html_e(
					"This isn't role-based training, and it isn't written for a DPO. It's built for the person who has never read the Act and never will, and still needs to get this right.",
					'akaza-adventure'
				); ?>
			</p>

		</div>


		<div class="sl-dpdpa-course-coverage__grid">

			<?php foreach ( $coverage_items as $index => $item ) : ?>

				<article class="sl-dpdpa-course-coverage__card">

					<div class="sl-dpdpa-course-coverage__number">
						<?php echo esc_html( str_pad( $index + 1, 2, '0', STR_PAD_LEFT ) ); ?>
					</div>

					<div class="sl-dpdpa-course-coverage__card-content">

						<h3 class="sl-panel-title">
							<?php echo esc_html( $item['title'] ); ?>
						</h3>

						<p>
							<?php echo esc_html( $item['text'] ); ?>
						</p>

					</div>

				</article>

			<?php endforeach; ?>

		</div>


		<!-- Full curriculum toggle -->

		<div class="sl-dpdpa-course-coverage__curriculum">

			<button
				type="button"
				class="sl-dpdpa-course-coverage__toggle"
				aria-expanded="false"
				aria-controls="sl-dpdpa-full-curriculum"
			>

				<span class="sl-dpdpa-course-coverage__toggle-title">
					<?php esc_html_e( 'Full 13-module DPDPA course curriculum', 'akaza-adventure' ); ?>
				</span>

				<span
					class="sl-dpdpa-course-coverage__toggle-action"
					data-show-label="<?php esc_attr_e( 'Show all 13 modules', 'akaza-adventure' ); ?>"
					data-hide-label="<?php esc_attr_e( 'Hide all 13 modules', 'akaza-adventure' ); ?>"
				>
					<?php esc_html_e( 'Show all 13 modules', 'akaza-adventure' ); ?>
				</span>

				<span
					class="sl-dpdpa-course-coverage__toggle-icon"
					aria-hidden="true"
				>
					+
				</span>

			</button>


			<div
				id="sl-dpdpa-full-curriculum"
				class="sl-dpdpa-course-coverage__panel"
				hidden
			>

				<div class="sl-dpdpa-course-coverage__panel-heading">

					<h3>
						<?php esc_html_e( 'Full 13-module DPDPA course curriculum', 'akaza-adventure' ); ?>
					</h3>

				</div>


				<ol class="sl-dpdpa-course-coverage__curriculum-list">

					<?php foreach ( $curriculum_items as $index => $item ) : ?>

						<li class="sl-dpdpa-course-coverage__curriculum-item">

							<span class="sl-dpdpa-course-coverage__curriculum-number">
								<?php echo esc_html( str_pad( $index + 1, 2, '0', STR_PAD_LEFT ) ); ?>
							</span>

							<div class="sl-dpdpa-course-coverage__curriculum-content">

								<h4>
									<?php echo esc_html( $item['title'] ); ?>
								</h4>

								<p>
									<?php echo esc_html( $item['text'] ); ?>
								</p>

							</div>

						</li>

					<?php endforeach; ?>

				</ol>

			</div>

		</div>

	</div>
</section>