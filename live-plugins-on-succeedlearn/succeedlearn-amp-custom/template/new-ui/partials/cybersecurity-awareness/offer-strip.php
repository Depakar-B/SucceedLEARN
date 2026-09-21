<?php
/**
 * Cybersecurity Awareness Month AMP - Offer highlights strip.
 *
 * @package SucceedLEARN\AMP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$offer_highlights = succeedlearn_amp_cybersecurity_awareness_offer_highlights();
?>

<section
	class="sl-csa-offer-strip"
	aria-label="<?php esc_attr_e( 'Offer highlights', 'succeedlearn-amp' ); ?>"
>
	<div class="sl-wrap">
		<div class="sl-csa-offer-strip__grid">
			<?php foreach ( $offer_highlights as $highlight ) : ?>
				<div class="sl-csa-offer-strip__item">
					<strong>
						<?php echo esc_html( $highlight['title'] ); ?>
					</strong>

					<span>
						<?php echo esc_html( $highlight['text'] ); ?>
					</span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>