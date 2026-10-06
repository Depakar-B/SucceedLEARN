<?php
/**
 * AML PE/VC AMP: Learning Outcomes.
 *
 * Expected vars: $outcomes
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="learning-outcomes" class="sl-section sl-section--alt sl-aml-pe-vc-learning-outcomes" aria-labelledby="sl-aml-pe-vc-learning-outcomes-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Learning Outcomes', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-aml-pe-vc-learning-outcomes-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'What Will Learners Gain From <span>AML Awareness Training?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'The course builds practical financial crime awareness that learners can apply during onboarding, due diligence and investment-related activity.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<ul class="sl-aml-outcome-list" role="list">
			<?php foreach ( $outcomes as $outcome ) : ?>
				<li class="sl-aml-outcome-list__item">
					<span class="sl-aml-check" aria-hidden="true">✓</span>
					<div>
						<h3 class="sl-panel-title"><?php echo esc_html( $outcome['title'] ); ?></h3>
						<p><?php echo esc_html( $outcome['text'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
