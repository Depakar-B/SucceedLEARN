<?php
/**
 * Financial Crime Prevention — Why it matters now section.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$statistics = array(
	array(
		'value'  => '5%',
		'text'   => __( 'Certified Fraud Examiners estimate that organisations lose 5% of revenue to fraud each year.', 'akaza-adventure' ),
		'source' => __( 'Source: ACFE Report to the Nations 2024', 'akaza-adventure' ),
	),
	array(
		'value'  => '43%',
		'text'   => __( 'ACFE reported that 43% of occupational fraud cases examined were detected through tips, with employees providing more than half of those tips.', 'akaza-adventure' ),
		'source' => __( 'Source: ACFE Report to the Nations 2024', 'akaza-adventure' ),
	),
	array(
		'value'  => '$500m+',
		'text'   => __( 'INTERPOL reported that its I-GRIP mechanism had helped member countries intercept more than US$500 million in criminal proceeds since 2022.', 'akaza-adventure' ),
		'source' => __( 'Source: INTERPOL Global Financial Fraud Assessment', 'akaza-adventure' ),
	),
);
?>
<section
	id="why-it-matters"
	class="sl-fcp-statistics"
	aria-labelledby="sl-fcp-statistics-title"
>
	<div class="container">

		<div class="sl-fcp-statistics__heading">
			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Why it matters now', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-fcp-statistics-title">
				<?php esc_html_e( 'Why Financial Crime Prevention Matters Now', 'akaza-adventure' ); ?>
			</h2>

			<h3>
				<?php esc_html_e( 'These figures show why employee awareness remains an important part of wider organisational controls.', 'akaza-adventure' ); ?>
			</h3>
		</div>

		<div class="sl-fcp-statistics__grid">
			<?php foreach ( $statistics as $stat ) : ?>
				<article class="sl-fcp-statistics__card">
					<div class="sl-fcp-statistics__value">
						<?php echo esc_html( $stat['value'] ); ?>
					</div>

					<p class="sl-fcp-statistics__text">
						<?php echo esc_html( $stat['text'] ); ?>
					</p>

					<p class="sl-fcp-statistics__source">
						<?php echo esc_html( $stat['source'] ); ?>
					</p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
