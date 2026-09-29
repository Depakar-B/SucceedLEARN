<?php
/**
 * SucceedLEARN
 * AML Training for PE/VC — Laws
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$uk_laws = array(
	array(
		'year'  => '2002',
		'title' => __( 'Proceeds of Crime Act', 'akaza-adventure' ),
		'text'  => __( 'Addresses criminal property, money laundering offences and the reporting of relevant suspicions.', 'akaza-adventure' ),
	),
	array(
		'year'  => '2017',
		'title' => __( 'Money Laundering Regulations', 'akaza-adventure' ),
		'text'  => __( 'Cover areas including customer due diligence, risk assessment, ongoing monitoring and record keeping.', 'akaza-adventure' ),
	),
	array(
		'year'  => '2018',
		'title' => __( 'Sanctions and Anti-Money Laundering Act', 'akaza-adventure' ),
		'text'  => __( 'Provides an important UK statutory framework for sanctions and anti-money laundering measures.', 'akaza-adventure' ),
	),
);

$us_laws = array(
	array(
		'year'  => '1970',
		'title' => __( 'Bank Secrecy Act', 'akaza-adventure' ),
		'text'  => __( 'A foundational US AML framework involving financial record keeping and reporting requirements.', 'akaza-adventure' ),
	),
	array(
		'year'  => '2001',
		'title' => __( 'USA PATRIOT Act', 'akaza-adventure' ),
		'text'  => __( 'Strengthened US AML controls, including customer identification and due diligence measures.', 'akaza-adventure' ),
	),
	array(
		'year'  => '2020',
		'title' => __( 'Anti-Money Laundering Act', 'akaza-adventure' ),
		'text'  => __( 'Modernised elements of the US AML framework and strengthened its focus on transparency.', 'akaza-adventure' ),
	),
);

?>

<section
	id="laws"
	class="sl-aml-pe-vc-laws"
	aria-labelledby="sl-aml-pe-vc-laws-title"
>
	<div class="container">

		<span class="sl-home-sub-heading">
			<?php esc_html_e( 'AML Legal & Regulatory Framework', 'akaza-adventure' ); ?>
		</span>

		<h2 id="sl-aml-pe-vc-laws-title">
			<?php
			echo wp_kses_post(
				__(
					'UK and US Anti-Money Laundering Laws <span>Covered in the Course</span>',
					'akaza-adventure'
				)
			);
			?>
		</h2>

		<p class="sl-aml-pe-vc-laws__intro">
			<?php
			esc_html_e(
				'Learners gain awareness of important AML legislation and how these frameworks relate to due diligence, monitoring, sanctions and financial crime reporting.',
				'akaza-adventure'
			);
			?>
		</p>

		<div class="sl-aml-pe-vc-laws__stage">

			<div class="sl-aml-pe-vc-laws__track">
				<div class="sl-aml-pe-vc-laws__track-head">
					<span class="sl-aml-pe-vc-laws__label"><?php esc_html_e( 'UK AML Framework', 'akaza-adventure' ); ?></span>
					<span class="sl-aml-pe-vc-laws__country"><?php esc_html_e( 'UK', 'akaza-adventure' ); ?></span>
				</div>

				<?php foreach ( $uk_laws as $law ) : ?>
					<div class="sl-aml-pe-vc-laws__event">
						<div class="sl-aml-pe-vc-laws__year"><?php echo esc_html( $law['year'] ); ?></div>
						<div>
							<h3><?php echo esc_html( $law['title'] ); ?></h3>
							<p><?php echo esc_html( $law['text'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="sl-aml-pe-vc-laws__track sl-aml-pe-vc-laws__track--us">
				<div class="sl-aml-pe-vc-laws__track-head">
					<span class="sl-aml-pe-vc-laws__label"><?php esc_html_e( 'US AML Framework', 'akaza-adventure' ); ?></span>
					<span class="sl-aml-pe-vc-laws__country"><?php esc_html_e( 'US', 'akaza-adventure' ); ?></span>
				</div>

				<?php foreach ( $us_laws as $law ) : ?>
					<div class="sl-aml-pe-vc-laws__event">
						<div class="sl-aml-pe-vc-laws__year"><?php echo esc_html( $law['year'] ); ?></div>
						<div>
							<h3><?php echo esc_html( $law['title'] ); ?></h3>
							<p><?php echo esc_html( $law['text'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

		</div>

	</div>
</section>
