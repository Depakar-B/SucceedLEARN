<?php
/**
 * Code of Conduct — Course Coverage grid.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coc_coverage = function_exists( 'succeedlearn_amp_get_coc_coverage_data' )
	? succeedlearn_amp_get_coc_coverage_data()
	: array();

if ( empty( $coc_coverage ) ) {
	return;
}

$coc_coverage_items = ! empty( $coc_coverage['items'] )
	? $coc_coverage['items']
	: array();
?>

<section
	class="sl-section sl-coc-coverage"
	id="course-coverage"
	aria-labelledby="sl-coc-coverage-title"
>
	<div class="sl-wrap">

		<div class="sl-coc-coverage__heading">
			<span class="sl-home-sub-heading">
				<?php echo esc_html( $coc_coverage['eyebrow'] ); ?>
			</span>

			<h2
				id="sl-coc-coverage-title"
				class="sl-h2"
			>
				<?php echo esc_html( $coc_coverage['title'] ); ?>

				<span>
					<?php echo esc_html( $coc_coverage['title_accent'] ); ?>
				</span>
			</h2>

			<p>
				<?php echo esc_html( $coc_coverage['intro'] ); ?>
			</p>
		</div>

		<?php if ( ! empty( $coc_coverage_items ) ) : ?>
			<div class="sl-coc-coverage__grid sl-amp-card-grid">

				<?php foreach ( $coc_coverage_items as $item ) : ?>
					<article class="sl-coc-coverage__card">

						<h3 class="sl-panel-title sl-coc-coverage__card-title">
							<?php echo esc_html( $item['title'] ); ?>
						</h3>

						<p class="sl-coc-coverage__card-text">
							<?php echo esc_html( $item['body'] ); ?>
						</p>

					</article>
				<?php endforeach; ?>

			</div>
		<?php endif; ?>

	</div>
</section>