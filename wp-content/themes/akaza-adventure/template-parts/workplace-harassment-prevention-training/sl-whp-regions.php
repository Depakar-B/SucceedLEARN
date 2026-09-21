<?php
/**
 * SucceedLEARN — Workplace Harassment Prevention
 *
 * Section: Training by Region
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$harassment_regions = array(
	array(
		'number' => '01',
		'text'   => 'Global and multinational workforces.',
	),
	array(
		'number' => '02',
		'text'   => 'Employees and supervisors in the United States.',
	),
	array(
		'number' => '03',
		'text'   => 'Workers in the United Kingdom.',
	),
	array(
		'number' => '04',
		'text'   => 'Employees, managers and Internal Committee members in India.',
	),
);
?>

<section
	class="sl-harassment-regions"
	id="training-by-region"
	aria-labelledby="sl-harassment-regions-title"
>

	<div class="container">

		<div class="sl-harassment-regions__heading">

			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Training Designed Around Your Workforce',
					'akaza-adventure'
				);
				?>
			</span>

			<h2 id="sl-harassment-regions-title">
				<?php
				esc_html_e(
					'Choose from dedicated training',
					'akaza-adventure'
				);
				?>
				<span>
					<?php
					esc_html_e(
						'solutions for every region.',
						'akaza-adventure'
					);
					?>
				</span>
			</h2>

		</div>


		<div class="sl-harassment-regions__grid">

			<?php foreach ( $harassment_regions as $region ) : ?>

				<article class="sl-harassment-regions__card">

					<span class="sl-harassment-regions__number">
						<?php echo esc_html( $region['number'] ); ?>
					</span>

					<p class="sl-harassment-regions__text">
						<?php echo esc_html( $region['text'] ); ?>
					</p>

				</article>

			<?php endforeach; ?>

		</div>


		<div class="sl-harassment-regions__footer">

			<div class="sl-harassment-regions__message">

				<p>
					<?php
					esc_html_e(
						'Build awareness. Clarify responsibilities. Help your people make informed choices when difficult workplace situations arise.',
						'akaza-adventure'
					);
					?>
				</p>

			</div>


			<a
				class="sl-content-btn sl-content-btn-primary sl-harassment-regions__cta"
				href="#contact"
			>
				<?php
				esc_html_e(
					'Request a Demo',
					'akaza-adventure'
				);
				?>
				<span aria-hidden="true">→</span>
			</a>

		</div>

	</div>

</section>