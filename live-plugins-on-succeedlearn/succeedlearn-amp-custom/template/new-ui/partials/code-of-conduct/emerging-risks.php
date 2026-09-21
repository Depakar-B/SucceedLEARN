<?php
/**
 * Code of Conduct — Emerging Ethical Risks.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coc_emerging_risks = function_exists(
	'succeedlearn_amp_get_coc_emerging_risks_data'
)
	? succeedlearn_amp_get_coc_emerging_risks_data()
	: array();

if ( empty( $coc_emerging_risks ) ) {
	return;
}

$coc_emerging_image = ! empty( $coc_emerging_risks['image'] )
	? $coc_emerging_risks['image']
	: array();

$coc_emerging_topics = ! empty( $coc_emerging_risks['topics'] )
	? $coc_emerging_risks['topics']
	: array();

$coc_emerging_closing = ! empty( $coc_emerging_risks['closing'] )
	? $coc_emerging_risks['closing']
	: array();
?>

<section
	class="sl-section sl-coc-emerging-risks"
	aria-labelledby="sl-coc-emerging-risks-title"
>
	<div class="sl-wrap">

		<div class="sl-coc-emerging-risks__heading">
			<span class="sl-home-sub-heading">
				<?php echo esc_html( $coc_emerging_risks['eyebrow'] ); ?>
			</span>

			<h2
				id="sl-coc-emerging-risks-title"
				class="sl-h2"
			>
				<?php echo esc_html( $coc_emerging_risks['title'] ); ?>

				<span>
					<?php echo esc_html( $coc_emerging_risks['title_accent'] ); ?>
				</span>
			</h2>

			<h3 class="sl-panel-title sl-coc-emerging-risks__lead">
				<?php echo esc_html( $coc_emerging_risks['lead'] ); ?>
			</h3>

			<p class="sl-coc-emerging-risks__intro">
				<?php echo esc_html( $coc_emerging_risks['intro'] ); ?>
			</p>
		</div>

		<div class="sl-coc-emerging-risks__main">

			<?php if ( ! empty( $coc_emerging_image['url'] ) ) : ?>
				<figure class="sl-coc-emerging-risks__image">
					<amp-img
						src="<?php echo esc_url( $coc_emerging_image['url'] ); ?>"
						alt="<?php echo esc_attr( $coc_emerging_image['alt'] ); ?>"
						width="<?php echo esc_attr( $coc_emerging_image['width'] ); ?>"
						height="<?php echo esc_attr( $coc_emerging_image['height'] ); ?>"
						layout="responsive"
					></amp-img>
				</figure>
			<?php endif; ?>

			<?php if ( ! empty( $coc_emerging_topics ) ) : ?>
				<div class="sl-coc-emerging-risks__topics">
					<ul class="sl-list sl-coc-emerging-risks__list">

						<?php foreach ( $coc_emerging_topics as $index => $topic ) : ?>
							<li class="sl-list-item sl-coc-emerging-risks__list-item">

								<span
									class="sl-coc-emerging-risks__list-index"
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

								<span class="sl-coc-emerging-risks__list-label">
									<?php echo esc_html( $topic ); ?>
								</span>

							</li>
						<?php endforeach; ?>

					</ul>
				</div>
			<?php endif; ?>

		</div>

		<?php if ( ! empty( $coc_emerging_closing ) ) : ?>
			<div class="sl-highlight sl-coc-emerging-risks__close">

				<p class="sl-coc-emerging-risks__close-example">
					<strong>
						<?php
						echo esc_html(
							$coc_emerging_closing['example_label']
						);
						?>
					</strong>

					<?php
					echo esc_html(
						$coc_emerging_closing['example']
					);
					?>
				</p>

				<p class="sl-coc-emerging-risks__close-message">
					<?php
					echo esc_html(
						$coc_emerging_closing['message']
					);
					?>
				</p>

			</div>
		<?php endif; ?>

	</div>
</section>