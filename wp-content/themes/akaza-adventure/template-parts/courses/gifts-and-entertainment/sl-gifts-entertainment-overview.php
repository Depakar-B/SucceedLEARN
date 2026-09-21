<?php
/**
 * SucceedLEARN
 * Gifts & Entertainment Training for PE/VC Professionals
 * Course Overview
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;
?>

<section
	class="sl-gifts-entertainment-overview"
	aria-labelledby="sl-gifts-entertainment-overview-title"
>
	<div class="container">

		<div class="sl-gifts-entertainment-overview__grid">

			<!-- Image -->
			<div class="sl-gifts-entertainment-overview__media">

				<div
					class="sl-gifts-entertainment-overview__image-placeholder"
					role="img"
					aria-label="<?php esc_attr_e( 'Gifts and entertainment compliance training visual', 'akaza-adventure' ); ?>"
				>
					<span>
						<?php
						esc_html_e(
							'IMAGE PLACEHOLDER',
							'akaza-adventure'
						);
						?>
					</span>

					<small>
						<?php
						esc_html_e(
							'Recommended: 600 × 600 px',
							'akaza-adventure'
						);
						?>
					</small>
				</div>

			</div>

			<!-- Content -->
			<div class="sl-gifts-entertainment-overview__content">

				<span class="sl-home-sub-heading">
					<?php
					esc_html_e(
						'Course overview',
						'akaza-adventure'
					);
					?>
				</span>

				<h2 id="sl-gifts-entertainment-overview-title">
					<?php
					echo wp_kses_post(
						__(
							'What Is Gifts and Entertainment <span>Compliance Training?</span>',
							'akaza-adventure'
						)
					);
					?>
				</h2>

				<div class="sl-gifts-entertainment-overview__body">

					<p>
						<?php
						esc_html_e(
							'Gifts and Entertainment Compliance Training helps employees assess business gifts, meals, hospitality, event invitations and other benefits, and understand when they should be accepted, declined, approved, recorded or escalated.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'A gift may include merchandise, gift cards, services, personal favours, loans or discounts. Entertainment can include meals, event tickets, cultural outings, travel and hospitality.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'For PE/VC professionals, these decisions may involve investors, advisers, vendors, portfolio company contacts, government officials and other third parties across UK and US business environments.',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

			</div>

		</div>

	</div>
</section>