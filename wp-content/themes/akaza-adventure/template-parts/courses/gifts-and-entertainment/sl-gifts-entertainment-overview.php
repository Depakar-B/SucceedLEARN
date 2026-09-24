<?php
/**
 * SucceedLEARN
 * Gifts & Entertainment Training for PE/VC Professionals
 * Course Overview
 *
 * @package Akaza_Adventure
 */

defined( 'ABSPATH' ) || exit;

$overview_image = 'https://succeedlearn.com/wp-content/uploads/2026/09/Image-2_gifts.webp';
?>

<section
	id="overview"
	class="sl-gifts-entertainment-overview"
	aria-labelledby="sl-gifts-entertainment-overview-title"
>
	<div class="container">

		<div class="sl-gifts-entertainment-overview__heading">

			<span class="sl-home-sub-heading">
				<?php esc_html_e( 'Definition of Gifts and Entertainment', 'akaza-adventure' ); ?>
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

		</div>

		<div class="sl-gifts-entertainment-overview__grid">

			<div class="sl-gifts-entertainment-overview__body">

				<p class="sl-gifts-entertainment-overview__lead">
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

			<div class="sl-gifts-entertainment-overview__media">
				<figure class="sl-gifts-entertainment-overview__image">
					<img
						src="<?php echo esc_url( $overview_image ); ?>"
						alt="<?php esc_attr_e( 'What counts as a gift or entertainment', 'akaza-adventure' ); ?>"
						loading="lazy"
						decoding="async"
					>
				</figure>
			</div>

		</div>

	</div>
</section>
