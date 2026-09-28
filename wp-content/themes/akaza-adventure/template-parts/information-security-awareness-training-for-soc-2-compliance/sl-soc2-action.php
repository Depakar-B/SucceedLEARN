<?php
/**
 * SOC 2 Security Awareness — See the Training in Action.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$soc2_screenshots = array(
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

$soc2_screenshot_count = count( $soc2_screenshots );
?>

<section
	class="sl-soc2-action"
	id="see-the-training-in-action"
	aria-labelledby="sl-soc2-action-title"
>
	<div class="container">

		<div class="sl-soc2-action__grid">

			<div class="sl-soc2-action__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Course Screenshots', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-soc2-action-title">
					<?php esc_html_e( 'See the Training', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'in Action', 'akaza-adventure' ); ?></span>
				</h2>

				<h3 class="sl-soc2-action__subtitle">
					<?php esc_html_e( 'Practical Security Awareness for Everyday Workplace Risks', 'akaza-adventure' ); ?>
				</h3>

				<p class="sl-soc2-action__lead">
					<?php esc_html_e( 'Information security becomes easier to understand when employees can see how threats and secure behaviors appear in realistic situations.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Throughout the programme, learners encounter visual explanations, practical examples and interactive learning across account security, sensitive data handling, malware, physical security, remote working, social engineering, third-party risks, insider threats and incident reporting.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Knowledge checks help employees apply security concepts to everyday workplace decisions rather than simply memorising cybersecurity terminology.', 'akaza-adventure' ); ?>
				</p>

				<a class="sl-content-btn sl-content-btn-primary" href="#contact">
					<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
				</a>

			</div>

			<div
				class="sl-soc2-action__media"
				data-soc2-carousel
				tabindex="0"
				aria-roledescription="carousel"
				aria-label="<?php esc_attr_e( 'Course screenshots', 'akaza-adventure' ); ?>"
			>
				<div class="sl-soc2-action__viewport">
					<div class="sl-soc2-action__track" data-soc2-track>
						<?php foreach ( $soc2_screenshots as $index => $file ) : ?>
							<?php
							$screenshot_src = function_exists( 'akaza_upload_url' )
								? akaza_upload_url( $file )
								: 'https://succeedlearn.com/wp-content/uploads/' . $file;
							$screenshot_n   = (string) ( $index + 1 );
							?>
							<figure class="sl-soc2-action__slide">
								<div class="sl-soc2-action__image">
									<img
										src="<?php echo esc_url( $screenshot_src ); ?>"
										alt="<?php echo esc_attr( sprintf( /* translators: %s: screenshot number */ __( 'SOC 2 security awareness course screenshot %s', 'akaza-adventure' ), $screenshot_n ) ); ?>"
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

				<div class="sl-soc2-action__controls">
					<button
						type="button"
						class="sl-soc2-action__arrow sl-soc2-action__arrow--prev"
						data-soc2-prev
						aria-label="<?php esc_attr_e( 'Previous screenshot', 'akaza-adventure' ); ?>"
					>
						<span aria-hidden="true">←</span>
					</button>

					<span
						class="sl-soc2-action__counter"
						data-soc2-counter
						aria-live="polite"
					>
						<?php echo esc_html( '1 / ' . $soc2_screenshot_count ); ?>
					</span>

					<button
						type="button"
						class="sl-soc2-action__arrow sl-soc2-action__arrow--next"
						data-soc2-next
						aria-label="<?php esc_attr_e( 'Next screenshot', 'akaza-adventure' ); ?>"
					>
						<span aria-hidden="true">→</span>
					</button>
				</div>
			</div>

		</div>

	</div>
</section>
