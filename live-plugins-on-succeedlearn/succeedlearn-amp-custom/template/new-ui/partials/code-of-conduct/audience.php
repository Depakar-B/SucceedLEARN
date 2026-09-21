<?php
/**
 * Code of Conduct — Audience.
 *
 * @package SucceedLEARN_AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coc_audience       = succeedlearn_amp_get_coc_audience_data();
$coc_audience_items = $coc_audience['items'];
?>

<section
	class="sl-section sl-coc-audience"
	aria-labelledby="sl-coc-audience-title"
>
	<div class="sl-wrap">

		<div class="sl-coc-audience__heading">
			<span class="sl-home-sub-heading">
				<?php echo esc_html( $coc_audience['eyebrow'] ); ?>
			</span>

			<h2 class="sl-h2" id="sl-coc-audience-title">
				<?php echo esc_html( $coc_audience['title'] ); ?>
				<span>
					<?php echo esc_html( $coc_audience['highlight'] ); ?>
				</span>
			</h2>

			<p>
				<?php echo esc_html( $coc_audience['intro'] ); ?>
			</p>
		</div>

		<div class="sl-coc-audience__content">
			<h3 class="sl-panel-title sl-coc-audience__list-title">
				<?php echo esc_html( $coc_audience['list_title'] ); ?>
			</h3>

			<div class="sl-coc-audience__grid sl-amp-card-grid">
				<?php foreach ( $coc_audience_items as $item ) : ?>
					<article class="sl-coc-audience__card">
						<h3 class="sl-panel-title sl-coc-audience__card-title">
							<?php echo esc_html( $item['title'] ); ?>
						</h3>

						<p>
							<?php echo esc_html( $item['text'] ); ?>
						</p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>

	</div>
</section>