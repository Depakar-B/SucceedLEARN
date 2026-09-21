<?php
/**
 * SucceedLEARN — Workplace Harassment Prevention
 *
 * Section: Flexible delivery for your workforce
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$delivery_options = array(
	array(
		'number' => '01',
		'title'  => 'SucceedLEARN LMS',
		'text'   => 'Assign courses, monitor participation and manage learning through our hosted platform.',
	),
	array(
		'number' => '02',
		'title'  => 'SCORM delivery',
		'text'   => 'Deploy compatible course packages through your organisation’s existing learning management system.',
	),
	array(
		'number' => '03',
		'title'  => 'Mobile and desktop access',
		'text'   => 'Enable employees to complete assigned learning using supported mobile devices, desktops or laptops.',
	),
	array(
		'number' => '04',
		'title'  => 'Completion reporting',
		'text'   => 'Monitor course completion and obtain relevant learner records and reports according to the selected delivery model.',
	),
	array(
		'number' => '05',
		'title'  => 'Assessments and LinkedIn sharable certificates',
		'text'   => 'Reinforce learning and document completion through course assessments and certificates where included in the selected module.',
	),
);
?>

<section
	class="sl-harassment-delivery"
	id="flexible-delivery"
	aria-labelledby="sl-harassment-delivery-title"
>

	<div class="container">

		<!-- =====================================
		     SECTION HEADING
		===================================== -->

		<div class="sl-harassment-delivery__heading">

			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Flexible Learning Delivery',
					'akaza-adventure'
				);
				?>
			</span>

			<h2 id="sl-harassment-delivery-title">
				<?php
				esc_html_e(
					'Flexible delivery for your',
					'akaza-adventure'
				);
				?>
				<span>
					<?php
					esc_html_e(
						'workforce',
						'akaza-adventure'
					);
				?>
				</span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'Deliver training through the arrangement that best fits your learning environment.',
					'akaza-adventure'
				);
				?>
			</p>

		</div>


		<!-- =====================================
		     DELIVERY OPTIONS
		===================================== -->

		<div class="sl-harassment-delivery__grid">

			<?php foreach ( $delivery_options as $option ) : ?>

				<article class="sl-harassment-delivery__item">

					<div class="sl-harassment-delivery__number">
						<?php echo esc_html( $option['number'] ); ?>
					</div>

					<div class="sl-harassment-delivery__content">

						<h3 class="sl-panel-title">
							<?php echo esc_html( $option['title'] ); ?>
						</h3>

						<p>
							<?php echo esc_html( $option['text'] ); ?>
						</p>

					</div>

				</article>

			<?php endforeach; ?>

		</div>


		<!-- =====================================
		     CTA
		===================================== -->

		<div class="sl-content-actions">

			<a
				class="sl-content-btn sl-content-btn-primary"
				href="#contact"
			>
				<?php
				esc_html_e(
					'Request Delivery Details',
					'akaza-adventure'
				);
				?>
				<span aria-hidden="true">→</span>
			</a>

		</div>

	</div>

</section>