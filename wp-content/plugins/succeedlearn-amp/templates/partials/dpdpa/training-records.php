<?php
/**
 * DPDPA Compliance Training AMP - Training records.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$record_cards = function_exists( 'succeedlearn_amp_dpdpa_training_record_cards' )
	? succeedlearn_amp_dpdpa_training_record_cards()
	: array();

$record_images = function_exists( 'succeedlearn_amp_dpdpa_training_record_images' )
	? succeedlearn_amp_dpdpa_training_record_images()
	: array();
?>

<section
	class="sl-section sl-section--alt sl-dpdpa-training-records"
	aria-labelledby="sl-dpdpa-training-records-title"
>
	<div class="sl-wrap">

		<header class="sl-dpdpa-section-heading sl-dpdpa-training-records__heading">
			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Training records and compliance evidence',
					'succeedlearn-amp'
				);
				?>
			</span>

			<h2
				id="sl-dpdpa-training-records-title"
				class="sl-h2"
			>
				<?php
				esc_html_e(
					'Completion you can hand to ',
					'succeedlearn-amp'
				);
				?>

				<span>
					<?php
					esc_html_e(
						'an auditor or a customer.',
						'succeedlearn-amp'
					);
					?>
				</span>
			</h2>
		</header>

		<div class="sl-list sl-dpdpa-training-records__cards">
			<?php foreach ( $record_cards as $card ) : ?>
				<article class="sl-list-item sl-dpdpa-training-records__card">
					<div class="sl-dpdpa-training-records__head">
						<span class="sl-dpdpa-training-records__label">
							<?php echo esc_html( $card['label'] ); ?>
						</span>

						<h3 class="sl-panel-title">
							<?php echo esc_html( $card['title'] ); ?>
						</h3>
					</div>

					<p>
						<?php echo esc_html( $card['text'] ); ?>
					</p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-dpdpa-training-records__screenshots">
			<?php foreach ( $record_images as $image ) : ?>
				<figure class="sl-dpdpa-training-records__screenshot">
					<div class="sl-dpdpa-training-records__image">
						<amp-img
							src="<?php echo esc_url( $image['url'] ); ?>"
							width="<?php echo esc_attr( $image['width'] ); ?>"
							height="<?php echo esc_attr( $image['height'] ); ?>"
							layout="responsive"
							alt="<?php echo esc_attr( $image['alt'] ); ?>"
						></amp-img>
					</div>

					<figcaption>
						<?php echo esc_html( $image['caption'] ); ?>
					</figcaption>
				</figure>
			<?php endforeach; ?>
		</div>

	</div>
</section>