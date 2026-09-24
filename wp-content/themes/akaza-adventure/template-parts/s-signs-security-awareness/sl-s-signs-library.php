<?php
/**
 * S-Signs — A Growing Library of Cybersecurity Awareness Posters.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section
	class="sl-s-signs-library"
	aria-labelledby="sl-s-signs-library-title"
>
	<div class="container">

		<div class="sl-s-signs-library__grid">

			<div class="sl-s-signs-library__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Poster Library', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-s-signs-library-title">
					<?php esc_html_e( 'A Growing Library of', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Cybersecurity Awareness Posters', 'akaza-adventure' ); ?></span>
				</h2>

				<h3 class="sl-s-signs-library__subtitle">
					<?php esc_html_e( 'One Visual Library. Multiple Security Topics.', 'akaza-adventure' ); ?>
				</h3>

				<div class="sl-s-signs-library__copy">
					<p>
						<?php
						esc_html_e(
							"S-Signs provides access to an extensive collection of professionally designed cybersecurity awareness posters covering a broad range of security topics relevant to today's workplace.",
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Administrators can quickly browse, search, and filter posters based on awareness themes, enabling organisations to easily select relevant content for ongoing awareness campaigns.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'The growing poster library includes topics such as phishing awareness, remote working security, password hygiene, AI security, mobile device security, and more.',
							'akaza-adventure'
						);
						?>
					</p>
				</div>

			</div>

			<div class="sl-s-signs-library__media">
				<div class="sl-s-signs-library__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

		</div>

	</div>
</section>
