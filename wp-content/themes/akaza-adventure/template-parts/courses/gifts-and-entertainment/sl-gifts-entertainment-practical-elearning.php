<?php
/**
 * SucceedLEARN
 * Gifts & Entertainment Training for PE/VC Professionals
 * Practical E-Learning Section
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$assessment_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/Image-8_gifts.webp';
?>

<section
	class="sl-gifts-entertainment-practical-elearning"
	aria-labelledby="sl-gifts-entertainment-practical-elearning-title"
>
	<div class="container">

		<div class="sl-gifts-entertainment-practical-elearning__grid">

			<!-- Left: Introduction -->
			<div class="sl-gifts-entertainment-practical-elearning__content">

				<span class="sl-home-sub-heading">
					<?php
					esc_html_e(
						'Practical E-Learning',
						'akaza-adventure'
					);
					?>
				</span>

				<h2 id="sl-gifts-entertainment-practical-elearning-title">
					<?php
					echo wp_kses_post(
						__(
							'Scenario-Based Gifts and Entertainment <span>E-Learning for PE/VC</span>',
							'akaza-adventure'
						)
					);
					?>
				</h2>

				<p>
					<?php
					esc_html_e(
						'Learners apply the principles to realistic situations rather than simply reading policy wording.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'Course examples include an expensive watch offered during contract negotiations, hospitality involving a government official, event tickets for an investor, a cash voucher and modest refreshments provided during training.',
						'akaza-adventure'
					);
					?>
				</p>

				<p>
					<?php
					esc_html_e(
						'The assessment also uses PE/VC situations involving an investment banker, a former portfolio company CEO, a prospective vendor and a Limited Partner.',
						'akaza-adventure'
					);
					?>
				</p>

			</div>

			<!-- Right: Assessment Image -->
			<div class="sl-gifts-entertainment-practical-elearning__media">
				<figure class="sl-gifts-entertainment-practical-elearning__image">
					<img
						src="<?php echo esc_url( $assessment_image ); ?>"
						alt="<?php esc_attr_e( 'Gifts and Entertainment course assessment screenshot', 'akaza-adventure' ); ?>"
						loading="lazy"
						decoding="async"
					>
				</figure>
			</div>

		</div>

	</div>
</section>
