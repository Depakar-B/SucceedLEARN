<?php
/**
 * SucceedLEARN — FERPA Staff Awareness
 *
 * Section: What Is Inside
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ferpa_outline = array(
	array(
		'title' => 'Course outline',
		'items' => array(
			array(
				'text'      => 'What FERPA is and which institutions it applies to',
				'highlight' => false,
			),
			array(
				'text'      => 'Education records, and what falls outside the definition',
				'highlight' => true,
			),
			array(
				'text'      => 'Personally identifiable information in a student context',
				'highlight' => false,
			),
			array(
				'text'      => 'Directory information and the right to opt out',
				'highlight' => true,
			),
			array(
				'text'      => 'Rights of parents, and the transfer to eligible students',
				'highlight' => false,
			),
			array(
				'text'      => 'Right to inspect, review and request amendment',
				'highlight' => false,
			),
			array(
				'text'      => 'Permitted disclosures without consent, including legitimate educational interest',
				'highlight' => false,
			),
			array(
				'text'      => 'School officials, contractors and vendors acting on the institution’s behalf',
				'highlight' => false,
			),
			array(
				'text'      => 'Consent requirements and recordkeeping for disclosures',
				'highlight' => false,
			),
			array(
				'text'      => 'Everyday scenarios and knowledge checks',
				'highlight' => false,
			),
		),
	),
	array(
		'title' => 'On completion, staff can',
		'items' => array(
			array(
				'text'      => 'Identify whether a document is an education record',
				'highlight' => false,
			),
			array(
				'text'      => 'Explain the difference between directory information and protected information',
				'highlight' => false,
			),
			array(
				'text'      => 'Determine whether rights sit with the parent or the eligible student',
				'highlight' => false,
			),
			array(
				'text'      => 'Recognise a disclosure that is permitted without consent',
				'highlight' => false,
			),
			array(
				'text'      => 'Handle a records request from a parent, student or third party correctly',
				'highlight' => false,
			),
			array(
				'text'      => 'Know when to escalate rather than answer at the counter',
				'highlight' => false,
			),
		),
	),
);

$ferpa_outline_images = array(
	array(
		'title' => 'Screenshot: records request scenario',
		'text'  => 'A frame showing a real front-office situation mid-decision.',
	),
	array(
		'title' => 'Screenshot: the eligible student branch point',
		'text'  => 'Where the course splits by learner context.',
	),
);
?>

<section
	class="sl-ferpa-outline"
	id="what-is-inside"
	aria-labelledby="sl-ferpa-outline-title"
>
	<div class="container">

		<div class="sl-ferpa-outline__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'What Is Inside', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-ferpa-outline-title">
				<?php esc_html_e( 'The full outline,', 'akaza-adventure' ); ?>
				<span>
					<?php esc_html_e( 'published up front.', 'akaza-adventure' ); ?>
				</span>
			</h2>

			<p>
				<?php esc_html_e( 'Your registrar or compliance lead can review the scope before booking a demo rather than after one.', 'akaza-adventure' ); ?>
			</p>

		</div>

		<div class="sl-ferpa-outline__grid">

			<?php foreach ( $ferpa_outline as $column ) : ?>

				<div class="sl-ferpa-outline__panel">

					<div class="sl-ferpa-outline__panel-header">
						<h3>
							<?php echo esc_html( $column['title'] ); ?>
						</h3>
					</div>

					<ul class="sl-ferpa-outline__list">

						<?php foreach ( $column['items'] as $item ) : ?>

							<li
								class="sl-ferpa-outline__item<?php echo $item['highlight'] ? ' sl-ferpa-outline__item--highlight' : ''; ?>"
							>

								<span
									class="sl-ferpa-outline__check"
									aria-hidden="true"
								>
									<svg
										viewBox="0 0 24 24"
										focusable="false"
									>
										<path
											d="m6 12.5 4 4 8-9"
											fill="none"
											stroke="currentColor"
											stroke-width="2"
											stroke-linecap="round"
											stroke-linejoin="round"
										/>
									</svg>
								</span>

								<span class="sl-ferpa-outline__item-text">
									<?php echo esc_html( $item['text'] ); ?>
								</span>

							</li>

						<?php endforeach; ?>

					</ul>

				</div>

			<?php endforeach; ?>

		</div>

		<div class="sl-ferpa-outline__visuals">

			<?php foreach ( $ferpa_outline_images as $image ) : ?>

				<div class="sl-ferpa-outline__visual">

					<div class="sl-ferpa-outline__placeholder">
						<span class="sl-ferpa-outline__placeholder-label">
							<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
						</span>
					</div>

					<div class="sl-ferpa-outline__visual-caption">

						<span class="sl-ferpa-outline__caption-title">
							<?php echo esc_html( $image['title'] ); ?>
						</span>

						<p>
							<?php echo esc_html( $image['text'] ); ?>
						</p>

					</div>

				</div>

			<?php endforeach; ?>

		</div>

	</div>
</section>