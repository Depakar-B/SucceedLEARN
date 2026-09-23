<?php
/**
 * SucceedLEARN
 * AML Training for PE/VC — For Individuals
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$features = array(
	array(
		'num'   => '01',
		'title' => __( 'Interactive eLearning', 'akaza-adventure' ),
		'text'  => __( 'Practical digital learning supported by AML scenarios and knowledge checks.', 'akaza-adventure' ),
	),
	array(
		'num'   => '02',
		'title' => __( '30-minute duration', 'akaza-adventure' ),
		'text'  => __( 'Complete the core AML learning in approximately half an hour.', 'akaza-adventure' ),
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
	class="sl-aml-pe-vc-individuals"
	aria-labelledby="sl-aml-pe-vc-individuals-title"
>
	<div class="container">

		<div class="sl-aml-pe-vc-individuals__grid">

			<div class="sl-aml-pe-vc-individuals__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Individual AML Learning', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-aml-pe-vc-individuals-title">
					<?php
					echo wp_kses_post(
						__(
							'AML Training <span>For Individuals</span> - Start Immediately',
							'akaza-adventure'
						)
					);
					?>
				</h2>

				<p class="sl-aml-pe-vc-individuals__lead">
					<?php
					esc_html_e(
						'A focused learning experience for professionals who want practical anti-money laundering awareness without a lengthy training commitment.',
						'akaza-adventure'
					);
					?>
				</p>

				<ul class="sl-aml-pe-vc-individuals__features">
					<?php foreach ( $features as $feature ) : ?>
						<li class="sl-aml-pe-vc-individuals__feature">
							<span class="sl-aml-pe-vc-individuals__feature-num" aria-hidden="true">
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

			<div class="sl-aml-pe-vc-individuals__media">
				<div
					class="sl-aml-pe-vc-individuals__image-placeholder"
					role="img"
					aria-label="<?php esc_attr_e( 'Individual AML Course Preview placeholder', 'akaza-adventure' ); ?>"
				>
					<span><?php esc_html_e( 'Individual AML Course Preview', 'akaza-adventure' ); ?></span>
					<small>
						<?php
						esc_html_e(
							'Replace with an approved SucceedLEARN AML lesson or knowledge-check screenshot.',
							'akaza-adventure'
						);
						?>
					</small>
				</div>

				<div class="sl-aml-pe-vc-individuals__actions">
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
