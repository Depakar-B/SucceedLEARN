<?php
/**
 * SucceedLEARN
 * AML Training for PE/VC — Due Diligence / CFT / CPF
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$kyc_cards = array(
	array(
		'title' => __( 'KYC', 'akaza-adventure' ),
		'text'  => __( 'Identify and verify relevant parties and UBOs.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'CDD', 'akaza-adventure' ),
		'text'  => __( 'Consider ownership, purpose, funding and risk.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'EDD', 'akaza-adventure' ),
		'text'  => __( 'Apply deeper scrutiny to higher-risk relationships.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Periodic Review', 'akaza-adventure' ),
		'text'  => __( 'Reassess relationships when circumstances or risk change.', 'akaza-adventure' ),
	),
);

$cft_cards = array(
	array(
		'title' => __( 'CFT', 'akaza-adventure' ),
		'text'  => __( 'Recognise terrorist financing risks.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'CPF', 'akaza-adventure' ),
		'text'  => __( 'Recognise proliferation financing risks.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Sanctions', 'akaza-adventure' ),
		'text'  => __( 'Consider sanctioned parties and jurisdictions.', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Dual-Use Risk', 'akaza-adventure' ),
		'text'  => __( 'Recognise risks involving dual-use technologies.', 'akaza-adventure' ),
	),
);
?>

<section
	class="sl-aml-pe-vc-due-diligence"
	aria-labelledby="sl-aml-pe-vc-due-diligence-title"
>
	<div class="container">

		<span class="sl-home-sub-heading">
			<?php esc_html_e( 'Risk-Based Financial Crime Awareness', 'akaza-adventure' ); ?>
		</span>

		<h2 id="sl-aml-pe-vc-due-diligence-title">
			<?php
			echo wp_kses_post(
				__(
					'From Investor Due Diligence to <span>Wider Financial Crime Risk</span>',
					'akaza-adventure'
				)
			);
			?>
		</h2>

		<p class="sl-aml-pe-vc-due-diligence__intro">
			<?php
			esc_html_e(
				'The course connects due diligence with wider financial crime awareness, helping learners consider both who they are dealing with and the risks behind a relationship or transaction.',
				'akaza-adventure'
			);
			?>
		</p>

		<div class="sl-aml-pe-vc-due-diligence__framework">

			<div class="sl-aml-pe-vc-due-diligence__column sl-aml-pe-vc-due-diligence__column--primary">
				<h3><?php esc_html_e( 'KYC, CDD & EDD', 'akaza-adventure' ); ?></h3>
				<p>
					<?php
					esc_html_e(
						'Identity, beneficial ownership, source of funds and jurisdictional risk can influence the level of due diligence applied.',
						'akaza-adventure'
					);
					?>
				</p>
				<div class="sl-aml-pe-vc-due-diligence__mini-grid">
					<?php foreach ( $kyc_cards as $card ) : ?>
						<div class="sl-aml-pe-vc-due-diligence__mini-card">
							<strong><?php echo esc_html( $card['title'] ); ?></strong>
							<span><?php echo esc_html( $card['text'] ); ?></span>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="sl-aml-pe-vc-due-diligence__column sl-aml-pe-vc-due-diligence__column--secondary">
				<h3><?php esc_html_e( 'CFT & CPF', 'akaza-adventure' ); ?></h3>
				<p>
					<?php
					esc_html_e(
						'AML awareness also extends to terrorist financing, proliferation financing, sanctions exposure and dual-use risks.',
						'akaza-adventure'
					);
					?>
				</p>
				<div class="sl-aml-pe-vc-due-diligence__mini-grid">
					<?php foreach ( $cft_cards as $card ) : ?>
						<div class="sl-aml-pe-vc-due-diligence__mini-card">
							<strong><?php echo esc_html( $card['title'] ); ?></strong>
							<span><?php echo esc_html( $card['text'] ); ?></span>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

		</div>

	</div>
</section>
