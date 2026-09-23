<?php
/**
 * SucceedLEARN
 * Whistleblowing Training for PE/VC — For Individuals
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$features = array(
	array(
		'num'   => '01',
		'title' => __( 'Interactive eLearning', 'akaza-adventure' ),
		'text'  => __( 'Practical digital learning supported by whistleblowing scenarios and knowledge checks.', 'akaza-adventure' ),
	),
	array(
		'num'   => '02',
		'title' => __( '30-minute duration', 'akaza-adventure' ),
		'text'  => __( 'Complete the core whistleblowing learning in approximately half an hour.', 'akaza-adventure' ),
	),
	array(
		'num'   => '03',
		'title' => __( 'CPD Certificate on Completion', 'akaza-adventure' ),
		'text'  => __( 'Receive a completion certificate after successfully finishing the learning.', 'akaza-adventure' ),
	),
	array(
		'num'   => '04',
		'title' => __( 'Instant access', 'akaza-adventure' ),
		'text'  => __( 'Start learning immediately after purchase.', 'akaza-adventure' ),
	),
);
?>

<section
	id="individuals"
	class="sl-whistleblowing-individuals"
	aria-labelledby="sl-whistleblowing-individuals-title"
>
	<div class="container">

		<div class="sl-whistleblowing-individuals__grid">

			<div class="sl-whistleblowing-individuals__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Individual Whistleblowing Learning', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-whistleblowing-individuals-title">
					<?php
					echo wp_kses_post(
						__(
							'Whistleblowing Training <span>For Individuals</span> - Start Immediately',
							'akaza-adventure'
						)
					);
					?>
				</h2>

				<p class="sl-whistleblowing-individuals__lead">
					<?php
					esc_html_e(
						'A focused learning experience for professionals who want practical speaking-up and whistleblowing awareness without a lengthy training commitment.',
						'akaza-adventure'
					);
					?>
				</p>

				<ul class="sl-whistleblowing-individuals__features">
					<?php foreach ( $features as $feature ) : ?>
						<li class="sl-whistleblowing-individuals__feature">
							<span class="sl-whistleblowing-individuals__feature-num" aria-hidden="true">
								<?php echo esc_html( $feature['num'] ); ?>
							</span>
							<div>
								<strong><?php echo esc_html( $feature['title'] ); ?></strong>
								<span><?php echo esc_html( $feature['text'] ); ?></span>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>

			</div>

			<div class="sl-whistleblowing-individuals__media">
				<figure class="sl-whistleblowing-individuals__image">
					<img
						src="<?php echo esc_url( 'https://succeedlearn.com/wp-content/uploads/2026/09/Image-1-AML.webp' ); ?>"
						alt="<?php esc_attr_e( 'Individual Whistleblowing Course Preview', 'akaza-adventure' ); ?>"
						loading="lazy"
						decoding="async"
					>
				</figure>

				<div class="sl-whistleblowing-individuals__actions">
					<a class="sl-content-btn sl-content-btn-primary" href="#buy">
						<?php esc_html_e( 'Buy Now @ $20', 'akaza-adventure' ); ?>
					</a>
					<a class="sl-content-btn sl-content-btn-secondary" href="#contact">
						<?php esc_html_e( 'Request Demo', 'akaza-adventure' ); ?>
					</a>
				</div>
			</div>

		</div>

	</div>
</section>
