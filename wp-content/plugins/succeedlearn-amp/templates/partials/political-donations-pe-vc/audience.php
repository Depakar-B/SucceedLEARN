<?php
/**
 * Political Donations PE/VC AMP: Target Audience.
 *
 * Expected vars: $audiences
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="target-audience" class="sl-section sl-aml-pe-vc-audience" aria-labelledby="sl-political-donations-pe-vc-audience-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Target audience', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-political-donations-pe-vc-audience-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Who Should Take Political Contributions and <span>Anti-Bribery Training?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'This course is relevant to professionals whose role may intersect with political, public-sector, investor or portfolio-company relationships.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-aml-outcome-list" role="list">
			<?php foreach ( $audiences as $audience ) : ?>
				<li class="sl-aml-outcome-list__item">
					<span class="sl-aml-number" aria-hidden="true"><?php echo esc_html( $audience['num'] ); ?></span>
					<div>
						<h3 class="sl-panel-title"><?php echo esc_html( $audience['title'] ); ?></h3>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
