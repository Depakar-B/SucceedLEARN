<?php
/**
 * BFSI & PE/VC — See the Training in Action.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$bfsi_screenshots = array(
	array(
		'file' => '2026/09/BFSI-PEVC-Course-Screenshot-1.webp',
		'alt'  => __( 'BFSI & PE/VC cybersecurity awareness course screenshot 1', 'akaza-adventure' ),
	),
	array(
		'file' => '2026/09/BFSI-PEVC-Course-Screenshot-2.webp',
		'alt'  => __( 'BFSI & PE/VC cybersecurity awareness course screenshot 2', 'akaza-adventure' ),
	),
	array(
		'file' => '2026/09/BFSI-PEVC-Course-Screenshot-3.webp',
		'alt'  => __( 'BFSI & PE/VC cybersecurity awareness course screenshot 3', 'akaza-adventure' ),
	),
	array(
		'file' => '2026/09/BFSI-PEVC-Course-Screenshot-4.webp',
		'alt'  => __( 'BFSI & PE/VC cybersecurity awareness course screenshot 4', 'akaza-adventure' ),
	),
	array(
		'file' => '2026/09/BFSI-PEVC-Course-Screenshot-5.webp',
		'alt'  => __( 'BFSI & PE/VC cybersecurity awareness course screenshot 5', 'akaza-adventure' ),
	),
	array(
		'file' => '2026/09/BFSI-PEVC-Course-Screenshot-6.webp',
		'alt'  => __( 'BFSI & PE/VC cybersecurity awareness course screenshot 6', 'akaza-adventure' ),
	),
	array(
		'file' => '2026/09/BFSI-PEVC-Course-Screenshot-7.webp',
		'alt'  => __( 'BFSI & PE/VC cybersecurity awareness course screenshot 7', 'akaza-adventure' ),
	),
	array(
		'file' => '2026/09/BFSI-PEVC-Course-Screenshot-8.webp',
		'alt'  => __( 'BFSI & PE/VC cybersecurity awareness course screenshot 8', 'akaza-adventure' ),
	),
);

$bfsi_screenshot_count = count( $bfsi_screenshots );
?>

<section
	class="sl-bfsi-action"
	id="see-the-training-in-action"
	aria-labelledby="sl-bfsi-action-title"
>
	<div class="container">

		<div class="sl-bfsi-action__grid">

			<div class="sl-bfsi-action__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Course Screenshots', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-bfsi-action-title">
					<?php esc_html_e( 'See the Training', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'in Action', 'akaza-adventure' ); ?></span>
				</h2>

				<h3 class="sl-bfsi-action__subtitle">
					<?php esc_html_e( 'Learn Through Real-World Cybersecurity Scenarios', 'akaza-adventure' ); ?>
				</h3>

				<p class="sl-bfsi-action__lead">
					<?php
					esc_html_e(
						'Cybersecurity risks become easier to recognise when employees can see how they appear in realistic workplace situations.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Throughout the course, learners encounter visual explanations, financial-services scenarios and interactive learning covering areas such as social engineering, insider threats, physical security, data privacy, third-party risk and AI-enabled attacks.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Knowledge checks reinforce key concepts throughout the learning journey, helping employees practise how to recognise suspicious activity, make safer decisions and respond appropriately when something does not look right.',
						'akaza-adventure'
					);
					?>
				</p>

				<a class="sl-content-btn sl-content-btn-primary" href="#contact">
					<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
				</a>

			</div>

			<div
				class="sl-bfsi-action__media"
				<?php echo $bfsi_screenshot_count ? 'data-bfsi-carousel' : ''; ?>
				tabindex="<?php echo $bfsi_screenshot_count ? '0' : '-1'; ?>"
				aria-roledescription="carousel"
				aria-label="<?php esc_attr_e( 'Course screenshots', 'akaza-adventure' ); ?>"
			>
				<?php if ( $bfsi_screenshot_count ) : ?>
					<div class="sl-bfsi-action__viewport">
						<div class="sl-bfsi-action__track" data-bfsi-track>
							<?php foreach ( $bfsi_screenshots as $index => $screenshot ) : ?>
								<?php
								$screenshot_src = function_exists( 'akaza_upload_url' )
									? akaza_upload_url( $screenshot['file'] )
									: 'https://succeedlearn.com/wp-content/uploads/' . $screenshot['file'];
								?>
								<figure class="sl-bfsi-action__slide">
									<div class="sl-bfsi-action__image">
										<img
											src="<?php echo esc_url( $screenshot_src ); ?>"
											alt="<?php echo esc_attr( $screenshot['alt'] ); ?>"
											width="720"
											height="520"
											loading="<?php echo 0 === $index ? 'eager' : 'lazy'; ?>"
											decoding="async"
										/>
									</div>
								</figure>
							<?php endforeach; ?>
						</div>
					</div>

					<div class="sl-bfsi-action__controls">
						<button
							type="button"
							class="sl-bfsi-action__arrow sl-bfsi-action__arrow--prev"
							data-bfsi-prev
							aria-label="<?php esc_attr_e( 'Previous screenshot', 'akaza-adventure' ); ?>"
						>
							<span aria-hidden="true">←</span>
						</button>

						<span
							class="sl-bfsi-action__counter"
							data-bfsi-counter
							aria-live="polite"
						>
							<?php echo esc_html( '1 / ' . $bfsi_screenshot_count ); ?>
						</span>

						<button
							type="button"
							class="sl-bfsi-action__arrow sl-bfsi-action__arrow--next"
							data-bfsi-next
							aria-label="<?php esc_attr_e( 'Next screenshot', 'akaza-adventure' ); ?>"
						>
							<span aria-hidden="true">→</span>
						</button>
					</div>
				<?php else : ?>
					<div class="sl-bfsi-action__image-placeholder" aria-hidden="true"></div>
				<?php endif; ?>
			</div>

		</div>

	</div>
</section>
