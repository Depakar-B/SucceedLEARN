<?php
/**
 * Code of Conduct — AMP features section.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$coc_features = function_exists( 'succeedlearn_amp_get_coc_features' )
	? succeedlearn_amp_get_coc_features()
	: array();
?>

<section
	class="sl-section sl-code-conduct-features"
	aria-labelledby="sl-code-conduct-features-title"
>
	<div class="sl-wrap">

		<div class="sl-code-conduct-features__heading">
			<span class="sl-home-sub-heading">
				<?php
				esc_html_e(
					'Interactive Code of Conduct Training',
					'succeedlearn-amp'
				);
				?>
			</span>

			<h2
				id="sl-code-conduct-features-title"
				class="sl-h2"
			>
				<?php
				esc_html_e(
					'Built for learning.',
					'succeedlearn-amp'
				);
				?>

				<span>
					<?php
					esc_html_e(
						'Designed for enterprise.',
						'succeedlearn-amp'
					);
					?>
				</span>
			</h2>

			<p>
				<?php
				esc_html_e(
					'SucceedLEARN’s interactive Code of Conduct training combines realistic workplace scenarios, decision-based learning, assessments and organisation-specific customization to help employees recognize ethical risks and make responsible decisions.',
					'succeedlearn-amp'
				);
				?>
			</p>
		</div>

		<?php if ( ! empty( $coc_features ) ) : ?>
			<div class="sl-code-conduct-features__grid">

				<?php foreach ( $coc_features as $feature ) : ?>
					<article class="sl-code-conduct-features__card">

						<div
							class="sl-code-conduct-features__icon"
							aria-hidden="true"
						>
							<?php if ( 'scenario' === $feature['icon'] ) : ?>

								<svg viewBox="0 0 32 32" focusable="false">
									<path d="M16 4v4"></path>
									<path d="M9.5 7.5 12 10"></path>
									<path d="M22.5 7.5 20 10"></path>
									<path d="M7 15h4"></path>
									<path d="M21 15h4"></path>
									<path d="M12 21h8"></path>
									<path d="M14 25h4"></path>
									<path d="M11 18c-1.8-1.3-3-3.4-3-5.7A8 8 0 0 1 24 12.3c0 2.3-1.2 4.4-3 5.7-.8.6-1 1.3-1 2H12c0-.7-.2-1.4-1-2Z"></path>
								</svg>

							<?php elseif ( 'customizable' === $feature['icon'] ) : ?>

								<svg viewBox="0 0 32 32" focusable="false">
									<circle cx="16" cy="10" r="4"></circle>
									<path d="M8 26c.7-5 3.5-8 8-8s7.3 3 8 8"></path>
									<path d="M25 5v6"></path>
									<path d="M22 8h6"></path>
								</svg>

							<?php elseif ( 'scorm' === $feature['icon'] ) : ?>

								<svg viewBox="0 0 32 32" focusable="false">
									<path d="m16 5 11 5-11 5-11-5 11-5Z"></path>
									<path d="m5 15 11 5 11-5"></path>
									<path d="m5 20 11 5 11-5"></path>
								</svg>

							<?php elseif ( 'branding' === $feature['icon'] ) : ?>

								<svg viewBox="0 0 32 32" focusable="false">
									<rect
										x="5"
										y="6"
										width="22"
										height="20"
										rx="3"
									></rect>
									<path d="M10 20V12"></path>
									<path d="M10 12h6a3 3 0 0 1 0 6h-6"></path>
									<path d="M21 12v8"></path>
								</svg>

							<?php elseif ( 'certificate' === $feature['icon'] ) : ?>

								<svg viewBox="0 0 32 32" focusable="false">
									<rect
										x="6"
										y="5"
										width="20"
										height="19"
										rx="2"
									></rect>
									<path d="M11 10h10"></path>
									<path d="M11 14h7"></path>
									<circle cx="20" cy="20" r="4"></circle>
									<path d="m18 24-1 4 3-2 3 2-1-4"></path>
								</svg>

							<?php elseif ( 'assessment' === $feature['icon'] ) : ?>

								<svg viewBox="0 0 32 32" focusable="false">
									<rect
										x="7"
										y="5"
										width="18"
										height="22"
										rx="2"
									></rect>
									<path d="M11 10h10"></path>
									<path d="M11 14h6"></path>
									<path d="M11 19h7"></path>
									<path d="m21 18 3 3-5 5-3-3 5-5Z"></path>
								</svg>

							<?php elseif ( 'responsive' === $feature['icon'] ) : ?>

								<svg viewBox="0 0 32 32" focusable="false">
									<rect
										x="4"
										y="7"
										width="17"
										height="13"
										rx="2"
									></rect>
									<path d="M9 25h7"></path>
									<path d="M12.5 20v5"></path>
									<rect
										x="22"
										y="5"
										width="6"
										height="13"
										rx="1.5"
									></rect>
									<path d="M24.5 15.5h1"></path>
								</svg>

							<?php elseif ( 'reporting' === $feature['icon'] ) : ?>

								<svg viewBox="0 0 32 32" focusable="false">
									<rect
										x="6"
										y="5"
										width="20"
										height="22"
										rx="2"
									></rect>
									<path d="M10 21v-5"></path>
									<path d="M14 21v-8"></path>
									<path d="M18 21v-3"></path>
									<path d="M22 21V10"></path>
									<path d="M10 10h6"></path>
								</svg>

							<?php endif; ?>
						</div>

						<h3 class="sl-code-conduct-features__label">
							<?php echo esc_html( $feature['label'] ); ?>
						</h3>

					</article>
				<?php endforeach; ?>

			</div>
		<?php endif; ?>

	</div>
</section>