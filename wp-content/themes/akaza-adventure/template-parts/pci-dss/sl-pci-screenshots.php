<?php
/**
 * PCI DSS — See the Training in Action (screenshots carousel).
 *
 * Retain existing PCI DSS course screenshots when available.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$slides = array(
	__( 'Course screenshot 1', 'akaza-adventure' ),
	__( 'Course screenshot 2', 'akaza-adventure' ),
	__( 'Course screenshot 3', 'akaza-adventure' ),
	__( 'Course screenshot 4', 'akaza-adventure' ),
);
?>

<section
	class="sl-pci-screenshots"
	aria-labelledby="sl-pci-screenshots-title"
>
	<div class="container">

		<div class="sl-pci-screenshots__intro">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Inside the Course', 'akaza-adventure' ); ?>
			</span>

			<h2 id="sl-pci-screenshots-title">
				<?php esc_html_e( 'See the PCI DSS Training', 'akaza-adventure' ); ?>
				<span><?php esc_html_e( 'in Action', 'akaza-adventure' ); ?></span>
			</h2>

			<div class="sl-pci-screenshots__copy">
				<p>
					<?php
					esc_html_e(
						'PCI DSS requirements become easier to understand when employees can see how they apply to real payment-handling situations.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Throughout the course, learners encounter interactive scenarios and practical examples covering card-present and card-not-present transactions, social engineering, suspicious payment activity, Code-10 calls, and secure cardholder data handling.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Knowledge checks and decision-making exercises reinforce these concepts throughout the learning journey, helping employees understand how to apply secure payment practices in their day-to-day roles.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Explore how payment security, cardholder-data protection, fraud awareness, and PCI DSS requirements are presented through the course.',
						'akaza-adventure'
					);
					?>
				</p>
			</div>

		</div>

		<div
			class="sl-pci-screenshots__carousel"
			data-pci-carousel
			aria-roledescription="carousel"
			aria-label="<?php esc_attr_e( 'PCI DSS course screenshots', 'akaza-adventure' ); ?>"
		>
			<div class="sl-pci-screenshots__track" data-pci-carousel-track>
				<?php foreach ( $slides as $index => $label ) : ?>
					<figure
						class="sl-pci-screenshots__slide<?php echo 0 === $index ? ' is-active' : ''; ?>"
						data-pci-carousel-slide
						<?php echo 0 === $index ? '' : ' hidden'; ?>
					>
						<div class="sl-pci-screenshots__image-placeholder">
							<span><?php echo esc_html( $label ); ?></span>
						</div>
						<figcaption class="screen-reader-text">
							<?php echo esc_html( $label ); ?>
						</figcaption>
					</figure>
				<?php endforeach; ?>
			</div>

			<div class="sl-pci-screenshots__controls">
				<button type="button" class="sl-pci-screenshots__btn" data-pci-carousel-prev aria-label="<?php esc_attr_e( 'Previous screenshot', 'akaza-adventure' ); ?>">
					←
				</button>
				<div class="sl-pci-screenshots__dots" data-pci-carousel-dots aria-hidden="true"></div>
				<button type="button" class="sl-pci-screenshots__btn" data-pci-carousel-next aria-label="<?php esc_attr_e( 'Next screenshot', 'akaza-adventure' ); ?>">
					→
				</button>
			</div>
		</div>

	</div>
</section>
