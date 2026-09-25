<?php
/**
 * SucceedLEARN
 * Gifts and Entertainment Training for PE/VC — For Individuals
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$features = array(
	array(
		'num'   => '01',
		'title' => __( 'Interactive eLearning', 'akaza-adventure' ),
		'text'  => __( 'Practical digital learning supported by gifts and entertainment scenarios and knowledge checks.', 'akaza-adventure' ),
	),
	array(
		'num'   => '02',
		'title' => __( '12-minute duration', 'akaza-adventure' ),
		'text'  => __( 'Complete the core gifts and entertainment learning in approximately half an hour.', 'akaza-adventure' ),
	),
	array(
		'num'   => '03',
		'title' => __( 'Instant access', 'akaza-adventure' ),
		'text'  => __( 'Start learning immediately after purchase.', 'akaza-adventure' ),
	),
);
?>

<section
	id="individuals"
	class="sl-gifts-entertainment-individuals"
	aria-labelledby="sl-gifts-entertainment-individuals-title"
>
	<div class="container">

		<div class="sl-gifts-entertainment-individuals__grid">

			<div class="sl-gifts-entertainment-individuals__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Individual Gifts & Entertainment eLearning', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-gifts-entertainment-individuals-title">
					<?php
					echo wp_kses_post(
						__(
							'Gifts and Entertainment Training <span>For Individuals</span>',
							'akaza-adventure'
						)
					);
					?>
				</h2>

				<p class="sl-gifts-entertainment-individuals__lead">
					<?php
					esc_html_e(
						'A focused learning experience for professionals who want practical gifts, hospitality and entertainment awareness without a lengthy training commitment.',
						'akaza-adventure'
					);
					?>
				</p>

				<ul class="sl-gifts-entertainment-individuals__features">
					<?php foreach ( $features as $feature ) : ?>
						<li class="sl-gifts-entertainment-individuals__feature">
							<span class="sl-gifts-entertainment-individuals__feature-num" aria-hidden="true">
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

			<div class="sl-gifts-entertainment-individuals__media">
				<figure class="sl-gifts-entertainment-individuals__image">
					<img
						src="<?php echo esc_url( 'https://succeedlearn.com/wp-content/uploads/2026/09/Image-1-AML.webp' ); ?>"
						alt="<?php esc_attr_e( 'Individual Gifts and Entertainment Course Preview', 'akaza-adventure' ); ?>"
						loading="lazy"
						decoding="async"
					>
				</figure>

				<div class="sl-gifts-entertainment-individuals__actions">
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
