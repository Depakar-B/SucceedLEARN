<?php
/**
 * Code of Conduct — Business Problem section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coc_problem = function_exists( 'succeedlearn_amp_get_coc_problem_data' )
	? succeedlearn_amp_get_coc_problem_data()
	: array();

if ( empty( $coc_problem ) ) {
	return;
}

$coc_problem_cards = ! empty( $coc_problem['cards'] )
	? $coc_problem['cards']
	: array();

$coc_problem_closing = ! empty( $coc_problem['closing'] )
	? $coc_problem['closing']
	: array();
?>

<section
	class="sl-section sl-coc-problem"
	aria-labelledby="sl-coc-problem-title"
>
	<div class="sl-wrap">

		<div class="sl-coc-problem__heading">
			<span class="sl-home-sub-heading">
				<?php echo esc_html( $coc_problem['eyebrow'] ); ?>
			</span>

			<h2
				id="sl-coc-problem-title"
				class="sl-h2"
			>
				<?php echo esc_html( $coc_problem['title'] ); ?>

				<span>
					<?php echo esc_html( $coc_problem['title_accent'] ); ?>
				</span>
			</h2>

			<p>
				<?php echo esc_html( $coc_problem['intro'] ); ?>
			</p>
		</div>

		<?php if ( ! empty( $coc_problem_cards ) ) : ?>
			<div class="sl-coc-problem__grid sl-amp-card-grid">

				<?php foreach ( $coc_problem_cards as $index => $card ) : ?>
					<article class="sl-coc-problem__card">

						<span
							class="sl-coc-problem__number"
							aria-hidden="true"
						>
							<?php
							echo esc_html(
								str_pad(
									(string) ( $index + 1 ),
									2,
									'0',
									STR_PAD_LEFT
								)
							);
							?>
						</span>

						<h3 class="sl-panel-title sl-coc-problem__card-title">
							<?php echo esc_html( $card['title'] ); ?>
						</h3>

						<p class="sl-coc-problem__card-text">
							<?php echo esc_html( $card['text'] ); ?>
						</p>

					</article>
				<?php endforeach; ?>

			</div>
		<?php endif; ?>

		<?php if ( ! empty( $coc_problem_closing ) ) : ?>
			<div class="sl-highlight sl-coc-problem__close">

				<p class="sl-coc-problem__close-text">
					<?php echo esc_html( $coc_problem_closing['text'] ); ?>
				</p>

				<div class="sl-coc-problem__close-actions">
					<button
						type="button"
						class="sl-content-btn sl-content-btn-primary"
						data-cta="<?php echo esc_attr( $coc_problem_closing['data_cta'] ); ?>"
						<?php
						echo succeedlearn_amp_scroll_tap_attr(
							$coc_problem_closing['target']
						); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					>
						<?php echo esc_html( $coc_problem_closing['button'] ); ?>

						<span aria-hidden="true">→</span>
					</button>
				</div>

			</div>
		<?php endif; ?>

	</div>
</section>