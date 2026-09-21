<?php
/**
 * Code of Conduct — Learning Experience.
 *
 * @package SucceedLEARN_AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coc_learning       = succeedlearn_amp_get_coc_learning_data();
$coc_learning_items = $coc_learning['items'];
?>

<section
	class="sl-section sl-coc-learning"
	aria-labelledby="sl-coc-learning-title"
>
	<div class="sl-wrap">

		<div class="sl-coc-learning__heading">
			<span class="sl-home-sub-heading">
				<?php echo esc_html( $coc_learning['eyebrow'] ); ?>
			</span>

			<h2 class="sl-h2" id="sl-coc-learning-title">
				<?php echo esc_html( $coc_learning['title'] ); ?>
				<span><?php echo esc_html( $coc_learning['highlight'] ); ?></span>
				<?php echo esc_html( $coc_learning['title_end'] ); ?>
			</h2>

			<p>
				<?php echo esc_html( $coc_learning['intro'] ); ?>
			</p>
		</div>

		<div class="sl-coc-learning__grid sl-amp-card-grid">
			<?php foreach ( $coc_learning_items as $item ) : ?>
				<article class="sl-coc-learning__card">

					<div class="sl-coc-learning__icon" aria-hidden="true">
						<?php if ( 'scenario' === $item['icon'] ) : ?>
							<svg viewBox="0 0 32 32" focusable="false">
								<path d="M16 4c-4.4 0-8 3.3-8 7.5 0 2.7 1.5 4.7 3.3 6.2.9.8 1.5 1.8 1.5 3V22h6.4v-1.3c0-1.2.6-2.2 1.5-3 1.8-1.5 3.3-3.5 3.3-6.2C24 7.3 20.4 4 16 4Z" />
								<path d="M13 25h6M14 28h4" />
							</svg>

						<?php elseif ( 'knowledge' === $item['icon'] ) : ?>
							<svg viewBox="0 0 32 32" focusable="false">
								<circle cx="16" cy="9" r="4" />
								<path d="M8 27c.5-5.3 3.2-8 8-8s7.5 2.7 8 8" />
								<circle cx="24.5" cy="7" r="2" />
							</svg>

						<?php elseif ( 'assessment' === $item['icon'] ) : ?>
							<svg viewBox="0 0 32 32" focusable="false">
								<rect x="8" y="5" width="16" height="22" rx="2" />
								<path d="M12 10h8M12 14h8M12 19h5" />
							</svg>

						<?php elseif ( 'gamified' === $item['icon'] ) : ?>
							<svg viewBox="0 0 32 32" focusable="false">
								<path d="M5 12 16 7l11 5-11 5L5 12Z" />
								<path d="M9 14v6c3 2.5 11 2.5 14 0v-6" />
								<path d="M27 13v6M25.5 21.5h3" />
							</svg>

						<?php elseif ( 'mobile' === $item['icon'] ) : ?>
							<svg viewBox="0 0 32 32" focusable="false">
								<rect x="5" y="8" width="17" height="12" rx="1.5" />
								<path d="M9 24h9M13.5 20v4" />
								<rect x="23" y="5" width="5" height="11" rx="1" />
							</svg>

						<?php else : ?>
							<svg viewBox="0 0 32 32" focusable="false">
								<circle cx="16" cy="13" r="6" />
								<path d="M12 19v8l4-2 4 2v-8" />
								<path d="m13.5 13 1.5 1.5 3.5-3.5" />
							</svg>
						<?php endif; ?>
					</div>

					<h3 class="sl-panel-title sl-coc-learning__card-title">
						<?php echo esc_html( $item['title'] ); ?>
					</h3>

					<p>
						<?php echo esc_html( $item['text'] ); ?>
					</p>

				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
