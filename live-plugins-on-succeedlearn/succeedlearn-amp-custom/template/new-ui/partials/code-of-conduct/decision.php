<?php
/**
 * Code of Conduct — Decision-Based Interactive Experience.
 *
 * AMP card version.
 *
 * @package SucceedLEARN_AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coc_decision           = succeedlearn_amp_get_coc_decision_data();
$coc_decision_scenarios = $coc_decision['scenarios'];
$coc_decision_closing   = $coc_decision['closing'];
?>

<section
	class="sl-section sl-coc-decision"
	aria-labelledby="sl-coc-decision-title"
>
	<div class="sl-wrap">

		<div class="sl-coc-decision__heading">
			<span class="sl-home-sub-heading">
				<?php echo esc_html( $coc_decision['eyebrow'] ); ?>
			</span>

			<h2 class="sl-h2" id="sl-coc-decision-title">
				<?php echo esc_html( $coc_decision['title'] ); ?>
				<span>
					<?php echo esc_html( $coc_decision['highlight'] ); ?>
				</span>
			</h2>

			<p>
				<?php echo esc_html( $coc_decision['intro'] ); ?>
			</p>
		</div>

		<div class="sl-coc-decision__grid sl-amp-card-grid">
			<?php foreach ( $coc_decision_scenarios as $scenario ) : ?>
				<article class="sl-coc-decision__card">

					<div class="sl-coc-decision__card-top">
						<span class="sl-coc-decision__number">
							<?php
							printf(
								/* translators: %s: scenario number. */
								esc_html__( 'Scenario %s', 'succeedlearn-amp' ),
								esc_html( $scenario['number'] )
							);
							?>
						</span>

						<span class="sl-coc-decision__description">
							<?php echo esc_html( $scenario['description'] ); ?>
						</span>
					</div>

					<h3 class="sl-panel-title sl-coc-decision__card-title">
						<?php echo esc_html( $scenario['title'] ); ?>
					</h3>

					<div class="sl-coc-decision__section">
						<span class="sl-coc-decision__section-label">
							<?php esc_html_e( 'The Situation', 'succeedlearn-amp' ); ?>
						</span>

						<p class="sl-coc-decision__section-text">
							<?php echo esc_html( $scenario['situation'] ); ?>
						</p>
					</div>

					<div class="sl-coc-decision__section">
						<span class="sl-coc-decision__section-label">
							<?php esc_html_e( 'Decision Point', 'succeedlearn-amp' ); ?>
						</span>

						<p class="sl-coc-decision__question">
							<?php echo esc_html( $scenario['question'] ); ?>
						</p>
					</div>

					<div class="sl-coc-decision__feedback">
						<span class="sl-coc-decision__section-label">
							<?php esc_html_e( 'Learning Feedback', 'succeedlearn-amp' ); ?>
						</span>

						<p class="sl-coc-decision__feedback-text">
							<?php echo esc_html( $scenario['answer'] ); ?>
						</p>
					</div>

				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-highlight sl-coc-decision__close">
			<p class="sl-coc-decision__close-text">
				<?php echo esc_html( $coc_decision_closing['prefix'] ); ?>
				<strong><?php echo esc_html( $coc_decision_closing['emphasis'] ); ?></strong><?php echo esc_html( $coc_decision_closing['suffix'] ); ?>
			</p>
		</div>

	</div>
</section>