<?php
/**
 * S-Signs — Smart Filtering for Faster Awareness Campaigns.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-s-signs-filtering"
	aria-labelledby="sl-s-signs-filtering-title"
>
	<div class="container">

		<div class="sl-s-signs-filtering__grid">

			<div class="sl-s-signs-filtering__media">
				<div class="sl-s-signs-filtering__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

			<div class="sl-s-signs-filtering__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Faster Campaign Setup', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-s-signs-filtering-title">
					<?php esc_html_e( 'Smart Filtering for Faster', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Awareness Campaigns', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-s-signs-filtering__copy">
					<p>
						<?php esc_html_e( 'Finding the right awareness material should be simple.', 'akaza-adventure' ); ?>
					</p>

					<p>
						<?php
						esc_html_e(
							'S-Signs allows administrators to quickly filter posters by tone of content, type of content, size etc, making it easier to build focused awareness initiatives throughout the year.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Whether planning a Cybersecurity Awareness Month campaign, reinforcing phishing awareness after a phishing simulation, or supporting organisation-wide security initiatives, administrators can quickly locate and distribute relevant visual content without spending time searching through extensive libraries.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

			</div>

		</div>

	</div>
</section>
