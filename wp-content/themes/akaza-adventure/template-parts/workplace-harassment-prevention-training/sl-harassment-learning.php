<?php
/**
 * SucceedLEARN — Workplace Harassment Prevention
 *
 * Section: Learning designed for different responsibilities
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audiences = array(
	array(
		'number' => '01',
		'title'  => 'Employees',
		'text'   => 'Employees learn to recognise concerning behaviour, understand organisational expectations, identify reporting routes and consider appropriate bystander responses.',
	),
	array(
		'number' => '02',
		'title'  => 'Supervisors and managers',
		'text'   => 'People managers learn how to receive concerns, avoid dismissive or prejudicial responses, document essential information and escalate matters through the correct channels.',
	),
	array(
		'number' => '03',
		'title'  => 'Complaint-handling teams',
		'text'   => 'Specialist audiences, including India Internal Committee members, receive deeper procedural learning appropriate to their responsibilities.',
	),
);
?>

<section
	class="sl-harassment-learning"
	id="learning-by-responsibility"
	aria-labelledby="sl-harassment-learning-title"
>

	<div class="container">

		<!-- =====================================
		     HEADING
		===================================== -->

		<div class="sl-harassment-learning__heading">

			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Role-Relevant Learning',
					'akaza-adventure'
				);
				?>
			</span>

			<h2 id="sl-harassment-learning-title">
				<?php
				esc_html_e(
					'Learning designed for different',
					'akaza-adventure'
				);
				?>
				<span>
					<?php
					esc_html_e(
						'responsibilities',
						'akaza-adventure'
					);
				?>
				</span>
			</h2>

		</div>


		<!-- =====================================
		     AUDIENCE CARDS
		===================================== -->

		<div class="sl-harassment-learning__grid">

			<?php foreach ( $audiences as $audience ) : ?>

				<article class="sl-harassment-learning__card">

					<div class="sl-harassment-learning__number">
						<?php echo esc_html( $audience['number'] ); ?>
					</div>

					<h3 class="sl-panel-title">
						<?php echo esc_html( $audience['title'] ); ?>
					</h3>

					<p>
						<?php echo esc_html( $audience['text'] ); ?>
					</p>

				</article>

			<?php endforeach; ?>

		</div>


		<!-- =====================================
		     CONCLUSION
		===================================== -->

		<div class="sl-harassment-learning__result">

			<span class="sl-harassment-learning__result-label">
				<?php
				esc_html_e(
					'The result',
					'akaza-adventure'
				);
				?>
			</span>

			<p>
				<?php
				esc_html_e(
					'The result is not one generic message for everyone. It is learning matched to what each audience may need to notice, understand and do.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>

	</div>

</section>