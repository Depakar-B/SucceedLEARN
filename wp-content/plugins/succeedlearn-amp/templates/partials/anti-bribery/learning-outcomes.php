<?php
/**
 * Anti-Bribery AMP: Learning outcomes.
 *
 * Expected vars: $outcomes
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="outcomes" class="sl-section sl-aml-pe-vc-learning-outcomes" aria-labelledby="sl-anti-bribery-learning-outcomes-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Learning Outcomes', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-anti-bribery-learning-outcomes-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'What will employees learn in <span>Anti-Bribery and Anti-Corruption training?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>

			<p>
				<?php esc_html_e( 'By the end of the course, learners will be able to explain corporate bribery, recognise common risk areas and respond in line with law and organisational policy.', 'succeedlearn-amp' ); ?>
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
