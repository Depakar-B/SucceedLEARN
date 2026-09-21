<?php
/**
 * Code of Conduct — Reporting.
 *
 * @package SucceedLEARN_AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coc_reporting       = succeedlearn_amp_get_coc_reporting_data();
$coc_reporting_items = $coc_reporting['items'];
$coc_reporting_image = $coc_reporting['image'];
?>

<section
	class="sl-section sl-coc-reporting"
	aria-labelledby="sl-coc-reporting-title"
>
	<div class="sl-wrap">

		<div class="sl-coc-reporting__heading">
			<span class="sl-home-sub-heading">
				<?php echo esc_html( $coc_reporting['eyebrow'] ); ?>
			</span>

			<h2 class="sl-h2" id="sl-coc-reporting-title">
				<?php echo esc_html( $coc_reporting['title'] ); ?>
				<span>
					<?php echo esc_html( $coc_reporting['highlight'] ); ?>
				</span>
			</h2>

			<h3 class="sl-panel-title sl-coc-reporting__lead">
				<?php echo esc_html( $coc_reporting['lead'] ); ?>
			</h3>

			<p>
				<?php echo esc_html( $coc_reporting['intro'] ); ?>
			</p>
		</div>

		<div class="sl-coc-reporting__layout">

			<div class="sl-coc-reporting__card">
				<ul class="sl-list sl-coc-reporting__list">
					<?php foreach ( $coc_reporting_items as $index => $item ) : ?>
						<li class="sl-list-item sl-coc-reporting__list-item">
							<span
								class="sl-coc-reporting__list-index"
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

							<span class="sl-coc-reporting__list-label">
								<?php echo esc_html( $item ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="sl-coc-reporting__media">
				<amp-img
					src="<?php echo esc_url( $coc_reporting_image['url'] ); ?>"
					alt="<?php echo esc_attr( $coc_reporting_image['alt'] ); ?>"
					layout="fill"
				></amp-img>
			</div>

		</div>

		<div class="sl-highlight sl-coc-reporting__close">
			<p class="sl-coc-reporting__close-text">
				<?php echo esc_html( $coc_reporting['closing'] ); ?>
			</p>

			<div class="sl-coc-reporting__actions">
				<a
					class="sl-content-btn sl-content-btn-primary"
					href="#contact"
					<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<?php echo esc_html( $coc_reporting['cta'] ); ?>
					<span aria-hidden="true">→</span>
				</a>
			</div>
		</div>

	</div>
</section>