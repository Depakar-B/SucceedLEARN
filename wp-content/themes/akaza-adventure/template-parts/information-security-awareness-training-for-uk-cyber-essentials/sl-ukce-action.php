<?php
/**
 * UK Cyber Essentials — See the Training in Action.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ukce_screenshots = array(
	array(
		'file' => '2026/09/UK-Cyber-Essentials-Course-Screenshots.webp',
		'alt'  => __( 'UK Cyber Essentials course screenshot 1', 'akaza-adventure' ),
	),
	array(
		'file' => '2026/09/UK-Cyber-Essentials-Course-Screenshots-2.webp',
		'alt'  => __( 'UK Cyber Essentials course screenshot 2', 'akaza-adventure' ),
	),
	array(
		'file' => '2026/09/UK-Cyber-Essentials-Course-Screenshots-3.webp',
		'alt'  => __( 'UK Cyber Essentials course screenshot 3', 'akaza-adventure' ),
	),
	array(
		'file' => '2026/09/UK-Cyber-Essentials-Course-Screenshots-4.webp',
		'alt'  => __( 'UK Cyber Essentials course screenshot 4', 'akaza-adventure' ),
	),
	array(
		'file' => '2026/09/UK-Cyber-Essentials-Course-Screenshots-5.webp',
		'alt'  => __( 'UK Cyber Essentials course screenshot 5', 'akaza-adventure' ),
	),
	array(
		'file' => '2026/09/UK-Cyber-Essentials-Course-Screenshots-6.webp',
		'alt'  => __( 'UK Cyber Essentials course screenshot 6', 'akaza-adventure' ),
	),
);

$ukce_screenshot_count = count( $ukce_screenshots );
?>

<section
	class="sl-ukce-action"
	id="see-the-training-in-action"
	aria-labelledby="sl-ukce-action-title"
>
	<div class="container">

		<div class="sl-ukce-action__grid">

			<div class="sl-ukce-action__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Course Screenshots', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-ukce-action-title">
					<?php esc_html_e( 'See the Training', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'in Action', 'akaza-adventure' ); ?></span>
				</h2>

				<h3 class="sl-ukce-action__subtitle">
					<?php esc_html_e( 'Practical Cybersecurity Awareness for Everyday Technology Use', 'akaza-adventure' ); ?>
				</h3>

				<p class="sl-ukce-action__lead">
					<?php esc_html_e( 'Cyber Essentials focuses on fundamental technical security controls. Employee awareness helps reinforce how those controls are supported through everyday use of accounts, devices, applications and remote-working environments.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Through practical examples and interactive learning, employees develop awareness around account protection, malware risks and secure remote-working behaviours.', 'akaza-adventure' ); ?>
				</p>

				<p>
					<?php esc_html_e( 'Knowledge checks encourage learners to apply security principles to the technology decisions they make during everyday work.', 'akaza-adventure' ); ?>
				</p>

				<a class="sl-content-btn sl-content-btn-primary" href="#contact">
					<?php esc_html_e( 'Request a Demo', 'akaza-adventure' ); ?>
				</a>

			</div>

			<div
				class="sl-ukce-action__media"
				data-ukce-carousel
				tabindex="0"
				aria-roledescription="carousel"
				aria-label="<?php esc_attr_e( 'Course screenshots', 'akaza-adventure' ); ?>"
			>
				<div class="sl-ukce-action__viewport">
					<div class="sl-ukce-action__track" data-ukce-track>
						<?php foreach ( $ukce_screenshots as $index => $screenshot ) : ?>
							<?php
							$screenshot_src = function_exists( 'akaza_upload_url' )
								? akaza_upload_url( $screenshot['file'] )
								: 'https://succeedlearn.com/wp-content/uploads/' . $screenshot['file'];
							?>
							<figure class="sl-ukce-action__slide">
								<div class="sl-ukce-action__image">
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

				<div class="sl-ukce-action__controls">
					<button
						type="button"
						class="sl-ukce-action__arrow sl-ukce-action__arrow--prev"
						data-ukce-prev
						aria-label="<?php esc_attr_e( 'Previous screenshot', 'akaza-adventure' ); ?>"
					>
						<span aria-hidden="true">←</span>
					</button>

					<span
						class="sl-ukce-action__counter"
						data-ukce-counter
						aria-live="polite"
					>
						<?php echo esc_html( '1 / ' . $ukce_screenshot_count ); ?>
					</span>

					<button
						type="button"
						class="sl-ukce-action__arrow sl-ukce-action__arrow--next"
						data-ukce-next
						aria-label="<?php esc_attr_e( 'Next screenshot', 'akaza-adventure' ); ?>"
					>
						<span aria-hidden="true">→</span>
					</button>
				</div>
			</div>

		</div>

	</div>
</section>
