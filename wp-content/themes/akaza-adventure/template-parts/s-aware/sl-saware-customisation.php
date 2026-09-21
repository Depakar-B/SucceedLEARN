<?php
/**
 * SucceedLEARN — S-Aware
 *
 * Section: Learning That Reflects Your Organisation
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$customisation_items = array(
	__( 'Organisational branding', 'akaza-adventure' ),
	__( 'Internal security policies', 'akaza-adventure' ),
	__( 'Processes and procedures', 'akaza-adventure' ),
	__( 'Organisation-specific examples', 'akaza-adventure' ),
	__( 'Internal reporting mechanisms', 'akaza-adventure' ),
	__( 'Industry or workforce context', 'akaza-adventure' ),
);

?>

<section class="sl-saware-customisation" aria-labelledby="saware-customisation-title">

	<div class="container">

		<div class="sl-saware-customisation__grid">

			<!-- Left: Image -->
			<div class="sl-saware-customisation__media">

				<div class="sl-saware-customisation__image">

					<div class="sl-saware-customisation__image-placeholder">
						<span>
							<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
						</span>
					</div>

				</div>

			</div>

			<!-- Right: Content -->
			<div class="sl-saware-customisation__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Customised Learning', 'akaza-adventure' ); ?>
				</span>

				<h2 id="saware-customisation-title">
					<?php esc_html_e( 'Learning That Reflects Your', 'akaza-adventure' ); ?>
					<span>
						<?php esc_html_e( 'Organisation', 'akaza-adventure' ); ?>
					</span>
				</h2>

				<div class="sl-saware-customisation__intro">

					<p>
						<?php
						esc_html_e(
							'Generic cybersecurity principles are important, but employees also need to understand how security applies within their own organisation.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'S-Aware can support customised learning experiences that incorporate organisation-specific requirements into the broader awareness programme.',
							'akaza-adventure'
						);
						?>
					</p>

					<p>
						<?php
						esc_html_e(
							'Depending on the agreed scope, organisations can adapt learning to reflect elements such as:',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

				<ul class="sl-list sl-list--2up sl-saware-customisation__list">

					<?php foreach ( $customisation_items as $index => $item ) : ?>

						<li class="sl-list-item">

							<span class="sl-list-item__label" aria-hidden="true">
								<?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
							</span>

							<span class="sl-list-item__text">
								<?php echo esc_html( $item ); ?>
							</span>

						</li>

					<?php endforeach; ?>

				</ul>

				<div class="sl-saware-customisation__highlight">

					<p>
						<?php
						esc_html_e(
							'This helps connect general cybersecurity knowledge with the policies and behaviours employees are expected to follow within their own workplace.',
							'akaza-adventure'
						);
						?>
					</p>

				</div>

			</div>

		</div>

	</div>

</section>