<?php
/**
 * Code of Conduct — Differentiation.
 *
 * @package SucceedLEARN_AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coc_differentiation        = succeedlearn_amp_get_coc_differentiation_data();
$coc_differentiation_groups = $coc_differentiation['groups'];
?>

<section
	class="sl-section sl-coc-differentiation"
	aria-labelledby="sl-coc-differentiation-title"
>
	<div class="sl-wrap">

		<div class="sl-coc-differentiation__heading">
			<span class="sl-home-sub-heading">
				<?php echo esc_html( $coc_differentiation['eyebrow'] ); ?>
			</span>

			<h2 class="sl-h2" id="sl-coc-differentiation-title">
				<?php echo esc_html( $coc_differentiation['title'] ); ?>
				<span>
					<?php echo esc_html( $coc_differentiation['highlight'] ); ?>
				</span>
			</h2>
		</div>

		<div class="sl-coc-differentiation__grid sl-amp-card-grid">
			<?php foreach ( $coc_differentiation_groups as $group ) : ?>
				<?php
				$card_class = 'sl-coc-differentiation__card';

				if ( ! empty( $group['featured'] ) ) {
					$card_class .= ' sl-coc-differentiation__card--featured';
				}
				?>

				<article class="<?php echo esc_attr( $card_class ); ?>">
					<div class="sl-coc-differentiation__card-head">
						<h3 class="sl-panel-title sl-coc-differentiation__card-title">
							<?php echo esc_html( $group['title'] ); ?>
						</h3>
					</div>

					<ul class="sl-list sl-coc-differentiation__list">
						<?php foreach ( $group['items'] as $index => $item ) : ?>
							<li class="sl-list-item sl-coc-differentiation__list-item">
								<span
									class="sl-coc-differentiation__list-index"
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

								<span class="sl-coc-differentiation__list-label">
									<?php echo esc_html( $item ); ?>
								</span>
							</li>
						<?php endforeach; ?>
					</ul>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-highlight sl-coc-differentiation__close">
			<p class="sl-coc-differentiation__close-text">
				<?php echo esc_html( $coc_differentiation['closing'] ); ?>
			</p>

			<div class="sl-coc-differentiation__actions">
				<a
					class="sl-content-btn sl-content-btn-primary"
					href="#contact"
					<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<span class="sl-coc-differentiation__button-text">
						<?php echo esc_html( $coc_differentiation['cta'] ); ?>
					</span>

					<span aria-hidden="true">→</span>
				</a>
			</div>
		</div>

	</div>
</section>