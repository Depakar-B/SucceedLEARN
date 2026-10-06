<?php
/**
 * AML PE/VC AMP: UK and US AML Laws.
 *
 * Expected vars: $laws
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$uk_laws = isset( $laws['uk'] ) ? $laws['uk'] : array();
$us_laws = isset( $laws['us'] ) ? $laws['us'] : array();
?>
<section id="laws" class="sl-section sl-aml-pe-vc-laws" aria-labelledby="sl-aml-pe-vc-laws-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'AML Legal & Regulatory Framework', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-aml-pe-vc-laws-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'UK and US Anti-Money Laundering Laws <span>Covered in the Course</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'Learners gain awareness of important AML legislation and how these frameworks relate to due diligence, monitoring, sanctions and financial crime reporting.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<div class="sl-aml-laws-track">
			<div class="sl-aml-laws-track__head">
				<span class="sl-aml-laws-track__label"><?php esc_html_e( 'UK AML Framework', 'succeedlearn-amp' ); ?></span>
				<span class="sl-aml-laws-track__country"><?php esc_html_e( 'UK', 'succeedlearn-amp' ); ?></span>
			</div>
			<?php foreach ( $uk_laws as $law ) : ?>
				<article class="sl-aml-laws-event">
					<span class="sl-aml-laws-event__year"><?php echo esc_html( $law['year'] ); ?></span>
					<div>
						<h3 class="sl-panel-title"><?php echo esc_html( $law['title'] ); ?></h3>
						<p><?php echo esc_html( $law['text'] ); ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-aml-laws-track sl-aml-laws-track--us">
			<div class="sl-aml-laws-track__head">
				<span class="sl-aml-laws-track__label"><?php esc_html_e( 'US AML Framework', 'succeedlearn-amp' ); ?></span>
				<span class="sl-aml-laws-track__country"><?php esc_html_e( 'US', 'succeedlearn-amp' ); ?></span>
			</div>
			<?php foreach ( $us_laws as $law ) : ?>
				<article class="sl-aml-laws-event">
					<span class="sl-aml-laws-event__year"><?php echo esc_html( $law['year'] ); ?></span>
					<div>
						<h3 class="sl-panel-title"><?php echo esc_html( $law['title'] ); ?></h3>
						<p><?php echo esc_html( $law['text'] ); ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
