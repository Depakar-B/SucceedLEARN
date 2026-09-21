<?php
/**
 * SucceedLEARN
 * Gifts & Entertainment Training for PE/VC Professionals
 * Practical E-Learning Section
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;
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

				<div
					class="sl-gifts-entertainment-practical-elearning__image-placeholder"
					role="img"
					aria-label="<?php esc_attr_e( 'Course assessment image placeholder', 'akaza-adventure' ); ?>"
				>

					<strong>
						<?php
						esc_html_e(
							'Course Assessment Image Holder',
							'akaza-adventure'
						);
						?>
					</strong>

					<span>
						<?php
						esc_html_e(
							'Insert one of the supplied Gifts and Entertainment assessment screenshots here.',
							'akaza-adventure'
						);
						?>
					</span>

				</div>

			</div>

		</div>

	</div>
</section>