<?php
/**
 * Political Donations Training — Target Audience.
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$audience_items = array(
	__( 'Private equity investment teams', 'akaza-adventure' ),
	__( 'Venture capital professionals', 'akaza-adventure' ),
	__( 'Deal teams', 'akaza-adventure' ),
	__( 'Senior managers', 'akaza-adventure' ),
	__( 'Portfolio-facing professionals', 'akaza-adventure' ),
	__( 'Compliance and Risk teams', 'akaza-adventure' ),
	__( 'Legal and Governance teams', 'akaza-adventure' ),
);
?>

<section
	id="target-audience"
	class="sl-political-donations-audience"
	aria-labelledby="sl-political-donations-audience-title"
>
	<div class="container">

		<div class="sl-political-donations-audience__grid">

			<div class="sl-political-donations-audience__media">
				<div class="sl-political-donations-audience__image">
					<div class="sl-political-donations-audience__image-placeholder">
						<?php esc_html_e( 'Image Placeholder', 'akaza-adventure' ); ?>
					</div>
				</div>
			</div>

			<div class="sl-political-donations-audience__content">

				<span class="sl-home-sub-heading">
					<?php esc_html_e( 'Target audience', 'akaza-adventure' ); ?>
				</span>

				<h2 id="sl-political-donations-audience-title">
					<?php esc_html_e( 'Who Should Take Political Contributions and', 'akaza-adventure' ); ?>
					<span><?php esc_html_e( 'Anti-Bribery Training?', 'akaza-adventure' ); ?></span>
				</h2>

				<p>
					<?php esc_html_e( 'This course is relevant to professionals whose role may intersect with political, public-sector, investor or portfolio-company relationships.', 'akaza-adventure' ); ?>
				</p>

				<ul class="sl-list">
					<?php foreach ( $audience_items as $index => $item ) : ?>
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

			</div>

		</div>

	</div>
</section>
