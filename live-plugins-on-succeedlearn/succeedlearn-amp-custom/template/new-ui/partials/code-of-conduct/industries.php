<?php
/**
 * Code of Conduct — Industries.
 *
 * @package SucceedLEARN_AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coc_industries       = succeedlearn_amp_get_coc_industries_data();
$coc_industry_items   = $coc_industries['industries'];
$coc_industries_image = $coc_industries['image'];
?>

<section
	class="sl-section sl-coc-industries"
	aria-labelledby="sl-coc-industries-title"
>
	<div class="sl-wrap">

		<div class="sl-coc-industries__heading">
			<span class="sl-home-sub-heading">
				<?php echo esc_html( $coc_industries['eyebrow'] ); ?>
			</span>

			<h2 class="sl-h2" id="sl-coc-industries-title">
				<?php echo esc_html( $coc_industries['title'] ); ?>
				<span>
					<?php echo esc_html( $coc_industries['highlight'] ); ?>
				</span>
			</h2>

			<h3 class="sl-panel-title sl-coc-industries__lead">
				<?php echo esc_html( $coc_industries['lead'] ); ?>
			</h3>
		</div>

		<div class="sl-coc-industries__main">

			<div class="sl-coc-industries__content">
				<p class="sl-coc-industries__intro">
					<?php echo esc_html( $coc_industries['intro'] ); ?>
				</p>

				<ul
					class="sl-coc-industries__list sl-amp-card-grid"
					aria-label="<?php esc_attr_e( 'Industries covered', 'succeedlearn-amp' ); ?>"
				>
					<?php foreach ( $coc_industry_items as $index => $industry ) : ?>
						<li class="sl-coc-industries__item">
							<span
								class="sl-coc-industries__item-index"
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

							<span class="sl-coc-industries__item-label">
								<?php echo esc_html( $industry ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="sl-coc-industries__image">
				<?php if ( ! empty( $coc_industries_image['url'] ) ) : ?>
					<amp-img
						src="<?php echo esc_url( $coc_industries_image['url'] ); ?>"
						alt="<?php echo esc_attr( $coc_industries_image['alt'] ); ?>"
						width="<?php echo esc_attr( (string) $coc_industries_image['width'] ); ?>"
						height="<?php echo esc_attr( (string) $coc_industries_image['height'] ); ?>"
						layout="responsive"
					></amp-img>
				<?php else : ?>
					<div
						class="sl-coc-industries__image-placeholder"
						role="img"
						aria-label="<?php echo esc_attr( $coc_industries_image['alt'] ); ?>"
					>
						<span>
							<?php esc_html_e( 'Image Placeholder', 'succeedlearn-amp' ); ?>
						</span>

						<small>
							<?php esc_html_e( 'Recommended export: 1120 × 1280 px', 'succeedlearn-amp' ); ?>
						</small>
					</div>
				<?php endif; ?>
			</div>

		</div>

		<div class="sl-highlight sl-coc-industries__statement">
			<p>
				<?php echo esc_html( $coc_industries['statement'] ); ?>
			</p>
		</div>

	</div>
</section>