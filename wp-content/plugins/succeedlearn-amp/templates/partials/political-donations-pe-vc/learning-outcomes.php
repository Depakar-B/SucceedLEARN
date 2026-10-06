<?php
/**
 * Political Donations PE/VC AMP: Learning Outcomes.
 *
 * Expected vars: $outcomes
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="learning-outcomes" class="sl-section sl-section--alt sl-aml-pe-vc-learning-outcomes" aria-labelledby="sl-political-donations-pe-vc-learning-outcomes-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Learning outcomes', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-political-donations-pe-vc-learning-outcomes-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'Compliance Training Outcomes for <span>Investment Management Teams</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'The course helps learners move from basic awareness to practical decision-making around political activity and professional identity.', 'succeedlearn-amp' ); ?>
			</p>
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
