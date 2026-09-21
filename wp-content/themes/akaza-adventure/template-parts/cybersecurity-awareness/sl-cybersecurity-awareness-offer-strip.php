<?php
/**
 * Cybersecurity Awareness — offer highlights strip (below hero).
 *
 * @package Akaza_Adventure
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$highlights = array(
	array(
		'title' => __( 'One domain', 'akaza-adventure' ),
		'text'  => __( 'One fixed fee', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'No per-user charges', 'akaza-adventure' ),
		'text'  => __( 'Within your selected band', 'akaza-adventure' ),
	),
	array(
		'title' => __( 'Starts from $50', 'akaza-adventure' ),
		'text'  => __( 'Complete October campaign', 'akaza-adventure' ),
	),
);
?>
<section class="sl-csa-offer-strip" aria-label="<?php esc_attr_e( 'Offer highlights', 'akaza-adventure' ); ?>">
	<div class="container">
		<div class="sl-csa-offer-strip__grid">
			<?php foreach ( $highlights as $highlight ) : ?>
				<div class="sl-csa-offer-strip__item">
					<strong><?php echo esc_html( $highlight['title'] ); ?></strong>
					<span><?php echo esc_html( $highlight['text'] ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
