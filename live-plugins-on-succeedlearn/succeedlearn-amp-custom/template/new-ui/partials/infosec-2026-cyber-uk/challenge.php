<?php
/**
 * Infosec Cybersecurity Awareness Month 2026 AMP - Cyber Readiness Challenge.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$challenge_criteria = succeedlearn_amp_infosec_challenge_criteria();
$challenge_paths    = succeedlearn_amp_infosec_challenge_paths();
?>

<section
	class="sl-section sl-infosec-challenge"
	aria-labelledby="sl-infosec-challenge-heading"
>
	<div class="sl-wrap">
		<header class="sl-infosec-challenge__intro">
			<span class="sl-home-sub-heading sl-infosec-challenge__eyebrow">
				<?php
				esc_html_e(
					'The Cyber Readiness Challenge',
					'succeedlearn-amp'
				);
				?>
			</span>

			<h2
				id="sl-infosec-challenge-heading"
				class="sl-h2 sl-infosec-challenge__heading"
			>
				<?php
				echo wp_kses_post(
					__(
						'Whatever Your Result, <span>Your Employees Get Stronger.</span>',
						'succeedlearn-amp'
					)
				);
				?>
			</h2>

			<p class="sl-lead sl-infosec-challenge__intro-text">
				<?php
				esc_html_e(
					'Run the Cyber Readiness Challenge across your workforce and measure your organisation’s resilience against a controlled phishing simulation.',
					'succeedlearn-amp'
				);
				?>
			</p>

			<p class="sl-infosec-challenge__intro-highlight">
				<?php
				echo wp_kses_post(
					__(
						'Your campaign results determine <strong>what happens next.</strong>',
						'succeedlearn-amp'
					)
				);
				?>
			</p>

			<h3 class="sl-panel-title sl-infosec-challenge__intro-criteria-lead">
				<?php
				esc_html_e(
					'Your organisation achieves either of the following:',
					'succeedlearn-amp'
				);
				?>
			</h3>

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

					<div class="sl-infosec-challenge__criteria-item">
						<span
							class="sl-infosec-challenge__number"
							aria-hidden="true"
						>
							<?php echo esc_html( $criterion['number'] ); ?>
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
					<header class="sl-infosec-challenge__card-header">
						<div
							class="sl-infosec-challenge__icon"
							aria-hidden="true"
						>
							<?php if ( 'achieved' === $path['modifier'] ) : ?>
								<svg viewBox="0 0 24 24" focusable="false">
									<path d="M12 3.2 19 6.2v5.2c0 4.7-3.2 8.7-7 9.8-3.8-1.1-7-5.1-7-9.8V6.2z" />
									<path d="m8.5 12.2 2.2 2.2 4.8-5" />
								</svg>
							<?php else : ?>
								<svg viewBox="0 0 24 24" focusable="false">
									<path d="m12 3.5 2.3 4.7 5.2.75-3.75 3.65.9 5.15L12 15.3l-4.65 2.45.9-5.15L4.5 8.95l5.2-.75z" />
								</svg>
							<?php endif; ?>
						</div>

						<div class="sl-infosec-challenge__card-heading">
							<span class="sl-infosec-challenge__card-label">
								<?php echo esc_html( $path['label'] ); ?>
							</span>

							<h3 class="sl-infosec-challenge__card-title">
								<?php echo esc_html( $path['title'] ); ?>
							</h3>
						</div>
					</header>

					<?php if ( ! empty( $path['intro'] ) ) : ?>
						<div class="sl-infosec-challenge__awareness-intro">
							<?php foreach ( $path['intro'] as $paragraph ) : ?>
								<p>
									<?php echo wp_kses_post( $paragraph ); ?>
								</p>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

					<div class="sl-infosec-challenge__subheading">
						<span
							class="sl-infosec-challenge__mini-icon"
							aria-hidden="true"
						>
							<?php if ( 'achieved' === $path['modifier'] ) : ?>
								<svg viewBox="0 0 24 24" focusable="false">
									<path d="M7 10V7.5a5 5 0 0 1 10 0V10" />
									<rect x="4" y="10" width="16" height="11" rx="2" />
									<circle cx="12" cy="15.5" r="1.3" />
								</svg>
							<?php else : ?>
								<svg viewBox="0 0 24 24" focusable="false">
									<path d="M5 4h14v16H5z" />
									<path d="M8 8h8M8 12h8M8 16h5" />
								</svg>
							<?php endif; ?>
						</span>

						<span><?php echo esc_html( $path['subheading'] ); ?></span>
					</div>

					<ul class="sl-list sl-infosec-challenge__benefits">
						<?php foreach ( $path['benefits'] as $benefit ) : ?>
							<li class="sl-list-item sl-infosec-challenge__benefit">
								<span
									class="sl-infosec-challenge__benefit-icon"
									aria-hidden="true"
								>
									<?php if ( 'repeat' === $benefit['icon'] ) : ?>
										<svg viewBox="0 0 24 24" focusable="false">
											<path d="M4 12a8 8 0 1 0 3-6.8" />
											<path d="M4 5v5h5" />
										</svg>
									<?php elseif ( 'training' === $benefit['icon'] ) : ?>
										<svg viewBox="0 0 24 24" focusable="false">
											<rect x="4" y="4" width="16" height="16" rx="2" />
											<path d="M8 8h8M8 12h8M8 16h5" />
										</svg>
									<?php elseif ( 'modules' === $benefit['icon'] ) : ?>
										<svg viewBox="0 0 24 24" focusable="false">
											<path d="M6 4h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Z" />
											<path d="M8 8h8M8 12h8M8 16h4" />
										</svg>
									<?php endif; ?>
								</span>

								<span class="sl-infosec-challenge__benefit-copy">
									<strong class="sl-infosec-challenge__benefit-title">
										<?php echo esc_html( $benefit['title'] ); ?>
									</strong>

									<span class="sl-infosec-challenge__complimentary">
										<?php echo esc_html( $benefit['label'] ); ?>
									</span>

									<?php if ( ! empty( $benefit['description'] ) ) : ?>
										<span class="sl-list-item__text sl-infosec-challenge__benefit-text">
											<?php echo esc_html( $benefit['description'] ); ?>
										</span>
									<?php endif; ?>
								</span>
							</li>
						<?php endforeach; ?>
					</ul>

					<div class="sl-infosec-challenge__message">
						<?php foreach ( $path['message'] as $message ) : ?>
							<p<?php echo ! empty( $message['lead'] ) ? ' class="sl-infosec-challenge__message-lead"' : ''; ?>>
								<?php echo esc_html( $message['text'] ); ?>
							</p>
						<?php endforeach; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="sl-highlight sl-infosec-challenge__terms">
			<p>
				<?php
				esc_html_e(
					"Eligibility criteria and Terms & Conditions apply. Resiliency Score is determined using SucceedLEARN's applicable campaign metrics.",
					'succeedlearn-amp'
				);
				?>
			</p>
		</div>
	</div>
</section>