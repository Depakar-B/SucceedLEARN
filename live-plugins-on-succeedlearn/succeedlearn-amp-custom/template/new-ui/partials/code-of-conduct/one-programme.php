<?php
/**
 * Code of Conduct — One Programme.
 *
 * @package SucceedLEARN_AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coc_one_programme       = succeedlearn_amp_get_coc_one_programme_data();
$coc_one_programme_items = $coc_one_programme['items'];
?>

<section
	class="sl-section sl-coc-one-programme"
	aria-labelledby="sl-coc-one-programme-title"
>
	<div class="sl-wrap">

		<div class="sl-coc-one-programme__heading">
			<span class="sl-home-sub-heading">
				<?php echo esc_html( $coc_one_programme['eyebrow'] ); ?>
			</span>

			<h2 class="sl-h2" id="sl-coc-one-programme-title">
				<?php echo esc_html( $coc_one_programme['title'] ); ?>
				<span>
					<?php echo esc_html( $coc_one_programme['highlight'] ); ?>
				</span>
			</h2>

			<p>
				<?php echo esc_html( $coc_one_programme['intro'] ); ?>
			</p>
		</div>

		<div class="sl-coc-one-programme__grid sl-amp-card-grid">
			<?php foreach ( $coc_one_programme_items as $item ) : ?>
				<?php
				$card_class = 'sl-coc-one-programme__card';

				if ( ! empty( $item['featured'] ) ) {
					$card_class .= ' sl-coc-one-programme__card--featured';
				}
				?>

				<article class="<?php echo esc_attr( $card_class ); ?>">
					<div class="sl-coc-one-programme__card-heading">
						<div class="sl-coc-one-programme__icon" aria-hidden="true">

							<?php if ( 'programme' === $item['icon'] ) : ?>
								<svg viewBox="0 0 24 24" focusable="false">
									<path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6l7-3z" />
									<path d="M8.5 12l2.3 2.3 4.7-5" />
								</svg>

							<?php elseif ( 'hr' === $item['icon'] ) : ?>
								<svg viewBox="0 0 24 24" focusable="false">
									<circle cx="12" cy="8" r="3" />
									<path d="M5 20c0-3.5 3-6 7-6s7 2.5 7 6" />
								</svg>

							<?php elseif ( 'compliance' === $item['icon'] ) : ?>
								<svg viewBox="0 0 24 24" focusable="false">
									<rect x="6" y="3" width="12" height="18" rx="1.5" />
									<path d="M9 7h6M9 11h6M9 15h4" />
								</svg>

							<?php elseif ( 'learning' === $item['icon'] ) : ?>
								<svg viewBox="0 0 24 24" focusable="false">
									<rect x="4" y="5" width="16" height="12" rx="1.5" />
									<path d="M8 21h8M12 17v4M8 9h8M8 12h5" />
								</svg>

							<?php elseif ( 'employees' === $item['icon'] ) : ?>
								<svg viewBox="0 0 24 24" focusable="false">
									<circle cx="9" cy="8" r="3" />
									<circle cx="17" cy="10" r="2.5" />
									<path d="M3 20c0-3.5 2.5-6 6-6s6 2.5 6 6" />
									<path d="M15 15c3 0 5 2 5 5" />
								</svg>

							<?php else : ?>
								<svg viewBox="0 0 24 24" focusable="false">
									<path d="M4 20V9h16v11" />
									<path d="M8 9V5h8v4M7 13h2M11 13h2M15 13h2M7 17h2M11 17h2M15 17h2" />
								</svg>
							<?php endif; ?>

						</div>

						<h3 class="sl-panel-title sl-coc-one-programme__card-title">
							<?php echo esc_html( $item['title'] ); ?>
						</h3>
					</div>

					<p>
						<?php echo esc_html( $item['text'] ); ?>
					</p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>