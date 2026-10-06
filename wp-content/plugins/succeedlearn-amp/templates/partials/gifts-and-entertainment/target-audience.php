<?php
/**
 * Gifts and Entertainment AMP: Target Audience.
 *
 * Expected vars: $audience
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="target-audience" class="sl-section sl-section--alt sl-aml-pe-vc-target-audience" aria-labelledby="sl-gifts-target-audience-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Target Audience', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-gifts-target-audience-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Gifts and Entertainment Training for <span>PE/VC Investment, IR and Compliance Teams</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'The course is relevant to professionals whose roles involve external relationships, commercial decisions, transactions, procurement or investor engagement.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-aml-outcome-list" role="list">
			<?php foreach ( $audience as $item ) : ?>
				<li class="sl-aml-outcome-list__item">
					<span class="sl-aml-number" aria-hidden="true"><?php echo esc_html( $item['num'] ); ?></span>
					<div>
						<h3 class="sl-panel-title"><?php echo esc_html( $item['title'] ); ?></h3>
						<p><?php echo esc_html( $item['text'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
