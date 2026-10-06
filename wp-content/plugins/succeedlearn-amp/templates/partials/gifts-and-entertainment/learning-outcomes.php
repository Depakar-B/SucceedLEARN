<?php
/**
 * Gifts and Entertainment AMP: Learning Outcomes.
 *
 * Expected vars: $images, $outcomes
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="learning-outcomes" class="sl-section sl-aml-pe-vc-learning-outcomes" aria-labelledby="sl-gifts-learning-outcomes-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Learning outcomes', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-gifts-learning-outcomes-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Gifts and Entertainment Training <span>Learning Outcomes for PE/VC Teams</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<div class="sl-aml-media">
			<div class="sl-aml-image">
				<amp-img
					src="<?php echo esc_url( $images['learning_outcomes'] ); ?>"
					width="1200"
					height="900"
					layout="responsive"
					alt="<?php esc_attr_e( 'Gifts and entertainment training learning outcomes visual', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<ul class="sl-aml-outcome-list" role="list">
			<?php foreach ( $outcomes as $outcome ) : ?>
				<li class="sl-aml-outcome-list__item">
					<span class="sl-aml-number" aria-hidden="true"><?php echo esc_html( $outcome['num'] ); ?></span>
					<div>
						<h3 class="sl-panel-title"><?php echo esc_html( $outcome['title'] ); ?></h3>
						<p><?php echo esc_html( $outcome['text'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
