<?php
/**
 * Gifts and Entertainment AMP: What Is Gifts and Entertainment Compliance Training?
 *
 * Expected vars: $images
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="overview" class="sl-section sl-section--alt sl-aml-pe-vc-overview" aria-labelledby="sl-gifts-overview-title">
	<div class="sl-wrap">
		<div class="sl-aml-intro">
			<span class="sl-eyebrow sl-home-sub-heading">
				<?php esc_html_e( 'Definition of Gifts and Entertainment', 'succeedlearn-amp' ); ?>
			</span>

			<h2 id="sl-gifts-overview-title" class="sl-h2">
				<?php
				echo wp_kses(
					__( 'What Is Gifts and Entertainment <span>Compliance Training?</span>', 'succeedlearn-amp' ),
					array( 'span' => array() )
				);
				?>
			</h2>
		</div>

		<div class="sl-aml-media">
			<div class="sl-aml-image sl-aml-image--natural">
				<amp-img
					src="<?php echo esc_url( $images['overview'] ); ?>"
					width="768"
					height="1024"
					layout="intrinsic"
					alt="<?php esc_attr_e( 'What counts as a gift or entertainment', 'succeedlearn-amp' ); ?>"
				></amp-img>
			</div>
		</div>

		<div class="sl-aml-copy">
			<p class="sl-aml-lead">
				<?php esc_html_e( 'Gifts and Entertainment Compliance Training helps employees assess business gifts, meals, hospitality, event invitations and other benefits, and understand when they should be accepted, declined, approved, recorded or escalated.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'A gift may include merchandise, gift cards, services, personal favours, loans or discounts. Entertainment can include meals, event tickets, cultural outings, travel and hospitality.', 'succeedlearn-amp' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'For PE/VC professionals, these decisions may involve investors, advisers, vendors, portfolio company contacts, government officials and other third parties across UK and US business environments.', 'succeedlearn-amp' ); ?>
			</p>
		</div>
	</div>
</section>
