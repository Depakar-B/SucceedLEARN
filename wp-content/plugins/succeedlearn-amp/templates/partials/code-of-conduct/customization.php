<?php
/**
 * Code of Conduct — Customization.
 *
 * @package SucceedLEARN_AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coc_customization       = succeedlearn_amp_get_coc_customization_data();
$coc_customization_items = $coc_customization['items'];
$coc_customization_image = $coc_customization['image'];
?>

<section
	class="sl-section sl-coc-customization"
	aria-labelledby="sl-coc-customization-title"
>
	<div class="sl-wrap">

		<div class="sl-coc-customization__heading">
			<span class="sl-home-sub-heading">
				<?php echo esc_html( $coc_customization['eyebrow'] ); ?>
			</span>

			<h2 class="sl-h2" id="sl-coc-customization-title">
				<?php echo esc_html( $coc_customization['title'] ); ?>
				<span>
					<?php echo esc_html( $coc_customization['highlight'] ); ?>
				</span>
			</h2>

			<p>
				<?php echo esc_html( $coc_customization['intro'] ); ?>
			</p>
		</div>

		<h3 class="sl-panel-title sl-coc-customization__list-title">
			<?php echo esc_html( $coc_customization['list_title'] ); ?>
		</h3>

		<div class="sl-coc-customization__layout">

			<div class="sl-coc-customization__list-box">
				<ul class="sl-list sl-coc-customization__list">
					<?php foreach ( $coc_customization_items as $index => $item ) : ?>
						<li class="sl-list-item sl-coc-customization__list-item">
							<span
								class="sl-coc-customization__list-index"
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

							<span class="sl-coc-customization__list-label">
								<?php echo esc_html( $item ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="sl-coc-customization__media">
				<amp-img
					src="<?php echo esc_url( $coc_customization_image['url'] ); ?>"
					alt="<?php echo esc_attr( $coc_customization_image['alt'] ); ?>"
					width="<?php echo esc_attr( (string) $coc_customization_image['width'] ); ?>"
					height="<?php echo esc_attr( (string) $coc_customization_image['height'] ); ?>"
					layout="responsive"
				></amp-img>
			</div>

		</div>

		<div class="sl-highlight sl-coc-customization__close">
			<p class="sl-coc-customization__close-text">
				<?php echo esc_html( $coc_customization['closing'] ); ?>
			</p>

			<div class="sl-coc-customization__actions">
				<a
					class="sl-content-btn sl-content-btn-primary"
					href="#contact"
					<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				>
					<?php echo esc_html( $coc_customization['cta'] ); ?>
					<span aria-hidden="true">→</span>
				</a>
			</div>
		</div>

	</div>
</section>