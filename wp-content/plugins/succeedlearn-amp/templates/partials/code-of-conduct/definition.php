<?php
/**
 * Code of Conduct — What Is Code of Conduct Training?
 *
 * AMP section with text-first mobile ordering and sticky desktop media.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coc_definition = function_exists( 'succeedlearn_amp_get_coc_definition_data' )
	? succeedlearn_amp_get_coc_definition_data()
	: array();

if ( empty( $coc_definition ) ) {
	return;
}

$coc_definition_image = ! empty( $coc_definition['image'] )
	? $coc_definition['image']
	: array();

$coc_flow_steps = ! empty( $coc_definition['flow_steps'] )
	? $coc_definition['flow_steps']
	: array();

$coc_topics = ! empty( $coc_definition['topics'] )
	? $coc_definition['topics']
	: array();
?>

<section
	class="sl-section sl-code-conduct-definition"
	id="what-is-code-of-conduct-training"
	aria-labelledby="sl-code-conduct-definition-title"
>
	<div class="sl-wrap">

		<div class="sl-code-conduct-definition__heading">
			<span class="sl-home-sub-heading">
				<?php echo esc_html( $coc_definition['eyebrow'] ); ?>
			</span>

			<h2
				id="sl-code-conduct-definition-title"
				class="sl-h2"
			>
				<?php echo esc_html( $coc_definition['title'] ); ?>

				<span>
					<?php echo esc_html( $coc_definition['title_accent'] ); ?>
				</span>
			</h2>

			<p class="sl-code-conduct-definition__lead">
				<span class="sl-code-conduct-definition__accent">
					<?php echo esc_html( $coc_definition['lead_accent'] ); ?>
				</span>

				<?php echo esc_html( $coc_definition['lead_text'] ); ?>
			</p>
		</div>

		<div class="sl-code-conduct-definition__layout">

			<!-- Text content appears first on mobile and tablet -->
			<div class="sl-code-conduct-definition__panels">

				<article
					class="sl-code-conduct-definition__panel sl-code-conduct-definition__panel--navy"
				>
					<h3 class="sl-panel-title">
						<?php
						echo esc_html(
							$coc_definition['introduction']['title']
						);
						?>
					</h3>

					<p>
						<?php
						echo esc_html(
							$coc_definition['introduction']['text']
						);
						?>
					</p>
				</article>

				<?php if ( ! empty( $coc_flow_steps ) ) : ?>
					<article
						class="sl-code-conduct-definition__panel sl-code-conduct-definition__panel--flow"
						aria-label="<?php esc_attr_e( 'Code of Conduct learning process', 'succeedlearn-amp' ); ?>"
					>
						<div
							class="sl-code-conduct-definition__flow"
							role="list"
						>
							<?php foreach ( $coc_flow_steps as $index => $step ) : ?>

								<?php if ( $index > 0 ) : ?>
									<div
										class="sl-code-conduct-definition__flow-arrow"
										aria-hidden="true"
									>
										<svg
											viewBox="0 0 24 24"
											width="24"
											height="24"
											focusable="false"
										>
											<path
												d="M6 9l6 6 6-6"
												fill="none"
												stroke="currentColor"
												stroke-width="2"
												stroke-linecap="round"
												stroke-linejoin="round"
											></path>
										</svg>
									</div>
								<?php endif; ?>

								<div
									class="sl-code-conduct-definition__step"
									role="listitem"
								>
									<strong>
										<?php echo esc_html( $step['title'] ); ?>
									</strong>

									<span>
										<?php echo esc_html( $step['text'] ); ?>
									</span>
								</div>

							<?php endforeach; ?>
						</div>
					</article>
				<?php endif; ?>

				<?php if ( ! empty( $coc_topics ) ) : ?>
					<article
						class="sl-code-conduct-definition__panel sl-code-conduct-definition__panel--approach"
					>
						<p class="sl-code-conduct-definition__topics-intro">
							<?php
							echo esc_html(
								$coc_definition['topics_intro']
							);
							?>
						</p>

						<ul
							class="sl-code-conduct-definition__tags"
							role="list"
						>
							<?php foreach ( $coc_topics as $topic ) : ?>
								<li>
									<?php echo esc_html( $topic ); ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</article>
				<?php endif; ?>

			</div>

			<!-- Image appears after all text on mobile and tablet -->
			<?php if ( ! empty( $coc_definition_image['url'] ) ) : ?>
				<figure class="sl-code-conduct-definition__media">
					<amp-img
						src="<?php echo esc_url( $coc_definition_image['url'] ); ?>"
						alt="<?php echo esc_attr( $coc_definition_image['alt'] ); ?>"
						width="<?php echo esc_attr( $coc_definition_image['width'] ); ?>"
						height="<?php echo esc_attr( $coc_definition_image['height'] ); ?>"
						layout="responsive"
					></amp-img>
				</figure>
			<?php endif; ?>

		</div>
	</div>
</section>