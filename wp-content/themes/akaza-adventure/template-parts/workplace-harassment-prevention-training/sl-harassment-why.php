<?php
/**
 * SucceedLEARN — Workplace Harassment Prevention
 *
 * Section: Why organisations choose SucceedLEARN
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$reasons = array(
	array(
		'number' => '01',
		'title'  => 'Region-relevant content',
		'text'   => 'Choose learning designed around the workforce location and regional context instead of relying on one generic course for every employee.',
	),
	array(
		'number' => '02',
		'title'  => 'Role-specific learning',
		'text'   => 'Provide employees, supervisors, managers and Internal Committee members with content relevant to their responsibilities.',
	),
	array(
		'number' => '03',
		'title'  => 'Workplace-based scenarios',
		'text'   => 'Help learners apply concepts through situations that reflect contemporary office, remote, digital and customer-facing work.',
	),
	array(
		'number' => '04',
		'title'  => 'Customisation support',
		'text'   => 'Incorporate branding, policies, reporting routes and selected organisational information.',
	),
	array(
		'number' => '05',
		'title'  => 'Flexible implementation',
		'text'   => 'Use the SucceedLEARN platform or deliver courses through a compatible organisational LMS.',
	),
	array(
		'number' => '06',
		'title'  => 'Compliance learning expertise',
		'text'   => 'Access content developed with input from subject-matter experts and supported by Succeed Technologies’ experience in workplace compliance learning.',
	),
);
?>

<section
	class="sl-harassment-why"
	id="why-succeedlearn"
	aria-labelledby="sl-harassment-why-title"
>

	<div class="container">

		<!-- =====================================
		     SECTION HEADING
		===================================== -->

		<div class="sl-harassment-why__heading">

			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Why SucceedLEARN',
					'akaza-adventure'
				);
				?>
			</span>

			<h2 id="sl-harassment-why-title">
				<?php
				esc_html_e(
					'Why organisations choose',
					'akaza-adventure'
				);
				?>
				<span>
					<?php
					esc_html_e(
						'SucceedLEARN',
						'akaza-adventure'
					);
					?>
				</span>
			</h2>

		</div>


		<!-- =====================================
		     FEATURE CARDS
		===================================== -->

		<div class="sl-harassment-why__grid">

			<?php foreach ( $reasons as $reason ) : ?>

				<article class="sl-harassment-why__card">

					<div class="sl-harassment-why__number">
						<?php echo esc_html( $reason['number'] ); ?>
					</div>

					<div class="sl-harassment-why__card-content">

						<h3 class="sl-panel-title">
							<?php echo esc_html( $reason['title'] ); ?>
						</h3>

						<p>
							<?php echo esc_html( $reason['text'] ); ?>
						</p>

					</div>

				</article>

			<?php endforeach; ?>

		</div>

	</div>

</section>