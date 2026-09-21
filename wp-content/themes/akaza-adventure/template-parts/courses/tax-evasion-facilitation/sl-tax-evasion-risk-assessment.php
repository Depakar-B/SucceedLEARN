<?php
/**
 * Preventing the Facilitation of Tax Evasion Training — Tax Evasion Risk Assessment.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$risk_assessment_points = array(
	array(
		'title'       => __( 'Examine internal risks', 'akaza-adventure' ),
		'description' => __( 'Consider where money, decisions and information move through the organisation.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Examine external risks', 'akaza-adventure' ),
		'description' => __( 'Consider jurisdictions, third parties, sectors and complex business relationships.', 'akaza-adventure' ),
	),
	array(
		'title'       => __( 'Prioritise risks', 'akaza-adventure' ),
		'description' => __( 'Consider likelihood and potential impact when deciding where attention is most needed.', 'akaza-adventure' ),
	),
);
?>

<section
	id="risk-assessment"
	class="sl-tax-evasion-risk-assessment"
	aria-labelledby="sl-tax-evasion-risk-assessment-title"
>
	<div class="container">

		<div class="sl-tax-evasion-risk-assessment__grid">

			<!-- Image -->
			<div class="sl-tax-evasion-risk-assessment__media">

				<div class="sl-tax-evasion-risk-assessment__image">

					<div class="sl-tax-evasion-risk-assessment__image-placeholder">
						<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
					</div>

				</div>

			</div>

			<!-- Content -->
			<div class="sl-tax-evasion-risk-assessment__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Tax Evasion Risk Assessment', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-tax-evasion-risk-assessment-title">
					<?php esc_html_e( 'How Can Organisations Identify and Prioritise Tax Evasion', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Facilitation Risk?', 'akaza-adventure' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( 'The course explores how organisations can examine their operating environment, financial processes, customers, jurisdictions, supply chains and third-party relationships when considering potential tax evasion facilitation risk.', 'akaza-adventure' ); ?>
				</p>

				<div class="sl-tax-evasion-risk-assessment__cards">

					<?php foreach ( $risk_assessment_points as $point ) : ?>

						<article class="sl-tax-evasion-risk-assessment__card">

							<h3 class="sl-panel-title">
								<?php echo esc_html( $point['title'] ); ?>
							</h3>

							<p>
								<?php echo esc_html( $point['description'] ); ?>
							</p>

						</article>

					<?php endforeach; ?>

				</div>

			</div>

		</div>

	</div>
</section>