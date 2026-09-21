<?php
/**
 * SucceedLEARN — FERPA Staff Awareness
 *
 * Section: The Situations Staff Get Wrong
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ferpa_scenarios = array(
	array(
		'strong' => 'The parent of an adult student',
		'text'   => 'who is paying tuition and expects to see grades.',
	),
	array(
		'strong' => 'The colleague with no legitimate educational interest',
		'text'   => 'asking about a student they know socially.',
	),
	array(
		'strong' => 'The directory information assumption',
		'text'   => 'where a student has opted out and nobody checked.',
	),
	array(
		'strong' => 'The vendor data export',
		'text'   => 'requested to configure a system, without a school official agreement in place.',
	),
);

$ferpa_rights = array(
	array(
		'label' => 'K-12 setting',
		'tag'   => 'PARENT HOLDS RIGHTS',
		'text'  => 'Rights generally sit with the parent or guardian until the student becomes eligible.',
		'tone'  => 'blue',
	),
	array(
		'label' => 'Student turns 18',
		'tag'   => 'RIGHTS TRANSFER',
		'text'  => 'The student becomes an eligible student and the parent no longer holds the right by default.',
		'tone'  => 'orange',
	),
	array(
		'label' => 'Postsecondary enrollment',
		'tag'   => 'RIGHTS TRANSFER',
		'text'  => 'Enrolment at a postsecondary institution transfers rights regardless of age.',
		'tone'  => 'orange',
	),
	array(
		'label' => 'Directory information',
		'tag'   => 'DISCLOSABLE',
		'text'  => 'Only where the institution has given notice and the student has not opted out.',
		'tone'  => 'blue',
	),
);
?>

<section
	class="sl-ferpa-scenarios"
	id="situations-staff-get-wrong"
	aria-labelledby="sl-ferpa-scenarios-title"
>
	<div class="container">

		<div class="sl-ferpa-scenarios__grid">

			<!-- LEFT CONTENT -->
			<div class="sl-ferpa-scenarios__content">

				<div class="sl-ferpa-scenarios__heading">

					<span class="sl-home-sub-heading">
						<?php esc_html_e( 'The Situations Staff Get Wrong', 'akaza-adventure' ); ?>
					</span>

					<h2 id="sl-ferpa-scenarios-title">
						<?php esc_html_e( 'The awkward request at the', 'akaza-adventure' ); ?>
						<span>
							<?php esc_html_e( 'front counter.', 'akaza-adventure' ); ?>
						</span>
					</h2>

					<p>
						<?php esc_html_e( 'FERPA rarely fails in policy. It fails in the ninety seconds when someone is standing at a desk asking for something and the staff member does not want to seem unhelpful. These are the moments the course rehearses.', 'akaza-adventure' ); ?>
					</p>

				</div>

				<ul class="sl-ferpa-scenarios__list">

					<?php foreach ( $ferpa_scenarios as $scenario ) : ?>

						<li class="sl-ferpa-scenarios__item">

							<span
								class="sl-ferpa-scenarios__check"
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

							<p>
								<strong>
									<?php echo esc_html( $scenario['strong'] ); ?>
								</strong>

								<?php echo ' ' . esc_html( $scenario['text'] ); ?>
							</p>

						</li>

					<?php endforeach; ?>

				</ul>

			</div>


			<!-- RIGHT DASHBOARD -->
			<div class="sl-ferpa-scenarios__dashboard">

				<div class="sl-ferpa-scenarios__dashboard-header">

					<div class="sl-ferpa-scenarios__dashboard-title">

						<span class="sl-ferpa-scenarios__dashboard-eyebrow">
							<?php esc_html_e( 'FERPA Decision Points', 'akaza-adventure' ); ?>
						</span>

						<h3>
							<?php esc_html_e( 'The rights can change by circumstance.', 'akaza-adventure' ); ?>
						</h3>

					</div>

					<span class="sl-ferpa-scenarios__dashboard-badge">
						<?php esc_html_e( 'Staff reference', 'akaza-adventure' ); ?>
					</span>

				</div>

				<div class="sl-ferpa-scenarios__rows">

					<?php foreach ( $ferpa_rights as $right ) : ?>

						<div class="sl-ferpa-scenarios__row">

							<div class="sl-ferpa-scenarios__row-label">
								<strong>
									<?php echo esc_html( $right['label'] ); ?>
								</strong>
							</div>

							<div class="sl-ferpa-scenarios__row-content">

								<span
									class="sl-ferpa-scenarios__tag sl-ferpa-scenarios__tag--<?php echo esc_attr( $right['tone'] ); ?>"
								>
									<?php echo esc_html( $right['tag'] ); ?>
								</span>

								<p>
									<?php echo esc_html( $right['text'] ); ?>
								</p>

							</div>

						</div>

					<?php endforeach; ?>

				</div>

			</div>

		</div>

	</div>
</section>