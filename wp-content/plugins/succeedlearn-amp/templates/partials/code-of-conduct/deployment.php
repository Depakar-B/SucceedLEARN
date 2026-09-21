<?php
/**
 * Code of Conduct — Deployment.
 *
 * @package SucceedLEARN_AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coc_deployment         = succeedlearn_amp_get_coc_deployment_data();
$coc_deployment_options = $coc_deployment['options'];
?>

<section
	class="sl-section sl-coc-deployment"
	aria-labelledby="sl-coc-deployment-title"
>
	<div class="sl-wrap">

		<div class="sl-coc-deployment__heading">
			<span class="sl-home-sub-heading">
				<?php echo esc_html( $coc_deployment['eyebrow'] ); ?>
			</span>

			<h2 class="sl-h2" id="sl-coc-deployment-title">
				<?php echo esc_html( $coc_deployment['title'] ); ?>
				<span>
					<?php echo esc_html( $coc_deployment['highlight'] ); ?>
				</span>
			</h2>

			<p>
				<?php echo esc_html( $coc_deployment['intro'] ); ?>
			</p>
		</div>

		<div class="sl-coc-deployment__grid sl-amp-card-grid">
			<?php foreach ( $coc_deployment_options as $option ) : ?>
				<article class="sl-coc-deployment__card">

					<span class="sl-coc-deployment__eyebrow">
						<?php echo esc_html( $option['eyebrow'] ); ?>
					</span>

					<h3 class="sl-panel-title sl-coc-deployment__card-title">
						<?php echo esc_html( $option['title'] ); ?>
					</h3>

					<ul class="sl-list sl-coc-deployment__features">
						<?php foreach ( $option['items'] as $item ) : ?>
							<li class="sl-list-item sl-coc-deployment__feature">
								<span
									class="sl-coc-deployment__icon"
									aria-hidden="true"
								>
									<svg
										viewBox="0 0 24 24"
										focusable="false"
									>
										<path d="m6.5 12.5 3.5 3.5 7.5-8" />
									</svg>
								</span>

								<span class="sl-coc-deployment__feature-label">
									<?php echo esc_html( $item ); ?>
								</span>
							</li>
						<?php endforeach; ?>
					</ul>

				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>