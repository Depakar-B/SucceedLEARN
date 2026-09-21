<?php
/**
 * Code of Conduct — AMP Hero Section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-section sl-code-of-conduct-hero"
	aria-labelledby="sl-code-of-conduct-hero-title"
>
	<div class="sl-wrap">

		<amp-state id="cocAssessment">
			<script type="application/json">
				{
					"answer": ""
				}
			</script>
		</amp-state>

		<div class="sl-code-of-conduct-hero__grid">

			<!-- Column 1: Hero content -->
			<div class="sl-code-of-conduct-hero__content">

				<?php
				if ( function_exists( 'succeedlearn_amp_render_hero_breadcrumbs' ) ) {
					succeedlearn_amp_render_hero_breadcrumbs(
						__( 'Code of Conduct', 'succeedlearn-amp' )
					);
				}
				?>

				<span class="sl-home-sub-heading">
					<?php
					esc_html_e(
						'Interactive compliance learning',
						'succeedlearn-amp'
					);
					?>
				</span>

				<h1 id="sl-code-of-conduct-hero-title">
					<?php
					echo wp_kses(
						sprintf(
							/* translators: %s: highlighted word "policy". */
							__(
								'Interactive Code of Conduct eLearning training that turns %s into everyday behavior',
								'succeedlearn-amp'
							),
							'<span class="sl-code-of-conduct-hero__highlight">' .
								esc_html__( 'policy', 'succeedlearn-amp' ) .
							'</span>'
						),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					);
					?>
				</h1>

				<p class="sl-code-of-conduct-hero__lead">
					<?php
					esc_html_e(
						'Build a workplace where employees understand not only what your Code of Conduct says, but how to apply it when real situations arise.',
						'succeedlearn-amp'
					);
					?>
				</p>

				<div class="sl-code-of-conduct-hero__actions sl-hero-actions">

					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-primary"
						data-cta="coc-hero-brochure"
						<?php
						echo succeedlearn_amp_scroll_tap_attr( 'brochure' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					>
						<?php
						esc_html_e(
							'Download Brochure',
							'succeedlearn-amp'
						);
						?>
					</button>

					<button
						type="button"
						class="sl-hero-btn sl-hero-btn-secondary"
						data-cta="coc-hero-preview"
						<?php
						echo succeedlearn_amp_scroll_tap_attr( 'preview' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					>
						<?php
						esc_html_e(
							'Watch Course Preview',
							'succeedlearn-amp'
						);
						?>

						<svg
							class="sl-code-of-conduct-hero__button-icon"
							width="12"
							height="14"
							viewBox="0 0 12 14"
							fill="currentColor"
							aria-hidden="true"
							focusable="false"
						>
							<path d="M0 0v14l12-7L0 0z"></path>
						</svg>
					</button>

				</div>
			</div>

			<!-- Column 2: AMP interactive assessment -->
			<article
				class="sl-code-of-conduct-hero__assessment"
				aria-labelledby="sl-code-of-conduct-assessment-title"
			>
				<div class="sl-code-of-conduct-hero__assessment-top">
					<span class="sl-code-of-conduct-hero__assessment-category">
						<?php
						esc_html_e(
							'Gifts and Hospitality',
							'succeedlearn-amp'
						);
						?>
					</span>

					<span class="sl-code-of-conduct-hero__assessment-label">
						<?php
						esc_html_e(
							'Decision point',
							'succeedlearn-amp'
						);
						?>
					</span>
				</div>

				<h2
					id="sl-code-of-conduct-assessment-title"
					class="sl-panel-title sl-code-of-conduct-hero__question"
				>
					<?php
					esc_html_e(
						'A supplier participating in a tender sends you an expensive gift. What should you do?',
						'succeedlearn-amp'
					);
					?>
				</h2>

				<div
					class="sl-code-of-conduct-hero__options"
					aria-label="<?php esc_attr_e( 'Choose an answer', 'succeedlearn-amp' ); ?>"
				>
					<button
						type="button"
						class="sl-code-of-conduct-hero__option"
						on="tap:AMP.setState({cocAssessment:{answer:'wrong-one'}})"
						[class]="'sl-code-of-conduct-hero__option' + (cocAssessment.answer == 'wrong-one' ? ' is-selected is-incorrect' : '')"
					>
						<span class="sl-code-of-conduct-hero__option-marker" aria-hidden="true"></span>

						<span class="sl-code-of-conduct-hero__option-text">
							<?php
							esc_html_e(
								'Accept it because the tender decision is not final.',
								'succeedlearn-amp'
							);
							?>
						</span>
					</button>

					<button
						type="button"
						class="sl-code-of-conduct-hero__option"
						on="tap:AMP.setState({cocAssessment:{answer:'correct'}})"
						[class]="'sl-code-of-conduct-hero__option' + (cocAssessment.answer == 'correct' ? ' is-selected is-correct' : '')"
					>
						<span class="sl-code-of-conduct-hero__option-marker" aria-hidden="true"></span>

						<span class="sl-code-of-conduct-hero__option-text">
							<?php
							esc_html_e(
								'Decline it and disclose the situation.',
								'succeedlearn-amp'
							);
							?>
						</span>
					</button>

					<button
						type="button"
						class="sl-code-of-conduct-hero__option"
						on="tap:AMP.setState({cocAssessment:{answer:'wrong-two'}})"
						[class]="'sl-code-of-conduct-hero__option' + (cocAssessment.answer == 'wrong-two' ? ' is-selected is-incorrect' : '')"
					>
						<span class="sl-code-of-conduct-hero__option-marker" aria-hidden="true"></span>

						<span class="sl-code-of-conduct-hero__option-text">
							<?php
							esc_html_e(
								'Accept it once the tender is complete.',
								'succeedlearn-amp'
							);
							?>
						</span>
					</button>
				</div>

				<p
					class="sl-code-of-conduct-hero__feedback sl-code-of-conduct-hero__feedback--success"
					hidden
					[hidden]="cocAssessment.answer != 'correct'"
					aria-live="polite"
				>
					<strong>
						<?php esc_html_e( 'Good decision.', 'succeedlearn-amp' ); ?>
					</strong>

					<?php
					esc_html_e(
						'Declining and disclosing helps protect the integrity of the tender process and avoids an actual or perceived conflict.',
						'succeedlearn-amp'
					);
					?>
				</p>

				<p
					class="sl-code-of-conduct-hero__feedback sl-code-of-conduct-hero__feedback--retry"
					hidden
					[hidden]="cocAssessment.answer == '' || cocAssessment.answer == 'correct'"
					aria-live="polite"
				>
					<strong>
						<?php esc_html_e( 'Think again.', 'succeedlearn-amp' ); ?>
					</strong>

					<?php
					esc_html_e(
						'The gift could influence, or appear to influence, an active business decision.',
						'succeedlearn-amp'
					);
					?>
				</p>
			</article>

		</div>
	</div>
</section>