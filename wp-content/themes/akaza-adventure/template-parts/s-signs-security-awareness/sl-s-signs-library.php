<?php
/**
 * S-Signs — Comprehensive Library of Security Awareness Posters.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$topics = array(
	__( 'Phishing awareness', 'akaza-adventure' ),
	__( 'Remote working security', 'akaza-adventure' ),
	__( 'Password hygiene', 'akaza-adventure' ),
	__( 'AI Security', 'akaza-adventure' ),
	__( 'Mobile Device Security', 'akaza-adventure' ),
	__( 'And more', 'akaza-adventure' ),
);
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
					<?php esc_html_e( 'A Comprehensive Library of', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Security Awareness Posters', 'akaza-adventure' ); ?></span>
				</h2>

				<div class="sl-s-signs-library__copy">
					<p>
						<?php
						esc_html_e(
							'S-Signs provides access to an extensive collection of professionally designed cybersecurity awareness posters covering a broad range of security topics relevant to today\'s workplace.',
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
						<?php esc_html_e( 'The growing poster library includes topics such as:', 'akaza-adventure' ); ?>
					</p>
				</div>

				<ul class="sl-list sl-s-signs-library__topics">
					<?php foreach ( $topics as $index => $topic ) : ?>
						<li class="sl-list-item">
							<span class="sl-list-item__label" aria-hidden="true">
								<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
							</span>
							<span class="sl-list-item__text">
								<?php echo esc_html( $topic ); ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>

			</div>

			<div class="sl-s-signs-library__media">
				<div class="sl-s-signs-library__image-placeholder">
					<span><?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?></span>
				</div>
			</div>

		</div>

	</div>
</section>
