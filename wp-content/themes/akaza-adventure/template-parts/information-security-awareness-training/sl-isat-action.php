<?php
/**
 * Information Security Awareness Training - See the Training in Action.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$isat_screenshots = array(
	'2026/09/Soc-2-InfoSec-Course-Screenshots.webp',
	'2026/09/Soc-2-InfoSec-Course-Screenshots-2.webp',
	'2026/09/Soc-2-InfoSec-Course-Screenshots-3.webp',
	'2026/09/Soc-2-InfoSec-Course-Screenshots-4.webp',
	'2026/09/Soc-2-InfoSec-Course-Screenshots-5.webp',
	'2026/09/Soc-2-InfoSec-Course-Screenshots-6.webp',
	'2026/09/Soc-2-InfoSec-Course-Screenshots-7.webp',
	'2026/09/Soc-2-InfoSec-Course-Screenshots-8.webp',
	'2026/09/Soc-2-InfoSec-Course-Screenshots-9.webp',
);

$isat_screenshot_count = count( $isat_screenshots );
?>

<section
	class="sl-isat-action"
	id="see-the-training-in-action"
	aria-labelledby="sl-isat-action-title"
>
	<div class="container">

		<div class="sl-isat-action__grid">

			<div class="sl-isat-action__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Course Screenshots', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-isat-action-title">
					<?php esc_html_e( 'See the Training', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'in Action', 'akaza-adventure' ); ?></span>
				</h2>

				<h3 class="sl-isat-action__subtitle">
					<?php esc_html_e( 'Turn Information Security Concepts Into Practical Employee Awareness', 'akaza-adventure' ); ?>
				</h3>

				<p class="sl-isat-action__lead">
					<?php esc_html_e( 'Information security becomes easier to understand when employees can see how risks appear in practice.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Throughout the course, learners encounter animated explanations and scenarios designed to connect security principles with situations they may face at work.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Knowledge checks are integrated into the learning journey so employees can apply their understanding immediately rather than waiting until the end of the course.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'This helps transform security awareness from passive content consumption into a more practical learning experience.', 'akaza-adventure' ); ?>
				</p>

				<a class="sl-content-btn sl-content-btn-primary" href="#contact">
					<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
				</a>

			</div>

			<div
				class="sl-isat-action__media"
				data-isat-carousel
				tabindex="0"
				aria-roledescription="carousel"
				aria-label="<?php esc_attr_e( 'Course screenshots', 'akaza-adventure' ); ?>"
			>
				<div class="sl-isat-action__viewport">
					<div class="sl-isat-action__track" data-isat-track>
						<?php foreach ( $isat_screenshots as $index => $file ) : ?>
							<?php
							$screenshot_src = function_exists( 'akaza_upload_url' )
								? akaza_upload_url( $file )
								: 'https://succeedlearn.com/wp-content/uploads/' . $file;
							$screenshot_n   = (string) ( $index + 1 );
							?>
							<figure class="sl-isat-action__slide">
								<div class="sl-isat-action__image">
									<img
										src="<?php echo esc_url( $screenshot_src ); ?>"
										alt="<?php echo esc_attr( sprintf( /* translators: %s: screenshot number */ __( 'Information security awareness training course screenshot %s', 'akaza-adventure' ), $screenshot_n ) ); ?>"
										width="720"
										height="390"
										loading="<?php echo 0 === $index ? 'eager' : 'lazy'; ?>"
										decoding="async"
									/>
								</div>
							</figure>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="sl-isat-action__controls">
					<button
						type="button"
						class="sl-isat-action__arrow sl-isat-action__arrow--prev"
						data-isat-prev
						aria-label="<?php esc_attr_e( 'Previous screenshot', 'akaza-adventure' ); ?>"
					>
						<span aria-hidden="true">&larr;</span>
					</button>

					<span
						class="sl-isat-action__counter"
						data-isat-counter
						aria-live="polite"
					>
						<?php echo esc_html( '1 / ' . $isat_screenshot_count ); ?>
					</span>

					<button
						type="button"
						class="sl-isat-action__arrow sl-isat-action__arrow--next"
						data-isat-next
						aria-label="<?php esc_attr_e( 'Next screenshot', 'akaza-adventure' ); ?>"
					>
						<span aria-hidden="true">&rarr;</span>
					</button>
				</div>
			</div>

		</div>

	</div>
</section>
