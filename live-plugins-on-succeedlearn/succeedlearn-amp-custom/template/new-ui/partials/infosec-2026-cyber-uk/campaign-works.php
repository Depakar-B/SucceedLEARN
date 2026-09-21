<?php
/**
 * Infosec Cybersecurity Awareness Month 2026 AMP - How the Campaign Works.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$campaign_steps = succeedlearn_amp_infosec_campaign_steps();
?>

<section
	id="how-the-campaign-works"
	class="sl-section sl-infosec-2026-how-it-works"
	aria-labelledby="sl-infosec-2026-how-it-works-title"
>
	<div class="sl-wrap">
		<div class="sl-infosec-2026-how-it-works__grid">
			<header class="sl-infosec-2026-how-it-works__intro">
				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'The Cyber Readiness Journey', 'succeedlearn-amp' ); ?>
				</span>

				<h2
					id="sl-infosec-2026-how-it-works-title"
					class="sl-h2"
				>
					<?php
					echo wp_kses_post(
						__( 'How the Campaign <span>Works</span>', 'succeedlearn-amp' )
					);
					?>
				</h2>

				<div class="sl-infosec-2026-how-it-works__media">
					<div class="sl-infosec-2026-how-it-works__image">
						<amp-img
							src="<?php echo esc_url( succeedlearn_amp_get_infosec_campaign_works_image() ); ?>"
							width="720"
							height="720"
							layout="responsive"
							alt="<?php esc_attr_e( 'How the Cyber Readiness Campaign works', 'succeedlearn-amp' ); ?>"
						></amp-img>
					</div>
				</div>
			</header>

			<div
				class="sl-infosec-2026-how-it-works__cards"
				tabindex="0"
				aria-label="<?php esc_attr_e( 'How the campaign works steps', 'succeedlearn-amp' ); ?>"
			>
				<div class="sl-infosec-2026-how-it-works__steps">
					<?php foreach ( $campaign_steps as $step ) : ?>
						<article
							class="sl-infosec-2026-how-it-works__step<?php echo ! empty( $step['final'] ) ? ' sl-infosec-2026-how-it-works__step--final' : ''; ?>"
						>
							<div
								class="sl-infosec-2026-how-it-works__number"
								aria-hidden="true"
							>
								<?php echo esc_html( $step['number'] ); ?>
							</div>

							<div class="sl-infosec-2026-how-it-works__content">
								<h3 class="sl-panel-title">
									<?php echo esc_html( $step['title'] ); ?>
								</h3>

								<?php foreach ( $step['paragraphs'] as $paragraph ) : ?>
									<p><?php echo esc_html( $paragraph ); ?></p>
								<?php endforeach; ?>

								<?php if ( ! empty( $step['note'] ) ) : ?>
									<p class="sl-infosec-2026-how-it-works__note">
										<strong>
											<?php echo esc_html( $step['note'] ); ?>
										</strong>
									</p>
								<?php endif; ?>

								<?php if ( ! empty( $step['list_intro'] ) ) : ?>
									<p><?php echo esc_html( $step['list_intro'] ); ?></p>
								<?php endif; ?>

								<?php if ( ! empty( $step['items'] ) ) : ?>
									<ul class="sl-list sl-infosec-2026-how-it-works__list">
										<?php foreach ( $step['items'] as $item ) : ?>
											<li class="sl-list-item">
												<span
													class="sl-infosec-2026-how-it-works__check"
													aria-hidden="true"
												>
													✓
												</span>

												<span class="sl-list-item__text">
													<?php echo esc_html( $item ); ?>
												</span>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>

								<?php if ( ! empty( $step['closing'] ) ) : ?>
									<p class="sl-infosec-2026-how-it-works__closing">
										<?php echo esc_html( $step['closing'] ); ?>
									</p>
								<?php endif; ?>

								<?php if ( ! empty( $step['outcomes'] ) ) : ?>
									<div class="sl-infosec-2026-how-it-works__outcomes">
										<?php foreach ( $step['outcomes'] as $outcome ) : ?>
											<section class="sl-infosec-2026-how-it-works__outcome">
												<h4>
													<?php echo esc_html( $outcome['title'] ); ?>
												</h4>

												<p>
													<?php echo esc_html( $outcome['text'] ); ?>
												</p>
											</section>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>

								<?php if ( ! empty( $step['continue'] ) ) : ?>
									<p class="sl-infosec-2026-how-it-works__continue">
										<?php echo esc_html( $step['continue'] ); ?>
									</p>
								<?php endif; ?>

								<?php if ( ! empty( $step['cta'] ) ) : ?>
									<div class="sl-infosec-2026-how-it-works__actions">
										<button
											type="button"
											class="sl-btn sl-btn--primary sl-infosec-2026-how-it-works__cta sl-infosec-2026-how-it-works__cta--primary"
											data-cta="campaign-works-challenge"
											<?php echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
										>
											<?php echo esc_html( $step['cta'] ); ?>

											<svg
												viewBox="0 0 24 24"
												aria-hidden="true"
												focusable="false"
											>
												<path d="M5 12h13M13 6l6 6-6 6" />
											</svg>
										</button>
									</div>
								<?php endif; ?>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
