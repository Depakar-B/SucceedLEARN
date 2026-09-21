<?php
/**
 * Code of Conduct — Customer Story.
 *
 * @package SucceedLEARN_AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coc_customer_story       = succeedlearn_amp_get_coc_customer_story_data();
$coc_customer_story_steps = $coc_customer_story['steps'];
?>

<section
	class="sl-section sl-coc-customer-story"
	aria-labelledby="sl-coc-customer-story-title"
>
	<div class="sl-wrap">

		<div class="sl-coc-customer-story__heading">
			<span class="sl-home-sub-heading">
				<?php echo esc_html( $coc_customer_story['eyebrow'] ); ?>
			</span>

			<h2 class="sl-h2" id="sl-coc-customer-story-title">
				<?php echo esc_html( $coc_customer_story['title'] ); ?>
				<span>
					<?php echo esc_html( $coc_customer_story['highlight'] ); ?>
				</span>
			</h2>

			<p>
				<?php echo esc_html( $coc_customer_story['intro'] ); ?>
			</p>
		</div>

		<div class="sl-highlight sl-coc-customer-story__statement">
			<p>
				<?php echo esc_html( $coc_customer_story['statement'] ); ?>
			</p>
		</div>

		<div class="sl-coc-customer-story__grid sl-amp-card-grid">
			<?php foreach ( $coc_customer_story_steps as $step ) : ?>
				<?php
				$card_class = 'sl-coc-customer-story__card';

				if ( ! empty( $step['featured'] ) ) {
					$card_class .= ' sl-coc-customer-story__card--featured';
				}
				?>

				<article class="<?php echo esc_attr( $card_class ); ?>">
					<span
						class="sl-coc-customer-story__number"
						aria-hidden="true"
					>
						<?php echo esc_html( $step['number'] ); ?>
					</span>

					<h3 class="sl-panel-title sl-coc-customer-story__card-title">
						<?php echo esc_html( $step['title'] ); ?>
					</h3>

					<p>
						<?php echo esc_html( $step['text'] ); ?>
					</p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-coc-customer-story__action">
			<a
				class="sl-content-btn sl-content-btn-primary"
				href="<?php echo esc_url( $coc_customer_story['cta_url'] ); ?>"
			>
				<span class="sl-coc-customer-story__button-text">
					<?php echo esc_html( $coc_customer_story['cta'] ); ?>
				</span>

				<span aria-hidden="true">→</span>
			</a>
		</div>

	</div>
</section>