<?php
/**
 * SucceedLEARN
 * AML Training for PE/VC — Control Map
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$rows = array(
	array(
		'step'  => '01',
		'left'  => array(
			'title' => __( 'AML & KYC', 'akaza-adventure' ),
			'text'  => __( 'Recognise money laundering risk and understand identity verification.', 'akaza-adventure' ),
		),
		'right' => array(
			'title' => __( 'UBO Transparency', 'akaza-adventure' ),
			'text'  => __( 'Understand beneficial ownership and recognise opaque ownership structures.', 'akaza-adventure' ),
		),
	),
	array(
		'step'  => '02',
		'left'  => array(
			'title' => __( 'CDD & EDD', 'akaza-adventure' ),
			'text'  => __( 'Understand risk-based due diligence and when enhanced scrutiny may be required.', 'akaza-adventure' ),
		),
		'right' => array(
			'title' => __( 'MLRO & Reporting', 'akaza-adventure' ),
			'text'  => __( 'Understand escalation, suspicious activity reporting and MLRO responsibilities.', 'akaza-adventure' ),
		),
	),
	array(
		'step'  => '03',
		'left'  => array(
			'title' => __( 'UK AML Laws', 'akaza-adventure' ),
			'text'  => __( 'Explore POCA 2002, the Money Laundering Regulations 2017 and SAMLA 2018.', 'akaza-adventure' ),
		),
		'right' => array(
			'title' => __( 'US AML Laws', 'akaza-adventure' ),
			'text'  => __( 'Explore the BSA, USA PATRIOT Act and Anti-Money Laundering Act of 2020.', 'akaza-adventure' ),
		),
	),
	array(
		'step'  => '04',
		'left'  => array(
			'title' => __( 'CFT', 'akaza-adventure' ),
			'text'  => __( 'Understand risks associated with the financing of terrorism.', 'akaza-adventure' ),
		),
		'right' => array(
			'title' => __( 'CPF', 'akaza-adventure' ),
			'text'  => __( 'Understand proliferation financing, sanctions and dual-use risks.', 'akaza-adventure' ),
		),
	),
);
?>

<section
	class="sl-aml-pe-vc-control-map"
	aria-labelledby="sl-aml-pe-vc-control-map-title"
>
	<div class="container">

		<span class="sl-home-sub-heading">
			<?php esc_html_e( 'Course Highlights', 'akaza-adventure' ); ?>
		</span>

		<h2 id="sl-aml-pe-vc-control-map-title">
			<?php
			echo wp_kses_post(
				__(
					'The AML <span>Control Map</span>',
					'akaza-adventure'
				)
			);
			?>
		</h2>

		<p class="sl-aml-pe-vc-control-map__intro">
			<?php
			esc_html_e(
				'See how the course connects identity, beneficial ownership, due diligence, reporting, regulation and wider financial crime risks into one practical AML learning journey.',
				'akaza-adventure'
			);
			?>
		</p>

		<div class="sl-aml-pe-vc-control-map__panel">

			<div class="sl-aml-pe-vc-control-map__panel-title">
				<?php esc_html_e( 'AML Awareness for Investment Professionals', 'akaza-adventure' ); ?>
			</div>

			<?php foreach ( $rows as $row ) : ?>
				<div class="sl-aml-pe-vc-control-map__row">
					<div class="sl-aml-pe-vc-control-map__node sl-aml-pe-vc-control-map__node--left">
						<strong><?php echo esc_html( $row['left']['title'] ); ?></strong>
						<p><?php echo esc_html( $row['left']['text'] ); ?></p>
					</div>

					<div class="sl-aml-pe-vc-control-map__step" aria-hidden="true">
						<span><?php echo esc_html( $row['step'] ); ?></span>
					</div>

					<div class="sl-aml-pe-vc-control-map__node sl-aml-pe-vc-control-map__node--right">
						<strong><?php echo esc_html( $row['right']['title'] ); ?></strong>
						<p><?php echo esc_html( $row['right']['text'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>

			<div class="sl-aml-pe-vc-control-map__summary">
				<strong><?php esc_html_e( 'One connected learning journey:', 'akaza-adventure' ); ?></strong>
				<?php
				esc_html_e(
					'understand the parties involved, recognise financial crime risks, apply due diligence principles and know when concerns need to be escalated.',
					'akaza-adventure'
				);
				?>
			</div>

		</div>

	</div>
</section>
