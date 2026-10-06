<?php
/**
 * Infosec Cybersecurity Awareness Month 2026 AMP - Phishing Resilience Challenge.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$challenge_intro    = succeedlearn_amp_infosec_challenge_intro();
$challenge_criteria = succeedlearn_amp_infosec_challenge_criteria();
$challenge_paths    = succeedlearn_amp_infosec_challenge_paths();
?>

<section
	id="challenge"
	class="sl-section sl-infosec-challenge"
	aria-labelledby="sl-infosec-challenge-heading"
>
	<div class="sl-wrap">
		<header class="sl-infosec-challenge__intro">
			<h2
				id="sl-infosec-challenge-heading"
				class="sl-h2 sl-infosec-challenge__heading"
			>
				<?php
				echo wp_kses_post(
					__(
						'The Phishing Resilience <span>Challenge</span>',
						'succeedlearn-amp'
					)
				);
				?>
			</h2>

			<h3 class="sl-panel-title sl-infosec-challenge__subtitle">
				<?php echo esc_html( $challenge_intro['subtitle'] ); ?>
			</h3>

			<p class="sl-lead sl-infosec-challenge__intro-text">
				<?php echo esc_html( $challenge_intro['text'] ); ?>
			</p>

			<div class="sl-infosec-challenge__criteria">
				<?php foreach ( $challenge_criteria as $index => $criterion ) : ?>
					<?php if ( 0 < $index ) : ?>
						<div
							class="sl-infosec-challenge__criteria-divider"
							aria-hidden="true"
						>
							<span><?php esc_html_e( 'OR', 'succeedlearn-amp' ); ?></span>
						</div>
					<?php endif; ?>

					<div class="sl-infosec-challenge__criteria-item sl-infosec-challenge__criteria-item--<?php echo esc_attr( $criterion['modifier'] ); ?>">
						<span
							class="sl-infosec-challenge__score-icon"
							aria-hidden="true"
						>
							<?php if ( 'achieved' === $criterion['modifier'] ) : ?>
								<svg viewBox="0 0 24 24" focusable="false">
									<path d="M5 12.5 10 17.5 19 7.5" />
								</svg>
							<?php else : ?>
								<svg viewBox="0 0 24 24" focusable="false">
									<path d="M4 17 10 11 14 15 20 8" />
									<path d="M15 8h5v5" />
								</svg>
							<?php endif; ?>
						</span>

						<div class="sl-infosec-challenge__criteria-copy">
							<strong>
								<?php echo esc_html( $criterion['title'] ); ?>
							</strong>

							<span>
								<?php echo esc_html( $criterion['text'] ); ?>
							</span>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</header>

		<div class="sl-infosec-challenge__paths">
			<?php foreach ( $challenge_paths as $path ) : ?>
				<article
					class="sl-infosec-challenge__card sl-infosec-challenge__card--<?php echo esc_attr( $path['modifier'] ); ?>"
				>
					<span class="sl-infosec-challenge__score-pill">
						<?php echo esc_html( $path['score'] ); ?>
					</span>

					<span class="sl-infosec-challenge__card-label">
						<?php echo esc_html( $path['label'] ); ?>
					</span>

					<h3 class="sl-infosec-challenge__card-title">
						<?php echo esc_html( $path['title'] ); ?>
					</h3>

					<p class="sl-infosec-challenge__card-intro">
						<?php echo esc_html( $path['intro'] ); ?>
					</p>

					<div class="sl-infosec-challenge__reward">
						<h4 class="sl-infosec-challenge__reward-title">
							<?php echo esc_html( $path['list_head'] ); ?>
						</h4>

						<ul class="sl-infosec-challenge__list">
							<?php foreach ( $path['items'] as $item ) : ?>
								<li>
									<span
										class="sl-infosec-challenge__list-icon"
										aria-hidden="true"
									>
										<svg viewBox="0 0 24 24" focusable="false">
											<path d="M5 12.5 10 17.5 19 7.5" />
										</svg>
									</span>

									<span class="sl-infosec-challenge__list-text">
										<?php echo esc_html( $item['text'] ); ?>
										<?php if ( ! empty( $item['badge'] ) ) : ?>
											<span class="sl-infosec-challenge__complimentary">
												<?php echo esc_html( $item['badge'] ); ?>
											</span>
										<?php endif; ?>
									</span>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<p class="sl-infosec-challenge__closing">
						<?php echo esc_html( $path['closing'][0] ); ?>
						<span><?php echo esc_html( $path['closing'][1] ); ?></span>
					</p>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-infosec-challenge__outro">
			<p class="sl-infosec-challenge__outro-lead">
				<?php echo esc_html( $challenge_intro['outro'] ); ?>
			</p>
			<p>
				<?php esc_html_e( 'Recognition for strong performance. Improvement for teams that need support.', 'succeedlearn-amp' ); ?>
			</p>
		</div>

		<p class="sl-infosec-challenge__terms">
			<?php
			esc_html_e(
				"Eligibility criteria and Terms & Conditions apply. Resiliency Score is determined using SucceedLEARN's applicable campaign metrics.",
				'succeedlearn-amp'
			);
			?>
		</p>
	</div>
</section>
