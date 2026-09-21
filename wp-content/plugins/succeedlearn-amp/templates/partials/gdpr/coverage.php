<?php
/**
 * GDPR Employee Awareness Training - Course coverage.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coverage_image = function_exists( 'succeedlearn_amp_get_gdpr_coverage_image' )
	? succeedlearn_amp_get_gdpr_coverage_image()
	: '';
?>

<section
	class="sl-section sl-gdpr-coverage"
	id="course-modules"
	aria-labelledby="sl-gdpr-coverage-title"
>
	<div class="sl-wrap">
		<div class="sl-gdpr-coverage__grid">
			<div class="sl-gdpr-coverage__content">
				<header class="sl-gdpr-coverage__heading">
					<span class="sl-home-sub-heading">
						<?php
						esc_html_e(
							'Built for EU GDPR, and Only EU GDPR',
							'succeedlearn-amp'
						);
						?>
					</span>

					<h2
						class="sl-h2"
						id="sl-gdpr-coverage-title"
					>
						<?php
						echo wp_kses(
							__(
								'Everything Your Team Needs on <span>GDPR.</span>',
								'succeedlearn-amp'
							),
							array(
								'span' => array(),
							)
						);
						?>
					</h2>

					<p>
						<?php
						esc_html_e(
							'The course covers the regulation end to end: the principles, the six lawful bases, all eight data subject rights, privacy by design, ten real breach scenarios, and a dedicated module on lawful sales outreach across the EU, the one thing most awareness training skips.',
							'succeedlearn-amp'
						);
						?>
					</p>
				</header>

				<div class="sl-highlight sl-gdpr-coverage__highlight">
					<p>
						<strong>
							<?php
							esc_html_e(
								'If your people handle EU personal data, this is the course.',
								'succeedlearn-amp'
							);
							?>
						</strong>

						<?php
						esc_html_e(
							' If you also operate in India, pair it with our DPDPA training.',
							'succeedlearn-amp'
						);
						?>
					</p>
				</div>

				<div class="sl-gdpr-coverage__actions">
					<button
						type="button"
						class="sl-content-btn sl-content-btn-primary"
						data-cta="gdpr-coverage-contact"
						<?php
						echo succeedlearn_amp_scroll_tap_attr( 'contact' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					>
						<?php esc_html_e( 'Reach Us Out', 'succeedlearn-amp' ); ?>
						<span aria-hidden="true">→</span>
					</button>
				</div>
			</div>

			<div class="sl-gdpr-coverage__visual">
				<div class="sl-gdpr-coverage__image">
					<?php if ( ! empty( $coverage_image ) ) : ?>
						<amp-img
							src="<?php echo esc_url( $coverage_image ); ?>"
							width="720"
							height="520"
							layout="responsive"
							alt="<?php esc_attr_e( 'GDPR course overview', 'succeedlearn-amp' ); ?>"
						>
							<div
								fallback
								class="sl-gdpr-coverage__image-placeholder"
							>
								<span>
									<?php
									esc_html_e(
										'Course image unavailable',
										'succeedlearn-amp'
									);
									?>
								</span>
							</div>
						</amp-img>
					<?php else : ?>
						<div
							class="sl-gdpr-coverage__image-placeholder"
							role="img"
							aria-label="<?php esc_attr_e( 'GDPR course overview image placeholder', 'succeedlearn-amp' ); ?>"
						>
							<span>
								<?php
								esc_html_e(
									'Image placeholder',
									'succeedlearn-amp'
								);
								?>
							</span>

							<small>
								<?php
								esc_html_e(
									'Recommended: 720 × 520 px',
									'succeedlearn-amp'
								);
								?>
							</small>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>